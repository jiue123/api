<?php
require_once('api/rest_api.php');
require_once('connection/connection.php');

class api extends rest_api {
    protected $conn;
    protected $today;

    public function __construct($conn)
    {
        $this->conn = $conn;
        $this->today = date("Y-m-d h:i:s");

        parent::__construct();
    }

    public function getAccessToken() {
        if ($this->method == "POST") {
            $email = addslashes(strip_tags($this->params['email']));
            $password = md5(addslashes(strip_tags($this->params['password'])));


            $sql = "Select * from users where email = '" . $email . "' and password = '" . $password . "'";
            $res = $this->conn->query($sql);

            if ($res->rowCount() > 0) {
                $row = $res->fetch();

                $userHash = $this->hashUser($row['email'], $row['create_at']);
                $accessToken = hash('sha256', random_bytes(40));

                $tokenToClient = [
                    'access_token' => $accessToken . $userHash
                ];

                try {
                    $sql = "insert into oauth_access_token (access_token, user_email, created_at, update_at)
                        values ('" . $accessToken . "', '" . $row['email'] . "', '" . $this->today . "', '" . $this->today . "')";
                    $this->conn->exec($sql);
                } catch (PDOException $e) {
                    $this->response(500, $e->getMessage());
                }

                $this->response(200, $tokenToClient);
            } else {
                $this->response(500, 'Email or password invalid');
            }
        } else {
            $this->response(500, 'Method does not match');
        }
    }

    public function userAction() {
        $result = $this->analyzeToken($this->params['access_token']);

        $sql = "Select * from oauth_access_token where access_token = '" . $result['accessToken'] . "'";
        $res = $this->conn->query($sql);

        if ($res->rowCount() > 0) {
            $row = $res->fetch();

            $sql = $sql = "Select * from users where email = '" . $row['user_email'] . "'";
            $row = $this->conn->query($sql)->fetch();

            $hashUser = $this->hashUser($row['email'], $row['create_at']);

            if($hashUser == $result['hashUser']) {
                switch ($this->method) {
                    case 'GET':
                        $userInfo = [
                            'email' => $row['email'],
                            'name' => $row['name'],
                            'tel' => $row['tel'],
                            'address' => $row['address'],
                            'create_at' => $row['create_at'],
                            'update_at' => $row['update_at'],
                        ];

                        $this->response(200, $userInfo);
                        break;
                    case 'POST':
                        $allowChange = [
                            'name', 'tel', 'address', 'password'
                        ];

                        foreach ($this->params as $key => $value) {
                            if (!in_array($key, $allowChange))
                                continue;

                            $value = $key != 'password' ? addslashes(strip_tags($value)) : md5(addslashes(strip_tags($value)));
                            $valueSets[] = $key . "='" . $value . "'";
                        }

                        try {
                            $sql = "update users set " . implode(',', $valueSets);
                            $this->conn->exec($sql);

                            $this->response(200, 'Update Success');
                        } catch (PDOException $e) {
                            $this->response(500, $e->getMessage());
                        }
                        break;
                    default:
                        $this->response(405, 'Method Not Allowed');
                }
            } else {
                $this->response(500, 'Wrong access token');
            }
        } else {
            $this->response(500, 'Wrong access token');
        }
    }

    private function hashUser($email = null, $create_at = null) {
        $str = $email . $create_at;

        return hash('sha256', $str);
    }

    private function analyzeToken($token = null) {
        $accessToken = substr($token, 0, 64);
        $userHash = substr($token, 64);

        $result = [
            'accessToken' => $accessToken,
            'hashUser' => $userHash,
        ];

        return $result;
    }
}

$user_api = new api(connection::dbConnect());
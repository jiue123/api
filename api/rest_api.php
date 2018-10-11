<?php
class rest_api {
    protected $method   = '';
    protected $endpoint = '';
    protected $params   = array();
    protected $file     = null;


    public function __construct(){
        $this->_input();
        $this->_process_api();
    }

    private function _input(){
        $this->params = explode('/', trim($_SERVER['PATH_INFO'],'/'));
        $this->endpoint = array_shift($this->params);

        $method = $_SERVER['REQUEST_METHOD'];
        $allow_method = array('GET', 'POST', 'PUT', 'DELETE');

        if (in_array($method, $allow_method)){
            $this->method = $method;
        }

        switch ($this->method) {
            case 'POST':
                $this->params = $_POST;
                break;

            case 'GET':
                // Không cần nhận, bởi params đã được lấy từ url
                break;

            case 'PUT':
                $this->file = file_get_contents("php://input");
                break;

            case 'DELETE':
                // Không cần nhận, bởi params đã được lấy từ url
                break;

            default:
                $this->response(500, "Invalid Method");
                break;
        }
    }

    private function _process_api(){
        // code của hàm _process_api
    }
}
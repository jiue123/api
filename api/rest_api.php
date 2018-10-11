<?php
class rest_api {
    protected $method = '';
    protected $params = array();

    public function __construct(){
        $this->_input();
        $this->_process_api();
    }

    private function _input(){
        $method = $_SERVER['REQUEST_METHOD'];
        $allow_method = array('GET', 'POST', 'PUT', 'DELETE');

        if (in_array($method, $allow_method))
            $this->method = $method;

        switch ($this->method) {
            case 'POST':
                $this->params = $_POST;
                break;
            case 'GET':
                $this->params = $_GET;
                break;
            case 'PUT':
                $this->params = $_POST;
                break;
            case 'DELETE':
                $this->params = $_GET;
                break;
            default:
                $this->response(500, "Invalid Method");
                break;
        }
    }

    private function _process_api(){
        if (method_exists($this, $this->params['type'])){
            $this->{$this->params['type']}();
        }
        else {
            $this->response(500, "Type not exist!");
        }
    }

    protected function response($status_code, $data = NULL){
        header($this->_build_http_header_string($status_code));
        header("Content-Type: application/json");
        echo json_encode($data);
        die();
    }

    private function _build_http_header_string($status_code){
        $status = array(
            200 => 'OK',
            404 => 'Not Found',
            405 => 'Method Not Allowed',
            500 => 'Internal Server Error'
        );
        return "HTTP/1.1 " . $status_code . " " . $status[$status_code];
    }
}
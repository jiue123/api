<?php
require ('api/rest_api.php');

class api extends rest_api {
    function __construct()
    {
        parent::__construct();
    }

    function user(){
        if ($this->method == 'GET'){
            echo 1;
        }
        else if ($this->method == 'POST'){
            echo 2;
        }
        else if ($this->method == 'PUT'){
            echo 3;
        }
        else if ($this->method == 'DELETE'){
            echo 4;
        }
    }
}

$user_api = new api();
$user_api->user();
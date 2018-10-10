<?php
$server_host = "mysql";
$database = "api";
$server_username = "root";
$server_password = "root";
$dsn= "mysql:host=$server_host;dbname=$database";

try{
    // create a PDO connection with the configuration data
    $conn = new PDO($dsn, $server_username, $server_password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch (PDOException $e){
    // report error message
    echo $e->getMessage();
}

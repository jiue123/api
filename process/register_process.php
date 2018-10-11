<?php
require_once ('../connection/connection.php');

header('Content-Type: text/html; charset=UTF-8');

$registerInfo = [
    'email' => addslashes($_POST['email']),
    'password' => md5(addslashes($_POST['password'])),
    'name' => addslashes($_POST['name']),
    'tel' => addslashes($_POST['tel']),
    'address' => addslashes($_POST['address']),
    'create_at' => date("Y-m-d h:i:s"),
    'update_at' => date("Y-m-d h:i:s"),
];

$query = "Select * from user where `email` = '" . $registerInfo['email'] . "'";
if ($conn->query($query)->rowCount() > 0) {
    header("location:../index.php?page=register&error=exist");
}

$insertQuery = "insert into user (email, password, name, tel, address, create_at, update_at)
  values (':email', ':password', ':name', ':tel', ':address', ':create_at',':update_at',)";
$conn->prepare($insertQuery)->execute($registerInfo);

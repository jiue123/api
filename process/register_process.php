<?php
require_once ('../connection/connection.php');

header('Content-Type: text/html; charset=UTF-8');

$email = addslashes($_POST['email']);
$password = md5(addslashes($_POST['password']));
$name = addslashes($_POST['name']);
$tel = addslashes($_POST['tel']);
$address = addslashes($_POST['address']);

$query = "Select * from user where `email` = '$email'";
if ($conn->query($query)->columnCount() > 0) {
    header("location:../index.php?page=register&error=exist");
}
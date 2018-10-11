<?php
session_start();
if (isset($_POST['login']) && $_POST['login'] == 1) {
    require_once ('../connection/connection.php');

    $email = addslashes(strip_tags($_POST['email']));
    $password = md5(addslashes(strip_tags($_POST['password'])));

    if ($email == "" || $password == "") {
        $_SESSION['error'] = 'Email or password must not blank!';
        header("location:../index.php?page=login");
    } else {
        $sql = "Select * from user where email = '" . $email . "' and password = '" . $password . "'";
        if ($conn->query($sql)->rowCount() > 0) {
            $_SESSION['email'] = $email;
            header("location:../index.php?page=home");
        } else {
            $_SESSION['error'] = 'Email or password incorrect!';
            header("location:../index.php?page=login");
        }
    }
}
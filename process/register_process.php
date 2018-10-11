<?php
session_start();
if (isset($_POST['register']) && $_POST['register'] == 1) {
    require_once ('../connection/connection.php');

    header('Content-Type: text/html; charset=UTF-8');

    $email = addslashes(strip_tags($_POST['email']));
    $password = md5(addslashes(strip_tags($_POST['password'])));
    $name = addslashes(strip_tags($_POST['name']));
    $tel = addslashes(strip_tags($_POST['tel']));
    $address = addslashes(strip_tags($_POST['address']));
    $create_at = date("Y-m-d h:i:s");
    $update_at = date("Y-m-d h:i:s");

    $sql = "Select * from user where `email` = '" . $email . "'";
    if ($conn->query($sql)->rowCount() > 0) {
        $_SESSION['error'] = 'Email existed';
        header("location:../index.php?page=register");
    } else {
        try {
            $sql = "insert into user (email, password, name, tel, address, create_at, update_at)
                values ('" . $email . "', '" . $password . "', '" . $name . "', '" . $tel . "', '" . $address . "', '" . $create_at . "','" . $update_at . "')";
            $conn->exec($sql);
            $_SESSION['success'] = 'Register success!';
            header("location:../index.php?page=login");
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
            header("location:../index.php?page=register");
        }
    }
} else {
    header("location:../index.php?page=login");
}


<?php
    require('db_connect.php');

    $username = $_POST['username'];
    $password = $_POST['password'];

    $check = "SELECT username, password FROM tourist WHERE tourist.username LIKE '$username' AND tourist.password LIKE '$password' ";
    $check_access = mysqli_query($con, $check);
    $access = mysqli_fetch_array($check_access);

    if (isset($access)){
        header('location:../main.php');
        exit();
    } else {
        header('location:../signin.php');
    }

?>
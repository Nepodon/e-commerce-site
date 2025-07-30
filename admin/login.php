<?php

require_once '../includes/functions.php';

$hash =  password_hash($_POST['password'], PASSWORD_DEFAULT);

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    if(validate_admin($username, $password_hash) == 0){
        echo "<script>alert('Login successful');</script>";
        echo "<script>window.location.href = 'dashboard.php';</script>";
    } else {
        echo "<script>alert('Invalid username or password');</script>";
        echo "<script>console.log('".$hash."');</script>";
        //echo "<script>window.location.href = 'index.html';</script>";
    }
}


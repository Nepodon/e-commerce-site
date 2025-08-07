<?php

require_once 'includes/functions.php';

if(isset($_POST['submit'])){
    global $conn;
    $username = $conn->real_escape_string($_POST["username"]);
    $password = $conn->real_escape_string($_POST["password"]);
    $valid = validate_admin($username, $password);
    if($valid > 0){
        $_SESSION['admin_id'] = $valid;    
        $_SESSION['admin_name'] = $username;  
        echo "<script>alert('Login successful');</script>";
        echo "<script>window.location.replace('dashboard.php');</script>";
    }else if($valid == -1){
        echo "<script>alert('Invalid password!');</script>";
        echo "<script>window.location.href = 'index.html';</script>";
    }else{
        echo "<script>alert('Something went wrong');</script>";
        echo "<script>window.location.href = 'index.html';</script>";
    }
}

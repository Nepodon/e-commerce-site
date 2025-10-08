<?php 
session_start();

if(empty($_POST["username"]) || strlen($_POST['username']) > 20){
    die("Username is required and must be less than 20 characters");
}

if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    die("Valid email is required");
}

if(strlen($_POST["password"]) < 8) {
    die("Password must be at least 8 characters");
}

if($_POST['password'] === "password") {
    die("Password cannot be 'password'");
}

if(strlen($_POST['password']) > 20){
    die("Password length shouldn't be more than 20 characters");
}

if($_POST["password"] !== $_POST["password_confirmation"]) {
    die("Passwords must match");
}
require '../app/User.php';

$username = $_POST['username'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$email = $_POST['email'];
$password = $_POST['password'];



if(is_valid_email($email)){
    die("Email already exists. Please login<a href='login.php'>Login here</a> or use another email.");
}
if(is_valid_phone($phone)){
    die("Phone number already exists. Please login<a href='login.php'>Login here</a> or use another phone number.");
}

$password_hash = password_hash($password, PASSWORD_DEFAULT);
$user_id = insert_user_data($username, $phone, $address, $email, $password_hash);
if(!$user_id){
    header('Location: signup.php?status=error');
    exit;
}

$_SESSION['user_id'] = $user_id;
header('Location: signup-success.php');
exit;
?>
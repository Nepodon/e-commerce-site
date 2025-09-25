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
    die("Password length shouldnt be more the 20 characters");
}

if($_POST["password"] !== $_POST["password_confirmation"]) {
    die("Passwords must match");
}
$user = require '../app/UserControl.php';

$username = $_POST['username'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$email = $_POST['email'];
$password = $_POST['password'];


if($user->isValidUser($email)){
    die("User already exists. Please login<a href='login.php'>Login here</a>");
}

$password_hash = password_hash($password, PASSWORD_DEFAULT);
$user_id = $user->insertUserData($username, $phone, $address, $email, $password_hash);
if(!$user_id){
    header('Location: signup.php');
    exit;
}


$_SESSION['user_id'] = $user_id;
header('Location: signup-success.php');

?>
<?php

require_once("./includes/db.php");
require_once("./includes/functions.php");

$email = $conn->real_escape_string($_POST['email']);
$passwd =$conn->real_escape_string($_POST['password']);
$result = validate_user($email, $passwd);
if($result == 0){
    echo "User verified";
} else if($result == 1){
    echo "Invalid password";
} else if($result == -1){
    echo "Invalid user";
}
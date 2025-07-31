<?php 
require_once "../includes/db.php";
function validate_admin(string $username, string $password): int{
    global $conn;
    $sql = "SELECT * FROM admin WHERE name = '$username'";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        $db = $result->fetch_assoc();
        $password_hash = $db['password'];
        if(password_verify($password, $password_hash) == true){
            return $db['id'];
        } else {
            return -1;
        }
    } else {
        return -2;
    }
}

function setSession() {
    
}
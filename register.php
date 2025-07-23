
<?php
    require_once("./includes/functions.php");
    $username = $conn->real_escape_string($_POST["username"]);
    $email = $conn->real_escape_string($_POST["email"]);
    $password = $conn->real_escape_string($_POST["password"]);

    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    if(validate_user($email, $password) == -1){
        $result = register_user($username, $email, $password_hash);
        if($result == 0){
            echo "User registered successfully";
        } else if($result == -1){
            echo "Error: " . $conn->error;
        }
    } else {
        echo "User already exists";
    }
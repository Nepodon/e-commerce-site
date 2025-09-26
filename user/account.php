<?php
session_start();
$user = require_once '../app/User.php';

// Fetch user data
if(!isset($_SESSION['user_id'])) {
    echo "Login to change account details! <a href='signin.php?ref=account.php'>Signin here!</a>";
    exit;
}
$user_id = $_SESSION['user_id'];
$res = $user->getUserData($user_id);
$data = $res ? $res->fetch_assoc() : null;

// Handle form submission
$message = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $phone = $_POST['phone'] ?? null;
    $email = $_POST['email'] ?? null;
    $address = $_POST['address'] ?? null;
    $password = $_POST['password']  ?? null;
    $success = true;
    
    if($email) {
        $success = $user->updateEmail($user_id, $email) && $success;
    }

    if ($phone) {
        $success = $user->updatePhone($user_id, $phone) && $success;
    }
    if ($address) {
        $success = $user->updateAddress($user_id, $address) && $success;
    }
    if(strlen($_POST["password"]) < 8) {
        $success = false;
        $message = "Password must be at least 8 characters!";
    }

    if($_POST['password'] === "password") {
        $success = false;
        $message = "Password cannot be 'password'!";
    }

    if(strlen($_POST['password']) > 20){
        $success = false;
        $message = "Password length shouldnt be more the 20 characters!";
    }
    if($password ) {
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $success = $user->updatePassword($user_id, $password_hash) && $success;
    }
    // $success = false;
    $message .= $success ? "Details updated successfully." : "  Failed to update details.";
    // Refresh data
}
$res = $user->getUserData($user_id);
$data = $res ? $res->fetch_assoc() : null;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/buttons.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Funnel+Sans">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <title>Account Settings</title>
    <style>
        body { 
            font-family: "Funnel Sans", serif;
            background-color: hsl(0, 0%, 87%);
        }
        .success-message {
            color: green; 
            margin-bottom: 1em;
        }
        .error-message {
            color: red; 
            margin-bottom: 1em;
        }
        .account-form { 
            max-width: 30%; 
            margin: 2rem auto; 
            padding: 2em; 
            border: 1px solid #ccc; 
            border-radius: 8px; 
            box-shadow: 0 2px 20px 0 rgba(0,0,0,0.4);
            background: hsl(0, 0%, 95%);
        }
        .account-form label,
        .account-form input {
            display: flex;
            flex-direction: column;
            width: 60%;
            height: 1.5rem;
            margin: 0.5rem auto;
        }
        .account-form .buttons { 
            display: block;
            padding: 0.7em 2em; 
            margin: 1.5rem auto;
        }
        .message { 
            color: green; 
            margin-bottom: 1em; 
        }
    </style>
</head>
<body>
    <div class="account-form">
        <h1 style="text-align: center; margin-bottom: 2rem  ;">Account Settings</h1>
        <?php if ($message && $success  ): ?>
            <div class="success-message"><?= htmlspecialchars($message) ?></div>
        <?php else:  ?>
            <div class="error-message"><?= htmlspecialchars($message) ?></div>   
        <?php endif; ?>
        <form method="post">
            <label for="username">Name</label>
            <input type="text" id="username" name="username" placeholder="<?= $data['name'] ?? 'Username' ?> cannot be changed" disabled>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" >

            <label for="phone">Phone</label>
            <input type="text" id="phone" name="phone" >

            <label for="address">Address</label>
            <input type="text" id="address" name="address">

            <label for="password">New Password</label>
            <input type="password" id="password" name="password" >

            <button class="buttons" type="submit">Update</button>
        </form>
    </div>
</body>
</html>
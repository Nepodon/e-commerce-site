<?php
session_start();
$user = require "../app/UserControl.php";

$is_valid = false;
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $password = $_POST['password'];
    
    $res = $user->getUserData($_POST['email']);
    $user_data = $res->fetch_assoc();
    if($user_data){
        if(password_verify($password, $user_data['password'])){
            $_SESSION['user_id'] = $user_data['id'];
            $redirect = isset($_GET['ref']) ? urldecode($_GET['ref']) : "index.php";   
            header("Location: $redirect");
            exit;
        }
    }
    $is_valid = true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Arvo">
    <link rel="stylesheet" href="css/buttons.css?v=12">
    <title>Retailo Signin</title>
    <style>
        @import url('color.css');
        body {
            font-family: "Arvo";
            background: var(--50);
            display:flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
            height: 100vh;
            margin: 0 auto;
        }

        .login-container{
            width: 60vw;
            height: 70vh;
            display: flex;
            float: right;
            border: transparent;
            overflow: hidden;
            box-shadow: 0 25px 50px 0 rgba(0,0,0,0.5);
            border: solid 1px black;
        
        }
        .login-img{
            width: 60%;
            position: relative;
        }
        .login-form{
            width: 50%;
            display: flex;
            flex-direction: column;
            align-self: center;
            color: hsl(0, 0%, 10%);
        }
        .login-form h1{
            text-align: center;
            color: hsl(0, 0%, 0%);
        }

        .login-form label{
            width: 90%;
            height: 30px;
            margin: 10px;
            border-radius: 10px;
        }
        .login-form input:not(.buttons){
            width: 80%;
            height: 30px;
            margin: 10px;
            border-radius: 10px;
            border:1px solid black;
        }
        .buttons{
            width: 80%;
            height: 40px;
            margin: 10px;
        }
        .buttons:hover {
            cursor: pointer;
            box-shadow: 0 4px 10px 3px rgba(0, 0, 0, 0.4);
        }
        .login-form p {
            text-align: center;
        }
        .login-form a{
            text-decoration: none;
            color: black;
        }
        .login-form a:hover{
            color: green;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-container">   
        <img class="login-img" src="assets/vector.png">
        <div id="form" class="login-form">
            <h1>Sign in</h1> <br>
            <?php if($is_valid): ?>
                <em>Invalid login credentials</em><br>
            <?php endif; ?>
            <form method="post">
                <div>
                    <label for="email">Email</label>
                    <input name="email" type="text" required value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
                </div>

                <div>
                    <label for="password">Password</label>
                    <input id="password" name="password"  type="password" required>
                </div>
                
                <div>
                    <input type="submit" class="buttons">
                    <p><a href="signup.php">Create new account</a></p>
                </div>
            </form>
        </div>

    </div>
</body>
</html>

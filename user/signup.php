<?php
$status = $_GET['status'] ?? null;
$message = "";
if($status === 'error'){
    $message .= "Failed to sign up. Please try again.";
} 
?>
<html>
<head>
    <meta name="viewport" content="width: device-width;initial-scale: 1.0">
    <link rel="stylesheet" href="css/buttons.css?v=12">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Arvo">
    <title>Retailo signup</title>
    <style>
        body{
            font-family: "Arvo";
            align-content: center;
        }
        .signup-box{
            display:flex;
            width: 75%;
            margin: auto;
            border: 1px solid black;
            box-shadow: 0 25px 50px 0 rgba(0,0,0,0.5);
        }
        .signup-form{
            margin: 2rem 0;
            display: flex;
            flex-direction: column;
            width: 50%;
            height: 100%;
        }
        .signup-form h1{
            text-align: center;
        }
        .error-message {
            color: red;
            text-align: center;
            margin-bottom: 1rem;
        }
        .signup-row {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .signup-row label {
            width: 40%;
            margin-right: 50px;
            text-align: left;
        }
        .signup-row input {
            width: 50%;
            height: 2rem;
            margin-bottom: 16px;
            border-radius:  10px;
            border: 1px solid black;
        }
        .signup-img{
            width: 50%;
            height: 100%;
        }
        .signup-img img{
            width: 100%;
            height: 100%;
        }
        .buttons{
            width: 50%;
            height: 2rem;
        }
    </style>
</head>
<body>
    <div class="signup-box">
        <div id="form" class="signup-form">
            <h1>Sign up</h1>
            <?php if($status === "error"): ?>
                <div class="error-message"><?php echo $message ?></div>
            <?php endif; ?>
            <form method="post" action="signup-process.php">
                <div class="signup-row">
                    <label for="username">User name</label>
                    <input id="username" name="username"  type="text" required>
                </div>
                <div class="signup-row">
                    <label for="phone">Phone with country code</label>
                    <input name="phone" type="tel" required>
                </div>
                <div class="signup-row">
                    <label for="email">Email</label>
                    <input name="email" type="text" required>
                </div>
                <div class="signup-row">
                    <label for="address">Address</label>
                    <input name="address" type="addr" required>
                </div>
                <div class="signup-row">
                    <label for="password">Password</label>
                    <input id="password" name="password"  type="password" required>
                </div>
                <div class="signup-row">
                    <label for="confirm-password">Confirm Password</label>
                    <input id="confirm-password" name="password_confirmation"  type="password" required>
                </div>
                <div class="signup-row"><button class="buttons">Submit</button></div>
            </form>
        </div>
        <div class="signup-img">
            <img src="assets/vector.png">
        </div>
    </div>
</body>
</html>
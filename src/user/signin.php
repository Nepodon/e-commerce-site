<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Arvo">
    <title>Retailo Signin</title>
    <link rel="stylesheet" href="css/signing.css">
    <link rel="stylesheet" href="css/buttons.css?v=12">
</head>
<body>
    <div class="login-container">   
        <img class="login-img" src="assets/vector.png">

        <div id="form" class="login-form">
            <h1>Sign in</h1>
            <form method="post">
                <label for="email">Email</label>
                <input name="email" type="text" required><br>
                <label for="password">Password</label>
                <input id="password" name="password"  type="password" required>
                <input type="submit" class="buttons">
                <p><a href="signup.html">Create new account</a></p>
            </form>
        </div>
    </div>
</body>
</html>

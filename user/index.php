<?php 
session_start();
$user = require_once '../app/UserControl.php';

$user_data = null;
// Cookie for auto-login after ending a session
if (isset($_SESSION['user_id'])) {
    $res = $user->getUserData($_COOKIE['email']);
    $user_data = $res->fetch_assoc();
} else {
    echo "<script>alert('You are not logged in');</script>";
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="css/index.css?v=12" />
        <link rel="stylesheet" href="css/navbar.css?v=12" />
        <link rel="stylesheet" href="css/buttons.css?v=12" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Funnel+Sans">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
        <title>Retailo</title>
        <style>
            html {
                max-width: 100vw;
            }
        </style>
        <script>
            function openPanel(){
                document.getElementById('side-panel').style.display = "block";
            }
            function closePanel(){
                document.getElementById('side-panel').style.display = "none";

            }
        </script>
    </head>    
    <body>
        <nav>
            <h1>RETAILO</h1>
            <div id="#menu">
                <div class="user-features">
                    <a href="account.php"><span class="material-symbols-outlined">account_circle</span></a>
                    <a href="cart.php"><span class="material-symbols-outlined">shopping_bag</span></a>
                </div>
                <div id="side-panel" class="side-panel">
                    <a href="javascript:void(0)" class="closebtn" onclick="closePanel()">&times;</a>
                    <a href="#">Catalog</a>
                    <a href="">Products</a>
                    <a href="#">None</a>
                    <a href="#">Contact</a>
                </div>
                <div class="menu-btn">
                    <button class="menu" onclick="openPanel()"><span class="material-symbols-outlined">menu</span></button>  
                </div>

            </div>
        </nav>     
        <div>
            <div class="home">
                <img  src="assets/img2.jpg" alt="">
                <img  src="assets/img6.jpg" alt="">
            </div>
            <div class="shop-now">
                <h1>PREMIUM DEVELOPMENT BOARDS</h1>
                <p>Built for Brilliance. Engineered to Endure. Uncompromising Quality</p>
                <button class="buttons">Shop now.</button>
            </div>
        </div>
        <div class="featured-products">
            <h2>Featured Products</h2>
            <div class="products">
                <div class="product-card">
                    <p>Product 1</p>
                </div>
                <div class="product-card">
                    <p>Product 1</p>
                </div>
                <div class="product-card">
                    <p>Product 1</p>
                </div>
            </div>
        </div>
    </body>
</html>
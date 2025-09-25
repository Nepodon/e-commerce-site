<?php 
session_start();

require_once '../app/function.php';
$user = require_once '../app/UserControl.php';


$user_data = null;

if (isset($_SESSION["user_id"])) {
    $res = $user->getUserData($_COOKIE["email"]);
    $user_data = $res->fetch_assoc();
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/index.css?v=12" />
        <link rel="stylesheet" href="css/navbar.css?v=12" />
        <link rel="stylesheet" href="css/buttons.css?v=12" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Funnel+Sans">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
        <title>Retailo</title>
        <style>
            html {
                color: hsl(0, 0%, 10%);
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
                <img  src="assets/img8.jpg" alt="">
                <img  src="assets/img2.jpg" alt="">
            </div>
            <div class="shop-now">
                <h1>PREMIUM DEVELOPMENT BOARDS</h1>
                <p>Built for Brilliance. Engineered to Endure. Uncompromising Quality</p>
                <button class="buttons">Shop now.</button>
            </div>
        </div>
        <div class="featured-products">
            <h2>Featured Dev-Boards</h2>
            <div class="boards">
                <div class="products">
                    <div class="product-card">
                        <img src="../images/dev-boards/arduino-nano-33.jpg">
                        <p>Arduino nano 33</p>
                        <p>Available: 10</p>
                        <button class="buttons">Add to cart</button>
                    </div>
                </div>
                <div class="products">
                    <div class="product-card">
                        <img src="../images/dev-boards/arduino-nano-33.jpg">
                        <p>Arduino nano 33</p>
                        <button class="buttons">Add to cart</button>
                    </div>
                </div>
                <div class="products">
                    <div class="product-card">
                        <img src="../images/dev-boards/arduino-nano-33.jpg">
                        <p>Arduino nano 33</p>
                        <button class="buttons">Add to cart</button>
                    </div>
                </div>
                <div class="products">
                    <div class="product-card">
                        <img src="../images/dev-boards/arduino-nano-33.jpg">
                        <p>Arduino nano 33</p>
                        <button class="buttons">Add to cart</button>
                    </div>
                </div>
                <div class="products">
                    <div class="product-card">
                        <img src="../images/dev-boards/arduino-nano-33.jpg">
                        <p>Arduino nano 33</p>
                        <button class="buttons">Add to cart</button>
                    </div>
                </div>
            </div>

            <h2>Featured Modules</h2>
            <div class="modules">
                <div class="products">
                    <div class="product-card">
                        <img src="../images/input-modules/joystick-module.jpg">
                        <p>JoyStick Module</p>
                        <button class="buttons">Add to cart</button>
                    </div>
                </div>
                <div class="products">
                    <div class="product-card">
                        <img src="../images/input-modules/joystick-module.jpg">
                        <p>JoyStick Module</p>
                        <button class="buttons">Add to cart</button>
                    </div>
                </div>
                <div class="products">
                    <div class="product-card">
                        <img src="../images/input-modules/joystick-module.jpg">
                        <p>JoyStick Module</p>
                        <button class="buttons">Add to cart</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- NOTE: 
        To add a function which gets the top 3 most sold items.
        
        Also feature top 3 sold modules.
        -->
        <footer>
            <p><a href="mailto:absj@gmail.com">absj@gmail.com</a></p>
        </footer>
    </body>
</html>
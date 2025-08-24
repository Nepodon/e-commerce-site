<?php 
// add session manager
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="css/index.css" />
        <link rel="stylesheet" href="css/navbar.css?v=15" />
        <link rel="stylesheet" href="css/buttons.css?v=13" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Arvo">
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
                    <a href="#"><span class="material-symbols-outlined">account_circle</span></a>
                    <a href="#"><span class="material-symbols-outlined">shopping_bag</span></a>
                </div>
                <div id="side-panel" class="side-panel">
                    <a href="javascript:void(0)" class="closebtn" onclick="closePanel()">&times;</a>
                    <a href="#">Catalog</a>
                    <a href="#">Products</a>
                    <a href="#">None</a>
                    <a href="#">Contact</a>
                </div>
                <div class="menu-btn">
                    <button class="menu" onclick="openPanel()"><span class="material-symbols-outlined">menu</span></button>  
                </div>

            </div>
        </nav>    
        <div id="home">
            <img id="home-img" src="assets/img2.jpg">
            <img id="home-img" src="assets/img6.jpg">
            <div class="img-text">
                <h1>PREMIUM DEVELOPMENT BOARDS</h1>
                <a href="#"><button class="buttons">Shop Now</button></a>
            </div>
        </div>   
    </body>
</html>
<?php 

$cart = require_once "../app/CartControl.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Funnel+Sans">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
        <style>
            @import url('../css/color.css');
            html{
                scroll-behavior: smooth;
                max-width: 100vw;
                max-height: 100vh;
            }
            body {
                font-family: 'Funnel Sans', sans-serif;
                margin: 0;
                padding: 0;
                background-color: var(--50);
                display: flex;
                flex-direction: row;
            }
            .cart-container {
                width: 70%;
                display: block;
                padding: 1.5rem;
                margin: auto;
            }

        </style>
    </head>
    <body>
        <nav>
        <!-- For navigating to home and account settings-->
        </nav>
        <div  class="cart-container">
            <h1>Your Cart</h1><br>
            <div class="cart-items">
                <!--<div><img src="../images/dev-boards/arduino-nano-33.jpg"></div>
                <div>
                    <h2>Product Name</h2>
                    <h3>$00.00</h3>
                </div>
                <div>
                    <span class="material-symbols-outlined">
                        delete
                    </span>
                    <h3>$300</h3>
                </div>-->
            </div>
        </div>
    </body>
</html>
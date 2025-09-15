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
                padding: 1.6rem;
                border-right: 2px solid black;
                border-left: 2px solid black;
                overflow-y: scroll;
            }
            .cart-items {
                width: 100%;
                height: fit-content;
                padding: 0.5rem;
                border: 1px solid black;
                border-radius: 1.2rem;
                display: flex;
                float: left;
                justify-content: space-between;
            }
            .cart-items img{
                width: 150px;
                height: 150px;
                object-fit: contain;  
            }
            .cart-items h2, .cart-items h3 {
                margin-left: 1.6rem;
                vertical-align: top;
            }
            .cart-container :hover{
                cursor: pointer;
                transform: scale(1.01);
                transition: 0.2s ease-in-out;
            }
            .checkout-container {
                width: 40%;
                height: 100vh;
                display: block;
                padding: 1.6rem;
            }
        </style>
    </head>
    <body>
        <div  class="cart-container">
            <h1>Your Cart</h1><br>
            <div class="cart-items">
                <div><img src="../images/dev-boards/arduino-nano-33.jpg"></div>
                <div>
                    <h2>Product Name</h2>
                    <h3>$00.00</h3>
                </div>
                <div>
                    <span class="material-symbols-outlined">
                        delete
                    </span>
                    <h3>$300</h3>
                </div>
            </div>
            </table>
        </div>
        <div class="checkout-container">
            <h1>Checkout</h1>
        </div>
    </body>
</html>
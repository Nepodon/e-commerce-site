<?php 

$cart = require_once "../app/CartControl.php";

/*
$result = $cart->cartItems($_SESSION["user_id"]); // fetch cart items in the form mysqli result 

// fetching the user cart data
// recieved data is in the form of mysqli_result 

// function should be added to get product details from product id used in the cart table

function showCartItems($cart) {
    while($row = $cart->fetch_assoc()) {
        // process each row
    }
}    
*/   
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

            .material-symbols-outlined {
              font-variation-settings:
              'FILL' 0,
              'wght' 400,
              'GRAD' 0,
              'opsz' 24
            }
            html{
                scroll-behavior: smooth;
                max-width: 100vw;
                max-height: 100vh;
            }
            body {
                font-family: 'Funnel Sans', sans-serif;
                margin: 0;
                padding: 0;
                display: flex;
                flex-direction: row;
                background-color: hsl(0,0%,90%);
            }
            /*Cart design */
            .cart-container {
                width: 80%;
                display: block;
                padding: 1.5rem;
                margin: 0 auto;
                margin-top: 4rem;
                background-color: #f9f9f9ff;
                border-radius: 1rem;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            }
            .cart{
                width: 100%;
                border: 1px solid black;
                border-radius: 1rem;
                overflow: hidden;
            }
            /* Cart - header | items */
            .cart-header {
                display: flex;
                flex-direction: row;
                justify-content: space-between;
                padding: 1.5rem;
                font-size: 1.2rem;
                font-weight: bold;
                background-color: hsl(0,0%,90%);
            }
            .cart-item {
                display: flex;
                flex-direction: row;
                padding: 1rem;
                justify-content: space-between;
                border-top: 1px solid black;
            }
            #item {
                width: 40%;
                display: inline-flex;
                gap: 1rem;
            };
            #price, #total {
                width: 20%;
                background-color: blue;
            }
            #qty {
                width: 20%;
                display: inline-flex;
                justify-content: center;
                align-items: center;
                gap: 0.5rem;
            }
            #qty input {
                width: 2rem;
                text-align: center;
            }
            #item-img {
                width: 100px;
                height: auto;
            }

            .item-name {
                align-items: center;
            }
            .cart-summary {
                width: 350px;
                margin-top: 20px;
                margin-left: auto;
                padding: 20px;
                background-color: #f9f9f9ff;
                border-radius: 8px;
            }

            .summary-row {
                display: flex;
                justify-content: space-between;
                margin-bottom: 10px;
            }

            .summary-row.grand-total {
                font-size: 1.2em;
                font-weight: bold;
                border-top: 1px solid #ccc;
                padding-top: 15px;
                margin-top: 15px;
            }

            .free-shipping {
                display: flex;
                justify-content: space-between;
                align-items: center;
                background-color: #d4edda;
                color: #155724;
                padding: 10px;
                border-radius: 4px;
                margin-top: 15px;
            }

            .checkout-btn {
                width: 100%;
                padding: 15px;
                background-color: #000;
                color: #fff;
                border: none;
                border-radius: 4px;
                font-size: 1.1em;
                cursor: pointer;
                margin-top: 15px;
            }

            .checkout-btn:hover {
                background-color: #333;
            }   
        </style>
    </head>
    <body>
        <nav>
        <!-- For navigating to home and account settings-->
        </nav>
        <div  class="cart-container">
            <h1 style="text-align:center;">Your Cart</h1>
            <div class="cart">
                <div class="cart-header">
                    <span id="item">Item</span>
                    <span id="price">Price</span>
                    <span id="qty">Quantity</span>
                    <span id="total">Total</span>
                </div>
                <div class="cart-item">
                    <div id="item">
                        <img id="item-img" src="../images/dev-boards/arduino-nano-33.jpg" alt="Product Image">
                        <div class="item-name">
                            <h4>Arduiio nanao 2</h4>
                        </div>
                    </div>
                    <h4 id="price">$400</h4>
                    <div id="qty">     
                        <input type="number" class="item-quantity" value="1" data-product-id="1">
                    </div>
                    <h4 id="total">$400</h4>
                </div>  
                <div class="cart-item">
                    <div id="item">
                        <img id="item-img" src="../images/dev-boards/arduino-nano-33.jpg" alt="Product Image">
                        <div class="item-name">
                            <h4>Arduiio nanao 2</h4>
                        </div>
                    </div>
                    <h4 id="price">$400</h4>
                    <div id="qty">     
                        <input type="number" class="item-quantity" value="1" min="1" max="<?= $stock ?>" >
                    </div>
                    <h4 id="total">$400</h4>
                </div> 
            </div> 
            <div class="cart-summary">
                <div class="summary-row">
                    <span>Subtotal:</span>
                    <span>$1,019.98</span>
                </div>
                <div class="summary-row">
                    <span>Sales Tax:</span>
                    <span>$102.00</span>
                </div>
                <div class="summary-row grand-total">
                    <span>Grand total:</span>
                    <span>$1,121.98</span>
                </div>
                <div class="free-shipping">
                    <p>Congrats, you're eligible for **Free Shipping**</p>
                    <span class="material-symbols-outlined">local_shipping</span>
                </div>
                <div>
                    <button class="checkout-btn">Check out</button>
                </div>  
                </div>
            </div>
        </div>
    </body>
</html>
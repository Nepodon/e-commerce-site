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
        <link rel="stylesheet" href="css/cart.css">
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
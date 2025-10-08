<?php 
session_start();
if(!isset($_SESSION["user_id"])){
    echo "Please <a href='signin.php?ref=cart.php'>sign in</a> to view your cart.";
    exit;
}

require_once "../app/Cart.php";
require_once "../app/Product.php";

// Handle quantity update
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['update_qty'])) {
    $product_id = intval($_POST['product_id']);
    $new_qty = intval($_POST['quantity']);
    if ($new_qty > 0) {
        update_item_quantity($_SESSION["user_id"], $product_id, $new_qty);
    } else {
        remove_item($_SESSION["user_id"], $product_id);
    }
}

// Fetch cart items
$cartItems = cart_items($_SESSION["user_id"]);

function show_cart_items($cartItems, $productControl) {
    $subtotal = 0;
    while ($row = $cartItems->fetch_assoc()) {
        $product = get_product_by_id($row['product_id']);
        if ($product){
        $total = $product['price'] * $row['quantity'];
        $subtotal += $total;
        }
        ?>
        <form class="cart-item" method="post" style="display:flex;align-items:center;">
            <div id="item">
                <img id="item-img" src="<?= htmlspecialchars($product['image_path'] ?? '../images/default.jpg') ?>" alt="Product Image">
                <div class="item-name">
                    <h4><?= htmlspecialchars($product['name']) ?></h4>
                </div>
            </div>
            <h4 id="price">$<?= htmlspecialchars($product['price']) ?></h4>
            <div id="qty">     
                <input type="number" class="item-quantity" name="quantity" value="<?= $row['quantity'] ?>" min="1" max="<?= $product['stock'] ?>">
                <input type="hidden" name="product_id" value="<?= $row['product_id'] ?>">
                <button type="submit" name="update_qty" class="buttons" style="margin-left:8px;">Update</button>
            </div>
            <h4 id="total">$<?= $total ?></h4>
        </form>
        <?php
    }
    return $subtotal;
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Your Cart</title>
        <link  rel="stylesheet" href="css/cart.css?v=<?= time() ?>" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Funnel+Sans">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    </head>
    <body>
        <nav>
            <div>
                <h1 ><a style="text-decoration: none; color: black;" href="index.php">RETAILO</a></h1>
            </div>
            <div>
                <h3>Cart</h3>
            </div>
        </nav>
        <div class="cart-container">
            <h1 style="text-align:center;">Your Cart</h1>
            <div class="cart">
                <div class="cart-header">
                    <span id="item">Item</span>
                    <span id="price">Price</span>
                    <span id="qty">Quantity</span>
                    <span id="total">Total</span>
                </div>
                <?php 
    
                if ($cartItems && $cartItems->num_rows > 0) {
                    $subtotal = show_cart_items($cartItems, $productControl);
                } else {
                    echo "<p style='text-align:center;'>Your cart is empty.</p>";
                    $subtotal = 0;
                } 
                ?> 
            </div> 
            <div class="cart-summary">
                <div class="summary-row">
                    <span>Subtotal:</span>
                    <span>&#8377;<?=  number_format($subtotal, 2); ?></span>
                </div>
                <div class="summary-row grand-total">
                    <span>Grand total:</span>
                    <span>&#8377;<?=  number_format($subtotal * 1.10, 2) ?></span>
                </div>
                <?php  if ($subtotal > 1000): ?>
                <div class="free-shipping">
                    <p>Congrats, you're eligible for <b>Free Shipping</b></p>
                    <span class="material-symbols-outlined">local_shipping</span>
                </div>
                <?php endif; ?>
                <div>
                    <a href="payment.php"><button class="checkout-btn">Check out</button></a>
                </div>  
            </div> 
        </div> 
    </body>
</html>
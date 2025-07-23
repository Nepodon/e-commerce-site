<?php
session_start();
if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];

if (isset($_GET['add'])) {
    $id = $_GET['add'];
    $_SESSION['cart'][$id] = ($_SESSION['cart'][$id] ?? 0) + 1;
}

echo "<h2>Cart Contents:</h2>";
foreach ($_SESSION['cart'] as $product_id => $qty) {
    echo "Product ID: $product_id, Quantity: $qty<br>";
}
?>
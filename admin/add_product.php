<?php

use Dom\DocumentType;

$products = require_once '../app/Product.php';
$image = require_once '../app/Image.php';

if(isset($_POST['add_product'])) {
    $message = "";
    $success = true;

    $name = $_POST['name'] ?? null;
    $category = $_POST['category'] ?? null;
    $description = $_POST['description'] ?? null;
    $price = $_POST['price'] ?? null;
    $stock = $_POST['stock'] ?? null;
    $image = $_FILES['image'] ?? null;

    if($name && $category && $description && $price && $stock && $image) {
        $image_url = $image->uploadImage($image);
        if($image_url) {
            $products->addProduct($name, $category, $description, $price, $stock, $image_url);
            $message = "Product added successfully.";
        } else {
            $message = "Failed to upload image.";
        }
    } else {
        $message = "All fields are required.";
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product - Admin Panel</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Funnel+Sans">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>
<body>
    
</body>
</html>
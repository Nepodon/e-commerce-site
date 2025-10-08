<?php
session_start();
require_once '../app/Product.php';

// Fetch all categories// Should return array or null

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Products by Category</title>
    <link rel="stylesheet" href="css/index.css?v=12" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Funnel+Sans">
    <style>
        body {
            font-family: 'Funnel Sans', serif;
        }
        .products-container {
            width: 80%;
            margin: auto;
        }
    </style>
</head>
<body>
    <div class="products-container">
        <h1>Our Products</h1>
        <?php foreach($categories as $category): ?>
            <div class="category-section">
                <h2><?= htmlspecialchars($category) ?></h2>

            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
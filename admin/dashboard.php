<?php
require_once 'code.php';
session_start();
if(!isset($_SESSION['username'])){
    header('Location: login.php');
    die();
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="dashboard.css?v=12" rel="stylesheet" type="text/css" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,opsz,wght@0,18..144,300..900;1,18..144,300..900&family=Oregano:ital@0;1&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=settings" />
        <title>Admin Dashboard</title>
        <style>
            .material-symbols-outlined {
            font-variation-settings:
                'FILL' 0,
                'wght' 400,
                'GRAD' 0,
                'opsz' 24
            }
            body{
                margin: 0;
                padding: 0;
                background-color: hsl(0, 0%, 0%);
                font-family: 'Merriweather', serif;
            }
        </style>
    </head>
    <body>
        <nav>
            <h2 style="margin-left:60px;">ADMIN DASHBOARD</h2>
            <br>
            <ul class="hovers">
                <li id="products"><a href="includes/products.php">Products</a></li>
                <li id="orders"><a href="includes/orders.php">Orders</a></li>
                <li id="settings"><a href="includes/settings.php"><span class="material-symbols-outlined">settings</span></a></li>
            </ul>    
        </nav>

        <div class="products-container">
            <table class="products">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Stock</th>
                </tr>
                <?php
                showProducts();
                ?>
            </table>
        </div>
        <div class="display-revenue">
            <h1>Revenue</h1>
            <?php
            showRevenue();
            ?>
        </div> 
        <div class="display-orders">
            <h1>Orders</h1>
            <?php
            showOrdersCount();
            ?>
        </div>
        </div>
    </body>
</html>
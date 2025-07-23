<?php
require_once 'code.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="index.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,opsz,wght@0,18..144,300..900;1,18..144,300..900&display=swap" rel="stylesheet">
        <style>
            body{
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
                <li><a href="#products">Products</a></li>
                <li><a href="#">Orders</a></li>
                <li><a href="#">Users</a></li>  
            </ul>    
        </nav>
        <h1 id="products" 
            style="color: hsl(0,0%,95%);margin-left: 40px;margin-top: 40px;font-size: 2rem;">
            Products</h1>
        <div class="products-container">
            <table align="center" class="products">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Category</th>
                <th>Description</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Options</th>
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
        <div class="display-order-details">
            <h1>Orders</h1>
            <?php
            showOrders();
            ?>
        </div>
    </body>
</html>
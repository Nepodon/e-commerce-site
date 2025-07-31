<?php
    /*if(!isset($_SESSION['admin_id'])){
        echo "<script>alert('Session Expired! Relogin to continue.');</script>";
        echo "<script>window.location.href = 'index.html';</script>";
    }*/
    require_once "code.php";

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="dashboard.css?v=1" rel="stylesheet"/>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,opsz,wght@0,18..144,300..900;1,18..144,300..900&family=Oregano:ital@0;1&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=settings" />
        <title>Admin Dashboard</title>
        <style>
            *,
            *::before,
            *::after{ 
                box-sizing: border-box;
                margin: 0;
                padding: 0;
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
            <h2>ADMIN DASHBOARD</h2>
            <div class="nav-links">
                <a href="includes/products.php">Products</a>
                <a href="includes/orders.php">Orders</a>
                <a href="includes/settings.php"><span class="material-symbols-outlined">settings</span></a>
            </div>
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
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

        <link href="dashboard.css?v=15" rel="stylesheet"/>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,opsz,wght@0,18..144,300..900;1,18..144,300..900&family=Oregano:ital@0;1&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />
        <title>Admin Dashboard</title>
    </head>
    <body>
        <nav>
            <h2>ADMIN DASHBOARD</h2>
            <div class="nav-links">
                <a href="#products">Products</a>
                <a href="#orders">Orders</a>
                <a href="includes/settings.php"><span class="material-symbols-outlined">settings</span></a>
            </div>
        </nav>
        <section id="home">
            <div class="products-container">
                <h2>Top Selling Products</h2>

            </div>
            <div class="display-details">
                <div class="display-revenue">
                    <h3>Revenue</h3>
                    <span id="display-card-icons" class="material-symbols-outlined">attach_money</span>
                    <?php
                    showRevenue();
                    ?>
                </div> 
                <div class="display-orders">
                    <h3>Orders</h3>
                    <span id="display-card-icons" class="material-symbols-outlined">orders</span>

                    <?php
                    //showOrdersCount();
                    ?>
                </div>
            </div>

        </section>
        <section id="#products">

        </section>
    </body>
</html>
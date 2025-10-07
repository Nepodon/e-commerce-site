<?php 
session_start();

$user = require_once '../app/User.php';
$productControl = require_once '../app/Product.php';

$user_data = null;

if (isset($_SESSION["user_id"])) {
    $res = $user->getUserData($_SESSION["user_id"]);
    $user_data = $res->fetch_assoc();
}

// Fetch top 3 dev-boards and modules
$featuredBoards = $productControl->getProductSales('dev-board');
$featuredModules = $productControl->getProductSales('module');

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/index.css?v=<?= time() ?>" />
        <link rel="stylesheet" href="css/navbar.css?v=<?= time() ?>" />
        <link rel="stylesheet" href="css/buttons.css?v=<?= time() ?>" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Funnel+Sans">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
        <title>Retailo</title>
        <style>
  
        </style>
        <script>
            function openPanel(){
                document.getElementById('side-panel').style.display = "block";
            }
            function closePanel(){
                document.getElementById('side-panel').style.display = "none";

            }
        </script>
    </head>    
    <body>
        <nav>
            <h1>RETAILO</h1>
            <div id="menu">
                <div class="user-features">
                    <a href="account.php"><span class="material-symbols-outlined">account_circle</span></a>
                    <a href="cart.php"><span class="material-symbols-outlined">shopping_bag</span></a>
                </div>
                <div id="side-panel" class="side-panel">
                    <a href="javascript:void(0)" class="closebtn" onclick="closePanel()">&times;</a>
                    <a href="#"></a>
                    <a href="">Products</a>
                </div>
                <div class="menu-btn">
                    <button  onclick="openPanel()"><span class="material-symbols-outlined">menu</span></button>  
                </div>

            </div>
        </nav>     
        <div>
            <div class="home">
                <img  src="assets/img8.jpg" alt="">
                <img  src="assets/img2.jpg" alt="">
            </div>
            <div class="shop-now">
                <h1>PREMIUM DEVELOPMENT BOARDS</h1>
                <p>Built for Brilliance. Engineered to Endure. Uncompromising Quality</p>
                <button class="buttons">Shop now.</button>
            </div>
        </div>
        <div class="featured-products">
            <!-- Featured Dev-Boards -->
            <h2>Featured Dev-Boards</h2>
            <div class="boards">
                <div class="products">
                    <?php if ($featuredBoards && $featuredBoards->num_rows > 0): ?>
                        <?php $count = 0; ?>
                        <?php while ($row = $featuredBoards->fetch_assoc()): ?>
                            <?php if ($count++ >= 3) break; ?>
                            <div class="product-card">
                                <img src="<?= htmlspecialchars($row['image_path'] ?? 'default.jpg') ?>">
                                <p><?= htmlspecialchars($row['name']) ?></p>
                                <p>Available: <?= htmlspecialchars($row['stock']) ?></p>
                                <button class="buttons">Add to cart</button>
                            </div>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <p>No featured boards found.</p>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Featured Modules -->
            <h2>Featured Modules</h2>
            <div class="modules">
                <div class="products">
                    <?php if ($featuredModules && $featuredModules->num_rows > 0): ?>
                        <?php $count = 0; ?>
                        <?php while ($row = $featuredModules->fetch_assoc()): ?>
                            <?php if ($count++ >= 3) break; ?>
                            <div class="product-card">
                                <img src="<?= htmlspecialchars($row['image_path'] ?? 'default.jpg') ?>">
                                <p><?= htmlspecialchars($row['name']) ?></p>
                                <p>Available: <?= htmlspecialchars($row['stock']) ?></p>
                                <button class="buttons">Add to cart</button>
                            </div>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <p>No featured modules found.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- NOTE: 
        To add a function which gets the top 3 most sold items.
        
        Also feature top 3 sold modules.
        -->
        <footer>
            <p><a href="mailto:absj@gmail.com">absj@gmail.com</a></p>
        </footer>
    </body>
</html>
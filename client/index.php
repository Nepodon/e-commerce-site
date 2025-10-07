<?php 
session_start();

$user_data = null;

if (isset($_SESSION["user_id"])) {
    $result = get_user_data($_SESSION["user_id"]);
    $user_data = $result->fetch_assoc();
}

require_once '../app/User.php';
require_once '../app/Product.php';
require_once '../app/Image.php';

function set_image_src($product_name) {
    $image_base64 = get_image($product_name);
    if($image_base64) {
        $image_type = get_image_type($product_name);
        $base64_image = base64_encode($image_base64);
        return 'data:' . $image_type . ';base64,' . $base64_image;
    }
 
    return "data:image/jpg;base64,assests/image_default.jpg";
}

$product_result = get_products_by_sales();
if($mysqli_result) {
    $top_results = [];
    $image_srcs = [];
    while($row = $mysqli_result->fetch_assoc()) {
        $top_products[] = $row['name'];
        $image_srcs[] = set_image_src($row['name']);
        
    }
}

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
                    <a href="#">test 1</a>
                    <a href="#">test 2</a>
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

        </div>
        <footer>
            <h2>Contact us</h2>
            <br>
            <h3>&#9993; : <a href="mailto:absj@gmail.com"> absj@gmail.com</a></h3>    
        </footer>
    </body>
</html>
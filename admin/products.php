<?php

require_once '../app/Product.php';

$message  = "";

$products = get_all_products();
$i = 0;
if($products->num_rows > 0) {
    while($row = $products->fetch_assoc()) {
        $products_list[] = [
            "name" => $row['name'],
            "category" => $row['category'],
            "stock" => $row['stock'],
            "price" => $row['price'],
            "created_at" => $row['created_at']
        ];
        $i++;
    }
} else {
    $counter = 0;
    $message = "No products found. Fetch error?";
}
$counter = $i;
function list_products(int $counter, $product_list ) {
    global $products_list;
    $i = 0; $j = 0;
    for(; $i < $counter; $i++) {
        echo '<div class="product-row">
            <span><p>'.$products_list[$i]['name'].'</p></span>
            <span><p>'.$products_list[$i]['category'].'</p></span>
            <span><p>'.$products_list[$i]['stock'].'</p></span>
            <span><p>&#8377;'.$products_list[$i]['price'].'</p></span>
            <span><p>'.$products_list[$i]['created_at'].'</p></span>
            <span>
                <button>Edit</button>
                <button>Delete</button>
            </span>
        
        </div>';
    }
}   

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Funnel+Sans">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />
        
        <style>
            @import url('css/color-palette.css');
            *{
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                color: black;
            }
            body{
                font-family: 'Funnel Sans';
                background-color: hsl(0, 0%, 87%);
            }
            nav {
                background-color: var(--50);
                width: 100%;
                height: 10vh;
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 0 2rem;
            }
            nav * {
                display: inline;
            }
            .heading-section {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 1rem;
            }
            .action {
                text-decoration: none;
                color: black;
            }
            .action:hover{
                color: hsl(0, 0%, 60%);
                text-decoration: underline; 
            }
            .products-container {
                margin: 2rem;
                padding: 2rem;
                background-color: var(--50);
                border-radius: 8px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            }
            .products-container h3 {
                margin-bottom: 2rem;
            }
            .product-list {
                width: 100%;
                height: fit-content;
                margin-top: 1rem;
                border: 1px solid var(--800);
                border-radius: 8px;
            }
            .list-header, .product-row{ 
                width: 100%;
                height: 3rem;
                padding: 1rem  2rem;
                border-bottom: 1px solid var(--800);    
            }
            .product-row:last-child{
                border-bottom: none;
            }
            .list-header span{
                width: 16%; 
                display: inline-block;
                font-weight: bold;
                text-align: left;
                padding: 0 0.4rem;
            }

            .product-row span{
                width:16%; 
                padding: 0 0.4rem;
                height: 1.5rem;
                display: inline-block;
                text-align: left;
            }
            .product-row button{
                padding: 1px;
                margin: auto 3px;
            }
        </style>
    </head>
    <body>
        <nav>
            <div>
                <h1>RETAILO</h1>
            </div>
            <div>
                <h3>Products Panel</h3>
            </div>
        </nav>
        <div class="products-container">
            <div class="heading-section">
                <h2>Products list</h2>
                <h4><a  class="action" href="add_product.php">Add Product</a></h4>
            </div>
            <div class="product-list">
                <div class="list-header">
                    <span>Name</span>
                    <span>Category</span>
                    <span>Stock</span>
                    <span>Price</span>
                    <span>Date Added</span>
                    <span>Actions</span><!-- edit/delete -->
                </div> 
<!--                <div class="product-row">
                    <span><p>Product 1</p></span>
                    <span><p>Category A</p></span>
                    <span><p>50</p></span>
                    <span><p>&#8377;19.99</p></span>
                    <span>
                        <button><a href="#">Edit</a></button>
                        <button>Delete</button>
                    </span>
                </div>
        -->
                <?php
                if($message) {
                    echo '<div class="product-row"><span><p>'.$message.'</p></span></div>';
                } else {
                    list_products($counter,$products_list);
                }
                ?>
            </div>
        </div>
    </body>
</html>
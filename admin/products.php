<?php

$product_obj = require_once '../app/Product.php';

$products = $product_obj->getAllProducts();


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
                width: 19%; 
                display: inline-block;
                font-weight: bold;
                text-align: left;
                padding: 0 0.4rem;
            }

            .product-row span{
                width:19%; 
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
                    <span>Actions</span><!-- edit/delete -->
                </div> 
                <div class="product-row">
                    <span><p>Product 1</p></span>
                    <span><p>Category A</p></span>
                    <span><p>50</p></span>
                    <span><p>&#8377;19.99</p></span>
                    <span>
                        <button><a href="#">Edit</a></button>
                        <button>Delete</button>
                    </span>
                </div>
            </div>
        </div>
    </body>
</html>
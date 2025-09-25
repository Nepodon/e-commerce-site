<?php 

require_once "ProductControl.php";

$product = new ProductControl();


function getTopProducts($category){
    global $product;
    $result = $product->getProductSales($category);
    $top_results = [];
    if($result && $result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $top_results[] = $row;
            if(count($top_results) >= 3) break;
        }
        return $top_results;
    }
    return false;
}
<?php

$product_obj = require_once '../app/Product.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id = $_POST['id'];
    $product_obj->deleteProduct($id);
    $respose = [
        'status' => 'success',
        'message' => 'Product deleted successfully'
    ];
    header('Content-Type: application/json');
    echo json_encode($respose);
} else {
    $respose = [
        'status' => 'error',
        'message' => 'Invalid request method'
    ];
}
    
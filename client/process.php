<?php 
header('Content-Type: application/json');

$json_request = file_get_contents('php://input');
$data = json_decode($json_request, true);

if($data && $data['action'] === 'add_to_cart'){
    $user_id = intval($data['user_id']);
    $product_id = intval($data['product_id']);
    $quantity = intval($data['quantity']);

    require_once '../app/Cart.php';
    if(!$user_id || !$product_id || $quantity <= 0){
        echo json_encode(['status' => 'error', 'message' => 'Invalid input.']);
        exit;
    }
    if(add_item($user_id, $product_id, $quantity)){
        echo json_encode(['status' => 'success', 'message' => 'Item added to cart.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to add item to cart.']);
    }
}

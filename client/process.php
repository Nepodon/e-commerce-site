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
        exit;
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to add item to cart.']);
        exit;
    }

}

if($data && $data['action'] === 'remove_from_cart'){
    $user_id = intval($data['user_id']);
    $product_id = intval($data['product_id']);

    require_once '../app/Cart.php';
    if(!$user_id || !$product_id){
        echo json_encode(['status' => 'error', 'message' => 'Invalid input.']);
        exit;
    }
    if(remove_item($user_id, $product_id)){
        echo json_encode(['status' => 'success', 'message' => 'Item removed from cart.']);
        exit;
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to remove item from cart.']);
        exit;
    }

}
if($data && $data['action'] === 'get_cart'){
    $user_id = intval($data['user_id']);

    require_once '../app/Cart.php';
    if(!$user_id){
        echo json_encode(['status' => 'error', 'message' => 'Invalid input.']);
        exit;
    }
    $cart_items = get_cart_items($user_id);
    if($cart_items !== false){
        echo json_encode(['status' => 'success', 'cart' => $cart_items]);
        exit;
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to retrieve cart.']);
        exit;
    }

}
if($data && $data['action'] === 'update_cart'){
    $user_id = intval($data['user_id']);
    $product_id = intval($data['product_id']);
    $new_quantity = intval($data['quantity']);
    require_once '../app/Cart.php';
    if(!$user_id || !$product_id || $new_quantity <= 0){
        echo json_encode(['status' => 'error', 'message' => 'Invalid input.']);
        exit;
    }
    if(update_item_quantity($user_id, $product_id, $new_quantity)){
        echo json_encode(['status' => 'success', 'message' => 'Cart updated.']);
        exit;
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to update cart.']);
        exit;
    }
}
echo json_encode(['status' => 'error', 'message' => 'Invalid action.']);
exit;
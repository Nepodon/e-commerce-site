<?php

require_once "DBcontrol.php";

function cart_items(int $user_id) {
    $db = new DBcontrol();
    $sql = "SELECT * FROM cart WHERE user_id = ?";
    $stmt = $db->prepare($sql);
    if ($stmt === false) {
        return false;
    }
    $stmt->bind_param("i", $user_id);
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        $stmt->close();
        return $result;
    }
    $stmt->close();
    return false;
}

function add_item(int $user_id, int $product_id, int $quantity = 1) {
    $db = new DBcontrol();
    $sql = "INSERT INTO cart VALUES (?, ?, ?)";
    $stmt = $db->prepare($sql);
    if ($stmt === false) {
        return false;
    }
    $stmt->bind_param("iii",  $user_id, $product_id, $quantity);
    $result = $stmt->execute();
    $stmt->close();
    return $result;
}

function remove_item(int $user_id, int $product_id) {
    $db = new DBcontrol();
    $sql = "DELETE FROM cart WHERE user_id = ? AND product_id = ?";
    $stmt = $db->prepare($sql);
    if ($stmt === false) {
        return false;
    }
    $stmt->bind_param("ii", $user_id, $product_id);
    $result = $stmt->execute();
    $stmt->close();
    return $result;
}

function update_item_quantity(int $user_id, int $product_id, int $new_quantity) {
    $db = new DBcontrol();
    $sql = "UPDATE cart SET quantity = ? WHERE user_id = ? AND product_id = ?";
    $stmt = $db->prepare($sql);
    if ($stmt === false) {
        return false;
    }
    $stmt->bind_param("iii", $new_quantity, $user_id, $product_id);
    $result = $stmt->execute();
    $stmt->close();
    return $result;
}

function clear_cart(int $user_id) {
    $db = new DBcontrol();
    $sql = "DELETE FROM cart WHERE user_id = ?";
    $stmt = $db->prepare($sql);
    if ($stmt === false) {
        return false;
    }
    $stmt->bind_param("i", $user_id);
    $result = $stmt->execute();
    $stmt->close();
    return $result;
}
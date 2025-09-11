<?php

require_once "DBcontrol.php";
class CartControl  extends DBcontrol{
    public function cartItems(int $user_id):mysqli_result | bool{
        $sql = "SELECT * FROM cart WHERE user_id = ?";
        $this->stmt = $this->mysqli->prepare($sql);
        if($this->stmt === false) {
            return false;
        }
        $this->stmt->bind_param("i", $user_id);
        
        if($this->stmt->execute()) {
            return $this->stmt->get_result();
        }
        return false;   
    }
    public function addItem(int $cart_id ,int $user_id, int $product_it, int $quantity = 1): mixed{
        $sql = "INSERT INTO cart VALUES (?, ?, ?, ?)";
        $this->stmt = $this->mysqli->prepare($sql);
        if($this->stmt === false) {
            return false;
        }   
        $this->stmt->bind_param("iiii", $cart_id, $user_id, $product_it, $quantity);
        return $this->stmt->execute();
    }
    public function removeItem(int $cart_id, int $product_id): bool {
        $sql = "DELETE FROM cart WHERE cart_id = ? AND product_id = ?";
        $this->stmt = $this->mysqli->prepare($sql);
        if($this->stmt === false) {
            return false;
        }   
        $this->stmt->bind_param("ii", $cart_id, $product_id);
        return $this->stmt->execute();
    }
    public function updateItemQuantity(int $cart_id, int $product_id, int $new_quantity): bool {
        $sql = "UPDATE cart SET quantity = ? WHERE cart_id = ? AND product_id = ?";
        $this->stmt = $this->mysqli->prepare($sql);
        if($this->stmt === false) {
            return false;
        }
        $this->stmt->bind_param("iii", $new_quantity, $cart_id, $product_id);
        return $this->stmt->execute();
    }
    public function clearCart(int $cart_id): bool {
        $sql = sprintf("DELETE FROM cart WHERE cart_id = %s", $cart_id);
        return $this->mysqli->query($sql);
    }
}

return new CartControl();
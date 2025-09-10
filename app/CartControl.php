<?php

require_once "DBcontrol.php";
class CartControl  extends DBcontrol{
    public function cartItems(int $user_id):mysqli_result | bool{
        $sql = "SELECT * FROM cart WHERE user_id = ?";
        $this->stmt = $this->mysqli->prepare($sql);
        if($this->stmt) {
            return false;
        }
        $this->stmt->bind_param("i", $user_id);
        
        if($this->stmt->execute()) {
            return $this->stmt->get_result();
        }
        return false;   
    }
}

return new CartControl();
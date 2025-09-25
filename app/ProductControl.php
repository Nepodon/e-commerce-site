<?php 

require_once "DBcontrol.php";

class ProductControl extends DBcontrol {
    public function getProductById(int $product_id): array | bool {
        $sql = "SELECT * FROM products WHERE product_id = '$product_id'";
        $result = $this->mysqli->query($sql);
        if($result && $result->num_rows > 0) {
            return $result->fetch_assoc();
        }
        return false;
    }
    public function getProductSales($category) {
        $sql = "SELECT  id, name, stock, sold_count 
             FROM products WHERE category = '$category' ORDER BY sold_count DESC LIMIT 5";
        return $this->mysqli->query($sql);
    }
}
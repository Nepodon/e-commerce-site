<?php 

require_once "DBcontrol.php";

class Product extends DBcontrol {
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
    public function getAllProducts(): bool | mysqli_result {
        $sql = "SELECT * FROM products";
        return $this->mysqli->query($sql);
    }
    public function getCategories() {
        $sql = "SELECT DISTINCT category FROM products";
        if($result = $this->mysqli->query($sql)) {
            $categories = [];
            while($row = $result->fetch_assoc()) {
                $categories[] = $row['category'];
            }
            return $categories;
        }
        return null;
    }
    public function getProductsByCategory($category): bool | mysqli_result {
        $sql = sprintf("SELECT * FROM products WHERE category = %s", $this->mysqli->real_escape_string($category));
        if($result = $this->mysqli->query($sql)) {
            return $result->fetch_assoc();
        }
        return false;
    }
    public function deleteProduct($product_id): bool {
        $sql = "DELETE FROM products WHERE product_id = '$product_id'";
        return $this->mysqli->query($sql);
    }
}
return new Product();
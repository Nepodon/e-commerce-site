<script>
    function deleteProduct(product_id){
        alert(product_id);  
        
    }
</script>   
<?php
require_once "../includes/db.php";
require_once "../includes/images.php";
require_once '../includes/functions.php';

setlocale(LC_MONETARY, 'en_IN.UTF-8');

function showProducts(){
    global $conn;
    $sql = "SELECT * FROM products";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $product_id = $row['id'];
            $product_name = $row['name'];
            $product_category = $row['category'];
            $product_description = $row['description'];
            $product_price = $row['price'];
            $product_image = $row['image_url'];
            $product_stock = $row['stock'];

            echo "<tr>";
            echo "<td>".$product_id . "</td>";
            echo "<td>".$product_name . "</td>";
            echo "<td>".$product_category . "</td>";
            $product_price = number_format($product_price, 2);
            echo "<td><span>&#8377</span>".$product_price . "</td>";
            echo "<td>".$product_stock . "</td>";
            echo "</tr>";
        }
    }
}
function showRevenue(){
    global $conn;
    $sql = "SELECT sum(total_amount) as total_revenue FROM orders";
    $result = $conn->query($sql);
    if($result){
        while($row = $result->fetch_assoc()){

            $revenue = $row['total_revenue'];
            $revenue = number_format($revenue, 2);
            echo "<div class='revenue-details'>";
            echo "<span><p>Total Revenue: &#8377 ".$revenue."</p></span>";
            echo "</div>";
        }
    }
}
function showOrdersCount(): void{
    global $conn;
    $sql = "SELECT count(*) as total_orders FROM orders";
    $result = $conn->query($sql);
    if($result){
        while($row = $result->fetch_assoc()){
            $total_orders = $row['total_orders'];
            echo "<div class='orders-details'>";
            echo "<span><p>All-time Orders: ".$total_orders."</p></span>";
            echo "<span><p>Today's Orders: ".$total_orders."</p></span>";
            echo "</div>";
        }
    }
}   
function showOrders(): void{
}
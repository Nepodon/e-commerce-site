<?php 

require_once 'DBControl.php';


function get_image($product_id) {
    $db_obj = new DBcontrol();
    $query = "SELECT * FROM image WHERE ref_id = '$product_id'";
    $result = $db_obj->query($query);
    if($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['image_binary'];
    }
    return null;
}
function get_image_type($product_id) {
    
    $db_obj = new DBcontrol();
    $query = "SELECT type, image_binary FROM image WHERE image_name = '$product_id'";
    $result = $db_obj->query($query);
    if($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['image_binary'];
    }
    return null;
}

function add_image($image_name, $ref_id,$type, $image) {

    $db_obj = new DBcontrol();
    $query = "INSERT INTO image (image_name, ref_id,type, image_binary) 
              VALUES (?, ?,?, ?)";
    $stmt = $db_obj->prepare($query);
    $image_binary = file_get_contents($image);
    $stmt->bind_param("sisb", $image_name, $ref_id, $type, $image_binary);
    $stmt->send_long_data(3, $image_binary);
    return $stmt->execute();
}

function delete_image($product_id) {
    $db_obj = new DBcontrol();
    $query = "DELETE FROM image WHERE product_id = '$product_id'";
    $result = $db_obj->query($query);
    if($result) {
        return true;
    }
    return false;
}
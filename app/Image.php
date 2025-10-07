<?php 

require_once 'DBControl.php';

class Image extends DBcontrol{
    public function getImage($image_name = "default"){
        $query = sprintf("SELECT * FROM image WHERE image_name = %s",
             $this->escape_string($image_name));
        $result = $this->mysqli->query($query);
        $row = $result->fetch_assoc();
        $image_data = $row['image_binary'] ?? null;
        return $image_data;
    }
    function uploadImage($image_name , $type ,$image_data) {
        $query = "INSERT INTO image (image_name, type ,image_binary) VALUES (?, ?, ?)";
        $this->stmt = $this->mysqli->prepare($query);
        $this->stmt->bind_param("ssb", $image_name, $type ,$image_data);
        $this->stmt->send_long_data(2, $image_data);
        if($this->stmt->execute()) {
            return true;
        }
        return false;
    }
    public function deleteImage($image_name){
        $query = sprintf("DELETE FROM image WHERE image_name = %s", 
             $this->escape_string($image_name));
        return $this->mysqli->query($query);
    }
}

return new Image();
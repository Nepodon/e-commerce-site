<?php 

require_once 'DBControl.php';

class Image extends DBcontrol{
    public function get_image($image_name = "default"){
        $query = sprintf("SELECT * FROM images WHERE image_name = %s",
             $this->escape_string($image_name));
        $result = $this->mysqli->query($query);
        $row = $result->fetch_assoc();
        return $row['image_binary'];
    }
    function upload_image($image_name, $file) {
        if($file == null) return false;
        $image_data = file_get_contents($file);
        $query = "INSERT INTO images (image_name, image_binary) VALUES (?, ?)";
        $this->stmt = $this->mysqli->prepare($query);
        $this->stmt->bind_param("sb", $image_name, $image_data);
        $this->stmt->send_long_data(1, $image_data);
        if($this->stmt->execute()) {
            return true;
        }
        return false;
    }
}

return new Image();
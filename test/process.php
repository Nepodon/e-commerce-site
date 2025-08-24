<?php

$image = $_FILES['image-upload']['tmp_name'] ?? null;
$conn = new mysqli("localhost", "root", "", "test");

if($image != null) {
    $imageContent = null;
    $sql = "INSERT INTO image (image_binary) VALUES (?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("b", $imageContent); 

    $imageContent = file_get_contents($image);
    
    $stmt->send_long_data(0, $imageContent);
    $stmt->execute();
    if($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }
} else {
    echo "No image uploaded.";
}

$sql = "SELECT * FROM image WHERE id = 4";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
echo '<img src="data:image/jpeg;base64,'.base64_encode($row['image_binary']).'"/>';
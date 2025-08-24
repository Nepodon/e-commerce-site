<?php
// function to dynamically insert columns and values for sql query
// Call the function insertUserData with associative array of column name and values


$conn = new mysqli("localhost", "root", "", "test");
function insertUserData(array $userData): bool{
    global $conn;
    $data_types = "";
    $columns = array(); $values = array();
    foreach($userData as $key => $data){
        if($data !== null){
            $data_types .= "s";
            $columns[] = $key;
            $values[] = $data;
        }
    }         
    $placeholders = implode(",", array_fill(0, count($columns), "?"));        
    $sql = "INSERT INTO `users` (" . implode(",", $columns) 
            . ") VALUES(". $placeholders .")";
    $stmt = $conn->prepare($sql);
    if($stmt === false) {
        return false; // Prepare failed
    }
    $stmt->bind_param($data_types, ...$values);
    if($stmt->execute()){
        return true;
    } else {
        return false;
    }
}
$hash = password_hash("nannatpai", PASSWORD_DEFAULT);

$data = array(
    "name"=> "navanith",
    "phone" => null,
    "address" => null,
    "email" => "test.1@gmail.com",
    "password" =>  $hash
);

if(insertUserData($data)){
    echo "Data Inserted!";
    die;
}
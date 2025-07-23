<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "ecommerce";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    echo "<script>alert('Connection failed: " . $conn->connect_error . "')</script>";
}

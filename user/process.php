<?php
$product = require_once '../app/ProductControl.php';

if(isset($_SERVER['REQUEST_METHOD']) === 'GET'){
    $id = $_GET['product_id'];
    $res;
}
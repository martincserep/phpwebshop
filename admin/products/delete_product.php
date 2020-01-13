<?php
include_once "../../services/simpleServices/SimpleProductServices.php";
$services = new SimpleProductServices();
// get order id and delete order from Database
if ($_GET['id']){
    $product_id = $_GET['id'];
    $services->RemoveById($product_id);
    header('Location: ../index.php?action=deleted');
} else{
    header('Location: ../index.php?action=error');
}
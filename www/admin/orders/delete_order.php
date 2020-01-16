<?php

include_once "../../services/simpleServices/SimpleOrderServices.php";
$services = new SimpleOrderServices();
// get order id and delete order from Database
if ($_GET['id']){
    $order_id = $_GET['id'];
    $services->DeleteOrderById($order_id);
    header('Location: orders.php?action=deleted');
} else{
    header('Location: orders.php?action=error');
}

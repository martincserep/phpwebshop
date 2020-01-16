<?php
session_start();

include_once "../services/simpleServices/SimpleOrderServices.php";

$orderServices = new SimpleOrderServices();

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : $_SESSION['guest_id'];
$order = json_encode($_SESSION['cart']);
// add oder to Database
$orderServices->AddOrder($user_id, $order);

//var_dump($order);
unset($_SESSION['cart']);

// redirect to product list and thank the user for the order
header('Location: ../index.php?action=purchased');

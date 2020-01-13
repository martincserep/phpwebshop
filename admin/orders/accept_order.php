<?php

include_once "../../services/simpleServices/SimpleOrderServices.php";
include_once "../../services/simpleServices/SimpleUserServices.php";
$order_srv = new SimpleOrderServices();
$user_srv = new SimpleUserServices();

$order_id = $_GET['id'];

$order = $order_srv->ReadOneById($order_id);

$user_id = $order->getUserId();

$user = $user_srv->ReadUserById($user_id);

// send email to customer
$to      = $user->getEmail();
$subject = 'Your order has been shipped!';

$message = '<html><body>';
$message .= '<h2 style="color:#f40;">Hi '. $user->getFirstName() . '!</h2>';
$message .= '<p style="font-size:18px;">Your order has been shipped!</p>';
$message .= '<p style="font-size:18px;">The ordered items should arrive to your shipping address within 3 business days.</p><br>';
$message .= '<p style="font-size:18px;">King regards!</p><br>';
$message .= '<p style="font-size:18px;">DSLR Shop Team</p>';
$message .= '</body></html>';

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

$sent = mail($to, $subject, $message, $headers);

// update order status
$order_srv->UpdateOrderStatus($order_id, "processed");
$action = isset($_GET['action']) ? $_GET['action'] : "";

header('Location: orders.php?action=processed');

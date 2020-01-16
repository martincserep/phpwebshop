<?php
session_start();
// get the product id and quantity
$id = isset($_POST['product_id']) ? $_POST['product_id'] : 1;
$quantity = isset($_POST['quantity']) ? $_POST['quantity'] : "";

// make quantity a minimum of 1
$quantity=$quantity<=0 ? 1 : $quantity;

// remove the item from the array
unset($_SESSION['cart'][$id]);

// add the item with updated quantity
$_SESSION['cart'][$id]=array(
    'quantity'=>$quantity
);

// tell the user the quantity was updated in cart
header('Location: ../cart/cart.php?action=quantity_updated&id=' . $id);

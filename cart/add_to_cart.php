<?php
session_start();

$home_url="http://localhost/phpwebshop/";

$id = isset($_GET['id']) ? $_GET['id'] : "";

$quantity = isset($_GET['quantity']) ? $_GET['quantity'] : 1;

// make quantity a minimum of 1
$quantity = $quantity<=0 ? 1 : $quantity;

// add new item on array
$cart_item = array('quantity'=>$quantity);

/*
* check if the 'cart' session array was created
* if it is NOT, create the 'cart' session array
*/
if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = array();
}

// check if the item is in the array, if it is, do not add
if(array_key_exists($id, $_SESSION['cart'])){
    // redirect to product list and tell the user it was added to cart
    header("Location: {$home_url}index.php?action=exists&id=" . $id);
}

// else, add the item to the array
else{
    $_SESSION['cart'][$id]=$cart_item;

    // redirect to product list and tell the user it was added to cart
    header("Location: {$home_url}index.php?action=added");
}

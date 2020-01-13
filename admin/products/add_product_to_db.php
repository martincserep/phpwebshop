<?php
include_once "get_new_product_fields.php";

$imagePath = $_SESSION['filepath'];

$isValid = $product_srv->CreateProduct($name, $specification, $description, $price, $quantity, $imagePath, $category);

if ($message == "" && $isValid) {

    header('Location: ../../admin/index.php?action=added');
} else {
    // redirect to create_product page
    header('Location: create_product.php?action=wrong_input&message=' . $message);
}






<?php

if (isset($_GET['id'])){

    $product_id = $_GET['id'];
    // get product updated fields
    include_once "get_new_product_fields.php";
    $imagePath = $_SESSION['filepath'];
    $isValid = $product_srv->EditProduct($product_id, $name, $specification, $description, $price, $quantity, $imagePath, $category);
    if ($message == "" && $isValid) {

        header('Location: ../index.php?action=updated');

    } else {
        // redirect to edit_product page
        header('Location: update_product_in_db.php?action=wrong_input&message=' . $message);
    }
} else{
    header('Location: ../index.php?action=error');
}

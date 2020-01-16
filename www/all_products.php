<?php

global $product_srv;
global $category;


if ($category != "") {
    // get category filtered products
    $productsList = $product_srv->ReadAllByCategory($category);
} else {
    // get all products
    $productsList = $product_srv->ReadAll();
}

echo "<div class='product-container'>";

foreach ($productsList as $product) {
    $hide_add_button = "";
    $button_text = "Add to Cart";
    // hide add button if quantity is 0
    $quantity = $product->getQuantity();
    if ($quantity == 0) {
        $hide_add_button = "disabled";
        $button_text = "Out Of Stock!";
    }
    ?>
        <div class="product-card">
            <img onerror="this.src='uploads/noimage.png'" src='<?= $product->getImage() ?>' alt=""/>
            <h1 class="product-name"><?= $product->getName() ?></h1>
            <p class="product-price">$<?= $product->getPrice() ?></p>
            <p class="product-desc"><?= $product->getDescription() ?></p>
            <p><a href='product.php?id=<?= $product->getId() ?>'><button>Details</button></a></p>
        </div>
    <?php
}


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
            <h1><?= $product->getName() ?></h1>
            <p class="product-price">$<?= $product->getPrice() ?></p>
            <p class="product-desc"><?= $product->getDescription() ?></p>
            <p><a href='product.php?id=<?= $product->getId() ?>'><button>Details</button></a></p>
        </div>
   <!-- <div class="product-">
        <figure class="product-card pc-card">
            <div class="img-container">
                <img onerror="this.src='uploads/noimage.png'" src='<?= $product->getImage() ?>'
                     class="img-responsive img-fluid" alt=""/>
            </div>
            <figcaption class="info-wrap pc-title">
                <h4 class="title"><?= $product->getName() ?></h4>
                <p class="desc"><?= $product->getDescription() ?></p>
            </figcaption>
            <div class="bottom-wrap">
                <div class="price-wrap h5">
                    <p class="item-price"><span>Price: $<?= $product->getPrice() ?>.00</span></p>
                </div>
                <div class="pc-buttons">
                    <a href='product.php?id=<?= $product->getId() ?>' class='btn btn-labeled btn-info btn-sm m-0'>Details</a>
                </div>
            </div>
        </figure>
    </div>-->
    <?php
}


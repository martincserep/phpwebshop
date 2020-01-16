<?php

global $home_url;

global $product_srv;

$id = htmlspecialchars($_GET["id"]);

$product = $product_srv->ReadOne($id);

// check product stock
if ($product->getQuantity() == 0) {
    $block_add_to_cart = "disabled";
    $button_text = "Out of stock!";
} else {
    $block_add_to_cart = "";
    $button_text = "Add to cart";
}
?>
<div class="middle-container">
    <div class="one-product-container">
        <div class="half-container center">
            <img onerror="this.src='uploads/noimage.png'" src='<?= $product->getImage() ?>' style='width:300px;'/>
            <div>
                <h1><?= $product->getName() ?></h1>
                <p><?= $product->getDescription() ?></p>
                <div class="product-price">
                    <h4><span><strong>$<?= $product->getPrice() ?></strong></span></h4>
                </div>
            </div>
        </div>
        <div class="edit-section">
            <p><strong>Specifications: </strong></p>
            <p><?= $product->getSpecification() ?></p>
        </div>
    </div>
    <div class="total-count-box">
        <div class="center">
            <a href="cart/add_to_cart.php?id=<?= $id ?>" type="button"
               class="<?= $block_add_to_cart ?> count-box-link">
                <span class="btn-label"></span><?= $button_text ?></a>
            <a href="index.php" type="button" class="count-box-link">
                Back</a>
        </div>
    </div>
</div>


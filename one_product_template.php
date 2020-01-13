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
<div class="one-product-container">
    <div class="op-main">
        <div class="op-img">
            <img onerror="this.src='uploads/noimage.png'" src='<?= $product->getImage() ?>' style='width:300px;'/>
        </div>
        <div class="op-desc">
            <h4><?= $product->getCategory() ?></h4>
            <h1><?= $product->getName() ?></h1>
            <p><?= $product->getDescription() ?></p>
            <div class="product-price">
                <h4><span><strong>$<?= $product->getPrice() ?>.00</strong></span></h4>
                <a href="cart/add_to_cart.php?id=<?= $id ?>" type="button"
                   class="<?= $block_add_to_cart ?> btn btn-labeled btn-success">
                    <span class="btn-label"></span><?= $button_text ?></a>
                <a href="index.php" type="button" class="btn btn-labeled btn-info">
                    <span class="btn-label"></span>Back</a>
            </div>
        </div>
    </div>
    <div class="op-specs">
        <p><strong>Specifications: </strong></p>
        <p><?= $product->getSpecification() ?></p>
    </div>
</div>



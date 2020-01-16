<?php

include_once __DIR__ . "/../../services/simpleServices/SimpleProductServices.php";

$services = new SimpleProductServices();

// get all products
$productsList = $services->ReadAll();
?>
<div class="list">
    <ul>
        <li class="list-header">
            <span class="li-id">#</span>
            <span class="li-name">Name</span>
            <span class="li-price">Price</span>
            <span class="li-quantity">Stock</span>
            <span class="li-quantity">Category</span>
            <span class="li-name">Actions</span>

        </li>
    </ul>
    <ul>
        <?php foreach ($productsList as $product){
        // check product stock
        if ($product->getQuantity() == 0){
            $block_checkout = "disabled";
            $button_text = "Out of stock!";
        } else{
            $block_checkout = "";
            $button_text = "Add to cart";
        }
        ?>

        <li class="list-item">
            <span class="li-id"><?= $product->getId() ?></span>
            <span class="li-name"><?= $product->getName() ?></span>
            <span class="li-price"><?= $product->getPrice() ?></span>
            <span class="li-quantity"><?= $product->getQuantity() ?></span>
            <span class="li-quantity"><?= $product->getCategory() ?></span>
            <div class="li-name">
                <span class='li-id'><?= "<a href='products/admin_product.php?id={$product->getId()}' type='button'><i class=\"fas fa-info\"></i></a>"?></span>
                <span class='li-id'><?= "<a href='products/delete_product.php?id={$product->getId()}' type='button'>
                        <i class=\"fas fa-trash\"></i></a>"?></span>
            </div>
        </li>
            <?php
        }
        ?>
    </ul>
</div>
<!--
<div>
    <table class='table table-hover table-responsive pc-card list-border-background width-80-percent'>
        <thead>
        <tr>
            <th><strong>#</strong></th>
            <th><strong>Name</strong></th>
            <th><strong><span class="pull-right">Price</span></strong></th>
            <th><strong><span class="pull-right">Stock</span></strong></th>
            <th><strong>Category</strong></th>
            <th><strong>Actions</strong></th>
        </tr>
        </thead>
        <?php foreach ($productsList as $product){
            // check product stock
            if ($product->getQuantity() == 0){
                $block_checkout = "disabled";
                $button_text = "Out of stock!";
            } else{
                $block_checkout = "";
                $button_text = "Add to cart";
            }
            ?>

            <tr>
                <td><span class="margin-1em-zero"><?= $product->getId() ?></span></td>
                <td><span class="margin-1em-zero"><?= $product->getName() ?></span></td>
                <td><span class="pull-right">$<?= $product->getPrice() ?></span></td>
                <td><span class="pull-right"><?= $product->getQuantity() ?></span></td>
                <td><?= $product->getCategory() ?></td>
                <td>
                    <?= "<a href='products/admin_product.php?id={$product->getId()}' type='button' class='btn btn-labeled btn-info btn-sm m-0'>Details</a>"?>
                    <?= "<a href='products/delete_product.php?id={$product->getId()}' type='button' class='btn btn-labeled btn-danger btn-sm m-0'>
                            <span class='btn-label'></span>Delete</a>"?>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
</div>
-->

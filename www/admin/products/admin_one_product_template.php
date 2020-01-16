<?php

include_once "../../services/simpleServices/SimpleProductServices.php";
global $home_url;
$services = new SimpleProductServices();
// get id from query string
$id = htmlspecialchars($_GET["id"]);

$product = $services->ReadOne($id);

?>
    <div class="middle-container">
        <div class="one-product-container">


            <div class="half-container">
                <img onerror="this.src='../../uploads/default.jpg'" src='../../<?= $product->getImage() ?>'
                     style='width:300px; height:auto'/>
            </div>
            <div class="half-container">
                <div class="text-box">
                    <ul>
                        <li><strong>Id: </strong><?= $product->getId() ?></li>
                        <li><strong>Name: </strong><?= $product->getName() ?></li>
                        <li><strong>Description: </strong><?= $product->getDescription() ?></li>
                        <li><strong>Specification: </strong><?= $product->getSpecification() ?></li>
                        <li><strong>In Stock: </strong><?= $product->getQuantity() ?></li>
                        <li><strong>Price: </strong>$<?= $product->getPrice() ?>.00</li>
                        <li><strong>Image Path: </strong><?= $product->getImage() ?></li>
                        <li><strong>Category: </strong><?= $product->getCategory() ?></li>
                    </ul>
                </div>
            </div>
    </div>
            <div class="edit-section">
                <a href="edit_product.php?id=<?= $id ?>" type="button" class=" btn btn-labeled btn-info">
                    <i class="fas fa-edit"></i></a>
                <a href="../index.php?id=<?= $id ?>" type="button" class=" btn btn-labeled btn-success">
                    <i class="fas fa-long-arrow-alt-left"></i></a>
            </div>
    </div>
    </div>
<?php



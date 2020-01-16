<?php
include_once "../../config/core.php";

$page_title = "Edit product";

include_once "../admin_header.php";
// get current product details
include_once "../../services/simpleServices/SimpleProductServices.php";
$product_srv = new SimpleProductServices();

$id = htmlspecialchars($_GET["id"]);

$product = $product_srv->ReadOne($id);

$action = isset($_GET['action']) ? $_GET['action'] : "";

if (isset($_GET['message'])){
    echo $_GET['message'];
}

if ($action == "wrong_input"){?>
    <script type="text/javascript">
        swal({title:'Input Error', text:'The quantity and price fields can only be positive and the price cannot be less than 1!', type:'warning'});
    </script> <?php
}

?>
        <div class="middle-container">
                    <form class="form" action="update_product_in_db.php?id=<?= $id ?>" method="post" enctype="multipart/form-data">
                        <h1>Edit product</h1>
                        <div class="form-item">
                            <label for="name" class="col-lg-3 col-form-label text-md-right">
                                Name</label>
                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control" value="<?= $product->getName() ?>" required>
                            </div>
                        </div>

                        <div class="form-item">
                            <label for="description" class="col-lg-3 col-form-label text-md-right">
                                Description</label>
                            <div class="col-md-6">
                                <input type="text" name="description" class="form-control" value="<?= $product->getDescription() ?>" required>
                            </div>
                        </div>

                        <div class="form-item">
                            <label for="specification" class="col-lg-3 col-form-label text-md-right">
                                Specification</label>
                            <div class="col-md-6">
                                <input type="text" name="specification" class="form-control" value="<?= $product->getSpecification() ?>" required>
                            </div>
                        </div>

                        <div class="form-item">
                            <label for="price" class="col-lg-3 col-form-label text-md-right">
                                Price</label>
                            <div class="col-md-6">
                                <input type="number" name="price" class="form-control" value="<?= $product->getPrice() ?>" required>
                            </div>
                        </div>

                        <div class="form-item">
                            <label for="stock" class="col-lg-3 col-form-label text-md-right">
                                Stock</label>
                            <div class="col-md-6">
                                <input type="number" name="stock" class="form-control" value="<?= $product->getQuantity() ?>" required>
                            </div>
                        </div>

                        <div class="form-item">
                            <label for="old_image" class="col-lg-3 col-form-label text-md-right">
                                Old Image Url</label>
                            <div class="col-md-6">
                                <input type="text" name="old_image" class="form-control" value="<?= $product->getImage() ?>">
                            </div>
                        </div>

                        <div class="form-item">
                            <label for="image" class="col-lg-3 col-form-label text-md-right">
                                New Image</label>
                            <div class="col-md-6">
                                <input type="file" name="image">
                            </div>
                        </div>

                        <div class="form-item">
                            <label for="category" class="col-lg-3 col-form-label text-md-right">
                                Category</label>
                            <div class="col-md-6">
                                <input type="text" name="category" class="form-control" value="<?= $product->getCategory() ?>" required>
                            </div>
                        </div>

                        <div class="form-item">
                            <button class="button" type="submit" class="btn btn-primary">
                                Save product
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

<?php

include_once "../../footer.php";

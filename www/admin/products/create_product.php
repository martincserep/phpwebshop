<?php
include_once "../../config/core.php";

$page_title = "Create product";

include_once "../admin_header.php";
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
    <main class="my-form">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 list-border-background">
                    <form action="add_product_to_db.php" method="post" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label for="name" class="col-lg-3 col-form-label text-md-right">
                                Name</label>
                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control" required>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="specification" class="col-lg-3 col-form-label text-md-right">
                                Specification</label>
                            <div class="col-md-6">
                                <input type="text" name="specification" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-lg-3 col-form-label text-md-right">
                                Description</label>
                            <div class="col-md-6">
                                <input type="text" name="description" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="price" class="col-lg-3 col-form-label text-md-right">
                                Price</label>
                            <div class="col-md-6">
                                <input type="number" name="price" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="stock" class="col-lg-3 col-form-label text-md-right">
                                Stock</label>
                            <div class="col-md-6">
                                <input type="number" name="stock" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="image" class="col-lg-3 col-form-label text-md-right">
                                Image Url</label>
                            <div class="col-md-6">
                                <input type="file" name="image">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="category" class="col-lg-3 col-form-label text-md-right">
                                Category</label>
                            <div class="col-md-6">
                                <input type="text" name="category" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
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
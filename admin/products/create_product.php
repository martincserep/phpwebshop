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
        <div class="middle-container">
                    <form class="form" action="add_product_to_db.php" method="post" enctype="multipart/form-data">
                        <h1>Add new product</h1>
                        <div class="form-item">
                            <input placeholder="Name" type="text" name="name" class="form-control" required>
                        </div>

                        <div class="form-item">
                            <input placeholder="Specification" type="text" name="specification" class="form-control" required>
                        </div>

                        <div class="form-item">
                            <input placeholder="Description" type="text" name="description" class="form-control" required>
                        </div>

                        <div class="form-item">
                            <input placeholder="Price" type="number" name="price" class="form-control" required>
                        </div>

                        <div class="form-item">
                            <input placeholder="Stock" type="number" name="stock" class="form-control" required>
                        </div>

                        <div class="form-item">
                            <input placeholder="Image" type="file" name="image">
                        </div>

                        <div class="form-item">
                            <input placeholder="Category" type="text" name="category" class="form-control" required>
                        </div>

                        <div class="form-item">
                            <button type="submit" class="button">
                                Save product
                            </button>
                        </div>
                    </form>
                </div>
            </div>

<?php

include_once "../../footer.php";
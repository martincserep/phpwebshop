<?php
include_once "../config/core.php";

$page_title = "Cart";

// alert and redirect if cart empty
if (!isset($_SESSION['cart']) || ($_SESSION['cart'] == 0)) {
    header("Location: ../index.php?action=cart_empty");
} else {

    include_once __DIR__ . "/../header.php";

    include_once __DIR__ . "/../services/simpleServices/SimpleProductServices.php";

    $service = new SimpleProductServices();

    $action = isset($_GET['action']) ? $_GET['action'] : "";


// alert if item was removed
    if ($action == 'removed') { ?>
        <script type="text/javascript">
            swal({title: 'Info', text: 'The selected item has been removed from your Cart!', type: 'info', timer: 1800});
        </script> <?php
    }
    if ($action == 'cart_not_empty') {?>
        <script type="text/javascript">
            swal({title:'Warning', text:'If you logout your cart items will be lost', type:'warning' , showCancelButton: true,
                    confirmButtonText: "Yes, logout!",
                    closeOnConfirm: false},
                function(){
                    swal({title:"Cart lost!", text:"Now you logout!", type:"success" timer: 1500});
                });
        </script>
        <?php

    }

    $total = 0;
    $item_count = 0;
    $row_count = 0;

// alert if quantity updated
    if ($action == 'quantity_updated') { ?>
        <script type="text/javascript">
            swal({title: 'Info', text: 'The quantity of selected item has been Updated!', type: 'info', timer: 1800});
        </script> <?php
    }
// alert if user not logged in
    if ($action == 'not_logged_in') { ?>
        <script type="text/javascript">
            swal({title: 'Warning', text: 'Please login first!', type: 'warning', timer: 1800});
        </script> <?php
    }

    if (isset($_SESSION['access_level']) && $_SESSION['access_level'] == "Customer") {
        $redirectPage = "check_out.php";
    } else {
        $action = "not_logged_in";
        $redirectPage = "cart.php";
    }
    ?>
    <div class="list">
        <ul>
            <li class="list-header">
                <span class="li-row-count">#</span>
                <span class="li-name">Name</span>
                <span class="li-quantity">Quantity</span>
                <span class="li-price">Actions</span>
                <span class="li-price">Price</span>
            </li>
        </ul>
        <ul>
            <!--read cart items-->
            <?php foreach ($_SESSION['cart'] as $id => $value) {
                $quantity = $_SESSION['cart'][$id]['quantity'];
                $row_count += 1;
                $cart_product = $service->ReadOne($id);
                $name = $cart_product->getName();
                $price = $cart_product->getPrice();
                $sub_total = $price * $quantity;

                // include one cart item template
                include "cart_item_template.php";

                $item_count += $quantity;
                $total += $sub_total;
            } ?>
        </ul>
        <div class="total-count-box">
            <h4 class='count-box-item'>Total (<?= $item_count ?> items)</h4>
            <?php echo "<h4>&#36;" . number_format($total, 2, '.', ',') . "</h4>" ?>

            <a href='<?= $redirectPage ?>?action=<?= $action ?>' class='count-box-link'>
                Proceed to checkout
            </a>
        </div>


    </div>

    <?php

    include '../footer.php';
}

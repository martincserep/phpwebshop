<?php
// core configuration
include_once "config/core.php";
// set page title
$page_title="Boski";
// include page header HTML

include_once "header.php";

$category = isset($_GET['category']) ? ($_GET['category']) : "";

$action = isset($_GET['action']) ? $_GET['action'] : "";
echo "<div class='col-md-12'>";

// alert if item added to cart
if($action=='added'){?>
    <script type="text/javascript">
        swal({title:'Success', text:'This item has been added to Cart!', type:'success', timer:1700});
    </script> <?php
}

// user details updated
if ($action == 'updated') {?>
    <script type="text/javascript">
        swal({title: 'Updated', text: 'Your details updated!', type: 'success', timer: 2200});
    </script> <?php
}

if($action=='cart_empty'){?>
    <script type="text/javascript">
        swal({title: 'Info', text: 'Your cart is Empty!', type: 'info', timer: 1500});
    </script><?php
}

if ($action == 'removed') { ?>
    <script type="text/javascript">
        swal({title: 'Info', text: 'The selected item has been removed from your Cart!', type: 'info', timer: 1800});
    </script> <?php
}

// alert if item already added to cart
if($action=='exists'){?>
    <script type="text/javascript">
        swal({title:'Warning', text:'This item already exists in your Cart!', type:'warning', timer:1700});
    </script> <?php
}

// alert if items purchased
if($action=='purchased') {?>
    <script type="text/javascript">
        swal({title:'Success', text:'Thank you for your purchase! You can lay down, your products will arrive soon!', type:'success', timer:3000});
    </script> <?php

}
include_once "all_products.php";
echo "</div>";

// footer HTML and JavaScript codes
include_once 'footer.php';

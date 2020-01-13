<?php
// core configuration
include_once "../config/core.php";

// set page title
$page_title="All products";

// include page header HTML
include 'admin_header.php';

echo "<div class='col-md-12'>";

// get parameter values, and to prevent undefined index notice
$action = isset($_GET['action']) ? $_GET['action'] : "";

// tell the user he's already logged in
if($action=='already_logged_in'){
    echo "<div class='alert alert-info'>";
    echo "<strong>You</strong> are already logged in.";
    echo "</div>";
}

if($action=='added'){
    echo "<div class='alert alert-info'>";
    echo "Product has been <strong>Added</strong> to Database.";
    echo "</div>";
}

if($action=='logged_in_as_admin'){
    echo "<div class='alert alert-info'>";
    echo "<strong>You</strong> are logged in as admin.";
    echo "</div>";
}

if($action=='deleted') {?>

    <script type="text/javascript">
        swal({title: 'Deleted', text: 'The selected product has been Deleted!', type: 'info', timer: 1800});
    </script> <?php
}

if ($action=='error') {?>

    <script type="text/javascript">
        swal({title: 'Error', text: 'The selected product has NOT been Deleted!', type: 'error', timer: 1800});
    </script> <?php
}

if($action=='updated') {?>

    <script type="text/javascript">
        swal({title: 'Updated', text: 'The selected product has been Updated!', type: 'info', timer: 1800});
    </script> <?php
}



echo "</div>";
include_once "products/admin_all_products_template.php";
// include page footer HTML
include_once '../footer.php';

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo isset($page_title) ? strip_tags($page_title) : "Store Admin"; ?></title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
    <link href="<?php echo $home_url . "libs/css/admin.css" ?>" rel="stylesheet" />

    <link href="<?php echo $home_url . "libs/css/header.css" ?>" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/bd224c8064.js" crossorigin="anonymous"></script>


</head>
<body>

<?php
// include top navigation bar
include_once "admin_navigation.php";
?>

<!-- container -->
<div class="container">


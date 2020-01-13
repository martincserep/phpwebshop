<?php
include_once "../../services/simpleServices/SimpleProductServices.php";
include_once "../../libs/php/utils.php";
$utils = new Utils();

$product_srv = new SimpleProductServices();
// get info from post
$name = $_POST['name'];
$specification = $_POST['specification'];
$description = $_POST['description'];
$price = $_POST['price'];
$quantity = $_POST['stock'];
$oldImage = isset($_POST['old_image']) ? $_POST['old_image'] : "";

$uniqueSaveName = time().uniqid(rand());

$image = !empty($_FILES["image"]["name"])
    ? $uniqueSaveName . "-" . basename($_FILES["image"]["name"]) : "";

$message = $utils->uploadPhoto($image, $oldImage);

$category = $_POST['category'];

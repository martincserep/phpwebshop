<?php
include_once "config/core.php";
include_once "services/simpleServices/SimpleUserServices.php";

$user_srv = new SimpleUserServices();
$user_id = $_GET['id'];
// get info from post
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$contactNumber = $_POST['contactNumber'];
$email = $_POST['email'];
$address = $_POST['address'];

$user_srv->UpdateUserDetails($user_id, $firstName, $lastName, $email, $contactNumber, $address);

$_SESSION['firstname'] = $firstName;
$_SESSION['lastname'] = $lastName;

header("Location: index.php?action=updated");



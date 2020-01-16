<?php
// show error reporting
error_reporting(E_ALL);

// start php session
session_start();

$context_path = "/";
//$context_path = "/phpwebshop/";
$home_url="http://localhost" . $context_path;

include_once __DIR__ . "/../auth/login_checker.php";

// set your default time-zone
date_default_timezone_set('Europe/Budapest');

// page given in URL parameter, default page is one
$page = isset($_GET['page']) ? $_GET['page'] : 1;

// set number of records per page
$records_per_page = 5;

// calculate for the query LIMIT clause
$from_record_num = ($records_per_page * $page) - $records_per_page;

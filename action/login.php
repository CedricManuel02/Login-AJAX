<?php
session_start();
// include the database
header('Content-Type: application/json');
include "../constant/constant.php";
include "../helper/helper.php";
include "../controller/AccountController.php";

$account = new AccountController($connection);

$account->login();
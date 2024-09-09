<?php
session_start();
include "../constant/constant.php";
include "../helper/helper.php";
include "../controller/AccountController.php";

$account = new AccountController($connection);
$account->logout();

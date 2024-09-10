<?php 

include "../constant/constant.php";
include "../helper/helper.php";
include_once "../controller/ProductController.php";

$product = new ProductController($connection);

$product->delete();
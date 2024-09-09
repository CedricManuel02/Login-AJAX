<?php

define("DATABASE_HOST", "localhost");
define("DATABASE_USER_NAME", "root");
define("DATABASE_USER_PASSWORD", "");
define("DATABASE_NAME", "db_nvidia");

require_once("../database/database.php");


$database = new DatabaseConnection(DATABASE_HOST, DATABASE_USER_NAME, DATABASE_USER_PASSWORD, DATABASE_NAME);

$connection = $database->getConnection();
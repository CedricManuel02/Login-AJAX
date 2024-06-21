<?php

    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "db_nvidia";


    $connection = mysqli_connect($host, $username, $password, $database);

    if(!$connection){
        echo "Database connection failed, please try again." . mysqli_connect_error();
    }

?>
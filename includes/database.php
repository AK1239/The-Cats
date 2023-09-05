<?php
    $db_server = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "cats";


    $conn = mysqli_connect($db_server,$db_user,$db_pass,$db_name);

    if(mysqli_connect_error()){
        exit('Failed to connect to mySQL ' . mysqli_connect_error());
    }
?>
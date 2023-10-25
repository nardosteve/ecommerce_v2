<?php

ob_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecommerce_v2";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if(!$conn){
    echo "Error Status: " . mysqli_connect_error();
}else{
    echo "Connected Successfully";
}

?>
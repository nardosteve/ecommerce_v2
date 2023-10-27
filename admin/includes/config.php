<?php

ob_start();

session_start();

date_default_timezone_set("Africa/Nairobi");

$servername = "127.0.0.1";
$host = "3306";
$username = "root";
$password = "";
$dbname = "ecommerce_v2";

$conn = mysqli_connect($servername, $username, $password, $dbname, $host);

if(!$conn){
    echo "Error Status: " . mysqli_connect_error();
}else{
    echo "Connected Successfully";
}

?>
<?php

require_once '../config.php';

if(isset($_POST["categoryName"]) && isset($_POST["description"]) && isset($_POST["slug"]) ){
    $categoryName = $_POST['categoryName'];
    $description = $_POST['description'];
    $slug = $_POST['slug'];

    $sql = "INSERT INTO categories 
    (category_name, `description`, slug)
    VALUE('$categoryName', '$description', '$slug')";

    if($conn->query($sql)){
        echo "Category Created!";
    }else{
        echo "Something went wrong, try again!";
    }

}

?>
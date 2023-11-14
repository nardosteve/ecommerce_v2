<?php

require_once '../config.php';

if(isset($_POST['roleName'])){

    $roleName = $_POST['roleName'];

    //Prepare and execute the SQL query
    $sql = "INSERT INTO roles (role_name) VALUES('$roleName')";

    if($conn->query($sql)){
         echo "Role created!";
        // header('Location: ../../signin.php');
    }else{
        echo "Account Error: " . $sql . "<br>" . $conn->error; 
    }
}else{

}

?>
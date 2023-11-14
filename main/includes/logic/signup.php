<?php

require_once '../config.php';

// print_r($_POST);
// exit;

if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['country']) && isset($_POST['email']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['passwordConfirm'])){
    $firstName = $_POST['firstname'];
    $lastName = $_POST['lastname'];
    $country = $_POST['country'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $passwordConfirm  = $_POST['passwordConfirm'];

    if($password === $passwordConfirm){

        //Hash the password
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        //Prepare and execute the SQL query
        $sql = "INSERT INTO USERS 
        (firstName, lastName, country, username, email, `password`)
         VALUES('$firstName', '$lastName', '$country', '$username', '$email', '$hashedPassword')";

        if($conn->query($sql)){
            echo "Account created!";
            header('Location: ../../signin.php');
        }else{
            echo "Account Error: " . $sql . "<br>" . $conn->error; 
        }
    }else{
        echo "Password doesn't match";
    }
    
}else{
    echo "Some fields are missing";
}

?>
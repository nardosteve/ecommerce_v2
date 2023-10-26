<?php

require_once '../config.php';

if(isset($_POST['email']) && isset($_POST['password'])){
    // print_r($_POST['email']);
    $email = $_POST['email'];
    $password = $_POST['password'];
    // print_r($email);

    $query = "SELECT * FROM users WHERE email = ? LIMIT 1";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();

    $result = $stmt->get_result();
    print_r($result);

    if($result->num_rows === 1){
        // User with the provided email exists, fetch their data
        $userData = $result->fetch_assoc();

        //Verify enter password against hashed password
        if(password_verify($password, $userData["password"])){
            // echo "Correct password";
            header('Location: ../../index.php');
        }else{
            echo "Incorrect password";
        }

    }else{
        echo "User not found";
    }
}else{
    echo "Empty fields";
}


?>
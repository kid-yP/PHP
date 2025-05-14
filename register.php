<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $full_name = htmlspecialchars($_POST["fullname"]);
        $email = htmlspecialchars($_POST["email"]);

        $errors = [];

        if(empty($full_name)){
            $errors[] = "Full Name is Required";
            // array_push($errors, ""Full Name is required");
        }

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errors[] = "Invalid Email Address";
        }

        if(!empty($full_name) && filter_var($email, FILTER_VALIDATE_EMAIL)){
            echo "Registered succesfully!<br>";
            echo "Full Name: ".$full_name."<br>";
            echo "Email: ".$email."<br>";
        }else{
            foreach($errors as $error){
            echo $error."<br>";
            }
        }
    }
    else{
        header("Location: lab2_1.php");
    }
?>
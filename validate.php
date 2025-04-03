<?php

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $userName = $_POST['username'];
    $password = $_POST['password'];

    if(empty($email)){
        $message = "The Email is Required";
    } else{
        $message = $email;
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $message = "You Enter a non-valid Email";
        }
    }
    if(empty($userName)){
        $message = "This Filed is Required";
    }else {
        $message = $userName;

        if(preg_match("/^([a-zA-Z' ]+)$/",$userName)){
            $message = "You Enter a non-Valid Name";
        }
    }
}
?>
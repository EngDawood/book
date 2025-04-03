<?php
session_start();
include 'Functions/database_connect.php';

$conn = db_connect();

// if(isset($_GET['page'])){

//     $pageUrl = mysqli_real_escape_string($conn, $_GET['page']);
// }
if(isset($_POST['login'])){
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    
    $sql = "SELECT username, `password`, id FROM customer WHERE username = '$username' AND `password`='$password'";
    $result = mysqli_query($conn, $sql);
    $customer = mysqli_fetch_all($result, MYSQLI_ASSOC);
    if(mysqli_num_rows($result)){
        if($customer[0]['username'] == 'admin' && $customer[0]['password'] == 'admin'){
            $_SESSION['client'] = $customer[0]['username'];
            $_SESSION['clientId'] = $customer[0]['id'];
            header("Location: index.php");
            exit();
        }else if($customer[0]['username'] != 'admin'){
            $_SESSION['client'] = $customer[0]['username'];
            $_SESSION['clientId'] = $customer[0]['id'];
            $_SESSION['logInError'] = '';
            header("Location: index.php");
            exit();
        }
    } else{
        $_SESSION['admin'] = false;
        $_SESSION['logInError'] = "Invalid Username Or Password";
        header('Location: signin.php');
        exit();
    }
}
?>
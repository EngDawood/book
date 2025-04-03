<?php

include "Functions/database_connect.php";
$conn = db_connect();
session_start();

if(isset($_SESSION['client'])){
    $client = $_SESSION['client'];

}
if(isset($_SESSION['clientId'])){
    $clientId = $_SESSION['clientId'];
}

if(isset($_POST['add-to-cart'])){
    $pageUrl = $_POST['pageUrl'];
    if($client){    
      $cart_id = $_POST['cart-id'];
        if(isset($_POST['quantity'])){
          $quantity = $_POST['quantity'];
        } else{
          $quantity = 1;
        }
          $query = "SELECT * FROM cart WHERE book_id = '$cart_id' AND client_id = '$clientId'";       
          $row = mysqli_query($conn, $query);
          $getCartItems = mysqli_fetch_all($row, MYSQLI_ASSOC);
          if($getCartItems){
            $incQuantity = $getCartItems[0]['quantity'];
            $incQuantity++;
            $updatesql = "UPDATE cart SET quantity = '$incQuantity' WHERE book_id = '$cart_id'";
            if(mysqli_query($conn, $updatesql)){
              header("Location: " . $pageUrl);
            }else{
              echo "Error: " . mysqli_error($conn);
            }
          }else{
            $insertCartItem = "INSERT INTO cart(client_id, book_id, quantity) VALUES ('$clientId', '$cart_id', $quantity)";
            if(mysqli_query($conn, $insertCartItem)){
              $_SESSION['global'] = 'Book Added Successfully';
              header("Location: " . $pageUrl);
            }else{
              echo "Error: " . mysqli_error($conn);
            }
          }
    }else{
      header("Location: signin.php");
    }
}
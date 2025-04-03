<?php
// connection to the database
require_once 'Functions/database_connect.php';
$conn = db_connect();

if(isset($_POST['update'])){
    $book_id = $_POST['book_id'];
    $new_quantity = $_POST['new_quantity'];
    
    $sql = "UPDATE cart SET quantity = '$new_quantity' WHERE book_id = '$book_id'";

    if(mysqli_query($conn, $sql)){
        header("Location: cart.php");
    } else{
        echo 'query error: ' . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>

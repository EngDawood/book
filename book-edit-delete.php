<?php 
    include 'Functions/database_connect.php';
    $conn = db_connect();

    if(isset($_POST['delete'])){
        $id_to_delete = mysqli_real_escape_string($conn, $_POST['id-to-delete']);
        $sql = "DELETE FROM books WHERE id = '$id_to_delete'";

        if(mysqli_query($conn, $sql)){
            header("Location: index.php#open_here");
        } else{
            echo 'query error: ' . mysqli_error($conn);
        }
    }
?>
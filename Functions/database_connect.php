<?php
    
    function db_connect(){
        $conn = mysqli_connect('localhost', 'root', '', 'BookHup');
        if(!$conn){
            echo 'Connection error: ' . mysqli_connect_error($conn);
            exit;
        }
        return $conn;
    }

    function import_category(){
        $conn = db_connect();

        $importCategory = 'SELECT * FROM category ';
        $result = mysqli_query($conn, $importCategory);
        $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $categories;
    }
    function import_authors(){
        $conn = db_connect();

        $importAuthors = 'SELECT * FROM authors';
        $result = mysqli_query($conn, $importAuthors);
        $authors = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $authors;
    }

    function related_books(){
        $conn = db_connect();
        $sql = "SELECT * FROM books";
        $result = mysqli_query($conn, $sql);
        $related_books = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $related_books;
    }

    function authorize_user($username, $password){
        $conn = db_connect();
        $sql = "SELECT username, `password` FROM customer WHERE username = '$username' AND `password`='$password' LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $customer = mysqli_fetch_all($result, MYSQLI_ASSOC);
        if(mysqli_num_rows($result)){
	        $_SESSION['admin'] = true;
            header("Location: index.php");
        } else{
            echo "Something Went Wrong";
        }
    }

    function add_customer($fullname, $username, $email, $phone, $password){
        $conn = db_connect();
        $sql = "INSERT INTO customer(fullname, email, telephone, username, `password`) VALUES ('$fullname','$email','$phone','$username','$password')";
        $result = mysqli_query($conn, $sql);
        if($result){
            header('Location: signin.php');
        }else{
            echo "<script> alert('Regestration Failed')</script>";
        }
    }

    function get_cart_books(){
        $conn = db_connect();
        $sql = "SELECT book_id FROM cart WHERE client_id = '$clientId'";
        $result = mysqli_query($conn, $sql);
        $booksId = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    
    function select4LatestBook(){
        $conn = db_connect();
		$row = array();
		$query = "SELECT * FROM books ORDER BY id DESC";
		$result = mysqli_query($conn, $query);
		if(!$result){
		    echo "Can't retrieve data " . mysqli_error($conn);
		    exit;
		}
        for($i = 0; $i < 4; $i++){
			array_push($row, mysqli_fetch_assoc($result));
		}
		return $row;
	}
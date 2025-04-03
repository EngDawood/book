<?php
  $_SESSION['client'] = $_SESSION['clientId'] = '';
  session_start();

  $_SESSION['admin'] = false;
  require_once 'Functions/database_connect.php';
  $conn = db_connect();
  $client = '';
  $booksId = '';
  if(isset($_SESSION['client'])){
    $client = $_SESSION['client'];

  }
  if(isset($_SESSION['clientId'])){
    $clientId = $_SESSION['clientId'];

  }
  
  if(isset($clientId)){
    $sql = "SELECT book_id, quantity FROM cart WHERE client_id = '$clientId'";
    $result = mysqli_query($conn, $sql);
    $booksId = mysqli_fetch_all($result, MYSQLI_ASSOC);
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Book Store</title>
    <link rel="stylesheet" href="Assests/CSS/all.min.css" />
    <link rel="stylesheet" href="Assests/CSS/style.css" />
  </head>
  <body>
    <header>
      <div class="container grid">
        <div class="logo">
          <i class="fas fa-book"></i>
          <h1><a href="index.php">BOOKHUP</a></h1>
        </div>
        <div class="main_nav">
          <ul>
            <li>
              <a href="index.php" class="<?php if($page == "Home"){echo 'active';}?>">Home</a>
            </li>
            <li>
              <a href="./books.php">Books</a>
            </li>
           

            <li>
              <a href="cart.php" class="<?php if($page == "cart"){echo 'active';}?>">Sales</a>
            </li>
			<li>
              <a href="about_us.php" class="<?php if($page == "about_us"){echo 'active';}?>">about_us</a>
            </li>
          </ul>
        </div>
        <ul class="header_nav">
          <li>
            <a href="cart.php">
              <i class="fas fa-shopping-cart"></i>
            </a>
            <div class="cart_dropdown dropdown-menu">
              <?php if($booksId){ ?>
                  <?php if(count($booksId) > 0 && $client){?>
                    <h2> You have 
                      <?php 
                        $total = 0;
                        foreach($booksId as $quantity){
                          $total += intval($quantity['quantity']);
                        };
                        echo $total;
                      ?> 
                      in your cart
                    </h2>
                    <div class="cart_dropdown_inner">
                      <?php foreach($booksId as $bookId){ 
                          $id = $bookId['book_id'];
                          $getCartBook = "SELECT * FROM books WHERE id = '$id'";
                          $row = mysqli_query($conn, $getCartBook);
                          $bookCart = mysqli_fetch_assoc($row); ?>
                          <div class="item row">
                            <div class="item_info col-12 flex">
                              <div class="item_image"><img src="Assests/Images/<?php echo $bookCart['book_image']?>" class="book-img"></div>
                              <div class="book_info">
                                <h3><?php echo $bookCart['title']?></h3>
                                <p><?php echo $bookCart['author']?></p>
                                <span class="quantity">Qty: <?php echo $bookId['quantity']?></span>
                                <span class="price">Price: <?php echo $bookCart['price']?>$</span>
                              </div>
                            </div>
                          </div>
                      <?php } ?>
                    </div>
                  <?php }else { ?>
                      <p>You Don't have any books in the list</p>
                  <?php }?>
              <?php }else {?>
                <p>You Don't have any books in the list</p>
              <?php }?>
            </div>
          </li>
          <li>
            <a href="signin.php">
              <i class="fas fa-user"></i>
            </a>
            <div class="account_dropdown dropdown-menu">
              <?php if(!$client): ?>
                <div class="log">
                  <a class="signin" href="signin.php?page='index.php'">Sign In</a>
                  <a class="signup" href="signup.php">Create an Account</a>
                </div>
              <?php endif; ?>
              <?php if($client): ?>
                <h2 class="clientname">
                  <?php echo "Welcome: ". $client; ?>
                </h2>
              <?php endif; ?>
              <ul>
                <?php if($client){ ?>
    
                  <li>
                    <a href="cart.php">My Books</a>
                  </li>

                <?php }else{ ?>
              
                  <li>
                    <a href="signin.php">My Books</a>
                  </li>

                <?php }?>
                
              </ul>
              
              <?php if($client): ?>
                <div class="logout">
                  <a href="logout.php">Logout</a>
                </div>
              <?php endif; ?>
            </div>
          </li>
        </ul>
      </div>
    </header>
  </body>
</html>
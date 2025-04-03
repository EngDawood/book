<?php
$page = "Home";
require_once 'Templates/header.php';
$_SESSION['global'] = '';

if(isset($_SESSION['global'])){
  $successMsg = $_SESSION['global'];
}

$sql = 'SELECT title, author, price, id, book_image FROM books';
$result = mysqli_query($conn, $sql);

$books = mysqli_fetch_all($result, MYSQLI_ASSOC);



?>
<?php if($successMsg){ ?>
  <div class="addedMsg"><?php echo $successMsg ?></div>
<?php }?>

<div class="landing">
  <div class="container">
    <div class="landing_intro">
      <h2>
        Welcome to BOOKHUP <br />
        
      </h2>
      
    </div>
  </div>
</div>
<section class="home_section">
  <div class="container">
    <h1>Popular Books</h1>
    <div class="books_inner row">
      <?php foreach($books as $book): ?>
        <?php $_SESSION['cart-item'] = $book; ?>
        <div class="col-3 book_card">
          <div class="book_image">
               <img src="Assests/Images/<?php echo $book['book_image']?>" height = "400px">
               <div class="detail">
                 <?php if($client == 'admin'): ?>
                    <form action="book-edit-delete.php"class="book_edit" method="POST">
                    <input type="hidden" name="id-to-delete" value="<?php echo $book['id'];?>">
                    <a href="book_edit.php?id=<?php echo $book['id']?>">Edit</a>
                    <input type="submit" name = "delete" value="Delete" class="delete">
                    </form>
                  <?php endif; ?>
                 <a href="book_detail.php?id=<?php echo $book['id'];?>">Detail</a>
               </div>
           </div>
            <div class="book_info">
              <div class="book_price">
                <h3 class="title"><?php echo htmlspecialchars($book['title'])?></h3>
                <span class="author"> <?php echo htmlspecialchars($book['author'])?></span>
                <span class="price"><?php echo htmlspecialchars($book['price'])?> Sar</span>
              </div>
              <div class="book_cart">
                <h2 class="title"><?php echo htmlspecialchars($book['title'])?></h3>
                <form action = "add-to-cart.php" method="POST">
                  <input type="hidden" name="cart-id" value="<?php if($client){echo $book['id'];};?>">
                  <input type="hidden" name="client-id" value="<?php if($client){echo $clientId;};?>">
                  <input type="hidden" name="pageUrl" value="index.php">
                  <input type="submit" value="ADD TO CART" name="add-to-cart" class="add-cart">
                </form>
              </div>
              </div>
          </div>
        <?php endforeach; ?>
      </div>
  </div>
</section>
<?php 

  require_once 'Templates/footer.php';

?>
<script src="Assests/JS/main.js"></script>

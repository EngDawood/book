<?php
$page = "books";
include 'Templates/header.php';

$sql = 'SELECT title, author, price, book_image, id, category_id FROM books';
$result = mysqli_query($conn, $sql);
$books = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>

<?php if(isset($addedMsg)){ ?>
  <div class="addedMsg"><?php echo $addedMsg ?></div>
<?php }?>
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

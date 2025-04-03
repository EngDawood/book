<?php 
    $page = "cart";
    include 'Templates/header.php';

    if(isset($clientId)){
        $sql = "SELECT * FROM cart WHERE client_id = '$clientId'";
        $result = mysqli_query($conn, $sql);
        $booksId = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    

?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <title>Book Store</title>
   </head>
  <body>
<section class="cart_section">
    <div class="section_intro">
        <div class="overlay">
            <h2>SHOPPING CART</h2>
        </div>
    </div>
    <div class="cart_inner">
        <div class="container">
            <?php if($booksId) { ?>

                <?php if(count($booksId) > 0){ ?>
                    <div class="cart_info row center">
                        <div class="col-5">ITEMS</div>
                        <div class="col-7 row ">
                            <div class="col-3">QUANTITY</div>
                            <div class="col-3">PRICE</div>
                            <div class="col-3">TOTAL</div>
                        </div>
                    </div>

                    <?php foreach($booksId as $bookId){
                            $id = $bookId['book_id'];
                            $getCartBook = "SELECT * FROM books WHERE id = '$id'";
                            $row = mysqli_query($conn, $getCartBook);
                            $bookCart = mysqli_fetch_assoc($row); ?>
                        <div class="item row">
                            <div class="item_info col-5 flex">
                                <div class="item_image"><img src="Assests/Images/<?php echo $bookCart['book_image']?>" class="book-img"></div>
                                <div class="book_info">
                                    <h3 class="mob-text"><?php echo $bookCart['title']?></h3>
                                    <p class="mob-text"><?php echo $bookCart['author']?></p>
                                </div>
                                
                            </div>
                            <div class="col-7 row center">
                                <div class="item_quantity col-3">
<div class="item_quantity col-3">
    <form action="update_quantity.php" method="POST">
        <input type="hidden" name="book_id" value="<?php echo $bookCart['id'];?>">
        <input type="number" name="new_quantity" value="<?php echo $bookId['quantity'] ?>" min="1">
        <button type="submit" name="update" class="update-btn">Update</button>
    </form>
</div>


</div>
                                <div class="item_price col-3"><?php echo $bookCart['price']?> SAR</div>
                                <div class="item_total col-3"><?php echo intval($bookId['quantity']) * doubleval($bookCart['price']);?> SAR</div>

                                <form action="cart_item_delete.php" class="item_delete col-3" method="POST">
                                    <input type="hidden" name="id-to-delete" value="<?php echo $bookCart['id'];?>">
                                    <button type="submit" name="delete" class="delete"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </div>
                        </div>
                    <?php }; ?>
                <?php }else{ ?>
                    <div class="no-books">You Don't have Any Books In the cart</div>
                <?php } ?>
            <?php }else { ?>
                    <div class="no-books">You Don't have Any Books In the cart</div>
            <?php }?>
                        <div class="flex checkout">
                            <button class="continue"><a href="books.php">CONTINUE SHOPPING</a></button>
                            <button class="process"><a href="payment.php">PROCESS CHECKOUT</a></button>
                        </div>
        </div>
    </div>
</section>
<?php 
require_once 'Templates/footer.php';
?>

  </body>
  </html>
  
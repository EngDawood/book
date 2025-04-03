<?php
    include "Templates/header.php";

    $related_books = related_books();


    if(isset($_GET['id'])){

        $id = mysqli_real_escape_string($conn, $_GET['id']);
        $sql = "SELECT * FROM books WHERE id = $id";
        $result = mysqli_query($conn, $sql);
        $book = mysqli_fetch_assoc($result);
        mysqli_free_result($result);

    }
?>

<section class="book_detail">
    <div class="container row">
        <div class="detail_inner col-8">
            <div class="detail flex">
                <div class="book_image">
                    <img src="Assests/Images/<?php echo $book['book_image']?>" width = "400px" height ="600px">
                </div>
                <div class="book_info flex-col">
                    <h2><?php echo $book['title']; ?></h2>
                    <span class="author">Author: <?php echo $book['author']; ?> </span>
                    <span class="price"><?php echo $book['price']?> Sar</span>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum alias aliquam exercitationem quia nemo nesciunt odio id? Asperiores beatae aperiam veritatis sint inventore veniam provident similique adipisci totam, eos optio!</p>
                    
                    <form action = "add-to-cart.php" method="POST" class="order flex">
                        <input type="hidden" name="cart-id" value="<?php if($client){echo $book['id'];};?>">
                        <input type="hidden" name="client-id" value="<?php if($client){echo $clientId;};?>">
                        <input type="number" class="quantity" name="quantity" value = "1" min='1'>
                        <input type="hidden" name="pageUrl" value="book_detail.php?id=<?php echo $book['id'] ?>">
                        <input type="submit" value="ADD TO CART" name="add-to-cart" class="order_btn">
                    </form>
                </div>
            </div>
        </div>
        <div class="related col-4 flex-col">
            <h2>Related Books</h2>
            <?php foreach($related_books as $related_book): ?>
                <?php if($related_book['id'] == $id): ?>
                <?php else :?>
                    <div class="book_related flex">
                        <div class="book_image">
                            <img src="Assests/Images/<?php echo $related_book['book_image']?>" width = "200px" height ="250px">
                        </div>
                        <div class="book_info flex-col">
                            <a href="book_detail.php?id=<?php echo $related_book['id'];?>">
                                <h2><?php echo $related_book['title']?></h2>
                            </a>
                            <span class="author">Author: <?php echo $related_book['author'] ?></span>
                            <span class="price"><?php echo $related_book['price']?> Sar</span>
                        </div>
                    </div>
                <?php endif;?>
            <?php endforeach; ?>

        </div>
    </div>
</section>
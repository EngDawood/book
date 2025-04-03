<?php
    ob_start();
    include "Templates/header.php";
    $categories = import_category();
    $authors = import_authors();
    $errors = array('global' => '', 'title' => '', 'author' => '', 'price' => '');
    $success = array('global' => '');
    if(isset($_GET['id'])){
        $id = mysqli_real_escape_string($conn, $_GET['id']);
        $sql = "SELECT * FROM books WHERE id = $id";
        $result = mysqli_query($conn, $sql);
        $book = mysqli_fetch_assoc($result);
        
    }
    if(isset($_POST['update-book'])){
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $price = mysqli_real_escape_string($conn, $_POST['price']);
        $categ = mysqli_real_escape_string($conn, $_POST['categ']);
        list($auth_id, $auth_name) = explode("-", $_POST['auth']); 
        $updateBook = "UPDATE books SET title='$title', author ='$auth_name', author_id = '$auth_id', price='$price', client_id = 1, category_id ='$categ'  WHERE id = '$id'";

        if(mysqli_query($conn, $updateBook)){
            $success['global'] = 'Book Updated Successfully';
            header("location:book_edit.php?id=".$_GET['id']);
            ob_end_flush();
        } else{
            echo 'query error: ' . mysqli_error($conn);
        }
        if(mysqli_query($conn, $updateBook)){
        $success['global'] = 'Book Updated Successfully';
        // Redirect to the book or index page after updating
        header("Location: index.php"); // or "Location: book.php" if you have a book.php
        ob_end_flush();
    } else{
        echo 'query error: ' . mysqli_error($conn);
    }
    }

    
?>
<?php if(isset($success['global']) && !empty($success['global'])){ ?>
    <div class='addedMsg'> <?php echo $success['global'] ?></div>
<?php }?>
<section class="book_add_section">
    <div class="section_intro">
        <div class="overlay">
            <h2>BOOK INFORAMTION</h2>
        </div>
    </div>
    <div class="container">
        <div class="row text-left">
            <div class="col-6">
                <h3>BOOK INFO</h3>
                <form action="book_edit.php?id=<?php echo $_GET['id']?>" class="row" method="POST">
                    <div class="input_group flex-col col-12">
                        <label>Book Title</label>
                        <input type="text" name="title" value="<?php echo $book['title'] ?>">
                        <span class="danger"><?php echo $errors['title']?></span>
                    </div>
                    <div class="input_group flex-col col-12">
                        <label>Select Author: </label>
                        <select name = 'auth'>
                            <?php foreach($authors as $author): ?>
                                <option value ="<?php echo $author['id'] . "-" . $author['name']?>">
                                    <?php echo $author['name']; ?>
                                </option>  
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="input_group col-4 flex-col">
                        <label>Price</label>
                        <input type="number" name="price" class="price" value="<?php echo $book['price']?>"  step="any">
                        <span class="danger"><?php echo $errors['price']?></span>
                    </div>
                    <div class="input_group col-12 flex-col">
                        <label>Select Categoy: </label>
                        <select name = 'categ'>
                            <?php foreach($categories as $category): ?>
                                <option value ="<?php echo $category['id']?>"><?php echo $category['name'] ?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                  
                    <div class="input_group col-12">
                        <input type="hidden" name="id-to-update" value="<?php echo $book['id'] ?>">
                        <input type='submit' name='update-book' value="UPDATE BOOK">
                    </div>
                </form>
            </div>
        </div>
    </div>
   
</section>

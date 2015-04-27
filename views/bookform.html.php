<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $title; ?></title>
</head>
<body>
    <form action="/apps/catalog/treatmentform.php" method="POST">

        <label for="book_title">Title: </label>
        <input type="text" id="book_title" name="title" value="<?php echo $book['title']; ?>"><br>
    
        <label for="book_author">Author: </label>
        <input type="text" id="book_author" name="author" value="<?php echo $book['author']; ?>"><br>
    
        <label for="book_isbn">ISBN: </label>
        <input type="text" id="book_isbn" name="isbn" value="<?php echo $book['isbn']; ?>"><br>
    
        <label for="book_price">Price: </label>
        <input type="text" id="book_price" name="price" value="<?php echo $book['price']; ?>"><br>
    
        <label for="book_edition">Edition: </label>
        <input type="text" id="book_edition" name="edition" value="<?php echo $book['edition']; ?>"><br>
    
        <label for="book_paperback">Paperback: </label>
        <input type="text" id="book_paperback" name="paperback" value="<?php echo $book['pareback']; ?>"><br>
    
        <label for="book_language">Language: </label>
        <input type="text" id="book_language" name="language" value="<?php echo $book['language']; ?>"><br>

        <label for="book_dimensions">Dimensions: </label>
        <input type="text" id="book_dimensions" name="dimensions" value="<?php echo $book['dimensions']; ?>"><br>

    
        <label for="book_description">Description: </label>
        <textarea id="book_description" name="description">
            <?php echo $book['description']; ?>
        </textarea><br>
        <input type="hidden" name="id" value="<?php echo $book['id']; ?>">
        <input type="submit" name="submit" value="<?php echo $submit; ?>">

    </form>
</body>
</html>
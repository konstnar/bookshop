<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Каталог книг</title>
</head>
<body>

    <table border="1">
        <tr>
            <th>Id</th><th>Title</th><th>Author</th><th>Edition</th><th>Price</th><th>Действие</th>
        </tr>
        <?php if(!empty($books)): ?>
            <?php foreach ($books as $book): ?>
             <tr>
                <th><?php echo $book['id']; ?></th>
                <th><?php echo $book['title']; ?></th>
                <th><?php echo $book['author']; ?></th>
                <th><?php echo $book['edition']; ?></th>
                <th><?php echo $book['price']; ?></th>
                <th><form action="/apps/catalog/bookform.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $book['id']; ?>">
                    <input type="submit" name="action" value="Delete">
                    <input type="submit" name="action" value="Edit">
                </form></th>
            </tr>
            <?php endforeach; ?>
        <?php endif; ?>  
    </table>
</body>
</html>
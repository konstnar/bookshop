<?php

/* 
 * We import our basic library functions
*/

include __DIR__  . '/../../lib.inc.php';

$pdo = connect_db();

class CatalogModel {

    /* List fields:
     * id 
     * title
     * author
     * isbn
     * price
     * edition
     * language
     * dimensions
     * description
     * add_date
    */


    public function getAllBooks()
    {   
        try {
            global $pdo;

            $sql = "SELECT id, title, author, price, edition
                    FROM books ORDER BY add_date DESC";
            $result = $pdo->query($sql);

            while ($book = $result->fetch(PDO::FETCH_ASSOC)) {
                $books[] = $book;
            }           
        } catch (PDOException $e) {
            $error = 'При извличении информации из базы данных произошла ошибка: <br>' . 
                     '<span class="error">' . $e->getMessage() . '</span>';
            include __DIR__ . '/../../error.php';
            exit();
        }

        return $books;

    }



    public function getBookById()
    {   
        try {
            global $pdo;

            $sql = "SELECT * FROM books WHERE id = :id";
            $s = $pdo->prepare($sql);
            $s->bindValue(':id', trim(htmlspecialchars((int)$_POST['id']));
            $s->execute();
            $book = $s->fetch();
        } catch (PDOException $e) {
            $error = 'При извличении информации из базы данных произошла ошибка: <br>' . 
                     '<span class="error">' . $e->getMessage() . '</span>';
            include __DIR__ . '/../../error.php';
            exit();
        }

        return $book;

    }

    public function updateBookById()
    {
        try {
            global $pdo;

            $sql = "UPDATE books SET 
                    title = :title,
                    author = :author,
                    isbn = :isbn,
                    price = :price,
                    edition = :edition,
                    language = :language,
                    dimensions = :dimensions,
                    description = :description,
                    add_date = NOW() WHERE id = :id";
            $s = $pdo->prepare($sql);
            $s->bindValue(':id', trim(htmlspecialchars($_POST['id']));
            $s->bindValue(':title', trim(htmlspecialchars($_POST['title']));
            $s->bindValue(':author', trim(htmlspecialchars($_POST['author']));
            $s->bindValue(':isbn', trim(htmlspecialchars($_POST['isbn']));
            $s->bindValue(':price', trim(htmlspecialchars($_POST['price']));
            $s->bindValue(':edition', trim(htmlspecialchars($_POST['edition']));
            $s->bindValue(':language', trim(htmlspecialchars($_POST['language']));
            $s->bindValue(':dimensions', trim(htmlspecialchars($_POST['dimensions']));
            $s->bindValue(':description', trim(htmlspecialchars($_POST['description']));
            $s->execute();

        } catch (PDOException $e) {
            $error = 'При обновлении информации из базы данных произошла ошибка: <br>' . 
                     '<span class="error">' . $e->getMessage() . '</span>';
            include __DIR__ . '/../../error.php';
            exit();  
        }

        header("Location: /apps/admin/");
        exit();
    }


    public function deleteBookById() {
        try {
            
            global $pdo;

            $sql = "DELETE FROM books WHERE id = :id";
            $s = $pdo->prepare($sql);
            $s->bindValue(":id", (int)$_POST['id']);
            $s->execute();

        } catch (PDOException $e) {
            $error = 'При удалении информации из базы данных произошла ошибка: <br>' . 
                     '<span class="error">' . $e->getMessage() . '</span>';
            include __DIR__ . '/../../error.php';
            exit();           
        }

        header("Location: /apps/admin/");
        exit();
    }


    public function addBook() {

         try {

            global $pdo;

            $sql = "INSERT INTO books SET 
                    title = :title,
                    author = :author,
                    isbn = :isbn,
                    price = :price,
                    edition = :edition,
                    language = :language,
                    dimensions = :dimensions,
                    description = :description,
                    add_date = NOW()";

            $s = $pdo->prepare($sql);
            $s->bindValue(':title', trim(htmlspecialchars($_POST['title']));
            $s->bindValue(':author', trim(htmlspecialchars($_POST['author']));
            $s->bindValue(':isbn', trim(htmlspecialchars($_POST['isbn']));
            $s->bindValue(':price', trim(htmlspecialchars($_POST['price']));
            $s->bindValue(':edition', trim(htmlspecialchars($_POST['edition']));
            $s->bindValue(':language', trim(htmlspecialchars($_POST['language']));
            $s->bindValue(':dimensions', trim(htmlspecialchars($_POST['dimensions']));
            $s->bindValue(':description', trim(htmlspecialchars($_POST['description']));
            $s->execute();

        } catch (PDOException $e) {
            $error = 'При добавлении информации из базы данных произошла ошибка: <br>' . 
                     '<span class="error">' . $e->getMessage() . '</span>';
            include __DIR__ . '/../../error.php';
            exit();           
        }

        header("Location: /apps/admin/");
        exit();       
    }
}
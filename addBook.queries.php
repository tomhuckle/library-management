<?php

class AddBooks extends Dbh {
  
// INSERT NEW CHALLENGER
  public function addBook($newBookTitle, $newBookAuthor, $newBookISBN) {

    // INSERT MEMBER
    $sql = 'INSERT INTO books(title, author, isbn_code)
                VALUES (?, ?, ?);';

    // ESTABLISH CONNECTION
    $pdo = $this->connect();
    
    // PREPARE
    $stmt = $pdo->prepare($sql);

    // EXECUTE
    $stmt->execute(array($newBookTitle, $newBookAuthor, $newBookISBN));
  }


  public function deleteBook($deleteTitle) {
    
    $sql = 'DELETE FROM books
                  WHERE books.title = ?';

    $pdo = $this->connect();
    $pdo->prepare($sql)->execute([$deleteTitle]);
  }
}
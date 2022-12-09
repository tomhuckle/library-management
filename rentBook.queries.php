<?php

class RentBook extends Dbh {


  public function changeStatus($rentTitle) {

    $query = "UPDATE books
                 SET rent_status = 1
               WHERE title = ?";

    $pdo = $this->connect();
    $pdo->prepare($query)->execute([$rentTitle]);
  }

  public function selectBookId($rentTitle) {

      $sql = "SELECT id
                FROM books
                WHERE title = ?";

      $pdo = $this->connect();
      $stmt = $pdo->prepare($sql);
      $stmt->execute([$rentTitle]);
      return $row = $stmt->fetch();

  }

  public function selectCustomerId($rentName) {

    $sql = "SELECT id
              FROM customers
              WHERE name = ?";
  
    $pdo = $this->connect();
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$rentName]);
    return $row = $stmt->fetch();



  }
  public function recordRental($bookId, $customerId) {

    $sql = 'INSERT INTO rented(books_id, customers_id)
                VALUES (?, ?)'; 

    // ESTABLISH CONNECTION
    $pdo = $this->connect();
    
    // PREPARE
    $stmt = $pdo->prepare($sql);

    // EXECUTE
    $stmt->execute(array($bookId, $customerId));
  }
}



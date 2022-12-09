<?php

class ReturnBook extends Dbh {

  public function getBook($title) {

    $query = "UPDATE books
                SET rent_status = 0
                WHERE title = ?";

  $stmt = $this->connect()->prepare($query);
  $result = $stmt->execute([$title]);
  }

}


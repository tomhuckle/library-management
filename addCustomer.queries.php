<?php

class AddCustomers extends Dbh {
  
// INSERT NEW CHALLENGER
  public function addCustomer($newCustomerName, $newCustomerEmail, $newCustomerMobile) {

    // INSERT MEMBER
    $sql = 'INSERT INTO customers(name, email, mobile)
                VALUES (?, ?, ?);';

    // ESTABLISH CONNECTION
    $pdo = $this->connect();
    
    // PREPARE
    $stmt = $pdo->prepare($sql);

    // EXECUTE
    $stmt->execute([$newCustomerName, $newCustomerEmail, $newCustomerMobile]);
  }

}
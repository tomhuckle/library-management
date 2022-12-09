<?php 

class Dbh {

  // CONNECTION BETWEEN SITE AND DATABASE
  protected function connect() {
    try {
      $username = "root";
      $password = "";
      $dbh = new PDO('mysql:host=localhost;dbname=library_management', $username, $password);
      return  $dbh;

    }catch(PDOException $e) {
      print "Error!:  " . $e->getMessage() . "br/>";
      die();
    }
  }
}
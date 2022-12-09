<?php

// CHECK FORM IS POSTED
if (isset($_POST["submit"])) {

  // GET RESULT OF FORM SUBMISSION AND STORE AS VARIABLES
  $rentName = htmlspecialchars($_POST["cus_name"]);
  $rentTitle = htmlspecialchars($_POST["bookTitle"]);

  // INCLUDE ALL RELEVANT FILES
  include "../classes/dbcon.php";
  include "../classes/rentBook.queries.php";

  // CREATE NEW OBJECT
  $newBook = new RentBook($rentTitle);

  $newBook->changeStatus($rentTitle);
  $bookId = $newBook->selectBookId($rentTitle);
  $customerId = $newBook->selectCustomerId($rentName);
  $newBook->recordRental($bookId, $customerId);
  
  header("location:../addBook.php");
}
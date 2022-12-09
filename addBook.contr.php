<?php

session_start();

// CHECK FORM POSTED
if (isset($_POST["submit"])) {

  echo 'The form was submitted!';

  // GET RESULT OF FORM SUBMISSION AND STORE AS VARIABLES
  $newBookTitle = htmlspecialchars($_POST["title"]);
  $newBookAuthor = htmlspecialchars($_POST["author"]);
  $newBookISBN = htmlspecialchars($_POST["isbn"]);




  // INCLUDE ALL RELEVANT FILES
  include "../classes/dbcon.php";
  include "../classes/addBook.queries.php";
  include "../classes/addBook.val.php";

  // CREATE NEW OBJECT
  $newBook = new AddBookVal($newBookTitle, $newBookAuthor, $newBookISBN);

  $newBook->addBook($newBookTitle, $newBookAuthor, $newBookISBN);

  header("location:../addBook.php");
}

if (isset($_POST["delete"])) {

  // GET RESULT OF FORM SUBMISSION AND STORE AS VARIABLES
  $deleteTitle = htmlspecialchars($_POST["title"]);

  // INCLUDE ALL RELEVANT FILES
  include "../classes/dbcon.php";
  include "../classes/addBook.queries.php";
  include "../classes/addBook.val.php";

  $newDelete = new AddBookVal($deleteTitle);
  $newDelete->deleteBook($deleteTitle);
  header("location:../addBook.php");

}

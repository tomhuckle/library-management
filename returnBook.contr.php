<?php

// CHECK FORM IS POSTED
if (isset($_POST["submit"])) {

  // GET RESULT OF FORM SUBMISSION AND STORE AS VARIABLES
  $name = htmlspecialchars($_POST["name"]);
  $title = htmlspecialchars($_POST["title"]);

// INCLUDE ALL RELEVANT FILES
  include "../classes/dbcon.php";
  include "../classes/returnBook.queries.php";

  // CREATE NEW OBJECT
  $return = new ReturnBook($name, $title);

  $return->getBook($title);


  header("location:../addBook.php");

}

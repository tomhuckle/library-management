<?php

// CHECK FORM IS POSTED
if (isset($_POST["submit"])) {

  // GET RESULT OF FORM SUBMISSION AND STORE AS VARIABLES
  $newCustomerName = htmlspecialchars($_POST["name"]);
  $newCustomerEmail = htmlspecialchars($_POST["email"]);
  $newCustomerMobile = htmlspecialchars($_POST["mobile"]);



  // INCLUDE ALL RELEVANT FILES
  include "../classes/dbcon.php";
  include "../classes/addCustomer.queries.php";
  include "../classes/addCustomer.val.php";

  // CREATE NEW OBJECT
  $newCustomer = new AddCustomerVal($newCustomerName, $newCustomerEmail, $newCustomerMobile);

  $newCustomer->addCustomer($newCustomerName, $newCustomerEmail, $newCustomerMobile);

  header("location:../addCustomer.html");

  

}
<?php

  // DATABASE CONNECTION
  $host = "localhost";
  $username = "root";
  $password = "";
  $name = "library_management";

  $dbcon = mysqli_connect('localhost','root','','library_management');

  // DATABSE QUERY
  $query = "SELECT title
              FROM books
             WHERE rent_status = 0";

  $result = mysqli_query($dbcon, $query);

  $query1 = "SELECT name
              FROM customers";

  $result1 = mysqli_query($dbcon, $query1)
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add a book</title>
  <link rel="stylesheet" href="assets/style_css.css">
</head>
<body>
  <div class="nav">
    <ul>
        <li><a href="./addBook.php">Books</a></li>
        <li><a href="./addCustomer.php">Customers</a></li>
        <li><a class="active" href="./rentBook.php">Rentals</a></li>
    </ul>
  </div>

  <div class="container">  
    <form id="contact" action="./controllers/rentBook.contr.php" method="post">
      <h3>Rent a book</h3>
      <h4>Fill out the fields below to asign a book to a customer.</h4>
      <fieldset name="name">
        <select name="cus_name" style="width: 350px; height: 40px;">
        <?php while ($row1 = mysqli_fetch_assoc($result1)) : ?>
          
                <?= "<option>$row1[name]</option>"; ?>
                <?php endwhile ?>
        </select>
      </fieldset>
      <fieldset>
        <select name="bookTitle" style="width: 350px; height: 40px;">
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <?= "<option width=200px> $row[title]</option>"; ?>
                <?php endwhile ?>
        </select>
      </fieldset>
      <fieldset>
        <button name="submit" type="submit"data-submit="...Sending">Submit</button>
      </fieldset>
    </form>
   
    
  </div>

</body>
</html>
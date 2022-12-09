<?php

  // DATABASE CONNECTION
  $host = "localhost";
  $username = "root";
  $password = "";
  $name = "library_management";

  $dbcon = mysqli_connect('localhost','root','','library_management');

  // DATABSE QUERY
  $query = "SELECT first_name, last_name, id
             FROM customers 
             WHERE EXISTS (SELECT 1 
                            FROM rented
                            WHERE rented.customers_id = customers.id)";

  $result = mysqli_query($dbcon, $query);

  $query1 = "SELECT *
              FROM books
              WHERE rent_status = 1";

  $result1 = mysqli_query($dbcon, $query1)
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add a book</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="nav">
  <ul>
      <li><a class="active" href="./addBook.html">Books</a></li>
      <li><a href="./addCustomer.html">Customers</a></li>
      <li><a href="./rentBook.php">Rental</a></li>
    </ul>
  </div>

  <div class="container">  
    <form id="contact" action="./controllers/returnBook.contr.php" method="post">
      <h3>Return a book</h3>
      <h4>Fill out the fields below to return a book.</h4>
      <fieldset>
      <select name="name" style="width: 350px; height: 40px;">
      <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                  <?= "<option width=200px value=$row[first_name]>$row[first_name] $row[last_name]</option>"; ?>
                <?php endwhile ?>
      </select>
      </fieldset>
      <fieldset>
      <select name="title" style="width: 350px; height: 40px;">
      <?php while ($row1 = mysqli_fetch_assoc($result1)) : ?>
                  <?= "<option width=200px value=$row1[title]>$row[title] $row1[title]</option>"; ?>
                <?php endwhile ?>
      </select>
      </fieldset>
        <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
      </fieldset>
    </form>
   
    
  </div>
  

</body>
</html>
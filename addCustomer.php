<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add a customer</title>
  <link rel="stylesheet" href="assets/style_css.css">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

</svg>
</head>
<body>
  <div class="nav">
    <ul>
      <li><a href="./addBook.php">Books</a></li>
      <li><a class="active"  href="./addCustomer.php">Customers</a></li>
      <li><a href="./rentBook.php">Rentals</a></li>
    </ul>
  </div>

  <div class="container">  
    <form id="contact" action="./controllers/addCustomer.contr.php" method="post">
      <h3>Add a customer to the system</h3>
      <h4>Fill out the fields below to add a new customer.</h4>
      <fieldset>
        <input name="name" placeholder="Name..." type="text" tabindex="1" required autofocus>
      </fieldset>
      <fieldset>
        <input name="email" placeholder="Email..." type="email" tabindex="3" required>
      </fieldset>
      <fieldset>
        <input name="mobile" placeholder="Mobile..." type="tel" tabindex="4" required>
      </fieldset>
      <fieldset>
        <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
      </fieldset>
    </form>
  </div>

  <input class="searchBar" type="text" id="myInput" onkeyup="myFunction2()" placeholder="Search for names...">
  <br>
  <table id="myTable">
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Mobile</th>
      <th scope="col">Modify</th>

      
    </tr>
    <?php
    $conn = mysqli_connect("localhost", "root", "", "library_management");
    if ($conn -> connect_error) {
      die("Connection failed:". $conn -> connect_error);
    }

    $sql = "SELECT name, email, mobile from customers";
    $result = $conn -> query($sql);


    if ($result-> num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        echo "<tr><td>". $row["name"] . "</td><td>".$row["email"]."</td><td>".$row["mobile"]."</td><td>"."<button class='table_buttons';>Edit</button>"."<button class='table_buttons2';>Delete</button>"."</tr>";
      }
      echo "</table>";
    }
    else {
      echo "0 result";
    }
    $conn->close();
    ?>
</table>
<br>
<script src="./assets/java.js"></script>
</body>
</html>

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
      <li><a class="active"  href="./addBook.php">Books</a></li>
      <li><a href="./addCustomer.php">Customers</a></li>
      <li><a href="./rentBook.php">Rentals</a></li>
    </ul>
  </div>

  <div class="container">  
    <form id="contact" action="./controllers/addBook.contr.php" method="post">
      <h3>Add a book to the system</h3>
      <h4>Fill out the fields below to add a new library book.</h4>
      <fieldset>
        <input  name="title" placeholder="Book title..." type="text" tabindex="1" required autofocus>
      </fieldset>
      <fieldset>
        <input  name="author" placeholder="Book author..." type="text" tabindex="1" required autofocus>
      </fieldset>
      <fieldset>
        <input  name="isbn" placeholder="ISBN code..." type="text" tabindex="1" required autofocus>
      </fieldset>
        <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
      </fieldset>
    </form>
  </div>

  <input class="searchBar" type="text" id="myInput" onkeyup="myFunction1()" placeholder="Search for books...">
  <br>
  <form action="./controllers/addBook.contr.php" method="post">
    <table id="myTable">
        <tr>
          <th scope="col">Title</th>
          <th scope="col">Author</th>
          <th scope="col">ISBN code</th>
          <th scope="col">Status?</th>
          <th scope="col">Modify</th>

        </tr>
        <?php
        $conn = mysqli_connect("localhost", "root", "", "library_management");
        if ($conn -> connect_error) {
          die("Connection failed:". $conn -> connect_error);
        }

        $sql = "SELECT title, author, isbn_code, rent_status from books";
        $result = $conn -> query($sql);


        if ($result-> num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            if ($row["rent_status"] == 0) {
              $rent_result = "This book is not currently rented!";
            } else {
              $rent_result = "This book is currently being rented!";
            }
            echo "<tr><td>". $row["title"]."</td><td>". $row["author"]."</td><td>".$row["isbn_code"]."</td><td>".$rent_result."</td>
            <td>"."<button type='submit' class='table_buttons';>Edit</button>"
            ."<button class='table_buttons2'name='delete' type='submit' id='contact-submit' data-submit='...Sending'>Delete</button>
            "."</td></tr>";
          }
          echo "</table>";
        }
        else {
          echo "0 result";
        }
        $conn->close();
        ?>
      </table>
    </form>
    <br></br>
    <script src="./assets/java.js"></script>
  </body>
</html>

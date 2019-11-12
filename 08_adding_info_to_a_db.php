<?php
  // set up the connection variables for connecting to the database
  $server = 'localhost';
  $user = 'fraser';
  $password = 'password';
  $database = 'db';
  $connection = mysqli_connect($server,$user,$password,$database);

  if (mysqli_connect_errno()) {
    echo "<h1>Connection Error</h1>";
    echo "Failed to connect to MySQL Database: " . mysqli_connect_error();
    die();
  }
?>

<html>
  <head>
    <title>Comments Recieved</title>
  </head>
  <body>
    <?php
      // get the values encoded in the URL
      $name = $_POST['name'];
      $email = $_POST['email'];
      $comment = $_POST['comment'];

      //execute SQL query to insert new record into comments table
      $query_string = "INSERT INTO comments (name, email, comment) VALUES ('$name', '$email', '$comment')";
      // The query is passed to the server and the result is evaluated true if successful
      if (mysqli_query($connection, $query_string)) {
        // display success message to user
        echo "<p> Thanks for this comment $name ... </p>";
        echo "<p><i>$comment</i></p>";
        echo "<p> We will reply to $email as soon as we can</p>";
      } else {
        echo "<h1>Error Adding Details</h1>";
        echo "Error description: " . mysqli_error($connection) . "<br";
      }
      echo "<button type=button onclick='javascript:history.back()'>Back</button>";
      // close the connection
      mysqli_close($connection);
    ?>
  </body>
</html>

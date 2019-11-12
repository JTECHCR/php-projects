<?php
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
  $username = $_POST['username'];
  $password = $_POST['password'];

  $query_string = "SELECT * FROM logins WHERE username = '$username' AND password = '$password'";
  $result = mysqli_query($connection, $query_string);
  echo "<h1>Search Results</h1>";
  $row_count = mysqli_num_rows($result);

  if ($row_count == 0) {
    echo "There were no results";
  } else {
    echo "<table border=1 <tr> <th>Username</th> <th>Password</th> <tr>";
    echo "<td>";
    echo $username;
    echo "</td>";
    echo "<td>";
    echo $password;
    echo "</td>";
    echo "</tr>";
  }
  mysqli_close($connection);
?>

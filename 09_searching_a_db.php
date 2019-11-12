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
  $month = $_POST['month'];
  $query_string = "SELECT * FROM birthdays WHERE birthday LIKE '%-".$month."-%'";

  // execute query
  $result = mysqli_query($connection, $query_string);
  echo "<h1>Search Results</h1>";
  $row_count = mysqli_num_rows($result);

  if ($row_count == 0) {
    echo "There were no results";
  } else {
    echo 'There are <b>' . $row_count . "</b> result(s) <br><br>";
    echo "<table border=1 <tr> <th>Name</th> <th>Birthday</th> <tr>";
    while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) {
      echo "<td>";
      echo $row['name'];
      echo "</td>";
      echo "<td>";
      echo $row['birthday'];
      echo "</td>";
      echo "</tr>";
    }
  }
  mysqli_close($connection);
?>

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
  $itemID = $_POST['food'];

  $query_string = "DELETE FROM fridge WHERE itemID = '$itemID'";
  if (mysqli_query($connection, $query_string)) {
    echo "<script type='text/javascript'>alert('Item eaten');</script>";
    include '11_deleting_from_a_db.php';
    mysqli_close($connection);
  } else {
    echo "<h1>Error Removing Item</h1>";
    echo "Error description: ".mysqli_error($connection)."<br>";
  }
  echo "<button type='button' onclick='javascript:history.back()'>Back</button>";
?>

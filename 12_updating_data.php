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

  $name = $_POST['name'];
  $mood = $_POST['mood'];

  if ($_POST['action'] == "Change") {
    $query_string = "UPDATE moods SET name = '$name', mood = '$mood' WHERE name = '$name'";
    if (mysqli_query($connection, $query_string)) {
      if (mysqli_affected_rows($connection) <> 0) {
        echo 'Completed: '.$name.' is now feeling '.$mood;
        mysqli_close($connection);
      } else { echo "There were no rows updated";}
    } else {
      echo "Error: Unable to update table";
      echo "Error description:".mysqli_error($connection)."<br>";
    }
    echo "<br><a href='12_updating_data.html'/>Back</a>";
  }

  if ($_POST['action'] == "Add New") {
      $query_string = "INSERT INTO moods (name, mood) VALUES ('$name', '$mood')";
    if (mysqli_query($connection, $query_string)) {
        echo 'Completed: Added '.$name.' is feeling '.$mood.' to the database';
        mysqli_close($connection);
      } else {
        echo "<h1>Error Adding Details</h1>";
        echo "Error description: " . mysqli_error($connection) . "<br>";
      }
    echo "<br><a href='12_updating_data.html'/>Back</a>";
  }
?>

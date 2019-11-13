<html>
  <head>
    <title>Fridge Contents</title>
    <meta charset="utf-8">
  </head>
  <body>
    <h1>Fridge Contents</h1>
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

      $query_string = "SELECT * FROM fridge";
      $result = mysqli_query($connection, $query_string);
      $row_count = mysqli_num_rows($result);?>
      <?php echo "There are <b>$row_count</b> item(s) in the fridge";?>
    <form action='11_deletion.php' method='post'>
      <select>
      <?php
      while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) {
        echo "<option value=".$row['itemID'].">".$row['itemName']."</option>";
      }?>
    </select>
      <input type='submit' value='Eat Item'>
    </form>
  </body>
</html>

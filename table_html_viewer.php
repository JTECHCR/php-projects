<html>
  <head>
    <style type="text/css">
      table {
        border-collapse: collapse;
        width: 100%;
        color: #eb4034;
        font-family: monospace;
        font-size: 25px;
        text-align: left;
      }

      th {
        background-color: #eb4034;
        color: white;
      }

      tr:nth-child(even) {background-color: #ededed}
    </style>
  </head>
  <body>
    <table>
      <tr>
        <th>User ID</th>
        <th>Username</th>
        <th>Password</th>
        <th>Email</th>
        <th>Sign Up Date</th>
      </tr>
      <?php
      $conn = mysqli_connect("localhost", "root", "", "websitedb");
      $sql = "SELECT * FROM users";
      $result = $conn-> query($sql);

      if ($result->num_rows > 0) {
        while ($row = $result-> fetch_assoc()) {
          echo "<tr><td>" . $row["user_id"] . "</td><td>" . $row["user_name"] . "</td><td>" . $row["password"] . "</td><td>" . $row["email"] . "</td><td>" . $row["sign_up_date"] . "</td></tr>";
        }
      }
      else {
        echo "No Results";
      }
      $conn-> close();
      ?>
    </table>
  </body>
</html>

<?php
  // Start the session
  if(session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
    // If the session variable userLogin does not exist then create one.
    if (!isset($_SESSION['userLogin'])) {
      $_SESSION['userLogin'] = False;
    }
  }

  if ($_SESSION['userLogin'] == True) {
    echo "<h1>Welcome</h1>";
    echo "<p>You are logged in</p>";
    ?>
    <form action="14_logout.php" method="post">
      <input type="submit" name="logout" value="Logout">
    </form>
    <?php
  } else {
    echo "<h2>Login</h2>";
    echo "<p>You need to enter the user password to view this content.</p>";
    echo "<form action = 14_login_check.php method='POST'>";
    echo "<input type='password' name='userpassword'>";
    echo "<input type='submit' value='Enter Password'>";
    echo "</form>";
  }
?>

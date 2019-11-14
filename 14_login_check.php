<?php
  // Start the session
  session_start();
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userpass = $_POST['userpassword'];
    if (empty($userpass)) {
      include '14_session_login.php';
      die();
    } else {
      if ($userpass == "letmein") {
        $_SESSION["userLogin"] = True;
        include '14_session_login.php';
        die();
      } else {
        include '14_session_login.php';
        die();
      }
    }
  }
?>

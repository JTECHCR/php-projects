<?php
  // Start the session
  session_start();

  if ($_SERVER['REQUEST_METHOD'] == "POST") {
    session_destroy();
    include '14_session_login.php';
    die();
  }
?>

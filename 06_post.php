<?php
  $name = $_POST['name'];
  $email = $_POST['email'];
  $comment = $_POSR['comment'];
  echo "<p> Thanks for this comment $name ... </p>";
  echo "<p><i> $comment </i></p>";
  echo "<p>We will reply to $email as soon as we can</p>";
?>

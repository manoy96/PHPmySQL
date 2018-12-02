<?php
  //MAKE SURE THE USER IS LOGGED IN BEFOR GOING ANY FURTHER
  if (!isset($_COOKIE['username'])) {
    echo '<p class="login">Please <a href="login.php">Log in</a> to access this page</p>';
    exit();
  }//end IF
?>
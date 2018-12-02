<nav>
  <!-- <p>
    <a href="index.php">Display</a> |
    <a href="newEntry.php">Comment</a> |
    <a href="approve.php">Approve</a>
  </p> -->
  <p>Hello,
    <?php
      if (isset($_COOKIE['username'])){
        echo $_COOKIE['firstname'].' ' .$_COOKIE['lastname'];
        echo ' | <a href="logout.php">signout</a>';
      } else {

        //SHOW MENU TO LOGIN
        echo '<a href="login.php">Login</a>';
      }//end IF
    ?>
  </p>
</nav>
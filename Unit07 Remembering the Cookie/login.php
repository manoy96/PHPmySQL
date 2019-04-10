<?php
  require_once('connectvars.php');

  // Clear the error message
  $error_msg = "";

    if (isset($_POST['submit'])) {



      // Connect to the database
      $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

      // Grab the user-entered log-in data
      $user_username = mysqli_real_escape_string($dbc, trim($_POST['username']));
      $user_password = mysqli_real_escape_string($dbc, trim($_POST['password']));

      if (!empty($user_username) && !empty($user_password)) {
          
        // Look up the username and password in the database
        // Use SHA encoding for the password
        $query = "SELECT * FROM matchmaker_user WHERE username = '$user_username' AND password = '$user_password'";
        $data = mysqli_query($dbc, $query) or die ('query failed');

        if(mysqli_num_rows($data) == 1){

          $row = mysqli_fetch_array($data);

          setcookie("username", $row["username"], time() + (60*60*24*30));
          setcookie("first", $row["first"], time() + (60*60*24*30));
          setcookie("last", $row["last"], time() + (60*60*24*30));

          $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php';
          header('Location: ' . $home_url);
        }

          // The USERNAME/PASSWORD are incorrect -- set an error message
          $error_msg = 'Sorry, you must enter a valid username and password to log in.';
        }
      } 
      else {

        // The USERNAME/PASSWORD were not entered -- set an ERROR MESSAGE
        $error_msg = 'Sorry, you must enter your username and password to log in.';
      }
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Space X - Log In</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
  <h3 class="logo">Space X</h3>
  <h4 class="subtitle">Log In</h4>
  

<?php
  // If session var is empty, show error message and the log-in form; otherwise confirm the log-in
  if (empty($_SESSION['user_id'])) {

    echo '<p class="error">' . $error_msg . '</p>';
?>

  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <fieldset>
      <legend>Log In</legend>
      <label>Username:</label>
      <input type="text" name="username" value="<?php if (!empty($user_username)) echo $user_username; ?>" /><br />
      <label>Password:</label>
      <input type="password" name="password" />
    </fieldset>

    <input class="btn" type="submit" value="Log In" name="submit" />
    
  </form>

<?php
  }
  else {
    // This Confirms the successful log-in
    echo('<p class="login">You are logged in as ' . $_SESSION['username'] . '.</p>');
  }
?>

</body>
</html>
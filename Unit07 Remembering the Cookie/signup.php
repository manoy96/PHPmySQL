<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Space X - Sign Up</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
  <link href="https://fonts.googleapis.com/css?family=Montserrat|Raleway" rel="stylesheet">
</head>
<body>
  <h3 class="logo">Space X</h3>
  <h4 class="subtitle">Sign Up</h4>    
<?php
  require_once('appvars.php');
  require_once('connectvars.php');
  // Connect to database
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  
  if (isset($_POST['submit'])) {
    // Grab profile information from the POST
    $username = mysqli_real_escape_string($dbc, trim($_POST['username']));
    $first = mysqli_real_escape_string($dbc, trim($_POST['first']));
    $last = mysqli_real_escape_string($dbc, trim($_POST['last']));
    $password1 = mysqli_real_escape_string($dbc, trim($_POST['password1']));
    $password2 = mysqli_real_escape_string($dbc, trim($_POST['password2']));

    echo $username;
    echo $password1;
    echo $password2;
    echo $first;
    echo $last;

    if (!empty($username) && !empty($password1) && !empty($password2) && ($password1 == $password2)) {
      // Make sure someone isn't already registered using this username
      $query = "SELECT * FROM matchmaker_user WHERE username = '$username'";
      $data = mysqli_query($dbc, $query)or die('select query failed');
      if (mysqli_num_rows($data) == 0) {
        // The username is unique, so insert the data into the database
        $query = "INSERT INTO matchmaker_user (username, first, last, password) VALUES ('$username', '$first', '$last', SHA('$password1'))";
        mysqli_query($dbc, $query) or die('insert query failed');
        // Confirm success with user
        echo '<p>Your new account has been successfully created. You\'re now ready to <a href="login.php">log in</a>.</p>';
        mysqli_close($dbc);
        exit();
      }
      else {
        // An account already exists for this username, display an error message
        echo '<p class="error">An account already exists for this username. Please use a different address.</p>';
        $username = "";
      }
    }
    else {
      echo '<p class="error">You must enter all of the sign-up data, including the desired password twice.</p>';
    }
  }
  mysqli_close($dbc);
?>
  <p>Please enter your username and desired password to sign up to MatchMaker.</p>
  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <fieldset>
      <legend>Registration Info</legend>
      <label for="username">Username:</label>
      <input type="text" id="username" name="username" value="<?php if (!empty($username)) echo $username; ?>" /><br />
      <label for="first">First Name:</label>
      <input type="text" id="first" name="first" value="<?php if (!empty($first)) echo $first; ?>" /><br />
      <label for="last">Last Name:</label>
      <input type="text" id="last" name="last" value="<?php if (!empty($last)) echo $last; ?>" /><br />
      <label for="password1">Password:</label>
      <input type="password" id="password1" name="password1" /><br />
      <label for="password2">Password (retype):</label>
      <input type="password" id="password2" name="password2" /><br />
    </fieldset>
    <input class="btn" type="submit" value="Sign Up" name="submit" />
  </form>
</body> 
</html>
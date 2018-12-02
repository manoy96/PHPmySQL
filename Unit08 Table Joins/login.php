<?php
  require_once('variables.php');

  //default message to user
  $feedback = '<p><a href="signup.php">Create an account</a></p>';
  //IF THE USER ISN'T LOGGED IN, TRY TO LOG THEM IN
if (isset($_POST['submit'])) {
  # code...
  //CONNECT TO DATABASE
  $dbconnection = mysqli_connect('HOST','USER','PASSWORD','DB_NAME') or die('DATABASE connection failed');

  $username = mysqli_real_escape_string(trim($_POST['username']));
  $password = mysqli_real_escape_string(trim($_POST['password']));

  //LOOK UP THE USERNAME AND PASSWORD IN DATABASE
  $query = "SELECT * FROM users WHERE username = '$username' AND $password = SHA('$password')";
  $data = mysqli_query($dbconnection, $query) or die('query failed');


  if (mysqli_num_rows($data)) {
    # code...
    // echo 'FOUND YOU';

    //MAKE THE COOKIES
    setcookie('username', $row['username'], time() + (60*60*24*30)); //expires in 30 days
    setcookie('firstname', $row['firstname'], time() + (60*60*24*30)); //expires in 30 days
    setcookie('lastname', $row['lastname'], time() + (60*60*24*30)); //expires in 30 days
    header('Location: index.php');


  } else {
    # code...
    // echo 'COULD NOT FIND YOU';

    $feedback = '<p>Could not find an account for '.$_POST('username').'. Would you like to <a href="signup.php">Create a new account</a></p>';

  }
  

}//END POST 


?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Page Title</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
  <script src="main.js"></script>
</head>
<body>


<h1>Log In</h1>

<?php echo $feedback; ?>

<form action="login.php" method="post">
  <fieldset>
    <legend>Log in to an existing account</legend>
    <label><p>Username: </p><input type="text" name="username" class="myInput" value="<?php if (!empty($username)) echo $username; ?>" ></label>
    <label><p>Password: </p><input type="password" name="password" class="myInput" ></label>
  </fieldset>

  <input type="submit" value="Log In" name="submit" >
</form>


<p><a href="index.php">Cancel</a></p>


  
</body>
</html>
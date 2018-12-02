<?php
require_once('variables.php');
  //BUILD THE DATABASE CONNECTIONWITH host, user, pass, database
  $dbconnection = mysqli_connect('HOST','USER','PASSWORD','DB_NAME') or die('DATABASE connection failed');

  //-------IF THE USER HAS FILLED OUT THE FORM AND CLIKCED THE SUBMIT BUTTON THEN DO THIS STUFF
  if (isset($_POST['submit'])) {
    //GRAB DATA FROM GLOBAL POST ARRAY AND REMOVE COMMAS, QUOTES ETC.
    $firstname = mysqli_real_escape_string($dbconnection, trim($_POST['firstname']));
    $lastname = mysqli_real_escape_string($dbconnection, trim($_POST['lastname']));
    $username = mysqli_real_escape_string($dbconnection, trim($_POST['username']));
    $password1 = mysqli_real_escape_string($dbconnection, trim($_POST['password1']));
    $password2 = mysqli_real_escape_string($dbconnection, trim($_POST['password2']));

    if (!empty($username) && !empty($password1) && !empty($password2) && ($password1 == $password2)) {
      echo 'passwords match AND username has a value';

      //MAKE SURE SOMEONE ISN'T ALREADY REGISTERED USING THIS USERNAME
      $query = "SELECT * FROM users WHERE username = '$username'";
      $alreadyexists = mysqli_query($dbconnection ,$query) or die('query failed');

      if (mysqli_num_rows($alreadyexists) == 0) {
        # code...
        echo 'add the new user';

        //INSERT THE DATA
        $query = "INSERT INTO users (firstname, lastname, username, password, date) VALUES ('$firstname', '$lastname', '$username', SHA('$password1'), NOW())";
        mysqli_query($dbconnection ,$query) or die('insert query failed');



        //CONFIRM MESSAGE
        $feedback = '<p>Your new account ahs been successfully created.</p><p>Return to the <a href="index.php">main page</a></p>';


        //MAKE THE COOKIES
        setcookie('username', $username, time() + (60*60*24*30)); //expires in 30 days
        setcookie('firstname', $firstname, time() + (60*60*24*30)); //expires in 30 days
        setcookie('lastname', $lastname, time() + (60*60*24*30)); //expires in 30 days



        //CLOSE THE CONNECTION
        mysqli_close($dbconnection);



        //EXIT THE PAGE
        // exit();


      } else {
        //AN ACCOUNT ALREADY EXISTS FOR THIS USERNAME, SO DISPLAY AN ERROR MESSAGE
        $feedback = '<p class="error">An account aready exists for this username. Please use a different name.</p>';
        $username = '';

      }//END OF USER EXISTS CHECK
    }//END EMPTY CHECK
  }//END ISSET
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

  <h1>Sign Up</h1>
<?php echo $feedback; ?>

<form action="saveToDatabasePractice.php" method="POST" enctype="multipart/form-data" name="travelInfo">

<fieldset>
  <legend>Registration Info</legend>
      <label><span>First</span>
        <input name="first" type="text" class="myInput" placeholder = "John" pattern="[a-zA-Z-]{3,99}" autofocus value="<?php if (!empty($firstname)) echo $firstname; ?>" required></label>

      <label><span>Last</span>
        <input name="last" type="text" class="myInput" placeholder = "Smith" pattern="[a-zA-Z0-9-]{3,99}" value="<?php if (!empty($lastname)) echo $lastname; ?>" required></label>

      <label><span>User Name</span>
        <input name="last" type="text" class="myInput" placeholder = "Smith" pattern="[a-zA-Z0-9-]{3,99}" value="<?php if (!empty($username)) echo $username; ?>" required></label>

      <label><span>Password</span>
        <input name="last" type="password1" class="myInput" required></label>

      <label><span>Confirm Password</span>
        <input name="last" type="password2" class="myInput" required></label>
</fieldset>


    <input type="submit" value="Sign Up" id="submitButton" class="submitButton" name="submit">

    <input type="hidden" name="redirect" value="thanks.html">

</form>




  
</body>
</html>
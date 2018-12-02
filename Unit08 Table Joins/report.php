<?php
  //MAKE SURE THE USER IS LOGGED IN BEFORE GOING ANY FURTHER

  // if (!isset($_COOKIE['username'])) {
  //   echo '<p class="login">Please <a href="login.php">Log in</a> to access this page</p>';
  //   exit();
  // }//end IF
  include_once('protect.php');
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
<?php include_once('navbar.php'); ?>
<h1>Report an Outage</h1>

<form action="#" method="post" enctype="multipart/form-data" >
  <fieldset>
    <legend>Your Info</legend>

    <label><p>Your Name</p><input type="text" name="name" placeholder="location" pattern="[a-zA-Z]{10,99}" required></label>

    <label><p>Customer Account Number</p><input type="number" name="number"  ></label>
  </fieldset>

  <fieldset>
    <label><p>Location</p><input type="text" name="location" placeholder="location" ></label>

    <label><p>Date</p><input type="date" name="date" placeholder="" ></label>

    <label><p>Time</p><input type="time" name="time" placeholder="" ></label>
  </fieldset>
</form>



</body>
</html>
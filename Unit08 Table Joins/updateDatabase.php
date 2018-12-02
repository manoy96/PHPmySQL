<?php
$id = $_POST[id];
$first = $_POST[first];
$last = $_POST[last];
$email = $_POST[email];
$department = $_POST[dept];
$phone = $_POST[phone];



  //BUILD THE DATABASE CONNECTIONWITH host, user, pass, database
$dbconnection = mysqli_connect('localhost','manuele1_3760usr','y(-aJt=?#-!J','manuele1_3760test') or die('connection failed');

//BUILD THE QUERRY
$query = "UPDATE employee_simple SET first='$first', last='$last', dept='$department', phone='$phone' WHERE id=$id";

// //NOW TRY AND TALK TO THE DATABASE
$result = mysqli_query($dbconnection ,$query) or die('query failed');

// WE'RE DONE SO HANG UP
mysqli_close($dbconnection);
?>







<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Page Title</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" media="screen" href="styles.css" />
  <script src="main.js"></script>
</head>
<body>
  <h1>Employee Successfully Added</h1>

  <?php
  echo "$first $last <br>";
  echo "$department <br>";
  echo "$phone <br>";

  echo '<img src="'.$filepath.$filename.'" alt="photo"/>';

  // echo '<br>size--'.$_FILES['photo']['size'];
  // echo '<br>type--'.$_FILES['photo']['type'];
  // echo '<br>temp--'.$_FILES['photo']['tmp_name'];
  // echo '<br>name--'.$_FILES['photo']['name'];

  ?>
</body>
</html>
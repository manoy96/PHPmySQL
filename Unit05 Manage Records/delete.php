<?php 

//BUILD THE DATABASE CONNECTIONWITH host, user, pass, database
$dbconnection = mysqli_connect('localhost','manuele1_3760usr','y(-aJt=?#-!J','manuele1_3760test') or die('connection failed');

//BUILD THE QUERRY
$query = "SELECT * FROM employee_simple ORDER BY last ASC";

// //NOW TRY AND TALK TO THE DATABASE
$result = mysqli_query($dbconnection ,$query) or die('query failed');

?>











<!DOCTYPE <!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Page Title</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,600" rel="stylesheet">
<link href="css/reset.css" rel="stylesheet" type="text/css">
<link href="css/styles.css" rel="stylesheet" type="text/css">
</head>
<body>

  <h1>Delete Employees</h1>

  <?php
  // DISPLAY WHAT WE FOUND
  while ($row = mysqli_fetch_array($result)) {
    echo '<p>';
    echo $row['last'] . ', '. $row['first'].' - '.$row['dept'];
    echo '<a href="delete2.php?id=' .$row['id']. '">Delete</a>';
    echo '</p>';
  };

  mysqli_close($dbconnection);
  ?>










  
</body>
</html>
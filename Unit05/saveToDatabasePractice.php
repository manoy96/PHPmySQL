<?php
$first = $_POST[first];
$last = $_POST[last];
$email = $_POST[email];
$department = $_POST[dept];
$phone = $_POST[phone];
$photo = $_POST[photo];

// make photo path and name
$ext = pathinfo( , PATHINFO_EXTENSION);


$filename = 'employees'





?>







<!DOCTYPE <!DOCTYPE html>
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
  <h1>Test Upload Page</h1>
  <?php

  echo '<br>size--'.$_FILES['photo']['size'];
  echo '<br>type--'.$_FILES['photo']['type'];
  echo '<br>temp--'.$_FILES['photo']['tmp_name'];
  echo '<br>name--'.$_FILES['photo']['name'];

  ?>
</body>
</html>
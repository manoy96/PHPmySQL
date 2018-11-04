<?php
$first = $_POST[first];
$last = $_POST[last];
$email = $_POST[email];
$department = $_POST[dept];
$phone = $_POST[phone];
$photo = $_POST[photo];

// // make photo path and name
$ext = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);

$filename = 'employees/'.$first . $last.'.'.$ext;
echo $filename;


// -------------VERIFY THE IMAGE IS VALID---------
$validImage = true;

// -------------check if image is missing-----------
if ($_FILES['photo']['size'] == 0){
  echo 'OOPS -- you did not select an image!f';
  $validImage = false;
};

//--------------check if image size too large--------
if ($_FILES['phot']['size'] > 204800) {
  echo 'OOPS--That file was larger than 200KB.';
  $validImage = false;
};

if($_FILES['photo']['type'] == 'image/gif' || $_FILES['photo']['type'] == 'image/jpeg' || $_FILES['photo']['type'] == 'image/pjpeg' || $_FILES['photo']['type'] == 'image/png') {
    // that must be proper format
  } 
    else{
    //tell used not correct
    echo 'OOPS--That is the wrong format';
    $validImage = false;
};

if ($validImage == true) {
  //upload the file
  $tmp_name = $_FILES['photo']['tmp_name'];
  move_uploaded_file($tmp_name, $filename);
  @unlink($_FILES['photo']['tmp_name']);

} else {
  //try again
  echo '<a href="add.html">Please try Again.</a>';
};






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
  <h1>Test Upload Page</h1>
  <?php

  echo '<img src="'.$filename.'" alt="photo"/>';

  echo '<br>size--'.$_FILES['photo']['size'];
  echo '<br>type--'.$_FILES['photo']['type'];
  echo '<br>temp--'.$_FILES['photo']['tmp_name'];
  echo '<br>name--'.$_FILES['photo']['name'];

  ?>
</body>
</html>
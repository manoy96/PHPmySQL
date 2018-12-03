<?php
require_once('variables.php');
  //BUILD THE DATABASE CONNECTIONWITH host, user, pass, database
  $dbconnection = mysqli_connect('HOST','USER','PASSWORD','DB_NAME') or die('DATABASE connection failed');

  //GET THE EMPHASIS NAMES FROM THE DATABASE
  $query = "SELECT * FROM dgm_emphasis";
  $resultEmphasis = mysqli_query($dbconnection ,$query) or die('emphasis query failed');

  //GET THE SOFTWARE NAMES FROM THE DATABASE
  $query = "SELECT * FROM dgm_packages ORDER BY package ASC";
  $resultPackage = mysqli_query($dbconnection ,$query) or die('package query failed');


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
  <?php include_once('navbar.php') ?>

<h2>Add a New Student</h2>

<form action="saveToDaBase.php" method="POST" enctype="multipart/form-data" name="travelInfo">

<fieldset>
  <legend>Personal Info</legend>
      <label><span>First</span>
        <input name="first" type="text" class="myInput" placeholder = "John" pattern="[a-zA-Z-]{3,99}" autofocus value="john" required></label>

      <label><span>Last</span>
        <input name="last" type="text" class="myInput" placeholder = "Smith" pattern="[a-zA-Z0-9-]{3,99}" value="appleseed" required></label>

      <label><span>Website</span>
        <input name="website" type="text" class="myInput" value="hhtp://jappleseed.com" placeholder="http://" required></label>
</fieldset>

<fieldset>
  <legend>Gender</legend>
  <label><input type="radio" name="gender" value="1" ><span>Male</span></label>
  <label><input type="radio" name="gender" value="2" ><span>Female</span></label>
</fieldset>

<fieldset>
  <legend>Emphasis</legend>
  <label><p>Please Select an Emphasis</p>
    <select name="emphasis">
      <option>Please Select...</option>

      <?php
        while ($row = mysqli_fetch_array($resultEmphasis)) {
          # code...
          echo '<option value="'.$row['emphasis_id'].'">'.$row['value'].'</option>';
        };
      ?>
    </select>
  </label>
</fieldset>

<fieldset>
  <legend>Software Skills</legend>
  <p>Check the packages you know well:</p>

  <?php
  while ($row = mysqli_fetch_array($resultPackage)) {
    # code...
    echo '<label><input type="checkbox" name="packages[]" value="'.$row['package_id'].'">'.$row['package'].'</label>';


  };
  
  ?>


</fieldset>


    <input type="submit" value="Sign Up" id="submitButton" class="submitButton" name="submit">

    <input type="hidden" name="redirect" value="thanks.html">

</form>



  
</body>
</html>
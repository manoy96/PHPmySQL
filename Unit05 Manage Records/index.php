
<!DOCTYPE HTML>
<HTML>
<head>
<meta charset="UTF-8">
<title>Learn</title>
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,600" rel="stylesheet">
<link href="css/reset.css" rel="stylesheet" type="text/css">
<link href="css/styles.css" rel="stylesheet" type="text/css">
</head>

<body>

<!-- -------------------------------------------------------------------- -->
<main>
  <header>
<h1>Employee Directory</h1>
</header>

  <?php
  // DISPLAY WHAT WE FOUND
  while ($row = mysqli_fetch_array($result)) {
    echo '<p><a href="detail.php?id='.$row['id'].'">';
    echo $row['last'] . ', '. $row['first'].' - '.$row['dept'];
    echo '</a>';
    echo '<a href="update.php?id='. $row['id'] .'> - update</a>';
    echo '</p>';
  };
//we're done so hang up
  mysqli_close($dbconnection);
  ?>


  <?php require_once('footer.php');?>

<form action="saveToDatabasePractice.php" method="POST" enctype="multipart/form-data" name="travelInfo">

<fieldset>
  <legend>Name</legend>
  <section id="fullName" class="normal">
      <label><span>First</span>
        <input name="first" type="text" class="myInput" placeholder = "John" pattern="[a-zA-Z-]{3,99}" autofocus required>
      </label>
    
    <!-- ------------------LAST--------------------------------------- -->
      <label><span>Last</span>
        <input name="last" type="text" class="myInput" placeholder = "Smith" pattern="[a-zA-Z0-9-]{3,99}" required>
      </label>
      

        <!------------------PHONE--------------------------------------- -->
          <label><span>Phone</span>
            <input name="phone" type="phone" class="myInput" placeholder = "xxx-xxx-xxxx" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required>
          </label>
        </section>
</fieldset>

<fieldset>
    <legend>Department</legend>
    <label><span>Please Select:</span>
    <select name="dept">
      <option>Internet Technologies</option>
      <option>Animation</option>
      <option>Audio</option>
      <option>Digital Film</option>
    </select>
    </label>
  </fieldset>

  <fieldset>
      <legend>Photo</legend>
      <label>
        <span>Pick a photo of this employee</span>
        <input type="file" name="photo"><br>
        <span>File must be saved as a .jpg file.</span>
        <span>Please crop to 150px wide X 200px tall before uploading</span>
      </label>
    </fieldset>

    <input type="submit" value="Add Employee" id="submitButton" class="submitButton">

</form>



</main>
</body>
</HTML>
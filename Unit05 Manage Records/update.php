<?php 
$employee_id = $_GET[id];

//BUILD CONNECTION
$dbconnection = mysqli_connect('localhost','manuele1_3760usr','y(-aJt=?#-!J','manuele1_3760test') or die('connection failed');

//DISPLAY SELECTED RECORDS
$query = "SELECT * FROM employee_simple";

// //NOW TRY AND TALK TO THE DATABASE
$result = mysqli_query($dbconnection ,$query) or die('update query failed');

//PUT RESULTS IN A VARIABLE
$found = mysqli_fetch_array($result);
?>




<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Update Employee</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" media="screen" href="css/styles.css" />
  <script src="main.js"></script>
</head>
<body>
<form action="updateDatabase.php" method="POST" enctype="multipart/form-data" name="travelInfo">

    <fieldset>
      <legend>Name</legend>
      <section id="fullName" class="normal">
          <label><span>First</span>
            <input name="first" 
            type="text" 
            class="myInput" 
            pattern="[a-zA-Z-]{3,99}" 
            value="<?php echo $found['first']; ?>"
            autofocus
            required>
          </label>
        
          <label><span>Last</span>
            <input name="last" 
            type="text" 
            class="myInput"  
            pattern="[a-zA-Z0-9-]{3,99}" 
            value="<?php echo $found['last']; ?>"
            required>
          </label>
          
    
              <label><span>Phone</span>
                <input name="phone" 
                type="phone" 
                class="myInput" 
                pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" 
                value="<?php echo $found['phone']; ?>"
                required>
              </label>
            </section>
    </fieldset>

    <fieldset>
        <legend>Department</legend>
        <label><span>Please Select:</span>
        <select name="dept">
        <option><?php echo $found['dept']; ?></option>
        <option>---------------- </option>
          <option>Internet Technologies</option>
          <option>Animation</option>
          <option>Audio</option>
          <option>Digital Film</option>
        </select>
        </label>
      </fieldset>

        <input type="hidden" name="id" value="<?php echo $found['id']; ?>">

        <input type="submit" value="Update Employee" id="submitButton" class="submitButton"> 

    </form>

  
</body>
</html>
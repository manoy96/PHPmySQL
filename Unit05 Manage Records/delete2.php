<?php 
$employee_id = $_GET[id];

//BUILD THE DATABASE CONNECTIONWITH host, user, pass, database
$dbconnection = mysqli_connect('localhost','manuele1_3760usr','y(-aJt=?#-!J','manuele1_3760test') or die('connection failed');

//DELETE SELECTED RECORD (IN FROM POST)
if (isset($_POST['submit'])) {
  echo $_POST['id'];
  echo $_POST['photo'];

  //BUILD A SELECT QUERY
  $query = "DELETE FROM employee_simple WHERE id=$_POST[id]";
  echo $query;

  //NOW TRY AND DELETE THE RECORD
  $result = mysqli_query($dbconnection ,$query) or die('delete query failed');

  // echo $_POST['photo'];
  //delete the image
  @unlink($_POST['photo']);

  //REDIRECT
  header("Location: ");


  // MAKE SURE CODE BELOW DOES NOT GET EXECUTED WHEN WE REDIRECT
  exit;
}





//DISPLAY SELECTED RECORDS
$query = "SELECT * FROM employee_simple WHERE id=employee_simple";

// //NOW TRY AND TALK TO THE DATABASE
$result = mysqli_query($dbconnection ,$query) or die('query failed');

//PUT RESULTS IN A VARIABLE
$found = mysqli_fetch_array($result);


?>







<!DOCTYPE <!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Page Title</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" media="screen" href="css/styles.css" />
</head>
<body>
  <h1>Deleting an Employee</h1>

  <div class="employee">
    <form action="delete2.php" method="POST">
      <?php 
        //DISPLAY WHAT WE FOUND

        echo '<h2>'.$found['first'] .' '. $found['last'].'</h2>';
        echo '<p>';
        echo $found['dept'].'<br>'.$found['phone'];
        echo '</p>'
      ?>

      <input type="hidden" name="photo" value="employees/<?php echo $found['photo']; ?>">
      <input type="hidden" name="id" value="<?php echo $found['id']; ?>">
      <input type="submit" value="DELETE THIS PERSON" name="submit">
      &nbsp; <a href="delete.php">Cancel</a>
    </form>
  </div>
</body>
</html>>
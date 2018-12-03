<?php
  //LOAD THE PAST DATA INTO PHP VARIABLES
  $first = $_POST['fist'];
  $last = $_POST['last'];
  $gender = $_POST['gender'];
  $website = $_POST['website'];
  $emphasis = $_POST['emphasis'];

  echo $first .'<br>';
  echo $last .'<br>';
  echo $gender .'<br>';
  echo $website .'<br>';
  echo $emphasis .'<br>';



  //BUILD THE DATABASE CONNECTIONWITH host, user, pass, database
  require_once('variables.php');
  $dbconnection = mysqli_connect('HOST','USER','PASSWORD','DB_NAME') or die('connection failed');

  //BUILD THE QUERY
  $query = "INSERT INTO dgm_student (first, last, gender, website, emphasis) VALUES ('$first','$last','$gender','$website','$emphasis')";

  $result = mysqli_query($dbconnection, $query) or die('query failed');

  // ----------------------UPDATE THE SOFTWARE SKILLS---------

  //THIS IS THE ID OF THE USER JSUT ADDED
  $recent_id = mysqli_insert_id($dbconnection);

  //LOOP THROUGH THE ARRAY THAT CONTAINS ALL THE PACKAGES THEY SELECTED
  foreach($_POST['packages'] as $package_id) {

    //BUILD THE SELECT QUERY
    $query = "INSERT INTO dgm_softwareskill (id, pakage_id) VALUES ($recent_id, $package_id)";

    //NOW TRY TO DELETE TEH RECORD
    $result = mysqli_query($dbconnection, $query) or die('update software skill query failed');


  }//END FOREACH

//WE'RE DONE SO HANGE UP 
mysqli_close($dbconnection);





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

<p>An entry for <?php $first .' '.$last ?> has been added to the DGM database.</p>
<p><a href="new.php">Add another student</a></p>
<p><a href="index.php">Return to the home page</a></p>




</body>
</html>










<!-- < ?php 
$firstname = $_POST[first];
$lastname = $_POST[last];
$email = $_POST[email];


//BUILD THE DATABASE CONNECTIONWITH host, user, pass, database
$dbconnection = mysqli_connect('localhost','manuele1_3760usr','y(-aJt=?#-!J','manuele1_3760test') or die('connection failed');

//BUILD THE QUERRY
$query = "INSERT INTO employee_simple (first, last, email, dept, phone, photo)".
"VALUES ('$firstname','$lastname','$email')";

// //NOW TRY AND TALK TO THE DATABASE
$result = mysqli_query($dbconnection ,$query) or die('query failed');

// WE'RE DONE SO HANG UP

mysqli_close($dbconnection);

?>




<!DOCTYPE html>
 <head>
   <meta charset="UTF-8">
  <title>email sent</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,600" rel="stylesheet">
  <link href="css/reset.css" rel="stylesheet" type="text/css">
  <link href="css/styles.css" rel="stylesheet" type="text/css">
 </head>
 <body>
   <main>
   <header>
    <h1>Congrats</h1>
   </header>
   <p>Thanks < ?php echo $firstname;?> for signing up for our newsletter < ?php echo $email;?></p>
  
  </main>
 </body>
</html> -->
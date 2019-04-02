<?php 
//BUILD THE DATABASE CONNECTIONWITH host, user, pass, database
$dbconnection = mysqli_connect('localhost','manuele1_3760usr','y(-aJt=?#-!J','manuele1_3760test') or die('connection failed');

//QUERY
$query = "SELECT * FROM employee_simple";

// //NOW TRY AND TALK TO THE DATABASE
$result = mysqli_query($dbconnection ,$query) or die('query failed');
?>




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
    echo '<p><a class="myUser" href="detail.php?id='.$row['id'].'">';
    echo $row['last'] .', '. $row['first'].' - '.$row['dept'].' - ';
    echo '</a>';
    echo '<a class="update" href="update.php?id='.$row['id'].'">update</a>';
    echo '</p>';
  };
//we're done so hang up
  mysqli_close($dbconnection);
  ?>
  <nav>
  <a class="links" href="delete.php">Delete Employee</a> |
  <a class="links" href="add.html">Add Employee</a> |
  <a class="links" href="update.php">Update Employee</a>
</nav>
</main>
</body>
</HTML>
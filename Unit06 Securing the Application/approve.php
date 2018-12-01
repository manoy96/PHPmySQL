<?php
  require_once('variables.php');

  //BUILD THE DATABASE CONNECTIONWITH host, user, pass, database
  $dbconnection = mysqli_connect(HOST,USER,PASSWORD,DB_NAME) or die('connection failed');

  //QUERY
  $query = "SELECT * FROM blog WHERE approved=0 ORDER BY date";

  //NOW TRY AND TALK TO THE DATABASE
  $result = mysqli_query($dbconnection ,$query) or die('query failed');

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

  <div id="container">

    <?php include_once('navbar.php'); ?>

    <h1>Blog Comments</h1>

    <?php
      


      //DISPLAY WHAT WE FOUND
      while ($row = mysqli_fetch_array($result)) {
        echo '<article>';
        echo '<a class="approve"> href=approve2.php?id='.$row['id'].'>Approve</a>';
        echo '<a class="delete"> href=delete.php?id='.$row['id'].'>Delete</a>';
        echo '<h3>'.$row['name'].'</h3>';
        echo '<p class="topic">'.$row['topic'].'</p>';
        echo '<p>'.$row['comment'].'</p>';
        echo '<p class="date">'.$row['date'].'</p>';
        echo '</article>';
      }//end WHILE



    ?>



  </div>
  
</body>
</html>
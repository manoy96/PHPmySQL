<?php 
$fullname = $_POST[fullName];
$email = $_POST[email];
$address = $_POST[address];
$crust = $_POST[crust];
$topping = $_POST[topping];


//BUILD THE DATABASE CONNECTIONWITH host, user, pass, database
$dbconnection = mysqli_connect('localhost','manuele1_3760usr','&e,U[D6,=d~#','manuele1_dgm3760') or die('connection failed');

//BUILD THE QUERRY
// $query = "
// INSERT INTO pizza_inquires(id, name, email, crust, topping) 

// VALUES (2, 'terry','me@u.com','thin','hawaiian')
// ";

// //NOW TRY AND TALK TO THE DATABASE
// $result = mysqli_query($dbconnection, $query) or die ('query failed');

//WE'RE DONE SO HANG UP

// mysqli_close($dbconnection);
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
   <header>
    <h1>Congrats</h1>
   </header>
   <p>Thanks <?php echo $fullname;?> for placing an order with us. </p>
  
   
 </body>
</html>
<?php 
$fullname = $_POST[fullName];
$email = $_POST[email];
$address = $_POST[address];
$crust = $_POST[crust];
$topping = $_POST[topping];


// echo $fullname;
// echo $email;
// echo $content;


//BUILD THE DATABASE CONNECTIONWITH host, user, pass, database
$dbconnection = mysqli_connect('localhost', 'manuele1', '?5.zAVjLAwZ', 'pizza_inquires') or die ('connection failed');

//BUILD THE QUERRY


//NOW TRY AND TALK TO THE DATABASE


//WE'RE DONE SO HANG UP

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
   <p>We will deliver your <?php echo $topping;?> with <?php echo $crust;?> in under 30 minutes to <?php echo $address; ?>.</p><br>
   <p>If there's any problem with your order we will reach out to you at, <?php echo $email; ?></p>
   
   <p>Sincerely,<br>Manuel Espinoza</p>


   
 </body>
</html>
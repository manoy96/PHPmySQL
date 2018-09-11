<?php 
$fullname = $_POST[fullName];
$email = $_POST[email];
$address = $_POST[address];
$crust = $_POST[crust];
$topping = $_POST[topping];


// echo $fullname;
// echo $email;
// echo $content;

//BUILD EMAIL
$to = 'mfewcar@gmail.com';
$subject = 'Thanks for enjoying pizza';
$message = "$fullname has placed an order with the email: $email. One $topping pizza, with $crust crust."; 


//SEND EMAIL
mail($to, $subject, $message, 'FROM:'.$email);




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
   <p>Thanks <?php echo $fullname;?> for placing an order with us. </p>
   <p>We will deliver your <?php echo $topping;?> with <?php echo $crust;?> in under 30 minutes to <?php echo $address; ?>.</p><br>
   <p>If there's any problem with your order we will reach out to you at, <?php echo $email; ?></p><br>
   
   <p>Sincerely,<br><br>Manuel Espinoza</p>


   </main>
 </body>
</html>
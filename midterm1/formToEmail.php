<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Research Division</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
    
    <h2>Contact Employees</h2>

  <hr />


<?php
include('navigation.php'); 
    
  require_once('imagevars.php');
  require_once('connectvars.php'); 
    
$fullname = $_POST['fullname'];
$subject = $_POST['subject'];
$visitor_email = $_POST['email'];
$message = $_POST['message'];
$email_from = "mfewcar";
$email_subject = "New submission";
$email_body = "New message from $fullname.\n".
    "Message\n $message\n". 
    
$to = $_POST['contactEmployee'];    
    
    echo "Thank you $fullname.\n<br>". 
        "<p>Your message has been received and I will get back to you as soon as possible.</p><br><br>"; 

$headers = "From: $email_from \r\n";
$headers .= "Reply-To: $visitor_email \r\n";
mail($to,$email_subject,$email_body,$headers)
    
  
?>
      
    <?php 
    include 'footer.php'; 
?>
    
</div>
</div>
</body>
</html>
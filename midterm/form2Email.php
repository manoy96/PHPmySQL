<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Research Division</title>
  <link rel="stylesheet" type="text/css" href="styles.css" />
</head>
<body>
    
    
    <h2>Contact Employees</h2>
    


<?php
include_once('navbar.php'); 
    
  require_once('picVars.php');
  require_once('variables.php'); 
    
$fullname = $_POST['fullname'];
$subject = $_POST['subject'];
$visitor = $_POST['email'];
$message = $_POST['message'];
$from = "company@resdiv.com";
$eSubject = "New Message";
$eBody = "New message from $fullname.\n".
    "Message:\n $message\n". 
    
$to = $_POST['contactEmployee'];    
    
    echo "Thank you for your message $fullname.\n<br>". 
        "<p>Message Received. We will get back to you shortly</p><br><br>"; 
$headers = "From: $from \r\n";
$headers .= "Reply-To: $visitor \r\n";
mail($to,$eSubject,$eBody,$headers)
    
  
?>
      
    <?php include 'footer.php'; ?>
    
</div>
</div>
</body>
</html>
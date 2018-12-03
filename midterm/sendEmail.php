<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Research Division</title>
  <link rel="stylesheet" type="text/css" href="styles.css" />
</head>
<body>
    
    <h2>Contact Form</h2>
    

<?php
  include('navbar.php'); 
    
  require_once('picVars.php');
  require_once('variables.php');    
    
$to = 'mfe96@live.com';    
$subject = 'Test';    
    
$text = $_POST['This is a message'];

//CONNECT TO DATABASE
$dbconnection = mysqli_connect('HOST','USER','PASSWORD','DB_NAME') or die('DATABASE connection failed');

//QUERY
$query = "SELECT * FROM employee_team";
$result = mysqli_query($dbconnection, $query) or die('DATABASE connection failed');
    
while($row = mysqli_fetch_array($result)) {

    $message = "Hello $fullname, \n $text";
    $head = 'From: webmaster@example.com' . "\r\n" . 'Reply-To: webmaster@example.com' . "\r\n" . 'X-Mailer: PHP/' . phpversion();
    
    mail($to, $subject, $message, $head);
    echo 'Sent to: ' . $to .'<br>'; 
}
    mysqli_close($dbconnection);
    
    
    include 'footer.php';
?>
</div>
</div>
</body> 
</html> 
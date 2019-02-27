<?php
$subject = $_POST[subject];
$message = $_POST[message];
$from = $_POST['mfewcar@gmail.com'];



//BUILD THE DATABASE CONNECTIONWITH host, user, pass, database
$dbconnection = mysqli_connect('localhost','manuele1_3760usr','y(-aJt=?#-!J','manuele1_3760test') or die('connection failed');

//BUILD THE QUERY
$query = "SELECT * FROM Newsletter";

// //NOW TRY AND TALK TO THE DATABASE
$result = mysqli_query($dbconnection ,$query) or die('query failed');

//WE'RE DONE SO HANG UP
mysqli_close($dbconnection);

//DISPLAY WHAT WE FOUND
while ($row = mysqli_fetch_array($result)) {
  $first_name = $row['first'];
  $last_name = $row['last'];
  $to = $row['email'];

  $newMessage = "Dear $first_name $last_name, \n $message";

  mail($to, $subject, $newMessage, 'FROM:'.$from);

  echo'Message sent to' . $to . '<br>';
};
?>

























<!DOCTYPE HTML>
<HTML>
<head>
<meta charset="UTF-8">
<title>Send</title>
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,600" rel="stylesheet">
<link href="css/reset.css" rel="stylesheet" type="text/css">
<link href="css/styles.css" rel="stylesheet" type="text/css">
</head>

<body>

<!-- --------------------------------MAIN CONTENT---------------------- -->
<main>
<form class="myForm" action="saveToDaBase.php" method="POST" enctype="multipart/form-data">
<!-- ------------------SUBJECT--------------------------------------- -->
  <section id="fullName" class="normal">
  <label ><span>Subject</span>
    <input name="subject" type="text" class="myInput" placeholder = "Subject" autofocus required>
  </label>
  </section>

<!-- ------------------MESSAGE--------------------------------------- -->
<section id="fullName" class="normal">
  <label ><span>Message</span>
    <input name="message" type="text" class="myInput" placeholder = "Message Here" autofocus required>
  </label>
  </section>
<!-- ------------------EMAIL--------------------------------------- -->
  <!-- <section id="fullName" class="normal">
    <label ><span>Email*</span>
      <input name="email" type="email" class="myInput" placeholder = "j.smith@email.com" autofocus required>
      <div>Please provide your email address</div>
    </label>
    </section> -->

  
  <input type="submit" value="SUBMIT" id="submitButton" class="submitButton">
  
  </form>
  
</main>
<!-- ---------------------------END MAIN----------------------- -->
</body>
</HTML>
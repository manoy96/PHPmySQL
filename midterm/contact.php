<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Research Division</title>
  <link rel="stylesheet" type="text/css" href="styles.css" />
</head>
<body>

    <h2>Contact Us</h2>
        
               
  <p>If you have any questions</p>


<?php
include('navbar.php'); 
    
  require_once('picVars.php');
  require_once('variables.php'); 
    
    ?>


    <main>
        <p>Contact Form</p>

       <form enctype="multipart/form-data" class="contact-form" action="form2Email.php" method="post">
           
           
           
           
        <?php
          //CONNECT TO DATABASE
          $dbconnection = mysqli_connect(HOST,USER,PASSWORD,DB_NAME) or die('DATABASE connection failed');

          // QUERY
          $query = "SELECT * FROM employee_directory";
          $data = mysqli_query($dbconnection, $query) or die('CONTACT DATABASE connection failed');

		    echo 'Who is this message for: <br><br>'; 
		    while ($row = mysqli_fetch_array($data)) { 
				echo '<input type="checkbox" name="contactEmployee" value="contactEmployee">'.$row['fullname'].' - '.$row['email'].'<br>';
		   } 
           echo '<br>';
		?> 

<!-- <select>
            <option value="email" name="email">Email</option>
           </select><br><br> -->
            
            <label for="fullname">Full Name:</label>
            <input type="text" name="fullname" placeholder="Full Name" value="">
            <label for="email">Email:</label>
            <input type="text" name="email" placeholder="Your Email" value="">
            <label for="subject">Subject:</label>
            <input type="text" name="subject" placeholder="Subject" value="">
            <label for="message">Message:</label>
            <textarea name="message" placeholder="Message" value=""></textarea>
            <input type="submit" value="SEND" name="submit">
        </form>
</main>
    

    <?php 
    include 'footer.php'; 
?>

</div>
</body>
</html>
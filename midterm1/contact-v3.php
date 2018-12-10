<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Research Division</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
    
    <h2>Contact Employees</h2>
        
                

  <h2>Questions or Comments</h2>
  <hr />

<?php
include('navigation.php'); 
    
  require_once('imagevars.php');
  require_once('connectvars.php'); 
    
    ?>


    <main>
        <p>Contact</p>

       <form enctype="multipart/form-data" class="contact-form" action="formToEmail.php" method="post">
           
           
           
           
        <?php
      $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 

		  // data SELECT
		  $query = "SELECT * FROM employee_team";
      $data = mysqli_query($dbc, $query);
      
        echo 'Who is this message for: <br><br>'; 
        
		    while ($row = mysqli_fetch_array($data)) { 

				echo '<input type="checkbox" name="contactEmployee" value="contactEmployee">&nbsp;'.$row['fullname'].' - '.$row['email'].'<br>';
       } 
       
		?> 
            
            <label>Full Name:</label>
            <input type="text" name="fullname" placeholder="Full Name">
            <label>Email:</label>
            <input type="text" name="email" placeholder="Email">
            <label>Subject:</label>
            <input type="text" name="subject" placeholder="Subject">
            <label>Message:</label>
            <textarea name="message" placeholder="Comment"></textarea>

            <input type="submit" value="Message" name="submit">

        </form>
</main>
    

    <?php 
    include 'footer.php'; 
?>

</body>
</html>
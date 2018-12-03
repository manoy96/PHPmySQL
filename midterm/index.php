<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Research Division</title>
  <link rel="stylesheet" type="text/css" href="styles.css" />
</head>
<body>
    
 
    <h2>Employees</h2>
        
    
  <p>Welcome new employees!</p>
  <h3>New employees please obtain your username and password from Human Resources (Cindy Thompson).</h3>
    

<?php
    
  include('navbar.php'); 
    
  require_once('picVars.php');
  require_once('variables.php');

  //CONNECT TO DATABASE
  $dbconnection = mysqli_connect('HOST','USER','PASSWORD','DB_NAME') or die('DATABASE connection failed');

  // Retrieve the score data from MySQL
  $query = "SELECT * FROM employee_team WHERE approved = 1";
  $data = mysqli_query($dbconnection, $query) or die('DATABASE connection failed');

  // DATA LOOP
  echo '<table>';  
  $i = 0;

  while ($row = mysqli_fetch_array($data)) { 

    // DISPLAY DATA
    if ($i == 0) {
 
      echo '<tr><td class="employeeheader"><i class="fa fa-user-circle-o" style="font-size:20px;color:#0099e6"></i>&nbsp;Employees</td></tr>';
    }
      
    if (is_file(uploadPath . $row['picture']) && filesize(uploadPath . $row['picture']) > 0) {

      echo '<td colspan="2"><img class="profile" src="' . uploadPath . $row['picture'] . '" /></td>';

    } else {

      echo '<td colspan="2"><img class="profile" src="' . uploadPath . 'unverified.gif' . '" alt="Unverified image" /></td>';

    } 

    // echo '<tr><td class="employeeinfo"></td></tr>';
    echo '<tr><td><strong>Full Name:  </strong>   ' . $row['fullname'] . '</td></tr>';
    echo '<tr><td><strong>Expertise:  </strong>   ' . $row['expertise'] . '</td></tr>';
    echo '<tr><td><strong>Expertise Description:  </strong>   ' . $row['expertiseDesc'] . '</td></tr>';
    echo '<tr><td><strong>Phone:  </strong>   ' . $row['phone'] . '</td></tr>';
    echo '<tr><td><span style="color:#0099cc"><a class="highlight" href="contact-v3.php"><strong>Email:  </strong>   ' . $row['email'] . '</a></span></td></tr>';
    echo '<tr><td></td></tr>';  
    $i++;
  }
  echo '</table>';
  mysqli_close($dbconnection);
    
    include 'footer.php';
?>

</body> 
</html>
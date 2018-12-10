<?php include 'authorize.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title></title>
  <link rel="stylesheet" type="text/css" href="styles.css" />
</head>
<body>
    
    <h2>Admin Page</h2>
        
        
  <p>Admin page</p>
<?php
  include_once('navbar.php');
    
      
    
  require_once('picVars.php');
  require_once('variables.php');
    
  //CONNECT TO DATABASE
  $dbconnection = mysqli_connect(HOST,USER,PASSWORD,DB_NAME) or die('DATABASE connection failed');

  // QUERY
  $query = "SELECT * FROM employee_directory";
  $data = mysqli_query($dbconnection, $query) or die('ADMIN DATABASE connection failed');

  // // Loop through the array of employee data, formatting it as HTML 
  echo '<table class="editTable">';
  // echo '<tr><th>ID</th><th>Full Name</th><th>Expertise</th><th>Phone</th><th>Email</th><th>Expertise Description</th><th>Action</th></tr>';

  while ($row = mysqli_fetch_array($data)) { 

    // Display the employee data
    echo '<td>' . $row['id'] . '</td>';
    echo '<td><a href="profile.php">' . $row['fullname'] . '</a></td>';
    echo '<td>' . $row['expertise'] . '</td>';
    echo '<td>' . $row['phone'] . '</td>';
    echo '<td>' . $row['email'] . '</td>';
    echo '<td>' . $row['specialization'] . '</td>';
      
    echo '<td><a href="delete.php?id=' . $row['id'] . '&amp;fullname=' . $row['fullname'] .
      '&amp;expertise=' . $row['expertise'] . '&amp;email=' . $row['email'] . '&amp;phone=' . $row['phone'] . '&amp;specialization=' . $row['specialization'] . '&amp;picture=' . $row['picture'] . '">Remove</a>';
      
    if ($row['approved'] == '0') {
      echo ' / <a href="approve.php?id=' . $row['id'] . '&amp;fullname=' . $row['fullname'] .
        '&amp;expertise=' . $row['expertise'] . '&amp;email=' . $row['email'] . '&amp;phone=' . $row['phone'] . '&amp;specialization=' . $row['specialization'] . '&amp;picture=' . $row['picture'] . '">Approve</a>';
    }
    echo '</td></tr>';
  }
  echo '</table>';
  mysqli_close($dbconnection);
    
?>
    
<?php
        include 'footer.php';
    ?>
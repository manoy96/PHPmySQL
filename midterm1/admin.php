<?php include 'authorize.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Research Division Admin</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
    

    <h2>Admin</h2>
   
  <p>Research Division - My Admin</p>
  <hr />
<?php
  include 'navigation.php';
    
      
    
  require_once('imagevars.php');
  require_once('connectvars.php');
    
  // Connect to  database 
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

  // SELECT data
  $query = "SELECT * FROM employee_team";
  $data = mysqli_query($dbc, $query);

  // Loop through data
  echo '<table class="editTable">';
  echo '<tr><th>ID</th><th>Full Name</th><th>Expertise</th><th>Phone</th><th>Email</th><th>Expertise Description</th><th>Action</th></tr>';

  while ($row = mysqli_fetch_array($data)) { 

    // Display data
    echo '<td>' . $row['id'] . '</td>';
    echo '<td><a href="profile.php">' . $row['fullname'] . '</a></td>';
    echo '<td>' . $row['expertise'] . '</td>';
    echo '<td>' . $row['phone'] . '</td>';
    echo '<td>' . $row['email'] . '</td>';
    echo '<td>' . $row['expertiseDesc'] . '</td>';
      
    echo '<td><a href="remove_employee.php?id=' . $row['id'] . '&amp;fullname=' . $row['fullname'] .
      '&amp;expertise=' . $row['expertise'] . '&amp;email=' . $row['email'] . '&amp;phone=' . $row['phone'] . '&amp;expertiseDesc=' . $row['expertiseDesc'] . '&amp;employeeImg=' . $row['employeeImg'] . '">Remove</a>';
      
    if ($row['approved'] == '0') {

      echo ' / <a href="approve_employee.php?id=' . $row['id'] . '&amp;fullname=' . $row['fullname'] .
        '&amp;expertise=' . $row['expertise'] . '&amp;email=' . $row['email'] . '&amp;phone=' . $row['phone'] . '&amp;expertiseDesc=' . $row['expertiseDesc'] . '&amp;employeeImg=' . $row['employeeImg'] . '">Approve</a>';
    }

    echo '</td></tr>';
  }
  echo '</table>';

  mysqli_close($dbc);
    
?>
    
<?php
        include 'footer.php';
    ?>
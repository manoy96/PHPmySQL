<?php
  require_once('authorize.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Research Division - Remove Employee Information</title>
  <link rel="stylesheet" type="text/css" href="styles.css" />
</head>
<body>
    
    <h2>Remove Employees</h2>

<?php
  include 'navbar.php';    
    
  require_once('picVars.php');
  require_once('variables.php');

  if (isset($_GET['id']) && isset($_GET['fullname']) && isset($_GET['expertise']) && isset($_GET['phone']) && isset($_GET['email']) && isset($_GET['specialization']) && isset($_GET['picture'])) {

    // Grab the employee data from the GET
    $id = $_GET['id'];
    $fullname = $_GET['fullname'];
    $expertise = $_GET['expertise'];
    $phone = $_GET['phone'];
    $email = $_GET['email'];
    $specialization = $_GET['specialization'];
    $picture = $_GET['picture'];    

  }
  else if (isset($_POST['id']) && isset($_POST['fullname']) && isset($_POST['expertise']) && isset($_POST['phone']) && isset($_POST['email']) && isset($_POST['specialization'])) {

    // Grab the score data from the POST
    $id = $_POST['id'];
    $fullname = $_POST['fullname'];
    $expertise = $_POST['expertise'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $specialization = $_POST['specialization'];

  } else {

    echo '<p class="error">Sorry, no employee information was specified for removal.</p>';
  }

  if (isset($_POST['submit'])) {

    if ($_POST['confirm'] == 'Yes') {

      // Delete the screen shot image file from the server
      @unlink(GW_UPLOADPATH . $picture);
        
      //CONNECT TO DATABASE
      $dbconnection = mysqli_connect('HOST','USER','PASSWORD','DB_NAME') or die('DATABASE connection failed');

      // Delete the score data from the database
      $query = "DELETE FROM employee_team WHERE id = $id LIMIT 1";
      mysqli_query($dbconnection, $query) or die('DATABASE connection failed');
      mysqli_close($dbconnection);

      // Confirm success with the user
      echo '<p>The employee information for ' . $fullname . ' was successfully removed.';
    }else {

      echo '<p class="error">The employee information was not removed.</p>';
    }
  }  else if (isset($id) && isset($fullname) && isset($expertise) && isset($phone) && isset($email) && isset($specialization)) {
    
    echo '<p>Are you sure you want to delete the following employee information?</p>';
    echo '<p><strong>Full Name: </strong>' . $fullname . '<br /><strong>Expertise: </strong>' . $expertise . '<br /><strong>Phone: </strong>' . $phone . '<br /><strong>Email: </strong>' . $email . '<br /><strong>Expertise Description: </strong>' . $specialization . '</p>';
      
    echo '<form method="post" action="remove_employee.php">';
    echo '<input type="radio" name="confirm" value="Yes" /> Yes ';
    echo '<input type="radio" name="confirm" value="No" checked="checked" /> No <br /><br />';
    echo '<input type="submit" value="Submit" name="submit" />';
    echo '<input type="hidden" name="id" value="' . $id . '" />';
    echo '<input type="hidden" name="fullname" value="' . $fullname . '" />';
    echo '<input type="hidden" name="expertise" value="' . $expertise . '" />';
    echo '<input type="hidden" name="phone" value="' . $phone . '" />';
    echo '<input type="hidden" name="email" value="' . $email . '" />';
    echo '<input type="hidden" name="specialization" value="' . $specialization . '" />';
    echo '</form>';
  }
  echo '<p><a href="admin.php">&lt;&lt; Back to Admin page</a></p>';
  
  include 'footer.php';
?>

        </div></div>
</body> 
</html>
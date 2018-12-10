<?php
require_once('picVars.php');
require_once('variables.php');
    
if (isset($_POST['submit'])) {
  //CONNECT TO DATABASE
  $dbconnection = mysqli_connect(HOST,USER,PASSWORD,DB_NAME) or die('ADD DATABASE connection failed');

  // GET EMPLOYEE DATA

  //name
  $fullname = mysqli_real_escape_string($dbconnection, trim($_POST['fullname']));
  //expertise
  $expertise = mysqli_real_escape_string($dbconnection, trim($_POST['expertise']));
  //email
  $email = mysqli_real_escape_string($dbconnection, trim($_POST['email']));
  //phone
  $phone = mysqli_real_escape_string($dbconnection, trim($_POST['phone']));
  //paragraph about their specialization
  $specialization = mysqli_real_escape_string($dbconnection, trim($_POST['specialization']));
  //picture
  $picture = mysqli_real_escape_string($dbconnection, trim($_FILES['picture']['name']));
  $picType = $_FILES['picture']['type'];
  $picSize = $_FILES['picture']['size']; 



    
  if (!empty($fullname) && !empty($expertise) && !empty($email) && !empty($phone) && !empty($specialization) && !empty($picture)) {

    if ((($picType == 'image/gif') || ($picType == 'image/jpeg') || ($picType == 'image/pjpeg') || ($picType == 'image/png'))  && ($picSize > 0) && ($picSize <= fileSize)) {  

        if ($_FILES['picture']['error'] == 0) {    

        $target = uploadPath . $picture;

        if (move_uploaded_file($_FILES['picture']['tmp_name'], $target)) {

          // INSERT DATA INTO DATABASE
          $query = "INSERT INTO employee_directory (fullname, expertise, email, phone, specialization, picture, approved) VALUES ('$fullname', '$expertise', '$email', '$phone', '$specialization', '$picture', 0)";
          
          mysqli_query($dbconnection, $query)or die('query failed');
            
          // CONFIRM USER
          echo '<p>Thanks for adding your new employee information! It will be reviewed and added to the employee page as soon as possible.</p>';
          echo '<p>Full Name: ' . $fullname . '</p>';
          echo '<p>Expertise: ' . $expertise . '</p>';
          echo '<p>Email: ' . $email . '</p>';
          echo '<p>Phone: ' . $phone . '</p>';
          echo '<p>Specialization Paragraph: ' . $specialization . '</p>';
          echo '<img src="' . uploadPath . $picture . '" />';
          echo '<p><a href="index.php"> Return to Employee Info</a></p>';
            
          // Clear the employee data to clear the form
          $fullname = "";
          $expertise = "";
          $email = "";
          $phone = "";
          $specialization = "";
          $picture = "";
            
          mysqli_close($dbconnection); 
        }
        else {
          echo '<p>Image Upload Failed</p>';
        }
      }      
    } else { echo '<p>file must be greater than '.(fileSize / 1024).' KB in size.</p>';      }
      

    @unlink($_FILES['picture']['tmp_name']);
  }
  else {
    echo '<p class="error">Please enter all of the employee information requested to add your new employee page.</p>';
  }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>add employee</title>
  <link rel="stylesheet" type="text/css" href="styles.css" />
</head>
<body>
    <h2>Add Employee Info</h2>

<?php include_once('navbar.php'); ?>

  <form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  <fieldset>
      <input type="hidden" name="fileSize" value="<?php echo fileSize; ?>" />
        
      <label><p>Full Name:</p><input type="text" id="fullname" name="fullname" value="<?php if (!empty($fullname)) echo $fullname; ?>" /></label>
        
      <label><p>Expertise:</p><input type="text" id="expertise" name="expertise" value="<?php if (!empty($expertise)) echo $expertise; ?>" /></label>
        
      <label><p>Email:</p><input type="text" id="email" name="email" value="<?php if (!empty($email)) echo $email; ?>" /></label>
        
      <label><p>Phone:</p><input type="text" id="phone" name="phone" value="<?php if (!empty($phone)) echo $phone; ?>" /></label>
        
      <label><p>Specialization</p><input type="text" id="specialization" name="specialization" value="<?php if (!empty($specialization)) echo $specialization; ?>" /></label>
        
      <label><p>Employee Picture:</p>
      <input type="file" id="picture" name="picture" /><br>
      <br>
      <input type="submit" value="Add" name="submit" /></label>
  </fieldset>

  </form>
    <?php include 'footer.php'; ?>
</body> 
</html>
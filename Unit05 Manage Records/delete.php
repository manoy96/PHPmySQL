<!DOCTYPE <!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Page Title</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,600" rel="stylesheet">
<link href="css/reset.css" rel="stylesheet" type="text/css">
<link href="css/styles.css" rel="stylesheet" type="text/css">
</head>
<body>

  <h1>Delete Employees</h1>

  <?php
  // DISPLAY WHAT WE FOUND
  while ($row = mysqli_fetch_array($result)) {
    echo '<p>';
    echo $row['last'] . ', '. $row['first'].' - '.$row['dept'];
    echo '</p>'
  };

  mysqli_close($dbconnection);
  ?>









  
</body>
</html>
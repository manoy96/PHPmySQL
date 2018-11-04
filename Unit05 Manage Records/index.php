<!DOCTYPE HTML>
<HTML>
<head>
<meta charset="UTF-8">
<title>Learn</title>
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,600" rel="stylesheet">
<link href="css/reset.css" rel="stylesheet" type="text/css">
<link href="css/styles.css" rel="stylesheet" type="text/css">
</head>

<body>

<!-- -------------------------------------------------------------------- -->
<main>
  <header>
<h1>Learn</h1>
</header>

<section id="formProblems" class="hiddenErrorMsg">There was a problem with your submission.
  <div>Errors have been <i>highlighted</i> below.</div>
  </section>

  <form action="<?php $SERVER['PHP_SELF'];?>" method="POST">
    <fieldset>
      <legend>Using as Array</legend>
      <p>Please select the people for the array</p>


     <?php
        //BUILD THE DATABASE CONNECTION WITH host, user, pass, database
        $dbconnection = mysqli_connect('localhost','manuele1_3760usr','y(-aJt=?#-!J','manuele1_3760test') or die('connection failed');
        
        //----------------DELETE SELECTED RECORDS-----------------------
        if(isset($_POST['submit'])) {
          foreach($_POST['todelete'] as $delete_id) {
            //echo $delete_id;
            $query = "DELETE FROM Newsletter WHERE id=$delete_id";

            //NOW TRY AND TALK TO THE DATABASE
            $result = mysqli_query($dbconnection ,$query) or die('query failed');

          };//close foreach
        };//end if

        
        //-----------------DISPLAY REMAINING RECORDS--------------------
        
        //BUILD THE QUERY
        $query = "SELECT * FROM Newsletter";

        // //NOW TRY AND TALK TO THE DATABASE
        $result = mysqli_query($dbconnection ,$query) or die('query failed');


        




        
        while($row = mysqli_fetch_array($result)){

          echo '<label>';
          echo '<input type = "checkbox" value = "'.$row['id'].'" name = "todelete[]" />';
          echo $row['first'] .' '. $row['last'] .' - '. $row['email'];
          echo '</label>';
        };

        //WE'RE DONE SO HANG UP
        mysqli_close($dbconnection);
     
      ?> <!-- END PHP -->

      <!-- <label><input type="checkbox" name="personArray[]" value="john">John Smith</label><br>

      <label><input type="checkbox" name="personArray[]" value="davy">Jones</label><br>

      <label><input type="checkbox" name="personArray[]" value="3">Sary James</label><br>

      <label><input type="checkbox" name="personArray[]" value="4">Samuel Martin</label><br> -->


      <input type="submit" value="Delete From List" name="submit" value="Remove from List" id="submitButton" class="submitButton">


    </fieldset>
  </form>
  
 <?php
  foreach($_GET['personArray'] as $personNumber) {
    echo $personNumber;
  };
  
 ?>


</main>
</body>
</HTML>
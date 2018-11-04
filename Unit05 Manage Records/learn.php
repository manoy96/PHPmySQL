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

  <form action=" " method="GET">
    <fieldset>
      <legend>Using as Array</legend>
      <p>Please select the people for the array</p>

      <label><input type="checkbox" name="personArray[]" value="john">John Smith</label><br>

      <label><input type="checkbox" name="personArray[]" value="davy">Jones</label><br>

      <label><input type="checkbox" name="personArray[]" value="3">Sary James</label><br>

      <label><input type="checkbox" name="personArray[]" value="4">Samuel Martin</label><br>


      <input type="submit" value="DisplayArray" name="submit" id="submitButton" class="submitButton">


    </fieldset>
  </form>
  
 <?php
 if (isset($_GET['submit'])) {
    echo 'you selected the following ids <br>';
    foreach($_GET['personArray[]'] as $personNumber) {
      echo $personNumber . '<br>';
    }; //end foreach
}; //end if 
  
 ?>


</main>
</body>
</HTML>
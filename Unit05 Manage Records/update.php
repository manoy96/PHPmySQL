<!DOCTYPE <!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Update Employee</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" media="screen" href="css/styles.css" />
  <script src="main.js"></script>
</head>
<body>
<form action="saveToDatabasePractice.php" method="POST" enctype="multipart/form-data" name="travelInfo">

    <fieldset>
      <legend>Name</legend>
      <section id="fullName" class="normal">
          <label><span>First</span>
            <input name="first" type="text" class="myInput" placeholder = "John" pattern="[a-zA-Z-]{3,99}" autofocus required>
          </label>
        
        <!-- ------------------LAST--------------------------------------- -->
          <label><span>Last</span>
            <input name="last" type="text" class="myInput" placeholder = "Smith" pattern="[a-zA-Z0-9-]{3,99}" required>
          </label>
          
    
            <!------------------PHONE--------------------------------------- -->
              <label><span>Phone</span>
                <input name="phone" type="phone" class="myInput" placeholder = "xxx-xxx-xxxx" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required>
              </label>
            </section>
    </fieldset>

    <fieldset>
        <legend>Department</legend>
        <label><span>Please Select:</span>
        <select name="dept">
          <option>Internet Technologies</option>
          <option>Animation</option>
          <option>Audio</option>
          <option>Digital Film</option>
        </select>
        </label>
      </fieldset>


        <input type="submit" value="Update Employee" id="submitButton" class="submitButton">

       
    </form>



  
</body>
</html>
<!DOCTYPE html>
 <head>
   <meta charset="UTF-8">
  <title>Spam a Message</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,600" rel="stylesheet">
  <link href="css/reset.css" rel="stylesheet" type="text/css">
  <link href="css/styles.css" rel="stylesheet" type="text/css">
 </head>



 <body>


   <main>
    <header>
      <h2>Message</h2>
    </header>

  <form class="myForm" action="sendMessage.php" method="POST" enctype="multipart/form-data">
<!-- ------------------SUBJECT--------------------------------------- -->
  <section id="fullName" class="normal">
  <label ><span>Subject</span>
    <input name="subject" type="text" class="myInput" placeholder = "Subject" autofocus required>
  </label>
  </section>

<!-- ------------------MESSAGE--------------------------------------- -->
<section id="fullName" class="normal">
  <label ><span>Message</span>
    <input name="messageƒ" type="text" class="myInput" placeholder = "Message Here" autofocus required>
  </label>
  </section>


  <input type="submit" value="SUBMIT" id="submitButton" class="submitButton">

  </form>
  </main>
 </body>
</html>

<?php
  //DELETE THE COOKIES BY SETTING THEIR EXPIRATIONS TO AN HOUR AGO (3600)
  setcookie('username','',time()-3600);
  setcookie('firstname','',time()-3600);
  setcookie('lastname','',time()-3600);

    //REDIRECT TO THE HOME PAGE
    header('Location: index.php');

?>
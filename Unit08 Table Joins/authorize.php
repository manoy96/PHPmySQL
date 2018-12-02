<?php
//USERNAME AND PASSWORD AUTHENTICATION
  $username = 'admin';
  $password = 'time';

  if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']) || ($_SERVER['PHP_AUTH_USER'] != $username) || ($_SERVER['PHP_AUTH_PW'] != $password)) {
    header('HTTP/1.1 401 Unauthorized');
    header('WWW-Authenticat: Basic realm="Up2date"');
    exit('<h2>Username/Password incorrect</h2>');

  }//END IF
  ?>
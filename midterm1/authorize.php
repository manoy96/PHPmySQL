<?php
  // Username/password authentication
  $username = 'test';
  $password = 'test';
  
  if ($_SERVER['PHP_AUTH_USER'] != $username || $_SERVER['PHP_AUTH_PW'] != $password) {

    // username/password is incorrect
    header('HTTP/1.1 401 Unauthorized');
    header('WWW-Authenticate: Basic realm="Research Division"');
    exit('<h2>Research Division</h2>Sorry, you must enter a valid user name and password to access this page.');
  }
?>
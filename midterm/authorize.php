<?php
  // USERNAME/PASSWORD
  $username = 'test';
  $password = 'test';
  
  if ($_SERVER['PHP_AUTH_USER'] != $username || $_SERVER['PHP_AUTH_PW'] != $password) {
    // INCORRECT USERNAME/PASSWORD
    header('HTTP/1.1 401 Unauthorized');
    header('WWW-Authenticate: Basic realm="Research Division"');
    exit('<h2>Research Division</h2>Username/Password are invalid');
  }
?>
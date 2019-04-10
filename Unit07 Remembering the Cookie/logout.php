<?php
  // Delete USER ID and USERNAME COOKIES by setting expirations to an hour ago (3600)
  setcookie('username', '', time() - 3600);
  setcookie('first', '', time() - 3600);
  setcookie('last', '', time() - 3600);
  // Redirect to HOME PAGE
  $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/login.php';
  header('Location: ' . $home_url);
?>
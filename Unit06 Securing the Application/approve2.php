<?php
require_once('authorize.php');

$id = $_GET['id'];
echo $id;

require_once('variables.php');

//BUILD THE DATABASE CONNECTIONWITH host, user, pass, database
$dbconnection = mysqli_connect(HOST,USER,PASSWORD,DB_NAME) or die('connection failed');

//QUERY
$query = "UPDATE blog SET approved=1 WHERE id=$id";

//NOW TRY AND TALK TO THE DATABASE
$result = mysqli_query($dbconnection ,$query) or die('query failed');

header('Location: approve.php');




?>
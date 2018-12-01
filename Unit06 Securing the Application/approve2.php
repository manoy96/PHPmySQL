<?php
$id = $_GET['id'];
echo $id;

require_once('variables.php');

//BUILD THE DATABASE CONNECTIONWITH host, user, pass, database
$dbconnection = mysqli_connect(HOST,USER,PASSWORD,DB_NAME) or die('connection failed');

//QUERY
$query


//NOW TRY AND TALK TO THE DATABASE
$result = mysqli_query($dbconnection ,$query) or die('query failed');




?>
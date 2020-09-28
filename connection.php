<?php
$database = 'airlines';
$user = 'root';
$pass = '';
$hostname = 'localhost';

$conn = mysqli_connect($hostname, $user, $pass, $database);
if (!$conn) {
	echo "Database Connection failed";
	die();
}
  


  ?>

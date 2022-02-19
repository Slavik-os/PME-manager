<?php
$servername = "localhost";
$username = "user";
$password = "";
$dbname = 'employee_dbs';

// Connect  to mysql 

$con = mysqli_connect("localhost",$username,$password,$dbname);
if ($con->connect_error) {
	die("Connection faild : " .$con->connect_error);
} 



?>

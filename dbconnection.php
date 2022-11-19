<?php
$hostname='localhost';
$username='root';
$password='';
$dbname='management';

$con=mysqli_connect($hostname, $username, $password) or die('Database Connection Error!!');

mysqli_select_db($con, $dbname);

?>
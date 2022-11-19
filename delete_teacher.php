<?php
	include("dbconnection.php");
	session_start();
	$sql="DELETE FROM teacher WHERE TID='{$_GET["tid"]}'";
	$con->query($sql);

	echo "<script>window.open('view_teachers.php?mes=Data Deleted','_self');</script>";



?>
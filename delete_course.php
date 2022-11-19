<?php
	include("dbconnection.php");
	session_start();
	$sql="DELETE FROM course 
	WHERE TID='{$_GET["tid"]}' AND SUBJECT='{$_GET["subject"]}' AND CLASS='{$_GET["class"]}'";
	if($con->query($sql)){
		echo "<script>window.open('set_course.php?mes=Data Deleted','_self');</script>";
	}

	



?>
<?php
include("dbconnection.php");
$sql="DELETE FROM student WHERE SID='{$_GET["sid"]}'";
$con->query($sql);

	echo "<script>
	
				alert('Student Deleted Successfully');
				window.open('view_students.php?mes=Data Deleted','_self');
				
				
		 </script>";



?>
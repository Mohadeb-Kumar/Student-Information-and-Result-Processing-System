<?php 
	include("dbconnection.php");
	
	//$sql="SELECT * FROM student WHERE SNAME LIKE '{$_POST["s"]}%' ";
	$sql="SELECT SID,SNAME,FATHER,MOTHER,GENDER,CLASS FROM student WHERE CLASS LIKE '{$_POST["s"]}' ";
	$res=$con->query($sql);
		echo "<table border='1px' class='table'>
				<tr>
					<th>SID</th>
					<th>Name</th>
					<th>Father</th>
					<th>Mother</th>
					<th>Gender</th>
					<th>Class</th>
					<th>View</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
				";
	if($res->num_rows>0)
		
	{
		while($row=$res->fetch_assoc())
		{
			echo "<tr>
				<td>{$row["SID"]}</td>
				<td>{$row["SNAME"]}</td>
				<td>{$row["FATHER"]}</td>
				<td>{$row["MOTHER"]}</td>
				<td>{$row["GENDER"]}</td>
				<td>{$row["CLASS"]}</td>
				<td><a href='student_profile_admin_view.php?sid={$row["SID"]}' class='btnView'>View</a></td>
				<td><a href='edit_student.php?sid={$row["SID"]}' class='btnEdit'>Edit</a></td>
				<td><a href='delete_student.php?sid={$row["SID"]}' class='btnDelete'>Delete</a></td>
				</tr>
			";
		}
				echo "</table>";
	}
		
	else
	{
		echo "<p>No Record Found</p>";
	}
	
?>
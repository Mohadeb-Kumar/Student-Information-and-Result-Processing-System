<?php
	include ("dbconnection.php");
	session_start();
	if(!isset($_SESSION["SID"]))
	{
		echo"<script>window.open('index.php?mes=Access Denied..','_self');</script>";
		
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Mohadeb Kumar(CSE)</title>
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body class="back">
		<?php 
			include"topbar.php";
		?>
	

		<input type="button" onclick="window.print()" value="Print Result" class="result_print_btn"/>
		
		
		
		<div>
			<h1 style="text-align:center; margin-top:-53px;" ><br>Final Exam Result 2020</h1>
			<?php
			$sql="SELECT* FROM student WHERE SID='{$_SESSION["SID"]}'";
				$res=$con->query($sql);

				if($res->num_rows>0)
				{
					$row=$res->fetch_assoc();
				}
				
				
				$sql2="SELECT* FROM marks WHERE SID='{$_SESSION["SID"]}'";
					$res2=$con->query($sql2);

					if($res2->num_rows>0)
					{
						$row2=$res2->fetch_assoc();
					}
				
			?>
		
				<div class="rbox1">
					<br/>
						<table border="1px" class="desired_result1">
						<caption>Student Details</caption>
							<tr class="table_row_style"><th>Student ID </th> <td style="font-weight:bold"><?php echo $row["SID"] ?> </td></tr>
							<tr class="table_row_style"><th>Name of Student</th> <td><?php echo $row["SNAME"] ?> </td></tr>
							<tr><th>Father's Name</th> <td><?php echo $row["FATHER"] ?>  </td></tr>
							<tr><th>Mother's Name</th> <td> <?php echo $row["MOTHER"] ?>  </td></tr>
							<tr class="table_row_style"><th>Class</th> <td> <?php echo $row["CLASS"] ?>  </td></tr>
							<tr><th>Gender</th> <td> <?php echo $row["GENDER"] ?>  </td></tr>
							<tr class="table_row_style"><th>Name of Institute</th> <td style="font-weight:bold"> <?php echo "Karai Md.Kabel High School, Bogura" ?> </td></tr>
						</table>
				</div>
				
				
				<div class="rbox2">
					<br/>
						<table border="1px" class="desired_result2">
						<caption>Subject-Wise Marks</caption>
							<tr class="table_row_style"><th>SUBJECT NAME </th> <td><?php echo "<b>MARKS</b>" ?> </td></tr>
							<tr><th>Bangla </th> <td><?php echo $row2["BANGLA"] ?> </td></tr>
							<tr><th>English</th> <td><?php echo $row2["ENGLISH"] ?> </td></tr>
							<tr><th>Mathematics</th> <td><?php echo $row2["MATHEMATICS"] ?>  </td></tr>
							<tr style="font-weight:bold;" class="table_row_style"><th>TOTAL MARKS</th> <td><?php echo ($row2["BANGLA"]+$row2["ENGLISH"]+$row2["MATHEMATICS"]) ?>  </td></tr>
						</table>
				</div>
		</div>
		<?php include"footer3.php";?>
	</body>
</html>
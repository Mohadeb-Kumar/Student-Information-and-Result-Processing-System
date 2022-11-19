<?php
	include("dbconnection.php");
	session_start();
	if(!isset($_SESSION["AID"]))
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
	
		<?php include("topbar.php");?>
		
		
		 
			
			<div id="section">
			
				<?php 
					include("sidebar.php");
				?><br>
				
				<div class="content">
					<h3 class="text">Welcome <?php echo $_SESSION['ANAME']; ?></h3><br><hr><br>
					<div class="content1">
					
					<?php
						if(isset($_GET["mes"]))
						{
							echo"<div class='error'>{$_GET["mes"]}</div>";	
						}
					
					?><br/>
					
						<?php
	
							$sql="SELECT TID,TNAME,QUALIFICATION,GENDER,SALARY,IMG 
							FROM teacher";
							$res=$con->query($sql);
							echo "<table border='1px' class='table'>
					<caption>View Teacher Details</caption>
									<tr>
										<th>TID</th>
										<th>Name</th>
										<th>Qualification</th>
										<th>Gender</th>
										<th>Salary</th>
										<th>Image</th>
										<th>View</th>
										<th>Delete</th>
									</tr>
				
									";
						if($res->num_rows>0)
							
						{
						
							while($row=$res->fetch_assoc())
							{
							
								echo "<tr>
									<td>{$row["TID"]}</td>
									<td>{$row["TNAME"]}</td>
									<td>{$row["QUALIFICATION"]}</td>
									<td>{$row["GENDER"]}</td>
									<td>{$row["SALARY"]}</td>
									<td style='text-align:center;'><img src='{$row["IMG"]}' height='70' width='70' alt='upload Pending'></td>
									<td><a href='teacher_profile_admin_view.php?tid={$row["TID"]}' class='btnView'>View</a></td>
									
									<td><a href='delete_teacher.php?tid={$row["TID"]}' class='btnDelete'>Delete</a></td>
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
		
		
					</div>
					
				</div>
				
			</div>
	
		<?php include"footer2.php";?>
	</body>
</html>
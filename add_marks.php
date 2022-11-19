<?php
	include("dbconnection.php");
	session_start();
	if(!isset($_SESSION["TID"]))
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
					<h3 class="text">Welcome <?php echo $_SESSION['TNAME']; ?></h3><br><hr><br>
					<div class="content1">
					<?php
									$sid="";
									$sname="";
					
						if(isset($_GET["id"]))
							{
								$_SESSION['sid']=$_GET["id"];
								$sql="SELECT SID,SNAME FROM student WHERE SID='{$_GET["id"]}'";
								$res=$con->query($sql);
								if($res->num_rows>0)
								{
									$rows=$res->fetch_assoc();
									$sid=$rows["SID"];
									$sname=$rows["SNAME"];
									
								}
								
							}
							
							
							
							if(isset($_POST["submit"]))
						{
							if(($_SESSION['SUBJECT']=='Bangla')&&(isset($_SESSION['sid']))){
							$sql2="UPDATE marks
								   SET BANGLA='{$_POST['smarks']}'
								   WHERE SID='{$_SESSION['sid']}'";
							$con->query($sql2);

	
							unset ($_SESSION['sid']);
			
							}
							
							else if(($_SESSION['SUBJECT']=='Mathematics')&&(isset($_SESSION['sid']))){
							$sql2="UPDATE marks
								   SET MATHEMATICS='{$_POST['smarks']}'
								   WHERE SID='{$_SESSION['sid']}'";
							$con->query($sql2);

	
							unset ($_SESSION['sid']);
			
							}
							
							
							else if(($_SESSION['SUBJECT']=='English')&&(isset($_SESSION['sid']))){
							$sql2="UPDATE marks
								   SET ENGLISH='{$_POST['smarks']}'
								   WHERE SID='{$_SESSION['sid']}'";
							$con->query($sql2);

	
							unset ($_SESSION['sid']);
			
							}
							
							
							
							else
							{
								echo "<div class='error'>Student is not Selected!!</div>";
							}
		
						}
					
					
					
					
					?>
					
					
					
				<form method="post" enctype="multipart/form-data" action="<?php echo $_SERVER["PHP_SELF"];?>"> 
	
				<div class="add_marks_div1"> <!--add_student left div-->
					<label class="add_marks_lebel1"> SID:</label><br>
					<input type="text" value="<?php echo $sid; ?>" class="add_marks_in1" required readonly>
					
			
				<label class="add_marks_lebel2"> Name:</label><br>
					<input type="text" value="<?php echo $sname;?>" class="add_marks_in2" required readonly>
				
					<label class="add_marks_lebel3"> Marks:</label><br>
					<input type="number" class="add_marks_in3" name="smarks" required><br/><br/>
					
					<button type="submit" class="add_marks_btn" name="submit">Submit</button>
					
				</div><br/><br/><br/><br/><br/>
				
				
					
					
					
					
					
					
					
					
					
						<?php
	
							$sql="SELECT s.SID,s.SNAME,s.GENDER, s.CLASS, m.BANGLA, m.MATHEMATICS, m.ENGLISH 
							FROM student AS s JOIN marks AS m 
							ON (s.SID=m.SID AND s.CLASS='{$_SESSION["CLASS"]}')";
							
							
							$res=$con->query($sql);
							echo "<table border='1px' class='table'>
					<caption>Add Student Marks</caption>
									<tr>
										<th>SID</th>
										<th>Name</th>
										<th>Gender</th>
										<th>Class</th>
										<th>{$_SESSION['SUBJECT']}</th>
										<th>Add Marks</th>
										
									</tr>
				
									";
									
						if($res->num_rows>0)
							
						{
							
							while($row=$res->fetch_assoc())
							{
								if($_SESSION['SUBJECT']=='Bangla'){
									
										echo "<tr>
									<td>{$row["SID"]}</td>
									<td>{$row["SNAME"]}</td>
									<td>{$row["GENDER"]}</td>
									<td>{$row["CLASS"]}</td>
									<td>{$row["BANGLA"]}</td>
									<td><a href='add_marks.php?id={$row["SID"]}' class='btnView'>Add Marks</a></td>
									
									</tr>";	
								}
								
									else if($_SESSION['SUBJECT']=='Mathematics'){
									
										echo "<tr>
									<td>{$row["SID"]}</td>
									<td>{$row["SNAME"]}</td>
									<td>{$row["GENDER"]}</td>
									<td>{$row["CLASS"]}</td>
									<td>{$row["MATHEMATICS"]}</td>
									<td><a href='add_marks.php?id={$row["SID"]}' class='btnView'>Add Marks</a></td>
									
									</tr>";	
								}
								
									else if($_SESSION['SUBJECT']=='English'){
									
										echo "<tr>
									<td>{$row["SID"]}</td>
									<td>{$row["SNAME"]}</td>
									<td>{$row["GENDER"]}</td>
									<td>{$row["CLASS"]}</td>
									<td>{$row["ENGLISH"]}</td>
									<td><a href='add_marks.php?id={$row["SID"]}' class='btnView'>Add Marks</a></td>
									
									</tr>";	
								}
								
							
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
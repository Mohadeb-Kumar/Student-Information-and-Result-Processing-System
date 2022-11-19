<?php
	include("dbconnection.php");
	session_start();
	if(!isset($_SESSION["AID"]))
	{
		echo"<script>window.open('index.php?mes=Access Denied...','_self');</script>";
		
	}	
	
	
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Mohadeb Kumar</title>
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body class="back">
		<?php include"topbar.php";?><br>
	
			<div id="section">
				<?php include"sidebar.php";?><br>
				<div class="content"><!!--x-->
					<h3 class="text">Welcome <?php echo $_SESSION["ANAME"]; ?></h3><br><hr><br>
				<!--<div class="content">-->
				<div class="content1"><!!--x-->
				
					<h3>Set Course Teacher</h3><br>
					
					<div class="set_course1">
					<?php
						if(isset($_POST["submit"]))
						{
							 $sq="INSERT INTO course(TID,SUBJECT,CLASS) 
							 VALUES ('{$_POST["tid"]}','{$_POST["subject"]}','{$_POST["class"]}')";
							if($con->query($sq))
							{
								echo "<div class='success'>Insert Success..</div>";
							}
							else
							{
								echo "<div class='error'>Insert Failed..</div>";
							}
		
						}
					
					
					?>					
						
						
					<form  method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
					
					<label class="required">Teacher ID:</label><br>
						
						<select name="tid" required class="option_in">
							<?php
								$sql="SELECT TID FROM teacher";
								$res=$con->query($sql);
								 if($res->num_rows>0)
								 {
									 echo "<option value=''>Select</option>";
									 while($row=$res->fetch_assoc())
									 {
										 echo "<option value='{$row["TID"]}'>{$row["TID"]}</option>";
									 }
								 }
							
							
							?>
					
						</select>
						
					<br><br>
					
					<label class="required">Class:</label><br>
					<select name="class" required class="option_in">
				
					<option selected disabled value="">Select</option>
					<option value="I">I</option>
					<option value="II">II</option>
					<option value="III">III</option>
					<option value="IV">IV</option>
					<option value="V">V</option>
					
					</select><br></br>
						
						
						
					<label class="required">Subject Name:</label><br>
					<input type="text" class="input3" name="subject" placeholder="Enter taken Subject by Teacher" required><br><br>

					<button type="submit" class="add_course_btn" name="submit">Add Course Teacher</button>
					</form>
					
					
					
					</div>
					<div class="set_course2">
					<!--<h3> Course-Wise Details</h3><br>-->
						<?php
						if(isset($_GET["mes"]))
						{
							echo"<div class='error'>{$_GET["mes"]}</div>";	
						}
					
					?><br/>
					<table border="1px">
					<!--<caption><?PHP $_GET["cname"]?>Course-Wise Details</caption>-->
					<caption>Course-Wise Details</caption>
						<tr>
							<th>TID</th>
							<th>NAME</th>
							<th>SUBJECT</th>
							<th>CLASS</th>
							<th>DELETE</th>
						</tr>
						<?php
							$sql="SELECT c.TID, t.TNAME, c.SUBJECT, c.CLASS  
							FROM teacher AS t, course AS c 
							WHERE t.TID=c.TID";
							$res=$con->query($sql);
							if($res->num_rows>0)
							{
								while($r=$res->fetch_assoc())
								{
									echo"
									<tr>
										<td>{$r["TID"]}</td>
										<td>{$r["TNAME"]}</td>
										<td>{$r["SUBJECT"]}</td>
										<td>{$r["CLASS"]}</td>
										<td><a href='delete_course.php?tid={$r["TID"]} && subject={$r["SUBJECT"]} && class={$r["CLASS"]}' class='btnDelete'>Delete</a></td>
									</tr>
									
									";
								}
							}
						
						
						
						?>
						
						</table>
					</div>
				</div>
			</div>
	
				<?php include"footer4.php";?>
	</body>
</html>
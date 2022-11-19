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
					
					
				
					<div class="add_teacher_div">
					<?php
						if(isset($_POST["submit"]))
						{
							$_SESSION["SUBJECT"]=$_POST["subject"];
							$_SESSION["CLASS"]=$_POST["class"];
							
							
							 $sql1="SELECT TID,SUBJECT,CLASS 
									FROM  course 
									WHERE TID='{$_SESSION["TID"]}' AND SUBJECT='{$_POST["subject"]}' AND CLASS='{$_POST["class"]}'";
							$res1=$con->query($sql1);
							
							$sql2="SELECT TID,TPASSWORD 
									FROM  teacher 
									WHERE TID='{$_SESSION["TID"]}' AND TPASSWORD='{$_POST["tpass"]}'";
							$res2=$con->query($sql2);
							
							if(($res1->num_rows>0)&&($res2->num_rows>0))
							{
								echo "<script>
											window.open('add_marks.php','_self'); //Open new window or linked page
									  </script>";
							}
							else
							{
								echo "<div class='error'>Unauthorized Access...</div>";
							}
		
						}
					
					
					?>					
						
						
					<form  method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
					
					<label class="required">Subject:</label><br>
						
						<select name="subject" required class="option_in">
							<?php
								$sql="SELECT DISTINCT SUBJECT FROM course;";
								$res=$con->query($sql);
								 if($res->num_rows>0)
								 {
									 echo "<option value=''>Select</option>";
									 while($row=$res->fetch_assoc())
									 {
										 echo "<option value='{$row["SUBJECT"]}'>{$row["SUBJECT"]}</option>";
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
						
						
						
					<label class="required">Password:</label><br>
					<input type="password" id="password" class="input3" name="tpass"  required><br><br>
					
					<input type="checkbox" id="toggle_password"/>
					<label style="font-size:12px; color:#608ca0;" for="toggle_password">Show Password</label>
					
					<script>
							const password = document.getElementById("password");
							const togglePassword = document.getElementById("toggle_password");
							togglePassword.addEventListener("click", toggleClicked);
							function toggleClicked() {
							if (this.checked) {
							password.type = "text";
							} else {
							password.type = "password";
							}
							}
							
					</script>

					<button type="submit" class="add_course_btn" name="submit">Go Add Marks</button>
					</form>
					
	
		
					</div>
					
				</div>
				
			</div>
	
		<?php include"footer2.php";?>
	</body>
</html>
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
		<title>Mohadeb Kumar (CSE)</title>
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
				
					
					
					<div class="add_teacher_div">
					<!--<h3 class="heading">Create Teacher Account</h3><br>-->
					<?php
						if(isset($_POST["submit"]))
						{
							 $sql="INSERT INTO teacher(TID,TNAME,EMAIL,TPASSWORD) 
							 VALUES ('{$_POST["tid"]}','{$_POST["tname"]}','{$_POST["email"]}','{$_POST["tpass"]}')";
							if($con->query($sql))
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
					<input type="text" class="input3" name="tid" placeholder="T101" required><br><br>	
						
						

					
					<label class="required">Name:</label><br>
					<input type="text" class="input3" name="tname" required placeholder="Use Capital Letter"><br><br>
					
						
					<label class="required">Email:</label><br>
					<input type="email" class="input3" name="email" required placeholder="Enter an active Email"><br><br>	
						
					<label class="required">Password:</label><br>
					<input type="password" id="password" class="input3" name="tpass"  required placeholder="Use strong Password" ><br><br>
					
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

					<button type="submit" class="add_course_btn" name="submit">Registation as Teacher</button>
					</form>
					
					
					
					</div>
				</div>
			</div>
	
				<?php include"footer4.php";?>
	</body>
</html>
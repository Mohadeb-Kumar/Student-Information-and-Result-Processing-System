<?php
	include ("dbconnection.php");	//Included "management" Database connection
	session_start();	//"session_start()" using to start session and holding some user info to control user access
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Mohadeb Kumar(CSE)</title>
		<link rel="stylesheet" href="css/style.css">  <!--Setting link with external "CSS" file-->
	</head>
	<body class="back">
	
			<?php 
				include"topbar.php";	//Included "topbar.php" page to load topber menu
			?>
		
		<img src="img/index_banner.jpg" height="230" width="1200"/>
		
		<div>
			<h1 class="heading">Admin's Login</h1>
			<div class="login">
			<?php
				if(isset($_POST["login"]))
				{
					$sql="SELECT AID,ANAME FROM admin 
						  WHERE USERNAME='{$_POST["ademail"]}' AND APASSWORD='{$_POST["adpass"]}'";
						  
					$run=$con->query($sql);	//Storing row info according to SQL statement
					if($run->num_rows>0)	//Checking, is row founded more than zero?
					{
						$row=$run->fetch_assoc(); //Fetching row info as associative array
						$_SESSION["AID"]=$row["AID"];	//Assigning desired row info to the "$_SESSION" global variable 
						$_SESSION["ANAME"]=$row["ANAME"];
						
						echo "<script>
									window.open('admin_home.php','_self'); //Open new window or linked page
							  </script>";
					}
					else
					{
						echo "<div class='error'>Invalid Username or Password</div>";
					}
					
				}
				if(isset($_GET["mes"]))
				{
					echo "<div class='error'>{$_GET["mes"]}</div>";
				}
				
			?>
		
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">	<!--Data will be sent by "POST" mehthod-->
					<label style="margin-left:17px;">Username:</label><br>
					<input type="email" name="ademail" required class="input" placeholder="Enter Email address"><br><br>
					<label style="margin-left:17px;">Password:</label><br>
					<input type="password" id="password" name="adpass" required class="input"><br/><br/>
					<input style="margin-left:17px;" type="checkbox" id="toggle_password"/>
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
					<button type="submit" class="btn" name="login">Login Here</button>
				</form>
				
			</div>
		</div>
		<?php include"footer1.php";?>
	</body>
</html>
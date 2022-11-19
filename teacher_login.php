<?php
	include ("dbconnection.php");
	session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>By Mohadeb Kumar(CSE)</title>
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body class="back">
		<?php 
			include"topbar.php";
		?>
		
		<img src="img/index_banner.jpg" height="230" width="1200"/>
		
		<div>
			<h1 class="heading">Teacher's Login</h1>
			<div class="login">
			<?php
				if(isset($_POST["login"]))
				{
					$sql="SELECT* FROM teacher WHERE EMAIL='{$_POST["temail"]}' and TPASSWORD='{$_POST["tpass"]}'";
					$run=$con->query($sql);
					if($run->num_rows>0)
					{
						$ro=$run->fetch_assoc();
						$_SESSION["TID"]=$ro["TID"];
						$_SESSION["TNAME"]=$ro["TNAME"];
						
						echo "<script>
									window.open('teacher_home.php','_self');
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
		
				<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
					<label style="margin-left:17px;">Username:</label><br>
					<input type="email" name="temail" required class="input" placeholder="Enter Email address"><br><br>
					<label style="margin-left:17px;">Password:</label><br>
					
					<input type="password" id="password" name="tpass" required class="input"><br/><br/>
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
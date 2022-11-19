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
						if(isset($_POST["submit"])){						
							
							 $sql1="SELECT TID, TPASSWORD
									FROM  teacher 
									WHERE TID='{$_SESSION['TID']}' && TPASSWORD='{$_POST['tpass']}'";
									$res1=$con->query($sql1);
							if($res1->num_rows>0){
								 $sql2="UPDATE teacher 
										SET TPASSWORD='{$_POST['newpass']}'
										WHERE TID='{$_SESSION['TID']}'";
							
							
												if($con->query($sql2))
												{
													echo "<div class='success'>Password Changed...</div>";
													
												}
												else
												{
													echo "<div class='error'>Change Failed...</div>";
												}
		
						}
						else
							{
								echo "<div class='error'>Wrong Old Password...</div>";
							}
						
					
					    }
					?>					
						
						
					<form  method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
					
					<label class="required">Username:</label><br>
					<input style="background: #dcdcdca8; text-align:center;" type="email" class="input3" value="<?php 
							
							$sql="SELECT EMAIL FROM teacher WHERE TID='{$_SESSION["TID"]}'";
							$res=$con->query($sql);
							$row=$res->fetch_assoc();
							$email=$row['EMAIL'];
					
					
					echo $email?>"  readonly><br><br>
					
					<label class="required">Old Password:</label><br>
					<input type="password" class="input3" name="tpass" placeholder="Enter Old password" required><br><br>
						
						
						
					<label class="required">Ner Password:</label><br>
					<input type="password" id="password" class="input3" name="newpass" placeholder="Enter New password" required><br><br>
					
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

					<button type="submit" class="add_course_btn" name="submit">Change Password</button>
					</form>
					
	
		
					</div>
					
				</div>
				
			</div>
	
		<?php include"footer2.php";?>
	</body>
</html>
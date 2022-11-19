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
					
					
		<div style="margin-left: 150px;" class="fixing_warning_mgs">
		<?php
						
									
									$tname="";
									$qualification="";
									$gender="";
									$phone="";
									$email="";
									$address="";
						

								$sql="SELECT TNAME,QUALIFICATION,GENDER,PHONE,EMAIL,ADDRESS FROM teacher WHERE TID='{$_SESSION["TID"]}'";
								$res=$con->query($sql);
								if($res->num_rows>0)
								{
									$rows=$res->fetch_assoc();

									$tname=$rows["TNAME"];
									$qualification=$rows["QUALIFICATION"];
									$gender=$rows["GENDER"];
									$phone=$rows["PHONE"];
									$email=$rows["EMAIL"];
									$address=$rows["ADDRESS"];
									
								}
		
		
		
		
		
		
						if(isset($_POST["submit"])){
										$sql2="UPDATE teacher
											   SET 
											   
											   TNAME='{$_POST['tname']}',
											   QUALIFICATION='{$_POST['qualification']}',
											   GENDER='{$_POST['gender']}',
											   PHONE='{$_POST['phone']}',
											   ADDRESS='{$_POST['address']}'

											   WHERE TID='{$_SESSION['TID']}'";

								if($con->query($sql2)){
									echo "<div class='success'>Update Successfully....</div>";
								}
								else{
									echo "<div class='error'>Updating Failed....</div>";
								}
							}		
						
		?>
		
			<form method="POST" enctype="multipart/form-data" action="<?php echo $_SERVER["PHP_SELF"];?>"> 
	
				<div class="adstdl"> <!--add_student left div-->
					
					<label class="required">Name:</label><br>
					<input type="text" value="<?php echo $tname; ?>" class="input3" name="tname" required><br><br>
					
					<label class="required"> Qualification:</label><br>
					<input type="text" value="<?php echo $qualification; ?>" class="input3" name="qualification" required><br><br>
					
					<label class="required"> Gender:</label><br>
					<input type="text" value="<?php echo $gender; ?>" class="input3" name="gender" required><br><br>
					
					<label> Phone No:</label><br>
					<input type="text" value="<?php echo $phone; ?>" class="input3" name="phone"><br><br>
					
					
					
					
					
					
					
				</div>
				
				<div class="adstdr">  <!--add_student right div-->
					
					
					
					<label>  Email (used as Username):</label><br>
					<input style="background: #dcdcdca8; text-align:center;" type="email" value="<?php echo $email; ?>" class="input3" readonly><br><br>
					
					<label>  Address:</label><br>
					<textarea rows="5" style="height:181px;"  class='address_in' name="address"><?php echo $address; ?></textarea><br>
			
			
				</div>
					<button type="submit" class="add_student_btn" name="submit">Update Information</button>
				</form>
		
					</div>

		
					</div>
					
				</div>
				
			</div>
	
		<?php include"footer2.php";?>
	</body>
</html>


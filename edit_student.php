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
					<!--<div class="add_student_content">-->
					<div class="add_student_content">
					<div class="fixing_warning_mgs">
		<?php
						
									$sid="";
									$sname="";
									$father="";
									$mother="";
									$dob="";
									$class="";
									$gender="";
									$phone="";
									$address="";
						
				if(isset($_GET["sid"]))
							{
								$_SESSION['sid']=$_GET["sid"];
								$sql="SELECT SID,SNAME,FATHER,MOTHER,DOB,CLASS,GENDER,PHONE,ADDRESS FROM student WHERE SID='{$_GET["sid"]}'";
								$res=$con->query($sql);
								if($res->num_rows>0)
								{
									$rows=$res->fetch_assoc();
									$sid=$rows["SID"];
									$sname=$rows["SNAME"];
									$father=$rows["FATHER"];
									$mother=$rows["MOTHER"];
									$dob=$rows["DOB"];
									$class=$rows["CLASS"];
									$gender=$rows["GENDER"];
									$phone=$rows["PHONE"];
									$address=$rows["ADDRESS"];
									
								}
								
							}
		
		
		
		
		
		
						if(isset($_POST["submit"])){
										$sql2="UPDATE student
											   SET 
											   
											   SNAME='{$_POST['sname']}',
											   FATHER='{$_POST['father']}',
											   MOTHER='{$_POST['mother']}',
											   DOB='{$_POST['dob']}',
											   GENDER='{$_POST['gender']}',
											   PHONE='{$_POST['phone']}',
											   ADDRESS='{$_POST['address']}'

											   WHERE SID='{$_SESSION['sid']}'";

								if($con->query($sql2)){
									echo "<div class='success'>Update Successfully....</div>";
								}
								else{
									echo "<div class='error'>Updating Failed....</div>";
								}
								unset ($_SESSION['sid']);
							}		
						
		?>
		
			<form method="POST" enctype="multipart/form-data" action="<?php echo $_SERVER["PHP_SELF"];?>"> 
	
				<div class="adstdl"> <!--add_student left div-->
					<label class="required"> Student ID:</label><br>
					<input style="background: #dcdcdca8; text-align:center;" type="text" value="<?php echo $sid; ?>" class="input3" readonly><br><br>
					
					<label class="required"> Student Name:</label><br>
					<input type="text" value="<?php echo $sname; ?>" class="input3" name="sname" required><br><br>
					
					<label class="required"> Father's Name:</label><br>
					<input type="text" value="<?php echo $father; ?>" class="input3" name="father" required><br><br>
					
					<label class="required"> Mother's Name:</label><br>
					<input type="text" value="<?php echo $mother; ?>" class="input3" name="mother" required><br><br>
					
					<label class="required">  Date of Birth:</label><br>
					<input type="text" value="<?php echo $dob; ?>" class="input3" name="dob" required><br><br>
					
					
					
					
					
					
				</div>
				
				<div class="adstdr">  <!--add_student right div-->
				
					<label class="required">Class:</label><br>
					<input style="background: #dcdcdca8; text-align:center;" type="text" value="<?php echo $class; ?>" class="input3" readonly><br><br>
				
					<label class="required">Gender:</label><br>
					<input type="text" value="<?php echo $gender; ?>" class="input3" name="gender" required><br><br>
					
					<label> Phone No:</label><br>
					<input type="text" value="<?php echo $phone; ?>" class="input3" name="phone"><br><br>
					
					<label>  Address:</label><br>
					<textarea rows="5" style="height:105px;"  class='address_in' name="address"><?php echo $address; ?></textarea><br>
			
			
				</div>
					<button type="submit" class="add_student_btn" name="submit">Update Student Details</button>
				</form>
		
					</div>
				</div>
					
					
				</div>
				
			</div>
	
		<?php include"footer2.php";?>
	</body>
</html>


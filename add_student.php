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
			if(isset($_POST["submit"]))
						{
							$target="student_img/";
							$target_file=$target.basename($_FILES["img"]["name"]);
							if(move_uploaded_file($_FILES['img']['tmp_name'],$target_file))
							{
								$sql="INSERT INTO student(SID,SNAME,FATHER,MOTHER,DOB,GENDER,PHONE,ADDRESS,CLASS,IMG) VALUES(
								'{$_POST["sid"]}',
								'{$_POST["sname"]}',
								'{$_POST["father"]}',
								'{$_POST["mother"]}',
								'{$_POST["dob"]}',
								'{$_POST["gender"]}',
								'{$_POST["phone"]}',
								'{$_POST["address"]}',
								'{$_POST["class"]}',
								'{$target_file}' )";
								
								if($con->query($sql)){
									echo "<div class='success'>Registation Success....</div>";
								}
								else{
									echo "<div class='error'>Registation Failed....</div>";
								}
							}
							
						}			
						
		?>
		
	<form method="post" enctype="multipart/form-data" action="<?php echo $_SERVER["PHP_SELF"];?>"> 
	
				<div class="adstdl"> <!--add_student left div-->
					<label class="required"> Student ID:</label><br>
					<input type="text" class="input3" name="sid" required placeholder="A101"><br><br>
					
					<label class="required"> Student Name:</label><br>
					<input type="text" class="input3" name="sname" required><br><br>
					
					<label class="required"> Father's Name:</label><br>
					<input type="text" class="input3" name="father" required><br><br>
					
					<label class="required"> Mother's Name:</label><br>
					<input type="text" class="input3" name="mother" required><br><br>
					
					<label class="required">  Date of Birth:</label><br>
					<input type="date" class="input3" name="dob" required min="2002-01-01" max="2030-12-31"><br><br>
					
					
					
					
					
					
				</div>
				
				<div class="adstdr">  <!--add_student right div-->
				
					<label class="required">Class:</label><br>
					<select name="class" required class="option_in">
				
					<option selected disabled value="">Select</option>
					<option value="I">I</option>
					<option value="II">II</option>
					<option value="III">III</option>
					<option value="IV">IV</option>
					<option value="V">V</option>
					
					</select>
					<br><br>
				
					<label class="required">Gender:</label><br>
					<input type="radio" name="gender" checked value="Male">Male
					<input type="radio" name="gender" value="Female">Female<br/><br/>
					
					<label> Phone No:</label><br>
					<input type="text" class="input3" name="phone" placeholder="Parents contact No"><br><br>
					
					<label>  Address:</label><br>
					<textarea rows="5" class='address_in' name="address"></textarea><br><br>
				
					
						
					<label class="required">Student's Image:</label><br>
					<input type="file"  class="input3" required name="img"><br><br>
			
			
				</div>
					<button type="submit" class="add_student_btn" name="submit">Add Student Details</button>
				</form>
		
					</div>
				</div>
					
					
				</div>
				
			</div>
	
		<?php include"footer2.php";?>
	</body>
</html>


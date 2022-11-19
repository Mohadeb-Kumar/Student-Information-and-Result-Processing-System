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
					
					<div class="upload_img_mgs">
					
					<?php
					

						if(isset($_GET["sid"])){
							$_SESSION["sid"]=$_GET["sid"];
							
							$sql="SELECT* FROM student WHERE SID='{$_GET["sid"]}'";
							$res=$con->query($sql);

							if($res->num_rows>0)
							{
								$row=$res->fetch_assoc();
							}

						}
						
							
	
						
					
					
					
					if(isset($_POST["submit"]))
						{
							$target="student_img/";
							$target_file=$target.basename($_FILES["img"]["name"]);
							if(move_uploaded_file($_FILES['img']['tmp_name'],$target_file))
							{
								$sql="UPDATE student
								SET IMG='{$target_file}' 
								WHERE SID='{$_SESSION["sid"]}'";
								
								if($con->query($sql)){
									echo "<div class='success'>Image Uploaded Successfully....</div>";
								}
								else{
									echo "<div class='error'>Image Uploading Failed....</div>";
								}
								
								
								$sql2="SELECT* FROM student WHERE SID='{$_SESSION["sid"]}'";
								$res2=$con->query($sql2);

								if($res2->num_rows>0)
								{
								$row=$res2->fetch_assoc();
								}

							}
							
						}
					
					
					?>
					
					
					
					
					<form method="post" enctype="multipart/form-data" action="<?php echo $_SERVER["PHP_SELF"];?>">
					<label class="required">Upload Student Image:</label>
					<input type="file" required name="img">
					<button class="imgUpbtn" type="submit" name="submit">Submit Image</button>
					
					</form>
					</div>
						<br/>
					<div class="rbox1">
					<!--<h3> Profile</h3><br>-->
					<br/>
						<table border="1px" class="teacher_profile_table">
							<tr><td colspan="2"><img src="<?php echo $row["IMG"] ?>" height="100" width="100" alt="upload Pending"></td></tr>
							<tr><th>Student ID </th> <td><?php echo $row["SID"] ?> </td></tr>
							<tr><th>Name </th> <td><?php echo $row["SNAME"] ?> </td></tr>
							<tr><th>Name of Father </th> <td><?php echo $row["FATHER"] ?>  </td></tr>
							<tr><th>Name of Mother </th> <td><?php echo $row["MOTHER"] ?>  </td></tr>
							<tr><th>Class </th> <td><?php echo $row["CLASS"] ?>  </td></tr>
							<tr><th>Gender </th> <td> <?php echo $row["GENDER"] ?>  </td></tr>

							<tr><th>Date of Birth </th> <td> <?php echo $row["DOB"] ?>  </td></tr>
							<tr><th>Phone No </th> <td> <?php echo $row["PHONE"] ?> </td></tr>
							<tr><th>Address </th> <td> <?php echo $row["ADDRESS"] ?> </td></tr>
						</table>
					</div>
					
					
				</div>
				
			</div>
	
		<?php include"footer2.php";?>
	</body>
</html>
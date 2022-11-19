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
					
				<div style="float:left;" class="upload_img_mgs">
					
					<?php
					
					
						$sql="SELECT* FROM teacher WHERE TID='{$_SESSION["TID"]}'";
						$res=$con->query($sql);

						if($res->num_rows>0)
						{
							$row=$res->fetch_assoc();
						}

						
							
	
						
					
					
					
					if(isset($_POST["submit"]))
						{
							$target="teacher_img/";
							$target_file=$target.basename($_FILES["img"]["name"]);
							if(move_uploaded_file($_FILES['img']['tmp_name'],$target_file))
							{
								$sql="UPDATE teacher
								SET IMG='{$target_file}' 
								WHERE TID='{$_SESSION["TID"]}'";
								
								if($con->query($sql)){
									echo "<div class='success'>Image Uploaded Successfully....</div>";
								}
								else{
									echo "<div class='error'>Image Uploading Failed....</div>";
								}
								
								$sql2="SELECT* FROM teacher WHERE TID='{$_SESSION["TID"]}'";
								$res2=$con->query($sql2);

								if($res2->num_rows>0)
								{
									$row=$res2->fetch_assoc();
								}

							}
							
						}
					
					
					?>
					
					
				
					
					<form method="post" enctype="multipart/form-data" action="<?php echo $_SERVER["PHP_SELF"];?>">
					<label class="required">Upload Profile Image:</label>
					<input type="file" required name="img">
					<button class="imgUpbtn" type="submit" name="submit">Submit Image</button>
					
					</form>
					</div>
					
					<?php
						echo "<a href='edit_profile.php?id={$_SESSION["TID"]}' class='teacher_profile_btn'>Edit Profile Info</a>"
					?>
						<br/>	<br/>
					<div class="rbox1">
					<!--<h3> Profile</h3><br>-->
					<br/>
						<table border="1px" class="teacher_profile_table">
							<tr><td colspan="2"><img src="<?php echo $row["IMG"] ?>" height="100" width="100" alt="upload Pending"></td></tr>
							<tr><th>Name </th> <td><?php echo $row["TNAME"] ?> </td></tr>
							<tr><th>Qualification </th> <td><?php echo $row["QUALIFICATION"] ?>  </td></tr>
							<tr><th>Gender </th> <td> <?php echo $row["GENDER"] ?>  </td></tr>
							
							
							
							<tr style="background:#ef75a8"><th>Subject </th> <td>
							<?php
								$sql2="SELECT SUBJECT,CLASS FROM course WHERE TID='{$_SESSION["TID"]}'";
								$res2=$con->query($sql2);
								 if($res2->num_rows>0)
								 {
									 while($row2=$res2->fetch_assoc())
									 {
										 echo "{$row2["SUBJECT"]}".' (Class-'."{$row2["CLASS"]}".')'.'<br>';
									 }
								 }
							
							
							?>  </td></tr>
							
							
							
							<tr><th>Salary </th> <td> <?php echo $row["SALARY"] ." TK"?>  </td></tr>
							<tr><th>Phone No </th> <td> <?php echo $row["PHONE"] ?> </td></tr>
							<tr><th>Email </th> <td> <?php echo $row["EMAIL"] ?> </td></tr>
							<tr><th>Address </th> <td> <?php echo $row["ADDRESS"] ?> </td></tr>
						</table>
					</div>
					
					
				</div>
				
			</div>
	
		<?php include"footer2.php";?>
	</body>
</html>
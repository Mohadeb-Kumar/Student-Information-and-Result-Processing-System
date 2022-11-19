<?php
	include ("dbconnection.php");
	session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Mohadeb Kumar(CSE)</title>
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body class="back">
		<?php 
			include"topbar.php";
		?>
	
		
		<div>
			<h1 class="heading"><br>View Published Result 2020</h1>
			<div class="login1">
			<?php
				if(isset($_POST["submit"]))
				{
				$sql="SELECT SID,CLASS FROM student 
				      WHERE SID='{$_POST["sid"]}' AND CLASS='{$_POST["class"]}'";
					  
					$res=$con->query($sql);

					if($res->num_rows>0)
					{
						$_SESSION['SID']=$_POST["sid"];
						echo "<script>
									window.open('desired_result.php','_self');
							  </script>";
					}
					else
					{
						echo "<div class='error'>Invalid Student ID or Class</div>";
					}
					
			    }
				
			?>
		
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" >
					<label style="margin-left:17px;" class="required">Student ID:</label><br>
					<input type="text" name="sid" required placeholder="A101" class="input"><br><br>
					
					<label style="margin-left:17px;" class="required">Class:</label><br>
					<select name="class" required class="view_result_op">
						<option disabled selected value="">Select</option>
						<option value="I">I</option>
						<option value="II">II</option>
						<option value="III">III</option>
						<option value="IV">IV</option>
						<option value="V">V</option>
					</select><br/><br>
					
					<button type="submit" class="btn" name="submit">Submit</button>
				</form>
			</div>
		</div>
		<?php include"footer3.php";?>
	</body>
</html>
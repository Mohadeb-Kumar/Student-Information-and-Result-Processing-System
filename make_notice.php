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
					
						<?php
						
						
			if(isset($_POST['post'])){
				
				$sql="UPDATE admin 
					  SET NOTICE='{$_POST['notice']}'
					  WHERE AID='{$_SESSION['AID']}'";
				
				if($con->query($sql)){
					echo "<div class='success'>Posted Successfully....</div>";
				}
				else{
					echo "<div class='error'>Post Failed....</div>";
				}
			}				
						
						
						
						
		?>
					
					<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
						<label>  Make a notice for Teachers:</label>
						<button type="submit" name="post" class="notice_btn">Post Notice</button><br>
						<textarea rows="" class="make_notice" name="notice" placeholder="   Write your notice for Teachers here................"required></textarea><br><br>
			
		
					</form>
					
				</div>
				
			</div>
	
		<?php include"footer2.php";?>
	</body>
</html>
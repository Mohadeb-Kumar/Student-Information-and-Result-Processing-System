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
					
					
						$sql="SELECT NOTICE FROM admin WHERE AID='{$_SESSION["AID"]}'";
							$res=$con->query($sql);

							if($res->num_rows>0)
							{
								$row=$res->fetch_assoc();
							}
					
					
					?>
					
						<br/>
						<textarea rows="" cols="" class="view_notice"><?php echo $row['NOTICE'];?></textarea><br>
						
			
		
					
		
				
			</div>
			
			</div>
	
		<?php include"footer2.php";?>
	</body>
</html>
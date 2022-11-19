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
					<div class="view_student_content1">
					
					<h3 style="text-align:center;">Search Students per Class</h3><br>
					<img src="pojecet_icon/search_icon2.jpg" class="search_icon"/>
					<form id="frm" autocomplete="off">
					
						<input type="text" id="txt" class="search_input" placeholder="Enter class as I or II or III or IV or V">
					</form>
					<!--<img src="pojecet_icon/images-3.png" class="search_icon"/>-->
						<br>
						<div id="box"></div>
					
					</div>
					
				</div>
				
			</div>
	
		<?php include"footer2.php";?>
		
		<script>
				$(document).ready(function(){
					$("#txt").keyup(function(){
						var txt=$("#txt").val();
						if(txt!="")
						{
							$.post("search_student.php",{s:txt},function(data){
								$("#box").html(data);
							});
						}
						
					});
					
					
					
				});
			</script>
	</body>
</html>
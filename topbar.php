<div class="topbar">
	<ul class="list">
		
		<?php
			if(isset($_SESSION['AID'])){  
				
				echo '<li><a href="admin_home.php">Admin Home</a></li>
					  <li><a href="">Settings</a></li>
				      <li><a href="logout.php">Logout</a></li>';
					  
			}
			else if(isset($_SESSION['TID'])){
				
				echo '<li><a href="teacher_home.php">Teacher Home</a></li>
					  <li><a href="teacher_settings.php">Settings</a></li>
				      <li><a href="logout.php">Logout</a></li>';
			}
			
			else{
				echo '<li><a href="index.php">Admin</a></li>
					  <li><a href="teacher_login.php">Teacher</a></li>
				      <li><a href="view_result.php">View Result</a></li>
				      <li><a href="about_us.php">About Us</a></li>';
			}
			
		
		
		?>
	</ul>
	
	

</div>

			<div class="project_logo">
					<img style="width:200px; height:50px;" src="img/project_logo.jpg"/>
			</div>
<div class="sidebar"><br/>
<h3 class="text">Dashbord</h3><br><hr><br> <!--hr used for horizontal line-->

<ul class="sideber_li">

	<?php
		if(isset($_SESSION['AID'])){
			
			echo '
				  <li class="li"><a href="make_notice.php">Make Notice</a></li>
				  <li class="li"><a href="add_student.php">Add Student</a></li>
				  <li class="li"><a href="view_students.php">View Student</a></li>

				  <li class="li"><a href="set_course.php">Set Courses</a></li>
				  <li class="li"><a href="add_teacher.php">Add Teacher</a></li>

				  <li class="li"><a href="view_teachers.php">View Teacher</a></li>
				  <li class="li"><a href="#">Students Result</a></li>';
		}
		
		else{
			echo '<li class="li"><a href="teacher_profile.php">Profile</a></li>
				  <li class="li"><a href="#">Set Class</a></li>
				  <li class="li"><a href="#">Set Exam</a></li>
				  <li class="li"><a href="valid_add_marks.php">Add Marks</a></li>
				  <li class="li"><a href="#">View Marks</a></li>';
		}
	
	
	?>

</ul>
</div>
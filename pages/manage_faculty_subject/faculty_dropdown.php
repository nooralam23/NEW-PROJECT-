<?php
	include "../connection.php";
	if(isset($_POST['course_id'])){

		$course_id = $_POST['course_id'];
		$query = mysqli_query($con,"select *,f.id as facID
									from tblfaculty f 
									where f.courseid = '$course_id' ") or die('Error: ' . mysqli_error($con));
		//$rowCount = mysqli_num_rows($query);

		//if($rowCount > 0){
			echo '<script>$("#subj_name").show();document.getElementById("btn_add").disabled = false;</script>';
			echo '<option value="" disabled selected>-- Select Faculty -- </option>';
			while($row = mysqli_fetch_array($query))
			{
				echo '<option value="'.$row['facID'].'">'.$row['lname'].', '.$row['fname'].' '.$row['mname'].'</option>';
			}
		//}
		//else {
		//	echo '<option value="" disabled selected>-- All faculty was assigned --</option>';
		//	echo '<script>$("#subj_name").hide();document.getElementById("btn_add").disabled = true;</script>';
		//}
	}

	if(isset($_POST['faculty_id'])){

		$faculty_id = $_POST['faculty_id'];
		$query = mysqli_query($con,"select *,s.id as subjID
									from tblsubjects s
									where s.id not in (select subjectid from tblfacultysubject  where facid = '$faculty_id')");
		$rowCount = mysqli_num_rows($query);

		if($rowCount > 0){
			echo '<option value="" disabled selected>-- Select Subject -- </option>';
			while($row = mysqli_fetch_array($query))
			{
				echo '<option value="'.$row['subjID'].'">'.$row['subjectcode'].' - '.$row['subjectname'].'</option>';
			}
		}
		else {
			echo '<option value="" disabled selected>-- No more subject to assign --</option>';
		}
	}
?>
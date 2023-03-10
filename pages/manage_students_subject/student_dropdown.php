<?php
	include "../connection.php";
	if(isset($_POST['course_id'])){

		$course_id = $_POST['course_id'];
		$query = mysqli_query($con,"select *,f.id as facID
									from tblfaculty f
									left join tblcourse c
										on c.id = f.courseid
									where c.id = '$course_id' ");
		$rowCount = mysqli_num_rows($query);

		if($rowCount > 0){
			echo '<script>$("#stud_name").show();$("#subj_name").show();document.getElementById("btn_add").disabled = false;</script>';
			echo '<option value="" disabled selected>-- Select Adviser -- </option>';
			while($row = mysqli_fetch_array($query))
			{
				echo '<option value="'.$row['facID'].'">'.$row['lname'].', '.$row['fname'].' '.$row['mname'].'</option>';
			}
		}
		else {
			echo '<option value="" disabled selected>-- All adviser has subject assigned --</option>';
			echo '<script>$("#stud_name").hide();$("#subj_name").hide();document.getElementById("btn_add").disabled = true;</script>';
		}
	}

	if(isset($_POST['faculty_id'])){

		$faculty_id = $_POST['faculty_id'];
		$query = mysqli_query($con,"select *,s.id as studID,CONCAT(s.lname, ', ', s.fname, ' ',s.mname) as studName
									from tblstudent s
									left join tblfaculty f
										on f.courseid = s.course and f.id = s.adviser
									where s.adviser = '$faculty_id' ");
		$rowCount = mysqli_num_rows($query);

		if($rowCount > 0){
			echo '<option value="" disabled selected>-- Select Student -- </option>';
			while($row = mysqli_fetch_array($query))
			{
				echo '<option value="'.$row['studID'].'">'.$row['studName'].'</option>';
			}
		}
		else {
			echo '<option value="" disabled selected>-- No more student to assign --</option>';
			echo '<script>$("#subj_name").hide();document.getElementById("btn_add").disabled = true;</script>';
		}
	}

	if(isset($_POST['student_id'])){

		$student_id = $_POST['student_id'];
		$faculty_id =  $_POST['facultyid'];
		$query = mysqli_query($con,"select *,s.id as subjID 
									from tblsubjects s 
									where s.id not in 
											(
											select subjectid 
											from tblstudentsubject ss 
											where ss.facid  = '$faculty_id' and ss.studentid  = '$student_id'
											) ");
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
			echo '<script>document.getElementById("btn_add").disabled = true;</script>';
		}
	}
?>
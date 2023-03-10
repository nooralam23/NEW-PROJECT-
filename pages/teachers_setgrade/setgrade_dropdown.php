<?php
	include "../connection.php";
	if(isset($_POST['stud_id'])){

		$stud_id = $_POST['stud_id'];
		$query = mysqli_query($con,"select *,s.id as sid from tblsubjects s left join tblstudentsubject ss on ss.subjectid = s.id  left join tblstudent st on ss.studentid = st.id where st.id = '$stud_id' ") or die('Error: ' . mysqli_error($con));
		$rowCount = mysqli_num_rows($query);

		if($rowCount > 0){
			echo '<script>$("#subj_name").show();document.getElementById("btn_add").disabled = false;</script>';
			echo '<option value="" disabled selected>-- Select Subject -- </option>';
			while($row = mysqli_fetch_array($query))
			{
				echo '<option value="'.$row['sid'].'">'.$row['subjectcode'].' - '.$row['subjectname'].'</option>';
			}
		}
		else {
			echo '<option value="" disabled selected>-- No Subject available -- </option>';
			echo '<script>$("#subj_name").hide();document.getElementById("btn_add").disabled = true;</script>';
		}
	}

	if(isset($_POST['subj_id'])){

		$subj_id = $_POST['subj_id'];

			$query = mysqli_query($con,"select distinct criterianame from tblgradingcriteria where subjectid = '$subj_id'  ");
			$rowCount = mysqli_num_rows($query);

			if($rowCount > 0){
				echo '<script>$("#subj_name").show();document.getElementById("btn_add").disabled = false;</script>';
				echo '<option value="" disabled selected>-- Select Criteria Name -- </option>';
	            while($row = mysqli_fetch_array($query)){
	                echo '<option value="'.$row['criterianame'].'">'.$row['criterianame'].'</option>';
	            }
			}
			else {
				echo '<option value="" disabled selected>-- No Criteria available -- </option>';
				echo '<script>$("#subj_name").hide();$("#total_score").hide();document.getElementById("btn_add").disabled = true;</script>';
			}
	
	}

?>
<?php
session_start();
	include "../connection.php";
	if(isset($_POST['yrlvl_id'])){

		$yrlvl_id = $_POST['yrlvl_id'];
		$query = mysqli_query($con,"select * from tblfacultysubject f left join tblsubjects s on s.id = f.subjectid where s.yearlevel = '$yrlvl_id' and f.facid = '".$_SESSION['userid']."' group by s.subjectcode ") or die('Error: ' . mysqli_error($con));
		$rowCount = mysqli_num_rows($query);

		if($rowCount > 0){
			echo '<script>$("#subj_name").show();document.getElementById("btn_add").disabled = false;</script>';
			echo '<option value="" disabled selected>-- Select Subject -- </option>';
			while($row = mysqli_fetch_array($query))
			{
				echo '<option value="'.$row['subjectid'].'">'.$row['subjectcode'].' - '.$row['subjectname'].'</option>';
			}
		}
		else {
			echo '<option value="" disabled selected>-- No Subject available -- </option>';
			echo '<script>$("#subj_name").hide();document.getElementById("btn_add").disabled = true;</script>';
		}
	}

?>
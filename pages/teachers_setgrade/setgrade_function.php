<?php
if(isset($_POST['btn_add'])){
    $ddl_stud = $_POST['ddl_stud'];
    $ddl_subj = $_POST['ddl_subj'];
    $ddl_period = $_POST['ddl_period'];
    $ddl_criteria = $_POST['ddl_criteria'];
    $txt_score = $_POST['txt_score'];

    $gradequery = mysqli_query($con,"select * from tblgradingcriteria where criterianame = '$ddl_criteria' and subjectid = '$ddl_subj' ");
    while($grow = mysqli_fetch_array($gradequery)){
        $finalgrade = $txt_score*($grow['percentage']/100);
    }

    $query = mysqli_query($con,"INSERT INTO tblstudentgrade (studentid,subjectid,score,finalgrade,period,criterianame) 
        values ('$ddl_stud', '$ddl_subj', '$txt_score', '$finalgrade', '$ddl_period', '$ddl_criteria')") or die('Error: ' . mysqli_error($con));

    if($query == true)
    {
        $_SESSION['added'] = 1;
        header ("location: ".$_SERVER['REQUEST_URI']);
    }   
}


if(isset($_POST['btn_save_stud']))
{

    $txt_id = $_POST['hiddenid'];
    $hiddentstudId = $_POST['hiddentstudId'];
    $hiddentsubjId = $_POST['hiddentsubjId'];
    $txt_edit_ctr = $_POST['txt_edit_ctr'];
    $txt_edit_score = $_POST['txt_edit_score'];

    $gradequery = mysqli_query($con,"select * from tblstudentgrade sg left join tblgradingcriteria gc on gc.subjectid = sg.subjectid AND sg.criterianame = gc.criterianame
        where sg.criterianame = '$txt_edit_ctr' and sg.subjectid = '$hiddentsubjId' and sg.studentid = '$hiddentstudId' ")or die('Error: ' . mysqli_error($con));
    while($grow = mysqli_fetch_array($gradequery)){
        $finalgrade = $txt_edit_score*($grow['percentage']/100);
    }

    $update_query = mysqli_query($con,"UPDATE tblstudentgrade set score = '".$txt_edit_score."', finalgrade = '".$finalgrade."' where id = '".$txt_id."' ") or die('Error: ' . mysqli_error($con));

    if($update_query == true){
        $_SESSION['notif'] = 1;
        header("location: ".$_SERVER['REQUEST_URI']);
    }
}

if(isset($_POST['btn_delete']))
{
    if(isset($_POST['chk_delete']))
    {
        foreach($_POST['chk_delete'] as $value)
        {
            $delete_query = mysqli_query($con,"DELETE from tblgradingcriteria where id = '$value' ") or die('Error: ' . mysqli_error($con));
                    
            if($delete_query == true)
            {
                $_SESSION['delete'] = 1;
                header("location: ".$_SERVER['REQUEST_URI']);
            }
        }
    }
}

?>
<?php
if(isset($_POST['btn_subjadd'])){
    $txt_subj_code = $_POST['txt_subj_code'];
    $txt_subj_name = $_POST['txt_subj_name'];
    $txt_units = $_POST['txt_units'];
    $ddl_course = $_POST['ddl_course'];
    $ddl_yrlvl = $_POST['ddl_yrlvl'];
    $ddl_sem = $_POST['ddl_sem'];
    $txt_sy = $_POST['txt_sy'];

    $chkdup = mysqli_query($con,"SELECT * from tblsubjects where subjectcode = '$txt_subj_code' and subjectname = '$txt_subj_name' and courseid = '$ddl_course' ");
    $num_rows = mysqli_num_rows($chkdup);

    if($num_rows == 0){
        $query = mysqli_query($con,"INSERT INTO tblsubjects (subjectcode,subjectname,units,courseid,yearlevel,schoolyearid,semester) 
            values ('$txt_subj_code', '$txt_subj_name', '$txt_units', '$ddl_course', '$ddl_yrlvl', '$txt_sy', '$ddl_sem')") or die('Error: ' . mysqli_error($con));
        if($query == true)
        {
            $_SESSION['added'] = 1;
            header ("location: ".$_SERVER['REQUEST_URI']);
        }   
    }
    else{
        $_SESSION['duplicate'] = 1;
        header ("location: ".$_SERVER['REQUEST_URI']);
    }
}


if(isset($_POST['btn_save_subj']))
{
    $txt_id = $_POST['hidden_id'];
    $txt_edit_subjcode = $_POST['txt_edit_subjcode'];
    $txt_edit_subjname = $_POST['txt_edit_subjname'];
    $txt_edit_units = $_POST['txt_edit_units'];
    $ddl_edit_course = $_POST['ddl_edit_course'];
    $ddl_edit_yrlvl = $_POST['ddl_edit_yrlvl'];
    $ddl_edit_sy = $_POST['ddl_edit_sy'];

    $update_query = mysqli_query($con,"Update tblsubjects set subjectcode = '".$txt_edit_subjcode."', subjectname = '".$txt_edit_subjname."', units = '".$txt_edit_units."', courseid = '".$ddl_edit_course."', yearlevel = '".$ddl_edit_yrlvl."', schoolyearid = '".$ddl_edit_sy."', semester = '".$ddl_edit_sem."' where id = '".$txt_id."' ") or die('Error: ' . mysqli_error($con));

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
            $delete_query = mysqli_query($con,"DELETE from tblsubjects where id = '$value' ") or die('Error: ' . mysqli_error($con));
                    
            if($delete_query == true)
            {
                $_SESSION['delete'] = 1;
                header("location: ".$_SERVER['REQUEST_URI']);
            }
        }
    }
}

?>
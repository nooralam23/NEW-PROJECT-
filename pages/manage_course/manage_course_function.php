<?php
if(isset($_POST['btn_courseadd'])){
    $txt_coursename = $_POST['txt_coursename'];
    $txt_coursedesc = $_POST['txt_coursedesc'];

    $query = mysqli_query($con,"INSERT INTO tblcourse (courseName,description) 
        values ('$txt_coursename', '$txt_coursedesc')") or die('Error: ' . mysqli_error($con));
    if($query == true)
    {
        $_SESSION['added'] = 1;
        header ("location: ".$_SERVER['REQUEST_URI']);
    }   
}


if(isset($_POST['btn_save_course']))
{
    $txt_id = $_POST['hidden_id'];
    $txt_edit_course = $_POST['txt_edit_course'];
    $txt_edit_course_desc = $_POST['txt_edit_course_desc'];

    $update_query = mysqli_query($con,"Update tblcourse set courseName = '".$txt_edit_course."', description = '".$txt_edit_course_desc."' where id = '".$txt_id."' ") or die('Error: ' . mysqli_error($con));

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
            $delete_query = mysqli_query($con,"DELETE from tblcourse where id = '$value' ") or die('Error: ' . mysqli_error($con));
                    
            if($delete_query == true)
            {
                $_SESSION['delete'] = 1;
                header("location: ".$_SERVER['REQUEST_URI']);
            }
        }
    }
}


?>
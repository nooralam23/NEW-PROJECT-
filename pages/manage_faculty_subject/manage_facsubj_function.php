<?php
if(isset($_POST['btn_add'])){
    $ddl_course = $_POST['ddl_course'];
    $ddl_facid = $_POST['ddl_facid'];
    $ddl_subj = $_POST['ddl_subj'];

    $confirm_duplicate = mysqli_query($con,"SELECT * from tblfacultysubject where facid = '".$ddl_facid."' and subjectid = '".$ddl_subj."' ");
    $rowCount = mysqli_num_rows($confirm_duplicate);
    
    if($rowCount == 0){
        $query = mysqli_query($con,"INSERT INTO tblfacultysubject (facid,subjectid) 
            values ('$ddl_facid', '$ddl_subj')") or die('Error: ' . mysqli_error($con));
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


if(isset($_POST['btn_save']))
{
    $txt_edit_facname = $_POST['txt_edit_facname'];
    $ddl_edit_subj = $_POST['ddl_edit_subj'];

    $update_query = mysqli_query($con,"UPDATE tblfacultysubject set subjectid = '".$ddl_edit_subj."' where facid = '".$txt_edit_facname."' ");

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
            $delete_query = mysqli_query($con,"DELETE from tblfacultysubject where id = '$value' ") or die('Error: ' . mysqli_error($con));
                    
            if($delete_query == true)
            {
                $_SESSION['delete'] = 1;
                header("location: ".$_SERVER['REQUEST_URI']);
            }
        }
    }
}

?>
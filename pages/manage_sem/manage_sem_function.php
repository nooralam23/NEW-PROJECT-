<?php
if(isset($_POST['btn_semadd'])){
    $ddl_sem = $_POST['ddl_sem'];

    $chkdup = mysqli_query($con,"SELECT * from tblsemester where semester = '$ddl_sem' ");
    $num_rows = mysqli_num_rows($chkdup);

    if($num_rows == 0)
    {
        $query = mysqli_query($con,"INSERT INTO tblsemester (semester) 
            values ('$ddl_sem')") or die('Error: ' . mysqli_error($con));
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


if(isset($_POST['btn_save_sem']))
{
    $txt_id = $_POST['hidden_id'];
    $ddl_edit_sem = $_POST['ddl_edit_sem'];

    $update_query = mysqli_query($con,"Update tblsemester set semester = '".$ddl_edit_sem."' where id = '".$txt_id."' ") or die('Error: ' . mysqli_error($con));

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
            $delete_query = mysqli_query($con,"DELETE from tblsemester where id = '$value' ") or die('Error: ' . mysqli_error($con));
                    
            if($delete_query == true)
            {
                $_SESSION['delete'] = 1;
                header("location: ".$_SERVER['REQUEST_URI']);
            }
        }
    }
}

?>
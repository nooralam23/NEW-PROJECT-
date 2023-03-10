<?php
if(isset($_POST['btn_syadd'])){
    $txt_sy = $_POST['txt_sy'];

    $chkdup = mysqli_query($con,"SELECT * from tblschoolyear where schoolyear = '$txt_sy'  ");
    $num_rows = mysqli_num_rows($chkdup);

    if($num_rows == 0)
    {
        $query = mysqli_query($con,"INSERT INTO tblschoolyear (schoolyear) 
            values ('$txt_sy')") or die('Error: ' . mysqli_error($con));
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


if(isset($_POST['btn_save_sy']))
{
    $txt_id = $_POST['hidden_id'];
    $txt_edit_sy = $_POST['txt_edit_sy'];

    $update_query = mysqli_query($con,"Update tblschoolyear set schoolyear = '".$txt_edit_sy."' where id = '".$txt_id."' ") or die('Error: ' . mysqli_error($con));

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
            $delete_query = mysqli_query($con,"DELETE from tblschoolyear where id = '$value' ") or die('Error: ' . mysqli_error($con));
                    
            if($delete_query == true)
            {
                $_SESSION['delete'] = 1;
                header("location: ".$_SERVER['REQUEST_URI']);
            }
        }
    }
}

?>
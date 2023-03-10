<?php
if(isset($_POST['btn_add'])){
    $txt_sect = $_POST['txt_sect'];
    $ddl_yrlvl = $_POST['ddl_yrlvl'];

    $chkdup = mysqli_query($con,"SELECT * from tblsection where section = '$txt_sect' and yearlevel='$ddl_yrlvl' ");
    $num_rows = mysqli_num_rows($chkdup);

    if($num_rows == 0) {
        $query = mysqli_query($con,"INSERT INTO tblsection (section,yearlevel) 
            values ('$txt_sect', '$ddl_yrlvl')") or die('Error: ' . mysqli_error($con));
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
    $txt_id = $_POST['hidden_id'];
    $txt_edit_section = $_POST['txt_edit_sect'];
    $ddl_edit_yrlvl = $_POST['ddl_edit_yrlvl'];

    $update_query = mysqli_query($con,"UPDATE tblsection set section = '".$txt_edit_section."', yearlevel = '".$ddl_edit_yrlvl."' where id = '".$txt_id."' ") or die('Error: ' . mysqli_error($con));

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
            $delete_query = mysqli_query($con,"DELETE from tblsection where id = '$value' ") or die('Error: ' . mysqli_error($con));
                    
            if($delete_query == true)
            {
                $_SESSION['delete'] = 1;
                header("location: ".$_SERVER['REQUEST_URI']);
            }
        }
    }
}

?>
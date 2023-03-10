<?php
if(isset($_POST['btn_add'])){
    $ddl_subj = $_POST['ddl_subj'];
    $txt_criteria = $_POST['txt_criteria'];
    $txt_percent = $_POST['txt_percent'];
    $txt_total = $_POST['txt_total'];
    //$txt_period = $_POST['txt_period'];

    $chkquery = mysqli_query($con,"SELECT *,sum(percentage) as total from tblgradingcriteria where subjectid = '".$ddl_subj."' ");
    $chkrow = mysqli_fetch_array($chkquery);
    $total = $chkrow['total'] + $txt_percent;

    if($total <= 100)
    {
        $query = mysqli_query($con,"INSERT INTO tblgradingcriteria (criterianame,percentage,totalreq,subjectid,period) 
            values ('$txt_criteria', '$txt_percent', '$txt_total', '$ddl_subj', '')") or die('Error: ' . mysqli_error($con));
        if($query == true)
        {
            $_SESSION['added'] = 1;
            header ("location: ".$_SERVER['REQUEST_URI']);
        }  
    } 
    else{
        $_SESSION['excess'] = 1;
        header ("location: ".$_SERVER['REQUEST_URI']);
    }
}


if(isset($_POST['btn_save_criteria']))
{
    $txt_id = $_POST['hidden_id'];
    $txt_edit_percent = $_POST['txt_edit_percent'];
    $txt_edit_total = $_POST['txt_edit_total'];
    //$txt_edit_period = $_POST['txt_edit_period'];

    $update_query = mysqli_query($con,"UPDATE tblgradingcriteria set percentage = '".$txt_edit_percent."', totalreq = '".$txt_edit_total."', period = '' where id = '".$txt_id."' ") or die('Error: ' . mysqli_error($con));

    if($update_query == true){
        $_SESSION['notif'] = 1;
        header("location: ".$_SERVER['REQUEST_URI']);
    }
}

if(isset($_POST['btn_delete']))
{
    $subj_id = $_SESSION['subj_id'];
    $criterianame = $_SESSION['criterianame'];
    //$period = $_SESSION['period'];

    if(isset($_POST['chk_delete']))
    {
        foreach($_POST['chk_delete'] as $value)
        {
            $delete_query = mysqli_query($con,"DELETE from tblgradingcriteria where subjectid = '$subj_id' and criterianame = '$criterianame' ") or die('Error: ' . mysqli_error($con));
                    
            if($delete_query == true)
            {
                $_SESSION['delete'] = 1;
                header("location: ".$_SERVER['REQUEST_URI']);
            }
        }
    }
}

?>
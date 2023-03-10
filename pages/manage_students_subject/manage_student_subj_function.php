<?php
if(isset($_POST['btn_studsubjadd'])){
    $ddl_course = $_POST['ddl_course'];
    $ddl_studid = $_POST['ddl_studname'];
    $ddl_subj = $_POST['ddl_subj'];
    $ddl_adv = $_POST['ddl_adv'];

    $chkdup = mysqli_query($con,"SELECT * from tblstudentsubject where studentid = '".$ddl_studid."' and subjectid = '".$ddl_subj."' and facid = '".$ddl_adv."' ");
    $num_rows = mysqli_num_rows($chkdup);

    if($num_rows == 0){
        $query = mysqli_query($con,"INSERT INTO tblstudentsubject (studentid,subjectid,facid) 
            values ('$ddl_studid', '$ddl_subj', '$ddl_adv')") or die('Error: ' . mysqli_error($con));
        if($query == true)
        {
            $_SESSION['added'] = 1;
            header ("location: ".$_SERVER['REQUEST_URI']);
        }
    }else{
        
        $_SESSION['duplicate'] = 1;
        header ("location: ".$_SERVER['REQUEST_URI']);
    }
}


if(isset($_POST['btn_studsubj_save']))
{
    $hidden_id = $_POST['hidden_id'];
    $txt_edit_studnum = $_POST['txt_edit_studnum'];
    $ddl_edit_fac = $_POST['ddl_edit_fac'];
    $ddl_edit_subj = $_POST['ddl_edit_subj'];


    $sjquery = mysqli_query($con, "SELECT * from tblstudent where studNo = '".$txt_edit_studnum."' ");
    while($sjrow= mysqli_fetch_array($sjquery)){
        $studID = $sjrow['id'];
    }

    $update_query = mysqli_query($con,"UPDATE tblstudentsubject set facid = '".$ddl_edit_fac."', subjectid = '".$ddl_edit_subj."' where studentid = '".$studID."' and id = '$hidden_id' ");

    if($update_query == true){
        $_SESSION['notif'] = 1;
        header("location: ".$_SERVER['REQUEST_URI']);
    }
}

if(isset($_POST['btn_delete']))
{
   echo isset($_POST["btn_delete"]);
    if(isset($_POST['chk_delete']))
    {
        echo 'sdsafs';
        foreach($_POST['chk_delete'] as $value)
        {
            $delete_query = mysqli_query($con,"DELETE from tblstudent where studNo = '$value' ") or die('Error: ' . mysqli_error($con));
                    
            if($delete_query == true)
            {
                $_SESSION['delete'] = 1;
                header("location: ".$_SERVER['REQUEST_URI']);
            }
        }
    }
}

?>
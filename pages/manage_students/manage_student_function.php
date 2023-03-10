<?php
if(isset($_POST['btn_studadd'])){
    $txt_studnum = $_POST['txt_studnum'];
    $txt_fname = $_POST['txt_fname'];
    $txt_mname = $_POST['txt_mname'];
    $txt_lname = $_POST['txt_lname'];
    $ddl_course = $_POST['ddl_course'];
    $ddl_yrlvl = $_POST['ddl_yrlvl'];
    $ddl_sect = $_POST['ddl_sect'];
    $ddl_adv = $_POST['ddl_adv'];
    $txt_username = $_POST['txt_username'];
    $txt_pass = $_POST['txt_pass'];
    $txt_cpass = $_POST['txt_cpass'];
    //$ddl_quest1 = $_POST['ddl_quest'];
    //$txt_ans1 = $_POST['txt_ans'];


    $chkdup = mysqli_query($con,"SELECT * from tblstudent where studNo = '$txt_studnum' ");
    $num_rows = mysqli_num_rows($chkdup);

    if($txt_cpass == $txt_pass){
        if($num_rows == 0){
            $query = mysqli_query($con,"INSERT INTO tblstudent (studNo,fname,mname,lname,course,year,section,adviser,username,password,confirmpass,securityquestion,answer) 
                values ('$txt_studnum', '$txt_fname', '$txt_mname','$txt_lname','$ddl_course', '$ddl_yrlvl', '$ddl_sect', '$ddl_adv', '$txt_username', '$txt_pass', '$txt_cpass'") or die('Error: ' . mysqli_error($con));
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
    else{
        $_SESSION['invalidpass'] = 1;
        header ("location: ".$_SERVER['REQUEST_URI']);
    }
}


if(isset($_POST['btn_save_stud']))
{
    $txt_edit_studnum = $_POST['txt_edit_studnum'];
    $txt_edit_fname = $_POST['txt_edit_fname'];
    $txt_edit_mname = $_POST['txt_edit_mname'];
    $txt_edit_lname = $_POST['txt_edit_lname'];
    $ddl_edit_course = $_POST['ddl_edit_course'];
    $ddl_edit_yrlvl = $_POST['ddl_edit_yrlvl'];
    $ddl_edit_sect = $_POST['ddl_edit_sect'];
    $ddl_edit_adv = $_POST['ddl_edit_adv'];
    $txt_edit_username = $_POST['txt_edit_username'];
    $txt_edit_pass = $_POST['txt_edit_pass'];
    $txt_edit_cpass = $_POST['txt_edit_cpass'];
   // $ddl_edit_quest1 = $_POST['ddl_edit_quest'];
   // $txt_edit_ans1 = $_POST['txt_edit_ans'];

    if($txt_edit_cpass == $txt_edit_pass){
        $update_query = mysqli_query($con,"UPDATE tblstudent set fname = '".$txt_edit_fname."', mname = '".$txt_edit_mname."', lname = '".$txt_edit_lname."', course = '".$ddl_edit_course."', year = '".$ddl_edit_yrlvl ."', section = '".$ddl_edit_sect."', adviser='".$ddl_edit_adv."', username='".$txt_edit_username."', password='".$txt_edit_pass."', confirmpass='".$txt_edit_cpass."' where studNo = '".$txt_edit_studnum."' ");

        if($update_query == true){
            $_SESSION['notif'] = 1;
            header("location: ".$_SERVER['REQUEST_URI']);
        }
    }
    else{
        $_SESSION['invalidpass'] = 1;
        header ("location: ".$_SERVER['REQUEST_URI']);
    }
}

if(isset($_POST['btn_delete']))
{
    if(isset($_POST['chk_delete']))
    {
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
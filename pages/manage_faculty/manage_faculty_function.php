<?php
if(isset($_POST['btn_facadd'])){
    $txt_facnum = $_POST['txt_facnum'];
    $txt_fname = $_POST['txt_fname'];
    $txt_mname = $_POST['txt_mname'];
    $txt_lname = $_POST['txt_lname'];
    $ddl_course = $_POST['ddl_course'];
    $txt_username = $_POST['txt_username'];
    $txt_pass = $_POST['txt_pass'];
    $txt_cpass = $_POST['txt_cpass'];
    $ddl_quest = $_POST['ddl_quest'];
    $txt_ans = $_POST['txt_ans'];

    $chkdup = mysqli_query($con,"SELECT * from tblfaculty where facNo = '$txt_facnum' or (lname = '$txt_lname' and fname = '$txt_fname' and mname = '$txt_mname') ");
    $num_rows = mysqli_num_rows($chkdup);

    if($txt_pass == $txt_cpass){
        if($num_rows == 0){
            $query = mysqli_query($con,"INSERT INTO tblfaculty (facNo,fname,mname,lname,courseid,username,password,confirmpass,securityquestion,answer) 
                values ('$txt_facnum', '$txt_fname', '$txt_mname','$txt_lname','$ddl_course', '$txt_username', '$txt_pass', '$txt_cpass', '$ddl_quest', '$txt_ans')") or die('Error: ' . mysqli_error($con));
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
    else{
        $_SESSION['invalidpass'] = 1;
        header ("location: ".$_SERVER['REQUEST_URI']);
    }
}


if(isset($_POST['btn_save_fac']))
{
    $txt_edit_facnum = $_POST['txt_edit_facnum'];
    $txt_edit_fname = $_POST['txt_edit_fname'];
    $txt_edit_mname = $_POST['txt_edit_mname'];
    $txt_edit_lname = $_POST['txt_edit_lname'];
    $ddl_edit_course = $_POST['ddl_edit_course'];
    $txt_edit_username = $_POST['txt_edit_username'];
    $txt_edit_pass = $_POST['txt_edit_pass'];
    $txt_edit_cpass = $_POST['txt_edit_cpass'];
    $ddl_edit_quest = $_POST['ddl_edit_quest'];
    $txt_edit_ans = $_POST['txt_edit_ans'];

    if($txt_edit_cpass == $txt_edit_pass){
        $update_query = mysqli_query($con,"UPDATE tblfaculty set fname = '".$txt_edit_fname."', mname = '".$txt_edit_mname."', lname = '".$txt_edit_lname."', courseid = '".$ddl_edit_course."', username='".$txt_edit_username."', password='".$txt_edit_pass."', confirmpass='".$txt_edit_cpass."', securityquestion = '".$ddl_edit_quest."', answer = '".$txt_edit_ans."' where facNo = '".$txt_edit_facnum."' ");

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
            $delete_query = mysqli_query($con,"DELETE from tblfaculty where facNo = '$value' ") or die('Error: ' . mysqli_error($con));
                    
            if($delete_query == true)
            {
                $_SESSION['delete'] = 1;
                header("location: ".$_SERVER['REQUEST_URI']);
            }
        }
    }
}

?>
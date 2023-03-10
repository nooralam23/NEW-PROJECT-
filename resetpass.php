<!DOCTYPE html>
<html>
<?php
session_start();
?>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />

    </head>
    <body class="skin-black">
        <div class="container" style="margin-top:30px">
          <div class="col-md-4 col-md-offset-4">
              <div class="panel panel-default">
            <div class="panel-heading"><h3 class="panel-title"><strong></strong></h3></div>
            <div class="panel-body">
              <form role="form" method="post">
                <div class="form-group">
                  <label for="txt_newpass">New Password</label>
                  <input type="password" class="form-control" style="border-radius:0px" name="txt_newpass" placeholder="Enter Username">
                </div>
                <div class="form-group">
                  <label for="txt_conpass">Confirm Password</label>
                  <input type="password" class="form-control" style="border-radius:0px" name="txt_conpass" placeholder="Enter Password">
                </div>
                <button type="submit" class="btn btn-sm btn-primary" name="btn_reset">Reset</button>
              </form>
            </div>
          </div>
          </div>
        </div>

      <?php
        include "pages/connection.php";
        if(isset($_POST['btn_reset']))
        { 
            $txt_newpass = $_POST['txt_newpass'];
            $txt_conpass = $_POST['txt_conpass'];


            $admin = mysqli_query($con, "UPDATE tbladmin set password = '$txt_newpass', confirmpass = '$txt_conpass' where id = '".$_SESSION['userid']."' ");
            //$numrow = mysqli_num_rows($admin);

            $faculty = mysqli_query($con, "UPDATE tblfaculty set password = '$txt_newpass', confirmpass = '$txt_conpass' where id = '".$_SESSION['userid']."' ");
            //$numrow1 = mysqli_num_rows($faculty);

            $student = mysqli_query($con, "UPDATE tblstudent set password = '$txt_newpass', confirmpass = '$txt_conpass' where id = '".$_SESSION['userid']."'  ");
               // $numrow2 = mysqli_num_rows($student);

            if($admin == true)
            {   
                header ('location: login.php');
            }
            elseif($faculty == true)
              {
                
                header ('location: login.php');
              }
            elseif($student == true)
                {
                 
                  header ('location: login.php');
                }
             
        }
        
      ?>

    </body>
</html>
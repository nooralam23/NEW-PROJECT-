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
                  <label for="txt_username">Username</label>
                  <input type="text" class="form-control" style="border-radius:0px" name="txt_username" placeholder="Enter Username">
                </div>
                <div class="form-group">
                  <label for="txt_password">Password</label>
                  <input type="password" class="form-control" style="border-radius:0px" name="txt_password" placeholder="Enter Password">
                </div>
                <div class="form-group">
                  <a href="forgotpass.php">Forgot Password? </a>
                </div>
                <button type="submit" class="btn btn-sm btn-primary" name="btn_login">Log in</button>
              </form>
            </div>
          </div>
          </div>
        </div>

      <?php
        include "pages/connection.php";
        if(isset($_POST['btn_login']))
        { 
            $username = $_POST['txt_username'];
            $password = $_POST['txt_password'];


            $admin = mysqli_query($con, "SELECT * from tbladmin where username = '$username' and password = '$password' ");
            $numrow = mysqli_num_rows($admin);

            $faculty = mysqli_query($con, "SELECT * from tblfaculty where username = '$username' and password = '$password' ");
            $numrow1 = mysqli_num_rows($faculty);

            $student = mysqli_query($con, "SELECT * from tblstudent where username = '$username' and password = '$password' ");
                $numrow2 = mysqli_num_rows($student);

            if($numrow > 0)
            {
                while($row = mysqli_fetch_array($admin)){
                  $_SESSION['role'] = "Administrator";
                  $_SESSION['userid'] = $row['id'];
                }    
                header ('location: pages/dashboard/dashboard.php');
            }
            elseif($numrow1 > 0)
              {
                while($row = mysqli_fetch_array($faculty)){
                  $_SESSION['role'] = "Faculty";
                  $_SESSION['userid'] = $row['id'];
                } 
                header ('location: pages/teachers/set_criteria.php');
              }
            elseif($numrow2 > 0)
                {
                  while($row = mysqli_fetch_array($student)){
                    $_SESSION['role'] = "Student";
                    $_SESSION['userid'] = $row['id'];
                  } 
                  header ('location: pages/student/view_grade_student.php');
                }
             else
                {
                  echo '<div style="position:center; color:red;">Invalid Account</div>';
                  if(isset($_COOKIE['login'])){
                        if($_COOKIE['login'] < 3){
                             $attempts = $_COOKIE['login'] + 1;
                             setcookie('login', $attempts, time()+60*10); //set the cookie for 10 minutes with the number of attempts stored
                        } else{
                             header ('location: forgotpass.php');
                        }
                   } else{
                        setcookie('login', 1, time()+60*10); //set the cookie for 10 minutes with the initial value of 1
                   }
                }
             
        }
        
      ?>

    </body>
</html>
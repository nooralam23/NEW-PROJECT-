<!DOCTYPE html>
<html>
<?php
session_start();
?>
    <head>
        <meta charset="UTF-8">
        <title>Forgot Password</title>
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
                  <label for="txt_password">Security Question</label>
                  <select name="dll_quest" class="form-control">
                    <option>Question 1</option>
                    <option>Question 2</option>
                    <option>Question 3</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="txt_ans">Answer</label>
                  <input type="text" class="form-control" style="border-radius:0px" name="txt_ans" placeholder="Answer">
                </div>
                <button type="submit" class="btn btn-sm btn-primary" name="btn_resetpass">Reset Password</button>
              </form>
            </div>
          </div>
          </div>
        </div>

      <?php
        include "pages/connection.php";
        if(isset($_POST['btn_resetpass']))
        { 
            $username = $_POST['txt_username'];
            $dll_quest = $_POST['dll_quest'];
            $txt_ans = $_POST['txt_ans'];


            $admin = mysqli_query($con, "SELECT * from tbladmin where username = '$username' and securityquestion = '$dll_quest' and answer = '$txt_ans' ");
            $numrow = mysqli_num_rows($admin);

            $faculty = mysqli_query($con, "SELECT * from tblfaculty where username = '$username' and securityquestion = '$dll_quest' and answer = '$txt_ans' ");
            $numrow1 = mysqli_num_rows($faculty);

            $student = mysqli_query($con, "SELECT * from tblstudent where username = '$username' and securityquestion = '$dll_quest' and answer = '$txt_ans' ");
                $numrow2 = mysqli_num_rows($student);

            if($numrow > 0)
            {
                while($row = mysqli_fetch_array($admin)){
                  $_SESSION['userid'] = $row['id'];
                }  
                header ('location: resetpass.php');
            }
            elseif($numrow1 > 0)
              {
                while($row = mysqli_fetch_array($faculty)){
                  $_SESSION['userid'] = $row['id'];
                } 
                header ('location: resetpass.php');
              }
            elseif($numrow2 > 0)
                {
                  while($row = mysqli_fetch_array($student)){
                    $_SESSION['userid'] = $row['id'];
                  } 
                header ('location: resetpass.php');
                }
             else
                {
                  echo 'invalid account';
                }
             
        }
        
      ?>

    </body>
</html>
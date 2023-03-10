  <?php
  session_start();
            ob_start();
   echo  '<header class="header">
            <a href="#" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                Online Grading System
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">

                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>';

                                if($_SESSION['role'] == "Administrator"){
                                    $user = mysqli_query($con,"SELECT * from tbladmin where id = '".$_SESSION['userid']."' ");
                                    while($row = mysqli_fetch_array($user)){
                                        $_SESSION['user'] = $row['accounttype'];
                                        echo'<span>'.$row['accounttype'].'<i class="caret"></i></span>';
                                    }
                                }
                                elseif($_SESSION['role'] == "Faculty"){
                                    $user = mysqli_query($con,"SELECT * from tblfaculty where id = '".$_SESSION['userid']."' ");
                                    while($row = mysqli_fetch_array($user)){
                                        $_SESSION['user'] = $row['fname'].' '.$row['lname'];
                                        echo'<span>'.$row['fname'].' '.$row['lname'].'<i class="caret"></i></span>';
                                    }
                                }
                                elseif($_SESSION['role'] == "Student"){
                                    $user = mysqli_query($con,"SELECT * from tblstudent where id = '".$_SESSION['userid']."' ");
                                    while($row = mysqli_fetch_array($user)){
                                        $_SESSION['user'] = $row['fname'].' '.$row['lname'];
                                        echo'<span>'.$row['fname'].' '.$row['lname'].'<i class="caret"></i></span>';
                                    }
                                }

                            echo '</a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    
                                    <p>
                                        '.$_SESSION['user'].'
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat" data-toggle="modal" data-target="#editProfileModal">Edit Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="../../logout.php" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>'; ?>


         <div id="editProfileModal" class="modal fade">
            <form method="post">
              <div class="modal-dialog modal-sm" style="width:300px !important;">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Edit Profile</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                        <?php
                        if($_SESSION['role'] == "Administrator"){
                            $user = mysqli_query($con,"SELECT * from tbladmin where id = '".$_SESSION['userid']."' ");
                            while($row = mysqli_fetch_array($user)){
                                echo '
                                    <div class="form-group">
                                        <label>Username:</label>
                                        <input name="txt_username" id="txt_username" class="form-control input-sm" type="text" value="'.$row['username'].'" />
                                    </div>
                                    <div class="form-group">
                                        <label>Password:</label>
                                        <input name="txt_password" id="txt_password" class="form-control input-sm" type="password"  value="'.$row['password'].'"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Confirm Password:</label>
                                        <input name="txt_cpassword" id="txt_cpassword" class="form-control input-sm" type="password"  value="'.$row['confirmpass'].'"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Security Question:</label>
                                        <select name="ddl_quest" id="ddl_quest" data-style="btn-primary" class="form-control input-sm">
                                            <option>'.$row['securityquestion'].'</option>
                                            <option>Question 1</option>
                                            <option>Question 2</option>
                                            <option>Question 3</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Answer:</label>
                                        <input name="txt_ans" id="txt_ans" class="form-control input-sm" type="text" value="'.$row['answer'].'" />
                                    </div>';
                            } 
                        }
                        elseif($_SESSION['role'] == "Faculty"){
                            $user = mysqli_query($con,"SELECT * from tblfaculty where id = '".$_SESSION['userid']."' ");
                            while($row = mysqli_fetch_array($user)){
                                echo '
                                    <div class="form-group">
                                        <label>Faculty #:</label>
                                        <input name="txt_facnum" id="txt_facnum" class="form-control input-sm" disabled type="text" value="'.$row['facNo'].'" />
                                    </div>
                                    <div class="form-group">
                                        <label>Faculty Name:</label>
                                        <input name="txt_facname" id="txt_facname" class="form-control input-sm" disabled type="text"  value="'.$row['fname'].' '.$row['mname'].' '.$row['lname'].'"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Username:</label>
                                        <input name="txt_username" id="txt_username" class="form-control input-sm" type="text" value="'.$row['username'].'" />
                                    </div>
                                    <div class="form-group">
                                        <label>Password:</label>
                                        <input name="txt_password" id="txt_password" class="form-control input-sm" type="password"  value="'.$row['password'].'"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Confirm Password:</label>
                                        <input name="txt_cpassword" id="txt_cpassword" class="form-control input-sm" type="password"  value="'.$row['confirmpass'].'"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Security Question:</label>
                                        <select name="ddl_quest" id="ddl_quest" data-style="btn-primary" class="form-control input-sm">
                                            <option>'.$row['securityquestion'].'</option>
                                            <option>Question 1</option>
                                            <option>Question 2</option>
                                            <option>Question 3</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Answer:</label>
                                        <input name="txt_ans" id="txt_ans" class="form-control input-sm" type="text" value="'.$row['answer'].'" />
                                    </div>';
                            } 
                        }
                        elseif($_SESSION['role'] == "Student"){
                            $user = mysqli_query($con,"SELECT * from tblstudent where id = '".$_SESSION['userid']."' ");
                            while($row = mysqli_fetch_array($user)){
                                echo '
                                    <div class="form-group">
                                        <label>Student #:</label>
                                        <input name="txt_studnum" id="txt_studnum" class="form-control input-sm" disabled type="text" value="'.$row['studNo'].'" />
                                    </div>
                                    <div class="form-group">
                                        <label>Student Name:</label>
                                        <input name="txt_studname" id="txt_studname" class="form-control input-sm" disabled type="text"  value="'.$row['fname'].' '.$row['mname'].' '.$row['lname'].'"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Username:</label>
                                        <input name="txt_username" id="txt_username" class="form-control input-sm" type="text" value="'.$row['username'].'" />
                                    </div>
                                    <div class="form-group">
                                        <label>Password:</label>
                                        <input name="txt_password" id="txt_password" class="form-control input-sm" type="text"  value="'.$row['password'].'"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Confirm Password:</label>
                                        <input name="txt_cpassword" id="txt_cpassword" class="form-control input-sm" type="text"  value="'.$row['confirmpass'].'"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Security Question:</label>
                                        <select name="ddl_quest" id="ddl_quest" data-style="btn-primary" class="form-control input-sm">
                                            <option>'.$row['securityquestion'].'</option>
                                            <option>Question 1</option>
                                            <option>Question 2</option>
                                            <option>Question 3</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Answer:</label>
                                        <input name="txt_ans" id="txt_ans" class="form-control input-sm" type="text" value="'.$row['answer'].'" />
                                    </div>';
                            } 
                        }
                        ?>
                         
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default btn-sm" data-dismiss="modal" value="Cancel"/>
                        <input type="submit" class="btn btn-primary btn-sm" id="btn_saveeditProfile" name="btn_saveeditProfile" value="Save"/>
                    </div>
                </div>
              </div>
              </form>
            </div>


            <?php
            include "duplicate_error.php";
            if(isset($_POST['btn_saveeditProfile'])){
                $username = $_POST['txt_username'];
                $password = $_POST['txt_password'];
                $confirmpass = $_POST['txt_cpassword'];
                $ddl_quest = $_POST['ddl_quest'];
                $txt_ans = $_POST['txt_ans'];


                if($confirmpass == $password){
                    if($_SESSION['role'] == "Administrator"){
                        $updadmin = mysqli_query($con,"UPDATE tbladmin set username = '$username', password = '$password', confirmpass = '$confirmpass',securityquestion = '$ddl_quest',answer = '$txt_ans' where id = '".$_SESSION['userid']."' ");
                        if($updadmin == true){
                            $_SESSION['notif'] = 1;
                            header ("location: ".$_SERVER['REQUEST_URI']);
                        }
                    }
                    elseif($_SESSION['role'] == "Faculty"){
                        $updfaculty = mysqli_query($con,"UPDATE tblfaculty set username = '$username', password = '$password', confirmpass = '$confirmpass',securityquestion = '$ddl_quest',answer = '$txt_ans' where id = '".$_SESSION['userid']."' ");
                        if($updfaculty == true){
                            $_SESSION['notif'] = 1;
                            header ("location: ".$_SERVER['REQUEST_URI']);
                        }
                    }
                    elseif($_SESSION['role'] == "Student"){
                        $updstudent = mysqli_query($con,"UPDATE tblstudent set username = '$username', password = '$password', confirmpass = '$confirmpass',securityquestion = '$ddl_quest',answer = '$txt_ans' where id = '".$_SESSION['userid']."' ");
                        if($updstudent == true){
                            $_SESSION['notif'] = 1;
                            header ("location: ".$_SERVER['REQUEST_URI']);
                        }
                    }
                }
                else{
                    $_SESSION['invalidpass'] = 1;
                    header ("location: ".$_SERVER['REQUEST_URI']);
                }
            }

            ?>

            <?php
             if(isset($_SESSION['notif'])){
                echo '<script>$(document).ready(function (){success();});</script>';
                unset($_SESSION['notif']);
                } ?>
            <div class="alert alert-success alert-autocloseable-success" style=" position: fixed; top: 1em; right: 1em; z-index: 9999; display: none;">
                 Edited Student Saved!
            </div>
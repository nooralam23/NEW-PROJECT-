<?php

	echo '
	<aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        
                        <div class="pull-left info">
                            <h4>Hello, ';

                                if($_SESSION['role'] == "Administrator"){
                                    $user = mysqli_query($con,"SELECT * from tbladmin where id = '".$_SESSION['userid']."' ");
                                    while($row = mysqli_fetch_array($user)){
                                        $_SESSION['user'] = $row['accounttype'];
                                        echo $row['accounttype'];
                                    }
                                }
                                elseif($_SESSION['role'] == "Faculty"){
                                    $user = mysqli_query($con,"SELECT * from tblfaculty where id = '".$_SESSION['userid']."' ");
                                    while($row = mysqli_fetch_array($user)){
                                        $_SESSION['user'] = $row['fname'].' '.$row['lname'];
                                        echo $row['fname'].' '.$row['lname'];
                                    }
                                }
                                elseif($_SESSION['role'] == "Student"){
                                    $user = mysqli_query($con,"SELECT * from tblstudent where id = '".$_SESSION['userid']."' ");
                                    while($row = mysqli_fetch_array($user)){
                                        $_SESSION['user'] = $row['fname'].' '.$row['lname'];
                                        echo $row['fname'].' '.$row['lname'];
                                    }
                                }
                                echo '
                            </h4>

                        </div>
                    </div>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">';
                        if($_SESSION['role'] == "Administrator"){
                            echo '
                            <li>
                                <a href="../dashboard/dashboard.php">
                                    <i class="fa  fa-dashboard"></i> <span>Dashboard</span>
                                </a>
                            </li>
                            <li>
                                <a href="../manage_course/manage_course.php">
                                    <i class="fa  fa-university"></i> <span>Course</span>
                                </a>
                            </li>
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-user"></i> <span>Faculty</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="../manage_faculty/manage_faculty.php"><i class="fa fa-angle-double-right"></i> Manage Faculty</a></li>
                                    <li><a href="../manage_faculty_subject/manage_faculty_subject.php"><i class="fa fa-angle-double-right"></i> Manage Faculty Subject</a></li>
                                </ul>
                            </li>
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-users"></i> <span>Students</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="../manage_students/manage_student.php"><i class="fa fa-angle-double-right"></i> Manage Students</a></li>
                                    <li><a href="../manage_students_subject/manage_student_subj.php"><i class="fa fa-angle-double-right"></i> Manage Students Subject</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="../manage_subject/manage_subject.php">
                                    <i class="fa fa-book"></i> <span>Subject</span>
                                </a>
                            </li>
                            <li>
                                <a href="../manage_section/manage_section.php">
                                    <i class="fa fa-list-ol"></i> <span>Section</span>
                                </a>
                            </li>
                            <li>
                                <a href="../manage_schoolyear/manage_schoolyear.php">
                                    <i class="fa fa-calendar"></i> <span>School Year</span>
                                </a>
                            </li>
                            <li>
                                <a href="../manage_sem/manage_sem.php">
                                    <i class="fa fa-calendar"></i> <span>Semester</span>
                                </a>
                            </li>
                            <li>
                                <a href="../backup/backup.php">
                                    <i class="fa fa-database"></i> <span>Backup/Restore Database</span>
                                </a>
                            </li>';
                        }
                        elseif($_SESSION['role'] == "Faculty"){
                            echo '
                            <li>
                                <a href="../teachers/set_criteria.php">
                                    <i class="fa fa-edit "></i> <span>Set Grade Criteria</span>
                                </a>
                            </li>
                            <li>
                                <a href="../teachers_setgrade/grade.php">
                                    <i class="fa fa-edit "></i> <span>Set Grade</span>
                                </a>
                            </li>
                            <li>
                                <a href="../teachers/print_student.php">
                                    <i class="fa fa-print"></i> <span>Print Student List</span>
                                </a>
                            </li>
                            <li>
                                <a href="../teachers_setgrade/view_grade.php">
                                    <i class="fa fa-print"></i> <span>View/Print Student Grade</span>
                                </a>
                            </li>';
                        }
                        elseif($_SESSION['role'] == "Student"){
                            echo '
                            <li>
                            <a href="../student/view_grade_student.php">
                                <i class="fa fa-print"></i> <span>View Grade</span>
                            </a>
                            </li>';
                        }
                        echo'
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>
	';
?>
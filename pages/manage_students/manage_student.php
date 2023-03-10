<!DOCTYPE html>
<html>
    <?php include('../head_css.php'); ?>
    <body class="skin-black">
        <!-- header logo: style can be found in header.less -->
        <?php 
        ob_start();
        include "../connection.php";
        ?>
        <?php include('../header.php'); ?>

        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <?php include('../sidebar-left.php'); ?>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Manage Students
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <!-- left column -->
                            <div class="box">
                                <div class="box-header">
                                    <div style="padding:10px;">
                                        
                                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addStudentModal"><i class="fa fa-plus" aria-hidden="true"></i> Add Student</button>  

                                        <button class="btn btn-danger btn-sm" id="btn_del"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button> 

                                
                                    </div>                                
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                <form method="post">
                                    <table id="student_table" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th style="width: 20px !important;"><input type="checkbox" name="chk_delete[]" class="cbxMain" onchange="checkMain(this)" /></th>
                                                <th>Student #</th>
                                                <th>Name</th>
                                                <th>Course</th>
                                                <th>Year</th>
                                                <th>Section</th>
                                                <th>Adviser</th>
                                                <th>Username</th>
                                                <th style="width: 40px !important;">Option</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $squery = mysqli_query($con, "select *,s.fname as sfname, s.lname as slname, s.mname as smname, s.password as sPassword,s.confirmpass as scPassword, s.username as sUsername,f.id as fid, c.id as cid, CONCAT(f.lname, ', ', f.fname, ' ', f.mname) as adviser, CONCAT(s.lname, ', ', s.fname, ' ', s.mname) as student  from tblstudent s left join tblfaculty f on f.id = s.adviser left join tblcourse c on  s.course  = c.id");
                                            while($row = mysqli_fetch_array($squery))
                                            {
                                                echo '
                                                <tr>
                                                    <td><input type="checkbox" name="chk_delete[]" class="chk_delete" value="'.$row['studNo'].'" /></td>
                                                    <td>'.$row['studNo'].'</td>
                                                    <td>'.$row['student'].'</td>
                                                    <td>'.$row['courseName'].' - '.$row['description'].'<span hidden>'.$row['cid'].'</span></td>
                                                    <td>'.$row['year'].'</td>
                                                    <td>'.$row['section'].'</td>
                                                    <td>'.$row['adviser'].'<span hidden>'.$row['fid'].'</span></td>
                                                    <td>'.$row['sUsername'].'</td>
                                                    <td><button class="btn btn-primary btn-sm" data-target="#editStudentModal'.$row['studNo'].'" data-toggle="modal"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></td>
                                                </tr>
                                                ';

                                                include "editstudent_modal.php";
                                            }
                                            ?>
                                        </tbody>
                                    </table>

                                    <?php include "../deleteModal.php"; ?>

                                    </form>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->

                            <?php if(isset($_SESSION['notif'])){
                                echo '<script>$(document).ready(function (){success();});</script>';
                                unset($_SESSION['notif']);
                                } ?>
                            <div class="alert alert-success alert-autocloseable-success" style=" position: fixed; top: 1em; right: 1em; z-index: 9999; display: none;">
                                 Edited Student Saved!
                            </div>
                            <?php include "../added_notif.php"; ?>

                            <?php include "../delete_notif.php"; ?>
                            <?php include "../duplicate_error.php"; ?>

            <?php include "addstudent_modal.php"; ?>

            <?php include "manage_student_function.php"; ?>


                    </div>   <!-- /.row -->
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
        <!-- jQuery 2.0.2 -->
        <?php include "../footer.php"; ?>
<script type="text/javascript">
$("#btn_del").click(function(event) {

        for(var i=0; i < $('.chk_delete').length; i++) {
            if (!$('.chk_delete')[i].checked) {
                //function noselected(){
                    $('#autoclosable-btn-noselected').prop('disabled', true);
                    $('.alert-autocloseable-noselected').show();

                    $('.alert-autocloseable-noselected').delay(3000).fadeOut( 'slow', function() {
                        // Animation complete.
                        $('#autoclosable-btn-noselected').prop('disabled', false);
                    });

                //}
               //return;
            }
            else{
                $('.alert-autocloseable-noselected').hide();
                $('#deleteModal').modal('show');
                return;
            }
        };
    });

    $(function() {
        $("#student_table").dataTable({
           "aoColumnDefs": [ { "bSortable": false, "aTargets": [ 0,8 ] } ],"aaSorting": []
        });
    });
</script>
    </body>
</html>
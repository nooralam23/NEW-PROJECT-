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
                        Students Grade
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <!-- left column -->
                            <div class="box">
                                <div class="box-header">
                                    <div style="padding:10px;">
                                        
                                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#setGradeModal"><i class="fa fa-plus" aria-hidden="true"></i> Set Grade</button>  

                                        <!-- <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#batchGradeModal"><i class="fa fa-plus" aria-hidden="true"></i> Batch Grade</button>  -->

                                        <button class="btn btn-danger btn-sm" id="btn_del"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button> 

                                
                                    </div>                                
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                <form method="post">
                                    <table id="grade_table" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th style="width: 20px !important;"><input type="checkbox" name="chk_delete[]" class="cbxMain" onchange="checkMain(this)" /></th>
                                                <th>Student #</th>
                                                <th>Student Name</th>
                                                <th>Subject</th>
                                                <th>Criteria Name</th>
                                                <th>Score</th>
                                                <th>Final Grade</th>
                                                <th style="width: 40px !important;">Options</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $squery = mysqli_query($con, "SELECT *,CONCAT(s.lname, ', ', s.fname, ' ', s.mname) as student, sg.id as gradeID, sj.id as subjID,s.id as studID from tblstudentgrade sg left join tblstudentsubject ss on ss.id = sg.subjectid left join tblstudent s on s.id = sg.studentid left join tblsubjects sj on sj.id = ss.subjectid where s.studNo is not null");
                                            while($row = mysqli_fetch_array($squery))
                                            {
                                                echo '
                                                <tr>
                                                    <td><input type="checkbox" name="chk_delete[]" class="chk_delete" value="'.$row['gradeID'].'" /></td>
                                                    <td>'.$row['studNo'].'<span style="display:none;">'.$row['studID'].'</span></td>
                                                    <td>'.$row['student'].'</td>
                                                    <td>'.$row['subjectcode'].' - '.$row['subjectname'].'<span style="display:none;">'.$row['subjID'].'</span></td>
                                                    <td>'.$row['criterianame'].'</td>
                                                    <td>'.$row['score'].'</td>
                                                    <td>'.$row['finalgrade'].'</td>
                                                    <td><button class="btn btn-primary btn-sm" data-target="#editGradeModal'.$row['gradeID'].'" data-toggle="modal"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></td>
                                                </tr>
                                                ';

                                                include "edit_grade_modal.php";
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
                                 Edited Grade Saved!
                            </div>
                            <?php include "../added_notif.php"; ?>

                            <?php include "../delete_notif.php"; ?>

            <?php include "setgrade_modal.php"; ?>

            <?php include "setgrade_function.php"; ?>
            <?php include "import_file.php"; ?>


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
        $("#grade_table").dataTable({
           "aoColumnDefs": [ { "bSortable": false, "aTargets": [ 0, 7 ] } ],"aaSorting": []
        });
    });
</script>
    </body>
</html>
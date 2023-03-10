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
                        Grading Criteria
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <!-- left column -->
                            <div class="box">
                                <div class="box-header">
                                    <div style="padding:10px;">
                                        
                                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#setCriteriaModal"><i class="fa fa-plus" aria-hidden="true"></i> Set Criteria</button>  

                                        <button class="btn btn-danger btn-sm" id="btn_del"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button> 
                                
                                    </div>                                
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                <form method="post">
                                    <table id="criteria_table" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th style="width: 20px !important;"><input type="checkbox" name="chk_delete[]" class="cbxMain" onchange="checkMain(this)" /></th>
                                                <th>Subject</th>
                                                <th>Percentage</th>
                                                <th style="width: 15% !important;">Options</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $squery = mysqli_query($con, "SELECT *,gc.id as gcID,s.id as subjID,sum(gc.percentage) as totalpercent from tblgradingcriteria gc left join tblsubjects s on s.id = gc.subjectid group by s.subjectcode");
                                            while($row = mysqli_fetch_array($squery))
                                            {
                                                echo '
                                                <tr>
                                                    <td><input type="checkbox" name="chk_delete[]" class="chk_delete" value="'.$row['gcID'].'" /></td>
                                                    <td>'.$row['subjectcode'].' - '.$row['subjectname'].'<span style="display:none;">'.$row['subjID'].'</span></td>
                                                    <td>'.$row['totalpercent'].'%</td>
                                                    <td>
                                                        
                                                        <a href="details.php?id='.$row['subjID'].'" class="btn btn-primary btn-sm" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Details</a>
                                                    </td>
                                                </tr>
                                                ';
                                                $_SESSION['subj'] = $row['subjectcode'].' - '.$row['subjectname'];
                                                $_SESSION['subj_id'] = $row['subjectid'];
                                                $_SESSION['criterianame'] = $row['criterianame'];
                                                //$_SESSION['period'] = $row['period'];
                                            }
                                            ?>
                                        </tbody>
                                    </table>

                                    <?php 
                                    include "../deleteModal.php"; ?>

                                    </form>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->

                            
                            <?php include "../added_notif.php"; ?>

                            <?php include "../delete_notif.php"; ?>
                            <?php include "../duplicate_error.php"; ?>

            <?php include "setcriteria_modal.php"; ?>

            <?php include "setcriteria_function.php"; ?>


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
        $("#criteria_table").dataTable({
           "aoColumnDefs": [ { "bSortable": false, "aTargets": [ 0, 3 ] } ],"aaSorting": []
        });
    });
</script>
    </body>
</html>
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
                                        
                                        <label><h3>Subject: <?php echo $_SESSION['subj']; ?></h3></label> 
                                    </div>                                
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                <form method="post">
                                    <table id="criteria_detail" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Criteria Name</th>
                                                <th>Percentage</th>
                                                <th>Total Items</th>
                                                <th style="width: 40px!important;">Options</th>
                                            </tr>
                                        </thead>
                                        <tbody><?php
                                            $qquery = mysqli_query($con, "SELECT *,gc.id as gcID,s.id as subjID from tblgradingcriteria gc left join tblsubjects s on s.id = gc.subjectid where gc.subjectid = '".$_GET['id']."' ");
                                            while($row1 = mysqli_fetch_array($qquery))
                                            {
                                                echo '
                                                <tr>
                                                    <td>'.$row1['criterianame'].'</td>
                                                    <td>'.$row1['percentage'].'%</td>
                                                    <td>'.$row1['totalreq'].'</td>
                                                    <td><button class="btn btn-primary btn-sm" data-target="#editCriteriaModal'.$row1['gcID'].'" data-toggle="modal"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button>
                                                    </td>
                                                </tr>
                                                ';
                                                include "editcriteria_modal.php";
                                            }
                                            echo '
                                        </tbody>
                                    </table>';
                                    ?>
                                    <?php 
                                    include "../deleteModal.php"; ?>

                                    </form>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->

                            <?php if(isset($_SESSION['notif'])){
                                echo '<script>$(document).ready(function (){success();});</script>';
                                unset($_SESSION['notif']);
                                } ?>
                            <div class="alert alert-success alert-autocloseable-success" style=" position: fixed; top: 1em; right: 1em; z-index: 9999; display: none;">
                                 Edited Criteria Saved!
                            </div>
                            <?php include "../added_notif.php"; ?>

                            <?php include "../delete_notif.php"; ?>

            <?php include "setcriteria_modal.php"; ?>

            <?php include "setcriteria_function.php"; ?>


                    </div>   <!-- /.row -->
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
        <!-- jQuery 2.0.2 -->
        <?php include "../footer.php"; ?>
<script type="text/javascript">
    $(function() {
        $("#criteria_detail").dataTable({
           "aoColumnDefs": [ { "bSortable": false, "aTargets": [ 0, 3 ] } ],"aaSorting": []
        });
    });
</script>
    </body>
</html>
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
                        Student List
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <!-- left column -->
                            <div class="box">
                                <div class="box-body table-responsive">
                                <form method="post">

                                <div class="form-group">
                                <div class="col-md-3">
                                <select name="ddl_subject" class="form-control">
                                    <?php
                                        $sq = mysqli_query($con,"SELECT *,s.id as sid from tblfacultysubject fs left join tblsubjects s on fs.subjectid = s.id where fs.facid = '".$_SESSION['userid']."' 
GROUP BY fs.subjectid ");
                                        while($rw = mysqli_fetch_array($sq)){
                                            echo '<option value="'.$rw['sid'].'">'.$rw['subjectcode'].' - '.$rw['subjectname'].'</option>';
                                        }
                                    ?>
                                </select>
                                </div>
                                <button class="btn btn-primary btn-sm" name="filter_subj">Select Subject </button>
                                </div></br>

                                    <table id="printstudlist_table" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Student #</th>
                                                <th>Student Name</th>
                                                <th>Section</th>
                                                <th>Year Level</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if(isset($_POST['filter_subj'])){
                                                $subj = $_POST['ddl_subject'];
                                                $squery = mysqli_query($con, "select * from tblstudentsubject ss left join tblstudent s on ss.studentid = s.id where subjectid = '".$subj."' and facid = '".$_SESSION['userid']."' ");
                                            }
                                            else{
                                            $squery = mysqli_query($con, "select * from tblstudent  ");}
                                            while($row = mysqli_fetch_array($squery))
                                            {
                                                echo '
                                                <tr>
                                                    <td>'.$row['studNo'].'</td>
                                                    <td>'.$row['lname'].', '.$row['fname'].' '.$row['mname'].'</td>
                                                    <td>'.$row['year'].'</td>
                                                    <td>'.$row['section'].'</td>
                                                </tr>
                                                ';

                                                //include "editsubj_modal.php";
                                            }
                                            ?>
                                        </tbody>
                                    </table>

                                    <?php //include "../deleteModal.php"; ?>

                                    </form>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->

            <?php //include "addsubj_modal.php"; ?>

            <?php //include "manage_subject_function.php"; ?>


                    </div>   <!-- /.row -->
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
        <!-- jQuery 2.0.2 -->
        <?php include "../footer.php"; ?>
<script type="text/javascript">

    $(document).ready(function() {
    $('#printstudlist_table').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'print',
                text: '<button class="btn btn-primary btn-sm"><i class="fa fa-print"></i> Print Student List</button>',
                title: $('h1').text(),
                customize: function ( win ) {
                    $(win.document.body)
                        .css( 'font-size', '10pt' )
 
                    $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .css( 'font-size', 'inherit' );
                }
                
            }
        ]
    } );

    $('div.dataTables_paginate').css('margin-top','-30px')
} );
</script>
    </body>
</html>
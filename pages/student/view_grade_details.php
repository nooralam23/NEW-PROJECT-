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
                        Student Grade Details
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <!-- left column -->
                            <div class="box">
                                <div class="box-header">        
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                <form method="post">
                                    <table id="grade_details_table" class="table table-bordered table-striped display">
                                        <thead>
                                            <tr>
                                                <th>Subject Code</th>
                                                <th>Subject Name</th>
                                                <th>Percentage</th>
                                                <th>Criteria Name</th>
                                                <th>Score</th>
                                                <th>Final Grade</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $squery = mysqli_query($con,"
                                            SELECT 
                                                s.subjectcode,
                                                s.subjectname,
                                                gc.percentage,
                                                gc.criterianame as critName,
                                                sg.score,
                                                sg.finalgrade
                                            FROM tblstudentgrade sg
                                            left join tblstudent st
                                                on st.id = sg.studentid
                                            left join tblsubjects s
                                                on s.id = sg.subjectid
                                            left join tblgradingcriteria gc
                                                on gc.subjectid = sg.subjectid and gc.criterianame = sg.criterianame
                                            WHERE sg.studentid = '".$_SESSION['userid']."' and sg.subjectid = '".$_GET['subjID']."' and s.yearlevel = '".$_GET['year']."' ");

                                            while($row = mysqli_fetch_array($squery))
                                            {

                                                echo '
                                                <tr>
                                                    <td>'.$row['subjectcode'].'</td>
                                                    <td>'.$row['subjectname'].'</td>
                                                    <td>'.$row['percentage'].'</td>
                                                    <td>'.$row['critName'].'</td>
                                                    <td>'.$row['score'].'</td>
                                                    <td>'.$row['finalgrade'].'</td>
                                                </tr>
                                                ';

                                               // include "view_grade_modal.php";
                                            }
                                            ?>
                                        </tbody>
                                    </table>

                                   

                                    </form>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->

                    </div>   <!-- /.row -->
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
        <!-- jQuery 2.0.2 -->
        <?php include "../footer.php"; ?>
<script type="text/javascript">

    $(document).ready(function() {
        $('#grade_details_table').dataTable( { 
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'print',
                    text: '<button class="btn btn-primary btn-sm"><i class="fa fa-print"></i> Print Grade Details</button>',
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

         $('div.dataTables_paginate').css('margin-top','-30px');
        
    } );

</script>
    </body>
</html>
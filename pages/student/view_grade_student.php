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
                        Student Grade
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
                                    <table id="grade_table" class="table table-bordered table-striped display">
                                        <thead>
                                            <tr>
                                                <th class="filter">Year Level</th>
                                                <th>Subject</th>
                                                <th>Teacher</th>
                                                <th>Final Grade</th>
                                                <th>Option</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                            <?php
                                            $studyr = mysqli_query($con,"SELECT * from tblstudent where id = '".$_SESSION['userid']."' ");
                                            while($studyrrow = mysqli_fetch_array($studyr)){
                                                echo '<input type="hidden" class="studyear" value="'.$studyrrow['year'].'">';
                                            }?>
                                            
                                                <td style="border-width:1px 1px 0px 1px !important; border-style:solid !important; border-color:transparent !important;">Year Level</td>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            
                                            <?php
                                            $squery = mysqli_query($con,"
                                            select 
                                                s.yearlevel,
                                                sg.subjectid as subjID,
                                                s.subjectcode,
                                                s.subjectname,
                                                CONCAT(f.lname , ', ' , f.fname , ' ' , f.mname) as facname,
                                                sum(finalgrade) as total
                                            from tblstudentgrade sg
                                            left join tblsubjects s
                                                on s.id = sg.subjectid
                                            left join tblfacultysubject fs
                                                on fs.subjectid = sg.subjectid
                                            left join tblfaculty f
                                                on f.id = fs.facid
                                            where sg.studentid = '".$_SESSION['userid']."'
                                            group by sg.subjectid,s.yearlevel");

                                            while($row = mysqli_fetch_array($squery))
                                            {

                                                echo '
                                                    <tr>
                                                    <td>'.$row['yearlevel'].'</td>
                                                    <td>'.$row['subjectcode'].' - '.$row['subjectname'].'</td>
                                                    <td>'.$row['facname'].'</td>
                                                    <td>'.round($row['total']).'</td>
                                                    <td><a href="view_grade_details.php?subjID='.$row['subjID'].'&year='.$row['yearlevel'].'" class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>View Details</a></td>
                                                    </tr>
                                                ';

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

        $('#grade_table').dataTable( { 
            "order": [[ 0, 'desc' ]],
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'print',
                    exportOptions: {
                    columns: [ 0, 1, 2, 3]
                    },
                    text: '<button class="btn btn-primary btn-sm"><i class="fa fa-print"></i> Print Grade</button>',
                    title: $('h1').text(),
                    customize: function ( win ) {
                        $(win.document.body)
                            .css( 'font-size', '10pt' )
     
                        $(win.document.body).find( 'table' )
                            .addClass( 'compact' )
                            .css( 'font-size', 'inherit' );
                    }
                    
                }
            ],
            initComplete: function () {
                this.api().columns('.filter').every( function () {
                    var column = this;

                    var select = $('<select class="btn btn-sm btn-default"><option value="">-- Select Yearlevel --</option></select>')
                        .appendTo( $(column.footer('filter')).empty() )
                        .on( 'change', function () {
                            var val = $.fn.dataTable.util.escapeRegex(
                                $(this).val()
                            );
    
                            column
                                .search( val ? '^'+val+'$' : '', true, false )
                                .draw();
                        } );
                    column.data().unique().sort().each( function ( d, j ) {
                        select.append( '<option value="'+d+'">'+d+'</option>' )
                    } );
                } );
            }
        } );

        $('#grade_table tfoot tr').insertBefore($('#grade_table thead tr'));
        $('div.dataTables_paginate').css('margin-top','-30px');
    } );

</script>
    </body>
</html>
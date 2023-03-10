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
                        View Grade
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

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="col-md-2">
                                                <select name="ddl_subj" class="form-control">  
                                                    <option disabled="" selected="">-- Select Subject -- </option>
                                                    <?php
                                                    $subquery = mysqli_query($con,"SELECT * from tblsubjects");
                                                    while($subrow = mysqli_fetch_array($subquery)){
                                                        echo '<option value="'.$subrow['id'].'">'.$subrow['subjectcode'].' - '.$subrow['subjectname'].'</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>                                            
                                            <!--<div class="col-md-2">
                                                <select name="ddl_term" class="form-control">
                                                    <option disabled="" selected="">-- Select Term -- </option>
                                                    <option>Prelim</option>
                                                    <option>Midterm</option>
                                                    <option>Final</option>
                                                </select>
                                            </div>-->
                                            <button class="btn btn-primary btn-sm" name="srch_totalgrade" title="Select Subject Only">Search Total Grade</button>
                                        </div>
                                    </div>

                                    <?php
                                    if(isset($_POST['srch_term']))
                                    {
                                        $subj = $_POST['ddl_subj'];
                                        //$term = $_POST['ddl_term'];

                                        $q = mysqli_query($con,"SELECT * FROM tblsubjects where id = '$subj' ");
                                        while($r = mysqli_fetch_array($q))
                                        {
                                            echo '<label class="lblsub">Subject: '.$r['subjectcode'].' - '.$r['subjectname'].'</label>';
                                        }
                                    ?>
                                    <table id="grade_table" class="table table-bordered table-striped display">
                                        <thead>
                                            <tr>
                                                <th >Student Name</th>
                                                <!--<th><?php echo $term; ?></th>-->
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $squery = mysqli_query($con,"SELECT sum(finalgrade) as totalgrade,sg.criterianame,s.studNo,CONCAT (s.lname,', ',s.fname,' ',s.mname) as studentname,sj.subjectcode,sj.subjectname,sg.period from tblstudentgrade sg left join tblstudent s on s.id = sg.studentid left join tblsubjects sj on sj.id = sg.subjectid where sg.subjectid = '$subj'  group by sg.criterianame");
                                            while($row = mysqli_fetch_array($squery))
                                            {
                                                echo '
                                                <tr>
                                                    <td>'.$row['studentname'].'</td>
                                                    <td><b>'.$row['totalgrade'].'</b></td>
                                                    <td><b>'.($row['totalgrade'] >= 75 ? "<label style='color:green'>Passed</label>" :  "<label style='color:red'>Failed</label>").'</b></td>
                                                </tr>
                                                ';

                                               
                                            }
                                            ?>
                                        </tbody>
                                    </table>

                                    <?php
                                    }
                                    elseif(isset($_POST['srch_totalgrade']))
                                    {
                                        $subj = $_POST['ddl_subj'];

                                        $q = mysqli_query($con,"SELECT * FROM tblsubjects where id = '$subj' ");
                                        while($r = mysqli_fetch_array($q))
                                        {
                                            echo '<label class="lblsub">Subject: '.$r['subjectcode'].' - '.$r['subjectname'].'</label>';
                                        }
                                    ?>

                                    <table id="grade_table" class="table table-bordered table-striped display">
                                        <thead>
                                            <tr>
                                                <th >Student Name</th>
                                                <th>Final</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $squery = mysqli_query($con,"SELECT CONCAT (s.lname,', ',s.fname,' ',s.mname) as studentname,sum(finalgrade) as final
                                                                        from tblstudentgrade sg
                                                                        left join tblstudent s
                                                                            on sg.studentid = s.id
                                                                        left join tblsubjects ss
                                                                        where sg.subjectid = '1'
                                                                        group by final");
                                            while($row = mysqli_fetch_array($squery))
                                            {
                                                echo '
                                                <tr>
                                                    <td>'.$row['studentname'].'</td>
                                                    <td><b>'.round($row['final']).'</b></td>
                                                    <td><b>'.($row['final'] == NULL ? 'No Final Grade Yet' : (round($row['final']) >= 75 ? "<label style='color:green'>Passed</label>" :  "<label style='color:red'>Failed</label>")).'</b></td>
                                                </tr>
                                                ';

                                               
                                            }
                                            ?>
                                        </tbody>
                                    </table>

                                    <?php
                                    }
                                    else
                                    {
                                    ?>


                                    <table id="grade_table" class="table table-bordered table-striped display">
                                        <thead>
                                            <tr>
                                                <th class="filter">Subject</th>
                                                <th class="filter">Student #</th>
                                                <th class="filter">Student Name</th>
                                                <th class="filter">Criteria Name</th>
                                                <th>Final Grade</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Subject</th>
                                                <th>Student #</th>
                                                <th></th>
                                                <th>Criteria Name</th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                            $squery = mysqli_query($con,"SELECT sum(finalgrade) as totalgrade,sg.criterianame,s.studNo,CONCAT (s.lname,', ',s.fname,' ',s.mname) as studentname,sj.subjectcode,sj.subjectname,sg.period from tblstudentgrade sg left join tblstudent s on s.id = sg.studentid left join tblsubjects sj on sj.id = sg.subjectid group by sg.criterianame,sg.period");
                                            while($row = mysqli_fetch_array($squery))
                                            {
                                                echo '
                                                <tr>
                                                    <td>'.$row['subjectcode'].' - '.$row['subjectname'].'</td>
                                                    <td>'.$row['studNo'].'</td>
                                                    <td>'.$row['studentname'].'</td>
                                                    <td>'.$row['criterianame'].'</td>
                                                    <td><b>'.$row['totalgrade'].'</b></td>
                                                    <td><b>'.($row['totalgrade'] >= 75 ? "<label style='color:green'>Passed</label>" :  "<label style='color:red'>Failed</label>").'</b></td>
                                                </tr>
                                                ';

                                               
                                            }
                                            ?>
                                        </tbody>
                                    </table>

                                   <?php
                                    }
                                   ?>

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
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'print',
                    text: '<button class="btn btn-primary btn-sm"><i class="fa fa-print"></i> Print Student Grade</button><bR>',
                    title: $('.lblsub').text(),
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

                    var select = $('<select class="btn btn-sm btn-default"><option value="">-- Select Data --</option></select>')
                        .appendTo( $(column.footer()).empty() )
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
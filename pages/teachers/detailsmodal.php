<?php echo '<div id="criteriaDetailsModal'.$row['gcID'].'" class="modal fade">
<form method="post">
  <div class="modal-dialog modal-sm" style="width:300px !important;">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Edit Subject Info</h4>
        </div>
        <div class="modal-body"><div class="table-responsive">
                <label>sdfdsfsd</label>
        </div>
        </div>
        <div class="modal-footer">
            <input type="button" class="btn btn-default btn-sm" data-dismiss="modal" value="Cancel"/>
            <input type="submit" class="btn btn-primary btn-sm" name="btn_save_criteria" value="Save"/>
        </div>
    </div>
  </div>
</form>
</div>';?>




<?php echo '
<div id="criteriaDetailsModal'.$_SESSION['gcid'].'" class="modal fade">
  <div class="modal-dialog modal-lg" >
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Details for Subject '.$row['subjectcode'].' - '.$row['subjectname'].'</h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <table id="criteria_detail" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Criteria Name</th>
                                <th>Percentage</th>
                                <th>Total Items</th>
                                <th style="width: 40px!important;">Options</th>
                            </tr>
                        </thead>
                        <tbody>';
                            $qquery = mysqli_query($con, "SELECT *,gc.id as gcID,s.id as subjID from tblgradingcriteria gc left join tblsubjects s on s.id = gc.subjectid where gc.id = '".$_SESSION['gcid']."' ");
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
                    </table>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <input type="button" class="btn btn-default btn-sm" data-dismiss="modal" value="Close"/>
        </div>
    </div>
  </div>
</div>';?>
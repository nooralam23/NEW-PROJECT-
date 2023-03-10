<?php echo '<div id="editCriteriaModal'.$row1['gcID'].'" class="modal fade">
<form method="post">
  <div class="modal-dialog modal-sm" style="width:300px !important;">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Edit Subject Info</h4>
        </div>
        <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <input type="hidden" value="'.$row1['gcID'].'" name="hidden_id" id="hidden_id"/>
                <div class="form-group">
                    <label>Subject: </label>
                    <input required name="txt_edit_subjcode" id="txt_edit_subjcode" class="form-control input-sm" type="text" value="'.$row1['subjectcode'].' - '.$row1['subjectname'].'" readonly/>
                </div>
                <div class="form-group">
                    <label>Criteria Name:</label>
                    <input required name="txt_edit_crt" id="txt_edit_percent" class="form-control input-sm" type="text" value="'.$row1['criterianame'].'" readonly/>
                </div>
                
                <div class="form-group">
                    <label>Percentage: </label>
                    <input readonly required name="txt_edit_percent" id="txt_edit_percent" class="form-control input-sm" type="text" value="'.$row1['percentage'].'" />
                </div>
                <div class="form-group">
                    <label>Total Items: </label>
                    <input required name="txt_edit_total" id="txt_edit_total" class="form-control input-sm" type="text" value="'.$row1['totalreq'].'" />
                </div>
                
            </div>
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



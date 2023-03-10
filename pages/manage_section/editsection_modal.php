<?php echo '<div id="editModal'.$row['id'].'" class="modal fade">
<form method="post">
  <div class="modal-dialog modal-sm" style="width:300px !important;">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Edit Section Info</h4>
        </div>
        <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <input type="hidden" value="'.$row['id'].'" name="hidden_id" id="hidden_id"/>
                <div class="form-group">
                    <label>Section: </label>
                    <input required name="txt_edit_sect" id="txt_edit_sect" class="form-control input-sm" type="text" value="'.$row['section'].'" />
                </div>
                <div class="form-group">
                    <label>Year Level:</label>
                    <select name="ddl_edit_yrlvl" id="ddl_edit_yrlvl" data-style="btn-primary" class="form-control input-sm">
                        <option value="'.$row['yearlevel'].'" disabled selected>'.$row['yearlevel'].'</option>
                        <option value="1st">1st</option>
                        <option value="2nd">2nd</option>
                        <option value="3rd">3rd</option>
                        <option value="4th">4th</option>
                        <option value="5th">5th</option>
                    </select>
                </div>
            </div>
        </div>
        </div>
        <div class="modal-footer">
            <input type="button" class="btn btn-default btn-sm" data-dismiss="modal" value="Cancel"/>
            <input type="submit" class="btn btn-primary btn-sm" name="btn_save" id="btn_save" value="Save"/>
        </div>
    </div>
  </div>
</form>
</div>';?>
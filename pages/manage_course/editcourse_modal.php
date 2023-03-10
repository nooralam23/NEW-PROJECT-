<?php echo '<div id="editCourseModal'.$row['id'].'" class="modal fade">
<form method="post">
  <div class="modal-dialog modal-sm" style="width:300px !important;">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Edit Course Info</h4>
        </div>
        <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <input type="hidden" value="'.$row['id'].'" name="hidden_id" id="hidden_id"/>
                <div class="form-group">
                    <label>Course Name: </label>
                    <input required name="txt_edit_course" id="txt_edit_course" class="form-control input-sm" type="text" value="'.$row['courseName'].'" />
                </div>
                <div class="form-group">
                    <label>Course Description:</label>
                    <input required name="txt_edit_course_desc" id="txt_edit_course_desc" class="form-control input-sm" type="text" value="'.$row['description'].'"/>
                </div>
            </div>
        </div>
        </div>
        <div class="modal-footer">
            <input type="button" class="btn btn-default btn-sm" data-dismiss="modal" value="Cancel"/>
            <input type="submit" class="btn btn-primary btn-sm" name="btn_save_course" id="btn_save_course" value="Save"/>
        </div>
    </div>
  </div>
</form>
</div>';?>
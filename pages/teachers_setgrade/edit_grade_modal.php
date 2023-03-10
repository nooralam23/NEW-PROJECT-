<?php echo '<div id="editGradeModal'.$row['gradeID'].'" class="modal fade">
<form method="post">
  <div class="modal-dialog modal-sm" style="width: 300px !important;">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Edit Student Score</h4>
        </div>
        <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Student #: </label>
                    <input type="hidden" name="hiddenid" value="'.$row['gradeID'].'">
                    <input required name="txt_edit_studnum" id="txt_edit_studnum" class="form-control input-sm" type="text" value="'.$row['studNo'].'" readonly/>
                </div>
                <div class="form-group">
                    <label>Student Name:</label>
                    <input required name="txt_edit_studname" id="txt_edit_studname" class="form-control input-sm" type="text" value="'.$row['student'].'" readonly/>
                    <input type="hidden" name="hiddentstudId" value="'.$row['studID'].'" />
                </div>
                <div class="form-group">
                    <label>Subject Name:</label>
                    <input required name="txt_edit_subj" id="txt_edit_subj" class="form-control input-sm" type="text" value="'.$row['subjectcode'].' - '.$row['subjectname'].'" readonly/>
                    <input type="hidden" name="hiddentsubjId" value="'.$row['subjID'].'" />
                </div>
                <div class="form-group">
                    <label>Criteria Name:</label>
                    <input required name="txt_edit_ctr" id="txt_edit_ctr" class="form-control input-sm" type="text" value="'.$row['criterianame'].'" readonly/>
                </div>
                <div class="form-group">
                    <label>Score:</label>
                    <input required name="txt_edit_score" id="txt_edit_score" class="form-control input-sm" type="text" value="'.$row['score'].'"/>
                </div>
            </div>
        </div>
        </div>
        <div class="modal-footer">
            <input type="button" class="btn btn-default btn-sm" data-dismiss="modal" value="Cancel"/>
            <input type="submit" class="btn btn-primary btn-sm" name="btn_save_stud" value="Save"/>
        </div>
    </div>
  </div>
</form>
</div>';?>
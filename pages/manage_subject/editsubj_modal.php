<?php echo '<div id="editSubjModal'.$row['sID'].'" class="modal fade">
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
                <input type="hidden" value="'.$row['sID'].'" name="hidden_id" id="hidden_id"/>
                <div class="form-group">
                    <label>Subject Code: </label>
                    <input required name="txt_edit_subjcode" id="txt_edit_subjcode" class="form-control input-sm" type="text" value="'.$row['subjectcode'].'" />
                </div>
                <div class="form-group">
                    <label>Subject Name: </label>
                    <input required name="txt_edit_subjname" id="txt_edit_subjname" class="form-control input-sm" type="text" value="'.$row['subjectname'].'" />
                </div>
                <div class="form-group">
                    <label>Units: </label>
                    <input required name="txt_edit_units" id="txt_edit_units" class="form-control input-sm" type="text" value="'.$row['units'].'" />
                </div>
                <div class="form-group">
                    <label>Course:</label>
                    <select name="ddl_edit_course" id="ddl_edit_course" data-style="btn-primary" class="form-control input-sm">
                ';
                    $cquery = mysqli_query($con,"SELECT * FROM tblcourse");
                    while($row1 = mysqli_fetch_array($cquery)){
                        echo '<option value="'.$row1['id'].'">'.$row1['courseName'].' - '.$row1['description'].'</option>';
                    }
                echo '</select>
                </div>
                <div class="form-group">
                    <label>Year Level:</label>
                    <select name="ddl_edit_yrlvl" id="ddl_edit_yrlvl" data-style="btn-primary" class="form-control input-sm">
                        <option value="'.$row['yearlevel'].'">'.$row['yearlevel'].'</option>
                        <option value="1st">1st</option>
                        <option value="2nd">2nd</option>
                        <option value="3rd">3rd</option>
                        <option value="4th">4th</option>
                        <option value="5th">5th</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>School Year:</label>
                    <select name="ddl_edit_sy" id="ddl_edit_sy" data-style="btn-primary" class="form-control input-sm">';
                    $syquery = mysqli_query($con,"SELECT * FROM tblschoolyear");
                    while($row2 = mysqli_fetch_array($syquery)){
                        echo '<option value="'.$row2['id'].'">'.$row2['schoolyear'].'</option>';
                    }
                echo '</select>
                </div>
                <div class="form-group">
                    <label>Semester:</label>
                    <select name="ddl_edit_sem" id="ddl_edit_sem" data-style="btn-primary" class="form-control input-sm">
                        <option value="'.$row['semester'].'">'.$row['semester'].'</option>
                        <option value="1st">1st</option>
                        <option value="2nd">2nd</option>
                        <option value="Summer">Summer</option>
                    </select>
                </div>
            </div>
        </div>
        </div>
        <div class="modal-footer">
            <input type="button" class="btn btn-default btn-sm" data-dismiss="modal" value="Cancel"/>
            <input type="submit" class="btn btn-primary btn-sm" name="btn_save_subj" value="Save"/>
        </div>
    </div>
  </div>
</form>
</div>';?>
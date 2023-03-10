<?php echo '<div id="editModal'.$row['fsid'].'" class="modal fade">
<form method="post">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Edit Student Info</h4>
        </div>
        <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Course: </label>
                    <input name="txt_edit_course" id="txt_edit_course" class="form-control input-sm" type="text" value="'.$row['courseName'].' - '.$row['description'].'" readonly/>
                </div>
                <div class="form-group">
                    <label>Faculty Name:</label>
                    <input name="" id="" class="form-control input-sm" type="text" value="'.$row['faculty'].'" readonly/>
                    <input name="txt_edit_facname" id="txt_edit_facname" class="form-control input-sm" type="hidden" value="'.$row['fid'].'" readonly/>';
                    
                echo '</select>
                </div>
                <div class="form-group">
                    <label>Course:</label>
                    <select name="ddl_edit_subj" id="ddl_edit_subj" data-style="btn-primary" class="form-control input-sm">
                        <option value="'.$row['sid'].'">'.$row['subjectcode'].' - '.$row['subjectname'].'</option>';
                        $squery = mysqli_query($con,"SELECT * from tblsubjects where courseid = '".$row['cid']."' and id != '".$row['sid']."' ");
                        while($srow = mysqli_fetch_array($squery)){
                            echo '<option value="'.$srow['id'].'">'.$srow['subjectcode'].', '.$srow['subjectname'].'</option>';
                        }
                echo '</select>
                </div>
            </div>
        </div>
        </div>
        <div class="modal-footer">
            <input type="button" class="btn btn-default btn-sm" data-dismiss="modal" value="Cancel"/>
            <input type="submit" class="btn btn-primary btn-sm" name="btn_save" value="Save"/>
        </div>
    </div>
  </div>
</form>
</div>';?>
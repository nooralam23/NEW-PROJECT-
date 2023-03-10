<?php echo '<div id="editStudentSubjModal'.$row['subjID'].'" class="modal fade">
<form method="post">
  <div class="modal-dialog modal-sm" style="width:300px !important;">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Edit Student Info</h4>
        </div>
        <div class="modal-body">
        <div class="row">
            <input name="hidden_id" value="'.$row['subjID'].'" hidden/>
            <div class="col-md-12">
                <div class="form-group">
                    <label>Student #: </label>
                    <input name="txt_edit_studnum" id="txt_edit_studnum" class="form-control input-sm" type="text" value="'.$row['studNo'].'" readonly/>
                </div>
                <div class="form-group">
                    <label>Student Name:</label>
                    <input name="txt_edit_fname" id="txt_edit_fname" class="form-control input-sm" type="text" value="'.$row['fname'].'" readonly/>
                </div>
                <div class="form-group">
                    <label>Adviser:</label>
                    <select name="ddl_edit_fac" id="ddl_edit_fac" data-style="btn-primary" class="form-control input-sm">
                        <option value="'.$row['facID'].'">'.$row['faculty'].'</option>';
                        $fquery = mysqli_query($con,"SELECT *,f.id as fid,CONCAT(f.lname, ', ', f.fname, ' ', f.mname) as adviser from tblfaculty f left join tblcourse c on c.id = f.courseid where f.id != '".$row['facID']."' ");
                        while($frow = mysqli_fetch_array($fquery)){
                            echo '<option value="'.$frow['fid'].'">'.$frow['adviser'].'</option>';
                        }
                echo    '</select>
                </div>
                <div class="form-group">
                    <label>Subject:</label>
                    <select name="ddl_edit_subj" id="ddl_edit_subj" data-style="btn-primary" class="form-control input-sm">
                        <option value="'.$row['sID'].'">'.$row['subjectcode'].' - '.$row['subjectname'].'</option>';
                        $subquery = mysqli_query($con,"SELECT *,s.id as sid from tblsubjects s left join tblcourse c on c.id = s.courseid where s.id != '".$row['sID']."' ");
                        while($srow = mysqli_fetch_array($subquery)){
                            echo '<option value="'.$srow['sid'].'">'.$srow['subjectcode'].' - '.$srow['subjectname'].'</option>';
                        }

                echo    '</select>
                </div>
            </div>
        </div>
        </div>
        <div class="modal-footer">
            <input type="button" class="btn btn-default btn-sm" data-dismiss="modal" value="Cancel"/>
            <input type="submit" class="btn btn-primary btn-sm" name="btn_studsubj_save" value="Save"/>
        </div>
    </div>
  </div>
</form>
</div>';?>
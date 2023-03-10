<?php echo '<div id="editStudentModal'.$row['studNo'].'" class="modal fade">
<form method="post">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Edit Student Info</h4>
        </div>
        <div class="modal-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Student #: </label>
                    <input required name="txt_edit_studnum" id="txt_edit_studnum" class="form-control input-sm" type="text" value="'.$row['studNo'].'" readonly/>
                </div>
                <div class="form-group">
                    <label>First Name:</label>
                    <input required name="txt_edit_fname" id="txt_edit_fname" class="form-control input-sm" type="text" value="'.$row['sfname'].'"/>
                </div>
                <div class="form-group">
                    <label>Middle Name:</label>
                    <input required name="txt_edit_mname" id="txt_edit_mname" class="form-control input-sm" type="text" value="'.$row['smname'].'"/>
                </div>
                <div class="form-group">
                    <label>Last Name:</label>
                    <input required name="txt_edit_lname" id="txt_edit_lname" class="form-control input-sm" type="text" value="'.$row['slname'].'"/>
                </div>
                <div class="form-group">
                    <label>Course:</label>
                    <select name="ddl_edit_course" id="ddl_edit_course" data-style="btn-primary" class="form-control input-sm">
                    <option value="'.$row['cid'].'">'.$row['courseName'].' - '.$row['description'].'</option>
                    ';
                    $cquery = mysqli_query($con, "SELECT * from tblcourse where id != '".$row['cid']."' ");
                    while($crow = mysqli_fetch_array($cquery)){
                         echo '<option value="'.$crow['id'].'">'.$crow['courseName'].' - '.$crow['description'].'</option>';
                    }
                echo '</select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Year Level: </label>
                    <select name="ddl_edit_yrlvl" id="ddl_edit_yrlvl" data-style="btn-primary" class="form-control input-sm">
                    <option value="'.$row['year'].'">'.$row['year'].'</option>
                    ';
                    $yquery = mysqli_query($con, "SELECT yearlevel from tblsection where yearlevel != '".$row['year']."' ");
                    while($yrow = mysqli_fetch_array($yquery)){
                         echo '<option value="'.$yrow['yearlevel'].'">'.$yrow['yearlevel'].'</option>';
                    }
                echo '</select>
                </div>
                <div class="form-group">
                    <label>Adviser:</label>
                    <select name="ddl_edit_adv" id="ddl_edit_adv" data-style="btn-primary" class="form-control input-sm">
                        <option value="'.$row['fid'].'">'.$row['adviser'].'</option>
                    ';
                    $yquery = mysqli_query($con, "SELECT *,CONCAT(lname, ', ', fname, ' ', mname) as adviser from tblfaculty where id != '".$row['fid']."' ");
                    while($yrow = mysqli_fetch_array($yquery)){
                         echo '<option value="'.$yrow['id'].'">'.$yrow['adviser'].'</option>';
                    }
                echo '
                    </select>
                </div>
                <div class="form-group">
                    <label>Section:</label>
                    <select name="ddl_edit_sect" id="ddl_edit_sect" data-style="btn-primary" class="form-control input-sm">
                    <option value="'.$row['section'].'">'.$row['section'].'</option>
                    ';
                    $secquery = mysqli_query($con, "SELECT section from tblsection where section != '".$row['section']."' ");
                    while($secrow = mysqli_fetch_array($secquery)){
                         echo '<option value="'.$secrow['section'].'">'.$secrow['section'].'</option>';
                    }
                echo '</select>
                </div>
                <div class="form-group">
                    <label>Username:</label>
                    <input required name="txt_edit_username" id="txt_edit_username" class="form-control input-sm" type="text" value='.$row['sUsername'].' />
                </div>
                <div class="form-group">
                    <label>Password:</label>
                    <input required name="txt_edit_pass" id="txt_edit_pass" class="form-control input-sm" type="password" value='.$row['sPassword'].' />
                </div>
                <div class="form-group">
                    <label>Confirm Password:</label>
                    <input required name="txt_edit_cpass" id="txt_edit_cpass" class="form-control input-sm" type="password" value='.$row['scPassword'].' />
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
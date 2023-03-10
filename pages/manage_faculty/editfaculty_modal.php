<?php echo '<div id="editFacultyModal'.$row['facNo'].'" class="modal fade">
<form method="post">
  <div class="modal-dialog modal-sm" style="width: 300px !important;">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Edit Faculty Info</h4>
        </div>
        <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Faculty #: </label>
                    <input required name="txt_edit_facnum" id="txt_edit_facnum" class="form-control input-sm" type="text" value="'.$row['facNo'].'" readonly/>
                </div>
                <div class="form-group">
                    <label>First Name:</label>
                    <input required name="txt_edit_fname" id="txt_edit_fname" class="form-control input-sm" type="text" value="'.$row['fname'].'"/>
                </div>
                <div class="form-group">
                    <label>Middle Name:</label>
                    <input required name="txt_edit_mname" id="txt_edit_mname" class="form-control input-sm" type="text" value="'.$row['mname'].'"/>
                </div>
                <div class="form-group">
                    <label>Last Name:</label>
                    <input required name="txt_edit_lname" id="txt_edit_lname" class="form-control input-sm" type="text" value="'.$row['lname'].'"/>
                </div>
                <div class="form-group">
                    <label>Course:</label>
                    <select name="ddl_edit_course" id="ddl_edit_course" data-style="btn-primary" class="form-control input-sm">
                        <option value="'.$row['cid'].'">'.$row['courseName'].' - '.$row['description'].'</option>';
                        $coursedrp = mysqli_query($con,"SELECT * from tblcourse where id != '".$row['courseid']."' ");
                        while($crow= mysqli_fetch_array($coursedrp)){
                           echo '<option value="'.$crow['id'].'">'.$crow['courseName'].' - '.$crow['description'].'</option>';
                        }  

                    echo '</select>
                </div>
                <div class="form-group">
                    <label>Username:</label>
                    <input required name="txt_edit_username" id="txt_edit_username" class="form-control input-sm" type="text" value='.$row['username'].' />
                </div>
                <div class="form-group">
                    <label>Password:</label>
                    <input required name="txt_edit_pass" id="txt_edit_pass" class="form-control input-sm" type="password" value='.$row['password'].' />
                </div>
                <div class="form-group">
                    <label>Confirm Password:</label>
                    <input required name="txt_edit_cpass" id="txt_edit_cpass" class="form-control input-sm" type="password" value='.$row['confirmpass'].' />
                </div>
                <div class="form-group">
                    <label>Security Question:</label>
                    <select name="ddl_edit_quest" id="ddl_edit_quest" data-style="btn-primary" class="form-control input-sm">
                        <option>'.$row['securityquestion'].'</option>
                        <option>Question 1</option>
                        <option>Question 2</option>
                        <option>Question 3</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Answer:</label>
                    <input required name="txt_edit_ans" id="txt_edit_ans" class="form-control input-sm" type="text" value='.$row['answer'].' />
                </div>
            </div>
        </div>
        </div>
        <div class="modal-footer">
            <input type="button" class="btn btn-default btn-sm" data-dismiss="modal" value="Cancel"/>
            <input type="submit" class="btn btn-primary btn-sm" name="btn_save_fac" value="Save"/>
        </div>
    </div>
  </div>
</form>
</div>';?>
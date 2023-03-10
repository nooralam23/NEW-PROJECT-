<!-- ========================= MODAL ======================= -->
            <div id="addFacultyModal" class="modal fade">
            <form method="post">
              <div class="modal-dialog modal-sm" style="width: 300px !important;">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Add Faculty</h4>
                    </div>
                    <div class="modal-body">
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Faculty #:</label>
                                    <input required name="txt_facnum" id="txt_facnum" class="form-control input-sm" type="text" placeholder="Faculty #" />
                                </div>
                                <div class="form-group">
                                    <label>First Name:</label>
                                    <input required name="txt_fname" id="txt_fname" class="form-control input-sm" type="text" placeholder="First Name"/>
                                </div>
                                <div class="form-group">
                                    <label>Middle Name:</label>
                                    <input required name="txt_mname" id="txt_mname" class="form-control input-sm" type="text" placeholder="Middle Name"/>
                                </div>
                                <div class="form-group">
                                    <label>Last Name:</label>
                                    <input required name="txt_lname" id="txt_lname" class="form-control input-sm" type="text" placeholder="Last Name"/>
                                </div>
                                <div class="form-group">
                                    <label>Course:</label>
                                    <select name="ddl_course" id="ddl_course" data-style="btn-primary" class="form-control input-sm">
                                        <option selected disabled>-- Select Course --</option>
                                        <?php
                                        $course = mysqli_query($con,"SELECT * from tblcourse");
                                        while($row= mysqli_fetch_array($course)){
                                           echo '<option value="'.$row['id'].'">'.$row['courseName'].' - '.$row['description'].'</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Username:</label>
                                    <input required name="txt_username" id="txt_username" class="form-control input-sm" type="text" placeholder="Username"/>
                                </div>
                                <div class="form-group">
                                    <label>Password:</label>
                                    <input required name="txt_pass" id="txt_pass" class="form-control input-sm" type="password" placeholder="Password"/>
                                </div>
                                <div class="form-group">
                                    <label>Confirm Password:</label>
                                    <input required name="txt_cpass" id="txt_cpass" class="form-control input-sm" type="password" placeholder="Confirm Password"/>
                                </div>
                                <div class="form-group">
                                    <label>Security Question:</label>
                                    <select name="ddl_quest" id="ddl_quest" data-style="btn-primary" class="form-control input-sm">
                                        <option>Question 1</option>
                                        <option>Question 2</option>
                                        <option>Question 3</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Answer:</label>
                                    <input required name="txt_ans" id="txt_ans" class="form-control input-sm" type="text" placeholder="Answer"/>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default btn-sm" data-dismiss="modal" value="Cancel"/>
                        <input type="submit" class="btn btn-primary btn-sm" id="btn_facadd" name="btn_facadd" value="Add"/>
                    </div>
                </div>
              </div>
              </form>
            </div>
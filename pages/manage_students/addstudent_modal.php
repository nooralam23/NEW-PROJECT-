<!-- ========================= MODAL ======================= -->
            <div id="addStudentModal" class="modal fade">
            <form method="post">
              <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Add Student</h4>
                    </div>
                    <div class="modal-body">
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Student #:</label>
                                    <input required name="txt_studnum" id="txt_studnum" class="form-control input-sm" type="text" placeholder="Student #" />
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
                                    <option disabled selected>-- Select Course --</option>
                                    <?php
                                        $cquery = mysqli_query($con, "SELECT * from tblcourse");
                                        while($row = mysqli_fetch_array($cquery)){
                                            echo '<option value="'.$row['id'].'">'.$row['courseName'].' - '.$row['description'].'</option>';
                                        }
                                    ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Year Level:</label>
                                    <select name="ddl_yrlvl" id="ddl_yrlvl" data-style="btn-primary" class="form-control input-sm">
                                        <option disabled selected>-- Select Year Level --</option>
                                        <option>1st</option>
                                        <option>2nd</option>
                                        <option>3rd</option>
                                        <option>4th</option>
                                        <option>5th</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Adviser:</label>
                                    <select name="ddl_adv" id="ddl_adv" data-style="btn-primary" class="form-control input-sm">
                                    <option disabled selected>-- Select Faculty --</option>
                                        <?php
                                            $fquery = mysqli_query($con,"SELECT * from tblfaculty");
                                            while($frow = mysqli_fetch_array($fquery)){
                                                echo '<option value="'.$frow['id'].'">'.$frow['lname'].', '.$frow['fname'].' '.$frow['mname'].'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Section:</label>
                                    <select name="ddl_sect" id="ddl_sect" data-style="btn-primary" class="form-control input-sm">
                                    <option disabled selected>-- Select Section --</option>
                                    <?php
                                        $squery = mysqli_query($con, "SELECT * from tblsection");
                                        while($srow = mysqli_fetch_array($squery)){
                                            echo '<option value="'.$srow['section'].'">'.$srow['section'].'</option>';
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
                                
                            </div>
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default btn-sm" data-dismiss="modal" value="Cancel"/>
                        <input type="submit" class="btn btn-primary btn-sm" id="btn_studadd" name="btn_studadd" value="Add"/>
                    </div>
                </div>
              </div>
              </form>
            </div>
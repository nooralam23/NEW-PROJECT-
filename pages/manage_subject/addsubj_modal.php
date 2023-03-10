<!-- ========================= MODAL ======================= -->
            <div id="addSubjectModal" class="modal fade">
            <form method="post">
              <div class="modal-dialog modal-sm" style="width:300px !important;">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Add Subject</h4>
                    </div>
                    <div class="modal-body">
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Subject Code:</label>
                                    <input required name="txt_subj_code" id="txt_subj_code" class="form-control input-sm" type="text" placeholder="Subject Code" />
                                </div>
                                <div class="form-group">
                                    <label>Subject Name:</label>
                                    <input required name="txt_subj_name" id="txt_subj_name" class="form-control input-sm" type="text" placeholder="Subject Name" />
                                </div>
                                <div class="form-group">
                                    <label>Units:</label>
                                    <input required name="txt_units" id="txt_units" class="form-control input-sm" type="number" min="1"placeholder="Units" />
                                </div>
                                <div class="form-group">
                                    <label>Course:</label>
                                    <select name="ddl_course" id="ddl_course" data-style="btn-primary" class="form-control input-sm">
                                        <?php
                                            $query = mysqli_query($con,"SELECT * FROM tblcourse");
                                            while($row = mysqli_fetch_array($query)){
                                                echo '<option value="'.$row['id'].'">'.$row['courseName'].' - '.$row['description'].'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Year Level:</label>
                                    <select name="ddl_yrlvl" id="ddl_yrlvl" data-style="btn-primary" class="form-control input-sm">
                                        <option value="1st">1st</option>
                                        <option value="2nd">2nd</option>
                                        <option value="3rd">3rd</option>
                                        <option value="4th">4th</option>
                                        <option value="5th">5th</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>School Year:</label>
                                    <select name="txt_sy" id="txt_sy" data-style="btn-primary" class="form-control input-sm">
                                    <?php
                                        $query = mysqli_query($con,"SELECT * FROM tblschoolyear order by id desc");
                                        while($row = mysqli_fetch_array($query)){
                                            echo '<option value="'.$row['id'].'">'.$row['schoolyear'].'</option>';
                                        }
                                    ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Semester:</label>
                                    <select name="ddl_sem" id="ddl_sem" data-style="btn-primary" class="form-control input-sm">
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
                        <input type="submit" class="btn btn-primary btn-sm" id="btn_subjadd" name="btn_subjadd" value="Add Subject"/>
                    </div>
                </div>
              </div>
              </form>
            </div>
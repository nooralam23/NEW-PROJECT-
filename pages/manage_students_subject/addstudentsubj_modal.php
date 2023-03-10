<!-- ========================= MODAL ======================= -->
            <div id="addStudentSubjModal" class="modal fade">
            <form method="post">
              <div class="modal-dialog modal-sm" style="width:300px !important;">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Add Student Subject</h4>
                    </div>
                    <div class="modal-body">
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Course:</label>
                                    <select name="ddl_course" id="ddl_course" data-style="btn-primary" class="form-control input-sm" onchange="show_fac()">
                                    
                                    <option value="" disabled selected>-- Select Course --</option>
                                    <?php
                                        $cquery = mysqli_query($con,"SELECT * FROM tblcourse");
                                        while($row=mysqli_fetch_array($cquery)){
                                            echo '<option value="'.$row['id'].'">'.$row['courseName'].' - '.$row['description'].'</option>';
                                        }
                                    ?>
                                    </select>
                                </div>
                                <div class="form-group" id="adv_name">
                                    <label>Adviser:</label>
                                    <select name="ddl_adv" id="ddl_adv" data-style="btn-primary" class="form-control input-sm" onchange="show_stud();">
                                        <option value="" disabled selected>-- Select Course First --</option>
                                    </select>
                                </div>
                                <div class="form-group" id="stud_name">
                                    <label>Student Name:</label>
                                    <select name="ddl_studname" id="ddl_studname" data-style="btn-primary" class="form-control input-sm" onchange="show_subj();">
                                        <option value="" disabled selected>-- Select Adviser First --</option>
                                    </select>
                                </div>
                                <div class="form-group" id="subj_name">
                                    <label>Subject:</label>
                                    <select name="ddl_subj" id="ddl_subj" data-style="btn-primary" class="form-control input-sm">
                                       <option value="" disabled selected>-- Select Student First --</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default btn-sm" data-dismiss="modal" value="Cancel"/>
                        <input type="submit" class="btn btn-primary btn-sm" id="btn_studsubjadd" name="btn_studsubjadd" value="Add Subject"/>
                    </div>
                </div>
              </div>
              </form>
            </div>

<script>
    function show_fac(){
        var courseID = $('#ddl_course').val();
        if(courseID){
            $.ajax({
                type:'POST',
                url:'student_dropdown.php',
                data: 'course_id='+courseID,
                success:function(html){
                    $('#ddl_adv').html(html);
                }
            }); 
        }
    }

    function show_stud(){
        var facultyID = $('#ddl_adv').val();
        if(facultyID){
            $.ajax({
                type:'POST',
                url:'student_dropdown.php',
                data: 'faculty_id='+facultyID,
                success:function(html){
                    $('#ddl_studname').html(html);
                }
            }); 
        }
    }

    function show_subj(){
        var studentID = $('#ddl_studname').val();
        var facultyID = $('#ddl_adv').val();
        if(studentID){
            $.ajax({
                type:'POST',
                url:'student_dropdown.php',
                data: 'student_id='+studentID+'&facultyid='+facultyID,
                success:function(html){
                    $('#ddl_subj').html(html);
                }
            }); 
        }
    }

</script>
<!-- ========================= MODAL ======================= -->
            <div id="addModal" class="modal fade">
            <form method="post" name="f1">
              <div class="modal-dialog modal-sm" style="width:300px !important;">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Add Faculty Subject</h4>
                    </div>
                    <div class="modal-body">
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group" id="faculty_course">
                                    <label>Course:</label>
                                    <select name="ddl_course" id="ddl_course" data-style="btn-primary" class="form-control input-sm" onchange="show_facname()">

                                        <option value="" disabled selected>-- Select Course --</option>
                                    <?php
                                        $cquery = mysqli_query($con, "SELECT * from tblcourse");
                                        while($row=mysqli_fetch_array($cquery)){
                                            echo '<option value="'.$row['id'].'">'.$row['courseName'].' - '.$row['description'].'</option>';
                                        }
                                    ?>
                                    </select>
                                </div>
                                <div class="form-group" id="faculty_name">
                                    <label>Faculty Name:</label>
                                    <select name="ddl_facid" id="ddl_facid" data-style="btn-primary" class="form-control input-sm" onchange="show_subj()">
                                        <option value="" disabled selected>-- Select Course First --</option>
                                    </select>
                                </div>
                                <div class="form-group" id="subj_name">
                                    <label>Subject:</label>
                                    <select name="ddl_subj" id="ddl_subj" data-style="btn-primary" class="form-control input-sm" >
                                        <option value="" disabled selected>-- Select Faculty First --</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default btn-sm" data-dismiss="modal" value="Cancel"/>
                        <input type="submit" class="btn btn-primary btn-sm" id="btn_add" name="btn_add" value="Add Subject"/>
                    </div>
                </div>
              </div>
              </form>
            </div>
<script>
    function show_facname(){
        var courseID = $('#ddl_course').val();
        if(courseID){
            $.ajax({
                type:'POST',
                url:'faculty_dropdown.php',
                data: 'course_id='+courseID,
                success:function(html){
                    $('#ddl_facid').html(html);
                }
            }); 
        }
    }

    function show_subj(){
        var facultyID = $('#ddl_facid').val();
        if(facultyID){
            $.ajax({
                type:'POST',
                url:'faculty_dropdown.php',
                data: 'faculty_id='+facultyID,
                success:function(html){
                    $('#ddl_subj').html(html);
                }
            }); 
        }
    }
</script>
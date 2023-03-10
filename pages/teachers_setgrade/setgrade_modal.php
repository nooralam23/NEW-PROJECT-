<!-- ========================= MODAL ======================= -->
            <div id="setGradeModal" class="modal fade">
            <form method="post">
              <div class="modal-dialog modal-sm" style="width:300px !important;">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Set Criteria</h4>
                    </div>
                    <div class="modal-body">
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Student:</label>
                                    <select name="ddl_stud" id="ddl_stud" data-style="btn-primary" class="form-control input-sm" onchange="show_subj()">
                                        <option selected="" disabled="">-- Select Student --</option>
                                        <?php
                                        $stdntquery = mysqli_query($con,"SELECT * 
                                                                        FROM tblstudentsubject ss
                                                                        LEFT JOIN tblstudent s ON ss.studentid = s.id
                                                                        WHERE ss.facid = '".$_SESSION['userid']."'
                                                                        GROUP BY ss.studentid ");
                                        while($row = mysqli_fetch_array($stdntquery)){
                                            echo '<option value="'.$row['id'].'">'.$row['lname'].', '.$row['fname'].' '.$row['mname'].'</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Subject:</label>
                                    <select name="ddl_subj" id="ddl_subj" data-style="btn-primary" class="form-control input-sm" onchange="show_criteria()">
                                        <option selected="" disabled="">-- Select Student First --</option>
                                    </select>
                                </div>
                                <!--<div class="form-group">
                                    <label>Period:</label>
                                    <select name="ddl_period" id="ddl_period" data-style="btn-primary" class="form-control input-sm" onchange="show_criteria()">
                                        <option selected="" disabled="">-- Select Period --</option>
                                        <option value="Prelim">Prelim</option>
                                        <option value="Midterm">Midterm</option>
                                        <option value="Final">Final</option>
                                    </select>
                                </div>-->
                                <div class="form-group">
                                    <label>Criteria Name:</label>
                                    <select name="ddl_criteria" id="ddl_criteria" data-style="btn-primary" class="form-control input-sm" >
                                        <option selected="" disabled="">-- Select Subject First --</option>
                                    </select>
                                </div>
                                <div class="form-group" id="total_score">
                                    <label>Total Score:</label>
                                    <input name="txt_score" id="txt_score" class="form-control input-sm" type="number" min="1"placeholder="Total Score" />
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default btn-sm" data-dismiss="modal" value="Cancel"/>
                        <input type="submit" class="btn btn-primary btn-sm" id="btn_add" name="btn_add" value="Set Grade"/>
                    </div>
                </div>
              </div>
              </form>
            </div>


            <div id="batchGradeModal" class="modal fade">
            <form method="post" enctype="multipart/form-data">
              <div class="modal-dialog modal-sm" style="width:300px !important;">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Batch Grade Modal</h4>
                    </div>
                    <div class="modal-body">
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Filename:</label>
                                    <input type="file" class="form-control input-sm" name="file" id="file">
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default btn-sm" data-dismiss="modal" value="Cancel"/>
                        <input type="submit" class="btn btn-primary btn-sm" name="btn_submitbatch" value="Submit"/>
                    </div>
                </div>
              </div>
              </form>
            </div>


<script>
    function show_subj(){
        var studID = $('#ddl_stud').val();
        if(studID){
            $.ajax({
                type:'POST',
                url:'setgrade_dropdown.php',
                data: 'stud_id='+studID,
                success:function(html){
                    $('#ddl_subj').html(html);
                }
            }); 
        }
    }

    function show_criteria(){
        var subjID = $('#ddl_subj').val();
        //var periodID = $('#ddl_period').val();
        if(subjID){
            $.ajax({
                type:'POST',
                url:'setgrade_dropdown.php',
                data: 'subj_id='+subjID,
                success:function(html){
                    $('#ddl_criteria').html(html);
                }
            }); 
        }
    }

</script>
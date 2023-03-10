<!-- ========================= MODAL ======================= -->
            <div id="setCriteriaModal" class="modal fade">
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
                                    <label>Year Level:</label>
                                    <select name="ddl_yrlvl" id="ddl_yrlvl" data-style="btn-primary" class="form-control input-sm" onchange="show_yrlvl()">
                                        <option selected="" disabled="">-- Select Year Level --</option>
                                        <option value="1st">1st Year</option>
                                        <option value="2nd">2nd Year</option>
                                        <option value="3rd">3rd Year</option>
                                        <option value="4th">4th Year</option>
                                        <option value="5th">5th Year</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Subject:</label>
                                    <select name="ddl_subj" id="ddl_subj" data-style="btn-primary" class="form-control input-sm">
                                        <option selected="" disabled="">-- Select Year Level First --</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Criteria Name:</label>
                                    <input required name="txt_criteria" id="txt_criteria" class="form-control input-sm" type="text"placeholder="Criteria Name" />
                                </div>
                                <!--<div class="form-group">
                                    <label>Period:</label>
                                    <select name="txt_period" id="txt_period" data-style="btn-primary" class="form-control input-sm" >
                                        <option value="Prelim">Prelim</option>
                                        <option value="Midterm">Midterm</option>
                                        <option value="Final">Final</option>
                                    </select>
                                </div>-->
                                <div class="form-group">
                                    <label>Percentage:</label>
                                    <input required name="txt_percent" id="txt_percent" class="form-control input-sm" type="number" min="1"placeholder="Percentage" />
                                </div>
                                <div class="form-group">
                                    <label>Total Items:</label>
                                    <input required name="txt_total" id="txt_total" class="form-control input-sm" type="number" min="1"placeholder="Total" />
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default btn-sm" data-dismiss="modal" value="Cancel"/>
                        <input type="submit" class="btn btn-primary btn-sm" id="btn_add" name="btn_add" value="Set"/>
                    </div>
                </div>
              </div>
              </form>
            </div>


<script>
    function show_yrlvl(){
        var yrlvlID = $('#ddl_yrlvl').val();
        if(yrlvlID){
            $.ajax({
                type:'POST',
                url:'criteria_dropdown.php',
                data: 'yrlvl_id='+yrlvlID,
                success:function(html){
                    $('#ddl_subj').html(html);
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
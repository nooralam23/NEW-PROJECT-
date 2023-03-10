<!-- ========================= MODAL ======================= -->
            <div id="addCourseModal" class="modal fade">
            <form method="post">
              <div class="modal-dialog modal-sm" style="width:300px !important;">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Add Course</h4>
                    </div>
                    <div class="modal-body">
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Course Name:</label>
                                    <input required name="txt_coursename" id="txt_coursename" class="form-control input-sm" type="text" placeholder="Course Name" />
                                </div>
                                <div class="form-group">
                                    <label>Course Description:</label>
                                    <input required name="txt_coursedesc" id="txt_coursedesc" class="form-control input-sm" type="text" placeholder="Course Description"/>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default btn-sm" data-dismiss="modal" value="Cancel"/>
                        <input type="submit" class="btn btn-primary btn-sm" id="btn_courseadd" name="btn_courseadd" value="Add Course"/>
                    </div>
                </div>
              </div>
              </form>
            </div>
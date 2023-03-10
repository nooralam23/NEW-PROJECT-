<!-- ========================= MODAL ======================= -->
            <div id="addSYModal" class="modal fade">
            <form method="post">
              <div class="modal-dialog modal-sm" style="width:300px !important;">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Add School Year</h4>
                    </div>
                    <div class="modal-body">
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>School Year:</label>
                                    <input required name="txt_sy" id="txt_sy" class="form-control input-sm" type="text" placeholder="eg. 2016-2017" />
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default btn-sm" data-dismiss="modal" value="Cancel"/>
                        <input type="submit" class="btn btn-primary btn-sm" id="btn_syeadd" name="btn_syadd" value="Add School Year"/>
                    </div>
                </div>
              </div>
              </form>
            </div>
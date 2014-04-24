

				<div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Edit a Report</h4>
                  </div>
				<form name="add" class="form-horizontal" method="POST" action="/KiaDFRS/index.php/report/update">
						<input type="hidden" name="report_id" value="<?php echo $report[0]->report_id?>">
              <fieldset>
                <legend></legend>
                <div class="form-group">
                  <label for="report_date" class="col-lg-2 control-label">Date</label>
                  <div class="col-lg-10">
                    <input name="report_date" type="text" class="form-control" id="report_date" value="<?php echo $report[0]->report_date;?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="client" class="col-lg-2 control-label">Client</label>
                  <div class="col-lg-10">
                  	<input name="client" type="text" class="form-control" id="client" value="<?php echo $report[0]->client;?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="address" class="col-lg-2 control-label">Address</label>
                  <div class="col-lg-10">
                  	<input name="address" type="text" class="form-control" id="address" value="<?php echo $report[0]->address;?>">
                  </div>
                </div>
                 <div class="form-group">
                  <label for="contactno" class="col-lg-2 control-label">Contact #</label>
                  <div class="col-lg-10">
                  	<input name="contactno" type="text" class="form-control" id="contactno" value="<?php echo $report[0]->contactno;?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="model" class="col-lg-2 control-label">Model</label>
                  <div class="col-lg-10">

                    <select name="model_name" class="form-control" id="model">
                    <option value="<?php echo $report[0]->model_name;?>"><?php echo $report[0]->model_name;?></option>
					<?php
					for($i=0; $i<count($models);$i++) {
					?>
					<option value="<?php echo $models[$i]->name;?>"><?php echo $models[$i]->name;?></option>
					<?php }?>
                    </select>
                </div>
                </div>
                <div class="form-group">
                  <label for="term" class="col-lg-2 control-label">Term</label>
                  <div class="col-lg-10">
                  	<input name="term" type="text" class="form-control" id="term" value="<?php echo $report[0]->term;?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="remarks" class="col-lg-2 control-label">Remarks</label>
                  <div class="col-lg-10">
                    <textarea name="remarks" class="form-control" rows="3" id="remarks" value="<?php echo $report[0]->remarks;?>"></textarea>
                    <span class="help-block">A longer block of help text that breaks onto a new line and may extend beyond one line.</span>
                  </div>
                </div>
             

              </fieldset>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
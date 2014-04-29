<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title" id="myModalLabel">Edit a Report</h4>
</div>

<form name="add" class="form-horizontal" method="POST" action="/KiaDFRS/index.php/report/update">
    <input type="hidden" name="report_id" value="<?php echo $report[0]->report_id?>">
    <fieldset>
      <legend>
      </legend>
      <div class="well well-sm">
        <p><b>Sales Consultant:</b> <?php echo $report[0]->sales_consultant;?></p>
      </div>
      <div class="form-group">
        <label for="report_date" class="col-lg-2 control-label">Date</label>
        <div class="col-lg-10 controls input-append date form_date" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
          <input name="report_date" type="text" class="form-control" id="report_date" value="<?php echo $report[0]->report_date;?>">
          <span class="add-on"><i class="icon-remove"></i></span>
          <span class="add-on"><i class="icon-th"></i></span>
        </div>
        <input type="hidden" id="dtp_input2" value="" /><br/>
      </div>
      <div class="form-group">
        <label for="client" class="col-lg-2 control-label">Client</label>
        <div class="col-lg-10">
          <input name="client" type="text" class="form-control" id="client" value="<?php echo $report[0]->client;?>">
        </div>
      </div>
      <div class="form-group">
        <label for="address" class="col-lg-2 control-label">
        <a href="#" type="button" class="nav nav-pills" onclick="toggleFullScreen()" data-toggle="modal" data-target="#myModalViewMap">Address</a>
        </label>
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
          <select name="term" class="form-control" id="term">
          <option value="<?php echo $report[0]->term;?>"><?php echo $report[0]->term;?></option>
          <?php
            for($i=0; $i<count($terms);$i++) {
            ?>
            <option value="<?php echo $terms[$i]->term_name;?>"><?php echo $terms[$i]->term_name;?></option>
          <?php }?>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label for="remarks" class="col-lg-2 control-label">Remarks</label>
        <div class="col-lg-10">
          <input name="remarks" class="form-control" rows="3" id="remarks" value="<?php echo $report[0]->remarks;?>"></input>
          <span class="help-block">A longer block of help text that breaks onto a new line and may extend beyond one line.</span>
        </div>
      </div>
       
    </fieldset>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-primary">Save changes</button>
    </div>
</form>
<!DOCTYPE html>
<?php
session_start();
$username = $this->session->userdata('username');
$is_logged_in = $this->session->userdata('is_logged_in');
?>
<html lang="en">
<div class="modal-header">
    <h4 class="modal-title" id="myModalLabel">Edit a Report</h4>
</div>

    <?php if (form_error('report_date') || form_error('client') || form_error('address') || form_error('contactno') || form_error('status')) { ?>
        <?php echo "
        <center><div class=\"alert alert-dismissable alert-warning\">
        <button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>
        <h4>Oops..</h4>
        <p>Looks like something went wrong with the <font color=\"red\">Update of your Report</font>. Please try again and provide the Required Information.</p>
        </div></center>"; ?>
    <?php }?>


    <?php echo form_open('report/update');?>
    <input type="hidden" name="report_id" value="<?php echo $report[0]->report_id?>">
    <fieldset>
      <legend>
      </legend>
          <?php if ($username=='Administrator') { ;?>
            <div class="form-group">
              <label for="sales_consultant" class="col-lg-2 control-label">Consultant</label>
              <div class="col-lg-10">
                <select name="sales_consultant" class="form-control" id="sales_consultant">
                <option value="<?php echo $report[0]->sales_consultant;?>"><?php echo $report[0]->sales_consultant;?></option>
                <?php
                  for($i=0; $i<count($consultants);$i++) {
                  ?>
                  <option value="<?php echo $consultants[$i]->username;?>"><?php echo $consultants[$i]->username;?></option>
                <?php }?>
                </select>
                <span class="help-block"><font color="red"><?php echo form_error('sales_consultant');?></font></span>
              </div>
            </div>
          <?php } elseif ($username=='Axel Eion') { ?>
            <div class="form-group">
              <label for="sales_consultant" class="col-lg-2 control-label">Consultant</label>
              <div class="col-lg-10">
                <select name="sales_consultant" class="form-control" id="sales_consultant">
                <option value="<?php echo $report[0]->sales_consultant;?>"><?php echo $report[0]->sales_consultant;?></option>
                <?php
                  for($i=0; $i<count($consultants);$i++) {
                  ?>
                  <option value="<?php echo $consultants[$i]->username;?>"><?php echo $consultants[$i]->username;?></option>
                <?php }?>
                </select>
                <span class="help-block"><font color="red"><?php echo form_error('sales_consultant');?></font></span>
              </div>
            </div>
          <?php } else { ?>
            <div class="well well-sm">
              <p><center>Sales Consultant: <Strong><?php echo $report[0]->sales_consultant;?></Strong></center></p>
              <input type="hidden" name="sales_consultant" value="<?php echo $username;?>">
            </div>
          <?php } ?>
      <div class="form-group">
        <label for="report_date" class="col-lg-2 control-label">Date</label>
        <div class="col-lg-10 controls input-append date form_date" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
          <input name="report_date" type="text" class="form-control" id="report_date" value="<?php echo $report[0]->report_date;?>">
          <span class="add-on"><i class="icon-remove"></i></span>
          <span class="add-on"><i class="icon-th"></i></span>
          <span class="help-block"><font color="red"><?php echo form_error('report_date');?></font></span>
        </div>
        <input type="hidden" id="dtp_input2" value="" /><br/>
      </div>
      <div class="form-group">
        <label for="client" class="col-lg-2 control-label">Client</label>
        <div class="col-lg-10">
          <input name="client" type="hidden" class="form-control" id="client" value="<?php echo $report[0]->client;?>">
          <input disabled="" name="client" type="text" class="form-control" id="client" value="<?php echo $report[0]->client;?>">
          <span class="help-block"><font color="red"><?php echo form_error('client');?></font></span>
        </div>
      </div>
      <div class="form-group">
        <label for="address" class="col-lg-2 control-label">
        Address
        </label>
        <div class="col-lg-10">
          <input name="address" type="text" class="form-control" id="address" value="<?php echo $report[0]->address;?>">
          <span class="help-block"><font color="red"><?php echo form_error('address');?></font></span>
        </div>
      </div>
      <div class="form-group">
        <label for="contactno" class="col-lg-2 control-label">Contact #</label>
        <div class="col-lg-10">
          <input name="contactno" type="text" class="form-control" id="contactno" value="<?php echo $report[0]->contactno;?>">
          <span class="help-block"><font color="red"><?php echo form_error('contactno');?></font></span>
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
          <span class="help-block"><font color="red"><?php echo form_error('model');?></font></span>
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
          <span class="help-block"><font color="red"><?php echo form_error('term');?></font></span>
        </div>
      </div>
      <div class="form-group">
        <label for="remarks" class="col-lg-2 control-label">Remarks</label>
        <div class="col-lg-10">
          <input name="remarks" class="form-control" rows="3" id="remarks" value="<?php echo $report[0]->remarks;?>"></input>
          <span class="help-block"><font color="red"><?php echo form_error('remarks');?></font></span>
        </div>
      </div>
      <div class="form-group">
        <label for="status" class="col-lg-2 control-label">Status</label>
        <div class="col-lg-10">
          <select name="status" class="form-control" id="status">
           <option value="<?php echo $report[0]->status;?>"><?php echo $report[0]->status;?></option>
            <?php
            for($i=0; $i<count($all_status);$i++) {
             ?>
             <option value="<?php echo $all_status[$i]->status_name;?>"><?php echo $all_status[$i]->status_name;?></option>
            <?php }?>
          </select>
          <span class="help-block"><font color="red"><?php echo form_error('status');?></font></span>
         </div>
      </div>
       
    </fieldset>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-success">Save changes</button>
    </div>
</form>
</html>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title" id="myModalLabel">Edit Profile</h4>
</div>

<?php echo form_open('report/updateConsultant');?>
    <fieldset>
      <legend>
      </legend>
      <div class="form-group">
        <label class="col-lg-2 control-label">Username</label>
        <div class="col-lg-10">
          <input type="text" class="form-control" value="<?php echo $query[0]['username']; ?>">
          <span class="help-block"></font></span>
        </div>
      </div>
      <div class="form-group">
        <label class="col-lg-2 control-label">Old Password</label>
        <div class="col-lg-10">
          <input type="password" class="form-control" value="" placeholder="Your current password">
          <span class="help-block"></font></span>
        </div>
      </div>
      <div class="form-group">
        <label for="password" class="col-lg-2 control-label">New Password</label>
        <div class="col-lg-10">
          <input name="password" type="password" class="form-control" id="password" placeholder="New Password">
          <span class="help-block"><font color="red"><?php echo form_error('password');?></font></span>
        </div>
      </div>
      <div class="form-group">
        <label for="passconf" class="col-lg-2 control-label">Confirm New Password</label>
        <div class="col-lg-10">
          <input name="passconf" type="password" class="form-control" id="passconf" placeholder="Match above password">
          <span class="help-block"><font color="red"><?php echo form_error('passconf');?></font></span>
        </div>
      </div>

    </fieldset>
    <div class="modal-footer">
      <a href="<?php echo base_url();?>index.php/report/editConsultant/" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalEditConsultant">Save Changes</a>
      <a href="<?php echo base_url();?>index.php/report/" type="button" class="btn btn-default">Back</a>
    </div>
</form>
</div>
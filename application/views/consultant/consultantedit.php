<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title" id="myModalLabel">Edit Profile</h4>
</div>

<?php echo form_open('report/updateConsultant');?>
    <input type="hidden" name="consultant_id" value="<?php echo $consultant[0]->consultant_id?>">
    <fieldset>
      <legend>
      </legend>
      <div class="form-group">
        <label for="username" class="col-lg-2 control-label">Username</label>
        <div class="col-lg-10">
          <input disabled="" type="text" class="form-control" value="<?php echo $query[0]['username']; ?>">
          <input type="hidden" name="username" value="<?php echo $query[0]['username']; ?>">
          <span class="help-block"><font color="red"><?php echo form_error('username');?></font></span>
        </div>
      </div>
      <div class="form-group">
        <label for="password" class="col-lg-2 control-label">Password</label>
        <div class="col-lg-10">
          <input name="password" type="password" class="form-control" id="password" placeholder="New Password">
          <span class="help-block"><font color="red"><?php echo form_error('password');?></font></span>
        </div>
      </div>
      <div class="form-group">
        <label for="passconf" class="col-lg-2 control-label">Confirm Password</label>
        <div class="col-lg-10">
          <input name="passconf" type="password" class="form-control" id="passconf" placeholder="Match above password">
          <span class="help-block"><font color="red"><?php echo form_error('passconf');?></font></span>
        </div>
      </div>

    </fieldset>
    <div class="modal-footer">
      <button type="submit" class="btn btn-primary">Save Changes</button>
      <a href="<?php echo base_url();?>index.php/report/viewConsultant" type="button" class="btn btn-default">Back</a>
    </div>
</form>
</div>

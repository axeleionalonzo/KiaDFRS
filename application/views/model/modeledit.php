<!DOCTYPE html>
<?php
session_start();
$username = $this->session->userdata('username');
$is_logged_in = $this->session->userdata('is_logged_in');
?>
<html lang="en">
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title" id="myModalLabel">Edit a model</h4>
</div>


    <?php echo form_open('model/update');?>
    <input type="hidden" name="model_id" value="<?php echo $model[0]->model_id?>">
    <fieldset>
      <legend>
      </legend>
      <div class="form-group">
        <label for="name" class="col-lg-2 control-label">Model</label>
        <div class="col-lg-10">
          <input name="name" type="hidden" class="form-control" id="name" value="<?php echo $model[0]->name?>">
          <input disabled="" type="text" class="form-control" value="<?php echo $model[0]->name?>">
          <span class="help-block"><font color="red"><?php echo form_error('name');?></font></span>
        </div>
      </div>
      <div class="form-group">
        <label for="price" class="col-lg-2 control-label">Price</label>
        <div class="col-lg-10">
          <input name="price" type="text" class="form-control" id="price" value="<?php echo $model[0]->price;?>">
          <span class="help-block"><font color="red"><?php echo form_error('price');?></font></span>
        </div>
      </div>
       
    </fieldset>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-success">Save changes</button>
    </div>
</form>
</html>
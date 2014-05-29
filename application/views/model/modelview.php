<!DOCTYPE html>
<?php
session_start();
$username = $this->session->userdata('username');
$is_logged_in = $this->session->userdata('is_logged_in');
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>View Model</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="<?php echo base_url();?>css/bootstrap.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">

</head>
<body>
<div class="container">
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title" id="myModalLabel">View Car Model</h4>
</div>


    <?php echo form_open('model/update');?>
    <input type="hidden" name="model_id" value="<?php echo $model[0]->model_id?>">
    <fieldset>
      <legend>
      </legend>
      <div class="form-group">
        <label class="col-lg-2 control-label">Model</label>
        <div class="col-lg-10">
          <input disabled="" type="text" class="form-control" value="<?php echo $model[0]->name?>">
          <span class="help-block"></font></span>
        </div>
      </div>
      <div class="form-group">
        <label class="col-lg-2 control-label">Price</label>
        <div class="col-lg-10">
          <input disabled="" type="text" class="form-control" value="<?php echo $model[0]->price?>">
          <span class="help-block"></font></span>
        </div>
      </div>

    </fieldset>
    <div class="modal-footer">
      <?php if (($query[0]['username'])==('Administrator')) {?>
      <?php $id = $model[0]->model_id;?>
      <a href="<?php echo base_url();?>index.php/model/delete/<?php echo $id;?>" type="button" class="btn btn-default" onclick="return confirm('are you sure to delete')">Delete</a>
      <a href="<?php echo base_url();?>index.php/model/edit/<?php echo $id;?>" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalEditModel">Edit model</a>
      <a href="<?php echo base_url();?>index.php/model/" type="button" class="btn btn-default">Back</a>
      <?php } elseif (($query[0]['username'])==('Axel Eion')) {?>
      <?php $id = $model[0]->model_id;?>
      <a href="<?php echo base_url();?>index.php/model/delete/<?php echo $id;?>" type="button" class="btn btn-default" onclick="return confirm('are you sure to delete')">Delete</a>
      <a href="<?php echo base_url();?>index.php/model/edit/<?php echo $id;?>" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalEditModel">Edit model</a>
      <a href="<?php echo base_url();?>index.php/model/" type="button" class="btn btn-default">Back</a>
      <?php } else {?>
      <a href="<?php echo base_url();?>index.php/model/" type="button" class="btn btn-default">Back</a>
      <?php } ?>
    </div>
</form>
</div>

    <!-- Modal Edit Model -->
    <div data-focus-on="input:first" class="modal fade" id="myModalEditModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">

        </div>
      </div>
    </div>


    <!-- bootstrap -->
    <script src="<?php echo base_url();?>js/jquery-1.10.2.min.js"></script>
    <script src="<?php echo base_url();?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootswatch.js"></script>

</body>
</html>
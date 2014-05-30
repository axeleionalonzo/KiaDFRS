<!DOCTYPE html>
<?php
session_start();
$username = $this->session->userdata('username');
$is_logged_in = $this->session->userdata('is_logged_in');
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>View Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="<?php echo base_url();?>css/bootstrap.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">

</head>
<body>
<div class="container">

<div class="modal-header">
    <h4 class="modal-title" id="myModalLabel">Profile</h4>
</div>


    <?php echo form_open('report/signup');?>
    <input type="hidden" name="cr_id" value="<?php echo $consultant_data[0]->cr_id; ?>">
    <fieldset>
      <legend>
      </legend>
      <div class="form-group">
        <label class="col-lg-2 control-label">Username</label>
        <div class="col-lg-10">
          <input disabled="" type="text" class="form-control" value="<?php echo $consultant_data[0]->username; ?>">
          <input type="hidden" name="username" value="<?php echo $consultant_data[0]->username; ?>">
          <span class="help-block"></font></span>
        </div>
      </div>
      <div class="form-group">
        <div class="col-lg-10">
          <input type="hidden" name="password" value="<?php echo $consultant_data[0]->password;?>">
          <input type="hidden" name="passconf" value="<?php echo $consultant_data[0]->password;?>">
        </div>
      </div>

    </fieldset>
    <div class="modal-footer">
      <?php $id = $consultant_data[0]->cr_id?>
      <a href="<?php echo base_url();?>index.php/report/deleteRequest/<?php echo $id; ?>" type="button" class="btn btn-primary" onclick="return confirm('Are you sure to Reject this Request?')">Reject</a>
      <button type="submit" class="btn btn-success">Accept</button>
      <a href="<?php echo base_url();?>index.php/report/" type="button" class="btn btn-default">Back</a>
    </div>
</form>
</div>

    <!-- bootstrap -->
    <script src="<?php echo base_url();?>js/jquery-1.10.2.min.js"></script>
    <script src="<?php echo base_url();?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootswatch.js"></script>

</body>
</html>
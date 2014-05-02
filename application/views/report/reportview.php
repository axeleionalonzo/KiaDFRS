<!DOCTYPE html>
<?php
session_start();
$username = $this->session->userdata('username');
$is_logged_in = $this->session->userdata('is_logged_in');
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Report List</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="<?php echo base_url();?>css/bootstrap.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">

</head>
<body>

  <div class="container">
            <?php if (form_error('report_date') || form_error('client') || form_error('address') || form_error('contactno')) { ?>
            <?php echo "
            <center><div class=\"alert alert-dismissable alert-warning\">
              <button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>
              <h4>Oops..</h4>
              <p>Looks like something went wrong with the <font color=\"red\">Creation of your Report</font>. Please try again and provide the Required Information.</p>
            </div></center>"; ?>
            <?php }?>
  
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title" id="myModalLabel">Full Report</h4>
</div>
<?php echo form_open('report/update');?>
    <input type="hidden" name="report_id" value="<?php echo $report[0]->report_id?>">
    <fieldset>
        <legend>
        </legend>
        <div class="well well-sm">
            <?php if (($report[0]->sales_consultant)=='Administrator') { ?>
          <p><center><Strong>Superuser: Administrator</Strong></center></p>
            <?php } elseif (($report[0]->sales_consultant)=='Axel Eion') { ?>
          <p><center><Strong>Superuser: Administrator</Strong></center></p>
            <?php } else { ?>
          <p><center>Sales Consultant: <b><big><?php echo $report[0]->sales_consultant;?></big></b></center></p>
            <?php } ?>
        </div>
        <div class="form-group">
          <label class="col-lg-2 control-label">Date</label>
          <div class="col-lg-10">
            <input disabled="" type="text" class="form-control" value="<?php echo $report[0]->report_date;?>">
            <span class="help-block"></font></span>
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-2 control-label">Client</label>
          <div class="col-lg-10">
            <input disabled="" type="text" class="form-control" value="<?php echo $report[0]->client;?>">
            <span class="help-block"></font></span>
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-2 control-label">Address</label>
          <div class="col-lg-10">
            <input disabled="" type="text" class="form-control" value="<?php echo $report[0]->address;?>">
            <span class="help-block"></font></span>
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-2 control-label">Contact #</label>
          <div class="col-lg-10">
            <input disabled="" type="text" class="form-control" value="<?php echo $report[0]->contactno;?>">
            <span class="help-block"></font></span>
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-2 control-label">Model</label>
          <div class="col-lg-10">
            <input disabled="" type="text" class="form-control" value="<?php echo $report[0]->model_name;?>">
            <span class="help-block"></font></span>
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-2 control-label">Term</label>
          <div class="col-lg-10">
            <input disabled="" type="text" class="form-control" value="<?php echo $report[0]->term;?>">
            <span class="help-block"></font></span>
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-2 control-label">Remarks</label>
          <div class="col-lg-10">
            <input disabled="" type="text" class="form-control" value="<?php echo $report[0]->remarks;?>">
            <span class="help-block"></font></span>
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-2 control-label">Status</label>
          <div class="col-lg-10">
            <?php if (($report[0]->status)=='Car Released') { ?>
            <big><font color="CornflowerBlue"><b><input disabled="" type="text" class="form-control" value="<?php echo $report[0]->status;?>"></b></font></big>
            <?php } else { ?>
            <font color="red"><b><input disabled="" type="text" class="form-control" value="<?php echo $report[0]->status;?>"></b></font>
            <?php }?>
            <span class="help-block"></font></span>
          </div>
        </div>

    </fieldset>

    <div class="modal-footer">
      <?php if (($query[0]['username'])==($report[0]->sales_consultant)) { ?>
      <?php $id = $report[0]->report_id;?>
      <a href="<?php echo base_url();?>index.php/report/delete/<?php echo $id;?>" type="button" class="btn btn-default" onclick="return confirm('are you sure to delete')">Delete</a>
      <a href="<?php echo base_url();?>index.php/report/edit/<?php echo $id;?>" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModaledit">Edit Report</a>
      <a href="<?php echo base_url();?>index.php/report/" type="button" class="btn btn-default">Back</a>
      <?php } elseif (($query[0]['username'])==('Administrator')) {?>
      <?php $id = $report[0]->report_id;?>
      <a href="<?php echo base_url();?>index.php/report/delete/<?php echo $id;?>" type="button" class="btn btn-default" onclick="return confirm('are you sure to delete')">Delete</a>
      <a href="<?php echo base_url();?>index.php/report/edit/<?php echo $id;?>" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModaledit">Edit Report</a>
      <a href="<?php echo base_url();?>index.php/report/" type="button" class="btn btn-default">Back</a>
      <?php } elseif (($query[0]['username'])==('Axel Eion')) {?>
      <?php $id = $report[0]->report_id;?>
      <a href="<?php echo base_url();?>index.php/report/delete/<?php echo $id;?>" type="button" class="btn btn-default" onclick="return confirm('are you sure to delete')">Delete</a>
      <a href="<?php echo base_url();?>index.php/report/edit/<?php echo $id;?>" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModaledit">Edit Report</a>
      <a href="<?php echo base_url();?>index.php/report/" type="button" class="btn btn-default">Back</a>
      <?php } else {?>
      <a href="<?php echo base_url();?>index.php/report/" type="button" class="btn btn-default">Back</a>
      <?php } ?>
    </div>
</form>

</div>

    <!-- Modal Edit -->
    <div data-focus-on="input:first" class="modal fade" id="myModaledit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
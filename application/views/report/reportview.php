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
            <?php echo "<div class=\"jumbotron\">
              <h1>Oops..</h1>
              <p>Looks like something went wrong with the <font color=\"red\">Creation of your Report</font>. Please try again and provide the Required Information.</p>
              </div>"; ?>
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
          <p><center>Sales Consultant: <b><big><?php echo $report[0]->sales_consultant;?></big></b></center></p>
        </div>
        <div class="form-group">
          <label for="report_date" class="col-lg-2 control-label">Date</label>
          <div class="col-lg-10">
          <ul class="nav nav-pills nav-stacked" style="max-width: 300px;">
              <li class="disabled"><a href="#"><?php echo $report[0]->report_date;?></a></li>
          </ul>
          </div>
        </div>
        <div class="form-group">
          <label for="client" class="col-lg-2 control-label">Client</label>
          <div class="col-lg-10">
          <ul class="nav nav-pills nav-stacked" style="max-width: 300px;">
              <li class="disabled"><a href="#"><?php echo $report[0]->client;?></a></li>
          </ul>
          </div>
        </div>
        <div class="form-group">
            <label for="address" class="col-lg-2 control-label">Address</label>
          <div class="col-lg-10">
          <ul class="nav nav-pills nav-stacked" style="max-width: 300px;">
            <li class="disabled"><a href="#"><?php echo $report[0]->address;?></a></li>
          </ul>
          </div>
        </div>
        <div class="form-group">
          <label for="contactno" class="col-lg-2 control-label">Contact #</label>
          <div class="col-lg-10">
          <ul class="nav nav-pills nav-stacked" style="max-width: 300px;">
            <li class="disabled"><a href="#"><?php echo $report[0]->contactno;?></a></li>
          </ul>
          </div>
        </div>
        <div class="form-group">
          <label for="model_name" class="col-lg-2 control-label">Model</label>
          <div class="col-lg-10">
          <ul class="nav nav-pills nav-stacked" style="max-width: 300px;">
           <li class="disabled"><a href="#"><?php echo $report[0]->model_name;?></a></li>
          </ul>
          </div>
        </div>
        <div class="form-group">
          <label for="term" class="col-lg-2 control-label">Term</label>
          <div class="col-lg-10">
          <ul class="nav nav-pills nav-stacked" style="max-width: 300px;">
            <li class="disabled"><a href="#"><?php echo $report[0]->term;?></a></li>
          </ul>
          </div>
        </div>
        <div class="form-group">
          <label for="remarks" class="col-lg-2 control-label">Remarks</label>
          <div class="col-lg-10">
          <ul class="nav nav-pills nav-stacked" style="max-width: 300px;">
            <li class="disabled"><a href="#"><?php echo $report[0]->remarks;?></a></li>
          </ul>
          </div>
        </div>
        <div class="form-group">
          <label for="status" class="col-lg-2 control-label">Status</label>
          <div class="col-lg-10">
          <ul class="nav nav-pills nav-stacked" style="max-width: 300px;">
            <li class="disabled"><a href="#">
            <?php if (($report[0]->status)=='Bought') {
              echo '<big><font color="CornflowerBlue"><b>Sold</b></font></big>';
            } else {
              echo '<font color="red"><b>Under Observation</b></font>';
            }?></a></li>
          </ul>
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
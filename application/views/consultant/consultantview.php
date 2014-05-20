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

    <fieldset>
      <legend>
      </legend>

      <div class="row clearfix">
      <div class="col-md-3 column">
        <div class="form-group">
           <label for="exampleInputFile">Profile Picture</label>
          <p>
            <img src="<?php echo base_url();?>img/default_profile.jpg" height="214" width="214"/>
          </p>
            <form enctype="multipart/form-data" action="image.php" method="POST">
              <input type="file" id="exampleInputFile" />
            </form>
        </div>
      </div>
      <div class="col-md-9 column"><br><br><br><br><br>
      <div class="form-group">
        <label class="col-lg-2 control-label">Username</label>
        <div class="col-lg-10">
          <input disabled="" type="text" class="form-control" value="<?php echo $query[0]['username']; ?>">
          <span class="help-block"></font></span>
        </div>
      </div>
      <div class="form-group">
        <label class="col-lg-2 control-label">Password</label>
        <div class="col-lg-10">
          <input disabled="" type="password" class="form-control" value="<?php echo $query[0]['password']; ?>">
          <span class="help-block"></font></span>
        </div>
      </div>
      <div class="form-group">
        <label class="col-lg-2 control-label">Reports Made</label>
        <div class="col-lg-10">
          <input disabled="" type="text" class="form-control" value="<?php echo count($recordsbyconsultatnt); ?>">
          <span class="help-block"></font></span>
        </div>
      </div>
      </div>
      </div>
      
    </fieldset>
    <div class="modal-footer">
      <a href="<?php echo base_url();?>index.php/report/deleteConsultant/<?php echo $query[0]['consultant_id']; ?>" type="button" class="btn btn-default" onclick="return confirm('are you sure to delete')">Delete</a>
      <a href="<?php echo base_url();?>index.php/report/editConsultant/<?php echo $query[0]['consultant_id']; ?>" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalEditConsultant">Change Password</a>
      <a href="<?php echo base_url();?>index.php/report/" type="button" class="btn btn-default">Back</a>
    </div>
</div>

    <!-- Modal Edit Model -->
    <div data-focus-on="input:first" class="modal fade" id="myModalEditConsultant" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
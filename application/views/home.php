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
    <div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a href="<?php echo base_url();?>index.php" class="navbar-brand">Home</a>
          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
          <ul class="nav navbar-nav navbar-right">
            <?php if($is_logged_in) { ?>
            <li><a href="<?php echo base_url();?>index.php/report/logout">Log out</a></li>
            <?php } else {; ?>
            <li><a href="#" data-toggle="modal" data-target="#myModalSignIn">Sign in</a></li>
            <li class="active"><a href="#" data-toggle="modal" data-target="#myModalSignUp"><big><b>Sign up</b></big></a></li>
            <?php }; ?>
          </ul>
        </div>
      </div>
    </div>


    <div class="container">
    <div class="alert alert-dismissable alert-warning"></div>
    <?php if ($this->session->flashdata('flashError')) { ?>
      <?php echo "<center><div class=\"alert alert-dismissable alert-warning\">
        <button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>
        <h4>Oops..</h4>
        <p>Looks like something went wrong with your <font color=\"red\">Username and Password Combination</font>. Please try again with the correct details.</p>
      </div></center>"; ?>
    <?php } elseif (form_error('username') || form_error('password') || form_error('passconf')) {?>
      <?php echo "<center><div class=\"alert alert-dismissable alert-warning\">
        <button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>
        <h4>Oops..</h4>
        <p>Looks like something went wrong with your <font color=\"red\">Registration Details</font>. Please try again and provide the Required Information.</p>
        </div></center>"; ?>
    <?php } else { ?>
      <?php echo "<center><div class=\"alert alert-dismissable alert-success\">
        <button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>
        <h4>Well done!</h4> You successfully created your Consultant Account. Please proceed by <font color=\"CornflowerBlue\">Signing in with you Username.</font></p>
      </div></center>"; ?>
    <?php }?>

    <div class="page-header" id="banner">
      <div class="row">
        <div class="col-lg-6">
        <h1>Kia</h1>
        <p class="lead">Online Prospect Management System</p>
        </div>
      </div>
    </div>

    <h2>Project Description</h2>
    <p>KIA Online Prospect Management System is an online report management simulator created to decrease human error writing reports on hand. It optimizes the organization of all the reports provided by various department. The primary goal of this system is to ease the work of sales consultant provided by the authorization of system administration.</p>


    <!-- Modal Add Consultant -->
    <div class="modal fade" id="myModalSignUp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel">Sign up</h4>
          </div>
            <?php echo form_open('report/request'); ?>
            <fieldset>
              <legend></legend>
              <div class="well well-sm">
                <p><b>Sales Consultant</b></p>
              </div>
              <div class="form-group">
                <label for="username" class="col-lg-2 control-label">Full Name</label>
                <div class="col-lg-10">
                  <input name="username" type="text" class="form-control" id="username" placeholder="This will act as your username">
                  <span class="help-block"><font color="red"><?php echo form_error('username');?></font></span>
                </div>
              </div>
              <div class="form-group">
                <label for="password" class="col-lg-2 control-label">Password</label>
                <div class="col-lg-10">
                  <input name="password" type="password" class="form-control" id="password" placeholder="Password">
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
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Create</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Modal Sign in -->
    <div class="modal fade" id="myModalSignIn" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Sign in</h4>
          </div>
          <?php echo form_open('report/validate_credentials');?>
          <fieldset>
            <legend></legend>
            <div class="well well-sm">
            <p><b>Sales Consultant</b></p>
            </div>
            <div class="form-group">
              <label for="username" class="col-lg-2 control-label">Full Name</label>
              <div class="col-lg-10">
                <input name="username" type="text" class="form-control" id="username" placeholder="Username">
                <span class="help-block">
                <font color="red">
                  <?php if ($this->session->flashdata('flashError')) { ?>
                  <?php echo $this->session->flashdata('flashError'); ?>
                  <?php } ?>
                </font>
                </span>
              </div>
            </div>
            <div class="form-group">
              <label for="password" class="col-lg-2 control-label">Password</label>
              <div class="col-lg-10">
                <input name="password" type="password" class="form-control" id="password" placeholder="Password">
                <span class="help-block"><font color="red"><?php echo form_error('password');?></font></span>
              </div>
            </div>
          </fieldset>
          <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Sign in</button>
          </form>
          </div>
        </div>
      </div>
    </div>


    <!-- bootstrap -->
    <script src="<?php echo base_url();?>js/jquery-1.10.2.min.js"></script>
    <script src="<?php echo base_url();?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootswatch.js"></script>

</body>
</html>
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

    <style>
      #map_canvas {
      width: 100%;
      height: 400px;
      }
    </style>

    <script type="text/javascript">
      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-23019901-1']);
      _gaq.push(['_setDomainName', "bootswatch.com"]);
      _gaq.push(['_setAllowLinker', true]);
      _gaq.push(['_trackPageview']);

      (function() {
      var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
      ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();


      function reloadPage()
      {
      location.reload();
      }

      function toggleFullScreen() {
      if ((document.fullScreenElement && document.fullScreenElement !== null) ||
      (!document.mozFullScreen && !document.webkitIsFullScreen)) {
      if (document.documentElement.requestFullScreen) {
      document.documentElement.requestFullScreen();
      } else if (document.documentElement.mozRequestFullScreen) {
      document.documentElement.mozRequestFullScreen();
      } else if (document.documentElement.webkitRequestFullScreen) {
      document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
      }
      }
      }

      function initialize() {
      var map_canvas = document.getElementById('map_canvas');
      var map_options = {
      center: new google.maps.LatLng(8.1336, 124.1430),
      zoom: 10,
      mapTypeId: google.maps.MapTypeId.ROADMAP
      }
      var map = new google.maps.Map(map_canvas, map_options)
      }
      google.maps.event.addDomListener(window, 'load', initialize);
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

</head>
<body>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title" id="myModalLabel">Full Report</h4>
</div>
<form name="add" class="form-horizontal" method="POST" action="<?php echo base_url();?>index.php/report/update">
    <input type="hidden" name="report_id" value="<?php echo $report[0]->report_id?>">
    <fieldset>
        <legend>
        </legend>
        <div class="well well-sm">
          <p><b>Sales Consultant:</b> <?php echo $report[0]->sales_consultant;?></p>
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
    </fieldset>

    <div class="modal-footer">
      <?php if(($query[0]['username'])==($report[0]->sales_consultant)) { ?>
      <?php $id = $report[0]->report_id;?>
      <a href="<?php echo base_url();?>index.php/report/delete/<?php echo $id;?>" type="button" class="btn btn-default" onclick="return confirm('are you sure to delete')">Delete</a>
      <a href="<?php echo base_url();?>index.php/report/edit/<?php echo $id;?>" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModaledit">Edit Report</a>
      <a href="<?php echo base_url();?>index.php/report/" type="button" class="btn btn-default">Back</a>
      <?php } else {?>
      <a href="<?php echo base_url();?>index.php/report/" type="button" class="btn btn-default">Back</a>
      <?php }?>
    </div>
</form>

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

    <!-- Date picker -->
    <script type="text/javascript" src="<?php echo base_url();?>/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
    <script type="text/javascript" src="<?php echo base_url();?>/js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>

    <script type="text/javascript">
    $('.form_datetime').datetimepicker({
        weekStart: 1,
        todayBtn:1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        forceParse: 0,
        showMeridian: 1
      });
      $('.form_date').datetimepicker({
        language:'fr',
        weekStart: 1,
        todayBtn:1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0
      });
      $('.form_time').datetimepicker({
        language:'fr',
        weekStart: 1,
        todayBtn:1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 1,
        minView: 0,
        maxView: 1,
        forceParse: 0
      });
    </script>
</body>
</html>
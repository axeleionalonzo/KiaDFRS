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

    <script type="text/javascript" src="//www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load('visualization', '1', {packages: ['corechart']});
    </script>
    <script type="text/javascript">
      function drawVisualization() {
        // Create and populate the data table.
        var data = google.visualization.arrayToDataTable([
          ['x', 'Cats', 'Blanket 1', 'Blanket 2'],
          ['A',   1,       1,           0.5],
          ['B',   2,       0.5,         1],
          ['C',   4,       1,           0.5],
          ['D',   8,       0.5,         1],
          ['E',   7,       1,           0.5],
          ['F',   7,       0.5,         1],
          ['G',   8,       1,           0.5],
          ['H',   4,       0.5,         1],
          ['I',   2,       1,           0.5],
          ['J',   3.5,     0.5,         1],
          ['K',   3,       1,           0.5],
          ['L',   3.5,     0.5,         1],
          ['M',   1,       1,           0.5],
          ['N',   1,       0.5,         1]
        ]);
      
        // Create and draw the visualization.
        new google.visualization.LineChart(document.getElementById('visualization')).
            draw(data, {curveType: "function",
                        width: 500, height: 400,
                        vAxis: {maxValue: 10}}
                );
      }
      

      google.setOnLoadCallback(drawVisualization);
    </script>

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
            <?php if (($query[0]['username'])==($username)) { ?>
            <form enctype="multipart/form-data" action="image.php" method="POST">
              <input type="file" id="exampleInputFile" />
            </form>
            <?php } ?>
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
      <?php if (($query[0]['username'])==($username)) { ?>
      <div class="form-group">
        <label class="col-lg-2 control-label">Password</label>
        <div class="col-lg-10">
          <input disabled="" type="password" class="form-control" value="<?php echo $query[0]['password']; ?>">
          <span class="help-block"></font></span>
        </div>
      </div>
      <?php } ?>
      <div class="form-group">
        <label class="col-lg-2 control-label">Reports Made</label>
        <div class="col-lg-10">
          <input disabled="" type="text" class="form-control" value="<?php echo count($recordsbyconsultatnt); ?>">
          <span class="help-block"></font></span>
        </div>
      </div>
      <div class="form-group">
        <label class="col-lg-2 control-label">Progress</label>
        <div class="col-lg-10">
          <?php for ($i=0;$i<count($recordsbyconsultatnt);$i++) { 
            echo $recordsbyconsultatnt[$i]->client;
            echo $recordsbyconsultatnt[$i]->report_date;
          }?>
          <div id="visualization" style="width: 500px; height: 400px;"></div>
        </div>
      </div>
      </div>
      </div>
      
    </fieldset>
    <div class="modal-footer">
      <?php if (($query[0]['username'])==($username)) { ?>
      <a href="<?php echo base_url();?>index.php/report/deleteConsultant/<?php echo $query[0]['consultant_id']; ?>" type="button" class="btn btn-default" onclick="return confirm('are you sure to delete')">Delete</a>
      <a href="<?php echo base_url();?>index.php/report/editConsultant/<?php echo $query[0]['consultant_id']; ?>" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalEditConsultant">Change Password</a>
      <a href="<?php echo base_url();?>index.php/report/" type="button" class="btn btn-default">Back</a>
      <?php } elseif (($query[0]['username'])==('Administrator')) {?>
      <a href="<?php echo base_url();?>index.php/report/deleteConsultant/<?php echo $query[0]['consultant_id']; ?>" type="button" class="btn btn-default" onclick="return confirm('are you sure to delete')">Delete</a>
      <a href="<?php echo base_url();?>index.php/report/editConsultant/<?php echo $query[0]['consultant_id']; ?>" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalEditConsultant">Change Password</a>
      <a href="<?php echo base_url();?>index.php/report/" type="button" class="btn btn-default">Back</a>
      <?php } elseif (($query[0]['username'])==('Axel Eion')) {?>
      <a href="<?php echo base_url();?>index.php/report/deleteConsultant/<?php echo $query[0]['consultant_id']; ?>" type="button" class="btn btn-default" onclick="return confirm('are you sure to delete')">Delete</a>
      <a href="<?php echo base_url();?>index.php/report/editConsultant/<?php echo $query[0]['consultant_id']; ?>" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalEditConsultant">Change Password</a>
      <a href="<?php echo base_url();?>index.php/report/" type="button" class="btn btn-default">Back</a>
      <?php } else {?>
      <a href="<?php echo base_url();?>index.php/report/" type="button" class="btn btn-default">Back</a>
      <?php } ?>
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
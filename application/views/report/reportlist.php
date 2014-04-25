<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Report List</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="<?php echo base_url();?>css/bootstrap.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
    <!--<link rel="stylesheet" href="./assets/css/bootswatch.min.css">-->
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../bower_components/html5shiv/dist/html5shiv.js"></script>
      <script src="../bower_components/respond/dest/respond.min.js"></script>
    <![endif]-->
    <script>

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

    </script>
    <style>
      #map_canvas {
        width: 100%;
        height: 400px;
      }
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
    <script type="text/javascript">

      function initialize() {
        var map_canvas = document.getElementById('map_canvas');
        var map_options = {
          center: new google.maps.LatLng(44.5403, -78.5463),
          zoom: 8,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        var map = new google.maps.Map(map_canvas, map_options)
      }
      google.maps.event.addDomListener(window, 'load', initialize);

      $('#myModalViewMap').on('shown.bs.modal', function () {
          google.maps.event.trigger(map, "resize");
      });


  </script>
  </head>
  <body>
    <div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a href="<?php echo base_url();?>index.php" class="navbar-brand">K I A</a>
          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
          <ul class="nav navbar-nav">
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes">Online Field Report Management System</span></a>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="#" data-toggle="modal" data-target="#myModalAdd">Make a Report</a></li>
            <li class="">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Cars <b class="caret"></b></a>
              <ul class="dropdown-menu">
                    <?php
                    for($i=0; $i<count($models);$i++) {
                    ?>
                    <li><a href="#"><small><?php echo $models[$i]->name;?></small></a></li>
                    <?php }?>
                <li class="divider"></li>
                <li><a href="<?php echo base_url();?>index.php/model/add" data-toggle="modal" data-target="#myModalAddModel"><i><b>Add New Car Model</b></i></a></li>
              </ul>
            </li>
            <li><form action="<?php echo base_url();?>" method="post" class="navbar-form navbar-left" role="search">
              <div class="form-group">
                  <input type="text" name="report" class="form-control" placeholder="Client Name">
              </div>
              <button type="submit" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Tooltip on bottom">Search</button>
          </form></li>
          </ul>
        </div>
      </div>
    </div>


    <div class="container">

      <div class="page-header" id="banner">
       
      </div>

      <!-- Navbar
      ================================================== -->



            
                  





      <!-- Tables
      ================================================== -->
      <div class="bs-docs-section">

        <div class="row">
          <div class="col-lg-12">
            <div class="page-header">
              <h1 id="tables">List of Reports</h1>
            </div>

            <div class="bs-component">
              <table class="table table-striped table-hover ">
                <thead>
                  <tr>
                    <th>Report Date</th>
                    <th>Client</th>
                    <th>Address</th>
                    <th>Contact #</th>
                    <th>Model</th>
                    <th>Term</th>
                    <th>Remarks</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                    for($i=0; $i<count($reports);$i++) {
                    ?>
                    <tr class="danger">
                    <td><?php echo $reports[$i]->report_date;?></td>
                    <td><?php echo $reports[$i]->client;?></td>
                    <td><?php echo $reports[$i]->address;?></td>
                    <td><?php echo $reports[$i]->contactno;?></td>
                    <td><?php echo $reports[$i]->model_name;?></td>
                    <td><?php echo $reports[$i]->term;?></td>
                    <td><?php echo $reports[$i]->remarks;?></td>
                    <td><a href="<?php echo base_url();?>index.php/report/view/<?php echo $reports[$i]->report_id;?>" data-toggle="modal" data-target="#myModalView">View Full Report</a></td>
                    </tr>
                    <?php }?>
                </tbody>
              </table> 
            </div><!-- /example -->
          </div>
        </div>
      </div>

      <!-- Modal Add -->
      <div class="modal fade" id="myModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel">Make a Report</h4>
            </div>
            <form name="add" class="form-horizontal" method="POST" action="<?php echo base_url();?>index.php/report/insert">
              <fieldset>
                <legend></legend>
                <div class="form-group">
                  <label for="sales_consultant" class="col-lg-2 control-label"><small>Consultant</small></label>
                  <div class="col-lg-10">
                    <input name="sales_consultant" type="text" class="form-control" id="sales_consultant" placeholder="This Area Here is non Editable">
                  </div>
                </div>
                <div class="form-group">
                  <?php
                  $date = date('Y-m-d');
                  ?>
                    <label class="col-lg-2 control-label">Date </label>
                      <div class="col-lg-10 controls input-append date form_date" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                      <input name="report_date" type="text" class="form-control" id="report_date" placeholder="Click to Pick Date" value="<?php echo $date;?>">
                      <span class="add-on"><i class="icon-remove"></i></span>
                       <span class="add-on"><i class="icon-th"></i></span>
                    </div>
                    <input type="hidden" id="dtp_input2" value="" /><br/>
                </div>
                <div class="form-group">
                  <label for="client" class="col-lg-2 control-label">Client</label>
                  <div class="col-lg-10">
                    <input name="client" type="text" class="form-control" id="client" value="">
                  </div>
                </div>
                <div class="form-group">
                  <label for="address" class="col-lg-2 control-label">Address</label>
                  <div class="col-lg-10">
                    <a href="#" data-toggle="modal" data-target="#myModalViewMap">
                    <input name="address" type="text" class="form-control" id="address" placeholder="Click here to view Map" value="asd"></a>
                  </div>
                </div>
                 <div class="form-group">
                  <label for="contactno" class="col-lg-2 control-label">Contact #</label>
                  <div class="col-lg-10">
                    <input name="contactno" type="text" class="form-control" id="contactno" value="">
                  </div>
                </div>
                <div class="form-group">
                  <label for="model" class="col-lg-2 control-label">Model</label>
                  <div class="col-lg-10">
                    <select name="model_name" class="form-control" id="model">
                    <option value=""></option>
                    <?php
                    for($i=0; $i<count($models);$i++) {
                    ?>
                    <option value="<?php echo $models[$i]->name;?>"><?php echo $models[$i]->name;?></option>
                    <?php }?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="term" class="col-lg-2 control-label">Term</label>
                  <div class="col-lg-10">
                    <select name="term" class="form-control" id="term">
                    <option value=""></option>
                    <?php
                    for($i=0; $i<count($terms);$i++) {
                    ?>
                    <option value="<?php echo $terms[$i]->term_name;?>"><?php echo $terms[$i]->term_name;?></option>
                    <?php }?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="remarks" class="col-lg-2 control-label">Remarks</label>
                  <div class="col-lg-10">
                    <input name="remarks" class="form-control" rows="3" id="remarks"></input>
                    <span class="help-block">A longer block of help text that breaks onto a new line and may extend beyond one line.</span>
                  </div>
                </div>
             

              </fieldset>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
              </div>
            </div>
          </div>
    </div>

          <!-- Modal View -->
          <div class="modal fade" id="myModalView" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                
                </div>
              </div>
        </div>


          <!-- Modal Add Model -->
            <div class="modal fade" id="myModalAddModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  
                </div>
            </div>
          </div>

          <!-- Modal View Map -->
            <div data-focus-on="input:first" class="modal fade" id="myModalViewMap" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div id="map_canvas"></div>
                </div>
              </div>
            </div>
          


        <div class="row">
          <div class="col-lg-12">
            <ul class="list-unstyled">
              <li class="pull-right"><a href="#top">Back to top</a></li>
            </ul>
            <p>Code released under the <a href="https://github.com/thomaspark/bootswatch/blob/gh-pages/LICENSE">MIT License</a>.</p>
            <p>Based on <a href="http://getbootstrap.com" rel="nofollow">Bootstrap</a>. Icons from <a href="http://fortawesome.github.io/Font-Awesome/" rel="nofollow">Font Awesome</a>. Web fonts from <a href="http://www.google.com/webfonts" rel="nofollow">Google</a>.</p>
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
            //language:  'fr',
            weekStart: 1,
            todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        forceParse: 0,
            showMeridian: 1
        });
      $('.form_date').datetimepicker({
            language:  'fr',
            weekStart: 1,
            todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0
        });
      $('.form_time').datetimepicker({
            language:  'fr',
            weekStart: 1,
            todayBtn:  1,
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
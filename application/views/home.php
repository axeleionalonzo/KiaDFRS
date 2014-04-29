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
    <script type="text/javascript">
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
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
    <script type="text/javascript">

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



      <!-- Modal Add Consultant -->
      <div class="modal fade" id="myModalSignUp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel">Sign up</h4>
            </div>
              <?php echo form_open('report/signup');?>
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
                </form>
              </div>
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
            <form name="add" class="form-horizontal" method="POST" action="<?php echo base_url();?>index.php/report/validate_credentials">
              <fieldset>
                <legend></legend>
                <div class="well well-sm">
                  <p><b>Sales Consultant</b></p>
                </div>
                <div class="paragraph paragraph-1 paragraph-2">
                  <?php if ($this->session->flashdata('flashError')) { ?>
                  <p><?php echo $this->session->flashdata('flashError'); ?></p>
                  <?php } ?>
                </div>
                <div class="form-group">
                  <label for="username" class="col-lg-2 control-label">Full Name</label>
                  <div class="col-lg-10">
                    <input name="username" type="text" class="form-control" id="username" placeholder="Username">
                  </div>
                </div>
                <div class="form-group">
                <label for="password" class="col-lg-2 control-label">Password</label>
                <div class="col-lg-10">
                  <input name="password" type="password" class="form-control" id="password" placeholder="Password">
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

        <!-- Modal View -->
          <div class="modal fade" id="myModalView" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                
                </div>
              </div>
        </div>

        <!-- Modal View Map -->
          <div class="modal fade" id="myModalViewMap" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div id="map_canvas"></div>
                </div>
              </div>
            </div>

          <!-- Modal Edit -->
          <div data-focus-on="input:first" class="modal fade" id="myModaledit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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

        <div class="row">
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
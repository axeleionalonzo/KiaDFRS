<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Report List</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="<?php echo base_url();?>css/bootstrap.css" media="screen" rel="stylesheet" type="text/css" />
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

  </head>
  <body>
    <div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a href="http://localhost/KiaDFRS/index.php" class="navbar-brand">K I A</a>
          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
          <ul class="nav navbar-nav">
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes">Online Daily Field Report Management System</span></a>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
          <form action="http://localhost/KiaDFRS/index.php" method="post" class="navbar-form navbar-left" role="search">
              <div class="form-group">
                  <input type="text" name="report" class="form-control" placeholder="Client Name">
              </div>
              <button type="submit" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Tooltip on bottom">Search</button>
          </form>
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
              <a href="#" data-toggle="modal" data-target="#myModalAdd">Add report</a> |
          <a href="/KiaDFRS/index.php/model/add" data-toggle="modal" data-target="#myModalAddModel">Add car</a>
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
                    <td><a href="/KiaDFRS/index.php/report/edit/<?php echo $reports[$i]->report_id;?>" data-toggle="modal" data-target="#myModalEdit">Edit</a></td>
                    <td><a href="/KiaDFRS/index.php/report/delete/<?php echo $reports[$i]->report_id;?>" onclick="return confirm('are you sure to delete')">Delete</a></td>
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
            <form name="add" class="form-horizontal" method="POST" action="index.php/report/insert">
              <fieldset>
                <legend></legend>
                <div class="form-group">
                  <?php
                  $date = date('Y-m-d');
                  ?>
                  <label for="report_date" class="col-lg-2 control-label">Date</label>
                  <div class="col-lg-10">
                    <input name="report_date" type="text" class="form-control" id="report_date" value="<?php echo $date;?>">
                  </div>
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
                    <input name="address" type="text" class="form-control" id="address" value="">
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
                    <input name="term" type="text" class="form-control" id="term" value="">
                  </div>
                </div>
                <div class="form-group">
                  <label for="remarks" class="col-lg-2 control-label">Remarks</label>
                  <div class="col-lg-10">
                    <textarea name="remarks" class="form-control" rows="3" id="remarks"></textarea>
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

          <!-- Modal Edit -->
            <div class="modal fade" id="myModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
          <div class="col-lg-12">

            <ul class="list-unstyled">
              <li class="pull-right"><a href="#top">Back to top</a></li>
            </ul>
            
            <p>Code released under the <a href="https://github.com/thomaspark/bootswatch/blob/gh-pages/LICENSE">MIT License</a>.</p>
            <p>Based on <a href="http://getbootstrap.com" rel="nofollow">Bootstrap</a>. Icons from <a href="http://fortawesome.github.io/Font-Awesome/" rel="nofollow">Font Awesome</a>. Web fonts from <a href="http://www.google.com/webfonts" rel="nofollow">Google</a>.</p>

          </div>
        </div>



 
    <script src="<?php echo base_url();?>js/jquery-1.10.2.min.js"></script>
    <script src="<?php echo base_url();?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootswatch.js"></script>

  </body>
</html>
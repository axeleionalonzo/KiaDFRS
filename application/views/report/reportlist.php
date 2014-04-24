<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Report List</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./bootstrap.css" media="screen">
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
          <form method="post" class="navbar-form navbar-left" role="search">
              <div class="form-group">
                  <input type="text" name="report" class="form-control" placeholder="Search">
              </div>
              <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
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
              <a href="#" data-toggle="modal" data-target="#myModal">Add report</a> |
          <a href="/KiaDFRS/index.php/model/add">Add car</a>
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
                    <td><a href="/KiaDFRS/index.php/report/edit/<?php echo $reports[$i]->report_id;?>">edit</a></td>
                    <td><a href="/KiaDFRS/index.php/report/delete/<?php echo $reports[$i]->report_id;?>" onclick="return confirm('are you sure to delete')">delete</a></td>
                    </tr>
                    <?php }?> 
                </tbody>
              </table> 
            </div><!-- /example -->
          </div>
        </div>
      </div>

      <!-- Modal Add -->
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel">Make a Report</h4>
            </div>
            <div class="modal-body">
              <form name="add"   method="POST" action="index.php/report/insert">
              <table border="1">

              <tr>
              <th>report_date</th>
              <?php
              $date = date('Y-m-d');
              ?>
              <td><input type="text" value="<?php echo $date;?>" name="report_date"/></td>
              <tr>
              <th>client</th>
              <td><input type="text" name="client"/></td>
              <tr>
              <th>address</th>
              <td><input type="text" name="address"/></td>
              <tr>
              <th>contactno</th>
              <td><input type="text" name="contactno"/></td>
              <tr>
              <th>model</th>
              <td>
              <select name="model_name">
              <option value=""></option>
              <?php
              for($i=0; $i<count($models);$i++) {
              ?>
              <option value="<?php echo $models[$i]->name;?>"><?php echo $models[$i]->name;?></option>
              <?php }?>
              </select>
              </td>
              <tr>
              <th>term</th>
              <td><input type="text" name="term"/></td>
              <tr>
              <th>remarks</th>
              <td><input type="text" name="remarks"/></td>
              </tr>
              </table> 
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
              </form>
            </div>
          </div>
        </div>
      </div>

      <footer>
        <div class="row">
          <div class="col-lg-12">
            <ul class="list-unstyled">
              <li class="pull-right"><a href="#top">Back to top</a></li>
            </ul>
            <p>Code released under the <a href="https://github.com/thomaspark/bootswatch/blob/gh-pages/LICENSE">MIT License</a>.</p>
            <p>Based on <a href="http://getbootstrap.com" rel="nofollow">Bootstrap</a>. Icons from <a href="http://fortawesome.github.io/Font-Awesome/" rel="nofollow">Font Awesome</a>. Web fonts from <a href="http://www.google.com/webfonts" rel="nofollow">Google</a>.</p>
          </div>
        </div>
      </footer>
    </div>

    <script src="./jquery-1.10.2.min.js"></script>
    <script src="./bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="./assets/js/bootswatch.js"></script>

  </body>
</html>

<!DOCTYPE html>
<?php
session_start();
$username = $this->session->userdata('username');
$is_logged_in = $this->session->userdata('is_logged_in');


$username=$query[0]['username'];
?>
<html lang="en">
    <head>

      <meta charset="utf-8">
      <title>Report List</title>
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
      <link href="<?php echo base_url();?>css/bootstrap.css" media="screen" rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url();?>css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen" />

      <script type="text/javascript">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-23019901-1']);
        _gaq.push(['_setDomainName', "bootswatch.com"]);
        _gaq.push(['_setAllowLinker', true]);
        _gaq.push(['_trackPageview']);
      </script>

    </head>
    <body>

      <div class="navbar navbar-default navbar-fixed-top">
        <div class="container">
          <div class="navbar-header">
            <a href="<?php echo base_url();?>index.php/report/home" class="navbar-brand">Home</a>
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>
          <div class="navbar-collapse collapse" id="navbar-main">
            <ul class="nav navbar-nav">
              <li class="dropdown">
                <a href="<?php echo base_url();?>index.php/report" id="themes">Online Prospect Management System</span></a>
              </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li class="active"><a href="#" data-toggle="modal" data-target="#myModalAdd">Make a Report</a></li>
              <li>
                <form action="<?php echo base_url();?>index.php/" method="post" class="navbar-form navbar-left" role="search">
                <div class="form-group">
                  <input type="text" name="report" class="form-control" placeholder="Keyword Here">
                </div>
                <button type="submit" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Tooltip on bottom">Search</button>
                </form>
              </li>
              <?php if ($username=='Administrator') { ;?>
                <li class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="download">Requests 
                  <?php if (count($consultant_requests)>0) { ;?>
                    <span class="badge"><?php echo count($consultant_requests); ?></span>
                  <?php } else { ?>
                    <span class="badge"></span>
                  <?php } ?></a>
                  <ul class="dropdown-menu" aria-labelledby="download">
                    <?php if (count($consultant_requests)==0) { ;?>
                      <li><a href="#"><small>No Request Found</small></a></li>
                    <?php } else { ?>
                      <?php for($i=0; $i<count($consultant_requests);$i++) { ?>
                        <?php $id = $consultant_requests[$i]->cr_id;?>
                          <li><a href="<?php echo base_url();?>index.php/report/view_request/<?php echo $id?>"><small><?php echo $consultant_requests[$i]->username;?></small></a></li>
                      <?php }?>
                    <?php }?>
                  </ul>
                </li>
              <?php } elseif ($username=='Axel Eion') { ?>
                <li class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="download">Requests 
                    <?php if (count($consultant_requests)>0) { ;?>
                      <span class="badge"><?php echo count($consultant_requests); ?></span>
                    <?php } else { ?>
                      <span class="badge"></span>
                    <?php }?>
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="download">
                    <?php if (count($consultant_requests)==0) { ;?>
                      <li><a href="#"><small>No Request Found</small></a></li>
                    <?php } else { ?>
                      <?php for($i=0; $i<count($consultant_requests);$i++) { ?>
                        <?php $id = $consultant_requests[$i]->cr_id;?>
                          <li><a href="<?php echo base_url();?>index.php/report/view_request/<?php echo $id?>"><small><?php echo $consultant_requests[$i]->username;?></small></a></li>
                      <?php }?>
                    <?php }?>
                  </ul>
                </li>
              <?php } ?>
              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="download"><?php echo $query[0]['username']; ?> <span class="caret"></span></a>
                <ul class="dropdown-menu" aria-labelledby="download">
                  <li><a href="<?php echo base_url();?>index.php/report/viewConsultant">Manage Profile</a></li>
                  <li class="divider"></li>
                  <li><a href="<?php echo base_url();?>index.php/report/logout">Log out</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </div>


      <div class="container">

        <br><br><br>
        <center>
        <div class="well">

        <h4>NOTICE!</h4>
          <p>Kia OPMS is currently on <Strong>Alpha Test</Strong>. While browsing, you make experience several flashing and corruption of data, this is because the site is currently under construction. Alpha Version is intended for external testing of OPMS in order to identify bugs and configurations that causes problems, as well as collect feedbacks and suggestions from the users. Feel free to EXPLORE, REPORT, and SUGGEST.</p>

        </div>
        </center>

        <?php if (form_error('report_date') || form_error('client') || form_error('address') || form_error('contactno') || form_error('status')) { ?>
          <?php echo "
          <center><div class=\"alert alert-dismissable alert-warning\">
          <button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>
          <h4>Oops..</h4>
          <p>Looks like something went wrong with the <font color=\"red\">Creation of your Report</font>. Please try again and provide the Required Information.</p>
          </div></center>"; ?>
        <?php }?>
        <?php if (form_error('username') || form_error('password') || form_error('passconf')) { ?>
          <?php echo "
          <center><div class=\"alert alert-dismissable alert-warning\">
          <button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>
          <h4>Oops..</h4>
          <p>Looks like something went wrong with your <font color=\"red\">Updated Details</font>. Please try again and provide the Required Information.</p>
          </div></center>"; ?>
        <?php }?>
        <?php if (form_error('monthly_rate') || form_error('monthly_installment') || form_error('down_payment') || form_error('amount_financed') || form_error('unit_price') || form_error('model') || form_error('contactno') || form_error('address') || form_error('quotation_date')) { ?>
          <?php echo "
          <center><div class=\"alert alert-dismissable alert-warning\">
          <button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>
          <h4>Oops..</h4>
          <p>Looks like something went wrong with your <font color=\"red\">Quotation Details</font>. Please try again and provide the Required Information.</p>
          </div></center>"; ?>
        <?php }?>
        <?php if (form_error('name')) { ?>
          <?php echo "
          <center><div class=\"alert alert-dismissable alert-warning\">
          <button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>
          <h4>Oops..</h4>
          <p>Looks like something went wrong with the <font color=\"red\">Creation of Car Model</font>. A car with that model has already been created. Please try again.</p>
          </div></center>"; ?>
        <?php }?>

      </div>

      <!-- separates heaven and earth
      <div class="page-header" id="banner">
      </div>
      -->

      <!-- Navbar
      ================================================== -->


      <div class="container">

        <!-- Tables
        ================================================== -->
        <ul class="nav nav-tabs" style="margin-bottom: 15px;">
          <li class="active"><a href="#home" data-toggle="tab">Reports</a></li>
          <li class=""><a href="#profile" data-toggle="tab">Profiles</a></li>
          <li class="">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Cars <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <?php for($i=0; $i<count($models);$i++) { ?>
                <?php $id = $models[$i]->model_id; ?>
                <li><a href="<?php echo base_url();?>index.php/model/view/<?php echo $id?>"><small><?php echo $models[$i]->name;?></small></a></li>
              <?php }?>
              <?php if ($username=='Administrator') { ;?>
                <li class="divider"></li>
                <li><a href="<?php echo base_url();?>index.php/model/add" data-toggle="modal" data-target="#myModalAddModel"><i><b>Add New Car Model</b></i></a></li>
              <?php } elseif ($username=='Axel Eion') { ?>
                <li class="divider"></li>
                <li><a href="<?php echo base_url();?>index.php/model/add" data-toggle="modal" data-target="#myModalAddModel"><i><b>Add New Car Model</b></i></a></li>
              <?php } ?>
            </ul>
          </li>
        </ul>
        <div id="myTabContent" class="tab-content">
          <div class="tab-pane fade active in" id="home">
            <div class="bs-docs-section">
              <div class="row">

                <div class="col-lg-12">
                  <div class="bs-component">
                    <table class="table table-bordered table-hover ">

                      <thead>
                        <tr>
                          <th>#</th>
                          <th><a href="<?php echo base_url();?>">Date</a></th>
                          <th>Client</th>
                          <th>Address</th>
                          <th>Contact #</th>
                          <th>Model</th>
                          <th>Term</th>
                          <!-- <th>Remarks</th> -->
                        </tr>
                      </thead>
                      
                      <tbody>
                        <?php
                        $no = 1;
                        if (count($reports)==0) {
                          echo "<tr>
                          <td>No Reports Found</td>";

                        } else {
                          for($i=0; $i<count($reports);$i++) { ?>
                            <?php if(($reports[$i]->status)=='Car Released') {
                                echo "<tr>";
                              } else {
                                echo "<tr class=\"danger\">";
                              } ?>

                                <td><?php echo $no; ?></td>
                                <td><?php echo $reports[$i]->report_date;?></td>
                                <td><div class="bs-component"><a href="<?php echo base_url();?>index.php/report/view/<?php echo $reports[$i]->report_id;?>" data-toggle="tooltip" data-placement="top" data-original-title="Consultant: <?php echo $reports[$i]->sales_consultant;?>"><?php echo $reports[$i]->client;?></a></div></td>
                                <td><?php echo $reports[$i]->address;?></td>
                                <td><?php echo $reports[$i]->contactno;?></td>
                                <td><?php echo $reports[$i]->model_name;?></td>
                                <td><?php echo $reports[$i]->term;?></td>
                                <!-- <td><?php echo $reports[$i]->remarks;?></td> -->

                                <?php $no++; 
                            }
                          } ?>
                        </tr>
                      </tbody>

                    </table>

                    <center><?php echo $this->pagination->create_links(); ?></center>
                    
                  </div>
                </div>

              </div>
            </div>
          </div>

          <div class="tab-pane fade" id="profile">
            <div class="row clearfix">
              <div class="col-md-3 column">
              </div>
              <div class="col-md-6 column">
                <div class="list-group">
                    <?php for($i=0; $i<count($consultants);$i++) { ?>
                      
                        <?php 
                          if ($consultants[$i]->username=="Administrator") {
                            } elseif ($consultants[$i]->username=="Axel Eion") {
                            } else { ?>
                              <a href="<?php echo base_url();?>index.php/report/viewconsultantby/<?php echo $consultants[$i]->username;?>" class="list-group-item">
                              <?php echo $consultants[$i]->username; 
                            }
                        ?>
                      </a>
                    <?php }?>
                </div>
              </div>
              <div class="col-md-3 column">
              </div>
            </div>
          </div>
          
        </div>

        <!-- Modal Add Report-->
        <div class="modal fade" id="myModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">

              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Make a Report</h4>
              </div>

            <?php echo form_open('report/insert');?>

              <fieldset>
              <legend></legend>

              <?php if ($username=='Administrator') { ;?>
                <div class="form-group">
                  <label for="sales_consultant" class="col-lg-2 control-label">Consultant</label>
                  <div class="col-lg-10">
                    <select name="sales_consultant" class="form-control" id="sales_consultant">
                      <option value=""></option>
                      <?php for($i=0; $i<count($consultants);$i++) { ?>
                      <option value="<?php echo $consultants[$i]->username;?>"><?php echo $consultants[$i]->username;?></option>
                      <?php }?>
                    </select>
                      <span class="help-block"><font color="red"><?php echo form_error('sales_consultant');?></font></span>
                  </div>
                </div>
              <?php } elseif ($username=='Axel Eion') { ?>
                <div class="form-group">
                  <label for="sales_consultant" class="col-lg-2 control-label">Consultant</label>
                  <div class="col-lg-10">
                    <select name="sales_consultant" class="form-control" id="sales_consultant">
                      <option value=""></option>
                        <?php for($i=0; $i<count($consultants);$i++) { ?>
                          <option value="<?php echo $consultants[$i]->username;?>"><?php echo $consultants[$i]->username;?></option>
                        <?php }?>
                    </select>
                    <span class="help-block"><font color="red"><?php echo form_error('sales_consultant');?></font></span>
                  </div>
                </div>
              <?php } else { ?>
                <div class="well well-sm">
                  <p><center>Sales Consultant: <Strong><?php echo $username;?></Strong></center></p>
                  <input type="hidden" name="sales_consultant" value="<?php echo $username;?>">
                </div>
              <?php } ?>
              <div class="form-group">
                <?php $date = date('Y-m-d'); ?>
                <label class="col-lg-2 control-label">Date </label>
                <div class="col-lg-10 controls input-append date form_date" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                  <input name="report_date" type="text" class="form-control" id="report_date" placeholder="Click to Pick a Date" value="<?php echo $date;?>">
                  <span class="add-on"><i class="icon-remove"></i></span>
                  <span class="add-on"><i class="icon-th"></i></span>
                  <span class="help-block"><font color="red"><?php echo form_error('report_date');?></font></span>
                </div>
                <input type="hidden" id="dtp_input2" value="" /><br/>
              </div>
              <div class="form-group">
                <label for="client" class="col-lg-2 control-label">Client</label>
                <div class="col-lg-10">
                  <input name="client" type="text" class="form-control" id="client" placeholder="Client Full Name" value="">
                  <span class="help-block">Client Name cannot be edited later.</span>
                  <span class="help-block"><font color="red"><?php echo form_error('client');?></font></span>
                </div>
              </div>
              <div class="form-group">
                <label for="address" class="col-lg-2 control-label">Address</label>
                <div class="col-lg-10">
                  <input name="address" type="text" class="form-control" id="address" placeholder="Client Address" value="">
                  <span class="help-block"><font color="red"><?php echo form_error('address');?></font></span>
                </div>
              </div>
              <div class="form-group">
                <label for="contactno" class="col-lg-2 control-label">Contact #</label>
                <div class="col-lg-10">
                  <input name="contactno" type="text" class="form-control" id="contactno" placeholder="Client Contact Number" value="">
                  <span class="help-block"><font color="red"><?php echo form_error('contactno');?></font></span>
                </div>
              </div>
              <div class="form-group">
                <label for="model" class="col-lg-2 control-label">Model</label>
                <div class="col-lg-10">
                  <select name="model_name" class="form-control" id="model">
                  <option value=""></option>
                  <?php for($i=0; $i<count($models);$i++) { ?>
                    <option value="<?php echo $models[$i]->name;?>"><?php echo $models[$i]->name;?></option>
                  <?php }?>
                  </select>
                  <span class="help-block"><font color="red"><?php echo form_error('model');?></font></span>
                </div>
              </div>
              <div class="form-group">
                <label for="term" class="col-lg-2 control-label">Term</label>
                <div class="col-lg-10">
                  <select name="term" class="form-control" id="term">
                    <option value=""></option>
                    <?php for($i=0; $i<count($terms);$i++) { ?>
                      <option value="<?php echo $terms[$i]->term_name;?>"><?php echo $terms[$i]->term_name;?></option>
                    <?php }?>
                  </select>
                  <span class="help-block"><font color="red"><?php echo form_error('term');?></font></span>
                </div>
              </div>
              <div class="form-group">
                <label for="remarks" class="col-lg-2 control-label">Remarks</label>
                <div class="col-lg-10">
                  <input name="remarks" class="form-control" rows="3" id="remarks" placeholder="Remark Client" value=""></input>
                  <span class="help-block"><font color="red"><?php echo form_error('remarks');?></font></span>
                </div>
              </div>
              <div class="form-group">
                <label for="status" class="col-lg-2 control-label">Status</label>
                <div class="col-lg-10">
                  <select name="status" class="form-control" id="status">
                  <option value=""></option>
                  <?php for($i=0; $i<count($all_status);$i++) { ?>
                    <option value="<?php echo $all_status[$i]->status_name;?>"><?php echo $all_status[$i]->status_name;?></option>
                  <?php }?>
                  </select>
                  <span class="help-block"><font color="red"><?php echo form_error('status');?></font></span>
                </div>
              </div>

              </fieldset>

              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>

            </form>
            </div>
          </div>
        </div>

        <!-- Modal View Report-->
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

        <!-- Footer with: Back to top -->
          <div class="row">
            <div class="col-lg-12">
              <ul class="list-unstyled">
              <li class="pull-right"><a href="#top">Back to top</a></li>
              <center><br><li>© Kia OPMS 2014</li></center>
              </ul>
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
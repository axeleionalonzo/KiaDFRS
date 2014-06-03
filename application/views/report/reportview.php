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
            <?php echo "
            <center><div class=\"alert alert-dismissable alert-warning\">
              <button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>
              <h4>Oops..</h4>
              <p>Looks like something went wrong with the <font color=\"red\">Creation of your Report</font>. Please try again and provide the Required Information.</p>
            </div></center>"; ?>
            <?php }?>

<?php echo form_open('report/update');?>
    <input type="hidden" name="report_id" value="<?php echo $report[0]->report_id?>">
    <fieldset>
        
        <div class="row clearfix">
          <div class="col-md-12 column">
            <h3 class="text-center">
              <center>KIA MOTORS ILIGAN<br></center>
            </h3>
              <center>GREENCARS MINDANAO CORPORATION<br>
                Tibanga Highway, Iligan City<br>
                Telefax No. (063) 221 - 0574</center>
          </div>
        </div>

        <div class="row clearfix">
          <div class="col-md-12 column">
            <h4 class="text-center">
              <center>REPORT</center>
            </h4>
          </div>
        </div>

        <table class="table table-bordered">
            <tbody>
            <td>

                <div class="row clearfix">
                  <div class="col-md-3 column">Customer:
                  </div>
                  <div class="col-md-3 column"><?php echo $report[0]->client;?>
                  </div>
                  <div class="col-md-3 column">Date:
                  </div>
                  <?php $date = date_create_from_format('Y-m-d', $report[0]->report_date);
                  ?>
                  <div class="col-md-3 column"><?php echo $date->format('F d, Y');?>
                  </div>
                </div>

                <div class="row clearfix">
                  <div class="col-md-3 column">Address:
                  </div>
                  <div class="col-md-3 column"><?php echo $report[0]->address;?>
                  </div>
                  <div class="col-md-3 column">Contact&nbspNo:
                  </div>
                  <div class="col-md-3 column"><?php echo $report[0]->contactno;?>
                  </div>
                </div>

                <br>

                <div class="row clearfix">
                  <div class="col-md-6 column">Model:
                  </div>
                  <div class="col-md-6 column"><?php echo $report[0]->model_name;?>
                  </div>
                </div>

                <br>

                <div class="row clearfix">
                  <div class="col-md-6 column">Term:
                  </div>
                  <div class="col-md-6 column"><?php echo $report[0]->term;?>
                  </div>
                </div>

                <div class="row clearfix">
                  <div class="col-md-6 column">Remarks:
                  </div>
                  <div class="col-md-6 column"><?php echo $report[0]->remarks;?>
                  </div>
                </div>

                <div class="row clearfix">
                  <div class="col-md-6 column">Status:
                  </div>
                  <div class="col-md-6 column">
                    <?php if (($report[0]->status)=='Car Released') { ?>
                          <big><font color="CornflowerBlue"><b><?php echo $report[0]->status;?></b></font></big>
                          <?php } else { ?>
                          <font color="red"><b><?php echo $report[0]->status;?></b></font>
                          <?php }?>
                  </div>
                </div>

                <br><br>

                <table class="table table-bordered">
                    <tbody>
                        <td>

                          <div class="row clearfix">
                            <div class="col-md-12 column"><center>Prepared by: <?php echo $report[0]->sales_consultant;?></center>
                            </div>
                          </div>

                        </td>
                    </tbody>
                </table>

            </td>
            </tbody>
        </table>

    </fieldset>

    <div class="modal-footer">
      <?php if (($query[0]['username'])==($report[0]->sales_consultant)) { ?>
      <?php $id = $report[0]->report_id;?>
      <a href="<?php echo base_url();?>index.php/report/viewQuotation/<?php echo $id;?>" type="button" class="btn btn-info">Quotation</a>
      <a style="float: left;" href="<?php echo base_url();?>index.php/report/delete/<?php echo $id;?>" type="button" class="btn btn-primary" onclick="return confirm('Are you sure to Delete this Report?')">Delete</a>
      <a href="<?php echo base_url();?>index.php/report/edit/<?php echo $id;?>" type="button" class="btn btn-success" data-toggle="modal" data-target="#myModaledit">Edit Report</a>
      <a href="<?php echo base_url();?>index.php/report/" type="button" class="btn btn-default">Back</a>
      <?php } elseif (($query[0]['username'])==('Administrator')) {?>
      <?php $id = $report[0]->report_id;?>
      <a href="<?php echo base_url();?>index.php/report/viewQuotation/<?php echo $id;?>" type="button" class="btn btn-info">Quotation</a>
      <a style="float: left;" href="<?php echo base_url();?>index.php/report/delete/<?php echo $id;?>" type="button" class="btn btn-primary" onclick="return confirm('Are you sure to Delete this Report?')">Delete</a>
      <a href="<?php echo base_url();?>index.php/report/edit/<?php echo $id;?>" type="button" class="btn btn-success" data-toggle="modal" data-target="#myModaledit">Edit Report</a>
      <a href="<?php echo base_url();?>index.php/report/" type="button" class="btn btn-default">Back</a>
      <?php } elseif (($query[0]['username'])==('Axel Eion')) {?>
      <?php $id = $report[0]->report_id;?>
      <a href="<?php echo base_url();?>index.php/report/viewQuotation/<?php echo $id;?>" type="button" class="btn btn-info">Quotation</a>
      <a style="float: left;" href="<?php echo base_url();?>index.php/report/delete/<?php echo $id;?>" type="button" class="btn btn-primary" onclick="return confirm('Are you sure to Delete this Report?')">Delete</a>
      <a href="<?php echo base_url();?>index.php/report/edit/<?php echo $id;?>" type="button" class="btn btn-success" data-toggle="modal" data-target="#myModaledit">Edit Report</a>
      <a href="<?php echo base_url();?>index.php/report/" type="button" class="btn btn-default">Back</a>
      <?php } else {?>
      <?php $id = $report[0]->report_id;?>
      <a href="<?php echo base_url();?>index.php/report/viewQuotation/<?php echo $id;?>" type="button" class="btn btn-info">Quotation</a>
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
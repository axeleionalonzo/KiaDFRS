<!DOCTYPE html>
<?php
session_start();
$username = $this->session->userdata('username');
$is_logged_in = $this->session->userdata('is_logged_in');
?>
<html lang="en">
<head>
      <meta charset="utf-8">
    <title>Quotation</title>
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
      <link href="<?php echo base_url();?>css/bootstrap.css" media="screen" rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url();?>css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">

    <script>
    printDivCSS = new String ('<link href="<?php echo base_url();?>css/print.css" media="print" rel="stylesheet" type="text/css">')
    function printDiv(divId) {
        window.frames["print_frame"].document.body.innerHTML=printDivCSS + document.getElementById(divId).innerHTML;
        window.frames["print_frame"].window.focus();
        window.frames["print_frame"].window.print();
    }
    </script>

</head>
<body>

<div class="container">
<div id="div1">
    <input type="hidden" name="quotation_id" value="<?php echo $quotation[0]->quotation_id?>">
    <div class="row clearfix">
      <div class="col-md-12 column">
        <h3 class="text-center">
          KIA MOTORS ILIGAN
        </h3>
      </div>
    </div>

    <div class="row clearfix">
      <div class="col-md-12 column">
        <h4 class="text-center">
          QUOTATION
        </h4>
      </div>
    </div>

    <div class="row clearfix">
    <div class="col-md-12 column">
    <div class="panel panel-default">
        <div class="panel-body">
        <div class="row clearfix">
        <div class="col-md-8 column">
        <p>
        <center><label class="col-lg-3 control-label">Customer:</label><?php echo $quotation[0]->client;?></center>
        </p>
        <p>
        <center><label class="col-lg-3 control-label">Address:</label><?php echo $quotation[0]->address;?></center>
        </p>
        </div>
        <div class="col-md-4 column">
        <p>
        <center><label class="col-lg-3 control-label">Date:</label><?php echo $quotation[0]->quotation_date;?></center>
        </p>
        <p>
        <center><label class="col-lg-3 control-label">Contact&nbspNo:</label><?php echo $quotation[0]->contactno;?></center>
        </p>
        </div>
        </div>
        <div class="row clearfix">
        <div class="col-md-6 column">
        <p>
        <center><label class="col-lg-3 control-label">Model:</label>
        </p>
        </div>
        <div class="col-md-6 column">
        <?php echo $quotation[0]->model;?></center>
        </div>
        </div>
        <div class="row clearfix">
        <div class="col-md-6 column">
        <p>
        <center><label class="col-lg-3 control-label">Unit&nbspPrice:</label>
        </p>
        </div>
        <div class="col-md-6 column">
        <?php echo $quotation[0]->unit_price;?></center>
        </div>
        </div>
        <div class="row clearfix">
        <div class="col-md-6 column">
        <p>
        <center><label class="col-lg-3 control-label">Amount&nbspFinanced:</label>
        </p>
        </div>
        <div class="col-md-6 column">
        <?php echo $quotation[0]->amount_financed;?></center>
        </div>
        </div>
        <div class="row clearfix">
        <div class="col-md-6 column">
        <p>
        <center><label class="col-lg-3 control-label">Down&nbspPayment:</label>
        </p>
        </div>
        <div class="col-md-6 column">
        <?php echo $quotation[0]->down_payment;?></center>
        </div>
        </div>
        <div class="row clearfix">
        <div class="col-md-6 column">
        <p>
        <center><label class="col-lg-3 control-label">Freight&nbspand&nbspHandling:</label>
        </p>
        </div>
        <div class="col-md-6 column">
        <?php echo $quotation[0]->freight_and_handling;?></center>
        </div>
        </div>
        <div class="row clearfix">
        <div class="col-md-6 column">
        <p>
        <center><label class="col-lg-3 control-label">Comprehensive,&nbspInsurance:</label>
        </p>
        </div>
        <div class="col-md-6 column">
        <?php echo $quotation[0]->comprehensive_insurance;?></center>
        </div>
        </div>
        <div class="row clearfix">
        <div class="col-md-6 column">
        <p>
        <center><label class="col-lg-3 control-label">LTO&nbspRegistration:</label>
        </p>
        </div>
        <div class="col-md-6 column">
        <?php echo $quotation[0]->lto_registration;?></center>
        </div>
        </div>
        <div class="row clearfix">
        <div class="col-md-6 column">
        <p>
        <center><label class="col-lg-3 control-label">Chattel&nbspMotgage&nbspFee:</label>
        </p>
        </div>
        <div class="col-md-6 column">
        <?php echo $quotation[0]->chattel_mortgage_fee;?></center>
        </div>
        </div>
        <div class="row clearfix">
        <div class="col-md-6 column">
        <p>
        <center><label class="col-lg-3 control-label">Other&nbspServices:</label>
        </p>
        </div>
        <div class="col-md-6 column">
        <?php echo $quotation[0]->other_services;?></center>
        </div>
        </div>
        <div class="row clearfix">
        <?php
        $total = $quotation[0]->down_payment + $quotation[0]->freight_and_handling + $quotation[0]->comprehensive_insurance + $quotation[0]->lto_registration + $quotation[0]->chattel_mortgage_fee;
        ?>
        <div class="col-md-6 column">
        <p>
        <center><label class="col-lg-3 control-label">Total&nbspCash&nbspOutlay:</label>
        </p>
        </div>
        <div class="col-md-6 column">
        <?php echo $total;?></center>
        </div>
        </div>
        <div class="row clearfix">
        <div class="col-md-6 column">
        <p>
        <center><label class="col-lg-3 control-label">Monthly&nbspRate:</label>
        </p>
        </div>
        <div class="col-md-6 column">
        <?php echo $quotation[0]->monthly_rate;?>
        <?php
            if ($quotation[0]->amount_financed >0) {
              echo "% ";
            } else {
              echo "";
            }
          ?>
        </center>
        </div>
        </div>
        <div class="row clearfix">
        <div class="col-md-6 column">
        <p>
        <center><label class="col-lg-3 control-label">Monthly&nbspInstallment:</label>
        </p>
        </div>
        <?php
          if ($quotation[0]->amount_financed >0) {
            $installment = ($quotation[0]->amount_financed * $quotation[0]->monthly_rate) / $quotation[0]->monthly_installment;
          } else {
            $installment = 0;
          }
        ?>
        <div class="col-md-6 column">
        <?php echo round($installment,2);?>
        <?php
          if ($quotation[0]->amount_financed >0) {
            echo " per month for ";
          } else {
            echo "";
          }
        ?><?php echo $quotation[0]->monthly_installment;?></center>
        </div>
        </div>
        </div>

        <div class="panel-footer">
        <div class="row clearfix">
        <div class="col-md-9 column">
        <p>
        <center><label class="col-lg-3 control-label">Prepared By:</label> <?php echo $report[0]->sales_consultant;?></center>
        </p>
        </div>
        <div class="col-md-3 column">
        </div>
        </div>
    </div>
    </div>
    </div>
</div>
</div>

<div class="row clearfix">
<div class="modal-footer">
<a type="button" class="btn btn-primary" href="javascript:printDiv('div1')">Print</a>
<iframe name="print_frame" width="0" height="0" frameborder="0" src="about:blank"></iframe>


<?php if (($query[0]['username'])==($report[0]->sales_consultant)) { ?>
<?php $id = $report[0]->report_id;?>
<a href="<?php echo base_url();?>index.php/report/editQuotation/<?php echo $id;?>" type="button" class="btn btn-info" data-toggle="modal" data-target="#myModaleditQuotation">Edit Quotation</a>
<a href="<?php echo base_url();?>index.php/report/" type="button" class="btn btn-default">Back</a>
<?php } elseif (($query[0]['username'])==('Administrator')) {?>
<?php $id = $report[0]->report_id;?>
<a href="<?php echo base_url();?>index.php/report/editQuotation/<?php echo $id;?>" type="button" class="btn btn-info" data-toggle="modal" data-target="#myModaleditQuotation">Edit Quotation</a>
<a href="<?php echo base_url();?>index.php/report/" type="button" class="btn btn-default">Back</a>
<?php } elseif (($query[0]['username'])==('Axel Eion')) {?>
<?php $id = $report[0]->report_id;?>
<a href="<?php echo base_url();?>index.php/report/editQuotation/<?php echo $id;?>" type="button" class="btn btn-info" data-toggle="modal" data-target="#myModaleditQuotation">Edit Quotation</a>
<a href="<?php echo base_url();?>index.php/report/" type="button" class="btn btn-default">Back</a>
<?php } else {?>
<?php $id = $report[0]->report_id;?>
<a href="<?php echo base_url();?>index.php/report/" type="button" class="btn btn-default">Back</a>
<?php } ?>
</div>
</div>
</div>

<!-- Modal Edit Quotation -->
<div data-focus-on="input:first" class="modal fade" id="myModaleditQuotation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
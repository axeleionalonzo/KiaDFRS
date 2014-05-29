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
    printDivCSS = new String ('<link href="<?php echo base_url();?>css/print.css" media="all" rel="stylesheet" type="text/css" />')
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
          <center>QUOTATION</center>
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
        <strong>Customer: </strong> <?php echo $quotation[0]->client;?>
        </p>
        <p>
        <strong>Address: </strong> <?php echo $quotation[0]->address;?>
        </p>
        </div>
        <div class="col-md-4 column">
        <p>
        <strong>Date: </strong><?php echo $quotation[0]->quotation_date;?>
        </p>
        <p>
        <strong>Contact&nbspNo: </strong> <?php echo $quotation[0]->contactno;?>
        </p>
        </div>
        </div>
        <div class="row clearfix">
        <div class="col-md-12 column">
        <p>
        <strong>Model: </strong> <?php echo $quotation[0]->model;?>
        </p>
        </div>
        </div>
        <div class="row clearfix">
        <div class="col-md-12 column">
        <?php
            for ($i=0; $i<count($models);$i++) { 
                if ($quotation[0]->model==$models[$i]->name) {
                    $price=$models[$i]->price;
                }
            }
        ?>
        <p>
        <strong>Unit&nbspPrice: </strong> <?php echo $price;?>
        </p>
        </div>
        </div>
        <div class="row clearfix">
        <div class="col-md-12 column">
        <p>
        <strong>Amount&nbspFinanced: </strong> <?php echo $quotation[0]->amount_financed;?>
        </p>
        </div>
        </div>
        <div class="row clearfix">
        <div class="col-md-12 column">
        <p>
        <strong>Down&nbspPayment: </strong> <?php echo $quotation[0]->down_payment;?>
        </p>
        </div>
        </div>
        <div class="row clearfix">
        <div class="col-md-12 column">
        <p>
        <strong>Freight&nbspand&nbspHandling: </strong> <?php echo $quotation[0]->freight_and_handling;?>
        </p>
        </div>
        </div>
        <div class="row clearfix">
        <div class="col-md-12 column">
        <p>
        <strong>Comprehensive,&nbspInsurance: </strong> <?php echo $quotation[0]->comprehensive_insurance;?>
        </p>
        </div>
        </div>
        <div class="row clearfix">
        <div class="col-md-12 column">
        <p>
        <strong>LTO&nbspRegistration: </strong> <?php echo $quotation[0]->lto_registration;?>
        </p>
        </div>
        </div>
        <div class="row clearfix">
        <div class="col-md-12 column">
        <p>
        <strong>Chattel&nbspMotgage&nbspFee: </strong> <?php echo $quotation[0]->chattel_mortgage_fee;?>
        </p>
        </div>
        </div>
        <div class="row clearfix">
        <div class="col-md-12 column">
        <p>
        <strong>Other&nbspServices: </strong> <?php echo $quotation[0]->other_services;?>
        </p>
        </div>
        </div>
        <div class="row clearfix">
        <?php
        $total = $quotation[0]->down_payment + $quotation[0]->freight_and_handling + $quotation[0]->comprehensive_insurance + $quotation[0]->lto_registration + $quotation[0]->chattel_mortgage_fee;
        ?>
        <div class="col-md-12 column">
        <p>
        <strong>Total&nbspCash&nbspOutlay: </strong> <?php echo $total;?>
        </p>
        </div>
        </div>
        <div class="row clearfix">
        <div class="col-md-12 column">
        <p>
        <strong>Monthly&nbspRate: </strong> <?php echo $quotation[0]->monthly_rate;?>
        <?php
            if ($quotation[0]->amount_financed >0) {
              echo "% ";
            } else {
              echo "";
            }
          ?>
        </p>
        </div>
        </div>
        <div class="row clearfix">
        <div class="col-md-12 column">
        <p>
        <strong>Monthly&nbspInstallment: </strong> 
        <?php
          if ($quotation[0]->amount_financed >0) {
            $installment = ($quotation[0]->amount_financed * $quotation[0]->monthly_rate) / $quotation[0]->monthly_installment;
          } else {
            $installment = 0;
          }
        ?>
        <?php echo round($installment,2);?>
        <?php
          if ($quotation[0]->amount_financed >0) {
            echo " per month for ";
          } else {
            echo "";
          }
        ?><?php echo $quotation[0]->monthly_installment;?>
        </p>
        </div>
        </div>

        </div>

        <div class="panel-footer">
        <div class="row clearfix">
        <div class="col-md-4 column">
        </div>
        <div class="col-md-4 column">
        <p>
        <strong><center>Prepared By: </strong>  <?php echo $report[0]->sales_consultant;?></center>
        </p>
        </div>
        <div class="col-md-4 column">
        </div>
        </div>
    </div>
    </div>
    </div>
</div>
</div>

<div class="row clearfix">
<div class="modal-footer">
<a type="button" class="btn btn-primary" href="javascript: printDiv('div1')">Print</a>
<iframe name="print_frame" width="0" height="0" frameborder="0" src="about: blank"></iframe>


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
<div data-focus-on="input: </strong>first" class="modal fade" id="myModaleditQuotation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
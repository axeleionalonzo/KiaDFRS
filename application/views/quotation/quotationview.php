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
        printDivCSS = new String ('<link href="<?php echo base_url();?>css/print.css" media="print" rel="stylesheet" type="text/css" />')
        function printDiv(divId) {
            window.frames["print_frame"].document.body.innerHTML=printDivCSS + document.getElementById(divId).innerHTML;
            window.frames["print_frame"].window.focus();
            window.frames["print_frame"].window.print();
        }
    </script>
    
</head>
    <body>

    <input type="hidden" name="quotation_id" value="<?php echo $quotation[0]->quotation_id?>">
    <div class="container">
    
    <div id="div1">
        <img align="middle" src="<?php echo base_url();?>img/header.JPG" >

        <div class="panel panel-default">
            <div class="panel-body">

                <table class="table">
                    <tbody>
                        <td>
                            Customer:<br>
                            Date:
                        </td>
                        <td>
                            <?php echo $quotation[0]->client;?><br>
                            <?php echo $quotation[0]->quotation_date;?>
                        </td>
                        <td>
                            Address:<br>
                            Contact&nbspNo:
                        </td>
                        <td>
                            <?php echo $quotation[0]->address;?><br>
                            <?php echo $quotation[0]->contactno;?>
                        </td>
                    </tbody>
                </table>

                &nbspModel: <?php echo $quotation[0]->model;?><br><br>

                <?php
                    for ($i=0; $i<count($models);$i++) { 
                        if ($quotation[0]->model==$models[$i]->name) {
                            $price=$models[$i]->price;
                        }
                    }
                ?>

                &nbspUnit&nbspPrice: ₱ <?php echo number_format($price, 2);?><br>
                &nbspAmount&nbspFinanced: ₱ <?php echo number_format($quotation[0]->amount_financed, 2);?><br>
                &nbspDown&nbspPayment: ₱ <?php echo number_format($quotation[0]->down_payment, 2);?><br>
                &nbspFreight&nbspand&nbspHandling: ₱ <?php echo number_format($quotation[0]->freight_and_handling, 2);?><br>
                &nbspComprehensive,&nbspInsurance: ₱ <?php echo number_format($quotation[0]->comprehensive_insurance, 2);?><br>
                &nbspLTO&nbspRegistration: ₱ <?php echo number_format($quotation[0]->lto_registration, 2);?><br>
                &nbspChattel&nbspMotgage&nbspFee: ₱ <?php echo number_format($quotation[0]->chattel_mortgage_fee, 2);?><br>
                &nbspOther&nbspServices: <?php echo $quotation[0]->other_services;?><br>

                <?php
                $total = $quotation[0]->down_payment + $quotation[0]->freight_and_handling + $quotation[0]->comprehensive_insurance + $quotation[0]->lto_registration + $quotation[0]->chattel_mortgage_fee;
                ?>

                &nbspTotal&nbspCash&nbspOutlay: ₱ <?php echo number_format($total, 2);?><br><br>
                &nbspMonthly&nbspRate: <?php echo $quotation[0]->monthly_rate;?>
                <?php
                    if ($quotation[0]->amount_financed >0) {
                      echo "% ";
                    } else {
                      echo "";
                    }
                  ?><br>

                &nbspMonthly&nbspInstallment: 
                <?php
                  if ($quotation[0]->amount_financed >0) {
                    $installment = ($quotation[0]->amount_financed * $quotation[0]->monthly_rate) / $quotation[0]->monthly_installment;
                  } else {
                    $installment = 0;
                  }
                ?>
                ₱ <?php echo number_format($installment, 2);?>
                <?php
                  if ($quotation[0]->amount_financed >0) {
                    echo " for ";
                  } else {
                    echo "";
                  }
                ?><?php echo $quotation[0]->monthly_installment;?><br>

                <br>
                &nbspNote: <small>Prices are subject to change without prior notice and shall be based on the prevailing selling price at the time of delivery.</small>
                <table class="table table-bordered">
                    <tbody>
                        <td>Prepared by: <?php echo $report[0]->sales_consultant;?>
                        </td>
                        <td>Approved by: 
                        </td>
                        <td>Conformed: 
                        </td>
                    </tbody>
                </table>
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
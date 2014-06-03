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

    <style>
    img 
    {
    float:left;
    }
    </style>
    
</head>
    <body>

    <input type="hidden" name="quotation_id" value="<?php echo $quotation[0]->quotation_id;?>">
    <div class="container">
    
    <?php if (form_error('monthly_rate') || form_error('monthly_installment') || form_error('down_payment') || form_error('amount_financed') || form_error('unit_price') || form_error('model') || form_error('contactno') || form_error('address') || form_error('quotation_date')) { ?>
       <?php echo "<br>
       <center><div class=\"alert alert-dismissable alert-warning\">
       <button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>
       <h4>Oops..</h4>
       <p>Looks like something went wrong with your <font color=\"red\">Quotation Details</font>. Please try again and provide the Required Information.</p>
       </div></center>"; ?>
     <?php }?>

    <div id="div1">
      <div>
        <img src="<?php echo base_url();?>img/Header.PNG" >
        <br><br>
      </div>
        <table class="table table-bordered">
            <tbody>
            <td>

                <table style="width:100%">
                    <tr>
                      <td>Customer:</td>
                      <td><?php echo $quotation[0]->client;?></td>        
                      <td>Date: </td>
                      <td><?php echo $quotation[0]->quotation_date;?></td>
                    </tr>
                    <tr>
                      <td>Address:</td>
                      <td><?php echo $quotation[0]->address;?></td>      
                      <td>Contact&nbspNo:</td>
                      <td><?php echo $quotation[0]->contactno;?></td>
                    </tr>
                </table>

                <?php
                    for ($i=0; $i<count($models);$i++) { 
                        if ($quotation[0]->model==$models[$i]->name) {
                            $price=$models[$i]->price;
                        }
                    }
                ?>

                <table style="width:100%">
                    <tr>
                      <td><br></td>
                      <td><br></td>
                    </tr>
                    <tr>
                      <td>Model:</td>
                      <td><?php echo $quotation[0]->model;?></td>
                    </tr>
                    <tr>
                      <td><br></td>
                      <td><br></td>
                    </tr>
                    <tr>
                      <td>Unit&nbspPrice:</td>
                      <td>
                        <?php
                          if (is_numeric($price)) { ?>
                          ₱ <?php echo number_format($price, 2);
                          } else {
                           echo "---";
                          }
                          ?>
                      </td>
                    </tr>
                    <tr>
                      <td>Amount&nbspFinanced:</td>
                      <td>
                        <?php
                          if (is_numeric($quotation[0]->amount_financed)) { ?>
                          ₱ <?php echo number_format($quotation[0]->amount_financed, 2);
                          } else {
                           echo "---";
                          }
                          ?>
                      </td>
                    </tr>
                    <tr>
                      <td>Down&nbspPayment:</td>
                      <td>
                        <?php
                          if (is_numeric($quotation[0]->down_payment)) { ?>
                          ₱ <?php echo number_format($quotation[0]->down_payment, 2);
                          } else {
                           echo "---";
                          }
                          ?>
                      </td>
                    </tr>
                    <tr>
                      <td>Freight&nbspand&nbspHandling:</td>
                      <td><?php echo $quotation[0]->freight_and_handling;?>
                      </td>
                    </tr>
                    <tr>
                      <td>Comprehensive,&nbspInsurance:</td>
                      <td>
                          <?php
                          if (is_numeric($quotation[0]->comprehensive_insurance)) { ?>
                          ₱ <?php echo number_format($quotation[0]->comprehensive_insurance, 2);
                          } else {
                           echo "---";
                          }
                          ?>
                      </td>
                    </tr>
                    <tr>
                      <td>LTO&nbspRegistration:</td>
                      <td>
                          <?php
                          if (is_numeric($quotation[0]->lto_registration)) { ?>
                          ₱ <?php echo number_format($quotation[0]->lto_registration, 2);
                          } else {
                           echo "---";
                          }
                          ?>
                      </td>
                    </tr>
                    <tr>
                      <td>Chattel&nbspMotgage&nbspFee:</td>
                      <td>
                          <?php
                          if (is_numeric($quotation[0]->chattel_mortgage_fee)) { ?>
                          ₱ <?php echo number_format($quotation[0]->chattel_mortgage_fee, 2);
                          } else {
                           echo "---";
                          }
                          ?>
                      </td>
                    </tr>
                    <tr>
                      <td>Other&nbspServices:</td>
                      <td><?php echo $quotation[0]->other_services;?></td>
                    </tr>
                    <tr>
                      <td>Discount</td>
                      <td>
                          <?php
                          if (is_numeric($quotation[0]->discount)) { ?>
                          ₱ <?php echo number_format($quotation[0]->discount, 2);
                          } else {
                           echo "---";
                          }
                          ?>
                      </td>
                    </tr>
                    <tr>
                      <td><br></td>
                      <td><br></td>
                    </tr>
                    

                    <?php
                    $total = ($quotation[0]->down_payment + $quotation[0]->freight_and_handling + $quotation[0]->comprehensive_insurance + $quotation[0]->lto_registration + $quotation[0]->chattel_mortgage_fee) - $quotation[0]->discount;
                    ?>
                    
                    <tr>
                      <td>Total&nbspCash&nbspOutlay:</td>
                      <td>₱ <?php echo number_format($total, 2);?></td>
                    </tr>
                    <tr>
                      <td><br></td>
                      <td><br></td>
                    </tr>
                    <tr>
                      <td>Bank&nbspRate:</td>
                      <td>
                      <?php
                          if (is_numeric($quotation[0]->monthly_rate)) { ?>
                          <?php echo number_format($quotation[0]->monthly_rate, 4);
                            if ($quotation[0]->amount_financed >0) {
                                  echo "% ";
                                } else {
                                  echo "";
                                }
                          } else {
                           echo "---";
                          }
                      ?>  
                      </td>
                    </tr>
                    <tr>
                      <td>Monthly&nbspInstallment:</td>
                      <td>
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
                        ?><?php echo $quotation[0]->monthly_installment;?>
                        </td>
                    </tr>
                </table>

                <br>

                Note: <small>Prices are subject to change without prior notice and shall be based on the prevailing selling price at the time of delivery.</small>
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
            
            </td>
            </tbody>
        </table>

    </div>

        <div class="row clearfix">
            <div class="modal-footer">
              
                <a type="button" class="btn btn-danger" href="javascript: printDiv('div1')">Print</a>
                <iframe name="print_frame" width="0" height="0" frameborder="0" src="about: blank"></iframe>

            <?php if (($query[0]['username'])==($report[0]->sales_consultant)) { ?>
                <?php $id = $report[0]->report_id;?>
                <a href="<?php echo base_url();?>index.php/report/editQuotation/<?php echo $id;?>" type="button" class="btn btn-info" data-toggle="modal" data-target="#myModaleditQuotation">Make Quotation</a>
                <a href="<?php echo base_url();?>index.php/report/view/<?php echo $id;?>" type="button" class="btn btn-default">Back</a>
            <?php } elseif (($query[0]['username'])==('Administrator')) {?>
                <?php $id = $report[0]->report_id;?>
                <a href="<?php echo base_url();?>index.php/report/editQuotation/<?php echo $id;?>" type="button" class="btn btn-info" data-toggle="modal" data-target="#myModaleditQuotation">Make Quotation</a>
                <a href="<?php echo base_url();?>index.php/report/view/<?php echo $id;?>" type="button" class="btn btn-default">Back</a>
            <?php } elseif (($query[0]['username'])==('Axel Eion')) {?>
                <?php $id = $report[0]->report_id;?>
                <a href="<?php echo base_url();?>index.php/report/editQuotation/<?php echo $id;?>" type="button" class="btn btn-info" data-toggle="modal" data-target="#myModaleditQuotation">Make Quotation</a>
                <a href="<?php echo base_url();?>index.php/report/view/<?php echo $id;?>" type="button" class="btn btn-default">Back</a>
            <?php } else {?>
                <?php $id = $report[0]->report_id;?>
                <a href="<?php echo base_url();?>index.php/report/view/<?php echo $id;?>" type="button" class="btn btn-default">Back</a>
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
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

    <script>
        printDivCSS = new String ('<link href="<?php echo base_url();?>css/print.css" media="all" rel="stylesheet" type="text/css" />')
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
                <div class="row clearfix">
                  <div class="col-md-12 column">
                    <div class="row clearfix">
                      <div class="col-xs-1 column">Customer:
                      </div>
                      <div style="border-bottom: 1px solid #E0E0E0;" class="col-xs-3 column"><?php echo $quotation[0]->client;?>
                      </div>
                      <div class="col-xs-2 column">
                      </div><?php $date = date_create_from_format('Y-m-d', $quotation[0]->quotation_date);
                      ?>
                      <div class="col-xs-1 column">Date: 
                      </div>
                      <div style="border-bottom: 1px solid #E0E0E0;" class="col-xs-3 column"><?php echo $date->format('F d, Y');?>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row clearfix">
                  <div class="col-md-12 column">
                    <div class="row clearfix">
                      <div class="col-xs-1 column">Address:
                      </div>
                      <div style="border-bottom: 1px solid #E0E0E0;" class="col-xs-3 column"><?php echo $quotation[0]->address;?>
                      </div>
                      <div class="col-xs-2 column">
                      </div><?php $date = date_create_from_format('Y-m-d', $quotation[0]->quotation_date);
                      ?>
                      <div class="col-xs-1 column">Contact&nbspNo:
                      </div>
                      <div style="border-bottom: 1px solid #E0E0E0;" class="col-xs-3 column"><?php echo $quotation[0]->contactno;?>
                      </div>
                    </div>
                  </div>
                </div>

                <?php
                    for ($i=0; $i<count($models);$i++) { 
                        if ($quotation[0]->model==$models[$i]->name) {
                            $price=$models[$i]->price;
                        }
                    }
                ?>

                <br>

                <div class="row clearfix">
                  <div class="col-md-12 column">
                    <div class="row clearfix">
                      <div class="col-xs-2 column">Model:
                      </div>
                      <div style="border-bottom: 1px solid #E0E0E0;" class="col-xs-3 column">&nbsp
                      </div>
                      <div style="border-bottom: 1px solid #E0E0E0;" class="col-xs-4 column"><?php echo $quotation[0]->model;?>
                      </div>
                      <div style="border-bottom: 1px solid #E0E0E0;" class="col-xs-1 column">&nbsp
                      </div>
                      <div class="col-xs-4 column">
                      </div>
                    </div>
                  </div>
                </div>

                <br>

                <div class="row clearfix">
                  <div class="col-md-12 column">
                    <div class="row clearfix">
                      <div class="col-xs-2 column">Unit&nbspPrice:
                      </div>
                      <div style="border-bottom: 1px solid #E0E0E0;" class="col-xs-3 column">&nbsp
                      </div>
                      <div style="border-bottom: 1px solid #E0E0E0;" class="col-xs-4 column">
                        <?php
                          if (is_numeric($price)) { ?>
                          ₱ <?php echo number_format($price, 2);
                          } else {
                           echo "---";
                          }
                          ?>
                      </div>
                      <div style="border-bottom: 1px solid #E0E0E0;" class="col-xs-1 column">&nbsp
                      </div>
                      <div class="col-xs-4 column">
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row clearfix">
                  <div class="col-md-12 column">
                    <div class="row clearfix">
                      <div class="col-xs-2 column">Amount&nbspFinanced:
                      </div>
                      <div style="border-bottom: 1px solid #E0E0E0;" class="col-xs-3 column">&nbsp
                      </div>
                      <div style="border-bottom: 1px solid #E0E0E0;" class="col-xs-4 column">
                        <?php
                          if (is_numeric($quotation[0]->amount_financed)) { ?>
                          ₱ <?php echo number_format($quotation[0]->amount_financed, 2);
                          } else {
                           echo "---";
                          }
                          ?>
                      </div>
                      <div style="border-bottom: 1px solid #E0E0E0;" class="col-xs-1 column">&nbsp
                      </div>
                      <div class="col-xs-4 column">
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row clearfix">
                  <div class="col-md-12 column">
                    <div class="row clearfix">
                      <div class="col-xs-2 column">Down&nbspPayment:
                      </div>
                      <div style="border-bottom: 1px solid #E0E0E0;" class="col-xs-3 column">&nbsp
                      </div>
                      <div style="border-bottom: 1px solid #E0E0E0;" class="col-xs-4 column">
                        <?php
                          if (is_numeric($quotation[0]->down_payment)) { ?>
                          ₱ <?php echo number_format($quotation[0]->down_payment, 2);
                          } else {
                           echo "---";
                          }
                          ?>
                      </div>
                      <div style="border-bottom: 1px solid #E0E0E0;" class="col-xs-1 column">&nbsp
                      </div>
                      <div class="col-xs-4 column">
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row clearfix">
                  <div class="col-md-12 column">
                    <div class="row clearfix">
                      <div class="col-xs-12 column">Other Charges:
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row clearfix">
                  <div class="col-md-12 column">
                    <div class="row clearfix">
                      <div class="col-xs-2 column">&nbsp&nbspFreight&nbspand&nbspHandling:
                      </div>
                      <div style="border-bottom: 1px solid #E0E0E0;" class="col-xs-3 column">&nbsp
                      </div>
                      <div style="border-bottom: 1px solid #E0E0E0;" class="col-xs-4 column">
                        <?php if ($quotation[0]->freight_and_handling==NULL) {
                            echo "&nbsp";
                          } else {
                            echo $quotation[0]->freight_and_handling;
                          } ?>
                      </div>
                      <div style="border-bottom: 1px solid #E0E0E0;" class="col-xs-1 column">&nbsp
                      </div>
                      <div class="col-xs-4 column">
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row clearfix">
                  <div class="col-md-12 column">
                    <div class="row clearfix">
                      <div class="col-xs-2 column">&nbsp&nbspComprehensive,&nbspInsurance:
                      </div>
                      <div style="border-bottom: 1px solid #E0E0E0;" class="col-xs-3 column">&nbsp
                      </div>
                      <div style="border-bottom: 1px solid #E0E0E0;" class="col-xs-4 column">
                        <?php
                          if (is_numeric($quotation[0]->comprehensive_insurance)) { ?>
                          ₱ <?php echo number_format($quotation[0]->comprehensive_insurance, 2);
                          } else {
                           echo "---";
                          }
                          ?>
                      </div>
                      <div style="border-bottom: 1px solid #E0E0E0;" class="col-xs-1 column">&nbsp
                      </div>
                      <div class="col-xs-4 column">
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row clearfix">
                  <div class="col-md-12 column">
                    <div class="row clearfix">
                      <div class="col-xs-2 column">&nbsp&nbspLTO&nbspRegistration:
                      </div>
                      <div style="border-bottom: 1px solid #E0E0E0;" class="col-xs-3 column">&nbsp
                      </div>
                      <div style="border-bottom: 1px solid #E0E0E0;" class="col-xs-4 column">
                        <?php
                          if (is_numeric($quotation[0]->lto_registration)) { ?>
                          ₱ <?php echo number_format($quotation[0]->lto_registration, 2);
                          } else {
                           echo "---";
                          }
                          ?>
                      </div>
                      <div style="border-bottom: 1px solid #E0E0E0;" class="col-xs-1 column">&nbsp
                      </div>
                      <div class="col-xs-4 column">
                      </div>
                    </div>
                  </div>
                </div>


                <div class="row clearfix">
                  <div class="col-md-12 column">
                    <div class="row clearfix">
                      <div class="col-xs-2 column">&nbsp&nbspChattel&nbspMotgage&nbspFee:
                      </div>
                      <div style="border-bottom: 1px solid #E0E0E0;" class="col-xs-3 column">&nbsp
                      </div>
                      <div style="border-bottom: 1px solid #E0E0E0;" class="col-xs-4 column">
                        <?php
                          if (is_numeric($quotation[0]->chattel_mortgage_fee)) { ?>
                          ₱ <?php echo number_format($quotation[0]->chattel_mortgage_fee, 2);
                          } else {
                           echo "---";
                          }
                          ?>
                      </div>
                      <div style="border-bottom: 1px solid #E0E0E0;" class="col-xs-1 column">&nbsp
                      </div>
                      <div class="col-xs-4 column">
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row clearfix">
                  <div class="col-md-12 column">
                    <div class="row clearfix">
                      <div class="col-xs-2 column">Other&nbspServices:
                      </div>
                      <div style="border-bottom: 1px solid #E0E0E0;" class="col-xs-2 column">&nbsp
                      </div>
                      <div style="border-bottom: 1px solid #E0E0E0;" class="col-xs-5 column">
                        <?php if ($quotation[0]->other_services==NULL) {
                            echo "&nbsp";
                          } else {
                            echo $quotation[0]->other_services;
                          } ?>
                      </div>
                      <div style="border-bottom: 1px solid #E0E0E0;" class="col-xs-1 column">&nbsp
                      </div>
                      <div class="col-xs-4 column">
                      </div>
                    </div>
                  </div>
                </div>

                <br>

                <div class="row clearfix">
                  <div class="col-md-12 column">
                    <div class="row clearfix">
                      <div class="col-xs-2 column">Discount:
                      </div>
                      <div style="border-bottom: 1px solid #E0E0E0;" class="col-xs-3 column">&nbsp
                      </div>
                      <div style="border-bottom: 1px solid #E0E0E0;" class="col-xs-4 column">
                        <?php
                          if (is_numeric($quotation[0]->discount)) { ?>
                          ₱ <?php echo number_format($quotation[0]->discount, 2);
                          } else {
                           echo "---";
                          }
                          ?>
                      </div>
                      <div style="border-bottom: 1px solid #E0E0E0;" class="col-xs-1 column">&nbsp
                      </div>
                      <div class="col-xs-4 column">
                      </div>
                    </div>
                  </div>
                </div>

                <?php
                  $total = ($quotation[0]->down_payment + $quotation[0]->freight_and_handling + $quotation[0]->comprehensive_insurance + $quotation[0]->lto_registration + $quotation[0]->chattel_mortgage_fee) - $quotation[0]->discount;
                  ?>

                <div class="row clearfix">
                  <div class="col-md-12 column">
                    <div class="row clearfix">
                      <div class="col-xs-2 column">Total&nbspCash&nbspOutlay:
                      </div>
                      <div style="border-bottom: 1px solid #E0E0E0;" class="col-xs-3 column">&nbsp
                      </div>
                      <div style="border-bottom: 1px solid #E0E0E0;" class="col-xs-4 column">₱ <?php echo number_format($total, 2);?>
                      </div>
                      <div style="border-bottom: 1px solid #E0E0E0;" class="col-xs-1 column">&nbsp
                      </div>
                      <div class="col-xs-4 column">
                      </div>
                    </div>
                  </div>
                </div>

                <br>

                <div class="row clearfix">
                  <div class="col-md-12 column">
                    <div class="row clearfix">
                      <div class="col-xs-2 column">Bank&nbspRate:
                      </div>
                      <div style="border-bottom: 1px solid #E0E0E0;" class="col-xs-3 column">&nbsp
                      </div>
                      <div style="border-bottom: 1px solid #E0E0E0;" class="col-xs-4 column">
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
                      </div>
                      <div style="border-bottom: 1px solid #E0E0E0;" class="col-xs-1 column">&nbsp
                      </div>
                      <div class="col-xs-4 column">
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row clearfix">
                  <div class="col-md-12 column">
                    <div class="row clearfix">
                      <div class="col-xs-2 column">Monthly&nbspInstallment:
                      </div>
                      <div style="border-bottom: 1px solid #E0E0E0;" class="col-xs-3 column">&nbsp
                      </div>
                      <div style="border-bottom: 1px solid #E0E0E0;" class="col-xs-4 column">
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
                      </div>
                      <div style="border-bottom: 1px solid #E0E0E0;" class="col-xs-1 column">&nbsp
                      </div>
                      <div class="col-xs-4 column">
                      </div>
                    </div>
                  </div>
                </div>

                <br>

                Note: <small>Prices are subject to change without prior notice and shall be based on the prevailing selling price at the time of delivery.</small>
                <table class="table table-bordered">
                    <tbody>
                        <td>Prepared by: <?php echo $report[0]->sales_consultant;?>
                        </td>
                        <td>Approved by: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        </td>
                        <td>Conformed: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
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
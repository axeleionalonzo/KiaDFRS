<!DOCTYPE html>
<?php
session_start();
$username = $this->session->userdata('username');
$is_logged_in = $this->session->userdata('is_logged_in');
?>
<html lang="en">
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title" id="myModalLabel">Quotation</h4>
</div>

    <?php echo form_open('report/updateQuotation');?>
    <input type="hidden" name="quotation_id" value="<?php echo $quotation[0]->quotation_id;?>">
    <fieldset>
      <legend>
      </legend>
       <div class="well well-sm">
              <p><center><Strong><?php echo $quotation[0]->client;?></Strong></center></p>
      </div>
      <small><small>

          <input name="client" type="hidden" class="form-control" id="client" value="<?php echo $quotation[0]->client;?>">

          <input name="address" type="hidden" class="form-control" id="address" value="<?php echo $quotation[0]->address;?>">

          <input name="quotation_date" type="hidden" class="form-control" id="quotation_date" value="<?php echo $quotation[0]->quotation_date;?>">

          <input name="contactno" type="hidden" class="form-control" id="contactno" value="<?php echo $quotation[0]->contactno;?>">

          <input name="model" type="hidden" class="form-control" id="model" value="<?php echo $quotation[0]->model;?>">

        <?php
            for ($i=0; $i<count($models);$i++) { 
                if ($quotation[0]->model==$models[$i]->name) {
                    $unit_price=$models[$i]->price;
                }
            }

        ?>
      <div class="form-group">
        <label for="unit_price" class="col-lg-2 control-label">Unit Price</label>
        <div class="col-lg-10">
          <input name="unit_price" type="hidden" class="form-control" id="unit_price" value="<?php echo $unit_price;?>">
          <input disabled="" name="unit_price" type="text" class="form-control" id="unit_price" value="<?php echo $unit_price;?>">
          <span class="help-block"><font color="red"><?php echo form_error('unit_price');?></font></span>
        </div>
      </div>
      <?php
        if (is_numeric($unit_price)) {
          $down_payment=$unit_price*(0.20);
          $amount_financed=$unit_price-$down_payment;
        } else {
          echo "---";
        }
      ?>
      <div class="form-group">
        <label for="amount_financed" class="col-lg-2 control-label">Amount Financed</label>
        <div class="col-lg-10">
          <input name="amount_financed" type="text" class="form-control" id="amount_financed" value="<?php echo $amount_financed;?>">
          <span class="help-block"><font color="red"><?php echo form_error('amount_financed');?></font></span>
        </div>
      </div>
      <div class="form-group">
        <label for="down_payment" class="col-lg-2 control-label">Down Payment</label>
        <div class="col-lg-10">
          <input name="down_payment" type="text" class="form-control" id="down_payment" value="<?php echo $down_payment;?>">
          <span class="help-block"><font color="red"><?php echo form_error('down_payment');?></font></span>
        </div>
      </div>
      <div class="form-group">
        <label for="freight_and_handling" class="col-lg-2 control-label">Freight and Handling</label>
        <div class="col-lg-10">
          <input name="freight_and_handling" type="text" class="form-control" id="freight_and_handling" value="INCLUSIVE">
          <span class="help-block"><font color="red"><?php echo form_error('freight_and_handling');?></font></span>
        </div>
      </div>
      <div class="form-group">
        <label for="comprehensive_insurance" class="col-lg-2 control-label">Comprehensive Insurance</label>
        <div class="col-lg-10">
          <input name="comprehensive_insurance" type="text" class="form-control" id="comprehensive_insurance" value="<?php echo $quotation[0]->comprehensive_insurance;?>">
          <span class="help-block"><font color="red"><?php echo form_error('comprehensive_insurance');?></font></span>
        </div>
      </div>
      <div class="form-group">
        <label for="lto_registration" class="col-lg-2 control-label">LTO Registration</label>
        <div class="col-lg-10">
          <input name="lto_registration" type="text" class="form-control" id="lto_registration" value="<?php echo $quotation[0]->lto_registration;?>">
          <span class="help-block"><font color="red"><?php echo form_error('lto_registration');?></font></span>
        </div>
      </div>
      <div class="form-group">
        <label for="chattel_mortgage_fee" class="col-lg-2 control-label">Chattel Mortgage Fee</label>
        <div class="col-lg-10">
          <input name="chattel_mortgage_fee" type="text" class="form-control" id="chattel_mortgage_fee" value="<?php echo $quotation[0]->chattel_mortgage_fee;?>">
          <span class="help-block"><font color="red"><?php echo form_error('chattel_mortgage_fee');?></font></span>
        </div>
      </div>
      <div class="form-group">
        <label for="other_services" class="col-lg-2 control-label">Other Services</label>
        <div class="col-lg-10">
          <input name="other_services" type="text" class="form-control" id="other_services" value="<?php echo $quotation[0]->other_services;?>">
          <span class="help-block"><font color="red"><?php echo form_error('other_services');?></font></span>
        </div>
      </div>
      <div class="form-group">
        <label for="discount" class="col-lg-2 control-label">Discount</label>
        <div class="col-lg-10">
          <input name="discount" type="text" class="form-control" id="discount" value="<?php echo $quotation[0]->discount;?>">
          <span class="help-block"><font color="red"><?php echo form_error('discount');?></font></span>
        </div>
      </div>
      <?php
        $total = $quotation[0]->down_payment + $quotation[0]->freight_and_handling + $quotation[0]->comprehensive_insurance + $quotation[0]->lto_registration + $quotation[0]->chattel_mortgage_fee;
      ?>
      
          <input name="total_cash_outlay" type="hidden" class="form-control" id="total_cash_outlay" value="<?php echo $total; ?>">
          <span class="help-block"><font color="red"><?php echo form_error('total_cash_outlay');?></font></span>

      <div class="form-group">
        <label for="monthly_rate" class="col-lg-2 control-label">Bank Rate</label>
        <div class="col-lg-10">
          <input name="monthly_rate" type="text" class="form-control" id="monthly_rate" placeholder="Standard Bank Rate: 1.07 %" value="<?php echo $quotation[0]->monthly_rate;?>">
          <span class="help-block"><font color="red"><?php echo form_error('monthly_rate');?></font></span>
        </div>
      </div>
      <div class="form-group">
        <label for="monthly_installment" class="col-lg-2 control-label">Monthly Installment</label>
        <div class="col-lg-10">
          <select name="monthly_installment" class="form-control" id="monthly_installment">
            <option value="<?php echo $quotation[0]->monthly_installment;?>"><?php echo $quotation[0]->monthly_installment;?></option>
            <?php
              for($i=0; $i<count($monthly_installment);$i++) {
              ?>
              <option value="<?php echo $monthly_installment[$i]->month;?>"><?php echo $monthly_installment[$i]->month;?></option>
            <?php }?>
          </select>
          <span class="help-block"><font color="red"><?php echo form_error('monthly_installment');?></font></span>
        </div>
      </div>
    </small></small>
      
       
    </fieldset>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-info">Save changes</button>
    </div>
</form>
</html>
<!DOCTYPE html>
<?php
session_start();
$username = $this->session->userdata('username');
$is_logged_in = $this->session->userdata('is_logged_in');
?>
<html lang="en">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      <h4 class="modal-title" id="myModalLabel">Update Bulletin</h4>
    </div>
    <?php echo form_open('report/updatebulletin');?>
    <input type="hidden" name="bulletin_id" value="<?php echo $bulletin[0]->bulletin_id;?>">
    <fieldset>
      <legend></legend>
      <div class="form-group">
        <label for="description" class="col-lg-2 control-label">Bulletin</label>
        <div class="col-lg-10">
          <textarea name="description" class="form-control" rows="3" id="textArea"><?php echo $bulletin[0]->description;?></textarea>
          <span class="help-block">A longer block of help text that breaks onto a new line and may extend beyond one line.</span>
          <span class="help-block"><font color="red"><?php echo form_error('description');?></font></span>
        </div>
      </div>
    </fieldset>
    <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-success">Save changes</button>
    </form>
</html>
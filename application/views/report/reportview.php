

        <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Full Report</h4>
                  </div>
          <form name="add" class="form-horizontal" method="POST" action="/KiaDFRS/index.php/report/update">
            <input type="hidden" name="report_id" value="<?php echo $report[0]->report_id?>">
              <fieldset>
                <legend></legend>
                <div class="well well-sm">
                  <p><b>Sales Consultant:</b> <?php echo $report[0]->sales_consultant;?></p>
                </div>
                <div class="form-group">
                  <label for="report_date" class="col-lg-2 control-label">Date</label>
                  <div class="col-lg-10">
                    <ul class="nav nav-pills nav-stacked" style="max-width: 300px;">
                    <li class="disabled"><a href="#"><?php echo $report[0]->report_date;?></a></li>
                  </ul>
                  </div>
                </div>
                <div class="form-group">
                  <label for="client" class="col-lg-2 control-label">Client</label>
                  <div class="col-lg-10">
                    <ul class="nav nav-pills nav-stacked" style="max-width: 300px;">
                    <li class="disabled"><a href="#"><?php echo $report[0]->client;?></a></li>
                  </div>
                </div>
                <div class="form-group">
                  <label for="address" class="col-lg-2 control-label">Address</label>
                  <div class="col-lg-10">
                    <ul class="nav nav-pills nav-stacked" style="max-width: 300px;">
                    <li class="disabled"><a href="#"><?php echo $report[0]->address;?></a></li>
                  </div>
                </div>
                 <div class="form-group">
                  <label for="contactno" class="col-lg-2 control-label">Contact #</label>
                  <div class="col-lg-10">
                    <ul class="nav nav-pills nav-stacked" style="max-width: 300px;">
                    <li class="disabled"><a href="#"><?php echo $report[0]->contactno;?></a></li>
                  </div>
                </div>
                <div class="form-group">
                  <label for="model_name" class="col-lg-2 control-label">Model</label>
                  <div class="col-lg-10">
                    <ul class="nav nav-pills nav-stacked" style="max-width: 300px;">
                    <li class="disabled"><a href="#"><?php echo $report[0]->model_name;?></a></li>
                </div>
                </div>
                <div class="form-group">
                  <label for="term" class="col-lg-2 control-label">Term</label>
                  <div class="col-lg-10">
                    <ul class="nav nav-pills nav-stacked" style="max-width: 300px;">
                    <li class="disabled"><a href="#"><?php echo $report[0]->term;?></a></li>
                  </div>
                </div>
                <div class="form-group">
                  <label for="remarks" class="col-lg-2 control-label">Remarks</label>
                  <div class="col-lg-10">
                    <ul class="nav nav-pills nav-stacked" style="max-width: 300px;">
                    <li class="disabled"><a href="#"><?php echo $report[0]->remarks;?></a></li>
                  </div>
                </div>
             

              </fieldset>

              <div class="modal-footer">
                <a href="/KiaDFRS/index.php/report/delete/<?php echo $report[0]->report_id;?>" type="button" class="btn btn-default" onclick="return confirm('are you sure to delete')">Delete</a>
                <a href="/KiaDFRS/index.php/report/edit/<?php echo $report[0]->report_id;?>" data-toggle="modal" data-target="#myModaledit" type="button" class="btn btn-primary">Edit Report</a>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                </form>
                </div>


           <!-- Modal Edit -->
            <div data-focus-on="input:first" class="modal fade" id="myModaledit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  
                </div>
            </div>
          </div>

         
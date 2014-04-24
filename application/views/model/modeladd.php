

				<div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Add a Car Model</h4>
                  </div>
				<form name="add" class="form-horizontal" method="POST" action="/KiaDFRS/index.php/model/insert">
              <fieldset>
                <legend></legend>
                <div class="form-group">
                  <label for="name" class="col-lg-2 control-label">Model</label>
                  <div class="col-lg-10">
                    <input name="name" type="text" class="form-control" id="name" value="">
                  </div>
                </div>
             

              </fieldset>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
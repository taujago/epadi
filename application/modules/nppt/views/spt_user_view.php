
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default border-panel card-view">
			<div class="panel-heading">
			

        <div class="pull-left">
           <button  onclick="buat_laporan()" class="btn btn-sm btn-info "><i class="ti-pencil "></i> Buat / Edit Laporan</button>
           
               
        </div>
				<div class="clearfix"></div>
			</div>
			<div class="panel-wrapper collapse in">
				<div class="panel-body">
					<div class="table-wrap">
						<div class="table-responsive">
							<table id="datable_1" class="table table-bordered table-striped" width="100%">
	                            <thead>
	                              <tr>
	                                <th width="3%" ><input id="check-all" type="checkbox"></th>
	                                <th width="3%" ><strong>No.</strong>	</th>
	                                 <th width="20%" ><strong>No. SPT</strong></th>
	                                <th width="30%"><strong>Tugas</strong></th>
                                   <th width="10%"><strong>Tgl Pergi</strong></th>
	                                <th width="10%"><strong>Tgl_kembali</strong></th>
                                   <th width="10%"><strong>Lama</strong></th>
	                                <th width="2%"><strong>Laporan</strong></th>
	                              </tr>
	                            </thead>
	                            <tfoot>
	                            	<tr>
	                                
	                            	</tr>
	                            </tfoot>
	                          </table>
						
						</div>
					</div>
				</div>
			</div>
		</div>	
	</div>
</div>

<?php 
$this->load->view("spt_user_js");
?>
   



<!--  Modal content for the above example -->
<div class="modal fade bs-example-modal-lg" id="modal_spt_user" data-keyboard="false" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title mt-0" id="myLargeModalLabel">Large modal</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
              <form  id="form_spt_user"  method="post" class="form-horizontal">
                <input type="hidden" value="" name="id_nppt_detail"/> 
              
                 <div class="form-group row">
                   <label for="example-text-input" class="col-sm-2 col-form-label">Deskripsi Hasil</label>
                      <div class="col-sm-10">
                       <textarea class="textarea" name="hasil"  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                      </div>
                </div>

            
                
              </form>
                <div class="modal-footer">
                <button type="button" id="btnSave" onclick="simpan_laporan()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div> 
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->    

<script>
  $(function () {

    // $('.textarea').wysihtml5()
  })
</script>
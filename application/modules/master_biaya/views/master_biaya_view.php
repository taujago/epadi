
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default border-panel card-view">
			<div class="panel-heading">
				<div class="pull-left">

					
                    <?php 
                    if ($this->session->userdata('operator_level')=='operator') {?>
                    <button  onclick="add()" class="btn btn-sm btn-primary "><i class="ti-plus"></i> Tambah Data</button>
                    <button  onclick="edit()" class="btn btn-sm btn-warning "><i class="ti-pencil "></i> Edit</button>
	                <button  onclick="hapus()" class="btn btn-sm btn-danger "><i class=" ti-trash"></i> Hapus</button>
                    <?php
                    } 
                    ?>
                   
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
	                                <th width="5%" ><input id="check-all" type="checkbox"></th>
	                                <th width="5%" ><strong>No.</strong>	</th>
	                               
	                                <th ><strong>Tujuan</strong></th>
                                   <th ><strong>Tingkat</strong></th>
	                                <th ><strong>Lumpsum</strong></th>
	                                <th ><strong>Penginapan</strong></th>
	                                <th ><strong>Transportasi</strong></th>
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
$this->load->view($controller."_js");
?>

<!--  Modal content for the above example -->
<div class="modal fade bs-example-modal-lg" id="modal_form" data-keyboard="false" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myLargeModalLabel">Large modal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
              <form  id="form"  method="post" class="form-horizontal">
                <input type="hidden" value="" name="id_biaya"/> 
              

                <div class="form-group row">
                   <label for="example-text-input" class="col-sm-2 col-form-label">Kota Tujuan</label>
                      <div class="col-sm-10">
                        <?php 
                            $id_tujuan = (isset($id_tujuan))?$id_tujuan:"";
                            echo form_dropdown('id_tujuan[]',$arr_tujuan, $id_tujuan, 'class="form-control select2" multiple="multiple" data-placeholder="Pilih Kota Tujuan" id="multi" style="width: 100%;"');
                          ?>

                      </div>
                      
                </div>
                <span id="load_kota">

                </span>
                 <div class="form-group row">
                   <label for="example-text-input" class="col-sm-2 col-form-label">Tingkat</label>
                      <div class="col-sm-10">
                        <?php 
                          $id_golongan = (isset($id_golongan))?$id_golongan:"";
                          echo form_dropdown('id_golongan',$arr_golongan, $id_golongan, 'class="form-control"');
                        ?>

                     
                      </div>
                </div>


                <div class="form-group row">
                   <label for="example-text-input" class="col-sm-2 col-form-label">Lumpsum</label>
                      <div class="col-sm-10">
                        <input class="form-control" type="text" name="lumpsum"  id="lumpsum"  onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);">

                       
                      </div>
                </div>

                 <div class="form-group row">
                   <label for="example-text-input" class="col-sm-2 col-form-label">Penginapan</label>
                      <div class="col-sm-10">
                        <input class="form-control" type="text" name="penginapan"  id="penginapan"  onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);">

                       
                      </div>
                </div>

                 <div class="form-group row">
                   <label for="example-text-input" class="col-sm-2 col-form-label">Transportasi</label>
                      <div class="col-sm-10">
                        <input class="form-control" type="text" name="transportasi"  id="transportasi"  onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);">

                       
                      </div>
                </div>

                
                
                
              </form>
                <div class="modal-footer">
                <button type="button" id="btnSave" onclick="simpan()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div> 
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->    




<!--  Modal content for the above example -->
<div class="modal fade bs-example-modal-lg" id="detail" data-keyboard="false" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myLargeModalLabel">Large modal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
            	<table id="detailx" class="table ">
            		
            	</table>
            
                <div class="modal-footer">

                <button type="button" class="btn btn-danger" data-dismiss="modal">Ok</button>
            </div> 
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->       


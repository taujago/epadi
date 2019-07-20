
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default border-panel card-view">
			<div class="panel-heading">
				<div class="pull-left">

					
                    <?php 
                    if ($this->session->userdata('operator_level')=='operator' or $this->session->userdata('operator_level')=='kabag') {?>
                     <button  onclick="lihat()" class="btn btn-sm btn-success "><i class="ti-pencil "></i> Lihat Penggunaan Anggaran</button>
                      <button  onclick="cetak()" class="btn btn-sm btn-primary "><i class="ti-pencil "></i> Cetak Penggunaan Anggaran</button>
                       <button  onclick="semua()" class="btn btn-sm btn-danger "><i class="ti-pencil "></i> Cetak Laporan Seluruh Anggaran</button>
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
	                               
	                                <th ><strong>Nama</strong></th>
                                   <th ><strong>Pangkat</strong></th>
	                                <th ><strong>Jabatan</strong></th>
                                  <th ><strong>Golongan</strong></th>
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
                <h3 class="modal-title mt-0" id="myLargeModalLabel">Large modal</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
             <div class="modal-body">
           <div class="table-wrap">
            <div class="table-responsive">
              <table class="table table-bordered table-striped" width="100%">
               <thead>
                                <tr>
                                
                                  <th width="5%" ><strong>No.</strong>  </th>
                                 
                                  <th ><strong>Tanggal Perjalanan Dinas</strong></th>
                                   <th ><strong>No. SPD</strong></th>
                                  <th ><strong>Jumlah Anggaran</strong></th>
                                </tr>
                              </thead>

                              <tbody id="detail">
                                
                              </tbody>
                              <tfoot>
                                <tr>
                                  <td colspan="3" align="right" style="font-weight: bold">Total</td>
                                  <td style="font-weight: bold" id="load_jum" ></td>
                                </tr>
                              </tfoot>
                             
              </table>
            </div>
          </div>
              <!-- <div id="load_jum"></div> -->
            </div>

                <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
            </div> 
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
 



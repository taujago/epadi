
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default border-panel card-view">
			<div class="panel-heading">
			

        <div class="pull-left">
          
                    <?php 
                    if ($this->session->userdata('operator_level')=='operator' or $this->session->userdata('operator_level')=='kabag') {?>
                    <!-- <button  onclick="add()" class="btn btn-sm btn-primary "><i class="ti-plus"></i> Tambah Data</button> -->
                   
                    
                    <button  onclick="cetak()" class="btn btn-sm btn-success "><i class="ti-pencil "></i> Cetak</button>
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
	                                <th width="3%" ><input id="check-all" type="checkbox"></th>
	                                <th width="3%" ><strong>No.</strong>	</th>
	                                 <th width="20%" ><strong>No. SPT</strong></th>
	                                <th width="20%"><strong>Nama</strong></th>
                                   <th width="40%"><strong>Hasil</strong></th>
	                                <th width="20%"><strong>Tgl. Lap</strong></th>
                                
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
$this->load->view("laporan_sppd_js");
?>

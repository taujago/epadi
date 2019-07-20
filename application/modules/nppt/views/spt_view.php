
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default border-panel card-view">
			<div class="panel-heading">
			

        <div class="pull-left">
           SPT :
                    <?php 
                    if ($this->session->userdata('operator_level')=='operator') {?>
                    <!-- <button  onclick="add()" class="btn btn-sm btn-primary "><i class="ti-plus"></i> Tambah Data</button> -->
                   
                      <button  onclick="edit()" class="btn btn-sm btn-warning "><i class="ti-pencil "></i> Edit</button>
                    
                     
                      <button  onclick="cetak_sek()" class="btn btn-sm btn-success "><i class="ti-pencil "></i> Cetak SPT Sekretariat</button>

                      <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-success">Cetak SPT Bupati</button>
                        <button type="button" class="btn btn-sm btn-success dropdown-toggle" data-toggle="dropdown">
                          <span class="caret"></span>
                          <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="javascript:void(0)" onclick="cetak_bupati()">Bupati</a></li>
                          
                          <li><a href="javascript:void(0)" onclick="cetak_wakil()">Wakil Bupati</a></li>
                          <li class="divider"></li>

                          <li><a href="javascript:void(0)" onclick="cetak_asisten('1')">Asisten 1</a></li>
                          <li><a href="javascript:void(0)" onclick="cetak_asisten('2')">Asisten 2</a></li>
                          <li><a href="javascript:void(0)" onclick="cetak_asisten('3')">Asisten 3</a></li>
                          
                        </ul>
                      </div>
                     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; SPPD :  <button  onclick="buat_sppd()" class="btn btn-sm btn-info "><i class="ti-pencil "></i> Buat SPPD</button>
                   <!-- <button  onclick="hapus()" class="btn btn-sm btn-danger "><i class=" ti-trash"></i> Hapus</button> -->
                    <?php
                    } elseif ($this->session->userdata('operator_level')=='kabag') {?>
                  <!--    Aksi : <button  onclick="ver()" class=" btn-sm btn bg-maroon  "><i class="ti-plus"></i> Verifikasi</button>
                     <button  onclick="cetak()" class="btn btn-sm btn-success "><i class="ti-pencil "></i> Cetak</button> -->
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
                                   <th width="20%"><strong>Golongan</strong></th>
	                                <th width="30%"><strong>Tugas</strong></th>
                                   <th width="30%"><strong>Dasar Hukum</strong></th>
	                                <th width="2%"><strong>SPPD</strong></th>
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
$this->load->view("spt_js");
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
                <input type="hidden" value="" name="id_nppt"/> 
              
                 <div class="form-group row">
                   <label for="example-text-input" class="col-sm-2 col-form-label">No. SPT</label>
                      <div class="col-sm-10">
                        <input class="form-control" type="text" name="no_spt"  id="no_spt">
                         <span class="help-block">Silahkan Ganti Sesuai Keinginan</span>
                      </div>
                </div>

            


                <div class="form-group row">
                   <label for="example-text-input" class="col-sm-2 col-form-label">Dasar Hukum</label>
                      <div class="col-sm-10">
                        <input class="form-control" type="text" name="dasar_hukum"  id="dasar_hukum">

                       
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
<div class="modal fade bs-example-modal-lg" id="modal_sppd" data-keyboard="false" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myLargeModalLabel">Large modal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
              <form  id="form_sppd"  method="post" class="form-horizontal">
                <input type="hidden" value="" name="id_nppt"/> 
                
             <!--     <div class="form-group row">
                   <label for="example-text-input" class="col-sm-2 col-form-label">No. SPPD</label>
                      <div class="col-sm-10">
                        <input class="form-control" type="text" name="no_sppd"  id="no_sppd" readonly="">
                        
                      </div>
                </div> -->

                
                 <div class="form-group row">
                   <label for="example-text-input" class="col-sm-2 col-form-label">Pejabat yang memberi perintah</label>
                      <div class="col-sm-10">
                        <input class="form-control" type="text" name="pejabat_perintah"  id="pejabat_perintah">
                       
                      </div>
                </div>

            


                <div class="form-group row">
                   <label for="example-text-input" class="col-sm-2 col-form-label">Mata Anggaran</label>
                      <div class="col-sm-10">
                        <input class="form-control" type="text" name="mata_anggaran"  id="mata_anggaran">

                       
                      </div>
                </div>

                 <div class="form-group row">
                   <label for="example-text-input" class="col-sm-2 col-form-label">Keterangan Lain</label>
                      <div class="col-sm-10">
                        <input class="form-control" type="text" name="ket_lain"  id="ket_lain">

                       
                      </div>
                </div>

              
                
                
              </form>
                <div class="modal-footer">
                <button type="button" id="btnSave" onclick="simpan_sppd()" class="btn btn-primary">Save</button>
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



<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default border-panel card-view">
			<div class="panel-heading">
			

        <div class="pull-left">
          
                    <?php 
                    if ($this->session->userdata('operator_level')=='operator') {?>
                    <!-- <button  onclick="add()" class="btn btn-sm btn-primary "><i class="ti-plus"></i> Tambah Data</button> -->
                   
                    

                      <button  onclick="edit_sppd()" class="btn btn-sm btn-warning "><i class="fa fa-pencil "></i> Edit SPPD</button>

                       <button  onclick="cetak_sek()" class="btn btn-sm btn-success "><i class="ti-pencil "></i> Cetak SPPD Sekretariat</button>

                        <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-success">Cetak SPPD BUPATI</button>
                        <button type="button" class="btn btn-sm btn-success dropdown-toggle" data-toggle="dropdown">
                          <span class="caret"></span>
                          <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="javascript:void(0)" onclick="cetak_bupati()">Bupati</a></li>
                          <li class="divider"></li>
                          <li><a href="javascript:void(0)" onclick="cetak_wakil()">Wakil Bupati</a></li>
                          <li><a href="javascript:void(0)" onclick="cetak_asisten('1')">Asisten 1</a></li>
                          <li><a href="javascript:void(0)" onclick="cetak_asisten('2')">Asisten 2</a></li>
                          <li><a href="javascript:void(0)" onclick="cetak_asisten('3')">Asisten 3</a></li>
                        </ul>
                      </div>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;KWITANSI : 
                      <button  onclick="buat_kwitansi()" class="btn btn-sm btn-info "><i class="ti-pencil "></i> Buat / Edit Kwitansi</button>
                   
                   <!-- <button  onclick="hapus()" class="btn btn-sm btn-danger "><i class=" ti-trash"></i> Hapus</button> -->
                    <?php
                    } elseif ($this->session->userdata('operator_level')=='kabag') {?>
                      <button  onclick="cetak_sek()" class="btn btn-sm btn-success "><i class="ti-pencil "></i> Cetak SPPD Sekretariat</button>

                        <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-success">Cetak SPPD BUPATI</button>
                        <button type="button" class="btn btn-sm btn-success dropdown-toggle" data-toggle="dropdown">
                          <span class="caret"></span>
                          <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="javascript:void(0)" onclick="cetak_bupati()">Bupati</a></li>
                          <li class="divider"></li>
                          <li><a href="javascript:void(0)" onclick="cetak_wakil()">Wakil Bupati</a></li>
                        </ul>
                      </div>
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
                                  <th width="5%" ><strong>Kode No.</strong></th>
	                                 <th width="25%" ><strong>No. SPPD</strong></th>
	                                <th width="20%"><strong>Nama</strong></th>
                                   <th width="20%"><strong>Tugas</strong></th>
	                                <th width="30%"><strong>Tgl</strong></th>
                                   <th width="30%"><strong>Tujuan</strong></th>
	                                <th width="2%"><strong>Kwitansi</strong></th>
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
$this->load->view("sppd_js");
?>


<!--  Modal content for the above example -->
<div class="modal fade bs-example-modal-lg" id="modaleditsppd" data-keyboard="false" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title mt-0" id="myLargeModalLabel">Edit data SPPD</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
              <form  id="frmeditsppd"  method="post" class="form-horizontal">
                

                <div class="form-group row">
                   <label for="example-text-input" class="col-sm-2 col-form-label">Nomor SPPD </label>
                      <div class="col-sm-10">
                        <input class="form-control" type="text" name="no_sppdx"  id="no_sppdx">
                        
                       
                      </div>

                      <input type="hidden" name="sppd_id_nppt_detail" id="sppd_id_nppt_detail" />
                </div>
 
                
              </form>
                <div class="modal-footer">
                <button type="button" id="btnupdatesppd" onclick="updatesppd()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div> 
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->    










<!--  Modal content for the above example -->
<div class="modal fade bs-example-modal-lg" id="modal_kwi" data-keyboard="false" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title mt-0" id="myLargeModalLabel">Large modal</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
              <form  id="form_kw"  method="post" class="form-horizontal">
                <input type="hidden" value="" name="id_nppt_detail"/> 

                <input type="hidden" value="" name="id_anggaran"/> 
                

                <div class="form-group row">
                   <label for="example-text-input" class="col-sm-2 col-form-label">Uang Harian</label>
                      <div class="col-sm-10">
                        <input class="form-control" type="text" name="uang_harian"  id="uang_harian">
                        <p class="help-block" id="show_uang_harian">Example block-level help text here.</p>
                       
                      </div>
                </div>

                 <div class="form-group row">
                   <label for="example-text-input" class="col-sm-2 col-form-label">Uang Penginapan</label>
                      <div class="col-sm-10">
                        <input class="form-control" type="text" name="uang_penginapan"  id="uang_penginapan">
                        <p class="help-block" id="show_uang_penginapan">Example block-level help text here.</p>
                       
                      </div>
                </div>

                <div class="form-group row">
                   <label for="example-text-input" class="col-sm-2 col-form-label">Uang Transportasi</label>
                      <div class="col-sm-10">
                        <input class="form-control" type="text" name="uang_transportasi"  id="uang_transportasi">
                        <p class="help-block" id="show_uang_transportasi">Example block-level help text here.</p>
                       
                      </div>
                </div>


                <div class="form-group row">
                   <label for="example-text-input" class="col-sm-2 col-form-label">Sudah Terima Dari</label>
                      <div class="col-sm-10">
                        <input class="form-control" type="text" name="dari"  id="dari">

                       
                      </div>
                </div>
            
                
              </form>
                <div class="modal-footer">
                <button type="button" id="btnSave" onclick="simpan_kwitansi()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div> 
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->    




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


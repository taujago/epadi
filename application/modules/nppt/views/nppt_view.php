
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default border-panel card-view">
			<div class="panel-heading">
        <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            
                <i class="icon fa fa-bullhorn"></i> Nota Permintaan Perjalanan Dinas akan otomatis masuk kedalam Surat Perintah Tugas (SPT) apabila sudah disetujui oleh Bagian Yang Berwenang
              </div>
				<div class="pull-left">
					 
                    <?php 
                    if ($this->session->userdata('operator_level')=='operator') {?>
                    <button  onclick="add()" class="btn btn-sm btn-primary "><i class="ti-plus"></i> Tambah Data</button>
                    <button  onclick="edit()" class="btn btn-sm btn-warning "><i class="ti-pencil "></i> Edit</button>
                     <button  onclick="cetak()" class="btn btn-sm btn-success "><i class="ti-pencil "></i> Cetak</button>
	                 <button  onclick="hapus()" class="btn btn-sm btn-danger "><i class=" ti-trash"></i> Hapus</button>
                    <?php
                    } elseif ($this->session->userdata('operator_level')=='kabag') {?>
                     Aksi : <button  onclick="ver()" class=" btn-sm btn bg-maroon  "><i class="ti-plus"></i> Verifikasi</button>
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
	                                 <th width="20%" ><strong>No. NPT</strong></th>
	                                <th width="20%"><strong>Kepada</strong></th>
                                   <th width="10%"><strong>Tujuan</strong></th>
	                                <th width="30%"><strong>Maksud</strong></th>
	                                <th width="15%"><strong>Tanggal</strong></th>
	                                <th width="2%"><strong>Status</strong></th>
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
                <input type="hidden" value="" name="id_nppt"/> 
              
                 <div class="form-group row">
                   <label for="example-text-input" class="col-sm-2 col-form-label">No. NPT</label>
                      <div class="col-sm-10">
                        <input class="form-control" type="text" name="no_npt"  id="no_npt" >
                        
                      </div>
                </div>

                 <div class="form-group row">
                   <label for="example-text-input" class="col-sm-2 col-form-label">Anggaran</label>
                      <div class="col-sm-10">
                        <?php 
                          $id_anggaran = (isset($id_anggaran))?$id_anggaran:"";
                          echo form_dropdown('id_anggaran',$arr_anggaran, $id_anggaran, 'class="form-control"');
                        ?>

                     
                      </div>
                </div>

                <div class="form-group row">
                   <label for="example-text-input" class="col-sm-2 col-form-label">Pegawai</label>
                      <div class="col-sm-10">
                        <?php 
                            $id_pegawai = (isset($id_pegawai))?$id_pegawai:"";
                            echo form_dropdown('id_pegawai[]',$arr_pegawai, $id_pegawai, 'class="form-control select2" multiple="multiple" data-placeholder="Pilih Pegawai" id="multi" style="width: 100%;"');
                          ?>

                      </div>
                      
                </div>
                <span id="load_pegawai">

                </span>
                 <div class="form-group row">
                   <label for="example-text-input" class="col-sm-2 col-form-label">Tujuan Perjalanan</label>
                      <div class="col-sm-10">
                        <?php 
                          $id_tujuan = (isset($id_tujuan))?$id_tujuan:"";
                          echo form_dropdown('id_tujuan',$arr_tujuan, $id_tujuan, 'class="form-control"');
                        ?>

                     
                      </div>
                </div>


                <div class="form-group row">
                   <label for="example-text-input" class="col-sm-2 col-form-label">Maksud Perjalanan Dinas</label>
                      <div class="col-sm-10">
                        <input class="form-control" type="text" name="maksud"  id="maksud">

                       
                      </div>
                </div>

                <div class="form-group row">
                   <label for="example-text-input" class="col-sm-2 col-form-label">Pilih Transportasi</label>
                      <div class="col-sm-10">
                        <?php 
                          $id_transportasi = (isset($id_transportasi))?$id_transportasi:"";
                          echo form_dropdown('id_transportasi',$arr_transportasi, $id_transportasi, 'class="form-control"');
                        ?>

                     
                      </div>
                </div>

                 <div class="form-group row">
                   <label for="example-text-input" class="col-sm-2 col-form-label">Tanggal Berangkat</label>
                      <div class="col-sm-10">
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                        <input type="text" class="form-control pull-right" name="tgl_pergi" id="datepicker" >
                        </div>
                       
                      </div>
                </div>

                <div class="form-group row">
                   <label for="example-text-input" class="col-sm-2 col-form-label">Tanggal Kembali</label>
                      <div class="col-sm-10">
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                        <input type="text" class="form-control pull-right" name="tgl_kembali" id="datepicker2" >
                        </div>
                       
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



<!--  Modal content for the above example -->
<div class="modal fade bs-example-modal-lg" id="modal_ver" data-keyboard="false" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title mt-0" id="myLargeModalLabel">Large modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
              <form  id="form_ver"  method="post" class="form-horizontal">
                <input type="hidden" value="" name="id_nppt"/> 

                  <div class="form-group row">
                   <label for="example-text-input" class="col-sm-2 col-form-label">No. SPT</label>
                      <div class="col-sm-10">
                        <input class="form-control" type="text" name="no_spt"  id="no_spt" readonly="">
                        
                      </div>
                </div>
                
                <?php $set = $this->cm->setting() ?>
               <h4>Perjalanan Dinas <?php echo $set->tempat_surat ?> - <span id="tujuan"></span></h4>
                 <span id="load_info">

                </span>
               
               
                 <div class="form-group row">
                   <label for="example-text-input" class="col-sm-2 col-form-label">Anggaran</label>
                      <div class="col-sm-10">
                        <?php 
                          $id_anggaran = (isset($id_anggaran))?$id_anggaran:"";
                          echo form_dropdown('id_anggaran',$arr_sisa_anggaran, $id_anggaran, 'class="form-control"');
                        ?>

                     
                      </div>
                </div>

               
                
              </form>
                <div class="modal-footer">
                <button type="button" id="btnSave" onclick="verifikasi()" class="btn btn-primary">Verifikasi</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div> 
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->   
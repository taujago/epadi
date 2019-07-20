<?php 
	$set = $this->cm->setting()
 ?>

<!-- Row -->
<div class="row">
	<div class="col-sm-12">
		

		<div class="panel panel-default border-panel card-view">
			<div class="panel-heading">
				<div class="pull-left">
					<h6 class="panel-title txt-dark">Setting Instansi</h6>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="panel-wrapper collapse in">
				<div class="panel-body">
					<form id="fm" method="post" enctype="multipart/form-data" >
					<div class="form-wrap">
							<div class="form-group">
								<label class="control-label mb-10 text-left">Kab/ Kota</label>
								<input type="text" class="form-control" value="<?php echo (isset($kota))?$kota:"";  ?>"  type="text" name="kota" id="kota">
							</div>
							<div class="form-group">
								<label class="control-label mb-10 text-left">Nama Bupati</label>
								<input type="text" class="form-control" value="<?php echo (isset($nama_bupati))?$nama_bupati:"";  ?>"  type="text" name="nama_bupati" id="nama_bupati">
							</div>
							<div class="form-group">
								<label class="control-label mb-10 text-left">Nama Wakil Bupati</label>
								<input type="text" class="form-control" value="<?php echo (isset($nama_wakil_bupati))?$nama_wakil_bupati:"";  ?>"  type="text" name="nama_wakil_bupati" id="nama_wakil_bupati">
							</div>
							<div class="form-group">
								<label class="control-label mb-10 text-left">Nama Sekretaris Daerah</label>
								<input type="text" class="form-control" value="<?php echo (isset($nama_sekda))?$nama_sekda:"";  ?>"  type="text" name="nama_sekda" id="nama_sekda">
							</div>

							<div class="form-group">
								<label class="control-label mb-10 text-left">Pangkat Sekretaris Daerah</label>
								<input type="text" class="form-control" value="<?php echo (isset($pangkat_sekda))?$pangkat_sekda:"";  ?>"  type="text" name="pangkat_sekda" id="pangkat_sekda">
							</div>

							<div class="form-group">
								<label class="control-label mb-10 text-left">NIP Sekretaris Daerah</label>
								<input type="text" class="form-control" value="<?php echo (isset($nip_sekda))?$nip_sekda:"";  ?>"  type="text" name="nip_sekda" id="nip_sekda">
							</div>





<div class="form-group">
	<label class="control-label mb-10 text-left">NIP Asisten 1</label>
	<input type="text" class="form-control" value="<?php echo (isset($asisten_1_nip))?$asisten_1_nip:"";  ?>"  type="text" name="asisten_1_nip" id="asisten_1_nip">
</div>
<div class="form-group">
	<label class="control-label mb-10 text-left">Nama Asisten 1</label>
	<input type="text" class="form-control" value="<?php echo (isset($asisten_1_nama))?$asisten_1_nama:"";  ?>"  type="text" name="asisten_1_nama" id="asisten_1_nama">
</div>

<div class="form-group">
	<label class="control-label mb-10 text-left">Pangkat Asisten 1</label>
	<input type="text" class="form-control" value="<?php echo (isset($asisten_1_pangkat))?$asisten_1_pangkat:"";  ?>"  type="text" name="asisten_1_pangkat" id="asisten_1_pangkat">
</div>

<div class="form-group">
	<label for="asisten_1_jabatan" class="control-label mb-10 text-left">Jabatan Asisten 1</label>
	<input type="text" class="form-control" value="<?php echo (isset($asisten_1_jabatan))?$asisten_1_jabatan:"";  ?>"  type="text" name="asisten_1_jabatan" id="asisten_1_jabatan">
</div>






<div class="form-group">
	<label class="control-label mb-10 text-left">NIP Asisten 2</label>
	<input type="text" class="form-control" value="<?php echo (isset($asisten_2_nip))?$asisten_2_nip:"";  ?>"  type="text" name="asisten_2_nip" id="asisten_2_nip">
</div>

<div class="form-group">
	<label class="control-label mb-10 text-left">Nama Asisten 2</label>
	<input type="text" class="form-control" value="<?php echo (isset($asisten_2_nama))?$asisten_2_nama:"";  ?>"  type="text" name="asisten_2_nama" id="asisten_2_nama">
</div>






<div class="form-group">
	<label class="control-label mb-10 text-left">Pangkat Asisten 2</label>
	<input type="text" class="form-control" value="<?php echo (isset($asisten_2_pangkat))?$asisten_2_pangkat:"";  ?>"  type="text" name="asisten_2_pangkat" id="asisten_2_pangkat">
</div>



<div class="form-group">
	<label for="asisten_2_jabatan" class="control-label mb-10 text-left">Jabatan Asisten 2</label>
	<input type="text" class="form-control" value="<?php echo (isset($asisten_2_jabatan))?$asisten_2_jabatan:"";  ?>"  type="text" name="asisten_2_jabatan" id="asisten_2_jabatan">
</div>





<div class="form-group">
	<label class="control-label mb-10 text-left">NIP Asisten 3</label>
	<input type="text" class="form-control" value="<?php echo (isset($asisten_3_nip))?$asisten_3_nip:"";  ?>"  type="text" name="asisten_3_nip" id="asisten_3_nip">
</div>
<div class="form-group">
	<label class="control-label mb-10 text-left">Nama Asisten 3</label>
	<input type="text" class="form-control" value="<?php echo (isset($asisten_3_nama))?$asisten_3_nama:"";  ?>"  type="text" name="asisten_3_nama" id="asisten_3_nama">
</div>

<div class="form-group">
	<label class="control-label mb-10 text-left">Pangkat Asisten 3</label>
	<input type="text" class="form-control" value="<?php echo (isset($asisten_3_pangkat))?$asisten_3_pangkat:"";  ?>"  type="text" name="asisten_3_pangkat" id="asisten_3_pangkat">
</div>


<div class="form-group">
	<label for="asisten_3_jabatan" class="control-label mb-10 text-left">Jabatan Asisten 3</label>
	<input type="text" class="form-control" value="<?php echo (isset($asisten_3_jabatan))?$asisten_3_jabatan:"";  ?>"  type="text" name="asisten_3_jabatan" id="asisten_3_jabatan">
</div>







							<div class="form-group">
								<label class="control-label mb-10 text-left">Ibu Kota</label>
								<input type="text" class="form-control" value="<?php echo (isset($tempat_surat))?$tempat_surat:"";  ?>"  type="text" name="tempat_surat" id="tempat_surat">
							</div>

							<div class="form-group">
								<label class="control-label mb-10 text-left">Nama Instansi</label>
								<input type="text" class="form-control" value="<?php echo (isset($instansi))?$instansi:"";  ?>"  type="text" name="instansi" id="instansi">
							</div>

							<div class="form-group">
								<label class="control-label mb-10 text-left">Nama Kepala</label>
								<input type="text" class="form-control" value="<?php echo (isset($nama_kepala))?$nama_kepala:"";  ?>"  type="text" name="nama_kepala" id="nama_kepala">
							</div>
							<div class="form-group">
								<label class="control-label mb-10 text-left">Pangkat Kepala</label>
								<input type="text" class="form-control" value="<?php echo (isset($pangkat_kepala))?$pangkat_kepala:"";  ?>"  type="text" name="pangkat_kepala" id="pangkat_kepala">
							</div>
							<div class="form-group">
								<label class="control-label mb-10 text-left">NIP Kepala</label>
								<input type="text" class="form-control" value="<?php echo (isset($nip_kepala))?$nip_kepala:"";  ?>"  type="text" name="nip_kepala" id="nip_kepala">
							</div>

							<div class="form-group">
								<label class="control-label mb-10 text-left">Bandahara</label>
								<input type="text" class="form-control" value="<?php echo (isset($bendahara))?$bendahara:"";  ?>"  type="text" name="bendahara" id="bendahara">
							</div>
							<div class="form-group">
								<label class="control-label mb-10 text-left">NIP Bendahara</label>
								<input type="text" class="form-control" value="<?php echo (isset($nip_bendahara))?$nip_bendahara:"";  ?>"  type="text" name="nip_bendahara" id="nip_bendahara">
							</div>

							<div class="form-group">
								<label class="control-label mb-10 text-left">Pejabat Pelaksana Teknis Kegiatan (PPTK)</label>
								<input type="text" class="form-control" value="<?php echo (isset($nama_pptk))?$nama_pptk:"";  ?>"  type="text" name="nama_pptk" id="nama_pptk">
							</div>
							<div class="form-group">
								<label class="control-label mb-10 text-left">NIP Pejabat Pelaksana Teknis Kegiatan (PPTK)</label>
								<input type="text" class="form-control" value="<?php echo (isset($nip_pptk))?$nip_pptk:"";  ?>"  type="text" name="nip_pptk" id="nip_pptk">
							</div>


							<div class="form-group">
								<label class="control-label mb-10 text-left">Tahun Anggaran</label>
								<input type="text" class="form-control" value="<?php echo (isset($tahun_anggaran))?$tahun_anggaran:"";  ?>"  type="text" name="tahun_anggaran" id="tahun_anggaran">
							</div>

								<a href="javascript:void(0)" class="btn btn-info btn-anim" onclick="simpan()" ><i class="icon-rocket"></i><span class="btn-text">Simpan</span></a>
							

						</form>
					
					</div>
				</div>
			</div>
		</div>
	</div>






					</div>
					<!-- /Row -->
<script>
            $(document).ready(function(){
                // Basic
                $('.dropify').dropify();

                // Translated
                $('.dropify-fr').dropify({
                    messages: {
                        default: 'Glissez-déposez un fichier ici ou cliquez',
                        replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                        remove:  'Supprimer',
                        error:   'Désolé, le fichier trop volumineux'
                    }
                });

                // Used events
                var drEvent = $('#input-file-events').dropify();

                drEvent.on('dropify.beforeClear', function(event, element){
                    return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
                });

                drEvent.on('dropify.afterClear', function(event, element){
                    alert('File deleted');
                });

                drEvent.on('dropify.errors', function(event, element){
                    console.log('Has Errors');
                });

                var drDestroy = $('#input-file-to-destroy').dropify();
                drDestroy = drDestroy.data('dropify')
                $('#toggleDropify').on('click', function(e){
                    e.preventDefault();
                    if (drDestroy.isDropified()) {
                        drDestroy.destroy();
                    } else {
                        drDestroy.init();
                    }
                })
            });
</script> 


 <script type="text/javascript">


function simpan(){
			$('#fm').form('submit',{
				url: '<?php echo site_url("operator_setting/save") ?>',
				onSubmit: function(){
					return $(this).form('validate');
				},
				dataType:'json',
				success: function(result){
					 console.log(result);
					 obj = $.parseJSON(result);
 						if (obj.success == false ){
	 						swal({   
								title: "Gagal!",   
					             type: "error", 
								text: obj.pesan,
								confirmButtonColor: "#22af47",   
					        });
						return false;
						} else {
							swal({   
					            title: "Berhasil?",   
					            text: obj.pesan,   
					            type: "success",   
					            showCancelButton: false,   
					            confirmButtonColor: "#f83f37",   
					            confirmButtonText: "Ok",   
					            cancelButtonText: "Periksa Kembali",   
					            closeOnConfirm: false, 
					            allowOutsideClick: true , 
					            closeOnCancel: false 
					      
					               
					        });
						 
					}
				}
			});
		}

 </script>

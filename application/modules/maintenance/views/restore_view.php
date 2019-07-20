 <link href="<?php echo base_url(); ?>assets/admin/dropify/css/dropify.min.css" rel="stylesheet" type="text/css">


<!-- Row -->
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default border-panel card-view">
			<div class="panel-heading">
				<div class="pull-left">
					<h6 class="panel-title txt-dark">Restore</h6>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="panel-wrapper collapse in">
				<div class="panel-body">
					<div class="form-wrap">

							
					<div class="col-md-12 col-xs-12 mt-15">
						<form id="restoreform" enctype="multipart/form-data" method="post"  >
							  <input type="file" name="backup" onchange="return validasiFile()" id="input-file-now-custom-1" class="dropify"/><br>
								  
                                <a href="javascript:void(0)" onclick="restoredb()" class="btn btn-infobtn btn-info btn-rounded btn-block btn-anim "><i class=" ti-stats-up  "></i><span class="btn-text">RESTORE DATABASE</span></a>
                  
					</form>
					</div>
						
					
					</div>
				</div>
			</div>
		</div>
	</div>


<script type="text/javascript">
	function restoredb(){
   
    
    
    $('#restoreform').form('submit',{
        url: '<?php echo site_url("maintenance/dorestore")  ?>',
        onSubmit: function(){
          return $(this).form('validate');
        },
        dataType:'json',
         onSubmit: function(){
                   swal({   
			            title: "Prosess.......",   
			            text: "Jangan Tutup Halaman Ini sampai restore berhasil",   
			            imageUrl: "<?php echo base_url("assets/images/spin.gif") ?>" ,
						confirmButtonColor: "#ff6028",   
						showConfirmButton: false 
						
			        });
                },

        success: function(result){
           console.log(result);
            obj = $.parseJSON(result);
          // return false;
          	if (obj.success == false ){
	           swal(
	                {
	                    title: "Gagal",
	                    text: obj.pesan,
	                    type: "error",
	                    showCancelButton: false,
	                    allowOutsideClick: false,
	                    confirmButtonClass: "btn btn-success",
	                    cancelButtonClass: "btn btn-danger m-l-10",
	                    confirmButtonColor: "#22af47",  
	                }
	            )

          	} else {
              swal({   
			     title: "Berhasil?",   
			     text: obj.pesan,   
			     type: "success",   
			     showCancelButton: false,   
			     confirmButtonColor: "#f83f37",   
			     confirmButtonText: "Logout",   
			     // cancelButtonText: "Periksa Kembali",   
			     closeOnConfirm: false, 
			     allowOutsideClick: false , 
			     closeOnCancel: false 
			 }, function(){   
			     	window.location.href ="<?php echo site_url("op_login/logout") ?>";
			        
			 });
                  $(".dropify-clear").click();
           
          }
        }
      });
    }
    


</script>
	<script>
		function validasiFile(){
    var inputFile = document.getElementById('input-file-now-custom-1');
    var pathFile = inputFile.value;
    var ekstensiOk = /(\.zip)$/i;
    if(!ekstensiOk.exec(pathFile)){
    	 swal({   
			title: "File Tidak Diterima!",   
             type: "error", 
			text: "Pilih File Backup Belum Sesuai",
			confirmButtonColor: "#22af47",   
        });
        // swal('Pilih File Backup').catch(swal.noop);
        // alert('Silakan upload file gambar yang memiliki ekstensi .jpg/.jpeg/.png/.gif/.ico');
        inputFile.value = '';
        return false;
    }else{
        return true;
    }
}

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
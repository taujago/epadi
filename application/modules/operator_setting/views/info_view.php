<?php 
	$set = $this->cm->setting()
 ?>
  <link href="<?php echo base_url(); ?>assets/admin/dropify/css/dropify.min.css" rel="stylesheet" type="text/css">
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default border-panel card-view">
			<div class="panel-heading">
				<div class="pull-left">
					<h6 class="panel-title txt-dark">Logo</h6>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="panel-wrapper collapse in">
				<div class="panel-body">
					<div class="form-wrap">
						<form id="form_app" method="post"  enctype="multipart/form-data" >
							<div class="form-group">
								<label class="control-label mb-10 text-left">Nama Aplikasi</label>
								<input type="text" class="form-control" value="<?php echo (isset($set->nama_aplikasi))?$set->nama_aplikasi:"";  ?>"  type="text" name="nama_aplikasi" id="nama_aplikasi">
							</div>

							<div class="form-group">
								<label class="control-label mb-10 text-left">Logo Kop Surat</label>
								  <input type="file" name="logo" id="logo" class="dropify" data-default-file="<?php echo base_url() ?>assets/images/<?php echo(isset($set->logo))?$set->logo:""; ?>" /><br>
								 
							</div>


								  <button class="btn btn-info" type="submit">Update</button>
					
							
									
							
							
						
							</form>

						
					
					</div>
				</div>
			</div>
		</div>
	</div>

	

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
<script>
$(document).ready(function(){

$("#form_app").submit(function(){
  $(this).ajaxSubmit({
  url : '<?php echo site_url("operator_setting/kop_update") ?>',
 
    dataType : 'json',
    success: function(obj){
           console.log(obj);
           //obj = $.parseJSON(result);
          // return false;
          if (obj.success == false ){
            swal(
                {
                    title: 'Gagal',
                    text: obj.pesan,
                    type: 'error',
                    showCancelButton: false,
                    allowOutsideClick: false,
                    confirmButtonClass: 'btn btn-success',
                    cancelButtonClass: 'btn btn-danger m-l-10'
                }
            )
           
          } else {
            

            if(obj.operation == "insert") {
              swal({
                title: 'Berhasil?',
                text: obj.pesan,
                type: 'success',
                showCancelButton: false,
                showConfirmButton: obj.confirm,
                confirmButtonText: obj.conf,
                cancelButtonText: obj.canceltext,
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger m-l-10',
                allowOutsideClick: false,
                buttonsStyling: false
                }).then(function () {
                   
                }, function (dismiss) {
                    if (dismiss === 'cancel') {
                   
                        // $('#modal_form').modal('hide');
                    }

                })

            }
            else {
               swal({
                title: 'Update Berhasil',
                text: obj.pesan,
                type: 'success',
                showCancelButton: false,
                showConfirmButton: obj.confirm,
                confirmButtonText: obj.conf,
                cancelButtonText: obj.canceltext,
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger m-l-10',
                allowOutsideClick: false,
                buttonsStyling: false
                }).then(function () {
                   
                }, function (dismiss) {
                    if (dismiss === 'cancel') {
                    back();
                        // $('#modal_form').modal('hide');
                    }

                })
            }
          }
        }
  });
  return false;
});


});
</script>
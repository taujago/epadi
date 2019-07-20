 <link href="<?php echo base_url(); ?>assets/rab/dropify/css/dropify.min.css" rel="stylesheet" type="text/css">
 <div class="row heading-bg">
	<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
		<h5 class="txt-dark"><?php echo $title ?></h5>
	</div>

	<?php 
    $desa2 = $this->cm->data_desa()
 ?><!-- Breadcrumb -->
	<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
		<ol class="breadcrumb">
			<li><a href="<?php echo site_url() ?>operator_area">Dashboard</a></li>
			<!-- <li><a href="#"><span>forms</span></a></li> -->
			<li class="active"><span><?php echo $title ?></span></li>
		</ol>
	</div>
	<!-- /Breadcrumb -->

</div>

<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default border-panel card-view">
			<div class="panel-heading">
				<div class="pull-left">
					<h6 class="panel-title txt-dark">Mode System Koefisien Sekarang <code><?php
                        if ($koefisien=="1") {
                            $koe = "Koefisien Dapat Dirubah";
                        } else {
                            $koe = "Koefisien Tidak Dapat Dirubah";
                        }
                     echo $koe
                     ; ?></code></h6>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="panel-wrapper collapse in">
				<div class="panel-body">
					<div class="form-wrap">
						<form id="form_sistem" method="post"  enctype="multipart/form-data" >
							
							<div class="form-group mt-30 mb-30">
                                <label class="control-label mb-10 text-left">Mode Pengeditan  Koefisien</label>
                                 <?php 
                                         $arr_mode = array("0"=>"OFF",
                                                        "1" => "ON");
                                         $koefisien = isset($koefisien)?$koefisien:"";
                                         echo form_dropdown("koefisien",$arr_mode,$koefisien,'class="form-control"') ?>
                                
                            </div>
                             <button class="btn btn-info" type="submit">Simpan</button>
							
									
							
							
						
							</form>

						
					
					</div>
				</div>
			</div>
		</div>
	</div>

	

<script>
$(document).ready(function(){

$("#form_sistem").submit(function(){
  $(this).ajaxSubmit({
  url : '<?php echo site_url("users/update_sistem") ?>',
 
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
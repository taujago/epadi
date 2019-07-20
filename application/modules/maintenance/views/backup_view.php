
<!-- Row -->
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default border-panel card-view">
			<div class="panel-heading">
				<div class="pull-left">
					<h6 class="panel-title txt-dark">Backup</h6>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="panel-wrapper collapse in">
				<div class="panel-body">
					<div class="form-wrap">

							
					<div class="col-md-12 col-xs-12 mt-15">
						<button class="btn btn-info btn-rounded btn-block btn-anim" id="btnk"><i class=" ti-download "></i><span class="btn-text">BACKUP</span></button>
					</div>
						
					
					</div>
				</div>
			</div>
		</div>
	</div>

<script>
     $('#btnk').on('click', function(){
     	 swal({   
            title: "Backup ?",   
            text: "Jangan Tutup halaman ini saat proses backup berlangsung",   
            type: "warning",   
            showCancelButton: true,   
            confirmButtonColor: "#f83f37",   
            confirmButtonText: "Ya!",   
            cancelButtonText: "Tidak",   
            closeOnConfirm: false, 
            allowOutsideClick: true , 
            closeOnCancel: false 
        }, function(isConfirm){   
            if (isConfirm) {   
            window.location.href="<?php echo site_url("maintenance/dobackup") ?>";  
                swal("Backup!", "Proses..........", "success");   
            } else {     
                swal("Cancelled", "Okee :)", "error");   
            } 
        });

        
     });
 </script>

<!-- Row -->
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default border-panel card-view">
			<div class="panel-heading">
				<div class="pull-left">
					<h6 class="panel-title txt-dark">Ganti Password</h6>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="panel-wrapper collapse in">
				<div class="panel-body">
					<div class="form-wrap">
						<form id="fm" method="post" enctype="multipart/form-data" >
							
							<div class="form-group">
								<label class="control-label mb-10 text-left">Password Lama</label>
								<input type="password" class="form-control" name="pass_lama" id="pass_lama"  >
							</div>
							<div class="form-group">
								<label class="control-label mb-10 text-left">Password Baru</label>
								<input type="password" class="form-control"  name="pass" id="pass"  value="" >
							</div>
							<div class="form-group">
								<label class="control-label mb-10 text-left">Password Baru Lagi</label>
								<input type="password" class="form-control"  name="pass2" id="pass2"  value="" >
								<input type="hidden" name="id" value="id" />
							</div>
							<a href="javascript:void(0)" class="btn btn-info" iconCls="icon-ok" onclick="simpan()">Simpan</a>
							

						
					
					</div>
				</div>
			</div>
		</div>
	</div>
</form>



<script type="text/javascript">
function simpan(){
	console.log('hallo..');
			$('#fm').form('submit',{
				url: '<?php echo site_url("users/save_detail") ?>',
				onSubmit: function(){
					return $(this).form('validate');
				},
				success: function(result){
					//var result = eval('('+result+')');
					console.log(result);
					//return false; 
					result = result.replace(/\s+/g, " ");
					obj = $.parseJSON(result);
					console.log(obj.pesan);
					if (obj.success == false ){
						swal({   
							title: obj.pesan,   
				            type: "error", 
							confirmButtonColor: "#22af47",   
				        });
						reset();
							
					} else {
						swal({   
							title: obj.pesan,   
				            type: "success", 
							confirmButtonColor: "#22af47",   
				        });	
				        reset();					 
					}
				}
			});
		}
function reset(){ 
   	$('#fm')[0].reset(); 

}

</script>
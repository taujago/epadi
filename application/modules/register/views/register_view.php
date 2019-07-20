<!DOCTYPE html>
<html lang="en">
	
<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<title>Register RAB Desain</title>
		
		<meta name="author" content="Onhacker"/>
		
		<!-- Favicon -->
		<link rel="shortcut icon" href="favicon.ico">
		<link rel="icon" href="favicon.ico" type="image/x-icon">
		
		<!-- vector map CSS -->
		<link href="<?php echo base_url(); ?>assets/rab/vendors/bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css" rel="stylesheet" type="text/css"/>
		
		
		<link href="<?php echo base_url(); ?>assets/rab/vendors/bower_components/sweetalert/dist/sweetalert.css" rel="stylesheet" type="text/css">
		<!-- Custom CSS -->
		<link href="<?php echo base_url(); ?>assets/rab/dist/css/style.css" rel="stylesheet" type="text/css">
		
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/jseasyui/jquery-1.8.0.min.js"></script>
		
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/jseasyui/jquery.easyui.min.js"></script>

		<script src="<?php echo base_url(); ?>assets/rab/vendors/bower_components/jquery/dist/jquery.min.js"></script>
	</head>
	<body>

<!--Preloader-->
		<div class="preloader-it">
			<div class="la-anim-1"></div>
		</div>
		<!--/Preloader-->
		
		<div class="wrapper  pa-0">
			<!-- Main Content -->
			<div class="page-wrapper pa-0 ma-0 auth-page">
				<div class="container">
					<!-- Row -->
					<div class="table-struct full-width full-height">
						<div class="table-cell vertical-align-middle auth-form-wrap">
							<div class="auth-form  ml-auto mr-auto no-float card-view pt-30 pb-30">
								<div class="row">
									<div class="col-sm-12 col-xs-12">
										<div class="sp-logo-wrap text-center pa-0 mb-30">
											<a href="#">
												<!-- <img class="brand-img mr-10" src="../img/logo.png" alt="brand"/>
												<span class="brand-text"><img  src="../img/brand.png" alt="brand"/></span> -->
											</a>
										</div>
										<div class="form-wrap">
											<form id="frm1" action="<?php echo site_url("register/validate"); ?>" method="post" name="frm1">
												<div class="form-group text-center">
													<img class="img-circle" src="<?php echo base_url() ?>assets/images/user.png" alt="PKPD">
													<h3 class="mt-10 txt-dark ">Serial Number : <?php echo $serial; ?></h3>
													<div class="form-group mb-0 text-center">
													
												</div>
												<div class="alert alert-success alert-dismissable">
												<a href="javascript:void(0)" style="color: white">Untuk mendapatkan Kode Aktivasi, Kirimkan SMS ke Nomor : <strong>0852 8888 6853‬ </strong> dengan format : <br><strong>RAB</strong> &lt;spasi&gt; <strong>Nama Desa</strong> &lt;spasi&gt; <strong>Kabupaten </strong>&lt;spasi&gt; <strong><?php echo $serial; ?></strong></a>
												</div>
												</div>
												<div class="form-group">
													<input type="text" id="aktivasi" name="aktivasi" class="form-control" required="" placeholder="Masukkan Aktivasi">

      												<input type="hidden" name="serial" id="serial" value="<?php echo $serial; ?>" />

												</div>
												<div class="form-group text-center">
													<a href="#" onclick="register()" class="btn btn-danger btn-rounded">Register</a>
												</div>
												
											</form>
										</div>
									</div>	
								</div>
							</div>
						</div>
					</div>
					<!-- /Row -->	
				</div>
				
			</div>
			<!-- /Main Content -->
		
		</div>
		<!-- /#wrapper -->
		
		<!-- JavaScript -->
		
		<!-- jQuery -->
		
		
		<!-- Bootstrap Core JavaScript -->
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/jseasyui/jquery-1.8.0.min.js"></script>
		
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/jseasyui/jquery.easyui.min.js"></script>
		<script src="<?php echo base_url()."assets/"?>js/jquery.form.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>assets/rab/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/rab/vendors/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js"></script>
		
		<!-- Slimscroll JavaScript -->
		<script src="<?php echo base_url(); ?>assets/rab/dist/js/jquery.slimscroll.js"></script>
		
		<!-- Init JavaScript -->

		<script src="<?php echo base_url(); ?>assets/rab/vendors/bower_components/sweetalert/dist/sweetalert.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/rab/dist/js/init.js"></script>
	</body>

</html>


   <script>
   function register(){
 
			$('#frm1').form('submit',{
				url: '<?php echo site_url("register/validate"); ?>',
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
								text: "Pastikan Aktivasi dimasukkan dengan benar atau hubungi kami di 0852 8888 6853‬",
								confirmButtonColor: "#22af47",   
					        })

					} else {
							swal({   
								title: obj.pesan,   
					             type: "success", 
								text: "Selamat Bekerja",
								confirmButtonColor: "#22af47",   
					        });
						  location.href=('<?php echo site_url(); ?>');
					}
				}
			});
		}
 
   
   </script>

<?php 

$kode = GetVolumeLabel()."1353590395393593";
		$register = md5($kode);
		//echo $register;

function GetVolumeLabel() {
	  // Try to grab the volume name
	  if (preg_match('#Volume Serial Number is (.*)\n#i', shell_exec('dir c:'), $m)) {
	    $volname = ' ('.$m[1].')';
	  } else {
	    $volname = '';
	  }
	//return $volname;
	$serial =  str_replace("(","",str_replace(")","",$volname));
	$serial = md5($serial);
	$serial = substr(preg_replace("/[^0-9]/", '', $serial),0,4);
	return $serial;
	}

	?>
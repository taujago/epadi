<div id="detail" style="min-height: 400px;" >
	 <div id="detail-head">
	 	<?php echo $title; ?>
	 </div>
	 <div style="padding : 100px">
 <hr />
<form id="frmkoneksi" method="post" action="<?php echo site_url("maintenance/save_koneksi"); ?>"> 
<table width="100%" border="0" cellpadding="3">
  <tr>
    <th colspan="3"><strong>PENGATURAN KONEKSI</strong></th>
  </tr>
  <tr>
    <td width="18%">URL</td>
    <td width="1%">:</td>
    <td width="81%"><input name="service_url" type="text" value="<?php echo $service_url; ?>" id="service_url" size="100" /></td>
  </tr>
 <!--  <tr>
    <td>Username</td>
    <td>:</td>
    <td><input type="text" name="user" id="user"  value="<?php echo $user; ?>"/></td>
  </tr>
  <tr>
    <td>Password</td>
    <td>:</td>
    <td><input type="password" name="password" id="password" value="" /></td>
  </tr>
  <tr>
    <td>Hash </td>
    <td>:</td>
    <td><input type="text" name="hash" id="hash" value="<?php echo $hash; ?>" /></td>
  </tr> -->
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" value="Simpan" /></td>
  </tr>
</table>
</form>
<hr/>
  
<a style="text-decoration:none;color:000" href="#" onclick="export_server()" >
	 	<center>
	 	<img width="128px" height="128px" src="<?php echo base_url()."assets/images/export.png" ?>" /> <Br />
	 	<b>EXPORT DATA</b></center>
	  </a>
	 <div>
</div>

<div class="modal">

<h2> Harap tunggu. sedang memproses. harap tidak menutup browser sampai proses selesai </h2>

</div>

<script type="text/javascript">

$(document).ready(function(){
	
	$("#frmkoneksi").submit(function(){
		$.ajax({
			url: '<?php echo site_url("maintenance/save_service"); ?>',
			type: 'post',
			dataType : 'json',
			data : $(this).serialize(),
			success : function(obj){
				if(obj.error==false){
					$.messager.alert('info',obj.message,'info');
				}
				else {
					$.messager.alert('error',obj.message,'error');
				}
			}
		});
		return false;
	});

});


function export_serverx(){
 	$(".modal").show();
	$.ajax({
	url : '<?php echo site_url("maintenance/export_adk"); ?>',
	dataType : 'json',
	success : function(obj) {
				$(".modal").hide();
				if(obj.error == false) {
					$.messager.alert('info',obj.message,'info');
				}
				else {
					$.messager.alert('error',obj.message,'error');
				}
			}
	});
}



function export_server(){
	$(".modal").show();
	$.ajax({

			url : '<?php echo site_url("maintenance/export") ?>', 
			dataType : 'json',
			success : function(obj){
				$(".modal").hide();
				//alert('sukses');
				
					$.messager.alert('info','Export Selesai','info');
				
				
			}

		});
}


</script>


<style type="text/css">
h2 {
	font-size:14px;
	margin:256px auto;
	text-align:center;
	
}

.modal {
    display:    none;
    position:   fixed;
    z-index:    1000;
    top:        0;
    left:       0;
    height:     100%;
    width:      100%;
    background: rgba( 255, 255, 255, .8 ) 
                url('<?php echo base_url("assets/images")."/ajax-loader.gif"; ?>') 
                50% 50% 
                no-repeat;
}
</style>
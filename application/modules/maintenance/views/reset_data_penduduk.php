<div id="detail" style="min-height: 700px;" >
	 <div id="detail-head">
	 	<?php echo $title; ?>
	 </div>
	 <div style="padding : 100px">
	 
	 	<strong><center>
       Perhatian !!! Reset Data Penduduk akan Menghapus Semua Data Penduduk yang ada dalam system. Mereset Data Penduduk hanya diperlukan jika terjadi Kesalahan Import Data Penduduk dari Excell  <br />
      </strong>
	 	</center>

	<a style="text-decoration:none;color:000" href="#" onclick="reset_data_penduduk()" >
	 	<center>
	 	<img width="128px" height="128px" src="<?php echo base_url()."assets/images/hapus_penduduk.png" ?>" /> <Br />
	 	<b>HAPUS SEMUA PENDUDUK</b></center>
	  </a>
	 <div>
</div>

<div class="modal">

	   
	 <div>
</div>
<div style="clear:both"></div>

<script type="text/javascript">
	
function sss(){
	var row = $('#tt').datagrid('getSelected');	
	console.log(row);
	$.ajax({
		url : '<?php echo site_url("desa/copy") ?>/'+row.id,
		dataType : 'json',
		success : function(obj){
			if (obj.success == false ){
						$.messager.alert('Error',obj.pesan,'error');
					} 
					else {
						$.messager.alert('Informasi',obj.pesan,'info');
						 
					}
		}
	});

}


function reset_data_penduduk(){
	$(".modal").show();
	$.ajax({

			url : '<?php echo site_url("maintenance/reset_data_penduduk") ?>', 
			dataType : 'json',
			success : function(obj){
				$(".modal").hide();
				//alert('sukses');
				
					$.messager.alert('info','Semua Penduduk Berhasil Dihapus','info');
				
				
			}

		});
}

</script>
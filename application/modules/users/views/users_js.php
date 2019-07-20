<script>
 
		var url;
		function baru() {
			//alert('mana man amana ');
			 
			$('#dlg').dialog('open').dialog('setTitle','Tambah Data User');
			$('#fm').form('clear');
			url = '<?php echo site_url("$controller/save") ?>';  
		}
		function login(){
				$('#dlg').dialog('open').dialog('setTitle','Ganti Password');
				$('#fm').form('clear');
				 
		function edit(){
			//alert('hello edit..');
			var row = $('#tt').datagrid('getSelected');			 
			if (row){
				$('#dlg').dialog('open').dialog('setTitle','Edit Data User');
				$('#fm').form('load',row);
				
				/*$.ajax({
					url:'<?php echo site_url("siswa/detail/") ?>/'+row.nip,
					dataType : 'json',
					success : function(x) {
						$("#kelas").val(x.kelas).attr('checked','checked');
						$("#jenis_kelamin").val(x.jenis_kelamin).attr('checked','checked');
						$("#status").val(x.status).attr('checked','checked');
					 
					 
						 
					}
				}); */
				
				url = '<?php echo site_url("$controller/update") ?>/'+row.id_produk;
				
				 
			} 
			else {
				$.messager.show({
							title: 'Error',
							msg: "Pilih record yang akan diedit"
						});
			}
		}
		function simpan(){
			$('#fm').form('submit',{
				url: url,
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
						 $.messager.alert('error',obj.pesan,'Error');
					} else {
						$.messager.alert('info',obj.pesan,'Information');
  					}
				}
			});
		}
		function hapus(){
			var row = $('#tt').datagrid('getSelections');
 			var arr = new Array();
			for(var i=0; i < row.length; i++) {
				arr[i] = row[i].id_user;
			}
			ids = arr.join();
  			if (row){
				$.messager.confirm('Konfirmasi','Anda yakin akan menghapus data ? ',function(r){
					if (r){
						$.post('<?php echo site_url("$controller/hapus") ?>',{ids:ids},function(result){
							
							//return false;
							if (result.success == true){
								 
								$('#tt').datagrid('reload');	// reload the user data
							} else {
								$.messager.show({	// show error message
									title: 'Error',
									msg: obj.pesan
								});
							}
						},'json');
					}
				});
			}
		}
		

 	function cari(){
 		   
 		
 		
        $('#tt').datagrid('load',{             
            
            nama_user: $('#search_nama_user').val(),
            tipe_user : $('#search_tipe_user').val()
            //,golongan: $('#search_golongan').val()
             
        });  
      
 	}

 	function reset_cari(){
  		 $('#search_nama_user').val('');
 		 $('#search_tipe_user').val('x').attr('selected','selected');
 		 cari();
 	}
 </script>
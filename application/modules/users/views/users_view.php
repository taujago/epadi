 <table id="tt" class="easyui-datagrid" style="width:1000px;height:500px"
			url="<?php echo site_url("$controller/get_data")  ?>"
			title="<?php echo $title; ?>" toolbar="#tb"
			rownumbers="false" pagination="true">
		<thead frozen="true">
			<tr>
				<th field="ck" checkbox="true"></th>
 				<th field="nama_lengkap" width="200"  sortable="true"><strong>Nama </strong></th> 
				
				<th field="nama_user" width="200"  sortable="true"><strong>Username</strong></th>
 				<th field="tipe_user" width="100"  sortable="true"  ><strong>Tipe User</strong></th>
 			</tr>
		</thead>
	</table>
	 
<div id="tb"  style="padding:5px;height:auto">
	
	<div >		
		<a href="#" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="baru()" >Tambah Baru</a>	
		<a href="#" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="edit()" >Edit</a>	
		<a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="hapus()" >Hapus</a>		 
		 
		<br />
		 
	</div>
	<!-- filter section -->

	
	<div>
		<fieldset style="border-radius: 5px; border:solid 1px #ccc; margin: 2px 0px;" > <legend>Pencarian </legend>
		 
		 
		 
		<input  size="10" type="text" name="search_nama" placeholder="Username" id="search_nama_user" />
		<?php echo form_dropdown('tipe_user',$arr_tipe_user2,'','id="search_tipe_user"') ?>
		<a href="#" class="easyui-linkbutton" iconCls="icon-search" onclick="cari()">Cari</a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-reset" onclick="reset_cari()">Reset</a>
		
		</fieldset>	
		
	</div>
	<!-- end of filter section -->
	 
	 
		
</div>
  
<?php
$this->load->view($controller."_form"); 
$this->load->view($controller."_js"); 
?>

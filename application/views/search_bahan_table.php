<style type="text/css">
#search_table {
	border-collapse: collapse;
	border-spacing: 1px;
}

#search_table th, #search_table td {
	border: #999 solid 1px;
	padding: 2px;
}

#search_table th {
	background-color:  #ccc;
	padding: 5px 0px;
	text-align: center;
}

#search_table tr:hover {
	background-color:  #c1c1c1;
}
</style>
  <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
	<tr>
		<th width="4%"> </th>
		<th width="4%" align="center"> NO. </th>
		<th width="20%"> Nama Bahan </th>
		<th width="4%"> Sataun</th>
	
		
		
	</tr> 
</thead>

	<?php 
	$i=0;
	foreach ($record->result() as $row) : 
		 $i++;
	 
	?>
	<tr>
	<td align="center"><a href="javascript:void(0)" onclick="pilih('<?php echo $row->id_master_bahan ?>','<?php echo $row->id_master_bahan ?>', '<?php echo "#".$target; ?>');" > <span class="badge badge-primary">Pilih</span> </a></td>
	<td align="center"><?php echo $i; ?></td>
	
	<td><?php echo $row->nama_bahan; ?></td>
	<td><?php echo $row->satuan_bahan; ?></td>
	
	
</tr>
<?php endforeach; ?>
</table>
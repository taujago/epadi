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
}

#search_table tr:hover {
	background-color:  #c1c1c1;
}
</style>
<table width="100%" id="search_table">
	<tr>
		<th> </th>
		<th> NO. </th>
		<th> NO. KK </th>
		<th> NIK </th>
		<th> NAMA </th>
		<th> JK </th>
		<th> DUSUN </th>
		<th> TGL. LAHIR </th>
		<th> UMUR </th>
	</tr> 


	<?php 
	$i=0;
	foreach ($record->result() as $row) : 
		 $i++;
	 
	?>
	<tr>
	<td><a href="#" onclick="pilih('<?php echo $row->id_penduduk ?>','<?php echo $row->nik ?>', '<?php echo "#".$target; ?>');" > Pilih </a></td>
	<td><?php echo $i; ?></td>
	<td><?php echo $row->no_kk; ?></td>
	<td><?php echo $row->nik; ?></td>
	<td><?php echo $row->nama; ?></td>
	<td><?php echo $row->jk; ?></td>
	<td><?php echo $row->dusun; ?></td>
	<td><?php echo $row->tgl_lahir; ?></td>
	<td><?php echo $row->umur; ?> Th</td>
</tr>
<?php endforeach; ?>
</table>
<style>
* {
	font-size:10px;
  font-family: "Times New Roman", Times, serif;
}
.judul {
	font-size:12px;
	font-weight:bold;
	 text-align:center;
}

#gambar {
	width:60px;
	position:fixed;
	top:10px;
	float:left;
}

#kop {
	text-align:center;
}

hr{border-bottom: 5px double #000;}
</style>

<?php 
	$set = $this->cm->setting();

	?>

<table width="100%" border="0" cellpadding="3">
  
  <tr>
    <td width="100%" align="center">
    	<img src="<?php echo base_url()."assets/images/grd.png" ?>" width="60" height="60" align="right" />
    </td>
  </tr>
  <tr>
    <td align="center"><b>BUPATI <?php echo strtoupper($set->kota) ?></b></td>
  </tr>
  <tr>
    <td colspan="3" width="100%"><img src="<?php echo base_url("assets/images/linekop.png"); ?>"  height="6" width="600" /></td>
  </tr>
</table>

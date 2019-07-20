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
    <td width="15%" align="center">
    	<img src="<?php echo base_url()."assets/images/" ?>/<?php echo $set->logo ?>" width="48" height="55" align="right" />
    </td>
    <td width="75%" align="center">
    	<?php echo $set->cop; ?>
  	</td>
    <td width="23%" align="center">&nbsp;</td>
  </tr>
  <tr>
     <td colspan="3" width="100%"><img src="<?php echo base_url("assets/images/linekop.png"); ?>"  height="6" width="600" /></td>
  </tr>
</table>

<!-- 
<table width="100%" border="0" cellpadding="3">
  
  <tr>
    <td width="20%" align="center">
      <img src="<?php echo base_url()."assets/images/" ?>/<?php echo $set->logo ?>" width="50" height="60" align="right" />
    </td>
    <td width="70%" align="center">
      <?php echo $set->kop_sek; ?>
    </td>
    <td width="23%" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" width="100%"><img src="<?php echo base_url("assets/images/linekop.png"); ?>"  height="7" width="600" /></td>
  </tr>
</table> -->
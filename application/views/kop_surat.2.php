<style>
* {
	font-size:10px;
}
.judul {
	font-size:12px;
	font-weight:bold;
	 text-align:center;
}

#gambar {
	width:50px;
	position:fixed;
	top:10px;
	float:left;
}

#kop {
	text-align:center;
}
</style>

<?php 
	$desa2 = $this->cm->data_desa();

	?>

<!--<div id="logo">
<img src="<?php echo base_url()."assets/images/$desa2->logo" ?>" width="100" height="128" />
</div>

<div id="header">
			<center>
			<h1>&nbsp;</h1>
</center>	
	</div><br>
 

<div style="border-top:#000 solid 2px; border-bottom:#000 solid 1px; padding:1px;">

 </div>
<p>&nbsp;</p>-->
<table width="100%" border="0" cellpadding="3">
  <tr>
    <td width="19%" align="right"><img src="<?php echo base_url()."assets/images/muna.png" ?>" width="60" height="70" /></td>
    <td width="1%" align="center">&nbsp;</td>
    <td width="80%" align="left"><table width="72%" border="0">
      <tr>
        <td align="center"><span class="judul">PEMERINTAH <?php echo strtoupper($desa2->kota); ?></span><br />
          <span class="judul"> KECAMATAN <?php echo strtoupper($desa2->kecamatan); ?></span><br />
          <span class="judul"> <?php echo ($desa2->kop_surat=="1")?"KANTOR ":""; 
			echo strtoupper($desa2->bentuk_lembaga. " ".$desa2->desa); ?></span><br />
          <?php echo $desa2->alamat . " Kode Pos " . $desa2->kodepos ?></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="3" align="center"><hr /></td>
  </tr>
</table>

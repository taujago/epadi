<style>
  * {
  	font-size:10px;
  }
  .judul {
  	font-size:14px;
	font-weight:bold;
  }
  
  
table.cetak th {
	border : 1px solid #000;
	vertical-align:middle;
	font-weight:bold;
}

table.cetak td {
	/*border-center : 1px solid #000;
	border-right : 1px solid #000;*/
	border:1px solid #000;
	
}
</style>
<?php 
	$desa2 = $this->cm->data_desa();

	?>
<?php  if($desa2->bentuk_lembaga=="Kelurahan")  {  ?>
<table width="100%" border="0" cellpadding="0">
  <tr>
    <td width="39%" align="center">MENGETAHUI, </td>
    <td width="61%" align="center"><?php echo $desa2->desa.", ".date("d-m-Y"); ?></td>
  </tr>
  <tr>
    <td align="center">LURAH </td>
    <td align="center">SEKLUR </td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td align="center"><u><?php echo  $desa2->nama_kepala_desa ?></u></td>
    <td align="center"><u><?php echo  $desa2->nama_sek_desa ?></u></td>
  </tr>
  <tr>
    <td align="center" valign="top"><table width="100%" border="0" cellpadding="0">
      <tr>
        <td align="center">PANGKAT : <?php echo  $desa2->pangkat_kepala_desa ?></td>
      </tr>
      <tr>
        <td align="center">NIP. <?php echo  $desa2->nip_kepala_desa ?></td>
      </tr>
    </table></td>
    <td align="center"><table width="100%" border="0" cellpadding="0">
      <tr>
        <td align="center">PANGKAT  : <?php echo  $desa2->pangkat_sek_desa ?></td>
      </tr>
      <tr>
        <td align="center">NIP. <?php echo  $desa2->nip_sek_desa ?></td>
      </tr>
    </table></td>
  </tr>
</table>
<?php }  else { ?>
<table width="100%" border="0" cellpadding="0">
  <tr>
    <td width="43%" align="center" valign="top">MENGETAHUI, </td>
	
    <td width="57%" align="center"><?php echo $desa2->desa.", ".date("d-m-Y"); ?></td>
  </tr>
  <tr>
    <td align="center" valign="top">KEPALA DESA </td>
    <td align="center">SEKRETARIS DESA</td>
  </tr>
  <tr>
    <td align="center" valign="top">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td align="center" valign="top">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td align="center" valign="top">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td align="center" valign="top">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td align="center" valign="top">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td align="center" valign="top"><u><?php echo  $desa2->nama_kepala_desa ?></u></td>
    <td align="center"><u><?php echo  $desa2->nama_sek_desa ?></u></td>
  </tr>
  <tr>
    <td align="center" valign="top">&nbsp;</td>
    <td align="center"><table width="100%" border="0" cellpadding="0">
      <tr>
        <td align="center"><?php if(empty($desa2->pangkat_sek_desa)) 
                                    echo '';
                                 else
                                   echo 'PANGKAT. ', ($desa2->pangkat_sek_desa);?></td>
      </tr>
      <tr>
        <td align="center"><?php if(empty($desa2->nip_sek_desa)) 
                                    echo '';
                                 else
                                   echo 'NIP. ', ($desa2->nip_sek_desa);?></td>
      </tr>
    </table></td>
  </tr>
</table>
<?php }  ?>


 
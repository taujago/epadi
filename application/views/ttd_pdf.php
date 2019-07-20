 
 <?php 
	$desa2 = $this->cm->data_desa();

	?>
  <?php  if($desa2->bentuk_lembaga=="Kelurahan")  {  ?>
</p>
<table width="100%" border="0" cellpadding="0">
  <tr>
    <td width="57%">&nbsp;</td>
    <td width="4%" align="left">&nbsp;</td>
    <td width="39%" align="left"><?php echo $desa2->desa.", ". tgl_indo(flipdate($tanggal)); ?></td>
  </tr>
  <?php 
		if($ttd <> "kepala") {  ?>
  <tr>
    <td>&nbsp;</td>
    <td align="center">a.n. </td>
    <td align="left">LURAH </td>
  </tr>
  <?php   } 	
	  ?>
  <tr>
    <td>&nbsp;</td>
    <td align="left">&nbsp;</td>
    <td align="left"><?php echo strtoupper($ttd_jabatan) ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="left">&nbsp;</td>
    <td align="left"><u><?php echo $ttd_nama; ?></u></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="left">&nbsp;</td>
    <td align="left"><table width="100%" border="0" cellpadding="0">
      
      <tr>
        <td colspan="2" align="left">NIP. <?php echo  $nip; ?></td>
      </tr>
    </table></td>
  </tr>
</table>
<?php }  else { ?>
<table width="98%" border="0" cellpadding="0">
  <tr>
    <td width="52%">&nbsp;</td>
    <td width="2%">&nbsp;</td>
    <td width="46%" align="center"><?php echo $desa2->desa.", ". tgl_indo(flipdate($tanggal)); ?></td>
  </tr>
  <?php 
		if($ttd <> "kepala") {  ?>
  <tr>
    <td>&nbsp;</td>
    <td align="center"></td>
    <td align="center">a.n&nbsp;&nbsp;&nbsp;KEPALA DESA </td>
  </tr>
  <?php } ?>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center"><?php if($ttd == "lain")
                  echo 'SEKRETARIS DESA <br>u/b ', ($ttd_jabatan);
                else
                  echo $ttd_jabatan;?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center">         
	
</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="left">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="left">&nbsp;</td>
    
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="left">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center"><u><?php echo $ttd_nama; ?></u></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center"><?php if($ttd == "sek") {  ?><table width="100%" border="0" cellpadding="0">
        
        <tr>
          <td align="center">
          <?php if(empty($nip)) 
                  echo '';
                else
                  echo 'NIP. ', ($nip);?>
          </td>
        </tr>
      </table>
      <?php }  ?></td>
  </tr>
</table>
<?php }  ?>
<br /> <br /><br />


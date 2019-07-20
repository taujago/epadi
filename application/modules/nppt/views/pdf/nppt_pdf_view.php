<html>
	<head>
		<title>
			<?php echo   $title; ?>
		</title>
		
<!-- <style>
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
	font-size:8px;
}

table.cetak td {
	/*border-left : 1px solid #000;
	border-right : 1px solid #000;*/
	border:1px solid #000;
	
}

 
</style> -->
 <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/print_style.css">
	</head>

<body>
	<?php 
	$set = $this->cm->setting();

	?>
<?php $this->load->view("kop_surat") ?>
<table width="100%">

			<tr>
			  <td >&nbsp;</td>
			  <td >&nbsp;</td>
			  <td><div align="center"></div></td>
			  <td><div align="center"><?php echo $set->tempat_surat ?>, <?php echo flipdate($tanggal) ?></div></td>
  </tr>
			<tr>
			  <td >&nbsp;</td>
			  <td >&nbsp;</td>
			  <td>&nbsp;</td>
			  <td>&nbsp;</td>
  </tr>
			<tr>
			  <td width="10%" >No</td>
		      <td width="45%" >: <?php echo $no_npt ?></td>
		      <td width="6%">&nbsp;</td>
		      <td width="39%"><div align="center"></div></td>
			</tr>
			<tr>
			  <td >Lampiran</td>
			  <td >: - </td>
			  <td>&nbsp;</td>
			  <td><div align="center">Kepada</div></td>
  </tr>
			<tr>
			  <td >Hal</td>
			  <td >: Permohonan SPPD Ke <?php echo $tujuan ?></td>
			  <td>&nbsp;</td>
			  <td><div align="center">Yth. Bupati <?php echo $set->kota ?></div></td>
  </tr>
			<tr>
			  <td >&nbsp;</td>
			  <td >&nbsp;</td>
			  <td>&nbsp;</td>
			  <td><div align="center">di</div></td>
  </tr>
			<tr>
			  <td >&nbsp;</td>
			  <td >&nbsp;</td>
			  <td>&nbsp;</td>
			  <td><div align="center"><?php echo $set->tempat_surat ?></div><div align="right"></div></td>
  </tr>
			<tr>
			  <td >&nbsp;</td>
			  <td >&nbsp;</td>
			  <td>&nbsp;</td>
			  <td>&nbsp;</td>
  </tr>
</table>
<p>Dengan Hormat,<br>
<?php echo $maksud ?>, maka dengan ini dimohon untuk ditugaskan dan diterbitkan SPD atas nama:</p>

<table  width="100%" cellpadding="2" >

	<?php 

	 
$baris = 1; $i=0;
if($record->num_rows() > 0 ) {	
	
	foreach($record->result() as $row) :
		$baris--;
		$i++; ?>

		<tr>
			<td  width="4%"><center><?php echo $i; ?>.</center></td> 
		    <td width="37%" >Nama</td>
		    <td width="58%" >: <strong><?php echo $row->nama; ?></strong></td> 
		</tr>
		<tr>
			<td></td>
			 <td >NIP</td>
		    <td >: <?php echo $row->nip; ?></td> 
		</tr>
		<tr>
			<td></td>
			 <td >Pangkat/Golongan Ruang</td>
		    <td >: <?php echo $row->pangkat; ?>/ <?php echo $row->master_gol; ?> </td> 
		</tr>
		<tr>
			<td></td>
			 <td >Jabatan</td>
		    <td >: <?php echo $row->jabatan; ?> </td> 
		</tr>
		<tr>
			<td></td>
			 <td >Unit Kerja</td>
		    <td >: <?php echo $row->unitkerja; ?> </td> 
		</tr>
		
<?php endforeach; }?>

</table>
<p>Selama <?php echo lama($tgl_pergi,$tgl_kembali) ?> (<?php echo terbilang(lama($tgl_pergi,$tgl_kembali))?>) hari, Dari Tanggal <?php echo tgl_indo(flipdate($tgl_pergi)) ?> s/d <?php echo tgl_indo(flipdate($tgl_kembali)) ?> dengan menggunakan biaya perjalanan dinas dari Dokumen Pelaksanaan Anggaran (DPA) <?php echo $set->instansi ?> Tahun Anggaran <?php echo $tahun_anggaran ?>.</p>
<p>Demikian permohonan ini disampaikan, dan atas perkenaan Bapak kami ucapkan terima kasih.</p>
<table width="100%" >
  <tr>
    <td width="54%">&nbsp;</td>
    <td width="46%"><div align="center">Kepala 
        <?php 
   $re = explode("Kabupaten", $set->instansi);
    echo $re[0] ?>
    </div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><div align="center">
      <?php 
   $re = explode("Daerah", $set->instansi);
    echo $re[1] ?>
    </div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><div align="center"><strong><?php echo $kepala ?></strong></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><div align="center"><?php echo $pangkat ?></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><div align="center">NIP. <?php echo $nip ?></div></td>
  </tr>
</table>
<p>&nbsp;</p>
</body>

</html>
<html>
	<head>
		<title>
			<?php echo   $title; ?>
		</title>
		
<style>
  * {
  	font-size:10px;
  }
  .judul {
  	font-size:14px;
	font-weight:bold;
  }

  .judul2 {
  	font-size:12px;
	font-weight:bold;
  }
  
  


 
</style>
 <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/print_style.css">
	</head>

<body>

  <?php 
 
  	$this->load->view("kop_surat_setda");
  
  
  ?>
 

<table width="100%">

			<tr>
			  <td colspan="4"><div align="center"><span class="judul"><u>SURAT TUGAS</u></span></div></td>
	  </tr>
			<tr>
			  <td colspan="4" ><div align="center">NOMOR : <?php echo $no_spt ?></div></td>
	  </tr>
			<tr>
			  <td >&nbsp;</td>
			  <td width="45%" >&nbsp;</td>
			  <td width="6%">&nbsp;</td>
			  <td width="39%">&nbsp;</td>
	  </tr>
			<tr>
			  <td width="10%" ><strong>Nama </strong></td>
		      <td colspan="3" ><strong>: <?php echo $ttd['nama'] ?></strong></td>
	        </tr>
			<tr>
			  <td ><strong>NIP</strong></td>
			  <td colspan="3" ><strong>: <?php echo $ttd['nip'] ?></strong></td>
		    </tr>
			<tr>
			  <td ><strong>Jabatan</strong></td>
			  <td colspan="3" ><strong>: <?php echo $ttd['jabatan'] ?></strong></td>
		    </tr>
			<tr>
			  <td colspan="4" >&nbsp;</td>
		    </tr>
			<tr>
			  <td colspan="4" ><div align="center"><span class="judul2"><u>MEMERINTAHKAN</u></span></div></td>
		    </tr>
			
</table>
 

<table  width="100%" cellpadding="2" >
<tr>
		  <td colspan="3">Kepada : </td>
  </tr>
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
        <td >: <?php echo $row->nip; ?> </td> 
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
		<tr>
		  <td>&nbsp;</td>
		  <td >&nbsp;</td>
		  <td >&nbsp;</td>
  </tr>
		<tr>
		  <td colspan="3">Untuk/ Maksud : <?php echo $maksud ?></td>
  </tr>
		<tr>
		  <td>&nbsp;</td>
		  <td >Tujuan Perjalanan </td>
		  <td >: <?php echo $tujuan ?></td>
  </tr>
		<tr>
		  <td>&nbsp;</td>
		  <td >Tanggal Berangkat </td>
		  <td >: <?php echo tgl_indo(flipdate($tgl_pergi)) ?></td>
  </tr>
		<tr>
		  <td>&nbsp;</td>
		  <td >Tanggal Kembali </td>
		  <td >: <?php echo tgl_indo(flipdate($tgl_kembali)) ?></td>
  </tr>
		<tr>
			<td>&nbsp;</td>
			 <td >&nbsp;</td>
		    <td >&nbsp;</td> 
		</tr>
</table>



 
<table width="100%" >
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Dikeluarkan di : <?php echo $set->tempat_surat ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Pada Tanggal : <?php echo tgl_indo(flipdate($tanggal_spt)) ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <?php 



  ?>
  <tr>
    <td width="54%">&nbsp;</td>
    <td width="46%"><div align="center">a.n. BUPATI SUMBAWA BARAT 
         
    </div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><div align="center">
       <?php echo $ttd['jabatan']; 

 // $ttd['nama'] = $asisten_3_nama;
 //        $ttd['nip']  = $asisten_3_nip;
 //        $ttd['pangkat'] = $asisten_3_pangkat;
 //        $ttd['jabatan'] = 

       ?>
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
    <td><div align="center"><strong><?php echo $ttd['nama'] ?></strong></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><div align="center"><?php echo $ttd['pangkat']; ?></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><div align="center">NIP. <?php echo $ttd['nip']; ?></div></td>
  </tr>
</table>
 
<p>&nbsp;</p>
</body>

</html>
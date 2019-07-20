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
  
 .trek th, .trek td {
  border: 0px solid #000;
  padding: 2px;
  font-family: "Times New Roman", Times, serif; 
  font-size : 10px;
 }  


 
</style>
 <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/print_style.css"></head>

<body>
<?php 
$set = $this->cm->setting();
 
  ?>
 <p align="center"> <span class="judul"><u>LAPORAN PERJALANAN DINAS</u></span></p>
 <p>Pada hari ini <?php echo nama_hari($tanggal_laporan) ?> tanggal <?php echo tgl_indo(flipdate($tanggal_laporan)) ?>, Saya yang bertanda tangan dibawah ini :</p>
 <table width="100%" border="0">
   <tr>
     <td width="32%">Nama/ Nip </td>
     <td width="68%">: <?php echo $nama_pegawai; ?></td>
   </tr>
   <tr>
     <td>NIP</td>
     <td>: <?php echo $nip_pegawai; ?></td>
   </tr>
   <tr>
     <td>Pangkat/Golongan</td>
     <td>: <?php echo $pangkat_pegawai." / ".$golongan ?></td>
   </tr>
   <tr>
     <td>Jabatan</td>
     <td>: <?php echo $jabatan_pegawai; ?></td>
   </tr>
   <tr>
     <td>Unit Kerja </td>
     <td>: <?php echo $unitkerja; ?></td>
   </tr>
 </table>
 <p>Telah melaksanakan Perjalanan Dinas dalam rangka Dalam rangka mengikuti acara <?php echo $maksud ?>, berdasarkan Surat Perintah Tugas Nomor : <?php echo $no_spt ?>, dari tanggal <?php echo tgl_indo(flipdate($tgl_pergi)) ?> s/d <?php echo tgl_indo(flipdate($tgl_kembali)) ?> di <?php echo $nama_tujuan ?>.</p>
 <p>Adapun hasil perjalanan dinas tersebut adalah sebagai berikut : <?php echo str_replace("<br>","",$hasil) ?>Demikianlah Laporan Hasil Perjalanan Dinas ini dibuat untuk dipergunakan seperlunya.</p>
 <?php 
  $set = $this->cm->setting();

  ?>
 <?php 
  if ($this->uri->segment(2)=="pdf_sppd_bupati") {?>
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
    <td>Pada Tanggal : <?php echo tgl_indo(flipdate($tanggal_sppd)) ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="54%">&nbsp;</td>
    <td width="46%"><div align="center"><strong>BUPATI <?php echo strtoupper($set->kota) ?>,</strong></div></td>
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
    <td><div align="center"><strong><?php echo $set->nama_bupati ?></strong></div></td>
  </tr>
</table>

    

<?php
  } else {?>

<table width="100%" >
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
    <td><div align="center"><?php echo $set->tempat_surat ?>, <?php echo tgl_indo(flipdate($tanggal_laporan)) ?></div></td>
  </tr>
  <tr>
    <td width="54%">&nbsp;</td>
    <td width="46%"><div align="center">Yang membuat Laporan </div></td>
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
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><div align="center"><strong><u><?php echo $nama_pegawai ?></u></strong></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><div align="center">NIP. <?php echo $nip_pegawai ?></div></td>
  </tr>
</table>

<?php   
  }
 ?>

</body>

</html>
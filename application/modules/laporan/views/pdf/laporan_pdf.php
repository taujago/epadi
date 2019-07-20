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
    font-size:12px;
  font-weight:bold;
  font-family: "Times New Roman", Times, serif; 
  }

  .judul2 {
    font-size:16px;
  font-weight:bold;
  }
  
 .trek th, .trek td {
  border: 0px solid #000;
  padding: 2px;
  font-family: "Times New Roman", Times, serif; 
  font-size : 10px;
 }

.border-lb {border: 1px solid #000; border-width: 0 0 1px 1px;} 




 
</style>
 <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/print_style.css">
  </head>

<body>
<?php 
$set = $this->cm->setting();
 
  ?>
<p align="center"> <span class="judul">LAPORAN PENGGUNAAN ANGGARAN<br><?php echo strtoupper($nama) ?></span></p>


<table width="100%" class="tabel">
  <thead>
    <tr>
      <td width="5%"><div align="center"><strong>No.</strong></div></td>
      <td width="25%"><div align="center"><strong>Tanggal Perjalan Dinas </strong></div></td>
      <td width="50%"><div align="center"><strong>No. SPD</strong></div></td>
      <td width="20%"><div align="center"><strong>Jumlah Anggaran</strong></div></td>
    </tr>
 </thead>
 <?php 

   
$baris = 1; $i=0;
if($record->num_rows() > 0 ) {  
  
  foreach($record->result() as $row) :
    $baris--;
    $i++; ?>

    <tr>
        <td width="5%"><center><?php echo $i; ?>.</center></td> 
        <td width="25%"><?php echo tgl_indo(flipdate($row->tanggal_sppd)); ?> </td> 
        <td width="50%"><?php echo $row->no_sppd; ?>/<?php echo $row->no_sppdx; ?></td>
        <td width="20%"><div align="right"><?php echo uang($row->uang_harian+$row->uang_penginapan+$row->uang_transportasi) ?></div></td>
    </tr>
    
<?php endforeach; }?>

    <tr>
      <td colspan="3"><div align="right"><strong>Total</strong> </div></td> 
      <td><div align="right"><strong><?php echo rupiah($total["jum"]) ?></strong> </div></td>
    </tr>
</table>
</body>

</html>
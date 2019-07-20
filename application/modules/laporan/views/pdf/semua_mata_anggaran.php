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
<p align="center"> <span class="judul">REKAPITULASI ANGGARAN PERJALANAN DINAS <br><?php echo strtoupper($set->instansi) ?> <br>TAHUN ANGGARAN <?php echo $set->tahun_anggaran ?></span></p>


<table width="100%" class="tabel" cellpadding="3" >
  <thead >
    <tr style="background-color: #66CC66">
      <th width="5%"><div align="center"><strong>No.</strong></div></th>
      <th width="40%"><div align="center"><strong>Nama Kegiatan DPA</strong></div></th>
      <th width="15%"><div align="center"><strong>Kode Rekening</strong></div></th>
      <th width="15%"><div align="center"><strong>Anggaran</strong></div></th>
      <th width="15%"><div align="center"><strong>Terpakai</strong></div></th>
      <th width="15%"><div align="center"><strong>Sisa Anggaran</strong></div></th>
    </tr>
 </thead>


  <?php 
  
$baris = 1; $i=0;
if($pr->num_rows() > 0 ) {  
  
  foreach($pr->result() as $res) :
    $baris--;
    $i++; ?>

    <tr style="background-color: #FF99FF">
        <td colspan="2" width="45%"><strong><?php echo $res->program; ?></strong></td> 
        <td width="15%"><strong><?php echo $res->kode_program; ?></strong></td>
        <td width="15%" align="right"> </td> 
        <td width="15%" align="right"></td>
        <td width="15%"><div align="right"></div></td> 
    </tr>

    <?php 
  
$baris = 1; $i=0;
if($record->num_rows() > 0 ) {  
  
  foreach($record->result() as $row) :
    $baris--;
    $i++; 
    if ($res->id==$row->id_program) {?>
   
    <tr>
        <td width="5%"><div align="center"><?php echo $i; ?>.</div></td> 
        <td width="40%"><?php echo $row->nama_anggaran; ?></td>
        <td width="15%"><?php echo $row->kode; ?></td>
        <td width="15%" align="right"><?php echo uang($row->pagu) ?> </td> 
        <td width="15%" align="right"><?php 
         $sql = "SELECT  *,SUM(rc.`uang_harian`+rc.`uang_penginapan`+rc.`uang_transportasi`) AS jum FROM  rincianbiaya rc where id_anggaran = ".$row->id." ";
         $ck = $this->db->query($sql)->row_array();
             echo uang($ck["jum"]); 
          
        ?></td>
        <td width="15%"><div align="right"><?php 
         $sql = "SELECT  *,SUM(rc.`uang_harian`+rc.`uang_penginapan`+rc.`uang_transportasi`) AS jum FROM  rincianbiaya rc where id_anggaran = ".$row->id." ";
         $ck = $this->db->query($sql)->row_array();
             echo uang($row->pagu-$ck["jum"]); 
        ?></div></td> 
    </tr>
    <?php
    }
    ?>
<?php endforeach; }?>
    
<?php endforeach; }?>





 

    <tr>
      <td colspan="4"><div align="right"><strong>Total Seluruh Penggunaan Anggaran</strong> </div></td> 
      <td><div align="right"><strong><?php echo rupiah($total["jum"]) ?></strong> </div></td>
      <td></td>
    </tr>
</table>
</body>

</html>
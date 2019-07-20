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
<p align="center"> <span class="judul"><u>RINCIAN BIAYA PERJALANAN DINAS </u></span></p>
<table width="100%" border="0">
  <tr>
    <td width="22%">Lampiran SPD Nomor </td>
    <td width="2%">:</td>
    <td width="76%"><?php echo $no_sppd ?>/<?php echo $no_sppdx ?></td>
  </tr>
  <tr>
    <td>Tanggal</td>
    <td>:</td>
    <td><?php echo tgl_indo(flipdate($tanggal_sppd)) ?></td>
  </tr>
  <tr>
    <td>Tujuan</td>
    <td>:</td>
    <td><?php echo $tujuan ?></td>
  </tr>
</table>
<p></p>
<table width="100%" class="trek" cellpadding="4">
  <tr>
    <td width="5%"><div align="center"><strong>No</strong></div></td>
    <td width="44%"><div align="center"><strong>PERINCIYAN BIAYA</strong></div></td>
    <td width="19%"><div align="center"><strong>JUMLAH</strong></div></td>
    <td width="32%"><div align="center"><strong>KETERANGAN</strong></div></td>
  </tr>
  <tr>
    <td>1.<br><br>2.<br><br>3.</td>
    <td>Uang Harian<br><br>Penginapan<br><br>Transportasi <?php echo $set->tempat_surat ?> - <?php echo $tujuan ?> PP</td>
    <td><?php echo rupiah($uang_harian) ?><br><br><?php echo rupiah($uang_penginapan) ?><br><br><?php echo rupiah($uang_transportasi) ?></td>
    <td><div align="right"><?php echo $lamanya ?> hari<br>
        <br>
        <?php echo $lamanya ?> hari<br>
        <br>
    </div></td>
  </tr>
  
  <tr>
    <td colspan="2"><strong>Jumlah</strong></td>
    <td><strong><?php echo rupiah($uang_harian+$uang_penginapan+$uang_transportasi); ?></strong></td>
    <td>&nbsp;</td>
  </tr>
 
</table>

<p></p>
<table width="100%" border="0">
  <tr>
    <td width="60%"><div align="left">Telah dibayarkan uang sebesar </div></td>
    <td width="40%"><div align="left"><?php echo $set->tempat_surat ?>, <?php echo tgl_indo(flipdate($tanggal_kwitansi)) ?></div></td>
  </tr>
  <tr>
    <td><div align="left"><?php echo rupiah($uang_harian+$uang_penginapan+$uang_transportasi); ?></div></td>
    <td><div align="left">Telah menerima jumlah uang sebesar </div></td>
  </tr>
  <tr>
    <td><div align="left">Bendahara Pengeluaran </div></td>
    <td><div align="left"><?php echo rupiah($uang_harian+$uang_penginapan+$uang_transportasi); ?></div></td>
  </tr>
  <tr>
    <td><div align="left"></div></td>
    <td><div align="left">Yang Menerima Uang </div></td>
  </tr>
  <tr>
    <td><div align="left"></div></td>
    <td><div align="left"></div></td>
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
    <td><div align="left"></div></td>
    <td><div align="left"></div></td>
  </tr>
  <tr>
    <td><div align="left"><strong><u><?php echo $set->bendahara ?></u></strong></div></td>
    <td><div align="left"><strong><u><?php echo $nama ?></u></strong></div></td>
  </tr>
  <tr>
    <td><div align="left">NIP. <?php echo $set->nip_bendahara ?></div></td>
    <td><div align="left">NIP. <?php echo $nip ?></div></td>
  </tr>
</table>
<p></p><p></p>
<hr height="2">
<p align="center"> <span class="judul"><u>PERHITUNGAN SPPD RAMPUNG </u></span></p>
<table width="100%" border="0" >
  <tr>
    <td width="27%">Ditetapkan</td>
    <td width="2%">: </td>
    <td width="71%"><div align="left"><?php echo rupiah($uang_harian+$uang_penginapan+$uang_transportasi); ?></div></td>
  </tr>
  <tr>
    <td>Yang telah dibayar semula</td>
    <td>:</td>
    <td><div align="left"><?php echo rupiah($uang_harian+$uang_penginapan+$uang_transportasi); ?></div></td>
  </tr>
  <tr>
    <td>Sisa kurang/lebih</td>
    <td>:</td>
    <td>&nbsp;</td>
  </tr>
</table>
<table width="100%" border="0">
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
    <td width="60%"><div align="left"></div></td>
    <td width="40%"><div align="left"><?php echo $set->tempat_surat ?>, <?php echo tgl_indo(flipdate($tanggal_kwitansi)) ?></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Pengguna Anggaran </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><?php echo $set->instansi ?></td>
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
    <td><div align="left"><?php echo $set->nama_kepala ?></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><div align="left">NIP. <?php echo $set->nip_kepala ?></div></td>
  </tr>
</table>
</body>

</html>
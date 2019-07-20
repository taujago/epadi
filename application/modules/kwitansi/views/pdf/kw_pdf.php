<html>
  <head>
    <title>
      <?php echo   $title; ?>
    </title>
    
<style>
  * {
    font-size:8px;
  }
  .judul {
    font-size:18px;
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
  <table width="100%" border="0" cellspacing="2">
  <tr>
    <td width="50%" rowspan="3">	<img src="<?php echo base_url()."assets/images/" ?>/kw_logo.png" width="200" height="35" align="left" /></td>
    <td width="21%">Kode Rekening</td>
    <td width="29%">: <?php echo $kode_anggaran ?></td>
  </tr>
  <tr>
    <td>Dibukukan Tanggal</td>
    <td>:</td>
  </tr>
  <tr>
    <td>Nomor Buku</td>
    <td>:</td>
  </tr>
</table>

 <p align="center"> <span class="judul"><u>KWITANSI</u></span></p>
 <table width="100%" border="0" cellpadding="2">
   <tr>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td width="2%">&nbsp;</td>
     <td width="15%">&nbsp;</td>
     <td width="19%">&nbsp;</td>
     <td width="19%">&nbsp;</td>
     <td width="25%">&nbsp;</td>
   </tr>
   <tr class="">
     <td width="18%">TERIMA DARI </td>
     <td width="2%">:</td>
     <td colspan="5"><?php echo $dari ?></td>
   </tr>
    <tr class="">
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>BANYAKNYA UANG  </td>
      <td>:</td>
      <td colspan="5" class="border-lb"><b><i><?php echo strtoupper(terbilang($uang_harian+$uang_penginapan+$uang_transportasi)) ?> RUPIAH</i></b></td>
    </tr>
    <tr class="">
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr class="">
      <td>UNTUK PEMBAYARAN </td>
      <td>:</td>
      <td colspan="5">Biaya Perjalanan Dinas Ke <strong><?php echo $tujuan ?></strong> a.n. <strong><?php echo $nama ?></strong></td>
    </tr>
	<tr class="">
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	  <td colspan="5"><?php echo $jabatan ?> pada <?php echo $set->instansi ?></td>
   </tr>
	<tr class="">
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	  <td colspan="5">Sesuai SPD No. <strong><?php echo $no_sppd ?>/<?php echo $no_sppdx ?></strong> Tanggal <?php echo tgl_indo(flipdate($tanggal_sppd)) ?> dengan rincian sbb : </td>
   </tr>
	<tr class="">
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	  <td>a.</td>
	  <td>Biaya Harian </td>
	  <td><strong><?php echo $golongan ?></strong></td>
	  <td><?php echo $lamanya ?> hari x <?php echo rupiah($lumpsum) ?></td>
	  <td>= <?php echo rupiah($lumpsum*$lamanya) ?></td>
   </tr>
	<tr class="">
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	  <td>b.</td>
	  <td>Biaya Penginapapan </td>
	  <td><strong><?php echo $golongan ?></strong></td>
	  <td><?php echo $lamanya ?> hari x <?php echo rupiah($penginapan) ?></td>
	  <td>= <?php echo rupiah($penginapan*$lamanya) ?></td>
   </tr>
	<tr class="">
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	  <td>c.</td>
	  <td>Biaya Transportasi </td>
	  <td colspan="2"><strong><?php echo $set->tempat_surat ?> - <?php echo $tujuan ?> PP</strong></td>
	  <td>= <?php echo rupiah($transportasi) ?></td>
   </tr>
	<tr class="">
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	  <td colspan="5"><hr align="left" width="100%" noshade ></td>
   </tr>
	<tr class="">
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	  <td></td>
	  <td colspan="3"><strong>Jumlah</strong></td>
	  <td><strong>= <?php echo rupiah(($lumpsum*$lamanya)+($penginapan*$lamanya)+$transportasi) ?></strong></td>
   </tr>
 </table>
 
 <table width="100%" border="0" cellpadding="5">
  <tr>
    <td colspan="2" width="40%"><img src="<?php echo base_url("assets/images/lineup.jpg"); ?>"  height="100%" align="right" /></td>
    <td width="65%">&nbsp;</td>
  </tr>
  <tr>
    <td width="14%"><strong>TERBILANG Rp.</strong></td>
    <td width="21%" class="border-lb"><strong> <span style="padding-bottom: 10px"><?php echo uang($uang_harian+$uang_penginapan+$uang_transportasi); ?></span></strong></td>
    <td >&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" width="40%"><img src="<?php echo base_url("assets/images/linedown.jpg"); ?>"  height="100%" align="right" /></td>
    <td>&nbsp;</td>
  </tr>
</table>
<p></p>
<p></p>
<table width="100%" border="0">
  <tr>
    <td><div align="center">Mengetahui / Menyetujui</div></td>
    <td><div align="center">Lunas di bayar </div></td>
    <td><div align="center"><?php echo $set->tempat_surat ?>, <?php echo tgl_indo(flipdate($tanggal_kwitansi)) ?></div></td>
  </tr>
  <tr>
    <td><div align="center">Pengguna Anggaran</div></td>
    <td><div align="center">Bendahara </div></td>
    <td><div align="center">Yang Menerima &nbsp;Uang</div></td>
  </tr>
  <tr>
    <td><div align="center">BKD Kab. <?php echo $set->kota ?></div></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><div align="center"><u><strong><?php echo $set->nama_kepala ?></strong></u></div></td>
    <td><div align="center"><u><strong><?php echo $set->bendahara ?></strong></u></div></td>
    <td><div align="center"><u><strong><?php echo $nama ?></strong></u></div></td>
  </tr>
  <tr>
    <td><div align="center">NIP. <?php echo $set->nip_kepala ?></div></td>
    <td><div align="center">NIP. <?php echo $set->nip_bendahara ?></div></td>
    <td><div align="center">NIP. <?php echo $nip ?></div></td>
  </tr>
</table>

</body>

</html>
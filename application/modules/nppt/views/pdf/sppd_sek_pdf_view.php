<html>
  <head>
    <title>
      <?php echo   $title; ?>
    </title>
    
<style>
  * {
    font-size:10px;
    font-family: "Times New Roman", Times, serif; 
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
 <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/print_style.css">
  </head>

<body>
<?php 
$set = $this->cm->setting();
  if ($this->uri->segment(2)=="pdf_sppd_bupati") {
     $this->load->view("kop_bupati");
  } else {?>
    <table width="100%" border="0" cellpadding="3">
  
  <tr>
    <td width="20%" align="center">
      <img src="<?php echo base_url()."assets/images/" ?>/<?php echo $set->logo ?>" width="48" height="55" align="right" />
    </td>
    <td width="70%" align="center">
      <?php echo $set->kop_sek; ?>
    </td>
    <td width="23%" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" width="100%"><img src="<?php echo base_url("assets/images/linekop.png"); ?>"  height="5" width="600" /></td>
  </tr>
</table>
    <?php
  }
  
  ?>
<table width="100%" >
  <tr>
    <td width="55%">&nbsp;</td>
    <td width="14%">Lembar ke </td>
    <td width="31%">:</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Kode No </td>
    <td>: <?php echo $no_sppd ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Nomor</td>
    <td>: <?php echo $no_sppdx ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3"><div align="center"><span class="judul"><u>SURAT PERJALANAN DINAS</u></span></div></td>
  </tr>
  <tr>
    <td colspan="3"><div align="center"><span class="judul">(SPD)</span></div></td>
  </tr>
  <tr>
    <td colspan="3"></td>
  </tr>
</table>
<table width="100%" class="trek" cellpadding="2">
  <tr>
    <td width="4%">1.</td>
    <td width="46%">Pejabat yang memberi perintah </td>
    <td width="50%"><?php echo $pejabat_perintah ?></td>
  </tr>
  <tr>
    <td>2.</td>
    <td>Nama / NIP Pegawai yang diperintah</td>
    <td><?php echo $nama_pegawai ?> / <?php echo $nip_pegawai ?></td>
  </tr>
  <tr>
    <td>3.</td>
    <td>a. Pangkat dan Golongan menurut PP No. 11 Tahun 2011<br>b. Jabatan<br>c. Tingkat menurut peraturan perjalanan</td>
    <td><?php echo $pangkat_pegawai ?> <?php echo $master_gol; ?><br><?php echo $jabatan_pegawai ?><br><?php echo $golongan ?></td>
  </tr>
  
  <tr>
    <td>4.</td>
    <td>Maksud Perjalan Dinas </td>
    <td><?php echo $maksud ?></td>
  </tr>
  <tr>
    <td>5.</td>
    <td>Alat Angkutan Yang di Pergunakan </td>
    <td><?php echo $transportasi ?></td>
  </tr>
  <tr>
    <td>6.</td>
    <td>a. Tempat Berangkat <br>b. Tempat Tujuan </td>
    <td><?php echo $set->tempat_surat ?><br><?php echo $nama_tujuan ?></td>
  </tr>
  
  <tr>
    <td>7.</td>
    <td>a. Lama Perjalanan Dinas <br>b. Tanggal Berangkat <br>c. Tanggal Kembali</td>
    <td><?php echo lama($tgl_pergi,$tgl_kembali) ?> hari<br><?php echo tgl_indo(flipdate($tgl_pergi)) ?><br><?php echo tgl_indo(flipdate($tgl_kembali)) ?></td>
  </tr>
  
  <tr>
    <td>8.</td>
    <td>Pengikut</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>9.</td>
    <td>Pembebanan Anggaran </td>
    <td>DPA BKD </td>
  </tr>
  <tr>
    <td>10.</td>
    <td>a. Instansi <br>b. Mata Anggaran </td>
    <td><?php echo $set->instansi ?><br><?php echo $mata_anggaran ?><br><?php echo $kode ?> </td>
  </tr>
  
  <tr>
    <td>11.</td>
    <td>Keterangan Lain-Lain </td>
    <td><?php echo $ket_lain ?></td>
  </tr>
</table>

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
    <?php if ($this->uri->segment(5)=="wakil") {?>
      <td width="46%"><div align="center"><strong>WAKIL BUPATI <?php echo strtoupper($set->kota) ?>,</strong></div></td>
    <?php
    } else {?>
<td width="46%"><div align="center"><strong>BUPATI <?php echo strtoupper($set->kota) ?>,</strong></div></td>
<?php
    }

     ?>
    
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
    <?php if ($this->uri->segment(5)=="wakil") {?>
       <td><div align="center"><strong><?php echo $set->nama_wakil_bupati ?></strong></div></td>
       <?php
    } else {?>
    <td><div align="center"><strong><?php echo $set->nama_bupati ?></strong></div></td>
    <?php
    }

     ?>
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
    <td width="46%"><div align="center"><strong>An. BUPATI <?php echo strtoupper($set->kota) ?>
        
    </strong></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><div align="center"><strong>SEKRETARIS DAERAH </strong></div></td>
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
    <td><div align="center"><strong><?php echo $set->nama_sekda ?></strong></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><div align="center"><strong><?php echo $set->pangkat_sekda ?></strong></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><div align="center"><strong>NIP. <?php echo $set->nip_sekda ?></strong></div></td>
  </tr>
</table>

<?php   
  }
 ?>
<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
<table width="100%" class="trek" cellpadding="2">
  <tr>
    <td width="50%">&nbsp;</td>
    <td width="50%">I Berangkat dari	:<br>Tempat Kedudukan)	:<br>Pada Tanggal		:<br>Ke					: <br><br><br><br><br>
      <hr width="50%">NIP. </td>
  </tr>
  
  <tr>
    <td><br><br>II Tiba di :<br>Pada Tanggal :<br>Kepala : </td>
    <td>Berangkat dari :<br>Ke:<br>Pada Tangal :<br><br>Kepala</td>
  </tr>
  <tr>
    <td><br><br>	III Tiba di :<br>Pada Tanggal :<br>Kepala : </td>
    <td>Berangkat dari :<br>Ke:<br>Pada Tangal :<br><br>Kepala</td>
  </tr>
  <tr>
    <td><br><br>	IV Tiba di :<br>Pada Tanggal :<br>Kepala : </td>
    <td>Berangkat dari :<br>Ke:<br>Pada Tangal :<br><br>Kepala</td>
  </tr>
  
  
  <tr>
    <td>V</td>
    <td>Tiba Kembali di : <?php echo $set->tempat_surat ?><br>Pada Tanggal : <br><br>Telah diperiksa, dengan keterangan bahwa perjalanan tersebut di atas benar dilakukan atau perintahnya dan semata-mata untuk kepentingan jabatan dalam waktu yang sesingkat-singkatnya<br><br>
      <?php 
      // echo "segment 5 " .$this->uri->segment(5) ; 
       if($this->uri->segment(5)=="bupati")  {  

        
        $nama =  $set->nama_bupati ; 
        $jabatan = "BUPATI "; 
        $tambahan = "";
        $pangkat = "";
        $nip ="";

        }  
      else if($this->uri->segment(5)=="wakil") {
        $nama = $set->nama_wakil_bupati; 
        $jabatan = "WAKIL BUPATI ";
        $tambahan = "";
        $pangkat = "";
        $nip ="";
      }
      else {
        $nama = $set->nama_sekda; 
        $jabatan = "a.n. BUPATI ";
        $tambahan = "SEKRETARIS DAERAH ";
        $pangkat = $set->pangkat_sekda;
        $nip =  $set->nip_sekda;
      }
      ?>
      <strong><?php echo $jabatan;  ?> <?php echo strtoupper($set->kota) ?>,<br>
      <?php echo $tambahan; ?>
      
      
      <br>
      <br>
      <br>
      <br>
      <br /><?php echo $nama; ?></strong><br /> 
      <?php echo $pangkat; ?> <br /> 
       <?php echo $nip; ?> <br /> 
    </td>
  </tr>
  <tr>
    <td colspan="2"><strong>VI CATATAN LAIN</strong></td>
  </tr>
  <tr>
    <td colspan="2"><strong>VII PERHATIAN</strong><br>Pejabat yang berwenang menerbitkan SPPD. Pegawai yang melakukan perjalanan dinas, para pejabat yang mengesahkan tanggal berangkat/tiba serta Bendaharawan bertanggung jawab berdasarkan peraturan-peraturan Keuangan Negara apabila Negara mendapat rugi akibat kesalahan, kealpaanya. </td>
  </tr>
</table>

</body>

</html>
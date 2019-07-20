<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
	<meta name="author" content="agungshiro" />
	<link href="<?php echo $this->load->config->item('css');?>style.css" rel="stylesheet" media="screen" />
    <link href="<?php echo $this->load->config->item('css');?>print.css" rel="stylesheet" media="print" />
    <title>Gapoktan</title>
</head>

<body class="surat potrait">
<div class="wrap-potrait">
    <!-- HEADER SECTION -->
    <div class="header-wrap">
        <div class="logo-wrap">
            <div class="logo"><img src="<?php echo $this->load->config->item('images');?>/logo.jpg" width="90px" /></div>
        </div>
         <div class="head-text">
            <h2 class="upper-case">Pemerintah kabupaten <?php echo $this->core_model->kabupaten?></h2>
            <h2 class="upper-case">Kecamatan <?php echo $this->core_model->kecamatan; ?></h2>
            <h1 class="upper-case">Kantor kepala desa <?php echo $this->core_model->desa; ?></h1>
            <h2><?php echo $this->core_model->alamat; ?> Telepon <?php echo $this->core_model->telpon; ?></h2>
            <h2><?php echo $this->core_model->desa; ?> <?php echo $this->core_model->kodepos; ?></h2>
        </div>
        <div class="logo-wrap">
            <!--- NO LOGO -->
        </div>
        <div class="clear"></div>
    </div>
    <hr class="thick" />
    <hr class="thin"/>
    <!-- END OF HEADER SECTION -->
    
    <div class="body wrap">
        <!-- JUDUL DAN NOMOR SURAT -->
        <div class="no-surat-wrap">
            <div class="nama-surat">
                <h3>Surat keterangan domisili perusahaan</h3>
            </div>
            <div class="kode">
                <span class="code" style="border-top: solid black 1px;">
                    Nomor Reg. : 470 / ...... /..../ 429.405.03 / <?php echo date("Y") ?>
                </span>
            </div>
        </div>
        <!-- KONTEN IDENTITAS-->
        <div class="content">
            <ul>
            <?php $arr = array(1=>"WNI","WNA")?>
                <li><span class="label" style="width: 200px;">Nama</span>:<span class="field"><?php echo $nama?></span></li>
                <li><span class="label" style="width: 200px;">Umur</span>:<span class="field"> <?php echo $this->core_model->umur($tgl_lahir2)?></span> Tahun</li>
                <li><span class="label" style="width: 200px;">Jenis Kelamin</span>:<span class="field"><?php echo $jk?></span></li>
                <li><span class="label" style="width: 200px;">Kewarganegaraan</span>:<span class="field"><?php echo $arr[$warga_negara]?></span></li>
                <li><span class="label" style="width: 200px;">No.KTP</span>:<span class="field"><?php echo $nik?></span></li>
                <li><span class="label" style="width: 200px;">Nama Perusahaan</span>:<span class="field"><?php echo $nama_perusahaan?></span></li>
                <li><span class="label" style="width: 200px;">Jenis Usaha / Klarifikasi</span>:<span class="field"><?php echo $jenis_usaha?></span></li>
                <li><span class="label" style="width: 200px;">Alamat Perusahaan</span><div style="float:left">:</div>
                    <div class="field"> <?php echo $alamat_perusahaan ?>
                        <br />
                        <br />
                    </div>
                </li>
                <div class="clear"> </div>
                <li><span class="label" style="width: 200px;">Status Bangunan</span>:<span class="field"><?php echo $status_bangunan?></span></li>
                <li><span class="label" style="width: 200px;">Peruntukan Bangunan</span>:<span class="field"><?php echo $peruntukan_bangunan?></span></li>
                <li><span class="label" style="width: 200px;">Nomor dan Tanggal IPB</span>:<span class="field"><?php echo $nomor_ipb . " / ". flip_date($tgl_ipb)?></span></li>
                <li><span class="label" style="width: 200px;">Jumlah Karyawan</span>: <span class="field"> <?php echo $jumlah_karyawan?>  orang</span></li>
                <li><span class="label" style="width: 200px;">Pimpinan Perusahaan</span>:<span class="field"><?php echo $nama_pimpinan?></span></li>
                <li>Surat keterangan ini dikeluarkan akan dipergunakan untuk : 
                <?php echo $peruntukan?>
                <br /><br /><hr /></li>
            </ul>
            <div class="clear"></div>
        </div>
        <!-- KONTEN FOOTER TANDA TANGAN lurah 1 -->
        <div class="content">
            <div class="ttd-camat">
                <div class="tgl-surat">Tandan tangan Ybs,</div>
                <div class="jabatan"><br /></div>
                <div class="nama-lurah"><?php echo $nama?></div>
            </div>
            <div class="ttd-single-wrap">
               <div class="tgl-surat"><?php echo $nama_desa; ?>, <?php echo date("d-m-Y")?></div>
                <div class="jabatan">Kepala desa <?php echo $nama_desa; ?></div>
                <div class="nama-lurah"><?php echo $nama_kepala_desa; ?></div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>
</body>
</html>
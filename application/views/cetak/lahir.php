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
                <h3>Surat keterangan kelahiran</h3>
            </div>
            <div class="kode">
                <span class="code" style="border-top: solid black 1px;">
                    Nomor Reg. : 470 / ....... /.../ 429.405.03 / <?php echo date("Y")?>
                </span>
            </div>
        </div>
        <!-- KONTEN IDENTITAS-->
        <div class="content">
            <ol type="1">
                <li>Yang bertanda tangan dibawah ini, kami :
                    <ol type="a" class="sub">
                        <li><span class="label">Nama</span>:<span class="field"><b><?php echo $nama_kepala_desa; ?></b></span></li>
                        <li><span class="label">Jabatan</span>:<span class="field"><b>KEPALA DESA</b></span></li>
                    </ol>
                    dengan ini menerangkan bahwa, pad :
                    <ol type="a" class="sub">
                        <li><span class="label">Hari</span>:<span class="field"><?php echo $this->cm->day_name($tgl_lahir_anak) ;?></span></li>
                        <li><span class="label">Tanggal</span>:<span class="field"><?php echo @flip_date($tgl_lahir_anak);?></span></li>
                        <li><span class="label">Di</span>:<span class="field"><?php echo $tmp_lahir_anak ?></span></li>
                        Telah lahir seorang anak : <?php echo $arr_jk[$jk_anak]?> <!--  <span class="box"></span>Laki - lak <span class="box"></span>Perempuan  -->
                        <li><span class="label">Diberi nama</span>:<span class="field"><?php echo strtoupper($nama_anak) ?></span></li>
                        <li><span class="label">Nama Ibu</span>:<span class="field"><?php echo $nama_ibu ?></span></li>
                        <li><span class="label">Nama Ayah</span>:<span class="field"><?php echo $nama_ayah ?></span></li>
                        <li><span class="label">Alamat</span><div style="float:left">:</div>
                            <div class="field">RT <?php echo $rt_ayah ?> RW <?php echo $rw_ayah ?> Dusun <?php echo $dusun_ayah ?>
                            <br />Desa <?php echo $desa_ayah ?>, Kecamatan <?php echo $kota_ayah ?>
                            <br />Kabupaten <?php echo $kabupaten_ayah ?>
                            </div>
                        </li>
                    </ol>
                    <div class="clear"></div>
                </li>
                <li>Surat keterangan ini dikeluarkan atas dasar keterangan dari pada kedua orang tuanya</li>
                <li>Surat keterangan ini dikeluarkan akan dipergunakan untuk :<br /><br /> <?php echo $peruntukan ;?> <hr /><br /><hr /></li>
                <li>Demikian untuk menjadikan periksa adanya</li>
            </ol>
        </div>
        <!-- KONTEN FOOTER TANDA TANGAN lurah 1 -->
        <div class="content">
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
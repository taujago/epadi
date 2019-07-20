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
                <h3>Surat keterangan kehilangan</h3>
            </div>
            <div class="kode">
                <span class="code" style="border-top: solid black 1px;">
                    Nomor Reg. : 470 / ..... /.../ 429.405.03 / <?php echo date("d-m-Y")?>
                </span>
            </div>
        </div>
        <!-- KONTEN IDENTITAS-->
        <div class="content">
            <p>Pada hari ini  <?php echo $this->cm->day_name($tgl_hilang)?> tanggal, <?php echo flip_date($tgl_hilang)?>  Pukul : <?php echo $jam_hilang?> WIB, telah datang menghadap kami : <b><?php echo $nama_sek_desa ?></b>,  
            Jabatan : <b>Sekretaris Desa <?php echo $nama_desa;?> -----------------------------------</b>seorang yang kami kenal mengaku bernama : <b>-----------------------: <?php echo $nama; ?>:---------------------- </b>
            umur :  <?php echo $this->cm->umur($tgl_lahir2) ?> tahun, Jenis kelamin :  <?php echo $arr_jk[$jk] ?>, Agama : <?php echo $agama?></p>
            <div style="width: 50%; float: left;">
                    <ul type="a" class="sub">
                        <li><span class="label">Kewarganegaraan</span>:<span class="field"><?php echo $arr_warga_negara[$warga_negara] ?></span></li>
                        <li><span class="label">Nomor KTP</span>:<span class="field"><?php echo $nik ?></span></li>
                        <li><span class="label">Desa</span>:<span class="field"><?php echo $desa;?></span></li>
                        <li><span class="label">Kabupaten</span>:<span class="field"><?php echo $kabupaten; ?></span></li>
                    </ul>
                    <div class="clear"></div>
            </div>
            <div style="width: 50%; float: left;">
                    <ul type="a" class="sub">
                        <li><span class="label">Pekerjaan</span>:<span class="field"><?php echo $pekerjaan; ?></span></li>
                        <li><span class="label">Dusun</span>:<span class="field"><?php echo $dusun; ?></span></li>
                        <li><span class="label">Kecamatan</span>:<span class="field"><?php echo $kota; ?></span></li>
                        <li><span class="label">Propinsi</span>:<span class="field"><?php echo $provinsi; ?></span></li>
                    </ul>
                    <div class="clear"></div>
            </div>
            <div style="text-align: center; font-weight: bold;">------------------------------- MELAPORKAN TELAH KEHILANGAN : ---------------------------------------</div>
            <b>Kartu tanda penduduk ( KTP )</b> atas nama <?php echo $nama_hilang?>
                    <ul type="a" class="sub">
                        <li><span class="label">Jenis Kelamin</span>:<span class="field"><?php echo $arr_jk[$jk_hilang] ?></span></li>
                        <li><span class="label">Tempat/Tgl Lahir</span>:<span class="field"><?php echo $tmp_lahir_hilang.", ".$tgl_lahir_hilang; ?></span></li>
                        <li><span class="label">Status Perkawinan</span>:<span class="field"><?php echo $arr_status_kawin[$status_kawin_hilang]?></span></li>
                        <li><span class="label">Agama</span>:<span class="field"><?php echo $agama_hilang; ?></span></li>
                        <li><span class="label">Pekerjaan</span>:<span class="field"><?php echo $pekerjaan_hilang; ?></span></li>
                        <li><span class="label">Tempat Tinggal</span><div style="float:left">:</div>
                            <div class="field">RT <?php echo $rt_hilang ?> RW <?php echo $rw_hilang ?> Dusun <?php echo $dusun_hilang ?>
                            <br />Desa <?php echo $desa_hilang ?>, Kecamatan <?php echo $kota_hilang ?>
                            <br />Kabupaten <?php echo $kabupaten_hilang ?>
                            </div>
                        </li>
                        <div class="clear"></div>
                    </ul>
                    <div class="clear"></div>
            <p>Sipelapor berusaha untuk mencarinya atas barang-barang yang hilang, namun sampai saat ini hasilnya <b>NIHIL</b>.</p>
            <p>Surat keterangan ini kami keluarkan untuk memudahkan pengurusan kembali atas barang-barang yang hilang dan kebenaran atas barang yang hilang tergantung pada Sipelapor</p>
            <p>Demikian untuk menjadikan periksa dan dipergunakan sebagaimana mestinya</p>
        </div>
        <!-- KONTEN FOOTER TANDA TANGAN lurah 1 -->
        <div class="content">
            <div class="ttd-camat">
                <div class="tgl-surat"><br /></div>
                <div class="jabatan" style="text-transform: none;">Pelapor</div>
                <div class="nama-lurah"><?php echo $nama ;?></div>
            </div>
            <div class="ttd-single-wrap">
                <div class="tgl-surat"> <?php echo $nama_desa ?>, <?php echo  date("d-m-Y") ?></div>
                <div class="jabatan" style="text-transform: none;">Yang Menerima Laporan</div>
                <div class="nama-lurah"><?php echo $nama_sek_desa;?></div>
            </div>
            <div class="clear"></div>
            <div style="text-align: center;">
                Mengetahu
                <div class="jabatan">Kepala desa <?php echo $nama_desa;?></div>
                <div class="nama-lurah"><?php echo $nama_kepala_desa ;?></div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
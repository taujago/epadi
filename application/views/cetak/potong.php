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
                <h3>Surat ijin memotong kayu</h3>
            </div>
            <div class="kode">
                <span class="code" style="border-top: solid black 1px;">
                    Nomor Reg. : 470 / ...... /.../ 429.405.03 / <?php echo date("Y")?>
                </span>
            </div>
        </div>
        <!-- KONTEN IDENTITAS-->
        <div class="content">
            <ol type="1">
                <li>Yang bertanda tangan dibawah ini, kami :
                    <ol type="a" class="sub">
                        <li><span class="label">Nama</span>:<span class="field"><b><?php echo $nama_kepala_desa;?></b></span></li>
                        <li><span class="label">Jabatan</span>:<span class="field"><b>KEPALA DESA</b></span></li>
                    </ol>
                    dengan ini menerangkan bahwa, seorang :
                    <ol type="a" class="sub">
                        <li><span class="label">Nama</span>:<span class="field"><?php echo $nama; ?></span></li>
                        <li><span class="label">Tempat/Tgl Lahir</span>:<span class="field"><?php echo $tmp_lahir.", $tgl_lahir"; ?></span></li>
                        <li><span class="label">Jenis Kelamin</span>:<span class="field"><?php echo $jk; ?></span></li>
                        <li><span class="label">Agama</span>:<span class="field"><?php echo $agama; ?></span></li>
                        <li><span class="label">Kewarganegaraan</span>:<span class="field"><?php echo $arr_warga_negara[$warga_negara]; ?></span></li>
                        <li><span class="label">Status Perkawinan</span>:<span class="field"><?php echo $this->cm->arr_status_kawin[$status_kawin]; ?></span></li>
                        <li><span class="label">Pekerjaan</span>:<span class="field"><?php echo $pekerjaan; ?></span></li>
                        <li><span class="label">Tempat Tinggal</span><div style="float:left">:</div>
                            <div class="field">RT <?php echo $rt; ?> RW <?php echo $rw; ?> Dusun <?php echo $dusun; ?>
                            <br />Desa <?php echo $desa; ?>, Kecamatan <?php echo $kota; ?>
                            <br />Kabupaten <?php echo $kabupaten; ?>
                            </div>
                        </li>
                    </ol>
                    <div class="clear"></div>
                </li>
                <li>Orang tersebut diatas adalah benar-benar Berdomisili di RT <?php echo $rt; ?> RW <?php echo $rw; ?> Dusun <?php echo $dusun; ?>
                           Desa <?php echo $desa; ?>, Kecamatan <?php echo $kota; ?>
                          Kabupaten <?php echo $kabupaten; ?> yang menurut keterangannya mempunyai Kayu Jati sebanyak 100 (Seratus) pohon di atas tanah :
                    <ul class="sub">
                        <li><span class="label">Petok Nomor</span>:<span class="field"><?php echo $hgu_no_petok?></span></li>
                        <li><span class="label">Persil No.</span>:<span class="field"><?php echo $hgu_no_persil?></span></li>
                        <li><span class="label">Klas</span>:<span class="field"><?php echo $hgu_kelas?></span></li>
                        <li><span class="label">Luas</span>:<span class="field"><?php echo $hgu_luas?> m<sup>2</sup></span></li>
                        <li><span class="label" style="width: 280px;">Sertifikat Hak Guna Usaha (HGU) No.</span>:<span class="field"><?php echo $hgu_no_sertifikat?></span></li>
                        <li><span class="label" style="width: 280px;">Gambar Situasi No.</span>:<span class="field"><?php echo $hgu_no_gambar?></span></li>
                        <li><span class="label" style="width: 280px;">Atas Nama </span>:<span class="field"><?php echo $hgu_atas_nama?></span></li>
                        <li><span class="label" style="width: 280px;">Luas</span>:<span class="field"><?php echo $hgu_luas?> m<sup>2</sup></span></li>
                        <li><span class="label" style="width: 280px;">SPPT No. </span>:<span class="field"><?php echo $hgu_no_sppt?></span></li>
                        <li><span class="label" style="width: 280px;">Letak Lokasi Tanah di</span><div style="float:left">:</div>
                            <div class="field">RT <?php echo $hgu_rt_lokasi?> RW <?php echo $hgu_rw_lokasi?> Dusun <?php echo $hgu_dusun?>
                            <br />Desa <?php echo $hgu_desa?>, Kecamatan <?php echo $hgu_kota?>
                            <br />Kabupaten <?php echo $hgu_kabupaten?>
                            </div>
                        </li>
                        <div class="clear"></div>
                    </ul>
                </li>
                <li>Surat keterangan ini dikeluarkan akan dipergunakan untuk mengajukan Rekomendasi Ijin Pemotongan Kayu ke Kantor Dinas Kehutanan.</li>
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
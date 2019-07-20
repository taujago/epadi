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
                <h3>Surat pernyataan Miskin (SPM)</h3>
            </div>
            <div class="kode">
                <span class="code" style="border-top: solid black 1px;">
                    Nomor Reg. : 470 / ...... /.../ 429.405.03 / <?php echo date("Y")?>
                </span>
            </div>
        </div>
        <!-- KONTEN IDENTITAS-->
        <div class="content">
            <ul>
                <li>Yang bertanda tangan dibawah ini, kami :
                    <ol type="a" class="sub">
                        <li><span class="label">Nama</span>:<span class="field"><b><?php echo $nama_kepala_desa ;?></b></span></li>
                        <li><span class="label">Jabatan</span>:<span class="field"><b>KEPALA DESA </b></span></li>
                    </ol>
                    dengan ini menyatakan dengan sebenarnya bahwa, seorang :
                    <ol type="a" class="sub">
                        <li><span class="label">Nama</span>:<span class="field"><?php echo $nama; ?></span></li>
                        <li><span class="label">Jenis Kelamin</span>:<span class="field"><?php echo $arr_jk[$jk]; ?></span></li>
                        <li><span class="label">Tempat Tinggal</span><div style="float:left">:</div>
                            <div class="field">RT <?php echo $rt; ?> RW <?php echo $rw; ?> Dusun <?php echo $dusun; ?>
                            <br />Desa <?php echo $desa; ?>, Kecamatan <?php echo $kota; ?>
                            <br />Kabupaten <?php echo $kabupaten; ?>
                            </div>
                        </li>
                    </ol>
                    <div class="clear"></div>
                </li>
            </ul>
            <p>Adalah benar-benar masyarakat miskin sesuai dengan 15 indikator / kriteria Pendataan Keluarga Miskin terlampir.</p>
            <p>
                <div class="judul-tabel">Rincian anggota keluarga sebagai berikut</div>
                <table border="1px" cellpadding="10" cellspacing="0" width="700px">
                    <tr class="head">
                        <td width="10px">No. </td>
                        <td>Nama</td>
                        <td width="120px">Hub. Keluarga</td>
                        <td width="120px">Jenis Kelamin</td>
                        <td width="150px">Tempat/tanggal lahir</td>
                    </tr>
                    <?php if ($rec_anggota->num_rows() == 0  ) { ?>
                    <tr><td></td><td></td><td></td><td></td> <td></td> </tr>
                    
                    <?php
					 } 
					else {
                    $x=0; foreach($rec_anggota->result() as $row ) : $x++; ?>
                    <tr>
                        <td><?php echo $x;?></td>
                        <td><?php echo $row->nama;?></td>
                        <td><?php echo $arr_hubungan[$row->sebagai];?></td>
                        <td><?php echo $arr_jk[$row->jk];?></td>
                        <td><?php echo $row->tmp_lahir. ", ". $tgl_lahir ;?></td>
                    </tr>
                    <?php endforeach; }  ?>
                </table>
            </p>
            <p>Apabila ada keterangan yang tidak benar, kami bersedia bertanggungjawab dan menerima konsekuensinya.</p>
            <p>Demikian surat keterangan ini kami buat untuk dipergunakan sebagaimana mestinya</p>
        </div>
        <!-- KONTEN FOOTER TANDA TANGAN lurah 1 -->
        <div class="content">
            <div class="ttd-camat">
                <div class="tgl-surat">Mengetahui,</div>
                <div class="jabatan">Camat <?php echo $kecamatan?></div>
                <div class="nama-lurah"></div>
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
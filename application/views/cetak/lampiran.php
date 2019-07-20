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
    <div class="body wrap">
        <!-- KONTEN IDENTITAS-->
        <div class="content" style="line-height: 20px;">
            <div style="width: 50%; float: left;">
                <span class="label" style="width: 90px;">Lampiran</span>
                <div style="float: left;">:</div>
                <div class="field" style="width: 230px;">5 Lembar</div>
                <div class="clear"></div>
                <span class="label" style="width: 90px;">Hal</span>
                <div style="float: left;">:</div>
                <div class="field" style="width: 230px; font-weight: bold;">Permohonan untuk mendapatkan Akta  Kelahiran (Pokok/Dispensasi/Ijin terlambat)
                </div>
                <div class="clear"></div>
            </div>
            <div style="width: 40%; float: left; padding-left: 10px; font-weight: bold;">
                Kepada.<br />
                Yth.Kepala Dinas Kependudukan<br />
                Kabupaten <?php echo $nama_kabupaten;?><br />
                di<br />
                <?php echo $nama_kabupaten;?>
            </div>
            <div class="clear"></div>
        </div>
        <div class="content"  style="line-height: 20px;">
            <ul>
                Yang Bertanda tangan di bawah ini :
                <li><span class="label">Nama</span>:<span class="field">Agung Wahyudiono</span></li>
                <li><span class="label">Umur</span>:<span class="field">Pati</span></li>
                <li><span class="label">Pekerjaan</span>:<span class="field">field</span></li>
                <li><span class="label">Tempat Tinggal</span><div style="float:left">:</div>
                    <div class="field">
                        <br />
                        <br />
                    </div>
                </li>
                <div class="clear"></div>
                <br />
                dengan ini mengajukan permohonan untuk mencatatkan kelahiran atas nama : <?php echo $nama_anak; ?>
                <li><span class="label">Jenis Kelamin</span>:<span class="field"><?php echo $arr_jk[$jk_anak]; ?></span></li>
                <li><span class="label">Anak ke</span>:<span class="field"><?php echo $anak_ke; ?></span></li>
                <li><span class="label">Tempat Lahir</span>:<span class="field"><?php echo $tmp_lahir_anak; ?></span></li>
                <li><span class="label">Tanggal Lahir</span>:<span class="field"><?php echo @flip_date($tgl_lahir_anak); ?></span></li>
                <br />
                Dari Suami - Istri :
                <li><span class="label">Ayah Bernama</span>:<span class="field"><?php echo $nama_ayah; ?></span></li>
                <li><span class="label">Umur</span>:<span class="field"><?php echo $this->cm->umur(flip_date($tgl_lahir_ayah)); ?></span></li>
                <li><span class="label">Pekerjaan</span>:<span class="field"><?php echo $pekerjaan_ayah; ?></span></li>
                <li><span class="label">Agama</span>:<span class="field"><?php echo $agama_ayah; ?></span></li>
                <li><span class="label">Tempat Tinggal</span><div style="float:left">:  </div>
                    <div class="field"> RT <?php echo $rt_ayah; ?> RW <?php echo $rw_ayah; ?> Dusun <?php echo $dusun_ayah; ?>
							Desa <?php echo $desa_ayah; ?> 
                        <br />
                        <br />
                    </div>
                </li>
                <div class="clear"></div>
                <li><span class="label">Ibu Bernama</span>:<span class="field"><?php echo $nama_ibu; ?></span></li>
                <li><span class="label">Umur</span>:<span class="field"><?php echo $this->cm->umur(flip_date($tgl_lahir_ibu)); ?></span></li>
                <li><span class="label">Pekerjaan</span>:<span class="field"><?php echo $pekerjaan_ibu; ?></span></li>
                <li><span class="label">Agama</span>:<span class="field"><?php echo $agama_ibu; ?></span></li>
                <li><span class="label">Tempat Tinggal</span><div style="float:left">:</div>
                    <div class="field"> 
                    RT <?php echo $rt_ibu; ?> RW <?php echo $rw_ibu; ?> Dusun <?php echo $dusun_ibu; ?>
							Desa <?php echo $desa_ibu; ?> 
                        <br />
                        <br />
                    </div>
                </li>
                <div class="clear"></div>
            </ul>
        </div>
        <div class="content"  style="line-height: 20px;">
            <div style="width: 50%; float: left;">
            <div style="text-align: center;font-weight: bold;">SAKSI I</div> 
            <ul>
                <li><span class="label">Nama</span>:<span class="field"><?php echo $nama_s1?></span></li>
                <li><span class="label">Umur</span>:<span class="field"><?php echo $this->cm->umur(flip_date($tgl_lahir_s1)); ?> Tahun</span></li>
                <li><span class="label">Pekerjaan</span>:<span class="field"><?php echo $pekerjaan_s1 ?></span></li>
                <li><span class="label">Tempat tinggal</span>:<span class="field">Dsn <?php echo $dusun_s1; ?>  </span></li>
            </ul>
                <div class="clear"></div>
                <div style="text-align: center;">
                Tanda Tangan
                <br /><br /><br />
                ___________________
                </div>
            </div>
            <div style="width: 50%; float: left;">
            <div style="text-align: center; font-weight: bold;">SAKSI II</div> 
            <ul>    
               <li><span class="label">Nama</span>:<span class="field"><?php echo $nama_s2?></span></li>
                <li><span class="label">Umur</span>:<span class="field"><?php echo $this->cm->umur(flip_date($tgl_lahir_s2)); ?> Tahun</span></li>
                <li><span class="label">Pekerjaan</span>:<span class="field"><?php echo $pekerjaan_s2 ?></span></li>
                <li><span class="label">Tempat tinggal</span>:<span class="field">Dsn <?php echo $dusun_s2; ?>  </span></li>
            </ul>
                <div class="clear"></div>
                <div style="text-align: center;">
                Tanda Tangan
                <br /><br /><br />
                ___________________
                </div> 
            </div>
        </div>
        <div class="clear"></div>
        <div class="content"  style="line-height: 20px; margin-top: 20px;">
            <p style="text-indent: 0;">Sebagai kelengkapan data-data yang diperlukan bersama ini kami lampirkan :</p>
            <ol>
                <li>Surat Keterangan Lahir / Tripikat dari Desa / Kelurahan setempat</li>
                <li>Foto copy Surat Nikah / Akta Perkawinan orang tua yang bersangkutan</li>
                <li>Foto copy KTP dan KK orang tua yang bersangkutan</li>
                <li>Foto copy 2 (dua orang saksi yang harus hadir )</li>
            </ol>
            <p style="text-indent: 0;">Segala keterangan yang kami berikan apabila dikemudian hari ternyata tidak benar menjadi tanggung jawab kami.</p>
            <p style="text-indent: 0;">Demikian permohonan dan laporan kami, atas perkenan Kepala Dinas Kependudukan kami sampaikan terima kasih.</p>
            <div style="text-align: center;">
            Pemohon
            <br /><br /><br />
            ___________________
            </div>
        </div>
    </div>
</div>
</body>
</html>
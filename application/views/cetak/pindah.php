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
                <h3>Surat keterangan Pindah</h3>
            </div>
            <div class="kode">
                <span class="code" style="border-top: solid black 1px;">
                    Nomor Reg. : 470 / .... /..../ 429.405.03 / <?php echo date("Y")?>
                </span>
            </div>
        </div>
        <!-- KONTEN IDENTITAS-->
        <div class="content">
            <ol type="1" class="sub">
                <li><span class="label">Nama</span>:<span class="field"><?php echo $nama; ?></span></li>
                <li><span class="label">Tempat/Tgl Lahir</span>:<span class="field"><?php echo "$tmp_lahir, $tgl_lahir"; ?></span></li>
                <li><span class="label">Jenis Kelamin</span>:<span class="field"><?php echo $arr_jk[$jk]; ?></span></li>
                <li><span class="label">Agama</span>:<span class="field"><?php echo $agama; ?></span></li>
                <li><span class="label">Kewarganegaraan</span>:<span class="field"><?php echo $arr_warga_negara[$warga_negara]; ?></span></li>
                <li><span class="label">Status Perkawinan</span>:<span class="field"><?php echo $this->cm->arr_status_kawin[$status_kawin]; ?></span></li>
                <li><span class="label">Nomor KTP</span>:<span class="field"><?php echo $nik; ?></span></li>
                <li><span class="label">Pekerjaan</span>:<span class="field"><?php echo $pekerjaan; ?></span></li>
                <li><span class="label">Pendidikan</span>:<span class="field"><?php echo $pendidikan; ?></span></li>
                <li><span class="label">Tempat Tinggal</span><div style="float:left">:</div>
                    <div class="field">RT <?php echo $rt; ?> RW  <?php echo $rw; ?> Dusun <?php echo $dusun; ?>
                        <br />Desa <?php echo $desa; ?>, Kecamatan <?php echo $kota; ?>
                        <br />Kabupaten <?php echo $kabupaten; ?>
                    </div>
                </li>
                <div class="clear"></div>
                <li><span class="label">Alamat yang dituju</span><div style="float:left">:</div>
                    <div class="field">RT <?php echo $rt_tujuan; ?> RW  <?php echo $rw_tujuan; ?> Dusun <?php echo $dusun_tujuan; ?>
                        <br />Desa <?php echo $desa_tujuan; ?>, Kecamatan <?php echo $kota_tujuan; ?>
                         <br />Kabupaten <?php echo $kabupaten_tujuan; ?> - <?php echo $provinsi_tujuan; ?>
                    </div>
                </li>
                <div class="clear"></div>
                <li><span class="label">Alasan Pindah</span>:<span class="field"><?php echo $alasan_pindah; ?></span></li>
                <li><span class="label">Pengikut</span>:<span class="field">( <?php echo $rec_pengikut->num_rows(); ?> ) orang, antara lain :</span><br />
               <?php  if($rec_pengikut->num_rows() > 0 ) { ?>
                <table border="1px" cellpadding="10px" cellspacing="0" width="700px">
                    <tr class="head">
                        <td width="10px">No.</td>
                        <td>Nama</td>
                        <td width="10px">Umur(th)</td>
                        <td width="10px">L/P</td>
                        <td>Alamat</td>
                        <td width="75px">ket. hub. Keluarga</td>
                    </tr><?php $x=0; foreach($rec_pengikut->result() as $row ) : $x++ ?>
                    <tr>
                    
                        <td><?php echo $x;?></td>
                        <td><?php echo $row->nama;?></td>
                        <td><?php echo $this->cm->umur($row->tgl_lahir2);?></td>
                        <td><?php echo $row->jk;?></td>
                        <td><?php echo $row->desa." - ".$row->dusun;?></td>
                        <td><?php echo $this->cm->arr_hubungan[$row->hubungan];?></td>
                    </tr> <?php endforeach; ?>
                </table> <?php } ?>
                </li>
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
        <!-- KONTENT CATATAN KAKI -->
        <div class="content">
        <h4>Catatan :</h4>
        <ul class="foot-note">
            <li>Pada waktu surat pindah ini dikueluarkan KTP dan KK harap dicabut</li>
        </ul>
        </div>
    </div>
</div>
</body>
</html>
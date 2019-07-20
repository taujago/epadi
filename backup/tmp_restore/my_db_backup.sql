#
# TABLE STRUCTURE FOR: admins
#

DROP TABLE IF EXISTS admins;

CREATE TABLE `admins` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(49) NOT NULL,
  `password` varchar(49) NOT NULL,
  `level` varchar(25) NOT NULL DEFAULT 'N',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO admins (`id`, `username`, `password`, `level`) VALUES (1, 'admin', 'admin', 'operator');
INSERT INTO admins (`id`, `username`, `password`, `level`) VALUES (2, 'kabag', 'kabag', 'kabag');


#
# TABLE STRUCTURE FOR: backup
#

DROP TABLE IF EXISTS backup;

CREATE TABLE `backup` (
  `id_backup` int(4) NOT NULL AUTO_INCREMENT,
  `tanggal` varchar(25) NOT NULL,
  `jam` varchar(25) NOT NULL,
  `file` varchar(150) NOT NULL,
  PRIMARY KEY (`id_backup`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

INSERT INTO backup (`id_backup`, `tanggal`, `jam`, `file`) VALUES (41, '2016-12-14', '09:05:32', 'dbsppd_Wed14Dec2016 _1481681132.sql');
INSERT INTO backup (`id_backup`, `tanggal`, `jam`, `file`) VALUES (42, '2017-02-21', '07:25:35', 'dbsppd_Tue21Feb2017 _1487636735.sql');
INSERT INTO backup (`id_backup`, `tanggal`, `jam`, `file`) VALUES (43, '2018-11-16', '15:25:30', 'sipadi_Fri16Nov2018 _1542356730.sql');


#
# TABLE STRUCTURE FOR: biaya
#

DROP TABLE IF EXISTS biaya;

CREATE TABLE `biaya` (
  `id_biaya` varchar(100) NOT NULL,
  `lumpsum` varchar(100) NOT NULL,
  `penginapan` varchar(100) NOT NULL,
  `transportasi` varchar(100) NOT NULL,
  `id_golongan` varchar(100) NOT NULL,
  PRIMARY KEY (`id_biaya`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO biaya (`id_biaya`, `lumpsum`, `penginapan`, `transportasi`, `id_golongan`) VALUES ('1', '2450000', '1200000', '3560000', '1');
INSERT INTO biaya (`id_biaya`, `lumpsum`, `penginapan`, `transportasi`, `id_golongan`) VALUES ('2', '950000', '800000', '2810000', '2');
INSERT INTO biaya (`id_biaya`, `lumpsum`, `penginapan`, `transportasi`, `id_golongan`) VALUES ('3', '750000', '800000', '2810000', '3');
INSERT INTO biaya (`id_biaya`, `lumpsum`, `penginapan`, `transportasi`, `id_golongan`) VALUES ('4', '600000', '450000', '2810000', '4');
INSERT INTO biaya (`id_biaya`, `lumpsum`, `penginapan`, `transportasi`, `id_golongan`) VALUES ('5', '525000', '450000', '2810000', '5');


#
# TABLE STRUCTURE FOR: biaya_detail
#

DROP TABLE IF EXISTS biaya_detail;

CREATE TABLE `biaya_detail` (
  `id_biaya_detail` int(11) NOT NULL AUTO_INCREMENT,
  `id_biaya` varchar(100) DEFAULT NULL,
  `id_tujuan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_biaya_detail`)
) ENGINE=InnoDB AUTO_INCREMENT=118 DEFAULT CHARSET=latin1;

INSERT INTO biaya_detail (`id_biaya_detail`, `id_biaya`, `id_tujuan`) VALUES (4, '1', 3);
INSERT INTO biaya_detail (`id_biaya_detail`, `id_biaya`, `id_tujuan`) VALUES (5, '2', 3);
INSERT INTO biaya_detail (`id_biaya_detail`, `id_biaya`, `id_tujuan`) VALUES (6, '3', 3);
INSERT INTO biaya_detail (`id_biaya_detail`, `id_biaya`, `id_tujuan`) VALUES (7, '4', 3);
INSERT INTO biaya_detail (`id_biaya_detail`, `id_biaya`, `id_tujuan`) VALUES (8, '5', 3);


#
# TABLE STRUCTURE FOR: golongan
#

DROP TABLE IF EXISTS golongan;

CREATE TABLE `golongan` (
  `id_golongan` int(10) NOT NULL AUTO_INCREMENT,
  `golongan` varchar(200) NOT NULL,
  `aktif` enum('Y','N') NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id_golongan`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO golongan (`id_golongan`, `golongan`, `aktif`) VALUES (1, 'Tingkat B (Eselon II)', 'Y');
INSERT INTO golongan (`id_golongan`, `golongan`, `aktif`) VALUES (2, 'Tingkat C (Eselon III)', 'Y');
INSERT INTO golongan (`id_golongan`, `golongan`, `aktif`) VALUES (3, 'Tingkat D (Eseon IV)', 'Y');
INSERT INTO golongan (`id_golongan`, `golongan`, `aktif`) VALUES (4, 'Tingkat E (Golongan III dan IV)', 'Y');
INSERT INTO golongan (`id_golongan`, `golongan`, `aktif`) VALUES (5, 'Tingkat F (Golongan I, II dan PTT)', 'Y');
INSERT INTO golongan (`id_golongan`, `golongan`, `aktif`) VALUES (6, 'Tingkat F (Sopir)', 'Y');


#
# TABLE STRUCTURE FOR: kwitansi
#

DROP TABLE IF EXISTS kwitansi;

CREATE TABLE `kwitansi` (
  `id_kwitansi` int(11) NOT NULL AUTO_INCREMENT,
  `id_sppd` int(4) NOT NULL,
  `id_pegawai` varchar(20) NOT NULL,
  `dari` text NOT NULL,
  `untuk` text NOT NULL,
  `lama` varchar(100) NOT NULL,
  `lumpsum` varchar(100) NOT NULL,
  `penginapan` varchar(100) NOT NULL,
  `transportasi` varchar(100) NOT NULL,
  `tujuan` varchar(100) NOT NULL,
  PRIMARY KEY (`id_kwitansi`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO kwitansi (`id_kwitansi`, `id_sppd`, `id_pegawai`, `dari`, `untuk`, `lama`, `lumpsum`, `penginapan`, `transportasi`, `tujuan`) VALUES (1, 1, '1', '		  KUASA PENGGUNA ANGGARAN / KEPALA BAGIAN KESEJAHTERAAN RAKYAT SEKRETARIAT DAERAH KABUPATEN', 'Biaya Perjalanan  Dinas ke Jakarta', '3', '', '', '', 'Jakarta');


#
# TABLE STRUCTURE FOR: modul
#

DROP TABLE IF EXISTS modul;

CREATE TABLE `modul` (
  `id_modul` int(5) NOT NULL AUTO_INCREMENT,
  `nama_modul` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `username` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `link` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `static_content` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `publish` enum('Y','N') CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  `status` enum('user','admin') CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `aktif` enum('Y','N') CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  `urutan` int(5) NOT NULL,
  `link_seo` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_modul`)
) ENGINE=MyISAM AUTO_INCREMENT=105 DEFAULT CHARSET=latin1;

INSERT INTO modul (`id_modul`, `nama_modul`, `username`, `link`, `static_content`, `gambar`, `publish`, `status`, `aktif`, `urutan`, `link_seo`) VALUES (2, 'Operator Area', 'admin', 'operator_area', '', '', 'Y', 'admin', 'Y', 0, '');
INSERT INTO modul (`id_modul`, `nama_modul`, `username`, `link`, `static_content`, `gambar`, `publish`, `status`, `aktif`, `urutan`, `link_seo`) VALUES (102, 'Master Pegawai', 'admin', 'master_pegawai', '', '', 'Y', 'admin', 'Y', 0, '');
INSERT INTO modul (`id_modul`, `nama_modul`, `username`, `link`, `static_content`, `gambar`, `publish`, `status`, `aktif`, `urutan`, `link_seo`) VALUES (101, 'Master Golongan', 'admin', 'master_golongan', '', '', 'Y', 'admin', 'Y', 0, '');
INSERT INTO modul (`id_modul`, `nama_modul`, `username`, `link`, `static_content`, `gambar`, `publish`, `status`, `aktif`, `urutan`, `link_seo`) VALUES (100, 'Master Tujuan', 'admin', 'master_tujuan', '', '', 'Y', 'admin', 'Y', 0, '');
INSERT INTO modul (`id_modul`, `nama_modul`, `username`, `link`, `static_content`, `gambar`, `publish`, `status`, `aktif`, `urutan`, `link_seo`) VALUES (99, 'Master Biaya', 'admin', 'master_biaya', '', '', 'Y', 'admin', 'Y', 0, '');
INSERT INTO modul (`id_modul`, `nama_modul`, `username`, `link`, `static_content`, `gambar`, `publish`, `status`, `aktif`, `urutan`, `link_seo`) VALUES (98, 'Master Transportasi', 'admin', 'master_transportasi', '', '', 'Y', 'admin', 'Y', 0, '');
INSERT INTO modul (`id_modul`, `nama_modul`, `username`, `link`, `static_content`, `gambar`, `publish`, `status`, `aktif`, `urutan`, `link_seo`) VALUES (97, 'Nota Perjalanan Dinas', 'admin', 'nppt', '', '', 'Y', 'admin', 'Y', 0, '');
INSERT INTO modul (`id_modul`, `nama_modul`, `username`, `link`, `static_content`, `gambar`, `publish`, `status`, `aktif`, `urutan`, `link_seo`) VALUES (96, 'SPT User', 'admin', 'spt_user', '', '', 'Y', 'admin', 'Y', 0, '');
INSERT INTO modul (`id_modul`, `nama_modul`, `username`, `link`, `static_content`, `gambar`, `publish`, `status`, `aktif`, `urutan`, `link_seo`) VALUES (95, 'Kwitansi', 'admin', 'kwitansi', '', '', 'Y', 'admin', 'Y', 0, '');
INSERT INTO modul (`id_modul`, `nama_modul`, `username`, `link`, `static_content`, `gambar`, `publish`, `status`, `aktif`, `urutan`, `link_seo`) VALUES (94, 'Laporan Anggaran', 'admin', 'laporan', '', '', 'Y', 'admin', 'Y', 0, '');
INSERT INTO modul (`id_modul`, `nama_modul`, `username`, `link`, `static_content`, `gambar`, `publish`, `status`, `aktif`, `urutan`, `link_seo`) VALUES (93, 'Backup', 'admin', 'maintenance', '', '', 'Y', 'admin', 'Y', 0, '');
INSERT INTO modul (`id_modul`, `nama_modul`, `username`, `link`, `static_content`, `gambar`, `publish`, `status`, `aktif`, `urutan`, `link_seo`) VALUES (6, 'Restore', 'admin', 'maintenance', '', '', 'Y', 'admin', 'Y', 0, '');
INSERT INTO modul (`id_modul`, `nama_modul`, `username`, `link`, `static_content`, `gambar`, `publish`, `status`, `aktif`, `urutan`, `link_seo`) VALUES (5, 'Kelas Pasar', 'admin', 'kelas_pasar', '', '', 'Y', 'admin', 'Y', 0, '');
INSERT INTO modul (`id_modul`, `nama_modul`, `username`, `link`, `static_content`, `gambar`, `publish`, `status`, `aktif`, `urutan`, `link_seo`) VALUES (4, 'Data Pasar', 'admin', 'data_pasar', '', '', 'Y', 'admin', 'Y', 0, '');
INSERT INTO modul (`id_modul`, `nama_modul`, `username`, `link`, `static_content`, `gambar`, `publish`, `status`, `aktif`, `urutan`, `link_seo`) VALUES (3, 'Aplikasi', 'admin', 'config', '', '', 'Y', 'admin', 'Y', 0, '');
INSERT INTO modul (`id_modul`, `nama_modul`, `username`, `link`, `static_content`, `gambar`, `publish`, `status`, `aktif`, `urutan`, `link_seo`) VALUES (103, 'Siswa', 'admin', 'siswa', '', '', 'Y', 'admin', 'Y', 0, '');
INSERT INTO modul (`id_modul`, `nama_modul`, `username`, `link`, `static_content`, `gambar`, `publish`, `status`, `aktif`, `urutan`, `link_seo`) VALUES (104, 'Daftar Nilai', 'admin', 'daftar_nilai', '', '', 'Y', 'admin', 'Y', 0, '');


#
# TABLE STRUCTURE FOR: nppt
#

DROP TABLE IF EXISTS nppt;

CREATE TABLE `nppt` (
  `id_nppt` varchar(100) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `no_npt` varchar(200) NOT NULL,
  `id_tujuan` varchar(100) NOT NULL,
  `id_pegawai` varchar(100) DEFAULT NULL,
  `maksud` text NOT NULL,
  `id_transportasi` varchar(100) NOT NULL,
  `lama` varchar(25) NOT NULL,
  `tgl_pergi` varchar(25) NOT NULL,
  `tgl_kembali` varchar(25) NOT NULL,
  `status` enum('Y','N') NOT NULL DEFAULT 'N',
  `tanggal_spt` date DEFAULT NULL,
  `no_spt` varchar(200) DEFAULT NULL,
  `dasar_hukum` text,
  `status_sppd` enum('Y','N') DEFAULT 'N',
  `tanggal_sppd` date DEFAULT NULL,
  `no_sppd` varchar(100) DEFAULT NULL,
  `pejabat_perintah` varchar(100) DEFAULT NULL,
  `mata_anggaran` varchar(100) DEFAULT NULL,
  `ket_lain` varchar(100) DEFAULT NULL,
  `tahun_anggaran` varchar(100) DEFAULT NULL,
  `kepala` varchar(100) DEFAULT NULL,
  `pangkat` varchar(100) DEFAULT NULL,
  `nip` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_nppt`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO nppt (`id_nppt`, `tanggal`, `no_npt`, `id_tujuan`, `id_pegawai`, `maksud`, `id_transportasi`, `lama`, `tgl_pergi`, `tgl_kembali`, `status`, `tanggal_spt`, `no_spt`, `dasar_hukum`, `status_sppd`, `tanggal_sppd`, `no_sppd`, `pejabat_perintah`, `mata_anggaran`, `ket_lain`, `tahun_anggaran`, `kepala`, `pangkat`, `nip`) VALUES ('2a0c8e32b3e0cc7618aa18610d06a108', '2018-11-21', '002/..../LD/11/2018', '3', NULL, 'Gak ada', '2', '', '2018-11-19', '2018-11-29', 'Y', '2018-11-21', '002/..../SPT/LD/11/2018', NULL, 'Y', '2018-11-21', '002/..../SPPD/LD/11/2018', 'Baso Irwan Sakti', 'APBD', 'Tidak ada', '2018', 'H. ABDUL MALIK, S. Sos,. M.Si', 'Pembina Utama Muda, IV/c  ', '19641008 198603 1 018 ');
INSERT INTO nppt (`id_nppt`, `tanggal`, `no_npt`, `id_tujuan`, `id_pegawai`, `maksud`, `id_transportasi`, `lama`, `tgl_pergi`, `tgl_kembali`, `status`, `tanggal_spt`, `no_spt`, `dasar_hukum`, `status_sppd`, `tanggal_sppd`, `no_sppd`, `pejabat_perintah`, `mata_anggaran`, `ket_lain`, `tahun_anggaran`, `kepala`, `pangkat`, `nip`) VALUES ('6f21e05c8fd7750865ce340361b2ee48', '2018-11-20', '001/..../LD/11/2018', '3', NULL, 'Dalam rangka mengikuti acara Rakor Kepegawaian', '2', '', '2018-11-26', '2018-11-29', 'Y', '2018-11-21', '001/..../SPT/LD/11/2018', '', 'Y', '2018-11-20', '001/..../SPPD/LD/11/2018', 'Baso Irwan Sakti', 'APBD', 'Tidak ada', '2018', 'H. ABDUL MALIK, S. Sos,. M.Si', 'Pembina Utama Muda, IV/c  ', '19641008 198603 1 018 ');


#
# TABLE STRUCTURE FOR: nppt_detail
#

DROP TABLE IF EXISTS nppt_detail;

CREATE TABLE `nppt_detail` (
  `id_nppt_detail` int(11) NOT NULL AUTO_INCREMENT,
  `id_nppt` varchar(100) DEFAULT NULL,
  `id_pegawai` varchar(100) DEFAULT NULL,
  `laporan` enum('Y','N') DEFAULT 'N',
  `hasil` text,
  `tanggal_laporan` date DEFAULT NULL,
  `_wysihtml5_mode` varchar(100) DEFAULT NULL,
  `tanggal_kwitansi` date DEFAULT NULL,
  `kwitansi` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`id_nppt_detail`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

INSERT INTO nppt_detail (`id_nppt_detail`, `id_nppt`, `id_pegawai`, `laporan`, `hasil`, `tanggal_laporan`, `_wysihtml5_mode`, `tanggal_kwitansi`, `kwitansi`) VALUES (30, '6f21e05c8fd7750865ce340361b2ee48', '2', 'Y', '<ol><li><br></li><li><br></li></ol>', '2018-11-21', '1', '2018-11-21', 'Y');
INSERT INTO nppt_detail (`id_nppt_detail`, `id_nppt`, `id_pegawai`, `laporan`, `hasil`, `tanggal_laporan`, `_wysihtml5_mode`, `tanggal_kwitansi`, `kwitansi`) VALUES (31, '6f21e05c8fd7750865ce340361b2ee48', '1', 'Y', '<ol><li><br></li><li><br></li></ol>', '2018-11-21', '1', '2018-11-21', 'Y');
INSERT INTO nppt_detail (`id_nppt_detail`, `id_nppt`, `id_pegawai`, `laporan`, `hasil`, `tanggal_laporan`, `_wysihtml5_mode`, `tanggal_kwitansi`, `kwitansi`) VALUES (32, '2a0c8e32b3e0cc7618aa18610d06a108', '2', 'N', NULL, NULL, NULL, '2018-11-21', 'Y');


#
# TABLE STRUCTURE FOR: pegawai
#

DROP TABLE IF EXISTS pegawai;

CREATE TABLE `pegawai` (
  `id_pegawai` int(5) NOT NULL AUTO_INCREMENT,
  `nip` varchar(90) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `pangkat` varchar(200) NOT NULL,
  `id_golongan` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `unitkerja` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `gambar` varchar(70) NOT NULL,
  PRIMARY KEY (`id_pegawai`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

INSERT INTO pegawai (`id_pegawai`, `nip`, `nama`, `pangkat`, `id_golongan`, `jabatan`, `unitkerja`, `username`, `password`, `gambar`) VALUES (1, '198005032006041011', 'Erwin Fakhruddin, A.Md.', 'Panata, III/c', '3', 'Kasubbid Informasi Pegawai', 'Badan Kepegawaian Daerah', '198005032006041011', '198005032006041011', 'erwin11.jpg');
INSERT INTO pegawai (`id_pegawai`, `nip`, `nama`, `pangkat`, `id_golongan`, `jabatan`, `unitkerja`, `username`, `password`, `gambar`) VALUES (2, '196912312002121059', 'Hasanuddin, SH', 'Pembina, IV/a', '2', 'Sekretaris', 'Badan Kepegawaian Daerah', '196912312002121059', '196912312002121059', '');


#
# TABLE STRUCTURE FOR: rincianbiaya
#

DROP TABLE IF EXISTS rincianbiaya;

CREATE TABLE `rincianbiaya` (
  `id_rincianbiaya` int(10) NOT NULL AUTO_INCREMENT,
  `id_nppt_detail` int(5) NOT NULL,
  `dari` text NOT NULL,
  `uang_harian` int(80) NOT NULL,
  `uang_penginapan` int(80) NOT NULL,
  `uang_transportasi` int(80) NOT NULL,
  PRIMARY KEY (`id_rincianbiaya`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

INSERT INTO rincianbiaya (`id_rincianbiaya`, `id_nppt_detail`, `dari`, `uang_harian`, `uang_penginapan`, `uang_transportasi`) VALUES (6, 30, 'PENGGUNA ANGGARAN BADAN KEPEGAWAIAN DAERAH KABUPATEN SUMBAWA BARAT', 3800000, 3200000, 2810000);
INSERT INTO rincianbiaya (`id_rincianbiaya`, `id_nppt_detail`, `dari`, `uang_harian`, `uang_penginapan`, `uang_transportasi`) VALUES (7, 31, 'sdf', 3000000, 3200000, 2810000);
INSERT INTO rincianbiaya (`id_rincianbiaya`, `id_nppt_detail`, `dari`, `uang_harian`, `uang_penginapan`, `uang_transportasi`) VALUES (8, 32, 'PENGGUNA ANGGARAN BADAN KEPEGAWAIAN DAERAH KABUPATEN SUMBAWA BARAT', 3800000, 3200000, 2810000);


#
# TABLE STRUCTURE FOR: setting
#

DROP TABLE IF EXISTS setting;

CREATE TABLE `setting` (
  `id_setting` int(11) NOT NULL AUTO_INCREMENT,
  `nama_aplikasi` varchar(150) NOT NULL,
  `kota` varchar(100) DEFAULT NULL,
  `instansi` varchar(200) NOT NULL,
  `ins` varchar(100) DEFAULT NULL,
  `nama_kepala` varchar(100) DEFAULT NULL,
  `pangkat_kepala` varchar(100) DEFAULT NULL,
  `nip_kepala` varchar(100) DEFAULT NULL,
  `bendahara` varchar(100) DEFAULT NULL,
  `nip_bendahara` varchar(100) DEFAULT NULL,
  `nama_pptk` varchar(100) DEFAULT NULL,
  `nip_pptk` varchar(100) DEFAULT NULL,
  `nama_bupati` varchar(100) DEFAULT NULL,
  `nama_sekda` varchar(100) DEFAULT NULL,
  `pangkat_sekda` varchar(100) DEFAULT NULL,
  `nip_sekda` varchar(100) DEFAULT NULL,
  `tahun_anggaran` varchar(100) DEFAULT NULL,
  `logo` varchar(50) NOT NULL,
  `cop` text NOT NULL,
  `no_surat` varchar(15) NOT NULL,
  `tempat_surat` varchar(50) NOT NULL,
  `ttnppt` text NOT NULL,
  `ttspt` text NOT NULL,
  `ttsppd` text NOT NULL,
  `ttspt_dua` text NOT NULL,
  PRIMARY KEY (`id_setting`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO setting (`id_setting`, `nama_aplikasi`, `kota`, `instansi`, `ins`, `nama_kepala`, `pangkat_kepala`, `nip_kepala`, `bendahara`, `nip_bendahara`, `nama_pptk`, `nip_pptk`, `nama_bupati`, `nama_sekda`, `pangkat_sekda`, `nip_sekda`, `tahun_anggaran`, `logo`, `cop`, `no_surat`, `tempat_surat`, `ttnppt`, `ttspt`, `ttsppd`, `ttspt_dua`) VALUES (1, 'Aplikasi SPPD', 'Sumbawa Barat', 'Badan Kepegawaian Daerah Kabupaten Sumbawa Barat', 'BKD', 'H. ABDUL MALIK, S. Sos,. M.Si', 'Pembina Utama Muda, IV/c  ', '19641008 198603 1 018 ', 'Surpianti', ' 19861102 201410 2 001', '.........................', '.........................', 'Dr. Ir. H. W. MUSYAFIRIN, MM', 'H. A. AZIS, SH., MH.', 'Pembina Utama Muda, IV/c ', '19650818 199303 1 012 ', '2018', 'kop2.png', '<b>PEMERINTAH KABUPATEN SUMBAWA BARAT</b>\r\n\r\n<br><b>BADAN KEPEGAWAIAN DAERAH</b>\r\n<br>Jl. Bung karno No. 10 Kemutar Telu Centre, Taliwang 84335\r\n\r\n<span><br>Telp. (0372)8281784, Fax. (0372)82<span>81492&nbsp; Email: <b>&nbsp;</b><a target=\"\" rel=\"\"><i><u>bkd.sumbawabarat@yahoo.com</u></i></a><i></i></span></span>\r\n', '....', 'Taliwang', 'Kepala Badan Kepegawaian Daerah\r\n<br>\r\nKabupaten Sumbawa Barat\r\n\r\n<div><br></div><div><br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\n\r\n<b>H. ABDUL\r\nMALIK, S. Sos,. M.Si</b>\r\n\r\n<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br></span></div><div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\nPembina Utama Muda, IV/c\r\n\r\n<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br></span></div><div>&nbsp;\r\nNIP. 19641008 198603 1 018\r\n\r\n</div><br>', '<div><div>\r\n\r\nKepala Badan Kepegawaian Daerah\r\n<br>\r\nKabupaten Sumbawa Barat\r\n\r\n<div><br></div><div><br></div><div><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\n\r\n<b>H. ABDUL\r\nMALIK, S. Sos,. M.Si</b>\r\n\r\n<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br></span></div><div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\nPembina Utama Muda, IV/c\r\n\r\n<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br></span></div><div>&nbsp;\r\nNIP. 19641008 198603 1 018\r\n\r\n</div></div></div><br><br>', '<div><div>\r\n\r\n<b>An. BUPATI SUMBAWA BARAT</b> <br></div><div>\r\n<span><b>SEKRETARIS\r\nDAERAH</b>,</span>\r\n\r\n<div><br></div><div><br></div><div><br></div><div>\r\n\r\n<span><b>H. </b><b>A.\r\nAZIS, SH., MH.</b></span> <br></div><div>\r\nPembina Utama Muda, IV/c\r\n\r\n<br></div><div>NIP. 19650818 199303 1 012\r\n\r\n</div></div></div><br><br>', '');


#
# TABLE STRUCTURE FOR: sppd
#

DROP TABLE IF EXISTS sppd;

CREATE TABLE `sppd` (
  `id_sppd` int(11) NOT NULL AUTO_INCREMENT,
  `id_pegawai` varchar(100) NOT NULL,
  `id_nppt` varchar(100) NOT NULL,
  `no_sppd` varchar(50) NOT NULL,
  `pemberi_perintah` varchar(100) NOT NULL,
  `instansi` varchar(100) NOT NULL,
  `mata_anggaran` varchar(100) NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `tgl_sppd` varchar(50) NOT NULL,
  PRIMARY KEY (`id_sppd`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO sppd (`id_sppd`, `id_pegawai`, `id_nppt`, `no_sppd`, `pemberi_perintah`, `instansi`, `mata_anggaran`, `keterangan`, `tgl_sppd`) VALUES (1, '1', '1', '001/..../SPPD/LD/08/2018', 'Sekretaris Daerah', 'Badan Kepegawaian Daerah Kabupaten Sumbawa Barat', '1234567890', 'test', '18/08/2018');
INSERT INTO sppd (`id_sppd`, `id_pegawai`, `id_nppt`, `no_sppd`, `pemberi_perintah`, `instansi`, `mata_anggaran`, `keterangan`, `tgl_sppd`) VALUES (2, '1', '2', '002/..../SPPD/LD/11/2018', 'ds', 's6T9!?n664K3T2K5!?s81106?NU680UBX1*N50T7T2?W1KUB', 'APBD', 'sfsdf', '19/11/2018');
INSERT INTO sppd (`id_sppd`, `id_pegawai`, `id_nppt`, `no_sppd`, `pemberi_perintah`, `instansi`, `mata_anggaran`, `keterangan`, `tgl_sppd`) VALUES (3, '2', '2', '002/..../SPPD/LD/11/2018', 'ds', 's6T9!?n664K3T2K5!?s81106?NU680UBX1*N50T7T2?W1KUB', 'APBD', 'sfsdf', '19/11/2018');


#
# TABLE STRUCTURE FOR: spt
#

DROP TABLE IF EXISTS spt;

CREATE TABLE `spt` (
  `id_spt` int(6) NOT NULL AUTO_INCREMENT,
  `no_spt` varchar(100) NOT NULL,
  `id_nppt` varchar(100) NOT NULL,
  `id_pegawai` varchar(100) NOT NULL,
  `tugas` text NOT NULL,
  `tgl_spt` varchar(50) NOT NULL,
  `dasar_hukum` text NOT NULL,
  PRIMARY KEY (`id_spt`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO spt (`id_spt`, `no_spt`, `id_nppt`, `id_pegawai`, `tugas`, `tgl_spt`, `dasar_hukum`) VALUES (1, '001/..../SPT/LD/08/2018', '1', '1', 'Dalam rangka mengikuti acara Rakor Kepegawaian', '18/08/2018', '');
INSERT INTO spt (`id_spt`, `no_spt`, `id_nppt`, `id_pegawai`, `tugas`, `tgl_spt`, `dasar_hukum`) VALUES (2, '002/..../SPT/LD/11/2018', '2', '1-2', 'Rakor Kepegawaian', '15/11/2018', '');
INSERT INTO spt (`id_spt`, `no_spt`, `id_nppt`, `id_pegawai`, `tugas`, `tgl_spt`, `dasar_hukum`) VALUES (3, '003/..../SPT/LD/11/2018', 'da51938e55309ee7c318a9db107b1a2d', '', 'Jalan Jalan', '19/11/2018', '');


#
# TABLE STRUCTURE FOR: transportasi
#

DROP TABLE IF EXISTS transportasi;

CREATE TABLE `transportasi` (
  `id_transportasi` int(5) NOT NULL AUTO_INCREMENT,
  `transportasi` varchar(100) NOT NULL,
  `aktif` enum('Y','N') NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id_transportasi`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO transportasi (`id_transportasi`, `transportasi`, `aktif`) VALUES (1, 'Darat', 'Y');
INSERT INTO transportasi (`id_transportasi`, `transportasi`, `aktif`) VALUES (2, 'Darat dan Udara', 'Y');


#
# TABLE STRUCTURE FOR: ttdkwitansi
#

DROP TABLE IF EXISTS ttdkwitansi;

CREATE TABLE `ttdkwitansi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kpa` varchar(300) NOT NULL,
  `nip_kpa` varchar(300) NOT NULL,
  `bendahara` varchar(100) NOT NULL,
  `nip_bendahara` varchar(100) NOT NULL,
  `pptk` varchar(100) NOT NULL,
  `nip_pptk` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO ttdkwitansi (`id`, `kpa`, `nip_kpa`, `bendahara`, `nip_bendahara`, `pptk`, `nip_pptk`) VALUES (1, 'H. ABDUL MALIK, S.Sos., M.Si.', '19641008 198603 1 018', 'SURPIANTI', ' 19861102 201410 2 001', '..............................................', '..............................................');


#
# TABLE STRUCTURE FOR: tujuan
#

DROP TABLE IF EXISTS tujuan;

CREATE TABLE `tujuan` (
  `id_tujuan` int(5) NOT NULL AUTO_INCREMENT,
  `tujuan` varchar(200) NOT NULL,
  `jenis_tujuan` int(2) NOT NULL,
  PRIMARY KEY (`id_tujuan`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

INSERT INTO tujuan (`id_tujuan`, `tujuan`, `jenis_tujuan`) VALUES (1, 'Mataram', 1);
INSERT INTO tujuan (`id_tujuan`, `tujuan`, `jenis_tujuan`) VALUES (2, 'Denpasar', 1);
INSERT INTO tujuan (`id_tujuan`, `tujuan`, `jenis_tujuan`) VALUES (3, 'Jakarta', 1);
INSERT INTO tujuan (`id_tujuan`, `tujuan`, `jenis_tujuan`) VALUES (4, 'Yogyakarta', 1);
INSERT INTO tujuan (`id_tujuan`, `tujuan`, `jenis_tujuan`) VALUES (5, 'Surabaya', 1);
INSERT INTO tujuan (`id_tujuan`, `tujuan`, `jenis_tujuan`) VALUES (6, 'Bima', 1);
INSERT INTO tujuan (`id_tujuan`, `tujuan`, `jenis_tujuan`) VALUES (7, 'Sumbawa Besar', 1);
INSERT INTO tujuan (`id_tujuan`, `tujuan`, `jenis_tujuan`) VALUES (8, 'Bandung', 1);
INSERT INTO tujuan (`id_tujuan`, `tujuan`, `jenis_tujuan`) VALUES (9, 'Talonang', 0);
INSERT INTO tujuan (`id_tujuan`, `tujuan`, `jenis_tujuan`) VALUES (10, 'Sekongkang', 0);
INSERT INTO tujuan (`id_tujuan`, `tujuan`, `jenis_tujuan`) VALUES (11, 'Jereweh', 0);
INSERT INTO tujuan (`id_tujuan`, `tujuan`, `jenis_tujuan`) VALUES (12, 'Maluk', 0);
INSERT INTO tujuan (`id_tujuan`, `tujuan`, `jenis_tujuan`) VALUES (13, 'Brang Rea', 0);
INSERT INTO tujuan (`id_tujuan`, `tujuan`, `jenis_tujuan`) VALUES (14, 'Brang Ene', 0);
INSERT INTO tujuan (`id_tujuan`, `tujuan`, `jenis_tujuan`) VALUES (15, 'Seteluk', 0);
INSERT INTO tujuan (`id_tujuan`, `tujuan`, `jenis_tujuan`) VALUES (16, 'Poto Tano', 0);


#
# TABLE STRUCTURE FOR: users_modul
#

DROP TABLE IF EXISTS users_modul;

CREATE TABLE `users_modul` (
  `id_umod` int(11) NOT NULL AUTO_INCREMENT,
  `id_session` varchar(255) NOT NULL,
  `id_modul` int(11) NOT NULL,
  PRIMARY KEY (`id_umod`)
) ENGINE=MyISAM AUTO_INCREMENT=73 DEFAULT CHARSET=latin1;

INSERT INTO users_modul (`id_umod`, `id_session`, `id_modul`) VALUES (72, 'kabag', 94);
INSERT INTO users_modul (`id_umod`, `id_session`, `id_modul`) VALUES (71, 'kabag', 95);
INSERT INTO users_modul (`id_umod`, `id_session`, `id_modul`) VALUES (70, 'user', 96);
INSERT INTO users_modul (`id_umod`, `id_session`, `id_modul`) VALUES (69, 'kabag', 97);
INSERT INTO users_modul (`id_umod`, `id_session`, `id_modul`) VALUES (68, 'user', 2);
INSERT INTO users_modul (`id_umod`, `id_session`, `id_modul`) VALUES (51, 'Admin', 2);
INSERT INTO users_modul (`id_umod`, `id_session`, `id_modul`) VALUES (66, 'kabag', 2);



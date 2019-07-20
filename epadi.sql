-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2019 at 11:21 AM
-- Server version: 5.5.34
-- PHP Version: 5.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `epadi`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(49) NOT NULL,
  `password` varchar(49) NOT NULL,
  `level` varchar(25) NOT NULL DEFAULT 'N',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `level`) VALUES
(1, 'admin', 'admin', 'operator'),
(2, 'kabag', 'kabag', 'kabag');

-- --------------------------------------------------------

--
-- Table structure for table `anggaran`
--

CREATE TABLE IF NOT EXISTS `anggaran` (
  `id_anggaran` int(5) NOT NULL AUTO_INCREMENT,
  `id_program` int(11) DEFAULT NULL,
  `kode` varchar(100) NOT NULL,
  `nama_anggaran` varchar(200) NOT NULL,
  `pagu` int(11) DEFAULT NULL,
  `tahun` int(4) DEFAULT NULL,
  PRIMARY KEY (`id_anggaran`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `anggaran`
--

INSERT INTO `anggaran` (`id_anggaran`, `id_program`, `kode`, `nama_anggaran`, `pagu`, `tahun`) VALUES
(26, 24, '4.05.  4.05.01. 01. 20', 'Penyediaan Jasa Administrasi Perkantoran ', 70875000, 2018),
(27, 25, '4.05.  4.05.01. 07. 02', 'Penatausahaan Keuangan ', 19400000, 2018),
(28, 26, '1.20. 1.20.06. 08.06', 'Sosialisasi Pengurusan Kartu Taspen dan Klaim Taspen', 50000000, 2018),
(29, 26, '1.20. 1.20.06. 08.07', 'Pengurusan Kartu Pegawai, Kartu Istri dan Kartu Suami', 50000000, 2018),
(30, 26, '1.20. 1.20.06. 08.08', 'Pengurusan Taperum', 50000000, 2018);

-- --------------------------------------------------------

--
-- Table structure for table `backup`
--

CREATE TABLE IF NOT EXISTS `backup` (
  `id_backup` int(4) NOT NULL AUTO_INCREMENT,
  `tanggal` varchar(25) NOT NULL,
  `jam` varchar(25) NOT NULL,
  `file` varchar(150) NOT NULL,
  PRIMARY KEY (`id_backup`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `backup`
--

INSERT INTO `backup` (`id_backup`, `tanggal`, `jam`, `file`) VALUES
(41, '2016-12-14', '09:05:32', 'dbsppd_Wed14Dec2016 _1481681132.sql'),
(42, '2017-02-21', '07:25:35', 'dbsppd_Tue21Feb2017 _1487636735.sql'),
(43, '2018-11-16', '15:25:30', 'sipadi_Fri16Nov2018 _1542356730.sql');

-- --------------------------------------------------------

--
-- Table structure for table `biaya`
--

CREATE TABLE IF NOT EXISTS `biaya` (
  `id_biaya` varchar(100) NOT NULL,
  `lumpsum` varchar(100) NOT NULL,
  `penginapan` varchar(100) NOT NULL,
  `transportasi` varchar(100) NOT NULL,
  `id_golongan` varchar(100) NOT NULL,
  PRIMARY KEY (`id_biaya`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `biaya`
--

INSERT INTO `biaya` (`id_biaya`, `lumpsum`, `penginapan`, `transportasi`, `id_golongan`) VALUES
('1', '2450000', '1200000', '3560000', '1'),
('2', '950000', '800000', '2810000', '2'),
('3', '750000', '800000', '2810000', '3'),
('4', '600000', '450000', '2810000', '4'),
('5', '525000', '450000', '2810000', '5');

-- --------------------------------------------------------

--
-- Table structure for table `biaya_detail`
--

CREATE TABLE IF NOT EXISTS `biaya_detail` (
  `id_biaya_detail` int(11) NOT NULL AUTO_INCREMENT,
  `id_biaya` varchar(100) DEFAULT NULL,
  `id_tujuan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_biaya_detail`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `biaya_detail`
--

INSERT INTO `biaya_detail` (`id_biaya_detail`, `id_biaya`, `id_tujuan`) VALUES
(4, '1', 3),
(5, '2', 3),
(6, '3', 3),
(7, '4', 3),
(8, '5', 3);

-- --------------------------------------------------------

--
-- Table structure for table `golongan`
--

CREATE TABLE IF NOT EXISTS `golongan` (
  `id_golongan` int(10) NOT NULL AUTO_INCREMENT,
  `golongan` varchar(200) NOT NULL,
  `aktif` enum('Y','N') NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id_golongan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `golongan`
--

INSERT INTO `golongan` (`id_golongan`, `golongan`, `aktif`) VALUES
(1, 'Tingkat B', 'Y'),
(2, 'Tingkat C', 'Y'),
(3, 'Tingkat D', 'Y'),
(4, 'Tingkat E', 'Y'),
(5, 'Tingkat F', 'Y'),
(6, 'Tingkat A', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `kwitansi`
--

CREATE TABLE IF NOT EXISTS `kwitansi` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `kwitansi`
--

INSERT INTO `kwitansi` (`id_kwitansi`, `id_sppd`, `id_pegawai`, `dari`, `untuk`, `lama`, `lumpsum`, `penginapan`, `transportasi`, `tujuan`) VALUES
(1, 1, '1', '		  KUASA PENGGUNA ANGGARAN / KEPALA BAGIAN KESEJAHTERAAN RAKYAT SEKRETARIAT DAERAH KABUPATEN', 'Biaya Perjalanan  Dinas ke Jakarta', '3', '', '', '', 'Jakarta');

-- --------------------------------------------------------

--
-- Table structure for table `master_gol`
--

CREATE TABLE IF NOT EXISTS `master_gol` (
  `id_master_gol` int(10) NOT NULL AUTO_INCREMENT,
  `master_gol` varchar(200) NOT NULL,
  `aktif` enum('Y','N') NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id_master_gol`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `master_gol`
--

INSERT INTO `master_gol` (`id_master_gol`, `master_gol`, `aktif`) VALUES
(7, 'Golongan I/a', 'Y'),
(8, 'Golongan  I/b', 'Y'),
(9, 'Golongan  I/c', 'Y'),
(10, 'Golongan  I/d', 'Y'),
(11, 'Golongan  II/a', 'Y'),
(12, 'Golongan  II/b', 'Y'),
(13, 'Golongan  II/c', 'Y'),
(14, 'Golongan  II/d', 'Y'),
(15, 'Golongan   III/a', 'Y'),
(16, 'Golongan   III/b', 'Y'),
(17, 'Golongan  III/c', 'Y'),
(18, 'Golongan  III/d', 'Y'),
(19, 'Golongan   IV/a', 'Y'),
(20, 'Golongan  IV/b', 'Y'),
(21, 'Golongan  IV/c', 'Y'),
(22, 'Golongan  IV.d', 'Y'),
(23, 'Golongan  IV/e', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `modul`
--

CREATE TABLE IF NOT EXISTS `modul` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=105 ;

--
-- Dumping data for table `modul`
--

INSERT INTO `modul` (`id_modul`, `nama_modul`, `username`, `link`, `static_content`, `gambar`, `publish`, `status`, `aktif`, `urutan`, `link_seo`) VALUES
(2, 'Operator Area', 'admin', 'operator_area', '', '', 'Y', 'admin', 'Y', 0, ''),
(102, 'Master Pegawai', 'admin', 'master_pegawai', '', '', 'Y', 'admin', 'Y', 0, ''),
(101, 'Master Golongan', 'admin', 'master_golongan', '', '', 'Y', 'admin', 'Y', 0, ''),
(100, 'Master Tujuan', 'admin', 'master_tujuan', '', '', 'Y', 'admin', 'Y', 0, ''),
(99, 'Master Biaya', 'admin', 'master_biaya', '', '', 'Y', 'admin', 'Y', 0, ''),
(98, 'Master Transportasi', 'admin', 'master_transportasi', '', '', 'Y', 'admin', 'Y', 0, ''),
(97, 'Nota Perjalanan Dinas', 'admin', 'nppt', '', '', 'Y', 'admin', 'Y', 0, ''),
(96, 'SPT User', 'admin', 'spt_user', '', '', 'Y', 'admin', 'Y', 0, ''),
(95, 'Kwitansi', 'admin', 'kwitansi', '', '', 'Y', 'admin', 'Y', 0, ''),
(94, 'Laporan Anggaran', 'admin', 'laporan', '', '', 'Y', 'admin', 'Y', 0, ''),
(93, 'Chart Rekapitulasi', 'admin', 'chart', '', '', 'Y', 'admin', 'Y', 0, ''),
(6, 'Data Pedagang', 'admin', 'data_pedagang', '', '', 'Y', 'admin', 'Y', 0, ''),
(5, 'Kelas Pasar', 'admin', 'kelas_pasar', '', '', 'Y', 'admin', 'Y', 0, ''),
(4, 'Data Pasar', 'admin', 'data_pasar', '', '', 'Y', 'admin', 'Y', 0, ''),
(3, 'Aplikasi', 'admin', 'config', '', '', 'Y', 'admin', 'Y', 0, ''),
(103, 'Siswa', 'admin', 'siswa', '', '', 'Y', 'admin', 'Y', 0, ''),
(104, 'Daftar Nilai', 'admin', 'daftar_nilai', '', '', 'Y', 'admin', 'Y', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `nppt`
--

CREATE TABLE IF NOT EXISTS `nppt` (
  `id_nppt` varchar(100) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `no_npt` varchar(200) NOT NULL,
  `id_tujuan` varchar(100) NOT NULL,
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
  `id_anggaran` int(11) DEFAULT NULL,
  `mata_anggaran` varchar(100) DEFAULT NULL,
  `ket_lain` varchar(100) DEFAULT NULL,
  `tahun_anggaran` varchar(100) DEFAULT NULL,
  `kepala` varchar(100) DEFAULT NULL,
  `pangkat` varchar(100) DEFAULT NULL,
  `nip` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_nppt`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nppt`
--

INSERT INTO `nppt` (`id_nppt`, `tanggal`, `no_npt`, `id_tujuan`, `maksud`, `id_transportasi`, `lama`, `tgl_pergi`, `tgl_kembali`, `status`, `tanggal_spt`, `no_spt`, `dasar_hukum`, `status_sppd`, `tanggal_sppd`, `no_sppd`, `pejabat_perintah`, `id_anggaran`, `mata_anggaran`, `ket_lain`, `tahun_anggaran`, `kepala`, `pangkat`, `nip`) VALUES
('06b11531e4b32a746492bf4c629a332f', '2018-11-28', '094/001/BKD/2018', '3', 'Dalam rangka mengikuti acara Rakor Kepegawaian', '2', '', '2018-11-29', '2018-12-03', 'Y', '2018-11-28', '875.1/001', NULL, 'Y', '2018-11-28', '094', 'Baso Irwan Sakti', 28, 'APBD', 'Tidak ada', '2018', 'H. ABDUL MALIK, S. Sos,. M.Si', 'Pembina Utama Muda, IV/c  ', '19641008 198603 1 018 '),
('57ae78e2a16ee45ae0945585072c62d4', '2018-12-14', '094/004/BKD/2018', '1', 'main-main', '1', '', '2018-12-03', '2018-12-04', 'Y', '2018-12-14', '875.1/004', NULL, 'Y', '2019-03-04', '094', 'Wakil Bupati', 30, '43535', '', '2018', 'H. ABDUL MALIK, S. Sos,. M.Si', 'Pembina Utama Muda, IV/c  ', '196410081986031018 '),
('8afd7474058ad5adf7a4c5247feaac49', '2018-11-28', '094/003/BKD/2018', '3', 'Jalan Jalan', '2', '', '2018-11-28', '2018-11-30', 'Y', '2018-11-28', '875.1/003', NULL, 'Y', '2018-11-30', '094', 'Sekretaris Daerah', 26, 'APBD', 'Tidak ada', '2018', 'H. ABDUL MALIK, S. Sos,. M.Si', 'Pembina Utama Muda, IV/c  ', '19641008 198603 1 018 '),
('d288ce8bff14576c320871e82601f08f', '2018-11-28', '094/002/BKD/2018', '3', 'Dalam rangka mengikuti acara Rakor Kepegawaian', '2', '', '2018-11-06', '2018-11-09', 'Y', '2018-11-28', '875.1/002', NULL, 'Y', '2018-11-28', '094', 'Sekretaris Daerah', 26, 'APBD', 'Tidak ada', '2018', 'H. ABDUL MALIK, S. Sos,. M.Si', 'Pembina Utama Muda, IV/c  ', '19641008 198603 1 018 ');

-- --------------------------------------------------------

--
-- Table structure for table `nppt_detail`
--

CREATE TABLE IF NOT EXISTS `nppt_detail` (
  `id_nppt_detail` int(11) NOT NULL AUTO_INCREMENT,
  `id_nppt` varchar(100) DEFAULT NULL,
  `id_pegawai` varchar(100) DEFAULT NULL,
  `no_sppdx` varchar(100) DEFAULT NULL,
  `sppd_status` enum('Y','N') DEFAULT 'N',
  `laporan` enum('Y','N') DEFAULT 'N',
  `hasil` text,
  `tanggal_laporan` date DEFAULT NULL,
  `_wysihtml5_mode` varchar(100) DEFAULT NULL,
  `tanggal_kwitansi` date DEFAULT NULL,
  `kwitansi` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`id_nppt_detail`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=106 ;

--
-- Dumping data for table `nppt_detail`
--

INSERT INTO `nppt_detail` (`id_nppt_detail`, `id_nppt`, `id_pegawai`, `no_sppdx`, `sppd_status`, `laporan`, `hasil`, `tanggal_laporan`, `_wysihtml5_mode`, `tanggal_kwitansi`, `kwitansi`) VALUES
(98, '06b11531e4b32a746492bf4c629a332f', '1', '001/BKD/SPPD/DD/11/2018', 'Y', 'Y', '<ol><li><br></li><li><br></li></ol>', '2018-11-28', '1', '2018-11-28', 'Y'),
(99, '06b11531e4b32a746492bf4c629a332f', '2', '002/BKD/SPPD/DD/11/2018', 'Y', 'N', NULL, NULL, NULL, '2018-11-28', 'Y'),
(102, 'd288ce8bff14576c320871e82601f08f', '2', '003/BKD/SPPD/DD/11/2018', 'Y', 'N', NULL, NULL, NULL, NULL, 'N'),
(103, '8afd7474058ad5adf7a4c5247feaac49', '1', '004/BKD/SPPD/DD/11/2018', 'Y', 'N', NULL, NULL, NULL, NULL, 'N'),
(104, '8afd7474058ad5adf7a4c5247feaac49', '2', '005/BKD/SPPD/DD/11/2018', 'Y', 'N', NULL, NULL, NULL, '2018-11-28', 'Y'),
(105, '57ae78e2a16ee45ae0945585072c62d4', '2', '006/BKD/SPPD/DD/03/2019', 'Y', 'N', NULL, NULL, NULL, NULL, 'N');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE IF NOT EXISTS `pegawai` (
  `id_pegawai` int(5) NOT NULL AUTO_INCREMENT,
  `nip` varchar(90) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `pangkat` varchar(200) NOT NULL,
  `id_master_gol` int(1) DEFAULT NULL,
  `id_golongan` int(11) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `unitkerja` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `gambar` varchar(70) NOT NULL,
  PRIMARY KEY (`id_pegawai`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nip`, `nama`, `pangkat`, `id_master_gol`, `id_golongan`, `jabatan`, `unitkerja`, `username`, `password`, `gambar`) VALUES
(1, '198005032006041011', 'Erwin Fakhruddin, A.Md.', 'Panata Muda Tingkat I', 17, 2, 'Kasubbid Informasi Pegawai', 'Badan Kepegawaian Daerah', '198005032006041011', '198005032006041011', 'erwin11.jpg'),
(2, '196912312002121059', 'Hasanuddin, SH', 'Pembina', 22, 1, 'Sekretaris', 'Badan Kepegawaian Daerah', '196912312002121059', '196912312002121059', '');

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE IF NOT EXISTS `program` (
  `id_program` int(10) NOT NULL AUTO_INCREMENT,
  `kode` varchar(100) DEFAULT NULL,
  `program` varchar(200) NOT NULL,
  `aktif` enum('Y','N') NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id_program`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`id_program`, `kode`, `program`, `aktif`) VALUES
(24, '4.05.  4.05.01 . 01', 'PROGRAM PELAYANAN ADMINISTRASI PERKANTORAN', 'Y'),
(25, '4.05.  4.05.01. 07. 02', 'PROGRAM PENINGKATAN SISTEM PENGELOLAAN KEUANGAN PERANGKAT DAERAH		', 'Y'),
(26, '1.20. 1.20.06. 08', 'Program Penataan Sistem Administrasi Arsip Kepegawaian 	', 'Y'),
(27, '1.20. 1.20.06. 33', 'Program Pendidikan dan Pelatihan Pegawai	', 'Y'),
(28, '1.20. 1.20.06. 34', 'Program Pembinaan dan Pengembangan Aparatur	', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `rincianbiaya`
--

CREATE TABLE IF NOT EXISTS `rincianbiaya` (
  `id_rincianbiaya` int(10) NOT NULL AUTO_INCREMENT,
  `id_nppt_detail` int(5) NOT NULL,
  `dari` text NOT NULL,
  `uang_harian` int(80) NOT NULL DEFAULT '0',
  `uang_penginapan` int(80) NOT NULL DEFAULT '0',
  `uang_transportasi` int(80) NOT NULL DEFAULT '0',
  `id_anggaran` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_rincianbiaya`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `rincianbiaya`
--

INSERT INTO `rincianbiaya` (`id_rincianbiaya`, `id_nppt_detail`, `dari`, `uang_harian`, `uang_penginapan`, `uang_transportasi`, `id_anggaran`) VALUES
(27, 98, 'PENGGUNA ANGGARAN BADAN KEPEGAWAIAN DAERAH KABUPATEN SUMBAWA BARAT', 4750000, 4000000, 2810000, 28),
(28, 99, 'PENGGUNA ANGGARAN BADAN KEPEGAWAIAN DAERAH KABUPATEN SUMBAWA BARAT', 12250000, 6000000, 3560000, 28),
(29, 104, 'PENGGUNA ANGGARAN BADAN KEPEGAWAIAN DAERAH KABUPATEN SUMBAWA BARAT', 7350000, 3600000, 3560000, 26);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE IF NOT EXISTS `setting` (
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
  `nama_wakil_bupati` varchar(100) DEFAULT NULL,
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
  `kop_sek` text,
  PRIMARY KEY (`id_setting`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id_setting`, `nama_aplikasi`, `kota`, `instansi`, `ins`, `nama_kepala`, `pangkat_kepala`, `nip_kepala`, `bendahara`, `nip_bendahara`, `nama_pptk`, `nip_pptk`, `nama_bupati`, `nama_wakil_bupati`, `nama_sekda`, `pangkat_sekda`, `nip_sekda`, `tahun_anggaran`, `logo`, `cop`, `no_surat`, `tempat_surat`, `ttnppt`, `ttspt`, `ttsppd`, `ttspt_dua`, `kop_sek`) VALUES
(1, 'Aplikasi SPPD', 'Sumbawa Barat', 'Badan Kepegawaian Daerah Kabupaten Sumbawa Barat', 'BKD', 'H. ABDUL MALIK, S. Sos,. M.Si', 'Pembina Utama Muda, IV/c  ', '196410081986031018 ', 'Surpianti', ' 198611022014102001', '.........................', '.........................', 'Dr. Ir. H. W. MUSYAFIRIN, MM.', 'FUD SYAIFUDDIN, ST.', 'H. A. AZIS, SH., MH.', 'Pembina Utama Muda, IV/c ', '196508181993031012 ', '2018', 'Untitled.png', '<b>PEMERINTAH KABUPATEN SUMBAWA BARAT</b>\r\n\r\n<br><b>BADAN KEPEGAWAIAN DAERAH</b>\r\n<br>Jl. Bung karno No. 10 Kemutar Telu Centre, Taliwang 84335\r\n\r\n<span><br>Telp. (0372)8281784, Fax. (0372)82<span>81492&nbsp; Email: <i><u>bkd.sumbawabarat@yahoo.com</u></i></span></span>\r\n', '....', 'Taliwang', 'Kepala Badan Kepegawaian Daerah\r\n<br>\r\nKabupaten Sumbawa Barat\r\n\r\n<div><br></div><div><br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\n\r\n<b>H. ABDUL\r\nMALIK, S. Sos,. M.Si</b>\r\n\r\n<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br></span></div><div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\nPembina Utama Muda, IV/c\r\n\r\n<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br></span></div><div>&nbsp;\r\nNIP. 19641008 198603 1 018\r\n\r\n</div><br>', '<div><div>\r\n\r\nKepala Badan Kepegawaian Daerah\r\n<br>\r\nKabupaten Sumbawa Barat\r\n\r\n<div><br></div><div><br></div><div><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\n\r\n<b>H. ABDUL\r\nMALIK, S. Sos,. M.Si</b>\r\n\r\n<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br></span></div><div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\nPembina Utama Muda, IV/c\r\n\r\n<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br></span></div><div>&nbsp;\r\nNIP. 19641008 198603 1 018\r\n\r\n</div></div></div><br><br>', '<div><div>\r\n\r\n<b>An. BUPATI SUMBAWA BARAT</b> <br></div><div>\r\n<span><b>SEKRETARIS\r\nDAERAH</b>,</span>\r\n\r\n<div><br></div><div><br></div><div><br></div><div>\r\n\r\n<span><b>H. </b><b>A.\r\nAZIS, SH., MH.</b></span> <br></div><div>\r\nPembina Utama Muda, IV/c\r\n\r\n<br></div><div>NIP. 19650818 199303 1 012\r\n\r\n</div></div></div><br><br>', '', '<b>PEMERINTAH KABUPATEN SUMBAWA BARAT</b>\r\n\r\n<br><b>SEKRETARIAT DAERAH</b>\r\n<br>Jl. Bung karno No. 10 Kemutar Telu Centre, Taliwang 84335\r\n\r\n<span><br>Telp. (0372)8281784, Fax. (0372)82<span>81492&nbsp; Email: <i><u>bkd.sumbawabarat@yahoo.com</u></i></span></span>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `sppd`
--

CREATE TABLE IF NOT EXISTS `sppd` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `sppd`
--

INSERT INTO `sppd` (`id_sppd`, `id_pegawai`, `id_nppt`, `no_sppd`, `pemberi_perintah`, `instansi`, `mata_anggaran`, `keterangan`, `tgl_sppd`) VALUES
(1, '1', '1', '001/..../SPPD/LD/08/2018', 'Sekretaris Daerah', 'Badan Kepegawaian Daerah Kabupaten Sumbawa Barat', '1234567890', 'test', '18/08/2018'),
(2, '1', '2', '002/..../SPPD/LD/11/2018', 'ds', 's6T9!?n664K3T2K5!?s81106?NU680UBX1*N50T7T2?W1KUB', 'APBD', 'sfsdf', '19/11/2018'),
(3, '2', '2', '002/..../SPPD/LD/11/2018', 'ds', 's6T9!?n664K3T2K5!?s81106?NU680UBX1*N50T7T2?W1KUB', 'APBD', 'sfsdf', '19/11/2018');

-- --------------------------------------------------------

--
-- Table structure for table `spt`
--

CREATE TABLE IF NOT EXISTS `spt` (
  `id_spt` int(6) NOT NULL AUTO_INCREMENT,
  `no_spt` varchar(100) NOT NULL,
  `id_nppt` varchar(100) NOT NULL,
  `id_pegawai` varchar(100) NOT NULL,
  `tugas` text NOT NULL,
  `tgl_spt` varchar(50) NOT NULL,
  `dasar_hukum` text NOT NULL,
  PRIMARY KEY (`id_spt`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `spt`
--

INSERT INTO `spt` (`id_spt`, `no_spt`, `id_nppt`, `id_pegawai`, `tugas`, `tgl_spt`, `dasar_hukum`) VALUES
(1, '001/..../SPT/LD/08/2018', '1', '1', 'Dalam rangka mengikuti acara Rakor Kepegawaian', '18/08/2018', ''),
(2, '002/..../SPT/LD/11/2018', '2', '1-2', 'Rakor Kepegawaian', '15/11/2018', ''),
(3, '003/..../SPT/LD/11/2018', 'da51938e55309ee7c318a9db107b1a2d', '', 'Jalan Jalan', '19/11/2018', '');

-- --------------------------------------------------------

--
-- Table structure for table `transportasi`
--

CREATE TABLE IF NOT EXISTS `transportasi` (
  `id_transportasi` int(5) NOT NULL AUTO_INCREMENT,
  `transportasi` varchar(100) NOT NULL,
  `aktif` enum('Y','N') NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id_transportasi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `transportasi`
--

INSERT INTO `transportasi` (`id_transportasi`, `transportasi`, `aktif`) VALUES
(1, 'Darat', 'Y'),
(2, 'Darat dan Udara', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `ttdkwitansi`
--

CREATE TABLE IF NOT EXISTS `ttdkwitansi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kpa` varchar(300) NOT NULL,
  `nip_kpa` varchar(300) NOT NULL,
  `bendahara` varchar(100) NOT NULL,
  `nip_bendahara` varchar(100) NOT NULL,
  `pptk` varchar(100) NOT NULL,
  `nip_pptk` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `ttdkwitansi`
--

INSERT INTO `ttdkwitansi` (`id`, `kpa`, `nip_kpa`, `bendahara`, `nip_bendahara`, `pptk`, `nip_pptk`) VALUES
(1, 'H. ABDUL MALIK, S.Sos., M.Si.', '19641008 198603 1 018', 'SURPIANTI', ' 19861102 201410 2 001', '..............................................', '..............................................');

-- --------------------------------------------------------

--
-- Table structure for table `tujuan`
--

CREATE TABLE IF NOT EXISTS `tujuan` (
  `id_tujuan` int(5) NOT NULL AUTO_INCREMENT,
  `tujuan` varchar(200) NOT NULL,
  `jenis_tujuan` int(2) NOT NULL,
  PRIMARY KEY (`id_tujuan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `tujuan`
--

INSERT INTO `tujuan` (`id_tujuan`, `tujuan`, `jenis_tujuan`) VALUES
(1, 'Mataram', 1),
(2, 'Denpasar', 1),
(3, 'Jakarta', 1),
(4, 'Yogyakarta', 1),
(5, 'Surabaya', 1),
(6, 'Bima', 1),
(7, 'Sumbawa Besar', 1),
(8, 'Bandung', 1),
(9, 'Talonang', 0),
(10, 'Sekongkang', 0),
(11, 'Jereweh', 0),
(12, 'Maluk', 0),
(13, 'Brang Rea', 0),
(14, 'Brang Ene', 0),
(15, 'Seteluk', 0),
(16, 'Poto Tano', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_modul`
--

CREATE TABLE IF NOT EXISTS `users_modul` (
  `id_umod` int(11) NOT NULL AUTO_INCREMENT,
  `id_session` varchar(255) NOT NULL,
  `id_modul` int(11) NOT NULL,
  PRIMARY KEY (`id_umod`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=73 ;

--
-- Dumping data for table `users_modul`
--

INSERT INTO `users_modul` (`id_umod`, `id_session`, `id_modul`) VALUES
(72, 'kabag', 94),
(71, 'kabag', 95),
(70, 'user', 96),
(69, 'kabag', 97),
(68, 'user', 2),
(51, 'Admin', 2),
(66, 'kabag', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

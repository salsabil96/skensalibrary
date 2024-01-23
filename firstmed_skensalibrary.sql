-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 21, 2019 at 01:55 PM
-- Server version: 10.0.38-MariaDB-cll-lve
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `firstmed_skensalibrary`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` varchar(18) NOT NULL,
  `nama_anggota` varchar(40) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `email` varchar(30) NOT NULL,
  `status` enum('Siswa','Guru','Karyawan') NOT NULL,
  `keterangan` varchar(20) NOT NULL,
  `id_user` varchar(15) DEFAULT NULL,
  `file` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nama_anggota`, `jk`, `email`, `status`, `keterangan`, `id_user`, `file`) VALUES
('MBR00001', 'Hilda Farida Rauf', 'P', 'hildafarida69@gmail.com', 'Siswa', 'XII TKJ 3', 'hildafrdr', '4.jpeg'),
('MBR00002', 'Sri Sumarsih', 'P', 'sri_sumarsih@gmail.com', 'Siswa', 'XII AKUNTANSI 2', 'sri_sumarsih', '1.jpeg'),
('MBR00003', 'M. Dapit Pratama', 'L', 'pratamadapit@gmail.com', 'Siswa', 'XII TKJ 1', 'dapitp2', '2.jpeg'),
('MBR00004', 'Ratna Trihayati', 'P', 'trihayati.ratna@gmail.com', 'Siswa', 'XII MM 1', 'trihayatir1', '3.jpeg'),
('MBR00005', 'Devi Septyan', 'L', 'septyan23@gmail.com', 'Siswa', 'XII MM 1', 'devisept23', '5.jpeg'),
('MBR00006', 'Dita Andini', 'P', 'andini_dita88@gmail.com', 'Siswa', 'XII TKJ 1', 'ditaa_ndini', '6.jpeg'),
('MBR00007', 'Nurmita', 'P', 'nurmitaaa@gmail.com', 'Siswa', 'XII TKJ 2', 'nurmitaaa', '7.jpeg'),
('MBR00008', 'Acang Herdiana', 'L', 'acang221@gmail.com', 'Siswa', 'XII TATA NIAGA 3', 'acang221', '8.jpeg'),
('MBR00009', 'Putra Pratama', 'L', 'pratama_putra443@gmail.com', 'Siswa', 'XII AKUNTANSI 1', 'pratama_putra4', '9.jpeg'),
('MBR00010', 'Nico Hardeni', 'L', 'nico_hardeni@gmail.com', 'Siswa', 'XII MM 1', 'nico86hdn', '10.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `bookmark`
--

CREATE TABLE `bookmark` (
  `id_bookmark` int(4) NOT NULL,
  `id_anggota` varchar(18) DEFAULT NULL,
  `id_buku` varchar(10) DEFAULT NULL,
  `penanda` enum('ya','tidak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookmark`
--

INSERT INTO `bookmark` (`id_bookmark`, `id_anggota`, `id_buku`, `penanda`) VALUES
(11, 'MBR00001', '249111361', 'ya'),
(12, 'MBR00001', '249111358', 'ya'),
(13, 'MBR00001', '249111357', 'ya');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` varchar(10) NOT NULL,
  `tanggal_input` date NOT NULL,
  `judul_buku` varchar(60) NOT NULL,
  `id_pengarang` varchar(8) DEFAULT NULL,
  `id_penerbit` varchar(8) DEFAULT NULL,
  `id_sumber` varchar(8) DEFAULT NULL,
  `id_golongan` varchar(3) DEFAULT NULL,
  `tahun` varchar(4) NOT NULL,
  `jumlah` int(4) NOT NULL,
  `call_number` varchar(15) DEFAULT NULL,
  `foto` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `tanggal_input`, `judul_buku`, `id_pengarang`, `id_penerbit`, `id_sumber`, `id_golongan`, `tahun`, `jumlah`, `call_number`, `foto`) VALUES
('249111350', '2018-10-24', 'Pengantar Akuntansi', 'AUT00001', 'PUB00003', 'SRC00001', '600', '2013', 10, '650.001.HEN', NULL),
('249111351', '2018-10-24', 'Mengaplikasikan Komputer Akuntansi dengan MYOB Versi 18', 'AUT00002', 'PUB00001', 'SRC00001', '600', '2012', 5, '650.011.IMA', NULL),
('249111352', '2018-10-24', 'Administrasi Pajak', 'AUT00003', 'PUB00002', 'SRC00001', '600', '2016', 5, '650.016.SUG', NULL),
('249111353', '2018-10-24', 'Akuntansi Perusahaan Dagang', 'AUT00001', 'PUB00003', 'SRC00001', '600', '2013', 5, '650.021.HEN', NULL),
('249111354', '2019-06-21', 'Administrasi Keuangan', 'AUT00002', 'PUB00009', 'SRC00001', '700', '2015', 5, '650.026.HEN', NULL),
('249111355', '2018-10-24', 'Penggunaan Aplikasi Spreadsheet', 'AUT00005', 'PUB00003', 'SRC00001', '600', '2013', 9, '650.031.MUT', NULL),
('249111356', '2018-10-24', 'Akuntansi Keuangan', 'AUT00001', 'PUB00003', 'SRC00001', '600', '2013', 5, '650.041.HEN', NULL),
('249111357', '2018-10-24', 'Kimia', 'AUT00006', 'PUB00003', 'SRC00001', '500', '2013', 5, '500.001.CUC', NULL),
('249111358', '2018-10-24', 'Fisika I', 'AUT00007', 'PUB00003', 'SRC00001', '500', '2013', 5, '500.006.MAM', NULL),
('249111359', '2018-10-24', 'IPA', 'AUT00008', 'PUB00002', 'SRC00001', '500', '2013', 2, '500.011.DIN', NULL),
('249111360', '2018-10-24', 'Ensiklopedia MTK V 5', 'AUT00009', 'PUB00004', 'SRC00001', '500', '2004', 1, '500.014.PAT', NULL),
('249111361', '2018-10-24', '99 Percobaan Sehari-hari', 'AUT00010', 'PUB00005', 'SRC00001', '500', '2009', 1, '500.015.WAH', NULL),
('249111362', '2018-10-24', 'Writing Explanation Texts', 'AUT00011', 'PUB00004', 'SRC00001', '400', '2013', 1, '400.001.DJA', NULL),
('249111363', '2018-10-24', 'Writing Procedure Texts', 'AUT00011', 'PUB00004', 'SRC00001', '400', '2013', 1, '400.002.DJA', NULL),
('249111364', '2018-10-24', 'Writing Discussion', 'AUT00011', 'PUB00004', 'SRC00001', '400', '2013', 1, '400.003.DJA', NULL),
('249111365', '2018-10-24', 'Sejarah Radio', 'AUT00012', 'PUB00006', 'SRC00001', '900', '2010', 0, '900.001.EGH', NULL),
('249111366', '2018-10-24', 'Sejarah Mobil', 'AUT00013', 'PUB00006', 'SRC00001', '900', '2010', 1, '900.002.PUJ', NULL),
('249111367', '2018-10-24', 'Cara Terbaru Belajar Drum', 'AUT00014', 'PUB00007', 'SRC00001', '700', '2013', 1, '700.001.BEN', NULL),
('249111368', '2018-10-24', 'Mengaransemen dan Menyajikan Lagu Mancanegara', 'AUT00015', 'PUB00008', 'SRC00001', '700', '2013', 0, '700.002.SUP', NULL),
('249111369', '2018-10-24', 'Seluk-Beluk Perusahaan Asuransi', 'AUT00016', 'PUB00009', 'SRC00001', '600', '2011', 0, '657.001.ADI', NULL),
('249111370', '2018-10-24', 'Having Fun Open Office', 'AUT00017', 'PUB00010', 'SRC00001', '600', '2011', 1, '657.002.TEG', NULL),
('249111371', '2018-10-24', 'Mengenal Lembar Kerja', 'AUT00018', 'PUB00011', 'SRC00001', '600', '2015', 7, '657.003.SUH', NULL),
('249111372', '2018-10-24', 'Bermain Pengolah Data', 'AUT00018', 'PUB00011', 'SRC00001', '600', '2015', 7, '657.012.SUH', NULL),
('249111373', '2018-10-24', 'Seluk-Beluk Pegadaian', 'AUT00019', 'PUB00009', 'SRC00001', '600', '2011', 1, '657.013.FIK', NULL),
('249111374', '2018-10-24', 'Seluk-Beluk Perusahaan Usaha Sewa Guna', 'AUT00016', 'PUB00009', 'SRC00001', '600', '2003', 1, '657.014.ARI', NULL),
('249111375', '2019-02-12', 'Pemrograman PHP', 'AUT00007', 'PUB00003', 'SRC00001', '600', '2016', 10, '600.002.MAM', 'Tulips.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `golongan`
--

CREATE TABLE `golongan` (
  `id_golongan` varchar(4) NOT NULL,
  `nama_golongan` varchar(40) NOT NULL,
  `no_rak` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `golongan`
--

INSERT INTO `golongan` (`id_golongan`, `nama_golongan`, `no_rak`) VALUES
('000', 'Karya Umum', '000-099'),
('100', 'Filsafat', '100-199'),
('200', 'Agama', '200-299'),
('300', 'IPS', '300-399'),
('400', 'Bahasa', '400-499'),
('500', 'Ilmu Pasti/IPA', '500-599'),
('600', 'Ilmu Pengetahuan Praktis Teknologi', '600-699'),
('700', 'Olahraga dan Seni', '700-799'),
('800', 'Kesusastraan/Fiksi', '800-899'),
('900', 'Sejarah', '900-999');

-- --------------------------------------------------------

--
-- Table structure for table `kunjungan_anggota`
--

CREATE TABLE `kunjungan_anggota` (
  `id_kunjungan` int(8) NOT NULL,
  `tanggal_kunjungan` date NOT NULL,
  `id_anggota` varchar(18) NOT NULL,
  `tujuan` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kunjungan_anggota`
--

INSERT INTO `kunjungan_anggota` (`id_kunjungan`, `tanggal_kunjungan`, `id_anggota`, `tujuan`) VALUES
(1, '2018-12-29', 'MBR00001', 'Membaca Buku, Meminjam Buku'),
(2, '2018-12-29', 'MBR00001', 'Meminjam Buku, Mencari Buku'),
(3, '2018-12-20', 'MBR00010', 'Meminjam Buku'),
(4, '2018-12-25', 'MBR00002', 'Membaca Buku, Meminjam Buku, Mencari Buku'),
(5, '2018-12-18', 'MBR00007', 'Meminjam Buku, Dll'),
(6, '2018-11-20', 'MBR00005', 'Mengembalikan Buku, Mencari Buku'),
(7, '2018-12-29', 'MBR00005', 'Meminjam Buku, Dll'),
(8, '2018-11-27', 'MBR00004', 'Mengembalikan Buku'),
(9, '2018-11-30', 'MBR00009', 'Mengembalikan Buku, Dll'),
(10, '2018-12-10', 'MBR00006', 'Mengembalikan Buku'),
(11, '2018-12-19', 'MBR00001', 'Mengembalikan Buku'),
(12, '2018-11-13', 'MBR00005', 'Meminjam Buku, Dll'),
(13, '2018-11-20', 'MBR00004', 'Mencari Buku, Meminjam Buku, Dll'),
(14, '2018-12-23', 'MBR00009', 'Mencari Buku, Meminjam Buku'),
(15, '2018-12-03', 'MBR00006', 'Meminjam Buku'),
(16, '2018-12-12', 'MBR00001', 'Meminjam Buku'),
(58, '2018-12-31', 'MBR00006', 'Dll'),
(59, '2019-02-13', 'MBR00007', 'Dll'),
(60, '2019-02-13', 'MBR00008', 'Dll');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` varchar(8) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  `id_anggota` varchar(18) NOT NULL,
  `id_buku` varchar(10) NOT NULL,
  `id_petugas` varchar(18) NOT NULL,
  `status` enum('Pinjam','Kembali') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `tanggal_pinjam`, `tanggal_kembali`, `id_anggota`, `id_buku`, `id_petugas`, `status`) VALUES
('PJM00001', '2018-11-13', '2018-11-20', 'MBR00005', '249111358', 'ADM00002', 'Kembali'),
('PJM00002', '2018-11-20', '2018-11-27', 'MBR00004', '249111357', 'ADM00002', 'Kembali'),
('PJM00003', '2018-11-23', '2018-11-30', 'MBR00009', '249111366', 'ADM00002', 'Kembali'),
('PJM00004', '2018-12-03', '2018-12-10', 'MBR00006', '249111370', 'ADM00002', 'Kembali'),
('PJM00005', '2018-12-29', '2019-01-05', 'MBR00001', '249111372', 'ADM00002', 'Pinjam'),
('PJM00006', '2018-12-29', '2019-01-05', 'MBR00001', '249111355', 'ADM00002', 'Pinjam'),
('PJM00007', '2018-12-12', '2018-12-19', 'MBR00001', '249111357', 'ADM00002', 'Kembali'),
('PJM00008', '2018-12-20', '2018-12-27', 'MBR00010', '249111365', 'ADM00002', 'Pinjam'),
('PJM00009', '2018-12-25', '2019-01-01', 'MBR00002', '249111368', 'ADM00002', 'Pinjam'),
('PJM00010', '2018-12-18', '2018-12-25', 'MBR00007', '249111369', 'ADM00002', 'Pinjam'),
('PJM00011', '2018-12-29', '2019-01-05', 'MBR00005', '249111359', 'ADM00002', 'Pinjam'),
('PJM00012', '2019-02-10', '2019-02-17', 'MBR00005', '249111371', 'ADM00001', 'Pinjam');

-- --------------------------------------------------------

--
-- Table structure for table `penerbit`
--

CREATE TABLE `penerbit` (
  `id_penerbit` varchar(8) NOT NULL,
  `nama_penerbit` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penerbit`
--

INSERT INTO `penerbit` (`id_penerbit`, `nama_penerbit`) VALUES
('PUB00001', 'Inti Prima'),
('PUB00002', 'HUP'),
('PUB00003', 'ARMICO'),
('PUB00004', 'Pakar Karya'),
('PUB00005', 'Armandelta Selaras'),
('PUB00006', 'Citra Adi Bangsa'),
('PUB00007', 'Citra Adi Parama'),
('PUB00008', 'Intan Pariwara'),
('PUB00009', 'KTSP'),
('PUB00010', 'PT. Skripta Media Creative'),
('PUB00011', 'BSD');

-- --------------------------------------------------------

--
-- Table structure for table `pengarang`
--

CREATE TABLE `pengarang` (
  `id_pengarang` varchar(10) NOT NULL,
  `nama_pengarang` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengarang`
--

INSERT INTO `pengarang` (`id_pengarang`, `nama_pengarang`) VALUES
('AUT00001', 'Hendi Soematri'),
('AUT00002', 'I Made Mega'),
('AUT00003', 'Sugiyo S.Pd.'),
('AUT00004', 'Drs. Agus Syarif'),
('AUT00005', 'Muttakin Khoiruddin'),
('AUT00006', 'Cucu Suhendar'),
('AUT00007', 'Maman Surahman'),
('AUT00008', 'Dini Anggraini S.Pd.'),
('AUT00009', 'Patricia Barnes-Suarney'),
('AUT00010', 'Prof. Dr. Wahyudin'),
('AUT00011', 'Djatmika'),
('AUT00012', 'Egha Lu. Z. Prayoga'),
('AUT00013', 'Puji Tyas'),
('AUT00014', 'Benny F. Herawan'),
('AUT00015', 'Supriyantiningtyas'),
('AUT00016', 'Y.P. Ari Nugroho'),
('AUT00017', 'Teguh Pramono'),
('AUT00018', 'Suharno Widi Nugroho, ST.'),
('AUT00019', 'Fiki Puspitasari');

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id_pengembalian` int(8) NOT NULL,
  `id_peminjaman` varchar(8) NOT NULL,
  `id_petugas` varchar(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengembalian`
--

INSERT INTO `pengembalian` (`id_pengembalian`, `id_peminjaman`, `id_petugas`) VALUES
(4, 'PJM00001', 'ADM00002'),
(5, 'PJM00002', 'ADM00002'),
(6, 'PJM00003', 'ADM00002'),
(7, 'PJM00004', 'ADM00002'),
(8, 'PJM00007', 'ADM00002');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` varchar(18) NOT NULL,
  `nama_petugas` varchar(40) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `email` varchar(30) NOT NULL,
  `status` enum('Kepala Perpustakaan','Petugas Perpustakaan') NOT NULL,
  `id_user` varchar(15) DEFAULT NULL,
  `file` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `jk`, `email`, `status`, `id_user`, `file`) VALUES
('ADM00001', 'Apendi', 'L', 'apendi_352@gmail.com', 'Kepala Perpustakaan', 'apendi_drs', '1.jpg'),
('ADM00002', 'Nurhayati', 'P', 'nurhayati@gmail.com', 'Petugas Perpustakaan', 'nur_hayati', NULL),
('ADM00003', 'Salsabila', 'P', 'salsabilzsal@gmail.com', 'Petugas Perpustakaan', 'salsabil_ack', '11.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sumber`
--

CREATE TABLE `sumber` (
  `id_sumber` varchar(8) NOT NULL,
  `nama_sumber` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sumber`
--

INSERT INTO `sumber` (`id_sumber`, `nama_sumber`) VALUES
('SRC00001', 'BOS');

-- --------------------------------------------------------

--
-- Table structure for table `tamu_perpus`
--

CREATE TABLE `tamu_perpus` (
  `id_tamu` int(8) NOT NULL,
  `tanggal_kunjungan` date NOT NULL,
  `nama_tamu` varchar(60) NOT NULL,
  `jabatan` varchar(60) NOT NULL,
  `maksud_kunjungan` varchar(60) NOT NULL,
  `penerima` varchar(60) NOT NULL,
  `kesan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tamu_perpus`
--

INSERT INTO `tamu_perpus` (`id_tamu`, `tanggal_kunjungan`, `nama_tamu`, `jabatan`, `maksud_kunjungan`, `penerima`, `kesan`) VALUES
(2, '2017-04-20', 'Ahmad Yani S.Sos M.Si', 'Auditor', 'Pendampingan Audit oleh Bapak RI', 'Kepala Sekolah', 'Terkesan Ramah, Thanks...'),
(3, '2017-05-22', 'Surdati', 'Koordinator Akreditasi', 'Kasih pembinaan perpustakaan', 'Kepala Sekolah', 'Sudah ditingkatkan dalam pelayanan perpustakaan'),
(4, '2017-05-22', 'Yani Boruani', 'Koordinator Akreditasi', 'Kasih pembinaan perpustakaan', 'Kepala Sekolah', 'Sudah ditingkatkan dalam pelayanan perpustakaan'),
(5, '2017-06-07', 'Andri', 'Pustakawan', 'Akreditasi Perpustakaan', 'Kepala Sekolah, Kepala Perpustakaan', '-'),
(6, '2017-06-07', 'Nur Cahyono', 'Pustakawan', 'Akreditasi Perpustakaan', 'Kepala Sekolah, Kepala Perpustakaan', '-'),
(7, '2017-10-25', 'Suredari', 'Dari Dinas Perpus Prov. Banten', 'Mendampingi untuk akreditasi sekolah', 'Kepala Sekolah, Kepala Perpustakaan', 'Semoga akreditasi mendapatkan nilai terbaik'),
(8, '2017-10-25', 'Iwan Multirawan', 'Dari Dinas Perpus Prov. Banten', 'Mendampingi untuk akreditasi sekolah', 'Kepala Sekolah, Kepala Perpustakaan', 'Semoga akreditasi mendapatkan nilai terbaik'),
(9, '2017-11-28', 'Astri', 'Study Banding', 'Mempelajari tentang perpus sekolah', 'Petugas Perpustakaan', '-'),
(10, '2018-04-09', 'Zafira Salsabila', 'Mahasiswi', 'Penelitian untuk skripsi', 'Kepala Perpustakaan', 'Semoga pelayanan perpustakaan semakin bagus dan siswa menjadi rajin membaca di perpustakaan.');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` enum('admin','member') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `password`, `level`) VALUES
('acang221', '07d68c6f1be4caac6432fcefd63eeb5b', 'member'),
('apendi_drs', '01134ba631b39255d6b13120f1154618', 'admin'),
('dapitp2', '6afd7f9dbd4642b53d2a3fe1a47c16d7', 'member'),
('devisept23', '75f397294a781cc0d8ee247066f054e9', 'member'),
('ditaa_ndini', '4cb0b68e407a620369727f77877ac438', 'member'),
('hildafrdr', '237b2376fee75759f0fda1fe2052e186', 'member'),
('nico86hdn', 'f73407f007c9215ed8b01d58b197b23c', 'member'),
('nurmitaaa', 'c593412f75634811ced1081eef34db70', 'member'),
('nur_hayati', '0e7db22bd647b0b454a8b472c606cd5d', 'admin'),
('pratama_putra4', 'd185723537282027e55eadf416e1bcfc', 'member'),
('salsabil_ack', 'ce41950f8001fcb7782ed68a115e4d18', 'admin'),
('sri_sumarsih', '2117b783a71194a22c1c227835c1c418', 'member'),
('trihayatir1', '115edfb497794dcb3aad1426150d16cc', 'member');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `bookmark`
--
ALTER TABLE `bookmark`
  ADD PRIMARY KEY (`id_bookmark`),
  ADD KEY `bookmark_ibfk_1` (`id_anggota`),
  ADD KEY `bookmark_ibfk_2` (`id_buku`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD KEY `buku_ibfk_1` (`id_pengarang`),
  ADD KEY `buku_ibfk_2` (`id_penerbit`),
  ADD KEY `buku_ibfk_3` (`id_sumber`),
  ADD KEY `buku_ibfk_4` (`id_golongan`);

--
-- Indexes for table `golongan`
--
ALTER TABLE `golongan`
  ADD PRIMARY KEY (`id_golongan`);

--
-- Indexes for table `kunjungan_anggota`
--
ALTER TABLE `kunjungan_anggota`
  ADD PRIMARY KEY (`id_kunjungan`),
  ADD KEY `kunjungan_anggota_ibfk_1` (`id_anggota`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `peminjaman_ibfk_1` (`id_anggota`),
  ADD KEY `peminjaman_ibfk_2` (`id_buku`),
  ADD KEY `peminjaman_ibfk_3` (`id_petugas`);

--
-- Indexes for table `penerbit`
--
ALTER TABLE `penerbit`
  ADD PRIMARY KEY (`id_penerbit`);

--
-- Indexes for table `pengarang`
--
ALTER TABLE `pengarang`
  ADD PRIMARY KEY (`id_pengarang`);

--
-- Indexes for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`id_pengembalian`),
  ADD KEY `pengembalian_ibfk_1` (`id_peminjaman`),
  ADD KEY `pengembalian_ibfk_2` (`id_petugas`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`),
  ADD KEY `petugas_ibfk_1` (`id_user`);

--
-- Indexes for table `sumber`
--
ALTER TABLE `sumber`
  ADD PRIMARY KEY (`id_sumber`);

--
-- Indexes for table `tamu_perpus`
--
ALTER TABLE `tamu_perpus`
  ADD PRIMARY KEY (`id_tamu`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookmark`
--
ALTER TABLE `bookmark`
  MODIFY `id_bookmark` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `kunjungan_anggota`
--
ALTER TABLE `kunjungan_anggota`
  MODIFY `id_kunjungan` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `id_pengembalian` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tamu_perpus`
--
ALTER TABLE `tamu_perpus`
  MODIFY `id_tamu` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `anggota`
--
ALTER TABLE `anggota`
  ADD CONSTRAINT `anggota_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `bookmark`
--
ALTER TABLE `bookmark`
  ADD CONSTRAINT `bookmark_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `bookmark_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_ibfk_1` FOREIGN KEY (`id_pengarang`) REFERENCES `pengarang` (`id_pengarang`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `buku_ibfk_2` FOREIGN KEY (`id_penerbit`) REFERENCES `penerbit` (`id_penerbit`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `buku_ibfk_3` FOREIGN KEY (`id_sumber`) REFERENCES `sumber` (`id_sumber`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `buku_ibfk_4` FOREIGN KEY (`id_golongan`) REFERENCES `golongan` (`id_golongan`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `kunjungan_anggota`
--
ALTER TABLE `kunjungan_anggota`
  ADD CONSTRAINT `kunjungan_anggota_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `peminjaman_ibfk_3` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD CONSTRAINT `pengembalian_ibfk_1` FOREIGN KEY (`id_peminjaman`) REFERENCES `peminjaman` (`id_peminjaman`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pengembalian_ibfk_2` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `petugas`
--
ALTER TABLE `petugas`
  ADD CONSTRAINT `petugas_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

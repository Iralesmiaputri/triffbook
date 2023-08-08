-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2023 at 11:40 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `triffbook`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `buku_id` int(11) NOT NULL,
  `kategori` int(11) NOT NULL,
  `buku_nama` varchar(60) CHARACTER SET latin1 NOT NULL,
  `buku_harga` int(11) NOT NULL,
  `buku_harga_jual` int(11) NOT NULL,
  `buku_stok` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`buku_id`, `kategori`, `buku_nama`, `buku_harga`, `buku_harga_jual`, `buku_stok`) VALUES
(8, 2, 'aladin', 50000, 75000, '0'),
(9, 4, 'Putri Malu', 10000, 20000, '4'),
(10, 2, 'Peri', 50000, 100000, '0'),
(11, 2, 'upin', 50000, 75000, '0'),
(12, 2, 'buku testing ', 150000, 225000, '26'),
(13, 4, 'Buku SI Dul Anak Sekolahan', 4000, 8000, '0');

-- --------------------------------------------------------

--
-- Table structure for table `event_buku`
--

CREATE TABLE `event_buku` (
  `event_id` int(11) NOT NULL,
  `event_tgl` date NOT NULL,
  `event_nama` varchar(255) NOT NULL,
  `diskon` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event_buku`
--

INSERT INTO `event_buku` (`event_id`, `event_tgl`, `event_nama`, `diskon`) VALUES
(9, '2023-07-23', 'Ramadhan', '10'),
(10, '2023-07-11', 'bacadunia', '10');

-- --------------------------------------------------------

--
-- Table structure for table `hargajual`
--

CREATE TABLE `hargajual` (
  `id` int(11) NOT NULL,
  `persen` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hargajual`
--

INSERT INTO `hargajual` (`id`, `persen`) VALUES
(1, '30');

-- --------------------------------------------------------

--
-- Table structure for table `jual`
--

CREATE TABLE `jual` (
  `jual_id` int(11) NOT NULL,
  `kode_jual` varchar(20) NOT NULL,
  `jual_buku` int(11) NOT NULL,
  `jual_pengguna` int(11) NOT NULL,
  `jual_jumlah` int(11) NOT NULL,
  `jual_tgl` date NOT NULL,
  `jual_berat` varchar(11) NOT NULL,
  `jual_ket` varchar(255) NOT NULL,
  `pembeli` int(11) NOT NULL,
  `jual_event` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jual`
--

INSERT INTO `jual` (`jual_id`, `kode_jual`, `jual_buku`, `jual_pengguna`, `jual_jumlah`, `jual_tgl`, `jual_berat`, `jual_ket`, `pembeli`, `jual_event`) VALUES
(20252, '22', 12, 1, 150000, '2023-07-22', '1', 'Terjual', 6, ''),
(20253, '23', 12, 1, 150000, '2023-07-22', '1', 'Terjual', 6, ''),
(20254, '24', 12, 1, 150000, '2023-07-23', '1', 'Terjual', 6, ''),
(20255, '25', 12, 1, 202500, '2023-07-23', '1', 'Terjual', 9, '9'),
(20256, '25', 12, 1, 202500, '2023-07-23', '1', 'Terjual', 9, '9'),
(20257, '25', 12, 1, 405000, '2023-07-23', '2', 'Terjual', 9, '9'),
(20258, '26', 12, 1, 202500, '2023-07-23', '1', 'Terjual', 9, '9'),
(20259, '26', 12, 1, 202500, '2023-07-23', '1', 'Terjual', 9, '9'),
(20260, '27', 12, 1, 202500, '2023-07-23', '1', 'Terjual', 9, '9'),
(20261, '28', 12, 1, 202500, '2023-07-23', '1', 'Terjual', 6, '9'),
(20262, '28', 12, 1, 202500, '2023-07-23', '1', 'Terjual', 6, '9'),
(20263, '29', 12, 1, 202500, '2023-07-23', '1', 'Terjual', 2, '9'),
(20264, '30', 12, 1, 202500, '2023-07-23', '1', 'Terjual', 6, '9'),
(20265, '31', 12, 1, 202500, '2023-07-23', '1', 'Terjual', 6, '9'),
(20266, '31', 12, 1, 202500, '2023-07-23', '1', 'Terjual', 6, '9'),
(20267, '32', 12, 1, 202500, '2023-07-23', '1', 'Terjual', 6, '9'),
(20268, '32', 12, 1, 202500, '2023-07-23', '1', 'Terjual', 6, '9'),
(20269, '39', 12, 1, 225000, '2023-07-26', '1', 'Terjual', 6, ''),
(20270, '40', 9, 1, 67500, '2023-07-26', '1', 'Terjual', 6, ''),
(20271, '65', 12, 1, 225000, '2023-07-29', '1', 'Terjual', 6, '');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori_nama` varchar(255) NOT NULL,
  `kategori_letak` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `kategori_nama`, `kategori_letak`) VALUES
(2, 'Dongeng', 'Rak A dan B'),
(4, 'Sejarah', 'Rak C dan D');

-- --------------------------------------------------------

--
-- Table structure for table `logsetsaldo`
--

CREATE TABLE `logsetsaldo` (
  `id` int(11) NOT NULL,
  `pengguna` int(11) NOT NULL,
  `saldosebelum` varchar(255) NOT NULL,
  `jumlahset` varchar(255) NOT NULL,
  `tgl` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logsetsaldo`
--

INSERT INTO `logsetsaldo` (`id`, `pengguna`, `saldosebelum`, `jumlahset`, `tgl`) VALUES
(1, 12, '', '10000', '2023-07-10 10:59:45'),
(2, 1, '', '80000', '2023-07-10 16:01:26'),
(3, 1, '', '1000000', '2023-07-11 10:29:52'),
(4, 1, '-3925000', '1000000', '2023-07-19 14:28:01'),
(5, 1, '1000000', '2000000', '2023-07-19 14:31:55'),
(6, 1, '4252500', '10000', '2023-07-23 07:20:38');

-- --------------------------------------------------------

--
-- Table structure for table `nota`
--

CREATE TABLE `nota` (
  `id` int(11) NOT NULL,
  `pengguna` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `no_nota` int(11) NOT NULL,
  `jumlah_bayar` varchar(25) NOT NULL,
  `total_nota` varchar(25) NOT NULL,
  `kembalian` varchar(25) NOT NULL,
  `status` enum('1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nota`
--

INSERT INTO `nota` (`id`, `pengguna`, `tgl`, `no_nota`, `jumlah_bayar`, `total_nota`, `kembalian`, `status`) VALUES
(25, 9, '2023-07-01', 2, '', '810000', '4190000', '2'),
(26, 9, '2023-07-01', 3, '', '405000', '5000', '2'),
(27, 9, '2023-07-23', 1, '', '202500', '3987500', '2'),
(28, 6, '2023-07-23', 2, '405000', '405000', '0', '2'),
(29, 2, '2023-07-23', 3, '202500', '202500', '0', '2'),
(30, 6, '2023-07-23', 4, '212500', '202500', '10000', '2'),
(31, 6, '2023-07-23', 5, '405000', '405000', '0', '2'),
(32, 6, '2023-07-23', 6, '405000', '405000', '0', '2'),
(33, 6, '2023-07-23', 0, '', '', '', '1'),
(34, 6, '2023-07-26', 0, '', '', '', '1'),
(35, 6, '2023-07-26', 0, '', '', '', '1'),
(36, 6, '2023-07-26', 0, '', '', '', '1'),
(37, 6, '2023-07-26', 0, '', '', '', '1'),
(38, 6, '2023-07-26', 0, '', '', '', '1'),
(39, 6, '2023-07-26', 1, '', '225000', '', '1'),
(40, 6, '2023-07-26', 2, '', '67500', '', '1'),
(41, 6, '2023-07-26', 0, '', '', '', '1'),
(42, 6, '2023-07-26', 0, '', '', '', '1'),
(43, 6, '2023-07-26', 0, '', '', '', '1'),
(44, 6, '2023-07-26', 0, '', '', '', '1'),
(45, 6, '2023-07-26', 0, '', '', '', '1'),
(46, 6, '2023-07-26', 0, '', '', '', '1'),
(47, 6, '2023-07-26', 0, '', '', '', '1'),
(48, 6, '2023-07-26', 0, '', '', '', '1'),
(49, 6, '2023-07-26', 0, '', '', '', '1'),
(50, 6, '2023-07-26', 0, '', '', '', '1'),
(51, 6, '2023-07-26', 0, '', '', '', '1'),
(52, 6, '2023-07-26', 0, '', '', '', '1'),
(53, 6, '2023-07-26', 0, '', '', '', '1'),
(54, 6, '2023-07-26', 0, '', '', '', '1'),
(55, 6, '2023-07-26', 0, '', '', '', '1'),
(56, 6, '2023-07-26', 0, '', '', '', '1'),
(57, 6, '2023-07-26', 0, '', '', '', '1'),
(58, 6, '2023-07-26', 0, '', '', '', '1'),
(59, 6, '2023-07-26', 0, '', '', '', '1'),
(60, 6, '2023-07-26', 0, '', '', '', '1'),
(61, 6, '2023-07-26', 0, '', '', '', '1'),
(62, 6, '2023-07-26', 0, '', '', '', '1'),
(63, 6, '2023-07-26', 0, '', '', '', '1'),
(64, 6, '2023-07-26', 0, '', '', '', '1'),
(65, 6, '2023-07-29', 1, '225000', '225000', '0', '2'),
(66, 9, '2023-07-29', 0, '', '', '', '1'),
(67, 6, '2023-07-29', 0, '', '', '', '1'),
(68, 6, '2023-07-29', 0, '', '', '', '1'),
(69, 6, '2023-07-29', 0, '', '', '', '1'),
(70, 6, '2023-07-29', 0, '', '', '', '1'),
(71, 6, '2023-07-29', 0, '', '', '', '1'),
(72, 6, '2023-07-29', 0, '', '', '', '1'),
(73, 6, '2023-07-29', 0, '', '', '', '1'),
(74, 6, '2023-07-29', 0, '', '', '', '1'),
(75, 2, '2023-07-29', 0, '', '', '', '1'),
(76, 6, '2023-07-30', 0, '', '', '', '1'),
(77, 6, '2023-07-30', 0, '', '', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `penawaran`
--

CREATE TABLE `penawaran` (
  `id` int(11) NOT NULL,
  `penawar` varchar(5) NOT NULL,
  `judul` longtext NOT NULL,
  `harga` varchar(10) NOT NULL,
  `jumlah` varchar(10) NOT NULL,
  `status` enum('1','2','3') NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penawaran`
--

INSERT INTO `penawaran` (`id`, `penawar`, `judul`, `harga`, `jumlah`, `status`, `tanggal`) VALUES
(15, '25', 'ipa', '45000', '1', '2', '2023-07-30 09:34:24'),
(16, '25', 'IPS', '50000', '2', '3', '2023-07-30 09:34:22'),
(17, '25', 'Dongeng', '60000', '1', '2', '2023-07-30 09:34:18');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `pengguna_id` int(11) NOT NULL,
  `pengguna_nama` varchar(50) NOT NULL,
  `pengguna_email` varchar(255) NOT NULL,
  `pengguna_username` varchar(50) NOT NULL,
  `pengguna_password` varchar(255) NOT NULL,
  `pengguna_level` enum('admin','nasabah','non') NOT NULL,
  `saldo` int(11) NOT NULL,
  `pengguna_status` int(11) NOT NULL,
  `pendaftaran` enum('online','offline','admin') NOT NULL,
  `tgl_daftar` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `pengguna_rek` varchar(30) NOT NULL,
  `pengguna_ktp` varchar(30) NOT NULL,
  `pengguna_foto` varchar(50) NOT NULL,
  `tlp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`pengguna_id`, `pengguna_nama`, `pengguna_email`, `pengguna_username`, `pengguna_password`, `pengguna_level`, `saldo`, `pengguna_status`, `pendaftaran`, `tgl_daftar`, `pengguna_rek`, `pengguna_ktp`, `pengguna_foto`, `tlp`) VALUES
(1, 'Admin', 'admin@gmail.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 235000, 1, 'admin', '2023-07-29 11:57:29', '', '', 'pxfuel1.jpg', ''),
(2, 'Non Member', '', 'nonmember', 'd382ea194377428d7b6ac4cc588ecb34', 'non', 0, 1, 'admin', '2023-07-22 21:02:25', '', '', 'pxfuel1.jpg', ''),
(6, 'udin', 'udin@gmail.com', 'udin', '6bec9c852847242e384a4d5ac0962ba0', 'nasabah', 0, 1, 'offline', '2023-07-29 11:57:29', '123', '', '', ''),
(9, 'amat', 'amat@gmail.com', 'amat', 'ce895cbd7246d55f009962a41081454b', 'nasabah', 0, 1, 'offline', '2023-07-22 19:50:59', '09822123', '', '', ''),
(11, 'andra', 'andra@gmail.com', 'andra', '3727986f3e78114b05a3cb5c957ccc77', 'nasabah', 0, 1, 'online', '2023-07-17 10:15:32', '12333', '1232333454', '', ''),
(12, 'admin dua', 'admin@gmail.com', 'admin2', '0192023a7bbd73250516f069df18b500', 'admin', 0, 1, 'offline', '2023-07-10 10:47:45', '123123', '123123', '', '123123'),
(25, 'ira lesmia', 'iralesmiap49@gmail.com', 'ira', 'f4c39fded611217190799ca2289d6138', 'nasabah', 0, 1, 'online', '2023-07-30 07:57:06', '0562123', '632012933333', 'contohktp31.png', '');

-- --------------------------------------------------------

--
-- Table structure for table `retur`
--

CREATE TABLE `retur` (
  `retur_id` int(11) NOT NULL,
  `retur_tgl` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `retur_pembeli` int(11) NOT NULL,
  `retur_buku` int(11) NOT NULL,
  `retur_jml` int(11) NOT NULL,
  `retur_jual` int(11) NOT NULL,
  `retur_ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `retur`
--

INSERT INTO `retur` (`retur_id`, `retur_tgl`, `retur_pembeli`, `retur_buku`, `retur_jml`, `retur_jual`, `retur_ket`) VALUES
(8, '2023-07-22 16:38:34', 6, 12, 1, 20253, ''),
(9, '2023-07-22 18:12:08', 9, 12, 2, 20257, '');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat`
--

CREATE TABLE `riwayat` (
  `riwayat_id` int(11) NOT NULL,
  `riwayat_pengguna` int(11) NOT NULL,
  `riwayat_setor` varchar(50) NOT NULL,
  `riwayat_tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `riwayat`
--

INSERT INTO `riwayat` (`riwayat_id`, `riwayat_pengguna`, `riwayat_setor`, `riwayat_tgl`) VALUES
(10, 11, '5', '2023-07-08'),
(11, 9, '50', '2023-07-19');

-- --------------------------------------------------------

--
-- Table structure for table `saran`
--

CREATE TABLE `saran` (
  `id` int(11) NOT NULL,
  `pengguna_saran` varchar(25) NOT NULL,
  `isi` longtext NOT NULL,
  `tgl` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` enum('1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `saran`
--

INSERT INTO `saran` (`id`, `pengguna_saran`, `isi`, `tgl`, `status`) VALUES
(1, '6', 'Tes Isi Saran Udin', '2023-07-30 06:40:22', '2'),
(2, '6', 'testing\r\n', '2023-07-30 06:41:18', '2'),
(3, '25', 'sangat membantu saya dalam meningkatkan ketertarikan membaca buku\r\n', '2023-07-30 08:01:36', '1');

-- --------------------------------------------------------

--
-- Table structure for table `setor`
--

CREATE TABLE `setor` (
  `setor_id` int(11) NOT NULL,
  `setor_pengguna` int(11) NOT NULL,
  `setor_buku` int(11) NOT NULL,
  `setor_ket` varchar(255) CHARACTER SET latin1 NOT NULL,
  `setor_berat` varchar(11) NOT NULL,
  `setor_tgl` date NOT NULL,
  `setor_jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `setor`
--

INSERT INTO `setor` (`setor_id`, `setor_pengguna`, `setor_buku`, `setor_ket`, `setor_berat`, `setor_tgl`, `setor_jumlah`) VALUES
(52, 9, 12, '', '50', '2023-07-19', 5000000);

-- --------------------------------------------------------

--
-- Table structure for table `tarik`
--

CREATE TABLE `tarik` (
  `tarik_id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tarik_pengguna` int(11) NOT NULL,
  `tarik_jumlah` int(11) NOT NULL,
  `tarik_tgl` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tarik_ket` longtext NOT NULL,
  `cash` int(11) NOT NULL,
  `bukti` varchar(255) NOT NULL,
  `penanggung_jawab` varchar(25) NOT NULL,
  `status` enum('1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`buku_id`);

--
-- Indexes for table `event_buku`
--
ALTER TABLE `event_buku`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `hargajual`
--
ALTER TABLE `hargajual`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jual`
--
ALTER TABLE `jual`
  ADD PRIMARY KEY (`jual_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `logsetsaldo`
--
ALTER TABLE `logsetsaldo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nota`
--
ALTER TABLE `nota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penawaran`
--
ALTER TABLE `penawaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`pengguna_id`);

--
-- Indexes for table `retur`
--
ALTER TABLE `retur`
  ADD PRIMARY KEY (`retur_id`);

--
-- Indexes for table `riwayat`
--
ALTER TABLE `riwayat`
  ADD PRIMARY KEY (`riwayat_id`);

--
-- Indexes for table `saran`
--
ALTER TABLE `saran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setor`
--
ALTER TABLE `setor`
  ADD PRIMARY KEY (`setor_id`);

--
-- Indexes for table `tarik`
--
ALTER TABLE `tarik`
  ADD PRIMARY KEY (`tarik_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `buku_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `event_buku`
--
ALTER TABLE `event_buku`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `hargajual`
--
ALTER TABLE `hargajual`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jual`
--
ALTER TABLE `jual`
  MODIFY `jual_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20272;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `logsetsaldo`
--
ALTER TABLE `logsetsaldo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `nota`
--
ALTER TABLE `nota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `penawaran`
--
ALTER TABLE `penawaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `pengguna_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `retur`
--
ALTER TABLE `retur`
  MODIFY `retur_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `riwayat`
--
ALTER TABLE `riwayat`
  MODIFY `riwayat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `saran`
--
ALTER TABLE `saran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `setor`
--
ALTER TABLE `setor`
  MODIFY `setor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `tarik`
--
ALTER TABLE `tarik`
  MODIFY `tarik_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

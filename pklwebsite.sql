-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2022 at 07:01 AM
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
-- Database: `pklwebsite`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nip` int(50) NOT NULL,
  `nama` text NOT NULL,
  `nomortelpon` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `user_id`, `nip`, `nama`, `nomortelpon`) VALUES
(2, 9, 2147483647, 'agung bayu W', '0827398201');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mahasiswa` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nim` int(20) NOT NULL,
  `nama` text NOT NULL,
  `nomormhs` varchar(15) NOT NULL,
  `nomorortu` varchar(15) NOT NULL,
  `kodeprodi` int(10) NOT NULL,
  `kelas` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mahasiswa`, `user_id`, `nim`, `nama`, `nomormhs`, `nomorortu`, `kodeprodi`, `kelas`) VALUES
(1, 5, 1841720177, 'babe', '0826474829', '0826474828', 0, 'TI4H'),
(2, 6, 1841720176, 'farras', '081637483920', '081637483921', 0, 'MI3H'),
(3, 11, 186579034, 'adristi', '08263648439', '08263648438', 0, 'TI4H'),
(4, 12, 186729034, 'wandi', '08263648439', '08263648437', 0, 'TI4H'),
(5, 13, 184152672, 'bubu', '0826364776', '0826364777', 0, 'MI2H');

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_admin`
--

CREATE TABLE `pengajuan_admin` (
  `id_pengajuan` int(11) NOT NULL,
  `mahasiswa_id` int(11) NOT NULL,
  `file_pengajuan` text NOT NULL,
  `file_balasan` text NOT NULL,
  `file_perusahaan` text NOT NULL,
  `create_at` datetime NOT NULL,
  `update_at` datetime DEFAULT NULL,
  `namaAng1` varchar(100) NOT NULL,
  `namaAng2` varchar(100) NOT NULL,
  `nimAng1` varchar(20) NOT NULL,
  `nimAng2` varchar(20) NOT NULL,
  `prodi` varchar(15) NOT NULL,
  `tempat` text NOT NULL,
  `tanggalMulai` date DEFAULT current_timestamp(),
  `tanggalAkhir` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengajuan_admin`
--

INSERT INTO `pengajuan_admin` (`id_pengajuan`, `mahasiswa_id`, `file_pengajuan`, `file_balasan`, `file_perusahaan`, `create_at`, `update_at`, `namaAng1`, `namaAng2`, `nimAng1`, `nimAng2`, `prodi`, `tempat`, `tanggalMulai`, `tanggalAkhir`) VALUES
(1, 2, '249244-none-837c3dfb1.pdf', '', '', '2022-05-21 00:00:00', NULL, '', '', '', '', '', '', '2022-06-15', NULL),
(2, 1, '249244-none-837c3dfb2.pdf', '', '', '2022-05-25 00:00:00', NULL, '', '', '', '', '', '', '2022-06-15', NULL),
(3, 4, '02_TI-4H_Adristi_Iftitah_Y_Tugas_Paragraf.pdf', '', '', '2022-06-07 00:00:00', NULL, '', '', '', '', '', '', '2022-06-15', NULL),
(4, 5, '02_TI-4H_Adristi_Iftitah_Y_Tugas_Paragraf1.pdf', '', '', '2022-06-15 00:00:00', NULL, 'Babi', 'Bibi', '124567', '12458', 'D4 Teknik', 'Indosat', '2022-06-15', '2022-07-09');

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_pembimbing`
--

CREATE TABLE `pengajuan_pembimbing` (
  `id_pengajuan_pembimbing` int(11) NOT NULL,
  `nim` int(15) NOT NULL,
  `nim_dua` int(15) NOT NULL,
  `nim_tiga` int(15) NOT NULL,
  `dosen_id` int(11) NOT NULL,
  `file_pengajuan` text NOT NULL,
  `status` varchar(30) NOT NULL,
  `create_at` datetime NOT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengajuan_pembimbing`
--

INSERT INTO `pengajuan_pembimbing` (`id_pengajuan_pembimbing`, `nim`, `nim_dua`, `nim_tiga`, `dosen_id`, `file_pengajuan`, `status`, `create_at`, `update_at`) VALUES
(1, 1841720176, 0, 0, 2, '249244-none-837c3dfb.pdf', 'disetujui', '2022-05-21 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan`
--

CREATE TABLE `perusahaan` (
  `id_perusahaan` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `telpon` varchar(20) NOT NULL,
  `qty` int(11) NOT NULL,
  `penanggung_jawab` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perusahaan`
--

INSERT INTO `perusahaan` (`id_perusahaan`, `nama`, `alamat`, `telpon`, `qty`, `penanggung_jawab`) VALUES
(2, 'PT Telkom Sigma', '', '08162537382', 3, 'Risti');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `email` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `level` varchar(10) NOT NULL COMMENT '''admin'',''mahasiswa'',''dosen'''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `email`, `password`, `level`) VALUES
(1, 'leedong@gmail.com', 'b7574274521e901db3e13dbd30b70ac1', 'mahasiswa'),
(2, 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(4, 'adristi@gmail.com', '1d6163f32c3071fd9f244b66c36f3218', 'mahasiswa'),
(5, 'babe@gmail.com', '420fc26fa13e665e32ca17ea781c645a', 'mahasiswa'),
(6, 'farras@gmail.com', '27b7597f25f85ef4a8c26443f7a0ebcf', 'mahasiswa'),
(9, 'agung@gmail.com', '6f5d0ad4bc971cddc51a0c5f74bdf3fd', 'dosen'),
(11, 'adristi@gmail.com', '1d6163f32c3071fd9f244b66c36f3218', 'mahasiswa'),
(12, 'wandi@gmail.com', '3b061f6cd9ce9137e02c651f87e166b2', 'mahasiswa'),
(13, 'bubu@gmail.com', '098eb8ba2cc924fad0ec05acd869a4eb', 'mahasiswa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `pengajuan_admin`
--
ALTER TABLE `pengajuan_admin`
  ADD PRIMARY KEY (`id_pengajuan`),
  ADD KEY `mahasiswa_id` (`mahasiswa_id`);

--
-- Indexes for table `pengajuan_pembimbing`
--
ALTER TABLE `pengajuan_pembimbing`
  ADD PRIMARY KEY (`id_pengajuan_pembimbing`);

--
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id_perusahaan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pengajuan_admin`
--
ALTER TABLE `pengajuan_admin`
  MODIFY `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pengajuan_pembimbing`
--
ALTER TABLE `pengajuan_pembimbing`
  MODIFY `id_pengajuan_pembimbing` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `id_perusahaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dosen`
--
ALTER TABLE `dosen`
  ADD CONSTRAINT `dosen_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_users`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_users`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengajuan_admin`
--
ALTER TABLE `pengajuan_admin`
  ADD CONSTRAINT `pengajuan_admin_ibfk_1` FOREIGN KEY (`mahasiswa_id`) REFERENCES `mahasiswa` (`id_mahasiswa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

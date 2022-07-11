-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2022 at 04:54 PM
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
  `nip` varchar(50) NOT NULL,
  `nama` text NOT NULL,
  `nomortelpon` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `user_id`, `nip`, `nama`, `nomortelpon`) VALUES
(4, 17, '198902102019031020', 'Agung Nugroho Pramudhita, S.T., M.T.', '081334699967');

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
  `id_perusahaan` int(11) NOT NULL,
  `tanggalMulai` date DEFAULT NULL,
  `tanggalAkhir` date DEFAULT NULL,
  `id_pembimbing` int(11) DEFAULT NULL,
  `file_mou` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(2, 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(17, 'agung@gmail.com', '5586c12b64d73ee923f729972f9940a4', 'dosen');

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
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pengajuan_admin`
--
ALTER TABLE `pengajuan_admin`
  MODIFY `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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

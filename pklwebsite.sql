-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Mar 2022 pada 15.01
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 8.0.3

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
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `email` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `level` varchar(10) NOT NULL COMMENT '''admin'',''mahasiswa'',''dosen''',
  `nama_mhs` text DEFAULT NULL,
  `nim` varchar(11) DEFAULT NULL,
  `np_mhs` varchar(11) NOT NULL,
  `np_ortu` varchar(11) NOT NULL,
  `kodeprodi` varchar(11) DEFAULT NULL,
  `kelas` varchar(11) DEFAULT NULL,
  `nama_dsn` text NOT NULL,
  `nip` int(100) NOT NULL,
  `nomordsn` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_users`, `email`, `password`, `level`, `nama_mhs`, `nim`, `np_mhs`, `np_ortu`, `kodeprodi`, `kelas`, `nama_dsn`, `nip`, `nomordsn`) VALUES
(1, 'leedong@gmail.com', 'b7574274521e901db3e13dbd30b70ac1', 'mahasiswa', 'Donghae', '18413456', '0812456739', '0817645890', 'teknik info', 'TI3K', '', 0, 0),
(2, 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'admin', NULL, NULL, '', '', NULL, NULL, '', 0, 0),
(3, 'dosen1@gmail.com', 'f499263a253447dd5cb68dafb9f13235', 'dosen', NULL, NULL, '', '', NULL, NULL, '', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

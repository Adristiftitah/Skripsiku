-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Apr 2022 pada 12.24
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
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nip` int(50) NOT NULL,
  `nama` text NOT NULL,
  `nomortelpon` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `user_id`, `nip`, `nama`, `nomortelpon`) VALUES
(2, 9, 2147483647, 'agung bayu W', '0827398201');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
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
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mahasiswa`, `user_id`, `nim`, `nama`, `nomormhs`, `nomorortu`, `kodeprodi`, `kelas`) VALUES
(1, 5, 1841720177, 'babe', '0826474829', '0826474828', 0, 'TI4H'),
(2, 6, 1841720176, 'farras', '081637483920', '081637483921', 0, 'MI3H');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajuan_admin`
--

CREATE TABLE `pengajuan_admin` (
  `id_pengajuan` int(11) NOT NULL,
  `mahasiswa_id` int(11) NOT NULL,
  `file_pengajuan` text NOT NULL,
  `file_balasan` text NOT NULL,
  `file_perusahaan` text NOT NULL,
  `create_at` datetime NOT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajuan_pembimbing`
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
-- Struktur dari tabel `perusahaan`
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
-- Dumping data untuk tabel `perusahaan`
--

INSERT INTO `perusahaan` (`id_perusahaan`, `nama`, `alamat`, `telpon`, `qty`, `penanggung_jawab`) VALUES
(2, 'PT Telkom Sigma', '', '08162537382', 3, 'Risti');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `email` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `level` varchar(10) NOT NULL COMMENT '''admin'',''mahasiswa'',''dosen'''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_users`, `email`, `password`, `level`) VALUES
(1, 'leedong@gmail.com', 'b7574274521e901db3e13dbd30b70ac1', 'mahasiswa'),
(2, 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(4, 'adristi@gmail.com', '1d6163f32c3071fd9f244b66c36f3218', 'mahasiswa'),
(5, 'babe@gmail.com', '420fc26fa13e665e32ca17ea781c645a', 'mahasiswa'),
(6, 'farras@gmail.com', '27b7597f25f85ef4a8c26443f7a0ebcf', 'mahasiswa'),
(9, 'agung@gmail.com', 'f6d40f5fa7a3ab9cd920bd5d10afbe1d', 'dosen');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `pengajuan_admin`
--
ALTER TABLE `pengajuan_admin`
  ADD PRIMARY KEY (`id_pengajuan`),
  ADD KEY `mahasiswa_id` (`mahasiswa_id`);

--
-- Indeks untuk tabel `pengajuan_pembimbing`
--
ALTER TABLE `pengajuan_pembimbing`
  ADD PRIMARY KEY (`id_pengajuan_pembimbing`);

--
-- Indeks untuk tabel `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id_perusahaan`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pengajuan_admin`
--
ALTER TABLE `pengajuan_admin`
  MODIFY `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pengajuan_pembimbing`
--
ALTER TABLE `pengajuan_pembimbing`
  MODIFY `id_pengajuan_pembimbing` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `id_perusahaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD CONSTRAINT `dosen_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_users`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_users`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengajuan_admin`
--
ALTER TABLE `pengajuan_admin`
  ADD CONSTRAINT `pengajuan_admin_ibfk_1` FOREIGN KEY (`mahasiswa_id`) REFERENCES `mahasiswa` (`id_mahasiswa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

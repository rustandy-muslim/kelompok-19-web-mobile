-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Jan 2025 pada 07.38
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reparasihp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `orderperbaikan`
--

CREATE TABLE `orderperbaikan` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `hp` varchar(16) NOT NULL,
  `layananperbaikan` varchar(100) NOT NULL,
  `merk` varchar(100) NOT NULL,
  `jenisperbaikan` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` varchar(8) NOT NULL,
  `alamat` varchar(300) NOT NULL,
  `status` varchar(100) NOT NULL,
  `teknisi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `orderperbaikan`
--

INSERT INTO `orderperbaikan` (`id`, `nama`, `hp`, `layananperbaikan`, `merk`, `jenisperbaikan`, `tanggal`, `waktu`, `alamat`, `status`, `teknisi`) VALUES
(43, 'Muhammad Shaleh Zakilsyam', '0812222222', 'Samsung', '', 'Mati Total', '2024-12-28', '15:21', 'kilo 10', 'Dalam Penanganan', 'syamsudin'),
(44, 'Dandy Fajar ', '085211111111', 'mito', '', 'ganti lcd', '2024-12-28', '15:21', 'kilo 24', 'Canceled', 'rustandi muslim');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `nama`, `username`, `email`, `password`) VALUES
(15, 'Ahmad Afandi', 'Afandi saja', 'afandi123@gmail.com', '$2y$10$RjUQBUyM9iSL0yI9uNEYhe0Yv8LCp7xCdzz081qJjRkBREgB3hXQC'),
(16, 'Dandi Fajar febrian', 'dandi', 'Dandy@gmail.com', '$2y$10$V47iUJJfLu0s3ichKxrzD.FaeyNwN7a2ZFr/EXCXfqDMpdW3CwEoi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `teknisi`
--

CREATE TABLE `teknisi` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `hp` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `keahlian` varchar(100) NOT NULL,
  `alamat` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `teknisi`
--

INSERT INTO `teknisi` (`id`, `nama`, `username`, `hp`, `email`, `password`, `keahlian`, `alamat`) VALUES
(13, 'rustandi muslim', 'rustandimuslim', '', 'rustandimuslim392@gmail.com', '$2y$10$sccWdT19jLddt8nS.ty62e6c8ROWVLFUi1D0B8ZReTQ4uFvPLnHQu', 'teknisi mobil', 'jln pendidikan'),
(14, 'syamsudin', 'syam', '', 'syam@gmail.com', '$2y$10$meNB.nbn3fv6d.HhkGrIa.F6sDe2lkhuN3ON9jgKFYFmEQRN5gRh.', 'teknisi mobil', 'kilang'),
(15, 'marchellllllllllllll', 'Acel', '', 'acel123@gmail.com', '$2y$10$SLNXfnXyapxt/b9LEfVZTuujBaiuqkdB2oZm4Om2CdS75VQU.yeQW', 'teknisi mobil', 'jln pendidikan ');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `orderperbaikan`
--
ALTER TABLE `orderperbaikan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `teknisi`
--
ALTER TABLE `teknisi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `orderperbaikan`
--
ALTER TABLE `orderperbaikan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `teknisi`
--
ALTER TABLE `teknisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

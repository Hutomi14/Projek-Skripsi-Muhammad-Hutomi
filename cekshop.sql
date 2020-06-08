-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Apr 2020 pada 10.16
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cekshop`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pencarian`
--

CREATE TABLE `data_pencarian` (
  `kode_pencarian` int(10) NOT NULL,
  `keyword` varchar(20) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `nama_user` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_pencarian`
--

INSERT INTO `data_pencarian` (`kode_pencarian`, `keyword`, `jumlah`, `nama_user`) VALUES
(11, 'kemeja pria', 2, 'Kak Eni Ratnasari'),
(12, '', 0, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_produk`
--

CREATE TABLE `data_produk` (
  `itemid` varchar(15) NOT NULL,
  `shopid` varchar(15) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` varchar(15) NOT NULL,
  `produk_terjual` int(10) NOT NULL,
  `status_produk` varchar(10) NOT NULL,
  `rating_produk` varchar(10) NOT NULL,
  `ratingdgnfoto` int(10) NOT NULL,
  `ratingdgntext` int(10) NOT NULL,
  `jumlah_penilai` int(10) NOT NULL,
  `bintang1` int(10) NOT NULL,
  `bintang2` int(10) NOT NULL,
  `bintang3` int(10) NOT NULL,
  `bintang4` int(10) NOT NULL,
  `bintang5` int(10) NOT NULL,
  `gambar_produk` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_toko`
--

CREATE TABLE `data_toko` (
  `shopid` varchar(15) NOT NULL,
  `kode_pencarian` int(10) NOT NULL,
  `nama_toko` varchar(30) NOT NULL,
  `jumlah_produk` int(10) NOT NULL,
  `lokasi_toko` varchar(70) NOT NULL,
  `rating_toko` varchar(10) NOT NULL,
  `pemilik_toko` varchar(30) NOT NULL,
  `rating_baik` int(10) NOT NULL,
  `rating_normal` int(10) NOT NULL,
  `rating_buruk` int(10) NOT NULL,
  `following` int(10) NOT NULL,
  `follower` int(10) NOT NULL,
  `pengiriman` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `nama_user`
--

CREATE TABLE `nama_user` (
  `nama_user` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_pencarian`
--
ALTER TABLE `data_pencarian`
  ADD PRIMARY KEY (`kode_pencarian`);

--
-- Indeks untuk tabel `data_produk`
--
ALTER TABLE `data_produk`
  ADD PRIMARY KEY (`itemid`);

--
-- Indeks untuk tabel `data_toko`
--
ALTER TABLE `data_toko`
  ADD PRIMARY KEY (`shopid`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_pencarian`
--
ALTER TABLE `data_pencarian`
  MODIFY `kode_pencarian` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

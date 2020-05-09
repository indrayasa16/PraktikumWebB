-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Bulan Mei 2020 pada 08.38
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pagination`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahassiwa`
--

CREATE TABLE `mahassiwa` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `nim` varchar(100) NOT NULL,
  `age` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mahassiwa`
--

INSERT INTO `mahassiwa` (`id`, `name`, `nim`, `age`) VALUES
(1, 'I Made Suastika', '1708561001', 22),
(2, 'Angie Safira Indah', '1708561002', 22),
(3, 'Benedict Emanuel Sutrisna', '1708561003', 22),
(4, 'I Dewa Gede Rama Satya', '1708561004', 22),
(5, 'I Made Cantiawan Giri Kusuma', '1708561005', 22),
(6, 'Muhammad Firyanul Rizky', '1708561006', 22),
(7, 'Putu Mas Anggita Putra', '1708561007', 22),
(9, 'I Putu Agus Wahyu Widiatmika', '1708561008', 22),
(10, 'I Gusti Ayu Purnami Indryaswari', '1708561009', 22),
(11, 'I Gusti Bagus Dharma Putra', '1708561010', 22),
(12, 'Sandi', '1708561011', 22),
(13, 'I Putu Denny Indra Putra', '1708561013', 22);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `mahassiwa`
--
ALTER TABLE `mahassiwa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `mahassiwa`
--
ALTER TABLE `mahassiwa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

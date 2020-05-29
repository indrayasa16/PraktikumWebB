-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Bulan Mei 2020 pada 15.03
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `meminjam`
--

CREATE TABLE `meminjam` (
  `id_pinjam` int(3) NOT NULL,
  `tgl_pinjam` date DEFAULT NULL,
  `id_anggota` int(3) DEFAULT NULL,
  `kd_buku` varchar(5) DEFAULT NULL,
  `kembali` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `meminjam`
--

INSERT INTO `meminjam` (`id_pinjam`, `tgl_pinjam`, `id_anggota`, `kd_buku`, `kembali`) VALUES
(1, '0000-00-00', 8, 'BK04', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_buku`
--

CREATE TABLE `tb_buku` (
  `kode_buku` varchar(10) NOT NULL,
  `judul_buku` varchar(128) NOT NULL,
  `penulis` varchar(128) NOT NULL,
  `tahun_terbit` int(4) NOT NULL,
  `nama_penerbit` varchar(128) NOT NULL,
  `gambar` varchar(128) NOT NULL,
  `rak` varchar(128) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_buku`
--

INSERT INTO `tb_buku` (`kode_buku`, `judul_buku`, `penulis`, `tahun_terbit`, `nama_penerbit`, `gambar`, `rak`, `stok`) VALUES
('BK01', 'The 7 Habits Of Highly Effective Teens', 'Sean Covey', 1998, 'Free Press', 'buku4.jpg', 'R01', 10),
('BK02', 'Masa Muda', 'Leo Tolstoy', 2019, 'BasaBasi', 'masa-muda.jpg', 'R02', 6),
('BK03', 'Masa Remaja', 'Leo Tolstoy', 2018, 'BasaBasi', 'buku3.jpg', 'R02', 20),
('BK04', 'Masa Kecil', 'Leo Tolstoy', 2017, 'BasaBasi', 'masa-kecil.jpg', 'R02', 7),
('BK05', 'Einstein Kehidupan dan Pengaruhnya Bagi Dunia', 'Walter Isaacson', 2012, 'Bentang Buku Indonesia', 'buku1.png', 'R01', 10),
('BK08', 'bg', 'th', 2345, 'ht', 'f4a47f028e1422107025d40e9683c944.jpg', 'ge', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `passwords` varchar(11) NOT NULL,
  `alamat` text NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('Laki - Laki','Perempuan','','') NOT NULL,
  `no_tlp` varchar(13) NOT NULL,
  `status_user` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id`, `nama`, `username`, `passwords`, `alamat`, `tanggal_lahir`, `jenis_kelamin`, `no_tlp`, `status_user`) VALUES
(1, 'Claire', 'claire123', '12345', '', '0000-00-00', 'Laki - Laki', '0', 'User'),
(2, 'James Arthur', 'james123', '12345', '', '0000-00-00', 'Laki - Laki', '0', 'SuperAdmin'),
(3, 'Raffael Albert', 'raffa123', '12345', '', '0000-00-00', 'Laki - Laki', '0', 'User'),
(4, 'Hammera', 'mera123', '12345', '', '0000-00-00', 'Laki - Laki', '0', 'Admin'),
(8, 'Ayu Made Surya Indra Dewi', '1708561027', '12345', 'Melbourne, Australia', '2020-05-28', 'Perempuan', '081222444666', 'User'),
(9, 'Damarion', 'superadmin', '12345', 'Bangli', '2020-05-13', 'Laki - Laki', '081222333444', 'Super Admin'),
(10, 'Azka', 'superadmin1', '12345', 'Singapura', '2020-05-04', 'Laki - Laki', '082345678901', 'Super Admin'),
(11, 'Alyssa', 'admin1', '1234', 'Denpasar', '2020-05-05', 'Perempuan', '081234567890', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `meminjam`
--
ALTER TABLE `meminjam`
  ADD PRIMARY KEY (`id_pinjam`),
  ADD KEY `id_anggota` (`id_anggota`),
  ADD KEY `kd_buku` (`kd_buku`);

--
-- Indeks untuk tabel `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD PRIMARY KEY (`kode_buku`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `meminjam`
--
ALTER TABLE `meminjam`
  MODIFY `id_pinjam` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `meminjam`
--
ALTER TABLE `meminjam`
  ADD CONSTRAINT `meminjam_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `tb_user` (`id`),
  ADD CONSTRAINT `meminjam_ibfk_2` FOREIGN KEY (`kd_buku`) REFERENCES `tb_buku` (`kode_buku`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

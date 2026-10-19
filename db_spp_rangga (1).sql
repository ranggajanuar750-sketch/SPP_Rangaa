-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Okt 2026 pada 07.35
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_spp_rangga`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` varchar(5) NOT NULL,
  `nama_kelas` varchar(10) NOT NULL,
  `kompetensi_keahlian` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `kompetensi_keahlian`) VALUES
('K01', 'XII RPL 2', 'REKAYASA PERANGKAT LUNAK'),
('K02', 'XII AKL 2', 'AKUNTANSI KEUANGAN LEMBAGA'),
('K03', 'XI RPL 1', 'REKAYASA PERANGKAT LUNAK');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(10) NOT NULL,
  `no_bayar` varchar(11) DEFAULT NULL,
  `id_petugas` varchar(5) DEFAULT NULL,
  `nisn` varchar(10) DEFAULT NULL,
  `tgl_pembayaran` date DEFAULT NULL,
  `bulan_tagihan` varchar(12) DEFAULT NULL,
  `tahun_tagihan` int(4) DEFAULT NULL,
  `id_spp` varchar(5) DEFAULT NULL,
  `keterangan` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `no_bayar`, `id_petugas`, `nisn`, `tgl_pembayaran`, `bulan_tagihan`, `tahun_tagihan`, `id_spp`, `keterangan`) VALUES
(62, '2609040001', 'A1', 'SIS001', '2026-09-04', 'Juli', 2026, 'SPP03', 'LUNAS'),
(63, '2609040002', 'A1', 'SIS001', '2026-09-04', 'Agustus', 2026, 'SPP03', 'LUNAS'),
(64, '2610010001', 'A1', 'SIS001', '2026-10-01', 'September', 2026, 'SPP03', 'LUNAS'),
(65, NULL, NULL, 'SIS001', NULL, 'Oktober', 2026, 'SPP03', NULL),
(66, NULL, NULL, 'SIS001', NULL, 'Nopember', 2026, 'SPP03', NULL),
(67, NULL, NULL, 'SIS001', NULL, 'Desember', 2026, 'SPP03', NULL),
(68, NULL, NULL, 'SIS001', NULL, 'Januari', 2027, 'SPP03', NULL),
(69, NULL, NULL, 'SIS001', NULL, 'Februari', 2027, 'SPP03', NULL),
(70, NULL, NULL, 'SIS001', NULL, 'Maret', 2027, 'SPP03', NULL),
(71, NULL, NULL, 'SIS001', NULL, 'April', 2027, 'SPP03', NULL),
(72, NULL, NULL, 'SIS001', NULL, 'Mei', 2027, 'SPP03', NULL),
(73, NULL, NULL, 'SIS001', NULL, 'Juni', 2027, 'SPP03', NULL),
(74, NULL, NULL, 'SIS002', NULL, 'Juli', 2026, 'SPP01', NULL),
(75, NULL, NULL, 'SIS002', NULL, 'Agustus', 2026, 'SPP01', NULL),
(76, NULL, NULL, 'SIS002', NULL, 'September', 2026, 'SPP01', NULL),
(77, NULL, NULL, 'SIS002', NULL, 'Oktober', 2026, 'SPP01', NULL),
(78, NULL, NULL, 'SIS002', NULL, 'Nopember', 2026, 'SPP01', NULL),
(79, NULL, NULL, 'SIS002', NULL, 'Desember', 2026, 'SPP01', NULL),
(80, NULL, NULL, 'SIS002', NULL, 'Januari', 2027, 'SPP01', NULL),
(81, NULL, NULL, 'SIS002', NULL, 'Februari', 2027, 'SPP01', NULL),
(82, NULL, NULL, 'SIS002', NULL, 'Maret', 2027, 'SPP01', NULL),
(83, NULL, NULL, 'SIS002', NULL, 'April', 2027, 'SPP01', NULL),
(84, NULL, NULL, 'SIS002', NULL, 'Mei', 2027, 'SPP01', NULL),
(85, NULL, NULL, 'SIS002', NULL, 'Juni', 2027, 'SPP01', NULL),
(86, NULL, NULL, 'SIS003', NULL, 'Juli', 2026, 'SPP02', NULL),
(87, NULL, NULL, 'SIS003', NULL, 'Agustus', 2026, 'SPP02', NULL),
(88, NULL, NULL, 'SIS003', NULL, 'September', 2026, 'SPP02', NULL),
(89, NULL, NULL, 'SIS003', NULL, 'Oktober', 2026, 'SPP02', NULL),
(90, NULL, NULL, 'SIS003', NULL, 'Nopember', 2026, 'SPP02', NULL),
(91, NULL, NULL, 'SIS003', NULL, 'Desember', 2026, 'SPP02', NULL),
(92, NULL, NULL, 'SIS003', NULL, 'Januari', 2027, 'SPP02', NULL),
(93, NULL, NULL, 'SIS003', NULL, 'Februari', 2027, 'SPP02', NULL),
(94, NULL, NULL, 'SIS003', NULL, 'Maret', 2027, 'SPP02', NULL),
(95, NULL, NULL, 'SIS003', NULL, 'April', 2027, 'SPP02', NULL),
(96, NULL, NULL, 'SIS003', NULL, 'Mei', 2027, 'SPP02', NULL),
(97, NULL, NULL, 'SIS003', NULL, 'Juni', 2027, 'SPP02', NULL),
(98, NULL, NULL, 'SIS004', NULL, 'Juli', 2026, 'SPP03', NULL),
(99, NULL, NULL, 'SIS004', NULL, 'Agustus', 2026, 'SPP03', NULL),
(100, NULL, NULL, 'SIS004', NULL, 'September', 2026, 'SPP03', NULL),
(101, NULL, NULL, 'SIS004', NULL, 'Oktober', 2026, 'SPP03', NULL),
(102, NULL, NULL, 'SIS004', NULL, 'Nopember', 2026, 'SPP03', NULL),
(103, NULL, NULL, 'SIS004', NULL, 'Desember', 2026, 'SPP03', NULL),
(104, NULL, NULL, 'SIS004', NULL, 'Januari', 2027, 'SPP03', NULL),
(105, NULL, NULL, 'SIS004', NULL, 'Februari', 2027, 'SPP03', NULL),
(106, NULL, NULL, 'SIS004', NULL, 'Maret', 2027, 'SPP03', NULL),
(107, NULL, NULL, 'SIS004', NULL, 'April', 2027, 'SPP03', NULL),
(108, NULL, NULL, 'SIS004', NULL, 'Mei', 2027, 'SPP03', NULL),
(109, NULL, NULL, 'SIS004', NULL, 'Juni', 2027, 'SPP03', NULL),
(110, NULL, NULL, 'SIS005', NULL, 'Juli', 2026, 'SPP01', NULL),
(111, NULL, NULL, 'SIS005', NULL, 'Agustus', 2026, 'SPP01', NULL),
(112, NULL, NULL, 'SIS005', NULL, 'September', 2026, 'SPP01', NULL),
(113, NULL, NULL, 'SIS005', NULL, 'Oktober', 2026, 'SPP01', NULL),
(114, NULL, NULL, 'SIS005', NULL, 'Nopember', 2026, 'SPP01', NULL),
(115, NULL, NULL, 'SIS005', NULL, 'Desember', 2026, 'SPP01', NULL),
(116, NULL, NULL, 'SIS005', NULL, 'Januari', 2027, 'SPP01', NULL),
(117, NULL, NULL, 'SIS005', NULL, 'Februari', 2027, 'SPP01', NULL),
(118, NULL, NULL, 'SIS005', NULL, 'Maret', 2027, 'SPP01', NULL),
(119, NULL, NULL, 'SIS005', NULL, 'April', 2027, 'SPP01', NULL),
(120, NULL, NULL, 'SIS005', NULL, 'Mei', 2027, 'SPP01', NULL),
(121, NULL, NULL, 'SIS005', NULL, 'Juni', 2027, 'SPP01', NULL),
(122, '2609040003', 'A1', 'SIS006', '2026-09-04', 'Juli', 2026, 'SPP03', 'LUNAS'),
(123, '2609040004', 'A1', 'SIS006', '2026-09-04', 'Agustus', 2026, 'SPP03', 'LUNAS'),
(124, '2609040005', 'A1', 'SIS006', '2026-09-04', 'September', 2026, 'SPP03', 'LUNAS'),
(125, NULL, NULL, 'SIS006', NULL, 'Oktober', 2026, 'SPP03', NULL),
(126, NULL, NULL, 'SIS006', NULL, 'Nopember', 2026, 'SPP03', NULL),
(127, NULL, NULL, 'SIS006', NULL, 'Desember', 2026, 'SPP03', NULL),
(128, NULL, NULL, 'SIS006', NULL, 'Januari', 2027, 'SPP03', NULL),
(129, NULL, NULL, 'SIS006', NULL, 'Februari', 2027, 'SPP03', NULL),
(130, NULL, NULL, 'SIS006', NULL, 'Maret', 2027, 'SPP03', NULL),
(131, NULL, NULL, 'SIS006', NULL, 'April', 2027, 'SPP03', NULL),
(132, NULL, NULL, 'SIS006', NULL, 'Mei', 2027, 'SPP03', NULL),
(133, NULL, NULL, 'SIS006', NULL, 'Juni', 2027, 'SPP03', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` varchar(5) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama_petugas` varchar(35) NOT NULL,
  `level` enum('admin','petugas','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `username`, `password`, `nama_petugas`, `level`) VALUES
('A1', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Esa', 'admin'),
('P1', 'petugas', '99c9d6b294c4c16280386f5532cba08c', 'Agung', 'petugas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `nisn` varchar(10) NOT NULL,
  `nis` varchar(8) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `id_kelas` varchar(11) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `id_spp` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`nisn`, `nis`, `nama`, `id_kelas`, `alamat`, `no_telp`, `id_spp`) VALUES
('SIS001', 'NIS001', 'Agung', 'K01', 'Banjarbaru', '0812345699', 'SPP03'),
('SIS002', 'NIS002', 'Esa', 'K03', 'Kelapa gading', '0812345678', 'SPP01'),
('SIS003', 'NIS003', 'Bibut', 'K01', 'Bangkal', '08876543333', 'SPP02'),
('SIS004', 'NIS004', 'Yusuf', 'K03', 'Cempaka', '0887654399', 'SPP03'),
('SIS005', 'NIS005', 'Si Alan', 'K01', 'Palam', '0887654333', 'SPP01'),
('SIS006', 'NIS006', 'Royan', 'K02', 'Palam', '0812345678', 'SPP03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `spp`
--

CREATE TABLE `spp` (
  `id_spp` varchar(6) NOT NULL,
  `tahun` int(4) NOT NULL,
  `nominal` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `spp`
--

INSERT INTO `spp` (`id_spp`, `tahun`, `nominal`) VALUES
('SPP01', 2015, 75000),
('SPP02', 2020, 78000),
('SPP03', 2025, 80000);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_petugas` (`id_petugas`),
  ADD KEY `nisn` (`nisn`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nisn`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_spp` (`id_spp`);

--
-- Indeks untuk tabel `spp`
--
ALTER TABLE `spp`
  ADD PRIMARY KEY (`id_spp`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembayaran_ibfk_2` FOREIGN KEY (`nisn`) REFERENCES `siswa` (`nisn`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `siswa_ibfk_2` FOREIGN KEY (`id_spp`) REFERENCES `spp` (`id_spp`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

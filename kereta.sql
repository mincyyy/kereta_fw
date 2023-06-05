-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Nov 2020 pada 11.07
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kereta`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `asal`
--

CREATE TABLE `asal` (
  `id` int(11) NOT NULL,
  `asal` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `asal`
--

INSERT INTO `asal` (`id`, `asal`) VALUES
(1, 'Jakarta'),
(2, 'Bandung'),
(3, 'Semarang'),
(4, 'Solo'),
(5, 'Surabaya'),
(6, 'Malang'),
(7, 'Yogyakarta'),
(9, 'balikpapan');

--
-- Trigger `asal`
--
DELIMITER $$
CREATE TRIGGER `hapus_asal` AFTER DELETE ON `asal` FOR EACH ROW begin
insert into riwayat_hapus_asal values ('',OLD.id, OLD.asal);
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `harga`
--

CREATE TABLE `harga` (
  `id` int(11) NOT NULL,
  `asal_id` int(11) NOT NULL,
  `tujuan_id` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `harga`
--

INSERT INTO `harga` (`id`, `asal_id`, `tujuan_id`, `harga`) VALUES
(1, 1, 1, 14500000),
(2, 1, 2, 23000000),
(3, 1, 3, 18000000),
(4, 1, 4, 23000000),
(5, 1, 5, 21000000),
(6, 1, 6, 20000000),
(7, 2, 2, 23000000),
(8, 2, 3, 18500000),
(9, 2, 4, 22000000),
(10, 2, 5, 18500000),
(11, 2, 6, 17500000),
(12, 3, 1, 18000000),
(13, 3, 2, 18500000),
(14, 3, 4, 17000000),
(15, 3, 5, 14500000),
(16, 3, 6, 17000000),
(17, 4, 1, 18000000),
(18, 4, 2, 18500000),
(19, 4, 3, 14000000),
(20, 4, 4, 17500000),
(21, 4, 6, 14500000),
(22, 5, 1, 22000000),
(23, 5, 2, 15000000),
(24, 5, 3, 17000000),
(25, 5, 5, 17000000),
(26, 5, 6, 18000000),
(27, 6, 1, 22500000),
(28, 6, 3, 18000000),
(29, 6, 4, 14500000),
(30, 6, 5, 17000000),
(31, 6, 6, 18000000),
(32, 7, 1, 17000000),
(33, 7, 2, 18000000),
(34, 7, 3, 17000000),
(35, 7, 4, 18500000),
(36, 7, 5, 14000000);

--
-- Trigger `harga`
--
DELIMITER $$
CREATE TRIGGER `hapus_destinasi` AFTER DELETE ON `harga` FOR EACH ROW begin
insert into riwayat_hapus_destinasi values('',OLD.id, OLD.asal_id, OLD.tujuan_id, OLD.harga);
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_hapus_asal`
--

CREATE TABLE `riwayat_hapus_asal` (
  `no` int(11) NOT NULL,
  `id` int(11) DEFAULT NULL,
  `asal` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `riwayat_hapus_asal`
--

INSERT INTO `riwayat_hapus_asal` (`no`, `id`, `asal`) VALUES
(0, 8, 'samarinda');

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_hapus_destinasi`
--

CREATE TABLE `riwayat_hapus_destinasi` (
  `no` int(11) NOT NULL,
  `id` int(11) DEFAULT NULL,
  `asal_id` int(11) DEFAULT NULL,
  `tujuan_id` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `riwayat_hapus_destinasi`
--

INSERT INTO `riwayat_hapus_destinasi` (`no`, `id`, `asal_id`, `tujuan_id`, `harga`) VALUES
(1, 37, 7, 6, 5000000),
(2, 38, 2, 1, 500000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_hapus_tujuan`
--

CREATE TABLE `riwayat_hapus_tujuan` (
  `no` int(11) NOT NULL,
  `id` int(11) DEFAULT NULL,
  `tujuan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `destinasi_id` int(11) NOT NULL,
  `tanggal_transaksi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tujuan`
--

CREATE TABLE `tujuan` (
  `id` int(11) NOT NULL,
  `tujuan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tujuan`
--

INSERT INTO `tujuan` (`id`, `tujuan`) VALUES
(1, 'Bandung'),
(2, 'Malang'),
(3, 'Semarang'),
(4, 'Surabaya'),
(5, 'Solo'),
(6, 'Yogyakarta');

--
-- Trigger `tujuan`
--
DELIMITER $$
CREATE TRIGGER `hapus_tujuan` AFTER DELETE ON `tujuan` FOR EACH ROW begin
insert into riwayat_hapus_tujuan values ('',OLD.id, OLD.tujuan);
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(9) NOT NULL,
  `tanggal_lahir` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `saldo` int(6) NOT NULL,
  `status` varchar(5) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nama`, `jenis_kelamin`, `tanggal_lahir`, `email`, `saldo`, `status`) VALUES
(1, 'admin', '$2y$10$l4ItBFaUaJaz1xb1pfQPEu0vu228/PAmqiaMWjwpNsPs95Wds1r.O', 'admin', 'perempuan', '2022-06-01', 'aaa@bbb.com', 0, 'admin'),
(2, 'user', '$2y$10$h9OL3VXrdlP6hdjchqXjLOyFPvLlrqLmRMtW5renVWeXNxOa1jEQi', 'user', 'laki-laki', '2020-11-04', 'bbb@ccc.com', 0, 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `asal`
--
ALTER TABLE `asal`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `harga`
--
ALTER TABLE `harga`
  ADD PRIMARY KEY (`id`),
  ADD KEY `asal_id` (`asal_id`),
  ADD KEY `tujuan_id` (`tujuan_id`);

--
-- Indeks untuk tabel `riwayat_hapus_asal`
--
ALTER TABLE `riwayat_hapus_asal`
  ADD PRIMARY KEY (`no`);

--
-- Indeks untuk tabel `riwayat_hapus_destinasi`
--
ALTER TABLE `riwayat_hapus_destinasi`
  ADD PRIMARY KEY (`no`);

--
-- Indeks untuk tabel `riwayat_hapus_tujuan`
--
ALTER TABLE `riwayat_hapus_tujuan`
  ADD PRIMARY KEY (`no`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `destinasi_id` (`destinasi_id`);

--
-- Indeks untuk tabel `tujuan`
--
ALTER TABLE `tujuan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `asal`
--
ALTER TABLE `asal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `harga`
--
ALTER TABLE `harga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `riwayat_hapus_asal`
--
ALTER TABLE `riwayat_hapus_asal`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `riwayat_hapus_destinasi`
--
ALTER TABLE `riwayat_hapus_destinasi`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `riwayat_hapus_tujuan`
--
ALTER TABLE `riwayat_hapus_tujuan`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tujuan`
--
ALTER TABLE `tujuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `harga`
--
ALTER TABLE `harga`
  ADD CONSTRAINT `harga_ibfk_1` FOREIGN KEY (`asal_id`) REFERENCES `asal` (`id`),
  ADD CONSTRAINT `harga_ibfk_2` FOREIGN KEY (`tujuan_id`) REFERENCES `tujuan` (`id`);

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`destinasi_id`) REFERENCES `harga` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

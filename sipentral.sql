-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Apr 2023 pada 17.14
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sipentral`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(255) DEFAULT NULL,
  `harga` bigint(20) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `kategori_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `nama_barang`, `harga`, `stok`, `kategori_id`) VALUES
(1, 'Monitor 24 inc Samsung', 1500000, 1, 1),
(2, 'CD Windows 11', 2100000, 0, 2),
(3, 'CD Windows 10', 1200000, 1, 2),
(4, 'Hardisk SSD 256GB Sony', 850000, 0, 1),
(5, 'Hardisk 1TB Seagate', 1200000, 0, 1),
(6, 'Hardisk Sandisk SSD 258Gb', 850000, 2, 11),
(7, 'Flashdisk 64Gb Robot Putih', 63000, 1, 11);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_barang`
--

CREATE TABLE `kategori_barang` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori_barang`
--

INSERT INTO `kategori_barang` (`id`, `nama_kategori`) VALUES
(10, 'Software'),
(11, 'Hardisk');

-- --------------------------------------------------------

--
-- Struktur dari tabel `layanan`
--

CREATE TABLE `layanan` (
  `id` int(11) NOT NULL,
  `nama_layanan` varchar(100) DEFAULT NULL,
  `biaya` bigint(20) DEFAULT NULL,
  `lama_pengerjaan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `layanan`
--

INSERT INTO `layanan` (`id`, `nama_layanan`, `biaya`, `lama_pengerjaan`) VALUES
(1, 'Upgrade Hardisk jadi SSD', 100000, 1),
(2, 'Ganti Keyboard', 50000, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(11) NOT NULL,
  `nama_pelanggan` varchar(100) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `no_telp` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `nama_pelanggan`, `alamat`, `no_telp`) VALUES
(1, 'Suherman', 'Banjabaru', '087811223344'),
(2, 'Maulana', 'Banjabaru Utara', '087811223355'),
(3, 'Muzzaki', 'Kapuas', '087822263344'),
(4, 'Shelma', 'Anjir', '08781122312'),
(5, 'Suherman', 'adada', '5353');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `login_terakhir` datetime DEFAULT NULL,
  `peran` enum('admin','kasir','teknisi','admin desa','warga') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id`, `username`, `password`, `login_terakhir`, `peran`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '2023-04-14 05:12:54', 'admin'),
(2, 'kasir', 'c7911af3adbd12a035b289556d96470a', '2023-01-23 04:02:44', 'kasir'),
(3, 'teknisi', 'e21394aaeee10f917f581054d24b031f', '2022-07-20 05:35:58', 'teknisi'),
(5, 'udin', '0c5c73885b30865f43e9a1cdd1536b73', '2023-04-06 03:19:33', 'kasir'),
(6, 'ujang', '40d65fe503c1e4096fd4ed86245b8a31', '2023-04-12 05:01:56', 'admin desa'),
(7, 'uman', 'umans', NULL, 'warga'),
(8, 'pikri', '4e414fbb5574a0c92e65a498776143cb', '2023-04-12 05:01:34', 'warga');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id` int(11) NOT NULL,
  `tanggal_penjualan` datetime DEFAULT NULL,
  `pelanggan_id` int(11) DEFAULT NULL,
  `total_penjualan` bigint(20) DEFAULT NULL,
  `pengguna_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`id`, `tanggal_penjualan`, `pelanggan_id`, `total_penjualan`, `pengguna_id`) VALUES
(1, '2022-07-06 00:00:00', 1, 2950000, 1),
(2, '2022-07-06 00:00:00', 3, 2700000, 1),
(3, '2022-07-06 02:12:05', 4, 2950000, 1),
(4, '2022-07-06 10:14:48', 4, 2700000, 1),
(5, '2022-07-06 10:18:56', 2, 850000, 1),
(6, '2022-07-06 10:34:11', 1, 850000, 1),
(7, '2022-07-07 08:03:38', 2, 4200000, 1),
(8, '2022-07-08 07:03:05', 2, 2100000, 1),
(9, '2022-07-08 07:05:47', 2, 2100000, 1),
(10, '2022-07-08 07:16:09', 3, 5100000, 1),
(11, '2022-07-08 07:20:50', 2, 1200000, 1),
(12, '2022-07-08 03:31:47', 4, 1200000, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan_detail`
--

CREATE TABLE `penjualan_detail` (
  `id` int(11) NOT NULL,
  `penjualan_id` int(11) DEFAULT NULL,
  `barang_id` int(11) DEFAULT NULL,
  `harga` bigint(20) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `status` enum('0','1') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penjualan_detail`
--

INSERT INTO `penjualan_detail` (`id`, `penjualan_id`, `barang_id`, `harga`, `qty`, `status`) VALUES
(22, 1, 2, 2100000, 1, '1'),
(25, 1, 4, 850000, 1, '1'),
(26, 2, 1, 1500000, 1, '1'),
(27, 2, 5, 1200000, 1, '1'),
(28, 3, 4, 850000, 1, '1'),
(29, 3, 2, 2100000, 1, '1'),
(30, 4, 1, 1500000, 1, '1'),
(31, 4, 3, 1200000, 1, '1'),
(32, 5, 4, 850000, 1, '1'),
(33, 6, 4, 850000, 1, '1'),
(42, 7, 2, 2100000, 2, '1'),
(45, 8, 2, 2100000, 1, '1'),
(46, 9, 2, 2100000, 1, '1'),
(49, 10, 1, 1500000, 2, '1'),
(50, 10, 2, 2100000, 1, '1'),
(51, 11, 5, 1200000, 1, '1'),
(52, 12, 3, 1200000, 1, '1'),
(53, 13, 1, 1500000, 1, '0'),
(56, 13, 3, 1200000, 1, '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `nama_supplier` varchar(100) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `no_telp` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori_barang`
--
ALTER TABLE `kategori_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penjualan_detail`
--
ALTER TABLE `penjualan_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `kategori_barang`
--
ALTER TABLE `kategori_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `layanan`
--
ALTER TABLE `layanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `penjualan_detail`
--
ALTER TABLE `penjualan_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

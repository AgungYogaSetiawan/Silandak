-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Jun 2023 pada 12.52
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
-- Database: `silandak`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_aduan`
--

CREATE TABLE `tb_aduan` (
  `id_aduan` int(11) NOT NULL,
  `pengirim` varchar(200) NOT NULL,
  `pesan` text NOT NULL,
  `tgl_kejadian` date NOT NULL,
  `lokasi` varchar(200) NOT NULL,
  `lampiran` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_aduan`
--

INSERT INTO `tb_aduan` (`id_aduan`, `pengirim`, `pesan`, `tgl_kejadian`, `lokasi`, `lampiran`) VALUES
(9, 'anonymous', 'kebakaran', '2023-04-18', 'bjm', 'survey.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_akta_lahir`
--

CREATE TABLE `tb_akta_lahir` (
  `id_lahir` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `file_akta_lahir` varchar(255) NOT NULL,
  `file_ket_lahir` varchar(200) NOT NULL,
  `file_buku_nikah` varchar(200) NOT NULL,
  `file_kk` varchar(200) NOT NULL,
  `status_berkas` enum('Baru','Selesai') NOT NULL,
  `tgl` varchar(100) NOT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_akta_lahir`
--

INSERT INTO `tb_akta_lahir` (`id_lahir`, `user_id`, `file_akta_lahir`, `file_ket_lahir`, `file_buku_nikah`, `file_kk`, `status_berkas`, `tgl`, `keterangan`) VALUES
(1, 8, '', 'codedatawithyoga.png', 'Day 3 narasiodata.jpeg', 'codedatawithyoga.png', 'Selesai', '11-May-2023', 'okeeee');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_aspirasi`
--

CREATE TABLE `tb_aspirasi` (
  `id_aspirasi` int(11) NOT NULL,
  `tgl_waktu` varchar(100) NOT NULL,
  `pengirim` varchar(200) NOT NULL,
  `pesan` text NOT NULL,
  `asal_pelapor` varchar(200) NOT NULL,
  `lampiran` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_aspirasi`
--

INSERT INTO `tb_aspirasi` (`id_aspirasi`, `tgl_waktu`, `pengirim`, `pesan`, `asal_pelapor`, `lampiran`) VALUES
(8, '26-Apr-2023', 'm*i*k*a', 'jgj', 'jj', '2021-04-19_162329.jpg'),
(9, '26-Apr-2023', 'm*i*k*a', 'lapor', 'bjm', '2021-APTOS-Big-Data-Competition-Tianchi-competition-Alibabacloud-Tianchi.png'),
(10, '26-Apr-2023', 'm*i*k*a', 'g', 'hj', 'batu.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_bio_wni`
--

CREATE TABLE `tb_bio_wni` (
  `id_bio` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `file_kk` varchar(200) NOT NULL,
  `status_berkas` enum('Baru','Selesai') NOT NULL,
  `tgl` varchar(100) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_bio_wni`
--

INSERT INTO `tb_bio_wni` (`id_bio`, `user_id`, `file_kk`, `status_berkas`, `tgl`, `keterangan`) VALUES
(1, 8, 'Dash.png', 'Selesai', '25-May-2023', 'acc');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_informasi`
--

CREATE TABLE `tb_informasi` (
  `id_informasi` int(11) NOT NULL,
  `tgl` varchar(200) NOT NULL,
  `pengirim` varchar(200) NOT NULL,
  `pesan` text NOT NULL,
  `asal_pelapor` varchar(200) NOT NULL,
  `lampiran` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_informasi`
--

INSERT INTO `tb_informasi` (`id_informasi`, `tgl`, `pengirim`, `pesan`, `asal_pelapor`, `lampiran`) VALUES
(2, '26-Apr-2023', 'm*i*k*a', 'lapor', 'bjm', '2021-APTOS-Big-Data-Competition-Tianchi-competition-Alibabacloud-Tianchi.png'),
(3, '26-Apr-2023', 'm*i*k*a', 'fsfs', 'ggd', '2021-04-19_162329.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kelurahan`
--

CREATE TABLE `tb_kelurahan` (
  `id_kelurahan` int(11) NOT NULL,
  `kelurahan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kematian`
--

CREATE TABLE `tb_kematian` (
  `id_ak` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `file_sk` varchar(200) NOT NULL,
  `file_kk` varchar(200) NOT NULL,
  `status_berkas` enum('Baru','Selesai') NOT NULL,
  `tgl` varchar(100) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kematian`
--

INSERT INTO `tb_kematian` (`id_ak`, `user_id`, `file_sk`, `file_kk`, `status_berkas`, `tgl`, `keterangan`) VALUES
(1, 8, 'Account-Center.png', 'glassfish.jpg', 'Selesai', '23-May-2023', 'acc');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kk`
--

CREATE TABLE `tb_kk` (
  `id_kk` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `file_buku_nikah` varchar(200) NOT NULL,
  `file_ijazah` varchar(255) NOT NULL,
  `file_ktp` varchar(200) NOT NULL,
  `file_kk` varchar(200) NOT NULL,
  `status_berkas` enum('Baru','Selesai') NOT NULL,
  `tgl` varchar(100) NOT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kk`
--

INSERT INTO `tb_kk` (`id_kk`, `user_id`, `file_buku_nikah`, `file_ijazah`, `file_ktp`, `file_kk`, `status_berkas`, `tgl`, `keterangan`) VALUES
(4, 8, 'foto_yoga.png', 'Day 3 narasiodata.jpeg', 'foto_yoga1.jpeg', 'codedatawithyoga.png', 'Selesai', '02-Mei-2023', 'oke');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penduduk`
--

CREATE TABLE `tb_penduduk` (
  `id_penduduk` int(11) NOT NULL,
  `desa` varchar(200) NOT NULL,
  `l_awal` int(11) NOT NULL,
  `p_awal` int(11) NOT NULL,
  `tot_awal` int(11) NOT NULL,
  `jml_kk_awal` int(11) NOT NULL,
  `l_lahir` int(11) NOT NULL,
  `p_lahir` int(11) NOT NULL,
  `tot_lahir` int(11) NOT NULL,
  `l_mati` int(11) NOT NULL,
  `p_mati` int(11) NOT NULL,
  `tot_mati` int(11) NOT NULL,
  `l_datang` int(11) NOT NULL,
  `p_datang` int(11) NOT NULL,
  `tot_datang` int(11) NOT NULL,
  `l_pindah` int(11) NOT NULL,
  `p_pindah` int(11) NOT NULL,
  `tot_pindah` int(11) NOT NULL,
  `l_akhir` int(11) NOT NULL,
  `p_akhir` int(11) NOT NULL,
  `tot_akhir` int(11) NOT NULL,
  `jml_kk_akhir` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_penduduk`
--

INSERT INTO `tb_penduduk` (`id_penduduk`, `desa`, `l_awal`, `p_awal`, `tot_awal`, `jml_kk_awal`, `l_lahir`, `p_lahir`, `tot_lahir`, `l_mati`, `p_mati`, `tot_mati`, `l_datang`, `p_datang`, `tot_datang`, `l_pindah`, `p_pindah`, `tot_pindah`, `l_akhir`, `p_akhir`, `tot_akhir`, `jml_kk_akhir`) VALUES
(1, 'Banua Lawas', 520, 393, 913, 4, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 5, 5, 5, 5, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pesan`
--

CREATE TABLE `tb_pesan` (
  `id_pesan` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `no_hp` varchar(50) NOT NULL,
  `pesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pesan`
--

INSERT INTO `tb_pesan` (`id_pesan`, `username`, `no_hp`, `pesan`) VALUES
(1, 'mika', '2147483647', 'ganti password'),
(2, 'udin', '2147483647', 'ganti password'),
(3, 'sintia', '086945635696', 'ganti password'),
(4, 'dita', '0869625638', 'ganti password'),
(5, 'dita', '0869625638', 'ganti password');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pindah_datang`
--

CREATE TABLE `tb_pindah_datang` (
  `id_pd` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `file_kp` varchar(200) NOT NULL,
  `file_ktp` varchar(200) NOT NULL,
  `status_berkas` enum('Baru','Selesai') NOT NULL,
  `tgl` varchar(100) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pindah_datang`
--

INSERT INTO `tb_pindah_datang` (`id_pd`, `user_id`, `file_kp`, `file_ktp`, `status_berkas`, `tgl`, `keterangan`) VALUES
(1, 8, 'sertifikat vaksin 1.jpeg', 'KTP.jpeg', 'Selesai', '24-May-2023', 'oke acc');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rekam_ktp`
--

CREATE TABLE `tb_rekam_ktp` (
  `id_ktp` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `file_kk` varchar(200) NOT NULL,
  `status_berkas` enum('Baru','Selesai') NOT NULL,
  `tgl` varchar(100) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_rekam_ktp`
--

INSERT INTO `tb_rekam_ktp` (`id_ktp`, `user_id`, `file_kk`, `status_berkas`, `tgl`, `keterangan`) VALUES
(1, 8, 'Account-Center.png', 'Selesai', '25-May-2023', 'accccc'),
(2, 9, 'glassfish2.jpg', 'Selesai', '25-May-2023', 'acc'),
(3, 8, 'glassfish2.jpg', 'Baru', '30-May-2023', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_surat_pindah`
--

CREATE TABLE `tb_surat_pindah` (
  `id_sp` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `file_kp` varchar(200) NOT NULL,
  `file_kk` varchar(200) NOT NULL,
  `file_ktp` varchar(200) NOT NULL,
  `status_berkas` enum('Baru','Selesai') NOT NULL,
  `tgl` varchar(50) NOT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_surat_pindah`
--

INSERT INTO `tb_surat_pindah` (`id_sp`, `user_id`, `file_kp`, `file_kk`, `file_ktp`, `status_berkas`, `tgl`, `keterangan`) VALUES
(1, 8, 'glassfish.jpg', 'glassfish2.jpg', 'Account-Center.png', 'Selesai', '18-May-2023', 'berkas betul');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` enum('admin kecamatan','admin desa','warga') NOT NULL,
  `kewarganegaraan` varchar(100) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `nik` varchar(20) DEFAULT NULL,
  `no_hp` varchar(30) DEFAULT NULL,
  `pekerjaan` varchar(200) DEFAULT NULL,
  `tmpt_lahir` varchar(200) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jk` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `status` enum('Belum Menikah','Sudah Menikah') DEFAULT NULL,
  `agama` varchar(50) DEFAULT NULL,
  `kelurahan` varchar(200) DEFAULT NULL,
  `kecamatan` varchar(100) DEFAULT NULL,
  `rt` varchar(50) DEFAULT NULL,
  `rw` varchar(50) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `kode_pos` int(11) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `level`, `kewarganegaraan`, `nama`, `nik`, `no_hp`, `pekerjaan`, `tmpt_lahir`, `tgl_lahir`, `jk`, `status`, `agama`, `kelurahan`, `kecamatan`, `rt`, `rw`, `alamat`, `kode_pos`, `foto`) VALUES
(7, 'admin', '$2y$10$2aP.Kuoe2HybiBxtmvFmSeYxfJmCG/EKgD0S1WiiwFDmwWob9dNWa', 'admin kecamatan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'dita', '$2y$10$tbsGKUgz2dvuwFX1HdQwrOrCP4nRu5lApCaGBPxDIzson6KU/Zuci', 'warga', 'Indonesia', 'Dita', '1234567891234567', '086945635696', 'Mahasiswa', 'Banjarmasin', '2023-05-02', 'Perempuan', 'Belum Menikah', 'Islam', 'Kelayan Tengah', 'Banua Lawas', '12', '2', 'jln hksn', 70123, 'nomask1.jpg'),
(9, 'udin', '$2y$10$yEfCVr.aGFuFxpCt/9ubsOdyxDpglxDent3x51oNaU1jMwHdFoQQ6', 'admin desa', 'Indonesia', 'Udin', '655675675677577', '089759535536', 'Buruh', 'Tanjung', '1996-06-20', 'Laki-laki', 'Sudah Menikah', 'Islam', 'Kelayan Tengah', 'Banua Lawas', '2', '4', 'jln hksnnn', 70123, 'mask1.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_aduan`
--
ALTER TABLE `tb_aduan`
  ADD PRIMARY KEY (`id_aduan`);

--
-- Indeks untuk tabel `tb_akta_lahir`
--
ALTER TABLE `tb_akta_lahir`
  ADD PRIMARY KEY (`id_lahir`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `tb_aspirasi`
--
ALTER TABLE `tb_aspirasi`
  ADD PRIMARY KEY (`id_aspirasi`);

--
-- Indeks untuk tabel `tb_bio_wni`
--
ALTER TABLE `tb_bio_wni`
  ADD PRIMARY KEY (`id_bio`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `tb_informasi`
--
ALTER TABLE `tb_informasi`
  ADD PRIMARY KEY (`id_informasi`);

--
-- Indeks untuk tabel `tb_kelurahan`
--
ALTER TABLE `tb_kelurahan`
  ADD PRIMARY KEY (`id_kelurahan`);

--
-- Indeks untuk tabel `tb_kematian`
--
ALTER TABLE `tb_kematian`
  ADD PRIMARY KEY (`id_ak`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `tb_kk`
--
ALTER TABLE `tb_kk`
  ADD PRIMARY KEY (`id_kk`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `tb_penduduk`
--
ALTER TABLE `tb_penduduk`
  ADD PRIMARY KEY (`id_penduduk`);

--
-- Indeks untuk tabel `tb_pesan`
--
ALTER TABLE `tb_pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indeks untuk tabel `tb_pindah_datang`
--
ALTER TABLE `tb_pindah_datang`
  ADD PRIMARY KEY (`id_pd`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `tb_rekam_ktp`
--
ALTER TABLE `tb_rekam_ktp`
  ADD PRIMARY KEY (`id_ktp`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `tb_surat_pindah`
--
ALTER TABLE `tb_surat_pindah`
  ADD PRIMARY KEY (`id_sp`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_aduan`
--
ALTER TABLE `tb_aduan`
  MODIFY `id_aduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tb_akta_lahir`
--
ALTER TABLE `tb_akta_lahir`
  MODIFY `id_lahir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_aspirasi`
--
ALTER TABLE `tb_aspirasi`
  MODIFY `id_aspirasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_bio_wni`
--
ALTER TABLE `tb_bio_wni`
  MODIFY `id_bio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_informasi`
--
ALTER TABLE `tb_informasi`
  MODIFY `id_informasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_kelurahan`
--
ALTER TABLE `tb_kelurahan`
  MODIFY `id_kelurahan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_kematian`
--
ALTER TABLE `tb_kematian`
  MODIFY `id_ak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_kk`
--
ALTER TABLE `tb_kk`
  MODIFY `id_kk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_penduduk`
--
ALTER TABLE `tb_penduduk`
  MODIFY `id_penduduk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `tb_pesan`
--
ALTER TABLE `tb_pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_pindah_datang`
--
ALTER TABLE `tb_pindah_datang`
  MODIFY `id_pd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_rekam_ktp`
--
ALTER TABLE `tb_rekam_ktp`
  MODIFY `id_ktp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_surat_pindah`
--
ALTER TABLE `tb_surat_pindah`
  MODIFY `id_sp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_akta_lahir`
--
ALTER TABLE `tb_akta_lahir`
  ADD CONSTRAINT `tb_akta_lahir_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_bio_wni`
--
ALTER TABLE `tb_bio_wni`
  ADD CONSTRAINT `tb_bio_wni_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_kematian`
--
ALTER TABLE `tb_kematian`
  ADD CONSTRAINT `tb_kematian_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_kk`
--
ALTER TABLE `tb_kk`
  ADD CONSTRAINT `tb_kk_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_pindah_datang`
--
ALTER TABLE `tb_pindah_datang`
  ADD CONSTRAINT `tb_pindah_datang_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_rekam_ktp`
--
ALTER TABLE `tb_rekam_ktp`
  ADD CONSTRAINT `tb_rekam_ktp_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_surat_pindah`
--
ALTER TABLE `tb_surat_pindah`
  ADD CONSTRAINT `tb_surat_pindah_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

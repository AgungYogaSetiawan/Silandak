-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Okt 2023 pada 16.40
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
  `keterangan` text DEFAULT NULL,
  `file_pemohon` varchar(200) NOT NULL,
  `slug_ak` varchar(255) NOT NULL,
  `slug_sk` varchar(255) NOT NULL,
  `slug_bk` varchar(255) NOT NULL,
  `slug_kk` varchar(255) NOT NULL,
  `slug_file` varchar(255) NOT NULL,
  `nmr_urut` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_akta_lahir`
--

INSERT INTO `tb_akta_lahir` (`id_lahir`, `user_id`, `file_akta_lahir`, `file_ket_lahir`, `file_buku_nikah`, `file_kk`, `status_berkas`, `tgl`, `keterangan`, `file_pemohon`, `slug_ak`, `slug_sk`, `slug_bk`, `slug_kk`, `slug_file`, `nmr_urut`) VALUES
(1, 8, '', 'codedatawithyoga.png', 'Day 3 narasiodata.jpeg', 'codedatawithyoga.png', 'Selesai', '11-May-2023', 'okeeee', 'CamScanner 12-25-2022 19.00.pdf', '', '', '', '', '', ''),
(2, 8, '230922023813.png', 'Account-Center.png', 'Account-Center.png', 'Account-Center.png', 'Baru', '19-Sep-2023', NULL, '', '', '', '', '', '', ''),
(3, 8, '231010021013.png', '231010021013.png', '231010021013.png', '231010021013.png', 'Baru', '10-Oct-2023', NULL, '', 'Account-Center.png', 'Account-Center.png', 'Account-Center.png', 'Account-Center.png', '', 'AL00001'),
(4, 8, '231010021122.jpeg', '231010021122.jpeg', '231010021122.jpeg', '231010021122.jpeg', 'Baru', '10-Oct-2023', NULL, '', 'background sidang.jpeg', 'background sidang.jpeg', 'background sidang.jpeg', 'background sidang.jpeg', '', 'AL00001'),
(5, 8, '231010021336.png', '231010021336.png', '231010021336.png', '231010021336.png', 'Baru', '10-Oct-2023', NULL, '', 'Account-Center.png', 'Account-Center.png', 'Account-Center.png', 'Account-Center.png', '', 'AL00001'),
(6, 8, '231010021934.jpeg', '231010021934.jpeg', '231010021934.jpeg', '231010021934.jpeg', 'Baru', '10-Oct-2023', NULL, '', 'background sidang.jpeg', 'background sidang.jpeg', 'background sidang.jpeg', 'background sidang.jpeg', '', 'AL00001'),
(8, 8, '231011073649d46b4132d182b4aaaeb8d3b06faf138c.png', '231011073649d20687fe6cfdf367b8fbc5f1fe940e22.jpeg', '231011073649c4b740a09443d11e6bdf91744951bb0c.jpg', '23101107364914f669568c4a602036f2f2f135f9fd69.jpeg', 'Baru', '11-Oct-2023', NULL, '', 'Account-Center.png', 'batu.jpeg', '2021-04-19_162329.jpg', 'background sidang.jpeg', '', 'AK00007');

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
(10, '26-Apr-2023', 'm*i*k*a', 'g', 'hj', 'batu.jpeg'),
(11, '26-Aug-2023', 'anonymous', 'rrr', 'rrrr', 'Account-Center.png'),
(12, '02-Sep-2023', '', 'er', 'bjm', 'Account-Center.png'),
(13, '02-Sep-2023', 'a*a*a*a*a', 'er', 'bjm', 'Account-Center.png'),
(14, '02-Sep-2023', 'anonymous', 'sd', 'fsdf', 'Account-Center.png'),
(15, '02-Sep-2023', '', 'dsd', 'dsd', 'Account-Center.png'),
(16, '02-Sep-2023', 'anonymous', 'dad', 'de', 'Account-Center.png');

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
  `keterangan` text NOT NULL,
  `file_pemohon` varchar(200) NOT NULL,
  `slug_kk` varchar(255) NOT NULL,
  `slug_file` varchar(255) NOT NULL,
  `nmr_urut` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_bio_wni`
--

INSERT INTO `tb_bio_wni` (`id_bio`, `user_id`, `file_kk`, `status_berkas`, `tgl`, `keterangan`, `file_pemohon`, `slug_kk`, `slug_file`, `nmr_urut`) VALUES
(1, 8, 'Account-Center.png', 'Selesai', '25-May-2023', 'acc', '', '', '', '');

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
  `keterangan` text NOT NULL,
  `file_pemohon` varchar(200) NOT NULL,
  `slug_sk` varchar(255) NOT NULL,
  `slug_kk` varchar(255) NOT NULL,
  `slug_file` varchar(255) NOT NULL,
  `nmr_urut` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kematian`
--

INSERT INTO `tb_kematian` (`id_ak`, `user_id`, `file_sk`, `file_kk`, `status_berkas`, `tgl`, `keterangan`, `file_pemohon`, `slug_sk`, `slug_kk`, `slug_file`, `nmr_urut`) VALUES
(1, 8, 'Account-Center.png', 'glassfish.jpg', 'Selesai', '23-May-2023', 'acc', '', '', '', '', '');

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
  `keterangan` text DEFAULT NULL,
  `file_pemohon` varchar(200) NOT NULL,
  `slug_bk` varchar(255) NOT NULL,
  `slug_ktp` varchar(255) NOT NULL,
  `slug_ijazah` varchar(255) NOT NULL,
  `slug_kk` varchar(255) NOT NULL,
  `slug_file` varchar(255) NOT NULL,
  `nmr_urut` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kk`
--

INSERT INTO `tb_kk` (`id_kk`, `user_id`, `file_buku_nikah`, `file_ijazah`, `file_ktp`, `file_kk`, `status_berkas`, `tgl`, `keterangan`, `file_pemohon`, `slug_bk`, `slug_ktp`, `slug_ijazah`, `slug_kk`, `slug_file`, `nmr_urut`) VALUES
(7, 8, '2021-04-19_162329.jpg', 'Account-Center.png', 'Account-Center.png', 'Account-Center.png', 'Baru', '02-Sep-2023', NULL, '', '', '', '', '', '', ''),
(8, 8, 'background sidang.jpeg', 'background sidang.jpeg', 'background sidang.jpeg', 'background sidang.jpeg', 'Selesai', '02-Sep-2023', 'oke', 'AkselResume-CV DITA.pdf', '', '', '', '', '', ''),
(9, 8, 'Blush-big.png', 'Blush-big.png', 'Blush-big.png', 'Blush-big.png', 'Selesai', '10-Sep-2023', 'done', 'cv dita.pdf', '', '', '', '', '', ''),
(12, 17, '231003074601.jpeg', '231003074601.jpeg', '231003074601.jpeg', '231003074601.jpeg', 'Selesai', '03-Oct-2023', 'oke', '231003021226.jpeg', 'background sidang.jpeg', 'background sidang.jpeg', 'background sidang.jpeg', 'background sidang.jpeg', 'background sidang.jpeg', ''),
(16, 8, '231010104112.png', '231010104112.png', '231010104112.jpeg', '231010104112.jpeg', 'Baru', '10-Oct-2023', NULL, '', 'Account-Center.png', 'batu.jpeg', 'berkas2a.png', 'background sidang.jpeg', '', 'KK00013'),
(17, 8, '231010104907fb93074443b72022d12407b11f640c7a.jpg', '231010104907fb93074443b72022d12407b11f640c7a.jpeg', '231010104907fb93074443b72022d12407b11f640c7a.png', '231010104907fb93074443b72022d12407b11f640c7a.jpeg', 'Baru', '10-Oct-2023', NULL, '', '2021-04-19_162329.jpg', 'Account-Center.png', 'background sidang.jpeg', 'batu.jpeg', '', 'KK00017'),
(20, 8, '231012043606b5cdc5280a0360b3a960adb71476d1b9.png', '231012043606f9ec83580f9831745ba87a66b9db7b59.jpeg', '23101204360640c1278881dbabd420f7ae6dbc497491.jpg', '23101204435233bc624946f90b82e0ef097d45d7444c.png', 'Baru', '12-Oct-2023', NULL, '', '', '', '', 'berkas2a.png', '', 'KK00018');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penduduk`
--

CREATE TABLE `tb_penduduk` (
  `id_penduduk` int(11) NOT NULL,
  `desa` varchar(200) NOT NULL,
  `bulan` varchar(50) NOT NULL,
  `tahun` int(11) NOT NULL,
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

INSERT INTO `tb_penduduk` (`id_penduduk`, `desa`, `bulan`, `tahun`, `l_awal`, `p_awal`, `tot_awal`, `jml_kk_awal`, `l_lahir`, `p_lahir`, `tot_lahir`, `l_mati`, `p_mati`, `tot_mati`, `l_datang`, `p_datang`, `tot_datang`, `l_pindah`, `p_pindah`, `tot_pindah`, `l_akhir`, `p_akhir`, `tot_akhir`, `jml_kk_akhir`) VALUES
(1, 'Banua Lawas', 'Oktober', 2023, 2012, 1876, 3888, 21, 20, 41, 43, 4, 4, 141, 41, 414, 41, 6, 63, 44, 42, 5, 41, 424),
(18, 'Bangkiling', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(19, 'Bangkiling Raya', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(20, 'Banua Rantau', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(21, 'Batang Banyu', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(22, 'Bungin', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(23, 'Habau', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(24, 'Habau Hulu', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(25, 'Hariang', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(26, 'Hapalah', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(27, 'Pematang', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(28, 'Purai', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(29, 'Sei Anyar', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(30, 'Sei Durian', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(31, 'Talan', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(33, 'Sei Anyar', 'Oktober', 2023, 42, 42, 84, 44, 424, 43, 467, 5, 1, 6, 3, 3, 6, 1, 3, 4, 3, 3, 6, 33);

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
  `keterangan` text NOT NULL,
  `file_pemohon` varchar(200) NOT NULL,
  `slug_kp` varchar(255) NOT NULL,
  `slug_ktp` varchar(255) NOT NULL,
  `slug_file` varchar(255) NOT NULL,
  `nmr_urut` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pindah_datang`
--

INSERT INTO `tb_pindah_datang` (`id_pd`, `user_id`, `file_kp`, `file_ktp`, `status_berkas`, `tgl`, `keterangan`, `file_pemohon`, `slug_kp`, `slug_ktp`, `slug_file`, `nmr_urut`) VALUES
(1, 8, 'sertifikat vaksin 1.jpeg', 'KTP.jpeg', 'Selesai', '24-May-2023', 'oke acc', '', '', '', '', '');

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
  `keterangan` text NOT NULL,
  `file_pemohon` varchar(200) NOT NULL,
  `slug_kk` varchar(255) NOT NULL,
  `slug_file` varchar(255) NOT NULL,
  `nmr_urut` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_rekam_ktp`
--

INSERT INTO `tb_rekam_ktp` (`id_ktp`, `user_id`, `file_kk`, `status_berkas`, `tgl`, `keterangan`, `file_pemohon`, `slug_kk`, `slug_file`, `nmr_urut`) VALUES
(1, 8, 'Account-Center.png', 'Selesai', '25-May-2023', 'accccc', '', '', '', ''),
(2, 9, 'glassfish2.jpg', 'Selesai', '25-May-2023', 'acc', '', '', '', ''),
(3, 8, '230922041525.pdf', 'Baru', '30-May-2023', '', '', '', '', ''),
(4, 8, 'Blush-big.png', 'Baru', '02-Sep-2023', '', '', '', '', ''),
(5, 8, '230921041821.jpeg', 'Baru', '10-Sep-2023', '', '', '', '', ''),
(8, 8, '230915105744.png', 'Baru', '15-Sep-2023', '', '', '', '', ''),
(9, 8, '231010022721.png', 'Baru', '10-Oct-2023', '', '', 'berkas2a.png', '', 'AL00001'),
(10, 8, '231010022805.jpg', 'Baru', '10-Oct-2023', '', '', '2021-04-19_162329.jpg', '', 'KTP00001'),
(11, 8, '231010022852.jpg', 'Baru', '10-Oct-2023', '', '', 'corn5.jpg', '', 'KTP00001'),
(16, 8, '231010075648.jpeg', 'Baru', '10-Oct-2023', '', '', 'batu.jpeg', '', 'RKTP00012'),
(17, 8, '23101110110821feb4793c16092ad39114577e4f2aef.', 'Baru', '11-Oct-2023', '', '', '', '', 'RKTP00017'),
(18, 8, '231012074001b1720c85e044bef29d43e8c8d81050e3.jpg', 'Baru', '12-Oct-2023', '', '', 'TES.jpg', '', 'RKTP00018'),
(20, 8, '2310120141268c8081e050d6f07190be6522668074a7.jpg', 'Baru', '12-Oct-2023', '', '', 'corn1.jpg', '', 'RKTP00019'),
(21, 8, '231012034730fe28ff122c62d202c1914c9fdac61521.jpeg', 'Baru', '12-Oct-2023', '', '', 'background sidang.jpeg', '', 'RKTP00021');

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
  `keterangan` text DEFAULT NULL,
  `file_pemohon` varchar(200) NOT NULL,
  `slug_sk` varchar(255) NOT NULL,
  `slug_kk` varchar(255) NOT NULL,
  `slug_ktp` varchar(255) NOT NULL,
  `slug_file` varchar(255) NOT NULL,
  `nmr_urut` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_surat_pindah`
--

INSERT INTO `tb_surat_pindah` (`id_sp`, `user_id`, `file_kp`, `file_kk`, `file_ktp`, `status_berkas`, `tgl`, `keterangan`, `file_pemohon`, `slug_sk`, `slug_kk`, `slug_ktp`, `slug_file`, `nmr_urut`) VALUES
(1, 8, 'glassfish.jpg', 'glassfish2.jpg', 'Account-Center.png', 'Selesai', '18-May-2023', 'berkas betul', '16453-32356-1-SM.pdf', '', '', '', '', ''),
(2, 8, '231011082915b64a23d7fffe5d2f583343304bab724e.jpg', '231011082915d146835f8c1a39e6ab0ec386b2cb58f0.png', '23101108291582e43e24c98d02dc60425d3204ab53e4.png', 'Baru', '11-Oct-2023', NULL, '', '2021-04-19_162329.jpg', '2021-APTOS-Big-Data-Competition-Tianchi-competition-Alibabacloud-Tianchi.png', 'Account-Center.png', '', 'SP00002');

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
  `foto` varchar(255) DEFAULT NULL,
  `slug_foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `level`, `kewarganegaraan`, `nama`, `nik`, `no_hp`, `pekerjaan`, `tmpt_lahir`, `tgl_lahir`, `jk`, `status`, `agama`, `kelurahan`, `kecamatan`, `rt`, `rw`, `alamat`, `kode_pos`, `foto`, `slug_foto`) VALUES
(7, 'admin', '$2y$10$xNHxhzPriq/HRA3h2MtfGO.OCtLoS1hp1CL/ZVmrlnSrhfIburKYi', 'admin kecamatan', '', '', '', '', '', '', '0000-00-00', '', 'Belum Menikah', '', 'Banua Lawas', 'Banua Lawas', '', '', '', 0, '', ''),
(8, 'dita', '$2y$10$qXuLQCMjwCOlbLYuT6YMROncUaooyL1W5MJ.XD16AZxEDkY5aCAtW', 'warga', 'Indonesia', 'Dita', '123456789123456', '086945635696', 'Mahasiswa', 'Banjarmasin', '2023-05-02', 'Perempuan', 'Belum Menikah', 'Islam', 'Bungin', 'Banua Lawas', '12', '2', 'jln hksn', 70123, '230922013942.jpg', 'nomask2.jpg'),
(9, 'udin', '$2y$10$yEfCVr.aGFuFxpCt/9ubsOdyxDpglxDent3x51oNaU1jMwHdFoQQ6', 'admin desa', 'Indonesia', 'Udin', '655675675677577', '089759535536', 'Buruh', 'Tanjung', '1996-06-20', 'Laki-laki', 'Sudah Menikah', 'Islam', 'Banua Lawas', 'Banua Lawas', '2', '4', 'jln hksnnn', 70123, 'mask1.jpg', ''),
(14, 'sdasd', '$2y$10$cUk4wZehz2tZvx32bRtNqO/PjEac1U5fyH9J5o0EJNZFTk9CutRDK', 'admin desa', 'faf', 'ffa', '4242', '2334', 'fsfa', 'faf', '2023-08-12', 'Laki-laki', 'Belum Menikah', 'ada', 'Bangkiling', 'Banua Lawas', '34', '3', 'fsf', 2523, 'Blush-big.png', ''),
(17, 'test', '$2y$10$9xA2XHyzlE/CYwveTmivJ.wUMjKNLoGGgAsbDk8Qa46a0L1NWlVcW', 'admin kecamatan', 'Indonesia', 'Arif', '882147483647', '08123', 'Mahasiswa', 'Banjarmasin', '2023-10-24', 'Laki-laki', 'Belum Menikah', 'Islam', 'Purai', 'Banua Lawas', '12', '3', 'Jl. A. Yani Km. 10', 70121, '231003014305.jpg', 'mask1.jpg');

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
  MODIFY `id_lahir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_aspirasi`
--
ALTER TABLE `tb_aspirasi`
  MODIFY `id_aspirasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `tb_bio_wni`
--
ALTER TABLE `tb_bio_wni`
  MODIFY `id_bio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id_ak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_kk`
--
ALTER TABLE `tb_kk`
  MODIFY `id_kk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `tb_penduduk`
--
ALTER TABLE `tb_penduduk`
  MODIFY `id_penduduk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `tb_pesan`
--
ALTER TABLE `tb_pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_pindah_datang`
--
ALTER TABLE `tb_pindah_datang`
  MODIFY `id_pd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_rekam_ktp`
--
ALTER TABLE `tb_rekam_ktp`
  MODIFY `id_ktp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `tb_surat_pindah`
--
ALTER TABLE `tb_surat_pindah`
  MODIFY `id_sp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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

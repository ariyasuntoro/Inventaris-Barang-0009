-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Nov 2023 pada 07.47
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_inventarisasi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `id_barang` int(11) NOT NULL,
  `kode_barang` varchar(5) DEFAULT NULL,
  `nama_barang` varchar(50) DEFAULT NULL,
  `merk` varchar(50) DEFAULT NULL,
  `id_kategori` int(2) DEFAULT NULL,
  `id_satuan` int(2) DEFAULT NULL,
  `harga_barang` int(11) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_barang`
--

INSERT INTO `tbl_barang` (`id_barang`, `kode_barang`, `nama_barang`, `merk`, `id_kategori`, `id_satuan`, `harga_barang`, `stok`) VALUES
(13, '11111', 'Thermo gun', 'Thermo', 4, 6, 13000000, 1),
(14, '22222', 'Jenset', 'Diesel', 4, 6, 4900000, 1),
(15, '33333', 'Tenda', 'Eger', 9, 4, 900000, 2),
(16, '44444', 'Orjen', 'Yamaha', 4, 6, 8500000, 0),
(17, '55555', 'Laptop', 'Axioo', 4, 6, 3700000, 2),
(20, '66666', 'Laptop', 'ZyrexChromebookM432-2', 4, 6, 5520000, 15),
(21, '77777', 'Proyektor', 'Thosiba', 4, 6, 4450000, 1),
(22, '88888', 'Router', 'Prolink RRN3006L', 4, 6, 940000, 1),
(23, '99999', 'Connector', 'Zyrex Connector UHD', 4, 6, 140000, 1),
(24, '12222', 'Net Takrow', 'Mikasa', 9, 4, 231700, 1),
(25, '12333', 'Bola Takrow', 'Mikasa', 9, 4, 451500, 5),
(26, '12444', 'Bola Basket', 'Mikasa', 9, 4, 481800, 2),
(27, '12555', 'Bola Kaki', 'Specs', 9, 4, 519600, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_barang_keluar`
--

CREATE TABLE `tbl_barang_keluar` (
  `id_barang_keluar` int(11) NOT NULL,
  `no_peminjam` varchar(15) DEFAULT NULL,
  `nama_user` varchar(25) DEFAULT NULL,
  `kode_barang` varchar(5) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `merk` varchar(50) DEFAULT NULL,
  `tgl_pinjam` date DEFAULT NULL,
  `tgl_kembali` date DEFAULT NULL,
  `jam_kembali` time DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `keterangan` int(1) DEFAULT NULL,
  `komentar` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_barang_keluar`
--

INSERT INTO `tbl_barang_keluar` (`id_barang_keluar`, `no_peminjam`, `nama_user`, `kode_barang`, `nama`, `merk`, `tgl_pinjam`, `tgl_kembali`, `jam_kembali`, `qty`, `status`, `keterangan`, `komentar`) VALUES
(75, '202311100002', 'Tika', '55555', 'Laptop', 'Axioo', '2023-11-10', '2023-11-10', '10:45:43', 1, 1, 3, ''),
(86, '20231115001', 'Tika', '11111', 'Thermo gun', 'Thermo', '2023-11-15', '2023-11-16', '11:00:00', 1, 2, 2, 'Barang rusak'),
(88, '20231120001', 'Tika', '33333', 'Tenda', 'Eger', '2023-11-20', '2023-11-22', '15:00:00', 1, 1, 1, '');

--
-- Trigger `tbl_barang_keluar`
--
DELIMITER $$
CREATE TRIGGER `t_rinci` AFTER INSERT ON `tbl_barang_keluar` FOR EACH ROW BEGIN
	UPDATE tbl_barang SET stok = stok - NEW.qty
    WHERE kode_barang = NEW.kode_barang;
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_barang_masuk`
--

CREATE TABLE `tbl_barang_masuk` (
  `id_barang_masuk` int(11) NOT NULL,
  `tgl_diterima` date DEFAULT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  `kondisi` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_barang_masuk`
--

INSERT INTO `tbl_barang_masuk` (`id_barang_masuk`, `tgl_diterima`, `id_barang`, `jumlah`, `keterangan`, `kondisi`) VALUES
(2, '2020-03-05', 13, 2, 'Diterima', 'Baru'),
(3, '2020-04-10', 14, 1, 'Diterima', 'Baru'),
(4, '2020-09-07', 15, 4, 'Diterima', 'Baru'),
(5, '2020-09-07', 16, 1, 'Diterima', 'Baru'),
(6, '2021-08-30', 17, 4, 'Diterima', 'Baru'),
(7, '2021-09-27', 20, 15, 'Diterima', 'Baru'),
(8, '2021-09-27', 21, 1, 'Diterima', 'Baru'),
(9, '2021-09-27', 22, 1, 'Diterima', 'Baru'),
(10, '2021-09-27', 23, 1, 'Diterima', 'Baru'),
(11, '2021-11-18', 24, 1, 'Diterima', 'Baru'),
(12, '2021-11-18', 25, 5, 'Diterima', 'Baru'),
(13, '2021-11-18', 26, 2, 'Diterima', 'Baru'),
(14, '2021-11-18', 27, 2, 'Diterima', 'Baru');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(2) NOT NULL,
  `nama_kategori` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `nama_kategori`) VALUES
(4, 'elektronik'),
(5, 'alat tulis kantor'),
(6, 'Accesoris'),
(9, 'Perlengkapan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pinjam`
--

CREATE TABLE `tbl_pinjam` (
  `id_pinjam` int(11) NOT NULL,
  `no_peminjam` varchar(15) DEFAULT NULL,
  `nama_user` varchar(25) DEFAULT NULL,
  `tgl_pinjam` date DEFAULT NULL,
  `jam` time DEFAULT NULL,
  `id_user` int(2) DEFAULT NULL,
  `catatan` text DEFAULT NULL,
  `tgl_kembali` date DEFAULT NULL,
  `jam_kembali` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_pinjam`
--

INSERT INTO `tbl_pinjam` (`id_pinjam`, `no_peminjam`, `nama_user`, `tgl_pinjam`, `jam`, `id_user`, `catatan`, `tgl_kembali`, `jam_kembali`) VALUES
(50, '20231107001', 'Desta steh', '2023-11-07', '18:31:18', 1, 'Untuk presentasi di kelas 8A', NULL, NULL),
(51, '20231109001', 'Tika', '2023-11-09', '08:47:19', 13, 'Untuk kebutuhan perkemahan', NULL, NULL),
(52, '202311099002', 'Tika', '2023-11-09', '11:13:59', 13, 'untuk kebutuhan ', NULL, NULL),
(53, '20231110001', 'Tika', '2023-11-10', '10:45:01', 13, 'untuk presentasi kelas 9A', '2023-11-10', '10:45:01'),
(54, '202311100002', 'Tika', '2023-11-10', '10:45:43', 13, 'untuk presentasi ', '2023-11-10', '10:45:43'),
(55, '202311100003', 'Desta steh', '2023-11-10', '10:59:30', 1, 'kebutuhan', '2023-11-10', '10:59:30'),
(56, '202311100004', 'Desta steh', '2023-11-10', '11:03:27', 1, '', '2023-11-10', '11:03:27'),
(57, '202311100005', 'Desta steh', '2023-11-10', '11:23:33', 1, '', '2023-11-10', '11:23:33'),
(58, '202311100006', 'Desta steh', '2023-11-10', '18:19:32', 1, 'Untuk Praktek Seni Kelas 7A', '2023-11-11', '19:20:00'),
(59, '20231111001', 'Desta steh', '2023-11-11', '09:57:54', 1, '', '0000-00-00', '00:00:00'),
(60, '202311111002', 'Desta steh', '2023-11-11', '10:02:29', 1, 'Untuk Cek Suhu', '2023-11-12', '11:00:00'),
(61, '202311111003', 'Desta steh', '2023-11-11', '10:03:53', 1, 'Untuk Cek Suhu', '2023-11-12', '11:00:00'),
(62, '202311111004', 'Desta steh', '2023-11-11', '10:11:59', 1, 'untuk', '2023-11-12', '10:00:00'),
(63, '202311111005', 'Desta steh', '2023-11-11', '10:29:41', 1, 'kebutuhan', '2023-11-12', '11:00:00'),
(64, '202311111006', 'Desta steh', '2023-11-11', '10:51:09', 1, 'catatat', '2023-11-12', '11:00:00'),
(65, '20231112001', 'Desta steh', '2023-11-12', '11:01:01', 1, 'kebutuhan', '2023-11-12', '10:00:00'),
(66, '202311122002', 'Desta steh', '2023-11-12', '11:01:42', 1, 'kebutuhan', '2023-11-13', '11:11:00'),
(67, '202311122003', 'Desta steh', '2023-11-12', '11:05:29', 1, 'kebutuhan', '2023-11-13', '10:00:00'),
(68, '20231115001', 'Tika', '2023-11-15', '13:59:40', 13, 'kebutuhan', '2023-11-16', '11:00:00'),
(69, '202311155002', 'Desta steh', '2023-11-15', '14:04:55', 1, 'kebutuhan', '2023-11-16', '12:00:00'),
(70, '20231120001', 'Tika', '2023-11-20', '13:38:19', 13, 'Untuk Kemah', '2023-11-22', '15:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_satuan`
--

CREATE TABLE `tbl_satuan` (
  `id_satuan` int(2) NOT NULL,
  `nama_satuan` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_satuan`
--

INSERT INTO `tbl_satuan` (`id_satuan`, `nama_satuan`) VALUES
(1, 'PCS'),
(2, 'BOX'),
(3, 'LUSIN'),
(4, 'BUAH'),
(5, 'KG'),
(6, 'UNIT'),
(7, 'BUNGKUS'),
(8, 'karung'),
(11, 'liter');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_setting`
--

CREATE TABLE `tbl_setting` (
  `id` int(1) NOT NULL,
  `nama_sekolah` varchar(25) DEFAULT NULL,
  `slogan` varchar(50) DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `no_hp` varchar(18) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_setting`
--

INSERT INTO `tbl_setting` (`id`, `nama_sekolah`, `slogan`, `alamat`, `no_hp`, `deskripsi`) VALUES
(1, 'SMP NEGERI 5 COMAL', 'Laporan Inventaris Barang SMP Negeri 5 Comal ', 'Jl. Kebojongan Desa Kebojongan, Kecamatan Comal, Kabupaten Pemalang', '089767564787', 'Mau buat banner bingung? ke annisa grafika ajaa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(2) NOT NULL,
  `nama_user` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_user`, `email`, `password`, `level`) VALUES
(1, 'Desta steh', 'admin@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 1),
(12, 'Ariya', 'ariya@gmail.com', '81f698036fc09b3a211a3cfacb969ea3f5ebca1b', 2),
(13, 'Tika', 'tika@gmail.com', '9c880220532157680d1a602904e58fecfddcaa72', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `tbl_barang_keluar`
--
ALTER TABLE `tbl_barang_keluar`
  ADD PRIMARY KEY (`id_barang_keluar`);

--
-- Indeks untuk tabel `tbl_barang_masuk`
--
ALTER TABLE `tbl_barang_masuk`
  ADD PRIMARY KEY (`id_barang_masuk`);

--
-- Indeks untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tbl_pinjam`
--
ALTER TABLE `tbl_pinjam`
  ADD PRIMARY KEY (`id_pinjam`);

--
-- Indeks untuk tabel `tbl_satuan`
--
ALTER TABLE `tbl_satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indeks untuk tabel `tbl_setting`
--
ALTER TABLE `tbl_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_barang`
--
ALTER TABLE `tbl_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `tbl_barang_keluar`
--
ALTER TABLE `tbl_barang_keluar`
  MODIFY `id_barang_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT untuk tabel `tbl_barang_masuk`
--
ALTER TABLE `tbl_barang_masuk`
  MODIFY `id_barang_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tbl_pinjam`
--
ALTER TABLE `tbl_pinjam`
  MODIFY `id_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT untuk tabel `tbl_satuan`
--
ALTER TABLE `tbl_satuan`
  MODIFY `id_satuan` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

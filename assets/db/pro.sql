-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2023 at 01:56 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pro`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_barang`
--

CREATE TABLE `data_barang` (
  `id_barang` int(10) NOT NULL,
  `no_barang` int(100) NOT NULL,
  `id_jenis` int(10) NOT NULL,
  `id_satuan` int(10) NOT NULL,
  `id_kategori` int(10) NOT NULL,
  `keuntungan_minimum` float NOT NULL,
  `diskon_maksimum` float NOT NULL,
  `harga_beli` int(100) NOT NULL,
  `harga_jual` int(100) NOT NULL,
  `state` enum('aktif','tidak') NOT NULL,
  `id_user_input` int(10) NOT NULL,
  `tgl_input` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faktur`
--

CREATE TABLE `faktur` (
  `id_faktur` int(10) NOT NULL,
  `id_distributor` int(10) NOT NULL,
  `nomor_fakt8ur` varchar(100) NOT NULL,
  `tgl_faktur` date NOT NULL,
  `tgl_input` datetime NOT NULL,
  `catatan` text NOT NULL,
  `state` enum('aktif','tidak') NOT NULL,
  `id_user_input` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `item_faktur`
--

CREATE TABLE `item_faktur` (
  `id_item_faktur` int(10) NOT NULL,
  `id_faktur` int(10) NOT NULL,
  `id_barang` int(10) NOT NULL,
  `qty` int(100) NOT NULL,
  `id_satuan` int(10) NOT NULL,
  `disc` float NOT NULL,
  `pajak` float NOT NULL,
  `id_distributor` int(10) NOT NULL,
  `tgl_input` date NOT NULL,
  `id_user_inpt` int(10) NOT NULL,
  `state` enum('aktif','tidak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id_log` int(100) NOT NULL,
  `data` text NOT NULL,
  `status` varchar(10) NOT NULL,
  `date_input` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id_log`, `data`, `status`, `date_input`) VALUES
(4, 'administrator', 'login', '2023-12-07 15:46:34'),
(5, 'administrator', 'login', '2023-12-07 16:10:56'),
(6, 'administrator', 'login', '2023-12-08 01:33:24');

-- --------------------------------------------------------

--
-- Table structure for table `role_tabel`
--

CREATE TABLE `role_tabel` (
  `id_role` int(10) NOT NULL,
  `id_menu` int(10) NOT NULL,
  `id_hak_akses` int(10) NOT NULL,
  `status_role` enum('aktif','tidak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role_tabel`
--

INSERT INTO `role_tabel` (`id_role`, `id_menu`, `id_hak_akses`, `status_role`) VALUES
(40, 1, 1, 'aktif'),
(41, 2, 1, 'aktif'),
(42, 3, 1, 'aktif'),
(43, 4, 1, 'aktif'),
(44, 5, 1, 'aktif'),
(45, 6, 1, 'aktif'),
(46, 7, 1, 'aktif'),
(47, 8, 1, 'aktif'),
(48, 9, 1, 'aktif'),
(49, 10, 1, 'aktif'),
(50, 11, 1, 'aktif'),
(51, 12, 1, 'aktif'),
(52, 13, 1, 'aktif'),
(53, 14, 1, 'aktif'),
(54, 15, 1, 'aktif'),
(55, 16, 1, 'aktif'),
(56, 17, 1, 'aktif'),
(57, 18, 1, 'aktif'),
(58, 19, 1, 'aktif'),
(59, 20, 1, 'aktif'),
(60, 21, 1, 'aktif'),
(61, 22, 1, 'aktif'),
(62, 23, 1, 'aktif'),
(63, 24, 1, 'aktif'),
(64, 25, 1, 'aktif'),
(65, 26, 1, 'aktif'),
(66, 27, 1, 'aktif'),
(67, 28, 1, 'aktif'),
(68, 29, 1, 'aktif'),
(69, 30, 1, 'aktif'),
(70, 31, 1, 'aktif'),
(71, 32, 1, 'aktif'),
(72, 33, 1, 'aktif'),
(73, 34, 1, 'aktif'),
(74, 35, 1, 'aktif'),
(75, 36, 1, 'aktif'),
(76, 37, 1, 'aktif'),
(77, 38, 1, 'aktif'),
(78, 39, 1, 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `t_customer`
--

CREATE TABLE `t_customer` (
  `id_customer` int(10) NOT NULL,
  `nama_customer` int(100) NOT NULL,
  `no_wa` int(20) NOT NULL,
  `alamat` int(100) NOT NULL,
  `nama_pimpinan` varchar(30) NOT NULL,
  `state` enum('aktif','tidak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_distributor`
--

CREATE TABLE `t_distributor` (
  `id_distributor` int(10) NOT NULL,
  `nama_distributor` int(100) NOT NULL,
  `no_wa` int(20) NOT NULL,
  `alamat` int(100) NOT NULL,
  `nama_pimpinan` varchar(30) NOT NULL,
  `state` enum('aktif','tidak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_hak_akses`
--

CREATE TABLE `t_hak_akses` (
  `id_hak_akses` int(10) NOT NULL,
  `nama_hak_akses` varchar(20) NOT NULL,
  `state` enum('aktif','tidak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_hak_akses`
--

INSERT INTO `t_hak_akses` (`id_hak_akses`, `nama_hak_akses`, `state`) VALUES
(1, 'Administrator', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `t_jenis`
--

CREATE TABLE `t_jenis` (
  `id_jenis` int(10) NOT NULL,
  `nama_jenis` varchar(100) NOT NULL,
  `state` enum('aktif','tidak') NOT NULL,
  `id_user_ipnut` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_kategori`
--

CREATE TABLE `t_kategori` (
  `id_kategori` int(10) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `state` enum('aktif','tidak') NOT NULL,
  `id_user_ipnut` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_menu`
--

CREATE TABLE `t_menu` (
  `id_menu` int(10) NOT NULL,
  `nama_menu` varchar(100) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  `state` enum('aktif','tidak') NOT NULL,
  `state_orgin` enum('parent','child') NOT NULL,
  `id_parent` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_menu`
--

INSERT INTO `t_menu` (`id_menu`, `nama_menu`, `icon`, `link`, `state`, `state_orgin`, `id_parent`) VALUES
(1, 'Adminstrator', 'icon-cube3', '#', 'aktif', 'parent', 0),
(2, 'User', '', 'user', 'aktif', 'child', 1),
(3, 'Setting', '', 'setting', 'aktif', 'child', 1),
(4, 'Master Barang', 'icon-box-add', '#', 'aktif', 'parent', 0),
(5, 'jenis', '', 'jenis', 'aktif', 'child', 4),
(6, 'satuan', '', 'satuan', 'aktif', 'child', 4),
(7, 'kategori', '', 'kategori', 'aktif', 'child', 4),
(8, 'distributor', '', 'distributor', 'aktif', 'child', 4),
(9, 'customer', '', 'customer', 'aktif', 'child', 4),
(10, 'data barang', '', 'data_barang', 'aktif', 'child', 4),
(11, 'Transaksi faktur', 'icon-stack2', '#', 'aktif', 'parent', 0),
(12, 'Faktur', '', 'faktur', 'aktif', 'child', 11),
(13, 'Item faktur', '', 'item_faktur', 'aktif', 'child', 11),
(14, 'Laporan faktur', '', 'laporan_faktur', 'aktif', 'child', 11),
(15, 'Penjualan', 'icon-store2', '#', 'aktif', 'parent', 0),
(16, 'Surat Penawaran Harga', '', 'surat_penawaran_harga', 'aktif', 'child', 15),
(17, 'Sales order', '', 'sales_order', 'aktif', 'child', 15),
(18, 'Konfirmasi Order', '', 'konfirmasi_order', 'aktif', 'child', 15),
(19, 'Permintaan Barang', '', 'permintaan_barang', 'aktif', 'child', 15),
(20, 'Tagihan / invocie', '', 'tagihan', 'aktif', 'child', 15),
(21, 'Kwintasi', '', 'kwitansi', 'aktif', 'child', 15),
(22, 'Permohonan Pembayaran', '', 'permohonan_pembayaran', 'aktif', 'child', 15),
(23, 'Pembayaran', '', 'pembayaran', 'aktif', 'child', 15),
(24, 'Pembelian', 'icon-cart-add', '#', 'aktif', 'parent', 0),
(25, 'Permohonan Informasi Harga', '', 'permohonan_informasi_harga', 'aktif', 'child', 24),
(26, 'Request Order', '', 'request_order', 'aktif', 'child', 24),
(27, 'Penerimaan Barang', '', 'penerimaan_barang', 'aktif', 'child', 24),
(28, 'Request Payment', '', 'request_payment', 'aktif', 'child', 24),
(29, 'Sales & Marketing', 'icon-truck', '#', 'aktif', 'parent', 0),
(30, 'Pengajuan Diskon', '', 'pengajuan_diskon', 'aktif', 'child', 29),
(31, 'SDM', 'icon-user', '#', 'aktif', 'parent', 0),
(32, 'Data Pegawai', '', 'data_pegawai', 'aktif', 'child', 31),
(33, 'Pengajuan Cuti', '', 'pengajuan_cuti', 'aktif', 'child', 31),
(34, 'Keuangan', 'icon-price-tags2', '#', 'aktif', 'parent', 0),
(35, 'Laba', '', 'laba', 'aktif', 'child', 34),
(36, 'Piutang', '', 'piutang', 'aktif', 'child', 34),
(37, 'Realisasi Pengadaan', '', 'realisasi_pengadaan', 'aktif', 'child', 34),
(38, 'Sudah Lunas', '', 'sudah_lunas', 'aktif', 'child', 34),
(39, 'Belum Lunas', '', 'belum_lunas', 'aktif', 'child', 34);

-- --------------------------------------------------------

--
-- Table structure for table `t_satuan`
--

CREATE TABLE `t_satuan` (
  `id_satuan` int(10) NOT NULL,
  `nama_satuan` varchar(100) NOT NULL,
  `state` enum('aktif','tidak') NOT NULL,
  `id_user_ipnut` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_user`
--

CREATE TABLE `t_user` (
  `id_user` int(10) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `state` enum('aktif','tidak') NOT NULL,
  `id_hak_akses` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_user`
--

INSERT INTO `t_user` (`id_user`, `nama_user`, `username`, `password`, `state`, `id_hak_akses`) VALUES
(1, 'administrator', 'admin', 'XuePs8IE/41N9eZzEN6bONQpXT3F2aCgGNhtJ7jehmvmOhLB1i+GNLC4qI3qoaztP0Hv1dnEFK7Kq44mczfcrA==', 'aktif', 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_vendor`
--

CREATE TABLE `t_vendor` (
  `id_vendor` int(1) NOT NULL,
  `nama_vendor` varchar(100) NOT NULL,
  `key_app` text NOT NULL,
  `nama_pimpinan` varchar(100) NOT NULL,
  `alamat_vendor` varchar(100) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `logo` text NOT NULL,
  `moto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_vendor`
--

INSERT INTO `t_vendor` (`id_vendor`, `nama_vendor`, `key_app`, `nama_pimpinan`, `alamat_vendor`, `no_telp`, `email`, `logo`, `moto`) VALUES
(1, 'Protic Indonesia', 'PstkFR9JSROm0Vi0WxM9AmO2mqSREQHpa+Gbn4gKu+A5A+oyuIIBKjG27i3LL4IMEk/o1BoUvH5tNVaXuK78Kd5/LsWcyyjGHSqMVGRXx6g=', 'Setya Yuli, Amd.Kom', 'Jalan Kenangan Antara Aku dan Dirimu', '081234567890', 'akukamudandia@diantara.com', 'data:image/png;base64,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', 'Kami Melayani Sepenuh Hati');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_barang`
--
ALTER TABLE `data_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `faktur`
--
ALTER TABLE `faktur`
  ADD PRIMARY KEY (`id_faktur`);

--
-- Indexes for table `item_faktur`
--
ALTER TABLE `item_faktur`
  ADD PRIMARY KEY (`id_item_faktur`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `role_tabel`
--
ALTER TABLE `role_tabel`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `t_customer`
--
ALTER TABLE `t_customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `t_distributor`
--
ALTER TABLE `t_distributor`
  ADD PRIMARY KEY (`id_distributor`);

--
-- Indexes for table `t_hak_akses`
--
ALTER TABLE `t_hak_akses`
  ADD PRIMARY KEY (`id_hak_akses`);

--
-- Indexes for table `t_jenis`
--
ALTER TABLE `t_jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `t_kategori`
--
ALTER TABLE `t_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `t_menu`
--
ALTER TABLE `t_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `t_satuan`
--
ALTER TABLE `t_satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indexes for table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `t_vendor`
--
ALTER TABLE `t_vendor`
  ADD PRIMARY KEY (`id_vendor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_barang`
--
ALTER TABLE `data_barang`
  MODIFY `id_barang` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faktur`
--
ALTER TABLE `faktur`
  MODIFY `id_faktur` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `item_faktur`
--
ALTER TABLE `item_faktur`
  MODIFY `id_item_faktur` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id_log` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `role_tabel`
--
ALTER TABLE `role_tabel`
  MODIFY `id_role` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `t_customer`
--
ALTER TABLE `t_customer`
  MODIFY `id_customer` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_distributor`
--
ALTER TABLE `t_distributor`
  MODIFY `id_distributor` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_hak_akses`
--
ALTER TABLE `t_hak_akses`
  MODIFY `id_hak_akses` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `t_jenis`
--
ALTER TABLE `t_jenis`
  MODIFY `id_jenis` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_kategori`
--
ALTER TABLE `t_kategori`
  MODIFY `id_kategori` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_menu`
--
ALTER TABLE `t_menu`
  MODIFY `id_menu` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `t_satuan`
--
ALTER TABLE `t_satuan`
  MODIFY `id_satuan` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `t_vendor`
--
ALTER TABLE `t_vendor`
  MODIFY `id_vendor` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

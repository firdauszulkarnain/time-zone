-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2021 at 03:56 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jam`
--

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `pesanan_id` int(11) NOT NULL,
  `agen_id` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `tgl_pemesanan` date NOT NULL,
  `tgl_selesai` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `pesanan_id`, `agen_id`, `total_harga`, `tgl_pemesanan`, `tgl_selesai`) VALUES
(9, 15, 13, 1500000, '2020-10-28', '2020-10-28');

-- --------------------------------------------------------

--
-- Table structure for table `kabupaten`
--

CREATE TABLE `kabupaten` (
  `id_kab` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kabupaten`
--

INSERT INTO `kabupaten` (`id_kab`, `nama`) VALUES
(1, 'DENPASAR'),
(2, 'JEMBRANA'),
(3, 'TABANAN'),
(4, 'BADUNG'),
(5, 'GIANYAR'),
(6, 'KLUNGKUNG'),
(7, 'BANGLI'),
(8, 'KARANG ASEM'),
(9, 'BULELENG');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` int(15) NOT NULL,
  `user_id` int(11) NOT NULL,
  `agen_id` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `tgl_pesanan` date NOT NULL,
  `catatan` text NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id`, `barang_id`, `qty`, `harga`, `user_id`, `agen_id`, `subtotal`, `tgl_pesanan`, `catatan`, `status`) VALUES
(15, 15, 2, 1500000, 14, 13, 3000000, '2020-10-28', 'Kasik Barang yang Bagus', 'Selesai'),
(16, 14, 2, 150000, 14, 13, 300000, '2020-11-19', 'Secepatnya', 'Proses'),
(17, 15, 1, 1500000, 14, 13, 1500000, '2020-12-01', 'yang bagus', 'Menunggu Konfirmasi'),
(18, 15, 1, 1500000, 14, 13, 1500000, '2021-01-12', '', 'Menunggu Konfirmasi');

-- --------------------------------------------------------

--
-- Table structure for table `produk_jam`
--

CREATE TABLE `produk_jam` (
  `id_produk` int(11) NOT NULL,
  `nama` varchar(500) NOT NULL,
  `harga` decimal(10,0) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `agen_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk_jam`
--

INSERT INTO `produk_jam` (`id_produk`, `nama`, `harga`, `deskripsi`, `gambar`, `agen_id`) VALUES
(14, 'Lexi', '150000', 'Jam Terbaik', 'popular51.png', 13),
(15, 'Shell Army', '1500000', 'Pilihan Terbaik', 'popular5.png', 13),
(16, 'Thermo Ball Etip Gloves', '500000', 'Jam Termantap', 'popular2.png', 13),
(17, 'Thermo Ball Etip Gloves', '9000000', 'Bahan Terbaik', 'popular6.png', 13),
(18, 'Swiss Bel Army', '200000', 'Jam dengan kualitas terbaik', 'popular4.png', 13),
(19, 'Oulm', '2000000', 'Jam Terbaik yang pernah ada', 'popular3.png', 13);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `notelp` varchar(20) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `id_kabupaten` char(4) NOT NULL,
  `role_id` int(11) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `foto`, `password`, `notelp`, `alamat`, `id_kabupaten`, `role_id`, `date_created`) VALUES
(8, 'firdaus', 'firdaus@gmail.com', 'Default.jpg', '$2y$10$XESxDw16M1kPaMPYCSp/sOrZgdmHVRiUSI0zyOGHOjkDYE3hAcbpe', '', '', '0', 1, 1596631473),
(13, 'Firdaus', 'fir@gmail.co', 'Default.jpg', '$2y$10$W4oOZn8OuCt00ul4T3GKDOz9Sf8ROQ4Ytlfk5aekRkPzHGARQBsu6', '036178964782', '', '0', 2, 1597313135),
(14, 'zul', 'zulkarnain@gmail.com', 'Default.jpg', '$2y$10$KnFCn5D2MG13Ie4enuBXheflMgCJ76XRVgXm9uqF0.mjmBitHK082', '0811111188818', 'Taman Giri', '1', 3, 1599121597),
(26, 'firdaus zulkarnain', 'firzul@gmail.com', 'Default.jpg', '$2y$10$esgpAzpQfTo4waUg05qwL.dCBmt0uQKmRKBJmN.eqSJYJBVv0iJDa', '08786253813', 'Taman Giri', '4', 3, 1603881368);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(3, 2, 2),
(6, 1, 3),
(8, 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id_menu` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id_menu`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu'),
(4, 'Produk');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id_role` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id_role`, `role`) VALUES
(1, 'Admin'),
(2, 'Seller'),
(5, 'Customer');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'My Profil', 'user', 'fas fa-fw fa-user', 1),
(3, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 3, 'SubMenu Management', 'menu/submenu', 'far fa-fw fa-folder-open', 1),
(9, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-plus', 1),
(10, 2, 'Change Password', 'user/changepassword', 'fas fa-fw fa-key', 1),
(11, 4, 'Jam Tangan', 'produk', 'far fa-fw fa-clock', 1),
(16, 4, 'Pesanan', 'produk/pesanan', 'fas fa-fw fa-shopping-bag', 1),
(17, 4, 'Invoice', 'produk/invoice', 'fas fa-fw fa-file-invoice', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kabupaten`
--
ALTER TABLE `kabupaten`
  ADD PRIMARY KEY (`id_kab`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk_jam`
--
ALTER TABLE `produk_jam`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kabupaten`
--
ALTER TABLE `kabupaten`
  MODIFY `id_kab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `produk_jam`
--
ALTER TABLE `produk_jam`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

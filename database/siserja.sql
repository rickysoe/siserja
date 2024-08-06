-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2023 at 09:01 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siserja`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `username`, `password`) VALUES
(1, 'Admin Rick', 'admin', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `no_telepon` varchar(13) NOT NULL,
  `no_ktp` bigint(16) NOT NULL,
  `foto_ktp` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_customer`, `nama`, `username`, `alamat`, `jenis_kelamin`, `no_telepon`, `no_ktp`, `foto_ktp`, `password`) VALUES
(45, 'Vina Amelia', 'vina', 'Jl. Kebon Jeruk No. 99, Jakarta Barat', 'Laki-Laki', '0857250212121', 1234567890123456, 'contoh-foto-ktp.jpg', '81dc9bdb52d04dc20036dbd8313ed055'),
(51, 'Ricky Sudirman', 'rick', 'Jl. Kebon Jeruk, no. 99, Jakarta Barat', 'Laki-Laki', '081275656545', 1234567891234568, 'ktp.png', 'e10adc3949ba59abbe56e057f20f883e'),
(53, 'Alexander Budiman', 'alex', 'Jl. Matraman Dalem no. 76, Jakarta Pusat', 'Laki-Laki', '0812763548915', 3645897895621356, 'e-ktp-guohui-chen.jpg', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `rumah`
--

CREATE TABLE `rumah` (
  `id_rumah` int(11) NOT NULL,
  `kode_type` varchar(20) NOT NULL,
  `deskripsi` varchar(100) NOT NULL,
  `ukuran` varchar(20) NOT NULL,
  `warna` varchar(20) NOT NULL,
  `alamat_rumah` varchar(200) NOT NULL,
  `status` varchar(20) NOT NULL,
  `harga` int(20) NOT NULL,
  `denda` int(20) NOT NULL,
  `jumlah_pembangunan` varchar(20) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rumah`
--

INSERT INTO `rumah` (`id_rumah`, `kode_type`, `deskripsi`, `ukuran`, `warna`, `alamat_rumah`, `status`, `harga`, `denda`, `jumlah_pembangunan`, `gambar`) VALUES
(76, 'CLS', '2 Kamar Tidur, 1 Kamar Mandi, Area Parkir', '40/36', 'Putih', 'Jln. Arteri Kelapa Gading, Jakarta Utara', '0', 2500000, 50000, '125', 'rumah_dalam_cluster_murah_meri_1637235612_c0c4259b_progressive2.jpg'),
(77, 'NCLS', '2 Kamar Tidur, 2 Kamar Mandi, Area Parkir', '45/40', 'Coklat', 'Jln. Kebon Jeruk, Jakarta Barat', '0', 3000000, 80000, '1', 'rumah-dijual-di-ciracas-1-1.jpg'),
(78, 'SCLS', '5 Kamar Tidur, 4 Kamar Mandi, Area Parkir, Private Pool, Maid Room', '200/180', 'Merah', 'Jln. Dharmawangsa, Jakarta Selatan', '1', 10000000, 250000, '2', 'rumah-mewah-minimalis-modern-cover.jpg'),
(79, 'NCLS', '2 Kamar, 1 Kamar Tidur, Area Parkir', '38/35', 'Putih', 'Jln. Rawa Belong, Jakarta Barat', '1', 2500000, 50000, '1', 'rumah__kios.jpg'),
(80, 'CLS', '2 Kamar Tidur, 1 Kamar Mandi, Area Parkir', '42/36', 'Hitam', 'Jl. Cempaka Mas, Jakarta Pusat', '0', 3500000, 50000, '100', 'rumah-murah-1.jpg'),
(82, 'SCLS', '5 Kamar Tidur, 4 Kamar Mandi, Area Parkir, Private Pool, Maid Room', '150/125', 'Putih', 'Jl. Kebayoran Baru, Jakarta Selatan', '1', 8000000, 200000, '3', 'rumah_baru_cluster_luxury_mini_1653840737_298a72d1_progressive.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_booking` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `id_rumah` int(11) NOT NULL,
  `tgl_sewa` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `harga` int(11) NOT NULL,
  `denda` int(11) NOT NULL,
  `tgl_checkout` date NOT NULL,
  `total_denda` int(11) NOT NULL,
  `status_pengembalian` varchar(20) NOT NULL,
  `status_sewa` varchar(20) NOT NULL,
  `bukti_pembayaran` varchar(100) NOT NULL,
  `status_pembayaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_booking`, `id_customer`, `id_rumah`, `tgl_sewa`, `tanggal_selesai`, `harga`, `denda`, `tgl_checkout`, `total_denda`, `status_pengembalian`, `status_sewa`, `bukti_pembayaran`, `status_pembayaran`) VALUES
(134, 51, 80, '2023-06-27', '2023-07-28', 3500000, 50000, '0000-00-00', 0, 'Belum Kembali', 'Belum Selesai', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `rumah`
--
ALTER TABLE `rumah`
  ADD PRIMARY KEY (`id_rumah`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_booking`),
  ADD KEY `id_rumah` (`id_rumah`),
  ADD KEY `id_customer` (`id_customer`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `rumah`
--
ALTER TABLE `rumah`
  MODIFY `id_rumah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_booking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_rumah`) REFERENCES `rumah` (`id_rumah`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

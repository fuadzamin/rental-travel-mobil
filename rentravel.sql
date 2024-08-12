-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2024 at 02:39 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rentravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id_booking` int(11) NOT NULL,
  `kode_booking` varchar(255) NOT NULL,
  `id_login` int(11) NOT NULL,
  `id_mobil` int(11) NOT NULL,
  `ktp` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_tlp` varchar(15) NOT NULL,
  `tanggal` varchar(255) NOT NULL,
  `lama_sewa` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `konfirmasi_pembayaran` varchar(255) NOT NULL,
  `tgl_input` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id_booking`, `kode_booking`, `id_login`, `id_mobil`, `ktp`, `nama`, `alamat`, `no_tlp`, `tanggal`, `lama_sewa`, `total_harga`, `konfirmasi_pembayaran`, `tgl_input`) VALUES
(1, '1576329294', 3, 5, '231423123', 'Krisna', 'Bekasi', '08132312321', '2019-12-28', 2, 400000, 'Pembayaran di terima', '2019-12-14'),
(2, '1576671989', 3, 5, '231423', 'Krisna Waskita', 'Bekasi Ujung Harapan', '082391273127', '2019-12-20', 2, 400525, 'Pembayaran di terima', '2019-12-18'),
(3, '1642998828', 3, 5, '1283821832813', 'Krisna', 'Bekasi', '089618173609', '2022-01-26', 4, 800743, 'Pembayaran di terima', '2022-01-24'),
(4, '1720191664', 4, 6, '330828292727828', 'jono', 'kebum', '0891262622', '2024-07-18', 2, 1000302, 'Pembayaran di terima', '2024-07-05'),
(5, '1720424471', 1, 6, '303033003', 'fuadz', 'kebumen', '08393737829278', '2024-07-08', 2, 1000726, 'Pembayaran di terima', '2024-07-08'),
(6, '1720430084', 1, 6, '26317617671', 'adsada', 'sfaasa', 'asas', '2024-07-08', 2, 1000394, 'Belum Bayar', '2024-07-08'),
(7, '1720575312', 1, 6, '33033030337474', 'fu', 'Kebumen', '0892987262728', '2024-07-10', 1, 500569, 'Belum Bayar', '2024-07-10'),
(8, '1720582798', 1, 6, '365678901`', 'dfghjk', 'fghnm', '45678', '2024-07-10', 1, 500824, 'Belum Bayar', '2024-07-10'),
(9, '1720586414', 1, 6, '33033030337474', 'faiz', 'Kebumen', '0891262622', '2024-07-26', 1, 500158, 'Belum Bayar', '2024-07-10'),
(10, '1720587511', 1, 6, '33033030337474', 'aefasfa', 'Kebumen', '0892987262728', '2024-07-10', 1, 500315, 'Belum Bayar', '2024-07-10'),
(11, '1720588756', 1, 6, '33033030337474', 'guuuu', 'uuuuu', '0891262622', '2024-08-08', 1, 500481, 'Belum Bayar', '2024-07-10'),
(12, '1720593306', 1, 6, '33033030337474', 'guuuu', 'Kebumen', '0891262622', '2024-07-10', 1, 500279, 'Belum Bayar', '2024-07-10'),
(13, '1720597595', 1, 6, '365678901`', 'guuuu', 'Kebumen', '0891262622', '2024-07-23', 1, 500216, 'Belum Bayar', '2024-07-10'),
(14, '1720597771', 3, 6, '33033030337474', 'faiz', 'Kebumen', '0891262622', '2024-07-10', 1, 500357, 'Sedang di proses', '2024-07-10'),
(15, '1720599175', 3, 6, '33033030337474', 'TANIA', 'Kebumen', '0891262622', '2024-07-11', 1, 500196, 'Sedang di proses', '2024-07-10'),
(16, '1720599527', 3, 6, '33033030337474', 'dika', 'keb', '92882', '2024-07-09', 2, 1000861, 'Belum Bayar', '2024-07-10'),
(17, '1720623105', 5, 6, '33033030337474', 'ridho haris', 'Kebumen', '0891262622', '2024-07-11', 1, 500984, 'Sedang di proses', '2024-07-10'),
(18, '1720676675', 1, 6, '33033030337474', 'joni joni', 'Kebumen', '0891262622', '2024-07-12', 1, 500777, 'Sedang di proses', '2024-07-11'),
(19, '1720687424', 1, 6, '33033030337474', 'fuadz misbahul ', 'Kebumen', '0891262622', '2024-07-12', 2, 1000897, 'Sedang di proses', '2024-07-11');

-- --------------------------------------------------------

--
-- Table structure for table `booking_travel`
--

CREATE TABLE `booking_travel` (
  `id_booking` int(11) NOT NULL,
  `kode_booking` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tujuan` varchar(100) NOT NULL,
  `mode_perjalanan` enum('Santai','Sat Set') NOT NULL,
  `estimasi_waktu` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah_penumpang` int(11) NOT NULL,
  `total_harga` varchar(255) NOT NULL,
  `konfirmasi_pembayaran` varchar(255) NOT NULL DEFAULT 'Belum Bayar',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `fk_login` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking_travel`
--

INSERT INTO `booking_travel` (`id_booking`, `kode_booking`, `nama`, `tujuan`, `mode_perjalanan`, `estimasi_waktu`, `tanggal`, `jumlah_penumpang`, `total_harga`, `konfirmasi_pembayaran`, `created_at`, `fk_login`) VALUES
(1, 'TRAVEL_001', 'Budi', 'Jakarta', 'Santai', '3.50', '2024-07-15', 2, '500000.00', 'Belum Bayar', '2024-07-10 04:39:46', 0),
(2, 'TRAVEL_668e1271f05d4', 'guuuu', '1', 'Santai', '20.00', '2024-07-10', 1, '1000000.00', 'Sudah Bayar', '2024-07-10 04:47:45', 0),
(3, 'TRAVEL_668e134d15b77', 'guuuu', '3', 'Sat Set', '6.40', '2024-07-10', 1, '480000.00', 'Sudah Bayar', '2024-07-10 04:51:25', 0),
(4, 'TRAVEL_668e139c29db8', 'jono', '3', 'Sat Set', '6.40', '2024-07-10', 1, '480000.00', 'Sudah Bayar', '2024-07-10 04:52:44', 0),
(5, 'TRAVEL_668e140f63d4e', 'ridho', '1', 'Sat Set', '12.00', '2024-07-10', 1, '1200000.00', 'Belum Bayar', '2024-07-10 04:54:39', 0),
(6, 'TRV-668e1e101b397', 'guuuu', 'Bandung', 'Sat Set', '6.40', '2024-07-10', 1, '480000.00', 'Belum Bayar', '2024-07-10 05:37:20', 0),
(7, 'TRV-668e1e76ae133', 'dewi', 'Bali', 'Sat Set', '12.00', '2024-07-11', 1, '1200000.00', 'Belum Bayar', '2024-07-10 05:39:02', 0),
(8, 'TRV-668e226d510ae', 'guuuu', 'Bali', 'Santai', '20.00', '2024-07-10', 1, '1000000.00', 'Belum Bayar', '2024-07-10 05:55:57', 0),
(9, 'TRV-668e235334bf8', 'faiz', 'Bandung', 'Sat Set', '6.40', '2024-07-18', 1, '480000.00', 'Belum Bayar', '2024-07-10 05:59:47', 0),
(10, 'TRV-668e25048b4fe', 'faiz', 'Bandung', 'Sat Set', '6.40', '2024-07-18', 1, '480000.00', 'Belum Bayar', '2024-07-10 06:07:00', 0),
(11, 'TRV-668e2528c424c', 'faiz', 'Bandung', 'Sat Set', '6.40', '2024-07-18', 1, '480000.00', 'Belum Bayar', '2024-07-10 06:07:36', 0),
(12, 'TRV-668e267f1150f', 'guuuu', 'Bali', 'Santai', '20.00', '2024-07-24', 1, '1000000.00', 'Belum Bayar', '2024-07-10 06:13:19', 0),
(13, 'TRV-668e26a0b744d', 'guuuu', 'Bali', 'Santai', '20.00', '2024-07-24', 1, '1000000.00', 'Belum Bayar', '2024-07-10 06:13:52', 0),
(14, 'TRV-668e26adc608f', 'faiz', 'Bandung', 'Santai', '10.00', '2024-07-12', 1, '400000.00', 'Belum Bayar', '2024-07-10 06:14:05', 0),
(15, 'TRV-668e28960509e', 'faiz', 'Bali', 'Sat Set', '12.00', '2024-07-10', 1, '1200000.00', 'Belum Bayar', '2024-07-10 06:22:14', 0),
(16, 'TRV-668e2a8c3c013', 'faiz', 'Bali', 'Sat Set', '12.00', '2024-07-10', 1, '1200000.00', 'Belum Bayar', '2024-07-10 06:30:36', 0),
(17, 'TRV-668e2a9a50a21', 'yacwafyWU', 'Bali', 'Santai', '20.00', '2024-07-18', 1, '1000000.00', 'Belum Bayar', '2024-07-10 06:30:50', 0),
(18, 'TRV-668e2ab288a4f', 'WEW', 'Bali', 'Santai', '20.00', '2024-07-12', 1, '1000000.00', 'Belum Bayar', '2024-07-10 06:31:14', 0),
(19, 'TRV-668e2ade155ff', 'WEW', 'Bali', 'Santai', '20.00', '2024-07-12', 1, '1000000.00', 'Belum Bayar', '2024-07-10 06:31:58', 0),
(20, 'TRV-668e2f14e16c5', 'ds', 'Bandung', 'Sat Set', '6.40', '2024-07-10', 1, '480000.00', 'Belum Bayar', '2024-07-10 06:49:56', 0),
(21, 'TRV-668e40d4ad314', 'krisna', 'Bali', 'Santai', '20.00', '2024-07-31', 1, '1000000.00', 'Belum Bayar', '2024-07-10 08:05:40', 0),
(22, 'TRV-668e446178acd', 'faiz', 'Bali', 'Sat Set', '12.00', '2024-07-11', 1, '1200000.00', 'Belum Bayar', '2024-07-10 08:20:49', 0),
(23, 'TRV-668e484c315d7', 'andiika', 'Bali', 'Sat Set', '12.00', '2024-07-11', 1, '1200000.00', 'Belum Bayar', '2024-07-10 08:37:32', 0),
(24, 'TRV-668e9b064c8f8', 'guuuu', 'Bali', 'Santai', '20.00', '2024-07-25', 1, '1000000.00', 'Belum Bayar', '2024-07-10 14:30:30', 0),
(25, 'TRV-668ea0e19d530', 'ridho haris', 'Bali', 'Sat Set', '12.00', '2024-07-11', 1, '1200000.00', 'Belum Bayar', '2024-07-10 14:55:29', 0),
(26, 'TRV-668ebfe6581c1', 'fuadz misbahul ', 'Bandung', 'Santai', '10.00', '2024-07-12', 1, '400000.00', 'Belum Bayar', '2024-07-10 17:07:50', 0),
(27, 'TRV-668ec51120412', 'fuadz misbahul ', 'Bali', 'Sat Set', '12.00', '2024-07-12', 2, '2400000.00', 'Belum Bayar', '2024-07-10 17:29:53', 0),
(28, 'TRV-668f4dbed51e0', 'fuadz misbahul ', 'Bali', 'Santai', '20.00', '2024-07-11', 1, '1000000.00', 'Belum Bayar', '2024-07-11 03:13:02', 0),
(29, 'TRV-668f5a86bd779', 'fuadz misbahul ', 'Bandung', 'Santai', '10.00', '2024-07-11', 1, '400000', 'Belum Bayar', '2024-07-11 04:07:34', 0),
(30, 'TRV-668f5cadb6ebf', 'fuadz misbahul ', 'Bali', 'Santai', '20.00', '2024-07-11', 1, '1000000', 'Belum Bayar', '2024-07-11 04:16:45', 0),
(31, 'TRV-668f620195528', 'fuadz misbahul ', 'Bali', 'Santai', '20.00', '2024-07-11', 1, '1000000', 'Belum Bayar', '2024-07-11 04:39:29', 0),
(32, 'TRV-668f62548710d', 'fuadz misbahul ', 'Bali', 'Santai', '20.00', '2024-07-11', 1, '1000000', 'Belum Bayar', '2024-07-11 04:40:52', 0),
(33, 'TRV-668f626de9ad7', 'fuadz misbahul ', 'Bali', 'Santai', '20.00', '2024-07-11', 1, '1000000', 'Belum Bayar', '2024-07-11 04:41:17', 0),
(34, 'TRV-668f67db268c5', 'fuadz misbahul ', 'Bandung', 'Sat Set', '6.40', '2024-07-12', 11, '5280000', '', '2024-07-11 05:04:27', 0),
(35, 'TRV-668f6fdc1cb43', 'joni jono', 'Jakarta', 'Sat Set', '9.60', '2024-07-11', 1, '600000', '', '2024-07-11 05:38:36', 0),
(36, 'TRV-668f71e6a373c', 'ridho haris', 'Bali', 'Sat Set', '12.00', '2024-07-14', 12, '14400000', '', '2024-07-11 05:47:18', 0),
(37, 'TRV-668f9ae80ae3b', 'fuadz misbahul ', 'Bali', 'Santai', '20.00', '2024-07-12', 1, '2000000', '', '2024-07-11 08:42:16', 0),
(38, 'TRV-668f9b7c2a969', 'fuadz misbahul ', 'Jakarta', 'Santai', '15.00', '2024-07-22', 1, '500000', '', '2024-07-11 08:44:44', 0),
(39, 'TRV-668f9d1df312e', 'fuadz misbahul ', 'Jakarta', 'Santai', '15.00', '2024-07-22', 1, '500000', 'Sudah Bayar', '2024-07-11 08:51:41', 0),
(40, 'TRV-668f9e09aebf6', 'fuadz misbahul ', 'Bali', 'Santai', '20.00', '2024-07-12', 1, '2000000', 'Sedang di proses', '2024-07-11 08:55:37', 0);

-- --------------------------------------------------------

--
-- Table structure for table `infoweb`
--

CREATE TABLE `infoweb` (
  `id` int(11) NOT NULL,
  `nama_rental` varchar(255) DEFAULT NULL,
  `telp` varchar(15) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `no_rek` text DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `infoweb`
--

INSERT INTO `infoweb` (`id`, `nama_rental`, `telp`, `alamat`, `email`, `no_rek`, `updated_at`) VALUES
(1, 'Rent and Travel Kebumen', '088746364534', 'kebumen', 'travelkebumen@gmail.com', 'BRI A/N Ridho Haris 5737277878876', '2022-01-24 04:57:29');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id_login` int(11) NOT NULL,
  `nama_pengguna` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id_login`, `nama_pengguna`, `username`, `password`, `level`) VALUES
(1, 'Ridho', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(3, 'Krisna Waskita', 'demo', 'fe01ce2a7fbac8fafaed7c982a04e229', 'pengguna'),
(4, 'fuadz misbahul ', 'fuadz', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(5, 'jono', 'jono', '42867493d4d4874f331d288df0044baa', 'pengguna');

-- --------------------------------------------------------

--
-- Table structure for table `mobil`
--

CREATE TABLE `mobil` (
  `id_mobil` int(11) NOT NULL,
  `no_plat` varchar(255) NOT NULL,
  `merk` varchar(255) NOT NULL,
  `harga` int(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `mobil`
--

INSERT INTO `mobil` (`id_mobil`, `no_plat`, `merk`, `harga`, `deskripsi`, `status`, `gambar`) VALUES
(5, 'N34234', 'Avanza', 200000, 'Apa aja', 'Tidak Tersedia', '1673593078toyota-all-new-avanza-2015-tangkapan-layar_169.jpeg'),
(6, 'N 1232 BKT', 'New Xenia', 500000, 'cepat', 'Tersedia', '1720426869.jpg'),
(7, 'AA 3039 BH', 'Toyota INOVA Reborn', 1000000, 'cumi cumi darat', 'Tidak Tersedia', '1720678664.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_booking` int(255) NOT NULL,
  `id_travel` varchar(50) NOT NULL,
  `kode_booking` varchar(255) NOT NULL,
  `no_rekening` int(255) NOT NULL,
  `nama_rekening` varchar(255) NOT NULL,
  `nominal` varchar(255) NOT NULL,
  `tanggal` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_booking`, `id_travel`, `kode_booking`, `no_rekening`, `nama_rekening`, `nominal`, `tanggal`) VALUES
(3, 1, '0', '', 2131241, 'Krisna Aldi Waskito', '400000', '2019-12-14'),
(4, 2, '0', '', 2131241, 'Krisna Aldi Waskito', '400525', '2019-12-18'),
(5, 3, '0', '', 13213, 'Fauzan Falah', '800743', '2022-01-24'),
(6, 5, '0', '', 687688698, 'f', '1', '2024-07-08'),
(7, 13, '0', '', 2113, 'faiz', '0', '2024-07-27'),
(8, 13, '0', '', 32131, 'guuuu', '0', '2024-07-27'),
(9, 14, '0', '', 2113, 'faiz', '0', '2024-07-10'),
(10, 14, '0', '', 0, 'wdqq', '0', '2024-07-11'),
(11, 15, '0', '', 0, 'ewwf', '0', '2024-07-11'),
(12, 0, '0', '', 65625727, 'vdgaff', '1', '2024-07-11'),
(13, 0, '0', '', 0, 'qwdqwdwq', '1', '2024-07-11'),
(14, 17, '0', '', 2147483647, 'ridho haris', '500', '2024-07-11'),
(15, 0, '0', '', 2131, 'r', '1', '2024-07-11'),
(16, 0, '0', '', 2131, 'r', '1', '2024-07-11'),
(17, 0, '0', '', 2113, 'fuadz misbahul ', '400', '2024-07-12'),
(18, 0, '0', '', 2113, 'fuadz misbahul ', '2400', '2024-07-12'),
(19, 0, '0', '', 0, 'fuadz misbahul ', '1', '2024-07-12'),
(20, 0, '0', '', 123456789, 'fuadz', '100000', '2024-07-11'),
(21, 0, '0', '', 2113, 'fuadz misbahul ', '12456666', '2024-07-11'),
(22, 0, '0', '', 1234567, 'asdfgh', '1234567', '2024-07-11'),
(23, 0, '0', '', 2113, 'fuadz misbahul ', '1,200.0000', '2024-07-11'),
(24, 0, '0', 'TRAVEL_668e134d15b77', 23456, 'fuadz misbahul ', '1234', '2024-07-11'),
(25, 18, '', '', 2113, 'fuadz misbahul ', '1,200.0000', '2024-07-11'),
(26, 19, '', '', 241, 'fuadz misbahul ', '400.000', '2024-07-12');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran_travel`
--

CREATE TABLE `pembayaran_travel` (
  `id` int(11) NOT NULL,
  `kode_booking` varchar(50) NOT NULL,
  `no_rekening` varchar(50) NOT NULL,
  `nama_rekening` varchar(100) NOT NULL,
  `nominal` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembayaran_travel`
--

INSERT INTO `pembayaran_travel` (`id`, `kode_booking`, `no_rekening`, `nama_rekening`, `nominal`, `tanggal`, `status`) VALUES
(1, 'TRV-668f67db268c5', '23123', 'fuadz misbahul ', '234567890-', '2024-07-12', ''),
(2, 'TRV-668f6fdc1cb43', '2113', 'fuadz misbahul ', '600.000', '2024-07-12', ''),
(3, 'TRV-668f71e6a373c', '2113', 'ridho haris', '400.000', '2024-07-11', ''),
(4, 'TRV-668f9ae80ae3b', '35525552', 'fuadz misbahul ', '20000000', '2024-07-12', ''),
(5, 'TRV-668f9b7c2a969', '2345678', 'fuadz misbahul ', '345678', '2024-07-12', ''),
(6, 'TRV-668f9d1df312e', '32456798', 'xcvbnm', '234568', '2024-07-12', ''),
(7, 'TRV-668f9e09aebf6', '2345678', 'fuadz misbahul ', '400.000', '2024-07-12', '');

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id_pengembalian` int(11) NOT NULL,
  `kode_booking` varchar(255) NOT NULL,
  `tanggal` varchar(255) NOT NULL,
  `denda` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tarif`
--

CREATE TABLE `tarif` (
  `id` int(11) NOT NULL,
  `nama_tujuan` varchar(100) NOT NULL,
  `harga` varchar(100) NOT NULL,
  `estimasi_waktu_santai` varchar(11) NOT NULL DEFAULT '0',
  `estimasi_waktu_satset` varchar(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tarif`
--

INSERT INTO `tarif` (`id`, `nama_tujuan`, `harga`, `estimasi_waktu_santai`, `estimasi_waktu_satset`) VALUES
(1, 'Bali', '2000000', '20 jam', '15 jam'),
(2, 'Jakarta', '500000', '15', '12'),
(3, 'Bandung', '400000', '12', '10');

-- --------------------------------------------------------

--
-- Table structure for table `travel`
--

CREATE TABLE `travel` (
  `id` int(11) NOT NULL,
  `id_login` int(11) NOT NULL,
  `nama_penumpang` varchar(100) NOT NULL,
  `id_tujuan` int(11) NOT NULL,
  `mode_perjalanan` enum('Santai','Sat Set') NOT NULL,
  `estimasi_waktu` decimal(10,2) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah_penumpang` int(11) NOT NULL,
  `total_harga` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id_booking`),
  ADD KEY `id_login` (`id_login`);

--
-- Indexes for table `booking_travel`
--
ALTER TABLE `booking_travel`
  ADD PRIMARY KEY (`id_booking`),
  ADD UNIQUE KEY `kode_booking` (`kode_booking`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indexes for table `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`id_mobil`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `pembayaran_travel`
--
ALTER TABLE `pembayaran_travel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_booking` (`kode_booking`);

--
-- Indexes for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`id_pengembalian`);

--
-- Indexes for table `tarif`
--
ALTER TABLE `tarif`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `travel`
--
ALTER TABLE `travel`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id_booking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `booking_travel`
--
ALTER TABLE `booking_travel`
  MODIFY `id_booking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mobil`
--
ALTER TABLE `mobil`
  MODIFY `id_mobil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `pembayaran_travel`
--
ALTER TABLE `pembayaran_travel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `id_pengembalian` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tarif`
--
ALTER TABLE `tarif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `travel`
--
ALTER TABLE `travel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`id_login`) REFERENCES `login` (`id_login`);

--
-- Constraints for table `pembayaran_travel`
--
ALTER TABLE `pembayaran_travel`
  ADD CONSTRAINT `pembayaran_travel_ibfk_1` FOREIGN KEY (`kode_booking`) REFERENCES `booking_travel` (`kode_booking`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

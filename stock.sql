-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 24, 2023 at 10:04 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stock`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_bahan_mentah`
--

CREATE TABLE `tb_bahan_mentah` (
  `uuid` varchar(255) NOT NULL,
  `code_item` varchar(50) NOT NULL,
  `item` varchar(250) NOT NULL,
  `tipe_item` varchar(100) NOT NULL,
  `purchase_date` date DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `unit` varchar(15) DEFAULT NULL,
  `cost` float NOT NULL,
  `cost_unit` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_bahan_mentah`
--

INSERT INTO `tb_bahan_mentah` (`uuid`, `code_item`, `item`, `tipe_item`, `purchase_date`, `qty`, `unit`, `cost`, `cost_unit`) VALUES
('0046ec70-c183-11ed-835a-f018980dae94', 'BM0000000001', 'Beras', 'Raw Material', '2023-03-13', 2000, 'gr', 18000, 9),
('0f4ec328-b99a-11ed-8574-f018980dae94', 'BM0000000001', 'Beras', 'Raw Material', '2023-02-02', 15000, 'gr', 150000, 10),
('0f4f0fae-b99a-11ed-8574-f018980dae94', 'BM0000000002', 'Air Mineral', 'Raw Material', '2023-02-02', 15000, 'ml', 150000, 10),
('0f4f8f7e-b99a-11ed-8574-f018980dae94', 'BM0000000003', 'Tepung Terigu', 'Raw Material', '2023-02-02', 10000, 'gr', 100000, 10),
('0f4fea6e-b99a-11ed-8574-f018980dae94', 'BM0000000004', 'Gula', 'Raw Material', '2023-02-02', 25000, 'gr', 250000, 10),
('234e9afe-bd7a-11ed-95a3-f018980dae94', 'BM0000000003', 'Tepung Terigu', 'Raw Material', '2023-03-08', 10000, 'gr', 300000, 30),
('2df555f8-c4a3-11ed-ba17-f018980dae94', 'BM0000000002', 'Air Mineral', 'Raw Material', '2023-03-17', 1000, 'ml', 3000, 3),
('3b25e1fe-c4a1-11ed-ba17-f018980dae94', 'BM0000000006', 'Kecap', 'Raw Material', '2023-03-27', 5, 'botol', 150000, 30000),
('4f5980dc-c3c9-11ed-9250-f018980dae94', 'BM0000000005', 'Telur', 'Raw Material', '2023-03-13', 16, 'pcs', 18000, 1125),
('5708eac6-c490-11ed-ba17-f018980dae94', 'BJ0000000001', 'Nasi Goreng', 'Good Material', NULL, NULL, NULL, 0, 0),
('657baed6-c490-11ed-ba17-f018980dae94', 'BJ0000000001', 'Nasi Goreng ', 'Good Material', NULL, NULL, NULL, 0, 0),
('b2fb6bc6-c4a2-11ed-ba17-f018980dae94', 'BSJ0000000002', 'Nasi Putih', 'Semi Good Material', NULL, 2000, 'gr', 0, 0),
('c24ee22c-bd79-11ed-95a3-f018980dae94', 'BM0000000003', 'Tepung Terigu', 'Raw Material', '2023-03-08', 10000, 'gr', 300000, 30),
('ccb4330a-c3ca-11ed-9250-f018980dae94', 'BSJ0000000001', 'Nasi Putih', 'Semi Good Material', NULL, 2000, 'gr', 0, 0),
('f3a721de-c4a1-11ed-ba17-f018980dae94', 'BM0000000006', 'Kecap', 'Raw Material', '2023-03-15', 15, 'botol', 345000, 23000),
('f3a7f082-c4a1-11ed-ba17-f018980dae94', 'BM0000000006', 'Kecap', 'Raw Material', '2023-03-12', 24, 'botol', 648000, 27000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_bahan_sj`
--

CREATE TABLE `tb_bahan_sj` (
  `uuid` varchar(255) NOT NULL,
  `code_item` varchar(50) NOT NULL,
  `code_bahan` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_bahan_sj`
--

INSERT INTO `tb_bahan_sj` (`uuid`, `code_item`, `code_bahan`, `qty`) VALUES
('5707cb8c-c490-11ed-ba17-f018980dae94', 'BJ0000000001', 'BSJ0000000001', 250),
('657a89c0-c490-11ed-ba17-f018980dae94', 'BJ0000000001', 'BM0000000005', 1),
('b2fb8a52-c4a2-11ed-ba17-f018980dae94', 'BSJ0000000002', 'BM0000000001', 2000),
('bc1a858e-c4a2-11ed-ba17-f018980dae94', 'BSJ0000000002', 'BM0000000002', 4000),
('ccb44b9c-c3ca-11ed-9250-f018980dae94', 'BSJ0000000001', 'BM0000000001', 2000),
('d06b134c-c3ca-11ed-9250-f018980dae94', 'BSJ0000000001', 'BM0000000002', 2000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_cogs_bm`
--

CREATE TABLE `tb_cogs_bm` (
  `uuid` varchar(255) NOT NULL,
  `code_item` varchar(50) NOT NULL,
  `periode` varchar(50) NOT NULL,
  `reference_cost` float NOT NULL,
  `reference_cost_unit` float NOT NULL,
  `average_cost` float NOT NULL,
  `last_buy_cost` float NOT NULL,
  `average_cost_unit` float NOT NULL,
  `last_buy_unit` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_cogs_bm`
--

INSERT INTO `tb_cogs_bm` (`uuid`, `code_item`, `periode`, `reference_cost`, `reference_cost_unit`, `average_cost`, `last_buy_cost`, `average_cost_unit`, `last_buy_unit`) VALUES
('4de63316-c4a1-11ed-ba17-f018980dae94', 'BM0000000006', '3/2023', 150000, 30000, 381000, 150000, 26666.7, 30000),
('4de68d20-c4a1-11ed-ba17-f018980dae94', 'BM0000000007', '3/2023', 0, 0, 0, 0, 0, 0),
('5b0819a8-c490-11ed-ba17-f018980dae94', 'BJ0000000001', '03/2023', 6125, 6125, 0, 0, 0, 0),
('77761a4e-c3c9-11ed-9250-f018980dae94', 'BM0000000005', '3/2023', 18000, 1125, 18000, 18000, 1125, 1125),
('bf2c4122-c4a2-11ed-ba17-f018980dae94', 'BSJ0000000002', '03/2023', 60000, 30, 45000, 30000, 22.5, 15),
('d278f53a-b99a-11ed-8574-f018980dae94', 'BM0000000001', '03/2023', 300000, 10, 84000, 18000, 9.5, 9),
('d27a0ca4-b99a-11ed-8574-f018980dae94', 'BM0000000002', '03/2023', 4000, 10, 76500, 3000, 6.5, 3),
('d27ab51e-b99a-11ed-8574-f018980dae94', 'BM0000000003', '03/2023', 4000, 10, 233333, 300000, 23.3333, 30),
('d27b187e-b99a-11ed-8574-f018980dae94', 'BM0000000004', '03/2023', 4000, 10, 250000, 250000, 10, 10),
('d9a08e4c-c3ca-11ed-9250-f018980dae94', 'BSJ0000000001', '03/2023', 40000, 20, 0, 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_bahan_mentah`
--
ALTER TABLE `tb_bahan_mentah`
  ADD PRIMARY KEY (`uuid`) USING BTREE;

--
-- Indexes for table `tb_bahan_sj`
--
ALTER TABLE `tb_bahan_sj`
  ADD PRIMARY KEY (`uuid`);

--
-- Indexes for table `tb_cogs_bm`
--
ALTER TABLE `tb_cogs_bm`
  ADD PRIMARY KEY (`uuid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

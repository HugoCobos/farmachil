-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2020 at 06:49 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ventas`
--

-- --------------------------------------------------------

--
-- Table structure for table `ventas`
--

CREATE TABLE `ventas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fecha` datetime NOT NULL,
  `total` decimal(7,2) DEFAULT NULL,
  `cama` int(11) NOT NULL,
  `tipo_pago` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ventas`
--

INSERT INTO `ventas` (`id`, `fecha`, `total`, `cama`, `tipo_pago`) VALUES
(1, '2020-11-17 14:35:27', '235.00', 0, ''),
(2, '2020-11-17 14:56:12', '15.00', 1, ''),
(3, '2020-11-17 21:48:22', '15.00', 13, ''),
(4, '2020-11-17 22:06:18', '15.00', 0, ''),
(5, '2020-11-17 22:16:43', '60.00', 0, ''),
(6, '2020-11-17 22:24:27', '45.00', 0, ''),
(7, '2020-11-19 20:28:43', '500.00', 0, ''),
(8, '2020-11-19 20:30:06', '500.00', 0, ''),
(9, '2020-11-20 16:29:34', '500.00', 10, ''),
(10, '2020-11-20 16:30:43', '500.00', 10, ''),
(11, '2020-11-20 16:32:04', '60.00', 10, ''),
(12, '2020-11-20 16:32:14', '60.00', 10, ''),
(13, '2020-11-20 16:46:56', '0.00', 0, ''),
(14, '2020-11-20 21:18:52', '5400.00', 0, ''),
(15, '2020-11-20 21:19:45', '900.00', 4, ''),
(16, '2020-11-20 21:20:06', '1800.00', 4, ''),
(17, '2020-11-20 21:27:06', '5400.00', 4, ''),
(19, '2020-11-20 21:46:02', '900.00', 0, ''),
(20, '2020-11-20 21:56:30', '900.00', 0, ''),
(21, '2020-11-21 20:45:41', '1200.00', 0, ''),
(22, '2020-11-21 20:53:49', '40.00', 0, ''),
(25, '2020-11-24 23:22:20', '40.00', 0, ''),
(26, '2020-11-24 23:22:23', '40.00', 0, ''),
(27, '2020-11-24 23:23:11', '40.00', 0, ''),
(31, '2020-12-02 18:29:19', '13.00', 0, ''),
(32, '2020-12-02 18:30:59', '1212.00', 0, ''),
(33, '2020-12-04 20:37:01', '400.00', 0, ''),
(34, '2020-12-07 11:42:30', '200.00', 0, 'Tarjeta');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

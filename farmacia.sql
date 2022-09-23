-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-09-2022 a las 17:54:48
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `farmacia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `codigobarras`
--

CREATE TABLE `codigobarras` (
  `id` int(11) NOT NULL,
  `codigo` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombreProducto` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gastos`
--

CREATE TABLE `gastos` (
  `id` int(11) NOT NULL,
  `concepto` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `precio` decimal(7,2) NOT NULL,
  `nota` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `asunto` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pedido` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_proveedor` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `proveedor` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha` datetime NOT NULL,
  `recibido` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fecha` date NOT NULL,
  `codigo` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `precioVenta` decimal(7,2) NOT NULL,
  `existencia` int(3) NOT NULL,
  `proveedor` varchar(50) DEFAULT NULL,
  `estado` varchar(10) NOT NULL,
  `descuento` char(2) NOT NULL,
  `clave` varchar(30) NOT NULL,
  `clavesat` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `fecha`, `codigo`, `descripcion`, `precioVenta`, `existencia`, `proveedor`, `estado`, `descuento`, `clave`, `clavesat`) VALUES
(6, '2021-09-01', '7503007315311', 'Abrixone 500 mg c/10 tabs.', '657.00', 1, '1', 'activo', 'no', '1010101010', ''),
(7, '2022-02-22', '7501328978710', 'Acanol 2mg c/12 tabs.', '222.00', 0, '1', 'activo', 'si', '', ''),
(8, '2021-12-12', '7502216931220', 'ACC 200mg Tabletas Efervecentes', '222.16', 0, '1', 'activo', 'si', '', ''),
(9, '2022-03-12', '7502216930865', 'ACC 600 mg Tabletas Efervecentes c/20', '358.61', 1, '1', 'activo', 'si', '', ''),
(10, '2021-08-17', '7501318609020', 'Actron 600 mg caps c/10', '110.00', 2, '1', 'activo', 'si', '<br /><b>Notice</b>:  Undefine', '<br /><b>Notice</b>:  Undefine'),
(11, '2023-03-30', '7501318634732', 'Actron Plus caps 400 mg c/10', '130.00', 1, '1', 'activo', 'si', '', ''),
(12, '2022-07-01', '7501314705542', 'Afumix c/4 tabs', '660.00', 2, '1', 'activo', 'si', '', ''),
(13, '2022-04-01', '7501287621009', 'Aldactone 100 c/30 tabs 100 mg', '1724.80', 1, '1', 'activo', 'si', '', ''),
(14, '2022-06-01', '7501287621504', 'Aldactone A tabs 25 mg c/30', '740.20', 1, '1', 'activo', 'si', '', ''),
(15, '2021-09-01', '7501165001725', 'Allegra tabs 180 mg c/10', '502.12', 0, '1', 'activo', 'si', '', ''),
(16, '2021-06-01', '7501165006386', 'Allegra D c/10 tabs', '429.32', 1, '1', 'activo', 'si', '', ''),
(17, '2022-03-01', '7501092779278', 'Alevian Duo c/16 caps', '536.00', 1, '1', 'activo', 'si', '', ''),
(18, '2022-04-01', '7501088509773', 'Antiflu-Des c/24 caps', '149.42', 1, '1', 'activo', 'si', '', ''),
(19, '2022-03-01', '7501165007789', 'Aprovasc c/14 tabs', '835.48', 2, '1', 'activo', 'si', '', ''),
(20, '2021-05-01', '7506317100646', 'Alflorex c/30 caps 247 mg', '643.10', 2, '1', 'activo', 'si', '', ''),
(21, '2021-10-08', '7501326000925', 'Arcoxia 120 mg c/7', '1183.43', 2, '1', 'activo', 'si', '', ''),
(22, '2021-07-24', '7501326000901', 'Arcoxia comp. 60 mg c/7', '828.00', 1, '1', 'activo', 'si', '', ''),
(23, '2021-12-31', '4039658000373', 'Arlevert c/20 tabs', '491.00', 1, '1', 'activo', 'si', '', ''),
(24, '2021-02-01', '7501328975436', 'Aralen tabs 150 mg c/30', '264.50', 3, '1', 'activo', 'si', '', ''),
(25, '2022-04-22', '7501314702749', 'Arfla tabs 200 mg c/12', '320.00', 1, '1', 'activo', 'si', '', ''),
(26, '2023-03-22', '7501088507502', 'Atarax tabs 10 mg c/30', '579.00', 1, '1', 'activo', 'si', '', ''),
(27, '2022-07-22', '7501089804099', 'Autrin 600 tabs c/36', '513.00', 1, '1', 'activo', 'si', '', ''),
(28, '2021-05-25', '7501050632119', 'Atozet 10mg/40mg c/30 tabs', '1803.84', 1, '1', 'activo', 'si', '', ''),
(29, '2021-10-01', '7730979094092', 'Asoflon caps 0.4 mg c/30', '1405.08', 1, '1', 'activo', 'si', '', ''),
(30, '2021-02-01', '7506317100448', 'Avirena 20/5/12.5 mg c/28 tabs', '1342.00', 1, '1', 'activo', 'si', '', ''),
(31, '2021-12-01', '7506317100400', 'Avirena 40/5/12.5 mg c/ 14 tabs', '786.00', 2, '1', 'activo', 'si', '', ''),
(32, '2021-02-01', '7503007315038', 'Axofin tabs 400 mg c/20', '784.56', 1, '1', 'activo', 'si', '', ''),
(33, '2021-10-01', '7501008409428', 'Benexol c/30 tabs', '352.48', 1, '1', 'activo', 'si', '', ''),
(34, '2022-01-01', '7501061001003', 'Bentyl caps 10 mg c/30', '315.52', 1, '1', 'activo', 'si', '', ''),
(35, '2022-02-01', '7501050616638', 'Biometrix A-OX c/30 caps', '450.00', 1, '1', 'activo', 'si', '', ''),
(36, '2022-03-01', '7501314701322', 'Biomics caps 400 mg c/6', '900.00', 1, '1', 'activo', 'si', '', ''),
(37, '2022-10-01', '7501287611048', 'Blaxitec tabs 20 mg c/10', '437.80', 1, '1', 'activo', 'si', '', ''),
(38, '2022-07-01', '7501122961246', 'Benedorm tabs 3 mg c/40', '427.86', 1, '1', 'activo', 'si', '', ''),
(39, '2021-11-01', '7502216931848', 'Blodivit tabs 80 mg c/30', '972.02', 1, '1', 'activo', 'si', '', ''),
(40, '2024-01-01', '7501287678034', 'Bonadoxina 25/50mg c/25 tabs', '293.16', 1, '1', 'activo', 'si', '', ''),
(41, '2022-07-02', '7501033921599', 'Blopress 16mg c/14 tabs', '670.80', 1, '1', 'activo', 'si', '', ''),
(42, '2022-02-01', '7501165011649', 'Buscapina 10mg. c/24 tabs.', '231.16', 2, '1', 'activo', 'si', '', ''),
(43, '2022-03-01', '7501101640049', 'Captral 25mg. c/30 tabs.', '546.00', 1, '1', 'activo', 'si', '', ''),
(44, '2022-04-09', '7501285600419', 'Cardinit 5mg c/7 parches', '523.10', 1, '1', 'activo', 'si', '', ''),
(45, '2022-06-01', '7501124100704', 'Carnotprim 10mg c/20 comp', '276.91', 1, '1', 'activo', 'si', '', ''),
(46, '2022-07-01', '7501124103484', 'Carnotprim LP 12H', '429.98', 1, '1', 'activo', 'si', '', ''),
(47, '2022-08-01', '7501287624505', 'Celebrex caps 200 mg c/10', '892.87', 1, '1', 'activo', 'si', '', ''),
(48, '2022-04-01', '7501165007192', 'Cervilan c/30 comp', '846.00', 1, '1', 'activo', 'si', '', ''),
(49, '2023-06-01', '7501109762446', 'Colchiquim', '129.19', 1, '1', 'activo', 'si', '', ''),
(50, '2021-08-01', '7501165007321', 'CoPlavix c/14 tabs', '1126.29', 1, '1', 'activo', 'si', '', ''),
(51, '2021-04-01', '7501089802989', 'Corpotasin CL c/50 tabs efervescentes ', '546.00', 1, '1', 'activo', 'si', '', ''),
(52, '2022-03-01', '7501092722373', 'Dagla tabs 50 mg c/30', '497.00', 1, '1', 'activo', 'si', '', ''),
(53, '2022-05-01', '7501299300909', 'Dafloxen F tabs c/16', '176.00', 1, '1', 'activo', 'si', '', ''),
(54, '2022-03-01', '7501385491085', 'Danzen tabs 10 mg c/20', '376.00', 0, '1', 'activo', 'si', '', ''),
(55, '2021-01-01', '7501300408747', 'Daxon tabs 200 mg c/6', '217.00', 1, '1', 'activo', 'si', '', ''),
(56, '2022-10-01', '7501300408754', 'Daxon tabs 500 mg c/6', '514.00', 1, '1', 'activo', 'si', '', ''),
(57, '2021-03-01', '7501385494239', 'Debromu tabs 40 mg c/15 ', '457.00', 1, '1', 'activo', 'si', '', ''),
(58, '2022-02-01', '7501070600433', 'Deflamox Plus tabs c/12', '172.00', 1, '1', 'activo', 'si', '', ''),
(59, '2023-03-01', '7502209290020', 'Dicynone 500mg c/20 caps', '798.09', 1, '1', 'activo', 'si', '', ''),
(60, '2022-01-01', '7501092722113', 'Dexivant 60mg c/14 caps', '962.00', 1, '1', 'activo', 'si', '', ''),
(61, '2022-02-01', '7501092722120', 'Dexivant 30mg. c/14 cpas.', '611.00', 1, '1', 'activo', 'si', '', ''),
(62, '2021-08-01', '7501287613509', 'Detrusitol 2mg. c/14 tabs.', '571.95', 1, '1', 'activo', 'si', '', ''),
(63, '2022-03-01', '7501314703616', 'Dimegan-D 5/20mg c/10 caps', '400.00', 1, '1', 'activo', 'si', '', ''),
(64, '2022-04-01', '7501314703753', 'Dimegan 10mg c/10 caps', '300.00', 1, '1', 'activo', 'si', '', ''),
(65, '2021-12-01', '7502216931893', 'Dolotandax 275/300mg c/12 tabs', '146.77', 1, '1', 'activo', 'si', '', ''),
(66, '2022-03-01', '7501314703432', 'Excel 15mg c/10 caps', '600.00', 1, '1', 'activo', 'si', '', ''),
(67, '2022-05-18', '7501300420220', 'Dorixina-flam 250/50mg c/14 tabs', '558.00', 2, '1', 'activo', 'si', '', ''),
(68, '2021-09-01', '7501300408556', 'Dorixina Relax 125/5mg cpr', '743.00', 2, '1', 'activo', 'si', '', ''),
(69, '2021-02-01', '7501314703418', 'Excel 7.5mg c/20 caps', '590.00', 1, '1', 'activo', 'si', '', ''),
(70, '2022-12-01', '7501089808806', 'Donodol Compuesto 250/10 mg c/10 tabs', '412.00', 1, '1', 'activo', 'si', '', ''),
(71, '2021-03-01', '7501390912902', 'Durox Pro 100/800 mg c/30 tabs', '424.00', 1, '1', 'activo', 'si', '', ''),
(72, '2022-01-01', '7501101698453', 'Dorsal 15/200mg c/7 tabs', '800.00', 1, '1', 'activo', 'si', '', ''),
(73, '2022-01-01', '7501300420237', 'Dorixina-TMR 125/25mg c/14 tabs', '651.00', 1, '1', 'activo', 'si', '', ''),
(74, '2021-08-01', '7501008497623', 'Elevit c/30 cpr', '394.97', 1, '1', 'activo', 'si', '', ''),
(75, '2022-05-01', '7501300409805', 'Enaladil 10mg c/10cmpr', '266.00', 1, '1', 'activo', 'si', '', ''),
(76, '2021-06-01', '7501064550379', 'Eskaflam tabs 100 mg c/10', '323.24', 1, '1', 'activo', 'si', '', ''),
(77, '2021-08-01', '8027950210480', 'Elicuis tabs 2.5 mg c/20', '949.09', 1, '1', 'activo', 'si', '', ''),
(78, '2022-04-01', '7501057002120', 'Epamin caps 100 mg c/50', '412.30', 1, '1', 'activo', 'si', '', ''),
(79, '2023-10-23', '7501089809490', 'Eskapar capsulas 200 mg c/16 caps.', '160.00', 1, '1', 'activo', 'si', '', ''),
(80, '2023-09-23', '7501089809506', 'Eskapar 400 mg caja c/16 caps.', '219.00', 1, '1', 'activo', 'si', '', ''),
(81, '2022-06-23', '7501314705313', 'Afungil  150 mg caja c/1 caps.', '90.00', 1, '1', 'activo', 'si', '', ''),
(82, '2021-09-23', '7501165011632', 'Buscapina compositum 10mg/250mg c/20 tabs.', '457.00', 2, '1', 'activo', 'si', '', ''),
(83, '2022-01-23', '7501008448243', 'Eternal Vitamina E frasco c/99 caps.', '332.00', 1, '1', 'activo', 'si', '', ''),
(84, '2022-06-23', '7501298234601', 'Eutirox 100 mcg caja c/50 tabs.', '477.68', 1, '1', 'activo', 'si', '', ''),
(85, '2023-11-23', '7502209291331', 'Evastel 20mg. caja c/10 obleas.', '564.06', 1, '1', 'activo', 'si', '', ''),
(86, '2025-06-01', '7501300407047', 'Febrax 275mg/300mg caja c/15 tabs.', '270.00', 1, '1', 'activo', 'si', '', ''),
(87, '2021-10-23', '7501089809445', 'Eskapar compuesto 200mg/600mg caja c/20 caps.', '244.00', 1, '1', 'activo', 'si', '', ''),
(88, '2023-02-23', '7501122963028', 'Espaven enzimatico caja c/50 tabs.', '291.18', 1, '1', 'activo', 'si', '', ''),
(89, '2021-06-23', '7501124815844', 'Exforgehct 5mg/160mg/12.5mg caja c/14 comprimidos.', '858.00', 1, '1', 'activo', 'si', '', ''),
(90, '2021-03-23', '7501287612014', 'Factive-5 320mg. caja c/5 tabs.', '1028.48', 1, '1', 'activo', 'si', '', ''),
(91, '2021-05-01', '7501088504808', 'Fabroven 150mg/150mg/100mg caja c/30 caps.', '765.00', 1, '1', 'activo', 'si', '', ''),
(92, '2021-09-01', '7501298222424', 'Giabri 100mg. caja c/30 tabs.', '954.90', 1, '1', 'activo', 'si', '', ''),
(93, '2021-12-01', '7501871720620', 'Geslutin 200mg. caja c/15 caps.', '785.39', 1, '1', 'activo', 'si', '', ''),
(94, '2022-02-01', '7501299307472', 'Garbican  75mg. caja c/28 tabs.', '779.00', 1, '1', 'activo', 'si', '', ''),
(95, '2022-04-01', '7501125108686', 'Flucoxan 100mg. caja c/10 caps.', '1623.00', 1, '1', 'activo', 'si', '', ''),
(96, '2021-11-01', '7501299307489', 'Garbican 150mg caja c/28 caps.', '779.00', 1, '1', 'activo', 'si', '', ''),
(97, '2022-01-01', '8020030054080', 'Flonorm 550mg. caja c/14 tabs.', '1358.00', 1, '1', 'activo', 'si', '', ''),
(98, '2021-03-01', '7501298242101', 'Floratil 200mg. c/6 caps.', '159.62', 1, '1', 'activo', 'si', '', ''),
(99, '2022-11-01', '8020030053090', 'Flonorm 200mg. caja c/12 tabs.', '331.00', 1, '1', 'activo', 'si', '', ''),
(100, '2021-07-01', '7501314705634', 'Flucogel tabs. 75mg.', '650.00', 1, '1', 'activo', 'si', '', ''),
(101, '2022-01-01', '7501125101069', 'Ficonax 1g. caja c/30 tabs.', '280.00', 1, '1', 'activo', 'si', '', ''),
(102, '2022-06-01', '7501092743033', 'Ferranina fol. 100mg/800mcg caja c/30 tabs.', '535.00', 1, '1', 'activo', 'si', '', ''),
(103, '0022-03-01', '7501123014101', 'Firac plus 125mg, 10mg caja c/20 tabs.', '359.47', 1, '1', 'activo', 'si', '', ''),
(104, '0021-10-01', '7501092772415', 'Ferranina complex caja c/30 tabs.', '538.00', 1, '1', 'activo', 'si', '', ''),
(105, '2021-07-01', '7502209850859', 'Indocid 25mg. caja c/60 caps.', '345.76', 1, '1', 'activo', 'si', '', ''),
(106, '2021-06-01', '7501092722151', 'Incresina P 25mg/15mg caja c/28 tabs.', '1148.00', 1, '1', 'activo', 'si', '', ''),
(107, '2021-10-01', '7501142974172', 'Igef celecobix 200mg. caja c/10 caps.', '735.46', 1, '1', 'activo', 'si', '', ''),
(108, '2021-11-01', '7501109901067', 'Imodium 2mg. caja c/12 tabs.', '166.49', 1, '1', 'activo', 'si', '', ''),
(109, '2021-06-01', '7503007704573', 'Hidrasec 10mg caja c/18 sobres', '285.48', 3, '1', 'activo', 'si', '', ''),
(110, '2021-10-01', '7503007704580', 'Hidrasec 30mg caja c/18 sobres', '314.62', 2, '1', 'activo', 'si', '', ''),
(111, '2021-05-01', '7501168870502', 'Hiperikan caja c/ 40 tabs de 300mg.', '501.10', 1, '1', 'activo', 'si', '', ''),
(112, '2022-02-01', '7503007704597', 'Hidrasec 100mg. caja c/9 caps.', '338.18', 1, '1', 'activo', 'si', '', ''),
(113, '2022-01-01', '7501299330272', 'Glitacar 15mg. caja c/7 tabs', '273.00', 1, '1', 'activo', 'si', '', ''),
(114, '2021-03-01', '7501299330296', 'Glitacar 30mg. caja c/7 atbs.', '490.00', 1, '1', 'activo', 'si', '', ''),
(115, '2022-03-01', '7501101615856', 'Glimetal 2mg, 1000mg. caja c/16 tabs.', '645.00', 1, '1', 'activo', 'si', '', ''),
(116, '2021-04-01', '7501101611148', 'Glimetal 2mg, 850mg caja c/30 tabs.', '969.00', 1, '1', 'activo', 'si', '', ''),
(117, '2022-07-01', '7501314705153', 'Isox 100mg. capsulas c/15 caps.', '580.92', 1, '1', 'activo', 'si', '', ''),
(118, '2022-07-01', '7501314705139', 'Isox 100mg. caja c/6 caps.', '420.00', 1, '1', 'activo', 'si', '', ''),
(119, '2022-02-01', '7501385494192', 'Keral 25mg. caja c/10 tabs.', '483.00', 1, '1', 'activo', 'si', '', ''),
(120, '2022-09-01', '7501088507670', 'Keppra 500mg. caja c/30 tabs.', '1550.00', 1, '1', 'activo', 'si', '', ''),
(121, '2023-04-01', '7501089802958', 'Isorbid 5mg. caja c/40tabs.', '199.00', 1, '1', 'activo', 'si', '', ''),
(122, '2022-07-01', '7501089802965', 'Isorbid 10mg. caja c/40 tabs.', '339.00', 1, '1', 'activo', 'si', '', ''),
(123, '2021-12-01', '7501089803047', 'Isorbid AP 20mg. caja c/40 caps.', '602.00', 1, '1', 'activo', 'si', '', ''),
(124, '2022-04-01', '7501299305751', 'Inhibitron 20mg/1100mg caja con envase c/30 caps.', '479.00', 1, '1', 'activo', 'si', '', ''),
(125, '2022-06-01', '7501299307175', 'Inhibitron F 40mg. 7 caps.', '422.00', 1, '1', 'activo', 'si', '', ''),
(126, '2021-06-01', '7501300407870', 'Liberdux 5mg caja c/28 tabs.', '588.00', 1, '1', 'activo', 'si', '', ''),
(127, '2022-07-01', '7501300420800', 'Levigrix 5mg. caja c/30 tabs.', '592.00', 1, '1', 'activo', 'si', '', ''),
(128, '2021-02-01', '7501390911219', 'Lactipan caja c/6 sobres de 1g c/u', '241.00', 1, '1', 'activo', 'si', '', ''),
(129, '2021-02-01', '7501390911264', 'Lactipan caja c/12 sobres de 1g c/u', '241.00', 1, '1', 'activo', 'si', '', ''),
(130, '2023-04-01', '7501165000179', 'Lasilacton 20mg/50mg caja c/16 caps.', '99999.99', 1, '1', 'activo', 'si', '', ''),
(131, '2021-03-01', '7502216935235', 'Lopresor R 95mg caja con 1 frasco c/20 tabs.', '249.32', 1, '1', 'activo', 'si', '', ''),
(132, '2022-06-01', '7501385494901', 'Lobbivon 5mg. caja c/14 comprimidos.', '602.00', 1, '1', 'activo', 'si', '', ''),
(133, '2022-01-01', '7501299305386', 'Lodestar 50mg. caja c/30 tabs.', '660.00', 1, '1', 'activo', 'si', '', ''),
(134, '2023-08-01', '7501092760016', 'Legalon 70mg. caja c/20 tabs.', '515.00', 1, '1', 'activo', 'si', '', ''),
(135, '2022-06-01', '7501300420596', 'Luvik 2mg. caja c/15 comprimidos', '301.00', 1, '1', 'activo', 'si', '', ''),
(136, '2022-10-01', '7501070903695', 'Libertrim SII 200/75 mg caja c/24 comp.', '581.95', 1, '1', 'activo', 'si', '', ''),
(137, '2022-06-01', '7501124182885', 'Libertrim Alfa 200/75/45 mg caja c/32 comp.', '771.81', 1, '1', 'activo', 'si', '', ''),
(138, '2022-02-01', '7501300408693', 'Loxonin 60 mg caja c/10 tabs', '351.00', 1, '1', 'activo', 'si', '', ''),
(139, '2022-06-01', '7501390913848', 'Lunarium 100/300 mg ', '429.00', 1, '1', 'activo', 'si', '', ''),
(140, '2021-08-22', '7501033958854', 'Luvox 100 mg caja c/15 tabletas', '1008.80', 1, '1', 'activo', 'si', '', ''),
(141, '2022-05-23', '7501088504365', 'Meteospasmyl', '1004.00', 1, '1', 'activo', 'si', '', ''),
(142, '2022-08-01', '7501101612282', 'Malival AP 50 mg caja c/28 caps.', '753.00', 1, '1', 'activo', 'si', '', ''),
(143, '2022-03-29', '7503000883527', 'Lysteda 650 mg caja c/30 tabletas', '977.00', 1, '1', 'activo', 'si', '', ''),
(144, '2022-03-01', '7501101606236', 'Malival Compuesto 25mg,215mg caja c/32 caps.', '824.00', 1, '1', 'activo', 'si', '', ''),
(145, '2022-05-08', '7613326005678', 'Madopar 100mg,25mg caja c/30 tabs.', '485.00', 1, '1', 'activo', 'si', '', ''),
(146, '2021-12-01', '7501287670304', 'Lyrica 75mg. caja c/14 caps.', '673.59', 1, '1', 'activo', 'si', '', ''),
(147, '2023-02-01', '7501165000230', 'Neo-Melubrina 500mg caja c/10 tabs.', '91.98', 1, '1', 'activo', 'si', '', ''),
(148, '2022-09-01', '7501287627650', 'Motrin 800mg. caja c/10 tabs.', '183.73', 1, '1', 'activo', 'si', '', ''),
(149, '2021-06-01', '7501037920161', 'Micardis Duo 40mg/5mg caja c/28 tabs.', '1414.24', 1, '1', 'activo', 'si', '', ''),
(150, '2022-04-01', '7501287627513', 'Motrin 400mg. frasco c/45 tabs.', '483.15', 1, '1', 'activo', 'si', '', ''),
(151, '2021-10-01', '7502235760214', 'Mileva 35 2.000mg/0.035mg caja c/21 comprimidos.', '446.86', 1, '1', 'activo', 'si', '', ''),
(152, '2021-12-09', '7501300420732', 'Mistan caja c/7tabs de 120mg.', '701.00', 1, '1', 'activo', 'si', '', ''),
(153, '2021-04-15', '7501300420718', 'Mistan caja c/14 tabs de 90mg.', '711.00', 1, '1', 'activo', 'si', '', ''),
(154, '2021-08-15', '7501089810540', 'Noblod FIN caja c/4 tubos de 5ml.', '269.83', 1, '1', 'activo', 'si', '', ''),
(155, '2023-02-01', '7501298269009', 'Novotiral 100mcg/20mcg caja c/50 tabs.', '462.34', 1, '1', 'activo', 'si', '', ''),
(156, '2022-04-01', '7501168890142', 'NeoLaikan 500mg. caja c/30 tabs.', '391.10', 1, '1', 'activo', 'si', '', ''),
(157, '2022-07-01', '7501165011434', 'Mucoangin 20mg caja c/18 pastillas.', '148.62', 1, '1', 'activo', 'si', '', ''),
(158, '2021-05-01', '7501125135460', 'Onemer SL 30mgcaja c/6 tabs.', '112.00', 1, '1', 'activo', 'si', '', ''),
(159, '2021-04-01', '7502209852792', 'Novial caja c/21 tabs. (7 amarillas, 7 rojas, 7 blancas).', '498.21', 1, '1', 'activo', 'si', '', ''),
(160, '2021-11-01', '7501070636517', 'Omuro 40mg. caja c/15 tabs.', '515.00', 1, '1', 'activo', 'si', '', ''),
(161, '2022-06-01', '7501086301041', 'Oxal 150mg, 200mg. caja c/2 tabs.', '158.00', 2, '1', 'activo', 'si', '', ''),
(162, '2022-05-01', '7501299307380', 'ParaMix 500mg. caja c/6 grageas.', '373.00', 1, '1', 'activo', 'si', '', ''),
(163, '2021-11-01', '763948315574', 'Opearls contenido c/30 caps.', '413.90', 1, '1', 'activo', 'si', '', ''),
(164, '2023-04-15', '7501165011786', 'Pharmaton caja c/30 caps.', '310.75', 2, '1', 'activo', 'si', '', ''),
(165, '2021-08-01', '7501092785019', 'Pantozol 40mg. caja c/7 tabs.', '505.00', 1, '1', 'activo', 'si', '', ''),
(166, '0021-11-01', '7501092777380', 'Pantozol 20mg. caja c/14 tabs.', '536.00', 1, '1', 'activo', 'si', '', ''),
(167, '2023-01-01', '7501088504815', 'Permixon 160mg. caja c/60 caps.', '1190.00', 1, '1', 'activo', 'si', '', ''),
(168, '2022-11-01', '7501088504822', 'Permixon 160mg. caja c/30 tabs.', '736.00', 1, '1', 'activo', 'si', '', ''),
(169, '2020-10-31', '7501168860824', 'Plantival 160mg/80mg caja c/40 tabs.', '397.10', 1, '1', 'activo', 'si', '', ''),
(170, '2022-09-01', '7501328978994', 'Plavix 75mg. caja c/14 tabs.', '1084.65', 2, '1', 'activo', 'si', '', ''),
(171, '2022-06-01', '7501299303467', 'Prazolan 40mg. caja c/7 tabs.', '400.00', 2, '1', 'activo', 'si', '', ''),
(172, '2023-07-01', '7501300408204', 'Plidán 10/125mg. caja c/20 comprimidos.', '465.00', 1, '1', 'activo', 'si', '', ''),
(173, '2022-03-01', '7841141003801', 'Prikul 75mg. caja c/14 caps.', '641.61', 1, '1', 'activo', 'si', '', ''),
(174, '2022-04-01', '7841141004303', 'Prikul 50mg. caja c/28 caps.', '800.78', 1, '1', 'activo', 'si', '', ''),
(175, '2022-09-01', '7501303451603', 'Progyluton caja c/21 tabs.', '677.00', 2, '1', 'activo', 'si', '', ''),
(176, '2022-06-01', '7501249602022', 'Previta mom caja c/30 caps.', '300.00', 1, '1', 'activo', 'si', '', ''),
(177, '2022-03-01', '7501168870625', 'Prosgutt 160mg/120mg caja c/40 caps.', '843.80', 1, '1', 'activo', 'si', '', ''),
(178, '2022-01-01', '7501086315024', 'Proteflor 20 caps.', '393.10', 1, '1', 'activo', 'si', '', ''),
(179, '2022-10-01', '300090286200', 'Provera 5mg. caja c/24 tabs.', '451.62', 1, '1', 'activo', 'si', '', ''),
(180, '2021-07-01', '7501299302811', 'Pulsar AT 40 mg caja c/30 tabletas', '1189.00', 1, '1', 'activo', 'si', '', ''),
(181, '2022-05-01', '7502235760139', 'Regenesis MAX 29.51g.', '411.97', 1, '1', 'activo', 'si', '', ''),
(182, '2022-07-31', '7502213144012', 'Rofucal 25mg. caja c/30 tabs.', '319.81', 1, '1', 'activo', 'si', '', ''),
(183, '2022-04-01', '7501124180201', 'Repafet 10mg. caja c/20 tabs.', '808.70', 1, '1', 'activo', 'si', '', ''),
(184, '2022-02-01', '008400000491', 'Ribotripsin c/25 grageas.', '323.26', 1, '1', 'activo', 'si', '', ''),
(185, '2022-02-01', '7501299308073', 'Sensibit XP caja c/20 tabs.', '330.00', 1, '1', 'activo', 'si', '', ''),
(186, '2021-03-01', '7501299330074', 'Sensibit 10mg. caja c/10 tabs.', '213.00', 1, '1', 'activo', 'si', '', ''),
(187, '2024-05-01', '7501299300367', 'Sensibit 10mg. caja c/10 tabs.', '208.00', 1, '1', 'activo', 'si', '', ''),
(188, '2022-10-01', '7501299307236', 'Sensibit D nf caja c/12 tabs', '63.00', 1, '1', 'activo', 'si', '', ''),
(189, '2021-03-01', '7501299307823', 'SensiDex 5 mg caja c/30 tabs', '552.00', 1, '1', 'activo', 'si', '', ''),
(190, '2022-02-01', '7501109901609', 'Risperdal 1mg. caja c/20 tabs.', '842.64', 1, '1', 'activo', 'si', '', ''),
(191, '2021-05-01', '7501300420077', 'RovartalNF 10mg. caja c/30 comprimidos.', '753.00', 1, '1', 'activo', 'si', '', ''),
(192, '2021-11-01', '7501033957871', 'Serc 24mg. caja c/30 tabs.', '988.00', 1, '1', 'activo', 'si', '', ''),
(193, '2021-10-01', '7501250829876', 'Sinergix 25mg-10mg caja c/4 tabs.', '488.00', 1, '1', 'activo', 'si', '', ''),
(194, '2021-11-01', '7501300407924', 'Sensemoc 600mg. caja c/20 tabs.', '363.00', 1, '1', 'activo', 'si', '', ''),
(195, '2022-08-01', '7501299307694', 'Seltaferon 75mg. caja c/10 caps.', '518.00', 1, '1', 'activo', 'si', '', ''),
(196, '2023-04-01', '7501098608398', 'Seroquel 25mg. caja c/30 tabs.', '647.00', 1, '1', 'activo', 'si', '', ''),
(197, '2021-10-01', '7501314703227', 'Sies 200mg. caja c/20 caps.', '480.00', 1, '1', 'activo', 'si', '', ''),
(198, '2021-10-01', '7506317100653', 'Skudexa 75mg/25mg caja c/10 tabs.', '486.00', 1, '1', 'activo', 'si', '', ''),
(199, '2022-05-01', '7501314704927', 'Spasmopriv 200mg. caja c/12 caps.', '330.00', 1, '1', 'activo', 'si', '', ''),
(200, '2023-05-01', '7501258200080', 'Soyaloid caja c/1 sobre con 90g.', '213.66', 1, '1', 'activo', 'si', '', ''),
(201, '2021-08-01', '7501300420398', 'Sig 2.5mg. caja c/30 comprimidos.', '545.00', 1, '1', 'activo', 'si', '', ''),
(202, '2023-04-01', '7501299306130', 'SupraDOL 30mg. caja c/4 tabs.', '142.00', 1, '1', 'activo', 'si', '', ''),
(203, '2021-06-01', '7501122967019', 'Supra 4mg. caja c/30 tabs.', '380.58', 1, '1', 'activo', 'si', '', ''),
(204, '2021-12-01', '7501070635756', 'Stadium 25mg. caja c/10 tabs. ', '509.00', 1, '1', 'activo', 'si', '', ''),
(205, '2021-09-01', '7501109900299', 'Sporanox 15D 100mg. caja c/15 caps.', '995.00', 1, '1', 'activo', 'si', '', ''),
(206, '2021-11-01', '7501070635787', 'Stadium 75mg/25mg. caja c/10 tabs.', '552.00', 1, '1', 'activo', 'si', '', ''),
(207, '2023-06-01', '7501871720675', 'Tafirol 1g. caja c/20 tabs.', '388.05', 3, '1', 'activo', 'si', '', ''),
(208, '2022-04-01', '7501871720668', 'Tafirol AC 500mg/50mg. caja c/15 tabs.', '357.77', 2, '1', 'activo', 'si', '', ''),
(209, '2025-01-06', '7613326005906', 'Tamiflu 75mg. caja c/10 caps.', '920.00', 2, '1', 'activo', 'si', '', ''),
(210, '2022-04-01', '7841141003528', 'Tafitram 325mg-37.5mg caja c/10 tabs.', '432.21', 1, '1', 'activo', 'si', '', ''),
(211, '2022-01-01', '7501258200868', 'Talizer 100mg . caja c/50 tabs.', '1862.95', 1, '1', 'activo', 'si', '', ''),
(212, '2021-06-01', '7501092777403', 'Tecta 20mg. caja c/14 tabs.', '522.00', 1, '1', 'activo', 'si', '', ''),
(213, '2021-09-01', '7501092774839', 'Tecta 40mg. caja c/14 tabs.', '837.00', 1, '1', 'activo', 'si', '', ''),
(214, '2023-04-01', '7501168890180', 'Tebonin forte 80mg. caja c/24 tabs.', '540.00', 1, '1', 'activo', 'si', '', ''),
(215, '2023-06-01', '7501095452116', 'Tempra 500mg. caja c/10 tabs.', '54.02', 2, '1', 'activo', 'si', '', ''),
(216, '2023-04-01', '7501095452505', 'Tempra forte 650mg. caja c/24 tabs.', '121.65', 2, '1', 'activo', 'si', '', ''),
(217, '2022-05-01', '7501122963707', 'Espacil compuesto 125mg, 10mg caja c/20 caps.', '364.31', 1, '1', 'activo', 'si', '', ''),
(218, '2021-03-01', '7501168870342', 'Tebonin OD 240mg. caja c/28 tabs.', '1149.00', 1, '1', 'activo', 'si', '', ''),
(219, '2025-07-01', '7501287669001', 'Minipres 1mg. caja c/30 caps.', '221.04', 1, '1', 'activo', 'si', '', ''),
(220, '2022-06-01', '7501109904341', 'Amoebriz 300mg/150mg caja c/2 tabs.', '357.19', 2, '1', 'activo', 'si', '', ''),
(221, '2022-03-01', '7730979092883', 'Tim asf 25mg. caja c/30 tabs.', '637.12', 1, '1', 'activo', 'si', '', ''),
(222, '2022-07-01', '7730979097192', 'Asoflon - duo 0.50mg/0.40mg caja c/30 caps.', '1198.20', 1, '1', 'activo', 'si', '', ''),
(223, '2021-07-01', '7501094910570', 'Resalon 100mg. caja c/20 caps.', '177.69', 1, '1', 'activo', 'si', '', ''),
(224, '2022-08-21', '7501033959929', 'ControLip- TriLipix 135mg. caja c/15 caps.', '748.80', 1, '1', 'activo', 'si', '', ''),
(225, '2021-11-01', '7501299309643', 'Thoreva 80mg. caja c/30 tabs.', '700.00', 1, '1', 'activo', 'si', '', ''),
(226, '2022-07-01', '7502235760122', 'Transvital 26.913g', '351.34', 2, '1', 'activo', 'si', '', ''),
(227, '2021-04-01', '7502209290341', 'Tradol 50mg. caja c/10 caps.', '544.96', 1, '1', 'activo', 'si', '', ''),
(228, '2022-01-01', '7501037925562', 'Trayenta 5mg. caja c/10 tabs.', '600.02', 1, '1', 'activo', 'si', '', ''),
(229, '2022-09-01', '7501100089016', 'Tylex 750mg. caja c/20 tabs.', '252.20', 1, '1', 'activo', 'si', '', ''),
(230, '2021-09-01', '7501165000391', 'Trental 400mg. caja c/30 tabs.', '769.00', 1, '1', 'activo', 'si', '', ''),
(231, '2022-06-01', '7501092721215', 'Turazive 80mg. caja c/14 tabs.', '472.00', 1, '1', 'activo', 'si', '', ''),
(232, '2023-08-03', '7501165011830', 'Pharmaton caja c/100caps.', '583.93', 2, '1', 'activo', 'si', '', ''),
(233, '2022-04-01', '7501314704828', 'Uslen PCS 40mg. caja c/14 caps.', '470.00', 1, '1', 'activo', 'si', '', ''),
(234, '2021-09-01', '7501314704750', 'Unamol 5mg. caja c/30 comprimidos', '275.00', 1, '1', 'activo', 'si', '', ''),
(235, '2021-09-01', '7501314704712', 'Unamol 10mg. caja c/30 comprimidos', '445.00', 1, '1', 'activo', 'si', '', ''),
(236, '2022-01-01', '7501287670014', 'Norvas 5mg. caja c/10 tabs.', '464.22', 1, '1', 'activo', 'si', '', ''),
(237, '2022-09-01', '7501299305706', 'Raas 80mg. caja c/30 tabs.', '813.00', 1, '1', 'activo', 'si', '', ''),
(238, '2022-09-01', '7501314704040', 'Unival 1g. caja c/40 tabs.', '370.00', 1, '1', 'activo', 'si', '', ''),
(239, '2021-11-01', '7502216797475', 'Urotrol 2mg. caja c/14 tabs.', '590.00', 1, '1', 'activo', 'si', '', ''),
(240, '2022-12-01', '7502209290082', 'Uro-Vaxom 6mg. caja c/15 caps.', '882.48', 1, '1', 'activo', 'si', '', ''),
(241, '2021-04-01', '7501168890159', 'Vitanco 200mg. caja c/30 tabs.', '354.90', 1, '1', 'activo', 'si', '', ''),
(242, '2022-05-01', '7501123019717', 'Unifertol 36mg, 0.800mg. caja c/30 caps.', '489.87', 1, '1', 'activo', 'si', '', ''),
(243, '2021-03-12', '99', 'Prueba', '51.50', 3, '1', 'activo', 'si', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_vendidos`
--

CREATE TABLE `productos_vendidos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_producto` bigint(20) UNSIGNED NOT NULL,
  `cantidad` bigint(20) UNSIGNED NOT NULL,
  `id_venta` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos_vendidos`
--

INSERT INTO `productos_vendidos` (`id`, `id_producto`, `cantidad`, `id_venta`) VALUES
(0, 10, 3, 1),
(0, 6, 3, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correo` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id`, `nombre`, `telefono`, `correo`) VALUES
(1, 'NADRO SAPI', '0000000', 'ejemplo@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidos` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nivel` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellidos`, `username`, `password`, `nivel`) VALUES
(2, 'Andres', 'Lopez', 'Andres', '12345', 'farmacia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fecha` date NOT NULL,
  `total` decimal(7,2) DEFAULT NULL,
  `tipo_pago` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `fecha`, `total`, `tipo_pago`) VALUES
(1, '2022-09-21', '330.00', 'Efectivo'),
(2, '2022-09-21', '1971.00', 'Efectivo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `gastos`
--
ALTER TABLE `gastos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `gastos`
--
ALTER TABLE `gastos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=244;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

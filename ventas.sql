-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-01-2021 a las 18:18:53
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ventas`
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
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `id_paciente` int(11) NOT NULL,
  `nombre` varchar(80) NOT NULL,
  `numero_cama` varchar(25) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`id_paciente`, `nombre`, `numero_cama`, `status`) VALUES
(1, 'carla maria sanchez', 'Cama 2', 0),
(2, 'Maria Quevedo Lopez', 'Urgencias', 0),
(3, 'Tania Cruz Baltazar', 'Cama 7', 0),
(4, 'Lyzeth Vergara', 'Cama 3', 0),
(5, 'Juan Lopez Lopez', 'Urgencias', 1);

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
  `precioCompra` decimal(7,2) NOT NULL,
  `existencia` decimal(5,2) NOT NULL,
  `proveedor` varchar(50) DEFAULT NULL,
  `estado` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `fecha`, `codigo`, `descripcion`, `precioVenta`, `precioCompra`, `existencia`, `proveedor`, `estado`) VALUES
(6, '2021-09-01', '7503007315311', 'Abrixone 500 mg c/10 tabs.', '657.00', '458.00', '0.00', '1', 'activo'),
(7, '2022-02-22', '7501328978710', 'Acanol 2mg c/12 tabs.', '222.00', '0.00', '0.00', '1', 'activo'),
(8, '2021-12-12', '7502216931220', 'ACC 200mg Tabletas Efervecentes', '222.16', '0.00', '0.00', '1', 'activo'),
(9, '2022-03-12', '7502216930865', 'ACC 600 mg Tabletas Efervecentes c/20', '358.61', '0.00', '1.00', '1', 'activo'),
(10, '2021-08-17', '7501318609020', 'Actron 600 mg caps c/10', '110.00', '0.00', '3.00', '1', 'activo'),
(11, '2023-03-30', '7501318634732', 'Actron Plus caps 400 mg c/10', '130.00', '0.00', '1.00', '1', 'activo'),
(12, '2022-07-01', '7501314705542', 'Afumix c/4 tabs', '660.00', '0.00', '2.00', '1', 'activo'),
(13, '2022-04-01', '7501287621009', 'Aldactone 100 c/30 tabs 100 mg', '1724.80', '0.00', '1.00', '1', 'activo'),
(14, '2022-06-01', '7501287621504', 'Aldactone A tabs 25 mg c/30', '740.20', '0.00', '1.00', '1', 'activo'),
(15, '2021-09-01', '7501165001725', 'Allegra tabs 180 mg c/10', '502.12', '0.00', '0.00', '1', 'activo'),
(16, '2021-06-01', '7501165006386', 'Allegra D c/10 tabs', '429.32', '0.00', '1.00', '1', 'activo'),
(17, '2022-03-01', '7501092779278', 'Alevian Duo c/16 caps', '536.00', '0.00', '1.00', '1', 'activo'),
(18, '2022-04-01', '7501088509773', 'Antiflu-Des c/24 caps', '149.42', '0.00', '1.00', '1', 'activo'),
(19, '2022-03-01', '7501165007789', 'Aprovasc c/14 tabs', '835.48', '0.00', '2.00', '1', 'activo'),
(20, '2021-05-01', '7506317100646', 'Alflorex c/30 caps 247 mg', '643.10', '0.00', '2.00', '1', 'activo'),
(21, '2021-10-08', '7501326000925', 'Arcoxia 120 mg c/7', '1183.43', '0.00', '2.00', '1', 'activo'),
(22, '2021-07-24', '7501326000901', 'Arcoxia comp. 60 mg c/7', '828.00', '0.00', '1.00', '1', 'activo'),
(23, '2021-12-31', '4039658000373', 'Arlevert c/20 tabs', '491.00', '0.00', '1.00', '1', 'activo'),
(24, '2021-02-01', '7501328975436', 'Aralen tabs 150 mg c/30', '264.50', '0.00', '3.00', '1', 'activo'),
(25, '2022-04-22', '7501314702749', 'Arfla tabs 200 mg c/12', '320.00', '0.00', '1.00', '1', 'activo'),
(26, '2023-03-22', '7501088507502', 'Atarax tabs 10 mg c/30', '579.00', '0.00', '1.00', '1', 'activo'),
(27, '2022-07-22', '7501089804099', 'Autrin 600 tabs c/36', '513.00', '0.00', '1.00', '1', 'activo'),
(28, '2021-05-25', '7501050632119', 'Atozet 10mg/40mg c/30 tabs', '1803.84', '0.00', '1.00', '1', 'activo'),
(29, '2021-10-01', '7730979094092', 'Asoflon caps 0.4 mg c/30', '1405.08', '0.00', '1.00', '1', 'activo'),
(30, '2021-02-01', '7506317100448', 'Avirena 20/5/12.5 mg c/28 tabs', '1342.00', '0.00', '1.00', '1', 'activo'),
(31, '2021-12-01', '7506317100400', 'Avirena 40/5/12.5 mg c/ 14 tabs', '786.00', '0.00', '2.00', '1', 'activo'),
(32, '2021-02-01', '7503007315038', 'Axofin tabs 400 mg c/20', '784.56', '0.00', '1.00', '1', 'activo'),
(33, '2021-10-01', '7501008409428', 'Benexol c/30 tabs', '352.48', '0.00', '1.00', '1', 'activo'),
(34, '2022-01-01', '7501061001003', 'Bentyl caps 10 mg c/30', '315.52', '0.00', '1.00', '1', 'activo'),
(35, '2022-02-01', '7501050616638', 'Biometrix A-OX c/30 caps', '450.00', '0.00', '1.00', '1', 'activo'),
(36, '2022-03-01', '7501314701322', 'Biomics caps 400 mg c/6', '900.00', '0.00', '1.00', '1', 'activo'),
(37, '2022-10-01', '7501287611048', 'Blaxitec tabs 20 mg c/10', '437.80', '0.00', '1.00', '1', 'activo'),
(38, '2022-07-01', '7501122961246', 'Benedorm tabs 3 mg c/40', '427.86', '0.00', '1.00', '1', 'activo'),
(39, '2021-11-01', '7502216931848', 'Blodivit tabs 80 mg c/30', '972.02', '1.00', '1.00', '1', 'activo'),
(40, '2024-01-01', '7501287678034', 'Bonadoxina 25/50mg c/25 tabs', '293.16', '0.00', '1.00', '1', 'activo'),
(41, '2022-07-02', '7501033921599', 'Blopress 16mg c/14 tabs', '670.80', '0.00', '1.00', '1', 'activo'),
(42, '2022-02-01', '7501165011649', 'Buscapina 10mg. c/24 tabs.', '231.16', '0.00', '2.00', '1', 'activo'),
(43, '2022-03-01', '7501101640049', 'Captral 25mg. c/30 tabs.', '546.00', '0.00', '1.00', '1', 'activo'),
(44, '2022-04-09', '7501285600419', 'Cardinit 5mg c/7 parches', '523.10', '0.00', '1.00', '1', 'activo'),
(45, '2022-06-01', '7501124100704', 'Carnotprim 10mg c/20 comp', '276.91', '0.00', '1.00', '1', 'activo'),
(46, '2022-07-01', '7501124103484', 'Carnotprim LP 12H', '429.98', '0.00', '1.00', '1', 'activo'),
(47, '2022-08-01', '7501287624505', 'Celebrex caps 200 mg c/10', '892.87', '0.00', '1.00', '1', 'activo'),
(48, '2022-04-01', '7501165007192', 'Cervilan c/30 comp', '846.00', '0.00', '1.00', '1', 'activo'),
(49, '2023-06-01', '7501109762446', 'Colchiquim', '129.19', '0.00', '1.00', '1', 'activo'),
(50, '2021-08-01', '7501165007321', 'CoPlavix c/14 tabs', '1126.29', '0.00', '1.00', '1', 'activo'),
(51, '2021-04-01', '7501089802989', 'Corpotasin CL c/50 tabs efervescentes ', '546.00', '0.00', '1.00', '1', 'activo'),
(52, '2022-03-01', '7501092722373', 'Dagla tabs 50 mg c/30', '497.00', '0.00', '1.00', '1', 'activo'),
(53, '2022-05-01', '7501299300909', 'Dafloxen F tabs c/16', '176.00', '0.00', '1.00', '1', 'activo'),
(54, '2022-03-01', '7501385491085', 'Danzen tabs 10 mg c/20', '376.00', '0.00', '0.00', '1', 'activo'),
(55, '2021-01-01', '7501300408747', 'Daxon tabs 200 mg c/6', '217.00', '0.00', '1.00', '1', 'activo'),
(56, '2022-10-01', '7501300408754', 'Daxon tabs 500 mg c/6', '514.00', '0.00', '1.00', '1', 'activo'),
(57, '2021-03-01', '7501385494239', 'Debromu tabs 40 mg c/15 ', '457.00', '0.00', '1.00', '1', 'activo'),
(58, '2022-02-01', '7501070600433', 'Deflamox Plus tabs c/12', '172.00', '0.00', '1.00', '1', 'activo'),
(59, '2023-03-01', '7502209290020', 'Dicynone 500mg c/20 caps', '798.09', '0.00', '1.00', '1', 'activo'),
(60, '2022-01-01', '7501092722113', 'Dexivant 60mg c/14 caps', '962.00', '0.00', '1.00', '1', 'activo'),
(61, '2022-02-01', '7501092722120', 'Dexivant 30mg. c/14 cpas.', '611.00', '0.00', '1.00', '1', 'activo'),
(62, '2021-08-01', '7501287613509', 'Detrusitol 2mg. c/14 tabs.', '571.95', '0.00', '1.00', '1', 'activo'),
(63, '2022-03-01', '7501314703616', 'Dimegan-D 5/20mg c/10 caps', '400.00', '0.00', '1.00', '1', 'activo'),
(64, '2022-04-01', '7501314703753', 'Dimegan 10mg c/10 caps', '300.00', '0.00', '1.00', '1', 'activo'),
(65, '2021-12-01', '7502216931893', 'Dolotandax 275/300mg c/12 tabs', '146.77', '0.00', '1.00', '1', 'activo'),
(66, '2022-03-01', '7501314703432', 'Excel 15mg c/10 caps', '600.00', '0.00', '1.00', '1', 'activo'),
(67, '2022-05-18', '7501300420220', 'Dorixina-flam 250/50mg c/14 tabs', '558.00', '0.00', '2.00', '1', 'activo'),
(68, '2021-09-01', '7501300408556', 'Dorixina Relax 125/5mg cpr', '743.00', '0.00', '2.00', '1', 'activo'),
(69, '2021-02-01', '7501314703418', 'Excel 7.5mg c/20 caps', '590.00', '0.00', '1.00', '1', 'activo'),
(70, '2022-12-01', '7501089808806', 'Donodol Compuesto 250/10 mg c/10 tabs', '412.00', '0.00', '1.00', '1', 'activo'),
(71, '2021-03-01', '7501390912902', 'Durox Pro 100/800 mg c/30 tabs', '424.00', '0.00', '1.00', '1', 'activo'),
(72, '2022-01-01', '7501101698453', 'Dorsal 15/200mg c/7 tabs', '800.00', '0.00', '1.00', '1', 'activo'),
(73, '2022-01-01', '7501300420237', 'Dorixina-TMR 125/25mg c/14 tabs', '651.00', '0.00', '1.00', '1', 'activo'),
(74, '2021-08-01', '7501008497623', 'Elevit c/30 cpr', '394.97', '0.00', '1.00', '1', 'activo'),
(75, '2022-05-01', '7501300409805', 'Enaladil 10mg c/10cmpr', '266.00', '0.00', '1.00', '1', 'activo'),
(76, '2021-06-01', '7501064550379', 'Eskaflam tabs 100 mg c/10', '323.24', '0.00', '1.00', '1', 'activo'),
(77, '2021-08-01', '8027950210480', 'Elicuis tabs 2.5 mg c/20', '949.09', '0.00', '1.00', '1', 'activo'),
(78, '2022-04-01', '7501057002120', 'Epamin caps 100 mg c/50', '412.30', '0.00', '1.00', '1', 'activo'),
(79, '2023-10-23', '7501089809490', 'Eskapar capsulas 200 mg c/16 caps.', '160.00', '0.00', '1.00', '1', 'activo'),
(80, '2023-09-23', '7501089809506', 'Eskapar 400 mg caja c/16 caps.', '219.00', '0.00', '1.00', '1', 'activo'),
(81, '2022-06-23', '7501314705313', 'Afungil  150 mg caja c/1 caps.', '90.00', '0.00', '1.00', '1', 'activo'),
(82, '2021-09-23', '7501165011632', 'Buscapina compositum 10mg/250mg c/20 tabs.', '457.00', '0.00', '2.00', '1', 'activo'),
(83, '2022-01-23', '7501008448243', 'Eternal Vitamina E frasco c/99 caps.', '332.00', '0.00', '1.00', '1', 'activo'),
(84, '2022-06-23', '7501298234601', 'Eutirox 100 mcg caja c/50 tabs.', '477.68', '0.00', '1.00', '1', 'activo'),
(85, '2023-11-23', '7502209291331', 'Evastel 20mg. caja c/10 obleas.', '564.06', '0.00', '1.00', '1', 'activo'),
(86, '2025-06-01', '7501300407047', 'Febrax 275mg/300mg caja c/15 tabs.', '270.00', '0.00', '1.00', '1', 'activo'),
(87, '2021-10-23', '7501089809445', 'Eskapar compuesto 200mg/600mg caja c/20 caps.', '244.00', '0.00', '1.00', '1', 'activo'),
(88, '2023-02-23', '7501122963028', 'Espaven enzimatico caja c/50 tabs.', '291.18', '0.00', '1.00', '1', 'activo'),
(89, '2021-06-23', '7501124815844', 'Exforgehct 5mg/160mg/12.5mg caja c/14 comprimidos.', '858.00', '0.00', '1.00', '1', 'activo'),
(90, '2021-03-23', '7501287612014', 'Factive-5 320mg. caja c/5 tabs.', '1028.48', '0.00', '1.00', '1', 'activo'),
(91, '2021-05-01', '7501088504808', 'Fabroven 150mg/150mg/100mg caja c/30 caps.', '765.00', '0.00', '1.00', '1', 'activo'),
(92, '2021-09-01', '7501298222424', 'Giabri 100mg. caja c/30 tabs.', '954.90', '0.00', '1.00', '1', 'activo'),
(93, '2021-12-01', '7501871720620', 'Geslutin 200mg. caja c/15 caps.', '785.39', '0.00', '1.00', '1', 'activo'),
(94, '2022-02-01', '7501299307472', 'Garbican  75mg. caja c/28 tabs.', '779.00', '0.00', '1.00', '1', 'activo'),
(95, '2022-04-01', '7501125108686', 'Flucoxan 100mg. caja c/10 caps.', '1623.00', '0.00', '1.00', '1', 'activo'),
(96, '2021-11-01', '7501299307489', 'Garbican 150mg caja c/28 caps.', '779.00', '0.00', '1.00', '1', 'activo'),
(97, '2022-01-01', '8020030054080', 'Flonorm 550mg. caja c/14 tabs.', '1358.00', '0.00', '1.00', '1', 'activo'),
(98, '2021-03-01', '7501298242101', 'Floratil 200mg. c/6 caps.', '159.62', '0.00', '1.00', '1', 'activo'),
(99, '2022-11-01', '8020030053090', 'Flonorm 200mg. caja c/12 tabs.', '331.00', '0.00', '1.00', '1', 'activo'),
(100, '2021-07-01', '7501314705634', 'Flucogel tabs. 75mg.', '650.00', '0.00', '1.00', '1', 'activo'),
(101, '2022-01-01', '7501125101069', 'Ficonax 1g. caja c/30 tabs.', '280.00', '0.00', '1.00', '1', 'activo'),
(102, '2022-06-01', '7501092743033', 'Ferranina fol. 100mg/800mcg caja c/30 tabs.', '535.00', '0.00', '1.00', '1', 'activo'),
(103, '0022-03-01', '7501123014101', 'Firac plus 125mg, 10mg caja c/20 tabs.', '359.47', '0.00', '1.00', '1', 'activo'),
(104, '0021-10-01', '7501092772415', 'Ferranina complex caja c/30 tabs.', '538.00', '0.00', '1.00', '1', 'activo'),
(105, '2021-07-01', '7502209850859', 'Indocid 25mg. caja c/60 caps.', '345.76', '0.00', '1.00', '1', 'activo'),
(106, '2021-06-01', '7501092722151', 'Incresina P 25mg/15mg caja c/28 tabs.', '1148.00', '0.00', '1.00', '1', 'activo'),
(107, '2021-10-01', '7501142974172', 'Igef celecobix 200mg. caja c/10 caps.', '735.46', '0.00', '1.00', '1', 'activo'),
(108, '2021-11-01', '7501109901067', 'Imodium 2mg. caja c/12 tabs.', '166.49', '0.00', '1.00', '1', 'activo'),
(109, '2021-06-01', '7503007704573', 'Hidrasec 10mg caja c/18 sobres', '285.48', '0.00', '3.00', '1', 'activo'),
(110, '2021-10-01', '7503007704580', 'Hidrasec 30mg caja c/18 sobres', '314.62', '0.00', '2.00', '1', 'activo'),
(111, '2021-05-01', '7501168870502', 'Hiperikan caja c/ 40 tabs de 300mg.', '501.10', '0.00', '1.00', '1', 'activo'),
(112, '2022-02-01', '7503007704597', 'Hidrasec 100mg. caja c/9 caps.', '338.18', '0.00', '1.00', '1', 'activo'),
(113, '2022-01-01', '7501299330272', 'Glitacar 15mg. caja c/7 tabs', '273.00', '0.00', '1.00', '1', 'activo'),
(114, '2021-03-01', '7501299330296', 'Glitacar 30mg. caja c/7 atbs.', '490.00', '0.00', '1.00', '1', 'activo'),
(115, '2022-03-01', '7501101615856', 'Glimetal 2mg, 1000mg. caja c/16 tabs.', '645.00', '0.00', '1.00', '1', 'activo'),
(116, '2021-04-01', '7501101611148', 'Glimetal 2mg, 850mg caja c/30 tabs.', '969.00', '0.00', '1.00', '1', 'activo'),
(117, '2022-07-01', '7501314705153', 'Isox 100mg. capsulas c/15 caps.', '580.92', '0.00', '1.00', '1', 'activo'),
(118, '2022-07-01', '7501314705139', 'Isox 100mg. caja c/6 caps.', '420.00', '0.00', '1.00', '1', 'activo'),
(119, '2022-02-01', '7501385494192', 'Keral 25mg. caja c/10 tabs.', '483.00', '0.00', '1.00', '1', 'activo'),
(120, '2022-09-01', '7501088507670', 'Keppra 500mg. caja c/30 tabs.', '1550.00', '0.00', '1.00', '1', 'activo'),
(121, '2023-04-01', '7501089802958', 'Isorbid 5mg. caja c/40tabs.', '199.00', '0.00', '1.00', '1', 'activo'),
(122, '2022-07-01', '7501089802965', 'Isorbid 10mg. caja c/40 tabs.', '339.00', '0.00', '1.00', '1', 'activo'),
(123, '2021-12-01', '7501089803047', 'Isorbid AP 20mg. caja c/40 caps.', '602.00', '0.00', '1.00', '1', 'activo'),
(124, '2022-04-01', '7501299305751', 'Inhibitron 20mg/1100mg caja con envase c/30 caps.', '479.00', '0.00', '1.00', '1', 'activo'),
(125, '2022-06-01', '7501299307175', 'Inhibitron F 40mg. 7 caps.', '422.00', '0.00', '1.00', '1', 'activo'),
(126, '2021-06-01', '7501300407870', 'Liberdux 5mg caja c/28 tabs.', '588.00', '0.00', '1.00', '1', 'activo'),
(127, '2022-07-01', '7501300420800', 'Levigrix 5mg. caja c/30 tabs.', '592.00', '0.00', '1.00', '1', 'activo'),
(128, '2021-02-01', '7501390911219', 'Lactipan caja c/6 sobres de 1g c/u', '241.00', '0.00', '1.00', '1', 'activo'),
(129, '2021-02-01', '7501390911264', 'Lactipan caja c/12 sobres de 1g c/u', '241.00', '0.00', '1.00', '1', 'activo'),
(130, '2023-04-01', '7501165000179', 'Lasilacton 20mg/50mg caja c/16 caps.', '99999.99', '0.00', '1.00', '1', 'activo'),
(131, '2021-03-01', '7502216935235', 'Lopresor R 95mg caja con 1 frasco c/20 tabs.', '249.32', '0.00', '1.00', '1', 'activo'),
(132, '2022-06-01', '7501385494901', 'Lobbivon 5mg. caja c/14 comprimidos.', '602.00', '0.00', '1.00', '1', 'activo'),
(133, '2022-01-01', '7501299305386', 'Lodestar 50mg. caja c/30 tabs.', '660.00', '0.00', '1.00', '1', 'activo'),
(134, '2023-08-01', '7501092760016', 'Legalon 70mg. caja c/20 tabs.', '515.00', '0.00', '1.00', '1', 'activo'),
(135, '2022-06-01', '7501300420596', 'Luvik 2mg. caja c/15 comprimidos', '301.00', '0.00', '1.00', '1', 'activo'),
(136, '2022-10-01', '7501070903695', 'Libertrim SII 200/75 mg caja c/24 comp.', '581.95', '0.00', '1.00', '1', 'activo'),
(137, '2022-06-01', '7501124182885', 'Libertrim Alfa 200/75/45 mg caja c/32 comp.', '771.81', '0.00', '1.00', '1', 'activo'),
(138, '2022-02-01', '7501300408693', 'Loxonin 60 mg caja c/10 tabs', '351.00', '0.00', '1.00', '1', 'activo'),
(139, '2022-06-01', '7501390913848', 'Lunarium 100/300 mg ', '429.00', '0.00', '1.00', '1', 'activo'),
(140, '2021-08-22', '7501033958854', 'Luvox 100 mg caja c/15 tabletas', '1008.80', '0.00', '1.00', '1', 'activo'),
(141, '2022-05-23', '7501088504365', 'Meteospasmyl', '1004.00', '0.00', '1.00', '1', 'activo'),
(142, '2022-08-01', '7501101612282', 'Malival AP 50 mg caja c/28 caps.', '753.00', '0.00', '1.00', '1', 'activo'),
(143, '2022-03-29', '7503000883527', 'Lysteda 650 mg caja c/30 tabletas', '977.00', '0.00', '1.00', '1', 'activo'),
(144, '2022-03-01', '7501101606236', 'Malival Compuesto 25mg,215mg caja c/32 caps.', '824.00', '0.00', '1.00', '1', 'activo'),
(145, '2022-05-08', '7613326005678', 'Madopar 100mg,25mg caja c/30 tabs.', '485.00', '0.00', '1.00', '1', 'activo'),
(146, '2021-12-01', '7501287670304', 'Lyrica 75mg. caja c/14 caps.', '673.59', '0.00', '1.00', '1', 'activo'),
(147, '2023-02-01', '7501165000230', 'Neo-Melubrina 500mg caja c/10 tabs.', '91.98', '0.00', '1.00', '1', 'activo'),
(148, '2022-09-01', '7501287627650', 'Motrin 800mg. caja c/10 tabs.', '183.73', '0.00', '1.00', '1', 'activo'),
(149, '2021-06-01', '7501037920161', 'Micardis Duo 40mg/5mg caja c/28 tabs.', '1414.24', '0.00', '1.00', '1', 'activo'),
(150, '2022-04-01', '7501287627513', 'Motrin 400mg. frasco c/45 tabs.', '483.15', '0.00', '1.00', '1', 'activo'),
(151, '2021-10-01', '7502235760214', 'Mileva 35 2.000mg/0.035mg caja c/21 comprimidos.', '446.86', '0.00', '1.00', '1', 'activo'),
(152, '2021-12-09', '7501300420732', 'Mistan caja c/7tabs de 120mg.', '701.00', '0.00', '1.00', '1', 'activo'),
(153, '2021-04-15', '7501300420718', 'Mistan caja c/14 tabs de 90mg.', '711.00', '0.00', '1.00', '1', 'activo'),
(154, '2021-08-15', '7501089810540', 'Noblod FIN caja c/4 tubos de 5ml.', '269.83', '0.00', '1.00', '1', 'activo'),
(155, '2023-02-01', '7501298269009', 'Novotiral 100mcg/20mcg caja c/50 tabs.', '462.34', '0.00', '1.00', '1', 'activo'),
(156, '2022-04-01', '7501168890142', 'NeoLaikan 500mg. caja c/30 tabs.', '391.10', '0.00', '1.00', '1', 'activo'),
(157, '2022-07-01', '7501165011434', 'Mucoangin 20mg caja c/18 pastillas.', '148.62', '0.00', '1.00', '1', 'activo'),
(158, '2021-05-01', '7501125135460', 'Onemer SL 30mgcaja c/6 tabs.', '112.00', '0.00', '1.00', '1', 'activo'),
(159, '2021-04-01', '7502209852792', 'Novial caja c/21 tabs. (7 amarillas, 7 rojas, 7 blancas).', '498.21', '0.00', '1.00', '1', 'activo'),
(160, '2021-11-01', '7501070636517', 'Omuro 40mg. caja c/15 tabs.', '515.00', '0.00', '1.00', '1', 'activo'),
(161, '2022-06-01', '7501086301041', 'Oxal 150mg, 200mg. caja c/2 tabs.', '158.00', '0.00', '2.00', '1', 'activo'),
(162, '2022-05-01', '7501299307380', 'ParaMix 500mg. caja c/6 grageas.', '373.00', '0.00', '1.00', '1', 'activo'),
(163, '2021-11-01', '763948315574', 'Opearls contenido c/30 caps.', '413.90', '0.00', '1.00', '1', 'activo'),
(164, '2023-04-15', '7501165011786', 'Pharmaton caja c/30 caps.', '310.75', '0.00', '2.00', '1', 'activo'),
(165, '2021-08-01', '7501092785019', 'Pantozol 40mg. caja c/7 tabs.', '505.00', '0.00', '1.00', '1', 'activo'),
(166, '0021-11-01', '7501092777380', 'Pantozol 20mg. caja c/14 tabs.', '536.00', '0.00', '1.00', '1', 'activo'),
(167, '2023-01-01', '7501088504815', 'Permixon 160mg. caja c/60 caps.', '1190.00', '0.00', '1.00', '1', 'activo'),
(168, '2022-11-01', '7501088504822', 'Permixon 160mg. caja c/30 tabs.', '736.00', '0.00', '1.00', '1', 'activo'),
(169, '2020-10-31', '7501168860824', 'Plantival 160mg/80mg caja c/40 tabs.', '397.10', '0.00', '1.00', '1', 'activo'),
(170, '2022-09-01', '7501328978994', 'Plavix 75mg. caja c/14 tabs.', '1084.65', '0.00', '2.00', '1', 'activo'),
(171, '2022-06-01', '7501299303467', 'Prazolan 40mg. caja c/7 tabs.', '400.00', '0.00', '2.00', '1', 'activo'),
(172, '2023-07-01', '7501300408204', 'Plidán 10/125mg. caja c/20 comprimidos.', '465.00', '0.00', '1.00', '1', 'activo'),
(173, '2022-03-01', '7841141003801', 'Prikul 75mg. caja c/14 caps.', '641.61', '0.00', '1.00', '1', 'activo'),
(174, '2022-04-01', '7841141004303', 'Prikul 50mg. caja c/28 caps.', '800.78', '0.00', '1.00', '1', 'activo'),
(175, '2022-09-01', '7501303451603', 'Progyluton caja c/21 tabs.', '677.00', '0.00', '2.00', '1', 'activo'),
(176, '2022-06-01', '7501249602022', 'Previta mom caja c/30 caps.', '300.00', '0.00', '1.00', '1', 'activo'),
(177, '2022-03-01', '7501168870625', 'Prosgutt 160mg/120mg caja c/40 caps.', '843.80', '0.00', '1.00', '1', 'activo'),
(178, '2022-01-01', '7501086315024', 'Proteflor 20 caps.', '393.10', '0.00', '1.00', '1', 'activo'),
(179, '2022-10-01', '300090286200', 'Provera 5mg. caja c/24 tabs.', '451.62', '0.00', '1.00', '1', 'activo'),
(180, '2021-07-01', '7501299302811', 'Pulsar AT 40 mg caja c/30 tabletas', '1189.00', '0.00', '1.00', '1', 'activo'),
(181, '2022-05-01', '7502235760139', 'Regenesis MAX 29.51g.', '411.97', '0.00', '1.00', '1', 'activo'),
(182, '2022-07-31', '7502213144012', 'Rofucal 25mg. caja c/30 tabs.', '319.81', '0.00', '1.00', '1', 'activo'),
(183, '2022-04-01', '7501124180201', 'Repafet 10mg. caja c/20 tabs.', '808.70', '0.00', '1.00', '1', 'activo'),
(184, '2022-02-01', '008400000491', 'Ribotripsin c/25 grageas.', '323.26', '0.00', '1.00', '1', 'activo'),
(185, '2022-02-01', '7501299308073', 'Sensibit XP caja c/20 tabs.', '330.00', '0.00', '1.00', '1', 'activo'),
(186, '2021-03-01', '7501299330074', 'Sensibit 10mg. caja c/10 tabs.', '213.00', '0.00', '1.00', '1', 'activo'),
(187, '2024-05-01', '7501299300367', 'Sensibit 10mg. caja c/10 tabs.', '208.00', '0.00', '1.00', '1', 'activo'),
(188, '2022-10-01', '7501299307236', 'Sensibit D nf caja c/12 tabs', '63.00', '0.00', '1.00', '1', 'activo'),
(189, '2021-03-01', '7501299307823', 'SensiDex 5 mg caja c/30 tabs', '552.00', '0.00', '1.00', '1', 'activo'),
(190, '2022-02-01', '7501109901609', 'Risperdal 1mg. caja c/20 tabs.', '842.64', '0.00', '1.00', '1', 'activo'),
(191, '2021-05-01', '7501300420077', 'RovartalNF 10mg. caja c/30 comprimidos.', '753.00', '0.00', '1.00', '1', 'activo'),
(192, '2021-11-01', '7501033957871', 'Serc 24mg. caja c/30 tabs.', '988.00', '0.00', '1.00', '1', 'activo'),
(193, '2021-10-01', '7501250829876', 'Sinergix 25mg-10mg caja c/4 tabs.', '488.00', '0.00', '1.00', '1', 'activo'),
(194, '2021-11-01', '7501300407924', 'Sensemoc 600mg. caja c/20 tabs.', '363.00', '0.00', '1.00', '1', 'activo'),
(195, '2022-08-01', '7501299307694', 'Seltaferon 75mg. caja c/10 caps.', '518.00', '0.00', '1.00', '1', 'activo'),
(196, '2023-04-01', '7501098608398', 'Seroquel 25mg. caja c/30 tabs.', '647.00', '0.00', '1.00', '1', 'activo'),
(197, '2021-10-01', '7501314703227', 'Sies 200mg. caja c/20 caps.', '480.00', '0.00', '1.00', '1', 'activo'),
(198, '2021-10-01', '7506317100653', 'Skudexa 75mg/25mg caja c/10 tabs.', '486.00', '0.00', '1.00', '1', 'activo'),
(199, '2022-05-01', '7501314704927', 'Spasmopriv 200mg. caja c/12 caps.', '330.00', '0.00', '1.00', '1', 'activo'),
(200, '2023-05-01', '7501258200080', 'Soyaloid caja c/1 sobre con 90g.', '213.66', '0.00', '1.00', '1', 'activo'),
(201, '2021-08-01', '7501300420398', 'Sig 2.5mg. caja c/30 comprimidos.', '545.00', '0.00', '1.00', '1', 'activo'),
(202, '2023-04-01', '7501299306130', 'SupraDOL 30mg. caja c/4 tabs.', '142.00', '0.00', '1.00', '1', 'activo'),
(203, '2021-06-01', '7501122967019', 'Supra 4mg. caja c/30 tabs.', '380.58', '0.00', '1.00', '1', 'activo'),
(204, '2021-12-01', '7501070635756', 'Stadium 25mg. caja c/10 tabs. ', '509.00', '0.00', '1.00', '1', 'activo'),
(205, '2021-09-01', '7501109900299', 'Sporanox 15D 100mg. caja c/15 caps.', '995.00', '0.00', '1.00', '1', 'activo'),
(206, '2021-11-01', '7501070635787', 'Stadium 75mg/25mg. caja c/10 tabs.', '552.00', '0.00', '1.00', '1', 'activo'),
(207, '2023-06-01', '7501871720675', 'Tafirol 1g. caja c/20 tabs.', '388.05', '0.00', '3.00', '1', 'activo'),
(208, '2022-04-01', '7501871720668', 'Tafirol AC 500mg/50mg. caja c/15 tabs.', '357.77', '0.00', '2.00', '1', 'activo'),
(209, '2025-01-06', '7613326005906', 'Tamiflu 75mg. caja c/10 caps.', '920.00', '0.00', '2.00', '1', 'activo'),
(210, '2022-04-01', '7841141003528', 'Tafitram 325mg-37.5mg caja c/10 tabs.', '432.21', '0.00', '1.00', '1', 'activo'),
(211, '2022-01-01', '7501258200868', 'Talizer 100mg . caja c/50 tabs.', '1862.95', '0.00', '1.00', '1', 'activo'),
(212, '2021-06-01', '7501092777403', 'Tecta 20mg. caja c/14 tabs.', '522.00', '0.00', '1.00', '1', 'activo'),
(213, '2021-09-01', '7501092774839', 'Tecta 40mg. caja c/14 tabs.', '837.00', '0.00', '1.00', '1', 'activo'),
(214, '2023-04-01', '7501168890180', 'Tebonin forte 80mg. caja c/24 tabs.', '540.00', '0.00', '1.00', '1', 'activo'),
(215, '2023-06-01', '7501095452116', 'Tempra 500mg. caja c/10 tabs.', '54.02', '0.00', '2.00', '1', 'activo'),
(216, '2023-04-01', '7501095452505', 'Tempra forte 650mg. caja c/24 tabs.', '121.65', '0.00', '2.00', '1', 'activo'),
(217, '2022-05-01', '7501122963707', 'Espacil compuesto 125mg, 10mg caja c/20 caps.', '364.31', '0.00', '1.00', '1', 'activo'),
(218, '2021-03-01', '7501168870342', 'Tebonin OD 240mg. caja c/28 tabs.', '1149.00', '0.00', '1.00', '1', 'activo'),
(219, '2025-07-01', '7501287669001', 'Minipres 1mg. caja c/30 caps.', '221.04', '0.00', '1.00', '1', 'activo'),
(220, '2022-06-01', '7501109904341', 'Amoebriz 300mg/150mg caja c/2 tabs.', '357.19', '0.00', '2.00', '1', 'activo'),
(221, '2022-03-01', '7730979092883', 'Tim asf 25mg. caja c/30 tabs.', '637.12', '0.00', '1.00', '1', 'activo'),
(222, '2022-07-01', '7730979097192', 'Asoflon - duo 0.50mg/0.40mg caja c/30 caps.', '1198.20', '0.00', '1.00', '1', 'activo'),
(223, '2021-07-01', '7501094910570', 'Resalon 100mg. caja c/20 caps.', '177.69', '0.00', '1.00', '1', 'activo'),
(224, '2022-08-21', '7501033959929', 'ControLip- TriLipix 135mg. caja c/15 caps.', '748.80', '0.00', '1.00', '1', 'activo'),
(225, '2021-11-01', '7501299309643', 'Thoreva 80mg. caja c/30 tabs.', '700.00', '0.00', '1.00', '1', 'activo'),
(226, '2022-07-01', '7502235760122', 'Transvital 26.913g', '351.34', '0.00', '2.00', '1', 'activo'),
(227, '2021-04-01', '7502209290341', 'Tradol 50mg. caja c/10 caps.', '544.96', '0.00', '1.00', '1', 'activo'),
(228, '2022-01-01', '7501037925562', 'Trayenta 5mg. caja c/10 tabs.', '600.02', '0.00', '1.00', '1', 'activo'),
(229, '2022-09-01', '7501100089016', 'Tylex 750mg. caja c/20 tabs.', '252.20', '0.00', '1.00', '1', 'activo'),
(230, '2021-09-01', '7501165000391', 'Trental 400mg. caja c/30 tabs.', '769.00', '0.00', '1.00', '1', 'activo'),
(231, '2022-06-01', '7501092721215', 'Turazive 80mg. caja c/14 tabs.', '472.00', '0.00', '1.00', '1', 'activo'),
(232, '2023-08-03', '7501165011830', 'Pharmaton caja c/100caps.', '583.93', '0.00', '2.00', '1', 'activo'),
(233, '2022-04-01', '7501314704828', 'Uslen PCS 40mg. caja c/14 caps.', '470.00', '0.00', '1.00', '1', 'activo'),
(234, '2021-09-01', '7501314704750', 'Unamol 5mg. caja c/30 comprimidos', '275.00', '0.00', '1.00', '1', 'activo'),
(235, '2021-09-01', '7501314704712', 'Unamol 10mg. caja c/30 comprimidos', '445.00', '0.00', '1.00', '1', 'activo'),
(236, '2022-01-01', '7501287670014', 'Norvas 5mg. caja c/10 tabs.', '464.22', '0.00', '1.00', '1', 'activo'),
(237, '2022-09-01', '7501299305706', 'Raas 80mg. caja c/30 tabs.', '813.00', '0.00', '1.00', '1', 'activo'),
(238, '2022-09-01', '7501314704040', 'Unival 1g. caja c/40 tabs.', '370.00', '0.00', '1.00', '1', 'activo'),
(239, '2021-11-01', '7502216797475', 'Urotrol 2mg. caja c/14 tabs.', '590.00', '0.00', '1.00', '1', 'activo'),
(240, '2022-12-01', '7502209290082', 'Uro-Vaxom 6mg. caja c/15 caps.', '882.48', '0.00', '1.00', '1', 'activo'),
(241, '2021-04-01', '7501168890159', 'Vitanco 200mg. caja c/30 tabs.', '354.90', '0.00', '1.00', '1', 'activo'),
(242, '2022-05-01', '7501123019717', 'Unifertol 36mg, 0.800mg. caja c/30 caps.', '489.87', '0.00', '1.00', '1', 'activo');

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
(0, 82, 1, 1),
(0, 78, 1, 2),
(0, 69, 1, 3),
(0, 69, 1, 4),
(0, 141, 1, 5),
(0, 12, 1, 6),
(0, 210, 1, 8),
(0, 150, 1, 9),
(0, 154, 1, 10),
(0, 149, 1, 11),
(0, 219, 1, 11),
(0, 150, 1, 11),
(0, 148, 1, 11),
(0, 154, 1, 12),
(0, 6, 1, 16),
(0, 6, 1, 29),
(0, 7, 1, 31),
(0, 8, 1, 32);

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
(1, 'Arcelia', 'Cobos Loyo', 'Arcelia', 'farmaciaarce', 'farmacia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fecha` date NOT NULL,
  `total` decimal(7,2) DEFAULT NULL,
  `cama` varchar(50) NOT NULL,
  `tipo_pago` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `fecha`, `total`, `cama`, `tipo_pago`) VALUES
(1, '2020-12-23', '457.00', '1', 'pendiente'),
(2, '2020-12-23', '412.30', '1', 'pendiente'),
(3, '2020-12-23', '472.00', '0', 'Efectivo'),
(4, '2020-12-23', '472.00', '0', 'Efectivo'),
(5, '2020-12-23', '1004.00', '2', 'pendiente'),
(6, '2020-12-24', '528.00', '0', 'Efectivo'),
(7, '2020-12-24', '0.00', '0', 'pendiente'),
(8, '2020-12-24', '345.77', '0', 'Efectivo'),
(9, '2020-12-24', '386.52', '0', 'Efectivo'),
(10, '2020-12-24', '215.86', '0', 'Efectivo'),
(11, '2020-12-24', '2302.16', '3', 'pendiente'),
(12, '2020-12-24', '269.83', '3', 'pendiente'),
(13, '2020-12-30', '0.00', '4', 'pendiente'),
(14, '2020-12-30', '0.00', '5', 'pendiente'),
(15, '2020-12-30', '0.00', '5', 'pendiente'),
(16, '2020-12-30', '525.60', '0', 'Efectivo'),
(17, '2020-12-30', '0.00', '5', 'pendiente'),
(18, '2020-12-30', '0.00', '5', 'pendiente'),
(19, '2020-12-30', '0.00', '5', 'pendiente'),
(20, '2020-12-30', '0.00', '5', 'pendiente'),
(21, '2020-12-30', '0.00', '5', 'pendiente'),
(22, '2020-12-30', '0.00', '5', 'pendiente'),
(23, '2020-12-30', '0.00', '5', 'pendiente'),
(24, '2020-12-30', '0.00', '5', 'pendiente'),
(25, '2020-12-30', '0.00', '5', 'pendiente'),
(26, '2020-12-30', '0.00', '5', 'pendiente'),
(27, '2020-12-30', '0.00', '5', 'pendiente'),
(28, '2020-12-30', '0.00', '5', 'pendiente'),
(29, '2020-12-30', '525.60', '0', 'Tarjeta'),
(30, '2020-12-30', '0.00', '5', 'pendiente'),
(31, '2020-12-30', '222.00', '0', 'Efectivo'),
(32, '2020-12-30', '222.16', '0', 'Tarjeta');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `gastos`
--
ALTER TABLE `gastos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`id_paciente`);

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
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `id_paciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=243;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

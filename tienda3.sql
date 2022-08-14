-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-08-2022 a las 20:10:27
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda3`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `micas9d`
--

CREATE TABLE `micas9d` (
  `id_mica9d` int(11) NOT NULL,
  `marca` varchar(40) NOT NULL,
  `cantidad` varchar(40) NOT NULL,
  `ancho` double NOT NULL,
  `largo` double NOT NULL,
  `posicion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `micas9d`
--

INSERT INTO `micas9d` (`id_mica9d`, `marca`, `cantidad`, `ancho`, `largo`, `posicion`) VALUES
(1, 'Iphone', '10', 6.5, 13.5, 34),
(2, 'Iphone', '5', 7.8, 15.6, 34),
(3, 'Iphone', '9', 6.3, 11.6, 35),
(4, 'Iphone', '9', 5.7, 10.35, 39),
(5, 'Iphone', '9', 6.8, 11.6, 40),
(7, 'Iphone', '7', 6.2, 13.5, 41),
(9, 'Iphone', '8', 6.8, 14.35, 42),
(10, 'Iphone', '6', 6.5, 14, 42),
(11, 'Iphone', '5', 5.8, 12.5, 43),
(12, 'Iphone', '5', 6.5, 14.05, 43),
(13, 'Samsung', '11', 6.65, 13.65, 44),
(14, 'Samsung', '18', 6.7, 14.95, 45),
(15, 'Samsung', '10', 6.75, 15.5, 46),
(16, 'Samsung', '10', 6.8, 14.6, 47),
(17, 'Samsung', '5', 6.1, 13.45, 48),
(18, 'Samsung', '4', 5.8, 12, 48),
(19, 'Samsung', '5', 6.65, 14.4, 49),
(20, 'Samsung', '5', 6.3, 14.8, 50),
(21, 'Samsung', '5', 15.3, 6.75, 50),
(22, 'Samsung', '5', 6.8, 15.7, 51),
(23, 'Samsung', '2', 6.9, 15.35, 51),
(24, 'Samsung', '5', 6.55, 14.7, 52),
(25, 'Samsung', '5', 6.7, 15.4, 52),
(26, 'Samsung', '3', 6.7, 15.35, 53),
(27, 'Samsung', '3', 6.6, 14.8, 53),
(28, 'Motorola', '10', 6.8, 14.3, 54),
(29, 'Motorola', '5', 6.4, 13.95, 64),
(30, 'Motorola', '5', 6.7, 15.3, 55),
(31, 'Motorola', '5', 6.8, 14.8, 55),
(32, 'Motorola', '5', 6.8, 14.5, 56),
(33, 'Motorola', '5', 6.75, 14.7, 56),
(34, 'Motorola', '10', 6.1, 12.3, 57),
(35, 'Motorola', '5', 6.7, 14.2, 58),
(36, 'Motorola', '5', 6.2, 13, 58),
(37, 'Motorola', '12', 6.71, 15.45, 63),
(38, 'Motorola', '2', 6.1, 12.2, 59),
(39, 'Motorola', '5', 6.15, 12.45, 59),
(40, 'Motorola', '20', 6.8, 15.09, 60),
(41, 'Motorola', '10', 6.9, 15.7, 61),
(42, 'Motorola', '5', 6.8, 15.3, 62),
(43, 'Motorola', '5', 7.1, 15.7, 62),
(44, 'Motorola', '2', 6.85, 13.75, 64),
(45, 'Motorola', '5', 7.1, 15.7, 65),
(46, 'Motorola', '5', 6.9, 15.25, 65),
(47, 'Huawei', '10', 7, 15.2, 66),
(48, 'Huawei', '2', 6.5, 14.3, 67),
(49, 'Huawei', '2', 6.5, 14.3, 67),
(50, 'Huawei', '2', 6.5, 14.3, 67),
(51, 'Huawei', '2', 6.3, 13.35, 67),
(52, 'Huawei', '2', 6.75, 14.3, 67),
(55, 'Samsung', '4', 6.79, 15, 50),
(56, 'Samsung', '4', 6.5, 14.2, 50),
(57, 'Samsung', '3', 6.7, 14.95, 52),
(58, 'Motorola', '5', 6.6, 14.8, 57),
(60, 'Huawei', '2', 7, 15.1, 68),
(61, 'Huawei', '2', 6.9, 15.3, 68),
(62, 'Huawei', '2', 6.49, 14, 68),
(63, 'Huawei', '4', 6.8, 15.1, 68),
(64, 'Huawei', '4', 6.8, 14.7, 68),
(65, 'VIVO', '5', 6.7, 14.9, 69),
(66, 'Huawei', '2', 6.25, 12.4, 70),
(67, 'Huawei', '2', 6.3, 13.3, 70),
(68, 'Xiaomi', '2', 6.6, 15.1, 71),
(69, 'Xiaomi', '2', 6.7, 15.1, 71),
(70, 'Xiaomi', '2', 6.1, 14.1, 71),
(71, 'Xiaomi', '2', 6.6, 15.1, 72),
(72, 'Xiaomi', '1', 6.8, 15.65, 72),
(73, 'Xiaomi', '2', 6.7, 15.1, 72),
(74, 'Xiaomi', '6', 6.8, 15.4, 72),
(75, 'Huawei', '8', 6.7, 15.4, 73),
(76, 'Xiaomi', '1', 6.7, 14.8, 73),
(77, 'Xiaomi', '10', 6.8, 15.6, 74),
(78, 'OPPO', '5', 6.79, 15.05, 75),
(79, 'OPPO', '14', 6.74, 15.05, 75),
(80, 'OPPO', '2', 6.75, 15.05, 76),
(81, 'OPPO', '3', 6.5, 15, 76),
(82, 'Xiaomi', '11', 6.7, 15.1, 77),
(83, 'Xiaomi', '10', 6.5, 14.7, 78),
(84, 'Iphone', '6', 6.6, 14.8, 64),
(85, 'Motorola', '5', 6.7, 14.4, 54),
(86, 'Motorola', '5', 6.7, 13.4, 56),
(87, 'Huawei', '5', 6.25, 12.75, 70),
(88, 'Samsung', '10', 6.8, 15.2, 47);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `micas9h`
--

CREATE TABLE `micas9h` (
  `id_mica9h` int(11) NOT NULL,
  `marca` varchar(30) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `ancho` double NOT NULL,
  `largo` double NOT NULL,
  `camara` varchar(30) NOT NULL,
  `posicion` int(11) NOT NULL,
  `boton` varchar(2) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `micas9h`
--

INSERT INTO `micas9h` (`id_mica9h`, `marca`, `cantidad`, `ancho`, `largo`, `camara`, `posicion`, `boton`) VALUES
(1, 'Samsung', 2, 6.4, 13.9, 'orilla', 88, 'no'),
(2, 'Samsung', 14, 6.85, 15.5, 'mitad', 84, 'no'),
(3, 'Samsung', 1, 6.45, 14.4, 'mitad', 85, 'no'),
(4, 'Samsung', 1, 6.9, 15.9, 'mitad', 85, 'no'),
(5, 'Samsung', 8, 6.7, 15.15, 'mitad', 85, 'no'),
(7, 'Samsung', 19, 6.8, 15.2, 'mitad', 86, 'no'),
(8, 'Samsung', 2, 6.85, 14.6, 'orilla', 87, 'no'),
(9, 'Samsung', 2, 6.8, 14.2, 'orilla', 87, 'si'),
(10, 'Samsung', 2, 5.9, 13.7, 'mitad', 87, 'no'),
(11, 'Samsung', 2, 6.3, 13.25, 'orilla', 87, 'no'),
(12, 'Samsung', 9, 6.6, 14.7, 'mitad', 87, 'no'),
(13, 'Samsung', 2, 6.9, 15.6, 'completa', 88, 'no'),
(14, 'Samsung', 2, 6.8, 15.3, 'completa', 88, 'no'),
(15, 'Samsung', 2, 6.4, 13.9, 'orilla', 88, 'no'),
(16, 'Samsung', 3, 6.9, 13.45, 'orilla', 89, 'si'),
(17, 'Samsung', 2, 6.7, 13.9, 'orilla', 89, 'si'),
(18, 'Samsung', 2, 6.7, 14.4, 'orilla', 89, 'si'),
(19, 'Samsung', 6, 5.9, 13.2, 'completa', 90, 'no'),
(20, 'Samsung', 1, 6.9, 15.7, 'completa', 90, 'no'),
(21, 'Samsung', 2, 6.9, 15.4, 'completa', 90, 'no'),
(22, 'Samsung', 2, 6.9, 15.4, 'completa', 89, 'no'),
(23, 'Samsung', 2, 6.85, 15.3, 'completa', 89, 'no'),
(25, 'Samsung', 1, 7.3, 14.15, 'orilla', 8, 'si'),
(26, 'Samsung', 5, 6.6, 14.7, 'orilla', 8, 'no'),
(27, 'Motorola', 1, 6.75, 16.05, 'completa', 9, 'no'),
(28, 'Motorola', 2, 7, 16.2, 'completa', 9, 'no'),
(29, 'Motorola', 1, 6.85, 14.9, 'mitad', 9, 'no'),
(30, 'Motorola', 2, 6.95, 15.6, 'completa', 92, 'no'),
(31, 'Motorola', 2, 7.05, 16.9, 'completa', 9, 'no'),
(32, 'Motorola', 5, 6.9, 15.8, 'mitad', 9, 'no'),
(33, 'Motorola', 21, 6.85, 15.3, 'mitad', 10, 'no'),
(34, 'Motorola', 5, 6.85, 15.4, 'completa', 10, 'no'),
(35, 'Motorola', 4, 6.3, 14.2, 'orilla', 91, 'no'),
(36, 'Motorola', 2, 7, 15.9, 'mitad', 92, 'no'),
(37, 'Motorola', 2, 6.5, 14.6, 'mitad', 92, 'no'),
(38, 'Motorola', 1, 6.7, 15.35, 'completa', 92, 'no'),
(39, 'Motorola', 4, 6.9, 15.4, 'completa', 92, 'no'),
(40, 'Universal', 8, 6.9, 13.25, 'orilla', 94, 'no'),
(41, 'Universal', 9, 7.2, 13.75, 'mitad', 94, 'no'),
(42, 'Universal', 9, 6.9, 14.6, 'orilla', 94, 'no'),
(43, 'Universal', 10, 7.7, 14.5, 'orilla', 94, 'no'),
(44, 'Motorola', 5, 7, 16.2, 'completa', 93, 'no'),
(45, 'Motorola', 5, 7.1, 16.6, 'completa', 93, 'no'),
(46, 'Motorola', 3, 6.6, 14.2, 'orilla', 93, 'no'),
(47, 'Universal', 11, 6.7, 12.8, 'orilla', 95, 'no'),
(48, 'Universal', 9, 5.75, 11.4, 'orilla', 95, 'no'),
(49, 'Motorola', 10, 6.35, 12.5, 'orilla', 95, 'no'),
(50, 'Motorola', 10, 6.1, 11.5, 'orilla', 95, 'no'),
(51, 'Motorola', 5, 5.5, 11.5, 'orilla', 95, 'no'),
(52, 'OPPO', 2, 6.8, 14.9, 'mitad', 96, 'no'),
(53, 'OPPO', 2, 6.7, 15.05, 'completa', 96, 'no'),
(54, 'OPPO', 2, 6.8, 15.55, 'mitad', 96, 'no'),
(55, 'OPPO', 2, 6.7, 15.2, 'completa', 96, 'no'),
(56, 'OPPO', 2, 6.6, 15, 'completa', 96, 'no'),
(57, 'OPPO', 2, 6.9, 15.7, 'mitad', 96, 'no'),
(58, 'ZTE', 2, 7, 16.4, 'mitad', 97, 'no'),
(59, 'ZTE', 2, 6.2, 14, 'orilla', 97, 'no'),
(60, 'ZTE', 2, 6.75, 14.6, 'orilla', 97, 'no'),
(61, 'ZTE', 9, 6.2, 13.2, 'orilla', 97, 'no'),
(62, 'ZTE', 2, 7.25, 15.4, 'orilla', 97, 'no'),
(63, 'ZTE', 2, 6.8, 15.05, 'mitad', 97, 'no'),
(64, 'Alcatel', 3, 7.7, 15.85, 'mitad', 98, 'no'),
(65, 'Alcatel', 3, 7.1, 15.6, 'orilla', 98, 'no'),
(66, 'Alcatel', 3, 7, 14, 'orilla', 98, 'si'),
(67, 'Alcatel', 3, 6.75, 15.1, 'mitad', 98, 'no'),
(68, 'Alcatel', 3, 6, 11.7, 'orilla', 98, 'no'),
(69, 'Alcatel', 3, 6.3, 14, 'orilla', 98, 'no'),
(70, 'Alcatel', 3, 6.5, 14.7, 'orilla', 98, 'no'),
(71, 'Huawei', 16, 6.75, 15, 'mitad', 99, 'no'),
(72, 'Huawei', 15, 6.9, 15.6, 'completa', 99, 'no'),
(73, 'Huawei', 3, 6.4, 14.1, 'orilla', 100, 'no'),
(74, 'Huawei', 5, 6.4, 14.3, 'mitad', 100, 'no'),
(75, 'Huawei', 3, 7, 15.3, 'mitad', 100, 'no'),
(76, 'Huawei', 2, 6.9, 15.15, 'mitad', 100, 'no'),
(77, 'Huawei', 4, 6.85, 15.2, 'mitad', 100, 'no'),
(78, 'Huawei', 5, 6.5, 14.9, 'orilla', 101, 'no'),
(79, 'Huawei', 5, 6.7, 14.9, 'mitad', 101, 'no'),
(80, 'Huawei', 5, 6.6, 14.7, 'completa', 101, 'no'),
(81, 'Huawei', 5, 6.8, 15, 'completa', 101, 'no'),
(82, 'Huawei', 10, 6.7, 14.9, 'orilla', 101, 'no'),
(83, 'Xiaomi', 4, 7.1, 15, 'mitad', 102, 'no'),
(84, 'Xiaomi', 2, 7, 15.2, 'mitad', 102, 'no'),
(85, 'Xiaomi', 1, 6.7, 15.2, 'completa', 102, 'no'),
(86, 'Iphone', 9, 6.8, 15.3, 'completa', 102, 'no'),
(87, 'Xiaomi', 3, 15.4, 6.85, 'completa', 102, 'no'),
(88, 'Xiaomi', 4, 6.9, 15.6, 'completa', 102, 'no'),
(89, 'Xiaomi', 2, 6.9, 15.2, 'completa', 103, 'no'),
(90, 'Xiaomi', 1, 6.9, 15.4, 'completa', 103, 'no'),
(91, 'Xiaomi', 3, 7, 15.4, 'mitad', 103, 'no'),
(92, 'Xiaomi', 5, 6.8, 15.4, 'orilla', 103, 'no'),
(93, 'Xiaomi', 3, 6.85, 15.4, 'completa', 103, 'no'),
(94, 'Xiaomi', 4, 7, 15.2, 'mitad', 103, 'no'),
(95, 'Iphone', 11, 6.6, 14.2, 'orilla', 104, 'no'),
(96, 'Iphone', 3, 6.2, 13.5, 'orilla', 104, 'no'),
(97, 'Iphone', 2, 6.9, 15, 'orilla', 104, 'no'),
(98, 'Iphone', 3, 5.9, 12.95, 'completa', 104, 'si'),
(99, 'Iphone', 4, 6.9, 14.75, 'completa', 104, 'si'),
(100, 'Iphone', 10, 6.8, 14.3, 'orilla', 105, 'no'),
(101, 'Iphone', 5, 7.5, 15.78, 'orilla', 105, 'no'),
(102, 'Iphone', 4, 6.65, 14.2, 'completa', 105, 'no'),
(103, 'Iphone', 4, 7.31, 15.11, 'completa', 105, 'no'),
(104, 'Motorola', 5, 6.5, 14.4, 'orilla', 91, 'no'),
(105, 'Motorola', 5, 6.25, 14.2, 'orilla', 91, 'no'),
(106, 'Samsung', 5, 6.2, 12.3, 'orilla', 89, 'si'),
(107, 'Motorola', 5, 6.15, 14.9, 'mitad', 93, 'no'),
(108, 'Motorola', 5, 6.9, 14.9, 'mitad', 93, 'no');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelo_funda`
--

CREATE TABLE `modelo_funda` (
  `id_modelo` int(11) NOT NULL,
  `modelo` varchar(40) NOT NULL,
  `id_protector` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `modelo_funda`
--

INSERT INTO `modelo_funda` (`id_modelo`, `modelo`, `id_protector`) VALUES
(1, 'A10s', 1),
(6, 'A02s', 6),
(7, 'A03s', 6),
(8, 'A72', 8),
(9, 'A03', 9),
(10, 'A12', 10),
(11, 'A21s', 11),
(12, 'A20s', 12),
(13, 'A20', 13),
(14, 'A32 4G', 14),
(15, 'A50', 15),
(16, 'A50s', 15),
(17, 'A30s', 15),
(18, 'A22 4G', 16),
(19, 'A02', 17),
(20, 'A51 4G', 18),
(21, 'A52 5G', 19),
(22, 'A11', 20),
(23, 'M11', 20),
(24, 'A10', 21),
(25, 'A31', 22),
(26, 'A30', 23),
(27, 'S9 Plus', 24),
(28, 'S10 4G', 25),
(29, 'S9', 26),
(30, 'S8', 27),
(31, 'S10 Plus', 28),
(32, 'G8 plus', 29),
(33, 'G8 Play', 30),
(34, 'G20', 31),
(35, 'G10', 31),
(36, 'G30', 31),
(37, 'E7', 32),
(38, 'E7 Power', 33),
(39, 'G9 Power', 34),
(40, 'G9 Plus', 35),
(41, 'G100', 36),
(42, 'Edge S', 36),
(43, 'G9 Play', 37),
(44, 'G9', 37),
(45, 'E7 Plus', 37),
(46, 'Poco X3 Pro', 38),
(47, 'Redmi Note 9 Pro', 39),
(48, 'Redmi 9A', 40),
(49, 'Redmi 9C', 41),
(50, 'Y9 Prime 2019', 42),
(51, 'Y9 2019', 43),
(52, 'Y9A', 44),
(53, 'Y9s', 45),
(54, 'Y8s', 46),
(55, 'Y7 2019', 47),
(56, '8', 48),
(57, '7', 48),
(58, '6', 48),
(59, '8 Plus', 49),
(60, '6 Plus', 49),
(61, '7 Plus', 49),
(62, '5', 50),
(63, 'X', 51),
(64, 'XS', 51),
(65, 'XR', 52),
(66, 'XS Max', 53),
(67, '11', 54),
(68, '13 Pro Max', 55),
(69, '12 Pro Max', 56),
(70, '13 Pro', 57),
(71, '13', 57),
(72, '12', 58),
(73, '12 Pro', 58),
(74, 'Y6 2019', 59),
(76, 'A33 5G', 61),
(77, 'A53 ', 62),
(78, 'A94 AG', 63),
(79, 'A54 4G', 64),
(80, 'A15', 65),
(81, 'Nova Y60', 66),
(82, 'NOVA Y70', 67),
(83, 'P30 LITE', 68),
(84, 'NOVA 4E', 68),
(85, 'NOTE10', 69),
(86, 'NOTE9', 70),
(87, 'NOTE 10PRO', 71),
(88, 'NOTE10 PLUS ', 72),
(89, 'RENO6 5G', 73),
(90, 'RENO5 LITE', 74),
(91, 'RENO5 LITE', 75),
(92, 'POCO X3 GT', 76),
(93, 'A16', 77),
(94, 'A72', 78),
(95, 'A52', 79),
(96, 'L8', 80),
(97, 'L9', 80),
(98, 'BLADEA3 2020', 81),
(99, '13 MINI', 82),
(100, '12 MINI', 83),
(101, 'G22', 84),
(102, 'S8 Plus', 85),
(103, '11 Pro', 86),
(104, '11 Pro Max', 87),
(105, 'A03 Core', 88),
(106, 'A13 4G', 89),
(107, 'A13 5G', 90),
(108, 'E20', 91),
(109, 'E30', 91),
(110, 'E40', 91),
(111, 'G31', 92),
(112, 'G41', 92);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nombre`
--

CREATE TABLE `nombre` (
  `id_modelo` int(11) NOT NULL,
  `modelo` varchar(30) NOT NULL,
  `id_mica` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `nombre`
--

INSERT INTO `nombre` (`id_modelo`, `modelo`, `id_mica`) VALUES
(2, '12', 1),
(3, '12 Pro', 1),
(4, '12 Pro Max', 2),
(5, '7 Plus', 3),
(6, '8 Plus', 3),
(7, '7 ', 4),
(8, '8', 4),
(9, '6 Plus', 5),
(11, 'X', 7),
(12, 'XS', 7),
(13, '11 Pro', 7),
(15, 'XS Max', 9),
(16, '11 Pro Max', 9),
(17, 'XR', 10),
(18, '11', 10),
(19, '13 mini', 11),
(20, '13', 12),
(21, '13 Pro', 12),
(22, 'J4 Plus', 13),
(23, 'J6 Plus', 13),
(24, 'J4 Core', 13),
(25, 'A12', 14),
(26, 'A02s', 14),
(27, 'A02', 14),
(28, 'A03s', 14),
(29, 'A03', 14),
(30, 'A03 Core', 14),
(31, 'A13 5G', 14),
(32, 'A21', 15),
(33, 'A11', 16),
(34, 'A01', 17),
(35, 'A01 Core', 18),
(36, 'A10', 19),
(37, 'S21', 20),
(38, 'S21Plus', 21),
(39, 'A71', 22),
(40, 'A71 5G', 22),
(41, 'A72', 22),
(42, 'A72 5G', 22),
(43, 'F62', 22),
(44, 'A80', 23),
(45, 'A90', 23),
(46, 'A32 4G', 24),
(47, 'A22 4G', 24),
(48, 'A22 5G', 25),
(49, 'A70', 26),
(50, 'A70s', 26),
(51, 'A51', 27),
(52, 'A51 5G', 27),
(53, 'S20 FE', 27),
(54, 'A52', 27),
(55, 'A52 5G', 27),
(56, 'G8 Play', 28),
(57, 'E6s', 29),
(58, 'G8 Power Lite', 30),
(59, 'G8 Power', 31),
(60, 'G8 Plus', 32),
(61, 'One Zoom', 32),
(62, 'G8', 33),
(63, 'G Fast', 33),
(64, 'E6 Play', 34),
(65, 'G7 Power', 35),
(66, 'G7 Play', 36),
(67, 'G 5G Plus', 37),
(68, 'E5 Play Go', 38),
(69, 'E6', 39),
(70, 'G9', 40),
(71, 'G9 Play', 40),
(72, 'E7', 40),
(73, 'E7 Plus', 40),
(74, 'G40 Fusion', 41),
(75, 'G60', 41),
(76, 'G60s', 41),
(77, 'Edge 2021', 41),
(78, 'G200 5G', 41),
(79, 'G51 5G', 41),
(80, 'Edge S30', 41),
(81, 'Edge 20', 42),
(82, 'Edge 20 Pro', 42),
(83, 'G Stylus 2021', 43),
(84, 'G Stylus 5G', 43),
(85, 'G 5G', 37),
(86, 'One 5G', 37),
(87, 'Edge S', 37),
(88, 'One 5G Ace', 37),
(89, 'G100', 37),
(90, 'E5 Plus', 44),
(91, 'G7 Plus', 28),
(92, 'G7', 28),
(93, 'One Macro', 28),
(94, 'G9 Plus', 45),
(95, 'G9 Power', 46),
(96, 'Y9 Prime', 47),
(97, 'Y9s', 47),
(98, 'Nova 3', 48),
(99, 'Mate 20 Lite', 48),
(100, 'Nova 5T', 49),
(101, 'P Smart 2019', 50),
(102, 'P Smart 2020', 50),
(103, 'P20 Lite', 51),
(104, 'Y7 2019', 52),
(105, 'A53 5G', 55),
(106, 'A31', 56),
(107, 'A32 5G', 57),
(108, 'G31', 58),
(109, 'G41', 58),
(110, 'G71 5G', 58),
(112, 'Nova 9 SE', 60),
(113, 'Nova 8i', 61),
(114, 'P30 Lite', 62),
(115, 'Nova Y60', 63),
(116, 'Y7p', 64),
(117, 'P40 Lite', 64),
(118, 'Nova 5i', 64),
(119, 'P20 Lite 2019', 64),
(120, 'Y11s', 65),
(121, 'Y15s', 65),
(122, 'Y20', 65),
(123, 'Y21', 65),
(124, 'Y21 T', 65),
(125, 'Y32', 65),
(126, 'Y33', 65),
(127, 'Y33s', 65),
(128, 'Y53s', 65),
(129, 'Y54s', 65),
(130, 'Y55s', 65),
(131, 'Y55s 5G', 65),
(132, 'Y74s', 65),
(133, 'Y76s', 65),
(134, 'Y5 2018', 66),
(135, 'Y5 2019', 67),
(136, 'Redmi Note 9', 68),
(137, 'Redmi Note 9T', 68),
(138, 'Redmi Note 8 Pro', 69),
(139, 'Redmi 8A', 70),
(140, 'Redmi 10', 71),
(141, 'Redmi Note 9 Pro', 72),
(142, 'Redmi Note 9s', 72),
(143, 'MI 11 Lite 5G', 73),
(144, '11 Lite 5G NE', 73),
(145, 'MI 11 Lite', 73),
(146, 'Redmi 10 Lite', 74),
(147, 'Redmi Note 11 Pro', 74),
(148, 'Redmi Note 11 Pro Plus', 74),
(149, 'Redmi Note 11', 74),
(150, 'Redmi Note 10 Pro', 75),
(151, 'Redmi Note 10 Pro Max', 75),
(152, 'Redmi Note 10', 76),
(153, 'Redmi Note 10s', 76),
(154, 'Redmi Note 11s', 76),
(155, 'POCO X3 GT', 77),
(156, 'POCO F3', 77),
(157, 'A52', 78),
(158, 'A53 4G', 79),
(159, 'A54 4G', 79),
(160, 'A33', 79),
(161, 'A72 4G', 80),
(162, 'A31', 81),
(163, 'Redmi 9A', 82),
(164, 'Redmi 9C', 82),
(165, 'Redmi 9', 82),
(166, 'Redmi Note 11E', 82),
(167, 'Redmi 10A', 82),
(168, 'Redmi 10 5G', 82),
(169, 'Reno 6 5G', 83),
(170, 'Reno 7 5G', 83),
(171, 'Reno 7 PRO 5G', 83),
(172, 'Reno 5 Lite', 84),
(173, 'A74', 84),
(174, 'A93', 84),
(175, 'A95 5G', 84),
(176, 'A94', 84),
(177, 'RENO 5Z', 84),
(178, 'Reno 6Z 5g', 84),
(179, 'Reno 6 4g', 84),
(180, 'A95', 84),
(181, 'Reno 7 SE 5G', 84),
(182, 'Reno 6 Lite', 84),
(183, 'G7', 85),
(184, 'G7 Plus', 85),
(185, 'G6 Plus', 86),
(186, 'P Smart', 87),
(187, 'A50', 88),
(188, 'A50s', 88),
(189, 'A30s', 88),
(190, 'A30', 88),
(191, 'A20', 88);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nombre_mica9h`
--

CREATE TABLE `nombre_mica9h` (
  `id_modelo` int(11) NOT NULL,
  `modelo` varchar(30) NOT NULL,
  `id_mica9h` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `nombre_mica9h`
--

INSERT INTO `nombre_mica9h` (`id_modelo`, `modelo`, `id_mica9h`) VALUES
(1, 'A6 2018', 1),
(2, 'A5 2020', 2),
(3, 'A12', 2),
(4, 'A02', 2),
(5, 'A02s', 2),
(6, 'A03', 2),
(7, 'A03s', 2),
(8, 'A03 Core', 2),
(9, 'A13 5G', 2),
(10, 'A20s', 2),
(11, 'A9 2020', 2),
(12, 'A41', 3),
(13, 'A22 5G', 4),
(14, 'A33 5G', 5),
(15, 'A32 4G', 5),
(16, 'A31', 5),
(17, 'A22 4G', 5),
(43, 'A50', 7),
(44, 'A50s', 7),
(45, 'A30', 7),
(46, 'A30s', 7),
(47, 'A20', 7),
(48, 'A6 Plus', 8),
(49, 'J4 2018', 9),
(50, 'A01', 10),
(51, 'A01 Core', 11),
(52, 'A10', 12),
(53, 'M10', 12),
(54, 'A10s', 12),
(55, 'A73', 13),
(56, 'A52', 14),
(57, 'A6 2018', 15),
(58, 'G530', 16),
(59, 'G532', 16),
(60, 'J7 2017', 17),
(61, 'J7 Prime', 17),
(62, 'J7 Pro', 18),
(63, 'A10E', 19),
(64, 'A20E', 19),
(65, 'A21', 20),
(66, 'A21s', 20),
(67, 'M11', 21),
(68, 'A71', 22),
(69, 'A51', 23),
(71, 'J7', 25),
(72, 'J7 2016', 25),
(73, 'J8 Plus', 26),
(74, 'J4 Plus', 26),
(75, 'J6 Plus', 26),
(76, 'G100', 27),
(77, 'G60', 28),
(78, 'G60s', 28),
(79, 'G51', 28),
(80, 'One Macro', 29),
(81, 'Edge 20 Pro', 30),
(82, 'G60', 31),
(83, 'G40 Fusion', 31),
(84, 'G50', 32),
(85, 'G50 5G', 32),
(86, 'G9', 33),
(87, 'E7', 33),
(88, 'G9 Play', 33),
(89, 'E7 Plus', 33),
(90, 'E7i Power', 33),
(91, 'G8 Power Lite', 33),
(92, 'E7 Power', 33),
(93, 'E7i', 33),
(94, 'E20', 33),
(95, 'G8', 34),
(96, 'G Fast', 34),
(97, 'One Fusion Plus', 34),
(98, 'E6', 35),
(99, 'Edge 20 Lite', 36),
(100, 'E6s 2020', 37),
(101, 'G31 A', 38),
(102, 'G31', 39),
(103, 'G41', 39),
(104, 'G71 5G', 39),
(105, '5.3\'', 40),
(106, '5.5\'', 41),
(107, '5.7\'', 42),
(108, '6\'', 43),
(109, 'G30', 33),
(110, 'G20', 33),
(111, 'G10', 33),
(112, 'G50 5G', 33),
(113, 'G9 Plus', 44),
(114, 'G9 Power', 45),
(115, 'E6 Play', 46),
(116, '5\'', 47),
(117, '4.3\'', 48),
(118, '4.7\'', 49),
(119, '4.5\'', 50),
(120, '4\'', 51),
(121, 'A12', 52),
(122, 'A74', 53),
(123, 'Reno 5 Lite', 53),
(124, 'A15', 54),
(125, 'Reno 6 Lite', 55),
(126, 'Reno 6 5G', 56),
(127, 'Reno 7 5G', 56),
(128, 'Reno 7 Pro 5G', 56),
(129, 'A55 5G', 57),
(130, 'V30 Vita', 58),
(131, 'V20 Smart', 58),
(132, 'V9 Vita', 59),
(133, 'V9', 60),
(134, 'L8', 61),
(135, 'L9', 61),
(136, 'L210', 62),
(137, 'A71', 63),
(138, '8050', 64),
(139, '5098', 64),
(140, '3C 5026', 65),
(141, '5011', 66),
(142, '3 2020', 67),
(143, '5029', 67),
(144, 'U3', 68),
(145, '4034', 68),
(146, '1S', 69),
(147, '5024', 69),
(148, '3X', 70),
(149, '5058', 70),
(150, 'Y6 2019', 71),
(151, 'Y6 Prime 2019', 71),
(152, 'Y6s', 71),
(153, 'Y9 Prime 2019', 72),
(154, 'P Smart Z', 72),
(155, 'Y9s', 72),
(156, 'P Smart', 72),
(157, 'P20 Lite', 73),
(158, 'P30 Lite', 74),
(159, 'Mate 30', 75),
(160, 'Mate 20', 76),
(161, 'Y60', 77),
(162, 'Nova Y60', 77),
(163, 'P Smart', 78),
(164, 'P Smart 2019', 79),
(165, 'Nova 5T', 80),
(166, 'P40 Lite', 81),
(167, 'Mate 20 Lite', 82),
(168, 'Nova 3', 82),
(169, 'Redmi Note 8 Pro', 83),
(170, 'Redmi Note 10 Pro', 84),
(171, 'Redmi Note 10 A', 85),
(172, 'Redmi Note 10s A', 85),
(173, 'Redmi Note 11s A', 85),
(174, 'Redmi Note 10', 86),
(175, 'Redmi Note 10s', 86),
(176, 'Redmi Note 11s', 86),
(177, 'Redmi Note 9', 87),
(178, 'Redmi Note 9 Pro', 88),
(179, 'MI 10T', 89),
(180, 'MI 11 Lite', 90),
(181, 'Redmi 9T A', 91),
(182, 'Redmi 9 Power A', 91),
(183, 'POCO M3 A', 91),
(184, 'Redmi 9T B', 92),
(185, 'Redmi 9 Power B', 92),
(186, 'POCO M3 B', 92),
(187, 'Redmi 9', 93),
(188, 'Redmi 9A', 94),
(189, 'Redmi 9C', 94),
(190, 'XR', 95),
(191, '11', 95),
(192, 'X', 96),
(193, 'XS', 96),
(194, 'XS Max', 97),
(195, '11 Pro Max', 97),
(196, '6', 98),
(197, '7', 98),
(198, '8', 98),
(199, 'SE2', 98),
(200, '6 Plus', 99),
(201, '7 Plus', 99),
(202, '8 Plus', 99),
(203, '12', 100),
(204, '12 Pro', 100),
(205, '12 Pro Max', 101),
(206, '13', 102),
(207, '13 Pro', 102),
(208, '13 Pro Max', 103),
(209, 'G6', 104),
(210, 'G6 Play', 105),
(211, 'J1 Ace', 106),
(212, 'G8 Play', 107),
(213, 'G8 Plus', 108);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posicion`
--

CREATE TABLE `posicion` (
  `id_posicion` int(11) NOT NULL,
  `nombre` varchar(4) NOT NULL,
  `muro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `posicion`
--

INSERT INTO `posicion` (`id_posicion`, `nombre`, `muro`) VALUES
(1, 'A1', 1),
(2, 'A2', 1),
(3, 'A3', 1),
(4, 'A4', 1),
(5, 'A5', 1),
(6, 'B1', 1),
(8, 'B3', 2),
(9, 'B4', 2),
(10, 'B5', 2),
(15, 'B2', 1),
(16, 'B3', 1),
(17, 'B4', 1),
(18, 'B5', 1),
(19, 'C1', 1),
(20, 'C2', 1),
(21, 'C3', 1),
(22, 'C4', 1),
(23, 'C5', 1),
(24, 'D1', 1),
(25, 'D2', 1),
(26, 'D3', 1),
(27, 'D4', 1),
(28, 'D5', 1),
(29, 'E1', 1),
(30, 'E2', 1),
(31, 'E3', 1),
(32, 'E4', 1),
(33, 'E5', 1),
(34, 'F1', 1),
(35, 'F2', 1),
(36, 'F3', 1),
(37, 'F4', 1),
(38, 'F5', 1),
(39, 'G1', 1),
(40, 'G2', 1),
(41, 'G3', 1),
(42, 'G4', 1),
(43, 'G5', 1),
(44, 'H1', 1),
(45, 'H2', 1),
(46, 'H3', 1),
(47, 'H4', 1),
(48, 'H5', 1),
(49, 'I1', 1),
(50, 'I2', 1),
(51, 'I3', 1),
(52, 'I4', 1),
(53, 'I5', 1),
(54, 'J1', 1),
(55, 'J2', 1),
(56, 'J3', 1),
(57, 'J4', 1),
(58, 'J5', 1),
(59, 'K1', 1),
(60, 'K2', 1),
(61, 'K3', 1),
(62, 'K4', 1),
(63, 'K5', 1),
(64, 'L1', 1),
(65, 'L2', 1),
(66, 'L3', 1),
(67, 'L4', 1),
(68, 'L5', 1),
(69, 'M1', 1),
(70, 'M2', 1),
(71, 'M3', 1),
(72, 'M4', 1),
(73, 'M5', 1),
(74, 'N1', 1),
(75, 'N2', 1),
(76, 'N3', 1),
(77, 'N4', 1),
(78, 'N5', 1),
(79, 'O1', 1),
(80, 'O2', 1),
(81, 'O3', 1),
(82, 'O4', 1),
(83, 'O5', 1),
(84, 'A1', 2),
(85, 'A2', 2),
(86, 'A3', 2),
(87, 'A4', 2),
(88, 'A5', 2),
(89, 'B1', 2),
(90, 'B2', 2),
(91, 'C1', 2),
(92, 'C2', 2),
(93, 'C3', 2),
(94, 'C4', 2),
(95, 'C5', 2),
(96, 'D1', 2),
(97, 'D2', 2),
(98, 'D3', 2),
(99, 'D4', 2),
(100, 'D5', 2),
(101, 'E1', 2),
(102, 'E2', 2),
(103, 'E3', 2),
(104, 'E4', 2),
(105, 'E5', 2),
(106, 'F1', 2),
(107, 'F2', 2),
(108, 'F3', 2),
(109, 'F4', 2),
(110, 'F5', 2),
(111, 'G1', 2),
(112, 'G2', 2),
(113, 'G3', 2),
(114, 'G4', 2),
(115, 'G5', 2),
(116, 'H1', 2),
(117, 'H2', 2),
(118, 'H3', 2),
(119, 'H4', 2),
(120, 'H5', 2),
(121, 'I1', 2),
(122, 'I2', 2),
(123, 'I3', 2),
(124, 'I4', 2),
(125, 'I5', 2),
(126, 'J1', 2),
(127, 'J2', 2),
(128, 'J3', 2),
(129, 'J4', 2),
(130, 'J5', 2),
(131, 'K1', 2),
(132, 'K2', 2),
(133, 'K3', 2),
(134, 'K4', 2),
(135, 'K5', 2),
(136, 'L1', 2),
(137, 'L2', 2),
(138, 'L3', 2),
(139, 'L4', 2),
(140, 'L5', 2),
(141, 'M1', 2),
(142, 'M2', 2),
(143, 'M3', 2),
(144, 'M4', 2),
(145, 'M5', 2),
(146, 'N1', 2),
(147, 'N2', 2),
(148, 'N3', 2),
(149, 'N4', 2),
(150, 'N5', 2),
(151, 'O1', 2),
(152, 'O2', 2),
(153, 'O3', 2),
(154, 'O4', 2),
(155, 'O5', 2),
(156, 'P1', 2),
(157, 'P2', 2),
(158, 'P3', 2),
(159, 'P4', 2),
(160, 'P5', 2),
(161, 'Q1', 2),
(162, 'Q2', 2),
(163, 'Q3', 2),
(164, 'Q4', 2),
(165, 'Q5', 2),
(166, 'R1', 2),
(167, 'R2', 2),
(168, 'R3', 2),
(169, 'R4', 2),
(170, 'R5', 2),
(171, 'A1', 3),
(172, 'A2', 3),
(173, 'A3', 3),
(174, 'A4', 3),
(175, 'A5', 3),
(176, 'B1', 3),
(177, 'B2', 3),
(178, 'B3', 3),
(179, 'B4', 3),
(180, 'B5', 3),
(181, 'C1', 3),
(182, 'C2', 3),
(183, 'C3', 3),
(184, 'C4', 3),
(185, 'C5', 3),
(186, 'D1', 3),
(187, 'D2', 3),
(188, 'D3', 3),
(189, 'D4', 3),
(190, 'D5', 3),
(191, 'E1', 3),
(192, 'E2', 3),
(193, 'E3', 3),
(194, 'E4', 3),
(195, 'F1', 3),
(196, 'F2', 3),
(197, 'F3', 3),
(198, 'F4', 3),
(199, 'G1', 3),
(200, 'G2', 3),
(201, 'G3', 3),
(202, 'G4', 3),
(203, 'H1', 3),
(204, 'H2', 3),
(205, 'H3', 3),
(206, 'H4', 3),
(207, 'E5', 3),
(208, 'F5', 3),
(209, 'G5', 3),
(210, 'H5', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `protectores`
--

CREATE TABLE `protectores` (
  `id_protector` int(11) NOT NULL,
  `marca` varchar(40) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `posicion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `protectores`
--

INSERT INTO `protectores` (`id_protector`, `marca`, `cantidad`, `posicion`) VALUES
(1, 'Samsung', 7, 121),
(6, 'Samsung', 10, 123),
(8, 'Samsung', 3, 131),
(9, 'Samsung', 1, 131),
(10, 'Samsung', 4, 136),
(11, 'Samsung', 3, 141),
(12, 'Samsung', 3, 116),
(13, 'Samsung', 1, 116),
(14, 'Samsung', 7, 117),
(15, 'Samsung', 6, 122),
(16, 'Samsung', 7, 127),
(17, 'Samsung', 7, 132),
(18, 'Samsung', 4, 137),
(19, 'Samsung', 5, 142),
(20, 'Samsung', 3, 118),
(21, 'Samsung', 3, 118),
(22, 'Samsung', 3, 126),
(23, 'Samsung', 1, 126),
(24, 'Samsung', 2, 128),
(25, 'Samsung', 2, 128),
(26, 'Samsung', 2, 128),
(27, 'Samsung', 2, 128),
(28, 'Samsung', 2, 128),
(29, 'Motorola', 3, 133),
(30, 'Motorola', 3, 133),
(31, 'Motorola', 11, 138),
(32, 'Motorola', 3, 143),
(33, 'Motorola', 3, 143),
(34, 'Motorola', 4, 119),
(35, 'Motorola', 7, 124),
(36, 'Motorola', 3, 129),
(37, 'Motorola', 4, 193),
(38, 'Xiaomi', 4, 194),
(39, 'Xiaomi', 2, 194),
(40, 'Xiaomi', 3, 175),
(41, 'Xiaomi', 6, 175),
(42, 'Huawei', 7, 120),
(43, 'Huawei', 7, 125),
(44, 'Huawei', 7, 130),
(45, 'Huawei', 7, 191),
(46, 'Huawei', 4, 180),
(47, 'Huawei', 4, 185),
(48, 'Iphone', 9, 107),
(49, 'Iphone', 3, 112),
(50, 'Iphone', 2, 112),
(51, 'Iphone', 11, 113),
(52, 'Iphone', 4, 106),
(53, 'Iphone', 4, 111),
(54, 'Iphone', 7, 108),
(55, 'Iphone', 4, 109),
(56, 'Iphone', 6, 114),
(57, 'Iphone', 8, 115),
(58, 'Iphone', 14, 110),
(59, 'Huawei', 3, 185),
(61, 'Samsung', 5, 171),
(62, 'OPPO', 2, 172),
(63, 'OPPO', 3, 172),
(64, 'OPPO', 3, 172),
(65, 'OPPO', 3, 172),
(66, 'Huawei', 3, 174),
(67, 'Huawei', 2, 174),
(68, 'Huawei', 2, 174),
(69, 'Samsung', 2, 176),
(70, 'Samsung', 2, 176),
(71, 'Samsung', 1, 176),
(72, 'Samsung', 1, 176),
(73, 'OPPO', 3, 177),
(74, 'OPPO', 3, 177),
(75, 'OPPO', 2, 177),
(76, 'Xiaomi', 4, 179),
(77, 'OPPO', 2, 181),
(78, 'OPPO', 1, 181),
(79, 'OPPO', 1, 171),
(80, 'ZTE', 5, 182),
(81, 'ZTE', 2, 171),
(82, 'Iphone', 3, 184),
(83, 'Iphone', 3, 184),
(84, 'Motorola', 3, 192),
(85, 'Samsung', 3, 195),
(86, 'Iphone', 3, 207),
(87, 'Iphone', 3, 207),
(88, 'Samsung', 3, 126),
(89, 'Samsung', 3, 136),
(90, 'Samsung', 3, 136),
(91, 'Motorola', 2, 129),
(92, 'Samsung', 3, 129);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_protector`
--

CREATE TABLE `tipo_protector` (
  `id_tipo` int(11) NOT NULL,
  `tipo` varchar(30) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `id_protector` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_protector`
--

INSERT INTO `tipo_protector` (`id_tipo`, `tipo`, `cantidad`, `id_protector`) VALUES
(3, 'acrigel', 1, 6),
(4, 'original', 3, 6),
(5, 'diseno1', 6, 6),
(7, 'acrigel', 1, 8),
(8, 'original', 2, 8),
(9, 'acrigel', 1, 9),
(10, 'acrigel', 1, 10),
(11, 'original', 3, 10),
(12, 'acrigel', 1, 11),
(13, 'original', 2, 11),
(14, 'acrigel', 1, 12),
(15, 'original', 2, 12),
(16, 'original', 1, 13),
(17, 'acrigel', 1, 14),
(18, 'original', 3, 14),
(19, 'diseno1', 3, 14),
(20, 'humo', 3, 15),
(21, 'original', 3, 15),
(22, 'acrigel', 1, 16),
(23, 'original', 3, 16),
(24, 'diseno1', 3, 16),
(25, 'original', 3, 17),
(26, 'diseno1', 3, 17),
(27, 'acrigel', 1, 17),
(28, 'acrigel', 1, 18),
(29, 'original', 3, 18),
(30, 'humo', 2, 19),
(31, 'diseno1', 3, 19),
(32, 'humo', 3, 20),
(33, 'humo', 3, 21),
(34, 'humo', 3, 22),
(35, 'humo', 1, 23),
(36, 'humo', 2, 24),
(37, 'humo', 2, 25),
(38, 'humo', 2, 26),
(39, 'humo', 2, 27),
(40, 'humo', 2, 28),
(41, 'humo', 3, 29),
(42, 'humo', 3, 30),
(43, 'acrigel', 2, 31),
(44, 'original', 5, 31),
(45, 'humo', 3, 31),
(46, 'diseno1', 1, 31),
(47, 'humo', 3, 32),
(48, 'humo', 3, 33),
(49, 'acrigel', 1, 34),
(50, 'original', 3, 34),
(51, 'acrigel', 1, 35),
(52, 'original', 3, 35),
(53, 'humo', 3, 35),
(54, 'acrigel', 1, 36),
(55, 'original', 2, 36),
(56, 'acrigel', 1, 37),
(57, 'humo', 3, 37),
(58, 'acrigel', 1, 38),
(59, 'acrigel', 3, 38),
(60, 'humo', 2, 39),
(61, 'acrigel', 1, 40),
(62, 'diseno1', 2, 40),
(63, 'acrigel', 1, 41),
(64, 'original', 3, 41),
(65, 'diseno1', 2, 41),
(66, 'acrigel', 1, 42),
(67, 'humo', 3, 42),
(68, 'original', 3, 42),
(69, 'original', 3, 43),
(70, 'humo', 3, 43),
(71, 'acrigel', 1, 43),
(72, 'acrigel', 1, 44),
(73, 'humo', 3, 44),
(74, 'original', 3, 44),
(75, 'original', 3, 45),
(76, 'humo', 3, 45),
(77, 'acrigel', 1, 45),
(78, 'acrigel', 1, 46),
(79, 'original', 3, 46),
(80, 'acrigel', 1, 47),
(81, 'original', 3, 47),
(82, 'diseno1', 5, 48),
(83, 'acrigel', 1, 48),
(84, 'original', 3, 48),
(85, 'original', 3, 49),
(86, 'original', 2, 50),
(87, 'acrigel', 2, 51),
(88, 'original', 5, 51),
(89, 'popit', 4, 51),
(90, 'diseno1', 2, 52),
(91, 'popit', 2, 52),
(92, 'acrigel', 1, 53),
(93, 'original', 3, 53),
(94, 'acrigel', 1, 54),
(95, 'original', 3, 54),
(96, 'diseno1', 2, 54),
(97, 'popit', 1, 54),
(98, 'original', 3, 55),
(99, 'acrigel', 1, 55),
(100, 'acrigel', 1, 56),
(101, 'original', 3, 56),
(102, 'popit', 2, 56),
(103, 'acrigel', 2, 57),
(104, 'original', 6, 57),
(105, 'acrigel', 2, 58),
(106, 'original', 6, 58),
(107, 'diseno1', 2, 58),
(108, 'popit', 4, 58),
(109, 'humo', 3, 59),
(111, 'original', 5, 61),
(112, 'humo', 2, 62),
(113, 'humo', 3, 63),
(114, 'humo', 3, 64),
(115, 'humo', 3, 65),
(116, 'humo', 3, 66),
(117, 'original', 2, 67),
(118, 'original', 1, 68),
(119, 'acrigel', 1, 68),
(120, 'humo', 2, 69),
(121, 'humo', 2, 70),
(122, 'humo', 1, 71),
(123, 'humo', 1, 72),
(124, 'humo', 3, 73),
(125, 'original', 3, 74),
(126, 'diseno1', 2, 75),
(127, 'original', 4, 76),
(128, 'diseno1', 2, 77),
(129, 'diseno1', 1, 78),
(130, 'diseno1', 1, 79),
(131, 'original', 5, 80),
(132, 'original', 2, 81),
(133, 'acrigel', 3, 82),
(134, 'acrigel', 3, 83),
(135, 'original', 3, 84),
(136, 'original', 3, 85),
(137, 'original', 3, 86),
(138, 'original', 3, 87),
(139, 'original', 3, 88),
(140, 'acrigel', 3, 89),
(141, 'original', 3, 90),
(142, 'original', 2, 91),
(143, 'original', 3, 92);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `micas9d`
--
ALTER TABLE `micas9d`
  ADD PRIMARY KEY (`id_mica9d`),
  ADD KEY `fk_mica9d_posicion` (`posicion`);

--
-- Indices de la tabla `micas9h`
--
ALTER TABLE `micas9h`
  ADD PRIMARY KEY (`id_mica9h`),
  ADD KEY `fk_mica9h_posicion` (`posicion`);

--
-- Indices de la tabla `modelo_funda`
--
ALTER TABLE `modelo_funda`
  ADD PRIMARY KEY (`id_modelo`),
  ADD KEY `fk_modelo_protector` (`id_protector`);

--
-- Indices de la tabla `nombre`
--
ALTER TABLE `nombre`
  ADD PRIMARY KEY (`id_modelo`),
  ADD KEY `fk_nombre_mica9d` (`id_mica`);

--
-- Indices de la tabla `nombre_mica9h`
--
ALTER TABLE `nombre_mica9h`
  ADD PRIMARY KEY (`id_modelo`),
  ADD KEY `fk_nombre_mica9h` (`id_mica9h`);

--
-- Indices de la tabla `posicion`
--
ALTER TABLE `posicion`
  ADD PRIMARY KEY (`id_posicion`);

--
-- Indices de la tabla `protectores`
--
ALTER TABLE `protectores`
  ADD PRIMARY KEY (`id_protector`),
  ADD KEY `fk_protector_posicion` (`posicion`);

--
-- Indices de la tabla `tipo_protector`
--
ALTER TABLE `tipo_protector`
  ADD PRIMARY KEY (`id_tipo`),
  ADD KEY `fk_tipo_protector` (`id_protector`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `micas9d`
--
ALTER TABLE `micas9d`
  MODIFY `id_mica9d` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT de la tabla `micas9h`
--
ALTER TABLE `micas9h`
  MODIFY `id_mica9h` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT de la tabla `modelo_funda`
--
ALTER TABLE `modelo_funda`
  MODIFY `id_modelo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT de la tabla `nombre`
--
ALTER TABLE `nombre`
  MODIFY `id_modelo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=192;

--
-- AUTO_INCREMENT de la tabla `nombre_mica9h`
--
ALTER TABLE `nombre_mica9h`
  MODIFY `id_modelo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=214;

--
-- AUTO_INCREMENT de la tabla `posicion`
--
ALTER TABLE `posicion`
  MODIFY `id_posicion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=211;

--
-- AUTO_INCREMENT de la tabla `protectores`
--
ALTER TABLE `protectores`
  MODIFY `id_protector` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT de la tabla `tipo_protector`
--
ALTER TABLE `tipo_protector`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `micas9d`
--
ALTER TABLE `micas9d`
  ADD CONSTRAINT `fk_mica9d_posicion` FOREIGN KEY (`posicion`) REFERENCES `posicion` (`id_posicion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `micas9h`
--
ALTER TABLE `micas9h`
  ADD CONSTRAINT `fk_mica9h_posicion` FOREIGN KEY (`posicion`) REFERENCES `posicion` (`id_posicion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `modelo_funda`
--
ALTER TABLE `modelo_funda`
  ADD CONSTRAINT `fk_modelo_protector` FOREIGN KEY (`id_protector`) REFERENCES `protectores` (`id_protector`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `nombre`
--
ALTER TABLE `nombre`
  ADD CONSTRAINT `fk_nombre_mica9d` FOREIGN KEY (`id_mica`) REFERENCES `micas9d` (`id_mica9d`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `nombre_mica9h`
--
ALTER TABLE `nombre_mica9h`
  ADD CONSTRAINT `fk_nombre_mica9h` FOREIGN KEY (`id_mica9h`) REFERENCES `micas9h` (`id_mica9h`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `protectores`
--
ALTER TABLE `protectores`
  ADD CONSTRAINT `fk_protector_posicion` FOREIGN KEY (`posicion`) REFERENCES `posicion` (`id_posicion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tipo_protector`
--
ALTER TABLE `tipo_protector`
  ADD CONSTRAINT `fk_tipo_protector` FOREIGN KEY (`id_protector`) REFERENCES `protectores` (`id_protector`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

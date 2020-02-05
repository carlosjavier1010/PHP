-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-12-2019 a las 16:30:31
-- Versión del servidor: 10.4.10-MariaDB
-- Versión de PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gestisimal`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `codigo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `precompra` float(6,2) NOT NULL,
  `preventa` float(6,2) NOT NULL,
  `stock` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`codigo`, `descripcion`, `precompra`, `preventa`, `stock`) VALUES
('1', '1', 1.00, 10.00, 10),
('2', '2', 10.00, 20.00, 20),
('3', '3', 30.00, 60.00, 60),
('4', '4', 40.00, 80.00, 80),
('5', '5', 50.00, 100.00, 100),
('8', '8', 80.00, 160.00, 160),
('m001', 'pruebasalida', 10.00, 20.00, 0),
('m002', 'martillo grodo', 40.00, 60.00, 78),
('m003', 'pruebafinal', 100.00, 200.00, 300),
('m004', 'p', 10.00, 30.00, 50);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`codigo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

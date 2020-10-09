-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-10-2020 a las 02:04:34
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistema`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_Create` (IN `cod` CHAR(6), `nom` VARCHAR(50), `des` VARCHAR(100), `pre` DOUBLE, `img` VARCHAR(100))  insert into productos (Codigo, Nombre, Descripcion, Precio, Imagen)
values (cod, nom, des, pre, img)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_Delete` (IN `numero` INT)  DELETE FROM productos
WHERE Nro=numero$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_vista` ()  SELECT * FROM productos$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `Nro` int(11) NOT NULL,
  `Codigo` char(6) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Descripcion` varchar(50) DEFAULT NULL,
  `Precio` double DEFAULT NULL,
  `imagen` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`Nro`, `Codigo`, `Nombre`, `Descripcion`, `Precio`, `imagen`) VALUES
(6, 'A00001', 'XXXXXXXX', 'XXXXXXXXXXXXXXX', 45654, 'XXFTFIYG'),
(7, 'A00001', 'XXXXXXXX', 'XXXXXXXXXXXXXXX', 687, 'XXFTFIYG'),
(12, 'A00333', 'XXXXXXXX', 'XXXXXXXXXXXXXXX', 2345, 'XXFTFIYG');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`Nro`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `Nro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

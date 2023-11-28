-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-11-2023 a las 23:25:34
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `trabajo_practico`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cerveza`
--

CREATE TABLE `cerveza` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Tipo` varchar(10) NOT NULL CHECK (`Tipo` in ('Tostada','Rubia','Negra','De trigo')),
  `Graduacion_alcoholica` int(11) NOT NULL CHECK (`Graduacion_alcoholica` > 0),
  `Pais` varchar(60) NOT NULL,
  `Precio` int(11) NOT NULL CHECK (`Precio` > 0),
  `Ruta_imagen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `cerveza`
--

INSERT INTO `cerveza` (`ID`, `Nombre`, `Tipo`, `Graduacion_alcoholica`, `Pais`, `Precio`, `Ruta_imagen`) VALUES
(51, 'Coronita', 'De trigo', 40, 'Ecuador', 3000, 'vistas/imagenes/Coronita/'),
(52, 'Pilsener', 'De trigo', 40, 'Ecuador', 30, 'vistas/imagenes/Pilsener/'),
(53, 'Blud ligth', 'Negra', 30, 'España', 3000, 'vistas/imagenes/Blud ligth/'),
(54, 'Harbin', 'Tostada', 50, 'España', 3000, 'vistas/imagenes/Harbin/'),
(55, 'Skol', 'Tostada', 30, 'Ecuador', 30, 'vistas/imagenes/Skol/');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cerveza`
--
ALTER TABLE `cerveza`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cerveza`
--
ALTER TABLE `cerveza`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

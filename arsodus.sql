-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-10-2025 a las 01:34:22
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `arsodus`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos`
--

CREATE TABLE `proyectos` (
  `Id` int(11) NOT NULL,
  `Titulo` varchar(255) NOT NULL,
  `Descripcion` text NOT NULL,
  `Tela` varchar(150) DEFAULT NULL,
  `Servicio` varchar(100) DEFAULT NULL,
  `Concepto` varchar(255) DEFAULT NULL,
  `Imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proyectos`
--

INSERT INTO `proyectos` (`Id`, `Titulo`, `Descripcion`, `Tela`, `Servicio`, `Concepto`, `Imagen`) VALUES
(1, 'Martin’s Bach', 'Diseño elegante en serigrafía para prendas de algodón premium.', 'Algodón 100%', 'Serigrafía', 'Inspiración minimalista y Tropical', '/bach/bach.png'),
(2, 'Abundance is a Mindset', 'Prenda conceptual con acabados en vinil de alta durabilidad.', 'Algodón peinado 280 gsm', 'Serigrafía', 'Mentalidad de crecimiento y abundancia', '/Abundance is a Mindset/Abundance is a Mindset.png'),
(3, 'God Is Time', 'Prenda conceptual con acabados en serigrafía con alta calidad.', 'Algodón', 'Serigrafía', 'Dios y el Tiempo', '/god/god.png'),
(4, 'Proyecto desconocido', 'No se encontró información para este proyecto.', '-', '-', '-', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

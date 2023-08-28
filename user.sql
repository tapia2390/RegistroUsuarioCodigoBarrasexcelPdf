-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-08-2023 a las 18:11:17
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `r_user`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `rol` int(11) NOT NULL,
  `imagen` varchar(250) NOT NULL,
  `documento` text NOT NULL,
  `apellidos` text NOT NULL,
  `ciudad` text NOT NULL,
  `departamento` text NOT NULL,
  `direccion` text NOT NULL,
  `empresa` text NOT NULL,
  `estado` text NOT NULL,
  `recibo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `nombre`, `correo`, `telefono`, `password`, `fecha`, `rol`, `imagen`, `documento`, `apellidos`, `ciudad`, `departamento`, `direccion`, `empresa`, `estado`, `recibo`) VALUES
(59, 'admin', 'admin@gmail.com', '9911165670', '12345', '2023-08-28 14:00:40', 1, 'user1.png', '1234', 'perez', 'Manizales', 'caldas', 'cll 23', 'Mision riqueza', 'Inactivo', 'bg.jpg'),
(62, 'secretaria', 'ia@gmail.com', '9911165670', '12345', '2023-08-28 14:00:37', 2, 'bg.jpg', '1235', 'morales', 'Manizales', 'caldas', 'cr 23', 'Farmacias dos', 'Activo', 'bg.jpg'),
(79, 'sfdf', 'dsfds@gmail.com', '243234', '34234', '2023-08-28 15:58:31', 2, '../imgs/666.jpg', '666', 'dfdsf', '23423432', '234324', '23423424', '234324324', 'inactivo', '../recibos/666.pdf');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permisos` (`rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `permisos` FOREIGN KEY (`rol`) REFERENCES `permisos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

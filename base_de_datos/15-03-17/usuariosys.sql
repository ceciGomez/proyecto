-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-03-2017 a las 23:25:19
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sirmi`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuariosys`
--

CREATE TABLE `usuariosys` (
  `idUsuario` int(6) NOT NULL,
  `nomyap` varchar(150) NOT NULL,
  `usuario` varchar(150) NOT NULL,
  `contraseña` varchar(100) DEFAULT NULL,
  `fechaReg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dni` int(8) DEFAULT NULL,
  `telefono` int(20) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `idLocalidad` int(6) DEFAULT NULL,
  `tipoUsuario` char(1) DEFAULT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `baja` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuariosys`
--

INSERT INTO `usuariosys` (`idUsuario`, `nomyap`, `usuario`, `contraseña`, `fechaReg`, `dni`, `telefono`, `direccion`, `email`, `idLocalidad`, `tipoUsuario`, `foto`, `baja`) VALUES
(1, 'pablo lopez', 'plopez', 'b2a85d6fa6272112db3ac069746079b7bdf7cded', '2017-02-22 03:14:07', 21112211, 3034561, 'Frondizi 500', 'plopez@gmail.com', 5, 'O', 'user.png', '0'),
(2, 'Lucas Vallejos', 'lvallejos', '368d292d0839d209380b6531c2b266d8994ff893', '2017-02-22 03:14:07', 33559988, 303456, 'Arturo Illia 123', 'lvallejos@hotmail.com', 2, 'O', 'user.png', '1'),
(3, 'Ana Medina', 'amedina', 'c2219aefa93c5d46c81f1f739ff06f9dd0637664', '2017-02-22 03:14:07', 12558878, 303457, 'Monteagudo 23', 'amedina@hotmail.com', 3, 'A', 'user.png', '1'),
(4, 'operador', 'operador', '9d24de3ac7b5fbbe776a6d90fe25a7e3c74a29cc', '2017-02-22 03:14:07', 36737373, 7373737, 'chaco 171', 'operador@gmail.com', 1, 'O', 'user.png', '0'),
(5, 'admin', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', '2017-02-22 03:14:07', 28288828, 227227, 'chaco 8282', 'administrador@gmail.com', 1, 'A', 'user.png', '0'),
(6, 'pablo aranda', 'paranda', 'paranda', '2017-01-01 00:00:00', 33998877, 303456, 'liniers200', 'paranda@gmail.com', 1, 'O', 'user.png', '0'),
(7, 'pablo aranda2', 'paranda2', 'paranda2', '2017-02-25 00:25:15', 33998877, 303456, 'liniers200', 'paranda@gmail.com', 1, 'O', 'user.png', '0');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuariosys`
--
ALTER TABLE `usuariosys`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `idLocalidad` (`idLocalidad`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuariosys`
--
ALTER TABLE `usuariosys`
  MODIFY `idUsuario` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuariosys`
--
ALTER TABLE `usuariosys`
  ADD CONSTRAINT `usuariosys_ibfk_1` FOREIGN KEY (`idLocalidad`) REFERENCES `localidad` (`idLocalidad`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

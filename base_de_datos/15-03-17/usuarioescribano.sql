-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-03-2017 a las 23:25:11
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
-- Estructura de tabla para la tabla `usuarioescribano`
--

CREATE TABLE `usuarioescribano` (
  `idEscribano` int(6) NOT NULL,
  `nomyap` varchar(150) NOT NULL,
  `usuario` varchar(150) NOT NULL,
  `contraseña` varchar(100) DEFAULT NULL,
  `fechaReg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dni` int(8) DEFAULT NULL,
  `telefono` int(20) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `matricula` int(8) NOT NULL,
  `estadoAprobacion` char(1) DEFAULT NULL,
  `idLocalidad` int(6) DEFAULT NULL,
  `idUsuario` int(6) DEFAULT NULL,
  `motivoRechazo` varchar(100) DEFAULT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `baja` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarioescribano`
--

INSERT INTO `usuarioescribano` (`idEscribano`, `nomyap`, `usuario`, `contraseña`, `fechaReg`, `dni`, `telefono`, `direccion`, `email`, `matricula`, `estadoAprobacion`, `idLocalidad`, `idUsuario`, `motivoRechazo`, `foto`, `baja`) VALUES
(1, 'Andrea Moreno', 'amoreno', 'b4d978e9eb36fadf5f38a3ec64c1da8b', '2017-02-22 03:14:47', 12457897, 303456, 'Arbo y Blanco 550', 'amoreno@arnet.com.ar', 12345, 'P', 4, 1, NULL, 'user.png', '0'),
(2, 'Fabricio Acosta', 'facosta', '57bae1643a29f9bc182508da65822ed1b840da24', '2017-02-22 03:14:47', 15889966, 303459, 'J. D. Perón 1445', 'facosta@google.com', 4587, 'R', 6, 2, 'Matricula no existente en la Universidad de escribanos', 'user.png', '0'),
(3, 'Margarita Sosa', 'maria sosa', 'f3842765018418f92434c2e601661adea6cb22b9', '2017-02-22 03:14:47', 13889966, 303457, 'Av. Alvear 45', 'msosa@hotmail.com', 4587, 'P', 1, 2, NULL, 'user.png', '0'),
(4, 'DARIO NUNIEZ', 'GERMANNZ3', 'bf0980b4c067c7b9dd83efd2c7fec7316eeecbbe', '2017-02-22 03:14:47', 33939195, 0, NULL, 'GERMAN.NZ03@GMAIL.COM', 303456, 'P', 1, NULL, '', 'user.png', '0'),
(5, 'CARLOS NELSON ACOSTA', 'HOLA123', 'c49868c59d03dc485ba93e03aa1dc1f7922a582c', '2017-02-22 03:14:47', 33564787, 0, NULL, 'HOLA@GMAIL.COM', 45645, 'R', 1, NULL, 'No es escribano', 'user.png', '1'),
(6, 'LUIS ALBERTO ZACARIAS', 'lzacaqqq', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2017-02-22 03:14:47', 25789654, 2147483647, '-', 'lzaca@hotmail.com', 889878, 'R', 6, NULL, 'preubapreubapreubapreubapreubapreubapreubapreubapreuba', 'user.png', '0'),
(8, 'PEDRO AZNAR', 'paznar', '882af4d7a33af52b5653ddcae036aee2be8f0568', '2017-02-22 03:14:47', 1823564, 2147483647, 'PERON 1233', 'paznar@gmail.com', 124598, 'A', 6, NULL, '', 'user.png', '0'),
(9, 'CARLOS YORIK', 'cyorik', '0edce019660e99cfd4cb1c15acc00bca05d7d1f5', '2017-02-22 03:14:47', 457896, 2147483647, 'AS123', 'YORIK@GMAIL.COM', 456987, 'A', 6, NULL, '', 'user.png', '0'),
(10, 'escri', 'escribano', 'b985651180f215acd5b8e34fabfa0a1174d71970', '2017-03-08 00:54:38', NULL, NULL, NULL, NULL, 8549, 'A', NULL, NULL, NULL, 'user.png', '0');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarioescribano`
--
ALTER TABLE `usuarioescribano`
  ADD PRIMARY KEY (`idEscribano`),
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD KEY `idLocalidad` (`idLocalidad`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarioescribano`
--
ALTER TABLE `usuarioescribano`
  MODIFY `idEscribano` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuarioescribano`
--
ALTER TABLE `usuarioescribano`
  ADD CONSTRAINT `usuarioescribano_ibfk_1` FOREIGN KEY (`idLocalidad`) REFERENCES `localidad` (`idLocalidad`),
  ADD CONSTRAINT `usuarioescribano_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `usuariosys` (`idUsuario`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

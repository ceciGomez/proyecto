-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-02-2017 a las 01:48:47
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 5.6.28

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
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `idDepartamento` int(6) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `idProvincia` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`idDepartamento`, `nombre`, `idProvincia`) VALUES
(1, 'Almirante Brown', 1),
(2, 'Bermejo', 1),
(3, 'General Güemes', 1),
(4, 'San Fernando', 1),
(5, 'Veinticinco de Mayo', 1),
(6, 'San Lorenzo', 1),
(7, 'Comandante Fernández', 1),
(8, 'Dos de Abril', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadominuta`
--

CREATE TABLE `estadominuta` (
  `idEstadoMinuta` int(8) NOT NULL,
  `idMinuta` int(8) NOT NULL,
  `estadoMinuta` char(1) NOT NULL,
  `motivoRechazo` varchar(200) DEFAULT NULL,
  `fechaEstado` datetime DEFAULT NULL,
  `idUsuario` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estadominuta`
--

INSERT INTO `estadominuta` (`idEstadoMinuta`, `idMinuta`, `estadoMinuta`, `motivoRechazo`, `fechaEstado`, `idUsuario`) VALUES
(1, 7, 'R', 'La unidad Funcional "21 F" no Existe en el Plano indicado.', '2016-11-11 00:00:00', 2),
(2, 1, 'A', NULL, '2017-01-01 00:00:00', 1),
(3, 2, 'A', NULL, '2017-01-01 00:00:00', 2),
(4, 3, 'A', NULL, '2017-01-01 00:00:00', 1),
(5, 7, 'A', NULL, '2017-01-01 00:00:00', 2),
(6, 4, 'A', NULL, '2017-01-01 00:00:00', 1),
(7, 5, 'R', 'Verificar Nomenclatura Catastral', '2016-11-11 00:00:00', 2),
(8, 6, 'R', 'Verificar Número de Plano Aprobado', '2017-01-01 00:00:00', 1),
(9, 5, 'A', NULL, '2017-01-01 00:00:00', 2),
(10, 6, 'A', NULL, '2017-01-01 00:00:00', 1),
(11, 8, 'P', NULL, NULL, NULL),
(12, 9, 'P', NULL, NULL, NULL),
(13, 10, 'P', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localidad`
--

CREATE TABLE `localidad` (
  `idLocalidad` int(6) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `codPostal` int(5) NOT NULL,
  `idDepartamento` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `localidad`
--

INSERT INTO `localidad` (`idLocalidad`, `nombre`, `codPostal`, `idDepartamento`) VALUES
(1, 'Resistencia', 3500, 4),
(2, 'Presidencia Roque Sáenz Peña', 3700, 7),
(3, 'Hermoso Campo', 3733, 8),
(4, 'Juan José Castelli', 3705, 3),
(5, 'Pampa del Infierno', 3708, 1),
(6, 'La Leonesa', 3518, 2),
(7, 'Machagai', 3534, 5),
(8, 'Villa Berthet', 3545, 6),
(9, 'Barranqueras', 3503, 4),
(10, 'Fontana', 3514, 4),
(11, 'Miraflores', 3705, 3),
(12, 'Villa Río Bermejito', 3703, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `minuta`
--

CREATE TABLE `minuta` (
  `idMinuta` int(8) NOT NULL,
  `idEscribano` int(6) NOT NULL,
  `idUsuario` int(6) DEFAULT NULL,
  `fechaIngresoSys` datetime NOT NULL,
  `fechaEdicion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `minuta`
--

INSERT INTO `minuta` (`idMinuta`, `idEscribano`, `idUsuario`, `fechaIngresoSys`, `fechaEdicion`) VALUES
(1, 1, 1, '2016-11-01 00:00:00', NULL),
(2, 2, 1, '2016-11-02 00:00:00', NULL),
(3, 1, 2, '2016-11-04 00:00:00', NULL),
(4, 1, 1, '2016-11-05 00:00:00', NULL),
(5, 2, 1, '2016-11-06 00:00:00', NULL),
(6, 1, 2, '2016-11-07 00:00:00', NULL),
(7, 3, 1, '2017-01-01 00:00:00', NULL),
(8, 3, 1, '2017-01-02 00:00:00', NULL),
(9, 3, 2, '2017-01-04 00:00:00', NULL),
(10, 3, 2, '2017-01-05 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parcela`
--

CREATE TABLE `parcela` (
  `idParcela` int(8) NOT NULL,
  `idLocalidad` int(6) NOT NULL,
  `circunscripcion` varchar(8) NOT NULL,
  `seccion` char(1) NOT NULL,
  `chacra` int(4) DEFAULT NULL,
  `quinta` int(4) DEFAULT NULL,
  `fraccion` varchar(8) DEFAULT NULL,
  `manzana` varchar(5) DEFAULT NULL,
  `parcela` varchar(6) DEFAULT NULL,
  `superficie` varchar(10) NOT NULL,
  `partida` int(6) NOT NULL,
  `tipoPropiedad` char(1) NOT NULL,
  `planoAprobado` varchar(10) NOT NULL,
  `fechaPlanoAprobado` date DEFAULT NULL,
  `descripcion` varchar(300) DEFAULT NULL,
  `idMinuta` int(8) NOT NULL,
  `nroMatriculaRPI` int(8) NOT NULL,
  `fechaMatriculaRPI` date NOT NULL,
  `tomo` int(5) DEFAULT NULL,
  `folio` int(5) DEFAULT NULL,
  `finca` int(5) DEFAULT NULL,
  `año` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `parcela`
--

INSERT INTO `parcela` (`idParcela`, `idLocalidad`, `circunscripcion`, `seccion`, `chacra`, `quinta`, `fraccion`, `manzana`, `parcela`, `superficie`, `partida`, `tipoPropiedad`, `planoAprobado`, `fechaPlanoAprobado`, `descripcion`, `idMinuta`, `nroMatriculaRPI`, `fechaMatriculaRPI`, `tomo`, `folio`, `finca`, `año`) VALUES
(1, 1, 'II', 'A', 20, 15, NULL, '2', '5', '200,00', 0, 'U', '20/115/05', '2005-11-02', 'Linda por su frente NE con la parcela 4 , al SE con la parcela 6 y al NO calle Arturo Illia', 1, 123456, '2005-11-05', 1, 2, 6, 2005),
(2, 1, 'II', 'A', 20, 15, NULL, '2', '6', '200,00', 0, 'U', '20/115/05', '2005-11-02', 'Linda por su frente NE con la parcela 7 , al SE con la parcela 8 y al NO calle Arturo Illia', 1, 123457, '2005-11-05', 1, 2, 6, 2005),
(3, 1, 'I', 'C', 105, NULL, NULL, '21', '1', '300,00', 0, 'U', '20/075/12', '2012-01-22', 'Linda por su frente NE con la parcela 9 , al SE con la parcela 16 y al NO calle Remedios de Escalada', 2, 65448, '2012-05-27', 164, 42, 5, 2012),
(4, 1, 'I', 'C', 105, NULL, NULL, '21', '2', '500,00', 0, 'U', '20/075/12', '2012-01-22', 'Linda por su frente NE con la parcela 10 , al SE con la parcela 15 y al NO calle Remedios de Escalada', 2, 65449, '2012-05-27', 164, 42, 5, 2012),
(5, 3, 'XII', '', NULL, NULL, NULL, NULL, '105', '10.200,00', 2256, 'R', '15/605/00', '2000-07-15', 'Linda por su frente NE con la parcela 4 , al SE con la parcela 6 y al NO Ruta provincial N°4', 3, 2548, '2000-11-05', 1, 2, 6, 2000),
(6, 3, 'XII', '', NULL, NULL, NULL, NULL, '106', '10.500,00', 2257, 'R', '15/305/00', '2000-07-15', 'Linda por su frente NE con la parcela 5 , al SE con la parcela 7 y al NO Ruta provincial N°4', 3, 2549, '2000-11-05', 1, 2, 6, 2000),
(7, 3, 'XII', '', NULL, NULL, NULL, NULL, '107', '10.250,00', 2258, 'R', '15/305/00', '2000-07-15', 'Linda por su frente NE con la parcela 6 , al SE con la parcela 8 y al NO Ruta provincial N°4', 3, 2550, '2000-11-05', 1, 2, 6, 2000),
(8, 1, 'I', 'A', 17, 14, NULL, '5A', '4', '200.00', 0, 'U', '20/115/05', '2005-11-02', 'Linda por su frente NE con la parcela 4 , al SE con la 6 y al NO calle Arturo Illia', 4, 1234, '2005-11-05', 1, 2, 6, 2005),
(9, 10, 'II', 'A', 20, 1, NULL, '56', '5A', '200.00', 0, 'S', '20/117/05', '2005-11-02', 'Linda por su frente NE con la parcela 4 , al SE con la 6 y al NO calle Arturo Illia', 5, 1235, '2005-11-05', 1, 2, 6, 2005),
(10, 1, 'I', 'A', 21, 108, NULL, '32', '7', '200.00', 0, 'S', '20/116/05', '2005-11-02', 'Linda por su frente NE con la parcela 4 , al SE con la 6 y al NO calle Arturo Illia', 6, 1236, '2005-11-05', 1, 2, 6, 2005),
(11, 9, 'I', 'B', 7, 22, NULL, '12', '11', '200.00', 0, 'S', '20/118/05', '2005-11-02', 'Linda por su frente NE con la parcela 4 , al SE con la 6 y al NO calle Arturo Illia', 7, 1237, '2005-11-05', 1, 2, 6, 2005),
(12, 1, 'II', 'C', 5, 14, NULL, '9', '12', '200.00', 0, 'U', '20/119/05', '2005-11-02', 'Linda por su frente NE con la parcela 4 , al SE con la 6 y al NO calle Arturo Illia', 8, 1238, '2005-11-05', 1, 2, 6, 2005),
(13, 1, 'I', 'B', 12, 65, NULL, '5', '13', '200.00', 0, 'U', '20/120/05', '2005-11-02', 'Linda por su frente NE con la parcela 4 , al SE con la 6 y al NO calle Arturo Illia', 9, 1239, '2005-11-05', 1, 2, 6, 2005),
(14, 1, 'II', 'A', 14, 12, NULL, '21', '14', '200.00', 0, 'U', '20/121/05', '2005-11-02', 'Linda por su frente NE con la parcela 4 , al SE con la 6 y al NO calle Arturo Illia', 10, 1230, '2005-11-05', 1, 2, 6, 2005);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `idPedido` int(6) NOT NULL,
  `idEscribano` int(8) DEFAULT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `fechaPedido` datetime DEFAULT NULL,
  `estadoPedido` char(1) DEFAULT NULL,
  `rtaPedido` varchar(200) DEFAULT NULL,
  `fechaRta` datetime DEFAULT NULL,
  `idUsuario` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`idPedido`, `idEscribano`, `descripcion`, `fechaPedido`, `estadoPedido`, `rtaPedido`, `fechaRta`, `idUsuario`) VALUES
(1, 3, 'Prueba solicitud consulta 1', '2016-11-15 00:00:00', 'C', 'Prueba respuesta consulta 1', '2017-01-01 00:00:00', 2),
(2, 1, 'Prueba solicitud consulta 2', '2016-12-05 00:00:00', 'P', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propietario`
--

CREATE TABLE `propietario` (
  `idPropietario` int(8) NOT NULL,
  `idParcela` int(8) DEFAULT NULL,
  `tipoPropietario` char(1) NOT NULL,
  `titular` varchar(150) DEFAULT NULL,
  `dni` int(8) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `idLocalidad` int(6) DEFAULT NULL,
  `cuitCuil` int(15) DEFAULT NULL,
  `conyuge` varchar(150) DEFAULT NULL,
  `fechaEscritura` date DEFAULT NULL,
  `porcentajeCondominio` float DEFAULT NULL,
  `nroUfUc` varchar(10) DEFAULT NULL,
  `tipoUfUc` char(1) DEFAULT NULL,
  `planoAprobado` varchar(10) DEFAULT NULL,
  `fechaPlanoAprobado` date DEFAULT NULL,
  `porcentajeUfUc` float DEFAULT NULL,
  `poligonos` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `propietario`
--

INSERT INTO `propietario` (`idPropietario`, `idParcela`, `tipoPropietario`, `titular`, `dni`, `direccion`, `idLocalidad`, `cuitCuil`, `conyuge`, `fechaEscritura`, `porcentajeCondominio`, `nroUfUc`, `tipoUfUc`, `planoAprobado`, `fechaPlanoAprobado`, `porcentajeUfUc`, `poligonos`) VALUES
(1, 1, 'A', 'Roberto Acosta', 31567894, 'Julio A. Roca 123', 1, NULL, NULL, '2006-11-05', 100, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 2, 'A', 'Andrea Acosta', 33009947, 'Julio A. Roca 123', 1, NULL, NULL, '2006-11-05', 100, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 3, 'A', 'Raul Oviedo', 24555678, 'Liniers 55', 1, NULL, NULL, '2006-11-05', 50, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 3, 'A', 'Maria Oviedo', 28679578, 'Liniers 55', 1, NULL, NULL, '2006-11-05', 50, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 4, 'A', 'Raul Oviedo', 24555678, 'Liniers 55', 1, NULL, NULL, '2006-11-05', 50, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 4, 'A', 'Maria Oviedo', 28679578, 'Liniers 55', 1, NULL, NULL, '2006-11-05', 50, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 5, 'A', 'Cooperativa Agricola Unión S.R.L.', NULL, 'Mendoza', 6, NULL, NULL, '2006-11-05', 100, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 6, 'A', 'Cooperativa Agricola Unión S.R.L.', NULL, 'Mendoza', 6, NULL, NULL, '2006-11-05', 100, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 7, 'A', 'Cooperativa Agricola Unión S.R.L.', NULL, 'Mendoza', 6, NULL, NULL, '2006-11-05', 100, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 8, 'A', 'Andrea Alcaraz', 33939556, 'Mariano Moreno 550', 1, NULL, NULL, '2006-11-05', 50, '1', 'F', '20/054/12', '2016-10-08', 33, '00-01'),
(11, 8, 'A', 'Rodrigo Alcaraz', 33939557, 'Mariano Moreno 550', 1, NULL, NULL, '2006-11-05', 50, '1', 'F', '20/054/12', '2016-10-08', 33, '00-01'),
(12, 9, 'A', 'Analia Fernandez', 12554789, 'Rivadavia 445', 1, NULL, 'Pedro Muñoz', '2006-11-05', 50, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 9, 'A', 'Marina Muñoz', 34558798, 'Rivadavia 445', 1, NULL, NULL, '2006-11-05', 25, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 9, 'A', 'Marisel Muñoz', 25887746, 'Rivadavia 445', 1, NULL, NULL, '2006-11-05', 25, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 10, 'A', 'Maria Andrea Romero', 33939556, 'Mariano Moreno 550', 1, NULL, NULL, '2006-11-05', 100, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 11, 'A', 'Nelson Andres Luque', 24556789, 'Av. Sarmiento 5447', 1, NULL, NULL, '2006-11-05', 50, '2', 'F', '20/006/14', '2013-10-08', 50, '00-02'),
(17, 11, 'A', 'Mariela Elizabeth Luque', 24568791, 'Av. Sarmiento 5447', 1, NULL, NULL, '2006-11-05', 50, '2', 'F', '20/006/14', '2013-10-08', 50, '00-02'),
(18, 12, 'A', 'Analia Mendoza', 18554789, 'Roque Saenz Peña 445', 1, NULL, 'Pedro Lopez', '2006-11-05', 100, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 13, 'A', 'Mario Leiva', 45887964, 'Cervantes 54', 1, NULL, NULL, '2006-11-05', 50, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 13, 'A', 'Federico Leiva', 45879687, 'Cervantes 54', 1, NULL, NULL, '2006-11-05', 50, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 14, 'A', 'Marisel Muñoz', 25887746, 'Rivadavia 445', 1, NULL, NULL, '2006-11-05', 100, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 1, 'T', 'Facundo Thorr', 21558945, 'Av. Chaco 1500', 1, NULL, NULL, '2006-11-05', 100, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 2, 'T', 'Pedro Escobar', 33559947, 'Julio A. Roca 123', 1, NULL, NULL, '2006-11-05', 50, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 2, 'T', 'Monica Escobar', 25595678, 'Liniers 55', 1, NULL, NULL, '2006-11-05', 50, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 3, 'T', 'Delfina Diez', 14679578, 'Moreno 155', 1, NULL, NULL, '2006-11-05', 100, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 4, 'T', 'Raul Kutz', 24555678, 'Ayacucho 255', 1, NULL, NULL, '2006-11-05', 50, NULL, NULL, NULL, NULL, NULL, NULL),
(27, 4, 'T', 'Maria Kutz', 28679578, 'Lopez y Planes 555', 1, NULL, NULL, '2006-11-05', 50, NULL, NULL, NULL, NULL, NULL, NULL),
(28, 5, 'T', 'Instituto Provincial de Desarrollo Urbano y Vivienda', NULL, 'Sarmiento 2500', 1, NULL, NULL, '2006-11-05', 100, NULL, NULL, NULL, NULL, NULL, NULL),
(29, 6, 'T', 'Instituto Provincial de Desarrollo Urbano y Vivienda', NULL, 'Sarmiento 2500', 1, NULL, NULL, '2006-11-05', 50, NULL, NULL, NULL, NULL, NULL, NULL),
(30, 7, 'T', 'Instituto Provincial de Desarrollo Urbano y Vivienda', NULL, 'Sarmiento 2500', 1, NULL, NULL, '2006-11-05', 50, NULL, NULL, NULL, NULL, NULL, NULL),
(31, 8, 'T', 'Leandro Morello', 13489556, 'Av. Hernandarias 544', 1, NULL, NULL, '2006-11-05', 100, '1', 'F', '20/054/12', '2016-10-08', 33, '00-01'),
(32, 9, 'T', 'Rodrigo Morello', 35912457, 'Av. Hernandarias 544', 1, NULL, NULL, '2006-11-05', 100, NULL, NULL, NULL, NULL, NULL, NULL),
(33, 10, 'T', 'Mario Aquino', 23554789, 'Rivadavia 1500', 1, NULL, 'Lorena Muñoz', '2006-11-05', 100, NULL, NULL, NULL, NULL, NULL, NULL),
(34, 11, 'T', 'Marina Muñoz', 34558798, 'Rivadavia 445', 1, NULL, NULL, '2006-11-05', 100, '2', 'F', '20/006/14', '2013-10-08', 50, '00-02'),
(35, 12, 'T', 'Gimena Alarcon', 45887746, 'Av. Malvinas 455', 1, NULL, NULL, '2006-11-05', 25, NULL, NULL, NULL, NULL, NULL, NULL),
(36, 12, 'T', 'Grecia Alarcon', 43939556, 'Av. Malvinas 455', 1, NULL, NULL, '2006-11-05', 25, NULL, NULL, NULL, NULL, NULL, NULL),
(37, 12, 'T', 'Laila Pedrozo', 14586789, 'Av. Malvinas 455', 1, NULL, NULL, '2006-11-05', 100, NULL, NULL, NULL, NULL, NULL, NULL),
(38, 13, 'T', 'Fabian Mesa', 29558791, 'Antartida 4546', 1, NULL, NULL, '2006-11-05', 100, NULL, NULL, NULL, NULL, NULL, NULL),
(39, 14, 'T', 'Juan Pablo Duarte', 29454457, 'Antartida 4565', 1, NULL, NULL, '2006-11-05', 100, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincia`
--

CREATE TABLE `provincia` (
  `idProvincia` int(2) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `provincia`
--

INSERT INTO `provincia` (`idProvincia`, `nombre`) VALUES
(1, 'Chaco'),
(2, 'Santa Fe'),
(3, 'Formosa'),
(4, 'Corrientes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `perfil` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `username` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `perfil`, `username`, `password`) VALUES
(1, 'administrador', 'admin1', 'd033e22ae348aeb5660fc2140aec35850c4da997'),
(2, 'escribano', 'escribano1', '748e3af2ce19fc00187889122fd0fd6329a4956b'),
(3, 'operador', 'operador1', '6feda84dcc2663ca33e76e422493a0b516d69899');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarioescribano`
--

CREATE TABLE `usuarioescribano` (
  `idEscribano` int(6) NOT NULL,
  `nomyap` varchar(150) NOT NULL,
  `usuario` varchar(10) NOT NULL,
  `contraseña` varchar(100) DEFAULT NULL,
  `dni` int(8) DEFAULT NULL,
  `telefono` int(20) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `matricula` int(8) NOT NULL,
  `estadoAprobacion` char(1) DEFAULT NULL,
  `idLocalidad` int(6) DEFAULT NULL,
  `idUsuario` int(6) DEFAULT NULL,
  `motivoRechazo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarioescribano`
--

INSERT INTO `usuarioescribano` (`idEscribano`, `nomyap`, `usuario`, `contraseña`, `dni`, `telefono`, `direccion`, `email`, `matricula`, `estadoAprobacion`, `idLocalidad`, `idUsuario`, `motivoRechazo`) VALUES
(1, 'Andrea Moreno', 'amoreno', 'amoreno', 12457897, 303456, 'Arbo y Blanco 550', 'amoreno@arnet.com.ar', 12345, NULL, 4, 1, NULL),
(2, 'Fabricio Acosta', 'facosta', 'facosta', 15889966, 303459, 'J. D. Perón 1445', 'facosta@google.com', 4587, NULL, 6, 2, NULL),
(3, 'Margarita Sosa', 'msosa', 'msosa', 13889966, 303457, 'Av. Alvear 45', 'msosa@hotmail.com', 4587, NULL, 1, 2, NULL),
(4, 'DARIO NUNIEZ', 'GERMANNZ3', 'bf0980b4c067c7b9dd83efd2c7fec7316eeecbbe', 33939195, 0, NULL, 'GERMAN.NZ03@GMAIL.COM', 303456, 'p', NULL, NULL, ''),
(5, 'CARLOS NELSON ACOSTA', 'HOLA123', 'c49868c59d03dc485ba93e03aa1dc1f7922a582c', 33564787, 0, NULL, 'HOLA@GMAIL.COM', 45645, 'p', NULL, NULL, ''),
(6, 'LUIS ALBERTO ZACARIAS', 'lzaca', '7c4a8d09ca3762af61e59520943dc26494f8941b', 25789654, 2147483647, '-', 'lzaca@hotmail.com', 889878, 'p', 6, NULL, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuariosys`
--

CREATE TABLE `usuariosys` (
  `idUsuario` int(6) NOT NULL,
  `nomyap` varchar(150) NOT NULL,
  `usuario` varchar(10) NOT NULL,
  `contraseña` varchar(100) DEFAULT NULL,
  `dni` int(8) DEFAULT NULL,
  `telefono` int(20) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `idLocalidad` int(6) DEFAULT NULL,
  `tipoUsuario` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuariosys`
--

INSERT INTO `usuariosys` (`idUsuario`, `nomyap`, `usuario`, `contraseña`, `dni`, `telefono`, `direccion`, `email`, `idLocalidad`, `tipoUsuario`) VALUES
(1, 'Pedro Lopez', 'plopez', 'plopez', 21112211, 3034561, 'Frondizi 500', 'plopez@gmail.com', 1, 'O'),
(2, 'Lucas Vallejos', 'lvallejos', 'lvallejos', 33559988, 303456, 'Arturo Illia 123', 'lvallejos@hotmail.com', 2, 'O'),
(3, 'Ana Medina', 'amedina', 'amedina', 12558878, 303457, 'Monteagudo 23', 'amedina@hotmail.com', 3, 'A');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`idDepartamento`),
  ADD KEY `idProvincia` (`idProvincia`);

--
-- Indices de la tabla `estadominuta`
--
ALTER TABLE `estadominuta`
  ADD PRIMARY KEY (`idEstadoMinuta`),
  ADD KEY `idMinuta` (`idMinuta`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `localidad`
--
ALTER TABLE `localidad`
  ADD PRIMARY KEY (`idLocalidad`),
  ADD KEY `idDepartamento` (`idDepartamento`);

--
-- Indices de la tabla `minuta`
--
ALTER TABLE `minuta`
  ADD PRIMARY KEY (`idMinuta`),
  ADD KEY `idEscribano` (`idEscribano`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `parcela`
--
ALTER TABLE `parcela`
  ADD PRIMARY KEY (`idParcela`),
  ADD KEY `idLocalidad` (`idLocalidad`),
  ADD KEY `idMinuta` (`idMinuta`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`idPedido`),
  ADD KEY `idEscribano` (`idEscribano`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `propietario`
--
ALTER TABLE `propietario`
  ADD PRIMARY KEY (`idPropietario`),
  ADD KEY `idParcela` (`idParcela`),
  ADD KEY `idLocalidad` (`idLocalidad`);

--
-- Indices de la tabla `provincia`
--
ALTER TABLE `provincia`
  ADD PRIMARY KEY (`idProvincia`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarioescribano`
--
ALTER TABLE `usuarioescribano`
  ADD PRIMARY KEY (`idEscribano`),
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD KEY `idLocalidad` (`idLocalidad`),
  ADD KEY `idUsuario` (`idUsuario`);

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
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `idDepartamento` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `estadominuta`
--
ALTER TABLE `estadominuta`
  MODIFY `idEstadoMinuta` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `localidad`
--
ALTER TABLE `localidad`
  MODIFY `idLocalidad` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `minuta`
--
ALTER TABLE `minuta`
  MODIFY `idMinuta` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `parcela`
--
ALTER TABLE `parcela`
  MODIFY `idParcela` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `idPedido` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `propietario`
--
ALTER TABLE `propietario`
  MODIFY `idPropietario` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT de la tabla `provincia`
--
ALTER TABLE `provincia`
  MODIFY `idProvincia` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `usuarioescribano`
--
ALTER TABLE `usuarioescribano`
  MODIFY `idEscribano` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `usuariosys`
--
ALTER TABLE `usuariosys`
  MODIFY `idUsuario` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD CONSTRAINT `departamento_ibfk_1` FOREIGN KEY (`idProvincia`) REFERENCES `provincia` (`idProvincia`);

--
-- Filtros para la tabla `estadominuta`
--
ALTER TABLE `estadominuta`
  ADD CONSTRAINT `estadominuta_ibfk_1` FOREIGN KEY (`idMinuta`) REFERENCES `minuta` (`idMinuta`),
  ADD CONSTRAINT `estadominuta_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `usuariosys` (`idUsuario`);

--
-- Filtros para la tabla `localidad`
--
ALTER TABLE `localidad`
  ADD CONSTRAINT `localidad_ibfk_1` FOREIGN KEY (`idDepartamento`) REFERENCES `departamento` (`idDepartamento`);

--
-- Filtros para la tabla `minuta`
--
ALTER TABLE `minuta`
  ADD CONSTRAINT `minuta_ibfk_1` FOREIGN KEY (`idEscribano`) REFERENCES `usuarioescribano` (`idEscribano`),
  ADD CONSTRAINT `minuta_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `usuariosys` (`idUsuario`);

--
-- Filtros para la tabla `parcela`
--
ALTER TABLE `parcela`
  ADD CONSTRAINT `parcela_ibfk_1` FOREIGN KEY (`idLocalidad`) REFERENCES `localidad` (`idLocalidad`),
  ADD CONSTRAINT `parcela_ibfk_2` FOREIGN KEY (`idMinuta`) REFERENCES `minuta` (`idMinuta`);

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuariosys` (`idUsuario`),
  ADD CONSTRAINT `pedidos_ibfk_2` FOREIGN KEY (`idEscribano`) REFERENCES `usuarioescribano` (`idEscribano`),
  ADD CONSTRAINT `pedidos_ibfk_3` FOREIGN KEY (`idUsuario`) REFERENCES `usuariosys` (`idUsuario`);

--
-- Filtros para la tabla `propietario`
--
ALTER TABLE `propietario`
  ADD CONSTRAINT `propietario_ibfk_1` FOREIGN KEY (`idParcela`) REFERENCES `parcela` (`idParcela`),
  ADD CONSTRAINT `propietario_ibfk_2` FOREIGN KEY (`idLocalidad`) REFERENCES `localidad` (`idLocalidad`);

--
-- Filtros para la tabla `usuarioescribano`
--
ALTER TABLE `usuarioescribano`
  ADD CONSTRAINT `usuarioescribano_ibfk_1` FOREIGN KEY (`idLocalidad`) REFERENCES `localidad` (`idLocalidad`),
  ADD CONSTRAINT `usuarioescribano_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `usuariosys` (`idUsuario`);

--
-- Filtros para la tabla `usuariosys`
--
ALTER TABLE `usuariosys`
  ADD CONSTRAINT `usuariosys_ibfk_1` FOREIGN KEY (`idLocalidad`) REFERENCES `localidad` (`idLocalidad`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

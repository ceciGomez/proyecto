-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 24, 2017 at 08:26 PM
-- Server version: 5.7.16-0ubuntu0.16.04.1
-- PHP Version: 7.0.13-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sirmi`
--

--
-- Dumping data for table `Departamento`
--
INSERT INTO `Provincia` (`idProvincia`, `nombre`) VALUES
(1, 'Chaco'),
(2, 'Santa Fe'),
(3, 'Formosa'),
(4, 'Corrientes');

INSERT INTO `Departamento` (`idDepartamento`, `nombre`, `idProvincia`) VALUES
(1, 'Almirante Brown', 1),
(2, 'Bermejo', 1),
(3, 'General Güemes', 1),
(4, 'San Fernando', 1),
(5, 'Veinticinco de Mayo', 1),
(6, 'San Lorenzo', 1),
(7, 'Comandante Fernández', 1),
(8, 'Dos de Abril', 1);

--
-- Dumping data for table `Localidad`
--

INSERT INTO `Localidad` (`idLocalidad`, `nombre`, `codPostal`, `idDepartamento`) VALUES
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

--
-- Dumping data for table `Provincia`
--



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
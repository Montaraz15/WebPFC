-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 09-08-2015 a las 18:13:42
-- Versión del servidor: 5.5.44-0ubuntu0.14.04.1
-- Versión de PHP: 5.5.9-1ubuntu4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `wcdb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eeg`
--

CREATE TABLE IF NOT EXISTS `eeg` (
  `User_id` int(11) NOT NULL,
  `Session_id` int(11) NOT NULL,
  `Meditation` int(3) NOT NULL,
  `Concentration` int(3) NOT NULL,
  `Blink` int(3) NOT NULL,
  `ts` varchar(40) COLLATE utf8_spanish_ci DEFAULT NULL,
  `seg` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`User_id`,`Session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Users`
--

CREATE TABLE IF NOT EXISTS `Users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `Users`
--

INSERT INTO `Users` (`user_id`, `email`, `password`) VALUES
(2, 'toni@us.es', '12345');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `eeg`
--
ALTER TABLE `eeg`
  ADD CONSTRAINT `eeg_ibfk_1` FOREIGN KEY (`User_id`) REFERENCES `Users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

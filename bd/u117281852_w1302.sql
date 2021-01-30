-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-01-2021 a las 23:04:10
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.2.34


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

create database foro;
use foro;
--
-- Base de datos: `foro`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `idcomentario` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `datatime` timestamp NOT NULL DEFAULT current_timestamp(),
  `idforo` int(11) NOT NULL,
  `idnumcontrol` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`idcomentario`, `descripcion`, `datatime`, `idforo`, `idnumcontrol`) VALUES
(20, 'Me gusto mucho la pelicula, aunque era muy larga', '2021-01-18 10:30:11', 20, 'E14021216'),
(21, 'Es una pelicula muy aburrida y solo pierden tiempo para un final cliche', '2021-01-18 14:21:31', 21, 'E16020840'),
(22, 'Concuerdo contigo aunque soy team superman', '2021-01-19 13:20:14', 22, 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foros`
--

CREATE TABLE `foros` (
  `idforo` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `datatime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `idnumcontrol` varchar(9) NOT NULL,
  `estatus` varchar(15) NOT NULL,
  `clasificacion` varchar(32) NOT NULL,
  `permiso` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `foros`
--

INSERT INTO `foros` (`idforo`, `titulo`, `descripcion`, `datatime`, `idnumcontrol`, `estatus`, `clasificacion`, `permiso`) VALUES
(20, 'Titanic el amor es tragico', 'Hola, les vengo a recomendar la pelicula de Titanic, es una hermosa película que habla sobre lo tragico que es amar', '2021-01-16 19:27:35', 'admin', 'abierto', 'romance', 'aceptado'),
(21, 'Rapidos y furiosos', 'Es una de las mejores peliculas de accion que he visto, tiene como 7 peliculas pero no se arrepentiran de verla', '2021-01-16 20:05:47', 'E15020557', 'cerrado', 'accion', 'pendiente'),
(22, 'Superman vs Batman', 'Acabo de ver la pelicula hace poco y me encanta la actuacion de Henry como superman y de Ben como Batman, son los mejores', '2021-01-16 16:33:58', 'admin', 'baja', 'accion', 'rechazado'),
(23, 'el hombre invisible', 'si alguno de ustedes tuviera el traje del hombre invisible que haria con el? Yo lo usuaria para pasar desapercibido en todas partes', '2021-01-16 09:09:09', 'admin', 'cerrado', 'suspenso', 'pendiente'),
(24, 'El niño de pijama de rayas', 'Es una pelicula muy controversial y trsite pues es algo que ya paso pero es feo ver todo lo que tuvieron que vivir los judíos todo por amor a Dios', '2021-01-16 07:07:07', 'admin', 'abierto', 'drama', 'pendiente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes`
--

CREATE TABLE `solicitudes` (
  `id_solicitud` int(11) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `idusuario` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `solicitudes`
--

INSERT INTO `solicitudes` (`id_solicitud`, `datetime`, `idusuario`) VALUES
(5, '2021-01-15 20:22:15', 'E14021216'),
(6, '2021-01-15 20:24:15', 'E16020840'),
(7, '2021-01-15 20:28:19', 'E15020557'),
(8, '2021-01-15 20:28:35', 'E16020843'),
(9, '2021-01-15 20:29:45', 'E16021485');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `numcontrol` varchar(9) NOT NULL,
  `nombres` varchar(30) NOT NULL,
  `apellidos` varchar(60) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `clave` varchar(50) NOT NULL,
  `estatus` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`numcontrol`, `nombres`, `apellidos`, `correo`, `clave`, `estatus`) VALUES
('root', 'Vanessa', 'Martinez Diaz', 'vane@hotmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 1), 
('E14021216', 'Gabino de Jesus', 'Gómez Ramos', 'gabinogr@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 1),
('E16020840', 'Raquel', 'Rodriguez Virgen', 'rarovi@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 1),
('E15020557', 'Eduardo Antonio', 'Hernandez Cabiedes', 'eddycab@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 1),
('E16020843', 'Jose Alonso', 'Falfan Rosete', 'eddycab@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 0),
('E16021485', 'Aldo Felipe', 'Eguan Marrufo', 'pitalua@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`idcomentario`),
  ADD KEY `idnumcontrol` (`idnumcontrol`,`idforo`),
  ADD KEY `idforo` (`idforo`);

--
-- Indices de la tabla `foros`
--
ALTER TABLE `foros`
  ADD PRIMARY KEY (`idforo`),
  ADD KEY `idusuario` (`idnumcontrol`);

--
-- Indices de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD PRIMARY KEY (`id_solicitud`),
  ADD KEY `idusuario` (`idusuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`numcontrol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `idcomentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `foros`
--
ALTER TABLE `foros`
  MODIFY `idforo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  MODIFY `id_solicitud` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`idnumcontrol`) REFERENCES `usuarios` (`numcontrol`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`idforo`) REFERENCES `foros` (`idforo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `foros`
--
ALTER TABLE `foros`
  ADD CONSTRAINT `foros_ibfk_1` FOREIGN KEY (`idnumcontrol`) REFERENCES `usuarios` (`numcontrol`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD CONSTRAINT `solicitudes_ibfk_1` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`numcontrol`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

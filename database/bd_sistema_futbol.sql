-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-11-2022 a las 11:46:56
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_sistema_futbol`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_administrativo`
--

CREATE TABLE `tbl_administrativo` (
  `id_admin` varchar(11) NOT NULL,
  `puesto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_administrativo`
--

INSERT INTO `tbl_administrativo` (`id_admin`, `puesto`) VALUES
('admin001', 'Gerente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_arbitro`
--

CREATE TABLE `tbl_arbitro` (
  `id_arbitro` varchar(50) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `disponibilidad` enum('Disponible','No Disponible') NOT NULL,
  `n_partidos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_arbitro`
--

INSERT INTO `tbl_arbitro` (`id_arbitro`, `direccion`, `disponibilidad`, `n_partidos`) VALUES
('ARB_001', '12a Avenida Norte, Departamento de San Miguel, El Salvador', 'Disponible', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_detalle_sancion`
--

CREATE TABLE `tbl_detalle_sancion` (
  `id_detalle` int(10) NOT NULL,
  `id_reporte` varchar(50) NOT NULL,
  `id_sancion` int(11) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `estado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_equipo`
--

CREATE TABLE `tbl_equipo` (
  `id_equipo` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `departamento` varchar(50) NOT NULL,
  `id_representante` varchar(50) NOT NULL,
  `n_ integrantes` int(11) NOT NULL,
  `id_indumentaria` varchar(50) NOT NULL,
  `n_sanciones` int(11) NOT NULL,
  `estado` enum('Activo','Inactivo','Suspendido') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_equipo`
--

INSERT INTO `tbl_equipo` (`id_equipo`, `nombre`, `direccion`, `departamento`, `id_representante`, `n_ integrantes`, `id_indumentaria`, `n_sanciones`, `estado`) VALUES
('EQP_MIG', 'Equipo Migueleño', 'Colonia. España', 'San Miguel', 'Repre_MIG', 11, '1', 0, 'Activo'),
('EQP_RIO', 'Equipo Rio de Janeiro', 'Col Santa Clarita', 'San Miguel', 'Repre-RIO', 11, '2', 0, 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_estadio`
--

CREATE TABLE `tbl_estadio` (
  `id_estadio` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `disponibilidad` enum('Disponible','No Disponible') NOT NULL,
  `encargado` varchar(50) NOT NULL,
  `telefono` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_estadio`
--

INSERT INTO `tbl_estadio` (`id_estadio`, `nombre`, `direccion`, `disponibilidad`, `encargado`, `telefono`) VALUES
(7, 'Estadio Juan Francisco Barraza', '12a Avenida Norte, Departamento de San Miguel, El Salvador.', 'Disponible', 'Alonso Castellanos', 76987777);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_horario`
--

CREATE TABLE `tbl_horario` (
  `id_horario` int(11) NOT NULL,
  `id_partido` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `h_inicio` time NOT NULL,
  `h_final` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_jugador`
--

CREATE TABLE `tbl_jugador` (
  `id_jugador` varchar(50) NOT NULL,
  `id_equipo` varchar(50) NOT NULL,
  `n_partidos` int(11) NOT NULL,
  `n_sanciones` int(11) NOT NULL,
  `n_goles` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_jugador`
--

INSERT INTO `tbl_jugador` (`id_jugador`, `id_equipo`, `n_partidos`, `n_sanciones`, `n_goles`) VALUES
('JUG_1', 'EQP_MIG', 0, 0, 0),
('JUG_ST', 'EQP_MIG', 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_partido`
--

CREATE TABLE `tbl_partido` (
  `id_partido` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `id_torneo` int(11) NOT NULL,
  `estado` enum('Finalizado','Pendiente') NOT NULL,
  `id_equipo1` varchar(50) NOT NULL,
  `id_equipo2` varchar(50) NOT NULL,
  `sol_equipo1` enum('Pendiente','Solventada') NOT NULL,
  `sol_equipo2` enum('Pendiente','Solventada') NOT NULL,
  `id_arbitro` varchar(50) NOT NULL,
  `id_representante1` varchar(50) NOT NULL,
  `id_representante2` varchar(50) NOT NULL,
  `n_goles1` int(11) NOT NULL,
  `n_goles2` int(11) NOT NULL,
  `estado_repre1` enum('Confirmado','Sin Confirmar') NOT NULL,
  `estado_repre2` enum('Confirmado','Sin Confirmar') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_partido`
--

INSERT INTO `tbl_partido` (`id_partido`, `nombre`, `id_torneo`, `estado`, `id_equipo1`, `id_equipo2`, `sol_equipo1`, `sol_equipo2`, `id_arbitro`, `id_representante1`, `id_representante2`, `n_goles1`, `n_goles2`, `estado_repre1`, `estado_repre2`) VALUES
(2, 'MIG_VS_RIO_26-11-2022', 1, 'Finalizado', 'EQP_MIG', 'EQP_RIO', 'Solventada', 'Solventada', 'ARB_001', 'EQP_MIGREPRE', 'EQP_RIOREPRE', 1, 0, 'Confirmado', 'Confirmado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_reporte`
--

CREATE TABLE `tbl_reporte` (
  `id_reporte` varchar(50) NOT NULL,
  `id_partido` int(11) NOT NULL,
  `n_tarjetas` int(11) NOT NULL,
  `observaciones` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_representante`
--

CREATE TABLE `tbl_representante` (
  `id_representante` varchar(50) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `id_equipo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_representante`
--

INSERT INTO `tbl_representante` (`id_representante`, `direccion`, `id_equipo`) VALUES
('Repre_MIG', 'Col Hirleman San Miguel', 'EQP_MIG');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_sanciones`
--

CREATE TABLE `tbl_sanciones` (
  `id_sancion` int(11) NOT NULL,
  `id_partido` int(11) NOT NULL,
  `id_arbitro` varchar(50) NOT NULL,
  `id_sancionado` varchar(50) NOT NULL,
  `categoria` enum('Liviana','Grave','Muy Grave') NOT NULL,
  `fecha_sancion` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `dias_penalizado` int(11) NOT NULL,
  `precio` double NOT NULL,
  `estado` enum('Pendiente','Absuelto','Cancelado') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_torneo`
--

CREATE TABLE `tbl_torneo` (
  `id_torneo` int(11) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_final` date NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_torneo`
--

INSERT INTO `tbl_torneo` (`id_torneo`, `fecha_inicio`, `fecha_final`, `nombre`) VALUES
(1, '2022-11-11', '2022-12-12', 'Torneo Prueba '),
(2, '2022-11-12', '2022-11-30', 'Torneo 2022'),
(3, '2022-11-13', '2022-12-30', 'Torneo 2022'),
(4, '2022-11-13', '2022-12-30', 'Torneo 2022');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuario`
--

CREATE TABLE `tbl_usuario` (
  `id_usuario` varchar(50) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `edad` int(11) NOT NULL,
  `telefono` int(11) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `rol` enum('Jugador','Administrador','Arbitro','Representante') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_usuario`
--

INSERT INTO `tbl_usuario` (`id_usuario`, `nombre`, `apellido`, `edad`, `telefono`, `correo`, `password`, `rol`) VALUES
('admin001', 'Juan', 'Romero', 30, 76892344, 'juanromero@gmail.com', '1234', 'Administrador'),
('ARB_001', 'Fernando', 'Mendez', 31, 76341234, 'FC@gmail.com', '1234', 'Arbitro'),
('JUG_1', 'Juan', 'Mendez', 23, 34567890, 'jose@gmail.com', '2345', 'Jugador'),
('JUG_ST', 'Sebastian', 'Treminio', 21, 34567890, 'st@gmail.com', '1234', 'Jugador'),
('Repre_MIG', 'Sebastian', 'Acosta', 31, 45671234, 'sa@gmail.com', '1234', 'Representante');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_administrativo`
--
ALTER TABLE `tbl_administrativo`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indices de la tabla `tbl_arbitro`
--
ALTER TABLE `tbl_arbitro`
  ADD PRIMARY KEY (`id_arbitro`);

--
-- Indices de la tabla `tbl_detalle_sancion`
--
ALTER TABLE `tbl_detalle_sancion`
  ADD PRIMARY KEY (`id_detalle`);

--
-- Indices de la tabla `tbl_equipo`
--
ALTER TABLE `tbl_equipo`
  ADD PRIMARY KEY (`id_equipo`);

--
-- Indices de la tabla `tbl_estadio`
--
ALTER TABLE `tbl_estadio`
  ADD PRIMARY KEY (`id_estadio`);

--
-- Indices de la tabla `tbl_horario`
--
ALTER TABLE `tbl_horario`
  ADD PRIMARY KEY (`id_horario`);

--
-- Indices de la tabla `tbl_jugador`
--
ALTER TABLE `tbl_jugador`
  ADD PRIMARY KEY (`id_jugador`);

--
-- Indices de la tabla `tbl_partido`
--
ALTER TABLE `tbl_partido`
  ADD PRIMARY KEY (`id_partido`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `tbl_reporte`
--
ALTER TABLE `tbl_reporte`
  ADD PRIMARY KEY (`id_reporte`);

--
-- Indices de la tabla `tbl_representante`
--
ALTER TABLE `tbl_representante`
  ADD PRIMARY KEY (`id_representante`);

--
-- Indices de la tabla `tbl_sanciones`
--
ALTER TABLE `tbl_sanciones`
  ADD PRIMARY KEY (`id_sancion`),
  ADD KEY `id_partido` (`id_partido`);

--
-- Indices de la tabla `tbl_torneo`
--
ALTER TABLE `tbl_torneo`
  ADD PRIMARY KEY (`id_torneo`);

--
-- Indices de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_detalle_sancion`
--
ALTER TABLE `tbl_detalle_sancion`
  MODIFY `id_detalle` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_estadio`
--
ALTER TABLE `tbl_estadio`
  MODIFY `id_estadio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tbl_horario`
--
ALTER TABLE `tbl_horario`
  MODIFY `id_horario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_partido`
--
ALTER TABLE `tbl_partido`
  MODIFY `id_partido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbl_sanciones`
--
ALTER TABLE `tbl_sanciones`
  MODIFY `id_sancion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_torneo`
--
ALTER TABLE `tbl_torneo`
  MODIFY `id_torneo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_administrativo`
--
ALTER TABLE `tbl_administrativo`
  ADD CONSTRAINT `tbl_administrativo_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `tbl_usuario` (`id_usuario`);

--
-- Filtros para la tabla `tbl_sanciones`
--
ALTER TABLE `tbl_sanciones`
  ADD CONSTRAINT `id_partido` FOREIGN KEY (`id_partido`) REFERENCES `tbl_partido` (`id_partido`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

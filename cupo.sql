-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-04-2022 a las 22:12:58
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cupo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area`
--

CREATE TABLE `area` (
  `idarea` int(4) NOT NULL,
  `nombrearea` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `descripcion` varchar(100) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Volcado de datos para la tabla `area`
--

INSERT INTO `area` (`idarea`, `nombrearea`, `descripcion`) VALUES
(1, 'Logística', 'Todo'),
(2, 'Ventas', 'Ventas'),
(3, 'Despacho', 'Despacho'),
(4, 'Gerencia', 'Gerencia'),
(5, 'Contabilidad', 'Contabilidad'),
(8, 'Auditoría', 'Auditoría'),
(9, 'Producción', 'Producción'),
(10, 'Operaciones', 'Operaciones');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `camiones`
--

CREATE TABLE `camiones` (
  `idcamion` bigint(20) NOT NULL,
  `codigo` varchar(20) COLLATE utf8_swedish_ci NOT NULL,
  `marca` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `modelo` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `color` varchar(25) COLLATE utf8_swedish_ci NOT NULL,
  `capacidad` decimal(4,2) NOT NULL,
  `planta` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Volcado de datos para la tabla `camiones`
--

INSERT INTO `camiones` (`idcamion`, `codigo`, `marca`, `modelo`, `color`, `capacidad`, `planta`) VALUES
(1, 'N200T', 'Nissan', 'NT200', 'Azul', '12.50', 0),
(12, 'LM20', 'Subaru', 'Imporeza', 'negro', '15.00', 2),
(13, '4p89', 'cxz', 'sere4', 'blue', '15.00', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cantidadcuposbloque`
--

CREATE TABLE `cantidadcuposbloque` (
  `cantidad_cupos_id` int(3) NOT NULL,
  `cantidad_cupos_codigo` varchar(5) NOT NULL,
  `cantidad_cupos_nombre` varchar(25) NOT NULL,
  `lunes_bloque_I` int(2) NOT NULL,
  `lunes_bloque_II` int(2) NOT NULL,
  `lunes_bloque_III` int(2) NOT NULL,
  `lunes_bloque_IV` int(2) NOT NULL,
  `lunes_bloque_V` int(2) NOT NULL,
  `martes_bloque_I` int(2) NOT NULL,
  `martes_bloque_II` int(2) NOT NULL,
  `martes_bloque_III` int(2) NOT NULL,
  `martes_bloque_IV` int(2) NOT NULL,
  `martes_bloque_V` int(2) NOT NULL,
  `miercoles_bloque_I` int(2) NOT NULL,
  `miercoles_bloque_II` int(2) NOT NULL,
  `miercoles_bloque_III` int(2) NOT NULL,
  `miercoles_bloque_IV` int(2) NOT NULL,
  `miercoles_bloque_V` int(2) NOT NULL,
  `jueves_bloque_I` int(2) NOT NULL,
  `jueves_bloque_II` int(2) NOT NULL,
  `jueves_bloque_III` int(2) NOT NULL,
  `jueves_bloque_IV` int(2) NOT NULL,
  `jueves_bloque_V` int(2) NOT NULL,
  `viernes_bloque_I` int(2) NOT NULL,
  `viernes_bloque_II` int(2) NOT NULL,
  `viernes_bloque_III` int(2) NOT NULL,
  `viernes_bloque_IV` int(2) NOT NULL,
  `viernes_bloque_V` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cantidadcuposbloque`
--

INSERT INTO `cantidadcuposbloque` (`cantidad_cupos_id`, `cantidad_cupos_codigo`, `cantidad_cupos_nombre`, `lunes_bloque_I`, `lunes_bloque_II`, `lunes_bloque_III`, `lunes_bloque_IV`, `lunes_bloque_V`, `martes_bloque_I`, `martes_bloque_II`, `martes_bloque_III`, `martes_bloque_IV`, `martes_bloque_V`, `miercoles_bloque_I`, `miercoles_bloque_II`, `miercoles_bloque_III`, `miercoles_bloque_IV`, `miercoles_bloque_V`, `jueves_bloque_I`, `jueves_bloque_II`, `jueves_bloque_III`, `jueves_bloque_IV`, `jueves_bloque_V`, `viernes_bloque_I`, `viernes_bloque_II`, `viernes_bloque_III`, `viernes_bloque_IV`, `viernes_bloque_V`) VALUES
(1, 'CCRPG', 'rastras planta guazapa', 1, 1, 1, 0, 0, 1, 1, 1, 0, 0, 1, 1, 1, 0, 0, 1, 1, 1, 0, 0, 1, 1, 1, 0, 0),
(2, 'CCRPJ', 'rastras planta jiboa', 1, 1, 1, 0, 0, 1, 1, 1, 0, 0, 1, 1, 1, 0, 0, 1, 1, 1, 0, 0, 1, 1, 1, 0, 0),
(3, 'CCCPG', 'camiones planta guazapa', 1, 1, 1, 0, 0, 1, 1, 1, 0, 0, 1, 1, 1, 0, 0, 1, 1, 1, 0, 0, 1, 1, 1, 0, 0),
(4, 'CCCPJ', 'camiones planta jiboa', 1, 1, 1, 0, 0, 1, 1, 1, 0, 0, 1, 1, 1, 0, 0, 1, 1, 1, 0, 0, 1, 1, 1, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cupos_camiones`
--

CREATE TABLE `cupos_camiones` (
  `id_cupo` bigint(20) NOT NULL,
  `tipo_transporte` int(1) NOT NULL,
  `anio` int(4) NOT NULL,
  `mes` int(2) NOT NULL,
  `semana` int(2) NOT NULL,
  `dia` int(1) NOT NULL,
  `bloque` int(1) NOT NULL,
  `sub_bloque` int(3) NOT NULL,
  `estado` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `nombre_asesor` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `nombre_cliente` varchar(200) COLLATE utf8_swedish_ci NOT NULL,
  `tipo_logistica` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `nombre_receptor` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `contacto_receptor` int(8) NOT NULL,
  `departamento_receptor` varchar(25) COLLATE utf8_swedish_ci NOT NULL,
  `municipio_receptor` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `direccion_receptor` varchar(200) COLLATE utf8_swedish_ci NOT NULL,
  `motorista` varchar(200) COLLATE utf8_swedish_ci NOT NULL,
  `camion` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `capacidad` double(10,2) NOT NULL,
  `hora_asignada` varchar(8) COLLATE utf8_swedish_ci NOT NULL,
  `hora_inicio` varchar(8) COLLATE utf8_swedish_ci NOT NULL,
  `hora_entrada` varchar(10) COLLATE utf8_swedish_ci NOT NULL,
  `hora_finalizacion` varchar(8) COLLATE utf8_swedish_ci NOT NULL,
  `hora_salida` varchar(10) COLLATE utf8_swedish_ci NOT NULL,
  `tiempo_estimado` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `tiempo_duracion` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `cotizacion` varchar(200) COLLATE utf8_swedish_ci NOT NULL,
  `ruta` varchar(200) COLLATE utf8_swedish_ci NOT NULL,
  `quintales` double(11,4) NOT NULL,
  `flete` double(11,4) NOT NULL,
  `observacion_asignacion` varchar(800) COLLATE utf8_swedish_ci NOT NULL,
  `observacion_ejecucion` varchar(800) COLLATE utf8_swedish_ci NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Volcado de datos para la tabla `cupos_camiones`
--

INSERT INTO `cupos_camiones` (`id_cupo`, `tipo_transporte`, `anio`, `mes`, `semana`, `dia`, `bloque`, `sub_bloque`, `estado`, `nombre_asesor`, `nombre_cliente`, `tipo_logistica`, `nombre_receptor`, `contacto_receptor`, `departamento_receptor`, `municipio_receptor`, `direccion_receptor`, `motorista`, `camion`, `capacidad`, `hora_asignada`, `hora_inicio`, `hora_entrada`, `hora_finalizacion`, `hora_salida`, `tiempo_estimado`, `tiempo_duracion`, `cotizacion`, `ruta`, `quintales`, `flete`, `observacion_asignacion`, `observacion_ejecucion`, `fecha`) VALUES
(1138, 3, 2022, 4, 14, 3, 1, 1, '', '', '', '', '', 0, '', '', '', '', '', 0.00, '', '', '', '', '', '', '', 'portada_categoria.png', '', 0.0000, 0.0000, '', '', '2022-04-06'),
(1139, 3, 2022, 4, 14, 3, 1, 2, '', '', '', '', '', 0, '', '', '', '', '', 0.00, '', '', '', '', '', '', '', 'portada_categoria.png', '', 0.0000, 0.0000, '', '', '2022-04-06'),
(1140, 3, 2022, 4, 14, 3, 2, 1, '', '', '', '', '', 0, '', '', '', '', '', 0.00, '', '', '', '', '', '', '', 'portada_categoria.png', '', 0.0000, 0.0000, '', '', '2022-04-06'),
(1141, 3, 2022, 4, 14, 3, 2, 2, '', '', '', '', '', 0, '', '', '', '', '', 0.00, '', '', '', '', '', '', '', 'portada_categoria.png', '', 0.0000, 0.0000, '', '', '2022-04-06'),
(1142, 3, 2022, 4, 14, 3, 3, 1, '', '', '', '', '', 0, '', '', '', '', '', 0.00, '', '', '', '', '', '', '', 'portada_categoria.png', '', 0.0000, 0.0000, '', '', '2022-04-06'),
(1143, 3, 2022, 4, 14, 3, 3, 2, '', '', '', '', '', 0, '', '', '', '', '', 0.00, '', '', '', '', '', '', '', 'portada_categoria.png', '', 0.0000, 0.0000, '', '', '2022-04-06'),
(1144, 3, 2022, 4, 14, 4, 1, 1, '', '', '', '', '', 0, '', '', '', '', '', 0.00, '', '', '', '', '', '', '', 'portada_categoria.png', '', 0.0000, 0.0000, '', '', '2022-04-07'),
(1145, 3, 2022, 4, 14, 4, 1, 2, '', '', '', '', '', 0, '', '', '', '', '', 0.00, '', '', '', '', '', '', '', 'portada_categoria.png', '', 0.0000, 0.0000, '', '', '2022-04-07'),
(1146, 3, 2022, 4, 14, 4, 2, 1, '', '', '', '', '', 0, '', '', '', '', '', 0.00, '', '', '', '', '', '', '', 'portada_categoria.png', '', 0.0000, 0.0000, '', '', '2022-04-07'),
(1147, 3, 2022, 4, 14, 4, 2, 2, '', '', '', '', '', 0, '', '', '', '', '', 0.00, '', '', '', '', '', '', '', 'portada_categoria.png', '', 0.0000, 0.0000, '', '', '2022-04-07'),
(1148, 3, 2022, 4, 14, 4, 3, 1, '', '', '', '', '', 0, '', '', '', '', '', 0.00, '', '', '', '', '', '', '', 'portada_categoria.png', '', 0.0000, 0.0000, '', '', '2022-04-07'),
(1149, 3, 2022, 4, 14, 4, 3, 2, '', '', '', '', '', 0, '', '', '', '', '', 0.00, '', '', '', '', '', '', '', 'portada_categoria.png', '', 0.0000, 0.0000, '', '', '2022-04-07'),
(1150, 3, 2022, 4, 14, 2, 1, 1, '', '', '', '', '', 0, '', '', '', '', '', 0.00, '', '', '', '', '', '', '', 'portada_categoria.png', '', 0.0000, 0.0000, '', '', '2022-04-05'),
(1151, 3, 2022, 4, 14, 2, 1, 2, '', '', '', '', '', 0, '', '', '', '', '', 0.00, '', '', '', '', '', '', '', 'portada_categoria.png', '', 0.0000, 0.0000, '', '', '2022-04-05'),
(1152, 3, 2022, 4, 14, 2, 2, 1, '', '', '', '', '', 0, '', '', '', '', '', 0.00, '', '', '', '', '', '', '', 'portada_categoria.png', '', 0.0000, 0.0000, '', '', '2022-04-05'),
(1153, 3, 2022, 4, 14, 2, 2, 2, '', '', '', '', '', 0, '', '', '', '', '', 0.00, '', '', '', '', '', '', '', 'portada_categoria.png', '', 0.0000, 0.0000, '', '', '2022-04-05'),
(1154, 3, 2022, 4, 14, 2, 3, 1, '', '', '', '', '', 0, '', '', '', '', '', 0.00, '', '', '', '', '', '', '', 'portada_categoria.png', '', 0.0000, 0.0000, '', '', '2022-04-05'),
(1155, 3, 2022, 4, 14, 2, 3, 2, '', '', '', '', '', 0, '', '', '', '', '', 0.00, '', '', '', '', '', '', '', 'portada_categoria.png', '', 0.0000, 0.0000, '', '', '2022-04-05'),
(1156, 3, 2022, 4, 14, 5, 1, 1, '', '', '', '', '', 0, '', '', '', '', '', 0.00, '', '', '', '', '', '', '', 'portada_categoria.png', '', 0.0000, 0.0000, '', '', '2022-04-08'),
(1157, 3, 2022, 4, 14, 5, 1, 2, 'Programado', 'No Asignado', 'CLIENTE 002', 'Transporte propio', '', 0, '', '', '', '', '', 0.00, '06:00', '', '', '', '', '', '', 'cupo_b9fd97fc4737ea9ccfca738f39646e29.pdf', '1157', 0.0000, 0.0000, '', '', '2022-04-08'),
(1158, 3, 2022, 4, 14, 5, 2, 1, '', '', '', '', '', 0, '', '', '', '', '', 0.00, '', '', '', '', '', '', '', 'portada_categoria.png', '', 0.0000, 0.0000, '', '', '2022-04-08'),
(1159, 3, 2022, 4, 14, 5, 2, 2, '', '', '', '', '', 0, '', '', '', '', '', 0.00, '', '', '', '', '', '', '', 'portada_categoria.png', '', 0.0000, 0.0000, '', '', '2022-04-08'),
(1160, 3, 2022, 4, 14, 5, 3, 1, '', '', '', '', '', 0, '', '', '', '', '', 0.00, '', '', '', '', '', '', '', 'portada_categoria.png', '', 0.0000, 0.0000, '', '', '2022-04-08'),
(1161, 3, 2022, 4, 14, 5, 3, 2, '', '', '', '', '', 0, '', '', '', '', '', 0.00, '', '', '', '', '', '', '', 'portada_categoria.png', '', 0.0000, 0.0000, '', '', '2022-04-08'),
(1162, 3, 2022, 4, 14, 1, 1, 1, 'Programado', 'José Renderos', 'CLIENTE 002', 'Transporte propio', '', 0, '', '', '', '', '', 0.00, '06:00', '', '', '', '', '', '', 'cupo_51e1aa65ae34535ae54e07998ae80945.pdf', '1162', 0.0000, 0.0000, '', '', '2022-04-04'),
(1163, 3, 2022, 4, 14, 1, 1, 2, 'Programado', 'Jairo Figueroa', 'CLIENTE 001', 'Domicilio', 'Juan Aguirre', 24838463, 'San Miguel', 'Quelepa', '5230 de la calle Evergreen 2', '', '', 0.00, '07:00', '', '', '', '', '', '', 'cupo_5b6200abe643c47157bcbef9831e19f5.pdf', '1163', 0.3800, 0.3800, '', '', '2022-04-04'),
(1164, 3, 2022, 4, 14, 1, 2, 1, '', '', '', '', '', 0, '', '', '', '', '', 0.00, '', '', '', '', '', '', '', 'portada_categoria.png', '', 0.0000, 0.0000, '', '', '2022-04-04'),
(1165, 3, 2022, 4, 14, 1, 2, 2, '', '', '', '', '', 0, '', '', '', '', '', 0.00, '', '', '', '', '', '', '', 'portada_categoria.png', '', 0.0000, 0.0000, '', '', '2022-04-04'),
(1166, 3, 2022, 4, 14, 1, 3, 1, '', '', '', '', '', 0, '', '', '', '', '', 0.00, '', '', '', '', '', '', '', 'portada_categoria.png', '', 0.0000, 0.0000, '', '', '2022-04-04'),
(1167, 3, 2022, 4, 14, 1, 3, 2, '', '', '', '', '', 0, '', '', '', '', '', 0.00, '', '', '', '', '', '', '', 'portada_categoria.png', '', 0.0000, 0.0000, '', '', '2022-04-04'),
(1168, 4, 2022, 4, 14, 2, 1, 1, '', '', '', '', '', 0, '', '', '', '', '', 0.00, '', '', '', '', '', '', '', 'portada_categoria.png', '', 0.0000, 0.0000, '', '', '2022-04-05'),
(1169, 4, 2022, 4, 14, 2, 1, 2, '', '', '', '', '', 0, '', '', '', '', '', 0.00, '', '', '', '', '', '', '', 'portada_categoria.png', '', 0.0000, 0.0000, '', '', '2022-04-05'),
(1170, 4, 2022, 4, 14, 2, 2, 1, '', '', '', '', '', 0, '', '', '', '', '', 0.00, '', '', '', '', '', '', '', 'portada_categoria.png', '', 0.0000, 0.0000, '', '', '2022-04-05'),
(1171, 4, 2022, 4, 14, 2, 2, 2, '', '', '', '', '', 0, '', '', '', '', '', 0.00, '', '', '', '', '', '', '', 'portada_categoria.png', '', 0.0000, 0.0000, '', '', '2022-04-05'),
(1172, 4, 2022, 4, 14, 2, 3, 1, '', '', '', '', '', 0, '', '', '', '', '', 0.00, '', '', '', '', '', '', '', 'portada_categoria.png', '', 0.0000, 0.0000, '', '', '2022-04-05'),
(1173, 4, 2022, 4, 14, 2, 3, 2, '', '', '', '', '', 0, '', '', '', '', '', 0.00, '', '', '', '', '', '', '', 'portada_categoria.png', '', 0.0000, 0.0000, '', '', '2022-04-05'),
(1174, 4, 2022, 4, 14, 1, 1, 1, '', '', '', '', '', 0, '', '', '', '', '', 0.00, '', '', '', '', '', '', '', 'portada_categoria.png', '', 0.0000, 0.0000, '', '', '2022-04-04'),
(1175, 4, 2022, 4, 14, 1, 1, 2, '', '', '', '', '', 0, '', '', '', '', '', 0.00, '', '', '', '', '', '', '', 'portada_categoria.png', '', 0.0000, 0.0000, '', '', '2022-04-04'),
(1176, 4, 2022, 4, 14, 1, 2, 1, '', '', '', '', '', 0, '', '', '', '', '', 0.00, '', '', '', '', '', '', '', 'portada_categoria.png', '', 0.0000, 0.0000, '', '', '2022-04-04'),
(1177, 4, 2022, 4, 14, 1, 2, 2, '', '', '', '', '', 0, '', '', '', '', '', 0.00, '', '', '', '', '', '', '', 'portada_categoria.png', '', 0.0000, 0.0000, '', '', '2022-04-04'),
(1178, 4, 2022, 4, 14, 1, 3, 1, 'Programado', 'No Asignado', 'CLIENTE 002', 'Transporte propio', '', 0, '', '', '', '', '', 0.00, '14:00', '', '', '', '', '', '', 'cupo_731477b43c8722c0305fafc377e36850.pdf', '1178', 0.0000, 0.0000, '', '', '2022-04-04'),
(1179, 4, 2022, 4, 14, 1, 3, 2, 'Programado', 'No Asignado', 'CLIENTE 001', 'Transporte propio', '', 0, '', '', '', '', '', 0.00, '14:00', '', '', '', '', '', '', 'cupo_f8b1b7a3793f322159e7b0a13eb32338.pdf', '1179', 0.0000, 0.0000, '', '', '2022-04-04'),
(1180, 4, 2022, 4, 14, 3, 1, 1, '', '', '', '', '', 0, '', '', '', '', '', 0.00, '', '', '', '', '', '', '', 'portada_categoria.png', '', 0.0000, 0.0000, '', '', '2022-04-06'),
(1181, 4, 2022, 4, 14, 3, 1, 2, '', '', '', '', '', 0, '', '', '', '', '', 0.00, '', '', '', '', '', '', '', 'portada_categoria.png', '', 0.0000, 0.0000, '', '', '2022-04-06'),
(1182, 4, 2022, 4, 14, 3, 2, 1, '', '', '', '', '', 0, '', '', '', '', '', 0.00, '', '', '', '', '', '', '', 'portada_categoria.png', '', 0.0000, 0.0000, '', '', '2022-04-06'),
(1183, 4, 2022, 4, 14, 3, 2, 2, '', '', '', '', '', 0, '', '', '', '', '', 0.00, '', '', '', '', '', '', '', 'portada_categoria.png', '', 0.0000, 0.0000, '', '', '2022-04-06'),
(1184, 4, 2022, 4, 14, 3, 3, 1, '', '', '', '', '', 0, '', '', '', '', '', 0.00, '', '', '', '', '', '', '', 'portada_categoria.png', '', 0.0000, 0.0000, '', '', '2022-04-06'),
(1185, 4, 2022, 4, 14, 3, 3, 2, '', '', '', '', '', 0, '', '', '', '', '', 0.00, '', '', '', '', '', '', '', 'portada_categoria.png', '', 0.0000, 0.0000, '', '', '2022-04-06'),
(1186, 4, 2022, 4, 14, 3, 4, 1, '', '', '', '', '', 0, '', '', '', '', '', 0.00, '', '', '', '', '', '', '', 'portada_categoria.png', '', 0.0000, 0.0000, '', '', '2022-04-06'),
(1187, 4, 2022, 4, 14, 3, 4, 2, '', '', '', '', '', 0, '', '', '', '', '', 0.00, '', '', '', '', '', '', '', 'portada_categoria.png', '', 0.0000, 0.0000, '', '', '2022-04-06'),
(1188, 4, 2022, 4, 14, 5, 1, 1, '', '', '', '', '', 0, '', '', '', '', '', 0.00, '', '', '', '', '', '', '', 'portada_categoria.png', '', 0.0000, 0.0000, '', '', '2022-04-08'),
(1189, 4, 2022, 4, 14, 5, 1, 2, '', '', '', '', '', 0, '', '', '', '', '', 0.00, '', '', '', '', '', '', '', 'portada_categoria.png', '', 0.0000, 0.0000, '', '', '2022-04-08'),
(1190, 4, 2022, 4, 14, 5, 2, 1, '', '', '', '', '', 0, '', '', '', '', '', 0.00, '', '', '', '', '', '', '', 'portada_categoria.png', '', 0.0000, 0.0000, '', '', '2022-04-08'),
(1191, 4, 2022, 4, 14, 5, 2, 2, '', '', '', '', '', 0, '', '', '', '', '', 0.00, '', '', '', '', '', '', '', 'portada_categoria.png', '', 0.0000, 0.0000, '', '', '2022-04-08'),
(1192, 4, 2022, 4, 14, 5, 3, 1, '', '', '', '', '', 0, '', '', '', '', '', 0.00, '', '', '', '', '', '', '', 'portada_categoria.png', '', 0.0000, 0.0000, '', '', '2022-04-08'),
(1193, 4, 2022, 4, 14, 5, 3, 2, '', '', '', '', '', 0, '', '', '', '', '', 0.00, '', '', '', '', '', '', '', 'portada_categoria.png', '', 0.0000, 0.0000, '', '', '2022-04-08'),
(1194, 4, 2022, 4, 14, 4, 1, 1, '', '', '', '', '', 0, '', '', '', '', '', 0.00, '', '', '', '', '', '', '', 'portada_categoria.png', '', 0.0000, 0.0000, '', '', '2022-04-07'),
(1195, 4, 2022, 4, 14, 4, 1, 2, '', '', '', '', '', 0, '', '', '', '', '', 0.00, '', '', '', '', '', '', '', 'portada_categoria.png', '', 0.0000, 0.0000, '', '', '2022-04-07'),
(1196, 4, 2022, 4, 14, 4, 2, 1, '', '', '', '', '', 0, '', '', '', '', '', 0.00, '', '', '', '', '', '', '', 'portada_categoria.png', '', 0.0000, 0.0000, '', '', '2022-04-07'),
(1197, 4, 2022, 4, 14, 4, 2, 2, '', '', '', '', '', 0, '', '', '', '', '', 0.00, '', '', '', '', '', '', '', 'portada_categoria.png', '', 0.0000, 0.0000, '', '', '2022-04-07'),
(1198, 4, 2022, 4, 14, 4, 3, 1, '', '', '', '', '', 0, '', '', '', '', '', 0.00, '', '', '', '', '', '', '', 'portada_categoria.png', '', 0.0000, 0.0000, '', '', '2022-04-07'),
(1199, 4, 2022, 4, 14, 4, 3, 2, '', '', '', '', '', 0, '', '', '', '', '', 0.00, '', '', '', '', '', '', '', 'portada_categoria.png', '', 0.0000, 0.0000, '', '', '2022-04-07'),
(1202, 3, 2022, 4, 15, 1, 1, 1, '', '', '', '', '', 0, '', '', '', '', '', 0.00, '', '', '', '', '', '', '', 'portada_categoria.png', '', 0.0000, 0.0000, '', '', '2022-04-11'),
(1203, 3, 2022, 4, 15, 1, 2, 1, '', '', '', '', '', 0, '', '', '', '', '', 0.00, '', '', '', '', '', '', '', 'portada_categoria.png', '', 0.0000, 0.0000, '', '', '2022-04-11'),
(1204, 3, 2022, 4, 15, 1, 3, 1, '', '', '', '', '', 0, '', '', '', '', '', 0.00, '', '', '', '', '', '', '', 'portada_categoria.png', '', 0.0000, 0.0000, '', '', '2022-04-11'),
(1205, 3, 2022, 4, 15, 2, 1, 1, '', '', '', '', '', 0, '', '', '', '', '', 0.00, '', '', '', '', '', '', '', 'portada_categoria.png', '', 0.0000, 0.0000, '', '', '2022-04-12'),
(1206, 3, 2022, 4, 15, 2, 2, 1, '', '', '', '', '', 0, '', '', '', '', '', 0.00, '', '', '', '', '', '', '', 'portada_categoria.png', '', 0.0000, 0.0000, '', '', '2022-04-12'),
(1207, 3, 2022, 4, 15, 2, 3, 1, '', '', '', '', '', 0, '', '', '', '', '', 0.00, '', '', '', '', '', '', '', 'portada_categoria.png', '', 0.0000, 0.0000, '', '', '2022-04-12'),
(1208, 3, 2022, 4, 15, 3, 1, 1, '', '', '', '', '', 0, '', '', '', '', '', 0.00, '', '', '', '', '', '', '', 'portada_categoria.png', '', 0.0000, 0.0000, '', '', '2022-04-13'),
(1209, 3, 2022, 4, 15, 3, 2, 1, '', '', '', '', '', 0, '', '', '', '', '', 0.00, '', '', '', '', '', '', '', 'portada_categoria.png', '', 0.0000, 0.0000, '', '', '2022-04-13'),
(1210, 3, 2022, 4, 15, 3, 3, 1, '', '', '', '', '', 0, '', '', '', '', '', 0.00, '', '', '', '', '', '', '', 'portada_categoria.png', '', 0.0000, 0.0000, '', '', '2022-04-13'),
(1211, 3, 2022, 4, 15, 4, 1, 1, '', '', '', '', '', 0, '', '', '', '', '', 0.00, '', '', '', '', '', '', '', 'portada_categoria.png', '', 0.0000, 0.0000, '', '', '2022-04-14'),
(1212, 3, 2022, 4, 15, 4, 2, 1, '', '', '', '', '', 0, '', '', '', '', '', 0.00, '', '', '', '', '', '', '', 'portada_categoria.png', '', 0.0000, 0.0000, '', '', '2022-04-14'),
(1213, 3, 2022, 4, 15, 4, 3, 1, '', '', '', '', '', 0, '', '', '', '', '', 0.00, '', '', '', '', '', '', '', 'portada_categoria.png', '', 0.0000, 0.0000, '', '', '2022-04-14'),
(1214, 3, 2022, 4, 15, 5, 1, 1, '', '', '', '', '', 0, '', '', '', '', '', 0.00, '', '', '', '', '', '', '', 'portada_categoria.png', '', 0.0000, 0.0000, '', '', '2022-04-15'),
(1215, 3, 2022, 4, 15, 5, 2, 1, '', '', '', '', '', 0, '', '', '', '', '', 0.00, '', '', '', '', '', '', '', 'portada_categoria.png', '', 0.0000, 0.0000, '', '', '2022-04-15'),
(1216, 3, 2022, 4, 15, 5, 3, 1, '', '', '', '', '', 0, '', '', '', '', '', 0.00, '', '', '', '', '', '', '', 'portada_categoria.png', '', 0.0000, 0.0000, '', '', '2022-04-15'),
(1217, 4, 2022, 4, 15, 3, 1, 1, '', '', '', '', '', 0, '', '', '', '', '', 0.00, '', '', '', '', '', '', '', 'portada_categoria.png', '', 0.0000, 0.0000, '', '', '2022-04-13'),
(1218, 4, 2022, 4, 15, 3, 2, 1, '', '', '', '', '', 0, '', '', '', '', '', 0.00, '', '', '', '', '', '', '', 'portada_categoria.png', '', 0.0000, 0.0000, '', '', '2022-04-13'),
(1219, 4, 2022, 4, 15, 3, 3, 1, '', '', '', '', '', 0, '', '', '', '', '', 0.00, '', '', '', '', '', '', '', 'portada_categoria.png', '', 0.0000, 0.0000, '', '', '2022-04-13'),
(1220, 4, 2022, 4, 15, 2, 1, 1, '', '', '', '', '', 0, '', '', '', '', '', 0.00, '', '', '', '', '', '', '', 'portada_categoria.png', '', 0.0000, 0.0000, '', '', '2022-04-12'),
(1221, 4, 2022, 4, 15, 2, 2, 1, '', '', '', '', '', 0, '', '', '', '', '', 0.00, '', '', '', '', '', '', '', 'portada_categoria.png', '', 0.0000, 0.0000, '', '', '2022-04-12'),
(1222, 4, 2022, 4, 15, 2, 3, 1, '', '', '', '', '', 0, '', '', '', '', '', 0.00, '', '', '', '', '', '', '', 'portada_categoria.png', '', 0.0000, 0.0000, '', '', '2022-04-12'),
(1223, 4, 2022, 4, 15, 1, 1, 1, '', '', '', '', '', 0, '', '', '', '', '', 0.00, '', '', '', '', '', '', '', 'portada_categoria.png', '', 0.0000, 0.0000, '', '', '2022-04-11'),
(1224, 4, 2022, 4, 15, 1, 2, 1, '', '', '', '', '', 0, '', '', '', '', '', 0.00, '', '', '', '', '', '', '', 'portada_categoria.png', '', 0.0000, 0.0000, '', '', '2022-04-11'),
(1225, 4, 2022, 4, 15, 1, 3, 1, '', '', '', '', '', 0, '', '', '', '', '', 0.00, '', '', '', '', '', '', '', 'portada_categoria.png', '', 0.0000, 0.0000, '', '', '2022-04-11'),
(1226, 4, 2022, 4, 15, 5, 1, 1, '', '', '', '', '', 0, '', '', '', '', '', 0.00, '', '', '', '', '', '', '', 'portada_categoria.png', '', 0.0000, 0.0000, '', '', '2022-04-15'),
(1227, 4, 2022, 4, 15, 5, 2, 1, '', '', '', '', '', 0, '', '', '', '', '', 0.00, '', '', '', '', '', '', '', 'portada_categoria.png', '', 0.0000, 0.0000, '', '', '2022-04-15'),
(1228, 4, 2022, 4, 15, 5, 3, 1, '', '', '', '', '', 0, '', '', '', '', '', 0.00, '', '', '', '', '', '', '', 'portada_categoria.png', '', 0.0000, 0.0000, '', '', '2022-04-15'),
(1229, 4, 2022, 4, 15, 4, 1, 1, '', '', '', '', '', 0, '', '', '', '', '', 0.00, '', '', '', '', '', '', '', 'portada_categoria.png', '', 0.0000, 0.0000, '', '', '2022-04-14'),
(1230, 4, 2022, 4, 15, 4, 2, 1, '', '', '', '', '', 0, '', '', '', '', '', 0.00, '', '', '', '', '', '', '', 'portada_categoria.png', '', 0.0000, 0.0000, '', '', '2022-04-14'),
(1231, 4, 2022, 4, 15, 4, 3, 1, '', '', '', '', '', 0, '', '', '', '', '', 0.00, '', '', '', '', '', '', '', 'portada_categoria.png', '', 0.0000, 0.0000, '', '', '2022-04-14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cupos_rastras`
--

CREATE TABLE `cupos_rastras` (
  `id_cupo` int(12) NOT NULL,
  `tipo_transporte` int(2) NOT NULL,
  `anio` int(4) NOT NULL,
  `mes` int(2) NOT NULL,
  `semana` int(2) NOT NULL,
  `dia` int(2) NOT NULL,
  `bloque` int(2) NOT NULL,
  `sub_bloque` int(2) NOT NULL,
  `hora_asignada` varchar(20) NOT NULL,
  `nombre_cliente` varchar(100) NOT NULL,
  `nombre_asesor` varchar(100) NOT NULL,
  `tipo_carga` varchar(50) NOT NULL,
  `metodo_carga` varchar(50) NOT NULL,
  `cotizacion` varchar(150) NOT NULL,
  `ruta` varchar(250) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `tiempo_estipulado` varchar(10) NOT NULL,
  `tendidos_tarimas` int(2) NOT NULL,
  `capacidad_tarimas` int(3) NOT NULL,
  `cantidad_tarimas` int(2) NOT NULL,
  `quintales` double(11,4) NOT NULL,
  `flete` double(11,4) NOT NULL,
  `hora_entrada` varchar(10) NOT NULL,
  `hora_inicio` varchar(10) NOT NULL,
  `hora_finalizacion` varchar(10) NOT NULL,
  `hora_salida` varchar(10) NOT NULL,
  `tiempo_duracion` varchar(7) NOT NULL,
  `observacion_cupo` varchar(500) NOT NULL,
  `observacion_ejecucion` varchar(500) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cupos_rastras`
--

INSERT INTO `cupos_rastras` (`id_cupo`, `tipo_transporte`, `anio`, `mes`, `semana`, `dia`, `bloque`, `sub_bloque`, `hora_asignada`, `nombre_cliente`, `nombre_asesor`, `tipo_carga`, `metodo_carga`, `cotizacion`, `ruta`, `estado`, `tiempo_estipulado`, `tendidos_tarimas`, `capacidad_tarimas`, `cantidad_tarimas`, `quintales`, `flete`, `hora_entrada`, `hora_inicio`, `hora_finalizacion`, `hora_salida`, `tiempo_duracion`, `observacion_cupo`, `observacion_ejecucion`, `fecha`) VALUES
(1088, 1, 2022, 4, 14, 2, 1, 1, '', '', '', 'No paga carga', '', 'portada_categoria.png', '', 'Finalizado', '', 0, 0, 0, 0.0000, 0.0000, '06:15', '07:55', '09:30', '11:00', '', '', '', '2022-04-05'),
(1089, 1, 2022, 4, 14, 2, 1, 2, '', '', '', 'No paga carga', '', 'portada_categoria.png', '', 'Finalizado', '', 0, 0, 0, 0.0000, 0.0000, '06:15', '07:50', '09:30', '11:00', '', '', '', '2022-04-05'),
(1090, 1, 2022, 4, 14, 2, 2, 1, '', '', '', 'No paga carga', '', 'portada_categoria.png', '', 'Finalizado', '', 0, 0, 0, 0.0000, 0.0000, '06:15', '07:50', '09:45', '11:00', '', '', '', '2022-04-05'),
(1091, 1, 2022, 4, 14, 2, 2, 2, '', '', '', 'No paga carga', '', 'portada_categoria.png', '', 'Finalizado', '', 0, 0, 0, 0.0000, 0.0000, '06:15', '07:50', '09:30', '11:00', '', '', '', '2022-04-05'),
(1092, 1, 2022, 4, 14, 2, 3, 1, '02:00', 'CLIENTE 001', 'No Asignado', 'No paga carga', 'Granel', 'cupo_b296e7159b35c19a067b58e25151cb8b.pdf', '1092', 'Programado', '', 0, 0, 0, 0.0000, 0.0000, '06:15', '07:50', '09:30', '11:00', '', '', '', '2022-04-05'),
(1093, 1, 2022, 4, 14, 2, 3, 2, '02:05', 'CLIENTE 001', 'No Asignado', 'No paga carga', 'Granel', 'cupo_6b12506a5e9eb5340846bcab6627ec60.pdf', '1093', 'Programado', '', 0, 0, 0, 0.0000, 0.0000, '06:15', '07:50', '09:30', '11:00', '', '', '', '2022-04-05'),
(1094, 1, 2022, 4, 14, 4, 1, 1, '', '', '', 'Paga carga', '', 'portada_categoria.png', '', 'Finalizado', '', 0, 0, 0, 0.0000, 0.0000, '01:00', '12:30', '14:30', '03:00', '', '', '', '2022-04-07'),
(1095, 1, 2022, 4, 14, 4, 1, 2, '', '', '', 'Paga carga', '', 'portada_categoria.png', '', 'Finalizado', '', 0, 0, 0, 0.0000, 0.0000, '01:00', '12:30', '14:30', '03:00', '', '', '', '2022-04-07'),
(1096, 1, 2022, 4, 14, 4, 2, 1, '', '', '', 'Paga carga', '', 'portada_categoria.png', '', 'Finalizado', '', 0, 0, 0, 0.0000, 0.0000, '01:00', '12:30', '14:30', '03:00', '', '', '', '2022-04-07'),
(1097, 1, 2022, 4, 14, 4, 2, 2, '', '', '', 'Paga carga', '', 'portada_categoria.png', '', 'Finalizado', '', 0, 0, 0, 0.0000, 0.0000, '01:00', '12:30', '14:30', '03:00', '', '', '', '2022-04-01'),
(1098, 1, 2022, 4, 14, 4, 3, 1, ':15', 'CLIENTE 002', 'No Asignado', 'Paga carga', 'Tarima', 'cupo_bf6ea00c198672f61b640461f690e257.pdf', '1098', 'Programado', '', 6, 14, 12, 0.0000, 0.0000, '01:00', '12:30', '14:30', '03:00', '', '', '', '2022-04-07'),
(1099, 1, 2022, 4, 14, 4, 3, 2, '13:00', 'CLIENTE 002', 'No Asignado', 'Paga carga', 'Granel', 'cupo_d2c90952ac71dea73fdab5207ce3bdb1.pdf', '1099', 'Programado', '', 0, 0, 0, 0.0000, 0.0000, '01:00', '12:30', '14:30', '03:00', '', '', '', '2022-04-07'),
(1100, 1, 2022, 4, 14, 3, 1, 1, '', '', '', 'No paga carga', '', 'portada_categoria.png', '', 'Finalizado', '', 0, 0, 0, 0.0000, 0.0000, '08:00', '10:15', '12:10', '02:30', '', '', '', '2022-04-06'),
(1101, 1, 2022, 4, 14, 3, 1, 2, '', '', '', 'No paga carga', '', 'portada_categoria.png', '', 'Finalizado', '', 0, 0, 0, 0.0000, 0.0000, '08:00', '10:15', '12:10', '02:30', '', '', '', '2022-04-06'),
(1102, 1, 2022, 4, 14, 3, 2, 1, '', '', '', 'No paga carga', '', 'portada_categoria.png', '', 'Finalizado', '', 0, 0, 0, 0.0000, 0.0000, '08:00', '10:15', '12:10', '02:30', '', '', '', '2022-04-06'),
(1103, 1, 2022, 4, 14, 3, 2, 2, '', '', '', 'No paga carga', '', 'portada_categoria.png', '', 'Finalizado', '', 0, 0, 0, 0.0000, 0.0000, '08:00', '10:15', '12:10', '02:30', '', '', '', '2022-04-06'),
(1104, 1, 2022, 4, 14, 3, 3, 1, '01:00', 'CLIENTE 001', 'No Asignado', 'No paga carga', 'Granel', 'cupo_c1c4d8a8df98c048068ddf292ae54d46.pdf', '1104', 'Programado', '', 0, 0, 0, 0.0000, 0.0000, '08:00', '10:15', '12:10', '02:30', '', '', '', '2022-04-06'),
(1105, 1, 2022, 4, 14, 3, 3, 2, '13:00', 'CLIENTE 002', 'No Asignado', 'No paga carga', 'Tarima', 'cupo_b274f3f55ea80e5f83fb36e8a37157b0.pdf', '1105', 'Programado', '', 6, 20, 14, 0.0000, 0.0000, '08:00', '10:15', '12:10', '02:30', '', '', '', '2022-04-06'),
(1106, 1, 2022, 4, 14, 1, 1, 1, '06:00', 'CLIENTE 001', 'Guadalupe López', 'Paga carga', 'Tarima', 'cupo_75a6c073d55370775968ee1240750166.pdf', '1106', 'Finalizado', '', 6, 14, 14, 0.0000, 0.0000, '13:00', '06:00', '07:50', '16:00', '2', '', '', '2022-04-04'),
(1107, 1, 2022, 4, 14, 1, 1, 2, '08:00', 'CLIENTE 002', 'Jairo Figueroa', 'No paga carga', 'Granel', 'cupo_38529e91f271b5613642934e4b967565.pdf', '1107', 'Finalizado', '', 0, 0, 0, 0.0000, 0.0000, '06:25', '06:00', '07:45', '09:00', '2', '', '', '2022-04-04'),
(1108, 1, 2022, 4, 14, 1, 2, 1, '', '', '', 'No paga carga', '', 'portada_categoria.png', '', 'Finalizado', '', 0, 0, 0, 0.0000, 0.0000, '06:25', '06:00', '07:45', '09:00', '', '', '', '2022-04-04'),
(1109, 1, 2022, 4, 14, 1, 2, 2, '', '', '', 'No paga carga', '', 'portada_categoria.png', '', 'Finalizado', '', 0, 0, 0, 0.0000, 0.0000, '06:25', '06:00', '07:45', '09:00', '', '', '', '2022-04-04'),
(1110, 1, 2022, 4, 14, 1, 3, 1, '12:10', 'CLIENTE 001', 'No Asignado', 'No paga carga', 'Granel', 'cupo_d3a1fb4930410819e705a24a11c20efb.pdf', '1110', 'Programado', '', 0, 0, 0, 0.0000, 0.0000, '06:25', '06:00', '07:45', '09:00', '', '', '', '2022-04-04'),
(1111, 1, 2022, 4, 14, 1, 3, 2, '02:10', 'CLIENTE 002', 'No Asignado', 'No paga carga', 'Tarima', 'cupo_8d227630c8609925057618214f222bc5.pdf', '1111', 'Programado', '', 6, 14, 14, 0.0000, 0.0000, '06:25', '06:00', '07:45', '09:00', '', '', '', '2022-04-04'),
(1112, 1, 2022, 4, 14, 5, 1, 1, '', '', '', 'Paga carga', '', 'portada_categoria.png', '', 'Finalizado', '', 0, 0, 0, 0.0000, 0.0000, '01:00', '14:00', '15:45', '05:00', '', '', '', '2022-04-08'),
(1113, 1, 2022, 4, 14, 5, 1, 2, '', '', '', 'Paga carga', '', 'portada_categoria.png', '', 'Finalizado', '', 0, 0, 0, 0.0000, 0.0000, '01:00', '14:00', '15:45', '05:00', '', '', '', '2022-04-08'),
(1114, 1, 2022, 4, 14, 5, 2, 1, '', '', '', 'Paga carga', '', 'portada_categoria.png', '', 'Finalizado', '', 0, 0, 0, 0.0000, 0.0000, '01:00', '14:00', '15:45', '05:00', '', '', '', '2022-04-08'),
(1115, 1, 2022, 4, 14, 5, 2, 2, '', '', '', 'Paga carga', '', 'portada_categoria.png', '', 'Finalizado', '', 0, 0, 0, 0.0000, 0.0000, '01:00', '14:00', '15:45', '05:00', '', '', '', '2022-04-08'),
(1116, 1, 2022, 4, 14, 5, 3, 1, '', '', '', 'Paga carga', '', 'portada_categoria.png', '', 'Finalizado', '', 0, 0, 0, 0.0000, 0.0000, '01:00', '14:00', '15:45', '05:00', '', '', '', '2022-04-08'),
(1117, 1, 2022, 4, 14, 5, 3, 2, '', '', '', 'Paga carga', '', 'portada_categoria.png', '', 'Finalizado', '', 0, 0, 0, 0.0000, 0.0000, '01:00', '14:00', '15:45', '05:00', '', '', '', '2022-04-08'),
(1118, 2, 2022, 4, 14, 2, 1, 1, '', '', '', 'No paga carga', '', 'portada_categoria.png', '', 'Cancelado', '', 0, 0, 0, 0.0000, 0.0000, '06:15', '07:50', '09:30', '11:00', '', '', '', '2022-04-05'),
(1119, 2, 2022, 4, 14, 2, 1, 2, '', '', '', 'No paga carga', '', 'portada_categoria.png', '', 'Cancelado', '', 0, 0, 0, 0.0000, 0.0000, '06:15', '07:50', '09:30', '11:00', '', '', '', '2022-04-05'),
(1120, 2, 2022, 4, 14, 2, 2, 1, '', '', '', 'No paga carga', '', 'portada_categoria.png', '', 'Cancelado', '', 0, 0, 0, 0.0000, 0.0000, '06:15', '07:50', '09:30', '11:00', '', '', '', '2022-04-05'),
(1121, 2, 2022, 4, 14, 2, 2, 2, '', '', '', 'No paga carga', '', 'portada_categoria.png', '', 'Cancelado', '', 0, 0, 0, 0.0000, 0.0000, '06:15', '07:50', '09:30', '11:00', '', '', '', '2022-04-05'),
(1122, 2, 2022, 4, 14, 2, 3, 1, '02:00', 'CLIENTE 002', 'No Asignado', 'No paga carga', 'Granel', 'cupo_5fa59fb6306b80c1921b6e06cff56403.pdf', '1122', 'Programado', '', 0, 0, 0, 0.0000, 0.0000, '06:15', '07:50', '09:30', '11:00', '', '', '', '2022-04-05'),
(1123, 2, 2022, 4, 14, 2, 3, 2, '02:00', 'CLIENTE 002', 'No Asignado', 'No paga carga', 'Granel', 'cupo_2d1ba39e92c65a56c02447678fe80aca.pdf', '1123', 'Programado', '', 0, 0, 0, 0.0000, 0.0000, '06:15', '07:50', '09:30', '11:00', '', '', '', '2022-04-05'),
(1124, 2, 2022, 4, 14, 3, 1, 1, '', '', '', 'No paga carga', '', 'portada_categoria.png', '', 'Finalizado', '', 0, 0, 0, 0.0000, 0.0000, '08:00', '10:15', '12:10', '02:30', '', '', '', '2022-04-06'),
(1125, 2, 2022, 4, 14, 3, 1, 2, '', '', '', 'No paga carga', '', 'portada_categoria.png', '', 'Finalizado', '', 0, 0, 0, 0.0000, 0.0000, '08:00', '10:15', '12:10', '02:30', '', '', '', '2022-04-06'),
(1126, 2, 2022, 4, 14, 3, 2, 1, '', '', '', 'No paga carga', '', 'portada_categoria.png', '', 'Finalizado', '', 0, 0, 0, 0.0000, 0.0000, '08:00', '10:15', '12:10', '02:30', '', '', '', '2022-04-06'),
(1127, 2, 2022, 4, 14, 3, 2, 2, '', '', '', 'No paga carga', '', 'portada_categoria.png', '', 'Finalizado', '', 0, 0, 0, 0.0000, 0.0000, '08:00', '10:15', '12:10', '02:30', '', '', '', '2022-04-06'),
(1128, 2, 2022, 4, 14, 3, 3, 1, '02:00', 'CLIENTE 002', 'No Asignado', 'No paga carga', 'Granel', 'cupo_58d1f600dd4a1e44f51ad7dfb416a3db.pdf', '1128', 'Programado', '', 0, 0, 0, 0.0000, 0.0000, '08:00', '10:15', '12:10', '02:30', '', '', '', '2022-04-06'),
(1129, 2, 2022, 4, 14, 3, 3, 2, '14:00', 'CLIENTE 002', 'No Asignado', 'No paga carga', 'Granel', 'cupo_eb351c1a55ca6d9e3aefeea131c9121a.pdf', '1129', 'Programado', '', 0, 0, 0, 0.0000, 0.0000, '08:00', '10:15', '12:10', '02:30', '', '', '', '2022-04-06'),
(1130, 2, 2022, 4, 14, 5, 1, 1, '', '', '', 'Paga carga', '', 'portada_categoria.png', '', 'Finalizado', '', 0, 0, 0, 0.0000, 0.0000, '01:00', '14:00', '15:45', '05:00', '', '', '', '2022-04-08'),
(1131, 2, 2022, 4, 14, 5, 1, 2, '', '', '', 'Paga carga', '', 'portada_categoria.png', '', 'Finalizado', '', 0, 0, 0, 0.0000, 0.0000, '01:00', '14:00', '15:45', '05:00', '', '', '', '2022-04-08'),
(1132, 2, 2022, 4, 14, 5, 2, 1, '', '', '', 'Paga carga', '', 'portada_categoria.png', '', 'Finalizado', '', 0, 0, 0, 0.0000, 0.0000, '01:00', '14:00', '15:45', '05:00', '', '', '', '2022-04-08'),
(1133, 2, 2022, 4, 14, 5, 2, 2, '', '', '', 'Paga carga', '', 'portada_categoria.png', '', 'Finalizado', '', 0, 0, 0, 0.0000, 0.0000, '01:00', '14:00', '15:45', '05:00', '', '', '', '2022-04-08'),
(1134, 2, 2022, 4, 14, 5, 3, 1, '', '', '', 'Paga carga', '', 'portada_categoria.png', '', 'Finalizado', '', 0, 0, 0, 0.0000, 0.0000, '01:00', '14:00', '15:45', '05:00', '', '', '', '2022-04-08'),
(1135, 2, 2022, 4, 14, 5, 3, 2, '', '', '', 'Paga carga', '', 'portada_categoria.png', '', 'Finalizado', '', 0, 0, 0, 0.0000, 0.0000, '01:00', '14:00', '15:45', '05:00', '', '', '', '2022-04-08'),
(1136, 2, 2022, 4, 14, 4, 1, 1, '', '', '', 'Paga carga', '', 'portada_categoria.png', '', 'Finalizado', '', 0, 0, 0, 0.0000, 0.0000, '01:00', '12:30', '14:30', '03:00', '', '', '', '2022-04-07'),
(1137, 2, 2022, 4, 14, 4, 1, 2, '', '', '', 'Paga carga', '', 'portada_categoria.png', '', 'Finalizado', '', 0, 0, 0, 0.0000, 0.0000, '01:00', '12:30', '14:30', '03:00', '', '', '', '2022-04-07'),
(1138, 2, 2022, 4, 14, 4, 2, 1, '', '', '', 'Paga carga', '', 'portada_categoria.png', '', 'Finalizado', '', 0, 0, 0, 0.0000, 0.0000, '01:00', '12:30', '14:30', '03:00', '', '', '', '2022-04-07'),
(1139, 2, 2022, 4, 14, 4, 2, 2, '', '', '', 'Paga carga', '', 'portada_categoria.png', '', 'Finalizado', '', 0, 0, 0, 0.0000, 0.0000, '01:00', '12:30', '14:30', '03:00', '', '', '', '2022-04-07'),
(1140, 2, 2022, 4, 14, 4, 3, 1, '', '', '', 'Paga carga', '', 'portada_categoria.png', '', 'Finalizado', '', 0, 0, 0, 0.0000, 0.0000, '01:00', '12:30', '14:30', '03:00', '', '', '', '2022-04-07'),
(1141, 2, 2022, 4, 14, 4, 3, 2, '', '', '', 'Paga carga', '', 'portada_categoria.png', '', 'Finalizado', '', 0, 0, 0, 0.0000, 0.0000, '01:00', '12:30', '14:30', '03:00', '', '', '', '2022-04-07'),
(1142, 2, 2022, 4, 14, 1, 1, 1, '', '', '', 'No paga carga', '', 'portada_categoria.png', '', 'Finalizado', '', 0, 0, 0, 0.0000, 0.0000, '06:25', '06:00', '07:45', '09:00', '', '', '', '2022-04-04'),
(1143, 2, 2022, 4, 14, 1, 1, 2, '', '', '', 'No paga carga', '', 'portada_categoria.png', '', 'Finalizado', '', 0, 0, 0, 0.0000, 0.0000, '06:25', '06:00', '07:45', '09:00', '', '', '', '2022-04-04'),
(1144, 2, 2022, 4, 14, 1, 2, 1, '', '', '', 'No paga carga', '', 'portada_categoria.png', '', 'Finalizado', '', 0, 0, 0, 0.0000, 0.0000, '06:25', '06:00', '07:45', '09:00', '', '', '', '2022-04-04'),
(1145, 2, 2022, 4, 14, 1, 2, 2, '', '', '', 'No paga carga', '', 'portada_categoria.png', '', 'Finalizado', '', 0, 0, 0, 0.0000, 0.0000, '06:25', '06:00', '07:45', '09:00', '', '', '', '2022-04-04'),
(1146, 2, 2022, 4, 14, 1, 3, 1, '', '', '', 'No paga carga', '', 'portada_categoria.png', '', 'Finalizado', '', 0, 0, 0, 0.0000, 0.0000, '06:25', '06:00', '07:45', '09:00', '', '', '', '2022-04-04'),
(1147, 2, 2022, 4, 14, 1, 3, 2, '', '', '', 'No paga carga', '', 'portada_categoria.png', '', 'Finalizado', '', 0, 0, 0, 0.0000, 0.0000, '06:25', '06:00', '07:45', '09:00', '', '', '', '2022-04-04'),
(1158, 1, 2022, 4, 15, 1, 1, 1, '', '', '', 'No paga carga', '', 'portada_categoria.png', '', '', '', 0, 0, 0, 0.0000, 0.0000, '06:25', '06:00', '07:45', '09:00', '', '', '', '2022-04-11'),
(1159, 1, 2022, 4, 15, 1, 2, 1, '', '', '', 'No paga carga', '', 'portada_categoria.png', '', '', '', 0, 0, 0, 0.0000, 0.0000, '06:25', '06:00', '07:45', '09:00', '', '', '', '2022-04-11'),
(1160, 1, 2022, 4, 15, 1, 3, 1, '', '', '', 'No paga carga', '', 'portada_categoria.png', '', '', '', 0, 0, 0, 0.0000, 0.0000, '06:25', '06:00', '07:45', '09:00', '', '', '', '2022-04-11'),
(1161, 1, 2022, 4, 15, 2, 1, 1, '', '', '', 'No paga carga', '', 'portada_categoria.png', '', '', '', 0, 0, 0, 0.0000, 0.0000, '06:15', '07:50', '09:30', '11:00', '', '', '', '2022-04-12'),
(1162, 1, 2022, 4, 15, 2, 2, 1, '', '', '', 'No paga carga', '', 'portada_categoria.png', '', '', '', 0, 0, 0, 0.0000, 0.0000, '06:15', '07:50', '09:30', '11:00', '', '', '', '2022-04-12'),
(1163, 1, 2022, 4, 15, 2, 3, 1, '', '', '', 'No paga carga', '', 'portada_categoria.png', '', '', '', 0, 0, 0, 0.0000, 0.0000, '06:15', '07:50', '09:30', '11:00', '', '', '', '2022-04-12'),
(1164, 1, 2022, 4, 15, 5, 1, 1, '', '', '', 'Paga carga', '', 'portada_categoria.png', '', '', '', 0, 0, 0, 0.0000, 0.0000, '01:00', '14:00', '15:45', '05:00', '', '', '', '2022-04-15'),
(1165, 1, 2022, 4, 15, 5, 2, 1, '', '', '', 'Paga carga', '', 'portada_categoria.png', '', '', '', 0, 0, 0, 0.0000, 0.0000, '01:00', '14:00', '15:45', '05:00', '', '', '', '2022-04-15'),
(1166, 1, 2022, 4, 15, 5, 3, 1, '', '', '', 'Paga carga', '', 'portada_categoria.png', '', '', '', 0, 0, 0, 0.0000, 0.0000, '01:00', '14:00', '15:45', '05:00', '', '', '', '2022-04-15'),
(1167, 1, 2022, 4, 15, 4, 1, 1, '', '', '', 'Paga carga', '', 'portada_categoria.png', '', '', '', 0, 0, 0, 0.0000, 0.0000, '01:00', '12:30', '14:30', '03:00', '', '', '', '2022-04-14'),
(1168, 1, 2022, 4, 15, 4, 2, 1, '', '', '', 'Paga carga', '', 'portada_categoria.png', '', '', '', 0, 0, 0, 0.0000, 0.0000, '01:00', '12:30', '14:30', '03:00', '', '', '', '2022-04-14'),
(1169, 1, 2022, 4, 15, 4, 3, 1, '', '', '', 'Paga carga', '', 'portada_categoria.png', '', '', '', 0, 0, 0, 0.0000, 0.0000, '01:00', '12:30', '14:30', '03:00', '', '', '', '2022-04-14'),
(1170, 1, 2022, 4, 15, 3, 1, 1, '', '', '', 'No paga carga', '', 'portada_categoria.png', '', '', '', 0, 0, 0, 0.0000, 0.0000, '08:00', '10:15', '12:10', '02:30', '', '', '', '2022-04-13'),
(1171, 1, 2022, 4, 15, 3, 2, 1, '', '', '', 'No paga carga', '', 'portada_categoria.png', '', '', '', 0, 0, 0, 0.0000, 0.0000, '08:00', '10:15', '12:10', '02:30', '', '', '', '2022-04-13'),
(1172, 1, 2022, 4, 15, 3, 3, 1, '', '', '', 'No paga carga', '', 'portada_categoria.png', '', '', '', 0, 0, 0, 0.0000, 0.0000, '08:00', '10:15', '12:10', '02:30', '', '', '', '2022-04-13'),
(1173, 2, 2022, 4, 15, 2, 1, 1, '', '', '', 'No paga carga', '', 'portada_categoria.png', '', '', '', 0, 0, 0, 0.0000, 0.0000, '06:15', '07:50', '09:30', '11:00', '', '', '', '2022-04-12'),
(1174, 2, 2022, 4, 15, 2, 2, 1, '', '', '', 'No paga carga', '', 'portada_categoria.png', '', '', '', 0, 0, 0, 0.0000, 0.0000, '06:15', '07:50', '09:30', '11:00', '', '', '', '2022-04-12'),
(1175, 2, 2022, 4, 15, 2, 3, 1, '', '', '', 'No paga carga', '', 'portada_categoria.png', '', '', '', 0, 0, 0, 0.0000, 0.0000, '06:15', '07:50', '09:30', '11:00', '', '', '', '2022-04-12'),
(1176, 2, 2022, 4, 15, 3, 1, 1, '', '', '', 'No paga carga', '', 'portada_categoria.png', '', '', '', 0, 0, 0, 0.0000, 0.0000, '08:00', '10:15', '12:10', '02:30', '', '', '', '2022-04-13'),
(1177, 2, 2022, 4, 15, 3, 2, 1, '', '', '', 'No paga carga', '', 'portada_categoria.png', '', '', '', 0, 0, 0, 0.0000, 0.0000, '08:00', '10:15', '12:10', '02:30', '', '', '', '2022-04-13'),
(1178, 2, 2022, 4, 15, 3, 3, 1, '', '', '', 'No paga carga', '', 'portada_categoria.png', '', '', '', 0, 0, 0, 0.0000, 0.0000, '08:00', '10:15', '12:10', '02:30', '', '', '', '2022-04-13'),
(1179, 2, 2022, 4, 15, 5, 1, 1, '', '', '', 'Paga carga', '', 'portada_categoria.png', '', '', '', 0, 0, 0, 0.0000, 0.0000, '01:00', '14:00', '15:45', '05:00', '', '', '', '2022-04-15'),
(1180, 2, 2022, 4, 15, 5, 2, 1, '', '', '', 'Paga carga', '', 'portada_categoria.png', '', '', '', 0, 0, 0, 0.0000, 0.0000, '01:00', '14:00', '15:45', '05:00', '', '', '', '2022-04-15'),
(1181, 2, 2022, 4, 15, 5, 3, 1, '', '', '', 'Paga carga', '', 'portada_categoria.png', '', '', '', 0, 0, 0, 0.0000, 0.0000, '01:00', '14:00', '15:45', '05:00', '', '', '', '2022-04-15'),
(1182, 2, 2022, 4, 15, 1, 1, 1, '', '', '', 'No paga carga', '', 'portada_categoria.png', '', '', '', 0, 0, 0, 0.0000, 0.0000, '06:25', '06:00', '07:45', '09:00', '', '', '', '2022-04-11'),
(1183, 2, 2022, 4, 15, 1, 2, 1, '', '', '', 'No paga carga', '', 'portada_categoria.png', '', '', '', 0, 0, 0, 0.0000, 0.0000, '06:25', '06:00', '07:45', '09:00', '', '', '', '2022-04-11'),
(1184, 2, 2022, 4, 15, 1, 3, 1, '', '', '', 'No paga carga', '', 'portada_categoria.png', '', '', '', 0, 0, 0, 0.0000, 0.0000, '06:25', '06:00', '07:45', '09:00', '', '', '', '2022-04-11'),
(1185, 2, 2022, 4, 15, 4, 1, 1, '', '', '', 'Paga carga', '', 'portada_categoria.png', '', '', '', 0, 0, 0, 0.0000, 0.0000, '01:00', '12:30', '14:30', '03:00', '', '', '', '2022-04-14'),
(1186, 2, 2022, 4, 15, 4, 2, 1, '', '', '', 'Paga carga', '', 'portada_categoria.png', '', '', '', 0, 0, 0, 0.0000, 0.0000, '01:00', '12:30', '14:30', '03:00', '', '', '', '2022-04-14'),
(1187, 2, 2022, 4, 15, 4, 3, 1, '', '', '', 'Paga carga', '', 'portada_categoria.png', '', '', '', 0, 0, 0, 0.0000, 0.0000, '01:00', '12:30', '14:30', '03:00', '', '', '', '2022-04-14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cupo_asesor`
--

CREATE TABLE `cupo_asesor` (
  `id` bigint(20) NOT NULL,
  `tipo_transporte` int(2) NOT NULL,
  `anio` int(4) NOT NULL,
  `mes` int(2) NOT NULL,
  `semana` int(2) NOT NULL,
  `dia` int(2) NOT NULL,
  `bloque` int(2) NOT NULL,
  `sub_bloque` bigint(20) NOT NULL,
  `nombre_asesor` varchar(100) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Volcado de datos para la tabla `cupo_asesor`
--

INSERT INTO `cupo_asesor` (`id`, `tipo_transporte`, `anio`, `mes`, `semana`, `dia`, `bloque`, `sub_bloque`, `nombre_asesor`) VALUES
(1659, 1, 2022, 4, 14, 2, 1, 1, 'No Asignado'),
(1660, 1, 2022, 4, 14, 2, 1, 2, 'No Asignado'),
(1661, 1, 2022, 4, 14, 2, 2, 1, 'No Asignado'),
(1662, 1, 2022, 4, 14, 2, 2, 2, 'No Asignado'),
(1663, 1, 2022, 4, 14, 2, 3, 1, 'No Asignado'),
(1664, 1, 2022, 4, 14, 2, 3, 2, 'No Asignado'),
(1665, 1, 2022, 4, 14, 4, 1, 1, 'No Asignado'),
(1666, 1, 2022, 4, 14, 4, 1, 2, 'No Asignado'),
(1667, 1, 2022, 4, 14, 4, 2, 1, 'No Asignado'),
(1668, 1, 2022, 4, 14, 4, 2, 2, 'No Asignado'),
(1669, 1, 2022, 4, 14, 4, 3, 1, 'No Asignado'),
(1670, 1, 2022, 4, 14, 4, 3, 2, 'No Asignado'),
(1671, 1, 2022, 4, 14, 3, 1, 1, 'No Asignado'),
(1672, 1, 2022, 4, 14, 3, 1, 2, 'No Asignado'),
(1673, 1, 2022, 4, 14, 3, 2, 1, 'No Asignado'),
(1674, 1, 2022, 4, 14, 3, 2, 2, 'No Asignado'),
(1675, 1, 2022, 4, 14, 3, 3, 1, 'No Asignado'),
(1676, 1, 2022, 4, 14, 3, 3, 2, 'No Asignado'),
(1677, 1, 2022, 4, 14, 1, 1, 1, 'Guadalupe López'),
(1678, 1, 2022, 4, 14, 1, 1, 2, 'Jairo Figueroa'),
(1679, 1, 2022, 4, 14, 1, 2, 1, 'No Asignado'),
(1680, 1, 2022, 4, 14, 1, 2, 2, 'No Asignado'),
(1681, 1, 2022, 4, 14, 1, 3, 1, 'No Asignado'),
(1682, 1, 2022, 4, 14, 1, 3, 2, 'No Asignado'),
(1683, 1, 2022, 4, 14, 5, 1, 1, 'No Asignado'),
(1684, 1, 2022, 4, 14, 5, 1, 2, 'No Asignado'),
(1685, 1, 2022, 4, 14, 5, 2, 1, 'No Asignado'),
(1686, 1, 2022, 4, 14, 5, 2, 2, 'No Asignado'),
(1687, 1, 2022, 4, 14, 5, 3, 1, 'No Asignado'),
(1688, 1, 2022, 4, 14, 5, 3, 2, 'No Asignado'),
(1689, 3, 2022, 4, 14, 3, 1, 1, 'No Asignado'),
(1690, 3, 2022, 4, 14, 3, 1, 2, 'No Asignado'),
(1691, 3, 2022, 4, 14, 3, 2, 1, 'No Asignado'),
(1692, 3, 2022, 4, 14, 3, 2, 2, 'No Asignado'),
(1693, 3, 2022, 4, 14, 3, 3, 1, 'No Asignado'),
(1694, 3, 2022, 4, 14, 3, 3, 2, 'No Asignado'),
(1695, 3, 2022, 4, 14, 4, 1, 1, 'No Asignado'),
(1696, 3, 2022, 4, 14, 4, 1, 2, 'No Asignado'),
(1697, 3, 2022, 4, 14, 4, 2, 1, 'No Asignado'),
(1698, 3, 2022, 4, 14, 4, 2, 2, 'No Asignado'),
(1699, 3, 2022, 4, 14, 4, 3, 1, 'No Asignado'),
(1700, 3, 2022, 4, 14, 4, 3, 2, 'No Asignado'),
(1701, 3, 2022, 4, 14, 2, 1, 1, 'No Asignado'),
(1702, 3, 2022, 4, 14, 2, 1, 2, 'No Asignado'),
(1703, 3, 2022, 4, 14, 2, 2, 1, 'No Asignado'),
(1704, 3, 2022, 4, 14, 2, 2, 2, 'No Asignado'),
(1705, 3, 2022, 4, 14, 2, 3, 1, 'No Asignado'),
(1706, 3, 2022, 4, 14, 2, 3, 2, 'No Asignado'),
(1707, 3, 2022, 4, 14, 5, 1, 1, 'No Asignado'),
(1708, 3, 2022, 4, 14, 5, 1, 2, 'No Asignado'),
(1709, 3, 2022, 4, 14, 5, 2, 1, 'No Asignado'),
(1710, 3, 2022, 4, 14, 5, 2, 2, 'No Asignado'),
(1711, 3, 2022, 4, 14, 5, 3, 1, 'No Asignado'),
(1712, 3, 2022, 4, 14, 5, 3, 2, 'No Asignado'),
(1713, 3, 2022, 4, 14, 1, 1, 1, 'José Renderos'),
(1714, 3, 2022, 4, 14, 1, 1, 2, 'Jairo Figueroa'),
(1715, 3, 2022, 4, 14, 1, 2, 1, 'No Asignado'),
(1716, 3, 2022, 4, 14, 1, 2, 2, 'No Asignado'),
(1717, 3, 2022, 4, 14, 1, 3, 1, 'No Asignado'),
(1718, 3, 2022, 4, 14, 1, 3, 2, 'No Asignado'),
(1719, 2, 2022, 4, 14, 2, 1, 1, 'No Asignado'),
(1720, 2, 2022, 4, 14, 2, 1, 2, 'No Asignado'),
(1721, 2, 2022, 4, 14, 2, 2, 1, 'No Asignado'),
(1722, 2, 2022, 4, 14, 2, 2, 2, 'No Asignado'),
(1723, 2, 2022, 4, 14, 2, 3, 1, 'No Asignado'),
(1724, 2, 2022, 4, 14, 2, 3, 2, 'No Asignado'),
(1725, 2, 2022, 4, 14, 3, 1, 1, 'No Asignado'),
(1726, 2, 2022, 4, 14, 3, 1, 2, 'No Asignado'),
(1727, 2, 2022, 4, 14, 3, 2, 1, 'No Asignado'),
(1728, 2, 2022, 4, 14, 3, 2, 2, 'No Asignado'),
(1729, 2, 2022, 4, 14, 3, 3, 1, 'No Asignado'),
(1730, 2, 2022, 4, 14, 3, 3, 2, 'No Asignado'),
(1731, 2, 2022, 4, 14, 5, 1, 1, 'No Asignado'),
(1732, 2, 2022, 4, 14, 5, 1, 2, 'No Asignado'),
(1733, 2, 2022, 4, 14, 5, 2, 1, 'No Asignado'),
(1734, 2, 2022, 4, 14, 5, 2, 2, 'No Asignado'),
(1735, 2, 2022, 4, 14, 5, 3, 1, 'No Asignado'),
(1736, 2, 2022, 4, 14, 5, 3, 2, 'No Asignado'),
(1737, 2, 2022, 4, 14, 4, 1, 1, 'No Asignado'),
(1738, 2, 2022, 4, 14, 4, 1, 2, 'No Asignado'),
(1739, 2, 2022, 4, 14, 4, 2, 1, 'No Asignado'),
(1740, 2, 2022, 4, 14, 4, 2, 2, 'No Asignado'),
(1741, 2, 2022, 4, 14, 4, 3, 1, 'No Asignado'),
(1742, 2, 2022, 4, 14, 4, 3, 2, 'No Asignado'),
(1743, 2, 2022, 4, 14, 1, 1, 1, 'No Asignado'),
(1744, 2, 2022, 4, 14, 1, 1, 2, 'No Asignado'),
(1745, 2, 2022, 4, 14, 1, 2, 1, 'No Asignado'),
(1746, 2, 2022, 4, 14, 1, 2, 2, 'No Asignado'),
(1747, 2, 2022, 4, 14, 1, 3, 1, 'No Asignado'),
(1748, 2, 2022, 4, 14, 1, 3, 2, 'No Asignado'),
(1749, 4, 2022, 4, 14, 2, 1, 1, 'No Asignado'),
(1750, 4, 2022, 4, 14, 2, 1, 2, 'No Asignado'),
(1751, 4, 2022, 4, 14, 2, 2, 1, 'No Asignado'),
(1752, 4, 2022, 4, 14, 2, 2, 2, 'No Asignado'),
(1753, 4, 2022, 4, 14, 2, 3, 1, 'No Asignado'),
(1754, 4, 2022, 4, 14, 2, 3, 2, 'No Asignado'),
(1755, 4, 2022, 4, 14, 1, 1, 1, 'No Asignado'),
(1756, 4, 2022, 4, 14, 1, 1, 2, 'No Asignado'),
(1757, 4, 2022, 4, 14, 1, 2, 1, 'No Asignado'),
(1758, 4, 2022, 4, 14, 1, 2, 2, 'No Asignado'),
(1759, 4, 2022, 4, 14, 1, 3, 1, 'No Asignado'),
(1760, 4, 2022, 4, 14, 1, 3, 2, 'No Asignado'),
(1761, 4, 2022, 4, 14, 3, 1, 1, 'No Asignado'),
(1762, 4, 2022, 4, 14, 3, 1, 2, 'No Asignado'),
(1763, 4, 2022, 4, 14, 3, 2, 1, 'No Asignado'),
(1764, 4, 2022, 4, 14, 3, 2, 2, 'No Asignado'),
(1765, 4, 2022, 4, 14, 3, 3, 1, 'No Asignado'),
(1766, 4, 2022, 4, 14, 3, 3, 2, 'No Asignado'),
(1767, 4, 2022, 4, 14, 3, 4, 1, 'No Asignado'),
(1768, 4, 2022, 4, 14, 3, 4, 2, 'No Asignado'),
(1769, 4, 2022, 4, 14, 5, 1, 1, 'No Asignado'),
(1770, 4, 2022, 4, 14, 5, 1, 2, 'No Asignado'),
(1771, 4, 2022, 4, 14, 5, 2, 1, 'No Asignado'),
(1772, 4, 2022, 4, 14, 5, 2, 2, 'No Asignado'),
(1773, 4, 2022, 4, 14, 5, 3, 1, 'No Asignado'),
(1774, 4, 2022, 4, 14, 5, 3, 2, 'No Asignado'),
(1775, 4, 2022, 4, 14, 4, 1, 1, 'No Asignado'),
(1776, 4, 2022, 4, 14, 4, 1, 2, 'No Asignado'),
(1777, 4, 2022, 4, 14, 4, 2, 1, 'No Asignado'),
(1778, 4, 2022, 4, 14, 4, 2, 2, 'No Asignado'),
(1779, 4, 2022, 4, 14, 4, 3, 1, 'No Asignado'),
(1780, 4, 2022, 4, 14, 4, 3, 2, 'No Asignado'),
(1793, 1, 2022, 4, 15, 1, 1, 1, 'No Asignado'),
(1794, 1, 2022, 4, 15, 1, 2, 1, 'No Asignado'),
(1795, 1, 2022, 4, 15, 1, 3, 1, 'No Asignado'),
(1796, 1, 2022, 4, 15, 2, 1, 1, 'No Asignado'),
(1797, 1, 2022, 4, 15, 2, 2, 1, 'No Asignado'),
(1798, 1, 2022, 4, 15, 2, 3, 1, 'No Asignado'),
(1799, 1, 2022, 4, 15, 5, 1, 1, 'No Asignado'),
(1800, 1, 2022, 4, 15, 5, 2, 1, 'No Asignado'),
(1801, 1, 2022, 4, 15, 5, 3, 1, 'No Asignado'),
(1802, 1, 2022, 4, 15, 4, 1, 1, 'No Asignado'),
(1803, 1, 2022, 4, 15, 4, 2, 1, 'No Asignado'),
(1804, 1, 2022, 4, 15, 4, 3, 1, 'No Asignado'),
(1805, 1, 2022, 4, 15, 3, 1, 1, 'No Asignado'),
(1806, 1, 2022, 4, 15, 3, 2, 1, 'No Asignado'),
(1807, 1, 2022, 4, 15, 3, 3, 1, 'No Asignado'),
(1808, 3, 2022, 4, 15, 1, 1, 1, 'No Asignado'),
(1809, 3, 2022, 4, 15, 1, 2, 1, 'No Asignado'),
(1810, 3, 2022, 4, 15, 1, 3, 1, 'No Asignado'),
(1811, 3, 2022, 4, 15, 2, 1, 1, 'No Asignado'),
(1812, 3, 2022, 4, 15, 2, 2, 1, 'No Asignado'),
(1813, 3, 2022, 4, 15, 2, 3, 1, 'No Asignado'),
(1814, 3, 2022, 4, 15, 3, 1, 1, 'No Asignado'),
(1815, 3, 2022, 4, 15, 3, 2, 1, 'No Asignado'),
(1816, 3, 2022, 4, 15, 3, 3, 1, 'No Asignado'),
(1817, 3, 2022, 4, 15, 4, 1, 1, 'No Asignado'),
(1818, 3, 2022, 4, 15, 4, 2, 1, 'No Asignado'),
(1819, 3, 2022, 4, 15, 4, 3, 1, 'No Asignado'),
(1820, 3, 2022, 4, 15, 5, 1, 1, 'No Asignado'),
(1821, 3, 2022, 4, 15, 5, 2, 1, 'No Asignado'),
(1822, 3, 2022, 4, 15, 5, 3, 1, 'No Asignado'),
(1823, 2, 2022, 4, 15, 2, 1, 1, 'No Asignado'),
(1824, 2, 2022, 4, 15, 2, 2, 1, 'No Asignado'),
(1825, 2, 2022, 4, 15, 2, 3, 1, 'No Asignado'),
(1826, 2, 2022, 4, 15, 3, 1, 1, 'No Asignado'),
(1827, 2, 2022, 4, 15, 3, 2, 1, 'No Asignado'),
(1828, 2, 2022, 4, 15, 3, 3, 1, 'No Asignado'),
(1829, 2, 2022, 4, 15, 5, 1, 1, 'No Asignado'),
(1830, 2, 2022, 4, 15, 5, 2, 1, 'No Asignado'),
(1831, 2, 2022, 4, 15, 5, 3, 1, 'No Asignado'),
(1832, 2, 2022, 4, 15, 1, 1, 1, 'No Asignado'),
(1833, 2, 2022, 4, 15, 1, 2, 1, 'No Asignado'),
(1834, 2, 2022, 4, 15, 1, 3, 1, 'No Asignado'),
(1835, 2, 2022, 4, 15, 4, 1, 1, 'No Asignado'),
(1836, 2, 2022, 4, 15, 4, 2, 1, 'No Asignado'),
(1837, 2, 2022, 4, 15, 4, 3, 1, 'No Asignado'),
(1838, 4, 2022, 4, 15, 3, 1, 1, 'No Asignado'),
(1839, 4, 2022, 4, 15, 3, 2, 1, 'No Asignado'),
(1840, 4, 2022, 4, 15, 3, 3, 1, 'No Asignado'),
(1841, 4, 2022, 4, 15, 2, 1, 1, 'No Asignado'),
(1842, 4, 2022, 4, 15, 2, 2, 1, 'No Asignado'),
(1843, 4, 2022, 4, 15, 2, 3, 1, 'No Asignado'),
(1844, 4, 2022, 4, 15, 1, 1, 1, 'No Asignado'),
(1845, 4, 2022, 4, 15, 1, 2, 1, 'No Asignado'),
(1846, 4, 2022, 4, 15, 1, 3, 1, 'No Asignado'),
(1847, 4, 2022, 4, 15, 5, 1, 1, 'No Asignado'),
(1848, 4, 2022, 4, 15, 5, 2, 1, 'No Asignado'),
(1849, 4, 2022, 4, 15, 5, 3, 1, 'No Asignado'),
(1850, 4, 2022, 4, 15, 4, 1, 1, 'No Asignado'),
(1851, 4, 2022, 4, 15, 4, 2, 1, 'No Asignado'),
(1852, 4, 2022, 4, 15, 4, 3, 1, 'No Asignado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `domicilio`
--

CREATE TABLE `domicilio` (
  `id_domicilio` bigint(20) NOT NULL,
  `nombre_receptor` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `departamento` varchar(20) COLLATE utf8_swedish_ci NOT NULL,
  `municipio` varchar(25) COLLATE utf8_swedish_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulo`
--

CREATE TABLE `modulo` (
  `idmodulo` bigint(20) NOT NULL,
  `titulo` varchar(50) COLLATE utf8mb4_swedish_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_swedish_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `modulo`
--

INSERT INTO `modulo` (`idmodulo`, `titulo`, `descripcion`, `status`) VALUES
(1, 'Dashboard', 'Inicio', 1),
(2, 'Asignación de cupos', 'Asignar los cupos', 1),
(3, 'Ejecución de cupos', 'Ejecutar los cupos', 1),
(4, 'Configuraciones', 'Configuraciones de sistema', 1),
(5, 'Reportes', 'Reportes', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `motoristas`
--

CREATE TABLE `motoristas` (
  `idmotorista` bigint(20) NOT NULL,
  `nombres` varchar(200) COLLATE utf8_swedish_ci NOT NULL,
  `apellidos` varchar(200) COLLATE utf8_swedish_ci NOT NULL,
  `dui` int(20) NOT NULL,
  `licencia` varchar(20) COLLATE utf8_swedish_ci NOT NULL,
  `finalizacion` date NOT NULL,
  `planta` int(2) NOT NULL,
  `nota` double(3,2) NOT NULL,
  `observacion` varchar(500) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Volcado de datos para la tabla `motoristas`
--

INSERT INTO `motoristas` (`idmotorista`, `nombres`, `apellidos`, `dui`, `licencia`, `finalizacion`, `planta`, `nota`, `observacion`) VALUES
(1, 'Miguel Arcángel', 'Vizmont Aguirre', 40506843, '040506843M', '2025-01-05', 1, 8.00, 'None'),
(4, '001', '001A', 50505112, '5005500', '2025-05-05', 1, 8.00, ''),
(5, '2021', '2021', 25252589, '2186489', '0202-07-07', 1, 8.50, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `idpermiso` bigint(20) NOT NULL,
  `rolid` bigint(20) NOT NULL,
  `moduloid` bigint(20) NOT NULL,
  `r` int(11) NOT NULL DEFAULT 0,
  `w` int(11) NOT NULL DEFAULT 0,
  `u` int(11) NOT NULL DEFAULT 0,
  `d` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`idpermiso`, `rolid`, `moduloid`, `r`, `w`, `u`, `d`) VALUES
(1, 0, 1, 1, 1, 1, 1),
(2, 0, 2, 1, 1, 1, 1),
(3, 0, 3, 1, 1, 1, 1),
(4, 0, 4, 1, 1, 1, 1),
(5, 0, 5, 1, 1, 1, 1),
(6, 1, 1, 1, 1, 1, 1),
(7, 1, 2, 1, 1, 1, 1),
(8, 1, 3, 1, 1, 1, 1),
(9, 1, 4, 1, 1, 1, 1),
(10, 1, 5, 1, 1, 1, 1),
(267, 2, 1, 1, 1, 1, 1),
(268, 2, 2, 1, 1, 1, 1),
(269, 2, 3, 1, 0, 0, 0),
(270, 2, 4, 1, 0, 0, 0),
(271, 2, 5, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `idpersona` bigint(20) NOT NULL,
  `nombres` varchar(80) COLLATE utf8mb4_swedish_ci NOT NULL,
  `apellidos` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `email_user` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `password` varchar(75) COLLATE utf8mb4_swedish_ci NOT NULL,
  `locacion` varchar(50) COLLATE utf8mb4_swedish_ci NOT NULL,
  `token` varchar(100) COLLATE utf8mb4_swedish_ci DEFAULT NULL,
  `rolid` bigint(20) NOT NULL,
  `areaid` int(5) NOT NULL,
  `datecreated` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`idpersona`, `nombres`, `apellidos`, `email_user`, `password`, `locacion`, `token`, `rolid`, `areaid`, `datecreated`, `status`) VALUES
(1, 'Root', 'Root', 'usuario.root@blokitubos.com', 'Vizmont+ing+2022', 'Oficina Central', NULL, 0, 4, '2022-02-11 01:23:18', 1),
(2, 'Claudia', 'Saade', 'claudia.saade@blokitubos.com', 'Bloki2020$+Claudia.Saade', 'Oficina Central', '40c39e41eb08b0990c6d-9b09d7693fc6a735b50c-c3d1b891a4b004ac508d-0d81ce3568f109add96f', 1, 4, '2022-03-18 01:00:00', 1),
(3, 'Rodolfo', 'Miranda', 'rodolfo.miranda@blokitubos.com', 'Bloki2020$+Rodolfo.Miranda', 'Campo', NULL, 6, 2, '2022-03-18 01:25:09', 1),
(4, 'Edwin', 'Leiva', 'edwin.leiva@blokitubos.com', 'Bloki2020$+Edwin.Leiva', 'Campo', NULL, 6, 2, '2022-03-18 01:27:48', 1),
(5, 'Kevin', 'Saldaña', 'kevin.saldana@blokitubos.com', 'Bloki2020$+Kevin.Saldana', 'Oficina Central', '40c39e41eb08b0990c6d-9b09d7693fc6a735b50c-c3d1b891a4b004ac508d-0d81ce3568f109add96f', 16, 10, '2021-08-20 01:20:00', 1),
(6, 'Mario', 'Martínez', 'mario.martines@blokitubos.com', 'Bloki2020$+Mario.Martinez', 'Campo', NULL, 6, 2, '2022-03-18 01:41:58', 1),
(7, 'José', 'Renderos', 'jose.renderoz@blokitubos.com', 'Bloki2020$+Jose.Renderos', 'Oficina Central', NULL, 7, 2, '2022-03-18 01:46:30', 1),
(8, 'Kendy', 'Henríquez', 'kendy.henriquez@blokitubos.com', 'Bloki2020$+Kendy.Henriquez', 'Campo', NULL, 18, 8, '2022-03-18 01:55:18', 2),
(9, 'Guadalupe', 'López', 'guadalupe.lopez@blokitubos.com', 'Bloki2020$+Guadalupe.Lopez', 'Oficina Central', NULL, 6, 2, '2022-03-18 01:57:18', 1),
(10, 'Samuel', 'García', 'samuel.garcia@blokitubos.com', 'Bloki2020$+Samuel.Garcia', 'Oficina Central', NULL, 7, 2, '2022-03-18 01:59:10', 1),
(11, 'Jairo', 'Figueroa', 'jairo.figueroa@blokitubos.com', 'Bloki2020$+Jairo.Figueroa', 'Planta', NULL, 7, 8, '2022-03-18 02:05:12', 1),
(12, 'Gerson', 'Orellana', 'gerson.orellana@blokitubos.com', 'Bloki2020$+Gerson.Orellana', 'Oficina Central', NULL, 4, 1, '2022-03-18 02:07:30', 1),
(13, 'Heiner', 'Caballero', 'heiner.caballero@blokitubos.com', 'Bloki2020$+heiner.Caballero', 'Planta', NULL, 2, 1, '2022-03-18 02:08:29', 1),
(14, 'Joaquín', 'Rodríguez', 'joaquin.rodriguez@blokitubos.com', 'Bloki2020$+joaquin.Rodiguez', 'Oficina Central', NULL, 4, 1, '2022-03-18 02:15:38', 1),
(15, 'Loida', 'Galdámez', 'loida.galdamez@blokitubos.com', 'Bloki2020$+Loida.Galdamez', 'Campo', NULL, 11, 8, '2022-03-18 02:17:06', 1),
(16, 'Edda', 'Martínez', 'edda.martinez@blokitubos.com', 'Bloki2020$+Edda.Maritinez', 'Planta', NULL, 8, 1, '2022-03-18 02:18:23', 1),
(17, 'Saul', 'Hernández', 'saul.hernandez@blokitubos.com', 'Bloki2020$+Saul.Hernandez', 'Oficina Central', NULL, 2, 1, '2022-03-18 02:20:40', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idrol` bigint(20) NOT NULL,
  `nombrerol` varchar(50) COLLATE utf8mb4_swedish_ci NOT NULL,
  `descripcion` varchar(200) COLLATE utf8mb4_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idrol`, `nombrerol`, `descripcion`) VALUES
(0, 'Root', ''),
(1, 'Gerente General', ''),
(2, 'Supervisor de Logística', ''),
(3, 'Facturador', ''),
(4, 'Asistente de Despacho', ''),
(5, 'Analista de datos y Operaciones', ''),
(6, 'Asesor de Venta', ''),
(7, 'Gestor de Servicio al Cliente', ''),
(8, 'Jefe de Plantas', ''),
(9, 'Ingeniero de Calidad', ''),
(10, 'Jefe de Mercadeo', ''),
(11, 'Jefe de Auditoría Interna', ''),
(12, 'Jefe de Ventas', ''),
(13, 'Jefe de Contabilidad', ''),
(14, 'Transportista', ''),
(16, 'Coordinador de Operaciones', ''),
(17, 'Gestor de Ventas', 'libre'),
(18, 'Analista de Base de Datos', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`idarea`);

--
-- Indices de la tabla `camiones`
--
ALTER TABLE `camiones`
  ADD PRIMARY KEY (`idcamion`);

--
-- Indices de la tabla `cantidadcuposbloque`
--
ALTER TABLE `cantidadcuposbloque`
  ADD PRIMARY KEY (`cantidad_cupos_id`);

--
-- Indices de la tabla `cupos_camiones`
--
ALTER TABLE `cupos_camiones`
  ADD PRIMARY KEY (`id_cupo`);

--
-- Indices de la tabla `cupos_rastras`
--
ALTER TABLE `cupos_rastras`
  ADD PRIMARY KEY (`id_cupo`);

--
-- Indices de la tabla `cupo_asesor`
--
ALTER TABLE `cupo_asesor`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `domicilio`
--
ALTER TABLE `domicilio`
  ADD PRIMARY KEY (`id_domicilio`);

--
-- Indices de la tabla `modulo`
--
ALTER TABLE `modulo`
  ADD PRIMARY KEY (`idmodulo`);

--
-- Indices de la tabla `motoristas`
--
ALTER TABLE `motoristas`
  ADD PRIMARY KEY (`idmotorista`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`idpermiso`),
  ADD KEY `rolid` (`rolid`),
  ADD KEY `moduloid` (`moduloid`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`idpersona`),
  ADD KEY `rolid` (`rolid`),
  ADD KEY `areaid` (`areaid`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idrol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `area`
--
ALTER TABLE `area`
  MODIFY `idarea` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `camiones`
--
ALTER TABLE `camiones`
  MODIFY `idcamion` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `cantidadcuposbloque`
--
ALTER TABLE `cantidadcuposbloque`
  MODIFY `cantidad_cupos_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `cupos_camiones`
--
ALTER TABLE `cupos_camiones`
  MODIFY `id_cupo` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1232;

--
-- AUTO_INCREMENT de la tabla `cupos_rastras`
--
ALTER TABLE `cupos_rastras`
  MODIFY `id_cupo` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1188;

--
-- AUTO_INCREMENT de la tabla `cupo_asesor`
--
ALTER TABLE `cupo_asesor`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1853;

--
-- AUTO_INCREMENT de la tabla `modulo`
--
ALTER TABLE `modulo`
  MODIFY `idmodulo` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `motoristas`
--
ALTER TABLE `motoristas`
  MODIFY `idmotorista` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `idpermiso` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=272;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `idpersona` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `idrol` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD CONSTRAINT `permisos_ibfk_1` FOREIGN KEY (`rolid`) REFERENCES `rol` (`idrol`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permisos_ibfk_2` FOREIGN KEY (`moduloid`) REFERENCES `modulo` (`idmodulo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `persona_ibfk_1` FOREIGN KEY (`rolid`) REFERENCES `rol` (`idrol`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-05-2024 a las 23:29:57
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `parqueo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_clientes`
--

CREATE TABLE `tb_clientes` (
  `id_cliente` int(11) NOT NULL,
  `nombre_cliente` varchar(255) DEFAULT NULL,
  `nit_ci_cliente` varchar(255) DEFAULT NULL,
  `placa_auto` varchar(255) DEFAULT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `fyh_eliminacion` datetime DEFAULT NULL,
  `estado` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `tb_clientes`
--

INSERT INTO `tb_clientes` (`id_cliente`, `nombre_cliente`, `nit_ci_cliente`, `placa_auto`, `fyh_creacion`, `fyh_actualizacion`, `fyh_eliminacion`, `estado`) VALUES
(12, 'Valentina Vega', '10923443', 'xjlas', '2024-04-25 08:03:10', NULL, NULL, '1'),
(14, 'David Rivas', '123922', 'hghg', '2024-04-25 08:06:31', NULL, NULL, '1'),
(15, 'Paula Barrios', '1000235', 'kllpz', '2024-04-25 08:30:08', NULL, NULL, '1'),
(16, 'felipe sanchez', '912884', 'jhkkd', '2024-05-14 05:21:14', NULL, NULL, '1'),
(17, 'julian perez', '94949', 'klzk', '2024-05-14 05:22:54', NULL, NULL, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_facturaciones`
--

CREATE TABLE `tb_facturaciones` (
  `id_facturacion` int(11) NOT NULL,
  `id_informacion` varchar(255) DEFAULT NULL,
  `nro_factura` varchar(255) DEFAULT NULL,
  `id_cliente` varchar(255) DEFAULT NULL,
  `fecha_factura` varchar(255) DEFAULT NULL,
  `fecha_ingreso` varchar(255) DEFAULT NULL,
  `hora_ingreso` varchar(255) DEFAULT NULL,
  `fecha_salida` varchar(255) DEFAULT NULL,
  `hora_salida` varchar(255) DEFAULT NULL,
  `tiempo` varchar(255) DEFAULT NULL,
  `cuviculo` varchar(255) DEFAULT NULL,
  `detalle` varchar(255) DEFAULT NULL,
  `precio` varchar(255) DEFAULT NULL,
  `cantidad` varchar(255) DEFAULT NULL,
  `total` varchar(255) DEFAULT NULL,
  `monto_total` varchar(255) DEFAULT NULL,
  `monto_literal` varchar(255) DEFAULT NULL,
  `user_sesion` varchar(255) DEFAULT NULL,
  `qr` varchar(255) DEFAULT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `fyh_eliminacion` datetime DEFAULT NULL,
  `estado` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `tb_facturaciones`
--

INSERT INTO `tb_facturaciones` (`id_facturacion`, `id_informacion`, `nro_factura`, `id_cliente`, `fecha_factura`, `fecha_ingreso`, `hora_ingreso`, `fecha_salida`, `hora_salida`, `tiempo`, `cuviculo`, `detalle`, `precio`, `cantidad`, `total`, `monto_total`, `monto_literal`, `user_sesion`, `qr`, `fyh_creacion`, `fyh_actualizacion`, `fyh_eliminacion`, `estado`) VALUES
(1, '1', '1', '14', 'Neiva, 14 de Mayo de 2024', '2024-04-25', '20:04', '2024-05-14', '17:19', '18 días con 21 horas con 15 minutos ', '25', 'Servicio de parqueo de 18 días con 21 horas con 15 minutos ', '31000', '1', '31000', '31000', 'TREINTA Y UN MIL CON 00/100 Bs.', 'u20212200868@usco.edu.co', 'Factura realizada por el sistema de paqueo, al cliente David Rivas con CI/NIT:\n 123922 con el vehiculo con número de placa hghg y esta factura se genero en\n  Neiva, 14 de Mayo de 2024 a hr: 17:19', '2024-05-14 05:19:46', NULL, NULL, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_informaciones`
--

CREATE TABLE `tb_informaciones` (
  `id_informacion` int(11) NOT NULL,
  `nombre_parqueo` varchar(255) DEFAULT NULL,
  `actividad_empresa` varchar(255) DEFAULT NULL,
  `sucursal` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `zona` varchar(255) DEFAULT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `departamento_ciudad` varchar(255) DEFAULT NULL,
  `pais` varchar(255) DEFAULT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `fyh_eliminacion` datetime DEFAULT NULL,
  `estado` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `tb_informaciones`
--

INSERT INTO `tb_informaciones` (`id_informacion`, `nombre_parqueo`, `actividad_empresa`, `sucursal`, `direccion`, `zona`, `telefono`, `departamento_ciudad`, `pais`, `fyh_creacion`, `fyh_actualizacion`, `fyh_eliminacion`, `estado`) VALUES
(1, 'PARQUEADERO NEIVA YORK', 'parqueadero', '1', 'Calle 38 # 7 A 51 Tenerife', '2', '3217696864- 322987621', 'Neiva', 'Colombia', '2024-04-19 01:19:58', NULL, NULL, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_mapeos`
--

CREATE TABLE `tb_mapeos` (
  `id_map` int(11) NOT NULL,
  `nro_espacio` varchar(255) DEFAULT NULL,
  `estado_espacio` varchar(255) DEFAULT NULL,
  `obs` varchar(255) DEFAULT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `fyh_eliminacion` datetime DEFAULT NULL,
  `estado` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `tb_mapeos`
--

INSERT INTO `tb_mapeos` (`id_map`, `nro_espacio`, `estado_espacio`, `obs`, `fyh_creacion`, `fyh_actualizacion`, `fyh_eliminacion`, `estado`) VALUES
(1, '1', 'OCUPADO', '', '2024-04-25 07:47:30', '2024-04-25 08:03:10', NULL, '1'),
(2, '2', 'LIBRE', '', '2024-04-25 07:47:54', NULL, NULL, '1'),
(3, '3', 'LIBRE', '', '2024-04-25 07:47:57', NULL, NULL, '1'),
(4, '4', 'LIBRE', '', '2024-04-25 07:48:00', NULL, NULL, '1'),
(5, '5', 'LIBRE', '', '2024-04-25 07:48:03', NULL, NULL, '1'),
(6, '6', 'LIBRE', '', '2024-04-25 07:48:06', NULL, NULL, '1'),
(7, '7', 'LIBRE', '', '2024-04-25 07:48:09', NULL, NULL, '1'),
(8, '8', 'LIBRE', '', '2024-04-25 07:48:12', NULL, NULL, '1'),
(9, '9', 'LIBRE', '', '2024-04-25 07:48:15', NULL, NULL, '1'),
(10, '10', 'LIBRE', '', '2024-04-25 07:48:19', NULL, NULL, '1'),
(11, '11', 'LIBRE', '', '2024-04-25 07:48:22', NULL, NULL, '1'),
(12, '12', 'LIBRE', '', '2024-04-25 07:48:26', NULL, NULL, '1'),
(13, '13', 'LIBRE', '', '2024-04-25 07:48:29', NULL, NULL, '1'),
(14, '14', 'LIBRE', '', '2024-04-25 07:48:31', NULL, NULL, '1'),
(15, '15', 'LIBRE', '', '2024-04-25 07:48:35', NULL, NULL, '1'),
(16, '16', 'LIBRE', '', '2024-04-25 07:48:38', NULL, NULL, '1'),
(17, '17', 'LIBRE', '', '2024-04-25 07:48:42', NULL, NULL, '1'),
(18, '18', 'LIBRE', '', '2024-04-25 07:48:45', '2024-04-25 08:01:13', NULL, '1'),
(19, '19', 'LIBRE', '', '2024-04-25 07:48:49', NULL, NULL, '1'),
(20, '20', 'LIBRE', '', '2024-04-25 07:48:52', NULL, NULL, '1'),
(21, '21', 'LIBRE', '', '2024-04-25 07:48:56', '2024-04-25 07:53:00', NULL, '1'),
(22, '22', 'OCUPADO', '', '2024-04-25 07:48:59', '2024-04-25 08:30:08', NULL, '1'),
(23, '23', 'LIBRE', '', '2024-04-25 07:49:03', NULL, NULL, '1'),
(24, '24', 'LIBRE', '', '2024-04-25 07:49:07', NULL, NULL, '1'),
(25, '25', 'LIBRE', '', '2024-04-25 07:49:24', '2024-05-14 05:19:46', NULL, '1'),
(26, '26', 'LIBRE', '', '2024-04-25 07:49:28', NULL, NULL, '1'),
(27, '27', 'LIBRE', '', '2024-04-25 07:49:42', NULL, NULL, '1'),
(28, '28', 'LIBRE', '', '2024-04-25 07:49:46', NULL, NULL, '1'),
(29, '29', 'LIBRE', '', '2024-04-25 07:49:49', NULL, NULL, '1'),
(30, '30', 'LIBRE', '', '2024-04-25 07:49:53', NULL, NULL, '1'),
(32, '31', 'LIBRE', '', '2024-04-25 07:49:59', NULL, NULL, '1'),
(34, '32', 'LIBRE', '', '2024-04-25 07:50:06', NULL, NULL, '1'),
(35, '33', 'LIBRE', '', '2024-04-25 07:50:09', NULL, NULL, '1'),
(36, '34', 'OCUPADO', '', '2024-04-25 07:54:17', '2024-05-14 05:22:54', NULL, '1'),
(37, '35', 'LIBRE', '', '2024-04-25 08:02:00', NULL, NULL, '1'),
(38, '36', 'LIBRE', '', '2024-05-14 05:19:21', NULL, NULL, '1'),
(39, '37', 'LIBRE', '', '2024-05-14 05:19:26', NULL, NULL, '1'),
(40, '38', 'LIBRE', '', '2024-05-14 05:19:30', NULL, NULL, '1'),
(41, '39', 'LIBRE', '', '2024-05-14 05:19:35', NULL, NULL, '1'),
(42, '40', 'LIBRE', '', '2024-05-14 05:19:40', NULL, NULL, '1'),
(43, '41', 'LIBRE', '', '2024-05-14 05:20:15', NULL, NULL, '1'),
(44, '42', 'LIBRE', '', '2024-05-14 05:20:19', NULL, NULL, '1'),
(45, '43', 'OCUPADO', '', '2024-05-14 05:20:23', '2024-05-14 05:21:14', NULL, '1'),
(46, '44', 'LIBRE', '', '2024-05-14 05:20:27', NULL, NULL, '1'),
(47, '45', 'LIBRE', '', '2024-05-14 05:20:31', NULL, NULL, '1'),
(48, '46', 'LIBRE', '', '2024-05-14 05:20:35', NULL, NULL, '1'),
(49, '47', 'LIBRE', '', '2024-05-14 05:20:40', NULL, NULL, '1'),
(50, '48', 'LIBRE', '', '2024-05-14 05:20:47', NULL, NULL, '1'),
(51, '49', 'LIBRE', '', '2024-05-14 05:20:53', NULL, NULL, '1'),
(52, '50', 'LIBRE', '', '2024-05-14 05:20:57', NULL, NULL, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_precios`
--

CREATE TABLE `tb_precios` (
  `id_precio` int(11) NOT NULL,
  `cantidad` varchar(255) DEFAULT NULL,
  `detalle` varchar(255) DEFAULT NULL,
  `precio` varchar(255) DEFAULT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `fyh_eliminacion` datetime DEFAULT NULL,
  `estado` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `tb_precios`
--

INSERT INTO `tb_precios` (`id_precio`, `cantidad`, `detalle`, `precio`, `fyh_creacion`, `fyh_actualizacion`, `fyh_eliminacion`, `estado`) VALUES
(1, '1', 'HORAS', '2000', '2024-04-22 06:00:42', NULL, NULL, '1'),
(2, '2', 'HORAS', '4000', '2024-04-22 06:00:51', NULL, NULL, '1'),
(3, '3', 'HORAS', '6000', '2024-04-22 06:00:58', NULL, NULL, '1'),
(4, '4', 'HORAS', '8000', '2024-04-22 06:01:09', NULL, NULL, '1'),
(5, '5', 'HORAS', '10000', NULL, NULL, NULL, '1'),
(7, '6', 'HORAS', '14000', NULL, '2024-04-22 06:04:34', NULL, '1'),
(8, '7', 'HORAS', '15000', NULL, '2024-04-22 06:04:39', NULL, '1'),
(9, '8', 'HORAS', '16000', '2024-04-22 06:04:17', '2024-04-22 06:04:45', NULL, '1'),
(10, '9', 'HORAS', '18000', '2024-04-22 06:05:06', NULL, NULL, '1'),
(11, '10', 'HORAS', '20000', '2024-04-22 06:05:17', NULL, NULL, '1'),
(12, '11', 'HORAS', '22000', '2024-04-22 06:05:40', '2024-04-22 06:06:33', NULL, '1'),
(13, '12', 'HORAS', '23000', '2024-04-22 06:05:53', '2024-04-22 06:06:38', NULL, '1'),
(14, '13', 'HORAS', '24000', '2024-04-22 06:06:15', '2024-04-22 06:06:43', NULL, '1'),
(15, '14', 'HORAS', '25000', '2024-04-22 06:06:54', NULL, NULL, '1'),
(16, '15', 'HORAS', '26000', '2024-04-22 06:07:08', NULL, NULL, '1'),
(17, '16', 'HORAS', '27000', '2024-04-22 06:07:30', '2024-04-22 06:07:39', NULL, '1'),
(18, '17', 'HORAS', '27000', '2024-04-22 06:07:51', NULL, NULL, '1'),
(19, '18', 'HORAS', '28000', '2024-04-22 06:08:00', NULL, NULL, '1'),
(20, '19', 'HORAS', '29000', '2024-04-22 06:08:07', NULL, NULL, '1'),
(21, '20', 'HORAS', '30000', '2024-04-22 06:08:17', '2024-04-22 06:08:27', NULL, '1'),
(22, '21', 'HORAS', '31000', '2024-04-22 06:10:04', NULL, NULL, '1'),
(23, '22', 'HORAS', '32000', '2024-04-22 06:10:09', NULL, NULL, '1'),
(24, '23', 'HORAS', '33000', '2024-04-22 06:10:15', NULL, NULL, '1'),
(25, '24', 'HORAS', '34000', '2024-04-22 06:10:22', NULL, NULL, '1'),
(26, '1', 'DIAS', '25000', '2024-04-22 06:14:38', NULL, NULL, '1'),
(27, '2', 'DIAS', '40000', '2024-04-22 06:14:49', NULL, NULL, '1'),
(28, '3', 'DIAS', '60000', '2024-04-22 06:14:58', '2024-04-22 06:15:04', NULL, '1'),
(29, '4', 'DIAS', '80000', '2024-04-22 06:15:30', NULL, NULL, '1'),
(30, '5', 'DIAS', '100000', '2024-04-22 06:15:51', NULL, NULL, '1'),
(31, '10', 'DIAS', '150000', '2024-04-22 06:16:06', NULL, NULL, '1'),
(32, '20', 'DIAS', '250000', '2024-04-22 06:16:16', NULL, NULL, '1'),
(33, '30', 'DIAS', '350000', '2024-04-22 06:16:33', NULL, NULL, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_roles`
--

CREATE TABLE `tb_roles` (
  `id_rol` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `fyh_eliminacion` datetime DEFAULT NULL,
  `estado` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `tb_roles`
--

INSERT INTO `tb_roles` (`id_rol`, `nombre`, `fyh_creacion`, `fyh_actualizacion`, `fyh_eliminacion`, `estado`) VALUES
(1, 'CONTADOR', '2024-04-19 01:16:42', NULL, NULL, '1'),
(2, 'ADMINISTRADOR', '2024-04-19 01:17:38', NULL, NULL, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_tickets`
--

CREATE TABLE `tb_tickets` (
  `id_ticket` int(11) NOT NULL,
  `nombre_cliente` varchar(255) DEFAULT NULL,
  `nit_ci` varchar(255) DEFAULT NULL,
  `placa_auto` varchar(255) DEFAULT NULL,
  `cuviculo` varchar(255) DEFAULT NULL,
  `fecha_ingreso` varchar(255) DEFAULT NULL,
  `hora_ingreso` varchar(255) DEFAULT NULL,
  `estado_ticket` varchar(255) DEFAULT NULL,
  `user_sesion` varchar(255) DEFAULT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `fyh_eliminacion` datetime DEFAULT NULL,
  `estado` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `tb_tickets`
--

INSERT INTO `tb_tickets` (`id_ticket`, `nombre_cliente`, `nit_ci`, `placa_auto`, `cuviculo`, `fecha_ingreso`, `hora_ingreso`, `estado_ticket`, `user_sesion`, `fyh_creacion`, `fyh_actualizacion`, `fyh_eliminacion`, `estado`) VALUES
(50, 'Valentina Vanega', '10099322', 'KLZS', '1', '2024-04-25', '19:56', 'OCUPADO', 'u20212200868@usco.edu.co', '2024-04-25 07:56:48', NULL, '2024-04-25 08:01:15', '0'),
(51, 'VSSKZXV', '1992234', 'LKPPXZ', '18', '2024-04-25', '19:56', 'OCUPADO', 'u20212200868@usco.edu.co', '2024-04-25 07:59:42', NULL, '2024-04-25 08:01:13', '0'),
(52, 'Andrea Suarez', '29934812', 'KHJHJ', '33', '2024-04-25', '19:59', 'OCUPADO', 'u20212200868@usco.edu.co', '2024-04-25 08:00:50', NULL, NULL, '1'),
(53, 'Valentina Vega', '10923443', 'XJLAS', '1', '2024-04-25', '20:02', 'OCUPADO', 'u20212200868@usco.edu.co', '2024-04-25 08:03:10', NULL, NULL, '1'),
(54, 'Andrea Vega', '23454', 'VVCGF', '31', '2024-04-25', '20:03', 'OCUPADO', 'u20212200868@usco.edu.co', '2024-04-25 08:04:06', NULL, NULL, '1'),
(55, 'David Rivas', '123922', 'HGHG', '25', '2024-04-25', '20:04', 'LIBRE', 'u20212200868@usco.edu.co', '2024-04-25 08:06:31', NULL, NULL, '1'),
(56, 'Paula Barrios', '1000235', 'KLLPZ', '22', '2024-04-25', '20:06', 'OCUPADO', 'u20212200868@usco.edu.co', '2024-04-25 08:30:08', NULL, NULL, '1'),
(57, 'felipe sanchez', '912884', 'JHKKD', '45', '2024-05-14', '17:20', 'OCUPADO', 'u20212200868@usco.edu.co', '2024-05-14 05:21:14', NULL, NULL, '1'),
(58, 'julian perez', '94949', 'KLZK', '36', '2024-05-14', '17:22', 'OCUPADO', 'u20212200868@usco.edu.co', '2024-05-14 05:22:54', NULL, NULL, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_usuarios`
--

CREATE TABLE `tb_usuarios` (
  `id` int(11) NOT NULL,
  `nombres` varchar(255) DEFAULT NULL,
  `rol` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `email_verificado` varchar(255) DEFAULT NULL,
  `password_user` varchar(255) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `fyh_eliminacion` datetime DEFAULT NULL,
  `estado` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `tb_usuarios`
--

INSERT INTO `tb_usuarios` (`id`, `nombres`, `rol`, `email`, `email_verificado`, `password_user`, `token`, `fyh_creacion`, `fyh_actualizacion`, `fyh_eliminacion`, `estado`) VALUES
(1, 'Felipe Sanchéz', 'ADMINISTRADOR', 'u20212200868@usco.edu.co', 'Si', '12345', NULL, NULL, '2024-04-24 07:04:28', NULL, '1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tb_clientes`
--
ALTER TABLE `tb_clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `tb_facturaciones`
--
ALTER TABLE `tb_facturaciones`
  ADD PRIMARY KEY (`id_facturacion`);

--
-- Indices de la tabla `tb_informaciones`
--
ALTER TABLE `tb_informaciones`
  ADD PRIMARY KEY (`id_informacion`);

--
-- Indices de la tabla `tb_mapeos`
--
ALTER TABLE `tb_mapeos`
  ADD PRIMARY KEY (`id_map`);

--
-- Indices de la tabla `tb_precios`
--
ALTER TABLE `tb_precios`
  ADD PRIMARY KEY (`id_precio`);

--
-- Indices de la tabla `tb_roles`
--
ALTER TABLE `tb_roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `tb_tickets`
--
ALTER TABLE `tb_tickets`
  ADD PRIMARY KEY (`id_ticket`);

--
-- Indices de la tabla `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tb_clientes`
--
ALTER TABLE `tb_clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `tb_facturaciones`
--
ALTER TABLE `tb_facturaciones`
  MODIFY `id_facturacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tb_informaciones`
--
ALTER TABLE `tb_informaciones`
  MODIFY `id_informacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tb_mapeos`
--
ALTER TABLE `tb_mapeos`
  MODIFY `id_map` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de la tabla `tb_precios`
--
ALTER TABLE `tb_precios`
  MODIFY `id_precio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `tb_roles`
--
ALTER TABLE `tb_roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tb_tickets`
--
ALTER TABLE `tb_tickets`
  MODIFY `id_ticket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT de la tabla `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

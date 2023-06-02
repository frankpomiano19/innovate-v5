-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-01-2023 a las 23:54:42
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyect_innovate`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE `departamentos` (
  `id_departamentos` int(11) NOT NULL,
  `name_departamentos` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`id_departamentos`, `name_departamentos`) VALUES
(1, 'Lima');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distritos`
--

CREATE TABLE `distritos` (
  `id_distritos` int(11) NOT NULL,
  `name_distritos` varchar(60) NOT NULL,
  `id_provincia` int(11) NOT NULL,
  `id_departamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `distritos`
--

INSERT INTO `distritos` (`id_distritos`, `name_distritos`, `id_provincia`, `id_departamento`) VALUES
(1, 'San Isidro', 1, 1),
(2, 'San Luis', 1, 1),
(3, 'San Miguel', 1, 1),
(4, 'MIraflores', 1, 1),
(5, 'Pueblo Libre', 1, 1),
(6, 'Magdalena del Mar', 1, 1),
(7, 'Villa el Salvador', 1, 1),
(8, 'San Martin de Porres', 1, 1),
(9, 'San Borja', 1, 1),
(10, 'Santa Anita', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `id_empresa` int(11) NOT NULL,
  `tipo_documento` int(11) NOT NULL,
  `doc_num` char(15) NOT NULL,
  `razon_social` text NOT NULL,
  `nombre_comercial` text NOT NULL,
  `icono_web` text NOT NULL,
  `logo_documentos` text NOT NULL,
  `direccion_empresa` varchar(200) NOT NULL,
  `id_pais` int(11) NOT NULL,
  `id_departamento` int(11) NOT NULL,
  `id_distrito` int(11) NOT NULL,
  `telefono` varchar(12) DEFAULT NULL,
  `email_empresa` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`id_empresa`, `tipo_documento`, `doc_num`, `razon_social`, `nombre_comercial`, `icono_web`, `logo_documentos`, `direccion_empresa`, `id_pais`, `id_departamento`, `id_distrito`, `telefono`, `email_empresa`) VALUES
(1, 2, '20100044626', 'Geomatic Green', 'Geomatic', 'icon.png', 'logo_grande.png', '', 1, 1, 1, '99999', 'prueba_empresa@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `espacios_disco`
--

CREATE TABLE `espacios_disco` (
  `id_espacios` int(11) NOT NULL,
  `descripcion_espacios` char(4) NOT NULL,
  `tipo_capacidad` varchar(2) NOT NULL,
  `status_espacios` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `espacios_disco`
--

INSERT INTO `espacios_disco` (`id_espacios`, `descripcion_espacios`, `tipo_capacidad`, `status_espacios`) VALUES
(1, '8', 'GB', 1),
(2, '15', 'GB', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `img_proyect`
--

CREATE TABLE `img_proyect` (
  `id_img` int(11) NOT NULL,
  `id_proyect` char(8) NOT NULL,
  `name_imagen` varchar(60) NOT NULL,
  `size_imagen` varchar(30) NOT NULL,
  `formatt` varchar(30) NOT NULL,
  `folder_imagen` varchar(100) NOT NULL,
  `url_imagen` text NOT NULL,
  `fecha_upload` date NOT NULL,
  `fecha_update` date NOT NULL,
  `status_imagen` int(1) NOT NULL,
  `process_img` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `img_proyect`
--

INSERT INTO `img_proyect` (`id_img`, `id_proyect`, `name_imagen`, `size_imagen`, `formatt`, `folder_imagen`, `url_imagen`, `fecha_upload`, `fecha_update`, `status_imagen`, `process_img`) VALUES
(10, '26849715', 'Files_388649702.tif', '211', 'Kb', '26849715', '../../../files/26849715', '2023-01-09', '0000-00-00', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `log_session`
--

CREATE TABLE `log_session` (
  `id_log` int(11) NOT NULL,
  `ip_log` varchar(30) NOT NULL,
  `tiempo_log` datetime NOT NULL,
  `detalle_log` varchar(120) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `log_session`
--

INSERT INTO `log_session` (`id_log`, `ip_log`, `tiempo_log`, `detalle_log`, `id_user`) VALUES
(1, '127.0.0.1', '2022-12-19 04:22:04', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:107.0) Gecko/20', 1),
(2, '127.0.0.1', '2022-12-19 04:23:02', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:107.0) Gecko/20', 1),
(3, '127.0.0.1', '2022-12-19 04:52:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:107.0) Gecko/20', 1),
(4, '127.0.0.1', '2022-12-19 05:56:42', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:107.0) Gecko/20', 1),
(5, '127.0.0.1', '2022-12-20 09:53:39', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:107.0) Gecko/20', 1),
(6, '127.0.0.1', '2022-12-20 10:29:02', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:107.0) Gecko/20', 1),
(7, '127.0.0.1', '2022-12-20 01:25:45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:107.0) Gecko/20', 2),
(8, '127.0.0.1', '2022-12-20 04:45:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:107.0) Gecko/20', 1),
(9, '127.0.0.1', '2022-12-21 11:44:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:108.0) Gecko/20', 1),
(10, '127.0.0.1', '2022-12-21 11:47:21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:108.0) Gecko/20', 1),
(11, '127.0.0.1', '2022-12-21 03:51:40', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:108.0) Gecko/20', 1),
(12, '127.0.0.1', '2022-12-21 04:09:18', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:108.0) Gecko/20', 1),
(13, '127.0.0.1', '2022-12-21 04:13:26', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:108.0) Gecko/20', 1),
(14, '127.0.0.1', '2022-12-21 04:43:22', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:108.0) Gecko/20', 1),
(15, '127.0.0.1', '2022-12-21 04:49:47', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:108.0) Gecko/20', 1),
(16, '127.0.0.1', '2022-12-21 05:32:51', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:108.0) Gecko/20', 1),
(17, '127.0.0.1', '2022-12-21 05:37:18', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:108.0) Gecko/20', 1),
(18, '127.0.0.1', '2022-12-22 10:22:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:108.0) Gecko/20', 1),
(19, '127.0.0.1', '2022-12-22 10:51:04', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:108.0) Gecko/20', 1),
(20, '127.0.0.1', '2022-12-26 03:33:33', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:108.0) Gecko/20', 1),
(21, '127.0.0.1', '2022-12-26 04:06:56', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:108.0) Gecko/20', 1),
(22, '127.0.0.1', '2022-12-26 04:10:55', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:108.0) Gecko/20', 1),
(23, '127.0.0.1', '2022-12-26 05:48:39', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:108.0) Gecko/20', 1),
(24, '127.0.0.1', '2022-12-27 09:54:20', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:108.0) Gecko/20', 1),
(25, '127.0.0.1', '2022-12-27 04:08:14', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:108.0) Gecko/20', 1),
(26, '127.0.0.1', '2022-12-27 05:25:02', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:108.0) Gecko/20', 1),
(27, '127.0.0.1', '2022-12-28 10:24:44', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:108.0) Gecko/20', 1),
(28, '127.0.0.1', '2022-12-28 11:27:59', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:108.0) Gecko/20', 1),
(29, '127.0.0.1', '2022-12-28 01:09:19', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:108.0) Gecko/20', 1),
(30, '127.0.0.1', '2022-12-28 04:31:25', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:108.0) Gecko/20', 1),
(31, '127.0.0.1', '2022-12-29 09:52:36', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:108.0) Gecko/20', 1),
(32, '127.0.0.1', '2022-12-29 09:56:23', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:108.0) Gecko/20', 1),
(33, '127.0.0.1', '2022-12-29 10:34:16', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:108.0) Gecko/20', 1),
(34, '127.0.0.1', '2022-12-29 11:32:24', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:108.0) Gecko/20', 1),
(35, '127.0.0.1', '2022-12-29 01:10:46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:108.0) Gecko/20', 1),
(36, '127.0.0.1', '2022-12-29 05:34:39', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:108.0) Gecko/20', 1),
(37, '127.0.0.1', '2022-12-29 05:37:32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:108.0) Gecko/20', 1),
(38, '127.0.0.1', '2022-12-29 05:38:50', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:108.0) Gecko/20', 1),
(39, '127.0.0.1', '2022-12-29 05:49:16', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:108.0) Gecko/20', 1),
(40, '127.0.0.1', '2022-12-30 09:32:25', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:108.0) Gecko/20', 1),
(41, '127.0.0.1', '2022-12-30 11:42:53', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:108.0) Gecko/20', 1),
(42, '127.0.0.1', '2023-01-02 10:25:42', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:108.0) Gecko/20', 1),
(43, '127.0.0.1', '2023-01-02 03:07:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:108.0) Gecko/20', 1),
(44, '127.0.0.1', '2023-01-02 04:03:55', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:108.0) Gecko/20', 1),
(45, '127.0.0.1', '2023-01-02 04:43:56', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:108.0) Gecko/20', 1),
(46, '127.0.0.1', '2023-01-02 05:15:04', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:108.0) Gecko/20', 1),
(47, '127.0.0.1', '2023-01-02 05:43:29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:108.0) Gecko/20', 1),
(48, '127.0.0.1', '2023-01-02 05:44:49', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:108.0) Gecko/20', 1),
(49, '127.0.0.1', '2023-01-03 11:54:18', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:108.0) Gecko/20', 1),
(50, '127.0.0.1', '2023-01-04 11:59:16', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:108.0) Gecko/20', 1),
(51, '127.0.0.1', '2023-01-04 01:24:30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:108.0) Gecko/20', 1),
(52, '127.0.0.1', '2023-01-04 01:51:01', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:108.0) Gecko/20', 1),
(53, '127.0.0.1', '2023-01-04 01:56:38', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:108.0) Gecko/20', 1),
(54, '127.0.0.1', '2023-01-04 05:48:16', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:108.0) Gecko/20', 1),
(55, '127.0.0.1', '2023-01-04 05:56:32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:108.0) Gecko/20', 1),
(56, '127.0.0.1', '2023-01-05 09:29:34', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:108.0) Gecko/20', 1),
(57, '127.0.0.1', '2023-01-05 09:39:28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:108.0) Gecko/20', 1),
(58, '127.0.0.1', '2023-01-05 10:56:10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:108.0) Gecko/20', 1),
(59, '127.0.0.1', '2023-01-05 11:38:22', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:108.0) Gecko/20', 1),
(60, '127.0.0.1', '2023-01-06 09:33:35', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:108.0) Gecko/20', 1),
(61, '127.0.0.1', '2023-01-06 04:16:40', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:108.0) Gecko/20', 1),
(62, '127.0.0.1', '2023-01-06 04:45:31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:108.0) Gecko/20', 1),
(63, '127.0.0.1', '2023-01-09 10:10:51', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:108.0) Gecko/20', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE `pais` (
  `id_pais` int(11) NOT NULL,
  `codigo_pais` char(4) NOT NULL,
  `descripcion_pais` varchar(60) NOT NULL,
  `status_pais` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`id_pais`, `codigo_pais`, `descripcion_pais`, `status_pais`) VALUES
(1, '01', 'Peru', 1),
(2, '02', 'Colomnia', 1),
(3, '03', 'Venezuela', 1),
(4, '04', 'Costa Rica', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planes_accesos`
--

CREATE TABLE `planes_accesos` (
  `id_plan` int(11) NOT NULL,
  `descripcion_plan` varchar(100) NOT NULL,
  `precio_plan` double NOT NULL,
  `status_plan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `planes_accesos`
--

INSERT INTO `planes_accesos` (`id_plan`, `descripcion_plan`, `precio_plan`, `status_plan`) VALUES
(1, 'Plan Free', 0, 1),
(2, 'Plan Medium', 50, 1),
(3, 'Premium ', 100, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyects`
--

CREATE TABLE `proyects` (
  `id_proyect` int(11) NOT NULL,
  `date_created` date NOT NULL,
  `proyect_name` varchar(50) NOT NULL,
  `proyect_token_security` char(8) NOT NULL,
  `proyect_status` int(1) NOT NULL,
  `proyect_responsability_user` int(11) NOT NULL,
  `proyect_result_process` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proyects`
--

INSERT INTO `proyects` (`id_proyect`, `date_created`, `proyect_name`, `proyect_token_security`, `proyect_status`, `proyect_responsability_user`, `proyect_result_process`) VALUES
(1, '2022-12-19', 'prueba', '26849715', 1, 1, ''),
(2, '2023-01-04', 'prueba2', '31589467', 1, 1, ''),
(3, '2023-01-05', 'prueba3', '83519762', 1, 1, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_access_plataform`
--

CREATE TABLE `tipo_access_plataform` (
  `id_access_plataforma` int(11) NOT NULL,
  `descripcion_access` varchar(60) NOT NULL,
  `status_access_p` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_access_plataform`
--

INSERT INTO `tipo_access_plataform` (`id_access_plataforma`, `descripcion_access`, `status_access_p`) VALUES
(1, 'Plataforma_Cliente', 1),
(2, 'Plataforma_administrable', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_documento`
--

CREATE TABLE `tipo_documento` (
  `id_doc` int(11) NOT NULL,
  `codigo_doc` char(4) NOT NULL,
  `descripcion_doc` varchar(60) NOT NULL,
  `status_doc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_documento`
--

INSERT INTO `tipo_documento` (`id_doc`, `codigo_doc`, `descripcion_doc`, `status_doc`) VALUES
(1, '01', 'Documento de Identidad', 1),
(2, '02', 'RUC', 1),
(3, '03', 'Carne de Extrangería', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `id_tipo_doc` int(11) NOT NULL,
  `num_documento` char(12) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `telefono` varchar(12) NOT NULL,
  `user_email` text NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_password_hash` longtext NOT NULL,
  `img_perfil` text NOT NULL,
  `cod_security` char(6) NOT NULL,
  `plataforma_access` int(11) NOT NULL COMMENT 'campo que determina si solo ingresa al portal cliente o portal empresa interna',
  `user_login_status` int(11) NOT NULL,
  `plan_work` int(11) NOT NULL COMMENT 'si tiene accesos limitados segun el plan adquirido(free, medium, premium)',
  `id_espacio` int(11) NOT NULL COMMENT 'espacio que tendra para trabajar en entorno de la plataforma',
  `fecha_inicio` date NOT NULL COMMENT 'fecha en la cual incia el periodo de prueba o acceso al sistema',
  `fecha_finaliza` date NOT NULL COMMENT 'fecha en la cual finaliza su acceso a la plataforma, es necesario renovarlo para ingresar',
  `verificado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_user`, `fecha_creacion`, `id_tipo_doc`, `num_documento`, `firstname`, `lastname`, `telefono`, `user_email`, `user_name`, `user_password_hash`, `img_perfil`, `cod_security`, `plataforma_access`, `user_login_status`, `plan_work`, `id_espacio`, `fecha_inicio`, `fecha_finaliza`, `verificado`) VALUES
(1, '2022-12-19 04:22:02', 1, '46024155', 'FELIX', 'RODRIGUEZ', '', 'jroman@hotmail.com', 'jroman@hotmail.com', 'a346bc80408d9b2a5063fd1bddb20e2d5586ec30', '4602415516714849771317558318.png', 'I1YUJC', 1, 1, 1, 1, '2022-12-19', '2023-01-19', 1),
(2, '2022-12-20 01:25:07', 0, '', 'ROBERTO', 'JIMENEZ', '', 'roberto@hotmail.com', 'roberto@hotmail.com', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', 'default.png', 'RTJO4U', 1, 1, 1, 1, '2022-12-20', '2023-01-20', 0),
(3, '2022-12-26 04:02:48', 0, '', 'FELIPE', 'JIMENEZ', '', 'FELIPE@hotmail.com', 'FELIPE@hotmail.com', 'a041d716dc97a3254aa5602eef8486a96d79955d', 'default.png', 'YW4SOV', 1, 1, 1, 1, '2022-12-26', '2023-01-26', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`id_departamentos`);

--
-- Indices de la tabla `distritos`
--
ALTER TABLE `distritos`
  ADD PRIMARY KEY (`id_distritos`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id_empresa`);

--
-- Indices de la tabla `espacios_disco`
--
ALTER TABLE `espacios_disco`
  ADD PRIMARY KEY (`id_espacios`);

--
-- Indices de la tabla `img_proyect`
--
ALTER TABLE `img_proyect`
  ADD PRIMARY KEY (`id_img`);

--
-- Indices de la tabla `log_session`
--
ALTER TABLE `log_session`
  ADD PRIMARY KEY (`id_log`);

--
-- Indices de la tabla `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`id_pais`);

--
-- Indices de la tabla `planes_accesos`
--
ALTER TABLE `planes_accesos`
  ADD PRIMARY KEY (`id_plan`);

--
-- Indices de la tabla `proyects`
--
ALTER TABLE `proyects`
  ADD PRIMARY KEY (`id_proyect`);

--
-- Indices de la tabla `tipo_access_plataform`
--
ALTER TABLE `tipo_access_plataform`
  ADD PRIMARY KEY (`id_access_plataforma`);

--
-- Indices de la tabla `tipo_documento`
--
ALTER TABLE `tipo_documento`
  ADD PRIMARY KEY (`id_doc`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `id_departamentos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `distritos`
--
ALTER TABLE `distritos`
  MODIFY `id_distritos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id_empresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `espacios_disco`
--
ALTER TABLE `espacios_disco`
  MODIFY `id_espacios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `img_proyect`
--
ALTER TABLE `img_proyect`
  MODIFY `id_img` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `log_session`
--
ALTER TABLE `log_session`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT de la tabla `pais`
--
ALTER TABLE `pais`
  MODIFY `id_pais` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `planes_accesos`
--
ALTER TABLE `planes_accesos`
  MODIFY `id_plan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `proyects`
--
ALTER TABLE `proyects`
  MODIFY `id_proyect` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo_access_plataform`
--
ALTER TABLE `tipo_access_plataform`
  MODIFY `id_access_plataforma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_documento`
--
ALTER TABLE `tipo_documento`
  MODIFY `id_doc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

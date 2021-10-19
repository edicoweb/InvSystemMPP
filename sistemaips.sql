-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 20-11-2019 a las 18:11:22
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistemaips`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `areas`
--

CREATE TABLE `areas` (
  `id_area` bigint(20) UNSIGNED NOT NULL,
  `id_sede` bigint(20) UNSIGNED NOT NULL,
  `nombre_area` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sigla_area` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_subarea` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `areas`
--

INSERT INTO `areas` (`id_area`, `id_sede`, `nombre_area`, `sigla_area`, `id_subarea`) VALUES
(1, 5, 'Alcaldia', 'A', NULL),
(2, 1, 'Oficina de Tecnologia e Informatica', 'OTI', NULL),
(3, 2, 'Gerencia de construcción urbano', 'GCU', 1),
(4, 1, 'Asesoria Legal', 'AL', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargos`
--

CREATE TABLE `cargos` (
  `id_cargo` bigint(20) UNSIGNED NOT NULL,
  `nombre_cargo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cargos`
--

INSERT INTO `cargos` (`id_cargo`, `nombre_cargo`) VALUES
(1, 'Alcalde'),
(2, 'Gerente'),
(3, 'Sub Gerente'),
(4, 'Especialista'),
(5, 'Secretario(a)');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo_computos`
--

CREATE TABLE `equipo_computos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `direccion_mac` varchar(17) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marca` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modelo` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre_equipo` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre_usuario_equipo` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `observacion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_ip` bigint(20) UNSIGNED NOT NULL,
  `id_funcionario` bigint(20) UNSIGNED NOT NULL,
  `id_tipo_equipo` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `equipo_computos`
--

INSERT INTO `equipo_computos` (`id`, `direccion_mac`, `marca`, `modelo`, `nombre_equipo`, `nombre_usuario_equipo`, `observacion`, `id_ip`, `id_funcionario`, `id_tipo_equipo`) VALUES
(1, '02:a4:9a:0e1', 'Lenovo1', 'LenovomP3451', 'laptop1', 'nosee1', 'Ninguno1', 4, 2, 3),
(2, '255.255.255.0', 'Toshiba', 'notebook', 'wwe3wr4r23r2', 'munipuno', 'ninguno', 2, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `funcionarios`
--

CREATE TABLE `funcionarios` (
  `id_funcionario` bigint(20) UNSIGNED NOT NULL,
  `codigo_plaza` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_area` bigint(20) UNSIGNED NOT NULL,
  `id_cargo` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido_paterno` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido_materno` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `observacion` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `funcionarios`
--

INSERT INTO `funcionarios` (`id_funcionario`, `codigo_plaza`, `id_area`, `id_cargo`, `nombre`, `apellido_paterno`, `apellido_materno`, `observacion`) VALUES
(1, '1234', 2, 2, 'Alberth', 'Mendizabal', 'Mendizabal', 'Ninguno'),
(2, '0001', 1, 1, 'Martin', 'Ticona', 'Maquera', 'Ninguno'),
(4, '0003', 4, 4, 'Alex', 'nose', 'nosesabe', 'nunca asistio'),
(5, '0004', 4, 2, 'juan', 'supo', 'tito', 'ninguno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `funcionario_servicio`
--

CREATE TABLE `funcionario_servicio` (
  `id_sf` bigint(20) UNSIGNED NOT NULL,
  `id_funcionario` bigint(20) UNSIGNED NOT NULL,
  `id_servicio` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `funcionario_servicio`
--

INSERT INTO `funcionario_servicio` (`id_sf`, `id_funcionario`, `id_servicio`) VALUES
(1, 2, 1),
(2, 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_10_14_145532_create_sedes_table', 2),
(4, '2019_10_14_145653_create_areas_table', 2),
(5, '2019_10_14_151355_create_cargos_table', 2),
(6, '2019_10_14_151608_create_servicios_table', 2),
(9, '2019_10_14_152325_create_tipo_equipos_table', 2),
(10, '2019_10_14_152403_create_protocolo_internets_table', 2),
(12, '2019_10_16_145802_add_id_subarea_areas', 3),
(14, '2019_10_14_151847_create_funcionarios_table', 4),
(15, '2019_10_14_152221_create_funcionario_servicio_table', 4),
(16, '2019_10_14_152509_create_equipo_computos_table', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `protocolo_internets`
--

CREATE TABLE `protocolo_internets` (
  `id_ip` bigint(20) UNSIGNED NOT NULL,
  `ip` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `observacion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `puerta_enlace` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `protocolo_internets`
--

INSERT INTO `protocolo_internets` (`id_ip`, `ip`, `observacion`, `puerta_enlace`) VALUES
(1, '192.168.110.10', 'Ninguno', '8.8.4.4'),
(2, '192.168.110.11', 'Ninguno', '8.8.4.4'),
(3, '192.168.110.12', 'nada', '8.8.2.2'),
(4, '192.168.110.13', 'ninguna', '12.12.12.12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sedes`
--

CREATE TABLE `sedes` (
  `id_sede` bigint(20) UNSIGNED NOT NULL,
  `nombre_sede` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sedes`
--

INSERT INTO `sedes` (`id_sede`, `nombre_sede`) VALUES
(1, 'Palacio Municipal'),
(2, 'Gerencia de Desarrollo Urbano'),
(3, 'Ministerio de Transportes'),
(4, 'Terminal Terrestre'),
(5, 'Cuartel General');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `id_servicio` bigint(20) UNSIGNED NOT NULL,
  `nombre_servicio` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id_servicio`, `nombre_servicio`) VALUES
(1, 'Facebook'),
(2, 'Watsapi'),
(3, 'Youtube'),
(4, 'Twitter');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_equipos`
--

CREATE TABLE `tipo_equipos` (
  `id_tipo_equipo` bigint(20) UNSIGNED NOT NULL,
  `nombre_tipo_equipo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipo_equipos`
--

INSERT INTO `tipo_equipos` (`id_tipo_equipo`, `nombre_tipo_equipo`) VALUES
(1, 'Computadora'),
(2, 'Laptop'),
(3, 'Impresora');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'edilbrt callata', 'edilbrt@gmail.com', NULL, '$2y$10$Hp1Tddb0r4qJmaP/0FpMoOSj.o6K4c9BsG1FdwDA/HSaCsEjFftMC', 'hvpmpfGpf7JUHn5ekTz5LIIIP5EdIhTZe986uEgNEpUjz9OwvJWzViy7k4KQ', '2019-10-15 22:21:26', '2019-10-15 22:21:26'),
(2, 'sysAdministrador', 'admin@munipuno.gob.pe', NULL, '$2y$10$SsAT9gfq6lWIimDDxgd2buDF0iR17YCnUAj8deaz8HhPKnpvN2Nai', 'cUjeTDgidNJslb0J0KRWxEzW9MWOW5qvXFbN16hl0tQqFe7Wsnm33krLyoDd', '2019-10-16 08:27:00', '2019-10-16 08:27:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id_area`),
  ADD KEY `areas_id_sede_foreign` (`id_sede`),
  ADD KEY `areas_id_subarea_foreign` (`id_subarea`);

--
-- Indices de la tabla `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`id_cargo`);

--
-- Indices de la tabla `equipo_computos`
--
ALTER TABLE `equipo_computos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `equipo_computos_direccion_mac_unique` (`direccion_mac`),
  ADD KEY `equipo_computos_id_ip_foreign` (`id_ip`),
  ADD KEY `equipo_computos_id_funcionario_foreign` (`id_funcionario`),
  ADD KEY `equipo_computos_id_tipo_equipo_foreign` (`id_tipo_equipo`);

--
-- Indices de la tabla `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`id_funcionario`),
  ADD UNIQUE KEY `funcionarios_codigo_plaza_unique` (`codigo_plaza`),
  ADD KEY `funcionarios_id_area_foreign` (`id_area`),
  ADD KEY `funcionarios_id_cargo_foreign` (`id_cargo`);

--
-- Indices de la tabla `funcionario_servicio`
--
ALTER TABLE `funcionario_servicio`
  ADD PRIMARY KEY (`id_sf`),
  ADD KEY `funcionario_servicio_id_funcionario_foreign` (`id_funcionario`),
  ADD KEY `funcionario_servicio_id_servicio_foreign` (`id_servicio`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `protocolo_internets`
--
ALTER TABLE `protocolo_internets`
  ADD PRIMARY KEY (`id_ip`),
  ADD UNIQUE KEY `protocolo_internets_ip_unique` (`ip`);

--
-- Indices de la tabla `sedes`
--
ALTER TABLE `sedes`
  ADD PRIMARY KEY (`id_sede`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id_servicio`);

--
-- Indices de la tabla `tipo_equipos`
--
ALTER TABLE `tipo_equipos`
  ADD PRIMARY KEY (`id_tipo_equipo`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `areas`
--
ALTER TABLE `areas`
  MODIFY `id_area` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `cargos`
--
ALTER TABLE `cargos`
  MODIFY `id_cargo` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `equipo_computos`
--
ALTER TABLE `equipo_computos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `id_funcionario` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `funcionario_servicio`
--
ALTER TABLE `funcionario_servicio`
  MODIFY `id_sf` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `protocolo_internets`
--
ALTER TABLE `protocolo_internets`
  MODIFY `id_ip` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `sedes`
--
ALTER TABLE `sedes`
  MODIFY `id_sede` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id_servicio` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tipo_equipos`
--
ALTER TABLE `tipo_equipos`
  MODIFY `id_tipo_equipo` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `areas`
--
ALTER TABLE `areas`
  ADD CONSTRAINT `areas_id_sede_foreign` FOREIGN KEY (`id_sede`) REFERENCES `sedes` (`id_sede`),
  ADD CONSTRAINT `areas_id_subarea_foreign` FOREIGN KEY (`id_subarea`) REFERENCES `areas` (`id_area`);

--
-- Filtros para la tabla `equipo_computos`
--
ALTER TABLE `equipo_computos`
  ADD CONSTRAINT `equipo_computos_id_funcionario_foreign` FOREIGN KEY (`id_funcionario`) REFERENCES `funcionarios` (`id_funcionario`),
  ADD CONSTRAINT `equipo_computos_id_ip_foreign` FOREIGN KEY (`id_ip`) REFERENCES `protocolo_internets` (`id_ip`),
  ADD CONSTRAINT `equipo_computos_id_tipo_equipo_foreign` FOREIGN KEY (`id_tipo_equipo`) REFERENCES `tipo_equipos` (`id_tipo_equipo`);

--
-- Filtros para la tabla `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD CONSTRAINT `funcionarios_id_area_foreign` FOREIGN KEY (`id_area`) REFERENCES `areas` (`id_area`),
  ADD CONSTRAINT `funcionarios_id_cargo_foreign` FOREIGN KEY (`id_cargo`) REFERENCES `cargos` (`id_cargo`);

--
-- Filtros para la tabla `funcionario_servicio`
--
ALTER TABLE `funcionario_servicio`
  ADD CONSTRAINT `funcionario_servicio_id_funcionario_foreign` FOREIGN KEY (`id_funcionario`) REFERENCES `funcionarios` (`id_funcionario`),
  ADD CONSTRAINT `funcionario_servicio_id_servicio_foreign` FOREIGN KEY (`id_servicio`) REFERENCES `servicios` (`id_servicio`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

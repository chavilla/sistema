-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 25-04-2020 a las 01:43:48
-- Versión del servidor: 10.4.10-MariaDB
-- Versión de PHP: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `facturacion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Hogar', '2020-04-21 00:53:28', '2020-04-21 00:53:28'),
(2, 'Ropa', '2020-04-21 00:55:00', '2020-04-21 00:55:00'),
(3, 'Adorno', '2020-04-21 00:55:11', '2020-04-21 21:21:56'),
(4, 'Juguetes', '2020-04-21 00:55:21', '2020-04-21 00:55:21'),
(5, 'Tecnología', '2020-04-21 00:55:39', '2020-04-21 00:55:39'),
(6, 'Deporte', '2020-04-21 00:55:50', '2020-04-21 00:55:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nit` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clients`
--

INSERT INTO `clients` (`id`, `nit`, `name`, `phone`, `email`, `created_at`, `updated_at`) VALUES
(12, '2345677', 'Andi', '66756678', 'afreijedo74@gmail.com', '2020-04-24 22:02:51', '2020-04-24 22:02:51'),
(13, '23456798', 'Dagoberto', '66543298', 'dagoberto@hotmail.com', '2020-04-24 22:14:34', '2020-04-24 22:14:34'),
(14, '9345823', 'Julián', '66552535', 'julian1963@hotmail.com', '2020-04-24 23:14:37', '2020-04-24 23:14:37'),
(15, '1083023306', 'David', '3167018685', 'dsamador@misena.edu.co', '2020-04-25 00:21:14', '2020-04-25 00:21:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `details`
--

DROP TABLE IF EXISTS `details`;
CREATE TABLE IF NOT EXISTS `details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `count` int(11) NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_invoice` (`invoice_id`),
  KEY `fk_product` (`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entries`
--

DROP TABLE IF EXISTS `entries`;
CREATE TABLE IF NOT EXISTS `entries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(7) NOT NULL,
  `count` int(11) NOT NULL,
  `cost` float(10,2) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user_id` (`user_id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `entries`
--

INSERT INTO `entries` (`id`, `product_id`, `count`, `cost`, `user_id`, `created_at`, `updated_at`) VALUES
(14, 2, 10, 583.65, 1, '2020-04-22 15:00:54', '2020-04-22 15:00:54'),
(17, 2, 10, 580.34, 1, '2020-04-22 15:23:40', '2020-04-22 15:23:40'),
(18, 3, 10, 18.90, 1, '2020-04-23 17:41:59', '2020-04-23 17:41:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invoices`
--

DROP TABLE IF EXISTS `invoices`;
CREATE TABLE IF NOT EXISTS `invoices` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `client_id` (`client_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(5, '2014_10_12_100000_create_password_resets_table', 2),
(6, '2019_08_19_000000_create_failed_jobs_table', 2),
(7, '2020_04_16_001359_change_product', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`(250))
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('jcharris.villa@gmail.com', '$2y$10$cMv/Nd2uceZa/EIr.3TNOO2CyHtULLmJYyMIZcbbPIpLTHuGm93mu', '2020-04-20 22:34:07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(7) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` float(10,2) NOT NULL,
  `count` int(11) DEFAULT NULL,
  `priceTotal` float(10,2) NOT NULL,
  `tax` int(11) NOT NULL,
  `inventory` varchar(10) NOT NULL,
  `description` longtext DEFAULT NULL,
  `reference` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_products` (`user_id`),
  KEY `fk_category_id` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `price`, `count`, `priceTotal`, `tax`, `inventory`, `description`, `reference`, `user_id`, `created_at`, `updated_at`) VALUES
(0000002, 5, 'Computador Dell inspiron 14', 625.56, 20, 669.35, 7, 'si', NULL, '3000 series', 1, '2020-04-22 15:00:04', '2020-04-22 15:23:40'),
(0000003, 1, 'Planchas de cabello', 25.00, 10, 25.00, 0, 'si', NULL, 'Conair', 1, '2020-04-23 17:39:33', '2020-04-23 17:41:59'),
(0000004, 6, 'Mesa pinpon', 98.35, 0, 98.35, 0, 'si', NULL, 'Recteck', 1, '2020-04-23 19:14:37', '2020-04-23 19:14:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `rol` varchar(11) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuario_unique` (`username`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `rol`, `password`, `created_at`, `updated_at`, `remember_token`) VALUES
(1, 'Jesús', 'jcharris.villa@gmail.com', 'chavilla1993', 'admin', '$2y$12$o80bbYqBvxvJn..olSDsveB4MSJxFKJXveGbFUzIJLiFLtrmTaCk2', '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(2, 'Rubiela', 'cuyitela19642010@hotmail.com', 'cuyitela1964', 'user', '$2y$10$osj6hanh2XUjZpxmFWcH5.aDvkEMBwRVYNCCwwyr3FpWWsT0NMt2a', '2020-04-19 21:43:00', '2020-04-23 19:01:43', NULL),
(10, 'Alberto', 'Alberto@alberto.com', 'Alberto428', 'user', '$2y$10$GcKd91YcV2XIM15o3uAVEuCKAOL8ZGo4pjZbIcIO6y8sFdOMMixLy', '2020-04-23 19:11:11', '2020-04-23 19:11:11', NULL),
(11, 'Andrés', 'afreijedo74@gmail.com', 'andi1974', 'user', '$2y$10$3qvr5G.2RpVxosmM3ct3p.nAww3qo44lgSyIZUqluHV2v4r.xQ7hW', '2020-04-24 23:25:33', '2020-04-24 23:25:33', NULL);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_category_id` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

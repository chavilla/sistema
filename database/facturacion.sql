-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 28-04-2020 a las 02:05:59
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
  PRIMARY KEY (`id`),
  UNIQUE KEY `nit` (`nit`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clients`
--

INSERT INTO `clients` (`id`, `nit`, `name`, `phone`, `email`, `created_at`, `updated_at`) VALUES
(12, '2345677', 'Andi', '66756678', 'afreijedo74@gmail.com', '2020-04-24 22:02:51', '2020-04-24 22:02:51'),
(13, '23456798', 'Dagoberto', '66543298', 'dagoberto@hotmail.com', '2020-04-24 22:14:34', '2020-04-24 22:14:34'),
(14, '9345823', 'Julián', '66552535', 'julian1963@hotmail.com', '2020-04-24 23:14:37', '2020-04-24 23:14:37'),
(15, '1083023306', 'David', '3167018685', 'dsamador@misena.edu.co', '2020-04-25 00:21:14', '2020-04-25 00:21:14'),
(16, '4653903', 'Critofer', '62253498', 'cristofer@hotmail.com', '2020-04-26 00:40:32', '2020-04-26 00:40:32'),
(17, '8456023', 'Andrés', '67893465', 'andres123@gmail.com', '2020-04-26 00:41:16', '2020-04-26 00:41:16'),
(18, '108323456', 'Manuel', '67352098', 'manuel@gmail.com', '2020-04-26 00:43:40', '2020-04-26 00:43:40'),
(20, '3738901', 'Perfecto', '66553490', 'perfecto@perfecto.com', '2020-04-26 23:46:14', '2020-04-26 23:46:14'),
(21, '8567234', 'Segundo', '63250504', 'segundo@gmail.com', '2020-04-27 15:45:41', '2020-04-27 15:45:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `details`
--

DROP TABLE IF EXISTS `details`;
CREATE TABLE IF NOT EXISTS `details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `counts` int(11) NOT NULL,
  `prices` float(10,2) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_invoice` (`invoice_id`),
  KEY `fk_product` (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `details`
--

INSERT INTO `details` (`id`, `invoice_id`, `product_id`, `counts`, `prices`, `created_at`, `updated_at`) VALUES
(9, 11, 26, 4, 1.99, '2020-04-28 02:03:24', '2020-04-28 02:03:24'),
(8, 10, 27, 1, 123.00, '2020-04-28 01:40:05', '2020-04-28 01:40:05'),
(7, 10, 26, 3, 1.99, '2020-04-28 01:40:05', '2020-04-28 01:40:05'),
(10, 11, 22, 1, 16.33, '2020-04-28 02:03:24', '2020-04-28 02:03:24'),
(11, 11, 24, 2, 1.75, '2020-04-28 02:03:24', '2020-04-28 02:03:24');

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
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `entries`
--

INSERT INTO `entries` (`id`, `product_id`, `count`, `cost`, `user_id`, `created_at`, `updated_at`) VALUES
(35, 23, 5, 100.00, 1, '2020-04-27 15:15:53', '2020-04-27 15:15:53'),
(36, 22, 4, 12.56, 1, '2020-04-27 15:17:54', '2020-04-27 15:17:54'),
(37, 26, 40, 1.55, 1, '2020-04-27 15:42:12', '2020-04-27 15:42:12'),
(38, 22, 10, 12.56, 1, '2020-04-27 15:43:49', '2020-04-27 15:43:49'),
(39, 27, 1, 99.99, 1, '2020-04-27 16:02:01', '2020-04-27 16:02:01'),
(40, 24, 20, 1.35, 1, '2020-04-27 19:12:07', '2020-04-27 19:12:07'),
(41, 21, 2, 576.78, 1, '2020-04-27 19:12:26', '2020-04-27 19:12:26');

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
  `user_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `client_id` (`client_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `invoices`
--

INSERT INTO `invoices` (`id`, `user_id`, `client_id`, `total`, `created_at`, `updated_at`) VALUES
(10, 1, 14, '128.97', '2020-04-28 01:40:05', '2020-04-28 01:40:05'),
(11, 1, 21, '27.79', '2020-04-28 02:03:24', '2020-04-28 02:03:24');

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
  `stock` int(11) DEFAULT NULL,
  `priceTotal` float(10,2) NOT NULL,
  `tax` int(11) NOT NULL,
  `inventory` varchar(10) NOT NULL,
  `description` longtext DEFAULT NULL,
  `reference` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `fk_products` (`user_id`),
  KEY `fk_category_id` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `price`, `stock`, `priceTotal`, `tax`, `inventory`, `description`, `reference`, `user_id`, `created_at`, `updated_at`) VALUES
(0000021, 5, 'Computador Dell inspiron', 645.30, 2, 645.30, 0, 'si', NULL, 'series 3000', 1, '2020-04-27 14:44:24', '2020-04-27 19:12:26'),
(0000022, 4, 'Disney lego', 16.33, 14, 16.33, 0, 'si', NULL, 'stack', 1, '2020-04-27 14:51:47', '2020-04-27 15:43:49'),
(0000023, 5, 'Celular Huawei Y9', 176.56, 5, 176.56, 0, 'si', NULL, '2019', 2, '2020-04-27 14:54:22', '2020-04-27 15:15:53'),
(0000024, 1, 'Cuaderno', 1.75, 20, 1.75, 0, 'si', NULL, 'Unison', 1, '2020-04-27 15:01:10', '2020-04-27 19:12:07'),
(0000026, 1, 'Alcohol lux', 1.99, 40, 1.99, 0, 'si', NULL, '473ml', 1, '2020-04-27 15:39:58', '2020-04-27 15:42:12'),
(0000027, 6, 'Mesa pinpon', 123.00, 1, 123.00, 0, 'si', NULL, 'Recteck', 1, '2020-04-27 16:01:26', '2020-04-27 16:02:01');

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `rol`, `password`, `created_at`, `updated_at`, `remember_token`) VALUES
(1, 'Jesús', 'jcharris.villa@gmail.com', 'chavilla1993', 'admin', '$2y$12$o80bbYqBvxvJn..olSDsveB4MSJxFKJXveGbFUzIJLiFLtrmTaCk2', '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(2, 'Rubiela', 'cuyitela19642010@hotmail.com', 'cuyitela1964', 'user', '$2y$10$osj6hanh2XUjZpxmFWcH5.aDvkEMBwRVYNCCwwyr3FpWWsT0NMt2a', '2020-04-19 21:43:00', '2020-04-23 19:01:43', NULL),
(10, 'Alberto', 'Alberto@alberto.com', 'Alberto428', 'user', '$2y$10$GcKd91YcV2XIM15o3uAVEuCKAOL8ZGo4pjZbIcIO6y8sFdOMMixLy', '2020-04-23 19:11:11', '2020-04-23 19:11:11', NULL),
(12, 'luigi', 'luigi@gmail.com', 'luigi1990', 'user', '$2y$10$etRzQZSzWa0U24Vb04wzD.L0bvecvreNw6d5.FjrmW.BEzTNck6vW', '2020-04-27 15:29:16', '2020-04-27 15:29:16', NULL);

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

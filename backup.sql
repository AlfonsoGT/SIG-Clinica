-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.2.6-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para clinicaradiologia2
CREATE DATABASE IF NOT EXISTS `clinicaradiologia2` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `clinicaradiologia2`;

-- Volcando estructura para tabla clinicaradiologia2.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla clinicaradiologia2.migrations: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2017_06_08_150631_create_tabla_sexo', 2),
	(4, '2017_06_08_151026_create_tabla_procedencia', 2),
	(5, '2017_06_08_151354_create_tabla_pacientes', 2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Volcando estructura para tabla clinicaradiologia2.pacientes
CREATE TABLE IF NOT EXISTS `pacientes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `duiPaciente` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `primerNombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `segundoNombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `primerApellido` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `segundoApellido` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `numeroCelular` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duiEncargado` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombreEncargado` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idSexo` int(10) unsigned NOT NULL,
  `idProcedencia` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pacientes_idsexo_foreign` (`idSexo`),
  KEY `pacientes_idprocedencia_foreign` (`idProcedencia`),
  CONSTRAINT `pacientes_idprocedencia_foreign` FOREIGN KEY (`idProcedencia`) REFERENCES `procedencia` (`idProcedencia`),
  CONSTRAINT `pacientes_idsexo_foreign` FOREIGN KEY (`idSexo`) REFERENCES `sexo` (`idSexo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla clinicaradiologia2.pacientes: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `pacientes` DISABLE KEYS */;
INSERT INTO `pacientes` (`id`, `duiPaciente`, `primerNombre`, `segundoNombre`, `primerApellido`, `segundoApellido`, `fechaNacimiento`, `numeroCelular`, `duiEncargado`, `nombreEncargado`, `idSexo`, `idProcedencia`) VALUES
	(1, '123456789', 'Zoila', 'Zoila', 'Zoila', 'Zoila', '1990-06-06', '12345678', '123456789', 'Zoila', 1, 2);
/*!40000 ALTER TABLE `pacientes` ENABLE KEYS */;

-- Volcando estructura para tabla clinicaradiologia2.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla clinicaradiologia2.password_resets: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Volcando estructura para tabla clinicaradiologia2.procedencia
CREATE TABLE IF NOT EXISTS `procedencia` (
  `idProcedencia` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_procedencia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`idProcedencia`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla clinicaradiologia2.procedencia: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `procedencia` DISABLE KEYS */;
INSERT INTO `procedencia` (`idProcedencia`, `nombre_procedencia`) VALUES
	(1, 'Facultad de Medicina'),
	(2, 'Facultad de Odontologia'),
	(3, 'Facultad de Ciencias Económicas'),
	(4, 'Facultad de Ciencias Naturales y Matemática'),
	(5, 'Facultad de Ciencias Naturales y Humanidades'),
	(6, 'Facultad de Ciencias Agronómicas'),
	(7, 'Facultad de Ingeniería y Arquitectura'),
	(8, 'Facultad de Jurisprudencia y Ciencias Sociales'),
	(9, 'Facultad de Quimica y Farmacia'),
	(10, 'Facultad Multidisciplinaria de Occidente'),
	(11, 'Facultad Multidisciplinaria Oriental'),
	(12, 'Facultad Multidisciplinaria Paracentral');
/*!40000 ALTER TABLE `procedencia` ENABLE KEYS */;

-- Volcando estructura para tabla clinicaradiologia2.sexo
CREATE TABLE IF NOT EXISTS `sexo` (
  `idSexo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_sexo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`idSexo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla clinicaradiologia2.sexo: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `sexo` DISABLE KEYS */;
INSERT INTO `sexo` (`idSexo`, `nombre_sexo`) VALUES
	(1, 'Femenino'),
	(2, 'Masculino');
/*!40000 ALTER TABLE `sexo` ENABLE KEYS */;

-- Volcando estructura para tabla clinicaradiologia2.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla clinicaradiologia2.users: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `username`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Nora', 'nora@gmail.com', 'Nora1', '$2y$10$vJcLhRwK5vjgp5VDQtOH3u9Km9YIvYhAsXkldZSmTwJXI6U3v/KyS', 'iT19YnazjBqklsfeO2uWP6cZS4pN2frSTXqZBpM3yGQHJp9Ud6D5M0XQCINA', '2017-05-31 18:35:54', '2017-05-31 18:35:54');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

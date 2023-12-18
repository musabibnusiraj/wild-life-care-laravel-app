-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for wild-life-care-laravel-app
CREATE DATABASE IF NOT EXISTS `wild-life-care-laravel-app` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;
USE `wild-life-care-laravel-app`;

-- Dumping structure for table wild-life-care-laravel-app.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table wild-life-care-laravel-app.failed_jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table wild-life-care-laravel-app.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table wild-life-care-laravel-app.migrations: ~6 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2014_10_12_000000_create_users_table', 2),
	(6, '2014_10_12_100000_create_password_resets_table', 3),
	(8, '2023_09_23_090609_create_courses_table', 4),
	(9, '2023_12_16_135606_create_permission_tables', 5);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table wild-life-care-laravel-app.model_has_permissions
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table wild-life-care-laravel-app.model_has_permissions: ~0 rows (approximately)
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;

-- Dumping structure for table wild-life-care-laravel-app.model_has_roles
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table wild-life-care-laravel-app.model_has_roles: ~4 rows (approximately)
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
	(6, 'App\\Models\\User', 1),
	(7, 'App\\Models\\User', 2),
	(8, 'App\\Models\\User', 3),
	(9, 'App\\Models\\User', 4);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;

-- Dumping structure for table wild-life-care-laravel-app.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table wild-life-care-laravel-app.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table wild-life-care-laravel-app.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table wild-life-care-laravel-app.password_reset_tokens: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
	('musab.dot@gmail.com', '$2y$10$KzZX7jvU87GBjoSx/R5j4eL/dc85HC.G3F3p2FRBUYN1vRqR1ZzOu', '2023-09-21 17:46:54');
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;

-- Dumping structure for table wild-life-care-laravel-app.permissions
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table wild-life-care-laravel-app.permissions: ~25 rows (approximately)
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(41, 'edit-users', 'web', '2023-12-18 09:01:47', '2023-12-18 09:01:47'),
	(42, 'delete-users', 'web', '2023-12-18 09:01:47', '2023-12-18 09:01:47'),
	(43, 'view-users', 'web', '2023-12-18 09:01:47', '2023-12-18 09:01:47'),
	(44, 'create-users', 'web', '2023-12-18 09:01:47', '2023-12-18 09:01:47'),
	(45, 'update-users', 'web', '2023-12-18 09:01:48', '2023-12-18 09:01:48'),
	(46, 'edit-complaints', 'web', '2023-12-18 09:01:48', '2023-12-18 09:01:48'),
	(47, 'delete-complaints', 'web', '2023-12-18 09:01:48', '2023-12-18 09:01:48'),
	(48, 'view-complaints', 'web', '2023-12-18 09:01:48', '2023-12-18 09:01:48'),
	(49, 'create-complaints', 'web', '2023-12-18 09:01:48', '2023-12-18 09:01:48'),
	(50, 'update-complaints', 'web', '2023-12-18 09:01:48', '2023-12-18 09:01:48'),
	(51, 'edit-investigations', 'web', '2023-12-18 09:01:48', '2023-12-18 09:01:48'),
	(52, 'delete-investigations', 'web', '2023-12-18 09:01:48', '2023-12-18 09:01:48'),
	(53, 'view-investigations', 'web', '2023-12-18 09:01:48', '2023-12-18 09:01:48'),
	(54, 'create-investigations', 'web', '2023-12-18 09:01:48', '2023-12-18 09:01:48'),
	(55, 'update-investigations', 'web', '2023-12-18 09:01:48', '2023-12-18 09:01:48'),
	(56, 'edit-officers', 'web', '2023-12-18 09:01:48', '2023-12-18 09:01:48'),
	(57, 'delete-officers', 'web', '2023-12-18 09:01:48', '2023-12-18 09:01:48'),
	(58, 'view-officers', 'web', '2023-12-18 09:01:48', '2023-12-18 09:01:48'),
	(59, 'create-officers', 'web', '2023-12-18 09:01:48', '2023-12-18 09:01:48'),
	(60, 'update-officers', 'web', '2023-12-18 09:01:48', '2023-12-18 09:01:48'),
	(61, 'edit-admins', 'web', '2023-12-18 09:01:48', '2023-12-18 09:01:48'),
	(62, 'delete-admins', 'web', '2023-12-18 09:01:48', '2023-12-18 09:01:48'),
	(63, 'view-admins', 'web', '2023-12-18 09:01:48', '2023-12-18 09:01:48'),
	(64, 'create-admins', 'web', '2023-12-18 09:01:48', '2023-12-18 09:01:48'),
	(65, 'update-admins', 'web', '2023-12-18 09:01:48', '2023-12-18 09:01:48');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;

-- Dumping structure for table wild-life-care-laravel-app.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table wild-life-care-laravel-app.personal_access_tokens: ~35 rows (approximately)
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
	(1, 'App\\Models\\User', 1, 'authToken', '4a01db8f2a2c768958890f9f70304c84f2f87bbd41d8e1d851366dc2ae0ae646', '["*"]', NULL, NULL, '2023-08-29 08:16:57', '2023-08-29 08:16:57'),
	(2, 'App\\Models\\User', 2, 'authToken', '2dc4d0ec94cea9e425bdd202c1e5b26ee83d414fd81ec939fa02d22edc2f1063', '["*"]', NULL, NULL, '2023-08-29 08:21:25', '2023-08-29 08:21:25'),
	(3, 'App\\Models\\User', 3, 'authToken', 'b1b1c1cf2c953810b62634b2741297202113770a230825b6cdb24eff7027cf59', '["*"]', NULL, NULL, '2023-08-29 08:23:44', '2023-08-29 08:23:44'),
	(4, 'App\\Models\\User', 3, 'authToken', '598c0eb0f1e97d2151ef60db509b03ad9262bd25fd438a33b73407d6f976687b', '["*"]', NULL, NULL, '2023-08-29 08:26:18', '2023-08-29 08:26:18'),
	(5, 'App\\Models\\User', 3, 'authToken', 'a9a4b74e8fb887a43d7324635287df29a2909ee23f8d5c6e5432e61c34e7921d', '["*"]', NULL, NULL, '2023-08-29 08:26:27', '2023-08-29 08:26:27'),
	(6, 'App\\Models\\User', 3, 'authToken', 'c62ba0914abbc3fe4c9e2637d5193e1e70e49208a762098faf5d64b2792bcdc3', '["*"]', NULL, NULL, '2023-08-29 08:26:28', '2023-08-29 08:26:28'),
	(7, 'App\\Models\\User', 3, 'authToken', '02c8800d92f3c601bc485fe45bd6dc05e9eae61e0b6dd496df916c44a971a016', '["*"]', NULL, NULL, '2023-08-29 08:26:30', '2023-08-29 08:26:30'),
	(8, 'App\\Models\\User', 1, 'authToken', '331eb53c430a5537c5477718821a2c48000a3eb75511e77acc0f2464d00f1397', '["*"]', NULL, NULL, '2023-08-29 08:26:36', '2023-08-29 08:26:36'),
	(9, 'App\\Models\\User', 1, 'authToken', '8a77cf7031dfb3b84ce5632c82c4c7a4de25dd9ef8f7608a0fbec360428e3a59', '["*"]', NULL, NULL, '2023-08-29 08:26:38', '2023-08-29 08:26:38'),
	(10, 'App\\Models\\User', 1, 'authToken', 'd424014dc53b9689d7707ea5e4a82154ae2098e911265275b3da0984274095c6', '["*"]', NULL, NULL, '2023-08-29 08:26:40', '2023-08-29 08:26:40'),
	(11, 'App\\Models\\User', 1, 'authToken', '4968c2e0e6c9be171ae8b7e220fb239c00588cd94e3bbbda0467b1390a28fc7e', '["*"]', NULL, NULL, '2023-08-29 08:26:41', '2023-08-29 08:26:41'),
	(12, 'App\\Models\\User', 1, 'authToken', 'd90a3a39c05cbdf527e138e249717fb35d26496bfce28aa52d57f07a5af5d514', '["*"]', NULL, NULL, '2023-08-29 08:26:42', '2023-08-29 08:26:42'),
	(13, 'App\\Models\\User', 1, 'authToken', '0cf7b384c340cba7a2ba80691764a460e5d91f9a5e7a4016c7abaff06301bc8d', '["*"]', NULL, NULL, '2023-08-29 08:26:44', '2023-08-29 08:26:44'),
	(14, 'App\\Models\\User', 1, 'authToken', 'd4429b1cd43603c1b61f2d88c2dbc87dd6598fdd7e2dbf77b83882eb0565d039', '["*"]', NULL, NULL, '2023-08-29 08:26:45', '2023-08-29 08:26:45'),
	(15, 'App\\Models\\User', 4, 'authToken', 'b11dec04c32a5cd249f38e2b9b971af1b7c35227e775b5010229e3ebe01b7769', '["*"]', NULL, NULL, '2023-08-29 08:27:11', '2023-08-29 08:27:11'),
	(16, 'App\\Models\\User', 1, 'authToken', '1e68b3ca483b268a8b64b9e645a770a32f02e59cc322a6625fc320d15c3ad60f', '["*"]', NULL, NULL, '2023-08-29 08:27:46', '2023-08-29 08:27:46'),
	(17, 'App\\Models\\User', 1, 'authToken', '62d5cc1d0ca818f0abc64747c291a272724c4a144769a99ebb1c0a8abed9987e', '["*"]', NULL, NULL, '2023-08-29 08:27:51', '2023-08-29 08:27:51'),
	(18, 'App\\Models\\User', 1, 'authToken', 'f279e5e299beac4020190942f8ca27a3389ab3f1e0066c0e02562cdb52a9d7db', '["*"]', NULL, NULL, '2023-08-29 08:27:54', '2023-08-29 08:27:54'),
	(19, 'App\\Models\\User', 1, 'authToken', '6057e87267467cf5b2d5dc51e33a2a5aecdae502a8f188638faf46ada862b6aa', '["*"]', NULL, NULL, '2023-08-29 08:28:00', '2023-08-29 08:28:00'),
	(20, 'App\\Models\\User', 1, 'authToken', '1831355b980a8b66c25323a364201ce0d2f28fda41c0087c1bcdda9b9aafabe9', '["*"]', NULL, NULL, '2023-08-29 08:28:04', '2023-08-29 08:28:04'),
	(21, 'App\\Models\\User', 1, 'authToken', 'bdd9e6aa93ad2792ac44c34ece3beb879db0f65c4e43d8f7297a203f7c1f4e51', '["*"]', '2023-08-29 08:32:57', NULL, '2023-08-29 08:28:23', '2023-08-29 08:32:57'),
	(22, 'App\\Models\\User', 1, 'authToken', '982ce0e115e6383e1a9176e9c1ab49ca9982537c22004b385a0f9b4e276d4f72', '["*"]', NULL, NULL, '2023-08-29 08:46:10', '2023-08-29 08:46:10'),
	(23, 'App\\Models\\User', 5, 'Sanctom+Socialite', '1c1b2879b1648a22a13a33f63b0178b3eab8be0cf704695b37acf5707913b2e9', '["*"]', NULL, NULL, '2023-08-29 11:11:57', '2023-08-29 11:11:57'),
	(24, 'App\\Models\\User', 5, 'Sanctom+Socialite', '849c7be415684b907be92f24d403f10dce9904950a3d48ef4448bb0d808a9491', '["*"]', NULL, NULL, '2023-08-29 11:16:25', '2023-08-29 11:16:25'),
	(25, 'App\\Models\\User', 5, 'Sanctom+Socialite', '03fd47a50f966a5287753d9a6b3b1288166a903b5699f8f31da321d395e3e593', '["*"]', '2023-08-29 11:28:01', NULL, '2023-08-29 11:17:18', '2023-08-29 11:28:01'),
	(26, 'App\\Models\\User', 5, 'Sanctom+Socialite', '8ce303accfe6a839325e3215a7aebe68fc8d0bec996d644aae3d7aa2d7c7f461', '["*"]', NULL, NULL, '2023-08-29 11:24:08', '2023-08-29 11:24:08'),
	(27, 'App\\Models\\User', 5, 'Sanctom+Socialite', '2bae56fc658fc5ae5020f08ecdb480f907543ab84fa8050894c570ff6b6cbd9c', '["*"]', NULL, NULL, '2023-08-29 11:24:11', '2023-08-29 11:24:11'),
	(28, 'App\\Models\\User', 5, 'Sanctom+Socialite', 'c71b1f18d11dae66b045e2494ab7b5d43a74ec32bdda023f0b1d8486ce1d2f96', '["*"]', NULL, NULL, '2023-08-29 11:25:11', '2023-08-29 11:25:11'),
	(29, 'App\\Models\\User', 5, 'Sanctom+Socialite', 'd23399b4b191d48d4c9b84055564361f8317dfa64217aa05e14061a113c2a8de', '["*"]', NULL, NULL, '2023-08-29 11:25:31', '2023-08-29 11:25:31'),
	(30, 'App\\Models\\User', 5, 'Sanctom+Socialite', '96bd95a819d544d5988e5d533ae62bd388eb1c8e4357888739b2b03889240364', '["*"]', NULL, NULL, '2023-08-29 11:25:49', '2023-08-29 11:25:49'),
	(31, 'App\\Models\\User', 5, 'Sanctom+Socialite', '7acfcf8456c6730514f94a2e3d0af9067348b35e75eb78b11041c71d98fdff66', '["*"]', NULL, NULL, '2023-08-29 11:25:52', '2023-08-29 11:25:52'),
	(32, 'App\\Models\\User', 5, 'Sanctom+Socialite', 'c274759458c40955f0aa2944714f7ee1d3a24948dcce8112a6e84121beda9e67', '["*"]', NULL, NULL, '2023-08-29 11:25:59', '2023-08-29 11:25:59'),
	(33, 'App\\Models\\User', 5, 'Sanctom+Socialite', '20f0f26e97fbfc7155556ce6993817d7aa7c7174b39b726ebee745380a1c6246', '["*"]', NULL, NULL, '2023-08-29 11:26:09', '2023-08-29 11:26:09'),
	(34, 'App\\Models\\User', 5, 'Sanctom+Socialite', 'e277493af88d2901088a578c3cd857caae041fd3dd52b2587522f6ff09f301ce', '["*"]', NULL, NULL, '2023-08-29 11:27:57', '2023-08-29 11:27:57'),
	(35, 'App\\Models\\User', 1, 'Sanctom+Socialite', 'c01785952ecf1e97e75e73b0680a539dad6b4ef5202fb8c55d22b51b5f9c6b59', '["*"]', NULL, NULL, '2023-08-29 12:09:10', '2023-08-29 12:09:10');
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;

-- Dumping structure for table wild-life-care-laravel-app.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table wild-life-care-laravel-app.roles: ~4 rows (approximately)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(6, 'Super-Admin', 'web', '2023-12-18 09:01:48', '2023-12-18 09:01:48'),
	(7, 'Admin', 'web', '2023-12-18 09:01:48', '2023-12-18 09:01:48'),
	(8, 'Officer', 'web', '2023-12-18 09:01:49', '2023-12-18 09:01:49'),
	(9, 'User', 'web', '2023-12-18 09:01:49', '2023-12-18 09:01:49');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Dumping structure for table wild-life-care-laravel-app.role_has_permissions
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table wild-life-care-laravel-app.role_has_permissions: ~46 rows (approximately)
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(41, 6),
	(42, 6),
	(43, 6),
	(44, 6),
	(45, 6),
	(46, 6),
	(47, 6),
	(48, 6),
	(49, 6),
	(50, 6),
	(51, 6),
	(52, 6),
	(53, 6),
	(54, 6),
	(55, 6),
	(56, 6),
	(57, 6),
	(58, 6),
	(59, 6),
	(60, 6),
	(61, 6),
	(62, 6),
	(63, 6),
	(64, 6),
	(65, 6),
	(46, 7),
	(48, 7),
	(50, 7),
	(51, 7),
	(52, 7),
	(53, 7),
	(54, 7),
	(55, 7),
	(56, 7),
	(57, 7),
	(58, 7),
	(59, 7),
	(60, 7),
	(51, 8),
	(53, 8),
	(55, 8),
	(46, 9),
	(47, 9),
	(48, 9),
	(49, 9),
	(50, 9);
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;

-- Dumping structure for table wild-life-care-laravel-app.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table wild-life-care-laravel-app.users: ~4 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `google_id`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Super-Admin User', 'superadmin@example.com', '2023-12-18 09:01:50', '$2y$10$C0wmLh9azpTCTjNLq.sf1O9ghcH7mvqvNkKrh9rcZo7W7uh8emWEm', NULL, 'gIqrEoISOK', '2023-12-18 09:01:50', '2023-12-18 09:01:50'),
	(2, 'Admin User', 'admin@example.com', '2023-12-18 09:01:50', '$2y$10$Qoe61odygNs51kQqlL8uWecvHMctQY2641z5YGJ.ZgWAwhf/YErVK', NULL, 'Y7YzjysgWu', '2023-12-18 09:01:50', '2023-12-18 09:01:50'),
	(3, 'Officer User', 'officer@example.com', '2023-12-18 09:01:50', '$2y$10$QHYw8JvWEJs9X1Pf0Rq9ZOOIqIahm3Ap7E5iuNRO2C1YVkoAjy8ze', NULL, 'ufdfu36xBa', '2023-12-18 09:01:50', '2023-12-18 09:01:50'),
	(4, 'Public User', 'user@example.com', '2023-12-18 09:01:50', '$2y$10$PmVVATBW5n55RUxlxNiMBe1muWpitC.Kas2AbQgXBKdcCVgopCCAa', NULL, 'nl7T5Q4hSA', '2023-12-18 09:01:50', '2023-12-18 09:01:50');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

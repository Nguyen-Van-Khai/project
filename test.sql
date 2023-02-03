-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping data for table my_project.failed_jobs: ~0 rows (approximately)

-- Dumping data for table my_project.migrations: ~5 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2023_01_31_070043_create_products_table', 1);

-- Dumping data for table my_project.password_resets: ~0 rows (approximately)

-- Dumping data for table my_project.personal_access_tokens: ~0 rows (approximately)

-- Dumping data for table my_project.products: ~3 rows (approximately)
INSERT INTO `products` (`id`, `name`, `avatar`, `price`, `description`, `created_at`, `updated_at`) VALUES
	(13, 'San pham 2', '1675307457-Screenshot (2).png', 234000, 'Mo ta san pham 2', '2023-02-01 20:10:57', '2023-02-01 20:10:57'),
	(14, 'San pham 3', '1675307467-Screenshot (3).png', 12330234, 'Mo ta san pham 3', '2023-02-01 20:11:07', '2023-02-01 20:11:07'),
	(17, 'San pham 111111', '1675411264-hinh-anh-33.jpg', 123300000, 'Mo ta san pham 1', '2023-02-01 20:23:46', '2023-02-03 01:01:04');

-- Dumping data for table my_project.users: ~2 rows (approximately)
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'khainv', 'khai190@gmail.com', NULL, '$2y$10$0sLSbs/0fWJKsIIQ6BLvZOYq9jup8YC6LU1HXaNBlSGWlxT7YdwAC', NULL, '2023-02-02 20:08:42', '2023-02-02 20:08:42'),
	(2, 'khainv123', 'khai111@gmail.com', NULL, '$2y$10$tMLHNxX9hrzWEszVl7ShTuTeRdc2V5XoGQo8NHZfmo.Fbz/mfUKmO', NULL, '2023-02-03 00:46:25', '2023-02-03 00:46:25');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

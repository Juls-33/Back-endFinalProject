-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.32-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.10.0.7000
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for lesanshoes_db
CREATE DATABASE IF NOT EXISTS `lesanshoes_db` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `lesanshoes_db`;

-- Dumping structure for table lesanshoes_db.ads_tbl
CREATE TABLE IF NOT EXISTS `ads_tbl` (
  `ads_id` int(11) NOT NULL AUTO_INCREMENT,
  `image_add` text NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  PRIMARY KEY (`ads_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table lesanshoes_db.ads_tbl: ~0 rows (approximately)
DELETE FROM `ads_tbl`;

-- Dumping structure for table lesanshoes_db.brand_tbl
CREATE TABLE IF NOT EXISTS `brand_tbl` (
  `brand_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '',
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  PRIMARY KEY (`brand_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table lesanshoes_db.brand_tbl: ~0 rows (approximately)
DELETE FROM `brand_tbl`;

-- Dumping structure for table lesanshoes_db.category_tbl
CREATE TABLE IF NOT EXISTS `category_tbl` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '',
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table lesanshoes_db.category_tbl: ~0 rows (approximately)
DELETE FROM `category_tbl`;

-- Dumping structure for table lesanshoes_db.faq_tbl
CREATE TABLE IF NOT EXISTS `faq_tbl` (
  `faq_id` int(11) NOT NULL AUTO_INCREMENT,
  `question` mediumtext NOT NULL,
  `answer` mediumtext NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  PRIMARY KEY (`faq_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table lesanshoes_db.faq_tbl: ~0 rows (approximately)
DELETE FROM `faq_tbl`;

-- Dumping structure for table lesanshoes_db.orders_tbl
CREATE TABLE IF NOT EXISTS `orders_tbl` (
  `orders_id` int(11) DEFAULT NULL,
  `username` int(11) DEFAULT NULL,
  `sku` int(11) DEFAULT NULL,
  `notes` int(11) DEFAULT NULL,
  `confirmation_receipt` int(11) DEFAULT NULL,
  `delivery_proof` int(11) DEFAULT NULL,
  `date_created` int(11) DEFAULT NULL,
  `date_updated` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table lesanshoes_db.orders_tbl: ~0 rows (approximately)
DELETE FROM `orders_tbl`;

-- Dumping structure for table lesanshoes_db.roles_tbl
CREATE TABLE IF NOT EXISTS `roles_tbl` (
  `roles_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`roles_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table lesanshoes_db.roles_tbl: ~3 rows (approximately)
DELETE FROM `roles_tbl`;
INSERT INTO `roles_tbl` (`roles_id`, `name`, `description`, `date_created`, `date_updated`) VALUES
	(1, 'user', 'Accesses the website and order product different products', NULL, NULL),
	(2, 'superAdmin', 'Manages the entire website and have access to all admin functionalities', NULL, NULL),
	(3, 'Admin', 'Have the ability to accomodate orders, manage inventory, and view statistics', NULL, NULL);

-- Dumping structure for table lesanshoes_db.shoes_gender_tbl
CREATE TABLE IF NOT EXISTS `shoes_gender_tbl` (
  `shoes_gender_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  PRIMARY KEY (`shoes_gender_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table lesanshoes_db.shoes_gender_tbl: ~0 rows (approximately)
DELETE FROM `shoes_gender_tbl`;

-- Dumping structure for table lesanshoes_db.shoes_tbl
CREATE TABLE IF NOT EXISTS `shoes_tbl` (
  `shoes_id` int(11) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `shoes_gender_id` int(11) DEFAULT NULL,
  `shoes_name` int(11) DEFAULT NULL,
  `shoes_type` int(11) DEFAULT NULL,
  `date_created` int(11) DEFAULT NULL,
  `date_updated` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table lesanshoes_db.shoes_tbl: ~0 rows (approximately)
DELETE FROM `shoes_tbl`;

-- Dumping structure for table lesanshoes_db.sku_tbl
CREATE TABLE IF NOT EXISTS `sku_tbl` (
  `sku` int(11) DEFAULT NULL,
  `shoe_id` int(11) DEFAULT NULL,
  `color` int(11) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `is_promo` binary(50) DEFAULT NULL,
  `date_created` binary(50) DEFAULT NULL,
  `date_updated` binary(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table lesanshoes_db.sku_tbl: ~0 rows (approximately)
DELETE FROM `sku_tbl`;

-- Dumping structure for table lesanshoes_db.users_tbl
CREATE TABLE IF NOT EXISTS `users_tbl` (
  `username` varchar(100) NOT NULL DEFAULT '',
  `roles_id` int(11) DEFAULT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL DEFAULT '',
  `user_password` varchar(50) NOT NULL,
  `birthday` date DEFAULT NULL,
  `user_address` varchar(200) DEFAULT '',
  `contact` varchar(11) NOT NULL DEFAULT '',
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `last_login` datetime DEFAULT NULL,
  PRIMARY KEY (`username`) USING BTREE,
  KEY `roles_id` (`roles_id`),
  CONSTRAINT `users_tbl_ibfk_1` FOREIGN KEY (`roles_id`) REFERENCES `roles_tbl` (`roles_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table lesanshoes_db.users_tbl: ~5 rows (approximately)
DELETE FROM `users_tbl`;
INSERT INTO `users_tbl` (`username`, `roles_id`, `fname`, `lname`, `email`, `user_password`, `birthday`, `user_address`, `contact`, `date_created`, `date_updated`, `last_login`) VALUES
	('damian', 2, 'damian', 'lillard', 'damian@gmail.com', '123', '2025-04-23', '167-B 21st Avenue, East Rembo', '09664282161', '2025-04-20 18:25:14', '2025-04-20 18:25:14', '2025-04-21 22:12:32'),
	('julius', 1, 'JULIUS AUSTIN', 'SANTOS', 'Juliusaustin.santos.cics@ust.edu.ph', '123', '2004-08-28', '167-B 21st Avenue, East Rembo', '09664282161', '2025-04-21 16:11:52', '2025-04-21 16:11:52', '2025-04-21 22:12:08'),
	('julius33', 3, 'JULIUS AUSTIN', 'SANTOS', 'Juliusaustin.santos.cics@ust.edu.ph', '123', NULL, '', '09664282161', '2025-04-21 17:07:44', '2025-04-21 17:07:44', NULL),
	('LeBron', 3, 'Lebron', 'James', 'lebron@gmail.com', '123', NULL, '', '11111111111', '2025-04-21 17:13:48', '2025-04-21 17:13:48', '2025-04-21 23:18:51'),
	('sky', 3, 'sky', 'ubaldo', 'sky@gmail.com', '123', '2025-04-18', '167-B 21st Avenue, East Rembo', '09664282161', '2025-04-20 18:26:30', '2025-04-20 18:26:30', '2025-04-21 00:26:38');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

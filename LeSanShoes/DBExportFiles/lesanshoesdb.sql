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
  `brand_id` int(100) NOT NULL,
  `brand_name` varchar(100) NOT NULL DEFAULT '',
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`brand_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table lesanshoes_db.brand_tbl: ~4 rows (approximately)
DELETE FROM `brand_tbl`;
INSERT INTO `brand_tbl` (`brand_id`, `brand_name`, `date_created`, `date_updated`) VALUES
	(0, 'N/A', '2025-04-29 06:11:44', '2025-04-29 06:11:44'),
	(1, 'Apple', '2025-04-27 05:54:50', '2025-04-27 05:55:24'),
	(2, 'Samsung', '2025-04-25 07:48:02', '2025-04-25 07:48:02'),
	(3, 'Nike', '2025-04-25 07:49:23', '2025-04-25 07:49:23'),
	(4, 'Hi', '2025-04-25 07:49:59', '2025-04-25 07:49:59');

-- Dumping structure for table lesanshoes_db.category_tbl
CREATE TABLE IF NOT EXISTS `category_tbl` (
  `category_id` int(100) NOT NULL,
  `category_name` varchar(100) NOT NULL DEFAULT '',
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table lesanshoes_db.category_tbl: ~3 rows (approximately)
DELETE FROM `category_tbl`;
INSERT INTO `category_tbl` (`category_id`, `category_name`, `date_created`, `date_updated`) VALUES
	(0, 'N/A', '2025-04-29 06:11:55', '2025-04-29 06:11:55'),
	(1, 'Basketball', '2025-04-27 06:27:31', '2025-04-27 06:27:54'),
	(2, 'Running', '2025-04-27 09:29:56', '2025-04-27 09:30:09');

-- Dumping structure for table lesanshoes_db.colorway_size_tbl
CREATE TABLE IF NOT EXISTS `colorway_size_tbl` (
  `colorway_size_id` int(11) NOT NULL AUTO_INCREMENT,
  `colorway_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `stock` int(11) DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`colorway_size_id`),
  KEY `colorway_id` (`colorway_id`),
  KEY `size_id` (`size_id`),
  CONSTRAINT `colorway_size_tbl_ibfk_1` FOREIGN KEY (`colorway_id`) REFERENCES `colorway_tbl` (`colorway_id`) ON DELETE CASCADE,
  CONSTRAINT `colorway_size_tbl_ibfk_2` FOREIGN KEY (`size_id`) REFERENCES `size_tbl` (`size_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table lesanshoes_db.colorway_size_tbl: ~0 rows (approximately)
DELETE FROM `colorway_size_tbl`;

-- Dumping structure for table lesanshoes_db.colorway_tbl
CREATE TABLE IF NOT EXISTS `colorway_tbl` (
  `colorway_id` int(11) NOT NULL AUTO_INCREMENT,
  `shoe_model_id` int(11) NOT NULL,
  `colorway_name` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image1` varchar(255) DEFAULT NULL,
  `image2` varchar(255) DEFAULT NULL,
  `image3` varchar(255) DEFAULT NULL,
  `image4` varchar(255) DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`colorway_id`),
  KEY `shoe_model_id` (`shoe_model_id`),
  CONSTRAINT `colorway_tbl_ibfk_1` FOREIGN KEY (`shoe_model_id`) REFERENCES `shoe_model_tbl` (`shoe_model_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table lesanshoes_db.colorway_tbl: ~0 rows (approximately)
DELETE FROM `colorway_tbl`;

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

-- Dumping structure for table lesanshoes_db.material_tbl
CREATE TABLE IF NOT EXISTS `material_tbl` (
  `material_id` int(11) NOT NULL,
  `material_name` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`material_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table lesanshoes_db.material_tbl: ~2 rows (approximately)
DELETE FROM `material_tbl`;
INSERT INTO `material_tbl` (`material_id`, `material_name`, `date_created`, `date_updated`) VALUES
	(0, 'N/A', '2025-04-29 06:26:05', '2025-04-29 06:28:14');

-- Dumping structure for table lesanshoes_db.orders_tbl
CREATE TABLE IF NOT EXISTS `orders_tbl` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` enum('pending','processing','completed','cancelled','failed') DEFAULT 'pending',
  `total_price` decimal(10,2) DEFAULT 0.00,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`order_id`),
  KEY `username` (`username`),
  CONSTRAINT `orders_tbl_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users_tbl` (`username`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table lesanshoes_db.orders_tbl: ~0 rows (approximately)
DELETE FROM `orders_tbl`;

-- Dumping structure for table lesanshoes_db.order_items_tbl
CREATE TABLE IF NOT EXISTS `order_items_tbl` (
  `order_item_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `colorway_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT 1,
  `price_at_order` decimal(10,2) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`order_item_id`),
  KEY `order_id` (`order_id`),
  KEY `colorway_id` (`colorway_id`),
  KEY `size_id` (`size_id`),
  CONSTRAINT `order_items_tbl_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders_tbl` (`order_id`) ON DELETE CASCADE,
  CONSTRAINT `order_items_tbl_ibfk_2` FOREIGN KEY (`colorway_id`) REFERENCES `colorway_tbl` (`colorway_id`) ON DELETE CASCADE,
  CONSTRAINT `order_items_tbl_ibfk_3` FOREIGN KEY (`size_id`) REFERENCES `size_tbl` (`size_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table lesanshoes_db.order_items_tbl: ~0 rows (approximately)
DELETE FROM `order_items_tbl`;

-- Dumping structure for table lesanshoes_db.roles_tbl
CREATE TABLE IF NOT EXISTS `roles_tbl` (
  `roles_id` int(100) NOT NULL,
  `roles_name` varchar(100) NOT NULL,
  `roles_desc` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`roles_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table lesanshoes_db.roles_tbl: ~4 rows (approximately)
DELETE FROM `roles_tbl`;
INSERT INTO `roles_tbl` (`roles_id`, `roles_name`, `roles_desc`, `date_created`, `date_updated`) VALUES
	(1, 'User', 'Accesses the website and order product different products', '0000-00-00 00:00:00', '2025-04-27 09:57:35'),
	(2, 'SuperAdmin', 'Manages the entire website and have access to all admin functionalities', '0000-00-00 00:00:00', '2025-04-27 09:57:56'),
	(3, 'Admin', 'Have the ability to accommodate orders, manage inventory, and view statistics', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- Dumping structure for table lesanshoes_db.shoes_gender_tbl
CREATE TABLE IF NOT EXISTS `shoes_gender_tbl` (
  `shoes_gender_id` int(100) NOT NULL,
  `shoes_gender_name` varchar(50) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`shoes_gender_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table lesanshoes_db.shoes_gender_tbl: ~2 rows (approximately)
DELETE FROM `shoes_gender_tbl`;
INSERT INTO `shoes_gender_tbl` (`shoes_gender_id`, `shoes_gender_name`, `date_created`, `date_updated`) VALUES
	(0, 'N/A', '2025-04-29 06:12:03', '2025-04-29 06:12:03'),
	(1, 'Male', '2025-04-27 08:22:20', '2025-04-27 08:22:47'),
	(2, 'Female', '2025-04-27 08:19:01', '2025-04-27 08:19:01'),
	(3, 'Unisex', '2025-04-27 09:30:21', '2025-04-27 09:30:39');

-- Dumping structure for table lesanshoes_db.shoe_model_tbl
CREATE TABLE IF NOT EXISTS `shoe_model_tbl` (
  `shoe_model_id` int(11) NOT NULL AUTO_INCREMENT,
  `brand_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `material_id` int(11) NOT NULL,
  `traction_id` int(11) NOT NULL,
  `support_id` int(11) NOT NULL,
  `technology_id` int(11) NOT NULL,
  `model_name` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp(),
  `description` text NOT NULL,
  PRIMARY KEY (`shoe_model_id`),
  KEY `brand_id` (`brand_id`),
  KEY `category_id` (`category_id`),
  KEY `material_id` (`material_id`),
  KEY `traction_id` (`traction_id`),
  KEY `support_id` (`support_id`),
  KEY `technology_id` (`technology_id`),
  CONSTRAINT `shoe_model_tbl_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `brand_tbl` (`brand_id`),
  CONSTRAINT `shoe_model_tbl_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category_tbl` (`category_id`),
  CONSTRAINT `shoe_model_tbl_ibfk_3` FOREIGN KEY (`material_id`) REFERENCES `material_tbl` (`material_id`),
  CONSTRAINT `shoe_model_tbl_ibfk_4` FOREIGN KEY (`traction_id`) REFERENCES `traction_tbl` (`traction_id`),
  CONSTRAINT `shoe_model_tbl_ibfk_5` FOREIGN KEY (`support_id`) REFERENCES `support_tbl` (`support_id`),
  CONSTRAINT `shoe_model_tbl_ibfk_6` FOREIGN KEY (`technology_id`) REFERENCES `technology_tbl` (`technology_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table lesanshoes_db.shoe_model_tbl: ~8 rows (approximately)
DELETE FROM `shoe_model_tbl`;
INSERT INTO `shoe_model_tbl` (`shoe_model_id`, `brand_id`, `category_id`, `material_id`, `traction_id`, `support_id`, `technology_id`, `model_name`, `date_created`, `date_updated`, `description`) VALUES
	(2, 2, 1, 0, 0, 0, 0, 'Dame Timeee', '2025-04-30 07:09:46', '2025-04-30 07:09:46', 'Hello Worlddd'),
	(3, 2, 1, 0, 0, 0, 0, 'AAA', '2025-04-30 04:04:19', '2025-04-30 04:04:19', 'AAAA'),
	(4, 2, 1, 0, 0, 0, 0, 'AAA', '2025-04-30 04:04:58', '2025-04-30 04:04:58', 'AAAA'),
	(6, 2, 0, 0, 0, 0, 0, 'ASDA', '2025-04-30 04:07:10', '2025-04-30 04:07:10', 'DASDADA'),
	(7, 1, 0, 0, 0, 0, 0, 'aaa', '2025-04-30 04:08:25', '2025-04-30 04:08:25', 'asdasda');

-- Dumping structure for table lesanshoes_db.size_tbl
CREATE TABLE IF NOT EXISTS `size_tbl` (
  `size_id` int(11) NOT NULL,
  `size_name` varchar(100) NOT NULL DEFAULT '0',
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`size_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table lesanshoes_db.size_tbl: ~3 rows (approximately)
DELETE FROM `size_tbl`;
INSERT INTO `size_tbl` (`size_id`, `size_name`, `date_created`, `date_updated`) VALUES
	(0, 'N/A', '2025-04-29 16:21:31', '2025-04-29 16:21:31'),
	(1, '5.5', '2025-04-29 16:21:39', '2025-04-29 16:21:58'),
	(2, '6.5', '2025-04-29 16:22:14', '2025-04-29 16:22:14');

-- Dumping structure for table lesanshoes_db.status_tbl
CREATE TABLE IF NOT EXISTS `status_tbl` (
  `status_id` int(11) NOT NULL,
  `status_name` varchar(100) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table lesanshoes_db.status_tbl: ~5 rows (approximately)
DELETE FROM `status_tbl`;
INSERT INTO `status_tbl` (`status_id`, `status_name`, `date_created`, `date_updated`) VALUES
	(0, 'N/A', '2025-04-29 06:12:17', '2025-04-29 06:27:50'),
	(1, 'Pending', '2025-04-27 08:56:59', '2025-04-27 08:56:59'),
	(2, 'Out for delivery', '2025-04-27 08:57:07', '2025-04-27 08:57:07'),
	(3, 'Completed', '2025-04-27 08:57:17', '2025-04-27 08:57:17'),
	(4, 'Cancelled', '2025-04-29 04:20:47', '2025-04-29 04:20:47');

-- Dumping structure for table lesanshoes_db.support_tbl
CREATE TABLE IF NOT EXISTS `support_tbl` (
  `support_id` int(11) NOT NULL,
  `support_name` varchar(100) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`support_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table lesanshoes_db.support_tbl: ~0 rows (approximately)
DELETE FROM `support_tbl`;
INSERT INTO `support_tbl` (`support_id`, `support_name`, `date_created`, `date_updated`) VALUES
	(0, 'N/A', '2025-04-29 06:49:50', '2025-04-29 06:49:50');

-- Dumping structure for table lesanshoes_db.technology_tbl
CREATE TABLE IF NOT EXISTS `technology_tbl` (
  `technology_id` int(11) NOT NULL,
  `technology_name` varchar(100) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`technology_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table lesanshoes_db.technology_tbl: ~0 rows (approximately)
DELETE FROM `technology_tbl`;
INSERT INTO `technology_tbl` (`technology_id`, `technology_name`, `date_created`, `date_updated`) VALUES
	(0, 'N/A', '2025-04-29 06:55:45', '2025-04-29 06:55:45');

-- Dumping structure for table lesanshoes_db.traction_tbl
CREATE TABLE IF NOT EXISTS `traction_tbl` (
  `traction_id` int(11) NOT NULL,
  `traction_name` varchar(100) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`traction_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table lesanshoes_db.traction_tbl: ~0 rows (approximately)
DELETE FROM `traction_tbl`;
INSERT INTO `traction_tbl` (`traction_id`, `traction_name`, `date_created`, `date_updated`) VALUES
	(0, 'N/A', '2025-04-29 06:40:41', '2025-04-29 06:40:52');

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
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp(),
  `last_login` datetime DEFAULT NULL,
  PRIMARY KEY (`username`) USING BTREE,
  KEY `roles_id` (`roles_id`),
  CONSTRAINT `users_tbl_ibfk_1` FOREIGN KEY (`roles_id`) REFERENCES `roles_tbl` (`roles_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table lesanshoes_db.users_tbl: ~8 rows (approximately)
DELETE FROM `users_tbl`;
INSERT INTO `users_tbl` (`username`, `roles_id`, `fname`, `lname`, `email`, `user_password`, `birthday`, `user_address`, `contact`, `date_created`, `date_updated`, `last_login`) VALUES
	('admin', 3, 'JULIUS AUSTIN', 'sdda', 'unrealdamianlillard@gmail.com', '123', NULL, '', '11111111111', '2025-04-22 15:23:38', '2025-04-22 15:23:38', '2025-04-29 09:04:54'),
	('damian', 2, 'damian', 'lillard', 'damian@gmail.com', '123', '2025-04-23', '167-B 21st Avenue, East Rembo', '09664282161', '2025-04-20 18:25:14', '2025-04-20 18:25:14', '2025-04-23 07:24:42'),
	('he', 2, 'JULIUS AUSTIN', 'JULIUS AUSTIN', 'giansenensantos@yahoo.com.ph', '123', NULL, '', '54545454545', '2025-04-27 14:34:06', '2025-04-29 02:47:02', NULL),
	('julius', 1, 'JULIUS AUSTIN', 'SANTOS', 'Juliusaustin.santos.cics@ust.edu.ph', '123', '2004-08-28', '167-B 21st Avenue, East Rembo', '09664282161', '2025-04-21 16:11:52', '2025-04-21 16:11:52', '2025-04-24 19:44:39'),
	('lebron', 2, 'LeBron', 'James', 'lebronjamesking@gmail.com', '123', NULL, '', '12312312312', '2025-04-27 15:17:55', '2025-04-27 15:17:55', '2025-04-29 10:19:37'),
	('marc', 1, 'marc', 'yaeger', 'marc@gmail.com', '123', '2025-04-17', '167-B 21st Avenue, East Rembo', '09664282161', '2025-04-22 01:13:14', '2025-04-22 01:13:14', '2025-04-23 14:41:30'),
	('sky', 3, 'Sky', 'Ubaldo', 'sky@gmail.com', '123', NULL, '', '12313123123', '2025-04-22 06:06:22', '2025-04-22 15:25:29', '2025-04-27 14:46:20'),
	('soracakiesz', 1, 'Elizabeth Jean', 'Ubaldo', 'skyjean@gmail.com', '123', '2005-09-02', 'Caloocan City', '22222222222', '2025-04-24 13:43:35', '2025-04-24 13:43:35', '2025-04-24 19:44:21');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

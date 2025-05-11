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
DROP DATABASE IF EXISTS `lesanshoes_db`;
CREATE DATABASE IF NOT EXISTS `lesanshoes_db` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `lesanshoes_db`;

-- Dumping structure for table lesanshoes_db.ads_tbl
DROP TABLE IF EXISTS `ads_tbl`;
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
DROP TABLE IF EXISTS `brand_tbl`;
CREATE TABLE IF NOT EXISTS `brand_tbl` (
  `brand_id` int(100) NOT NULL,
  `brand_name` varchar(100) NOT NULL DEFAULT '',
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_by` varchar(100) DEFAULT 'lebron',
  PRIMARY KEY (`brand_id`),
  UNIQUE KEY `brand_name` (`brand_name`),
  KEY `fk_brand_tbl_modified_by` (`modified_by`),
  CONSTRAINT `fk_brand_tbl_modified_by` FOREIGN KEY (`modified_by`) REFERENCES `users_tbl` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table lesanshoes_db.brand_tbl: ~7 rows (approximately)
DELETE FROM `brand_tbl`;
INSERT INTO `brand_tbl` (`brand_id`, `brand_name`, `date_created`, `date_updated`, `modified_by`) VALUES
	(0, 'N/A', '2025-04-29 06:11:44', '2025-05-04 06:59:12', 'damian'),
	(1, 'Anta', '2025-05-06 03:34:23', '2025-05-06 03:34:23', 'damian'),
	(2, 'Nike', '2025-05-06 03:34:29', '2025-05-06 03:34:29', 'damian'),
	(3, 'Under Armour', '2025-05-06 03:34:38', '2025-05-06 03:34:50', 'damian'),
	(4, 'Adidas', '2025-05-06 03:34:59', '2025-05-06 03:34:59', 'damian'),
	(5, 'Asics', '2025-05-06 03:54:33', '2025-05-06 03:54:33', 'damian'),
	(6, 'Jordan', '2025-05-10 18:02:06', '2025-05-10 18:02:06', 'lebron');

-- Dumping structure for table lesanshoes_db.category_tbl
DROP TABLE IF EXISTS `category_tbl`;
CREATE TABLE IF NOT EXISTS `category_tbl` (
  `category_id` int(100) NOT NULL,
  `category_name` varchar(100) NOT NULL DEFAULT '',
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_by` varchar(100) DEFAULT 'lebron',
  PRIMARY KEY (`category_id`),
  UNIQUE KEY `category_name` (`category_name`),
  UNIQUE KEY `category_name_2` (`category_name`),
  KEY `fk_category_modified_by` (`modified_by`),
  CONSTRAINT `fk_category_modified_by` FOREIGN KEY (`modified_by`) REFERENCES `users_tbl` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table lesanshoes_db.category_tbl: ~4 rows (approximately)
DELETE FROM `category_tbl`;
INSERT INTO `category_tbl` (`category_id`, `category_name`, `date_created`, `date_updated`, `modified_by`) VALUES
	(0, 'N/A', '2025-04-29 06:11:55', '2025-04-29 06:11:55', 'lebron'),
	(1, 'Basketball', '2025-05-06 03:35:09', '2025-05-06 03:35:09', 'damian'),
	(2, 'Running', '2025-05-06 03:35:20', '2025-05-06 03:35:20', 'damian'),
	(3, 'Lifestyle', '2025-05-06 03:35:29', '2025-05-06 03:35:29', 'damian');

-- Dumping structure for table lesanshoes_db.colorway_size_tbl
DROP TABLE IF EXISTS `colorway_size_tbl`;
CREATE TABLE IF NOT EXISTS `colorway_size_tbl` (
  `colorway_size_id` int(11) NOT NULL AUTO_INCREMENT,
  `colorway_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `stock` int(11) DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_by` varchar(100) NOT NULL DEFAULT 'lebron',
  PRIMARY KEY (`colorway_size_id`),
  UNIQUE KEY `colorway_id` (`colorway_id`,`size_id`),
  KEY `size_id` (`size_id`),
  KEY `fk_colorway_size_modified_by` (`modified_by`),
  CONSTRAINT `colorway_size_tbl_ibfk_1` FOREIGN KEY (`colorway_id`) REFERENCES `colorway_tbl` (`colorway_id`) ON DELETE CASCADE,
  CONSTRAINT `colorway_size_tbl_ibfk_2` FOREIGN KEY (`size_id`) REFERENCES `size_tbl` (`size_id`) ON DELETE CASCADE,
  CONSTRAINT `fk_colorway_size_modified_by` FOREIGN KEY (`modified_by`) REFERENCES `users_tbl` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table lesanshoes_db.colorway_size_tbl: ~0 rows (approximately)
DELETE FROM `colorway_size_tbl`;

-- Dumping structure for table lesanshoes_db.colorway_tbl
DROP TABLE IF EXISTS `colorway_tbl`;
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
  `modified_by` varchar(100) NOT NULL DEFAULT 'lebron',
  PRIMARY KEY (`colorway_id`),
  UNIQUE KEY `shoe_model_id` (`shoe_model_id`,`colorway_name`),
  UNIQUE KEY `unique_colorway_per_model` (`shoe_model_id`,`colorway_name`),
  KEY `fk_colorway_modified_by` (`modified_by`),
  CONSTRAINT `colorway_tbl_ibfk_1` FOREIGN KEY (`shoe_model_id`) REFERENCES `shoe_model_tbl` (`shoe_model_id`) ON DELETE CASCADE,
  CONSTRAINT `fk_colorway_modified_by` FOREIGN KEY (`modified_by`) REFERENCES `users_tbl` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table lesanshoes_db.colorway_tbl: ~3 rows (approximately)
DELETE FROM `colorway_tbl`;
INSERT INTO `colorway_tbl` (`colorway_id`, `shoe_model_id`, `colorway_name`, `price`, `image1`, `image2`, `image3`, `image4`, `date_created`, `date_updated`, `modified_by`) VALUES
	(22, 13, 'Soldier', 7899.00, '../assets/images/colorway_681eb386d4959.jpg', '../assets/images/colorway_681eb386d4a84.jpg', '../assets/images/colorway_681eb386d4a89.jpg', '../assets/images/colorway_681eb386d4a8d.jpg', '2025-05-10 04:01:42', '2025-05-10 04:01:42', 'damian'),
	(24, 14, 'Green', 6599.00, '../assets/images/colorway_681eb4403b301.jpg', '../assets/images/colorway_681eb4403b30d.jpg', '../assets/images/colorway_681eb4403b311.jpg', '../assets/images/colorway_681eb4403b315.jpg', '2025-05-10 04:04:48', '2025-05-10 04:04:48', 'damian'),
	(25, 15, 'Black', 8999.00, '../assets/images/colorway_681f79c335f4f.jpg', '../assets/images/colorway_681f79c336011.jpg', '../assets/images/colorway_681f79c336014.jpg', '../assets/images/colorway_681f79c336015.jpg', '2025-05-10 18:07:31', '2025-05-10 18:07:31', 'lebron');

-- Dumping structure for table lesanshoes_db.faq_tbl
DROP TABLE IF EXISTS `faq_tbl`;
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
DROP TABLE IF EXISTS `material_tbl`;
CREATE TABLE IF NOT EXISTS `material_tbl` (
  `material_id` int(11) NOT NULL,
  `material_name` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_by` varchar(100) DEFAULT 'lebron',
  PRIMARY KEY (`material_id`),
  UNIQUE KEY `material_name` (`material_name`),
  KEY `fk_material_tbl_modified_by` (`modified_by`),
  CONSTRAINT `fk_material_tbl_modified_by` FOREIGN KEY (`modified_by`) REFERENCES `users_tbl` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table lesanshoes_db.material_tbl: ~7 rows (approximately)
DELETE FROM `material_tbl`;
INSERT INTO `material_tbl` (`material_id`, `material_name`, `date_created`, `date_updated`, `modified_by`) VALUES
	(0, 'N/A', '2025-04-29 06:26:05', '2025-04-29 06:28:14', 'lebron'),
	(1, 'Suede', '2025-05-06 03:35:47', '2025-05-06 03:35:47', 'damian'),
	(2, 'Leather', '2025-05-06 03:35:53', '2025-05-06 03:35:53', 'damian'),
	(3, 'Rubber', '2025-05-06 03:35:59', '2025-05-06 03:35:59', 'damian'),
	(4, 'Nylon', '2025-05-06 03:36:55', '2025-05-06 03:36:55', 'damian'),
	(5, 'Textile', '2025-05-06 03:37:05', '2025-05-06 03:37:05', 'damian'),
	(6, 'Canvas', '2025-05-06 03:37:12', '2025-05-06 03:37:12', 'damian');

-- Dumping structure for table lesanshoes_db.orders_tbl
DROP TABLE IF EXISTS `orders_tbl`;
CREATE TABLE IF NOT EXISTS `orders_tbl` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` enum('pending','processing','completed','cancelled','failed') DEFAULT 'pending',
  `total_price` decimal(10,2) DEFAULT 0.00,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp(),
  `customer_address` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`order_id`),
  KEY `username` (`username`),
  CONSTRAINT `orders_tbl_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users_tbl` (`username`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table lesanshoes_db.orders_tbl: ~0 rows (approximately)
DELETE FROM `orders_tbl`;

-- Dumping structure for table lesanshoes_db.order_items_tbl
DROP TABLE IF EXISTS `order_items_tbl`;
CREATE TABLE IF NOT EXISTS `order_items_tbl` (
  `order_item_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `colorway_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT 1,
  `price_at_order` decimal(10,2) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp(),
  `colorway_size_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`order_item_id`),
  KEY `order_id` (`order_id`),
  KEY `colorway_id` (`colorway_id`),
  KEY `size_id` (`size_id`),
  KEY `fk_colorway_size` (`colorway_size_id`),
  CONSTRAINT `fk_colorway_size` FOREIGN KEY (`colorway_size_id`) REFERENCES `colorway_size_tbl` (`colorway_size_id`),
  CONSTRAINT `order_items_tbl_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders_tbl` (`order_id`) ON DELETE CASCADE,
  CONSTRAINT `order_items_tbl_ibfk_2` FOREIGN KEY (`colorway_id`) REFERENCES `colorway_tbl` (`colorway_id`) ON DELETE CASCADE,
  CONSTRAINT `order_items_tbl_ibfk_3` FOREIGN KEY (`size_id`) REFERENCES `size_tbl` (`size_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table lesanshoes_db.order_items_tbl: ~0 rows (approximately)
DELETE FROM `order_items_tbl`;

-- Dumping structure for table lesanshoes_db.roles_tbl
DROP TABLE IF EXISTS `roles_tbl`;
CREATE TABLE IF NOT EXISTS `roles_tbl` (
  `roles_id` int(100) NOT NULL,
  `roles_name` varchar(100) NOT NULL,
  `roles_desc` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_by` varchar(100) DEFAULT 'lebron',
  PRIMARY KEY (`roles_id`),
  UNIQUE KEY `roles_name` (`roles_name`),
  KEY `fk_roles_tbl_modified_by` (`modified_by`),
  CONSTRAINT `fk_roles_tbl_modified_by` FOREIGN KEY (`modified_by`) REFERENCES `users_tbl` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table lesanshoes_db.roles_tbl: ~3 rows (approximately)
DELETE FROM `roles_tbl`;
INSERT INTO `roles_tbl` (`roles_id`, `roles_name`, `roles_desc`, `date_created`, `date_updated`, `modified_by`) VALUES
	(1, 'User', 'Accesses the website and order product different products', '0000-00-00 00:00:00', '2025-04-27 09:57:35', 'lebron'),
	(2, 'SuperAdmin', 'Manages the entire website and have access to all admin functionalities', '0000-00-00 00:00:00', '2025-04-27 09:57:56', 'lebron'),
	(3, 'Admin', 'Have the ability to accommodate orders, manage inventory, and view statistics', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'lebron');

-- Dumping structure for table lesanshoes_db.sales_tbl
DROP TABLE IF EXISTS `sales_tbl`;
CREATE TABLE IF NOT EXISTS `sales_tbl` (
  `salesperday_id` int(11) NOT NULL AUTO_INCREMENT,
  `amount` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`salesperday_id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table lesanshoes_db.sales_tbl: ~36 rows (approximately)
DELETE FROM `sales_tbl`;
INSERT INTO `sales_tbl` (`salesperday_id`, `amount`, `date`) VALUES
	(1, 100, '2025-06-05'),
	(2, 150, '2025-06-06'),
	(3, 200, '2025-06-07'),
	(4, 100, '2025-06-05'),
	(5, 150, '2025-06-06'),
	(6, 200, '2025-06-07'),
	(7, 100, '2025-06-05'),
	(8, 150, '2025-06-06'),
	(9, 200, '2025-06-07'),
	(10, 100, '2025-06-05'),
	(11, 150, '2025-06-06'),
	(12, 200, '2025-06-07'),
	(13, 100, '2025-06-05'),
	(14, 150, '2025-06-06'),
	(15, 200, '2025-06-07'),
	(16, 100, '2025-06-05'),
	(17, 150, '2025-06-06'),
	(18, 200, '2025-06-07'),
	(19, 100, '2025-06-05'),
	(20, 150, '2025-06-06'),
	(21, 200, '2025-06-07'),
	(22, 100, '2025-06-05'),
	(23, 150, '2025-06-06'),
	(24, 200, '2025-06-07'),
	(25, 100, '2025-06-05'),
	(26, 150, '2025-06-06'),
	(27, 200, '2025-06-07'),
	(28, 100, '2025-06-05'),
	(29, 150, '2025-06-06'),
	(30, 200, '2025-06-07'),
	(31, 100, '2025-06-05'),
	(32, 150, '2025-06-06'),
	(33, 200, '2025-06-07'),
	(34, 100, '2025-06-05'),
	(35, 150, '2025-06-06'),
	(36, 200, '2025-06-07');

-- Dumping structure for table lesanshoes_db.shoes_gender_tbl
DROP TABLE IF EXISTS `shoes_gender_tbl`;
CREATE TABLE IF NOT EXISTS `shoes_gender_tbl` (
  `shoes_gender_id` int(100) NOT NULL,
  `shoes_gender_name` varchar(50) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_by` varchar(100) DEFAULT 'lebron',
  PRIMARY KEY (`shoes_gender_id`),
  UNIQUE KEY `shoes_gender_name` (`shoes_gender_name`),
  KEY `fk_shoes_gender_tbl_modified_by` (`modified_by`),
  CONSTRAINT `fk_shoes_gender_tbl_modified_by` FOREIGN KEY (`modified_by`) REFERENCES `users_tbl` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table lesanshoes_db.shoes_gender_tbl: ~4 rows (approximately)
DELETE FROM `shoes_gender_tbl`;
INSERT INTO `shoes_gender_tbl` (`shoes_gender_id`, `shoes_gender_name`, `date_created`, `date_updated`, `modified_by`) VALUES
	(0, 'N/A', '2025-04-29 06:12:03', '2025-04-29 06:12:03', 'lebron'),
	(1, 'Men', '2025-04-27 08:22:20', '2025-05-06 03:32:18', 'damian'),
	(2, 'Women', '2025-04-27 08:19:01', '2025-05-06 03:32:38', 'damian'),
	(3, 'Unisex', '2025-04-27 09:30:21', '2025-04-27 09:30:39', 'lebron');

-- Dumping structure for table lesanshoes_db.shoe_model_tbl
DROP TABLE IF EXISTS `shoe_model_tbl`;
CREATE TABLE IF NOT EXISTS `shoe_model_tbl` (
  `shoe_model_id` int(11) NOT NULL AUTO_INCREMENT,
  `brand_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `material_id` int(11) NOT NULL,
  `traction_id` int(11) NOT NULL,
  `support_id` int(11) NOT NULL,
  `technology_id` int(11) NOT NULL,
  `model_name` varchar(50) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp(),
  `description` text NOT NULL,
  `modified_by` varchar(100) NOT NULL DEFAULT 'lebron',
  PRIMARY KEY (`shoe_model_id`),
  KEY `brand_id` (`brand_id`),
  KEY `category_id` (`category_id`),
  KEY `material_id` (`material_id`),
  KEY `traction_id` (`traction_id`),
  KEY `support_id` (`support_id`),
  KEY `technology_id` (`technology_id`),
  KEY `fk_shoe_model_modified_by` (`modified_by`),
  CONSTRAINT `fk_shoe_model_modified_by` FOREIGN KEY (`modified_by`) REFERENCES `users_tbl` (`username`),
  CONSTRAINT `shoe_model_tbl_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `brand_tbl` (`brand_id`),
  CONSTRAINT `shoe_model_tbl_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category_tbl` (`category_id`),
  CONSTRAINT `shoe_model_tbl_ibfk_3` FOREIGN KEY (`material_id`) REFERENCES `material_tbl` (`material_id`),
  CONSTRAINT `shoe_model_tbl_ibfk_4` FOREIGN KEY (`traction_id`) REFERENCES `traction_tbl` (`traction_id`),
  CONSTRAINT `shoe_model_tbl_ibfk_5` FOREIGN KEY (`support_id`) REFERENCES `support_tbl` (`support_id`),
  CONSTRAINT `shoe_model_tbl_ibfk_6` FOREIGN KEY (`technology_id`) REFERENCES `technology_tbl` (`technology_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table lesanshoes_db.shoe_model_tbl: ~3 rows (approximately)
DELETE FROM `shoe_model_tbl`;
INSERT INTO `shoe_model_tbl` (`shoe_model_id`, `brand_id`, `category_id`, `material_id`, `traction_id`, `support_id`, `technology_id`, `model_name`, `date_created`, `date_updated`, `description`, `modified_by`) VALUES
	(13, 2, 1, 1, 1, 1, 1, 'LeBron James', '2025-05-10 04:00:46', '2025-05-10 04:00:46', 'Fly like LeBron, play like LeBron.', 'damian'),
	(14, 4, 1, 3, 1, 2, 3, 'Damian Lillard', '2025-05-10 04:04:02', '2025-05-10 04:04:02', 'Dame Time!', 'damian'),
	(15, 6, 1, 4, 3, 3, 4, 'Luka 4 Bloodline', '2025-05-10 18:05:07', '2025-05-10 18:05:07', 'Luka 4 Bloodline', 'lebron');

-- Dumping structure for table lesanshoes_db.size_tbl
DROP TABLE IF EXISTS `size_tbl`;
CREATE TABLE IF NOT EXISTS `size_tbl` (
  `size_id` int(11) NOT NULL,
  `size_name` varchar(100) NOT NULL DEFAULT '0',
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_by` varchar(100) DEFAULT 'lebron',
  PRIMARY KEY (`size_id`),
  UNIQUE KEY `size_name` (`size_name`),
  KEY `fk_size_tbl_modified_by` (`modified_by`),
  CONSTRAINT `fk_size_tbl_modified_by` FOREIGN KEY (`modified_by`) REFERENCES `users_tbl` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table lesanshoes_db.size_tbl: ~14 rows (approximately)
DELETE FROM `size_tbl`;
INSERT INTO `size_tbl` (`size_id`, `size_name`, `date_created`, `date_updated`, `modified_by`) VALUES
	(0, 'N/A', '2025-04-29 16:21:31', '2025-04-29 16:21:31', 'lebron'),
	(1, 'US 6', '2025-05-06 03:58:43', '2025-05-06 03:58:43', 'damian'),
	(2, 'US 6.5', '2025-05-06 03:58:59', '2025-05-06 03:58:59', 'damian'),
	(3, 'US 7', '2025-05-06 03:59:10', '2025-05-06 03:59:10', 'damian'),
	(4, 'US 7.5', '2025-05-06 03:59:25', '2025-05-06 03:59:25', 'damian'),
	(5, 'US 8', '2025-05-06 03:59:38', '2025-05-06 03:59:38', 'damian'),
	(6, 'US 8.5', '2025-05-06 03:59:48', '2025-05-06 03:59:48', 'damian'),
	(7, 'US 9', '2025-05-06 03:59:56', '2025-05-06 03:59:56', 'damian'),
	(8, 'US 9.5', '2025-05-06 04:00:07', '2025-05-06 04:00:07', 'damian'),
	(9, 'US 10', '2025-05-06 04:00:19', '2025-05-06 04:00:19', 'damian'),
	(10, 'US 10.5', '2025-05-06 04:00:34', '2025-05-06 04:00:34', 'damian'),
	(11, 'US 11', '2025-05-06 04:00:53', '2025-05-06 04:00:53', 'damian'),
	(12, 'US 11.5', '2025-05-06 04:01:05', '2025-05-06 04:01:05', 'damian'),
	(13, 'US 12', '2025-05-06 04:01:20', '2025-05-06 04:01:20', 'damian');

-- Dumping structure for table lesanshoes_db.status_tbl
DROP TABLE IF EXISTS `status_tbl`;
CREATE TABLE IF NOT EXISTS `status_tbl` (
  `status_id` int(11) NOT NULL,
  `status_name` varchar(100) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_by` varchar(100) DEFAULT 'lebron',
  PRIMARY KEY (`status_id`),
  UNIQUE KEY `status_name` (`status_name`),
  KEY `fk_status_tbl_modified_by` (`modified_by`),
  CONSTRAINT `fk_status_tbl_modified_by` FOREIGN KEY (`modified_by`) REFERENCES `users_tbl` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table lesanshoes_db.status_tbl: ~5 rows (approximately)
DELETE FROM `status_tbl`;
INSERT INTO `status_tbl` (`status_id`, `status_name`, `date_created`, `date_updated`, `modified_by`) VALUES
	(0, 'N/A', '2025-04-29 06:12:17', '2025-04-29 06:27:50', 'lebron'),
	(1, 'Pending', '2025-04-27 08:56:59', '2025-04-27 08:56:59', 'lebron'),
	(2, 'Out for delivery', '2025-04-27 08:57:07', '2025-04-27 08:57:07', 'lebron'),
	(3, 'Completed', '2025-04-27 08:57:17', '2025-04-27 08:57:17', 'lebron'),
	(4, 'Cancelled', '2025-04-29 04:20:47', '2025-05-06 03:27:59', 'damian');

-- Dumping structure for table lesanshoes_db.support_tbl
DROP TABLE IF EXISTS `support_tbl`;
CREATE TABLE IF NOT EXISTS `support_tbl` (
  `support_id` int(11) NOT NULL,
  `support_name` varchar(100) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_by` varchar(100) DEFAULT 'lebron',
  PRIMARY KEY (`support_id`),
  UNIQUE KEY `support_name` (`support_name`),
  KEY `fk_support_tbl_modified_by` (`modified_by`),
  CONSTRAINT `fk_support_tbl_modified_by` FOREIGN KEY (`modified_by`) REFERENCES `users_tbl` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table lesanshoes_db.support_tbl: ~4 rows (approximately)
DELETE FROM `support_tbl`;
INSERT INTO `support_tbl` (`support_id`, `support_name`, `date_created`, `date_updated`, `modified_by`) VALUES
	(0, 'N/A', '2025-04-29 06:49:50', '2025-04-29 06:49:50', 'lebron'),
	(1, 'High ankle', '2025-05-06 03:39:45', '2025-05-06 03:39:45', 'damian'),
	(2, 'Low ankle', '2025-05-06 03:39:53', '2025-05-06 03:39:53', 'damian'),
	(3, 'Mid ankle', '2025-05-06 03:40:12', '2025-05-06 03:40:12', 'damian');

-- Dumping structure for table lesanshoes_db.technology_tbl
DROP TABLE IF EXISTS `technology_tbl`;
CREATE TABLE IF NOT EXISTS `technology_tbl` (
  `technology_id` int(11) NOT NULL,
  `technology_name` varchar(100) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_by` varchar(100) DEFAULT 'lebron',
  PRIMARY KEY (`technology_id`),
  UNIQUE KEY `technology_name` (`technology_name`),
  KEY `fk_technology_tbl_modified_by` (`modified_by`),
  CONSTRAINT `fk_technology_tbl_modified_by` FOREIGN KEY (`modified_by`) REFERENCES `users_tbl` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table lesanshoes_db.technology_tbl: ~5 rows (approximately)
DELETE FROM `technology_tbl`;
INSERT INTO `technology_tbl` (`technology_id`, `technology_name`, `date_created`, `date_updated`, `modified_by`) VALUES
	(0, 'N/A', '2025-04-29 06:55:45', '2025-05-06 03:44:23', 'damian'),
	(1, 'FlyKnit', '2025-05-06 03:53:16', '2025-05-06 03:54:00', 'damian'),
	(2, 'Gel', '2025-05-06 03:54:17', '2025-05-06 03:54:17', 'damian'),
	(3, 'Boost', '2025-05-06 03:54:49', '2025-05-06 03:54:49', 'damian'),
	(4, 'Flywire', '2025-05-06 03:55:12', '2025-05-06 03:55:12', 'damian');

-- Dumping structure for table lesanshoes_db.traction_tbl
DROP TABLE IF EXISTS `traction_tbl`;
CREATE TABLE IF NOT EXISTS `traction_tbl` (
  `traction_id` int(11) NOT NULL,
  `traction_name` varchar(100) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_by` varchar(100) DEFAULT 'lebron',
  PRIMARY KEY (`traction_id`),
  UNIQUE KEY `traction_name` (`traction_name`),
  KEY `fk_traction_tbl_modified_by` (`modified_by`),
  CONSTRAINT `fk_traction_tbl_modified_by` FOREIGN KEY (`modified_by`) REFERENCES `users_tbl` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table lesanshoes_db.traction_tbl: ~4 rows (approximately)
DELETE FROM `traction_tbl`;
INSERT INTO `traction_tbl` (`traction_id`, `traction_name`, `date_created`, `date_updated`, `modified_by`) VALUES
	(0, 'N/A', '2025-04-29 06:40:41', '2025-04-29 06:40:52', 'lebron'),
	(1, 'Rubber Outsole', '2025-05-06 03:37:28', '2025-05-06 03:37:28', 'damian'),
	(2, 'Anti-slip', '2025-05-06 03:37:53', '2025-05-06 03:37:53', 'damian'),
	(3, 'Spiked Sole', '2025-05-06 03:39:25', '2025-05-06 03:39:25', 'damian');

-- Dumping structure for table lesanshoes_db.users_tbl
DROP TABLE IF EXISTS `users_tbl`;
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

-- Dumping data for table lesanshoes_db.users_tbl: ~13 rows (approximately)
DELETE FROM `users_tbl`;
INSERT INTO `users_tbl` (`username`, `roles_id`, `fname`, `lname`, `email`, `user_password`, `birthday`, `user_address`, `contact`, `date_created`, `date_updated`, `last_login`) VALUES
	('damian', 2, 'damian', 'lillard', 'damian@gmail.com', '123', '2025-04-23', '167-B 21st Avenue, East Rembo', '09664282161', '2025-04-20 18:25:14', '2025-05-03 18:05:09', '2025-05-10 11:06:32'),
	('dasdadsdssdf', 1, 'dsadas', 'daa', 'dasd@gma.c', '123', '1876-08-28', 'eqweqqe', '03242211231', '2025-05-03 18:21:30', '2025-05-03 18:21:30', NULL),
	('dasdadsdssdfdd', 1, 'dsadas', 'daa', 'dasd@gma.c', '123', '2025-08-28', 'eqweqqe', '03242211231', '2025-05-03 18:21:46', '2025-05-03 18:21:46', NULL),
	('dasdasda', 1, 'dsadas', 'daa', 'dasd@gma.c', '123', '2025-05-03', 'eqweqqe', '03242211231', '2025-05-03 17:41:09', '2025-05-03 17:41:09', NULL),
	('dasdasdadas', 1, 'dsadas', 'daa', 'dasd@gma.c', '123', '2060-08-29', 'eqweqqe', '03242211231', '2025-05-03 17:41:46', '2025-05-03 17:41:46', NULL),
	('Giannis', 3, 'asdklsad', 'Antetokounmpo', 'giannis@gmail.com', '123', NULL, '', '39430294312', '2025-05-01 04:06:02', '2025-05-03 16:44:32', NULL),
	('he', 2, 'JULIUS AUSTIN', 'JULIUS AUSTIN', 'giansenensantos@yahoo.com.ph', '123', NULL, '', '54545454545', '2025-04-27 14:34:06', '2025-05-03 18:04:35', '2025-05-04 00:04:07'),
	('julius', 1, 'JULIUS AUSTIN', 'SANTOS', 'Juliusaustin.santos.cics@ust.edu.ph', '123', '2004-08-28', '167-B 21st Avenue, East Rembo', '09664282161', '2025-04-21 16:11:52', '2025-04-21 16:11:52', '2025-05-11 12:41:03'),
	('lebron', 2, 'LeBron', 'James', 'lebronjamesking@gmail.com', '123', NULL, '', '12312312312', '2025-04-27 15:17:55', '2025-04-27 15:17:55', '2025-05-11 12:32:25'),
	('marc', 1, 'marc', 'yaeger', 'marc@gmail.com', '123', '2025-04-17', '167-B 21st Avenue, East Rembo', '09664282161', '2025-04-22 01:13:14', '2025-04-22 01:13:14', '2025-04-23 14:41:30'),
	('sddvlmdlkvd', 1, 'dsadas1', 'daa', 'dasd@gma.c', '123', '2025-05-03', 'eqweqqe', '03242211231', '2025-05-03 18:22:37', '2025-05-03 18:22:37', NULL),
	('sky', 3, 'Sky', 'Ubaldo', 'sky@gmail.com', '123', NULL, '', '12313123123', '2025-04-22 06:06:22', '2025-05-03 16:30:26', '2025-04-27 14:46:20'),
	('soracakiesz', 1, 'Elizabeth Jean', 'Ubaldo', 'skyjean@gmail.com', '123', '2005-09-02', 'Caloocan City', '22222222222', '2025-04-24 13:43:35', '2025-04-24 13:43:35', '2025-04-24 19:44:21');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

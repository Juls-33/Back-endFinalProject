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

-- Dumping structure for table lesanshoes_db.cart_tbl
DROP TABLE IF EXISTS `cart_tbl`;
CREATE TABLE IF NOT EXISTS `cart_tbl` (
  `cart_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `colorway_size_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`cart_id`),
  KEY `username` (`username`),
  KEY `colorway_size_id` (`colorway_size_id`),
  CONSTRAINT `colorway_size_id` FOREIGN KEY (`colorway_size_id`) REFERENCES `colorway_size_tbl` (`colorway_size_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `username` FOREIGN KEY (`username`) REFERENCES `users_tbl` (`username`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table lesanshoes_db.cart_tbl: ~0 rows (approximately)
DELETE FROM `cart_tbl`;

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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table lesanshoes_db.colorway_size_tbl: ~10 rows (approximately)
DELETE FROM `colorway_size_tbl`;
INSERT INTO `colorway_size_tbl` (`colorway_size_id`, `colorway_id`, `size_id`, `stock`, `date_created`, `date_updated`, `modified_by`) VALUES
	(9, 25, 7, 10, '2025-05-11 07:55:37', '2025-05-13 06:08:10', 'damian'),
	(10, 25, 5, 7, '2025-05-11 07:55:41', '2025-05-13 06:15:43', 'damian'),
	(11, 25, 12, 1, '2025-05-11 07:55:47', '2025-05-13 06:08:46', 'damian'),
	(12, 25, 4, 7, '2025-05-11 08:27:22', '2025-05-11 08:27:22', 'damian'),
	(13, 27, 6, 1, '2025-05-11 08:27:29', '2025-05-13 06:08:48', 'damian'),
	(14, 31, 6, 10, '2025-05-11 08:27:33', '2025-05-11 08:27:33', 'damian'),
	(15, 30, 8, 10, '2025-05-11 08:27:38', '2025-05-11 08:27:38', 'damian'),
	(16, 30, 9, 10, '2025-05-11 08:27:44', '2025-05-11 08:27:44', 'damian'),
	(17, 28, 9, 10, '2025-05-11 08:27:49', '2025-05-11 08:27:49', 'damian'),
	(18, 26, 9, 7, '2025-05-13 06:09:23', '2025-05-13 06:09:23', 'damian'),
	(19, 27, 10, 0, '2025-05-13 06:14:15', '2025-05-13 06:14:15', 'damian');

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
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table lesanshoes_db.colorway_tbl: ~7 rows (approximately)
DELETE FROM `colorway_tbl`;
INSERT INTO `colorway_tbl` (`colorway_id`, `shoe_model_id`, `colorway_name`, `price`, `image1`, `image2`, `image3`, `image4`, `date_created`, `date_updated`, `modified_by`) VALUES
	(25, 15, 'Black', 8999.00, '../assets/images/colorway_682041b084cea.jpg', '../assets/images/colorway_681f79c336011.jpg', '../assets/images/colorway_681f79c336014.jpg', '../assets/images/colorway_682041b085b92.jpg', '2025-05-10 18:07:31', '2025-05-11 08:20:32', 'damian'),
	(26, 16, 'White', 5000.00, '../assets/images/colorway_682040e1e8e0a.png', '../assets/images/colorway_682040e1e8e19.png', '../assets/images/colorway_682040e1e8e1e.png', '../assets/images/colorway_682040e1e8e22.png', '2025-05-11 08:17:05', '2025-05-11 08:17:05', 'damian'),
	(27, 17, 'Solar Return', 5000.00, '../assets/images/colorway_6820411b33f86.jpg', '../assets/images/colorway_6820411b33f8e.jpg', '../assets/images/colorway_6820411b33f91.jpg', '../assets/images/colorway_6820411b33f94.jpg', '2025-05-11 08:18:03', '2025-05-11 08:18:03', 'damian'),
	(28, 18, 'Black Hole', 5000.00, '../assets/images/colorway_6820414eec5a4.png', '../assets/images/colorway_6820414eec5ad.png', '../assets/images/colorway_6820414eec5b1.png', '../assets/images/colorway_6820414eec5b3.png', '2025-05-11 08:18:54', '2025-05-11 08:18:54', 'damian'),
	(29, 19, 'Black Cement', 8000.00, '../assets/images/colorway_6820417581f76.jpg', '../assets/images/colorway_6820417581f81.jpg', '../assets/images/colorway_6820417581f87.jpg', '../assets/images/colorway_6820417581f8a.jpg', '2025-05-11 08:19:33', '2025-05-11 08:19:33', 'damian'),
	(30, 20, 'Green White', 5000.00, '../assets/images/colorway_682041ea50f76.jpg', '../assets/images/colorway_682041ea50f7f.jpg', '../assets/images/colorway_682041ea50f82.jpg', '../assets/images/colorway_682041ea50f85.jpg', '2025-05-11 08:21:30', '2025-05-11 08:21:30', 'damian'),
	(31, 21, 'LeBronto Raptors', 10000.00, '../assets/images/colorway_68204218d2a20.jpg', '../assets/images/colorway_68204218d2a2b.jpg', '../assets/images/colorway_68204218d2a31.jpg', '../assets/images/colorway_68204218d2a34.jpg', '2025-05-11 08:22:16', '2025-05-11 08:22:16', 'damian');

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
  `status` enum('Pending','Out For Delivery','Completed','Cancelled','failed') DEFAULT 'Pending',
  `total_price` decimal(10,2) DEFAULT 0.00,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp(),
  `customer_address` varchar(250) DEFAULT NULL,
  `contact` varchar(50) DEFAULT '09151234567',
  PRIMARY KEY (`order_id`),
  KEY `username` (`username`),
  CONSTRAINT `orders_tbl_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users_tbl` (`username`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table lesanshoes_db.orders_tbl: ~12 rows (approximately)
DELETE FROM `orders_tbl`;
INSERT INTO `orders_tbl` (`order_id`, `username`, `order_date`, `status`, `total_price`, `date_created`, `date_updated`, `customer_address`, `contact`) VALUES
	(1, 'dasdadsdssdf', '2025-05-11 14:29:53', 'Cancelled', 10000.00, '2025-05-11 14:30:06', '2025-05-11 14:30:06', 'bahay ko', '09151234567'),
	(2, 'julius', '2025-05-11 15:42:50', 'Completed', 15000.00, '2025-05-11 15:42:56', '2025-05-11 15:42:56', 'UST', '09151234567'),
	(30, 'julspogi', '2025-05-13 00:22:59', 'Completed', 5000.00, '2025-05-13 00:22:59', '2025-05-13 00:22:59', '167-B 21st Avenue, East Rembo', '09664282161'),
	(31, 'julspogi', '2025-05-13 00:23:40', 'Completed', 26997.00, '2025-05-13 00:23:40', '2025-05-13 00:23:40', '167-B 21st Avenue, East Rembo', '09664282161'),
	(32, 'julspogi', '2025-05-13 00:24:23', 'Cancelled', 50996.00, '2025-05-13 00:24:23', '2025-05-13 00:24:23', '167-B 21st Avenue, East Rembo', '09664282161'),
	(33, 'julspogi', '2025-05-13 11:05:40', 'Completed', 42998.00, '2025-05-13 11:05:40', '2025-05-13 11:05:40', '167-B 21st Avenue, East Rembo', '09664282161'),
	(34, 'julspogi', '2025-05-13 11:07:11', 'Completed', 10000.00, '2025-05-13 11:07:11', '2025-05-13 11:07:11', '167-B 21st Avenue, East Rembo', '09664282161'),
	(35, 'julspogi', '2025-05-13 11:07:59', 'Out For Delivery', 10000.00, '2025-05-13 11:07:59', '2025-05-13 11:07:59', '167-B 21st Avenue, East Rembo', '09664282161'),
	(36, 'julspogi', '2025-05-13 11:54:59', 'Cancelled', 71992.00, '2025-05-13 11:54:59', '2025-05-13 11:54:59', '167-B 21st Avenue, East Rembo', '09664282161'),
	(37, 'julspogi', '2025-05-13 11:56:48', 'Cancelled', 8999.00, '2025-05-13 11:56:48', '2025-05-13 11:56:48', '167-B 21st Avenue, East Rembo', '09664282161'),
	(38, 'julspogi', '2025-05-13 12:14:46', 'Completed', 25000.00, '2025-05-13 12:14:46', '2025-05-13 12:14:46', '167-B 21st Avenue, East Rembo', '09664282161'),
	(39, 'cj', '2025-05-13 21:26:24', 'Cancelled', 15000.00, '2025-05-13 21:26:24', '2025-05-13 21:26:24', 'California', '09991231234'),
	(40, 'julspogi', '2025-05-14 07:28:24', 'Pending', 35996.00, '2025-05-14 07:28:24', '2025-05-14 07:28:24', '167-B 21st Avenue, East Rembo', '09664282161');

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
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table lesanshoes_db.order_items_tbl: ~15 rows (approximately)
DELETE FROM `order_items_tbl`;
INSERT INTO `order_items_tbl` (`order_item_id`, `order_id`, `colorway_id`, `size_id`, `quantity`, `price_at_order`, `date_created`, `date_updated`, `colorway_size_id`) VALUES
	(1, 1, 29, 11, 2, 5000.00, '2025-05-11 14:30:49', '2025-05-11 14:30:51', 14),
	(2, 2, 27, 12, 3, 5000.00, '2025-05-11 15:43:16', '2025-05-11 15:43:16', 14),
	(8, 30, 27, 6, 1, 5000.00, '2025-05-13 00:22:59', '2025-05-13 00:22:59', 13),
	(9, 31, 25, 7, 3, 8999.00, '2025-05-13 00:23:40', '2025-05-13 00:23:40', 9),
	(10, 32, 25, 5, 4, 8999.00, '2025-05-13 00:24:23', '2025-05-13 00:24:23', 10),
	(11, 32, 28, 9, 3, 5000.00, '2025-05-13 00:24:23', '2025-05-13 00:24:23', 17),
	(12, 33, 28, 9, 10, 5000.00, '2025-05-13 11:05:40', '2025-05-13 11:05:40', 17),
	(13, 33, 25, 7, 10, 8999.00, '2025-05-13 11:05:40', '2025-05-13 11:05:40', 9),
	(14, 34, 30, 8, 10, 5000.00, '2025-05-13 11:07:11', '2025-05-13 11:07:11', 15),
	(15, 35, 30, 9, 10, 5000.00, '2025-05-13 11:07:59', '2025-05-13 11:07:59', 16),
	(16, 36, 25, 12, 8, 8999.00, '2025-05-13 11:54:59', '2025-05-13 11:54:59', 11),
	(17, 37, 25, 12, 1, 8999.00, '2025-05-13 11:56:48', '2025-05-13 11:56:48', 11),
	(18, 38, 27, 10, 5, 5000.00, '2025-05-13 12:14:46', '2025-05-13 12:14:46', 19),
	(19, 39, 26, 9, 3, 5000.00, '2025-05-13 21:26:24', '2025-05-13 21:26:24', 18),
	(20, 40, 25, 4, 1, 8999.00, '2025-05-14 07:28:24', '2025-05-14 07:28:24', 12),
	(21, 40, 25, 4, 2, 8999.00, '2025-05-14 07:28:24', '2025-05-14 07:28:24', 12);

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
  `date` date NOT NULL DEFAULT current_timestamp(),
  `order_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`salesperday_id`),
  KEY `fk_order` (`order_id`),
  CONSTRAINT `fk_order` FOREIGN KEY (`order_id`) REFERENCES `orders_tbl` (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table lesanshoes_db.sales_tbl: ~75 rows (approximately)
DELETE FROM `sales_tbl`;
INSERT INTO `sales_tbl` (`salesperday_id`, `amount`, `date`, `order_id`) VALUES
	(1, 100, '2025-06-05', NULL),
	(2, 150, '2025-06-06', NULL),
	(3, 200, '2025-06-07', NULL),
	(4, 100, '2025-06-05', NULL),
	(5, 150, '2025-06-06', NULL),
	(6, 200, '2025-06-07', NULL),
	(7, 100, '2025-06-05', NULL),
	(8, 150, '2025-06-06', NULL),
	(9, 200, '2025-06-07', NULL),
	(10, 100, '2025-06-05', NULL),
	(11, 150, '2025-06-06', NULL),
	(12, 200, '2025-06-07', NULL),
	(13, 100, '2025-06-05', NULL),
	(14, 150, '2025-06-06', NULL),
	(15, 200, '2025-06-07', NULL),
	(16, 100, '2025-06-05', NULL),
	(17, 150, '2025-06-06', NULL),
	(18, 200, '2025-06-07', NULL),
	(19, 100, '2025-06-05', NULL),
	(20, 150, '2025-06-06', NULL),
	(21, 200, '2025-06-07', NULL),
	(22, 100, '2025-06-05', NULL),
	(23, 150, '2025-06-06', NULL),
	(24, 200, '2025-06-07', NULL),
	(25, 100, '2025-06-05', NULL),
	(26, 150, '2025-06-06', NULL),
	(27, 200, '2025-06-07', NULL),
	(28, 100, '2025-06-05', NULL),
	(29, 150, '2025-06-06', NULL),
	(30, 200, '2025-06-07', NULL),
	(31, 100, '2025-06-05', NULL),
	(32, 150, '2025-06-06', NULL),
	(33, 200, '2025-06-07', NULL),
	(34, 100, '2025-06-05', NULL),
	(35, 150, '2025-06-06', NULL),
	(36, 200, '2025-06-07', NULL),
	(37, 10000, '2025-05-11', 1),
	(38, 15000, '2025-05-11', 2),
	(39, 100, '2025-06-05', NULL),
	(40, 150, '2025-06-06', NULL),
	(41, 200, '2025-06-07', NULL),
	(42, 100, '2025-06-05', NULL),
	(43, 150, '2025-06-06', NULL),
	(44, 200, '2025-06-07', NULL),
	(45, 100, '2025-06-05', NULL),
	(46, 150, '2025-06-06', NULL),
	(47, 200, '2025-06-07', NULL),
	(48, 100, '2025-06-05', NULL),
	(49, 150, '2025-06-06', NULL),
	(50, 200, '2025-06-07', NULL),
	(51, 100, '2025-06-05', NULL),
	(52, 150, '2025-06-06', NULL),
	(53, 200, '2025-06-07', NULL),
	(54, 100, '2025-06-05', NULL),
	(55, 150, '2025-06-06', NULL),
	(56, 200, '2025-06-07', NULL),
	(57, 100, '2025-06-05', NULL),
	(58, 150, '2025-06-06', NULL),
	(59, 200, '2025-06-07', NULL),
	(60, 100, '2025-06-05', NULL),
	(61, 150, '2025-06-06', NULL),
	(62, 200, '2025-06-07', NULL),
	(63, 100, '2025-06-05', NULL),
	(64, 150, '2025-06-06', NULL),
	(65, 200, '2025-06-07', NULL),
	(66, 100, '2025-06-05', NULL),
	(67, 150, '2025-06-06', NULL),
	(68, 200, '2025-06-07', NULL),
	(69, 100, '2025-06-05', NULL),
	(70, 150, '2025-06-06', NULL),
	(71, 200, '2025-06-07', NULL),
	(72, 100, '2025-06-05', NULL),
	(73, 150, '2025-06-06', NULL),
	(74, 200, '2025-06-07', NULL),
	(75, 100, '2025-06-05', NULL),
	(76, 150, '2025-06-06', NULL),
	(77, 200, '2025-06-07', NULL),
	(78, 5000, '2025-05-13', 30),
	(79, 26997, '2025-05-13', 31),
	(80, 25000, '2025-05-13', 38),
	(81, 42998, '2025-05-13', 33),
	(82, 10000, '2025-05-13', 34),
	(83, 15000, '2025-05-13', 39),
	(84, 35996, '2025-05-14', 40);

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
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table lesanshoes_db.shoe_model_tbl: ~7 rows (approximately)
DELETE FROM `shoe_model_tbl`;
INSERT INTO `shoe_model_tbl` (`shoe_model_id`, `brand_id`, `category_id`, `material_id`, `traction_id`, `support_id`, `technology_id`, `model_name`, `date_created`, `date_updated`, `description`, `modified_by`) VALUES
	(15, 6, 1, 4, 3, 3, 4, 'Luka 4 Bloodline', '2025-05-10 18:05:07', '2025-05-10 18:05:07', 'Luka 4 Bloodline', 'lebron'),
	(16, 4, 3, 2, 1, 2, 0, 'Stan Smith', '2025-05-11 08:04:35', '2025-05-11 08:04:35', 'Timeless appeal. Effortless style. Everyday versatility. For over 50 years and counting, adidas Stan Smith Shoes have continued to hold their place as an icon. This pair shows off a fresh redesign as part of adidas\' commitment to use only recycled polyester by 2024. With a vegan upper and an outsole made from rubber waste, they still have iconic style, they\'re just made with the planet in mind.\n\nThis product is made with vegan alternatives to animal-derived ingredients or materials. It is also m', 'damian'),
	(17, 1, 1, 1, 2, 3, 2, 'Kai 2', '2025-05-11 08:09:31', '2025-05-11 08:09:31', 'The "Solar Return" colorway takes inspiration from the solar spectrum, deconstructing sunlight into a vibrant array of colors across the shoe. These hues reflect the richness of all of life’s experiences and the energy Kyrie brings to the game.', 'damian'),
	(18, 5, 2, 1, 2, 2, 2, 'Gel Kayano 31', '2025-05-11 08:11:28', '2025-05-11 08:11:28', 'Move your mind with the GEL-KAYANO™ 31 LITE-SHOW™ shoe’s adaptive stability and premium comfort. ​This version features reflective details that are designed to improve your visibility in low-light settings.\n\n​\nThe 4D GUIDANCE SYSTEM™ helps provide adaptive stability. This helps you experience a more supportive and balanced stride during your distance training. ​​\n\nIts midsole implements FF BLAST™ PLUS ECO cushioning and PureGEL™ technology. These features make your distance training feel smooth', 'damian'),
	(19, 6, 3, 2, 1, 1, 0, 'Jordan 3', '2025-05-11 08:13:05', '2025-05-11 08:13:05', 'The Air Jordan 3 Retro ‘Infrared 23’ delivers a revised take on the silhouette’s OG White/Cement colorway from 1988. Like the original, the mid-top makes use of a white leather upper with elephant print overlays at the toe and heel. Updates include Infrared eyelets and added hits of basic black coloring on the tongue, collar, midsole and outsole.', 'damian'),
	(20, 2, 3, 2, 1, 2, 0, 'Field General', '2025-05-11 08:14:15', '2025-05-11 08:14:15', 'The Field General has moved from the stadium to the streets. It pairs synthetic leather and textiles with a nubby Waffle sole to create that vintage gridiron look.', 'damian'),
	(21, 2, 1, 2, 1, 3, 4, 'LeBron 21', '2025-05-11 08:15:57', '2025-05-11 08:15:57', 'Inspired by an oyster shell that protects the pearl it houses, the LeBron 21 has upper venting, informed by a shell\'s veining, which aims to help contain the athlete\'s foot during explosive movements. Reinforced by 360 degrees of zonal cables over the footbed, the shoes make sure players\' feet remain secure as games heat up. Meanwhile, underfoot, a forefoot Zoom Turbo unit and bottom 13-millimetre Zoom unit encourage propulsion. A TPU midfoot shank provides stability and extra oomph for dynamic', 'damian');

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
  CONSTRAINT `users_tbl_ibfk_1` FOREIGN KEY (`roles_id`) REFERENCES `roles_tbl` (`roles_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table lesanshoes_db.users_tbl: ~17 rows (approximately)
DELETE FROM `users_tbl`;
INSERT INTO `users_tbl` (`username`, `roles_id`, `fname`, `lname`, `email`, `user_password`, `birthday`, `user_address`, `contact`, `date_created`, `date_updated`, `last_login`) VALUES
	('AD', 1, 'Anthony', 'Davis', 'ad@gmail.com', 'Abcde12345!', '2000-02-22', 'sa Lebron house', '45621354534', '2025-05-13 17:34:38', '2025-05-13 17:34:38', '2025-05-13 23:40:00'),
	('AE', 3, 'Anthony', 'Edwards', 'antedwards@gmail.com', '123', NULL, '', '09323923193', '2025-05-14 01:04:06', '2025-05-14 01:04:22', '2025-05-14 07:09:11'),
	('cj', 1, 'Cjeejasd', 'MCCC', 'mc@gmail.com', 'Abcde12345!', '2000-05-07', 'Oregon', '12312312312', '2025-05-13 15:07:19', '2025-05-13 17:26:43', '2025-05-13 21:25:47'),
	('damian', 2, 'damian', 'lillard', 'damian@gmail.com', '123', '2025-04-23', '167-B 21st Avenue, East Rembo', '09664282161', '2025-04-20 18:25:14', '2025-05-03 18:05:09', '2025-05-14 07:28:49'),
	('dasdadsdssdf', 1, 'dsadas', 'daa', 'dasd@gma.c', '123', '1876-08-28', 'eqweqqe', '03242211231', '2025-05-03 18:21:30', '2025-05-03 18:21:30', NULL),
	('dasdadsdssdfdd', 1, 'dsadas', 'daa', 'dasd@gma.c', '123', '2025-08-28', 'eqweqqe', '03242211231', '2025-05-03 18:21:46', '2025-05-03 18:21:46', NULL),
	('dasdasda', 1, 'dsadas', 'daa', 'dasd@gma.c', '123', '2025-05-03', 'eqweqqe', '03242211231', '2025-05-03 17:41:09', '2025-05-03 17:41:09', NULL),
	('dasdasdadas', 1, 'dsadas', 'daa', 'dasd@gma.c', '123', '2060-08-29', 'eqweqqe', '03242211231', '2025-05-03 17:41:46', '2025-05-03 17:41:46', NULL),
	('Giannis', 3, 'asdklsad', 'Antetokounmpo', 'giannis@gmail.com', '123', NULL, '', '39430294312', '2025-05-01 04:06:02', '2025-05-03 16:44:32', '2025-05-13 21:38:49'),
	('julius', 1, 'JULIUS AUSTIN', 'SANTOS', 'Juliusaustin.santos.cics@ust.edu.ph', '123', '2004-08-28', '167-B 21st Avenue, East Rembo', '09664282161', '2025-04-21 16:11:52', '2025-04-21 16:11:52', '2025-05-11 12:41:03'),
	('julspogi', 1, 'Julius Austin', 'Santos', 'juliusaustin.santos@gmail.com', '123', '2004-05-28', '167-B 21st Avenue, East Rembo', '09664282161', '2025-05-12 07:31:36', '2025-05-12 07:31:36', '2025-05-14 07:27:17'),
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

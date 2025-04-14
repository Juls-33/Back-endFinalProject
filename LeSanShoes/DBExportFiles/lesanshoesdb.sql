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

-- Dumping structure for table lesanshoes_db.roles_tbl
CREATE TABLE IF NOT EXISTS `roles_tbl` (
  `roles_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`roles_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table lesanshoes_db.roles_tbl: ~3 rows (approximately)
DELETE FROM `roles_tbl`;
INSERT INTO `roles_tbl` (`roles_id`, `name`, `description`) VALUES
	(1, 'user', 'Accesses the website and order product different products'),
	(2, 'superAdmin', 'Manages the entire website and have access to all admin functionalities'),
	(3, 'Admin', 'Have the ability to accomodate orders, manage inventory, and view statistics');

-- Dumping structure for table lesanshoes_db.users_tbl
CREATE TABLE IF NOT EXISTS `users_tbl` (
  `username` varchar(100) NOT NULL DEFAULT '',
  `roles_id` int(11) DEFAULT NULL,
  `email` varchar(100) NOT NULL DEFAULT '',
  `user_password` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`username`) USING BTREE,
  KEY `roles_id` (`roles_id`),
  CONSTRAINT `users_tbl_ibfk_1` FOREIGN KEY (`roles_id`) REFERENCES `roles_tbl` (`roles_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table lesanshoes_db.users_tbl: ~8 rows (approximately)
DELETE FROM `users_tbl`;
INSERT INTO `users_tbl` (`username`, `roles_id`, `email`, `user_password`) VALUES
	('damian', 1, 'damian@gmail.com', '123'),
	('he', 2, 'he@gmail', 'he'),
	('hello', 1, 'hello@gmail.com', '1234'),
	('hi', 1, 'hi@gmail.com', '1234'),
	('hihi', 1, 'hi@gmail.com', '1234'),
	('lebron', 1, 'lebron@', '123'),
	('lillard', 1, 'lillard@gmai.com', '123'),
	('yo', 1, 'yo@gmaiil.com', 'lol'),
	('yoyo', 1, 'yoyo@gmail.com', '1234');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

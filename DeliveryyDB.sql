-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.18-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for sendy_db
DROP DATABASE IF EXISTS `sendy_db`;
CREATE DATABASE IF NOT EXISTS `sendy_db` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `sendy_db`;

-- Dumping structure for table sendy_db.order_data
DROP TABLE IF EXISTS `order_data`;
CREATE TABLE IF NOT EXISTS `order_data` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `origin` varchar(255) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `distance` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `recipient_name` varchar(255) NOT NULL,
  `recipient_contact` varchar(255) NOT NULL,
  `status` varchar(10) NOT NULL,
  `driver_id` int(11) DEFAULT NULL,
  `rating_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table sendy_db.order_data: ~12 rows (approximately)
/*!40000 ALTER TABLE `order_data` DISABLE KEYS */;
INSERT INTO `order_data` (`order_id`, `user_id`, `origin`, `destination`, `distance`, `price`, `recipient_name`, `recipient_contact`, `status`, `driver_id`, `rating_id`) VALUES
	(1, 16, 'Nakuru', 'Garissa', '398', '7977', 'Triad', '0799243956', 'COMPLETED', 16, 7),
	(2, 16, 'Tana River', 'Kilifi', '228', '4576', 'Richard', '0715415632', 'COMPLETED', 16, 6),
	(3, 16, 'Nairobi', 'Mombasa', '442', '8843', 'Test', '116544652', 'COMPLETED', 16, 8),
	(4, 17, 'Laikipia', 'Lamu', '4090', '81813', 'Liam', '56465465', 'COMPLETED', 16, 9),
	(5, 17, 'Kwale', 'Nakuru', '3359', '67196', 'Oloo', '546476', 'COMPLETED', 16, 10),
	(6, 17, 'Kilifi', 'Kitui', '324', '6490', 'Christie', '0799333749', 'COMPLETED', 20, 18),
	(7, 18, 'Kilifi', 'Kiambu', '433', '8666', 'Sam', '0712456789', 'PICKED UP', 19, NULL),
	(8, 20, 'Nyandarua', 'Nyeri', '61', '1228', 'gate', '0775321245', 'COMPLETED', 20, 13),
	(9, 20, 'Kwale', 'Nandi', '18371', '367434', 'kevin', '0722264880', 'COMPLETED', 20, 14),
	(10, 24, 'Nairobi', 'Mombasa', '442', '8843', 'Balo', '0702688714', 'PICKED UP', 21, NULL),
	(11, 25, 'Kitui', 'Nakuru', '247', '4954', 'cephas', '0778458643', 'COMPLETED', 25, 15),
	(12, 27, 'Samburu', 'Wajir', '315', '6305', 'well', '09', 'PENDING', NULL, NULL),
	(13, 29, 'Lamu', 'Kitui', '3972', '79444', 'timo', '0786543217', 'COMPLETED', 29, 17);
/*!40000 ALTER TABLE `order_data` ENABLE KEYS */;

-- Dumping structure for table sendy_db.rating_data
DROP TABLE IF EXISTS `rating_data`;
CREATE TABLE IF NOT EXISTS `rating_data` (
  `rating_id` int(11) NOT NULL AUTO_INCREMENT,
  `rating_comment` varchar(1100) NOT NULL,
  `rating_star` int(10) NOT NULL,
  `driver_id` int(11) NOT NULL,
  PRIMARY KEY (`rating_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table sendy_db.rating_data: ~11 rows (approximately)
/*!40000 ALTER TABLE `rating_data` DISABLE KEYS */;
INSERT INTO `rating_data` (`rating_id`, `rating_comment`, `rating_star`, `driver_id`) VALUES
	(5, 'estsetsetasdsadasdsadas', 5, 16),
	(6, 'sadassfdsfdsfsdfsdfsefsef', 4, 16),
	(7, 'trhyfghghgfhgfhfhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh', 5, 16),
	(8, 'jmhgjhjhgjghj', 4, 16),
	(9, 'cfsdfsfsdfsdf', 5, 16),
	(10, 'Good...', 4, 16),
	(11, 'goog', 3, 20),
	(12, 'nice', 3, 20),
	(13, 'Ann', 3, 20),
	(14, 'oooo', 5, 20),
	(15, 'good', 4, 25),
	(16, '', 4, 29),
	(17, 'good', 4, 29),
	(18, 'ytutyutyu', 3, 20);
/*!40000 ALTER TABLE `rating_data` ENABLE KEYS */;

-- Dumping structure for table sendy_db.user_data
DROP TABLE IF EXISTS `user_data`;
CREATE TABLE IF NOT EXISTS `user_data` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL COMMENT 'unique',
  `hashed_password` varchar(300) NOT NULL,
  `first_name` varchar(300) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL,
  `image` varchar(3000) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table sendy_db.user_data: ~13 rows (approximately)
/*!40000 ALTER TABLE `user_data` DISABLE KEYS */;
INSERT INTO `user_data` (`user_id`, `email`, `phone`, `hashed_password`, `first_name`, `last_name`, `role`, `image`) VALUES
	(15, 'test@test', '98477887', '$2y$10$3TDuSeNBXPc0ao0AqcvBeuhZRTa7HRWmlg4sv8ZhmkGYqQs6Cyt7u', 'test', 'test', 'DRIVER', NULL),
	(16, 'jallan@yopmail.com', '79565235', '$2y$10$vjMwHkaLXsQQmeykjsXUCuEv.VxYwIUYQzkC9XvTU4eDOFy4Q0Z5O', 'John', 'Allan', 'DRIVER', NULL),
	(17, 'triad@test.com', '799243956', '$2y$10$gqwffy96WVINBwtVdMo/geo914S9W78wE5bEPTPm1qcSEFqWzjU/e', 'Richard', 'York', 'CLIENT', NULL),
	(18, 'john@gmail.com', '0721435363', '$2y$10$Jshh4SV5bgcGg5fTV3EQ1O07iAlYNy9wYacSINfS9TfgveSkZK5mO', 'john', 'smith', 'CLIENT', NULL),
	(19, 'cephasmoko@gmail.com', '0743678412', '$2y$10$6oec3vIh7vCJITy.WSmMHuT5xKHfdvv7eQeYG96LqKGJT1Hjh1j8O', 'cephas', 'KAHUNYURO', 'DRIVER', NULL),
	(20, 'maina@gmail.com', '0778458643', '$2y$10$6ss024wDhwBYeEsaKsgxh.krPJexKEMgK8cB5wZfw7VE6eo427/1u', 'david', 'maina', 'CLIENT', NULL),
	(21, 'smith@hh.com', '8789492', '$2y$10$rFRViPgd71pI/G808MB/juHqmvQSZfGS4SP7G9xuyYjyBtKRvloQi', 'john', 'smith', 'DRIVER', NULL),
	(22, 'king@all.com', '7897822', '$2y$10$TgtWs2zGoaXSMBCh2jkS/O9YdJfxbyU2YOhaaAtrO8o/lZR0HAPMy', 'allan', 'king', 'DRIVER', NULL),
	(23, 'asdad@gg.co', '464984', '$2y$10$ogHqLugB6LjZfGI.69oU2.8yOyWmTolrVOkJjDA8OAi6N2hRBY/Hm', 'sad', 'das', 'DRIVER', NULL),
	(24, 'brucelosis12@gmail.com', '0702688714', '$2y$10$OvDF/tehZ6dQt2P0xpGOreL9ALc0y3KJdSnsOnVwdH3WGChQxljLK', 'Bruce', 'Omukoko', 'CLIENT', NULL),
	(25, 'faith@gmail.com', '0711753883', '$2y$10$T2j.9n4GJWQMbA48gODoEOOuclIuj5ugSKaY2wm5XxUOlp6tlBAHW', 'Faith', 'chep', 'CLIENT', NULL),
	(26, 'Annetmoko@gmail.com', '0752661122', '$2y$10$PHyMplQo2czzNL.GvovYtussnK5a2nr/pPnPW1L9n1XoyH9TCUbZi', 'ANNET NJOKI', 'KAHUNYURO', 'DRIVER', NULL),
	(27, 'david@gmail.com', '0771056372', '$2y$10$38hGMcHAi9hsGt48n1DIJuiRYElgc/gPmdsUkMElLygDdKxgqjxGm', 'David', 'Smith', 'CLIENT', NULL),
	(28, 'cephas@gmail.com', '0786543214', '$2y$10$FB6Gzzs7.6u59KXeHbvlke2a1hxWt3wsS63FSntg4sGHWYZXchTES', 'cephas', 'KAHUNYURO', 'DRIVER', NULL),
	(29, 'Annet@gmail.com', '752 661122', '$2y$10$lnsxyPgTCulP/dKiYBaRJu5nFd7Grm5EPHQkp30WmP47ffxiVZpe.', 'ANNET NJOKI', 'KAHUNYURO', 'CLIENT', NULL);
/*!40000 ALTER TABLE `user_data` ENABLE KEYS */;

-- Dumping structure for table sendy_db.vehicle_data
DROP TABLE IF EXISTS `vehicle_data`;
CREATE TABLE IF NOT EXISTS `vehicle_data` (
  `vehicle_id` int(11) NOT NULL AUTO_INCREMENT,
  `model` varchar(200) NOT NULL DEFAULT '',
  `registration` varchar(200) NOT NULL DEFAULT '',
  `driver_id` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`vehicle_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table sendy_db.vehicle_data: ~4 rows (approximately)
/*!40000 ALTER TABLE `vehicle_data` DISABLE KEYS */;
INSERT INTO `vehicle_data` (`vehicle_id`, `model`, `registration`, `driver_id`) VALUES
	(1, 'Isuzu', 'KAM32244', 21),
	(2, 'Isuzu', 'KAM3244', 22),
	(3, 'Renault', 'KAM4244', 23),
	(4, 'pickup', 'KCD 5678Y', 26),
	(5, 'lorry', 'KDE 5437T', 28);
/*!40000 ALTER TABLE `vehicle_data` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

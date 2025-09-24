-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               9.1.0 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.11.0.7065
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for asly_db
DROP DATABASE IF EXISTS `asly_db`;
CREATE DATABASE IF NOT EXISTS `asly_db` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `asly_db`;

-- Dumping structure for table asly_db.course
DROP TABLE IF EXISTS `course`;
CREATE TABLE IF NOT EXISTS `course` (
  `courseId` int NOT NULL AUTO_INCREMENT,
  `educationId` int NOT NULL,
  `courseCode` varchar(20) NOT NULL,
  `course` varchar(100) NOT NULL,
  PRIMARY KEY (`courseId`),
  KEY `educationId` (`educationId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table asly_db.course: 0 rows
/*!40000 ALTER TABLE `course` DISABLE KEYS */;
/*!40000 ALTER TABLE `course` ENABLE KEYS */;

-- Dumping structure for table asly_db.educationlevel
DROP TABLE IF EXISTS `educationlevel`;
CREATE TABLE IF NOT EXISTS `educationlevel` (
  `id` int NOT NULL,
  `educationLabel` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table asly_db.educationlevel: 0 rows
/*!40000 ALTER TABLE `educationlevel` DISABLE KEYS */;
/*!40000 ALTER TABLE `educationlevel` ENABLE KEYS */;

-- Dumping structure for table asly_db.enrollees
DROP TABLE IF EXISTS `enrollees`;
CREATE TABLE IF NOT EXISTS `enrollees` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstName` varchar(100) NOT NULL,
  `middleInitial` varchar(5) DEFAULT NULL,
  `lastName` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `lastSchoolAttended` varchar(150) DEFAULT NULL,
  `lastSchoolYr` varchar(20) DEFAULT NULL,
  `birthDate` date NOT NULL,
  `gender` enum('Male','Female','Other') NOT NULL,
  `dateEnrolled` date NOT NULL,
  `courseId` int NOT NULL,
  `educationalAttainment` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `courseId` (`courseId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table asly_db.enrollees: 0 rows
/*!40000 ALTER TABLE `enrollees` DISABLE KEYS */;
/*!40000 ALTER TABLE `enrollees` ENABLE KEYS */;

-- Dumping structure for table asly_db.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `userType` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table asly_db.users: 1 rows
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `userType`, `username`, `password`) VALUES
	(1, 'Admin', 'shinzuo', 'shinzuo123');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

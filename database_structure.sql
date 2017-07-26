-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.14 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.4.0.5174
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for exchange
CREATE DATABASE IF NOT EXISTS `exchange` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;
USE `exchange`;

-- Dumping structure for table exchange.files
CREATE TABLE IF NOT EXISTS `files` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'File ID',
  `upload_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'time the file was uploaded',
  `original_file_name` varchar(100) COLLATE utf8_bin NOT NULL COMMENT 'Name of the file',
  `encoded_file_name` varchar(100) COLLATE utf8_bin NOT NULL COMMENT 'Encoded file name, so it wouldn''t be readable',
  `crypt` varchar(100) COLLATE utf8_bin NOT NULL COMMENT 'File key in local filesystem for download',
  `file_size` int(11) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='This table stores all uploaded files';

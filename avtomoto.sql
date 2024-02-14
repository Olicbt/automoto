-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.38-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for avtomoto
CREATE DATABASE IF NOT EXISTS `avtomoto` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `avtomoto`;

-- Dumping structure for table avtomoto.kupuvac
CREATE TABLE IF NOT EXISTS `kupuvac` (
  `kupuvac_id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `ime` char(50) DEFAULT NULL,
  `adresa` char(50) DEFAULT NULL,
  `telefon` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`kupuvac_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Dumping data for table avtomoto.kupuvac: ~6 rows (approximately)
/*!40000 ALTER TABLE `kupuvac` DISABLE KEYS */;
INSERT INTO `kupuvac` (`kupuvac_id`, `ime`, `adresa`, `telefon`) VALUES
	(1, 'Trajko Trajkovski', 'Prilepska 22 Bitola', 77123321),
	(2, 'Stojan Stojanovski', 'Aminta 3 33 Skopje', 75555666),
	(3, 'Cak Noris', 'Los Angeles', 223305),
	(4, 'Zivko Zivkovski', 'Capari', 77258963),
	(5, 'Mile Panika', 'Krivogastani', 75555333),
	(6, 'Toso Malerot', 'Capari', 77777888);
/*!40000 ALTER TABLE `kupuvac` ENABLE KEYS */;

-- Dumping structure for table avtomoto.marka
CREATE TABLE IF NOT EXISTS `marka` (
  `marka_id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `markaIme` char(50) DEFAULT NULL,
  `drzava` char(50) DEFAULT NULL,
  `grad` char(50) DEFAULT NULL,
  PRIMARY KEY (`marka_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Dumping data for table avtomoto.marka: ~6 rows (approximately)
/*!40000 ALTER TABLE `marka` DISABLE KEYS */;
INSERT INTO `marka` (`marka_id`, `markaIme`, `drzava`, `grad`) VALUES
	(1, 'Audi', 'Germanija', 'Keln'),
	(2, 'Tojota', 'Japonija', 'Tokio'),
	(3, 'Mazda', 'Japonija', 'Kobe'),
	(4, 'Skoda', 'Ceska', 'Praga'),
	(6, 'Lada', 'Rusija', 'Samara'),
	(7, 'Mercedes', 'Germanija', 'Stutgart');
/*!40000 ALTER TABLE `marka` ENABLE KEYS */;

-- Dumping structure for table avtomoto.model
CREATE TABLE IF NOT EXISTS `model` (
  `model_id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `modelIme` char(50) DEFAULT NULL,
  `opis` char(50) DEFAULT NULL,
  `godina` year(4) DEFAULT '2000',
  `cena` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`model_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Dumping data for table avtomoto.model: ~6 rows (approximately)
/*!40000 ALTER TABLE `model` DISABLE KEYS */;
INSERT INTO `model` (`model_id`, `modelIme`, `opis`, `godina`, `cena`) VALUES
	(1, 'A4', 'tdi bela boja', '1995', 1000),
	(2, 'Yaris', 'crn', '2000', 1500),
	(3, 'Oktavia', 'tdi bela boja', '2009', 1),
	(4, 'Samara', 'crvena', '2008', 3000),
	(6, 'E220', 'avangard', '2015', 12000);
/*!40000 ALTER TABLE `model` ENABLE KEYS */;

-- Dumping structure for table avtomoto.prodazba
CREATE TABLE IF NOT EXISTS `prodazba` (
  `prodazba_id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `kupuvac_id` int(5) unsigned NOT NULL,
  `marka_id` int(5) unsigned NOT NULL,
  `model_id` int(5) unsigned DEFAULT NULL,
  `data` date DEFAULT NULL,
  PRIMARY KEY (`prodazba_id`),
  KEY `FK1_kupuvac_id` (`kupuvac_id`),
  KEY `FK2_marka_id` (`marka_id`),
  KEY `FK3_model_id` (`model_id`),
  CONSTRAINT `FK1_kupuvac_id` FOREIGN KEY (`kupuvac_id`) REFERENCES `kupuvac` (`kupuvac_id`) ON UPDATE CASCADE,
  CONSTRAINT `FK2_marka_id` FOREIGN KEY (`marka_id`) REFERENCES `marka` (`marka_id`) ON UPDATE CASCADE,
  CONSTRAINT `FK3_model_id` FOREIGN KEY (`model_id`) REFERENCES `model` (`model_id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Dumping data for table avtomoto.prodazba: ~4 rows (approximately)
/*!40000 ALTER TABLE `prodazba` DISABLE KEYS */;
INSERT INTO `prodazba` (`prodazba_id`, `kupuvac_id`, `marka_id`, `model_id`, `data`) VALUES
	(1, 1, 1, 1, '2020-03-11'),
	(2, 2, 2, 2, '2020-03-11'),
	(4, 3, 6, 4, '2019-12-25'),
	(5, 5, 7, 6, '2019-12-21'),
	(6, 6, 4, 3, '2019-11-21');
/*!40000 ALTER TABLE `prodazba` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.17-log - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table db_reportalfa.grafik
CREATE TABLE IF NOT EXISTS `grafik` (
  `id_grafik` int(11) NOT NULL AUTO_INCREMENT,
  `nama_grafik` varchar(50) DEFAULT NULL,
  `id_report` int(11) DEFAULT NULL,
  `jenis_grafik` int(11) DEFAULT NULL,
  `data_grafik` text,
  `option_grafik` text,
  `column_grafik` int(11) DEFAULT NULL,
  `row_grafik` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_grafik`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table db_reportalfa.grafik: ~0 rows (approximately)
DELETE FROM `grafik`;
/*!40000 ALTER TABLE `grafik` DISABLE KEYS */;
/*!40000 ALTER TABLE `grafik` ENABLE KEYS */;

-- Dumping structure for table db_reportalfa.report
CREATE TABLE IF NOT EXISTS `report` (
  `id_report` int(11) NOT NULL AUTO_INCREMENT,
  `nama_report` varchar(50) DEFAULT NULL,
  `tanggal_report` date NOT NULL,
  PRIMARY KEY (`id_report`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

-- Dumping data for table db_reportalfa.report: ~3 rows (approximately)
DELETE FROM `report`;
/*!40000 ALTER TABLE `report` DISABLE KEYS */;
INSERT INTO `report` (`id_report`, `nama_report`, `tanggal_report`) VALUES
	(18, 'COba1', '2020-04-01'),
	(27, 'Report 1', '2020-04-01'),
	(28, 'Report 2', '2020-04-01');
/*!40000 ALTER TABLE `report` ENABLE KEYS */;

-- Dumping structure for table db_reportalfa.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `nama` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table db_reportalfa.user: ~5 rows (approximately)
DELETE FROM `user`;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `nama`, `email`, `password`) VALUES
	(30, 'admin', 'seo.satu1@gmail.com', '$2y$05$MZwt9j/kuvXXcCzZridnGu7YDLhD1hR99.BtTm8nnYZEkzurS7rDe'),
	(31, 'seosatu2', 'admin@seosatu.com', '$2y$05$Og8T8VFcZJYyTJ7L5xTPG.DOSZ75OTfMmhydFyNDgR7uKSCV4gtsK'),
	(32, 'seosatu', 'cloudflare@amiklan.com', '$2y$05$o5xTBd3DfVlqM2brDfG1j.TUfMcQlz7XUEpwuEhjQaMj3Yz6gSkzK'),
	(33, 'insan', 'biosagita@yahoo.com', '$2y$05$z0plRNB9M8.OVZb7tVarvO0peezb0Ibf48ijaEnovrWjP2rD8DAma'),
	(34, 'insan2', 'biosagita@gmail.com', '$2y$05$Hdn48yKpnA/e8slb8cogou9.erRoINeKOpsarqVstv7atos3MbGda');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

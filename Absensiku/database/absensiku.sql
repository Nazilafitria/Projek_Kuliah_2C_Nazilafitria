-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for db_absensiku
CREATE DATABASE IF NOT EXISTS `db_absensiku` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `db_absensiku`;

-- Dumping structure for table db_absensiku.absen
CREATE TABLE IF NOT EXISTS `absen` (
  `kodeabsen` int NOT NULL AUTO_INCREMENT,
  `hari` varchar(50) DEFAULT NULL,
  `idm` int DEFAULT NULL,
  `kode` int DEFAULT NULL,
  `idj` int DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`kodeabsen`),
  KEY `idm` (`idm`),
  KEY `kode` (`kode`),
  KEY `idj` (`idj`),
  CONSTRAINT `FK_absen_tb_jadwal` FOREIGN KEY (`idj`) REFERENCES `tb_jadwal` (`idj`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `FK_absen_tb_kelas` FOREIGN KEY (`kode`) REFERENCES `tb_kelas` (`kode`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `FK_absen_tb_mapel` FOREIGN KEY (`idm`) REFERENCES `tb_mapel` (`idm`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=202 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_absensiku.absen: ~1 rows (approximately)
INSERT INTO `absen` (`kodeabsen`, `hari`, `idm`, `kode`, `idj`, `status`) VALUES
	(201, 'Senin', 1, 104, 3, '1');

-- Dumping structure for table db_absensiku.tb_guru
CREATE TABLE IF NOT EXISTS `tb_guru` (
  `idg` int NOT NULL AUTO_INCREMENT,
  `nik` bigint DEFAULT NULL,
  `nama` varchar(200) DEFAULT NULL,
  `jk` varchar(50) DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`idg`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_absensiku.tb_guru: ~3 rows (approximately)
INSERT INTO `tb_guru` (`idg`, `nik`, `nama`, `jk`, `alamat`, `password`) VALUES
	(1, 1108042709980001, 'Khairul Mizwar', 'Laki-Laki', 'Desa Blang', '5f4dcc3b5aa765d61d8327deb882cf99'),
	(2, 1108044604430004, 'Zainal', 'Laki-Laki', 'Desa Pante', '5f4dcc3b5aa765d61d8327deb882cf99'),
	(3, 1108000000000000000, 'Adam', 'Laki-laki', 'Desa Matang', '5f4dcc3b5aa765d61d8327deb882cf99');

-- Dumping structure for table db_absensiku.tb_jadwal
CREATE TABLE IF NOT EXISTS `tb_jadwal` (
  `idj` int NOT NULL AUTO_INCREMENT,
  `hari` varchar(50) DEFAULT NULL,
  `jam` timestamp NULL DEFAULT NULL,
  `kelas` varchar(50) DEFAULT NULL,
  `guru` varchar(200) DEFAULT NULL,
  `mapel` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idj`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_absensiku.tb_jadwal: ~4 rows (approximately)
INSERT INTO `tb_jadwal` (`idj`, `hari`, `jam`, `kelas`, `guru`, `mapel`) VALUES
	(2, 'Selasa', '2023-12-24 09:03:58', 'III', 'Khairul Mizwar', 'Kitab Ibadah'),
	(3, 'Senin', '2023-12-24 09:04:00', 'III', 'Khairul Mizwar', 'Al-Qur&#039;an'),
	(4, 'Selasa', '2023-12-24 09:04:02', 'II', 'Adam', 'Al-Qur&#039;an'),
	(5, 'Senin', '2023-12-24 09:04:03', 'II', 'Zainal', 'Kitab Tauhid');

-- Dumping structure for table db_absensiku.tb_kelas
CREATE TABLE IF NOT EXISTS `tb_kelas` (
  `kode` int NOT NULL AUTO_INCREMENT,
  `namakelas` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`kode`)
) ENGINE=InnoDB AUTO_INCREMENT=109 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_absensiku.tb_kelas: ~4 rows (approximately)
INSERT INTO `tb_kelas` (`kode`, `namakelas`) VALUES
	(101, 'I'),
	(102, 'II'),
	(104, 'III'),
	(106, 'IV');

-- Dumping structure for table db_absensiku.tb_mapel
CREATE TABLE IF NOT EXISTS `tb_mapel` (
  `idm` int NOT NULL AUTO_INCREMENT,
  `mapel` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`idm`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_absensiku.tb_mapel: ~3 rows (approximately)
INSERT INTO `tb_mapel` (`idm`, `mapel`) VALUES
	(1, 'Al-Qur\'an'),
	(2, 'Kitab Tauhid'),
	(4, 'Kitab Ibadah');

-- Dumping structure for table db_absensiku.tb_santri
CREATE TABLE IF NOT EXISTS `tb_santri` (
  `ids` int NOT NULL AUTO_INCREMENT,
  `nik` bigint DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `jk` varchar(50) DEFAULT NULL,
  `kelas` varchar(50) DEFAULT NULL,
  `nohp` bigint DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `namaayah` varchar(50) DEFAULT NULL,
  `kerjaayah` varchar(50) DEFAULT NULL,
  `namaibu` varchar(50) DEFAULT NULL,
  `kerjaibu` varchar(50) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`ids`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_absensiku.tb_santri: ~1 rows (approximately)
INSERT INTO `tb_santri` (`ids`, `nik`, `nama`, `jk`, `kelas`, `nohp`, `alamat`, `namaayah`, `kerjaayah`, `namaibu`, `kerjaibu`, `password`) VALUES
	(4, 110802887763565536, 'Intan', 'Perempuan', 'III', 82256789019, 'Desa Mente', 'Soharto', 'PNS', 'Susanti', 'PNS', '5f4dcc3b5aa765d61d8327deb882cf99');

-- Dumping structure for table db_absensiku.tb_user
CREATE TABLE IF NOT EXISTS `tb_user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `username` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `level` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_absensiku.tb_user: ~5 rows (approximately)
INSERT INTO `tb_user` (`id`, `nama`, `username`, `password`, `level`) VALUES
	(1, 'Admin', 'admin@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 1),
	(2, 'Khairul Mizwar', 'mizwar@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 2),
	(3, 'Zahara', 'Zahara@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 3),
	(4, 'Nazila Fitria', 'nazilafitria447@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 3),
	(5, 'Miftahul Jannah', 'miftahul@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 3);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

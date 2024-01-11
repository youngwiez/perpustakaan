-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for perpus
CREATE DATABASE IF NOT EXISTS `perpus` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `perpus`;

-- Dumping structure for table perpus.anggota
CREATE TABLE IF NOT EXISTS `anggota` (
  `id_anggota` int(11) NOT NULL AUTO_INCREMENT,
  `kode_anggota` varchar(9) NOT NULL DEFAULT '',
  `nama_anggota` varchar(100) NOT NULL DEFAULT '',
  `jk_anggota` enum('L','P') NOT NULL,
  `kelas_anggota` enum('10','11','12') DEFAULT NULL,
  `jurusan_anggota` enum('SIJA','TFLM','KI','KA','DPIB','TOI','TEDK','TMPO','TBO','GP','TP','TITL','TKR','TBKR') NOT NULL,
  `no_telp_anggota` varchar(50) NOT NULL DEFAULT '0',
  `alamat_anggota` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_anggota`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table perpus.anggota: ~4 rows (approximately)
/*!40000 ALTER TABLE `anggota` DISABLE KEYS */;
INSERT INTO `anggota` (`id_anggota`, `kode_anggota`, `nama_anggota`, `jk_anggota`, `kelas_anggota`, `jurusan_anggota`, `no_telp_anggota`, `alamat_anggota`) VALUES
	(1, '0011', 'Muhammad Raka Andra Wisesa', 'L', '11', 'SIJA', '085877160617', 'Ngabean Wetan, Sleman'),
	(2, '0001', 'Jovanka Arya Dwi Praditya', 'L', '11', 'SIJA', '081238851120', 'Jaban, Sleman'),
	(4, '0004', 'Angel Novanda Putri Dwi Fitriani', 'P', '11', 'KA', '085641503956', 'Kalasan, Sleman');
/*!40000 ALTER TABLE `anggota` ENABLE KEYS */;

-- Dumping structure for table perpus.buku
CREATE TABLE IF NOT EXISTS `buku` (
  `id_buku` int(11) NOT NULL AUTO_INCREMENT,
  `kode_buku` varchar(50) NOT NULL DEFAULT '',
  `judul_buku` varchar(100) NOT NULL DEFAULT '',
  `penulis_buku` varchar(50) NOT NULL DEFAULT '',
  `penerbit_buku` varchar(50) NOT NULL DEFAULT '',
  `tahun_penerbit` varchar(50) NOT NULL DEFAULT '0',
  `stok` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_buku`),
  UNIQUE KEY `kode_buku` (`kode_buku`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table perpus.buku: ~5 rows (approximately)
/*!40000 ALTER TABLE `buku` DISABLE KEYS */;
INSERT INTO `buku` (`id_buku`, `kode_buku`, `judul_buku`, `penulis_buku`, `penerbit_buku`, `tahun_penerbit`, `stok`) VALUES
	(1, '0001', 'Pendidikan Pancasila dan Kewarganegaraan', 'Tedi Kholiludin', 'Kemendikbud RI', '2021', 98),
	(2, '0002', 'Telenovela', 'Andi Frimawan', 'Stembayo', '2023', 1001),
	(3, '0003', 'Buku Buku', 'Penulis', 'Penerbit', '2020', 99),
	(4, '0004', 'Buku', 'Aku', 'Aku', '2021', 99);
/*!40000 ALTER TABLE `buku` ENABLE KEYS */;

-- Dumping structure for table perpus.hobi
CREATE TABLE IF NOT EXISTS `hobi` (
  `hob` set('Membaca','Menulis','Menggambar','Main Musik') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table perpus.hobi: ~0 rows (approximately)
/*!40000 ALTER TABLE `hobi` DISABLE KEYS */;
/*!40000 ALTER TABLE `hobi` ENABLE KEYS */;

-- Dumping structure for table perpus.peminjaman
CREATE TABLE IF NOT EXISTS `peminjaman` (
  `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `id_buku` int(11) NOT NULL DEFAULT '0',
  `id_anggota` int(11) NOT NULL DEFAULT '0',
  `id_petugas` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_peminjaman`),
  KEY `FK_peminjaman_anggota` (`id_anggota`),
  KEY `FK_peminjaman_buku` (`id_buku`),
  KEY `FK_peminjaman_petugas` (`id_petugas`),
  CONSTRAINT `FK_peminjaman_anggota` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`),
  CONSTRAINT `FK_peminjaman_buku` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`),
  CONSTRAINT `FK_peminjaman_petugas` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table perpus.peminjaman: ~7 rows (approximately)
/*!40000 ALTER TABLE `peminjaman` DISABLE KEYS */;
INSERT INTO `peminjaman` (`id_peminjaman`, `tgl_pinjam`, `tgl_kembali`, `id_buku`, `id_anggota`, `id_petugas`) VALUES
	(1, '2023-05-01', '2023-05-01', 1, 2, 2),
	(2, '2023-05-01', '2023-05-01', 2, 4, 2),
	(3, '2023-05-01', '2023-05-08', 1, 2, 1),
	(4, '2023-04-08', '2023-05-08', 4, 4, 2),
	(5, '2023-05-08', '2023-05-08', 3, 2, 1),
	(6, '2023-05-29', '2023-05-29', 2, 2, 3),
	(7, '2023-05-29', '2023-05-29', 1, 4, 1);
/*!40000 ALTER TABLE `peminjaman` ENABLE KEYS */;

-- Dumping structure for table perpus.pengembalian
CREATE TABLE IF NOT EXISTS `pengembalian` (
  `id_pengembalian` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_pengembalian` date NOT NULL,
  `denda` int(11) DEFAULT '0',
  `id_buku` int(11) NOT NULL DEFAULT '0',
  `id_anggota` int(11) NOT NULL DEFAULT '0',
  `id_petugas` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_pengembalian`),
  KEY `FK_pengembalian_anggota` (`id_anggota`),
  KEY `FK_pengembalian_buku` (`id_buku`),
  KEY `FK_pengembalian_petugas` (`id_petugas`),
  CONSTRAINT `FK_pengembalian_anggota` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`),
  CONSTRAINT `FK_pengembalian_buku` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`),
  CONSTRAINT `FK_pengembalian_petugas` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table perpus.pengembalian: ~2 rows (approximately)
/*!40000 ALTER TABLE `pengembalian` DISABLE KEYS */;
INSERT INTO `pengembalian` (`id_pengembalian`, `tgl_pengembalian`, `denda`, `id_buku`, `id_anggota`, `id_petugas`) VALUES
	(1, '2023-05-05', 0, 2, 4, 2),
	(2, '2023-05-08', 0, 1, 2, 1),
	(3, '2023-05-29', 0, 1, 2, 2);
/*!40000 ALTER TABLE `pengembalian` ENABLE KEYS */;

-- Dumping structure for table perpus.petugas
CREATE TABLE IF NOT EXISTS `petugas` (
  `id_petugas` int(11) NOT NULL AUTO_INCREMENT,
  `nama_petugas` varchar(50) NOT NULL DEFAULT '',
  `jabatan_petugas` varchar(50) NOT NULL DEFAULT '',
  `no_telp_petugas` varchar(50) NOT NULL DEFAULT '0',
  `alamat_petugas` varchar(100) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_petugas`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table perpus.petugas: ~0 rows (approximately)
/*!40000 ALTER TABLE `petugas` DISABLE KEYS */;
INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `jabatan_petugas`, `no_telp_petugas`, `alamat_petugas`) VALUES
	(1, 'Budianto', 'Staff Perpustakaan', '081256782345', 'Kotagede, Yogyakarta'),
	(2, 'Banuuuu', 'Kabeng', '0812345679', 'Yogyakarta'),
	(3, 'saya', 'jubeng', '0812345679', 'Yogyakarta');
/*!40000 ALTER TABLE `petugas` ENABLE KEYS */;

-- Dumping structure for table perpus.rak
CREATE TABLE IF NOT EXISTS `rak` (
  `id_rak` int(11) NOT NULL AUTO_INCREMENT,
  `nama_rak` varchar(50) NOT NULL DEFAULT '',
  `lokasi_rak` varchar(50) NOT NULL DEFAULT '',
  `id_buku` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_rak`),
  KEY `FK_rak_buku` (`id_buku`),
  CONSTRAINT `FK_rak_buku` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table perpus.rak: ~0 rows (approximately)
/*!40000 ALTER TABLE `rak` DISABLE KEYS */;
INSERT INTO `rak` (`id_rak`, `nama_rak`, `lokasi_rak`, `id_buku`) VALUES
	(1, 'Buku Pelajaran', 'Baris 12', 1);
/*!40000 ALTER TABLE `rak` ENABLE KEYS */;

-- Dumping structure for table perpus.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL DEFAULT '',
  `username` varchar(50) NOT NULL DEFAULT '',
  `password` varchar(50) NOT NULL DEFAULT '',
  `level` enum('admin','anggota') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table perpus.user: ~4 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `nama`, `username`, `password`, `level`) VALUES
	(1, 'Muhammad Raka', 'raka', '13685e6d6e35eddae65f413f27d5578d', 'admin'),
	(2, 'Jovanka Arya', 'jovanka', '3dad04402e1206cb7153a4b7b6c290a4', 'anggota'),
	(3, 'Angel Novanda', 'angel', 'ab1dbd386662b62477b62087a389256a', 'anggota'),
	(4, 'saya', 'saya', '96a0dead881b8e2368157ccb08f76d74', 'admin'),
	(6, 'Muhammad', 'muhammad', 'fe32ba716da32cfec701c5fda1038d0c', 'anggota');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

-- Dumping structure for trigger perpus.kembali_success
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `kembali_success` BEFORE INSERT ON `pengembalian` FOR EACH ROW BEGIN
	UPDATE buku SET buku.stok = buku.stok + 1 WHERE buku.id_buku = NEW.id_buku;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Dumping structure for trigger perpus.pinjam_success
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `pinjam_success` BEFORE INSERT ON `peminjaman` FOR EACH ROW BEGIN
	UPDATE buku SET buku.stok = buku.stok - 1 WHERE buku.id_buku = NEW.id_buku;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

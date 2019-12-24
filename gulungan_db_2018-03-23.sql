# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.6.35)
# Database: gulungan_db
# Generation Time: 2018-03-23 04:14:38 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table akses
# ------------------------------------------------------------

DROP TABLE IF EXISTS `akses`;

CREATE TABLE `akses` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `akses` varchar(255) DEFAULT NULL,
  `parent` int(3) DEFAULT NULL,
  `href` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `akses` WRITE;
/*!40000 ALTER TABLE `akses` DISABLE KEYS */;

INSERT INTO `akses` (`id`, `akses`, `parent`, `href`, `icon`)
VALUES
	(1,'Client',0,'Client','glyphicon glyphicon-user'),
	(2,'Admin',0,'Admin','fa fa-table menu-item-icon'),
	(3,'Asuransi',0,'Asuransi','glyphicon glyphicon-th-large'),
	(4,'Viewer',0,'Viewer','glyphicon glyphicon-file'),
	(5,'Setting',0,'Setting','glyphicon glyphicon-cog'),
	(6,'Penutupan Satuan',1,'PenutupanSatuan',NULL),
	(7,'Penutupan Kumpulan',1,'PenutupanKumpulan',NULL),
	(8,'Data Klaim',1,'DataKlaim',NULL),
	(9,'Data Refund',1,'DataRefund',NULL),
	(10,'Form Upload Dokumen',2,'FormUploadDokumen',NULL),
	(11,'Form Approve Dokumen',2,'FormApproveDokumen',NULL),
	(12,'Form Update Dokumen',3,'FormUpdateDokumen',NULL),
	(13,'Report Dokumen',4,'ViewerDokumenReport',NULL),
	(14,'Akses User',5,'settinguser',NULL),
	(15,'Configuration',5,'Configuration',NULL);

/*!40000 ALTER TABLE `akses` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table akses_user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `akses_user`;

CREATE TABLE `akses_user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `akses` int(3) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `akses_user` WRITE;
/*!40000 ALTER TABLE `akses_user` DISABLE KEYS */;

INSERT INTO `akses_user` (`id`, `akses`, `name`)
VALUES
	(32,0,'admin'),
	(33,6,'admin'),
	(34,7,'admin'),
	(35,8,'admin'),
	(36,9,'admin'),
	(37,10,'admin'),
	(38,11,'admin'),
	(39,12,'admin'),
	(40,13,'admin'),
	(41,14,'admin'),
	(42,1,'admin'),
	(43,2,'admin'),
	(44,3,'admin'),
	(45,4,'admin'),
	(46,5,'admin'),
	(57,6,'andrew'),
	(58,7,'andrew'),
	(59,8,'andrew'),
	(60,9,'andrew'),
	(61,1,'andrew'),
	(62,10,'andrew'),
	(63,11,'andrew'),
	(64,2,'andrew'),
	(65,12,'andrew'),
	(66,3,'andrew'),
	(71,1,'client1'),
	(72,6,'client1'),
	(73,7,'client1'),
	(74,8,'client1'),
	(75,9,'client1'),
	(76,4,'client1'),
	(77,13,'client1'),
	(94,3,'asuransi2'),
	(95,12,'asuransi2'),
	(96,4,'asuransi2'),
	(97,13,'asuransi2'),
	(98,3,'asuransi1'),
	(99,12,'asuransi1'),
	(100,4,'asuransi1'),
	(101,13,'asuransi1');

/*!40000 ALTER TABLE `akses_user` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table leasing_dokumens
# ------------------------------------------------------------

DROP TABLE IF EXISTS `leasing_dokumens`;

CREATE TABLE `leasing_dokumens` (
  `id_leasing_dokumen` int(11) NOT NULL AUTO_INCREMENT,
  `testing` varchar(255) NOT NULL DEFAULT '',
  `testing2` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_leasing_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `leasing_dokumens` WRITE;
/*!40000 ALTER TABLE `leasing_dokumens` DISABLE KEYS */;

INSERT INTO `leasing_dokumens` (`id_leasing_dokumen`, `testing`, `testing2`)
VALUES
	(1,'asdasd','asdad'),
	(13,'12000000','Coba Testing'),
	(14,'12000000','Coba Testing'),
	(15,'12000000','Coba Testing'),
	(16,'12000000','Coba Testing'),
	(17,'12000000','Coba Testing'),
	(18,'12000000','Coba Testing'),
	(19,'12000000','Coba Testing'),
	(20,'12000000','Coba Testing'),
	(21,'12000000','Coba Testing'),
	(22,'12000000','Coba Testing'),
	(23,'12000000','Coba Testing'),
	(24,'12000000','Coba Testing'),
	(25,'12000000','Coba Testing'),
	(26,'12000000','Coba Testing'),
	(27,'12000000','Coba Testing'),
	(28,'12000000','Coba Testing'),
	(29,'12000000','Coba Testing'),
	(30,'12000000','Coba Testing'),
	(31,'12000000','Coba Testing'),
	(32,'12000000','Coba Testing'),
	(33,'12000000','Coba Testing'),
	(34,'12000000','Coba Testing'),
	(35,'12000000','Coba Testing'),
	(36,'12000000','Coba Testing'),
	(37,'12000000','Coba Testing'),
	(38,'12000000','Coba Testing'),
	(39,'12000000','Coba Testing');

/*!40000 ALTER TABLE `leasing_dokumens` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table master_asuransi
# ------------------------------------------------------------

DROP TABLE IF EXISTS `master_asuransi`;

CREATE TABLE `master_asuransi` (
  `id_asuransi` varchar(11) NOT NULL DEFAULT '',
  `nama_asuransi` text NOT NULL,
  `alamat_asuransi` text NOT NULL,
  `telp_asuransi` varchar(25) DEFAULT NULL,
  `email_asuransi` varchar(25) DEFAULT NULL,
  `discount` double DEFAULT NULL,
  PRIMARY KEY (`id_asuransi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `master_asuransi` WRITE;
/*!40000 ALTER TABLE `master_asuransi` DISABLE KEYS */;

INSERT INTO `master_asuransi` (`id_asuransi`, `nama_asuransi`, `alamat_asuransi`, `telp_asuransi`, `email_asuransi`, `discount`)
VALUES
	('AS001','PT KSK Insurance Indonesia','Centennial Tower Lantai 15 Unit E-G, Jl. Jend. Gatot Subroto Kav. 24 & 25, Karet Semanggi, Setiabudi, RT.2/RW.2, Karet Semanggi, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12930','(62-21) 270 0590/600 ','magline@mag.co.id',0.9),
	('AS002','PT Multi Artha Guna (MAG)','The City Center Batavia Tower One Lt. 17 Jl. K.H. Mas Mansyur Kav. 126 Karet Tengsin, Tanah Abang – Jakarta Pusat 10220','(021) 22958080','info@kskgroup.com',0.9);

/*!40000 ALTER TABLE `master_asuransi` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table master_asuransi_cabang
# ------------------------------------------------------------

DROP TABLE IF EXISTS `master_asuransi_cabang`;

CREATE TABLE `master_asuransi_cabang` (
  `id_asuransi_cabang` varchar(11) NOT NULL DEFAULT '',
  `nama_as_cabang` text,
  `alamat_as_cabang` text,
  `telp_as_cabang` varchar(25) DEFAULT NULL,
  `email_as_cabang` varchar(25) DEFAULT NULL,
  `id_asuransi` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`id_asuransi_cabang`),
  KEY `id_asuransi` (`id_asuransi`),
  CONSTRAINT `master_asuransi_cabang_ibfk_1` FOREIGN KEY (`id_asuransi`) REFERENCES `master_asuransi` (`id_asuransi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `master_asuransi_cabang` WRITE;
/*!40000 ALTER TABLE `master_asuransi_cabang` DISABLE KEYS */;

INSERT INTO `master_asuransi_cabang` (`id_asuransi_cabang`, `nama_as_cabang`, `alamat_as_cabang`, `telp_as_cabang`, `email_as_cabang`, `id_asuransi`)
VALUES
	('ASCAB001','BOGOR','Jl. Bogor','0219999999','admin@cab-mag.com','AS001'),
	('ASCAB002','SUKABUMI','Jl. Sukabumi','0219999999','admin@cab-mag.com','AS001'),
	('ASCAB003','SUBANG','Jl. Subang','0219999999','admin@cab-mag.com','AS001');

/*!40000 ALTER TABLE `master_asuransi_cabang` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table master_kode_plat
# ------------------------------------------------------------

DROP TABLE IF EXISTS `master_kode_plat`;

CREATE TABLE `master_kode_plat` (
  `id_plat` int(11) NOT NULL AUTO_INCREMENT,
  `kode_plat` varchar(255) NOT NULL DEFAULT '',
  `wilayah` varchar(255) NOT NULL DEFAULT '',
  `kota` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_plat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `master_kode_plat` WRITE;
/*!40000 ALTER TABLE `master_kode_plat` DISABLE KEYS */;

INSERT INTO `master_kode_plat` (`id_plat`, `kode_plat`, `wilayah`, `kota`)
VALUES
	(1,'A','2','BANTEN'),
	(2,'AA','3','KEDU'),
	(3,'AB','3','YOGYAKARTA'),
	(4,'AD','3','SURAKARTA'),
	(5,'AE','3','MADIUN'),
	(6,'AG','3','KEDIRI'),
	(7,'B','2','JAKARTA'),
	(8,'BA','1','SUMATERA BARAT'),
	(9,'BB','1','SUMATERA UTARA'),
	(10,'BD','1','BENGKULU'),
	(11,'BE','1','LAMPUNG'),
	(12,'BG','1','SUMATERA SELATAN'),
	(13,'BH','1','JAMBI'),
	(14,'BK','1','SUMATERA UTARA'),
	(15,'BL','1','ACEH'),
	(16,'BM','1','RIAU'),
	(17,'BN','1','BANGKA'),
	(18,'BP','1','RIAU ISLANDS'),
	(19,'BP','1','RIAU ISLANDS'),
	(20,'CC','3','KORPS KONSUL'),
	(21,'CD','3','KORPS DIPLOMATIK'),
	(22,'D','2','BANDUNG'),
	(23,'DA','3','KALIMANTAN SELATAN'),
	(24,'DB','3','MINAHASA'),
	(25,'DD','3','SULAWESI SELATAN'),
	(26,'DE','3','MALUKU SELATAN'),
	(27,'DG','3','MALUKU UTARA'),
	(28,'DH','3','MALUKU TIMUR'),
	(29,'DK','3','BALI'),
	(30,'DL','3','SANGIHE/TALAUD'),
	(31,'DM','3','SULAWESI UTARA'),
	(32,'DN','3','SULAWESI TENGAH'),
	(33,'DR','3','LOMBOK'),
	(34,'DS','3','PAPUA'),
	(35,'E','2','CIREBON'),
	(36,'EA','3','SUMBAWA'),
	(37,'EB','3','FLORES'),
	(38,'ED','3','SUMBA'),
	(39,'F','2','BOGOR'),
	(40,'G','3','PEKALONGAN'),
	(41,'H','3','SEMARANG'),
	(42,'K','3','PATI'),
	(43,'KB','3','KALIMANTAN BARAT'),
	(44,'KT','3','KALIMANTAN TIMUR'),
	(45,'L','3','SURABAYA'),
	(46,'M','3','MADURA'),
	(47,'N','3','MALANG'),
	(48,'P','3','BESUKI'),
	(49,'R','3','BANYUMAS'),
	(50,'S','3','BOJONEGORO'),
	(51,'T','2','KARAWANG'),
	(52,'W','3','SIDOARJO'),
	(53,'Z','2','TASIKMALAYA');

/*!40000 ALTER TABLE `master_kode_plat` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table master_leasing
# ------------------------------------------------------------

DROP TABLE IF EXISTS `master_leasing`;

CREATE TABLE `master_leasing` (
  `id_leasing` varchar(11) NOT NULL DEFAULT '',
  `nama_leasing` text NOT NULL,
  `alamat_leasing` text NOT NULL,
  `telp_leasing` varchar(25) DEFAULT NULL,
  `email_leasing` varchar(25) DEFAULT NULL,
  `fee` double DEFAULT NULL,
  `grossnett` double DEFAULT NULL,
  PRIMARY KEY (`id_leasing`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `master_leasing` WRITE;
/*!40000 ALTER TABLE `master_leasing` DISABLE KEYS */;

INSERT INTO `master_leasing` (`id_leasing`, `nama_leasing`, `alamat_leasing`, `telp_leasing`, `email_leasing`, `fee`, `grossnett`)
VALUES
	('LS001','PT Buana Sejahtera Multidana (BSM)','Jl. Letjen S. Parman No.Grand Slipi Tower Lt. 32 Jl. Letjend S. Parman Kav. 22 - 24, RT.1/RW.4, Slipi, Palmerah, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11480','02129022050','admin@buanasejahtera.com',0.13,25);

/*!40000 ALTER TABLE `master_leasing` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table master_leasing_cabang
# ------------------------------------------------------------

DROP TABLE IF EXISTS `master_leasing_cabang`;

CREATE TABLE `master_leasing_cabang` (
  `id_leasing_cabang` varchar(11) NOT NULL DEFAULT '',
  `nama_ls_cabang` varchar(50) NOT NULL DEFAULT '',
  `alamat_ls_cabang` varchar(255) NOT NULL DEFAULT '',
  `telp_ls_cabang` varchar(25) DEFAULT NULL,
  `email_ls_cabang` varchar(25) DEFAULT NULL,
  `id_leasing` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_leasing_cabang`),
  KEY `id_leasing` (`id_leasing`),
  CONSTRAINT `master_leasing_cabang_ibfk_1` FOREIGN KEY (`id_leasing`) REFERENCES `master_leasing` (`id_leasing`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `master_leasing_cabang` WRITE;
/*!40000 ALTER TABLE `master_leasing_cabang` DISABLE KEYS */;

INSERT INTO `master_leasing_cabang` (`id_leasing_cabang`, `nama_ls_cabang`, `alamat_ls_cabang`, `telp_ls_cabang`, `email_ls_cabang`, `id_leasing`)
VALUES
	('LSCAB001','CIBINONG','Lorem Ipsum','029124931','cibinong@gmail.com','LS001'),
	('LSCAB002','SUKABUMI','',NULL,NULL,'LS001'),
	('LSCAB003','PASAR MINGGU','',NULL,NULL,'LS001'),
	('LSCAB004','BOGOR','',NULL,NULL,'LS001'),
	('LSCAB005','SUBANG','',NULL,NULL,'LS001'),
	('LSCAB006','CIMAHI','',NULL,NULL,'LS001'),
	('LSCAB007','KUNINGAN','',NULL,NULL,'LS001'),
	('LSCAB008','LEMBANG','',NULL,NULL,'LS001'),
	('LSCAB009','CIAMIS','',NULL,NULL,'LS001'),
	('LSCAB010','BANDUNG TENGAH','',NULL,NULL,'LS001'),
	('LSCAB011','SOLO','',NULL,NULL,'LS001'),
	('LSCAB012','MADIUN','',NULL,NULL,'LS001'),
	('LSCAB013','SEMARANG','',NULL,NULL,'LS001'),
	('LSCAB014','JOGJAKARTA','',NULL,NULL,'LS001'),
	('LSCAB015','KARAWANG','',NULL,NULL,'LS001'),
	('LSCAB016','TEGAL','',NULL,NULL,'LS001'),
	('LSCAB017','PONDOK GEDE','',NULL,NULL,'LS001'),
	('LSCAB018','BANDUNG TIMUR','',NULL,NULL,'LS001'),
	('LSCAB019','PURWAKARTA','',NULL,NULL,'LS001');

/*!40000 ALTER TABLE `master_leasing_cabang` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table master_leasing_depresiasi
# ------------------------------------------------------------

DROP TABLE IF EXISTS `master_leasing_depresiasi`;

CREATE TABLE `master_leasing_depresiasi` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_leasing` varchar(11) DEFAULT NULL,
  `persen_depres` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `master_leasing_depresiasi` WRITE;
/*!40000 ALTER TABLE `master_leasing_depresiasi` DISABLE KEYS */;

INSERT INTO `master_leasing_depresiasi` (`id`, `id_leasing`, `persen_depres`)
VALUES
	(1,'LS001','100,85,70,60');

/*!40000 ALTER TABLE `master_leasing_depresiasi` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table master_product
# ------------------------------------------------------------

DROP TABLE IF EXISTS `master_product`;

CREATE TABLE `master_product` (
  `id_product` varchar(11) NOT NULL DEFAULT '',
  `nama` varchar(255) NOT NULL DEFAULT '',
  `jenis` varchar(255) NOT NULL DEFAULT '',
  `keterangan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_product`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table master_rate_allrisk
# ------------------------------------------------------------

DROP TABLE IF EXISTS `master_rate_allrisk`;

CREATE TABLE `master_rate_allrisk` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `kategori` int(11) DEFAULT NULL,
  `range` varchar(255) DEFAULT '',
  `rate_wilayah_1` double DEFAULT NULL,
  `rate_wilayah_2` double DEFAULT NULL,
  `rate_wilayah_3` double DEFAULT NULL,
  `kelas` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `master_rate_allrisk` WRITE;
/*!40000 ALTER TABLE `master_rate_allrisk` DISABLE KEYS */;

INSERT INTO `master_rate_allrisk` (`id`, `kategori`, `range`, `rate_wilayah_1`, `rate_wilayah_2`, `rate_wilayah_3`, `kelas`)
VALUES
	(1,1,'0TO125',4.07,3.69,2.78,'A'),
	(2,2,'125TO200',2.92,2.72,2.32,'A'),
	(3,3,'200TO400',1.96,1.96,1.65,'A'),
	(4,4,'400T0800',1.45,1.45,1.45,'A'),
	(5,5,'UPTO800',1.3,1.3,1.3,'A'),
	(6,6,'NO RANGE',1.58,1.58,1.58,'C'),
	(7,7,'NO RANGE',0.96,0.96,0.96,'B');

/*!40000 ALTER TABLE `master_rate_allrisk` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table master_rate_tlo
# ------------------------------------------------------------

DROP TABLE IF EXISTS `master_rate_tlo`;

CREATE TABLE `master_rate_tlo` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `kategori` int(11) DEFAULT NULL,
  `range` varchar(255) DEFAULT '',
  `rate_wilayah_1` double DEFAULT NULL,
  `rate_wilayah_2` double DEFAULT NULL,
  `rate_wilayah_3` double DEFAULT NULL,
  `kelas` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `master_rate_tlo` WRITE;
/*!40000 ALTER TABLE `master_rate_tlo` DISABLE KEYS */;

INSERT INTO `master_rate_tlo` (`id`, `kategori`, `range`, `rate_wilayah_1`, `rate_wilayah_2`, `rate_wilayah_3`, `kelas`)
VALUES
	(1,1,'0TO125',0.72,0.9,0.76,'A'),
	(2,2,'125TO200',0.88,0.69,0.69,'A'),
	(3,3,'200TO400',0.66,0.63,0.54,'A'),
	(4,4,'400T0800',0.5,0.5,0.48,'A'),
	(5,5,'UPTO800',0.45,0.5,0.48,'A'),
	(6,6,'NO RANGE',0.78,1.93,1.06,'C'),
	(7,7,'NO RANGE',0.45,0.48,0.43,'B');

/*!40000 ALTER TABLE `master_rate_tlo` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table master_user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `master_user`;

CREATE TABLE `master_user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `posisi` int(1) DEFAULT NULL,
  `nama_lengkap` text,
  `perusahaan` varchar(30) DEFAULT NULL,
  `cabang` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `password` text,
  `keterangan` text,
  `email` varchar(255) DEFAULT NULL,
  `akses_user` varchar(255) DEFAULT NULL,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` datetime(6) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `perusahaan` (`perusahaan`),
  KEY `cabang` (`cabang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `master_user` WRITE;
/*!40000 ALTER TABLE `master_user` DISABLE KEYS */;

INSERT INTO `master_user` (`id`, `posisi`, `nama_lengkap`, `perusahaan`, `cabang`, `name`, `password`, `keterangan`, `email`, `akses_user`, `updated_at`, `created_at`, `remember_token`)
VALUES
	(1,1,'Admin User','LS001','LSCAB001','admin','$2y$10$2f7ysAhyswef4uaes3DkO.tDfQWoIPFV2m9HZxwwbvRODQGjmWHqy',NULL,'danangroesmanto@gmail.com',NULL,'2018-03-16 09:21:50',NULL,'0KfTztKpSPEepKp5fSiefJgTLAyqsvXqdqyjapLuPaSmZiuiHemZpJYTa705'),
	(2,1,'Andrew Demo User','LS001','LSCAB001','andrew','$2y$10$hY7Yy8Y4TK.Cg8FL58ymVuK2LtJzM5keyXYSxYXZYIsqMRdZA4/TS','ok','andrew@mitrafin.co.id',NULL,'2018-03-01 10:10:38',NULL,'qa4wz3fe6UYn1hjri1RZnhcFwH3XrZdNVRLb2aggZOoNBeqS4isOb0vZnFAo'),
	(3,3,'Asuransi Demo','AS001','0','asuransi1','$2y$10$Qt3I/qP5bTN6XtVHwdReUOduNPERpnJlw7hRpz/ox2rpvsk1dfSje',NULL,'asuransi@demo.com',NULL,'2018-03-22 16:36:29',NULL,'LdgVuBTJyJM45u46ZOwCX3vgxYDoDBDHyw69wAYrHReZj0XerbMGdS5ncXQy'),
	(4,1,'Client Demo','LS001','LSCAB001','client1','$2y$10$GNryVDko6pe5P8gOiX5D9uGMI/lth/azNyWnATMBKHbvLed98gptq',NULL,'client@demo.com',NULL,'2018-02-28 18:18:48',NULL,'FrCN7fbVCYVljILrP7BauqMkc5lUaJizOJU0vz4Aoi9XLM1RdtJsZyR9fTz0'),
	(5,3,'Asuransi Demo MAG','AS002','0','asuransi2','$2y$10$kUz5QAmvyx9y3oaHUdEnjO2iGKN/D/OZvRKtHdIaQEJFM73hgWlBa',NULL,'mag@gmail.com',NULL,'2018-03-22 16:36:19',NULL,NULL);

/*!40000 ALTER TABLE `master_user` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table posisi
# ------------------------------------------------------------

DROP TABLE IF EXISTS `posisi`;

CREATE TABLE `posisi` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `posisi` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `posisi` WRITE;
/*!40000 ALTER TABLE `posisi` DISABLE KEYS */;

INSERT INTO `posisi` (`id`, `posisi`)
VALUES
	(1,'Client'),
	(2,'Admin'),
	(3,'Asuransi');

/*!40000 ALTER TABLE `posisi` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table proses_produksi
# ------------------------------------------------------------

DROP TABLE IF EXISTS `proses_produksi`;

CREATE TABLE `proses_produksi` (
  `id_proses` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `no_proses` decimal(10,0) NOT NULL,
  `nama_proses` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_proses`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `proses_produksi` WRITE;
/*!40000 ALTER TABLE `proses_produksi` DISABLE KEYS */;

INSERT INTO `proses_produksi` (`id_proses`, `no_proses`, `nama_proses`)
VALUES
	(1,0,'UPLOAD'),
	(2,1,'APPROVE'),
	(3,2,'UPDATED'),
	(4,3,'FINISH');

/*!40000 ALTER TABLE `proses_produksi` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table status_produksi
# ------------------------------------------------------------

DROP TABLE IF EXISTS `status_produksi`;

CREATE TABLE `status_produksi` (
  `id_status` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `no_status` decimal(10,0) NOT NULL,
  `nama_status` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `status_produksi` WRITE;
/*!40000 ALTER TABLE `status_produksi` DISABLE KEYS */;

INSERT INTO `status_produksi` (`id_status`, `no_status`, `nama_status`)
VALUES
	(1,1,'NOT VALID'),
	(2,2,'VALID'),
	(3,3,'PUBLISHED');

/*!40000 ALTER TABLE `status_produksi` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table status_proses
# ------------------------------------------------------------

DROP TABLE IF EXISTS `status_proses`;

CREATE TABLE `status_proses` (
  `id_proses` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nama_proses` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_proses`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `status_proses` WRITE;
/*!40000 ALTER TABLE `status_proses` DISABLE KEYS */;

INSERT INTO `status_proses` (`id_proses`, `nama_proses`)
VALUES
	(1,'UPLOAD'),
	(2,'APPROVE'),
	(3,'UPDATED'),
	(4,'FINISH');

/*!40000 ALTER TABLE `status_proses` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table table_produksi
# ------------------------------------------------------------

DROP TABLE IF EXISTS `table_produksi`;

CREATE TABLE `table_produksi` (
  `id_prod` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `no_pin` varchar(255) NOT NULL DEFAULT '',
  `cabang` varchar(255) NOT NULL DEFAULT '',
  `nama_nasabah` text NOT NULL,
  `plafon` int(11) NOT NULL,
  `tgl_booking` date DEFAULT NULL,
  `merk` varchar(25) NOT NULL DEFAULT '',
  `tipe` text NOT NULL,
  `kategori` varchar(5) NOT NULL DEFAULT '',
  `jenis_asuransi` varchar(25) NOT NULL DEFAULT '',
  `warna` varchar(255) DEFAULT NULL,
  `model_kend` text NOT NULL,
  `no_rangka` varchar(100) NOT NULL DEFAULT '',
  `no_mesin` varchar(100) NOT NULL DEFAULT '',
  `no_polisi` varchar(25) NOT NULL DEFAULT '',
  `no_bpkb` varchar(25) NOT NULL DEFAULT '',
  `tahun` int(11) NOT NULL,
  `tenor` decimal(10,0) NOT NULL,
  `rate` double NOT NULL,
  `premi` int(11) NOT NULL,
  `premi_admin` int(11) DEFAULT NULL,
  `jenis_kendaraan` varchar(255) NOT NULL DEFAULT '',
  `wilayah` text NOT NULL,
  `tgl_upload` date DEFAULT NULL,
  `tgl_approve` date DEFAULT NULL,
  `status_perpanjangan` varchar(255) DEFAULT NULL,
  `status_proses` int(11) DEFAULT NULL,
  `status_produksi` int(11) DEFAULT NULL,
  `status_pinjaman` varchar(10) DEFAULT NULL,
  `jenis_penutupan` varchar(255) DEFAULT NULL,
  `premi_pertahun` text,
  `premi_sekaligus` int(11) DEFAULT NULL,
  `no_sertifikat` varchar(255) DEFAULT NULL,
  `id_master_leasing` varchar(255) DEFAULT NULL,
  `id_master_leasing_cabang` varchar(255) DEFAULT NULL,
  `id_master_asuransi` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_prod`),
  KEY `id_master_leasing` (`id_master_leasing`),
  KEY `id_master_asuransi` (`id_master_asuransi`),
  KEY `id_master_leasing_cabang` (`id_master_leasing_cabang`),
  CONSTRAINT `table_produksi_ibfk_1` FOREIGN KEY (`id_master_leasing`) REFERENCES `master_leasing` (`id_leasing`) ON DELETE CASCADE,
  CONSTRAINT `table_produksi_ibfk_2` FOREIGN KEY (`id_master_asuransi`) REFERENCES `master_asuransi` (`id_asuransi`) ON DELETE CASCADE,
  CONSTRAINT `table_produksi_ibfk_3` FOREIGN KEY (`id_master_leasing_cabang`) REFERENCES `master_leasing_cabang` (`id_leasing_cabang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `table_produksi` WRITE;
/*!40000 ALTER TABLE `table_produksi` DISABLE KEYS */;

INSERT INTO `table_produksi` (`id_prod`, `no_pin`, `cabang`, `nama_nasabah`, `plafon`, `tgl_booking`, `merk`, `tipe`, `kategori`, `jenis_asuransi`, `warna`, `model_kend`, `no_rangka`, `no_mesin`, `no_polisi`, `no_bpkb`, `tahun`, `tenor`, `rate`, `premi`, `premi_admin`, `jenis_kendaraan`, `wilayah`, `tgl_upload`, `tgl_approve`, `status_perpanjangan`, `status_proses`, `status_produksi`, `status_pinjaman`, `jenis_penutupan`, `premi_pertahun`, `premi_sekaligus`, `no_sertifikat`, `id_master_leasing`, `id_master_leasing_cabang`, `id_master_asuransi`)
VALUES
	(1,'001-00923','PASAR MINGGU','TITIN SUMIATIN',20000000,'2018-02-26','TOYOTA','COROLLA 1.600 AE 111 MT','1','TLO','HITAM','SEDAN','MHF53AEB109511219','4AL204448','F 1521 IZ','N05937860',1996,12,0.9,180000,180000,'PASSANGER','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','180000',180000,NULL,'LS001','LSCAB003','AS001'),
	(2,'001-00924','PASAR MINGGU','IMRON MIFTAHUL FIRDAUS',40000000,'2018-02-26','TOYOTA','CAMRY 2400 AT','1','TLO','HITAM METALIK','SEDAN','MR053BK3045500555','2AZ3135961','B 1179 Z','D1936056G',2004,36,0.9,360000,360000,'PASSANGER','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','360000,306000,252000',918000,NULL,'LS001','LSCAB003','AS001'),
	(3,'006-01466','SUBANG','MAY MAESAROH',95000000,'2018-02-26','TOYOTA','NEW AVANZA 1.3E MT','1','TLO','SILVER METALIK','MINIBUS','MHKM1BA2JEJ001918','K3MF02124','B 1447 FOP','L07851785',2014,36,0.9,855000,855000,'PASSANGER','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','855000,726750,598500',2180250,NULL,'LS001','LSCAB005','AS001'),
	(4,'006-01467','SUBANG','CASINAH',56000000,'2018-02-26','SUZUKI','GC415 T (APV PICKUP)','6','TLO','PUTIH','PICKUP','MHYGDN41TEJ414445','G15AID332649','T 8742 DP','L01258560',2014,36,1.93,1080800,1080800,'COMMERCIAL','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','1080800,918680,756560',2756040,NULL,'LS001','LSCAB005','AS001'),
	(5,'012-01047','LEMBANG','RINA EKAWATI',55000000,'2018-02-26','HONDA','CR-V RD 4 2WD AT','1','TLO','ABU ABU MUDA METALIK','JEEP','MHRRD48602K002469','K20A51003726','D 69 R','K06392947',2003,36,0.9,495000,495000,'PASSANGER','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','495000,420750,346500',1262250,NULL,'LS001','LSCAB008','AS001'),
	(6,'015-01084','BANDUNG TIMUR','ERNI SUSILAWATI',100000000,'2018-02-26','TOYOTA','RUSH 1.5G F700 RE GMDFJ','1','TLO','HITAM METALIK','MINIBUS','MHFE2CJ2J9K012074','DBH8721','Z 1737 AE','G1196510',2009,36,0.9,900000,900000,'PASSANGER','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','900000,765000,630000',2295000,NULL,'LS001','LSCAB018','AS001'),
	(7,'015-01086','BANDUNG TIMUR','EDIH',35000000,'2018-02-26','MITSUBISHI','FE 349','6','TLO','KUNING','TRUCK','MHMFE349E1R024830','4D34194832','D 8697 CE','C0420636H',2001,24,1.93,675500,675500,'COMMERCIAL','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','675500,574175',1249675,NULL,'LS001','LSCAB018','AS001'),
	(8,'017-00678','TEGAL','DAHORI',70000000,'2018-02-26','DAIHATSU','LUXIO 1.5 X ABS M/T S402RG-ZM','1','TLO','HITAM METALIK','MINIBUS','MHKW3CA3J9K000139','DBD5685','E 1748 BL','F6332603H',2009,36,0.9,630000,630000,'PASSANGER','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','630000,535500,441000',1606500,NULL,'LS001','LSCAB016','AS001'),
	(9,'018-01111','BANDUNG TENGAH','ACEP RUSMANA',48000000,'2018-02-26','MITSUBISHI','COLT T120SS PU 1.5 FD-R (4X2)','6','TLO','HITAM','PICKUP','MHMU5TU2EDK118677','4G15J93273','D 8699 XS','K06336275',2013,36,1.93,926400,926400,'COMMERCIAL','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','926400,787440,648480',2362320,NULL,'LS001','LSCAB010','AS001'),
	(10,'018-01112','BANDUNG TENGAH','SUTOMO',80000000,'2018-02-26','DAIHATSU','F 601 RV-GMDFJJ XENIA','1','TLO','MERAH METALIK','MINIBUS','MHKVIBA2JBKI07963','DH98194','D 1380 VR','I02047728',2011,36,0.9,720000,720000,'PASSANGER','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','720000,612000,504000',1836000,NULL,'LS001','LSCAB010','AS001'),
	(11,'021-00774','SOLO','MULADI',55000000,'2018-02-26','ISUZU','TBR 54 PRLC/2499 CC','1','TLO','SILVER METALIK','MINIBUS','MHCTBR54BYK095923','E095923','AD 9288 AK','K12998128',2000,36,0.76,418000,418000,'PASSANGER','WILAYAH 3','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','418000,355300,292600',1065900,NULL,'LS001','LSCAB011','AS001'),
	(12,'001-00925','PASAR MINGGU','SULAEMAN',45000000,'2018-02-27','DAIHATSU','BLINDVAN S401RV HE','1','TLO','PUTIH','MINIBUS','MHKB3BA1JBK006130','DH14653','B 9626 TCB','I00202933',2011,36,1.93,868500,405000,'COMMERCIAL','WILAYAH 2','2018-03-22',NULL,'NEW',0,1,'ACTIVE',NULL,'868500,738225,607950',2214675,NULL,'LS001','LSCAB003',NULL),
	(13,'001-00926','PASAR MINGGU','RIO ADI WARDHANA',250000000,'2018-02-27','HONDA','CR-V RM3 2WD 2.4 AT CKD','3','TLO','PUTIH','JEEP','MHRRM3850EJ450093','K24Z99423076','B 789 DNS','K10692517',2014,24,0.63,1575000,1575000,'PASSANGER','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','1575000,1338750',2913750,NULL,'LS001','LSCAB003','AS001'),
	(14,'002-01596','SUKABUMI','DEDE SURYANA',44000000,'2018-02-27','SUZUKI','ST 150 FUTURA','1','TLO','MERAH METALIK','MINIBUS','MHYESL415AJ510994','G15AID779580','F 1805 SY','L01415923',2010,36,0.9,396000,396000,'PASSANGER','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','396000,336600,277200',1009800,NULL,'LS001','LSCAB002','AS001'),
	(15,'003-01450','BOGOR','RISMAWATI',150000000,'2018-02-27','NISSAN','FRONTIER 2.5 MT DOUBLE CABIN','6','TLO','HITAM','PICKUP','MNTVCUD40Z0020938','YD25198890T','F 8747 VL','K06368944',2010,36,1.93,2895000,2895000,'COMMERCIAL','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','2895000,2460750,2026500',7382250,NULL,'LS001','LSCAB004','AS001'),
	(16,'005-01026','KARAWANG','HASAN',60000000,'2018-02-27','TOYOTA','DYNA 130 HT','6','TLO','PUTIH','TRUCK','MHFC1JU43A5017420','W04DTRJ24642','B 9429 PDA','H06349509',2010,36,1.93,1158000,1158000,'COMMERCIAL','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','1158000,984300,810600',2952900,NULL,'LS001','LSCAB015','AS002'),
	(17,'005-01027','KARAWANG','IMAS',48000000,'2018-02-27','SUZUKI','ST 150-PICK UP','6','TLO','HITAM','PICKUP','MHYESL415FJ725943','G15AID1011312','T 8481 TO','M00110640',2015,24,1.93,926400,926400,'COMMERCIAL','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','926400,787440',1713840,NULL,'LS001','LSCAB015','AS002'),
	(18,'007-00810','PONDOK GEDE','MASKAN SYARIF',46000000,'2018-02-27','SUZUKI','FUTURA ST 150','6','TLO','PUTIH','PICKUP','MHYESL415EJ343452','G15AID982729','B 9585 KAK','L08545978',2014,12,1.93,887800,887800,'COMMERCIAL','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','887800',887800,NULL,'LS001','LSCAB017','AS002'),
	(19,'008-01213','CIBINONG','ELY MARLYNA',112000000,'2018-02-27','DAIHATSU','F651RV-GMDFJ (4 X 2) M/T','1','TLO','HITAM METALIK','MINIBUS','MHKV1BA2JDK046393','MB00680','F 1522 KA','J06740371',2013,36,0.9,1008000,1008000,'PASSANGER','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','1008000,856800,705600',2570400,NULL,'LS001','LSCAB001','AS002'),
	(20,'008-01214','CIBINONG','NONY WARDAYA',60000000,'2018-02-27','SUZUKI','GC415 T (APV PICKUP)','6','TLO','HITAM','PICKUP','MHYGDN41TFJ406338','G15AID355325','B 9687 EAE','L13928827',2015,36,1.93,1158000,1158000,'COMMERCIAL','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','1158000,984300,810600',2952900,NULL,'LS001','LSCAB001','AS002'),
	(21,'011-00796','KUNINGAN','MULYADI',118000000,'2018-02-27','DAIHATSU','TERIOS F700RG TX MT','1','TLO','PUTIH','MINIBUS','MHKG2CJ2JCK068216','DDE4953','E 1592 BH','M03440767',2012,36,0.9,1062000,1062000,'PASSANGER','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','1062000,902700,743400',2708100,NULL,'LS001','LSCAB007','AS002'),
	(22,'014-01187','CIAMIS','ANDRI NUR SALIM',68000000,'2018-02-27','DAIHATSU','F600RV GMDFJJ','1','TLO','SILVER METALIK','MINIBUS','MHKV1AA2J8K029178','DN70697','Z 1307 GZ','L13140357',2008,36,0.9,612000,612000,'PASSANGER','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','612000,520200,428400',1560600,NULL,'LS001','LSCAB009','AS002'),
	(23,'014-01188','CIAMIS','NURIAH',45000000,'2018-02-27','DAIHATSU','XENIA F 600','1','TLO','BIRU METALIK','MINIBUS','MHKFMRCEJ5K001604','DN14191','Z 1629 NJ','K02832538',2005,36,0.9,405000,405000,'PASSANGER','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','405000,344250,283500',1032750,NULL,'LS001','LSCAB009','AS002'),
	(24,'015-01085','BANDUNG TIMUR','FARIDA ANDRIYANTI',40000000,'2018-02-27','DAIHATSU','S401RP-PMREJJ HA','6','TLO','HITAM PUTIH','PICKUP','MHKP3BA1JDK053608','MA95786','D 8570 VN','K00227901',2013,12,1.93,772000,772000,'COMMERCIAL','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','772000',772000,NULL,'LS001','LSCAB018','AS002'),
	(25,'018-01113','BANDUNG TENGAH','THEODORUS CANDRA LAKSANA BIRAWA',50000000,'2018-02-27','SUZUKI','GC415V APV STD MT','1','TLO','ABU ABU METALIK','MINIBUS','MHYGDN41V5J122450','G15AID122220','D 1866 HK','M14307398',2005,36,0.9,450000,450000,'PASSANGER','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','450000,382500,315000',1147500,NULL,'LS001','LSCAB010','AS002'),
	(26,'021-00773','SOLO','RATNA WILIS',48000000,'2018-02-27','SUZUKI','ST 150 FUTURA','6','TLO','BIRU','PICKUP','MHYESL415CJ242944','G15AID859173','AD 1762 SU','I11534652I',2012,36,1.06,508800,508800,'COMMERCIAL','WILAYAH 3','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','508800,432480,356160',1297440,NULL,'LS001','LSCAB011','AS002'),
	(27,'028-00275','SEMARANG','PUSPITASARI',78000000,'2018-02-27','SUZUKI','AV1414F SDX (4X2) MT','1','TLO','ABU-ABU METALIK','MINIBUS','MHYKZE81SCJ103499','K14BT1003586','T 1328 DJ','I11898028',2012,36,0.9,702000,702000,'PASSANGER','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','702000,596700,491400',1790100,NULL,'LS001','LSCAB013','AS002'),
	(28,'002-01597','SUKABUMI','YANTI AGUSTINI',120000000,'2018-02-28','MITSUBISHI','FUSO FM 517 H','6','TLO','COKLAT KENARI','TRUCK','FM517H044684','6D16C037025','BG 8242 AI','A9219094F',2000,36,1.93,2316000,936000,'COMMERCIAL','WILAYAH 3','2018-03-22',NULL,'NEW',0,1,'ACTIVE',NULL,'2316000,1968600,1621200',5905800,NULL,'LS001','LSCAB002',NULL),
	(29,'002-01598','SUKABUMI','YANTI AGUSTINI',110000000,'2018-02-28','MITSUBISHI','COLT DIESEL FE SUPER HD(4X2)','6','TLO','KUNING KOMBINASI','TRUCK','MHMFE75P6AK003350','4D34TF37041','E 9772 D','H00083906',2010,36,1.93,2123000,2123000,'COMMERCIAL','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','2123000,1804550,1486100',5413650,NULL,'LS001','LSCAB002','AS002'),
	(30,'002-01599','SUKABUMI','YANTI AGUSTINI',110000000,'2018-02-28','MITSUBISHI','COLT DIESEL FE SUPER HD(4X2)','6','TLO','KUNING KOMBINASI','TRUCK','MHMFE75P6AK003347','4D34TF37040','E 9770 D','H00033904',2010,36,1.93,2123000,2123000,'COMMERCIAL','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','2123000,1804550,1486100',5413650,NULL,'LS001','LSCAB002','AS002'),
	(31,'003-01451','BOGOR','ASEP FAUZI RIDWAN',85000000,'2018-02-28','NISSAN','GRAND LIVINA SV','1','TLO','MERAH','MINIBUS','MHBG1CG1FCJ083879','HR15913698B','F 1278 HQ','I11422298',2012,36,0.9,765000,765000,'PASSANGER','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','765000,650250,535500',1950750,NULL,'LS001','LSCAB004','AS001'),
	(32,'003-01452','BOGOR','EKA KURNIAWAN',80000000,'2018-02-28','DAIHATSU','B100RS-GMQFJ 4X2 MT','1','TLO','ABU ABU METALIK','MINIBUS','MHKS4DA3JGJ046360','1KRA272404','F 1630 NF','M05852110',2016,36,0.9,720000,720000,'PASSANGER','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','720000,612000,504000',1836000,NULL,'LS001','LSCAB004','AS001'),
	(33,'005-01028','KARAWANG','DODY HERRY RAYANDI',43000000,'2018-02-28','TOYOTA','HILUX PICKUP 2.0 L','6','TLO','SILVER METALIK','PICKUP','MR0AW12G270006784','1TR6470714','Z 8761 DJ','E9727227H',2007,24,1.93,829900,829900,'COMMERCIAL','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','829900,705415',1535315,NULL,'LS001','LSCAB015','AS001'),
	(34,'005-01030','KARAWANG','DEDEN AHMAD JAMIL',31000000,'2018-02-28','TOYOTA','NEW AVANZA 1.3G MT','1','TLO','SILVER METALIK','MINIBUS','MHKM1BA3JDJ004970','MA75377','B 1710 FKM','J06655408',2013,24,0.9,279000,279000,'PASSANGER','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','279000,237150',516150,NULL,'LS001','LSCAB015','AS001'),
	(35,'007-00809','PONDOK GEDE','MULYADI',90000000,'2018-02-28','HONDA','BRIO DD2 1.3 E A/T','1','TLO','PUTIH','MINIBUS','MRHDD2870EP410064','L13Z52202243','F 1202 LI','L08945822',2014,24,0.9,810000,810000,'PASSANGER','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','810000,688500',1498500,NULL,'LS001','LSCAB017','AS001'),
	(36,'008-01215','CIBINONG','ASBAHANI',115000000,'2018-02-28','HONDA','FREED GB3 1.5 E AT','1','TLO','PUTIH METALIK','MINIBUS','MHRGB3850AJ001469','L15A73810852','B 1814 TKB','H00239990',2010,24,0.9,1035000,1035000,'PASSANGER','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','1035000,879750',1914750,NULL,'LS001','LSCAB001','AS001'),
	(37,'008-01216','CIBINONG','LUKMAN KUSNANDAR',68000000,'2018-02-28','SUZUKI','GC415V APV DLX MT','1','TLO','ABU ABU METALIK','MINIBUS','MHYGDN42VAJ336757','G15AID204251','B 1100 WFF','H01754003',2010,36,0.9,612000,612000,'PASSANGER','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','612000,520200,428400',1560600,NULL,'LS001','LSCAB001','AS001'),
	(38,'008-01217','CIBINONG','IJAN SUSANTO',59000000,'2018-02-28','TOYOTA','AVANZA 1300 (FM601RM-GMMEJ)','1','TLO','BIRU METALIK','MINIBUS','MHFFMRGK35K062161','DA91881','B 1681 EMP','N01856016',2005,12,0.9,531000,531000,'PASSANGER','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','531000',531000,NULL,'LS001','LSCAB001','AS001'),
	(39,'010-01375','CIMAHI','DEKI MAULANA',36000000,'2018-02-28','DAIHATSU','TERIOS F700RG TX MT','1','TLO','HITAM METALIK','MINIBUS','MHKG2CJ2J8K016153','DBA2036','D 1278 KP','F3317894H',2008,24,0.9,324000,324000,'PASSANGER','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','324000,275400',599400,NULL,'LS001','LSCAB006','AS001'),
	(40,'011-00797','KUNINGAN','RUSMAYATI',40000000,'2018-02-28','SUZUKI','EVERY 1.3 AT GA413 / MINIBUS','1','TLO','BIRU METALIK','MINIBUS','MHYEGA4134J900128','G13BB744250','E 1819 LO','M03438565',2004,36,0.9,360000,360000,'PASSANGER','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','360000,306000,252000',918000,NULL,'LS001','LSCAB007','AS001'),
	(41,'011-00798','KUNINGAN','DEDI KUSWOYO',45000000,'2018-02-28','SUZUKI','AERIO DX MT','1','TLO','ABU ABU METALIK','MINIBUS','MHYERH4153J105486','M15AID105486','E 1633 AI','C 7001522H',2003,36,0.9,405000,405000,'PASSANGER','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','405000,344250,283500',1032750,NULL,'LS001','LSCAB007','AS001'),
	(42,'012-01048','LEMBANG','HILDA HASANUDIN',200000000,'2018-02-28','HONDA','HR-V RU 1.15E CVT','2','TLO','MERAH','MINIBUS','MHRRU1850FJ416486','L15Z61022227','D 277 HIL','M01205117',2015,36,0.69,1380000,1380000,'PASSANGER','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','1380000,1173000,966000',3519000,NULL,'LS001','LSCAB008','AS001'),
	(43,'014-01186','CIAMIS','SUKANAH',44000000,'2018-02-28','MITSUBISHI','COLT T120SS PU 1.5 FD-R (4X2)','6','TLO','HITAM','PICKUP','MHMU5TU2EBK061503','4G15G84874','D 8220 DS','I03425711',2011,36,1.93,849200,849200,'COMMERCIAL','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','849200,721820,594440',2165460,NULL,'LS001','LSCAB009','AS001'),
	(44,'014-01189','CIAMIS','DANA HARISKA',82000000,'2018-02-28','TOYOTA','KIJANG INNOVA E','1','TLO','HITAM METALIK','MINIBUS','MHFXW41GX50011776','1TR6162097','B 7880 CX','D6875375G',2005,36,0.9,738000,738000,'PASSANGER','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','738000,627300,516600',1881900,NULL,'LS001','LSCAB009','AS001'),
	(45,'015-01087','BANDUNG TIMUR','NYI LALAH FADILAH',75000000,'2018-02-28','TOYOTA','NEW AVANZA VELOZ 1.5 MT','1','TLO','SILVER METALIK','MINIBUS','MHKM1CA4JEK071889','DEJ8830','Z 1477 AI','K12762953',2014,36,0.9,675000,675000,'PASSANGER','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','675000,573750,472500',1721250,NULL,'LS001','LSCAB018','AS001'),
	(46,'020-00627','JOGJAKARTA','FAIRUS VADAQ NOVI',150000000,'2018-02-28','HONDA','CR-V RE1 2WD 2.0 AT CKD','2','TLO','ABU ABU METALMETALIK','JEEP','MHRRE1840AJ000795','R20A14811308','B 1490 KJA','H00709619',2010,36,0.69,1035000,1035000,'PASSANGER','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','1035000,879750,724500',2639250,NULL,'LS001','LSCAB014','AS001'),
	(47,'020-00628','JOGJAKARTA','LAMBERTUS PURWANTO AGUNG SRI CAHYO',67000000,'2018-02-28','DAIHATSU','F600RV GMDFJJ','1','TLO','SILVER METALIK','MINIBUS','MHKV1AA2JAK078235','DP22071','AB 1706 NU','N02706240',2010,36,0.76,509200,509200,'PASSANGER','WILAYAH 3','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','509200,432820,356440',1298460,NULL,'LS001','LSCAB014','AS001'),
	(48,'014-01190','CIAMIS','RIRIN HARYANI',70000000,'2018-03-01','TOYOTA','AGYA 1.0G M/T','1','TLO','HITAM','MINIBUS','MHKA4DA3JEJ033115','1KRA105525','Z 1155 HV','L00944000',2014,24,0.9,630000,630000,'PASSANGER','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','630000,535500',1165500,NULL,'LS001','LSCAB009','AS001'),
	(49,'018-01114','BANDUNG TENGAH','RADEN ATEN RACHMATULLOH',72000000,'2018-03-01','DAIHATSU','B100RS-GQQFJ 4X2 AT','1','TLO','ABU ABU METALIK','MINIBUS','MHKS4DB3JEJ004197','1KRA043902','D 1349 YR','K12667833',2014,36,0.9,648000,648000,'PASSANGER','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','648000,550800,453600',1652400,NULL,'LS001','LSCAB010','AS001'),
	(50,'003-01454','BOGOR','WILY RAMDANI',89000000,'2018-03-02','TOYOTA','AVANZA 1300 G','1','TLO','SILVER METALIK','MINIBUS','MHFM1BA3JBK324293','DH66705','F 1823 IQ','M00488655',2011,36,0.9,801000,801000,'PASSANGER','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','801000,680850,560700',2042550,NULL,'LS001','LSCAB004','AS001'),
	(51,'005-01031','KARAWANG','HENDRA',30000000,'2018-03-02','TOYOTA','KIJANG SUPER KF 42 SHORT','1','TLO','MERAH METALIK','MINIBUS','MHF21KF4200029117','7K0062741','B 1694 FVI','I00656367',1996,24,0.9,270000,270000,'PASSANGER','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','270000,229500',499500,NULL,'LS001','LSCAB015','AS001'),
	(52,'006-01468','SUBANG','MAMUN SATIRI',55000000,'2018-03-02','DAIHATSU','S401RV-ZMDEJJ HJ','1','TLO','SILVER METALIK','MINIBUS','MHKV3BA3JBK012298','DH07270','T 1830 TE','H08620424',2011,36,0.9,495000,495000,'PASSANGER','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','495000,420750,346500',1262250,NULL,'LS001','LSCAB005','AS001'),
	(53,'009-01121','PURWAKARTA','ENI HARNAENI',30000000,'2018-03-02','TOYOTA','CAMRY 3000 AUTOMATIC','1','TLO','HITAM METALIK','SEDAN','MHF53XK3037000327','1MZ1573108','B 1459 KBD','M07367251',2003,36,0.9,270000,270000,'PASSANGER','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','270000,229500,189000',688500,NULL,'LS001','LSCAB019','AS001'),
	(54,'012-01049','LEMBANG','INYU SUHARYANTI',110000000,'2018-03-02','TOYOTA','NEW AVANZA 1.3G MT','1','TLO','SILVER METALIK','MINIBUS','MHKM1BA3JCK109271','MA22837','D 1324 NDI','J05188685',2012,36,0.9,990000,990000,'PASSANGER','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','990000,841500,693000',2524500,NULL,'LS001','LSCAB008','AS001'),
	(55,'014-01191','CIAMIS','IWIN',125000000,'2018-03-02','MITSUBISHI','COLT DIESEL FE 74 HDV (4X2) MT','6','TLO','KUNING','TRUCK','MHMFE74P5BK055974','4D34TG81096','Z 9179 TA','I02417752',2011,36,1.93,2412500,2412500,'COMMERCIAL','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','2412500,2050625,1688750',6151875,NULL,'LS001','LSCAB009','AS001'),
	(56,'018-01115','BANDUNG TENGAH','AAT',33000000,'2018-03-02','TOYOTA','KIJANG SUPER KF 83 LONG','1','TLO','SILVER METALIK','MINIBUS','MHF11KF83Y0022550','7K0365707','D 1228 EV','A9535011H',2000,24,0.9,297000,297000,'PASSANGER','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','297000,252450',549450,NULL,'LS001','LSCAB010','AS001'),
	(57,'011-00799','KUNINGAN','TARMA',15000000,'2018-03-03','MITSUBISHI','T 120 SS','6','TLO','PUTIH','PICKUP','MHMT120SP3R058732','4G17C371859','E 8582 KA','C5775755H',2003,24,1.93,289500,289500,'COMMERCIAL','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','289500,246075',535575,NULL,'LS001','LSCAB007','AS001'),
	(58,'014-01192','CIAMIS','AMAS MAESAROH',42000000,'2018-03-03','TOYOTA','KIJANG SPR KF80 LG','1','TLO','HIJAU METALIK','MINIBUS','MHF11KF8000003892','7K0119556','Z 1283 NM','M03353719',1997,24,0.9,378000,378000,'PASSANGER','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','378000,321300',699300,NULL,'LS001','LSCAB009','AS001'),
	(59,'003-01455','BOGOR','DIDI',25000000,'2018-03-07','SUZUKI','ST 150 FUTURA','1','TLO','HITAM METALIK','MINIBUS','MHYESL4153J546291','G15AIA546291','F 1228 PM','K03215569',2003,24,0.9,225000,225000,'PASSANGER','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','225000,191250',416250,NULL,'LS001','LSCAB004','AS001'),
	(60,'007-00812','PONDOK GEDE','MUHAMAD MAHRUS ALI',55000000,'2018-03-07','FORD','FIESTA 1.6L AT S','1','TLO','PUTIH','MINIBUS','MNBJXXARJJAR19871','TSJAAR19871','B 1601 BKT','L13861094',2010,36,0.9,495000,495000,'PASSANGER','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','495000,420750,346500',1262250,NULL,'LS001','LSCAB017','AS001'),
	(61,'008-01218','CIBINONG','DWI LESTARI',30000000,'2018-03-07','TOYOTA','KIJANG SUPER KF 42 SHORT','1','TLO','ABU ABU METALIK','MINIBUS','MHF21KF4200002671','7K0005201','B 1393 EVG','I05781882',1995,24,0.9,270000,270000,'PASSANGER','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','270000,229500',499500,NULL,'LS001','LSCAB001','AS001'),
	(62,'009-01122','PURWAKARTA','NANDANG',65000000,'2018-03-07','SUZUKI','ST 150-PICK UP','6','TLO','PUTIH','PICKUP','MHYESL415FJ747052','G15AID1033691','D 8518 EV','M03070391',2015,24,1.93,1254500,1254500,'COMMERCIAL','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','1254500,1066325',2320825,NULL,'LS001','LSCAB019','AS001'),
	(63,'010-01380','CIMAHI','MIMIN TARMINAH',50000000,'2018-03-07','TOYOTA','AGYA 1.0G M/T','1','TLO','HITAM','MINIBUS','MHKA4DA3JEJ048488','1KRA149326','D 1264 ACP','L06171098',2014,36,0.9,450000,450000,'PASSANGER','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','450000,382500,315000',1147500,NULL,'LS001','LSCAB006','AS001'),
	(64,'010-01381','CIMAHI','DAYAT',99000000,'2018-03-07','SUZUKI','AVI 414 F DX (4X2) MT','1','TLO','HITAM METALIK','MINIBUS','MHYKZE81SEJ206835','K14BT1096448','D 1476 UM','L00634355',2014,36,0.9,891000,891000,'PASSANGER','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','891000,757350,623700',2272050,NULL,'LS001','LSCAB006','AS001'),
	(65,'011-00801','KUNINGAN','EKO YULIANTO',60000000,'2018-03-07','MITSUBISHI','FE 349','6','TLO','KUNING','TRUCK','MHMFE349E4R059575','4D34419679','T 8788 G','C7331214H',2004,24,1.93,1158000,1158000,'COMMERCIAL','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','1158000,984300',2142300,NULL,'LS001','LSCAB007','AS001'),
	(66,'012-01050','LEMBANG','CECEP DEDYWAHIDUL ROSAD',77000000,'2018-03-07','TOYOTA','KIJANG INOVA G TGN40R','1','TLO','HIJAU METALIK','MINIBUS','MHFXW42G142001932','1TR6005060','Z 1732 GV','M14180777',2004,36,0.9,693000,693000,'PASSANGER','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','693000,589050,485100',1767150,NULL,'LS001','LSCAB008','AS001'),
	(67,'012-01052','LEMBANG','NENG ANA NUR NOVIANA',105000000,'2018-03-07','DAIHATSU','TERIOS F700RG TX MT','1','TLO','HITAM METALIK','MINIBUS','MHKG2CJ2JBK046020','DCE0056','D 909 VM','I01695398',2011,24,0.9,945000,945000,'PASSANGER','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','945000,803250',1748250,NULL,'LS001','LSCAB008','AS001'),
	(68,'015-01088','BANDUNG TIMUR','ANGGARETA',60000000,'2018-03-07','TOYOTA','AVANZA 1300G F601RM GMMFJJ','1','TLO','SILVER METALIK','MINIBUS','MHFM1BA3J7K053381','DC35584','D 1086 JP','M00422138',2007,36,0.9,540000,540000,'PASSANGER','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','540000,459000,378000',1377000,NULL,'LS001','LSCAB018','AS001'),
	(69,'017-00677','TEGAL','FIRMAN BUDI APRIANGGA',120000000,'2018-03-07','HONDA','JAZZ GE8 1.5 E AT','1','TLO','PUTIH METALIK','MINIBUS','MHRGE8860CJ204896','L15A74754084','B 1971 GMF','M03975736',2012,36,0.9,1080000,1080000,'PASSANGER','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','1080000,918000,756000',2754000,NULL,'LS001','LSCAB016','AS001'),
	(70,'018-01120','BANDUNG TENGAH','LUTFI ADYTIA',67000000,'2018-03-07','NISSAN','LIVINA 1.5 4X2 MT','1','TLO','MERAH METALIK','MINIBUS','MHBG2CG1F8J003625','HR15916789A','D 1299 RF','M00134703',2008,36,0.9,603000,603000,'PASSANGER','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','603000,512550,422100',1537650,NULL,'LS001','LSCAB010','AS001'),
	(71,'018-01122','BANDUNG TENGAH','VERA AGUSTINA SUSANTI',108000000,'2018-03-07','TOYOTA','DYNA 110 ET','6','TLO','MERAH MERAH','TRUCK','MHFC1JU41E5108136','W04DTPJ50441','D 8320 EM','K12847932',2014,36,1.93,2084400,2084400,'COMMERCIAL','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','2084400,1771740,1459080',5315220,NULL,'LS001','LSCAB010','AS001'),
	(72,'020-00631','JOGJAKARTA','TJIOE LIE IN',125000000,'2018-03-07','MITSUBISHI','COLT DIESEL FE SUPER HD(4X2)','6','TLO','KUNING KOMBINASI','TRUCK','MHMFE75P6DK024828','4D34TJ35341','AB 8611 AK','K02862169I',2013,24,1.06,1325000,1325000,'COMMERCIAL','WILAYAH 3','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','1325000,1126250',2451250,NULL,'LS001','LSCAB014','AS001'),
	(73,'026-00380','MADIUN','AGUS PRASETYO IRIANTO',60000000,'2018-03-07','TOYOTA','AVANZA 1.3/FM601RM-GMDEJ','1','TLO','SILVER METALIK','MINIBUS','MHFFMREK34K000454','DA08923','F 1562 GN','K06399706',2004,36,0.9,540000,540000,'PASSANGER','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','540000,459000,378000',1377000,NULL,'LS001','LSCAB012','AS001'),
	(74,'006-01471','SUBANG','TITIN',80000000,'2018-03-08','MITSUBISHI','COLT DIESEL FE 71','6','TLO','KUNING','TRUCK','MHMFE71P1BK025983','4D34TG56437','T 8845 TI','I02415888',2011,24,1.93,1544000,1544000,'COMMERCIAL','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','1544000,1312400',2856400,NULL,'LS001','LSCAB005','AS001'),
	(75,'007-00813','PONDOK GEDE','SLAMET SANTOSO',35000000,'2018-03-08','SUZUKI','KATANA SHORT 2 WD GX','1','TLO','MERAH METALIK','JEEP','MHDESJ410VJ085777','F10SID188347','B 1397 BY','M07704339',1997,24,0.9,315000,315000,'PASSANGER','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','315000,267750',582750,NULL,'LS001','LSCAB017','AS001'),
	(76,'010-01382','CIMAHI','HENDRIK',65000000,'2018-03-08','HONDA','CR-V RD 4 2WD AT','1','TLO','HITAM','JEEP','MHRRD48603K003111','K20A51024889','D 126 OS','C5276217H',2003,12,0.9,585000,585000,'PASSANGER','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','585000',585000,NULL,'LS001','LSCAB006','AS001'),
	(77,'010-01383','CIMAHI','KRISTIANI WAHYUPUSPITARINI',75000000,'2018-03-08','SUZUKI','DR412','1','TLO','ABU ABU METALIK','MINIBUS','MA3GXB72SD0436574','K12MN7048890','D 1123 TT','K02830563',2013,36,0.9,675000,675000,'PASSANGER','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','675000,573750,472500',1721250,NULL,'LS001','LSCAB006','AS001'),
	(78,'012-01051','LEMBANG','IMAS ROBAYANI',116000000,'2018-03-08','SUZUKI','JB424 GRAND VITARA','1','TLO','HITAM METALIK','JEEP','MHYJTEA4VBJ101732','J24BIDI001731','D 1529 OU','I02876220',2011,24,0.9,1044000,1044000,'PASSANGER','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','1044000,887400',1931400,NULL,'LS001','LSCAB008','AS001'),
	(79,'014-01196','CIAMIS','YUYU SURYANAH',41000000,'2018-03-08','DAIHATSU','F 600 RV (XENIA) 1000CC','1','TLO','SILVER METALIK','MINIBUS','MHKFMREEJ5K023329','DN26811','D 1235 HQ','D6124997H',2005,36,0.9,369000,369000,'PASSANGER','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','369000,313650,258300',940950,NULL,'LS001','LSCAB009','AS001'),
	(80,'018-01123','BANDUNG TENGAH','AGUNG RENDRA FAUZI',56000000,'2018-03-08','DAIHATSU','F601 (XENIA 1300CC)','1','TLO','COKLAT MUDA METALIK','MINIBUS','MHKFMREK34K006534','DA48046','D 1417 GZ','D0919447H',2004,36,0.9,504000,504000,'PASSANGER','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','504000,428400,352800',1285200,NULL,'LS001','LSCAB010','AS001'),
	(81,'026-00381','MADIUN','SUDARMI',63000000,'2018-03-08','TOYOTA','KIJANG INNOVA V M/T','1','TLO','HITAM METALIK','MINIBUS','MHFXW43G054014188','1TR6064335','B 8066 MO','D4389585G',2005,12,0.9,567000,567000,'PASSANGER','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','567000',567000,NULL,'LS001','LSCAB012','AS001'),
	(82,'001-00930','PASAR MINGGU','MUHAMMAD FUAD MUHAMMAD NATSIR',75000000,'2018-03-09','TOYOTA','AGYA 1.0 G AT','1','TLO','PUTIH','MINIBUS','MHKA4DB3JEJ011358','1KRA053948','B 1015 SYV','K10688918',2014,24,0.9,675000,675000,'PASSANGER','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','675000,573750',1248750,NULL,'LS001','LSCAB003','AS001'),
	(83,'002-01601','SUKABUMI','DASMINI',140000000,'2018-03-09','MITSUBISHI','COLT DIESEL FE 74 HDV (4X2) MT','6','TLO','KUNING','TRUCK','MHMFE74P5DK102614','4D34TJ72731','F 9635 WA','K06356405',2013,24,1.93,2702000,2702000,'COMMERCIAL','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','2702000,2296700',4998700,NULL,'LS001','LSCAB002','AS001'),
	(84,'003-01456','BOGOR','AGUS SALIM',53000000,'2018-03-09','HONDA','JAZZ GE8 1.5 E AT','1','TLO','PUTIH','MINIBUS','MHRGE8860CJ209485','L15A74762335','F 1228 IC','N06124972',2012,12,0.9,477000,477000,'PASSANGER','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','477000',477000,NULL,'LS001','LSCAB004','AS001'),
	(85,'006-01469','SUBANG','ANANDA ANISA',48000000,'2018-03-09','HONDA','BRIO SATYA DD1 1.2 SMT CKD','1','TLO','ABU ABU BAJA METALIK','MINIBUS','MHRDD1750FJ551429','L12B31460904','T 1628 TO','L13078154',2015,24,0.9,432000,432000,'PASSANGER','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','432000,367200',799200,NULL,'LS001','LSCAB005','AS001'),
	(86,'011-00802','KUNINGAN','ANWAR ALBUSYAIRI',120000000,'2018-03-09','HONDA','MOBILIO DD4 1.5 EM-CVT CKD','1','TLO','MERAH TEMBAGA METALIK','MINIBUS','MHRDD4750EJ406154','L15Z11126230','E 1617 PT','K06395417',2014,24,0.9,1080000,1080000,'PASSANGER','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','1080000,918000',1998000,NULL,'LS001','LSCAB007','AS001'),
	(87,'011-00803','KUNINGAN','RISKY FIRMAN SYAH',38000000,'2018-03-09','SUZUKI','BALENO DX AT','1','TLO','HITAM','SEDAN','MHYESY4152J901573','G15BID901573','E 1604 RJ','N10195122',2002,36,0.9,342000,342000,'PASSANGER','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','342000,290700,239400',872100,NULL,'LS001','LSCAB007','AS001'),
	(88,'011-00804','KUNINGAN','BUDI YATNA KUSUMA',52000000,'2018-03-09','DAIHATSU','S401RV-ZMDEJJ HJ','1','TLO','SILVER METALIK','MINIBUS','MHKV3BA6J9K000170','DD94442','R 9027 UB','N02153692',2009,36,0.76,395200,395200,'PASSANGER','WILAYAH 3','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','395200,335920,276640',1007760,NULL,'LS001','LSCAB007','AS001'),
	(89,'012-01054','LEMBANG','BUDI GUSWANTO',170000000,'2018-03-09','TOYOTA','HILUX 2.5E DOUBLE CABIN(4X4)M','6','TLO','PUTIH','PICKUP','MR0DS8CD2H0262690','2KDU967462','D 8206 WC','N10149654',2017,36,1.93,3281000,3281000,'COMMERCIAL','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','3281000,2788850,2296700',8366550,NULL,'LS001','LSCAB008','AS001'),
	(90,'014-01197','CIAMIS','MARYATI',125000000,'2018-03-09','MITSUBISHI','COLT DIESEL FE 74 HDV (4X2) MT','6','TLO','KUNING','TRUCK','MHMFE74P5CK078091','4D34TH79603','Z 9661 TA','J01758506',2012,36,1.93,2412500,2412500,'COMMERCIAL','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','2412500,2050625,1688750',6151875,NULL,'LS001','LSCAB009','AS001'),
	(91,'020-00632','JOGJAKARTA','TIASNING WIBOWO',90000000,'2018-03-09','NISSAN','GRAND LIVINA 1.5 SV AT','1','TLO','ABU ABU TUA METALIK','MINIBUS','MHBG1CG1ACJ082259','HR15911878B','AB 1220 HK','I09201808I',2012,36,0.76,684000,684000,'PASSANGER','WILAYAH 3','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','684000,581400,478800',1744200,NULL,'LS001','LSCAB014','AS001'),
	(92,'009-01123','PURWAKARTA','YOYOH HADIJAH',26000000,'2018-03-10','TOYOTA','KIJANG SPR KF 80 LGX','1','TLO','MERAH METALIK','MINIBUS','MHF11KF8000044102','7K0217389','B 7148 D','A8017604G',1998,24,0.9,234000,234000,'PASSANGER','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','234000,198900',432900,NULL,'LS001','LSCAB019','AS001'),
	(93,'010-01384','CIMAHI','MULYANA',55000000,'2018-03-10','DAIHATSU','S401RV-ZMDEJJ HJ','1','TLO','HITAM','MINIBUS','MHKV3BA3JBK012101','DH00116','D 1583 NV','H08485791',2011,36,0.9,495000,495000,'PASSANGER','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','495000,420750,346500',1262250,NULL,'LS001','LSCAB006','AS001'),
	(94,'012-01053','LEMBANG','IMAS WIDAWATI',140000000,'2018-03-10','MITSUBISHI','COLT DIESEL FE 74 HDV (4X2) MT','6','TLO','KUNING','TRUCK','MHMFE74P5EK134579','4D34TK00414','D 9011 YB','L12977011',2014,24,1.93,2702000,2702000,'COMMERCIAL','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','2702000,2296700',4998700,NULL,'LS001','LSCAB008','AS001'),
	(95,'012-01055','LEMBANG','YAYAT NURHIDAYAT',45000000,'2018-03-10','MITSUBISHI','COLT T120SS PU 1.5 FD-R (4X2)','6','TLO','HITAM','PICKUP','MHMU5TU2EEK136641','4G15K41718','D 8871 VP','L01291554',2014,36,1.93,868500,868500,'COMMERCIAL','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','868500,738225,607950',2214675,NULL,'LS001','LSCAB008','AS001'),
	(96,'017-00679','TEGAL','DASPI',76000000,'2018-03-10','DAIHATSU','F600RV GMDFJJ','1','TLO','MERAH METALIK','MINIBUS','MHKV1AA2JBK093613','DP37896','G 8634 KG','H09070838',2011,36,0.76,577600,577600,'PASSANGER','WILAYAH 3','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','577600,490960,404320',1472880,NULL,'LS001','LSCAB016','AS001'),
	(97,'001-00932','PASAR MINGGU','GUNAWAN',40000000,'2018-03-14','MITSUBISHI','FE 334','6','TLO','KUNING','TRUCK','MHMFE334E2R013374','4D31218676','B 9257 SC','C1450222G',2002,24,1.93,772000,772000,'COMMERCIAL','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','772000,656200',1428200,NULL,'LS001','LSCAB003','AS001'),
	(98,'002-01603','SUKABUMI','IWAN',110000000,'2018-03-14','MITSUBISHI','FE74 HDV 4X2 MT','6','TLO','KUNING','TRUCK','MHMFE74P5DK098265','4D34TJ52527','F 8940 UU','K02827492',2013,36,1.93,2123000,2123000,'COMMERCIAL','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','2123000,1804550,1486100',5413650,NULL,'LS001','LSCAB002','AS001'),
	(99,'003-01457','BOGOR','NURDIN HAERUDIN',30000000,'2018-03-14','MITSUBISHI','GALANT ST A/T NEW GALANT','1','TLO','PUTIH','SEDAN','MHMEA5ASR2K001619','6A13A191619','B 1183 TDY','N04708521',2002,12,0.9,270000,270000,'PASSANGER','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','270000',270000,NULL,'LS001','LSCAB004','AS001'),
	(100,'005-01036','KARAWANG','RAHMAN GUNING',41000000,'2018-03-14','SUZUKI','SY 415 BALENO DX 1490 CC','1','TLO','BIRU METALIK','SEDAN','MHYESY4151J107949','G15BID107949','T 1537 D','B0778443H',2001,36,0.9,369000,369000,'PASSANGER','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','369000,313650,258300',940950,NULL,'LS001','LSCAB015','AS001'),
	(101,'005-01037','KARAWANG','DWI KUSWATI',20000000,'2018-03-14','TOYOTA','KIJANG SUPER KF 70 SHORT','1','TLO','ABU ABU METALIK','MINIBUS','MHF11KF7000020838','7K0191372','T 1157 HZ','N10122992',1997,24,0.9,180000,180000,'PASSANGER','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','180000,153000',333000,NULL,'LS001','LSCAB015','AS001'),
	(102,'007-00623','PONDOK GEDE','LILI RESKI UTAMI',40000000,'2018-03-14','PROTON','EXORA 1.6L A/T FL BASE LINE','1','TLO','SILVER','MINIBUS','PL1FZ6YRRCF082023','S4PHRV1315','B 118 RML','I10900862',2012,12,0.9,360000,360000,'PASSANGER','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','360000',360000,NULL,'LS001','LSCAB017','AS001'),
	(103,'008-01222','CIBINONG','DHARMA SAKA',55000000,'2018-03-14','SUZUKI','FUTURA PICKUP ST150','6','TLO','HITAM','PICKUP','MHYESL415GJ763385','G15AID1050318','B 9987 FAO','M07824227',2016,36,1.93,1061500,1061500,'COMMERCIAL','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','1061500,902275,743050',2706825,NULL,'LS001','LSCAB001','AS001'),
	(104,'008-01223','CIBINONG','DHARMA SAKA',105000000,'2018-03-14','MITSUBISHI','COLT DIESEL FE74S (4X2) M/T','6','TLO','KUNING','TRUCK','MHMFE74P4AK038867','4D34TF53410','F 8929 AK','H02146359',2010,36,1.93,2026500,2026500,'COMMERCIAL','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','2026500,1722525,1418550',5167575,NULL,'LS001','LSCAB001','AS001'),
	(105,'008-01224','CIBINONG','APON',56000000,'2018-03-14','TOYOTA','KIJANG UF 81','1','TLO','SILVER METALIK','MINIBUS','MHF11UF8110008666','1RZ7008498','B 99 UR','B0663402G',2001,36,0.9,504000,504000,'PASSANGER','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','504000,428400,352800',1285200,NULL,'LS001','LSCAB001','AS001'),
	(106,'009-01125','PURWAKARTA','ARIES JANUAR PERMANA',26000000,'2018-03-14','DAIHATSU','FEROZA LONG CHASIS 1589CC','1','TLO','BIRU METALIK','JEEP','28295','9377195','D 1119 DE','A2526873H',1995,12,0.9,234000,234000,'PASSANGER','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','234000',234000,NULL,'LS001','LSCAB019','AS001'),
	(107,'009-01126','PURWAKARTA','ADE ISAK ISKANDAR',50000000,'2018-03-14','SUZUKI','ST 150-PICK UP','6','TLO','HITAM','PICKUP','MHYESL415DJ273191','G15AID892063','T 8972 DJ','K00236238',2013,36,1.93,965000,965000,'COMMERCIAL','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','965000,820250,675500',2460750,NULL,'LS001','LSCAB019','AS001'),
	(108,'010-00890','CIMAHI','SOFYAN ISKANDAR',31000000,'2018-03-14','SUZUKI','GC415V APV DLX MT','1','TLO','MERAH METALIK','MINIBUS','MHYGDN42V8J304186','G15AID167662','D 1830 VCE','N00845430',2008,24,0.9,279000,279000,'PASSANGER','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','279000,237150',516150,NULL,'LS001','LSCAB006','AS001'),
	(109,'011-00805','KUNINGAN','MARTINA',30000000,'2018-03-14','ISUZU','TBR 54 PRLC/2499 CC','6','TLO','HITAM','PICKUP','MHCTBR54BYK088903','E088903','E 8349 KO','K02697940',2000,24,1.93,579000,579000,'COMMERCIAL','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','579000,492150',1071150,NULL,'LS001','LSCAB007','AS001'),
	(110,'014-01198','CIAMIS','SAPTINI',50000000,'2018-03-14','DAIHATSU','F 600 RV (XENIA) 1000CC','1','TLO','SILVER METALIK','MINIBUS','MHKFMREEJ4K000946','DN01193','Z 1206 VH','K06374928',2004,36,0.9,450000,450000,'PASSANGER','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','450000,382500,315000',1147500,NULL,'LS001','LSCAB009','AS001'),
	(111,'017-00682','TEGAL','ROVI LUQMAN NUL KHAKIM',107000000,'2018-03-14','SUZUKI','AVI 414 F DX (4X2) MT','1','TLO','PUTIH METALIK','MINIBUS','MHYKZE81SEJ215512','K14BT1118987','G 9084 NP','L03235095',2014,36,0.76,813200,813200,'PASSANGER','WILAYAH 3','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','813200,691220,569240',2073660,NULL,'LS001','LSCAB016','AS001'),
	(112,'018-01126','BANDUNG TENGAH','DEWI',60000000,'2018-03-14','DAIHATSU','S401RV-ZMDEJJ HJ','1','TLO','SILVER METALIK','MINIBUS','MHKV3BA3JDK029640','MD01317','D 1046 WP','K06402890',2013,36,0.9,540000,540000,'PASSANGER','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','540000,459000,378000',1377000,NULL,'LS001','LSCAB010','AS001'),
	(113,'026-00382','MADIUN','SUSANTO',120000000,'2018-03-14','TOYOTA','NEW AVANZA 1.3G MT','1','TLO','PUTIH','MINIBUS','MHKM1BA3JEJ056893','MD42917','AE 1114 SL','L01629054',2014,36,0.76,912000,912000,'PASSANGER','WILAYAH 3','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','912000,775200,638400',2325600,NULL,'LS001','LSCAB012','AS001'),
	(114,'028-00279','SEMARANG','SRI MULYATI',52000000,'2018-03-14','ISUZU','TBR 541 LS 25 MT','1','TLO','ABU ABU TUA METALIK','MINIBUS','MHCTBR54F1K223109','E223109','K 8411 UC','I11288465',2001,24,0.76,395200,395200,'PASSANGER','WILAYAH 3','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','395200,335920',731120,NULL,'LS001','LSCAB013','AS001'),
	(115,'001-00921','PASAR MINGGU','HANAFI',66000000,'2018-02-19','TOYOTA','AVANZA 1300 G','1','TLO','ABU ABU METALIK','MINIBUS','MHFM1BA3JBK379050','DJ66014','B 1843 EMN','N00686225',2011,24,0.9,594000,594000,'PASSANGER','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','594000,504900',1098900,NULL,'LS001','LSCAB003','AS001'),
	(116,'002-01587','SUKABUMI','HENDRI MULYANA',60000000,'2018-02-19','SUZUKI','GC415V APV STD MT','1','TLO','PUTIH','MINIBUS','MHYGDN41V9J303139','G15AID196638','F 1841 GM','L13040332',2009,36,0.9,540000,540000,'PASSANGER','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','540000,459000,378000',1377000,NULL,'LS001','LSCAB002','AS001'),
	(117,'002-01588','SUKABUMI','JIBAN SABAN',130000000,'2018-02-19','MITSUBISHI','FE71L 4X2 MT','6','TLO','KUNING','TRUCK','MHMFE71PCDK002215','4D34TJX1811','F 8287 SO','K06394894',2013,36,1.93,2509000,2509000,'COMMERCIAL','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','2509000,2132650,1756300',6397950,NULL,'LS001','LSCAB002','AS001'),
	(118,'003-01446','BOGOR','YULISTIN',60000000,'2018-02-19','TOYOTA','AVANZA 1.3 G AT','1','TLO','HITAM METALIK','MINIBUS','MHFM1BB3JAK001219','DE93757','F 1393 CH','G2572634H',2010,36,0.9,540000,540000,'PASSANGER','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','540000,459000,378000',1377000,NULL,'LS001','LSCAB004','AS001'),
	(119,'003-01447','BOGOR','NURHAYATI',70000000,'2018-02-19','NISSAN','GRAND LIVINA 1.8 XV M/T','1','TLO','HITAM METALIK','MINIBUS','MHBG1CG2F7J003868','MR18018455R','B 1510 OY','E8898656G',2007,24,0.9,630000,630000,'PASSANGER','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','630000,535500',1165500,NULL,'LS001','LSCAB004','AS001'),
	(120,'006-01461','SUBANG','SUHENDA',46000000,'2018-02-19','HONDA','JAZZ GD3 1.5 IDSI MT','1','TLO','MERAH','MINIBUS','MHRGD37205J001190','L15A42001854','A 1194 KN','M06856943',2005,24,0.9,414000,414000,'PASSANGER','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','414000,351900',765900,NULL,'LS001','LSCAB005','AS001'),
	(121,'008-01210','CIBINONG','FASEH SUKARDY',95000000,'2018-02-19','SUZUKI','TM2FX 4X2 AT','1','TLO','MERAH METALIK','MINIBUS','MA3NFG81SH0103839','K12MN4227514','B 2528 UFG','N02793244',2017,36,0.9,855000,855000,'PASSANGER','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','855000,726750,598500',2180250,NULL,'LS001','LSCAB001','AS001'),
	(122,'010-01369','CIMAHI','AYI SULAEMAN',99000000,'2018-02-19','TOYOTA','KIJANG INNOVA J','1','TLO','SILVER METALIK','MINIBUS','MHFXW40G2C4503127','1TR7282276','D 1531 ZK','J00727549',2012,36,0.9,891000,891000,'PASSANGER','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','891000,757350,623700',2272050,NULL,'LS001','LSCAB006','AS001'),
	(123,'011-00792','KUNINGAN','DANI HIDAYAT',35000000,'2018-02-19','SUZUKI','ST 150-PICK UP','6','TLO','BIRU','PICKUP','MHYESL415AJ175385','G15AID786756','E 8489 AW','M06390900',2010,36,1.93,675500,675500,'COMMERCIAL','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','675500,574175,472850',1722525,NULL,'LS001','LSCAB007','AS001'),
	(124,'012-01043','LEMBANG','ENTIN SITI FATIMAH',75000000,'2018-02-19','DAIHATSU','LUXIO 1.5 M MT','1','TLO','HITAM METALIK','MINIBUS','MHKW3CA2JCK006819','DCP4781','B 1504 KKR','I09527429',2012,24,0.9,675000,675000,'PASSANGER','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','675000,573750',1248750,NULL,'LS001','LSCAB008','AS001'),
	(125,'014-01179','CIAMIS','TONI',35000000,'2018-02-19','MITSUBISHI','KUDA VA1W PL','1','TLO','HIJAU SILVER','MINIBUS','VA1WPR004475','4G18045585','D 1893 EQ','M08455197',2000,24,0.9,315000,315000,'PASSANGER','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','315000,267750',582750,NULL,'LS001','LSCAB009','AS001'),
	(126,'014-01180','CIAMIS','TATANG TOHARI',99000000,'2018-02-19','HONDA','FREED GB3 1.5 S AT','1','TLO','PUTIH MUTIARA','MINIBUS','MHRGB3820CJ101340','L15A74819570','D 124 ML','I10426409',2012,36,0.9,891000,891000,'PASSANGER','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','891000,757350,623700',2272050,NULL,'LS001','LSCAB009','AS001'),
	(127,'018-01105','BANDUNG TENGAH','DADANG',115000000,'2018-02-19','MITSUBISHI','COLT DIESEL FE 71','6','TLO','KUNING','TRUCK','MHMFE71P1DK047090','4D34TJY6756','D 8261 XT','K06416929',2013,36,1.93,2219500,2219500,'COMMERCIAL','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','2219500,1886575,1553650',5659725,NULL,'LS001','LSCAB010','AS001'),
	(128,'018-01106','BANDUNG TENGAH','PRIA CAHYONO',82000000,'2018-02-19','TOYOTA','ETIOS 1.2G MT','1','TLO','COKLAT METALIK','MINIBUS','MHFK39BT4E2017007','3NRV195950','D 1086 XS','L11295667',2014,36,0.9,738000,738000,'PASSANGER','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','738000,627300,516600',1881900,NULL,'LS001','LSCAB010','AS001'),
	(129,'021-00768','SOLO','MELIA WINDIYANA',75000000,'2018-02-19','TOYOTA','KIJANG INNOVA G','1','TLO','HITAM METALIK','MINIBUS','MHFXW42G162075113','1TR6307878','B 700 PJ','H07668534',2006,24,0.9,675000,675000,'PASSANGER','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','675000,573750',1248750,NULL,'LS001','LSCAB011','AS001'),
	(130,'002-01589','SUKABUMI','NURDIANSYAH',90000000,'2018-02-20','MITSUBISHI','L300 PU STD-R (4X2) M/T','6','TLO','HITAM (KANZAI)','PICKUP','MHML0PU39EK157831','4D56CK88762','F 8923 UX','L03360706',2014,36,1.93,1737000,1737000,'COMMERCIAL','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','1737000,1476450,1215900',4429350,NULL,'LS001','LSCAB002','AS001'),
	(131,'002-01590','SUKABUMI','DEDE SITI JULAEHA',46000000,'2018-02-20','HONDA','ODYSSEY 2.4L AT','1','TLO','HITAM','MINIBUS','RB13012609','K24A5015005','B 2227 TBD','N06616504',2004,36,0.9,414000,414000,'PASSANGER','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','414000,351900,289800',1055700,NULL,'LS001','LSCAB002','AS001'),
	(132,'010-01370','CIMAHI','RADEN SLAMET RAHARDJO',140000000,'2018-02-20','TOYOTA','YARIS 1.5 G MT','2','TLO','MERAH METALIK','MINIBUS','MHFKT9F38E6017191','1NZZ056159','D 1439 YO','L04809022',2014,36,0.69,966000,966000,'PASSANGER','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','966000,821100,676200',2463300,NULL,'LS001','LSCAB006','AS001'),
	(133,'012-01044','LEMBANG','NANANG FAJAR SUGIRI',60000000,'2018-02-20','HONDA','JAZZ 1.5 IDSI AT/GD3','1','TLO','BIRU MUDA METALIK','MINIBUS','MHRGD38304J000988','L15A41042153','D 1776 GV','K02699625',2004,24,0.9,540000,540000,'PASSANGER','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','540000,459000',999000,NULL,'LS001','LSCAB008','AS001'),
	(134,'015-01081','BANDUNG TIMUR','IWAN BONIT VIRGIAWAN',90000000,'2018-02-20','MITSUBISHI','COLT DIESEL FE74S (4X2) M/T','6','TLO','KUNING KOMBINASI','TRUCK','MHMFE74P4AK041563','4D34TF61564','Z 9140 A','H03894622',2010,36,1.93,1737000,1737000,'COMMERCIAL','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','1737000,1476450,1215900',4429350,NULL,'LS001','LSCAB018','AS001'),
	(135,'018-01107','BANDUNG TENGAH','WAWAN SODIKIN',70000000,'2018-02-20','DAIHATSU','F 601 RV-GMDFJJ XENIA','1','TLO','MERAH MATALIK','MINIBUS','MHKV1BA2J9K050239','DE90382','D 1143 YTJ','N05675636',2009,36,0.9,630000,630000,'PASSANGER','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','630000,535500,441000',1606500,NULL,'LS001','LSCAB010','AS001'),
	(136,'001-00922','PASAR MINGGU','OOM',20000000,'2018-02-21','MITSUBISHI','COLT T120SS','6','TLO','BIRU PASIFIK I','PICKUP','MHMT120SP4R071653','4G17C481571','F 8901 P','D1242727H',2004,24,1.93,386000,386000,'COMMERCIAL','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','386000,328100',714100,NULL,'LS001','LSCAB003','AS001'),
	(137,'002-01592','SUKABUMI','UJANG SAEPULLOH',25000000,'2018-02-21','SUZUKI','AVI 414 F DX (4X2) MT','1','TLO','MERAH METALIK','MINIBUS','MHYKZE81SEJ214830','K14BT1118086','F 1320 UQ','K12667276',2014,24,0.9,225000,225000,'PASSANGER','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','225000,191250',416250,NULL,'LS001','LSCAB002','AS001'),
	(138,'008-01211','CIBINONG','SITI HAMINAH',37000000,'2018-02-21','SUZUKI','KATANA SHORT 2 WD GX','1','TLO','BIRU METALIK','JEEP','MHYESJ4102J093893','F10SID196463','B 8031 UR','M13042009',2002,36,0.9,333000,333000,'PASSANGER','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','333000,283050,233100',849150,NULL,'LS001','LSCAB001','AS001'),
	(139,'010-01371','CIMAHI','EDI MARSONGKO',65000000,'2018-02-21','DAIHATSU','F600RV GMDFJJ','1','TLO','MERAH METALIK','MINIBUS','MHKV1AA2J8K029042','DN70579','B 7302 IR','F0427805G',2008,36,0.9,585000,585000,'PASSANGER','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','585000,497250,409500',1491750,NULL,'LS001','LSCAB006','AS001'),
	(140,'014-01181','CIAMIS','SANTI KUSUMA DEWI',125000000,'2018-02-21','TOYOTA','ALPHARD 2.4 L A/T','1','TLO','HITAM','MINIBUS','ANH100152555','2AZB213890','D 1195 QS','E2076038J',2006,36,0.9,1125000,1125000,'PASSANGER','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','1125000,956250,787500',2868750,NULL,'LS001','LSCAB009','AS001'),
	(141,'018-01108','BANDUNG TENGAH','HASAN RIDWAN ABDUL RAHMAN',85000000,'2018-02-21','HONDA','ODYSSEY 2.3 L AT','1','TLO','HITAM METALIK','MINIBUS','RA61313791','F23A2516124','B 8135 GF','C7543332G',2004,24,0.9,765000,765000,'PASSANGER','WILAYAH 2','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','765000,650250',1415250,NULL,'LS001','LSCAB010','AS001'),
	(142,'021-00769','SOLO','SETYO HARI MURDANI',45000000,'2018-02-19','DAIHATSU','S401RP-PMREJJ HA','6','TLO','PUTIH','PICKUP','MHKP3BA1JDK060896','MB96912','AD 1691 TZ','M06529581I',2013,24,1.16,522000,477000,'COMMERCIAL','WILAYAH 3','2018-03-22',NULL,'NEW',0,1,'ACTIVE',NULL,'522000,443700',965700,NULL,'LS001','LSCAB011',NULL),
	(143,'026-00377','MADIUN','SUYOTO',77000000,'2018-02-19','ISUZU','TBR 541 LS 25 MT','1','TLO','MERAH METALIK','MINIBUS','MHCTBR54F1K210041','E210041','AE 1193 MA','H09762854',2001,36,0.76,585200,585200,'PASSANGER','WILAYAH 3','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','585200,497420,409640',1492260,NULL,'LS001','LSCAB012','AS001'),
	(144,'026-00378','MADIUN','ARIFIN',34000000,'2018-02-19','HONDA','JAZZ GD3 1.5 IDSI MT','1','TLO','MERAH','MINIBUS','MRHGD37805P103109','L15A22912477','AE 1057 JF','I11507766',2005,12,0.76,258400,258400,'PASSANGER','WILAYAH 3','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','258400',258400,NULL,'LS001','LSCAB012','AS001'),
	(145,'028-00274','SEMARANG','ARI MUSTIKAWATI',63000000,'2018-02-19','TOYOTA','KIJANG SUPER GRAND UF 81','1','TLO','SILVER METALIK','MINIBUS','MHF11UF81Y0004731','1RZ7004812','K 8494 WC','K03115162',2000,36,0.76,478800,478800,'PASSANGER','WILAYAH 3','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','478800,406980,335160',1220940,NULL,'LS001','LSCAB013','AS001'),
	(146,'021-00770','SOLO','SRI SUPRIYATMI',54000000,'2018-02-21','DAIHATSU','F501RV CSX 1.5','1','TLO','HITAM METALIK','MINIBUS','MHKTMRGHE2K002749','GE002749','AD 8476 RB','I06043931',2002,36,0.76,410400,410400,'PASSANGER','WILAYAH 3','2018-03-22','2018-03-22','NEW',1,1,'ACTIVE','bordero','410400,348840,287280',1046520,NULL,'LS001','LSCAB011','AS001');

/*!40000 ALTER TABLE `table_produksi` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table table_produksi_history
# ------------------------------------------------------------

DROP TABLE IF EXISTS `table_produksi_history`;

CREATE TABLE `table_produksi_history` (
  `id_prod_history` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_prod` int(11) DEFAULT NULL,
  `no_pin` varchar(255) NOT NULL DEFAULT '',
  `cabang` varchar(255) NOT NULL DEFAULT '',
  `nama_nasabah` text NOT NULL,
  `plafon` int(11) NOT NULL,
  `tgl_booking` date DEFAULT NULL,
  `merk` varchar(25) NOT NULL DEFAULT '',
  `tipe` text NOT NULL,
  `kategori` varchar(5) NOT NULL DEFAULT '',
  `jenis_asuransi` varchar(25) NOT NULL DEFAULT '',
  `warna` varchar(255) DEFAULT NULL,
  `model_kend` text NOT NULL,
  `no_rangka` varchar(100) NOT NULL DEFAULT '',
  `no_mesin` varchar(100) NOT NULL DEFAULT '',
  `no_polisi` varchar(25) NOT NULL DEFAULT '',
  `no_bpkb` varchar(25) NOT NULL DEFAULT '',
  `tahun` int(11) NOT NULL,
  `tenor` decimal(10,0) NOT NULL,
  `rate` double NOT NULL,
  `premi` int(11) NOT NULL,
  `premi_admin` int(11) DEFAULT NULL,
  `jenis_kendaraan` varchar(255) NOT NULL DEFAULT '',
  `wilayah` text NOT NULL,
  `tgl_upload` date DEFAULT NULL,
  `tgl_approve` date DEFAULT NULL,
  `status_perpanjangan` varchar(255) DEFAULT NULL,
  `status_proses` int(11) DEFAULT NULL,
  `status_produksi` int(11) DEFAULT NULL,
  `status_pinjaman` varchar(10) DEFAULT NULL,
  `jenis_penutupan` varchar(255) DEFAULT NULL,
  `premi_pertahun` text,
  `premi_sekaligus` int(11) DEFAULT NULL,
  `no_sertifikat` varchar(255) DEFAULT NULL,
  `id_master_leasing` varchar(255) DEFAULT NULL,
  `id_master_asuransi` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_prod_history`),
  KEY `id_master_leasing` (`id_master_leasing`),
  KEY `id_master_asuransi` (`id_master_asuransi`),
  CONSTRAINT `table_produksi_history_ibfk_1` FOREIGN KEY (`id_master_leasing`) REFERENCES `master_leasing` (`id_leasing`) ON DELETE CASCADE,
  CONSTRAINT `table_produksi_history_ibfk_2` FOREIGN KEY (`id_master_asuransi`) REFERENCES `master_asuransi` (`id_asuransi`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table testing_tables
# ------------------------------------------------------------

DROP TABLE IF EXISTS `testing_tables`;

CREATE TABLE `testing_tables` (
  `id_leasing_dokumen` int(11) NOT NULL AUTO_INCREMENT,
  `testing` varchar(255) NOT NULL DEFAULT '',
  `testing2` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_leasing_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` datetime(6) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `userid` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

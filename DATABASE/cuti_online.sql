# Host: localhost  (Version: 5.6.20)
# Date: 2016-08-21 09:35:20
# Generator: MySQL-Front 5.2  (Build 5.66)

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE */;
/*!40101 SET SQL_MODE='NO_ENGINE_SUBSTITUTION' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES */;
/*!40103 SET SQL_NOTES='ON' */;

DROP DATABASE IF EXISTS `cuti_online`;
CREATE DATABASE `cuti_online` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `cuti_online`;

#
# Source for table "admin"
#

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `username` varchar(15) NOT NULL DEFAULT '',
  `password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "admin"
#

INSERT INTO `admin` VALUES ('admin','admin');

#
# Source for table "managerhrd"
#

DROP TABLE IF EXISTS `managerhrd`;
CREATE TABLE `managerhrd` (
  `id_managerhrd` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `nama_managerhrd` varchar(50) DEFAULT NULL,
  `alamat_managerhrd` varchar(100) DEFAULT NULL,
  `jabatan_managerhrd` varchar(25) DEFAULT NULL,
  `telepon_managerhrd` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_managerhrd`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

#
# Data for table "managerhrd"
#

INSERT INTO `managerhrd` VALUES (2,'ryfan','ryfan','Ryfan Aditya','Perumahan Dasana Indah\r\nBlok RE 6 No 3','Staff Manager','081270761580'),(3,'michael','MICHAEL','Michael','Budi Luhur','Admin Lab 4','144234234');

#
# Source for table "pegawai"
#

DROP TABLE IF EXISTS `pegawai`;
CREATE TABLE `pegawai` (
  `id_pegawai` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `nama_pegawai` varchar(255) DEFAULT NULL,
  `jabatan_pegawai` varchar(255) DEFAULT NULL,
  `alamat_pegawai` varchar(255) DEFAULT NULL,
  `no_telfon_pegawai` varchar(255) DEFAULT NULL,
  `izin` int(2) DEFAULT NULL,
  `sakit` int(2) DEFAULT NULL,
  `alpha` int(2) DEFAULT NULL,
  PRIMARY KEY (`id_pegawai`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

#
# Data for table "pegawai"
#

INSERT INTO `pegawai` VALUES (1,'ryfan','ganteng','Localhost','Direktur Masa Kini','Perumahan Dasana Indah\r\nBlok RE 6 No 3','081270761580',2,2,2),(3,'joko','joko','Joko Priyono','Marketing Coming Soon','Pondok Aren Gan!','094384938934',1,1,1),(9,'agungjoe','agungajah','Agung Santoso','Kepala Lab','Jl. H Ilias RT 3 RW 10 Jakarta Selatan','085692886062',2,3,5),(11,'helmi','helmi','Helmi Nur Ihsan','SPV Penjadwalan','Ciledug','0812398321983',2,1,2),(12,'michael','michael','Michael','SPV Ganteng','Ciledug','12312321',3,1,2),(13,'tes','tes','tes','tes','tes','0821',1,1,1),(14,'arif','arif','Arif','Programmer','Sangiang','094039403',3,2,3);

#
# Source for table "permohonan"
#

DROP TABLE IF EXISTS `permohonan`;
CREATE TABLE `permohonan` (
  `kd_cuti` int(5) NOT NULL AUTO_INCREMENT,
  `id_managerhrd` int(5) DEFAULT NULL,
  `id_pegawai` int(5) DEFAULT NULL,
  `tgl_mulai_cuti` date DEFAULT NULL,
  `tgl_selesai_cuti` date DEFAULT NULL,
  `alasan_cuti` varchar(100) DEFAULT NULL,
  `keterangan` varchar(20) DEFAULT 'Proses',
  `izin` int(2) DEFAULT NULL,
  `sakit` int(2) DEFAULT NULL,
  `alpha` int(2) DEFAULT NULL,
  PRIMARY KEY (`kd_cuti`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

#
# Data for table "permohonan"
#

INSERT INTO `permohonan` VALUES (1,2,1,'2016-02-02','2016-02-04','Pulang Kampung','Tidak Disetujui',NULL,NULL,NULL),(2,2,11,'2016-08-01','2016-08-02','Melanjutkan Kuliah S2 di Universitas Ternama di Indonesia','Disetujui',2,1,2),(3,2,11,'2016-08-04','2016-08-12','Kangen Mantan','Disetujui',2,1,2),(4,2,12,'2016-02-02','2016-03-02','Ada Keperluan','Disetujui',3,1,2),(5,2,11,'2016-08-16','2016-08-26','Cuti 3','Disetujui',2,1,2),(6,2,11,'2016-08-01','2016-08-27','1231321','Disetujui',2,1,2),(7,2,11,'2016-08-06','2016-08-31','123456789','Disetujui',2,1,2),(8,2,11,'2016-08-01','2016-08-07','pergi','Disetujui',2,1,2),(9,3,11,'2016-01-01','2016-08-01','Menikmati Indahnya Dunia','Disetujui',2,1,2),(10,2,14,'2016-09-01','2016-08-07','Berlibur bersama keluarga','Tidak Disetujui',3,2,3);

/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

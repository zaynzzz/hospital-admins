/*
SQLyog Community v13.1.9 (64 bit)
MySQL - 10.4.22-MariaDB : Database - db_hospital
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_hospital` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `db_hospital`;

/*Table structure for table `tb_admin` */

DROP TABLE IF EXISTS `tb_admin`;

CREATE TABLE `tb_admin` (
  `id_admin` varchar(50) NOT NULL,
  `nama_admin` varchar(80) DEFAULT NULL,
  `username` varchar(40) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `level` enum('1','2') DEFAULT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_admin` */

insert  into `tb_admin`(`id_admin`,`nama_admin`,`username`,`password`,`level`) values 
('123','zairul zayn','zayn','123','1'),
('19','Keanu Reeves','Johnwick','321','2');

/*Table structure for table `tb_dokter` */

DROP TABLE IF EXISTS `tb_dokter`;

CREATE TABLE `tb_dokter` (
  `id_dokter` varchar(50) NOT NULL,
  `nama_dokter` varchar(50) DEFAULT NULL,
  `spesialis` varchar(50) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `no_telp` varchar(15) DEFAULT NULL,
  `is_active` int(1) DEFAULT 1,
  PRIMARY KEY (`id_dokter`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_dokter` */

insert  into `tb_dokter`(`id_dokter`,`nama_dokter`,`spesialis`,`alamat`,`no_telp`,`is_active`) values 
('123','Dr. Soeselo ','Ortopedician','Slawi, Tegal Jawa Tengah','0873267663',1),
('PS-1647405809','Masashi Kisimoto','Dokter Gigi','St. Melbourne, Aussie','0-328490283',1),
('PS-1647405849','Mr. John Wick','Dokter Gigi','St. Melbourne, Aussie','938094382032',1),
('PS-1647405886','Mr. Well Done','Dokter Bedah Hewan','St. Melbourne, Aussie','09778679898943',0),
('PS-1647407048','','','','',0);

/*Table structure for table `tb_menu` */

DROP TABLE IF EXISTS `tb_menu`;

CREATE TABLE `tb_menu` (
  `id_menu` varchar(15) NOT NULL,
  `menu_name` varchar(50) DEFAULT NULL,
  `menu_url` varchar(15) DEFAULT NULL,
  `icon` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_menu` */

insert  into `tb_menu`(`id_menu`,`menu_name`,`menu_url`,`icon`) values 
('1','Dashboard','Dashboard/index','fas fa-hospital'),
('2','Data Pasien','Pasien/index','fas fa-user'),
('3','Data Dokter','Dokter/index','fa fa-user-md '),
('4','Data Obat','Obat/index','fa fa-plus-square'),
('5','Rekam Medis','Rekamedis/index','fa fa-plus-square');

/*Table structure for table `tb_obat` */

DROP TABLE IF EXISTS `tb_obat`;

CREATE TABLE `tb_obat` (
  `id_obat` varchar(50) NOT NULL,
  `nama_obat` varchar(200) DEFAULT NULL,
  `ket_obat` text DEFAULT NULL,
  `is_active` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_obat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_obat` */

insert  into `tb_obat`(`id_obat`,`nama_obat`,`ket_obat`,`is_active`) values 
('123','Paramex','Obat sakit kepala',1),
('OBT-1647407080','Bodrex In','Bodrexin obat panas',1),
('OBT-1647407112','Paracetamol','Obat sakit kepala',1);

/*Table structure for table `tb_pasien` */

DROP TABLE IF EXISTS `tb_pasien`;

CREATE TABLE `tb_pasien` (
  `id_pasien` varchar(50) NOT NULL,
  `nik_pasien` varchar(50) DEFAULT NULL,
  `nama_pasien` varchar(80) DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `no_telp` varchar(15) DEFAULT NULL,
  `is_active` int(1) DEFAULT 1,
  PRIMARY KEY (`id_pasien`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_pasien` */

insert  into `tb_pasien`(`id_pasien`,`nik_pasien`,`nama_pasien`,`jenis_kelamin`,`alamat`,`no_telp`,`is_active`) values 
('12','544376574','Burger','L','Tokyo Japan','938094382032',1),
('PS-1647401588','123546546','','','Tokyo Japan','',1),
('PS-1647401660','7981798767','Burger XT Cheese','L','Tokyo Japan','938094382032',1),
('PS-1647405713','123213312','Masashi Kisimoto','','Tokyo Japan','0-328490283',0),
('PS-1647405746','21321','Masashi Kisimoto','','Tokyo Japan','938094382032',1),
('PS-1647412253','435422342','','','St. Melbourne, Aussie','',1);

/*Table structure for table `tb_poliklinik` */

DROP TABLE IF EXISTS `tb_poliklinik`;

CREATE TABLE `tb_poliklinik` (
  `id_poli` varchar(50) NOT NULL,
  `nama_poli` varchar(50) DEFAULT NULL,
  `gedung` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_poli`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_poliklinik` */

/*Table structure for table `tb_rekammedis` */

DROP TABLE IF EXISTS `tb_rekammedis`;

CREATE TABLE `tb_rekammedis` (
  `id_rm` varchar(50) NOT NULL,
  `id_pasien` varchar(50) DEFAULT NULL,
  `keluhan` text DEFAULT NULL,
  `id_dokter` varchar(50) DEFAULT NULL,
  `diagnosa` text DEFAULT NULL,
  `id_poli` varchar(50) DEFAULT NULL,
  `tgl_periksa` datetime DEFAULT NULL,
  PRIMARY KEY (`id_rm`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_rekammedis` */

insert  into `tb_rekammedis`(`id_rm`,`id_pasien`,`keluhan`,`id_dokter`,`diagnosa`,`id_poli`,`tgl_periksa`) values 
('3242432','12','Mencret','PS-1647405849','Diare Akut','321','2022-03-16 15:32:52'),
('432','PS-1647405746','Muntah cacing','PS-1647405886','Susah madang','123','2022-03-11 15:36:19');

/*Table structure for table `tb_rm_obat` */

DROP TABLE IF EXISTS `tb_rm_obat`;

CREATE TABLE `tb_rm_obat` (
  `id` int(8) NOT NULL,
  `id_rm` varchar(50) DEFAULT NULL,
  `id_obat` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_rm_obat` */

/*Table structure for table `trn_menu` */

DROP TABLE IF EXISTS `trn_menu`;

CREATE TABLE `trn_menu` (
  `level` int(1) DEFAULT NULL,
  `id_menu` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `trn_menu` */

insert  into `trn_menu`(`level`,`id_menu`) values 
(1,'1'),
(1,'2'),
(1,'3'),
(2,'3'),
(1,'4'),
(1,'5');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

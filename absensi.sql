# Host: localhost  (Version 5.5.5-10.4.27-MariaDB)
# Date: 2023-01-10 18:42:15
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Structure for table "hari_kerja"
#

DROP TABLE IF EXISTS `hari_kerja`;
CREATE TABLE `hari_kerja` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

#
# Data for table "hari_kerja"
#


#
# Structure for table "role"
#

DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

#
# Data for table "role"
#

INSERT INTO `role` VALUES (1,'Admin'),(2,'Pegawai');

#
# Structure for table "user"
#

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

#
# Data for table "user"
#

INSERT INTO `user` VALUES (1,'diko','202cb962ac59075b964b07152d234b70'),(52,'mahasiswa','202cb962ac59075b964b07152d234b70');

#
# Structure for table "karyawan"
#

DROP TABLE IF EXISTS `karyawan`;
CREATE TABLE `karyawan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `nama_karyawan` varchar(45) DEFAULT NULL,
  `nik` varchar(45) DEFAULT NULL,
  `tempat_lahir` varchar(45) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jk` varchar(45) DEFAULT NULL,
  `kontak` varchar(45) DEFAULT NULL,
  `jabatan` varchar(45) DEFAULT NULL,
  `agama` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_karyawan_User_idx` (`user_id`),
  CONSTRAINT `fk_karyawan_User` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

#
# Data for table "karyawan"
#

INSERT INTO `karyawan` VALUES (3,1,'Derek','20211003','Jayapura','2002-05-16','Laki-Laki','081345678910','Manajer','kristen'),(17,52,'Zarus','21110000','Jayapura','2003-05-15','Laki-Laki','081345678911','Komandan','Kristen');

#
# Structure for table "absen"
#

DROP TABLE IF EXISTS `absen`;
CREATE TABLE `absen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `karyawan_id` int(11) NOT NULL,
  `datang` time DEFAULT NULL,
  `pulang` time DEFAULT NULL,
  `izin` int(11) DEFAULT NULL,
  `hari_kerja_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_absen_karyawan1_idx` (`karyawan_id`),
  KEY `fk_absen_hari_kerja1_idx` (`hari_kerja_id`),
  CONSTRAINT `fk_absen_hari_kerja1` FOREIGN KEY (`hari_kerja_id`) REFERENCES `hari_kerja` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_absen_karyawan1` FOREIGN KEY (`karyawan_id`) REFERENCES `karyawan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

#
# Data for table "absen"
#


#
# Structure for table "userrole"
#

DROP TABLE IF EXISTS `userrole`;
CREATE TABLE `userrole` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_userrole_User1_idx` (`user_id`),
  KEY `fk_userrole_role1_idx` (`role_id`),
  CONSTRAINT `fk_userrole_User1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_userrole_role1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

#
# Data for table "userrole"
#

INSERT INTO `userrole` VALUES (4,1,1),(51,52,2);

/*
SQLyog Community v13.1.5  (64 bit)
MySQL - 10.4.10-MariaDB : Database 
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`uas_pwl_06959` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `uas_pwl_06959`;

/*Table structure for table `dosen` */

  DROP TABLE IF EXISTS `dosen`;

  CREATE TABLE `dosen` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `npp` char(16) NOT NULL,
    `namadosen` varchar(50) DEFAULT NULL,
    `homebase` char(10) DEFAULT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `dosen` */

insert  into `dosen`(`id`,`npp`,`namadosen`,`homebase`) values 
(1,'0686.11.1993.03','Sasono Wibowo, SE, M.Kom','A12'),
(2,'686.11.1990.000','lalang erawan','A12'),
(3,'0686.11.1991.011','Aris Nurhindarto, M.Kom','A12'),
(4,'0686.11.1992.026','Florentina Esti Nilawati, SH, MM','A12'),
(5,'0686.11.1996.080','Asih Rohmani, M.Kom','A12'),
(6,'0686.11.1997.108','Budi Widjajanto, M.Kom','A12'),
(7,'0686.11.1997.128','Lalang Erawan, M.Kom','A12'),
(8,'0686.11.1997.136','Acun Kardianawati, M.Kom','A12'),
(9,'0686.11.1997.138','Dr. Pujiono, S.Si., M.Kom','A12'),
(10,'0686.11.1998.152','MY. Teguh Sulistyono, M.Kom','A12'),
(11,'0686.11.1998.200','Affandy, Ph.D','A12'),
(12,'0686.11.2000.241','Yupie Kusumawati, SE, M.Kom','A12');


/*Table structure for table `kultawar` */

DROP TABLE IF EXISTS `kultawar`;

CREATE TABLE `kultawar` (
  `idkultawar` int(11) NOT NULL AUTO_INCREMENT,
  `matkul` char(20) DEFAULT NULL,
  `dosen` char(20) DEFAULT NULL,
  `klp` char(10) DEFAULT NULL,
  `hari` varchar(10) DEFAULT NULL,
  `jamkul` char(13) DEFAULT NULL,
  `ruang` char(6) DEFAULT NULL,
  PRIMARY KEY (`idkultawar`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `kultawar` */

insert  into `kultawar`(`idkultawar`,`matkul`,`dosen`,`klp`,`hari`,`jamkul`,`ruang`) values 
(1,'Matematika Diskrit','Dr. Pujiono, S.Si., M.Kom','A12.6201','Senin','07.00-08.40','H.5.5'),
(2,'Pengantar Teknologi Informasi','Budi Widjajanto, M.Kom','A12.6101','Senin','08.40-10.20','H.3.5'),
(3,'Ketrampilan Interpersonal','MY. Teguh Sulistyono, M.Kom','A12.6201','Selasa','10.20-12.00','H.3.5'),
(4,'Sistem Informasi Akuntansi','Sasono Wibowo, SE, M.Kom','A12.6302','Kamis','14.10-16.20','H.4.5'),
(5,'Algoritma dan Pemrograman II','Yupie Kusumawati, SE, M.Kom','A12.6301','Jumat','12.30-14.10','H.5.1'),
(6,'Pemrograman Web Lanjut','Lalang Erawan, M.Kom','A12.6701','Rabu','08.40-10.20','H.5.1'),
(7,'Sistem Pendukung Keputusan','Sasono Wibowo, SE, M.Kom','A12.6702','Jumat','10.20-12.00','H.3.2'),
(8,'Basis Data','Lalang Erawan, M.Kom','A12.6303','Kamis','08.40-10.20','H.5.5'),
(9,'Etika Profesi','Asih Rohmani, M.Kom','A12.6305','Senin','07.00-08.40','H.5.5'),
(10,'Algoritma dan Pemrograman II','MY. Teguh Sulistyono, M.Kom','A12.6204','Senin','07.00-08.40','H.3.5'),
(12,'Pendidikan Agama','Yupie Kusumawati, SE, M.Kom','A12.6603','Jumat','14.10-16.20','H.5.2'),
(13,'Algoritma dan Pemrograman II','MY. Teguh Sulistyono, M.Kom','A12.6803','Rabu','07.00-08.40','H.5.2');

/*Table structure for table `matkul` */

DROP TABLE IF EXISTS `matkul`;

CREATE TABLE `matkul` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kodematkul` char(10) DEFAULT NULL,
  `namamatkul` varchar(50) DEFAULT NULL,
  `sks` int(2) DEFAULT NULL,
  `jns` char(3) DEFAULT NULL,
  `smt` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `matkul` */

insert  into `matkul`(`id`,`kodematkul`,`namamatkul`,`sks`,`jns`,`smt`) values 
(1,'A12.56101','Matematika Diskrit',3,'T','1'),
(2,'A12.56102','Pengantar Teknologi Informasi',4,'T/P','1'),
(3,'A12.56103','Sistem Informasi',3,'T','1'),
(4,'A12.56104','Pengantar Manajemen',2,'T','1'),
(5,'A12.56105','Ketrampilan Interpersonal',2,'T','1'),
(6,'A12.56106','Bahasa Inggris I',2,'T','1'),
(7,'A12.56107','Dasar Akuntansi',3,'T','1'),
(8,'A12.56201','Algoritma dan Pemrograman I',4,'T/P','2'),
(9,'A12.56202','Sistem Informasi Akuntansi',3,'T','2'),
(10,'A12.56203','Pendidikan Agama',2,'T','2'),
(11,'A12.56204','Bahasa Inggris II',2,'T','2'),
(12,'A12.56205','Pengantar Bisnis',2,'T','2'),
(13,'A12.56206','Matematika Bisnis',3,'T','2'),
(14,'A12.56207','Sistem Informasi Manajemen',3,'T','2'),
(15,'A12.56301','Analisa Proses Bisnis',3,'T','3'),
(16,'A12.56302','Algoritma dan Pemrograman II',4,'T/P','3'),
(17,'A12.56303','Pemrograman Web',4,'T/P','3'),
(18,'A12.56304','Sistem Operasi',3,'T','3'),
(19,'A12.56305','Jaringan Komputer',4,'T','3'),
(20,'A12.56401','Basis Data',3,'T','4'),
(21,'A12.56402','Pemrograman Berorientasi Obyek',4,'T/P','4'),
(22,'A12.56403','Pemrograman Web Lanjut',2,'P','4'),
(23,'A12.56404','Analisa dan Perancangan Sistem Informasi I',3,'T','4'),
(24,'A12.56406','Konsep e-Bisnis',4,'T','4'),
(25,'A12.56501','Analisa dan Perancangan Sistem Informasi II',3,'T','5'),
(26,'A12.56502','Kewirausahaan',2,'T','5'),
(27,'A12.56503','Analisa dan Perancangan Sistem Informasi II',3,'T','5'),
(28,'A12.56504','Manajemen Sains',3,'T','5'),
(29,'A12.56505','Sistem Basis Data',3,'T','5'),
(30,'A12.56506','Interaksi Manusia dan Komputer',2,'T','5'),
(31,'A12.56507','Pengelolaan Hubungan Pelanggan',3,'T','5'),
(32,'A12.56601','Data Mining dan Data Warehouse',3,'T','6'),
(33,'A12.56602','Analisa Kinerja Sistem',3,'T','6'),
(34,'A12.56603','Sistem Pendukung Keputusan',3,'T','6'),
(35,'A12.56604','Perencanaan Strategis Sistem Informasi',2,'T','6'),
(36,'A12.56606','Perencanaan Sumber Daya Perusahaan',3,'T','6'),
(37,'A12.56607','Bisnis Cerdas',4,'T','5'),
(38,'A12.56608','Perancangan dan Pengembangan Sistem Informasi',4,'T','5'),
(39,'A12.56701','Pendidikan Kewarganegaraan',2,'T','7'),
(40,'A12.56702','Metodologi Penelitian',2,'T','7'),
(41,'A12.56703','Manajemen Rantai Pasok',3,'T','7'),
(42,'A12.56704','Manajemen Proyek',3,'T','7'),
(43,'A12.56705','Proteksi Aset Informasi',3,'T','7'),
(44,'A12.56706','Kerja Praktek',2,'T','7'),
(45,'A12.56707','Aplikasi e-Bisnis',4,'T','7'),
(46,'A12.56708','Tata Kelola dan Audit Sistem Informasi',4,'T','7'),
(47,'A12.56801','Bahasa Indonesia',2,'T','8'),
(48,'A12.56802','Etika Profesi',2,'T','8'),
(49,'A12.56803','Bimbingan Karir',2,'T','8'),
(50,'A12.56804','Tugas Akhir',6,'T','8'),
(51,'A12.A12.56','Implementasi dan Pengujian Sistem',2,'T','6');

/*Table structure for table `mhs` */

DROP TABLE IF EXISTS `mahasiswa`;

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nim` char(14) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `foto` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

/*Data for the table `mhs` */
INSERT INTO `mahasiswa` (`id`, `nim`, `nama`, `email`, `foto`) VALUES
(1, 'A12.2022.01959', 'Muhammad Fais Ramadhani', 'muhammadfaisramadhani@gmail.com', 'foto1.jpg'),
(2, 'A12.2022.05959', 'Muhammad Fais', 'muhammadfais@gmail.com', 'foto2.jpg'),
(3, 'A12.2022.04959', 'Muhammad Fais Ramadhani', '112202206959@mhs.dinus.ac.id', 'foto3.jpg'),
(4, 'A12.2022.03959', 'Muhammad Fais ', 'muhammadfais@gmail.com', 'foto4.jpg'),
(5, 'A12.2022.02959', 'Fais', 'fais@gmail.com', 'foto5.jpg'),
(6, 'A12.2022.06059', 'dhani', 'dhaniii@gmail.com', 'foto6.jpg'),
(7, 'A12.2022.06995', 'faisdhani', 'faisdhani@gmail.com', 'foto7.jpg'),
(8, 'A12.2022.06959', 'Muhammad Fais Ramadhani', '112202206959@mhs.dinus.ac.id', '6730ba222d63f.jpg'),
(9, 'A12.2022.09870', 'Akbar', 'akbar@gmail.com', '675e63aad091a.png'),
(10, 'A12.2000.06959', 'Ricki', 'ricki@gmail.com', '675e63f43aeac.png'),
(11, 'A12.2003.05959', 'Nopal', 'nopal@gmail.com', '675e64683a579.jpeg'),
(12, 'A12.2020.12345', 'Azzari', 'azzari@gmail.com', '675e64c468e44.jpeg'),
(13, 'A12.2021.54321', 'Annabil', 'annabil@gmail.com', '675e6524dc1e9.jpeg'),
(14, 'A12.2021.12345', 'Rava', 'rava@gmail.com', '675e656f49462.jpeg'),
(15, 'A12.2002.98765', 'Rama', 'rama@gmail.com', '675e65b9ad2e4.jpeg'),
(16, 'A12.2002.12345', 'Zaidan', 'zaidan@gmail.com', '675e6621958f1.jpeg');



/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `status` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

INSERT INTO `user` (`iduser`, `username`, `password`, `status`) VALUES
(1, 'A12.2022.06959', '0357a7592c4734a8b1e12bc48e29e9e9', 'mhs'),
(2, '0686', 'ce28eed1511f631af6b2a7bb0a85d636', 'dosen'),
(3, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(4, 'A12.2023.06959', 'e2a677e65a04760945836460b694e74d', 'mhs'),
(5, 'A12.2021.06959', '0357a7592c4734a8b1e12bc48e29e9e9', 'mhs');



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

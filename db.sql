-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.5.8-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for ci4_gis
CREATE DATABASE IF NOT EXISTS `ci4_gis` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `ci4_gis`;

-- Dumping structure for table ci4_gis.tbl_lokasi
CREATE TABLE IF NOT EXISTS `tbl_lokasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_toko` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `lat` varchar(50) DEFAULT NULL,
  `long` varchar(50) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

-- Dumping data for table ci4_gis.tbl_lokasi: ~27 rows (approximately)
/*!40000 ALTER TABLE `tbl_lokasi` DISABLE KEYS */;
INSERT INTO `tbl_lokasi` (`id`, `nama_toko`, `alamat`, `lat`, `long`, `deskripsi`, `foto`) VALUES
	(3, 'Alfamart Wahid Hasyim', 'Jl. Kyai H. Wahid Hasyim No.4, Kauman, Kec. Klojen, Kota Malang, Jawa Timur 65119', '-7.993576620383455', '112.62750627278922', 'Alfamart', '1670849763_41d723dfe36d9de306b8.jpg'),
	(7, 'Alfamart A. Yani Malang', 'Jl. Ahmad Yani No 14, 418306 No.Kel, Purwodadi, Kec. Blimbing, Kota Malang, Jawa Timur 65125', '-7.934211357003484', '112.64588889383221', 'Alfamart', '1670849779_e6ce557a1dd7da6c3574.jpg'),
	(8, 'Alfamart Himalaya Malang', 'Jl. Raya Candi VD, Karangbesuki, Kec. Sukun, Kota Malang, Jawa Timur 65151', '-7.9594364347530195', '112.59926288771902', 'Alfamart', '1670849802_b3c683918aa83d9960f0.jpg'),
	(9, 'Alfamart Gajayana', 'Jl. Gajayana No 19, 558980 No.Kel, Ketawanggede, Kec. Lowokwaru, Kota Malang, Jawa Timur 65145', '-7.948084629286721', '112.6088587821968', 'Alfamart', '1670849826_083a267e7ddceb64358a.jpg'),
	(10, 'Alfamart Landungsari Malang', 'Jl. Tirto Joyo, RT./Rw:05/RW.06 Kel, Landungsari, Kec. Dau, Kabupaten Malang, Jawa Timur 65151', '-7.932758511390082', '112.59855805827127', 'Alfamart', '1670849862_00be3b16511275d98469.jpg'),
	(11, 'Alfamart Adi Sucipto', 'Jl. Laksda Adi Sucipto No.165, Blimbing, Kec. Blimbing, Kota Malang, Jawa Timur 65125', '-7.943728276182815', '112.64861657176459', 'Alfamart', '1670849880_a3aefe28347a7e308450.jpg'),
	(12, 'Alfamart Letjen Sutoyo', 'Jl. Letjen Sutoyo Kel No.114, Purwantoro, Kec. Blimbing, Kota Malang, Jawa Timur 65122', '-7.958027763688721', '112.6379895249065', 'Alfamart', '1670849899_c93b9388f6692a52fff8.jpg'),
	(13, 'Alfamart M310 Brigjend Katamso', 'Jl. Brigjend. Katamso Kel No.52, Kauman, Kec. Klojen, Kota Malang, Jawa Timur 65119', '-7.9832802843220785', '112.62352950669838', 'Alfamart', '1670849929_ec6c64cdfefe407abcd9.jpg'),
	(14, 'Alfamart Nusakambangan', 'Jl. Nusakambangan Kel No.38, Kasin, Kec. Klojen, Kota Malang, Jawa Timur 65117', '-7.988091197708592', '112.62772529320503', 'Alfamart', '1670849958_8841cfcecadddd9f53f4.jpg'),
	(15, 'Alfamart Merjosari', 'Jl. Joyo Suryo No.Ds, Merjosari, Kec. Lowokwaru, Kota Malang, Jawa Timur 65144', '-7.941241758781774', '112.60150408216057', 'Alfamart', '1670849994_9cd0b84ef2865c517c92.jpg'),
	(16, 'Alfamart Jakarta Malang', 'Jl. Jakarta Dalam Blk. F-G No.Kel, Penanggungan, Kec. Klojen, Kota Malang, Jawa Timur 65113', '-7.963124540864035', '112.62486233553392', 'Alfamart', '1670850019_0dbf603478a7596a23bd.jpg'),
	(17, 'Alfamart Simpang Borobudur', 'Jl. Simpang Borobudur(404988, Kel, Mojolangu, Kec. Lowokwaru, Kota Malang, Jawa Timur 65142', '-7.938143984761026', '112.63741341099615', 'Alfamart', '1670850037_e2c1f8fd4729f67ad525.jpg'),
	(18, 'Alfamart Hamid Rusdi', 'Jl.Hamid Rusdi Kav.1(359845, Kesatrian, Kec. Blimbing, Kota Malang, Jawa Timur 65121', '-7.973112248906102', '112.64609963407106', 'Alfamart', '1670850057_de52b1d531705abf6663.jpg'),
	(19, 'Alfamart Candi Panggung', 'Jl. Candi Panggung Kel No.34, Mojolangu, Kec. Lowokwaru, Kota Malang, Jawa Timur 65142', '-7.938663684755976', '112.6295889999517', 'Alfamart', '1670850078_9877872a849d35145864.jpg'),
	(20, 'Alfamart Ade Irma', 'Jl. Ade Irma Suryani No.44, Kauman, Kec. Klojen, Kota Malang, Jawa Timur 65119', '-7.984404788829948', '112.6279758778628', 'Alfamart', '1670850123_10f39afe27eb152dd6e5.jpg'),
	(21, 'Alfamart Bendungan Sutami', 'Jl. Bendungan Sutami Kel No.15, Sumbersari, Kec. Lowokwaru, Kota Malang, Jawa Timur 65145', '-7.96326770279379', '112.61342208216058', 'Alfamart', '1670850143_8b5cdb3ac87ebb3da7f2.jpg'),
	(22, 'Alfamart pahlawan trip', 'Jl. Pahlawan Trip Kel No.25, Kauman, Kec. Klojen, Kota Malang, Jawa Timur 65119', '-7.96718955809738', '112.61984503308504', 'Alfamart', '1670850160_bff101d2bba430579751.jpg'),
	(23, 'Alfamart Bondowoso', 'Jl. Bondowoso No.11, Gading Kasri, Kec. Klojen, Kota Malang, Jawa Timur 65115', '-7.968261315531628', '112.6167754177428', 'Alfamart', '1670850177_9d68b8ec842184f15d7b.jpg'),
	(24, 'Alfamart Sulfat', 'Jl. Sulfat No.Kel, Bunulrejo, Kec. Blimbing, Kota Malang, Jawa Timur 65123', '-7.960031328182834', '112.64889463553392', 'Alfamart', '1670850194_d0c3bddd72b0e9c25aaa.jpg'),
	(25, 'Alfamart Suhat', 'Jl. Soekarno - Hatta No.666, Jatimulyo, Kec. Lowokwaru, Kota Malang, Jawa Timur 65141', '-7.948145989565744', '112.61694366436947', 'Alfamart', '1670850221_9660bcf0612709592526.jpg'),
	(26, 'Alfamart Dinoyo', 'Jl. MT. Haryono No.118, Dinoyo, Kec. Lowokwaru, Kota Malang, Jawa Timur 65144', '-7.941707128242149', '112.6091811956539', 'Alfamart', '1670850243_0741713e80c528c872ed.jpg'),
	(27, 'Alfamart Kalpataru', 'Jl. Kalpataru 90(4345650, Kel, Jatimulyo, Kec. Lowokwaru, Kota Malang, Jawa Timur 65141', '-7.949008363848736', '112.62767197541392', 'Alfamart', '1670850260_a27210042ba6e3c704cd.jpg'),
	(28, 'Alfamart Yulius Usman', 'Jl. Yulius Usman No.Kel, RW.39, Kasin, Kec. Klojen, Kota Malang, Jawa Timur 65117', '-7.985791703305762', '112.62582841774281', 'Alfamart', '1670850276_9f03c184aabc5920f0a3.jpg'),
	(29, 'Alfamart Sarangan Atas', 'Jl. Sarangan Atas No.46 Rt/Rw :03/04 Kel. Lowokwaru, Kel, Jatimulyo, Kec. Lowokwaru, Kota Malang, Jawa Timur 65141', '-7.959549246340688', '112.63225197541392', 'Alfamart', '1670850299_d3d992e43d4fe1a05860.jpg'),
	(30, 'Alfamart Halmahera', 'Jl. Halmahera No.Kel, Kasin, Kec. Klojen, Kota Malang, Jawa Timur 65117', '-7.993545578891037,', '112.62750106681837', 'Alfamart', '1670850331_563f78fb6d5ef6f38e55.jpg'),
	(36, 'tes', 'tes', 'tes', '12', '12', '1670916805_bfbd530131551a2ce188.jpg'),
	(37, 'tes2', 'tes2', '-7.951966934622852', '112.59209632873537', 'deket merjo', '1670916848_1610ab4e0f620d4bc1ea.jpg'),
	(38, 'gunung sari', 'gunung sari', '-7.970072679456622', '112.55729198455812', 'gunung sari', '1670916982_6e0016f3177b8e737d3c.jpg');
/*!40000 ALTER TABLE `tbl_lokasi` ENABLE KEYS */;

-- Dumping structure for table ci4_gis.tbl_user
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama_user` varchar(100) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) NOT NULL,
  `level` int(1) NOT NULL COMMENT '1: admin, 2:user',
  PRIMARY KEY (`id_user`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table ci4_gis.tbl_user: ~2 rows (approximately)
/*!40000 ALTER TABLE `tbl_user` DISABLE KEYS */;
INSERT INTO `tbl_user` (`id_user`, `nama_user`, `email`, `password`, `level`) VALUES
	(3, 'Rashad Fathin Kurniawan', 'fathin@gmail.com', '111', 1),
	(5, 'Geovanni Azam Janitra', 'geovannijanitra@gmail.com', '222', 2);
/*!40000 ALTER TABLE `tbl_user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

/*
Navicat MySQL Data Transfer

Source Server         : root
Source Server Version : 50534
Source Host           : localhost:3306
Source Database       : vb_proyek

Target Server Type    : MYSQL
Target Server Version : 50534
File Encoding         : 65001

Date: 2015-05-18 18:20:35
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `tbl_bmn`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_bmn`;
CREATE TABLE `tbl_bmn` (
  `no_inventaris` varchar(50) NOT NULL,
  `nama_bmn` varchar(50) NOT NULL,
  `asal_perolehan_bmn` varchar(30) NOT NULL,
  `kondisi` enum('Baik','Rusak','Hilang') NOT NULL,
  `foto` text NOT NULL,
  `status` enum('Dipinjam','Digudang','Ditempatkan') NOT NULL DEFAULT 'Digudang',
  `kode_satuan` int(3) NOT NULL,
  `kode_gudang` int(3) NOT NULL,
  PRIMARY KEY (`no_inventaris`),
  KEY `fk_kode_satuan_bmn` (`kode_satuan`),
  KEY `fk_kode_gudang_bmn` (`kode_gudang`),
  CONSTRAINT `fk_kode_gudang_bmn` FOREIGN KEY (`kode_gudang`) REFERENCES `tbl_gudang` (`kode_gudang`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_kode_satuan_bmn` FOREIGN KEY (`kode_satuan`) REFERENCES `tbl_satuan` (`kode_satuan`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_bmn
-- ----------------------------
INSERT INTO `tbl_bmn` VALUES ('30103040020001', 'Portable Generating Set', 'Jerman', 'Baik', 'motivasi-belajar1.png', 'Dipinjam', '16', '1');
INSERT INTO `tbl_bmn` VALUES ('30103050020001', 'Portable Water Pump', 'CV Garuda Nusantara', 'Baik', 'firefox-everywhere.png', 'Digudang', '16', '2');
INSERT INTO `tbl_bmn` VALUES ('30103050070001', 'Pompa Angin', 'UD Surya Jaya Tech', 'Baik', 'firefox-everywhere1.png', 'Dipinjam', '16', '1');
INSERT INTO `tbl_bmn` VALUES ('30201020030001', 'Mobil Mini Bus', 'PT Armada International', 'Baik', 'firefox-everywhere2.png', 'Dipinjam', '16', '1');
INSERT INTO `tbl_bmn` VALUES ('30201040010001', 'Sepeda Motor', 'PT Wahana Artha', 'Baik', 'firefox-everywhere3.png', 'Dipinjam', '16', '4');
INSERT INTO `tbl_bmn` VALUES ('30202010100001', 'Meja Dorong Saji/Trolley Saji', 'CV Matahari', 'Rusak', 'firefox-everywhere4.png', 'Digudang', '16', '2');
INSERT INTO `tbl_bmn` VALUES ('30301060010001', 'Mesin Gergaji', 'CV. Najah Hibatullah', 'Baik', 'firefox-everywhere5.png', 'Digudang', '16', '2');

-- ----------------------------
-- Table structure for `tbl_detail_peminjaman`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_detail_peminjaman`;
CREATE TABLE `tbl_detail_peminjaman` (
  `kode_detail_peminjaman` int(5) NOT NULL AUTO_INCREMENT,
  `kode_peminjaman` int(5) NOT NULL,
  `no_inventaris` varchar(50) NOT NULL,
  PRIMARY KEY (`kode_detail_peminjaman`),
  KEY `fk_no_inventaris_detail_peminjaman` (`no_inventaris`),
  KEY `fk_kode_peminjaman_detail_peminjaman` (`kode_peminjaman`),
  CONSTRAINT `fk_kode_peminjaman_detail_peminjaman` FOREIGN KEY (`kode_peminjaman`) REFERENCES `tbl_peminjaman` (`kode_peminjaman`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_no_inventaris_detail_peminjaman` FOREIGN KEY (`no_inventaris`) REFERENCES `tbl_bmn` (`no_inventaris`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_detail_peminjaman
-- ----------------------------
INSERT INTO `tbl_detail_peminjaman` VALUES ('3', '2', '30103040020001');
INSERT INTO `tbl_detail_peminjaman` VALUES ('4', '2', '30103050070001');
INSERT INTO `tbl_detail_peminjaman` VALUES ('5', '3', '30201020030001');
INSERT INTO `tbl_detail_peminjaman` VALUES ('6', '3', '30201040010001');

-- ----------------------------
-- Table structure for `tbl_gudang`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_gudang`;
CREATE TABLE `tbl_gudang` (
  `kode_gudang` int(3) NOT NULL AUTO_INCREMENT,
  `nama_gudang` varchar(30) NOT NULL,
  PRIMARY KEY (`kode_gudang`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_gudang
-- ----------------------------
INSERT INTO `tbl_gudang` VALUES ('1', 'Gudang 1');
INSERT INTO `tbl_gudang` VALUES ('2', 'Gudang 2');
INSERT INTO `tbl_gudang` VALUES ('4', 'Gudang 3');

-- ----------------------------
-- Table structure for `tbl_lokasi`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_lokasi`;
CREATE TABLE `tbl_lokasi` (
  `kode_lokasi` int(3) NOT NULL AUTO_INCREMENT,
  `nama_lokasi` varchar(30) NOT NULL,
  PRIMARY KEY (`kode_lokasi`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_lokasi
-- ----------------------------
INSERT INTO `tbl_lokasi` VALUES ('1', 'Lokasi 1');
INSERT INTO `tbl_lokasi` VALUES ('2', 'Lokasi 2');
INSERT INTO `tbl_lokasi` VALUES ('4', 'Lokasi 3');

-- ----------------------------
-- Table structure for `tbl_pegawai`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_pegawai`;
CREATE TABLE `tbl_pegawai` (
  `nip` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `jabatan` varchar(30) NOT NULL,
  `telepon` varchar(12) NOT NULL,
  PRIMARY KEY (`nip`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_pegawai
-- ----------------------------
INSERT INTO `tbl_pegawai` VALUES ('19611210 199103 2 001', 'Ir. N. Euis Sutaningsih', 'Perempuan', 'Sanggrahan RT 04/RW 19 No. Maguwoharjo MAGUWOHARJO/DEPOK', 'Fungsional Penyelidi', '081904097757');
INSERT INTO `tbl_pegawai` VALUES ('19620612 199003 1 001', 'Drs. Subandriyo, M.Si', 'Laki-Laki', 'Geblagan RT 1/RW 1, Tamantirto TAMANTIRTO/KASIHAN/BANTUL/D I YOGYAKARTA', 'Kepala BPPTKG', '0811293586');
INSERT INTO `tbl_pegawai` VALUES ('19630429 199603 1 001', 'Ir. Kusdaryanto', 'Laki-Laki', 'Jl. Sadewo No. 11, Wirobrajan', 'Fungsional Penyelidi', '08121568096');
INSERT INTO `tbl_pegawai` VALUES ('19670515 200212 1 002', 'Ahmad Sopari', 'Laki-Laki', 'Karang Mloko RT 02/RW 17 Sariharjo', 'Pengamat Gunung Merapi', '085868470447');
INSERT INTO `tbl_pegawai` VALUES ('19800827 199103 1 001', 'Agus Budi Santoso, S.Si', 'Laki-Laki', 'Demblaksari Rt 05 Baturetno Banguntapan', 'Penyelidik Geologi G', '321654987');
INSERT INTO `tbl_pegawai` VALUES ('19810525 200604 2 001', 'Agung Sih Damayanti', 'Perempuan', 'Blendangan RT 004/007. Tegaltirto TEGAL TIRTO/BERBAH', 'Teknisi Laboratorium', '081319065964');

-- ----------------------------
-- Table structure for `tbl_peminjaman`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_peminjaman`;
CREATE TABLE `tbl_peminjaman` (
  `kode_peminjaman` int(5) NOT NULL AUTO_INCREMENT,
  `nip` varchar(50) NOT NULL,
  `no_dokumen` varchar(30) NOT NULL,
  `keperluan` text NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `jenis` enum('Peminjaman','Penempatan','Pengembalian') NOT NULL,
  PRIMARY KEY (`kode_peminjaman`),
  KEY `fk_nip_peminjaman` (`nip`),
  CONSTRAINT `fk_nip_peminjaman` FOREIGN KEY (`nip`) REFERENCES `tbl_pegawai` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_peminjaman
-- ----------------------------
INSERT INTO `tbl_peminjaman` VALUES ('2', '19810525 200604 2 001', '12/hary/mei/penempatan/2015', 'Maintenance gardu pandang', '2015-05-12', '2015-05-30', 'Peminjaman');
INSERT INTO `tbl_peminjaman` VALUES ('3', '19670515 200212 1 002', '12/ahmad/mei/penempatan/2015', 'mau piknik', '2015-05-18', '0000-00-00', 'Peminjaman');

-- ----------------------------
-- Table structure for `tbl_satuan`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_satuan`;
CREATE TABLE `tbl_satuan` (
  `kode_satuan` int(3) NOT NULL AUTO_INCREMENT,
  `nama_satuan` varchar(20) NOT NULL,
  PRIMARY KEY (`kode_satuan`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_satuan
-- ----------------------------
INSERT INTO `tbl_satuan` VALUES ('9', 'Eksemplar');
INSERT INTO `tbl_satuan` VALUES ('14', 'Kardus');
INSERT INTO `tbl_satuan` VALUES ('15', 'Rol');
INSERT INTO `tbl_satuan` VALUES ('16', 'Unit');
INSERT INTO `tbl_satuan` VALUES ('19', 'Batang');
INSERT INTO `tbl_satuan` VALUES ('20', 'Buah');

-- ----------------------------
-- Table structure for `tbl_user`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE `tbl_user` (
  `kode_user` int(3) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) NOT NULL,
  `password` varchar(32) NOT NULL,
  `role` enum('Kepala Gudang','Pengelola Gudang') DEFAULT NULL,
  PRIMARY KEY (`kode_user`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_user
-- ----------------------------
INSERT INTO `tbl_user` VALUES ('1', 'kepala', '21232f297a57a5a743894a0e4a801fc3', 'Kepala Gudang');
INSERT INTO `tbl_user` VALUES ('2', 'pengelola', '21232f297a57a5a743894a0e4a801fc3', 'Pengelola Gudang');
INSERT INTO `tbl_user` VALUES ('5', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Kepala Gudang');

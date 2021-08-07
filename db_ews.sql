/*
 Navicat Premium Data Transfer

 Source Server         : Localhost
 Source Server Type    : MySQL
 Source Server Version : 100138
 Source Host           : localhost:3306
 Source Schema         : db_ews

 Target Server Type    : MySQL
 Target Server Version : 100138
 File Encoding         : 65001

 Date: 07/08/2021 19:42:20
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for pcounter_save
-- ----------------------------
DROP TABLE IF EXISTS `pcounter_save`;
CREATE TABLE `pcounter_save`  (
  `save_name` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `save_value` int(10) UNSIGNED NOT NULL
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for pcounter_users
-- ----------------------------
DROP TABLE IF EXISTS `pcounter_users`;
CREATE TABLE `pcounter_users`  (
  `user_ip` varchar(39) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `user_time` int(10) UNSIGNED NOT NULL,
  UNIQUE INDEX `user_ip`(`user_ip`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pcounter_users
-- ----------------------------
INSERT INTO `pcounter_users` VALUES ('837ec5754f503cfaaee0929fd48974e7', 1628339110);

-- ----------------------------
-- Table structure for refjenisaset
-- ----------------------------
DROP TABLE IF EXISTS `refjenisaset`;
CREATE TABLE `refjenisaset`  (
  `refjenisaset_id` int(11) NOT NULL AUTO_INCREMENT,
  `refjenisaset_nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `refjenisaset_status` enum('T','F') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'F',
  `refjenisaset_sysinsert` datetime(0) NULL DEFAULT NULL,
  `refjenisaset_sysupdate` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`refjenisaset_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of refjenisaset
-- ----------------------------
INSERT INTO `refjenisaset` VALUES (1, 'Elektronik', 'T', '2021-08-02 10:07:08', '2021-08-02 10:12:27');

-- ----------------------------
-- Table structure for refruang
-- ----------------------------
DROP TABLE IF EXISTS `refruang`;
CREATE TABLE `refruang`  (
  `refruang_id` int(11) NOT NULL AUTO_INCREMENT,
  `refruang_nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `refruang_status` enum('T','F') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'F',
  `refruang_sysinsert` datetime(0) NULL DEFAULT NULL,
  `refruang_sysupdate` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`refruang_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of refruang
-- ----------------------------
INSERT INTO `refruang` VALUES (3, 'Ruang 307 A', 'T', '2021-08-02 09:07:53', '2021-08-02 09:08:04');
INSERT INTO `refruang` VALUES (4, 'Ruang Lab Multimedia', 'T', '2021-08-02 09:08:17', '2021-08-02 09:08:17');

-- ----------------------------
-- Table structure for reftahun
-- ----------------------------
DROP TABLE IF EXISTS `reftahun`;
CREATE TABLE `reftahun`  (
  `reftahun_id` int(11) NOT NULL AUTO_INCREMENT,
  `reftahun_nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `reftahun_status` enum('T','F') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'F',
  `reftahun_sysinsert` datetime(0) NULL DEFAULT NULL,
  `reftahun_sysupdate` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`reftahun_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of reftahun
-- ----------------------------
INSERT INTO `reftahun` VALUES (1, '2020', 'T', '2021-08-02 09:25:21', '2021-08-02 09:38:34');
INSERT INTO `reftahun` VALUES (3, '2021', 'T', '2021-08-02 09:40:05', '2021-08-02 09:40:05');

-- ----------------------------
-- Table structure for tblinventaris
-- ----------------------------
DROP TABLE IF EXISTS `tblinventaris`;
CREATE TABLE `tblinventaris`  (
  `tblinventaris_id` int(11) NOT NULL AUTO_INCREMENT,
  `tblinventaris_nomor` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tblinventaris_namabarang` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tblinventaris_spesifikasi` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `tblinventaris_kondisi` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '',
  `tblinventaris_file` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `reftahun_id` int(10) NULL DEFAULT 0,
  `refruang_id` int(10) NULL DEFAULT NULL,
  `refjenisaset_id` int(10) NULL DEFAULT NULL,
  `tblinventaris_modified` datetime(0) NULL DEFAULT NULL,
  `tblinventaris_created` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`tblinventaris_id`) USING BTREE,
  UNIQUE INDEX `idx_username`(`tblinventaris_namabarang`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 13 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tblinventaris
-- ----------------------------
INSERT INTO `tblinventaris` VALUES (2, '121/FST/001-2019', 'PC All In One Acer Aspire AIO', 'Processor Intel Celeron J3060 Dual Core, Memori RAM 2 GB, Harddisk 500 GB', 'Baik', '5b2fde8f8ce9edb0e17fa9d812d17762_komputer.jpg', 1, 4, 1, '2021-08-02 20:57:28', '2021-08-02 20:57:28');
INSERT INTO `tblinventaris` VALUES (3, '130/FST/002-2021', 'Keyboard Voltre', 'Keyboard PC USB QWERTY Hitam', 'Baik', '2b7a479f9d22654dd4f1f9dc1d753919_Keyboard.jpg', 3, 4, 1, '2021-08-02 21:00:33', '2021-08-02 21:00:33');

-- ----------------------------
-- Table structure for tblmenu
-- ----------------------------
DROP TABLE IF EXISTS `tblmenu`;
CREATE TABLE `tblmenu`  (
  `tblmenu_id` int(11) NOT NULL AUTO_INCREMENT,
  `tblmenu_urutan` int(3) NULL DEFAULT NULL,
  `tblmenu_kode` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tblmenu_title` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tblmenu_icon` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tblmenu_link` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tblmenu_idparent` int(11) NULL DEFAULT NULL,
  `tblmenu_status` enum('header','detail') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`tblmenu_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 163 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tblmenu
-- ----------------------------
INSERT INTO `tblmenu` VALUES (1, 1, '001', 'Dashboard', 'fa-signal', 'dashboard', 0, '');
INSERT INTO `tblmenu` VALUES (13, 13, '006', 'Administrator', 'fa-gears', '#', 0, '');
INSERT INTO `tblmenu` VALUES (14, 14, '006.001', 'Setting Group', NULL, 'app/tblrole/grup', 13, '');
INSERT INTO `tblmenu` VALUES (15, 15, '006.002', 'Setting User', NULL, 'app/tblpengguna/pengguna', 13, '');
INSERT INTO `tblmenu` VALUES (16, 16, '006.003', 'Setting User Level', NULL, 'app/privileges', 13, '');
INSERT INTO `tblmenu` VALUES (104, NULL, '006.004', 'Setting Menu ', NULL, '#app/menu', 13, NULL);
INSERT INTO `tblmenu` VALUES (105, NULL, '007', 'Data Kontent', 'fa fa-briefcase', '#', 0, NULL);
INSERT INTO `tblmenu` VALUES (121, NULL, '005', 'Setting Web', 'fa fa-file', '#', 0, NULL);
INSERT INTO `tblmenu` VALUES (123, NULL, '005.001', 'Setting Slider', NULL, 'backend/setting_slider', 121, NULL);
INSERT INTO `tblmenu` VALUES (128, NULL, '007.001', 'Berita', NULL, 'kontent/berita', 105, NULL);
INSERT INTO `tblmenu` VALUES (155, NULL, '002', 'Referensi', 'fa-book', '#', 0, NULL);
INSERT INTO `tblmenu` VALUES (156, NULL, '002.001', 'Ref Ruang', NULL, 'referensi/ref_ruang', 155, NULL);
INSERT INTO `tblmenu` VALUES (157, NULL, '002.002', 'Ref Tahun', NULL, 'referensi/ref_tahun', 155, NULL);
INSERT INTO `tblmenu` VALUES (158, NULL, '002.003', 'Ref Jenis Aset', NULL, 'referensi/ref_jenisaset', 155, NULL);
INSERT INTO `tblmenu` VALUES (159, NULL, '003', 'Data Inventaris', 'fa-copy', 'aset/data_inventaris', 0, NULL);
INSERT INTO `tblmenu` VALUES (160, NULL, '004', 'Laporan', 'fa-print', 'laporan/lap_inventaris', 0, NULL);
INSERT INTO `tblmenu` VALUES (161, NULL, '005.002', 'Setting Tentang', NULL, 'kontent/kontent_web', 121, NULL);
INSERT INTO `tblmenu` VALUES (162, NULL, NULL, '', NULL, '', 0, NULL);

-- ----------------------------
-- Table structure for tblpengguna
-- ----------------------------
DROP TABLE IF EXISTS `tblpengguna`;
CREATE TABLE `tblpengguna`  (
  `tblpengguna_id` int(11) NOT NULL AUTO_INCREMENT,
  `tblpengguna_nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tblpengguna_username` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tblpengguna_email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tblpengguna_password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '',
  `tblpengguna_passori` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tblrole_id` int(10) NULL DEFAULT 0,
  `tblpengguna_idsubunit` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '0',
  `tblpengguna_status` enum('F','T') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'T',
  `tblpengguna_modified` datetime(0) NULL DEFAULT NULL,
  `tblpengguna_created` datetime(0) NULL DEFAULT NULL,
  `tblpengguna_foto` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tblpengguna_notelp` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tblpengguna_keterangan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`tblpengguna_id`) USING BTREE,
  UNIQUE INDEX `idx_username`(`tblpengguna_username`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 110 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tblpengguna
-- ----------------------------
INSERT INTO `tblpengguna` VALUES (109, 'Administrator Aplikasi', 'admin-1', 'rohman.mvg@gmail.com', '335f338bed2cef36d335d5c8d86f7ce1', NULL, 1, '0', 'T', NULL, '0000-00-00 00:00:00', '796cc3f0068ef681f03070c0f35e0082-upy.png', '082138389975', NULL);

-- ----------------------------
-- Table structure for tblrole
-- ----------------------------
DROP TABLE IF EXISTS `tblrole`;
CREATE TABLE `tblrole`  (
  `tblrole_id` int(10) NOT NULL AUTO_INCREMENT,
  `tblrole_code` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tblrole_desc` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`tblrole_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 37 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tblrole
-- ----------------------------
INSERT INTO `tblrole` VALUES (1, 'Administrator', 'Admin Web');

-- ----------------------------
-- Table structure for tblroleprivilege
-- ----------------------------
DROP TABLE IF EXISTS `tblroleprivilege`;
CREATE TABLE `tblroleprivilege`  (
  `tblroleprivilege_id` int(11) NOT NULL AUTO_INCREMENT,
  `tblrole_id` int(11) NULL DEFAULT NULL,
  `tblmenu_id` int(11) NULL DEFAULT NULL,
  `tblroleprivilege_iscreate` enum('T','F') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'F',
  `tblroleprivilege_isupdate` enum('F','T') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'F',
  `tblroleprivilege_isdelete` enum('T','F') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'F',
  `tblroleprivilege_issearch` enum('F','T') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tblroleprivilege_isprint` enum('F','T') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'F',
  `tblroleprivilege_isshow` enum('T','F') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'T' COMMENT 'T',
  PRIMARY KEY (`tblroleprivilege_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 725 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tblroleprivilege
-- ----------------------------
INSERT INTO `tblroleprivilege` VALUES (1, 1, 1, 'F', 'F', 'F', NULL, 'F', 'T');
INSERT INTO `tblroleprivilege` VALUES (10, 1, 13, 'F', 'F', 'F', NULL, 'F', 'T');
INSERT INTO `tblroleprivilege` VALUES (11, 1, 14, 'F', 'F', 'F', NULL, 'F', 'T');
INSERT INTO `tblroleprivilege` VALUES (12, 1, 15, 'F', 'F', 'F', NULL, 'F', 'T');
INSERT INTO `tblroleprivilege` VALUES (13, 1, 16, 'F', 'F', 'F', NULL, 'F', 'T');
INSERT INTO `tblroleprivilege` VALUES (15, 1, 31, 'F', 'F', 'F', NULL, 'F', 'T');
INSERT INTO `tblroleprivilege` VALUES (43, 20, 1, 'F', 'F', 'F', NULL, 'F', 'T');
INSERT INTO `tblroleprivilege` VALUES (48, 20, 13, 'F', 'F', 'F', NULL, 'F', 'F');
INSERT INTO `tblroleprivilege` VALUES (49, 20, 14, 'F', 'F', 'F', NULL, 'F', 'F');
INSERT INTO `tblroleprivilege` VALUES (50, 20, 15, 'F', 'F', 'F', NULL, 'F', 'F');
INSERT INTO `tblroleprivilege` VALUES (51, 20, 16, 'F', 'F', 'F', NULL, 'F', 'F');
INSERT INTO `tblroleprivilege` VALUES (106, 21, 1, 'F', 'F', 'F', NULL, 'F', 'T');
INSERT INTO `tblroleprivilege` VALUES (111, 21, 13, 'F', 'F', 'F', NULL, 'F', 'F');
INSERT INTO `tblroleprivilege` VALUES (112, 21, 14, 'F', 'F', 'F', NULL, 'F', 'F');
INSERT INTO `tblroleprivilege` VALUES (113, 21, 15, 'F', 'F', 'F', NULL, 'F', 'F');
INSERT INTO `tblroleprivilege` VALUES (114, 21, 16, 'F', 'F', 'F', NULL, 'F', 'F');
INSERT INTO `tblroleprivilege` VALUES (169, 22, 1, 'F', 'F', 'F', NULL, 'F', 'T');
INSERT INTO `tblroleprivilege` VALUES (174, 22, 13, 'F', 'F', 'F', NULL, 'F', 'F');
INSERT INTO `tblroleprivilege` VALUES (175, 22, 14, 'F', 'F', 'F', NULL, 'F', 'F');
INSERT INTO `tblroleprivilege` VALUES (176, 22, 15, 'F', 'F', 'F', NULL, 'F', 'F');
INSERT INTO `tblroleprivilege` VALUES (177, 22, 16, 'F', 'F', 'F', NULL, 'F', 'F');
INSERT INTO `tblroleprivilege` VALUES (232, 23, 1, 'F', 'F', 'F', NULL, 'F', 'T');
INSERT INTO `tblroleprivilege` VALUES (237, 23, 13, 'F', 'F', 'F', NULL, 'F', 'F');
INSERT INTO `tblroleprivilege` VALUES (238, 23, 14, 'F', 'F', 'F', NULL, 'F', 'F');
INSERT INTO `tblroleprivilege` VALUES (239, 23, 15, 'F', 'F', 'F', NULL, 'F', 'F');
INSERT INTO `tblroleprivilege` VALUES (240, 23, 16, 'F', 'F', 'F', NULL, 'F', 'F');
INSERT INTO `tblroleprivilege` VALUES (267, 24, 1, 'F', 'F', 'F', NULL, 'F', 'T');
INSERT INTO `tblroleprivilege` VALUES (272, 24, 13, 'F', 'F', 'F', NULL, 'F', 'F');
INSERT INTO `tblroleprivilege` VALUES (273, 24, 14, 'F', 'F', 'F', NULL, 'F', 'F');
INSERT INTO `tblroleprivilege` VALUES (274, 24, 15, 'F', 'F', 'F', NULL, 'F', 'F');
INSERT INTO `tblroleprivilege` VALUES (275, 24, 16, 'F', 'F', 'F', NULL, 'F', 'F');
INSERT INTO `tblroleprivilege` VALUES (336, 1, 60, 'F', 'F', 'F', NULL, 'F', 'F');
INSERT INTO `tblroleprivilege` VALUES (337, 20, 60, 'F', 'F', 'F', NULL, 'F', 'T');
INSERT INTO `tblroleprivilege` VALUES (338, 21, 60, 'F', 'F', 'F', NULL, 'F', 'T');
INSERT INTO `tblroleprivilege` VALUES (339, 22, 60, 'F', 'F', 'F', NULL, 'F', 'T');
INSERT INTO `tblroleprivilege` VALUES (340, 23, 60, 'F', 'F', 'F', NULL, 'F', 'T');
INSERT INTO `tblroleprivilege` VALUES (341, 24, 60, 'F', 'F', 'F', NULL, 'F', 'T');
INSERT INTO `tblroleprivilege` VALUES (415, 1, 70, 'F', 'F', 'F', NULL, 'F', 'T');
INSERT INTO `tblroleprivilege` VALUES (458, 1, 74, 'F', 'F', 'F', NULL, 'F', 'T');
INSERT INTO `tblroleprivilege` VALUES (459, 25, 1, 'F', 'F', 'F', NULL, 'F', 'T');
INSERT INTO `tblroleprivilege` VALUES (464, 25, 13, 'F', 'F', 'F', NULL, 'F', 'F');
INSERT INTO `tblroleprivilege` VALUES (465, 25, 14, 'F', 'F', 'F', NULL, 'F', 'F');
INSERT INTO `tblroleprivilege` VALUES (466, 25, 15, 'F', 'F', 'F', NULL, 'F', 'F');
INSERT INTO `tblroleprivilege` VALUES (467, 25, 16, 'F', 'F', 'F', NULL, 'F', 'F');
INSERT INTO `tblroleprivilege` VALUES (476, 25, 60, 'F', 'F', 'F', NULL, 'F', 'F');
INSERT INTO `tblroleprivilege` VALUES (483, 25, 70, 'F', 'F', 'F', NULL, 'F', 'F');
INSERT INTO `tblroleprivilege` VALUES (487, 25, 74, 'F', 'F', 'F', NULL, 'F', 'T');
INSERT INTO `tblroleprivilege` VALUES (490, 29, 1, 'F', 'F', 'F', NULL, 'F', 'T');
INSERT INTO `tblroleprivilege` VALUES (495, 29, 13, 'F', 'F', 'F', NULL, 'F', 'F');
INSERT INTO `tblroleprivilege` VALUES (496, 29, 14, 'F', 'F', 'F', NULL, 'F', 'F');
INSERT INTO `tblroleprivilege` VALUES (497, 29, 15, 'F', 'F', 'F', NULL, 'F', 'F');
INSERT INTO `tblroleprivilege` VALUES (498, 29, 16, 'F', 'F', 'F', NULL, 'F', 'F');
INSERT INTO `tblroleprivilege` VALUES (507, 29, 60, 'F', 'F', 'F', NULL, 'F', 'F');
INSERT INTO `tblroleprivilege` VALUES (514, 29, 70, 'F', 'F', 'F', NULL, 'F', 'F');
INSERT INTO `tblroleprivilege` VALUES (518, 29, 74, 'F', 'F', 'F', NULL, 'F', 'F');
INSERT INTO `tblroleprivilege` VALUES (521, 30, 1, 'F', 'F', 'F', NULL, 'F', 'T');
INSERT INTO `tblroleprivilege` VALUES (526, 30, 13, 'F', 'F', 'F', NULL, 'F', 'F');
INSERT INTO `tblroleprivilege` VALUES (527, 30, 14, 'F', 'F', 'F', NULL, 'F', 'F');
INSERT INTO `tblroleprivilege` VALUES (528, 30, 15, 'F', 'F', 'F', NULL, 'F', 'F');
INSERT INTO `tblroleprivilege` VALUES (529, 30, 16, 'F', 'F', 'F', NULL, 'F', 'F');
INSERT INTO `tblroleprivilege` VALUES (538, 30, 60, 'F', 'F', 'F', NULL, 'F', 'F');
INSERT INTO `tblroleprivilege` VALUES (545, 30, 70, 'F', 'F', 'F', NULL, 'F', 'F');
INSERT INTO `tblroleprivilege` VALUES (549, 30, 74, 'F', 'F', 'F', NULL, 'F', 'F');
INSERT INTO `tblroleprivilege` VALUES (583, 1, 75, 'F', 'F', 'F', NULL, 'F', 'T');
INSERT INTO `tblroleprivilege` VALUES (584, 25, 75, 'F', 'F', 'F', NULL, 'F', 'T');
INSERT INTO `tblroleprivilege` VALUES (585, 29, 75, 'F', 'F', 'F', NULL, 'F', 'T');
INSERT INTO `tblroleprivilege` VALUES (586, 30, 75, 'F', 'F', 'F', NULL, 'F', 'T');
INSERT INTO `tblroleprivilege` VALUES (590, 1, 76, 'F', 'F', 'F', NULL, 'F', 'T');
INSERT INTO `tblroleprivilege` VALUES (591, 25, 76, 'F', 'F', 'F', NULL, 'F', 'T');
INSERT INTO `tblroleprivilege` VALUES (592, 29, 76, 'F', 'F', 'F', NULL, 'F', 'T');
INSERT INTO `tblroleprivilege` VALUES (593, 30, 76, 'F', 'F', 'F', NULL, 'F', 'T');
INSERT INTO `tblroleprivilege` VALUES (666, 1, 104, 'F', 'F', 'F', NULL, 'F', 'T');
INSERT INTO `tblroleprivilege` VALUES (667, 1, 105, 'F', 'F', 'F', NULL, 'F', 'F');
INSERT INTO `tblroleprivilege` VALUES (683, 1, 121, 'F', 'F', 'F', NULL, 'F', 'T');
INSERT INTO `tblroleprivilege` VALUES (685, 1, 123, 'F', 'F', 'F', NULL, 'F', 'T');
INSERT INTO `tblroleprivilege` VALUES (690, 1, 128, 'F', 'F', 'F', NULL, 'F', 'F');
INSERT INTO `tblroleprivilege` VALUES (717, 1, 155, 'F', 'F', 'F', NULL, 'F', 'T');
INSERT INTO `tblroleprivilege` VALUES (718, 1, 156, 'F', 'F', 'F', NULL, 'F', 'T');
INSERT INTO `tblroleprivilege` VALUES (719, 1, 157, 'F', 'F', 'F', NULL, 'F', 'T');
INSERT INTO `tblroleprivilege` VALUES (720, 1, 158, 'F', 'F', 'F', NULL, 'F', 'T');
INSERT INTO `tblroleprivilege` VALUES (721, 1, 159, 'F', 'F', 'F', NULL, 'F', 'T');
INSERT INTO `tblroleprivilege` VALUES (722, 1, 160, 'F', 'F', 'F', NULL, 'F', 'T');
INSERT INTO `tblroleprivilege` VALUES (723, 1, 161, 'F', 'F', 'F', NULL, 'F', 'T');
INSERT INTO `tblroleprivilege` VALUES (724, 1, 162, 'F', 'F', 'F', NULL, 'F', 'F');

-- ----------------------------
-- Table structure for tblslider
-- ----------------------------
DROP TABLE IF EXISTS `tblslider`;
CREATE TABLE `tblslider`  (
  `tblslider_id` int(6) NOT NULL AUTO_INCREMENT,
  `tblslider_gambar` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tblslider_posisix` int(255) NULL DEFAULT NULL,
  `tblslider_posisiy` int(255) NULL DEFAULT NULL,
  `tblslider_text` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tblslider_text2` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tblslider_animasi` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tblslider_status` enum('F','T') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`tblslider_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tblslider
-- ----------------------------
INSERT INTO `tblslider` VALUES (5, '7d451896cceea0f9d5be9e849dafb07a_slider-1612323781.png', NULL, NULL, NULL, NULL, NULL, 'T');
INSERT INTO `tblslider` VALUES (6, '512580bdd52ae3fcba0bc9eb3b65ae62_bg-header.jpg', NULL, NULL, NULL, NULL, NULL, 'T');

-- ----------------------------
-- Table structure for tblslidertext
-- ----------------------------
DROP TABLE IF EXISTS `tblslidertext`;
CREATE TABLE `tblslidertext`  (
  `tblslidertext_id` int(11) NOT NULL AUTO_INCREMENT,
  `tblslider_id` int(11) NOT NULL,
  `tblslidertext_teks` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `tblslidertext_delay` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '100' COMMENT 'Delay Animation Text',
  PRIMARY KEY (`tblslidertext_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tblslidertext
-- ----------------------------
INSERT INTO `tblslidertext` VALUES (2, 1, 'Selamat Datang', '100');
INSERT INTO `tblslidertext` VALUES (3, 1, 'Dinas Kesehatan Kabupaten Musi Banyuasin', '400');
INSERT INTO `tblslidertext` VALUES (4, 2, 'Dinas Kesehatan', '100');
INSERT INTO `tblslidertext` VALUES (5, 2, 'Kabupaten Musi Banyuasin', '100');

-- ----------------------------
-- Table structure for tblwebconfig
-- ----------------------------
DROP TABLE IF EXISTS `tblwebconfig`;
CREATE TABLE `tblwebconfig`  (
  `tblwebconfig_id` int(11) NOT NULL AUTO_INCREMENT,
  `tblwebconfig_nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tblwebconfig_instansi` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tblwebconfig_singkatan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tblwebconfig_pemerintah` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tblwebconfig_logo` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tblwebconfig_alamat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tblwebconfig_telp` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tblwebconfig_fax` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tblwebconfig_email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tblwebconfig_kec` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tblwebconfig_kodepos` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tblwebconfig_barcode` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`tblwebconfig_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tblwebconfig
-- ----------------------------
INSERT INTO `tblwebconfig` VALUES (14, 'Early Warning System Inventaris Fakultas Sains & Teknologi UNIVERSITAS PGRI YOGYAKARTA', 'Fakultas Sains & Teknologi', 'SAINTEK', NULL, NULL, '-', '082138389975', '082138389975', '-', 'SAINTEK', '-', NULL);

-- ----------------------------
-- Table structure for tblwebkontent
-- ----------------------------
DROP TABLE IF EXISTS `tblwebkontent`;
CREATE TABLE `tblwebkontent`  (
  `tblwebkontent_id` int(11) NOT NULL AUTO_INCREMENT,
  `tblwebmenu_id` int(11) NULL DEFAULT NULL,
  `tblwebmodul_id` int(11) NULL DEFAULT NULL,
  `tblwebkontent_judul` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tblwebkontent_isi` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `tblwebkontent_file` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tblwebkontent_klik` int(11) NULL DEFAULT NULL,
  `tblwebkontent_sysinsert` datetime(0) NULL DEFAULT NULL,
  `tblwebkontent_mode` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tblwebkontent_tipe` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tblpengguna_id` int(11) NULL DEFAULT NULL,
  `tblwebkontent_status` enum('F','T') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'F',
  `tblwebkontent_isadafile` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tblwebkontent_tampilhome` enum('F','T') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'F',
  PRIMARY KEY (`tblwebkontent_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 39 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tblwebkontent
-- ----------------------------
INSERT INTO `tblwebkontent` VALUES (36, 1, NULL, 'Tentang LAPOR ! FST', '<p><strong>LAPOR ! FST</strong></p>\n\n<p>Pengelolaan pengaduan keadaan aset inventarisasi publik di Fakultas Sains dan Teknologi Universitas PGRI Yogyakarta&nbsp;belum terkelola secara efektif dan terintegrasi. Akibatnya jika terjadi kerusakan pada aset tidak langsung bisa teratasi dengan cepat. Oleh karena itu, sistem ini dibangun untuk mengatasi permasalahan tersebut.</p>\n\n<p>Fitur-fitur yang ada dalam LAPOR ! FST :</p>\n\n<p>1. Anonim: Fitur yang bisa dipilih oleh pelapor yang akan membuat identitas pelapor tidak akan diketahui oleh publik.<br />\n2. Tracking : Fitur untuk mengetahui / meninjau tindak lanjut dari pelaporan.</p>', '647806bf8c2b12dc49a6702c9270a092_logo3 (1).png', NULL, '2021-08-02 00:00:00', 'KONTENT', NULL, NULL, 'T', 'GAMBAR', 'F');
INSERT INTO `tblwebkontent` VALUES (37, NULL, NULL, 'fdsdf', '<p>sdfsdf</p>', 'ae7db85d59845b2a6c1cf9e87056bb2e_logo3 (1).png', 1, '2021-08-02 00:00:00', 'BERITA', NULL, NULL, 'T', NULL, 'F');
INSERT INTO `tblwebkontent` VALUES (38, NULL, NULL, 'sdffsfefe', '<p>efwefwf</p>', 'fafa5ea746ce88f7b78536198a0d1a0d_logo3 (1).png', 11, '2021-08-07 00:00:00', 'BERITA', NULL, NULL, 'T', NULL, 'F');

-- ----------------------------
-- Table structure for tblwebkontent_draft
-- ----------------------------
DROP TABLE IF EXISTS `tblwebkontent_draft`;
CREATE TABLE `tblwebkontent_draft`  (
  `tblwebkontent_id` int(11) NOT NULL AUTO_INCREMENT,
  `tblwebmenu_id` int(11) NULL DEFAULT NULL,
  `tblwebmodul_id` int(11) NULL DEFAULT NULL,
  `tblwebkontent_judul` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tblwebkontent_isi` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `tblwebkontent_file` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tblwebkontent_klik` int(11) NULL DEFAULT NULL,
  `tblwebkontent_sysinsert` datetime(0) NULL DEFAULT NULL,
  `tblwebkontent_mode` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tblpengguna_id` int(11) NULL DEFAULT NULL,
  `tblwebkontent_status` enum('F','T') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'F',
  `tblwebkontent_isadafile` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tblwebkontent_isditransfer` enum('F','T') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`tblwebkontent_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for tblwebkontentdownload
-- ----------------------------
DROP TABLE IF EXISTS `tblwebkontentdownload`;
CREATE TABLE `tblwebkontentdownload`  (
  `tblwebkontentdownload_id` int(11) NOT NULL AUTO_INCREMENT,
  `tblwebkontent_id` int(11) NULL DEFAULT NULL,
  `tblwebkontentdownload_nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tblwebkontentdownload_file` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tblwebkontentdownload_keterangan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `tblwebkontentdownload_status` enum('F','T') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'T',
  PRIMARY KEY (`tblwebkontentdownload_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tblwebmenu
-- ----------------------------
DROP TABLE IF EXISTS `tblwebmenu`;
CREATE TABLE `tblwebmenu`  (
  `tblwebmenu_id` int(11) NOT NULL AUTO_INCREMENT,
  `tblkategoridokumen_id` int(11) NULL DEFAULT NULL,
  `tblwebmenu_nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tblwebmenu_kode` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tblwebmenu_urutan` int(4) NULL DEFAULT NULL,
  `tblwebmenu_parent` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tblwebmenu_icon` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tblwebmenu_isparent` enum('F','T') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'T',
  `tblwebmenu_mode` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tblwebmenu_tipe` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tblwebmodul_id` int(11) NULL DEFAULT NULL,
  `tbldesa_id` int(11) NULL DEFAULT NULL,
  `tblwebmenu_link` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tblwebmenu_status` enum('F','T') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'T',
  `tblwebmenu_isdefault` enum('T','F') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'F',
  PRIMARY KEY (`tblwebmenu_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tblwebmenu
-- ----------------------------
INSERT INTO `tblwebmenu` VALUES (1, NULL, 'TENTANG LAPOR', NULL, NULL, '', '', 'T', 'kontent', NULL, NULL, NULL, '', 'T', 'F');

-- ----------------------------
-- Table structure for tblwebmodul
-- ----------------------------
DROP TABLE IF EXISTS `tblwebmodul`;
CREATE TABLE `tblwebmodul`  (
  `tblwebmodul_id` int(11) NOT NULL AUTO_INCREMENT,
  `tblwebmodul_nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tblwebmodul_keterangan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tblwebmodul_file` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tblwebmodul_status` enum('F','T') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'F',
  PRIMARY KEY (`tblwebmodul_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 34 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tblwebmodul
-- ----------------------------
INSERT INTO `tblwebmodul` VALUES (1, 'Modul Buku Tamu', '-', 'modul_bukutamu.php', 'T');
INSERT INTO `tblwebmodul` VALUES (2, 'Modul Gallery', '-', 'modul_gallery.php', 'T');
INSERT INTO `tblwebmodul` VALUES (3, 'Modul Berita', '-', 'modul_berita.php', 'T');
INSERT INTO `tblwebmodul` VALUES (4, 'Modul Download', '-', 'modul_download.php', 'T');
INSERT INTO `tblwebmodul` VALUES (5, 'Modul Kontak', '-', 'modul_kontak.php', 'T');
INSERT INTO `tblwebmodul` VALUES (9, 'Modul Status Proses', '-', 'modul_statusproses.php', 'T');
INSERT INTO `tblwebmodul` VALUES (10, 'Modul Perangkat Daerah', '-', 'modul_perangkatdaerah.php', 'T');
INSERT INTO `tblwebmodul` VALUES (11, 'Modul Informasi Izin', 'Modul untuk melihat informasi izin', 'modul_infoizin.php', 'T');
INSERT INTO `tblwebmodul` VALUES (12, 'Modul Page', '-', 'modul_pages.php', 'T');
INSERT INTO `tblwebmodul` VALUES (13, 'Modul Forum', '', 'modul_forum.php', 'T');
INSERT INTO `tblwebmodul` VALUES (14, 'Modul Aduan Konsumen', '-', 'modul_aduan.php', 'T');
INSERT INTO `tblwebmodul` VALUES (15, 'Modul Video', '-', 'modul_video.php', 'T');
INSERT INTO `tblwebmodul` VALUES (17, 'Modul Lihat Bukutamu', '-', 'modul_lihatbukutamu.php', 'T');
INSERT INTO `tblwebmodul` VALUES (19, 'Modul Saran Pengaduan', '-', 'modul_pengaduan.php', 'T');
INSERT INTO `tblwebmodul` VALUES (20, 'Modul Rute Perjalanan Ke Kantor', '-', 'modul_rutekantor.php', 'T');
INSERT INTO `tblwebmodul` VALUES (21, 'Modul Peta Kabupaten', '-', 'modul_petakabupaten.php', 'T');
INSERT INTO `tblwebmodul` VALUES (22, 'Modul Data Kecamatan', '-', 'modul_datakecamatan.php', 'T');
INSERT INTO `tblwebmodul` VALUES (23, 'Modul Regulasi', '-', 'modul_regulasi.php', 'T');
INSERT INTO `tblwebmodul` VALUES (24, 'Modul Agenda', '-', 'modul_agenda.php', 'T');
INSERT INTO `tblwebmodul` VALUES (25, 'Modul Data Pegawai', '-', 'modul_datapegawai.php', 'T');
INSERT INTO `tblwebmodul` VALUES (29, 'Modul Lapor Camat', '-', 'modul_laporcamat.php', 'T');
INSERT INTO `tblwebmodul` VALUES (30, 'Modul Struktur Organisasi', '-', 'modul_strukturorganisasi.php', 'T');
INSERT INTO `tblwebmodul` VALUES (31, 'Modul Muspika', '-', 'modul_instansi.php', 'T');
INSERT INTO `tblwebmodul` VALUES (32, 'Modul Paten', 'Modul Untuk Input Data Paten Online', 'modul_paten.php', 'T');
INSERT INTO `tblwebmodul` VALUES (33, 'Modul UPT', 'Modul UPT', 'modul_upt.php', 'T');

-- ----------------------------
-- View structure for vtblpengguna
-- ----------------------------
DROP VIEW IF EXISTS `vtblpengguna`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY INVOKER VIEW `vtblpengguna` AS select `tblpengguna`.`tblpengguna_nama` AS `nama`,`tblpengguna`.`tblpengguna_username` AS `username`,`tblpengguna`.`tblpengguna_id` AS `pengguna_id`,`tblpengguna`.`tblpengguna_idsubunit` AS `idsubunit`,`tblpengguna`.`tblpengguna_status` AS `status`,`tblrole`.`tblrole_code` AS `kode`,`tblrole`.`tblrole_desc` AS `deskripsi`,`tblpengguna`.`tblpengguna_email` AS `email`,`tblpengguna`.`tblpengguna_notelp` AS `notelp` from (`tblrole` join `tblpengguna` on((`tblrole`.`tblrole_id` = `tblpengguna`.`tblrole_id`))); ;

-- ----------------------------
-- View structure for vtblrolemenu
-- ----------------------------
DROP VIEW IF EXISTS `vtblrolemenu`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY INVOKER VIEW `vtblrolemenu` AS select `c`.`tblrole_id` AS `tblrole_id`,`c`.`tblrole_code` AS `tblrole_code`,`c`.`tblrole_desc` AS `tblrole_desc`,`b`.`tblmenu_id` AS `tblmenu_id`,`b`.`tblmenu_urutan` AS `tblmenu_urutan`,`b`.`tblmenu_kode` AS `tblmenu_kode`,`b`.`tblmenu_title` AS `tblmenu_title`,`b`.`tblmenu_icon` AS `tblmenu_icon`,`b`.`tblmenu_link` AS `tblmenu_link`,ifnull(`b`.`tblmenu_idparent`,0) AS `tblmenu_idparent`,`a`.`tblroleprivilege_id` AS `tblroleprivilege_id`,`a`.`tblroleprivilege_iscreate` AS `tblroleprivilege_iscreate`,`a`.`tblroleprivilege_isupdate` AS `tblroleprivilege_isupdate`,`a`.`tblroleprivilege_isdelete` AS `tblroleprivilege_isdelete`,`a`.`tblroleprivilege_issearch` AS `tblroleprivilege_issearch`,`a`.`tblroleprivilege_isprint` AS `tblroleprivilege_isprint`,`a`.`tblroleprivilege_isshow` AS `tblroleprivilege_isshow` from ((`tblroleprivilege` `a` join `tblmenu` `b` on((`a`.`tblmenu_id` = `b`.`tblmenu_id`))) join `tblrole` `c` on((`c`.`tblrole_id` = `a`.`tblrole_id`))) order by `c`.`tblrole_id`,`b`.`tblmenu_urutan`; ;

-- ----------------------------
-- View structure for vtblroleprivilege
-- ----------------------------
DROP VIEW IF EXISTS `vtblroleprivilege`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY INVOKER VIEW `vtblroleprivilege` AS select `tblroleprivilege`.`tblroleprivilege_id` AS `tblroleprivilege_id`,`tblroleprivilege`.`tblroleprivilege_iscreate` AS `tblroleprivilege_iscreate`,`tblroleprivilege`.`tblroleprivilege_isupdate` AS `tblroleprivilege_isupdate`,`tblroleprivilege`.`tblroleprivilege_isdelete` AS `tblroleprivilege_isdelete`,`tblroleprivilege`.`tblroleprivilege_issearch` AS `tblroleprivilege_issearch`,`tblroleprivilege`.`tblroleprivilege_isprint` AS `tblroleprivilege_isprint`,`tblroleprivilege`.`tblroleprivilege_isshow` AS `tblroleprivilege_isshow`,`tblroleprivilege`.`tblrole_id` AS `tblrole_id`,`tblmenu`.`tblmenu_idparent` AS `tblmenu_idparent`,`tblmenu`.`tblmenu_link` AS `tblmenu_link`,`tblmenu`.`tblmenu_icon` AS `tblmenu_icon`,`tblmenu`.`tblmenu_title` AS `tblmenu_title`,`tblmenu`.`tblmenu_kode` AS `tblmenu_kode`,`tblroleprivilege`.`tblmenu_id` AS `tblmenu_id` from (`tblroleprivilege` join `tblmenu` on((`tblroleprivilege`.`tblmenu_id` = `tblmenu`.`tblmenu_id`))) order by `tblroleprivilege`.`tblrole_id`,`tblmenu`.`tblmenu_urutan`; ;

-- ----------------------------
-- Triggers structure for table tblmenu
-- ----------------------------
DROP TRIGGER IF EXISTS `tblmenu_after_insert`;
delimiter ;;
CREATE TRIGGER `tblmenu_after_insert` AFTER INSERT ON `tblmenu` FOR EACH ROW BEGIN
INSERT INTO tblroleprivilege(
tblrole_id) (SELECT b.tblrole_id FROM tblrole b);
UPDATE tblroleprivilege SET tblmenu_id = NEW.tblmenu_id WHERE tblmenu_id IS NULL;
END
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table tblmenu
-- ----------------------------
DROP TRIGGER IF EXISTS `tblmenu_after_delete`;
delimiter ;;
CREATE TRIGGER `tblmenu_after_delete` AFTER DELETE ON `tblmenu` FOR EACH ROW DELETE FROM tblroleprivilege WHERE tblmenu_id = OLD.tblmenu_id
;
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table tblrole
-- ----------------------------
DROP TRIGGER IF EXISTS `tblrole_after_insert`;
delimiter ;;
CREATE TRIGGER `tblrole_after_insert` AFTER INSERT ON `tblrole` FOR EACH ROW BEGIN
INSERT INTO tblroleprivilege(
tblmenu_id) (SELECT b.tblmenu_id FROM tblmenu b);
UPDATE tblroleprivilege SET tblrole_id = NEW.tblrole_id WHERE tblrole_id IS NULL;
END
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table tblrole
-- ----------------------------
DROP TRIGGER IF EXISTS `tblrole_after_delete`;
delimiter ;;
CREATE TRIGGER `tblrole_after_delete` AFTER DELETE ON `tblrole` FOR EACH ROW DELETE FROM tblroleprivilege WHERE tblrole_id = OLD.tblrole_id
;
;;
delimiter ;

SET FOREIGN_KEY_CHECKS = 1;

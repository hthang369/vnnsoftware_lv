/*
 Navicat Premium Data Transfer

 Source Server         : mariadb_wsl
 Source Server Type    : MariaDB
 Source Server Version : 100325
 Source Host           : localhost:3308
 Source Schema         : vnnsoft

 Target Server Type    : MariaDB
 Target Server Version : 100325
 File Encoding         : 65001

 Date: 26/04/2021 13:55:48
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for adcategories
-- ----------------------------
DROP TABLE IF EXISTS `adcategories`;
CREATE TABLE `adcategories`  (
  `ADCategoryID` int(10) NOT NULL AUTO_INCREMENT,
  `FK_ADCategoryParentID` int(10) NOT NULL DEFAULT 0,
  `ADCategoryName` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ADCategoryDesc` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ADCategoryLink` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `AAImage` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT 'default_category.jpg',
  `ADCategoryLft` smallint(5) NULL DEFAULT 0,
  `ADCategoryRgt` smallint(5) NULL DEFAULT 0,
  `AATitle` varchar(65) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `AADescription` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `AAKeyWord` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `AAIsHome` bit(1) NOT NULL,
  `AAStatus` bit(1) NOT NULL,
  PRIMARY KEY (`ADCategoryID`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of adcategories
-- ----------------------------
INSERT INTO `adcategories` VALUES (1, 0, 'Giới thiệu', '', 'gioi-thieu', 'gioithieu.jpg', 1, 2, '', '', '', b'1', b'1');
INSERT INTO `adcategories` VALUES (2, 0, 'Dịch vụ', '', 'dich-vu', 'dichvu.jpg', 3, 8, '', '', '', b'1', b'1');
INSERT INTO `adcategories` VALUES (3, 0, 'Tin tức', '', 'tin-tuc', 'tintuc.jpg', 9, 18, '', '', '', b'1', b'1');
INSERT INTO `adcategories` VALUES (4, 2, 'Dịch vụ seo', 'Dịch vụ tối ưu hóa công cụ tìm kiếm hiệu quả, đưa website lên top nhanh chóng, bền vững với chi phí hợp lý nhất.', 'dich-vu-seo', 'dichvuseo.png', 4, 5, '', '', NULL, b'0', b'1');
INSERT INTO `adcategories` VALUES (5, 2, 'Thiết kế web', 'Thiết kế web với giao diện đẹp, độc đáo, sáng tạo. Hệ thống tính năng website đầy đủ, mang tính ứng dụng cao và phù hợp với từng doanh nghiệp.', 'thiet-ke-web', 'designweb.png', 6, 7, '', '', NULL, b'0', b'1');
INSERT INTO `adcategories` VALUES (6, 3, 'Kiến thức websire', '', 'kien-thuc-websire', 'default_category.jpg', 10, 11, '', '', NULL, b'0', b'1');
INSERT INTO `adcategories` VALUES (7, 3, 'Kiến thức seo', '', 'kien-thuc-seo', 'default_category.jpg', 12, 13, '', '', NULL, b'0', b'1');
INSERT INTO `adcategories` VALUES (8, 3, 'Công nghệ', '', 'cong-nghe', 'default_category.jpg', 14, 15, '', '', NULL, b'0', b'1');
INSERT INTO `adcategories` VALUES (9, 3, 'Thời sự', '', 'thoi-su', 'default_category.jpg', 16, 17, '', '', NULL, b'0', b'1');

-- ----------------------------
-- Table structure for adcontacts
-- ----------------------------
DROP TABLE IF EXISTS `adcontacts`;
CREATE TABLE `adcontacts`  (
  `ADContactID` int(10) NOT NULL AUTO_INCREMENT,
  `ADContactName` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ADContactTitle` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ADContactPhone` int(11) NULL DEFAULT NULL,
  `ADContactEmail` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ADContactAdd` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ADContactContent` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ADContactDate` datetime(0) NOT NULL,
  `PhanHoi` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`ADContactID`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of adcontacts
-- ----------------------------
INSERT INTO `adcontacts` VALUES (1, 'Thang', 'Thong tin hoc tap', NULL, 'datinhkiem2008@gmail.com', NULL, 'Thong tin hoc tap', '2014-06-17 00:22:36', 0);

-- ----------------------------
-- Table structure for adloghistorys
-- ----------------------------
DROP TABLE IF EXISTS `adloghistorys`;
CREATE TABLE `adloghistorys`  (
  `ADLogHistoryID` int(10) NOT NULL AUTO_INCREMENT,
  `ADUserName` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ADLogHistoryLogDate` datetime(0) NOT NULL DEFAULT current_timestamp,
  `ADLogHistoryLocalIP` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`ADLogHistoryID`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 79 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of adloghistorys
-- ----------------------------
INSERT INTO `adloghistorys` VALUES (1, 'langtu', '2018-07-22 16:37:16', '::1');
INSERT INTO `adloghistorys` VALUES (2, 'langtu', '2018-07-22 16:41:29', '::1');
INSERT INTO `adloghistorys` VALUES (3, 'langtu', '2018-07-23 13:14:34', '::1');
INSERT INTO `adloghistorys` VALUES (4, 'langtu', '2018-07-24 10:02:54', '::1');
INSERT INTO `adloghistorys` VALUES (5, 'langtu', '2018-07-25 10:15:47', '::1');
INSERT INTO `adloghistorys` VALUES (6, 'langtu', '2018-07-26 11:09:44', '::1');
INSERT INTO `adloghistorys` VALUES (7, 'langtu', '2018-07-27 18:18:18', '::1');
INSERT INTO `adloghistorys` VALUES (8, 'langtu', '2018-07-28 12:12:00', '::1');
INSERT INTO `adloghistorys` VALUES (9, 'langtu', '2018-07-28 12:12:03', '::1');
INSERT INTO `adloghistorys` VALUES (10, 'langtu', '2018-07-28 12:12:04', '::1');
INSERT INTO `adloghistorys` VALUES (11, 'langtu', '2018-07-28 12:12:05', '::1');
INSERT INTO `adloghistorys` VALUES (12, 'langtu', '2018-07-28 12:12:06', '::1');
INSERT INTO `adloghistorys` VALUES (13, 'langtu', '2018-07-28 12:12:11', '::1');
INSERT INTO `adloghistorys` VALUES (14, 'langtu', '2018-07-28 13:16:41', '::1');
INSERT INTO `adloghistorys` VALUES (15, 'langtu', '2018-07-29 19:54:23', '::1');
INSERT INTO `adloghistorys` VALUES (16, 'langtu', '2018-07-30 10:30:03', '::1');
INSERT INTO `adloghistorys` VALUES (17, 'langtu', '2018-07-30 13:29:26', '::1');
INSERT INTO `adloghistorys` VALUES (18, 'langtu', '2018-07-30 22:17:37', '::1');
INSERT INTO `adloghistorys` VALUES (19, 'langtu', '2018-07-31 19:26:56', '::1');
INSERT INTO `adloghistorys` VALUES (20, 'langtu', '2018-08-01 19:37:25', '::1');
INSERT INTO `adloghistorys` VALUES (21, 'langtu', '2018-08-02 20:42:47', '::1');
INSERT INTO `adloghistorys` VALUES (22, 'langtu', '2018-08-03 20:36:33', '::1');
INSERT INTO `adloghistorys` VALUES (23, 'langtu', '2018-08-04 22:54:37', '127.0.0.1');
INSERT INTO `adloghistorys` VALUES (24, 'langtu', '2018-08-04 22:57:00', '127.0.0.1');
INSERT INTO `adloghistorys` VALUES (25, 'langtu', '2018-08-04 23:01:41', '127.0.0.1');
INSERT INTO `adloghistorys` VALUES (26, 'langtu', '2018-08-04 23:03:11', '127.0.0.1');
INSERT INTO `adloghistorys` VALUES (27, 'langtu', '2018-08-05 17:49:12', '127.0.0.1');
INSERT INTO `adloghistorys` VALUES (28, 'langtu', '2018-08-07 20:23:44', '127.0.0.1');
INSERT INTO `adloghistorys` VALUES (29, 'langtu', '2018-08-07 20:25:17', '127.0.0.1');
INSERT INTO `adloghistorys` VALUES (30, 'langtu', '2018-08-08 10:51:11', '127.0.0.1');
INSERT INTO `adloghistorys` VALUES (31, 'langtu', '2018-08-09 22:11:32', '127.0.0.1');
INSERT INTO `adloghistorys` VALUES (32, 'langtu', '2018-08-09 22:27:18', '127.0.0.1');
INSERT INTO `adloghistorys` VALUES (33, 'langtu', '2018-08-09 22:28:45', '127.0.0.1');
INSERT INTO `adloghistorys` VALUES (34, 'langtu', '2018-08-09 22:44:05', '127.0.0.1');
INSERT INTO `adloghistorys` VALUES (35, 'langtu', '2018-08-10 14:31:31', '127.0.0.1');
INSERT INTO `adloghistorys` VALUES (36, 'langtu', '2018-08-10 14:47:12', '127.0.0.1');
INSERT INTO `adloghistorys` VALUES (37, 'langtu', '2018-08-11 14:57:07', '127.0.0.1');
INSERT INTO `adloghistorys` VALUES (38, 'langtu', '2018-08-13 20:19:53', '127.0.0.1');
INSERT INTO `adloghistorys` VALUES (39, 'langtu', '2018-08-14 19:48:41', '127.0.0.1');
INSERT INTO `adloghistorys` VALUES (40, 'langtu', '2018-09-01 20:53:19', '::1');
INSERT INTO `adloghistorys` VALUES (41, 'langtu', '2018-09-02 12:41:38', '::1');
INSERT INTO `adloghistorys` VALUES (42, 'langtu', '2018-10-29 19:27:11', '::1');
INSERT INTO `adloghistorys` VALUES (43, 'langtu', '2018-10-31 19:33:54', '::1');
INSERT INTO `adloghistorys` VALUES (44, 'langtu', '2018-11-05 21:25:13', '::1');
INSERT INTO `adloghistorys` VALUES (45, 'langtu', '2018-11-19 20:03:41', '::1');
INSERT INTO `adloghistorys` VALUES (46, 'langtu', '2018-11-19 22:20:59', '::1');
INSERT INTO `adloghistorys` VALUES (47, 'langtu', '2018-11-20 21:42:12', '::1');
INSERT INTO `adloghistorys` VALUES (48, 'langtu', '2018-11-25 14:39:17', '::1');
INSERT INTO `adloghistorys` VALUES (49, 'langtu', '2018-11-25 18:49:15', '::1');
INSERT INTO `adloghistorys` VALUES (50, 'langtu', '2018-11-25 19:12:22', '::1');
INSERT INTO `adloghistorys` VALUES (51, 'langtu', '2018-11-25 19:35:15', '::1');
INSERT INTO `adloghistorys` VALUES (52, 'langtu', '2018-11-25 19:36:24', '::1');
INSERT INTO `adloghistorys` VALUES (53, 'langtu', '2018-11-25 21:41:52', '::1');
INSERT INTO `adloghistorys` VALUES (54, 'langtu', '2018-11-28 21:01:17', '::1');
INSERT INTO `adloghistorys` VALUES (55, 'langtu', '2018-12-02 21:39:53', '::1');
INSERT INTO `adloghistorys` VALUES (56, 'langtu', '2018-12-03 22:08:48', '::1');
INSERT INTO `adloghistorys` VALUES (57, 'langtu', '2018-12-05 20:47:22', '::1');
INSERT INTO `adloghistorys` VALUES (58, 'langtu', '2018-12-09 12:54:27', '::1');
INSERT INTO `adloghistorys` VALUES (59, 'langtu', '2018-12-10 21:40:49', '::1');
INSERT INTO `adloghistorys` VALUES (60, 'langtu', '2018-12-11 20:25:01', '::1');
INSERT INTO `adloghistorys` VALUES (61, 'langtu', '2018-12-12 22:16:38', '::1');
INSERT INTO `adloghistorys` VALUES (62, 'langtu', '2018-12-13 20:22:12', '::1');
INSERT INTO `adloghistorys` VALUES (63, 'langtu', '2019-01-13 20:08:29', '::1');
INSERT INTO `adloghistorys` VALUES (64, 'langtu', '2019-01-14 20:53:15', '::1');
INSERT INTO `adloghistorys` VALUES (65, 'langtu', '2019-01-15 19:44:19', '::1');
INSERT INTO `adloghistorys` VALUES (66, 'langtu', '2019-02-05 15:48:10', '::1');
INSERT INTO `adloghistorys` VALUES (67, 'langtu', '2019-02-06 13:28:40', '::1');
INSERT INTO `adloghistorys` VALUES (68, 'langtu', '2019-02-07 15:41:42', '::1');
INSERT INTO `adloghistorys` VALUES (69, 'langtu', '2019-02-08 14:48:28', '::1');
INSERT INTO `adloghistorys` VALUES (70, 'langtu', '2019-02-08 17:52:51', '::1');
INSERT INTO `adloghistorys` VALUES (71, 'langtu', '2019-02-09 13:42:45', '::1');
INSERT INTO `adloghistorys` VALUES (72, 'langtu', '2019-02-10 16:12:10', '::1');
INSERT INTO `adloghistorys` VALUES (73, 'langtu', '2019-02-11 20:52:18', '::1');
INSERT INTO `adloghistorys` VALUES (74, 'langtu', '2019-02-13 19:52:08', '::1');
INSERT INTO `adloghistorys` VALUES (75, 'langtu', '2019-02-13 20:16:53', '::1');
INSERT INTO `adloghistorys` VALUES (76, 'langtu', '2019-02-17 15:22:54', '::1');
INSERT INTO `adloghistorys` VALUES (77, 'langtu', '2019-02-17 22:27:56', '::1');
INSERT INTO `adloghistorys` VALUES (78, 'langtu', '2019-02-19 19:56:44', '::1');

-- ----------------------------
-- Table structure for adoptions
-- ----------------------------
DROP TABLE IF EXISTS `adoptions`;
CREATE TABLE `adoptions`  (
  `ADOptionID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ADOptionName` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ADOptionValue` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `AAStatus` bit(1) NULL DEFAULT b'0',
  PRIMARY KEY (`ADOptionID`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of adoptions
-- ----------------------------
INSERT INTO `adoptions` VALUES (1, 'copyright', 'Copyright © 2019 - mocagency.net', b'1');
INSERT INTO `adoptions` VALUES (2, 'maps', 's:442:\"<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.152098755188!2d106.7031037142157!3d10.799660492305737!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317528ba22bf5097%3A0xc3519ebb24a94d61!2zMTk1IMSQaeG7h24gQmnDqm4gUGjhu6csIFBoxrDhu51uZyAxNSwgQsOsbmggVGjhuqFuaCwgSOG7kyBDaMOtIE1pbmgsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1547523500072\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>\";', b'1');
INSERT INTO `adoptions` VALUES (3, 'social_fanpage', 's:399:\"<iframe src=\"https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fmocagency.net%2F&tabs=events&width=340&height=199&small_header=true&adapt_container_width=false&hide_cover=false&show_facepile=false&appId=270067606532602\" width=\"340\" height=\"199\" style=\"border:none;overflow:hidden\" scrolling=\"no\" frameborder=\"0\" allowTransparency=\"true\" allow=\"encrypted-media\"></iframe>\";', b'1');
INSERT INTO `adoptions` VALUES (4, 'logo_ico', 's:13:\"logo_icon.ico\";', b'1');
INSERT INTO `adoptions` VALUES (5, 'background_contact', 's:11:\"contact.png\";', b'1');
INSERT INTO `adoptions` VALUES (6, 'logo_footer', 's:16:\"logo_footer1.png\";', b'1');

-- ----------------------------
-- Table structure for adpermissions
-- ----------------------------
DROP TABLE IF EXISTS `adpermissions`;
CREATE TABLE `adpermissions`  (
  `ADPermissionID` smallint(6) NOT NULL AUTO_INCREMENT,
  `ADUserGroupID` smallint(6) NULL DEFAULT NULL,
  `ADUserName` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `Module` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `Controller` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `Action` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ADPermissionNum` tinyint(4) NOT NULL,
  PRIMARY KEY (`ADPermissionID`) USING BTREE,
  INDEX `fk_nhom_quyen`(`ADUserGroupID`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 25 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of adpermissions
-- ----------------------------
INSERT INTO `adpermissions` VALUES (1, NULL, NULL, 'vnnadmin', 'welcome', 'index', 1);
INSERT INTO `adpermissions` VALUES (2, NULL, NULL, 'vnnadmin', 'welcome', 'cauhinh', 1);
INSERT INTO `adpermissions` VALUES (3, NULL, NULL, 'vnnadmin', 'music', NULL, 1);
INSERT INTO `adpermissions` VALUES (4, NULL, NULL, 'vnnadmin', 'account', NULL, 1);
INSERT INTO `adpermissions` VALUES (5, NULL, NULL, 'vnnadmin', 'autopost', NULL, 1);
INSERT INTO `adpermissions` VALUES (6, NULL, NULL, 'vnnadmin', 'vatgia', NULL, 1);
INSERT INTO `adpermissions` VALUES (7, NULL, NULL, 'vnnadmin', 'dashboard', NULL, 15);
INSERT INTO `adpermissions` VALUES (8, NULL, NULL, 'vnnadmin', 'media', '', 1);
INSERT INTO `adpermissions` VALUES (9, 4, NULL, 'vnnadmin', 'category', 'chuyenmuc', 15);
INSERT INTO `adpermissions` VALUES (10, 4, NULL, 'vnnadmin', 'category', 'lienketwebsite', 15);
INSERT INTO `adpermissions` VALUES (11, 4, NULL, 'vnnadmin', 'category', 'album', 15);
INSERT INTO `adpermissions` VALUES (12, 4, NULL, 'vnnadmin', 'welcome', 'index', 1);
INSERT INTO `adpermissions` VALUES (13, 5, NULL, 'vnnadmin', 'welcome', 'index', 1);
INSERT INTO `adpermissions` VALUES (14, 5, NULL, 'vnnadmin', 'student', 'hocsinh', 11);
INSERT INTO `adpermissions` VALUES (15, 5, NULL, 'vnnadmin', 'student', 'quatrinhht', 9);
INSERT INTO `adpermissions` VALUES (16, 5, NULL, 'vnnadmin', 'student', 'diem', 3);
INSERT INTO `adpermissions` VALUES (17, 4, NULL, 'vnnadmin', 'account', 'profile', 9);
INSERT INTO `adpermissions` VALUES (19, NULL, 'GV004', 'vnnadmin', 'student', 'xeplop', 3);
INSERT INTO `adpermissions` VALUES (20, 5, '', 'vnnadmin', 'account', 'profile', 9);
INSERT INTO `adpermissions` VALUES (21, 6, NULL, 'vnnadmin', 'welcome', 'index', 1);
INSERT INTO `adpermissions` VALUES (22, 6, NULL, 'vnnadmin', 'account', 'profile', 9);
INSERT INTO `adpermissions` VALUES (23, 6, NULL, 'vnnadmin', 'student', 'diem', 3);
INSERT INTO `adpermissions` VALUES (24, NULL, NULL, 'vnnadmin', 'welcome', 'quangcao', 1);

-- ----------------------------
-- Table structure for adposters
-- ----------------------------
DROP TABLE IF EXISTS `adposters`;
CREATE TABLE `adposters`  (
  `ADPosterID` int(10) NOT NULL AUTO_INCREMENT,
  `ADPosterName` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `AAImage` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ADPosterLink` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ADPosterType` enum('Silde','Poster') CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT 'Poster',
  `AAStatus` bit(1) NOT NULL,
  PRIMARY KEY (`ADPosterID`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of adposters
-- ----------------------------
INSERT INTO `adposters` VALUES (1, NULL, 'abcslide.jpg', NULL, 'Silde', b'1');

-- ----------------------------
-- Table structure for adposts
-- ----------------------------
DROP TABLE IF EXISTS `adposts`;
CREATE TABLE `adposts`  (
  `ADPostID` int(10) NOT NULL AUTO_INCREMENT,
  `ADUserName` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ADPostTitle` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ADPostDesc` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `FK_ADCategoryID` int(11) NULL DEFAULT 0,
  `AAImage` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ADPostLink` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ADPostContent` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ADPostPublicDate` datetime(0) NOT NULL DEFAULT current_timestamp,
  `ADPostView` int(10) NULL DEFAULT NULL,
  `ADPostTime` tinyint(4) NOT NULL,
  `ADPostDate` timestamp(0) NULL DEFAULT current_timestamp ON UPDATE CURRENT_TIMESTAMP,
  `AATitle` varchar(65) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `AADescription` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `AAKeyWord` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `AAStatus` bit(1) NULL DEFAULT b'0',
  PRIMARY KEY (`ADPostID`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 45 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of adposts
-- ----------------------------
INSERT INTO `adposts` VALUES (1, 'Thắng', 'Giới thiệu', '', 1, NULL, 'gioi-thieu', '<h2><span style=\"font-size:16px\"><span style=\"color:rgb(0, 0, 255)\">Th&ocirc;ng tin chung về VNNIT.</span></span></h2>\r\n\r\n<p><a href=\"https://skyvietnam.com.vn/gioi-thieu.html\" style=\"margin: 0px; padding: 0px; text-decoration-line: none; color: rgb(0, 0, 0);\"><span style=\"color:rgb(0, 0, 255)\"><strong>VNNIT</strong></span></a>&nbsp;l&agrave; nh&agrave; cung cấp Dịch vụ CNTT v&agrave; Giải ph&aacute;p Digital Marketing h&agrave;ng đầu Việt Nam. VNNIT ph&aacute;t triển với định hướng mang tới cho kh&aacute;ch h&agrave;ng c&aacute;c&nbsp;<strong><a href=\"https://skyvietnam.com.vn/\" style=\"margin: 0px; padding: 0px; text-decoration-line: none; color: rgb(0, 0, 0);\" title=\"dịch vụ phát triển website\" type=\"dịch vụ phát triển website\"><span style=\"color:rgb(0, 0, 255)\">dịch vụ ph&aacute;t triển website</span></a></strong>, marketing online,<span style=\"color:rgb(0, 0, 255)\"><strong>&nbsp;</strong></span><strong><a href=\"https://skyvietnam.com.vn/mail-google-apps-email-google-theo-ten-mien-rieng-cho-doanh-nghiep-a404.html\" style=\"margin: 0px; padding: 0px; text-decoration-line: none; color: rgb(0, 0, 0);\"><span style=\"color:rgb(0, 0, 255)\">email google theo t&ecirc;n miền</span></a></strong>, C&ocirc;ng nghệ hiện đại nhằm n&acirc;ng cao năng lực cạnh tranh, khẳng định vị thế tr&ecirc;n thị trường.<br />\r\n<strong><span style=\"color:rgb(0, 128, 0)\">Tầm nh&igrave;n:&nbsp;</span></strong>Trở th&agrave;nh nh&agrave; cung cấp Dịch vụ CNTT v&agrave; Giải ph&aacute;p Dịch vụ Digital Marketing h&agrave;ng đầu Việt Nam</p>\r\n\r\n<p><strong><span style=\"color:rgb(0, 128, 0)\">Sứ mệnh:&nbsp;</span></strong>Nghi&ecirc;n cứu ph&aacute;t triển c&aacute;c giải ph&aacute;p c&ocirc;ng nghệ, truyền th&ocirc;ng trực tuyến v&igrave; mục ti&ecirc;u ph&aacute;t triển v&agrave; tạo dựng gi&aacute; trị bền vững cho doanh nghiệp</p>\r\n\r\n<p><strong><span style=\"color:rgb(0, 128, 0)\">Gi&aacute; trị cốt l&otilde;i:&nbsp;</span></strong><br />\r\n&nbsp;-&nbsp;<em>Chuy&ecirc;n nghiệp:&nbsp;</em>Am hiểu c&ocirc;ng việc, &yacute; thức kỷ luật, lu&ocirc;n c&oacute; th&aacute;i độ t&iacute;ch cực v&agrave; cởi mở trong giao tiếp.</p>\r\n\r\n<p>&nbsp;-&nbsp;<em>Tận t&acirc;m:</em>&nbsp;M&ocirc;̣t tinh th&acirc;̀n trách nhi&ecirc;̣m cao cùng với sự n&ocirc;̃ lực h&ecirc;́t mình sẽ là sức mạnh to lớn vượt qua mọi khó khăn, thử thách đ&ecirc;̉ đạt được những mục ti&ecirc;u đã đ&ecirc;̀ ra. T&acirc;̣n t&acirc;m vì khách hàng, t&acirc;̣n t&acirc;m trong c&ocirc;ng vi&ecirc;̣c là tri&ecirc;́t lý hàng đ&acirc;̀u trong suy nghĩ và hành đ&ocirc;̣ng hướng tới v&igrave; mục ti&ecirc;u ph&aacute;t triển chung.<br />\r\n&nbsp;-&nbsp;<em>Đổi Mới:&nbsp;</em>Lu&ocirc;n lu&ocirc;n cập nhật kỹ thuật c&ocirc;ng nghệ, mang lại gi&aacute; trị hiệu quả đến kh&aacute;ch h&agrave;ng.<br />\r\n&nbsp;-&nbsp;<em>S&aacute;ng Tạo:&nbsp;</em>Học hỏi, n&acirc;ng cao năng lực bản th&acirc;n trong qu&aacute; tr&igrave;nh l&agrave;m việc lu&ocirc;n lu&ocirc;n suy nghĩ, t&igrave;m t&ograve;i v&agrave; học hỏi để t&igrave;m ra c&aacute;i mới, c&aacute;ch giải quyết tốt nhất để đạt được hiệu quả tốt nhất.<br />\r\n&nbsp;-&nbsp;<em>Bền Vững:&nbsp;</em>Ph&aacute;t triển to&agrave;n diện về mọi mặt, gi&aacute; trị cốt l&otilde;i lu&ocirc;n song h&agrave;nh với sự ph&aacute;t triển của c&ocirc;ng ty.</p>\r\n\r\n<div style=\"margin: 0px; padding: 0px; font-family: &quot;UTM Avo&quot;; font-size: 14px; text-align: center;\"><br />\r\n<a href=\"http://skyvietnam.com.vn/gioi-thieu.html\" style=\"margin: 0px; padding: 0px; text-decoration-line: none; color: rgb(0, 0, 0);\" title=\"Công ty Thiết kế web chuyên nghiệp VNNIT\" type=\"Công ty Thiết kế web chuyên nghiệp VNNIT\"><img alt=\"Công ty Cổ phần Công Nghệ Truyền Thông VNNIT\" src=\"https://skyvietnam.com.vn/uploads/images/logo-cong-ty-thiet-ke-website-chuyen-nghiep-sky-viet-nam.png\" style=\"height:161px; margin:0px; padding:0px; width:568px\" title=\"Công ty Cổ phần Công Nghệ Truyền Thông VNNIT\" /></a></div>\r\n\r\n<h3><br />\r\n<span style=\"color:rgb(0, 0, 255)\"><strong>Uy t&iacute;n, chất lượng l&agrave; yếu tố h&agrave;ng đầu</strong></span></h3>\r\n\r\n<p><span style=\"font-family:utm avo; font-size:14px\">Giữa h&agrave;ng trăm&nbsp;</span><a href=\"https://skyvietnam.com.vn/thiet-ke-website.html\" style=\"margin: 0px; padding: 0px; text-decoration-line: none; color: rgb(0, 0, 0); font-family: &quot;UTM Avo&quot;; font-size: 14px;\" title=\"công ty thiết kế website chuyên nghiệp\" type=\"công ty thiết kế website chuyên nghiệp\"><span style=\"color:rgb(0, 0, 255)\"><strong>c&ocirc;ng ty thiết kế website chuy&ecirc;n nghiệp</strong></span></a><span style=\"font-family:utm avo; font-size:14px\">, để giữ vững được chỗ đứng tr&ecirc;n thị trường c&ocirc;ng nghệ,&nbsp;</span><strong>VNNIT</strong><span style=\"font-family:utm avo; font-size:14px\">&nbsp;lu&ocirc;n lấy uy t&iacute;n, chất lượng l&agrave;m yếu tố h&agrave;ng đầu. Đến với&nbsp;</span><a href=\"https://skyvietnam.com.vn/thiet-ke-website.html\" style=\"margin: 0px; padding: 0px; text-decoration-line: none; color: rgb(0, 0, 0); font-family: &quot;UTM Avo&quot;; font-size: 14px;\" title=\"dịch vụ thiết kế website\" type=\"dịch vụ thiết kế website\"><span style=\"color:rgb(0, 0, 255)\"><strong>dịch vụ thiết kế website</strong></span></a><span style=\"font-family:utm avo; font-size:14px\">&nbsp;của&nbsp;</span><strong>VNNIT</strong><span style=\"font-family:utm avo; font-size:14px\">, kh&aacute;ch h&agrave;ng sẽ nhận được những mẫu website với h&igrave;nh thức bắt mắt, t&iacute;nh ứng dụng cao, t&iacute;ch hợp những tiến bộ hiện đại.</span><br />\r\n<br />\r\n<strong>VNNIT</strong><span style=\"font-family:utm avo; font-size:14px\">&nbsp;kh&ocirc;ng chỉ đi đầu trong lĩnh vực&nbsp;</span><a href=\"https://skyvietnam.com.vn/thiet-ke-website.html\" style=\"margin: 0px; padding: 0px; text-decoration-line: none; color: rgb(0, 0, 0); font-family: &quot;UTM Avo&quot;; font-size: 14px;\" title=\"Thiết kế website\" type=\"Công ty thiết kế website ấn tượng chuyên nghiệp chuẩn seo\"><strong><span style=\"color:rgb(0, 0, 255)\">thiết kế website</span></strong></a><span style=\"font-family:utm avo; font-size:14px\">&nbsp;m&agrave; c&ograve;n hỗ trợ những c&ocirc;ng cụ phụ trợ gi&uacute;p website nhanh ch&oacute;ng được nhiều người biết đến như&nbsp;</span><a href=\"https://emailgoogle.net/\" style=\"margin: 0px; padding: 0px; text-decoration-line: none; color: rgb(0, 0, 0); font-family: &quot;UTM Avo&quot;; font-size: 14px;\" title=\"dịch vụ email doanh nghiệp google theo tên miền\" type=\"Email google theo tên miền riêng\"><span style=\"color:rgb(0, 0, 255)\"><strong>dịch vụ email google</strong></span></a><span style=\"font-family:utm avo; font-size:14px\">,&nbsp;</span><a href=\"http://skyvietnam.com.vn/dich-vu-seo.html\" style=\"margin: 0px; padding: 0px; text-decoration-line: none; color: rgb(0, 0, 0); font-family: &quot;UTM Avo&quot;; font-size: 14px;\" title=\"dịch vụ SEO\" type=\"dịch vụ SEO\"><span style=\"color:rgb(0, 0, 255)\"><strong>dịch vụ SEO</strong></span></a><span style=\"font-family:utm avo; font-size:14px\">,&nbsp;</span><strong>Content Marketing</strong><span style=\"font-family:utm avo; font-size:14px\">,&nbsp;</span><a href=\"http://skyvietnam.com.vn/quang-cao-google.html\" style=\"margin: 0px; padding: 0px; text-decoration-line: none; color: rgb(0, 0, 0); font-family: &quot;UTM Avo&quot;; font-size: 14px;\" title=\"Quảng cáo Google\" type=\"Quảng cáo Google\"><span style=\"color:rgb(0, 0, 255)\"><strong>Quảng c&aacute;o Google</strong></span></a><span style=\"font-family:utm avo; font-size:14px\">&nbsp;hay những giải ph&aacute;p</span><strong>&nbsp;<a href=\"http://skyvietnam.com.vn/digital-marketing.html\" style=\"margin: 0px; padding: 0px; text-decoration-line: none; color: rgb(0, 0, 0);\" title=\"Digital Marketing\" type=\"Digital Marketing\"><span style=\"color:rgb(0, 0, 255)\">Digital Marketing</span></a></strong><span style=\"font-family:utm avo; font-size:14px\">&nbsp;tổng thể gi&uacute;p n&acirc;ng cao thứ hạng website của bạn tr&ecirc;n c&ocirc;ng cụ t&igrave;m kiếm Google.</span><br />\r\n&nbsp;</p>\r\n\r\n<h3><span style=\"color:rgb(0, 0, 255)\"><strong>Nh&acirc;n lực - t&agrave;i sản v&ocirc; gi&aacute; của ch&uacute;ng t&ocirc;i</strong></span></h3>\r\n\r\n<p><span style=\"font-family:utm avo; font-size:14px\">Kh&ocirc;ng chỉ nhấn mạnh v&agrave;o đầu tư cơ sở vật chất, ch&uacute;ng t&ocirc;i hiểu rằng đầu tư v&agrave;o con người l&agrave; khoản đầu tư l&acirc;u d&agrave;i v&agrave; bền vững nhất. V&igrave; vậy&nbsp;</span><strong>VNNIT</strong><span style=\"font-family:utm avo; font-size:14px\">&nbsp;lu&ocirc;n ch&uacute; trọng bồi dưỡng nguồn nh&acirc;n lực đủ sức, đủ t&agrave;i để tiếp thu những tiến bộ khoa học hiện đại. Với đội ngũ thiết kế trẻ, năng động, ham học hỏi, lu&ocirc;n cập nhật những mẫu thiết kế mới, ch&uacute;ng t&ocirc;i kh&ocirc;ng chỉ sẵn s&agrave;ng tư vấn cho qu&yacute; kh&aacute;ch h&agrave;ng khi c&oacute; nhu cầu m&agrave; c&ograve;n lu&ocirc;n song h&agrave;nh c&ugrave;ng bạn trong qu&aacute; tr&igrave;nh vận h&agrave;nh, quản trị website.</span><br />\r\n&nbsp;</p>\r\n\r\n<h3><span style=\"color:rgb(0, 0, 255)\"><strong>L&yacute; do n&ecirc;n chọn VNNIT cho dịch vụ thiết kế website của bạn?</strong></span></h3>\r\n\r\n<p><span style=\"font-family:utm avo; font-size:14px\">- Chất lượng lu&ocirc;n đảm bảo</span><br />\r\n<span style=\"font-family:utm avo; font-size:14px\">- Gi&aacute; th&agrave;nh cạnh tranh</span><br />\r\n<span style=\"font-family:utm avo; font-size:14px\">-&nbsp;</span><strong>Website thiết kế chuẩn SEO</strong><span style=\"font-family:utm avo; font-size:14px\">, dễ quản trị</span><br />\r\n<span style=\"font-family:utm avo; font-size:14px\">- Hỗ trợ c&aacute;c giải ph&aacute;p kinh doanh trực tuyến gi&uacute;p ph&aacute;t huy tối đa vai tr&ograve; của website trong kinh doanh.</span><br />\r\n<span style=\"font-family:utm avo; font-size:14px\">- Đội ngũ tư vấn khi kh&aacute;ch h&agrave;ng c&oacute; thắc mắc về dịch vụ</span><br />\r\n&nbsp;</p>\r\n\r\n<div style=\"margin: 0px; padding: 0px; font-family: &quot;UTM Avo&quot;; font-size: 14px; text-align: center;\"><a href=\"http://skyvietnam.com.vn/gioi-thieu.html\" style=\"margin: 0px; padding: 0px; text-decoration-line: none; color: rgb(0, 0, 0);\" title=\"Công ty thiết kế web chuyên nghiệp VNNIT\" type=\"Cong ty thiet ke web chuyen nghiep sky viet nam\"><img alt=\"http://skyvietnam.com.vn/gioi-thieu.html\" src=\"https://skyvietnam.com.vn/uploads/images/sky.jpg\" style=\"height:285px; margin:0px; padding:0px; width:825px\" /></a></div>\r\n\r\n<p><br />\r\n<span style=\"font-family:utm avo; font-size:14px\">L&agrave; một&nbsp;</span><u><strong>c&ocirc;ng ty thiết kế website</strong></u><span style=\"font-family:utm avo; font-size:14px\">&nbsp;trẻ, với đội ngũ kỹ sư năng động nhiệt t&igrave;nh, d&aacute;m nghĩ, d&aacute;m l&agrave;m,&nbsp;</span><strong>VNNIT</strong><span style=\"font-family:utm avo; font-size:14px\">&nbsp;cam kết đem đến những g&igrave; tốt đẹp nhất cho website của bạn. Đ&atilde; từng l&agrave;m việc với nhiều đối tượng kh&aacute;ch h&agrave;ng, thuộc mọi lĩnh vực ng&agrave;nh nghề kh&aacute;c nhau, ch&uacute;ng t&ocirc;i hiểu rằng sự h&agrave;i l&ograve;ng của qu&yacute; kh&aacute;ch h&agrave;ng l&agrave; thước đo th&agrave;nh c&ocirc;ng cho doanh nghiệp ch&uacute;ng t&ocirc;i. V&igrave; vậy, ch&uacute;ng t&ocirc;i lu&ocirc;n tr&acirc;n trọng v&agrave; lắng nghe &yacute; tưởng, mong mỏi của kh&aacute;ch h&agrave;ng cho sản phẩm website lu&ocirc;n đạt hiệu quả tốt nhất.</span><br />\r\n<br />\r\n<span style=\"font-family:utm avo; font-size:14px\">Qu&yacute; kh&aacute;ch c&oacute; nhu cầu hợp t&aacute;c, y&ecirc;u cầu dịch vụ, xin vui l&ograve;ng li&ecirc;n hệ:&nbsp;</span><span style=\"font-family:utm avo; font-size:16px\"><a href=\"tel:02462594245\" style=\"margin: 0px; padding: 0px; text-decoration-line: none; color: rgb(0, 0, 0);\" title=\"Liên hệ công ty VNNIT\" type=\"Liên hệ công ty VNNIT\"><span style=\"color:rgb(255, 0, 0)\"><strong>0246.259.4245</strong></span></a></span></p>', '2018-07-30 19:24:01', NULL, 0, '2018-07-30 20:44:04', NULL, NULL, NULL, b'1');
INSERT INTO `adposts` VALUES (2, 'langtu', 'ZapGrab ( công cụ chụp màn hình)', 'Giới thiệu: ZapGrab là phần mềm hỗ trợ người dùng chụp lại màn hình nhanh chóng và dễ dàng. Bạn có thể sử dụng tiện ích này để chụp lại bất cứ thứ gì hiển thị trên màn hình máy tính. Đáp ứng nhu cầu sử dụng ngày càng cao của người dùng, ZapGrab ra đời', 6, '51379231648.jpg', 'zapgrab-cong-cu-chup-man-hinh', '<p><span style=\"color:rgb(0, 0, 255); font-family:arial; font-size:14px\"><strong>Giới thiệu</strong></span><span style=\"color:rgb(0, 0, 0); font-family:arial; font-size:14px\">:&nbsp;</span><span style=\"color:rgb(153, 51, 0); font-family:arial; font-size:14px\"><strong>Z</strong><strong>apGrab</strong></span><strong>&nbsp;l&agrave; phần mềm hỗ trợ người d&ugrave;ng chụp lại m&agrave;n h&igrave;nh nhanh ch&oacute;ng v&agrave; dễ d&agrave;ng. Bạn c&oacute; thể sử dụng tiện &iacute;ch n&agrave;y để chụp lại bất cứ thứ g&igrave; hiển thị tr&ecirc;n m&agrave;n h&igrave;nh m&aacute;y t&iacute;nh.</strong><br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:arial; font-size:12px\">&nbsp;</span></p>\r\n\r\n<div style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; border-collapse: collapse; font-family: arial; line-height: 23px; text-align: justify;\">Đ&aacute;p ứng nhu cầu sử dụng ng&agrave;y c&agrave;ng cao của người d&ugrave;ng, ZapGrab ra đời l&agrave; một trong số những phần mềm gi&uacute;p người d&ugrave;ng chụp ảnh m&agrave;n h&igrave;nh m&aacute;y t&iacute;nh dễ d&agrave;ng v&agrave; hiệu quả. Nhờ c&oacute; ZapGrab giảm thiểu được kh&aacute; nhiều thao t&aacute;c sử dụng v&agrave; tiết kiệm thời gian đồng thời hiệu suất l&agrave;m việc cũng tăng cao.</div>\r\n\r\n<div style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; border-collapse: collapse; font-family: arial; line-height: 23px; text-align: center;\"><br />\r\n<img alt=\"download ZapGrab\" src=\"http://i1.download123.vn/cf/Images/thuyle/2013/9/zapgrab.jpg\" style=\"border-collapse:collapse; border:0px; height:369px; margin:0px; outline:0px; padding:0px; vertical-align:baseline; width:450px\" title=\"ZapGrab\" /></div>\r\n\r\n<div style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; border-collapse: collapse; font-family: arial; line-height: 23px; text-align: center;\">ZapGrab - Chụp ảnh m&agrave;n h&igrave;nh</div>\r\n\r\n<div style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; border-collapse: collapse; font-family: arial; line-height: 23px; text-align: justify;\"><br />\r\nZapGrab l&agrave; c&ocirc;ng cụ mạnh mẽ cho ph&eacute;p bạn chụp ảnh m&agrave;n h&igrave;nh, chụp to&agrave;n bộ m&agrave;n h&igrave;nh hoặc một phần tr&ecirc;n m&agrave;n h&igrave;nh chỉ với c&uacute; click chuột. Để chụp ảnh m&agrave;n h&igrave;nh người d&ugrave;ng chỉ cần click chuột v&agrave; sử dụng chuột tr&aacute;i qu&eacute;t khoanh v&ugrave;ng định chụp lại v&agrave; việc c&ograve;n lại ZapGrab sẽ gi&uacute;p bạn thực hiện.<br />\r\n<br />\r\nTh&ecirc;m v&agrave;o đ&oacute;, ZapGrab sở hữu giao diện th&acirc;n thiện v&agrave; trực quan t&iacute;ch hợp đầy đủ c&aacute;c chức năng tr&ecirc;n cửa sổ chương tr&igrave;nh n&ecirc;n người d&ugrave;ng c&oacute; thể dễ d&agrave;ng thao t&aacute;c v&agrave; sử dụng tr&ecirc;n đ&oacute;. Đặc biệt, ZapGrab được thiết kế kh&aacute; nhỏ gọn n&ecirc;n khi hoạt động kh&ocirc;ng l&agrave;m ảnh hưởng tới hệ thống cũng như c&aacute;c chương tr&igrave;nh đang hoạt động tr&ecirc;n đ&oacute;.<br />\r\n<br />\r\nC&oacute; thể n&oacute;i ZapGrab l&agrave; c&ocirc;ng cụ chụp ảnh m&agrave;n h&igrave;nh m&aacute;y t&iacute;nh kh&aacute; hữu &iacute;ch v&agrave; tuyệt vời hơn c&aacute;c c&ocirc;ng cụ c&ugrave;ng loại. Bạn c&oacute; thể d&ugrave;ng ZapGrab chụp ảnh bất kỳ đ&acirc;u tr&ecirc;n m&aacute;y t&iacute;nh chỉ với v&agrave;i gi&acirc;y.<br />\r\n<br />\r\n<strong>Những t&iacute;nh năng ch&iacute;nh của ZapGrab:</strong><br />\r\n<br />\r\n- Chụp ảnh m&agrave;n h&igrave;nh m&aacute;y t&iacute;nh dễ d&agrave;ng v&agrave; hiệu quả.<br />\r\n<br />\r\n- Chụp ảnh m&agrave;n h&igrave;nh m&aacute;y t&iacute;nh linh hoạt.<br />\r\n<br />\r\nZapGrab cho ph&eacute;p bạn chụp ảnh m&agrave;n h&igrave;nh, chụp to&agrave;n bộ m&agrave;n h&igrave;nh hoặc một phần tr&ecirc;n m&agrave;n h&igrave;nh chỉ với c&uacute; click.<br />\r\n<br />\r\n- H&igrave;nh ảnh chụp lại c&oacute; chất lượng cao.<br />\r\n<br />\r\n- Giao diện th&acirc;n thiện v&agrave; trực quan t&iacute;ch hợp đầy đủ c&aacute;c chức năng tr&ecirc;n cửa sổ chương tr&igrave;nh n&ecirc;n người d&ugrave;ng c&oacute; thể dễ d&agrave;ng thao t&aacute;c v&agrave; sử dụng tr&ecirc;n đ&oacute;.<br />\r\n<br />\r\n- Thiết kế nhỏ gọn v&agrave; kh&ocirc;ng l&agrave;m ảnh hưởng tới hệ thống.</div>', '2018-07-30 22:30:59', NULL, 0, '2018-08-02 21:33:48', NULL, NULL, NULL, b'1');
INSERT INTO `adposts` VALUES (3, 'langtu', 'You Select It ( hỗ trợ tạo Album ảnh )', 'Giới thiệu: You Select It là phần mềm hỗ trợ bạn tạo album ảnh nghệ thuật chuyên nghiệp và độc đáo. Đặc biệt, tiện ích cung cấp hàng trăm mẫu thiết kế và cho phép chỉnh sửa với bất kỳ định dạng hình ảnh nào. Dung lượng: 34.2 MB Các phần mềm chuyên dụng tạ', 6, '41379231258.jpg', 'you-select-it-ho-tro-tao-album-anh', '<p><span style=\"color:rgb(255, 0, 0); font-family:arial; font-size:14px\"><strong>Giới thiệu</strong></span><span style=\"color:rgb(0, 0, 0); font-family:arial; font-size:14px\">:&nbsp;</span><span style=\"font-family:arial; font-size:14px\">You Select It l&agrave; phần mềm hỗ trợ bạn tạo album ảnh nghệ thuật chuy&ecirc;n nghiệp v&agrave; độc đ&aacute;o. Đặc biệt, tiện &iacute;ch cung cấp h&agrave;ng trăm mẫu thiết kế v&agrave; cho ph&eacute;p chỉnh sửa với bất kỳ định dạng h&igrave;nh ảnh n&agrave;o.<br />\r\nDung lượng: 34.2 MB</span><br />\r\n<span style=\"font-family:arial\">C&aacute;c phần mềm chuy&ecirc;n dụng tạo album hỗ trợ rất tốt nhưng kh&ocirc;ng phải ai cũng c&oacute; thể sử dụng được bởi n&oacute; kh&aacute; phức tạp. Với sự ra đời You Select It sẽ l&agrave; giải ph&aacute;p tuyệt vời để tự thiết kế album ảnh d&agrave;nh cho người kh&ocirc;ng chuy&ecirc;n v&agrave; dễ d&agrave;ng trong sử dụng đối với mọi người sử dụng.</span></p>\r\n\r\n<div style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; border-collapse: collapse; font-family: arial; line-height: 23px; text-align: center;\"><br />\r\n<img alt=\"download  You Select It\" src=\"http://i1.download123.vn/cf/Images/thuyle/2013/9/you-select-it.jpg\" style=\"border-collapse:collapse; border:0px; height:373px; margin:0px; outline:0px; padding:0px; vertical-align:baseline; width:496px\" title=\" You Select It\" /></div>\r\n\r\n<div style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; border-collapse: collapse; font-family: arial; line-height: 23px; text-align: center;\"><br />\r\nYou Select It - Thiết kế album ảnh</div>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<div style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; border-collapse: collapse; font-family: arial; line-height: 23px; text-align: justify;\"><br />\r\nYou Select It cung cấp cho người d&ugrave;ng khả năng tạo cho ri&ecirc;ng m&igrave;nh bộ album ảnh độc đ&aacute;o với h&agrave;ng trăm mẫu thiết kế v&agrave; hiệu ứng. Đ&acirc;y thật sự l&agrave; tiện &iacute;ch nhỏ gọn mạnh mẽ v&agrave; kh&ocirc;ng thua k&eacute;m so với c&aacute;c c&ocirc;ng cụ tạo album chuy&ecirc;n nghiệp kh&aacute;c.<br />\r\n<br />\r\nĐể sử dụng You Select It, bạn chỉ cần mở c&aacute;c h&igrave;nh ảnh trong m&aacute;y của m&igrave;nh v&agrave;o cửa sổ chương tr&igrave;nh v&agrave; thực hiện c&aacute;c thao t&aacute;c chỉnh sửa để thiết kế album như: chỉnh sửa h&igrave;nh ảnh nghệ thuật, th&ecirc;m h&igrave;nh nền, khung trang tr&iacute;, ch&egrave;n văn bản, ... Chắc hẳn bạn sẽ ngạc nhi&ecirc;n khi bộ album được tạo ra chuy&ecirc;n nghiệp v&agrave; đẹp đến kh&ocirc;ng ngờ.<br />\r\n<br />\r\nTh&ecirc;m v&agrave;o đ&oacute;, You Select It c&ograve;n cho ph&eacute;p thiết lập mật khẩu trong qu&aacute; tr&igrave;nh tạo album để bảo vệ tuyệt đối những bức ảnh của bạn.<br />\r\n<br />\r\n<strong>Những t&iacute;nh năng ch&iacute;nh của You Select It:</strong><br />\r\n<br />\r\n- Hỗ trợ thiết kế album ảnh nghệ thuật chuy&ecirc;n nghiệp v&agrave; nhanh ch&oacute;ng.<br />\r\n<br />\r\n- Thiết kế cho ri&ecirc;ng m&igrave;nh bộ album ảnh tuyệt vời với h&agrave;ng trăm mẫu thiết kế sẵn c&oacute; v&agrave; c&aacute;c hiệu ứng.<br />\r\n<br />\r\n- Dễ d&agrave;ng sử dụng để thiết kế album ảnh đẹp.<br />\r\n<br />\r\n- Thực hiện c&aacute;c thao t&aacute;c chỉnh sửa để thiết kế album như: chỉnh sửa h&igrave;nh ảnh nghệ thuật, th&ecirc;m h&igrave;nh nền, khung trang tr&iacute;, ch&egrave;n văn bản, ...<br />\r\n&nbsp;</div>\r\n\r\n<p><span style=\"font-family:arial\">- Thiết lập mật khẩu trong qu&aacute; tr&igrave;nh tạo album để bảo vệ tuyệt đối những bức ảnh của bạn.</span></p>', '2018-07-30 22:47:16', NULL, 0, '2018-08-02 21:34:03', NULL, NULL, NULL, b'1');
INSERT INTO `adposts` VALUES (4, 'langtu', 'Dịch vụ seo', 'Dịch vụ tối ưu hóa công cụ tìm kiếm hiệu quả, đưa website lên top nhanh chóng, bền vững với chi phí hợp lý nhất.', 4, 'dichvuseo.png', 'dich-vu-seo', '<p><span style=\"font-family:utm avo; font-size:14px\"><strong>SEO -&nbsp;</strong></span><strong>Search Engine Optimization (tối ưu h&oacute;a c&ocirc;ng cụ t&igrave;m kiếm)&nbsp;</strong><span style=\"font-family:utm avo; font-size:14px\"><strong>được giới c&ocirc;ng nghệ biết đến như một c&ocirc;ng cụ hiệu quả nhất trong hệ thống Marketing Online.</strong></span><strong>&nbsp;</strong><span style=\"font-family:utm avo; font-size:14px\"><strong>Dịch vụ SEO xuất hiện từ khi Google trở th&agrave;nh c&ocirc;ng cụ t&igrave;m kiếm số một tr&ecirc;n thế giới. Những doanh nghiệp, c&ocirc;ng ty thương mại điện tử cũng như c&aacute;c c&aacute; nh&acirc;n&nbsp;</strong></span><strong><a href=\"http://skyvietnam.com.vn/thiet-ke-website-ban-hang-a335.html\" style=\"margin: 0px; padding: 0px; text-decoration-line: none; color: rgb(0, 0, 0);\">b&aacute;n h&agrave;ng online</a></strong><span style=\"font-family:utm avo; font-size:14px\"><strong>&nbsp;đều t&igrave;m đến c&aacute;c&nbsp;<a href=\"http://skyvietnam.com.vn/dich-vu-seo.html\" style=\"margin: 0px; padding: 0px; text-decoration-line: none; color: rgb(0, 0, 0);\" title=\"công ty SEO\" type=\"công ty SEO\">c&ocirc;ng ty SEO</a>&nbsp;với hy vọng tiếp cận kh&aacute;ch h&agrave;ng v&agrave; n&acirc;ng cao doanh số.</strong></span><br />\r\n<br />\r\n<span style=\"font-family:utm avo; font-size:14px\"><span style=\"color:rgb(0, 0, 255)\"><em>&gt;&gt;&nbsp;</em></span><em><a href=\"https://skyvietnam.com.vn/mail-google-apps-email-google-theo-ten-mien-rieng-cho-doanh-nghiep-a404.html\" style=\"margin: 0px; padding: 0px; text-decoration-line: none; color: rgb(0, 0, 0);\" target=\"_blank\"><span style=\"color:rgb(0, 0, 255)\">Dịch vụ email doanh nghiệp google theo t&ecirc;n miền ri&ecirc;ng</span></a><br />\r\n<span style=\"color:rgb(0, 0, 255)\">&gt;&gt;&nbsp;</span><a href=\"https://emailgoogle.net/\" style=\"margin: 0px; padding: 0px; text-decoration-line: none; color: rgb(0, 0, 0);\" target=\"_blank\"><span style=\"color:rgb(0, 0, 255)\">Bảng gi&aacute; dịch vụ email Google Apps - Email doanh nghiệp theo t&ecirc;n miền ri&ecirc;ng</span></a></em></span><br />\r\n<br />\r\n<span style=\"font-family:utm avo; font-size:14px\">Khi internet xuất hiện v&agrave; trở th&agrave;nh c&ocirc;ng cụ kh&ocirc;ng thể thiếu trong đời sống con người th&igrave; nhu cầu mua b&aacute;n, trao đổi th&ocirc;ng tin tr&ecirc;n internet trở th&agrave;nh nhu cầu kh&ocirc;ng thể thiếu. Khi c&oacute; nhu cầu tra cứu, mua b&aacute;n dịch vụ g&igrave; đ&oacute;, người d&ugrave;ng chỉ cần g&otilde; c&aacute;c từ kh&oacute;a tương ứng, Google sẽ ph&acirc;n t&iacute;ch v&agrave; chia đến c&aacute;c&nbsp;<a href=\"https://skyvietnam.com.vn/\" style=\"margin: 0px; padding: 0px; text-decoration-line: none; color: rgb(0, 0, 0);\" title=\"Thiet ke website\" type=\"Thiet ke website chuyen nghiep\"><strong>website</strong></a>&nbsp;chứa nội dung từ kh&oacute;a. Giữa trăm ng&agrave;n website tr&ecirc;n thị trường, l&agrave;m sao để website của bạn đứng đầu trong c&aacute;c c&ocirc;ng cụ t&igrave;m kiếm, l&agrave; lựa chọn đầu ti&ecirc;n khi kh&aacute;ch h&agrave;ng lựa chọn đ&oacute; ch&iacute;nh l&agrave; c&ocirc;ng việc của người l&agrave;m SEO v&agrave;&nbsp;<a href=\"http://skyvietnam.com.vn/dich-vu-seo.html\" style=\"margin: 0px; padding: 0px; text-decoration-line: none; color: rgb(0, 0, 0);\" title=\"dịch vụ SEO chuyên nghiệp tại Hà Nội\" type=\"dịch vụ SEO chuyên nghiệp tại Hà Nội\"><strong>dịch vụ SEO</strong></a>.</span><br />\r\n&nbsp;</p>\r\n\r\n<h2><span style=\"font-size:16px\"><strong>Vai tr&ograve; của SEO trong chiến dịch Marketing Online</strong></span></h2>\r\n\r\n<p><span style=\"font-family:utm avo; font-size:14px\">- So với hầu hết c&aacute;c h&igrave;nh thức Marketing kh&aacute;c, SEO l&agrave; một h&igrave;nh thức mang lại hiệu quả cao m&agrave; chi ph&iacute; lại rẻ.<br />\r\n-&nbsp;Dễ d&agrave;ng tiếp cận với nh&oacute;m kh&aacute;ch h&agrave;ng tiềm năng: Việc lựa chọn website t&ugrave;y thuộc v&agrave;o việc sử dụng từ kh&oacute;a của kh&aacute;ch h&agrave;ng. Khi c&oacute; nhu cầu kh&aacute;ch h&agrave;ng sẽ search c&aacute;c từ kh&oacute;a li&ecirc;n quan v&agrave; Google sẽ tự điều hướng đến website của bạn. V&igrave; vậy những kh&aacute;ch h&agrave;ng truy cập trang web của bạn đều l&agrave; những người c&oacute; nhu cầu về lĩnh vực kinh doanh bạn đang sở hữu.<br />\r\n- Việc l&agrave;m SEO suy cho c&ugrave;ng l&agrave; l&agrave;m cho website của bạn th&otilde;a m&atilde;n c&aacute;c ti&ecirc;u ch&iacute; của c&aacute;c bộ m&aacute;y t&igrave;m kiếm. M&agrave; c&aacute;c ti&ecirc;u ch&iacute; n&agrave;y thường hướng đến c&aacute;c tiện &iacute;ch d&agrave;nh cho người d&ugrave;ng truy cập website. V&igrave; thế l&agrave;m SEO cũng l&agrave; l&agrave;m cho website của bạn được người d&ugrave;ng y&ecirc;u th&iacute;ch hơn v&agrave; c&oacute; thể trở th&agrave;nh những kh&aacute;ch truy cập trung th&agrave;nh với website của bạn.<br />\r\n- SEO - Chiến lược kinh doanh l&acirc;u d&agrave;i v&agrave; bền vững: C&ugrave;ng với sự ph&aacute;t triển của kinh tế x&atilde; hội ng&agrave;y nay, mỗi người c&agrave;ng l&uacute;c c&agrave;ng trở n&ecirc;n bận rộn v&agrave; kh&ocirc;ng c&oacute; nhiều thời gian để trực tiếp đến xem c&aacute;c sản phẩm m&igrave;nh c&oacute; nhu cầu t&igrave;m hiểu. V&igrave; thế m&agrave; nhu cầu t&igrave;m kiếm th&ocirc;ng tin qua mạng sẽ trở n&ecirc;n phổ biến, tồn tại l&acirc;u d&agrave;i v&agrave; tiếp tục ph&aacute;t triển mạnh mẽ. V&igrave; vậy, bạn n&ecirc;n sử dụng&nbsp;<strong>dịch vụ SEO</strong>&nbsp;như một chiến dịch l&acirc;u d&agrave;i cho c&ocirc;ng việc kinh doanh v&agrave; tiếp thị của bạn.</span></p>\r\n\r\n<div style=\"margin: 0px; padding: 0px; font-family: &quot;UTM Avo&quot;; font-size: 14px; text-align: center;\"><br />\r\n<strong><img alt=\"\" src=\"https://skyvietnam.com.vn/uploads/images/dich-vu-seo2.jpg\" style=\"border:none; height:267px; margin:0px; padding:0px; width:600px\" /></strong></div>\r\n\r\n<h2><span style=\"font-size:14px\"><span style=\"font-size:16px\">Quy tr&igrave;nh SEO cơ bản của Sky Việt Nam</span></span></h2>\r\n\r\n<p><em>Ph&acirc;n t&iacute;ch đối thủ cạnh tranh, x&acirc;y dựng chiến lược SEO, On-Page Website, Link Building, b&aacute;o c&aacute;o hoạt động h&agrave;ng th&aacute;ng.&nbsp;Quy tr&igrave;nh SEO của Sky Việt Nam bao gồm 3 bước cơ bản sau:</em></p>\r\n\r\n<p><strong>Nghi&ecirc;n cứu từ kh&oacute;a:</strong>&nbsp;Ph&acirc;n t&iacute;ch, lựa chọn đ&uacute;ng từ kh&oacute;a l&agrave; điều rất quan trọng trong một chiến dịch SEO v&igrave; mỗi từ kh&oacute;a sẽ c&oacute; tỷ lệ chuyển đổi kh&aacute;c nhau nếu sai lầm ở bước n&agrave;y sẽ dẫn đến mất tiền, mất c&ocirc;ng m&agrave; hiệu quả kh&ocirc;ng đạt được. Một trung những yếu tố SEO quan trọng nhất l&agrave; c&aacute;c từ kho&aacute; mục ti&ecirc;u, h&atilde;y để Sky Việt Nam x&aacute;c định chiến lược tốt nhất cho dự &aacute;n SEO website của doanh nghiệp bạn.<br />\r\n<strong>On-Page SEO:</strong>&nbsp;Content is KING l&agrave; thuật ngữ m&agrave; ai cũng hiểu trong SEO,&nbsp;<strong>Sky Việt Nam</strong>&nbsp;l&ecirc;n chiến lược nội dung cho c&aacute;c chiến dịch SEO lu&ocirc;n l&agrave; duy nhất (Unique), tốt nhất để phục vụ cho SEO v&agrave; tối ưu chuyển đổi đơn h&agrave;ng.<br />\r\n<strong>Link Building:</strong>&nbsp;Một phần quan trọng của bất kỳ chiến lược SEO n&agrave;o l&agrave; phải x&acirc;y dựng được c&aacute;c li&ecirc;n kết nội bộ c&oacute; &yacute; nghĩa với c&aacute;c từ kh&oacute;a ch&iacute;nh của website. Chỉ c&oacute; vậy th&igrave; SEO mới thực sự th&agrave;nh c&ocirc;ng.</p>\r\n\r\n<h2><br />\r\n<span style=\"font-size:16px\"><strong>Dịch vụ SEO của Sky Việt Nam</strong></span></h2>\r\n\r\n<p><span style=\"font-family:utm avo; font-size:14px\"><strong>Dịch vụ SEO</strong>&nbsp;của&nbsp;<a href=\"http://skyvietnam.com.vn/gioi-thieu.html\" style=\"margin: 0px; padding: 0px; text-decoration-line: none; color: rgb(0, 0, 0);\" title=\"Sky Việt Nam\" type=\"Sky Việt Nam\"><strong>Sky Việt Nam</strong></a>&nbsp;sẽ gi&uacute;p kh&aacute;ch h&agrave;ng n&acirc;ng cao thứ hạng tr&ecirc;n c&ocirc;ng cụ t&igrave;m kiếm Google đồng thời gia tặng lượng truy cập v&agrave; uy t&iacute;n của website. Trong v&ograve;ng từ 03 - 06 th&aacute;ng, kh&aacute;ch h&agrave;ng sẽ thấy sự thay đổi r&otilde; rệt về lượng truy cập cũng như tỉ lệ kh&aacute;ch h&agrave;ng li&ecirc;n hệ qua website tăng từ 30% - 200% nhờ tối ưu h&oacute;a c&ocirc;ng cụ t&igrave;m kiếm (SEO).<br />\r\n&nbsp;- Tiết kiệm tối đa chi ph&iacute; v&agrave; thời gian.<br />\r\n&nbsp;- Website được tối ưu h&oacute;a to&agrave;n bộ theo chuẩn SEO.<br />\r\n&nbsp;- Website được ph&aacute;t triển to&agrave;n diện nhất.<br />\r\n&nbsp;- Lượng truy cập tăng đều v&agrave; ổn định.<br />\r\n&nbsp;- Tăng tỷ lệ chuyển đổi mục ti&ecirc;u của website (c&aacute;c truy cập đến từ c&aacute;c c&ocirc;ng cụ t&igrave;m kiếm thường c&oacute; tỷ lệ chuyển đổi cao hơn truy cập từ c&aacute;c nguồn kh&aacute;c)<br />\r\n&nbsp;- Tiếp cận nhanh nhiều kh&aacute;ch h&agrave;ng mới.<br />\r\n&nbsp;- Khả năng ph&acirc;n loại kh&aacute;ch h&agrave;ng cao. Nhắm đ&uacute;ng c&aacute;c kh&aacute;ch h&agrave;ng tiềm năng, mục ti&ecirc;u.<br />\r\n&nbsp;- Gia tăng nhận diện thương hiệu. Khẳng định t&iacute;nh ch&iacute;nh thống v&agrave; vị thế thương hiệu<br />\r\n&nbsp;- Mở rộng thị trường nhanh ch&oacute;ng.<br />\r\n&nbsp;- Tăng doanh thu bền vững. Kiểm so&aacute;t chiến dịch kinh doanh hiệu quả.</span><br />\r\n<br />\r\n<span style=\"font-family:utm avo; font-size:14px\">SEO l&agrave; nền tảng cho th&agrave;nh c&ocirc;ng. Chiến lược SEO của&nbsp;</span><strong>Sky Việt Nam</strong><span style=\"font-family:utm avo; font-size:14px\">&nbsp;sẽ gi&uacute;p cho từ kh&oacute;a của website đạt thứ hạng cao tr&ecirc;n c&ocirc;ng cụ t&igrave;m kiếm. Dịch vụ SEO sẽ gi&uacute;p tăng trưởng lượng truy cập v&agrave;o website v&agrave; tăng doanh thu cho c&aacute;c hoạt động tr&ecirc;n web của doanh nghiệp bạn.</span><br />\r\n<br />\r\n<span style=\"font-family:utm avo; font-size:14px\">SEO lu&ocirc;n l&agrave; th&agrave;nh phần rất quan trọng trong c&aacute;c chiến dịch tiếp cận kh&aacute;ch h&agrave;ng bền vững. Dịch vụ SEO của Sky Việt Nam lu&ocirc;n đảm bảo được 2 yếu tố ch&iacute;nh đ&oacute; l&agrave; chất lượng cao v&agrave; gi&aacute; cả phải chăng. Bạn chỉ cần đưa ra y&ecirc;u cầu ch&uacute;ng t&ocirc;i sẽ đưa ra giải ph&aacute;p SEO tổng thể tr&ecirc;n c&aacute;c c&ocirc;ng cụ t&igrave;m kiếm như google, coccoc, bing.... H&atilde;y cho ch&uacute;ng t&ocirc;i biết bạn cần g&igrave; v&agrave; ch&uacute;ng t&ocirc;i sẽ gi&uacute;p bạn thực hiện điều đ&oacute;. OK?</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 255); font-family:utm avo; font-size:14px\"><strong>QU&Yacute; KH&Aacute;CH C&Oacute; NHU CẦU TƯ VẤN DỊCH VỤ SEO WEBSITE&nbsp;VUI L&Ograve;NG LI&Ecirc;N HỆ</strong>:</span><span style=\"font-family:utm avo; font-size:14px\"><strong><span style=\"color:rgb(0, 0, 255); font-family:open sans,sans-serif\"><strong>&nbsp;</strong></span><span style=\"color:rgb(255, 0, 0); font-family:open sans,sans-serif\"><span style=\"font-size:18px\"><strong>0915.037.301</strong></span></span></strong></span></p>\r\n\r\n<p><span style=\"font-family:utm avo; font-size:14px\"><strong><span style=\"color:rgb(255, 0, 0); font-family:open sans,sans-serif\"><span style=\"font-size:18px\"><strong><input name=\"btnhotline\" type=\"button\" value=\"0989757437\" /></strong></span></span></strong></span></p>', '2018-07-31 19:49:58', NULL, 0, '2018-07-31 19:49:58', NULL, NULL, NULL, b'1');
INSERT INTO `adposts` VALUES (5, 'langtu', 'Thiết kế web bán hàng', 'Dịch vụ thiết kế web bán hàng trực tuyến chuyên nghiệp chuẩn SEO đầy đủ chức năng, làm web bán hàng, thiết kế web bán hàng theo yêu cầu, thiết kế web bán hàng trọn gói. Thiết kế web bán hàng hiệu quả giao diện đẹp, độc đáo với cấu trúc website gọn nhẹ, linh hoạt giúp tốc độ website nhanh hơn, người dùng sẽ có trải nghiệm tốt hơn với website bạn', 5, NULL, 'thiet-ke-web-ban-hang', '<h2 style=\"text-align:justify\"><strong><span style=\"font-size:14px\">Kinh doanh truyền thống với việc b&agrave;y b&aacute;n c&aacute;c sản phẩm ở cửa h&agrave;ng, showroom dường như đ&atilde; trở n&ecirc;n &ldquo;lạc hậu&rdquo; trong thời đại m&agrave; mọi thứ đều c&oacute; thể diễn ra tr&ecirc;n internet từ việc mua b&aacute;n.&nbsp;Để bắt kịp xu hướng internet h&oacute;a đang diễn ra, người l&agrave;m kinh doanh buộc phải sử dụng website b&aacute;n h&agrave;ng để đưa c&aacute;c mặt h&agrave;ng của m&igrave;nh đến với kh&aacute;ch hầng một c&aacute;ch nhanh nhất. Đ&oacute; cũng l&agrave; l&yacute; do&nbsp;<u><a href=\"https://skyvietnam.com.vn/thiet-ke-website-ban-hang-a335.html\" style=\"margin: 0px; padding: 0px; text-decoration-line: none; color: rgb(0, 0, 0);\" title=\"Dịch vụ thiết kế website bán hàng\" type=\"thiet ke web ban hang chuyen nghiep chuan seo\"><span style=\"color:rgb(0, 128, 0)\">dịch vụ thiết kế website b&aacute;n h&agrave;ng</span></a></u>&nbsp;của&nbsp;<a href=\"http://skyvietnam.com.vn/gioi-thieu.html\" style=\"margin: 0px; padding: 0px; text-decoration-line: none; color: rgb(0, 0, 0);\" title=\"Công ty thiết kế website chuyên nghiệp\" type=\"Công ty thiết kế website chuyên nghiệp\">Sky Việt Nam</a>&nbsp;ra đời nhằm gi&uacute;p kh&aacute;ch h&agrave;ng doanh nghiệp g&acirc;y dựng được cho m&igrave;nh 1 gian h&agrave;ng tr&ecirc;n website ấn tượng v&agrave; thu h&uacute;t nhiều kh&aacute;ch mua h&agrave;ng nhất c&oacute; thể.</span></strong></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2 style=\"text-align:justify\"><span style=\"font-size:16px\"><strong>L&yacute; do v&igrave; sao n&ecirc;n thiết kế website b&aacute;n h&agrave;ng?</strong></span></h2>\r\n\r\n<div style=\"margin: 0px 0px 0px 0in; padding: 0px; font-family: &quot;UTM Avo&quot;; font-size: 14px; text-align: justify; list-style: none;\">-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Tăng doanh thu b&aacute;n h&agrave;ng: Với mỗi người l&agrave;m kinh doanh th&igrave; doanh thu lu&ocirc;n đặt l&ecirc;n h&agrave;ng đầu. Sở hữu 1&nbsp;<u><strong>website b&aacute;n h&agrave;ng online</strong></u>&nbsp;sẽ gi&uacute;p bạn c&oacute; được nguồn doanh thu đ&aacute;ng kể nhờ việc đăng c&aacute;c th&ocirc;ng tin sản phẩm cụ thể, h&igrave;nh ảnh, mẫu m&atilde; đẹp, th&ocirc;ng tin sản phẩm đầy đủ&hellip;Một địa chỉ website cũng l&agrave; k&ecirc;nh li&ecirc;n hệ uy t&iacute;n, chuy&ecirc;n nghiệp m&agrave; kh&aacute;ch h&agrave;ng tin tưởng lựa chọn giữa h&agrave;ng loạt những người kinh doanh online tr&ecirc;n mạng như hiện nay.<br />\r\n-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Quảng b&aacute; thương hiệu doanh nghiệp: Kh&ocirc;ng chỉ gi&uacute;p bạn b&aacute;n được sản phẩm,&nbsp;<a href=\"https://skyvietnam.com.vn/thiet-ke-website-ban-hang-a335.html\" style=\"margin: 0px; padding: 0px; text-decoration-line: none; color: rgb(0, 0, 0);\" title=\"thiết kế website bán hàng\" type=\"thiết kế website bán hàng chuyên nghiệp chuẩn seo\"><strong><span style=\"color:rgb(0, 128, 0)\">thiết kế website b&aacute;n h&agrave;ng</span></strong></a>&nbsp;c&ograve;n gi&uacute;p kh&aacute;ch h&agrave;ng dễ d&agrave;ng tiếp cận c&aacute;c chương tr&igrave;nh khuyến mại, dịch vụ ưu đ&atilde;i của doanh nghiệp bạn hơn. Ngo&agrave;i việc b&aacute;n được h&agrave;ng, đem lại doanh thu th&igrave; quảng b&aacute; được thương hiệu của m&igrave;nh trong l&ograve;ng kh&aacute;ch h&agrave;ng l&agrave; điều doanh nghi&ecirc;p n&agrave;o cũng hướng tới trong chiến dịch kinh doanh của m&igrave;nh.<br />\r\n-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Tạo lợi thế cạnh tranh: Giữa thời đại internet v&agrave; kinh doanh online ph&aacute;t triển kh&ocirc;ng ngừng, nếu kh&ocirc;ng sở hữu 1&nbsp;<em><strong>website b&aacute;n h&agrave;ng</strong></em>&nbsp;bạn sẽ nhanh ch&oacute;ng bị đ&agrave;o thải ra khỏi cuộc đua n&agrave;y. Trong khi c&oacute; qu&aacute; nhiều&nbsp;<em><strong>website b&aacute;n h&agrave;ng</strong></em>, website của bạn muốn nổi bật th&igrave; ngo&agrave;i thiết kế đẹp, nội dung phong ph&uacute;, mặt h&agrave;ng đa dạng th&igrave; cần kết hợp với những c&ocirc;ng cụ Marketing online kh&aacute;c như,&nbsp;<a href=\"http://skyvietnam.com.vn/dich-vu-seo.html\" style=\"margin: 0px; padding: 0px; text-decoration-line: none; color: rgb(0, 0, 0);\">SEO</a>,&nbsp;<a href=\"http://skyvietnam.com.vn/quang-cao-google.html\" style=\"margin: 0px; padding: 0px; text-decoration-line: none; color: rgb(0, 0, 0);\">Google Adsword</a>&hellip;<br />\r\n&nbsp;</div>\r\n\r\n<div style=\"margin: 0px 0px 0px 0in; padding: 0px; font-family: &quot;UTM Avo&quot;; font-size: 14px; list-style: none; text-align: center;\"><a href=\"https://skyvietnam.com.vn/thiet-ke-website-ban-hang-a335.html\" style=\"margin: 0px; padding: 0px; text-decoration-line: none; color: rgb(0, 0, 0);\" title=\"Dịch vụ thiết kế website bán hàng\" type=\"Thiết kế website bán hàng trực tuyến chuyên nghiệp\"><img alt=\"Thiết kế website bán hàng online chuyên nghiệp chuẩn seo\" src=\"https://skyvietnam.com.vn/uploads/images/thiet-ke-web-ban-hang.jpg\" style=\"height:378px; margin:0px; padding:0px; width:800px\" title=\"Dịch vụ thiết kế website bán hàng online chuyên nghiệp\" /></a></div>\r\n\r\n<div style=\"margin: 0px 0px 0px 0in; padding: 0px; font-family: &quot;UTM Avo&quot;; font-size: 14px; text-align: justify; list-style: none;\">&nbsp;</div>\r\n\r\n<h2 style=\"text-align:justify\"><br />\r\n<span style=\"font-size:16px\"><strong>Những ưu điểm&nbsp;<u>dịch vụ thiết kế website b&aacute;n h&agrave;ng</u>&nbsp;tại Sky Việt Nam đang &aacute;p dụng:</strong></span></h2>\r\n\r\n<div style=\"margin: 0px 0px 0px 0in; padding: 0px; font-family: &quot;UTM Avo&quot;; font-size: 14px; text-align: justify; list-style: none;\">\r\n<h3><strong>1. Thiết kế giao diện đơn giản</strong></h3>\r\n- Với thiết kế đơn giản gi&uacute;p&nbsp;<u><em><strong>website b&aacute;n h&agrave;ng</strong></em></u>&nbsp;trở n&ecirc;n th&acirc;n thiện hơn, giảm độ phức tạp khiến kh&aacute;ch h&agrave;ng mất tập trung, tạo sự nổi bật của th&ocirc;ng tin, cũng như l&agrave;m cho tốc tộc website tải nhanh hơn.<br />\r\n- Gi&uacute;p truyền đạt th&ocirc;ng điệp tới kh&aacute;ch h&agrave;ng hiệu quả hơn bởi tập trung v&agrave;o việc hiển thị th&ocirc;ng tin.<br />\r\n- Quản l&yacute; v&agrave; duy tr&igrave; website sẽ trở n&ecirc;n đơn giản v&agrave; gặp &iacute;t kh&oacute; khăn hơn trong tương lai.\r\n<h3>2. Tối ưu h&oacute;a đồ họa, h&igrave;nh ảnh.</h3>\r\nNhững người truy cập website thường thiếu t&iacute;nh ki&ecirc;n nhẫn. Việc sử dụng qu&aacute; nhiều đồ họa v&agrave; h&igrave;nh ảnh sẽ l&agrave;m cho việc truy cập kh&oacute; khăn hơn. Việc xử l&yacute; đồ họa v&agrave; h&igrave;nh ảnh hiệu quả sẽ giải quyết vấn đề n&agrave;y.<br />\r\n- Người truy cập sẽ kh&ocirc;ng phải chờ đợi l&acirc;u, gi&uacute;p truy cập nhanh những th&ocirc;ng tin m&agrave; bạn muốn họ xem.<br />\r\n- C&aacute;c c&ocirc;ng cụ t&igrave;m kiếm lu&ocirc;n coi tốc độ load của website l&agrave; một ti&ecirc;u chuẩn trong việc đ&aacute;nh gi&aacute; xếp thứ hạng web.<br />\r\n- Tạo sự ch&uacute; &yacute; v&agrave;o th&ocirc;ng tin.\r\n<h3>3. Sử dụng c&aacute;c yếu tố kinh doanh chủ chốt trong website b&aacute;n h&agrave;ng</h3>\r\n<em><strong>Một số yếu tố thiết kế phải c&oacute; tr&ecirc;n website b&aacute;n h&agrave;ng. Đ&oacute; l&agrave;:</strong></em><br />\r\n- Logo<br />\r\n- Khẩu hiệu kinh doanh<br />\r\n- Call to action - Hướng người d&ugrave;ng tới c&aacute;c h&agrave;nh động c&oacute; chủ đ&iacute;ch, li&ecirc;n hệ mua sản phẩm tr&ecirc;n website.<br />\r\n- Lợi điểm b&aacute;n h&agrave;ng độc nhất<br />\r\n- Th&ocirc;ng tin li&ecirc;n hệ đầy đủ r&otilde; r&agrave;ng<br />\r\n- H&igrave;nh ảnh, th&ocirc;ng tin sản phẩm li&ecirc;n quan<br />\r\n- Th&ocirc;ng tin bản quyền của website<br />\r\n<strong>Ưu điểm</strong><br />\r\n- X&acirc;y dựng l&ograve;ng tin của kh&aacute;ch h&agrave;ng.<br />\r\n- Mở rộng thương hiệu<br />\r\n- Gi&uacute;p người truy cập dễ d&agrave;ng sử dụng.\r\n<h3>4. Call to action v&agrave; sự chuyển đổi</h3>\r\nMột trong những mục ti&ecirc;u của bất kỳ website n&agrave;o l&agrave; biến người truy cập th&agrave;nh kh&aacute;ch h&agrave;ng của m&igrave;nh. Để đạt được điều n&agrave;y, website cần phải c&oacute; những th&agrave;nh tố hướng người d&ugrave;ng tới c&aacute;c h&agrave;nh động c&oacute; chủ đ&iacute;ch r&otilde; r&agrave;ng.<br />\r\nV&iacute; dụ: Tập trung v&agrave;o h&agrave;nh động m&agrave; bạn mong muốn người truy cập hướng đến (mua một sản phẩm hoặc điền v&agrave;o một mẫu&hellip;) bằng việc l&agrave;m nổi bật v&agrave; sử dụng c&aacute;c chức năng như &ldquo;Contact us&rdquo;,&rdquo;Get a quote&rdquo;, &ldquo;Register now!&rdquo;,&rdquo;Buy now&rdquo;.<br />\r\n<strong>Ưu điểm</strong><br />\r\n- Việc gi&uacute;p người truy cập thực hiện c&aacute;c bước hiệu quả sẽ l&agrave;m tăng sự biến đổi từ c&aacute;c &ldquo;visitors&rdquo; th&agrave;nh &ldquo;Customer&rdquo;<br />\r\n- Tạo ấn tượng cho những người truy cập chưa chắc chắn sẽ mua h&agrave;ng.\r\n<h3><strong>5. Tối ưu cấu tr&uacute;c nội dung website</strong></h3>\r\nTr&ecirc;n website, người sử dụng sẽ lướt qua c&aacute;c trang để t&igrave;m kiếm c&aacute;c trang li&ecirc;n quan đến th&ocirc;ng tin họ t&igrave;m. Bạn c&oacute; thể gi&uacute;p họ bằng việc cấu tr&uacute;c hợp l&yacute; nội dung trong khi thiết kế. Một số bước cơ bản:<br />\r\n- Chia nội dung của website th&agrave;nh những mục nhỏ v&agrave; đơn giản.<br />\r\n- C&oacute; ti&ecirc;u đề r&otilde; r&agrave;ng cho từng trang v&agrave; từng chuy&ecirc;n mục nội dung cụ thể.<br />\r\n- Sử dụng c&aacute;c loại fonts dễ dọc, k&iacute;ch cỡ ph&ugrave; hợp.<br />\r\n<strong>Ưu điểm</strong><br />\r\n- Người truy cập sẽ ở lại website bạn l&acirc;u hơn.<br />\r\n- Gi&uacute;p họ t&igrave;m thấy những th&ocirc;ng tin cần thiết.<br />\r\n- Tạo ấn tượng tốt về website của bạn về nội dung.\r\n<h3>6. Tương th&iacute;ch với c&aacute;c tr&igrave;nh duyệt:</h3>\r\nSố lượng c&aacute;c tr&igrave;nh duyệt cũng như c&aacute;c phi&ecirc;n bản của mỗi loại đang g&acirc;y ra một thử th&aacute;ch lớn đối với&nbsp;<a href=\"https://skyvietnam.com.vn/thiet-ke-website.html\" style=\"margin: 0px; padding: 0px; text-decoration-line: none; color: rgb(0, 0, 0);\" title=\"thiết kế website\" type=\"thiết kế website chuyên nghiệp chuẩn seo\"><span style=\"color:rgb(0, 128, 0)\"><u><strong>thiết kế website</strong></u></span></a>. Người truy cập c&oacute; thể sẽ kh&ocirc;ng sử dụng tr&igrave;nh duyệt m&agrave; bạn th&iacute;ch, v&igrave; thế h&atilde;y chắc chắn website của bạn tương th&iacute;ch với tất cả.<br />\r\n<strong>Ưu điểm:</strong><br />\r\n- Người truy cập sẽ tiếp nhận ch&iacute;nh x&aacute;c th&ocirc;ng tin từ website của bạn từ mọi tr&igrave;nh duyệt m&agrave; họ truy cập.<br />\r\n- Gi&uacute;p bạn kh&ocirc;ng mất đi tập kh&aacute;ch h&agrave;ng tiềm năng bởi l&yacute; do website của bạn kh&ocirc;ng hiển thị được tr&ecirc;n một số tr&igrave;nh duyệt.\r\n<h3>7. Thiết kế tương th&iacute;ch tr&ecirc;n nhiều nền tảng.</h3>\r\nSự ra đời của c&aacute;c thiết bị v&agrave; điện thoại th&ocirc;ng minh như Iphone, Ipad từ Apple cũng như c&aacute;c sản phẩm ứng dụng m&atilde; nguồn mở Android từ Google l&agrave;m cho việc thiết kế website kh&ocirc;ng đơn thuần cho m&aacute;y t&iacute;nh b&agrave;n hay laptop nữa. Giờ đ&acirc;y, bạn vừa phải thiết kế sao cho ph&ugrave; hợp với c&aacute;c loại tr&igrave;nh duyệt, vừa phải tối ưu cho ph&ugrave; hợp với nhiều nền tảng, thiết bị, m&agrave;n h&igrave;nh kh&aacute;c nhau kh&aacute;c nhau.<br />\r\n<strong>Ưu điểm:</strong><br />\r\n- Người truy cập c&oacute; thể v&agrave;o website của bạn mọi l&uacute;c mọi nơi, bằng mọi phương tiện.<br />\r\n- Bạn kh&ocirc;ng phải tốn thời gian để tạo ra những bản copy kh&aacute;c để ph&ugrave; hợp với từng tr&igrave;nh duyệt, từng thiết bị kh&aacute;c nhau.\r\n<h3>8. &Aacute;p dụng những c&ocirc;ng nghệ hiện đại nhất.</h3>\r\nSự ra đời của c&aacute;c thiết bị v&agrave; điện thoại th&ocirc;ng minh như Iphone, Ipad từ Apple cũng như c&aacute;c sản phẩm ứng dụng m&atilde; nguồn mở Android từ Google l&agrave;m cho việc&nbsp;<strong>thiết kế website</strong>&nbsp;kh&ocirc;ng đơn thuần cho m&aacute;y t&iacute;nh b&agrave;n hay laptop nữa. Giờ đ&acirc;y, bạn vừa phải thiết kế sao cho ph&ugrave; hợp với c&aacute;c loại tr&igrave;nh duyệt, vừa phải tối ưu cho ph&ugrave; hợp với nhiều nền tảng, thiết bị, m&agrave;n h&igrave;nh kh&aacute;c nhau kh&aacute;c nhau.<br />\r\n<strong>Ưu điểm:</strong><br />\r\n- Người truy cập c&oacute; thể v&agrave;o website của bạn mọi l&uacute;c mọi nơi, bằng mọi phương tiện.<br />\r\n- Bạn kh&ocirc;ng phải tốn thời gian để tạo ra những bản copy kh&aacute;c để ph&ugrave; hợp với từng tr&igrave;nh duyệt, từng thiết bị kh&aacute;c nhau.\r\n<h2><br />\r\n<span style=\"font-size:16px\">L&yacute; do chọn Sky Việt Nam l&agrave; đơn vị thiết kế website b&aacute;n h&agrave;ng cho doanh nghiệp bạn?</span></h2>\r\n- &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<strong>Thiết kế giao diện linh hoạt:&nbsp;Sky Việt Nam</strong>&nbsp;c&oacute; hệ thống website mẫu với giao diện đẹp mắt, độc đ&aacute;o, ph&ugrave; hợp với từng loại h&igrave;nh kinh doanh, b&aacute;n h&agrave;ng của bạn. Ngo&agrave;i ra, bạn cũng c&oacute; thể&nbsp;<a href=\"https://skyvietnam.com.vn/thiet-ke-website-theo-yeu-cau-a363.html\" style=\"margin: 0px; padding: 0px; text-decoration-line: none; color: rgb(0, 0, 0);\" title=\"Thiết kế website theo yêu cầu\" type=\"Thiết kế website theo yêu cầu chuyên nghiệp\"><span style=\"color:rgb(0, 128, 0)\"><strong>thiết kế website theo y&ecirc;u cầu</strong></span></a>. Ch&uacute;ng t&ocirc;i sẽ thiết kế dựa tr&ecirc;n &yacute; tưởng của bạn để đem đến 1 website mang đậm phong c&aacute;ch c&aacute; nh&acirc;n, doanh nghiệp của bạn.<br />\r\n- &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<strong>Thiết kế web</strong>&nbsp;&aacute;p dụng những c&ocirc;ng nghệ hiện đại nhất, tối ưu tốc độ truy cập, tối ưu chuẩn seo theo c&aacute;c ti&ecirc;u ch&iacute; của Google. Website được thiết kế đảm bảo theo quy tr&igrave;nh nghi&ecirc;m ngặt - chạy thử nghiệm, đảm bảo gọn nhẹ, chạy ổn định nhất cho kh&aacute;ch h&agrave;ng.&nbsp;<br />\r\n-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Dễ d&agrave;ng sử dụng v&agrave; quản trị:&nbsp;</strong>Hệ thống quản trị th&acirc;n thiện, t&iacute;ch hợp bộ quản l&yacute; nội dung cho ph&eacute;p bạn th&ecirc;m bớt, chỉnh sửa: sản phẩm, gian h&agrave;ng, nội dung của website một c&aacute;ch linh động dễ d&agrave;ng sử dụng cho kh&aacute;ch h&agrave;ng.<br />\r\n-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>&nbsp;Hỗ trợ kh&aacute;ch h&agrave;ng online 24/7:</strong>&nbsp;Bạn lu&ocirc;n được đảm bảo hỗ trợ 24/7 nếu gặp kh&oacute; khăn trong qu&aacute; tr&igrave;nh vận h&agrave;nh website b&aacute;n h&agrave;ng của m&igrave;nh. C&aacute;c chuy&ecirc;n gia kỹ thuật của ch&uacute;ng t&ocirc;i lu&ocirc;n c&oacute; nhiệm vụ gi&uacute;p bạn giải quyết những vấn đề kh&oacute; khăn về kỹ thuật m&agrave; bạn đang gặp phải.<br />\r\n<br />\r\nVới đội ngũ&nbsp;<strong>thiết kế web</strong>&nbsp;gi&agrave;u kinh nghiệm, c&aacute;c &yacute; tưởng của kh&aacute;ch h&agrave;ng khi giao cho ch&uacute;ng t&ocirc;i, 90% đều rất h&agrave;i l&ograve;ng với c&aacute;c bản<strong>&nbsp;thiết kế web</strong>của ch&uacute;ng t&ocirc;i.&nbsp;<strong>Sky Việt Nam</strong>&nbsp;h&acirc;n hạnh đem đến cho bạn<span style=\"color:rgb(0, 128, 0)\">&nbsp;</span><u><a href=\"https://bigweb.com.vn/thiet-ke-web/thiet-ke-website-ban-hang.html\" style=\"margin: 0px; padding: 0px; text-decoration-line: none; color: rgb(0, 0, 0);\" title=\"Dịch vụ thiết kế website bán hàng\" type=\"thiết kế website bán hàng\"><span style=\"color:rgb(0, 128, 0)\"><strong>dịch vụ thiết kế website b&aacute;n h&agrave;ng</strong></span></a></u><span style=\"color:rgb(0, 128, 0)\">&nbsp;</span>với chất lượng tốt nhất nhằm đem lại lợi nhuận lớn cho kh&aacute;ch h&agrave;ng.<br />\r\n<br />\r\n&gt;&gt;&nbsp;<a href=\"https://skyvietnam.com.vn/6-tinh-nang-khong-the-thieu-trong-website-ban-hang-a538.html\" style=\"margin: 0px; padding: 0px; text-decoration-line: none; color: rgb(0, 0, 0);\" title=\"6 tính năng không thể thiếu trong website bán hàng \" type=\"6 tính năng không thể thiếu trong website bán hàng \">6 t&iacute;nh năng kh&ocirc;ng thể thiếu trong website b&aacute;n h&agrave;ng</a>&nbsp;<br />\r\n&gt;&gt;&nbsp;<a href=\"https://skyvietnam.com.vn/thoa-suc-sang-tao-voi-nhung-mau-website-ban-hang-tuyet-dep-a443.html\" style=\"margin: 0px; padding: 0px; text-decoration-line: none; color: rgb(0, 0, 0);\" title=\"Thỏa sức sáng tạo với những mẫu website bán hàng tuyệt đẹp\" type=\"Thỏa sức sáng tạo với những mẫu website bán hàng tuyệt đẹp\">Thỏa sức s&aacute;ng tạo với những mẫu website b&aacute;n h&agrave;ng tuyệt đẹp</a><br />\r\n&gt;&gt;&nbsp;<a href=\"https://skyvietnam.com.vn/thiet-ke-website-ban-hang-nhu-the-nao-de-hut-khach-a436.html\" style=\"margin: 0px; padding: 0px; text-decoration-line: none; color: rgb(0, 0, 0);\" title=\"Thiết kế website bán hàng như thế nào để hút khách?\" type=\"Thiết kế website bán hàng như thế nào để hút khách?\">Thiết kế website b&aacute;n h&agrave;ng như thế n&agrave;o để h&uacute;t kh&aacute;ch?</a><br />\r\n&gt;&gt;&nbsp;<a href=\"https://skyvietnam.com.vn/di-tim-bi-quyet-thanh-cong-cua-website-ban-hang-a372.html\" style=\"margin: 0px; padding: 0px; text-decoration-line: none; color: rgb(0, 0, 0);\" title=\"Đi tìm bí quyết thành công của website bán hàng\" type=\"Đi tìm bí quyết thành công của website bán hàng\">Đi t&igrave;m b&iacute; quyết th&agrave;nh c&ocirc;ng của website b&aacute;n h&agrave;ng</a><br />\r\n&gt;&gt;&nbsp;<a href=\"https://skyvietnam.com.vn/5-y-tuong-thiet-ke-giao-dien-trang-san-pham-cua-website-ban-hang-a535.html\" style=\"margin: 0px; padding: 0px; text-decoration-line: none; color: rgb(0, 0, 0);\" title=\"5 ý tưởng thiết kế giao diện trang sản phẩm của website bán hàng\" type=\"5 ý tưởng thiết kế giao diện trang sản phẩm của website bán hàng\">5 &yacute; tưởng thiết kế giao diện trang sản phẩm của website b&aacute;n h&agrave;ng</a></div>', '2018-08-02 20:46:39', NULL, 0, '2018-08-02 20:46:39', NULL, NULL, NULL, b'1');
INSERT INTO `adposts` VALUES (6, 'langtu', 'Thiết kế web du lịch', 'Thiết Kế Website Du Lịch ĐẸP, Chuyên Nghiệp. Giải pháp Thiết Kế Website Du Lịch HIỆU QUẢ giúp tiếp cận nguồn khách hàng tiềm năng trên internet. Với mỗi doanh nghiệp kinh doanh du lịch, website như một công cụ hiệu quả để thu hút nguồn khách hàng đến với doanh nghiệp mình', 5, NULL, 'thiet-ke-web-du-lich', '<p dir=\"ltr\" style=\"text-align:justify\"><em><strong>Hơn ai hết c&aacute;c doanh nghiệp kinh doanh du lịch hiểu r&otilde; t&iacute;nh chất hiệu quả của c&aacute;c website du lịch mang đến cho hoạt động kinh doanh của m&igrave;nh. Mỗi năm Việt Nam đ&oacute;n h&agrave;ng triệu lượt kh&aacute;ch du lịch trong v&agrave; ngo&agrave;i nước v&igrave; vậy hệ thống c&aacute;c trang web du lịch ch&iacute;nh l&agrave; k&ecirc;nh th&ocirc;ng tin hữu &iacute;ch để họ t&igrave;m hiểu điểm đến v&agrave; đặt tour cho m&igrave;nh. Nếu bạn muốn c&ocirc;ng việc kinh doanh của m&igrave;nh đạt hiệu quả v&agrave; th&agrave;nh c&ocirc;ng hơn, ngay từ khi bắt đầu h&atilde;y trang bị ngay cho m&igrave;nh một&nbsp;<u>thiết kế website du lịch</u>.</strong></em></p>\r\n\r\n<h2 dir=\"ltr\" style=\"text-align:justify\"><br />\r\n<span style=\"color:rgb(0, 128, 0)\"><span style=\"font-size:16px\">1. Những l&yacute; do n&ecirc;n thiết kế website du lịch ngay h&ocirc;m nay?</span></span></h2>\r\n\r\n<p dir=\"ltr\" style=\"text-align:justify\">Nh&igrave;n lại thị trường kinh doanh trực tuyến đầy s&ocirc;i động hiện nay, bất cứ doanh nghiệp kinh doanh ng&agrave;nh nghề, lĩnh vực n&agrave;o cũng đều hướng đến x&acirc;y dựng một trang web. Vậy v&igrave; sao trong kinh doanh du lịch, doanh nghiệp cần x&acirc;y dựng ngay một trang web chuy&ecirc;n nghiệp ngay từ khi mới bắt đầu c&ocirc;ng việc kinh doanh. Đ&acirc;y ch&iacute;nh l&agrave; l&yacute; do được đưa ra:<br />\r\n- Sở hữu&nbsp;<strong><u>website du lịch</u></strong>&nbsp;l&agrave; một c&aacute;ch để bạn đ&aacute;nh dấu, x&aacute;c định vị tr&iacute; của m&igrave;nh tr&ecirc;n thị trường kinh doanh trực tuyến, tạo lợi thế cạnh tranh cho doạnh nghiệp đặc biệt l&agrave; khi hoạt động kinh doanh trực tuyến diễn ra ng&agrave;y c&agrave;ng phổ biến như hiện nay.<br />\r\n-&nbsp;<u><strong>Website du lịch</strong></u>&nbsp;ch&iacute;nh l&agrave; k&ecirc;nh th&ocirc;ng tin l&yacute; tưởng để doanh nghiệp cung cấp những th&ocirc;ng tin cần thiết v&agrave; hữu &iacute;ch nhất đến mọi du kh&aacute;ch, đặc biệt l&agrave; những tour du lịch m&agrave; doanh nghiệp khai th&aacute;c v&agrave; triển khai. Đ&oacute; l&agrave; nền tảng v&agrave; cơ sở tốt nhất để họ tiến h&agrave;nh đặt tour du lịch cho bản th&acirc;n v&agrave; gia đ&igrave;nh bởi ai cũng muốn đặt tour tại địa chỉ chuy&ecirc;n nghiệp, tin cậy.<br />\r\n- Sở hữu&nbsp;<u><strong>website du lịch</strong></u>&nbsp;ch&iacute;nh l&agrave; việc bạn đang nắm bắt thời cơ v&agrave; biến n&oacute; th&agrave;nh c&ocirc;ng cụ hỗ trợ đắc lực cho hoạt động kinh doanh của doanh nghiệp, tạo ra hiệu quả doanh thu cao, ổn định. V&igrave; sao? Một trang web du lịch chuy&ecirc;n nghiệp sẽ gi&uacute;p bạn lan tỏa h&igrave;nh ảnh, thương hiệu doanh nghiệp đến đ&ocirc;ng đảo mọi người, gia tăng khả năng tiếp cận kh&aacute;ch h&agrave;ng đặc biệt l&agrave; số lượng kh&aacute;ch h&agrave;ng tiềm năng.<br />\r\n&nbsp;</p>\r\n\r\n<p dir=\"ltr\" style=\"text-align:center\"><a href=\"http://bigweb.com.vn/thiet-ke-web/thiet-ke-web-du-lich.html\" style=\"margin: 0px; padding: 0px; text-decoration-line: none; color: rgb(0, 0, 0);\" title=\"Thiết kế website du lịch\" type=\"Thiết kế website du lịch chuyên nghiệp chuẩn seo\"><img alt=\"\" src=\"https://skyvietnam.com.vn/uploads/images/web-du-lich.jpg\" style=\"height:322px; margin:0px; padding:0px; width:550px\" /></a><br />\r\n&nbsp;</p>\r\n\r\n<h2 dir=\"ltr\" style=\"text-align:justify\"><span style=\"color:rgb(0, 128, 0)\"><span style=\"font-size:16px\">2. Thiết kế website du lịch chuy&ecirc;n nghiệp cần đảm bảo những ti&ecirc;u ch&iacute; n&agrave;o?</span></span></h2>\r\n\r\n<p dir=\"ltr\" style=\"text-align:justify\">Để hoạt động kinh doanh du lịch mang lại hiệu quả cao nhất, doanh nghiệp phải đảm bảo chắc chắn rằng kh&aacute;ch h&agrave;ng bạn đang hướng đến được tiếp cận một trang web du lịch chuy&ecirc;n nghiệp. Khi v&agrave; chỉ khi chiếm được cảm t&igrave;nh từ họ cơ hội mới đến với bạn. Vậy ti&ecirc;u ch&iacute; n&agrave;o đảm bảo rằng doanh nghiệp đang sở hữu một trang web như vậy?<br />\r\n- Giao diện website đẹp, bắt mắt, ấn tượng v&agrave; chiều l&ograve;ng kh&aacute;ch du lịch bởi kh&ocirc;ng ai kh&aacute;c website được thiết kế ra ch&iacute;nh l&agrave; để phục vụ họ. Khi họ thực sự cảm thấy ấn tượng chắc chắn họ sẽ lựa chọn bạn.<br />\r\n- Website sở hữu đầy đủ c&aacute;c t&iacute;nh năng cần thiết, bố cục khoa học, th&ocirc;ng minh thuận tiện cho việc t&igrave;m kiếm cũng như đặt tour từ ph&iacute;a du kh&aacute;ch.<br />\r\n- Hệ quản trị th&ocirc;ng minh, hiện đại gi&uacute;p doanh nghiệp c&oacute; thể thay đổi cũng như cập nhật mọi th&ocirc;ng tin mới nhất tr&ecirc;n website tại mọi thời điểm, đặc biệt l&agrave; những nội dung th&ocirc;ng tin hữu &iacute;ch về địa điểm, kinh nghiệm hay cẩm nang khi đi du lịch.<br />\r\n-&nbsp;<a href=\"https://skyvietnam.com.vn/thiet-ke-website.html\" style=\"margin: 0px; padding: 0px; text-decoration-line: none; color: rgb(0, 0, 0);\" title=\"Thiết kế website chuyên nghiệp chuẩn SEO\"><u><strong>Thiết kế website chuẩn SEO</strong></u></a>, tối ưu mọi c&ocirc;ng cụ t&igrave;m kiếm tương th&iacute;ch mọi thiết bị di động v&agrave; tr&igrave;nh duyệt bằng c&ocirc;ng nghệ Responsive gi&uacute;p trang web nhanh ch&oacute;ng n&acirc;ng cao thứ hạng tr&ecirc;n c&ocirc;ng cụ t&igrave;m kiếm v&agrave; tiếp cận du kh&aacute;ch dễ d&agrave;ng.<br />\r\n- Website t&iacute;ch hợp nhanh c&aacute;c t&iacute;nh năng Google Map, mạng x&atilde; hội nhằm mang đến tiện lợi cho du kh&aacute;ch trong việc t&igrave;m kiếm địa điểm du lịch.<br />\r\n-&nbsp;<u><strong>Website du lịch</strong></u>&nbsp;phải được t&iacute;ch hợp đa ng&ocirc;n ngữ bởi người d&ugrave;ng t&igrave;m kiếm th&ocirc;ng tin kh&ocirc;ng chỉ l&agrave; du kh&aacute;ch trong nước m&agrave; c&ograve;n nước ngo&agrave;i.</p>\r\n\r\n<h2 dir=\"ltr\" style=\"text-align:justify\"><br />\r\n<span style=\"color:rgb(0, 128, 0)\"><span style=\"font-size:16px\">3. T&igrave;m kiếm đơn vị thiết kế website du lịch chuy&ecirc;n nghiệp ở đ&acirc;u?</span></span></h2>\r\n\r\n<p dir=\"ltr\" style=\"text-align:justify\">Song song với nhu cầu&nbsp;<u><strong>thiết kế website doanh nghiệp</strong></u>,&nbsp;<u><strong>dịch vụ thiết kế website</strong></u>&nbsp;tại c&aacute;c đơn vị truyền th&ocirc;ng ra đời kh&ocirc;ng &iacute;t. Vậy l&agrave;m thế n&agrave;o để doanh nghiệp t&igrave;m kiếm cho m&igrave;nh một đối t&aacute;c thực sự, ph&ugrave; hợp với nhu cầu v&agrave; mong muốn?&nbsp;<strong><u>Dịch vụ thiết kế website</u></strong>&nbsp;của&nbsp;<u><strong>Sky Việt Nam</strong></u>&nbsp;chắc chắn sẽ l&agrave; một trong những địa chỉ đ&aacute;ng tin cậy để qu&yacute; doanh nghiệp c&oacute; thể tin tưởng v&agrave; gửi gắm việc x&acirc;y dựng trang web cho m&igrave;nh.</p>\r\n\r\n<p dir=\"ltr\" style=\"text-align:justify\"><br />\r\nSở hữu một đội ngũ&nbsp;<u><strong>chuy&ecirc;n vi&ecirc;n thiết kế web chuy&ecirc;n nghiệp</strong></u>, tay nghề cao c&ugrave;ng những kinh nghiệm đ&atilde; t&iacute;ch lũy được trong qu&aacute; tr&igrave;nh thiết kế website cho h&agrave;ng trăm doanh nghiệp,&nbsp;<u><strong>Sky Việt Nam</strong></u>&nbsp;sẽ mang đến cho doanh nghiệp một website du lịch với đầy đủ c&aacute;c t&iacute;nh năng tr&ecirc;n gi&uacute;p bạn c&oacute; thể tiếp cận nhanh ch&oacute;ng v&agrave; dễ d&agrave;ng nhất với mọi người d&ugrave;ng. Hơn thế nữa &nbsp;với dịch vụ bảo h&agrave;nh, bảo tr&igrave; website trọn đời, doanh nghiệp ho&agrave;n to&agrave;n y&ecirc;n t&acirc;m, tin tưởng về một trang web chất lượng, uy t&iacute;n được x&acirc;y dựng bởi Sky Việt Nam. Cam kết tạo ra hiệu quả, chất lượng website đ&uacute;ng với gi&aacute; th&agrave;nh m&agrave; mỗi doanh nghiệp bỏ ra, Sky Việt Nam lu&ocirc;n sẵn s&agrave;ng phục vụ v&agrave; mang đến gi&aacute; trị tốt nhất cho kh&aacute;ch h&agrave;ng.</p>\r\n\r\n<p style=\"text-align:justify\"><br />\r\nNgay b&acirc;y giờ khi cần thiết kế cho m&igrave;nh một&nbsp;<u><strong>website chuy&ecirc;n nghiệp</strong></u>&nbsp;để l&agrave;m nền tảng vững chắc trong kinh doanh trực tuyến h&atilde;y li&ecirc;n hệ với ch&uacute;ng t&ocirc;i&nbsp;<u><strong>dịch vụ thiết kế website Sky Việt Nam</strong></u>&nbsp;uy t&iacute;n ngay h&ocirc;m nay.</p>', '2018-08-02 20:47:44', NULL, 0, '2018-08-02 20:47:44', NULL, NULL, NULL, b'1');
INSERT INTO `adposts` VALUES (7, 'langtu', 'Thiết kế web theo yêu cầu', 'Thiết kế website theo yêu cầu là một trong những giải pháp thiết kế website hỗ trợ kinh doanh trực tuyến được nhiều doanh nghiệp lựa chọn nhất hiện nay. Bạn cũng đang băn khoăn tìm kiếm và lựa chọn một công ty cung cấp gói thiết kế website như vậy. Không phải tìm kiếm đâu xa, Sky Việt Nam chính là địa chỉ đáng tin cậy dành cho bạn.', 5, NULL, 'thiet-ke-web-theo-yeu-cau', '<p dir=\"ltr\" style=\"text-align:justify\"><span style=\"font-size:12pt\"><em><u>Thiết kế website theo y&ecirc;u cầu</u></em>&nbsp;l&agrave; một trong những giải ph&aacute;p thiết kế website hỗ trợ kinh doanh trực tuyến được nhiều doanh nghiệp lựa chọn nhất hiện nay. Bạn cũng đang băn khoăn t&igrave;m kiếm v&agrave; lựa chọn một c&ocirc;ng ty cung cấp g&oacute;i thiết kế website như vậy. Kh&ocirc;ng phải t&igrave;m kiếm đ&acirc;u xa, c&ocirc;ng ty thiết kế web Sky Việt Nam ch&iacute;nh l&agrave; địa chỉ đ&aacute;ng tin cậy d&agrave;nh cho bạn.</span></p>\r\n\r\n<div style=\"margin: 0px; padding: 0px; font-family: &quot;UTM Avo&quot;; font-size: 14px; text-align: justify;\">&nbsp;</div>\r\n\r\n<p style=\"text-align:justify\">C&ugrave;ng với c&aacute;c g&oacute;i&nbsp;<strong>thiết kế website theo mẫu</strong>, thiết kế website trọn g&oacute;i, g&oacute;i thiết kế website theo y&ecirc;u cầu tại<span style=\"color:rgb(0, 0, 255)\">&nbsp;</span><strong><a href=\"https://skyvietnam.com.vn/gioi-thieu.html\" style=\"margin: 0px; padding: 0px; text-decoration-line: none; color: rgb(0, 0, 0);\" title=\"Công ty thiết kế web Sky Việt Nam\"><span style=\"color:rgb(0, 0, 255)\">Sky Việt Nam</span></a></strong>&nbsp;được triển khai tr&ecirc;n tất cả c&aacute;c lĩnh vực thuộc c&aacute;c ng&agrave;nh nghề như kinh doanh nh&agrave; h&agrave;ng, bất động sản, gi&aacute;o dục...với c&aacute;c t&iacute;nh năng, chuẩn mực của một website chuy&ecirc;n nghiệp theo đ&uacute;ng những g&igrave; m&agrave; đơn vị kinh doanh mong muốn.<br />\r\n&nbsp;</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"Thiết kế website theo yêu cầu chuyên nghiệp chuẩn SEO\" src=\"https://skyvietnam.com.vn/uploads/images/Thi%E1%BA%BFt%20K%E1%BA%BF%20Website%20Theo%20Y%C3%AAu%20C%E1%BA%A7u.jpg\" style=\"border:none; height:186px; margin:0px; padding:0px; width:500px\" title=\"Thiết Kế Website Theo Yêu Cầu\" /><br />\r\n&nbsp;</p>\r\n\r\n<h2 style=\"text-align:justify\"><span style=\"color:rgb(0, 100, 0)\">1. Những l&yacute; do n&ecirc;n thiết kế website theo y&ecirc;u cầu.</span></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">V&igrave; sao g&oacute;i&nbsp;<em><strong>thiết kế website theo y&ecirc;u cầu</strong></em>&nbsp;ng&agrave;y c&agrave;ng phổ biến v&agrave; được nhiều doanh nghiệp ưa chuộng nhất hiện nay? Những l&yacute; do dưới đ&acirc;y sẽ gi&uacute;p bạn l&yacute; giải điều đ&oacute;.<br />\r\n<br />\r\n&nbsp;+ Với mỗi<strong>&nbsp;<em>thiết kế website theo y&ecirc;u cầu&nbsp;</em></strong>doanh nghiệp sẽ được lựa chọn giao diện web theo &yacute; m&igrave;nh mong muốn cũng như những t&iacute;nh năng theo y&ecirc;u cầu cần thiết cho website doanh nghiệp thuộc ng&agrave;nh nghề, lĩnh vực nhất định. Mỗi kh&aacute;ch h&agrave;ng c&oacute; thể tiếp cận website doanh nghiệp kh&aacute;c c&ugrave;ng lĩnh vực để tham khảo hoặc nhờ đến sự tư vấn của c&aacute;c chuy&ecirc;n gia<span style=\"color:rgb(0, 0, 255)\">&nbsp;</span><em><u><strong><a href=\"https://skyvietnam.com.vn/thiet-ke-website.html\" style=\"margin: 0px; padding: 0px; text-decoration-line: none; color: rgb(0, 0, 0);\" title=\"thiết kế website\" type=\"thiết kế website chuyên nghiệp\"><span style=\"color:rgb(0, 0, 255)\">thiết kế website</span></a></strong></u></em>&nbsp;để tạo n&ecirc;n một trang web độc đ&aacute;o, ấn tượng với đầy đủ c&aacute;c t&iacute;nh năng thu h&uacute;t người d&ugrave;ng.<br />\r\n<br />\r\n+ &nbsp;Khi&nbsp;<strong>thiết kế theo y&ecirc;u cầu</strong>, trang web doanh nghiệp sẽ đảm bảo được tốc độ truy cập nhanh, ph&ugrave; hợp với mọi thiết bị di động bằng c&ocirc;ng nghệ&nbsp;<strong>thiết kế website Responsive</strong>&nbsp;v&agrave; tr&igrave;nh duyệt mang đến cho người d&ugrave;ng, kh&aacute;ch h&agrave;ng những trải nghiệm tuyệt vời nhất.<br />\r\n<br />\r\n+ Đặc biệt khi sở hữu một trang web theo y&ecirc;u cầu với giao diện c&ugrave;ng c&aacute;c t&iacute;nh năng ri&ecirc;ng biệt một c&aacute;ch khoa học, hợp l&yacute;, độc đ&aacute;o v&agrave; ấn tượng sẽ tạo lợi thế cho doanh nghiệp n&acirc;ng cao thứ hạng website tr&ecirc;n c&ocirc;ng cụ t&igrave;m kiếm, mang đến cơ hội tiếp cận kh&aacute;ch h&agrave;ng nhiều v&agrave; nhanh hơn.</p>\r\n\r\n<p style=\"text-align:center\"><br />\r\n<img alt=\"\" src=\"https://skyvietnam.com.vn/uploads/images/thi%E1%BA%BFt%20k%E1%BA%BF%20website%201.png\" style=\"border:none; height:250px; margin:0px; padding:0px; width:500px\" title=\"thiết kế website 1\" /><br />\r\n&nbsp;</p>\r\n\r\n<h2 style=\"text-align:justify\"><span style=\"color:rgb(0, 100, 0)\">2. Ưu điểm của g&oacute;i thiết kế website theo y&ecirc;u cầu tại Sky Việt Nam.</span></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">Bất cứ doanh nghiệp n&agrave;o khi tiến h&agrave;nh&nbsp;<em><u><strong>thiết kế website theo y&ecirc;u cầu</strong></u></em>, Sky Việt Nam cũng lu&ocirc;n đảm bảo v&agrave; cam kết tới qu&yacute; kh&aacute;ch h&agrave;ng một trang web với giao diện đẹp c&ugrave;ng c&aacute;c t&iacute;nh năng đầy đủ như tr&ecirc;n. B&ecirc;n cạnh đ&oacute; những lợi thế dưới đ&acirc;y l&agrave; điều bạn kh&ocirc;ng thể bỏ qua khi sử dụng v&agrave; trải nghiệm dịch vụ kh&aacute;ch h&agrave;ng của Sky Việt Nam:<br />\r\n<br />\r\n- &nbsp;Đội ngũ&nbsp;<u><strong>thiết kế website</strong></u>&nbsp;d&agrave;y dặn kinh nghiệm trong thiết kế h&agrave;ng ng&agrave;n website doanh nghiệp thuộc nhiều lĩnh vực, ng&agrave;nh nghề kh&aacute;c nhau sẽ nắm bắt được website của bạn n&ecirc;n v&agrave; cần c&oacute; những g&igrave;? Đ&oacute; l&agrave; nền tảng để ch&uacute;ng t&ocirc;i tư vấn v&agrave; hỗ trợ tận t&igrave;nh cho mỗi y&ecirc;u cầu&nbsp;<strong>thiết kế website.</strong><br />\r\n<br />\r\n- &nbsp;Cam kết thời gian b&agrave;n giao<strong>&nbsp;thiết kế website theo y&ecirc;u cầu chuy&ecirc;n nghiệp</strong>, chất lượng đ&uacute;ng như những g&igrave; đ&atilde; thỏa thuận v&agrave; k&yacute; kết tr&ecirc;n hợp đồng.<br />\r\n<br />\r\n- &nbsp;Dịch vụ hỗ trợ kh&aacute;ch h&agrave;ng sau thiết kế lu&ocirc;n sẵn s&agrave;ng, diễn ra 24/7 nhằm gi&uacute;p website doanh nghiệp vận h&agrave;nh một c&aacute;ch tốt nhất.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" src=\"https://skyvietnam.com.vn/uploads/images/Quy%20tr%C3%ACnh%20thi%E1%BA%BFt%20k%E1%BA%BF%20website%20theo%20y%C3%AAu.jpg\" style=\"border:none; height:325px; margin:0px; padding:0px; width:500px\" title=\"Quy trình thiết kế website theo yêu\" /><br />\r\n&nbsp;</p>\r\n\r\n<h2 style=\"text-align:justify\"><span style=\"color:rgb(0, 100, 0)\">3. Quy tr&igrave;nh thiết kế website theo y&ecirc;u cầu tại Sky Việt Nam</span>.</h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">Để mang đến cho kh&aacute;ch h&agrave;ng, doanh nghiệp những&nbsp;<strong>sản phẩm thiết kế website theo y&ecirc;u cầu chất lượng chuy&ecirc;n nghiệp nhất</strong>,&nbsp;<strong>Sky Việt Nam</strong>&nbsp;&aacute;p dụng một quy tr&igrave;nh thiết kế chặt chẽ với 8 bước cơ bản như sau:</p>\r\n\r\n<h3 style=\"text-align:justify\"><br />\r\nBước 1: Tiếp nhận y&ecirc;u cầu từ kh&aacute;ch h&agrave;ng.</h3>\r\n\r\n<p style=\"text-align:justify\">Sau khi đ&atilde; nhận được những y&ecirc;u cầu cụ thể được đưa ra từ ph&iacute;a kh&aacute;ch h&agrave;ng,&nbsp;<strong>Sky Việt Nam</strong>&nbsp;sẽ tiến h&agrave;nh t&igrave;m hiểu v&agrave; x&aacute;c nhận lại những y&ecirc;u cầu của kh&aacute;ch h&agrave;ng của email hoặc điện thoại.</p>\r\n\r\n<h3 style=\"text-align:justify\"><br />\r\nBước 2: Đ&aacute;nh gi&aacute; y&ecirc;u cầu v&agrave; tư vấn kh&aacute;ch h&agrave;ng cụ thể.</h3>\r\n\r\n<p style=\"text-align:justify\">Từ những th&ocirc;ng tin m&agrave; kh&aacute;ch h&agrave;ng cung cấp, ch&uacute;ng t&ocirc;i sẽ đưa ra những đ&aacute;nh gi&aacute; cụ thể v&agrave; tiến h&agrave;nh ph&acirc;n t&iacute;ch để hiểu r&otilde; hơn về mục đ&iacute;ch, y&ecirc;u cầu cũng như nguyện vọng thực sự m&agrave; kh&aacute;ch h&agrave;ng mong muốn thể hiện tr&ecirc;n website của m&igrave;nh. Từ đ&oacute;, ch&uacute;ng t&ocirc;i sẽ c&oacute; những tư vấn cụ thể nhất để kh&aacute;ch h&agrave;ng h&igrave;nh dung r&otilde; hơn về y&ecirc;u cầu của m&igrave;nh v&agrave; đưa ra phương &aacute;n thiết kế tối ưu nhất cho doanh nghiệp.</p>\r\n\r\n<h3 style=\"text-align:justify\"><br />\r\nBước 3: Thiết lập hồ sơ x&acirc;y dựng trang web.</h3>\r\n\r\n<p style=\"text-align:justify\">Từ những trao đổi cụ thể giữa 2 b&ecirc;n, Sky Việt Nam sẽ x&acirc;y dựng bản m&ocirc; tả chi tiết c&aacute;c t&iacute;nh năng, giao diện, bố cục của một website &nbsp;v&agrave; lập kế hoạch thực hiện dự &aacute;n đo lường về mặt nh&acirc;n sự v&agrave; thời gian.</p>\r\n\r\n<h3 style=\"text-align:justify\"><br />\r\nBước 4: Thiết kế giao diện website</h3>\r\n\r\n<p style=\"text-align:justify\">Từ hồ sơ thiết kế website, c&aacute;c nh&agrave; thiết kế web sẽ tiến h&agrave;nh thiết kế giao diện cho website.</p>\r\n\r\n<h3 style=\"text-align:justify\"><br />\r\nBước 5: Thiết kế cơ sở dữ liệu v&agrave; lập tr&igrave;nh t&iacute;nh năng.</h3>\r\n\r\n<p style=\"text-align:justify\">C&ugrave;ng với việc thiết kế giao diện, c&aacute;c chuy&ecirc;n vi&ecirc;n thiết kế web sẽ tiến h&agrave;nh thiết kế cơ sở dữ liệu v&agrave; lập tr&igrave;nh c&aacute;c t&iacute;nh năng cho phần quản trị website, cắt HTML, l&ecirc;n layout với CSS, tiến h&agrave;nh gh&eacute;p code v&agrave; ho&agrave;n thiện t&iacute;nh năng.</p>\r\n\r\n<h3 style=\"text-align:justify\"><br />\r\nBước 6: Ph&aacute;t h&agrave;nh bản Beta v&agrave; kiểm thử.</h3>\r\n\r\n<p style=\"text-align:justify\">Sau khi đ&atilde; ho&agrave;n thiện cơ bản giao diện v&agrave; c&aacute;c t&iacute;nh năng, ch&uacute;ng t&ocirc;i sẽ tiến h&agrave;nh up website l&ecirc;n server demo để chạy thử v&agrave; tiến h&agrave;nh sửa lỗi ( nếu c&oacute;).</p>\r\n\r\n<h3 style=\"text-align:justify\"><br />\r\nBước 7: B&agrave;n giao v&agrave; nghiệm thu</h3>\r\n\r\n<p style=\"text-align:justify\">Sau khi website đ&atilde; được vận h&agrave;nh trơn tru tr&ecirc;n demo, ch&uacute;ng t&ocirc;i sẽ tiến h&agrave;nh b&agrave;n giao cho doanh nghiệp cũng như hỗ trợ c&aacute;c t&agrave;i liệu để doanh nghiệp quản l&yacute; trang web dễ d&agrave;ng nhất.</p>\r\n\r\n<h3 style=\"text-align:justify\"><br />\r\nBước 8: &nbsp;Dịch vụ bảo h&agrave;nh - bảo tr&igrave; website.</h3>\r\n\r\n<p style=\"text-align:justify\">Đ&acirc;y l&agrave; việc l&agrave;m được thực hiện sau qu&aacute; tr&igrave;nh b&agrave;n giao website, ch&uacute;ng t&ocirc;i sẽ hỗ trợ doanh nghiệp mọi vấn đề kỹ thuật ph&aacute;t sinh trong qu&aacute; tr&igrave;nh sử dụng. Việc bảo h&agrave;nh được duy tr&igrave; trong 12 th&aacute;ng kể từ ng&agrave;y b&agrave;n giao nhưng nếu kh&aacute;ch h&agrave;ng d&ugrave;ng server hay hosting của ch&uacute;ng t&ocirc;i sẽ được bảo h&agrave;nh vĩnh viễn.<br />\r\n<br />\r\nMột quy tr&igrave;nh chuẩn mực, chuy&ecirc;n nghiệp sẽ gi&uacute;p doanh nghiệp sở hữu những&nbsp;<strong><u>thiết kế website theo y&ecirc;u cầu</u></strong>&nbsp;ho&agrave;n hảo nhất. H&atilde;y li&ecirc;n lạc với&nbsp;<strong><u>dịch vụ thiết kế website Sky Việt Nam</u></strong>&nbsp;ngay h&ocirc;m nay khi bạn cần x&acirc;y dựng một trang web cho doanh nghiệp m&igrave;nh. Bằng những kinh nghiệm d&agrave;y dặn trong lĩnh vực&nbsp;<strong><u>thiết kế website</u></strong>&nbsp;ch&uacute;ng t&ocirc;i sẽ mang đến giải ph&aacute;p tốt nhất cho doanh nghiệp.</p>', '2018-08-02 20:49:05', NULL, 0, '2018-08-02 20:49:05', NULL, NULL, NULL, b'1');
INSERT INTO `adposts` VALUES (8, '', '5 smartphone bán chạy nhất mọi thời đại', 'Galaxy S3, Nokia 5230 hay iPhone 5... là những smartphone bán chạy nhất mọi thời đại.', 8, 'https://znews-photo-td.zadn.vn/w210/Uploaded/neg_wpeczyr/2018_08_07/topsmartphonebest_800x450.jpg', '5-smartphone-ban-chay-nhat-moi-thoi-dai', '', '2018-08-08 13:48:17', NULL, 0, '0000-00-00 00:00:00', NULL, NULL, NULL, b'0');
INSERT INTO `adposts` VALUES (9, '', 'MobiFone miễn cọc cho khách mua Samsung Galaxy J8 kèm gói cước 4G', 'Khách hàng sẽ được miễn cọc khi mua điện thoại Samsung Galaxy J8 kèm các gói cước của MobiFone.', 8, 'https://znews-photo-td.zadn.vn/w210/Uploaded/wyhktpu/2018_08_07/image003_8.jpg', 'mobifone-mien-coc-cho-khach-mua-samsung-galaxy-j8-kem-goi-cuoc-4g', '<div class=\"the-article-body cms-body\">\n<p>Galaxy J8 là sản phẩm ở phân khúc tầm trung được Samsung ra mắt trong mùa hè này. Smartphone này được nhiều bạn trẻ yêu thích bởi thiết kế hiện đại, bắt mắt và tính năng chụp ảnh xoá phông hiện đại như dòng cao cấp Galaxy S9/S9+.</p>\n<p>Thay vì phải bỏ ra số tiền khoảng 7,3 triệu đồng để sở hữu chiếc smartphone này theo cách thông thường, người dùng được lợi lớn về giá máy khi mua Galaxy J8 tại các cửa hàng của MobiFone qua hình thức bán điện thoại kèm gói cước.</p>\n<table class=\"picture\" align=\"center\">\n<tbody>\n<tr>\n<td class=\"pic\"><img alt=\"MobiFone mien coc cho khach mua Samsung Galaxy J8 kem goi cuoc 4G hinh anh 1\" title=\"MobiFone miễn cọc cho khách mua Samsung Galaxy J8 kèm gói cước 4G hình ảnh 1\" src=\"https://znews-photo-td.zadn.vn/w660/Uploaded/wyhktpu/2018_08_07/image001_9.jpg\" width=\"1820\" height=\"1024\" /></td>\n</tr>\n<tr>\n<td class=\"pCaption caption\">Galaxy J8 là một trong những mẫu điện thoại thu hút nhất mùa hè này.</td>\n</tr>\n</tbody>\n</table>\n<p>Hình thức bán hàng này khá phổ biến ở nhiều nước phương Tây. MobiFone là một trong những đơn vị tiên phong trong hình thức này. Nhờ đó, khách hàng trong nước có cơ hội tiếp cận nhiều dòng điện thoại thông minh của các hãng lớn như Samsung, Apple… với mức giá hợp lý.</p>\n<p>Cụ thể, khách là chủ thuê bao trả sau của MobiFone (bao gồm thuê bao phát triển mới và thuê bao hiện hữu) được miễn cọc khi mua máy kèm cam kết sử dụng gói cước của MobiFone. Khách có thể tùy ý lựa chọn đăng ký các gói cước có giá từ 199.000 đồng/tháng để được miễn phí tất cả cuộc gọi nội mạng dưới 10 phút, có tối đa 100 phút thoại liên mạng và 10 GB dung lượng data tốc độ cao.</p>\n<p>Bạn Hoàng Nhật Anh - sinh viên Đại học Văn hóa Hà Nội cho biết: \"Từ lâu, mình muốn đổi smartphone hỗ trợ 4G nhưng chưa có điều kiện. Mình định mua lại máy cũ cho rẻ nhưng cũng lo về chất lượng. Giờ biết MobiFone bán điện thoại kèm gói cước giá rẻ thế này, mình đã có cơ hội mua máy mới chính hãng\".</p>\n<table class=\"picture\" align=\"center\">\n<tbody>\n<tr>\n<td class=\"pic\"><img alt=\"MobiFone mien coc cho khach mua Samsung Galaxy J8 kem goi cuoc 4G hinh anh 2\" title=\"MobiFone miễn cọc cho khách mua Samsung Galaxy J8 kèm gói cước 4G hình ảnh 2\" src=\"https://znews-photo-td.zadn.vn/w660/Uploaded/wyhktpu/2018_08_07/image003_8.jpg\" width=\"1772\" height=\"1183\" /></td>\n</tr>\n<tr>\n<td class=\"pCaption caption\">MobiFone mang đến ưu đãi miễn cọc khi mua máy kèm cam kết sử dụng gói cước.</td>\n</tr>\n</tbody>\n</table>\n<p>Chị Nguyễn Thị Thu Thủy (Hoàn Kiếm, Hà Nội) cho biết: “Năm ngoái tôi mua điện thoại Samsung Galaxy J7 Pro kèm theo gói cước M199. Điện thoại được bảo hành chính hãng, gói cước nhiều ưu đãi nên tôi thoải mái liên lạc, dùng Internet tốc độ cao phục vụ công việc và giải trí mà không phải lo lắng gì”.</p>\n<p>Không cần bỏ ra khoản tiền lớn một lần hay băn khoăn vì khoản lãi phát sinh nếu mua theo cách trả góp thông thường, khách hàng của MobiFone chỉ phải bỏ ra một số tiền nhỏ để mua máy, đồng thời lựa chọn đăng ký và cam kết dùng gói cước của nhà mạng này.</p>\n<p>Hàng tháng, thay vì trả góp theo cách thông thường, khách hàng chỉ phải trả tiền gói cước đã cam kết sử dụng. Như vậy, khách hàng vừa mua được điện thoại chất lượng tốt với mức giá rẻ vừa có sẵn dịch vụ đi kèm để thoải mái sử dụng.</p>\n<p>Đại diện MobiFone chia sẻ: “MobiFone mong muốn ngày càng có nhiều khách hàng được sử dụng sản phẩm công nghệ chất lượng cao. Chúng tôi cũng muốn dành tặng khách hàng nhiều ưu đãi để họ có cơ hội trải nghiệm các tiện ích trên chiếc điện thoại thông minh, từ đó nâng cao chất lượng cuộc sống.”</p>\n<div>\n<table>\n<tbody>\n<tr>\n<td>\n<div class=\"notebox nleft\">\n<table class=\"picture\" align=\"center\">\n<tbody>\n<tr>\n<td class=\"pic\"><img alt=\"MobiFone mien coc cho khach mua Samsung Galaxy J8 kem goi cuoc 4G hinh anh 3\" title=\"MobiFone miễn cọc cho khách mua Samsung Galaxy J8 kèm gói cước 4G hình ảnh 3\" src=\"https://znews-photo-td.zadn.vn/w660/Uploaded/wyhktpu/2018_08_07/image005_9.jpg\" width=\"462\" height=\"654\" /></td>\n</tr>\n</tbody>\n</table>\n</div>\n<p>\n&nbsp;Độc giả có thể truy cập website chính thức của MobiFone: <a href=\"http://www.mobifone.vn/\" target=\"_blank\" rel=\"nofollow\">mobifone.vn</a> hoặc gọi tổng đài 9090 để biết thêm thông tin chi tiết về chương trình.</p>\n</td>\n</tr>\n</tbody>\n</table>\n</div>\n<br />\n<br />\n<br />\n</div>', '2018-08-08 13:48:17', NULL, 0, '0000-00-00 00:00:00', NULL, NULL, NULL, b'0');
INSERT INTO `adposts` VALUES (10, '', '8 năm Galaxy Note: Từ kẻ bị hoài nghi đến di động đi đầu về sáng tạo', 'Trải qua nhiều thăng trầm, Galaxy Note vẫn là dòng sản phẩm tạo nên dấu ấn đậm nét nhất của Samsung trong làng smartphone toàn cầu, thu về nhiều kỷ lục doanh số.', 8, 'https://znews-photo-td.zadn.vn/w210/Uploaded/wyhktpu/2018_08_07/SSnotecover2__chosen_1.jpg', '8-nam-galaxy-note-tu-ke-bi-hoai-nghi-den-di-dong-di-dau-ve-sang-tao', '<div class=\"the-article-body cms-body\">\n<h1><img alt=\"8 nam Galaxy Note: Tu ke bi hoai nghi den di dong di dau ve sang tao hinh anh 1\" title=\"8 năm Galaxy Note: Từ kẻ bị hoài nghi đến di động đi đầu về sáng tạo hình ảnh 1\" src=\"https://znews-photo-td.zadn.vn/Uploaded/wyhktpu/2018_08_07/SSnotecover2__chosen_1.jpg\" width=\"1920\" height=\"1080\"></h1>\n<h3>Trải qua nhiều thăng trầm, Galaxy Note vẫn là dòng sản phẩm tạo nên dấu ấn đậm nét nhất của Samsung trong làng smartphone toàn cầu, thu về nhiều kỷ lục doanh số.</h3>\n<table class=\"picture\" align=\"center\">\n<tbody>\n<tr>\n<td class=\"pic\"><img alt=\"8 nam Galaxy Note: Tu ke bi hoai nghi den di dong di dau ve sang tao hinh anh 2\" title=\"8 năm Galaxy Note: Từ kẻ bị hoài nghi đến di động đi đầu về sáng tạo hình ảnh 2\" src=\"https://znews-photo-td.zadn.vn/Uploaded/wyhktpu/2018_08_07/note1.jpg\" width=\"1037\" height=\"692\"></td>\n</tr>\n<tr>\n<td class=\"pCaption caption\">\n<h3>Khởi đầu trong ngờ vực\n</h3>\nQuay trở lại 2011, thời điểm thương hiệu Hàn Quốc tung ra chiếc phablet Galaxy Note đầu tiên. Khi đó, tất cả đều hoài nghi về một chiếc di động có màn hình lớn hơn hẳn so với thế hệ smartphone cùng thời, đi kèm cây bút S Pen, cũng ra đời trong giai đoạn thoái trào các loại bút stylus.\n<br>\n<br>\nSamsung trang bị cho Galaxy Note vi xử lý dual-core Exynos tốc độ 1,4 GHz, CPU ARM Cortex-A9, GPU Mali-400 và RAM 1 GB, camera 8 megapixel, camera sau 2 MP, viên pin 2.500 mAh, hệ điều hành Android Gingerbread 2.3. Thiết bị cũng để lại ấn tượng sâu sắc trong tâm trí người dùng khi mở đầu cho kiểu dáng smartphone mới, đồng thời tạo nên xu hướng độc đáo ghi chú trên di động. <br>\n<br>\nHơn 1 triệu chiếc bán ra chỉ sau 2 tháng. Đến tháng 2/2012, 10 triệu chiếc Note đời đầu đã đến tay người dùng, đập tan mọi nghi ngờ và mở ra chương mới cho Samsung.\n</td>\n</tr>\n</tbody>\n</table>\n<table class=\"picture\" align=\"center\">\n<tbody>\n<tr>\n<td class=\"pic\"><img alt=\"8 nam Galaxy Note: Tu ke bi hoai nghi den di dong di dau ve sang tao hinh anh 3\" title=\"8 năm Galaxy Note: Từ kẻ bị hoài nghi đến di động đi đầu về sáng tạo hình ảnh 3\" src=\"https://znews-photo-td.zadn.vn/Uploaded/wyhktpu/2018_08_07/Note2.jpeg\" width=\"597\" height=\"437\"></td>\n</tr>\n<tr>\n<td class=\"pCaption caption\">\n<h3>Chiến thắng thuyết phục\n</h3>\nTháng 8/2012, Samsung tiếp tục bắn “phát pháo” Galaxy Note II. So với chiếc Note đầu tiên, Galaxy Note II là bản nâng cấp lớn. Samsung đã đẩy giới hạn màn hình smartphone lên 5,5 inch với chất lượng AMOLED, vi xử lý quad-core Exynos 4412 tốc độ 1,6 GHz với CPU Cortex-A9, GPU Mali-400MP4, RAM cũng được tăng lên gấp đôi. <br>\n<br>\nKích thước to hơn nhiều song lại gọn gàng, mỏng hơn thế hệ trước cùng dung lượng pin “trâu”, chỉ sau hai tháng, giới quan sát ngỡ ngàng với 5 triệu chiếc Note II bán ra, gấp 5 lần đời đầu.\n</td>\n</tr>\n</tbody>\n</table>\n<table class=\"picture\" align=\"center\">\n<tbody>\n<tr>\n<td class=\"pic\"><img alt=\"8 nam Galaxy Note: Tu ke bi hoai nghi den di dong di dau ve sang tao hinh anh 4\" title=\"8 năm Galaxy Note: Từ kẻ bị hoài nghi đến di động đi đầu về sáng tạo hình ảnh 4\" src=\"https://znews-photo-td.zadn.vn/Uploaded/wyhktpu/2018_08_07/Note3.jpg\" width=\"600\" height=\"400\"></td>\n</tr>\n<tr>\n<td class=\"pCaption caption\">\n<h3>Galaxy Note 3: Bản nâng cấp lớn\n</h3>\nMột năm sau đó, Galaxy Note 3 ra mắt. Đây là lần đầu tiên thiết kế nắp lưng vân da được giới thiệu trên dòng Note, thay cho chất liệu vỏ silicone trước đó. Ngoài ra, hãng cũng tiếp tục nâng kích thước màn hình của máy lên 5,7 inch với độ phân giải Full HD, đi kèm cấu hình mạnh nhất thời bấy giờ. Ngay tháng đầu tiên, 5 triệu chiếc đến tay người dùng, sau đó hai tháng, con số đã được nhân lên gấp đôi.\n</td>\n</tr>\n</tbody>\n</table>\n<table class=\"picture\" align=\"center\">\n<tbody>\n<tr>\n<td class=\"pic\"><img alt=\"8 nam Galaxy Note: Tu ke bi hoai nghi den di dong di dau ve sang tao hinh anh 5\" title=\"8 năm Galaxy Note: Từ kẻ bị hoài nghi đến di động đi đầu về sáng tạo hình ảnh 5\" src=\"https://znews-photo-td.zadn.vn/Uploaded/wyhktpu/2018_08_07/Note4.jpg\" width=\"1024\" height=\"683\"></td>\n</tr>\n<tr>\n<td class=\"pCaption caption\">\n<h3>Galaxy Note 4: Mới lạ với thiết kế kim loại\n</h3>\nTháng 10/2014, Galaxy Note 4 được giới thiệu với nhiều cải tiến. Máy có màn hình kích thước 5,7 inch với độ phân giải Quad HD hiếm có bấy giờ, vi xử lý Exynos 5433 hoặc Snapdragon 805 tuỳ thị trường. Đây cũng là smartphone khung kim loại đầu tiên của Samsung được sản xuất đại trà, sau chiếc Galaxy Alpha mang tính thử nghiệm. Sau hai tháng lên kệ, doanh số của máy đã đạt khoảng 4,5 triệu chiếc.\n</td>\n</tr>\n</tbody>\n</table>\n<table class=\"picture\" align=\"center\">\n<tbody>\n<tr>\n<td class=\"pic\"><img alt=\"8 nam Galaxy Note: Tu ke bi hoai nghi den di dong di dau ve sang tao hinh anh 6\" title=\"8 năm Galaxy Note: Từ kẻ bị hoài nghi đến di động đi đầu về sáng tạo hình ảnh 6\" src=\"https://znews-photo-td.zadn.vn/Uploaded/wyhktpu/2018_08_07/note_edge.jpg\" width=\"1280\" height=\"720\"></td>\n</tr>\n<tr>\n<td class=\"pCaption caption\">\n<h3>Thử nghiệm liều lĩnh\n</h3>\nVới Galaxy Note Edge, thiết bị được tung ra vào tháng 2/2015 thể hiện bước đi táo bạo của Samsung khi lần đầu thử nghiệm thiết kế màn hình cong tràn cạnh trên smartphone. Thiết bị có màn hình 5,6 inch với phần cạnh phải của màn hình được uốn cong, tích hợp vào đó một màn hình nhỏ chạy theo chiều dọc độc đáo, không thể nhầm lẫn so với smartphone khác trên thị trường. Ngoài ra, Samsung trang bị cho máy vi xử lý quad-core Snapdragon 805 tốc độ 2,7 GHz, RAM 3 GB cao cấp nhất thị trường bấy giờ.\n</td>\n</tr>\n</tbody>\n</table>\n<table class=\"picture\" align=\"center\">\n<tbody>\n<tr>\n<td class=\"pic\"><img alt=\"8 nam Galaxy Note: Tu ke bi hoai nghi den di dong di dau ve sang tao hinh anh 7\" title=\"8 năm Galaxy Note: Từ kẻ bị hoài nghi đến di động đi đầu về sáng tạo hình ảnh 7\" src=\"https://znews-photo-td.zadn.vn/Uploaded/wyhktpu/2018_08_07/Note5.jpg\" width=\"817\" height=\"648\"></td>\n</tr>\n<tr>\n<td class=\"pCaption caption\">\n<h3>Mở đầu trào lưu thiết kế nguyên khối\n</h3>\nMột năm sau đó là sự ra đời của Galaxy Note5. Điểm thay đổi nhiều nhất trên Note5 là thiết kế. Chiếc phablet có thiết kế nguyên khối với pin dung lượng 3.000 mAh không thể tháo rời. Dung lượng bộ nhớ trong chỉ có 32 và 64 GB, không hỗ trợ thẻ microSD. Đã có rất nhiều tranh cãi liên quan đến thay đổi này, song việc các hãng sau đó đưa thiết kế nguyên khối vào sản phẩm đã minh chứng cho cách làm của Samsung. <br>\n<br>\nMáy còn có những nâng cấp đáng chú ý như cảm biến vân tay chạm thay vì quét, S Pen có thêm hiệu ứng âm thanh khi bấm giúp người dùng không còn lo lắng việc mất bút như trước. Ngoài ra, thiết bị còn sử dụng chất liệu kim loại rất được kỳ vọng trước đó.\n</td>\n</tr>\n</tbody>\n</table>\n<table class=\"picture\" align=\"center\">\n<tbody>\n<tr>\n<td class=\"pic\"><img alt=\"8 nam Galaxy Note: Tu ke bi hoai nghi den di dong di dau ve sang tao hinh anh 8\" title=\"8 năm Galaxy Note: Từ kẻ bị hoài nghi đến di động đi đầu về sáng tạo hình ảnh 8\" src=\"https://znews-photo-td.zadn.vn/Uploaded/wyhktpu/2018_08_07/Note7.jpg\" width=\"1280\" height=\"720\"></td>\n</tr>\n<tr>\n<td class=\"pCaption caption\">\n<h3>Nốt trầm Galaxy Note 7\n</h3>\nGalaxy Note 7 ra mắt vào tháng 8/2016 tiếp tục tạo sóng khi mang đến nhiều công nghệ mới: thiết kế cong hai cạnh cải tiến từ S7 edge, cấu hình mạnh cùng tính năng quét mống mắt lần đầu xuất hiện trên smartphone Samsung. Giao diện TouchWiz được thay bằng Galaxy UI trực quan hơn. Bút S Pen cũng được nâng cấp với khả năng tạo ảnh GIF từ video, hay phóng to nội dung màn hình. <br>\n<br>\nĐáng tiếc, sản phẩm gặp sự cố khiến hãng buộc phải thu hồi, sau đó “tái xuất” với cái tên Galaxy Note Fan Edition - mang đầy đủ đặc tính của Note 7, bổ sung Bixby. Sản phẩm được đón nhận tại Hàn Quốc và một số thị trường trong đó có Việt Nam, cho thấy sự tín nhiệm của Note Fan với dòng sản phẩm cờ đầu của Samsung vẫn còn nguyên vẹn.\n</td>\n</tr>\n</tbody>\n</table>\n<table class=\"picture\" align=\"center\">\n<tbody>\n<tr>\n<td class=\"pic\"><img alt=\"8 nam Galaxy Note: Tu ke bi hoai nghi den di dong di dau ve sang tao hinh anh 9\" title=\"8 năm Galaxy Note: Từ kẻ bị hoài nghi đến di động đi đầu về sáng tạo hình ảnh 9\" src=\"https://znews-photo-td.zadn.vn/Uploaded/wyhktpu/2018_08_07/notefe.jpg\" width=\"893\" height=\"677\"></td>\n</tr>\n<tr>\n<td class=\"pCaption caption\">\n<h3>Note FE: Ngoại hình cao cấp với mức giá hấp dẫn\n</h3>\nĐược Samsung sản xuất mới, Galaxy Note Fan Edition không quá khác biệt so với sản phẩm bị thu hồi trừ viên pin được làm nhỏ cùng một số nâng cấp phần mềm. Thiết bị được bán ra với mức giá cũng rẻ hơn, song vẫn mang trọn dáng vẻ của một sản phẩm cao cấp trong năm đó, tiệm cận các tính năng mới nhất của Note 8, đặc biệt phải kể đến cảm biến quét mống mắt giúp người dùng có được lựa chọn tối ưu về hiệu năng so với giá.\n</td>\n</tr>\n</tbody>\n</table>\n<table class=\"picture\" align=\"center\">\n<tbody>\n<tr>\n<td class=\"pic\"><img alt=\"8 nam Galaxy Note: Tu ke bi hoai nghi den di dong di dau ve sang tao hinh anh 10\" title=\"8 năm Galaxy Note: Từ kẻ bị hoài nghi đến di động đi đầu về sáng tạo hình ảnh 10\" src=\"https://znews-photo-td.zadn.vn/Uploaded/wyhktpu/2018_08_07/Note8.jpg\" width=\"1170\" height=\"780\"></td>\n</tr>\n<tr>\n<td class=\"pCaption caption\">\n<h3>Galaxy Note8: Sự trở lại ngoạn mục\n</h3>\nTháng 9/2017, làng di động xôn xao với sự xuất hiện của Galaxy Note8 với rất nhiều nâng cấp lớn: bút S Pen cải tiến cho trải nghiệm mượt mà, bên cạnh trợ lý ảo Bixby, Samsung Pay, màn hình lớn nhất lịch sử dòng Note, camera kép cùng cấu hình luôn được trang bị cao cấp nhất. <br>\n<br>\nTheo Samsung, hơn 650.000 chiếc Note8 đã được đặt hàng trong 5 ngày trên 40 quốc gia, gấp 2,5 lần so với model tiền nhiệm Galaxy Note 7. Kết quả sau một tháng, hơn một triệu chiếc Note 8 được tiêu thụ chỉ tính riêng tại Hàn Quốc. Kết thúc 2017, khoảng 33 triệu chiếc Note 8 và S8 đến tay người dùng. Dù chưa có con số chính thức, nhưng Samsung ước tính sẽ có 10 triệu chiếc Note8 bán ra trong năm 2018.\n</td>\n</tr>\n</tbody>\n</table>\n<table class=\"picture\" align=\"center\">\n<tbody>\n<tr>\n<td class=\"pic\"><img alt=\"8 nam Galaxy Note: Tu ke bi hoai nghi den di dong di dau ve sang tao hinh anh 11\" title=\"8 năm Galaxy Note: Từ kẻ bị hoài nghi đến di động đi đầu về sáng tạo hình ảnh 11\" src=\"https://znews-photo-td.zadn.vn/Uploaded/wyhktpu/2018_08_07/<a href=\">note9</a>.jpg\" width=\"1030\" height=\"652\"></td>\n</tr>\n<tr>\n<td class=\"pCaption caption\">\n<h3>Galaxy Note9: Ông hoàng mới sẽ xuất hiện? </h3>\nNhững thông tin rò rỉ về điểm hiệu năng Geekbench cao kỷ lục khiến Galaxy Note9 ra mắt vào ngày 9/8 tới đây được dự đoán sẽ là chiếc smartphone mạnh mẽ nhất trong làng di động. <br>\n<br>\nNhiều khả năng Samsung sẽ trang bị cho sản phẩm những con chip mạnh mẽ nhất, RAM 8 GB, bộ nhớ trong lên đến 512 GB, viên pin 4.000 mAh, camera kép 12 MP tích hợp AI. Bên cạnh đó, bút S Pen với nhiều cải tiến như tích hợp Bluetooth điều khiển camera để chụp các tư thế khó, góc rộng, chỉnh âm lượng… hỗ trợ trình chiếu như một remote control trong các cuộc họp.\n</td>\n</tr>\n</tbody>\n</table>\n</div>', '2018-08-08 13:48:17', NULL, 0, '0000-00-00 00:00:00', NULL, NULL, NULL, b'0');
INSERT INTO `adposts` VALUES (11, '', 'Qua cuộc thi ảnh, thí sinh cảm nhận sâu hơn về TP.HCM', '12 thí sinh của cuộc thi \"TP.HCM 2018\" đã hoàn thành phần tranh tài chụp ảnh bằng Huawei P20 Pro.', 8, 'https://znews-photo-td.zadn.vn/w210/Uploaded/neg_wpeczyr/2018_08_07/huawei_contest_zing9565.jpg', 'qua-cuoc-thi-anh-thi-sinh-cam-nhan-sau-hon-ve-tphcm', '', '2018-08-08 13:48:17', NULL, 0, '0000-00-00 00:00:00', NULL, NULL, NULL, b'0');
INSERT INTO `adposts` VALUES (12, '', 'Các nhà phát triển trong và ngoài nước đang mở trận \'siêu ứng dụng\'', 'Các nhà phát triển trong và ngoài nước như Grab, Zalo, Line... đang mở cuộc đua phát triển \"siêu ứng dụng\".', 8, 'https://znews-photo-td.zadn.vn/w210/Uploaded/fsmyy/2018_08_07/grabfoode1516965009185_thienan_41018660.jpg', 'cac-nha-phat-trien-trong-va-ngoai-nuoc-dang-mo-tran-sieu-ung-dung', '<div class=\"the-article-body cms-body\">\n<p>Nếu trong bán lẻ có khái niệm one-stop-shop, tức cửa hàng tích hợp nhiều dịch vụ, sản phẩm, thì trong công nghệ cũng có khái niệm tương tự với tên gọi là all-in-one app, ứng dụng tích hợp nhiều dịch vụ khác nhau hay còn gọi là “siêu ứng dụng”.</p>\n<p>“Mục tiêu của chúng tôi là trở thành một ứng dụng Đông Nam Á đáp ứng tất cả nhu cầu thiết yếu cho cuộc sống của bạn ở mọi lúc, thậm chí có thể phục vụ nhu cầu của bạn cả trước khi bạn biết rằng bạn cần đến chúng.</p>\n<p>Người dùng Grab sẽ tận hưởng các dịch vụ vô cùng hấp dẫn như mua sắm, tiện ích, giải trí và nhiều hơn nữa từ siêu ứng dụng hữu ích nhất cho cuộc sống của Đông Nam Á”, ông Jerald Singh, Giám đốc Phụ trách sản phẩm của Grab, đã vẽ lên viễn cảnh của một “siêu ứng dụng” như vậy dựa vào hệ sinh thái ứng dụng và dữ liệu người dùng khổng lồ.</p>\n<p>Ở Việt Nam, cuộc chiến siêu ứng dụng đang nóng lên từng ngày. Mới đây, Zalo bất ngờ phát đi thông báo tuyển dụng Giám đốc Kinh doanh cho mảng O2O (tạm dịch: kinh doanh đa kênh) với mức lương lên đến hơn 120 triệu đồng/tháng. Song song đó, Zalo cũng tung ra bản thử nghiệm cho ứng dụng cùng tên khi tích hợp thêm dịch vụ gọi Taxi (Zalo Taxi), gọi đồ ăn (Zalo Food), du lịch (Zalo Travel), tin tức tài chính (Zalo Bank) và các dịch vụ liên quan đến chính phủ điện tử.</p>\n<p>Đại diện Zalo từ chối trả lời các vấn đề liên quan nhưng không khó để nhận ra sau thông điệp đạt 100 triệu người sử dụng hồi tháng 5 vừa qua. Thông điệp tiếp theo của Zalo là cung cấp đầy đủ các dịch vụ cần thiết cho những người sử dụng này để giữ chặt họ với ứng dụng.</p>\n<p>Có thể nói đây là kế hoạch đã có từ trước của Zalo và việc tung ra vào thời điểm này không chỉ mình Zalo mà còn có nhiều doanh nghiệp khác. Gần đây nhất là Grab. Sau khi tung ra dịch vụ GrabFresh, ông Anthony Tan, Giám đốc Điều hành kiêm nhà sáng lập, cũng không giấu tham vọng đưa Grab thành siêu ứng dụng ở Đông Nam Á. Nhất là vào thời điểm Grab công bố vừa nhận thêm 2 tỷ USD trong vòng gọi vốn hiện tại.</p>\n<p>Đối thủ trực tiếp của Grab, Go-jek cũng đang đi theo định hướng siêu ứng dụng. Go-Viet, đại diện công ty ở Việt Nam hiện chỉ mới tung ra dịch vụ gọi xe máy nhưng giới quan sát dự đoán Go-Viet sẽ sớm tung ra các dịch vụ tiếp theo trong bối cảnh hiện nay.</p>\n<p>Đại diện cuối cùng tham gia trong sân chơi siêu ứng dụng nhiều khả năng là LINE, trực thuộc Naver (Nhật). LINE là cái tên khá quen thuộc ở Việt Nam trong giai đoạn 2012-2013, thời điểm bùng nổ của các ứng dụng nhắn tin. Tuy nhiên, LINE đã âm thầm rời khỏi thị trường và nhường sân lại cho Zalo và Facebook Messenger.</p>\n<table class=\"picture\" align=\"center\">\n<tbody>\n<tr>\n<td class=\"pic\"><img alt=\"Cac nha phat trien trong va ngoai nuoc dang mo tran &#39;sieu ung dung&#39; hinh anh 1\" title=\"Các nhà phát triển trong và ngoài nước đang mở trận &#39;siêu ứng dụng&#39; hình ảnh 1\" src=\"https://znews-photo-td.zadn.vn/w660/Uploaded/fsmyy/2018_08_07/tindung_71446154.jpg\" width=\"600\" height=\"386\" /></td>\n</tr>\n</tbody>\n</table>\n<p>Tính đến nay, LINE có hơn 168 triệu người sử dụng ở Nhật Bản, Thái Lan, Đài Loan và Indonesia. Tốc độ tăng trưởng người sử dụng mới của LINE đã chậm lại từ năm 2015 và đơn vị này đang chịu áp lực tìm kiếm người sử dụng mới.</p>\n<p>Bên cạnh việc tích hợp nhiều dịch vụ hữu ích, gần như chắc chắn, các chiến dịch khuyến mãi để thu hút người sử dụng sẽ là vũ khí quen thuộc trong cuộc chiến giành thị phần của các siêu ứng dụng. Câu hỏi đặt ra là các doanh nghiệp được lợi gì khi giữ chặt người sử dụng với nền tảng của họ?</p>\n<p>Bà Lê Hoàng Uyên Vy, người đang giữ vị trí điều hành của Quỹ ESP Capital, cho rằng trong cuộc chiến siêu ứng dụng, thanh toán trực tuyến sẽ là nền tảng và các dịch vụ cộng thêm sẽ là yếu tố thu hút và giữ chân người sử dụng. Gần như các doanh nghiệp tham gia đều có dịch vụ thanh toán trực tuyến riêng như Grab có GrabPay, Go-jek có Go-Pay... và đều có nhu cầu đẩy mạnh lượng giao dịch trực tuyến thông qua các nền tảng này. Theo thống kê của Grab, nếu như thị trường cho di chuyển ở Đông Nam Á trị giá 25 tỷ USD, thì thị trường thanh toán không dùng tiền mặt lên đến 500 tỷ USD.</p>\n<p>Theo thống kê của website Statista, giá trị thanh toán trực tuyến ở Việt Nam năm 2017 là 6,14 tỉ USD. Con số này dự kiến tăng gấp đôi lên 12,33 tỷ USD vào năm 2022. Cũng theo bà Vy, cạnh tranh trong việc tích hợp các dịch vụ sẽ diễn ra gay gắt vì bên nào có hệ sinh thái kém hấp dẫn sẽ khó cạnh tranh với các đối thủ. Về phía người sử dụng, sẽ có cuộc cách mạng về hành vi sử dụng.</p>\n<p>“Các siêu ứng dụng sẽ có lợi thế trong việc thu hút và giữ chân khách hàng. Do các siêu ứng dụng có thể khuyến khích khách hàng sử dụng nhiều hơn một dịch vụ nên ngân sách dành cho việc tìm kiếm khách hàng mới sẽ nhiều hơn so với các ứng dụng riêng lẻ. Với nhiều điểm mạnh cộng hưởng, các siêu ứng dụng sẽ có khả năng thay đổi toàn diện hành vi tiêu dùng của khách hàng trong vòng 3 năm tới”, bà Vy nói.</p>\n<p>Lợi thế lớn nhất của Zalo là phát triển từ nền tảng giao tiếp, đây là phương thức chia sẻ thông tin, dịch vụ nhanh nhất trên thị trường hiện nay. Trên thực tế, nhiều ứng dụng mở rộng từ mô hình chat khá thành công trên thế giới như WeChat (Tencent), LINE. Việc am hiểu thị trường nội địa cũng là lợi thế đáng kể cho Zalo trong quá trình triển khai việc kết nối. Về phần mình, đại diện Grab cũng khá tự tin trong việc am hiểu thị trường và nền tảng công nghệ của Công ty. Theo đó, Công ty có thể khám phá và triển khai trong thời gian ngắn theo từng khu vực.</p>\n<p>“Điều này giúp chúng tôi có lợi thế trong việc tăng trưởng nhanh đối với các cuộc chơi mang tính lâu dài”, đại diện Grab cho biết.</p>\n<table align=\"center\" class=\"article\">\n<tbody>\n<tr>\n<td><div class=\"inner-article\"><a href=\"/2018-nam-bung-no-chinh-quyen-thong-minh-tren-zalo-post865570.html\"><p class=\"cover formatted\" style=\"background-image:url(https://znews-photo-td.zadn.vn/w210/Uploaded/neg_wpeczyr/2018_08_02/3_Nguoi_dan_tra_cuu_qua_Zalo.jpg);\"></p><h2 class=\"title\">2018 - năm bùng nổ chính quyền thông minh trên Zalo</h2><p class=\"summary\">Chỉ trong nửa đầu 2018, cả nước có thêm 24 tỉnh thành triển khai Chính quyền thông minh qua Zalo và con số này đang tiếp tục tăng trưởng mạnh mẽ.</p></a></div></td>\n</tr>\n</tbody>\n</table>\n</div>', '2018-08-08 13:48:17', NULL, 0, '0000-00-00 00:00:00', NULL, NULL, NULL, b'0');
INSERT INTO `adposts` VALUES (13, '', 'Apple Watch Series 3 lần đầu bị bẻ khóa thành công', 'Jailbreak (bẻ khóa) không còn lạ đối với iPhone. Tuy nhiên, đối với dòng sản phẩm Apple Watch thì điều này vẫn còn khá mới.\n', 8, 'https://znews-photo-td.zadn.vn/w210/Uploaded/neg_wpeczyr/2018_08_07/original.jpg', 'apple-watch-series-3-lan-dau-bi-be-khoa-thanh-cong', '<div class=\"the-article-body cms-body\">\n<p dir=\"ltr\">Gần đây có một thông tin thú vị đối với cộng đồng jailbreak, đó là Tihmstar đã phát hành một bản jailbreak gần như hoàn chỉnh đầu tiên cho chiếc <a href=\"https://news.zing.vn/cong-ty-apple-tieu-diem.html\" title=\"Tin tức Apple\" class=\"topic company autolink\">Apple</a> Watch Series 3, chạy trên watchOS 4.1. Bản jailbreak này cũng sẽ chạy trên các thiết bị Apple Watch cũ hơn, tuy nhiên sẽ có một số thay đổi nhỏ.</p>\n<p dir=\"ltr\">Bản jailbreak này không dành cho những người dùng phổ thông. Nó dành cho các nhà phát triển, những người có nhu cầu xem xét kỹ hơn các tiến trình bên trong của hệ điều hành watchOS.</p>\n<table class=\"picture\" align=\"center\">\n<tbody>\n<tr>\n<td class=\"pic\"><img alt=\"Apple Watch Series 3 lan dau bi be khoa thanh cong hinh anh 1\" title=\"Apple Watch Series 3 lần đầu bị bẻ khóa thành công hình ảnh 1\" src=\"https://znews-photo-td.zadn.vn/w660/Uploaded/neg_wpeczyr/2018_08_07/original.jpg\" width=\"780\" height=\"536\" /></td>\n</tr>\n<tr>\n<td class=\"pCaption caption\">Chiếc&nbsp;Apple Watch Series 3 lần đầu tiên được bẻ khóa thành công.\n</td>\n</tr>\n</tbody>\n</table>\n<p dir=\"ltr\">Tuy nhiên, điều này không có nghĩa là những người dùng thông thường không thể sử dụng bản jailbreak này. Nhưng nếu có sử dụng thì chắc cũng sẽ khiến bạn phải thất vọng, bởi nó không trang bị những tính năng mà một người dùng thông thường mong đợi như: kho ứng dụng Cydia, các tùy chỉnh cá nhân đặc biệt,... Tất nhiên, những công cụ này có thể sẽ được bổ sung trong tương lai.</p>\n<p dir=\"ltr\">Trong những năm qua, Apple và cộng đồng jailbreak đã có một mối quan hệ như “vòng luẩn quẩn”. Trong khi Apple phát hành các phiên bản iOS mới và ngăn chặn các bản jailbreak, thì cộng đồng lại liên tục tìm cách bẻ khóa các phiên bản iOS mới.</p>\n<table align=\"center\" class=\"article\">\n<tbody>\n<tr>\n<td><div class=\"inner-article\"><a href=\"/vi-sao-iphone-va-dien-thoai-android-se-tiep-tuc-tang-gia-post866577.html\"><p class=\"cover formatted\" style=\"background-image:url(https://znews-photo-td.zadn.vn/w210/Uploaded/fsmyy/2018_08_06/huaweip20pro5980x620.jpg);\"></p><h2 class=\"title\">Vì sao iPhone và điện thoại Android sẽ tiếp tục tăng giá?</h2><p class=\"summary\">Các nhà sản xuất có vẻ hứng thú với việc tạo ra phân khúc smartphone siêu cao cấp để mang về mức lợi nhuận cao hơn.</p></a></div></td>\n</tr>\n</tbody>\n</table>\n<br />\n</div>', '2018-08-08 13:48:17', NULL, 0, '0000-00-00 00:00:00', NULL, NULL, NULL, b'0');
INSERT INTO `adposts` VALUES (14, '', '3 ngày săn ảnh vượt đỉnh tòa tháp chọc trời Sài Gòn\n\n20', 'Để có được các bức ảnh khác biệt về tòa nhà cao nhất Việt Nam mới xây dựng lên tại TP.HCM, tác giả đã mất 3 ngày săn mây luồn khá khó khăn.', 8, 'https://znews-photo-td.zadn.vn/w210/Uploaded/lerl/2018_08_06/5555.jpg', '3-ngay-san-anh-vuot-dinh-toa-thap-choc-troi-sai-gon20', '<div class=\"the-article-body cms-body\">\n<h1><strong>CHUYỆN SĂN ẢNH VƯỢT ĐỈNH TÒA THÁP CHỌC TRỜI SÀI GÒN</strong></h1>\n<h2><strong>Để có được các bức ảnh khác biệt về tòa nhà cao nhất Việt Nam mới xây dựng lên tại TP.HCM, tác giả đã mất 3 ngày săn mây, mặt trời khá khó khăn.</strong></h2>\n<h1><img alt=\"3 ngay san anh vuot dinh toa thap choc troi Sai Gon hinh anh 1\" title=\"3 ngày săn ảnh vượt đỉnh tòa tháp chọc trời Sài Gòn hình ảnh 1\" src=\"https://znews-photo-td.zadn.vn/Uploaded/lerl/2018_08_06/aa.jpg\" width=\"2048\" height=\"1150\"></h1>\n<p class=\"dropcap\">T</p>\n<p>rong nhiếp ảnh, các tay máy chụp ảnh phong cảnh có lẽ là những người phải đầu tư thời gian nhiều nhất, đồng thời phải có được sự may mắn như xuất hiện đúng thời điểm, cũng như lời nói vui phải có được “thiên thời địa lợi nhân hòa”.</p>\n<p>Để có được tấm hình biển mây quấn quanh tòa nhà <a href=\"https://news.zing.vn/landmark-81-tieu-diem.html\" title=\"Tin tức Landmark 81\" class=\"topic location autolink\">Landmark 81</a> ở TP.HCM như hai tác giả Nguyễn Hữu Duy và Phan Quang Vinh gửi dự cuộc thi ảnh “Sài Gòn 2018” phải cần đến rất nhiều yếu tố may mắn, tất nhiên không loại trừ sự kiên nhẫn săn mây của các nhiếp ảnh gia. Họ đã mất cả tuần để canh mới chụp được những tác phẩm độc đáo đó.</p>\n<figure class=\"video cms-video\" allowads=\"true\" source-url=\"/video-vuot-qua-toa-thap-choc-troi-o-sai-gon-post866765.html\" data-video-src=\"https://znews-mcloud-bf-s2.zadn.vn/6ssAO65SQCo/2d1ca8c7708299dcc093/3652138811cdf893a1dc/720/landmark.mp4?authen=exp=1533881936~acl=/6ssAO65SQCo/*~hmac=6f6f07dc9a19f79b447ebb7c2c374e6c\"><video playsinline muted src=\"https://znews-mcloud-bf-s2.zadn.vn/RtJphNPSuEQ/0d928949510cb852e11d/153d31e733a2dafc83b3/480/landmark.mp4?authen=exp=1533881936~acl=/RtJphNPSuEQ/*~hmac=456da8389f484f5452d7b031969de610\" controls=\'controls\' allowads=\'true\' onlyvietnam=\'false\' poster=\'https://znews-photo-td.zadn.vn/w660/Uploaded/lce_ermnx/2018_08_06/Outro_zingvn_200_00_03_24Still001.jpg\' preload=\'none\' aspect=\'16:9\' mediaid=\'6bb4475fa11a4844110b\'>\n<source src=\"https://znews-mcloud-mpl-s2.zadn.vn/10uIAUYI6pU/whls/vod/0/OcPd7Hp6neQ6XRqMiW/landmark.m3u8?authen=exp=1533838736~acl=/10uIAUYI6pU/*~hmac=0b145cb115d6782dba03a654a8e02f5b\" type=\"application/x-mpegURL\" label=\"Auto\" />\n<source src=\"https://znews-mcloud-bf-s2.zadn.vn/RtJphNPSuEQ/0d928949510cb852e11d/153d31e733a2dafc83b3/480/landmark.mp4?authen=exp=1533881936~acl=/RtJphNPSuEQ/*~hmac=456da8389f484f5452d7b031969de610\" type=\"video/mp4\" label=\"SD\" res=\"480\" />\n<source src=\"https://znews-mcloud-bf-s2.zadn.vn/6ssAO65SQCo/2d1ca8c7708299dcc093/3652138811cdf893a1dc/720/landmark.mp4?authen=exp=1533881936~acl=/6ssAO65SQCo/*~hmac=6f6f07dc9a19f79b447ebb7c2c374e6c\" type=\"video/mp4\" label=\"HD\" res=\"720\" />\n</video><figcaption><strong><a href=\"/video-vuot-qua-toa-thap-choc-troi-o-sai-gon-post866765.html\" cate-id=\"572\" cate-name=\"kinh-doanh-tai-chinh\" topic-id=\"system-2121,location-2207,location-4469\" target=\"_blank\" class=\"autolink\">Vượt qua tòa tháp chọc trời ở Sài Gòn</a></strong> Tòa nhà cao 461 m mới xuất hiện ở TP.HCM bỗng trở nên bé nhỏ khi nằm phía dưới thiết bị bay flycam.</figcaption></figure>\n<h3>Săn ảnh mặt trời mọc từ 5h30</h3>\n<p>Trong một chuyến công tác từ Hà Nội vào TP.HCM những ngày đầu tháng 8, thời điểm tòa nhà Landmark đã đưa trung tâm thương mại vào khai thác kinh doanh, còn các hạng mục khác vẫn đang trong quá trình thi công và hoàn thiện, tôi quyết định thử sức để chụp được một tấm ảnh như vậy. </p>\n<p>Tòa nhà Keangnam ở Hà Nội nhiều lần từng bị mây bao phủ nhưng đó đều là những lúc mưa mù, thời tiết xấu. Có lẽ chưa có nhiếp ảnh gia nào săn được bức hình đẹp về tòa 72 tầng ở thủ đô, công trình vừa bị tụt xuống vị trí cao thứ hai Việt Nam.</p>\n<p> Do không thông thạo địa bàn, tôi nhờ một người bạn tên Quân, là nhiếp ảnh tự do, dẫn đi chụp ảnh. Đặt báo thức từ 5h sáng, hai anh em chúng tôi hẹn nhau 5h45 phải có mặt ở địa điểm đẹp nhất cất cánh flycam lên cao chụp ảnh. Đó là lúc mặt trời mọc. </p>\n<p>Quân từng chụp hai lần ở đây nhưng cũng chưa có được tấm hình nào xuất sắc. Hôm nay anh mang theo một chiếc flycam chụp ảnh cùng tôi. Quân bảo nếu chụp bình minh thì chọn hướng từ Thảo Cầm Viên bay lên, còn hoàng hôn thì nên qua quận 2 chụp sang. Đó là các hướng sử dụng flycam tốt nhất để có được các vệt sáng, ray nắng trên bầu trời.</p>\n<table class=\"picture\" align=\"center\">\n<tbody>\n<tr>\n<td class=\"pic\"><img alt=\"3 ngay san anh vuot dinh toa thap choc troi Sai Gon hinh anh 2\" title=\"3 ngày săn ảnh vượt đỉnh tòa tháp chọc trời Sài Gòn hình ảnh 2\" src=\"https://znews-photo-td.zadn.vn/Uploaded/lerl/2018_08_06/DJI_003201.jpeg\" width=\"2048\" height=\"1152\"></td>\n</tr>\n</tbody>\n</table>\n<table class=\"picture gallery\" align=\"center\">\n<tbody>\n<tr>\n<td class=\"pic\"><img alt=\"3 ngay san anh vuot dinh toa thap choc troi Sai Gon hinh anh 3\" title=\"3 ngày săn ảnh vượt đỉnh tòa tháp chọc trời Sài Gòn hình ảnh 3\" src=\"https://znews-photo-td.zadn.vn/Uploaded/lerl/2018_08_06/DJI_009401_2.jpeg\" width=\"1920\" height=\"1078\"><img alt=\"3 ngay san anh vuot dinh toa thap choc troi Sai Gon hinh anh 4\" title=\"3 ngày săn ảnh vượt đỉnh tòa tháp chọc trời Sài Gòn hình ảnh 4\" src=\"https://znews-photo-td.zadn.vn/Uploaded/lerl/2018_08_06/DJI_010901_1.jpeg\" width=\"1920\" height=\"1080\"></td>\n</tr>\n</tbody>\n</table>\n<p>Bức ảnh mặt trời mọc phía đông TP.HCM, bên khu đô thị Vinhomes Centre Park Tân Cảng TP.HCM được tôi ghi lại ở thời điểm trong khoảng từ 5h45 đến 6h ngày 4/8/2018. Sau khi gửi xe vào bên trong Thảo Cầm Viên, tôi chọn một vị trí rộng để đề phòng trường hợp bị mất kết nối, flycam sẽ về an toàn, không bị va vào ngọn cây.</p>\n<p>Cú cất cánh đầu tiên tuy ổn định về sóng GPS nhưng tín hiệu bầu trời không được khả quan. Mặt trời hé lộ dần phía đằng xa với những tia nắng màu vàng chiếu về phía thiết bị bay nhưng không có những tảng mây nào bồng bềnh phía dưới. Chụp được một số tấm, tôi quay thiết bị xoay một vòng 360 độ để thử ngắm xem xung quanh liệu còn cảnh nào đẹp rồi vội vã kéo flycam về thay đổi địa điểm.</p>\n<table class=\"picture gallery\" align=\"center\">\n<tbody>\n<tr>\n<td class=\"pic\"><img alt=\"3 ngay san anh vuot dinh toa thap choc troi Sai Gon hinh anh 5\" title=\"3 ngày săn ảnh vượt đỉnh tòa tháp chọc trời Sài Gòn hình ảnh 5\" src=\"https://znews-photo-td.zadn.vn/Uploaded/lerl/2018_08_06/DJI_004101.jpeg\" width=\"2048\" height=\"1152\"><img alt=\"3 ngay san anh vuot dinh toa thap choc troi Sai Gon hinh anh 6\" title=\"3 ngày săn ảnh vượt đỉnh tòa tháp chọc trời Sài Gòn hình ảnh 6\" src=\"https://znews-photo-td.zadn.vn/Uploaded/lerl/2018_08_06/DJI_004701.jpeg\" width=\"2048\" height=\"1152\"><img alt=\"3 ngay san anh vuot dinh toa thap choc troi Sai Gon hinh anh 7\" title=\"3 ngày săn ảnh vượt đỉnh tòa tháp chọc trời Sài Gòn hình ảnh 7\" src=\"https://znews-photo-td.zadn.vn/Uploaded/lerl/2018_08_06/DJI_014201.jpeg\" width=\"2048\" height=\"1152\"><img alt=\"3 ngay san anh vuot dinh toa thap choc troi Sai Gon hinh anh 8\" title=\"3 ngày săn ảnh vượt đỉnh tòa tháp chọc trời Sài Gòn hình ảnh 8\" src=\"https://znews-photo-td.zadn.vn/Uploaded/lerl/2018_08_06/DJI_015001.jpeg\" width=\"2048\" height=\"1152\"></td>\n</tr>\n</tbody>\n</table>\n<h3>Áp sát \'mục tiêu\'</h3>\n<p>Để dành hai viên pin cho đợt bay tiếp theo trong ngày, tôi quyết định áp sát “mục tiêu”, đó là bay vọt qua nóc. Tòa nhà chọc trời này cao 461 m, còn chiếc flycam Mavic nâng lên được độ cao tối đa 500 m, tôi hoàn toàn tự tin điều khiển bay vượt qua đỉnh. </p>\n<p>Tuy nhiên, do khu vực này gần sông Sài Gòn, gió mạnh, trong quá trình thực hiện, chiếc flycam thường xuyên bị cảnh báo nguy hiểm, đồng thời liên tục bị chập chờn mất kết nối. Việc đứng dưới đất ở khoảng cách 500 m để lái không hề dễ dàng đối với bất cứ ai khi xung quanh có rất nhiều nhà cao tầng. </p>\n<p>Nếu quá liều lĩnh áp sát tòa nhà, rất có thể flycam bị gió đẩy và rơi xuống, bởi lúc này tôi chỉ có thể quan sát được qua màn hình, còn chiếc flycam đã bị khuất tầm nhìn. Mặc dù đã tiến rất gần \"mục tiêu\" nhưng khoảng cách giữa chiếc điều khiển và thiết bị bay lúc này đã là 600 m. Tôi liều lĩnh quay một vòng quanh tháp để ghi hình video, chúc camera xuống, phía dưới đất lúc này là cầu Sài Gòn 2 và nhiều công trình chung cư xen lẫn các khối nhà cũ kỹ.</p>\n<table class=\"picture\" align=\"center\">\n<tbody>\n<tr>\n<td class=\"pic\"><img alt=\"3 ngay san anh vuot dinh toa thap choc troi Sai Gon hinh anh 9\" title=\"3 ngày săn ảnh vượt đỉnh tòa tháp chọc trời Sài Gòn hình ảnh 9\" src=\"https://znews-photo-td.zadn.vn/Uploaded/lerl/2018_08_06/DJI_013201.jpeg\" width=\"2048\" height=\"1152\"></td>\n</tr>\n</tbody>\n</table>\n<table class=\"picture\" align=\"center\">\n<tbody>\n<tr>\n<td class=\"pic\"><img alt=\"3 ngay san anh vuot dinh toa thap choc troi Sai Gon hinh anh 10\" title=\"3 ngày săn ảnh vượt đỉnh tòa tháp chọc trời Sài Gòn hình ảnh 10\" src=\"https://znews-photo-td.zadn.vn/Uploaded/lerl/2018_08_06/DJI_019302.jpeg\" width=\"2048\" height=\"1150\"></td>\n</tr>\n</tbody>\n</table>\n<table class=\"picture gallery\" align=\"center\">\n<tbody>\n<tr>\n<td class=\"pic\"><img alt=\"3 ngay san anh vuot dinh toa thap choc troi Sai Gon hinh anh 11\" title=\"3 ngày săn ảnh vượt đỉnh tòa tháp chọc trời Sài Gòn hình ảnh 11\" src=\"https://znews-photo-td.zadn.vn/Uploaded/lerl/2018_08_06/DJI_0358.jpg\" width=\"1613\" height=\"907\"><img alt=\"3 ngay san anh vuot dinh toa thap choc troi Sai Gon hinh anh 12\" title=\"3 ngày săn ảnh vượt đỉnh tòa tháp chọc trời Sài Gòn hình ảnh 12\" src=\"https://znews-photo-td.zadn.vn/Uploaded/lerl/2018_08_06/DJI_021301_1.jpg\" width=\"2048\" height=\"1152\"></td>\n</tr>\n</tbody>\n</table>\n<p>Ngày hôm sau (5/8) tôi cũng phải đi lại ít nhất 2 lần vì thời tiết không ủng hộ. Trong những ngày 4, 5/8, Sài Gòn liên tục có mưa, việc đi săn mây bao quanh tòa tháp gần như bị \"trắng tay\". Tôi săn được duy nhất tấm hình có bầu trời xanh ngắt và mây trắng nhẹ trôi phía trên nhưng chưa kịp chụp thêm ảnh thì pin flycam báo sắp cạn.</p>\n<p>Và những tảng mây trôi thưa thớt cao hơn tòa tháp lúc này đã để lại những khoảng sáng và tối rõ ràng khi hướng chiếc camera chúc xuống đất. Ở độ cao 500 m của chiếc flycam, tôi chỉ có thể quan sát được bóng người công nhân đang thi công trên đỉnh tháp bé li ti qua màn hình chiếc điện thoại kết nối với tay điều khiển từ xa.</p>\n<p>Do flycam liên tục bị cảnh báo gió mạnh, \"no GPS hay weak transmission\"... tôi chỉ dám chụp vài tấm rồi tìm cách đưa thiết bị bay về. Và việc này không hề dễ dàng gì khi phải điều khiển bay ở nơi có nhiều nhà cao tầng, rất dễ mất phương hướng. Nhờ flycam có chức năng tự động cho bay về nơi xuất phát (Auto Home) nên tôi chỉ cần sử dụng chế độ này và dùng thêm nút hạ độ cao, như vậy tốc độ di chuyển cũng nhanh hơn so với lái hướng.</p>\n<table class=\"picture gallery\" align=\"center\">\n<tbody>\n<tr>\n<td class=\"pic\"><img alt=\"3 ngay san anh vuot dinh toa thap choc troi Sai Gon hinh anh 13\" title=\"3 ngày săn ảnh vượt đỉnh tòa tháp chọc trời Sài Gòn hình ảnh 13\" src=\"https://znews-photo-td.zadn.vn/Uploaded/lerl/2018_08_06/DJI_029202.jpeg\" width=\"4000\" height=\"2250\"><img alt=\"3 ngay san anh vuot dinh toa thap choc troi Sai Gon hinh anh 14\" title=\"3 ngày săn ảnh vượt đỉnh tòa tháp chọc trời Sài Gòn hình ảnh 14\" src=\"https://znews-photo-td.zadn.vn/Uploaded/lerl/2018_08_06/DJI_033401a.jpg\" width=\"2048\" height=\"1152\"></td>\n</tr>\n</tbody>\n</table>\n<p>Chiều cùng ngày, tôi tiếp tục săn cảnh hoàng hôn từ phía quận 2 nhưng không được, TP.HCM bị mây đen kịt bao phủ. Vừa đặt chân tới khu vực gần đường Trần Não thì mưa tầm tã trút xuống rát mặt. Trước đó tôi còn chưa kịp rút máy ảnh hay thiết bị bay ra khỏi ba lô.</p>\n<p>Phải đến ngày thứ ba, cũng dậy sớm từ 5h vào Thảo Cầm Viên bay lên chụp ảnh, tôi mới thấy có dấu hiệu mây vờn quanh tháp nhưng không dày như nhiều nhiếp ảnh gia đã chụp. </p>\n<p>Để flycam đứng một chỗ trên không nhiều phút, chờ xem có luồng mây nào bay tới không nhưng vẫn bất thành, mây chỉ đi ngang phía sau tòa tháp. Đúng tính chất của người đi săn mây, tôi mạo hiểm điều khiển thiết bị bay ra xa mình hơn 800 m, tiến về phía Vinhomes Tân Cảng với hy vọng có được bức ảnh đẹp hơn.</p>\n<p>Đến 7h30, còn một viên pin duy nhất đầy 100%, tôi quyết định di chuyển sang phía quận 2 để chụp thuận sáng khi thấy bầu trời có màu xanh. Tuy nhiên, sáng 6/8, Sài Gòn khá mù sương, tôi lại thêm một lần thất bại với tấm hình đẹp.</p>\n<h3>Cất cánh flycam từ tầng 80 Landmark 81</h3>\n<p>Nhờ sự giúp đỡ của đơn vị chủ đầu tư, 11h trưa 6/8, tôi có cơ hội được lên tầng 80 tòa nhà này và cất cánh flycam từ đây (tầng 80 chưa phải là cao nhất). Đây là nơi giúp tôi có thể bay ở độ cao gần 1.000 m so với mặt đất (500 m so với điều khiển). Khi chiếc flycam vừa vút lên đến đỉnh, hình ảnh hai công nhân đang cheo leo ở vị trí cao nhất đã lọt vào màn hình, thật đặc biệt. Tôi ngỡ ngàng và bấm liên tục 5-6 tấm ảnh. Vài giây sau đó, chiếc flycam bỗng bị chao đảo trong gió mạnh. Có thời khắc nó suýt bị va vào cột trụ tòa nhà vì tôi bỗng cuống, tay run lập bập và mất phương hướng.</p>\n<p>Thiết bị bay liên tục bị chập chờn tín hiệu, báo lỗi kết nối. Dù miệng lẩm bẩm \"đau tim quá\" nhưng tôi vẫn liều cho flycam tiếp cận gần nóc nhà và vút lên cao hơn.</p>\n<p>Khi camera bay cao thêm hơn 200 m so với vị trí các công nhân đang thi công thì tòa tháp cao nhất Việt Nam bỗng bé xíu, không thể nhìn thấy, tôi lại cho bay ra xa và hạ xuống thấp hơn để lấy góc chéo.</p>\n<table class=\"picture\" align=\"center\">\n<tbody>\n<tr>\n<td class=\"pic\"><img alt=\"3 ngay san anh vuot dinh toa thap choc troi Sai Gon hinh anh 15\" title=\"3 ngày săn ảnh vượt đỉnh tòa tháp chọc trời Sài Gòn hình ảnh 15\" src=\"https://znews-photo-td.zadn.vn/Uploaded/lerl/2018_08_06/DJI_020501.jpeg\" width=\"2048\" height=\"1152\"></td>\n</tr>\n</tbody>\n</table>\n<table class=\"picture\" align=\"center\">\n<tbody>\n<tr>\n<td class=\"pic\"><img alt=\"3 ngay san anh vuot dinh toa thap choc troi Sai Gon hinh anh 16\" title=\"3 ngày săn ảnh vượt đỉnh tòa tháp chọc trời Sài Gòn hình ảnh 16\" src=\"https://znews-photo-td.zadn.vn/Uploaded/lerl/2018_08_06/DJI_036801.jpg\" width=\"2048\" height=\"1152\"></td>\n</tr>\n</tbody>\n</table>\n<table class=\"picture\" align=\"center\">\n<tbody>\n<tr>\n<td class=\"pic\"><img alt=\"3 ngay san anh vuot dinh toa thap choc troi Sai Gon hinh anh 17\" title=\"3 ngày săn ảnh vượt đỉnh tòa tháp chọc trời Sài Gòn hình ảnh 17\" src=\"https://znews-photo-td.zadn.vn/Uploaded/lerl/2018_08_06/DJI_037101.jpg\" width=\"2048\" height=\"1347\"></td>\n</tr>\n</tbody>\n</table>\n<table class=\"picture gallery\" align=\"center\">\n<tbody>\n<tr>\n<td class=\"pic\"><img alt=\"3 ngay san anh vuot dinh toa thap choc troi Sai Gon hinh anh 18\" title=\"3 ngày săn ảnh vượt đỉnh tòa tháp chọc trời Sài Gòn hình ảnh 18\" src=\"https://znews-photo-td.zadn.vn/Uploaded/lerl/2018_08_06/landmark_tower_8_1_1.jpg\" width=\"2048\" height=\"1368\"><img alt=\"3 ngay san anh vuot dinh toa thap choc troi Sai Gon hinh anh 19\" title=\"3 ngày săn ảnh vượt đỉnh tòa tháp chọc trời Sài Gòn hình ảnh 19\" src=\"https://znews-photo-td.zadn.vn/Uploaded/lerl/2018_08_06/ZNS_749801_1.jpeg\" width=\"1920\" height=\"1361\"></td>\n</tr>\n</tbody>\n</table>\n<p>Được một số tấm hình ưng ý, tôi quyết định hạ cánh để đảm bảo an toàn. Quân, người bạn đi cùng lúc này cũng có được một số bức ảnh tốt cũng vội vã kéo thiết bị bay về và nói vui: “Chắc lần sau có cơ hội lên đây bay lần nữa cũng không dám, quá đau tim”.</p>\n<h1><img alt=\"3 ngay san anh vuot dinh toa thap choc troi Sai Gon hinh anh 20\" title=\"3 ngày săn ảnh vượt đỉnh tòa tháp chọc trời Sài Gòn hình ảnh 20\" src=\"https://znews-photo-td.zadn.vn/Uploaded/lerl/2018_08_06/zing.jpg\" width=\"2048\" height=\"1214\"></h1>\n</div>', '2018-08-08 13:48:17', NULL, 0, '0000-00-00 00:00:00', NULL, NULL, NULL, b'0');
INSERT INTO `adposts` VALUES (15, '', 'Android Pie chính thức ra mắt: Giao diện mới, hỗ trợ notch\n\n11', 'Google đã chính thức phát hành bản Android Pie với nhiều tính năng mới hữu ích.', 8, 'https://znews-photo-td.zadn.vn/w210/Uploaded/fsmyy/2018_08_07/essentialphoneandroid9pie980x620.jpg', 'android-pie-chinh-thuc-ra-mat-giao-dien-moi-ho-tro-notch11', '<div class=\"the-article-body cms-body\">\n<table class=\"picture\" align=\"center\">\n<tbody>\n<tr>\n<td class=\"pic\"><img alt=\"Android Pie chinh thuc ra mat: Giao dien moi, ho tro notch hinh anh 1\" title=\"Android Pie chính thức ra mắt: Giao diện mới, hỗ trợ notch hình ảnh 1\" src=\"https://znews-photo-td.zadn.vn/w1024/Uploaded/fsmyy/2018_08_07/androidpnewlook.jpg\" width=\"620\" height=\"504\" /></td>\n</tr>\n<tr>\n<td class=\"pCaption caption\"><strong>Giao diện và thanh thông báo mới</strong> - Trên Android Pie, Google đã thiết kế lại giao diện bo cong ở tất cả biểu tượng và phím tắt. Các biểu tượng trong phần cài đặt được làm đa dạng màu sắc hơn. Ngoài ra, thanh thông báo cũng được làm lại cho khả năng hiển thị gọn gàng, trực quan hơn.</td>\n</tr>\n</tbody>\n</table>\n<table class=\"picture\" align=\"center\">\n<tbody>\n<tr>\n<td class=\"pic\"><img alt=\"Android Pie chinh thuc ra mat: Giao dien moi, ho tro notch hinh anh 2\" title=\"Android Pie chính thức ra mắt: Giao diện mới, hỗ trợ notch hình ảnh 2\" src=\"https://znews-photo-td.zadn.vn/w1024/Uploaded/fsmyy/2018_08_07/darkthemeandroidp.jpg\" width=\"620\" height=\"528\" /></td>\n</tr>\n<tr>\n<td class=\"pCaption caption\"><strong>Chế độ ban đêm</strong> - Chế độ sử dụng ban đêm đã được Google mang lên phiên bản Android Pie chính thức. Thêm vào đó, ngoài việc tùy chỉnh bằng tay, tính năng này còn cho phép thiết bị tự động chuyển qua lại giữa hai chế độ sáng và tối.</td>\n</tr>\n</tbody>\n</table>\n<table class=\"picture\" align=\"center\">\n<tbody>\n<tr>\n<td class=\"pic\"><img alt=\"Android Pie chinh thuc ra mat: Giao dien moi, ho tro notch hinh anh 3\" title=\"Android Pie chính thức ra mắt: Giao diện mới, hỗ trợ notch hình ảnh 3\" src=\"https://znews-photo-td.zadn.vn/w1024/Uploaded/fsmyy/2018_08_07/android_p_dp1_notch_simulate.jpg\" width=\"1408\" height=\"800\" /></td>\n</tr>\n<tr>\n<td class=\"pCaption caption\"><strong>Hỗ trợ phần notch</strong> - Nhiều nhà sản xuất smartphone Android đang áp dụng thiết kế notch trên những chiếc điện thoại của họ tượng tự như cách Apple làm trên iPhone X. Vì thế, Google cũng đã tích hợp một tính năng hỗ trợ phần màn hình khuyết thiếu, giúp tối ưu không gian hiển thị.<br />\n</td>\n</tr>\n</tbody>\n</table>\n<table class=\"picture\" align=\"center\">\n<tbody>\n<tr>\n<td class=\"pic\"><img alt=\"Android Pie chinh thuc ra mat: Giao dien moi, ho tro notch hinh anh 4\" title=\"Android Pie chính thức ra mắt: Giao diện mới, hỗ trợ notch hình ảnh 4\" src=\"https://znews-photo-td.zadn.vn/w1024/Uploaded/fsmyy/2018_08_07/androidpscreenshottools.jpg\" width=\"620\" height=\"616\" /></td>\n</tr>\n<tr>\n<td class=\"pCaption caption\"><strong>Công cụ chụp màn hình hữu ích hơn</strong> - Trên bản Android mới, người dùng chỉ cần nhấn giữ phím nguồn và chọn chức năng chụp ảnh màn hình, đơn giản hơn khá nhiều so với trước khi phải giữ đồng thời phím nguồn và giảm âm lượng. Ngoài ra, sau khi chụp, người dùng có thể chỉnh sửa nhanh ngay trên thanh thông báo trạng thái.\n</td>\n</tr>\n</tbody>\n</table>\n<table class=\"picture\" align=\"center\">\n<tbody>\n<tr>\n<td class=\"pic\"><img alt=\"Android Pie chinh thuc ra mat: Giao dien moi, ho tro notch hinh anh 5\" title=\"Android Pie chính thức ra mắt: Giao diện mới, hỗ trợ notch hình ảnh 5\" src=\"https://znews-photo-td.zadn.vn/w1024/Uploaded/fsmyy/2018_08_07/androidplockdownmode.jpg\" width=\"620\" height=\"433\" /></td>\n</tr>\n<tr>\n<td class=\"pCaption caption\"><strong>Thêm chế độ khóa bảo mật</strong> - Google đang nỗ lực nâng cấp bảo mật cho điện thoại với hàng loạt tính năng mới. Khi bật tính năng này, các chế độ bảo mật bằng cảm biến vân tay hoặc giọng nói sẽ bị vô hiệu hóa, người dùng bắt buộc phải sử dụng cách mở khóa thông thường bằng mã PIN hoặc hình mở khóa.<br />\n</td>\n</tr>\n</tbody>\n</table>\n<table class=\"picture\" align=\"center\">\n<tbody>\n<tr>\n<td class=\"pic\"><img alt=\"Android Pie chinh thuc ra mat: Giao dien moi, ho tro notch hinh anh 6\" title=\"Android Pie chính thức ra mắt: Giao diện mới, hỗ trợ notch hình ảnh 6\" src=\"https://znews-photo-td.zadn.vn/w1024/Uploaded/fsmyy/2018_08_07/googleio2018androidp7493.jpg\" width=\"620\" height=\"413\" /></td>\n</tr>\n<tr>\n<td class=\"pCaption caption\"><strong>Cử chỉ điều hướng mới</strong> - Trên Android Pie, Google đã bỏ đi 3 phím điều hướng truyền thống của Android trước đây, thay vào đó là một phím home và một phím quay lại. Phím home mới cho phép người dùng di chuyển qua lại giữa các ứng dụng bằng thao tác vuốt hoặc trở về màn hình chính với chỉ một lần chạm.<br />\n</td>\n</tr>\n</tbody>\n</table>\n<table class=\"picture\" align=\"center\">\n<tbody>\n<tr>\n<td class=\"pic\"><img alt=\"Android Pie chinh thuc ra mat: Giao dien moi, ho tro notch hinh anh 7\" title=\"Android Pie chính thức ra mắt: Giao diện mới, hỗ trợ notch hình ảnh 7\" src=\"https://znews-photo-td.zadn.vn/w1024/Uploaded/fsmyy/2018_08_07/androidprotation.jpg\" width=\"620\" height=\"310\" /></td>\n</tr>\n<tr>\n<td class=\"pCaption caption\"><strong>Khóa xoay</strong>&nbsp;- Android Pie bổ sung thêm một phím khóa xoay giúp người dùng có thể chủ động xoay thiết bị để sử dụng theo mục đích mong muốn.<br />\n</td>\n</tr>\n</tbody>\n</table>\n<table class=\"picture\" align=\"center\">\n<tbody>\n<tr>\n<td class=\"pic\"><img alt=\"Android Pie chinh thuc ra mat: Giao dien moi, ho tro notch hinh anh 8\" title=\"Android Pie chính thức ra mắt: Giao diện mới, hỗ trợ notch hình ảnh 8\" src=\"https://znews-photo-td.zadn.vn/w1024/Uploaded/fsmyy/2018_08_07/androidpbetaadaptivebattery_0.jpg\" width=\"1600\" height=\"1094\" /></td>\n</tr>\n<tr>\n<td class=\"pCaption caption\"><strong>Chế độ pin thích nghi</strong> -&nbsp;Google đã hợp tác cùng DeepMind để đưa ra tính năng Adaptive Battery. Theo đó, hệ thống sẽ sử dụng khả năng tự học để ưu tiên tài nguyên cho các ứng dụng mà người dùng hay sử dụng nhất, giúp tiết kiệm cũng như tối ưu thời gian sử dụng pin một cách hiệu quả.\n</td>\n</tr>\n</tbody>\n</table>\n<figure class=\"video cms-video\" allowads=\"true\" source-url=\"/video-trai-nghiem-android-p-beta-tai-viet-nam-post841457.html\" data-video-src=\"https://znews-mcloud-bf-s2.zadn.vn/_Ea7M-5cSwE/dbbe0b8b4acea390fadf/24a543e777a29efcc7b3/720/Android_P_beta_tai_VN.mp4?authen=exp=1533879019~acl=/_Ea7M-5cSwE/*~hmac=3b942eae1f125de153249d0636c3445a\"><video playsinline muted src=\"https://znews-mcloud-bf-s2.zadn.vn/56tyyyA0QEM/4621a414e5510c0f5540/a782f2c0c6852fdb7694/480/Android_P_beta_tai_VN.mp4?authen=exp=1533879019~acl=/56tyyyA0QEM/*~hmac=c55a634da8e4dff3032a28d93c2b8e2b\" controls=\'controls\' allowads=\'true\' onlyvietnam=\'false\' poster=\'https://znews-photo-td.zadn.vn/w660/Uploaded/ynssi/2018_05_10/Android_P.jpg\' preload=\'none\' aspect=\'16:9\' mediaid=\'9fd6a44bed0e04505d1f\'>\n<source src=\"https://znews-mcloud-mpl-s2.zadn.vn/Xdc7WQwkACU/whls/vod/0/WeQ7HJ97HmS710_hxG/Android_P_beta_tai_VN.m3u8?authen=exp=1533835819~acl=/Xdc7WQwkACU/*~hmac=03b6dfb183663bf0d7f7eca158989cc3\" type=\"application/x-mpegURL\" label=\"Auto\" />\n<source src=\"https://znews-mcloud-bf-s2.zadn.vn/56tyyyA0QEM/4621a414e5510c0f5540/a782f2c0c6852fdb7694/480/Android_P_beta_tai_VN.mp4?authen=exp=1533879019~acl=/56tyyyA0QEM/*~hmac=c55a634da8e4dff3032a28d93c2b8e2b\" type=\"video/mp4\" label=\"SD\" res=\"480\" />\n<source src=\"https://znews-mcloud-bf-s2.zadn.vn/_Ea7M-5cSwE/dbbe0b8b4acea390fadf/24a543e777a29efcc7b3/720/Android_P_beta_tai_VN.mp4?authen=exp=1533879019~acl=/_Ea7M-5cSwE/*~hmac=3b942eae1f125de153249d0636c3445a\" type=\"video/mp4\" label=\"HD\" res=\"720\" />\n</video><figcaption><strong><a href=\"/video-trai-nghiem-android-p-beta-tai-viet-nam-post841457.html\" cate-id=\"476\" cate-name=\"cong-nghe\" target=\"_blank\" class=\"autolink\">Trải nghiệm Android P beta tại Việt Nam</a></strong> Phiên bản beta của Android P mang đến nhiều trải nghiệm mới, nổi bật là thanh điều hướng được thay đổi cùng phần cài đặt trẻ trung.</figcaption></figure>\n<table align=\"center\" class=\"article\">\n<tbody>\n<tr>\n<td><div class=\"inner-article\"><a href=\"/vi-sao-iphone-va-dien-thoai-android-se-tiep-tuc-tang-gia-post866577.html\"><p class=\"cover formatted\" style=\"background-image:url(https://znews-photo-td.zadn.vn/w210/Uploaded/fsmyy/2018_08_06/huaweip20pro5980x620.jpg);\"></p><h2 class=\"title\">Vì sao iPhone và điện thoại Android sẽ tiếp tục tăng giá?</h2><p class=\"summary\">Các nhà sản xuất có vẻ hứng thú với việc tạo ra phân khúc smartphone siêu cao cấp để mang về mức lợi nhuận cao hơn.</p></a></div></td>\n</tr>\n</tbody>\n</table>\n<br />\n<br />\n</div>', '2018-08-08 13:48:17', NULL, 0, '0000-00-00 00:00:00', NULL, NULL, NULL, b'0');
INSERT INTO `adposts` VALUES (16, '', 'Facebook muốn cả dữ liệu giao dịch ngân hàng của bạn', 'Ngày 6/8, Facebook đã đề nghị các ngân hàng lớn ở Mỹ chia sẻ dữ liệu khách hàng, để mạng xã hội này có thể phát triển các dịch vụ mới trên nền tảng nhắn tin Messenger.', 8, 'https://znews-photo-td.zadn.vn/w210/Uploaded/fcivbqmv/2018_08_07/061638_4EE16C5A000005780imagea8_1533577080234.jpg', 'facebook-muon-ca-du-lieu-giao-dich-ngan-hang-cua-ban', '<div class=\"the-article-body cms-body\">\n<p>Theo tờ <em>Wall Street Journal</em>, mạng xã hội <a href=\"https://news.zing.vn/facebook-tieu-diem.html\" title=\"Tin tức Facebook\" class=\"topic company autolink\">Facebook</a> đang yêu cầu các ngân hàng lớn ở Mỹ chia sẻ các giao dịch thẻ của khách hàng, thói quen mua sắm và kiểm tra số dư tài khoản để cung cấp các dịch vụ tài chính mới trên nền tảng Messenger.</p>\n<p>Facebook đã gửi đề nghị này đến các ngân hàng như Chase, JPMorgan, Citibank và Wells Fargo. Đề nghị này nói rằng Facebook chỉ đơn giản hợp tác với các ngân hàng và các công ty thẻ tín dụng để cung cấp dịch vụ khách hàng thông qua một chatbot trong Messenger hoặc giúp người dùng quản lý tài khoản của họ trong ứng dụng.&nbsp;</p>\n<table class=\"picture\" align=\"center\">\n<tbody>\n<tr>\n<td class=\"pic\"><img alt=\"Facebook muon ca du lieu giao dich ngan hang cua ban hinh anh 1\" title=\"Facebook muốn cả dữ liệu giao dịch ngân hàng của bạn hình ảnh 1\" src=\"https://znews-photo-td.zadn.vn/w660/Uploaded/fcivbqmv/2018_08_07/061638_4EE16C5A000005780imagea8_1533577080234.jpg\" width=\"960\" height=\"637\" /></td>\n</tr>\n<tr>\n<td class=\"pCaption caption\">Facebook đang nỗ lực giữ chân người dùng trên nền tảng nhắn tin của mình. Ảnh: <em>Getty.</em></td>\n</tr>\n</tbody>\n</table>\n<p>Điều này tương tự với các tính năng đã tồn tại trên Messenger tích hợp với American Express, Mastercard và PayPal. Giờ đây, Facebook đang tìm cách mở rộng quan hệ đối tác của mình với nhiều ngân hàng truyền thống hơn.</p>\n<p id=\"sGaPvS\">Facebook đang nỗ lực khiến người dùng sử dụng Messenger ở lâu trên ứng dụng này hơn.&nbsp;Sáng kiến mới này xuất hiện ngay sau khi Facebook trải qua gia đoạn khủng hoảng niềm tin trầm trọng, đến nỗi nhiều cổ đông yêu cầu Mark Zuckerberg phải từ chức.</p>\n<p id=\"sGaPvS\">Sau vụ bê bối Cambridge Analytica, độ tin cậy về bảo mật thông tin của Facebook đang sụt giảm mạnh. Các nguồn tin của <em>Wall Street Journal</em> lo ngại việc những dữ liệu ngân hàng nhạy cảm này này sẽ không được quản lý chặt chẽ bởi Facebook.</p>\n<p>Trong một thông báo, Facebook cũng xác nhận quá trình thảo luận với các ngân hàng lớn của Mỹ. Tuy nhiên, mạng xã hội này khẳng định họ không yêu cầu truy cập các dữ liệu giao dịch.</p>\n<p>\"Như nhiều công ty trực tuyến tham gia lĩnh vực kinh doanh thương mại, chúng tôi muốn hợp tác với các ngân hàng và những công ty cung cấp thẻ tín dụng để mang tới cho khách hàng của Facebook các dịch vụ như quản lý tài khoản\", Facebook nói trong một thong báo phát đi sau bài viết của <em>Wall Street Journal </em>đăng tải.</p>\n<figure class=\"video cms-video\" allowads=\"true\" source-url=\"/video-tu-ngay-thanh-lap-facebook-da-biet-du-lieu-nguoi-dung-la-tien-post864316.html\" data-video-src=\"https://znews-mcloud-bf-s2.zadn.vn/7Wfx7dFPsT4/fe2aafe449a1a0fff9b0/08df9523a3664a381377/720/Unpromising_Mark.mp4?authen=exp=1533882346~acl=/7Wfx7dFPsT4/*~hmac=031307eee06854b71c76ec0e38a09d60\"><video playsinline muted src=\"https://znews-mcloud-bf-s2.zadn.vn/kvIQukj9sXo/9dba3d73db3632686b27/5ff933020547ec19b556/480/Unpromising_Mark.mp4?authen=exp=1533882346~acl=/kvIQukj9sXo/*~hmac=8c4619a3421ea8944aeec1a8917bb8b8\" controls=\'controls\' allowads=\'true\' onlyvietnam=\'false\' poster=\'https://znews-photo-td.zadn.vn/w660/Uploaded/fcivbqmv/2018_07_29/Screenshot_9.jpg\' preload=\'none\' aspect=\'16:9\' mediaid=\'3dd17d09914c7812215d\'>\n<source src=\"https://znews-mcloud-mpl-s2.zadn.vn/3Suoskly_1k/whls/vod/0/M5nTGNEZe-FZu4ttCG/Unpromising_Mark.m3u8?authen=exp=1533839146~acl=/3Suoskly_1k/*~hmac=79a82f426c09b09ae0578901b96966aa\" type=\"application/x-mpegURL\" label=\"Auto\" />\n<source src=\"https://znews-mcloud-bf-s2.zadn.vn/kvIQukj9sXo/9dba3d73db3632686b27/5ff933020547ec19b556/480/Unpromising_Mark.mp4?authen=exp=1533882346~acl=/kvIQukj9sXo/*~hmac=8c4619a3421ea8944aeec1a8917bb8b8\" type=\"video/mp4\" label=\"SD\" res=\"480\" />\n<source src=\"https://znews-mcloud-bf-s2.zadn.vn/7Wfx7dFPsT4/fe2aafe449a1a0fff9b0/08df9523a3664a381377/720/Unpromising_Mark.mp4?authen=exp=1533882346~acl=/7Wfx7dFPsT4/*~hmac=031307eee06854b71c76ec0e38a09d60\" type=\"video/mp4\" label=\"HD\" res=\"720\" />\n</video><figcaption><strong><a href=\"/video-tu-ngay-thanh-lap-facebook-da-biet-du-lieu-nguoi-dung-la-tien-post864316.html\" cate-id=\"476\" cate-name=\"cong-nghe\" topic-id=\"company-3783,event-4217\" target=\"_blank\" class=\"autolink\">Từ ngày thành lập, Facebook đã biết dữ liệu người dùng là tiền</a></strong> Từ năm 2005, Mark Zuckerberg đã nhận thức được tầm quan trọng của dữ liệu cá nhân của người dùng. Dù nhiều hứa hẹn nhưng Facebook vẫn liên tục dính phải bê bối về quyền riêng tư.</figcaption></figure>\n<p>Theo nguồn tin của <em>Wall Street Journal</em>, Facebook đang hướng đến việc xây dựng các phương thức liên hệ mới giữa khách hàng và các ngân hàng trên nền tảng Messenger. Hiện nền tảng nhắn tin của Facebook đang có khoảng 1,3 tỷ người dùng.&nbsp;</p>\n<p>Tuy nhiên, ngân hàng Citigroup đã từ chối bình luận về thông tin trên. Trong khi đó, ngân hàng JPMorgan Chase khẳng định, sẽ không chia sẻ dữ liệu giao dịch của khách hàng cho các nền tảng khác.</p>\n<table align=\"center\" class=\"article\">\n<tbody>\n<tr>\n<td><div class=\"inner-article\"><a href=\"/facebook-vua-sap-tai-nhieu-quoc-gia-post865942.html\"><p class=\"cover formatted\" style=\"background-image:url(https://znews-photo-td.zadn.vn/w210/Uploaded/fcivbqmv/2018_08_03/DjsB0CEXgAIi9uq.jpg);\"></p><h2 class=\"title\">Facebook vừa sập tại nhiều quốc gia</h2><p class=\"summary\">Tối 3/8, người dùng Facebook trên toàn cầu phản ánh tình trạng không thể truy cập. Tình trạng này xảy ra trên cả nền tảng web và ứng dụng di động.</p></a></div></td>\n</tr>\n</tbody>\n</table>\n<ul class=\"topics\"><li class=\"company\"><h3><a href=\"https://news.zing.vn/Facebook-tieu-diem.html\" title=\"Facebook\">Facebook</a></h3><img src=\"https://znews-stc.zdn.vn/static/topic/company/facebook.png\" alt=\"Facebook\"><p class=\"intro\">Facebook là công ty đa quốc gia của Mỹ sở hữu mạng xã hội trực tuyến cùng tên, sáng lập bởi Mark Zuckerberg cùng với bạn bè khi còn theo học Đại học Harvard. Công ty Facebook chính thức lên sàn vào tháng 2/2012 và đến 13/7/2015 trở thành công ty nhanh nhất trong \"Chỉ số Standard & Poor\'s 500\" đạt mức vốn hóa thị trường 250 tỷ USD. Tính đến tháng 6/2017, Facebook công bố có hơn 2 tỉ người mỗi tháng dùng sản phẩm mạng xã hội của họ. Ngoài ra, công ty còn mua lại các sản phẩm phổ biến của giới trẻ khác như Instagram (mạng xã hội chia sẻ hình ảnh), Whatsapp (tin nhắn).</p><p class=\"funfact\"><strong>Bạn có biết:</strong> Facebook mở đầu là một phiên bản \"Hot or Not\" (một ứng dụng so sánh sắc đẹp) của Đại học Harvard với tên gọi Facemash.</p><ul><li><strong>Thời gian thành lập:</strong> 04/02/2004</li><li><strong>Người sáng lập:</strong> Mark Zuckerberg, Eduardo Saverin, Andrew McCollum, Dustin Moskovitz, Chris Hughes</li><li><strong>Trụ sở chính:</strong> Menlo Park, California, Mỹ</li><li><strong>Mã cổ phiếu:</strong> FB (NASDAQ)</li></ul></li></ul>\n</div>', '2018-08-08 13:48:17', NULL, 0, '0000-00-00 00:00:00', NULL, NULL, NULL, b'0');
INSERT INTO `adposts` VALUES (17, '', 'iPhone 6,1 inch tiếp tục lộ diện với camera lớn ở mặt lưng\n\n5', 'Camera chính trên iPhone 6,1 inch lớn hơn tương đối nhiều so với iPhone 7 và iPhone 8, hứa hẹn mang đến chất lượng hình ảnh tốt hơn.', 8, 'https://znews-photo-td.zadn.vn/w210/Uploaded/fsmyy/2018_08_06/gsmarena_001.jpg', 'iphone-61-inch-tiep-tuc-lo-dien-voi-camera-lon-o-mat-lung5', '<div class=\"the-article-body cms-body\">\n<p>Hình ảnh rò rỉ mới nhất về chiếc <a href=\"https://news.zing.vn/iphone-tieu-diem.html\" title=\"Tin tức iPhone\" class=\"topic company autolink\">iPhone</a> 6,1 inch \"giá rẻ\" sử dụng màn hình LCD cho thấy máy sẽ có camera đơn khá lớn ở mặt lưng. </p>\n<p>Cụm cảm biến này lớn hơn tương đối nhiều so với iPhone 7 và iPhone 8. Đồng thời, đèn flash LED cũng được di chuyển xuống vị trí dưới thay vì ở cạnh camera như trước. Với kích thước lớn hơn, cụm camera này được kỳ vọng sẽ mang lại nhiều nâng cấp về chất lượng hình ảnh so với các thế hệ trước.</p>\n<table class=\"picture\" align=\"center\">\n<tbody>\n<tr>\n<td class=\"pic\"><img alt=\"iPhone 6,1 inch tiep tuc lo dien voi camera lon o mat lung hinh anh 1\" title=\"iPhone 6,1 inch tiếp tục lộ diện với camera lớn ở mặt lưng hình ảnh 1\" src=\"https://znews-photo-td.zadn.vn/w660/Uploaded/fsmyy/2018_08_06/gsmarena_001.jpg\" width=\"500\" height=\"375\" /></td>\n</tr>\n<tr>\n<td class=\"pCaption caption\">Kích thước camera trên iPhone 6,1 inch to hơn so với iPhone 7 và iPhone 8.</td>\n</tr>\n</tbody>\n</table>\n<p>Theo&nbsp;<em>Economic Daily News</em>, phiên bản iPhone 6,1 inch sẽ hỗ trợ tính năng 2 SIM và chỉ được bán tại thị trường Trung Quốc.</p>\n<p>Cần lưu ý, chế độ chờ 2 SIM trên iPhone sẽ cho phép người dùng chọn một trong hai thẻ SIM nhận và thực hiện cuộc gọi. Nó khác so với chế độ cả 2 SIM đều hoạt động và có thể nhận cũng như thực hiện cuộc gọi cùng lúc.</p>\n<table class=\"picture gallery\" align=\"center\">\n<tbody>\n<tr>\n<td class=\"pic\"><img alt=\"iPhone 6,1 inch tiep tuc lo dien voi camera lon o mat lung hinh anh 2\" title=\"iPhone 6,1 inch tiếp tục lộ diện với camera lớn ở mặt lưng hình ảnh 2\" src=\"https://znews-photo-td.zadn.vn/w660/Uploaded/fsmyy/2018_08_06/gsmarena_002.jpg\" width=\"250\" height=\"250\" /><img alt=\"iPhone 6,1 inch tiep tuc lo dien voi camera lon o mat lung hinh anh 3\" title=\"iPhone 6,1 inch tiếp tục lộ diện với camera lớn ở mặt lưng hình ảnh 3\" src=\"https://znews-photo-td.zadn.vn/w660/Uploaded/fsmyy/2018_08_06/gsmarena_003.jpg\" width=\"241\" height=\"250\" /><img alt=\"iPhone 6,1 inch tiep tuc lo dien voi camera lon o mat lung hinh anh 4\" title=\"iPhone 6,1 inch tiếp tục lộ diện với camera lớn ở mặt lưng hình ảnh 4\" src=\"https://znews-photo-td.zadn.vn/w660/Uploaded/fsmyy/2018_08_06/gsmarena_004.jpg\" width=\"895\" height=\"768\" /><img alt=\"iPhone 6,1 inch tiep tuc lo dien voi camera lon o mat lung hinh anh 5\" title=\"iPhone 6,1 inch tiếp tục lộ diện với camera lớn ở mặt lưng hình ảnh 5\" src=\"https://znews-photo-td.zadn.vn/w660/Uploaded/fsmyy/2018_08_06/gsmarena_005.jpg\" width=\"333\" height=\"250\" /></td>\n</tr>\n<tr>\n<td class=\"pCaption caption\">Mô hình iPhone X Plus cho thấy máy chỉ sở hữu cụm camera kép thay vì 3 camera như các thông tin trước đó.</td>\n</tr>\n</tbody>\n</table>\n<p>Bên cạnh&nbsp;đó, theo&nbsp;<em>Macotakara</em>, chiếc iPhone 6,1 inch sẽ ra mắt với các màu sắc bao gồm “trắng, đen, vàng nhạt, cam sáng, xanh dương, nâu nhạt”.&nbsp;Máy sẽ có giá khởi điểm từ 700 USD và ra mắt vào tháng 9 sắp tới.</p>\n<p>2 sản phẩm khác là bản kế nhiệm iPhone X và một chiếc X Plus màn hình siêu lớn có thể ra mắt cùng thời điểm.</p>\n<figure class=\"video cms-video\" allowads=\"true\" source-url=\"/video-ban-dung-iphone-9-man-hinh-6-1-inch-post848457.html\" data-video-src=\"https://znews-mcloud-bf-s2.zadn.vn/tIVojFMRv58/5dd1a33a057fec21b56e/1aad62025547bc19e556/720/iPhone_61inch_2018_Exclusive_F.mp4?authen=exp=1533880786~acl=/tIVojFMRv58/*~hmac=45febf0eeb1174a07e4eae2a534e584f\"><video playsinline muted src=\"https://znews-mcloud-bf-s2.zadn.vn/XVf7Yadg2NY/b565478ee1cb089551da/4d4c39e30ea6e7f8beb7/480/iPhone_61inch_2018_Exclusive_F.mp4?authen=exp=1533880786~acl=/XVf7Yadg2NY/*~hmac=d05f4364194b269e7a9c46e7ada7878b\" controls=\'controls\' allowads=\'true\' onlyvietnam=\'false\' poster=\'https://znews-photo-td.zadn.vn/w660/Uploaded/Aohuouk/2018_06_04/61inchiPhone2018_8.jpg\' preload=\'none\' aspect=\'16:9\' mediaid=\'cf90c53e687b8125d86a\'>\n<source src=\"https://znews-mcloud-mpl-s2.zadn.vn/-_-dcih4KPM/whls/vod/0/nS70rvC20a92GMgGd0/iPhone_61inch_2018_Exclusive_F.m3u8?authen=exp=1533837586~acl=/-_-dcih4KPM/*~hmac=ae0fd7cdc91721c4da1976ff492b203b\" type=\"application/x-mpegURL\" label=\"Auto\" />\n<source src=\"https://znews-mcloud-bf-s2.zadn.vn/XVf7Yadg2NY/b565478ee1cb089551da/4d4c39e30ea6e7f8beb7/480/iPhone_61inch_2018_Exclusive_F.mp4?authen=exp=1533880786~acl=/XVf7Yadg2NY/*~hmac=d05f4364194b269e7a9c46e7ada7878b\" type=\"video/mp4\" label=\"SD\" res=\"480\" />\n<source src=\"https://znews-mcloud-bf-s2.zadn.vn/tIVojFMRv58/5dd1a33a057fec21b56e/1aad62025547bc19e556/720/iPhone_61inch_2018_Exclusive_F.mp4?authen=exp=1533880786~acl=/tIVojFMRv58/*~hmac=45febf0eeb1174a07e4eae2a534e584f\" type=\"video/mp4\" label=\"HD\" res=\"720\" />\n</video><figcaption><strong><a href=\"/video-ban-dung-iphone-9-man-hinh-6-1-inch-post848457.html\" cate-id=\"476\" cate-name=\"cong-nghe\" target=\"_blank\" class=\"autolink\">Bản dựng iPhone 9 màn hình 6,1 inch</a></strong> iPhone 9 có thể là sản phẩm rẻ nhất trong bộ 3 model ra mắt vào năm 2018 của Apple.</figcaption></figure>\n<table align=\"center\" class=\"article\">\n<tbody>\n<tr>\n<td><div class=\"inner-article\"><a href=\"/iphone-2-sim-co-the-chi-ban-tai-trung-quoc-post866405.html\"><p class=\"cover formatted\" style=\"background-image:url(https://znews-photo-td.zadn.vn/w210/Uploaded/fsmyy/2018_08_06/NewAppleiPhone92018priceandreleasedatereflections.jpg);\"></p><h2 class=\"title\">iPhone 2 SIM có thể chỉ bán tại Trung Quốc?</h2><p class=\"summary\">Nhiều khả năng, chiếc iPhone 6,1 inch hỗ trợ 2 SIM sẽ chỉ được bán ra tại thị trường Trung Quốc.</p></a></div></td>\n</tr>\n</tbody>\n</table>\n<br />\n<br />\n</div>', '2018-08-08 13:48:17', NULL, 0, '0000-00-00 00:00:00', NULL, NULL, NULL, b'0');
INSERT INTO `adposts` VALUES (19, 'langtu', 'Xe buýt chạy ngược chiều ở trung tâm Sài Gòn', 'Từ vòng xoay Cộng Hòa (quận 5), tài xế lái xe buýt đi ngược chiều trên đường Nguyễn Văn Cừ mặc cho nhiều ôtô khác bóp còi báo hiệu.', 9, 'https://i-vnexpress.vnecdn.net/2018/08/09/xebuytnguocchieu-1533814995-6267-1533815147_180x108.jpg', 'xe-buyt-chay-nguoc-chieu-o-trung-tam-sai-gon', '<article class=\"content_detail fck_detail width_common block_ads_connect\">\n<div style=\"text-align:center\">\n<figure class=\"item_slide_show clearfix\">\n<!--start video embed-->\n<div onclick=\"Video.playVideo(215177)\" id=\"video_parent_215177\" class=\"box_embed_video_parent embed_video_new\" data-vid=\"215177\" data-ratio=\"1\" data-articleoriginal=\"3790177\" data-ads=\"0\" data-license=\"1\" data-duration=\"14\" data-brandsafe=\"0\" data-type=\"0\" data-play=\"0\" data-frame=\"\">\n<div data-vid=\"215177\" class=\"box_img_video embed-container\">\n<img src=\"https://iv.vnecdn.net/vnexpress/images/web/2018/08/09/xe-buyt-chay-nguoc-chieu-o-trung-tam-sai-gon-1533814959_500x300.jpg\" alt=\"Xe buýt chạy ngược chiều ở trung tâm Sài Gòn\">\n<div class=\"icon_blockvideo\">\n<div class=\"img_icon\">&nbsp;</div>\n<div class=\"image_icon_center\">&nbsp;</div>\n</div></div>\n<div id=\"embed_video_215177\" class=\"box_embed_video\" style=\"display:none;\">\n<div class=\"bg_overlay_small_unpin\"></div>\n<div class=\"bg_overlay_small\"></div>\n<div class=\"embed-container\">\n<div id=\"video-215177\">\n<div id=\"parser_player_215177\" class=\"media_content\" style=\"display:none;\">\n<div id=\"videoContainter_215177\" class=\"videoContainter\" style=\"width: 100%; height: 100%;\">\n<video id=\"media-video-215177\" preload=\"auto\" playsinline webkit-playsinline src=\"https://d.vnecdn.net/vnexpress/video/video/web/mp4/,240p,360p,480p,,/2018/08/09/xe-buyt-chay-nguoc-chieu-o-trung-tam-sai-gon-1533814959/vne/master.m3u8\" type=\"application/x-mpegURL\" controls style=\"width: 100%; height: 100%;\" data-mode=\"240|360|480|720\" max-mode=\"720\" data-subtitle=\"0\" active-mode=\"720\"></video>\n</div>\n</div>\n<!--[if IE]>\r\n                                    <div id=\"flash_player_215177\" class=\"flash_content\" style=\"display:none;\">\r\n                                        <object width=\"100%\" height=\"100%\" classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\" id=\"videoplayer_215177\" codebase=\"https://fpdownload2.macromedia.com/get/shockwave/cabs/flash/swflash.cab#version=9,0,0,0\">\r\n                                            <param name=\"movie\" value=\"https://s.vnecdn.net/video/flash/vneplayer.swf\">\r\n                                            <param name=\"allowScriptAccess\" value=\"always\" />\r\n                                            <param name=\"quality\" value=\"high\">\r\n                                            <param name=\"bgcolor\" value=\"#000000\">\r\n                                            <param name=\"wmode\" value=\"transparent\">\r\n                                            <param name=\"flashvars\" value=\"xmlPath=&mAuto=true&asseturl=https://s.vnecdn.net/video/flash/assetv3.swf&dynamicview=false&sharemode=false&autoHide=false&tracktype=video&typeview=1&playerid=videoplayer&trackurl=https://d.vnecdn.net/vnexpress/video/video/web/mp4/,240p,360p,480p,,/2018/08/09/xe-buyt-chay-nguoc-chieu-o-trung-tam-sai-gon-1533814959/vne/master.m3u8&thumburl=&tracklink=&adszoneid=&adsTag=&activemode=720&tracktitle=Xe buýt chạy ngược chiều ở trung tâm Sài Gòn\">\r\n                                            <param name=\"allowfullscreen\" value=\"true\">\r\n                                            <embed bgcolor=\"#000000\" width=\"100%\" height=\"100%\" name=\"videoplayer_215177\" flashvars=\"xmlPath=&mAuto=true&asseturl=https://s.vnecdn.net/video/flash/assetv3.swf&dynamicview=false&sharemode=false&autoHide=false&tracktype=video&typeview=1&playerid=videoplayer&trackurl=https://d.vnecdn.net/vnexpress/video/video/web/mp4/,240p,360p,480p,,/2018/08/09/xe-buyt-chay-nguoc-chieu-o-trung-tam-sai-gon-1533814959/vne/master.m3u8&thumburl=&tracklink=&adszoneid=&adsTag=&activemode=720&tracktitle=Xe buýt chạy ngược chiều ở trung tâm Sài Gòn\" type=\"application/x-shockwave-flash\" allowfullscreen=\"true\" allowscriptaccess=\"always\" wmode=\"transparent\" pluginspage=\"https://get.adobe.com/flashplayer/\" src=\"https://s.vnecdn.net/video/flash/vneplayer.swf\">\r\n                                        </object>\r\n                                    </div>\r\n                                    <![endif]-->\n</div>\n<div class=\"parser_title\" style=\"display:none;\">Xe buýt chạy ngược chiều ở trung tâm Sài Gòn</div>\n</div>\n</div>\n</div>\n<!--end video embed-->\n<figcaption class=\"desc_cation\"><div class=\"inner_caption\">\n<p class=\"Image\">\nXe buýt chạy ngược chiều ở quận 5.</p>\n</div></figcaption></figure></div><p class=\"Normal\">\nTrong video đăng tải trên Internet ngày 9/8, xe buýt số 6 (tuyến Chợ Lớn – Đại học Nông Lâm) chạy ngược chiều trên đường Nguyễn Văn Cừ (quận 5), hướng từ ngã 6 Cộng Hòa về cầu Nguyễn Văn Cừ.</p><p class=\"Normal\">\nNhiều ôtô chạy đúng chiều đã bóp còi, có người yêu cầu xe buýt quay về phần đường của mình nhưng tài xế tiếp tục lách ôtô qua, đi tiếp. Trên xe lúc này có nhiều hành khách.</p><p class=\"Normal\">\nÔng Trần Chí Trung (Giám đốc Trung tâm Quản lý và Điều hành vận tải hành khách công cộng TP HCM) vừa yêu cầu lãnh đạo HTX Quyết Thắng đình chỉ công tác tài xế Trần Văn Hạnh - người điều khiển xe buýt.</p><p class=\"Normal\">\nĐơn vị này cũng tiếp tục làm việc với tài xế, các cơ quan chức năng để có hướng xử lý tiếp theo.</p><p class=\"Normal\" style=\"text-align:right;\">\n<strong>Sơn Hòa</strong></p> </article>', '2018-08-09 22:17:21', NULL, 0, '2018-08-10 15:21:04', 'Xe buýt chạy ngược chiều ở trung tâm Sài Gòn - VnExpress', 'Từ vòng xoay Cộng Hòa (quận 5), tài xế lái xe buýt đi ngược chiều trên đường Nguyễn Văn Cừ mặc cho nhiều ôtô khác bóp còi báo hiệu. - VnExpress', 'xe buýt chạy ngược chiều, xe buýt vi phạm', b'0');
INSERT INTO `adposts` VALUES (20, 'langtu', 'Đà Nẵng đề nghị khai trừ Đảng cựu Chủ tịch Trần Văn Minh', 'Quy trình kỷ luật Đảng với ông Trần Văn Minh, nguyên Chủ tịch Đà Nẵng được khởi động với đề nghị ở mức cao nhất.', 9, 'https://i-vnexpress.vnecdn.net/2018/08/09/minh-1533823014-8436-1533823055_180x108.jpg', 'da-nang-de-nghi-khai-tru-dang-cuu-chu-tich-tran-van-minh', '<article class=\"content_detail fck_detail width_common block_ads_connect\">\n<p class=\"Normal\">\nChiều 9/8, Ban chấp hành Đảng bộ TP Đà Nẵng đã họp và thống nhất đề xuất khai trừ Đảng đối với ông Trần Văn Minh (63 tuổi, Chủ tịch Đà Nẵng giai đoạn năm 2006-2011).</p><p class=\"Normal\">\nNgoài chức cựu Chủ tịch UBND TP Đà Nẵng, ông Minh còn nguyên là Uỷ viên Trung ương khoá XI, Phó trưởng Ban tổ chức Trung ương, Phó bí thư Thành uỷ Đà Nẵng.</p><p class=\"Normal\">\nNguồn tin của <em>VnExpress </em>cho biết, đề xuất trên là bước đầu trong quy trình xử lý kỷ luật Đảng với ông Trần Văn Minh. Do ông Minh là cán bộ diện Trung ương quản lý nên quyết định cụ thể sẽ do Trung ương quyết định.</p><table align=\"center\" border=\"0\" cellpadding=\"3\" cellspacing=\"0\" class=\"tplCaption\"><tbody><tr><td>\n<img alt=\"Cựu Chủ tịch Đà Nẵng Trần Văn Minh. Ảnh: Nguyễn Đông.\" data-natural-width=\"500\" src=\"https://i-vnexpress.vnecdn.net/2018/08/09/minh-6498-1533823055.jpg\"></td>\n</tr><tr><td>\n<p class=\"Image\">\nCựu Chủ tịch Đà Nẵng Trần Văn Minh. Ảnh: <em>Nguyễn Đông.</em></p>\n</td>\n</tr></tbody></table><p class=\"Normal\">\nTrước đó ngày 17/4, mở rộng điều tra vụ án <a href=\"https://vnexpress.net/tin-tuc/phap-luat/ong-phan-van-anh-vu-bi-phat-9-nam-tu-3785103.html?utm_source=search_vne\">Phan Văn Anh Vũ</a>, Bộ Công an đã khởi tố hai cựu Chủ tịch Đà Nẵng là ông Trần Văn Minh và ông Văn Hữu Chiến (64 tuổi, cựu Chủ tịch Đà Nẵng từ 2011-2014). Trong đó ông Minh bị bắt giam. Ông Chiến được tại ngoại.</p><p class=\"Normal\">\n<span>Hai ông này cùng bị khởi tố về các tội Vi phạm quy định về quản lý, sử dụng tài sản nhà nước gây thất thoát, lãng phí (Điều 219 Bộ luật Hình sự năm 2015) và Vi phạm các quy định của nhà nước về quản lý đất đai (Điều 229 Bộ luật Hình sự năm 2015).</span></p><p class=\"Normal\">\n<span>Cuối tháng 7, Bộ Công an đã đề nghị chính quyền Đà Nẵng phối hợp rà soát, cung cấp thông tin, hồ sơ pháp lý và tạm dừng giao dịch đối với tài sản thuộc sở hữu của các bị can trên.</span></p><div class=\"box_brief_info\">\n<p class=\"Normal\" style=\"margin-top:0px;padding:0px;line-height:18px;color:rgb(51,51,51);\">\nTheo quy định 102 về xử lý đảng viên vi phạm và hướng dẫn thực hiện quy định này, đảng viên vi phạm pháp luật đến mức phải truy cứu trách nhiệm hình sự thì phải truy cứu trách nhiệm hình sự, không xử lý nội bộ; khi bị toà tuyên phạt từ cải tạo không giam giữ trở lên thì phải khai trừ...</p>\n<p class=\"Normal\" style=\"margin-top:0px;padding:0px;line-height:18px;color:rgb(51,51,51);\">\nQuy định 102 cũng nêu rõ bốn hình thức kỷ luật áp dụng đối với đảng viên chính thức gồm: khiển trách, cảnh cáo, cách chức, khai trừ.</p>\n</div> </article>', '2018-08-09 22:17:21', NULL, 0, '2018-08-10 15:21:04', 'Đà Nẵng đề nghị khai trừ Đảng cựu Chủ tịch Trần Văn Minh - VnExpr', 'Quy trình kỷ luật Đảng với ông Trần Văn Minh, nguyên Chủ tịch Đà Nẵng được khởi động với đề nghị ở mức cao nhất. - VnExpress', 'Đà Nẵng, Phan Văn Anh Vũ', b'0');
INSERT INTO `adposts` VALUES (21, 'langtu', 'Na Lạng Sơn xuống núi', 'Những trái na chín đầu mùa trên núi non xứ Lạng đang được thu hái, chuyển về xuôi tiêu thụ.', 9, 'https://i-vnexpress.vnecdn.net/2018/08/09/10-1533787938_180x108.jpg', 'na-lang-son-xuong-nui', '<article class=\"content_detail fck_detail width_common\">\n<div id=\"article_content\" class=\"block_ads_connect\">\n<div class=\"item_slide_show clearfix\" style=\"width:680px;\">\n<div class=\"block_thumb_slide_show\">\n<img class=\"left\" alt=\"Na Lạng Sơn xuống núi\" data-reference-id=\"25767446\" src=\"https://i-vnexpress.vnecdn.net/2018/08/09/3-1533787929_680x0.jpg\" data-component-caption=\"&amp;lt;p&amp;gt;\n	Khi tiết trời miền Bắc lập thu cũng là thời điểm na Lạng Sơn vào vụ thu hoạch.&amp;lt;/p&amp;gt;\n&amp;lt;p&amp;gt;\n	Tỉnh biên giới này có 16 xã trồng na. Ông Triệu Văn Bế (Lân Giao, Chi Lăng) cho biết na được trồng trên núi đá nên việc chăm sóc, thu hoạch rất vất vả. &amp;lt;/p&amp;gt;\"/>\n<noscript>\n<img class=\"left\" alt=\"Na Lạng Sơn xuống núi\" data-reference-id=\"25767446\" src=\"https://i-vnexpress.vnecdn.net/2018/08/09/3-1533787929_680x0.jpg\" data-component-caption=\"&amp;lt;p&amp;gt;\n	Khi tiết trời miền Bắc lập thu cũng là thời điểm na Lạng Sơn vào vụ thu hoạch.&amp;lt;/p&amp;gt;\n&amp;lt;p&amp;gt;\n	Tỉnh biên giới này có 16 xã trồng na. Ông Triệu Văn Bế (Lân Giao, Chi Lăng) cho biết na được trồng trên núi đá nên việc chăm sóc, thu hoạch rất vất vả. &amp;lt;/p&amp;gt;\"/>\n</noscript>\n<a href=\"javascript:void(0)\" class=\"icon_thumb_videophoto icon_thumb_zoom btn_icon_show_slide_show\"><i class=\"ic ic-expand\"></i></a>\n</div>\n<div class=\"desc_cation\"><p>\nKhi tiết trời miền Bắc lập thu cũng là thời điểm na Lạng Sơn vào vụ thu hoạch.</p>\n<p>\nTỉnh biên giới này có 16 xã trồng na. Ông Triệu Văn Bế (Lân Giao, Chi Lăng) cho biết na được trồng trên núi đá nên việc chăm sóc, thu hoạch rất vất vả. </p></div>\n</div>\n<div class=\"item_slide_show clearfix\" style=\"width:680px;\">\n<div class=\"block_thumb_slide_show\">\n<img class=\"left\" alt=\"Na Lạng Sơn xuống núi\" data-reference-id=\"25767445\" src=\"https://i-vnexpress.vnecdn.net/2018/08/09/IMG-3437-JPG_680x0.jpg\" data-component-caption=\"&amp;lt;p&amp;gt;\n	Những quả na đầu mùa thường có cân nặng trên dưới 500 gam; giá bán từ 50.000 đến 70.000 đồng mỗi kg.&amp;lt;/p&amp;gt;\n&amp;lt;p&amp;gt;\n	Năm 2013, Tổ chức Kỷ lục Việt Nam đưa quả na vào danh sách 50 đặc sản trái cây nổi tiếng theo Bộ tiêu chí công bố giá trị đặc sản Việt Nam.&amp;lt;/p&amp;gt;\"/>\n<noscript>\n<img class=\"left\" alt=\"Na Lạng Sơn xuống núi\" data-reference-id=\"25767445\" src=\"https://i-vnexpress.vnecdn.net/2018/08/09/IMG-3437-JPG_680x0.jpg\" data-component-caption=\"&amp;lt;p&amp;gt;\n	Những quả na đầu mùa thường có cân nặng trên dưới 500 gam; giá bán từ 50.000 đến 70.000 đồng mỗi kg.&amp;lt;/p&amp;gt;\n&amp;lt;p&amp;gt;\n	Năm 2013, Tổ chức Kỷ lục Việt Nam đưa quả na vào danh sách 50 đặc sản trái cây nổi tiếng theo Bộ tiêu chí công bố giá trị đặc sản Việt Nam.&amp;lt;/p&amp;gt;\"/>\n</noscript>\n<a href=\"javascript:void(0)\" class=\"icon_thumb_videophoto icon_thumb_zoom btn_icon_show_slide_show\"><i class=\"ic ic-expand\"></i></a>\n</div>\n<div class=\"desc_cation\"><p>\nNhững quả na đầu mùa thường có cân nặng trên dưới 500 gam; giá bán từ 50.000 đến 70.000 đồng mỗi kg.</p>\n<p>\nNăm 2013, Tổ chức Kỷ lục Việt Nam đưa quả na vào danh sách 50 đặc sản trái cây nổi tiếng theo Bộ tiêu chí công bố giá trị đặc sản Việt Nam.</p></div>\n</div>\n<div class=\"item_slide_show clearfix\" style=\"width:680px;\">\n<div class=\"block_thumb_slide_show\">\n<img class=\"left\" alt=\"Na Lạng Sơn xuống núi\" data-reference-id=\"25767444\" src=\"https://i-vnexpress.vnecdn.net/2018/08/09/2-1533787928_680x0.jpg\" data-component-caption=\"&amp;lt;p&amp;gt;\n	Chị Phương ở thị trấn Chi Lăng trèo hái na và cho hay, việc thu hái na đầu mùa phải làm kỹ lưỡng để tuyển chọn những quả đẹp, trọng lượng lớn vì đây là thời điểm na được giá.&amp;lt;/p&amp;gt;\n&amp;lt;p&amp;gt;\n	Gia đình chị Phương có bốn người, mỗi ngày đi 4 km để hái na từ 5h đến 8h, kịp đưa xuống chợ bán.&amp;lt;/p&amp;gt;\"/>\n<noscript>\n<img class=\"left\" alt=\"Na Lạng Sơn xuống núi\" data-reference-id=\"25767444\" src=\"https://i-vnexpress.vnecdn.net/2018/08/09/2-1533787928_680x0.jpg\" data-component-caption=\"&amp;lt;p&amp;gt;\n	Chị Phương ở thị trấn Chi Lăng trèo hái na và cho hay, việc thu hái na đầu mùa phải làm kỹ lưỡng để tuyển chọn những quả đẹp, trọng lượng lớn vì đây là thời điểm na được giá.&amp;lt;/p&amp;gt;\n&amp;lt;p&amp;gt;\n	Gia đình chị Phương có bốn người, mỗi ngày đi 4 km để hái na từ 5h đến 8h, kịp đưa xuống chợ bán.&amp;lt;/p&amp;gt;\"/>\n</noscript>\n<a href=\"javascript:void(0)\" class=\"icon_thumb_videophoto icon_thumb_zoom btn_icon_show_slide_show\"><i class=\"ic ic-expand\"></i></a>\n</div>\n<div class=\"desc_cation\"><p>\nChị Phương ở thị trấn Chi Lăng trèo hái na và cho hay, việc thu hái na đầu mùa phải làm kỹ lưỡng để tuyển chọn những quả đẹp, trọng lượng lớn vì đây là thời điểm na được giá.</p>\n<p>\nGia đình chị Phương có bốn người, mỗi ngày đi 4 km để hái na từ 5h đến 8h, kịp đưa xuống chợ bán.</p></div>\n</div>\n<div class=\"item_slide_show clearfix\" style=\"width:680px;\">\n<div class=\"block_thumb_slide_show\">\n<img class=\"left\" alt=\"Na Lạng Sơn xuống núi\" data-reference-id=\"25767447\" src=\"https://i-vnexpress.vnecdn.net/2018/08/09/5-1533787931_680x0.jpg\" data-component-caption=\"&amp;lt;p class=&amp;quot;Normal&amp;quot;&amp;gt;\n	Na sau khi hái được xếp gọn gàng vào thúng, xô, chậu; sau đó bọc kỹ để vận chuyển xuống núi.&amp;lt;/p&amp;gt;\"/>\n<noscript>\n<img class=\"left\" alt=\"Na Lạng Sơn xuống núi\" data-reference-id=\"25767447\" src=\"https://i-vnexpress.vnecdn.net/2018/08/09/5-1533787931_680x0.jpg\" data-component-caption=\"&amp;lt;p class=&amp;quot;Normal&amp;quot;&amp;gt;\n	Na sau khi hái được xếp gọn gàng vào thúng, xô, chậu; sau đó bọc kỹ để vận chuyển xuống núi.&amp;lt;/p&amp;gt;\"/>\n</noscript>\n<a href=\"javascript:void(0)\" class=\"icon_thumb_videophoto icon_thumb_zoom btn_icon_show_slide_show\"><i class=\"ic ic-expand\"></i></a>\n</div>\n<div class=\"desc_cation\"><p class=\"Normal\">\nNa sau khi hái được xếp gọn gàng vào thúng, xô, chậu; sau đó bọc kỹ để vận chuyển xuống núi.</p></div>\n</div>\n<div class=\"item_slide_show clearfix\" style=\"width:680px;\">\n<div class=\"block_thumb_slide_show\">\n<img class=\"left\" alt=\"Na Lạng Sơn xuống núi\" data-reference-id=\"25767449\" src=\"https://i-vnexpress.vnecdn.net/2018/08/09/4-1533804118_680x0.jpg\" data-component-caption=\"&amp;lt;p class=&amp;quot;Normal&amp;quot;&amp;gt;\n	Một số người dân gánh na xuống núi theo cách truyền thống.&amp;lt;/p&amp;gt;\n&amp;lt;p class=&amp;quot;Normal&amp;quot;&amp;gt;\n&amp;lt;/p&amp;gt;\"/>\n<noscript>\n<img class=\"left\" alt=\"Na Lạng Sơn xuống núi\" data-reference-id=\"25767449\" src=\"https://i-vnexpress.vnecdn.net/2018/08/09/4-1533804118_680x0.jpg\" data-component-caption=\"&amp;lt;p class=&amp;quot;Normal&amp;quot;&amp;gt;\n	Một số người dân gánh na xuống núi theo cách truyền thống.&amp;lt;/p&amp;gt;\n&amp;lt;p class=&amp;quot;Normal&amp;quot;&amp;gt;\n&amp;lt;/p&amp;gt;\"/>\n</noscript>\n<a href=\"javascript:void(0)\" class=\"icon_thumb_videophoto icon_thumb_zoom btn_icon_show_slide_show\"><i class=\"ic ic-expand\"></i></a>\n</div>\n<div class=\"desc_cation\"><p class=\"Normal\">\nMột số người dân gánh na xuống núi theo cách truyền thống.</p>\n<p class=\"Normal\">\n</p></div>\n</div>\n<div class=\"item_slide_show clearfix\" style=\"width:680px;\">\n<div class=\"block_thumb_slide_show\">\n<img class=\"left\" alt=\"Na Lạng Sơn xuống núi\" data-reference-id=\"25767448\" src=\"https://i-vnexpress.vnecdn.net/2018/08/09/8-1533787934_680x0.jpg\" data-component-caption=\"&amp;lt;p class=&amp;quot;Normal&amp;quot;&amp;gt;\n	Mỗi thúng na được gánh xuống núi nặng từ 20 đến 30 kg.&amp;lt;/p&amp;gt;\"/>\n<noscript>\n<img class=\"left\" alt=\"Na Lạng Sơn xuống núi\" data-reference-id=\"25767448\" src=\"https://i-vnexpress.vnecdn.net/2018/08/09/8-1533787934_680x0.jpg\" data-component-caption=\"&amp;lt;p class=&amp;quot;Normal&amp;quot;&amp;gt;\n	Mỗi thúng na được gánh xuống núi nặng từ 20 đến 30 kg.&amp;lt;/p&amp;gt;\"/>\n</noscript>\n<a href=\"javascript:void(0)\" class=\"icon_thumb_videophoto icon_thumb_zoom btn_icon_show_slide_show\"><i class=\"ic ic-expand\"></i></a>\n</div>\n<div class=\"desc_cation\"><p class=\"Normal\">\nMỗi thúng na được gánh xuống núi nặng từ 20 đến 30 kg.</p></div>\n</div>\n<div class=\"item_slide_show clearfix\" style=\"width:680px;\">\n<div class=\"block_thumb_slide_show\">\n<img class=\"left\" alt=\"Na Lạng Sơn xuống núi\" data-reference-id=\"25767450\" src=\"https://i-vnexpress.vnecdn.net/2018/08/09/9-1533787936_680x0.jpg\" data-component-caption=\"&amp;lt;p&amp;gt;\n	Những năm gần đây, nhiều người dân làm ròng rọc tự chế để vận chuyển na từ trên đỉnh núi xuống, đỡ tốn sức người.&amp;lt;/p&amp;gt;\"/>\n<noscript>\n<img class=\"left\" alt=\"Na Lạng Sơn xuống núi\" data-reference-id=\"25767450\" src=\"https://i-vnexpress.vnecdn.net/2018/08/09/9-1533787936_680x0.jpg\" data-component-caption=\"&amp;lt;p&amp;gt;\n	Những năm gần đây, nhiều người dân làm ròng rọc tự chế để vận chuyển na từ trên đỉnh núi xuống, đỡ tốn sức người.&amp;lt;/p&amp;gt;\"/>\n</noscript>\n<a href=\"javascript:void(0)\" class=\"icon_thumb_videophoto icon_thumb_zoom btn_icon_show_slide_show\"><i class=\"ic ic-expand\"></i></a>\n</div>\n<div class=\"desc_cation\"><p>\nNhững năm gần đây, nhiều người dân làm ròng rọc tự chế để vận chuyển na từ trên đỉnh núi xuống, đỡ tốn sức người.</p></div>\n</div>\n<div class=\"item_slide_show clearfix\" style=\"width:680px;\">\n<div class=\"block_thumb_slide_show\">\n<img class=\"left\" alt=\"Na Lạng Sơn xuống núi\" data-reference-id=\"25767451\" src=\"https://i-vnexpress.vnecdn.net/2018/08/09/6-1533787933_680x0.jpg\" data-component-caption=\"&amp;lt;p&amp;gt;\n	Dây tời của ròng rọc tự chế có chiều dài khoảng 1.000 mét, mỗi dân tời vận chuyển tối đa 70 kg.&amp;lt;/p&amp;gt;\n&amp;lt;p&amp;gt;\n	Một bộ ròng rọc và dây tời có giá khoảng 20 triệu đồng, sử dụng được 3 năm. Nhiều hộ dân ở Lạng Sơn chung tiền lắp ròng rọc nhằm giảm chi phí. &amp;lt;/p&amp;gt;\"/>\n<noscript>\n<img class=\"left\" alt=\"Na Lạng Sơn xuống núi\" data-reference-id=\"25767451\" src=\"https://i-vnexpress.vnecdn.net/2018/08/09/6-1533787933_680x0.jpg\" data-component-caption=\"&amp;lt;p&amp;gt;\n	Dây tời của ròng rọc tự chế có chiều dài khoảng 1.000 mét, mỗi dân tời vận chuyển tối đa 70 kg.&amp;lt;/p&amp;gt;\n&amp;lt;p&amp;gt;\n	Một bộ ròng rọc và dây tời có giá khoảng 20 triệu đồng, sử dụng được 3 năm. Nhiều hộ dân ở Lạng Sơn chung tiền lắp ròng rọc nhằm giảm chi phí. &amp;lt;/p&amp;gt;\"/>\n</noscript>\n<a href=\"javascript:void(0)\" class=\"icon_thumb_videophoto icon_thumb_zoom btn_icon_show_slide_show\"><i class=\"ic ic-expand\"></i></a>\n</div>\n<div class=\"desc_cation\"><p>\nDây tời của ròng rọc tự chế có chiều dài khoảng 1.000 mét, mỗi dân tời vận chuyển tối đa 70 kg.</p>\n<p>\nMột bộ ròng rọc và dây tời có giá khoảng 20 triệu đồng, sử dụng được 3 năm. Nhiều hộ dân ở Lạng Sơn chung tiền lắp ròng rọc nhằm giảm chi phí. </p></div>\n</div>\n<div class=\"item_slide_show clearfix\" style=\"width:680px;\">\n<div class=\"block_thumb_slide_show\">\n<img class=\"left\" alt=\"Na Lạng Sơn xuống núi\" data-reference-id=\"25767452\" src=\"https://i-vnexpress.vnecdn.net/2018/08/09/10-1533787938_680x0.jpg\" data-component-caption=\"&amp;lt;p class=&amp;quot;Normal&amp;quot;&amp;gt;\n	Năm nay thời tiết thuận lợi cho sự phát triển của cây na nên người dân trồng na vui vì được mùa. &amp;lt;/p&amp;gt;\n&amp;lt;p class=&amp;quot;Normal&amp;quot;&amp;gt;\n	Ông Lương Thành Chung, Trưởng Pphòng Nông nghiệp và Phát triển nông thôn huyện Chi Lăng cho biết,&amp;lt;span&amp;gt; nhờ cây na mà nhiều hộ dân tộc Tày, Nùng… thoát nghèo, có cuộc sống tốt hơn.&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;\"/>\n<noscript>\n<img class=\"left\" alt=\"Na Lạng Sơn xuống núi\" data-reference-id=\"25767452\" src=\"https://i-vnexpress.vnecdn.net/2018/08/09/10-1533787938_680x0.jpg\" data-component-caption=\"&amp;lt;p class=&amp;quot;Normal&amp;quot;&amp;gt;\n	Năm nay thời tiết thuận lợi cho sự phát triển của cây na nên người dân trồng na vui vì được mùa. &amp;lt;/p&amp;gt;\n&amp;lt;p class=&amp;quot;Normal&amp;quot;&amp;gt;\n	Ông Lương Thành Chung, Trưởng Pphòng Nông nghiệp và Phát triển nông thôn huyện Chi Lăng cho biết,&amp;lt;span&amp;gt; nhờ cây na mà nhiều hộ dân tộc Tày, Nùng… thoát nghèo, có cuộc sống tốt hơn.&amp;lt;/span&amp;gt;&amp;lt;/p&amp;gt;\"/>\n</noscript>\n<a href=\"javascript:void(0)\" class=\"icon_thumb_videophoto icon_thumb_zoom btn_icon_show_slide_show\"><i class=\"ic ic-expand\"></i></a>\n</div>\n<div class=\"desc_cation\"><p class=\"Normal\">\nNăm nay thời tiết thuận lợi cho sự phát triển của cây na nên người dân trồng na vui vì được mùa. </p>\n<p class=\"Normal\">\nÔng Lương Thành Chung, Trưởng Pphòng Nông nghiệp và Phát triển nông thôn huyện Chi Lăng cho biết,<span> nhờ cây na mà nhiều hộ dân tộc Tày, Nùng… thoát nghèo, có cuộc sống tốt hơn.</span></p></div>\n</div>\n<div class=\"item_slide_show clearfix\" style=\"width:680px;\">\n<div class=\"block_thumb_slide_show\">\n<img class=\"left\" alt=\"Na Lạng Sơn xuống núi\" data-reference-id=\"25767453\" src=\"https://i-vnexpress.vnecdn.net/2018/08/09/12-1533787942_680x0.jpg\" data-component-caption=\"&amp;lt;p class=&amp;quot;Normal&amp;quot;&amp;gt;\n	Na được các thương lái thu mua, đưa đi tiêu thụ ở nhiều tỉnh. thành như Hà Nội, Hưng Yên, Hải Dương, Quảng Ninh... &amp;lt;/p&amp;gt;\"/>\n<noscript>\n<img class=\"left\" alt=\"Na Lạng Sơn xuống núi\" data-reference-id=\"25767453\" src=\"https://i-vnexpress.vnecdn.net/2018/08/09/12-1533787942_680x0.jpg\" data-component-caption=\"&amp;lt;p class=&amp;quot;Normal&amp;quot;&amp;gt;\n	Na được các thương lái thu mua, đưa đi tiêu thụ ở nhiều tỉnh. thành như Hà Nội, Hưng Yên, Hải Dương, Quảng Ninh... &amp;lt;/p&amp;gt;\"/>\n</noscript>\n<a href=\"javascript:void(0)\" class=\"icon_thumb_videophoto icon_thumb_zoom btn_icon_show_slide_show\"><i class=\"ic ic-expand\"></i></a>\n</div>\n<div class=\"desc_cation\"><p class=\"Normal\">\nNa được các thương lái thu mua, đưa đi tiêu thụ ở nhiều tỉnh. thành như Hà Nội, Hưng Yên, Hải Dương, Quảng Ninh... </p></div>\n</div>\n<div class=\"item_slide_show clearfix\" style=\"width:680px;\">\n<div class=\"block_thumb_slide_show\">\n<img class=\"left\" alt=\"Na Lạng Sơn xuống núi\" data-reference-id=\"25767443\" src=\"https://i-vnexpress.vnecdn.net/2018/08/09/1-1533787927_680x0.jpg\" data-component-caption=\"&amp;lt;p&amp;gt;\n	Huyện Chi Lăng được coi là \'thủ phủ&amp;quot; của na Lạng Sơn. Toàn tỉnh có 2.800 ha trồng na, chủ yếu phân bố tại huyện Chi Lăng và Hữu Lũng.&amp;lt;/p&amp;gt;\n&amp;lt;p&amp;gt;\n	Ngày 18/8, tại huyện Chi Lăng sẽ diễn ra &amp;quot;Ngày hội na năm 2018&amp;quot;.&amp;lt;/p&amp;gt;\"/>\n<noscript>\n<img class=\"left\" alt=\"Na Lạng Sơn xuống núi\" data-reference-id=\"25767443\" src=\"https://i-vnexpress.vnecdn.net/2018/08/09/1-1533787927_680x0.jpg\" data-component-caption=\"&amp;lt;p&amp;gt;\n	Huyện Chi Lăng được coi là \'thủ phủ&amp;quot; của na Lạng Sơn. Toàn tỉnh có 2.800 ha trồng na, chủ yếu phân bố tại huyện Chi Lăng và Hữu Lũng.&amp;lt;/p&amp;gt;\n&amp;lt;p&amp;gt;\n	Ngày 18/8, tại huyện Chi Lăng sẽ diễn ra &amp;quot;Ngày hội na năm 2018&amp;quot;.&amp;lt;/p&amp;gt;\"/>\n</noscript>\n<a href=\"javascript:void(0)\" class=\"icon_thumb_videophoto icon_thumb_zoom btn_icon_show_slide_show\"><i class=\"ic ic-expand\"></i></a>\n</div>\n<div class=\"desc_cation\"><p>\nHuyện Chi Lăng được coi là \'thủ phủ\" của na Lạng Sơn. Toàn tỉnh có 2.800 ha trồng na, chủ yếu phân bố tại huyện Chi Lăng và Hữu Lũng.</p>\n<p>\nNgày 18/8, tại huyện Chi Lăng sẽ diễn ra \"Ngày hội na năm 2018\".</p></div>\n</div>\n</div>\n<div class=\"fck_detail width_common\"> <p><p style=\"text-align:right;\">\n<strong>Ngọc Thành</strong></p></p></div>\n</article>', '2018-08-09 22:17:21', NULL, 0, '2018-08-10 15:21:04', 'Na Lạng Sơn xuống núi - VnExpress', 'Những trái na chín đầu mùa trên núi non xứ Lạng đang được thu hái, chuyển về xuôi tiêu thụ. - VnExpress', 'Na Lạng Sơn xuống núi - VnExpress', b'0');
INSERT INTO `adposts` VALUES (22, 'langtu', 'Quảng Nam sẽ mua rừng cho voọc ở', 'Tỉnh Quảng Nam lên phương án mua lại đất trồng cây keo của người dân để mở rộng khu vực sinh sống tự nhiên của đàn voọc.', 9, 'https://i-vnexpress.vnecdn.net/2018/08/09/anhvooc71701502331904-15338040-5686-1910-1533805772_180x108.jpg', 'quang-nam-se-mua-rung-cho-vooc-o', '<article class=\"content_detail fck_detail width_common block_ads_connect\">\n<div style=\"text-align:center\">\n<figure class=\"item_slide_show clearfix\">\n<!--start video embed-->\n<div onclick=\"Video.playVideo(215154)\" id=\"video_parent_215154\" class=\"box_embed_video_parent embed_video_new\" data-vid=\"215154\" data-ratio=\"1\" data-articleoriginal=\"3790085\" data-ads=\"0\" data-license=\"0\" data-duration=\"31\" data-brandsafe=\"0\" data-type=\"0\" data-play=\"0\" data-frame=\"\">\n<div data-vid=\"215154\" class=\"box_img_video embed-container\">\n<img src=\"https://iv.vnecdn.net/vnexpress/images/web/2018/08/09/quang-nam-mua-rung-cho-vooc-o-1533807048_500x300.jpg\" alt=\"Quảng Nam mua rừng cho voọc ở\">\n<div class=\"icon_blockvideo\">\n<div class=\"img_icon\">&nbsp;</div>\n<div class=\"image_icon_center\">&nbsp;</div>\n</div></div>\n<div id=\"embed_video_215154\" class=\"box_embed_video\" style=\"display:none;\">\n<div class=\"bg_overlay_small_unpin\"></div>\n<div class=\"bg_overlay_small\"></div>\n<div class=\"embed-container\">\n<div id=\"video-215154\">\n<div id=\"parser_player_215154\" class=\"media_content\" style=\"display:none;\">\n<div id=\"videoContainter_215154\" class=\"videoContainter\" style=\"width: 100%; height: 100%;\">\n<video id=\"media-video-215154\" preload=\"auto\" playsinline webkit-playsinline src=\"https://d.vnecdn.net/vnexpress/video/video/web/mp4/,240p,360p,480p,,/2018/08/09/quang-nam-mua-rung-cho-vooc-o-1533807048/vne/master.m3u8\" type=\"application/x-mpegURL\" controls style=\"width: 100%; height: 100%;\" data-mode=\"240|360|480|720\" max-mode=\"720\" data-subtitle=\"0\" active-mode=\"720\"></video>\n</div>\n</div>\n<!--[if IE]>\r\n                                    <div id=\"flash_player_215154\" class=\"flash_content\" style=\"display:none;\">\r\n                                        <object width=\"100%\" height=\"100%\" classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\" id=\"videoplayer_215154\" codebase=\"https://fpdownload2.macromedia.com/get/shockwave/cabs/flash/swflash.cab#version=9,0,0,0\">\r\n                                            <param name=\"movie\" value=\"https://s.vnecdn.net/video/flash/vneplayer.swf\">\r\n                                            <param name=\"allowScriptAccess\" value=\"always\" />\r\n                                            <param name=\"quality\" value=\"high\">\r\n                                            <param name=\"bgcolor\" value=\"#000000\">\r\n                                            <param name=\"wmode\" value=\"transparent\">\r\n                                            <param name=\"flashvars\" value=\"xmlPath=&mAuto=true&asseturl=https://s.vnecdn.net/video/flash/assetv3.swf&dynamicview=false&sharemode=false&autoHide=false&tracktype=video&typeview=1&playerid=videoplayer&trackurl=https://d.vnecdn.net/vnexpress/video/video/web/mp4/,240p,360p,480p,,/2018/08/09/quang-nam-mua-rung-cho-vooc-o-1533807048/vne/master.m3u8&thumburl=&tracklink=&adszoneid=&adsTag=&activemode=720&tracktitle=Quảng Nam mua rừng cho voọc ở\">\r\n                                            <param name=\"allowfullscreen\" value=\"true\">\r\n                                            <embed bgcolor=\"#000000\" width=\"100%\" height=\"100%\" name=\"videoplayer_215154\" flashvars=\"xmlPath=&mAuto=true&asseturl=https://s.vnecdn.net/video/flash/assetv3.swf&dynamicview=false&sharemode=false&autoHide=false&tracktype=video&typeview=1&playerid=videoplayer&trackurl=https://d.vnecdn.net/vnexpress/video/video/web/mp4/,240p,360p,480p,,/2018/08/09/quang-nam-mua-rung-cho-vooc-o-1533807048/vne/master.m3u8&thumburl=&tracklink=&adszoneid=&adsTag=&activemode=720&tracktitle=Quảng Nam mua rừng cho voọc ở\" type=\"application/x-shockwave-flash\" allowfullscreen=\"true\" allowscriptaccess=\"always\" wmode=\"transparent\" pluginspage=\"https://get.adobe.com/flashplayer/\" src=\"https://s.vnecdn.net/video/flash/vneplayer.swf\">\r\n                                        </object>\r\n                                    </div>\r\n                                    <![endif]-->\n</div>\n<div class=\"parser_title\" style=\"display:none;\">Quảng Nam mua rừng cho voọc ở</div>\n</div>\n</div>\n</div>\n<!--end video embed-->\n<figcaption class=\"desc_cation\"><div class=\"inner_caption\">\n<em>Video: Ba con voọc được phát hiện sáng 9/8 tại núi Hòn Dồ.</em></div></figcaption></figure></div><p class=\"Normal\">\nNgày 9/8, ông Lê Trí Thanh, Phó chủ tịch Quảng Nam cùng cán bộ kiểm lâm và đại diện Trung tâm bảo tồn đa dạng sinh học Nước Việt Xanh (GreenViet) đến núi Hòn Dồ (xã Tam Mỹ Tây, huyện Núi Thành) – nơi có đàn voọc chà vá chân nâu sinh sống để kiểm tra. Tại đây đoàn đã bắt gặp ba cá thể voọc đang đi ăn.</p><p class=\"Normal\">\nKết thúc buổi thị sát, ông Thanh làm việc với các đơn vị chức năng để nghe giải pháp bảo vệ đàn voọc. Đại diện GreenViet cho biết quần thể voọc tại khu vực núi Hòn Dồ có khoảng 20 con, với ít nhất hai gia đình.</p><table align=\"center\" border=\"0\" cellpadding=\"3\" cellspacing=\"0\" class=\"tplCaption\"><tbody><tr><td>\n<img alt=\"Một cá thể voọc chà vá chân nâu đang đi kiểm thức ăn ở núi Hòn Dồ. Ảnh: Đắc Thành.\" data-natural-width=\"500\" src=\"https://i-vnexpress.vnecdn.net/2018/08/09/anh-vooc-7170-1502331904-8469-1533805771.jpg\"></td>\n</tr><tr><td>\n<p class=\"Image\">\nMột con voọc chà vá chân nâu đang đi kiếm thức ăn ở núi Hòn Dồ. Ảnh: <em>Đắc Thành.</em></p>\n</td>\n</tr></tbody></table><p class=\"Normal\">\nLoài linh trưởng này đang sống trong khu rừng tự nhiên khoảng hơn 10 ha - vốn là một dãy rừng hẹp còn sót lại trên đỉnh núi đá. Đất rẫy trồng cây keo lá tràm nằm ở xung quanh khu này nên đàn voọc bị cô lập với các hệ sinh thái rừng tự nhiên khác với khoảng cách 3-10 km.</p><p class=\"Normal\">\n“Chúng đang bị đe dọa đến sự sinh tồn do thiếu thức ăn, nơi ở, khó chống chịu với thời tiết xấu. Đặc biệt nguy cơ săn bắt, cháy rừng gây ra”, đại diện GreenViet nói và <span>đề xuất mở rộng sinh cảnh sống cho voọc khu vực núi Hòn Dồ với diện tích khoảng 80-100 ha.</span></p><p class=\"Normal\">\nÔng Lê Trí Thanh cũng cho rằng phạm vi sinh sống của đàn voọc quá nhỏ, do vậy cơ quan chức năng<span> cần tuyên truyền cho người dân hiểu về sự nguy cấp của loại linh trưởng này để bảo vệ chúng. Ngoài ra, chính quyền địa phương phải tăng cường các đội, nhóm bảo vệ đàn voọc để chấm dứt tình trạng săn bắn của người dân vùng khác đến.</span></p><table align=\"center\" border=\"0\" cellpadding=\"3\" cellspacing=\"0\" class=\"tplCaption\"><tbody><tr><td>\n<img alt=\"Rừng keo người dân trồng quanh núi khiến nguồn thức ăn cho voọc bị khan hiếm. Ảnh: Đắc Thành.\" data-natural-width=\"500\" src=\"https://i-vnexpress.vnecdn.net/2018/08/09/vooc-6069-1533807572.jpg\"></td>\n</tr><tr><td>\n<p class=\"Image\">\n<span>Rừng keo người dân trồng bao quanh khu vực đàn voọc sinh sống. Ảnh: </span><em>Đắc Thành.</em></p>\n</td>\n</tr></tbody></table><p class=\"Normal\">\n<span>“Tỉnh sẽ lên phương án mua rừng sản xuất của người dân bao quanh khu vực núi Hòn Dồ để đảm bảo quần thể sống của đàn voọc rộng hơn. Từ đó trồng lại rừng để giúp việc di chuyển và đảm bảo thức ăn cho đàn voọc”, ông Thanh nói.</span></p><p class=\"Normal\">\nTrước đó, một số người dân địa phương phản ánh đàn voọc khoảng 20 con sống trên những cụm rừng tự nhiên còn sót lại ở xã Tam Mỹ Tây bị \"lãng quên\".</p><p class=\"Normal\">\nSố lượng quần thể voọc ở khu vực này giảm dần trong nhiều năm qua. Tuy nhiên cơ quan chức năng chưa có những cuộc khảo sát, nghiên cứu bảo tồn cần thiết. Trong khi đó, người dân phá rừng trồng keo khiến rừng tự nhiên không còn, ảnh hưởng đến môi trường sinh sống của voọc.</p><div class=\"box_brief_info\">\n<p class=\"Normal\">\nVoọc chà vá chân xám có tên khoa học Pygathrix cinerea là loài đặc hữu của Việt Nam, phân bố ở khu vực Trung Trường Sơn, trên địa bàn năm tỉnh Quảng Nam, Quảng Ngãi, Bình Định, Kon Tum và Gia Lai. Số lượng quần thể ước khoảng 500 con, thuộc danh sách các loài cực kỳ nguy cấp trong sách đỏ của Liên minh Bảo tồn Thiên nhiên Quốc tế (IUCN), là một trong 25 loài linh trưởng bị đe dọa nhất thế giới.</p>\n</div> </article>', '2018-08-09 22:17:21', NULL, 0, '2018-08-10 15:21:04', 'Quảng Nam sẽ mua rừng cho voọc ở - VnExpress', 'Tỉnh Quảng Nam lên phương án mua lại đất trồng cây keo của người dân để mở rộng khu vực sinh sống tự nhiên của đàn voọc. - VnExpress', 'voọc chà vá chân nâu, bảo tồn, Quảng Nam', b'0');
INSERT INTO `adposts` VALUES (23, 'langtu', '\'Trung ương vừa tính sắp xếp huyện xã, ở địa phương đã có chạy chọt\'', 'Nhiều lãnh đạo cho hay việc sắp xếp lại các huyện, xã khiến cán bộ dôi dư nên vừa qua \"mới làm đề án đã có hiện tượng chạy chọt\".', 9, 'https://i-vnexpress.vnecdn.net/2018/08/09/dacvinh-1533804390-3211-1533806040_180x108.jpg', 'trung-uong-vua-tinh-sap-xep-huyen-xa-o-dia-phuong-da-co-chay-chot', '<article class=\"content_detail fck_detail width_common block_ads_connect\">\n<p class=\"Normal\">\nNgày 9/8, Bộ Nội vụ tổ chức Hội nghị toàn quốc góp ý dự thảo Đề án tổng thể sắp xếp các đơn vị hành chính cấp huyện và cấp xã từ nay đến năm 2021.</p><p class=\"Normal\">\nTheo Đề án, <span>trong 3 năm tới sẽ có khoảng 18 quận, huyện và 637 xã, phường, thị trấn chưa đạt 50% tiêu chuẩn về diện tích tự nhiên và quy mô dân số được sắp xếp lại theo hướng sáp nhập, </span><span>thu gọn để đáp ứng được các quy định hiện hành.</span></p><p class=\"Normal\">\n<span>Tuy nhiên, một số đơn vị chưa đạt tiêu chuẩn sẽ không sáp nhập nếu có yếu tố đặc thù: địa lý biệt lập (hải đảo, cù lao, vùng sâu, vùng xa); truyền thống lịch sử hình thành và ổn định từ trước năm 1945 đến nay; đặc trưng về tín ngưỡng, tôn giáo, phong tục, tập quán, văn hóa...</span></p><p class=\"Normal\">\nÔng Lê Đình Sơn, Bí thư Tỉnh ủy Hà Tĩnh cho rằng t<span>hách thức lớn nhất khi sáp nhập các huyện, xã là cán bộ sẽ dôi dư rất nhiều. \"Ba xã, huyện nhập làm một thì ba bí thư, chủ tịch sẽ chỉ còn một. Sau khi có thông tin này, nhiều người tâm tư nếu sáp nhập thì họ có được làm nữa hay không?”, ông Sơn nói.</span></p><p class=\"Normal\">\nBí thư Tỉnh ủy Nghệ An Nguyễn Đắc Vinh cũng chia sẻ, Trung ương đang làm đề án sắp xếp lại đơn vị hành chính cấp huyện, cấp xã nhưng ở địa phương “đã có hiện tượng chạy chọt, gọi điện trao đổi đủ các thứ”. </p><p class=\"Normal\">\nTrước thực tế khi sắp xếp bộ máy thì trong nội bộ sẽ có vấn đề này kia, nhưng ông Vinh nhấn mạnh Nghệ An \"đã xong đề án của tỉnh và chỉ chờ Bộ Nội vụ ban hành đề án chung là có thể thực hiện được ngay\".</p><p class=\"Normal\">\nBí thư Nghệ An <span>đề nghị Trung ương tính thời gian giải quyết sắp xếp huyện, xã chưa đạt 50% cả hai tiêu chuẩn, sao cho hoàn thành trước khi diễn ra đại hội Đảng bộ cấp xã, huyện vào năm 2020.</span></p><table align=\"center\" border=\"0\" cellpadding=\"3\" cellspacing=\"0\" class=\"tplCaption\"><tbody><tr><td>\n<img alt=\"Bí thư Tỉnh uỷ Nghệ An Nguyễn Đắc Vinh. Ảnh: NTV\" data-natural-width=\"500\" src=\"https://i-vnexpress.vnecdn.net/2018/08/09/dac-vinh-7138-1533806038.jpg\"></td>\n</tr><tr><td>\n<p class=\"Image\">\nBí thư Tỉnh uỷ Nghệ An Nguyễn Đắc Vinh. Ảnh: <em>NTV</em></p>\n</td>\n</tr></tbody></table><p class=\"Normal\">\n<span>Cùng mạch ý kiến trên, ông Trần Văn Tư - Phó bí thư Tỉnh ủy Đồng Nai đề nghị Trung ương ban hành quy định chung trên cả nước về chính sách với những cán bộ nghỉ do dôi dư sau khi sáp nhập huyện, xã. “Phải thống nhất những người nghỉ hưu sớm được hưởng chế độ ra sao. Làm tiếp mấy tháng hoặc mấy năm thì chế độ thế nào. Đừng để xảy ra mất công bằng”, ông Tư nói.</span></p><p class=\"Normal\">\n<span>Bộ trưởng Lê Vĩnh Tân cho hay, số lượng cấp phó, biên chế công chức, viên chức của các cơ quan, đơn vị mới sáp nhập có thể cao hơn bình thường; nhưng có lộ trình đến 2025 phải đảm bảo trở lại đúng quy định. </span></p><p class=\"Normal\">\n<span>\"Những cán bộ dôi dư do sáp nhập sẽ được quan tâm, hỗ trợ, giải quyết chế độ chính sách thỏa đáng\", ông Tân khẳng định.</span></p><p class=\"Normal\">\n<strong>Tuổi thọ Đề án có được 30-50 năm?</strong></p><p class=\"Normal\">\nĐối chiếu với quy định về diện tích và dân số, ông Trương Văn Lắm, Giám đốc Sở Nội vụ TP HCM lo ngại khi có 11 trong tổng số 24 quận, huyện và 226/332 phường (xã) của thành phố sẽ bị sắp xếp lại.</p><p class=\"Normal\">\nVì vậy, ông Lắm đặt vấn đề mục tiêu sáp nhập huyện, xã không thể chỉ vì tinh gọn bộ máy, tinh giản biên chế mà phải phù hợp với điều kiện kinh tế, xã hội thời gian tới.</p><p class=\"Normal\">\n“Không chỉ TP HCM mà hầu hết các đô thị lớn và thành phố trực thuộc Trung ương đều có đơn vị hành chính cấp huyện, cấp xã không đạt tiêu chuẩn. Một quận tại thành phố có gần 800.000 dân, có phường hơn 110.000 dân. Sáp nhập các đơn vị này liệu có giúp phát triển tốt hơn không?”, ông Lắm nêu vấn đề.</p><p class=\"Normal\">\nCũng cho rằng các đơn vị hành chính cần được ổn định để phát triển lâu dài, ông Lê Hữu Khang - Giám đốc Sở Nội vụ Điện Biên nói Việt Nam đã qua nhiều lần <span>chia tách, sáp nhập đơn vị hành chính, do vậy cần có sự </span><span>tổng kết, đánh giá quá trình này ảnh hưởng ra sao đến sự phát triển.</span></p><p class=\"Normal\">\n“Đây là chính sách vĩ mô tầm quốc gia nên không thể vội vàng. Phải tính toán xem đề án này có tuổi thọ được 30-50 năm hay không?”, ông Khang nói.</p><p class=\"Normal\">\nGiải đáp một phần lo lắng của các đại biểu, Phó chủ tịch Quốc hội Uông Chu Lưu lấy dẫn chứng cụ thể quận Hoàn Kiếm ở Hà Nội. “So với quy định, diện tích quận này không bằng tiêu chuẩn một phường. Nhưng Hoàn Kiếm có truyền thống lịch sử thì không thể sáp nhập với quận khác thành đơn vị mới”, ông Lưu nói.</p><p class=\"Normal\">\nCũng theo Phó chủ tịch Quốc hội, địa phương nào nhân dân đồng thuận thì mới sáp nhập chứ không thể \"áp đặt ý chí chủ quan của cơ quan nhà nước\". </p><p class=\"Normal\">\nKết luận hội nghị, Phó thủ tướng Trương Hòa Bình khẳng định q<span>uan điểm chỉ đạo việc sắp xếp đơn vị hành chính cấp huyện, xã là để tinh gọn bộ máy, giảm biên chế nhưng phải đảm bảo kế thừa, ổn định, tạo thuận lợi quản lý nhà nước.</span></p><p class=\"Normal\">\n<span>Huyện, xã không đạt tiêu chuẩn nhưng có yếu tố đặc thù, nếu sáp nhập vào đơn vị khác sẽ bị xáo trộn. </span><span>Do đó, Bộ Nội vụ cần xem xét bổ sung thêm tiêu chí cho phù hợp, </span><span>việc sáp nhập huyện, xã phải tùy điều kiện cụ thể từng địa phương, không thể cơ học, máy móc. </span></p><p class=\"Normal\">\nLãnh đạo Chính phủ cũng thống nhất với đề xuất Ủy ban Thường vụ Quốc hội ban hành nghị quyết riêng về sắp xếp huyện, xã và<span> có chế độ, chính sách trân trọng đóng góp của cán bộ, công chức trong diện sắp xếp chứ không \"vắt chanh bỏ vỏ\".</span></p><div class=\"box_brief_info\">\n<p>\n<span style=\"color:rgb(51,51,51);\">Theo quy định của Ủy ban thường vụ Quốc hội, tiêu chuẩn của huyện miền núi, vùng cao là dân số 80.000 người và diện tích 850 km2 trở lên;</span><span style=\"color:rgb(51,51,51);margin:0px;padding:0px;\"> huyện đồng bằng</span><span style=\"color:rgb(51,51,51);margin:0px;padding:0px;\"> từ 450 km2; quận là từ 35 km2 với dân số ít nhất 150.000 người</span><span style=\"color:rgb(51,51,51);margin:0px;padding:0px;\">.</span></p>\n<p class=\"Normal\" style=\"margin-top:0px;padding:0px;line-height:18px;color:rgb(51,51,51);\">\n<span style=\"margin:0px;padding:0px;\">Còn q</span><span style=\"margin:0px;padding:0px;\">uy mô dân số của x</span><span style=\"margin:0px;padding:0px;\">ã là 5.000 người đến</span><span style=\"margin:0px;padding:0px;\"> 8.000 người trở lên, diện tích</span><span style=\"margin:0px;padding:0px;\"> từ 30 km2.</span></p>\n<p class=\"Normal\" style=\"margin-top:0px;padding:0px;line-height:18px;color:rgb(51,51,51);\">\nĐối chiếu theo quy định trên, hiện có hơn 200 huyện và trên 6.000 xã có một trong hai tiêu chí diện tích hoặc dân số chưa đạt 50% tiêu chuẩn; khoảng 18 quận, huyện và 637 xã, phường, thị trấn có cả hai yếu tố diện tích và dân số chưa đạt 50% so với tiêu chuẩn. Các huyện, xã chưa đạt 50% cả hai tiêu chuẩn sẽ được sắp xếp trước. </p>\n</div> </article>', '2018-08-09 22:17:21', NULL, 0, '2018-08-10 15:21:04', '\'Trung ương vừa tính sắp xếp huyện xã, ở địa phương đã có chạy ch', 'Nhiều lãnh đạo cho hay việc sắp xếp lại các huyện, xã khiến cán bộ dôi dư nên vừa qua &amp;quot;mới làm đề án đã có hiện tượng chạy chọt&amp;quot;. - ', 'Phó thủ tướng Trương Hòa Bình, Bộ Nội vụ, sáp nhập', b'0');
INSERT INTO `adposts` VALUES (24, 'langtu', 'Ngập nước, sụt lún đe dọa TP HCM', 'Các chuyên gia dự báo phần lớn thành phố nằm dưới mực nước biển và trở thành đầm lầy trong khoảng 50 năm nữa.', 9, 'https://i-vnexpress.vnecdn.net/2018/08/09/saigonngap-4-1526738820-680x0-1928-1533802663_180x108.jpg', 'ngap-nuoc-sut-lun-de-doa-tp-hcm', '<article class=\"content_detail fck_detail width_common block_ads_connect\">\n<figure class=\"item_slide_show clearfix\">\n<!--start video embed-->\n<div onclick=\"Video.playVideo(215144)\" id=\"video_parent_215144\" class=\"box_embed_video_parent embed_video_new\" data-vid=\"215144\" data-ratio=\"1\" data-articleoriginal=\"3790081\" data-ads=\"1\" data-license=\"1\" data-duration=\"107\" data-brandsafe=\"0\" data-type=\"0\" data-play=\"0\" data-frame=\"\">\n<div data-vid=\"215144\" class=\"box_img_video embed-container\">\n<img src=\"https://iv.vnecdn.net/vnexpress/images/web/2018/08/09/tp-hcm-thieu-hon-73-000-ty-dong-de-chong-ngap-1533805483_500x300.jpg\" alt=\"TP HCM thiếu hơn 73.000 tỷ đồng đề chống ngập\">\n<div class=\"icon_blockvideo\">\n<div class=\"img_icon\">&nbsp;</div>\n<div class=\"image_icon_center\">&nbsp;</div>\n</div></div>\n<div id=\"embed_video_215144\" class=\"box_embed_video\" style=\"display:none;\">\n<div class=\"bg_overlay_small_unpin\"></div>\n<div class=\"bg_overlay_small\"></div>\n<div class=\"embed-container\">\n<div id=\"video-215144\">\n<div id=\"parser_player_215144\" class=\"media_content\" style=\"display:none;\">\n<div id=\"videoContainter_215144\" class=\"videoContainter\" style=\"width: 100%; height: 100%;\">\n<video id=\"media-video-215144\" preload=\"auto\" playsinline webkit-playsinline src=\"https://d.vnecdn.net/vnexpress/video/video/web/mp4/,240p,360p,480p,,/2018/08/09/tp-hcm-thieu-hon-73-000-ty-dong-de-chong-ngap-1533805483/vne/master.m3u8\" type=\"application/x-mpegURL\" controls style=\"width: 100%; height: 100%;\" data-mode=\"240|360|480|720\" max-mode=\"720\" data-subtitle=\"0\" active-mode=\"720\" ads=\'\' adsconfig=\'{\"adlist\":[{\"type\":\"preroll\",\"tag\":\"https:\\/\\/pubads.g.doubleclick.net\\/gampad\\/live\\/ads?sz=640x360|400x300|480x70|640x480|320x180&iu=\\/27973503\\/video.vnexpress.net\\/Thoisu&impl=s&gdfp_req=1&env=vp&output=vast&unviewed_position_start=1&url=[referrer_url]&description_url=[description_url]&correlator=[timestamp]\",\"skipOffset\":\"00:00:06\",\"duration\":\"00:00:30\"},{\"type\":\"overlay\",\"tag\":\"\",\"script\":\"%3Cscript%3Eif(!window.googletag%7C%7C!googletag.apiReady)%7Bvar%20googletag%3Dgoogletag%7C%7C%7Bcmd%3A%5B%5D%7D%2Csb%3Ddocument.getElementsByTagName(%22script%22)%5B0%5D%2Csa%3Ddocument.createElement(%22script%22)%3Bsa.setAttribute(%22type%22%2C%22text%2Fjavascript%22)%3Bsa.setAttribute(%22src%22%2C%22https%3A%2F%2Fwww.googletagservices.com%2Ftag%2Fjs%2Fgpt.js%22)%3Bsa.setAttribute(%22async%22%2C%22true%22)%3Bsb.parentNode.appendChild(sa)%7D%3Bgoogletag.cmd.push(function()%7Bgoogletag.defineSlot(%22%2F27973503%2Fvnexpreess.net%2FDesktop%2Foverlay%2Foverlay.standard%22%2C%5B%22fluid%22%2C%5B1%2C1%5D%2C%5B480%2C70%5D%5D%2C%22div-gpt-ad-1529985620955-overlay-standard-1%22).addService(googletag.pubads())%3Bgoogletag.pubads().enableSingleRequest()%3Bgoogletag.enableServices()%7D)%3B%3C%2Fscript%3E%3Cdiv%20id%3D%22div-gpt-ad-1529985620955-overlay-standard-1%22%20style%3D%22height%3A70px%3Bwidth%3A480px%3B%22%3E%3Cscript%3Egoogletag.cmd.push(function()%7Bgoogletag.display(%22div-gpt-ad-1529985620955-overlay-standard-1%22)%3B%7D)%3B%3C%2Fscript%3E%3C%2Fdiv%3E\",\"size\":\"480x70\",\"offset\":\"30%\",\"skipOffset\":\"00:00:01\",\"duration\":\"00:00:15\"}]}\' data-ex=\"st=1&bs=0&pt=1\"></video>\n</div>\n</div>\n<!--[if IE]>\r\n                                    <div id=\"flash_player_215144\" class=\"flash_content\" style=\"display:none;\">\r\n                                        <object width=\"100%\" height=\"100%\" classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\" id=\"videoplayer_215144\" codebase=\"https://fpdownload2.macromedia.com/get/shockwave/cabs/flash/swflash.cab#version=9,0,0,0\">\r\n                                            <param name=\"movie\" value=\"https://s.vnecdn.net/video/flash/vneplayer.swf\">\r\n                                            <param name=\"allowScriptAccess\" value=\"always\" />\r\n                                            <param name=\"quality\" value=\"high\">\r\n                                            <param name=\"bgcolor\" value=\"#000000\">\r\n                                            <param name=\"wmode\" value=\"transparent\">\r\n                                            <param name=\"flashvars\" value=\"xmlPath=&mAuto=true&asseturl=https://s.vnecdn.net/video/flash/assetv3.swf&dynamicview=false&sharemode=false&autoHide=false&tracktype=video&typeview=1&playerid=videoplayer&trackurl=https://d.vnecdn.net/vnexpress/video/video/web/mp4/,240p,360p,480p,,/2018/08/09/tp-hcm-thieu-hon-73-000-ty-dong-de-chong-ngap-1533805483/vne/master.m3u8&thumburl=&tracklink=&adszoneid=&adsTag=&activemode=720&tracktitle=TP HCM thiếu hơn 73.000 tỷ đồng đề chống ngập\">\r\n                                            <param name=\"allowfullscreen\" value=\"true\">\r\n                                            <embed bgcolor=\"#000000\" width=\"100%\" height=\"100%\" name=\"videoplayer_215144\" flashvars=\"xmlPath=&mAuto=true&asseturl=https://s.vnecdn.net/video/flash/assetv3.swf&dynamicview=false&sharemode=false&autoHide=false&tracktype=video&typeview=1&playerid=videoplayer&trackurl=https://d.vnecdn.net/vnexpress/video/video/web/mp4/,240p,360p,480p,,/2018/08/09/tp-hcm-thieu-hon-73-000-ty-dong-de-chong-ngap-1533805483/vne/master.m3u8&thumburl=&tracklink=&adszoneid=&adsTag=&activemode=720&tracktitle=TP HCM thiếu hơn 73.000 tỷ đồng đề chống ngập\" type=\"application/x-shockwave-flash\" allowfullscreen=\"true\" allowscriptaccess=\"always\" wmode=\"transparent\" pluginspage=\"https://get.adobe.com/flashplayer/\" src=\"https://s.vnecdn.net/video/flash/vneplayer.swf\">\r\n                                        </object>\r\n                                    </div>\r\n                                    <![endif]-->\n</div>\n<div class=\"parser_title\" style=\"display:none;\">TP HCM thiếu hơn 73.000 tỷ đồng đề chống ngập</div>\n</div>\n</div>\n</div>\n<!--end video embed-->\n<figcaption class=\"desc_cation\"><div class=\"inner_caption\">\n<p class=\"Image\">\nTP HCM tổ chức hội nghị mời gọi đầu tư chống ngập. Video: <em>Đức Huy</em></p>\n</div></figcaption></figure><p class=\"Normal\">\n<span style=\"color:rgb(0,0,0);\">Ngày 9/8, phát biểu tại hội </span>nghị mời gọi đầu tư <em>Các giải pháp chống ngập và xử lý nước thải</em><span style=\"color:rgb(0,0,0);\"> </span><em style=\"color:rgb(0,0,0);\">tại TP HCM</em><span style=\"color:rgb(0,0,0);\">, Bí thư Thứ nhất Đại sứ quán Hà Lan Laurent Umans nói rằng, </span><span style=\"color:rgb(0,0,0);\">mặt đất </span><span style=\"color:rgb(0,0,0);\">thành phố bị sụt lún 7 cm mỗi năm và mức độ này đang tăng nhanh.</span></p><p class=\"Normal\">\n\"Đây là hồi chuông báo động vì đó không đơn giản là một vấn đề. Sự tồn tại của TP HCM đang bị đe dọa. Theo dự báo khoảng 50 năm nữa, một phần lớn thành phố sẽ nằm dưới mực nước biển và trở thành đầm lầy\", ông Laurent cảnh báo.</p><p class=\"Normal\">\nBiến đổi khí hậu làm dâng mực nước biển, chỉ vài mm mỗi năm nhưng về lâu dài là rất đáng kể. Tương tự, sụt lún mỗi năm chỉ vài cm tính trong một thập kỷ thì con số này là không nhỏ. \"Không nên chờ đợi nghiên cứu mà thay vào đó chúng ta cần hành động ngay\", quan chức ngoại giao Hà Lan nói.</p><table align=\"center\" border=\"0\" cellpadding=\"3\" cellspacing=\"0\" class=\"tplCaption\"><tbody><tr><td>\n<img alt=\"Cơn mưa lớn giữa tháng 5 khiến hơn 30 tuyến đường và hàng nghìn nhà dân ở TP HCM ngập nặng. Ảnh: Quỳnh Trần.\" data-natural-width=\"500\" src=\"https://i-vnexpress.vnecdn.net/2018/08/09/saigonngap-4-1526738820-680x0-7240-1533802662.jpg\"></td>\n</tr><tr><td>\n<p class=\"Image\">\nCơn mưa lớn giữa tháng 5 khiến hơn 30 tuyến đường, hàng quán và cả nghìn nhà dân ở TP HCM ngập nặng. Ảnh: <em>Quỳnh Trần.</em></p>\n</td>\n</tr></tbody></table><p class=\"subtitle\">\n73.000 tỷ đồng chống ngập, xử lý nước thải trong 5 năm</p><p class=\"Normal\">\nPhó giám đốc Trung tâm chống ngập TP HCM Nguyễn Hoàng Anh Dũng cho biết, quy hoạch cũ của đô thị Sài Gòn (trước 1975) cho quy mô dân số khoảng 2 triệu người, tương ứng với quy mô hệ thống thoát nước thời điểm đó. Tuy nhiên, dân số của TP HCM hiện khoảng 10 triệu người, chưa kể khách vãng lai - tăng hơn quy hoạch cũ 5 lần nhưng hệ thống cống thoát nước chưa được đầu tư, cải tạo khiến xảy ra tình trạng ngập là tất yếu.</p><p class=\"Normal\">\nNgoài ngập nước do mưa, TP HCM còn chịu ảnh hưởng trực tiếp của thủy triều xâm nhập từ biển Đông thông qua hệ thống sông Sài Gòn - Đồng Nai - Vàm Cỏ Đông. 63% diện tích thành phố có độ cao tự nhiên dưới 1,5 m nên những vị trí thấp hơn đỉnh triều đều bị ngập.</p><p class=\"Normal\">\n\"Biến đổi khí hậu khiến tình hình ngập nước của TP HCM ngày càng nghiêm trọng. Tần suất các trận mưa có vũ lượng lớn, vượt khả năng thoát của cống thoát nước xuất hiện ngày càng nhiều\", ông Dũng nói về nguyên nhân khách quan khiến Sài Gòn ngập nặng.</p><p class=\"Normal\">\nTrong khi đó, <span>Quy hoạch tổng thể hệ thống thoát nước TP HCM đến năm 2020, khu vực trung tâm cần có 6.000 km cống các loại nhưng hiện nay hệ thống cống </span><span>chỉ đạt gần 70% </span><span>là 4.176 km.</span></p><p class=\"Normal\">\nThành phố mới hoàn thành được cơ bản 2 nhà máy xử lý nước thải trên tổng số 12 nhà máy theo quy hoạch; <span>thực hiện được khoảng 64km/149km đê bao ven sông Sài Gòn và 1/10 cống kiểm soát triều lớn (cống Nhiêu Lộc - Thị Nghè), các hạng mục khác đang triển khai. </span></p><p class=\"Normal\">\n<span>\"Như vậy, thành phố cần một nguồn lực rất lớn để tiếp tục đầu tư các dự án chống ngập và xử lý nước thải\", ông Dũng nói và cho biết </span><span>giai đoạn 2016-2020 TP HCM cần gần 73.500 tỷ đồng để đầu tư lĩnh vực chống ngập và xử lý nước thải. T</span><span>rong đó ngân sách thành phố là 16.388 tỷ, ngân sách trung ương 588 tỷ, huy động từ nguồn xã hội hóa 20.283 tỷ và vốn ODA là 36.152 tỷ.</span></p><p class=\"subtitle\">\nXây dựng bản đồ mô phỏng tình trạng ngập</p><p class=\"Normal\">\nTheo Phó chủ tịch UBND TP HCM Trần Vĩnh Tuyến, có nhiều nguyên nhân dẫn đến tình trạng ngập nước ở Sài Gòn. Ngoài vấn đề hạ tầng xuống cấp thì việc phát triển không đúng cũng là nguyên nhân gây ngập. Chiến lược phát triển về hướng biển, về phía Nam nếu không cân nhắc kỹ sẽ gây sụt lún, ngập lụt.</p><p class=\"Normal\">\n\"TP HCM là đô thị chưa hoàn chỉnh. Vì vậy việc giải quyết ngập ở từng vị trí phải xác định rõ nguyên nhân để có giải pháp cụ thể. Thành phố lắng nghe, tiếp thu và có chọn lựa các giải pháp trên cơ sở phải xác định được nguyên nhân gây ngập để giải quyết\", ông Tuyến nói và cho biết trước mắt sẽ điều chỉnh lại quy hoạch thoát nước của thành phố; cũng như có bản đồ mô phỏng tình hình ngập để nhận diện, đánh giá, tìm giải pháp.</p><p class=\"Normal\">\nTại hội nghị, các chuyên gia, doanh nghiệp đã đề xuất nhiều giải pháp, công nghệ mới với hy vọng cùng thành phố chung tay chống ngập, xử lý nước thải như: phát triển không gian điều tiết nước mưa cho đô thị TP HCM; xây dựng hồ điều tiết ngầm; xây dựng hệ thống cống bao và xử lý nước thải tập trung; quản lý nước trong vùng đô thị mật độ cao...</p><p class=\"Normal\">\nĐại diện Cục Quản lý Đấu thầu (Bộ Kế hoạch - Đầu tư) cũng chia sẻ với lãnh đạo TP HCM và các doanh nghiệp về những sửa đổi và điểm mới trong Nghị định 63/2018 của Chính phủ về đầu tư theo hình thức công - tư (PPP). Những bất cập liên quan tới chủ trương đầu tư dự án, nguồn lực tài chính và năng lực cán bộ thực hiện dự án PPP... sẽ được tháo gỡ khi Nghị định này được triển khai.</p><div class=\"box_brief_info\">\n<p class=\"Normal\">\n<strong>TP HCM kêu gọi đầu tư 16 dự án</strong></p>\n<p class=\"Normal\">\n7 dự án xây dựng hệ thống thu gom, nhà máy xử lý nước thải gồm: lưu vực Tây Sài Gòn (7.700 tỷ đồng), lưu vực Bình Tân (9.804 tỷ đồng), lưu vực Tân Hóa Lò Gốm (6.395 tỷ đồng), lưu vực Bắc Sài Gòn 1 (5.544 tỷ đồng), lưu vực Bắc Sài Gòn 2 (5.100 tỷ đồng), lưu vực Rạch Cầu Dừa (5.000 tỷ đồng), lưu vực Tây Bắc (6.000 tỷ đồng).</p>\n<p class=\"Normal\">\n6 dự án cải tạo, nạo vét các tuyến kênh rạch gồm: Xây dựng kè bờ kênh và hạ tầng kỹ thuật kênh Tham Lương - Bến Cát - Rạch Chợ Đệm (8.825 tỷ đồng), Xây dựng hệ thống thoát nước và ngăn triều lưu vực từ cầu Tham Lương đến sông Chợ Đệm (1.097 tỷ đồng), nạo vét trục thoát nước rạch Thủ Đào (522 tỷ đồng), nạo vét trục thoát nước rạch Ông Bé (1.250 tỷ đồng), cải tạo hệ thống kênh Vĩnh Bình (6.184 tỷ đồng).</p>\n<p class=\"Normal\">\n3 dự án đê bao và các cống kiểm soát triều vòng ngoài của TP HCM gồm: cống kiểm soát triều sông Kinh (1.200 tỷ đồng), cống kiểm soát triều rạch Tra (11.122 tỷ đồng), đê bao ven sông Sài Gòn từ Vàm Thuật đến sông Kinh đoạn còn lại (3.400 tỷ đồng).</p>\n</div><p class=\"Normal\" style=\"text-align:right;\">\n<strong>Hữu Nguyên</strong></p> </article>', '2018-08-09 22:17:21', NULL, 0, '2018-08-10 15:21:04', 'Ngập nước, sụt lún đe dọa TP HCM - VnExpress', 'Các chuyên gia dự báo phần lớn thành phố nằm dưới mực nước biển và trở thành đầm lầy trong khoảng 50 năm nữa. - VnExpress', 'càng chống càng ngập, ngập nước kẹt xe ở TP HCM, n', b'0');
INSERT INTO `adposts` VALUES (25, 'langtu', 'Chủ tịch nước giáng cấp hai tướng công an', 'Sau khi bị cách chức Thứ trưởng Công an, ông Bùi Văn Thành bị giáng từ cấp Trung tướng xuống Đại tá.', 9, 'https://i-vnexpress.vnecdn.net/2018/08/09/BuivanthanhvneJPG5526153278591-6661-7227-1533800255_180x108.jpg', 'chu-tich-nuoc-giang-cap-hai-tuong-cong-an', '<article class=\"content_detail fck_detail width_common block_ads_connect\">\n<p class=\"Normal\">\n<span>Ngày 8/8, Chủ tịch nước Trần Đại Quang ký quyết định giáng cấp bậc hàm với ông Trần Việt Tân từ Thượng tướng xuống Trung tướng và ông Bùi Văn Thành từ Trung tướng xuống Đại tá.</span></p><table align=\"center\" border=\"0\" cellpadding=\"3\" cellspacing=\"0\" class=\"tplCaption\"><tbody><tr><td>\n<img alt=\"Ông Bùi Văn Thành. Ảnh: Ngọc Thành. \" data-natural-width=\"500\" src=\"https://i-vnexpress.vnecdn.net/2018/08/09/Buivanthanh-vne-JPG-5526-15327-1847-8838-1533800247.jpg\"></td>\n</tr><tr><td>\n<p class=\"Image\">\nÔng Bùi Văn Thành. Ảnh: <em>Ngọc Thành. </em></p>\n</td>\n</tr></tbody></table><p class=\"Normal\">\nTrước đó<span>, Thủ tướng Nguyễn Xuân Phúc đã cách chức Thứ trưởng Công an đối với ông Bùi Văn Thành và </span><span>xóa tư cách Thứ trưởng Công an giai đoạn 2011-2016 với ông Trần Việt Tân do</span><span> hai ông đã vi phạm rất nghiêm trọng trong công tác và Bộ Chính trị đã kỷ luật về Đảng.</span><span> </span><span>Đồng thời, Thủ tướng gửi tờ trình Chủ tịch nước giáng cấp bậc với hai ông này.</span></p><p class=\"Normal\">\n<span>Ông Bùi Văn Thành và ông Trần Việt Tân bị cách tất cả các chức vụ trong Đảng sau cuộc họp của Bộ Chính trị ngày 28/7.</span></p><p class=\"Normal\">\nBộ Chính trị nêu,<span> c</span><span>á nhân Trung tướng Thành đã vi phạm nguyên tắc tập trung dân chủ, thiếu trách nhiệm, buông lỏng lãnh đạo, quản lý, thiếu kiểm tra, giám sát, để xảy ra nhiều vi phạm tại Tổng cục Hậu cần - Kỹ thuật; vi phạm các quy định về bảo vệ bí mật nhà nước và Quy chế làm việc của Bộ Công an; ký văn bản của Bộ Công an đề xuất bán chỉ định một số cơ sở nhà, đất an ninh không đúng quy định pháp luật; ký một số văn bản không thuộc trách nhiệm được phân công.</span></p><p class=\"Normal\">\nÔng Bùi Văn Thành cũng tự ý ký quyết định cho <a href=\"https://vnexpress.net/tin-tuc/phap-luat/toa-ha-noi-xet-xu-kin-vu-an-lien-quan-ong-phan-van-anh-vu-3780660.html?utm_source=search_vne\">Phan Văn Anh Vũ </a>tham gia đoàn đi nước ngoài và đề nghị cấp hộ chiếu ngoại giao cho Phan Văn Anh Vũ không đúng đối tượng, không đúng tiêu chuẩn.</p><table align=\"center\" border=\"0\" cellpadding=\"3\" cellspacing=\"0\" class=\"tplCaption\"><tbody><tr><td>\n<img alt=\"Ông Trần Việt Tân. Ảnh: CAND.\" data-natural-width=\"500\" src=\"https://i-vnexpress.vnecdn.net/2018/08/09/tran-viet-tan-3624-1532774484-2374-8348-1533800251.jpg\"></td>\n</tr><tr><td>\n<p class=\"Image\">\nÔng Trần Việt Tân. Ảnh: <em>CAND.</em></p>\n</td>\n</tr></tbody></table><p class=\"Normal\">\n<span>Cũng trên cơ sở xem xét tờ trình của Ủy ban Kiểm tra Trung ương, Bộ Chính trị nhận thấy Thượng tướng Trần Việt Tân trong thời gian giữ cương vị Ủy viên Ban chấp hành Đảng bộ Công an Trung ương, Thứ trưởng Công an, đã thiếu trách nhiệm, buông lỏng lãnh đạo, thiếu kiểm tra, giám sát, ký một số văn bản vi phạm quy định về bảo vệ bí mật nhà nước, gây hậu quả rất nghiêm trọng, ảnh hưởng rất xấu đến uy tín của ngành Công an và cá nhân, gây dư luận xấu trong xã hội.</span></p><p class=\"Normal\">\nBộ Chính trị kết luận, những vi phạm của Trung tướng Thành và Thượng tướng Tân gây hậu quả rất nghiêm trọng, ảnh hưởng rất xấu đến uy tín của tổ chức Đảng, ngành Công an và cá nhân, gây dư luận xấu và bức xúc trong xã hội.</p> </article>', '2018-08-09 22:17:21', NULL, 0, '2018-08-10 15:21:04', 'Chủ tịch nước giáng cấp hai tướng công an - VnExpress', 'Sau khi bị cách chức Thứ trưởng Công an, ông Bùi Văn Thành bị giáng từ cấp Trung tướng xuống Đại tá. - VnExpress', 'Bùi Văn Thành, giáng chức', b'0');
INSERT INTO `adposts` VALUES (26, 'langtu', 'Cá hải tượng 30 kg mắc lưới nông dân ở sông Vàm Cỏ Đông', 'Thăm lưới thả ở sông, anh nông dân ở Tây Ninh phát hiện dính con cá lạ to, vảy đỏ, và mất cả giờ mới đưa được về nhà.', 9, 'https://i-vnexpress.vnecdn.net/2018/08/09/cahaituong1-1533792746-4396-1533793061_180x108.jpg', 'ca-hai-tuong-30-kg-mac-luoi-nong-dan-o-song-vam-co-dong', '<article class=\"content_detail fck_detail width_common block_ads_connect\">\n<p class=\"Normal\">\n<span>Những ngày qua, nhiều người dân kéo đến nhà anh Huỳnh Văn Nam (28 tuổi, xã Cẩm Giang, huyện Gò Dầu, tỉnh Tây Ninh) để xem cá hải tượng 30 kg được bắt trên sông Vàm Cỏ Đông.</span></p><table align=\"center\" border=\"0\" cellpadding=\"3\" cellspacing=\"0\" class=\"tplCaption\"><tbody><tr><td>\n<img alt=\"Anh Nam và con cá hải tượng 30 kg bắt được trên sông Vàm Cỏ Đông. Ảnh: Mai Linh\" data-natural-width=\"500\" src=\"https://i-vnexpress.vnecdn.net/2018/08/09/ca-hai-tuong-1-2402-1533793061.jpg\"></td>\n</tr><tr><td>\n<p class=\"Image\">\nAnh Nam và con cá hải tượng bắt được trên sông Vàm Cỏ Đông. Ảnh: <em>Mai Linh.</em></p>\n</td>\n</tr></tbody></table><p class=\"Normal\">\nAnh Nam cho biết, ngày 5/8, anh đi thăm dớn (dụng cụ bắt cá bằng lưới) ở sông, phát hiện con cá lạ mắc lưới. Do con cá to vùng vẫy nên anh phải mất cả giờ mới mang được lên ghe và chở về nhà.</p><p class=\"Normal\">\n\"Lúc đầu tôi cứ tưởng con trăn, nhưng khi kéo lên, thấy có nhiều vảy đỏ mới biết là cá hải tượng\", anh Nam kể <span>và cho biết, gia đình sinh sống bằng nghề đánh cá nhiều đời trên sông, nhưng đây là lần đầu tiên bắt được loài cá này.</span></p><p class=\"Normal\">\nCá dài hơn một mét, nặng 30 kg, được anh nuôi trong hồ tạm trước nhà.<span> Một số người đến xem đã hỏi mua con cá với giá hơn 20 triệu đồng nhưng</span><span> anh không bán.</span></p><table align=\"center\" border=\"0\" cellpadding=\"3\" cellspacing=\"0\" class=\"tplCaption\"><tbody><tr><td>\n<img alt=\"Anh Nam đã làm cái hồ tạm trước nhà để nuôi cá. Ảnh: Mai Linh.\" data-natural-width=\"500\" src=\"https://i-vnexpress.vnecdn.net/2018/08/09/ca-hai-tuong-6687-1533793061.jpg\"></td>\n</tr><tr><td>\n<p class=\"Image\">\nAnh Nam đã làm cái hồ tạm trước nhà để nuôi cá. Ảnh: <em>Mai Linh.</em></p>\n</td>\n</tr></tbody></table><p class=\"Normal\">\nCá hải tượng có tên khoa học là Arapaima, là loài cá nước ngọt, sống nhiều ở vùng nhiệt đới Nam Mỹ. Đây là một trong những loài cá nước ngọt lớn nhất trên thế giới, có thể dài 3 m và nặng hàng trăm kg.</p><p class=\"Normal\">\n<span>Năm 2017, nông dân tại Tiền Giang cũng bắt được con cá hải tượng <a href=\"https://video.vnexpress.net/tin-tuc/600s-thoi-su/nong-dan-mien-tay-bat-duoc-ca-hai-tuong-150-kg-3540796.html?utm_source=search_vne\">dài 2,2 m</a>, nặng khoảng 150 kg dưới kênh gần nhà.</span></p><p class=\"Normal\" style=\"text-align:right;\">\n<strong>Mai Linh</strong></p> </article>', '2018-08-09 22:17:21', NULL, 0, '2018-08-10 15:21:04', 'Cá hải tượng 30 kg mắc lưới nông dân ở sông Vàm Cỏ Đông - VnExpre', 'Thăm lưới thả ở sông, anh nông dân ở Tây Ninh phát hiện dính con cá lạ to, vảy đỏ, và mất cả giờ mới đưa được về nhà. - VnExpress', 'cá hải tượng, sông Vàm Cỏ, Tây Ninh', b'0');
INSERT INTO `adposts` VALUES (27, 'langtu', 'Việt Nam biên soạn Sách trắng quốc phòng 2018', 'Thượng tướng Nguyễn Chí Vịnh đề nghị cơ quan chức năng phát hành Sách trắng quốc phòng Việt Nam trong thời gian sớm nhất.', 9, 'https://i-vnexpress.vnecdn.net/2018/08/09/image001-1533799275-9714-1533800375_180x108.jpg', 'viet-nam-bien-soan-sach-trang-quoc-phong-2018', '<article class=\"content_detail fck_detail width_common block_ads_connect\">\n<p class=\"Normal\">\nNgày 8/8, Thượng tướng Nguyễn Chí Vịnh, Thứ trưởng Quốc phòng đã chủ trì hội nghị Ban chỉ đạo về biên soạn Sách trắng quốc phòng Việt Nam năm 2018.</p><p class=\"Normal\">\nCổng thông tin Bộ Quốc phòng cho hay, Sách trắng lần này được cập nhật, bổ sung tình hình thế giới, khu vực và trong nước; những phát triển mới trong xây dựng quân đội nhân dân Việt Nam và dân quân tự vệ.</p><p class=\"Normal\">\nCuốn sách sẽ công khai đường lối chính sách quân sự, quốc phòng của Việt Nam; đồng thời là tài liệu chính thức sử dụng để phục vụ công tác đối ngoại quốc phòng; giáo dục về quốc phòng, đường lối quân sự của Đảng, chính sách quốc phòng của Nhà nước cho các cấp, ngành và toàn dân, nhất là thế hệ trẻ.</p><p class=\"Normal\">\nPhát biểu tại hội nghị, Thượng tướng Nguyễn Chí Vịnh nhấn mạnh, Sách trắng quốc phòng Việt Nam có ý nghĩa rất quan trọng, do vậy các cơ quan chức năng, tổ biên tập cần tiếp tục tiếp thu ý kiến đóng góp của thành viên Ban chỉ đạo để bảo đảm đúng quy trình, tiến độ được giao; phấn đấu phát hành sách trắng quốc phòng Việt Nam trong thời gian sớm nhất.</p><table align=\"center\" border=\"0\" cellpadding=\"3\" cellspacing=\"0\" class=\"tplCaption\"><tbody><tr><td>\n<img alt=\"Thứ trưởng Quốc phòng Nguyễn Chí Vịnh công bố Sách trắng 2009. Ảnh tư liệu.\" data-natural-width=\"500\" src=\"https://i-vnexpress.vnecdn.net/2018/08/09/b9de021b567d2d797ed8fbf8eac4ba-9870-2321-1533800375.jpg\"></td>\n</tr><tr><td>\n<p class=\"Image\">\nThứ trưởng Quốc phòng Nguyễn Chí Vịnh công bố Sách trắng 2009. <em>Ảnh tư liệu.</em></p>\n</td>\n</tr></tbody></table><p class=\"Normal\">\n<span>Việt Nam đã ba lần xuất bản sách trắng quốc phòng vào các năm 1998, 2004 và 2009.</span></p><p class=\"Normal\">\nTrong đó, sách trắng quốc phòng 2009 gồm 3 phần (tình hình an ninh và chính sách quốc phòng; xây dựng nền quốc phòng; xây dựng QĐND, dân quân tự vệ) cùng 11 phụ lục kèm theo như sơ đồ tổ chức Bộ Quốc phòng; cơ quan Tuỳ viên Quốc phòng Việt Nam tại nước ngoài; hệ thống học viện, nhà trường, viện nghiên cứu chủ yếu của quân đội...</p><p class=\"Normal\">\nTheo Sách trắng này, QĐND Việt Nam bao gồm bộ đội chủ lực và bộ đội địa phương với quân số khoảng 450.000 người.</p><p class=\"Normal\" style=\"text-align:right;\">\n<strong>Xuân Hoa</strong></p> </article>', '2018-08-09 22:17:21', NULL, 0, '2018-08-10 15:21:04', 'Việt Nam biên soạn Sách trắng quốc phòng 2018 - VnExpress', 'Thượng tướng Nguyễn Chí Vịnh đề nghị cơ quan chức năng phát hành Sách trắng quốc phòng Việt Nam trong thời gian sớm nhất. - VnExpress', 'Sách trắng Quốc phòng Việt Nam 2018, Thượng tướng ', b'0');
INSERT INTO `adposts` VALUES (28, 'langtu', 'Ban quản lý chợ Sóc Sơn có nhiều sai phạm trong phòng cháy', 'Chợ Sóc Sơn (Hà Nội) không có nhân viên được phân công vận hành, sửa chữa máy bơm chữa cháy cố định.', 9, 'https://i-vnexpress.vnecdn.net/2018/08/09/315295500081200x07896153008384-5251-8554-1533797946_180x108.jpg', 'ban-quan-ly-cho-soc-son-co-nhieu-sai-pham-trong-phong-chay', '<article class=\"content_detail fck_detail width_common block_ads_connect\">\n<p class=\"Normal\">\nNgày 9/8, Công an TP Hà Nội đã ra kết luận về sai phạm của Ban quản lý chợ Sóc Sơn liên quan đến vụ cháy chợ cách đây gần hai tháng.</p><p class=\"Normal\">\nTheo đó, Ban quản lý chợ không xuất trình được sổ theo dõi hoạt động của máy bơm chữa cháy cố định; không phân công người làm công tác vận hành, sửa chữa máy bơm thường xuyên.</p><p class=\"Normal\">\n<span>Bình chứa nhiên liệu của máy bơm chữa cháy cạn hở đáy, máy không trong tình trạng thường trực nên khi xảy ra cháy thì máy không hoạt động.</span></p><table align=\"center\" border=\"0\" cellpadding=\"3\" cellspacing=\"0\" class=\"tplCaption\"><tbody><tr><td>\n<img alt=\"Vụ cháy chợ Sóc Sơn ngày 21/6 gây thiệt hại 47 tỷ đồng. Ảnh: Gia Chính\" data-natural-width=\"500\" src=\"https://i-vnexpress.vnecdn.net/2018/08/09/3-1529550008-1200x0-7896-15300-8384-7572-1533791127.jpg\"></td>\n</tr><tr><td>\n<p class=\"Image\">\nHiện trường vụ cháy chợ Sóc Sơn ngày 21/6. Ảnh: <em>Gia Chính</em></p>\n</td>\n</tr></tbody></table><p class=\"Normal\">\n<span>Cũng theo kết luận của công an, Ban quản lý chợ đã đề nghị UBND huyện Sóc Sơn cho xây dựng bể nước phòng cháy và chữa cháy 200 m3; huyện yêu cầu giải tỏa khu vực 2 bể nước để lấy mặt bằng xây dựng nhưng đơn vị này không thực hiện. </span></p><p class=\"Normal\">\n<span>Ngoài ra, Ban quản lý chợ chưa trang bị về hệ thống đèn chiếu sáng, đèn báo sự cố đầy đủ cho cả khu vực; chưa mua bảo hiểm cháy nổ bắt buộc... </span><span>Năm 2017 và 2018, phòng Cảnh sát cứu hoả số 5 đã kiểm tra, yêu cầu khắc phục một số thiếu sót trong công tác phòng cháy nhưng đơn vị không thực hiện.</span></p><table align=\"center\" border=\"0\" cellpadding=\"3\" cellspacing=\"0\" class=\"tplCaption\"><tbody><tr><td>\n<img alt=\"Tiểu thương liên tục kéo lên UBND huyện Sóc Sơn yêu cầu làm rõ vụ việc. Ảnh: Gia Chính\" data-natural-width=\"500\" src=\"https://i-vnexpress.vnecdn.net/2018/08/09/1-2-2396-1529564734-4281-1533791127.jpg\"></td>\n</tr><tr><td>\n<p class=\"Image\">\nTiểu thương nhiều lần kéo lên UBND huyện Sóc Sơn yêu cầu làm rõ vụ cháy. Ảnh: <em>Gia Chính</em></p>\n</td>\n</tr></tbody></table><p class=\"Normal\">\n<span>Ngày 11/7, Cơ quan cảnh sát điều tra Công an huyện Sóc Sơn đã ra quyết định khởi tố vụ án hình sự “Vi phạm quy định về Phòng cháy Chữa cháy” và đang làm </span><span>rõ vụ việc.</span></p><p class=\"Normal\">\nVụ cháy chợ Sóc Sơn ngày 21/6 khiến 223 trong tổng số 662 sạp hàng với diện tích 1.000 m2, chủ yếu kinh doanh giày dép, vải, quần áo bị cháy rụi. <span>Lực lượng chức năng đã huy động 14 xe chữa cháy với 800 chiến sĩ từ nhiều đơn vị đến ứng cứu. UBND huyện Sóc Sơn bố trí chợ tạm với 250 gian hàng cách vị trí chợ cũ khoảng 50 m để các tiểu thương tạm thời kinh doanh.</span></p><p class=\"Normal\">\nNgày 26/6, UBND huyện Sóc Sơn đã tiến hành đình chỉ công tác đối với ông Ngô Văn Giang và ông Phạm Đức Nam lần lượt là Trưởng và phó Ban quản lý chợ.</p><p class=\"Normal\" style=\"text-align:right;\">\n<strong>Gia Chính</strong></p> </article>', '2018-08-09 22:17:21', NULL, 0, '2018-08-10 15:21:04', 'Ban quản lý chợ Sóc Sơn có nhiều sai phạm trong phòng cháy - VnEx', 'Chợ Sóc Sơn (Hà Nội) không có nhân viên được phân công vận hành, sửa chữa máy bơm chữa cháy cố định. - VnExpress', 'cháy chợ, Sóc Sơn, công an', b'0');
INSERT INTO `adposts` VALUES (29, 'langtu', 'Ông Lê Mạnh Hùng làm Phó ban Tuyên giáo Trung ương', 'Tân Phó ban Tuyên giáo Trung ương trưởng thành từ công tác Đoàn và từng có hơn 2 năm làm Phó bí thư Tỉnh ủy Yên Bái.', 9, 'https://i-vnexpress.vnecdn.net/2018/08/09/onghung11533788878width600heig-6403-6789-1533792227_180x108.jpg', 'ong-le-manh-hung-lam-pho-ban-tuyen-giao-trung-uong', '<article class=\"content_detail fck_detail width_common block_ads_connect\">\n<p class=\"Normal\">\nSáng 9/8, Ban tuyên giáo Trung ương tổ chức hội nghị công bố và trao quyết định của Ban bí thư Trung ương Đảng về công tác cán bộ. </p><p class=\"Normal\">\n<span>Theo đó, ông Lê Mạnh Hùng thôi giữ chức Phó bí thư thường trực Đảng ủy Khối các cơ quan Trung ương nhiệm kỳ 2015-2020 và được điều động, bổ nhiệm giữ chức Phó trưởng ban Tuyên giáo Trung ương.</span></p><p class=\"Normal\">\nChúc mừng ông Lê Mạnh Hùng, ông Võ Văn Thưởng - Trưởng ban Tuyên giáo Trung ương khẳng định điều này thể hiện sự quan tâm của cấp trên với công việc của Ban trong giai đoạn hiện nay.</p><table align=\"center\" border=\"0\" cellpadding=\"3\" cellspacing=\"0\" class=\"tplCaption\"><tbody><tr><td>\n<img alt=\"Ông Lê Mạnh Hùng (bìa phải). Ảnh: TG\" data-natural-width=\"500\" src=\"https://i-vnexpress.vnecdn.net/2018/08/09/LMH-5938-1533792227.jpg\"></td>\n</tr><tr><td>\n<p class=\"Image\">\nÔng Lê Mạnh Hùng (bìa phải). Ảnh: <em>TG</em></p>\n</td>\n</tr></tbody></table><p class=\"Normal\">\nÔng Thưởng mong muốn tân Phó ban với quá trình trưởng thành từ cơ sở, đảm đương nhiều vị trí công tác khác nhau, sẽ tiếp tục nỗ lực cùng tập thể lãnh đạo, cán bộ, nhân viên Ban Tuyên giáo Trung ương hoàn thành tốt công việc được giao.</p><p class=\"Normal\">\nChia sẻ đây là vinh dự cũng như trách nhiệm to lớn của bản thân, ông Lê Mạnh Hùng mong lãnh đạo, các đơn vị, cán bộ, nhân viên của Ban giúp đỡ, tạo điều kiện để hoàn thành tốt nhiệm vụ.</p><p class=\"Normal\">\nVới quyết định trên, hiện Ban tuyên giáo Trung ương có 7 Phó ban cả chuyên trách và kiêm nhiệm.</p><p class=\"Normal\">\n<span>Cũng theo quyết định của Ban bí thư, ông Trương Xuân Cừ - Phó trưởng Ban chỉ đạo Tây Bắc được chỉ định giữ chức Phó bí thư Đảng ủy Khối các cơ quan Trung ương nhiệm kỳ 2015 - 2020.</span></p><div class=\"box_brief_info\">\n<p class=\"Normal\">\nÔng Lê Mạnh Hùng sinh năm 1961, quê ở tỉnh Phú Thọ; từng có hơn 17 năm làm công tác tại tỉnh Vĩnh Phú và tỉnh Phú Thọ. <span>Sau thời gian là Bí thư Tỉnh Đoàn Vĩnh Phú và Tỉnh Đoàn Phú Thọ, ông làm Bí thư rồi Bí thư thường trực Trung ương Đoàn trong 7 năm; hơn 2 năm làm Phó bí thư Tỉnh ủy Yên Bái.</span></p>\n<p class=\"Normal\">\nTừ năm 2010 đến nay, ông Hùng làm Phó bí thư rồi Phó bí thư thường trực Đảng ủy Khối các cơ quan Trung ương. </p>\n</div><p style=\"text-align:right;\">\n<strong>Xuân Hoa</strong></p> </article>', '2018-08-09 22:17:21', NULL, 0, '2018-08-10 15:21:04', 'Ông Lê Mạnh Hùng làm Phó ban Tuyên giáo Trung ương - VnExpress', 'Tân Phó ban Tuyên giáo Trung ương trưởng thành từ công tác Đoàn và từng có hơn 2 năm làm Phó bí thư Tỉnh ủy Yên Bái. - VnExpress', 'Lê Mạnh Hùng, Phó bí thư Đảng ủy khối, Phó ban tuy', b'0');
INSERT INTO `adposts` VALUES (30, 'langtu', 'Bò bị tông chết, chủ không dám nhận vì sợ phạt', 'Chiếc ôtô 5 chỗ hư hỏng nặng sau khi tông phải con bò trên quốc lộ, chủ gia súc không dám đến nhận vì sợ bị phạt.', 9, 'https://i-vnexpress.vnecdn.net/2018/08/09/tongchetbo1-1533777024-3144-1533777281_180x108.jpg', 'bo-bi-tong-chet-chu-khong-dam-nhan-vi-so-phat', '<article class=\"content_detail fck_detail width_common block_ads_connect\">\n<p class=\"Normal\">\n<span>Khoảng 23h ngày 8/8, ôtô Mazda 5 chỗ chạy trên quốc lộ</span>1A theo hướng Nam Bắc, khi đến đoạn qua phường Kỳ Trinh (thị xã Kỳ Anh, Hà Tĩnh) thì tông trúng một con bò đang đi sang đường.</p><p class=\"Normal\">\nCú tông mạnh khiến con bò nặng khoảng 80 kg văng 30 m, chết tại chỗ. Ôtô bị móp phần đầu, hư hỏng nặng, tài xế may mắn không bị thương. Tại<span> hiện trường vệt dầu và máu loang lổ. Nhiều người dân hiếu kỳ đã ra chứng kiến sự việc.</span></p><table align=\"center\" border=\"0\" cellpadding=\"3\" cellspacing=\"0\" class=\"tplCaption\"><tbody><tr><td>\n<img alt=\"Con bò bị ô tô 5 chỗ tông chết. Ảnh: Đ.H\" data-natural-width=\"500\" src=\"https://i-vnexpress.vnecdn.net/2018/08/09/tong-chet-bo-2-7120-1533777280.jpg\"></td>\n</tr><tr><td>\n<p class=\"Image\">\n<span>Con bò bị ô tô 5 chỗ tông chết. Ảnh: </span><em>Đ.H</em></p>\n</td>\n</tr></tbody></table><p class=\"Normal\">\n<span>Một lãnh đạo phường Kỳ Trinh cho biết, sau sự việc, chính quyền đã thông báo trên loa phát thanh cho người dân trong xã và địa bàn lân cận biết để tới nhận bò song không có hồi âm.</span></p><p class=\"Normal\">\n\"Vì không tìm được chủ vật nuôi, chúng tôi đã thành lập hội đồng, hóa giá con bò 4 triệu đồng cho một hộ dân để họ giết mổ, nhằm đảm bảo vệ sinh môi trường. Số tiền được nộp vào kho bạc\", lãnh đạo phường Kỳ Trinh nói.</p><table align=\"center\" border=\"0\" cellpadding=\"3\" cellspacing=\"0\" class=\"tplCaption\"><tbody><tr><td>\n<img alt=\"Ôtô 5 chỗ hư hỏng nặng sau khi tông chết con bò. Ảnh: Đ.H\" data-natural-width=\"500\" src=\"https://i-vnexpress.vnecdn.net/2018/08/09/tong-chet-bo-1-3720-1533777281.jpg\"></td>\n</tr><tr><td>\n<p class=\"Image\">\nÔtô 5 chỗ hư hỏng nặng sau khi tông chết con bò. Ảnh: <em>Đ.H</em></p>\n</td>\n</tr></tbody></table><p class=\"Normal\">\nNhà chức trách địa phương cho hay, lâu nay trên địa bàn xảy ra nhiều trường hợp trâu bò bị tông chết trên quốc lộ và thông thường không ai đến nhận.</p><p class=\"Normal\">\n\"Số tiền nộp phạt thả rông trâu bò chỉ trên dưới 100.000 đồng, nhưng khả năng<span> phải đền bù hư hỏng của ôtô rất lớn nên không ai dám đứng ra nhận là chủ nhân của vật nuôi\", lãnh đạo phường Kỳ Trinh nói.</span></p> </article>', '2018-08-09 22:17:21', NULL, 0, '2018-08-10 15:21:04', 'Bò bị tông chết, chủ không dám nhận vì sợ phạt - VnExpress', 'Chiếc ôtô 5 chỗ hư hỏng nặng sau khi tông phải con bò trên quốc lộ, chủ gia súc không dám đến nhận vì sợ bị phạt. - VnExpress', 'một con bò bị tông chết, chủ nhân không dám nhận v', b'0');
INSERT INTO `adposts` VALUES (31, 'langtu', 'Cháy 3 căn nhà ở Đà Lạt, một người bị thương', 'Đám cháy bùng lên dữ dội trong đêm ở khu nhà gỗ giữa trung tâm Đà Lạt khiến người dân trong khu vực náo loạn.', 9, 'https://i-vnexpress.vnecdn.net/2018/08/09/chaynha-1533784094-8246-1533784310_180x108.jpg', 'chay-3-can-nha-o-da-lat-mot-nguoi-bi-thuong', '<article class=\"content_detail fck_detail width_common block_ads_connect\">\n<table align=\"center\" border=\"0\" cellpadding=\"3\" cellspacing=\"0\" class=\"tplCaption\"><tbody><tr><td>\n<img alt=\"Cảnh sát cứu hỏa dập tắt đám cháy. Ảnh:\" data-natural-width=\"500\" src=\"https://i-vnexpress.vnecdn.net/2018/08/09/chay-nha-9254-1533784310.jpg\"></td>\n</tr><tr><td>\n<p class=\"Image\">\nCảnh sát cứu hỏa dập tắt đám cháy. Ảnh: <em>Duy Khôi.</em></p>\n</td>\n</tr></tbody></table><p class=\"Normal\">\nTối 8/8, lửa bất ngờ bốc lên tại căn nhà gỗ 2 tầng <span>trên đường Trại Mát (TP Đà Lạt). </span><span>Phát hiện, người dân xung quanh phá cửa, giải cứu người con trai của chủ nhà ra ngoài trong tình trạng bị bỏng. </span></p><p class=\"Normal\">\nDo ngôi nhà chứa nhiều vật dụng dễ cháy nên lửa lan nhanh, khiến mọi nỗ lực cứu chữa tại chỗ của người dân bất thành. Đám cháy bén sang <span>những căn nhà gỗ xung quanh.</span></p><p class=\"Normal\">\nHàng chục Cảnh sát PCCC Lâm Đồng cùng nhiều xe cứu hỏa đến hiện trường dập tắt đám cháy. Hỏa hoạn đã thiêu rụi 3 căn nhà cùng nhiều tài sản của người dân.</p><p class=\"Normal\">\nNguyên nhân đang được điều tra.</p><p class=\"Normal\" style=\"text-align:right;\">\n<strong>Duy Khôi</strong></p> </article>', '2018-08-09 22:17:21', NULL, 0, '2018-08-10 15:21:04', 'Cháy 3 căn nhà ở Đà Lạt, một người bị thương - VnExpress', 'Đám cháy bùng lên dữ dội trong đêm ở khu nhà gỗ giữa trung tâm Đà Lạt khiến người dân trong khu vực náo loạn. - VnExpress', 'cháy nhà, 3 căn nhà bị cháy, Đà Lạt', b'0');
INSERT INTO `adposts` VALUES (32, 'langtu', '5 nhiệm vụ ưu tiên xây dựng Chính phủ điện tử', 'Từ nay đến 2019, các nghị định về chia sẻ dữ liệu, bảo vệ dữ liệu cá nhân, xác thực điện tử... sẽ được xem xét ban hành.', 9, 'https://i-vnexpress.vnecdn.net/2018/08/09/159258-1533779720-4833-1533779723_180x108.jpg', '5-nhiem-vu-uu-tien-xay-dung-chinh-phu-dien-tu', '<article class=\"content_detail fck_detail width_common block_ads_connect\">\n<p class=\"Normal\">\nNgày 8/8, Bộ trưởng, Chủ nhiệm Văn phòng Chính phủ Mai Tiến Dũng cho biết cơ quan này đang chủ trì xây dựng dự thảo Nghị quyết mới về một số nhiệm vụ, giải pháp trọng tâm phát triển Chính phủ điện tử giai đoạn 2018-2020, định hướng đến năm 2025.</p><p class=\"Normal\">\n\"Đây sẽ là định hướng cụ thể để triển khai các nhiệm vụ xây dựng Chính phủ điện tử hướng tới nền kinh tế số, xã hội số trong bối cảnh cách mạng công nghiệp 4.0 đang diễn ra mạnh mẽ trên toàn cầu\", ông Dũng nhấn mạnh.</p><p class=\"Normal\">\nTheo ông Dũng, trong 3 năm tới, Chính phủ tập trung vào 5 nhóm nhiệm vụ ưu tiên. Trước hết là đẩy nhanh việc xây dựng, hoàn thiện thể chế tạo cơ sở pháp lý đầy đủ, toàn diện cho việc triển khai, xây dựng phát triển Chính phủ điện tử.</p><p class=\"Normal\">\nCụ thể, từ nay đến 2019, Chính phủ dự kiến xem xét, ban hành các Nghị định về chia sẻ dữ liệu; bảo vệ dữ liệu cá nhân; xác thực điện tử; chế độ báo cáo giữa các cơ quan hành chính Nhà nước...</p><p class=\"Normal\">\nCác bộ ngành liên quan đang khẩn trương hoàn thiện để Chính phủ xem xét, ban hành Nghị định về đầu tư ứng dụng công nghệ thông tin phù hợp với đặc thù của lĩnh vực này. Trong thời gian tới, Luật Chính phủ điện tử và các văn bản hướng dẫn cũng sẽ được nghiên cứu, đề xuất xây dựng để bảo đảm hành lang pháp lý phát triển Chính phủ điện tử dựa trên dữ liệu mở, ứng dụng các công nghệ mới hướng tới nền kinh tế số, xã hội số.</p><table align=\"center\" border=\"0\" cellpadding=\"3\" cellspacing=\"0\" class=\"tplCaption\"><tbody><tr><td>\n<img alt=\"Bộ trưởng, Chủ nhiệm Văn phòng Chính phủ Mai Tiến Dũng. Ảnh: VGP\" data-natural-width=\"500\" src=\"https://i-vnexpress.vnecdn.net/2018/08/09/Bo-truong-Dung-phat-bieu-1-1-4657-1533779336.jpg\"></td>\n</tr><tr><td>\n<p class=\"Image\">\nBộ trưởng, Chủ nhiệm Văn phòng Chính phủ Mai Tiến Dũng. Ảnh: <em>VGP</em></p>\n</td>\n</tr></tbody></table><p class=\"Normal\">\nCác nhóm nhiệm vụ tiếp theo bao gồm việc hoàn thành hệ thống cơ sở dữ liệu quốc gia mang tính chất nền tảng, đặc biệt là cơ sở dữ liệu quốc gia về dân cư, đất đai...; thiết lập các ứng dụng phục vụ người dân, doanh nghiệp và phục vụ quản lý điều hành của Chính phủ.</p><p class=\"Normal\">\nÔng Dũng cho biết, Văn phòng Chính phủ và các bộ, ngành, địa phương đang tích cực trong việc xây dựng cổng dịch vụ công quốc gia và triển khai Hệ thống thông tin một cửa điện tử kết nối cổng dịch vụ công của từng đơn vị.</p><p class=\"Normal\">\nCùng với đó, để phục vụ việc quản lý, điều hành của Chính phủ, thời gian tới, các hệ thống thông tin không giấy tờ; hệ thống điện tử về tham vấn chính sách; hệ thống thông tin báo cáo quốc gia và tiến tới là Trung tâm chỉ đạo, điều hành của Chính phủ, Thủ tướng đang được tập trung nghiên cứu, thiết lập.</p><p class=\"Normal\">\nChính phủ cũng sẽ rà soát, sắp xếp lại và huy động mọi nguồn lực cả về tài chính và con người; phát huy vai trò người đứng đầu, nâng cao hiệu quả thực thi và trách nhiệm giải trình.</p><p class=\"Normal\">\n\"Các nhiệm vụ triển khai Chính phủ điện tử sẽ được đánh giá gắn liền với trách nhiệm cá nhân người đứng đầu từng bộ, ngành, địa phương\", ông Dũng nói.</p><div class=\"box_brief_info\">\n<p>\n<span style=\"color:rgb(0,0,0);\">Theo ông Mai Tiến Dũng, bên cạnh những kết quả bước đầu quan trọng thời gian qua, v</span><span style=\"color:rgb(0,0,0);\">ị trí của Việt Nam trong Bảng xếp hạng Chỉ số phát triển Chính phủ điện tử của Liên Hợp Quốc vẫn ở mức trung bình. Theo báo cáo mới nhất của Liên Hợp Quốc, 2 năm qua, Việt Nam tăng 1 bậc, đang xếp thứ 88 trong tổng số 193 quốc gia và lãnh thổ được đánh giá. Trong khu vực ASEAN, Việt Nam chỉ được xếp hạng khiêm tốn ở vị trí thứ 6.</span></p>\n</div> </article>', '2018-08-09 22:17:21', NULL, 0, '2018-08-10 15:21:04', '5 nhiệm vụ ưu tiên xây dựng Chính phủ điện tử - VnExpress', 'Từ nay đến 2019, các nghị định về chia sẻ dữ liệu, bảo vệ dữ liệu cá nhân, xác thực điện tử... sẽ được xem xét ban hành. - VnExpress', 'Chính phủ điện tử, ông Mai Tiến Dũng, nền kinh tế ', b'0');
INSERT INTO `adposts` VALUES (33, 'langtu', 'Đà Lạt đề xuất xây dựng bãi đậu xe 7 tầng giữa trung tâm', 'Bãi xe có 3 tầng hầm và 4 tầng nổi, khi hoàn thành sẽ góp phần giải quyết tình trạng kẹt xe ở TP Đà Lạt mỗi dịp lễ, Tết.', 9, 'https://i-vnexpress.vnecdn.net/2018/08/08/ketxeDaLat114859193621200x0-15-6036-1881-1533723648_180x108.jpg', 'da-lat-de-xuat-xay-dung-bai-dau-xe-7-tang-giua-trung-tam', '<article class=\"content_detail fck_detail width_common block_ads_connect\">\n<table align=\"center\" border=\"0\" cellpadding=\"3\" cellspacing=\"0\" class=\"tplCaption\"><tbody><tr><td>\n<img alt=\"Ôtô ùn tắc trước vòng xoay Bưu Điện Đà Lạt dịp Tết Nguyên đán 2017. Ảnh: Thành Nguyễn.\" data-natural-width=\"500\" src=\"https://i-vnexpress.vnecdn.net/2018/08/08/da-lat-6983-1533723648.jpg\"></td>\n</tr><tr><td>\n<p class=\"Image\">\nÔtô ùn tắc trước vòng xoay Bưu Điện Đà Lạt dịp Tết Nguyên đán 2017. Ảnh: <em>Thành Nguyễn.</em></p>\n</td>\n</tr></tbody></table><p class=\"Normal\">\nNgày 8/8, UBND TP Đà Lạt (Lâm Đồng) cho biết đã đề xuất lên UBND tỉnh và Sở Kế hoạch và Đầu tư về việc xây dựng bãi đậu xe công cộng tại trung tâm thành phố. <span>Dự án nhằm góp phần giải quyết tình trạng ùn tắc, kẹt xe ở trung tâm thành phố.</span></p><p class=\"Normal\">\nTheo đó, bãi đậu xe cao 7 tầng (3 tầng hầm và 4 tầng nổi) nằm ở số 1, đường Thủ Khoa Huân (phường 1, Đà Lạt), với tổng diện tích 4.000 m2. Trong đó, hơn 2.500 m2 là bãi đậu xe, hơn 900 m2 dành cho hạ tầng giao thông nội bộ. </p><p class=\"Normal\">\nĐể xây dựng, Đình Đà Lạt và Hội trường tổ dân phố được đề xuất dời về phía Đông của khu vực, chiếm 550 m2 trong dự án. Ngoài ra, 16 hộ dân sẽ bị giải tỏa.</p><p class=\"Normal\">\nTheo UBND TP Đà Lạt, dự án được đầu tư bằng nguồn vốn xã hội hóa, bắt đầu triển khai năm nay, dự kiến hoàn thành vào năm 2020.</p><p class=\"Normal\">\nDo địa hình đường sá nhiều dốc cao, Đà Lạt là thành phố duy nhất của cả nước chưa lắp đặt hệ thống đèn xanh, đèn đỏ. Những ngày lễ, Tết, cuối tuần, giao thông ở đây luôn trong tình quá tải khi du khách đổ về tham quan, nghỉ dưỡng.</p><p class=\"Normal\">\nTheo các chuyên gia, khi xây dựng TP Đà Lạt vào đầu thế kỷ 20 người Pháp chỉ dự trù khoảng 90.000 dân, nên thiết kế các tuyến đường khá nhỏ hẹp uốn lượn theo các triền núi thơ mộng. <span>Nay dân số nơi này gần 250.000 người, mỗi năm đón trên 5 triệu lượt du khách cùng các loại xe ngày càng nhiều khiến đường phố vốn đã hẹp lại thêm \"chật\" hơn vì rất khó mở rộng.</span></p> </article>', '2018-08-09 22:17:21', NULL, 0, '2018-08-10 15:21:04', 'Đà Lạt đề xuất xây dựng bãi đậu xe 7 tầng giữa trung tâm - VnExpr', 'Bãi xe có 3 tầng hầm và 4 tầng nổi, khi hoàn thành sẽ góp phần giải quyết tình trạng kẹt xe ở TP Đà Lạt mỗi dịp lễ, Tết. - VnExpress', 'Đà Lạt, bãi đậu xe, trung tâm Đà Lạt, Lâm Đồng', b'0');
INSERT INTO `adposts` VALUES (34, 'langtu', 'Bí thư Đà Nẵng: \'Tiền không quan trọng bằng môi trường làm việc\'', 'Phản hồi ý kiến về việc nhiều nơi chi hàng trăm triệu đãi ngộ bác sĩ, ông Trương Quang Nghĩa cho rằng với người giỏi môi trường làm việc mới quan trọng.', 9, 'https://i-vnexpress.vnecdn.net/2018/08/08/nghia1-1310-1533729006_180x108.jpg', 'bi-thu-da-nang-tien-khong-quan-trong-bang-moi-truong-lam-viec', '<article class=\"content_detail fck_detail width_common block_ads_connect\">\n<p class=\"Normal\">\nChiều 8/8, Bí thư Thành ủy Đà Nẵng Trương Quang Nghĩa chủ trì buổi làm việc với Sở Y tế. Nhiều vấn đề về chính sách thu hút bác sĩ giỏi về địa phương làm việc được lãnh đạo Sở cũng như giám đốc nhiều bệnh viện đề cập.</p><p class=\"Normal\">\n<span>Ông Pham Văn Tài, Giám đốc Bệnh viện Phục hồi chức năng Đà Nẵng, mong muốn quá trình tuyển dụng bác sĩ cần có chế độ đãi ngộ cao. Ông nêu ví dụ, ở nhiều tỉnh miền Nam, các bác sĩ vừa ra trường đã được nhận 150 triệu đồng từ chính quyền để yên tâm công tác.</span></p><p class=\"Normal\">\n<span>\"Đà Nẵng là thành phố trực thuộc Trung ương nhưng chưa có đãi ngộ đối với bác sĩ, mới áp dụng với tiến sĩ, giáo sư, bác sĩ chuyên khoa I, II ở các bệnh viện lớn\", bác sĩ Tài nói.</span></p><table align=\"center\" border=\"0\" cellpadding=\"3\" cellspacing=\"0\" class=\"tplCaption\"><tbody><tr><td>\n<img alt=\"Bí thư Thành uỷ Đà Nẵng Trương Quang Nghĩa tại buổi làm việc với Sở Y tế. Ảnh: Nguyễn Đông.\" data-natural-width=\"500\" src=\"https://i-vnexpress.vnecdn.net/2018/08/08/nghia1-8467-1533729006.jpg\" data-pagespeed-url-hash=\"3569493979\" onload=\"pagespeed.CriticalImages.checkImageForCriticality(this);\"></td>\n</tr><tr><td>\n<p class=\"Image\">\nBí thư Thành uỷ Đà Nẵng Trương Quang Nghĩa tại buổi làm việc với Sở Y tế. Ảnh: <em>Nguyễn Đông.</em></p>\n</td>\n</tr></tbody></table><p class=\"Normal\">\n<span>Bí thư Thành ủy Trương Quang Nghĩa nói, thời gian qua nhân tài về làm việc được hỗ trợ hàng trăm triệu đồng nhưng không phát huy hay thể hiện được năng lực. Việc đãi ngộ là cần thiết, nhưng không phải là cách giải quyết bền vững. </span></p><p class=\"Normal\">\n<span>\"Cho một sinh viên vừa ra trường 100 triệu đồng liệu có thay đổi điều kiện làm việc hay không. </span><span>Con người ta, môi trường làm việc mới quan trọng. Tôi có thời gian làm doanh nghiệp và vẫn luôn nói rằng văn hóa của doanh nghiệp mới là quan trọng, chưa hẳn là thu nhập đâu\", ông Nghĩa nói.</span></p><p class=\"Normal\">\n<span>Theo Bí thư Đà Nẵng, người tài cần nơi để cống hiến và gắn bó. Nếu họ chỉ đến vì 100 hay 200 triệu đồng thì được một thời gian khi tiền hết cũng sẽ bỏ đi. \"</span><span>Câu chuyện đãi ngộ cần có cách thức. Tiền là một yếu tố nhưng chưa quyết định được việc người tài có cống hiến hay gắn bó lâu dài. Chưa kể chuyện về nơi làm việc suốt ngày bị đồng nghiệp dè bửu vì người thì xin mãi mới được vào làm, còn người thì chưa cống hiến gì đã được nhận cả trăm triệu\", ông nói thêm.</span></p><p class=\"Normal\">\n<strong><span>Đề án đào tạo \"nhân tài\" bác sĩ không còn phù hợp</span></strong></p><p class=\"Normal\">\nBác sĩ Lê Đức Nhân, Giám đốc Bệnh viện Đà Nẵng, cho biết nhiệm vụ của bệnh viện là đáp ứng khám chữa bệnh cho người dân thành phố, nhưng thực tế hiện nay nhiều bệnh nhân tỉnh khác tìm đến, dẫn đến quá tải. <span>Trong khi đó, việc đào tạo bác sĩ phẫu thuật chuyên sâu đang gặp khó khăn về kinh phí.</span></p><p class=\"Normal\">\n<span>Từ nhiều năm nay, ngoài đầu tư cơ sở vật chất, Đà Nẵng đã đào tạo bác sĩ, bác sĩ nội trú trong Đề án phát triển nguồn nhân lực chất lượng cao (Đề án 922), đến nay hơn 160 bác sĩ được cử đi đào tạo. Thành phố đã chi hơn 33,6 tỷ đồng (số tiền thấp so với đào tạo học viên các lĩnh vực khác do chủ yếu đào tạo bác sĩ ở trong nước).</span></p><p class=\"Normal\">\nÔng Nhân nói \"đào tạo bác sĩ theo Đề án 922 đến nay đã không còn phù hợp với nhu cầu phát triển của bệnh viện\". Bệnh viện <span>đang cần đội ngũ bác sĩ đào tạo đặc thù, chuyên sâu để có ê kíp thực hiện các ca phẫu thuật chuyên sâu vì mục tiêu cứu sống người bệnh. </span></p><table align=\"center\" border=\"0\" cellpadding=\"3\" cellspacing=\"0\" class=\"tplCaption\"><tbody><tr><td>\n<img alt=\"Bác sĩ Lê Đức Nhân - Giám đốc Bệnh viện Đa khoa Đà Nẵng nêu ý kiến. Ảnh: Nguyễn Đông.\" data-natural-width=\"500\" src=\"https://i-vnexpress.vnecdn.net/2018/08/08/nhan-2443-1533729006.jpg\" data-pagespeed-url-hash=\"2589703620\" onload=\"pagespeed.CriticalImages.checkImageForCriticality(this);\"></td>\n</tr><tr><td>\n<p class=\"Image\">\nBác sĩ Lê Đức Nhân - Giám đốc Bệnh viện Đa khoa Đà Nẵng nêu ý kiến. Ảnh: <em>Nguyễn Đông.</em></p>\n</td>\n</tr></tbody></table><p class=\"Normal\">\nBí thư Trương Quang Nghĩa cũng cho rằng, đào tạo bác sĩ chuyên sâu là rất quan trọng, cần đưa bác sĩ đi nước ngoài học tập. Nếu k<span>hông có đội ngũ chuyên sâu thì rất khó thực hiện những ca mổ phức tạp. </span></p><p class=\"Normal\">\n\"Chúng ta cứ tiếc mãi câu chuyện tại sao người Việt Nam phải đi nước ngoài chữa bệnh. Chưa kể người ở Đà Nẵng<span> phải đi Hà Nội, TP HCM cấp cứu, nhiều khi không kịp cứu tính mạng vì mất thời gian di chuyển\", ông Nghĩa nói và chỉ đạo </span><span>Sở Y tế lập đề án để lãnh đạo thành phố phê duyệt ngay cuối năm nay.</span></p> </article>', '2018-08-09 22:17:21', NULL, 0, '2018-08-10 15:21:04', 'Bí thư Đà Nẵng: \'Tiền không quan trọng bằng môi trường làm việc\' ', 'Phản hồi ý kiến về việc nhiều nơi chi hàng trăm triệu đãi ngộ bác sĩ, ông Trương Quang Nghĩa cho rằng với người giỏi môi trường làm việc mới quan trọn', 'Đà Nẵng, Bí thư Đà Nẵng, ông Trương Quang Nghĩa', b'0');
INSERT INTO `adposts` VALUES (35, 'langtu', 'Hai xe container đấu đầu, hai tài xế tử vong', 'Sau tiếng nổ lớn, người dân Hà Tĩnh chạy ra thấy hai xe container dính chặt đầu vào nhau, hai tài xế tử vong, một phụ xe nguy kịch.', 9, 'https://i-vnexpress.vnecdn.net/2018/08/08/daudau1-1533740980-1230-1533741122_180x108.jpg', 'hai-xe-container-dau-dau-hai-tai-xe-tu-vong', '<article class=\"content_detail fck_detail width_common block_ads_connect\">\n<p class=\"Normal\">\nKhoảng 15h ngày 8/8, anh Phạm Văn Hội (32 tuổi) lái xe container biển Hà Tĩnh chạy trên đường mòn Hồ Chí Minh, khi đến xã Sơn Tiến (Hương Sơn, Hà Tĩnh) thì tông thẳng vào xe container biển Ninh Bình do tài xế Phan Văn Cường (29 tuổi) cầm lái chạy chiều ngược lại.</p><table align=\"center\" border=\"0\" cellpadding=\"3\" cellspacing=\"0\" class=\"tplCaption\"><tbody><tr><td>\n<img alt=\"Hiện trường vụ tai nạn. Ảnh: Minh Lý\" data-natural-width=\"500\" src=\"https://i-vnexpress.vnecdn.net/2018/08/08/dau-dau-2-9479-1533741122.jpg\"></td>\n</tr><tr><td>\n<p class=\"Image\">\nHiện trường vụ tai nạn. Ảnh: <em>Minh Lý</em></p>\n</td>\n</tr></tbody></table><p class=\"Normal\">\nCú tông mạnh khiến hai tài xế tử vong, một phụ xe bị thương, cùng mắc kẹt trong cabin. Nhà chức trách và người dân đã dùng cưa sắt để cắt cabin, đưa các nạn nhân ra ngoài. Hiện phụ xe container biển Hà Tĩnh cấp cứu tại bệnh viện trong trình trạng nguy kịch.</p><p class=\"Normal\">\n\"Thời điểm tai nạn, tôi nghe một tiếng nổ lớn, khi chạy ra đường thấy hai xe đã dính chặt vào nhau\", một nhân chứng nói.</p><table align=\"center\" border=\"0\" cellpadding=\"3\" cellspacing=\"0\" class=\"tplCaption\"><tbody><tr><td>\n<img alt=\"Nhà chức trách điều xe cứu hộ tới cẩu hai xe container. Ảnh: Minh Lý\" data-natural-width=\"500\" src=\"https://i-vnexpress.vnecdn.net/2018/08/08/dau-dau-3-7398-1533741122.jpg\"></td>\n</tr><tr><td>\n<p class=\"Image\">\nNhà chức trách điều xe cứu hộ tới cẩu hai xe container. Ảnh: <em>Minh Lý</em></p>\n</td>\n</tr></tbody></table><p class=\"Normal\">\nTại hiện trường, hai xe container lật nghiêng, đầu biến dạng, nhiều mảnh vỡ bung ra tung tóe, xung quanh vệt máu và vết dầu loang lổ trên đường.</p><p class=\"Normal\">\nCông an huyện Hương Sơn đã điều xe cứu hộ tới cẩu hai xe container khỏi hiện trường để thông đường, điều tra nguyên nhân tai nạn.</p> </article>', '2018-08-09 22:17:21', NULL, 0, '2018-08-10 15:21:04', 'Hai xe container đấu đầu, hai tài xế tử vong - VnExpress', 'Sau tiếng nổ lớn, người dân Hà Tĩnh chạy ra thấy hai xe container dính chặt đầu vào nhau, hai tài xế tử vong, một phụ xe nguy kịch. - VnExpress', 'xe container đấu đầu, hai tài xế tử vong, Hà Tĩnh,', b'0');
INSERT INTO `adposts` VALUES (36, 'langtu', 'Lùi thông qua Luật Giáo dục để cân nhắc về kỳ thi THPT quốc gia', 'Trước nhiều vấn đề gây tranh cãi về kỳ thi THPT quốc gia, Thường vụ Quốc hội thống nhất lùi thời gian thông qua dự án Luật Giáo dục sửa đổi. ', 9, 'https://i-vnexpress.vnecdn.net/2018/08/08/thi-sinh-3996-1533733194_180x108.jpg', 'lui-thong-qua-luat-giao-duc-de-can-nhac-ve-ky-thi-thpt-quoc-gia', '<article class=\"content_detail fck_detail width_common block_ads_connect\">\n<p class=\"Normal\">\nChiều 8/8, Thường vụ Quốc hội cho ý kiến về dự án Luật Giáo dục (sửa đổi). Phó chủ tịch Quốc hội Tòng Thị Phóng cho biết, sau kỳ họp thứ 5 Quốc hội khóa 14, tiếp thu ý kiến của đại biểu, từ chỗ chỉ sửa, bổ sung một số điều, cơ quan soạn thảo đã mở rộng phạm vi sửa toàn diện Luật Giáo dục.</p><p class=\"Normal\">\nBà Phóng <span>đề nghị đại biểu cho ý kiến nhiều vấn đề, trong đó có giáo dục phổ thông mà đặc biệt là kỳ thi THPT quốc gia. </span></p><table align=\"center\" border=\"0\" cellpadding=\"3\" cellspacing=\"0\" class=\"tplCaption\"><tbody><tr><td>\n<img alt=\"Phó Chủ tịch Quốc hội Tòng Thị Phóng. Ảnh: Quốc hội.\" data-natural-width=\"500\" src=\"https://i-vnexpress.vnecdn.net/2018/08/08/tong-thi-phong-3660-1533721123-8152-1533732599.jpg\"></td>\n</tr><tr><td>\n<p class=\"Image\">\nPhó chủ tịch Quốc hội Tòng Thị Phóng.<em> </em>Ảnh:<em> Trung tâm thông tin của Quốc hội.</em></p>\n</td>\n</tr></tbody></table><p class=\"Normal\">\nTrình bày báo cáo, Chủ nhiệm Ủy ban Văn hóa Giáo dục thanh thiếu niên và nhi đồng Phan Thanh Bình cho hay, kỳ thi THPT quốc gia hiện có hai luồng ý kiến. Luồng thứ nhất cho rằng việc tổ chức kỳ thi để cấp bằng tốt nghiệp THPT là cần thiết để đánh giá mức độ đạt chuẩn của học sinh. <span>Luồng thứ hai </span><span>đề xuất không tổ chức thi mà xét và cấp bằng tốt nghiệp để giảm áp lực, tốn kém. Cơ quan thẩm tra ủng hộ luồng quan điểm thứ nhất, giữ kỳ thi tốt nghiệp THPT.</span></p><p class=\"Normal\">\n<span>Chủ nhiệm Ủy ban Đối ngoại Nguyễn Văn Giàu cũng đồng tình với phương án giữ kỳ thi tốt nghiệp THPT. “Kinh nghiệm thực tiễn cho thấy nếu muốn tốt nghiệp phải học ngay từ lớp 10. Do vậy không vì tỷ lệ thi đỗ tốt nghiệp đạt tới gần 98% mà bỏ thi. Tôi ủng hộ nên thi”, ông Giàu nhấn mạnh.</span></p><p class=\"Normal\">\nNhấn mạnh “học là phải thi, nếu không khó đảm bảo chất lượng”, Chủ nhiệm Ủy ban Kinh tế Vũ Hồng Thanh <span>cho rằng kỳ thi THPT quốc gia hai trong một như hiện nay là chủ trương hoàn toàn đúng, nếu có vấn đề thì phải “uốn chỉnh”.</span></p><p class=\"Normal\">\n<span>Trưởng ban Dân nguyện Nguyễn Thanh Hải đặt hàng loạt câu hỏi: Vì sao phải tổ chức thi tốt nghiệp? Tổ chức thi mà 98% đỗ, 2% trượt thì có nên chăng? Nế</span><span>u bỏ thi tốt nghiệp, chất lượng dạy và học THPT sẽ thế nào? Bộ Giáo dục có dám khẳng định không thi thì chất lượng dạy và học vẫn đảm bảo? Bà Hải cho rằng nếu không đảm bảo được sự nghiêm túc thì loại ngay phương án bỏ thi.</span></p><p class=\"Normal\">\nCho rằng kỳ thi tuyển sinh đại học như trước đây là nghiêm túc nhất, <span>Trưởng ban Dân nguyện đề nghị cân nhắc phương án thứ ba tổ chức hai kỳ thi tốt nghiệp và thi đại học. “Người ta vẫn tiếc nuối kỳ thi đại học. Việc này cần thận trọng cân nhắc, có thời gian lấy ý kiến người dân”, bà Hải nói.</span></p><p class=\"Normal\">\n<strong>Lùi thời gian thông qua Luật Giáo dục (sửa đổi) sang kỳ họp thứ 7</strong></p><p class=\"Normal\">\nPhó chủ tịch Quốc hội Uông Chu Lưu nhận định, Luật Giáo dục rất quan trọng, tác động tới mọi đối tượng xã hội. \"<span>Nếu trước đây ta có thể thông qua luật ở hai kỳ họp, nhưng nay nhiều chính sách mới nên phải thông qua ba kỳ họp. Kỳ họp tới tiếp tục lấy ý kiến, sau đó tổ chức hội nghị tiếp thu và thông qua ở kỳ họp thứ 7 đầu năm 2018\", ông Lưu nói.</span></p><p class=\"Normal\">\nĐối với kỳ thi tốt nghiệp THPT, ông Uông Chu Lưu <span>đề nghị tiếp tục tổng kết, đánh giá các kỳ thi trước đây, tham khảo kinh nghiệm thế giới để đưa ra phương án, “chứ giáo dục mà thay đổi thường xuyên thì không tốt. Cũng như sách giáo khoa mà năm nào cũng đổi là không tốt”.</span></p><table align=\"center\" border=\"0\" cellpadding=\"3\" cellspacing=\"0\" class=\"tplCaption\"><tbody><tr><td>\n<img alt=\"Thí sinh Hà Nội tham dự kỳ thi THPT quốc gia 2018. Ảnh: Ngọc Thành.\" data-natural-width=\"500\" src=\"https://i-vnexpress.vnecdn.net/2018/08/08/thi-sinh-6063-1533733194.jpg\"></td>\n</tr><tr><td>\n<p class=\"Image\">\nThí sinh Hà Nội tham dự kỳ thi THPT quốc gia 2018. Ảnh: <em>Ngọc Thành.</em></p>\n</td>\n</tr></tbody></table><p class=\"Normal\">\nChủ nhiệm Văn phòng Quốc hội Nguyễn Hạnh Phúc cho rằng bỏ hay không bỏ kỳ thi tốt nghiệp THPT l<span>à vấn đề cần xin ý kiến nhân dân, chuyên gia để có quyết sách đúng, trúng. “Kỳ họp thứ 6 này quyết hơi sớm, chưa chín, cá nhân tôi cho rằng nên lắng nghe tiếp để tìm ra giải pháp thấu đáo”, ông Phúc nói. </span></p><p class=\"Normal\">\n<span>Chủ tịch Quốc hội Nguyễn Thị Kim Ngân chia sẻ </span>sau kỳ thi THPT quốc gia 2018 với nhiều tiêu cực ở một số tỉnh, người dân rất quan tâm tới Luật Giáo dục sửa đổi. \"Cử tri cần một nền giáo dục có tính ổn định chứ năm nào cũng thay đổi tùm lum lo lắm. Sách giờ năm nào cũng đổi tốn tiền lắm. Nói chung Luật Giáo dục phải cho qua sau ba kỳ họp cho chắc chắn”, bà nói<span>.</span></p><p class=\"Normal\">\nLắng nghe tất cả góp ý, Bộ trưởng Giáo dục và Đào tạo Phùng Xuân Nhạ xin tiếp thu các ý kiến. Cho rằng cần lấy ý kiến nhân dân, tổ chức các cuộc hội thảo, ông Nhạ xin lùi trình dự án luật sang kỳ họp thứ 7 để chuẩn bị.</p><p class=\"Normal\">\n<span>Chốt lại phiên họp, Phó chủ tịch Quốc hội Tòng Thị Phóng kết luận: </span><span>“Kể cả ở kỳ họp thứ 7 chưa thống nhất thì dự luật có thể phải lùi sang kỳ họp thứ 8. Còn một phiên họp Thường vụ trước kỳ họp thứ 6, lúc đó sẽ quyết định cho lùi hay không. Còn từ giờ tới lúc đó Chính phủ vẫn tiếp tục chuẩn bị”.</span></p><div class=\"box_brief_info\">\n<p class=\"Normal\">\nNăm 2018, cả nước có hơn 900.000 thí sinh dự thi THPT quốc gia để xét tốt nghiệp và xét tuyển đại học. Sau khi Bộ Giáo dục công bố điểm thi, dư luận bất ngờ khi Hà Giang, Sơn La, Hòa Bình có số thí sinh đạt điểm giỏi tăng đột biến, trong khi đều là vùng trũng giáo dục. Tại Lạng Sơn, nhóm thí sinh tự do là cảnh sát cơ động có nhiều điểm khá giỏi.</p>\n<p class=\"Normal\">\n<span>Bộ Giáo dục sau đó thành lập 4 tổ công tới 4 địa phương xác minh dấu hiệu bất thường. Kết quả Hà Giang, Sơn La, Hòa Bình đều có dấu hiệu gian lận, công an đã khởi tố vụ án hình sự, bắt giam một số cán bộ. Tại Lạng Sơn, tổ công tác của Bộ Giáo dục chưa thấy có dấu hiệu bất thường, dù một số bài thi Ngữ văn tự luận đã bị hạ điểm</span><span>.</span></p>\n</div> <div id=\"box_shop_detail_v2\" data-component-shop=\"js\" data-component-function=\"shopparser\" data-component-input=\'{\"type\":\"boxdetailshop\",\"slug\":\"li-thng-qua_lut-gio-dc_k-thi-thpt-quc-gia\",\"tag\":\"l\\u00f9i th\\u00f4ng qua,Lu\\u1eadt gi\\u00e1o d\\u1ee5c,k\\u1ef3 thi THPT qu\\u1ed1c gia\"}\'></div>\n</article>', '2018-08-09 22:17:21', NULL, 0, '2018-08-10 15:21:04', 'Lùi thông qua Luật Giáo dục để cân nhắc về kỳ thi THPT quốc gia -', 'Trước nhiều vấn đề gây tranh cãi về kỳ thi THPT quốc gia, Thường vụ Quốc hội thống nhất lùi thời gian thông qua dự án Luật Giáo dục sửa đổi.  - VnExpr', 'lùi thông qua, Luật giáo dục, kỳ thi THPT quốc gia', b'0');
INSERT INTO `adposts` VALUES (37, 'langtu', 'Đèn đường lăn sân bay Tân Sơn Nhất mất điện', 'Sự cố khiến 4 máy bay đậu tại khu vực đường lăn W15 không thể di chuyển, sân bay phải kéo đèn chiếu sáng, điều xe dẫn đường.', 9, 'https://i-vnexpress.vnecdn.net/2018/08/08/san-bay-2-8113-1434770742-2731-1533714901_180x108.jpg', 'den-duong-lan-san-bay-tan-son-nhat-mat-dien', '<article class=\"content_detail fck_detail width_common block_ads_connect\">\n<p class=\"Normal\">\nNgày 8/8, ông Phạm Vũ Cường (Phó giám đốc Cảng hàng không quốc tế Tân Sơn Nhất) cho biết, một phần hệ thống đèn đường lăn W15 bị mất điện khi có máy bay đang dừng chờ, tối hai hôm trước. Các máy bay không thể di chuyển nên nhiều đơn vị của Tân Sơn Nhất phải khắc phục sự cố.</p><p class=\"Normal\">\nTrung tâm khai thác khu bay kéo đèn chiếu sáng di động và xe dẫn đường (follow me car) dẫn dắt 4 máy bay đang chờ trên đường lăn W15 về bến đậu an toàn.</p><p class=\"Normal\">\nSau một tiếng rưỡi xảy ra sự cố, đến 20h44 sân bay khắc phục xong toàn bộ hệ thống điện, đưa đường lăn trở lại khai thác. \"Lãnh đạo Tân Sơn Nhất đánh giá đơn vị có phương án thay thế, chỉ đạo kịp thời khi sự cố xảy ra nên hoạt động khai thác bay vẫn diễn ra bình thường\", đại diện sân bay cho biết.</p><table class=\"tplCaption\" cellspacing=\"0\" cellpadding=\"3\" border=\"0\" align=\"center\"><tbody><tr><td>\n<img alt=\"Đường lăn ở sân bay. Ảnh minh họa.\" src=\"https://i-vnexpress.vnecdn.net/2018/08/08/san-bay-2-8113-1434770742-2638-1533714901.jpg\" data-pagespeed-url-hash=\"4289525271\" onload=\"pagespeed.CriticalImages.checkImageForCriticality(this);\"></td>\n</tr><tr><td>\n<p class=\"Image\">\nĐường lăn ở sân bay. <em>Ảnh minh họa.</em></p>\n</td>\n</tr></tbody></table><p class=\"Normal\">\nĐường lăn được dùng cho máy bay di chuyển từ khu vực này đến khu vực khác của cảng hàng không theo một đường đã định sẵn. Đường lăn W15 nằm ở phía Tây đường lăn Bắc Nam.</p><p class=\"Normal\">\nHồi cuối năm 2014, Đài kiểm soát không lưu sân bay Tân Sơn Nhất từng xảy ra sự cố <a href=\"https://vnexpress.net/tin-tuc/thoi-su/giao-thong/san-bay-tan-son-nhat-gian-doan-vi-dai-khong-luu-mat-dien-3109882.html\">mất điện</a> khiến nhiều máy bay phải bay lòng vòng hoặc hạ cánh xuống sân bay khác. Nguyên nhân được xác định do lỗi hệ thống điện.</p><p class=\"Normal\">\nSự cố này từng được các chuyên gia đánh giá là đặc biệt nghiêm trọng, chưa có tiền lệ.</p><p class=\"Normal\" style=\"text-align:right;\">\n<strong>Duy Trần</strong></p> </article>', '2018-08-09 22:17:21', NULL, 0, '2018-08-10 15:21:04', 'Đèn đường lăn sân bay Tân Sơn Nhất mất điện - VnExpress', 'Sự cố khiến 4 máy bay đậu tại khu vực đường lăn W15 không thể di chuyển, sân bay phải kéo đèn chiếu sáng, điều xe dẫn đường. - VnExpress', 'mất điện đường lăn sân bay, sự cố sân bay tân Sơn ', b'0');
INSERT INTO `adposts` VALUES (38, 'langtu', 'Sập cầu sắt, người dân ở Bến Tre phải đi đường vòng 5 km', 'Ôtô chở quá tải gấp 20 lần làm sập cầu ở huyện Bình Đại, khiến hàng nghìn phương tiện phải đi đường vòng.', 9, 'https://i-vnexpress.vnecdn.net/2018/08/08/IMG8982JPG-1533706504-5779-1533706601_180x108.jpg', 'sap-cau-sat-nguoi-dan-o-ben-tre-phai-di-duong-vong-5-km', '<article class=\"content_detail fck_detail width_common block_ads_connect\">\n<table align=\"center\" border=\"0\" cellpadding=\"3\" cellspacing=\"0\" class=\"tplCaption\"><tbody><tr><td>\n<img alt=\"Các phương tiện hiện bị cấm qua cầu. Ảnh: An Nam\" data-natural-width=\"500\" src=\"https://i-vnexpress.vnecdn.net/2018/08/08/IMG-8982-JPG-1938-1533706601.jpg\" data-pagespeed-url-hash=\"1853788632\" onload=\"pagespeed.CriticalImages.checkImageForCriticality(this);\"></td>\n</tr><tr><td>\n<p class=\"Image\">\nCác phương tiện hiện bị cấm qua cầu. Ảnh: <em>An Nam.</em></p>\n</td>\n</tr></tbody></table><p class=\"Normal\">\nRạng sáng 7/8, ôtô tải chở gần 20 tấn phân bò khi qua cầu Ông Chiếm (Thạnh Trị, Bình Đại) đã làm sập một bên nhịp dẫn.</p><p class=\"Normal\">\nDo đây là cầu nằm trên tuyến đường nối liền hai huyện Ba Tri và Bình Đại, nên hàng nghìn phương tiện phải đi đường vòng xa hơn 5 km. Ống dẫn nước lắp trên cầu cũng bị hư hỏng làm người dân trong vùng không có nước sạch sử dụng.</p><p class=\"Normal\">\nCầu sắt này đã đưa vào sử dụng trên 10 năm, dài 22 m, rộng 4 m, tải trọng một tấn. Hiện, nhiều thanh dầm thép đã gỉ sét, bong tróc hư hỏng.</p><p class=\"Normal\">\nSở Giao thông Vận tải Bến Tre đã đến hiện trường ghi nhận, dự kiến sớm gia cố lại phần nhịp bị hư hỏng để người dân thuận tiện đi lại.</p><p align=\"right\" class=\"Normal\">\n<strong>An Nam</strong></p> </article>', '2018-08-09 22:17:21', NULL, 0, '2018-08-10 15:21:04', 'Sập cầu sắt, người dân ở Bến Tre phải đi đường vòng 5 km - VnExpr', 'Ôtô chở quá tải gấp 20 lần làm sập cầu ở huyện Bình Đại, khiến hàng nghìn phương tiện phải đi đường vòng. - VnExpress', 'cầu sập, xe quá tải, Bến Tre, Bình Đại, giao thông', b'0');
INSERT INTO `adposts` VALUES (39, 'langtu', 'TP HCM tìm nhà đầu tư Khu đô thị Thanh Đa', 'Dự án khu đô thị sinh thái có vốn dự kiến 30.000 tỷ đồng sẽ được đấu thầu để chọn nhà đầu tư, sau 26 năm bị \"treo\".', 9, 'https://i-vnexpress.vnecdn.net/2018/08/08/thanh-da-8311-1533722956_180x108.jpg', 'tp-hcm-tim-nha-dau-tu-khu-do-thi-thanh-da', '<article class=\"content_detail fck_detail width_common block_ads_connect\">\n<p class=\"Normal\">\nPhó Chủ tịch UBND TP HCM Trần Vĩnh Tuyến vừa giao Sở Kế hoạch và Đầu tư tổ chức đấu thầu chọn nhà đầu tư thực hiện dự án Khu đô thị Bình Quới - Thanh Đa, quận Bình Thạnh.</p><p class=\"Normal\">\nĐộng thái này nhằm chọn nhà thầu có năng lực tài chính mạnh, kinh nghiệm thực hiện dự án quy mô lớn, phức tạp để đảm bảo tính khả thi triển khai nhanh dự án.</p><p class=\"Normal\">\nDo đây là dự án quy mô rất lớn, phức tạp, thời gian chọn nhà đầu tư kéo dài, lãnh đạo thành phố cũng giao Sở Xây dựng tham mưu việc cấp phép sửa chữa tạm nhà cho người dân. Việc này nhằm tránh gây bức xúc, ảnh hưởng cuộc sống của các hộ dân trong khu vực dự án.</p><table align=\"center\" border=\"0\" cellpadding=\"3\" cellspacing=\"0\" class=\"tplCaption\"><tbody><tr><td>\n<img alt=\"Bán đảo Thanh Đa thuộc khu trung tâm thành phố nhưng bị quy hoạch treo đã 26 năm. Ảnh: Quỳnh Trần.\" data-natural-width=\"500\" src=\"https://i-vnexpress.vnecdn.net/2018/08/08/thanh-da-8311-1533722956.jpg\"></td>\n</tr><tr><td>\n<p class=\"Image\">\nBán đảo Thanh Đa thuộc khu trung tâm thành phố nhưng bị quy hoạch treo đã 26 năm. Ảnh: <em>Quỳnh Trần.</em></p>\n</td>\n</tr></tbody></table><p class=\"Normal\">\nLà một trong những dự án bị \"treo\" lâu nhất TP HCM, khu đô thị sinh thái Bình Quới - Thanh Đa được TP HCM phê duyệt vào năm 1992.</p><p class=\"Normal\">\nĐến năm 2004 thành phố thu hồi đất, giao cho Tổng Công ty Xây dựng Sài Gòn đầu tư nhưng vì nhiều lý do dự án không thể triển khai. Sau đó, thành phố giao cho một tập đoàn trong nước lập đồ án quy hoạch phân khu (1/2.000).</p><p class=\"Normal\">\nTừ đó, dự án tiếp tục rơi vào quên lãng, mãi đến cuối năm 2015, Liên danh Tập đoàn Bitexco và Emaar Properties PJSC (Tiểu vương quốc Ả rập Thống Nhất) được UBND TP HCM chỉ định là nhà đầu tư với số vốn hơn 30.000 tỷ đồng. Thời gian triển khai thực hiện dự án dự kiến 50 năm, trong đó xây dựng hoàn thành hạ tầng kỹ thuật chính là 5 năm kể từ ngày ký hợp đồng.</p><p class=\"Normal\">\nGiữa năm 2017, TP HCM thông báo Công ty Emaar Properties PJSC xin rút khỏi dự án và thành phố đã có văn bản xin ý kiến Chính phủ chấp thuận cho Bitexco tiếp tục là nhà đầu tư thực hiện dự án này.</p><p class=\"Normal\">\nTại kỳ họp HĐND TP HCM hồi tháng trước, Chủ tịch UBND TP HCM Nguyễn Thành Phong cam kết giải quyết dứt điểm dự án này, không để kéo dài thêm. </p><p class=\"Normal\" style=\"text-align:right;\">\n<strong>Thiên Ngôn</strong></p> </article>', '2018-08-09 22:17:21', NULL, 0, '2018-08-10 15:21:04', 'TP HCM tìm nhà đầu tư Khu đô thị Thanh Đa - VnExpress', 'Dự án khu đô thị sinh thái có vốn dự kiến 30.000 tỷ đồng sẽ được đấu thầu để chọn nhà đầu tư, sau 26 năm bị &amp;quot;treo&amp;quot;. - VnExpress', 'khu đô thị Bình Quới - Thanh Đa, khu đô thị Sinh T', b'0');
INSERT INTO `adposts` VALUES (40, 'langtu', 'Nguyên thứ trưởng trẻ nhất nước làm Chủ tịch tỉnh Phú Yên', 'Tân Chủ tịch Phú Yên được bầu với tỷ lệ phiếu đồng ý tuyệt đối và cam kết đưa tỉnh này phát triển mạnh mẽ.', 9, 'https://i-vnexpress.vnecdn.net/2018/08/08/ophamdaiduong92881533701745-15-1975-6745-1533703012_180x108.jpg', 'nguyen-thu-truong-tre-nhat-nuoc-lam-chu-tich-tinh-phu-yen', '<article class=\"content_detail fck_detail width_common block_ads_connect\">\n<p class=\"Normal\">\nSáng 8/8, HĐND tỉnh Phú Yên tổ chức <span>phiên họp bất thường giới thiệu nhân sự bầu Chủ tịch UBND tỉnh nhiệm kỳ 2016-2021.</span></p><p class=\"Normal\">\n<span>Với tỷ lệ 100% đại biểu đồng ý (47/47), ô</span><span>ng Phạm Đại Dương - Phó bí thư Tỉnh ủy Phú Yên, nguyên Thứ trưởng Khoa học và Công nghệ, được bầu làm chủ tịch tỉnh thay</span><span> ông Hoàng Văn Trà đã chuyển công tác ra Ủy ban Kiểm tra Trung ương.</span></p><table align=\"center\" border=\"0\" cellpadding=\"3\" cellspacing=\"0\" class=\"tplCaption\"><tbody><tr><td>\n<img alt=\"Ông Phạm Đại Dương. Ảnh: Loan Lê.\" data-natural-width=\"500\" src=\"https://i-vnexpress.vnecdn.net/2018/08/08/o-pham-dai-duong-9288-15337017-7125-7468-1533703012.jpg\" data-pagespeed-url-hash=\"1320425705\" onload=\"pagespeed.CriticalImages.checkImageForCriticality(this);\"></td>\n</tr><tr><td>\n<p class=\"Image\">\nÔng Phạm Đại Dương. Ảnh: <em>Loan Lê.</em></p>\n</td>\n</tr></tbody></table><p class=\"Normal\">\n<span>Phát biểu nhậm chức, ông Phạm Đại Dương đề cập đến những thuận lợi và khó khăn của Phú Yên, trong đó có việc nền kinh tế </span><span>quy mô chưa lớn, chịu tác động bất lợi của biến đổi khí hậu, thời tiết cực đoan, thiên tai, dịch bệnh... Đây là những thách thức trong quá trình thực hiện các  nhiệm vụ phát triển kinh tế - xã hội giai đoạn 2016-2021 của tỉnh.</span></p><p class=\"Normal\">\nÔng Dương khẳng định sẽ học hỏi, kế thừa những thành quả, kinh nghiệm của các lãnh đạo tiền nhiệm, tận dụng hiệu quả thời cơ để đưa Phú Yên tiếp tục phát triển mạnh mẽ hơn.</p><p class=\"Normal\">\n<span>Trước đó </span><span>Ban bí thư có quyết định luân chuyển ông Phạm Đại Dương, Thứ trưởng Khoa học và Công nghệ kiêm Trưởng ban quản lý Khu công nghệ cao Hòa Lạc giữ chức Phó bí thư Tỉnh ủy Phú Yên nhiệm kỳ 2015 - 2020; giới thiệu bầu Chủ tịch UBND tỉnh Phú Yên. </span></p><p class=\"Normal\">\n<span>Ông Phạm Đại Dương (44 tuổi) là một trong số chủ tịch tỉnh trẻ của cả nước. Trước đó, ông Đặng Quốc Khánh được bầu làm Chủ tịch UBND tỉnh Hà Tĩnh khi mới 40 tuổi.</span></p><p class=\"Normal\">\nTại Hội nghị Trung ương hồi tháng 5, ông Hoàng Văn Trà, Phó bí thư Tỉnh ủy, Chủ tịch UBND tỉnh, Trưởng đoàn đại biểu Quốc hội khóa 14 tỉnh Phú Yên được bầu giữ chức Ủy viên Ủy ban Kiểm tra Trung ương khóa 12.</p><div class=\"box_brief_info\">\n<p>\n<span style=\"color:rgb(0,0,0);\">Ông Phạm Đại Dương sinh năm 1974, nguyên quán Hà Nội. Năm 2015 ông được bổ nhiệm giữ chức Thứ trưởng Bộ Khoa học và Công nghệ, phụ trách mảng công nghệ cao và Khu công nghệ cao Hoà Lạc.</span></p>\n</div> </article>', '2018-08-09 22:17:21', NULL, 0, '2018-08-10 15:21:04', 'Nguyên thứ trưởng trẻ nhất nước làm Chủ tịch tỉnh Phú Yên - VnExp', 'Tân Chủ tịch Phú Yên được bầu với tỷ lệ phiếu đồng ý tuyệt đối và cam kết đưa tỉnh này phát triển mạnh mẽ. - VnExpress', 'phạm đại dương, thung lũng silicon, chủ tịch phú y', b'0');
INSERT INTO `adposts` VALUES (41, 'langtu', 'Cảnh sát cứu hỏa, cơ động giúp dân vùng ngập lụt dọn vệ sinh', 'Lũ rút, nhà chức trách Hà Nội huy động hàng trăm cảnh sát cứu hỏa, cơ động giúp chính quyền, người dân ở huyện Chương Mỹ dọn vệ sinh.', 9, 'https://i-vnexpress.vnecdn.net/2018/08/08/IMG-0717-JPG_1533706041_180x108.jpg', 'canh-sat-cuu-hoa-co-dong-giup-dan-vung-ngap-lut-don-ve-sinh', '<article class=\"content_detail fck_detail width_common\">\n<div id=\"article_content\" class=\"block_ads_connect\">\n<div class=\"item_slide_show clearfix\" style=\"width:680px;\">\n<div class=\"block_thumb_slide_show\">\n<img class=\"left\" alt=\"Cảnh sát cứu hỏa, cơ động giúp dân vùng ngập lụt dọn vệ sinh\" data-reference-id=\"25763955\" src=\"https://i-vnexpress.vnecdn.net/2018/08/08/IMG-0700-JPG_680x0.jpg\" data-component-caption=\"&amp;lt;p&amp;gt;\n	Sáng 8/8, nước ngập ở các xã vùng &amp;quot;rốn lũ&amp;quot; thuộc huyện Chương Mỹ (Hà Nội) đã rút gần hết, chỉ còn một số điểm ngập ở thôn Nhân Lý (xã Nam Phương Tiến). Trên đường chính dẫn vào xã Nam Phương Tiến - nơi từng ngập sâu 1,5m, người dân địa phương đã ra quét dọn vệ sinh.&amp;lt;/p&amp;gt;\" data-pagespeed-url-hash=\"958632194\" onload=\"pagespeed.CriticalImages.checkImageForCriticality(this);\"/>\n<noscript>\n<img class=\"left\" alt=\"Cảnh sát cứu hỏa, cơ động giúp dân vùng ngập lụt dọn vệ sinh\" data-reference-id=\"25763955\" src=\"https://i-vnexpress.vnecdn.net/2018/08/08/IMG-0700-JPG_680x0.jpg\" data-component-caption=\"&amp;lt;p&amp;gt;\n	Sáng 8/8, nước ngập ở các xã vùng &amp;quot;rốn lũ&amp;quot; thuộc huyện Chương Mỹ (Hà Nội) đã rút gần hết, chỉ còn một số điểm ngập ở thôn Nhân Lý (xã Nam Phương Tiến). Trên đường chính dẫn vào xã Nam Phương Tiến - nơi từng ngập sâu 1,5m, người dân địa phương đã ra quét dọn vệ sinh.&amp;lt;/p&amp;gt;\" data-pagespeed-url-hash=\"958632194\"/>\n</noscript>\n<a href=\"javascript:void(0)\" class=\"icon_thumb_videophoto icon_thumb_zoom btn_icon_show_slide_show\"><i class=\"ic ic-expand\"></i></a>\n</div>\n<div class=\"desc_cation\"><p>\nSáng 8/8, nước ngập ở các xã vùng \"rốn lũ\" thuộc huyện Chương Mỹ (Hà Nội) đã rút gần hết, chỉ còn một số điểm ngập ở thôn Nhân Lý (xã Nam Phương Tiến). Trên đường chính dẫn vào xã Nam Phương Tiến - nơi từng ngập sâu 1,5m, người dân địa phương đã ra quét dọn vệ sinh.</p></div>\n</div>\n<div class=\"item_slide_show clearfix\" style=\"width:680px;\">\n<div class=\"block_thumb_slide_show\">\n<img class=\"left\" alt=\"Cảnh sát cứu hỏa, cơ động giúp dân vùng ngập lụt dọn vệ sinh\" data-reference-id=\"25763956\" src=\"https://i-vnexpress.vnecdn.net/2018/08/08/IMG-0717-JPG_1533706041_680x0.jpg\" data-component-caption=\"&amp;lt;p&amp;gt;\n	Cảnh sát phòng cháy, chữa cháy được huy động đến phun nước, rửa sạch khuôn viên trụ sở UBND xã Nam Phương Tiến và một số tuyến đường trên địa bàn xã.&amp;lt;/p&amp;gt;\" data-pagespeed-url-hash=\"3406663103\" onload=\"pagespeed.CriticalImages.checkImageForCriticality(this);\"/>\n<noscript>\n<img class=\"left\" alt=\"Cảnh sát cứu hỏa, cơ động giúp dân vùng ngập lụt dọn vệ sinh\" data-reference-id=\"25763956\" src=\"https://i-vnexpress.vnecdn.net/2018/08/08/IMG-0717-JPG_1533706041_680x0.jpg\" data-component-caption=\"&amp;lt;p&amp;gt;\n	Cảnh sát phòng cháy, chữa cháy được huy động đến phun nước, rửa sạch khuôn viên trụ sở UBND xã Nam Phương Tiến và một số tuyến đường trên địa bàn xã.&amp;lt;/p&amp;gt;\" data-pagespeed-url-hash=\"3406663103\"/>\n</noscript>\n<a href=\"javascript:void(0)\" class=\"icon_thumb_videophoto icon_thumb_zoom btn_icon_show_slide_show\"><i class=\"ic ic-expand\"></i></a>\n</div>\n<div class=\"desc_cation\"><p>\nCảnh sát phòng cháy, chữa cháy được huy động đến phun nước, rửa sạch khuôn viên trụ sở UBND xã Nam Phương Tiến và một số tuyến đường trên địa bàn xã.</p></div>\n</div>\n<div class=\"item_slide_show clearfix\" style=\"width:680px;\">\n<div class=\"block_thumb_slide_show\">\n<img class=\"left\" alt=\"Cảnh sát cứu hỏa, cơ động giúp dân vùng ngập lụt dọn vệ sinh\" data-reference-id=\"25763957\" src=\"https://i-vnexpress.vnecdn.net/2018/08/08/IMG-0739-JPG_680x0.jpg\" data-component-caption=\"&amp;lt;p&amp;gt;\n	Khoảng hơn 100 chiến sỹ cảnh sát cơ động và thanh niên tình nguyện đến làm vệ sinh trường mầm non và trường tiểu học Nam Phương Tiến.&amp;lt;/p&amp;gt;\" data-pagespeed-url-hash=\"675892996\" onload=\"pagespeed.CriticalImages.checkImageForCriticality(this);\"/>\n<noscript>\n<img class=\"left\" alt=\"Cảnh sát cứu hỏa, cơ động giúp dân vùng ngập lụt dọn vệ sinh\" data-reference-id=\"25763957\" src=\"https://i-vnexpress.vnecdn.net/2018/08/08/IMG-0739-JPG_680x0.jpg\" data-component-caption=\"&amp;lt;p&amp;gt;\n	Khoảng hơn 100 chiến sỹ cảnh sát cơ động và thanh niên tình nguyện đến làm vệ sinh trường mầm non và trường tiểu học Nam Phương Tiến.&amp;lt;/p&amp;gt;\" data-pagespeed-url-hash=\"675892996\"/>\n</noscript>\n<a href=\"javascript:void(0)\" class=\"icon_thumb_videophoto icon_thumb_zoom btn_icon_show_slide_show\"><i class=\"ic ic-expand\"></i></a>\n</div>\n<div class=\"desc_cation\"><p>\nKhoảng hơn 100 chiến sỹ cảnh sát cơ động và thanh niên tình nguyện đến làm vệ sinh trường mầm non và trường tiểu học Nam Phương Tiến.</p></div>\n</div>\n<div class=\"item_slide_show clearfix\" style=\"width:680px;\">\n<div class=\"block_thumb_slide_show\">\n<img class=\"left\" alt=\"Cảnh sát cứu hỏa, cơ động giúp dân vùng ngập lụt dọn vệ sinh\" data-reference-id=\"25763958\" src=\"https://i-vnexpress.vnecdn.net/2018/08/08/IMG-0756-JPG_680x0.jpg\" data-component-caption=\"&amp;lt;p&amp;gt;\n	Các chiến sĩ giúp nhà trường di chuyển đồ đạc về vị trí cũ.&amp;lt;/p&amp;gt;\n&amp;lt;p&amp;gt;\n	Khu vực trường tiểu học và mầm non xã Nam Phương Tiến vẫn còn ngập nhưng khả năng nước sẽ rút hết trong một, hai ngày tới. &amp;quot;Trong hôm nay, với sự giúp đỡ của các chiến sĩ cảnh sát, việc vệ sinh trường lớp cơ bản hoàn thành, chỉ còn khu vực sân trường ngập nước sẽ được dọn sau&amp;quot;, cô Nguyễn Thị Xuân Loan, Hiệu trưởng trường tiểu học Nam Phương Tiến A nói.&amp;lt;/p&amp;gt;\" data-pagespeed-url-hash=\"3741665647\" onload=\"pagespeed.CriticalImages.checkImageForCriticality(this);\"/>\n<noscript>\n<img class=\"left\" alt=\"Cảnh sát cứu hỏa, cơ động giúp dân vùng ngập lụt dọn vệ sinh\" data-reference-id=\"25763958\" src=\"https://i-vnexpress.vnecdn.net/2018/08/08/IMG-0756-JPG_680x0.jpg\" data-component-caption=\"&amp;lt;p&amp;gt;\n	Các chiến sĩ giúp nhà trường di chuyển đồ đạc về vị trí cũ.&amp;lt;/p&amp;gt;\n&amp;lt;p&amp;gt;\n	Khu vực trường tiểu học và mầm non xã Nam Phương Tiến vẫn còn ngập nhưng khả năng nước sẽ rút hết trong một, hai ngày tới. &amp;quot;Trong hôm nay, với sự giúp đỡ của các chiến sĩ cảnh sát, việc vệ sinh trường lớp cơ bản hoàn thành, chỉ còn khu vực sân trường ngập nước sẽ được dọn sau&amp;quot;, cô Nguyễn Thị Xuân Loan, Hiệu trưởng trường tiểu học Nam Phương Tiến A nói.&amp;lt;/p&amp;gt;\" data-pagespeed-url-hash=\"3741665647\"/>\n</noscript>\n<a href=\"javascript:void(0)\" class=\"icon_thumb_videophoto icon_thumb_zoom btn_icon_show_slide_show\"><i class=\"ic ic-expand\"></i></a>\n</div>\n<div class=\"desc_cation\"><p>\nCác chiến sĩ giúp nhà trường di chuyển đồ đạc về vị trí cũ.</p>\n<p>\nKhu vực trường tiểu học và mầm non xã Nam Phương Tiến vẫn còn ngập nhưng khả năng nước sẽ rút hết trong một, hai ngày tới. \"Trong hôm nay, với sự giúp đỡ của các chiến sĩ cảnh sát, việc vệ sinh trường lớp cơ bản hoàn thành, chỉ còn khu vực sân trường ngập nước sẽ được dọn sau\", cô Nguyễn Thị Xuân Loan, Hiệu trưởng trường tiểu học Nam Phương Tiến A nói.</p></div>\n</div>\n<div class=\"item_slide_show clearfix\" style=\"width:680px;\">\n<div class=\"block_thumb_slide_show\">\n<img class=\"left\" alt=\"Cảnh sát cứu hỏa, cơ động giúp dân vùng ngập lụt dọn vệ sinh\" data-reference-id=\"25763959\" src=\"https://i-vnexpress.vnecdn.net/2018/08/08/IMG-0679-JPG_680x0.jpg\" data-component-caption=\"&amp;lt;p&amp;gt;\n	Người dân thôn Hạnh Bồ lau chùi nhà cửa khi nước rút dần.&amp;lt;/p&amp;gt;\n&amp;lt;p&amp;gt;\n&amp;lt;/p&amp;gt;\" data-pagespeed-url-hash=\"3253081967\" onload=\"pagespeed.CriticalImages.checkImageForCriticality(this);\"/>\n<noscript>\n<img class=\"left\" alt=\"Cảnh sát cứu hỏa, cơ động giúp dân vùng ngập lụt dọn vệ sinh\" data-reference-id=\"25763959\" src=\"https://i-vnexpress.vnecdn.net/2018/08/08/IMG-0679-JPG_680x0.jpg\" data-component-caption=\"&amp;lt;p&amp;gt;\n	Người dân thôn Hạnh Bồ lau chùi nhà cửa khi nước rút dần.&amp;lt;/p&amp;gt;\n&amp;lt;p&amp;gt;\n&amp;lt;/p&amp;gt;\" data-pagespeed-url-hash=\"3253081967\"/>\n</noscript>\n<a href=\"javascript:void(0)\" class=\"icon_thumb_videophoto icon_thumb_zoom btn_icon_show_slide_show\"><i class=\"ic ic-expand\"></i></a>\n</div>\n<div class=\"desc_cation\"><p>\nNgười dân thôn Hạnh Bồ lau chùi nhà cửa khi nước rút dần.</p>\n<p>\n</p></div>\n</div>\n<div class=\"item_slide_show clearfix\" style=\"width:680px;\">\n<div class=\"block_thumb_slide_show\">\n<img class=\"left\" alt=\"Cảnh sát cứu hỏa, cơ động giúp dân vùng ngập lụt dọn vệ sinh\" data-reference-id=\"25763960\" src=\"https://i-vnexpress.vnecdn.net/2018/08/08/10-1533697575_1533700791_680x0.jpg\" data-component-caption=\"&amp;lt;p&amp;gt;\n	Nhiều người dân cho biết hiện họ tập trung quét dọn nhà cửa, còn đồ đạc dùng cho sinh hoạt hàng ngày &amp;quot;phải đợi mấy hôm nữa khi nước rút hẳn, nắng lên khô ráo thì mới chuyển về&amp;quot;.&amp;lt;/p&amp;gt;\" data-pagespeed-url-hash=\"3925558159\" onload=\"pagespeed.CriticalImages.checkImageForCriticality(this);\"/>\n<noscript>\n<img class=\"left\" alt=\"Cảnh sát cứu hỏa, cơ động giúp dân vùng ngập lụt dọn vệ sinh\" data-reference-id=\"25763960\" src=\"https://i-vnexpress.vnecdn.net/2018/08/08/10-1533697575_1533700791_680x0.jpg\" data-component-caption=\"&amp;lt;p&amp;gt;\n	Nhiều người dân cho biết hiện họ tập trung quét dọn nhà cửa, còn đồ đạc dùng cho sinh hoạt hàng ngày &amp;quot;phải đợi mấy hôm nữa khi nước rút hẳn, nắng lên khô ráo thì mới chuyển về&amp;quot;.&amp;lt;/p&amp;gt;\" data-pagespeed-url-hash=\"3925558159\"/>\n</noscript>\n<a href=\"javascript:void(0)\" class=\"icon_thumb_videophoto icon_thumb_zoom btn_icon_show_slide_show\"><i class=\"ic ic-expand\"></i></a>\n</div>\n<div class=\"desc_cation\"><p>\nNhiều người dân cho biết hiện họ tập trung quét dọn nhà cửa, còn đồ đạc dùng cho sinh hoạt hàng ngày \"phải đợi mấy hôm nữa khi nước rút hẳn, nắng lên khô ráo thì mới chuyển về\".</p></div>\n</div>\n<div class=\"item_slide_show clearfix\" style=\"width:680px;\">\n<div class=\"block_thumb_slide_show\">\n<img class=\"left\" alt=\"Cảnh sát cứu hỏa, cơ động giúp dân vùng ngập lụt dọn vệ sinh\" data-reference-id=\"25763961\" src=\"https://i-vnexpress.vnecdn.net/2018/08/08/7-1533697573_680x0.jpg\" data-component-caption=\"&amp;lt;p&amp;gt;\n	Vật nuôi được di tản khi lũ lên nay người dân chuyển về chuồng trại cũ.&amp;lt;/p&amp;gt;\" data-pagespeed-url-hash=\"3399086988\" onload=\"pagespeed.CriticalImages.checkImageForCriticality(this);\"/>\n<noscript>\n<img class=\"left\" alt=\"Cảnh sát cứu hỏa, cơ động giúp dân vùng ngập lụt dọn vệ sinh\" data-reference-id=\"25763961\" src=\"https://i-vnexpress.vnecdn.net/2018/08/08/7-1533697573_680x0.jpg\" data-component-caption=\"&amp;lt;p&amp;gt;\n	Vật nuôi được di tản khi lũ lên nay người dân chuyển về chuồng trại cũ.&amp;lt;/p&amp;gt;\" data-pagespeed-url-hash=\"3399086988\"/>\n</noscript>\n<a href=\"javascript:void(0)\" class=\"icon_thumb_videophoto icon_thumb_zoom btn_icon_show_slide_show\"><i class=\"ic ic-expand\"></i></a>\n</div>\n<div class=\"desc_cation\"><p>\nVật nuôi được di tản khi lũ lên nay người dân chuyển về chuồng trại cũ.</p></div>\n</div>\n<div class=\"item_slide_show clearfix\" style=\"width:680px;\">\n<div class=\"block_thumb_slide_show\">\n<img class=\"left\" alt=\"Cảnh sát cứu hỏa, cơ động giúp dân vùng ngập lụt dọn vệ sinh\" data-reference-id=\"25763962\" src=\"https://i-vnexpress.vnecdn.net/2018/08/08/IMG-0702-JPG_680x0.jpg\" data-component-caption=\"&amp;lt;p&amp;gt;\n	Rác thải theo dòng nước trôi vào nhà được người dân tập kết trước cổng để công nhân vệ sinh môi trường tới thu gom.&amp;lt;/p&amp;gt;\" data-pagespeed-url-hash=\"3735065076\" onload=\"pagespeed.CriticalImages.checkImageForCriticality(this);\"/>\n<noscript>\n<img class=\"left\" alt=\"Cảnh sát cứu hỏa, cơ động giúp dân vùng ngập lụt dọn vệ sinh\" data-reference-id=\"25763962\" src=\"https://i-vnexpress.vnecdn.net/2018/08/08/IMG-0702-JPG_680x0.jpg\" data-component-caption=\"&amp;lt;p&amp;gt;\n	Rác thải theo dòng nước trôi vào nhà được người dân tập kết trước cổng để công nhân vệ sinh môi trường tới thu gom.&amp;lt;/p&amp;gt;\" data-pagespeed-url-hash=\"3735065076\"/>\n</noscript>\n<a href=\"javascript:void(0)\" class=\"icon_thumb_videophoto icon_thumb_zoom btn_icon_show_slide_show\"><i class=\"ic ic-expand\"></i></a>\n</div>\n<div class=\"desc_cation\"><p>\nRác thải theo dòng nước trôi vào nhà được người dân tập kết trước cổng để công nhân vệ sinh môi trường tới thu gom.</p></div>\n</div>\n<div class=\"item_slide_show clearfix\" style=\"width:680px;\">\n<div class=\"block_thumb_slide_show\">\n<img class=\"left\" alt=\"Cảnh sát cứu hỏa, cơ động giúp dân vùng ngập lụt dọn vệ sinh\" data-reference-id=\"25763963\" src=\"https://i-vnexpress.vnecdn.net/2018/08/08/9-1533697575_680x0.jpg\" data-component-caption=\"&amp;lt;p&amp;gt;\n	Sáng 8/8, người dân và công nhân vệ sinh dọn bùn đất trên các trục đường chính ở xã Nam Phương Tiến.&amp;lt;/p&amp;gt;\" data-pagespeed-url-hash=\"1389472068\" onload=\"pagespeed.CriticalImages.checkImageForCriticality(this);\"/>\n<noscript>\n<img class=\"left\" alt=\"Cảnh sát cứu hỏa, cơ động giúp dân vùng ngập lụt dọn vệ sinh\" data-reference-id=\"25763963\" src=\"https://i-vnexpress.vnecdn.net/2018/08/08/9-1533697575_680x0.jpg\" data-component-caption=\"&amp;lt;p&amp;gt;\n	Sáng 8/8, người dân và công nhân vệ sinh dọn bùn đất trên các trục đường chính ở xã Nam Phương Tiến.&amp;lt;/p&amp;gt;\" data-pagespeed-url-hash=\"1389472068\"/>\n</noscript>\n<a href=\"javascript:void(0)\" class=\"icon_thumb_videophoto icon_thumb_zoom btn_icon_show_slide_show\"><i class=\"ic ic-expand\"></i></a>\n</div>\n<div class=\"desc_cation\"><p>\nSáng 8/8, người dân và công nhân vệ sinh dọn bùn đất trên các trục đường chính ở xã Nam Phương Tiến.</p></div>\n</div>\n<div class=\"item_slide_show clearfix\" style=\"width:680px;\">\n<div class=\"block_thumb_slide_show\">\n<img class=\"left\" alt=\"Cảnh sát cứu hỏa, cơ động giúp dân vùng ngập lụt dọn vệ sinh\" data-reference-id=\"25763964\" src=\"https://i-vnexpress.vnecdn.net/2018/08/08/12-1533697577_680x0.jpg\" data-component-caption=\"&amp;lt;p&amp;gt;\n	Trung tâm y tế huyện Chương Mỹ cấp phát hơn 700 đơn vị thuốc chữa các bệnh ngoài da cho người dân. Sau lũ, đơn vị này cũng tiến hành phun khử trùng dọc đường làng, ngõ xóm.&amp;lt;/p&amp;gt;\n&amp;lt;p&amp;gt;\n	Theo Ban chỉ đạo Phòng chống lụt bão Hà Nội, trong đợt ngập lụt lần này, một số khu dân cư ở huyện Quốc Oai bị cô lập trong 13 ngày; nhiều xã ở huyện Chương Mỹ ngập 22 ngày. Đến chiều 7/8, mực nước các sông Tích, Đáy, Bùi đều dưới báo động số 1. &amp;lt;/p&amp;gt;\" data-pagespeed-url-hash=\"3428452096\" onload=\"pagespeed.CriticalImages.checkImageForCriticality(this);\"/>\n<noscript>\n<img class=\"left\" alt=\"Cảnh sát cứu hỏa, cơ động giúp dân vùng ngập lụt dọn vệ sinh\" data-reference-id=\"25763964\" src=\"https://i-vnexpress.vnecdn.net/2018/08/08/12-1533697577_680x0.jpg\" data-component-caption=\"&amp;lt;p&amp;gt;\n	Trung tâm y tế huyện Chương Mỹ cấp phát hơn 700 đơn vị thuốc chữa các bệnh ngoài da cho người dân. Sau lũ, đơn vị này cũng tiến hành phun khử trùng dọc đường làng, ngõ xóm.&amp;lt;/p&amp;gt;\n&amp;lt;p&amp;gt;\n	Theo Ban chỉ đạo Phòng chống lụt bão Hà Nội, trong đợt ngập lụt lần này, một số khu dân cư ở huyện Quốc Oai bị cô lập trong 13 ngày; nhiều xã ở huyện Chương Mỹ ngập 22 ngày. Đến chiều 7/8, mực nước các sông Tích, Đáy, Bùi đều dưới báo động số 1. &amp;lt;/p&amp;gt;\" data-pagespeed-url-hash=\"3428452096\"/>\n</noscript>\n<a href=\"javascript:void(0)\" class=\"icon_thumb_videophoto icon_thumb_zoom btn_icon_show_slide_show\"><i class=\"ic ic-expand\"></i></a>\n</div>\n<div class=\"desc_cation\"><p>\nTrung tâm y tế huyện Chương Mỹ cấp phát hơn 700 đơn vị thuốc chữa các bệnh ngoài da cho người dân. Sau lũ, đơn vị này cũng tiến hành phun khử trùng dọc đường làng, ngõ xóm.</p>\n<p>\nTheo Ban chỉ đạo Phòng chống lụt bão Hà Nội, trong đợt ngập lụt lần này, một số khu dân cư ở huyện Quốc Oai bị cô lập trong 13 ngày; nhiều xã ở huyện Chương Mỹ ngập 22 ngày. Đến chiều 7/8, mực nước các sông Tích, Đáy, Bùi đều dưới báo động số 1. </p></div>\n</div>\n</div>\n<div class=\"fck_detail width_common\"> <p><p style=\"text-align:right;\">\n<strong>Gia Chính</strong></p></p></div>\n</article>', '2018-08-09 22:17:21', NULL, 0, '2018-08-10 15:21:04', 'Cảnh sát cứu hỏa, cơ động giúp dân vùng ngập lụt dọn vệ sinh - Vn', 'Lũ rút, nhà chức trách Hà Nội huy động hàng trăm cảnh sát cứu hỏa, cơ động giúp chính quyền, người dân ở huyện Chương Mỹ dọn vệ sinh. - VnExpress', 'Cảnh sát cứu hỏa, cơ động giúp dân vùng ngập lụt d', b'0');
INSERT INTO `adposts` VALUES (42, 'langtu', 'Xe máy bị cấm chạy trên cầu vượt ngã tư Vũng Tàu', 'Tỉnh Đồng Nai cho rằng việc xe máy chạy lên cầu vượt ngã tư Vũng Tàu sẽ dễ va chạm với ôtô.', 9, 'https://i-vnexpress.vnecdn.net/2018/08/08/ngatuVungTau-1533699170-1686-1533700485_180x108.jpg', 'xe-may-bi-cam-chay-tren-cau-vuot-nga-tu-vung-tau', '<article class=\"content_detail fck_detail width_common block_ads_connect\">\n<p class=\"Normal\">\n<span>Trong cuộc họp phân luồng xe cộ ở nút giao Quốc lộ 1 và 51 qua TP Biên Hòa chiều 7/8</span><span>, </span><span>UBND Đồng Nai thống nhất với Công ty Cổ phần Đầu tư và Xây dựng cầu Đồng Nai không cho xe máy đi lên cầu vượt ngã tư Vũng Tàu. </span>Nguyên nhân do xe máy chạy trên làn hỗn hợp sẽ dễ va chạm với ôtô.</p><table align=\"center\" border=\"0\" cellpadding=\"3\" cellspacing=\"0\" class=\"tplCaption\"><tbody><tr><td>\n<img alt=\"Một vụ tai nạn giao thông trên cầu vượt ngã tư Vũng Tàu năm 2017. Ảnh: Phước Tuấn\" data-natural-width=\"500\" src=\"https://i-vnexpress.vnecdn.net/2018/08/08/tn-2487-1494828599-5980-1533697157.jpg\" data-pagespeed-url-hash=\"1257972879\" onload=\"pagespeed.CriticalImages.checkImageForCriticality(this);\"></td>\n</tr><tr><td>\n<p class=\"Image\">\nMột vụ tai nạn xe máy và ôtô trên cầu vượt ngã tư Vũng Tàu năm 2017. Ảnh: <em>Phước Tuấn.</em></p>\n</td>\n</tr></tbody></table><p class=\"Normal\">\n<span>Theo Sở Giao thông Vận tải Đồng Nai, sau hơn hai tháng phân luồng lại nút giao này theo sự chấp thuận của Tổng cục Đường bộ, tình hình tai nạn giao thông tại </span><span>khu vực này đã giảm.</span></p><p class=\"Normal\">\n<span>Xung đột giao thông giữa xe máy từ nội ô TP Biên Hòa đi Quốc lộ 51 và ôtô hướng TP HCM - Hà Nội không còn gay gắt như trước do đã lắp đặt hệ thống đèn tín hiệu. Tuy nhiên, thời gian đèn tín hiệu còn chưa hợp lý </span>khiến nguy cơ gây tai nạn giao thông cao, đơn vị chủ đầu tư thống nhất sẽ chỉnh sửa.</p><table align=\"center\" border=\"0\" cellpadding=\"3\" cellspacing=\"0\" class=\"tplCaption\"><tbody><tr><td>\n<img alt=\"Nút giao ngã tư Vũng Tàu. Ảnh: Phước Tuấn.\" class=\"img_more\" data-natural-width=\"500\" src=\"https://i-vnexpress.vnecdn.net/2018/08/08/nga-tu-Vung-Tau-5614-1533700485.jpg\" data-pagespeed-url-hash=\"3519274540\" onload=\"pagespeed.CriticalImages.checkImageForCriticality(this);\"></td>\n</tr><tr><td>\n<p class=\"Image\">\nNút giao ngã tư Vũng Tàu. Ảnh: <em>Phước Tuấn.</em></p>\n</td>\n</tr></tbody></table><p class=\"Normal\">\n<span>Cầu vượt ngã tư Vũng Tàu nằm trong dự án cầu Đồng Nai mới, theo hình thức BOT. Cầu rộng 16 m, 4 làn xe, dài 558 m, tổng kinh phí xây dựng khoảng 200 tỷ đồng, được đưa vào hoạt động đầu năm 2014.</span></p><p class=\"Normal\">\n<span>Đầu năm nay, trước tình trạng tai nạn liên tiếp xảy ra tại nút giao thông này, Ban An toàn giao thông Đồng Nai kiến nghị Tổng cục Đường bộ ngừng thu phí trạm BOT cầu Đồng Nai để chủ đầu tư điều tiết, khắc phục bất hợp lý tại \"điểm đen\" này.</span></p><p class=\"Normal\" style=\"text-align:right;\">\n<strong style=\"text-align:right;\">Phước Tuấn</strong></p> </article>', '2018-08-09 22:17:21', NULL, 0, '2018-08-10 15:21:04', 'Xe máy bị cấm chạy trên cầu vượt ngã tư Vũng Tàu - VnExpress', 'Tỉnh Đồng Nai cho rằng việc xe máy chạy lên cầu vượt ngã tư Vũng Tàu sẽ dễ va chạm với ôtô. - VnExpress', 'nút giao ngã tư Vũng Tàu, điểm đen ùn tắc ngã tư V', b'0');
INSERT INTO `adposts` VALUES (43, 'langtu', 'TP HCM lần đầu có \'bến\' taxi', 'Việc này nhằm hạn chế tình trạng người dân phải đón xe dọc đường, taxi \"dù\" hoành hành... gây kẹt xe ở khu vực trung tâm.', 9, 'https://i-vnexpress.vnecdn.net/2018/08/08/taxi-2966-1533694454_180x108.jpg', 'tp-hcm-lan-dau-co-ben-taxi', '<article class=\"content_detail fck_detail width_common block_ads_connect\">\n<figure class=\"item_slide_show clearfix\">\n<!--start video embed-->\n<div onclick=\"Video.playVideo(214941)\" id=\"video_parent_214941\" class=\"box_embed_video_parent embed_video_new\" data-vid=\"214941\" data-ratio=\"1\" data-articleoriginal=\"3789349\" data-ads=\"1\" data-license=\"1\" data-duration=\"86\" data-brandsafe=\"0\" data-type=\"0\" data-play=\"0\" data-frame=\"\">\n<div data-vid=\"214941\" class=\"box_img_video embed-container\">\n<img src=\"https://iv.vnecdn.net/vnexpress/images/web/2018/08/08/thi-diem-5-vi-tri-don-taxi-tai-trung-tam-sai-gon-1533701907_500x300.jpg\" alt=\"Thí điểm 5 vị trí đón taxi tại trung tâm Sài Gòn\" data-pagespeed-url-hash=\"1584169756\" onload=\"pagespeed.CriticalImages.checkImageForCriticality(this);\">\n<div class=\"icon_blockvideo\">\n<div class=\"img_icon\">&nbsp;</div>\n<div class=\"image_icon_center\">&nbsp;</div>\n</div></div>\n<div id=\"embed_video_214941\" class=\"box_embed_video\" style=\"display:none;\">\n<div class=\"bg_overlay_small_unpin\"></div>\n<div class=\"bg_overlay_small\"></div>\n<div class=\"embed-container\">\n<div id=\"video-214941\">\n<div id=\"parser_player_214941\" class=\"media_content\" style=\"display:none;\">\n<div id=\"videoContainter_214941\" class=\"videoContainter\" style=\"width: 100%; height: 100%;\">\n<video id=\"media-video-214941\" preload=\"auto\" playsinline webkit-playsinline src=\"https://d.vnecdn.net/vnexpress/video/video/web/mp4/,240p,360p,480p,,/2018/08/08/thi-diem-5-vi-tri-don-taxi-tai-trung-tam-sai-gon-1533715587/vne/master.m3u8\" type=\"application/x-mpegURL\" controls style=\"width: 100%; height: 100%;\" data-mode=\"240|360|480|720\" max-mode=\"720\" data-subtitle=\"0\" active-mode=\"720\" ads=\'\' adsconfig=\'{\"adlist\":[{\"type\":\"preroll\",\"tag\":\"https:\\/\\/pubads.g.doubleclick.net\\/gampad\\/live\\/ads?sz=640x360|400x300|480x70|640x480|320x180&iu=\\/27973503\\/video.vnexpress.net\\/Thoisu&impl=s&gdfp_req=1&env=vp&output=vast&unviewed_position_start=1&url=[referrer_url]&description_url=[description_url]&correlator=[timestamp]\",\"skipOffset\":\"00:00:06\",\"duration\":\"00:00:30\"},{\"type\":\"overlay\",\"tag\":\"\",\"script\":\"%3Cscript%3Eif(!window.googletag%7C%7C!googletag.apiReady)%7Bvar%20googletag%3Dgoogletag%7C%7C%7Bcmd%3A%5B%5D%7D%2Csb%3Ddocument.getElementsByTagName(%22script%22)%5B0%5D%2Csa%3Ddocument.createElement(%22script%22)%3Bsa.setAttribute(%22type%22%2C%22text%2Fjavascript%22)%3Bsa.setAttribute(%22src%22%2C%22https%3A%2F%2Fwww.googletagservices.com%2Ftag%2Fjs%2Fgpt.js%22)%3Bsa.setAttribute(%22async%22%2C%22true%22)%3Bsb.parentNode.appendChild(sa)%7D%3Bgoogletag.cmd.push(function()%7Bgoogletag.defineSlot(%22%2F27973503%2Fvnexpreess.net%2FDesktop%2Foverlay%2Foverlay.standard%22%2C%5B%22fluid%22%2C%5B1%2C1%5D%2C%5B480%2C70%5D%5D%2C%22div-gpt-ad-1529985620955-overlay-standard-1%22).addService(googletag.pubads())%3Bgoogletag.pubads().enableSingleRequest()%3Bgoogletag.enableServices()%7D)%3B%3C%2Fscript%3E%3Cdiv%20id%3D%22div-gpt-ad-1529985620955-overlay-standard-1%22%20style%3D%22height%3A70px%3Bwidth%3A480px%3B%22%3E%3Cscript%3Egoogletag.cmd.push(function()%7Bgoogletag.display(%22div-gpt-ad-1529985620955-overlay-standard-1%22)%3B%7D)%3B%3C%2Fscript%3E%3C%2Fdiv%3E\",\"size\":\"480x70\",\"offset\":\"30%\",\"skipOffset\":\"00:00:01\",\"duration\":\"00:00:15\"}]}\' data-ex=\"st=1&bs=0&pt=0\"></video>\n</div>\n</div>\n<!--[if IE]>\r\n                                    <div id=\"flash_player_214941\" class=\"flash_content\" style=\"display:none;\">\r\n                                        <object width=\"100%\" height=\"100%\" classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\" id=\"videoplayer_214941\" codebase=\"https://fpdownload2.macromedia.com/get/shockwave/cabs/flash/swflash.cab#version=9,0,0,0\">\r\n                                            <param name=\"movie\" value=\"https://s.vnecdn.net/video/flash/vneplayer.swf\">\r\n                                            <param name=\"allowScriptAccess\" value=\"always\" />\r\n                                            <param name=\"quality\" value=\"high\">\r\n                                            <param name=\"bgcolor\" value=\"#000000\">\r\n                                            <param name=\"wmode\" value=\"transparent\">\r\n                                            <param name=\"flashvars\" value=\"xmlPath=&mAuto=true&asseturl=https://s.vnecdn.net/video/flash/assetv3.swf&dynamicview=false&sharemode=false&autoHide=false&tracktype=video&typeview=1&playerid=videoplayer&trackurl=https://d.vnecdn.net/vnexpress/video/video/web/mp4/,240p,360p,480p,,/2018/08/08/thi-diem-5-vi-tri-don-taxi-tai-trung-tam-sai-gon-1533715587/vne/master.m3u8&thumburl=&tracklink=&adszoneid=&adsTag=&activemode=720&tracktitle=Thí điểm 5 vị trí đón taxi tại trung tâm Sài Gòn\">\r\n                                            <param name=\"allowfullscreen\" value=\"true\">\r\n                                            <embed bgcolor=\"#000000\" width=\"100%\" height=\"100%\" name=\"videoplayer_214941\" flashvars=\"xmlPath=&mAuto=true&asseturl=https://s.vnecdn.net/video/flash/assetv3.swf&dynamicview=false&sharemode=false&autoHide=false&tracktype=video&typeview=1&playerid=videoplayer&trackurl=https://d.vnecdn.net/vnexpress/video/video/web/mp4/,240p,360p,480p,,/2018/08/08/thi-diem-5-vi-tri-don-taxi-tai-trung-tam-sai-gon-1533715587/vne/master.m3u8&thumburl=&tracklink=&adszoneid=&adsTag=&activemode=720&tracktitle=Thí điểm 5 vị trí đón taxi tại trung tâm Sài Gòn\" type=\"application/x-shockwave-flash\" allowfullscreen=\"true\" allowscriptaccess=\"always\" wmode=\"transparent\" pluginspage=\"https://get.adobe.com/flashplayer/\" src=\"https://s.vnecdn.net/video/flash/vneplayer.swf\">\r\n                                        </object>\r\n                                    </div>\r\n                                    <![endif]-->\n</div>\n<div class=\"parser_title\" style=\"display:none;\">Thí điểm 5 vị trí đón taxi tại trung tâm Sài Gòn</div>\n</div>\n</div>\n</div>\n<!--end video embed-->\n<figcaption class=\"desc_cation\"><div class=\"inner_caption\">\n<p class=\"Image\">\nNgười dân sẽ nhấn vào nút trên hộp điện tử để đón xe. Video: <em>Nguyễn Điệp.</em></p>\n</div></figcaption></figure><p class=\"Normal\">\nSáng 8/8, UBND quận 1 mở 5 điểm đón taxi cố định tại số 16 Alexandre De Rodes, cổng chính Bệnh viện Nhi Đồng 2, số 29 Lý Tự Trọng, số 3 Hàn Thuyên và đối diện số 139 Nguyễn Du (trước cổng phụ Câu lạc bộ Văn hóa - Thể dục thể thao Nguyễn Du).</p><p class=\"Normal\">\nNgười dân có nhu cầu đi taxi sẽ đến các điểm này đón xe. Mỗi điểm có trụ báo taxi màu vàng, khu vực chờ trên vỉa hè, phần kẻ vạch đánh dấu điểm xe dừng đón khách. Mỗi taxi có khoảng 2 phút để đón, trả khách.</p><p class=\"Normal\">\nĐộng thái này của quận 1 nhằm hạn chế tình trạng người dân phải đón xe dọc đường, taxi \"dù\" hoành hành, taxi dừng đón trả khách không đúng nơi quy định... gây ùn tắc giao thông ở trung tâm thành phố.</p><table align=\"center\" border=\"0\" cellpadding=\"3\" cellspacing=\"0\" class=\"tplCaption\"><tbody><tr><td>\n<img alt=\"Một điểm đón taxi trên đường Nguyễn Du vừa được triển khai. Ảnh: Hữu Nguyên\" data-natural-width=\"500\" src=\"https://i-vnexpress.vnecdn.net/2018/08/08/taxi-2966-1533694454.jpg\" data-pagespeed-url-hash=\"4285822455\" onload=\"pagespeed.CriticalImages.checkImageForCriticality(this);\"></td>\n</tr><tr><td>\n<p class=\"Image\">\nĐiểm đón taxi trên đường Nguyễn Du vừa được triển khai. Ảnh:<em> Hữu Nguyên.</em></p>\n</td>\n</tr></tbody></table><p class=\"Normal\">\n<span>Trước đó, theo đ</span>ề xuất của quận 1 và Sở Giao thông Vận tải, <span>Chủ tịch UBND TP HCM Nguyễn Thành Phong đồng ý cho thực hiện đề án xã hội hóa đầu tư 5 điểm đón taxi tại khu vực trung tâm. Thời gian thí điểm là 6 tháng.</span></p><p class=\"Normal\">\nQuận 1 phải phối hợp với các sở ngành liên quan đảm bảo an ninh trật tự, an toàn giao thông và mỹ quan tại các điểm này. Nếu mô hình này có hiệu quả thành phố sẽ nhân rộng ở những nơi khác.</p><p class=\"Normal\">\n<span>Chủ tịch UBND quận 1</span> Trần Thế Thuận<span> cho biết, trong thời gian thí điểm quận sẽ lắng nghe ý kiến người dân để nâng cao chất lượng các điểm đón, chẳng hạn như lắp thêm mái che mưa nắng. Đặc biệt, các điểm đón taxi phải thích hợp, góp phần giảm ùn tắc chứ không tạo thêm khó khăn cho người dân khi tham gia giao thông.</span></p><p class=\"Normal\">\nTP HCM hiện có khoảng 12.500 đầu taxi truyền thống, chưa kể hơn 5.000 taxi Grab, Uber. Do thiếu bến bãi, hầu hết xe đều sử dụng phần diện tích trước cửa các nhà hàng, khách sạn, lòng đường làm nơi đón trả khách gây ra tình trạng bát nháo, kẹt xe.</p><p class=\"Normal\">\nTại một số trục đường trung tâm như: Bùi Thị Xuân, Tôn Thất Tùng, Hai Bà Trưng, Pasteur, Nguyễn Thị Minh Khai, Cống Quỳnh, Nguyễn Trãi... mật độ taxi hoạt động dày đặc, thậm chí có nơi xe taxi chạy trên đường nhiều hơn ôtô.</p><p class=\"Normal\" style=\"text-align:right;\">\n<strong>Hữu Nguyên</strong></p> </article>', '2018-08-09 22:17:21', NULL, 0, '2018-08-10 15:21:04', 'TP HCM lần đầu có \'bến\' taxi - VnExpress', 'Việc này nhằm hạn chế tình trạng người dân phải đón xe dọc đường, taxi &amp;quot;dù&amp;quot; hoành hành... gây kẹt xe ở khu vực trung tâm. - VnExpres', 'TP HCM lập bến taxi, diểm đón taxi cố định, taxi r', b'0');
INSERT INTO `adposts` VALUES (44, '', 'Xe buýt chạy ngược chiều ở trung tâm Sài Gòn', 'Từ vòng xoay Cộng Hòa (quận 5), tài xế lái xe buýt đi ngược chiều trên đường Nguyễn Văn Cừ mặc cho nhiều ôtô khác bóp còi báo hiệu.', NULL, 'https://i-vnexpress.vnecdn.net/2018/08/09/xebuytnguocchieu-1533814995-6267-1533815147_180x108.jpg', 'xe-buyt-chay-nguoc-chieu-o-trung-tam-sai-gon', '', '2018-08-09 22:02:36', NULL, 0, '2018-08-09 22:03:38', NULL, NULL, NULL, b'0');

-- ----------------------------
-- Table structure for adusergroups
-- ----------------------------
DROP TABLE IF EXISTS `adusergroups`;
CREATE TABLE `adusergroups`  (
  `ADUserGroupID` smallint(6) NOT NULL AUTO_INCREMENT,
  `ADUserGroupName` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ADUserGroupType` tinyint(1) NOT NULL DEFAULT 0,
  `HieuLuc` tinyint(1) NOT NULL,
  `GioiHan` smallint(8) NULL DEFAULT NULL,
  `GioiHanVG` smallint(8) NULL DEFAULT NULL,
  `DiemNC` smallint(10) NULL DEFAULT NULL,
  PRIMARY KEY (`ADUserGroupID`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of adusergroups
-- ----------------------------
INSERT INTO `adusergroups` VALUES (1, 'Quản Trị', 0, 1, NULL, NULL, NULL);
INSERT INTO `adusergroups` VALUES (2, 'Thành Viên', 0, 0, NULL, NULL, NULL);
INSERT INTO `adusergroups` VALUES (3, 'Guest', 0, 0, NULL, NULL, NULL);
INSERT INTO `adusergroups` VALUES (4, 'Nhân viên', 1, 1, NULL, NULL, NULL);
INSERT INTO `adusergroups` VALUES (5, 'Giáo viên', 1, 1, NULL, NULL, NULL);
INSERT INTO `adusergroups` VALUES (6, 'Giáo vụ', 1, 1, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for adusers
-- ----------------------------
DROP TABLE IF EXISTS `adusers`;
CREATE TABLE `adusers`  (
  `ADUserID` int(10) NOT NULL AUTO_INCREMENT,
  `ADUserName` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ADPassword` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `AAImage` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `ADUserDate` timestamp(0) NOT NULL DEFAULT current_timestamp,
  `ADUserGroupID` int(11) NOT NULL,
  `ADUserActiveDate` datetime(0) NOT NULL,
  `ADUserRandomKey` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ADUserActive` tinyint(1) NOT NULL DEFAULT 0,
  `HieuLuc` tinyint(1) NOT NULL,
  PRIMARY KEY (`ADUserID`) USING BTREE,
  UNIQUE INDEX `noncluster`(`ADUserName`, `ADUserGroupID`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 864 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of adusers
-- ----------------------------
INSERT INTO `adusers` VALUES (1, 'htkycong', 'dc3b07afa5656dee8989645c9d79c22d', NULL, '2013-03-07 00:00:00', 1, '1970-01-01 00:00:00', '', 1, 0);
INSERT INTO `adusers` VALUES (2, 'NVHung', '3dd7da1945137f4c231c9df2fa961a90', NULL, '2013-03-07 00:00:00', 2, '1970-01-01 00:00:00', '', 1, 0);
INSERT INTO `adusers` VALUES (3, 'nhangheo', '47b12794e5bd215f11020c09ebafeb26', NULL, '2013-06-12 00:00:00', 1, '1970-01-01 00:00:00', 'JlnB8fRLMo5AIJbdgz1JzHDbYQouszWr', 1, 0);
INSERT INTO `adusers` VALUES (4, 'Ronando', '670522fba654fa637fdacfa9005c7559', NULL, '2013-06-12 00:00:00', 1, '1970-01-01 00:00:00', '', 1, 0);
INSERT INTO `adusers` VALUES (5, 'ToiVip', '81dc9bdb52d04dc20036dbd8313ed055', NULL, '2013-05-10 00:00:00', 1, '1970-01-01 00:00:00', 'kHHhSrFlhoona6jBjst1GU3JzyZQL5br', 1, 0);
INSERT INTO `adusers` VALUES (6, 'ChịDậu', '402929c0fa0fa87a45de9c43ce9b4854', NULL, '2013-06-12 00:00:00', 0, '1970-01-01 00:00:00', 'kHHhSrFlhoona6jBjst1GU3JzyZQL5br', 1, 0);
INSERT INTO `adusers` VALUES (7, 'nguoiduatin', 'a5f9d5daf7e68f6dfa1ca350867c9660', NULL, '2013-06-12 01:20:48', 0, '1970-01-01 00:00:00', 'aY802STzM3SjsDMgDYo7YZr3KAeU5bVu', 1, 0);
INSERT INTO `adusers` VALUES (8, 'langtu', '0cc175b9c0f1b6a831c399e269772661', '798149_338025509640151_1250125429_o.jpg', '2013-06-11 17:34:35', 1, '1970-01-01 00:00:00', 'JlnB8fRLMo5AIJbdgz1JzHDbYQouszWr', 1, 1);
INSERT INTO `adusers` VALUES (9, 'BuiQuangSang', '827ccb0eea8a706c4c34a16891f84e7b', NULL, '2013-06-04 12:45:59', 0, '1970-01-01 00:00:00', 'B1oGjCkRN8A0gWKqBSWQYSWLzhexg7', 1, 0);
INSERT INTO `adusers` VALUES (10, 'Piggy', '3dd7da1945137f4c231c9df2fa961a90', NULL, '2013-06-10 11:09:52', 0, '1970-01-01 00:00:00', 'aU33lYeuuKxSwwiwAWJaffwYiZM2WmEi', 1, 0);
INSERT INTO `adusers` VALUES (11, 'dvdangtin002', '3c2c609fb6504a5ebca250332d350b2f', NULL, '2013-06-10 12:45:19', 1, '1970-01-01 00:00:00', 'O60FJnl3gNOANwCOq6cV8TmKkTHKZld', 1, 0);
INSERT INTO `adusers` VALUES (12, 'PhoMai', '3dd7da1945137f4c231c9df2fa961a90', NULL, '2013-06-12 00:00:00', 2, '1970-01-01 00:00:00', '', 1, 0);
INSERT INTO `adusers` VALUES (13, 'cobelolem', '3dd7da1945137f4c231c9df2fa961a90', NULL, '2013-06-12 00:00:00', 0, '1970-01-01 00:00:00', 'JlnB8fRLMo5AIJbdgz1JzHDbYQouszWr', 1, 0);
INSERT INTO `adusers` VALUES (14, 'dao8485', 'd0ab12a6cdd798f24e9d5118f176d870', NULL, '2013-06-12 15:09:18', 0, '1970-01-01 00:00:00', 'OwmkqrkwjizsCE8loHu3Fg5HBk74oCKz', 1, 0);
INSERT INTO `adusers` VALUES (15, 'yurilovely', '66c76c520f0c1b6e80193b1f6f80bd93', NULL, '2013-06-12 15:38:02', 0, '1970-01-01 00:00:00', 'ZLDBWgKAdOzEi9F4zMjEfFQnP0EBGW5', 1, 0);
INSERT INTO `adusers` VALUES (16, 'giathkn', '6b19fcaaf2718a5939e2739d2c8f6c0e', NULL, '2013-06-12 15:40:39', 0, '1970-01-01 00:00:00', 'SoKEMXPMwDgl7tWcoTAjvF8d6CBu31tJ', 1, 0);
INSERT INTO `adusers` VALUES (17, '10520028', 'd817d09fae919e41d740c8f34144345b', NULL, '2013-06-12 15:46:08', 0, '1970-01-01 00:00:00', 'fBr6RWcGmIGDleP3xFWee6OpFNaqZmCi', 1, 0);
INSERT INTO `adusers` VALUES (18, 'giathkn1', '9c3f552c60b74f5b4e75005d4edde644', NULL, '2013-06-12 15:51:47', 0, '1970-01-01 00:00:00', 'eM2CKPx6e9aKWtcEdCcMqRqvTLfQZMCq', 1, 0);
INSERT INTO `adusers` VALUES (19, 'THUYNHUNG', 'c37c4027499dc035cff16aceb677f2bc', NULL, '2013-06-12 16:28:39', 0, '1970-01-01 00:00:00', 'mIwLn7bWulYSmeqn0TkRTIRYKWER35mT', 1, 0);
INSERT INTO `adusers` VALUES (20, 'big123', '8f34d5f61b44def11f4b443d29eb64cc', NULL, '2013-06-12 16:29:33', 0, '1970-01-01 00:00:00', 'FwhfKoptDTEmlMgJAQRB3ddWJxWdCwFA', 1, 0);
INSERT INTO `adusers` VALUES (21, 'nl_ad', 'ad054dd47b9d4860b7fe34098a41b15c', NULL, '2013-06-12 16:42:25', 0, '1970-01-01 00:00:00', 's4xWAPR06bnHRpySXJIkOU1UTDWVqSh', 1, 0);
INSERT INTO `adusers` VALUES (22, 'Lưu Hà', '884341e9fbe87d83be9631a66a6a85ea', NULL, '2013-06-12 18:14:56', 0, '1970-01-01 00:00:00', '0vYVNHjePqDr74U1xRUwnntKJftX2WwG', 1, 0);
INSERT INTO `adusers` VALUES (23, 'znhat_tanz', '19e5130e114d7001d0001b7154b29ba3', NULL, '2013-06-12 18:55:08', 0, '1970-01-01 00:00:00', 'al8wT62EtZQOj8CTIatg56S4HFVGO6pn', 1, 0);
INSERT INTO `adusers` VALUES (24, 'A2013', '7ba8b6d9c4eb72c62bfecb71f7fae0d4', NULL, '2013-06-12 19:00:21', 0, '1970-01-01 00:00:00', '4SWCt1EIRBc7bduofj9Dk28SLaIlWYz', 1, 0);
INSERT INTO `adusers` VALUES (25, 'hoangtan103', '643bb7d4eedb4e4203d3fb1ab2cff840', NULL, '2013-06-13 11:10:35', 0, '1970-01-01 00:00:00', 'iqWgS3XlvzciwUdyaSDqJWLYj8KlG15', 1, 0);
INSERT INTO `adusers` VALUES (26, 'dtran1990', '60d0a5a6af3ff32f30cc93b209860937', NULL, '2013-06-12 19:35:37', 0, '1970-01-01 00:00:00', 'rPZekmAFyIZmiPQVUiRKhn9tMDSQbu', 1, 0);
INSERT INTO `adusers` VALUES (27, 'kimlien1289', '18a0228d631b7a9185309aab9377b385', NULL, '2013-06-13 11:02:25', 0, '1970-01-01 00:00:00', 'lPxp9FIw66wGMzXQ4OnGv2C2ZMLSXQ', 1, 0);
INSERT INTO `adusers` VALUES (28, 'ctvtran', '60d0a5a6af3ff32f30cc93b209860937', NULL, '2013-06-12 20:28:50', 0, '1970-01-01 00:00:00', 'gbutxnw5PinlwZWINEPd2TXsPQn9uwM1', 1, 0);
INSERT INTO `adusers` VALUES (29, 'Nhilun', '3a75fd2bd45056f31c13a0fb4bf102db', NULL, '2013-06-13 10:23:25', 0, '1970-01-01 00:00:00', 'g3L0QD3nF36EiItq2IH4pHjT724HlkB', 1, 0);
INSERT INTO `adusers` VALUES (30, 'yuhina188', '522afd2a935610b473cc1351b01b286c', NULL, '2013-06-13 00:19:22', 0, '1970-01-01 00:00:00', 'E2u9s3SsoIxyi1KS1C84RVoGhiqGr0sF', 1, 0);
INSERT INTO `adusers` VALUES (31, 'kaorypham', '070a5bb183f85c67fb6a4d1c634437f1', NULL, '2013-06-13 01:24:37', 0, '1970-01-01 00:00:00', 'RYxYlV8fCQpBrjttby7Jckf5DmJ1a', 1, 0);
INSERT INTO `adusers` VALUES (32, 'anhvd09', '007436d3f2fc0a0ac148d2202a08ccd1', NULL, '2013-06-13 01:30:19', 0, '1970-01-01 00:00:00', '8JgxoEpZIhjFU3bXyvqo3xUTmEk6tlb6', 1, 0);
INSERT INTO `adusers` VALUES (33, 'anhvd0909', 'a695e77fd76251ba14f60a3d44674fc8', NULL, '2013-06-13 01:48:09', 0, '1970-01-01 00:00:00', 'oy3Sp3TaKGEpKJ4ZVS9A78IxGlkr0Bw', 1, 0);
INSERT INTO `adusers` VALUES (34, 'anhdao', '1897a69ef451f0991bb85c6e7c35aa31', NULL, '2013-06-13 06:32:16', 0, '1970-01-01 00:00:00', 'dqViWU7FOLc6Uqwy9bUi1drYKMRbFaMj', 1, 0);
INSERT INTO `adusers` VALUES (35, 'kimlien_1289', '8739dbb4e98d03cb699bee56f754ff83', NULL, '2013-06-13 11:12:48', 0, '1970-01-01 00:00:00', 'KB4uw8kaviiGEggLzWxoUbWMb6Xx8ITh', 1, 0);
INSERT INTO `adusers` VALUES (36, 'znhat_tanz2', '9e7b4a7588b77e26de5bcaae9c8705bb', NULL, '2013-06-13 14:17:44', 0, '1970-01-01 00:00:00', 'u7W8VUNmiSqsEDVBZxcGOBOc0xhwAms', 1, 0);
INSERT INTO `adusers` VALUES (37, 'kenddy', '1f1e1ba8d47041b559d6d68442e4dc92', NULL, '2013-06-13 11:35:41', 0, '1970-01-01 00:00:00', '4hnWVw6dSTPBvcNjwNQjwAxEfx3NsTK', 1, 0);
INSERT INTO `adusers` VALUES (38, 'znhat_tanz1', '9e7b4a7588b77e26de5bcaae9c8705bb', NULL, '2013-06-13 13:57:25', 0, '1970-01-01 00:00:00', 'Ob1eAdwhnnTL5dLISJfr0eyxyvHrAcq', 1, 0);
INSERT INTO `adusers` VALUES (39, 'vtm172', '3c4aed76bf75063e57b627e1a8c3da38', NULL, '2013-06-13 14:42:08', 0, '1970-01-01 00:00:00', 'k0sHhnPqBSBgBCiY1bPupeRbrnnDYvw', 1, 0);
INSERT INTO `adusers` VALUES (40, 'znhat_tanz3', '9e7b4a7588b77e26de5bcaae9c8705bb', NULL, '2013-06-13 14:42:15', 0, '1970-01-01 00:00:00', 'BnMJcBxEnO3QwhqqKSlLsk6aNHR3Tnp', 1, 0);
INSERT INTO `adusers` VALUES (41, 'kimchi', 'e10adc3949ba59abbe56e057f20f883e', NULL, '2013-06-13 14:48:14', 0, '1970-01-01 00:00:00', 'eMQPGcJaY0TQUqXTNYmmNMJxa2Nbebn', 1, 0);
INSERT INTO `adusers` VALUES (42, 'kimchi89', 'e10adc3949ba59abbe56e057f20f883e', NULL, '2013-06-13 14:57:16', 0, '1970-01-01 00:00:00', 'aoszGrLlaEgbl82f8NcWKriwJzbFdi2', 1, 0);
INSERT INTO `adusers` VALUES (43, 'vosidaonha', 'b68a10cacbeddfc42ba33e5e2b912580', NULL, '2013-06-13 15:06:39', 0, '1970-01-01 00:00:00', 'qZiAfOCftaDSVvefNrNpgMwOfRJ6wG49', 1, 0);
INSERT INTO `adusers` VALUES (44, 'langtudatinh', '1d7331dc223c385a677feb6d3f5201c0', NULL, '2013-06-13 23:54:41', 0, '1970-01-01 00:00:00', 'uK4n0tIMzKgBLX6Of7mXa3BsEWxiEhps', 1, 0);
INSERT INTO `adusers` VALUES (45, 'nguyenlien', '7dfcc411778bff143416f917182492f1', NULL, '2013-06-14 08:45:28', 0, '1970-01-01 00:00:00', 'cnU7BfKFnwtV9EFlziqWXBq5Ce7NFt4W', 1, 0);
INSERT INTO `adusers` VALUES (46, 'Hoang Kha', '454c22ed42fc40126addf21ff31c9cbf', NULL, '2013-06-14 10:06:14', 0, '1970-01-01 00:00:00', 'q1bNICBrq21a9inipx5EThEPqw9eCdeV', 1, 0);
INSERT INTO `adusers` VALUES (47, 'thiensu1504', '8fff84b2dbd2b6c4e85db323cac551b0', NULL, '2013-06-14 10:08:10', 0, '1970-01-01 00:00:00', 'Qjwv3TjQCTMi6jcqPlErK0df7ixCxVZN', 1, 0);
INSERT INTO `adusers` VALUES (48, 'anh hai', '202cb962ac59075b964b07152d234b70', NULL, '2013-06-14 10:26:22', 0, '1970-01-01 00:00:00', '5bpCYxhRN6EG1oRXhMhRQDzrnBBJtuGC', 1, 0);
INSERT INTO `adusers` VALUES (49, 'hoahongxanh', 'a2b332041905b387bfb105f815a860ac', NULL, '2013-06-14 10:26:37', 0, '1970-01-01 00:00:00', 'ajp1QuIjXQRoFOzd4myMzV6Q5kpylb6H', 1, 0);
INSERT INTO `adusers` VALUES (50, 'thanhha', '2c87cce272763ad6ba59975c81721722', NULL, '2013-06-14 10:31:05', 0, '1970-01-01 00:00:00', 'SX5157ckSpyQLiwW7BohWAjhANCd85ew', 1, 0);
INSERT INTO `adusers` VALUES (51, 'toanle13', '81df6e69c88a7167822ec549c891ca9b', NULL, '2013-06-14 10:41:57', 0, '1970-01-01 00:00:00', 'o5tiKDJwgaIM7vSYnu0RL4xoWT8N3aka', 1, 0);
INSERT INTO `adusers` VALUES (52, 'ThuDinh', 'd639755a8be399e95a2b4bb906977542', NULL, '2013-06-14 12:37:35', 0, '1970-01-01 00:00:00', 'z1TXdNLPvRb3POjkfUTYS0RBAN6NyMj', 1, 0);
INSERT INTO `adusers` VALUES (53, 'lenhung', 'e297b8df4a996ac1f99fe29fff7c0165', NULL, '2013-06-14 12:47:34', 0, '1970-01-01 00:00:00', 'TNBBH6pSqrAzFDHUM7E2KFlPcmQReWm', 1, 0);
INSERT INTO `adusers` VALUES (54, 'nguyenlinh', 'e10adc3949ba59abbe56e057f20f883e', NULL, '2013-06-14 14:58:49', 0, '1970-01-01 00:00:00', 'twCW4qYnTkiKwQwvXUTfW8ESQjzqXja', 1, 0);
INSERT INTO `adusers` VALUES (55, 'kuppj.top', '9426e669db5eebf21dbf10259c4c79ad', NULL, '2013-06-14 15:03:23', 0, '1970-01-01 00:00:00', 'lIx9jVBPqFdcpRAWkLl2eFVih7Y6o3Lk', 1, 0);
INSERT INTO `adusers` VALUES (56, 'Autumn', '32f250293f87214b5da3031ecb71ce36', NULL, '2013-06-14 15:07:11', 0, '1970-01-01 00:00:00', 'z1ZzU3gKafeZD7evQRtvjOf7xAOIvAiV', 1, 0);
INSERT INTO `adusers` VALUES (57, 'PHUONGDUNG', '30e48e56e751ec03c3ffa6a29017a585', NULL, '2013-06-14 15:43:10', 0, '1970-01-01 00:00:00', 'QzfHoVEwiPk6ktrtRZP2c2dhDBdZyDEg', 1, 0);
INSERT INTO `adusers` VALUES (58, 'dungchi89', 'dc607101eda2359a6ee2edf2071eb987', NULL, '2013-06-14 19:00:29', 0, '1970-01-01 00:00:00', 'tWQ13RFxpAL2w2Xzz6hrBudj524ljBa', 1, 0);
INSERT INTO `adusers` VALUES (59, 'nickcomvn', '34998263f00c0fa0c73d3e1a396e2168', NULL, '2013-06-14 21:43:00', 0, '1970-01-01 00:00:00', '5eyRUDgZsrZKQWSHvyhuOWZ38puw1zi', 1, 0);
INSERT INTO `adusers` VALUES (60, 'quynguyenvan', 'f169fcfb7ebb80e1b6920b6c79e3e634', NULL, '2013-06-14 22:43:24', 0, '1970-01-01 00:00:00', 'CwEIg5nReMimqNFMLyDvwGInA0T91K44', 1, 0);
INSERT INTO `adusers` VALUES (61, 'hieudtd48', 'c653afc16f7aa7f1216af4d7966699eb', NULL, '2013-06-14 23:05:17', 0, '1970-01-01 00:00:00', 'aC5vBRZOjfdWvyFVZza68RQAusOmEh3', 1, 0);
INSERT INTO `adusers` VALUES (62, 'tata', '20ccb2dca001c2e4fe32cf20badd572f', NULL, '2013-06-14 23:06:49', 0, '1970-01-01 00:00:00', 'Itdeiwos8WHhLIGv0jRUfUFGDexSJ', 1, 0);
INSERT INTO `adusers` VALUES (63, 'hoanhngoc', '4fc3d2e72f0cb65eb30326154b5ff896', NULL, '2013-06-14 23:34:18', 0, '1970-01-01 00:00:00', 'OE5ShDzWwpggXVXtZsk1P2SU6p0ag4wy', 1, 0);
INSERT INTO `adusers` VALUES (64, 'annahhanh', '44727ee83d9052d3b574a59f02883507', NULL, '2013-06-15 00:20:31', 0, '1970-01-01 00:00:00', 'cXfZFwKDs3A2Yc3b6GCl9ua6mQIxIPZK', 1, 0);
INSERT INTO `adusers` VALUES (65, 'nguyenboly', 'a15a190af6f131df5d3add26f9f7cc72', NULL, '2013-06-15 07:41:18', 0, '1970-01-01 00:00:00', 'GmP81YwMkc77Ytni4MHTTEOEiSoqw8wS', 1, 0);
INSERT INTO `adusers` VALUES (66, 'tankiemnguc', '3a55772ff6419d682f9d19701a9e4e1f', NULL, '2013-06-15 12:06:55', 0, '1970-01-01 00:00:00', 'bTep5eTAP7ELp7eWC9NrGfNqdeNRXsx1', 1, 0);
INSERT INTO `adusers` VALUES (67, 'meodencm', '5ae48588c88c8b9def5d18fb3227a092', NULL, '2013-06-15 13:43:57', 0, '1970-01-01 00:00:00', 'rgfdetOeFJmWDu7pUsx7x0c0zumL5O8g', 1, 0);
INSERT INTO `adusers` VALUES (68, 'piggy30590', '3dd7da1945137f4c231c9df2fa961a90', NULL, '2013-06-15 17:15:15', 0, '1970-01-01 00:00:00', 'BIhWIs1vwucj02bIynAJ0p52uzHUM2V5', 1, 0);
INSERT INTO `adusers` VALUES (69, 'vantrivov', '04a12a58769910f9460660c4bd505965', NULL, '2013-06-15 20:01:32', 0, '1970-01-01 00:00:00', 'xuEUs2h2HJG9wJh9RmISchdQl5k1ujBM', 1, 0);
INSERT INTO `adusers` VALUES (70, '01274816660', '46f94c8de14fb36680850768ff1b7f2a', NULL, '2013-06-15 21:32:44', 0, '1970-01-01 00:00:00', 'gvvEhoqBaZE895mAf0j6Xbiz0HSiua', 1, 0);
INSERT INTO `adusers` VALUES (71, 'giangphudung', '0535cabc1c12fa917fed45ff64d97e85', NULL, '2013-06-15 23:02:18', 0, '1970-01-01 00:00:00', 'KzpiBSpdS97jgZFqqV107SfYpUmdgvp', 1, 0);
INSERT INTO `adusers` VALUES (72, 'phamsuong89', '40ab41f8191c443fa52b4cebb5482b0b', NULL, '2013-06-15 23:20:20', 0, '1970-01-01 00:00:00', 'gEebVW3sDBNQGVlzASL5bQRqaFIlWNDW', 1, 0);
INSERT INTO `adusers` VALUES (73, 'langmay', 'b2782025b25c66bea3426babbdc75d07', NULL, '2013-06-15 23:24:34', 0, '1970-01-01 00:00:00', 'VRkig3cFJUWCzzS6CHpG1D8JYyWgvX9I', 1, 0);
INSERT INTO `adusers` VALUES (74, 'vanmui255', '89a13ff6595e8d4d5e48d70115f05333', NULL, '2013-06-16 07:31:31', 0, '1970-01-01 00:00:00', 'O2P3qmgoxPpmJHL4tWAZWJxswGLHIe', 1, 0);
INSERT INTO `adusers` VALUES (75, 'me_blackhole', 'a3e0defdc88d16ac4da461d4ba6fe773', NULL, '2013-06-16 07:41:38', 0, '1970-01-01 00:00:00', 'TmCVptAvKpSTDXkkFHtaCswjsYG6ZGAi', 1, 0);
INSERT INTO `adusers` VALUES (76, 'ngoctuanqn', 'efe0cd2a7db00bf33414f30ca71bf39a', NULL, '2013-06-16 08:30:37', 0, '1970-01-01 00:00:00', 'FEPwAOYypWFmsTEEmIOrlNaa7JIGtLV', 1, 0);
INSERT INTO `adusers` VALUES (77, 'online10h', '3fc42c78a3e84018c79eeaba58f8c055', NULL, '2013-06-16 09:26:03', 0, '1970-01-01 00:00:00', 'ohbEkJuofooxHwm5QwO5hjwiFjJ6wSEd', 1, 0);
INSERT INTO `adusers` VALUES (78, 'phan thu', '9eaa1f70760b05bbfc0fdbcf7595d0fd', NULL, '2013-06-16 10:06:14', 0, '1970-01-01 00:00:00', 'Yqsxu2qOxwFDjAR4wsjWeBxq7yA7PEyH', 1, 0);
INSERT INTO `adusers` VALUES (79, 'Hoang Nguyen', '27854baaa30142b4d6f5978fd33bef9b', NULL, '2013-06-16 11:05:59', 0, '1970-01-01 00:00:00', 'AwsuO49bPGDi3uiD2UUGbel5UtdVNYpJ', 1, 0);
INSERT INTO `adusers` VALUES (80, 'thanhthanh', '1546c79584c491e6f820d523f735f543', NULL, '2013-06-16 17:06:00', 0, '1970-01-01 00:00:00', 'LQNXhWMKewNywsH1VS1Bddr5w6Y75s62', 1, 0);
INSERT INTO `adusers` VALUES (81, 'kelanhlung', '703db5679f155f64a5484cbaef4ad0a5', NULL, '2013-06-16 17:06:34', 0, '1970-01-01 00:00:00', 'ulEmZhKFMaUrQ8KfDwHY2Lf6Rtdo9afw', 1, 0);
INSERT INTO `adusers` VALUES (82, 'cloan79', '0a9edf7f26c19f74d846519f3ed5c835', NULL, '2013-06-16 17:11:38', 0, '1970-01-01 00:00:00', 'HhQ8nfQpn9FJZJqFLOm5WX6gWkVOQrp', 1, 0);
INSERT INTO `adusers` VALUES (83, 'hahoang1', 'c14bfbe154bd6851c265f6b84c75d030', NULL, '2013-06-16 19:35:57', 0, '1970-01-01 00:00:00', '3rtIYjufEXtNTo98k6WaImRYLNuiCK71', 1, 0);
INSERT INTO `adusers` VALUES (84, 'quoc hung', '2c19c717eeb7edefec2f76dc948503c2', NULL, '2013-06-16 19:45:30', 0, '1970-01-01 00:00:00', 'jwqwM6ETdK3llb9r1fWc5sU0whW3PIt', 1, 0);
INSERT INTO `adusers` VALUES (85, 'tranduc', '8839bda9dbdc0e28f2979ec40f139823', NULL, '2013-06-16 20:17:02', 0, '1970-01-01 00:00:00', 'bu6iDT8WtMJjD0pUbDxwTZ9bSCvoIX1U', 1, 0);
INSERT INTO `adusers` VALUES (86, 'huycan79', 'e26a6aff2ce94b4f767e45caf9be7a4f', NULL, '2013-06-16 20:47:04', 0, '1970-01-01 00:00:00', 'oYK4fY4c7gKLostOaFxyJUIiCnpFWG', 1, 0);
INSERT INTO `adusers` VALUES (87, 'nana8189', '4e5b6b13c995cae9d0b31cb8bc5b6c87', NULL, '2013-06-16 23:22:57', 0, '1970-01-01 00:00:00', 'D7vwUMSqJ56cawFQUQ9LFWX4hB3rAqwo', 1, 0);
INSERT INTO `adusers` VALUES (88, 'kih123', '8ad597714edd9b100184d247523f27ac', NULL, '2013-06-17 07:37:35', 0, '1970-01-01 00:00:00', 'hosR3sMOUM55RFa60bRrOBAXEfwbNuqR', 1, 0);
INSERT INTO `adusers` VALUES (89, 'quyethtd', '17630a89a7b984512d408c8d1802bc12', NULL, '2013-06-17 12:27:52', 0, '1970-01-01 00:00:00', 'vNBlv4NFklBtF9ZZObrKP6QLhwNJUBm', 1, 0);
INSERT INTO `adusers` VALUES (90, 'lqdinhdn', '00b4e5aae786cd6bbc91052b94eea041', NULL, '2013-06-17 14:24:35', 0, '1970-01-01 00:00:00', 'JDMiuloG42wvCajdDuGaXqTYBrnc2JrS', 1, 0);
INSERT INTO `adusers` VALUES (91, 'saobang1210', '402cbe07c618b3e2d8847e2a1f60eef6', NULL, '2013-06-17 15:06:52', 0, '1970-01-01 00:00:00', 'n6W1G4B3QX9JF98RQMwy2WN5yw0FGXg', 1, 0);
INSERT INTO `adusers` VALUES (92, 'ngocvyktv', '80c0ced343dba22af7efd9ce7964405b', NULL, '2013-06-17 16:30:06', 0, '1970-01-01 00:00:00', 'jFa3CblkWzwAI21V0FwIqDQ5wZGL4hXZ', 1, 0);
INSERT INTO `adusers` VALUES (93, 'vankt78', '4ebc11eaa315bb4074e1321c93ec4f85', NULL, '2013-06-17 17:00:37', 0, '1970-01-01 00:00:00', 'UOMdkzY0KpWnvMzwC3CDNV7jewSa5ho7', 1, 0);
INSERT INTO `adusers` VALUES (94, 'lackyb0y2013', 'b7b584d4bfa4c9bed5585f4632e3615c', NULL, '2013-06-17 19:47:03', 0, '1970-01-01 00:00:00', 'tq208NbQPNZcwbWo2YtKyxFGIEoYHiC', 1, 0);
INSERT INTO `adusers` VALUES (95, 'ltphanvl', 'a741a125faba34fff715a1662eb8c215', NULL, '2013-06-18 09:42:39', 0, '1970-01-01 00:00:00', 'OUWRCMusmEycIZs6Peag18ALCphzUJ5', 1, 0);
INSERT INTO `adusers` VALUES (96, 'THAINGUYEN85', 'f6047a81823060eb59b4dd9d9a4ed28c', NULL, '2013-06-18 12:59:34', 0, '1970-01-01 00:00:00', 'iNx9mYfK2eYFNoZvUvWdTfJLW02JOWqQ', 1, 0);
INSERT INTO `adusers` VALUES (97, 'nina', '79c9c9819717332f9b5205cffe9ac243', NULL, '2013-06-18 15:30:56', 0, '1970-01-01 00:00:00', 'Ik0pdpvn2WHg5Kj4npodrnqWjxysNmwK', 1, 0);
INSERT INTO `adusers` VALUES (98, 'HIEUNGHIA', 'b4e225b73fd2749dcf780c0e79f96df9', NULL, '2013-06-18 16:59:09', 0, '1970-01-01 00:00:00', 'QiXW6bOmgtw9divQRrQbE1qwMpBcmico', 1, 0);
INSERT INTO `adusers` VALUES (99, 'kimchi12', 'dc607101eda2359a6ee2edf2071eb987', NULL, '2013-06-18 17:10:09', 0, '1970-01-01 00:00:00', 'hPpHb6E9TvOVH2Gn2c3OpJorMMnfKO', 1, 0);
INSERT INTO `adusers` VALUES (100, 'huyvu12', 'dc607101eda2359a6ee2edf2071eb987', NULL, '2013-06-18 17:14:12', 0, '1970-01-01 00:00:00', 'V1VBosDPZLF2cZ7cqZU7aiN7Z2O179l', 1, 0);
INSERT INTO `adusers` VALUES (101, 'daonhi', 'dc607101eda2359a6ee2edf2071eb987', NULL, '2013-06-18 17:45:49', 0, '1970-01-01 00:00:00', 'woWTKWzJFY1LoSwoZZoqvqHxYEqOD0', 1, 0);
INSERT INTO `adusers` VALUES (102, 'congthanh', 'dc607101eda2359a6ee2edf2071eb987', NULL, '2013-06-18 17:46:29', 0, '1970-01-01 00:00:00', 'ErBHpsk5xAW5JjjEPiCucmg4xD3ebx0W', 1, 0);
INSERT INTO `adusers` VALUES (103, 'chugiatuan', '4e5d8c0136ff7904d0b5ac0e903dc04d', NULL, '2013-06-18 18:48:59', 0, '1970-01-01 00:00:00', 'F8WtsBvYbdBM5ffqGa2wyJDWR2fSc0dL', 1, 0);
INSERT INTO `adusers` VALUES (104, 'laogiatuyen', 'ce9ccf6f5194935a0bacd71bdb46013a', NULL, '2013-06-18 20:19:10', 0, '1970-01-01 00:00:00', 'YkItp59VwqIkc81TbvYgTvfd2s3loGvV', 1, 0);
INSERT INTO `adusers` VALUES (105, 'kuboy', 'b12d29e5bcb4ebf00e05f6fdc7d563e6', NULL, '2013-06-18 23:46:39', 0, '1970-01-01 00:00:00', 'uWZmpadu8n3jgemb0VNTsnaAqAuzFnOQ', 1, 0);
INSERT INTO `adusers` VALUES (106, 'phuchoai1990', '35f58fde4c4fdd7e928380e0224becfe', NULL, '2013-06-19 10:08:34', 0, '1970-01-01 00:00:00', 'TztwsD6BcJpQiwW3wcji99WE4AUybKUb', 1, 0);
INSERT INTO `adusers` VALUES (107, 'bonmat1405', '25f9e794323b453885f5181f1b624d0b', NULL, '2013-06-19 12:16:39', 0, '1970-01-01 00:00:00', 'nwTOYra564vJZxOO26PaWl9ecN77rISV', 1, 0);
INSERT INTO `adusers` VALUES (108, 'tanvanloi', '3993b6468514d971c2172618fb0c7783', NULL, '2013-06-19 16:05:56', 0, '1970-01-01 00:00:00', 'KXSIErzjSwv7yTq14BTjr7c9xBjP0qM', 1, 0);
INSERT INTO `adusers` VALUES (109, 'kimchi8', 'dc607101eda2359a6ee2edf2071eb987', NULL, '2013-06-20 08:13:26', 0, '1970-01-01 00:00:00', 'wB6EIk8eVRKX6yWqJOrr5TqjK9GfZTxj', 1, 0);
INSERT INTO `adusers` VALUES (110, '2583062', '9613bcc06ccc2faf6327b4bc9461bab4', NULL, '2013-06-20 08:46:38', 0, '1970-01-01 00:00:00', 'wXulbPhCwNyTFJXuiqEhWD9Mwo7bJEt6', 1, 0);
INSERT INTO `adusers` VALUES (111, 'yoyo', 'ff22bec44c1f1d09ff20051b93f8dbdb', NULL, '2013-06-21 09:59:33', 0, '1970-01-01 00:00:00', 'LFXhw4GywRc1Y6Dk2oWZZqqySwCpn2BK', 1, 0);
INSERT INTO `adusers` VALUES (112, 'meoxinh_182', 'c026f5d9830305b3c41edb31fb2f652b', NULL, '2013-06-21 11:39:08', 0, '1970-01-01 00:00:00', 'BZekoD0Yk6Qc8oswdxBBQ5tOWvdezOag', 1, 0);
INSERT INTO `adusers` VALUES (113, 'ngoclan08099', '810b1fbacf878ed6c2a6b8e7e4db29c9', NULL, '2013-06-21 23:50:21', 0, '1970-01-01 00:00:00', 'NW79s2aMJX9RNorSwgTxJ84wgnozKzI', 1, 0);
INSERT INTO `adusers` VALUES (114, 'Hồng Trúc', 'f63f4fbc9f8c85d409f2f59f2b9e12d5', NULL, '2013-06-22 11:27:53', 0, '1970-01-01 00:00:00', 'CwWoIsD39WVDIrwUWkaxMChdl81iOx9', 1, 0);
INSERT INTO `adusers` VALUES (115, 'tuquynh89', '827ccb0eea8a706c4c34a16891f84e7b', NULL, '2013-06-24 18:00:23', 0, '1970-01-01 00:00:00', 'kFYhlWHhri3Lg2WihLnyXD2mpZhJ5oJ7', 1, 0);
INSERT INTO `adusers` VALUES (116, '1234', 'e10adc3949ba59abbe56e057f20f883e', NULL, '2013-06-24 02:03:55', 0, '1970-01-01 00:00:00', 'Lex45qqpjKSaiGzmJkgVQgNauNfSgY1n', 1, 0);
INSERT INTO `adusers` VALUES (117, 'yunaduong', 'cd6f0383290081624c22b8dc1fbbd066', NULL, '2013-06-24 08:16:59', 0, '1970-01-01 00:00:00', 'tiuMfwTXTpaW8KXZYP7GDGp1zZsLwXY2', 1, 0);
INSERT INTO `adusers` VALUES (118, 'adsvn2010', '465dd9264f5f5100e0eb6f0a0f7427bf', NULL, '2013-06-24 22:11:53', 0, '1970-01-01 00:00:00', 'wqXDlemRLuwrgGdjkPRqPPNKfsdalF7P', 1, 0);
INSERT INTO `adusers` VALUES (119, 'Rafael', '79f114f54ce5c5f7304dd5b38a3b45d9', NULL, '2013-06-25 09:21:36', 0, '1970-01-01 00:00:00', 'cPx7ndRNzGkhSafWMBFV1SC7vXM937', 1, 0);
INSERT INTO `adusers` VALUES (120, 'martin85nhan', 'a9626b171304e9dc31cd56e7160869fc', NULL, '2013-06-25 15:05:05', 0, '1970-01-01 00:00:00', 'xFtQvGw3Hgp0yG2ongIyHhIgunnGbtG', 1, 0);
INSERT INTO `adusers` VALUES (121, 'abc090', 'fc6f72302941916bc0b28b1853e316b9', NULL, '2013-06-25 16:19:33', 0, '1970-01-01 00:00:00', 'fYNuwytJTr08BogDy83qMFNWj3ET1Vrq', 1, 0);
INSERT INTO `adusers` VALUES (122, 'tinolinh', 'e10adc3949ba59abbe56e057f20f883e', NULL, '2013-06-25 20:35:39', 0, '1970-01-01 00:00:00', 'YpTDJ2xJkqvVhFY8fqfSiUClZ22PW8', 1, 0);
INSERT INTO `adusers` VALUES (123, 'huuphuc27', '15eeb0a2f05e21b05efbc635a9ec68b1', NULL, '2013-06-25 22:27:25', 0, '1970-01-01 00:00:00', '89RSkSUAALKgiHCs8nnDq7XyG33GqOj', 1, 0);
INSERT INTO `adusers` VALUES (124, 'dvtin002', 'e10adc3949ba59abbe56e057f20f883e', NULL, '2013-06-25 22:57:00', 0, '1970-01-01 00:00:00', 'SyaywGEkNwBD0rhCFWikjRxItl6WlDOI', 1, 0);
INSERT INTO `adusers` VALUES (125, 'minhnguyen', 'a1da25145adb384737b222aa2d002ad5', NULL, '2013-06-26 09:15:34', 0, '1970-01-01 00:00:00', 'WskeDb2Udmcd7jbtEp1WsGWU5F4uBEvv', 1, 0);
INSERT INTO `adusers` VALUES (126, 'huynhdaihai', '395559ff1e0d0a951ec1fcc9244f2a6d', NULL, '2013-06-26 13:30:09', 0, '1970-01-01 00:00:00', 'ZSRbDeuxEorWxmo0vMmu0dmj9beS5hX', 1, 0);
INSERT INTO `adusers` VALUES (127, 'nct_tv', 'd89e6774d6d555296c172eedfae40669', NULL, '2013-06-27 20:00:28', 0, '1970-01-01 00:00:00', 'SmkZzDF7NORkruMJ35Awdtuj9sWuveV', 1, 0);
INSERT INTO `adusers` VALUES (128, 'pink100311', '9fe60ac3c57b319678ebffe0d5a7c9bd', NULL, '2013-06-26 16:53:38', 0, '1970-01-01 00:00:00', '3BYjqR9JWgj5g5uobu61sk8PVuJmMH7Z', 1, 0);
INSERT INTO `adusers` VALUES (129, 'pagethu', '25f9e794323b453885f5181f1b624d0b', NULL, '2013-06-26 14:27:28', 0, '1970-01-01 00:00:00', 'hUBlVvxDOJuQSsbqdo3pPOxjlEjbwx8I', 1, 0);
INSERT INTO `adusers` VALUES (130, 'gdmilo2012', 'd517eb45955e70d5bc34b4a3808fc011', NULL, '2013-06-26 15:09:54', 0, '1970-01-01 00:00:00', 'TvEhyg7aYYb0k1AsztnfFlBy0XTL2fVF', 1, 0);
INSERT INTO `adusers` VALUES (131, 'soccon0903', '619b71a6004f574ee7505452ec64b0a5', NULL, '2013-06-26 16:29:12', 0, '1970-01-01 00:00:00', 'hhwBycU2fRdhP8LRGWmWOgaAFU4ze1A9', 1, 0);
INSERT INTO `adusers` VALUES (132, 'namfxpro', '3a2bebcb3044e40231f2aab742542525', NULL, '2013-06-26 20:10:30', 0, '1970-01-01 00:00:00', 'bx0yFKqofyUUWuIAbojqiVwbKFkF0WWY', 1, 0);
INSERT INTO `adusers` VALUES (133, 'thuthuype', '5a127cc1d4aab8aa7aa26262188dcad3', NULL, '2013-06-26 21:04:49', 0, '1970-01-01 00:00:00', 'ZDK4x1jAZww9wI1NGwBUTAlvq7uEFgl', 1, 0);
INSERT INTO `adusers` VALUES (134, 'lehonghoa', 'e5380c424b167308787dcb056b423731', NULL, '2013-06-26 21:41:57', 0, '1970-01-01 00:00:00', 'YcWhUpTKXDCSCK8YVITzFIgHJ77pICFQ', 1, 0);
INSERT INTO `adusers` VALUES (135, 'huynh992006', '876228d3a170771defe1bf06547adb3d', NULL, '2013-06-26 21:42:31', 0, '1970-01-01 00:00:00', 'MBkW7Avw6f0Zg8WXg3C4KVPqvZLjVz', 1, 0);
INSERT INTO `adusers` VALUES (136, 'sang_galu', '07695a01cc55a1956dbea6c707fe9920', NULL, '2013-06-26 23:20:54', 2, '1970-01-01 00:00:00', '7ykAkwP2UrTtRdP9HOW2lqzZtAIfyxW', 1, 0);
INSERT INTO `adusers` VALUES (137, 'peliti', 'f25ed10c641c316d69e7ae7e58976214', NULL, '2013-06-26 23:31:28', 0, '1970-01-01 00:00:00', 'G2wnl4nPfRTo1qlng2VZF5l2N6LmJfK9', 1, 0);
INSERT INTO `adusers` VALUES (138, 'zackypv', '5c84bac3d02c8d123a1f76edeb159d27', NULL, '2013-06-26 23:47:23', 0, '1970-01-01 00:00:00', 'XpVckIVlHkTFxQOLFKqdhqpTaFvMANtq', 1, 0);
INSERT INTO `adusers` VALUES (139, 'hoakimke10', '92d972459451eef11ce4ea78fadc0042', NULL, '2013-06-27 00:39:38', 0, '1970-01-01 00:00:00', 'd8NNwXUA4g9pdVwNToEoF0ihRwyGZItC', 1, 0);
INSERT INTO `adusers` VALUES (140, 'diemvt', 'fcea920f7412b5da7be0cf42b8c93759', NULL, '2013-06-27 10:57:42', 0, '1970-01-01 00:00:00', 'YwPJSNk4DwgAKmUTGdScvNNjH2Tc3Ngo', 1, 0);
INSERT INTO `adusers` VALUES (141, 'minhhv', '17f473072e1774bd18b1948378aa7701', NULL, '2013-06-27 11:47:26', 0, '1970-01-01 00:00:00', 'DqRVyHNoMNjKjXEllbRghY3E3SexpDi', 1, 0);
INSERT INTO `adusers` VALUES (142, 'wishwaswind', 'b133022ad8241c26a7e15be829d535ab', NULL, '2013-06-27 12:28:37', 0, '1970-01-01 00:00:00', 'ae0aloO91xk53Z0lVUGSy5cawYQrEBA', 1, 0);
INSERT INTO `adusers` VALUES (143, 'he0ng0c1741', '2105891a1032833c60364657e4987169', NULL, '2013-06-27 13:33:56', 0, '1970-01-01 00:00:00', 'ShubQ2RLfthjGP3PxCuNS8RymjPOMW3e', 1, 0);
INSERT INTO `adusers` VALUES (144, 'lienle288', '002c1701ed739f31fe09eecd8b7051d5', NULL, '2013-06-27 14:37:14', 0, '1970-01-01 00:00:00', 'gRVWAacBrKlngfeWFblowhBB8I3rD17', 1, 0);
INSERT INTO `adusers` VALUES (145, 'donutchambi', '324a28e7c614c28e09176732afd58eab', NULL, '2013-06-27 15:16:09', 0, '1970-01-01 00:00:00', 'Lw4RHpKlTwGUTea73xW2oFkhsHjadVup', 1, 0);
INSERT INTO `adusers` VALUES (146, 'thanhphong2710', '5d4c256a5cf3543ee03ab307be281b23', NULL, '2013-06-27 15:23:21', 0, '1970-01-01 00:00:00', 'zErWXj0QwFrJbUHQIWaaVBPjGLA2rSOq', 1, 0);
INSERT INTO `adusers` VALUES (147, 'bobobibi', 'b04bd8ae1c8d7be20de1f6c1be83f6e7', NULL, '2013-06-27 15:47:29', 0, '1970-01-01 00:00:00', 'f3myqNSO4sXeg1CzSIxttUBNqrHgQhH', 1, 0);
INSERT INTO `adusers` VALUES (148, 'phanletam', '3c987e017658477b9409a24fc105dc8e', NULL, '2013-06-27 15:49:56', 0, '1970-01-01 00:00:00', 'JewD7wJiYEIJ5y33h292ebU9QMqh28R', 1, 0);
INSERT INTO `adusers` VALUES (149, 'nvhuu_1210', '8615fc60d9a9cb9ff4caa12429f4f799', NULL, '2013-06-27 15:58:16', 0, '1970-01-01 00:00:00', 'rwEcrx1ZVLefZhR0bFc6m60EBweVJw7m', 1, 0);
INSERT INTO `adusers` VALUES (150, 'tduong90', 'a906449d5769fa7361d7ecc6aa3f6d28', NULL, '2013-06-27 16:36:10', 0, '1970-01-01 00:00:00', 'AyxURXrXMUn6LsgTZm5mvF4zAhDRhWr', 1, 0);
INSERT INTO `adusers` VALUES (151, 'hieusancher', '5d5f822083a31bf23d0a3bad930371d7', NULL, '2013-06-27 19:40:16', 0, '1970-01-01 00:00:00', 'afKOFHwapzxJWC6DJZ0OjhqYWWtS22', 1, 0);
INSERT INTO `adusers` VALUES (152, 'ptdung_93', '22407759887e3d5e938984428cfba87e', NULL, '2013-06-27 20:05:29', 0, '1970-01-01 00:00:00', '1RE1jtwGPXbfD2oWD7wj7ba36d2cxo4h', 1, 0);
INSERT INTO `adusers` VALUES (153, 'gauhuybebong', '22b5a6fee0962bc1a96b751a2e5cefdb', NULL, '2013-06-27 20:54:30', 0, '1970-01-01 00:00:00', 'YCfZDkTzcOwaE97lDlak9lp84UB5fN', 1, 0);
INSERT INTO `adusers` VALUES (154, 'linhmtk8', '9f839e067bfd0a2b201ee5aedd1c064b', NULL, '2013-06-27 21:38:13', 0, '1970-01-01 00:00:00', 'GE1KRmqWkwNud8x7wCiIz4BtxXNNvWC', 1, 0);
INSERT INTO `adusers` VALUES (155, 'ThuyNgan', 'b0c01960a914ba09eb06d1f5f354f935', NULL, '2013-06-27 21:40:36', 0, '1970-01-01 00:00:00', 'R6E52j8XanxfiWWgVPcC8NuPk9zOBwQw', 1, 0);
INSERT INTO `adusers` VALUES (156, 'Thúy Ngân', 'b0c01960a914ba09eb06d1f5f354f935', NULL, '2013-06-27 21:51:36', 0, '1970-01-01 00:00:00', '1TLWigSkfl2HxcSUwjppathkphoHx13', 1, 0);
INSERT INTO `adusers` VALUES (157, 'bichyen12', '023c10d71ddbaf823b86b5a729fc0a05', NULL, '2013-06-27 22:04:00', 0, '1970-01-01 00:00:00', 'nqzQ0HN1iCAfXAEMPFSl8Mng9ZS2WF1C', 1, 0);
INSERT INTO `adusers` VALUES (158, 'rua234', '6c2c5d4716e99e874109452a34f45164', NULL, '2013-06-27 22:06:15', 0, '1970-01-01 00:00:00', 'SBoXZHjjdVLWGXXiPRXi6oteRfsD5CuQ', 1, 0);
INSERT INTO `adusers` VALUES (159, 'leepro2020', '06dc67758e6bd6f8b089aee4a915441e', NULL, '2013-06-27 22:27:28', 0, '1970-01-01 00:00:00', 'jrupaqZTUzP3UhoZZN5Jo9yt28WB0NhW', 1, 0);
INSERT INTO `adusers` VALUES (160, 'Hà Oanh', '7f02e96bebe814ea318f72cf7857a8ce', NULL, '2013-06-27 23:17:44', 0, '1970-01-01 00:00:00', 'S2bUUTE8N8INnSIgQGTs384ShjP25vX', 1, 0);
INSERT INTO `adusers` VALUES (161, 'lamngoc', 'abb52e451e7883dfe7841984f5e11b15', NULL, '2013-06-28 00:54:45', 0, '1970-01-01 00:00:00', 'DwrwBLxYS9nr5zBzTmNXAdRm0QONECR', 1, 0);
INSERT INTO `adusers` VALUES (162, 'dangtienht', '765779dcaad3f020cbb063383f464e02', NULL, '2013-06-30 11:02:56', 0, '1970-01-01 00:00:00', 'aCszQ1J8HkEUemYUT7mSN9B5PKDQcHO', 1, 0);
INSERT INTO `adusers` VALUES (163, 'khoinghiep56', 'f768eb613bbeefe864bb62c14947ded2', NULL, '2013-06-28 18:14:28', 0, '1970-01-01 00:00:00', 'pWGwe3JvQGshIQV49x5bBqAoAIa7lWW', 1, 0);
INSERT INTO `adusers` VALUES (164, 'namduongqnvn', '5b4d1818d703835eb552ac022100986b', NULL, '2013-06-28 20:34:12', 0, '1970-01-01 00:00:00', 'CWAoPgTz5eG8NEnmudD8Y343H2SqEmhI', 1, 0);
INSERT INTO `adusers` VALUES (165, 'cuongpg91', '884fd8f56c47a182b115156983747084', NULL, '2013-06-28 22:00:23', 0, '1970-01-01 00:00:00', 'wtGwSzr1CWUYJEUdIaOW8Vww3fMOHhV0', 1, 0);
INSERT INTO `adusers` VALUES (166, 'thanhmai9875', '0e2694c9d47e8ff62d86ee5f51eb18ba', NULL, '2013-06-28 22:56:04', 0, '1970-01-01 00:00:00', 'PZ9ZAxEMKvWpSy8laHccsUiMwczJgaP', 1, 0);
INSERT INTO `adusers` VALUES (167, 'Vuacodon', 'e67a83de78476473079ac5431e77a53b', NULL, '2013-06-29 00:19:53', 0, '1970-01-01 00:00:00', '3VnjXTXhbNNCzdBqiNc6ud1u8NMP9Y', 1, 0);
INSERT INTO `adusers` VALUES (168, 'boy93', 'a0a409660f3f47230535899ea7e3c4c1', NULL, '2013-06-29 08:46:14', 0, '1970-01-01 00:00:00', 'B8Vj2WeQx6LvBxBWO08X4TECSYDWzAJ', 1, 0);
INSERT INTO `adusers` VALUES (169, 'ntrinh2626', '1ec8400907e8e150590f3305bd2012cc', NULL, '2013-06-29 09:09:27', 0, '1970-01-01 00:00:00', 'Jb3kHUJEfp0gjs3Zos4f74QMsru8DoBK', 1, 0);
INSERT INTO `adusers` VALUES (170, 'thutrang1231', '4969844783712d2aae3f5eb229f57729', NULL, '2013-06-29 14:32:25', 0, '1970-01-01 00:00:00', 'E6ZNQmyKDqMgUfZL2p6XzCvD3WoaOW5v', 1, 0);
INSERT INTO `adusers` VALUES (171, 'trang1234', '093d71dd76f27e87c99a5f52b77bb181', NULL, '2013-06-29 14:40:31', 0, '1970-01-01 00:00:00', 'IuGaauGSM3fDwRJ58CCZPOssH4Jyet', 1, 0);
INSERT INTO `adusers` VALUES (172, 'phoenixkhai', 'f398d9c20757c5d0ba8551cdf158b90f', NULL, '2013-06-29 15:06:50', 0, '1970-01-01 00:00:00', 'I0rFD7aCltu1aW53rsuxWtbcqhTN6sw', 1, 0);
INSERT INTO `adusers` VALUES (173, 'hoamo0911', 'c6b1f58cd8658b38244d8a154d445ad4', NULL, '2013-06-29 20:01:52', 0, '1970-01-01 00:00:00', 'dPCIzQUW7WlOMU2mhyfS2lwNH8KYlho', 1, 0);
INSERT INTO `adusers` VALUES (174, 'ptdung', '7841a16f4f9707cd1edf8bdd99ce2f88', NULL, '2013-06-29 22:15:47', 0, '1970-01-01 00:00:00', '6V0NnXDAm8g54JBxJI5bomr6IEoqGuy', 1, 0);
INSERT INTO `adusers` VALUES (175, 'raovatsnew13', '732b187a959b876ebcfa1e3b002a5ae1', NULL, '2013-06-29 23:29:50', 0, '1970-01-01 00:00:00', 'LECogyMi1a0vANd9jwVFX0pg1ws62oOw', 1, 0);
INSERT INTO `adusers` VALUES (176, 'raovattsnew', '3bd2155376074be8ab20245656e0b620', NULL, '2013-06-29 23:55:51', 0, '1970-01-01 00:00:00', 'g5VgmRnWAVqWzWcuveh5cwSMxSFH88uR', 1, 0);
INSERT INTO `adusers` VALUES (177, 'boysitinh', '42a6e617b20cc45ace14a0a5594ab8dd', NULL, '2013-06-30 20:44:26', 0, '1970-01-01 00:00:00', 'WLizoC9gYBTZ6iLJxgZCyXcvthfeDz5W', 1, 0);
INSERT INTO `adusers` VALUES (178, 'tuananhpy92', '28932aedef48596f0583057fca923744', NULL, '2013-06-30 17:41:02', 0, '1970-01-01 00:00:00', '29BrZMMHmLiFrwiX7ldtjc4eh6EvWMg', 1, 0);
INSERT INTO `adusers` VALUES (179, 'thanhtuyet', '2ca266d6da14719f5c539ef3d5635246', NULL, '2013-06-30 22:31:49', 0, '1970-01-01 00:00:00', 'G3g9HzKapR6hwsFaWEc59XCMdFpP8j8a', 1, 0);
INSERT INTO `adusers` VALUES (180, 'ThaoPanda', '3caa351c65d84201501e7a65f91d1269', NULL, '2013-06-30 22:33:33', 0, '1970-01-01 00:00:00', 'ibONBlHwZw0GYb9g32ylBfPlcYev2v5S', 1, 0);
INSERT INTO `adusers` VALUES (181, 'Phạm Hồng', '7a0fd61e261cd2f8b63d9c1d7d344e90', NULL, '2013-06-30 22:54:30', 0, '1970-01-01 00:00:00', 'QxFw9Hg9LC6QSjb3Evmi1alTTBFI1TsM', 1, 0);
INSERT INTO `adusers` VALUES (182, 'sangkool', 'f915eef7d808f1d93e63b9e5ca652319', NULL, '2013-07-01 09:06:46', 0, '1970-01-01 00:00:00', 'uBaKw4Nww4pNfadknGWuA86lIApTLee', 1, 0);
INSERT INTO `adusers` VALUES (183, 'ngoisaodem_5311', 'e10adc3949ba59abbe56e057f20f883e', NULL, '2013-07-01 10:00:54', 0, '1970-01-01 00:00:00', 'r076zIklkoIY6ZyKwsEoXnUTgJLc1Xvq', 1, 0);
INSERT INTO `adusers` VALUES (184, 'kyodark93', 'b424ab21bd87395b3889aadf66f2a304', NULL, '2013-07-01 10:28:43', 0, '1970-01-01 00:00:00', 'F6xZIq9m0eLtHW6VJcxMknBCCqQOdY8q', 1, 0);
INSERT INTO `adusers` VALUES (185, 'poonlove93', 'ccdc6d3f61eed00e6d1afb62718bbd84', NULL, '2013-07-01 10:30:14', 0, '1970-01-01 00:00:00', 'QMFgCouVXT5ehuCvl64Fvg49aODqKjE2', 1, 0);
INSERT INTO `adusers` VALUES (186, 'antg1805', '7d2a400522634064fc1a943cac0b84ed', NULL, '2013-07-01 11:03:16', 0, '1970-01-01 00:00:00', 'eSYPGB15QJgmX5oN2svXf3HzmKdw8Tfy', 1, 0);
INSERT INTO `adusers` VALUES (187, 'quoc khanh', '9295bcd23389a62e3364da2e785347fe', NULL, '2013-07-01 11:12:59', 0, '1970-01-01 00:00:00', 'csGSzqvPbO3egrNWnVwPyocHgEF974y', 1, 0);
INSERT INTO `adusers` VALUES (188, 'lanhhoa.btxh', '1ac852c17f3dd58e0098e0d9eaee8c98', NULL, '2013-07-01 11:17:29', 0, '1970-01-01 00:00:00', 'B6OPRbUtwRAJbg9QmM156Xnn3uCir5LK', 1, 0);
INSERT INTO `adusers` VALUES (189, 'caubengok', 'b4e1d090fb22282a33c02cd20305c97f', NULL, '2013-07-01 11:34:52', 0, '1970-01-01 00:00:00', 'wjvXjw3vayUcXDF4QJvte5sBTK3YCP', 1, 0);
INSERT INTO `adusers` VALUES (190, 'trangdo', '25f9e794323b453885f5181f1b624d0b', NULL, '2013-07-01 12:44:22', 0, '1970-01-01 00:00:00', '3WShPR5jBmbanhg10OUgDzyRr368gS', 1, 0);
INSERT INTO `adusers` VALUES (191, 'xuanquoc1992', '163171164fee79a958ea23bc171b1e62', NULL, '2013-07-01 13:28:52', 0, '1970-01-01 00:00:00', 'DZqZ0XbosXg2jqZ6SAxvITV8HSKCJA7v', 1, 0);
INSERT INTO `adusers` VALUES (192, 'ducthe', '0af8e2a72665f2a19e087c86bd11ff33', NULL, '2013-07-01 13:39:45', 0, '1970-01-01 00:00:00', 'IF2ihvGRCxUAxT3eSzwk4fPNRos6NEw9', 1, 0);
INSERT INTO `adusers` VALUES (193, 'Hung200490', '62d523388909bf27234b3bd809fae708', NULL, '2013-07-01 13:57:44', 0, '1970-01-01 00:00:00', '1k1nCkK3UywtTXQdbHuaouvbWT6moSky', 1, 0);
INSERT INTO `adusers` VALUES (194, 'huongyeu1989', 'dd146c8b23044430a0c3b0a192752489', NULL, '2013-07-01 14:31:10', 0, '1970-01-01 00:00:00', 'T8L7wlZNs1txQY0ABOTcNHdL53YW8w', 1, 0);
INSERT INTO `adusers` VALUES (195, 'kianh_pro', 'e71c72226688543d2b3c1d1302097c2a', NULL, '2013-07-01 14:39:16', 0, '1970-01-01 00:00:00', 'MY7zqZjc4n2ZJk1MWfZApp5DDWOTcg', 1, 0);
INSERT INTO `adusers` VALUES (196, 'newlucky', '25a260a0a3b117742188cabb5fee2393', NULL, '2013-07-01 15:27:18', 0, '1970-01-01 00:00:00', 'T2owAz1KwWr0W3AxGHvKwT43wW9Ob97m', 1, 0);
INSERT INTO `adusers` VALUES (197, 'nguyen viet', 'bd4ca62f56806c49d741d0230d6b5335', NULL, '2013-07-01 15:29:27', 0, '1970-01-01 00:00:00', '6koTgg98uiXJEdjugE5yuRZ0WnhE6tgH', 1, 0);
INSERT INTO `adusers` VALUES (198, 'huunghiacdth', '1e0a179322109a2f08c298448f5140f5', NULL, '2013-07-01 15:37:05', 0, '1970-01-01 00:00:00', 'oWAIwsY2BHEMJ9KwWkxHHBYfZh3lpd2', 1, 0);
INSERT INTO `adusers` VALUES (199, 'kimanh.duylinh@gmail.com', 'f691d8ffa9fe29051ac5b7b29f531eb2', NULL, '2013-07-01 15:58:10', 0, '1970-01-01 00:00:00', '4WppFuOd23y8Zwuk671qnUCFgs8CFAa', 1, 0);
INSERT INTO `adusers` VALUES (200, 'minhdangcopier', '69f8e6568b6105b495c612811cf66dd5', NULL, '2013-07-01 16:04:57', 0, '1970-01-01 00:00:00', 'F91lSb66YI6hoHB3SofOYnBByar9VaDJ', 1, 0);
INSERT INTO `adusers` VALUES (201, 'MyTruong', '23348c6545ffcf4fd93b8b58d680029d', NULL, '2013-07-01 16:25:32', 0, '1970-01-01 00:00:00', 'Uf8OfCWommzFz2pUnXJlvmMPUtMECjBQ', 1, 0);
INSERT INTO `adusers` VALUES (202, 'hoangkylam_18', '2213046aaf694f644a5516bf1b990fc2', NULL, '2013-07-01 18:38:13', 0, '1970-01-01 00:00:00', 'LuMpN4c8WBuG65GEZe2EChKgjZYoLVx3', 1, 0);
INSERT INTO `adusers` VALUES (203, 'tu.ha1408', '0a17fd65210f9f3111d9f23de4bd17f6', NULL, '2013-07-01 22:08:56', 0, '1970-01-01 00:00:00', 'CwGitWP2RruWHQN6bzpCY07WWJmtaJDv', 1, 0);
INSERT INTO `adusers` VALUES (204, 'anhquoc121077', '7504b2e5882ecafc69b78a1cccb0dabf', NULL, '2013-07-01 22:48:20', 0, '1970-01-01 00:00:00', 'bPumQHk4g2RpaX41vIzrnWDxIvXTphgI', 1, 0);
INSERT INTO `adusers` VALUES (205, 'sell_reputation', '5943f80f2343eb9e95bed3f33a751aee', NULL, '2013-07-02 00:10:22', 0, '1970-01-01 00:00:00', 'qaeLHO9puxX3OGTPwyZsQDbwcVjRR1O', 1, 0);
INSERT INTO `adusers` VALUES (206, 'adamvt3', '201bc6ec48038e29cb9592158e62f40c', NULL, '2013-07-02 10:10:46', 0, '1970-01-01 00:00:00', 'luaCyf39sAdyW14Mx2SiAh6zDpBTA3Ga', 1, 0);
INSERT INTO `adusers` VALUES (207, 'ngnhung90', 'a67c5935300a26f2b6f4dda4166b0dc5', NULL, '2013-07-02 11:14:40', 0, '1970-01-01 00:00:00', 'n4bmRvpLk1rx5j0p3QJbkoZtzkMe9cw', 1, 0);
INSERT INTO `adusers` VALUES (208, 'ny.0811', 'cc0cae3162944a9d7e087f4b09af21b4', NULL, '2013-07-02 13:32:34', 0, '1970-01-01 00:00:00', 'UAzOQqYbrOnCqZruyddLaprprjKSURJ', 1, 0);
INSERT INTO `adusers` VALUES (209, 'slowlyturtle', 'f72fbd040595084bf96962d49ca40334', NULL, '2013-07-02 14:27:36', 0, '1970-01-01 00:00:00', 'wJtf0O3TY9AABLKgBdh9exOxxshzcpBu', 1, 0);
INSERT INTO `adusers` VALUES (210, 'iujtinhyeu11', '075061918d0d06ada3b4fa5a9f8ee7dc', NULL, '2013-07-02 14:59:15', 0, '1970-01-01 00:00:00', 'IQYOGanIUckqtCwdPy3NmKrIYKw5tqds', 1, 0);
INSERT INTO `adusers` VALUES (211, 'tran.po', '537f2d8faa441df9dc78a5ba01865142', NULL, '2013-07-02 20:38:01', 0, '1970-01-01 00:00:00', 'oQLWIUK2uwl2WJpWhX7jwYLqnjmRdzGt', 1, 0);
INSERT INTO `adusers` VALUES (212, 'R0x0r', 'b7db8bf8fccd96312731079cc5463fa5', NULL, '2013-07-02 22:01:30', 0, '1970-01-01 00:00:00', '0rSFkXF0WRBxLVHPGL3rbwAwvpWKnlP8', 1, 0);
INSERT INTO `adusers` VALUES (213, 'kubomkho', 'b100eec9bced0f9053cd02c2e9be3e3a', NULL, '2013-07-03 17:48:03', 0, '1970-01-01 00:00:00', 'Hu3QLtdxjkJMhBz0QbcgyvIPA9JuW4Fy', 1, 0);
INSERT INTO `adusers` VALUES (214, 'Su_boutique1809', 'ad91f042225219181188d6ab302c180b', NULL, '2013-07-04 01:00:30', 0, '1970-01-01 00:00:00', 'RGsVuSC0B0o0tGbWeICic3FC7ouDLlB', 1, 0);
INSERT INTO `adusers` VALUES (215, 'ic1133', 'f361f162aca512b2dc466ed48de727d9', NULL, '2013-07-04 09:07:19', 0, '1970-01-01 00:00:00', 'WcUM9FEPe2OYsMYBzVa46wpWwJmpKAdE', 1, 0);
INSERT INTO `adusers` VALUES (216, 'leenguyen9', '6c578ac082c7058f1abe078da26cde4e', NULL, '2013-07-04 13:38:08', 0, '1970-01-01 00:00:00', '1wCSmjtmM883J3iBz8dWXEjmHt2nwWx', 1, 0);
INSERT INTO `adusers` VALUES (217, 'thanhphong0608', '5417c4530b4d7e53387a5069f3f9fe94', NULL, '2013-07-04 14:32:09', 0, '1970-01-01 00:00:00', 'KKSsZQWtVQVnwHnsXgleSP2nohyLHXU', 1, 0);
INSERT INTO `adusers` VALUES (218, 'THOA', 'fbe959a03b763feb7963affb4350f56d', NULL, '2013-07-04 15:22:49', 0, '1970-01-01 00:00:00', 'BU4DDL2tB5KRoQwjaByewgtLsf0uNWAv', 1, 0);
INSERT INTO `adusers` VALUES (219, 'Vũ Ngọc Ly', 'd555eb3457826c0efcd65c6f7e870c3b', NULL, '2013-07-04 17:56:20', 0, '1970-01-01 00:00:00', 'hurRFFwCpNPGAcCO77wvqyIcxdKNtMVW', 1, 0);
INSERT INTO `adusers` VALUES (220, 'Jamboo', '5a2833ec135f15ec1a1336f2759ad262', NULL, '2013-07-04 19:33:37', 0, '1970-01-01 00:00:00', 'TrHSsXxdXd8BkiKe2dznuxVATvrtWIFB', 1, 0);
INSERT INTO `adusers` VALUES (221, 'tao tay', '2025dca4aa2ce464e515dcbd88730fad', NULL, '2013-07-04 22:13:07', 0, '1970-01-01 00:00:00', 'W26ArYI7mPdRzJp8AQuqJxmDPn6yogc', 1, 0);
INSERT INTO `adusers` VALUES (222, 'e0651', '17b62cb1ba8f6e147244c9ecaf858d84', NULL, '2013-07-04 23:16:57', 0, '1970-01-01 00:00:00', '1kTioGqTjmzr6tHdFANC9NoYsnwT9Qv', 1, 0);
INSERT INTO `adusers` VALUES (223, 'vantoandakmil2006', '79484a45d1d85e344040ce3da2c40f75', NULL, '2013-07-05 07:15:13', 0, '1970-01-01 00:00:00', '61Aqcz3iu6lQok9K9QdX0NyaQ4X3sDpX', 1, 0);
INSERT INTO `adusers` VALUES (224, 'vinh19121991', 'd878855da231ada2b312f56ebf4338e4', NULL, '2013-07-05 10:10:26', 0, '1970-01-01 00:00:00', 'CPzCf2Cj7BLRkKbXGnJu8eOxUkW2bvm', 1, 0);
INSERT INTO `adusers` VALUES (225, 'buihien', '9d6da1ff2866001b8a945fcfab44bac7', NULL, '2013-07-05 14:59:31', 0, '1970-01-01 00:00:00', 't5yZPrBWg4rRP88lOkYraC6wK8CGhy3Q', 1, 0);
INSERT INTO `adusers` VALUES (226, 'builieuviet', 'bfc38ef2d56fb2a8c28aeb0a5c7e5fd8', NULL, '2013-07-05 17:51:39', 0, '1970-01-01 00:00:00', 'Lm1zzJnPwQ3sWyJgZHEcK7mSwJMTEzzB', 1, 0);
INSERT INTO `adusers` VALUES (227, 'khanhnguyen7291', '2bcc796ed63a24bc833ad78b2250450c', NULL, '2013-07-05 19:09:18', 0, '1970-01-01 00:00:00', 'Pbf569bnIZc87zPJuxTZpbzsitlC9Xpw', 1, 0);
INSERT INTO `adusers` VALUES (228, 'Manh Cuong', 'cebcdee63589241645993dfbc3609dec', NULL, '2013-07-05 22:57:50', 0, '1970-01-01 00:00:00', 'LWsAJWAs3SMROjUC29mO88nCv3QkxUbm', 1, 0);
INSERT INTO `adusers` VALUES (229, 'soimeo', '532aadad333ec1c9c7d62fe7c2dd21e1', NULL, '2013-07-06 08:27:22', 0, '1970-01-01 00:00:00', '9HK3kYWF4pK4xWfktff7w26DWjoJse', 1, 0);
INSERT INTO `adusers` VALUES (230, 'homiki', 'bf3f2c8680cc19995c0707d8a078434f', NULL, '2013-07-06 09:09:05', 0, '1970-01-01 00:00:00', 'y2m7RxFg6fsg474V5WVO60omsA2asc2c', 1, 0);
INSERT INTO `adusers` VALUES (231, 'ngoctu1971', '5b09dd5b1d727b6c1088c35bf9e4a511', NULL, '2013-07-06 10:36:23', 0, '1970-01-01 00:00:00', 'HcNwqzWFebrkWKO5yfzsYOva0EWo4fDY', 1, 0);
INSERT INTO `adusers` VALUES (232, 'nganchi', 'b249b25b81212f21d5735b27e4697db4', NULL, '2013-07-06 11:23:11', 0, '1970-01-01 00:00:00', 'GUwfj7KEkNeEFGbd4eRay9WKM3YwkWx6', 1, 0);
INSERT INTO `adusers` VALUES (233, 'chinhkrb', 'a5509c40ed8a6e3523f59951afe88201', NULL, '2013-07-06 12:27:51', 0, '1970-01-01 00:00:00', 'o0rZk1DTDY94dgw3oVxxHWqO822LfeJ', 1, 0);
INSERT INTO `adusers` VALUES (234, 'quangcao_raovat1724', '42b02f863b756d7fa4e1ddd3e91aaa1e', NULL, '2013-07-06 17:11:36', 0, '1970-01-01 00:00:00', 'ewEDpPdz9QA9Hfw2769URMJ9hPoa0gIt', 1, 0);
INSERT INTO `adusers` VALUES (235, 'C4eqtv', 'a32f2b4683283f72aa2419923d12266a', NULL, '2013-07-06 19:12:35', 0, '1970-01-01 00:00:00', 'Cv1XTe8swymXdUWfiQZdkh0bO05rYuBm', 1, 0);
INSERT INTO `adusers` VALUES (236, 'tranprotex', '9c04982e90b69962b6647ed07ad9711c', NULL, '2013-07-06 19:51:26', 0, '1970-01-01 00:00:00', 'HitOSZkZKeMiRSELHPFEZXWru6JtVcq6', 1, 0);
INSERT INTO `adusers` VALUES (237, 'thailexuan', '856d1fed817c47f7c074d0bfdd6c3656', NULL, '2013-07-07 08:59:21', 0, '1970-01-01 00:00:00', '0sEiqH84Sat4RGrugfOOvtH5R6AeQ5eI', 1, 0);
INSERT INTO `adusers` VALUES (238, 'nguyenhoangoanh', 'd3ff4c69b0c7469e651fd8db645830a8', NULL, '2013-07-07 09:09:11', 0, '1970-01-01 00:00:00', '3SNQuATpZJ1KpX4f5WGoDCrPJwhwJnwr', 1, 0);
INSERT INTO `adusers` VALUES (239, 'khoan09', '1c15edba05d7ba468be7b624c5fdf57c', NULL, '2013-07-07 10:33:57', 0, '1970-01-01 00:00:00', 'hwkKW32OeiFBwqcuXX9xXxvXZSJTpZ8P', 1, 0);
INSERT INTO `adusers` VALUES (240, 'giangvuha', 'd859078d8655418198d31a06ee3d31dc', NULL, '2013-07-07 15:49:54', 0, '1970-01-01 00:00:00', 'lLgvOG7JcqKDBmRag0wdhVxIfRymcG', 1, 0);
INSERT INTO `adusers` VALUES (241, 'thu huynh', '1d5fd7b2a65b60b7650812d31d9c6cbd', NULL, '2013-07-07 20:30:22', 0, '1970-01-01 00:00:00', '5t2LDWv5Gb4lpCvMH9fhlm7KYXqm1mDW', 1, 0);
INSERT INTO `adusers` VALUES (242, 'bellahuynh', 'fd85e62d9beb45428771ec688418b271', NULL, '2013-07-07 21:21:19', 0, '1970-01-01 00:00:00', 'mSj19r8W1RO1bYRf0WgtpZgO11dONEI', 1, 0);
INSERT INTO `adusers` VALUES (243, 'Thanh Huong', '68c301480ad97b964f1b84aec2d04a82', NULL, '2013-07-07 21:25:23', 0, '1970-01-01 00:00:00', 'mPKoBel2y9CRgSvLGyw9iv2iOKF7bRK', 1, 0);
INSERT INTO `adusers` VALUES (244, 'Jenlovely1102', '0d53246f3fdad95d241c3119c4c53301', NULL, '2013-07-07 22:10:20', 0, '1970-01-01 00:00:00', 'T1tEnSfwsoWudV6p7nTFyJ4F1448qolu', 1, 0);
INSERT INTO `adusers` VALUES (245, 'tieudungmuadong', 'f40d4cde18e5c8265ca2681405852676', NULL, '2013-07-08 09:35:05', 0, '1970-01-01 00:00:00', 'aeopF4HewfhlYEIzG8PdAwlllmZKir', 1, 0);
INSERT INTO `adusers` VALUES (246, 'joker468', '4d0b0d5e2cbd665b55a5585a49107ddb', NULL, '2013-07-08 10:24:05', 0, '1970-01-01 00:00:00', 'VBM91qWAEdFDOVXPGKMKpQWZ685LTcjf', 1, 0);
INSERT INTO `adusers` VALUES (247, 'thienca_tnt333', '2ec4ea8a7a1c04bc8b513d1746a81acf', NULL, '2013-07-08 10:29:03', 0, '1970-01-01 00:00:00', '4q5Tskb1K07iAE72NfndyKtt39W3348z', 1, 0);
INSERT INTO `adusers` VALUES (248, '2616ca02', '632340b107b48466271c2d8aba8bb4e1', NULL, '2013-07-08 11:43:02', 0, '1970-01-01 00:00:00', 'xQiAk6xPik76IgZjfw0ZtFiUptNWi34i', 1, 0);
INSERT INTO `adusers` VALUES (249, 'anhandsome91', '18e788d515c6feee3564266b2b44ca93', NULL, '2013-07-08 18:13:48', 0, '1970-01-01 00:00:00', 'r8YKuNOT2M661gR5prrFGFcGV2vJEef', 1, 0);
INSERT INTO `adusers` VALUES (250, 'yenheo12', '0379c59be65f4175647e5aa880ee53b3', NULL, '2013-07-08 22:42:09', 0, '1970-01-01 00:00:00', 'aa2xBHAEx8pwMwgGzzSY2cEGwqz5qu', 1, 0);
INSERT INTO `adusers` VALUES (251, 'minhtrang', 'c0d45af371d407c99ab720a03b6a2a11', NULL, '2013-07-09 00:29:41', 0, '1970-01-01 00:00:00', 'OwJ2WaxlnleAVgF1wNpnfOJ4MbtQTu', 1, 0);
INSERT INTO `adusers` VALUES (252, 'ducanh1010', 'f11eed37d737eb8929d13ab8ff1434e4', NULL, '2013-07-09 12:37:43', 0, '1970-01-01 00:00:00', '77bOWIEXnmINziqrHXwtnLbnsjAvp0ed', 1, 0);
INSERT INTO `adusers` VALUES (253, 'thanhthangvn', '62b6dcad5a7bfc9e8ab205a9ebe4346e', NULL, '2013-07-09 12:48:26', 0, '1970-01-01 00:00:00', 'Pk2xvnHvWF0eXlEB9rBmwQQ6iExJTxW4', 1, 0);
INSERT INTO `adusers` VALUES (254, 'meoheo65', '1b447bc3ac4061de32a37680827d6f18', NULL, '2013-07-09 13:34:11', 0, '1970-01-01 00:00:00', '2c02dePA4PHVvyeb13MT84RCFUzLZas2', 1, 0);
INSERT INTO `adusers` VALUES (255, 'luongquy', '56120f9fed13bc4a09454569d3bb7bb0', NULL, '2013-07-09 13:52:43', 0, '1970-01-01 00:00:00', 'ViA9nDywILWUGOgRHscRAnLOf4EeU9z', 1, 0);
INSERT INTO `adusers` VALUES (256, 'doreas', '976eb40bd510bc6aa857c948324a3d16', NULL, '2013-07-09 17:13:25', 0, '1970-01-01 00:00:00', 'JKqva7wddHu1OiUrS8oAqMFIPmW1E7c', 1, 0);
INSERT INTO `adusers` VALUES (257, 'nguyenphuong', '46cfd045e3dac5fa784ae05c8be6b924', NULL, '2013-07-09 17:59:26', 0, '1970-01-01 00:00:00', 'g9C7vE7i4raVDAuXKTkJqDHqjSMrhKNq', 1, 0);
INSERT INTO `adusers` VALUES (258, 'CảnhPt', 'd77fde67bdc132e480b109a765dffec2', NULL, '2013-07-09 18:51:23', 0, '1970-01-01 00:00:00', 'zFzlNig2yAohLgr9siCdYxpDNaL4vMr', 1, 0);
INSERT INTO `adusers` VALUES (259, 'Caleb', '79f114f54ce5c5f7304dd5b38a3b45d9', NULL, '2013-07-10 09:56:41', 0, '1970-01-01 00:00:00', 'aC3ioD2Juj6W6wzWBwlkGyj5vF0YLW5e', 1, 0);
INSERT INTO `adusers` VALUES (260, 'TripBeeRay', '7eca764c48f6613637e3caed1bde3a4f', NULL, '2013-07-10 14:11:36', 0, '1970-01-01 00:00:00', 'RAem0O4jSCiHzXTeeYCfx9v5GKvVf1Ty', 1, 0);
INSERT INTO `adusers` VALUES (261, 'minhpham112', '230af453f38b82f5e7d8f6450bfa0f5f', NULL, '2013-07-10 15:47:46', 0, '1970-01-01 00:00:00', 'X4ucb56b4uwKhUMF2yUzLn9sZhtTyd63', 1, 0);
INSERT INTO `adusers` VALUES (262, 'kute', '6df1d652539c7268f5851be92fc86351', NULL, '2013-07-10 21:21:04', 0, '1970-01-01 00:00:00', 'txbVtIwObqbQUCB13RXKe8GtoDCOvuY', 1, 0);
INSERT INTO `adusers` VALUES (263, 'thuyan9012', 'e81762b4467f370ca5b3c152b04d717b', NULL, '2013-07-11 10:37:04', 0, '1970-01-01 00:00:00', 'jlWu2jiRLWCpZB2yvK9nhea9rNHxCuB4', 1, 0);
INSERT INTO `adusers` VALUES (264, 'Xsecurity', '0d141af4b6a30f56bb0f90a78fb487a0', NULL, '2013-07-12 06:55:51', 0, '1970-01-01 00:00:00', 'QuKIa7wgwGLSFHLp3j00nZzygBwZBx0b', 1, 0);
INSERT INTO `adusers` VALUES (265, 'vxhoang', 'bf867d6633e771ba398f5c70acb59c6d', NULL, '2013-07-12 08:03:00', 0, '1970-01-01 00:00:00', 'dZDO4wPbmc8MNtrBhIjLk0sDAGfyAlFZ', 1, 0);
INSERT INTO `adusers` VALUES (266, 'phananhgold', '200d11336b11d9976c9d0428535eab33', NULL, '2013-07-12 11:36:08', 0, '1970-01-01 00:00:00', 'wEWqOCBVUkB65vCJKWinwNPXXxKYaaC', 1, 0);
INSERT INTO `adusers` VALUES (267, 'nguyencuong', 'ad5cc51a822f23c830170ebf7e8ced94', NULL, '2013-07-12 14:40:13', 0, '1970-01-01 00:00:00', '95ztkiRc21MUICMYAMt6RxYKJtDOZwTN', 1, 0);
INSERT INTO `adusers` VALUES (268, 'winSton8000', '0d141af4b6a30f56bb0f90a78fb487a0', NULL, '2013-07-13 07:33:10', 0, '1970-01-01 00:00:00', '0G5ZlpCHq9w7LDzjgzre2hgQBm1vRLnN', 1, 0);
INSERT INTO `adusers` VALUES (269, 'nguyencuonght', 'ad5cc51a822f23c830170ebf7e8ced94', NULL, '2013-07-13 15:39:25', 0, '1970-01-01 00:00:00', 'ah7FFzW6WBzRyxGZhZ0jygguQkcxo9YI', 1, 0);
INSERT INTO `adusers` VALUES (270, 'vuhoang08', '343b1c4a3ea721b2d640fc8700db0f36', NULL, '2013-07-14 23:01:17', 0, '1970-01-01 00:00:00', 'mCiCFpWHcwCBb17coaLDZ0I6CfB9V04w', 1, 0);
INSERT INTO `adusers` VALUES (271, 'phuongfidi', '862afaa400389a99bc8685ad4d46a7d5', NULL, '2013-07-15 08:28:19', 0, '1970-01-01 00:00:00', 'ibuyRGnpayTEwW6lwjdxu0QqNlMzWCc', 1, 0);
INSERT INTO `adusers` VALUES (272, 'vuongtan', '965c6c146a89843290bf446a32c3ff68', NULL, '2013-07-15 08:35:52', 0, '1970-01-01 00:00:00', 'PvFF6K7XN8pKaPBlDJf2c2QdSBOPHAkw', 1, 0);
INSERT INTO `adusers` VALUES (273, 'lipnguyen', 'cad908a432ba64dcf74febb5d5cb97a4', NULL, '2013-07-15 10:39:21', 0, '1970-01-01 00:00:00', 'UNQ070mpXdVZdqr9yDCQA7FmbGxNvVnj', 1, 0);
INSERT INTO `adusers` VALUES (274, 'thuynhung212', '13df51b83fbeeffd4e555f162fe27c35', NULL, '2013-07-15 10:39:23', 0, '1970-01-01 00:00:00', 'jhakWzUrAx6XIlbAAOa4Bwau7Ta1rrn0', 1, 0);
INSERT INTO `adusers` VALUES (275, 'binhgia', 'b2f3b857d400b5682583afe4e8312fa4', NULL, '2013-07-15 11:26:54', 0, '1970-01-01 00:00:00', 'oHvwEZqbLaidIlWf6b0yXdwMKWaaGVLb', 1, 0);
INSERT INTO `adusers` VALUES (276, 'huy0939', '8595945211ef0843e29e9299ad918dcb', NULL, '2013-07-15 11:43:59', 0, '1970-01-01 00:00:00', 'UavdNNE3EPwWs0uj6vFUUtOZJopfFEQ', 1, 0);
INSERT INTO `adusers` VALUES (277, 'chungsoi', 'c9208946ac6f4fd83721cf660e1f2bb2', NULL, '2013-07-15 12:43:26', 0, '1970-01-01 00:00:00', '8O4kDdiCOTOHtNv3IZ8Yj1mof0OGGRh', 1, 0);
INSERT INTO `adusers` VALUES (278, 'kd_ahc', '46bbc8c85bd3b571c9be155af83cc1be', NULL, '2013-07-15 13:38:09', 0, '1970-01-01 00:00:00', 'oPWSFn4N9fWDNRW90U6H0B1ibn3GW2m', 1, 0);
INSERT INTO `adusers` VALUES (279, 'huytxc', '69f34cd341a26bbc5e6e979abc0f06a8', NULL, '2013-07-15 13:56:23', 0, '1970-01-01 00:00:00', 'lTCIYgonDV0I8l6dSkafNDbW0cir2Y79', 1, 0);
INSERT INTO `adusers` VALUES (280, 'tomsvietnam', '250c14d5b78db6d73922592edc61b678', NULL, '2013-07-15 17:07:41', 0, '1970-01-01 00:00:00', 'Y2IaT04sGgPrkKsD5x924J3fe0xCNHRG', 1, 0);
INSERT INTO `adusers` VALUES (281, 'mrchithanh92', '5b4b1a83935210f01f51bbc78bb33f2d', NULL, '2013-07-15 18:27:08', 0, '1970-01-01 00:00:00', 'raWvGxehmS4GyBHs43LvFmPJJcXLGMsk', 1, 0);
INSERT INTO `adusers` VALUES (282, 'tinhlt', 'efb4645cd1d298f56f12a0997bdcc3ce', NULL, '2013-07-15 19:45:39', 0, '1970-01-01 00:00:00', 'cE5Rwte5606KqJewqccqpdOLuChkO1A', 1, 0);
INSERT INTO `adusers` VALUES (283, 'lthanhtinh', 'e10adc3949ba59abbe56e057f20f883e', NULL, '2013-07-15 21:12:14', 0, '1970-01-01 00:00:00', 'pgRpsAvWnAqfkjApbXvtlGzaY61Cr5ov', 1, 0);
INSERT INTO `adusers` VALUES (284, 'thoitrangsusu', '0529f2cf3ef6100282206b7333d60957', NULL, '2013-07-15 21:23:13', 0, '1970-01-01 00:00:00', 'qd2bW9DEJsEuMFqiBHwUzlLTa3D3HCbc', 1, 0);
INSERT INTO `adusers` VALUES (285, 'anhsomchua', '4163837d760b119cc7d05e6b421f6ac2', NULL, '2013-07-15 22:04:44', 0, '1970-01-01 00:00:00', '6M6lMZwQBr1kk0HtkMU1rcQH5PzWcTDQ', 1, 0);
INSERT INTO `adusers` VALUES (286, 'antonthuong', 'd36a59229ba87a6c7bcdb6fc94129ff8', NULL, '2013-07-16 09:32:54', 0, '1970-01-01 00:00:00', 'SmXUREHShHP436P7WmsMqElrCKWs0iEA', 1, 0);
INSERT INTO `adusers` VALUES (287, 'Nguyễn Yến', 'f209a486e2eac2cdf0a8a329a8abef29', NULL, '2013-07-16 09:57:38', 0, '1970-01-01 00:00:00', 'SWl3J0pg2ujf9FUDiyDCi7OirFRBnBoI', 1, 0);
INSERT INTO `adusers` VALUES (288, 'trần lệ thủy', '911ce412a876db186e7781c4188441fe', NULL, '2013-07-16 10:20:19', 0, '1970-01-01 00:00:00', 'GwWl6EAFd4KpHSeRN1IKUwOgpuh3juAv', 1, 0);
INSERT INTO `adusers` VALUES (289, 'trongnhan', 'ec628d8b6f3a37800920835f7874672f', NULL, '2013-07-16 10:45:54', 0, '1970-01-01 00:00:00', 'ZKunvOyaNQNwd5gdmH9sbcjMQuuUIoYg', 1, 0);
INSERT INTO `adusers` VALUES (290, 'hoangnhu', 'c2149db646bbff23eb16a48bff833c3e', NULL, '2013-07-16 11:00:18', 0, '1970-01-01 00:00:00', 'WSNM4Y5wMmtZoFDMlpKE4QDFxERG3BZu', 1, 0);
INSERT INTO `adusers` VALUES (291, 'antonthuong01', 'd36a59229ba87a6c7bcdb6fc94129ff8', NULL, '2013-07-16 11:29:52', 0, '1970-01-01 00:00:00', 'cIKhbP0CisCwPy16ZOtjIXuyp0P0NxnW', 1, 0);
INSERT INTO `adusers` VALUES (292, 'hp2331989', 'f41d91973bf5cbf354387fa4b4a3774d', NULL, '2013-07-16 13:19:45', 0, '1970-01-01 00:00:00', 'P9SYeKPcJN1c0eH8k8raT8ZsugsbWJGX', 1, 0);
INSERT INTO `adusers` VALUES (293, 'nguyenvanduong', 'f0c8ad0075e900675df51a2761c5b6bc', NULL, '2013-07-16 15:12:04', 0, '1970-01-01 00:00:00', 'wUAUnRaYdALFxDOVWBKfeD0yWrooZ9p', 1, 0);
INSERT INTO `adusers` VALUES (294, 'duongxda92', 'f0c8ad0075e900675df51a2761c5b6bc', NULL, '2013-07-16 15:30:02', 0, '1970-01-01 00:00:00', 'y6ggv00EytInp3XrEVCDAay7vGmYadMA', 1, 0);
INSERT INTO `adusers` VALUES (295, 'gakhotinh165', '73e887d0732276f35f34bfc03bd78f04', NULL, '2013-07-16 18:35:36', 0, '1970-01-01 00:00:00', 'bgZkRDvnqklKqto7kI7hDqIm0kBuv0', 1, 0);
INSERT INTO `adusers` VALUES (296, 'beanofbirth', 'e4b18e732c225e8041b5ba943bda003c', NULL, '2013-07-16 20:26:59', 0, '1970-01-01 00:00:00', 'M0Mz67rgkkhB1jT0XlWidZvilin4Sl88', 1, 0);
INSERT INTO `adusers` VALUES (297, 'quocnp1506', 'dad936b9b90103b398ba430d0b41d7fa', NULL, '2013-07-16 21:33:00', 0, '1970-01-01 00:00:00', '7Kk2mWdZQ81k4Pb5gosnLJce2miuka8m', 1, 0);
INSERT INTO `adusers` VALUES (298, 'BEATSLIBRA', 'dcf89d9ef8689b456eedc16158838afa', NULL, '2013-07-16 21:44:02', 0, '1970-01-01 00:00:00', 'bIhTyQWwA9n5hwkbeNoxrSFMAbZRPeQ', 1, 0);
INSERT INTO `adusers` VALUES (299, 'coldseason', 'a83a5b9a889bfbe57e5f172668b336e0', NULL, '2013-07-16 22:23:13', 0, '1970-01-01 00:00:00', 'rQbXbVWo9xgLL3AMS0fCH7NvDAFQThHB', 1, 0);
INSERT INTO `adusers` VALUES (300, 'hotruonghai', '311015faa4d58d8ec3cadd49864e9375', NULL, '2013-07-17 07:02:49', 0, '1970-01-01 00:00:00', 'xqebz56qaWn15TAUP68sVO6Sp6z2DWy', 1, 0);
INSERT INTO `adusers` VALUES (301, 'cksynl', 'e10adc3949ba59abbe56e057f20f883e', NULL, '2013-07-17 08:01:55', 0, '1970-01-01 00:00:00', 'peilLWqayRPlpwynqO4GnuhXcTUGXA', 1, 0);
INSERT INTO `adusers` VALUES (302, 'motngaymoisg', 'f07d9aa718a22cc9e675bbb077ede985', NULL, '2013-07-17 08:47:46', 0, '1970-01-01 00:00:00', 'rw5XNGo0dKmPbNqNOKu4jN46TiCWti', 1, 0);
INSERT INTO `adusers` VALUES (303, 'anhnam0563', '2f215fdc942d5744157cc2a25efdbb56', NULL, '2013-07-17 09:36:56', 0, '1970-01-01 00:00:00', 'pCWuOw0ZGvVUS9rK8CzaVN8iKNA1RmL', 1, 0);
INSERT INTO `adusers` VALUES (304, 'kimduythin', '00406a4dc6fb1cac9776ca304370ffe8', NULL, '2013-07-17 10:19:25', 0, '1970-01-01 00:00:00', 'vhuaasl8Q2iaRnL2a5cLXFOi8fyxBPn', 1, 0);
INSERT INTO `adusers` VALUES (305, 'khuyendoan', 'fb209099308f0b21518accf1ed94f414', NULL, '2013-07-17 12:27:37', 0, '1970-01-01 00:00:00', '3gfAsnQsEekT5PYwxbIwp4MgfAerxAa1', 1, 0);
INSERT INTO `adusers` VALUES (306, 'khuyen doan', '8444a56eb2253722e98a2ef5c936bd96', NULL, '2013-07-17 12:36:01', 0, '1970-01-01 00:00:00', 'PhxjCiICmRwx69GlYf4F8gwXwF1vxWaU', 1, 0);
INSERT INTO `adusers` VALUES (307, 'CXHanh', '318603b67c0c42db9fe3d20b68d87887', NULL, '2013-07-17 13:33:01', 0, '1970-01-01 00:00:00', 'BTaI6ykVLwy3zg7h8MTcSY5amIU5f1Af', 1, 0);
INSERT INTO `adusers` VALUES (308, 'Mai Trọng Phong', 'b53740938177547a7e62934b65873abf', NULL, '2013-07-17 18:11:26', 0, '1970-01-01 00:00:00', 'pDcmw66o7cFQUWDxd38mHOh5OwcVkurV', 1, 0);
INSERT INTO `adusers` VALUES (309, 'minh nhat', '3d7e87d9c51c6ec1ea31e3b9675e8bf1', NULL, '2013-07-17 19:39:25', 0, '1970-01-01 00:00:00', 'WfqAsCLr7w3X646dlojqbUN6fY5wkax', 1, 0);
INSERT INTO `adusers` VALUES (310, 'tluanvo', '1bfebdbe98dee7c520f8c25e590a1763', NULL, '2013-07-17 23:28:06', 0, '1970-01-01 00:00:00', 'Vki25mxqnt3RM3rk6wZ7ZoD7ZIIQuUDM', 1, 0);
INSERT INTO `adusers` VALUES (311, 'apologize6', 'f2bbf5ecec4e4cd904d771c8540627c9', NULL, '2013-07-17 23:46:52', 0, '1970-01-01 00:00:00', 'TwCJTKLuCleRfK3586fpjMr4cjCHtzj', 1, 0);
INSERT INTO `adusers` VALUES (312, 'Linh2013', '34eb3552155926d5e890158e53f87210', NULL, '2013-07-18 01:21:17', 0, '1970-01-01 00:00:00', 'RGIT8eqQvTa8ofOfVWbv01PzgNKZbT3c', 1, 0);
INSERT INTO `adusers` VALUES (313, 'xacthu113ct', 'da5fe3b63643c73e4463168d020fc31f', NULL, '2013-07-18 08:41:34', 0, '1970-01-01 00:00:00', 'cMyWmp7z2A8AeninixrPUGS5Aplcv0Fd', 1, 0);
INSERT INTO `adusers` VALUES (314, 'hacho0132', '66d09e379cd1274eb19d04f5d5f8a2da', NULL, '2013-07-18 09:22:54', 0, '1970-01-01 00:00:00', 'pulURy83mQt5xBGXQuhVxwbAWCdnnGXf', 1, 0);
INSERT INTO `adusers` VALUES (315, 'bé cháo kute', 'bafabbfcda3c9d37f083b594e6a6ac4a', NULL, '2013-07-18 09:52:14', 0, '1970-01-01 00:00:00', '8dPFj2rhQL3QmIFMavoiiXRBkL7VnIYB', 1, 0);
INSERT INTO `adusers` VALUES (316, 'vanmanh0903', '0d4847fde7f12d0819a954e3c09c0590', NULL, '2013-07-19 11:41:17', 0, '1970-01-01 00:00:00', 'zZR1oR9uNTV6Kb3vo5GWB3zJB9HjZgim', 1, 0);
INSERT INTO `adusers` VALUES (317, 'kul120493', 'f52b1f924daf729f6736f7ba7c8c1edc', NULL, '2013-07-19 12:50:54', 0, '1970-01-01 00:00:00', 'yIfPCTK6EUCwVhJcmlqWIf1wKF0Gzhd', 1, 0);
INSERT INTO `adusers` VALUES (318, 'phuoc_alan', '9d4c2b9a4a3ff41ecb91211dc95ec2af', NULL, '2013-07-19 15:51:19', 0, '1970-01-01 00:00:00', 'JsBIyIvDdb6paRAoCLYs4eqSHkOmmdmV', 1, 0);
INSERT INTO `adusers` VALUES (319, 'thanhtuan24', '42aceb7c8f202bb3668b74dbcd26c8c0', NULL, '2013-07-19 18:36:57', 0, '1970-01-01 00:00:00', 'fF6oIad8NUGqsGnlrHvxgde9NjaPNmH9', 1, 0);
INSERT INTO `adusers` VALUES (320, 'ngockid499', '26fecb9bf2ec012a6ca3444b60bbc123', NULL, '2013-07-19 19:54:20', 0, '1970-01-01 00:00:00', 'UhXMwXq7GBZgfTnxszUHnV7h7Cf8yjXO', 1, 0);
INSERT INTO `adusers` VALUES (321, 'bababa4s', '5f02fea66336a7dc1122a60c033433f9', NULL, '2013-07-20 10:46:46', 0, '1970-01-01 00:00:00', 'OdhpjmZNr0McDpHMUX109NASAR1G2YAR', 1, 0);
INSERT INTO `adusers` VALUES (322, 'insa193', 'e1d102b65e1e828b46d8c1269d1d921e', NULL, '2013-07-20 14:30:21', 0, '1970-01-01 00:00:00', 'TSL7JtfXQQjz4H6qTpGe4hTqUYhwreS8', 1, 0);
INSERT INTO `adusers` VALUES (323, 'yysbeast', '242c501a6c10d8747e7c3dafcfcb33dc', NULL, '2013-07-20 15:33:02', 0, '1970-01-01 00:00:00', 'wjdgYSi3BD8okaSoW0dECPDQ3gnISHO', 1, 0);
INSERT INTO `adusers` VALUES (324, 'honeyheart', '6b48782ae1046d62d0af1b9c82e4d72e', NULL, '2013-07-20 17:52:33', 0, '1970-01-01 00:00:00', 'gwG8F8jvVB6iPrsAxE44CMV8aG7a4l0B', 1, 0);
INSERT INTO `adusers` VALUES (325, 'thangtvmta', '3efe6a7eae6a473d20ec5c7f3c5d76d7', NULL, '2013-07-20 19:06:40', 0, '1970-01-01 00:00:00', 'e2aWxgdeYp9cwr1BYzjj3WRrRmOK4fBu', 1, 0);
INSERT INTO `adusers` VALUES (326, 'vanlong237', 'd2c745afd360e2af226135fff8e4106e', NULL, '2013-07-20 22:30:54', 0, '1970-01-01 00:00:00', 'ffziQfJyT5WxF0hD6puPuec9iPpfOkf', 1, 0);
INSERT INTO `adusers` VALUES (327, 'khanhbg09', 'efbafbcada851a58ac97a0a6313eae67', NULL, '2013-07-21 11:09:08', 0, '1970-01-01 00:00:00', 'ttK5pjp0Nzn8Cb5SwRkS1EGlLgnvje', 1, 0);
INSERT INTO `adusers` VALUES (328, 'trangdai', '3e9a2c8501fdae88a26d21d688678ac1', NULL, '2013-07-21 11:54:59', 0, '1970-01-01 00:00:00', '8wyiqgGnOfEJIpbxHbQWvYT1Va1jtbnO', 1, 0);
INSERT INTO `adusers` VALUES (329, 'nhoxham', '6a4d4dcc6f2e9be4f9dab970d8cac47a', NULL, '2013-07-21 12:20:43', 0, '1970-01-01 00:00:00', 'WMfH2wWBwl3CnjJUgzVAdzQUiNykRi', 1, 0);
INSERT INTO `adusers` VALUES (330, 'thuyduong_94', '554b7864f4fa234b137a5fa0b8e8542e', NULL, '2013-07-21 20:56:50', 0, '1970-01-01 00:00:00', '7u8rgplB76NQB1odAoyM4xb0pJfTqf1o', 1, 0);
INSERT INTO `adusers` VALUES (331, 'caominhtrung', '3d02ed2bf46f275a9c50dd79d54345cf', NULL, '2013-07-21 20:59:57', 0, '1970-01-01 00:00:00', 'MK2aN8CJ5OWwegd3VfcsGE46SjWYS0K', 1, 0);
INSERT INTO `adusers` VALUES (332, 'danghong134', '2afe4a0240dc892962bd07e00abc68e7', NULL, '2013-07-21 21:06:25', 0, '1970-01-01 00:00:00', 'bocF5t7YAZusIn8ktyH910uccZBsq5iM', 1, 0);
INSERT INTO `adusers` VALUES (333, 'atkboy90', 'ce462c5a6a9cc6a7bf39b359f5ba5345', NULL, '2013-07-21 21:55:10', 0, '1970-01-01 00:00:00', 'hsSUD0FItrbZeX3ZSPmmUj4FbAgQqcN', 1, 0);
INSERT INTO `adusers` VALUES (334, 'minh phuong', '1631bb284835481c04c0ce336b3e6972', NULL, '2013-07-21 22:17:39', 0, '1970-01-01 00:00:00', 'qJVOJ0xtjXhfzpnxfGT6vwSqyUHY2wo', 1, 0);
INSERT INTO `adusers` VALUES (335, 'luckystarbmt', '60303a7cd9d43f72fc2b4084d1b7722b', NULL, '2013-07-22 10:30:39', 0, '1970-01-01 00:00:00', 'Wir9YWZQEw2my5PTNXAs7yEVgdFwRcIQ', 1, 0);
INSERT INTO `adusers` VALUES (336, 'Luthem', '35b4012718ca504cf62bc5e3f762f595', NULL, '2013-07-22 11:59:02', 0, '1970-01-01 00:00:00', '6gcZZmT6ZRrXJ7GDnMuG3O6cyxGVmJ5I', 1, 0);
INSERT INTO `adusers` VALUES (337, 'hvlovely', '4f375a07b7810efc5c2e2507846eec54', NULL, '2013-07-22 17:48:49', 0, '1970-01-01 00:00:00', '3fmjcEhqWYbJkm6cfsbiaK3K9bt5L5Y0', 1, 0);
INSERT INTO `adusers` VALUES (338, 'Phuongtran', 'f3d1d1c6efa0529dd055e1a489f3ff96', NULL, '2013-07-22 20:09:34', 0, '1970-01-01 00:00:00', 'Eu4cCRjE44QmVyUwG1b3F5bGiuPA9gUw', 1, 0);
INSERT INTO `adusers` VALUES (339, 'tamhuong09', 'e10adc3949ba59abbe56e057f20f883e', NULL, '2013-07-23 10:11:38', 0, '1970-01-01 00:00:00', 'WnZw6wKEWBoIsdBYbBhK7RA1DSDLpHkt', 1, 0);
INSERT INTO `adusers` VALUES (340, 'torfback', '50c60752327366502601aeb581c5afe9', NULL, '2013-08-21 16:45:37', 0, '1970-01-01 00:00:00', 'wLM6P0RxMo2XwHW52FLCE047qgUAY0vQ', 1, 0);
INSERT INTO `adusers` VALUES (341, 'thanhtruc07', '83b150294832d3aab9ff4ee08f30737f', NULL, '2013-07-23 16:07:58', 0, '1970-01-01 00:00:00', 'k7vAxFKmz2C0imXpm86avLwCVf8obO4s', 1, 0);
INSERT INTO `adusers` VALUES (342, 'khongduockhoc', 'f0ba9d265c57d5a03bc5fec85b3d0bac', NULL, '2013-07-23 20:49:47', 0, '1970-01-01 00:00:00', 'zUCX6XwedeIJ5wyGE9OrkdWHExqYqv2U', 1, 0);
INSERT INTO `adusers` VALUES (343, 'phuongthoa3', 'fb6af26e6886023a788a58fced08d55f', NULL, '2013-07-23 20:52:49', 0, '1970-01-01 00:00:00', 'bhQ2KdNgBn4GkHdQQAeRw7eO3saMcLOk', 1, 0);
INSERT INTO `adusers` VALUES (344, 'trongkhang', 'e597b598c906f04e789c690b3ad8a45a', NULL, '2013-07-23 21:04:19', 0, '1970-01-01 00:00:00', 'b4QBCmdLbZ6cNXFhBOZxyhYVPnUzwU', 1, 0);
INSERT INTO `adusers` VALUES (345, 'phuongthoa37', 'e0a59bb0e973f6fe74217b7662f01fde', NULL, '2013-07-23 21:26:07', 0, '1970-01-01 00:00:00', 'ZkAoXxBf2OoXpZgcKmSVP2IjqP0jJKh6', 1, 0);
INSERT INTO `adusers` VALUES (346, 'HuySmile', 'd28d1a3119c6f66d82fc1ffe2c8ee1b2', NULL, '2013-07-24 08:18:48', 0, '1970-01-01 00:00:00', 'jHAcDKdcj0TW9zEwo192wtVSL7QotEyo', 1, 0);
INSERT INTO `adusers` VALUES (347, 'bandamsll', '5ee1e3c77fa5a0a640037611e6b517cb', NULL, '2013-07-24 08:29:10', 0, '1970-01-01 00:00:00', 'vfG8x9i5rObw5xBPLZ7HObAqGK8FVudu', 1, 0);
INSERT INTO `adusers` VALUES (348, 'connecting', 'e10adc3949ba59abbe56e057f20f883e', NULL, '2013-07-24 15:13:40', 0, '1970-01-01 00:00:00', 'NAfgiVmQPMVGwpMZiM7eixIdgp2plwv', 1, 0);
INSERT INTO `adusers` VALUES (349, 'codoc98', '9ee9ba26e9ecece15fbe66a7133232ab', NULL, '2013-07-24 20:03:25', 0, '1970-01-01 00:00:00', 'zDIaJQ1UoleCaf1vCw7X08YimCMsAaOR', 1, 0);
INSERT INTO `adusers` VALUES (350, 'codoc249', '9ee9ba26e9ecece15fbe66a7133232ab', NULL, '2013-07-24 20:04:13', 0, '1970-01-01 00:00:00', 'Ros2Q3iihWs1Cexpvh0XlPyClmFDjKy8', 1, 0);
INSERT INTO `adusers` VALUES (351, 'banhxethep', '6202ebd2499ccc0155f336c4db1a5a63', NULL, '2013-07-24 20:35:04', 0, '1970-01-01 00:00:00', 'WFs1Go8Wwi98VRZnc1AOeNkh7dcvXww6', 1, 0);
INSERT INTO `adusers` VALUES (352, 'dattrungjsc', 'a5149d1e10aedb9043fc9d4f84f7ee89', NULL, '2013-07-25 00:12:02', 0, '1970-01-01 00:00:00', 'NO206YwZ5u09939WuNQ1S2bUvRvselV', 1, 0);
INSERT INTO `adusers` VALUES (353, 'conghoan', 'd6b7e6e32c4396962d758cd6cd54efe0', NULL, '2013-07-25 06:38:02', 0, '1970-01-01 00:00:00', 'iUOXkPLh3aKqUBEurDpEJiz4NplErxrw', 1, 0);
INSERT INTO `adusers` VALUES (354, 'thanhthu11', '094770f4dad93a3f1b5acc622fc98383', NULL, '2013-07-25 11:16:57', 0, '1970-01-01 00:00:00', '1pwHefLmLTnoUwf1KLyMefMXOnUDs7bd', 1, 0);
INSERT INTO `adusers` VALUES (355, 'vonhumai', '25f9e794323b453885f5181f1b624d0b', NULL, '2013-07-25 11:50:44', 0, '1970-01-01 00:00:00', 'Nmr6fizuufxGK35WrCAWoa7ssYdrjbeE', 1, 0);
INSERT INTO `adusers` VALUES (356, 'nhokkUjio', '5464e519b9b00fb687d12940947e3f4e', NULL, '2013-07-25 18:56:53', 0, '1970-01-01 00:00:00', 'Nc25UKpEaV6zB9xLHG41Vgq8Wh4cheP8', 1, 0);
INSERT INTO `adusers` VALUES (357, 'abmhanoi', 'ec878b54e20a467b7f1c8e46f14d21c4', NULL, '2013-07-27 09:03:17', 0, '1970-01-01 00:00:00', 'AFdHr0bWwNfO4jCDjIVZiXsM1Zj5kJZk', 1, 0);
INSERT INTO `adusers` VALUES (358, 'phamcuongq', '403cac512815af041a2818894b6bdd70', NULL, '2013-07-29 13:10:42', 0, '1970-01-01 00:00:00', 'iyf7uaihENLtwCv8wWG9K5BuZAYJWOqn', 1, 0);
INSERT INTO `adusers` VALUES (359, 'YenYen', '998ed89d42204db9738d1cc04636b87d', NULL, '2013-07-31 23:35:35', 0, '1970-01-01 00:00:00', 'N1BvAxRorTLl511Sne99T0W87neI3vk', 1, 0);
INSERT INTO `adusers` VALUES (360, 'YenK', 'ffef56126391854d46c0e02114788289', NULL, '2013-07-31 23:41:35', 0, '1970-01-01 00:00:00', 'TDDUvnM7qZwyLm6j23lvqmCYM0qvTX9u', 1, 0);
INSERT INTO `adusers` VALUES (361, 'donghn', '0c9ddc69df6a54995b6e6d54fc6bfd52', NULL, '2013-08-04 14:32:45', 0, '1970-01-01 00:00:00', 'vH6mcu54PwYjeRMOZU6QAlkN36crj5W', 1, 0);
INSERT INTO `adusers` VALUES (362, 'Devilbrat', '009e13e3fdf6d6c36312c77804b18df9', NULL, '2013-08-04 15:59:08', 0, '1970-01-01 00:00:00', 'iWJvbTKq0OoMElt4HB7KKm3OTPDcpuWW', 1, 0);
INSERT INTO `adusers` VALUES (363, 'rokudourinne', '009e13e3fdf6d6c36312c77804b18df9', NULL, '2013-08-04 18:56:36', 0, '1970-01-01 00:00:00', 'unRLUyfwnUeE82QmziOjZE3Ma3Wwm3L', 1, 0);
INSERT INTO `adusers` VALUES (364, 'phatdailoi', '9975124378f6007a2c2ab9c82c2c5aeb', NULL, '2013-08-08 21:13:09', 0, '1970-01-01 00:00:00', 'WrjAiDqP7WRMPQRneRJGVmiCBRihb3ux', 1, 0);
INSERT INTO `adusers` VALUES (365, 'Nguyen Ami', '9570d0a121748c04fa2b0f4be6cf5d90', NULL, '2013-08-08 23:23:58', 0, '1970-01-01 00:00:00', 'ZdwiJPAgpPcNtLgN6RzbMDdzBQgUYv', 1, 0);
INSERT INTO `adusers` VALUES (366, 'Nhanpro_3393', '6c65094efa95fccce5b9cda1ffc580d0', NULL, '2013-08-11 11:24:46', 0, '1970-01-01 00:00:00', 'YqCHwoFeoDqMg3s7ewoRamMVGG435UW', 1, 0);
INSERT INTO `adusers` VALUES (367, 'abm', 'ec878b54e20a467b7f1c8e46f14d21c4', NULL, '2013-08-22 15:28:42', 0, '1970-01-01 00:00:00', 'WQws6ie8bxoSJlWrf8XTYpUpooM2zKkM', 1, 0);
INSERT INTO `adusers` VALUES (368, 'lthonline', 'dcad006d78396e5e2b44fe65b00e2d26', NULL, '2013-08-22 15:31:05', 0, '1970-01-01 00:00:00', 'gHApvuP0SyNukvtWfJkcdrzSo97aN', 1, 0);
INSERT INTO `adusers` VALUES (369, 'waptin.biz', 'e800717cc9473832be77cb21c3715ca3', NULL, '2013-08-22 16:54:30', 0, '1970-01-01 00:00:00', 'UhpzYs7mCPrHfKFbdVnAA9bHrGEEjxx', 1, 0);
INSERT INTO `adusers` VALUES (370, 'vietduc23', 'a126ef629371a5c72afd57cc44bc7119', NULL, '2013-08-28 14:43:51', 0, '1970-01-01 00:00:00', 'RUjk0ymQQ8CoUyM1rdaMHTcjtwiiPmY', 1, 0);
INSERT INTO `adusers` VALUES (371, 'mabu', 'c63e826314c093feb95ba99f98dbba40', NULL, '2013-08-28 15:46:49', 0, '1970-01-01 00:00:00', 'TCWEfkwkRGnbDk2maQzPF57wJBo1ciR', 1, 0);
INSERT INTO `adusers` VALUES (372, 'tqthangqbu2', '5999c28fb4d15cbd0de0b3de76299c31', NULL, '2013-08-28 16:00:40', 0, '1970-01-01 00:00:00', 'vheLRczJpGq1RanwVZn311d3VGvhPU8Y', 1, 0);
INSERT INTO `adusers` VALUES (373, 'tinhyeudau_th92', '72319de91a58123f43c6e9c5cb440798', NULL, '2013-08-28 18:05:42', 0, '1970-01-01 00:00:00', 'x4XlSEw3Jm0Em788F6vPFWBqE3WWWN3v', 1, 0);
INSERT INTO `adusers` VALUES (374, 'hoaian', '2a03556aad4a0c8d94d7097a0862dcc9', NULL, '2013-08-28 19:59:54', 0, '1970-01-01 00:00:00', 'szTwgsIw1Vn0fJr1ZBuUkbESce46AzRu', 1, 0);
INSERT INTO `adusers` VALUES (375, 'kienle21', 'ebfc36c37a5cf683edbaa85975879d18', NULL, '2013-08-28 22:20:55', 0, '1970-01-01 00:00:00', 'E5OKDxQuWyShQUdO7w8mUYage4Gwehww', 1, 0);
INSERT INTO `adusers` VALUES (376, 'david duong', 'b69aaa337f96798fedb7781c57700603', NULL, '2013-08-28 23:42:31', 0, '1970-01-01 00:00:00', '2ejcVoEDCIWf6DvLNLjJx2RhYOVseS6o', 1, 0);
INSERT INTO `adusers` VALUES (377, 'tranminhthu1811', '5b03991bd9204d9f8813a45e2f22f6c8', NULL, '2013-08-29 03:53:13', 0, '1970-01-01 00:00:00', '3gbcAYAHhylDhTRxED8EBOaAnWXDvU', 1, 0);
INSERT INTO `adusers` VALUES (378, 'vuihoctienghan', 'dcbf323a83e342e400f465a8fccccfc1', NULL, '2013-08-29 12:43:25', 0, '1970-01-01 00:00:00', '041kZTWsvgHm3XajxvIKjuhmKZWop70', 1, 0);
INSERT INTO `adusers` VALUES (379, 'huygiangmobi', 'df757c40fe95d0563debce16a853cfcf', NULL, '2013-08-29 13:16:49', 0, '1970-01-01 00:00:00', 'KcPAak6UNUh8HhmtjL9wG9oSldd1SonF', 1, 0);
INSERT INTO `adusers` VALUES (380, 'trinhnq', '96e79218965eb72c92a549dd5a330112', NULL, '2013-08-29 13:47:16', 0, '1970-01-01 00:00:00', 'xE99ZYlchUZswRVJJolIZvrSGN4WtmWM', 1, 0);
INSERT INTO `adusers` VALUES (381, 'duyphuong', '05caa4522f69fc03352d4dd807a20084', NULL, '2013-08-29 14:25:25', 0, '1970-01-01 00:00:00', 'apZszATJQlltqXr9FWz5MasmfMBGYzJ', 1, 0);
INSERT INTO `adusers` VALUES (382, 'lehoailam', 'a2c2aac6ba86623181eabeedda85d093', NULL, '2013-08-29 14:40:28', 0, '1970-01-01 00:00:00', 'q2wtbJq2PPKAw2nK0cewIRpVtM27LnYQ', 1, 0);
INSERT INTO `adusers` VALUES (383, 'nguyennhadat', 'f57acfa8c3f06842e97de142e752abcb', NULL, '2013-08-29 16:09:38', 0, '1970-01-01 00:00:00', 'GlVUzU6bDvpMB7Z9GugsmU5lgWsFNWz', 1, 0);
INSERT INTO `adusers` VALUES (384, 'thanhhieu', 'de454d85d0fb47be91aa578c2c78ff3f', NULL, '2013-08-30 09:08:38', 0, '1970-01-01 00:00:00', 'lrz0WkrXFXNqSJE3gdESvM9XTw4hxxND', 1, 0);
INSERT INTO `adusers` VALUES (385, 'fologists', '49d85b6a36dfc760703a63272e937f2f', NULL, '2013-08-30 10:29:36', 0, '1970-01-01 00:00:00', '3EoGAp5nBIF2HwZgQKgawOCvJGjpAg8j', 1, 0);
INSERT INTO `adusers` VALUES (386, 'dinh huy khang', '265a60e261f15bf96b5f6eb750297d8b', NULL, '2013-08-30 16:17:29', 0, '1970-01-01 00:00:00', 'SjGFnXaiU1wvuM6G5oE8ZGtsyjnRw6k', 1, 0);
INSERT INTO `adusers` VALUES (387, 'dinh khang', 'e10adc3949ba59abbe56e057f20f883e', NULL, '2013-08-30 16:47:02', 0, '1970-01-01 00:00:00', 'vkEZflBA2Ow2A4SnKIqW6Og75F66CzM3', 1, 0);
INSERT INTO `adusers` VALUES (388, 'phamvanminh', 'a72673ff6eea7f6ab3060dc456bde2e7', NULL, '2013-08-30 20:38:29', 0, '1970-01-01 00:00:00', 'lJlW5b22WV0Sww8VleiRnx5r9fLyxI', 1, 0);
INSERT INTO `adusers` VALUES (389, 'hiepsingay13', 'd0c3187c80e1b67998270b0ecf91dd4f', NULL, '2013-08-30 21:32:59', 0, '1970-01-01 00:00:00', 'FHWrr8LxmXWWK951SRiWol5EMOCwZfwW', 1, 0);
INSERT INTO `adusers` VALUES (390, 'minhnguyensisio', 'a1da25145adb384737b222aa2d002ad5', NULL, '2013-08-30 23:35:49', 0, '1970-01-01 00:00:00', 'Pmxh9T52t8xW3CVGa3z1AioQad6LpA1', 1, 0);
INSERT INTO `adusers` VALUES (391, 'oanhho', '714d1eaba5965baf1f5dcec55dc66bdd', NULL, '2013-08-31 01:18:34', 0, '1970-01-01 00:00:00', 'oVaOCmDXeKg7xXMu6aUGQHNgpeTnfRVu', 1, 0);
INSERT INTO `adusers` VALUES (392, 'gasamac', '3cac7313fbad9da1ea0c08f42a1273db', NULL, '2013-08-31 07:44:46', 0, '1970-01-01 00:00:00', 'WNS2E8ZWpw3ucTEchxJ4MZ0t90tDNyyy', 1, 0);
INSERT INTO `adusers` VALUES (393, 'ANHTUYET', 'a4b3d2c963f0ca7574ae19551e4b0c61', NULL, '2013-08-31 08:54:00', 0, '1970-01-01 00:00:00', 'e44JPoe6IUTIFFtdDrULZDteEKTedIe', 1, 0);
INSERT INTO `adusers` VALUES (394, 'tieubao860', '609c507f0fa45e0945fb4ce016b8ce8c', NULL, '2013-08-31 09:50:26', 0, '1970-01-01 00:00:00', '2wmJ7Gvb6YmD01CoQNWrOsuQbIF1Ce', 1, 0);
INSERT INTO `adusers` VALUES (395, 'son.nobody', 'a2738e3f3431de82b3a63f8f8c61e4a5', NULL, '2013-08-31 14:11:53', 0, '1970-01-01 00:00:00', 't5Fwed3ULPVWnJIo5RBreeDmmTgXejRV', 1, 0);
INSERT INTO `adusers` VALUES (396, 'NgocVy', '0871e154c773f4f2f21b7e6cea8592c1', NULL, '2013-08-31 16:45:30', 0, '1970-01-01 00:00:00', 'CYYf7L65AKh0BOnpaWQWONO8YAIJl0bB', 1, 0);
INSERT INTO `adusers` VALUES (397, 'nguyenluong90', '306d6ac90a669502fc42703f1b4aa405', NULL, '2013-08-31 19:53:36', 0, '1970-01-01 00:00:00', 'ar2EDrqAuQqoO6pBhHqO4eLGtdcuwmS', 1, 0);
INSERT INTO `adusers` VALUES (398, 'hoanglanquy', 'a76b186bdfee3b3773195438e105942f', NULL, '2013-08-31 20:42:16', 0, '1970-01-01 00:00:00', 'PPQ1yQk3erqIs9KONEs8z0I59qRGcWb', 1, 0);
INSERT INTO `adusers` VALUES (399, 'hoahong', 'e10adc3949ba59abbe56e057f20f883e', NULL, '2013-08-31 22:12:47', 2, '1970-01-01 00:00:00', 'p1VVW5RLHWYRw9eueW0StxQudoYJZWGq', 1, 0);
INSERT INTO `adusers` VALUES (400, 'nootieutu123', '7e08871c73e8c23c0685d9861ef37e83', NULL, '2013-08-31 23:59:56', 0, '1970-01-01 00:00:00', 'N2TfFU6vQETM6oVcWqf0zSD1PAcJEH', 1, 0);
INSERT INTO `adusers` VALUES (401, 'hoannguyen', '99e3a8cb2dc88e2ae4a7da1bd79a6699', NULL, '2013-09-01 00:31:10', 0, '1970-01-01 00:00:00', 'sVgxJ7MNRw2PyHDkei6wPlwSgF6VgOp', 1, 0);
INSERT INTO `adusers` VALUES (402, 'maidinh', '548c9e3a0f2d627a99930d6be881db2b', NULL, '2013-09-01 09:53:22', 0, '1970-01-01 00:00:00', 'CnJsodan1VpPcH8FCjFSoEARwrAEtQPn', 1, 0);
INSERT INTO `adusers` VALUES (403, 'HuynhNhaTran', '1aa251f5861732d2bfb3bf5e9352df2b', NULL, '2013-09-01 11:03:46', 0, '1970-01-01 00:00:00', 'mmR1iOuZtdNZqQjNk1DC43iOXRbm1ISc', 1, 0);
INSERT INTO `adusers` VALUES (404, 'horseorc', 'f1ba443f8bc18360f004a1bea4d6d4aa', NULL, '2013-09-01 11:15:46', 0, '1970-01-01 00:00:00', 'QHNcPw9pApWUdSE9Nhn0wDUeTinHwIc', 1, 0);
INSERT INTO `adusers` VALUES (405, 'atr_ken', '2322c8691bda876255ba726f64466f4e', NULL, '2013-09-01 14:12:01', 0, '1970-01-01 00:00:00', 'aJCAmEOqTC9RHCJyFyLPPfhjyNWlyI', 1, 0);
INSERT INTO `adusers` VALUES (406, 'maitrang', '0e9acb90416c8732d412bba264c371c5', NULL, '2013-09-01 15:30:21', 0, '1970-01-01 00:00:00', '0BShfFkWuwb0812VNc36Zrw3zRZIs3', 1, 0);
INSERT INTO `adusers` VALUES (407, 'vanson85', '083d7cf3d829c24b4868c0e283f83abc', NULL, '2013-09-01 22:45:35', 0, '1970-01-01 00:00:00', 'K1hQkMggzXSwM1wGau1yUbre4OTPqrS3', 1, 0);
INSERT INTO `adusers` VALUES (408, 'Truongkkv', 'f88430dae17128f110d6df3a790618d2', NULL, '2013-09-02 00:48:06', 0, '1970-01-01 00:00:00', 'HHzVvPqFKaEDdH88ZEygEiHFCjegfFu', 1, 0);
INSERT INTO `adusers` VALUES (409, 'hanhxop', 'ae8ab139e357ba330371a1d1e597a26b', NULL, '2013-09-02 12:49:05', 0, '1970-01-01 00:00:00', 'Iw51bwGa5HeQvPOR2HeR3dCNqzyx9h6', 1, 0);
INSERT INTO `adusers` VALUES (410, 'chidai', '044874346606f577a5734c338679d1e7', NULL, '2013-09-02 18:51:19', 0, '1970-01-01 00:00:00', 'Ww1cr9ZHGqJCZf7210RI9kFx3GrYoer', 1, 0);
INSERT INTO `adusers` VALUES (411, 'OMG', '4fd5d37e5dbddbc281f37b43d399e396', NULL, '2013-09-02 19:27:25', 0, '1970-01-01 00:00:00', 'RuMmdk1WjcadfhNaTXiMpsWtm3cUoQeR', 1, 0);
INSERT INTO `adusers` VALUES (412, 'salesandmarket', 'd298d2212ce0becbd54dbdc69ad901af', NULL, '2013-09-02 20:02:40', 0, '1970-01-01 00:00:00', 'u6JqDKLQBYYWFn6cnlMwtQEAZfdHuO', 1, 0);
INSERT INTO `adusers` VALUES (413, 'selinanguyen', 'fb8080366d0d2ce88f8f88a0d7c2cdfd', NULL, '2013-09-02 23:16:50', 0, '1970-01-01 00:00:00', 'xQHTl6f5pYo4gQHJPLGZ9NAMtNfBiAU', 1, 0);
INSERT INTO `adusers` VALUES (414, 'tam213', '00981b8e884ca715b2a5ddce2fdb530c', NULL, '2013-09-03 01:03:22', 0, '1970-01-01 00:00:00', 'GufNVv5WDIf4b8MICKCFQJymaKzpZGWN', 1, 0);
INSERT INTO `adusers` VALUES (415, 'phuongpro2003', 'b251cefba8c027b600fc88eef11f9db0', NULL, '2013-09-03 01:25:53', 0, '1970-01-01 00:00:00', 'mEi1GuC2DjXWXqoObxXSi77SqrFDzJHN', 1, 0);
INSERT INTO `adusers` VALUES (416, 'chuottrang', 'd4f659e41152810f1fdbebde6e3fe772', NULL, '2013-09-03 03:14:22', 0, '1970-01-01 00:00:00', '8Gt74gqkpTIFzxwHyLUKVzgROYQOdiCl', 1, 0);
INSERT INTO `adusers` VALUES (417, 'suboa23', 'd1d553f6f0ba4d18055cccca9b713495', NULL, '2013-09-03 06:41:43', 0, '1970-01-01 00:00:00', 'lPjCtvBJToeWtb0hj7UOkbfPouT25w', 1, 0);
INSERT INTO `adusers` VALUES (418, 'ngduytin', '549b27029d54d5827a7c924c1115af6d', NULL, '2013-09-03 09:14:46', 0, '1970-01-01 00:00:00', 'nbYg1U7Dx7Vspau8HfVBaEuGDlkPmAoX', 1, 0);
INSERT INTO `adusers` VALUES (419, 'tranthoaigt', '0184d1827b71a4ee6ec2d7c23e7ad62c', NULL, '2013-09-03 19:29:09', 0, '1970-01-01 00:00:00', 'C7BRlRS3lWwBkmQwSmkG823IHy77Ys4', 1, 0);
INSERT INTO `adusers` VALUES (420, 'Nhoklove9x', '05a3acd93798b712f176943d35717fd0', NULL, '2013-09-03 19:53:14', 0, '1970-01-01 00:00:00', 'Or9WwevFjGIFsfv0FN42o3YbQ62kKUv', 1, 0);
INSERT INTO `adusers` VALUES (421, 'langtudatinhtg', 'b375f2067b75430a08b5806f4875763f', NULL, '2013-09-03 21:54:46', 0, '1970-01-01 00:00:00', 'pTtWOwu01AeYwB5qyxFnwanYPzdt72V', 1, 0);
INSERT INTO `adusers` VALUES (422, 'vietnga83', '476cf7279a7bb2265f6ec10ebf29e8b0', NULL, '2013-09-03 22:54:49', 0, '1970-01-01 00:00:00', 'awhNGMt9kQpYF5Ji0h6bfoWZM03KwTFp', 1, 0);
INSERT INTO `adusers` VALUES (423, 'koong', '5201d1e6ca24ff40a9c7645b284724e2', NULL, '2013-09-04 11:09:14', 0, '1970-01-01 00:00:00', '3vCwWAZ27huK3RmpkcrEMJ4Pbowndo', 1, 0);
INSERT INTO `adusers` VALUES (424, 'nhokli_93', 'dbeea106fe9255fcd8112aef75d5c280', NULL, '2013-09-04 14:39:25', 0, '1970-01-01 00:00:00', 'QcXCYBVc7Ram8j6Qllky79i7vu24CuJZ', 1, 0);
INSERT INTO `adusers` VALUES (425, 'PhuocMB', '97eefed6083e03b5ff00e0f6751a8f82', NULL, '2013-09-04 15:10:00', 0, '1970-01-01 00:00:00', 'sOdv33p2Qo5La6YxrgMr9oZEbgJrEoJk', 1, 0);
INSERT INTO `adusers` VALUES (426, 'ngockhanh', '87927f9c975c0fec4b6ff0dea286c6cc', NULL, '2013-09-04 21:40:51', 0, '1970-01-01 00:00:00', 'h8Sg4P34r1vWJ128WkBGSK5VMyrGrq2V', 1, 0);
INSERT INTO `adusers` VALUES (427, 'mesay', 'e10adc3949ba59abbe56e057f20f883e', NULL, '2013-09-05 03:14:58', 0, '1970-01-01 00:00:00', 'Yf3VSqiev2wwnmkwk5tqf6IH52stEVb', 1, 0);
INSERT INTO `adusers` VALUES (428, 'lennguyen', '6322af451ed210d6959fb9e80c22c6ad', NULL, '2013-09-05 10:54:35', 0, '1970-01-01 00:00:00', '4s2fR4cGn08cUt0ZDLKwLKJhIW67fFy', 1, 0);
INSERT INTO `adusers` VALUES (429, 'uynnhi159', 'bb21bdd0de8e3a481e2e827a783e5fce', NULL, '2013-09-05 12:19:00', 0, '1970-01-01 00:00:00', 'eh86uaMHqd6SzWPwZbMsYdF2W5ejzX', 1, 0);
INSERT INTO `adusers` VALUES (430, 'ngocngan', 'e10adc3949ba59abbe56e057f20f883e', NULL, '2013-09-05 13:37:58', 0, '1970-01-01 00:00:00', 'f6IwYgkat3Jr63EECSO5o92zJQqmGYN', 1, 0);
INSERT INTO `adusers` VALUES (431, 'canhvd', 'ea1fc1bcaa22a4e3a72523b88348da08', NULL, '2013-09-05 20:16:09', 0, '1970-01-01 00:00:00', 'UEndHFXmtQ0EomUbW8v0KM5rh3zXEUD0', 1, 0);
INSERT INTO `adusers` VALUES (432, 'Vũ Thu Phương', '489e92afb81f3c4bb809332635222869', NULL, '2013-09-05 22:10:22', 0, '1970-01-01 00:00:00', 'rROHbvi1ndAkbqK4fud4f7O1Rq7SaWK', 1, 0);
INSERT INTO `adusers` VALUES (433, 'vanluan23', 'c122005098a7544e35ec0d1262f8e696', NULL, '2013-09-06 07:07:51', 0, '1970-01-01 00:00:00', 'HHeAuxTWOhiI9IGHLaVtE7m3R2975wNl', 1, 0);
INSERT INTO `adusers` VALUES (434, 'nhocmatmeo', '381ba317a1ce0f26d8cc80c5ca85c3ae', NULL, '2013-09-06 08:57:38', 0, '1970-01-01 00:00:00', '0QzrSGEGZpLmPTfrQ7dsIAX5jliwBUh', 1, 0);
INSERT INTO `adusers` VALUES (435, 'vantienhc', '787c21ad4f437efd284e011c1f41ebaf', NULL, '2013-09-06 10:05:46', 0, '1970-01-01 00:00:00', 'YT8BYZzSsQHLLi269DJ3Q2P2W5HRTO', 1, 0);
INSERT INTO `adusers` VALUES (436, 'thanhtu5927', '4cbec738e0f84e641ebd4fae6ddc62ac', NULL, '2013-09-06 11:50:16', 0, '1970-01-01 00:00:00', 'TCKOdZrwS4EgOFBh04T2WUUIlnwlsupQ', 1, 0);
INSERT INTO `adusers` VALUES (437, 'cuongl85', '1adbb3178591fd5bb0c248518f39bf6d', NULL, '2013-09-06 15:28:10', 0, '1970-01-01 00:00:00', 'aozwciSF3N2NjIMwTfZlRnspBEc45i2', 1, 0);
INSERT INTO `adusers` VALUES (438, 'love_wind', 'c42851843fde453d0fe173e61114b3c2', NULL, '2013-10-12 23:32:01', 0, '1970-01-01 00:00:00', 'HWqWXgxLs8Zf75M1Vkn3OXIPw6bgwTl', 1, 0);
INSERT INTO `adusers` VALUES (439, 'janetmckenzie', 'c5028f0187b4dca1b6a80455d7a3ed71', NULL, '2013-09-06 20:30:02', 0, '1970-01-01 00:00:00', 'QrKcDdxkHnlXah00Hzznh1nGnQlfditk', 1, 0);
INSERT INTO `adusers` VALUES (440, 'buikhachuan', 'fcb8896097086bdc62565ff46228fa73', NULL, '2013-09-07 02:59:16', 0, '1970-01-01 00:00:00', 'xdP4BYMkaLbclBwMu8qRqkdwioezqjmr', 1, 0);
INSERT INTO `adusers` VALUES (441, 'Lê Thanh Hải', 'c60171aa972bedb406dbd4bda4aa2b02', NULL, '2013-09-07 08:50:39', 0, '1970-01-01 00:00:00', 'AM022YlYatm6TTaQ5nACYqZjtEArrnCx', 1, 0);
INSERT INTO `adusers` VALUES (442, 'bichanhdang', '181b42092ea0bc7d8a11dd8e9efe3291', NULL, '2013-09-07 14:02:47', 0, '1970-01-01 00:00:00', 'V13oKSpVgeWqJeRaKogJq4FQb4ZIfXw1', 1, 0);
INSERT INTO `adusers` VALUES (443, 'Dai ca', 'ed2b1f468c5f915f3f1cf75d7068baae', NULL, '2013-09-07 16:43:26', 0, '1970-01-01 00:00:00', 'tH1I0uPzgDWbdWTXv0c01lcDG20kwmw', 1, 0);
INSERT INTO `adusers` VALUES (444, 'ymtech', '6e5e72756ce9b1b1e8e737dd7f49180b', NULL, '2013-09-07 20:05:56', 0, '1970-01-01 00:00:00', '4aRQyWmlsC5ql36l2X3ELai5X8vcmK', 1, 0);
INSERT INTO `adusers` VALUES (445, 'Nguyễn Phát Tài', '51afd28ee90cc1c887586cdaeec59af3', NULL, '2013-09-08 08:22:47', 0, '1970-01-01 00:00:00', 'nlbaVWhhaLwrHYUfJ00IIQGd2qZUTGfv', 1, 0);
INSERT INTO `adusers` VALUES (446, 'phu88', '69ee7d74f7d3c30b4759471e94e2583b', NULL, '2013-09-10 02:32:03', 0, '1970-01-01 00:00:00', 'KIWelEdwJFwQeQSvQGcgH4W7bKBBCciZ', 1, 0);
INSERT INTO `adusers` VALUES (447, 'maiphuong', 'a780f7ab01dfc5f4177591e9d0ed6148', NULL, '2013-09-10 10:28:44', 0, '1970-01-01 00:00:00', 'CHSSVWKwPXWxyO6JgNBesqo7DQatuJGw', 1, 0);
INSERT INTO `adusers` VALUES (448, 'cuong065', '20a87bf8e30fba6e8a4c1ecc9600daaa', NULL, '2013-09-10 22:07:44', 0, '1970-01-01 00:00:00', 'UPHD99fsJF8HGyB5Ip7mTp4UwxWSP4FT', 1, 0);
INSERT INTO `adusers` VALUES (449, 'tinnaisoi', 'ff9b9a1deb9336718ea6fc4337a9187b', NULL, '2013-09-10 22:37:42', 0, '1970-01-01 00:00:00', 'ohLOljngzcVfejwT3A23XXvFGY9Bgv0U', 1, 0);
INSERT INTO `adusers` VALUES (450, 'tphuc93', 'a3522045ae6d12b38f09ac4bfd3c2d2a', NULL, '2013-09-10 23:08:59', 0, '1970-01-01 00:00:00', 'w16FpVWQCkwPb4EM7kSbRoekIqYgwC8', 1, 0);
INSERT INTO `adusers` VALUES (451, 'mongvan1510', '4d3cd24c634c5024eab882f19606bd93', NULL, '2013-09-10 23:31:57', 0, '1970-01-01 00:00:00', '23FqWWGliG6QV8UVPwDMNqFVWYOWZwe', 1, 0);
INSERT INTO `adusers` VALUES (452, 'doanluongyb', '067e8fc43da3402c49bf427b400b88ed', NULL, '2013-09-11 01:25:28', 0, '1970-01-01 00:00:00', '96MpmnlXKI33O23mj2cBhzCAAtMkPW6', 1, 0);
INSERT INTO `adusers` VALUES (453, 'Hương Phù Sa', '9f41714aa07c0c193939b24e1ad02103', NULL, '2013-09-11 09:59:57', 0, '1970-01-01 00:00:00', '1c3KG6omk1192ypaQuoid9xHi8zHlv2', 1, 0);
INSERT INTO `adusers` VALUES (454, 'loncon200712', '3d4628cdf290eef816ec39a6dcdbfc77', NULL, '2013-09-11 10:58:36', 0, '1970-01-01 00:00:00', 'aoeJwGQvVp6lzScxbYp1WqYGhRM4fUyC', 1, 0);
INSERT INTO `adusers` VALUES (455, 'ledinhhung92', '7d55fedbf1babb66201a3cc3c0fe9f08', NULL, '2013-09-11 12:46:17', 0, '1970-01-01 00:00:00', 'fhvIPptpe8CV1soTH9OHzrRgtBWtVjd', 1, 0);
INSERT INTO `adusers` VALUES (456, 'nguyennguyet', '7635b666d45d7e01e9b6d2ea9db3c360', NULL, '2013-09-11 12:57:49', 0, '1970-01-01 00:00:00', 'UURM56jU0jRKw0fEGWcq8jxolC1IvXD1', 1, 0);
INSERT INTO `adusers` VALUES (457, 'thanhthinh', '9be3270002e6748a0677e6238d1f67a9', NULL, '2013-09-11 13:18:34', 0, '1970-01-01 00:00:00', 'ZwBevUqXrdA3EXZsJvJwkOzS2RP93Yb', 1, 0);
INSERT INTO `adusers` VALUES (458, 'hoangvanthong', '8a8402bc641b11ae0bbab278a852c66e', NULL, '2013-09-11 13:48:42', 0, '1970-01-01 00:00:00', 'Z0pBHHiKIUj24w6g4VUkI2MrXC1vVvSb', 1, 0);
INSERT INTO `adusers` VALUES (459, 'tsphcn', '59b7e960b37ade020f67958df007c6e7', NULL, '2013-09-11 15:35:01', 0, '1970-01-01 00:00:00', 'mQMusWw6QwTSLZ7lGXh8aM4LuvYSsjj', 1, 0);
INSERT INTO `adusers` VALUES (460, 'dk237', 'bcd4fbde6d3c14d087b78301a1cd38c1', NULL, '2013-09-11 16:05:11', 0, '1970-01-01 00:00:00', 'sVWHvPFjN21x79qelvKiKafeCk6GlfYc', 1, 0);
INSERT INTO `adusers` VALUES (461, 'HuanHuan', '33af588b006febace57facbaca6fe618', NULL, '2013-09-11 17:11:37', 0, '1970-01-01 00:00:00', 'KZppAx13YuLW0FeMWlDxq1xLfGhgdLX', 1, 0);
INSERT INTO `adusers` VALUES (462, 'sonhcmute', '368682599e5f5ce313ff6f916805b7a2', NULL, '2013-09-11 17:16:59', 0, '1970-01-01 00:00:00', 'tAd3wQJwDJ49W8SW3kLGwWN5yvGlbK3D', 1, 0);
INSERT INTO `adusers` VALUES (463, 'duythongvn', '5044f1b517621d450e7a05a228fa411b', NULL, '2013-09-11 20:20:30', 0, '1970-01-01 00:00:00', 'RwHEgWy5j5teGww9fgKaw0QOYvS4R0D', 1, 0);
INSERT INTO `adusers` VALUES (464, 'nguyen chi loc', '1e0dfb231ab5f3ddcec4db61b4667c68', NULL, '2013-09-11 20:45:37', 0, '1970-01-01 00:00:00', 'cwc2ZMTOK1iS43WZnD52y109UwfHRot9', 1, 0);
INSERT INTO `adusers` VALUES (465, 'yajymmy', 'a22d8a55af9c8fa844b825d5aa38f818', NULL, '2013-09-11 22:35:07', 0, '1970-01-01 00:00:00', 'OouxaaOumBIQzoNqHGWXQpYMDuDmDIX', 1, 0);
INSERT INTO `adusers` VALUES (466, 'hieu47', '467b617fec4d9fcb63505734ee224851', NULL, '2013-09-12 01:34:02', 0, '1970-01-01 00:00:00', 'CpjTdSaQRzGB6W7KCKFVpuTbndBzsUc', 1, 0);
INSERT INTO `adusers` VALUES (467, 'ngoccne7621176', '518052800c82275aa5399cbe5f3cdd4f', NULL, '2013-09-12 09:53:07', 0, '1970-01-01 00:00:00', 'LNmKrvjEvWjNF1Z6bffoHNizZoPbbCK', 1, 0);
INSERT INTO `adusers` VALUES (468, 'bulubuloa', '7cbbc497f9b9a5516b54a8c6e7c27452', NULL, '2013-09-12 11:16:49', 0, '1970-01-01 00:00:00', '2fjCLw4hFyTAgWAkw85gBa3bRuqCPEaO', 1, 0);
INSERT INTO `adusers` VALUES (469, 'Krongno', 'ced2a9c8632649c52d41b9d11e30a530', NULL, '2013-09-12 11:40:34', 0, '1970-01-01 00:00:00', 'YXEaephbCjkzRyyBW1pYEq6GUbpF4xgC', 1, 0);
INSERT INTO `adusers` VALUES (470, 'ngocthuy1980', '48afa900cba9cfc5b2ba411521dd9dab', NULL, '2013-09-12 11:46:40', 0, '1970-01-01 00:00:00', 'xoKSaR3wQ60fnxxwRld6Wp941mkcMfZo', 1, 0);
INSERT INTO `adusers` VALUES (471, 'QuangcaoThienTa', '372b6cfca6c59698a67f3b8b2a925a58', NULL, '2013-09-12 12:06:30', 0, '1970-01-01 00:00:00', 'S1WiRuVWf8pqgzXwPlB2HMTJXbXGnOL8', 1, 0);
INSERT INTO `adusers` VALUES (472, 'hlquynhanh', '668ed1a0340420219bc0a91941039d14', NULL, '2013-09-12 14:00:42', 0, '1970-01-01 00:00:00', 'BZd5FTjUxI8B3edoFVMYzvkiBl3UTCBb', 1, 0);
INSERT INTO `adusers` VALUES (473, 'coultimate', '6868ff5f74707395fad9e64295c556b7', NULL, '2013-09-12 14:58:37', 0, '1970-01-01 00:00:00', 'MrZfi1e5nqXel40buhKZO0557KDZzDHW', 1, 0);
INSERT INTO `adusers` VALUES (474, 'bangha03', '68fece1580c4ee63a58eb0df5e1b50cc', NULL, '2013-09-12 14:59:06', 0, '1970-01-01 00:00:00', 'JNqEftaLFk1UXWG4bUgt6Rdx8IcRhmOh', 1, 0);
INSERT INTO `adusers` VALUES (475, 'dokimloan', 'd10e80266a4a0465138e2fead968ce0e', NULL, '2013-09-12 15:29:27', 0, '1970-01-01 00:00:00', 'lh1meFWhFIgR6DF2KIK9lWnX0SHWKG', 1, 0);
INSERT INTO `adusers` VALUES (476, 'daheo', '6fe14515dca979c58e811ee9a90b0e7e', NULL, '2013-09-12 15:33:23', 0, '1970-01-01 00:00:00', 'BGeabnwBRnWKHwqSJmjsFHTAcmE3HugD', 1, 0);
INSERT INTO `adusers` VALUES (477, 'luquanti', 'd15c815382ee7393e8be9a449e20194d', NULL, '2013-09-12 15:47:04', 0, '1970-01-01 00:00:00', 'xZP5BWkF4Un8ZH9CAaAOvslO9Tw0kGhU', 1, 0);
INSERT INTO `adusers` VALUES (478, 'king2210', 'bc5581b00fa36642445f99a70c9c5076', NULL, '2013-09-12 15:57:13', 0, '1970-01-01 00:00:00', '69WUBEMTFlfYzll4uMs1DARPY44MrYIV', 1, 0);
INSERT INTO `adusers` VALUES (479, 'sunflower', 'f7c7ea03c2670820899b77dd65fcb5a6', NULL, '2013-09-12 16:14:48', 0, '1970-01-01 00:00:00', 'zc6YDluNg140rF3B17baj7gai7WkI5H', 1, 0);
INSERT INTO `adusers` VALUES (480, 'online29', '42aceb7c8f202bb3668b74dbcd26c8c0', NULL, '2013-09-12 16:33:08', 0, '1970-01-01 00:00:00', 'OKyni122wWohd7cRGir9YSEE3Sk5Nq7L', 1, 0);
INSERT INTO `adusers` VALUES (481, 'duongtuluc', '135f97978d608345efb6923159294825', NULL, '2013-09-12 16:35:38', 0, '1970-01-01 00:00:00', 'aEmq7iKieC4eQzI5WkPCTjCShWb11lg', 1, 0);
INSERT INTO `adusers` VALUES (482, 'winsolo1992', '2b001065ede33cfac37137b90774038c', NULL, '2013-09-12 21:40:30', 0, '1970-01-01 00:00:00', 'AOHwsFYBb8TAs46bwPajSpZWfVnhlR7', 1, 0);
INSERT INTO `adusers` VALUES (483, 'thewinner', 'd93a3ddf0658b27dfa3baab3258524db', NULL, '2013-09-12 21:52:27', 0, '1970-01-01 00:00:00', 'v4b3SoPSzW6e8rMwMfjInSSoi1ZWNJYL', 1, 0);
INSERT INTO `adusers` VALUES (484, 'chenhvenh', '62a5efb995cff7cbae560bd6eb6814ef', NULL, '2013-09-12 22:10:49', 0, '1970-01-01 00:00:00', 't8Ou4sYwv0hwJI2c7XrLlLwwMtBALV', 1, 0);
INSERT INTO `adusers` VALUES (485, 'loctv30', 'f0d5374ed16928d1cca01916d2166330', NULL, '2013-09-12 22:26:13', 0, '1970-01-01 00:00:00', 'rEP5bNo3IOM97WF4zx8WM9tW8hx7Jxrv', 1, 0);
INSERT INTO `adusers` VALUES (486, 'shinskure', '026b75ed89eeb665c0cec9ca93227c32', NULL, '2013-09-12 22:27:45', 0, '1970-01-01 00:00:00', 'C9AT6saYRKc0raUsKmZXkODZ8WhEunT', 1, 0);
INSERT INTO `adusers` VALUES (487, 'nhoxtshokk', '4297f44b13955235245b2497399d7a93', NULL, '2013-09-13 07:53:20', 0, '1970-01-01 00:00:00', 'oMttonB7cMc8CoAwjMvYrv2mi1BH6DD9', 1, 0);
INSERT INTO `adusers` VALUES (488, 'dichvuunlock', 'de299eb7b58a17594e7a98b5ec8584c6', NULL, '2013-09-13 08:41:28', 0, '1970-01-01 00:00:00', 'KJcOiXT0AW68WW3hWjI0RDYnPlfSJg0', 1, 0);
INSERT INTO `adusers` VALUES (489, 'nguyendiep85', 'ee69840762fc2d364039ea3638b74e35', NULL, '2013-09-13 13:31:48', 0, '1970-01-01 00:00:00', 'YVUctVTDzvupGcQIiJMe4CNnkUr3gjGW', 1, 0);
INSERT INTO `adusers` VALUES (490, 'luonghoangloc', 'cd0d90bf064800f5ec0cb63e17cb05a7', NULL, '2013-09-13 13:53:56', 0, '1970-01-01 00:00:00', 'TpUAhQ6NOVTCZq0594xydVhwwjWHiae', 1, 0);
INSERT INTO `adusers` VALUES (491, 'kimsunbp', 'e6749113d3e8f5975f2b629362839e8e', NULL, '2013-09-13 14:09:01', 0, '1970-01-01 00:00:00', 'L1gPRgbh9NNor9ve9Q3j1MC1kquVKnBt', 1, 0);
INSERT INTO `adusers` VALUES (492, 'win', '2ef5e41f2be21daefce12a46cd53f0d9', NULL, '2013-09-13 14:52:41', 0, '1970-01-01 00:00:00', 'w55mQTfwtokbKAr8aoww5LoiSFekejp', 1, 0);
INSERT INTO `adusers` VALUES (493, 'cachuao0o1102', '809cd3be6e7336ac54356cd07336e2d3', NULL, '2013-09-13 16:10:40', 0, '1970-01-01 00:00:00', 'V01IxwyuNi09oEJ9OuGblkVYUwZW31tR', 1, 0);
INSERT INTO `adusers` VALUES (494, 'souloffox', '809cd3be6e7336ac54356cd07336e2d3', NULL, '2013-09-13 16:22:36', 0, '1970-01-01 00:00:00', 'dO4JQkg5p383SEw6CG7FzWOOkrxzmz5T', 1, 0);
INSERT INTO `adusers` VALUES (495, 'dangyenhoa', 'a4e42f1a20d7b16a51377623a79e66aa', NULL, '2013-09-13 16:38:12', 0, '1970-01-01 00:00:00', 'g7wKH7KwCxdfnOHLTKEpwnIWAXPdGBgu', 1, 0);
INSERT INTO `adusers` VALUES (496, 'greenhope', 'a9fcce84583dd882cc7f216e18f26478', NULL, '2013-09-13 19:18:12', 0, '1970-01-01 00:00:00', '5Ei8Ot3WkVO8OyZGzNEQBoqqvxSJ8tB', 1, 0);
INSERT INTO `adusers` VALUES (497, 'thuytrang', '989a38360e9d730ff258a36eae8921e8', NULL, '2013-09-13 19:24:53', 0, '1970-01-01 00:00:00', '3qHUqlc8ewBMkb6wE3oAJEXlk6hGPG3e', 1, 0);
INSERT INTO `adusers` VALUES (498, 'thuytrang86', '989a38360e9d730ff258a36eae8921e8', NULL, '2013-09-13 19:32:10', 0, '1970-01-01 00:00:00', 'ZGQCFzkjIHuByVdeuA6NudKSKXV6psp5', 1, 0);
INSERT INTO `adusers` VALUES (499, 'Thao Vo', 'e1110a61eb710a9b87b50e21005b6fed', NULL, '2013-09-13 21:02:30', 0, '1970-01-01 00:00:00', 'WZGHx9K4A4wF6fdwpW0ORls3ZyuzgUv9', 1, 0);
INSERT INTO `adusers` VALUES (500, 'suongnguyen', 'c9bd09e6df2b8b41aad98caccd210d69', NULL, '2013-09-14 08:18:51', 0, '1970-01-01 00:00:00', 'mNfMxsEPsoGzKQwkiFWxTCt7yIw1Yd', 1, 0);
INSERT INTO `adusers` VALUES (501, 'ngocvinh.2010', 'a25326cde831c7575d7dc6f3679933fc', NULL, '2013-09-14 09:32:56', 0, '1970-01-01 00:00:00', 'WCePsXD718w0O7TT5OsPWAHdNsy0DkNM', 1, 0);
INSERT INTO `adusers` VALUES (502, 'adoraskyta', '18f0b386f9ede73ae887a8f3405d2114', NULL, '2013-09-14 12:28:41', 0, '1970-01-01 00:00:00', 'ghRkCq8lk1mct3hKE1bTXDFMUeID1gUn', 1, 0);
INSERT INTO `adusers` VALUES (503, 'HaoHao', '43c826616f2e7549c53d1a01ac503ecc', NULL, '2013-09-14 13:15:05', 0, '1970-01-01 00:00:00', 'FiHYOvdSkldSYWDytzcRfwL3nZVokwiw', 1, 0);
INSERT INTO `adusers` VALUES (504, 'quynhcoi2008', 'fa9626d7385d51e3c920c4cf8a339567', NULL, '2013-09-14 13:19:24', 0, '1970-01-01 00:00:00', 'KVfczJo0cQwi8EchbP0AThhV00afTK4', 1, 0);
INSERT INTO `adusers` VALUES (505, 'huyentrang', 'dc607101eda2359a6ee2edf2071eb987', NULL, '2013-09-14 15:02:23', 0, '1970-01-01 00:00:00', 'PDXPuZuhwPS85qbLS36XKu3CnT3m0pGS', 1, 0);
INSERT INTO `adusers` VALUES (506, 'Benztgh', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, '2013-09-14 16:32:13', 0, '1970-01-01 00:00:00', 'qrMpL4nutqut7sDSifbYON0mWWUVKQid', 1, 0);
INSERT INTO `adusers` VALUES (507, 'huynhanh566', '5acb56e10a61883d9cdecf07dbc35c18', NULL, '2013-09-14 19:24:12', 0, '1970-01-01 00:00:00', 'zABpWTabAw4x9DbicDHYyJbBAoaO3k7A', 1, 0);
INSERT INTO `adusers` VALUES (508, 'caodinhson', '868956471a288106be0bd3b55436cd41', NULL, '2013-09-14 20:08:26', 0, '1970-01-01 00:00:00', 'hj4ai6iNQMYoKtDiLUpCYGmyx2qTVvvq', 1, 0);
INSERT INTO `adusers` VALUES (509, 'tuansidzu', '06e2cf6440399d400360471450436df9', NULL, '2013-09-14 22:11:05', 0, '1970-01-01 00:00:00', 'SrrxPhnyH1PVk9tvwvLCj5MZGGVr9wp', 1, 0);
INSERT INTO `adusers` VALUES (510, 'LE THI LOAN', '4b129d8013144963c82299e45d580d49', NULL, '2013-09-15 10:54:00', 0, '1970-01-01 00:00:00', 's6uVc11AugCskWVdEmQWl2HBcXWWUMH', 1, 0);
INSERT INTO `adusers` VALUES (511, 'willyphanvy', 'fb5c48b9bb77d05137afcd2cbdf7aeea', NULL, '2013-09-15 11:29:19', 0, '1970-01-01 00:00:00', 'OaWrCXxud7Ka3TGNYRlgWxg8rVVFyGn', 1, 0);
INSERT INTO `adusers` VALUES (512, 'phamquangctv', '03dd681afb8e28849271d19f631d0976', NULL, '2013-09-15 14:22:03', 0, '1970-01-01 00:00:00', '9kub8MUTwlw6ohQDwhxUf2fOvwDm9F', 1, 0);
INSERT INTO `adusers` VALUES (513, 'quang22t@gmail.', 'd25a1410b2030ff22b3d5a565afdee01', NULL, '2013-09-15 14:30:36', 0, '1970-01-01 00:00:00', 'qNCjNXYp8EVVfIjRM551T5tsLPutZK7', 1, 0);
INSERT INTO `adusers` VALUES (514, 'anhemctv', '03dd681afb8e28849271d19f631d0976', NULL, '2013-09-15 15:14:23', 0, '1970-01-01 00:00:00', 'FWTmV4FW0Q32v3ppz10R32yZQoX5rQT', 1, 0);
INSERT INTO `adusers` VALUES (515, 'trongnguyen6723', '20207a142fa2b9c225dec048388ac72e', NULL, '2013-09-15 18:12:06', 0, '1970-01-01 00:00:00', 'W9M5xM4fn71u6Xxt9AzkAkhho3Xqvxi9', 1, 0);
INSERT INTO `adusers` VALUES (516, 'phuthuan2020', 'a95507c24b45345678340e8e35de4a95', NULL, '2013-09-15 18:21:19', 0, '1970-01-01 00:00:00', '1VVvZrtwMUFmYEbSaf6hDDo94MbesaGx', 1, 0);
INSERT INTO `adusers` VALUES (517, 'anhemctv1', '6f9941fcd0e91382b6c0ce36a5ad09f0', NULL, '2013-09-15 19:48:30', 0, '1970-01-01 00:00:00', 'bNj1DKTAq65GBwOjFF5NNw1WvdKQ1bm', 1, 0);
INSERT INTO `adusers` VALUES (518, 'nico3ro', '56dc20ed68239ab96a0e01b763e17289', NULL, '2013-09-15 20:27:23', 0, '1970-01-01 00:00:00', '9hGLS1mY1Nccetw07ORlmOWuNNgrtH4', 1, 0);
INSERT INTO `adusers` VALUES (519, '04011294', '69a9973101bfeb701c5d30d496e2ea25', NULL, '2013-09-15 21:57:59', 0, '1970-01-01 00:00:00', 'w4MsXw3Q2QJOEU0c0ZZJM5jgOHP7geWu', 1, 0);
INSERT INTO `adusers` VALUES (520, 'thuy', 'd2d843eb96d68428734763aa523649a6', NULL, '2013-09-15 22:22:40', 0, '1970-01-01 00:00:00', 'HwtOcYQLGx1YrMbIteQ38aNR2VAdPDzq', 1, 0);
INSERT INTO `adusers` VALUES (521, 'Duong Thi Thom', '7c40a83a32f47bcef7b41e9a740f7912', NULL, '2013-09-15 23:35:32', 0, '1970-01-01 00:00:00', 'rw8iQUASkW1q0JUBqQGynDdfKN6gjmJ', 1, 0);
INSERT INTO `adusers` VALUES (522, 'chipsey7', 'da5929e847318b82287f82495a9fdece', NULL, '2013-09-16 01:54:09', 0, '1970-01-01 00:00:00', 'y1ABSmR01zB58teheeVU1UVyGuhNKrj', 1, 0);
INSERT INTO `adusers` VALUES (523, 'chipset7', 'da5929e847318b82287f82495a9fdece', NULL, '2013-09-16 01:55:34', 0, '1970-01-01 00:00:00', '4uugsFttxV0Ayj4YiGxkbnsCcVCgQKKk', 1, 0);
INSERT INTO `adusers` VALUES (524, 'daibang', '4d3d5611e8956d6ca4d64b4d0de008b6', NULL, '2013-09-16 07:53:57', 0, '1970-01-01 00:00:00', 'Esb9EIjMOnMMWpzubWRzG5AdSUyLmkF', 1, 0);
INSERT INTO `adusers` VALUES (525, 'Linh Huynh', 'ecba2568bebbbc75ba98bcfcbdd601e2', NULL, '2013-09-16 10:09:15', 0, '1970-01-01 00:00:00', 'Vf7Yp5P7UEoTleGFjI6sNJhsaRg8Vnh4', 1, 0);
INSERT INTO `adusers` VALUES (526, 'blue', '28d07e14ae209aa05c037657358e24b4', NULL, '2013-09-16 10:51:49', 0, '1970-01-01 00:00:00', 'NoKDDBE20nDOrk9tmYweteYwW8s5MWJW', 1, 0);
INSERT INTO `adusers` VALUES (527, 'thangtran369', '1d7331dc223c385a677feb6d3f5201c0', NULL, '2013-09-16 13:00:52', 0, '1970-01-01 00:00:00', 'VXBmyTgmKrZVP5ezkrRULWVNYqQeWgt7', 1, 0);
INSERT INTO `adusers` VALUES (528, 'anhthulam', 'c41b1fde021243d0fa89a4dc134d93ca', NULL, '2013-09-16 16:32:23', 0, '1970-01-01 00:00:00', 'JxWtDe8OWiWRn6uKjby1n3Gzu7aWBBB', 1, 0);
INSERT INTO `adusers` VALUES (529, 'huongxuan', '33c631622a0b56fe8a3112e106453f08', NULL, '2013-09-16 13:32:57', 0, '1970-01-01 00:00:00', '9s91yH99x7J0xjCcuLvga7fjsBfCKEQ', 1, 0);
INSERT INTO `adusers` VALUES (530, 'traitim.binhphuoc', '25d55ad283aa400af464c76d713c07ad', NULL, '2013-09-16 16:10:34', 0, '1970-01-01 00:00:00', 'YRe2IE3qCFaYb0Vt3pJX4uyaLO1htHBm', 1, 0);
INSERT INTO `adusers` VALUES (531, 'linhthanh1990', '55ea1ee8cc606fcb8b2df983bca2c392', NULL, '2013-09-16 16:29:46', 0, '1970-01-01 00:00:00', 'DQ0pJ34gw6tru7LSEW1cw8EeWwMZvM', 1, 0);
INSERT INTO `adusers` VALUES (532, 'Lulu', '5a67544ca1f529ed5abe07513341fcec', NULL, '2013-09-16 18:31:01', 0, '1970-01-01 00:00:00', 'XRRXts5VRz7efLzwAg6LVbSDBsSgLRZ', 1, 0);
INSERT INTO `adusers` VALUES (533, 'anhkhoa123', '9f3c6c054a9aa8da6daf9a533d43565c', NULL, '2013-09-16 19:49:37', 0, '1970-01-01 00:00:00', 'NOb495WcxvbAzUqBk0pazzblyOUvm08', 1, 0);
INSERT INTO `adusers` VALUES (534, 'ngocdieu', '38d0140b584b69def0c5088a5121a815', NULL, '2013-09-16 20:07:14', 0, '1970-01-01 00:00:00', 'Y6MZuN1hyAj1cUVd0Ut1WEKtkA5jur5R', 1, 0);
INSERT INTO `adusers` VALUES (535, 'quy', 'c6defacd39eb551c3ea08b7da18cc828', NULL, '2013-09-16 20:15:33', 0, '1970-01-01 00:00:00', 'xcx7q1wK2jwBzeJftQWecKsT4leiFjhG', 1, 0);
INSERT INTO `adusers` VALUES (536, 'ngoanhvu', '573744e7a19384aafd9d7f25ebeb075b', NULL, '2013-09-17 11:52:47', 0, '1970-01-01 00:00:00', 'abWNA4mlL0YkLYipC6FwDo9qomLlwvI', 1, 0);
INSERT INTO `adusers` VALUES (537, 'ngovanvu', '573744e7a19384aafd9d7f25ebeb075b', NULL, '2013-09-17 12:22:09', 0, '1970-01-01 00:00:00', 'evIkmJLxYKy8RiTZqhbEv2RKPVfs1VMW', 1, 0);
INSERT INTO `adusers` VALUES (538, 'dinhnghiep94', 'ed2b1f468c5f915f3f1cf75d7068baae', NULL, '2013-09-17 14:00:42', 0, '1970-01-01 00:00:00', 'MmgwlfLJOx3zwRgqmIT22u1tuHW5BY9Y', 1, 0);
INSERT INTO `adusers` VALUES (539, 'phamtuyetlinh87', 'dc2031c7fb0dd3a478cd5cc5cae01a81', NULL, '2013-09-17 14:37:42', 0, '1970-01-01 00:00:00', '6B3GiCZKa0LteQo9XI7WWSfq4hC1Qqx', 1, 0);
INSERT INTO `adusers` VALUES (540, 'nbloc', '0a0683e0d1e5286e487466e1170beac3', NULL, '2013-09-17 16:34:33', 0, '1970-01-01 00:00:00', 'Heqg5lGp1vJIVmaLvvXkx1PFIHJWNok', 1, 0);
INSERT INTO `adusers` VALUES (541, 'nhientran', '5bdabfa6db13faa14fea0a7860a5a5a3', NULL, '2013-09-17 17:11:59', 0, '1970-01-01 00:00:00', 'W3o3MiIXdpruffKtpIKvDyBsguRMVw', 1, 0);
INSERT INTO `adusers` VALUES (542, 'lamhuynhngoc', 'f671890c748c2f07050c792881e41c80', NULL, '2013-09-17 17:58:19', 0, '1970-01-01 00:00:00', 'OCEtqvmndhYM0KV7ffno16whwoMZumb', 1, 0);
INSERT INTO `adusers` VALUES (543, 'dream_3810', '3996b264ea4a79b2708a21107a745a60', NULL, '2013-09-17 20:25:21', 0, '1970-01-01 00:00:00', 'kU5H31Qt3WamymjZKb4HO5mKnBLh6bfr', 1, 0);
INSERT INTO `adusers` VALUES (544, 'vietnamgame', '88fbfb7bed3a0f78ccc670d3c67b700d', NULL, '2013-09-17 20:45:13', 0, '1970-01-01 00:00:00', 'aCnkTH0gCEm15D906un1bUiMwVSYhGW', 1, 0);
INSERT INTO `adusers` VALUES (545, 'dacthihang', 'ee708bd14b9a4abd688f3ae3f1b96a95', NULL, '2013-09-17 21:03:26', 0, '1970-01-01 00:00:00', 'PJJWWQT27fS4rupNrhO6j5LG0hc3ykFd', 1, 0);
INSERT INTO `adusers` VALUES (546, 'Tien', '0635cd86dbc9ae962adce1833492e55e', NULL, '2013-09-17 21:08:52', 0, '1970-01-01 00:00:00', 'cSQ0Py1OUQHa3m5cNL14OUwcaTqkJ2Wm', 1, 0);
INSERT INTO `adusers` VALUES (547, 'kyuckhongquen', '581e79b90850e9c0adaa4f25557d8478', NULL, '2013-09-17 22:13:55', 0, '1970-01-01 00:00:00', 'XnamRUvQRefkza6wXDWfxYAj1k6GMcHF', 1, 0);
INSERT INTO `adusers` VALUES (548, 'nguyenha', '6b6d07fdc31dde57227e6b1adc2ac1fe', NULL, '2013-09-18 07:46:17', 0, '1970-01-01 00:00:00', '9mg1lWzowwdB0xfVvsIwiCH7SGbAkgNu', 1, 0);
INSERT INTO `adusers` VALUES (549, 'bandboy9x', '4e52cbdb7fd7542ee4e822a0be95d364', NULL, '2013-09-18 12:28:11', 0, '1970-01-01 00:00:00', 'aVRFzTzlcvVZbQ5aMgWdBqzPqddKWP16', 1, 0);
INSERT INTO `adusers` VALUES (550, 'shjnboy994', '74e106d01fc65749536e58633ca0203c', NULL, '2013-09-18 13:02:34', 0, '1970-01-01 00:00:00', 'JOyVocdIp8el08r4lSD4SBa2l5YHFn', 1, 0);
INSERT INTO `adusers` VALUES (551, 'chunsay', '4a8ede441a6ace2e83242ed5fd80f631', NULL, '2013-09-18 15:34:21', 0, '1970-01-01 00:00:00', '3oaE78pZq50DbUmaYDZcw0Wl18H50mw8', 1, 0);
INSERT INTO `adusers` VALUES (552, 'dandelion', '7f5dbde233e254198ab74bdd865b10c1', NULL, '2013-09-18 15:49:26', 0, '1970-01-01 00:00:00', 'yUdrS452PQdG1uQ7k9aKZeGUCQb12Y4G', 1, 0);
INSERT INTO `adusers` VALUES (553, 'dandelion9x', '7f5dbde233e254198ab74bdd865b10c1', NULL, '2013-09-18 16:09:14', 0, '1970-01-01 00:00:00', 'UoCRkVezvipzdnJLW8k4PNWrgWikhgg1', 1, 0);
INSERT INTO `adusers` VALUES (554, 'dangtrinh91', '251da0821071a73aa3d2d004db8e2c96', NULL, '2013-09-18 16:51:15', 0, '1970-01-01 00:00:00', 'qs8G4BD62FFcdj45BYUwIWQewzpPZSo', 1, 0);
INSERT INTO `adusers` VALUES (555, 'tigerpaper', '752cb9e6cac76ed7b0d31930384ecafb', NULL, '2013-09-18 18:40:11', 0, '1970-01-01 00:00:00', 'TefjpDmo9KoZStXoJC3X1Av8xZsksWw', 1, 0);
INSERT INTO `adusers` VALUES (556, 'thanh096', '63153c9ecac465aec5e7e2f793fc6168', NULL, '2013-09-18 19:47:36', 0, '1970-01-01 00:00:00', 'YUIXwL6cCtUvsADN1HJO6PxH1YRdO', 1, 0);
INSERT INTO `adusers` VALUES (557, 'vuly', '05b7e448827a6e964a2fc9b7d54a7d66', NULL, '2013-09-19 10:53:35', 0, '1970-01-01 00:00:00', 'VjflEVeSfhBvuQ9pEeozi1xemObXwrd', 1, 0);
INSERT INTO `adusers` VALUES (558, 'lvphuong523', '973833a76b55e14f9b74f97fa5f63e8a', NULL, '2013-09-19 11:33:41', 0, '1970-01-01 00:00:00', 'LMoP7MgSnW8vNIuITwCTmEAWDXcjqgI', 1, 0);
INSERT INTO `adusers` VALUES (559, 'tuanminh', '5d119b193eb9196adfa6591158f7fa56', NULL, '2013-09-19 12:46:50', 0, '1970-01-01 00:00:00', 'EWvpDzoC3EPOQNuWwX3zSqhvD3hzlCr5', 1, 0);
INSERT INTO `adusers` VALUES (560, 'ltphanv l', '9467d455acf1a37aa08312e1b8429c28', NULL, '2013-09-19 15:05:59', 0, '1970-01-01 00:00:00', 'TWGBTDarE8l0UDd0G5TTXhs98HQw3Dmg', 1, 0);
INSERT INTO `adusers` VALUES (561, 'lethanhphan', 'c1bebfb2d3e085aa3346285a37f7cbfd', NULL, '2013-09-19 15:40:49', 0, '1970-01-01 00:00:00', 'v3VP0hxCC25EKi2tRL5Y4q1eD0atweH', 1, 0);
INSERT INTO `adusers` VALUES (562, 'vukhacson0809', '26abdbee73b68c1e1cb8fb0a63a26214', NULL, '2013-09-19 16:14:12', 0, '1970-01-01 00:00:00', 'DTCHzCSJjeYwpyAVFrQWj0XN3XqRVK4y', 1, 0);
INSERT INTO `adusers` VALUES (563, 'sontelecom', 'ef18290099e273d59df0b3ef80602624', NULL, '2013-09-19 18:59:50', 0, '1970-01-01 00:00:00', 'awXflKThPXHvX2Vc1CfHRRl8olF27GKx', 1, 0);
INSERT INTO `adusers` VALUES (564, 'lamngoctam', 'e3d7baadc3dc92bb33f8d125f391bcf3', NULL, '2013-09-19 20:24:48', 0, '1970-01-01 00:00:00', '5bQV9HOjVkALC9oRxC17XaTioeWmJFc', 1, 0);
INSERT INTO `adusers` VALUES (565, 'ngosihung', 'bf36bdec5c32d4198430c855eb84514f', NULL, '2013-09-19 21:53:58', 0, '1970-01-01 00:00:00', 'WFd78zoiwrd9uVopXddJGPcGD7w48XAO', 1, 0);
INSERT INTO `adusers` VALUES (566, 'tranchitam', 'ee238db2177bc5cab215b4a8a3ec8d2f', NULL, '2013-09-19 22:29:18', 0, '1970-01-01 00:00:00', 'yXa3g23W7oVitJv5iVbANcXeXbyRoQTL', 1, 0);
INSERT INTO `adusers` VALUES (567, 'chitam', 'ee238db2177bc5cab215b4a8a3ec8d2f', NULL, '2013-09-19 22:39:53', 0, '1970-01-01 00:00:00', 'JkLvUxVFjPSRMGxW2XtnWDmJqAVqON2T', 1, 0);
INSERT INTO `adusers` VALUES (568, 'kiemtien198', '03dd681afb8e28849271d19f631d0976', NULL, '2013-09-20 00:18:56', 0, '1970-01-01 00:00:00', 'vUWL04OuRHWTDwBU4keUeuYczy6gVaRG', 1, 0);
INSERT INTO `adusers` VALUES (569, 'noname12', 'da4f199af0ab821968fb82832a4caadb', NULL, '2013-09-20 11:40:13', 0, '1970-01-01 00:00:00', 'cQHRhLQDP8M9ifqTJ1XIu4OMm7W992c', 1, 0);
INSERT INTO `adusers` VALUES (570, 'heobongua', '447b8ccc40611431b8bff229fbff8fe8', NULL, '2013-09-20 11:49:55', 0, '1970-01-01 00:00:00', 'mTlq75YIR16sf96QzWSaXW6O3w4Zr4Al', 1, 0);
INSERT INTO `adusers` VALUES (571, 'huynhvanhuy', '2a73d96999a633541601159fa56441df', NULL, '2013-09-20 14:09:58', 0, '1970-01-01 00:00:00', 'mFqdY0GgmpAkwT3vU34dhe8U1KRRD095', 1, 0);
INSERT INTO `adusers` VALUES (572, 'huebabi', 'ec0c6c39067e6cf8f7a03e66f4222558', NULL, '2013-09-20 15:48:45', 0, '1970-01-01 00:00:00', 'cIvwWyhiz0U6rMVa0Bpi2i0tqTRSBj9', 1, 0);
INSERT INTO `adusers` VALUES (573, 'gianghungviet', 'a4e24e4bec9eedc94fb6e6741447550e', NULL, '2013-09-20 21:48:09', 0, '1970-01-01 00:00:00', 'MpMD8mmalaI8iiXdn4eZ2M5S5yRQLWT', 1, 0);
INSERT INTO `adusers` VALUES (574, 'dinhhe.93', '317134f05abc1f00737b9dd6b9806172', NULL, '2013-09-21 09:12:24', 0, '1970-01-01 00:00:00', 'WLQphwrbD84moRIVuDzZTrwv2Hyfm82S', 1, 0);
INSERT INTO `adusers` VALUES (575, 'hernia', 'f8139e29cefa916e9330a20061ef7cf7', NULL, '2013-09-21 10:03:59', 0, '1970-01-01 00:00:00', 'I60bbUbiTVnpOAh4HyQm5BBLWctzqWY8', 1, 0);
INSERT INTO `adusers` VALUES (576, 'thaonguyen', '29c6b56e12aa01848005b792b9a73742', NULL, '2013-09-21 14:27:38', 0, '1970-01-01 00:00:00', 'tuIx11OYOaVlg7tWMuFS4E2TY5RCWPWi', 1, 0);
INSERT INTO `adusers` VALUES (577, 'MYMY', '527b98dd660b9483b049884575aa149a', NULL, '2013-09-21 18:00:43', 0, '1970-01-01 00:00:00', 'vWyZDhl80LUgcwNiKg0kBubEUYvbaNI', 1, 0);
INSERT INTO `adusers` VALUES (578, 'nhoklikute', 'ec7b8e5e5f521bc0f9fb81ea353fc102', NULL, '2013-09-23 00:05:01', 0, '1970-01-01 00:00:00', 'PZBFMw8ZlW65npu343T4RWfUPPyPz0jc', 1, 0);
INSERT INTO `adusers` VALUES (579, 'huanlan', '89dc5e4636f13036d9f798a0081e0f84', NULL, '2013-09-23 08:15:04', 0, '1970-01-01 00:00:00', 'UchokDD0LUUNFXLfubvjm3Ng2cZdHIC', 1, 0);
INSERT INTO `adusers` VALUES (580, 'tran1750', '800938be1353f0ab0416cfaafe48f358', NULL, '2013-09-23 10:47:09', 0, '1970-01-01 00:00:00', 'fO3gKnXgqlGld6YpQwvF9wxeGyIwBXtE', 1, 0);
INSERT INTO `adusers` VALUES (581, 'anhnv07', 'fc505d6cd61f8e9cc3e90ff52061d992', NULL, '2013-09-23 20:57:18', 0, '1970-01-01 00:00:00', 'A7crI0UY3z3QieEf0wQm8l7YScqQwj', 1, 0);
INSERT INTO `adusers` VALUES (582, 'gaumeo_0211', '178a20d83a0259cf270301bb7039e8f7', NULL, '2013-09-24 15:07:06', 0, '1970-01-01 00:00:00', '26MSQkAaodD7Th4ZeXJdwoCyRELegAnn', 1, 0);
INSERT INTO `adusers` VALUES (583, 'ndk3112', '4c5fdaa771e5ffda2d91f8e2c6baa271', NULL, '2013-09-24 15:19:12', 0, '1970-01-01 00:00:00', 'IPyZNsbuFzxNB8bDG2FvzJVMvvHbNQ91', 1, 0);
INSERT INTO `adusers` VALUES (584, 'ukulele09', '6be2bf283af398f6ae48f68efdda86cc', NULL, '2013-09-24 19:20:57', 0, '1970-01-01 00:00:00', 'oAqX2XDwkZ0WCQw6QZLTlkQuk1BcyWiZ', 1, 0);
INSERT INTO `adusers` VALUES (585, 'msthanh84', '5f63234e9ddd5139f46eb4d4e2d72d5a', NULL, '2013-09-24 21:02:13', 0, '1970-01-01 00:00:00', 'YthuZEI5kopFnRKROj3ws2rJhoHJWDj', 1, 0);
INSERT INTO `adusers` VALUES (586, '634662tam', '6a9f866a7d8d2324106bde517fb66cce', NULL, '2013-09-25 07:12:59', 0, '1970-01-01 00:00:00', 'tT1OBOn08NoBtRMhrW2eIzuVzwRz1H3U', 1, 0);
INSERT INTO `adusers` VALUES (587, 'DUNGZIDAN', '7642f70da9eab0d3ac83c0965da1bb46', NULL, '2013-09-25 10:19:08', 0, '1970-01-01 00:00:00', 'DKF1pNGUiPtPFxgP1WeWaBLrgh3mn3A3', 1, 0);
INSERT INTO `adusers` VALUES (588, 'tuyet mai', '6b049c15286429387808830fa4dd7b1a', NULL, '2013-09-25 12:31:16', 0, '1970-01-01 00:00:00', 'exCZtfZtfzKjynwoXckn9qwzUR7bGA2o', 1, 0);
INSERT INTO `adusers` VALUES (589, 'jessicaho', 'e5b561a4f0b4f54837e6e4a5c51a1957', NULL, '2013-09-25 13:51:50', 0, '1970-01-01 00:00:00', 'lHtmtiqIQGHdMAH1xKwgj7tt2KGSGnz', 1, 0);
INSERT INTO `adusers` VALUES (590, 'qavaky', 'e480a479be63d570bb1e1b0f714c0e10', NULL, '2013-09-25 13:56:10', 0, '1970-01-01 00:00:00', 'wKYAw2ogczyxBlLEe8wDjB8eMf3MiMg6', 1, 0);
INSERT INTO `adusers` VALUES (591, 'tuyetgiao', '57f85ff091b87a716d28004f073210c7', NULL, '2013-09-27 08:38:49', 0, '1970-01-01 00:00:00', 'fs5SCBhIlmWWPEe1tHkdGGvStM8wz7K', 1, 0);
INSERT INTO `adusers` VALUES (592, 'khangnd2308', '48c4a456e82754fea5f534b1d0fc51e8', NULL, '2013-09-28 08:46:17', 0, '1970-01-01 00:00:00', 'aGdMuOzgnFyEsXpwwqypUGXk3ekZxgV', 1, 0);
INSERT INTO `adusers` VALUES (593, 'nguyentram', 'b9e19ef0f3344c315db8cd37b090e6e8', NULL, '2013-09-28 13:33:55', 0, '1970-01-01 00:00:00', 'wwWPno3QwzSQ47tJXJwWR5wwtHICE3Rr', 1, 0);
INSERT INTO `adusers` VALUES (594, 'nga', '9fe9893ade1384ab1d48f52ab201723b', NULL, '2013-09-29 12:54:56', 0, '1970-01-01 00:00:00', '2xB1GMvv8ERlG7dYgBQ6QOpPRXkY8O', 1, 0);
INSERT INTO `adusers` VALUES (595, 'hoang.nha.370', '', NULL, '2013-09-29 15:45:20', 0, '1970-01-01 00:00:00', 'TCUkIpHYwaPwocpwjHYrHU0gxSwemX5T', 1, 0);
INSERT INTO `adusers` VALUES (596, 'oceanmath99', 'eacb239fa6c9c6e5f9897da4494e81cc', NULL, '2013-09-29 22:03:08', 0, '1970-01-01 00:00:00', 'OtgmN6DnFQLxL1NLBLQLcidUfpXwThtc', 1, 0);
INSERT INTO `adusers` VALUES (597, 'daiduong99', 'eacb239fa6c9c6e5f9897da4494e81cc', NULL, '2013-09-29 22:08:49', 0, '1970-01-01 00:00:00', 'XD0tUirqJHrogjvSvRfWkUboj7VmT7B', 1, 0);
INSERT INTO `adusers` VALUES (598, 'lienchi', 'c115831dcd882d5e0df59b1c28d15ed6', NULL, '2013-09-29 22:24:05', 0, '1970-01-01 00:00:00', 'hVeUVqRObjwKvNZWivoTztloTCAPgDgU', 1, 0);
INSERT INTO `adusers` VALUES (599, 'trandung260893', '66362e077d9aa0756a52a5be8629b1c0', NULL, '2013-09-29 22:44:32', 0, '1970-01-01 00:00:00', '7demseAt9gfAYuMwrYFZGbF9e3amV06Z', 1, 0);
INSERT INTO `adusers` VALUES (600, 'kingsolomon', 'bbdd0e294fd183663ccadb3d3f94dca1', NULL, '2013-09-30 01:41:35', 0, '1970-01-01 00:00:00', 'c2ftlzF7nbqQqNY3quLwgGWkIIT2F2P', 1, 0);
INSERT INTO `adusers` VALUES (601, 'no0b1912', '34627a6fdeff9102f583002aec98a53a', NULL, '2013-09-30 10:18:42', 0, '1970-01-01 00:00:00', 'aIa2npQKcGi4YicpwXkwJcm8Dwqwog', 1, 0);
INSERT INTO `adusers` VALUES (602, 'vothanhthoai005', '42fe5b4a69b5f7a97c6de8a2ee047ee7', NULL, '2013-10-01 00:58:08', 0, '1970-01-01 00:00:00', '8blW1fUXv83olD6wncXXzPEDrLX4E7i', 1, 0);
INSERT INTO `adusers` VALUES (603, 'maydongphuc', 'ddfbb7485de7539fa332c6e8382e5d73', NULL, '2013-10-01 13:20:51', 0, '1970-01-01 00:00:00', '4WyxX1v6lwZsJSJDNDzbQDdSD7cNNO', 1, 0);
INSERT INTO `adusers` VALUES (604, 'Vanndinh', '2aa49558c3aca99ae303478873403521', NULL, '2013-10-01 16:13:33', 0, '1970-01-01 00:00:00', 'nS78gBBQrOJ2qR8qwD9odKFIWqW9wW2g', 1, 0);
INSERT INTO `adusers` VALUES (605, 'nile', 'afa0511c134699ac9d6ac98bbf956225', NULL, '2013-10-02 05:28:09', 0, '1970-01-01 00:00:00', 'NBY71NUMU0n6q4f0gCFaZyxl7zTZYEAx', 1, 0);
INSERT INTO `adusers` VALUES (606, '0zozozo', 'e0f9f47b4caee2f4caa6c13197b73ba5', NULL, '2013-10-02 09:51:45', 0, '1970-01-01 00:00:00', 'ryaXoLwEebWMYW8wg67egJoQ20ZBfHHd', 1, 0);
INSERT INTO `adusers` VALUES (607, 'nudung1112', '8c13b5750412d922b01b2da95d24f8b6', NULL, '2013-10-02 15:58:23', 0, '1970-01-01 00:00:00', 'bhyTmB9HwsswGgBJbhz6cZPQhn9efQR', 1, 0);
INSERT INTO `adusers` VALUES (608, 'thaodang2407', '50e9abfbb1afe9b1709064d92a648010', NULL, '2013-10-03 14:22:46', 0, '1970-01-01 00:00:00', 'NxImZ2IBsWOLmb4rjr4iIyrJOjWb7zSX', 1, 0);
INSERT INTO `adusers` VALUES (609, 'heneikenl', 'd7af994f1f1ef8b5e3beb9f7fb139f57', NULL, '2013-10-04 10:22:47', 0, '1970-01-01 00:00:00', 'wBQnaTWsTIhY4tdZX17ncF3Dbpcc94Hk', 1, 0);
INSERT INTO `adusers` VALUES (610, 'kaka181', '1c1a60f5c53eaef23fc6af75f876a948', NULL, '2013-10-04 11:29:47', 0, '1970-01-01 00:00:00', 'xdh7uPp69KVICgtbcGhfW1MUXVXewJmV', 1, 0);
INSERT INTO `adusers` VALUES (611, 'lehh_10', '7c0cf6a43cfa562a7485ed01e27b0d8e', NULL, '2013-10-05 15:42:50', 0, '1970-01-01 00:00:00', 'LXsrQbsqG6SotZdLECqUFf2WiQ3oQIQW', 1, 0);
INSERT INTO `adusers` VALUES (612, 'truongthinh79', '3949b706447f0a6c200cf37170d16264', NULL, '2013-10-06 17:13:59', 0, '1970-01-01 00:00:00', '6CkSRaEKuH8hG81G0qEUYJVndMaEwbY', 1, 0);
INSERT INTO `adusers` VALUES (613, 'phungvandung', '7d92cfd08fa490a0a60e7c3bae868466', NULL, '2013-10-07 09:46:40', 0, '1970-01-01 00:00:00', 'AxZ2AdQZfPKImxOoPjyp18DbbJ8KJZ5p', 1, 0);
INSERT INTO `adusers` VALUES (614, 'sttrinh', '24de3011642b40e1a81a1d10cc08f4ea', NULL, '2013-10-07 15:17:46', 0, '1970-01-01 00:00:00', 'r71kvMWsVqRPIYe2dPeb5OaWwPWWxXCN', 1, 0);
INSERT INTO `adusers` VALUES (615, 'Hanhivy', 'ac456e9c5d52e74577dcbf6d013bfeed', NULL, '2013-10-07 23:08:26', 0, '1970-01-01 00:00:00', 'SvjW6TUM3JQ7modGuViWgUbfG7rTzw6', 1, 0);
INSERT INTO `adusers` VALUES (616, 'daothunhan', '5665a249f8843edb5cfb261ddd6c772b', NULL, '2013-10-08 14:43:30', 0, '1970-01-01 00:00:00', 'ov135wND18eBkSYJaywjkdq5yayzbkkC', 1, 0);
INSERT INTO `adusers` VALUES (617, 'jackelong', '65e06dac88aae635cb31bdac4fdcc006', NULL, '2013-10-08 14:44:19', 0, '1970-01-01 00:00:00', '1vCybcXrkrLD7MJgXM5kQrkqSX7YFEm', 1, 0);
INSERT INTO `adusers` VALUES (618, 'nguyen thai ha', '912e79cd13c64069d91da65d62fbb78c', NULL, '2013-10-08 15:33:57', 0, '1970-01-01 00:00:00', '7K8WvGZE2FFbfjPIpE1AUjvXCTNddwDb', 1, 0);
INSERT INTO `adusers` VALUES (619, 'hongthuy_hht', 'af58f14f79a78f5d7ebcddf702963675', NULL, '2013-10-08 15:37:57', 0, '1970-01-01 00:00:00', 'hKoKNtw9nSnBK4GIR6WQhHBIsuM8Kaor', 1, 0);
INSERT INTO `adusers` VALUES (620, 'nguyenhieu01', '13b43f3f2f800a60bc4e1b4af9028eb2', NULL, '2013-10-08 16:24:04', 0, '1970-01-01 00:00:00', 'LlyDRIsnNOinEwqPb8vX2PVxEAEU6gA', 1, 0);
INSERT INTO `adusers` VALUES (621, 'mjnhmjnh21', 'e42d0bb9f875932445d48a842626c5ea', NULL, '2013-10-08 17:15:56', 0, '1970-01-01 00:00:00', '5kOovrXmu6Ek1WCRfRGzTPgLH5dJMC6j', 1, 0);
INSERT INTO `adusers` VALUES (622, 'nhatvina2106', 'f73f8f3aa5f7a0445bc4c65c47fa82ff', NULL, '2013-10-08 17:38:46', 0, '1970-01-01 00:00:00', 'dmIJ4RZZHYjEHpZBAAonVzODqVkwRE0', 1, 0);
INSERT INTO `adusers` VALUES (623, 'su.spi_lk', '056739c17c99c5fc7c5f63f869fad5bc', NULL, '2013-10-08 18:04:57', 0, '1970-01-01 00:00:00', 'fbdvYbhKhXPVWLWdAQ9ifmnAZb7WElCz', 1, 0);
INSERT INTO `adusers` VALUES (624, 'ngocnvl', 'b1043be22595f13e67ecdf5d3d713568', NULL, '2013-10-08 18:25:11', 0, '1970-01-01 00:00:00', 'wbEEzJUbobGK3JYB8hCZQHTIw81j8swv', 1, 0);
INSERT INTO `adusers` VALUES (625, 'Quyenhandsome12', '472350d680e254713b8eb131243feee6', NULL, '2013-10-08 18:26:19', 0, '1970-01-01 00:00:00', 'RHazO84TTBnKcR7drVw9df7fqbSXdi', 1, 0);
INSERT INTO `adusers` VALUES (626, 'nh0xc3', 'da917f5981af9b1532fab8e15cac2ff6', NULL, '2013-10-08 20:14:03', 0, '1970-01-01 00:00:00', '7JwB5w9H3LDCdWYQCBYOXgpmRuJMVt1O', 1, 0);
INSERT INTO `adusers` VALUES (627, 'xuantribui', 'c0e98f3c749f5738775f8c7090afb1a5', NULL, '2013-10-08 21:21:27', 0, '1970-01-01 00:00:00', 'R08NlFxHzDHHXDW0Fq4eBz6vslwsqaEr', 1, 0);
INSERT INTO `adusers` VALUES (628, 'Truongvoky19', '577722a5034408dbe7bc0f777fb9020e', NULL, '2013-10-09 07:45:07', 0, '1970-01-01 00:00:00', '3wiHPw7bwWFNDGDCwwEFQe6KATL4TuV4', 1, 0);
INSERT INTO `adusers` VALUES (629, 'buivuong10', 'ac5bfc209a97ced0176ed304b2ab59ad', NULL, '2013-10-09 12:28:37', 0, '1970-01-01 00:00:00', 'j9oqa43OervKKOzwInRkTChZWHBnxtw', 1, 0);
INSERT INTO `adusers` VALUES (630, 'tuantrag1505', '849c02820b36e2e4e0d0c645fad04a24', NULL, '2013-10-09 19:24:20', 0, '1970-01-01 00:00:00', 'aNLsju5ao2luCTlCzbLDOMk6gPhSna7K', 1, 0);
INSERT INTO `adusers` VALUES (631, 'euroden', '87c85807cf1407acd4b5ad79845f87dd', NULL, '2013-10-09 20:55:54', 0, '1970-01-01 00:00:00', 'l3TB0WqX85Wvm22BOCJmFbM6bkGDzwHf', 1, 0);
INSERT INTO `adusers` VALUES (632, 'havanlinhtq', '16122c093e43a99467a3d91e199cd320', NULL, '2013-10-10 09:14:09', 0, '1970-01-01 00:00:00', 'unyiUEbOzzRFVEWNqw6SeJgwGhOpY9ux', 1, 0);
INSERT INTO `adusers` VALUES (633, 'hanhhanh88', 'd89003a2336770a4656cfbad7363cc85', NULL, '2013-10-10 10:19:12', 0, '1970-01-01 00:00:00', 'MNC8t19CZwIAv6BwbzuxO4i4cjbxN5ew', 1, 0);
INSERT INTO `adusers` VALUES (634, 'khang_phan1995', 'b4c98b7a4b1666073314fbbfc0b9b2b2', NULL, '2013-10-10 10:56:27', 0, '1970-01-01 00:00:00', 'sLqAN0U1piB75j9lteaX5qWlb6kpE4qg', 1, 0);
INSERT INTO `adusers` VALUES (635, 'nguyendung', '8704daa9d50eb980c40510d39c931bfe', NULL, '2013-10-10 14:10:15', 0, '1970-01-01 00:00:00', '3a8EVqKcIpXTbrS2ZBt3ToxQWFVqsKA', 1, 0);
INSERT INTO `adusers` VALUES (636, 'nguyendung613', 'fc310bcf98cc89bacf9a182cce9e5959', NULL, '2013-10-10 14:11:56', 0, '1970-01-01 00:00:00', 'svbnL9z2ciZjDJwmJWvSoYtS3WIWkDa', 1, 0);
INSERT INTO `adusers` VALUES (637, 'sesybody', '0884432aeb7b5c4e8254ed5ee13fe613', NULL, '2013-10-10 14:18:34', 0, '1970-01-01 00:00:00', 'vI7Sdj6YQEeHmAroVzIxi2VmQo68yD', 1, 0);
INSERT INTO `adusers` VALUES (638, 'hoangvankhac', '8645ef0cb6d32f5eac1aa38b2ff299d1', NULL, '2013-10-10 17:39:29', 0, '1970-01-01 00:00:00', 'MY9KBCIYarE34qGwM32S5cpGLZCxWoES', 1, 0);
INSERT INTO `adusers` VALUES (639, 'mimosa', '79d1113d623f165d5ea50e3850ab0b2a', NULL, '2013-10-10 17:56:53', 0, '1970-01-01 00:00:00', '49yY1kUd3oB0zU2aSjqpzoLDrItXrl9t', 1, 0);
INSERT INTO `adusers` VALUES (640, 'phannhu', '92899600ab44139655e47b1be7f3adf4', NULL, '2013-10-10 18:39:06', 0, '1970-01-01 00:00:00', 'tRiNMSn2JwYw7L85xYVPZ1nSRRGM17bE', 1, 0);
INSERT INTO `adusers` VALUES (641, 'phongnguyenpian', '0997a70ea2f3ad93ff096c0919f02721', NULL, '2013-10-10 18:48:16', 0, '1970-01-01 00:00:00', '9eeuZ7NdWwR8sM0RpJEisWbfXsgVSaj', 1, 0);
INSERT INTO `adusers` VALUES (642, 'bousiuhot', '23ebbce739999a0c61150cc418fb603c', NULL, '2013-10-10 19:07:32', 0, '1970-01-01 00:00:00', 'Ucww6CCtphfvLSgENe6CTGf843rWatwR', 1, 0);
INSERT INTO `adusers` VALUES (643, 'hienesp', '67f28ccd924101a11f2f450262cfdd04', NULL, '2013-10-10 21:09:01', 0, '1970-01-01 00:00:00', 'opN7LbjUd2XNgjYs1zoGvtgUS3nBQwA', 1, 0);
INSERT INTO `adusers` VALUES (644, 'hien123', '124bd1296bec0d9d93c7b52a71ad8d5b', NULL, '2013-10-10 21:22:34', 0, '1970-01-01 00:00:00', 'Nnh6xoHb0E6X3EkELhzq3OekR6Ul75Tm', 1, 0);
INSERT INTO `adusers` VALUES (645, 'Long Giang', '28b9fd3b7c981383cdb8997a0ad29045', NULL, '2013-10-11 08:04:19', 0, '1970-01-01 00:00:00', 'ir5bUQ87j3idBhfBzUpDviwaiR16xmAh', 1, 0);
INSERT INTO `adusers` VALUES (646, 'rangnv', '5c4c10706b939ea47799f6880b46d2ce', NULL, '2013-10-11 08:16:49', 0, '1970-01-01 00:00:00', 'UURb9xMzoymGh4J7omcr4zFepoKw8muE', 1, 0);
INSERT INTO `adusers` VALUES (647, 'sonphamvan64', 'e237d6ca42fe4e1504eedf886328e699', NULL, '2013-10-11 09:28:23', 0, '1970-01-01 00:00:00', 'IICdGdjqyf25L9qwffT7ISX8DsWRIgcg', 1, 0);
INSERT INTO `adusers` VALUES (648, 'dmlexl', '4297f44b13955235245b2497399d7a93', NULL, '2013-10-11 10:10:36', 0, '1970-01-01 00:00:00', 'WLcsHWtTWEVakYa3Yz0LvySRYUosxQBy', 1, 0);
INSERT INTO `adusers` VALUES (649, 'YenMinh', '691640deda151001db06f041c46e6120', NULL, '2013-10-11 10:28:22', 0, '1970-01-01 00:00:00', 'Iuvqfq24PYcVjl8covoE49SWjER8LosW', 1, 0);
INSERT INTO `adusers` VALUES (650, 'lepham299', 'dad17817cb7f0d4655bbe4460538f1ab', NULL, '2013-10-11 10:55:24', 0, '1970-01-01 00:00:00', '5O4dmtgve94XL7YsDmwD0pA4ujnFyOC', 1, 0);
INSERT INTO `adusers` VALUES (651, 'phaiyostyle', '82dee274f1b2097662bf0eeb16b260b8', NULL, '2013-10-11 13:31:32', 0, '1970-01-01 00:00:00', '5mvwZDGzedhyBtli1UcpJ3hj8DB0l7zX', 1, 0);
INSERT INTO `adusers` VALUES (652, 'dungthoi123', 'f8fb368b2f22867cbad6a85f15f190e5', NULL, '2013-10-11 15:21:51', 0, '1970-01-01 00:00:00', 'GB4lz03hUxVvaC3a2Cwo2NLKwAyjfQMI', 1, 0);
INSERT INTO `adusers` VALUES (653, 'dungnguyen', '5eaa8a35ef60f9c9107461b9d318ce4f', NULL, '2013-10-11 17:03:09', 0, '1970-01-01 00:00:00', '7KRCMmtnIEQTLDpU4vJPTBp0S0vbgtO9', 1, 0);
INSERT INTO `adusers` VALUES (654, 'votinhkaka', 'e480a67efe8480f42143c5b4d8042b38', NULL, '2013-10-11 18:18:20', 0, '1970-01-01 00:00:00', 'tWd45x84Ujsw3lawahdeuH6mWWKNfnnV', 1, 0);
INSERT INTO `adusers` VALUES (655, 'leolonghuynh', '1c6806d8255ce845dd6617185293cbc9', NULL, '2013-10-11 21:18:22', 0, '1970-01-01 00:00:00', 'PbLiAwt31rEfNWwYWDM25JSF5D0G4g6u', 1, 0);
INSERT INTO `adusers` VALUES (656, 'Chestnut9x', '15eccbd5ea5542157a25c9d39aaf6166', NULL, '2013-10-11 23:16:24', 0, '1970-01-01 00:00:00', '4AhcW0a1MtshkEj25bqvBJjBjaEkCEU', 1, 0);
INSERT INTO `adusers` VALUES (657, 'misamin', 'a1f4f3787fca28dfd9eddb37c2978306', NULL, '2013-10-12 00:31:22', 0, '1970-01-01 00:00:00', 'AXRPwSSRxTEzdMJz35LOBzETALXLgAwh', 1, 0);
INSERT INTO `adusers` VALUES (658, 'huyvantien00', '21628002f69be3919081de9f5906fe3c', NULL, '2013-10-12 13:31:27', 0, '1970-01-01 00:00:00', 'kqTxPSHLaGfBwCLPh9zgqndjEEgfcTm', 1, 0);
INSERT INTO `adusers` VALUES (659, 'strommate', 'e10adc3949ba59abbe56e057f20f883e', NULL, '2013-10-12 13:38:11', 0, '1970-01-01 00:00:00', '7Dw8m2KarKUfAIngf0gNv6CrVIcV4gnd', 1, 0);
INSERT INTO `adusers` VALUES (660, 'Hacker_no1', 'cb6a0e50cef7647bf95e5f191e7d583a', NULL, '2013-10-12 22:31:14', 0, '1970-01-01 00:00:00', 'x2VQnwyOYnFjCP8dHqWtap3K2oyeBhx', 1, 0);
INSERT INTO `adusers` VALUES (661, 'huongxuan1221', 'c42851843fde453d0fe173e61114b3c2', NULL, '2013-10-12 23:35:40', 0, '1970-01-01 00:00:00', 'HhbGtNPsnycLep2pflxO5fgWORBWKge', 1, 0);
INSERT INTO `adusers` VALUES (662, 'congtin1412', 'cfb1ae7a37e132f62b54de7ed73a4792', NULL, '2013-10-13 17:19:04', 0, '1970-01-01 00:00:00', 'XrFT1uIjtQGX4ROI5n4DR5uj3xsj4', 1, 0);
INSERT INTO `adusers` VALUES (663, 'hellangel1993', 'dd3877b7477e3701e4716e740c8865a2', NULL, '2013-10-13 17:27:15', 0, '1970-01-01 00:00:00', 'OtG2tKvF4aOfAoGQfwbAyVVELXGZSlv', 1, 0);
INSERT INTO `adusers` VALUES (664, 'fuanxi', '1e682cd763b0dbac612202332309ac53', NULL, '2013-10-14 04:47:26', 0, '1970-01-01 00:00:00', '4L5CMxZ1lI3zbrmWJRFAgnnAJ6Z2VHo', 1, 0);
INSERT INTO `adusers` VALUES (665, 'necaxa', 'e10adc3949ba59abbe56e057f20f883e', NULL, '2013-10-14 07:35:03', 0, '1970-01-01 00:00:00', 'sX3PuHcOq80nBNQTVRs2z5SJwHqjKcw7', 1, 0);
INSERT INTO `adusers` VALUES (666, 'hoangtuhoahongd', '2539a9501603b54273e320e304eae283', NULL, '2013-10-14 11:16:15', 0, '1970-01-01 00:00:00', 'uFlXqcVwFVkAzv2FxEKoh9FiezTxxRw', 1, 0);
INSERT INTO `adusers` VALUES (667, 'giangkiht', '1e260de23262b4142796914a4879d5e4', NULL, '2013-10-14 11:17:07', 0, '1970-01-01 00:00:00', 'ZLFT9XWFZUIyt1YlvMZsJcrgCXQLzHr4', 1, 0);
INSERT INTO `adusers` VALUES (668, 'HaVanMinh', '80f729d5f0699dd167e401b4808d8d84', NULL, '2013-10-14 11:32:12', 0, '1970-01-01 00:00:00', 'UR6ysAEVQQEVHpKhfRwA8CF3JFMrfKd', 1, 0);
INSERT INTO `adusers` VALUES (669, 'thuyan1207', '5ba3ad4a9141301ab3b27e147dd4bdb6', NULL, '2013-10-14 11:44:26', 0, '1970-01-01 00:00:00', 'qoUjyAX3JRrLcWpEOHhKKnwoU009OF7', 1, 0);
INSERT INTO `adusers` VALUES (670, 'minhquan2323', 'dcea99920ce1a0d4fafa8975085845dc', NULL, '2013-10-14 18:02:05', 0, '1970-01-01 00:00:00', 'ebgH662vasyvsFWqYw3zgbejQ7XEq0rk', 1, 0);
INSERT INTO `adusers` VALUES (671, 'thi my huong', 'fd41ae35e4465fd0f8d6b0b6e8d7883a', NULL, '2013-10-15 00:50:13', 0, '1970-01-01 00:00:00', 'G3OXlOBJ5547IHNSXBsqMiBPweBV9stW', 1, 0);
INSERT INTO `adusers` VALUES (672, 'flyn', 'e10adc3949ba59abbe56e057f20f883e', NULL, '2013-10-15 10:37:46', 0, '1970-01-01 00:00:00', 'vlvRgWblSMvJwiMf5YfvrFtPNIlOcJZ', 1, 0);
INSERT INTO `adusers` VALUES (673, 'myphuong1988', '8c4abf332359c9b63648eb2f490051fe', NULL, '2013-10-15 11:10:18', 0, '1970-01-01 00:00:00', 't3i6r4WI8XHNLntJ68XaXGSe4sS0V21m', 1, 0);
INSERT INTO `adusers` VALUES (674, 'linh1993', '802c8a371208298ec28df444b9c122f3', NULL, '2013-10-15 11:57:02', 0, '1970-01-01 00:00:00', '2NjsdlkArYjCt5tggiUTwLFyFD4l0L', 1, 0);
INSERT INTO `adusers` VALUES (675, 'nguyentrancoop', '988e17d49d13e0d5d6675794bb118065', NULL, '2013-10-15 15:10:02', 0, '1970-01-01 00:00:00', 'r5wxIEb88b7K0xqpsbNkHca7cwulpujN', 1, 0);
INSERT INTO `adusers` VALUES (676, 'thebest', 'eb1be746cff49258106e95b59da6a377', NULL, '2013-10-15 15:31:05', 0, '1970-01-01 00:00:00', 'SuL6oXiET8wrp01wHXjiuaDHMvAXHK2', 1, 0);
INSERT INTO `adusers` VALUES (677, 'vyvy', 'a81f44147a1639de2b06b727d6dac2dc', NULL, '2013-10-15 21:20:35', 0, '1970-01-01 00:00:00', 'rz8Tc15nqmTk5ma1w85AHQEISKojrBg1', 1, 0);
INSERT INTO `adusers` VALUES (678, 'nguyenkien1412', 'c1730474534ba20506e349d5c2ea8da0', NULL, '2013-10-16 08:37:49', 0, '1970-01-01 00:00:00', '0tfWo9udRcnXjWYVWqARwty6WfKkJ1In', 1, 0);
INSERT INTO `adusers` VALUES (679, 'tuanthuyhang', '49f25184adf84af95abf64e7179490f5', NULL, '2013-10-16 10:22:40', 0, '1970-01-01 00:00:00', 'orJtJXCzZy3wvcQWypzCutpR3N3eXUWg', 1, 0);
INSERT INTO `adusers` VALUES (680, 'cuongvanle', '7eae565e82492e23eade76be7b7a537d', NULL, '2013-10-16 11:43:05', 0, '1970-01-01 00:00:00', '2yICWLoZ6aIVKyPNlBzp098glVpj20Ky', 1, 0);
INSERT INTO `adusers` VALUES (681, 'namjoonpy91', 'e10adc3949ba59abbe56e057f20f883e', NULL, '2013-10-16 13:22:23', 0, '1970-01-01 00:00:00', 'FD0iWjF7ItZhFjX10qD7ryMo9EKa2z6t', 1, 0);
INSERT INTO `adusers` VALUES (682, 'tranthinh91', 'e7f444824272cad7f8aa69571697d6f2', NULL, '2013-10-16 15:23:50', 0, '1970-01-01 00:00:00', 'YQ8OGSgKJ1i4FPCBb5nIpGZqEjzMQjql', 1, 0);
INSERT INTO `adusers` VALUES (683, 'bui hien', 'bfc38ef2d56fb2a8c28aeb0a5c7e5fd8', NULL, '2013-10-16 15:36:39', 0, '1970-01-01 00:00:00', 'kl8iWyGvhdGor6Kvdjvu6eHvIpwQB9on', 1, 0);
INSERT INTO `adusers` VALUES (684, 'thuyhang2906', '04105fbda1b3eb1528551509a7c4f01e', NULL, '2013-10-16 16:07:06', 0, '1970-01-01 00:00:00', 'kxMxuD9Plr7FOiEtWVa0sQACRxuvTzP', 1, 0);
INSERT INTO `adusers` VALUES (685, 'clownorking', '12e7cc42f612e350bff3b30538ffca38', NULL, '2013-10-16 17:12:35', 0, '1970-01-01 00:00:00', '4m087LwvFAdqDg540Dj3k99CVKIfQQb2', 1, 0);
INSERT INTO `adusers` VALUES (686, 'pekhongyeu', 'f8ab8faa5d30a152b35d17c16ecf7062', NULL, '2013-10-16 19:15:37', 0, '1970-01-01 00:00:00', 'JNPU9wMEnoAbsuRIAeLfHFhpTXwi5t8', 1, 0);
INSERT INTO `adusers` VALUES (687, 'LYSM141325', 'c38bf5e6c030c28a38e700a3048ad16b', NULL, '2013-10-16 20:19:36', 0, '1970-01-01 00:00:00', 'ybrZFb0I0gk7m9wN3WzGeVTyxHZuL7g', 1, 0);
INSERT INTO `adusers` VALUES (688, 'chamhet', '25d55ad283aa400af464c76d713c07ad', NULL, '2013-10-16 20:52:13', 0, '1970-01-01 00:00:00', 'pCmmvstxTWbRwSf9ImrEmJzGDCio5nw', 1, 0);
INSERT INTO `adusers` VALUES (689, 'Nguyentrungrom', 'e33ba9788ad6ced35baf92eb40693c33', NULL, '2013-10-16 21:04:54', 0, '1970-01-01 00:00:00', 'cmVhR7vJBrSV43O0SpfrHqPBYurdRvy', 1, 0);
INSERT INTO `adusers` VALUES (690, 'vampire_kute', 'e10adc3949ba59abbe56e057f20f883e', NULL, '2013-10-17 08:56:05', 0, '1970-01-01 00:00:00', 'mzymYdwfevGNuSexUEaRDc1eWvCqAXr', 1, 0);
INSERT INTO `adusers` VALUES (691, 'hoangngocduy', '2ec664e2dfcfc3fe62c51e01420c075c', NULL, '2013-10-17 08:59:21', 0, '1970-01-01 00:00:00', 'eayuzj4E4b3DcjRbB480w48vW2SCflj', 1, 0);
INSERT INTO `adusers` VALUES (692, 'vo tran thai', 'adc975ef325215b8c87234d7d790c86e', NULL, '2013-10-17 09:33:35', 0, '1970-01-01 00:00:00', 'xzGfpqVqCGB70nKUW7SKH0MCEVbWuSmV', 1, 0);
INSERT INTO `adusers` VALUES (693, 'lucvantien', 'e134f97c490ca512c3fb41037679a7eb', NULL, '2013-10-17 09:50:56', 0, '1970-01-01 00:00:00', '84lb1AM74h1hTqvsUfQJkrP1lQdS39J6', 1, 0);
INSERT INTO `adusers` VALUES (694, 'kadu', 'd16103ea4febc4854e8c14452fac8bd6', NULL, '2013-10-17 10:59:35', 0, '1970-01-01 00:00:00', 'lTRipkvnw3NEab1w4efEkd1DONxOjufQ', 1, 0);
INSERT INTO `adusers` VALUES (695, 'taynguyen89', 'a30ba18dad139801cfc8ea80e6d70231', NULL, '2013-10-17 11:13:25', 0, '1970-01-01 00:00:00', 'fdOFASMfUAkyCePfMgwwI4w0JPvnnWwW', 1, 0);
INSERT INTO `adusers` VALUES (696, 'tj3utusjtjnh1', '4af9675535aaf7e350e8a8d6d4af2299', NULL, '2013-10-17 13:28:48', 0, '1970-01-01 00:00:00', 'qmFiungU6VVTEE0VpOSI3wQz7U5ieog0', 1, 0);
INSERT INTO `adusers` VALUES (697, 'vieclam24h', 'ea55b9d47bb325524bb2dce598f3ac34', NULL, '2013-10-17 15:51:58', 0, '1970-01-01 00:00:00', 'PGcFEjNKpBF9xLVp9ZBJMrEW1QDSjM4h', 1, 0);
INSERT INTO `adusers` VALUES (698, 'nguyenngoctai', 'd330c1bae6a3a220bb9393f00661b75d', NULL, '2013-10-17 16:21:47', 0, '1970-01-01 00:00:00', 'FVQb6juijlKpFmFkfcgzW1QrljxJixu', 1, 0);
INSERT INTO `adusers` VALUES (699, 'hoalantim', 'ddc63ad3e8470251e64432b6ce9b81c3', NULL, '2013-10-17 16:30:16', 0, '1970-01-01 00:00:00', 'DUOUgwP7W3sbPyRZocWV9S6jLe4qsWo0', 1, 0);
INSERT INTO `adusers` VALUES (700, 'Windrainduong', '698f8be5bcc13a5e4673e9c2ed637a46', NULL, '2013-10-17 19:57:24', 0, '1970-01-01 00:00:00', '1whoEzeia71u4yxoAcmlNWK35mq8Ec1', 1, 0);
INSERT INTO `adusers` VALUES (701, 'thanh0804', '8287842d10e4f0c07fb17ece386a9191', NULL, '2013-10-18 08:17:33', 0, '1970-01-01 00:00:00', 'TfMFkuY8GIjjTnAOfYrk6WN36ANLgwcI', 1, 0);
INSERT INTO `adusers` VALUES (702, 'kid_mushroom', '4546ac40271e5948eaa9b6949f784511', NULL, '2013-10-18 08:56:44', 0, '1970-01-01 00:00:00', 'TwuyrJl7hI0veEIWC5c6xiUN32Qa7bYe', 1, 0);
INSERT INTO `adusers` VALUES (703, 'leocay113tt', '6d8315bcd8622a69e199eabf142d359d', NULL, '2013-10-18 10:40:43', 0, '1970-01-01 00:00:00', 'FyAiXGNP0OLWe1URquaXDwbtDuQ7FjWk', 1, 0);
INSERT INTO `adusers` VALUES (704, 'giaquyen.hn', '7e021ba85cff1f9048a7b52448e2b698', NULL, '2013-10-18 11:14:33', 0, '1970-01-01 00:00:00', 'WwA7OmWck0ZHq2npJGScMHBd4l7XXmYC', 1, 0);
INSERT INTO `adusers` VALUES (705, 'Nguyễn Tiến Vũ', '8b607994e91305ce735881f6c6335f3c', NULL, '2013-10-18 13:28:41', 0, '1970-01-01 00:00:00', 'G9jdqIOA9x4TMXJVOitxO2xoAvNsXAiG', 1, 0);
INSERT INTO `adusers` VALUES (706, 'thang5790', 'fd5392d1c0d91a5422c0b3488c2dfb69', NULL, '2013-10-19 14:06:47', 0, '1970-01-01 00:00:00', 'l9XFFHfnI7Cvy8O7zz1fguOgGYeheEl', 1, 0);
INSERT INTO `adusers` VALUES (707, 'titigerbond', '6a009c46959442123d82db1c212cc42c', NULL, '2013-10-19 16:20:24', 0, '1970-01-01 00:00:00', 'xbioUQAFNgH1WbOAK87StifwAwpITM', 1, 0);
INSERT INTO `adusers` VALUES (708, 'thaotrang', '414e6b1c73d557aa1e80358869622142', NULL, '2013-10-19 17:15:14', 0, '1970-01-01 00:00:00', 'ixjSbFAdDDgt200abFjYOZun6fPQ2cnI', 1, 0);
INSERT INTO `adusers` VALUES (709, 'bpnhu18', '1853d516f5049e686f02432b3f177249', NULL, '2013-10-19 18:26:32', 0, '1970-01-01 00:00:00', 'bASJcP16eujIZH20FK5QRSJZWhNJknj', 1, 0);
INSERT INTO `adusers` VALUES (710, 'lucthanhquang', 'e7c3e1741e815d76027c47c1a3c0fdda', NULL, '2013-10-19 20:01:31', 0, '1970-01-01 00:00:00', 'nGXXb5qlPZlB8YpglWr3EtqKZCVQe9E4', 1, 0);
INSERT INTO `adusers` VALUES (711, 'maxbudyrank', '98eb7e5d280b123603b1d7c207a188f3', NULL, '2013-10-20 01:04:38', 0, '1970-01-01 00:00:00', 'nl9xA5N9Abkx0mRo5KIpiYCtLv7nBd', 1, 0);
INSERT INTO `adusers` VALUES (712, 'khacecs1989', '684f4c6ce17def914116597d3ec5d12d', NULL, '2013-10-20 15:03:59', 2, '1970-01-01 00:00:00', '0vlNj8UPGI5phvgfcWYIZOnWqzL8u3Jl', 1, 0);
INSERT INTO `adusers` VALUES (713, 'haoquang_71089', '00be6cfa1d427e09c40d13d555b7c21d', NULL, '2013-10-20 15:09:18', 2, '1970-01-01 00:00:00', 'S9iP3adDULsmignG9zMDJq7dReT59xun', 1, 0);
INSERT INTO `adusers` VALUES (714, 'NHATNGUYEN_89', '3ada65cc36618166a022b1c42b72e944', NULL, '2013-10-20 22:12:15', 0, '1970-01-01 00:00:00', 'lGf3eerTWT54OA5x1Hu9cr8CXSLrlEOF', 1, 0);
INSERT INTO `adusers` VALUES (715, 'phuoctho', '5ed0acae6a437b20dd554fa09816a7ab', NULL, '2013-10-21 12:01:36', 0, '1970-01-01 00:00:00', 'MYKo6lZVkfFDuaUkyeVnfyM7LlnW2mlX', 1, 0);
INSERT INTO `adusers` VALUES (716, 'meoden', '43387fbf535bc23011ec4b2a9877cc7b', NULL, '2013-10-21 12:52:46', 0, '1970-01-01 00:00:00', 'TO7AsYlwrCOwEH7FPrPK3E4mEVAryM', 1, 0);
INSERT INTO `adusers` VALUES (717, 'phucthinhfood', '63fb4b09bf454e6c8445bf9b95931494', NULL, '2013-10-21 15:35:31', 0, '1970-01-01 00:00:00', 'KBtCo3v5Gwqo5RkTq8CsI5dS2iZyWbtA', 1, 0);
INSERT INTO `adusers` VALUES (718, 'minhthao', 'f9c6601b2de387055f7b86cb0dae093f', NULL, '2013-10-21 16:25:40', 0, '1970-01-01 00:00:00', 'lJwvR7bswb1np2meaPqmT2gKhUcwl0Gz', 1, 0);
INSERT INTO `adusers` VALUES (719, 'thuthao', '8e3d6f2b90545c900db6314d82144d28', NULL, '2013-10-21 17:05:39', 0, '1970-01-01 00:00:00', 'pd5Dqt4zn8jHCM2EPcZE4slPnwa9WBa', 1, 0);
INSERT INTO `adusers` VALUES (720, 'badboy1512', 'e8c90e09b182017552df5770e85dfe98', NULL, '2013-10-21 19:00:26', 0, '1970-01-01 00:00:00', 'PByQjFZExNwKAQaPFVTaw12fEs66wyU', 1, 0);
INSERT INTO `adusers` VALUES (721, 'haukute', '88680c1eac456444e9d5e93cbcbc4590', NULL, '2013-10-21 19:13:50', 0, '1970-01-01 00:00:00', '4LjEwXEijWijvAKH2oxwVzwGUa3hZyly', 1, 0);
INSERT INTO `adusers` VALUES (722, 'nh0xr00m19', '97278c7b3f15b9719f35c089bea8059e', NULL, '2013-10-21 19:22:33', 0, '1970-01-01 00:00:00', 'Y1M2otzWgbcWKx1t2rwFEtzc6mZJhXxx', 1, 0);
INSERT INTO `adusers` VALUES (723, 'phihangthoa1990', '75e53faecd6d1235a62c5bfa99c9a95f', NULL, '2013-10-21 23:14:39', 0, '1970-01-01 00:00:00', 'BWptxztlmAqSzgpwWgNOHa7aivWylbn', 1, 0);
INSERT INTO `adusers` VALUES (724, 'tuyenfenspkt', '88273109ceb5a1e2d3e351cdee7bc367', NULL, '2013-10-22 17:50:45', 0, '1970-01-01 00:00:00', 'c96V1xB6CeA6tUhiQBS4UjZmHtoxUpl', 1, 0);
INSERT INTO `adusers` VALUES (725, 'xehoi49g', 'd78d517479004db9f09939af58e3fddc', NULL, '2013-10-22 20:32:31', 0, '1970-01-01 00:00:00', 'zrXn6uvjPV3Sb7fQuolwZLj8l8UWwY', 1, 0);
INSERT INTO `adusers` VALUES (726, 'Lê Vân Anh', '3e3f3ebc39505296a9a2cc23c04899ed', NULL, '2013-10-22 22:43:10', 0, '1970-01-01 00:00:00', 'KSUN94eXYJkiNTQn6xfPpnsGMPCxre', 1, 0);
INSERT INTO `adusers` VALUES (727, 'ping', '2cb02b03f7a48fb7262c9580b32773d4', NULL, '2013-10-22 23:08:26', 0, '1970-01-01 00:00:00', 'Ll7CsKFwnBxKk4fwitNtTFCUKkbnfSY2', 1, 0);
INSERT INTO `adusers` VALUES (728, 'drtoan198', 'b9169d445791c46e8fa7f829bacc83e5', NULL, '2013-10-23 10:09:05', 0, '1970-01-01 00:00:00', 'x2u6SR5ZpOCpms1fApAZ8F5kTSueNU', 1, 0);
INSERT INTO `adusers` VALUES (729, 'songquan72', '2bf98a4b0da6dc9250a32996357667f1', NULL, '2013-10-23 11:06:47', 0, '1970-01-01 00:00:00', '3MGWkjATAyKMV4rFfyjo3Jg0PuWmrpAN', 1, 0);
INSERT INTO `adusers` VALUES (730, 'Trần Thị Liễu', '2e6193fe693cd6ce028086712eb35c18', NULL, '2013-10-23 13:11:05', 0, '1970-01-01 00:00:00', '3loJ9eUIGx4lBX9fAxO8q8rJDf5LKZgr', 1, 0);
INSERT INTO `adusers` VALUES (731, 'baluutp90', '625b3bb1c749ccfe8901125402aa464d', NULL, '2013-10-23 21:10:18', 0, '1970-01-01 00:00:00', 'YAwcrs8sklh6CuBFeBPr7Avtbrwn9Byg', 1, 0);
INSERT INTO `adusers` VALUES (732, 'drlong', '0f3a5a458573350c80f50ae50f4cd6af', NULL, '2013-10-23 21:17:32', 0, '1970-01-01 00:00:00', 'sOWn01h1WkY7IZiwqCoq5002YA7Cus5K', 1, 0);
INSERT INTO `adusers` VALUES (733, 'giapham', '544cfd9def3a8daaeb995af482ff2b27', NULL, '2013-10-24 13:58:22', 0, '1970-01-01 00:00:00', 'y8Ro1vPXfMuETJTqFr1lqTMa5DT6jum', 1, 0);
INSERT INTO `adusers` VALUES (734, 'nhdzkent11', '92837fde38135e0184376748a8f22ab1', NULL, '2013-10-24 15:39:10', 0, '1970-01-01 00:00:00', 'G6JWEFmE9OsNxT6I63rAQgIeWWdMtlr7', 1, 0);
INSERT INTO `adusers` VALUES (735, 'ivanvu1211', '6532e8de67e5bcf25a23f073288ff10b', NULL, '2013-10-24 18:46:05', 0, '1970-01-01 00:00:00', 'xW9Cgom5A5abb6twfTcpU2BS0xnwWGT', 1, 0);
INSERT INTO `adusers` VALUES (736, 'truyenthong', '388e70fc3f32224f253a650fb9030088', NULL, '2013-10-25 08:22:07', 0, '1970-01-01 00:00:00', 'DzP7a8M9ueEwgHCcObA1o7p1Cj3DSMu', 1, 0);
INSERT INTO `adusers` VALUES (737, 'pham thanh dung', '8b112ecb97ab15c2e698a74dc95a46d0', NULL, '2013-10-25 15:49:08', 0, '1970-01-01 00:00:00', 'BToxBi5iTV1QKzx8AZKvsxRZAZPXQni', 1, 0);
INSERT INTO `adusers` VALUES (738, 'phongpost', '71c65a6844a597984b1b739e56a3a0da', NULL, '2013-10-25 22:10:39', 0, '1970-01-01 00:00:00', 'XlFLVeOJV2z5c5n9u1TcwiEZQFAyhp', 1, 0);
INSERT INTO `adusers` VALUES (739, 'congcover', '9e45f4bf5b9c9bded77e64170050d339', NULL, '2013-10-26 20:52:23', 0, '1970-01-01 00:00:00', 'jCcdHUpF6D3dtbQ8ISXyXBkID8mrAx', 1, 0);
INSERT INTO `adusers` VALUES (740, 'gund12', '1cec7e7cd1c8ea4808ba242a21c9f185', NULL, '2013-10-26 21:07:26', 0, '1970-01-01 00:00:00', 'dPX7FmJSvqnWcEMgCFHfMyU5w7dvSh9o', 1, 0);
INSERT INTO `adusers` VALUES (741, 'dautaydautay', '95fdd6d528571613967851fb051f5cbc', NULL, '2013-10-27 21:49:55', 0, '1970-01-01 00:00:00', 'zVIsW9OET8Z5afHOUMuR6kjTjYvYLzD', 1, 0);
INSERT INTO `adusers` VALUES (742, 'kimhoant70', '2ca266d6da14719f5c539ef3d5635246', NULL, '2013-10-28 08:45:10', 0, '1970-01-01 00:00:00', 'nxuzfLI80lTJwxnQchyteWCNwjAFlvbx', 1, 0);
INSERT INTO `adusers` VALUES (743, 'vvtdt', '7e154ea2ae7f45cf28c00992294f8d2f', NULL, '2013-10-28 10:10:55', 0, '1970-01-01 00:00:00', 'iXVFW7jDu68XI7VwzRW9jmWoXeogScue', 1, 0);
INSERT INTO `adusers` VALUES (744, 'vuhung', 'd8ed9bda0520916ef16596ff39c99f86', NULL, '2013-10-28 10:19:55', 0, '1970-01-01 00:00:00', '2zUqCVzXWfWf56OWvbfzbXjeGUphDLF', 1, 0);
INSERT INTO `adusers` VALUES (745, 'truongtinh', 'b607bb7e24353e3be9b279d09d53fd16', NULL, '2013-10-30 12:52:43', 0, '1970-01-01 00:00:00', 'lHtdXMGwjmFjWgUBQJk6RdsCLRWRgIW', 1, 0);
INSERT INTO `adusers` VALUES (746, 'nguyenvanvux', 'ab477bf1231ff851e219dd6e6f630d47', NULL, '2013-10-30 16:38:03', 0, '1970-01-01 00:00:00', 'hUDdXVUxWprhsv4uGwEdlqwt0iow16yJ', 1, 0);
INSERT INTO `adusers` VALUES (747, 'thanh dung', '745861482cac8a044cf2fb07cdc31bf5', NULL, '2013-10-31 02:32:57', 0, '1970-01-01 00:00:00', '0UvKMveIZ9rPP5xcoJB7dBNOzO6z', 1, 0);
INSERT INTO `adusers` VALUES (748, 'fantasy_love', 'e10adc3949ba59abbe56e057f20f883e', NULL, '2013-10-31 23:28:01', 0, '1970-01-01 00:00:00', 'uVKzQanukdIPphRWswWZsgHHhGuwpuh', 1, 0);
INSERT INTO `adusers` VALUES (749, 'duycopier', '4556052c414f0960e054a604f33f1024', NULL, '2014-02-10 19:57:36', 0, '1970-01-01 00:00:00', 'y3E4yIiejTtEp5yauFWzWvdxrpDF1Mi', 1, 0);
INSERT INTO `adusers` VALUES (750, 'vuvuong2606', '42531b3b878800a05d26eaa1868b634c', NULL, '2013-11-01 16:50:38', 0, '1970-01-01 00:00:00', 'fIBoHF2H6cpIRHxHeqnOiBEPhJRf1mXw', 1, 0);
INSERT INTO `adusers` VALUES (751, 'hoangngocyu', '87a606f7ec2362be41ae5687d9882550', NULL, '2013-11-02 17:58:38', 0, '1970-01-01 00:00:00', 'SJ22HOSdkq79ww2V9qI1NhWOgr9DPl', 1, 0);
INSERT INTO `adusers` VALUES (752, 'JVPhuoc', '7a485e23df7d3b581062a54ae486817c', NULL, '2013-11-03 10:29:46', 0, '1970-01-01 00:00:00', 'WDKYFW9TKIYFQ1iM7Z0AsPC0di3C9ZF0', 1, 0);
INSERT INTO `adusers` VALUES (753, 'huuanhht', '2a9e2c46e1c779e312eb4d12023ed687', NULL, '2013-11-03 20:08:05', 0, '1970-01-01 00:00:00', 'odNGgpEczYBC9IwnOjptlb0kUnY49TL', 1, 0);
INSERT INTO `adusers` VALUES (754, 'kunzubi', 'b9e5d22c12f77199ed3cd9dcf21ceb45', NULL, '2013-11-03 21:16:34', 0, '1970-01-01 00:00:00', 'Rp0CoD6dPF6OqqwiRbBsBIoi6OBxZVoL', 1, 0);
INSERT INTO `adusers` VALUES (755, 'ngonlua123', '3fc80c4af9179a736d780234526999bc', NULL, '2013-11-03 22:03:10', 0, '1970-01-01 00:00:00', 'ORvJ4hQzIOxMWXtyddJlw4sOL9KC3wti', 1, 0);
INSERT INTO `adusers` VALUES (756, 'numberonce', '3dd7da1945137f4c231c9df2fa961a90', NULL, '2013-06-20 00:00:00', 0, '2013-11-01 00:00:00', '', 1, 0);
INSERT INTO `adusers` VALUES (757, 'hungnq', 'f25a4a69b04aff15e41036c26b7ff708', NULL, '2013-11-04 12:28:46', 0, '1970-01-01 00:00:00', 'i6rrT29CZUzxUjvaWUcxijsAj3oMEERD', 1, 0);
INSERT INTO `adusers` VALUES (758, 'tuyet phuong', '8f284099bbb4d866ee3d1df9b8473b4a', NULL, '2013-11-04 13:28:17', 0, '1970-01-01 00:00:00', 's4xcNYMyHvXLOcKiVsWx3M3bFTL1WqGG', 1, 0);
INSERT INTO `adusers` VALUES (759, 'myhanhqt1983', 'c0311998a2ee4fa4c935ff8e70028d42', NULL, '2013-11-04 15:26:43', 0, '1970-01-01 00:00:00', 'NNEArcZ2hDs1p4CVCo56WX5zqKmaAi8k', 1, 0);
INSERT INTO `adusers` VALUES (760, 'thuynguyen', '2dc6a50bc1968437d4772fed9efa6fd1', NULL, '2013-11-04 19:17:46', 0, '1970-01-01 00:00:00', 'W3LqZbEiE6vjXaf5PwdgQyICRP0oulw', 1, 0);
INSERT INTO `adusers` VALUES (761, 'ngocphuong2014', 'cc51f3a059023f0961d2729c8befe149', NULL, '2013-11-05 02:08:48', 0, '1970-01-01 00:00:00', 's0ZW7wikCFBxL5cbsmM60LE7oRtx7wIC', 1, 0);
INSERT INTO `adusers` VALUES (762, 'pvk007hd', 'a7ef4f62a493ddc70b7810ccc4eec5e8', NULL, '2013-11-05 08:53:37', 0, '1970-01-01 00:00:00', 'kWyuTMTGmRogQwJgWBWCmWWm5eeMDITw', 1, 0);
INSERT INTO `adusers` VALUES (763, 'dinhthienduong', 'e54e0485d7b6e2f4084fba82fee6e520', NULL, '2013-11-05 09:43:42', 0, '1970-01-01 00:00:00', 'WWX8P3Byv5QCF0A7QY1jm5XFIRyIzwgQ', 1, 0);
INSERT INTO `adusers` VALUES (764, 'tronghieu512', '5bbd9309a81809aab0298d3c105d8fce', NULL, '2013-11-06 01:57:25', 0, '1970-01-01 00:00:00', 'rlfniu9R73wxLGFxW8LXmay5pApYGCkz', 1, 0);
INSERT INTO `adusers` VALUES (765, 'AriesEdj', '36772d167a193858f3f9f9f1950b7dbb', NULL, '2013-11-07 17:01:26', 0, '1970-01-01 00:00:00', 'D51Eq60IgwkdwVnXUT3eEBvgORIIJsW', 1, 0);
INSERT INTO `adusers` VALUES (766, 'tphcmtb', '4438fc033f8aef433f9db5348b70e8e5', NULL, '2013-11-07 19:22:48', 0, '1970-01-01 00:00:00', 'en1MrDi6F1Jp3NR2Dd30mtqYZcWSrGrx', 1, 0);
INSERT INTO `adusers` VALUES (767, 'kabinh', '587695f19e087ab76d64c2d2a1d749d3', NULL, '2013-11-07 21:15:32', 0, '1970-01-01 00:00:00', 'zCOeQRAghCwWKnUs6aDofkLlQjnhF', 1, 0);
INSERT INTO `adusers` VALUES (768, 'choxua', '9cd86bba7122511cf0b3427d9eff8b85', NULL, '2013-11-08 08:51:59', 0, '1970-01-01 00:00:00', 'wCJvbCv79F71G8ktL6kTxvcqJT3GvVfH', 1, 0);
INSERT INTO `adusers` VALUES (769, 'tuanvu', '8fbd7b89067a5d3329483830cca55bf9', NULL, '2013-11-08 09:11:50', 0, '1970-01-01 00:00:00', '4rwEXOtMptCNWHtGKkwZLEyx0SkHyY9z', 1, 0);
INSERT INTO `adusers` VALUES (770, 'ngochus', '9f88c22abf2fa857db29f9d04e85737e', NULL, '2013-11-08 10:09:22', 0, '1970-01-01 00:00:00', 'ARWatmhHLwxH6TH1EbskrqlLxsYLa8I', 1, 0);
INSERT INTO `adusers` VALUES (771, 'uyennguyen', '8063013b0792074dbd2d1db2f590307b', NULL, '2013-11-08 11:28:04', 0, '1970-01-01 00:00:00', 'Iud4JVgkyEbgzEB5IoayUS8A7wi6th7E', 1, 0);
INSERT INTO `adusers` VALUES (772, 'thephong', '4718e3611abe33e7e3ef1e3aa13bfc48', NULL, '2013-11-08 11:35:38', 0, '1970-01-01 00:00:00', 'RxGsTqNUYCgi0h0tCXo0XA952xwJt1', 1, 0);
INSERT INTO `adusers` VALUES (773, 'hongnguyen262', 'ee55b008c1707cbaabae1070078cbe6c', NULL, '2013-11-08 13:10:45', 0, '1970-01-01 00:00:00', '2Cfvpl1uwS9yjUf3uik4bnmpDSX39aCQ', 1, 0);
INSERT INTO `adusers` VALUES (774, 'congtacvien', '472f2da6017143f8ad821536a42efeed', NULL, '2013-11-08 16:45:28', 0, '1970-01-01 00:00:00', 'ZIHwMzySpXMFDdobt0oGMoM9PzKpcGJ3', 1, 0);
INSERT INTO `adusers` VALUES (775, 'kennasam', '0aa7da93b1469f1cc883d123e7885fa0', NULL, '2013-11-08 19:59:14', 0, '1970-01-01 00:00:00', 'oFwDc946bOtkU8Jp1FZayOwvcKj0xW7', 1, 0);
INSERT INTO `adusers` VALUES (776, 'giathieuhuy', '988f55d38f838c9b26abece55fca4ca9', NULL, '2013-11-09 08:32:34', 0, '1970-01-01 00:00:00', 'vpdthBiWFPsrkDO00gjxmw2hLe86cu1', 1, 0);
INSERT INTO `adusers` VALUES (777, 'khucphuongan', '2ca266d6da14719f5c539ef3d5635246', NULL, '2013-11-09 09:09:56', 0, '1970-01-01 00:00:00', 'BxFlX8ncCBUwZe1pcB7qsGbIvqaTHQ', 1, 0);
INSERT INTO `adusers` VALUES (778, 'yukitruong', 'a1fc137ad8cc2427c5d760debdb6cf87', NULL, '2013-11-09 20:22:35', 0, '1970-01-01 00:00:00', 'IcRSnmEVZHV7JmqhPpOiwpi8s2r88y7m', 1, 0);
INSERT INTO `adusers` VALUES (779, 'googlenex7', 'c073f43532d34c20adc16b42c8a1df26', NULL, '2013-11-09 21:49:26', 0, '1970-01-01 00:00:00', 'jIq2kTJYfnRtvKCwyRmJBq5tVqWB3trW', 1, 0);
INSERT INTO `adusers` VALUES (780, 'ruby_dat', 'b2782025b25c66bea3426babbdc75d07', NULL, '2013-11-09 21:58:02', 0, '1970-01-01 00:00:00', '3As68Elm9owT5LhzuEy2J5VFeudOG8', 1, 0);
INSERT INTO `adusers` VALUES (781, 'cungduoc', 'adbc91a43e988a3b5b745b8529a90b61', NULL, '2013-11-09 22:01:02', 0, '1970-01-01 00:00:00', 'zuA7t3jKQxruOTzRseWjXUaMk3pif3Fc', 1, 0);
INSERT INTO `adusers` VALUES (782, 'bichngoc', '57f85ff091b87a716d28004f073210c7', NULL, '2013-11-10 11:50:15', 0, '1970-01-01 00:00:00', 'uLSz9RZlUGSkmWOZNi6xtkBR1lbrE6xM', 1, 0);
INSERT INTO `adusers` VALUES (783, 'datvpdkqn', 'fd209dba1e674e4d09b011bc5d0f7b50', NULL, '2013-11-10 12:02:44', 0, '1970-01-01 00:00:00', 'Mzdo5lkbw2oFVfT64btMFNHAHrXQP9uD', 1, 0);
INSERT INTO `adusers` VALUES (784, 'tamit87', '616d011820383bac464a2bbc8d4fa575', NULL, '2013-11-10 21:05:50', 0, '1970-01-01 00:00:00', 'zkxvtYGfmahJwl61H4loHdyjjMwaymyI', 1, 0);
INSERT INTO `adusers` VALUES (785, 'chiquocvn', 'b1ed86cdf5902124b42a035ab4e990e0', NULL, '2013-11-10 21:37:38', 0, '1970-01-01 00:00:00', 'UUxmGg76PSZrwgREPGBec9ePNm20wt', 1, 0);
INSERT INTO `adusers` VALUES (786, 'tinyheo', '95ec0dafb235ed872bed768e4d605ab1', NULL, '2013-11-10 22:02:40', 0, '1970-01-01 00:00:00', 'M1EY7zov2tdCIUeDwPO2Vfhr2Zb0na', 1, 0);
INSERT INTO `adusers` VALUES (787, 'Chipshop', 'ec3de6e43882cd1f2f6387c2dd6b1cb9', NULL, '2013-11-11 08:21:12', 0, '1970-01-01 00:00:00', 'lVRQHIa6hlpwu60F2R5ZAgwHL9PxluZh', 1, 0);
INSERT INTO `adusers` VALUES (788, 'love22k', '6f3cfa1e638145a040e3c9aaeb10f2bb', NULL, '2013-11-11 09:52:54', 0, '1970-01-01 00:00:00', '6nQYfwNaZJoKsJOzSfspTmgmWB8wU0', 1, 0);
INSERT INTO `adusers` VALUES (789, 'bautroi', '25f9e794323b453885f5181f1b624d0b', NULL, '2013-11-11 13:43:03', 0, '1970-01-01 00:00:00', 'y4qFQsx8MWd4NVZbStKwgZDurwaUVyJ', 1, 0);
INSERT INTO `adusers` VALUES (790, 'heyuying', 'baf798a0210cc997e910f1559d1931af', NULL, '2013-11-11 19:44:24', 0, '1970-01-01 00:00:00', '47qYBhgXq99nSNIWo1KpuRcVfZCsWwj', 1, 0);
INSERT INTO `adusers` VALUES (791, 'vmkha1986', 'f1dd56f903ac234541de53973d7f8c91', NULL, '2013-11-11 22:41:00', 0, '1970-01-01 00:00:00', 'pkKPJfPwefu3yUkgvV6SJjMPRd5X3ZBL', 1, 0);
INSERT INTO `adusers` VALUES (792, 'maica30_3_2010', '2ca266d6da14719f5c539ef3d5635246', NULL, '2013-11-12 08:25:23', 0, '1970-01-01 00:00:00', 'fHzbwFWxdHfj3cecGp2AsRPsRLGqYvO', 1, 0);
INSERT INTO `adusers` VALUES (793, 'dieuxuanpham', '2ca266d6da14719f5c539ef3d5635246', NULL, '2013-11-12 09:40:29', 0, '1970-01-01 00:00:00', 'heh2I4LfgUGlzrH0CXWzv1iOWPMoi35h', 1, 0);
INSERT INTO `adusers` VALUES (794, 'hoathientrang', '2ca266d6da14719f5c539ef3d5635246', NULL, '2013-11-12 10:15:51', 0, '1970-01-01 00:00:00', 'RrooZV8RwvCRQStjrMguExIK6ILDQNvI', 1, 0);
INSERT INTO `adusers` VALUES (795, 'mrtan0001', 'a2550eeab0724a691192ca13982e6ebd', NULL, '2013-11-12 13:06:39', 0, '1970-01-01 00:00:00', 'uwALRkuve9JOiZgjguklPE3R134tJUN', 1, 0);
INSERT INTO `adusers` VALUES (796, 'bocasa', '930db71631e8da423b1b4016e75bf0e6', NULL, '2013-11-14 01:30:52', 0, '1970-01-01 00:00:00', 'FWXeW2a2VK1vYv8mjZXVnN59k63RDRlh', 1, 0);
INSERT INTO `adusers` VALUES (797, '', '', NULL, '2013-11-14 13:03:55', 0, '1970-01-01 00:00:00', '008sWwrDZvYnM8UxSd3S4AWawHWPujWV', 1, 0);
INSERT INTO `adusers` VALUES (798, 'MinhTuTe1993', 'b548d1b8e916fc2209e854643827a0db', NULL, '2013-11-14 16:19:48', 0, '1970-01-01 00:00:00', 'ugOS0n3mvOiCdRWYCOW55Q12obsbkwu', 1, 0);
INSERT INTO `adusers` VALUES (799, 'Minh28', 'b548d1b8e916fc2209e854643827a0db', NULL, '2013-11-14 16:30:19', 0, '1970-01-01 00:00:00', 'nP6cGTQuf6NvrwUEHqXEWQGzFCy7DEmp', 1, 0);
INSERT INTO `adusers` VALUES (800, 'lythong199', '002e3aecfd3dcf0e9c38aadc2cd59c65', NULL, '2013-11-15 11:05:16', 0, '1970-01-01 00:00:00', 'x1NzuCNTUTq9rVe2cgRZ5UzrJ0mxiL', 1, 0);
INSERT INTO `adusers` VALUES (801, 'vyvutn12', '765c67a3794fb2f147f855614b3e809f', NULL, '2013-11-15 11:19:48', 0, '1970-01-01 00:00:00', 'OlMy77QXKyoWNYrZAOEeMJJVYbFvpk7', 1, 0);
INSERT INTO `adusers` VALUES (802, 'buithanhthiep', '4b2c9385b76fcb6fab0c9639fa62a297', NULL, '2013-11-15 11:37:30', 0, '1970-01-01 00:00:00', 'fgCpmm4H4CrU5SZCWVr3Tlm3EMG4Mpx', 1, 0);
INSERT INTO `adusers` VALUES (803, 'tan10ckn', 'faac478192980ec06bc07a3f9453388a', NULL, '2013-11-15 13:42:47', 0, '1970-01-01 00:00:00', 'pkKDIBBj1moUJpDngUxJqzg2nUEOA6ms', 1, 0);
INSERT INTO `adusers` VALUES (804, 'dinhkhanh', 'f560b9863ccfa50132d2e5e1d589b45e', NULL, '2013-11-15 15:35:01', 0, '1970-01-01 00:00:00', 'AYJeF8Dua76A1nyafFzK8IpjPwTU2d', 1, 0);
INSERT INTO `adusers` VALUES (805, 'v.nguyen90', '6db87c2756c6b2ad50f298044a971df2', NULL, '2013-11-15 16:30:46', 0, '1970-01-01 00:00:00', 'wpDg3fjz8GlnVvyqPC9VumwRl11vJGka', 1, 0);
INSERT INTO `adusers` VALUES (806, 'tantan2013', '7c03f100658cfe6e4d660a9d498f2dad', NULL, '2013-11-15 18:14:15', 0, '1970-01-01 00:00:00', 'SDCeFlycXGM2z66cUW1Lzkd8wp8U1u2S', 1, 0);
INSERT INTO `adusers` VALUES (807, 'chien197', 'b740b7ca2f938bf7dc626e2e70ce4e7c', NULL, '2013-11-17 08:06:43', 0, '1970-01-01 00:00:00', 'JETzpsGb9nG4YNtL1X5MbNc9WZGTAw3J', 1, 0);
INSERT INTO `adusers` VALUES (808, 'djbvlgari18787', '55902c679ef1089d0902c4cdf616ff06', NULL, '2013-11-17 20:47:59', 0, '1970-01-01 00:00:00', 'a1XweSogFamATYWpY1SM62W2OpRw0AE', 1, 0);
INSERT INTO `adusers` VALUES (809, 'chunghuuhien', '7c7d14d07ac90041dd26b9c61ca20a8b', NULL, '2013-11-17 21:30:12', 0, '1970-01-01 00:00:00', 'FJ1jbFmH4uRlYqKwyAWDqBHFuDJvVOy', 1, 0);
INSERT INTO `adusers` VALUES (810, 'lamanhnhan', '73876457f221d315970aa4ccd43313d9', NULL, '2013-11-18 16:31:47', 0, '1970-01-01 00:00:00', '9lhIceM7iKgZTp7otnIEvw5OkjWlRpc3', 1, 0);
INSERT INTO `adusers` VALUES (811, '230798nts', 'd266f2f31cf903c870027659030e967e', NULL, '2013-11-18 19:03:27', 0, '1970-01-01 00:00:00', 'ID1zRJzp9H4bhn5d1qgkCFQeoWiMtw2g', 1, 0);
INSERT INTO `adusers` VALUES (812, 'nhoklikute_93', '3529fe5096b9becb51a6ad78e82738d7', NULL, '2013-11-18 20:04:02', 0, '1970-01-01 00:00:00', 'W3mnC201kqoQ7brCO1b49wVq1K6X8nhR', 1, 0);
INSERT INTO `adusers` VALUES (813, 'kunut612', 'c5fb0a76b1d386a5bc363f5b60bf89df', NULL, '2013-11-19 00:23:27', 0, '1970-01-01 00:00:00', 'wIyMZNEdEpLUx2HDNNQHr2s1ydmSqiD', 1, 0);
INSERT INTO `adusers` VALUES (814, 'fiestahdt', '1add4f36e068af0fdd8da1d5885ac86a', NULL, '2013-11-19 11:11:10', 0, '1970-01-01 00:00:00', 'bHTDM0IfQ1ZvJRzVyOEE2KxX8JhWooJ', 1, 0);
INSERT INTO `adusers` VALUES (815, 'kienpx31', '3b74388d9fd72948ed8e54cb4da1455c', NULL, '2013-11-19 11:31:45', 0, '1970-01-01 00:00:00', 'RKXbRWLwNszbWVMsHw2EYiS24TC3Trpk', 1, 0);
INSERT INTO `adusers` VALUES (816, 'van', 'f11eed37d737eb8929d13ab8ff1434e4', NULL, '2013-11-19 12:18:18', 0, '1970-01-01 00:00:00', 'SAdUVYmkfCQ2F3FQEaiF1L3woJE081W4', 1, 0);
INSERT INTO `adusers` VALUES (817, 'vinhanan', 'b7f2a29d79e2aaa9b88602ee5725e88f', NULL, '2013-11-20 10:57:53', 0, '1970-01-01 00:00:00', 'KPSxIVplHzJsDtNWwnKwqGdcygwiKWom', 1, 0);
INSERT INTO `adusers` VALUES (818, 'tuanvinh2803', '4fd706346eb318095c4a1538e0bda644', NULL, '2013-11-21 12:16:21', 0, '1970-01-01 00:00:00', 'Ha7oIPQyXgpnN2u6cwxdSPGSwQAaNnV2', 1, 0);
INSERT INTO `adusers` VALUES (819, 'NamMeo', '43508a40d9b3da88862b034fe28b6c1c', NULL, '2013-11-21 14:33:08', 0, '1970-01-01 00:00:00', '9mm7RUHNQer0LeV1Eb79uS1cr2Foot8j', 1, 0);
INSERT INTO `adusers` VALUES (820, 'hellokecty87', 'd1d6fbca260447850a53f46492c84bae', NULL, '2013-11-25 10:12:58', 0, '1970-01-01 00:00:00', 'H395MWAwlUanIvCGn53201cf318hMy4', 1, 0);
INSERT INTO `adusers` VALUES (821, 'thanhphongts', 'ed264148ef8fc13d075c1c993a110fb4', NULL, '2013-11-27 09:16:34', 0, '1970-01-01 00:00:00', 'WgLB4TkeTlH5eBwB2LmyYXThqvu7wRh', 1, 0);
INSERT INTO `adusers` VALUES (822, 'togialinh', 'e10adc3949ba59abbe56e057f20f883e', NULL, '2013-11-23 11:38:32', 0, '1970-01-01 00:00:00', '2sX1rOUvtNxD3gTu5wrY7e76SWpWbAUT', 1, 0);
INSERT INTO `adusers` VALUES (823, 'hdtiep', '7c747bbd8e74497cfdb5747c6da38d1b', NULL, '2013-11-27 23:03:33', 0, '1970-01-01 00:00:00', 'hFWKf3vIbdKCUkeZO7xPqB7wsaMakuxu', 1, 0);
INSERT INTO `adusers` VALUES (824, 'khangkhai', '3b02db23e985ec15f8d4a4098060d618', NULL, '2013-11-29 07:42:02', 0, '1970-01-01 00:00:00', 'HbuAoOx8bDROw5XNUnsMWGvMBQ0LSCjL', 1, 0);
INSERT INTO `adusers` VALUES (825, 'yilufa888', 'cc70e9369e9f87a660812e08d76a828e', NULL, '2013-11-30 11:17:01', 0, '1970-01-01 00:00:00', 'FwVLv55UgcoOri0pXe2PAkPJ6zEHH8', 1, 0);
INSERT INTO `adusers` VALUES (826, 'hungsatan', '48a0b669c16c13136f33950d0350703b', NULL, '2013-12-05 23:33:39', 0, '1970-01-01 00:00:00', 'OtLJOBX6xQqw91CD1mY8I0ZBcYTYdnw', 1, 0);
INSERT INTO `adusers` VALUES (827, 'Thienminh073', 'dc70dcb3f9c55777f6c012c0d2dc8b59', NULL, '2013-12-07 22:18:53', 0, '1970-01-01 00:00:00', '8ERZ0kquUOhW8aPvLrl6WSeFw6JlEbKu', 1, 0);
INSERT INTO `adusers` VALUES (828, 'nguyenvu1310', 'c78c5a2e4d286b3d41220f84ec87ee6d', NULL, '2013-12-11 20:40:19', 0, '1970-01-01 00:00:00', 'awOGBTaW2JLyPiU5tuJKUuEkjSuKKZQ', 1, 0);
INSERT INTO `adusers` VALUES (829, 'hoangbrother', '9710879460dd0cac3c6571f74666a606', NULL, '2013-12-14 08:20:40', 0, '1970-01-01 00:00:00', '1UorDxA8c0bcQqhqXr0g9pK0g60jNDk', 1, 0);
INSERT INTO `adusers` VALUES (830, 'jonlyken', 'a6e05f4e1c94066df7a78cfc6668b37a', NULL, '2013-12-16 15:50:52', 0, '1970-01-01 00:00:00', 'JRrtNMW4XU1yWpGmyAM7nVcKCt1r8zET', 1, 0);
INSERT INTO `adusers` VALUES (831, 'phongvan99', 'cd997f11ce3970ba5a2bcac8b381f195', NULL, '2013-12-17 09:50:26', 0, '1970-01-01 00:00:00', 'g03jL0Kx7tt4s0TRWOXjrKwc412V8e', 1, 0);
INSERT INTO `adusers` VALUES (832, 'minhduc1988', '017f6ef2e6d27bf9d1fddde2595d04f4', NULL, '2013-12-20 12:22:19', 0, '1970-01-01 00:00:00', 'xYw9tgUhlIh5AWSEWNQHEJQBE04wGbu', 1, 0);
INSERT INTO `adusers` VALUES (833, 'hien005', '7e94fbf2d240c38d62a8d11e428935d0', NULL, '2013-12-24 15:07:07', 0, '1970-01-01 00:00:00', 'GoqBdh0GF6vVDZcdAelDd6eo7pnQ5OiQ', 1, 0);
INSERT INTO `adusers` VALUES (834, 'ronaldo', 'ef600684aad53263fb5182fcc42fc33d', NULL, '2013-12-26 10:54:34', 0, '1970-01-01 00:00:00', 'CBc84hHNJ6ZIUEpMffx5kiKUYwly4aDx', 1, 0);
INSERT INTO `adusers` VALUES (835, 'doanphi', '900c7a40dd2e65f7c2a2a73c22fedb60', NULL, '2013-12-26 23:21:45', 0, '1970-01-01 00:00:00', 'bOXh3uOYjpOUtBYi2chovkx8u92WmzZq', 1, 0);
INSERT INTO `adusers` VALUES (836, 'pigdeath', 'b7aa1d46dfc1d6ab0a06fe289ef64b79', NULL, '2013-12-27 14:46:24', 0, '1970-01-01 00:00:00', 'ailDhd0CqcnUBSzrMhwvtSoosNRQKmr', 1, 0);
INSERT INTO `adusers` VALUES (837, 'nguyenvuson279', '2c07a36f4fa6da688cbaf9af028f6a34', NULL, '2013-12-29 23:45:20', 0, '1970-01-01 00:00:00', 'MhLESUnt6bZ5kV38HigMYSgVc5riVnzj', 1, 0);
INSERT INTO `adusers` VALUES (838, 'mavuongsoi', '1cc9ac628fe3c3b1d6cdfb5cc6614bfb', NULL, '2014-01-02 12:09:55', 0, '1970-01-01 00:00:00', '1yhJ1AXzcPcHEHOaIGHIJdA64eijW0Ra', 1, 0);
INSERT INTO `adusers` VALUES (839, 'vantran1989', 'af44add2e3828ede5abdefca9609a5cd', NULL, '2014-01-03 12:34:31', 0, '1970-01-01 00:00:00', 'vwn7nd32Bwu6Zz738mdR7JZxd4pwRx', 1, 0);
INSERT INTO `adusers` VALUES (840, 'prodigy_97', 'ef52b3e48b8e5a61952fdb7c1bef4d40', NULL, '2014-01-03 21:54:50', 0, '1970-01-01 00:00:00', '7fgU3qMIWYpOywodRLAglLoLtGqWPEl', 1, 0);
INSERT INTO `adusers` VALUES (841, 'nhokpro2907', '7bec3384c32872a9781aa07b5eedc88e', NULL, '2014-01-05 21:58:51', 0, '1970-01-01 00:00:00', 'zLyMQPHW3eYhnGsCxXJcgBSx5WWY5bIZ', 1, 0);
INSERT INTO `adusers` VALUES (842, 'makemmo4812', '7c07e342d5b17544b800f3cff4a45b59', NULL, '2014-01-08 19:42:09', 0, '1970-01-01 00:00:00', 't9xhCxK4rwjwua3Sw5abBGcZw78suT1l', 1, 0);
INSERT INTO `adusers` VALUES (843, 'pelcolcolor', 'd0f550e0e03edea0586a97b4b5df9c3e', NULL, '2014-01-10 17:03:45', 0, '1970-01-01 00:00:00', 'kXx2Z5PeXrvlF8KHnWC4reCy9aLxlsFZ', 1, 0);
INSERT INTO `adusers` VALUES (844, 'maithanhthuy132', 'f5344e8824b37b7de86fe4c13240c786', NULL, '2014-01-11 23:58:47', 0, '1970-01-01 00:00:00', 'FKdxTdQCxKviW0gPoR9UST6cLpaXdV3t', 1, 0);
INSERT INTO `adusers` VALUES (845, 'haison789789', 'f5849a31511377b74542706b642c02a7', NULL, '2014-01-14 19:14:55', 0, '1970-01-01 00:00:00', 'tmdj8gqeNQKPbXa4g3VeGiWwCwHzdcCG', 1, 0);
INSERT INTO `adusers` VALUES (846, 'phongvan6489', '0cb19ab3d547c9cad5543cf37250cec3', NULL, '2014-01-15 09:30:02', 0, '1970-01-01 00:00:00', 'noQ60v6uuJmFAOWI70C2pW5QFbOc8JOz', 1, 0);
INSERT INTO `adusers` VALUES (847, 'ahkiem32', 'e10adc3949ba59abbe56e057f20f883e', NULL, '2014-01-15 10:03:34', 0, '1970-01-01 00:00:00', 'PlIR7E3IZdwNwB0xyxq6teTYqw52A63e', 1, 0);
INSERT INTO `adusers` VALUES (848, 'giaquy', '02a320976b30fafca9213dd70ff514b9', NULL, '2014-01-17 22:58:17', 0, '1970-01-01 00:00:00', 'QWoosju3aewYo4U2T1CPd4wOp0BeoWI', 1, 0);
INSERT INTO `adusers` VALUES (849, 'langtuminh82', '9cd27d03646e20b86cf31e902a61e594', NULL, '2014-01-24 20:10:04', 0, '1970-01-01 00:00:00', '0qwDiFZVn2N0EtWjg4vqbw7qR8G5gwFO', 1, 0);
INSERT INTO `adusers` VALUES (850, 'heroherohero', 'f5861adccabd375885cbbba74e6ba1b9', NULL, '2014-02-16 11:07:57', 0, '1970-01-01 00:00:00', 'BIbPCW582zzx18s1aNYP0dZZ1ChYUGL', 1, 0);
INSERT INTO `adusers` VALUES (851, 'Hoangvinhtni', '1a050207183c91c421ac6fc3d1403428', NULL, '2014-02-17 18:09:14', 0, '1970-01-01 00:00:00', 'MJWRvnIutZuAzM0lmIwgAbJqpwEdU2Ns', 1, 0);
INSERT INTO `adusers` VALUES (852, 'qwerty', '436495749e96a3275920e11c43f1801e', NULL, '2014-02-18 23:27:30', 0, '1970-01-01 00:00:00', 'oalKxCbG8eUe6ApHITVkzO8tPFXIW3N8', 1, 0);
INSERT INTO `adusers` VALUES (853, 'Letincorp', '1406f3a0220709683f5c5f60df7a9036', NULL, '2014-02-21 11:11:59', 0, '1970-01-01 00:00:00', 'OizPbZjJ4vK0Z4eI9ZM1KZNwcEHNhshO', 1, 0);
INSERT INTO `adusers` VALUES (854, 'Luoilaodong', 'fd700fe04810a45ef59ec6b8f61508c1', NULL, '2014-02-26 00:17:07', 0, '1970-01-01 00:00:00', 'NqNlyAF4WwZhb7mENQxWonQ8sbbyrrc', 1, 0);
INSERT INTO `adusers` VALUES (855, 'trien.dv', 'bb703de1b66a04b00b3726aeef9ffe4c', NULL, '2014-02-28 15:05:59', 0, '1970-01-01 00:00:00', 'uawGNJsLTKDIc2vMxKPkVYvgu68e1c97', 1, 0);
INSERT INTO `adusers` VALUES (856, 'koi_9x2', 'ca57e5c7e28d6e7fe2a1024328a29dc6', NULL, '2014-03-01 03:14:26', 0, '1970-01-01 00:00:00', '8I7NkXXwp4KqJEgA0iBCzVCbvFptETd', 1, 0);
INSERT INTO `adusers` VALUES (857, 'greenfields', '5da2053490675e91db8b19e93233cfd0', NULL, '2014-03-04 15:28:31', 0, '1970-01-01 00:00:00', 'UPi7yX08kweqALQ4HbmVBeXlAhTp4kXo', 1, 0);
INSERT INTO `adusers` VALUES (858, 'pv90', 'a60676ffd59380325845dffdc906463e', NULL, '2014-03-05 09:07:39', 0, '1970-01-01 00:00:00', 'vIREPRgGvM0UlvlhiTY5KpPqWsqgsWEZ', 1, 0);
INSERT INTO `adusers` VALUES (859, 'votay', 'de6d9c18393a2c65d0fd13618657e538', NULL, '2014-03-08 14:54:04', 0, '1970-01-01 00:00:00', 'enUie5HZoLNaV8MmEp42XGKcOjFCkc', 1, 0);
INSERT INTO `adusers` VALUES (860, 'tuananh', 'c391dfde8701effd200890601fa13dec', NULL, '2014-03-11 20:29:32', 0, '1970-01-01 00:00:00', 'MFs3jrSkr23HkSXI1Z3VPtw7VR9NMLx', 1, 0);
INSERT INTO `adusers` VALUES (861, 'huyenduc0808', '9ec8da18bbac6c2c95b6bc3d722a4a71', NULL, '2014-03-13 04:33:40', 0, '1970-01-01 00:00:00', 'FaYInNSW2ziaERF4OhThJqwgvNuXwGrU', 1, 0);
INSERT INTO `adusers` VALUES (862, 'anhchangtimbaxa', 'fa88c5a40294f9ec4c6bd4cac98ea2ae', NULL, '2014-03-15 14:04:45', 0, '1970-01-01 00:00:00', '14aIfzFk78puwtGfdMEYd7WVyX6NU7O', 1, 0);
INSERT INTO `adusers` VALUES (863, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', NULL, '2018-10-31 20:49:08', 1, '0000-00-00 00:00:00', '', 1, 1);

-- ----------------------------
-- Table structure for advertises
-- ----------------------------
DROP TABLE IF EXISTS `advertises`;
CREATE TABLE `advertises`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `advertise_name` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `advertise_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `advertise_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `advertise_type` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sequence` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of advertises
-- ----------------------------

-- ----------------------------
-- Table structure for apconfigs
-- ----------------------------
DROP TABLE IF EXISTS `apconfigs`;
CREATE TABLE `apconfigs`  (
  `APConfigID` int(11) NOT NULL,
  `APConfigTime` datetime(0) NULL DEFAULT NULL,
  `APConfigTime1` datetime(0) NULL DEFAULT NULL,
  `APConfigIsRun` bit(1) NULL DEFAULT b'0',
  `AAStatus` bit(1) NULL DEFAULT b'1',
  PRIMARY KEY (`APConfigID`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Fixed;

-- ----------------------------
-- Records of apconfigs
-- ----------------------------

-- ----------------------------
-- Table structure for apweblinkconfigs
-- ----------------------------
DROP TABLE IF EXISTS `apweblinkconfigs`;
CREATE TABLE `apweblinkconfigs`  (
  `APWebLinkConfigID` int(11) NOT NULL AUTO_INCREMENT,
  `APWebLinkConfigName` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `APWebLinkConfigLink` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `APWebLinkConfigType` enum('RSS','HTML') CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT 'RSS',
  `APWebLinkConfigRootName` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `APWebLinkConfigNodeName` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `APWebLinkConfigElementTitle` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `APWebLinkConfigElementDesc` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `APWebLinkConfigElementImage` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `APWebLinkConfigElementPublicDate` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `APWebLinkConfigElementContent` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `APWebLinkConfigElementLink` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `FK_ADCategoryID` int(11) NULL DEFAULT NULL,
  `ADUserName` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `AANumberCount` int(11) NULL DEFAULT NULL,
  `AAStatus` bit(1) NULL DEFAULT b'1',
  `AASelected` bit(1) NULL DEFAULT b'0',
  PRIMARY KEY (`APWebLinkConfigID`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of apweblinkconfigs
-- ----------------------------
INSERT INTO `apweblinkconfigs` VALUES (1, 'vnExpress', 'https://vnexpress.net/rss/thoi-su.rss', 'RSS', 'channel', 'item', 'title', 'description', 'description[img]', 'pubDate', 'article.content_detail', 'link', 9, NULL, NULL, b'1', b'1');
INSERT INTO `apweblinkconfigs` VALUES (2, 'Zing News', 'https://news.zing.vn/cong-nghe.html', 'HTML', NULL, NULL, '.cate_content article .title', '.cate_content article .summary', '.cate_content article .cover img', '.cate_content article header time', 'section.main .the-article-body', '.cate_content article .cover a', 8, NULL, NULL, b'1', b'0');

-- ----------------------------
-- Table structure for baiviet
-- ----------------------------
DROP TABLE IF EXISTS `baiviet`;
CREATE TABLE `baiviet`  (
  `idBV` int(10) NOT NULL AUTO_INCREMENT,
  `TenDangNhap` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `TieuDe` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `NoiDung` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `NgayGioPost` datetime(0) NOT NULL,
  `ThoiGianPost` tinyint(4) NOT NULL,
  `NgayDang` timestamp(0) NULL DEFAULT current_timestamp ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idBV`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of baiviet
-- ----------------------------
INSERT INTO `baiviet` VALUES (1, 'langtu', 'test 2', 'http://www.qhonline.info/forum/ tes 2&nbsp;', '2014-09-08 21:35:10', 120, '2014-09-08 21:35:45');

-- ----------------------------
-- Table structure for baiviet_forum
-- ----------------------------
DROP TABLE IF EXISTS `baiviet_forum`;
CREATE TABLE `baiviet_forum`  (
  `idBV` int(10) NOT NULL DEFAULT 0,
  `idFR` int(10) NOT NULL DEFAULT 0,
  `NgayPost` datetime(0) NULL DEFAULT NULL,
  `TrangThai` tinyint(1) NULL DEFAULT NULL,
  PRIMARY KEY (`idBV`, `idFR`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of baiviet_forum
-- ----------------------------
INSERT INTO `baiviet_forum` VALUES (1, 1, '2014-09-08 21:35:48', 1);

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_name` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_excerpt` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `category_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `parent_id` int(10) UNSIGNED NULL DEFAULT NULL,
  `category_lft` smallint(5) UNSIGNED NOT NULL,
  `category_rgt` smallint(5) UNSIGNED NOT NULL,
  `ob_title` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ob_desception` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ob_keyword` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `category_type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_status` tinyint(3) UNSIGNED NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES (1, 'Thiết kế web', NULL, 'thiet-ke-web', NULL, NULL, 1, 6, NULL, NULL, NULL, 'post', 1, '2021-04-14 06:44:52', '2021-04-14 06:44:52');
INSERT INTO `categories` VALUES (2, 'Web bán hàng', NULL, 'web-ban-hang', NULL, 1, 2, 3, NULL, NULL, NULL, 'post', 1, '2021-04-14 06:44:52', '2021-04-14 06:44:52');
INSERT INTO `categories` VALUES (3, 'Web tin tức', NULL, 'web-tin-tuc', NULL, 1, 4, 5, NULL, NULL, NULL, 'post', 1, '2021-04-14 06:44:53', '2021-04-14 06:44:53');
INSERT INTO `categories` VALUES (4, 'Ứng dụng', NULL, 'ung-dung', NULL, NULL, 7, 8, NULL, NULL, NULL, 'post', 1, '2021-04-14 06:44:53', '2021-04-14 06:44:53');
INSERT INTO `categories` VALUES (5, 'Tin tức', NULL, 'tin-tuc', NULL, NULL, 9, 10, NULL, NULL, NULL, 'news', 1, '2021-04-14 06:44:53', '2021-04-14 06:44:53');

-- ----------------------------
-- Table structure for configs
-- ----------------------------
DROP TABLE IF EXISTS `configs`;
CREATE TABLE `configs`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `config_name` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `config_value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of configs
-- ----------------------------

-- ----------------------------
-- Table structure for cscompanys
-- ----------------------------
DROP TABLE IF EXISTS `cscompanys`;
CREATE TABLE `cscompanys`  (
  `CSCompanyID` int(10) NOT NULL AUTO_INCREMENT,
  `CSCompanyName` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `CSCompanyAdd` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `CSCompanyEmail` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `CSCompanyWebsite` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `CSCompanyPhone` int(11) NULL DEFAULT NULL,
  `CSCompanyFax` int(12) NULL DEFAULT NULL,
  `AATitle` varchar(65) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `AADescription` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `AAKeyWords` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `UserEmail` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `PassEmail` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `HostMail` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `PortMail` tinyint(4) NULL DEFAULT NULL,
  `ActiveTK` tinyint(1) NOT NULL,
  `BaoTri` tinyint(1) NOT NULL,
  `NoiDungBT` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `Chat` tinyint(1) NOT NULL,
  `ScriptCode` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`CSCompanyID`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cscompanys
-- ----------------------------
INSERT INTO `cscompanys` VALUES (1, 'VNNIT', '29 Đường 892 Tạ Quang Bửu', NULL, 'thpt.vannguoimua.com', 98755555, NULL, 'VNNIT Computer', NULL, 'Thiết kế web', NULL, NULL, NULL, NULL, 0, 0, 'Trang web đang trong quá trình nâng cấp! Bạn vui lòng quay lại sau!', 0, 'window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=\r\nd.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.\r\n_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute(\'charset\',\'utf-8\');\r\n$.src=\'//v2.zopim.com/?2GZNkKKrQbjAizWaOiBq3Namr6ecl2L4\';z.t=+new Date;$.\r\ntype=\'text/javascript\';e.parentNode.insertBefore($,e)})(document,\'script\');');
INSERT INTO `cscompanys` VALUES (2, 'Lấy tin tự động', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0, NULL);
INSERT INTO `cscompanys` VALUES (3, 'vatgia', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0, NULL);

-- ----------------------------
-- Table structure for danhmuc
-- ----------------------------
DROP TABLE IF EXISTS `danhmuc`;
CREATE TABLE `danhmuc`  (
  `idDM` int(10) NOT NULL AUTO_INCREMENT,
  `TenDM` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `TenDangNhap` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`idDM`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of danhmuc
-- ----------------------------
INSERT INTO `danhmuc` VALUES (1, 'vnm', 'langtu');
INSERT INTO `danhmuc` VALUES (2, 'hoctap', 'langtu');

-- ----------------------------
-- Table structure for employees
-- ----------------------------
DROP TABLE IF EXISTS `employees`;
CREATE TABLE `employees`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `employee_no` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `last_name` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `birthday` date NULL DEFAULT NULL,
  `gender` tinyint(3) UNSIGNED NOT NULL,
  `phone_number` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `email_address` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of employees
-- ----------------------------

-- ----------------------------
-- Table structure for forum
-- ----------------------------
DROP TABLE IF EXISTS `forum`;
CREATE TABLE `forum`  (
  `idFR` int(10) NOT NULL AUTO_INCREMENT,
  `DiaChiFR` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `UserID` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `PassWord` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `PID` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Type` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `idDM` int(10) NOT NULL DEFAULT 0,
  PRIMARY KEY (`idFR`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of forum
-- ----------------------------
INSERT INTO `forum` VALUES (1, 'http://forum.vannguoimua.com/', 'langtu', 'thang789', '4', 'xenforo', 1);
INSERT INTO `forum` VALUES (2, 'http://www.qhonline.info/forum/', 'langtudatinh', '123456', '4', 'vbb', 2);

-- ----------------------------
-- Table structure for hremployees
-- ----------------------------
DROP TABLE IF EXISTS `hremployees`;
CREATE TABLE `hremployees`  (
  `HREmployeeID` int(10) NOT NULL AUTO_INCREMENT,
  `HREmployeeName` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `HREmployeeDate` datetime(0) NULL DEFAULT NULL,
  `HREmployeeFirstName` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `HREmployeeLastName` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `HREmployeeFullName` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `HREmployeePhone` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `HREmployeeImage` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `HREmployeeEmail` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `HREmployeeGender` tinyint(1) NULL DEFAULT NULL,
  `HREmployeeBirthDay` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `HREmployeeAdd` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `HREmployeeCardNo` int(10) NULL DEFAULT NULL,
  `FK_ADUserID` int(10) NULL DEFAULT NULL,
  PRIMARY KEY (`HREmployeeID`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 656 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of hremployees
-- ----------------------------
INSERT INTO `hremployees` VALUES (1, 'Sang', '2013-03-07 00:00:00', NULL, NULL, 'Sang', '917950528', NULL, 'htkycong@gmail.com', 1, '1989-02-13', '473/23 Tỉnh Lộ 10, Q Bình Tân', NULL, 1);
INSERT INTO `hremployees` VALUES (2, 'NVHung', '2013-03-07 00:00:00', NULL, NULL, '', '2147483647', NULL, '123@gmail.com', 1, '1988-01-01', '12356', NULL, 2);
INSERT INTO `hremployees` VALUES (3, 'nhangheo', '2013-06-12 00:00:00', NULL, NULL, '', NULL, NULL, 'nhangheo2011@gmail.com', 0, NULL, NULL, NULL, 3);
INSERT INTO `hremployees` VALUES (4, 'Ronando', '2013-06-12 00:00:00', NULL, NULL, '', NULL, NULL, 'ronandoanhhung@gmail.com', 1, NULL, NULL, NULL, 4);
INSERT INTO `hremployees` VALUES (5, 'ToiVip', '2013-05-10 00:00:00', NULL, NULL, '', '1234', NULL, 'htkycong1@gmail.com', 1, '1989-02-13', '123', NULL, 5);
INSERT INTO `hremployees` VALUES (6, 'ChịDậu', '2013-06-12 00:00:00', NULL, NULL, '', NULL, NULL, 'chidaudichoi@gmail.com', 0, NULL, NULL, NULL, 6);
INSERT INTO `hremployees` VALUES (7, 'nguoiduatin', '2013-06-12 01:20:48', NULL, NULL, '', NULL, NULL, 'nguoiduatinabc@gmail.com', 1, NULL, NULL, NULL, 7);
INSERT INTO `hremployees` VALUES (8, 'Thắng', '2013-06-11 17:34:35', NULL, NULL, 'Thắng', '909164883', NULL, 'datinhkiem2009@gmail.com', 1, '1990-03-06', 'quoc lo 50', NULL, 8);
INSERT INTO `hremployees` VALUES (9, 'BuiQuangSang', '2013-06-04 12:45:59', NULL, NULL, '', NULL, NULL, 'infobqsang1@gmail.com', 1, NULL, NULL, NULL, 9);
INSERT INTO `hremployees` VALUES (10, 'Piggy', '2013-06-10 11:09:52', NULL, NULL, '', NULL, NULL, 'htkycong4@gmail.com', 1, '1990-05-30', '<br>', NULL, 10);
INSERT INTO `hremployees` VALUES (11, 'dvdangtin002', '2013-06-10 12:45:19', NULL, NULL, '', NULL, NULL, 'dvdangtin002@gmail.com', 1, NULL, NULL, NULL, 11);
INSERT INTO `hremployees` VALUES (12, 'PhoMai', '2013-06-12 00:00:00', NULL, NULL, '', NULL, NULL, 'phomairanh@gmail.com', 0, NULL, NULL, NULL, 12);
INSERT INTO `hremployees` VALUES (13, 'cobelolem', '2013-06-12 00:00:00', NULL, NULL, '', NULL, NULL, '', 0, NULL, NULL, NULL, 13);
INSERT INTO `hremployees` VALUES (14, 'dao8485', '2013-06-12 15:09:18', NULL, NULL, '', NULL, NULL, 'dao8485@yahoo.com.vn', 0, NULL, NULL, NULL, 14);
INSERT INTO `hremployees` VALUES (15, 'yurilovely', '2013-06-12 15:38:02', NULL, NULL, '', NULL, NULL, 'yurisoshi.hienlovely@gmail.com', 0, NULL, NULL, NULL, 15);
INSERT INTO `hremployees` VALUES (16, 'giathkn', '2013-06-12 15:40:39', NULL, NULL, '', NULL, NULL, 'giathkn@gmail.com', 1, NULL, NULL, NULL, 16);
INSERT INTO `hremployees` VALUES (17, '10520028', '2013-06-12 15:46:08', NULL, NULL, '', NULL, NULL, '10520028@aep.uit.edu.vn', 1, NULL, NULL, NULL, 17);
INSERT INTO `hremployees` VALUES (18, 'giathkn1', '2013-06-12 15:51:47', NULL, NULL, '', NULL, NULL, 'giathkn1@gmail.com', 1, NULL, NULL, NULL, 18);
INSERT INTO `hremployees` VALUES (19, 'THUYNHUNG', '2013-06-12 16:28:39', NULL, NULL, '', NULL, NULL, 'thuynhungkt41@gmail.com', 0, NULL, NULL, NULL, 19);
INSERT INTO `hremployees` VALUES (20, 'big123', '2013-06-12 16:29:33', NULL, NULL, '', NULL, NULL, 'ilovetuyenquang@gmail.com', 0, NULL, NULL, NULL, 20);
INSERT INTO `hremployees` VALUES (21, 'nl_ad', '2013-06-12 16:42:25', NULL, NULL, '', NULL, NULL, 'nl_ad@yahoo.com.vn', 0, NULL, NULL, NULL, 21);
INSERT INTO `hremployees` VALUES (22, 'Lưu Hà', '2013-06-12 18:14:56', NULL, NULL, '', NULL, NULL, 'luu.ha.sg@gmail.com', 1, NULL, NULL, NULL, 22);
INSERT INTO `hremployees` VALUES (23, 'znhat_tanz', '2013-06-12 18:55:08', NULL, NULL, '', NULL, NULL, 'znhattanz@gmail.com', 1, NULL, NULL, NULL, 23);
INSERT INTO `hremployees` VALUES (24, 'A2013', '2013-06-12 19:00:21', NULL, NULL, '', NULL, NULL, 'quocdat64837834@gmail.com', 1, NULL, NULL, NULL, 24);
INSERT INTO `hremployees` VALUES (25, 'hoangtan103', '2013-06-13 11:10:35', NULL, NULL, '', NULL, NULL, 'hoangtan103@gmail.com', 1, NULL, NULL, NULL, 25);
INSERT INTO `hremployees` VALUES (26, 'dtran1990', '2013-06-12 19:35:37', NULL, NULL, '', NULL, NULL, 'ctvtran1990@gmail.com', 1, NULL, NULL, NULL, 26);
INSERT INTO `hremployees` VALUES (27, 'kimlien1289', '2013-06-13 11:02:25', NULL, NULL, '', NULL, NULL, 'kimlien121289@gmail.com', 0, NULL, NULL, NULL, 27);
INSERT INTO `hremployees` VALUES (28, 'ctvtran', '2013-06-12 20:28:50', NULL, NULL, '', '1222225770', NULL, 'hejipoto2@zing.vn', 1, '1990-12-11', 'Bến Lức .Long An<br>', NULL, 28);
INSERT INTO `hremployees` VALUES (29, 'Nhilun', '2013-06-13 10:23:25', NULL, NULL, '', NULL, NULL, 'anhthi@gmail.com', 0, NULL, NULL, NULL, 29);
INSERT INTO `hremployees` VALUES (30, 'yuhina188', '2013-06-13 00:19:22', NULL, NULL, '', NULL, NULL, 'yuhina188@gmail.com', 0, NULL, NULL, NULL, 30);
INSERT INTO `hremployees` VALUES (31, 'kaorypham', '2013-06-13 01:24:37', NULL, NULL, '', NULL, NULL, 'ms.kaorypham@gmail.com', 0, NULL, NULL, NULL, 31);
INSERT INTO `hremployees` VALUES (32, 'anhdao', '2013-06-13 06:32:16', NULL, NULL, '', NULL, NULL, 'nguyenle_829@yahoo.com.vn', 0, NULL, NULL, NULL, 34);
INSERT INTO `hremployees` VALUES (33, 'kenddy', '2013-06-13 11:35:41', NULL, NULL, '', NULL, NULL, 'kenddytran@gmail.com', 1, NULL, NULL, NULL, 37);
INSERT INTO `hremployees` VALUES (34, 'vtm172', '2013-06-13 14:42:08', NULL, NULL, '', '934588625', NULL, 'themanh1702@gmail.com', 1, '1989-02-17', '<br>', NULL, 39);
INSERT INTO `hremployees` VALUES (35, 'znhat_tanz3', '2013-06-13 14:42:15', NULL, NULL, '', NULL, NULL, 'znhattanz3@gmail.com', 1, NULL, NULL, NULL, 40);
INSERT INTO `hremployees` VALUES (36, 'kimchi89', '2013-06-13 14:57:16', NULL, NULL, '', NULL, NULL, 'nguyendunggpro87@gmail.com', 0, NULL, NULL, NULL, 42);
INSERT INTO `hremployees` VALUES (37, 'vosidaonha', '2013-06-13 15:06:39', NULL, NULL, '', NULL, NULL, 'mr_daihv95@yahoo.com', 1, NULL, NULL, NULL, 43);
INSERT INTO `hremployees` VALUES (38, 'langtudatinh', '2013-06-13 23:54:41', NULL, NULL, '', '0', NULL, 'datinhkiem2008@gmail.com', 1, '1990-06-03', '<br>', NULL, 44);
INSERT INTO `hremployees` VALUES (39, 'anh hai', '2013-06-14 10:26:22', NULL, NULL, '', NULL, NULL, 'anhhai@gmail.com', 1, NULL, NULL, NULL, 48);
INSERT INTO `hremployees` VALUES (40, 'thanhha', '2013-06-14 10:31:05', NULL, NULL, '', NULL, NULL, 'tkddt2000@yahoo.com', 0, NULL, NULL, NULL, 50);
INSERT INTO `hremployees` VALUES (41, 'toanle13', '2013-06-14 10:41:57', NULL, NULL, '', NULL, NULL, 'tomaconan05@gmail.com', 1, NULL, NULL, NULL, 51);
INSERT INTO `hremployees` VALUES (42, 'kuppj.top', '2013-06-14 15:03:23', NULL, NULL, '', NULL, NULL, 'vuhoangthanhvuong@gmail.com', 1, NULL, NULL, NULL, 55);
INSERT INTO `hremployees` VALUES (43, 'PHUONGDUNG', '2013-06-14 15:43:10', NULL, NULL, '', '0', NULL, 'THIENVY1401@YAHOO.COM.VN', 0, '1970-01-01', NULL, NULL, 57);
INSERT INTO `hremployees` VALUES (44, 'dungchi89', '2013-06-14 19:00:29', NULL, NULL, '', NULL, NULL, 'hilan717@gmail.com', 0, NULL, NULL, NULL, 58);
INSERT INTO `hremployees` VALUES (45, 'quynguyenvan', '2013-06-14 22:43:24', NULL, NULL, '', NULL, NULL, 'vanquy10cxd03@gmail.com', 1, NULL, NULL, NULL, 60);
INSERT INTO `hremployees` VALUES (46, 'hieudtd48', '2013-06-14 23:05:17', NULL, NULL, '', NULL, NULL, 'daovanhieu77@gmail.com', 1, NULL, NULL, NULL, 61);
INSERT INTO `hremployees` VALUES (47, 'tata', '2013-06-14 23:06:49', NULL, NULL, '', NULL, NULL, 'rua_con_lovely2000@yahoo.com', 0, NULL, NULL, NULL, 62);
INSERT INTO `hremployees` VALUES (48, 'hoanhngoc', '2013-06-14 23:34:18', NULL, NULL, '', NULL, NULL, 'hoanhngoc308@gmail.com', 0, NULL, NULL, NULL, 63);
INSERT INTO `hremployees` VALUES (49, 'nguyenboly', '2013-06-15 07:41:18', NULL, NULL, '', NULL, NULL, 'nguyenboly1984.msmart@gmail.com', 1, NULL, NULL, NULL, 65);
INSERT INTO `hremployees` VALUES (50, 'tankiemnguc', '2013-06-15 12:06:55', NULL, NULL, '', NULL, NULL, 'tankiemnguc@yahoo.com.vn', 1, NULL, NULL, NULL, 66);
INSERT INTO `hremployees` VALUES (51, 'piggy30590', '2013-06-15 17:15:15', NULL, NULL, '', NULL, NULL, 'piggy30590@yahoo.com', 0, NULL, NULL, NULL, 68);
INSERT INTO `hremployees` VALUES (52, 'vantrivov', '2013-06-15 20:01:32', NULL, NULL, '', NULL, NULL, 'vantrivov@gmail.com', 1, NULL, NULL, NULL, 69);
INSERT INTO `hremployees` VALUES (53, '01274816660', '2013-06-15 21:32:44', NULL, NULL, '', NULL, NULL, 'hsnguyenthetung@gmail.com', 1, NULL, NULL, NULL, 70);
INSERT INTO `hremployees` VALUES (54, 'vanmui255', '2013-06-16 07:31:31', NULL, NULL, '', '1693696089', NULL, 'vanmui255@gmail.com', 1, '1991-05-25', '<br>', NULL, 74);
INSERT INTO `hremployees` VALUES (55, 'me_blackhole', '2013-06-16 07:41:38', NULL, NULL, '', NULL, NULL, 'thanhtranblackhole@gmail.com', 0, NULL, NULL, NULL, 75);
INSERT INTO `hremployees` VALUES (56, 'online10h', '2013-06-16 09:26:03', NULL, NULL, '', '0', NULL, 'connect.online10h@gmail.com', 1, '1991-06-11', '<br>', NULL, 77);
INSERT INTO `hremployees` VALUES (57, 'Hoang Nguyen', '2013-06-16 11:05:59', NULL, NULL, '', NULL, NULL, 'hoangxuchon@gmail.com', 1, NULL, NULL, NULL, 79);
INSERT INTO `hremployees` VALUES (58, 'thanhthanh', '2013-06-16 17:06:00', NULL, NULL, '', NULL, NULL, 'thanhthanh2013_ss@yahoo.com', 0, NULL, NULL, NULL, 80);
INSERT INTO `hremployees` VALUES (59, 'kelanhlung', '2013-06-16 17:06:34', NULL, NULL, '', '984997156', NULL, 'kelanhlung2489@gmail.com', 1, '1989-11-24', 'Hưng Đạo-Đông Triều-Quảng Ninh', NULL, 81);
INSERT INTO `hremployees` VALUES (60, 'cloan79', '2013-06-16 17:11:38', NULL, NULL, '', NULL, NULL, 'tranthichauloan@gmail.com', 0, NULL, NULL, NULL, 82);
INSERT INTO `hremployees` VALUES (61, 'hahoang1', '2013-06-16 19:35:57', NULL, NULL, '', NULL, NULL, 'jbminhhoang@gmail.com', 1, NULL, NULL, NULL, 83);
INSERT INTO `hremployees` VALUES (62, 'quoc hung', '2013-06-16 19:45:30', NULL, NULL, '', NULL, NULL, 'quoc_hung6868@yahoo.com', 1, NULL, NULL, NULL, 84);
INSERT INTO `hremployees` VALUES (63, 'tranduc', '2013-06-16 20:17:02', NULL, NULL, '', NULL, NULL, 'tranduc2187@gmail.com', 1, NULL, NULL, NULL, 85);
INSERT INTO `hremployees` VALUES (64, 'huycan79', '2013-06-16 20:47:04', NULL, NULL, '', NULL, NULL, 'huycan79@yahoo.vn', 1, NULL, NULL, NULL, 86);
INSERT INTO `hremployees` VALUES (65, 'nana8189', '2013-06-16 23:22:57', NULL, NULL, '', NULL, NULL, 'thunga8189@gmail.com', 0, NULL, NULL, NULL, 87);
INSERT INTO `hremployees` VALUES (66, 'lqdinhdn', '2013-06-17 14:24:35', NULL, NULL, '', NULL, NULL, 'lqdinhdn@gmail.com', 1, NULL, NULL, NULL, 90);
INSERT INTO `hremployees` VALUES (67, 'saobang1210', '2013-06-17 15:06:52', NULL, NULL, '', NULL, NULL, 'kimyen020@gmail.com', 0, NULL, NULL, NULL, 91);
INSERT INTO `hremployees` VALUES (68, 'ngocvyktv', '2013-06-17 16:30:06', NULL, NULL, '', NULL, NULL, 'ngocvyktv@gmail.com', 1, NULL, NULL, NULL, 92);
INSERT INTO `hremployees` VALUES (69, 'vankt78', '2013-06-17 17:00:37', NULL, NULL, '', NULL, NULL, 'vankt78@yahoo.com.vn', 0, NULL, NULL, NULL, 93);
INSERT INTO `hremployees` VALUES (70, 'lackyb0y2013', '2013-06-17 19:47:03', NULL, NULL, '', NULL, NULL, 'lackyb0y2013@yahoo.com.vn', 1, NULL, NULL, NULL, 94);
INSERT INTO `hremployees` VALUES (71, 'ltphanvl', '2013-06-18 09:42:39', NULL, NULL, '', NULL, NULL, 'ltphanvl@gmail.com', 1, NULL, NULL, NULL, 95);
INSERT INTO `hremployees` VALUES (72, 'THAINGUYEN85', '2013-06-18 12:59:34', NULL, NULL, '', NULL, NULL, 'thainguyen8085@gmail.com', 0, NULL, NULL, NULL, 96);
INSERT INTO `hremployees` VALUES (73, 'nina', '2013-06-18 15:30:56', NULL, NULL, '', NULL, NULL, 'ntht199@gmail.com', 0, NULL, NULL, NULL, 97);
INSERT INTO `hremployees` VALUES (74, 'HIEUNGHIA', '2013-06-18 16:59:09', NULL, NULL, '', '1268091128', NULL, 'tuyetnhibt85@yahoo.com', 0, '1985-03-23', 'BINH THUAN TAN THANH GIONG TROM BEN TRE<div><br></div>', NULL, 98);
INSERT INTO `hremployees` VALUES (75, 'kimchi12', '2013-06-18 17:10:09', NULL, NULL, '', NULL, NULL, 'kimchi413@gmail.com', 1, NULL, NULL, NULL, 99);
INSERT INTO `hremployees` VALUES (76, 'huyvu12', '2013-06-18 17:14:12', NULL, NULL, '', NULL, NULL, 'kyniemaotrang_qt2007@yahoo.com', 0, NULL, NULL, NULL, 100);
INSERT INTO `hremployees` VALUES (77, 'daonhi', '2013-06-18 17:45:49', NULL, NULL, '', NULL, NULL, 'nguyendung1512@gmail.com', 1, NULL, NULL, NULL, 101);
INSERT INTO `hremployees` VALUES (78, 'congthanh', '2013-06-18 17:46:29', NULL, NULL, '', NULL, NULL, 'lanle238@yahoo.com', 1, NULL, NULL, NULL, 102);
INSERT INTO `hremployees` VALUES (79, 'chugiatuan', '2013-06-18 18:48:59', NULL, NULL, '', NULL, NULL, 'chugiatuan@gmail.com', 1, NULL, NULL, NULL, 103);
INSERT INTO `hremployees` VALUES (80, 'laogiatuyen', '2013-06-18 20:19:10', NULL, NULL, '', NULL, NULL, 'laogiatuyen@yahoo.com.vn', 1, NULL, NULL, NULL, 104);
INSERT INTO `hremployees` VALUES (81, 'kuboy', '2013-06-18 23:46:39', NULL, NULL, '', NULL, NULL, 'kuboy_lanhlung_9x@yahoo.com', 1, NULL, NULL, NULL, 105);
INSERT INTO `hremployees` VALUES (82, 'phuchoai1990', '2013-06-19 10:08:34', NULL, NULL, '', NULL, NULL, 'phuchoai1990@yahoo.com.vn', 1, NULL, NULL, NULL, 106);
INSERT INTO `hremployees` VALUES (83, 'bonmat1405', '2013-06-19 12:16:39', NULL, NULL, '', NULL, NULL, 'vy14051992@gmail.com', 0, NULL, NULL, NULL, 107);
INSERT INTO `hremployees` VALUES (84, 'tanvanloi', '2013-06-19 16:05:56', NULL, NULL, '', NULL, NULL, 'tanvanloi82@yahoo.com.vn', 1, NULL, NULL, NULL, 108);
INSERT INTO `hremployees` VALUES (85, 'kimchi8', '2013-06-20 08:13:26', NULL, NULL, '', NULL, NULL, 'nguyendung8928@yahoo.com', 0, NULL, NULL, NULL, 109);
INSERT INTO `hremployees` VALUES (86, '2583062', '2013-06-20 08:46:38', NULL, NULL, '', NULL, NULL, 'phunganh170883@yahoo.com', 0, NULL, NULL, NULL, 110);
INSERT INTO `hremployees` VALUES (87, 'yoyo', '2013-06-21 09:59:33', NULL, NULL, '', NULL, NULL, 'thuyquan02@gmail.com', 0, NULL, NULL, NULL, 111);
INSERT INTO `hremployees` VALUES (88, 'meoxinh_182', '2013-06-21 11:39:08', NULL, NULL, '', NULL, NULL, 'huongkt.182@gmail.com', 0, NULL, NULL, NULL, 112);
INSERT INTO `hremployees` VALUES (89, 'ngoclan08099', '2013-06-21 23:50:21', NULL, NULL, '', NULL, NULL, 'nguyenngoclann@gmail.com', 0, NULL, NULL, NULL, 113);
INSERT INTO `hremployees` VALUES (90, 'Hồng Trúc', '2013-06-22 11:27:53', NULL, NULL, '', NULL, NULL, 'hongtruc.tourist@yahoo.com', 0, NULL, NULL, NULL, 114);
INSERT INTO `hremployees` VALUES (91, '1234', '2013-06-24 02:03:55', NULL, NULL, '', '675567567', NULL, 'htkycong112@gmail.com', 1, '1990-04-01', '', NULL, 116);
INSERT INTO `hremployees` VALUES (92, 'yunaduong', '2013-06-24 08:16:59', NULL, NULL, '', NULL, NULL, 'phuongtrang10291@gmail.com', 0, '1991-10-02', NULL, NULL, 117);
INSERT INTO `hremployees` VALUES (93, 'adsvn2010', '2013-06-24 22:11:53', NULL, NULL, '', NULL, NULL, 'adsvn2010@yahoo.com', 1, NULL, NULL, NULL, 118);
INSERT INTO `hremployees` VALUES (94, 'Rafael', '2013-06-25 09:21:36', NULL, NULL, '', NULL, NULL, 'constantinz87@yahoo.com', 1, NULL, NULL, NULL, 119);
INSERT INTO `hremployees` VALUES (95, 'martin85nhan', '2013-06-25 15:05:05', NULL, NULL, '', NULL, NULL, 'vannhanvietnam@gmail.com', 1, NULL, NULL, NULL, 120);
INSERT INTO `hremployees` VALUES (96, 'abc090', '2013-06-25 16:19:33', NULL, NULL, '', NULL, NULL, 'hosinhan2007@gmail.com', 1, NULL, NULL, NULL, 121);
INSERT INTO `hremployees` VALUES (97, 'tinolinh', '2013-06-25 20:35:39', NULL, NULL, '', NULL, NULL, 'lunkut3_junhox@yahoo.com', 0, NULL, NULL, NULL, 122);
INSERT INTO `hremployees` VALUES (98, 'huuphuc27', '2013-06-25 22:27:25', NULL, NULL, '', NULL, NULL, 'tranhuuphuc27@gmail.com', 1, NULL, NULL, NULL, 123);
INSERT INTO `hremployees` VALUES (99, 'dvtin002', '2013-06-25 22:57:00', NULL, NULL, '', NULL, NULL, 'dvdangtin003@gmail.com', 1, NULL, NULL, NULL, 124);
INSERT INTO `hremployees` VALUES (100, 'minhnguyen', '2013-06-26 09:15:34', NULL, NULL, '', NULL, NULL, 'minhnguyensisio@gmail.com', 1, NULL, NULL, NULL, 125);
INSERT INTO `hremployees` VALUES (101, 'huynhdaihai', '2013-06-26 13:30:09', NULL, NULL, '', '0', NULL, 'huynhdaihai04@yahoo.com', 1, '1970-01-01', NULL, NULL, 126);
INSERT INTO `hremployees` VALUES (102, 'nct_tv', '2013-06-27 20:00:28', NULL, NULL, '', NULL, NULL, 'nct@yahoo.com.vn', 1, NULL, NULL, NULL, 127);
INSERT INTO `hremployees` VALUES (103, 'pink100311', '2013-06-26 16:53:38', NULL, NULL, '', NULL, NULL, 'phucquang14@yahoo.com', 1, NULL, NULL, NULL, 128);
INSERT INTO `hremployees` VALUES (104, 'pagethu', '2013-06-26 14:27:28', NULL, NULL, '', NULL, NULL, 'trangptt112@gmail.com', 0, NULL, NULL, NULL, 129);
INSERT INTO `hremployees` VALUES (105, 'soccon0903', '2013-06-26 16:29:12', NULL, NULL, '', NULL, NULL, 'thienduong.045@gmail.com', 0, NULL, NULL, NULL, 131);
INSERT INTO `hremployees` VALUES (106, 'namfxpro', '2013-06-26 20:10:30', NULL, NULL, '', NULL, NULL, 'namfxpro@gmail.com', 1, NULL, NULL, NULL, 132);
INSERT INTO `hremployees` VALUES (107, 'thuthuype', '2013-06-26 21:04:49', NULL, NULL, '', NULL, NULL, 'thuyhoang722@gmail.com', 0, NULL, NULL, NULL, 133);
INSERT INTO `hremployees` VALUES (108, 'lehonghoa', '2013-06-26 21:41:57', NULL, NULL, '', NULL, NULL, 'lehonghoa1988@yahoo.com.vn', 1, NULL, NULL, NULL, 134);
INSERT INTO `hremployees` VALUES (109, 'huynh992006', '2013-06-26 21:42:31', NULL, NULL, '', NULL, NULL, 'huynh992006@gmail.com', 1, NULL, NULL, NULL, 135);
INSERT INTO `hremployees` VALUES (110, 'sang_galu', '2013-06-26 23:20:54', NULL, NULL, '', NULL, NULL, 'sang_galu@yahoo.com', 1, '1989-01-01', NULL, NULL, 136);
INSERT INTO `hremployees` VALUES (111, 'peliti', '2013-06-26 23:31:28', NULL, NULL, '', NULL, NULL, 'hieunguyengro@gmail.com', 1, NULL, NULL, NULL, 137);
INSERT INTO `hremployees` VALUES (112, 'zackypv', '2013-06-26 23:47:23', NULL, NULL, '', NULL, NULL, 'thanhphonangvang@gmail.com', 1, NULL, NULL, NULL, 138);
INSERT INTO `hremployees` VALUES (113, 'hoakimke10', '2013-06-27 00:39:38', NULL, NULL, '', '1283619800', NULL, 'thuongmaicophan@gmail.com', 1, '1992-02-06', NULL, NULL, 139);
INSERT INTO `hremployees` VALUES (114, 'diemvt', '2013-06-27 10:57:42', NULL, NULL, '', NULL, NULL, 'diemtran1210@gmail.com', 0, NULL, NULL, NULL, 140);
INSERT INTO `hremployees` VALUES (115, 'minhhv', '2013-06-27 11:47:26', NULL, NULL, '', NULL, NULL, 'minhhv300188@gmail.com', 1, NULL, NULL, NULL, 141);
INSERT INTO `hremployees` VALUES (116, 'wishwaswind', '2013-06-27 12:28:37', NULL, NULL, '', NULL, NULL, 'wishwaswind@gmail.com', 0, NULL, NULL, NULL, 142);
INSERT INTO `hremployees` VALUES (117, 'lienle288', '2013-06-27 14:37:14', NULL, NULL, '', NULL, NULL, 'lelien3789@yahoo.com', 0, NULL, NULL, NULL, 144);
INSERT INTO `hremployees` VALUES (118, 'donutchambi', '2013-06-27 15:16:09', NULL, NULL, '', NULL, NULL, 'vominhthu_1101@yahoo.com', 0, '1990-11-01', NULL, NULL, 145);
INSERT INTO `hremployees` VALUES (119, 'thanhphong2710', '2013-06-27 15:23:21', NULL, NULL, '', NULL, NULL, 'thanhphongdesign.tk@gmail.com', 1, NULL, NULL, NULL, 146);
INSERT INTO `hremployees` VALUES (120, 'bobobibi', '2013-06-27 15:47:29', NULL, NULL, '', NULL, NULL, 'thanhthuy.291@gmail.com', 0, NULL, NULL, NULL, 147);
INSERT INTO `hremployees` VALUES (121, 'phanletam', '2013-06-27 15:49:56', NULL, NULL, '', NULL, NULL, 'phanhoangthienbao@gmail.com', 1, NULL, NULL, NULL, 148);
INSERT INTO `hremployees` VALUES (122, 'nvhuu_1210', '2013-06-27 15:58:16', NULL, NULL, '', NULL, NULL, 'nvhuu1210@yahoo.com.vn', 1, NULL, NULL, NULL, 149);
INSERT INTO `hremployees` VALUES (123, 'tduong90', '2013-06-27 16:36:10', NULL, NULL, '', NULL, NULL, 'theduong90@gmail.com', 1, NULL, NULL, NULL, 150);
INSERT INTO `hremployees` VALUES (124, 'hieusancher', '2013-06-27 19:40:16', NULL, NULL, '', NULL, NULL, 'hieusancher11@yahoo.com', 1, NULL, NULL, NULL, 151);
INSERT INTO `hremployees` VALUES (125, 'gauhuybebong', '2013-06-27 20:54:30', NULL, NULL, '', NULL, NULL, 'gauhuybebong@gmail.com', 1, NULL, NULL, NULL, 153);
INSERT INTO `hremployees` VALUES (126, 'linhmtk8', '2013-06-27 21:38:13', NULL, NULL, '', '989436333', NULL, 'linhmtk8@gmail.com', 0, '1992-05-11', '<br>', NULL, 154);
INSERT INTO `hremployees` VALUES (127, 'ThuyNgan', '2013-06-27 21:40:36', NULL, NULL, '', NULL, NULL, 'thuyngan_tgt92@yahoo.com', 0, NULL, NULL, NULL, 155);
INSERT INTO `hremployees` VALUES (128, 'Thúy Ngân', '2013-06-27 21:51:36', NULL, NULL, '', NULL, NULL, 'boconganh1792@gmail.com', 0, NULL, NULL, NULL, 156);
INSERT INTO `hremployees` VALUES (129, 'bichyen12', '2013-06-27 22:04:00', NULL, NULL, '', NULL, NULL, 'zjn_ngok@yahoo.com', 0, NULL, NULL, NULL, 157);
INSERT INTO `hremployees` VALUES (130, 'rua234', '2013-06-27 22:06:15', NULL, NULL, '', NULL, NULL, 'quaybanhthanhpho_timnguoiyeutoi@yahoo.com', 0, NULL, NULL, NULL, 158);
INSERT INTO `hremployees` VALUES (131, 'Hà Oanh', '2013-06-27 23:17:44', NULL, NULL, '', NULL, NULL, 'Ha_oanh_nnt@yahoo.com', 0, NULL, NULL, NULL, 160);
INSERT INTO `hremployees` VALUES (132, 'lamngoc', '2013-06-28 00:54:45', NULL, NULL, '', NULL, NULL, 'lamngoc.m2a@gmail.com', 0, NULL, NULL, NULL, 161);
INSERT INTO `hremployees` VALUES (133, 'dangtienht', '2013-06-30 11:02:56', NULL, NULL, '', NULL, NULL, 'phandangtienht@gmail.com', 1, NULL, NULL, NULL, 162);
INSERT INTO `hremployees` VALUES (134, 'khoinghiep56', '2013-06-28 18:14:28', NULL, NULL, '', '1674049067', NULL, 'conggiaobk@gmail.com', 1, '1990-05-06', 'Từ Liêm - Hà Nội', NULL, 163);
INSERT INTO `hremployees` VALUES (135, 'namduongqnvn', '2013-06-28 20:34:12', NULL, NULL, '', NULL, NULL, 'ngongiohoang@gmail.com', 1, NULL, NULL, NULL, 164);
INSERT INTO `hremployees` VALUES (136, 'cuongpg91', '2013-06-28 22:00:23', NULL, NULL, '', NULL, NULL, 'cuongpg91@gmail.com', 1, NULL, NULL, NULL, 165);
INSERT INTO `hremployees` VALUES (137, 'thanhmai9875', '2013-06-28 22:56:04', NULL, NULL, '', NULL, NULL, 'thanhmai9875@yahoo.com.vn', 0, NULL, NULL, NULL, 166);
INSERT INTO `hremployees` VALUES (138, 'Vuacodon', '2013-06-29 00:19:53', NULL, NULL, '', NULL, NULL, 'phuonganh.bhld@gmail.com', 1, NULL, NULL, NULL, 167);
INSERT INTO `hremployees` VALUES (139, 'boy93', '2013-06-29 08:46:14', NULL, NULL, '', NULL, NULL, 'daiduong_1993@ymail.com', 1, NULL, NULL, NULL, 168);
INSERT INTO `hremployees` VALUES (140, 'ntrinh2626', '2013-06-29 09:09:27', NULL, NULL, '', NULL, NULL, 'ntrinh2626@gmail.com', 0, NULL, NULL, NULL, 169);
INSERT INTO `hremployees` VALUES (141, 'thutrang1231', '2013-06-29 14:32:25', NULL, NULL, '', NULL, NULL, 'huongngoclan.0x0x0@gmail.com', 0, NULL, NULL, NULL, 170);
INSERT INTO `hremployees` VALUES (142, 'trang1234', '2013-06-29 14:40:31', NULL, NULL, '', NULL, NULL, 'phuongnvp2@gmail.com', 1, NULL, NULL, NULL, 171);
INSERT INTO `hremployees` VALUES (143, 'phoenixkhai', '2013-06-29 15:06:50', NULL, NULL, '', NULL, NULL, 'daphongthuy01@gmail.com', 1, NULL, NULL, NULL, 172);
INSERT INTO `hremployees` VALUES (144, 'hoamo0911', '2013-06-29 20:01:52', NULL, NULL, '', '1682095642', NULL, 'nhoanh13_4@yahoo.com', 0, '1987-09-01', 'tay ninh<br>', NULL, 173);
INSERT INTO `hremployees` VALUES (145, 'ptdung', '2013-06-29 22:15:47', NULL, NULL, '', NULL, NULL, 'dungp213@gmail.com', 0, NULL, NULL, NULL, 174);
INSERT INTO `hremployees` VALUES (146, 'raovatsnew13', '2013-06-29 23:29:50', NULL, NULL, '', NULL, NULL, 'tungchinhus@gmail.com', 1, NULL, NULL, NULL, 175);
INSERT INTO `hremployees` VALUES (147, 'raovattsnew', '2013-06-29 23:55:51', NULL, NULL, '', NULL, NULL, 'tungchinhus2011@yahoo.com', 1, NULL, NULL, NULL, 176);
INSERT INTO `hremployees` VALUES (148, 'boysitinh', '2013-06-30 20:44:26', NULL, NULL, '', NULL, NULL, 'thelight.phan@gmail.com', 1, NULL, NULL, NULL, 177);
INSERT INTO `hremployees` VALUES (149, 'tuananhpy92', '2013-06-30 17:41:02', NULL, NULL, '', NULL, NULL, 'VTANTMK@gmail.com', 1, NULL, NULL, NULL, 178);
INSERT INTO `hremployees` VALUES (150, 'thanhtuyet', '2013-06-30 22:31:49', NULL, NULL, '', NULL, NULL, 'nttuyet1970@gmail.com', 0, '1970-01-01', NULL, NULL, 179);
INSERT INTO `hremployees` VALUES (151, 'ThaoPanda', '2013-06-30 22:33:33', NULL, NULL, '', NULL, NULL, 'nguyenngoctuanthao@gmail.com', 0, NULL, NULL, NULL, 180);
INSERT INTO `hremployees` VALUES (152, 'Phạm Hồng', '2013-06-30 22:54:30', NULL, NULL, '', NULL, NULL, 'kiss_the_rain_0507@yahoo.com', 0, NULL, NULL, NULL, 181);
INSERT INTO `hremployees` VALUES (153, 'sangkool', '2013-07-01 09:06:46', NULL, NULL, '', NULL, NULL, 'boy_kool_shock@yahoo.com', 1, NULL, NULL, NULL, 182);
INSERT INTO `hremployees` VALUES (154, 'ngoisaodem_5311', '2013-07-01 10:00:54', NULL, NULL, '', NULL, NULL, 'ngoisaodem_5311@yahoo.com', 0, NULL, NULL, NULL, 183);
INSERT INTO `hremployees` VALUES (155, 'kyodark93', '2013-07-01 10:28:43', NULL, NULL, '', NULL, NULL, 'kyodark93@gmail.com', 1, NULL, NULL, NULL, 184);
INSERT INTO `hremployees` VALUES (156, 'poonlove93', '2013-07-01 10:30:14', NULL, NULL, '', NULL, NULL, 'poonlove93@gmail.com', 0, NULL, NULL, NULL, 185);
INSERT INTO `hremployees` VALUES (157, 'antg1805', '2013-07-01 11:03:16', NULL, NULL, '', '909085211', NULL, 'antg1805@yahoo.com', 1, NULL, NULL, NULL, 186);
INSERT INTO `hremployees` VALUES (158, 'quoc khanh', '2013-07-01 11:12:59', NULL, NULL, '', NULL, NULL, 'quockhanh2011@ymail.com', 1, NULL, NULL, NULL, 187);
INSERT INTO `hremployees` VALUES (159, 'lanhhoa.btxh', '2013-07-01 11:17:29', NULL, NULL, '', NULL, NULL, 'lanhhoa.btxh@gmail.com', 0, NULL, NULL, NULL, 188);
INSERT INTO `hremployees` VALUES (160, 'caubengok', '2013-07-01 11:34:52', NULL, NULL, '', NULL, NULL, 'caubengok@gmail.com', 1, NULL, NULL, NULL, 189);
INSERT INTO `hremployees` VALUES (161, 'trangdo', '2013-07-01 12:44:22', NULL, NULL, '', NULL, NULL, 'dotrang101989@gmail.com', 0, NULL, NULL, NULL, 190);
INSERT INTO `hremployees` VALUES (162, 'xuanquoc1992', '2013-07-01 13:28:52', NULL, NULL, '', NULL, NULL, 'xuanquoc1992@gmail.com', 1, NULL, NULL, NULL, 191);
INSERT INTO `hremployees` VALUES (163, 'ducthe', '2013-07-01 13:39:45', NULL, NULL, '', NULL, NULL, 'the.nguyen120583@gmail.com', 1, NULL, NULL, NULL, 192);
INSERT INTO `hremployees` VALUES (164, 'Hung200490', '2013-07-01 13:57:44', NULL, NULL, '', NULL, NULL, 'daihung200490@gmail.com', 1, NULL, NULL, NULL, 193);
INSERT INTO `hremployees` VALUES (165, 'huongyeu1989', '2013-07-01 14:31:10', NULL, NULL, '', NULL, NULL, 'lengocanh201@gmail.com', 1, NULL, NULL, NULL, 194);
INSERT INTO `hremployees` VALUES (166, 'kianh_pro', '2013-07-01 14:39:16', NULL, NULL, '', '93608807', NULL, 'hoangnhatphuong@gmail.com', 1, '1970-01-01', '98/961b nguyen kiem phuong 3 quan go vap tp ho chi minh', NULL, 195);
INSERT INTO `hremployees` VALUES (167, 'newlucky', '2013-07-01 15:27:18', NULL, NULL, '', NULL, NULL, 'sandcrab.tnt@gmail.com', 1, NULL, NULL, NULL, 196);
INSERT INTO `hremployees` VALUES (168, 'nguyen viet', '2013-07-01 15:29:27', NULL, NULL, '', NULL, NULL, 'uglyduckljng@gmail.com', 1, NULL, NULL, NULL, 197);
INSERT INTO `hremployees` VALUES (169, 'huunghiacdth', '2013-07-01 15:37:05', NULL, NULL, '', NULL, NULL, 'huunghiacdth@gmail.com', 1, NULL, NULL, NULL, 198);
INSERT INTO `hremployees` VALUES (170, 'kimanh.duylinh@gmail.com', '2013-07-01 15:58:10', NULL, NULL, '', NULL, NULL, 'kimanh.duylinh@gmail.com', 0, NULL, NULL, NULL, 199);
INSERT INTO `hremployees` VALUES (171, 'minhdangcopier', '2013-07-01 16:04:57', NULL, NULL, '', NULL, NULL, 'minhdangcopier@yahoo.com', 1, NULL, NULL, NULL, 200);
INSERT INTO `hremployees` VALUES (172, 'MyTruong', '2013-07-01 16:25:32', NULL, NULL, '', NULL, NULL, 'my92vn@gmail.com', 0, NULL, NULL, NULL, 201);
INSERT INTO `hremployees` VALUES (173, 'hoangkylam_18', '2013-07-01 18:38:13', NULL, NULL, '', NULL, NULL, 'trung12312@gmail.com', 1, NULL, NULL, NULL, 202);
INSERT INTO `hremployees` VALUES (174, 'anhquoc121077', '2013-07-01 22:48:20', NULL, NULL, '', '933418415', NULL, 'anhquoc121077@yahoo.com.vn', 1, '1977-12-10', NULL, NULL, 204);
INSERT INTO `hremployees` VALUES (175, 'sell_reputation', '2013-07-02 00:10:22', NULL, NULL, '', NULL, NULL, 'nacangmin@yahoo.com', 1, NULL, NULL, NULL, 205);
INSERT INTO `hremployees` VALUES (176, 'adamvt3', '2013-07-02 10:10:46', NULL, NULL, '', NULL, NULL, 'adamvt92@gmail.com', 1, NULL, NULL, NULL, 206);
INSERT INTO `hremployees` VALUES (177, 'ngnhung90', '2013-07-02 11:14:40', NULL, NULL, '', NULL, NULL, 'ngnhung90@gmail.com', 0, NULL, NULL, NULL, 207);
INSERT INTO `hremployees` VALUES (178, 'ny.0811', '2013-07-02 13:32:34', NULL, NULL, '', NULL, NULL, 'ny.0811@yahoo.com', 0, NULL, NULL, NULL, 208);
INSERT INTO `hremployees` VALUES (179, 'slowlyturtle', '2013-07-02 14:27:36', NULL, NULL, '', NULL, NULL, 'binh.banhtranquoc@gmail.com', 1, '1970-01-01', NULL, NULL, 209);
INSERT INTO `hremployees` VALUES (180, 'iujtinhyeu11', '2013-07-02 14:59:15', NULL, NULL, '', NULL, NULL, 'trannhatkiet2012@gmail.com', 1, NULL, NULL, NULL, 210);
INSERT INTO `hremployees` VALUES (181, 'tran.po', '2013-07-02 20:38:01', NULL, NULL, '', NULL, NULL, 'nguyenngochuyentran68@gmail.com', 0, NULL, NULL, NULL, 211);
INSERT INTO `hremployees` VALUES (182, 'R0x0r', '2013-07-02 22:01:30', NULL, NULL, '', NULL, NULL, 'tuananhtran2911@gmail.com', 1, NULL, NULL, NULL, 212);
INSERT INTO `hremployees` VALUES (183, 'kubomkho', '2013-07-03 17:48:03', NULL, NULL, '', NULL, NULL, 'tuantronghoang@yahoo.com.vn', 1, '1992-10-12', NULL, NULL, 213);
INSERT INTO `hremployees` VALUES (184, 'Su_boutique1809', '2013-07-04 01:00:30', NULL, NULL, '', NULL, NULL, 'Nhok.alone93@yahoo.com', 0, NULL, NULL, NULL, 214);
INSERT INTO `hremployees` VALUES (185, 'ic1133', '2013-07-04 09:07:19', NULL, NULL, '', NULL, NULL, 'vithan_love2215@yahoo.com', 1, NULL, NULL, NULL, 215);
INSERT INTO `hremployees` VALUES (186, 'leenguyen9', '2013-07-04 13:38:08', NULL, NULL, '', NULL, NULL, 'nguoidaukho_001@yahoo.com', 1, NULL, NULL, NULL, 216);
INSERT INTO `hremployees` VALUES (187, 'thanhphong0608', '2013-07-04 14:32:09', NULL, NULL, '', NULL, NULL, 'onlinethanhphong@gmail.com', 1, NULL, NULL, NULL, 217);
INSERT INTO `hremployees` VALUES (188, 'THOA', '2013-07-04 15:22:49', NULL, NULL, '', NULL, NULL, 'vanthimythoa@gmail.com', 0, NULL, NULL, NULL, 218);
INSERT INTO `hremployees` VALUES (189, 'Vũ Ngọc Ly', '2013-07-04 17:56:20', NULL, NULL, '', NULL, NULL, 'ly.toet1997@gmail.com', 0, NULL, NULL, NULL, 219);
INSERT INTO `hremployees` VALUES (190, 'Jamboo', '2013-07-04 19:33:37', NULL, NULL, '', NULL, NULL, 'dongduongdesign1610@gmail.com', 1, NULL, NULL, NULL, 220);
INSERT INTO `hremployees` VALUES (191, 'tao tay', '2013-07-04 22:13:07', NULL, NULL, '', NULL, NULL, 'ngocanh.hana@gmail.com', 0, NULL, NULL, NULL, 221);
INSERT INTO `hremployees` VALUES (192, 'e0651', '2013-07-04 23:16:57', NULL, NULL, '', NULL, NULL, 'thanhphongbanh@gmail.com', 1, NULL, NULL, NULL, 222);
INSERT INTO `hremployees` VALUES (193, 'vantoandakmil2006', '2013-07-05 07:15:13', NULL, NULL, '', NULL, NULL, 'vantoandakmil2006@gmail.com', 1, NULL, NULL, NULL, 223);
INSERT INTO `hremployees` VALUES (194, 'vinh19121991', '2013-07-05 10:10:26', NULL, NULL, '', NULL, NULL, 'vinh19121991@gmail.com', 1, NULL, NULL, NULL, 224);
INSERT INTO `hremployees` VALUES (195, 'buihien', '2013-07-05 14:59:31', NULL, NULL, '', '0', NULL, 'buihiendongson@gmail.com', 0, '1971-03-01', NULL, NULL, 225);
INSERT INTO `hremployees` VALUES (196, 'builieuviet', '2013-07-05 17:51:39', NULL, NULL, '', NULL, NULL, 'builieuviet@gmail.com', 0, NULL, NULL, NULL, 226);
INSERT INTO `hremployees` VALUES (197, 'khanhnguyen7291', '2013-07-05 19:09:18', NULL, NULL, '', NULL, NULL, 'oximen72@yahoo.com', 1, NULL, NULL, NULL, 227);
INSERT INTO `hremployees` VALUES (198, 'Manh Cuong', '2013-07-05 22:57:50', NULL, NULL, '', NULL, NULL, 'nguoiviethaohoa@gmail.com', 1, NULL, NULL, NULL, 228);
INSERT INTO `hremployees` VALUES (199, 'soimeo', '2013-07-06 08:27:22', NULL, NULL, '', NULL, NULL, 'soimeo@gmail.com', 0, NULL, NULL, NULL, 229);
INSERT INTO `hremployees` VALUES (200, 'homiki', '2013-07-06 09:09:05', NULL, NULL, '', NULL, NULL, 'minhhoang1711@gmail.com', 1, NULL, NULL, NULL, 230);
INSERT INTO `hremployees` VALUES (201, 'ngoctu1971', '2013-07-06 10:36:23', NULL, NULL, '', NULL, NULL, 'ngoctu1971@gmai.com', 1, NULL, NULL, NULL, 231);
INSERT INTO `hremployees` VALUES (202, 'nganchi', '2013-07-06 11:23:11', NULL, NULL, '', NULL, NULL, 'nganchidt1234@gmail.com', 0, NULL, NULL, NULL, 232);
INSERT INTO `hremployees` VALUES (203, 'chinhkrb', '2013-07-06 12:27:51', NULL, NULL, '', NULL, NULL, 'vietchinh1212@gmail.com', 1, NULL, NULL, NULL, 233);
INSERT INTO `hremployees` VALUES (204, 'quangcao_raovat1724', '2013-07-06 17:11:36', NULL, NULL, '', NULL, NULL, 'email.dungchoquangcao@gmail.com', 1, NULL, NULL, NULL, 234);
INSERT INTO `hremployees` VALUES (205, 'C4eqtv', '2013-07-06 19:12:35', NULL, NULL, '', NULL, NULL, 'quadcore84@gmail.com', 1, NULL, NULL, NULL, 235);
INSERT INTO `hremployees` VALUES (206, 'tranprotex', '2013-07-06 19:51:26', NULL, NULL, '', NULL, NULL, '3tprolo@gmail.com', 1, NULL, NULL, NULL, 236);
INSERT INTO `hremployees` VALUES (207, 'thailexuan', '2013-07-07 08:59:21', NULL, NULL, '', NULL, NULL, 'lexun.msmart@gmail.com', 0, NULL, NULL, NULL, 237);
INSERT INTO `hremployees` VALUES (208, 'khoan09', '2013-07-07 10:33:57', NULL, NULL, '', NULL, NULL, 'khoan7054@gmail.com', 0, '1970-01-01', NULL, NULL, 239);
INSERT INTO `hremployees` VALUES (209, 'giangvuha', '2013-07-07 15:49:54', NULL, NULL, '', NULL, NULL, 'vuha.giang2102@gmail.com', 0, NULL, NULL, NULL, 240);
INSERT INTO `hremployees` VALUES (210, 'Thanh Huong', '2013-07-07 21:25:23', NULL, NULL, '', NULL, NULL, 'phamthanhhuong1102@gmail.com', 1, NULL, NULL, NULL, 243);
INSERT INTO `hremployees` VALUES (211, 'Jenlovely1102', '2013-07-07 22:10:20', NULL, NULL, '', NULL, NULL, 'lanha9891@yahoo.com', 0, NULL, NULL, NULL, 244);
INSERT INTO `hremployees` VALUES (212, 'tieudungmuadong', '2013-07-08 09:35:05', NULL, NULL, '', NULL, NULL, 'nagaseo.ads@gmail.com', 1, NULL, NULL, NULL, 245);
INSERT INTO `hremployees` VALUES (213, 'joker468', '2013-07-08 10:24:05', NULL, NULL, '', NULL, NULL, 'godfather39mk@gmail.com', 1, NULL, NULL, NULL, 246);
INSERT INTO `hremployees` VALUES (214, 'thienca_tnt333', '2013-07-08 10:29:03', NULL, NULL, '', NULL, NULL, 'thienca_tnt333@yahoo.com', 0, NULL, NULL, NULL, 247);
INSERT INTO `hremployees` VALUES (215, '2616ca02', '2013-07-08 11:43:02', NULL, NULL, '', NULL, NULL, '2616ca02@gmail.com', 0, NULL, NULL, NULL, 248);
INSERT INTO `hremployees` VALUES (216, 'yenheo12', '2013-07-08 22:42:09', NULL, NULL, '', NULL, NULL, 'heo.ngok12@yahoo.com', 0, NULL, NULL, NULL, 250);
INSERT INTO `hremployees` VALUES (217, 'minhtrang', '2013-07-09 00:29:41', NULL, NULL, '', NULL, NULL, 'minhtrang.ufm@gmail.com', 0, NULL, NULL, NULL, 251);
INSERT INTO `hremployees` VALUES (218, 'ducanh1010', '2013-07-09 12:37:43', NULL, NULL, '', NULL, NULL, 'nguyenbaduc1992@gmail.com', 1, NULL, NULL, NULL, 252);
INSERT INTO `hremployees` VALUES (219, 'thanhthangvn', '2013-07-09 12:48:26', NULL, NULL, '', '987333585', NULL, 'vantaithanhthangvn@gmail.com', 1, '1970-01-01', '6/23/4a đường 10 khu phố 2 phường hiệp bình phước thủ đức tp hcm', NULL, 253);
INSERT INTO `hremployees` VALUES (220, 'meoheo65', '2013-07-09 13:34:11', NULL, NULL, '', NULL, NULL, 'meoheo65@yahoo.com.vn', 0, NULL, NULL, NULL, 254);
INSERT INTO `hremployees` VALUES (221, 'luongquy', '2013-07-09 13:52:43', NULL, NULL, '', NULL, NULL, 'luongquy1982@gmail.com', 1, NULL, NULL, NULL, 255);
INSERT INTO `hremployees` VALUES (222, 'doreas', '2013-07-09 17:13:25', NULL, NULL, '', NULL, NULL, 'han_gia2812@yahoo.com', 0, NULL, NULL, NULL, 256);
INSERT INTO `hremployees` VALUES (223, 'nguyenphuong', '2013-07-09 17:59:26', NULL, NULL, '', NULL, NULL, 'nguyenphuong.bnt@gmail.com', 0, NULL, NULL, NULL, 257);
INSERT INTO `hremployees` VALUES (224, 'CảnhPt', '2013-07-09 18:51:23', NULL, NULL, '', NULL, NULL, 'canhpt87@gmail.com', 1, NULL, NULL, NULL, 258);
INSERT INTO `hremployees` VALUES (225, 'Caleb', '2013-07-10 09:56:41', NULL, NULL, '', NULL, NULL, 'wanzi29188@gmail.com', 1, NULL, NULL, NULL, 259);
INSERT INTO `hremployees` VALUES (226, 'TripBeeRay', '2013-07-10 14:11:36', NULL, NULL, '', NULL, NULL, '2006692@sinhvien.hoasen.edu.vn', 1, NULL, NULL, NULL, 260);
INSERT INTO `hremployees` VALUES (227, 'minhpham112', '2013-07-10 15:47:46', NULL, NULL, '', NULL, NULL, 'minhpham112@gmail.com', 1, NULL, NULL, NULL, 261);
INSERT INTO `hremployees` VALUES (228, 'kute', '2013-07-10 21:21:04', NULL, NULL, '', NULL, NULL, 'pikaka86@gmail.com', 1, NULL, NULL, NULL, 262);
INSERT INTO `hremployees` VALUES (229, 'thuyan9012', '2013-07-11 10:37:04', NULL, NULL, '', '988329033', NULL, 'thuyan9012@yahoo.com', 0, '1990-11-12', NULL, NULL, 263);
INSERT INTO `hremployees` VALUES (230, 'Xsecurity', '2013-07-12 06:55:51', NULL, NULL, '', NULL, NULL, 'vinhnghiep39@yahoo.com', 1, NULL, NULL, NULL, 264);
INSERT INTO `hremployees` VALUES (231, 'vxhoang', '2013-07-12 08:03:00', NULL, NULL, '', NULL, NULL, 'vuxuanhoang_83@yahoo.com', 1, NULL, NULL, NULL, 265);
INSERT INTO `hremployees` VALUES (232, 'phananhgold', '2013-07-12 11:36:08', NULL, NULL, '', NULL, NULL, 'phananhgold@yahoo.com.vn', 1, NULL, NULL, NULL, 266);
INSERT INTO `hremployees` VALUES (233, 'nguyencuong', '2013-07-12 14:40:13', NULL, NULL, '', '1693638404', NULL, 'nguyencuong_ht160290@yahoo.com', 1, '1970-01-01', NULL, NULL, 267);
INSERT INTO `hremployees` VALUES (234, 'winSton8000', '2013-07-13 07:33:10', NULL, NULL, '', NULL, NULL, 'nghieptruong30@yahoo.com', 1, NULL, NULL, NULL, 268);
INSERT INTO `hremployees` VALUES (235, 'nguyencuonght', '2013-07-13 15:39:25', NULL, NULL, '', '1693638404', NULL, 'tambiet_thoigian@yahoo.com', 1, NULL, NULL, NULL, 269);
INSERT INTO `hremployees` VALUES (236, 'vuhoang08', '2013-07-14 23:01:17', NULL, NULL, '', NULL, NULL, 'hoangminh492005@yahoo.com', 1, NULL, NULL, NULL, 270);
INSERT INTO `hremployees` VALUES (237, 'phuongfidi', '2013-07-15 08:28:19', NULL, NULL, '', NULL, NULL, 'xesaigon@yahoo.com.vn', 1, NULL, NULL, NULL, 271);
INSERT INTO `hremployees` VALUES (238, 'vuongtan', '2013-07-15 08:35:52', NULL, NULL, '', NULL, NULL, 'vuongtan.tdg@live.com', 1, NULL, NULL, NULL, 272);
INSERT INTO `hremployees` VALUES (239, 'lipnguyen', '2013-07-15 10:39:21', NULL, NULL, '', NULL, NULL, 'nndt126@gmail.com', 1, NULL, NULL, NULL, 273);
INSERT INTO `hremployees` VALUES (240, 'thuynhung212', '2013-07-15 10:39:23', NULL, NULL, '', NULL, NULL, 'ngo_thuy_nhung@yahoo.com', 0, NULL, NULL, NULL, 274);
INSERT INTO `hremployees` VALUES (241, 'binhgia', '2013-07-15 11:26:54', NULL, NULL, '', NULL, NULL, 'tvv1977@yahoo.com', 1, NULL, NULL, NULL, 275);
INSERT INTO `hremployees` VALUES (242, 'huy0939', '2013-07-15 11:43:59', NULL, NULL, '', NULL, NULL, 'nguyenhoduchuy@gmail.com', 1, NULL, NULL, NULL, 276);
INSERT INTO `hremployees` VALUES (243, 'chungsoi', '2013-07-15 12:43:26', NULL, NULL, '', NULL, NULL, 'chungsoia1@yahoo.com', 1, NULL, NULL, NULL, 277);
INSERT INTO `hremployees` VALUES (244, 'kd_ahc', '2013-07-15 13:38:09', NULL, NULL, '', NULL, NULL, 'hanoichieuthu29_7@yahoo.com', 0, NULL, NULL, NULL, 278);
INSERT INTO `hremployees` VALUES (245, 'huytxc', '2013-07-15 13:56:23', NULL, NULL, '', '91', NULL, 'huycong2006@yahoo.com', 1, '1970-01-01', '<!--[if gte mso 9]><xml>\r\n <w:WordDocument>\r\n  <w:View>Normal</w:View>\r\n  <w:Zoom>0</w:Zoom>\r\n  <w:PunctuationKerning/>\r\n  <w:ValidateAgainstSchemas/>\r\n  <w:SaveIfXMLInvalid>false</w:SaveIfXMLInvalid>\r\n  <w:IgnoreMixedContent>false</w:IgnoreMixedContent>\r', NULL, 279);
INSERT INTO `hremployees` VALUES (246, 'tomsvietnam', '2013-07-15 17:07:41', NULL, NULL, '', NULL, NULL, 'tomsvietnam@yahoo.com', 1, NULL, NULL, NULL, 280);
INSERT INTO `hremployees` VALUES (247, 'mrchithanh92', '2013-07-15 18:27:08', NULL, NULL, '', NULL, NULL, 'mr.chithanh92@yahoo.com', 1, NULL, NULL, NULL, 281);
INSERT INTO `hremployees` VALUES (248, 'tinhlt', '2013-07-15 19:45:39', NULL, NULL, '', NULL, NULL, 'TINHLT0209@GMAIL.COM', 0, NULL, NULL, NULL, 282);
INSERT INTO `hremployees` VALUES (249, 'lthanhtinh', '2013-07-15 21:12:14', NULL, NULL, '', NULL, NULL, 'lthanhtinh@gmail.com', 1, NULL, NULL, NULL, 283);
INSERT INTO `hremployees` VALUES (250, 'thoitrangsusu', '2013-07-15 21:23:13', NULL, NULL, '', NULL, NULL, 'duong.ttdcaps@gmail.com', 1, NULL, NULL, NULL, 284);
INSERT INTO `hremployees` VALUES (251, 'anhsomchua', '2013-07-15 22:04:44', NULL, NULL, '', NULL, NULL, 'cauhailua_love_coutteen@yhaoo.com.vn', 1, NULL, NULL, NULL, 285);
INSERT INTO `hremployees` VALUES (252, 'antonthuong', '2013-07-16 09:32:54', NULL, NULL, '', NULL, NULL, 'antonthuong@yahoo.com', 1, NULL, NULL, NULL, 286);
INSERT INTO `hremployees` VALUES (253, 'Nguyễn Yến', '2013-07-16 09:57:38', NULL, NULL, '', NULL, NULL, 'nthyen2806@gmail.com', 0, NULL, NULL, NULL, 287);
INSERT INTO `hremployees` VALUES (254, 'trần lệ thủy', '2013-07-16 10:20:19', NULL, NULL, '', NULL, NULL, 'tranlethuy.77@gmail.com', 0, NULL, NULL, NULL, 288);
INSERT INTO `hremployees` VALUES (255, 'trongnhan', '2013-07-16 10:45:54', NULL, NULL, '', NULL, NULL, 'trongnhan1986@gmail.com', 1, NULL, NULL, NULL, 289);
INSERT INTO `hremployees` VALUES (256, 'hoangnhu', '2013-07-16 11:00:18', NULL, NULL, '', NULL, NULL, 'caubechiuchoi222@yahoo.com', 1, NULL, NULL, NULL, 290);
INSERT INTO `hremployees` VALUES (257, 'antonthuong01', '2013-07-16 11:29:52', NULL, NULL, '', NULL, NULL, 'antonthuong@gmail.com', 1, NULL, NULL, NULL, 291);
INSERT INTO `hremployees` VALUES (258, 'hp2331989', '2013-07-16 13:19:45', NULL, NULL, '', NULL, NULL, 'tuhoan89@gmail.com', 1, NULL, NULL, NULL, 292);
INSERT INTO `hremployees` VALUES (259, 'nguyenvanduong', '2013-07-16 15:12:04', NULL, NULL, '', '1655946162', NULL, 'hoangtubanhbao_92@yahoo.com', 1, '1970-01-01', NULL, NULL, 293);
INSERT INTO `hremployees` VALUES (260, 'duongxda92', '2013-07-16 15:30:02', NULL, NULL, '', NULL, NULL, 'ngocha_93_law@yahoo.com', 1, NULL, NULL, NULL, 294);
INSERT INTO `hremployees` VALUES (261, 'gakhotinh165', '2013-07-16 18:35:36', NULL, NULL, '', NULL, NULL, 'gakhotinh165@yahoo.com', 0, NULL, NULL, NULL, 295);
INSERT INTO `hremployees` VALUES (262, 'beanofbirth', '2013-07-16 20:26:59', NULL, NULL, '', NULL, NULL, 'beanofbirth@yahoo.com', 1, NULL, NULL, NULL, 296);
INSERT INTO `hremployees` VALUES (263, 'quocnp1506', '2013-07-16 21:33:00', NULL, NULL, '', NULL, NULL, 'quocnp1506@yahoo.com', 1, NULL, NULL, NULL, 297);
INSERT INTO `hremployees` VALUES (264, 'BEATSLIBRA', '2013-07-16 21:44:02', NULL, NULL, '', NULL, NULL, 'kimson.shjn@gmail.com', 1, NULL, NULL, NULL, 298);
INSERT INTO `hremployees` VALUES (265, 'coldseason', '2013-07-16 22:23:13', NULL, NULL, '', NULL, NULL, 'lifebitter.dontcry@yahoo.com.vn', 0, NULL, NULL, NULL, 299);
INSERT INTO `hremployees` VALUES (266, 'hotruonghai', '2013-07-17 07:02:49', NULL, NULL, '', NULL, NULL, 'haihotruong@yahoo.com.vn', 1, NULL, NULL, NULL, 300);
INSERT INTO `hremployees` VALUES (267, 'cksynl', '2013-07-17 08:01:55', NULL, NULL, '', NULL, NULL, 'cksynl@yahoo.com', 1, NULL, NULL, NULL, 301);
INSERT INTO `hremployees` VALUES (268, 'motngaymoisg', '2013-07-17 08:47:46', NULL, NULL, '', NULL, NULL, 'thangh2b@gmail.com', 1, NULL, NULL, NULL, 302);
INSERT INTO `hremployees` VALUES (269, 'anhnam0563', '2013-07-17 09:36:56', NULL, NULL, '', NULL, NULL, 'anhnam0563@gmail.com', 1, NULL, NULL, NULL, 303);
INSERT INTO `hremployees` VALUES (270, 'khuyendoan', '2013-07-17 12:27:37', NULL, NULL, '', NULL, NULL, 'hipxitrum@gmail.com', 1, NULL, NULL, NULL, 305);
INSERT INTO `hremployees` VALUES (271, 'khuyen doan', '2013-07-17 12:36:01', NULL, NULL, '', NULL, NULL, 'khuyendoan_99@yahoo.com.vn', 1, NULL, NULL, NULL, 306);
INSERT INTO `hremployees` VALUES (272, 'CXHanh', '2013-07-17 13:33:01', NULL, NULL, '', NULL, NULL, 'hanh_hanh9006@yahoo.com', 0, NULL, NULL, NULL, 307);
INSERT INTO `hremployees` VALUES (273, 'Mai Trọng Phong', '2013-07-17 18:11:26', NULL, NULL, '', NULL, NULL, 'phong_atpn92@yahoo.com', 1, NULL, NULL, NULL, 308);
INSERT INTO `hremployees` VALUES (274, 'minh nhat', '2013-07-17 19:39:25', NULL, NULL, '', NULL, NULL, 'friendcompanion86@gmail.com', 1, NULL, NULL, NULL, 309);
INSERT INTO `hremployees` VALUES (275, 'tluanvo', '2013-07-17 23:28:06', NULL, NULL, '', NULL, NULL, 'tluan_vo@yahoo.com', 1, NULL, NULL, NULL, 310);
INSERT INTO `hremployees` VALUES (276, 'apologize6', '2013-07-17 23:46:52', NULL, NULL, '', NULL, NULL, 'huyhoangnguyen1102@gmail.com', 1, NULL, NULL, NULL, 311);
INSERT INTO `hremployees` VALUES (277, 'Linh2013', '2013-07-18 01:21:17', NULL, NULL, '', NULL, NULL, 'whitelotus1415@yahoo.com', 0, NULL, NULL, NULL, 312);
INSERT INTO `hremployees` VALUES (278, 'xacthu113ct', '2013-07-18 08:41:34', NULL, NULL, '', NULL, NULL, 'tranthanhloc1152071993@gmail.com', 1, NULL, NULL, NULL, 313);
INSERT INTO `hremployees` VALUES (279, 'hacho0132', '2013-07-18 09:22:54', NULL, NULL, '', NULL, NULL, 'nguyenductri1h1@gmail.com', 1, NULL, NULL, NULL, 314);
INSERT INTO `hremployees` VALUES (280, 'bé cháo kute', '2013-07-18 09:52:14', NULL, NULL, '', NULL, NULL, 'bechaokute333@gmail.com', 0, NULL, NULL, NULL, 315);
INSERT INTO `hremployees` VALUES (281, 'vanmanh0903', '2013-07-19 11:41:17', NULL, NULL, '', '938091689', NULL, 'vanmanh0903@gmail.com', 1, NULL, NULL, NULL, 316);
INSERT INTO `hremployees` VALUES (282, 'kul120493', '2013-07-19 12:50:54', NULL, NULL, '', NULL, NULL, 'kul120493@yahoo.com.vn', 1, NULL, NULL, NULL, 317);
INSERT INTO `hremployees` VALUES (283, 'phuoc_alan', '2013-07-19 15:51:19', NULL, NULL, '', NULL, NULL, 'nguyenngocphuoc2@gmail.com', 1, NULL, NULL, NULL, 318);
INSERT INTO `hremployees` VALUES (284, 'thanhtuan24', '2013-07-19 18:36:57', NULL, NULL, '', NULL, NULL, 'nhansu008@gmail.com', 1, NULL, NULL, NULL, 319);
INSERT INTO `hremployees` VALUES (285, 'ngockid499', '2013-07-19 19:54:20', NULL, NULL, '', '1267097973', NULL, 'batsonghanhphuc@yahoo.com', 1, NULL, NULL, NULL, 320);
INSERT INTO `hremployees` VALUES (286, 'Đinh Gia Luật', '2013-07-20 10:46:46', NULL, NULL, 'Đinh Gia Luật', '909769714', NULL, 'luat_luat54@yahoo.com', 1, '1995-08-07', NULL, NULL, 321);
INSERT INTO `hremployees` VALUES (287, 'insa193', '2013-07-20 14:30:21', NULL, NULL, '', NULL, NULL, 'insa193@gmail.com', 0, NULL, NULL, NULL, 322);
INSERT INTO `hremployees` VALUES (288, 'yysbeast', '2013-07-20 15:33:02', NULL, NULL, '', NULL, NULL, 'phamngocbichchieu@gmail.com', 0, NULL, NULL, NULL, 323);
INSERT INTO `hremployees` VALUES (289, 'honeyheart', '2013-07-20 17:52:33', NULL, NULL, '', NULL, NULL, 'hoa_bao2000@yahoo.com', 0, NULL, NULL, NULL, 324);
INSERT INTO `hremployees` VALUES (290, 'vanlong237', '2013-07-20 22:30:54', NULL, NULL, '', NULL, NULL, 'doanvanlong1995@gmail.com', 1, NULL, NULL, NULL, 326);
INSERT INTO `hremployees` VALUES (291, 'khanhbg09', '2013-07-21 11:09:08', NULL, NULL, '', NULL, NULL, 'duykhanhbg135@gmail.com', 1, NULL, NULL, NULL, 327);
INSERT INTO `hremployees` VALUES (292, 'nhoxham', '2013-07-21 12:20:43', NULL, NULL, '', NULL, NULL, 'nhoxham5517@gmail.com', 0, NULL, NULL, NULL, 329);
INSERT INTO `hremployees` VALUES (293, 'thuyduong_94', '2013-07-21 20:56:50', NULL, NULL, '', NULL, NULL, 'lethuyduong.0906@gmail.com', 0, NULL, NULL, NULL, 330);
INSERT INTO `hremployees` VALUES (294, 'caominhtrung', '2013-07-21 20:59:57', NULL, NULL, '', NULL, NULL, 'caominhtrung81@yahoo.com.vn', 1, NULL, NULL, NULL, 331);
INSERT INTO `hremployees` VALUES (295, 'danghong134', '2013-07-21 21:06:25', NULL, NULL, '', NULL, NULL, 'danghong134@gmail.com', 0, NULL, NULL, NULL, 332);
INSERT INTO `hremployees` VALUES (296, 'atkboy90', '2013-07-21 21:55:10', NULL, NULL, '', NULL, NULL, 'alon3.4ever.1990@gmail.com', 0, NULL, NULL, NULL, 333);
INSERT INTO `hremployees` VALUES (297, 'minh phuong', '2013-07-21 22:17:39', NULL, NULL, '', NULL, NULL, 'minhphuong110793@gmail.com', 0, '1994-11-04', NULL, NULL, 334);
INSERT INTO `hremployees` VALUES (298, 'luckystarbmt', '2013-07-22 10:30:39', NULL, NULL, '', NULL, NULL, 'phanphungtantrinh@gmail.com', 1, NULL, NULL, NULL, 335);
INSERT INTO `hremployees` VALUES (299, 'Luthem', '2013-07-22 11:59:02', NULL, NULL, '', NULL, NULL, 'luthem2285@gmail.com', 1, NULL, NULL, NULL, 336);
INSERT INTO `hremployees` VALUES (300, 'hvlovely', '2013-07-22 17:48:49', NULL, NULL, '', '979814134', NULL, 'vancntt35b@gmail.com', 0, '1993-10-10', NULL, NULL, 337);
INSERT INTO `hremployees` VALUES (301, 'Trần thị thương', '2013-07-22 20:09:34', NULL, NULL, 'Trần thị thương', '985153530', NULL, 'fontran228@gmail.com', 0, '1970-01-01', '341 Lê Văn Lương-P.tân quy-Quận 7-tphcm', NULL, 338);
INSERT INTO `hremployees` VALUES (302, 'Nguyễn Tâm Hương', '2013-07-23 10:11:38', NULL, NULL, 'Nguyễn Tâm Hương', '915672869', NULL, 'caohoang_kd5@yahoo.com', 0, '1970-01-01', '<p style=\"margin-top:6.0pt;margin-right:0cm;margin-bottom:6.0pt;margin-left:\n0cm;line-height:20.0pt;mso-line-height-rule:exactly;tab-stops:center 8.0cm\"><strong><span style=\"font-size: 9pt; font-family: Verdana;\">Cơ sở 1: Số 18 Ngõ 19\nPhố Kim Đồng - Hoàng', NULL, 339);
INSERT INTO `hremployees` VALUES (303, 'torfback', '2013-08-21 16:45:37', NULL, NULL, '', NULL, NULL, 'hotrieungoan@gmail.com', 1, NULL, NULL, NULL, 340);
INSERT INTO `hremployees` VALUES (304, 'thanhtruc07', '2013-07-23 16:07:58', NULL, NULL, '', NULL, NULL, 'huletatruc07@gmail.com', 0, NULL, NULL, NULL, 341);
INSERT INTO `hremployees` VALUES (305, 'khongduockhoc', '2013-07-23 20:49:47', NULL, NULL, '', NULL, NULL, 'hannguoidadi1986@yahoo.com', 1, NULL, NULL, NULL, 342);
INSERT INTO `hremployees` VALUES (306, 'phuongthoa3', '2013-07-23 20:52:49', NULL, NULL, '', NULL, NULL, 'lovefevers@yahoo.com.vn', 1, NULL, NULL, NULL, 343);
INSERT INTO `hremployees` VALUES (307, 'trongkhang', '2013-07-23 21:04:19', NULL, NULL, '', NULL, NULL, 'trongkhangbdu@gmail.com', 1, NULL, NULL, NULL, 344);
INSERT INTO `hremployees` VALUES (308, 'nguyễn thị phượng thoa', '2013-07-23 21:26:07', NULL, NULL, 'nguyễn thị phượng thoa', '932229903', NULL, 'phuongthoa37@yahoo.com', 0, '1970-01-01', NULL, NULL, 345);
INSERT INTO `hremployees` VALUES (309, 'HuySmile', '2013-07-24 08:18:48', NULL, NULL, '', NULL, NULL, '16081997@yahoo.com', 1, NULL, NULL, NULL, 346);
INSERT INTO `hremployees` VALUES (310, 'bandamsll', '2013-07-24 08:29:10', NULL, NULL, '', NULL, NULL, 'hpkhithayemcuoi@yahoo.com', 1, NULL, NULL, NULL, 347);
INSERT INTO `hremployees` VALUES (311, 'connecting', '2013-07-24 15:13:40', NULL, NULL, '', NULL, NULL, 'connectingpeople_word@yahoo.com', 1, NULL, NULL, NULL, 348);
INSERT INTO `hremployees` VALUES (312, 'codoc98', '2013-07-24 20:03:25', NULL, NULL, '', NULL, NULL, 'thuyanh8g@gmail.com', 0, NULL, NULL, NULL, 349);
INSERT INTO `hremployees` VALUES (313, 'Nguyễn Thị Thùy Anh', '2013-07-24 20:04:13', NULL, NULL, 'Nguyễn Thị Thùy Anh', '203843086', NULL, 'mylovevalentine98@gmail.com', 0, '1970-01-01', '292 Ngô Quyền, tổ 52, phường Kim Tân, thành phố Lào Cai, tỉnh Lào Cai', NULL, 350);
INSERT INTO `hremployees` VALUES (314, 'banhxethep', '2013-07-24 20:35:04', NULL, NULL, '', NULL, NULL, 'hanajukixoma@gmail.com', 0, NULL, NULL, NULL, 351);
INSERT INTO `hremployees` VALUES (315, 'Trung', '2013-07-25 00:12:02', NULL, NULL, 'Trung', '902193919', NULL, 'dattrung_jsc@yahoo.com', 1, '1980-04-08', '<div class=\"baseHtml signature ugc\"><aside><span style=\"font-size: medium\"><span style=\"font-family: \'georgia\'\">Bán rượu quê ngon, nấu bằng men ta, không cồn, say không đau đầu, .... </span></span><br>\r\n<span style=\"font-size: medium\"><span style=\"font-fa', NULL, 352);
INSERT INTO `hremployees` VALUES (316, 'thanhthu11', '2013-07-25 11:16:57', NULL, NULL, '', NULL, NULL, 'ngocbay72@gmail.com', 0, NULL, NULL, NULL, 354);
INSERT INTO `hremployees` VALUES (317, 'vonhumai', '2013-07-25 11:50:44', NULL, NULL, '', NULL, NULL, 'vomaivt81@yahoo.com', 0, NULL, NULL, NULL, 355);
INSERT INTO `hremployees` VALUES (318, 'nhokkUjio', '2013-07-25 18:56:53', NULL, NULL, '', NULL, NULL, 'nhokkUjio1419@yahoo.com.vn', 0, NULL, NULL, NULL, 356);
INSERT INTO `hremployees` VALUES (319, 'abmhanoi', '2013-07-27 09:03:17', NULL, NULL, '', NULL, NULL, 'banbuonnhaccu@gmail.com', 1, NULL, NULL, NULL, 357);
INSERT INTO `hremployees` VALUES (320, 'phamcuongq', '2013-07-29 13:10:42', NULL, NULL, '', NULL, NULL, 'phamcuongq@yahoo.com.vn', 1, NULL, NULL, NULL, 358);
INSERT INTO `hremployees` VALUES (321, 'YenYen', '2013-07-31 23:35:35', NULL, NULL, '', NULL, NULL, 'kimyen.tran.2204@gmail.com', 0, NULL, NULL, NULL, 359);
INSERT INTO `hremployees` VALUES (322, 'Trần Thị Kim Yến', '2013-07-31 23:41:35', NULL, NULL, 'Trần Thị Kim Yến', '909760406', NULL, 'ky2204@hotmail.com', 1, '1970-01-01', '473 Quốc lộ 13, P.Hiệp Bình Phước, Q.Thủ&nbsp;Đức, TP.HCM', NULL, 360);
INSERT INTO `hremployees` VALUES (323, 'donghn', '2013-08-04 14:32:45', NULL, NULL, '', NULL, NULL, 'huynhnguyendong@gmail.com', 1, NULL, NULL, NULL, 361);
INSERT INTO `hremployees` VALUES (324, 'lê tiến quốc', '2013-08-04 15:59:08', NULL, NULL, 'lê tiến quốc', '1644049469', NULL, 'rokudourinne@yahoo.com.vn', 1, '1998-01-12', '<br>', NULL, 362);
INSERT INTO `hremployees` VALUES (325, 'rokudourinne', '2013-08-04 18:56:36', NULL, NULL, '', '1644049469', NULL, 'theboys153@yahoo.com.vn', 1, '1998-01-12', NULL, NULL, 363);
INSERT INTO `hremployees` VALUES (326, 'phatdailoi', '2013-08-08 21:13:09', NULL, NULL, '', NULL, NULL, 'phatdailoi2007@yahoo.com.vn', 1, NULL, NULL, NULL, 364);
INSERT INTO `hremployees` VALUES (327, 'Nguyen Tran Diem Thuy', '2013-08-08 23:23:58', NULL, NULL, 'Nguyen Tran Diem Thuy', '933928191', NULL, 'thuy.ntd1993@gmail.com', 0, '1970-01-01', NULL, NULL, 365);
INSERT INTO `hremployees` VALUES (328, 'Nhanpro_3393', '2013-08-11 11:24:46', NULL, NULL, '', NULL, NULL, 'nhanpro.wunderbar@gmail.com', 0, NULL, NULL, NULL, 366);
INSERT INTO `hremployees` VALUES (329, 'abm', '2013-08-22 15:28:42', NULL, NULL, '', NULL, NULL, 'hoangthai.hpt@gmail.com', 1, NULL, NULL, NULL, 367);
INSERT INTO `hremployees` VALUES (330, 'lthonline', '2013-08-22 15:31:05', NULL, NULL, '', NULL, NULL, 'lthonline1990@gmail.com', 1, NULL, NULL, NULL, 368);
INSERT INTO `hremployees` VALUES (331, 'waptin.biz', '2013-08-22 16:54:30', NULL, NULL, '', NULL, NULL, 'appviet1990@gmail.com', 1, NULL, NULL, NULL, 369);
INSERT INTO `hremployees` VALUES (332, 'vietduc23', '2013-08-28 14:43:51', NULL, NULL, '', NULL, NULL, 'forgetmenot133@yahoo.com', 0, NULL, NULL, NULL, 370);
INSERT INTO `hremployees` VALUES (333, 'mabu', '2013-08-28 15:46:49', NULL, NULL, '', NULL, NULL, 'minhhoa0612@gmail.com', 0, NULL, NULL, NULL, 371);
INSERT INTO `hremployees` VALUES (334, 'tqthangqbu2', '2013-08-28 16:00:40', NULL, NULL, '', NULL, NULL, 'tqthangqbu2@gmail.com', 1, NULL, NULL, NULL, 372);
INSERT INTO `hremployees` VALUES (335, 'tinhyeudau_th92', '2013-08-28 18:05:42', NULL, NULL, '', NULL, NULL, 'tinhyeudau_th92@yahoo.com.vn', 1, NULL, NULL, NULL, 373);
INSERT INTO `hremployees` VALUES (336, 'hoaian', '2013-08-28 19:59:54', NULL, NULL, '', '0', NULL, 'hoaiantex@gmail.com', 1, '1970-01-01', NULL, NULL, 374);
INSERT INTO `hremployees` VALUES (337, 'kienle21', '2013-08-28 22:20:55', NULL, NULL, '', NULL, NULL, 'kienle21@yahoo.com', 1, NULL, NULL, NULL, 375);
INSERT INTO `hremployees` VALUES (338, 'david duong', '2013-08-28 23:42:31', NULL, NULL, '', '908684220', NULL, 'yui_shin2000@yahoo.com', 1, '1992-03-05', NULL, NULL, 376);
INSERT INTO `hremployees` VALUES (339, 'tranminhthu1811', '2013-08-29 03:53:13', NULL, NULL, '', NULL, NULL, 'tranminhthu1811@gmail.com', 1, NULL, NULL, NULL, 377);
INSERT INTO `hremployees` VALUES (340, 'vuihoctienghan', '2013-08-29 12:43:25', NULL, NULL, '', NULL, NULL, 'laihuydu@gmail.com', 1, NULL, NULL, NULL, 378);
INSERT INTO `hremployees` VALUES (341, 'huygiangmobi', '2013-08-29 13:16:49', NULL, NULL, '', NULL, NULL, 'boxuongbattu@yahoo.com', 1, NULL, NULL, NULL, 379);
INSERT INTO `hremployees` VALUES (342, 'trinhnq', '2013-08-29 13:47:16', NULL, NULL, '', NULL, NULL, 'trinhnq9@yahoo.com.vn', 1, NULL, NULL, NULL, 380);
INSERT INTO `hremployees` VALUES (343, 'duyphuong', '2013-08-29 14:25:25', NULL, NULL, '', NULL, NULL, 'bpvinh771994@gmail.com', 1, NULL, NULL, NULL, 381);
INSERT INTO `hremployees` VALUES (344, 'le hoai lam', '2013-08-29 14:40:28', NULL, NULL, 'le hoai lam', NULL, NULL, 'sweetsocola09@yahoo.com', 1, NULL, NULL, NULL, 382);
INSERT INTO `hremployees` VALUES (345, 'nguyennhadat', '2013-08-29 16:09:38', NULL, NULL, '', NULL, NULL, 'nguyen.nhadat@yahoo.com', 1, NULL, NULL, NULL, 383);
INSERT INTO `hremployees` VALUES (346, 'thanhhieu', '2013-08-30 09:08:38', NULL, NULL, '', NULL, NULL, 'thanhhieu107198205@yahoo.com', 0, NULL, NULL, NULL, 384);
INSERT INTO `hremployees` VALUES (347, 'fologists', '2013-08-30 10:29:36', NULL, NULL, '', NULL, NULL, 'triphuong.co@gmail.com', 1, NULL, NULL, NULL, 385);
INSERT INTO `hremployees` VALUES (348, 'dinh huy khang', '2013-08-30 16:17:29', NULL, NULL, '', NULL, NULL, 'super_cena10@yahoo.com', 1, NULL, NULL, NULL, 386);
INSERT INTO `hremployees` VALUES (349, 'dinh khang', '2013-08-30 16:47:02', NULL, NULL, '', NULL, NULL, 'super_cena10@yahoo.com.vn', 1, NULL, NULL, NULL, 387);
INSERT INTO `hremployees` VALUES (350, 'phamvanminh', '2013-08-30 20:38:29', NULL, NULL, '', '906418176', NULL, 'minhminh_minh94@yahoo.com', 1, NULL, NULL, NULL, 388);
INSERT INTO `hremployees` VALUES (351, 'hiepsingay13', '2013-08-30 21:32:59', NULL, NULL, '', NULL, NULL, 'hiepsingay13@yahoo.com.vn', 1, NULL, NULL, NULL, 389);
INSERT INTO `hremployees` VALUES (352, 'minhnguyensisio', '2013-08-30 23:35:49', NULL, NULL, '', NULL, NULL, 'phongnhansuvieclam@gmail.com', 1, NULL, NULL, NULL, 390);
INSERT INTO `hremployees` VALUES (353, 'oanhho', '2013-08-31 01:18:34', NULL, NULL, '', NULL, NULL, 'kimoanhho1989@gmail.com', 0, NULL, NULL, NULL, 391);
INSERT INTO `hremployees` VALUES (354, 'gasamac', '2013-08-31 07:44:46', NULL, NULL, '', NULL, NULL, 'gasamac@gmail.com', 1, NULL, NULL, NULL, 392);
INSERT INTO `hremployees` VALUES (355, 'ANHTUYET', '2013-08-31 08:54:00', NULL, NULL, '', NULL, NULL, 'votube@yahoo.com', 0, NULL, NULL, NULL, 393);
INSERT INTO `hremployees` VALUES (356, 'tieubao860', '2013-08-31 09:50:26', NULL, NULL, '', '0', NULL, 'thanhcong88_hd@yahoo.com', 1, '1970-01-01', NULL, NULL, 394);
INSERT INTO `hremployees` VALUES (357, 'son.nobody', '2013-08-31 14:11:53', NULL, NULL, '', NULL, NULL, 'son.nobody@yahoo.com', 1, NULL, NULL, NULL, 395);
INSERT INTO `hremployees` VALUES (358, 'NgocVy', '2013-08-31 16:45:30', NULL, NULL, '', NULL, NULL, 'trieuman_1088@yahoo.com', 0, NULL, NULL, NULL, 396);
INSERT INTO `hremployees` VALUES (359, 'nguyenluong90', '2013-08-31 19:53:36', NULL, NULL, '', NULL, NULL, 'nrluong1990@gmail.com', 1, NULL, NULL, NULL, 397);
INSERT INTO `hremployees` VALUES (360, 'hoanglanquy', '2013-08-31 20:42:16', NULL, NULL, '', NULL, NULL, 'hoanglanquy@gmail.com', 0, NULL, NULL, NULL, 398);
INSERT INTO `hremployees` VALUES (361, 'Sang', '2013-08-31 22:12:47', NULL, NULL, 'Sang', '675567567', NULL, 'hoahonge@gmail.com', 1, '2003-03-03', 'ewewghgf', NULL, 399);
INSERT INTO `hremployees` VALUES (362, 'nootieutu123', '2013-08-31 23:59:56', NULL, NULL, '', NULL, NULL, 'nguynxunthinh@yahoo.com', 1, NULL, NULL, NULL, 400);
INSERT INTO `hremployees` VALUES (363, 'hoannguyen', '2013-09-01 00:31:10', NULL, NULL, '', NULL, NULL, 'nguyenkhachoanpt@yahoo.com', 1, NULL, NULL, NULL, 401);
INSERT INTO `hremployees` VALUES (364, 'maidinh', '2013-09-01 09:53:22', NULL, NULL, '', NULL, NULL, 'maidinha2602.msmart.vn@gmail.com', 0, NULL, NULL, NULL, 402);
INSERT INTO `hremployees` VALUES (365, 'HuynhNhaTran', '2013-09-01 11:03:46', NULL, NULL, '', NULL, NULL, 'huynhnhatran0105@gmail.com', 0, NULL, NULL, NULL, 403);
INSERT INTO `hremployees` VALUES (366, 'horseorc', '2013-09-01 11:15:46', NULL, NULL, '', NULL, NULL, 'horseorc@yahoo.com', 1, NULL, NULL, NULL, 404);
INSERT INTO `hremployees` VALUES (367, 'atr_ken', '2013-09-01 14:12:01', NULL, NULL, '', NULL, NULL, 'tluong1991@gmail.com', 1, NULL, NULL, NULL, 405);
INSERT INTO `hremployees` VALUES (368, 'maitrang', '2013-09-01 15:30:21', NULL, NULL, '', NULL, NULL, 'hdhoangvn@gmail.com', 0, NULL, NULL, NULL, 406);
INSERT INTO `hremployees` VALUES (369, 'vanson85', '2013-09-01 22:45:35', NULL, NULL, '', '0', NULL, 'vanson1985@gmail.com', 1, '1985-08-01', NULL, NULL, 407);
INSERT INTO `hremployees` VALUES (370, 'Nguyễn Nhưt Trường', '2013-09-02 00:48:06', NULL, NULL, 'Nguyễn Nhưt Trường', '1207930913', NULL, 'truong1988_tv@yahoo.com', 1, '1970-01-01', 'TP.hcm<br />', NULL, 408);
INSERT INTO `hremployees` VALUES (371, 'hanhxop', '2013-09-02 12:49:05', NULL, NULL, '', NULL, NULL, 'hanhxop@gmail.com', 0, NULL, NULL, NULL, 409);
INSERT INTO `hremployees` VALUES (372, 'chidai', '2013-09-02 18:51:19', NULL, NULL, '', NULL, NULL, 'tinhbanbonphuong.cd@gmail.com', 1, NULL, NULL, NULL, 410);
INSERT INTO `hremployees` VALUES (373, 'OMG', '2013-09-02 19:27:25', NULL, NULL, '', NULL, NULL, 'an9992000@gmail.com', 1, NULL, NULL, NULL, 411);
INSERT INTO `hremployees` VALUES (374, 'Lâm Thị Thùy Trang', '2013-09-02 20:02:40', NULL, NULL, 'Lâm Thị Thùy Trang', '932199265', NULL, 'dichvukhachhang2009@yahoo.com.vn', 1, '1969-02-04', NULL, NULL, 412);
INSERT INTO `hremployees` VALUES (375, 'selinanguyen', '2013-09-02 23:16:50', NULL, NULL, '', NULL, NULL, 'selinanguyen1213@gmail.com', 0, NULL, NULL, NULL, 413);
INSERT INTO `hremployees` VALUES (376, 'tam213', '2013-09-03 01:03:22', NULL, NULL, '', NULL, NULL, 'ghost_river280591@yahoo.com', 1, NULL, NULL, NULL, 414);
INSERT INTO `hremployees` VALUES (377, 'Phan Văn Phương', '2013-09-03 01:25:53', NULL, NULL, 'Phan Văn Phương', '935790503', NULL, 'phuong.phan2003@gmail.com', 1, NULL, NULL, NULL, 415);
INSERT INTO `hremployees` VALUES (378, 'chuottrang', '2013-09-03 03:14:22', NULL, NULL, '', NULL, NULL, 'chuottrang2003@gmail.com', 0, NULL, NULL, NULL, 416);
INSERT INTO `hremployees` VALUES (379, 'suboa23', '2013-09-03 06:41:43', NULL, NULL, '', NULL, NULL, 'truymenhvolam1@gmail.com', 1, NULL, NULL, NULL, 417);
INSERT INTO `hremployees` VALUES (380, 'ngduytin', '2013-09-03 09:14:46', NULL, NULL, '', NULL, NULL, 'ngduytin92@gmail.com', 1, NULL, NULL, NULL, 418);
INSERT INTO `hremployees` VALUES (381, 'tranthoaigt', '2013-09-03 19:29:09', NULL, NULL, '', NULL, NULL, 'tranthoaigtnd@gmail.com', 1, NULL, NULL, NULL, 419);
INSERT INTO `hremployees` VALUES (382, 'Nhoklove9x', '2013-09-03 19:53:14', NULL, NULL, '', NULL, NULL, 'dangtinwebsite@gmail.com', 1, NULL, NULL, NULL, 420);
INSERT INTO `hremployees` VALUES (383, 'langtudatinhtg', '2013-09-03 21:54:46', NULL, NULL, '', NULL, NULL, 'vietcuong.tigifood@gmail.com', 1, NULL, NULL, NULL, 421);
INSERT INTO `hremployees` VALUES (384, 'vietnga83', '2013-09-03 22:54:49', NULL, NULL, '', NULL, NULL, 'anh_chang_lam_thue_83@yahoo.com', 1, NULL, NULL, NULL, 422);
INSERT INTO `hremployees` VALUES (385, 'koong', '2013-09-04 11:09:14', NULL, NULL, '', NULL, NULL, 'cockgrower2013@gmail.com', 1, NULL, NULL, NULL, 423);
INSERT INTO `hremployees` VALUES (386, 'nhokli_93', '2013-09-04 14:39:25', NULL, NULL, '', NULL, NULL, 'nguyenphidagiay@gmail.com', 0, NULL, NULL, NULL, 424);
INSERT INTO `hremployees` VALUES (387, 'PhuocMB', '2013-09-04 15:10:00', NULL, NULL, '', NULL, NULL, 'phuoc.mb@gmail.com', 1, NULL, NULL, NULL, 425);
INSERT INTO `hremployees` VALUES (388, 'ngockhanh', '2013-09-04 21:40:51', NULL, NULL, '', NULL, NULL, 'xukashop@yahoo.com.vn', 0, NULL, NULL, NULL, 426);
INSERT INTO `hremployees` VALUES (389, 'mesay', '2013-09-05 03:14:58', NULL, NULL, '', NULL, NULL, 'dvdangtin000@gmail.com', 1, NULL, NULL, NULL, 427);
INSERT INTO `hremployees` VALUES (390, 'love_wind', '2013-10-12 23:32:01', NULL, NULL, '', NULL, NULL, 'sushi_vina@yahoo.com', 0, NULL, NULL, NULL, 438);
INSERT INTO `hremployees` VALUES (391, 'loctv30', '2013-09-12 22:26:13', NULL, NULL, '', NULL, NULL, 'loctv30@yahoo.com', 1, '1970-01-01', NULL, NULL, 485);
INSERT INTO `hremployees` VALUES (392, 'huyentrang', '2013-09-14 15:02:23', NULL, NULL, '', NULL, NULL, 'hoanglien19876@gmail.com', 0, NULL, NULL, NULL, 505);
INSERT INTO `hremployees` VALUES (393, 'quang22t@gmail.', '2013-09-15 14:30:36', NULL, NULL, '', NULL, NULL, 'quang22t@gmail.com', 1, NULL, NULL, NULL, 513);
INSERT INTO `hremployees` VALUES (394, 'anhemctv', '2013-09-15 15:14:23', NULL, NULL, '', NULL, NULL, 'anhemctv@zing.vn', 1, NULL, NULL, NULL, 514);
INSERT INTO `hremployees` VALUES (395, 'anhemctv1', '2013-09-15 19:48:30', NULL, NULL, '', NULL, NULL, 'anhemctv1@zing.vn', 1, NULL, NULL, NULL, 517);
INSERT INTO `hremployees` VALUES (396, 'nico3ro', '2013-09-15 20:27:23', NULL, NULL, '', NULL, NULL, 'nico3ro@zing.vn', 1, NULL, NULL, NULL, 518);
INSERT INTO `hremployees` VALUES (397, 'thuy', '2013-09-15 22:22:40', NULL, NULL, '', NULL, NULL, 'Trandieuthuy_t57@hus.edu.vn', 0, NULL, NULL, NULL, 520);
INSERT INTO `hremployees` VALUES (398, 'Duong Thi Thom', '2013-09-15 23:35:32', NULL, NULL, '', NULL, NULL, 'duongthom1994@gmail.com', 0, NULL, NULL, NULL, 521);
INSERT INTO `hremployees` VALUES (399, 'Thang Tran', '2013-09-16 13:00:52', NULL, NULL, 'Thang Tran', NULL, NULL, 'datinhkiem2009@yahoo.com.vn', 1, NULL, NULL, NULL, 527);
INSERT INTO `hremployees` VALUES (400, 'anhthulam', '2013-09-16 16:32:23', NULL, NULL, '', '907238021', NULL, 'lamanhthu.msmart@gmail.com', 0, NULL, NULL, NULL, 528);
INSERT INTO `hremployees` VALUES (401, 'hernia', '2013-09-21 10:03:59', NULL, NULL, '', NULL, NULL, 'hoada88@gmail.com', 0, NULL, NULL, NULL, 575);
INSERT INTO `hremployees` VALUES (402, 'msthanh84', '2013-09-24 21:02:13', NULL, NULL, '', NULL, NULL, 'msthanh84@yahoo.com', 0, NULL, NULL, NULL, 585);
INSERT INTO `hremployees` VALUES (403, 'vothanhthoai005', '2013-10-01 00:58:08', NULL, NULL, '', NULL, NULL, 'vothanhthoai0053@gmail.com', 1, '1994-01-01', NULL, NULL, 602);
INSERT INTO `hremployees` VALUES (404, 'maydongphuc', '2013-10-01 13:20:51', NULL, NULL, '', NULL, NULL, 'baotramfashion@gmail.com', 0, NULL, NULL, NULL, 603);
INSERT INTO `hremployees` VALUES (405, 'Vanndinh', '2013-10-01 16:13:33', NULL, NULL, '', NULL, NULL, 'ttxvnphamvandinh@yahoo.com', 1, NULL, NULL, NULL, 604);
INSERT INTO `hremployees` VALUES (406, 'nile', '2013-10-02 05:28:09', NULL, NULL, '', NULL, NULL, 'ducati181@gmail.com', 1, NULL, NULL, NULL, 605);
INSERT INTO `hremployees` VALUES (407, '0zozozo', '2013-10-02 09:51:45', NULL, NULL, '', NULL, NULL, 'mr.xthuy@gmail.com', 1, NULL, NULL, NULL, 606);
INSERT INTO `hremployees` VALUES (408, 'nudung1112', '2013-10-02 15:58:23', NULL, NULL, '', NULL, NULL, 'nudung1112@yahoo.com', 1, NULL, NULL, NULL, 607);
INSERT INTO `hremployees` VALUES (409, 'thaodang2407', '2013-10-03 14:22:46', NULL, NULL, '', NULL, NULL, 'thaodang2407@gmail.com', 0, NULL, NULL, NULL, 608);
INSERT INTO `hremployees` VALUES (410, 'heneikenl', '2013-10-04 10:22:47', NULL, NULL, '', NULL, NULL, 'n.kenl@yahoo.com.vn', 1, NULL, NULL, NULL, 609);
INSERT INTO `hremployees` VALUES (411, 'kaka181', '2013-10-04 11:29:47', NULL, NULL, '', NULL, NULL, 'kehuydiet_hoang@yahoo.com', 1, NULL, NULL, NULL, 610);
INSERT INTO `hremployees` VALUES (412, 'lehh_10', '2013-10-05 15:42:50', NULL, NULL, '', NULL, NULL, 'lehh_10@yahoo.com.vn', 1, NULL, NULL, NULL, 611);
INSERT INTO `hremployees` VALUES (413, 'truongthinh79', '2013-10-06 17:13:59', NULL, NULL, '', NULL, NULL, 'truongthinh79@gmail.com', 1, NULL, NULL, NULL, 612);
INSERT INTO `hremployees` VALUES (414, 'phungvandung', '2013-10-07 09:46:40', NULL, NULL, '', NULL, NULL, 'phungvandung1986@gmail.com', 1, NULL, NULL, NULL, 613);
INSERT INTO `hremployees` VALUES (415, 'sttrinh', '2013-10-07 15:17:46', NULL, NULL, '', NULL, NULL, 'st.trinh@yahoo.com', 0, NULL, NULL, NULL, 614);
INSERT INTO `hremployees` VALUES (416, 'Hanhivy', '2013-10-07 23:08:26', NULL, NULL, '', NULL, NULL, 'hanhivy94@gmail.com', 0, NULL, NULL, NULL, 615);
INSERT INTO `hremployees` VALUES (417, 'daothunhan', '2013-10-08 14:43:30', NULL, NULL, '', NULL, NULL, 'daothunhan@gmail.com', 0, NULL, NULL, NULL, 616);
INSERT INTO `hremployees` VALUES (418, 'jackelong', '2013-10-08 14:44:19', NULL, NULL, '', NULL, NULL, 'congtythongdien391@gmail.com', 1, NULL, NULL, NULL, 617);
INSERT INTO `hremployees` VALUES (419, 'nguyen thai ha', '2013-10-08 15:33:57', NULL, NULL, '', NULL, NULL, 'phuongdunghuynh69@gmail.com', 0, NULL, NULL, NULL, 618);
INSERT INTO `hremployees` VALUES (420, 'hongthuy_hht', '2013-10-08 15:37:57', NULL, NULL, '', NULL, NULL, 'hoang_hongthuy86@yahoo.com', 0, NULL, NULL, NULL, 619);
INSERT INTO `hremployees` VALUES (421, 'nguyenhieu01', '2013-10-08 16:24:04', NULL, NULL, '', NULL, NULL, 'hieubp1995@gmail.com', 1, NULL, NULL, NULL, 620);
INSERT INTO `hremployees` VALUES (422, 'mjnhmjnh21', '2013-10-08 17:15:56', NULL, NULL, '', NULL, NULL, 'mjnhmjnh21@gmail.com', 1, NULL, NULL, NULL, 621);
INSERT INTO `hremployees` VALUES (423, 'nhatvina2106', '2013-10-08 17:38:46', NULL, NULL, '', '0', NULL, 'noluc2106@gmail.com', 1, '1970-01-01', NULL, NULL, 622);
INSERT INTO `hremployees` VALUES (424, 'su.spi_lk', '2013-10-08 18:04:57', NULL, NULL, '', NULL, NULL, 'su.spi_lk@yahoo.com.vn', 0, NULL, NULL, NULL, 623);
INSERT INTO `hremployees` VALUES (425, 'ngocnvl', '2013-10-08 18:25:11', NULL, NULL, '', NULL, NULL, 'ngocnvl@ocb.com.vn', 0, NULL, NULL, NULL, 624);
INSERT INTO `hremployees` VALUES (426, 'Quyenhandsome12', '2013-10-08 18:26:19', NULL, NULL, '', NULL, NULL, 'Quyenhandsome85@gmail.com', 1, NULL, NULL, NULL, 625);
INSERT INTO `hremployees` VALUES (427, 'nh0xc3', '2013-10-08 20:14:03', NULL, NULL, '', NULL, NULL, 'xuanhungptit@gmail.com', 1, '1994-05-08', NULL, NULL, 626);
INSERT INTO `hremployees` VALUES (428, 'xuantribui', '2013-10-08 21:21:27', NULL, NULL, '', NULL, NULL, 'xuantribui@gmail.com', 1, NULL, NULL, NULL, 627);
INSERT INTO `hremployees` VALUES (429, 'Truongvoky19', '2013-10-09 07:45:07', NULL, NULL, '', NULL, NULL, 'Penguin2003@gmail.com', 1, NULL, NULL, NULL, 628);
INSERT INTO `hremployees` VALUES (430, 'buivuong10', '2013-10-09 12:28:37', NULL, NULL, '', NULL, NULL, 'buivuong10@gmail.com', 1, NULL, NULL, NULL, 629);
INSERT INTO `hremployees` VALUES (431, 'tuantrag1505', '2013-10-09 19:24:20', NULL, NULL, '', NULL, NULL, 'evitat1505@gmail.com', 1, NULL, NULL, NULL, 630);
INSERT INTO `hremployees` VALUES (432, 'euroden', '2013-10-09 20:55:54', NULL, NULL, '', NULL, NULL, 'lang_tu_sanh_dieu2006@yahoo.com', 1, NULL, NULL, NULL, 631);
INSERT INTO `hremployees` VALUES (433, 'havanlinhtq', '2013-10-10 09:14:09', NULL, NULL, '', NULL, NULL, 'havanlinhtq@ymail.com', 1, NULL, NULL, NULL, 632);
INSERT INTO `hremployees` VALUES (434, 'hanhhanh88', '2013-10-10 10:19:12', NULL, NULL, '', NULL, NULL, 'diemhanhspt07@gmail.com', 1, NULL, NULL, NULL, 633);
INSERT INTO `hremployees` VALUES (435, 'khang_phan1995', '2013-10-10 10:56:27', NULL, NULL, '', NULL, NULL, 'mr.kentick@gmail.com', 1, NULL, NULL, NULL, 634);
INSERT INTO `hremployees` VALUES (436, 'nguyendung', '2013-10-10 14:10:15', NULL, NULL, '', NULL, NULL, '0944784793@gmail.com', 1, NULL, NULL, NULL, 635);
INSERT INTO `hremployees` VALUES (437, 'nguyendung613', '2013-10-10 14:11:56', NULL, NULL, '', NULL, NULL, '0944784793d@gmail.com', 1, NULL, NULL, NULL, 636);
INSERT INTO `hremployees` VALUES (438, 'sesybody', '2013-10-10 14:18:34', NULL, NULL, '', NULL, NULL, 'sesybody@gmail.com', 1, NULL, NULL, NULL, 637);
INSERT INTO `hremployees` VALUES (439, 'hoangvankhac', '2013-10-10 17:39:29', NULL, NULL, '', NULL, NULL, 'khac.tdt@gmail.com', 1, NULL, NULL, NULL, 638);
INSERT INTO `hremployees` VALUES (440, 'mimosa', '2013-10-10 17:56:53', NULL, NULL, '', NULL, NULL, 'mimosa8463@gmail.com', 0, NULL, NULL, NULL, 639);
INSERT INTO `hremployees` VALUES (441, 'phannhu', '2013-10-10 18:39:06', NULL, NULL, '', NULL, NULL, 'phuclove158@gmail.com', 0, NULL, NULL, NULL, 640);
INSERT INTO `hremployees` VALUES (442, 'phongnguyenpian', '2013-10-10 18:48:16', NULL, NULL, '', NULL, NULL, 'phongnguyenpiano@rocketmail.com', 1, NULL, NULL, NULL, 641);
INSERT INTO `hremployees` VALUES (443, 'phan bo', '2013-10-10 19:07:32', NULL, NULL, 'phan bo', '1282139859', NULL, 'bousiuhot@gmail.com', 0, '1970-01-01', 'bảo an, quảng nam', NULL, 642);
INSERT INTO `hremployees` VALUES (444, 'hienesp', '2013-10-10 21:09:01', NULL, NULL, '', NULL, NULL, 'hienessptanhieptg@gmail.com', 1, NULL, NULL, NULL, 643);
INSERT INTO `hremployees` VALUES (445, 'hien123', '2013-10-10 21:22:34', NULL, NULL, '', NULL, NULL, 'hienguyenminh85@gmail.com', 1, NULL, NULL, NULL, 644);
INSERT INTO `hremployees` VALUES (446, 'Long Giang', '2013-10-11 08:04:19', NULL, NULL, '', NULL, NULL, 'thatngaytho@gmail.com', 1, NULL, NULL, NULL, 645);
INSERT INTO `hremployees` VALUES (447, 'rangnv', '2013-10-11 08:16:49', NULL, NULL, '', NULL, NULL, 'rangnv@gmail.com', 1, NULL, NULL, NULL, 646);
INSERT INTO `hremployees` VALUES (448, 'sonphamvan64', '2013-10-11 09:28:23', NULL, NULL, '', NULL, NULL, 'sonphamvan64@yahoo.com.vn', 1, NULL, NULL, NULL, 647);
INSERT INTO `hremployees` VALUES (449, 'dmlexl', '2013-10-11 10:10:36', NULL, NULL, '', NULL, NULL, 'baocohp22@gmail.com', 1, NULL, NULL, NULL, 648);
INSERT INTO `hremployees` VALUES (450, 'YenMinh', '2013-10-11 10:28:22', NULL, NULL, '', NULL, NULL, 'dungpham299@Gmail.com', 1, NULL, NULL, NULL, 649);
INSERT INTO `hremployees` VALUES (451, 'lepham299', '2013-10-11 10:55:24', NULL, NULL, '', NULL, NULL, 'lepham299@Gmail.com', 1, NULL, NULL, NULL, 650);
INSERT INTO `hremployees` VALUES (452, 'phaiyostyle', '2013-10-11 13:31:32', NULL, NULL, '', '909536786', NULL, 'phai@yostyle.com.vn', 1, '1970-01-01', NULL, NULL, 651);
INSERT INTO `hremployees` VALUES (453, 'dungthoi123', '2013-10-11 15:21:51', NULL, NULL, '', NULL, NULL, 'phoenixtruong01@gmail.com', 1, NULL, NULL, NULL, 652);
INSERT INTO `hremployees` VALUES (454, 'dungnguyen', '2013-10-11 17:03:09', NULL, NULL, '', NULL, NULL, 'dung151088@gmail.com', 0, NULL, NULL, NULL, 653);
INSERT INTO `hremployees` VALUES (455, 'votinhkaka', '2013-10-11 18:18:20', NULL, NULL, '', NULL, NULL, 'nguyenvantuan10586@gmail.com', 1, NULL, NULL, NULL, 654);
INSERT INTO `hremployees` VALUES (456, 'leolonghuynh', '2013-10-11 21:18:22', NULL, NULL, '', NULL, NULL, 'huylong.msmart@gmail.com', 1, NULL, NULL, NULL, 655);
INSERT INTO `hremployees` VALUES (457, 'Chestnut9x', '2013-10-11 23:16:24', NULL, NULL, '', NULL, NULL, 'Hatde_9x_ht@yahoo.con', 0, NULL, NULL, NULL, 656);
INSERT INTO `hremployees` VALUES (458, 'misamin', '2013-10-12 00:31:22', NULL, NULL, '', NULL, NULL, 'misamin02@gmail.com', 1, NULL, NULL, NULL, 657);
INSERT INTO `hremployees` VALUES (459, 'huyvantien00', '2013-10-12 13:31:27', NULL, NULL, '', NULL, NULL, 'tuukivan@gmail.com', 1, NULL, NULL, NULL, 658);
INSERT INTO `hremployees` VALUES (460, 'strommate', '2013-10-12 13:38:11', NULL, NULL, '', NULL, NULL, 'sundayisabadday@gmail.com', 1, NULL, NULL, NULL, 659);
INSERT INTO `hremployees` VALUES (461, 'Hacker_no1', '2013-10-12 22:31:14', NULL, NULL, '', NULL, NULL, 'tanht268@gmail.com', 1, NULL, NULL, NULL, 660);
INSERT INTO `hremployees` VALUES (462, 'huongxuan1221', '2013-10-12 23:35:40', NULL, NULL, '', NULL, NULL, 'huongxuan1221@gmail.com', 0, NULL, NULL, NULL, 661);
INSERT INTO `hremployees` VALUES (463, 'congtin1412', '2013-10-13 17:19:04', NULL, NULL, '', NULL, NULL, 'congtin1412@gmail.com', 1, NULL, NULL, NULL, 662);
INSERT INTO `hremployees` VALUES (464, 'hellangel1993', '2013-10-13 17:27:15', NULL, NULL, '', NULL, NULL, 'nguyenducanc1108i@gmail.com', 1, NULL, NULL, NULL, 663);
INSERT INTO `hremployees` VALUES (465, 'fuanxi', '2013-10-14 04:47:26', NULL, NULL, '', NULL, NULL, 'fuanxi0148@gmail.com', 1, NULL, NULL, NULL, 664);
INSERT INTO `hremployees` VALUES (466, 'necaxa', '2013-10-14 07:35:03', NULL, NULL, '', NULL, NULL, 'necaxa.auto@gmail.com', 1, NULL, NULL, NULL, 665);
INSERT INTO `hremployees` VALUES (467, 'hoangtuhoahongd', '2013-10-14 11:16:15', NULL, NULL, '', NULL, NULL, 'hoangtuhoahongdx@gmail.com', 1, NULL, NULL, NULL, 666);
INSERT INTO `hremployees` VALUES (468, 'giangkiht', '2013-10-14 11:17:07', NULL, NULL, '', NULL, NULL, 'giangkiht@yahoo.com.vn', 1, NULL, NULL, NULL, 667);
INSERT INTO `hremployees` VALUES (469, 'HaVanMinh', '2013-10-14 11:32:12', NULL, NULL, '', NULL, NULL, 'havanminh87@gmail.com', 1, NULL, NULL, NULL, 668);
INSERT INTO `hremployees` VALUES (470, 'thuyan1207', '2013-10-14 11:44:26', NULL, NULL, '', NULL, NULL, 'lethuyan1207@gmail.com', 1, NULL, NULL, NULL, 669);
INSERT INTO `hremployees` VALUES (471, 'minhquan2323', '2013-10-14 18:02:05', NULL, NULL, '', NULL, NULL, 'fightfordead@yahoo.com', 1, NULL, NULL, NULL, 670);
INSERT INTO `hremployees` VALUES (472, 'thi my huong', '2013-10-15 00:50:13', NULL, NULL, '', NULL, NULL, 'nguyenthimyhuong19@yahoo.com.vn', 0, NULL, NULL, NULL, 671);
INSERT INTO `hremployees` VALUES (473, 'flyn', '2013-10-15 10:37:46', NULL, NULL, '', NULL, NULL, 'ngoclan.cotqhi2008@gmail.com', 1, NULL, NULL, NULL, 672);
INSERT INTO `hremployees` VALUES (474, 'myphuong1988', '2013-10-15 11:10:18', NULL, NULL, '', NULL, NULL, 'myphuonggtvt@gmail.com', 0, NULL, NULL, NULL, 673);
INSERT INTO `hremployees` VALUES (475, 'linh1993', '2013-10-15 11:57:02', NULL, NULL, '', NULL, NULL, 'linhnn159@gmail.com', 1, NULL, NULL, NULL, 674);
INSERT INTO `hremployees` VALUES (476, 'nguyentrancoop', '2013-10-15 15:10:02', NULL, NULL, '', NULL, NULL, 'nguyentrancoopads@gmail.com', 1, NULL, NULL, NULL, 675);
INSERT INTO `hremployees` VALUES (477, 'thebest', '2013-10-15 15:31:05', NULL, NULL, '', NULL, NULL, 'nguyen_sunny1979@yahoo.com.vn', 1, NULL, NULL, NULL, 676);
INSERT INTO `hremployees` VALUES (478, 'vyvy', '2013-10-15 21:20:35', NULL, NULL, '', NULL, NULL, 'mayshop.hcmc@gmail.com', 0, NULL, NULL, NULL, 677);
INSERT INTO `hremployees` VALUES (479, 'nguyenkien1412', '2013-10-16 08:37:49', NULL, NULL, '', '917070159', NULL, 'ng.kien1412@gmail.com', 1, '1970-01-01', NULL, NULL, 678);
INSERT INTO `hremployees` VALUES (480, 'tuanthuyhang', '2013-10-16 10:22:40', NULL, NULL, '', NULL, NULL, 'tuanthuyhang@yahoo.vom', 1, NULL, NULL, NULL, 679);
INSERT INTO `hremployees` VALUES (481, 'cuongvanle', '2013-10-16 11:43:05', NULL, NULL, '', NULL, NULL, 'cuongdollar0712@gmail.com', 1, NULL, NULL, NULL, 680);
INSERT INTO `hremployees` VALUES (482, 'namjoonpy91', '2013-10-16 13:22:23', NULL, NULL, '', NULL, NULL, 'minhnampy91@gmail.com', 1, NULL, NULL, NULL, 681);
INSERT INTO `hremployees` VALUES (483, 'tranthinh91', '2013-10-16 15:23:50', NULL, NULL, '', NULL, NULL, 'tranthinh2407@gmail.com', 1, NULL, NULL, NULL, 682);
INSERT INTO `hremployees` VALUES (484, 'thuyhang2906', '2013-10-16 16:07:06', NULL, NULL, '', NULL, NULL, 'thuyhang.nguyen2906@gmail.com', 0, NULL, NULL, NULL, 684);
INSERT INTO `hremployees` VALUES (485, 'clownorking', '2013-10-16 17:12:35', NULL, NULL, '', NULL, NULL, 'h_phuongnam@yahoo.com', 1, NULL, NULL, NULL, 685);
INSERT INTO `hremployees` VALUES (486, 'pekhongyeu', '2013-10-16 19:15:37', NULL, NULL, '', NULL, NULL, 'pekhongyeu@gmail.com', 0, NULL, NULL, NULL, 686);
INSERT INTO `hremployees` VALUES (487, 'chamhet', '2013-10-16 20:52:13', NULL, NULL, '', NULL, NULL, 'chamhetlc@yahoo.com', 1, NULL, NULL, NULL, 688);
INSERT INTO `hremployees` VALUES (488, 'Nguyentrungrom', '2013-10-16 21:04:54', NULL, NULL, '', NULL, NULL, 'Nguyentrungrom@yahoo.com.vn', 1, NULL, NULL, NULL, 689);
INSERT INTO `hremployees` VALUES (489, 'vampire_kute', '2013-10-17 08:56:05', NULL, NULL, '', NULL, NULL, 'vampire_kute201995@yahoo.com', 1, NULL, NULL, NULL, 690);
INSERT INTO `hremployees` VALUES (490, 'hoangngocduy', '2013-10-17 08:59:21', NULL, NULL, '', NULL, NULL, 'duyhoang2905@gmail.com', 1, NULL, NULL, NULL, 691);
INSERT INTO `hremployees` VALUES (491, 'vo tran thai', '2013-10-17 09:33:35', NULL, NULL, '', NULL, NULL, 'thaivotrangtvt@gmail.com', 1, NULL, NULL, NULL, 692);
INSERT INTO `hremployees` VALUES (492, 'lucvantien', '2013-10-17 09:50:56', NULL, NULL, '', '97347560', NULL, 'vanphamthanh123@gmail.com', 1, '1992-12-03', NULL, NULL, 693);
INSERT INTO `hremployees` VALUES (493, 'kadu', '2013-10-17 10:59:35', NULL, NULL, '', NULL, NULL, 'damkhanhdung@gmail.com', 0, NULL, NULL, NULL, 694);
INSERT INTO `hremployees` VALUES (494, 'taynguyen89', '2013-10-17 11:13:25', NULL, NULL, '', NULL, NULL, 'taynguyen1989@gmail.com', 1, NULL, NULL, NULL, 695);
INSERT INTO `hremployees` VALUES (495, 'tj3utusjtjnh1', '2013-10-17 13:28:48', NULL, NULL, '', NULL, NULL, 'tj3utusjtjnh1@gmail.com', 1, NULL, NULL, NULL, 696);
INSERT INTO `hremployees` VALUES (496, 'vieclam24h', '2013-10-17 15:51:58', NULL, NULL, '', '963782708', NULL, 'vieclam24h95@yahoo.com', 1, '1970-01-01', NULL, NULL, 697);
INSERT INTO `hremployees` VALUES (497, 'nguyenngoctai', '2013-10-17 16:21:47', NULL, NULL, '', NULL, NULL, 'mrtai2012@gmail.com', 1, NULL, NULL, NULL, 698);
INSERT INTO `hremployees` VALUES (498, 'hoalantim', '2013-10-17 16:30:16', NULL, NULL, '', NULL, NULL, 'huongxoan178@gmail.com', 0, NULL, NULL, NULL, 699);
INSERT INTO `hremployees` VALUES (499, 'Windrainduong', '2013-10-17 19:57:24', NULL, NULL, '', NULL, NULL, 'windrainduong@gmail.com', 1, NULL, NULL, NULL, 700);
INSERT INTO `hremployees` VALUES (500, 'thanh0804', '2013-10-18 08:17:33', NULL, NULL, '', NULL, NULL, 'nguyenthanhthanh080491@gmail.com', 1, NULL, NULL, NULL, 701);
INSERT INTO `hremployees` VALUES (501, 'kid_mushroom', '2013-10-18 08:56:44', NULL, NULL, '', NULL, NULL, 'tranthicam2005@gmail.com', 0, NULL, NULL, NULL, 702);
INSERT INTO `hremployees` VALUES (502, 'leocay113tt', '2013-10-18 10:40:43', NULL, NULL, '', NULL, NULL, 'karamen0406@gmail.com', 1, NULL, NULL, NULL, 703);
INSERT INTO `hremployees` VALUES (503, 'giaquyen.hn', '2013-10-18 11:14:33', NULL, NULL, '', NULL, NULL, 'giaquyen.hn@gmail.com', 1, NULL, NULL, NULL, 704);
INSERT INTO `hremployees` VALUES (504, 'Nguyễn Tiến Vũ', '2013-10-18 13:28:41', NULL, NULL, '', NULL, NULL, 'nguyentienvu1010@gmail.com', 1, '1986-10-10', NULL, NULL, 705);
INSERT INTO `hremployees` VALUES (505, 'thang5790', '2013-10-19 14:06:47', NULL, NULL, '', NULL, NULL, 'toiyeuem5790@gmail.com', 1, NULL, NULL, NULL, 706);
INSERT INTO `hremployees` VALUES (506, 'titigerbond', '2013-10-19 16:20:24', NULL, NULL, '', NULL, NULL, 'haupolice200@yahoo.com.vn', 1, NULL, NULL, NULL, 707);
INSERT INTO `hremployees` VALUES (507, 'thaotrang', '2013-10-19 17:15:14', NULL, NULL, '', NULL, NULL, 'thaotrang1309@gmail.com', 0, NULL, NULL, NULL, 708);
INSERT INTO `hremployees` VALUES (508, 'bpnhu18', '2013-10-19 18:26:32', NULL, NULL, '', NULL, NULL, 'bpnhu18@gmail.com', 0, NULL, NULL, NULL, 709);
INSERT INTO `hremployees` VALUES (509, 'lucthanhquang', '2013-10-19 20:01:31', NULL, NULL, '', NULL, NULL, 'luc.thanhquang@yahoo.com.vn', 1, NULL, NULL, NULL, 710);
INSERT INTO `hremployees` VALUES (510, 'maxbudyrank', '2013-10-20 01:04:38', NULL, NULL, '', NULL, NULL, 'maxbudyrank@gmail.com', 1, NULL, NULL, NULL, 711);
INSERT INTO `hremployees` VALUES (511, 'khacecs1989', '2013-10-20 15:03:59', NULL, NULL, '', NULL, NULL, 'khacecs1989@yahoo.com', 1, NULL, NULL, NULL, 712);
INSERT INTO `hremployees` VALUES (512, 'Vũ Hào Quang', '2013-10-20 15:09:18', NULL, NULL, 'Vũ Hào Quang', NULL, NULL, 'haoquang_71089@yahoo.com', 1, '1989-10-10', NULL, NULL, 713);
INSERT INTO `hremployees` VALUES (513, 'NHATNGUYEN_89', '2013-10-20 22:12:15', NULL, NULL, '', NULL, NULL, 'nhatnguyen_89@yahoo.com.vn', 1, NULL, NULL, NULL, 714);
INSERT INTO `hremployees` VALUES (514, 'phuoctho', '2013-10-21 12:01:36', NULL, NULL, '', NULL, NULL, 'phuoctho041991@yahoo.com.vn', 1, NULL, NULL, NULL, 715);
INSERT INTO `hremployees` VALUES (515, 'meoden', '2013-10-21 12:52:46', NULL, NULL, '', NULL, NULL, 'nhanviquy@yahoo.com.vn', 1, NULL, NULL, NULL, 716);
INSERT INTO `hremployees` VALUES (516, 'phucthinhfood', '2013-10-21 15:35:31', NULL, NULL, '', NULL, NULL, 'tuyet9xphucthinhfood@gmail.com', 0, NULL, NULL, NULL, 717);
INSERT INTO `hremployees` VALUES (517, 'minhthao', '2013-10-21 16:25:40', NULL, NULL, '', NULL, NULL, 'cafedang1122@gmail.com', 1, NULL, NULL, NULL, 718);
INSERT INTO `hremployees` VALUES (518, 'thuthao', '2013-10-21 17:05:39', NULL, NULL, '', NULL, NULL, 'balack_cham_com@yahoo.com', 0, NULL, NULL, NULL, 719);
INSERT INTO `hremployees` VALUES (519, 'badboy1512', '2013-10-21 19:00:26', NULL, NULL, '', NULL, NULL, 'lang_tu_bang_gia_1512@yahoo.com', 1, NULL, NULL, NULL, 720);
INSERT INTO `hremployees` VALUES (520, 'haukute', '2013-10-21 19:13:50', NULL, NULL, '', NULL, NULL, 'thaiquochau@gmail.com', 1, NULL, NULL, NULL, 721);
INSERT INTO `hremployees` VALUES (521, 'nh0xr00m19', '2013-10-21 19:22:33', NULL, NULL, '', NULL, NULL, 'nh0xr00m19@zing.vn', 1, NULL, NULL, NULL, 722);
INSERT INTO `hremployees` VALUES (522, 'phihangthoa1990', '2013-10-21 23:14:39', NULL, NULL, '', NULL, NULL, 'thoa.pro90@gmail.com', 0, NULL, NULL, NULL, 723);
INSERT INTO `hremployees` VALUES (523, 'tuyenfenspkt', '2013-10-22 17:50:45', NULL, NULL, '', NULL, NULL, 'tuyenfenspkt@gmail.com', 1, NULL, NULL, NULL, 724);
INSERT INTO `hremployees` VALUES (524, 'Lê Vân Anh', '2013-10-22 22:43:10', NULL, NULL, '', NULL, NULL, 'vananhkkt@gmail.com', 0, NULL, NULL, NULL, 726);
INSERT INTO `hremployees` VALUES (525, 'ping', '2013-10-22 23:08:26', NULL, NULL, '', NULL, NULL, 'nguyennga2286@gmail.com', 0, NULL, NULL, NULL, 727);
INSERT INTO `hremployees` VALUES (526, 'drtoan198', '2013-10-23 10:09:05', NULL, NULL, '', NULL, NULL, 'drtoan198tnpro@gmail.com', 1, NULL, NULL, NULL, 728);
INSERT INTO `hremployees` VALUES (527, 'songquan72', '2013-10-23 11:06:47', NULL, NULL, '', NULL, NULL, 'songquancnttbk@gmail.com', 1, NULL, NULL, NULL, 729);
INSERT INTO `hremployees` VALUES (528, 'Trần Thị Liễu', '2013-10-23 13:11:05', NULL, NULL, '', NULL, NULL, 'lieutran0310@yahoo.com.vn', 0, NULL, NULL, NULL, 730);
INSERT INTO `hremployees` VALUES (529, 'baluutp90', '2013-10-23 21:10:18', NULL, NULL, '', NULL, NULL, 'phanbaluu@gmail.com', 1, NULL, NULL, NULL, 731);
INSERT INTO `hremployees` VALUES (530, 'drlong', '2013-10-23 21:17:32', NULL, NULL, '', NULL, NULL, 'tranlong_vatly@yahoo.com.vn', 1, NULL, NULL, NULL, 732);
INSERT INTO `hremployees` VALUES (531, 'giapham', '2013-10-24 13:58:22', NULL, NULL, '', NULL, NULL, 'ducgia.haui@gmail.com', 1, NULL, NULL, NULL, 733);
INSERT INTO `hremployees` VALUES (532, 'Phan Vũ Ngu', '2013-10-24 15:39:10', NULL, NULL, 'Phan Vũ Ngu', NULL, NULL, 'voicenguyn@yahoo.com.vn', 1, NULL, 'Hợp Thành', NULL, 734);
INSERT INTO `hremployees` VALUES (533, 'ivanvu1211', '2013-10-24 18:46:05', NULL, NULL, '', NULL, NULL, 'ivanvu.galaxy@gmail.com', 1, NULL, NULL, NULL, 735);
INSERT INTO `hremployees` VALUES (534, 'truyenthong', '2013-10-25 08:22:07', NULL, NULL, '', NULL, NULL, 'truyenthongcongdong.com@gmail.com', 1, NULL, NULL, NULL, 736);
INSERT INTO `hremployees` VALUES (535, 'pham thanh dung', '2013-10-25 15:49:08', NULL, NULL, '', NULL, NULL, 'daiatanphong@yahoo.com', 1, NULL, NULL, NULL, 737);
INSERT INTO `hremployees` VALUES (536, 'phongpost', '2013-10-25 22:10:39', NULL, NULL, '', '0', NULL, 'cthshool@gmail.com', 1, '1970-01-01', NULL, NULL, 738);
INSERT INTO `hremployees` VALUES (537, 'congcover', '2013-10-26 20:52:23', NULL, NULL, '', NULL, NULL, 'rapperc100@gmail.com', 1, NULL, NULL, NULL, 739);
INSERT INTO `hremployees` VALUES (538, 'gund12', '2013-10-26 21:07:26', NULL, NULL, '', NULL, NULL, 'buiphidung031194@gmail.com', 1, NULL, NULL, NULL, 740);
INSERT INTO `hremployees` VALUES (539, 'dautaydautay', '2013-10-27 21:49:55', NULL, NULL, '', NULL, NULL, 'ducanhk41k@gmail.com', 1, NULL, NULL, NULL, 741);
INSERT INTO `hremployees` VALUES (540, 'kimhoant70', '2013-10-28 08:45:10', NULL, NULL, '', NULL, NULL, 'kimhoant70@gmail.com', 0, NULL, NULL, NULL, 742);
INSERT INTO `hremployees` VALUES (541, 'vvtdt', '2013-10-28 10:10:55', NULL, NULL, '', NULL, NULL, 'vovantungdt1208@yahoo.com', 1, NULL, NULL, NULL, 743);
INSERT INTO `hremployees` VALUES (542, 'vuhung', '2013-10-28 10:19:55', NULL, NULL, '', NULL, NULL, 'vuhungamye@gmail.com', 1, NULL, NULL, NULL, 744);
INSERT INTO `hremployees` VALUES (543, 'truong chi tinh', '2013-10-30 12:52:43', NULL, NULL, 'truong chi tinh', '0', NULL, 'truongchitinh1357890@gmail.com', 1, '1970-01-01', NULL, NULL, 745);
INSERT INTO `hremployees` VALUES (544, 'nguyenvanvux', '2013-10-30 16:38:03', NULL, NULL, '', NULL, NULL, 'vuvipkta12x6pro@yahoo.com', 1, NULL, NULL, NULL, 746);
INSERT INTO `hremployees` VALUES (545, 'thanh dung', '2013-10-31 02:32:57', NULL, NULL, '', NULL, NULL, 'traibocaudongnai@gmail.com', 1, NULL, NULL, NULL, 747);
INSERT INTO `hremployees` VALUES (546, 'fantasy_love', '2013-10-31 23:28:01', NULL, NULL, '', NULL, NULL, 'dinhquangnguyen.10h.neu@gmail.com', 1, NULL, NULL, NULL, 748);
INSERT INTO `hremployees` VALUES (547, 'duycopier', '2014-02-10 19:57:36', NULL, NULL, '', NULL, NULL, 'duycopier@gmail.com', 1, NULL, NULL, NULL, 749);
INSERT INTO `hremployees` VALUES (548, 'vuvuong2606', '2013-11-01 16:50:38', NULL, NULL, '', NULL, NULL, 'vuvuong2606@gmail.com', 1, NULL, NULL, NULL, 750);
INSERT INTO `hremployees` VALUES (549, 'Hoàng Ngọc', '2013-11-02 17:58:38', NULL, NULL, 'Hoàng Ngọc', NULL, NULL, 'hoangvanngoc37@gmail.com', 1, NULL, NULL, NULL, 751);
INSERT INTO `hremployees` VALUES (550, 'JVPhuoc', '2013-11-03 10:29:46', NULL, NULL, '', NULL, NULL, 'champhong199513@gmail.com', 1, NULL, NULL, NULL, 752);
INSERT INTO `hremployees` VALUES (551, 'huuanhht', '2013-11-03 20:08:05', NULL, NULL, '', NULL, NULL, 'huuanhht@yahoo.com.vn', 1, NULL, NULL, NULL, 753);
INSERT INTO `hremployees` VALUES (552, 'kunzubi', '2013-11-03 21:16:34', NULL, NULL, '', NULL, NULL, 'kunzubi@zing.vn', 1, NULL, NULL, NULL, 754);
INSERT INTO `hremployees` VALUES (553, 'ngonlua123', '2013-11-03 22:03:10', NULL, NULL, '', NULL, NULL, 'viettan1992@yahoo.com.vn', 1, NULL, NULL, NULL, 755);
INSERT INTO `hremployees` VALUES (554, 'numberonce', '2013-06-20 00:00:00', NULL, NULL, 'numberonce', NULL, NULL, 'numberonce@gmail.com', 0, '1989-05-04', NULL, NULL, 756);
INSERT INTO `hremployees` VALUES (555, 'hungnq', '2013-11-04 12:28:46', NULL, NULL, '', NULL, NULL, 'nqhung.xmsg@gmail.com', 1, NULL, NULL, NULL, 757);
INSERT INTO `hremployees` VALUES (556, 'tuyet phuong', '2013-11-04 13:28:17', NULL, NULL, '', NULL, NULL, 'lapphuong90@gmail.com', 0, NULL, NULL, NULL, 758);
INSERT INTO `hremployees` VALUES (557, 'myhanhqt1983', '2013-11-04 15:26:43', NULL, NULL, '', NULL, NULL, 'myhanhqt1983@gmail.com', 0, NULL, NULL, NULL, 759);
INSERT INTO `hremployees` VALUES (558, 'thuynguyen', '2013-11-04 19:17:46', NULL, NULL, '', NULL, NULL, 'nguyenthithuydn2812@gmail.com', 0, NULL, NULL, NULL, 760);
INSERT INTO `hremployees` VALUES (559, 'ngocphuong2014', '2013-11-05 02:08:48', NULL, NULL, '', NULL, NULL, 'ngocphuong2014@gmail.com', 1, NULL, NULL, NULL, 761);
INSERT INTO `hremployees` VALUES (560, 'pvk007hd', '2013-11-05 08:53:37', NULL, NULL, '', NULL, NULL, 'KhoaCleverley@gmail.com.vn', 1, NULL, NULL, NULL, 762);
INSERT INTO `hremployees` VALUES (561, 'tronghieu512', '2013-11-06 01:57:25', NULL, NULL, '', NULL, NULL, 'tronghieu512@gmail.com', 1, NULL, NULL, NULL, 764);
INSERT INTO `hremployees` VALUES (562, 'Edward Evans', '2013-11-07 17:01:26', NULL, NULL, 'Edward Evans', NULL, NULL, 'hoan.dh_it8791@yahoo.com.vn', 1, NULL, NULL, NULL, 765);
INSERT INTO `hremployees` VALUES (563, 'tphcmtb', '2013-11-07 19:22:48', NULL, NULL, '', NULL, NULL, 'tphcmtb@yahoo.com', 1, NULL, NULL, NULL, 766);
INSERT INTO `hremployees` VALUES (564, 'kabinh', '2013-11-07 21:15:32', NULL, NULL, '', NULL, NULL, 'kabinh11@gmail.com', 1, NULL, NULL, NULL, 767);
INSERT INTO `hremployees` VALUES (565, 'choxua', '2013-11-08 08:51:59', NULL, NULL, '', NULL, NULL, 'choxua.com@gmail.com', 1, NULL, NULL, NULL, 768);
INSERT INTO `hremployees` VALUES (566, 'tuanvu', '2013-11-08 09:11:50', NULL, NULL, '', NULL, NULL, 'giobuoncuanhuong@gmail.com', 1, NULL, NULL, NULL, 769);
INSERT INTO `hremployees` VALUES (567, 'ngochus', '2013-11-08 10:09:22', NULL, NULL, '', NULL, NULL, 'ngochus@gmail.com', 1, NULL, NULL, NULL, 770);
INSERT INTO `hremployees` VALUES (568, 'uyennguyen', '2013-11-08 11:28:04', NULL, NULL, '', NULL, NULL, 'little_ruby0909@yahoo.com', 0, NULL, NULL, NULL, 771);
INSERT INTO `hremployees` VALUES (569, 'thephong', '2013-11-08 11:35:38', NULL, NULL, '', NULL, NULL, 'ilovelonely@gmail.com', 0, NULL, NULL, NULL, 772);
INSERT INTO `hremployees` VALUES (570, 'hongnguyen262', '2013-11-08 13:10:45', NULL, NULL, '', NULL, NULL, 'hongnguyen262@gmail.com', 1, NULL, NULL, NULL, 773);
INSERT INTO `hremployees` VALUES (571, 'congtacvien', '2013-11-08 16:45:28', NULL, NULL, '', NULL, NULL, 'davidman.mdv@gmail.com', 1, NULL, NULL, NULL, 774);
INSERT INTO `hremployees` VALUES (572, 'kennasam', '2013-11-08 19:59:14', NULL, NULL, '', NULL, NULL, 'kennasam@gmail.com', 1, NULL, NULL, NULL, 775);
INSERT INTO `hremployees` VALUES (573, 'giathieuhuy', '2013-11-09 08:32:34', NULL, NULL, '', NULL, NULL, 'giathieuhuy@gmail.com', 1, NULL, NULL, NULL, 776);
INSERT INTO `hremployees` VALUES (574, 'khucphuongan', '2013-11-09 09:09:56', NULL, NULL, '', NULL, NULL, 'khucphuongan@yahoo.com.vn', 0, NULL, NULL, NULL, 777);
INSERT INTO `hremployees` VALUES (575, 'yukitruong', '2013-11-09 20:22:35', NULL, NULL, '', NULL, NULL, 'heorungthang8@gmail.com', 1, NULL, NULL, NULL, 778);
INSERT INTO `hremployees` VALUES (576, 'googlenex7', '2013-11-09 21:49:26', NULL, NULL, '', NULL, NULL, 'semaiyeuemnhuvay_2604@yahoo.com', 1, NULL, NULL, NULL, 779);
INSERT INTO `hremployees` VALUES (577, 'ruby_dat', '2013-11-09 21:58:02', NULL, NULL, '', NULL, NULL, 'thanhdat.stiven@gmail.com', 1, NULL, NULL, NULL, 780);
INSERT INTO `hremployees` VALUES (578, 'cungduoc', '2013-11-09 22:01:02', NULL, NULL, '', NULL, NULL, 'ducmauvalua@yahoo.com', 1, NULL, NULL, NULL, 781);
INSERT INTO `hremployees` VALUES (579, 'bichngoc', '2013-11-10 11:50:15', NULL, NULL, '', NULL, NULL, 'manhvuncuakiuc@gmail.com', 0, '1998-01-01', NULL, NULL, 782);
INSERT INTO `hremployees` VALUES (580, 'datvpdkqn', '2013-11-10 12:02:44', NULL, NULL, '', NULL, NULL, 'datvpdkqn@gmail.com', 1, NULL, NULL, NULL, 783);
INSERT INTO `hremployees` VALUES (581, 'tamit87', '2013-11-10 21:05:50', NULL, NULL, '', NULL, NULL, 'tamit87@gmail.com', 1, NULL, NULL, NULL, 784);
INSERT INTO `hremployees` VALUES (582, 'chiquocvn', '2013-11-10 21:37:38', NULL, NULL, '', NULL, NULL, 'chiquocvn@yahoo.com', 1, NULL, NULL, NULL, 785);
INSERT INTO `hremployees` VALUES (583, 'tinyheo', '2013-11-10 22:02:40', NULL, NULL, '', NULL, NULL, 'thienthanhomenh21290@yahoo.com', 0, NULL, NULL, NULL, 786);
INSERT INTO `hremployees` VALUES (584, 'Chipshop', '2013-11-11 08:21:12', NULL, NULL, '', NULL, NULL, 'chipshop91@gmail.com', 0, NULL, NULL, NULL, 787);
INSERT INTO `hremployees` VALUES (585, 'love22k', '2013-11-11 09:52:54', NULL, NULL, '', NULL, NULL, 'phammyviennghiencuu@gmail.com', 0, NULL, NULL, NULL, 788);
INSERT INTO `hremployees` VALUES (586, 'bautroi', '2013-11-11 13:43:03', NULL, NULL, '', NULL, NULL, 'auchau18@yahoo.com', 0, NULL, NULL, NULL, 789);
INSERT INTO `hremployees` VALUES (587, 'heyuying', '2013-11-11 19:44:24', NULL, NULL, '', NULL, NULL, 'julie.he2012@gmail.com', 0, NULL, NULL, NULL, 790);
INSERT INTO `hremployees` VALUES (588, 'Vo Minh Kha', '2013-11-11 22:41:00', NULL, NULL, 'Vo Minh Kha', '946511616', NULL, 'vmkha1986@gmail.com', 1, '1970-01-01', NULL, NULL, 791);
INSERT INTO `hremployees` VALUES (589, 'maica30_3_2010', '2013-11-12 08:25:23', NULL, NULL, '', NULL, NULL, '01685696179@ming.vn', 0, NULL, NULL, NULL, 792);
INSERT INTO `hremployees` VALUES (590, 'dieuxuanpham', '2013-11-12 09:40:29', NULL, NULL, '', NULL, NULL, 'trungtre@vnn.vn', 0, NULL, NULL, NULL, 793);
INSERT INTO `hremployees` VALUES (591, 'hoathientrang', '2013-11-12 10:15:51', NULL, NULL, '', NULL, NULL, 'trethanhtruc@vnn.vn', 0, NULL, NULL, NULL, 794);
INSERT INTO `hremployees` VALUES (592, 'mrtan0001', '2013-11-12 13:06:39', NULL, NULL, '', NULL, NULL, 'mr.tan0001@gmail.com', 1, NULL, NULL, NULL, 795);
INSERT INTO `hremployees` VALUES (593, 'bocasa', '2013-11-14 01:30:52', NULL, NULL, '', NULL, NULL, 'thienthanh3983@gmail.com', 1, NULL, NULL, NULL, 796);
INSERT INTO `hremployees` VALUES (594, 'Phi Nguyen', '2013-11-14 13:03:55', NULL, NULL, 'Phi Nguyen', NULL, NULL, 'nguyenthiyenphi7793@yahoo.com.vn', 0, NULL, NULL, NULL, 797);
INSERT INTO `hremployees` VALUES (595, 'MinhTuTe1993', '2013-11-14 16:19:48', NULL, NULL, '', NULL, NULL, 'doantueminh.512@gmail.com', 1, NULL, NULL, NULL, 798);
INSERT INTO `hremployees` VALUES (596, 'Minh28', '2013-11-14 16:30:19', NULL, NULL, '', NULL, NULL, 'dtm2404@gmail.com', 1, NULL, NULL, NULL, 799);
INSERT INTO `hremployees` VALUES (597, 'lythong199', '2013-11-15 11:05:16', NULL, NULL, '', NULL, NULL, 'nghilvps00433@fpt.edu.vn', 1, NULL, NULL, NULL, 800);
INSERT INTO `hremployees` VALUES (598, 'vyvutn12', '2013-11-15 11:19:48', NULL, NULL, '', NULL, NULL, 'nguyenvukhuong93@gmail.com', 1, NULL, NULL, NULL, 801);
INSERT INTO `hremployees` VALUES (599, 'buithanhthiep', '2013-11-15 11:37:30', NULL, NULL, '', NULL, NULL, 'buithanhthiep@gmail.com', 1, NULL, NULL, NULL, 802);
INSERT INTO `hremployees` VALUES (600, 'tan10ckn', '2013-11-15 13:42:47', NULL, NULL, '', NULL, NULL, 'tan10ckn@gmail.com', 1, NULL, NULL, NULL, 803);
INSERT INTO `hremployees` VALUES (601, 'Đặng Đình Khanh', '2013-11-15 15:35:01', NULL, NULL, 'Đặng Đình Khanh', '914799998', NULL, 'khanhapple9999@gmail.com', 1, '1970-01-01', '164 Lê Quang Định F14 Q.Bình Thạnh TPHCM<br />', NULL, 804);
INSERT INTO `hremployees` VALUES (602, 'v.nguyen90', '2013-11-15 16:30:46', NULL, NULL, '', NULL, NULL, 'v.nguyen90@yahoo.de', 1, NULL, NULL, NULL, 805);
INSERT INTO `hremployees` VALUES (603, 'tantan2013', '2013-11-15 18:14:15', NULL, NULL, '', NULL, NULL, 'sun.rising89@gmail.com', 1, NULL, NULL, NULL, 806);
INSERT INTO `hremployees` VALUES (604, 'chien197', '2013-11-17 08:06:43', NULL, NULL, '', NULL, NULL, 'canemchien@gmail.com', 1, NULL, NULL, NULL, 807);
INSERT INTO `hremployees` VALUES (605, 'DjBvl Gari', '2013-11-17 20:47:59', NULL, NULL, 'DjBvl Gari', NULL, NULL, 'djbvlgari87@gmail.com', 1, NULL, NULL, NULL, 808);
INSERT INTO `hremployees` VALUES (606, 'chunghuuhien', '2013-11-17 21:30:12', NULL, NULL, '', NULL, NULL, 'niit_chunghuuhien@yahoo.com.vn', 1, NULL, NULL, NULL, 809);
INSERT INTO `hremployees` VALUES (607, '230798nts', '2013-11-18 19:03:27', NULL, NULL, '', NULL, NULL, 'rightway.98x@gmai.com', 1, NULL, NULL, NULL, 811);
INSERT INTO `hremployees` VALUES (608, 'nhoklikute_93', '2013-11-18 20:04:02', NULL, NULL, '', NULL, NULL, 'nhokli0793@gmail.com', 0, NULL, NULL, NULL, 812);
INSERT INTO `hremployees` VALUES (609, 'kunut612', '2013-11-19 00:23:27', NULL, NULL, '', NULL, NULL, 'thaokun512@gmail.com', 0, NULL, NULL, NULL, 813);
INSERT INTO `hremployees` VALUES (610, 'fiestahdt', '2013-11-19 11:11:10', NULL, NULL, '', NULL, NULL, 'ducthinhhoang51@gmail.com', 1, NULL, NULL, NULL, 814);
INSERT INTO `hremployees` VALUES (611, 'kienpx31', '2013-11-19 11:31:45', NULL, NULL, '', NULL, NULL, 'kienpham317ks@gmail.com', 1, NULL, NULL, NULL, 815);
INSERT INTO `hremployees` VALUES (612, 'van', '2013-11-19 12:18:18', NULL, NULL, '', NULL, NULL, 'dominic2588@gmail.com', 1, NULL, NULL, NULL, 816);
INSERT INTO `hremployees` VALUES (613, 'vinhanan', '2013-11-20 10:57:53', NULL, NULL, '', NULL, NULL, 'vinhangtvt@gmail.com', 1, NULL, NULL, NULL, 817);
INSERT INTO `hremployees` VALUES (614, 'tuanvinh2803', '2013-11-21 12:16:21', NULL, NULL, '', NULL, NULL, 'tuanvinh280392@gmail.com', 1, NULL, NULL, NULL, 818);
INSERT INTO `hremployees` VALUES (615, 'NamMeo', '2013-11-21 14:33:08', NULL, NULL, '', NULL, NULL, 'hoaianhdongphu93@gmail.com', 1, NULL, NULL, NULL, 819);
INSERT INTO `hremployees` VALUES (616, 'togialinh', '2013-11-23 11:38:32', NULL, NULL, '', NULL, NULL, 'togialinh@yahoo.com.vn', 1, NULL, NULL, NULL, 822);
INSERT INTO `hremployees` VALUES (617, 'hdtiep', '2013-11-27 23:03:33', NULL, NULL, '', NULL, NULL, 'hdtiep@gmail.com', 1, NULL, NULL, NULL, 823);
INSERT INTO `hremployees` VALUES (618, 'khangkhai', '2013-11-29 07:42:02', NULL, NULL, '', NULL, NULL, 'khangmaiyeuman@gmail.com', 1, NULL, NULL, NULL, 824);
INSERT INTO `hremployees` VALUES (619, 'Huỳnh Phát', '2013-11-30 11:17:01', NULL, NULL, 'Huỳnh Phát', '937881924', NULL, 'yanfa2012@gmail.com', 1, '1980-01-01', '132 Xóm Chiếu Q4', NULL, 825);
INSERT INTO `hremployees` VALUES (620, 'hungsatan', '2013-12-05 23:33:39', NULL, NULL, '', '986151591', NULL, 'tranlevanhung@gmail.com', 1, '1970-01-01', 'Nga liên - Nga Sơn - Thanh Hóa', NULL, 826);
INSERT INTO `hremployees` VALUES (621, 'Thienminh073', '2013-12-07 22:18:53', NULL, NULL, '', NULL, NULL, 'Minhphunh90@gmail.com', 1, NULL, NULL, NULL, 827);
INSERT INTO `hremployees` VALUES (622, 'hoangbrother', '2013-12-14 08:20:40', NULL, NULL, '', NULL, NULL, 'hoangbrother271@gmail.com', 1, NULL, NULL, NULL, 829);
INSERT INTO `hremployees` VALUES (623, 'jonlyken', '2013-12-16 15:50:52', NULL, NULL, '', NULL, NULL, 'jonly.ken230390@gmail.com', 1, NULL, NULL, NULL, 830);
INSERT INTO `hremployees` VALUES (624, 'phongvan99', '2013-12-17 09:50:26', NULL, NULL, '', NULL, NULL, 'phongvan_99999@yahoo.com.vn', 1, '1998-01-04', NULL, NULL, 831);
INSERT INTO `hremployees` VALUES (625, 'minhduc1988', '2013-12-20 12:22:19', NULL, NULL, '', NULL, NULL, 'duc.truongminh2009@gmail.com', 1, NULL, NULL, NULL, 832);
INSERT INTO `hremployees` VALUES (626, 'hien005', '2013-12-24 15:07:07', NULL, NULL, '', NULL, NULL, 'hien005@yahoo.com', 1, NULL, NULL, NULL, 833);
INSERT INTO `hremployees` VALUES (627, 'ronaldo', '2013-12-26 10:54:34', NULL, NULL, '', NULL, NULL, 'ronaldo21122012@gmail.com', 1, NULL, NULL, NULL, 834);
INSERT INTO `hremployees` VALUES (628, 'doanphi', '2013-12-26 23:21:45', NULL, NULL, '', NULL, NULL, 'doanphi999@gmail.com', 1, NULL, NULL, NULL, 835);
INSERT INTO `hremployees` VALUES (629, 'pigdeath', '2013-12-27 14:46:24', NULL, NULL, '', NULL, NULL, 'traingheo_votbeo_dichoichat@yahoo.com', 1, NULL, NULL, NULL, 836);
INSERT INTO `hremployees` VALUES (630, 'nguyenvuson279', '2013-12-29 23:45:20', NULL, NULL, '', NULL, NULL, 'nguyenvuson279@gmail.com', 1, NULL, NULL, NULL, 837);
INSERT INTO `hremployees` VALUES (631, 'mavuongsoi', '2014-01-02 12:09:55', NULL, NULL, '', NULL, NULL, 'duongnguyenpro93@gmail.com', 1, NULL, NULL, NULL, 838);
INSERT INTO `hremployees` VALUES (632, 'vantran1989', '2014-01-03 12:34:31', NULL, NULL, '', NULL, NULL, 'vantran1989@ymail.com', 1, NULL, NULL, NULL, 839);
INSERT INTO `hremployees` VALUES (633, 'prodigy_97', '2014-01-03 21:54:50', NULL, NULL, '', NULL, NULL, 'sieurua2012@gmail.com', 1, NULL, NULL, NULL, 840);
INSERT INTO `hremployees` VALUES (634, 'nhokpro2907', '2014-01-05 21:58:51', NULL, NULL, '', NULL, NULL, 'nhokpro2907@gmail.com', 1, NULL, NULL, NULL, 841);
INSERT INTO `hremployees` VALUES (635, 'makemmo4812', '2014-01-08 19:42:09', NULL, NULL, '', NULL, NULL, 'make.mmo.4812@gmail.com', 1, NULL, NULL, NULL, 842);
INSERT INTO `hremployees` VALUES (636, 'pelcolcolor', '2014-01-10 17:03:45', NULL, NULL, '', NULL, NULL, 'quannguyen2712@gmail.com', 1, NULL, NULL, NULL, 843);
INSERT INTO `hremployees` VALUES (637, 'maithanhthuy132', '2014-01-11 23:58:47', NULL, NULL, '', NULL, NULL, 'maithanhthuy132th@gmail.com', 0, NULL, NULL, NULL, 844);
INSERT INTO `hremployees` VALUES (638, 'haison789789', '2014-01-14 19:14:55', NULL, NULL, '', NULL, NULL, 'haison789789@gmail.com', 1, NULL, NULL, NULL, 845);
INSERT INTO `hremployees` VALUES (639, 'phongvan6489', '2014-01-15 09:30:02', NULL, NULL, '', NULL, NULL, 'phongvan6489@gmail.com', 1, NULL, NULL, NULL, 846);
INSERT INTO `hremployees` VALUES (640, 'ahkiem32', '2014-01-15 10:03:34', NULL, NULL, '', NULL, NULL, 'peterkhoa2004@yahoo.com', 1, NULL, NULL, NULL, 847);
INSERT INTO `hremployees` VALUES (641, 'giaquy', '2014-01-17 22:58:17', NULL, NULL, '', NULL, NULL, 'giaquy_nguyenle@yahoo.com', 0, NULL, NULL, NULL, 848);
INSERT INTO `hremployees` VALUES (642, 'langtuminh82', '2014-01-24 20:10:04', NULL, NULL, '', NULL, NULL, 'langtuminh82@yahoo.com.vn', 1, NULL, NULL, NULL, 849);
INSERT INTO `hremployees` VALUES (643, 'heroherohero', '2014-02-16 11:07:57', NULL, NULL, '', NULL, NULL, 'lamquanghung88@gmail.com', 1, NULL, NULL, NULL, 850);
INSERT INTO `hremployees` VALUES (644, 'Hoangvinhtni', '2014-02-17 18:09:14', NULL, NULL, '', NULL, NULL, 'hoangvinhtni@gmail.com', 1, NULL, NULL, NULL, 851);
INSERT INTO `hremployees` VALUES (645, 'qwerty', '2014-02-18 23:27:30', NULL, NULL, '', NULL, NULL, 'qwerty@gmail.com', 1, NULL, NULL, NULL, 852);
INSERT INTO `hremployees` VALUES (646, 'Letincorp', '2014-02-21 11:11:59', NULL, NULL, '', NULL, NULL, 'nguyenlan.letin@gmail.com', 0, NULL, NULL, NULL, 853);
INSERT INTO `hremployees` VALUES (647, 'Luoilaodong', '2014-02-26 00:17:07', NULL, NULL, '', NULL, NULL, 'Chetcoso@gmail.com', 1, NULL, NULL, NULL, 854);
INSERT INTO `hremployees` VALUES (648, 'trien.dv', '2014-02-28 15:05:59', NULL, NULL, '', NULL, NULL, 'duongtrien.kt@gmail.com', 1, NULL, NULL, NULL, 855);
INSERT INTO `hremployees` VALUES (649, 'koi_9x2', '2014-03-01 03:14:26', NULL, NULL, '', NULL, NULL, 'nobita_9x2@yahoo.com', 1, NULL, NULL, NULL, 856);
INSERT INTO `hremployees` VALUES (650, 'greenfields', '2014-03-04 15:28:31', NULL, NULL, '', NULL, NULL, 'thaonguyen37.cute@gmail.com', 0, NULL, NULL, NULL, 857);
INSERT INTO `hremployees` VALUES (651, 'pv90', '2014-03-05 09:07:39', NULL, NULL, '', NULL, NULL, 'quochiep218@gmail.com', 1, NULL, NULL, NULL, 858);
INSERT INTO `hremployees` VALUES (652, 'votay', '2014-03-08 14:54:04', NULL, NULL, '', NULL, NULL, 'vodangbinhtay@gmail.com', 1, NULL, NULL, NULL, 859);
INSERT INTO `hremployees` VALUES (653, 'tuananh', '2014-03-11 20:29:32', NULL, NULL, '', NULL, NULL, 'tuananhpham6001@gmail.com', 1, NULL, NULL, NULL, 860);
INSERT INTO `hremployees` VALUES (654, 'huyenduc0808', '2014-03-13 04:33:40', NULL, NULL, '', NULL, NULL, 'huyenduc0808@gmail.com', 1, NULL, NULL, NULL, 861);
INSERT INTO `hremployees` VALUES (655, 'anhchangtimbaxa', '2014-03-15 14:04:45', NULL, NULL, '', NULL, NULL, 'anchangtimbaxa@gmail.com', 1, NULL, NULL, NULL, 862);

-- ----------------------------
-- Table structure for hrpoints
-- ----------------------------
DROP TABLE IF EXISTS `hrpoints`;
CREATE TABLE `hrpoints`  (
  `HRPointID` int(10) NOT NULL AUTO_INCREMENT,
  `HRPointNumber` double NULL DEFAULT NULL,
  `HRPointNumberReward` double NULL DEFAULT NULL,
  `HRPointUpdateDate` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `HRPointRewardDate` datetime(0) NULL DEFAULT NULL,
  `HRPointRewardTime` datetime(0) NULL DEFAULT NULL,
  `FK_HREmployeeID` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`HRPointID`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 457 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Fixed;

-- ----------------------------
-- Records of hrpoints
-- ----------------------------
INSERT INTO `hrpoints` VALUES (1, 2653, 0, NULL, '2013-11-23 23:54:34', '2013-11-24 00:00:00', 1);
INSERT INTO `hrpoints` VALUES (2, 4234, 0, '2013-11-19 20:31:22', '2013-10-02 14:54:17', '2013-11-12 00:00:00', 2);
INSERT INTO `hrpoints` VALUES (3, 3429, 0, NULL, '2013-10-02 14:54:17', NULL, 3);
INSERT INTO `hrpoints` VALUES (4, 225, 0, NULL, '2013-10-02 14:54:17', NULL, 4);
INSERT INTO `hrpoints` VALUES (5, 1, 0, NULL, '2013-10-02 14:54:17', NULL, 5);
INSERT INTO `hrpoints` VALUES (6, 1328, 0, NULL, '2013-10-02 14:54:17', NULL, 6);
INSERT INTO `hrpoints` VALUES (7, 128, 0, NULL, '2013-10-02 14:54:17', NULL, 7);
INSERT INTO `hrpoints` VALUES (8, 4347, 0, NULL, '2013-10-02 14:54:17', NULL, 8);
INSERT INTO `hrpoints` VALUES (9, 9, 0, NULL, '2013-10-02 14:54:17', NULL, 9);
INSERT INTO `hrpoints` VALUES (10, 198, 0, NULL, '2013-10-02 14:54:17', NULL, 10);
INSERT INTO `hrpoints` VALUES (11, 1, 0, NULL, '2013-10-02 14:54:17', NULL, 11);
INSERT INTO `hrpoints` VALUES (12, 1187, 0, '2013-11-19 21:17:43', '2013-10-02 14:54:17', '2013-11-21 00:00:00', 12);
INSERT INTO `hrpoints` VALUES (13, 139, 0, NULL, '2013-10-02 14:54:17', '2013-11-10 00:00:00', 13);
INSERT INTO `hrpoints` VALUES (14, 1, 0, NULL, '2013-10-02 14:54:17', NULL, 14);
INSERT INTO `hrpoints` VALUES (15, 1, 0, NULL, '2013-10-02 14:54:17', NULL, 15);
INSERT INTO `hrpoints` VALUES (16, 1, 0, NULL, '2013-10-02 14:54:17', NULL, 16);
INSERT INTO `hrpoints` VALUES (17, 1, 0, NULL, '2013-10-02 14:54:17', NULL, 17);
INSERT INTO `hrpoints` VALUES (18, 1, 0, NULL, '2013-10-02 14:54:17', NULL, 18);
INSERT INTO `hrpoints` VALUES (19, 1, 0, NULL, '2013-10-02 14:54:17', NULL, 19);
INSERT INTO `hrpoints` VALUES (20, 1, 0, NULL, '2013-10-02 14:54:17', NULL, 20);
INSERT INTO `hrpoints` VALUES (21, 1, 0, NULL, '2013-10-02 14:54:17', NULL, 21);
INSERT INTO `hrpoints` VALUES (22, 1, 0, NULL, '2013-10-02 14:54:17', NULL, 22);
INSERT INTO `hrpoints` VALUES (23, 1, 0, NULL, '2013-10-02 14:54:17', NULL, 23);
INSERT INTO `hrpoints` VALUES (24, 1, 0, NULL, '2013-10-02 14:54:17', NULL, 24);
INSERT INTO `hrpoints` VALUES (25, 1, 0, NULL, '2013-10-02 14:54:17', NULL, 25);
INSERT INTO `hrpoints` VALUES (26, 1, 0, NULL, '2013-10-02 14:54:17', NULL, 26);
INSERT INTO `hrpoints` VALUES (27, 1, 0, NULL, '2013-10-02 14:54:17', NULL, 27);
INSERT INTO `hrpoints` VALUES (28, 32, 0, NULL, '2013-10-02 14:54:17', NULL, 28);
INSERT INTO `hrpoints` VALUES (29, 1, 0, NULL, '2013-10-02 14:54:17', NULL, 29);
INSERT INTO `hrpoints` VALUES (30, 1, 0, NULL, '2013-10-02 14:54:17', NULL, 30);
INSERT INTO `hrpoints` VALUES (31, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 31);
INSERT INTO `hrpoints` VALUES (32, 1, 0, NULL, '2013-10-02 14:54:17', NULL, 34);
INSERT INTO `hrpoints` VALUES (33, 1, 0, NULL, '2013-10-02 14:54:17', NULL, 37);
INSERT INTO `hrpoints` VALUES (34, 90, 0, NULL, '2013-10-02 14:54:17', NULL, 39);
INSERT INTO `hrpoints` VALUES (35, 98, 0, NULL, '2013-10-02 14:54:17', NULL, 40);
INSERT INTO `hrpoints` VALUES (36, 1, 0, NULL, '2013-10-02 14:54:17', NULL, 42);
INSERT INTO `hrpoints` VALUES (37, 69, 0, NULL, '2013-10-02 14:54:17', NULL, 43);
INSERT INTO `hrpoints` VALUES (38, 4501, 0, NULL, '2013-10-02 14:54:17', NULL, 44);
INSERT INTO `hrpoints` VALUES (39, 1, 0, NULL, '2013-10-02 14:54:17', NULL, 48);
INSERT INTO `hrpoints` VALUES (40, 1, 0, NULL, '2013-10-02 14:54:17', NULL, 50);
INSERT INTO `hrpoints` VALUES (41, 1, 0, NULL, '2013-10-02 14:54:17', NULL, 51);
INSERT INTO `hrpoints` VALUES (42, 1, 0, NULL, '2013-10-02 14:54:17', NULL, 55);
INSERT INTO `hrpoints` VALUES (43, 1, 0, NULL, '2013-10-02 14:54:17', NULL, 57);
INSERT INTO `hrpoints` VALUES (44, 8, 0, NULL, '2013-10-02 14:54:17', NULL, 58);
INSERT INTO `hrpoints` VALUES (45, 1, 0, NULL, '2013-10-02 14:54:17', NULL, 60);
INSERT INTO `hrpoints` VALUES (46, 1, 0, NULL, '2013-10-02 14:54:17', NULL, 61);
INSERT INTO `hrpoints` VALUES (47, 1, 0, NULL, '2013-10-02 14:54:17', NULL, 62);
INSERT INTO `hrpoints` VALUES (48, 1, 0, NULL, '2013-10-02 14:54:17', NULL, 63);
INSERT INTO `hrpoints` VALUES (49, 3, 0, NULL, '2013-10-02 14:54:17', NULL, 65);
INSERT INTO `hrpoints` VALUES (50, 1, 0, NULL, '2013-10-02 14:54:17', NULL, 66);
INSERT INTO `hrpoints` VALUES (51, 1, 0, NULL, '2013-10-02 14:54:17', NULL, 68);
INSERT INTO `hrpoints` VALUES (52, 1, 0, NULL, '2013-10-02 14:54:17', NULL, 69);
INSERT INTO `hrpoints` VALUES (53, 103, 0, NULL, '2013-10-02 14:54:17', NULL, 70);
INSERT INTO `hrpoints` VALUES (54, 1, 0, NULL, '2013-10-02 14:54:17', NULL, 74);
INSERT INTO `hrpoints` VALUES (55, 1, 0, NULL, '2013-10-02 14:54:17', NULL, 75);
INSERT INTO `hrpoints` VALUES (56, 1, 0, NULL, '2013-10-02 14:54:17', NULL, 77);
INSERT INTO `hrpoints` VALUES (57, 1, 0, NULL, '2013-10-02 14:54:17', NULL, 79);
INSERT INTO `hrpoints` VALUES (58, 1, 0, NULL, '2013-10-02 14:54:17', NULL, 80);
INSERT INTO `hrpoints` VALUES (59, 142, 0, NULL, '2013-10-02 14:54:17', NULL, 81);
INSERT INTO `hrpoints` VALUES (60, 1, 0, NULL, '2013-10-02 14:54:17', NULL, 82);
INSERT INTO `hrpoints` VALUES (61, 8, 0, NULL, '2013-10-02 14:54:17', NULL, 83);
INSERT INTO `hrpoints` VALUES (62, 1, 0, NULL, '2013-10-02 14:54:17', NULL, 84);
INSERT INTO `hrpoints` VALUES (63, 1, 0, NULL, '2013-10-02 14:54:17', NULL, 85);
INSERT INTO `hrpoints` VALUES (64, 1, 0, NULL, '2013-10-02 14:54:17', NULL, 86);
INSERT INTO `hrpoints` VALUES (65, 1, 0, NULL, '2013-10-02 14:54:17', NULL, 87);
INSERT INTO `hrpoints` VALUES (66, 1, 0, NULL, '2013-10-02 14:54:17', NULL, 90);
INSERT INTO `hrpoints` VALUES (67, 1, 0, NULL, '2013-10-02 14:54:17', NULL, 91);
INSERT INTO `hrpoints` VALUES (68, 1, 0, NULL, '2013-10-02 14:54:17', NULL, 92);
INSERT INTO `hrpoints` VALUES (69, 1, 0, NULL, '2013-10-02 14:54:17', NULL, 93);
INSERT INTO `hrpoints` VALUES (70, 1, 0, NULL, '2013-10-02 14:54:17', NULL, 94);
INSERT INTO `hrpoints` VALUES (71, 1, 0, NULL, '2013-10-02 14:54:17', NULL, 95);
INSERT INTO `hrpoints` VALUES (72, 10, 0, NULL, '2013-10-02 14:54:17', NULL, 96);
INSERT INTO `hrpoints` VALUES (73, 1, 0, NULL, '2013-10-02 14:54:17', NULL, 97);
INSERT INTO `hrpoints` VALUES (74, 1, 0, NULL, '2013-10-02 14:54:17', NULL, 98);
INSERT INTO `hrpoints` VALUES (75, 28, 0, NULL, '2013-10-02 14:54:17', NULL, 99);
INSERT INTO `hrpoints` VALUES (76, 20, 0, NULL, '2013-10-02 14:54:17', NULL, 100);
INSERT INTO `hrpoints` VALUES (77, 19, 0, NULL, '2013-10-02 14:54:17', NULL, 101);
INSERT INTO `hrpoints` VALUES (78, 19, 0, NULL, '2013-10-02 14:54:17', NULL, 102);
INSERT INTO `hrpoints` VALUES (79, 1, 0, NULL, '2013-10-02 14:54:17', NULL, 103);
INSERT INTO `hrpoints` VALUES (80, 1, 0, NULL, '2013-10-02 14:54:17', NULL, 104);
INSERT INTO `hrpoints` VALUES (81, 1, 0, NULL, '2013-10-02 14:54:17', NULL, 105);
INSERT INTO `hrpoints` VALUES (82, 1, 0, NULL, '2013-10-02 14:54:17', NULL, 106);
INSERT INTO `hrpoints` VALUES (83, 1, 0, NULL, '2013-10-02 14:54:17', NULL, 107);
INSERT INTO `hrpoints` VALUES (84, 10, 0, NULL, '2013-10-02 14:54:17', NULL, 108);
INSERT INTO `hrpoints` VALUES (85, 189, 0, NULL, '2013-10-02 14:54:17', NULL, 109);
INSERT INTO `hrpoints` VALUES (86, 1, 0, NULL, '2013-10-02 14:54:17', NULL, 110);
INSERT INTO `hrpoints` VALUES (87, 1, 0, NULL, '2013-10-02 14:54:17', NULL, 111);
INSERT INTO `hrpoints` VALUES (88, 1, 0, NULL, '2013-10-02 14:54:17', NULL, 112);
INSERT INTO `hrpoints` VALUES (89, 1, 0, NULL, '2013-10-02 14:54:17', NULL, 113);
INSERT INTO `hrpoints` VALUES (90, 1, 0, NULL, '2013-10-02 14:54:17', NULL, 114);
INSERT INTO `hrpoints` VALUES (91, 453, 0, NULL, '2013-11-15 21:00:23', '2013-11-28 00:00:00', 116);
INSERT INTO `hrpoints` VALUES (92, 3, 0, NULL, '2013-10-02 14:54:17', NULL, 117);
INSERT INTO `hrpoints` VALUES (93, 1, 0, NULL, '2013-10-02 14:54:17', NULL, 118);
INSERT INTO `hrpoints` VALUES (94, 1, 0, NULL, '2013-10-02 14:54:17', NULL, 119);
INSERT INTO `hrpoints` VALUES (95, 51, 0, NULL, '2013-10-02 14:54:17', NULL, 120);
INSERT INTO `hrpoints` VALUES (96, 1, 0, NULL, '2013-10-02 14:54:17', NULL, 121);
INSERT INTO `hrpoints` VALUES (97, 29, 0, NULL, '2013-10-02 14:54:17', NULL, 122);
INSERT INTO `hrpoints` VALUES (98, 1, 0, NULL, '2013-10-02 14:54:17', NULL, 123);
INSERT INTO `hrpoints` VALUES (99, 1, 0, NULL, '2013-10-02 14:54:17', NULL, 124);
INSERT INTO `hrpoints` VALUES (100, 1, 0, NULL, '2013-10-02 14:54:17', NULL, 125);
INSERT INTO `hrpoints` VALUES (101, 160, 0, NULL, '2013-10-02 14:54:17', NULL, 126);
INSERT INTO `hrpoints` VALUES (102, 1, 0, NULL, '2013-10-02 14:54:17', NULL, 127);
INSERT INTO `hrpoints` VALUES (103, 1, 0, NULL, '2013-10-02 14:54:17', NULL, 128);
INSERT INTO `hrpoints` VALUES (104, 1, 0, NULL, '2013-10-02 14:54:17', NULL, 129);
INSERT INTO `hrpoints` VALUES (105, 1, 0, NULL, '2013-10-02 14:54:17', NULL, 131);
INSERT INTO `hrpoints` VALUES (106, 1, 0, NULL, '2013-10-02 14:54:17', NULL, 132);
INSERT INTO `hrpoints` VALUES (107, 1, 0, NULL, '2013-10-02 14:54:17', NULL, 133);
INSERT INTO `hrpoints` VALUES (108, 1, 0, NULL, '2013-10-02 14:54:17', NULL, 134);
INSERT INTO `hrpoints` VALUES (109, 1, 0, NULL, '2013-10-02 14:54:17', NULL, 135);
INSERT INTO `hrpoints` VALUES (110, 1560, 0, '2013-11-19 20:19:05', '2013-10-02 14:54:17', '2013-11-20 00:00:00', 136);
INSERT INTO `hrpoints` VALUES (111, 1, 0, NULL, '2013-10-02 14:54:17', NULL, 137);
INSERT INTO `hrpoints` VALUES (112, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 138);
INSERT INTO `hrpoints` VALUES (113, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 139);
INSERT INTO `hrpoints` VALUES (114, 1, 0, NULL, '2013-10-02 14:54:17', NULL, 140);
INSERT INTO `hrpoints` VALUES (115, 1, 0, NULL, '2013-10-02 14:54:17', NULL, 141);
INSERT INTO `hrpoints` VALUES (116, 1, 0, NULL, '2013-10-02 14:54:17', NULL, 142);
INSERT INTO `hrpoints` VALUES (117, 1, 0, NULL, '2013-10-02 14:54:17', NULL, 144);
INSERT INTO `hrpoints` VALUES (118, 96, 0, NULL, '2013-10-02 14:54:17', NULL, 145);
INSERT INTO `hrpoints` VALUES (119, 1, 0, NULL, '2013-10-02 14:54:17', NULL, 146);
INSERT INTO `hrpoints` VALUES (120, 9, 0, NULL, '2013-10-02 14:54:17', NULL, 147);
INSERT INTO `hrpoints` VALUES (121, 1, 0, NULL, '2013-10-02 14:54:17', NULL, 148);
INSERT INTO `hrpoints` VALUES (122, 1, 0, NULL, '2013-10-02 14:54:17', NULL, 149);
INSERT INTO `hrpoints` VALUES (123, 1, 0, NULL, '2013-10-02 14:54:17', NULL, 150);
INSERT INTO `hrpoints` VALUES (124, 1, 0, NULL, '2013-10-02 14:54:17', NULL, 151);
INSERT INTO `hrpoints` VALUES (125, 1, 0, NULL, '2013-10-02 14:54:17', NULL, 153);
INSERT INTO `hrpoints` VALUES (126, 1, 0, NULL, '2013-10-02 14:54:17', NULL, 154);
INSERT INTO `hrpoints` VALUES (127, 1, 0, NULL, '2013-10-02 14:54:17', NULL, 155);
INSERT INTO `hrpoints` VALUES (128, 6, 0, NULL, '2013-10-02 14:54:17', NULL, 156);
INSERT INTO `hrpoints` VALUES (129, 1, 0, NULL, '2013-10-02 14:54:17', NULL, 157);
INSERT INTO `hrpoints` VALUES (130, 1, 0, NULL, '2013-10-02 14:54:17', NULL, 158);
INSERT INTO `hrpoints` VALUES (131, 1, 0, NULL, '2013-10-02 14:54:17', NULL, 160);
INSERT INTO `hrpoints` VALUES (132, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 161);
INSERT INTO `hrpoints` VALUES (133, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 162);
INSERT INTO `hrpoints` VALUES (134, 232, 0, NULL, '2013-10-02 14:54:17', NULL, 163);
INSERT INTO `hrpoints` VALUES (135, 188, 0, NULL, '2013-10-02 14:54:17', NULL, 164);
INSERT INTO `hrpoints` VALUES (136, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 165);
INSERT INTO `hrpoints` VALUES (137, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 166);
INSERT INTO `hrpoints` VALUES (138, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 167);
INSERT INTO `hrpoints` VALUES (139, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 168);
INSERT INTO `hrpoints` VALUES (140, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 169);
INSERT INTO `hrpoints` VALUES (141, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 170);
INSERT INTO `hrpoints` VALUES (142, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 171);
INSERT INTO `hrpoints` VALUES (143, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 172);
INSERT INTO `hrpoints` VALUES (144, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 173);
INSERT INTO `hrpoints` VALUES (145, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 174);
INSERT INTO `hrpoints` VALUES (146, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 175);
INSERT INTO `hrpoints` VALUES (147, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 176);
INSERT INTO `hrpoints` VALUES (148, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 177);
INSERT INTO `hrpoints` VALUES (149, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 178);
INSERT INTO `hrpoints` VALUES (150, 3, 0, NULL, '2013-10-02 14:54:17', NULL, 179);
INSERT INTO `hrpoints` VALUES (151, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 180);
INSERT INTO `hrpoints` VALUES (152, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 181);
INSERT INTO `hrpoints` VALUES (153, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 182);
INSERT INTO `hrpoints` VALUES (154, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 183);
INSERT INTO `hrpoints` VALUES (155, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 184);
INSERT INTO `hrpoints` VALUES (156, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 185);
INSERT INTO `hrpoints` VALUES (157, 6, 0, NULL, '2013-10-02 14:54:17', NULL, 186);
INSERT INTO `hrpoints` VALUES (158, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 187);
INSERT INTO `hrpoints` VALUES (159, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 188);
INSERT INTO `hrpoints` VALUES (160, 9, 0, NULL, '2013-10-02 14:54:17', NULL, 189);
INSERT INTO `hrpoints` VALUES (161, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 190);
INSERT INTO `hrpoints` VALUES (162, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 191);
INSERT INTO `hrpoints` VALUES (163, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 192);
INSERT INTO `hrpoints` VALUES (164, 3, 0, NULL, '2013-10-02 14:54:17', NULL, 193);
INSERT INTO `hrpoints` VALUES (165, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 194);
INSERT INTO `hrpoints` VALUES (166, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 195);
INSERT INTO `hrpoints` VALUES (167, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 196);
INSERT INTO `hrpoints` VALUES (168, 46, 0, NULL, '2013-10-02 14:54:17', NULL, 197);
INSERT INTO `hrpoints` VALUES (169, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 198);
INSERT INTO `hrpoints` VALUES (170, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 199);
INSERT INTO `hrpoints` VALUES (171, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 200);
INSERT INTO `hrpoints` VALUES (172, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 201);
INSERT INTO `hrpoints` VALUES (173, 2, 0, NULL, '2013-10-02 14:54:17', NULL, 202);
INSERT INTO `hrpoints` VALUES (174, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 204);
INSERT INTO `hrpoints` VALUES (175, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 205);
INSERT INTO `hrpoints` VALUES (176, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 206);
INSERT INTO `hrpoints` VALUES (177, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 207);
INSERT INTO `hrpoints` VALUES (178, 3, 0, NULL, '2013-10-02 14:54:17', NULL, 208);
INSERT INTO `hrpoints` VALUES (179, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 209);
INSERT INTO `hrpoints` VALUES (180, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 210);
INSERT INTO `hrpoints` VALUES (181, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 211);
INSERT INTO `hrpoints` VALUES (182, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 212);
INSERT INTO `hrpoints` VALUES (183, 4, 0, NULL, '2013-10-02 14:54:17', NULL, 213);
INSERT INTO `hrpoints` VALUES (184, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 214);
INSERT INTO `hrpoints` VALUES (185, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 215);
INSERT INTO `hrpoints` VALUES (186, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 216);
INSERT INTO `hrpoints` VALUES (187, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 217);
INSERT INTO `hrpoints` VALUES (188, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 218);
INSERT INTO `hrpoints` VALUES (189, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 219);
INSERT INTO `hrpoints` VALUES (190, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 220);
INSERT INTO `hrpoints` VALUES (191, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 221);
INSERT INTO `hrpoints` VALUES (192, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 222);
INSERT INTO `hrpoints` VALUES (193, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 223);
INSERT INTO `hrpoints` VALUES (194, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 224);
INSERT INTO `hrpoints` VALUES (195, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 225);
INSERT INTO `hrpoints` VALUES (196, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 226);
INSERT INTO `hrpoints` VALUES (197, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 227);
INSERT INTO `hrpoints` VALUES (198, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 228);
INSERT INTO `hrpoints` VALUES (199, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 229);
INSERT INTO `hrpoints` VALUES (200, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 230);
INSERT INTO `hrpoints` VALUES (201, 3, 0, NULL, '2013-10-02 14:54:17', NULL, 231);
INSERT INTO `hrpoints` VALUES (202, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 232);
INSERT INTO `hrpoints` VALUES (203, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 233);
INSERT INTO `hrpoints` VALUES (204, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 234);
INSERT INTO `hrpoints` VALUES (205, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 235);
INSERT INTO `hrpoints` VALUES (206, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 236);
INSERT INTO `hrpoints` VALUES (207, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 237);
INSERT INTO `hrpoints` VALUES (208, 4, 0, NULL, '2013-10-02 14:54:17', NULL, 239);
INSERT INTO `hrpoints` VALUES (209, 4, 0, NULL, '2013-10-02 14:54:17', NULL, 240);
INSERT INTO `hrpoints` VALUES (210, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 243);
INSERT INTO `hrpoints` VALUES (211, 1, 0, NULL, '2013-10-02 14:54:17', NULL, 244);
INSERT INTO `hrpoints` VALUES (212, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 245);
INSERT INTO `hrpoints` VALUES (213, 18, 0, NULL, '2013-10-02 14:54:17', NULL, 246);
INSERT INTO `hrpoints` VALUES (214, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 247);
INSERT INTO `hrpoints` VALUES (215, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 248);
INSERT INTO `hrpoints` VALUES (216, 12, 0, NULL, '2013-10-02 14:54:17', NULL, 250);
INSERT INTO `hrpoints` VALUES (217, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 251);
INSERT INTO `hrpoints` VALUES (218, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 252);
INSERT INTO `hrpoints` VALUES (219, 9, 0, NULL, '2013-10-02 14:54:17', NULL, 253);
INSERT INTO `hrpoints` VALUES (220, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 254);
INSERT INTO `hrpoints` VALUES (221, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 255);
INSERT INTO `hrpoints` VALUES (222, 8, 0, NULL, '2013-10-02 14:54:17', NULL, 256);
INSERT INTO `hrpoints` VALUES (223, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 257);
INSERT INTO `hrpoints` VALUES (224, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 258);
INSERT INTO `hrpoints` VALUES (225, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 259);
INSERT INTO `hrpoints` VALUES (226, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 260);
INSERT INTO `hrpoints` VALUES (227, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 261);
INSERT INTO `hrpoints` VALUES (228, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 262);
INSERT INTO `hrpoints` VALUES (229, 13, 0, NULL, '2013-10-02 14:54:17', NULL, 263);
INSERT INTO `hrpoints` VALUES (230, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 264);
INSERT INTO `hrpoints` VALUES (231, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 265);
INSERT INTO `hrpoints` VALUES (232, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 266);
INSERT INTO `hrpoints` VALUES (233, 1, 0, NULL, '2013-10-02 14:54:17', NULL, 267);
INSERT INTO `hrpoints` VALUES (234, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 268);
INSERT INTO `hrpoints` VALUES (235, 54, 0, NULL, '2013-10-02 14:54:17', NULL, 269);
INSERT INTO `hrpoints` VALUES (236, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 270);
INSERT INTO `hrpoints` VALUES (237, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 271);
INSERT INTO `hrpoints` VALUES (238, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 272);
INSERT INTO `hrpoints` VALUES (239, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 273);
INSERT INTO `hrpoints` VALUES (240, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 274);
INSERT INTO `hrpoints` VALUES (241, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 275);
INSERT INTO `hrpoints` VALUES (242, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 276);
INSERT INTO `hrpoints` VALUES (243, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 277);
INSERT INTO `hrpoints` VALUES (244, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 278);
INSERT INTO `hrpoints` VALUES (245, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 279);
INSERT INTO `hrpoints` VALUES (246, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 280);
INSERT INTO `hrpoints` VALUES (247, 1, 0, NULL, '2013-10-02 14:54:17', NULL, 281);
INSERT INTO `hrpoints` VALUES (248, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 282);
INSERT INTO `hrpoints` VALUES (249, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 283);
INSERT INTO `hrpoints` VALUES (250, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 284);
INSERT INTO `hrpoints` VALUES (251, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 285);
INSERT INTO `hrpoints` VALUES (252, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 286);
INSERT INTO `hrpoints` VALUES (253, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 287);
INSERT INTO `hrpoints` VALUES (254, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 288);
INSERT INTO `hrpoints` VALUES (255, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 289);
INSERT INTO `hrpoints` VALUES (256, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 290);
INSERT INTO `hrpoints` VALUES (257, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 291);
INSERT INTO `hrpoints` VALUES (258, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 292);
INSERT INTO `hrpoints` VALUES (259, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 293);
INSERT INTO `hrpoints` VALUES (260, 1, 0, NULL, '2013-10-02 14:54:17', NULL, 294);
INSERT INTO `hrpoints` VALUES (261, 3, 0, NULL, '2013-10-02 14:54:17', NULL, 295);
INSERT INTO `hrpoints` VALUES (262, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 296);
INSERT INTO `hrpoints` VALUES (263, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 297);
INSERT INTO `hrpoints` VALUES (264, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 298);
INSERT INTO `hrpoints` VALUES (265, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 299);
INSERT INTO `hrpoints` VALUES (266, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 300);
INSERT INTO `hrpoints` VALUES (267, 9, 0, NULL, '2013-10-02 14:54:17', NULL, 301);
INSERT INTO `hrpoints` VALUES (268, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 302);
INSERT INTO `hrpoints` VALUES (269, 4, 0, NULL, '2013-10-02 14:54:17', NULL, 303);
INSERT INTO `hrpoints` VALUES (270, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 305);
INSERT INTO `hrpoints` VALUES (271, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 306);
INSERT INTO `hrpoints` VALUES (272, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 307);
INSERT INTO `hrpoints` VALUES (273, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 308);
INSERT INTO `hrpoints` VALUES (274, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 309);
INSERT INTO `hrpoints` VALUES (275, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 310);
INSERT INTO `hrpoints` VALUES (276, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 311);
INSERT INTO `hrpoints` VALUES (277, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 312);
INSERT INTO `hrpoints` VALUES (278, 3, 0, NULL, '2013-10-02 14:54:17', NULL, 313);
INSERT INTO `hrpoints` VALUES (279, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 314);
INSERT INTO `hrpoints` VALUES (280, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 315);
INSERT INTO `hrpoints` VALUES (281, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 316);
INSERT INTO `hrpoints` VALUES (282, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 317);
INSERT INTO `hrpoints` VALUES (283, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 318);
INSERT INTO `hrpoints` VALUES (284, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 319);
INSERT INTO `hrpoints` VALUES (285, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 320);
INSERT INTO `hrpoints` VALUES (286, 3, 0, NULL, '2013-10-02 14:54:17', NULL, 321);
INSERT INTO `hrpoints` VALUES (287, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 322);
INSERT INTO `hrpoints` VALUES (288, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 323);
INSERT INTO `hrpoints` VALUES (289, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 324);
INSERT INTO `hrpoints` VALUES (290, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 326);
INSERT INTO `hrpoints` VALUES (291, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 327);
INSERT INTO `hrpoints` VALUES (292, 6, 0, NULL, '2013-10-02 14:54:17', NULL, 329);
INSERT INTO `hrpoints` VALUES (293, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 330);
INSERT INTO `hrpoints` VALUES (294, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 331);
INSERT INTO `hrpoints` VALUES (295, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 332);
INSERT INTO `hrpoints` VALUES (296, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 333);
INSERT INTO `hrpoints` VALUES (297, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 334);
INSERT INTO `hrpoints` VALUES (298, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 335);
INSERT INTO `hrpoints` VALUES (299, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 336);
INSERT INTO `hrpoints` VALUES (300, 4, 0, NULL, '2013-10-02 14:54:17', NULL, 337);
INSERT INTO `hrpoints` VALUES (301, 3, 0, NULL, '2013-10-02 14:54:17', NULL, 338);
INSERT INTO `hrpoints` VALUES (302, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 339);
INSERT INTO `hrpoints` VALUES (303, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 340);
INSERT INTO `hrpoints` VALUES (304, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 341);
INSERT INTO `hrpoints` VALUES (305, 3, 0, NULL, '2013-10-02 14:54:17', NULL, 342);
INSERT INTO `hrpoints` VALUES (306, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 343);
INSERT INTO `hrpoints` VALUES (307, 4, 0, NULL, '2013-10-02 14:54:17', NULL, 344);
INSERT INTO `hrpoints` VALUES (308, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 345);
INSERT INTO `hrpoints` VALUES (309, 4, 0, NULL, '2013-10-02 14:54:17', NULL, 346);
INSERT INTO `hrpoints` VALUES (310, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 347);
INSERT INTO `hrpoints` VALUES (311, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 348);
INSERT INTO `hrpoints` VALUES (312, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 349);
INSERT INTO `hrpoints` VALUES (313, 4, 0, NULL, '2013-10-02 14:54:17', NULL, 350);
INSERT INTO `hrpoints` VALUES (314, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 351);
INSERT INTO `hrpoints` VALUES (315, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 352);
INSERT INTO `hrpoints` VALUES (316, 7, 0, NULL, '2013-10-02 14:54:17', NULL, 354);
INSERT INTO `hrpoints` VALUES (317, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 355);
INSERT INTO `hrpoints` VALUES (318, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 356);
INSERT INTO `hrpoints` VALUES (319, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 357);
INSERT INTO `hrpoints` VALUES (320, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 358);
INSERT INTO `hrpoints` VALUES (321, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 359);
INSERT INTO `hrpoints` VALUES (322, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 360);
INSERT INTO `hrpoints` VALUES (323, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 361);
INSERT INTO `hrpoints` VALUES (324, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 362);
INSERT INTO `hrpoints` VALUES (325, 8, 0, NULL, '2013-10-02 14:54:17', NULL, 363);
INSERT INTO `hrpoints` VALUES (326, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 364);
INSERT INTO `hrpoints` VALUES (327, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 365);
INSERT INTO `hrpoints` VALUES (328, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 366);
INSERT INTO `hrpoints` VALUES (329, 172, 0, NULL, '2013-10-02 14:54:17', NULL, 367);
INSERT INTO `hrpoints` VALUES (330, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 368);
INSERT INTO `hrpoints` VALUES (331, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 369);
INSERT INTO `hrpoints` VALUES (332, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 370);
INSERT INTO `hrpoints` VALUES (333, 28, 0, NULL, '2013-10-02 14:54:17', NULL, 371);
INSERT INTO `hrpoints` VALUES (334, 18, 0, NULL, '2013-10-02 14:54:17', NULL, 372);
INSERT INTO `hrpoints` VALUES (335, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 373);
INSERT INTO `hrpoints` VALUES (336, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 374);
INSERT INTO `hrpoints` VALUES (337, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 375);
INSERT INTO `hrpoints` VALUES (338, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 376);
INSERT INTO `hrpoints` VALUES (339, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 377);
INSERT INTO `hrpoints` VALUES (340, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 378);
INSERT INTO `hrpoints` VALUES (341, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 379);
INSERT INTO `hrpoints` VALUES (342, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 380);
INSERT INTO `hrpoints` VALUES (343, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 381);
INSERT INTO `hrpoints` VALUES (344, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 382);
INSERT INTO `hrpoints` VALUES (345, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 383);
INSERT INTO `hrpoints` VALUES (346, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 384);
INSERT INTO `hrpoints` VALUES (347, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 385);
INSERT INTO `hrpoints` VALUES (348, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 386);
INSERT INTO `hrpoints` VALUES (349, 159, 0, NULL, '2013-10-02 14:54:17', NULL, 387);
INSERT INTO `hrpoints` VALUES (350, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 388);
INSERT INTO `hrpoints` VALUES (351, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 389);
INSERT INTO `hrpoints` VALUES (352, 4, 0, NULL, '2013-10-02 14:54:17', NULL, 390);
INSERT INTO `hrpoints` VALUES (353, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 391);
INSERT INTO `hrpoints` VALUES (354, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 392);
INSERT INTO `hrpoints` VALUES (355, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 393);
INSERT INTO `hrpoints` VALUES (356, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 394);
INSERT INTO `hrpoints` VALUES (357, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 395);
INSERT INTO `hrpoints` VALUES (358, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 396);
INSERT INTO `hrpoints` VALUES (359, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 397);
INSERT INTO `hrpoints` VALUES (360, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 398);
INSERT INTO `hrpoints` VALUES (361, 153, 0, '2013-12-02 11:52:38', '2013-10-02 14:54:17', '2013-11-24 00:00:00', 399);
INSERT INTO `hrpoints` VALUES (362, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 400);
INSERT INTO `hrpoints` VALUES (363, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 401);
INSERT INTO `hrpoints` VALUES (364, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 402);
INSERT INTO `hrpoints` VALUES (365, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 403);
INSERT INTO `hrpoints` VALUES (366, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 404);
INSERT INTO `hrpoints` VALUES (367, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 405);
INSERT INTO `hrpoints` VALUES (368, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 406);
INSERT INTO `hrpoints` VALUES (369, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 407);
INSERT INTO `hrpoints` VALUES (370, 3, 0, NULL, '2013-10-02 14:54:17', NULL, 408);
INSERT INTO `hrpoints` VALUES (371, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 409);
INSERT INTO `hrpoints` VALUES (372, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 410);
INSERT INTO `hrpoints` VALUES (373, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 411);
INSERT INTO `hrpoints` VALUES (374, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 412);
INSERT INTO `hrpoints` VALUES (375, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 413);
INSERT INTO `hrpoints` VALUES (376, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 414);
INSERT INTO `hrpoints` VALUES (377, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 415);
INSERT INTO `hrpoints` VALUES (378, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 416);
INSERT INTO `hrpoints` VALUES (379, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 417);
INSERT INTO `hrpoints` VALUES (380, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 418);
INSERT INTO `hrpoints` VALUES (381, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 419);
INSERT INTO `hrpoints` VALUES (382, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 420);
INSERT INTO `hrpoints` VALUES (383, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 421);
INSERT INTO `hrpoints` VALUES (384, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 422);
INSERT INTO `hrpoints` VALUES (385, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 423);
INSERT INTO `hrpoints` VALUES (386, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 424);
INSERT INTO `hrpoints` VALUES (387, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 425);
INSERT INTO `hrpoints` VALUES (388, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 426);
INSERT INTO `hrpoints` VALUES (389, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 427);
INSERT INTO `hrpoints` VALUES (390, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 438);
INSERT INTO `hrpoints` VALUES (391, 77, 0, NULL, '2013-10-02 14:54:17', NULL, 485);
INSERT INTO `hrpoints` VALUES (392, 10, 0, NULL, '2013-10-02 14:54:17', NULL, 505);
INSERT INTO `hrpoints` VALUES (393, 9, 0, NULL, '2013-10-02 14:54:17', NULL, 513);
INSERT INTO `hrpoints` VALUES (394, 39, 0, NULL, '2013-10-02 14:54:17', NULL, 514);
INSERT INTO `hrpoints` VALUES (395, 22, 0, NULL, '2013-10-02 14:54:17', NULL, 517);
INSERT INTO `hrpoints` VALUES (396, 33, 0, NULL, '2013-10-02 14:54:17', NULL, 518);
INSERT INTO `hrpoints` VALUES (397, 10, 0, NULL, '2013-10-02 14:54:17', NULL, 520);
INSERT INTO `hrpoints` VALUES (398, 10, 0, NULL, '2013-10-02 14:54:17', NULL, 521);
INSERT INTO `hrpoints` VALUES (399, 1, 0, NULL, '2013-10-02 14:54:17', NULL, 527);
INSERT INTO `hrpoints` VALUES (400, 88, 0, NULL, '2013-10-02 14:54:17', NULL, 528);
INSERT INTO `hrpoints` VALUES (401, 10, 0, NULL, '2013-10-02 14:54:17', NULL, 575);
INSERT INTO `hrpoints` VALUES (402, 13, 0, NULL, '2013-10-02 14:54:17', NULL, 585);
INSERT INTO `hrpoints` VALUES (403, 3, 0, NULL, '2013-10-02 14:54:17', NULL, 602);
INSERT INTO `hrpoints` VALUES (404, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 603);
INSERT INTO `hrpoints` VALUES (405, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 604);
INSERT INTO `hrpoints` VALUES (406, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 605);
INSERT INTO `hrpoints` VALUES (407, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 606);
INSERT INTO `hrpoints` VALUES (408, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 607);
INSERT INTO `hrpoints` VALUES (409, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 608);
INSERT INTO `hrpoints` VALUES (410, 2, 0, NULL, '2013-10-02 14:54:17', NULL, 609);
INSERT INTO `hrpoints` VALUES (411, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 610);
INSERT INTO `hrpoints` VALUES (412, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 611);
INSERT INTO `hrpoints` VALUES (413, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 612);
INSERT INTO `hrpoints` VALUES (414, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 613);
INSERT INTO `hrpoints` VALUES (415, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 614);
INSERT INTO `hrpoints` VALUES (416, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 615);
INSERT INTO `hrpoints` VALUES (417, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 616);
INSERT INTO `hrpoints` VALUES (418, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 617);
INSERT INTO `hrpoints` VALUES (419, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 618);
INSERT INTO `hrpoints` VALUES (420, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 619);
INSERT INTO `hrpoints` VALUES (421, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 620);
INSERT INTO `hrpoints` VALUES (422, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 621);
INSERT INTO `hrpoints` VALUES (423, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 622);
INSERT INTO `hrpoints` VALUES (424, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 623);
INSERT INTO `hrpoints` VALUES (425, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 624);
INSERT INTO `hrpoints` VALUES (426, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 625);
INSERT INTO `hrpoints` VALUES (427, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 626);
INSERT INTO `hrpoints` VALUES (428, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 627);
INSERT INTO `hrpoints` VALUES (429, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 628);
INSERT INTO `hrpoints` VALUES (430, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 629);
INSERT INTO `hrpoints` VALUES (431, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 630);
INSERT INTO `hrpoints` VALUES (432, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 631);
INSERT INTO `hrpoints` VALUES (433, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 632);
INSERT INTO `hrpoints` VALUES (434, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 633);
INSERT INTO `hrpoints` VALUES (435, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 634);
INSERT INTO `hrpoints` VALUES (436, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 635);
INSERT INTO `hrpoints` VALUES (437, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 636);
INSERT INTO `hrpoints` VALUES (438, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 637);
INSERT INTO `hrpoints` VALUES (439, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 638);
INSERT INTO `hrpoints` VALUES (440, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 639);
INSERT INTO `hrpoints` VALUES (441, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 640);
INSERT INTO `hrpoints` VALUES (442, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 641);
INSERT INTO `hrpoints` VALUES (443, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 642);
INSERT INTO `hrpoints` VALUES (444, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 643);
INSERT INTO `hrpoints` VALUES (445, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 644);
INSERT INTO `hrpoints` VALUES (446, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 645);
INSERT INTO `hrpoints` VALUES (447, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 646);
INSERT INTO `hrpoints` VALUES (448, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 647);
INSERT INTO `hrpoints` VALUES (449, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 648);
INSERT INTO `hrpoints` VALUES (450, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 649);
INSERT INTO `hrpoints` VALUES (451, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 650);
INSERT INTO `hrpoints` VALUES (452, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 651);
INSERT INTO `hrpoints` VALUES (453, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 652);
INSERT INTO `hrpoints` VALUES (454, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 653);
INSERT INTO `hrpoints` VALUES (455, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 654);
INSERT INTO `hrpoints` VALUES (456, 5, 0, NULL, '2013-10-02 14:54:17', NULL, 655);

-- ----------------------------
-- Table structure for menus
-- ----------------------------
DROP TABLE IF EXISTS `menus`;
CREATE TABLE `menus`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(10) UNSIGNED NULL DEFAULT NULL,
  `menu_lft` smallint(5) UNSIGNED NOT NULL,
  `menu_rgt` smallint(5) UNSIGNED NOT NULL,
  `partial_id` int(10) UNSIGNED NULL DEFAULT NULL,
  `partial_table` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `menu_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_view` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of menus
-- ----------------------------
INSERT INTO `menus` VALUES (1, 'Trang chủ', '', NULL, 1, 2, NULL, NULL, 'main', NULL, '2021-04-14 06:44:54', '2021-04-14 06:44:54');
INSERT INTO `menus` VALUES (2, 'Giới thiệu', 'gioi-thieu', NULL, 3, 4, 1, 'page', 'main', NULL, '2021-04-14 06:44:54', '2021-04-14 06:44:54');
INSERT INTO `menus` VALUES (3, 'Sản phẩm', 'san-pham', NULL, 5, 10, NULL, NULL, 'main', NULL, '2021-04-14 06:44:54', '2021-04-14 06:44:54');
INSERT INTO `menus` VALUES (4, 'Thiết kế web', 'thiet-ke-web', 3, 6, 7, 1, 'category', 'main', NULL, '2021-04-14 06:44:55', '2021-04-14 06:44:55');
INSERT INTO `menus` VALUES (5, 'Ứng dụng', 'ung-dung', 3, 8, 9, 4, 'category', 'main', NULL, '2021-04-14 06:44:55', '2021-04-14 06:44:55');
INSERT INTO `menus` VALUES (6, 'Tin tức', 'tin-tuc', NULL, 11, 12, 5, 'category', 'main', NULL, '2021-04-14 06:44:55', '2021-04-14 06:44:55');
INSERT INTO `menus` VALUES (7, 'Liên hệ', 'lien-he', NULL, 13, 14, 2, 'page', 'main', 'contact', '2021-04-14 06:44:55', '2021-04-14 06:44:55');
INSERT INTO `menus` VALUES (8, 'Trang chủ', '', NULL, 15, 16, NULL, NULL, 'footer', NULL, '2021-04-14 06:44:55', '2021-04-14 06:44:55');
INSERT INTO `menus` VALUES (9, 'Giới thiệu', 'gioi-thieu', NULL, 17, 18, 3, 'page', 'footer', NULL, '2021-04-14 06:44:55', '2021-04-14 06:44:55');
INSERT INTO `menus` VALUES (10, 'Tin tức', 'tin-tuc', NULL, 19, 20, 5, 'category', 'footer', NULL, '2021-04-14 06:44:55', '2021-04-14 06:44:55');
INSERT INTO `menus` VALUES (11, 'Liên hệ', 'lien-he', NULL, 21, 22, 4, 'page', 'footer', 'contact', '2021-04-14 06:44:56', '2021-04-14 06:44:56');
INSERT INTO `menus` VALUES (12, 'Thiết kế web', 'thiet-ke-web', NULL, 23, 24, 1, 'category', 'footerOur', NULL, '2021-04-14 06:44:56', '2021-04-14 06:44:56');
INSERT INTO `menus` VALUES (13, 'Ứng dụng', 'ung-dung', NULL, 25, 26, 4, 'category', 'footerOur', NULL, '2021-04-14 06:44:56', '2021-04-14 06:44:56');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 28 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (2, '2016_06_01_000001_create_oauth_auth_codes_table', 1);
INSERT INTO `migrations` VALUES (3, '2016_06_01_000002_create_oauth_access_tokens_table', 1);
INSERT INTO `migrations` VALUES (4, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1);
INSERT INTO `migrations` VALUES (5, '2016_06_01_000004_create_oauth_clients_table', 1);
INSERT INTO `migrations` VALUES (6, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1);
INSERT INTO `migrations` VALUES (7, '2017_07_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (8, '2018_06_28_021502_adds_api_token_to_users_table', 1);
INSERT INTO `migrations` VALUES (9, '2019_12_11_025407_update_email_users', 1);
INSERT INTO `migrations` VALUES (15, '2021_03_22_012233_create_configs_models_table', 1);
INSERT INTO `migrations` VALUES (18, '2021_03_20_093027_create_posts_table', 2);
INSERT INTO `migrations` VALUES (19, '2021_03_20_094139_create_categories_table', 2);
INSERT INTO `migrations` VALUES (20, '2021_03_22_011549_create_menus_models_table', 2);
INSERT INTO `migrations` VALUES (21, '2021_03_22_012215_create_advertises_models_table', 2);
INSERT INTO `migrations` VALUES (22, '2021_03_22_021749_create_employee_models_table', 2);
INSERT INTO `migrations` VALUES (23, '2021_03_22_030053_add_employee_to_user_table', 2);
INSERT INTO `migrations` VALUES (24, '2021_03_24_022653_add_sequence_to_advertises_table', 2);
INSERT INTO `migrations` VALUES (25, '2021_03_24_125402_create_sections_table', 2);
INSERT INTO `migrations` VALUES (26, '2021_03_25_063934_create_settings_table', 2);
INSERT INTO `migrations` VALUES (27, '2021_03_20_054146_create_permission_tables', 3);

-- ----------------------------
-- Table structure for oauth_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `oauth_access_tokens`;
CREATE TABLE `oauth_access_tokens`  (
  `id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `scopes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `expires_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `oauth_access_tokens_user_id_index`(`user_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of oauth_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for oauth_auth_codes
-- ----------------------------
DROP TABLE IF EXISTS `oauth_auth_codes`;
CREATE TABLE `oauth_auth_codes`  (
  `id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `oauth_auth_codes_user_id_index`(`user_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of oauth_auth_codes
-- ----------------------------

-- ----------------------------
-- Table structure for oauth_clients
-- ----------------------------
DROP TABLE IF EXISTS `oauth_clients`;
CREATE TABLE `oauth_clients`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `provider` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `redirect` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `oauth_clients_user_id_index`(`user_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of oauth_clients
-- ----------------------------

-- ----------------------------
-- Table structure for oauth_personal_access_clients
-- ----------------------------
DROP TABLE IF EXISTS `oauth_personal_access_clients`;
CREATE TABLE `oauth_personal_access_clients`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of oauth_personal_access_clients
-- ----------------------------

-- ----------------------------
-- Table structure for oauth_refresh_tokens
-- ----------------------------
DROP TABLE IF EXISTS `oauth_refresh_tokens`;
CREATE TABLE `oauth_refresh_tokens`  (
  `id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `oauth_refresh_tokens_access_token_id_index`(`access_token_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of oauth_refresh_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `permissions_name_guard_name_unique`(`name`, `guard_name`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 86 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of permissions
-- ----------------------------
INSERT INTO `permissions` VALUES (1, 'view_admin', 'web', '2021-04-08 01:47:41', '2021-04-08 01:47:41');
INSERT INTO `permissions` VALUES (2, 'view_home', 'web', '2021-04-08 01:47:41', '2021-04-08 01:47:41');
INSERT INTO `permissions` VALUES (3, 'add_home', 'web', '2021-04-08 01:47:41', '2021-04-08 01:47:41');
INSERT INTO `permissions` VALUES (4, 'public_setting', 'web', '2021-04-08 01:47:41', '2021-04-08 01:47:41');
INSERT INTO `permissions` VALUES (5, 'view_setting', 'web', '2021-04-08 01:47:41', '2021-04-08 01:47:41');
INSERT INTO `permissions` VALUES (6, 'add_setting', 'web', '2021-04-08 01:47:41', '2021-04-08 01:47:41');
INSERT INTO `permissions` VALUES (7, 'edit_setting', 'web', '2021-04-08 01:47:42', '2021-04-08 01:47:42');
INSERT INTO `permissions` VALUES (8, 'delete_setting', 'web', '2021-04-08 01:47:42', '2021-04-08 01:47:42');
INSERT INTO `permissions` VALUES (9, 'download_setting', 'web', '2021-04-08 01:47:42', '2021-04-08 01:47:42');
INSERT INTO `permissions` VALUES (10, 'upload_setting', 'web', '2021-04-08 01:47:42', '2021-04-08 01:47:42');
INSERT INTO `permissions` VALUES (11, 'print_setting', 'web', '2021-04-08 01:47:42', '2021-04-08 01:47:42');
INSERT INTO `permissions` VALUES (12, 'public_menus', 'web', '2021-04-08 01:47:42', '2021-04-08 01:47:42');
INSERT INTO `permissions` VALUES (13, 'view_menus', 'web', '2021-04-08 01:47:42', '2021-04-08 01:47:42');
INSERT INTO `permissions` VALUES (14, 'add_menus', 'web', '2021-04-08 01:47:42', '2021-04-08 01:47:42');
INSERT INTO `permissions` VALUES (15, 'edit_menus', 'web', '2021-04-08 01:47:43', '2021-04-08 01:47:43');
INSERT INTO `permissions` VALUES (16, 'delete_menus', 'web', '2021-04-08 01:47:43', '2021-04-08 01:47:43');
INSERT INTO `permissions` VALUES (17, 'download_menus', 'web', '2021-04-08 01:47:43', '2021-04-08 01:47:43');
INSERT INTO `permissions` VALUES (18, 'upload_menus', 'web', '2021-04-08 01:47:43', '2021-04-08 01:47:43');
INSERT INTO `permissions` VALUES (19, 'print_menus', 'web', '2021-04-08 01:47:43', '2021-04-08 01:47:43');
INSERT INTO `permissions` VALUES (20, 'public_categories', 'web', '2021-04-08 01:47:43', '2021-04-08 01:47:43');
INSERT INTO `permissions` VALUES (21, 'view_categories', 'web', '2021-04-08 01:47:43', '2021-04-08 01:47:43');
INSERT INTO `permissions` VALUES (22, 'add_categories', 'web', '2021-04-08 01:47:43', '2021-04-08 01:47:43');
INSERT INTO `permissions` VALUES (23, 'edit_categories', 'web', '2021-04-08 01:47:44', '2021-04-08 01:47:44');
INSERT INTO `permissions` VALUES (24, 'delete_categories', 'web', '2021-04-08 01:47:44', '2021-04-08 01:47:44');
INSERT INTO `permissions` VALUES (25, 'download_categories', 'web', '2021-04-08 01:47:44', '2021-04-08 01:47:44');
INSERT INTO `permissions` VALUES (26, 'upload_categories', 'web', '2021-04-08 01:47:44', '2021-04-08 01:47:44');
INSERT INTO `permissions` VALUES (27, 'print_categories', 'web', '2021-04-08 01:47:44', '2021-04-08 01:47:44');
INSERT INTO `permissions` VALUES (28, 'public_posts', 'web', '2021-04-08 01:47:44', '2021-04-08 01:47:44');
INSERT INTO `permissions` VALUES (29, 'view_posts', 'web', '2021-04-08 01:47:45', '2021-04-08 01:47:45');
INSERT INTO `permissions` VALUES (30, 'add_posts', 'web', '2021-04-08 01:47:45', '2021-04-08 01:47:45');
INSERT INTO `permissions` VALUES (31, 'edit_posts', 'web', '2021-04-08 01:47:45', '2021-04-08 01:47:45');
INSERT INTO `permissions` VALUES (32, 'delete_posts', 'web', '2021-04-08 01:47:45', '2021-04-08 01:47:45');
INSERT INTO `permissions` VALUES (33, 'download_posts', 'web', '2021-04-08 01:47:45', '2021-04-08 01:47:45');
INSERT INTO `permissions` VALUES (34, 'upload_posts', 'web', '2021-04-08 01:47:45', '2021-04-08 01:47:45');
INSERT INTO `permissions` VALUES (35, 'print_posts', 'web', '2021-04-08 01:47:45', '2021-04-08 01:47:45');
INSERT INTO `permissions` VALUES (36, 'public_pages', 'web', '2021-04-08 01:47:45', '2021-04-08 01:47:45');
INSERT INTO `permissions` VALUES (37, 'view_pages', 'web', '2021-04-08 01:47:45', '2021-04-08 01:47:45');
INSERT INTO `permissions` VALUES (38, 'add_pages', 'web', '2021-04-08 01:47:46', '2021-04-08 01:47:46');
INSERT INTO `permissions` VALUES (39, 'edit_pages', 'web', '2021-04-08 01:47:46', '2021-04-08 01:47:46');
INSERT INTO `permissions` VALUES (40, 'delete_pages', 'web', '2021-04-08 01:47:46', '2021-04-08 01:47:46');
INSERT INTO `permissions` VALUES (41, 'download_pages', 'web', '2021-04-08 01:47:46', '2021-04-08 01:47:46');
INSERT INTO `permissions` VALUES (42, 'upload_pages', 'web', '2021-04-08 01:47:46', '2021-04-08 01:47:46');
INSERT INTO `permissions` VALUES (43, 'print_pages', 'web', '2021-04-08 01:47:46', '2021-04-08 01:47:46');
INSERT INTO `permissions` VALUES (44, 'public_employee', 'web', '2021-04-08 01:47:46', '2021-04-08 01:47:46');
INSERT INTO `permissions` VALUES (45, 'view_employee', 'web', '2021-04-08 01:47:47', '2021-04-08 01:47:47');
INSERT INTO `permissions` VALUES (46, 'add_employee', 'web', '2021-04-08 01:47:47', '2021-04-08 01:47:47');
INSERT INTO `permissions` VALUES (47, 'edit_employee', 'web', '2021-04-08 01:47:47', '2021-04-08 01:47:47');
INSERT INTO `permissions` VALUES (48, 'delete_employee', 'web', '2021-04-08 01:47:47', '2021-04-08 01:47:47');
INSERT INTO `permissions` VALUES (49, 'download_employee', 'web', '2021-04-08 01:47:47', '2021-04-08 01:47:47');
INSERT INTO `permissions` VALUES (50, 'upload_employee', 'web', '2021-04-08 01:47:47', '2021-04-08 01:47:47');
INSERT INTO `permissions` VALUES (51, 'print_employee', 'web', '2021-04-08 01:47:47', '2021-04-08 01:47:47');
INSERT INTO `permissions` VALUES (52, 'public_slides', 'web', '2021-04-08 01:47:47', '2021-04-08 01:47:47');
INSERT INTO `permissions` VALUES (53, 'view_slides', 'web', '2021-04-08 01:47:47', '2021-04-08 01:47:47');
INSERT INTO `permissions` VALUES (54, 'add_slides', 'web', '2021-04-08 01:47:48', '2021-04-08 01:47:48');
INSERT INTO `permissions` VALUES (55, 'edit_slides', 'web', '2021-04-08 01:47:48', '2021-04-08 01:47:48');
INSERT INTO `permissions` VALUES (56, 'delete_slides', 'web', '2021-04-08 01:47:48', '2021-04-08 01:47:48');
INSERT INTO `permissions` VALUES (57, 'download_slides', 'web', '2021-04-08 01:47:48', '2021-04-08 01:47:48');
INSERT INTO `permissions` VALUES (58, 'upload_slides', 'web', '2021-04-08 01:47:48', '2021-04-08 01:47:48');
INSERT INTO `permissions` VALUES (59, 'print_slides', 'web', '2021-04-08 01:47:48', '2021-04-08 01:47:48');
INSERT INTO `permissions` VALUES (60, 'public_advertises', 'web', '2021-04-08 01:47:48', '2021-04-08 01:47:48');
INSERT INTO `permissions` VALUES (61, 'view_advertises', 'web', '2021-04-08 01:47:48', '2021-04-08 01:47:48');
INSERT INTO `permissions` VALUES (62, 'add_advertises', 'web', '2021-04-08 01:47:49', '2021-04-08 01:47:49');
INSERT INTO `permissions` VALUES (63, 'edit_advertises', 'web', '2021-04-08 01:47:49', '2021-04-08 01:47:49');
INSERT INTO `permissions` VALUES (64, 'delete_advertises', 'web', '2021-04-08 01:47:49', '2021-04-08 01:47:49');
INSERT INTO `permissions` VALUES (65, 'download_advertises', 'web', '2021-04-08 01:47:49', '2021-04-08 01:47:49');
INSERT INTO `permissions` VALUES (66, 'upload_advertises', 'web', '2021-04-08 01:47:49', '2021-04-08 01:47:49');
INSERT INTO `permissions` VALUES (67, 'print_advertises', 'web', '2021-04-08 01:47:49', '2021-04-08 01:47:49');
INSERT INTO `permissions` VALUES (68, 'public_role', 'web', '2021-04-08 01:47:49', '2021-04-08 01:47:49');
INSERT INTO `permissions` VALUES (69, 'view_role', 'web', '2021-04-08 01:47:49', '2021-04-08 01:47:49');
INSERT INTO `permissions` VALUES (70, 'add_role', 'web', '2021-04-08 01:47:49', '2021-04-08 01:47:49');
INSERT INTO `permissions` VALUES (71, 'edit_role', 'web', '2021-04-08 01:47:50', '2021-04-08 01:47:50');
INSERT INTO `permissions` VALUES (72, 'delete_role', 'web', '2021-04-08 01:47:50', '2021-04-08 01:47:50');
INSERT INTO `permissions` VALUES (73, 'download_role', 'web', '2021-04-08 01:47:50', '2021-04-08 01:47:50');
INSERT INTO `permissions` VALUES (74, 'upload_role', 'web', '2021-04-08 01:47:50', '2021-04-08 01:47:50');
INSERT INTO `permissions` VALUES (75, 'print_role', 'web', '2021-04-08 01:47:50', '2021-04-08 01:47:50');
INSERT INTO `permissions` VALUES (76, 'public_role_has_permissions', 'web', '2021-04-08 01:47:50', '2021-04-08 01:47:50');
INSERT INTO `permissions` VALUES (77, 'view_role_has_permissions', 'web', '2021-04-08 01:47:50', '2021-04-08 01:47:50');
INSERT INTO `permissions` VALUES (78, 'add_role_has_permissions', 'web', '2021-04-08 01:47:50', '2021-04-08 01:47:50');
INSERT INTO `permissions` VALUES (79, 'edit_role_has_permissions', 'web', '2021-04-08 01:47:50', '2021-04-08 01:47:50');
INSERT INTO `permissions` VALUES (80, 'delete_role_has_permissions', 'web', '2021-04-08 01:47:51', '2021-04-08 01:47:51');
INSERT INTO `permissions` VALUES (81, 'download_role_has_permissions', 'web', '2021-04-08 01:47:51', '2021-04-08 01:47:51');
INSERT INTO `permissions` VALUES (82, 'upload_role_has_permissions', 'web', '2021-04-08 01:47:51', '2021-04-08 01:47:51');
INSERT INTO `permissions` VALUES (83, 'print_role_has_permissions', 'web', '2021-04-08 01:47:51', '2021-04-08 01:47:51');
INSERT INTO `permissions` VALUES (84, 'view_profile', 'web', '2021-04-08 01:47:51', '2021-04-08 01:47:51');
INSERT INTO `permissions` VALUES (85, 'add_profile', 'web', '2021-04-08 01:47:51', '2021-04-08 01:47:51');

-- ----------------------------
-- Table structure for post_categories
-- ----------------------------
DROP TABLE IF EXISTS `post_categories`;
CREATE TABLE `post_categories`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `post_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of post_categories
-- ----------------------------
INSERT INTO `post_categories` VALUES (1, 4, 5, '2021-04-09 03:35:27', '2021-04-09 03:35:27');

-- ----------------------------
-- Table structure for post_images
-- ----------------------------
DROP TABLE IF EXISTS `post_images`;
CREATE TABLE `post_images`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `post_id` int(10) UNSIGNED NOT NULL,
  `post_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of post_images
-- ----------------------------

-- ----------------------------
-- Table structure for posts
-- ----------------------------
DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `post_author` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_title` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_excerpt` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `post_name` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `post_date` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `post_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ob_title` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ob_desception` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ob_keyword` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `post_type` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_status` tinyint(3) UNSIGNED NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of posts
-- ----------------------------
INSERT INTO `posts` VALUES (1, 'sysadmin', 'Giới thiệu', NULL, NULL, NULL, 'gioi-thieu', NULL, NULL, NULL, NULL, 'page', 1, '2021-04-14 06:44:54', '2021-04-14 06:44:54');
INSERT INTO `posts` VALUES (2, 'sysadmin', 'Liên hệ', NULL, NULL, NULL, 'lien-he', NULL, NULL, NULL, NULL, 'page', 1, '2021-04-14 06:44:55', '2021-04-14 06:44:55');
INSERT INTO `posts` VALUES (3, 'sysadmin', 'Giới thiệu', NULL, NULL, NULL, 'gioi-thieu', NULL, NULL, NULL, NULL, 'page', 1, '2021-04-14 06:44:55', '2021-04-14 06:44:55');
INSERT INTO `posts` VALUES (4, 'sysadmin', 'Liên hệ', NULL, NULL, NULL, 'lien-he', NULL, NULL, NULL, NULL, 'page', 1, '2021-04-14 06:44:56', '2021-04-14 06:44:56');

-- ----------------------------
-- Table structure for role_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE `role_has_permissions`  (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`, `role_id`) USING BTREE,
  INDEX `role_has_permissions_role_id_foreign`(`role_id`) USING BTREE,
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of role_has_permissions
-- ----------------------------
INSERT INTO `role_has_permissions` VALUES (1, 1);
INSERT INTO `role_has_permissions` VALUES (1, 2);
INSERT INTO `role_has_permissions` VALUES (1, 3);
INSERT INTO `role_has_permissions` VALUES (1, 4);
INSERT INTO `role_has_permissions` VALUES (2, 1);
INSERT INTO `role_has_permissions` VALUES (2, 2);
INSERT INTO `role_has_permissions` VALUES (2, 3);
INSERT INTO `role_has_permissions` VALUES (2, 4);
INSERT INTO `role_has_permissions` VALUES (3, 1);
INSERT INTO `role_has_permissions` VALUES (4, 1);
INSERT INTO `role_has_permissions` VALUES (5, 1);
INSERT INTO `role_has_permissions` VALUES (5, 2);
INSERT INTO `role_has_permissions` VALUES (5, 3);
INSERT INTO `role_has_permissions` VALUES (5, 4);
INSERT INTO `role_has_permissions` VALUES (6, 1);
INSERT INTO `role_has_permissions` VALUES (7, 1);
INSERT INTO `role_has_permissions` VALUES (8, 1);
INSERT INTO `role_has_permissions` VALUES (9, 1);
INSERT INTO `role_has_permissions` VALUES (10, 1);
INSERT INTO `role_has_permissions` VALUES (11, 1);
INSERT INTO `role_has_permissions` VALUES (12, 1);
INSERT INTO `role_has_permissions` VALUES (13, 1);
INSERT INTO `role_has_permissions` VALUES (13, 2);
INSERT INTO `role_has_permissions` VALUES (13, 3);
INSERT INTO `role_has_permissions` VALUES (13, 4);
INSERT INTO `role_has_permissions` VALUES (14, 1);
INSERT INTO `role_has_permissions` VALUES (15, 1);
INSERT INTO `role_has_permissions` VALUES (16, 1);
INSERT INTO `role_has_permissions` VALUES (17, 1);
INSERT INTO `role_has_permissions` VALUES (18, 1);
INSERT INTO `role_has_permissions` VALUES (19, 1);
INSERT INTO `role_has_permissions` VALUES (20, 1);
INSERT INTO `role_has_permissions` VALUES (21, 1);
INSERT INTO `role_has_permissions` VALUES (21, 2);
INSERT INTO `role_has_permissions` VALUES (21, 3);
INSERT INTO `role_has_permissions` VALUES (21, 4);
INSERT INTO `role_has_permissions` VALUES (22, 1);
INSERT INTO `role_has_permissions` VALUES (23, 1);
INSERT INTO `role_has_permissions` VALUES (24, 1);
INSERT INTO `role_has_permissions` VALUES (25, 1);
INSERT INTO `role_has_permissions` VALUES (26, 1);
INSERT INTO `role_has_permissions` VALUES (27, 1);
INSERT INTO `role_has_permissions` VALUES (28, 1);
INSERT INTO `role_has_permissions` VALUES (29, 1);
INSERT INTO `role_has_permissions` VALUES (29, 2);
INSERT INTO `role_has_permissions` VALUES (29, 3);
INSERT INTO `role_has_permissions` VALUES (29, 4);
INSERT INTO `role_has_permissions` VALUES (30, 1);
INSERT INTO `role_has_permissions` VALUES (31, 1);
INSERT INTO `role_has_permissions` VALUES (32, 1);
INSERT INTO `role_has_permissions` VALUES (33, 1);
INSERT INTO `role_has_permissions` VALUES (34, 1);
INSERT INTO `role_has_permissions` VALUES (35, 1);
INSERT INTO `role_has_permissions` VALUES (36, 1);
INSERT INTO `role_has_permissions` VALUES (37, 1);
INSERT INTO `role_has_permissions` VALUES (37, 2);
INSERT INTO `role_has_permissions` VALUES (37, 3);
INSERT INTO `role_has_permissions` VALUES (37, 4);
INSERT INTO `role_has_permissions` VALUES (38, 1);
INSERT INTO `role_has_permissions` VALUES (39, 1);
INSERT INTO `role_has_permissions` VALUES (40, 1);
INSERT INTO `role_has_permissions` VALUES (41, 1);
INSERT INTO `role_has_permissions` VALUES (42, 1);
INSERT INTO `role_has_permissions` VALUES (43, 1);
INSERT INTO `role_has_permissions` VALUES (44, 1);
INSERT INTO `role_has_permissions` VALUES (45, 1);
INSERT INTO `role_has_permissions` VALUES (45, 2);
INSERT INTO `role_has_permissions` VALUES (45, 3);
INSERT INTO `role_has_permissions` VALUES (45, 4);
INSERT INTO `role_has_permissions` VALUES (46, 1);
INSERT INTO `role_has_permissions` VALUES (47, 1);
INSERT INTO `role_has_permissions` VALUES (48, 1);
INSERT INTO `role_has_permissions` VALUES (49, 1);
INSERT INTO `role_has_permissions` VALUES (50, 1);
INSERT INTO `role_has_permissions` VALUES (51, 1);
INSERT INTO `role_has_permissions` VALUES (52, 1);
INSERT INTO `role_has_permissions` VALUES (53, 1);
INSERT INTO `role_has_permissions` VALUES (53, 2);
INSERT INTO `role_has_permissions` VALUES (53, 3);
INSERT INTO `role_has_permissions` VALUES (53, 4);
INSERT INTO `role_has_permissions` VALUES (54, 1);
INSERT INTO `role_has_permissions` VALUES (55, 1);
INSERT INTO `role_has_permissions` VALUES (56, 1);
INSERT INTO `role_has_permissions` VALUES (57, 1);
INSERT INTO `role_has_permissions` VALUES (58, 1);
INSERT INTO `role_has_permissions` VALUES (59, 1);
INSERT INTO `role_has_permissions` VALUES (60, 1);
INSERT INTO `role_has_permissions` VALUES (61, 1);
INSERT INTO `role_has_permissions` VALUES (61, 2);
INSERT INTO `role_has_permissions` VALUES (61, 3);
INSERT INTO `role_has_permissions` VALUES (61, 4);
INSERT INTO `role_has_permissions` VALUES (62, 1);
INSERT INTO `role_has_permissions` VALUES (63, 1);
INSERT INTO `role_has_permissions` VALUES (64, 1);
INSERT INTO `role_has_permissions` VALUES (65, 1);
INSERT INTO `role_has_permissions` VALUES (66, 1);
INSERT INTO `role_has_permissions` VALUES (67, 1);
INSERT INTO `role_has_permissions` VALUES (68, 1);
INSERT INTO `role_has_permissions` VALUES (69, 1);
INSERT INTO `role_has_permissions` VALUES (69, 2);
INSERT INTO `role_has_permissions` VALUES (69, 3);
INSERT INTO `role_has_permissions` VALUES (69, 4);
INSERT INTO `role_has_permissions` VALUES (70, 1);
INSERT INTO `role_has_permissions` VALUES (71, 1);
INSERT INTO `role_has_permissions` VALUES (72, 1);
INSERT INTO `role_has_permissions` VALUES (73, 1);
INSERT INTO `role_has_permissions` VALUES (74, 1);
INSERT INTO `role_has_permissions` VALUES (75, 1);
INSERT INTO `role_has_permissions` VALUES (76, 1);
INSERT INTO `role_has_permissions` VALUES (77, 1);
INSERT INTO `role_has_permissions` VALUES (77, 2);
INSERT INTO `role_has_permissions` VALUES (77, 3);
INSERT INTO `role_has_permissions` VALUES (77, 4);
INSERT INTO `role_has_permissions` VALUES (78, 1);
INSERT INTO `role_has_permissions` VALUES (79, 1);
INSERT INTO `role_has_permissions` VALUES (80, 1);
INSERT INTO `role_has_permissions` VALUES (81, 1);
INSERT INTO `role_has_permissions` VALUES (82, 1);
INSERT INTO `role_has_permissions` VALUES (83, 1);
INSERT INTO `role_has_permissions` VALUES (84, 1);
INSERT INTO `role_has_permissions` VALUES (84, 2);
INSERT INTO `role_has_permissions` VALUES (84, 3);
INSERT INTO `role_has_permissions` VALUES (84, 4);
INSERT INTO `role_has_permissions` VALUES (85, 1);

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `level` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'L1',
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_rank` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles_status_prop` smallint(5) UNSIGNED NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `roles_name_guard_name_unique`(`name`, `guard_name`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, 'L1', 'System Admin', 0, '', 'web', 1, '2021-04-08 01:47:52', '2021-04-08 01:47:52');
INSERT INTO `roles` VALUES (2, 'L2', 'Admin', 0, '', 'web', 1, '2021-04-08 01:48:01', '2021-04-08 01:48:01');
INSERT INTO `roles` VALUES (3, 'L3', 'Manager', 0, '', 'web', 1, '2021-04-08 01:48:04', '2021-04-08 01:48:04');
INSERT INTO `roles` VALUES (4, 'L4', 'Staff', 0, '', 'web', 1, '2021-04-08 01:48:08', '2021-04-08 01:48:08');

-- ----------------------------
-- Table structure for sections
-- ----------------------------
DROP TABLE IF EXISTS `sections`;
CREATE TABLE `sections`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) UNSIGNED NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `api` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sections
-- ----------------------------
INSERT INTO `sections` VALUES (1, NULL, 'admin', 'admin', '', 'admin', NULL, '2021-04-08 01:47:39', '2021-04-08 01:47:39');
INSERT INTO `sections` VALUES (2, NULL, 'home', 'home', '', 'home', NULL, '2021-04-08 01:47:39', '2021-04-08 01:47:39');
INSERT INTO `sections` VALUES (3, NULL, 'setting', 'setting', '', 'setting', NULL, '2021-04-08 01:47:39', '2021-04-08 01:47:39');
INSERT INTO `sections` VALUES (4, NULL, 'menus', 'menus', '', 'menus', NULL, '2021-04-08 01:47:40', '2021-04-08 01:47:40');
INSERT INTO `sections` VALUES (5, NULL, 'categories', 'categories', '', 'categoríes', NULL, '2021-04-08 01:47:40', '2021-04-08 01:47:40');
INSERT INTO `sections` VALUES (6, NULL, 'posts', 'posts', '', 'posts', NULL, '2021-04-08 01:47:40', '2021-04-08 01:47:40');
INSERT INTO `sections` VALUES (7, NULL, 'pages', 'pages', '', 'pages', NULL, '2021-04-08 01:47:40', '2021-04-08 01:47:40');
INSERT INTO `sections` VALUES (8, NULL, 'employee', 'employee', 'employee', 'employees', NULL, '2021-04-08 01:47:40', '2021-04-08 01:47:40');
INSERT INTO `sections` VALUES (9, NULL, 'slides', 'slides', '', 'slides', NULL, '2021-04-08 01:47:40', '2021-04-08 01:47:40');
INSERT INTO `sections` VALUES (10, NULL, 'advertises', 'advertises', '', 'advertises', NULL, '2021-04-08 01:47:40', '2021-04-08 01:47:40');
INSERT INTO `sections` VALUES (11, NULL, 'role', 'role', '', 'api/v1/role', NULL, '2021-04-08 01:47:40', '2021-04-08 01:47:40');
INSERT INTO `sections` VALUES (12, 11, 'role has permissions', 'role_has_permissions', '', 'api/v1/role_has_permissions', NULL, '2021-04-08 01:47:40', '2021-04-08 01:47:41');
INSERT INTO `sections` VALUES (13, NULL, 'profile', 'profile', '', 'api/v1/employee/profile', NULL, '2021-04-08 01:47:40', '2021-04-08 01:47:40');

-- ----------------------------
-- Table structure for setting_details
-- ----------------------------
DROP TABLE IF EXISTS `setting_details`;
CREATE TABLE `setting_details`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `setting_id` int(10) UNSIGNED NOT NULL,
  `key` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `is_private` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of setting_details
-- ----------------------------
INSERT INTO `setting_details` VALUES (1, 1, 'web_name', 'Design web VNNIT', 0, '2021-04-14 06:48:22', '2021-04-14 06:48:22');
INSERT INTO `setting_details` VALUES (2, 1, 'web_phone', '0976112209', 0, '2021-04-14 06:48:23', '2021-04-14 06:48:23');
INSERT INTO `setting_details` VALUES (3, 1, 'web_email', 'nhanit3004@gmail.com', 0, '2021-04-14 06:48:23', '2021-04-14 06:48:23');
INSERT INTO `setting_details` VALUES (4, 1, 'web_address', '9/25 Âu Dương Lân, phường 3, quận 8', 0, '2021-04-14 06:48:23', '2021-04-14 06:48:23');
INSERT INTO `setting_details` VALUES (5, 1, 'ob_title', 'Design web VNNIT', 0, '2021-04-14 06:48:23', '2021-04-14 06:48:23');
INSERT INTO `setting_details` VALUES (6, 1, 'ob_desception', '', 0, '2021-04-14 06:48:23', '2021-04-14 06:48:23');
INSERT INTO `setting_details` VALUES (7, 1, 'ob_keyword', 'design web, thiết kế web', 0, '2021-04-14 06:48:23', '2021-04-14 06:48:23');
INSERT INTO `setting_details` VALUES (8, 2, 'web_map', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.820424560531!2d106.68021631457992!3d10.748319262651428!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f07339b25ed%3A0xabad8cdf8ba56ef4!2zOS8yNSDDgnUgRMawxqFuZyBMw6JuLCBQaMaw4budbmcgMywgUXXhuq1uIDgsIFRow6BuaCBwaOG7kSBI4buTIENow60gTWluaCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1618146043748!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 0, '2021-04-14 06:48:24', '2021-04-14 06:48:24');
INSERT INTO `setting_details` VALUES (9, 3, 'web_favicon', 'favicon.ico', 0, '2021-04-14 06:48:24', '2021-04-14 06:48:24');
INSERT INTO `setting_details` VALUES (10, 3, 'web_logo', '', 0, '2021-04-14 06:48:24', '2021-04-14 06:48:24');
INSERT INTO `setting_details` VALUES (11, 3, 'web_banner', '', 0, '2021-04-14 06:48:24', '2021-04-14 06:48:24');
INSERT INTO `setting_details` VALUES (12, 3, 'menu_type', '[\"main\",\"footer\",\"footerOur\",\"main_mobile\"]', 0, '2021-04-14 06:48:24', '2021-04-14 06:48:24');
INSERT INTO `setting_details` VALUES (13, 4, 'text_copyright', '{\"title\":\"\",\"text\":\"\\u00a9 Copyright VNNIT Computer. All Rights Reserved\"}', 0, '2021-04-14 06:48:25', '2021-04-14 06:48:25');
INSERT INTO `setting_details` VALUES (14, 4, 'text_footer', '{\"title\":\"\",\"text\":\"Designed by VNNIT Computer\"}', 0, '2021-04-14 06:48:25', '2021-04-14 06:48:25');
INSERT INTO `setting_details` VALUES (15, 4, 'text_ournews', '{\"title\":\"Tin t\\u1ee9c m\\u1edbi c\\u1ee7a ch\\u00fang t\\u00f4i\",\"text\":\"\\u0110\\u0103ng k\\u00fd nh\\u1eadn tin m\\u1edbi (\\u0110ang c\\u1eadp nh\\u1eadt)\"}', 0, '2021-04-14 06:48:25', '2021-04-14 06:48:25');
INSERT INTO `setting_details` VALUES (16, 4, 'text_top_herder', '{\"title\":\"\",\"text\":\"<i class=\\\"fa fa-envelope d-flex align-items-center\\\"><a href=\\\"mailto:nhanit3004@gmail.com\\\">nhanit3004@gmail.com<\\/a><\\/i>\\n                    <i class=\\\"fa fa-phone d-flex align-items-center ms-4\\\"><span>+84 976112209<\\/span><\\/i>\"}', 0, '2021-04-14 06:48:25', '2021-04-14 06:48:25');
INSERT INTO `setting_details` VALUES (17, 4, 'text_header_social', '{\"title\":\"\",\"text\":\"<a href=\\\"#\\\" class=\\\"twitter\\\"><i class=\\\"fa fa-twitter\\\"><\\/i><\\/a>\\n                    <a href=\\\"#\\\" class=\\\"facebook\\\"><i class=\\\"fa fa-facebook\\\"><\\/i><\\/a>\\n                    <a href=\\\"#\\\" class=\\\"instagram\\\"><i class=\\\"fa fa-instagram\\\"><\\/i><\\/a>\\n                    <a href=\\\"#\\\" class=\\\"linkedin\\\"><i class=\\\"fa fa-linkedin\\\"><\\/i><\\/a>\"}', 0, '2021-04-14 06:48:25', '2021-04-14 06:48:25');
INSERT INTO `setting_details` VALUES (18, 4, 'text_footer_social', '{\"title\":\"\",\"text\":\"<a href=\\\"#\\\" class=\\\"twitter\\\"><i class=\\\"fa fa-twitter\\\"><\\/i><\\/a>\\n                    <a href=\\\"#\\\" class=\\\"facebook\\\"><i class=\\\"fa fa-facebook\\\"><\\/i><\\/a>\\n                    <a href=\\\"#\\\" class=\\\"instagram\\\"><i class=\\\"fa fa-instagram\\\"><\\/i><\\/a>\\n                    <a href=\\\"#\\\" class=\\\"google-plus\\\"><i class=\\\"fa fa-skype\\\"><\\/i><\\/a>\\n                    <a href=\\\"#\\\" class=\\\"linkedin\\\"><i class=\\\"fa fa-linkedin\\\"><\\/i><\\/a>\"}', 0, '2021-04-14 06:48:25', '2021-04-14 06:48:25');

-- ----------------------------
-- Table structure for settings
-- ----------------------------
DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of settings
-- ----------------------------
INSERT INTO `settings` VALUES (1, 'info', '2021-04-14 06:48:22', '2021-04-14 06:48:22');
INSERT INTO `settings` VALUES (2, 'map', '2021-04-14 06:48:23', '2021-04-14 06:48:23');
INSERT INTO `settings` VALUES (3, 'home', '2021-04-14 06:48:24', '2021-04-14 06:48:24');
INSERT INTO `settings` VALUES (4, 'widget', '2021-04-14 06:48:24', '2021-04-14 06:48:24');

-- ----------------------------
-- Table structure for stmenus
-- ----------------------------
DROP TABLE IF EXISTS `stmenus`;
CREATE TABLE `stmenus`  (
  `STMenuID` int(10) NOT NULL AUTO_INCREMENT,
  `STMenuName` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `FK_STMenuParentID` int(10) NULL DEFAULT NULL,
  `STMenuLink` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `STMenuLevel` smallint(6) NULL DEFAULT NULL,
  `STMenuLft` int(10) NULL DEFAULT NULL,
  `STMenuRgt` int(10) NULL DEFAULT NULL,
  `FK_ADCategoryID` int(11) NULL DEFAULT 0,
  `STMenuDocType` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`STMenuID`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 18 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of stmenus
-- ----------------------------
INSERT INTO `stmenus` VALUES (1, 'Trang chủ', 0, '', 0, 1, 2, 0, 'home');
INSERT INTO `stmenus` VALUES (2, 'Giới thiệu', 0, 'gioi-thieu', 0, 3, 4, 1, 'home');
INSERT INTO `stmenus` VALUES (3, 'Tin tức', 0, 'tin-tuc', 0, 5, 10, 3, 'home');
INSERT INTO `stmenus` VALUES (4, 'Dịch vụ', 0, 'dich-vu', 0, 11, 16, 2, 'home');
INSERT INTO `stmenus` VALUES (5, 'Liên hệ', 0, 'lien-he', 0, 17, 18, 0, 'home');
INSERT INTO `stmenus` VALUES (6, 'Dịch vụ seo', 4, 'dich-vu-seo', 0, 12, 13, 4, 'home');
INSERT INTO `stmenus` VALUES (7, 'Thiết kế web', 4, 'thiet-ke-web', 0, 14, 15, 5, 'home');
INSERT INTO `stmenus` VALUES (12, 'Kiến thức websire', 3, 'kien-thuc-websire', 0, 6, 7, 6, 'home');
INSERT INTO `stmenus` VALUES (11, 'Kiến thức seo', 3, 'kien-thuc-seo', 0, 8, 9, 7, 'home');
INSERT INTO `stmenus` VALUES (15, 'Hướng dẫn', 0, 'huong-dan', 0, 19, 20, 0, 'autopost');
INSERT INTO `stmenus` VALUES (16, 'Bài viết', 0, 'bai-viet', 0, 21, 22, 0, 'autopost');
INSERT INTO `stmenus` VALUES (17, 'Nguồn tin', 0, 'nguon-tin', 0, 23, 24, 0, 'autopost');

-- ----------------------------
-- Table structure for stslugs
-- ----------------------------
DROP TABLE IF EXISTS `stslugs`;
CREATE TABLE `stslugs`  (
  `STSlugID` int(11) NOT NULL AUTO_INCREMENT,
  `STSlugName` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `STSlugLink` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `AAStatus` bit(1) NULL DEFAULT b'1',
  PRIMARY KEY (`STSlugID`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 9 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of stslugs
-- ----------------------------
INSERT INTO `stslugs` VALUES (1, 'gioi-thieu', 'home/welcome/postnew/gioi-thieu', b'1');
INSERT INTO `stslugs` VALUES (2, 'dich-vu', 'home/welcome/category/dich-vu', b'1');
INSERT INTO `stslugs` VALUES (3, 'tin-tuc', 'home/welcome/news/tin-tuc', b'1');
INSERT INTO `stslugs` VALUES (5, 'lien-he', 'home/welcome/contact', b'1');
INSERT INTO `stslugs` VALUES (4, 'dich-vu/(:any)-(:num)', 'home/welcome/postnew/$1/$2', b'1');
INSERT INTO `stslugs` VALUES (6, 'dich-vu/(:any)', 'home/welcome/listposts/$1', b'1');
INSERT INTO `stslugs` VALUES (7, 'tin-tuc/(:any)-(:num)', 'home/welcome/postnew/$1', b'1');
INSERT INTO `stslugs` VALUES (8, 'tin-tuc/(:any)', 'home/welcome/listposts/$1', b'1');

-- ----------------------------
-- Table structure for user_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `user_has_permissions`;
CREATE TABLE `user_has_permissions`  (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`, `model_id`, `model_type`) USING BTREE,
  INDEX `model_has_permissions_model_id_model_type_index`(`model_id`, `model_type`) USING BTREE,
  CONSTRAINT `user_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user_has_permissions
-- ----------------------------

-- ----------------------------
-- Table structure for user_has_roles
-- ----------------------------
DROP TABLE IF EXISTS `user_has_roles`;
CREATE TABLE `user_has_roles`  (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`, `model_id`, `model_type`) USING BTREE,
  INDEX `model_has_roles_model_id_model_type_index`(`model_id`, `model_type`) USING BTREE,
  CONSTRAINT `user_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user_has_roles
-- ----------------------------
INSERT INTO `user_has_roles` VALUES (1, 'App\\Models\\User\\User', 1);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_username_unique`(`username`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Sys Admin', 'thangtran3690@gmail.com', '$2y$10$tkQcaLv8WdF1HOJjr9Rneu8zFtRbFRxjxiRb5h268C7ZpTaqCnG72', NULL, '2021-03-24 09:06:38', '2021-03-24 09:06:38', 'sysadmin', 0);

-- ----------------------------
-- View structure for myadcategories
-- ----------------------------
DROP VIEW IF EXISTS `myadcategories`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `myadcategories` AS select `a`.`ADCategoryID` AS `ADCategoryID`,`a`.`FK_ADCategoryParentID` AS `FK_ADCategoryParentID`,`b`.`ADCategoryName` AS `ADCategoryParentName`,`b`.`ADCategoryLink` AS `ADCategoryParentLink`,`a`.`ADCategoryName` AS `ADCategoryName`,`a`.`ADCategoryDesc` AS `ADCategoryDesc`,`a`.`ADCategoryLink` AS `ADCategoryLink`,`a`.`AAImage` AS `AAImage`,`a`.`AAIsHome` AS `AAIsHome`,case when `a`.`AATitle` = '' then `a`.`ADCategoryName` else `a`.`AATitle` end AS `AACatTitle` from (`adcategories` `a` left join `adcategories` `b` on(`a`.`FK_ADCategoryParentID` = `b`.`ADCategoryID`)) where `a`.`AAStatus` = 1;

-- ----------------------------
-- View structure for myadposts
-- ----------------------------
DROP VIEW IF EXISTS `myadposts`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `myadposts` AS select `adcategories`.`ADCategoryID` AS `ADCategoryID`,`adcategories`.`ADCategoryName` AS `ADCategoryName`,`adcategories`.`ADCategoryLink` AS `ADCategoryLink`,case when `adcategories`.`AATitle` = '' then `adcategories`.`ADCategoryName` else `adcategories`.`AATitle` end AS `AACatTitle`,`adcategories`.`AADescription` AS `AACatDescription`,`adcategories`.`AAKeyWord` AS `AACatKeyWord`,`adposts`.`ADPostID` AS `ADPostID`,`adposts`.`ADUserName` AS `ADUserName`,`adposts`.`ADPostTitle` AS `ADPostTitle`,`adposts`.`ADPostDesc` AS `ADPostDesc`,`adposts`.`FK_ADCategoryID` AS `FK_ADCategoryID`,`adposts`.`AAImage` AS `AAImage`,`adposts`.`ADPostLink` AS `ADPostLink`,`adposts`.`ADPostContent` AS `ADPostContent`,`adposts`.`ADPostPublicDate` AS `ADPostPublicDate`,`adposts`.`ADPostView` AS `ADPostView`,`adposts`.`ADPostTime` AS `ADPostTime`,`adposts`.`ADPostDate` AS `ADPostDate`,`adposts`.`AATitle` AS `AATitle`,`adposts`.`AADescription` AS `AADescription`,`adposts`.`AAKeyWord` AS `AAKeyWord`,`adposts`.`AAStatus` AS `AAStatus` from (`adcategories` join `adposts` on(`adcategories`.`ADCategoryID` = `adposts`.`FK_ADCategoryID` and `adposts`.`AAStatus` = 1)) where `adcategories`.`AAStatus` = 1;

-- ----------------------------
-- View structure for mybaiviet
-- ----------------------------
DROP VIEW IF EXISTS `mybaiviet`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `mybaiviet` AS select `adposts`.`ADPostID` AS `ADPostID`,`adposts`.`ADUserName` AS `ADUserName`,`adposts`.`ADPostTitle` AS `ADPostTitle`,`adposts`.`ADPostDesc` AS `ADPostDesc`,`adposts`.`FK_ADCategoryID` AS `FK_ADCategoryID`,`adposts`.`AAImage` AS `AAImage`,`adposts`.`ADPostLink` AS `ADPostLink`,`adposts`.`ADPostContent` AS `ADPostContent`,`adposts`.`ADPostPublicDate` AS `ADPostPublicDate`,`adposts`.`ADPostView` AS `ADPostView`,`adposts`.`ADPostTime` AS `ADPostTime`,`adposts`.`ADPostDate` AS `ADPostDate`,`adposts`.`AATitle` AS `AATitle`,`adposts`.`AADescription` AS `AADescription`,`adposts`.`AAKeyWord` AS `AAKeyWord`,`adposts`.`AAStatus` AS `AAStatus`,`adcategories`.`ADCategoryName` AS `ADCategoryName`,`adcategories`.`ADCategoryLink` AS `ADCategoryLink`,`apweblinkconfigs`.`APWebLinkConfigName` AS `APWebLinkConfigName` from ((`adposts` join `adcategories` on(`adposts`.`FK_ADCategoryID` = `adcategories`.`ADCategoryID`)) join `apweblinkconfigs` on(`adcategories`.`ADCategoryID` = `apweblinkconfigs`.`FK_ADCategoryID`));

-- ----------------------------
-- View structure for mycategoryhomes
-- ----------------------------
DROP VIEW IF EXISTS `mycategoryhomes`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `mycategoryhomes` AS select `adcategories`.`ADCategoryID` AS `ADCategoryID`,`adcategories`.`ADCategoryName` AS `ADCategoryName`,`adcategories`.`ADCategoryLink` AS `ADCategoryLink`,`adcategories`.`AAImage` AS `AAImage` from `adcategories` where `adcategories`.`AAStatus` = 1 and `adcategories`.`ADCategoryLink` in ('gioi-thieu','dich-vu','tin-tuc');

-- ----------------------------
-- Function structure for LocDauTV
-- ----------------------------
DROP FUNCTION IF EXISTS `LocDauTV`;
delimiter ;;
CREATE FUNCTION `LocDauTV`(strInput varchar(255))
 RETURNS varchar(255) CHARSET utf8
  DETERMINISTIC
begin
	declare sign_char varchar(136);
	declare unsign_char varchar(136);
	declare i int;
	set sign_char   = 'àáạảãâầấậẩẫăằắặẳẵèéẹẻẽêềếệểễìíịỉĩòóọỏõôồốộổỗơờớợởỡùúụủũưừứựửữỳýỵỷỹđÀÁẠẢÃÂẦẤẬẨẪĂẰẮẶẲẴÈÉẸẺẼÊỀẾỆỂỄÌÍỊỈĨÒÓỌỎÕÔỒỐỘỔỖƠỜỚỢỞỠÙÚỤỦŨƯỪỨỰỬỮỲÝỴỶỸĐ';
	set unsign_char = 'aaaaaaaaaaaaaaaaaeeeeeeeeeeeiiiiiooooooooooooooooouuuuuuuuuuuyyyyydAAAAAAAAAAAAAAAAAEEEEEEEEEEEIIIIIOOOOOOOOOOOOOOOOOUUUUUUUUUUUYYYYYD';
	set i = 1;
	while i <= length(unsign_char) do
		set strInput = replace(strInput,substring(sign_char,i,1),substring(unsign_char,i,1));
		set i = i + 1;
        end while;
	return strInput;
end
;;
delimiter ;

SET FOREIGN_KEY_CHECKS = 1;

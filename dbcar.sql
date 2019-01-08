/*
Navicat MySQL Data Transfer

Source Server         : Local
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : dbcar

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2016-11-02 09:00:32
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for brand
-- ----------------------------
DROP TABLE IF EXISTS `brand`;
CREATE TABLE `brand` (
  `id` int(3) NOT NULL AUTO_INCREMENT COMMENT 'รหัส',
  `name` varchar(255) DEFAULT NULL COMMENT 'ยี่ห้อ',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of brand
-- ----------------------------
INSERT INTO `brand` VALUES ('1', 'ฮอนด้า');
INSERT INTO `brand` VALUES ('2', 'นิสสัน');
INSERT INTO `brand` VALUES ('3', 'โตโยต้า');

-- ----------------------------
-- Table structure for car
-- ----------------------------
DROP TABLE IF EXISTS `car`;
CREATE TABLE `car` (
  `id` int(7) NOT NULL AUTO_INCREMENT,
  `carid` varchar(15) DEFAULT NULL COMMENT 'หมายเลขเครื่อง',
  `regis` varchar(20) DEFAULT NULL COMMENT 'ทะเบียน',
  `brandid` int(3) DEFAULT NULL COMMENT 'ยี่ห้อ',
  `gener` varchar(255) DEFAULT NULL COMMENT 'รุ่น',
  `type` int(2) DEFAULT NULL COMMENT 'ประเภท',
  `image` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of car
-- ----------------------------
INSERT INTO `car` VALUES ('1', '3234Rt3', 'กพ 458 กทม', '1', 'mx-100', '1', 'car-1477724654.jpg');
INSERT INTO `car` VALUES ('2', '577765', 'นพ 680 น่าน', '2', 'n80', '2', 'car-1477724635.jpg');
INSERT INTO `car` VALUES ('3', '32429nsd', 'W89 น่าน', '1', 'Wz', '1', 'car-1477724591.jpg');
INSERT INTO `car` VALUES ('4', '32429nsd', 'D77 น่าน', '1', 'Wz', '1', 'car-1477717022.jpg');
INSERT INTO `car` VALUES ('5', '32429nsd', 'W89 น่าน', '1', 'Wz', '1', 'car-1477716977.jpg');
INSERT INTO `car` VALUES ('6', '32429nsd', 'W89 น่าน', '1', 'Wz', '1', 'car-1477711556.jpg');

-- ----------------------------
-- Table structure for dep
-- ----------------------------
DROP TABLE IF EXISTS `dep`;
CREATE TABLE `dep` (
  `dep_id` int(3) NOT NULL AUTO_INCREMENT,
  `dep_name` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `group_id` int(2) DEFAULT NULL,
  PRIMARY KEY (`dep_id`)
) ENGINE=MyISAM AUTO_INCREMENT=68 DEFAULT CHARSET=tis620;

-- ----------------------------
-- Records of dep
-- ----------------------------
INSERT INTO `dep` VALUES ('7', 'ธุรการ', '2');
INSERT INTO `dep` VALUES ('8', 'พัสดุ', '2');
INSERT INTO `dep` VALUES ('9', 'การเงิน', '2');
INSERT INTO `dep` VALUES ('10', 'แผนกช่าง/รปภ', '2');
INSERT INTO `dep` VALUES ('11', 'พขร.', '2');
INSERT INTO `dep` VALUES ('12', 'ห้องบัตร', '1');
INSERT INTO `dep` VALUES ('13', 'OPD', null);
INSERT INTO `dep` VALUES ('14', 'LAB', null);
INSERT INTO `dep` VALUES ('15', 'ทันตกรรม', null);
INSERT INTO `dep` VALUES ('16', 'ห้องยา', null);
INSERT INTO `dep` VALUES ('17', 'ER', null);
INSERT INTO `dep` VALUES ('18', 'Xray', null);
INSERT INTO `dep` VALUES ('19', 'ห้องคลอด', null);
INSERT INTO `dep` VALUES ('20', 'UC/computer', '1');
INSERT INTO `dep` VALUES ('21', 'เวชปฏิบัติชุมชรและครอบครัว', null);
INSERT INTO `dep` VALUES ('22', 'ส่งเสริมสุขภาพ', null);
INSERT INTO `dep` VALUES ('23', 'กายภาพ', '1');
INSERT INTO `dep` VALUES ('24', 'แผนไทย', null);
INSERT INTO `dep` VALUES ('26', 'ซักฟอก', null);
INSERT INTO `dep` VALUES ('27', 'Supply', null);
INSERT INTO `dep` VALUES ('28', 'โรงครัว', null);
INSERT INTO `dep` VALUES ('6', 'แพทย์', '1');
INSERT INTO `dep` VALUES ('30', 'ฝ่ายบริหาร', '2');
INSERT INTO `dep` VALUES ('67', 'Ward 1', '1');

-- ----------------------------
-- Table structure for follow
-- ----------------------------
DROP TABLE IF EXISTS `follow`;
CREATE TABLE `follow` (
  `follow_id` int(1) NOT NULL AUTO_INCREMENT,
  `follow_name` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`follow_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=tis620;

-- ----------------------------
-- Records of follow
-- ----------------------------
INSERT INTO `follow` VALUES ('1', 'แก้ไขแล้ว');
INSERT INTO `follow` VALUES ('2', 'ยังไม่ได้แก้ไข');
INSERT INTO `follow` VALUES ('3', 'ยังไม่ได้แก้ไขและรอติดตาม');

-- ----------------------------
-- Table structure for group
-- ----------------------------
DROP TABLE IF EXISTS `group`;
CREATE TABLE `group` (
  `group_id` int(2) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=tis620;

-- ----------------------------
-- Records of group
-- ----------------------------
INSERT INTO `group` VALUES ('1', 'กลุ่มการพยาบาล');
INSERT INTO `group` VALUES ('2', 'กลุ่มงานบริหารงานทั่วไป');

-- ----------------------------
-- Table structure for jong_car
-- ----------------------------
DROP TABLE IF EXISTS `jong_car`;
CREATE TABLE `jong_car` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vdate` datetime DEFAULT NULL COMMENT 'วันที่ขอรถ',
  `person` varchar(255) DEFAULT NULL COMMENT 'ผู้ขอ',
  `post` varchar(255) DEFAULT NULL COMMENT 'ตำแหน่ง',
  `carid` int(7) DEFAULT NULL COMMENT 'รถ',
  `station` text COMMENT 'สถานที่ไป',
  `cno` int(2) DEFAULT NULL COMMENT 'จำนวน(คน)',
  `thing` double(6,2) DEFAULT NULL COMMENT 'น้ำหนักสิ่งของ',
  `size` double(6,2) DEFAULT NULL COMMENT 'ปริมาตรสิ่งของ',
  `ps_car` int(11) DEFAULT NULL COMMENT 'ผู้ควบคุมรถ',
  `rab_station` varchar(255) DEFAULT NULL COMMENT 'สถานที่ไปรับ',
  `rab_date` datetime DEFAULT NULL COMMENT 'วันที่รับ',
  `song_station` varchar(255) DEFAULT NULL COMMENT 'สถานที่ไปส่ง',
  `song_date` datetime DEFAULT NULL COMMENT 'วันที่ส่ง',
  `caruse` int(2) DEFAULT NULL COMMENT 'จำนวน(เที่ยว)',
  `area` enum('I','O') DEFAULT 'I' COMMENT 'พื้นที่',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jong_car
-- ----------------------------
INSERT INTO `jong_car` VALUES ('1', '2016-10-30 10:06:24', 'นายทดสอบ ระบบ', 'นวก.คอม', '1', 'โรงแรมน่านฟ้าใหม่ จ.กทม.', '2', '15.00', '4.00', '2', 'สนามบินดอนเมือง', '2016-10-19 00:14:57', 'ดอยเสมอดาว', '2016-10-24 00:14:57', '3', 'O');
INSERT INTO `jong_car` VALUES ('2', '2016-10-30 10:07:10', 'ทดสอบ', 'นวก.คอม', '5', 'ไป รพร.ปัว', '5', '45.00', '19.00', '2', 'รพ.ค่าย', '2016-10-31 09:30:53', 'รพร.ปัว', '2016-10-27 10:00:53', '1', 'I');
INSERT INTO `jong_car` VALUES ('3', '2016-10-27 13:04:59', 'ทดสอบ', 'นวก.คอม', '2', 'รพ.เชียงใหม่', '5', '78.00', '34.00', '2', 'รพ.ค่าย', '2016-11-16 09:30:03', 'รพ.เชียงใหม่', '2016-11-16 10:25:03', '1', 'O');
INSERT INTO `jong_car` VALUES ('4', '2016-10-28 08:30:18', 'นายกบ กาลา', 'นักร้อง', '1', 'ป.ลาว', '18', '250.00', '58.00', '2', 'กทม. บ้านพัก', '2016-10-28 16:35:20', 'ป.ลาว เวียงจัน', '2016-10-28 17:25:20', '1', 'O');
INSERT INTO `jong_car` VALUES ('5', '2016-10-31 13:49:18', 'กมล มาลร', 'หมอ', '5', 'ไปส่วนตัว', '4', '25.00', '3.00', '2', 'บ้านพักหน้า รพ.ค่าย', '2016-10-31 06:30:23', 'บ่อเกลือ', '2016-10-31 09:30:23', '1', 'I');

-- ----------------------------
-- Table structure for level
-- ----------------------------
DROP TABLE IF EXISTS `level`;
CREATE TABLE `level` (
  `level_id` int(2) NOT NULL AUTO_INCREMENT,
  `level_name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`level_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=tis620;

-- ----------------------------
-- Records of level
-- ----------------------------
INSERT INTO `level` VALUES ('1', 'ผู้ดูแลระบบ');
INSERT INTO `level` VALUES ('2', 'หัวหน้าแผนก');
INSERT INTO `level` VALUES ('3', 'พลขับ');

-- ----------------------------
-- Table structure for migration
-- ----------------------------
DROP TABLE IF EXISTS `migration`;
CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=MyISAM DEFAULT CHARSET=tis620;

-- ----------------------------
-- Records of migration
-- ----------------------------
INSERT INTO `migration` VALUES ('m000000_000000_base', '1435666293');
INSERT INTO `migration` VALUES ('m140209_132017_init', '1436254826');
INSERT INTO `migration` VALUES ('m140403_174025_create_account_table', '1436254826');
INSERT INTO `migration` VALUES ('m140504_113157_update_tables', '1436254826');
INSERT INTO `migration` VALUES ('m140504_130429_create_token_table', '1436254826');
INSERT INTO `migration` VALUES ('m140830_171933_fix_ip_field', '1436254826');
INSERT INTO `migration` VALUES ('m140830_172703_change_account_table_name', '1436254826');
INSERT INTO `migration` VALUES ('m141222_110026_update_ip_field', '1436254826');

-- ----------------------------
-- Table structure for mtn_car
-- ----------------------------
DROP TABLE IF EXISTS `mtn_car`;
CREATE TABLE `mtn_car` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jongid` int(11) DEFAULT NULL,
  `m1id` int(3) DEFAULT NULL,
  `score` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mtn_car
-- ----------------------------

-- ----------------------------
-- Table structure for out_car
-- ----------------------------
DROP TABLE IF EXISTS `out_car`;
CREATE TABLE `out_car` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jongid` int(11) DEFAULT NULL COMMENT 'รายการจอง',
  `path` varchar(255) DEFAULT NULL COMMENT 'เส้นทาง',
  `time_start` time DEFAULT NULL COMMENT 'ถึง',
  `time_end` time DEFAULT NULL COMMENT 'ออก',
  `mile` double(7,2) DEFAULT NULL COMMENT 'เลขไมล์',
  `wg` double(5,2) DEFAULT NULL COMMENT 'น้ำหนักบรรทุก',
  `time_kho` double(4,2) DEFAULT NULL COMMENT 'เวลาขนของลง',
  `time_koy` double(4,2) DEFAULT NULL COMMENT 'เวลาคอย',
  `time_go` double(2,2) DEFAULT NULL COMMENT 'เวลาเดินทาง',
  PRIMARY KEY (`id`),
  KEY `fk_out_car` (`jongid`),
  CONSTRAINT `fk_out_car` FOREIGN KEY (`jongid`) REFERENCES `jong_car` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of out_car
-- ----------------------------

-- ----------------------------
-- Table structure for ps_car
-- ----------------------------
DROP TABLE IF EXISTS `ps_car`;
CREATE TABLE `ps_car` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `pname` varchar(30) DEFAULT NULL COMMENT 'คำนำหน้า,ยศ',
  `fname` varchar(255) DEFAULT NULL COMMENT 'ชื่อ',
  `lname` varchar(255) DEFAULT NULL COMMENT 'นามสกุล',
  `post` varchar(100) DEFAULT NULL COMMENT 'ตำแหน่ง',
  `tel` varchar(10) DEFAULT NULL COMMENT 'โทรศัพท์',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ps_car
-- ----------------------------

-- ----------------------------
-- Table structure for sys_m1_car
-- ----------------------------
DROP TABLE IF EXISTS `sys_m1_car`;
CREATE TABLE `sys_m1_car` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL COMMENT 'หัวข้อ',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sys_m1_car
-- ----------------------------
INSERT INTO `sys_m1_car` VALUES ('1', 'อาการชำรุดเล็กน้อย');
INSERT INTO `sys_m1_car` VALUES ('2', 'อาการรั่วในที่ต่างๆ');
INSERT INTO `sys_m1_car` VALUES ('3', 'เชื้อเพลิง น้ำมันเครื่อง น้ำ');
INSERT INTO `sys_m1_car` VALUES ('4', 'แป้นเกลียวล้อ,แป้นปลายเพลาล้อ,ยาง');
INSERT INTO `sys_m1_car` VALUES ('5', 'การอุ่นเครื่องยนต์');
INSERT INTO `sys_m1_car` VALUES ('6', 'เครื่องวัดต่างๆ');
INSERT INTO `sys_m1_car` VALUES ('7', 'เครื่องช่วยความปลอดภัย');
INSERT INTO `sys_m1_car` VALUES ('8', 'เครื่องมือ, เครื่องใช้');
INSERT INTO `sys_m1_car` VALUES ('9', 'เอกสาร, แบบฟอร์ม');

-- ----------------------------
-- Table structure for sys_m2_car
-- ----------------------------
DROP TABLE IF EXISTS `sys_m2_car`;
CREATE TABLE `sys_m2_car` (
  `id` int(3) NOT NULL AUTO_INCREMENT COMMENT 'หัวข้อ',
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sys_m2_car
-- ----------------------------
INSERT INTO `sys_m2_car` VALUES ('1', 'เครื่องวัดต่างๆ');
INSERT INTO `sys_m2_car` VALUES ('2', 'ห้ามล้อ');
INSERT INTO `sys_m2_car` VALUES ('3', 'คลัทซ์');
INSERT INTO `sys_m2_car` VALUES ('4', 'เครื่องบัคับเลี้ยว');
INSERT INTO `sys_m2_car` VALUES ('5', 'การทำงานของเครื่องยนต์');
INSERT INTO `sys_m2_car` VALUES ('6', 'เสียงผิดปกติ');

-- ----------------------------
-- Table structure for sys_m3_car
-- ----------------------------
DROP TABLE IF EXISTS `sys_m3_car`;
CREATE TABLE `sys_m3_car` (
  `id` int(3) NOT NULL AUTO_INCREMENT COMMENT 'หัวข้อ',
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sys_m3_car
-- ----------------------------
INSERT INTO `sys_m3_car` VALUES ('1', 'โคมไฟและกระจกสะท้อนแสง');
INSERT INTO `sys_m3_car` VALUES ('2', 'เครื่องช่วยความปลอดภัย');
INSERT INTO `sys_m3_car` VALUES ('3', 'ห้ามล้อ');
INSERT INTO `sys_m3_car` VALUES ('4', 'ถังลม (ระบายความชื้น)');
INSERT INTO `sys_m3_car` VALUES ('5', 'เชื่อเพลิง, น้ำมันเครื่อง, น้ำ (เติม)');
INSERT INTO `sys_m3_car` VALUES ('6', '* สายพานพัดลม ฯลฯ');
INSERT INTO `sys_m3_car` VALUES ('7', '* ระดับน้ำกรดแบตเตอรี่');
INSERT INTO `sys_m3_car` VALUES ('8', '* ความสะอาดของน้ำในหม้อน้ำ');
INSERT INTO `sys_m3_car` VALUES ('9', '* ยาง (ชำรุด) (ความดัน)');
INSERT INTO `sys_m3_car` VALUES ('10', '* การทำความสะอาดทุกส่วน');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `password` varchar(62) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `post` varchar(255) DEFAULT NULL,
  `confirmed_at` enum('N','Y') DEFAULT 'N',
  `blocked_at` enum('N','Y') DEFAULT 'N',
  `registration_ip` varchar(45) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `leveled` int(2) NOT NULL DEFAULT '0',
  `image` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_unique_username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'admin', '64f2b537fb5799658b105cc88bb9afcefb5f3330', 'นายทดสอบ', 'นวก.คอม', 'Y', 'N', null, '0', '0', '1', 'admin.jpg');
INSERT INTO `users` VALUES ('2', 'phajvaj', 'f407632ead9cba2f5447e4a87c168f192fd255e4', 'maiv xlau lauj', 'นทพญ', 'Y', 'N', null, '1477623792', '1477733928', '3', 'user-1477733832.jpg');

-- ----------------------------
-- Table structure for work_car
-- ----------------------------
DROP TABLE IF EXISTS `work_car`;
CREATE TABLE `work_car` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jongid` int(11) DEFAULT NULL COMMENT 'รายการจอง',
  `wk1` enum('N','Y') DEFAULT 'N' COMMENT 'บำรุงประจำวัน',
  `wk2` enum('N','Y') DEFAULT 'N' COMMENT 'บำรุงขณะใช้งาน',
  `wk3` enum('Y','N') DEFAULT 'N' COMMENT 'บำรุงหลังใช้งาน',
  `time_start` time DEFAULT NULL COMMENT 'เวลาเข้า',
  `mile_start` double(7,2) DEFAULT NULL COMMENT 'ไมล์เริ่มต้น',
  `time_end` time DEFAULT NULL COMMENT 'เวลาออก',
  `mile_end` double(7,2) DEFAULT NULL COMMENT 'ไมล์สิ้นสุด',
  `fule` double(5,2) DEFAULT NULL,
  `lubri` double(5,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of work_car
-- ----------------------------

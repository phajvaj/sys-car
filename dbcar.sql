/*
Navicat MySQL Data Transfer

Source Server         : Local
Source Server Version : 50505
Source Host           : 127.0.0.1:3306
Source Database       : dbcar

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2019-03-08 17:47:12
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of brand
-- ----------------------------
INSERT INTO `brand` VALUES ('1', 'ฮอนด้า');
INSERT INTO `brand` VALUES ('2', 'นิสสัน');
INSERT INTO `brand` VALUES ('3', 'โตโยต้า');
INSERT INTO `brand` VALUES ('4', 'ฮูนได');

-- ----------------------------
-- Table structure for car
-- ----------------------------
DROP TABLE IF EXISTS `car`;
CREATE TABLE `car` (
  `id` int(7) NOT NULL AUTO_INCREMENT,
  `carid` varchar(30) DEFAULT NULL COMMENT 'หมายเลขเครื่อง',
  `caric` varchar(30) DEFAULT NULL,
  `regis` varchar(20) DEFAULT NULL COMMENT 'ทะเบียน',
  `regispp` varchar(20) DEFAULT NULL,
  `brandid` int(3) DEFAULT NULL COMMENT 'ยี่ห้อ',
  `gener` varchar(255) DEFAULT NULL COMMENT 'รุ่น',
  `babt` varchar(100) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL COMMENT 'ประเภท',
  `color` varchar(15) DEFAULT NULL,
  `sub` int(1) DEFAULT NULL,
  `rangma` int(3) DEFAULT NULL,
  `cc` int(4) DEFAULT NULL,
  `bate` varchar(100) DEFAULT NULL,
  `whebase` int(4) DEFAULT NULL,
  `upbase` varchar(15) DEFAULT NULL,
  `downbase` varchar(15) DEFAULT NULL,
  `typebase` varchar(20) DEFAULT NULL,
  `oilid` int(1) DEFAULT NULL,
  `oilsize` double(5,2) DEFAULT NULL,
  `width` double(6,2) DEFAULT NULL,
  `longs` double(6,2) DEFAULT NULL,
  `hieght` double(6,2) DEFAULT NULL,
  `bw` double(6,2) DEFAULT NULL,
  `freight` double(6,2) DEFAULT NULL,
  `bycar` int(4) DEFAULT NULL,
  `usecar` date DEFAULT NULL,
  `price` double(9,2) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `image` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of car
-- ----------------------------
INSERT INTO `car` VALUES ('1', 'GA16-S20824', null, '172771', null, '2', 'NV 1.6 SGX TDAY 10', null, 'รถยนต์นั่งประจำหน่วย', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '3', 'car-1479445638.jpg');
INSERT INTO `car` VALUES ('2', 'ZD30-064643K', null, '5276', null, '2', '', null, 'รถพยาบาล', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '4', 'car-1479445828.jpg');
INSERT INTO `car` VALUES ('3', '1RZ-1152305', null, '18547', null, '3', 'ไฮเอช', null, 'รถยนต์เฉพาะการพยาบาล', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '6', 'car-1479445934.jpg');
INSERT INTO `car` VALUES ('4', '1RZ-1049496', null, '180476', null, '3', 'ไฮเอช', null, 'รถยนต์เฉพาะการ', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '7', 'car-1479446014.jpg');
INSERT INTO `car` VALUES ('5', '1KD-6898615', null, '14888', null, '3', '', null, 'รถยนต์บรรทุกปกติ', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '7', 'car-1479446110.jpg');
INSERT INTO `car` VALUES ('6', '2KD-5567601', null, '15245', null, '3', '2494 ซ๊ซี(109 แรงม้า)', null, 'รถพยาบาล', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '3', 'car-1479446206.jpg');
INSERT INTO `car` VALUES ('7', '1KD-U725951', null, '4087', null, '3', '', null, 'รถพยาบาล', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '6', 'car-1479446266.jpg');
INSERT INTO `car` VALUES ('8', '639889', null, '96180', null, '4', 'FTS 34 SU - KDPN', null, 'รถบรรทุก', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '5', 'car-1479446355.jpg');
INSERT INTO `car` VALUES ('9', '473959', null, '10319', null, '2', '70 แรงม้า', null, 'รถตู้', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '5', 'car-1479446423.jpg');
INSERT INTO `car` VALUES ('10', 'G13A-242302', null, '12412', null, '1', '63 แรงม้า', null, 'บรรทุกเล็ก', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '4', 'car-1479446505.jpg');
INSERT INTO `car` VALUES ('11', '2KD-5410704', null, '15553', null, '3', '109', null, 'รถโดยสารขนาดเล็ก', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '4', 'car-1479446583.jpg');

-- ----------------------------
-- Table structure for car_bk
-- ----------------------------
DROP TABLE IF EXISTS `car_bk`;
CREATE TABLE `car_bk` (
  `id` int(7) NOT NULL AUTO_INCREMENT,
  `carid` varchar(30) DEFAULT NULL COMMENT 'เลขเครื่องยนต์',
  `caric` varchar(30) DEFAULT NULL COMMENT 'เลขแคร่',
  `regis` varchar(20) DEFAULT NULL COMMENT 'ทะเบียนทหาร',
  `regispp` varchar(20) DEFAULT NULL COMMENT 'ทะเบียนกรมตำตรวจ',
  `brandid` int(3) DEFAULT NULL COMMENT 'ยี่ห้อ',
  `gener` varchar(255) DEFAULT NULL COMMENT 'รุ่น',
  `babt` varchar(100) DEFAULT NULL COMMENT 'แบบ',
  `type` varchar(255) DEFAULT NULL COMMENT 'ชนิด',
  `color` varchar(15) DEFAULT NULL COMMENT 'สีรถ',
  `sub` int(1) DEFAULT NULL COMMENT 'จำนวนสูบ',
  `rangma` int(3) DEFAULT NULL COMMENT 'แรงม้า',
  `cc` int(4) DEFAULT NULL COMMENT 'ซีซี',
  `bate` varchar(100) DEFAULT NULL COMMENT 'แบตเตอรี่',
  `whebase` int(4) DEFAULT NULL COMMENT 'ช่วงล้อ',
  `upbase` varchar(15) DEFAULT NULL COMMENT 'ยางล้อหน้าขนาด',
  `downbase` varchar(15) DEFAULT NULL COMMENT 'ยางล้อหลังขนาด',
  `typebase` varchar(20) DEFAULT NULL COMMENT 'ชนิดยาง',
  `oilid` int(1) DEFAULT NULL COMMENT 'น้ำมัน',
  `oilsize` double(4,2) DEFAULT NULL,
  `width` double(6,2) DEFAULT NULL COMMENT 'กว้าง',
  `longs` double(6,2) DEFAULT NULL COMMENT 'ยาว',
  `hieght` double(6,2) DEFAULT NULL COMMENT 'สูง',
  `bw` double(6,2) DEFAULT NULL COMMENT 'หนัก',
  `freight` double(6,2) DEFAULT NULL COMMENT 'น้ำหนักบรรทุก',
  `bycar` int(4) DEFAULT NULL COMMENT 'ปีที่ผลิต',
  `usecar` date DEFAULT NULL COMMENT 'วันที่เริ่มใช้',
  `price` double(9,2) DEFAULT NULL COMMENT 'ราคา',
  `userid` int(11) DEFAULT NULL,
  `image` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of car_bk
-- ----------------------------
INSERT INTO `car_bk` VALUES ('1', '3234Rt3', null, 'กพ 458 กทม', null, '1', 'mx-100', null, '1', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '2', 'car-1477724654.jpg');
INSERT INTO `car_bk` VALUES ('2', '577765', null, 'นพ 680 น่าน', null, '2', 'n80', null, '2', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '3', 'car-1477724635.jpg');
INSERT INTO `car_bk` VALUES ('3', '32429nsd', null, 'W89 น่าน', null, '1', 'Wz', null, '1', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '4', 'car-1477724591.jpg');
INSERT INTO `car_bk` VALUES ('4', '32429nsd', null, 'D77 น่าน', null, '1', 'Wz', null, '1', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '5', 'car-1477717022.jpg');
INSERT INTO `car_bk` VALUES ('5', '32429nsd', null, 'W89 น่าน', null, '1', 'Wz', null, '1', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '2', 'car-1477716977.jpg');
INSERT INTO `car_bk` VALUES ('6', '32429nsd', null, 'W89 น่าน', null, '1', 'Wz', null, '1', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '2', 'car-1477711556.jpg');

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
  `vdate` datetime NOT NULL COMMENT 'วันที่ขอรถ',
  `person` varchar(255) NOT NULL COMMENT 'ผู้ขอ',
  `post` varchar(255) NOT NULL COMMENT 'ตำแหน่ง',
  `station` varchar(255) NOT NULL COMMENT 'สถานที่ไป',
  `cno` int(2) NOT NULL COMMENT 'จำนวน(คน)',
  `thing` double(6,2) DEFAULT NULL COMMENT 'น้ำหนักสิ่งของ',
  `size` double(6,2) DEFAULT NULL COMMENT 'ปริมาตรสิ่งของ',
  `rab_station` varchar(255) NOT NULL COMMENT 'สถานที่ไปรับ',
  `rab_date` datetime NOT NULL COMMENT 'วันที่รับ',
  `song_station` varchar(255) NOT NULL COMMENT 'สถานที่ไปส่ง',
  `song_date` datetime NOT NULL COMMENT 'วันที่ส่ง',
  `caruse` int(2) NOT NULL COMMENT 'จำนวน(เที่ยว)',
  `area` enum('I','O') NOT NULL DEFAULT 'I' COMMENT 'พื้นที่',
  `boss` int(11) DEFAULT NULL,
  `status` enum('0','1') DEFAULT NULL COMMENT 'อนุมัติ',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jong_car
-- ----------------------------
INSERT INTO `jong_car` VALUES ('1', '2016-11-29 09:06:04', 'นายทดสอบ ระบบ', 'นวก.คอม', 'โรงแรมน่านฟ้าใหม่ จ.กทม.', '2', '15.00', '4.00', 'สนามบินดอนเมือง', '2016-10-19 00:14:57', 'ดอยเสมอดาว', '2016-10-24 00:14:57', '3', 'O', '2', '1');
INSERT INTO `jong_car` VALUES ('3', '2016-11-30 04:34:14', 'ทดสอบ', 'นวก.คอม', 'รพ.เชียงใหม่', '5', '78.00', '34.00', 'รพ.ค่าย', '2016-11-16 09:30:03', 'รพ.เชียงใหม่', '2016-11-16 10:25:03', '1', 'O', '6', '1');
INSERT INTO `jong_car` VALUES ('4', '2016-11-29 09:07:37', 'นายกบ กาลา', 'นักร้อง', 'ป.ลาว', '18', '250.00', '58.00', 'กทม. บ้านพัก', '2016-10-28 16:35:20', 'ป.ลาว เวียงจัน', '2016-10-28 17:25:20', '1', 'O', '2', '1');
INSERT INTO `jong_car` VALUES ('5', '2016-11-29 09:08:06', 'กมล มาลร', 'หมอ', 'ไปส่วนตัว', '4', '25.00', '3.00', 'บ้านพักหน้า รพ.ค่าย', '2016-10-31 06:30:23', 'บ่อเกลือ', '2016-10-31 09:30:23', '1', 'I', '6', '1');
INSERT INTO `jong_car` VALUES ('6', '2016-11-30 04:33:30', 'นายทดสอบ', 'IT', 'รพ.เชียงใหม่ออคิด จ.เชียงใหม่', '3', '10.00', '3.00', '34', '2016-11-18 10:55:33', '34', '2016-11-18 11:50:33', '2', 'O', '2', '1');
INSERT INTO `jong_car` VALUES ('7', '2016-11-30 04:32:27', 'นายกระบอก มะนาว', 'ไอที', 'เวียงสา', '3', '50.00', '13.00', 'หน้า รพ.ค่าย', '2016-11-22 09:10:43', 'หน้า รพ.สา', '2016-11-09 09:30:43', '2', 'I', '6', '1');
INSERT INTO `jong_car` VALUES ('8', '2016-12-14 15:52:11', 'owqe', 'dsf', 'difw', '3', '3.00', '5.00', '3dfsf', '2016-11-23 11:25:26', 'dsfdhfh', '2016-11-23 11:30:26', '4', 'I', null, null);
INSERT INTO `jong_car` VALUES ('10', '2016-12-14 16:28:17', 'สิบโทดวงพร  มารา', 'นายสิบ', 'ออกหน่วย ร.ร.ดอนมูล', '6', '30.00', '20.00', 'หน้า รพ.ค่ายฯ', '2016-12-16 09:30:17', 'ร.ร.ดอนมูล', '2016-12-20 09:45:17', '1', 'I', null, '0');
INSERT INTO `jong_car` VALUES ('11', '2016-12-20 18:39:06', 'นายบรรจง กิตติสว่างวงค์', 'นายช่างเทคนิค', 'ไปดอยอินทนนท์ จ.เชียงใหม่', '5', '40.00', '8.00', 'หน้า บ้านพัก', '2016-12-19 09:00:04', 'ดอยอินฯ', '2016-12-23 17:30:04', '1', 'O', '6', '1');
INSERT INTO `jong_car` VALUES ('12', '2016-12-20 16:58:02', 'นายบรรจง กิตติสว่างวงค์', 'ช่างเทคนิค', 'ออกหน่วยซ้อมแผน', '8', '40.00', '5.00', 'หน้า รพ.ค่ายฯ', '2016-12-16 09:00:42', 'โรงแรมเวียงแก้ว', '2016-12-22 18:00:42', '1', 'I', '6', null);

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
-- Table structure for map_car
-- ----------------------------
DROP TABLE IF EXISTS `map_car`;
CREATE TABLE `map_car` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jongid` int(11) DEFAULT NULL,
  `carid` int(7) DEFAULT NULL,
  `ps_car` int(3) DEFAULT NULL COMMENT 'ผู้ควบคุมรถ',
  `us_car` int(11) DEFAULT NULL COMMENT 'พลขับ',
  `fule` double(6,2) DEFAULT NULL COMMENT 'น้ำมันเชื่อเพลิง(ลิตร)',
  `lubri` double(6,2) DEFAULT NULL COMMENT 'น้ำมันเครื่อง(ลิตร)',
  `note` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_map_jcar` (`jongid`,`carid`),
  UNIQUE KEY `idx_map_juser` (`jongid`,`us_car`),
  CONSTRAINT `fk_map` FOREIGN KEY (`jongid`) REFERENCES `jong_car` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of map_car
-- ----------------------------
INSERT INTO `map_car` VALUES ('1', '1', '1', '1', '3', null, null, null);
INSERT INTO `map_car` VALUES ('2', '1', '2', '1', '4', null, null, null);
INSERT INTO `map_car` VALUES ('18', '3', '3', '1', '5', null, null, null);
INSERT INTO `map_car` VALUES ('19', '3', '7', '1', '4', null, null, '');
INSERT INTO `map_car` VALUES ('20', '4', '3', '1', '3', null, null, null);
INSERT INTO `map_car` VALUES ('21', '4', '2', '1', '5', null, null, null);
INSERT INTO `map_car` VALUES ('24', '5', '1', '1', '4', null, null, null);
INSERT INTO `map_car` VALUES ('25', '5', '3', '1', '3', null, null, null);
INSERT INTO `map_car` VALUES ('28', '6', '10', '1', '4', '345.00', '35.00', null);
INSERT INTO `map_car` VALUES ('29', '6', '11', '1', '3', null, null, null);
INSERT INTO `map_car` VALUES ('30', '7', '9', '1', '4', '53.00', '34.00', 'เดินทางปลอดภัย');
INSERT INTO `map_car` VALUES ('31', '11', '1', '1', '3', null, null, null);
INSERT INTO `map_car` VALUES ('32', '11', '3', '1', '4', null, null, null);
INSERT INTO `map_car` VALUES ('33', '11', '7', '1', '5', null, null, null);
INSERT INTO `map_car` VALUES ('34', '10', null, null, null, null, null, null);

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
-- Table structure for oil
-- ----------------------------
DROP TABLE IF EXISTS `oil`;
CREATE TABLE `oil` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of oil
-- ----------------------------

-- ----------------------------
-- Table structure for out_car
-- ----------------------------
DROP TABLE IF EXISTS `out_car`;
CREATE TABLE `out_car` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mapid` int(11) DEFAULT NULL COMMENT 'รายการจอง',
  `path` varchar(255) DEFAULT NULL COMMENT 'สถานที่',
  `time_start` time DEFAULT NULL COMMENT 'ออก',
  `time_end` time DEFAULT NULL COMMENT 'ถึง',
  `mile` double(7,2) DEFAULT NULL COMMENT 'เลขไมล์',
  `wg` double(5,2) DEFAULT NULL COMMENT 'น้ำหนักบรรทุก',
  `time_kho` double(5,2) DEFAULT NULL COMMENT 'เวลาขนของลง',
  `time_koy` double(5,2) DEFAULT NULL COMMENT 'เวลาคอย',
  `time_go` double(5,2) DEFAULT NULL COMMENT 'เวลาเดินทาง',
  PRIMARY KEY (`id`),
  KEY `fk_out_car` (`mapid`),
  CONSTRAINT `fk_out_car` FOREIGN KEY (`mapid`) REFERENCES `map_car` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of out_car
-- ----------------------------
INSERT INTO `out_car` VALUES ('7', '30', 'พาาา', '13:20:00', '19:20:00', '4.00', '32.00', '42.00', '4.00', '6.00');
INSERT INTO `out_car` VALUES ('9', '30', 'esf[q', '04:50:00', '19:20:00', '3.00', '21.00', '3.00', '5.00', '14.70');
INSERT INTO `out_car` VALUES ('10', '19', 'oswoe', '19:30:00', '19:30:00', '3489.00', '3.00', '2.00', '6.00', '3.00');

-- ----------------------------
-- Table structure for ps_car
-- ----------------------------
DROP TABLE IF EXISTS `ps_car`;
CREATE TABLE `ps_car` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `psname` varchar(255) DEFAULT NULL COMMENT 'ผู้ควบคุมรถ',
  `post` varchar(100) DEFAULT NULL COMMENT 'ตำแหน่ง',
  `tel` varchar(10) DEFAULT NULL COMMENT 'โทรศัพท์',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ps_car
-- ----------------------------
INSERT INTO `ps_car` VALUES ('1', 'จ.ส.อ.เกรียงไกร กิตติพงษ์', 'ผู้ควบคุมรถ', '0983452325');

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'admin', '64f2b537fb5799658b105cc88bb9afcefb5f3330', 'นายทดสอบ', 'นวก.คอม', 'Y', 'N', null, '0', '0', '1', 'admin.jpg');
INSERT INTO `users` VALUES ('2', 'phajvaj', 'ad24c8364bcba0082244fc77025b9583724a1fcb', 'นทพญ.จันทร์ดี แซ่เล้า', 'เทคนิคการแพทย์', 'Y', 'N', null, '1477623792', '1479399383', '2', 'user-1477733832.jpg');
INSERT INTO `users` VALUES ('3', 'user01', '370efafd2f7da77f54689e9905a0f17f8315193a', 'นายพลขับ1 คน1', 'พลขับ', 'Y', 'N', null, '1478681529', '1547959767', '3', 'user-1478681529.jpg');
INSERT INTO `users` VALUES ('4', 'user02', '2ec50732ddbd49bfa3c8378e5d55045d4989e533', 'นายพลขับ2 คน2', 'พลขับ', 'Y', 'N', null, '1478681614', '1478681614', '3', 'user-1478681614.png');
INSERT INTO `users` VALUES ('5', 'user03', '67d1a4b427958eaa2e5b5d593eede5810c4f6b2c', 'นายพลขับ3 คน3', 'พลขับ', 'Y', 'N', null, '1478683095', '1478683095', '3', 'user-1478683095.jpg');
INSERT INTO `users` VALUES ('6', 'boss', '7c81dae22e1c7ebf4ac78741cb6ec283bee40e11', 'ร.อ.พลตรี', 'หัวหน้า พลขับ', 'Y', 'N', null, '1480476654', '1480476654', '2', 'user-1480476654.gif');

-- ----------------------------
-- Table structure for use_car
-- ----------------------------
DROP TABLE IF EXISTS `use_car`;
CREATE TABLE `use_car` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usid` int(11) DEFAULT NULL COMMENT 'พลขับ',
  `mapid` int(11) DEFAULT NULL COMMENT 'รายการจอง',
  `wk1` enum('N','Y') DEFAULT 'N' COMMENT 'บำรุงประจำวัน',
  `wk2` enum('N','Y') DEFAULT 'N' COMMENT 'บำรุงขณะใช้งาน',
  `wk3` enum('Y','N') DEFAULT 'N' COMMENT 'บำรุงหลังใช้งาน',
  `time_start` time DEFAULT NULL COMMENT 'เวลาเริ่ม',
  `mile_start` double(7,2) DEFAULT NULL COMMENT 'ไมล์เริ่มต้น',
  `time_end` time DEFAULT NULL COMMENT 'เวลากลับ',
  `mile_end` double(7,2) DEFAULT NULL COMMENT 'ไมล์สิ้นสุด',
  `wk11` enum('W','X','Y') DEFAULT NULL COMMENT 'อาการชำรุดเล็กน้อย',
  `wk12` enum('W','X','Y') DEFAULT NULL COMMENT 'อาการรั่วในที่ต่างๆ',
  `wk13` enum('W','X','Y') DEFAULT NULL COMMENT 'เชื้อเพลิง น้ำมันเครื่อง น้ำ',
  `wk14` enum('W','X','Y') DEFAULT NULL COMMENT 'แป้นเกลียวล้อ,แป้นปลายเพลาล้อ,ยาง',
  `wk15` enum('W','X','Y') DEFAULT NULL COMMENT 'การอุ่นเครื่องยนต์',
  `wk16` enum('W','X','Y') DEFAULT NULL COMMENT 'เครื่องวัดต่างๆ',
  `wk17` enum('W','X','Y') DEFAULT NULL COMMENT 'เครื่องช่วยความปลอดภัย',
  `wk18` enum('W','X','Y') DEFAULT NULL COMMENT 'เครื่องมือ, เครื่องใช้',
  `wk19` enum('W','X','Y') DEFAULT NULL COMMENT 'เอกสาร, แบบฟอร์ม',
  `wk21` enum('W','X','Y') DEFAULT NULL COMMENT 'เครื่องวัดต่างๆ',
  `wk22` enum('W','X','Y') DEFAULT NULL COMMENT 'ห้ามล้อ',
  `wk23` enum('W','X','Y') DEFAULT NULL COMMENT 'คลัทซ์',
  `wk24` enum('W','X','Y') DEFAULT NULL COMMENT 'เครื่องบัคับเลี้ยว',
  `wk25` enum('W','X','Y') DEFAULT NULL COMMENT 'การทำงานของเครื่องยนต์',
  `wk26` enum('W','X','Y') DEFAULT NULL COMMENT 'เสียงผิดปกติ',
  `wk31` enum('W','X','Y') DEFAULT NULL COMMENT 'โคมไฟและกระจกสะท้อนแสง',
  `wk32` enum('W','X','Y') DEFAULT NULL COMMENT 'เครื่องช่วยความปลอดภัย',
  `wk33` enum('W','X','Y') DEFAULT NULL COMMENT 'ห้ามล้อ',
  `wk34` enum('W','X','Y') DEFAULT NULL COMMENT 'ถังลม (ระบายความชื้น)',
  `wk35` enum('W','X','Y') DEFAULT NULL COMMENT 'เชื่อเพลิง, น้ำมันเครื่อง, น้ำ (เติม)',
  `wk36` enum('W','X','Y') DEFAULT NULL COMMENT '* สายพานพัดลม ฯลฯ',
  `wk37` enum('W','X','Y') DEFAULT NULL COMMENT '* ระดับน้ำกรดแบตเตอรี่',
  `wk38` enum('W','X','Y') DEFAULT NULL COMMENT '* ความสะอาดของน้ำในหม้อน้ำ',
  `wk39` enum('W','X','Y') DEFAULT NULL COMMENT '* ยาง (ชำรุด) (ความดัน)',
  `wk310` enum('W','X','Y') DEFAULT NULL COMMENT '* การทำความสะอาดทุกส่วน',
  PRIMARY KEY (`id`),
  KEY `fk_user` (`usid`),
  KEY `fk_jong_car` (`mapid`),
  CONSTRAINT `fk_jong_car` FOREIGN KEY (`mapid`) REFERENCES `map_car` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_user` FOREIGN KEY (`usid`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of use_car
-- ----------------------------
INSERT INTO `use_car` VALUES ('1', '4', '30', 'Y', 'Y', 'Y', '07:20:00', '1400.00', '21:30:00', '1500.00', 'Y', 'X', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'X', 'X', 'Y');
INSERT INTO `use_car` VALUES ('2', '4', '28', 'Y', 'Y', 'Y', '09:00:00', '3400.00', '18:40:00', '4500.00', 'X', 'W', 'X', 'X', 'X', 'X', 'X', 'Y', 'W', 'X', '', 'Y', '', '', '', '', '', '', '', '', '', '', '', '', '');

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

-- ----------------------------
-- View structure for vjongall
-- ----------------------------
DROP VIEW IF EXISTS `vjongall`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost`  VIEW `vjongall` AS SELECT j.*,m.id as mid,m.carid,m.fule,m.jongid,m.lubri,m.ps_car,m.us_car,
c.regis,c.gener,c.type,c.image as cimage,p.psname,p.post as ppost,p.tel,u.fullname,u.image as uimage
FROM jong_car as j 
LEFT JOIN map_car as m ON(j.id=m.jongid)
LEFT JOIN car as c ON(m.carid=c.id)
LEFT JOIN ps_car as p ON(m.ps_car=p.id)
LEFT JOIN users as u ON(m.us_car=u.id) ;

-- ----------------------------
-- Function structure for mon2thai
-- ----------------------------
DROP FUNCTION IF EXISTS `mon2thai`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `mon2thai`(`param1` int(2)) RETURNS varchar(20) CHARSET tis620
begin
	declare nmonth int;
	declare cmonth varchar(40);
	set nmonth=param1;
	set cmonth='';
	set cmonth=if(nmonth=1,'ม.ค.',cmonth);
	set cmonth=if(nmonth=2,'ก.พ.',cmonth);
	set cmonth=if(nmonth=3,'มี.ค.',cmonth);
	set cmonth=if(nmonth=4,'เม.ษ.',cmonth);
	set cmonth=if(nmonth=5,'พ.ค.',cmonth);
	set cmonth=if(nmonth=6,'มิ.ย.',cmonth);
	set cmonth=if(nmonth=7,'ก.ค.',cmonth);
	set cmonth=if(nmonth=8,'ส.ค.',cmonth);
	set cmonth=if(nmonth=9,'ก.ย.',cmonth);
	set cmonth=if(nmonth=10,'ต.ค.',cmonth);
	set cmonth=if(nmonth=11,'พ.ย.',cmonth);
	set cmonth=if(nmonth=12,'ธ.ค.',cmonth);
	return cmonth;
end
;;
DELIMITER ;

-- ----------------------------
-- Function structure for month2thai
-- ----------------------------
DROP FUNCTION IF EXISTS `month2thai`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `month2thai`(`param1` int(2)) RETURNS varchar(20) CHARSET tis620
begin
	declare nmonth int;
	declare cmonth varchar(40);
	set nmonth=param1;
	set cmonth='';
	set cmonth=if(nmonth=1,'มกราคม',cmonth);
	set cmonth=if(nmonth=2,'กุมภาพันธ์',cmonth);
	set cmonth=if(nmonth=3,'มีนาคม',cmonth);
	set cmonth=if(nmonth=4,'เมษายน',cmonth);
	set cmonth=if(nmonth=5,'พฤษภาคม',cmonth);
	set cmonth=if(nmonth=6,'มิถุนายน',cmonth);
	set cmonth=if(nmonth=7,'กรกฎาคม',cmonth);
	set cmonth=if(nmonth=8,'สิงหาคม',cmonth);
	set cmonth=if(nmonth=9,'กันยายน',cmonth);
	set cmonth=if(nmonth=10,'ตุลาคม',cmonth);
	set cmonth=if(nmonth=11,'พฤศจิกายน',cmonth);
	set cmonth=if(nmonth=12,'ธันวาคม',cmonth);
	return cmonth;
end
;;
DELIMITER ;

-- ----------------------------
-- Function structure for num2thai
-- ----------------------------
DROP FUNCTION IF EXISTS `num2thai`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `num2thai`(`nums` varchar(100)) RETURNS varchar(100) CHARSET tis620
BEGIN
	declare num varchar(100);
	set num=nums;
	set num=replace(num,'0','๐');
	set num=replace(num,'1','๑');
	set num=replace(num,'2','๒');
	set num=replace(num,'3','๓');
	set num=replace(num,'4','๔');
	set num=replace(num,'5','๕');
	set num=replace(num,'6','๖');
	set num=replace(num,'7','๗');
	set num=replace(num,'8','๘');
	set num=replace(num,'9','๙');
	RETURN num;
END
;;
DELIMITER ;

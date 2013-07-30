/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50527
Source Host           : localhost:3306
Source Database       : myweb

Target Server Type    : MYSQL
Target Server Version : 50527
File Encoding         : 65001

Date: 2013-07-30 17:45:36
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `admin_info`
-- ----------------------------
DROP TABLE IF EXISTS `admin_info`;
CREATE TABLE `admin_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birthday` int(11) DEFAULT NULL,
  `gender` enum('male','female') COLLATE utf8_unicode_ci DEFAULT 'male',
  `homephone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobilephone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `note` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `create` int(11) DEFAULT NULL,
  `block` enum('true','false') COLLATE utf8_unicode_ci DEFAULT 'true',
  `active` enum('true','false') COLLATE utf8_unicode_ci DEFAULT 'true',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of admin_info
-- ----------------------------
INSERT INTO `admin_info` VALUES ('1', 'Thomas', 'Trinh', '26061989', 'male', null, '0986636039', 'Nam Dinh', null, null, 'false', 'true');

-- ----------------------------
-- Table structure for `admin_log`
-- ----------------------------
DROP TABLE IF EXISTS `admin_log`;
CREATE TABLE `admin_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) NOT NULL,
  `login` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_log` (`user`),
  CONSTRAINT `user_log` FOREIGN KEY (`user`) REFERENCES `admin_info` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of admin_log
-- ----------------------------

-- ----------------------------
-- Table structure for `admin_roles`
-- ----------------------------
DROP TABLE IF EXISTS `admin_roles`;
CREATE TABLE `admin_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) NOT NULL,
  `roles` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `adminrole` (`user`),
  CONSTRAINT `adminrole` FOREIGN KEY (`user`) REFERENCES `admin_info` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of admin_roles
-- ----------------------------

-- ----------------------------
-- Table structure for `admin_user`
-- ----------------------------
DROP TABLE IF EXISTS `admin_user`;
CREATE TABLE `admin_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) NOT NULL,
  `username` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `info_user` (`user`),
  CONSTRAINT `info_user` FOREIGN KEY (`user`) REFERENCES `admin_info` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of admin_user
-- ----------------------------

-- ----------------------------
-- Table structure for `ads_items`
-- ----------------------------
DROP TABLE IF EXISTS `ads_items`;
CREATE TABLE `ads_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adsUser` int(11) NOT NULL,
  `title` varchar(250) DEFAULT NULL,
  `ads_url` text,
  `ads_images` varchar(250) DEFAULT NULL,
  `status` enum('active','deactive') DEFAULT 'active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ads_items
-- ----------------------------

-- ----------------------------
-- Table structure for `ads_users`
-- ----------------------------
DROP TABLE IF EXISTS `ads_users`;
CREATE TABLE `ads_users` (
  `id` int(11) NOT NULL,
  `firstName` varchar(250) NOT NULL,
  `lastName` varchar(250) DEFAULT NULL,
  `company` varchar(500) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `phoneNumber` varchar(20) DEFAULT NULL,
  `mobilePhone` varchar(20) DEFAULT NULL,
  `create_at` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `status` enum('active','deactive') DEFAULT 'active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ads_users
-- ----------------------------

-- ----------------------------
-- Table structure for `post_article`
-- ----------------------------
DROP TABLE IF EXISTS `post_article`;
CREATE TABLE `post_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `content` text,
  `image` varchar(250) DEFAULT NULL,
  `views` int(11) DEFAULT NULL,
  `create_at` int(11) DEFAULT NULL,
  `modify_at` int(11) DEFAULT NULL,
  `user` int(11) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `status` enum('active','deactive') DEFAULT 'active',
  PRIMARY KEY (`id`),
  KEY `article_cat` (`category`),
  KEY `article_user` (`user`),
  CONSTRAINT `article_cat` FOREIGN KEY (`category`) REFERENCES `post_category` (`id`),
  CONSTRAINT `article_user` FOREIGN KEY (`user`) REFERENCES `admin_info` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of post_article
-- ----------------------------

-- ----------------------------
-- Table structure for `post_category`
-- ----------------------------
DROP TABLE IF EXISTS `post_category`;
CREATE TABLE `post_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `image` varchar(250) DEFAULT NULL,
  `status` enum('active','deactive') DEFAULT 'active',
  PRIMARY KEY (`id`),
  KEY `parent_key` (`parent`),
  CONSTRAINT `parent_key` FOREIGN KEY (`parent`) REFERENCES `post_category` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of post_category
-- ----------------------------
INSERT INTO `post_category` VALUES ('1', 'Magento', null, 'Magento', null, 'active');

-- ----------------------------
-- Table structure for `system_block`
-- ----------------------------
DROP TABLE IF EXISTS `system_block`;
CREATE TABLE `system_block` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of system_block
-- ----------------------------
INSERT INTO `system_block` VALUES ('1', 'abc', 'abc', '1');
INSERT INTO `system_block` VALUES ('2', 'sdad', 'dâd', '1');
INSERT INTO `system_block` VALUES ('4', 'left-ads', 'left-ads', '1');

-- ----------------------------
-- Table structure for `system_config`
-- ----------------------------
DROP TABLE IF EXISTS `system_config`;
CREATE TABLE `system_config` (
  `prefix_title` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_title` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slogan` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `logo` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of system_config
-- ----------------------------

-- ----------------------------
-- Table structure for `system_fmtp`
-- ----------------------------
DROP TABLE IF EXISTS `system_fmtp`;
CREATE TABLE `system_fmtp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fmtpuser` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fmtppass` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `port` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of system_fmtp
-- ----------------------------

-- ----------------------------
-- Table structure for `system_template`
-- ----------------------------
DROP TABLE IF EXISTS `system_template`;
CREATE TABLE `system_template` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `frontend_layout` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `frontend_skin` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `frontend_layoutName` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `backend_layout` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `backend_skin` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `backend_layoutName` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of system_template
-- ----------------------------
INSERT INTO `system_template` VALUES ('1', 'default', 'default', 'layout', 'default', 'default', 'layout');

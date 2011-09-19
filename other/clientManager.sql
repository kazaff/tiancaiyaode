/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50144
 Source Host           : localhost
 Source Database       : clientManager

 Target Server Type    : MySQL
 Target Server Version : 50144
 File Encoding         : utf-8

 Date: 09/20/2011 00:11:41 AM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `account`
-- ----------------------------
DROP TABLE IF EXISTS `account`;
CREATE TABLE `account` (
  `uid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `sid` bigint(20) unsigned DEFAULT NULL,
  `account` varchar(20) NOT NULL,
  `password` varchar(40) NOT NULL,
  `domain` varchar(40) NOT NULL,
  `isAllow` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `startDate` datetime NOT NULL,
  `endDate` datetime NOT NULL,
  PRIMARY KEY (`uid`),
  KEY `staffId` (`sid`),
  KEY `account` (`domain`),
  CONSTRAINT `account_ibfk_1` FOREIGN KEY (`sid`) REFERENCES `staff` (`sid`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `account`
-- ----------------------------
BEGIN;
INSERT INTO `account` VALUES ('1', '1', 'kazaff', '123123', 'www.buildin9.com', '1', '2011-09-19 12:44:44', '2011-11-11 00:00:00'), ('3', '1', 'tc', 'tc', 'tc', '1', '2011-09-19 12:58:04', '2011-11-11 00:00:00'), ('5', '1', 'asdf', 'asdf', 'asdf', '1', '2011-09-19 12:59:49', '0000-00-00 00:00:00'), ('6', '1', 'asdf', 'asdf', 'asdf', '1', '2011-09-19 13:00:01', '0000-00-00 00:00:00'), ('7', '1', 'asdf', 'asdf', 'asdfasf', '1', '2011-09-19 13:00:19', '0000-00-00 00:00:00');
COMMIT;

-- ----------------------------
--  Table structure for `article`
-- ----------------------------
DROP TABLE IF EXISTS `article`;
CREATE TABLE `article` (
  `aid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `cid` int(20) unsigned NOT NULL DEFAULT '0',
  `title` varchar(100) NOT NULL,
  `cover` text NOT NULL,
  `content` text NOT NULL,
  `updateTime` datetime NOT NULL,
  PRIMARY KEY (`aid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `category`
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `cid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `parentId` bigint(20) unsigned NOT NULL,
  `className` varchar(40) NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `clientInfo`
-- ----------------------------
DROP TABLE IF EXISTS `clientInfo`;
CREATE TABLE `clientInfo` (
  `uid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `comName` varchar(100) NOT NULL DEFAULT '',
  `boss` varchar(20) NOT NULL,
  `mobile` varchar(40) NOT NULL DEFAULT '',
  `tel` varchar(40) NOT NULL DEFAULT '',
  `qq` varchar(40) NOT NULL DEFAULT '',
  `email` varchar(40) NOT NULL DEFAULT '',
  `address` text NOT NULL,
  `remark` text NOT NULL,
  PRIMARY KEY (`uid`),
  CONSTRAINT `clientinfo_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `account` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `clientInfo`
-- ----------------------------
BEGIN;
INSERT INTO `clientInfo` VALUES ('1', 'buildin9', 'kazaff', '123', '123', '123', 'edisondik@163.com', '123', ''), ('3', 'tc', 'tc', '123', '123', '123', '13', '231', ''), ('5', 'asdf', 'asdf', '123', '123', '123', '123', '132', ''), ('6', 'asdf', 'asdf', '123', '123', '123', '123', '132', ''), ('7', 'asdf', 'asdf', '123', '123', '123', '132', '123', '');
COMMIT;

-- ----------------------------
--  Table structure for `staff`
-- ----------------------------
DROP TABLE IF EXISTS `staff`;
CREATE TABLE `staff` (
  `sid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `account` char(20) NOT NULL,
  `password` varchar(40) NOT NULL,
  `type` tinyint(1) unsigned NOT NULL,
  `isAllow` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `name` varchar(10) NOT NULL,
  `contact` text NOT NULL,
  `remark` text NOT NULL,
  PRIMARY KEY (`sid`),
  UNIQUE KEY `account` (`account`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `staff`
-- ----------------------------
BEGIN;
INSERT INTO `staff` VALUES ('1', 'admin', 'admin', '0', '1', 'kazaff', '250631302', '程序猿');
COMMIT;


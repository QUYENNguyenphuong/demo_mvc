/*
 Navicat Premium Data Transfer

 Source Server         : test9
 Source Server Type    : MySQL
 Source Server Version : 100136
 Source Host           : localhost:3306
 Source Schema         : demo_mvc

 Target Server Type    : MySQL
 Target Server Version : 100136
 File Encoding         : 65001

 Date: 31/10/2018 15:04:19
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for posts
-- ----------------------------
DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NULL DEFAULT NULL,
  `content` text NULL,
  PRIMARY KEY (`Id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci;

SET FOREIGN_KEY_CHECKS = 1;

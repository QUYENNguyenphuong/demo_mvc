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

 Date: 31/10/2018 15:02:22
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for member
-- ----------------------------
DROP TABLE IF EXISTS `member`;
ALTER TABLE `member`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100)  NULL DEFAULT NULL,
  `password` varchar(100) NULL DEFAULT NULL,
  `email` varchar(100)  NULL DEFAULT NULL,
  `level` varchar(20) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB  CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ;

SET FOREIGN_KEY_CHECKS = 1;

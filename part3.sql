/*
Navicat MySQL Data Transfer

Source Server         : Dev Databases
Source Server Version : 50141
Source Host           : localhost:3306
Source Database       : phpar_test

Target Server Type    : MYSQL
Target Server Version : 50141
File Encoding         : 65001

Date: 2011-08-17 13:45:40
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `hashed_password` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'Shawn', '');
INSERT INTO `users` VALUES ('2', 'Justin', '');
INSERT INTO `users` VALUES ('4', 'testuser', '21a54aaa0966c8b3b9515fc3542520c824709af2781aa9fdb89081a5417be146c49ff2b9e766aebafe7f42c4c2c82cf0c8a5cec3ba430eb2955617789b7e6d77');

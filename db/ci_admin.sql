/*
 Navicat Premium Data Transfer

 Source Server         : mysql
 Source Server Type    : MySQL
 Source Server Version : 100411
 Source Host           : 192.168.64.2:3306
 Source Schema         : ci_admin

 Target Server Type    : MySQL
 Target Server Version : 100411
 File Encoding         : 65001

 Date: 17/08/2021 17:38:56
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for module
-- ----------------------------
DROP TABLE IF EXISTS `module`;
CREATE TABLE `module` (
  `module_id` int(11) NOT NULL AUTO_INCREMENT,
  `module_name` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`module_id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of module
-- ----------------------------
BEGIN;
INSERT INTO `module` VALUES (1, 'USER', NULL, '2020-02-14 01:13:42', NULL, NULL, 1);
INSERT INTO `module` VALUES (2, 'ROLE', NULL, '2020-02-14 01:13:54', NULL, NULL, 1);
INSERT INTO `module` VALUES (3, 'MODULE', NULL, '2020-02-14 01:14:05', NULL, NULL, 1);
INSERT INTO `module` VALUES (4, 'PERMISSION', NULL, '2020-02-14 01:14:17', NULL, NULL, 1);
COMMIT;

-- ----------------------------
-- Table structure for modules_permissions
-- ----------------------------
DROP TABLE IF EXISTS `modules_permissions`;
CREATE TABLE `modules_permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `module_id` int(11) DEFAULT NULL,
  `permission_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED;

-- ----------------------------
-- Records of modules_permissions
-- ----------------------------
BEGIN;
INSERT INTO `modules_permissions` VALUES (16, 2, 3);
INSERT INTO `modules_permissions` VALUES (15, 2, 2);
INSERT INTO `modules_permissions` VALUES (14, 2, 1);
INSERT INTO `modules_permissions` VALUES (12, 1, 1);
INSERT INTO `modules_permissions` VALUES (11, 1, 5);
INSERT INTO `modules_permissions` VALUES (10, 1, 3);
INSERT INTO `modules_permissions` VALUES (13, 1, 2);
INSERT INTO `modules_permissions` VALUES (17, 2, 5);
COMMIT;

-- ----------------------------
-- Table structure for permission
-- ----------------------------
DROP TABLE IF EXISTS `permission`;
CREATE TABLE `permission` (
  `permission_id` int(11) NOT NULL AUTO_INCREMENT,
  `permission_name` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`permission_id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of permission
-- ----------------------------
BEGIN;
INSERT INTO `permission` VALUES (1, 'CREATE', NULL, '2020-02-14 01:15:11', NULL, NULL, 1);
INSERT INTO `permission` VALUES (2, 'VIEW', NULL, '2020-02-14 01:15:33', NULL, NULL, 0);
INSERT INTO `permission` VALUES (3, 'UPDATE', NULL, '2020-02-14 01:15:41', NULL, NULL, 1);
INSERT INTO `permission` VALUES (5, 'DELETE', NULL, '2020-02-14 08:04:11', NULL, NULL, 1);
COMMIT;

-- ----------------------------
-- Table structure for role
-- ----------------------------
DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`role_id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of role
-- ----------------------------
BEGIN;
INSERT INTO `role` VALUES (1, 'ADMIN', NULL, '2020-02-12 01:20:17', NULL, NULL, 1);
INSERT INTO `role` VALUES (2, 'USER', NULL, '2020-02-12 02:08:15', NULL, NULL, 0);
COMMIT;

-- ----------------------------
-- Table structure for roles_modules
-- ----------------------------
DROP TABLE IF EXISTS `roles_modules`;
CREATE TABLE `roles_modules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) DEFAULT NULL,
  `module_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED;

-- ----------------------------
-- Records of roles_modules
-- ----------------------------
BEGIN;
INSERT INTO `roles_modules` VALUES (1, 1, 1);
INSERT INTO `roles_modules` VALUES (2, 1, 2);
INSERT INTO `roles_modules` VALUES (3, 1, 0);
INSERT INTO `roles_modules` VALUES (4, 1, 3);
INSERT INTO `roles_modules` VALUES (5, 1, 4);
COMMIT;

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_id` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `gender` char(10) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `extension` varchar(20) DEFAULT NULL,
  `email_notification` int(11) NOT NULL DEFAULT 1,
  `notification_count` int(11) NOT NULL,
  `active` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `position_id` int(11) DEFAULT NULL,
  `manager_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Table structure for users_roles
-- ----------------------------
DROP TABLE IF EXISTS `users_roles`;
CREATE TABLE `users_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED;

SET FOREIGN_KEY_CHECKS = 1;

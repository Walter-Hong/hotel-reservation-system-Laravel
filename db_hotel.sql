/*
Navicat MySQL Data Transfer

Source Server         : 1. localhost
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : db_hotel

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-03-16 01:03:23
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('2016_04_18_135252_create_room_types_table', '1');
INSERT INTO `migrations` VALUES ('2016_04_19_132321_create_rooms_table', '2');
INSERT INTO `migrations` VALUES ('2016_04_19_180240_create_orders_table', '2');
INSERT INTO `migrations` VALUES ('2018_03_12_210148_update_rooms', '3');

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `room_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `check_in_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `check_out_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT '1',
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_room_no_foreign` (`room_no`),
  KEY `orders_users_id_foreign` (`user_id`),
  CONSTRAINT `orders_room_no_foreign` FOREIGN KEY (`room_no`) REFERENCES `rooms` (`no`) ON DELETE CASCADE,
  CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of orders
-- ----------------------------
INSERT INTO `orders` VALUES ('8', '103', '15698745654', 'jack', '2018-03-14 22:45:19', '2018-03-16 00:00:00', '2018-03-14 20:23:43', '2018-03-14 20:23:43', '1', '3');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for rooms
-- ----------------------------
DROP TABLE IF EXISTS `rooms`;
CREATE TABLE `rooms` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `room_type_id` int(10) unsigned NOT NULL,
  `price` int(11) NOT NULL,
  `discount` double(8,2) NOT NULL DEFAULT '10.00',
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'img/rooms/default.png',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(1) unsigned DEFAULT '1',
  `info` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `rooms_no_index` (`no`),
  KEY `rooms_room_type_id_index` (`room_type_id`),
  CONSTRAINT `rooms_room_type_id_foreign` FOREIGN KEY (`room_type_id`) REFERENCES `room_types` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of rooms
-- ----------------------------
INSERT INTO `rooms` VALUES ('1', '103', '1', '89', '20.00', 'img/rooms/single-room.jpg', null, '2018-03-16 00:32:31', '1', 'a simple room...');
INSERT INTO `rooms` VALUES ('2', '104', '2', '129', '0.00', 'img/rooms/double-room.jpg', null, '2018-03-14 23:37:12', '1', 'provide tv');
INSERT INTO `rooms` VALUES ('3', '105', '3', '189', '0.00', 'img/rooms/king.jpg', null, '2018-03-14 23:37:17', '1', 'big big room  provide wifi  tv');

-- ----------------------------
-- Table structure for room_types
-- ----------------------------
DROP TABLE IF EXISTS `room_types`;
CREATE TABLE `room_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of room_types
-- ----------------------------
INSERT INTO `room_types` VALUES ('1', 'Single Room', '2018-03-12 10:56:05', '2018-03-12 10:56:05');
INSERT INTO `room_types` VALUES ('2', 'Double Room', '2018-03-12 10:56:05', '2018-03-12 10:56:05');
INSERT INTO `room_types` VALUES ('3', 'Delux Room', '2018-03-12 10:56:05', '2018-03-12 10:56:05');

-- ----------------------------
-- Table structure for settings
-- ----------------------------
DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `company` varchar(255) NOT NULL,
  `welcome_title` varchar(255) NOT NULL,
  `welcome_content` varchar(255) NOT NULL,
  `service_title` varchar(255) NOT NULL,
  `service_content` varchar(255) NOT NULL,
  `weibo` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of settings
-- ----------------------------
INSERT INTO `settings` VALUES ('1', 'Water Hotel', 'Welcome', 'five start hotel', 'search', 'info', '111', '111', '111', '2018-03-12 10:56:05', '2018-03-12 10:56:05');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('3', 'tttttt', 'ttt@qq.com', '$2y$10$yysE9e9.Q6L9xjah3lqzx.SAT76pNdKpz45FeFQbpYhUWh7zBoUje', '0', 'y4FKxQ2Rp48ZN5v4FM3oadCXwq3bobciepONN3VUZoEvy3yg9drkRDw8fS5r', '2018-03-12 08:30:56', '2018-03-12 08:31:14');
INSERT INTO `users` VALUES ('4', 'admin', 'admin@admin.com', '$2y$10$Zraq62QUmDMLLBnA.Kbf3u4ZgprTD6sYWyeX8o2tH7ZCxW/d2ZeXi', '1', '8BpZwKgv7aAwEV9MzPrZkcx15YBl9ZFSt9OlAyerP8FWYASVtaamp3DIR18Y', '2018-03-12 08:31:55', '2018-03-14 22:38:00');

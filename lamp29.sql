/*
Navicat MySQL Data Transfer

Source Server         : 192.168.31.184
Source Server Version : 50548
Source Host           : 192.168.31.184:3306
Source Database       : lamp29

Target Server Type    : MYSQL
Target Server Version : 50548
File Encoding         : 65001

Date: 2017-09-25 09:46:08
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for address
-- ----------------------------
DROP TABLE IF EXISTS `address`;
CREATE TABLE `address` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `uid` int(11) DEFAULT NULL COMMENT '用户表id',
  `receiving_man` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '收件人',
  `receiving_phone` char(11) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '收件电话',
  `receiving_province` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '收件省份',
  `receiving_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '收件城市',
  `receiving_district` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '收件城区',
  `receiving_detail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '收件详细地址',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of address
-- ----------------------------

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID主键',
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '管理员账号',
  `pwd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '密码',
  `power` text COLLATE utf8mb4_unicode_ci COMMENT '权限',
  `role_id` tinyint(4) DEFAULT NULL COMMENT '(外键)角色id',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', 'admin', '$2y$10$V4ErnYbnHU.3kAuNKJLtfuiCxcgY3U54/JkfnVDXI8KLkK57RRJU2', 'a:2:{s:12:\"权限管理\";s:25:\"admin/Administrator/power\";s:12:\"修改权限\";s:29:\"admin/Administrator/editPower\";}', null, null, null);

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('4', '2017_09_22_193250_create_orders_table', '1');
INSERT INTO `migrations` VALUES ('5', '2017_09_22_193326_create_order_detail__table', '1');
INSERT INTO `migrations` VALUES ('6', '2017_09_22_193332_create_address__table', '1');
INSERT INTO `migrations` VALUES ('7', '2017_09_24_210204_create_admin_table', '2');

-- ----------------------------
-- Table structure for order_detail
-- ----------------------------
DROP TABLE IF EXISTS `order_detail`;
CREATE TABLE `order_detail` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `oid` int(11) DEFAULT NULL COMMENT '订单表id',
  `goods_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '商品名称',
  `goods_pic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '商品图片',
  `goods_specification` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '商品规格',
  `unit_price` decimal(10,0) DEFAULT NULL COMMENT '商品单价',
  `product_num` int(11) DEFAULT NULL COMMENT '商品数量',
  `single_intergral` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '单件积分',
  `order_state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '订单状态：0进行中 1已完成 2已取消',
  `pay_state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '支付状态：0待付款 1已付款 2已退款',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of order_detail
-- ----------------------------

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `uid` int(11) DEFAULT NULL COMMENT '用户表id',
  `order_number` int(11) DEFAULT NULL COMMENT '订单号',
  `pay_time` datetime DEFAULT NULL COMMENT '支付时间',
  `receiving_phone` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '收货电话',
  `receiving_man` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '收货人',
  `receiving_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '收货地址',
  `total_money` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '总金额',
  `credits` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '获得总积分',
  `pay_state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '支付状态：0代付款 1已付款 2待退款',
  `order_state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '支付状态：0进行中 1已完成 2已取消',
  `logistics` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '物流状态：0未发出 1待揽收 2已发出',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of orders
-- ----------------------------

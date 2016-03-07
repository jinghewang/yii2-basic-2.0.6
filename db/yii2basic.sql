/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 50710
 Source Host           : localhost
 Source Database       : yii2basic

 Target Server Type    : MySQL
 Target Server Version : 50710
 File Encoding         : utf-8

 Date: 03/07/2016 13:00:33 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `country`
-- ----------------------------
DROP TABLE IF EXISTS `country`;
CREATE TABLE `country` (
  `code` varchar(50) NOT NULL COMMENT '国家代码',
  `name` varchar(200) DEFAULT NULL COMMENT '国家名称',
  `population` int(8) DEFAULT NULL COMMENT '国家人口',
  `createtime` datetime DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
--  Records of `country`
-- ----------------------------
BEGIN;
INSERT INTO `country` VALUES ('1', '1', '2', '2015-12-28 14:50:50'), ('2', '2', '3', '2015-12-28 14:50:57'), ('22', '22', '225', null), ('3', '3', '10', '2015-12-28 15:16:32'), ('32', '32', '32', '2015-12-28 14:49:20'), ('4', '4', '4', '2015-12-28 14:49:35'), ('43', '43', '43', '2015-12-28 14:46:42'), ('AU', 'Australia', '18886000', '2015-12-25 15:50:01'), ('BR', 'Brazil', '170115000', '2015-12-25 15:50:01'), ('CA', 'Canada', '1147000', '2015-12-25 15:50:01'), ('CN', '中国', '2222', null), ('USA', '美国', '800002', null), ('yp', 'yp', '122', '2015-12-25 15:20:12');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;

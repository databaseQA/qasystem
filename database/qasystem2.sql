/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : qasystem

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2016-11-07 20:51:12
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '管理员ID',
  `admin_name` varchar(20) NOT NULL COMMENT '管理员名称，用于登录',
  `admin_pwd` varchar(20) NOT NULL COMMENT '管理员密码',
  `admin_gender` varchar(2) DEFAULT NULL COMMENT '管理员性别：男/女',
  `admin_email` varchar(30) DEFAULT NULL COMMENT '管理员邮箱',
  `admin_type` varchar(6) NOT NULL DEFAULT '普通' COMMENT '管理员类型：高级/普通',
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin
-- ----------------------------

-- ----------------------------
-- Table structure for answer
-- ----------------------------
DROP TABLE IF EXISTS `answer`;
CREATE TABLE `answer` (
  `a_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '回答ID',
  `q_id` int(11) NOT NULL COMMENT '问题ID',
  `user_id` int(11) NOT NULL COMMENT '用户ID',
  `a_content` varchar(600) NOT NULL COMMENT '回答内容',
  `a_time` datetime NOT NULL COMMENT '回答时间',
  `yesVote` varchar(6) NOT NULL DEFAULT '0' COMMENT '赞同票数',
  `noVote` varchar(6) NOT NULL DEFAULT '0' COMMENT '反对票数',
  PRIMARY KEY (`a_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of answer
-- ----------------------------

-- ----------------------------
-- Table structure for question
-- ----------------------------
DROP TABLE IF EXISTS `question`;
CREATE TABLE `question` (
  `q_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '问题ID',
  `user_id` int(11) NOT NULL COMMENT '用户ID',
  `type_id` int(11) NOT NULL COMMENT '问题类型ID',
  `q_title` varchar(80) NOT NULL COMMENT '问题标题',
  `q_content` varchar(400) DEFAULT NULL COMMENT '问题补充内容',
  `q_time` datetime NOT NULL COMMENT '提问时间',
  `q_state` varchar(6) NOT NULL DEFAULT '未解决' COMMENT '问题状态：未解决/已解决',
  `a_num` int(11) NOT NULL DEFAULT '0' COMMENT '回答数量',
  PRIMARY KEY (`q_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of question
-- ----------------------------
INSERT INTO `question` VALUES ('1', '1', '1', '1', '1', '0000-00-00 00:00:00', '未解决', '0');

-- ----------------------------
-- Table structure for type
-- ----------------------------
DROP TABLE IF EXISTS `type`;
CREATE TABLE `type` (
  `type_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '问题类型ID',
  `type_name` varchar(20) NOT NULL COMMENT '问题类型',
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of type
-- ----------------------------

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户ID',
  `user_name` varchar(50) NOT NULL COMMENT '用户名称，用于登录，不可修改',
  `user_pwd` varchar(20) NOT NULL COMMENT '用户密码',
  `user_nickname` varchar(50) DEFAULT NULL COMMENT '用户昵称，可修改',
  `user_gender` varchar(2) DEFAULT NULL COMMENT '用户性别',
  `user_email` varchar(50) DEFAULT NULL COMMENT '用户邮箱',
  `q_num` int(11) NOT NULL DEFAULT '0' COMMENT '用户提问数',
  `a_num` int(11) NOT NULL DEFAULT '0' COMMENT '用户回答数',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
DROP TRIGGER IF EXISTS `a_num_insert`;
DELIMITER ;;
CREATE TRIGGER `a_num_insert` AFTER INSERT ON `answer` FOR EACH ROW begin
update user set a_num = a_num + 1 where answer.user_id = user.user_id;
update question set a_num = a_num + 1 where answer.user_id = user.user_id;
end
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `a_num_delete`;
DELIMITER ;;
CREATE TRIGGER `a_num_delete` AFTER DELETE ON `answer` FOR EACH ROW begin
update user set a_num = a_num - 1 where answer.user_id = user.user_id;
update question set a_num = a_num - 1 where answer.user_id = user.user_id;
end
;;
DELIMITER ;
SET FOREIGN_KEY_CHECKS=1;

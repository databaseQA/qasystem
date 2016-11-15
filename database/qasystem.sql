-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-11-15 04:30:33
-- 服务器版本： 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `qasystem`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`admin_id` int(50) NOT NULL COMMENT '管理员ID',
  `admin_name` varchar(50) NOT NULL COMMENT '管理员名称，用于登录',
  `admin_pwd` varchar(20) NOT NULL COMMENT '管理员密码',
  `admin_gender` char(1) DEFAULT NULL COMMENT '管理员性别：男/女',
  `admin_email` varchar(50) DEFAULT NULL COMMENT '管理员邮箱',
  `admin_type` char(2) NOT NULL DEFAULT '普通' COMMENT '管理员类型：高级/普通'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `answer`
--

CREATE TABLE IF NOT EXISTS `answer` (
`a_id` int(50) NOT NULL COMMENT '回答ID',
  `q_id` int(50) NOT NULL COMMENT '问题ID',
  `user_id` int(50) NOT NULL COMMENT '用户ID',
  `a_content` longtext NOT NULL COMMENT '回答内容',
  `a_time` datetime NOT NULL COMMENT '回答时间',
  `yesVote` int(200) NOT NULL DEFAULT '0' COMMENT '赞同票数',
  `noVote` int(200) NOT NULL DEFAULT '0' COMMENT '反对票数'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 触发器 `answer`
--
DELIMITER //
CREATE TRIGGER `a_num_delete` AFTER DELETE ON `answer`
 FOR EACH ROW begin
update user set a_num = a_num - 1 where answer.user_id = user.user_id;
update question set a_num = a_num - 1 where answer.user_id = user.user_id;
end
//
DELIMITER ;
DELIMITER //
CREATE TRIGGER `a_num_insert` AFTER INSERT ON `answer`
 FOR EACH ROW begin
update user set a_num = a_num + 1 where answer.user_id = user.user_id;
update question set a_num = a_num + 1 where answer.user_id = user.user_id;
end
//
DELIMITER ;

-- --------------------------------------------------------

--
-- 表的结构 `question`
--

CREATE TABLE IF NOT EXISTS `question` (
`q_id` int(50) NOT NULL COMMENT '问题ID',
  `user_id` int(50) NOT NULL COMMENT '用户ID',
  `type_id` int(20) NOT NULL COMMENT '问题类型ID',
  `q_title` varchar(200) NOT NULL COMMENT '问题标题',
  `q_content` longtext COMMENT '问题补充内容',
  `q_time` datetime NOT NULL COMMENT '提问时间',
  `q_state` char(3) NOT NULL DEFAULT '未解决' COMMENT '问题状态：未解决/已解决',
  `a_num` int(20) NOT NULL DEFAULT '0' COMMENT '回答数量'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 触发器 `question`
--
DELIMITER //
CREATE TRIGGER `q_num_delete` AFTER DELETE ON `question`
 FOR EACH ROW update user set q_num = q_num - 1 where question.user_id = user.user_id
//
DELIMITER ;
DELIMITER //
CREATE TRIGGER `q_num_insert` AFTER INSERT ON `question`
 FOR EACH ROW update user set q_num = q_num + 1 where question.user_id = user.user_id
//
DELIMITER ;

-- --------------------------------------------------------

--
-- 表的结构 `type`
--

CREATE TABLE IF NOT EXISTS `type` (
`type_id` int(50) NOT NULL COMMENT '问题类型ID',
  `type_name` varchar(20) NOT NULL COMMENT '问题类型'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`user_id` int(50) NOT NULL COMMENT '用户ID',
  `user_name` varchar(50) NOT NULL COMMENT '用户名称，用于登录，不可修改',
  `user_pwd` varchar(20) NOT NULL COMMENT '用户密码',
  `user_nickname` varchar(50) DEFAULT NULL COMMENT '用户昵称，可修改',
  `user_gender` char(1) DEFAULT NULL COMMENT '用户性别',
  `user_email` varchar(50) DEFAULT NULL COMMENT '用户邮箱',
  `user_intro` varchar(100) DEFAULT NULL COMMENT '个人简介',
  `q_num` int(20) NOT NULL DEFAULT '0' COMMENT '用户提问数',
  `a_num` int(20) NOT NULL DEFAULT '0' COMMENT '用户回答数'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`admin_id`), ADD UNIQUE KEY `admin_name` (`admin_name`), ADD UNIQUE KEY `admin_email` (`admin_email`);

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
 ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
 ADD PRIMARY KEY (`q_id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
 ADD PRIMARY KEY (`type_id`), ADD UNIQUE KEY `typr_name` (`type_name`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`user_id`), ADD UNIQUE KEY `user_name` (`user_name`), ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `admin_id` int(50) NOT NULL AUTO_INCREMENT COMMENT '管理员ID';
--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
MODIFY `a_id` int(50) NOT NULL AUTO_INCREMENT COMMENT '回答ID';
--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
MODIFY `q_id` int(50) NOT NULL AUTO_INCREMENT COMMENT '问题ID';
--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
MODIFY `type_id` int(50) NOT NULL AUTO_INCREMENT COMMENT '问题类型ID';
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `user_id` int(50) NOT NULL AUTO_INCREMENT COMMENT '用户ID',AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

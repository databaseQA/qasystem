
CREATE TABLE IF NOT EXISTS `admin` (
`admin_id` int(11) NOT NULL auto_increment PRIMARY KEY COMMENT '管理员ID',
  `admin_name` varchar(20) NOT NULL COMMENT '管理员名称，用于登录',
  `admin_pwd` varchar(20) NOT NULL COMMENT '管理员密码',
  `admin_gender` varchar(2) DEFAULT NULL COMMENT '管理员性别：男/女',
  `admin_email` varchar(30) DEFAULT NULL COMMENT '管理员邮箱',
  `admin_type` VARCHAR(6) NOT NULL DEFAULT '普通' COMMENT '管理员类型：高级/普通'
);

-- --------------------------------------------------------

--
-- 表的结构 `answer`
--

CREATE TABLE IF NOT EXISTS `answer` (
`a_id` int(11) NOT NULL auto_increment PRIMARY KEY  COMMENT '回答ID',
  `q_id` int(11) NOT NULL COMMENT '问题ID',
  `user_id` int(11) NOT NULL COMMENT '用户ID',
  `a_content` VARCHAR(600) NOT NULL COMMENT '回答内容',
  `a_time` datetime NOT NULL COMMENT '回答时间',
  `yesVote` VARCHAR(6) NOT NULL DEFAULT '0' COMMENT '赞同票数',
  `noVote` VARCHAR(6) NOT NULL DEFAULT '0' COMMENT '反对票数'
) ;

--
-- 触发器 `answer`
--
DELIMITER //
CREATE TRIGGER `a_num_delete` AFTER DELETE ON `answer`
 FOR EACH ROW begin
update user set a_num = a_num - 1 where user_id = old.user_id;
update question set a_num = a_num - 1 where user_id = old.user_id;
end
//
DELIMITER ;
DELIMITER //
CREATE TRIGGER `a_num_insert` AFTER INSERT ON `answer`
 FOR EACH ROW begin
update `user` set a_num = a_num + 1 where user_id = new.user_id;
update question set a_num = a_num + 1 where user_id = new.user_id;
end
//
DELIMITER ;

-- --------------------------------------------------------

--
-- 表的结构 `question`
--

CREATE TABLE IF NOT EXISTS `question` (
`q_id` int(11) NOT NULL auto_increment PRIMARY KEY  COMMENT '问题ID',
  `user_id` int(11) NOT NULL COMMENT '用户ID',
  `type_id` int(11) NOT NULL COMMENT '问题类型ID',
  `q_title` varchar(80) NOT NULL COMMENT '问题标题',
  `q_content` VARCHAR(400) COMMENT '问题补充内容',
  `q_time` datetime NOT NULL COMMENT '提问时间',
  `q_state` VARCHAR(6) NOT NULL DEFAULT '未解决' COMMENT '问题状态：未解决/已解决',
  `a_num` int(11) NOT NULL DEFAULT '0' COMMENT '回答数量'
);

--
-- 触发器 `question`
--
DELIMITER //
CREATE TRIGGER `q_num_delete` AFTER DELETE ON `question`
 FOR EACH ROW update user set q_num = q_num - 1 where user_id = old.user_id
//
DELIMITER ;
DELIMITER //
CREATE TRIGGER `q_num_insert` AFTER INSERT ON `question`
 FOR EACH ROW update user set q_num = q_num + 1 where user_id = new.user_id
//
DELIMITER ;

-- --------------------------------------------------------

--
-- 表的结构 `type`
--

CREATE TABLE IF NOT EXISTS `type` (
`type_id` int(11) NOT NULL PRIMARY KEY  auto_increment COMMENT '问题类型ID',
  `type_name` varchar(20) NOT NULL COMMENT '问题类型'
);

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`user_id` int(11) NOT NULL PRIMARY KEY  auto_increment COMMENT '用户ID',
  `user_name` varchar(50) NOT NULL COMMENT '用户名称，用于登录，不可修改',
  `user_pwd` varchar(20) NOT NULL COMMENT '用户密码',
  `user_nickname` varchar(50) DEFAULT NULL COMMENT '用户昵称，可修改',
  `user_gender` VARCHAR (2) DEFAULT NULL COMMENT '用户性别',
  `user_email` varchar(50) DEFAULT NULL COMMENT '用户邮箱',
  `q_num` int(11) NOT NULL DEFAULT '0' COMMENT '用户提问数',
  `a_num` int(11) NOT NULL DEFAULT '0' COMMENT '用户回答数'
);


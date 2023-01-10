CREATE TABLE `t_user` (
  `id` int(11) PRIMARY KEY AUTO_INCREMENT,
  `username` varchar(30) NOT NULL COMMENT '用户名',
  `password` varchar(32) NOT NULL COMMENT '密码',
  `email` varchar(30) NOT NULL COMMENT '邮箱',
  `token` varchar(50) NOT NULL COMMENT '帐号激活码',
  `token_exptime` int(10) NOT NULL COMMENT '激活码有效期',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态,0-未激活,1-已激活',
  `regtime` datetime DEFAULT CURRENT_TIMESTAMP COMMENT '注册时间',
  `admin` int(10) NOT NULL COMMENT '管理员权限，默认为0',
  `ip` varchar(50) NOT NULL COMMENT '用户ip',
  `pic` varchar(40) NOT NULL COMMENT '用户头像位置'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
CREATE INDEX user_index
ON t_user (username);
CREATE INDEX mail_index
ON t_user (email);
CREATE INDEX token_index
ON t_user (token);
CREATE INDEX status_index
ON t_user (status);

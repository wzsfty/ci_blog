CREATE TABLE IF NOT EXISTS `user`(
	`uid` int unsigned AUTO_INCREMENT, 
	`username` varchar(15) not null comment '用户名' ,
	`password` char(32) not null DEFAULT '' comment '密码' ,
	PRIMARY KEY(`uid`)
)Engine = MyISAM DEFAULT CHAR SET = 'UTF8';

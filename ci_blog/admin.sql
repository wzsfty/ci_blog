CREATE TABLE IF NOT EXISTS `admin`(
	`uid` int unsigned AUTO_INCREMENT, 
	`username` varchar(15) not null comment '用户名' ,
	`password` char(32) not null DEFAULT '' comment '密码' ,
	`admin_describe`
	`signature`
	`head_image` varchar(50) not null DEFAULT '' comment '用户头像',
	PRIMARY KEY(`uid`)
)Engine = MyISAM DEFAULT CHAR SET = 'UTF8';

#insert admin(username,password) values ('admin',md5('admin'));
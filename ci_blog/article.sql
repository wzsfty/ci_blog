CREATE TABLE IF NOT EXISTS `article`(
	`aid` int unsigned AUTO_INCREMENT, 
	`cid` int unsigned not null comment '分类id' ,
	`title` varchar(155) not null DEFAULT '' comment '标题' ,
	`content` text  comment '内容',
	`time` int unsigned not null DEFAULT 0,
	PRIMARY KEY(`aid`)
)Engine = MyISAM DEFAULT CHAR SET = 'UTF8';
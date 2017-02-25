CREATE TABLE IF NOT EXISTS `tags`(
	`tags_id` int unsigned AUTO_INCREMENT, 
	`cid` int unsigned comment '文章id',
	`tag` varchar(50) not null DEFAULT '',
	PRIMARY KEY(`tags_id`)
)Engine = MyISAM DEFAULT CHAR SET = 'UTF8';
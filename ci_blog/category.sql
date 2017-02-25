CREATE TABLE IF NOT EXISTS `category`(
	`cid` int unsigned AUTO_INCREMENT, 
	`cname` varchar(50) not null DEFAULT '',
	PRIMARY KEY(`cid`)
)Engine = MyISAM DEFAULT CHAR SET = 'UTF8';
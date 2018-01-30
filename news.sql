-- DB for news and events items
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id` INT(6) UNSIGNED AUTO_INCREMENT,
  `content` VARCHAR (1500) default NULL,
  `link` VARCHAR (100) default NULL,
  `source` VARCHAR (100) default NULL,
  PRIMARY KEY  (`id`)
)
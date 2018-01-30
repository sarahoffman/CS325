DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id` INT(6) UNSIGNED AUTO_INCREMENT,
  `quote` VARCHAR (1000) default NULL,
  'link' VARCHAR (100) default NULL,
  PRIMARY KEY  (`id`)
)
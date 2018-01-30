-- Db for email list
DROP TABLE IF EXISTS `email_list`;
CREATE TABLE `email_list` (
  `id` INT(6) UNSIGNED AUTO_INCREMENT,
  `first_name` VARCHAR (100) default NULL,
  `last_name` VARCHAR (100) default NULL,
  `email` VARCHAR (1000) default NULL,
  PRIMARY KEY  (`id`)
)
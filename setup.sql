-- Adminer 4.7.0 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';


DROP TABLE IF EXISTS `bigip`;
CREATE TABLE `bigip` (
  `date` date NOT NULL,
  `bigip` bigint(20) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`bigip`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `ip`;
CREATE TABLE `ip` (
  `ip` text NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- 2019-02-27 12:25:51
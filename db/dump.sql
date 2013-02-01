# ************************************************************
# Sequel Pro SQL dump
# Version 3408
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.5.9)
# Database: passbook
# Generation Time: 2013-02-01 07:19:04 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table barcode_format
# ------------------------------------------------------------

DROP TABLE IF EXISTS `barcode_format`;

CREATE TABLE `barcode_format` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table barcode_messageEncoding
# ------------------------------------------------------------

DROP TABLE IF EXISTS `barcode_messageEncoding`;

CREATE TABLE `barcode_messageEncoding` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table pass
# ------------------------------------------------------------

DROP TABLE IF EXISTS `pass`;

CREATE TABLE `pass` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pass_type_id` int(11) DEFAULT NULL,
  `formatVersion` tinyint(1) DEFAULT NULL,
  `uid` varchar(32) DEFAULT NULL,
  `teamIdentifier` varchar(16) DEFAULT NULL,
  `passTypeIdentifier` varchar(64) DEFAULT NULL,
  `organizationName` varchar(64) DEFAULT NULL,
  `background_image` text,
  `background_image_ratina` text,
  `backgroundColor` varchar(32) DEFAULT NULL,
  `foregroundColor` varchar(32) DEFAULT NULL,
  `labelColor` varchar(32) DEFAULT NULL,
  `serialNumber` varchar(32) DEFAULT NULL,
  `description` varchar(64) DEFAULT NULL,
  `logo_image` text,
  `logo_image_ratina` text,
  `logoText` varchar(100) DEFAULT NULL,
  `headerText` varchar(100) DEFAULT NULL,
  `thumbnail_image` text,
  `thumbnail_image_ratina` text,
  `strip_image` text,
  `strip_image_ratina` text,
  `primaryFields` text,
  `secondaryFields` text,
  `auxilaryFields` text,
  `barcode` text,
  `backFields` text,
  `locations` text,
  `relevantDate` varchar(100) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table pass_type
# ------------------------------------------------------------

DROP TABLE IF EXISTS `pass_type`;

CREATE TABLE `pass_type` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL DEFAULT '',
  `active` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

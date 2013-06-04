# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.5.31)
# Database: passbook
# Generation Time: 2013-06-04 05:54:49 +0000
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
  `value` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table barcode_message_encoding
# ------------------------------------------------------------

DROP TABLE IF EXISTS `barcode_message_encoding`;

CREATE TABLE `barcode_message_encoding` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `barcode_format_id` int(11) NOT NULL,
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



# Dump of table download
# ------------------------------------------------------------

DROP TABLE IF EXISTS `download`;

CREATE TABLE `download` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pass_id` int(11) NOT NULL,
  `browser_cookie` varchar(256) NOT NULL DEFAULT '',
  `device` varchar(32) DEFAULT '',
  `browser` varchar(128) DEFAULT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table pass
# ------------------------------------------------------------

DROP TABLE IF EXISTS `pass`;

CREATE TABLE `pass` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pass_type_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `formatVersion` tinyint(1) DEFAULT NULL,
  `uid` varchar(32) CHARACTER SET utf8 DEFAULT NULL,
  `teamIdentifier` varchar(16) CHARACTER SET utf8 DEFAULT NULL,
  `passTypeIdentifier` varchar(64) CHARACTER SET utf8 DEFAULT NULL,
  `organizationName` varchar(64) CHARACTER SET utf8 DEFAULT NULL,
  `iconImage` text CHARACTER SET utf8,
  `iconImageRetina` text CHARACTER SET utf8,
  `backgroundImage` text CHARACTER SET utf8,
  `backgroundImageRetina` text CHARACTER SET utf8,
  `backgroundColor` varchar(32) CHARACTER SET utf8 DEFAULT NULL,
  `foregroundColor` varchar(32) CHARACTER SET utf8 DEFAULT NULL,
  `labelColor` varchar(32) CHARACTER SET utf8 DEFAULT NULL,
  `serialNumber` varchar(32) CHARACTER SET utf8 DEFAULT NULL,
  `description` varchar(64) CHARACTER SET utf8 DEFAULT NULL,
  `logoImage` text CHARACTER SET utf8,
  `logoImageRetina` text CHARACTER SET utf8,
  `logoText` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `headerText` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `thumbnailImage` text CHARACTER SET utf8,
  `thumbnailImageRetina` text CHARACTER SET utf8,
  `stripImage` text CHARACTER SET utf8,
  `stripImageRetina` text CHARACTER SET utf8,
  `primaryFields` text CHARACTER SET utf8,
  `secondaryFields` text CHARACTER SET utf8,
  `auxiliaryFields` text CHARACTER SET utf8,
  `barcode_format_id` int(11) DEFAULT NULL,
  `barcodeMessage` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `backFields` text CHARACTER SET utf8,
  `locations` text CHARACTER SET utf8,
  `relevantDate` varchar(100) CHARACTER SET utf8 DEFAULT '',
  `download_limit` int(11) DEFAULT NULL,
  `download_count` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table pass_type
# ------------------------------------------------------------

DROP TABLE IF EXISTS `pass_type`;

CREATE TABLE `pass_type` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `active` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table payment
# ------------------------------------------------------------

DROP TABLE IF EXISTS `payment`;

CREATE TABLE `payment` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pass_id` int(11) NOT NULL,
  `amount` float DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(8) DEFAULT NULL,
  `first_name` varchar(64) DEFAULT NULL,
  `last_name` varchar(64) DEFAULT NULL,
  `email` varchar(64) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `company` varchar(64) DEFAULT NULL,
  `phone` varchar(16) DEFAULT NULL,
  `mobile` varchar(16) DEFAULT NULL,
  `address` varchar(128) DEFAULT NULL,
  `suburb` varchar(64) DEFAULT NULL,
  `state` varchar(32) DEFAULT NULL,
  `country` varchar(32) DEFAULT NULL,
  `postcode` int(6) DEFAULT NULL,
  `job_description` varchar(128) DEFAULT NULL,
  `comments` varchar(128) DEFAULT NULL,
  `subscription_type` varchar(16) DEFAULT NULL,
  `AccessCode` varchar(256) DEFAULT NULL,
  `AuthorisationCode` varchar(32) DEFAULT NULL,
  `ResponseCode` varchar(5) DEFAULT NULL,
  `ResponseMessage` text,
  `InvoiceNumber` varchar(32) DEFAULT NULL,
  `InvoiceReference` varchar(32) DEFAULT NULL,
  `TotalAmount` float DEFAULT NULL,
  `TransactionID` int(11) DEFAULT NULL,
  `TransactionStatus` tinyint(1) DEFAULT NULL,
  `TokenCustomerID` float DEFAULT NULL,
  `PaymentDate` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `status` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

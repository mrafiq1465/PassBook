# ************************************************************
# Sequel Pro SQL dump
# Version 4004
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.5.29)
# Database: passbook
# Generation Time: 2013-03-31 20:57:43 +0000
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

LOCK TABLES `barcode_format` WRITE;
/*!40000 ALTER TABLE `barcode_format` DISABLE KEYS */;

INSERT INTO `barcode_format` (`id`, `name`, `value`)
VALUES
	(1,'PKBarcodeFormatPDF417','PKBarcodeFormatPDF417'),
	(2,'QR codes','PKBarcodeFormatQR'),
	(3,'Aztec','PKBarcodeFormatAztec');

/*!40000 ALTER TABLE `barcode_format` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table barcode_message_encoding
# ------------------------------------------------------------

DROP TABLE IF EXISTS `barcode_message_encoding`;

CREATE TABLE `barcode_message_encoding` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `barcode_format_id` int(11) NOT NULL,
  `name` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `barcode_message_encoding` WRITE;
/*!40000 ALTER TABLE `barcode_message_encoding` DISABLE KEYS */;

INSERT INTO `barcode_message_encoding` (`id`, `barcode_format_id`, `name`)
VALUES
	(1,1,'iso-8859-1');

/*!40000 ALTER TABLE `barcode_message_encoding` ENABLE KEYS */;
UNLOCK TABLES;


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

LOCK TABLES `pass` WRITE;
/*!40000 ALTER TABLE `pass` DISABLE KEYS */;

INSERT INTO `pass` (`id`, `pass_type_id`, `user_id`, `formatVersion`, `uid`, `teamIdentifier`, `passTypeIdentifier`, `organizationName`, `iconImage`, `iconImageRetina`, `backgroundImage`, `backgroundImageRetina`, `backgroundColor`, `foregroundColor`, `labelColor`, `serialNumber`, `description`, `logoImage`, `logoImageRetina`, `logoText`, `headerText`, `thumbnailImage`, `thumbnailImageRetina`, `stripImage`, `stripImageRetina`, `primaryFields`, `secondaryFields`, `auxiliaryFields`, `barcode_format_id`, `barcodeMessage`, `backFields`, `locations`, `relevantDate`, `download_limit`, `download_count`, `created`, `updated`)
VALUES
	(1,1,NULL,NULL,NULL,NULL,NULL,'adsfasd','data/1/icon.png','data/1/icon@2x.png','data/1/background.png','data/1/background@2x.png','rgb(120,31,120)','rgb(222,185,222)','rgb(26,5,26)',NULL,'fasdfsf','data/1/logo.png','data/1/logo@2x.png','afdsf','adsfadsf','data/1/thumbnail.png','data/1/thumbnail@2x.png',NULL,NULL,'','[{\"Label\":\"dfasdf\",\"Value\":\"123\"}]','[{\"Label\":\"adfadsf\",\"Value\":\"123\"}]',1,NULL,'[]','[{\"Value\":\"12.22,23.00\"}]','',NULL,NULL,NULL,NULL),
	(2,1,NULL,NULL,NULL,NULL,NULL,'sdfasdf',NULL,'',NULL,NULL,'rgb(184,66,184)','rgb(84,36,84)','rgb(189,147,189)',NULL,'asdfdas',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL),
	(3,1,NULL,NULL,NULL,NULL,NULL,'adfsfas','data/3/iconImage.png','data/3/iconImageRetina.png','data/3/backgroundImage.png','data/3/backgroundImageRetina.png',NULL,NULL,NULL,NULL,'fdasfadsf',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL),
	(4,2,NULL,NULL,NULL,NULL,NULL,'adfasdfa','data/4/icon.png','data/4/icon@2x.png',NULL,NULL,'rgb(138,45,138)','rgb(214,32,214)','rgb(64,184,126)',NULL,'afasdf','data/4/logo.png','data/4/logo@2x.png','adfasdf','afdsfa','data/4/thumbnail.png','data/4/thumbnail@2x.png',NULL,NULL,'[{\"Label\":\"asdfasdfasasd\",\"Value\":\"12112\"}]','[]','[]',1,NULL,'[]','[]','',NULL,NULL,NULL,NULL),
	(5,2,NULL,NULL,NULL,NULL,NULL,'sadf',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'asdf',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL),
	(6,2,NULL,NULL,NULL,NULL,NULL,'zxcvz',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'zv',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL),
	(7,2,NULL,NULL,NULL,NULL,NULL,'test','data/7/icon.png','data/7/icon@2x.png',NULL,NULL,'rgb(79,24,79)','rgb(51,19,51)','rgb(64,42,64)',NULL,'test','data/7/logo.png','data/7/logo@2x.png','dfasf','asdfa','data/7/thumbnail.png','data/7/thumbnail@2x.png',NULL,NULL,'[{\"Label\":\"asdf\",\"Value\":\"sdbssdfgsdfg\"}]','[{\"Label\":\"asfdasd\",\"Value\":\"asdfadfsa\"}]','[{\"Label\":\"asdfad\",\"Value\":\"asdfas\"}]',1,'test barcode','[{\"Label\":\"asdfas\",\"Value\":\"asdfasdf\"}]','[]','',NULL,NULL,NULL,NULL),
	(8,2,NULL,NULL,NULL,NULL,NULL,'as',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'asdf',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL),
	(9,2,NULL,NULL,NULL,NULL,NULL,'sadfas',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'asfd',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL),
	(10,2,NULL,NULL,NULL,NULL,NULL,'aaa',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'aaa',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL),
	(11,2,NULL,NULL,NULL,NULL,NULL,'Stef test',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Test',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL),
	(12,2,NULL,NULL,NULL,NULL,NULL,'test','data/12/icon.png',NULL,NULL,NULL,'rgb(0,0,0)','','',NULL,'test',NULL,NULL,'tets','test',NULL,'data/12/thumbnail@2x.png',NULL,NULL,'[]','[]','[]',1,'','[]','[]','',NULL,NULL,NULL,NULL),
	(13,2,NULL,NULL,NULL,NULL,NULL,'test','data/13/icon.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'test',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL),
	(14,2,NULL,NULL,NULL,NULL,NULL,'test',NULL,NULL,NULL,NULL,'rgb(0,0,0)','rgb(0,0,0)','rgb(0,0,0)',NULL,'teset',NULL,NULL,'hello','how are you',NULL,NULL,NULL,NULL,'[]','[]','[]',1,'scan me',NULL,NULL,'',NULL,NULL,NULL,NULL);

/*!40000 ALTER TABLE `pass` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table pass_download
# ------------------------------------------------------------

DROP TABLE IF EXISTS `pass_download`;

CREATE TABLE `pass_download` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pass_id` int(11) NOT NULL,
  `uid` varchar(256) NOT NULL DEFAULT '',
  `device` varchar(32) NOT NULL DEFAULT '',
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table pass_type
# ------------------------------------------------------------

DROP TABLE IF EXISTS `pass_type`;

CREATE TABLE `pass_type` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `active` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `pass_type` WRITE;
/*!40000 ALTER TABLE `pass_type` DISABLE KEYS */;

INSERT INTO `pass_type` (`id`, `name`, `active`)
VALUES
	(1,'event',NULL),
	(2,'coupon',NULL),
	(3,'transport',NULL),
	(4,'store',NULL),
	(5,'generic',NULL);

/*!40000 ALTER TABLE `pass_type` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table payment
# ------------------------------------------------------------

DROP TABLE IF EXISTS `payment`;

CREATE TABLE `payment` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(64) CHARACTER SET utf8 DEFAULT NULL,
  `password` varchar(32) CHARACTER SET utf8 DEFAULT NULL,
  `company` varchar(64) CHARACTER SET utf8 DEFAULT NULL,
  `phone` varchar(16) CHARACTER SET utf8 DEFAULT NULL,
  `address` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `state` varchar(32) CHARACTER SET utf8 DEFAULT NULL,
  `country` varchar(32) CHARACTER SET utf8 DEFAULT NULL,
  `subscription_type` varchar(16) DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `status` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `name`, `email`, `password`, `company`, `phone`, `address`, `state`, `country`, `subscription_type`, `updated`, `created`, `status`)
VALUES
	(1,'admin','what@yahoo.com','sdaf',NULL,NULL,NULL,NULL,NULL,NULL,'2013-03-28 02:00:14','2013-03-28 02:00:14',1),
	(2,'asdfasdf','asdf','sdaf',NULL,NULL,NULL,NULL,NULL,NULL,'2013-03-28 02:02:44','2013-03-28 02:02:44',1),
	(3,'ra','raf@yahoo.com','test',NULL,NULL,NULL,NULL,NULL,NULL,'2013-03-29 01:38:39','2013-03-29 01:38:39',1);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

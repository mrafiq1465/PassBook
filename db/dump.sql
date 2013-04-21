# ************************************************************
# Sequel Pro SQL dump
# Version 4004
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.6.10)
# Database: passbook
# Generation Time: 2013-04-21 09:24:56 +0000
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



# Dump of table download
# ------------------------------------------------------------

DROP TABLE IF EXISTS `download`;

CREATE TABLE `download` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pass_id` int(11) NOT NULL,
  `uid` varchar(256) NOT NULL DEFAULT '',
  `device` varchar(32) NOT NULL DEFAULT '',
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `download` WRITE;
/*!40000 ALTER TABLE `download` DISABLE KEYS */;

INSERT INTO `download` (`id`, `pass_id`, `uid`, `device`, `created`)
VALUES
	(1,21,'asdfasdfa','ios','2013-01-01 00:00:00');

/*!40000 ALTER TABLE `download` ENABLE KEYS */;
UNLOCK TABLES;


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
	(1,1,3,NULL,NULL,NULL,NULL,'adsfasd','data/21/icon.png','data/1/icon@2x.png','data/1/background.png','data/1/background@2x.png','rgb(120,31,120)','rgb(222,185,222)','rgb(26,5,26)',NULL,'fasdfsf','data/1/logo.png','data/1/logo@2x.png','afdsf','adsfadsf','data/1/thumbnail.png','data/1/thumbnail@2x.png',NULL,NULL,'','[{\"Label\":\"dfasdf\",\"Value\":\"123\"}]','[{\"Label\":\"adfadsf\",\"Value\":\"123\"}]',1,NULL,'[]','[{\"Value\":\"12.22,23.00\"}]','',144,23,NULL,'2013-04-08 23:44:56'),
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
	(12,2,NULL,NULL,NULL,NULL,NULL,'test','data/21/icon.png',NULL,NULL,NULL,'rgb(0,0,0)','','',NULL,'test',NULL,NULL,'tets','test',NULL,'data/12/thumbnail@2x.png',NULL,NULL,'[]','[]','[]',1,'','[]','[]','',NULL,NULL,NULL,NULL),
	(46,2,18,NULL,NULL,NULL,NULL,'asfa',NULL,NULL,NULL,NULL,'#cc9966','#666633','#663399',NULL,'asdfa',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',55,NULL,'2013-04-14 00:45:09','2013-04-14 01:36:14'),
	(47,2,18,NULL,NULL,NULL,NULL,'aasdfa',NULL,NULL,NULL,NULL,'#660033','#33cc66','#cc0033',NULL,'asdfa',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,'2013-04-14 01:45:50','2013-04-14 01:46:41'),
	(48,2,20,NULL,NULL,NULL,NULL,'asdfasd',NULL,NULL,NULL,NULL,'#ff9900','#ff9966','#663333',NULL,'asdf',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,'2013-04-14 01:49:33','2013-04-14 01:54:49'),
	(49,2,NULL,NULL,NULL,NULL,NULL,'adsd',NULL,NULL,NULL,NULL,'#c59d9d','#ffffff','#da0a0a',NULL,'asdsa',NULL,NULL,'','Doe',NULL,NULL,NULL,NULL,'[]','[]','[]',1,'','[]','[]','',NULL,NULL,'2013-04-14 10:23:32','2013-04-14 10:23:32'),
	(50,2,3,NULL,NULL,NULL,NULL,'twertw','data/50/icon.png','data/50/icon@2x.png',NULL,NULL,'#8e1b1b','#ffffff','#ffffff',NULL,'sadgsdfg','data/50/logo.png','data/50/logo@2x.png','dfgsdf','sdfgsdfg',NULL,NULL,'data/50/strip.png','data/50/strip@2x.png','[]','[{\"Label\":\"bbb\",\"Value\":\"ccc\"}]','[]',1,'sfsfs','[{\"Label\":\"sdfs\",\"Value\":\"sfs\"}]','[]','',44,NULL,'2013-04-18 00:20:25','2013-04-18 01:18:27'),
	(51,2,NULL,NULL,NULL,NULL,NULL,'test',NULL,NULL,NULL,NULL,'#0f0c4d','#ffffff','#ffffff',NULL,'test','data/51/logo.png','data/51/logo@2x.png','asdfasd','asdfasdf',NULL,NULL,'data/51/strip.png','data/51/strip@2x.png','[]','[]','[]',NULL,NULL,'[]','[]','',NULL,NULL,'2013-04-19 09:42:49','2013-04-19 09:42:49'),
	(52,2,3,NULL,NULL,NULL,NULL,'test','data/52/icon.png','data/52/icon@2x.png',NULL,NULL,'#40449e','#e4d8d8','#bb0404',NULL,'test','data/52/logo.png','data/52/logo@2x.png','Budget Airport','bluemu',NULL,NULL,'data/52/strip.png','data/52/strip@2x.png','[]','[{\"Label\":\"value\",\"Value\":\"30% off on sunday\"}]','[]',2,'afasdfasdf','[{\"Label\":\"test1\",\"Value\":\"test2\"},{\"Label\":\"test3\",\"Value\":\"test4\"}]','[]','',122,NULL,'2013-04-20 23:10:29','2013-04-21 02:14:17');

/*!40000 ALTER TABLE `pass` ENABLE KEYS */;
UNLOCK TABLES;


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
  `pass_id` int(11) NOT NULL,
  `amount` float DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `payment` WRITE;
/*!40000 ALTER TABLE `payment` DISABLE KEYS */;

INSERT INTO `payment` (`id`, `pass_id`, `amount`, `date`)
VALUES
	(1,16,NULL,NULL),
	(2,46,NULL,NULL);

/*!40000 ALTER TABLE `payment` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(8) CHARACTER SET utf8 DEFAULT NULL,
  `name` varchar(64) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(64) CHARACTER SET utf8 DEFAULT NULL,
  `password` varchar(32) CHARACTER SET utf8 DEFAULT NULL,
  `company` varchar(64) CHARACTER SET utf8 DEFAULT NULL,
  `phone` varchar(16) CHARACTER SET utf8 DEFAULT NULL,
  `address` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `state` varchar(32) CHARACTER SET utf8 DEFAULT NULL,
  `country` varchar(32) CHARACTER SET utf8 DEFAULT NULL,
  `subscription_type` varchar(16) CHARACTER SET utf8 DEFAULT NULL,
  `payment_token` varchar(64) CHARACTER SET utf8 DEFAULT NULL,
  `payment_token_status` tinyint(1) DEFAULT NULL,
  `payment_token_date` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `status` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `title`, `name`, `email`, `password`, `company`, `phone`, `address`, `state`, `country`, `subscription_type`, `payment_token`, `payment_token_status`, `payment_token_date`, `updated`, `created`, `status`)
VALUES
	(1,NULL,'admin','what@yahoo.com','sdaf',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2013-03-28 02:00:14','2013-03-28 02:00:14',1),
	(2,NULL,'asdfasdf','asdf','sdaf',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2013-03-28 02:02:44','2013-03-28 02:02:44',1),
	(3,NULL,'ra','raf@yahoo.com','test',NULL,NULL,NULL,NULL,NULL,NULL,'123456',0,NULL,'2013-03-29 01:38:39','2013-03-29 01:38:39',1),
	(4,NULL,'asasdfas','asdfasf@yahoo.com','asdf','asfasdfa','sdfafdsa','asfasfasdfasfd','Australia',NULL,NULL,NULL,NULL,NULL,'2013-04-13 17:01:26','2013-04-13 17:01:26',1),
	(5,NULL,'name','email@yahoo.com','pass','fly','1234','adress','nsw','Australia',NULL,NULL,NULL,NULL,'2013-04-13 17:24:10','2013-04-13 17:24:10',1),
	(6,NULL,'fasfas','asdf3333asf@yahoo.com','asd','company','13213','123123','nsw','Australia',NULL,NULL,NULL,NULL,'2013-04-13 17:28:45','2013-04-13 17:28:45',1),
	(7,NULL,'asfasdf','sadfadfa@yahoo.com','asd','ffdsgs','wrwerw','sfas','nsw','Australia',NULL,NULL,NULL,NULL,'2013-04-13 17:40:57','2013-04-13 17:40:57',1),
	(8,NULL,'afasdf','asdfas@yahoo.com','qwe','asfsad','12312','dsgfsdgfsd','nsw','Australia',NULL,NULL,NULL,NULL,'2013-04-13 17:46:51','2013-04-13 17:46:51',1),
	(9,NULL,'dfadfs','sdfs@yahoo.com','aa','fasfda','1231231','sfasdfa','nsw','Australia',NULL,NULL,NULL,NULL,'2013-04-13 17:48:36','2013-04-13 17:48:36',1),
	(10,NULL,'asfdasdf','asdfasdfasf@yahoo.com','aa','fasdfa','asadf','13131','nsw','Australia',NULL,NULL,NULL,NULL,'2013-04-13 19:21:32','2013-04-13 19:21:32',1),
	(11,NULL,'asdfa','asdfa@yahoo.com','1234','sdfgs','sdfgs','sdfgs','nsw','Australia',NULL,NULL,NULL,NULL,'2013-04-13 21:19:54','2013-04-13 21:19:54',1),
	(12,NULL,'sdfgsd','sdfg@yahoo.com','123','asdfas','asdfa','fasfa','nsw','Australia',NULL,NULL,NULL,NULL,'2013-04-13 22:02:01','2013-04-13 22:02:01',1),
	(13,NULL,'raf','ee@yahoo.com','123','sdfgs','23423','asasdfa','nsw','Australia',NULL,NULL,NULL,NULL,'2013-04-13 22:13:58','2013-04-13 22:13:58',1),
	(14,NULL,'1234','1234@yahoo.com','1234','1234','1234','1234','nsw','Australia',NULL,NULL,NULL,NULL,'2013-04-13 22:16:02','2013-04-13 22:16:02',1),
	(15,NULL,'vvxvcx','222@yahoo.com','222','asdf','sadfas','afdasd','nsw','Australia',NULL,NULL,NULL,NULL,'2013-04-13 22:19:04','2013-04-13 22:19:04',1),
	(16,NULL,'ffff','wwww','1','ddd','222','dfdfg','nsw','Australia',NULL,NULL,NULL,NULL,'2013-04-13 23:18:54','2013-04-13 23:18:54',1),
	(17,NULL,'adfa','rrr@yahoo.com','1','1','1','1','nsw','Australia',NULL,NULL,NULL,NULL,'2013-04-14 00:15:26','2013-04-14 00:15:26',1),
	(18,NULL,'test','test@yahoo.com','test','test','test','test','vic','New Zealand',NULL,NULL,NULL,NULL,'2013-04-14 00:50:24','2013-04-14 00:50:24',1),
	(19,NULL,'a','b@yahoo.com','b','b','b','d','nsw','Australia',NULL,NULL,NULL,NULL,'2013-04-14 01:49:57','2013-04-14 01:49:57',1),
	(20,NULL,'dfa','asdf@yahooc.om','12','asdfa','asdf','asdfas','nsw','Australia',NULL,NULL,NULL,NULL,'2013-04-14 01:54:49','2013-04-14 01:54:49',1);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

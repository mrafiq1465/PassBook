# ************************************************************
# Sequel Pro SQL dump
# Version 4004
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.5.30)
# Database: passbook
# Generation Time: 2013-05-10 07:00:39 +0000
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
	(1,'PKBarcodeFormatPDF417','PKBarcodeFormatPDF417');

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
  `browser_cookie` varchar(256) NOT NULL DEFAULT '',
  `device` varchar(32) DEFAULT '',
  `browser` varchar(128) DEFAULT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `download` WRITE;
/*!40000 ALTER TABLE `download` DISABLE KEYS */;

INSERT INTO `download` (`id`, `pass_id`, `browser_cookie`, `device`, `browser`, `created`)
VALUES
	(1,99,'5186994992c7a','','','2013-05-05 10:39:21'),
	(2,99,'51869aaf51c40','','','2013-05-05 10:45:19'),
	(3,99,'51869b18cf28f','','','2013-05-05 10:47:04'),
	(4,40,'5186e29190604','','','2013-05-05 15:52:01'),
	(5,35,'5186e2ca391e5','','','2013-05-05 15:52:58'),
	(6,35,'5186e2e658a22','','','2013-05-05 15:53:26'),
	(7,107,'51870d22036bf','','','2013-05-05 18:53:38'),
	(8,107,'51870d388c85f','','','2013-05-05 18:54:00'),
	(9,107,'51870da7c18cf','','','2013-05-05 18:55:51'),
	(10,107,'51870dad00430','','','2013-05-05 18:55:56'),
	(11,107,'51870dd0d67f5','','','2013-05-05 18:56:32'),
	(12,107,'51875596791b4','','','2013-05-06 00:02:46'),
	(13,108,'51885b96230ab','','','2013-05-06 18:40:38'),
	(14,108,'51885b9a7c7d4','','','2013-05-06 18:40:42'),
	(15,107,'51897c26ab988','','','2013-05-07 15:11:50'),
	(16,107,'5189c84eb9b0b','','','2013-05-07 20:36:46'),
	(17,108,'5189f3f1dbe5d','','','2013-05-07 23:42:57'),
	(18,115,'5189f416d78ba','','','2013-05-07 23:43:34'),
	(19,115,'5189f42ae4f30','','','2013-05-07 23:43:54'),
	(20,115,'5189f48c09687','','','2013-05-07 23:45:32'),
	(21,115,'5189f4967be2e','','','2013-05-07 23:45:42'),
	(22,0,'5189f5be3735b','','','2013-05-07 23:50:38'),
	(23,0,'5189f5beedc74','','','2013-05-07 23:50:38'),
	(24,0,'5189f5bf83e2f','','','2013-05-07 23:50:39'),
	(25,0,'5189f5c01f200','','','2013-05-07 23:50:40'),
	(26,115,'5189f984167c4','','','2013-05-08 00:06:44'),
	(27,115,'5189f98fd5920','','','2013-05-08 00:06:55'),
	(28,115,'5189fd5d010c6','','','2013-05-08 00:23:09'),
	(29,115,'5189fd6b262b0','','','2013-05-08 00:23:23'),
	(30,115,'518a07844022c','','','2013-05-08 01:06:28');

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
	(1,1,NULL,NULL,NULL,NULL,NULL,'adsfasd','data/1/icon.png','data/1/icon@2x.png','data/1/background.png','data/1/background@2x.png','rgb(120,31,120)','rgb(222,185,222)','rgb(26,5,26)',NULL,'fasdfsf','data/1/logo.png','data/1/logo@2x.png','afdsf','adsfadsf','data/1/thumbnail.png','data/1/thumbnail@2x.png',NULL,NULL,'','[{\"Label\":\"dfasdf\",\"Value\":\"123\"}]','[{\"Label\":\"adfadsf\",\"Value\":\"123\"}]',1,NULL,'[]','[{\"Value\":\"12.22,23.00\"}]','',NULL,NULL,NULL,NULL),
	(2,1,NULL,NULL,NULL,NULL,NULL,'sdfasdf',NULL,'',NULL,NULL,'rgb(184,66,184)','rgb(84,36,84)','rgb(189,147,189)',NULL,'asdfdas',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL),
	(3,1,NULL,NULL,NULL,NULL,NULL,'adfsfas','data/3/iconImage.png','data/3/iconImageRetina.png','data/3/backgroundImage.png','data/3/backgroundImageRetina.png',NULL,NULL,NULL,NULL,'fdasfadsf',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL),
	(4,2,NULL,NULL,NULL,NULL,NULL,'adfasdfa','data/4/icon.png','data/4/icon@2x.png',NULL,NULL,'rgb(138,45,138)','rgb(214,32,214)','rgb(64,184,126)',NULL,'afasdf','data/4/logo.png','data/4/logo@2x.png','adfasdf','afdsfa','data/4/thumbnail.png','data/4/thumbnail@2x.png',NULL,NULL,'[{\"Label\":\"asdfasdfasasd\",\"Value\":\"12112\"}]','[]','[]',1,NULL,'[]','[]','',NULL,NULL,NULL,NULL),
	(25,2,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,'','','',NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,'2013-04-04 03:49:48','2013-04-04 03:49:48'),
	(26,2,NULL,NULL,NULL,NULL,NULL,'Brett',NULL,NULL,NULL,NULL,'rgb(0,0,0)','rgb(0,0,0)','',NULL,'Brett',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,'2013-04-04 14:57:30','2013-04-04 14:57:30'),
	(27,2,NULL,NULL,NULL,NULL,NULL,'Brett','data/27/icon.png','data/27/icon@2x.png',NULL,NULL,'rgb(0,0,0)','','',NULL,'Brett',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,'2013-04-04 19:46:32','2013-04-04 19:46:32'),
	(28,2,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,'','','',NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,'2013-04-04 19:55:28','2013-04-04 19:55:28'),
	(29,2,NULL,NULL,NULL,NULL,NULL,'stef test',NULL,NULL,NULL,NULL,'FFCC00','FFFFFF','000000',NULL,'test',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,'2013-04-04 19:55:56','2013-04-04 19:55:56'),
	(30,2,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,'','','',NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,'2013-04-05 00:58:38','2013-04-05 00:58:38'),
	(31,2,NULL,NULL,NULL,NULL,NULL,'test',NULL,NULL,NULL,NULL,'rgb(105,44,105)','rgb(92,38,92)','rgb(97,34,97)',NULL,'test',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,'2013-04-07 18:11:22','2013-04-07 18:11:22'),
	(32,2,NULL,NULL,NULL,NULL,NULL,'test',NULL,NULL,NULL,NULL,'rgb(105,50,105)','rgb(166,2,166)','rgb(82,38,82)',NULL,'esata',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,'2013-04-07 20:41:18','2013-04-07 20:41:18'),
	(33,2,NULL,NULL,NULL,NULL,NULL,'test','data/33/icon.png','data/33/icon@2x.png',NULL,NULL,'rgb(71,57,71)','rgb(18,17,18)','rgb(252,211,252)',NULL,'test','data/33/logo.png','data/33/logo@2x.png','logo test','header text',NULL,NULL,'data/33/strip.png','data/33/strip@2x.png','[{\"Label\":\"orimary\",\"Value\":\"primary\"}]','[{\"Label\":\"fsfdgs\",\"Value\":\"sdfgsdfgs\"}]','[]',1,'afasdfaafds','[{\"Label\":\"sdfa\",\"Value\":\"sdfgsdfg\"}]','[]','',NULL,NULL,'2013-04-07 21:14:49','2013-04-07 21:14:49'),
	(34,2,NULL,NULL,NULL,NULL,NULL,'test','data/34/icon.png','data/34/icon@2x.png',NULL,NULL,'rgb(77,56,77)','rgb(51,40,51)','rgb(242,220,242)',NULL,'safasd','data/34/logo.png','data/34/logo@2x.png','fasdfa','asdfasf',NULL,NULL,'data/34/strip.png','data/34/strip@2x.png','[{\"Label\":\"asdfa\",\"Value\":\"asdfa\"}]','[{\"Label\":\"asfda\",\"Value\":\"asdfa\"}]','[]',2,'afdafda','[{\"Label\":\"asdf\",\"Value\":\"asdfa\"}]','[]','',NULL,NULL,'2013-04-07 21:37:46','2013-04-07 21:37:46'),
	(35,2,3,NULL,NULL,NULL,NULL,'afsdfa','data/35/icon.png','data/35/icon@2x.png',NULL,NULL,'rgb(117,104,117)','rgb(184,140,184)','rgb(10,2,10)',NULL,'sdfa','data/35/logo.png','data/35/logo@2x.png','asdfa','asdfa',NULL,NULL,'data/35/strip.png','data/35/strip@2x.png','[{\"Label\":\"asdfa\",\"Value\":\"asdfa\"}]','[]','[]',1,'sdfadfa','[{\"Label\":\"zfasdf\",\"Value\":\"asfd\"}]','[]','',NULL,2,'2013-04-07 21:54:49','2013-04-07 21:54:49'),
	(36,2,NULL,NULL,NULL,NULL,NULL,'brett',NULL,NULL,NULL,NULL,'rgb(0,0,0)','rgb(0,1,0)','',NULL,'brett',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,'2013-04-08 21:04:07','2013-04-08 21:04:07'),
	(37,2,NULL,NULL,NULL,NULL,NULL,'f',NULL,NULL,NULL,NULL,'','','',NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,'2013-04-09 00:16:24','2013-04-09 00:16:24'),
	(38,2,NULL,NULL,NULL,NULL,NULL,'Test',NULL,NULL,NULL,NULL,'','','',NULL,'Test',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,'2013-04-09 02:17:21','2013-04-09 02:17:21'),
	(39,2,NULL,NULL,NULL,NULL,NULL,'test','data/39/icon.png','data/39/icon@2x.png',NULL,NULL,'rgb(31,26,31)','rgb(255,255,255)','rgb(255,255,255)',NULL,'test','data/39/logo.png','data/39/logo@2x.png','The Iconic','',NULL,NULL,'data/39/strip.png','data/39/strip@2x.png','[{\"Label\":\"p\",\"Value\":\"r\"}]','[{\"Label\":\"a\",\"Value\":\"b\"}]','[]',1,'test ','[{\"Label\":\"back field Label\",\"Value\":\"Back Field Value\"}]','[]','',NULL,NULL,'2013-04-10 00:01:50','2013-04-10 00:01:50'),
	(40,2,3,NULL,NULL,NULL,NULL,'The Iconic','data/40/icon.png','data/40/icon@2x.png',NULL,NULL,'rgb(75,75,75)','rgb(255,255,255)','rgb(255,250,255)',NULL,'The Iconic','data/40/logo.png','data/40/logo@2x.png','John','Doe',NULL,NULL,'data/40/strip.png','data/40/strip@2x.png','[]','[{\"Label\":\"Offer \",\"Value\":\"50% off in April\"}]','[]',1,'test','[{\"Label\":\"test\",\"Value\":\"test\"},{\"Label\":\"sdfgs\",\"Value\":\"sdfgsd\"},{\"Label\":\"dfgs\",\"Value\":\"dfsdfgs\"}]','[]','',NULL,1,'2013-04-10 00:22:10','2013-04-10 00:22:10'),
	(63,2,3,NULL,NULL,NULL,NULL,'Blu Emu','data/63/icon.png','data/63/icon@2x.png',NULL,NULL,'#6ed0f7','#4e59a9','#4d58a7',NULL,'Blu Emu','data/63/logo.png','data/63/logo@2x.png','Blu Emu','',NULL,NULL,'data/63/strip.png','data/63/strip@2x.png','[]','[{\"Label\":\"Offer\",\"Value\":\"Save 30% for 3+ nights\"}]','[]',1,'test','[{\"Label\":\"back field key\",\"Value\":\"Back filed value\"}]','[]','',NULL,NULL,'2013-04-16 21:38:06','2013-04-23 08:31:51'),
	(64,2,3,NULL,NULL,NULL,NULL,'Allyson\'s Birthday','data/64/icon.png','data/64/icon@2x.png',NULL,NULL,'#741a6b','#beaf92','#151514',NULL,'Allyson\'s Birthday','data/64/logo.png','data/64/logo@2x.png','John','Doe',NULL,NULL,'data/64/strip.png','data/64/strip@2x.png','[]','[{\"Label\":\"Offer\",\"Value\":\"$3 schooners!\"},{\"Label\":\"abc\",\"Value\":\"def\"}]','[{\"Label\":\"test\",\"Value\":\"test1\"}]',1,'test','[{\"Label\":\"a\",\"Value\":\"b\"},{\"Label\":\"c\",\"Value\":\"d\"},{\"Label\":\"e\",\"Value\":\"f\"}]','[]','',NULL,NULL,'2013-04-16 21:54:31','2013-04-22 17:42:57'),
	(94,2,NULL,NULL,NULL,NULL,NULL,'Test','data/94/icon.png','data/94/icon@2x.png',NULL,NULL,'#0f0711','#ffffff','#ffffff',NULL,'Test','data/94/logo.png','','Test','Test',NULL,NULL,'data/94/strip.png','data/94/strip@2x.png','[{\"Label\":\"Testing\",\"Value\":\"Testing\"}]','[]','[]',1,'','[]','[]','',NULL,NULL,'2013-05-03 14:11:13','2013-05-03 14:11:13'),
	(95,2,NULL,NULL,NULL,NULL,NULL,'test','data/95/icon.png','data/95/icon@2x.png',NULL,NULL,'#5e0e0e','#ffffff','#ffffff',NULL,'test','data/95/logo.png','data/95/logo@2x.png','test','test',NULL,NULL,'data/95/strip.png','data/95/strip@2x.png','[]','[{\"Label\":\"test\",\"Value\":\"test\"}]','[]',1,'test','[{\"Label\":\"test\",\"Value\":\"TEST\"}]','[]','',NULL,NULL,'2013-05-03 20:32:56','2013-05-03 20:32:56'),
	(96,2,NULL,NULL,NULL,NULL,NULL,'test',NULL,NULL,NULL,NULL,'#030303','#ffffff','#ffffff',NULL,'test',NULL,NULL,NULL,NULL,NULL,NULL,'data/96/strip.png','','[]','[]','[]',NULL,NULL,'[]','[]','',NULL,NULL,'2013-05-04 15:20:26','2013-05-04 15:20:26'),
	(97,2,NULL,NULL,NULL,NULL,NULL,'test',NULL,NULL,NULL,NULL,'#0c0c0c','#ffffff','#ffffff',NULL,'test',NULL,NULL,'Flynn Isaac Barlow','',NULL,NULL,'data/97/strip.png','data/97/strip@2x.png','[]','[]','[]',1,'','[{\"Label\":\"When:\",\"Value\":\"21 Lantarra lace\"},{\"Label\":\"Date:\",\"Value\":\"etc\"}]','[]','',NULL,NULL,'2013-05-04 15:22:04','2013-05-04 15:22:04'),
	(98,2,NULL,NULL,NULL,NULL,NULL,'sdfsfds',NULL,NULL,NULL,NULL,'#5e25a9','#cdc0c0','#cdc0c0',NULL,'sdfsdfs',NULL,NULL,'','',NULL,NULL,NULL,NULL,'[]','[{\"Label\":\"tazin\",\"Value\":\"akhter\"}]','[]',1,'aasfasdf','[]','[]','',NULL,NULL,'2013-05-05 10:03:08','2013-05-05 10:03:08'),
	(99,2,6,NULL,NULL,NULL,NULL,'isabella','data/99/icon.png','data/99/icon@2x.png',NULL,NULL,'#2826a4','#5f303e','#5f303e',NULL,'hello','data/99/logo.png','data/99/logo@2x.png','isabella','mermaid',NULL,NULL,'data/99/strip.png','data/99/strip@2x.png','[]','[{\"Label\":\"tazin\",\"Value\":\"akhter\"}]','[]',1,'good morning','[{\"Label\":\"friend\",\"Value\":\"good\"}]','[]','',100,3,'2013-05-05 10:03:32','2013-05-05 10:49:16'),
	(100,2,6,NULL,NULL,NULL,NULL,'abcd','data/100/icon.png','data/100/icon@2x.png',NULL,NULL,'#7a1a7b','#ffffff','#ffffff',NULL,'aaaa','data/100/logo.png','data/100/logo@2x.png','aaa','aaaa',NULL,NULL,'data/100/strip.png','data/100/strip@2x.png','[]','[]','[]',1,'ggggg','[{\"Label\":\"aaaa\",\"Value\":\"ssss\"}]','[]','',NULL,NULL,'2013-05-05 10:59:33','2013-05-05 11:02:10'),
	(101,2,NULL,NULL,NULL,NULL,NULL,'aaaa','data/101/icon.png','data/101/icon@2x.png',NULL,NULL,'#248864','#ffffff','#ffffff',NULL,'sssssssss','data/101/logo.png','data/101/logo@2x.png',NULL,NULL,NULL,NULL,NULL,NULL,'[]','[]','[]',NULL,NULL,'[]','[]','',NULL,NULL,'2013-05-05 11:08:54','2013-05-05 11:08:54'),
	(102,1,NULL,NULL,NULL,NULL,NULL,'asdfas',NULL,NULL,NULL,NULL,'#c81919','#4d4e4f','#4d4e4f',NULL,'dfasfd',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'[]','[]','[]',NULL,NULL,'[]','[]','',NULL,NULL,'2013-05-05 11:20:28','2013-05-05 11:20:28'),
	(103,2,NULL,NULL,NULL,NULL,NULL,'aaaa','data/103/icon.png','data/103/icon@2x.png',NULL,NULL,'#2d833b','#182859','#182859',NULL,'bbb','data/103/logo.png','data/103/logo@2x.png',NULL,NULL,NULL,NULL,NULL,NULL,'[]','[]','[]',NULL,NULL,'[]','[]','',NULL,NULL,'2013-05-05 11:22:09','2013-05-05 11:22:09'),
	(104,2,NULL,NULL,NULL,NULL,NULL,'adfasfa',NULL,NULL,NULL,NULL,'#b37373','#994c4c','#994c4c',NULL,'gdfgdgd',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'[]','[]','[]',NULL,NULL,'[]','[]','',NULL,NULL,'2013-05-05 11:23:23','2013-05-05 11:23:23'),
	(105,2,6,NULL,NULL,NULL,NULL,'aa','data/105/icon.png','data/105/icon@2x.png',NULL,NULL,'#c2169a','#980e30','#980e30',NULL,'bb','data/105/logo.png','data/105/logo@2x.png','cc','dd',NULL,NULL,'data/105/strip.png','data/105/strip@2x.png','[{\"Label\":\"ff\",\"Value\":\"dd\"}]','[{\"Label\":\"dd\",\"Value\":\"hh\"}]','[{\"Label\":\"jj\",\"Value\":\"kk\"}]',1,'jkl','[{\"Label\":\"gg\",\"Value\":\"jjj\"},{\"Label\":\"gg\",\"Value\":\"tt\"},{\"Label\":\"jj\",\"Value\":\"ll\"}]','[]','',NULL,NULL,'2013-05-05 11:27:39','2013-05-05 11:27:39'),
	(106,2,6,NULL,NULL,NULL,NULL,'aa','data/106/icon.png','data/106/icon@2x.png',NULL,NULL,'#217e62','#992389','#992389',NULL,'ss','data/106/logo.png','data/106/logo@2x.png','ff','hh',NULL,NULL,'data/106/strip.png','data/106/strip@2x.png','[{\"Label\":\"yy\",\"Value\":\"ee\"}]','[{\"Label\":\"nn\",\"Value\":\"mm\"}]','[{\"Label\":\"ww\",\"Value\":\"gg\"}]',1,'hello','[{\"Label\":\"gg\",\"Value\":\"hh\"},{\"Label\":\"ee\",\"Value\":\"uu\"},{\"Label\":\"qq\",\"Value\":\"ii\"}]','[]','',NULL,NULL,'2013-05-05 11:34:22','2013-05-05 11:34:22'),
	(107,2,3,NULL,NULL,NULL,NULL,'test','data/107/icon.png','data/107/icon@2x.png',NULL,NULL,'#790505','#070707','#070707',NULL,'test','data/107/logo.png','data/107/logo@2x.png','abc','def',NULL,NULL,'data/107/strip.png','data/107/strip@2x.png','[]','[{\"Label\":\"aaa\",\"Value\":\"bbb\"},{\"Label\":\"cccc\",\"Value\":\"dddd\"}]','[]',1,'test test test','[{\"Label\":\"vvvv\",\"Value\":\"bbbb\"},{\"Label\":\"ggggg\",\"Value\":\"gggg\"}]','[]','',111,8,'2013-05-05 18:50:07','2013-05-05 18:53:21'),
	(108,2,8,NULL,NULL,NULL,NULL,'Fly Digital Pty Ltd','data/108/icon.png','data/108/icon@2x.png',NULL,NULL,'#28b3e4','#ffffff','#ffffff',NULL,'Rydges F&B Offer','data/108/logo.png','data/108/logo@2x.png','Bar Offer','',NULL,NULL,'data/108/strip.png','data/108/strip@2x.png','[]','[{\"Label\":\"OFFER\",\"Value\":\"Buy 1 Cocktail, Get 1 FREE!\"}]','[{\"Label\":\"EXPIRES\",\"Value\":\"31st May 2013\"}]',1,'123456','[{\"Label\":\"Terms & Conditions\",\"Value\":\"Only valid until 31st May 2013\"},{\"Label\":\"Special Opening Offer\",\"Value\":\"Rooms from $205 per night. Check out www.rydges.com for more details\"}]','[]','',2,3,'2013-05-06 18:29:49','2013-05-08 00:11:20'),
	(109,2,NULL,NULL,NULL,NULL,NULL,'Fly Digital','data/109/icon.png','data/109/icon@2x.png',NULL,NULL,'#29b0f9','#ffffff','#ffffff',NULL,'Rydges 2','data/109/logo.png','data/109/logo@2x.png',NULL,NULL,NULL,NULL,NULL,NULL,'[]','[]','[]',NULL,NULL,'[]','[]','',NULL,NULL,'2013-05-06 21:38:40','2013-05-06 21:38:40'),
	(110,2,NULL,NULL,NULL,NULL,NULL,'Fly Digital 3','data/110/icon.png','data/110/icon@2x.png',NULL,NULL,'#00aeed','#ffffff','#ffffff',NULL,'Rydges 3','data/110/logo.png','data/110/logo@2x.png','','',NULL,NULL,'data/110/strip.png','data/110/strip@2x.png','[]','[{\"Label\":\"BAR OFFER\",\"Value\":\"Buy 1 Cocktail, Get 1 Free\"}]','[]',1,'12345678','[{\"Label\":\"Opening Offer\",\"Value\":\"From $205 Per Night. Visit www.rydges.com for more details\"}]','[]','',NULL,NULL,'2013-05-06 21:41:17','2013-05-06 21:41:17'),
	(111,2,NULL,NULL,NULL,NULL,NULL,'Test',NULL,NULL,NULL,NULL,'#373131','#ffffff','#ffffff',NULL,'Test',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'[]','[]','[]',NULL,NULL,'[]','[]','',NULL,NULL,'2013-05-07 13:01:05','2013-05-07 13:01:05'),
	(112,2,NULL,NULL,NULL,NULL,NULL,'Rydges Bankstown','data/112/icon.png','data/112/icon@2x.png',NULL,NULL,'#ffffff','#ffffff','#ffffff',NULL,'Rydges ','data/112/logo.png','data/112/logo@2x.png',NULL,NULL,NULL,NULL,'data/112/strip.png','data/112/strip@2x.png','[]','[]','[]',NULL,NULL,'[]','[]','',NULL,NULL,'2013-05-07 16:22:54','2013-05-07 16:22:54'),
	(113,2,NULL,NULL,NULL,NULL,NULL,'asdfa',NULL,NULL,NULL,NULL,'#830808','#ffffff','#ffffff',NULL,'asdfa',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'[]','[]','[]',NULL,NULL,'[]','[]','',NULL,NULL,'2013-05-07 20:36:28','2013-05-07 20:36:28'),
	(114,2,NULL,NULL,NULL,NULL,NULL,'asdfa',NULL,NULL,NULL,NULL,'#830808','#ffffff','#ffffff',NULL,'asdfa',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'[]','[]','[]',NULL,NULL,'[]','[]','',NULL,NULL,'2013-05-07 20:36:30','2013-05-07 20:36:30'),
	(115,2,NULL,NULL,NULL,NULL,NULL,'fjhff','data/115/icon.png','data/115/icon@2x.png',NULL,NULL,'#690c0c','#ffffff','#ffffff',NULL,'gcgfh','data/115/logo.png','data/115/logo@2x.png','zcZX','ZXc',NULL,NULL,'data/115/strip.png','data/115/strip@2x.png','[]','[{\"Label\":\"vzxvz\",\"Value\":\"xcvz\"},{\"Label\":\"ddd\",\"Value\":\"ddd\"}]','[{\"Label\":\"qq\",\"Value\":\"sfasdfa\"},{\"Label\":\"eee\",\"Value\":\"ddd\"}]',1,'sdfsadf','[{\"Label\":\"asfd\",\"Value\":\"aasdfa\"},{\"Label\":\"asfd\",\"Value\":\"asdfasdfsa\"},{\"Label\":\"asdfsa\",\"Value\":\"asdfasdfa\"}]','[]','',NULL,9,'2013-05-07 20:42:12','2013-05-07 20:42:12'),
	(116,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,1,'2013-05-07 23:50:38','2013-05-07 23:50:38'),
	(117,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,1,'2013-05-07 23:50:38','2013-05-07 23:50:38'),
	(118,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,1,'2013-05-07 23:50:39','2013-05-07 23:50:39'),
	(119,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,1,'2013-05-07 23:50:40','2013-05-07 23:50:40'),
	(120,2,NULL,NULL,NULL,NULL,NULL,'aaa','data/120/icon.png','data/120/icon@2x.png',NULL,NULL,'#2c3177','#f8f5f5','#f8f5f5',NULL,'bbb','data/120/logo.png','data/120/logo@2x.png',NULL,NULL,NULL,NULL,'data/120/strip.png','data/120/strip@2x.png','[]','[]','[]',NULL,NULL,'[]','[]','',NULL,NULL,'2013-05-08 10:44:22','2013-05-08 10:44:22'),
	(121,2,6,NULL,NULL,NULL,NULL,'aaa','data/121/icon.png','data/121/icon@2x.png',NULL,NULL,'#a61313','#ffffff','#ffffff',NULL,'bbb','data/121/logo.png','data/121/logo@2x.png','aaaaaa','fffff',NULL,NULL,'data/121/strip.png','data/121/strip@2x.png','[{\"Label\":\"bbb\",\"Value\":\"ggg\"}]','[{\"Label\":\"ww\",\"Value\":\"tt\"},{\"Label\":\"bb\",\"Value\":\"ee\"}]','[{\"Label\":\"kk\",\"Value\":\"mm\"},{\"Label\":\"ss\",\"Value\":\"nn\"}]',1,'wwwwww','[{\"Label\":\"tt\",\"Value\":\"ww\"},{\"Label\":\"ww\",\"Value\":\"rr\"},{\"Label\":\"yy\",\"Value\":\"wh\"}]','[]','',NULL,NULL,'2013-05-08 10:49:01','2013-05-08 11:22:48'),
	(122,2,NULL,NULL,NULL,NULL,NULL,'Test','data/122/icon.png','data/122/icon@2x.png',NULL,NULL,'#1f1818','#ffffff','#ffffff',NULL,'Test','data/122/logo.png','','Test','Test',NULL,NULL,'data/122/strip.png','data/122/strip@2x.png','[{\"Label\":\"Testing\",\"Value\":\"Testing\"}]','[]','[]',1,'','[]','[]','',NULL,NULL,'2013-05-08 14:07:05','2013-05-08 14:07:05'),
	(123,2,NULL,NULL,NULL,NULL,NULL,'ter',NULL,NULL,NULL,NULL,'#ffffff','#ffffff','#ffffff',NULL,'te',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'[]','[]','[]',NULL,NULL,'[]','[]','',NULL,NULL,'2013-05-08 23:05:15','2013-05-08 23:05:15'),
	(124,2,3,NULL,NULL,NULL,NULL,'dfasdf','data/124/icon.png','data/124/icon@2x.png',NULL,NULL,'#9c1f1f','#ffffff','#ffffff',NULL,'asdfas','data/124/logo.png','data/124/logo@2x.png','asfd','asdfa',NULL,NULL,'data/124/strip.png','data/124/strip@2x.png','[]','[{\"Label\":\"qwerq\",\"Value\":\"qwerq\"}]','[{\"Label\":\"sdfgsfdg\",\"Value\":\"sdfgs\"}]',1,'sdfgdfgs','[{\"Label\":\"ertwrt\",\"Value\":\"wertwert\"},{\"Label\":\"wert\",\"Value\":\"wertw\"}]','[]','',NULL,NULL,'2013-05-09 00:54:00','2013-05-09 01:03:13'),
	(125,2,NULL,NULL,NULL,NULL,NULL,'aaf','data/125/icon.png','data/125/icon@2x.png',NULL,NULL,'#522222','#daafaf','#daafaf',NULL,'ssdfg','data/125/logo.png','data/125/logo@2x.png','dsfsadf','fsdfsd',NULL,NULL,'data/125/strip.png','data/125/strip@2x.png','[]','[{\"Label\":\"sdfas\",\"Value\":\"asdas\"}]','[]',1,'asdDSa','[{\"Label\":\"asfs\",\"Value\":\"vsdfgsd\"}]','[{\"Value\":\"37.3229,-122.0323\"}]','',NULL,NULL,'2013-05-09 22:38:52','2013-05-09 22:38:52');

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `payment` WRITE;
/*!40000 ALTER TABLE `payment` DISABLE KEYS */;

INSERT INTO `payment` (`id`, `pass_id`)
VALUES
	(1,16);

/*!40000 ALTER TABLE `payment` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(8) CHARACTER SET utf8 DEFAULT NULL,
  `first_name` varchar(64) CHARACTER SET utf8 DEFAULT NULL,
  `last_name` varchar(64) DEFAULT NULL,
  `email` varchar(64) CHARACTER SET utf8 DEFAULT NULL,
  `password` varchar(32) CHARACTER SET utf8 DEFAULT NULL,
  `company` varchar(64) CHARACTER SET utf8 DEFAULT NULL,
  `phone` varchar(16) CHARACTER SET utf8 DEFAULT NULL,
  `mobile` varchar(16) DEFAULT NULL,
  `address` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `suburd` varchar(64) DEFAULT NULL,
  `state` varchar(32) CHARACTER SET utf8 DEFAULT NULL,
  `country` varchar(32) CHARACTER SET utf8 DEFAULT NULL,
  `postcode` int(6) DEFAULT NULL,
  `job_description` varchar(128) DEFAULT NULL,
  `comments` varchar(128) DEFAULT NULL,
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

INSERT INTO `users` (`id`, `title`, `first_name`, `last_name`, `email`, `password`, `company`, `phone`, `mobile`, `address`, `suburd`, `state`, `country`, `postcode`, `job_description`, `comments`, `subscription_type`, `payment_token`, `payment_token_status`, `payment_token_date`, `updated`, `created`, `status`)
VALUES
	(3,NULL,'raf',NULL,'raf@yahoo.com','test',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2013-03-29 01:38:39','2013-03-29 01:38:39',1),
	(6,NULL,'cynthia',NULL,'cynthiprio@yahoo.co.uk','mother62','isabella','1234',NULL,'1234',NULL,'nsw','Australia',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2013-05-05 10:35:39','2013-05-05 10:35:39',1),
	(8,NULL,'Stefan',NULL,'stefan@flydigital.com.au','flypass','Fly Digital Pty Ltd','0400130362',NULL,'35 Buckingham Street, Sydney',NULL,'nsw','Australia',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2013-05-06 18:38:58','2013-05-06 18:38:58',1);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

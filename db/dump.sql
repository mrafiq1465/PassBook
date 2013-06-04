# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.6.10)
# Database: passbook
# Generation Time: 2013-06-04 16:18:39 +0000
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
	(1,'Please select','0'),
	(2,'PKBarcodeFormatPDF417','PKBarcodeFormatPDF417'),
	(3,'QR codes','PKBarcodeFormatQR'),
	(4,'Aztec','PKBarcodeFormatAztec');

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

LOCK TABLES `download` WRITE;
/*!40000 ALTER TABLE `download` DISABLE KEYS */;

INSERT INTO `download` (`id`, `pass_id`, `browser_cookie`, `device`, `browser`, `created`)
VALUES
	(14,1,'5185549ae7492','','','2013-05-04 11:34:02'),
	(15,1,'518554ddec7ed','','','2013-05-04 11:35:09'),
	(16,1,'518554edf1423','','','2013-05-04 11:35:25'),
	(17,1,'518555ee471dc','','','2013-05-04 11:39:42'),
	(18,1,'518556373bee8','','','2013-05-04 11:40:55'),
	(19,1,'518556b8290fe','','','2013-05-04 11:43:04'),
	(20,1,'518557ea19d69','','','2013-05-04 11:48:10'),
	(21,67,'51855812364d0','','','2013-05-04 11:48:50'),
	(22,1,'51860141798c1','','','2013-05-04 23:50:41'),
	(23,67,'5186b778ec0afg','','','2013-05-05 12:48:09'),
	(24,67,'5186b7a15b9bc','','','2013-05-05 12:48:49'),
	(25,70,'5189cd0b22e15','','','2013-05-07 20:56:59'),
	(26,70,'5189cd1820c65','','','2013-05-07 20:57:12'),
	(27,115,'5189fc9b0e073','','','2013-05-08 00:19:55'),
	(28,115,'5189fcf24aa2e','','','2013-05-08 00:21:22'),
	(29,50,'518c819430ff7','','','2013-05-09 22:11:48'),
	(30,50,'518c819749ebf','','','2013-05-09 22:11:51'),
	(31,76,'518dbbf8dd498','','','2013-05-10 20:33:12'),
	(32,76,'518dbd893aab2','','','2013-05-10 20:39:53'),
	(33,72,'519c436e8df3b','','','2013-05-21 21:02:54'),
	(34,83,'51a1618a14b5a','','','2013-05-25 18:12:42'),
	(35,83,'51a1618d81a54','','','2013-05-25 18:12:45'),
	(36,89,'51ad85db56e71','','','2013-06-03 23:14:51');

/*!40000 ALTER TABLE `download` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table pass
# ------------------------------------------------------------

DROP TABLE IF EXISTS `pass`;

LOCK TABLES `pass` WRITE;
/*!40000 ALTER TABLE `pass` DISABLE KEYS */;

INSERT INTO `pass` (`id`, `pass_type_id`, `user_id`, `formatVersion`, `uid`, `teamIdentifier`, `passTypeIdentifier`, `organizationName`, `iconImage`, `iconImageRetina`, `backgroundImage`, `backgroundImageRetina`, `backgroundColor`, `foregroundColor`, `labelColor`, `serialNumber`, `description`, `logoImage`, `logoImageRetina`, `logoText`, `headerText`, `thumbnailImage`, `thumbnailImageRetina`, `stripImage`, `stripImageRetina`, `primaryFields`, `secondaryFields`, `auxiliaryFields`, `barcode_format_id`, `barcodeMessage`, `backFields`, `locations`, `relevantDate`, `download_limit`, `download_count`, `created`, `updated`)
VALUES
	(1,1,3,NULL,NULL,NULL,NULL,'adsfasd','data/21/icon.png','data/1/icon@2x.png','data/1/background.png','data/1/background@2x.png','rgb(120,31,120)','rgb(222,185,222)','rgb(26,5,26)',NULL,'fasdfsf','data/1/logo.png','data/1/logo@2x.png','afdsf','adsfadsf','data/1/thumbnail.png','data/1/thumbnail@2x.png',NULL,NULL,'','[{\"Label\":\"dfasdf\",\"Value\":\"123\"}]','[{\"Label\":\"adfadsf\",\"Value\":\"123\"}]',1,NULL,'[]','[{\"Value\":\"12.22,23.00\"}]','',101,8,NULL,'2013-05-04 11:45:55'),
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
	(50,2,3,NULL,NULL,NULL,NULL,'twertw','data/50/icon.png','data/50/icon@2x.png',NULL,NULL,'#8e1b1b','#ffffff','#ffffff',NULL,'sadgsdfg','data/50/logo.png','data/50/logo@2x.png','dfgsdf','sdfgsdfg',NULL,NULL,'data/50/strip.png','data/50/strip@2x.png','[]','[{\"Label\":\"bbb\",\"Value\":\"ccc\"}]','[]',1,'sfsfs','[{\"Label\":\"sdfs\",\"Value\":\"sfs\"}]','[]','',448,2,'2013-04-18 00:20:25','2013-05-02 03:34:30'),
	(51,2,NULL,NULL,NULL,NULL,NULL,'test',NULL,NULL,NULL,NULL,'#0f0c4d','#ffffff','#ffffff',NULL,'test','data/51/logo.png','data/51/logo@2x.png','asdfasd','asdfasdf',NULL,NULL,'data/51/strip.png','data/51/strip@2x.png','[]','[]','[]',NULL,NULL,'[]','[]','',NULL,NULL,'2013-04-19 09:42:49','2013-04-19 09:42:49'),
	(52,2,3,NULL,NULL,NULL,NULL,'test','data/52/icon.png','data/52/icon@2x.png',NULL,NULL,'#40449e','#e4d8d8','#bb0404',NULL,'test','data/52/logo.png','data/52/logo@2x.png','Budget Airport','bluemu',NULL,NULL,'data/52/strip.png','data/52/strip@2x.png','[]','[{\"Label\":\"value\",\"Value\":\"30% off on sunday\"},{\"Label\":\"abc\",\"Value\":\"def\"}]','[]',2,'afasdfasdf','[{\"Label\":\"test1\",\"Value\":\"test2\"},{\"Label\":\"test3\",\"Value\":\"test4\"},{\"Label\":\"asdfasdfas\",\"Value\":\"asdfasdfa\"}]','[]','',122,NULL,'2013-04-20 23:10:29','2013-04-27 20:48:19'),
	(53,2,21,NULL,NULL,NULL,NULL,'zfgsdgf','data/53/icon.png','data/53/icon@2x.png',NULL,NULL,'#4c4399','#ffffff','#ffffff',NULL,'xsdgsd','data/53/logo.png','data/53/logo@2x.png','sfgsgdfs','sdfgsdgfs',NULL,NULL,'data/53/strip.png','data/53/strip@2x.png','[]','[{\"Label\":\"dafgsd\",\"Value\":\"cxdfghd\"}]','[]',2,'sfgsdgf','[{\"Label\":\"sdfg\",\"Value\":\"sfasda\"},{\"Label\":\"asdfa\",\"Value\":\"fsdgsdfg\"}]','[]','',NULL,NULL,'2013-04-22 23:23:30','2013-04-22 23:25:34'),
	(54,2,NULL,NULL,NULL,NULL,NULL,'asdfsa',NULL,NULL,NULL,NULL,'#222374','#ee0101','#ee0101',NULL,'sadfads',NULL,'data/54/logo@2x.png',NULL,NULL,NULL,NULL,NULL,'data/54/strip@2x.png','[]','[]','[]',NULL,NULL,'[]','[]','',NULL,NULL,'2013-04-26 21:07:30','2013-04-26 21:07:30'),
	(55,2,3,NULL,NULL,NULL,NULL,'test',NULL,NULL,NULL,NULL,'#387483','#ffffff','#ffffff',NULL,'test',NULL,'data/55/logo@2x.png','asdfa','asdfa',NULL,NULL,NULL,'data/55/strip@2x.png','[]','[{\"Label\":\"adfas\",\"Value\":\"asfdasd\"}]','[]',4,'asdfasfd','[{\"Label\":\"asfdas\",\"Value\":\"dfasfd\"},{\"Label\":\"asfasdfa\",\"Value\":\"sfasdfa\"}]','[]','',NULL,NULL,'2013-04-27 14:11:58','2013-04-27 14:14:46'),
	(56,2,NULL,NULL,NULL,NULL,NULL,'asfasdf','data/53/icon.png','data/53/icon@2x.png',NULL,NULL,'#292879','#ffffff','#ffffff',NULL,'asdfa','data/53/logo.png','data/56/logo@2x.png','asdfa','asdfa',NULL,NULL,'data/53/strip.png','data/56/strip@2x.png','[]','[{\"Label\":\"asdfa\",\"Value\":\"sadfasdfafasd\"}]','[]',2,'asdfasdf','[{\"Label\":\"asdf\",\"Value\":\"asdfa\"}]','[]','',NULL,NULL,'2013-04-27 14:16:04','2013-04-27 14:16:04'),
	(57,2,NULL,NULL,NULL,NULL,NULL,'afdas',NULL,NULL,NULL,NULL,'#ffffff','#ffffff','#ffffff',NULL,'asdfas',NULL,'data/57/logo@2x.png',NULL,NULL,NULL,NULL,NULL,NULL,'[]','[]','[]',NULL,NULL,'[]','[]','',NULL,NULL,'2013-04-27 19:25:42','2013-04-27 19:25:42'),
	(58,2,NULL,NULL,NULL,NULL,NULL,'sdfasd',NULL,'data/58/icon@2x.png',NULL,NULL,'#ffffff','#ffffff','#ffffff',NULL,'asdfa',NULL,'data/58/logo@2x.png',NULL,NULL,NULL,NULL,NULL,NULL,'[]','[]','[]',NULL,NULL,'[]','[]','',NULL,NULL,'2013-04-27 19:28:18','2013-04-27 19:28:18'),
	(59,2,NULL,NULL,NULL,NULL,NULL,'asdfsa','data/59/icon.png','data/59/icon@2x.png',NULL,NULL,'#ffffff','#ffffff','#ffffff',NULL,'asdfas','data/59/logo.png','data/59/logo@2x.png',NULL,NULL,NULL,NULL,NULL,NULL,'[]','[]','[]',NULL,NULL,'[]','[]','',NULL,NULL,'2013-04-27 19:40:28','2013-04-27 19:40:28'),
	(60,2,NULL,NULL,NULL,NULL,NULL,'asdadsf','data/21/icon.png','data/60/icon@2x.png',NULL,NULL,'#4941bb','#732020','#732020',NULL,'asdfas','data/21/logo.png','data/60/logo@2x.png','asdf','asfa',NULL,NULL,'data/21/strip.png','data/60/strip@2x.png','[]','[{\"Label\":\"asdf\",\"Value\":\"sadf\"}]','[]',2,'sdfasdfa','[{\"Label\":\"asdfaa\",\"Value\":\"asdf\"}]','[]','',NULL,NULL,'2013-04-27 19:45:41','2013-04-27 19:45:41'),
	(61,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,'2013-04-27 22:15:26','2013-04-27 22:15:26'),
	(62,2,NULL,NULL,NULL,NULL,NULL,'asdfas',NULL,NULL,NULL,NULL,'#543b3b','#ffffff','#ffffff',NULL,'asdfa',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'[]','[]','[]',NULL,NULL,'[]','[]','',NULL,NULL,'2013-04-28 18:42:02','2013-04-28 18:42:02'),
	(63,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,'2013-05-02 03:20:18','2013-05-02 03:20:18'),
	(64,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,'2013-05-02 03:20:28','2013-05-02 03:20:28'),
	(65,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,'2013-05-02 03:20:43','2013-05-02 03:20:43'),
	(66,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,'2013-05-02 03:23:00','2013-05-02 03:23:00'),
	(67,2,NULL,NULL,NULL,NULL,NULL,'test','data/67/icon.png','data/67/icon@2x.png',NULL,NULL,'#5f1818','#ffffff','#ffffff',NULL,'test','data/67/logo.png','data/67/logo@2x.png','asdfa','asdfa',NULL,NULL,'data/67/strip.png','data/67/strip@2x.png','[{\"Label\":\"asdf\",\"Value\":\"asdf\"}]','[{\"Label\":\"asdf\",\"Value\":\"asdf\"}]','[]',2,'zvzxcvz','[{\"Label\":\"zvzxc\",\"Value\":\"zxcvzxcv\"}]','[]','',NULL,3,'2013-05-02 12:44:37','2013-05-02 12:44:37'),
	(68,2,NULL,NULL,NULL,NULL,NULL,'test','data/68/icon.png','data/68/icon@2x.png',NULL,NULL,'#132f6b','#ffffff','#ffffff',NULL,'test','data/68/logo.png','data/68/logo@2x.png','asdfs','asdfsa',NULL,NULL,'data/68/strip.png','data/68/strip@2x.png','[]','[{\"Label\":\"asdfasdf\",\"Value\":\"asdfasdfa\"}]','[]',2,'asdfasdf','[{\"Label\":\"asdfas\",\"Value\":\"sdfgsdfg\"}]','[]','',NULL,NULL,'2013-05-02 18:45:56','2013-05-02 18:45:56'),
	(69,2,NULL,NULL,NULL,NULL,NULL,'zxcvzcv',NULL,NULL,NULL,NULL,'#963232','#ffffff','#ffffff',NULL,'zxcvzxcv',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'[]','[]','[]',NULL,NULL,'[]','[]','',NULL,NULL,'2013-05-05 20:03:00','2013-05-05 20:03:00'),
	(70,2,3,NULL,NULL,NULL,NULL,'asdfaas','data/70/icon.png','data/70/icon@2x.png',NULL,NULL,'#131111','#ffffff','#ffffff',NULL,'asdfa','data/70/logo.png','data/70/logo@2x.png',NULL,NULL,NULL,NULL,'data/70/strip.png','data/70/strip@2x.png','[]','[]','[]',NULL,NULL,'[]','[]','',NULL,2,'2013-05-07 20:53:00','2013-05-07 20:55:37'),
	(71,2,3,NULL,NULL,NULL,NULL,'zcasfasdf','data/71/icon.png','data/71/icon@2x.png',NULL,NULL,'#5e1b1b','#ffffff','#ffffff',NULL,'asdfa','data/71/logo.png','data/71/logo@2x.png','sdfgsdgf','sdfgsdfgs',NULL,NULL,'data/71/strip.png','data/71/strip@2x.png','[]','[{\"Label\":\"sdfgs\",\"Value\":\"sdfgsgf\"},{\"Label\":\"rweq\",\"Value\":\"qwerq\"}]','[]',2,'fasdfa','[{\"Label\":\"asdfa\",\"Value\":\"asdfasd\"}]','[]','',NULL,NULL,'2013-05-07 21:58:15','2013-05-07 21:58:15'),
	(72,2,3,NULL,NULL,NULL,NULL,'fdsfgs','data/72/icon.png','data/72/icon@2x.png',NULL,NULL,'#732121','#ffffff','#ffffff',NULL,'sdfgs','data/72/logo.png','data/72/logo@2x.png',NULL,NULL,NULL,NULL,'data/72/strip.png','data/72/strip@2x.png','[]','[]','[]',NULL,NULL,'[]','[]','',NULL,1,'2013-05-07 23:23:02','2013-05-07 23:23:02'),
	(73,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,1,'2013-05-08 00:19:55','2013-05-08 00:19:55'),
	(74,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,1,'2013-05-08 00:21:22','2013-05-08 00:21:22'),
	(75,2,3,NULL,NULL,NULL,NULL,'dsfsdf',NULL,NULL,NULL,NULL,'#c71010','#090707','#090707',NULL,'sdfsdfs',NULL,NULL,'','',NULL,NULL,NULL,NULL,'[]','[{\"Label\":\"sdfsdf\",\"Value\":\"sdfsd\"},{\"Label\":\"asfas\",\"Value\":\"asdfasfd\"}]','[]',2,'hkjhk','[]','[{\"Value\":\"37.3229,-122.0323\"},{\"Value\":\"37.3229,-122.0323\"}]','',NULL,NULL,'2013-05-09 22:13:20','2013-05-09 22:13:20'),
	(76,2,NULL,NULL,NULL,NULL,NULL,'asdaf',NULL,NULL,NULL,NULL,'#ffffff','#ffffff','#ffffff',NULL,'asdfa',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'[]','[]','[]',NULL,NULL,'[]','[]','',10,10,'2013-05-09 23:51:28','2013-05-09 23:51:28'),
	(77,2,22,NULL,NULL,NULL,NULL,'sgdfg',NULL,NULL,NULL,NULL,'#ffffff','#ffffff','#ffffff',NULL,'sdgfs',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'[]','[]','[]',NULL,NULL,'[]','[]','',NULL,NULL,'2013-05-10 21:21:52','2013-05-10 21:22:47'),
	(78,2,NULL,NULL,NULL,NULL,NULL,'asdfasdf',NULL,NULL,NULL,NULL,'#ffffff','#ffffff','#ffffff',NULL,'asdfasd',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'[]','[]','[]',NULL,NULL,'[]','[]','',NULL,NULL,'2013-05-10 23:20:05','2013-05-10 23:20:05'),
	(79,2,3,NULL,NULL,NULL,NULL,'test',NULL,NULL,NULL,NULL,'#b38f8f','#ffffff','#ffffff',NULL,'test',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'[]','[]','[]',NULL,NULL,'[]','[]','',NULL,NULL,'2013-05-19 18:09:35','2013-05-19 18:09:45'),
	(80,2,NULL,NULL,NULL,NULL,NULL,'gjhgjh',NULL,NULL,NULL,NULL,'#d31e1e','#f7f7f7','#f7f7f7',NULL,'vjhgjhfhgf',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'[]','[]','[]',NULL,NULL,'[]','[]','',NULL,NULL,'2013-05-23 00:35:05','2013-05-23 00:35:05'),
	(81,2,NULL,NULL,NULL,NULL,NULL,'gjhgjh',NULL,NULL,NULL,NULL,'#d31e1e','#f7f7f7','#f7f7f7',NULL,'vjhgjhfhgf',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'[]','[]','[]',NULL,NULL,'[]','[]','',NULL,NULL,'2013-05-23 00:35:05','2013-05-23 00:35:05'),
	(82,2,3,NULL,NULL,NULL,NULL,'test','data/82/icon.png','data/82/icon@2x.png',NULL,NULL,'#582424','#ffffff','#ffffff',NULL,'test','data/82/logo.png','data/82/logo@2x.png','aasdf','asdf',NULL,NULL,'data/82/strip.png','data/82/strip@2x.png','[]','[{\"Label\":\"asdf\",\"Value\":\"asdf\"}]','[]',2,'asdfasdfa','[{\"Label\":\"asdf\",\"Value\":\"asdfa\"}]','[{\"Value\":\"222,-888\"}]','',233,NULL,'2013-05-25 17:44:56','2013-05-25 18:09:07'),
	(83,2,3,NULL,NULL,NULL,NULL,'asdfa','data/83/icon.png','data/83/icon@2x.png',NULL,NULL,'#723131','#ffffff','#ffffff',NULL,'sdfafa','data/83/logo.png','data/83/logo@2x.png','','',NULL,NULL,'data/83/strip.png','data/83/strip@2x.png','[]','[]','[]',2,'asdfasd','[{\"Label\":\"asdfa\",\"Value\":\"asdfa\"}]','[]','',NULL,2,'2013-05-25 18:10:15','2013-05-25 18:11:03'),
	(84,2,3,NULL,NULL,NULL,NULL,'sd',NULL,NULL,NULL,NULL,'#e90000','#ffffff','#ffffff',NULL,'XZvXV',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'[]','[]','[]',NULL,NULL,'[]','[]','',NULL,NULL,'2013-06-01 11:56:53','2013-06-02 14:57:04'),
	(85,2,23,NULL,NULL,NULL,NULL,'test',NULL,NULL,NULL,NULL,'#e90000','#ffffff','#ffffff',NULL,'etst',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'[]','[]','[]',NULL,NULL,'[]','[]','',NULL,NULL,'2013-06-03 21:48:20','2013-06-03 21:49:41'),
	(86,2,23,NULL,NULL,NULL,NULL,'sfgsdfg',NULL,NULL,NULL,NULL,'#e90000','#ffffff','#ffffff',NULL,'sgsdfg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'[]','[]','[]',NULL,NULL,'[]','[]','',NULL,NULL,'2013-06-03 22:31:19','2013-06-03 22:31:19'),
	(87,2,25,NULL,NULL,NULL,NULL,'test',NULL,NULL,NULL,NULL,'#e90000','#ffffff','#ffffff',NULL,'test',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'[]','[]','[]',NULL,NULL,'[]','[]','',NULL,NULL,'2013-06-03 22:45:58','2013-06-03 22:47:41'),
	(88,2,25,NULL,NULL,NULL,NULL,'asdfas',NULL,NULL,NULL,NULL,'#e90000','#ffffff','#ffffff',NULL,'asdfa',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'[]','[]','[]',NULL,NULL,'[]','[]','',NULL,NULL,'2013-06-03 23:01:17','2013-06-03 23:01:17'),
	(89,2,NULL,NULL,NULL,NULL,NULL,'fasf',NULL,NULL,NULL,NULL,'#e90000','#ffffff','#ffffff',NULL,'asdfa',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'[]','[]','[]',NULL,NULL,'[]','[]','',NULL,1,'2013-06-03 23:11:28','2013-06-03 23:11:28');

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

LOCK TABLES `payment` WRITE;
/*!40000 ALTER TABLE `payment` DISABLE KEYS */;

INSERT INTO `payment` (`id`, `pass_id`, `InvoiceNumber`, `InvoiceReference`, `TotalAmount`, `TransactionID`, `TransactionStatus`, `PaymentDate`)
VALUES
	(1,16,NULL,NULL,NULL,NULL,NULL,NULL),
	(2,46,NULL,NULL,NULL,NULL,NULL,NULL);

/*!40000 ALTER TABLE `payment` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `title`, `first_name`, `last_name`, `email`, `password`, `company`, `phone`, `mobile`, `address`, `suburb`, `state`, `country`, `postcode`, `job_description`, `comments`, `subscription_type`, `AccessCode`, `AuthorisationCode`, `ResponseCode`, `ResponseMessage`, `TokenCustomerID`, `PaymentDate`, `updated`, `created`, `status`)
VALUES
	(1,NULL,'admin',NULL,'what@yahoo.com','sdaf',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2013-03-28 02:00:14','2013-03-28 02:00:14',1),
	(2,NULL,'asdfasdf',NULL,'asdf','sdaf',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2013-03-28 02:02:44','2013-03-28 02:02:44',1),
	(3,NULL,'ra',NULL,'raf@yahoo.com','test',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'123456',NULL,NULL,NULL,NULL,NULL,'2013-03-29 01:38:39','2013-03-29 01:38:39',1),
	(4,NULL,'asasdfas',NULL,'asdfasf@yahoo.com','asdf','asfasdfa','sdfafdsa',NULL,'asfasfasdfasfd',NULL,'Australia',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2013-04-13 17:01:26','2013-04-13 17:01:26',1),
	(5,NULL,'name',NULL,'email@yahoo.com','pass','fly','1234',NULL,'adress',NULL,'nsw','Australia',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2013-04-13 17:24:10','2013-04-13 17:24:10',1),
	(6,NULL,'fasfas',NULL,'asdf3333asf@yahoo.com','asd','company','13213',NULL,'123123',NULL,'nsw','Australia',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2013-04-13 17:28:45','2013-04-13 17:28:45',1),
	(7,NULL,'asfasdf',NULL,'sadfadfa@yahoo.com','asd','ffdsgs','wrwerw',NULL,'sfas',NULL,'nsw','Australia',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2013-04-13 17:40:57','2013-04-13 17:40:57',1),
	(8,NULL,'afasdf',NULL,'asdfas@yahoo.com','qwe','asfsad','12312',NULL,'dsgfsdgfsd',NULL,'nsw','Australia',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2013-04-13 17:46:51','2013-04-13 17:46:51',1),
	(9,NULL,'dfadfs',NULL,'sdfs@yahoo.com','aa','fasfda','1231231',NULL,'sfasdfa',NULL,'nsw','Australia',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2013-04-13 17:48:36','2013-04-13 17:48:36',1),
	(10,NULL,'asfdasdf',NULL,'asdfasdfasf@yahoo.com','aa','fasdfa','asadf',NULL,'13131',NULL,'nsw','Australia',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2013-04-13 19:21:32','2013-04-13 19:21:32',1),
	(11,NULL,'asdfa',NULL,'asdfa@yahoo.com','1234','sdfgs','sdfgs',NULL,'sdfgs',NULL,'nsw','Australia',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2013-04-13 21:19:54','2013-04-13 21:19:54',1),
	(12,NULL,'sdfgsd',NULL,'sdfg@yahoo.com','123','asdfas','asdfa',NULL,'fasfa',NULL,'nsw','Australia',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2013-04-13 22:02:01','2013-04-13 22:02:01',1),
	(13,NULL,'raf',NULL,'ee@yahoo.com','123','sdfgs','23423',NULL,'asasdfa',NULL,'nsw','Australia',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2013-04-13 22:13:58','2013-04-13 22:13:58',1),
	(14,NULL,'1234',NULL,'1234@yahoo.com','1234','1234','1234',NULL,'1234',NULL,'nsw','Australia',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2013-04-13 22:16:02','2013-04-13 22:16:02',1),
	(15,NULL,'vvxvcx',NULL,'222@yahoo.com','222','asdf','sadfas',NULL,'afdasd',NULL,'nsw','Australia',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2013-04-13 22:19:04','2013-04-13 22:19:04',1),
	(16,NULL,'ffff',NULL,'wwww','1','ddd','222',NULL,'dfdfg',NULL,'nsw','Australia',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2013-04-13 23:18:54','2013-04-13 23:18:54',1),
	(17,NULL,'adfa',NULL,'rrr@yahoo.com','1','1','1',NULL,'1',NULL,'nsw','Australia',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2013-04-14 00:15:26','2013-04-14 00:15:26',1),
	(18,NULL,'test',NULL,'test@yahoo.com','test','test','test',NULL,'test',NULL,'vic','New Zealand',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2013-04-14 00:50:24','2013-04-14 00:50:24',1),
	(19,NULL,'a',NULL,'b@yahoo.com','b','b','b',NULL,'d',NULL,'nsw','Australia',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2013-04-14 01:49:57','2013-04-14 01:49:57',1),
	(20,NULL,'dfa',NULL,'asdf@yahooc.om','12','asdfa','asdf',NULL,'asdfas',NULL,'nsw','Australia',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2013-04-14 01:54:49','2013-04-14 01:54:49',1),
	(21,NULL,'Rafiqul islam',NULL,'testrrrr@yahoo.com','test','test','2342423',NULL,'wtwert',NULL,'qld','New Zealand',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2013-04-22 23:25:34','2013-04-22 23:25:34',1),
	(22,'Mr.','asfda','sfda','44444a@yahoo.com','1234','asdfa','242342','23423','23423',NULL,'NSW','AU',3333,'23423',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2013-05-10 21:22:47','2013-05-10 21:22:47',1),
	(23,'Mr.','Raf','Islam','raf@flydigital.com.au','test1234','Flydigita','0433253432','0433253432','sydney','sydney','NSW','AU',3168,'test',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2013-06-03 21:49:41','2013-06-03 21:49:41',1),
	(24,'Mrs.','aniqa','shama','shama@yahoo.com','test1234','asdfas','24234234','23423423','asdfa','asdf','WA','AU',324234,'23423',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2013-06-03 22:46:44','2013-06-03 22:46:44',1),
	(25,'Mrs.','aniqa','shama','shama222@yahoo.com','test1234','asdfas','24234234','23423423','asdfa','asdf','WA','AU',324234,'23423',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2013-06-03 22:47:41','2013-06-03 22:47:41',1);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

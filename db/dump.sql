-- MySQL dump 10.13  Distrib 5.5.19, for Linux (i686)
--
-- Host: localhost    Database: passbook
-- ------------------------------------------------------
-- Server version	5.5.19

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `barcode_format`
--

DROP TABLE IF EXISTS `barcode_format`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `barcode_format` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `barcode_format`
--

LOCK TABLES `barcode_format` WRITE;
/*!40000 ALTER TABLE `barcode_format` DISABLE KEYS */;
INSERT INTO `barcode_format` VALUES (1,'PKBarcodeFormatPDF417','PKBarcodeFormatPDF417'),(2,'QR codes','PKBarcodeFormatQR'),(3,'Aztec','PKBarcodeFormatAztec');
/*!40000 ALTER TABLE `barcode_format` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `barcode_message_encoding`
--

DROP TABLE IF EXISTS `barcode_message_encoding`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `barcode_message_encoding` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `barcode_format_id` int(11) NOT NULL,
  `name` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `barcode_message_encoding`
--

LOCK TABLES `barcode_message_encoding` WRITE;
/*!40000 ALTER TABLE `barcode_message_encoding` DISABLE KEYS */;
INSERT INTO `barcode_message_encoding` VALUES (1,1,'iso-8859-1');
/*!40000 ALTER TABLE `barcode_message_encoding` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `download`
--

DROP TABLE IF EXISTS `download`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `download` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pass_id` int(11) NOT NULL,
  `uid` varchar(256) NOT NULL DEFAULT '',
  `device` varchar(32) NOT NULL DEFAULT '',
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `download`
--

LOCK TABLES `download` WRITE;
/*!40000 ALTER TABLE `download` DISABLE KEYS */;
/*!40000 ALTER TABLE `download` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pass`
--

DROP TABLE IF EXISTS `pass`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pass`
--

LOCK TABLES `pass` WRITE;
/*!40000 ALTER TABLE `pass` DISABLE KEYS */;
INSERT INTO `pass` VALUES (1,1,NULL,NULL,NULL,NULL,NULL,'adsfasd','data/1/icon.png','data/1/icon@2x.png','data/1/background.png','data/1/background@2x.png','rgb(120,31,120)','rgb(222,185,222)','rgb(26,5,26)',NULL,'fasdfsf','data/1/logo.png','data/1/logo@2x.png','afdsf','adsfadsf','data/1/thumbnail.png','data/1/thumbnail@2x.png',NULL,NULL,'','[{\"Label\":\"dfasdf\",\"Value\":\"123\"}]','[{\"Label\":\"adfadsf\",\"Value\":\"123\"}]',1,NULL,'[]','[{\"Value\":\"12.22,23.00\"}]','',NULL,NULL,NULL,NULL),(2,1,NULL,NULL,NULL,NULL,NULL,'sdfasdf',NULL,'',NULL,NULL,'rgb(184,66,184)','rgb(84,36,84)','rgb(189,147,189)',NULL,'asdfdas',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL),(3,1,NULL,NULL,NULL,NULL,NULL,'adfsfas','data/3/iconImage.png','data/3/iconImageRetina.png','data/3/backgroundImage.png','data/3/backgroundImageRetina.png',NULL,NULL,NULL,NULL,'fdasfadsf',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL),(4,2,NULL,NULL,NULL,NULL,NULL,'adfasdfa','data/4/icon.png','data/4/icon@2x.png',NULL,NULL,'rgb(138,45,138)','rgb(214,32,214)','rgb(64,184,126)',NULL,'afasdf','data/4/logo.png','data/4/logo@2x.png','adfasdf','afdsfa','data/4/thumbnail.png','data/4/thumbnail@2x.png',NULL,NULL,'[{\"Label\":\"asdfasdfasasd\",\"Value\":\"12112\"}]','[]','[]',1,NULL,'[]','[]','',NULL,NULL,NULL,NULL),(5,2,NULL,NULL,NULL,NULL,NULL,'sadf',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'asdf',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL),(6,2,NULL,NULL,NULL,NULL,NULL,'zxcvz',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'zv',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL),(7,2,NULL,NULL,NULL,NULL,NULL,'test','data/7/icon.png','data/7/icon@2x.png',NULL,NULL,'rgb(79,24,79)','rgb(51,19,51)','rgb(64,42,64)',NULL,'test','data/7/logo.png','data/7/logo@2x.png','dfasf','asdfa','data/7/thumbnail.png','data/7/thumbnail@2x.png',NULL,NULL,'[{\"Label\":\"asdf\",\"Value\":\"sdbssdfgsdfg\"}]','[{\"Label\":\"asfdasd\",\"Value\":\"asdfadfsa\"}]','[{\"Label\":\"asdfad\",\"Value\":\"asdfas\"}]',1,'test barcode','[{\"Label\":\"asdfas\",\"Value\":\"asdfasdf\"}]','[]','',NULL,NULL,NULL,NULL),(8,2,NULL,NULL,NULL,NULL,NULL,'as',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'asdf',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL),(9,2,NULL,NULL,NULL,NULL,NULL,'sadfas',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'asfd',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL),(10,2,NULL,NULL,NULL,NULL,NULL,'aaa',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'aaa',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL),(11,2,NULL,NULL,NULL,NULL,NULL,'Stef test',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Test',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL),(12,2,NULL,NULL,NULL,NULL,NULL,'test','data/12/icon.png',NULL,NULL,NULL,'rgb(0,0,0)','','',NULL,'test',NULL,NULL,'tets','test',NULL,'data/12/thumbnail@2x.png',NULL,NULL,'[]','[]','[]',1,'','[]','[]','',NULL,NULL,NULL,NULL),(13,2,NULL,NULL,NULL,NULL,NULL,'test','data/13/icon.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'test',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL),(14,2,NULL,NULL,NULL,NULL,NULL,'test',NULL,NULL,NULL,NULL,'rgb(0,0,0)','rgb(0,0,0)','rgb(0,0,0)',NULL,'teset',NULL,NULL,'hello','how are you',NULL,NULL,NULL,NULL,'[]','[]','[]',1,'scan me',NULL,NULL,'',NULL,NULL,NULL,NULL),(15,2,1,NULL,NULL,NULL,NULL,'adfadsfasdf',NULL,NULL,NULL,NULL,'rgb(125,62,125)','rgb(158,35,158)','rgb(207,37,207)',NULL,'afasdf',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,'2013-03-31 22:49:48','2013-03-31 22:49:48'),(16,2,NULL,NULL,NULL,NULL,NULL,'Orgname',NULL,NULL,NULL,NULL,'rgb(176,35,176)','rgb(184,24,184)','rgb(168,45,168)',NULL,'adsfsd','data/16/logo.png','data/16/logo@2x.png','sdsssssss','afdsfa',NULL,NULL,'data/16/strip.png','data/16/strip@2x.png','[{\"Label\":\"asdfasdfasasd\",\"Value\":\"12112\"}]','[{\"Label\":\"adsfasfas\",\"Value\":\"dfasfdsfs\"}]','[{\"Label\":\"adfadsf\",\"Value\":\"123\"}]',1,'sasdsad','[{\"Label\":\"adsfadsf\",\"Value\":\"2323\"}]','[]','',NULL,NULL,'2013-04-01 07:37:47','2013-04-01 07:37:47');
/*!40000 ALTER TABLE `pass` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pass_type`
--

DROP TABLE IF EXISTS `pass_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pass_type` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `active` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pass_type`
--

LOCK TABLES `pass_type` WRITE;
/*!40000 ALTER TABLE `pass_type` DISABLE KEYS */;
INSERT INTO `pass_type` VALUES (1,'event',NULL),(2,'coupon',NULL),(3,'transport',NULL),(4,'store',NULL),(5,'generic',NULL);
/*!40000 ALTER TABLE `pass_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payment` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pass_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment`
--

LOCK TABLES `payment` WRITE;
/*!40000 ALTER TABLE `payment` DISABLE KEYS */;
INSERT INTO `payment` VALUES (1,16);
/*!40000 ALTER TABLE `payment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','what@yahoo.com','sdaf',NULL,NULL,NULL,NULL,NULL,NULL,'2013-03-28 02:00:14','2013-03-28 02:00:14',1),(2,'asdfasdf','asdf','sdaf',NULL,NULL,NULL,NULL,NULL,NULL,'2013-03-28 02:02:44','2013-03-28 02:02:44',1),(3,'ra','raf@yahoo.com','test',NULL,NULL,NULL,NULL,NULL,NULL,'2013-03-29 01:38:39','2013-03-29 01:38:39',1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-04-03 12:27:46

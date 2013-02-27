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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `barcode_format`
--

LOCK TABLES `barcode_format` WRITE;
/*!40000 ALTER TABLE `barcode_format` DISABLE KEYS */;
INSERT INTO `barcode_format` VALUES (1,'PKBarcodeFormatPDF417'),(2,'QR codes'),(3,'Aztec');
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
-- Table structure for table `pass`
--

DROP TABLE IF EXISTS `pass`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pass` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pass_type_id` int(11) DEFAULT NULL,
  `formatVersion` tinyint(1) DEFAULT NULL,
  `uid` varchar(32) DEFAULT NULL,
  `teamIdentifier` varchar(16) DEFAULT NULL,
  `passTypeIdentifier` varchar(64) DEFAULT NULL,
  `organizationName` varchar(64) DEFAULT NULL,
  `iconImage` text,
  `iconImageRetina` text,
  `backgroundImage` text,
  `backgroundImageRetina` text,
  `backgroundColor` varchar(32) DEFAULT NULL,
  `foregroundColor` varchar(32) DEFAULT NULL,
  `labelColor` varchar(32) DEFAULT NULL,
  `serialNumber` varchar(32) DEFAULT NULL,
  `description` varchar(64) DEFAULT NULL,
  `logoImage` text,
  `logoImageRetina` text,
  `logoText` varchar(100) DEFAULT NULL,
  `headerText` varchar(100) DEFAULT NULL,
  `thumbnailImage` text,
  `thumbnailImageRetina` text,
  `stripImage` text,
  `stripImageRetina` text,
  `primaryFields` text,
  `secondaryFields` text,
  `auxiliaryFields` text,
  `barcode_format_id` int(11) DEFAULT NULL,
  `backFields` text,
  `locations` text,
  `relevantDate` varchar(100) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pass`
--

LOCK TABLES `pass` WRITE;
/*!40000 ALTER TABLE `pass` DISABLE KEYS */;
INSERT INTO `pass` VALUES (1,NULL,NULL,NULL,NULL,NULL,'adsfasd','data/1/iconImage.png','','','data/1/backgroundImageRetina.png','rgb(120,31,120)','rgb(222,185,222)','rgb(26,5,26)',NULL,'fasdfsf','data/1/logoImage.png','data/1/logoImageRetina.png','afdsf','adsfadsf','','data/1/thumbnailImageRetina.png',NULL,NULL,'','[{\"Label\":\"adsfasfas\",\"Value\":\"dfasfdsfs\"}]','[{\"Label\":\"sdasdas\",\"Value\":\"dasd\"}]',1,'[{\"Label\":\"sdfds\",\"Value\":\"fdsf\"}]','[{\"Value\":\"34,34\"}]',''),(2,1,NULL,NULL,NULL,NULL,'sdfasdf',NULL,'',NULL,NULL,'rgb(184,66,184)','rgb(84,36,84)','rgb(189,147,189)',NULL,'asdfdas',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,''),(3,1,NULL,NULL,NULL,NULL,'adfsfas','data/3/iconImage.png','data/3/iconImageRetina.png','data/3/backgroundImage.png','data/3/backgroundImageRetina.png',NULL,NULL,NULL,NULL,'fdasfadsf',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'');
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
  `name` varchar(32) NOT NULL DEFAULT '',
  `active` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pass_type`
--

LOCK TABLES `pass_type` WRITE;
/*!40000 ALTER TABLE `pass_type` DISABLE KEYS */;
/*!40000 ALTER TABLE `pass_type` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-02-28  0:52:49

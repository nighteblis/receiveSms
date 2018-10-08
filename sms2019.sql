CREATE DATABASE  IF NOT EXISTS `sms` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `sms`;
-- MySQL dump 10.13  Distrib 5.7.23, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: sms
-- ------------------------------------------------------
-- Server version	5.7.23-0ubuntu0.16.04.1

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
-- Table structure for table `region`
--

DROP TABLE IF EXISTS `region`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `region` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `regionId` int(11) DEFAULT NULL,
  `regionName` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_region_regionId` (`regionId`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `region`
--

LOCK TABLES `region` WRITE;
/*!40000 ALTER TABLE `region` DISABLE KEYS */;
INSERT INTO `region` VALUES (1,1,'美国','us.svg'),(2,2,'法国','fr.svg'),(3,3,'马来西亚','my.svg'),(4,4,'英国','uk.svg'),(5,5,'加拿大','ca.svg'),(6,6,'瑞士','se.svg'),(7,7,'印度尼西亚','id.svg'),(8,8,'波多黎哥','pr.svg'),(9,9,'墨西哥','mexico.png'),(10,10,'澳大利亚','australia.png');
/*!40000 ALTER TABLE `region` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sms`
--

DROP TABLE IF EXISTS `sms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `number` varchar(255) DEFAULT NULL,
  `regionId` int(11) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `up` int(11) DEFAULT '0',
  `down` int(11) DEFAULT '0',
  `createTime` datetime DEFAULT NULL,
  `updateTime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sms`
--

LOCK TABLES `sms` WRITE;
/*!40000 ALTER TABLE `sms` DISABLE KEYS */;
INSERT INTO `sms` VALUES (1,'\r\n+14704278471',1,'https://www.receive-a-sms.com/USA',0,0,'2018-06-27 20:34:40','2018-06-27 20:34:43'),(2,'+46769436148',6,'https://www.receive-a-sms.com/Sweden',0,0,'2018-06-27 20:34:40','2018-06-27 20:34:43'),(3,'+447418310219',4,'https://www.receive-a-sms.com/UK',0,0,'2018-06-27 20:34:40','2018-06-27 20:34:43'),(4,'+526644589276',9,'https://www.receive-a-sms.com/Mexico',0,0,'2018-06-27 20:34:40','2018-06-27 20:34:43'),(5,'+61488863482',10,'https://www.receive-a-sms.com/Australia',0,0,'2018-06-27 20:34:40','2018-06-27 20:34:43'),(6,'\r\n+14704278471',6,'https://www.receive-a-sms.com/USA',0,0,'2018-06-27 20:34:40','2018-06-27 20:34:43'),(7,'\r\n+14704278471',7,'https://www.receive-a-sms.com/USA',0,0,'2018-06-27 20:34:40','2018-06-27 20:34:43'),(8,'\r\n+14704278471',8,'https://www.receive-a-sms.com/USA',0,0,'2018-06-27 20:34:40','2018-06-27 20:34:43');
/*!40000 ALTER TABLE `sms` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-10-08 23:29:27

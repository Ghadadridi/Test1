-- MySQL dump 10.13  Distrib 5.7.23, for osx10.9 (x86_64)
--
-- Host: localhost    Database: zerowaste
-- ------------------------------------------------------
-- Server version	5.7.23
-- ------------------------------------------------------
-- Author: Gruppe4
--

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
-- Table structure for table `antwort`
--

DROP TABLE IF EXISTS `antwort`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `antwort` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fragenId` int(10) NOT NULL,
  `teilnehmerId` int(10) NOT NULL,
  `value` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fragenId` (`fragenId`),
  KEY `teilnehmerId` (`teilnehmerId`),
  CONSTRAINT `FK_antwort_frage` FOREIGN KEY (`fragenId`) REFERENCES `frage` (`id`),
  CONSTRAINT `FK_antwort_teilnehmer` FOREIGN KEY (`teilnehmerId`) REFERENCES `teilnehmer` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `antwort`
--

LOCK TABLES `antwort` WRITE;
/*!40000 ALTER TABLE `antwort` DISABLE KEYS */;
INSERT INTO `antwort` VALUES (1,1,3,'0'),(2,2,3,'1'),(3,3,3,'sdf'),(4,4,3,'asdf'),(5,1,4,'0'),(6,2,4,'1'),(7,3,4,'sdf'),(8,4,4,'asdf'),(9,1,5,'0'),(10,2,5,'4'),(11,3,5,'äpfel'),(12,4,5,'banane');
/*!40000 ALTER TABLE `antwort` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `frage`
--

DROP TABLE IF EXISTS `frage`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `frage` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `frage` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `frage`
--

LOCK TABLES `frage` WRITE;
/*!40000 ALTER TABLE `frage` DISABLE KEYS */;
INSERT INTO `frage` VALUES (1,'Achtest du aktiv auf deinen Plastikverbrauch?'),(2,'Wie schätzt du deinen Plastikverbrauch auf einer Skala von 0-5 (0 sehr wenig, 5 sehr hoch) ein?'),(3,'Für welche Produkte würdest du eine Plastiktüte verwenden?'),(4,'Wie meinst du könnten Supermärkte deinen Plastikverbrauch reduzieren?');
/*!40000 ALTER TABLE `frage` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teilnehmer`
--

DROP TABLE IF EXISTS `teilnehmer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teilnehmer` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `alter` int(11) DEFAULT NULL,
  `geschlecht` set('weiblich','männlich','divers','') COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teilnehmer`
--

LOCK TABLES `teilnehmer` WRITE;
/*!40000 ALTER TABLE `teilnehmer` DISABLE KEYS */;
INSERT INTO `teilnehmer` VALUES (1,64,'weiblich'),(2,25,'männlich'),(3,2,'weiblich'),(4,2,'weiblich'),(5,19,'männlich');
/*!40000 ALTER TABLE `teilnehmer` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-02-13 18:36:59

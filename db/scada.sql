-- MySQL dump 10.16  Distrib 10.1.11-MariaDB, for Linux (armv7l)
--
-- Host: localhost    Database: Scada
-- ------------------------------------------------------
-- Server version	10.1.11-MariaDB-log

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
-- Table structure for table `device`
--

DROP TABLE IF EXISTS `device`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `device` (
  `id_device` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `comment` text NOT NULL,
  `type` enum('SENSOR','ACTUATOR','','') NOT NULL,
  PRIMARY KEY (`id_device`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `device`
--

LOCK TABLES `device` WRITE;
/*!40000 ALTER TABLE `device` DISABLE KEYS */;
/*!40000 ALTER TABLE `device` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `deviceType`
--

DROP TABLE IF EXISTS `deviceType`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `deviceType` (
  `id_deviceType` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(30) NOT NULL,
  `value` smallint(6) NOT NULL,
  `comment` text NOT NULL,
  PRIMARY KEY (`id_deviceType`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `deviceType`
--

LOCK TABLES `deviceType` WRITE;
/*!40000 ALTER TABLE `deviceType` DISABLE KEYS */;
/*!40000 ALTER TABLE `deviceType` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `deviceVariable`
--

DROP TABLE IF EXISTS `deviceVariable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `deviceVariable` (
  `id_deviceVariable` int(11) NOT NULL AUTO_INCREMENT,
  `id_deviceType` int(11) NOT NULL,
  `id_variableType` int(11) NOT NULL,
  PRIMARY KEY (`id_deviceVariable`),
  UNIQUE KEY `id_deviceType` (`id_deviceType`),
  UNIQUE KEY `id_variableType` (`id_variableType`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `deviceVariable`
--

LOCK TABLES `deviceVariable` WRITE;
/*!40000 ALTER TABLE `deviceVariable` DISABLE KEYS */;
/*!40000 ALTER TABLE `deviceVariable` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `internalType`
--

DROP TABLE IF EXISTS `internalType`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `internalType` (
  `id_internalType` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(30) NOT NULL,
  `value` tinyint(4) NOT NULL,
  `comment` text NOT NULL,
  PRIMARY KEY (`id_internalType`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `internalType`
--

LOCK TABLES `internalType` WRITE;
/*!40000 ALTER TABLE `internalType` DISABLE KEYS */;
/*!40000 ALTER TABLE `internalType` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messageType`
--

DROP TABLE IF EXISTS `messageType`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messageType` (
  `id_messageType` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(16) NOT NULL,
  `value` tinyint(4) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id_messageType`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messageType`
--

LOCK TABLES `messageType` WRITE;
/*!40000 ALTER TABLE `messageType` DISABLE KEYS */;
/*!40000 ALTER TABLE `messageType` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `node`
--

DROP TABLE IF EXISTS `node`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `node` (
  `id_node` int(11) NOT NULL AUTO_INCREMENT,
  `description` text NOT NULL,
  `type_node` enum('GATEWAY','REPEATER','NODE','') NOT NULL,
  `state` enum('ON','OFF','MAINTENANCE','') NOT NULL,
  PRIMARY KEY (`id_node`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `node`
--

LOCK TABLES `node` WRITE;
/*!40000 ALTER TABLE `node` DISABLE KEYS */;
/*!40000 ALTER TABLE `node` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `pseudo` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `type_user` enum('ADMIN','NORMAL','','') NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `variable`
--

DROP TABLE IF EXISTS `variable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `variable` (
  `id_variable` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `valueType` enum('ANALOG','NUMERIC','','') NOT NULL,
  `id_variableType` int(11) NOT NULL,
  PRIMARY KEY (`id_variable`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `variable`
--

LOCK TABLES `variable` WRITE;
/*!40000 ALTER TABLE `variable` DISABLE KEYS */;
/*!40000 ALTER TABLE `variable` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `variableType`
--

DROP TABLE IF EXISTS `variableType`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `variableType` (
  `id_variableType` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(30) NOT NULL,
  `value` smallint(6) NOT NULL,
  `comment` text NOT NULL,
  PRIMARY KEY (`id_variableType`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `variableType`
--

LOCK TABLES `variableType` WRITE;
/*!40000 ALTER TABLE `variableType` DISABLE KEYS */;
/*!40000 ALTER TABLE `variableType` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-05-07  9:08:57

-- MySQL dump 10.13  Distrib 5.7.16, for Linux (x86_64)
--
-- Host: localhost    Database: test_wnet
-- ------------------------------------------------------
-- Server version	5.7.16-0ubuntu0.16.04.1

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
-- Table structure for table `obj_contracts`
--

DROP TABLE IF EXISTS `obj_contracts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `obj_contracts` (
  `id_contract` int(11) NOT NULL AUTO_INCREMENT,
  `id_customer` int(11) DEFAULT NULL,
  `number` varchar(100) DEFAULT NULL,
  `date_sign` date DEFAULT NULL,
  `staff_number` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_contract`),
  KEY `fk_obj_contracts_1_idx` (`id_customer`),
  CONSTRAINT `obj_contracts_obj_customers_id_customer_fk` FOREIGN KEY (`id_customer`) REFERENCES `obj_customers` (`id_customer`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `obj_contracts`
--

LOCK TABLES `obj_contracts` WRITE;
/*!40000 ALTER TABLE `obj_contracts` DISABLE KEYS */;
INSERT INTO `obj_contracts` VALUES (1,5,'4','2016-11-10','34'),(2,4,'33','2016-11-21','345'),(3,3,'45','2016-11-06','121'),(4,3,'44','2016-11-20','119'),(5,3,'60','2016-11-07','300');
/*!40000 ALTER TABLE `obj_contracts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `obj_customers`
--

DROP TABLE IF EXISTS `obj_customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `obj_customers` (
  `id_customer` int(11) NOT NULL AUTO_INCREMENT,
  `name_customer` varchar(255) DEFAULT NULL,
  `company` enum('company_1','company_2','company_3') DEFAULT NULL,
  PRIMARY KEY (`id_customer`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `obj_customers`
--

LOCK TABLES `obj_customers` WRITE;
/*!40000 ALTER TABLE `obj_customers` DISABLE KEYS */;
INSERT INTO `obj_customers` VALUES (3,'Vasya Pupkin','company_1'),(4,'Igor Igorev','company_3'),(5,'Viktor Sidorov','company_2');
/*!40000 ALTER TABLE `obj_customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `obj_services`
--

DROP TABLE IF EXISTS `obj_services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `obj_services` (
  `id_service` int(11) NOT NULL AUTO_INCREMENT,
  `id_contract` int(11) DEFAULT NULL,
  `title_service` varchar(255) DEFAULT NULL,
  `status` enum('work','connecting','disconnected') DEFAULT NULL,
  PRIMARY KEY (`id_service`),
  KEY `fk_obj_services_1_idx` (`id_contract`),
  CONSTRAINT `obj_services_obj_contracts_id_contract_fk` FOREIGN KEY (`id_contract`) REFERENCES `obj_contracts` (`id_contract`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `obj_services`
--

LOCK TABLES `obj_services` WRITE;
/*!40000 ALTER TABLE `obj_services` DISABLE KEYS */;
INSERT INTO `obj_services` VALUES (1,2,'Mega Service','work'),(2,1,'Super Service','work'),(3,3,'Multi Service','connecting'),(4,3,'The Best Service','disconnected'),(5,3,'bad Service','work'),(6,5,'new','work');
/*!40000 ALTER TABLE `obj_services` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-11-13  1:29:31

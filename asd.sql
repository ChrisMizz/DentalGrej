-- MySQL dump 10.13  Distrib 5.7.17, for macos10.12 (x86_64)
--
-- Host: localhost    Database: mydb
-- ------------------------------------------------------
-- Server version	5.5.42

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
-- Table structure for table `Abonnementer`
--

DROP TABLE IF EXISTS `Abonnementer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Abonnementer` (
  `idOdre` int(11) NOT NULL AUTO_INCREMENT,
  `Navn` varchar(45) NOT NULL,
  `Adresse` varchar(45) NOT NULL,
  `Postnummer` int(11) NOT NULL,
  `By` varchar(45) NOT NULL,
  `Betalt` int(11) NOT NULL DEFAULT '0',
  `TotalPris` decimal(6,2) NOT NULL DEFAULT '0.00',
  `Bruger_idBruger` int(11) NOT NULL,
  PRIMARY KEY (`idOdre`,`Bruger_idBruger`),
  UNIQUE KEY `idOdre_UNIQUE` (`idOdre`),
  KEY `fk_Abonnementer_Bruger1_idx` (`Bruger_idBruger`),
  CONSTRAINT `fk_Abonnementer_Bruger1` FOREIGN KEY (`Bruger_idBruger`) REFERENCES `Bruger` (`idBruger`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Abonnementer`
--

LOCK TABLES `Abonnementer` WRITE;
/*!40000 ALTER TABLE `Abonnementer` DISABLE KEYS */;
/*!40000 ALTER TABLE `Abonnementer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Bruger`
--

DROP TABLE IF EXISTS `Bruger`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Bruger` (
  `idBruger` int(11) NOT NULL AUTO_INCREMENT,
  `Navn` varchar(45) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `Adgangskode` varchar(45) NOT NULL,
  `Adresse` varchar(45) NOT NULL,
  `Postnummer` int(11) NOT NULL,
  `By` varchar(45) NOT NULL,
  PRIMARY KEY (`idBruger`),
  UNIQUE KEY `idBruger_UNIQUE` (`idBruger`),
  UNIQUE KEY `Email_UNIQUE` (`Email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Bruger`
--

LOCK TABLES `Bruger` WRITE;
/*!40000 ALTER TABLE `Bruger` DISABLE KEYS */;
INSERT INTO `Bruger` VALUES (1,'Rasmus Gregersen P?PPP','raller799@live.dk','asdfasdf','Alsikemarken 69',2860,'SÃ¸borg'),(3,'Rasmus Gregersen HEJ','raller799@live.dks','asdfasdf','Alsikemarken 69',2860,'SÃ¸borg');
/*!40000 ALTER TABLE `Bruger` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Produkter`
--

DROP TABLE IF EXISTS `Produkter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Produkter` (
  `idProdukter` int(11) NOT NULL AUTO_INCREMENT,
  `Pakkenavn` varchar(45) NOT NULL,
  `Billede` varchar(45) DEFAULT NULL,
  `Indhold` varchar(45) NOT NULL,
  `Pris` decimal(6,2) NOT NULL,
  `Abonnementer_idOdre` int(11) NOT NULL,
  PRIMARY KEY (`idProdukter`,`Abonnementer_idOdre`),
  UNIQUE KEY `idProdukter_UNIQUE` (`idProdukter`),
  KEY `fk_Produkter_Abonnementer1_idx` (`Abonnementer_idOdre`),
  CONSTRAINT `fk_Produkter_Abonnementer1` FOREIGN KEY (`Abonnementer_idOdre`) REFERENCES `Abonnementer` (`idOdre`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Produkter`
--

LOCK TABLES `Produkter` WRITE;
/*!40000 ALTER TABLE `Produkter` DISABLE KEYS */;
/*!40000 ALTER TABLE `Produkter` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-03-30 12:53:50

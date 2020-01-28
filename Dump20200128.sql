-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: clinic
-- ------------------------------------------------------
-- Server version	5.7.22

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
-- Table structure for table `deposite`
--

DROP TABLE IF EXISTS `deposite`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `deposite` (
  `Deposite_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Profile_ID` varchar(255) DEFAULT NULL,
  `Deposite_Slip` varchar(255) DEFAULT NULL,
  `Amount` int(11) DEFAULT NULL,
  `late_fine` int(11) DEFAULT NULL,
  `Date` int(11) DEFAULT NULL,
  `Month` varchar(255) DEFAULT NULL,
  `Short_Description` mediumtext,
  `Verification` tinyint(1) DEFAULT '0',
  `Verification_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`Deposite_ID`),
  UNIQUE KEY `Deposite_ID_UNIQUE` (`Deposite_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `deposite`
--

LOCK TABLES `deposite` WRITE;
/*!40000 ALTER TABLE `deposite` DISABLE KEYS */;
INSERT INTO `deposite` VALUES (1,'1,3,2','158017458481396839_824143501343851_4387819725820788736_n.jpg',5000,50,1580174584,'4,6',NULL,0,1);
/*!40000 ALTER TABLE `deposite` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log`
--

DROP TABLE IF EXISTS `log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `table_name` varchar(255) DEFAULT NULL,
  `recrord id` int(11) DEFAULT NULL,
  `change_details` longtext,
  `time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log`
--

LOCK TABLES `log` WRITE;
/*!40000 ALTER TABLE `log` DISABLE KEYS */;
/*!40000 ALTER TABLE `log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `USER_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Password` varchar(255) DEFAULT NULL,
  `User_Role` tinyint(2) DEFAULT '1',
  `Verified` int(2) DEFAULT '0',
  `Verification_ID` int(11) DEFAULT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Father_Name` varchar(255) DEFAULT NULL,
  `Mother_Name` varchar(255) DEFAULT NULL,
  `Image` varchar(255) DEFAULT NULL,
  `NID` varchar(255) DEFAULT NULL,
  `NID_Screenshot` varchar(255) DEFAULT NULL,
  `Short_Description` text,
  `Profession` varchar(150) DEFAULT NULL,
  `Phone` varchar(50) DEFAULT NULL,
  `Secondary_Phone` varchar(50) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Address` varchar(500) DEFAULT NULL,
  `FB_Link` varchar(400) DEFAULT NULL,
  `Nominee_Name` varchar(255) DEFAULT NULL,
  `Nominee_Relation` varchar(50) DEFAULT NULL,
  `Status` tinyint(2) DEFAULT '0',
  `Edit_History` int(11) DEFAULT NULL,
  PRIMARY KEY (`USER_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'8cb2237d0679ca88db6464eac60da96345513964',2,1,1,'wwww','ww','ww','1578406826aaa.png','www','1578406826bbbb.png','                                                                        wewe                                                                                 ','www','www','www','www@sd.sdfds','                                                             wewewe                                                                                 ','www','ww','ww',0,NULL),(2,'7110eda4d09e062aa5e4a390b0a572ac0d2c0220',1,0,NULL,'onik',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'999978',NULL,'nawaz1244@boo2.nl',NULL,NULL,NULL,NULL,0,NULL),(3,'7110eda4d09e062aa5e4a390b0a572ac0d2c0220',1,0,NULL,'sujan',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'999978',NULL,'boo2.nawaz@gmail.com',NULL,NULL,NULL,NULL,0,NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-01-28  7:42:19

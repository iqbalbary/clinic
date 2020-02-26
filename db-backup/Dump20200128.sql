-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: clinic
-- ------------------------------------------------------
-- Server version 5.7.22

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
  `submission_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`Deposite_ID`),
  UNIQUE KEY `Deposite_ID_UNIQUE` (`Deposite_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `deposite`
--

LOCK TABLES `deposite` WRITE;
/*!40000 ALTER TABLE `deposite` DISABLE KEYS */;
INSERT INTO `deposite` VALUES (1,'1,3,2','158017458481396839_824143501343851_4387819725820788736_n.jpg',5000,50,1580174584,'4,6','d kdf bkjbfk jsd',1,1,NULL),(2,'1,3,2','158022545582174094_2554595381336254_7730137767757217792_n.jpg',5000,500,1580225455,'2,3,5','ksdvbkdsbvksdh',0,1,NULL),(3,'2,1,3','158031016682362775_2486374481621192_7405029054350360576_n.jpg',5000,5,1580310166,'2,4',NULL,1,1,NULL),(4,'2','158031018982362775_2486374481621192_7405029054350360576_n.jpg',45435,343,1580310189,'1',NULL,0,1,NULL),(5,'2,1,3,6','158032437282174094_2554595381336254_7730137767757217792_n.jpg',50000,343,1580324372,'2,4',NULL,0,1,NULL),(6,'1,3','158032440482877392_609970369577319_964180532583727104_n.jpg',769,-98,1580324404,'2,4',NULL,0,1,NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'8cb2237d0679ca88db6464eac60da96345513964',2,1,1,'wwww','ww','ww','1578406826aaa.png','www','1578406826bbbb.png','                                                                                        wewe                                                                                                   ','www','www','www','www@sd.sdfds','                                                                                     wewewe                                                                                                   ','www','ww','ww',1,NULL),(2,'7110eda4d09e062aa5e4a390b0a572ac0d2c0220',1,0,NULL,'onik',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'999978',NULL,'nawaz1244@boo2.nl',NULL,NULL,NULL,NULL,0,NULL),(3,'7110eda4d09e062aa5e4a390b0a572ac0d2c0220',1,0,NULL,'sujan',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'999978',NULL,'boo2.nawaz@gmail.com',NULL,NULL,NULL,NULL,0,NULL),(4,'7110eda4d09e062aa5e4a390b0a572ac0d2c0220',1,0,NULL,'anamul',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'999978',NULL,'boo2.nawaz@gmail.com',NULL,NULL,NULL,NULL,0,NULL),(5,'7110eda4d09e062aa5e4a390b0a572ac0d2c0220',1,0,NULL,'kxc kx',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'999978',NULL,'boo2.nawaz@gmail.com',NULL,NULL,NULL,NULL,0,NULL),(6,'7110eda4d09e062aa5e4a390b0a572ac0d2c0220',1,0,NULL,'kxc kx',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'999978',NULL,'boo2.nawaz@gmail.com',NULL,NULL,NULL,NULL,0,NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_deposite`
--

DROP TABLE IF EXISTS `user_deposite`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_deposite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `month` int(11) DEFAULT NULL,
  `deposit_id` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `late_fine` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_deposite`
--

LOCK TABLES `user_deposite` WRITE;
/*!40000 ALTER TABLE `user_deposite` DISABLE KEYS */;
INSERT INTO `user_deposite` VALUES (1,1,4,1,5000,0),(2,1,6,1,5000,0),(3,3,4,1,5000,0),(4,3,6,1,5000,0),(5,2,4,1,5000,0),(6,2,6,1,5000,0),(7,1,4,1,5000,0),(8,1,6,1,5000,0),(9,3,4,1,5000,0),(10,3,6,1,5000,0),(11,2,4,1,5000,0),(12,2,6,1,5000,0),(13,2,1,4,5000,0),(14,2,2,3,5000,0),(15,2,4,3,5000,0),(16,1,2,3,5000,0),(17,1,4,3,5000,0),(18,3,2,3,5000,0),(19,3,4,3,5000,0);
/*!40000 ALTER TABLE `user_deposite` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-01-30  1:03:33

-- MySQL dump 10.13  Distrib 8.0.31, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: vaiicko_db
-- ------------------------------------------------------
-- Server version	5.5.5-10.9.2-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `teams`
--

DROP TABLE IF EXISTS `teams`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `teams` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `date_created` date NOT NULL,
  `owner_id` int(11) NOT NULL,
  `no_champ` int(11) DEFAULT NULL,
  `no_races` int(11) DEFAULT NULL,
  `best_pos` int(11) DEFAULT NULL,
  `avg_pos` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `foreign_key_owner` (`owner_id`),
  CONSTRAINT `foreign_key_owner` FOREIGN KEY (`owner_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teams`
--

LOCK TABLES `teams` WRITE;
/*!40000 ALTER TABLE `teams` DISABLE KEYS */;
INSERT INTO `teams` VALUES (1,'Shadows of the Puma','2022-11-20',1,NULL,NULL,NULL,NULL),(2,'Blazing Glory','2022-11-20',2,NULL,NULL,NULL,NULL),(3,' Max Speed','2022-11-20',3,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `teams` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `email` text NOT NULL,
  `hash` text NOT NULL,
  `name` text NOT NULL,
  `surname` text NOT NULL,
  `team` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `foreign_key_team` (`team`),
  CONSTRAINT `foreign_key_team` FOREIGN KEY (`team`) REFERENCES `teams` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Arersler','Arersler@gmail.com','$2y$10$DlEEuuQ3zgd5OIZgJpNgVOJIV/dTNuNCjS65IboBz4bolNGxTLezO','Dakota','Chester',1),(2,'Broodwoon','Broodwoon@gmail.com','$2y$10$xUE6JfJpGwgaLy30FxVLxu8qOzmq3NectOU7eIIeHdGoXzEprtQBS','Brendan','Abbey',2),(3,'Flylter','Flylter@gmail.com','$2y$10$L6MIRL.n9YmBoT1j7BFAKu7V5t/3V5rEEnSIL7GeTLZMVj5t7RGFW','Cohen','Underwood',3),(4,'Lolmast','Lolmast@gmail.com','$2y$10$9FduZ2N2wQll1mA8XDfv7Oc6263GCwTSsqr47mz4bi.HAYJPnnU8G','Laird','Harrelson',1),(5,'Misser','Misser@gmail.com','$2y$10$0dkTtv4dLtgEiivYBAqdQO9N9Zuxnc8gAOeomUy47SO1FhYybAH1e','Phoenix','Nye',2),(6,'Probilehr','Probilehr@gmail.com','$2y$10$DZQUnkELI52EEhHs3N5dfeNxjeAYUem11nFOxMFQMwRQe0Tcfei12','Steph','Botterill',3),(7,'Summerskylo','Summerskylo@gmail.com','$2y$10$Bo60VDxuPZY85xbu7XETN.w7TQQ8Na.d9LVDfvNcugtP0JGxQY1eu','Shelly','Cokes',2),(8,'ThesoyRonz','ThesoyRonz@gmail.com','$2y$10$M3Vm4OGo/1OA.nK70qL/oeYG0/I7VcgwlPrDGTdGgwGnQJPbdCAkO','Tibby','Aston',3);
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

-- Dump completed on 2022-11-20 19:54:43

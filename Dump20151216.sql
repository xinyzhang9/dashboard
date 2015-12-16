CREATE DATABASE  IF NOT EXISTS `dashboard` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `dashboard`;
-- MySQL dump 10.13  Distrib 5.7.9, for osx10.9 (x86_64)
--
-- Host: 127.0.0.1    Database: dashboard
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
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comment` text,
  `created_at` datetime DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `message_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_comments_users1_idx` (`user_id`),
  KEY `fk_comments_messages1_idx` (`message_id`),
  CONSTRAINT `fk_comments_messages1` FOREIGN KEY (`message_id`) REFERENCES `messages` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_comments_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,'gg','2015-12-16 01:49:00',3,1),(2,'good job','2015-12-16 03:11:03',1,5),(3,'that\'s cool!','2015-12-16 11:31:59',1,3),(4,'hello xinyang','2015-12-16 11:44:24',1,3),(5,'hello xinyang2','2015-12-16 11:54:25',1,3),(6,'good job2','2015-12-16 11:56:45',1,5),(7,'hi','2015-12-16 12:07:07',1,9),(8,'hello world','2015-12-16 12:07:18',1,8),(9,'refresh','2015-12-16 12:07:26',1,8),(10,'hello xinyang','2015-12-16 12:16:06',2,11),(11,'hello xinyang','2015-12-16 12:16:41',3,11),(12,'hello dailin','2015-12-16 12:16:46',3,11),(13,'hello dailin. how are you','2015-12-16 12:17:02',3,12),(14,'miss you so much!','2015-12-16 14:25:36',2,15),(15,'hello I am still here','2015-12-16 14:25:46',2,13);
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `owner_id` int(11) NOT NULL,
  `poster_id` int(11) NOT NULL,
  `message` text,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_users_has_users_users2_idx` (`poster_id`),
  KEY `fk_users_has_users_users1_idx` (`owner_id`),
  CONSTRAINT `fk_users_has_users_users1` FOREIGN KEY (`owner_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_has_users_users2` FOREIGN KEY (`poster_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` VALUES (1,1,2,'loveU','2015-12-16 01:38:51'),(3,1,1,'hello','2015-12-16 02:30:30'),(4,1,1,'hi baby','2015-12-16 02:39:09'),(5,1,1,'come here','2015-12-16 02:54:50'),(6,1,1,'posttttt','2015-12-16 11:58:09'),(7,1,1,'0','2015-12-16 12:06:28'),(8,1,1,'0','2015-12-16 12:06:34'),(9,1,1,'0','2015-12-16 12:06:36'),(10,1,1,'new post','2015-12-16 12:07:41'),(11,3,1,'hello bale','2015-12-16 12:15:32'),(12,3,2,'hello this is dailin','2015-12-16 12:15:58'),(13,2,1,'hello dailin','2015-12-16 12:29:24'),(14,3,1,'1111','2015-12-16 12:34:08'),(15,2,1,'long time no see!','2015-12-16 14:25:05');
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `user_level` int(11) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Xinyang','Zhang','xinyzhang9@gmail.com','e10adc3949ba59abbe56e057f20f883e','2015-12-16 01:16:24','2015-12-16 01:16:24',9,NULL),(2,'Dailin','Liu','dailinliu2@gmail.com','e10adc3949ba59abbe56e057f20f883e','2015-12-16 01:16:40','2015-12-16 14:24:34',0,'cute girl'),(3,'Garith','Bale','bale@gmail.com','e10adc3949ba59abbe56e057f20f883e','2015-12-16 01:16:58','2015-12-16 01:16:58',0,NULL),(4,'Cristiano','Ronaldo','cr7@gmail.com','e10adc3949ba59abbe56e057f20f883e','2015-12-16 12:18:15','2015-12-16 12:18:27',0,'best player');
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

-- Dump completed on 2015-12-16 14:27:06

CREATE DATABASE  IF NOT EXISTS `smtest` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `smtest`;
-- MySQL dump 10.13  Distrib 5.7.12, for Win32 (AMD64)
--
-- Host: localhost    Database: smtest
-- ------------------------------------------------------
-- Server version	5.6.17

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
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messages` (
  `idmessages` int(11) NOT NULL AUTO_INCREMENT,
  `time` datetime DEFAULT NULL,
  `user` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `message` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`idmessages`)
) ENGINE=InnoDB AUTO_INCREMENT=123 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` VALUES (53,'0000-00-00 00:00:00',':p2',':p3',':p4'),(70,'2020-12-07 17:49:26','Петр Иванов','sample@mail.ru','Ждём ответа от сервера'),(71,'2020-12-07 19:13:36','Петр Иванов','sample@mail.ru21','Ждём ответа от сервера'),(72,'2020-12-07 19:13:44','Петр Иванов','sample@mail.ru','Ждём ответа от сервера'),(73,'2020-12-07 19:13:44','fsdfwsdfs','dsgfsdgfsdg','ывпфпфывпфыв'),(74,'2020-12-07 19:15:52','Петр Иванов','sample@mail.ru','Ждём ответа от сервера'),(77,'2020-12-07 19:23:17','Петр Иванов','sample@mail.ru','Ждём ответа от сервера'),(78,'2020-12-07 19:23:40','','',''),(79,'2020-12-07 19:31:32','Петр Иванов','sample@mail.ru','Ждём ответа от сервера'),(80,'2020-12-07 19:32:14','Петр Иванов','sample@mail.ru','Ждём ответа от сервера'),(81,'2020-12-07 19:32:21','','','qweqweqwe'),(82,'2020-12-07 19:32:30','','werwerwer',''),(83,'2020-12-07 19:32:35','wrewerwerw','',''),(84,'2020-12-07 19:32:45','werwer','werwerwe',''),(85,'2020-12-07 19:33:41','Петр Иванов','sample@mail.ru','Ждём ответа от сервера'),(86,'2020-12-07 19:33:42','','',''),(87,'2020-12-08 09:29:13','Петр Иванов','sample@mail.ru','Ждём ответа от сервера'),(88,'2020-12-08 09:31:37','Петр Иванов','sample@mail.ru','Ждём ответа от сервера'),(89,'2020-12-08 09:36:23','Петр Иванов','sample@mail.ru','Ждём ответа от сервера'),(90,'2020-12-08 09:39:19','Петр Иванов','sample@mail.ru','Ждём ответа от сервера'),(91,'2020-12-08 09:39:39','Петр Иванов','sample@mail.ru','Ждём ответа от сервера'),(92,'2020-12-08 13:43:57','Петр Иванов','sample@mail.ru','Ждём ответа от сервера'),(93,'2020-12-08 13:44:01','gsfgsdfgsdfg','',''),(94,'2020-12-08 13:44:12','Петр Иванов','sample@mail.ru','Ждём ответа от сервера'),(95,'2020-12-08 13:44:16','asdasda','',''),(96,'2020-12-08 13:44:26','2erwrwerw','sdfsadfasdf',''),(97,'2020-12-08 14:01:56','Петр Иванов','sample@mail.ru','Ждём ответа от сервера'),(98,'2020-12-08 14:02:02','qdasdas','',''),(99,'2020-12-08 14:02:16','Петр Иванов','sample@mail.ru','Ждём ответа от сервера'),(100,'2020-12-08 14:02:21','erte','ertwertr',''),(101,'2020-12-08 14:08:43','Петр Иванов','sample@mail.ru','Ждём ответа от сервера'),(102,'2020-12-08 14:08:47','eterterte','',''),(103,'2020-12-08 14:08:52','erterte','etrerte',''),(104,'2020-12-08 14:29:15','Петр Иванов','sample@mail.ru','Ждём ответа от сервера'),(105,'2020-12-08 14:29:26','qweqweq','',''),(106,'2020-12-08 14:29:33','adsdasd','asadsda',''),(107,'2020-12-08 14:29:40','asdas','sadas@',''),(108,'2020-12-08 14:31:08','Петр Иванов','sample@mail.ru','Ждём ответа от сервера'),(109,'2020-12-08 14:32:02','werwer','sdfs@dsdfs.tyrty',''),(110,'2020-12-08 14:40:45','Петр Иванов','sample@mail.ru','Ждём ответа от сервера'),(111,'2020-12-08 14:42:28','Петр Иванов','sample@mail.ru','Ждём ответа от сервера'),(112,'2020-12-09 12:13:12','Петр Иванов','sample@mail.ru','Ждём ответа от сервера'),(113,'2020-12-09 12:16:11','Петр Иванов','sample@mail.ru','Ждём ответа от сервера'),(114,'2020-12-09 12:20:52','Петр Иванов','sample@mail.ru','Пример сообщения'),(115,'2020-12-09 12:21:18','Петр Иванов','sample@mail.ru','Пример сообщения'),(116,'2020-12-09 12:21:22','Петр Иванов','sample@mail.ru','Пример сообщения'),(117,'2020-12-09 12:21:43','Петр Иванов','sample@mail.ru','Пример сообщения'),(118,'2020-12-09 13:31:47','Петр Иванов','sample@mail.ru','Пример сообщения'),(119,'2020-12-09 13:31:53','Петр Иванов','sample@mail.ru','Пример сообщения'),(120,'2020-12-09 13:38:00','Петр Иванов','sample@mail.ru','Пример сообщения'),(121,'2020-12-09 13:38:37','Петр Иванов','sample@mail.ru','Пример сообщения'),(122,'2020-12-09 13:39:42','Петр Иванов','sample@mail.ru','Пример сообщения');
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-12-09 15:40:56

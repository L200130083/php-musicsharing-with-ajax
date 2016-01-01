-- MySQL dump 10.13  Distrib 5.1.61, for redhat-linux-gnu (x86_64)
--
-- Host: localhost    Database: u993779326_yogie
-- ------------------------------------------------------
-- Server version	5.1.61
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `groups`
--

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` VALUES (1,'admin'),(2,'member');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `songs`
--

DROP TABLE IF EXISTS `songs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `songs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `artist` varchar(100) NOT NULL,
  `path` varchar(255) DEFAULT NULL,
  `owner` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `owner` (`owner`)
) ENGINE=MyISAM AUTO_INCREMENT=65 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `songs`
--

LOCK TABLES `songs` WRITE;
/*!40000 ALTER TABLE `songs` DISABLE KEYS */;
INSERT INTO `songs` VALUES (40,'Sahabat Jadi Cinta','Zigas','https://h.tusfiles.net:443/d/eal7gx3btz2fvxijsx3jtc24dqklfm4sqaqzmdsltlgre3dqw3du5og5/Zigaz - Sahabat jadi cinta.mp3 ',1),(41,'STAY BEAUTIFUL','Diggy mo','http://50.7.37.2/ost/bleach-ed23-single-stay-beautiful/cnditfjqnb/01.%20STAY%20BEAUTIFUL.mp3',1),(45,'Bila aku jatuh cinta','Nidji','http://cdnsh-101.wapka.link/files/wapka_user/NIDJI%20-%20BILA%20AKU%20JATUH%20CINTA.mp3',1),(43,'Hello','Adele','./uploads/Hello-mp3-Adele.mp3',1),(44,'Tembak tidak ya','Al Ghazali','http://cdnsh-101.wapka.link/files/wapka_user/Al%20Ghazali%20-%20Lagu%20Galau.mp3',1),(47,'Hapus Aku','Nidji','http://cdnsh-101.wapka.link/files/wapka_user/02%20Hapus%20Aku.mp3',1),(49,'Good Bye','Gilang Dirga','./uploads/sa.mp3',33),(50,'Immortal Love Song','Mahadewa','http://cdnsh-101.wapka.link/files/wapka_user/Immortal%20Love%20(Cinta%20Mati%204)%20-%20[Mahadewa].mp3',1),(51,'One More Night','Maroon 5','http://a.tumblr.com/tumblr_m73blnHzFe1rvrgx2o1.mp3',1),(52,'Impossible','Shontelle','./uploads/Shontelle - Impossible.mp3',1),(53,'Stuck In The Moment(accoustic)','Justin Bieber','./uploads/Stuck In The Moment (Acoustic).mp3',1),(54,'Cinta dan Benci','Geisha','./uploads/Cinta Dan Benci.mp3',1),(61,'When You\'re Gone','Avril Lavigne','./uploads/Avril Lavigne - When You\'re Gone.mp3',1),(62,'Mirae','Kiroro','http://socrates.if.usp.br/~ssfranco/movie/Kiroro%20-%20Miraie.mp3',1),(56,'Hello','OMFG','./uploads/OMFG - Hello.mp3',1),(63,'Royals','WOTE','./uploads/Royals - Walk off the Earth.mp3',1),(64,'Ice Cream','OMFG','./uploads/OMFG - Ice Cream.mp3',1),(59,'Sayang','NDX','./uploads/NDX A.K.A - Sayang (Lirik).mp3',1),(60,'Bojoku ketikung','NDX','./uploads/ndx aka   bojoku ketikung (lirik).mp3',1);
/*!40000 ALTER TABLE `songs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','92267c99cb2af857ba5fc57262d2d4e6','nutshell@2.cu.ma'),(32,'','d41d8cd98f00b204e9800998ecf8427e',''),(33,'Gerry','2027e068e96c747d0055e7c421983040','gerry@anderson.name');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_group`
--

DROP TABLE IF EXISTS `users_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL DEFAULT '2',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `group_id` (`group_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_group`
--

LOCK TABLES `users_group` WRITE;
/*!40000 ALTER TABLE `users_group` DISABLE KEYS */;
INSERT INTO `users_group` VALUES (1,1,1),(3,26,2),(4,27,2),(5,28,2),(6,29,2),(7,30,2),(8,31,2),(9,32,2),(10,33,2);
/*!40000 ALTER TABLE `users_group` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-12-12 17:34:52

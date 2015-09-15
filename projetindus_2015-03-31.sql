# ************************************************************
# Sequel Pro SQL dump
# Version 4135
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.5.38)
# Database: projetindus
# Generation Time: 2015-03-31 08:12:57 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table actions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `actions`;

CREATE TABLE `actions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idTypeAction` int(11) DEFAULT NULL,
  `idItem` int(11) DEFAULT NULL,
  `idUtilisateur` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_548F1EF46A0FC25` (`idTypeAction`),
  KEY `IDX_548F1EF6CE67B80` (`idItem`),
  KEY `IDX_548F1EF5D419CCB` (`idUtilisateur`),
  CONSTRAINT `FK_548F1EF46A0FC25` FOREIGN KEY (`idTypeAction`) REFERENCES `typeaction` (`id`),
  CONSTRAINT `FK_548F1EF5D419CCB` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`id`),
  CONSTRAINT `FK_548F1EF6CE67B80` FOREIGN KEY (`idItem`) REFERENCES `item` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table artiste
# ------------------------------------------------------------

DROP TABLE IF EXISTS `artiste`;

CREATE TABLE `artiste` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `note` decimal(5,2) NOT NULL,
  `urlCover` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `artiste` WRITE;
/*!40000 ALTER TABLE `artiste` DISABLE KEYS */;

INSERT INTO `artiste` (`id`, `nom`, `note`, `urlCover`)
VALUES
	(5,'Aloe Blacc',0.00,'http://userserve-ak.last.fm/serve/252/23225409.jpg'),
	(6,'Amadou Et Mariam',0.00,'http://userserve-ak.last.fm/serve/252/24156025.jpg'),
	(7,'Bobby McFerrin',0.00,'http://userserve-ak.last.fm/serve/252/54353225.png'),
	(8,'Cream',0.00,'http://userserve-ak.last.fm/serve/252/33468219.png'),
	(9,'Jimi Hendrix',0.00,'http://userserve-ak.last.fm/serve/252/24824871.png'),
	(10,'Jorge Ben',0.00,'http://userserve-ak.last.fm/serve/252/15832293.jpg'),
	(11,'Led Zeppelin',0.00,'http://userserve-ak.last.fm/serve/252/2156769.png'),
	(12,'Lenny Kravitz',0.00,'http://userserve-ak.last.fm/serve/252/50189535.png'),
	(13,'Michael Jackson',0.00,'http://userserve-ak.last.fm/serve/252/61235489.png'),
	(14,'Nina Simone',0.00,'http://userserve-ak.last.fm/serve/252/42687177.jpg'),
	(15,'Pink Floyd',0.00,'http://userserve-ak.last.fm/serve/252/70948710.png'),
	(16,'Prince',2.67,'http://userserve-ak.last.fm/serve/252/12261485.jpg');

/*!40000 ALTER TABLE `artiste` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table artistemusique
# ------------------------------------------------------------

DROP TABLE IF EXISTS `artistemusique`;

CREATE TABLE `artistemusique` (
  `hotttness` decimal(6,6) NOT NULL,
  `familiarity` decimal(6,6) NOT NULL,
  `idArtiste` int(11) NOT NULL,
  PRIMARY KEY (`idArtiste`),
  CONSTRAINT `FK_4D5F473E8CBE5EBD` FOREIGN KEY (`idArtiste`) REFERENCES `artiste` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `artistemusique` WRITE;
/*!40000 ALTER TABLE `artistemusique` DISABLE KEYS */;

INSERT INTO `artistemusique` (`hotttness`, `familiarity`, `idArtiste`)
VALUES
	(0.685780,0.638380,5),
	(0.315700,0.151630,6),
	(0.619190,0.650850,7),
	(0.640350,0.748070,8),
	(0.757380,0.848615,9),
	(0.526024,0.578520,10),
	(0.855990,0.871760,11),
	(0.832510,0.767600,12),
	(0.811330,0.865236,13),
	(0.761002,0.771614,14),
	(0.808348,0.892580,15),
	(0.726770,0.827687,16);

/*!40000 ALTER TABLE `artistemusique` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table artistevideo
# ------------------------------------------------------------

DROP TABLE IF EXISTS `artistevideo`;

CREATE TABLE `artistevideo` (
  `idArtiste` int(11) NOT NULL,
  PRIMARY KEY (`idArtiste`),
  CONSTRAINT `FK_B92ACEB48CBE5EBD` FOREIGN KEY (`idArtiste`) REFERENCES `artiste` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table ecoute
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ecoute`;

CREATE TABLE `ecoute` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `typeEcoute` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `idItem` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_709D561C6CE67B80` (`idItem`),
  CONSTRAINT `FK_709D561C6CE67B80` FOREIGN KEY (`idItem`) REFERENCES `item` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table ext_log_entries
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ext_log_entries`;

CREATE TABLE `ext_log_entries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `action` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `logged_at` datetime NOT NULL,
  `object_id` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `object_class` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `version` int(11) NOT NULL,
  `data` longtext COLLATE utf8_unicode_ci COMMENT '(DC2Type:array)',
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `log_class_lookup_idx` (`object_class`),
  KEY `log_date_lookup_idx` (`logged_at`),
  KEY `log_user_lookup_idx` (`username`),
  KEY `log_version_lookup_idx` (`object_id`,`object_class`,`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table ext_translations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ext_translations`;

CREATE TABLE `ext_translations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `locale` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `object_class` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `field` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `foreign_key` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `lookup_unique_idx` (`locale`,`object_class`,`field`,`foreign_key`),
  KEY `translations_lookup_idx` (`locale`,`object_class`,`foreign_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table fos_user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `fos_user`;

CREATE TABLE `fos_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `locked` tinyint(1) NOT NULL,
  `expired` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  `confirmation_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `credentials_expired` tinyint(1) NOT NULL,
  `credentials_expire_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_957A647992FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_957A6479A0D96FBF` (`email_canonical`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `fos_user` WRITE;
/*!40000 ALTER TABLE `fos_user` DISABLE KEYS */;

INSERT INTO `fos_user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `locked`, `expired`, `expires_at`, `confirmation_token`, `password_requested_at`, `roles`, `credentials_expired`, `credentials_expire_at`)
VALUES
	(1,'elise','elise','tchii2','tchii2',0,'43xg8i2hdyiokgkgkkw8o40gcs0wgws','f3LFKcKd4Pwohm9e+fXeTQkvlDcCeE/N/lmyziE2yYKt9CrPRhq+koqWOor3YmRI/z4ClT6263/lSqqqrXhi5Q==',NULL,0,0,NULL,NULL,NULL,'a:1:{i:0;s:0:\"\";}',0,NULL),
	(2,'Myriam','myriam','myriam@myriam.fr','myriam@myriam.fr',0,'dbbhu30p9nkkkk0w0c00cggw44g8sk4','/6vNKuWI2zIWs15OxIYMu81gvM4bMU3J9nKxbegueUCYYvaYBzv3W5akzrdUyQAHd5hNcbErxk094/WF8+hbDQ==',NULL,0,0,NULL,NULL,NULL,'a:1:{i:0;s:0:\"\";}',0,NULL),
	(3,'toto','toto','toto@toto.fr','toto@toto.fr',0,'gulpt72omq88wo8gsw488ooc0sw0gss','KsTO24BoeDpkBU/muCoi2xWB50fnONkC42dLpeqLBDPInsEtJStlraOrIM+5gKSrcZwORdM46pmTyGqb++LcPA==',NULL,0,0,NULL,NULL,NULL,'a:1:{i:0;s:0:\"\";}',0,NULL);

/*!40000 ALTER TABLE `fos_user` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table genre
# ------------------------------------------------------------

DROP TABLE IF EXISTS `genre`;

CREATE TABLE `genre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `urlCover` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `genre` WRITE;
/*!40000 ALTER TABLE `genre` DISABLE KEYS */;

INSERT INTO `genre` (`id`, `libelle`, `urlCover`)
VALUES
	(2,'Pop','http://userserve-ak.last.fm/serve/300x300/73632982.png'),
	(92,'soul','http://userserve-ak.last.fm/serve/300x300/52438563.png'),
	(93,'hip hop','http://userserve-ak.last.fm/serve/300x300/52438563.png'),
	(94,'r&b','http://userserve-ak.last.fm/serve/300x300/52438563.png'),
	(95,'funk','http://userserve-ak.last.fm/serve/300x300/52438563.png'),
	(96,'jazz','http://userserve-ak.last.fm/serve/300x300/73632982.png'),
	(97,'classical','http://userserve-ak.last.fm/serve/300x300/73632982.png'),
	(98,'smooth jazz','http://userserve-ak.last.fm/serve/300x300/73632982.png'),
	(99,'rock','http://userserve-ak.last.fm/serve/300x300/87037099.png'),
	(100,'blues-rock','http://userserve-ak.last.fm/serve/300x300/87037099.png'),
	(101,'blues','http://userserve-ak.last.fm/serve/300x300/87037099.png'),
	(102,'psychedelic','http://userserve-ak.last.fm/serve/300x300/87037099.png'),
	(103,'bossa nova','http://userserve-ak.last.fm/serve/126/99642759.png'),
	(104,'brazilian pop music','http://userserve-ak.last.fm/serve/126/99642759.png'),
	(105,'samba','http://userserve-ak.last.fm/serve/126/99642759.png'),
	(106,'heavy metal','http://userserve-ak.last.fm/serve/300x300/99733787.png'),
	(107,'hard rock','http://userserve-ak.last.fm/serve/300x300/99733787.png'),
	(108,'classic rock','http://userserve-ak.last.fm/serve/300x300/99733787.png'),
	(109,'gospel','http://userserve-ak.last.fm/serve/174s/58574871.png'),
	(110,'progressive rock','http://userserve-ak.last.fm/serve/174s/78359838.png'),
	(111,'psychedelic rock','http://userserve-ak.last.fm/serve/174s/78359838.png'),
	(112,'80s','http://userserve-ak.last.fm/serve/174s/88034205.png');

/*!40000 ALTER TABLE `genre` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table interactions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `interactions`;

CREATE TABLE `interactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dateHeure` datetime NOT NULL,
  `idTypeInteraction` int(11) DEFAULT NULL,
  `idEcoute` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_538B74BDA6838A3A` (`idTypeInteraction`),
  KEY `IDX_538B74BD138CFE86` (`idEcoute`),
  CONSTRAINT `FK_538B74BD138CFE86` FOREIGN KEY (`idEcoute`) REFERENCES `ecoute` (`id`),
  CONSTRAINT `FK_538B74BDA6838A3A` FOREIGN KEY (`idTypeInteraction`) REFERENCES `typeinteraction` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table item
# ------------------------------------------------------------

DROP TABLE IF EXISTS `item`;

CREATE TABLE `item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `titre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `note` decimal(5,2) NOT NULL,
  `duree` decimal(6,3) NOT NULL,
  `typeItem` int(2) NOT NULL,
  `nbVues` int(11) NOT NULL,
  `date` date NOT NULL,
  `urlCover` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `urlPoster` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `item` WRITE;
/*!40000 ALTER TABLE `item` DISABLE KEYS */;

INSERT INTO `item` (`id`, `url`, `titre`, `note`, `duree`, `typeItem`, `nbVues`, `date`, `urlCover`, `urlPoster`)
VALUES
	(20,'/assets/data/Aloe Blacc - I Need A Dollar.mp3','I Need a Dollar',0.00,246.000,1,2547635,'2010-03-16','http://userserve-ak.last.fm/serve/300x300/52438563.png','http://userserve-ak.last.fm/serve/300x300/52438563.png'),
	(21,'','Good Things',0.00,0.000,2,6,'2010-03-16','http://userserve-ak.last.fm/serve/300x300/52438563.png','http://userserve-ak.last.fm/serve/300x300/52438563.png'),
	(22,'/assets/data/Amadou et Mariam - La Fête Au Village.mp3','La Fête Au Village',0.00,251.000,1,14243,'2004-08-02','http://images.amazon.com/images/P/B0009K7RL6.01.MZZZZZZZ.jpg','http://images.amazon.com/images/P/B0009K7RL6.01.MZZZZZZZ.jpg'),
	(23,'','Dimanche à Bamako',0.00,0.000,2,0,'2004-08-02','http://images.amazon.com/images/P/B0009K7RL6.01.MZZZZZZZ.jpg',NULL),
	(24,'/assets/data/Bobby McFerrin - Don\'t Worry, Be Happy.mp3','Don\'t Worry, Be Happy',0.00,291.000,1,907815,'1988-08-22','http://userserve-ak.last.fm/serve/300x300/73632982.png','http://userserve-ak.last.fm/serve/300x300/73632982.png'),
	(25,'','Simple Pleasures',0.00,0.000,2,0,'1988-08-22','http://userserve-ak.last.fm/serve/300x300/73632982.png',NULL),
	(26,'/assets/data/Cream - Sunshine Of Your Love.mp3','Sunshine Of Your Love',0.00,250.000,1,3130141,'1967-09-10','http://userserve-ak.last.fm/serve/300x300/87037099.png','http://userserve-ak.last.fm/serve/300x300/87037099.png'),
	(27,'','Disraeli Gears',0.00,0.000,2,0,'1967-09-10','http://userserve-ak.last.fm/serve/300x300/87037099.png',NULL),
	(28,'/assets/data/Jimi Hendrix - Purple Haze.mp3','Purple Haze',0.00,182.000,1,3774148,'1967-05-12','http://userserve-ak.last.fm/serve/300x300/103149557.png',NULL),
	(29,'','Are You Experienced',0.00,0.000,2,0,'1967-05-12','http://userserve-ak.last.fm/serve/300x300/103149557.png',NULL),
	(30,'/assets/data/Jorge Ben - Mas, Que Nada!.mp3','Mas, Que Nada!',0.00,179.000,1,102366,'1963-10-01','http://userserve-ak.last.fm/serve/500/99642759/Samba+Esquema+Novo.png',NULL),
	(31,'','Samba Esquema Novo',0.00,0.000,2,0,'1963-10-01','http://userserve-ak.last.fm/serve/500/99642759/Samba+Esquema+Novo.png',NULL),
	(32,'/assets/data/Led Zeppelin - Kashmir.mp3','Kashmir',0.00,508.000,1,3763210,'2007-11-09','http://userserve-ak.last.fm/serve/300x300/99733787.png',NULL),
	(33,'','Physical Graffiti',0.00,0.000,2,0,'2007-11-09','http://userserve-ak.last.fm/serve/174s/99733787.png',NULL),
	(34,'/assets/data/Lenny Kravitz - Always On The Run.mp3','Always On The Run',0.00,233.000,1,620099,'1992-07-11','http://userserve-ak.last.fm/serve/300x300/102137635.png',NULL),
	(35,'','Mama Said',0.00,0.000,2,1198847,'1992-07-11','http://userserve-ak.last.fm/serve/300x300/102137635.png',NULL),
	(36,'/assets/data/Michael Jackson - The Way You Love Me.mp3','(I Like) The Way You Love Me',0.00,273.000,1,105349,'2010-12-13','http://userserve-ak.last.fm/serve/174s/88031225.png',NULL),
	(37,'','Michael',0.00,0.000,2,1421062,'2010-12-13','http://userserve-ak.last.fm/serve/174s/88031225.png',NULL),
	(38,'/assets/data/Nina Simone - My Baby Just Cares For Me.mp3','My Baby Just Cares For Me',0.00,221.000,1,1623146,'2011-01-21','http://userserve-ak.last.fm/serve/174s/58574871.png',NULL),
	(39,'','Little Girl Blue',0.00,0.000,2,772801,'2011-01-21','http://userserve-ak.last.fm/serve/174s/58574871.png',NULL),
	(40,'','Delicate Sound Of Thunder (disc 1)',0.00,0.000,2,271829,'1988-11-22','http://userserve-ak.last.fm/serve/174s/78359838.png',NULL),
	(41,'/assets/data/Delicate Sound Of Thunder/01 Shine On You Crazy Diamond.mp3','Shine on You Crazy Diamond',0.00,719.000,1,0,'1988-11-22','http://userserve-ak.last.fm/serve/174s/78359838.png',NULL),
	(42,'/assets/data/Delicate Sound Of Thunder/02 Learning To Fly.mp3','Learning To Fly',0.00,291.000,1,0,'1988-11-22','http://userserve-ak.last.fm/serve/174s/78359838.png',NULL),
	(43,'/assets/data/Delicate Sound Of Thunder/03 Yet Another Movie.mp3','Yet Another Movie',0.00,446.000,1,0,'1988-11-22','http://userserve-ak.last.fm/serve/174s/78359838.png',NULL),
	(44,'/assets/data/Delicate Sound Of Thunder/04 Round And Around.mp3','Round and Around',0.00,119.000,1,0,'1988-11-22','http://userserve-ak.last.fm/serve/174s/78359838.png',NULL),
	(45,'/assets/data/Delicate Sound Of Thunder/05 Sorrow.mp3','Sorrow',0.00,566.000,1,0,'1988-11-22','http://userserve-ak.last.fm/serve/174s/78359838.png',NULL),
	(46,'/assets/data/Delicate Sound Of Thunder/06 The Dogs Of War.mp3','The Dogs of War',0.00,369.000,1,0,'1988-11-22','http://userserve-ak.last.fm/serve/174s/78359838.png',NULL),
	(47,'/assets/data/Delicate Sound Of Thunder/07 On The Turning Away.mp3','On the Turning Away',0.00,339.000,1,0,'1988-11-22','http://userserve-ak.last.fm/serve/174s/78359838.png',NULL),
	(48,'','Delicate Sound Of Thunder (disc 2)',0.00,0.000,2,224381,'1988-11-22','http://userserve-ak.last.fm/serve/174s/78359842.png',NULL),
	(49,'/assets/data/Delicate Sound Of Thunder/01 One Of These Days.mp3','One of These Days',0.00,374.000,1,0,'1988-11-22','http://userserve-ak.last.fm/serve/174s/78359842.png',NULL),
	(50,'/assets/data/Delicate Sound Of Thunder/02 Time.mp3','Time',0.00,427.000,1,0,'1988-11-22','http://userserve-ak.last.fm/serve/174s/78359842.png',NULL),
	(51,'/assets/data/Delicate Sound Of Thunder/03 Wish You Were Here.mp3','Wish You Were Here',0.00,280.000,1,0,'1988-11-22','http://userserve-ak.last.fm/serve/174s/78359842.png',NULL),
	(52,'/assets/data/Delicate Sound Of Thunder/04 Us & Them.mp3','Us and Them',0.00,471.000,1,0,'1988-11-22','http://userserve-ak.last.fm/serve/174s/78359842.png',NULL),
	(53,'/assets/data/Delicate Sound Of Thunder/05 Money.mp3','Money',0.00,402.000,1,0,'1988-11-22','http://userserve-ak.last.fm/serve/174s/78359842.png',NULL),
	(54,'/assets/data/Delicate Sound Of Thunder/06 Another Brick In The Wall, Part II.mp3','Another Brick in the Wall, Part II',0.00,198.000,1,0,'1988-11-22','http://userserve-ak.last.fm/serve/174s/78359842.png',NULL),
	(55,'/assets/data/Delicate Sound Of Thunder/07 Comfortably Numb.mp3','Comfortably Numb',0.00,538.000,1,0,'1988-11-22','http://userserve-ak.last.fm/serve/174s/78359842.png',NULL),
	(56,'/assets/data/Delicate Sound Of Thunder/08 Run Like Hell.mp3','Run Like Hell',0.00,428.000,1,0,'1988-11-22','http://userserve-ak.last.fm/serve/174s/78359842.png',NULL),
	(57,'/assets/data/Prince - The Work Pt.1.mp3','The Work Pt.1',0.00,268.000,1,0,'2001-11-20','http://userserve-ak.last.fm/serve/174s/88034205.png',NULL),
	(58,'','The Rainbow Children',0.00,0.000,2,0,'2001-11-20','http://userserve-ak.last.fm/serve/174s/88034205.png',NULL);

/*!40000 ALTER TABLE `item` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table itemartiste
# ------------------------------------------------------------

DROP TABLE IF EXISTS `itemartiste`;

CREATE TABLE `itemartiste` (
  `idItem` int(11) NOT NULL,
  `idArtiste` int(11) NOT NULL,
  PRIMARY KEY (`idItem`,`idArtiste`),
  KEY `IDX_E3CDA7036CE67B80` (`idItem`),
  KEY `IDX_E3CDA7038CBE5EBD` (`idArtiste`),
  CONSTRAINT `FK_E3CDA7036CE67B80` FOREIGN KEY (`idItem`) REFERENCES `item` (`id`),
  CONSTRAINT `FK_E3CDA7038CBE5EBD` FOREIGN KEY (`idArtiste`) REFERENCES `artiste` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `itemartiste` WRITE;
/*!40000 ALTER TABLE `itemartiste` DISABLE KEYS */;

INSERT INTO `itemartiste` (`idItem`, `idArtiste`)
VALUES
	(20,5),
	(21,5),
	(22,6),
	(23,6),
	(24,7),
	(25,7),
	(26,8),
	(27,8),
	(28,9),
	(29,9),
	(30,10),
	(31,10),
	(32,11),
	(33,11),
	(34,12),
	(35,12),
	(36,13),
	(37,13),
	(38,14),
	(39,14),
	(40,15),
	(41,15),
	(42,15),
	(43,15),
	(44,15),
	(45,15),
	(46,15),
	(47,15),
	(48,15),
	(49,15),
	(50,15),
	(51,15),
	(52,15),
	(53,15),
	(54,15),
	(55,15),
	(56,15),
	(57,16),
	(58,16);

/*!40000 ALTER TABLE `itemartiste` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table itemgenre
# ------------------------------------------------------------

DROP TABLE IF EXISTS `itemgenre`;

CREATE TABLE `itemgenre` (
  `idItem` int(11) NOT NULL,
  `idGenre` int(11) NOT NULL,
  PRIMARY KEY (`idItem`,`idGenre`),
  KEY `IDX_164507186CE67B80` (`idItem`),
  KEY `IDX_16450718949470E5` (`idGenre`),
  CONSTRAINT `FK_164507186CE67B80` FOREIGN KEY (`idItem`) REFERENCES `item` (`id`),
  CONSTRAINT `FK_16450718949470E5` FOREIGN KEY (`idGenre`) REFERENCES `genre` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `itemgenre` WRITE;
/*!40000 ALTER TABLE `itemgenre` DISABLE KEYS */;

INSERT INTO `itemgenre` (`idItem`, `idGenre`)
VALUES
	(20,92),
	(20,93),
	(20,94),
	(20,95),
	(24,2),
	(24,96),
	(24,97),
	(24,98),
	(26,99),
	(26,100),
	(26,101),
	(26,102),
	(28,99),
	(28,100),
	(28,101),
	(28,102),
	(30,95),
	(30,103),
	(30,104),
	(30,105),
	(32,99),
	(32,106),
	(32,107),
	(32,108),
	(34,2),
	(34,92),
	(34,99),
	(34,107),
	(36,2),
	(36,92),
	(36,94),
	(36,95),
	(38,92),
	(38,96),
	(38,101),
	(38,109),
	(41,99),
	(41,102),
	(41,110),
	(41,111),
	(42,99),
	(42,102),
	(42,110),
	(42,111),
	(43,99),
	(43,102),
	(43,110),
	(43,111),
	(44,99),
	(44,102),
	(44,110),
	(44,111),
	(45,99),
	(45,102),
	(45,110),
	(45,111),
	(46,99),
	(46,102),
	(46,110),
	(46,111),
	(47,99),
	(47,102),
	(47,110),
	(47,111),
	(49,99),
	(49,102),
	(49,110),
	(49,111),
	(50,99),
	(50,102),
	(50,110),
	(50,111),
	(51,99),
	(51,102),
	(51,110),
	(51,111),
	(52,99),
	(52,102),
	(52,110),
	(52,111),
	(53,99),
	(53,102),
	(53,110),
	(53,111),
	(54,99),
	(54,102),
	(54,110),
	(54,111),
	(55,99),
	(55,102),
	(55,110),
	(55,111),
	(56,99),
	(56,102),
	(56,110),
	(56,111),
	(57,2),
	(57,95),
	(57,99),
	(57,112);

/*!40000 ALTER TABLE `itemgenre` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table itemitem
# ------------------------------------------------------------

DROP TABLE IF EXISTS `itemitem`;

CREATE TABLE `itemitem` (
  `idItem` int(11) NOT NULL,
  `idAlbum` int(11) NOT NULL,
  PRIMARY KEY (`idItem`,`idAlbum`),
  KEY `IDX_B56547D66CE67B80` (`idItem`),
  KEY `IDX_B56547D62E5C2D5E` (`idAlbum`),
  CONSTRAINT `FK_B56547D62E5C2D5E` FOREIGN KEY (`idAlbum`) REFERENCES `item` (`id`),
  CONSTRAINT `FK_B56547D66CE67B80` FOREIGN KEY (`idItem`) REFERENCES `item` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `itemitem` WRITE;
/*!40000 ALTER TABLE `itemitem` DISABLE KEYS */;

INSERT INTO `itemitem` (`idItem`, `idAlbum`)
VALUES
	(20,21),
	(22,23),
	(24,25),
	(26,27),
	(28,29),
	(30,31),
	(32,33),
	(34,34),
	(36,37),
	(38,39),
	(41,40),
	(42,40),
	(43,40),
	(44,40),
	(45,40),
	(46,40),
	(47,40),
	(49,48),
	(50,48),
	(51,48),
	(52,48),
	(53,48),
	(54,48),
	(55,48),
	(56,48),
	(57,58);

/*!40000 ALTER TABLE `itemitem` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table itemplaylist
# ------------------------------------------------------------

DROP TABLE IF EXISTS `itemplaylist`;

CREATE TABLE `itemplaylist` (
  `idPlaylist` int(11) NOT NULL,
  `idItem` int(11) NOT NULL,
  PRIMARY KEY (`idPlaylist`,`idItem`),
  KEY `IDX_A897D60484213B76` (`idPlaylist`),
  KEY `IDX_A897D6046CE67B80` (`idItem`),
  CONSTRAINT `FK_A897D6046CE67B80` FOREIGN KEY (`idItem`) REFERENCES `item` (`id`),
  CONSTRAINT `FK_A897D60484213B76` FOREIGN KEY (`idPlaylist`) REFERENCES `playlist` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table langue
# ------------------------------------------------------------

DROP TABLE IF EXISTS `langue`;

CREATE TABLE `langue` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `langue` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table musique
# ------------------------------------------------------------

DROP TABLE IF EXISTS `musique`;

CREATE TABLE `musique` (
  `tempo` decimal(10,3) NOT NULL,
  `mode` int(11) NOT NULL,
  `loudness` decimal(10,3) NOT NULL,
  `energy` decimal(6,6) NOT NULL,
  `hotttness` decimal(6,6) NOT NULL,
  `danceability` decimal(6,6) NOT NULL,
  `idItem` int(11) NOT NULL,
  PRIMARY KEY (`idItem`),
  CONSTRAINT `FK_EE1D56BC6CE67B80` FOREIGN KEY (`idItem`) REFERENCES `item` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `musique` WRITE;
/*!40000 ALTER TABLE `musique` DISABLE KEYS */;

INSERT INTO `musique` (`tempo`, `mode`, `loudness`, `energy`, `hotttness`, `danceability`, `idItem`)
VALUES
	(98.371,1,-17.350,0.302218,0.620045,0.836937,20),
	(67.461,1,-9.594,0.455032,0.627148,0.571207,24),
	(110.885,1,-8.893,0.746872,0.213081,0.398666,26),
	(107.514,0,-12.218,0.765402,0.496059,0.237216,28),
	(126.936,1,-16.163,0.469271,0.130988,0.605114,30),
	(81.317,1,-10.407,0.587980,0.686660,0.473385,32),
	(172.805,1,-8.720,0.943829,0.411344,0.255491,34),
	(94.993,1,-4.308,0.660312,0.290723,0.627318,36),
	(118.134,0,-12.902,0.316503,0.476703,0.780127,38),
	(145.700,0,-5.353,0.886114,0.437397,0.239181,41),
	(167.728,1,-9.260,0.718753,0.549666,0.452375,42),
	(94.966,1,-16.178,0.472446,0.132812,0.328262,43),
	(160.437,1,-18.411,0.214158,0.209257,0.425402,44),
	(187.048,1,-9.001,0.855369,0.434207,0.184822,45),
	(86.014,1,-13.461,0.562977,0.000000,0.273390,46),
	(101.902,1,-15.370,0.404447,0.000000,0.301497,47),
	(129.006,1,-15.513,0.771783,0.000000,0.302946,49),
	(116.954,0,-6.778,0.803627,0.583845,0.320859,50),
	(127.254,1,-17.004,0.372018,0.739751,0.385285,51),
	(77.661,1,-6.346,0.713515,0.553224,0.263363,52),
	(125.633,0,-9.732,0.513372,0.571099,0.484909,53),
	(107.758,0,-19.573,0.406788,0.651496,0.454217,55),
	(121.587,1,-10.013,0.825633,0.308669,0.602654,56);

/*!40000 ALTER TABLE `musique` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table note
# ------------------------------------------------------------

DROP TABLE IF EXISTS `note`;

CREATE TABLE `note` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `note` decimal(5,2) NOT NULL,
  `date` date NOT NULL,
  `idUtilisateur` int(11) DEFAULT NULL,
  `idArtiste` int(11) DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idItem` int(11) DEFAULT NULL,
  `idTag` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CFBDFA145D419CCB` (`idUtilisateur`),
  KEY `IDX_CFBDFA148CBE5EBD` (`idArtiste`),
  KEY `IDX_CFBDFA146CE67B80` (`idItem`),
  CONSTRAINT `FK_CFBDFA145D419CCB` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`id`),
  CONSTRAINT `FK_CFBDFA146CE67B80` FOREIGN KEY (`idItem`) REFERENCES `item` (`id`),
  CONSTRAINT `FK_CFBDFA148CBE5EBD` FOREIGN KEY (`idArtiste`) REFERENCES `artiste` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `note` WRITE;
/*!40000 ALTER TABLE `note` DISABLE KEYS */;

INSERT INTO `note` (`id`, `note`, `date`, `idUtilisateur`, `idArtiste`, `type`, `idItem`, `idTag`)
VALUES
	(1,1.00,'2015-03-31',1,NULL,'2',20,1),
	(2,1.00,'2015-03-31',2,NULL,'2',20,1);

/*!40000 ALTER TABLE `note` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table notetagitem
# ------------------------------------------------------------

DROP TABLE IF EXISTS `notetagitem`;

CREATE TABLE `notetagitem` (
  `idItem` int(11) NOT NULL,
  `idTag` int(11) NOT NULL,
  `note` decimal(5,2) DEFAULT NULL,
  PRIMARY KEY (`idItem`,`idTag`),
  KEY `idItem` (`idItem`),
  KEY `idTag` (`idTag`),
  CONSTRAINT `notetagitem_ibfk_1` FOREIGN KEY (`idItem`) REFERENCES `item` (`id`),
  CONSTRAINT `notetagitem_ibfk_2` FOREIGN KEY (`idTag`) REFERENCES `tag` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `notetagitem` WRITE;
/*!40000 ALTER TABLE `notetagitem` DISABLE KEYS */;

INSERT INTO `notetagitem` (`idItem`, `idTag`, `note`)
VALUES
	(20,1,1.00),
	(20,2,NULL);

/*!40000 ALTER TABLE `notetagitem` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table playlist
# ------------------------------------------------------------

DROP TABLE IF EXISTS `playlist`;

CREATE TABLE `playlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `dateCreation` date NOT NULL,
  `idUtilisateur` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_D782112D5D419CCB` (`idUtilisateur`),
  CONSTRAINT `FK_D782112D5D419CCB` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `playlist` WRITE;
/*!40000 ALTER TABLE `playlist` DISABLE KEYS */;

INSERT INTO `playlist` (`id`, `nom`, `dateCreation`, `idUtilisateur`)
VALUES
	(1,'Musique préférée','2015-01-01',1),
	(11,'Test','2015-03-04',2);

/*!40000 ALTER TABLE `playlist` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table session
# ------------------------------------------------------------

DROP TABLE IF EXISTS `session`;

CREATE TABLE `session` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dateDebut` datetime NOT NULL,
  `dateFin` datetime DEFAULT NULL,
  `idUtilisateur` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_D044D5D45D419CCB` (`idUtilisateur`),
  CONSTRAINT `FK_D044D5D45D419CCB` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `session` WRITE;
/*!40000 ALTER TABLE `session` DISABLE KEYS */;

INSERT INTO `session` (`id`, `dateDebut`, `dateFin`, `idUtilisateur`)
VALUES
	(4,'2015-03-04 09:14:45',NULL,2);

/*!40000 ALTER TABLE `session` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table sessionecoute
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sessionecoute`;

CREATE TABLE `sessionecoute` (
  `idSession` int(11) NOT NULL,
  `idEcoute` int(11) NOT NULL,
  PRIMARY KEY (`idSession`,`idEcoute`),
  KEY `IDX_21D80256C0FDBE26` (`idSession`),
  KEY `IDX_21D80256138CFE86` (`idEcoute`),
  CONSTRAINT `FK_21D80256138CFE86` FOREIGN KEY (`idEcoute`) REFERENCES `ecoute` (`id`),
  CONSTRAINT `FK_21D80256C0FDBE26` FOREIGN KEY (`idSession`) REFERENCES `session` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table sessionplaylist
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sessionplaylist`;

CREATE TABLE `sessionplaylist` (
  `idPlaylist` int(11) NOT NULL,
  `idSession` int(11) NOT NULL,
  PRIMARY KEY (`idPlaylist`,`idSession`),
  KEY `IDX_B112720A84213B76` (`idPlaylist`),
  KEY `IDX_B112720AC0FDBE26` (`idSession`),
  CONSTRAINT `FK_B112720A84213B76` FOREIGN KEY (`idPlaylist`) REFERENCES `playlist` (`id`),
  CONSTRAINT `FK_B112720AC0FDBE26` FOREIGN KEY (`idSession`) REFERENCES `session` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table tag
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tag`;

CREATE TABLE `tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `tag` WRITE;
/*!40000 ALTER TABLE `tag` DISABLE KEYS */;

INSERT INTO `tag` (`id`, `libelle`)
VALUES
	(1,'Zen'),
	(2,'Pop'),
	(3,'Fun'),
	(4,'Magic');

/*!40000 ALTER TABLE `tag` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tagartiste
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tagartiste`;

CREATE TABLE `tagartiste` (
  `idTag` int(11) NOT NULL,
  `idArtiste` int(11) NOT NULL,
  PRIMARY KEY (`idTag`,`idArtiste`),
  KEY `IDX_8C759BE022C1AA04` (`idTag`),
  KEY `IDX_8C759BE08CBE5EBD` (`idArtiste`),
  CONSTRAINT `FK_8C759BE022C1AA04` FOREIGN KEY (`idTag`) REFERENCES `tag` (`id`),
  CONSTRAINT `FK_8C759BE08CBE5EBD` FOREIGN KEY (`idArtiste`) REFERENCES `artiste` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table tagplaylist
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tagplaylist`;

CREATE TABLE `tagplaylist` (
  `idTag` int(11) NOT NULL,
  `idPlaylist` int(11) NOT NULL,
  PRIMARY KEY (`idTag`,`idPlaylist`),
  KEY `IDX_91FBDDFA22C1AA04` (`idTag`),
  KEY `IDX_91FBDDFA84213B76` (`idPlaylist`),
  CONSTRAINT `FK_91FBDDFA22C1AA04` FOREIGN KEY (`idTag`) REFERENCES `tag` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_91FBDDFA84213B76` FOREIGN KEY (`idPlaylist`) REFERENCES `playlist` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `tagplaylist` WRITE;
/*!40000 ALTER TABLE `tagplaylist` DISABLE KEYS */;

INSERT INTO `tagplaylist` (`idTag`, `idPlaylist`)
VALUES
	(1,1),
	(2,1),
	(2,11);

/*!40000 ALTER TABLE `tagplaylist` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tagsession
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tagsession`;

CREATE TABLE `tagsession` (
  `idTag` int(11) NOT NULL,
  `idSession` int(11) NOT NULL,
  PRIMARY KEY (`idTag`,`idSession`),
  KEY `IDX_C0367B7B22C1AA04` (`idTag`),
  KEY `IDX_C0367B7BC0FDBE26` (`idSession`),
  CONSTRAINT `FK_C0367B7B22C1AA04` FOREIGN KEY (`idTag`) REFERENCES `tag` (`id`),
  CONSTRAINT `FK_C0367B7BC0FDBE26` FOREIGN KEY (`idSession`) REFERENCES `session` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table typeaction
# ------------------------------------------------------------

DROP TABLE IF EXISTS `typeaction`;

CREATE TABLE `typeaction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `typeaction` WRITE;
/*!40000 ALTER TABLE `typeaction` DISABLE KEYS */;

INSERT INTO `typeaction` (`id`, `libelle`)
VALUES
	(1,'Block'),
	(2,'Like'),
	(3,'Share');

/*!40000 ALTER TABLE `typeaction` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table typeinteraction
# ------------------------------------------------------------

DROP TABLE IF EXISTS `typeinteraction`;

CREATE TABLE `typeinteraction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `typeinteraction` WRITE;
/*!40000 ALTER TABLE `typeinteraction` DISABLE KEYS */;

INSERT INTO `typeinteraction` (`id`, `libelle`)
VALUES
	(1,'Next'),
	(2,'Previous'),
	(3,'Stop'),
	(4,'Play'),
	(5,'Mute'),
	(6,'Loop'),
	(7,'Block'),
	(8,'Random'),
	(9,'Like');

/*!40000 ALTER TABLE `typeinteraction` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table utilisateur
# ------------------------------------------------------------

DROP TABLE IF EXISTS `utilisateur`;

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `dateInscription` date NOT NULL,
  `birthdate` date NOT NULL,
  `genre` tinyint(1) NOT NULL,
  `pays` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `utilisateur` WRITE;
/*!40000 ALTER TABLE `utilisateur` DISABLE KEYS */;

INSERT INTO `utilisateur` (`id`, `dateInscription`, `birthdate`, `genre`, `pays`)
VALUES
	(1,'2015-01-07','1917-09-15',1,'Turquie'),
	(2,'2015-03-03','1901-12-01',0,'Afghanistan'),
	(3,'2015-03-16','1901-12-01',1,'Afghanistan');

/*!40000 ALTER TABLE `utilisateur` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table utilisateuramis
# ------------------------------------------------------------

DROP TABLE IF EXISTS `utilisateuramis`;

CREATE TABLE `utilisateuramis` (
  `idUtilisateur` int(11) NOT NULL,
  `idUtilisateurAmi` int(11) NOT NULL,
  PRIMARY KEY (`idUtilisateur`,`idUtilisateurAmi`),
  KEY `IDX_5FC542E85D419CCB` (`idUtilisateur`),
  KEY `IDX_5FC542E82BF13F1F` (`idUtilisateurAmi`),
  CONSTRAINT `FK_5FC542E82BF13F1F` FOREIGN KEY (`idUtilisateurAmi`) REFERENCES `utilisateur` (`id`),
  CONSTRAINT `FK_5FC542E85D419CCB` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `utilisateuramis` WRITE;
/*!40000 ALTER TABLE `utilisateuramis` DISABLE KEYS */;

INSERT INTO `utilisateuramis` (`idUtilisateur`, `idUtilisateurAmi`)
VALUES
	(1,2),
	(2,1),
	(2,3);

/*!40000 ALTER TABLE `utilisateuramis` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table video
# ------------------------------------------------------------

DROP TABLE IF EXISTS `video`;

CREATE TABLE `video` (
  `description` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `qualite` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `idItem` int(11) NOT NULL,
  PRIMARY KEY (`idItem`),
  CONSTRAINT `FK_7CC7DA2C6CE67B80` FOREIGN KEY (`idItem`) REFERENCES `item` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table videolangue
# ------------------------------------------------------------

DROP TABLE IF EXISTS `videolangue`;

CREATE TABLE `videolangue` (
  `idVideo` int(11) NOT NULL,
  `idLangue` int(11) NOT NULL,
  PRIMARY KEY (`idVideo`,`idLangue`),
  KEY `IDX_960D90B06B039931` (`idVideo`),
  KEY `IDX_960D90B0F046DD14` (`idLangue`),
  CONSTRAINT `FK_960D90B06B039931` FOREIGN KEY (`idVideo`) REFERENCES `video` (`idItem`),
  CONSTRAINT `FK_960D90B0F046DD14` FOREIGN KEY (`idLangue`) REFERENCES `langue` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

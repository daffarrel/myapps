# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 47.74.234.241 (MySQL 5.5.64-MariaDB)
# Database: db_myapps
# Generation Time: 2020-01-11 07:22:51 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table ci_sessions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ci_sessions`;

CREATE TABLE `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table demurage
# ------------------------------------------------------------

DROP TABLE IF EXISTS `demurage`;

CREATE TABLE `demurage` (
  `id_demurage` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_doc` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `period` varchar(45) DEFAULT NULL,
  `cost` int(11) DEFAULT NULL,
  `invoice_num` varchar(45) DEFAULT NULL,
  `soft_delete` int(2) NOT NULL DEFAULT '0',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user` varchar(225) DEFAULT NULL,
  `update_timestamp` datetime DEFAULT NULL,
  `update_user` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`id_demurage`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table detention
# ------------------------------------------------------------

DROP TABLE IF EXISTS `detention`;

CREATE TABLE `detention` (
  `id_detention` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_doc` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `period` varchar(45) DEFAULT NULL,
  `cost` int(11) DEFAULT NULL,
  `invoice_num` varchar(45) DEFAULT NULL,
  `soft_delete` int(2) NOT NULL DEFAULT '0',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user` varchar(225) DEFAULT NULL,
  `update_timestamp` datetime DEFAULT NULL,
  `update_user` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`id_detention`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table doring
# ------------------------------------------------------------

DROP TABLE IF EXISTS `doring`;

CREATE TABLE `doring` (
  `id_doring` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_doc` int(11) DEFAULT NULL,
  `safeconduct_num` varchar(45) NOT NULL,
  `id_route` int(11) DEFAULT NULL,
  `fare` int(100) NOT NULL DEFAULT '0',
  `dk_lk` enum('DK','LK') DEFAULT NULL,
  `on_chassis` date DEFAULT NULL,
  `unload_date` date DEFAULT NULL,
  `id_truck` int(11) DEFAULT NULL,
  `id_driver` int(11) DEFAULT NULL,
  `done` int(11) NOT NULL DEFAULT '0',
  `soft_delete` int(2) NOT NULL DEFAULT '0',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user` varchar(225) DEFAULT NULL,
  `update_timestamp` datetime DEFAULT NULL,
  `update_user` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`id_doring`),
  UNIQUE KEY `safeconduct_num_UNIQUE` (`safeconduct_num`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `doring` WRITE;
/*!40000 ALTER TABLE `doring` DISABLE KEYS */;

INSERT INTO `doring` (`id_doring`, `id_doc`, `safeconduct_num`, `id_route`, `fare`, `dk_lk`, `on_chassis`, `unload_date`, `id_truck`, `id_driver`, `done`, `soft_delete`, `timestamp`, `user`, `update_timestamp`, `update_user`)
VALUES
	(1,1,'575',3,1100000,'LK','2019-11-02','2019-11-02',1,2,0,0,'2019-11-19 23:31:18',NULL,NULL,NULL),
	(2,1,'123123',3,1100000,'DK','2019-11-21','2019-11-28',3,2,0,0,'2019-11-20 11:36:08',NULL,NULL,NULL),
	(3,1,'1232',3,1100000,'DK','2019-10-16','2019-10-23',2,1,0,0,'2019-11-20 11:36:39',NULL,NULL,NULL),
	(4,1,'33333',4,800000,'DK','2019-09-18','2019-11-20',3,2,0,0,'2019-11-20 11:46:22',NULL,NULL,NULL),
	(5,1,'444',3,1100000,'LK','2019-12-02','2019-12-11',4,2,0,0,'2019-11-20 11:53:05',NULL,NULL,NULL),
	(6,1,'12312323',2,275000,'LK','2019-08-07','2019-11-20',2,1,0,0,'2019-11-20 13:17:30',NULL,NULL,NULL),
	(7,1,'ki909',3,1100000,'DK','2019-09-12','2019-11-14',5,1,0,0,'2019-11-20 15:40:09',NULL,NULL,NULL),
	(8,1,'1111111',2,275000,'DK','2019-11-28','2019-11-20',4,1,0,0,'2019-11-23 16:23:42',NULL,NULL,NULL),
	(10,1,'111111111',2,275000,'DK','2019-11-27','2019-11-19',3,3,0,0,'2019-11-23 16:24:26',NULL,NULL,NULL);

/*!40000 ALTER TABLE `doring` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table doring_doc
# ------------------------------------------------------------

DROP TABLE IF EXISTS `doring_doc`;

CREATE TABLE `doring_doc` (
  `id_doring_doc` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_doring` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `jenis_dokumen` varchar(255) DEFAULT NULL,
  `no_dokumen` varchar(255) DEFAULT NULL,
  `checklist` enum('yes','no') DEFAULT 'no',
  `file` varchar(255) DEFAULT NULL,
  `soft_delete` int(2) NOT NULL DEFAULT '0',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user` varchar(225) DEFAULT NULL,
  `update_timestamp` datetime DEFAULT NULL,
  `update_user` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`id_doring_doc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `doring_doc` WRITE;
/*!40000 ALTER TABLE `doring_doc` DISABLE KEYS */;

INSERT INTO `doring_doc` (`id_doring_doc`, `id_doring`, `date`, `jenis_dokumen`, `no_dokumen`, `checklist`, `file`, `soft_delete`, `timestamp`, `user`, `update_timestamp`, `update_user`)
VALUES
	(1,1,'2019-11-18','Berita Acara','89','yes',NULL,0,'2019-11-19 23:31:18',NULL,NULL,NULL),
	(2,1,'2019-11-18','Berita Acara','8998','yes','dokumen/doring/1/2/ACFrOgAoGuHcf4B2EfRr7zvyWs5SW6DvbUDo-zDuNNalVPld__hcMeSdgQTixUVG9f9gYZqVV-rqUVwjGCUNMBXZ5Ne2xg7SKf_3B6fLPNnREZw9WTuKqaBwgrm1F1I.pdf',0,'2019-11-19 23:31:18',NULL,NULL,NULL),
	(3,1,'2019-11-18','Berita Acara','8998','no',NULL,0,'2019-11-19 23:31:18',NULL,NULL,NULL),
	(4,1,'2019-11-18','Berita Acara','8998','no',NULL,0,'2019-11-19 23:31:18',NULL,NULL,NULL),
	(5,2,'2019-11-18','Berita Acara','89','no',NULL,0,'2019-11-20 11:36:08',NULL,NULL,NULL),
	(6,2,'2019-11-18','Berita Acara','8998','no',NULL,0,'2019-11-20 11:36:08',NULL,NULL,NULL),
	(7,2,'2019-11-18','Berita Acara','8998','no',NULL,0,'2019-11-20 11:36:08',NULL,NULL,NULL),
	(8,2,'2019-11-18','Berita Acara','8998','no',NULL,0,'2019-11-20 11:36:08',NULL,NULL,NULL),
	(9,3,'2019-11-18','Berita Acara','89','no',NULL,0,'2019-11-20 11:36:39',NULL,NULL,NULL),
	(10,3,'2019-11-18','Berita Acara','8998','no',NULL,0,'2019-11-20 11:36:39',NULL,NULL,NULL),
	(11,3,'2019-11-18','Berita Acara','8998','no',NULL,0,'2019-11-20 11:36:39',NULL,NULL,NULL),
	(12,3,'2019-11-18','Berita Acara','8998','no',NULL,0,'2019-11-20 11:36:39',NULL,NULL,NULL),
	(13,4,'2019-11-18','Berita Acara','89','no',NULL,0,'2019-11-20 11:46:22',NULL,NULL,NULL),
	(14,4,'2019-11-18','Berita Acara','8998','no',NULL,0,'2019-11-20 11:46:22',NULL,NULL,NULL),
	(15,4,'2019-11-18','Berita Acara','8998','no',NULL,0,'2019-11-20 11:46:22',NULL,NULL,NULL),
	(16,4,'2019-11-18','Berita Acara','8998','no',NULL,0,'2019-11-20 11:46:22',NULL,NULL,NULL),
	(17,5,'2019-11-18','Berita Acara','89','no',NULL,0,'2019-11-20 11:53:06',NULL,NULL,NULL),
	(18,5,'2019-11-18','Berita Acara','8998','no',NULL,0,'2019-11-20 11:53:06',NULL,NULL,NULL),
	(19,5,'2019-11-18','Berita Acara','8998','no',NULL,0,'2019-11-20 11:53:06',NULL,NULL,NULL),
	(20,5,'2019-11-18','Berita Acara','8998','no',NULL,0,'2019-11-20 11:53:06',NULL,NULL,NULL),
	(21,6,'2019-11-18','Berita Acara','89','no',NULL,0,'2019-11-20 13:17:31',NULL,NULL,NULL),
	(22,6,'2019-11-18','Berita Acara','8998','no',NULL,0,'2019-11-20 13:17:31',NULL,NULL,NULL),
	(23,6,'2019-11-18','Berita Acara','8998','no',NULL,0,'2019-11-20 13:17:31',NULL,NULL,NULL),
	(24,6,'2019-11-18','Berita Acara','8998','no',NULL,0,'2019-11-20 13:17:31',NULL,NULL,NULL),
	(25,7,'2019-11-18','Berita Acara','89','no',NULL,0,'2019-11-20 15:40:09',NULL,NULL,NULL),
	(26,7,'2019-11-18','Berita Acara','8998','no',NULL,0,'2019-11-20 15:40:09',NULL,NULL,NULL),
	(27,7,'2019-11-18','Berita Acara','8998','no',NULL,0,'2019-11-20 15:40:09',NULL,NULL,NULL),
	(28,7,'2019-11-18','Berita Acara','8998','no',NULL,0,'2019-11-20 15:40:09',NULL,NULL,NULL),
	(29,8,'2019-11-18','Berita Acara','89','no',NULL,0,'2019-11-23 16:23:42',NULL,NULL,NULL),
	(30,8,'2019-11-18','Berita Acara','8998','no',NULL,0,'2019-11-23 16:23:42',NULL,NULL,NULL),
	(31,8,'2019-11-18','Berita Acara','8998','no',NULL,0,'2019-11-23 16:23:42',NULL,NULL,NULL),
	(32,8,'2019-11-18','Berita Acara','8998','no',NULL,0,'2019-11-23 16:23:42',NULL,NULL,NULL),
	(33,10,'2019-11-18','Berita Acara','89','no',NULL,0,'2019-11-23 16:24:26',NULL,NULL,NULL),
	(34,10,'2019-11-18','Berita Acara','8998','no',NULL,0,'2019-11-23 16:24:26',NULL,NULL,NULL),
	(35,10,'2019-11-18','Berita Acara','8998','no',NULL,0,'2019-11-23 16:24:26',NULL,NULL,NULL),
	(36,10,'2019-11-18','Berita Acara','8998','no',NULL,0,'2019-11-23 16:24:26',NULL,NULL,NULL);

/*!40000 ALTER TABLE `doring_doc` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table escort_cost
# ------------------------------------------------------------

DROP TABLE IF EXISTS `escort_cost`;

CREATE TABLE `escort_cost` (
  `id_escort_cost` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_doc` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `cost` int(11) DEFAULT NULL,
  `soft_delete` int(2) NOT NULL DEFAULT '0',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user` varchar(225) DEFAULT NULL,
  `update_timestamp` datetime DEFAULT NULL,
  `update_user` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`id_escort_cost`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table etc_cost
# ------------------------------------------------------------

DROP TABLE IF EXISTS `etc_cost`;

CREATE TABLE `etc_cost` (
  `id_etc_cost` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_doc` int(11) NOT NULL,
  `cost` int(11) DEFAULT NULL,
  `note` varchar(45) DEFAULT NULL,
  `soft_delete` int(2) NOT NULL DEFAULT '0',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user` varchar(225) DEFAULT NULL,
  `update_timestamp` datetime DEFAULT NULL,
  `update_user` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`id_etc_cost`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table freight_cost
# ------------------------------------------------------------

DROP TABLE IF EXISTS `freight_cost`;

CREATE TABLE `freight_cost` (
  `id_freight_cost` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_doc` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `cost` int(11) DEFAULT NULL,
  `invoice` varchar(45) DEFAULT NULL,
  `soft_delete` int(2) NOT NULL DEFAULT '0',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user` varchar(225) DEFAULT NULL,
  `update_timestamp` datetime DEFAULT NULL,
  `update_user` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`id_freight_cost`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table fuel_cost
# ------------------------------------------------------------

DROP TABLE IF EXISTS `fuel_cost`;

CREATE TABLE `fuel_cost` (
  `id_fuel_cost` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_doc` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `cost` int(11) DEFAULT NULL,
  `company` varchar(45) DEFAULT NULL,
  `soft_delete` int(2) NOT NULL DEFAULT '0',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user` varchar(225) DEFAULT NULL,
  `update_timestamp` datetime DEFAULT NULL,
  `update_user` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`id_fuel_cost`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table invoice
# ------------------------------------------------------------

DROP TABLE IF EXISTS `invoice`;

CREATE TABLE `invoice` (
  `id_invoice` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `safeconduct_num` varchar(45) NOT NULL,
  `invoice_num` varchar(45) NOT NULL,
  `date` date DEFAULT NULL,
  `nominal` int(11) DEFAULT NULL,
  `type` enum('STORAGE','DEMURAGE','CLAIM','THC','LABOR','EQUIPMENT') DEFAULT NULL,
  `soft_delete` int(2) NOT NULL DEFAULT '0',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user` varchar(225) DEFAULT NULL,
  `update_timestamp` datetime DEFAULT NULL,
  `update_user` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`id_invoice`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table labor_cost
# ------------------------------------------------------------

DROP TABLE IF EXISTS `labor_cost`;

CREATE TABLE `labor_cost` (
  `id_labor_cost` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_doc` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `cost` int(11) unsigned DEFAULT NULL,
  `foreman` varchar(45) DEFAULT NULL,
  `soft_delete` int(2) NOT NULL DEFAULT '0',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user` varchar(225) DEFAULT NULL,
  `update_timestamp` datetime DEFAULT NULL,
  `update_user` datetime DEFAULT NULL,
  PRIMARY KEY (`id_labor_cost`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table m_agent
# ------------------------------------------------------------

DROP TABLE IF EXISTS `m_agent`;

CREATE TABLE `m_agent` (
  `idm_agent` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `agent_name` varchar(100) DEFAULT NULL,
  `address` varchar(120) DEFAULT NULL,
  `telp` varchar(100) DEFAULT NULL,
  `hp` varchar(100) DEFAULT NULL,
  `fax` varchar(100) DEFAULT NULL,
  `fee` int(11) unsigned DEFAULT NULL,
  `soft_delete` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idm_agent`),
  UNIQUE KEY `idm_agent_UNIQUE` (`idm_agent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `m_agent` WRITE;
/*!40000 ALTER TABLE `m_agent` DISABLE KEYS */;

INSERT INTO `m_agent` (`idm_agent`, `agent_name`, `address`, `telp`, `hp`, `fax`, `fee`, `soft_delete`)
VALUES
	(1,'SPILL',NULL,NULL,NULL,NULL,NULL,0),
	(2,'TANTO',' ',' ',' 088212131',' ',NULL,0),
	(3,'PT. TANTO INTIM LINE','JL. INDRAPURA','021 123','0822 023','123',NULL,0),
	(4,'PT. TANTO INTIM LINE','JL. INDRAPURA','021 123','0813','031 3533396',NULL,0);

/*!40000 ALTER TABLE `m_agent` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table m_bank
# ------------------------------------------------------------

DROP TABLE IF EXISTS `m_bank`;

CREATE TABLE `m_bank` (
  `idm_bank` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `bank_code` varchar(45) DEFAULT NULL,
  `bank_name` varchar(45) DEFAULT NULL,
  `soft_delete` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idm_bank`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `m_bank` WRITE;
/*!40000 ALTER TABLE `m_bank` DISABLE KEYS */;

INSERT INTO `m_bank` (`idm_bank`, `bank_code`, `bank_name`, `soft_delete`)
VALUES
	(1,'BBCA','Bank BCA',0),
	(2,'BBRI','Bank BRI',0),
	(3,'BMRI','Bank Mandiri',0),
	(4,'BDMN','Bank Danamon',0),
	(5,'CIMB','Bank CIMB Niaga',0),
	(6,'BBNI','Bank BNI',0),
	(7,'BKTM','Bank Kaltimtara',0),
	(8,'BBTN','Bank BTN',0),
	(9,'PMRT','Permata Bank',0),
	(10,'BBRIS','Bank BRI Syariah',0),
	(11,'TEST','TEST Bank',1);

/*!40000 ALTER TABLE `m_bank` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table m_city
# ------------------------------------------------------------

DROP TABLE IF EXISTS `m_city`;

CREATE TABLE `m_city` (
  `idm_city` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `city_code` varchar(45) DEFAULT NULL,
  `city_name` varchar(45) DEFAULT NULL,
  `soft_delete` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idm_city`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `m_city` WRITE;
/*!40000 ALTER TABLE `m_city` DISABLE KEYS */;

INSERT INTO `m_city` (`idm_city`, `city_code`, `city_name`, `soft_delete`)
VALUES
	(1,'BPN','Balikpapan',0),
	(2,'SMD','Samarinda',0),
	(3,'TRK','Tarakan',0),
	(4,'SBY','Surabaya',0),
	(5,'JKT','Jakarta',0),
	(6,'SMR','Semarang',0),
	(7,'MKS','Makassar',0),
	(8,'KNDR','Kendari',0),
	(9,'MND','Manado',0),
	(10,'BJR','Banjarmasin',0),
	(11,'MDN','Medan',0),
	(12,'WAM','Wamena',0),
	(13,'103','BATAKANn',0);

/*!40000 ALTER TABLE `m_city` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table m_container
# ------------------------------------------------------------

DROP TABLE IF EXISTS `m_container`;

CREATE TABLE `m_container` (
  `idm_container` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `container_number` varchar(45) NOT NULL,
  `size` enum('20','40','N') DEFAULT NULL,
  `id_agent` int(11) DEFAULT NULL,
  `soft_delete` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idm_container`),
  UNIQUE KEY `idm_container_UNIQUE` (`idm_container`),
  UNIQUE KEY `container_number_UNIQUE` (`container_number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `m_container` WRITE;
/*!40000 ALTER TABLE `m_container` DISABLE KEYS */;

INSERT INTO `m_container` (`idm_container`, `container_number`, `size`, `id_agent`, `soft_delete`)
VALUES
	(1,'asdasdasd','40',1,0),
	(2,'9','40',2,0),
	(3,'858','20',3,0),
	(4,'86073','N',1,0),
	(5,'1974653','40',2,0),
	(6,'477763412','N',3,0),
	(7,'77','40',1,0),
	(8,'200115','20',2,0),
	(9,'3968257','N',3,0),
	(10,'731083835','20',1,0),
	(11,'2494399','40',2,0),
	(12,'898251','N',3,0),
	(13,'9219','40',1,0),
	(14,'4349382','N',2,0),
	(15,'453030684','20',3,0),
	(16,'827653638','N',1,0),
	(17,'54590','N',2,0),
	(18,'289569523','20',3,0),
	(19,'443014','N',1,0),
	(20,'8568726','40',2,0),
	(21,'967','N',3,0),
	(22,'640238','40',1,0),
	(23,'883249','40',2,0),
	(24,'54520295','N',3,0),
	(25,'951919','20',1,0),
	(26,'5144416','40',2,0),
	(27,'12068','20',3,0),
	(28,'61074660','40',1,0),
	(29,'5518','40',2,0),
	(30,'18','20',3,0),
	(31,'104295','40',1,0),
	(32,'5','20',2,0),
	(33,'1','20',3,0),
	(34,'30980231','20',1,0),
	(35,'4','20',2,0),
	(36,'63827','20',3,0),
	(37,'915089','20',1,0),
	(38,'6','20',2,0),
	(39,'1791','40',3,0),
	(40,'5848873','20',1,0),
	(41,'8230687','N',2,0),
	(42,'4055','N',3,0),
	(43,'55376','20',1,0),
	(44,'58472203','20',2,0),
	(45,'139','40',3,0),
	(46,'221','20',1,0),
	(47,'445601068','40',2,0),
	(48,'2','20',3,0),
	(49,'370177275','20',1,0),
	(50,'898712942','40',2,0),
	(51,'5061','40',3,0),
	(52,'9809543','N',1,0),
	(53,'56','N',2,0),
	(54,'6855','20',3,0),
	(55,'999','40',1,0),
	(56,'67300','40',2,0),
	(57,'230','20',3,0),
	(58,'93','40',1,0),
	(59,'4618449','40',2,0),
	(60,'33','20',3,0),
	(61,'5199551','20',1,0),
	(62,'496','40',2,0),
	(63,'54122','20',3,0),
	(64,'2946758','40',1,0),
	(65,'831287','N',2,0),
	(66,'7191','20',3,0),
	(67,'98','40',1,0),
	(68,'4209528','N',2,0),
	(69,'15194086','40',3,0),
	(70,'24104','N',1,0),
	(71,'821814869','20',2,0),
	(72,'57585','N',3,0),
	(73,'17','20',1,0),
	(74,'424293','20',2,0),
	(75,'588663954','40',3,0),
	(76,'23','20',1,0),
	(77,'92','20',2,0),
	(78,'3747','40',3,0),
	(79,'950','20',1,0),
	(80,'582','40',2,0),
	(81,'1118','40',3,0),
	(82,'26755588','20',1,0),
	(83,'899747632','20',2,0),
	(84,'68','40',3,0),
	(85,'615562279','20',1,0),
	(86,'8664883','N',2,0),
	(87,'242066780','20',3,0),
	(88,'679','20',1,0),
	(89,'88','N',2,0),
	(90,'593','N',3,0),
	(91,'338259','20',1,0),
	(92,'93588','20',2,0),
	(93,'158054','N',3,0),
	(94,'65','40',1,0),
	(95,'49203','20',2,0),
	(96,'38','40',3,0),
	(97,'681044462','N',1,0),
	(98,'707370','20',2,0),
	(99,'21308346','20',3,0),
	(100,'6006899','20',1,0);

/*!40000 ALTER TABLE `m_container` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table m_document
# ------------------------------------------------------------

DROP TABLE IF EXISTS `m_document`;

CREATE TABLE `m_document` (
  `idm_document` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_doc` varchar(45) DEFAULT NULL,
  `soft_delete` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idm_document`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `m_document` WRITE;
/*!40000 ALTER TABLE `m_document` DISABLE KEYS */;

INSERT INTO `m_document` (`idm_document`, `jenis_doc`, `soft_delete`)
VALUES
	(1,'Surat Jalan',1),
	(2,'Berita Acara',0),
	(3,'Surat Jalan',0),
	(4,'PO',0),
	(5,'DO',0),
	(6,'Inspeksi Kendaraan',0),
	(7,'Shipment Pengirim',0),
	(8,'Shipment Pengirim',1),
	(9,'Lain - lain',0),
	(10,'Lain - lain',1),
	(11,'Ttest',1),
	(12,'asdsad',1),
	(13,'asdsad',1),
	(14,'test',1),
	(15,'Bill of Loading',0);

/*!40000 ALTER TABLE `m_document` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table m_driver
# ------------------------------------------------------------

DROP TABLE IF EXISTS `m_driver`;

CREATE TABLE `m_driver` (
  `idm_driver` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `driver_name` varchar(45) DEFAULT NULL,
  `license_number` varchar(45) DEFAULT NULL,
  `dob` date NOT NULL DEFAULT '1970-01-01',
  `dob_city` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `soft_delete` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idm_driver`),
  UNIQUE KEY `idm_driver_UNIQUE` (`idm_driver`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `m_driver` WRITE;
/*!40000 ALTER TABLE `m_driver` DISABLE KEYS */;

INSERT INTO `m_driver` (`idm_driver`, `driver_name`, `license_number`, `dob`, `dob_city`, `address`, `soft_delete`)
VALUES
	(1,'HENDRA','','0000-00-00','','',0),
	(2,'JUMARDI','','0000-00-00','','',0),
	(3,'NGADIONO','','0000-00-00','','',0),
	(4,'RIDWAN','','0000-00-00','','',0),
	(5,'ZAINAL','','0000-00-00','','',0),
	(6,'ABDUL AZIS','','0000-00-00','','',0),
	(7,'TAMPA','','0000-00-00','','',0),
	(8,'HERU','','0000-00-00','','',0),
	(9,'NOVAN','','0000-00-00','','',0),
	(10,'SUARDI','','0000-00-00','','',0),
	(11,'NISTAN','','0000-00-00','','',0),
	(12,'RASYID','','0000-00-00','','',0),
	(13,'ABD. WAHAB','','0000-00-00','','',0),
	(14,'WAHYUDI','','0000-00-00','','',0),
	(15,'AMIRUDDIN','','0000-00-00','','',0),
	(16,'KAMARUDIN','','0000-00-00','','',0),
	(17,'SABRI','','0000-00-00','','',0),
	(18,'JAHERI','','0000-00-00','','',0),
	(19,'ASRI','','0000-00-00','','',0),
	(20,'DAHLAN','12345','2019-11-26','Balikpapan','JAKARTA',0),
	(21,'DAHLAN','123','2019-11-26','Balikpapan','Balikpapan',0);

/*!40000 ALTER TABLE `m_driver` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table m_option
# ------------------------------------------------------------

DROP TABLE IF EXISTS `m_option`;

CREATE TABLE `m_option` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nama_grup` varchar(20) DEFAULT NULL,
  `subID` varchar(20) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  `soft_delete` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `m_option` WRITE;
/*!40000 ALTER TABLE `m_option` DISABLE KEYS */;

INSERT INTO `m_option` (`id`, `nama_grup`, `subID`, `value`, `soft_delete`)
VALUES
	(1,'truck','TRAILER','Truck Trailer',0),
	(2,'truck','TRONTON','Truck Tronton',0),
	(3,'truck','LB','Long Bed',0),
	(4,'truck','CD','Cold Diesel',0),
	(5,'size','40','40 Feet',0),
	(6,'size','20','20 Feet',0),
	(7,'size','N','Kosong',0),
	(8,'company','CMPY-1','PT. Perdana Semesta Perkasa',0),
	(9,'company','CMPY-2','PT. Paramita Armada Inti',0),
	(10,'jenis_dok','BA','Berita Acara',0),
	(11,'jenis_dok','SRT_JLN','Surat Jalan',0),
	(12,'jenis_dok','INS_KEN','Inspeksi Kendaraan',0),
	(13,'jenis_dok','SHP_PNGRIM','Shipment Pengirim',0),
	(14,'jenis_dok','PO','PO',0),
	(15,'jenis_dok','DO','DO',0),
	(16,'jenis_dok','DELIV','Delivery',0),
	(17,'jenis_dok','RCVING','Receiving',0),
	(18,'jenis_dok','PP','PP',0),
	(19,'jenis_dok','STRIP','Stripping',0),
	(20,'jenis_dok','CNCL_LOAD','Cancel Loading',0),
	(21,'jenis_dok','OTHER','Lain lain',0),
	(22,'jenis_dok','CASHIER','Kasir',0);

/*!40000 ALTER TABLE `m_option` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table m_receiver
# ------------------------------------------------------------

DROP TABLE IF EXISTS `m_receiver`;

CREATE TABLE `m_receiver` (
  `idm_receiver` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `receiver_name` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `telp` varchar(45) DEFAULT NULL,
  `hp` varchar(45) DEFAULT NULL,
  `fax` varchar(45) DEFAULT NULL,
  `corporate_name` varchar(45) DEFAULT NULL,
  `id_bank` int(11) DEFAULT NULL,
  `account_number` varchar(45) DEFAULT NULL,
  `soft_delete` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idm_receiver`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `m_receiver` WRITE;
/*!40000 ALTER TABLE `m_receiver` DISABLE KEYS */;

INSERT INTO `m_receiver` (`idm_receiver`, `receiver_name`, `address`, `city`, `telp`, `hp`, `fax`, `corporate_name`, `id_bank`, `account_number`, `soft_delete`)
VALUES
	(1,'nihil','4759 Rusty EstatesNorth Mortimermouth, IN 05','Nyahaven','520-932-8260x38983','(035)108-9411','+01(2)2773485883','exercitationem',4,'9331973',0),
	(2,'adipisci','8461 Deckow Islands Suite 821\nNorth Nolaborou','Ellastad','+02(2)4414549911','534-833-2248x0314','1-866-073-1951','quod',2,'1750340',0),
	(3,'odio','79757 Lucie Lights Suite 512\nRauside, ME 9594','Thomashaven','349.885.8466','+33(1)3443549359','1-317-609-6778','non',3,'984516',0),
	(4,'praesentium','4668 Major Ridge\nEast Lou, NC 38239','West Shannaland','750-487-8071x7398','314.944.4471x613','833.104.6188','beatae',4,'34707',0),
	(5,'dolores','90196 Deonte Stream\nChamplinmouth, VA 03405','Hartmannborough','01614148770','878-972-6957x017','09553382419','repudiandae',5,'32675842',0),
	(6,'iure','268 Hirthe Centers Suite 563\nEast Clare, DC 9','Isabelleburgh','(520)288-2753','082.752.4747x6216','05206243382','quis',6,'6',0),
	(7,'velit','348 Heaney Wall\nEast Jaleelmouth, PA 94754-94','Borisborough','784-766-1064','144.399.3354','09687573868','autem',7,'4240',0),
	(8,'ut','70175 Hilpert Drives Apt. 947\nTrentchester, H','O\'Keefeburgh','06027644454','042.432.5306','03144394859','dolores',8,'4191',0),
	(9,'omnis','358 Angela Fields\nLavonneborough, MA 96787-83','Krisberg','(351)900-4310x388','03101456491','360.514.3490x896','fuga',9,'50',0),
	(10,'corporis','31435 Naomie Stream\nSidneyview, OH 25170-1760','Lake Matildeberg','+49(8)7772410604','(759)108-0034','1-142-929-0213x771','minus',1,'',0),
	(11,'pariatur','703 Rubye Points Suite 613\nLake Rodolfocheste','West Forrestberg','+26(0)0194268318','077-820-5803','403-625-9862x187','praesentium',2,'786391344',0),
	(12,'molestias','8136 Estelle Road Apt. 297\nEladioport, OK 989','Leslyton','682-526-5631','+47(5)9194854557','1-353-082-8976x4737','voluptates',3,'383924628',0),
	(13,'et','588 Eichmann Spurs Apt. 353\nWisozkmouth, MD 2','Pansyfort','1-651-448-5681x333','+75(8)8982249542','(890)899-8782','aliquam',4,'588168',0),
	(14,'et','1649 Mayer Lane\nBrionnachester, FL 86729-6035','Janellebury','07098545525','1-967-943-9448','478.097.9681x20233','praesentium',5,'62',0),
	(15,'odio','963 Wintheiser Overpass Suite 775\nAlleneburgh','East Raoulhaven','505.550.1329x19123','872.909.3906','08675122950','sequi',6,'81187736',0),
	(16,'quia','713 Pagac Trace\nEast Soniaport, SD 42469','Port Harleyhaven','1-336-764-9452x2767','654-015-6095x8486','00537573335','ipsam',7,'46569155',0),
	(17,'inventore','9823 Koelpin Gardens\nKayliport, RI 11656','New Bertrandville','539.831.8678','573.930.1786','700-477-1192','fuga',8,'7091005',0),
	(18,'delectus','05724 Gutkowski Walk\nNew Alvena, SD 04728-121','Port Monafurt','(168)545-0811','823.852.5139x08583','1-987-304-0969x2055','consectetur',9,'58264',0),
	(19,'quia','213 Skyla Greens\nIrmatown, NY 41005','Port Otis','107-994-9429x2428','00595420943','904-446-0398','dolor',1,'7',0),
	(20,'eum','84766 Nikko Row Apt. 487\nEast Rosalia, AK 946','Port Katlynnmouth','(097)799-5970x5486','489.642.6964','939-530-8368','non',2,'3007504',0),
	(21,'placeat','95740 Batz Place\nJosiahburgh, NM 36567','Greenfeldermouth','317-455-0663x4824','(427)719-9820x8140','321-604-2203x768','pariatur',3,'805279',0),
	(22,'enim','5832 Ross Mills Apt. 526\nFrederickchester, IA','East Delphine','1-248-293-1080x8191','949.950.2508x96458','289.194.5466x177','quidem',4,'1',0),
	(23,'voluptatem','562 Horacio Shoal Apt. 192\nNorth Javonbury, W','South Peterchester','235.119.2737x6978','472.758.2561x586','779-317-4661','beatae',5,'631107',0),
	(24,'non','676 Gaylord Station Apt. 621\nSatterfieldmouth','Monabury','(240)061-4352x97176','+63(2)1018494158','894-753-7743x790','neque',6,'',0),
	(25,'id','14356 Spinka Common\nWest Junius, AR 52877-620','West Lillyfort','05117487999','119-739-6486','02171031608','eos',7,'5157269',0),
	(26,'eveniet','607 Senger Square Apt. 898\nThielside, KY 4727','East Allene','05555738216','(385)781-8264x8869','+33(9)6908238288','quo',8,'940',0),
	(27,'earum','835 Leonardo Manor Apt. 827\nPort Brennan, SD ','Sheldonmouth','1-019-143-3569','481.186.9788x5921','1-846-609-2555','eligendi',9,'472243928',0),
	(28,'dicta','39317 Korbin Dam Apt. 869\nEast Kaseyshire, NH','Dejuanmouth','(974)039-1777x664','1-896-788-1770','867-245-1489','eos',1,'9829237',0),
	(29,'libero','8118 Orin Key\nEulatown, OR 47802-2393','East Opalberg','909.417.1512x182','541-060-5259x738','537.016.5955x1688','itaque',2,'63409',0),
	(30,'suscipit','14795 Ethyl Square\nLabadiefurt, NE 15990','Botsfordfurt','950-893-4173x6695','214.065.9470x5097','(778)488-7849','reprehenderit',3,'80304031',0),
	(31,'placeat','398 Tom Extensions\nSteveland, NY 79682-0714','Mckenziechester','313-268-1877x36267','1-468-821-9312x60980','(590)153-0590','asperiores',4,'385054',0),
	(32,'aut','0954 Torphy Meadow\nWest Mateoland, CT 79238-2','New Bryonmouth','(865)631-0841','1-233-796-2687x77973','757-347-5670x13677','quas',5,'55838',0),
	(33,'laudantium','2979 Viola Tunnel\nEast Curtberg, NY 63528-885','Jeanieborough','675.947.8679','+17(9)2068817830','+59(9)0044567182','eum',6,'566010',0),
	(34,'animi','81123 Wuckert Coves Apt. 943\nNew Helenfort, M','Cyrusville','171-574-5979','1-464-815-5189','158-707-2576x1263','unde',7,'550',0),
	(35,'nihil','1231 Rory Valleys Apt. 893\nNorth Elaina, MN 8','Mohammadhaven','1-011-602-4030','532.741.3155x90423','812.090.5891x773','mollitia',8,'50',0),
	(36,'suscipit','1414 Deckow Groves Suite 233\nNew Mae, NE 1896','Nikkoborough','1-956-000-9825x204','1-582-392-2291x237','745.249.6576','et',9,'',0),
	(37,'ut','05878 Ernser Springs Suite 494\nLoweshire, SC ','North Garthmouth','1-081-599-4320x49814','(044)149-8582','(051)043-1165','accusantium',1,'7664',0),
	(38,'totam','475 Anderson Flats\nWest Alycefort, IA 19652-5','Rickyborough','370-842-3250','596-752-2105x606','+56(1)1349856117','optio',2,'95',0),
	(39,'mollitia','31560 Marjolaine Isle Apt. 107\nBoyleville, OH','Lake Careyport','386-732-2375x48523','548.646.2106x608','(997)358-8536','ipsam',3,'652511',0),
	(40,'sunt','4206 Jabari Dale Apt. 943\nAnthonyton, HI 6437','New Nolan','1-202-697-8221x4592','1-843-518-8972','1-539-550-8891','illum',4,'5842',0),
	(41,'et','87535 Koepp Village\nEunicetown, NM 95514','Fionaville','729-564-3388x43771','027-920-2046','1-359-075-4218x4688','pariatur',5,'2365',0),
	(42,'est','143 Abner Mission Suite 807\nEast Velma, SC 64','New Angelineview','996-380-5580x3557','(383)056-5540','1-720-966-6993x612','atque',6,'3513',0),
	(43,'debitis','0455 Ismael Pine\nEddchester, NC 27235','Quitzonshire','253.936.2218x162','1-671-961-1827x7153','024-512-2023x6381','enim',7,'177218331',0),
	(44,'neque','8413 Myra Island Suite 207\nEast Adahmouth, IL','South Adolf','199.992.0221x431','06512313511','06836395042','tenetur',8,'58012068',0),
	(45,'eum','824 Fahey Ferry Apt. 211\nEast Davontebury, LA','New Laury','870-887-7314x61195','1-974-184-9170x048','+93(3)9505616673','reprehenderit',9,'45205958',0),
	(46,'nostrum','633 Rahsaan Plains Suite 834\nWest Albinboroug','Homenickport','+94(3)7903441414','(291)096-4752x63401','(009)766-1713x04526','est',1,'156281',0),
	(47,'expedita','673 Bins Coves Suite 812\nEast Adeline, MN 676','Melynaport','060.505.0408','(053)378-1483','254-502-9840','libero',2,'9',0),
	(48,'qui','074 Marcellus Tunnel\nVeumfort, OK 36156-5305','East Sim','(730)929-2932x28900','09917977969','802-580-3518','enim',3,'52',0),
	(49,'necessitatibus','75778 Cruickshank Branch\nEast Bud, IL 72526','Grahamview','(559)694-4121x5409','01268860173','+81(0)1917786538','fugit',4,'369',0),
	(50,'non','27409 Fahey Road\nCorwinmouth, NJ 11262-0744','East Halle','+81(6)5706021776','+06(7)2885256605','275-191-2398','reprehenderit',5,'744',0),
	(51,'Test123','Test','Samarinda','131230909','09090123123','123123','PT. Muda Mudi',4,'8989-0909-1231',0);

/*!40000 ALTER TABLE `m_receiver` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table m_route
# ------------------------------------------------------------

DROP TABLE IF EXISTS `m_route`;

CREATE TABLE `m_route` (
  `idm_route` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `route_name` varchar(45) DEFAULT '',
  `origin` varchar(45) DEFAULT NULL,
  `destination` varchar(45) DEFAULT NULL,
  `type` enum('TRAILER','TRONTON','LB','CD') DEFAULT NULL,
  `size` enum('20','40','N') DEFAULT NULL,
  `fare` int(11) DEFAULT NULL,
  `soft_delete` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idm_route`),
  UNIQUE KEY `idm_salary_UNIQUE` (`idm_route`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `m_route` WRITE;
/*!40000 ALTER TABLE `m_route` DISABLE KEYS */;

INSERT INTO `m_route` (`idm_route`, `route_name`, `origin`, `destination`, `type`, `size`, `fare`, `soft_delete`)
VALUES
	(1,'SAMARINDA -  BALIKPAPAN ','SAMARINDA ',' BALIKPAPAN ','TRONTON','20',208000,0),
	(2,'SAMARINDA -  SANGATTA','SAMARINDA ',' SANGATTA','TRONTON','20',275000,0),
	(3,'BALIKPAPAN - BERAU','BALIKPAPAN ',' BERAU','TRONTON','20',1100000,0),
	(4,'BALIKPAPAN - BERAU','BALIKPAPAN ',' BERAU','LB','20',800000,0),
	(5,'BALIKPAPAN - BONTANG','BALIKPAPAN ',' BONTANG','TRAILER','20',300000,0),
	(6,'BALIKPAPAN - BONTANG','BALIKPAPAN ',' BONTANG','TRAILER','40',600000,0),
	(7,'BALIKPAPAN - BONTANG','BALIKPAPAN ',' BONTANG','TRONTON','20',275000,0),
	(8,'BALIKPAPAN - BONTANG','BALIKPAPAN ',' BONTANG','LB','20',225000,0),
	(9,'BALIKPAPAN - BONTANG','BALIKPAPAN ',' BONTANG','LB','N',225000,0),
	(10,'BALIKPAPAN - BT KAJANG','BALIKPAPAN ',' BT KAJANG','TRONTON','20',350000,0),
	(11,'BALIKPAPAN - BT KAJANG','BALIKPAPAN ',' BT KAJANG','TRONTON','N',350000,0),
	(12,'BALIKPAPAN - BT KAJANG','BALIKPAPAN ',' BT KAJANG','LB','20',250000,0),
	(13,'BALIKPAPAN - BT KAJANG','BALIKPAPAN ',' BT KAJANG','LB','N',250000,0),
	(14,'BALIKPAPAN - GN. KUDUNG','BALIKPAPAN ',' GN. KUDUNG','TRAILER','20',800000,0),
	(15,'BALIKPAPAN - GN. KUDUNG','BALIKPAPAN ',' GN. KUDUNG','TRONTON','20',800000,0),
	(16,'BALIKPAPAN - GN. KUDUNG','BALIKPAPAN ',' GN. KUDUNG','LB','20',400000,0),
	(17,'BALIKPAPAN - GN. KUDUNG','BALIKPAPAN ',' GN. KUDUNG','CD','20',225000,0),
	(18,'BALIKPAPAN - GN. KUDUNG','BALIKPAPAN ',' GN. KUDUNG','CD','N',225000,0),
	(19,'BALIKPAPAN - GROGOT','BALIKPAPAN ',' GROGOT','TRAILER','20',350000,0),
	(20,'BALIKPAPAN - GROGOT','BALIKPAPAN ',' GROGOT','TRAILER','40',700000,0),
	(21,'BALIKPAPAN - GROGOT','BALIKPAPAN ',' GROGOT','TRONTON','20',350000,0),
	(22,'BALIKPAPAN - GROGOT','BALIKPAPAN ',' GROGOT','LB','20',190000,0),
	(23,'BALIKPAPAN - GROGOT','BALIKPAPAN ',' GROGOT','LB','N',190000,0),
	(24,'BALIKPAPAN - HANDIL','BALIKPAPAN ',' HANDIL','TRAILER','40',440000,0),
	(25,'BALIKPAPAN - HANDIL','BALIKPAPAN ',' HANDIL','TRONTON','20',208000,0),
	(26,'BALIKPAPAN - HANDIL','BALIKPAPAN ',' HANDIL','TRONTON','40',208000,0),
	(27,'BALIKPAPAN - HANDIL','BALIKPAPAN ',' HANDIL','TRONTON','N',208000,0),
	(28,'BALIKPAPAN - HANDIL','BALIKPAPAN ',' HANDIL','LB','20',160000,0),
	(29,'BALIKPAPAN - HANDIL','BALIKPAPAN ',' HANDIL','LB','N',160000,0),
	(30,'BALIKPAPAN - KOTA BANGUN','BALIKPAPAN ',' KOTA BANGUN','TRAILER','20',275000,0),
	(31,'BALIKPAPAN - KOTA BANGUN','BALIKPAPAN ',' KOTA BANGUN','TRAILER','40',550000,0),
	(32,'BALIKPAPAN - KOTA BANGUN','BALIKPAPAN ',' KOTA BANGUN','TRONTON','20',275000,0),
	(33,'BALIKPAPAN - KOTA BANGUN','BALIKPAPAN ',' KOTA BANGUN','LB','20',200000,0),
	(34,'BALIKPAPAN - KOTA BANGUN','BALIKPAPAN ',' KOTA BANGUN','LB','N',200000,0),
	(35,'BALIKPAPAN - KUARO','BALIKPAPAN ',' KUARO','TRONTON','20',350000,0),
	(36,'BALIKPAPAN - LABANGKA','BALIKPAPAN ',' LABANGKA','LB','N',165000,0),
	(37,'BALIKPAPAN - MELAK','BALIKPAPAN ',' MELAK','TRAILER','20',800000,0),
	(38,'BALIKPAPAN - MELAK','BALIKPAPAN ',' MELAK','TRAILER','40',1600000,0),
	(39,'BALIKPAPAN - MELAK','BALIKPAPAN ',' MELAK','TRONTON','20',800000,0),
	(40,'BALIKPAPAN - MELAK','BALIKPAPAN ',' MELAK','TRONTON','40',800000,0),
	(41,'BALIKPAPAN - MELAK','BALIKPAPAN ',' MELAK','TRONTON','N',800000,0),
	(42,'BALIKPAPAN - MELAK','BALIKPAPAN ',' MELAK','LB','20',400000,0),
	(43,'BALIKPAPAN - MELAK','BALIKPAPAN ',' MELAK','LB','N',400000,0),
	(44,'BALIKPAPAN - MELAK','BALIKPAPAN ',' MELAK','CD','N',200000,0),
	(45,'BALIKPAPAN - MUARA BADAK','BALIKPAPAN ',' MUARA BADAK','TRAILER','20',550000,0),
	(46,'BALIKPAPAN - MUARA BADAK','BALIKPAPAN ',' MUARA BADAK','TRAILER','40',550000,0),
	(47,'BALIKPAPAN - MUARA BADAK','BALIKPAPAN ',' MUARA BADAK','TRAILER','N',550000,0),
	(48,'BALIKPAPAN - MUARA BADAK','BALIKPAPAN ',' MUARA BADAK','TRONTON','20',325000,0),
	(49,'BALIKPAPAN - MUARA BADAK','BALIKPAPAN ',' MUARA BADAK','TRONTON','40',325000,0),
	(50,'BALIKPAPAN - MUARA BADAK','BALIKPAPAN ',' MUARA BADAK','TRONTON','N',325000,0),
	(51,'BALIKPAPAN - MUARA BADAK','BALIKPAPAN ',' MUARA BADAK','LB','N',170000,0),
	(52,'BALIKPAPAN - PENAJAM','BALIKPAPAN ',' PENAJAM','TRAILER','20',190000,0),
	(53,'BALIKPAPAN - PENAJAM','BALIKPAPAN ',' PENAJAM','TRAILER','40',400000,0),
	(54,'BALIKPAPAN - PENAJAM','BALIKPAPAN ',' PENAJAM','TRONTON','20',190000,0),
	(55,'BALIKPAPAN - PENAJAM','BALIKPAPAN ',' PENAJAM','LB','20',150000,0),
	(56,'BALIKPAPAN - PULAU ATAS','BALIKPAPAN ',' PULAU ATAS','TRONTON','20',250000,0),
	(57,'BALIKPAPAN - PULAU ATAS','BALIKPAPAN ',' PULAU ATAS','TRONTON','N',250000,0),
	(58,'BALIKPAPAN - PULAU ATAS','BALIKPAPAN ',' PULAU ATAS','LB','20',190000,0),
	(59,'BALIKPAPAN - PULAU ATAS','BALIKPAPAN ',' PULAU ATAS','LB','N',190000,0),
	(60,'BALIKPAPAN - SAMARINDA','BALIKPAPAN ',' SAMARINDA','TRAILER','20',230000,0),
	(61,'BALIKPAPAN - SAMARINDA','BALIKPAPAN ',' SAMARINDA','TRAILER','40',460000,0),
	(62,'BALIKPAPAN - SAMARINDA','BALIKPAPAN ',' SAMARINDA','TRONTON','20',208000,0),
	(63,'BALIKPAPAN - SAMARINDA','BALIKPAPAN ',' SAMARINDA','TRONTON','N',208000,0),
	(64,'BALIKPAPAN - SAMARINDA','BALIKPAPAN ',' SAMARINDA','LB','20',143000,0),
	(65,'BALIKPAPAN - SAMARINDA','BALIKPAPAN ',' SAMARINDA','LB','N',143000,0),
	(66,'BALIKPAPAN - SAMBOJA','BALIKPAPAN ',' SAMBOJA','TRAILER','20',440000,0),
	(67,'BALIKPAPAN - SAMBOJA','BALIKPAPAN ',' SAMBOJA','TRAILER','40',440000,0),
	(68,'BALIKPAPAN - SAMBOJA','BALIKPAPAN ',' SAMBOJA','TRAILER','N',440000,0),
	(69,'BALIKPAPAN - SAMBOJA','BALIKPAPAN ',' SAMBOJA','TRONTON','20',208000,0),
	(70,'BALIKPAPAN - SAMBOJA','BALIKPAPAN ',' SAMBOJA','TRONTON','N',208000,0),
	(71,'BALIKPAPAN - SAMBOJA','BALIKPAPAN ',' SAMBOJA','LB','20',143000,0),
	(72,'BALIKPAPAN - SAMBOJA','BALIKPAPAN ',' SAMBOJA','LB','N',143000,0),
	(73,'BALIKPAPAN - SAMBUTAN','BALIKPAPAN ',' SAMBUTAN','TRAILER','N',480000,0),
	(74,'BALIKPAPAN - MAGALAU','BALIKPAPAN ',' MAGALAU','LB','20',260000,0),
	(75,'BALIKPAPAN - MAGALAU','BALIKPAPAN ',' MAGALAU','LB','N',260000,0),
	(76,'BALIKPAPAN - SANGA-SANGA','BALIKPAPAN ',' SANGA-SANGA','LB','20',180000,0),
	(77,'BALIKPAPAN - SANGA-SANGA','BALIKPAPAN ',' SANGA-SANGA','LB','N',180000,0),
	(78,'BALIKPAPAN - SANGATTA','BALIKPAPAN ',' SANGATTA','TRAILER','20',375000,0),
	(79,'BALIKPAPAN - SANGATTA','BALIKPAPAN ',' SANGATTA','TRAILER','40',375000,0),
	(80,'BALIKPAPAN - SANGATTA','BALIKPAPAN ',' SANGATTA','TRONTON','20',325000,0),
	(81,'BALIKPAPAN - SANGATTA','BALIKPAPAN ',' SANGATTA','TRONTON','N',325000,0),
	(82,'BALIKPAPAN - SANGATTA','BALIKPAPAN ',' SANGATTA','LB','N',220000,0),
	(83,'BALIKPAPAN - SANGKULIRANG','BALIKPAPAN ',' SANGKULIRANG','TRONTON','N',600000,0),
	(84,'BALIKPAPAN - SANGKULIRANG','BALIKPAPAN ',' SANGKULIRANG','LB','20',370000,0),
	(85,'BALIKPAPAN - SANGKULIRANG','BALIKPAPAN ',' SANGKULIRANG','LB','N',370000,0),
	(86,'BALIKPAPAN - SENONI','BALIKPAPAN ',' SENONI','LB','20',180000,0),
	(87,'BALIKPAPAN - SENONI','BALIKPAPAN ',' SENONI','LB','N',180000,0),
	(88,'BALIKPAPAN - SEMBOJA','BALIKPAPAN ',' SEMBOJA','TRAILER','20',208000,0),
	(89,'BALIKPAPAN - SEMBOJA','BALIKPAPAN ',' SEMBOJA','TRAILER','40',440000,0),
	(90,'BALIKPAPAN - SEMBOJA','BALIKPAPAN ',' SEMBOJA','TRONTON','20',208000,0),
	(91,'BALIKPAPAN - SEMBOJA','BALIKPAPAN ',' SEMBOJA','TRONTON','40',208000,0),
	(92,'BALIKPAPAN - SEMBOJA','BALIKPAPAN ',' SEMBOJA','LB','20',143000,0),
	(93,'BALIKPAPAN - SEMBOJA','BALIKPAPAN ',' SEMBOJA','LB','N',143000,0),
	(94,'BALIKPAPAN - SEPARI','BALIKPAPAN ',' SEPARI','TRAILER','40',410000,0),
	(95,'BALIKPAPAN - SEPARI','BALIKPAPAN ',' SEPARI','TRONTON','20',205000,0),
	(96,'BALIKPAPAN - SEPARI','BALIKPAPAN ',' SEPARI','TRONTON','N',205000,0),
	(97,'BALIKPAPAN - SEPARI','BALIKPAPAN ',' SEPARI','LB','20',165000,0),
	(98,'BALIKPAPAN - SEPARI','BALIKPAPAN ',' SEPARI','LB','N',165000,0),
	(99,'BALIKPAPAN - TANJUNG BATU','BALIKPAPAN ',' TANJUNG BATU','TRAILER','20',190000,0),
	(100,'BALIKPAPAN - TANJUNG BATU','BALIKPAPAN ',' TANJUNG BATU','TRONTON','20',180000,0),
	(101,'BALIKPAPAN - TANJUNG BATU','BALIKPAPAN ',' TANJUNG BATU','LB','20',130000,0),
	(102,'BALIKPAPAN - TANJUNG BATU','BALIKPAPAN ',' TANJUNG BATU','LB','N',130000,0),
	(103,'BALIKPAPAN - TENGGARONG','BALIKPAPAN ',' TENGGARONG','TRAILER','20',250000,0),
	(104,'BALIKPAPAN - TENGGARONG','BALIKPAPAN ',' TENGGARONG','TRAILER','40',500000,0),
	(105,'BALIKPAPAN - TENGGARONG','BALIKPAPAN ',' TENGGARONG','TRAILER','N',250000,0),
	(106,'BALIKPAPAN - TENGGARONG','BALIKPAPAN ',' TENGGARONG','TRONTON','20',200000,0),
	(107,'BALIKPAPAN - TENGGARONG','BALIKPAPAN ',' TENGGARONG','LB','N',150000,0),
	(108,'BATAKAN - KM 12','BATAKAN ',' KM 12','TRAILER','20',170000,0),
	(109,'BATAKAN - KM 12','BATAKAN ',' KM 12','TRAILER','40',340000,0),
	(110,'BATAKAN - KM 12','BATAKAN ',' KM 12','TRONTON','20',160000,0),
	(111,'BATAKAN - KM 12','BATAKAN ',' KM 12','TRONTON','N',160000,0),
	(112,'BATAKAN - KM 12','BATAKAN ',' KM 12','LB','20',110000,0),
	(113,'BATAKAN - KM 12','BATAKAN ',' KM 12','LB','N',110000,0),
	(114,'BATAKAN - SEMAYANG','BATAKAN ',' SEMAYANG','TRAILER','20',170000,0),
	(115,'BATAKAN - SEMAYANG','BATAKAN ',' SEMAYANG','TRAILER','40',340000,0),
	(116,'BATAKAN - SEMAYANG','BATAKAN ',' SEMAYANG','TRONTON','20',160000,0),
	(117,'BATAKAN - SEMAYANG','BATAKAN ',' SEMAYANG','TRONTON','N',160000,0),
	(118,'BATAKAN - SEMAYANG','BATAKAN ',' SEMAYANG','LB','20',110000,0),
	(119,'BATAKAN - SEMAYANG','BATAKAN ',' SEMAYANG','LB','N',110000,0),
	(120,'GN. MALANG - JL. SIAGA','GN. MALANG ',' JL. SIAGA','TRAILER','20',170000,0),
	(121,'GN. MALANG - JL. SIAGA','GN. MALANG ',' JL. SIAGA','TRAILER','40',340000,0),
	(122,'GN. MALANG - JL. SIAGA','GN. MALANG ',' JL. SIAGA','TRONTON','20',160000,0),
	(123,'GN. MALANG - JL. SIAGA','GN. MALANG ',' JL. SIAGA','TRONTON','40',160000,0),
	(124,'GN. MALANG - JL. SIAGA','GN. MALANG ',' JL. SIAGA','TRONTON','N',160000,0),
	(125,'GN. MALANG - JL. SIAGA','GN. MALANG ',' JL. SIAGA','LB','20',110000,0),
	(126,'GN. MALANG - JL. SIAGA','GN. MALANG ',' JL. SIAGA','LB','N',110000,0),
	(127,'GN. MALANG - JL. SIAGA','GN. MALANG ',' JL. SIAGA','CD','20',50000,0),
	(128,'GN. MALANG - MARTADINATA','GN. MALANG ',' MARTADINATA','TRAILER','20',170000,0),
	(129,'GN. MALANG - MARTADINATA','GN. MALANG ',' MARTADINATA','TRAILER','40',340000,0),
	(130,'GN. MALANG - MARTADINATA','GN. MALANG ',' MARTADINATA','TRONTON','20',160000,0),
	(131,'GN. MALANG - MARTADINATA','GN. MALANG ',' MARTADINATA','TRONTON','N',160000,0),
	(132,'GN. MALANG - MARTADINATA','GN. MALANG ',' MARTADINATA','LB','20',110000,0),
	(133,'GN. MALANG - MARTADINATA','GN. MALANG ',' MARTADINATA','LB','N',110000,0),
	(134,'GN. MALANG - MARTADINATA','GN. MALANG ',' MARTADINATA','CD','20',50000,0),
	(135,'GUDANG - GIANT','GUDANG ',' GIANT','TRAILER','20',170000,0),
	(136,'GUDANG - GIANT','GUDANG ',' GIANT','TRAILER','40',340000,0),
	(137,'GUDANG - GIANT','GUDANG ',' GIANT','TRONTON','20',160000,0),
	(138,'GUDANG - GIANT','GUDANG ',' GIANT','TRONTON','N',160000,0),
	(139,'GUDANG - GIANT','GUDANG ',' GIANT','LB','20',110000,0),
	(140,'GUDANG - GIANT','GUDANG ',' GIANT','LB','N',110000,0),
	(141,'GUDANG - TOKO','GUDANG ',' TOKO','TRAILER','20',170000,0),
	(142,'GUDANG - TOKO','GUDANG ',' TOKO','TRAILER','40',340000,0),
	(143,'GUDANG - TOKO','GUDANG ',' TOKO','TRONTON','20',160000,0),
	(144,'GUDANG - TOKO','GUDANG ',' TOKO','TRONTON','N',160000,0),
	(145,'GUDANG - TOKO','GUDANG ',' TOKO','LB','20',110000,0),
	(146,'GUDANG - TOKO','GUDANG ',' TOKO','LB','N',110000,0),
	(147,'JALAN MINYAK - KKT','JALAN MINYAK ',' KKT','TRAILER','20',170000,0),
	(148,'JALAN MINYAK - KKT','JALAN MINYAK ',' KKT','TRAILER','40',340000,0),
	(149,'JALAN MINYAK - KKT','JALAN MINYAK ',' KKT','TRONTON','20',160000,0),
	(150,'JALAN MINYAK - KKT','JALAN MINYAK ',' KKT','TRONTON','N',160000,0),
	(151,'JALAN MINYAK - KKT','JALAN MINYAK ',' KKT','LB','20',110000,0),
	(152,'JALAN MINYAK - KKT','JALAN MINYAK ',' KKT','LB','N',110000,0),
	(153,'KAMPUNG BARU - KARIANGAU','KAMPUNG BARU ',' KARIANGAU','TRAILER','20',170000,0),
	(154,'KAMPUNG BARU - KARIANGAU','KAMPUNG BARU ',' KARIANGAU','TRAILER','40',340000,0),
	(155,'KAMPUNG BARU - KARIANGAU','KAMPUNG BARU ',' KARIANGAU','TRONTON','20',160000,0),
	(156,'KAMPUNG BARU - KARIANGAU','KAMPUNG BARU ',' KARIANGAU','TRONTON','N',160000,0),
	(157,'KAMPUNG BARU - KARIANGAU','KAMPUNG BARU ',' KARIANGAU','LB','20',110000,0),
	(158,'KAMPUNG BARU - KARIANGAU','KAMPUNG BARU ',' KARIANGAU','LB','N',110000,0),
	(159,'KAMPUNG BARU - KKT','KAMPUNG BARU ',' KKT','TRAILER','20',170000,0),
	(160,'KAMPUNG BARU - KKT','KAMPUNG BARU ',' KKT','TRAILER','40',340000,0),
	(161,'KAMPUNG BARU - KKT','KAMPUNG BARU ',' KKT','TRONTON','20',160000,0),
	(162,'KAMPUNG BARU - KKT','KAMPUNG BARU ',' KKT','TRONTON','N',160000,0),
	(163,'KAMPUNG BARU - KKT','KAMPUNG BARU ',' KKT','LB','20',110000,0),
	(164,'KAMPUNG BARU - KKT','KAMPUNG BARU ',' KKT','LB','N',110000,0),
	(165,'KARIANGAU - KAMPUNG BARU','KARIANGAU ',' KAMPUNG BARU','TRAILER','20',170000,0),
	(166,'KARIANGAU - KAMPUNG BARU','KARIANGAU ',' KAMPUNG BARU','TRAILER','40',340000,0),
	(167,'KARIANGAU - KAMPUNG BARU','KARIANGAU ',' KAMPUNG BARU','TRONTON','20',160000,0),
	(168,'KARIANGAU - KAMPUNG BARU','KARIANGAU ',' KAMPUNG BARU','TRONTON','N',160000,0),
	(169,'KARIANGAU - KAMPUNG BARU','KARIANGAU ',' KAMPUNG BARU','LB','20',110000,0),
	(170,'KARIANGAU - KAMPUNG BARU','KARIANGAU ',' KAMPUNG BARU','LB','N',110000,0),
	(171,'KARIANGAU - KARIANGAU','KARIANGAU ',' KARIANGAU','TRAILER','20',170000,0),
	(172,'KARIANGAU - KARIANGAU','KARIANGAU ',' KARIANGAU','TRAILER','40',340000,0),
	(173,'KARIANGAU - KARIANGAU','KARIANGAU ',' KARIANGAU','TRONTON','20',160000,0),
	(174,'KARIANGAU - KARIANGAU','KARIANGAU ',' KARIANGAU','TRONTON','N',160000,0),
	(175,'KARIANGAU - KARIANGAU','KARIANGAU ',' KARIANGAU','LB','20',110000,0),
	(176,'KARIANGAU - KARIANGAU','KARIANGAU ',' KARIANGAU','LB','N',110000,0),
	(177,'KARIANGAU - KKT','KARIANGAU ',' KKT','TRAILER','20',170000,0),
	(178,'KARIANGAU - KKT','KARIANGAU ',' KKT','TRAILER','40',340000,0),
	(179,'KARIANGAU - KKT','KARIANGAU ',' KKT','TRONTON','20',160000,0),
	(180,'KARIANGAU - KKT','KARIANGAU ',' KKT','TRONTON','N',160000,0),
	(181,'KARIANGAU - KKT','KARIANGAU ',' KKT','LB','20',110000,0),
	(182,'KARIANGAU - KKT','KARIANGAU ',' KKT','LB','N',110000,0),
	(183,'KARIANGAU - KM 13','KARIANGAU ',' KM 13','TRAILER','20',170000,0),
	(184,'KARIANGAU - KM 13','KARIANGAU ',' KM 13','TRAILER','40',340000,0),
	(185,'KARIANGAU - KM 13','KARIANGAU ',' KM 13','TRONTON','20',160000,0),
	(186,'KARIANGAU - KM 13','KARIANGAU ',' KM 13','TRONTON','N',160000,0),
	(187,'KARIANGAU - KM 13','KARIANGAU ',' KM 13','LB','20',110000,0),
	(188,'KARIANGAU - KM 13','KARIANGAU ',' KM 13','LB','N',110000,0),
	(189,'KARIANGAU - SOMBER','KARIANGAU ',' SOMBER','TRAILER','20',170000,0),
	(190,'KARIANGAU - SOMBER','KARIANGAU ',' SOMBER','TRAILER','40',340000,0),
	(191,'KARIANGAU - SOMBER','KARIANGAU ',' SOMBER','TRONTON','20',160000,0),
	(192,'KARIANGAU - SOMBER','KARIANGAU ',' SOMBER','TRONTON','N',160000,0),
	(193,'KARIANGAU - SOMBER','KARIANGAU ',' SOMBER','LB','20',110000,0),
	(194,'KARIANGAU - SOMBER','KARIANGAU ',' SOMBER','LB','N',110000,0),
	(195,'KKT - BATAKAN','KKT ',' BATAKAN','TRAILER','20',170000,0),
	(196,'KKT - BATAKAN','KKT ',' BATAKAN','TRAILER','40',340000,0),
	(197,'KKT - BATAKAN','KKT ',' BATAKAN','TRONTON','20',160000,0),
	(198,'KKT - BATAKAN','KKT ',' BATAKAN','LB','20',110000,0),
	(199,'KKT - BATAKAN','KKT ',' BATAKAN','LB','N',110000,0),
	(200,'KKT - BATU AMPAR','KKT ',' BATU AMPAR','TRAILER','20',170000,0),
	(201,'KKT - BATU AMPAR','KKT ',' BATU AMPAR','TRAILER','40',340000,0),
	(202,'KKT - BATU AMPAR','KKT ',' BATU AMPAR','TRONTON','20',160000,0),
	(203,'KKT - BATU AMPAR','KKT ',' BATU AMPAR','TRONTON','N',160000,0),
	(204,'KKT - BATU AMPAR','KKT ',' BATU AMPAR','LB','20',110000,0),
	(205,'KKT - BATU AMPAR','KKT ',' BATU AMPAR','LB','N',110000,0),
	(206,'KKT - BPP BARU','KKT ',' BPP BARU','TRAILER','20',170000,0),
	(207,'KKT - BPP BARU','KKT ',' BPP BARU','TRAILER','40',340000,0),
	(208,'KKT - BPP BARU','KKT ',' BPP BARU','TRONTON','20',160000,0),
	(209,'KKT - BPP BARU','KKT ',' BPP BARU','TRONTON','N',160000,0),
	(210,'KKT - BPP BARU','KKT ',' BPP BARU','LB','20',110000,0),
	(211,'KKT - BPP BARU','KKT ',' BPP BARU','LB','N',110000,0),
	(212,'KKT - BSB','KKT ',' BSB','TRAILER','20',170000,0),
	(213,'KKT - BSB','KKT ',' BSB','TRAILER','40',340000,0),
	(214,'KKT - BSB','KKT ',' BSB','TRONTON','20',160000,0),
	(215,'KKT - BSB','KKT ',' BSB','TRONTON','N',160000,0),
	(216,'KKT - BSB','KKT ',' BSB','LB','20',110000,0),
	(217,'KKT - BSB','KKT ',' BSB','LB','N',110000,0),
	(218,'KKT - DAM','KKT ',' DAM','TRAILER','20',170000,0),
	(219,'KKT - DAM','KKT ',' DAM','TRAILER','40',340000,0),
	(220,'KKT - DAM','KKT ',' DAM','TRONTON','20',160000,0),
	(221,'KKT - DAM','KKT ',' DAM','TRONTON','N',160000,0),
	(222,'KKT - DAM','KKT ',' DAM','LB','20',110000,0),
	(223,'KKT - DAM','KKT ',' DAM','LB','N',110000,0),
	(224,'KKT - GN BAKARAN','KKT ',' GN BAKARAN','TRAILER','20',170000,0),
	(225,'KKT - GN BAKARAN','KKT ',' GN BAKARAN','TRAILER','40',340000,0),
	(226,'KKT - GN BAKARAN','KKT ',' GN BAKARAN','TRONTON','20',160000,0),
	(227,'KKT - GN BAKARAN','KKT ',' GN BAKARAN','TRONTON','N',160000,0),
	(228,'KKT - GN BAKARAN','KKT ',' GN BAKARAN','LB','20',110000,0),
	(229,'KKT - GN BAKARAN','KKT ',' GN BAKARAN','LB','N',110000,0),
	(230,'KKT - GN GUNTUR','KKT ',' GN GUNTUR','TRAILER','20',170000,0),
	(231,'KKT - GN GUNTUR','KKT ',' GN GUNTUR','TRAILER','40',340000,0),
	(232,'KKT - GN GUNTUR','KKT ',' GN GUNTUR','TRONTON','20',160000,0),
	(233,'KKT - GN GUNTUR','KKT ',' GN GUNTUR','TRONTON','N',160000,0),
	(234,'KKT - GN GUNTUR','KKT ',' GN GUNTUR','LB','20',110000,0),
	(235,'KKT - GN GUNTUR','KKT ',' GN GUNTUR','LB','N',110000,0),
	(236,'KKT - GN MALANG','KKT ',' GN MALANG','TRAILER','20',170000,0),
	(237,'KKT - GN MALANG','KKT ',' GN MALANG','TRAILER','40',340000,0),
	(238,'KKT - GN MALANG','KKT ',' GN MALANG','TRONTON','20',160000,0),
	(239,'KKT - GN MALANG','KKT ',' GN MALANG','TRONTON','40',160000,0),
	(240,'KKT - GN MALANG','KKT ',' GN MALANG','TRONTON','N',160000,0),
	(241,'KKT - GN MALANG','KKT ',' GN MALANG','LB','20',110000,0),
	(242,'KKT - GN MALANG','KKT ',' GN MALANG','LB','N',110000,0),
	(243,'BALIKPAPAN - TAMA POLE','BALIKPAPAN ',' TAMA POLE','TRAILER','40',440000,0),
	(244,'BALIKPAPAN - TAMA POLE','BALIKPAPAN ',' TAMA POLE','TRAILER','N',440000,0),
	(245,'BALIKPAPAN - TAMA POLE','BALIKPAPAN ',' TAMA POLE','LB','20',143000,0),
	(246,'BALIKPAPAN - TAMA POLE','BALIKPAPAN ',' TAMA POLE','LB','N',143000,0),
	(247,'KKT - GRAHA INDAH','KKT ',' GRAHA INDAH','TRAILER','20',170000,0),
	(248,'KKT - GRAHA INDAH','KKT ',' GRAHA INDAH','TRAILER','40',340000,0),
	(249,'KKT - GRAHA INDAH','KKT ',' GRAHA INDAH','TRONTON','20',160000,0),
	(250,'KKT - GRAHA INDAH','KKT ',' GRAHA INDAH','TRONTON','N',160000,0),
	(251,'KKT - GRAHA INDAH','KKT ',' GRAHA INDAH','LB','20',110000,0),
	(252,'KKT - GRAHA INDAH','KKT ',' GRAHA INDAH','LB','N',110000,0),
	(253,'KKT - INDRAKILA','KKT ',' INDRAKILA','TRAILER','20',170000,0),
	(254,'KKT - INDRAKILA','KKT ',' INDRAKILA','TRAILER','40',340000,0),
	(255,'KKT - INDRAKILA','KKT ',' INDRAKILA','TRONTON','20',160000,0),
	(256,'KKT - INDRAKILA','KKT ',' INDRAKILA','TRONTON','N',160000,0),
	(257,'KKT - INDRAKILA','KKT ',' INDRAKILA','LB','20',110000,0),
	(258,'KKT - INDRAKILA','KKT ',' INDRAKILA','LB','N',110000,0),
	(259,'KKT - JALAN MINYAK','KKT ',' JALAN MINYAK','TRAILER','20',170000,0),
	(260,'KKT - JALAN MINYAK','KKT ',' JALAN MINYAK','TRAILER','40',340000,0),
	(261,'KKT - JALAN MINYAK','KKT ',' JALAN MINYAK','TRONTON','20',160000,0),
	(262,'KKT - JALAN MINYAK','KKT ',' JALAN MINYAK','TRONTON','N',160000,0),
	(263,'KKT - JALAN MINYAK','KKT ',' JALAN MINYAK','LB','20',110000,0),
	(264,'KKT - JALAN MINYAK','KKT ',' JALAN MINYAK','LB','N',110000,0),
	(265,'KKT - JL RUHUI RAHAYU','KKT ',' JL RUHUI RAHAYU','TRAILER','20',170000,0),
	(266,'KKT - JL RUHUI RAHAYU','KKT ',' JL RUHUI RAHAYU','TRAILER','40',340000,0),
	(267,'KKT - JL RUHUI RAHAYU','KKT ',' JL RUHUI RAHAYU','TRONTON','20',160000,0),
	(268,'KKT - JL RUHUI RAHAYU','KKT ',' JL RUHUI RAHAYU','TRONTON','N',160000,0),
	(269,'KKT - JL RUHUI RAHAYU','KKT ',' JL RUHUI RAHAYU','LB','20',110000,0),
	(270,'KKT - JL RUHUI RAHAYU','KKT ',' JL RUHUI RAHAYU','LB','N',110000,0),
	(271,'KKT - JL. BEALER','KKT ',' JL. BEALER','TRAILER','20',170000,0),
	(272,'KKT - JL. BEALER','KKT ',' JL. BEALER','TRAILER','40',340000,0),
	(273,'KKT - JL. BEALER','KKT ',' JL. BEALER','TRONTON','20',160000,0),
	(274,'KKT - JL. BEALER','KKT ',' JL. BEALER','TRONTON','N',160000,0),
	(275,'KKT - JL. BEALER','KKT ',' JL. BEALER','LB','20',110000,0),
	(276,'KKT - JL. BEALER','KKT ',' JL. BEALER','LB','N',110000,0),
	(277,'KKT - JL. DONDANG','KKT ',' JL. DONDANG','TRAILER','20',170000,0),
	(278,'KKT - JL. DONDANG','KKT ',' JL. DONDANG','TRAILER','40',340000,0),
	(279,'KKT - JL. DONDANG','KKT ',' JL. DONDANG','TRONTON','20',160000,0),
	(280,'KKT - JL. DONDANG','KKT ',' JL. DONDANG','TRONTON','N',160000,0),
	(281,'KKT - JL. DONDANG','KKT ',' JL. DONDANG','LB','20',110000,0),
	(282,'KKT - JL. DONDANG','KKT ',' JL. DONDANG','LB','N',110000,0),
	(283,'KKT - JL. PROJAKAL','KKT ',' JL. PROJAKAL','TRAILER','20',170000,0),
	(284,'KKT - JL. PROJAKAL','KKT ',' JL. PROJAKAL','TRAILER','40',340000,0),
	(285,'KKT - JL. PROJAKAL','KKT ',' JL. PROJAKAL','TRONTON','20',160000,0),
	(286,'KKT - JL. PROJAKAL','KKT ',' JL. PROJAKAL','TRONTON','N',160000,0),
	(287,'KKT - JL. PROJAKAL','KKT ',' JL. PROJAKAL','LB','20',110000,0),
	(288,'KKT - JL. PROJAKAL','KKT ',' JL. PROJAKAL','LB','N',110000,0),
	(289,'KKT - KAMPUNG BARU','KKT ',' KAMPUNG BARU','TRAILER','20',170000,0),
	(290,'KKT - KAMPUNG BARU','KKT ',' KAMPUNG BARU','TRAILER','40',340000,0),
	(291,'KKT - KAMPUNG BARU','KKT ',' KAMPUNG BARU','TRONTON','20',160000,0),
	(292,'KKT - KAMPUNG BARU','KKT ',' KAMPUNG BARU','TRONTON','N',160000,0),
	(293,'KKT - KAMPUNG BARU','KKT ',' KAMPUNG BARU','LB','20',110000,0),
	(294,'KKT - KAMPUNG BARU','KKT ',' KAMPUNG BARU','LB','N',110000,0),
	(295,'KKT - KAMPUNG TIMUR','KKT ',' KAMPUNG TIMUR','TRAILER','20',170000,0),
	(296,'KKT - KAMPUNG TIMUR','KKT ',' KAMPUNG TIMUR','TRAILER','40',340000,0),
	(297,'KKT - KAMPUNG TIMUR','KKT ',' KAMPUNG TIMUR','TRONTON','20',160000,0),
	(298,'KKT - KAMPUNG TIMUR','KKT ',' KAMPUNG TIMUR','TRONTON','N',160000,0),
	(299,'KKT - KAMPUNG TIMUR','KKT ',' KAMPUNG TIMUR','LB','20',110000,0),
	(300,'KKT - KAMPUNG TIMUR','KKT ',' KAMPUNG TIMUR','LB','N',110000,0),
	(301,'KKT - KARIANGAU','KKT ',' KARIANGAU','TRAILER','20',170000,0),
	(302,'KKT - KARIANGAU','KKT ',' KARIANGAU','TRAILER','40',340000,0),
	(303,'KKT - KARIANGAU','KKT ',' KARIANGAU','TRONTON','20',160000,0),
	(304,'KKT - KARIANGAU','KKT ',' KARIANGAU','TRONTON','40',340000,0),
	(305,'KKT - KARIANGAU','KKT ',' KARIANGAU','TRONTON','N',160000,0),
	(306,'KKT - KARIANGAU','KKT ',' KARIANGAU','LB','20',110000,0),
	(307,'KKT - KARIANGAU','KKT ',' KARIANGAU','LB','N',110000,0),
	(308,'KKT - KLANDASAN','KKT ',' KLANDASAN','TRAILER','20',170000,0),
	(309,'KKT - KLANDASAN','KKT ',' KLANDASAN','TRAILER','40',340000,0),
	(310,'KKT - KLANDASAN','KKT ',' KLANDASAN','TRONTON','20',160000,0),
	(311,'KKT - KLANDASAN','KKT ',' KLANDASAN','TRONTON','N',160000,0),
	(312,'KKT - KLANDASAN','KKT ',' KLANDASAN','LB','20',110000,0),
	(313,'KKT - KLANDASAN','KKT ',' KLANDASAN','LB','N',110000,0),
	(314,'KKT - KM 02','KKT ',' KM 02','TRAILER','20',170000,0),
	(315,'KKT - KM 02','KKT ',' KM 02','TRAILER','40',340000,0),
	(316,'KKT - KM 02','KKT ',' KM 02','TRONTON','20',160000,0),
	(317,'KKT - KM 02','KKT ',' KM 02','TRONTON','N',160000,0),
	(318,'KKT - KM 02','KKT ',' KM 02','LB','20',110000,0),
	(319,'KKT - KM 02','KKT ',' KM 02','LB','N',110000,0),
	(320,'KKT - KM 03','KKT ',' KM 03','TRAILER','20',170000,0),
	(321,'KKT - KM 03','KKT ',' KM 03','TRAILER','40',340000,0),
	(322,'KKT - KM 03','KKT ',' KM 03','TRONTON','20',160000,0),
	(323,'KKT - KM 03','KKT ',' KM 03','TRONTON','N',160000,0),
	(324,'KKT - KM 03','KKT ',' KM 03','LB','20',110000,0),
	(325,'KKT - KM 03','KKT ',' KM 03','LB','N',110000,0),
	(326,'KKT - KM 04','KKT ',' KM 04','TRAILER','20',170000,0),
	(327,'KKT - KM 04','KKT ',' KM 04','TRAILER','40',340000,0),
	(328,'KKT - KM 04','KKT ',' KM 04','TRONTON','20',160000,0),
	(329,'KKT - KM 04','KKT ',' KM 04','TRONTON','N',160000,0),
	(330,'KKT - KM 04','KKT ',' KM 04','LB','20',110000,0),
	(331,'KKT - KM 04','KKT ',' KM 04','LB','N',110000,0),
	(332,'KKT - KM 05','KKT ',' KM 05','TRAILER','20',170000,0),
	(333,'KKT - KM 05','KKT ',' KM 05','TRAILER','40',340000,0),
	(334,'KKT - KM 05','KKT ',' KM 05','TRONTON','20',160000,0),
	(335,'KKT - KM 05','KKT ',' KM 05','TRONTON','N',160000,0),
	(336,'KKT - KM 05','KKT ',' KM 05','LB','20',110000,0),
	(337,'KKT - KM 05','KKT ',' KM 05','LB','N',110000,0),
	(338,'KKT - KM 06','KKT ',' KM 06','TRAILER','20',170000,0),
	(339,'KKT - KM 06','KKT ',' KM 06','TRAILER','40',340000,0),
	(340,'KKT - KM 06','KKT ',' KM 06','TRONTON','20',160000,0),
	(341,'KKT - KM 06','KKT ',' KM 06','TRONTON','N',160000,0),
	(342,'KKT - KM 06','KKT ',' KM 06','LB','20',110000,0),
	(343,'KKT - KM 06','KKT ',' KM 06','LB','N',110000,0),
	(344,'KKT - KM 07','KKT ',' KM 07','TRAILER','20',170000,0),
	(345,'KKT - KM 07','KKT ',' KM 07','TRAILER','40',340000,0),
	(346,'KKT - KM 07','KKT ',' KM 07','TRONTON','20',160000,0),
	(347,'KKT - KM 07','KKT ',' KM 07','TRONTON','N',160000,0),
	(348,'KKT - KM 07','KKT ',' KM 07','LB','20',110000,0),
	(349,'KKT - KM 07','KKT ',' KM 07','LB','N',110000,0),
	(350,'KKT - KM 09','KKT ',' KM 09','TRAILER','20',170000,0),
	(351,'KKT - KM 09','KKT ',' KM 09','TRAILER','40',340000,0),
	(352,'KKT - KM 09','KKT ',' KM 09','TRONTON','20',160000,0),
	(353,'KKT - KM 09','KKT ',' KM 09','TRONTON','N',160000,0),
	(354,'KKT - KM 09','KKT ',' KM 09','LB','20',110000,0),
	(355,'KKT - KM 09','KKT ',' KM 09','LB','N',110000,0),
	(356,'KKT - KM 12','KKT ',' KM 12','TRAILER','20',170000,0),
	(357,'KKT - KM 12','KKT ',' KM 12','TRAILER','40',340000,0),
	(358,'KKT - KM 12','KKT ',' KM 12','TRONTON','20',160000,0),
	(359,'KKT - KM 12','KKT ',' KM 12','TRONTON','N',160000,0),
	(360,'KKT - KM 12','KKT ',' KM 12','LB','20',110000,0),
	(361,'KKT - KM 12','KKT ',' KM 12','LB','N',110000,0),
	(362,'KKT - KM 13','KKT ',' KM 13','TRAILER','20',170000,0),
	(363,'KKT - KM 13','KKT ',' KM 13','TRAILER','40',340000,0),
	(364,'KKT - KM 13','KKT ',' KM 13','TRONTON','20',160000,0),
	(365,'KKT - KM 13','KKT ',' KM 13','TRONTON','N',160000,0),
	(366,'KKT - KM 13','KKT ',' KM 13','LB','20',110000,0),
	(367,'KKT - KM 13','KKT ',' KM 13','LB','N',110000,0),
	(368,'KKT - KM 16','KKT ',' KM 16','TRAILER','20',170000,0),
	(369,'KKT - KM 16','KKT ',' KM 16','TRAILER','40',340000,0),
	(370,'KKT - KM 16','KKT ',' KM 16','TRONTON','20',160000,0),
	(371,'KKT - KM 16','KKT ',' KM 16','TRONTON','N',160000,0),
	(372,'KKT - KM 16','KKT ',' KM 16','LB','20',110000,0),
	(373,'KKT - KM 16','KKT ',' KM 16','LB','N',110000,0),
	(374,'KKT - KM 18','KKT ',' KM 18','TRAILER','20',170000,0),
	(375,'KKT - KM 18','KKT ',' KM 18','TRAILER','40',340000,0),
	(376,'KKT - KM 18','KKT ',' KM 18','TRONTON','20',160000,0),
	(377,'KKT - KM 18','KKT ',' KM 18','TRONTON','N',160000,0),
	(378,'KKT - KM 18','KKT ',' KM 18','LB','20',110000,0),
	(379,'KKT - KM 18','KKT ',' KM 18','LB','N',110000,0),
	(380,'KKT - KM 32','KKT ',' KM 32','TRAILER','40',340000,0),
	(381,'KKT - KM 37,5','KKT ',' KM 37,5','TRONTON','20',170000,0),
	(382,'KKT - KM 38','KKT ',' KM 38','TRAILER','20',180000,0),
	(383,'KKT - KM 38','KKT ',' KM 38','TRAILER','40',360000,0),
	(384,'KKT - KM 38','KKT ',' KM 38','TRONTON','20',170000,0),
	(385,'KKT - KM 38','KKT ',' KM 38','LB','20',120000,0),
	(386,'KKT - KM 38','KKT ',' KM 38','LB','N',120000,0),
	(387,'KARIANGAU - KM 38','KARIANGAU ',' KM 38','LB','20',120000,0),
	(388,'KARIANGAU - KM 38','KARIANGAU ',' KM 38','LB','N',120000,0),
	(389,'KKT - KM 4,5','KKT ',' KM 4,5','TRAILER','20',170000,0),
	(390,'KKT - KM 4,5','KKT ',' KM 4,5','TRAILER','40',340000,0),
	(391,'KKT - KM 4,5','KKT ',' KM 4,5','TRONTON','20',160000,0),
	(392,'KKT - KM 4,5','KKT ',' KM 4,5','TRONTON','N',160000,0),
	(393,'KKT - KM 4,5','KKT ',' KM 4,5','LB','20',110000,0),
	(394,'KKT - KM 4,5','KKT ',' KM 4,5','LB','N',110000,0),
	(395,'KKT - LAP. MERDEKA','KKT ',' LAP. MERDEKA','TRAILER','20',170000,0),
	(396,'KKT - LAP. MERDEKA','KKT ',' LAP. MERDEKA','TRAILER','40',340000,0),
	(397,'KKT - LAP. MERDEKA','KKT ',' LAP. MERDEKA','TRONTON','20',160000,0),
	(398,'KKT - LAP. MERDEKA','KKT ',' LAP. MERDEKA','TRONTON','N',160000,0),
	(399,'KKT - LAP. MERDEKA','KKT ',' LAP. MERDEKA','LB','20',110000,0),
	(400,'KKT - LAP. MERDEKA','KKT ',' LAP. MERDEKA','LB','N',110000,0),
	(401,'KKT - MANGGAR','KKT ',' MANGGAR','TRAILER','20',170000,0),
	(402,'KKT - MANGGAR','KKT ',' MANGGAR','TRAILER','40',340000,0),
	(403,'KKT - MANGGAR','KKT ',' MANGGAR','TRONTON','20',160000,0),
	(404,'KKT - MANGGAR','KKT ',' MANGGAR','TRONTON','N',160000,0),
	(405,'KKT - MANGGAR','KKT ',' MANGGAR','LB','20',110000,0),
	(406,'KKT - MANGGAR','KKT ',' MANGGAR','LB','N',110000,0),
	(407,'KKT - MT. HARYONO','KKT ',' MT. HARYONO','TRAILER','20',170000,0),
	(408,'KKT - MT. HARYONO','KKT ',' MT. HARYONO','TRAILER','40',340000,0),
	(409,'KKT - MT. HARYONO','KKT ',' MT. HARYONO','TRONTON','20',160000,0),
	(410,'KKT - MT. HARYONO','KKT ',' MT. HARYONO','TRONTON','N',160000,0),
	(411,'KKT - MT. HARYONO','KKT ',' MT. HARYONO','LB','20',110000,0),
	(412,'KKT - MT. HARYONO','KKT ',' MT. HARYONO','LB','N',110000,0),
	(413,'KKT - MUARA BADAK','KKT ',' MUARA BADAK','TRAILER','40',550000,0),
	(414,'KKT - MUARA BADAK','KKT ',' MUARA BADAK','TRONTON','20',325000,0),
	(415,'KKT - PANDAN SARI','KKT ',' PANDAN SARI','TRAILER','20',170000,0),
	(416,'KKT - PANDAN SARI','KKT ',' PANDAN SARI','TRAILER','40',340000,0),
	(417,'KKT - PANDAN SARI','KKT ',' PANDAN SARI','TRONTON','20',160000,0),
	(418,'KKT - PANDAN SARI','KKT ',' PANDAN SARI','TRONTON','N',160000,0),
	(419,'KKT - PANDAN SARI','KKT ',' PANDAN SARI','LB','20',110000,0),
	(420,'KKT - PANDAN SARI','KKT ',' PANDAN SARI','LB','N',110000,0),
	(421,'KKT - PENAJAM','KKT ',' PENAJAM','TRAILER','20',190000,0),
	(422,'KKT - PENAJAM','KKT ',' PENAJAM','TRONTON','20',190000,0),
	(423,'KKT - PENAJAM','KKT ',' PENAJAM','LB','20',150000,0),
	(424,'KKT - PS. BARU','KKT ',' PS. BARU','TRAILER','20',170000,0),
	(425,'KKT - PS. BARU','KKT ',' PS. BARU','TRAILER','40',340000,0),
	(426,'KKT - PS. BARU','KKT ',' PS. BARU','TRONTON','20',160000,0),
	(427,'KKT - PS. BARU','KKT ',' PS. BARU','TRONTON','N',160000,0),
	(428,'KKT - PS. BARU','KKT ',' PS. BARU','LB','20',110000,0),
	(429,'KKT - PS. BARU','KKT ',' PS. BARU','LB','N',110000,0),
	(430,'KKT - RING ROAD','KKT ',' RING ROAD','TRAILER','20',170000,0),
	(431,'KKT - RING ROAD','KKT ',' RING ROAD','TRAILER','40',340000,0),
	(432,'KKT - RING ROAD','KKT ',' RING ROAD','TRONTON','20',160000,0),
	(433,'KKT - RING ROAD','KKT ',' RING ROAD','TRONTON','N',160000,0),
	(434,'KKT - RING ROAD','KKT ',' RING ROAD','LB','20',110000,0),
	(435,'KKT - RING ROAD','KKT ',' RING ROAD','LB','N',110000,0),
	(436,'KKT - RUKO CITRA','KKT ',' RUKO CITRA','TRAILER','20',170000,0),
	(437,'KKT - RUKO CITRA','KKT ',' RUKO CITRA','TRAILER','40',340000,0),
	(438,'KKT - RUKO CITRA','KKT ',' RUKO CITRA','TRONTON','20',160000,0),
	(439,'KKT - RUKO CITRA','KKT ',' RUKO CITRA','TRONTON','N',160000,0),
	(440,'KKT - RUKO CITRA','KKT ',' RUKO CITRA','LB','20',110000,0),
	(441,'KKT - RUKO CITRA','KKT ',' RUKO CITRA','LB','N',110000,0),
	(442,'KKT - RUKO CITY','KKT ',' RUKO CITY','TRONTON','20',170000,0),
	(443,'KKT - RUKO CITY','KKT ',' RUKO CITY','LB','20',110000,0),
	(444,'KKT - SANGATTA','KKT ',' SANGATTA','TRONTON','20',325000,0),
	(445,'KKT - SEMAYANG','KKT ',' SEMAYANG','TRAILER','20',170000,0),
	(446,'KKT - SEMAYANG','KKT ',' SEMAYANG','TRAILER','40',340000,0),
	(447,'KKT - SEMAYANG','KKT ',' SEMAYANG','TRONTON','20',160000,0),
	(448,'KKT - SEMAYANG','KKT ',' SEMAYANG','TRONTON','N',160000,0),
	(449,'KKT - SEMAYANG','KKT ',' SEMAYANG','LB','20',110000,0),
	(450,'KKT - SEMAYANG','KKT ',' SEMAYANG','LB','N',110000,0),
	(451,'KKT - SEPINGGAN','KKT ',' SEPINGGAN','TRAILER','20',170000,0),
	(452,'KKT - SEPINGGAN','KKT ',' SEPINGGAN','TRAILER','40',340000,0),
	(453,'KKT - SEPINGGAN','KKT ',' SEPINGGAN','TRONTON','20',160000,0),
	(454,'KKT - SEPINGGAN','KKT ',' SEPINGGAN','TRONTON','N',160000,0),
	(455,'KKT - SEPINGGAN','KKT ',' SEPINGGAN','LB','20',110000,0),
	(456,'KKT - SEPINGGAN','KKT ',' SEPINGGAN','LB','N',110000,0),
	(457,'KKT - SOMBER','KKT ',' SOMBER','TRAILER','20',170000,0),
	(458,'KKT - SOMBER','KKT ',' SOMBER','TRAILER','40',340000,0),
	(459,'KKT - SOMBER','KKT ',' SOMBER','TRONTON','20',160000,0),
	(460,'KKT - SOMBER','KKT ',' SOMBER','TRONTON','N',160000,0),
	(461,'KKT - SOMBER','KKT ',' SOMBER','LB','20',110000,0),
	(462,'KKT - SOMBER','KKT ',' SOMBER','LB','N',110000,0),
	(463,'KKT - STAL KUDA','KKT ',' STAL KUDA','TRAILER','20',170000,0),
	(464,'KKT - STAL KUDA','KKT ',' STAL KUDA','TRAILER','40',340000,0),
	(465,'KKT - STAL KUDA','KKT ',' STAL KUDA','TRONTON','20',160000,0),
	(466,'KKT - STAL KUDA','KKT ',' STAL KUDA','TRONTON','N',160000,0),
	(467,'KKT - STAL KUDA','KKT ',' STAL KUDA','LB','20',110000,0),
	(468,'KKT - STAL KUDA','KKT ',' STAL KUDA','LB','N',110000,0),
	(469,'KKT - STRAT I','KKT ',' STRAT I','TRAILER','20',170000,0),
	(470,'KKT - STRAT I','KKT ',' STRAT I','TRAILER','40',340000,0),
	(471,'KKT - STRAT I','KKT ',' STRAT I','TRONTON','20',160000,0),
	(472,'KKT - STRAT I','KKT ',' STRAT I','TRONTON','N',160000,0),
	(473,'KKT - STRAT I','KKT ',' STRAT I','LB','20',110000,0),
	(474,'KKT - STRAT I','KKT ',' STRAT I','LB','N',110000,0),
	(475,'KKT - TELINDUNG BARU','KKT ',' TELINDUNG BARU','TRAILER','20',170000,0),
	(476,'KKT - TELINDUNG BARU','KKT ',' TELINDUNG BARU','TRAILER','40',340000,0),
	(477,'KKT - TELINDUNG BARU','KKT ',' TELINDUNG BARU','TRONTON','20',160000,0),
	(478,'KKT - TELINDUNG BARU','KKT ',' TELINDUNG BARU','TRONTON','N',160000,0),
	(479,'KKT - TELINDUNG BARU','KKT ',' TELINDUNG BARU','LB','20',110000,0),
	(480,'KKT - TELINDUNG BARU','KKT ',' TELINDUNG BARU','LB','N',110000,0),
	(481,'KKT - VILLABETTA','KKT ',' VILLABETTA','TRAILER','20',170000,0),
	(482,'KKT - VILLABETTA','KKT ',' VILLABETTA','TRAILER','40',340000,0),
	(483,'KKT - VILLABETTA','KKT ',' VILLABETTA','TRONTON','20',160000,0),
	(484,'KKT - VILLABETTA','KKT ',' VILLABETTA','TRONTON','N',160000,0),
	(485,'KKT - VILLABETTA','KKT ',' VILLABETTA','LB','20',110000,0),
	(486,'KKT - VILLABETTA','KKT ',' VILLABETTA','LB','N',110000,0),
	(487,'KKT - WIKA','KKT ',' WIKA','TRAILER','20',170000,0),
	(488,'KKT - WIKA','KKT ',' WIKA','TRAILER','40',340000,0),
	(489,'KKT - WIKA','KKT ',' WIKA','TRONTON','20',160000,0),
	(490,'KKT - WIKA','KKT ',' WIKA','TRONTON','N',160000,0),
	(491,'KKT - WIKA','KKT ',' WIKA','LB','20',110000,0),
	(492,'KKT - WIKA','KKT ',' WIKA','LB','N',110000,0),
	(493,'KM 12 - DAM','KM 12 ',' DAM','TRAILER','20',170000,0),
	(494,'KM 12 - DAM','KM 12 ',' DAM','TRAILER','40',340000,0),
	(495,'KM 12 - DAM','KM 12 ',' DAM','TRONTON','20',160000,0),
	(496,'KM 12 - DAM','KM 12 ',' DAM','TRONTON','N',160000,0),
	(497,'KM 12 - DAM','KM 12 ',' DAM','LB','20',110000,0),
	(498,'KM 12 - DAM','KM 12 ',' DAM','LB','N',110000,0),
	(499,'KM 12 - KARIANGAU','KM 12 ',' KARIANGAU','TRAILER','40',340000,0),
	(500,'KM 12 - KM 16','KM 12 ',' KM 16','TRAILER','20',170000,0),
	(501,'KM 12 - KM 16','KM 12 ',' KM 16','TRAILER','40',340000,0),
	(502,'KM 12 - KM 16','KM 12 ',' KM 16','TRONTON','20',160000,0),
	(503,'KM 12 - KM 16','KM 12 ',' KM 16','TRONTON','N',160000,0),
	(504,'KM 12 - KM 16','KM 12 ',' KM 16','LB','20',110000,0),
	(505,'KM 12 - KM 16','KM 12 ',' KM 16','LB','N',110000,0),
	(506,'KM 12 - KM 5','KM 12 ',' KM 5','TRAILER','20',170000,0),
	(507,'KM 12 - KM 5','KM 12 ',' KM 5','TRAILER','40',340000,0),
	(508,'KM 12 - KM 5','KM 12 ',' KM 5','TRONTON','20',160000,0),
	(509,'KM 12 - KM 5','KM 12 ',' KM 5','TRONTON','N',160000,0),
	(510,'KM 12 - KM 5','KM 12 ',' KM 5','LB','20',110000,0),
	(511,'KM 12 - KM 5','KM 12 ',' KM 5','LB','N',110000,0),
	(512,'KM 12 - SAMARINDA','KM 12 ',' SAMARINDA','LB','20',143000,0),
	(513,'KM 13 - BATAKAN','KM 13 ',' BATAKAN','TRAILER','20',170000,0),
	(514,'KM 13 - BATAKAN','KM 13 ',' BATAKAN','TRAILER','40',340000,0),
	(515,'KM 13 - BATAKAN','KM 13 ',' BATAKAN','TRONTON','20',160000,0),
	(516,'KM 13 - BATAKAN','KM 13 ',' BATAKAN','TRONTON','N',160000,0),
	(517,'KM 13 - BATAKAN','KM 13 ',' BATAKAN','LB','20',110000,0),
	(518,'KM 13 - BATAKAN','KM 13 ',' BATAKAN','LB','N',110000,0),
	(519,'KM 13 - KKT','KM 13 ',' KKT','TRAILER','20',170000,0),
	(520,'KM 13 - KKT','KM 13 ',' KKT','TRAILER','40',340000,0),
	(521,'KM 13 - KKT','KM 13 ',' KKT','TRONTON','20',160000,0),
	(522,'KM 13 - KKT','KM 13 ',' KKT','TRONTON','N',160000,0),
	(523,'KM 13 - KKT','KM 13 ',' KKT','LB','20',110000,0),
	(524,'KM 13 - KKT','KM 13 ',' KKT','LB','N',110000,0),
	(525,'KM 13 - KM 13','KM 13 ',' KM 13','TRAILER','N',170000,0),
	(526,'MANGGAR - KKT','MANGGAR ',' KKT','TRAILER','20',170000,0),
	(527,'MANGGAR - KKT','MANGGAR ',' KKT','TRAILER','40',340000,0),
	(528,'MANGGAR - KKT','MANGGAR ',' KKT','TRONTON','20',160000,0),
	(529,'MANGGAR - KKT','MANGGAR ',' KKT','TRONTON','N',160000,0),
	(530,'MANGGAR - KKT','MANGGAR ',' KKT','LB','20',110000,0),
	(531,'MANGGAR - KKT','MANGGAR ',' KKT','LB','N',110000,0),
	(532,'MARTADINATA - KKT','MARTADINATA ',' KKT','TRAILER','20',170000,0),
	(533,'MARTADINATA - KKT','MARTADINATA ',' KKT','TRAILER','40',340000,0),
	(534,'MARTADINATA - KKT','MARTADINATA ',' KKT','TRONTON','20',160000,0),
	(535,'MARTADINATA - KKT','MARTADINATA ',' KKT','TRONTON','N',160000,0),
	(536,'MARTADINATA - KKT','MARTADINATA ',' KKT','LB','20',110000,0),
	(537,'MARTADINATA - KKT','MARTADINATA ',' KKT','LB','N',110000,0),
	(538,'MELAK - BALIKPAPAN','MELAK ',' BALIKPAPAN','TRAILER','40',800000,0),
	(539,'MELAK - BALIKPAPAN','MELAK ',' BALIKPAPAN','TRONTON','40',800000,0),
	(540,'PALARAN - PULAU ATAS','PALARAN ',' PULAU ATAS','TRONTON','N',190000,0),
	(541,'PASAR BARU - SEPINGGAN','PASAR BARU ',' SEPINGGAN','TRONTON','N',160000,0),
	(542,'PENAJAM - BALIKPAPAN','PENAJAM ',' BALIKPAPAN','TRONTON','20',190000,0),
	(543,'PLTU (KM 13) - KKT','PLTU (KM 13) ',' KKT','TRAILER','40',340000,0),
	(544,'RING ROAD - KKT','RING ROAD ',' KKT','TRAILER','20',170000,0),
	(545,'RING ROAD - KKT','RING ROAD ',' KKT','TRAILER','40',340000,0),
	(546,'RING ROAD - KKT','RING ROAD ',' KKT','TRONTON','20',160000,0),
	(547,'RING ROAD - KKT','RING ROAD ',' KKT','TRONTON','40',160000,0),
	(548,'RING ROAD - KKT','RING ROAD ',' KKT','LB','20',110000,0),
	(549,'SAMARINDA - SANGATTA','SAMARINDA ',' SANGATTA','TRONTON','N',250000,0),
	(550,'SAMARINDA - BALIKPAPAN','SAMARINDA ',' BALIKPAPAN','LB','20',143000,0),
	(551,'SAMARINDA - BALIKPAPAN','SAMARINDA ',' BALIKPAPAN','LB','N',143000,0),
	(552,'SAMARINDA - SEPARI','SAMARINDA ',' SEPARI','LB','N',143000,0),
	(553,'SEMAYANG - MANGGAR','SEMAYANG ',' MANGGAR','TRAILER','20',170000,0),
	(554,'SEMAYANG - MANGGAR','SEMAYANG ',' MANGGAR','TRAILER','40',340000,0),
	(555,'SEMAYANG - MANGGAR','SEMAYANG ',' MANGGAR','TRONTON','20',160000,0),
	(556,'SEMAYANG - MANGGAR','SEMAYANG ',' MANGGAR','TRONTON','N',160000,0),
	(557,'SEMAYANG - MANGGAR','SEMAYANG ',' MANGGAR','LB','20',110000,0),
	(558,'SEMAYANG - MANGGAR','SEMAYANG ',' MANGGAR','LB','N',110000,0),
	(559,'SEPINGGAN - KKT','SEPINGGAN ',' KKT','TRAILER','20',170000,0),
	(560,'SEPINGGAN - KKT','SEPINGGAN ',' KKT','TRAILER','40',340000,0),
	(561,'SEPINGGAN - KKT','SEPINGGAN ',' KKT','TRONTON','20',160000,0),
	(562,'SEPINGGAN - KKT','SEPINGGAN ',' KKT','TRONTON','N',160000,0),
	(563,'SEPINGGAN - KKT','SEPINGGAN ',' KKT','LB','20',110000,0),
	(564,'SEPINGGAN - KKT','SEPINGGAN ',' KKT','LB','N',110000,0),
	(565,'TANJUNG BATU - BALIKPAPAN','TANJUNG BATU ',' BALIKPAPAN','TRAILER','20',190000,0),
	(566,'TANJUNG BATU - BALIKPAPAN','TANJUNG BATU ',' BALIKPAPAN','TRAILER','40',380000,0),
	(567,'BALIKPAPAN - MUARA BUNYUT','BALIKPAPAN ',' MUARA BUNYUT','TRAILER','N',1600000,0),
	(568,'BALIKPAPAN - MUARA BUNYUT','BALIKPAPAN ',' MUARA BUNYUT','LB','N',400000,0),
	(569,'SAMARINDA - MUARA BUNYUT','SAMARINDA ',' MUARA BUNYUT','TRAILER','N',1600000,0),
	(570,'KARIANGAU - TELUK WARU','KARIANGAU ',' TELUK WARU','TRONTON','20',160000,0),
	(571,'KKT - BUKIT SION','KKT ',' BUKIT SION','TRONTON','20',160000,0),
	(572,'BALIKPAPAN - SEPAKU','BALIKPAPAN ',' SEPAKU','TRAILER','40',440000,0),
	(573,'BALIKPAPAN - SEPAKU','BALIKPAPAN ',' SEPAKU','TRONTON','20',208000,0),
	(574,'BALIKPAPAN - TABANG','BALIKPAPAN ',' TABANG','LB','20',260000,0),
	(575,'BALIKPAPAN - TABANG','BALIKPAPAN ',' TABANG','LB','N',260000,0),
	(576,'BALIKPAPAN - BANTUAS','BALIKPAPAN ',' BANTUAS','TRAILER','40',550000,0),
	(577,'TABANG - MELAK','TABANG ',' MELAK','LB','20',260000,0),
	(578,'TABANG - MELAK','TABANG ',' MELAK','LB','N',260000,0),
	(579,'MELAK - BERAU','MELAK ',' BERAU','CD','N',300000,0),
	(580,'KM 12 - JALAN MINYAK','KM 12 ',' JALAN MINYAK','LB','20',110000,0),
	(581,'SEMAYANG - JALAN MINYAK','SEMAYANG ',' JALAN MINYAK','TRAILER','40',340000,0),
	(582,'KM 05 - BATAKAN','KM 05 ',' BATAKAN','TRONTON','20',160000,0),
	(583,'GN MALANG - KKT','GN MALANG ',' KKT','TRONTON','20',160000,0),
	(584,'SEMAYANG - KM 13','SEMAYANG ',' KM 13','TRAILER','20',170000,0),
	(585,'MANGGAR - JL. BEALER','MANGGAR ',' JL. BEALER','TRONTON','20',160000,0),
	(586,'MANGGAR - JL. BEALER','MANGGAR ',' JL. BEALER','LB','20',110000,0),
	(587,'BALIKPAPAN - SUNGAI PAHU','BALIKPAPAN ',' SUNGAI PAHU','TRONTON','20',950000,0),
	(588,'BALIKPAPAN - SUNGAI PAHU','BALIKPAPAN ',' SUNGAI PAHU','LB','20',600000,0),
	(589,'BALIKPAPAN - TANJUNG KARAS','BALIKPAPAN ',' TANJUNG KARAS','TRONTON','20',325000,0),
	(590,'BALIKPAPAN - TANJUNG KARAS','BALIKPAPAN ',' TANJUNG KARAS','LB','20',220000,0),
	(591,'SOMBER - SOMBER','SOMBER ',' SOMBER','TRONTON','20',150000,0),
	(592,'KKT - BATAKAN','KKT ',' BATAKAN','LB','N',110000,0),
	(593,'BATU AMPAR - KKT','BATU AMPAR ',' KKT','TRAILER','20',170000,0),
	(594,'BATU AMPAR - KKT','BATU AMPAR ',' KKT','TRAILER','40',340000,0),
	(595,'KM 18 - KKT','KM 18 ',' KKT','TRONTON','20',160000,0),
	(596,'BALIKPAPAN - SENIPAH','BALIKPAPAN ',' SENIPAH','TRAILER','40',500000,0),
	(597,'BALIKPAPAN - SENIPAH','BALIKPAPAN ',' SENIPAH','TRONTON','20',250000,0),
	(598,'BALIKPAPAN - SENIPAH','BALIKPAPAN ',' SENIPAH','LB','20',180000,0),
	(599,'BALIKPAPAN - BENGALON','BALIKPAPAN ',' BENGALON','LB','20',260000,0),
	(600,'SEMAYANG - KM 11','SEMAYANG ',' KM 11','TRAILER','40',340000,0),
	(601,'SEMAYANG - KM 11','SEMAYANG ',' KM 11','TRAILER','N',340000,0),
	(602,'SEMAYANG - KM 11','SEMAYANG ',' KM 11','TRONTON','20',160000,0),
	(603,'SEMAYANG - KM 11','SEMAYANG ',' KM 11','TRONTON','N',160000,0),
	(604,'SEMAYANG - KM 46','SEMAYANG ',' KM 46','TRAILER','40',360000,0),
	(605,'SEMAYANG - KM 46','SEMAYANG ',' KM 46','TRONTON','20',170000,0),
	(606,'KKT - KM 46','KKT ',' KM 46','TRONTON','20',170000,0),
	(607,'KKT - TERITIP','KKT ',' TERITIP','TRONTON','20',160000,0),
	(608,'KM 04 - KKT','KM 04 ',' KKT','TRAILER','20',170000,0),
	(609,'GN MALANG - RING ROAD','GN MALANG ',' RING ROAD','TRONTON','20',160000,0),
	(610,'KOTA BARU - MELAK','KOTA BARU ',' MELAK','LB','20',1100000,0),
	(611,'KOTA BARU - MELAK','KOTA BARU ',' MELAK','LB','N',1100000,0),
	(612,'BATAKAN - KARIANGAU','BATAKAN ',' KARIANGAU','TRAILER','40',340000,0),
	(613,'BATAKAN - KARIANGAU','BATAKAN ',' KARIANGAU','LB','20',110000,0),
	(614,'GN MALANG - KM 11','GN MALANG ',' KM 11','TRONTON','20',160000,0),
	(615,'KARIANGAU - SEPINGGAN','KARIANGAU ',' SEPINGGAN','LB','20',110000,0),
	(616,'KKT - GN SARI','KKT ',' GN SARI','TRONTON','20',160000,0),
	(617,'KKT - GN SARI','KKT ',' GN SARI','LB','20',110000,0),
	(618,'BALIKPAPAN - PETUNG','BALIKPAPAN ',' PETUNG','TRONTON','20',175000,0),
	(619,'PS. BARU - KKT','PS. BARU ',' KKT','TRONTON','20',160000,0),
	(620,'KAMPUNG BARU - KM 11','KAMPUNG BARU ',' KM 11','LB','20',110000,0),
	(621,'KAMPUNG BARU - JALAN MINYAK','KAMPUNG BARU ',' JALAN MINYAK','LB','20',110000,0),
	(622,'KARIANGAU - KM 05','KARIANGAU ',' KM 05','TRONTON','20',160000,0),
	(623,'KARIANGAU - BATAKAN','KARIANGAU ',' BATAKAN','TRAILER','20',340000,0),
	(624,'KARIANGAU - BATAKAN','KARIANGAU ',' BATAKAN','TRAILER','40',340000,0),
	(625,'KARIANGAU - BATAKAN','KARIANGAU ',' BATAKAN','LB','20',110000,0),
	(626,'KARIANGAU - BATAKAN','KARIANGAU ',' BATAKAN','LB','N',110000,0),
	(627,'KKT - KM 15','KKT ',' KM 15','TRONTON','20',160000,0),
	(628,'KARIANGAU - KM 11','KARIANGAU ',' KM 11','LB','20',110000,0),
	(629,'KKT - KARANG JATI','KKT ',' KARANG JATI','TRONTON','20',160000,0),
	(630,'KKT - KM 06','KKT ',' KM 06','TRONTON','20',160000,0),
	(631,'KKT - GN PASIR','KKT ',' GN PASIR','TRONTON','20',160000,0),
	(632,'KM 12 - RING ROAD','KM 12 ',' RING ROAD','LB','20',110000,0),
	(633,'KM 12 - RING ROAD','KM 12 ',' RING ROAD','LB','N',110000,0),
	(634,'KKT - SUNGAI AMPAL','KKT ',' SUNGAI AMPAL','TRONTON','20',160000,0),
	(635,'KKT - SUNGAI AMPAL','KKT ',' SUNGAI AMPAL','LB','20',110000,0),
	(636,'MANGGAR - BATU AMPAR','MANGGAR ',' BATU AMPAR','TRAILER','40',340000,0),
	(637,'MANGGAR - BATU AMPAR','MANGGAR ',' BATU AMPAR','TRAILER','N',340000,0),
	(638,'BATAKAN - KKT','BATAKAN ',' KKT','TRAILER','20',170000,0),
	(639,'BATAKAN - KKT','BATAKAN ',' KKT','TRONTON','20',160000,0),
	(640,'BATAKAN - KKT','BATAKAN ',' KKT','TRONTON','N',160000,0),
	(641,'BATAKAN - KKT','BATAKAN ',' KKT','LB','20',110000,0),
	(642,'BATAKAN - KKT','BATAKAN ',' KKT','LB','N',110000,0),
	(643,'KM 28 - KKT','KM 28 ',' KKT','TRAILER','20',170000,0),
	(644,'KM 28 - KKT','KM 28 ',' KKT','TRAILER','40',340000,0),
	(645,'KKT - KM 46','KKT ',' KM 46','TRAILER','40',360000,0),
	(646,'KKT - KM 10','KKT ',' KM 10','TRAILER','40',340000,0),
	(647,'KKT - SUNGAI AMPAL','KKT ',' SUNGAI AMPAL','TRAILER','40',340000,0),
	(648,'KARIANGAU - JALAN MINYAK','KARIANGAU ',' JALAN MINYAK','TRAILER','40',340000,0),
	(649,'KARIANGAU - JALAN MINYAK','KARIANGAU ',' JALAN MINYAK','LB','20',110000,0),
	(650,'KARIANGAU - JALAN MINYAK','KARIANGAU ',' JALAN MINYAK','LB','N',110000,0),
	(651,'SAMARINDA - MELAK','SAMARINDA ',' MELAK','TRAILER','40',1100000,0),
	(652,'SAMARINDA - MELAK','SAMARINDA ',' MELAK','LB','20',300000,0),
	(653,'SAMARINDA - MELAK','SAMARINDA ',' MELAK','LB','N',300000,0),
	(654,'BALIKPAPAN - KAMPUNG TERING','BALIKPAPAN ',' KAMPUNG TERING','LB','20',400000,0),
	(655,'BALIKPAPAN - KAMPUNG TERING','BALIKPAPAN ',' KAMPUNG TERING','LB','N',400000,0),
	(656,'BALIKPAPAN - CAMP BARU','BALIKPAPAN ',' CAMP BARU','LB','20',350000,0),
	(657,'BALIKPAPAN - CAMP BARU','BALIKPAPAN ',' CAMP BARU','LB','N',350000,0),
	(658,'BATAKAN - KAMPUNG BARU','BATAKAN ',' KAMPUNG BARU','LB','20',110000,0),
	(659,' BONTANG -  BALIKPAPAN ',' BONTANG ','  BALIKPAPAN ','LB','20',225000,0),
	(660,' BONTANG -  BALIKPAPAN ',' BONTANG ','  BALIKPAPAN ','LB','N',225000,0),
	(661,'KLANDASAN - KKT','KLANDASAN ',' KKT','TRONTON','20',160000,0),
	(662,'KKT - KM 01','KKT ',' KM 01','TRONTON','20',160000,0),
	(663,'KKT - REGENCY','KKT ',' REGENCY','TRONTON','20',160000,0),
	(664,'KKT - MARKONI','KKT ',' MARKONI','TRONTON','20',160000,0),
	(665,'BALIKPAPAN','BALIKPAPAN','BALIKPAPAN','TRONTON','40',1000000,0),
	(666,'KKT-KM7','KKT','KM7','TRONTON','40',160000,0);

/*!40000 ALTER TABLE `m_route` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table m_shipper
# ------------------------------------------------------------

DROP TABLE IF EXISTS `m_shipper`;

CREATE TABLE `m_shipper` (
  `idm_shipper` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `debitur_name` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `pic` varchar(45) DEFAULT NULL,
  `finance` varchar(45) DEFAULT NULL,
  `telp` varchar(225) DEFAULT NULL,
  `hp` varchar(225) DEFAULT NULL,
  `fax` varchar(225) DEFAULT NULL,
  `corporate_name` varchar(225) DEFAULT NULL,
  `id_bank` int(11) DEFAULT NULL,
  `account_number` varchar(225) DEFAULT NULL,
  `soft_delete` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idm_shipper`),
  UNIQUE KEY `idm_customer_UNIQUE` (`idm_shipper`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `m_shipper` WRITE;
/*!40000 ALTER TABLE `m_shipper` DISABLE KEYS */;

INSERT INTO `m_shipper` (`idm_shipper`, `debitur_name`, `address`, `city`, `pic`, `finance`, `telp`, `hp`, `fax`, `corporate_name`, `id_bank`, `account_number`, `soft_delete`)
VALUES
	(1,'ADI JAYA MAKMUR','','','','','','','','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(2,'Bapak Abdul Fatah','','Surabaya','','','','','','A/N    K R E S N A W A T I',1,'1 9 1 1 6 7 7 2 0 8',0),
	(3,'Bapak Dedy','Ruko Sentra Eropa AB3 No. 16 Balikpapan Baru','Balikpapan','Bpk Dedy','','0812 5401 7188','','','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(4,'Bapak Fadhil','Apartemen green pramuka tower chrysant 21JO, ','Cempaka Putih , Jakarta Pusat 10510','','','0813 1114 4089 / 0857 7425 7346','','','',0,'',0),
	(5,'Bapak Heroe Antojo','Wisma Penjaringan Sari, Jl. Pandugo Baru X Bl','Surabaya','','','0811 543 552','','','',0,'',0),
	(6,'Bapak Iqbal Kurniawan','Perumahan Wedoro Regency no 23-25','Waru - Sidoarjo','','','0813 3344 4276','','','',0,'',0),
	(7,'Bapak Yusak Seko','','Balikpapan','','','','','','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(8,'BOBY','','','','','','','','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(9,'Bpk Abdullah Gatmir','Pondok Pekayon Indah Blok D No.4','Pekayon Jaya - Bekasi','','','0815 1623 917','','','',0,'',0),
	(10,'Bpk. Ramses','','','','','','','','',0,'',0),
	(11,'Bpk. Saka / Ibu Krestiyati','Jl. Ciracas Raya, Rukem RT 10/08 No. 19','Jakarta Timur','','','','0851 0155 9257','','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(12,'CV. Benua Swadaya Makmur','Jln. M. Yacub no.69 B','Medan - Sumatera Utara - 20233','Ibu Stephannie / Silvia','','061 - 4159767','','','',0,'',0),
	(13,'CV. Berkat Karya Tripelita','Jl. Kelapa Dua Cilincing No.31','Tg. Priok Jakarta Utara 14120','Bpk Sony Melky (0813 9927 2728)','','021 - 4400447, 4400380','','021 - 4405869','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(14,'CV. Budi Daya Abadi','Jl. Cilegon Kariangau Graha Indah KM 5,5','Balikpapan','Bapak Musliman','','','','','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(15,'CV. FFL Trans','Perumahan Solthana Residen Blok B 17 Barombon','Makassar - Sulawesi Selatan','Bpk. Ramses','','','0813 5535 3102','','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(16,'CV. INTAN DAYA MANDIRI','Ruko Grand Galaksi City Block RRG5 No. 58','Bekasi Selatan','Bpk Maskur','','021 82735889','0821 2748 6916','','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(17,'CV. MAGNA MULIA','Jalan Raya Narogong km.7 no.111 B','Cependawa - Bekasi Timur','','','','0812 9552 3816','','',0,'',0),
	(18,'CV. MITRA SARANA TRANS','Sambikerep Indah Blok D IV / 25','Surabaya','Ibu Indra','','031 - 7442210 / 0812 3393 6236','','','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(19,'CV. Putra Jogja Pratama','JL. Tanjung Sadari No.11','Surabaya','Bpk. Rahmad','','031 - 70350817','','031 - 3558285','A/N    K R E S N A W A T I',1,'1 9 1 1 6 7 7 2 0 8',0),
	(20,'CV. Sinergi Stone','Jl. Raya Ki Ageng Tepak Ds. Balad','Cirebon','','','','','','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(21,'IBU LIA','','','','','','','','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(22,'MEIKO EXPRESS','','','','','','','','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(23,'PERDANA SEKAWAN PERKASA','JL. Cempaka Raya Komplek Agraria 2 Gang 3 No.','Banjarmasin','Bpk. Rahmani','','0852 5199 7854','','','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(24,'PT. Abi Kencana Express Line','Jl. Purwodadi Gg. 1 No. 88','Surabaya','Ibu Anik','','031 3533209','','031 3533212','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(25,'PT. Agility International','Gd BRI Twr Lt. 5 Jl. Jend Sudirman 37','Balikpapan','Ibu Lidia','','0542 - 414555','','0542 - 414554','PT. PERDANA SEMESTA PERKASA',3,'1.490.005.758.885',0),
	(26,'PT. Agung Tirta Lestari','Kelapa Gading Square, City Home San Fransisco','Jl. Boulevard Barat Raya Kelapa Gading Jakart','Ibu Yulan','','021 - 45870058','','','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(27,'PT. ALAMUI LOGISTICS - JKT','Jl. Gading Kirana Barat IX Blok D6 No. 41-42','DKI Jakarta , Jakarta UtARA 14240','Ibu Indah','','021 - 2606 0252 / 021 - 4587 8888 (finance)','','','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(28,'PT. ALAMUI LOGISTICS - SBY','Jl. Margomulyo 9, Grand Margomulyo Center D-5','Surabaya - Jawa Timur','Bapak Ade','','0812 5935 3500','','','PT. PERDANA SEMESTA PERKASA',3,'1.490.005.758.885',0),
	(29,'PT. Alur Indonesia Logistik','Jl. Ikan Mungsing VII No.79','Surabaya','Ibu Yani','','031 - 3529299','','031 - 3529298','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(30,'PT. Anida Anugrah Cargo','Jl. Satria II no.17 RT.008  RW.01. Kel. Padem','Jakarta Utara','Ibu Tari','','021 - 2361 1792','','021 - 6471 4628','A/N    K R E S N A W A T I',1,'1 9 1 1 6 7 7 2 0 8',0),
	(31,'PT. ANUGERAH BERLIAN PERKASA','Jl. R.E Martadinata no.100 (Komp Inkopau Blok','Kel. Tg. Priok, Kec. Tg. Priok. Jakarta Utara','Ibu Anggy Safitri','','0856 9345 7863','','','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(32,'PT. Anugerah Samudera Transindo','Villa Galaxy Jalan Lotus Tengah 4 blok E5 no.','Kel. Jakasetia, Kec. Bekasi Selatan - Jawa Ba','Pak Basuki / Pak Allandra','','021 - 82436692','0813 8950 9771','','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(33,'PT. ANX Logistics','Villa Galaxy Jalan Lotus Tengah 4 blok E5 no.','Tangerang Selatan - 15322','Ibu Ina Aprianti','','021 - 5386320, 5391202','','021 - 5386513','',0,'',0),
	(34,'PT. Armada Beton','Rukan Puri Mutiara, Jl. Griya Utama Blok A70 ','Sunter Agung - Jakarta Utara','Ibu Nilla','','021 - 43920077','','','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(35,'PT. Arya Jasa Purnama','Jl. Perum Pesona Alam Gunung Anyar 2 Blok H/0','Surabaya','Ibu Endang','','','0823 3096 1259','','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(36,'PT. ASALUAS','Jl. Agung Niaga V Blok G-5 No.47','Jakarta 14350 - Indonesia','Ibu Fanny','','021 - 65835980','','','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(37,'PT. Awan Samudera Lestari','Gedung Karana Lines 1floor Jl. Perak Timur No','Surabaya','','','031 - 329 5575','','031 - 329 2272','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(38,'PT. Benua Swadaya Makmur','Jln. M. Yacub no 69 B','Medan 20233','Ibu Sylvia Ang','','061 - 4159767, 4143077','','061 - 4143077','PT. PERDANA SEMESTA PERKASA',1,'1 9 1 - 2 1 8 8 4 9 - 8',0),
	(39,'PT. BERNIAGA JAYA LESTARI','JL. Abu-abu GG Manunggal 32, Kel. Teluk Bayur','Berau - Kalimantan Timur','Ibu Listya','','','0822 5041 5178','','',0,'',0),
	(40,'PT. Binamandala Pratama Perkasa','JL. Perak Timur 174','Surabaya','Ibu Lestari','','031 - 3295510','','031 - 3294030','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(41,'PT. Bintang Timur Dwijaya','Gading Mediterania Tower C Rk. 45 B, Jl. Boul','Kelapa Gading - Jakarta Utara','Ibu Lina','','021 300 41030','','','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(42,'PT. Borwita Citra Prima','Jl. Raya Taman No. 48A Sepanjang','Sidoarjo - Jawa Timur','Ibu Fitry / Ibu Kiki','','','0881 9552 567','','',0,'',0),
	(43,'PT. BUCI JASA MANDIRI','Harapan Indah Blok OC No.1','Bekasi Barat','Ibu Jane','','021 - 8870655, 99556587','','021 - 8870655','PT. PERDANA SEMESTA PERKASA',10,'1000 584 262',0),
	(44,'PT. Cahaya Bagus Anugrah','Jl. Kalianget No.130','Surabaya','Ibu Susi','','031 - 3288286','','031 - 3288287','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(45,'PT. Cahaya Pengajaran Abadi','Sentra Eropa Blok AA-1B No.3','Balikpapan','Ibu Alfrida M.B.','','0542 - 873872','','0542 - 872223','PT. PERDANA SEMESTA PERKASA',3,'1.490.005.758.885',0),
	(46,'PT. Cahaya Samoedera Bersaudara','Rukan Multiguna No.6P, Jl. Rajawali Selatan R','Kota Baru Bandar Kemayoran, Jakarta 14410,Ind','Bpk Anton','','021 - 64702882','','021 - 29452828','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(47,'PT. Cipta Kreasindo Abadi','JL. Mojoarum 1 No.34','Surabaya','Ibu Yeai','','0812-3011-5522','','','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(48,'PT. Devina Fortis Abadi','Komplek Ruko Soho Jalan M. Kaffi II no.9L','Jagakarsa - Jakarta Selatan','Ibu Fitri','','021 223 735 88 / 89','','','PT. PERDANA SEMESTA PERKASA',10,'1000 584 262',0),
	(49,'PT. Djasa Sumatera - JKT','JL. Teh No.17 B','Jakarta Barat 11110','Ibu Sussie','','021 - 6915333','','021 - 6900818','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(50,'PT. Djasa Sumatera - SBY','JL. Perak Timur 174','Surabaya 60165','Ibu Susi','','031 - 3294330','','031 - 3296011','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(51,'PT. Djaya Samudera Indonesia','Gedung Wisma Udaya Lt.2 Mod 2, Ll. Danau Sunt','Jakarta Utara 14350','Ibu Yulia','','021 6531 0166','','021 6531 0212','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(52,'PT. Dunia Express','JL. Agung Karya VII No.01','Sunter - Jakarta 14340','Ibu Lina','','021 - 6505603','','021 - 6511041','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(53,'PT. Duta Lintas Nusa','Jl. Raya Surabaya-Malang','DS. Legupit no.5 Apolo Gempol 67155 Pasuruan','Bpk Muslimin','','0343 - 855295','','','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(54,'PT. Empat Warna','Jl. Tiga No.107 RT.33 Kel. Gunung Samarinda','Balikpapan','Pak Supardi','','0812 2655 5522','','','',0,'',0),
	(55,'PT. Galuh Protank Logistics','Showroom Angtropolis 31 - Jl. Raya Margo Muly','Surabaya','Ibu Wiwin','','031 - 7493454','','031 - 7494952','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(56,'PT. Global Multi Raharja','Jl. Mangga Dua Raya No.8 Gedung WTC Lantai UG','Jakarta Utara 14350','Pak Dedi','','021-29986070','','021-6902573','A/N    K R E S N A W A T I',1,'1 9 1 1 6 7 7 2 0 8',0),
	(57,'PT. Global Transportasi Nusantara - BPN','Ruko Balikpapan Baru Blok AB3 No. 16 RT.52','Damai - Balikpapan Selatan','Ibu Triana','','0542 - 8862629','','','PT. PERDANA SEMESTA PERKASA',3,'1.490.005.758.885',0),
	(58,'PT. Global Transportasi Nusantara - JKT','Jl. Ir. H. Juanda III No.25 A-B 3rd Floor','Jakarta Pusat 10640','Ibu Ivana','','','','','PT. PERDANA SEMESTA PERKASA',3,'1.490.005.758.885',0),
	(59,'PT. Gunung Djati Manunggal','Jl. Jakarta No. 60A, Tanjung Perak','Surabaya - Jawa Timur','Ibu Irmawati','','0813 3511 4321 / 031 328 2446','','','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(60,'PT. Haluan Trans Indonesia','Utaka Building 87, 2nd Floor , Jl. Raya Utan ','Jakarta Timur 13120','Bapak Benny','','0818 0676 5059 / 0813 9935 4949','','','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(61,'PT. INDOFOOD CBP SUKSES MAKMUR Tbk','Jl. A. Yani Km.32 Liang Anggang Kecamatan Bat','Kab. Tanah Laut , Banjarmasin 70852','Bpk Budi Irawan','','','0813 4944 6634, 0511 - 4787981,4787982','0511 4781777','PT. PERDANA SEMESTA PERKASA',10,'1.000.584.262',0),
	(62,'PT. Janani Abadi','Gading Bukit Indah Blok W-10, Jl. Bukit Gadin','Jakarta Utara 14241','Bpk Sony','','021 - 29745622','','','PT. PERDANA SEMESTA PERKASA',3,'1.490.005.758.885',0),
	(63,'PT. Jasa Guna Asia Raya','City Teracce Ruko Jati Bening Park Blok 20-B.','Jati Bening - Bekasi','Ibu Rina','','021 - 2946 8885','','','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(64,'PT. Jaya Gemilang Bersama','Malibu Beach F6 / 20 Palm Beach Pakuwon City','Surabaya','Bpk Awi','','0812 3132 0782','','','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(65,'PT. Karya Anugerah Lestari','','','','','','','','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(66,'PT. Karya Lintas Cakrawala','Ruko Center Point blok A-5, Jl. Kenjeran no.3','Surabaya','Ibu Endang','','0823 3096 1259','','','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(67,'PT. Kayana Manggala Reswara','Komplek Pergudangan PT. Duta Lintas Nusa (DUT','Bekasi – Jawa Barat\n\n','Ibu Narni','','021-89981622','','021-89981621','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(68,'PT. KECE NUSANTARA','Pengampon Square Blok H-20, Jl. Semut Baru','Surabaya','Ibu Ratna','','031 99000588 / 35556550','','031 99000488','',0,'',0),
	(69,'PT. Kharisma Berkah Nusantara','Jl. Manggarai Utara I No. H9','Jakarta 12850','Bpk Arif','','021 - 8292720','','021 - 183795639','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(70,'PT. Kitrans Logistik / Kunci Inti Transindo','Ruko Lodan Center Blok R No.3, Jl. Lodan Raya','Jakarta Utara 14430','Pak Joe Wira (0813 9856 6187)','','021 - 6919977','','','',0,'',0),
	(71,'PT. KOPINDO CIPTA SEJAHTERA','Jl. Wahidin Sudirohusodo 99 . 36B / 26 RT.03 ','Kab. Gresik - Jawa Timur','Bapak John Paul T','','','0812 1654 661','','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(72,'PT. KUNCI SUKSES MAKMUR \n ','Wisma Laena 3rd floor, Unit 308, Jl. KH. Abdu','Jakarta 12860','Pak Sofyan Hadi','','62 21 8282441','','62 21 8370 3742','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(73,'PT. Lancar Prima','Komp. Marthadinata Megah Blok C-8, Jl. RE Mar','Tanjung Priok - Jakarta','','','021 - 43920077','','','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(74,'PT. LINTAS JAYA PUTRA','Perum. Geriya Taman Asri Block FI-20','Tawang Sari - Taman Sepanjang - Sidoarjo','Bapak Ketut','','0823 1152 8420','','','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(75,'PT. Mandala Jasa Pratama','Ruko JBC B 8, Jl. Raya Ir. H. Juanda no,1','Sidoarjo','Ibu Wulan (0856 4633 4398)','','031 8553266','','','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(76,'PT. Mangde Reja Partaya','Jl. Ikan Dorang No.28','Perak - Surabaya 60177','K.G Widnyana','','031 - 3547658','','031 - 3547659','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(77,'PT. METTA TRANSPORT','','','','','','','','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(78,'PT. Misa Utara','Jl. Hasanudin No.13','Singkil - Manado','Bapak Iwan Dj','','0431 - 842824','','','',0,'',0),
	(79,'PT. Mitra Megamas Indonesia','JL. Janur Elok 9 Blok QH 8 No.4 Kel. Kelapa G','Kelapa Gading - Jakarta Utara','Bpk. Surono','','021 - 45876633','','021 - 45860653','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(80,'PT. MIZARI UTAMA TRANSPORTINDO','Jl. Dr. Wahidin Gang Batas Pandang Kompleks K','Sungai Jawi - Pontianak 78118','Bpk. Jefri','','','81352550123','','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(81,'PT. MULIA INTI CARGO','Jl. Assafiiyah RT.03 / RW.03, Kav Panorama No','Jakarta Timur','Ibu Sulastri','','','0812 8191 426','','',0,'',0),
	(82,'PT. Multiguna International Persada - JKT','Kirana Cawang Business Park, Jl. DI. Panjaita','Jakarta Timur – 13340 Indonesia','Pak Ghufron','','021-22850099 (ext 103)','','021-22850003','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(83,'PT. Nayaka Transportama','Jl. Perak Timur No. 428','Surabaya','Bpk Iqbal','','','0813 3344 4276','','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(84,'PT. Nestu Nusaraya','Jl. Tembusan Kalimalang no.1 A-E lantai 3E','Jakasampurna, Bekasi Barat','Pak Basuki','','021 - 82436692','','','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(85,'PT. Okken Buana Digdaya','Jl. Palem Selatan V/MC 132 Pondok Candra','Sidoarjo','John Paul T','','031 8681790 , 8681877','','','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(86,'PT. Panalpina Nusajaya Transport','Soewarna Business Part Block H Lot 11 Soekarn','Kel Pajang Kec. Benda, Tangerang','Bpk. Nanda Saputra','','021 - 5591 9194','81299126354','','PT. PERDANA SEMESTA PERKASA',3,'1.490.005.758.885',0),
	(87,'PT. Paramita Armada Inti','Jl. Mayjen Sutoyo No.15, Gunung Malang','Balikpapan','Ibu Berti','','0542 - 731939','','0542 - 427510','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(88,'PT. Pelayaran Tempuran Emas Tbk.','Jl. Tembang no.51','Tanjung Priok , Jakarta 14310','Ibu Berti','','021 - 4302388','','021 - 4380061','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(89,'PT. Pendawalima Jayanthara','Ruko Graha Mas Blok B-12, Jl. Raya Pejuangan ','Kebon Jeruk - Jakarta 11530','Ibu Yuli','','021 - 5303032','','021 - 5303042, 5303142','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(90,'PT. Perdana Semesta Perkasa','Jl. Meyjen Sutoyo No.15','Balikpapan','perdana_bpn@indo.net.id','','0542 - 422405','','0542 - 427510','',0,'',0),
	(91,'PT. Perdana Semesta Perkasa - SMD','Jl. Untung Suropati, Perumahan Karpotek Blok ','Samarinda','','','Madan (0853 8861 1594)','','','',0,'',0),
	(92,'PT. POEHAI MITRA SEJATI','Jl. Kebon Bawang  III No.16A RT.008 Kel. KB. ','Kec. Tg. Priok - Jakarta','Ibu Yanti','','021 43934068','','','',0,'',0),
	(93,'PT. Prima Samudera Zonatrans','JL. Prof Dr. Supomo No.12 Menteng Dalam','Tebet, Jakarta Selatan 12870','Bpk. Bontos','','021 - 83709165','','021 - 83794661','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(94,'PT. Puninar Infinite Raya','Jl. Raya Soekarno Hatta KM.13 , Jl. Pulau Bal','Balikpapan - Kaltim 76136','Ibu Delyta','','','','','PT. PERDANA SEMESTA PERKASA',3,'1.490.005.758.885',0),
	(95,'PT. PURI CIPTA MANDIRI','Ruko Bukit Palma Grandia Blok RG 2 No. 8','Surabaya','Ibu Rica','','031 - 7412011','','031 - 7412011','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(96,'PT. Putra Abadi Trans','Jl. Tanjung Priok no.11 E','Surabaya','Ibu Ida','','031 - 3577619, 3531019','','031 - 3539372','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(97,'PT. Putra Abadi Trans','Jl. Tanjung Priok no.11 E','Surabaya','Ibu Ida','','031 - 3577619, 3531019','','031 - 3539372','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(98,'PT. Putra Daerah Mandiri Jaya','JL. Wisma Permai Tengah I Blok CC - 26','Surabaya - 60115','Ibu Ida','','031 - 5921565','','031 - 5912627','A/N    K R E S N A W A T I',1,'1 9 1 1 6 7 7 2 0 8',0),
	(99,'PT. RADIAN ABADI TRANSINDO','Jl. SMP 258 RT.15/10 Kavling Markisa','Cibubur - Jakarta Timur','Bpk Iwan Kurniawan','','0821 1293 2891','','','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(100,'PT. RIZQY CARGO ABADI','Jl. R. E. Martadinata Komp. Ruko Martadinata ','PONTIANAK','Bpk Asep','','(0561) - 585782/ (0561) - 6783587','','(0561) - 6588204','',0,'',0),
	(101,'PT. Saga Prima Mandiri','','','Ibu Atik','','','','','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(102,'PT. Sahabat Mitra Logistindo','Jl. Raya Enggano Tjokro Building 3 th Floor N','Tanjung Priok - Jakarta Utara','Pak Hilal','','021 - 43904292','','021 - 43933056','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(103,'PT. Sanko Jaya Mandiri','Perumahan Taman Asri Blok D2/1 RT.006/01','Kel. Cipadu Jaya Kec. Larangan Ciledug Tanger','Pak Hilal','','021 - 7306057, 7306567','','021 - 7304847','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(104,'PT. Sapta Sumber Lancar','Jl. Sultan Hasanuddin No. 5 Rt.4 Kariangau KM','Balikpapan (Bp.Fandy : 08971206049/0822544193','Ibu Itha / Ida (itha : 081347345020)','','0542 - 8037555','','','A/N    K R E S N A W A T I',1,'1 9 1 1 6 7 7 2 0 8',0),
	(105,'PT. Sarana Artha Logistik','Jl. Penggalang RT.33 No.19A, Kel. Damai Kec. ','Balikpapan 76114','Bpk. Musthofa','','0542 8510719','','','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(106,'PT. SARANA LINTAS CARAKA','Jl. Enim 2 No.56','Tanjung Priok, Jakarta Utara 14310','Ibu Mamik','','021 - 4353115, 4353116','','021 - 43934739','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(107,'PT. Sarana Pandawa Logistik','Ruko Mega Grosir Cempaka Mas Blok N no.9 Jl. ','Jakarta Pusat 10640','Ibu Tanti Daely','','021 - 21478488','','021 - 21477422','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(108,'PT. SARANA PERDANA MULIA','Jl. Papyrus 3 Serenade Lake Blok B5 No.20, Ke','Tanggerang','Ibu Santi','','0811 9936 278','','','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(109,'PT. Sarana Raya Kalimantan','Jl. Yos Sudarso No.45','Samarinda','Pak Riky','','0541 - 735096 , 724008','','0541 - 731676','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(110,'PT. Schenker Petrolog Utama','Jl. Jend. Sudirman No. 784','Balikpapn 76114','Ibu Elmi Pujiastuti','','0542 - 765702','','0542 - 760157','PT. PERDANA SEMESTA PERKASA',3,'1.490.005.758.885',0),
	(111,'PT. Schenker Petrolog Utama - JKT','Wisma Raharja Building 5th floor, Jl. Tb. Sim','Jakarta 12560','Bpk Mario','','021 - 78843788 ext 6315','0821 2167 8902','','',0,'',0),
	(112,'PT. Sentra Amanah Ventura','','','','','','','','PT. PERDANA SEMESTA PERKASA',3,'1.490.005.758.885',0),
	(113,'PT. Sindur Mandiri','Jl. Ikan Lumba-Lumba No.30','Surabaya','Ibu Titi (0812 3255 06007)','','031 - 3538245','','','',0,'',0),
	(114,'PT. SUMBER MUTIARA PRIMA','','','','','','','','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(115,'PT. Surabaya Bahari Logistindo','Ruko Taman Beverly Blok 22, Jl. HR. Muhammad ','Surabaya 60189','Bpk Didit / Ibu Liliana (untuk isotank)','IBU KHUSNUL','031 - 7349068','','031 - 7349069','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(116,'PT. Surya Samudera Perkasa','Jl. Demak Jaya III / 23','Surabaya 60173','','','031 - 60557702','','','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(117,'PT. Suryagita Nusaraya','Komplek Balikpapan Permai , Jl, Jend. Sudirma','Balikpapan - Kalimantan Timur','Ibu Emi','','0542 412483 , 749515','','0542 744932','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(118,'PT. Tanton Intim Lines','Jl. Indrapura 29-33','Surabaya-60176','Ibu Fania','','031 - 3533392','','031 - 3533396','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(119,'PT. Tata Mandiri Sejahtera','Graha YKPP Unit III-01 B JL. Veteran no. 6-8','Surabaya','Pak Fadjar','','031 - 99000432','','031 - 99000432','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(120,'PT. Temas Line','Jl. Sultan Abdullah no 75','Makasar 90212','Bpk. Zulkifli Syahril','','','','','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(121,'PT. Temas Suzue Indonesia (Lantai 4)','Jl. Yos Sudarso Kav. 33, Sunter Jaya','Jakarta Utara 14350','Ibu Lisa Indrawaty','','021 - 4302388','','021 - 4380061','PT. PERDANA SEMESTA PERKASA',1,'1 9 1 - 2 1 8 8 4 9 - 8',0),
	(122,'PT. Tiga Sekawan Sukses Ekspres','Komp. Puri Delta MAS Blok D1-3, Jl. Bandengan','Jakarta Utara 14450','Ibu Hariaty','','021 - 66692366 (ext 246)','','021 - 66674333','PT. PERDANA SEMESTA PERKASA',1,'1 9 1 - 2 1 8 8 4 9 - 8',0),
	(123,'PT. TPIL LOGISTICS - JKT','Jl Enggano No.90 Tanjung Priok','JAKARTA UTARA 14310','Ibu Lesmina / Team CS (inv storage)','','021 - 2957 6888 (jl. Cumi)  (ibu Lenali : 0896 5380 0272)','82211213641','','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(124,'PT. TPIL LOGISTICS - SBY','Jl. Karet 104','Surabaya','ibu yani (document)','','031 - 3533989','','','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(125,'PT. Trans Mutiara Logistics','Jl. Raya Kamal Outer Ring Road , Mall Taman P','Cengkareng , Jakarta Barat 11730','','','021 - 54351815','','021 - 54351815','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(126,'PT. TRANS WALI CORI','Jl. Cempaka Putih Tengah 4B No. B5','Cempaka Putih , Jakarta Pusat 10510','Pak Andi Pasdar','','021 4246712','','021 4246712','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(127,'PT. TRANSINDO GLOBAL EKSPRESS','Jl. Raya Satelit Indah VIII Blok EN No.12 A','Surabaya','Ibu Endang','','0823 3096 1259','','','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(128,'PT. Transindo Primatama','Jl. SH Sarundajang No. 8, Samping TK Handayan','Kota Bitung - Sulawesi Utara (95511)','Ibu Kiky Febrina Gobel','','0438-2230695','','0438-2230694','',0,'',0),
	(129,'PT. Trisnafe International Cargo','Komplek Ruko Inkopal Blok F 7','Jl. Boulevard Barat Raya Kelapa Gading Jakart','Ibu Tia','','021 - 29616061','','021 - 29616074','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(130,'PT. Wahana Sentana Baja','Istana Cilegon Kav.36, Jl. Sultan Ageng Tirta','Cilegon 42414','Bapak Gatot Wiranto','','0254 - 396375','','0254 - 392428','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(131,'PT. Wahyu Agung Manunggal','Jl. Laksda M.Nasir No. 29 Blok G No. 11 - Tan','Surabaya','Ibu Yani','','031 - 3282035 , 3282074 (Email : yaniwam@yahoo.co.id)','','031 - 3282078','A/N    K R E S N A W A T I',0,'1 9 1 1 6 7 7 2 0 8',0),
	(132,'PT. WILMA ANUGRAH JAYA','Jl. Ganggeng  VII No. 28 RT.003 / RW.007, Kel','Jakarta Utara','Ibu Mariana','','021 - 43924853-54','','021 - 43924849','',0,'',0),
	(133,'PT. Yokobana IND','Jl. Raya Kelapa Dua Ruko Frankfurt Blok A 2 K','Kelapa Dua Tangerang','Bpk Nico Latin','','Tel : 021-55767226 / 021 - 29238957','','021 - 29238957','PT. PERDANA SEMESTA PERKASA',3,'1.490.005.758.885',0),
	(134,'SAV LOGISTIC','','','','','','','','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(135,'UD. WENANG','Jl. Krembangan Barat No.29','Surabaya','Bpk Abdul','','031 - 3575428 / 3536988','','','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(136,'PT. Trans Liquids Indonesia','Jl. Lumba lumba No.19 Tanjung Perak','Surabaya','Bpk Riza / Arief','','081288600369','','','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(137,'Bapak Airlangga','','Balikpapan','','','','','','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(138,'PT. Kayana Global Kargo','Jl. Flores III Blok CIII No.1, Cikarang Barat','Bekasi, Jawa Barat 17520','Ibu Rina','','021 - 89982145','','021-89981621','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(139,'PT. Duhita Dwimanunggal','Jl. Jembatan III Barat, Komplek Pergudangan P','Jakarta Utara','Ibu Meta','','','','','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(140,'Bapak Hendra Sesario','','Jakarta','','','','','','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(141,'CV. Jalan Raya','','Jakarta','','','','','','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(142,'Bapak Agung Priyo Leksono','Komplek Bumi Serpong Residence, Jl. Gn.Merapi','Tangerang Selatan','Bapak Agung Rahardjo','','021 - 29050333, 081311120777, 08119349777','','','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(143,'PT. Eurotrans Logistik Indonesia','','Jakarta','','','','','','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(144,'PT. CIPTA SETIA MANDIRI','','Surabaya','Bapak Darmawan Ibrahim','','0812 6371 6484','','darmawanibrahim@yahoo.com','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(145,'Ibu Lili','','Jakarta','','','','','','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(146,'Bapak Bernard','','Jakarta','','','','','','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(147,'PT.ASIA ADHITAMA SHIPYARD','','Balikpapan','','','','','','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(148,'CV.TIARA BIHAMA EXPRESS','Jl. Gresik No.4B Lantai 3 Krembangan','Surabaya','','','','','','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(149,'PT.DHIWANTARA MUDA EXPRESS','Jl. Husein Sastranegara, Komp. Taman Mahkota ','Tangerang','Bapak Gerry','','021 - 29405203','','022-7320417 (e-mail : dmxlogistic@yahoo.com','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(150,'IBU VERA','','','','','','','asiajaya.indologistik@yahoo.com','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(151,'CV. MITRA SEJATI','Jl. Jend. Sudirman No. 4','Balikpapan','Bapak Ivan','','0542 - 424743, 732576','','0542 - 424958','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(152,'PT.MITRA JAYA KARYA BERSAMA','Jl. Dupak Bangunsari Tengah No.9','Surabaya','Ibu Juli','','031 - 3557458 / 3525587 / 0821 4095 9555','','031 - 3557458','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(153,'PT.MITRA BAKTI NUSA','EightyEight @ kasablanca Office Tower 25th Fl','Jakarta Selatan - 12870','Ibu Henny','','','0818 9590 98  0/ 021 - 2968 1688','','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(154,'PT.Zayyan Berkah Mandiri','Permata Regency D/37 Srengseng Kembangan','Jakarta Barat','Imam Muziyanto','','0878 0002 0092','','','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(155,'PT. Wahyu Abadi Transport','Komp. Bukit Damai Sentosa 2 Blok H No.5 Jl. A','Balikpapan','Bapak Mudar','','0542 - 764 074','','','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(156,'PT. Karya Dila Pratama','Jl. Bahari IV No.144, Tanjung Priok','Jakarta Utara','Bapak Idris','','0821 2587 0989','','','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(157,'PT. Surabaya Bahari Logistindo - JKT','Perkantoran Graha Mas Pemuda Blok ac-9 Lantai','Jakarta Timur 13220','Bapak Syamsul','','021 - 29626601','','','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(158,'Bapak Idil Fitri','','','','','','','','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(159,'PT. AICO Energi','Komp. Balikpapan Baru Sentra Eropa Blok AB 4 ','Balikpapan','Bapak Joko Widodo','','','','joko.widodo@samudera.id','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(160,'PT. ALD Logistik Indonesia','Simprug Diporis Daan Mogot Blok A5 No.9 Jl. M','Tangerang','Bapak Emil','','','0852 1780 5998','emil@aldlogistics-ina.com, finance@aldlogistics-ina.com','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(161,'PT. DIAN KASIH','Jl Kebon Bawang 6 No.57, Tanjung Priok','Jakarta Utara','Ibu Lili','','','0821 2466 5774','pt.diankasih88@yahoo.com','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(162,'PT. DIRGANTARA CARGO INDONESIA','','Jakarta','Bapak Fajar Ferdian','','','','','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(163,'PT. Basmalah Batara Sakti','','Jakarta','Bapak Agung','','','0812 2000 7737','','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(164,'PT. Tangguh Mandiri Transportama','Jl. Pluit Sakti 1 No. 121','Jakarta Utara','Bapak Marsito','','','0813 1718 2877','','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(165,'PT. Galileo Unggul Logistics','Ruko Taman Borobudur Extention Blok N No.6 Jl','Tangerang - 15811','Ibu Rose','','','0815 1449 9688 (wa) / 0812 8884 3936 / 021 - 5913139','','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(166,'PT. Ken Sarana Bintang','','Jakarta','Bapak Fajar Ferdian','','','','','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(167,'Bapak Saad Djunaid','','Balikpapan','','','','','','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(168,'PT. Bintang Segara Mas','Ruko Mutiara Taman Palem Blok H-2 No.5 Cengka','Jakarta Barat','Bapak Fandi','IBU FAUZIAH','021- 5694 5377, 7078 7276','','','PT. PERDANA SEMESTA PERKASA',1,'1 9 1 - 2 1 8 8 4 9 - 8',0),
	(169,'PT. ZAYYAN LOGISTICS','','','Bapak Fauzan','','0812 8441 7686','','zayyanlogistics@yahoo.com, imamaziz.domestics@yahoo.com, zayyanmandiri19@gmail.com','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(170,'BAPAK IDRIS','','Jakarta','','','','','','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(171,'PT. CAHAYA LINTAS SULAWESI','','Jakarta','Bapak Gunarso','','','','','0',0,'#VALUE!',0),
	(172,'PT. Wahana Lintas Nusantara','Jl. Jembatan Tiga Raya Komp. Ruko Harmoni Mas','Jakarta Utara','Ibu Susi','','021- 6618006, 6618007,','0812 8720 937','','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(173,'PT.ANUGERAH LOGISTIK PRESTASINDO','Springhill Office Tower LT.3 Unit C, Jl. Beny','Jakarta Utara','Bapak Joni','','021 - 2260 4272','','','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(174,'PT. ANUGRAH MITRA BENUA','Jl Raya Siliwangi No. 668 Rawa Panjang','Bekasi','Bapak Hermanto','','0812 5522 6975 / 021-82437796','','','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(175,'PT. Diva Yudha Mandiri','Taman Harapan Baru Plaza THB, Blok F1 No.51, ','Bekasi','Ibu Dian','','021 - 22164512,','0812 8195 4939','','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(176,'PT. Trans Continent','Komp. Mall Fantasi Blok AA-4 No.29, Damai, Ba','Balikpapan','Bapak Rudi','','0542 - 878458','','','PT. PERDANA SEMESTA PERKASA',3,'1.490.005.758.885',0),
	(177,'PT. Kimia Farma','','','','','','','','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(178,'PT. Widatra','','','','','','','','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(179,'PT. Artalapan Strategi Logistik','Jl. Pakis Tirtosari No.26','SURABAYA','Bapak Leonard Nanda','','0811 3076 333','','','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(180,'BAPAK IWAN','','BALIKPAPAN','','','','','','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(181,'PT. Bima Trans Express','','JAKARTA','','','','','','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(182,'PT. MAJU MUNDUR','','','','','','','','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(183,'PT. DAILY EXPRESS','','JAKARTA','','','','','','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(184,'PT. Multiguna International Persada - SBY','Jl. Tanjung Sadari No. 37','SURABAYA','Bapak Hendri S','','031 - 357 9181 / 0812 3289 2955','','','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(185,'PT. Anugrah Inti Mulia','Jl Udang Raya No.92A Kayuringin Jaya, Bekasi ','BEKASI - 17144','Ibu Yulan','','021 - 4587 0058 / 0812 8700 2562','','','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(186,'PT. Bumindo Sarana Transportasi','Pesona Metropolitan Ruko Gardenia Jl. Raya Si','Jakarta','Ibu Kristin','','','','','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(187,'PT. Jantera Multi Sarana','Jl. Celebratiuon Blvd Blok AA - 03 No.1 Grand','Bekasi','Bapak Beny','','0818 0965 0070','','','Airlangga',3,'1.490.004.238.756',0),
	(188,'PT. Coral Expedition','','Jakarta','Ibu Yanti','','','','','Airlangga',3,'1.490.004.238.756',0),
	(189,'PT. RITRA ABADI','Komplek Ruko Enggano Megah Blok B No.9C Jl. E','Jakarta 14310','Ibu Tanti Daely','','021 - 43905040 / 0812 1150 4107 , 0818 494 122','','','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(190,'PT. Dewata Freight International','Kirana Two Office Tower 12nd FL Suite 12A-B','Jl. Boulevard Timur No.88 Kelapa Gading Jakar','Ibu Deviyanti','','021-29688899','','','PT. PERDANA SEMESTA PERKASA',3,'1.490.005.758.885',0),
	(191,'PT. Kargo Maritim Indonesia','Jl. Kalianget 10-12 Kav. A 10','Surabaya','0813 5754 8202','','','','','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(192,'PT. LINTAS UTAMA NUSANTARA','Pondok Golf Asri Blok E4 No.10 Sumampir Cileg','Banten','Ibu Dian','','0813 1501 8118','','','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(193,'PT. TIGA SAMUDERA LOGISTIK','','JAKARTA','Bapak Eko','','0821 2237 1788','','','Airlangga',3,'1.490.004.238.756',0),
	(194,'PT. JDX LOGISTIK','Central Cakung Bizpark Blok M 19 Jl. Cakung C','JAKARTA - 14140','Ibu Icu','Telp :','0813 8091 9445 / 021-22418123','','','Airlangga',3,'1.490.004.238.756',0),
	(195,'PT. SAHIH ARTA LOGISTIK','Darmo Permai Utara No.28 Kel. Pradah Kali Ken','Surabaya','','','081234467959','','','PT. PERDANA SEMESTA PERKASA',3,'1.490.005.758.885',0),
	(196,'PT. Karya Mulia Logistic','Jl. R.E Martadinata No.8 Blok B1-4, C3-4','Jakarta Utara','Bapak Suandi Haris','','021-6916313, 6908813,','0852 1112 6067','','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(197,'PT. Agung Raya','Jl. Bangka No.1 Gate 8,  Pelabuhan Tanjung Pr','Jakarta Utara - 14310','Bapak Efendi Munthe','','021 - 4307777 ext.139 / 0812 4352 3311','','efendi@agungfreight.co.id, pendi.munthe07@gmail.com, pendi.munthe@yahoo.com','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(198,'PT. Danke Logistik Indonesia','','Surabaya','','','','','','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(199,'PT. Armada Berjaya Trans','Puri Mutiara Blok A No.70 Jl. Griya Utama Sun','Jakarta Utara - 14350','Ibu Maya','','021 - 65310676','','','PT. PERDANA SEMESTA PERKASA',4,'751 441 88',0),
	(200,'Test','test','tsest','tste','niasdasndin','sdaomsdo','odsaodkasod','okasodkaosd','PT. Test',3,'780-0909-00109',0);

/*!40000 ALTER TABLE `m_shipper` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table m_truck
# ------------------------------------------------------------

DROP TABLE IF EXISTS `m_truck`;

CREATE TABLE `m_truck` (
  `idm_truck` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `truck_code` varchar(45) DEFAULT NULL,
  `plate_number` varchar(45) DEFAULT NULL,
  `soft_delete` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idm_truck`),
  UNIQUE KEY `plate_number_UNIQUE` (`plate_number`),
  UNIQUE KEY `truck_code_UNIQUE` (`truck_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `m_truck` WRITE;
/*!40000 ALTER TABLE `m_truck` DISABLE KEYS */;

INSERT INTO `m_truck` (`idm_truck`, `truck_code`, `plate_number`, `soft_delete`)
VALUES
	(1,'CDD-1','KT 8741 LT',0),
	(2,'LONGBED-1','KT 8503 KU',0),
	(3,'LONGBED-2','KT 8595 LT',0),
	(4,'LONGBED-3','KT 8623 AN',0),
	(5,'LONGBED-4','KT 8870 AN',0),
	(6,'LONGBED-5','KT 9458 AK',0),
	(7,'LONGBED-6','L 9877 UA',0),
	(8,'TRAILER-1','B 9315 SEH',0),
	(9,'TRAILER-2','B 9417 UEJ',0),
	(10,'TRAILER-3','DA 1568 TP',0),
	(11,'TRAILER-4','KT 8314 LK',0),
	(12,'TRAILER-5','KT 8430 KU',0),
	(13,'TRAILER-6','KT 8459 KU',0),
	(14,'TRAILER-7','KT 8500 KU',0),
	(15,'TRAILER-8','KT 8647 KU',0),
	(16,'TRAILER-9','KT 8804 KU',0),
	(17,'TRAILER-10','KT 8951 LK',0),
	(18,'TRAILER-11','KT 9072 LD',0),
	(19,'TRAILER-12','L 8804 KU',0),
	(20,'TRONTON-1','KT 8230 LB',0),
	(21,'TRONTON-2','KT 8396 KU',0),
	(22,'TRONTON-3','KT 8399 KU',0),
	(23,'TRONTON-4','KT 8741 LK',0),
	(24,'TRONTON-5','KT 8745 LD',0),
	(25,'TRONTON-6','KT 8763 LK',0),
	(26,'TRONTON-7','KT 8782 LD',0),
	(27,'TRONTON-8','KT 8939 AM',0),
	(28,'TRONTON-9','KT 8941 KU',0),
	(29,'TRONTON-10','KT 8942 KU',0),
	(30,'TRONTON-11','KT 9145 LD',0),
	(31,'TRONTON-12','KT 9815 AK',0),
	(32,'TRONTON-13','L 9653 UC',0);

/*!40000 ALTER TABLE `m_truck` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table main_cost
# ------------------------------------------------------------

DROP TABLE IF EXISTS `main_cost`;

CREATE TABLE `main_cost` (
  `id_cost` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_doc` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `do_cost` varchar(100) NOT NULL DEFAULT '0',
  `clean_seal_cost` varchar(100) NOT NULL DEFAULT '0',
  `soft_delete` int(2) NOT NULL DEFAULT '0',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user` varchar(225) DEFAULT NULL,
  `update_timestamp` datetime DEFAULT NULL,
  `update_user` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`id_cost`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table oth_vch_cost
# ------------------------------------------------------------

DROP TABLE IF EXISTS `oth_vch_cost`;

CREATE TABLE `oth_vch_cost` (
  `id_vch_cost` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_doc` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `cost` varchar(45) DEFAULT NULL,
  `pic` varchar(45) DEFAULT NULL,
  `invoice` varchar(45) DEFAULT NULL,
  `soft_delete` int(2) NOT NULL DEFAULT '0',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user` varchar(225) DEFAULT NULL,
  `update_timestamp` datetime DEFAULT NULL,
  `update_user` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`id_vch_cost`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table other_cost
# ------------------------------------------------------------

DROP TABLE IF EXISTS `other_cost`;

CREATE TABLE `other_cost` (
  `id_other_cost` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_doc` int(11) NOT NULL,
  `type_cost` enum('THC','PORT_PASS','STRIPPING','STORAGE','OTHER') DEFAULT NULL,
  `date` date DEFAULT NULL,
  `cost` int(11) DEFAULT NULL,
  `invoice_num` varchar(45) DEFAULT NULL,
  `pic` varchar(45) DEFAULT NULL,
  `soft_delete` int(2) NOT NULL DEFAULT '0',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user` varchar(225) DEFAULT NULL,
  `update_timestamp` datetime DEFAULT NULL,
  `update_user` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`id_other_cost`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table payment
# ------------------------------------------------------------

DROP TABLE IF EXISTS `payment`;

CREATE TABLE `payment` (
  `id_payment` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `invoice_num` varchar(45) NOT NULL,
  `payment_date` date DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `nominal` int(11) DEFAULT NULL,
  `cost_variance` int(11) DEFAULT NULL,
  `soft_delete` int(2) NOT NULL DEFAULT '0',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user` varchar(225) DEFAULT NULL,
  `update_timestamp` datetime DEFAULT NULL,
  `update_user` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`id_payment`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table ship_doc
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ship_doc`;

CREATE TABLE `ship_doc` (
  `id_ship_doc` int(11) NOT NULL AUTO_INCREMENT,
  `id_doc` int(11) NOT NULL,
  `jenis_doc` int(11) NOT NULL,
  `no_doc` varchar(45) DEFAULT NULL,
  `date_doc` date DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `soft_delete` int(11) NOT NULL DEFAULT '0',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user` varchar(225) DEFAULT NULL,
  `update_timestamp` datetime DEFAULT NULL,
  `update_user` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`id_ship_doc`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `ship_doc` WRITE;
/*!40000 ALTER TABLE `ship_doc` DISABLE KEYS */;

INSERT INTO `ship_doc` (`id_ship_doc`, `id_doc`, `jenis_doc`, `no_doc`, `date_doc`, `file`, `soft_delete`, `timestamp`, `user`, `update_timestamp`, `update_user`)
VALUES
	(1,1,2,'89','2019-11-18',NULL,0,'2019-11-19 19:16:17',NULL,NULL,NULL),
	(2,1,2,'8998','2019-11-18',NULL,0,'2019-11-19 19:16:27',NULL,NULL,NULL),
	(3,1,2,'8998','2019-11-18',NULL,0,'2019-11-19 19:16:43',NULL,NULL,NULL),
	(4,1,2,'8998','2019-11-18',NULL,0,'2019-11-19 19:16:57',NULL,NULL,NULL);

/*!40000 ALTER TABLE `ship_doc` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table shipment_doc
# ------------------------------------------------------------

DROP TABLE IF EXISTS `shipment_doc`;

CREATE TABLE `shipment_doc` (
  `id_doc` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `bl_number` varchar(255) DEFAULT NULL,
  `do_expire_date` date DEFAULT NULL,
  `seal_number` varchar(45) DEFAULT NULL,
  `size` enum('40','20','N') DEFAULT NULL,
  `process_date` date DEFAULT NULL,
  `company` enum('CMPY-1','CMPY-2') DEFAULT NULL,
  `id_agent` int(11) DEFAULT NULL,
  `origin_city` int(11) DEFAULT NULL,
  `id_shipper` int(11) DEFAULT NULL,
  `id_receiver` int(11) DEFAULT NULL,
  `ship_name` varchar(255) DEFAULT NULL,
  `io` enum('I','O') DEFAULT NULL,
  `condition` enum('FULL','CURAH') DEFAULT NULL,
  `product` varchar(45) DEFAULT NULL,
  `stuffing` enum('yes','no') DEFAULT NULL,
  `departure_date` date DEFAULT NULL,
  `arrival_date` date DEFAULT NULL,
  `unload_load_date` date DEFAULT NULL,
  `weight` varchar(45) DEFAULT NULL,
  `locked` int(2) NOT NULL DEFAULT '0',
  `done` int(2) NOT NULL DEFAULT '0',
  `soft_delete` int(2) NOT NULL DEFAULT '0',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user` varchar(225) DEFAULT NULL,
  `update_timestamp` datetime DEFAULT NULL,
  `update_user` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`id_doc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `shipment_doc` WRITE;
/*!40000 ALTER TABLE `shipment_doc` DISABLE KEYS */;

INSERT INTO `shipment_doc` (`id_doc`, `bl_number`, `do_expire_date`, `seal_number`, `size`, `process_date`, `company`, `id_agent`, `origin_city`, `id_shipper`, `id_receiver`, `ship_name`, `io`, `condition`, `product`, `stuffing`, `departure_date`, `arrival_date`, `unload_load_date`, `weight`, `locked`, `done`, `soft_delete`, `timestamp`, `user`, `update_timestamp`, `update_user`)
VALUES
	(1,NULL,NULL,'TAKU 882/15','20','0000-00-00','',0,0,0,0,'','I','FULL','','yes','0000-00-00','0000-00-00','0000-00-00','',1,0,0,'2019-11-19 17:25:00',NULL,NULL,NULL),
	(2,'032/MMU1/SBY/BPN/19/2019','2019-11-07','mrty213','20','2019-10-09','CMPY-1',3,1,2,1,'spil caya','I','FULL','COLA','yes','2019-11-26','2019-10-08','2019-10-14','20',0,0,0,'2019-11-30 15:30:31',NULL,NULL,NULL);

/*!40000 ALTER TABLE `shipment_doc` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ss_labor_cost
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ss_labor_cost`;

CREATE TABLE `ss_labor_cost` (
  `id_labor_cost` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `safeconduct_num` varchar(45) NOT NULL,
  `date` date DEFAULT NULL,
  `cost` int(11) DEFAULT NULL,
  `PIC` varchar(45) DEFAULT NULL,
  `soft_delete` int(2) NOT NULL DEFAULT '0',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user` varchar(225) DEFAULT NULL,
  `update_timestamp` datetime DEFAULT NULL,
  `update_user` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`id_labor_cost`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table table_menu
# ------------------------------------------------------------

DROP TABLE IF EXISTS `table_menu`;

CREATE TABLE `table_menu` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `title` varchar(128) DEFAULT NULL,
  `icon` varchar(128) DEFAULT NULL,
  `url` varchar(128) DEFAULT NULL,
  `second_uri` varchar(128) DEFAULT NULL,
  `is_active` int(1) NOT NULL DEFAULT '1',
  `soft_delete` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `table_menu` WRITE;
/*!40000 ALTER TABLE `table_menu` DISABLE KEYS */;

INSERT INTO `table_menu` (`id`, `parent_id`, `title`, `icon`, `url`, `second_uri`, `is_active`, `soft_delete`)
VALUES
	(1,0,'Master Data',NULL,'master','master',1,0),
	(2,0,'Dokumen Kapal',NULL,'document','document',1,0),
	(3,0,'History Data',NULL,'history','history',1,0),
	(4,0,'Biaya',NULL,'cost','cost',1,0),
	(5,0,'Report',NULL,'report','report',1,0),
	(6,0,'Administrasi',NULL,'manage','manage',1,0),
	(7,1,'Data Agen',NULL,'master/agent','master',1,0),
	(8,1,'Data Bank',NULL,'master/bank','master',1,0),
	(9,1,'Data Kota',NULL,'master/city','master',1,0),
	(10,1,'Data Supir',NULL,'master/driver','master',1,0),
	(11,1,'Data Penerima',NULL,'master/receiver','master',1,0),
	(12,1,'Data Daftar Gaji',NULL,'master/route','master',1,0),
	(13,1,'Data Pengirim',NULL,'master/shipper','master',1,0),
	(14,1,'Data Truk',NULL,'master/truck','master',1,0),
	(15,1,'Data Jenis Dokumen',NULL,'master/document','master',1,0),
	(16,2,'Dokumen Kapal',NULL,'document/shipment_doc','document',1,0),
	(17,2,'Doring',NULL,'document/doring','document',1,0),
	(18,3,'History Dokumen Kapal',NULL,'history/shipment_doc','history',1,0),
	(19,3,'History Doring',NULL,'history/doring','history',1,0),
	(20,4,'Biaya Dokumen',NULL,'cost/main','cost',1,0),
	(21,5,'Laporan Gaji Driver',NULL,'report/gaji_driver','report',1,0),
	(22,6,'Administrasi User',NULL,'manage/admin','manage',1,0),
	(23,6,'Manajemen Menu',NULL,'manage/menu','manage',1,0),
	(24,0,'Test',NULL,'cek','cek',1,1),
	(25,6,'Manajemen Akses',NULL,'manage/role','manage',1,0);

/*!40000 ALTER TABLE `table_menu` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(128) NOT NULL DEFAULT '',
  `email` varchar(128) DEFAULT NULL,
  `name` varchar(128) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `is_active` int(1) DEFAULT '1',
  `date_created` int(11) DEFAULT NULL,
  `created_by` varchar(128) DEFAULT NULL,
  `date_updated` int(11) DEFAULT NULL,
  `updated_by` varchar(128) DEFAULT NULL,
  `soft_delete` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;

INSERT INTO `user` (`id`, `user_id`, `email`, `name`, `image`, `password`, `role_id`, `is_active`, `date_created`, `created_by`, `date_updated`, `updated_by`, `soft_delete`)
VALUES
	(1,'admin','kwanterpepen@gmail.com','Administrator',NULL,'$2y$10$3hcC0CALooPfutAni0lzS.VDLHXb87Yk1tAlH/LN4YNwZABkSyue6',1,1,1575617499,NULL,NULL,NULL,0),
	(2,'fendy','fendy24kwan@gmail.com','Fendy',NULL,'$2y$10$KCjAgcIc2/BSAMy3DXlAYOtEAKoTb2MEQZrKoAiSWlKLExvVTloca',2,1,1575617520,NULL,NULL,NULL,0),
	(3,'keuangan','keuangan@gmail.com','Keuangan',NULL,'$2y$10$yB.fmCdIW8EVMpXK2B0/quV1UpFR7T5fYZbCLkkVrY.ZxCdZotC7m',3,1,1575617543,NULL,NULL,NULL,0),
	(4,'kasir','kasir@gmail.com','Kasir',NULL,'$2y$10$RumywZUnwQr2sj6A9shX/uEW60JgGMltOoTlIBXq10ehKd/baeAJK',4,1,1575617569,NULL,NULL,NULL,0),
	(5,'operasi','operasi@gmail.com','Operasi',NULL,'$2y$10$EVZBzQt3jt2YW4EXHaXcz.e872GlBD3K7SEA/Hzu79Ws6FVZMbjg.',5,1,1575617603,NULL,NULL,NULL,0);

/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user_access_menu
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_access_menu`;

CREATE TABLE `user_access_menu` (
  `role_id` int(11) DEFAULT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `soft_delete` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `user_access_menu` WRITE;
/*!40000 ALTER TABLE `user_access_menu` DISABLE KEYS */;

INSERT INTO `user_access_menu` (`role_id`, `menu_id`, `soft_delete`)
VALUES
	(5,5,0),
	(5,3,0),
	(5,2,0),
	(5,16,0),
	(5,17,0),
	(5,19,0),
	(5,18,0),
	(5,21,0),
	(4,5,0),
	(4,4,0),
	(4,20,0),
	(4,21,0),
	(1,1,0),
	(1,6,0),
	(1,5,0),
	(1,4,0),
	(1,3,0),
	(1,2,0),
	(1,15,0),
	(1,14,0),
	(1,13,0),
	(1,12,0),
	(1,11,0),
	(1,10,0),
	(1,9,0),
	(1,8,0),
	(1,7,0),
	(1,16,0),
	(1,17,0),
	(1,19,0),
	(1,18,0),
	(1,20,0),
	(1,21,0),
	(1,22,0),
	(1,23,0),
	(1,25,0),
	(3,5,0),
	(3,4,0),
	(3,20,0),
	(3,21,0);

/*!40000 ALTER TABLE `user_access_menu` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user_login_log
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_login_log`;

CREATE TABLE `user_login_log` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(128) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `login_time` int(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `user_login_log` WRITE;
/*!40000 ALTER TABLE `user_login_log` DISABLE KEYS */;

INSERT INTO `user_login_log` (`id`, `username`, `email`, `login_time`)
VALUES
	(1,'kasir','kasir@gmail.com',1578626960),
	(2,'keuangan','keuangan@gmail.com',1578628658),
	(3,'admin','kwanterpepen@gmail.com',1578628695),
	(4,'kasir','kasir@gmail.com',1578628986),
	(5,'admin','kwanterpepen@gmail.com',1578727354);

/*!40000 ALTER TABLE `user_login_log` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user_role
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_role`;

CREATE TABLE `user_role` (
  `id_role` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `role` varchar(128) DEFAULT NULL,
  `name` varchar(128) DEFAULT NULL,
  `soft_delete` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `user_role` WRITE;
/*!40000 ALTER TABLE `user_role` DISABLE KEYS */;

INSERT INTO `user_role` (`id_role`, `role`, `name`, `soft_delete`)
VALUES
	(1,'administrator','Administrator',0),
	(2,'poweruser','Power User',0),
	(3,'keuangan','Keuangan',0),
	(4,'kasir','Kasir',0),
	(5,'operasi','Operasi',0),
	(6,'test','Test',1);

/*!40000 ALTER TABLE `user_role` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table vw_doring
# ------------------------------------------------------------

DROP VIEW IF EXISTS `vw_doring`;

CREATE TABLE `vw_doring` (
   `id_doring` INT(11) UNSIGNED NOT NULL DEFAULT '0',
   `id_doc` INT(11) UNSIGNED NULL DEFAULT '0',
   `seal_number` VARCHAR(45) NULL DEFAULT NULL,
   `size` ENUM('40','20','N') NULL DEFAULT NULL,
   `safeconduct_num` VARCHAR(45) NOT NULL,
   `id_route` INT(11) UNSIGNED NULL DEFAULT '0',
   `route_name` VARCHAR(45) NULL DEFAULT '',
   `fare` INT(100) NOT NULL DEFAULT '0',
   `dk_lk` ENUM('DK','LK') NULL DEFAULT NULL,
   `on_chassis` DATE NULL DEFAULT NULL,
   `unload_date` DATE NULL DEFAULT NULL,
   `id_truck` INT(11) UNSIGNED NULL DEFAULT '0',
   `plate_number` VARCHAR(45) NULL DEFAULT NULL,
   `id_driver` INT(11) UNSIGNED NULL DEFAULT '0',
   `driver_name` VARCHAR(45) NULL DEFAULT NULL,
   `done` INT(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM;



# Dump of table vw_menu
# ------------------------------------------------------------

DROP VIEW IF EXISTS `vw_menu`;

CREATE TABLE `vw_menu` (
   `id` INT(11) UNSIGNED NOT NULL DEFAULT '0',
   `parent_id` INT(11) NOT NULL DEFAULT '0',
   `title` VARCHAR(128) NULL DEFAULT NULL,
   `url` VARCHAR(128) NULL DEFAULT NULL,
   `second_uri` VARCHAR(128) NULL DEFAULT NULL,
   `parent_menu` VARCHAR(128) NULL DEFAULT NULL,
   `is_active` INT(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM;



# Dump of table vw_menu_access
# ------------------------------------------------------------

DROP VIEW IF EXISTS `vw_menu_access`;

CREATE TABLE `vw_menu_access` (
   `id_role` INT(11) UNSIGNED NOT NULL DEFAULT '0',
   `name` VARCHAR(128) NULL DEFAULT NULL,
   `menu_id` INT(11) UNSIGNED NULL DEFAULT '0',
   `title` VARCHAR(128) NULL DEFAULT NULL
) ENGINE=MyISAM;



# Dump of table vw_receiver
# ------------------------------------------------------------

DROP VIEW IF EXISTS `vw_receiver`;

CREATE TABLE `vw_receiver` (
   `idm_receiver` INT(11) UNSIGNED NOT NULL DEFAULT '0',
   `receiver_name` VARCHAR(45) NULL DEFAULT NULL,
   `address` VARCHAR(45) NULL DEFAULT NULL,
   `city` VARCHAR(45) NULL DEFAULT NULL,
   `telp` VARCHAR(45) NULL DEFAULT NULL,
   `hp` VARCHAR(45) NULL DEFAULT NULL,
   `fax` VARCHAR(45) NULL DEFAULT NULL,
   `corporate_name` VARCHAR(45) NULL DEFAULT NULL,
   `bank_name` VARCHAR(45) NULL DEFAULT NULL,
   `account_number` VARCHAR(45) NULL DEFAULT NULL
) ENGINE=MyISAM;



# Dump of table vw_route
# ------------------------------------------------------------

DROP VIEW IF EXISTS `vw_route`;

CREATE TABLE `vw_route` (
   `idm_route` INT(11) UNSIGNED NOT NULL DEFAULT '0',
   `route_name` VARCHAR(45) NULL DEFAULT '',
   `origin` VARCHAR(45) NULL DEFAULT NULL,
   `destination` VARCHAR(45) NULL DEFAULT NULL,
   `type` ENUM('TRAILER','TRONTON','LB','CD') NULL DEFAULT NULL,
   `size` ENUM('20','40','N') NULL DEFAULT NULL,
   `fare` INT(11) NULL DEFAULT NULL
) ENGINE=MyISAM;



# Dump of table vw_ship_doc
# ------------------------------------------------------------

DROP VIEW IF EXISTS `vw_ship_doc`;

CREATE TABLE `vw_ship_doc` (
   `id_ship_doc` INT(11) NOT NULL DEFAULT '0',
   `id_doc` INT(11) UNSIGNED NULL DEFAULT '0',
   `jenis_doc` VARCHAR(45) NULL DEFAULT NULL,
   `no_doc` VARCHAR(45) NULL DEFAULT NULL,
   `date_doc` DATE NULL DEFAULT NULL,
   `file` VARCHAR(255) NULL DEFAULT NULL
) ENGINE=MyISAM;



# Dump of table vw_shipment_doc
# ------------------------------------------------------------

DROP VIEW IF EXISTS `vw_shipment_doc`;

CREATE TABLE `vw_shipment_doc` (
   `id_doc` INT(11) UNSIGNED NOT NULL DEFAULT '0',
   `bl_number` VARCHAR(255) NULL DEFAULT NULL,
   `do_expire_date` DATE NULL DEFAULT NULL,
   `seal_number` VARCHAR(45) NULL DEFAULT NULL,
   `size` ENUM('40','20','N') NULL DEFAULT NULL,
   `process_date` DATE NULL DEFAULT NULL,
   `idm_company` VARCHAR(20) NULL DEFAULT NULL,
   `company` VARCHAR(255) NULL DEFAULT NULL,
   `idm_agent` INT(11) UNSIGNED NULL DEFAULT '0',
   `agent` VARCHAR(100) NULL DEFAULT NULL,
   `idm_city` INT(11) UNSIGNED NULL DEFAULT '0',
   `origin_city` VARCHAR(45) NULL DEFAULT NULL,
   `idm_shipper` INT(11) UNSIGNED NULL DEFAULT '0',
   `shipper` VARCHAR(45) NULL DEFAULT NULL,
   `idm_receiver` INT(11) UNSIGNED NULL DEFAULT '0',
   `receiver` VARCHAR(45) NULL DEFAULT NULL,
   `io` ENUM('I','O') NULL DEFAULT NULL,
   `kondisi` ENUM('FULL','CURAH') NULL DEFAULT NULL,
   `product` VARCHAR(45) NULL DEFAULT NULL,
   `stuffing` ENUM('yes','no') NULL DEFAULT NULL,
   `arrival_date` DATE NULL DEFAULT NULL,
   `departure_date` DATE NULL DEFAULT NULL,
   `unload_load_date` DATE NULL DEFAULT NULL,
   `weight` VARCHAR(45) NULL DEFAULT NULL,
   `ship_name` VARCHAR(255) NULL DEFAULT NULL,
   `done` INT(2) NOT NULL DEFAULT '0',
   `locked` INT(2) NOT NULL DEFAULT '0'
) ENGINE=MyISAM;



# Dump of table vw_shipper
# ------------------------------------------------------------

DROP VIEW IF EXISTS `vw_shipper`;

CREATE TABLE `vw_shipper` (
   `idm_shipper` INT(11) UNSIGNED NOT NULL DEFAULT '0',
   `debitur_name` VARCHAR(45) NULL DEFAULT NULL,
   `address` VARCHAR(45) NULL DEFAULT NULL,
   `city` VARCHAR(45) NULL DEFAULT NULL,
   `pic` VARCHAR(45) NULL DEFAULT NULL,
   `finance` VARCHAR(45) NULL DEFAULT NULL,
   `telp` VARCHAR(225) NULL DEFAULT NULL,
   `hp` VARCHAR(225) NULL DEFAULT NULL,
   `fax` VARCHAR(225) NULL DEFAULT NULL,
   `corporate_name` VARCHAR(225) NULL DEFAULT NULL,
   `bank_name` VARCHAR(45) NULL DEFAULT NULL,
   `account_number` VARCHAR(225) NULL DEFAULT NULL
) ENGINE=MyISAM;



# Dump of table vw_sub_menu
# ------------------------------------------------------------

DROP VIEW IF EXISTS `vw_sub_menu`;

CREATE TABLE `vw_sub_menu` (
   `id` INT(11) UNSIGNED NOT NULL DEFAULT '0',
   `parent_id` INT(11) NOT NULL DEFAULT '0',
   `title` VARCHAR(128) NULL DEFAULT NULL
) ENGINE=MyISAM;



# Dump of table vw_user
# ------------------------------------------------------------

DROP VIEW IF EXISTS `vw_user`;

CREATE TABLE `vw_user` (
   `id` INT(11) UNSIGNED NOT NULL DEFAULT '0',
   `user_id` VARCHAR(128) NOT NULL DEFAULT '',
   `name` VARCHAR(128) NULL DEFAULT NULL,
   `email` VARCHAR(128) NULL DEFAULT NULL,
   `image` VARCHAR(255) NULL DEFAULT NULL,
   `password` VARCHAR(256) NULL DEFAULT NULL,
   `role_id` INT(11) NULL DEFAULT NULL,
   `role` VARCHAR(128) NULL DEFAULT NULL,
   `role_name` VARCHAR(128) NULL DEFAULT NULL,
   `date_created` INT(11) NULL DEFAULT NULL,
   `created_by` VARCHAR(128) NULL DEFAULT NULL,
   `date_updated` INT(11) NULL DEFAULT NULL,
   `updated_by` VARCHAR(128) NULL DEFAULT NULL
) ENGINE=MyISAM;



# Dump of table vw_user_access_menu
# ------------------------------------------------------------

DROP VIEW IF EXISTS `vw_user_access_menu`;

CREATE TABLE `vw_user_access_menu` (
   `role_id` INT(11) UNSIGNED NULL DEFAULT '0',
   `role` VARCHAR(128) NULL DEFAULT NULL,
   `role_name` VARCHAR(128) NULL DEFAULT NULL,
   `menu_id` INT(11) UNSIGNED NULL DEFAULT '0',
   `parent_id` INT(11) NULL DEFAULT '0',
   `title` VARCHAR(128) NULL DEFAULT NULL,
   `icon` VARCHAR(128) NULL DEFAULT NULL,
   `url` VARCHAR(128) NULL DEFAULT NULL,
   `second_uri` VARCHAR(128) NULL DEFAULT NULL,
   `is_active` INT(1) NULL DEFAULT '1'
) ENGINE=MyISAM;





# Replace placeholder table for vw_menu with correct view syntax
# ------------------------------------------------------------

DROP TABLE `vw_menu`;

CREATE ALGORITHM=UNDEFINED DEFINER=`fendy`@`%` SQL SECURITY DEFINER VIEW `vw_menu`
AS SELECT
   `tm`.`id` AS `id`,
   `tm`.`parent_id` AS `parent_id`,
   `tm`.`title` AS `title`,
   `tm`.`url` AS `url`,
   `tm`.`second_uri` AS `second_uri`,
   `tm2`.`title` AS `parent_menu`,
   `tm`.`is_active` AS `is_active`
FROM (`table_menu` `tm` left join `vw_sub_menu` `tm2` on((`tm2`.`id` = `tm`.`parent_id`))) where (`tm`.`soft_delete` = '0');


# Replace placeholder table for vw_menu_access with correct view syntax
# ------------------------------------------------------------

DROP TABLE `vw_menu_access`;

CREATE ALGORITHM=UNDEFINED DEFINER=`fendy`@`%` SQL SECURITY DEFINER VIEW `vw_menu_access`
AS SELECT
   `user_role`.`id_role` AS `id_role`,
   `user_role`.`name` AS `name`,
   `table_menu`.`id` AS `menu_id`,
   `table_menu`.`title` AS `title`
FROM ((`user_role` left join `user_access_menu` on((`user_role`.`id_role` = `user_access_menu`.`role_id`))) left join `table_menu` on((`user_access_menu`.`menu_id` = `table_menu`.`id`)));


# Replace placeholder table for vw_shipper with correct view syntax
# ------------------------------------------------------------

DROP TABLE `vw_shipper`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_shipper`
AS SELECT
   `m_shipper`.`idm_shipper` AS `idm_shipper`,
   `m_shipper`.`debitur_name` AS `debitur_name`,
   `m_shipper`.`address` AS `address`,
   `m_shipper`.`city` AS `city`,
   `m_shipper`.`pic` AS `pic`,
   `m_shipper`.`finance` AS `finance`,
   `m_shipper`.`telp` AS `telp`,
   `m_shipper`.`hp` AS `hp`,
   `m_shipper`.`fax` AS `fax`,
   `m_shipper`.`corporate_name` AS `corporate_name`,
   `m_bank`.`bank_name` AS `bank_name`,
   `m_shipper`.`account_number` AS `account_number`
FROM (`m_shipper` left join `m_bank` on((`m_shipper`.`id_bank` = `m_bank`.`idm_bank`))) where (`m_shipper`.`soft_delete` = '0');


# Replace placeholder table for vw_receiver with correct view syntax
# ------------------------------------------------------------

DROP TABLE `vw_receiver`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_receiver`
AS SELECT
   `m_receiver`.`idm_receiver` AS `idm_receiver`,
   `m_receiver`.`receiver_name` AS `receiver_name`,
   `m_receiver`.`address` AS `address`,
   `m_receiver`.`city` AS `city`,
   `m_receiver`.`telp` AS `telp`,
   `m_receiver`.`hp` AS `hp`,
   `m_receiver`.`fax` AS `fax`,
   `m_receiver`.`corporate_name` AS `corporate_name`,
   `m_bank`.`bank_name` AS `bank_name`,
   `m_receiver`.`account_number` AS `account_number`
FROM (`m_receiver` left join `m_bank` on((`m_receiver`.`id_bank` = `m_bank`.`idm_bank`))) where (`m_receiver`.`soft_delete` = '0');


# Replace placeholder table for vw_user with correct view syntax
# ------------------------------------------------------------

DROP TABLE `vw_user`;

CREATE ALGORITHM=UNDEFINED DEFINER=`fendy`@`%` SQL SECURITY DEFINER VIEW `vw_user`
AS SELECT
   `user`.`id` AS `id`,
   `user`.`user_id` AS `user_id`,
   `user`.`name` AS `name`,
   `user`.`email` AS `email`,
   `user`.`image` AS `image`,
   `user`.`password` AS `password`,
   `user`.`role_id` AS `role_id`,
   `user_role`.`role` AS `role`,
   `user_role`.`name` AS `role_name`,
   `user`.`date_created` AS `date_created`,
   `user`.`created_by` AS `created_by`,
   `user`.`date_updated` AS `date_updated`,
   `user`.`updated_by` AS `updated_by`
FROM (`user` join `user_role` on((`user_role`.`id_role` = `user`.`role_id`))) where (`user`.`soft_delete` = 0);


# Replace placeholder table for vw_shipment_doc with correct view syntax
# ------------------------------------------------------------

DROP TABLE `vw_shipment_doc`;

CREATE ALGORITHM=UNDEFINED DEFINER=`fendy`@`%` SQL SECURITY DEFINER VIEW `vw_shipment_doc`
AS SELECT
   distinct `shipment_doc`.`id_doc` AS `id_doc`,
   `shipment_doc`.`bl_number` AS `bl_number`,
   `shipment_doc`.`do_expire_date` AS `do_expire_date`,
   `shipment_doc`.`seal_number` AS `seal_number`,
   `shipment_doc`.`size` AS `size`,
   `shipment_doc`.`process_date` AS `process_date`,
   `m_option`.`subID` AS `idm_company`,
   `m_option`.`value` AS `company`,
   `m_agent`.`idm_agent` AS `idm_agent`,
   `m_agent`.`agent_name` AS `agent`,
   `m_city`.`idm_city` AS `idm_city`,
   `m_city`.`city_name` AS `origin_city`,
   `m_shipper`.`idm_shipper` AS `idm_shipper`,
   `m_shipper`.`debitur_name` AS `shipper`,
   `m_receiver`.`idm_receiver` AS `idm_receiver`,
   `m_receiver`.`receiver_name` AS `receiver`,
   `shipment_doc`.`io` AS `io`,
   `shipment_doc`.`condition` AS `kondisi`,
   `shipment_doc`.`product` AS `product`,
   `shipment_doc`.`stuffing` AS `stuffing`,
   `shipment_doc`.`arrival_date` AS `arrival_date`,
   `shipment_doc`.`departure_date` AS `departure_date`,
   `shipment_doc`.`unload_load_date` AS `unload_load_date`,
   `shipment_doc`.`weight` AS `weight`,
   `shipment_doc`.`ship_name` AS `ship_name`,
   `shipment_doc`.`done` AS `done`,
   `shipment_doc`.`locked` AS `locked`
FROM (((((`shipment_doc` left join `m_option` on((`m_option`.`subID` = `shipment_doc`.`company`))) left join `m_agent` on((`m_agent`.`idm_agent` = `shipment_doc`.`id_agent`))) left join `m_city` on((`m_city`.`idm_city` = `shipment_doc`.`origin_city`))) left join `m_shipper` on((`m_shipper`.`idm_shipper` = `shipment_doc`.`id_shipper`))) left join `m_receiver` on((`m_receiver`.`idm_receiver` = `shipment_doc`.`id_receiver`))) where (`shipment_doc`.`soft_delete` = '0');


# Replace placeholder table for vw_route with correct view syntax
# ------------------------------------------------------------

DROP TABLE `vw_route`;

CREATE ALGORITHM=UNDEFINED DEFINER=`fendy`@`%` SQL SECURITY DEFINER VIEW `vw_route`
AS SELECT
   `m_route`.`idm_route` AS `idm_route`,
   `m_route`.`route_name` AS `route_name`,
   `m_route`.`origin` AS `origin`,
   `m_route`.`destination` AS `destination`,
   `m_route`.`type` AS `type`,
   `m_route`.`size` AS `size`,
   `m_route`.`fare` AS `fare`
FROM `m_route` where (`m_route`.`soft_delete` = 0);


# Replace placeholder table for vw_ship_doc with correct view syntax
# ------------------------------------------------------------

DROP TABLE `vw_ship_doc`;

CREATE ALGORITHM=UNDEFINED DEFINER=`fendy`@`%` SQL SECURITY DEFINER VIEW `vw_ship_doc`
AS SELECT
   `ship_doc`.`id_ship_doc` AS `id_ship_doc`,
   `shipment_doc`.`id_doc` AS `id_doc`,
   `m_document`.`jenis_doc` AS `jenis_doc`,
   `ship_doc`.`no_doc` AS `no_doc`,
   `ship_doc`.`date_doc` AS `date_doc`,
   `ship_doc`.`file` AS `file`
FROM ((`ship_doc` left join `shipment_doc` on((`shipment_doc`.`id_doc` = `ship_doc`.`id_doc`))) left join `m_document` on((`m_document`.`idm_document` = `ship_doc`.`jenis_doc`))) where (`ship_doc`.`soft_delete` = 0);


# Replace placeholder table for vw_doring with correct view syntax
# ------------------------------------------------------------

DROP TABLE `vw_doring`;

CREATE ALGORITHM=UNDEFINED DEFINER=`fendy`@`%` SQL SECURITY DEFINER VIEW `vw_doring`
AS SELECT
   `doring`.`id_doring` AS `id_doring`,
   `shipment_doc`.`id_doc` AS `id_doc`,
   `shipment_doc`.`seal_number` AS `seal_number`,
   `shipment_doc`.`size` AS `size`,
   `doring`.`safeconduct_num` AS `safeconduct_num`,
   `m_route`.`idm_route` AS `id_route`,
   `m_route`.`route_name` AS `route_name`,
   `doring`.`fare` AS `fare`,
   `doring`.`dk_lk` AS `dk_lk`,
   `doring`.`on_chassis` AS `on_chassis`,
   `doring`.`unload_date` AS `unload_date`,
   `m_truck`.`idm_truck` AS `id_truck`,
   `m_truck`.`plate_number` AS `plate_number`,
   `m_driver`.`idm_driver` AS `id_driver`,
   `m_driver`.`driver_name` AS `driver_name`,
   `doring`.`done` AS `done`
FROM ((((`doring` left join `shipment_doc` on((`shipment_doc`.`id_doc` = `doring`.`id_doc`))) left join `m_route` on((`m_route`.`idm_route` = `doring`.`id_route`))) left join `m_truck` on((`m_truck`.`idm_truck` = `doring`.`id_truck`))) left join `m_driver` on((`m_driver`.`idm_driver` = `doring`.`id_driver`))) where (`doring`.`soft_delete` = '0');


# Replace placeholder table for vw_sub_menu with correct view syntax
# ------------------------------------------------------------

DROP TABLE `vw_sub_menu`;

CREATE ALGORITHM=UNDEFINED DEFINER=`fendy`@`%` SQL SECURITY DEFINER VIEW `vw_sub_menu`
AS SELECT
   `table_menu`.`id` AS `id`,
   `table_menu`.`parent_id` AS `parent_id`,
   `table_menu`.`title` AS `title`
FROM `table_menu`;


# Replace placeholder table for vw_user_access_menu with correct view syntax
# ------------------------------------------------------------

DROP TABLE `vw_user_access_menu`;

CREATE ALGORITHM=UNDEFINED DEFINER=`fendy`@`%` SQL SECURITY DEFINER VIEW `vw_user_access_menu`
AS SELECT
   `user_role`.`id_role` AS `role_id`,
   `user_role`.`role` AS `role`,
   `user_role`.`name` AS `role_name`,
   `table_menu`.`id` AS `menu_id`,
   `table_menu`.`parent_id` AS `parent_id`,
   `table_menu`.`title` AS `title`,
   `table_menu`.`icon` AS `icon`,
   `table_menu`.`url` AS `url`,
   `table_menu`.`second_uri` AS `second_uri`,
   `table_menu`.`is_active` AS `is_active`
FROM ((`user_access_menu` left join `table_menu` on((`table_menu`.`id` = `user_access_menu`.`menu_id`))) left join `user_role` on((`user_role`.`id_role` = `user_access_menu`.`role_id`))) where (`table_menu`.`soft_delete` = '0') order by `user_role`.`name`,`table_menu`.`parent_id`;

--
-- Dumping routines (PROCEDURE) for database 'db_myapps'
--
DELIMITER ;;

# Dump of PROCEDURE GetOption
# ------------------------------------------------------------

/*!50003 DROP PROCEDURE IF EXISTS `GetOption` */;;
/*!50003 SET SESSION SQL_MODE="STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION"*/;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`localhost`*/ /*!50003 PROCEDURE `GetOption`(IN id varchar(20))
BEGIN
	select subID,value from m_option where nama_grup = id && soft_delete = '0';
END */;;

/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;;
# Dump of PROCEDURE tabel_gaji_driver
# ------------------------------------------------------------

/*!50003 DROP PROCEDURE IF EXISTS `tabel_gaji_driver` */;;
/*!50003 SET SESSION SQL_MODE=""*/;;
/*!50003 CREATE*/ /*!50020 DEFINER=`fendy`@`%`*/ /*!50003 PROCEDURE `tabel_gaji_driver`()
BEGIN
SET @sql = NULL;
##2
SELECT GROUP_CONCAT(
DISTINCT
CONCAT(
###1
'SUM(IF( MONTH(`doring`.`on_chassis`) = ''',MONTH(`doring`.`on_chassis`) ,''' ,`doring`.`fare`,0)) AS ''',MONTH(`doring`.`on_chassis`) ,'''') ORDER BY `on_chassis`) INTO @sql
FROM doring;
#3
SET @sql = CONCAT('SELECT `m_driver`.`driver_name` AS driver_name, ', @sql, ' FROM doring LEFT JOIN m_driver ON m_driver.`idm_driver` = doring.`id_driver` GROUP BY m_driver.driver_name');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
END */;;

/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;;
# Dump of PROCEDURE table_menu
# ------------------------------------------------------------

/*!50003 DROP PROCEDURE IF EXISTS `table_menu` */;;
/*!50003 SET SESSION SQL_MODE=""*/;;
/*!50003 CREATE*/ /*!50020 DEFINER=`fendy`@`%`*/ /*!50003 PROCEDURE `table_menu`()
BEGIN
SELECT
tm.title AS title,
tm.url AS url,
tm.second_uri AS second_uri,
tm2.title AS parent_menu,
tm.is_active AS is_active
FROM table_menu AS tm
LEFT JOIN (SELECT id, parent_id, title FROM table_menu) AS tm2 ON tm2.id = tm.parent_id
WHERE tm.soft_delete = '0';
END */;;

/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;;
DELIMITER ;

/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

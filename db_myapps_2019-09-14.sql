# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.7.25)
# Database: db_myapps
# Generation Time: 2019-09-14 06:39:24 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table demurage
# ------------------------------------------------------------

DROP TABLE IF EXISTS `demurage`;

CREATE TABLE `demurage` (
  `id_demurage` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `seal_number` varchar(45) NOT NULL,
  `date` date DEFAULT NULL,
  `period` varchar(45) DEFAULT NULL,
  `cost` int(11) DEFAULT NULL,
  `invoice_num` varchar(45) DEFAULT NULL,
  `soft_delete` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_demurage`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table detention
# ------------------------------------------------------------

DROP TABLE IF EXISTS `detention`;

CREATE TABLE `detention` (
  `id_detention` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `seal_number` varchar(45) NOT NULL,
  `date` date DEFAULT NULL,
  `period` varchar(45) DEFAULT NULL,
  `cost` int(11) DEFAULT NULL,
  `invoice_num` varchar(45) DEFAULT NULL,
  `soft_delete` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_detention`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table doring
# ------------------------------------------------------------

DROP TABLE IF EXISTS `doring`;

CREATE TABLE `doring` (
  `id_doring` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_ship_arr` int(11) DEFAULT NULL,
  `safeconduct_num` varchar(45) NOT NULL,
  `id_route` int(11) DEFAULT NULL,
  `dk_lk` enum('DK','LK') DEFAULT NULL,
  `on_chassis` date DEFAULT NULL,
  `unload_date` date DEFAULT NULL,
  `id_truck` int(11) DEFAULT NULL,
  `id_driver` int(11) DEFAULT NULL,
  `soft_delete` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_doring`),
  UNIQUE KEY `safeconduct_num_UNIQUE` (`safeconduct_num`),
  UNIQUE KEY `id_doc_UNIQUE` (`id_ship_arr`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table doring_doc
# ------------------------------------------------------------

DROP TABLE IF EXISTS `doring_doc`;

CREATE TABLE `doring_doc` (
  `id_doring_doc` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_doring` int(11) DEFAULT NULL,
  `cashier` enum('yes','no') DEFAULT NULL,
  `safeconduct` enum('yes','no') DEFAULT NULL,
  `report` enum('yes','no') DEFAULT NULL,
  `check_list` enum('yes','no') DEFAULT NULL,
  `vehicle_inspection` enum('yes','no') DEFAULT NULL,
  `others` enum('yes','no') DEFAULT NULL,
  `shipper` enum('yes','no') DEFAULT NULL,
  `report_num` enum('yes','no') DEFAULT NULL,
  `safeconduct_num` enum('yes','no') DEFAULT NULL,
  `po` enum('yes','no') DEFAULT NULL,
  `do` enum('yes','no') DEFAULT NULL,
  `delivery` enum('yes','no') DEFAULT NULL,
  `pp` enum('yes','no') DEFAULT NULL,
  `receiving` enum('yes','no') DEFAULT NULL,
  `stripping` enum('yes','no') DEFAULT NULL,
  `cancel_loading` enum('yes','no') DEFAULT NULL,
  `soft_delete` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_doring_doc`),
  UNIQUE KEY `id_doc_UNIQUE` (`id_doring`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table escort_cost
# ------------------------------------------------------------

DROP TABLE IF EXISTS `escort_cost`;

CREATE TABLE `escort_cost` (
  `id_escort_cost` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `safeconduct_num` varchar(45) NOT NULL,
  `date` date DEFAULT NULL,
  `cost` int(11) DEFAULT NULL,
  `soft_delete` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_escort_cost`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table etc_cost
# ------------------------------------------------------------

DROP TABLE IF EXISTS `etc_cost`;

CREATE TABLE `etc_cost` (
  `id_etc_cost` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `safeconduct_num` varchar(45) NOT NULL,
  `cost` int(11) DEFAULT NULL,
  `note` varchar(45) DEFAULT NULL,
  `soft_delete` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_etc_cost`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table freight_cost
# ------------------------------------------------------------

DROP TABLE IF EXISTS `freight_cost`;

CREATE TABLE `freight_cost` (
  `id_freight_cost` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `safeconduct_num` varchar(45) NOT NULL,
  `date` date DEFAULT NULL,
  `cost` int(11) DEFAULT NULL,
  `invoice` varchar(45) DEFAULT NULL,
  `soft_delete` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_freight_cost`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table fuel_cost
# ------------------------------------------------------------

DROP TABLE IF EXISTS `fuel_cost`;

CREATE TABLE `fuel_cost` (
  `id_fuel_cost` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `safeconduct_num` varchar(45) NOT NULL,
  `date` date DEFAULT NULL,
  `cost` int(11) DEFAULT NULL,
  `company` varchar(45) DEFAULT NULL,
  `soft_delete` int(2) NOT NULL DEFAULT '0',
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
  PRIMARY KEY (`id_invoice`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table labor_cost
# ------------------------------------------------------------

DROP TABLE IF EXISTS `labor_cost`;

CREATE TABLE `labor_cost` (
  `id_labor_cost` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `safeconduct_num` varchar(45) NOT NULL,
  `date` date DEFAULT NULL,
  `cost` int(11) unsigned DEFAULT NULL,
  `foreman` varchar(45) DEFAULT NULL,
  `soft_delete` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_labor_cost`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table m_agent
# ------------------------------------------------------------

DROP TABLE IF EXISTS `m_agent`;

CREATE TABLE `m_agent` (
  `idm_agent` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `agent_name` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `telp` varchar(45) DEFAULT NULL,
  `hp` varchar(45) DEFAULT NULL,
  `fax` varchar(45) DEFAULT NULL,
  `fee` int(11) unsigned DEFAULT NULL,
  `soft_delete` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idm_agent`),
  UNIQUE KEY `idm_agent_UNIQUE` (`idm_agent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `m_agent` WRITE;
/*!40000 ALTER TABLE `m_agent` DISABLE KEYS */;

INSERT INTO `m_agent` (`idm_agent`, `agent_name`, `address`, `telp`, `hp`, `fax`, `fee`, `soft_delete`)
VALUES
	(1,'voluptatum','22381 Upton Spurs Apt. 966\nNew Terence, GA 66','579-538-5480x3948','09944039840','1-018-355-1329x47287',8,1),
	(2,'sint','511 Pouros Squares Apt. 974\nWest Mikel, CA 60','310-283-2482x845','700-109-8105','+77(9)2585303057',8,0),
	(3,'id','63009 Jocelyn Light\nKautzerchester, AR 67712','1-030-178-2471x71066','(967)350-4873','130-119-7112x528',8,0),
	(4,'fugit','878 Darwin Trafficway\nNorth Kraigburgh, WA 49','1-388-604-4795x56511','05191169467','1-111-431-6158',1,0),
	(5,'voluptatibus','636 Abel RoadLake Kiannafort, DE 16313','(828)604-6642x789','355.127.6026x68976','959.611.4072',3,0),
	(6,'PT. Surya',' ',' ',' ',' ',NULL,0);

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
	(1,'BBCA','Bank BCA',1),
	(2,'BBRI','Bank BRI',0),
	(3,'BMRI','Bank Mandiri',0),
	(4,'BDMN','Bank Danamon',0),
	(5,'CIMB','Bank CIMB Niaga',0),
	(6,'BBNI','Bank BNI',0),
	(7,'BKTM','Bank Kaltimtara',0),
	(8,'BBTN','Bank BTN',0),
	(9,'PMRT','Permata Bank',0);

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
	(11,'MDN','Medan',0);

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
	(1,'','40',1,0),
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
	(1,'Suprapto','1231231231231312','1980-06-14','Balikpapan','Jalan suprapto',0),
	(2,'Fanta','092139998289asdsad','1981-09-18','Samarinda','Jalan 22',0),
	(3,'Fanta','092139998289222','1981-09-18','Samarinda','Jalan 2',0);

/*!40000 ALTER TABLE `m_driver` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table m_option
# ------------------------------------------------------------

DROP TABLE IF EXISTS `m_option`;

CREATE TABLE `m_option` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nama_grup` varchar(20) DEFAULT NULL,
  `subID` varchar(20) DEFAULT NULL,
  `value` varchar(20) DEFAULT NULL,
  `soft_delete` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `m_option` WRITE;
/*!40000 ALTER TABLE `m_option` DISABLE KEYS */;

INSERT INTO `m_option` (`id`, `nama_grup`, `subID`, `value`, `soft_delete`)
VALUES
	(1,'truck','TRAILER','Truck Trailer',0),
	(2,'truck','TRONTON','Truck Tronton',0),
	(3,'truck','LB','LB',0),
	(4,'truck','CD','CD',0),
	(5,'size','40','40 Feet',0),
	(6,'size','20','20 Feet',0),
	(7,'size','N','Kosong',0),
	(8,'company','CMPY-1','Perusahaan 1',0),
	(9,'company','CMPY-2','Perusahaan 2',0);

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
	(1,'nihil','4759 Rusty Estates\nNorth Mortimermouth, IN 05','Nyahaven','520-932-8260x38983','(035)108-9411','+01(2)2773485883','exercitationem',1,'9331973',0),
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
	(50,'non','27409 Fahey Road\nCorwinmouth, NJ 11262-0744','East Halle','+81(6)5706021776','+06(7)2885256605','275-191-2398','reprehenderit',5,'744',0);

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
	(1,'SMD-SBY','2','4','LB','N',200000,0);

/*!40000 ALTER TABLE `m_route` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table m_ship
# ------------------------------------------------------------

DROP TABLE IF EXISTS `m_ship`;

CREATE TABLE `m_ship` (
  `idm_ship` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ship_name` varchar(45) DEFAULT NULL,
  `agent_code` int(10) unsigned NOT NULL,
  `soft_delete` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idm_ship`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `m_ship` WRITE;
/*!40000 ALTER TABLE `m_ship` DISABLE KEYS */;

INSERT INTO `m_ship` (`idm_ship`, `ship_name`, `agent_code`, `soft_delete`)
VALUES
	(1,'dolores',1,0),
	(2,'est',2,0),
	(3,'nulla',3,0),
	(4,'porro',4,0),
	(5,'quia',5,0),
	(6,'perferendis',1,0),
	(7,'non',2,0),
	(8,'fugit',3,0),
	(9,'sed',4,0),
	(10,'et',5,0);

/*!40000 ALTER TABLE `m_ship` ENABLE KEYS */;
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
  `telp` varchar(45) DEFAULT NULL,
  `hp` varchar(45) DEFAULT NULL,
  `fax` varchar(45) DEFAULT NULL,
  `corporate_name` varchar(45) DEFAULT NULL,
  `id_bank` int(11) DEFAULT NULL,
  `account_number` varchar(45) DEFAULT NULL,
  `soft_delete` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idm_shipper`),
  UNIQUE KEY `idm_customer_UNIQUE` (`idm_shipper`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `m_shipper` WRITE;
/*!40000 ALTER TABLE `m_shipper` DISABLE KEYS */;

INSERT INTO `m_shipper` (`idm_shipper`, `debitur_name`, `address`, `city`, `pic`, `finance`, `telp`, `hp`, `fax`, `corporate_name`, `id_bank`, `account_number`, `soft_delete`)
VALUES
	(1,'architecto','00051 Pfannerstill Rest\nNew Tamara, OH 47565-','North Boydland','Thad O\'Conner','Zion Rutherford DDS','447.189.6352x4412','+99(5)6188979176','438-163-7601','non',1,'71307',0),
	(2,'minima','46478 Rolfson Lights\nWest Mozellemouth, RI 21','South Paoloburgh','Mr. Ariel Wolf','Angelica Emard','00319868475','1-138-728-9256','199.604.7990x55949','nihil',2,'9106649',0),
	(3,'qui','7970 Ena Extension Suite 040\nAlberthashire, D','Port Lilliana','Miss Noemi Koch I','Lempi Smitham','+49(5)7661188930','(534)480-7555x7534','1-517-756-3640','aliquam',3,'46207616',0),
	(4,'et','22878 Shanahan Mall\nEast Blaise, NC 04733-859','Baileyport','Mr. Gideon Larson','Tavares Schowalter','(093)827-9841','931-630-2046x8739','970-611-4127x1405','error',4,'134496786',0),
	(5,'ipsum','6201 Joaquin Pass\nShieldshaven, NJ 20184-1276','Port Noemieton','Dr. Oswaldo Heaney','Sasha Rodriguez','095-679-6921','+27(3)5796759082','371-125-4462x4301','unde',5,'900880400',0),
	(6,'corrupti','065 Giovani Plains Apt. 765\nCaitlynbury, AZ 2','East Nona','Mrs. Vergie Adams MD','Dr. Dax Runolfsdottir DDS','+92(4)2382666078','(374)077-1626','348-892-6045','iusto',6,'38',0),
	(7,'ut','649 Skiles Light\nEast Edythville, MI 96847-55','West Alessandroton','Dante Carter','Cedrick Hegmann','1-067-679-8510x1751','219.977.3467','(580)240-1931','dolores',7,'',0),
	(8,'voluptatem','926 Claude Valley Apt. 747\nPort Garnett, MO 9','Davidside','Wilhelmine Luettgen Jr.','Eileen Langosh PhD','337-674-2233x0648','015.454.2631x245','860.232.7577x326','rem',8,'862',0),
	(9,'harum','3352 Wolff Orchard Apt. 355\nWest Otholand, AL','Gerlachfort','Claude Mitchell','Demarco Thompson','457-129-5194x441','611.992.7675','(339)242-3662x5362','at',9,'28',0),
	(10,'sed','758 Reese Manor Suite 103\nCruickshankville, A','Koeppfurt','Viviane Simonis','Prof. Wade Cartwright DDS','(303)757-6636x18407','(654)605-5434','987-442-9432','et',1,'9336437',0),
	(11,'facilis','56065 Gay Causeway\nEast Corenetown, IA 37154','Port Raheemburgh','Prof. Orval Greenfelder Sr.','Agustin Wunsch DDS','01326000368','1-220-806-1449','1-827-795-5893x73838','enim',2,'8',0),
	(12,'voluptatem','287 Darien Vista\nKennedystad, AK 82840','Odessaview','Miss Darby Hayes Jr.','Fannie Leffler','984-189-5668','325.119.0619','531.124.4945','nobis',3,'4',0),
	(13,'et','79870 Myles Flats Apt. 781\nNorth Tressietown,','Padbergland','Demarco Schimmel','Dr. Lea Bosco I','752.087.9365x47098','(686)940-3031x18486','987.648.3003x18371','et',4,'',0),
	(14,'amet','6881 Lucio Extensions Apt. 313\nNorth Kacimout','East Akeem','Amber Langworth','Kamille Lakin','499.101.4263','(479)153-9505x495','380.903.7417','sit',5,'3124268',0),
	(15,'similique','220 Jaunita Burgs Suite 592\nJorgemouth, AR 17','Cruickshankview','Dayana O\'Kon','Lesly Roberts','(418)969-8163x6669','409.650.8416x1589','(767)431-9182x690','aliquam',6,'6829347',0),
	(16,'aperiam','45610 Kuhlman Heights Apt. 106\nFayhaven, UT 5','Emilianoville','Miss Annamarie Cremin','Mrs. Roberta Considine','780-317-0884x7389','007-558-0285','674-476-5239x711','aut',7,'236714',0),
	(17,'inventore','37779 Alexane Forest Suite 693\nWest Rylee, ND','Kobemouth','Jacklyn Kuhlman','Emory Cruickshank','(900)343-8032x88629','08940492837','1-741-386-6178','corrupti',8,'60356602',0),
	(18,'iusto','5033 Purdy Extension\nRachelborough, WI 45501','South Dorris','Tia Beier','Germaine Stehr PhD','03225940557','1-921-936-1018x970','1-865-456-6731','maiores',9,'589340',0),
	(19,'dicta','6524 Ziemann Squares Suite 984\nAdolphusside, ','Coramouth','Miss Dortha Wiza III','Freddie Franecki','859-741-7221x12637','(474)538-5379x191','846-708-4754x0598','aut',1,'5869960',0),
	(20,'eaque','943 Brenna Way\nLake Wyman, IN 40220-8315','Eugenehaven','Camden Gerhold','Prof. Jamaal Wyman','(265)897-5444x842','1-182-929-2506x914','04187043838','ex',2,'71233346',0);

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
	(1,'zqxp','429',0),
	(2,'kqji','43023',0),
	(3,'twke','55974',0),
	(4,'vdzv','84698798',0),
	(5,'crce','479769',0),
	(6,'rwqa','55',0),
	(7,'dqbr','525517400',0),
	(8,'hawc','69437877',0),
	(9,'brsj','7340472',0),
	(10,'ogph','4814',0);

/*!40000 ALTER TABLE `m_truck` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table main_cost
# ------------------------------------------------------------

DROP TABLE IF EXISTS `main_cost`;

CREATE TABLE `main_cost` (
  `id_cost` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `safeconduct_num` varchar(45) NOT NULL,
  `date` date DEFAULT NULL,
  `do_cost` int(11) DEFAULT NULL,
  `clean_seal_cost` int(11) DEFAULT NULL,
  `soft_delete` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_cost`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table oth_vch_cost
# ------------------------------------------------------------

DROP TABLE IF EXISTS `oth_vch_cost`;

CREATE TABLE `oth_vch_cost` (
  `id_vch_cost` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `safeconduct_num` varchar(45) NOT NULL,
  `date` date DEFAULT NULL,
  `cost` varchar(45) DEFAULT NULL,
  `pic` varchar(45) DEFAULT NULL,
  `invoice` varchar(45) DEFAULT NULL,
  `soft_delete` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_vch_cost`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table other_cost
# ------------------------------------------------------------

DROP TABLE IF EXISTS `other_cost`;

CREATE TABLE `other_cost` (
  `id_other_cost` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `seal_number` varchar(45) NOT NULL,
  `type_cost` enum('THC','PORT_PASS','STRIPPING','STORAGE','OTHER') DEFAULT NULL,
  `date` date DEFAULT NULL,
  `cost` int(11) DEFAULT NULL,
  `invoice_num` varchar(45) DEFAULT NULL,
  `pic` varchar(45) DEFAULT NULL,
  `soft_delete` int(2) NOT NULL DEFAULT '0',
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
  PRIMARY KEY (`id_payment`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table shipment_arrival
# ------------------------------------------------------------

DROP TABLE IF EXISTS `shipment_arrival`;

CREATE TABLE `shipment_arrival` (
  `id_ship_arr` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_doc` int(11) NOT NULL,
  `bl_number` varchar(45) DEFAULT NULL,
  `bl_date` date DEFAULT NULL,
  `ship_name` varchar(45) DEFAULT NULL,
  `td` varchar(45) DEFAULT NULL,
  `weight` bigint(20) DEFAULT '0',
  `arrival_date` date DEFAULT NULL,
  `unload_load_date` date DEFAULT NULL,
  `soft_delete` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_ship_arr`),
  UNIQUE KEY `id_doc_UNIQUE` (`id_doc`),
  UNIQUE KEY `bl_number_UNIQUE` (`bl_number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table shipment_doc
# ------------------------------------------------------------

DROP TABLE IF EXISTS `shipment_doc`;

CREATE TABLE `shipment_doc` (
  `id_doc` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `seal_number` varchar(45) DEFAULT NULL,
  `id_container` int(11) DEFAULT NULL,
  `process_date` date DEFAULT NULL,
  `company` enum('CMPY-1','CMPY-2') DEFAULT NULL,
  `ba_recv_date` date DEFAULT NULL,
  `id_agent` int(11) DEFAULT NULL,
  `origin_city` int(11) DEFAULT NULL,
  `id_shipper` int(11) DEFAULT NULL,
  `id_receiver` int(11) DEFAULT NULL,
  `report_num` varchar(45) DEFAULT NULL,
  `safeconduct_num` varchar(45) DEFAULT NULL,
  `po` varchar(45) DEFAULT NULL,
  `do` varchar(45) DEFAULT NULL,
  `io` enum('I','O') DEFAULT NULL,
  `condition` enum('FULL','CURAH') DEFAULT NULL,
  `product` varchar(45) DEFAULT NULL,
  `stuffing` enum('yes','no') DEFAULT NULL,
  `done` int(2) NOT NULL DEFAULT '0',
  `file` varchar(255) DEFAULT NULL,
  `soft_delete` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_doc`),
  UNIQUE KEY `seal_number_UNIQUE` (`seal_number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



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
  PRIMARY KEY (`id_labor_cost`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table vw_container
# ------------------------------------------------------------

DROP VIEW IF EXISTS `vw_container`;

CREATE TABLE `vw_container` (
   `idm_container` INT(11) UNSIGNED NOT NULL DEFAULT '0',
   `container_number` VARCHAR(45) NOT NULL,
   `size` ENUM('20','40','N') NULL DEFAULT NULL,
   `agent_name` VARCHAR(45) NULL DEFAULT NULL
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



# Dump of table vw_shipment_arrival
# ------------------------------------------------------------

DROP VIEW IF EXISTS `vw_shipment_arrival`;

CREATE TABLE `vw_shipment_arrival` (
   `id_ship_arr` INT(11) UNSIGNED NOT NULL DEFAULT '0',
   `id_doc` INT(11) NOT NULL,
   `seal_number` VARCHAR(45) NULL DEFAULT NULL,
   `bl_number` VARCHAR(45) NULL DEFAULT NULL,
   `bl_date` DATE NULL DEFAULT NULL,
   `ship_name` VARCHAR(45) NULL DEFAULT NULL,
   `td` VARCHAR(45) NULL DEFAULT NULL,
   `weight` BIGINT(20) NULL DEFAULT '0',
   `arrival_date` DATE NULL DEFAULT NULL,
   `unload_load_date` DATE NULL DEFAULT NULL
) ENGINE=MyISAM;



# Dump of table vw_shipment_doc
# ------------------------------------------------------------

DROP VIEW IF EXISTS `vw_shipment_doc`;

CREATE TABLE `vw_shipment_doc` (
   `id_doc` INT(11) UNSIGNED NOT NULL DEFAULT '0',
   `seal_number` VARCHAR(45) NULL DEFAULT NULL,
   `process_date` DATE NULL DEFAULT NULL,
   `idm_company` VARCHAR(20) NULL DEFAULT NULL,
   `company` VARCHAR(20) NULL DEFAULT NULL,
   `ba_recv_date` DATE NULL DEFAULT NULL,
   `idm_agent` INT(11) UNSIGNED NULL DEFAULT '0',
   `agent` VARCHAR(45) NULL DEFAULT NULL,
   `idm_city` INT(11) UNSIGNED NULL DEFAULT '0',
   `origin_city` VARCHAR(45) NULL DEFAULT NULL,
   `idm_container` INT(11) UNSIGNED NULL DEFAULT '0',
   `container_number` VARCHAR(45) NULL DEFAULT NULL,
   `size` ENUM('20','40','N') NULL DEFAULT NULL,
   `idm_shipper` INT(11) UNSIGNED NULL DEFAULT '0',
   `shipper` VARCHAR(45) NULL DEFAULT NULL,
   `idm_receiver` INT(11) UNSIGNED NULL DEFAULT '0',
   `receiver` VARCHAR(45) NULL DEFAULT NULL,
   `report_num` VARCHAR(45) NULL DEFAULT NULL,
   `safeconduct_num` VARCHAR(45) NULL DEFAULT NULL,
   `po` VARCHAR(45) NULL DEFAULT NULL,
   `do` VARCHAR(45) NULL DEFAULT NULL,
   `io` ENUM('I','O') NULL DEFAULT NULL,
   `kondisi` ENUM('FULL','CURAH') NULL DEFAULT NULL,
   `product` VARCHAR(45) NULL DEFAULT NULL,
   `stuffing` ENUM('yes','no') NULL DEFAULT NULL,
   `file` VARCHAR(255) NULL DEFAULT NULL,
   `done` INT(2) NOT NULL DEFAULT '0'
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
   `telp` VARCHAR(45) NULL DEFAULT NULL,
   `hp` VARCHAR(45) NULL DEFAULT NULL,
   `fax` VARCHAR(45) NULL DEFAULT NULL,
   `corporate_name` VARCHAR(45) NULL DEFAULT NULL,
   `bank_name` VARCHAR(45) NULL DEFAULT NULL,
   `account_number` VARCHAR(45) NULL DEFAULT NULL
) ENGINE=MyISAM;





# Replace placeholder table for vw_shipment_doc with correct view syntax
# ------------------------------------------------------------

DROP TABLE `vw_shipment_doc`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_shipment_doc`
AS SELECT
   `shipment_doc`.`id_doc` AS `id_doc`,
   `shipment_doc`.`seal_number` AS `seal_number`,
   `shipment_doc`.`process_date` AS `process_date`,
   `m_option`.`subID` AS `idm_company`,
   `m_option`.`value` AS `company`,
   `shipment_doc`.`ba_recv_date` AS `ba_recv_date`,
   `m_agent`.`idm_agent` AS `idm_agent`,
   `m_agent`.`agent_name` AS `agent`,
   `m_city`.`idm_city` AS `idm_city`,
   `m_city`.`city_name` AS `origin_city`,
   `m_container`.`idm_container` AS `idm_container`,
   `m_container`.`container_number` AS `container_number`,
   `m_container`.`size` AS `size`,
   `m_shipper`.`idm_shipper` AS `idm_shipper`,
   `m_shipper`.`debitur_name` AS `shipper`,
   `m_receiver`.`idm_receiver` AS `idm_receiver`,
   `m_receiver`.`receiver_name` AS `receiver`,
   `shipment_doc`.`report_num` AS `report_num`,
   `shipment_doc`.`safeconduct_num` AS `safeconduct_num`,
   `shipment_doc`.`po` AS `po`,
   `shipment_doc`.`do` AS `do`,
   `shipment_doc`.`io` AS `io`,
   `shipment_doc`.`condition` AS `kondisi`,
   `shipment_doc`.`product` AS `product`,
   `shipment_doc`.`stuffing` AS `stuffing`,
   `shipment_doc`.`file` AS `file`,
   `shipment_doc`.`done` AS `done`
FROM ((((((`shipment_doc` left join `m_option` on((`m_option`.`subID` = `shipment_doc`.`company`))) left join `m_agent` on((`m_agent`.`idm_agent` = `shipment_doc`.`id_agent`))) left join `m_city` on((`m_city`.`idm_city` = `shipment_doc`.`origin_city`))) left join `m_container` on((`m_container`.`idm_container` = `shipment_doc`.`id_container`))) left join `m_shipper` on((`m_shipper`.`idm_shipper` = `shipment_doc`.`id_shipper`))) left join `m_receiver` on((`m_receiver`.`idm_receiver` = `shipment_doc`.`id_receiver`))) where (`shipment_doc`.`soft_delete` = '0');


# Replace placeholder table for vw_shipment_arrival with correct view syntax
# ------------------------------------------------------------

DROP TABLE `vw_shipment_arrival`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_shipment_arrival`
AS SELECT
   `shipment_arrival`.`id_ship_arr` AS `id_ship_arr`,
   `shipment_arrival`.`id_doc` AS `id_doc`,
   `shipment_doc`.`seal_number` AS `seal_number`,
   `shipment_arrival`.`bl_number` AS `bl_number`,
   `shipment_arrival`.`bl_date` AS `bl_date`,
   `shipment_arrival`.`ship_name` AS `ship_name`,
   `shipment_arrival`.`td` AS `td`,
   `shipment_arrival`.`weight` AS `weight`,
   `shipment_arrival`.`arrival_date` AS `arrival_date`,
   `shipment_arrival`.`unload_load_date` AS `unload_load_date`
FROM (`shipment_arrival` left join `shipment_doc` on((`shipment_doc`.`id_doc` = `shipment_arrival`.`id_doc`)));


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


# Replace placeholder table for vw_container with correct view syntax
# ------------------------------------------------------------

DROP TABLE `vw_container`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_container`
AS SELECT
   `m_container`.`idm_container` AS `idm_container`,
   `m_container`.`container_number` AS `container_number`,
   `m_container`.`size` AS `size`,
   `m_agent`.`agent_name` AS `agent_name`
FROM (`m_container` left join `m_agent` on((`m_agent`.`idm_agent` = `m_container`.`id_agent`))) where (`m_container`.`soft_delete` = 0);


# Replace placeholder table for vw_route with correct view syntax
# ------------------------------------------------------------

DROP TABLE `vw_route`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_route`
AS SELECT
   `m_route`.`idm_route` AS `idm_route`,
   `m_route`.`route_name` AS `route_name`,
   `city1`.`city_name` AS `origin`,
   `city2`.`city_name` AS `destination`,
   `m_route`.`type` AS `type`,
   `m_route`.`size` AS `size`,
   `m_route`.`fare` AS `fare`
FROM ((`m_route` left join `m_city` `city1` on((`city1`.`idm_city` = `m_route`.`origin`))) left join `m_city` `city2` on((`city2`.`idm_city` = `m_route`.`destination`))) where (`m_route`.`soft_delete` = 0);

/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

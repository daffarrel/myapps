-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 13, 2019 at 02:22 PM
-- Server version: 5.7.25
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `db_myapps`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetOption` (IN `id` VARCHAR(20))  BEGIN
	select subID,value from m_option where nama_grup = id && soft_delete = '0';
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `demurage`
--

CREATE TABLE `demurage` (
  `id_demurage` int(11) UNSIGNED NOT NULL,
  `seal_number` varchar(45) NOT NULL,
  `date` date DEFAULT NULL,
  `period` varchar(45) DEFAULT NULL,
  `cost` int(11) DEFAULT NULL,
  `invoice_num` varchar(45) DEFAULT NULL,
  `soft_delete` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `detention`
--

CREATE TABLE `detention` (
  `id_detention` int(11) UNSIGNED NOT NULL,
  `seal_number` varchar(45) NOT NULL,
  `date` date DEFAULT NULL,
  `period` varchar(45) DEFAULT NULL,
  `cost` int(11) DEFAULT NULL,
  `invoice_num` varchar(45) DEFAULT NULL,
  `soft_delete` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `doring`
--

CREATE TABLE `doring` (
  `id_doring` int(11) UNSIGNED NOT NULL,
  `id_ship_arr` int(11) DEFAULT NULL,
  `safeconduct_num` varchar(45) NOT NULL,
  `id_route` int(11) DEFAULT NULL,
  `dk_lk` enum('DK','LK') DEFAULT NULL,
  `on_chassis` date DEFAULT NULL,
  `unload_date` date DEFAULT NULL,
  `id_truck` int(11) DEFAULT NULL,
  `id_driver` int(11) DEFAULT NULL,
  `soft_delete` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `doring`
--

INSERT INTO `doring` (`id_doring`, `id_ship_arr`, `safeconduct_num`, `id_route`, `dk_lk`, `on_chassis`, `unload_date`, `id_truck`, `id_driver`, `soft_delete`) VALUES
(9, 1, 'sadasd', 1, 'DK', '2019-10-31', '2019-10-29', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `doring_doc`
--

CREATE TABLE `doring_doc` (
  `id_doring_doc` int(11) UNSIGNED NOT NULL,
  `id_doring` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `jenis_dokumen` varchar(255) DEFAULT NULL,
  `checklist` enum('yes','no') DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `escort_cost`
--

CREATE TABLE `escort_cost` (
  `id_escort_cost` int(11) UNSIGNED NOT NULL,
  `safeconduct_num` varchar(45) NOT NULL,
  `date` date DEFAULT NULL,
  `cost` int(11) DEFAULT NULL,
  `soft_delete` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `etc_cost`
--

CREATE TABLE `etc_cost` (
  `id_etc_cost` int(11) UNSIGNED NOT NULL,
  `safeconduct_num` varchar(45) NOT NULL,
  `cost` int(11) DEFAULT NULL,
  `note` varchar(45) DEFAULT NULL,
  `soft_delete` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `freight_cost`
--

CREATE TABLE `freight_cost` (
  `id_freight_cost` int(11) UNSIGNED NOT NULL,
  `safeconduct_num` varchar(45) NOT NULL,
  `date` date DEFAULT NULL,
  `cost` int(11) DEFAULT NULL,
  `invoice` varchar(45) DEFAULT NULL,
  `soft_delete` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `fuel_cost`
--

CREATE TABLE `fuel_cost` (
  `id_fuel_cost` int(11) UNSIGNED NOT NULL,
  `safeconduct_num` varchar(45) NOT NULL,
  `date` date DEFAULT NULL,
  `cost` int(11) DEFAULT NULL,
  `company` varchar(45) DEFAULT NULL,
  `soft_delete` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id_invoice` int(11) UNSIGNED NOT NULL,
  `safeconduct_num` varchar(45) NOT NULL,
  `invoice_num` varchar(45) NOT NULL,
  `date` date DEFAULT NULL,
  `nominal` int(11) DEFAULT NULL,
  `type` enum('STORAGE','DEMURAGE','CLAIM','THC','LABOR','EQUIPMENT') DEFAULT NULL,
  `soft_delete` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `labor_cost`
--

CREATE TABLE `labor_cost` (
  `id_labor_cost` int(11) UNSIGNED NOT NULL,
  `safeconduct_num` varchar(45) NOT NULL,
  `date` date DEFAULT NULL,
  `cost` int(11) UNSIGNED DEFAULT NULL,
  `foreman` varchar(45) DEFAULT NULL,
  `soft_delete` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `main_cost`
--

CREATE TABLE `main_cost` (
  `id_cost` int(11) UNSIGNED NOT NULL,
  `safeconduct_num` varchar(45) NOT NULL,
  `date` date DEFAULT NULL,
  `do_cost` int(11) DEFAULT NULL,
  `clean_seal_cost` int(11) DEFAULT NULL,
  `soft_delete` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `m_agent`
--

CREATE TABLE `m_agent` (
  `idm_agent` int(11) UNSIGNED NOT NULL,
  `agent_name` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `telp` varchar(45) DEFAULT NULL,
  `hp` varchar(45) DEFAULT NULL,
  `fax` varchar(45) DEFAULT NULL,
  `fee` int(11) UNSIGNED DEFAULT NULL,
  `soft_delete` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `m_agent`
--

INSERT INTO `m_agent` (`idm_agent`, `agent_name`, `address`, `telp`, `hp`, `fax`, `fee`, `soft_delete`) VALUES
(1, 'voluptatum', '22381 Upton Spurs Apt. 966\nNew Terence, GA 66', '579-538-5480x3948', '09944039840', '1-018-355-1329x47287', 8, 1),
(2, 'sint', '511 Pouros Squares Apt. 974\nWest Mikel, CA 60', '310-283-2482x845', '700-109-8105', '+77(9)2585303057', 8, 0),
(3, 'id', '63009 Jocelyn Light\nKautzerchester, AR 67712', '1-030-178-2471x71066', '(967)350-4873', '130-119-7112x528', 8, 0),
(4, 'fugit', '878 Darwin Trafficway\nNorth Kraigburgh, WA 49', '1-388-604-4795x56511', '05191169467', '1-111-431-6158', 1, 0),
(5, 'voluptatibus', '636 Abel RoadLake Kiannafort, DE 16313', '(828)604-6642x789', '355.127.6026x68976', '959.611.4072', 3, 0),
(6, 'PT. Surya', ' ', ' ', ' ', ' ', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `m_bank`
--

CREATE TABLE `m_bank` (
  `idm_bank` int(11) UNSIGNED NOT NULL,
  `bank_code` varchar(45) DEFAULT NULL,
  `bank_name` varchar(45) DEFAULT NULL,
  `soft_delete` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `m_bank`
--

INSERT INTO `m_bank` (`idm_bank`, `bank_code`, `bank_name`, `soft_delete`) VALUES
(1, 'BBCA', 'Bank BCA', 1),
(2, 'BBRI', 'Bank BRI', 0),
(3, 'BMRI', 'Bank Mandiri', 0),
(4, 'BDMN', 'Bank Danamon', 0),
(5, 'CIMB', 'Bank CIMB Niaga', 0),
(6, 'BBNI', 'Bank BNI', 0),
(7, 'BKTM', 'Bank Kaltimtara', 0),
(8, 'BBTN', 'Bank BTN', 0),
(9, 'PMRT', 'Permata Bank', 0);

-- --------------------------------------------------------

--
-- Table structure for table `m_city`
--

CREATE TABLE `m_city` (
  `idm_city` int(11) UNSIGNED NOT NULL,
  `city_code` varchar(45) DEFAULT NULL,
  `city_name` varchar(45) DEFAULT NULL,
  `soft_delete` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `m_city`
--

INSERT INTO `m_city` (`idm_city`, `city_code`, `city_name`, `soft_delete`) VALUES
(1, 'BPN', 'Balikpapan', 0),
(2, 'SMD', 'Samarinda', 0),
(3, 'TRK', 'Tarakan', 0),
(4, 'SBY', 'Surabaya', 0),
(5, 'JKT', 'Jakarta', 0),
(6, 'SMR', 'Semarang', 0),
(7, 'MKS', 'Makassar', 0),
(8, 'KNDR', 'Kendari', 0),
(9, 'MND', 'Manado', 0),
(10, 'BJR', 'Banjarmasin', 0),
(11, 'MDN', 'Medan', 0);

-- --------------------------------------------------------

--
-- Table structure for table `m_container`
--

CREATE TABLE `m_container` (
  `idm_container` int(11) UNSIGNED NOT NULL,
  `container_number` varchar(45) NOT NULL,
  `size` enum('20','40','N') DEFAULT NULL,
  `id_agent` int(11) DEFAULT NULL,
  `soft_delete` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `m_container`
--

INSERT INTO `m_container` (`idm_container`, `container_number`, `size`, `id_agent`, `soft_delete`) VALUES
(1, 'asdasdasd', '40', 1, 0),
(2, '9', '40', 2, 0),
(3, '858', '20', 3, 0),
(4, '86073', 'N', 1, 0),
(5, '1974653', '40', 2, 0),
(6, '477763412', 'N', 3, 0),
(7, '77', '40', 1, 0),
(8, '200115', '20', 2, 0),
(9, '3968257', 'N', 3, 0),
(10, '731083835', '20', 1, 0),
(11, '2494399', '40', 2, 0),
(12, '898251', 'N', 3, 0),
(13, '9219', '40', 1, 0),
(14, '4349382', 'N', 2, 0),
(15, '453030684', '20', 3, 0),
(16, '827653638', 'N', 1, 0),
(17, '54590', 'N', 2, 0),
(18, '289569523', '20', 3, 0),
(19, '443014', 'N', 1, 0),
(20, '8568726', '40', 2, 0),
(21, '967', 'N', 3, 0),
(22, '640238', '40', 1, 0),
(23, '883249', '40', 2, 0),
(24, '54520295', 'N', 3, 0),
(25, '951919', '20', 1, 0),
(26, '5144416', '40', 2, 0),
(27, '12068', '20', 3, 0),
(28, '61074660', '40', 1, 0),
(29, '5518', '40', 2, 0),
(30, '18', '20', 3, 0),
(31, '104295', '40', 1, 0),
(32, '5', '20', 2, 0),
(33, '1', '20', 3, 0),
(34, '30980231', '20', 1, 0),
(35, '4', '20', 2, 0),
(36, '63827', '20', 3, 0),
(37, '915089', '20', 1, 0),
(38, '6', '20', 2, 0),
(39, '1791', '40', 3, 0),
(40, '5848873', '20', 1, 0),
(41, '8230687', 'N', 2, 0),
(42, '4055', 'N', 3, 0),
(43, '55376', '20', 1, 0),
(44, '58472203', '20', 2, 0),
(45, '139', '40', 3, 0),
(46, '221', '20', 1, 0),
(47, '445601068', '40', 2, 0),
(48, '2', '20', 3, 0),
(49, '370177275', '20', 1, 0),
(50, '898712942', '40', 2, 0),
(51, '5061', '40', 3, 0),
(52, '9809543', 'N', 1, 0),
(53, '56', 'N', 2, 0),
(54, '6855', '20', 3, 0),
(55, '999', '40', 1, 0),
(56, '67300', '40', 2, 0),
(57, '230', '20', 3, 0),
(58, '93', '40', 1, 0),
(59, '4618449', '40', 2, 0),
(60, '33', '20', 3, 0),
(61, '5199551', '20', 1, 0),
(62, '496', '40', 2, 0),
(63, '54122', '20', 3, 0),
(64, '2946758', '40', 1, 0),
(65, '831287', 'N', 2, 0),
(66, '7191', '20', 3, 0),
(67, '98', '40', 1, 0),
(68, '4209528', 'N', 2, 0),
(69, '15194086', '40', 3, 0),
(70, '24104', 'N', 1, 0),
(71, '821814869', '20', 2, 0),
(72, '57585', 'N', 3, 0),
(73, '17', '20', 1, 0),
(74, '424293', '20', 2, 0),
(75, '588663954', '40', 3, 0),
(76, '23', '20', 1, 0),
(77, '92', '20', 2, 0),
(78, '3747', '40', 3, 0),
(79, '950', '20', 1, 0),
(80, '582', '40', 2, 0),
(81, '1118', '40', 3, 0),
(82, '26755588', '20', 1, 0),
(83, '899747632', '20', 2, 0),
(84, '68', '40', 3, 0),
(85, '615562279', '20', 1, 0),
(86, '8664883', 'N', 2, 0),
(87, '242066780', '20', 3, 0),
(88, '679', '20', 1, 0),
(89, '88', 'N', 2, 0),
(90, '593', 'N', 3, 0),
(91, '338259', '20', 1, 0),
(92, '93588', '20', 2, 0),
(93, '158054', 'N', 3, 0),
(94, '65', '40', 1, 0),
(95, '49203', '20', 2, 0),
(96, '38', '40', 3, 0),
(97, '681044462', 'N', 1, 0),
(98, '707370', '20', 2, 0),
(99, '21308346', '20', 3, 0),
(100, '6006899', '20', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `m_driver`
--

CREATE TABLE `m_driver` (
  `idm_driver` int(11) UNSIGNED NOT NULL,
  `driver_name` varchar(45) DEFAULT NULL,
  `license_number` varchar(45) DEFAULT NULL,
  `dob` date NOT NULL DEFAULT '1970-01-01',
  `dob_city` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `soft_delete` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `m_driver`
--

INSERT INTO `m_driver` (`idm_driver`, `driver_name`, `license_number`, `dob`, `dob_city`, `address`, `soft_delete`) VALUES
(1, 'Suprapto', '1231231231231312', '1980-06-14', 'Balikpapan', 'Jalan suprapto', 0),
(2, 'Fanta', '092139998289asdsad', '1981-09-18', 'Samarinda', 'Jalan 22', 0),
(3, 'Fanta', '092139998289222', '1981-09-18', 'Samarinda', 'Jalan 2', 0);

-- --------------------------------------------------------

--
-- Table structure for table `m_option`
--

CREATE TABLE `m_option` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama_grup` varchar(20) DEFAULT NULL,
  `subID` varchar(20) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  `soft_delete` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `m_option`
--

INSERT INTO `m_option` (`id`, `nama_grup`, `subID`, `value`, `soft_delete`) VALUES
(1, 'truck', 'TRAILER', 'Truck Trailer', 0),
(2, 'truck', 'TRONTON', 'Truck Tronton', 0),
(3, 'truck', 'LB', 'Long Bed', 0),
(4, 'truck', 'CD', 'Cold Diesel', 0),
(5, 'size', '40', '40 Feet', 0),
(6, 'size', '20', '20 Feet', 0),
(7, 'size', 'N', 'Kosong', 0),
(8, 'company', 'CMPY-1', 'PT. Perdana Semesta Perkasa', 0),
(9, 'company', 'CMPY-2', 'PT. Paramita Armada Inti', 0),
(10, 'jenis_dok', 'BA', 'Berita Acara', 0),
(11, 'jenis_dok', 'SRT_JLN', 'Surat Jalan', 0);

-- --------------------------------------------------------

--
-- Table structure for table `m_receiver`
--

CREATE TABLE `m_receiver` (
  `idm_receiver` int(11) UNSIGNED NOT NULL,
  `receiver_name` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `telp` varchar(45) DEFAULT NULL,
  `hp` varchar(45) DEFAULT NULL,
  `fax` varchar(45) DEFAULT NULL,
  `corporate_name` varchar(45) DEFAULT NULL,
  `id_bank` int(11) DEFAULT NULL,
  `account_number` varchar(45) DEFAULT NULL,
  `soft_delete` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `m_receiver`
--

INSERT INTO `m_receiver` (`idm_receiver`, `receiver_name`, `address`, `city`, `telp`, `hp`, `fax`, `corporate_name`, `id_bank`, `account_number`, `soft_delete`) VALUES
(1, 'nihil', '4759 Rusty Estates\nNorth Mortimermouth, IN 05', 'Nyahaven', '520-932-8260x38983', '(035)108-9411', '+01(2)2773485883', 'exercitationem', 1, '9331973', 0),
(2, 'adipisci', '8461 Deckow Islands Suite 821\nNorth Nolaborou', 'Ellastad', '+02(2)4414549911', '534-833-2248x0314', '1-866-073-1951', 'quod', 2, '1750340', 0),
(3, 'odio', '79757 Lucie Lights Suite 512\nRauside, ME 9594', 'Thomashaven', '349.885.8466', '+33(1)3443549359', '1-317-609-6778', 'non', 3, '984516', 0),
(4, 'praesentium', '4668 Major Ridge\nEast Lou, NC 38239', 'West Shannaland', '750-487-8071x7398', '314.944.4471x613', '833.104.6188', 'beatae', 4, '34707', 0),
(5, 'dolores', '90196 Deonte Stream\nChamplinmouth, VA 03405', 'Hartmannborough', '01614148770', '878-972-6957x017', '09553382419', 'repudiandae', 5, '32675842', 0),
(6, 'iure', '268 Hirthe Centers Suite 563\nEast Clare, DC 9', 'Isabelleburgh', '(520)288-2753', '082.752.4747x6216', '05206243382', 'quis', 6, '6', 0),
(7, 'velit', '348 Heaney Wall\nEast Jaleelmouth, PA 94754-94', 'Borisborough', '784-766-1064', '144.399.3354', '09687573868', 'autem', 7, '4240', 0),
(8, 'ut', '70175 Hilpert Drives Apt. 947\nTrentchester, H', 'O\'Keefeburgh', '06027644454', '042.432.5306', '03144394859', 'dolores', 8, '4191', 0),
(9, 'omnis', '358 Angela Fields\nLavonneborough, MA 96787-83', 'Krisberg', '(351)900-4310x388', '03101456491', '360.514.3490x896', 'fuga', 9, '50', 0),
(10, 'corporis', '31435 Naomie Stream\nSidneyview, OH 25170-1760', 'Lake Matildeberg', '+49(8)7772410604', '(759)108-0034', '1-142-929-0213x771', 'minus', 1, '', 0),
(11, 'pariatur', '703 Rubye Points Suite 613\nLake Rodolfocheste', 'West Forrestberg', '+26(0)0194268318', '077-820-5803', '403-625-9862x187', 'praesentium', 2, '786391344', 0),
(12, 'molestias', '8136 Estelle Road Apt. 297\nEladioport, OK 989', 'Leslyton', '682-526-5631', '+47(5)9194854557', '1-353-082-8976x4737', 'voluptates', 3, '383924628', 0),
(13, 'et', '588 Eichmann Spurs Apt. 353\nWisozkmouth, MD 2', 'Pansyfort', '1-651-448-5681x333', '+75(8)8982249542', '(890)899-8782', 'aliquam', 4, '588168', 0),
(14, 'et', '1649 Mayer Lane\nBrionnachester, FL 86729-6035', 'Janellebury', '07098545525', '1-967-943-9448', '478.097.9681x20233', 'praesentium', 5, '62', 0),
(15, 'odio', '963 Wintheiser Overpass Suite 775\nAlleneburgh', 'East Raoulhaven', '505.550.1329x19123', '872.909.3906', '08675122950', 'sequi', 6, '81187736', 0),
(16, 'quia', '713 Pagac Trace\nEast Soniaport, SD 42469', 'Port Harleyhaven', '1-336-764-9452x2767', '654-015-6095x8486', '00537573335', 'ipsam', 7, '46569155', 0),
(17, 'inventore', '9823 Koelpin Gardens\nKayliport, RI 11656', 'New Bertrandville', '539.831.8678', '573.930.1786', '700-477-1192', 'fuga', 8, '7091005', 0),
(18, 'delectus', '05724 Gutkowski Walk\nNew Alvena, SD 04728-121', 'Port Monafurt', '(168)545-0811', '823.852.5139x08583', '1-987-304-0969x2055', 'consectetur', 9, '58264', 0),
(19, 'quia', '213 Skyla Greens\nIrmatown, NY 41005', 'Port Otis', '107-994-9429x2428', '00595420943', '904-446-0398', 'dolor', 1, '7', 0),
(20, 'eum', '84766 Nikko Row Apt. 487\nEast Rosalia, AK 946', 'Port Katlynnmouth', '(097)799-5970x5486', '489.642.6964', '939-530-8368', 'non', 2, '3007504', 0),
(21, 'placeat', '95740 Batz Place\nJosiahburgh, NM 36567', 'Greenfeldermouth', '317-455-0663x4824', '(427)719-9820x8140', '321-604-2203x768', 'pariatur', 3, '805279', 0),
(22, 'enim', '5832 Ross Mills Apt. 526\nFrederickchester, IA', 'East Delphine', '1-248-293-1080x8191', '949.950.2508x96458', '289.194.5466x177', 'quidem', 4, '1', 0),
(23, 'voluptatem', '562 Horacio Shoal Apt. 192\nNorth Javonbury, W', 'South Peterchester', '235.119.2737x6978', '472.758.2561x586', '779-317-4661', 'beatae', 5, '631107', 0),
(24, 'non', '676 Gaylord Station Apt. 621\nSatterfieldmouth', 'Monabury', '(240)061-4352x97176', '+63(2)1018494158', '894-753-7743x790', 'neque', 6, '', 0),
(25, 'id', '14356 Spinka Common\nWest Junius, AR 52877-620', 'West Lillyfort', '05117487999', '119-739-6486', '02171031608', 'eos', 7, '5157269', 0),
(26, 'eveniet', '607 Senger Square Apt. 898\nThielside, KY 4727', 'East Allene', '05555738216', '(385)781-8264x8869', '+33(9)6908238288', 'quo', 8, '940', 0),
(27, 'earum', '835 Leonardo Manor Apt. 827\nPort Brennan, SD ', 'Sheldonmouth', '1-019-143-3569', '481.186.9788x5921', '1-846-609-2555', 'eligendi', 9, '472243928', 0),
(28, 'dicta', '39317 Korbin Dam Apt. 869\nEast Kaseyshire, NH', 'Dejuanmouth', '(974)039-1777x664', '1-896-788-1770', '867-245-1489', 'eos', 1, '9829237', 0),
(29, 'libero', '8118 Orin Key\nEulatown, OR 47802-2393', 'East Opalberg', '909.417.1512x182', '541-060-5259x738', '537.016.5955x1688', 'itaque', 2, '63409', 0),
(30, 'suscipit', '14795 Ethyl Square\nLabadiefurt, NE 15990', 'Botsfordfurt', '950-893-4173x6695', '214.065.9470x5097', '(778)488-7849', 'reprehenderit', 3, '80304031', 0),
(31, 'placeat', '398 Tom Extensions\nSteveland, NY 79682-0714', 'Mckenziechester', '313-268-1877x36267', '1-468-821-9312x60980', '(590)153-0590', 'asperiores', 4, '385054', 0),
(32, 'aut', '0954 Torphy Meadow\nWest Mateoland, CT 79238-2', 'New Bryonmouth', '(865)631-0841', '1-233-796-2687x77973', '757-347-5670x13677', 'quas', 5, '55838', 0),
(33, 'laudantium', '2979 Viola Tunnel\nEast Curtberg, NY 63528-885', 'Jeanieborough', '675.947.8679', '+17(9)2068817830', '+59(9)0044567182', 'eum', 6, '566010', 0),
(34, 'animi', '81123 Wuckert Coves Apt. 943\nNew Helenfort, M', 'Cyrusville', '171-574-5979', '1-464-815-5189', '158-707-2576x1263', 'unde', 7, '550', 0),
(35, 'nihil', '1231 Rory Valleys Apt. 893\nNorth Elaina, MN 8', 'Mohammadhaven', '1-011-602-4030', '532.741.3155x90423', '812.090.5891x773', 'mollitia', 8, '50', 0),
(36, 'suscipit', '1414 Deckow Groves Suite 233\nNew Mae, NE 1896', 'Nikkoborough', '1-956-000-9825x204', '1-582-392-2291x237', '745.249.6576', 'et', 9, '', 0),
(37, 'ut', '05878 Ernser Springs Suite 494\nLoweshire, SC ', 'North Garthmouth', '1-081-599-4320x49814', '(044)149-8582', '(051)043-1165', 'accusantium', 1, '7664', 0),
(38, 'totam', '475 Anderson Flats\nWest Alycefort, IA 19652-5', 'Rickyborough', '370-842-3250', '596-752-2105x606', '+56(1)1349856117', 'optio', 2, '95', 0),
(39, 'mollitia', '31560 Marjolaine Isle Apt. 107\nBoyleville, OH', 'Lake Careyport', '386-732-2375x48523', '548.646.2106x608', '(997)358-8536', 'ipsam', 3, '652511', 0),
(40, 'sunt', '4206 Jabari Dale Apt. 943\nAnthonyton, HI 6437', 'New Nolan', '1-202-697-8221x4592', '1-843-518-8972', '1-539-550-8891', 'illum', 4, '5842', 0),
(41, 'et', '87535 Koepp Village\nEunicetown, NM 95514', 'Fionaville', '729-564-3388x43771', '027-920-2046', '1-359-075-4218x4688', 'pariatur', 5, '2365', 0),
(42, 'est', '143 Abner Mission Suite 807\nEast Velma, SC 64', 'New Angelineview', '996-380-5580x3557', '(383)056-5540', '1-720-966-6993x612', 'atque', 6, '3513', 0),
(43, 'debitis', '0455 Ismael Pine\nEddchester, NC 27235', 'Quitzonshire', '253.936.2218x162', '1-671-961-1827x7153', '024-512-2023x6381', 'enim', 7, '177218331', 0),
(44, 'neque', '8413 Myra Island Suite 207\nEast Adahmouth, IL', 'South Adolf', '199.992.0221x431', '06512313511', '06836395042', 'tenetur', 8, '58012068', 0),
(45, 'eum', '824 Fahey Ferry Apt. 211\nEast Davontebury, LA', 'New Laury', '870-887-7314x61195', '1-974-184-9170x048', '+93(3)9505616673', 'reprehenderit', 9, '45205958', 0),
(46, 'nostrum', '633 Rahsaan Plains Suite 834\nWest Albinboroug', 'Homenickport', '+94(3)7903441414', '(291)096-4752x63401', '(009)766-1713x04526', 'est', 1, '156281', 0),
(47, 'expedita', '673 Bins Coves Suite 812\nEast Adeline, MN 676', 'Melynaport', '060.505.0408', '(053)378-1483', '254-502-9840', 'libero', 2, '9', 0),
(48, 'qui', '074 Marcellus Tunnel\nVeumfort, OK 36156-5305', 'East Sim', '(730)929-2932x28900', '09917977969', '802-580-3518', 'enim', 3, '52', 0),
(49, 'necessitatibus', '75778 Cruickshank Branch\nEast Bud, IL 72526', 'Grahamview', '(559)694-4121x5409', '01268860173', '+81(0)1917786538', 'fugit', 4, '369', 0),
(50, 'non', '27409 Fahey Road\nCorwinmouth, NJ 11262-0744', 'East Halle', '+81(6)5706021776', '+06(7)2885256605', '275-191-2398', 'reprehenderit', 5, '744', 0);

-- --------------------------------------------------------

--
-- Table structure for table `m_route`
--

CREATE TABLE `m_route` (
  `idm_route` int(11) UNSIGNED NOT NULL,
  `route_name` varchar(45) DEFAULT '',
  `origin` varchar(45) DEFAULT NULL,
  `destination` varchar(45) DEFAULT NULL,
  `type` enum('TRAILER','TRONTON','LB','CD') DEFAULT NULL,
  `size` enum('20','40','N') DEFAULT NULL,
  `fare` int(11) DEFAULT NULL,
  `soft_delete` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `m_route`
--

INSERT INTO `m_route` (`idm_route`, `route_name`, `origin`, `destination`, `type`, `size`, `fare`, `soft_delete`) VALUES
(1, 'SMD-SBY', '2', '4', 'LB', 'N', 200000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `m_ship`
--

CREATE TABLE `m_ship` (
  `idm_ship` int(11) UNSIGNED NOT NULL,
  `ship_name` varchar(45) DEFAULT NULL,
  `agent_code` int(10) UNSIGNED NOT NULL,
  `soft_delete` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `m_ship`
--

INSERT INTO `m_ship` (`idm_ship`, `ship_name`, `agent_code`, `soft_delete`) VALUES
(1, 'dolores', 1, 0),
(2, 'est', 2, 0),
(3, 'nulla', 3, 0),
(4, 'porro', 4, 0),
(5, 'quia', 5, 0),
(6, 'perferendis', 1, 0),
(7, 'non', 2, 0),
(8, 'fugit', 3, 0),
(9, 'sed', 4, 0),
(10, 'et', 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `m_shipper`
--

CREATE TABLE `m_shipper` (
  `idm_shipper` int(11) UNSIGNED NOT NULL,
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
  `soft_delete` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `m_shipper`
--

INSERT INTO `m_shipper` (`idm_shipper`, `debitur_name`, `address`, `city`, `pic`, `finance`, `telp`, `hp`, `fax`, `corporate_name`, `id_bank`, `account_number`, `soft_delete`) VALUES
(1, 'architecto', '00051 Pfannerstill RestNew Tamara, OH 47565-', 'North Boydland', 'Thad O\\\\\\\'Conner', 'Zion Rutherford DDS12', '447.189.6352x4412', '+99(5)6188979176', '438-163-7601', 'non', 5, '71307', 0),
(2, 'minima', '46478 Rolfson Lights\nWest Mozellemouth, RI 21', 'South Paoloburgh', 'Mr. Ariel Wolf', 'Angelica Emard', '00319868475', '1-138-728-9256', '199.604.7990x55949', 'nihil', 2, '9106649', 0),
(3, 'qui', '7970 Ena Extension Suite 040\nAlberthashire, D', 'Port Lilliana', 'Miss Noemi Koch I', 'Lempi Smitham', '+49(5)7661188930', '(534)480-7555x7534', '1-517-756-3640', 'aliquam', 3, '46207616', 0),
(4, 'et', '22878 Shanahan Mall\nEast Blaise, NC 04733-859', 'Baileyport', 'Mr. Gideon Larson', 'Tavares Schowalter', '(093)827-9841', '931-630-2046x8739', '970-611-4127x1405', 'error', 4, '134496786', 0),
(5, 'ipsum', '6201 Joaquin Pass\nShieldshaven, NJ 20184-1276', 'Port Noemieton', 'Dr. Oswaldo Heaney', 'Sasha Rodriguez', '095-679-6921', '+27(3)5796759082', '371-125-4462x4301', 'unde', 5, '900880400', 0),
(6, 'corrupti', '065 Giovani Plains Apt. 765\nCaitlynbury, AZ 2', 'East Nona', 'Mrs. Vergie Adams MD', 'Dr. Dax Runolfsdottir DDS', '+92(4)2382666078', '(374)077-1626', '348-892-6045', 'iusto', 6, '38', 0),
(7, 'ut', '649 Skiles Light\nEast Edythville, MI 96847-55', 'West Alessandroton', 'Dante Carter', 'Cedrick Hegmann', '1-067-679-8510x1751', '219.977.3467', '(580)240-1931', 'dolores', 7, '', 0),
(8, 'voluptatem', '926 Claude Valley Apt. 747\nPort Garnett, MO 9', 'Davidside', 'Wilhelmine Luettgen Jr.', 'Eileen Langosh PhD', '337-674-2233x0648', '015.454.2631x245', '860.232.7577x326', 'rem', 8, '862', 0),
(9, 'harum', '3352 Wolff Orchard Apt. 355\nWest Otholand, AL', 'Gerlachfort', 'Claude Mitchell', 'Demarco Thompson', '457-129-5194x441', '611.992.7675', '(339)242-3662x5362', 'at', 9, '28', 0),
(10, 'sed', '758 Reese Manor Suite 103\nCruickshankville, A', 'Koeppfurt', 'Viviane Simonis', 'Prof. Wade Cartwright DDS', '(303)757-6636x18407', '(654)605-5434', '987-442-9432', 'et', 1, '9336437', 0),
(11, 'facilis', '56065 Gay Causeway\nEast Corenetown, IA 37154', 'Port Raheemburgh', 'Prof. Orval Greenfelder Sr.', 'Agustin Wunsch DDS', '01326000368', '1-220-806-1449', '1-827-795-5893x73838', 'enim', 2, '8', 0),
(12, 'voluptatem', '287 Darien Vista\nKennedystad, AK 82840', 'Odessaview', 'Miss Darby Hayes Jr.', 'Fannie Leffler', '984-189-5668', '325.119.0619', '531.124.4945', 'nobis', 3, '4', 0),
(13, 'et', '79870 Myles Flats Apt. 781\nNorth Tressietown,', 'Padbergland', 'Demarco Schimmel', 'Dr. Lea Bosco I', '752.087.9365x47098', '(686)940-3031x18486', '987.648.3003x18371', 'et', 4, '', 0),
(14, 'amet', '6881 Lucio Extensions Apt. 313\nNorth Kacimout', 'East Akeem', 'Amber Langworth', 'Kamille Lakin', '499.101.4263', '(479)153-9505x495', '380.903.7417', 'sit', 5, '3124268', 0),
(15, 'similique', '220 Jaunita Burgs Suite 592\nJorgemouth, AR 17', 'Cruickshankview', 'Dayana O\'Kon', 'Lesly Roberts', '(418)969-8163x6669', '409.650.8416x1589', '(767)431-9182x690', 'aliquam', 6, '6829347', 0),
(16, 'aperiam', '45610 Kuhlman Heights Apt. 106\nFayhaven, UT 5', 'Emilianoville', 'Miss Annamarie Cremin', 'Mrs. Roberta Considine', '780-317-0884x7389', '007-558-0285', '674-476-5239x711', 'aut', 7, '236714', 0),
(17, 'inventore', '37779 Alexane Forest Suite 693\nWest Rylee, ND', 'Kobemouth', 'Jacklyn Kuhlman', 'Emory Cruickshank', '(900)343-8032x88629', '08940492837', '1-741-386-6178', 'corrupti', 8, '60356602', 0),
(18, 'iusto', '5033 Purdy Extension\nRachelborough, WI 45501', 'South Dorris', 'Tia Beier', 'Germaine Stehr PhD', '03225940557', '1-921-936-1018x970', '1-865-456-6731', 'maiores', 9, '589340', 0),
(19, 'dicta', '6524 Ziemann Squares Suite 984\nAdolphusside, ', 'Coramouth', 'Miss Dortha Wiza III', 'Freddie Franecki', '859-741-7221x12637', '(474)538-5379x191', '846-708-4754x0598', 'aut', 1, '5869960', 0),
(20, 'eaque', '943 Brenna Way\nLake Wyman, IN 40220-8315', 'Eugenehaven', 'Camden Gerhold', 'Prof. Jamaal Wyman', '(265)897-5444x842', '1-182-929-2506x914', '04187043838', 'ex', 2, '71233346', 0),
(21, 'asdasd', 'sadasd', 'sadasdas', 'asdasd', 'asdasdas', 'asdasd', 'asdasd', 'asdasda', 'asdasd', 6, 'asdasdsa', 0),
(22, '', '', '', '', '', '', '', '', '', 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `m_truck`
--

CREATE TABLE `m_truck` (
  `idm_truck` int(11) UNSIGNED NOT NULL,
  `truck_code` varchar(45) DEFAULT NULL,
  `plate_number` varchar(45) DEFAULT NULL,
  `soft_delete` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `m_truck`
--

INSERT INTO `m_truck` (`idm_truck`, `truck_code`, `plate_number`, `soft_delete`) VALUES
(1, 'zqxpjjnsad', '429', 0),
(2, 'asdasdkqji', '43023', 0),
(3, 'twke', '55974', 0),
(4, 'vdzv', '84698798', 0),
(5, 'crce', '479769', 0),
(6, 'rwqa', '55', 0),
(7, 'dqbr', '525517400', 0),
(8, 'hawc', '69437877', 0),
(9, 'brsj', '7340472', 0),
(10, 'ogph', '4814', 1);

-- --------------------------------------------------------

--
-- Table structure for table `other_cost`
--

CREATE TABLE `other_cost` (
  `id_other_cost` int(11) UNSIGNED NOT NULL,
  `seal_number` varchar(45) NOT NULL,
  `type_cost` enum('THC','PORT_PASS','STRIPPING','STORAGE','OTHER') DEFAULT NULL,
  `date` date DEFAULT NULL,
  `cost` int(11) DEFAULT NULL,
  `invoice_num` varchar(45) DEFAULT NULL,
  `pic` varchar(45) DEFAULT NULL,
  `soft_delete` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `oth_vch_cost`
--

CREATE TABLE `oth_vch_cost` (
  `id_vch_cost` int(11) UNSIGNED NOT NULL,
  `safeconduct_num` varchar(45) NOT NULL,
  `date` date DEFAULT NULL,
  `cost` varchar(45) DEFAULT NULL,
  `pic` varchar(45) DEFAULT NULL,
  `invoice` varchar(45) DEFAULT NULL,
  `soft_delete` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id_payment` int(11) UNSIGNED NOT NULL,
  `invoice_num` varchar(45) NOT NULL,
  `payment_date` date DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `nominal` int(11) DEFAULT NULL,
  `cost_variance` int(11) DEFAULT NULL,
  `soft_delete` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `shipment_arrival`
--

CREATE TABLE `shipment_arrival` (
  `id_ship_arr` int(11) UNSIGNED NOT NULL,
  `id_doc` int(11) NOT NULL,
  `bl_number` varchar(45) DEFAULT NULL,
  `bl_date` date DEFAULT NULL,
  `td` varchar(45) DEFAULT NULL,
  `weight` bigint(20) DEFAULT '0',
  `arrival_date` date DEFAULT NULL,
  `unload_load_date` date DEFAULT NULL,
  `soft_delete` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shipment_arrival`
--

INSERT INTO `shipment_arrival` (`id_ship_arr`, `id_doc`, `bl_number`, `bl_date`, `td`, `weight`, `arrival_date`, `unload_load_date`, `soft_delete`) VALUES
(1, 3, 'asdasd', '2019-09-20', 'asdasdas', 1231, '2019-09-12', '2019-09-12', 0);

-- --------------------------------------------------------

--
-- Table structure for table `shipment_doc`
--

CREATE TABLE `shipment_doc` (
  `id_doc` int(11) UNSIGNED NOT NULL,
  `seal_number` varchar(45) DEFAULT NULL,
  `size` enum('40','20','N') DEFAULT NULL,
  `process_date` date DEFAULT NULL,
  `company` enum('CMPY-1','CMPY-2') DEFAULT NULL,
  `ba_recv_date` date DEFAULT NULL,
  `id_agent` int(11) DEFAULT NULL,
  `origin_city` int(11) DEFAULT NULL,
  `id_shipper` int(11) DEFAULT NULL,
  `id_receiver` int(11) DEFAULT NULL,
  `ship_name` varchar(255) DEFAULT NULL,
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
  `soft_delete` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shipment_doc`
--

INSERT INTO `shipment_doc` (`id_doc`, `seal_number`, `size`, `process_date`, `company`, `ba_recv_date`, `id_agent`, `origin_city`, `id_shipper`, `id_receiver`, `ship_name`, `report_num`, `safeconduct_num`, `po`, `do`, `io`, `condition`, `product`, `stuffing`, `done`, `file`, `soft_delete`) VALUES
(1, 'llklkl12321', '40', '2019-09-18', 'CMPY-2', '2019-09-18', 4, 4, 5, 7, NULL, 'asdasdas', 'asdasdsa', 'asdsadas', 'asdasdasd', 'I', 'FULL', 'asdasdasdsaasdasdsad', 'no', 0, NULL, 0),
(2, '', '20', '0000-00-00', '', '0000-00-00', 0, 0, 0, 0, NULL, '', '', '', '', '', '', '', '', 0, NULL, 1),
(3, 'asdasd', 'N', '2019-09-25', 'CMPY-1', '2019-09-20', 2, 1, 1, 1, NULL, 'asdasd', 'asdasd', 'asdasd', 'asdasd', 'O', 'CURAH', 'asdasdas', 'yes', 0, NULL, 0),
(4, '123456', '20', '2019-10-29', 'CMPY-1', '2019-10-30', 5, 4, 2, 3, NULL, 'asdasd', 'dasdsad', 'asdasdasd', 'asdasdas', 'I', 'FULL', 'asdsad', 'yes', 0, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ss_labor_cost`
--

CREATE TABLE `ss_labor_cost` (
  `id_labor_cost` int(11) UNSIGNED NOT NULL,
  `safeconduct_num` varchar(45) NOT NULL,
  `date` date DEFAULT NULL,
  `cost` int(11) DEFAULT NULL,
  `PIC` varchar(45) DEFAULT NULL,
  `soft_delete` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_container`
-- (See below for the actual view)
--
CREATE TABLE `vw_container` (
`idm_container` int(11) unsigned
,`container_number` varchar(45)
,`size` enum('20','40','N')
,`agent_name` varchar(45)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_doring`
-- (See below for the actual view)
--
CREATE TABLE `vw_doring` (
`id_doring` int(11) unsigned
,`id_doc` int(11) unsigned
,`id_ship_arr` int(11) unsigned
,`seal_number` varchar(45)
,`size` enum('40','20','N')
,`safeconduct_num` varchar(45)
,`id_route` int(11) unsigned
,`route_name` varchar(45)
,`dk_lk` enum('DK','LK')
,`on_chassis` date
,`unload_date` date
,`id_truck` int(11) unsigned
,`plate_number` varchar(45)
,`id_driver` int(11) unsigned
,`driver_name` varchar(45)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_receiver`
-- (See below for the actual view)
--
CREATE TABLE `vw_receiver` (
`idm_receiver` int(11) unsigned
,`receiver_name` varchar(45)
,`address` varchar(45)
,`city` varchar(45)
,`telp` varchar(45)
,`hp` varchar(45)
,`fax` varchar(45)
,`corporate_name` varchar(45)
,`bank_name` varchar(45)
,`account_number` varchar(45)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_route`
-- (See below for the actual view)
--
CREATE TABLE `vw_route` (
`idm_route` int(11) unsigned
,`route_name` varchar(45)
,`origin` varchar(45)
,`destination` varchar(45)
,`type` enum('TRAILER','TRONTON','LB','CD')
,`size` enum('20','40','N')
,`fare` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_shipment_arrival`
-- (See below for the actual view)
--
CREATE TABLE `vw_shipment_arrival` (
`id_ship_arr` int(11) unsigned
,`id_doc` int(11)
,`seal_number` varchar(45)
,`size` enum('40','20','N')
,`ship_name` varchar(255)
,`bl_number` varchar(45)
,`bl_date` date
,`td` varchar(45)
,`weight` bigint(20)
,`arrival_date` date
,`unload_load_date` date
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_shipment_doc`
-- (See below for the actual view)
--
CREATE TABLE `vw_shipment_doc` (
`id_doc` int(11) unsigned
,`seal_number` varchar(45)
,`size` enum('40','20','N')
,`process_date` date
,`idm_company` varchar(20)
,`company` varchar(255)
,`ba_recv_date` date
,`idm_agent` int(11) unsigned
,`agent` varchar(45)
,`idm_city` int(11) unsigned
,`origin_city` varchar(45)
,`idm_shipper` int(11) unsigned
,`shipper` varchar(45)
,`idm_receiver` int(11) unsigned
,`receiver` varchar(45)
,`report_num` varchar(45)
,`safeconduct_num` varchar(45)
,`po` varchar(45)
,`do` varchar(45)
,`io` enum('I','O')
,`kondisi` enum('FULL','CURAH')
,`product` varchar(45)
,`stuffing` enum('yes','no')
,`ship_arrival_date` date
,`ship_name` varchar(255)
,`file` varchar(255)
,`done` int(2)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_shipper`
-- (See below for the actual view)
--
CREATE TABLE `vw_shipper` (
`idm_shipper` int(11) unsigned
,`debitur_name` varchar(45)
,`address` varchar(45)
,`city` varchar(45)
,`pic` varchar(45)
,`finance` varchar(45)
,`telp` varchar(45)
,`hp` varchar(45)
,`fax` varchar(45)
,`corporate_name` varchar(45)
,`bank_name` varchar(45)
,`account_number` varchar(45)
);

-- --------------------------------------------------------

--
-- Structure for view `vw_container`
--
DROP TABLE IF EXISTS `vw_container`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_container`  AS  select `m_container`.`idm_container` AS `idm_container`,`m_container`.`container_number` AS `container_number`,`m_container`.`size` AS `size`,`m_agent`.`agent_name` AS `agent_name` from (`m_container` left join `m_agent` on((`m_agent`.`idm_agent` = `m_container`.`id_agent`))) where (`m_container`.`soft_delete` = 0) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_doring`
--
DROP TABLE IF EXISTS `vw_doring`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_doring`  AS  select `doring`.`id_doring` AS `id_doring`,`shipment_doc`.`id_doc` AS `id_doc`,`shipment_arrival`.`id_ship_arr` AS `id_ship_arr`,`shipment_doc`.`seal_number` AS `seal_number`,`shipment_doc`.`size` AS `size`,`doring`.`safeconduct_num` AS `safeconduct_num`,`m_route`.`idm_route` AS `id_route`,`m_route`.`route_name` AS `route_name`,`doring`.`dk_lk` AS `dk_lk`,`doring`.`on_chassis` AS `on_chassis`,`doring`.`unload_date` AS `unload_date`,`m_truck`.`idm_truck` AS `id_truck`,`m_truck`.`plate_number` AS `plate_number`,`m_driver`.`idm_driver` AS `id_driver`,`m_driver`.`driver_name` AS `driver_name` from (((((`doring` left join `shipment_arrival` on((`shipment_arrival`.`id_ship_arr` = `doring`.`id_ship_arr`))) left join `shipment_doc` on((`shipment_doc`.`id_doc` = `shipment_arrival`.`id_doc`))) left join `m_route` on((`m_route`.`idm_route` = `doring`.`id_route`))) left join `m_truck` on((`m_truck`.`idm_truck` = `doring`.`id_truck`))) left join `m_driver` on((`m_driver`.`idm_driver` = `doring`.`id_driver`))) where (`doring`.`soft_delete` = '0') ;

-- --------------------------------------------------------

--
-- Structure for view `vw_receiver`
--
DROP TABLE IF EXISTS `vw_receiver`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_receiver`  AS  select `m_receiver`.`idm_receiver` AS `idm_receiver`,`m_receiver`.`receiver_name` AS `receiver_name`,`m_receiver`.`address` AS `address`,`m_receiver`.`city` AS `city`,`m_receiver`.`telp` AS `telp`,`m_receiver`.`hp` AS `hp`,`m_receiver`.`fax` AS `fax`,`m_receiver`.`corporate_name` AS `corporate_name`,`m_bank`.`bank_name` AS `bank_name`,`m_receiver`.`account_number` AS `account_number` from (`m_receiver` left join `m_bank` on((`m_receiver`.`id_bank` = `m_bank`.`idm_bank`))) where (`m_receiver`.`soft_delete` = '0') ;

-- --------------------------------------------------------

--
-- Structure for view `vw_route`
--
DROP TABLE IF EXISTS `vw_route`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_route`  AS  select `m_route`.`idm_route` AS `idm_route`,`m_route`.`route_name` AS `route_name`,`city1`.`city_name` AS `origin`,`city2`.`city_name` AS `destination`,`m_route`.`type` AS `type`,`m_route`.`size` AS `size`,`m_route`.`fare` AS `fare` from ((`m_route` left join `m_city` `city1` on((`city1`.`idm_city` = `m_route`.`origin`))) left join `m_city` `city2` on((`city2`.`idm_city` = `m_route`.`destination`))) where (`m_route`.`soft_delete` = 0) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_shipment_arrival`
--
DROP TABLE IF EXISTS `vw_shipment_arrival`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_shipment_arrival`  AS  select `shipment_arrival`.`id_ship_arr` AS `id_ship_arr`,`shipment_arrival`.`id_doc` AS `id_doc`,`shipment_doc`.`seal_number` AS `seal_number`,`shipment_doc`.`size` AS `size`,`shipment_doc`.`ship_name` AS `ship_name`,`shipment_arrival`.`bl_number` AS `bl_number`,`shipment_arrival`.`bl_date` AS `bl_date`,`shipment_arrival`.`td` AS `td`,`shipment_arrival`.`weight` AS `weight`,`shipment_arrival`.`arrival_date` AS `arrival_date`,`shipment_arrival`.`unload_load_date` AS `unload_load_date` from (`shipment_arrival` left join `shipment_doc` on((`shipment_doc`.`id_doc` = `shipment_arrival`.`id_doc`))) where (`shipment_arrival`.`soft_delete` = '0') ;

-- --------------------------------------------------------

--
-- Structure for view `vw_shipment_doc`
--
DROP TABLE IF EXISTS `vw_shipment_doc`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_shipment_doc`  AS  select `shipment_doc`.`id_doc` AS `id_doc`,`shipment_doc`.`seal_number` AS `seal_number`,`shipment_doc`.`size` AS `size`,`shipment_doc`.`process_date` AS `process_date`,`m_option`.`subID` AS `idm_company`,`m_option`.`value` AS `company`,`shipment_doc`.`ba_recv_date` AS `ba_recv_date`,`m_agent`.`idm_agent` AS `idm_agent`,`m_agent`.`agent_name` AS `agent`,`m_city`.`idm_city` AS `idm_city`,`m_city`.`city_name` AS `origin_city`,`m_shipper`.`idm_shipper` AS `idm_shipper`,`m_shipper`.`debitur_name` AS `shipper`,`m_receiver`.`idm_receiver` AS `idm_receiver`,`m_receiver`.`receiver_name` AS `receiver`,`shipment_doc`.`report_num` AS `report_num`,`shipment_doc`.`safeconduct_num` AS `safeconduct_num`,`shipment_doc`.`po` AS `po`,`shipment_doc`.`do` AS `do`,`shipment_doc`.`io` AS `io`,`shipment_doc`.`condition` AS `kondisi`,`shipment_doc`.`product` AS `product`,`shipment_doc`.`stuffing` AS `stuffing`,`shipment_arrival`.`arrival_date` AS `ship_arrival_date`,`shipment_doc`.`ship_name` AS `ship_name`,`shipment_doc`.`file` AS `file`,`shipment_doc`.`done` AS `done` from ((((((`shipment_doc` left join `shipment_arrival` on((`shipment_arrival`.`id_doc` = `shipment_doc`.`id_doc`))) left join `m_option` on((`m_option`.`subID` = `shipment_doc`.`company`))) left join `m_agent` on((`m_agent`.`idm_agent` = `shipment_doc`.`id_agent`))) left join `m_city` on((`m_city`.`idm_city` = `shipment_doc`.`origin_city`))) left join `m_shipper` on((`m_shipper`.`idm_shipper` = `shipment_doc`.`id_shipper`))) left join `m_receiver` on((`m_receiver`.`idm_receiver` = `shipment_doc`.`id_receiver`))) where (`shipment_doc`.`soft_delete` = '0') ;

-- --------------------------------------------------------

--
-- Structure for view `vw_shipper`
--
DROP TABLE IF EXISTS `vw_shipper`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_shipper`  AS  select `m_shipper`.`idm_shipper` AS `idm_shipper`,`m_shipper`.`debitur_name` AS `debitur_name`,`m_shipper`.`address` AS `address`,`m_shipper`.`city` AS `city`,`m_shipper`.`pic` AS `pic`,`m_shipper`.`finance` AS `finance`,`m_shipper`.`telp` AS `telp`,`m_shipper`.`hp` AS `hp`,`m_shipper`.`fax` AS `fax`,`m_shipper`.`corporate_name` AS `corporate_name`,`m_bank`.`bank_name` AS `bank_name`,`m_shipper`.`account_number` AS `account_number` from (`m_shipper` left join `m_bank` on((`m_shipper`.`id_bank` = `m_bank`.`idm_bank`))) where (`m_shipper`.`soft_delete` = '0') ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `demurage`
--
ALTER TABLE `demurage`
  ADD PRIMARY KEY (`id_demurage`);

--
-- Indexes for table `detention`
--
ALTER TABLE `detention`
  ADD PRIMARY KEY (`id_detention`);

--
-- Indexes for table `doring`
--
ALTER TABLE `doring`
  ADD PRIMARY KEY (`id_doring`),
  ADD UNIQUE KEY `safeconduct_num_UNIQUE` (`safeconduct_num`),
  ADD UNIQUE KEY `id_doc_UNIQUE` (`id_ship_arr`);

--
-- Indexes for table `doring_doc`
--
ALTER TABLE `doring_doc`
  ADD PRIMARY KEY (`id_doring_doc`),
  ADD UNIQUE KEY `id_doc_UNIQUE` (`id_doring`);

--
-- Indexes for table `escort_cost`
--
ALTER TABLE `escort_cost`
  ADD PRIMARY KEY (`id_escort_cost`);

--
-- Indexes for table `etc_cost`
--
ALTER TABLE `etc_cost`
  ADD PRIMARY KEY (`id_etc_cost`);

--
-- Indexes for table `freight_cost`
--
ALTER TABLE `freight_cost`
  ADD PRIMARY KEY (`id_freight_cost`);

--
-- Indexes for table `fuel_cost`
--
ALTER TABLE `fuel_cost`
  ADD PRIMARY KEY (`id_fuel_cost`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id_invoice`);

--
-- Indexes for table `labor_cost`
--
ALTER TABLE `labor_cost`
  ADD PRIMARY KEY (`id_labor_cost`);

--
-- Indexes for table `main_cost`
--
ALTER TABLE `main_cost`
  ADD PRIMARY KEY (`id_cost`);

--
-- Indexes for table `m_agent`
--
ALTER TABLE `m_agent`
  ADD PRIMARY KEY (`idm_agent`),
  ADD UNIQUE KEY `idm_agent_UNIQUE` (`idm_agent`);

--
-- Indexes for table `m_bank`
--
ALTER TABLE `m_bank`
  ADD PRIMARY KEY (`idm_bank`);

--
-- Indexes for table `m_city`
--
ALTER TABLE `m_city`
  ADD PRIMARY KEY (`idm_city`);

--
-- Indexes for table `m_container`
--
ALTER TABLE `m_container`
  ADD PRIMARY KEY (`idm_container`),
  ADD UNIQUE KEY `idm_container_UNIQUE` (`idm_container`),
  ADD UNIQUE KEY `container_number_UNIQUE` (`container_number`);

--
-- Indexes for table `m_driver`
--
ALTER TABLE `m_driver`
  ADD PRIMARY KEY (`idm_driver`),
  ADD UNIQUE KEY `idm_driver_UNIQUE` (`idm_driver`);

--
-- Indexes for table `m_option`
--
ALTER TABLE `m_option`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_receiver`
--
ALTER TABLE `m_receiver`
  ADD PRIMARY KEY (`idm_receiver`);

--
-- Indexes for table `m_route`
--
ALTER TABLE `m_route`
  ADD PRIMARY KEY (`idm_route`),
  ADD UNIQUE KEY `idm_salary_UNIQUE` (`idm_route`);

--
-- Indexes for table `m_ship`
--
ALTER TABLE `m_ship`
  ADD PRIMARY KEY (`idm_ship`);

--
-- Indexes for table `m_shipper`
--
ALTER TABLE `m_shipper`
  ADD PRIMARY KEY (`idm_shipper`),
  ADD UNIQUE KEY `idm_customer_UNIQUE` (`idm_shipper`);

--
-- Indexes for table `m_truck`
--
ALTER TABLE `m_truck`
  ADD PRIMARY KEY (`idm_truck`),
  ADD UNIQUE KEY `plate_number_UNIQUE` (`plate_number`),
  ADD UNIQUE KEY `truck_code_UNIQUE` (`truck_code`);

--
-- Indexes for table `other_cost`
--
ALTER TABLE `other_cost`
  ADD PRIMARY KEY (`id_other_cost`);

--
-- Indexes for table `oth_vch_cost`
--
ALTER TABLE `oth_vch_cost`
  ADD PRIMARY KEY (`id_vch_cost`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id_payment`);

--
-- Indexes for table `shipment_arrival`
--
ALTER TABLE `shipment_arrival`
  ADD PRIMARY KEY (`id_ship_arr`);

--
-- Indexes for table `shipment_doc`
--
ALTER TABLE `shipment_doc`
  ADD PRIMARY KEY (`id_doc`);

--
-- Indexes for table `ss_labor_cost`
--
ALTER TABLE `ss_labor_cost`
  ADD PRIMARY KEY (`id_labor_cost`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `demurage`
--
ALTER TABLE `demurage`
  MODIFY `id_demurage` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detention`
--
ALTER TABLE `detention`
  MODIFY `id_detention` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doring`
--
ALTER TABLE `doring`
  MODIFY `id_doring` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `doring_doc`
--
ALTER TABLE `doring_doc`
  MODIFY `id_doring_doc` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `escort_cost`
--
ALTER TABLE `escort_cost`
  MODIFY `id_escort_cost` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `etc_cost`
--
ALTER TABLE `etc_cost`
  MODIFY `id_etc_cost` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `freight_cost`
--
ALTER TABLE `freight_cost`
  MODIFY `id_freight_cost` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fuel_cost`
--
ALTER TABLE `fuel_cost`
  MODIFY `id_fuel_cost` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id_invoice` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `labor_cost`
--
ALTER TABLE `labor_cost`
  MODIFY `id_labor_cost` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `main_cost`
--
ALTER TABLE `main_cost`
  MODIFY `id_cost` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `m_agent`
--
ALTER TABLE `m_agent`
  MODIFY `idm_agent` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `m_bank`
--
ALTER TABLE `m_bank`
  MODIFY `idm_bank` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `m_city`
--
ALTER TABLE `m_city`
  MODIFY `idm_city` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `m_container`
--
ALTER TABLE `m_container`
  MODIFY `idm_container` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `m_driver`
--
ALTER TABLE `m_driver`
  MODIFY `idm_driver` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `m_option`
--
ALTER TABLE `m_option`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `m_receiver`
--
ALTER TABLE `m_receiver`
  MODIFY `idm_receiver` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `m_route`
--
ALTER TABLE `m_route`
  MODIFY `idm_route` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `m_ship`
--
ALTER TABLE `m_ship`
  MODIFY `idm_ship` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `m_shipper`
--
ALTER TABLE `m_shipper`
  MODIFY `idm_shipper` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `m_truck`
--
ALTER TABLE `m_truck`
  MODIFY `idm_truck` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `other_cost`
--
ALTER TABLE `other_cost`
  MODIFY `id_other_cost` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oth_vch_cost`
--
ALTER TABLE `oth_vch_cost`
  MODIFY `id_vch_cost` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id_payment` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shipment_arrival`
--
ALTER TABLE `shipment_arrival`
  MODIFY `id_ship_arr` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shipment_doc`
--
ALTER TABLE `shipment_doc`
  MODIFY `id_doc` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ss_labor_cost`
--
ALTER TABLE `ss_labor_cost`
  MODIFY `id_labor_cost` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;



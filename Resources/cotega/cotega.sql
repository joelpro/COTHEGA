-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 11, 2019 at 06:45 PM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cotega`
--

-- --------------------------------------------------------

--
-- Table structure for table `block`
--

CREATE TABLE IF NOT EXISTS `block` (
  `block_id` int(11) NOT NULL AUTO_INCREMENT,
  `block_name` varchar(75) NOT NULL,
  `site_id` int(11) NOT NULL,
  PRIMARY KEY (`block_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=52 ;

--
-- Dumping data for table `block`
--

INSERT INTO `block` (`block_id`, `block_name`, `site_id`) VALUES
(1, 'Budacya', 1),
(2, 'Budacya B', 1),
(3, 'Cyarubara', 1),
(4, 'Cyarugamba', 1),
(5, 'Gashereganyo', 1),
(6, 'Gatiti', 1),
(7, 'Kabuga', 1),
(8, 'Kavumu A', 1),
(9, 'kavumu B', 1),
(10, 'Makuyuni A', 1),
(11, 'Makuyuni B', 1),
(12, 'Ruhengeri A', 1),
(13, 'Ruhengeri B', 1),
(14, 'Makuyuni C', 1),
(15, 'Rwankero', 1),
(16, 'Uwabahawe', 1),
(17, 'Uwakiribori', 1),
(18, 'Rugogwe', 1),
(19, 'Winganzo', 1),
(20, 'kabari A', 2),
(21, 'kabari B', 2),
(22, 'Kanyabushishi', 2),
(23, 'Makukuri A', 2),
(24, 'Makukuri B', 2),
(25, 'Makukuri C', 2),
(26, 'Ntumba', 2),
(27, 'Rwaramba A', 2),
(28, 'Rwaramba B', 2),
(29, 'Rwaramba C', 2),
(30, 'Ryaruburi A', 2),
(31, 'Ryabuburi B', 2),
(32, 'Ryabuburi C', 2),
(33, 'Wumwufe', 2),
(34, 'Bugarama', 3),
(35, 'Cyakarigenzi', 3),
(36, 'Kabarore', 3),
(37, 'Kajagazi', 3),
(38, 'Kamena', 3),
(39, 'Kibuburo', 3),
(40, 'Makoko', 3),
(41, 'Mbuga', 3),
(42, 'Nduruma', 3),
(43, 'Nyarutoyi', 3),
(44, 'Ruhanga', 3),
(45, 'Rushahaga', 3),
(46, 'Rutiti A', 3),
(47, 'Rutiti B', 3),
(48, 'Ruyove', 3),
(49, 'Rwanzoka', 3),
(50, 'Uwimana', 3),
(51, 'Uwimvumu', 3);

-- --------------------------------------------------------

--
-- Table structure for table `board`
--

CREATE TABLE IF NOT EXISTS `board` (
  `ssn` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(75) DEFAULT NULL,
  `lastname` varchar(75) DEFAULT NULL,
  `gender` varchar(75) DEFAULT NULL,
  `telephone` varchar(10) DEFAULT NULL,
  `DOB` varchar(75) DEFAULT NULL,
  `position` varchar(45) DEFAULT NULL,
  `pin` int(11) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'Deactivited',
  PRIMARY KEY (`ssn`),
  UNIQUE KEY `pin` (`pin`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `board`
--

INSERT INTO `board` (`ssn`, `firstname`, `lastname`, `gender`, `telephone`, `DOB`, `position`, `pin`, `status`) VALUES
(8, 'Mukama', 'didier', 'M', '0783427856', '1/1/1990', 'Encadeur', 3817, 'Activated'),
(6, 'Mpuhumuza', 'pierro', 'M', '0723456668', '12/07/2017', 'Accountant', 3456, 'Activated'),
(7, 'Mirimo', 'john Baptist', 'M', '0784356789', '1/8/1985', 'Data collection', 7224, 'Activated'),
(3, 'kaniga', 'jean paul', 'M', '0723456568', '15/06/2017', 'Data collection', 2345, 'Activated'),
(1, 'Manzi', 'pogba', 'M', '0788452345', '12/06/2017', 'Manager', 1234, 'Activated'),
(2, 'Mulisa1', 'paul', 'M', '0723456568', '12/06/2017', 'Manager', 8918, 'Deleted'),
(9, 'Kalisa virgal', 'james', 'M', '0723755677', '28/5/2002', 'Encadeur', 9890, 'Activated'),
(10, 'Mugabo', 'philemon', 'M', '0723360457', '1/8/1994', 'Encadeur', 1494, 'Activated');

-- --------------------------------------------------------

--
-- Table structure for table `charges`
--

CREATE TABLE IF NOT EXISTS `charges` (
  `charge_id` int(11) NOT NULL AUTO_INCREMENT,
  `fertilizer` int(11) DEFAULT '0',
  `union_federation` int(11) DEFAULT '0',
  `transport` int(11) DEFAULT '0',
  `management_fees` int(11) DEFAULT '0',
  `REA` int(11) DEFAULT '0',
  `nursery` int(11) DEFAULT '0',
  `musa` int(11) DEFAULT '0',
  `tax` int(11) DEFAULT '0',
  `public_support` int(11) DEFAULT '0',
  `pluckers` int(11) DEFAULT '0',
  `general_activity` int(11) DEFAULT '0',
  `BRD_credit` int(11) DEFAULT '0',
  `agaciro_DF` int(11) DEFAULT '0',
  `part_social` int(11) DEFAULT '0',
  `Unit_price` int(11) NOT NULL DEFAULT '0',
  `term` varchar(45) NOT NULL,
  `year` int(11) NOT NULL,
  PRIMARY KEY (`charge_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `charges`
--

INSERT INTO `charges` (`charge_id`, `fertilizer`, `union_federation`, `transport`, `management_fees`, `REA`, `nursery`, `musa`, `tax`, `public_support`, `pluckers`, `general_activity`, `BRD_credit`, `agaciro_DF`, `part_social`, `Unit_price`, `term`, `year`) VALUES
(1, 40, 3, 10, 3, 1, 3, 7, 3, 0, 0, 3, 43, 2, 5, 0, 'A', 2016),
(2, 40, 3, 10, 14, 1, 1, 7, 3, 4, 0, 8, 5, 2, 0, 0, 'B', 2016),
(3, 40, 5, 8, 2, 1, 1, 6, 3, 4, 0, 3, 5, 2, 4, 0, 'C', 2016),
(4, 34, 3, 8, 3, 1, 3, 7, 3, 0, 1, 4, 5, 3, 0, 0, 'D', 2016),
(5, 34, 3, 10, 14, 1, 1, 7, 3, 0, 0, 3, 5, 2, 5, 0, 'A', 2017),
(6, 36, 2, 5, 8, 3, 1, 5, 3, 0, 1, 4, 5, 2, 0, 0, 'B', 2017),
(7, 35, 1, 5, 3, 1, 1, 5, 3, 0, 1, 3, 5, 2, 4, 0, 'C', 2017),
(8, 40, 3, 5, 3, 1, 1, 7, 3, 4, 1, 3, 5, 0, 0, 0, 'D', 2017),
(9, 40, 3, 5, 3, 1, 3, 7, 3, 0, 0, 3, 43, 2, 5, 0, 'A', 2018),
(10, 36, 5, 5, 14, 3, 3, 7, 3, 0, 1, 4, 5, 3, 4, 0, 'B', 2018),
(11, 40, 2, 5, 3, 3, 3, 7, 3, 0, 0, 3, 5, 2, 5, 0, 'C', 2018),
(12, 40, 3, 5, 2, 3, 3, 7, 3, 0, 1, 3, 5, 2, 5, 0, 'D', 2018),
(13, 4, 5, 12, 3, 6, 4, 3, 23, 2, 3, 4, 3, 10, 5, 400, 'A', 2019);

-- --------------------------------------------------------

--
-- Table structure for table `cultivator`
--

CREATE TABLE IF NOT EXISTS `cultivator` (
  `number` int(11) NOT NULL,
  `firstname` varchar(75) NOT NULL,
  `lastname` varchar(75) NOT NULL,
  `gender` varchar(7) NOT NULL,
  `account` varchar(75) NOT NULL,
  `identity` varchar(17) NOT NULL,
  `phone_number` varchar(10) NOT NULL,
  `sec_id` int(11) NOT NULL,
  `cell` varchar(100) NOT NULL,
  `village` varchar(100) NOT NULL,
  `block_id` int(11) NOT NULL,
  `status` varchar(12) NOT NULL DEFAULT 'Available',
  PRIMARY KEY (`number`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cultivator`
--

INSERT INTO `cultivator` (`number`, `firstname`, `lastname`, `gender`, `account`, `identity`, `phone_number`, `sec_id`, `cell`, `village`, `block_id`, `status`) VALUES
(2530, 'TWISHIMANE', 'David', 'M', '0046748299999', '1198080067312095', '0784890942', 3, 'Mutongo', 'Ryagatari', 33, 'Available'),
(3386, 'NIYOMUGABO', 'Jean Bosco', 'M', '089', '1198980068679044', '0788775582', 3, 'kabuga', 'gatego', 1, 'Available'),
(8526, 'Uwineza ', 'Joella', 'F', '0044', '1198980068679046', '0786564356', 15, 'kayove', 'mulindi', 1, 'Available'),
(6739, 'Muhawenimana ', 'Jeaninne', 'M', '089', '1198970268679044', '0789775582', 19, 'Mutongo', 'kabari', 23, 'Available'),
(35, 'Twahirwa ', 'Evariste', 'M', '0896', '1198080067392095', '0785690942', 19, 'Mutongo', 'mulindi', 40, 'Available'),
(1721, 'Kamariza', 'Joly', 'F', '5896', '1198070068312097', '0784890945', 20, 'Ruganda', 'Ruganda', 23, 'Available'),
(1940, 'Uzamukunda', 'Leonilla', 'F', '004674829', '1198070345312095', '0787875582', 18, 'kabuga', 'Rudaga', 20, 'Available'),
(4622, 'kazubwenge', 'Esilon', 'M', '04267482999', '1198780068679046', '0789897942', 16, 'Mwezi', 'karengera', 1, 'Available'),
(6393, 'Utamuriza ', 'Joeuse', 'F', '4567', '1199270067392095', '0789690942', 17, 'Kagarama', 'Mburabuturo', 1, 'Available'),
(7547, 'Uzamukunda', 'Elevanie', 'F', '6778', '1198970345312095', '0785643238', 17, 'kabuga', 'gatega', 1, 'Available'),
(6082, 'Ndikubwimana', 'Esilon', 'M', '005', '1198780068679044', '0788890945', 3, 'NyakabingoO', 'Nyarunombe', 1, 'Available'),
(8483, 'Sikobihora', 'Mariroza', 'F', '6745', '1197701234567898', '0786543211', 1, 'Vugangoma', 'Kigandi', 34, 'Available'),
(2970, 'Maniriho', 'Alpha jubu', 'M', '2346', '1197680123455678', '0734526758', 1, 'Vugangoma', 'Kagarama', 35, 'Available'),
(3282, 'Ntigurirwa ', 'Uzziel', 'M', '2341', '1198080034256871', '0722345129', 3, 'Vugangoma', 'kirambira', 1, 'Available'),
(3560, 'Uzabakiriho', 'Perussi', 'M', '2135', '1198070068312801', '0781098703', 4, 'Mugonero', 'Cyiya', 1, 'Available'),
(383, 'Komezusenge', 'Samwel', 'M', '0076', '1198680065312091', '0722456387', 3, 'Mutongo', 'Nyabihanga', 1, 'Available'),
(1458, 'Ndirabika', 'Elias', 'M', '098', '119870008236786', '0788654328', 3, 'Mutongo', 'Ryarugamba', 1, 'Available'),
(8542, 'Uzabiriza', 'Chantal', 'F', '096', '1198970168312097', '0723456897', 3, 'Mutongo', 'Rupango', 20, 'Available'),
(5247, 'Itangishaka', 'Charilotte', 'F', '54640', '1198070145312065', '0734890945', 3, 'Mutongo', 'Nyabihanga', 20, 'Available'),
(3426, 'Imanishimwe', 'Isabelle', 'F', '0046748', '1198070005312095', '0724890942', 3, 'Gatare', 'Wimana', 21, 'Available'),
(6170, 'Usanase', 'Guvenard', 'M', '0898', '1198280067312095', '0785775582', 3, 'Gatare', 'Ryasagahara', 36, 'Available'),
(9467, 'TWISHIMANE', 'Yuditha', 'F', '00467482', '1198070067312095', '0783890942', 3, 'Gatare', 'Peru', 1, 'Available'),
(3942, 'Uzarukunda', 'Epifanie', 'M', '069', '1198570007312095', '0729775582', 19, 'Gatare', 'Wimana', 37, 'Available'),
(6313, 'Uwineza ', 'Immacule', 'F', '0043', '1198070168312097', '0723560356', 3, 'Vugangoma', 'Kagarama', 38, 'Available'),
(1255, 'Muhawenimana', 'Jean Bosco', 'M', '00467482', '1198680057312095', '0789890942', 3, 'Nyakabingo', 'Nyarunombe', 22, 'Available'),
(2054, 'Twahirwa ', 'Sytivin', 'M', '2333', '1198780008679044', '0785564356', 3, 'Mutongo', 'Karamba', 1, 'Available'),
(9226, 'Muhawenayo ', 'Ephrasie', 'F', '543', '1198070068309097', '0722264356', 3, 'Vugangoma', 'Kagarama', 39, 'Available'),
(4778, 'Uwineza ', 'Margon Diane', 'F', '1467', '1198470068312032', '0789775582', 7, 'Mutongo', 'Nyabihanga', 23, 'Available'),
(9754, 'Maniriho', 'Evrado', 'F', '1236', '1199934555555555', '0787566477', 18, 'Karusharirizi', 'Mutonzi', 18, 'Available'),
(6978, 'Mizero', 'Nadia', 'F', '4563', '1198680070652320', '0723465768', 15, 'Mutongo', 'Ryagatari', 1, 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE IF NOT EXISTS `district` (
  `dist_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(75) NOT NULL DEFAULT '',
  PRIMARY KEY (`dist_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`dist_id`, `name`) VALUES
(18, 'Bugesera'),
(11, 'Gakenke'),
(21, 'Gasabo'),
(10, 'Gicumbi'),
(25, 'Gisagara'),
(27, 'Huye'),
(2, 'Kamonyi'),
(5, 'Karongi'),
(19, 'Kayonza'),
(1, 'Kicukiro'),
(16, 'Kirehe'),
(22, 'Muhanga'),
(13, 'Musanze'),
(14, 'Ngoma'),
(7, 'Ngororero'),
(9, 'Nyabihu'),
(15, 'Nyagatare'),
(28, 'Nyamagabe'),
(3, 'Nyamasheke'),
(24, 'Nyanza'),
(20, 'Nyarugenge'),
(26, 'Nyaruguru'),
(8, 'Rubavu'),
(23, 'Ruhanga'),
(12, 'Rurindo'),
(4, 'Rusizi'),
(6, 'Rutsiro'),
(17, 'Rwamagana'),
(29, 'Gatsibo');

-- --------------------------------------------------------

--
-- Table structure for table `guardian`
--

CREATE TABLE IF NOT EXISTS `guardian` (
  `lastname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `national_id` varchar(16) NOT NULL,
  `telephone` varchar(10) NOT NULL,
  `cell` varchar(50) NOT NULL,
  `village` varchar(50) NOT NULL,
  `sec_id` int(5) NOT NULL,
  `number` int(11) NOT NULL,
  KEY `number` (`number`),
  KEY `sec_id` (`sec_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `guardian`
--

INSERT INTO `guardian` (`lastname`, `firstname`, `gender`, `national_id`, `telephone`, `cell`, `village`, `sec_id`, `number`) VALUES
('Jacqueline', 'Twiringiyimana', 'F', '1199877465453543', '0784454232', 'Mwezi', 'Mwezi', 11, 9754),
('joseph', 'Twizere1', 'M', '1199956343567890', '0784454132', 'Mwezi', 'Mwezi', 17, 2530),
('James', 'Muhumurize', 'M', '1190988777866874', '0783467885', 'kabuga', 'kabuga', 17, 3942),
('James', 'Muhumurize', 'M', '1190988777866874', '0783467885', 'kabuga', 'kabuga', 17, 3942),
('James', 'Muhumurize', 'M', '1190988777866874', '0783467885', 'kabuga', 'kabuga', 17, 3942),
('James', 'Muhumurize', 'M', '1190988777866874', '0783467885', '17', 'kabuga', 0, 3942),
('Joel', 'UWINEZA', 'M', '1190988570866874', '0783423455', '16', 'kabuga', 0, 4778);

-- --------------------------------------------------------

--
-- Table structure for table `harvesting`
--

CREATE TABLE IF NOT EXISTS `harvesting` (
  `harvest_id` int(11) NOT NULL AUTO_INCREMENT,
  `quantity` int(11) NOT NULL,
  `charge_id` int(11) NOT NULL,
  `take_home` int(11) NOT NULL,
  `musa` int(11) NOT NULL,
  `cultivator` int(11) NOT NULL,
  `Date` int(3) NOT NULL,
  `Month` int(11) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'Pend',
  PRIMARY KEY (`harvest_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=145 ;

--
-- Dumping data for table `harvesting`
--

INSERT INTO `harvesting` (`harvest_id`, `quantity`, `charge_id`, `take_home`, `musa`, `cultivator`, `Date`, `Month`, `status`) VALUES
(1, 35, 1, 17885, 3000, 4292, 0, 0, 'Pend'),
(2, 30, 1, 3330, 3000, 8416, 0, 0, 'Pend'),
(3, 23, 1, 4853, 3000, 4292, 0, 0, 'Pend'),
(4, 20, 1, 2220, 3000, 4292, 0, 0, 'Pend'),
(6, 20, 4, 6620, 400, 8416, 0, 0, 'Pend'),
(7, 789, 1, 100203, 5523, 6739, 0, 0, 'Pend'),
(8, 890, 1, 113030, 6230, 6739, 0, 0, 'Pend'),
(9, 1234, 1, 156718, 8638, 8483, 0, 0, 'Paid'),
(10, 345, 2, 69690, 2415, 8483, 0, 0, 'Paid'),
(11, 789, 3, 174369, 4734, 8483, 0, 0, 'Paid'),
(12, 1234, 4, 289990, 8638, 8483, 0, 0, 'Paid'),
(13, 1234, 5, 261608, 8638, 8483, 0, 0, 'Paid'),
(14, 2345, 6, 551075, 11725, 8483, 0, 0, 'Paid'),
(15, 1234, 7, 309734, 6170, 8483, 0, 0, 'Paid'),
(16, 1234, 8, 303564, 8638, 8483, 0, 0, 'Paid'),
(17, 1234, 9, 251736, 8638, 8483, 0, 0, 'Paid'),
(18, 789, 10, 179103, 5523, 8483, 0, 0, 'Paid'),
(19, 1234, 11, 297394, 8638, 8483, 0, 0, 'Paid'),
(20, 1235, 12, 300105, 8645, 8483, 0, 0, 'Paid'),
(21, 789, 1, 100203, 5523, 383, 0, 0, 'Paid'),
(22, 300, 1, 38100, 2100, 1458, 0, 0, 'Paid'),
(23, 240, 1, 30480, 1680, 2054, 0, 0, 'Paid'),
(24, 890, 1, 113030, 6230, 3282, 0, 0, 'Paid'),
(25, 345, 1, 43815, 2415, 3386, 0, 0, 'Paid'),
(26, 300, 1, 38100, 2100, 3560, 0, 0, 'Paid'),
(27, 453, 1, 57531, 3171, 4622, 0, 0, 'Pend'),
(28, 1234, 1, 156718, 8638, 383, 0, 0, 'Paid'),
(29, 789, 1, 100203, 5523, 6082, 0, 0, 'Paid'),
(30, 323, 1, 41021, 2261, 6082, 0, 0, 'Paid'),
(31, 347, 1, 44069, 2429, 6393, 0, 0, 'Paid'),
(32, 345, 1, 43815, 2415, 7547, 0, 0, 'Pend'),
(33, 789, 1, 100203, 5523, 8526, 0, 0, 'Paid'),
(34, 1241, 1, 157607, 8687, 9467, 0, 0, 'Paid'),
(35, 345, 2, 69690, 2415, 383, 0, 0, 'Paid'),
(36, 234, 2, 47268, 1638, 2054, 0, 0, 'Paid'),
(37, 789, 2, 159378, 5523, 3386, 0, 0, 'Paid'),
(38, 324, 2, 65448, 2268, 4622, 0, 0, 'Pend'),
(39, 1234, 2, 249268, 8638, 6393, 0, 0, 'Paid'),
(40, 453, 2, 91506, 3171, 7547, 0, 0, 'Pend'),
(41, 300, 2, 60600, 2100, 7547, 0, 0, 'Pend'),
(42, 789, 2, 159378, 5523, 383, 0, 0, 'Paid'),
(43, 1234, 3, 266544, 7404, 1458, 0, 0, 'Paid'),
(44, 789, 3, 170424, 4734, 2054, 0, 0, 'Paid'),
(45, 1241, 3, 268056, 7446, 3282, 0, 0, 'Paid'),
(46, 240, 3, 51840, 1440, 3560, 0, 0, 'Paid'),
(47, 789, 3, 170424, 4734, 6082, 0, 0, 'Paid'),
(48, 300, 3, 64800, 1800, 7547, 0, 0, 'Pend'),
(49, 1234, 3, 266544, 7404, 9467, 0, 0, 'Paid'),
(50, 789, 3, 170424, 4734, 8526, 0, 0, 'Paid'),
(51, 455, 4, 106925, 3185, 383, 0, 0, 'Paid'),
(52, 567, 4, 133245, 3969, 1458, 0, 0, 'Paid'),
(53, 1234, 4, 289990, 8638, 2054, 0, 0, 'Paid'),
(54, 240, 4, 56400, 1680, 3560, 0, 0, 'Paid'),
(55, 786, 4, 184710, 5502, 3386, 0, 0, 'Paid'),
(56, 45, 4, 10575, 315, 4622, 0, 0, 'Pend'),
(57, 753, 4, 176955, 5271, 9467, 0, 0, 'Paid'),
(58, 187, 4, 43945, 1309, 383, 0, 0, 'Paid'),
(59, 129, 4, 30315, 903, 7547, 0, 0, 'Pend'),
(60, 234, 5, 51948, 1638, 383, 0, 0, 'Paid'),
(61, 456, 5, 101232, 3192, 1458, 0, 0, 'Paid'),
(62, 346, 5, 76812, 2422, 2054, 0, 0, 'Paid'),
(63, 1234, 5, 273948, 8638, 3282, 0, 0, 'Paid'),
(64, 789, 5, 175158, 5523, 3386, 0, 0, 'Paid'),
(65, 300, 5, 66600, 2100, 3560, 0, 0, 'Paid'),
(66, 240, 5, 53280, 1680, 6393, 0, 0, 'Paid'),
(67, 345, 5, 76590, 2415, 7547, 0, 0, 'Pend'),
(68, 890, 5, 197580, 6230, 383, 0, 0, 'Paid'),
(69, 564, 6, 139308, 2820, 1458, 0, 0, 'Paid'),
(70, 789, 6, 194883, 3945, 2054, 0, 0, 'Paid'),
(71, 240, 6, 59280, 1200, 3282, 0, 0, 'Paid'),
(72, 300, 6, 74100, 1500, 3386, 0, 0, 'Paid'),
(73, 300, 6, 74100, 1500, 4622, 0, 0, 'Pend'),
(74, 345, 6, 85215, 1725, 6082, 0, 0, 'Paid'),
(75, 240, 6, 59280, 1200, 8526, 0, 0, 'Paid'),
(76, 345, 6, 85215, 1725, 9467, 0, 0, 'Paid'),
(77, 765, 7, 194310, 3825, 383, 0, 0, 'Paid'),
(78, 300, 7, 76200, 1500, 1458, 0, 0, 'Paid'),
(79, 890, 7, 226060, 4450, 2054, 0, 0, 'Paid'),
(80, 123, 7, 31242, 615, 3282, 0, 0, 'Paid'),
(81, 125, 7, 31750, 625, 383, 0, 0, 'Paid'),
(82, 178, 7, 45212, 890, 3386, 0, 0, 'Paid'),
(83, 90, 7, 22860, 450, 4622, 0, 0, 'Pend'),
(84, 678, 7, 172212, 3390, 4622, 0, 0, 'Pend'),
(85, 789, 8, 194094, 5523, 383, 0, 0, 'Paid'),
(86, 300, 8, 73800, 2100, 1458, 0, 0, 'Paid'),
(87, 345, 8, 84870, 2415, 2054, 0, 0, 'Paid'),
(88, 567, 8, 139482, 3969, 3282, 0, 0, 'Paid'),
(89, 123, 8, 30258, 861, 3386, 0, 0, 'Paid'),
(90, 240, 8, 59040, 1680, 3560, 0, 0, 'Paid'),
(91, 300, 8, 73800, 2100, 4622, 0, 0, 'Pend'),
(92, 125, 8, 30750, 875, 6082, 0, 0, 'Paid'),
(93, 178, 8, 43788, 1246, 6393, 0, 0, 'Paid'),
(94, 129, 8, 31734, 903, 7547, 0, 0, 'Pend'),
(95, 240, 8, 59040, 1680, 8526, 0, 0, 'Paid'),
(96, 345, 8, 84870, 2415, 9467, 0, 0, 'Paid'),
(97, 189, 9, 34776, 1323, 383, 0, 0, 'Paid'),
(98, 789, 9, 145176, 5523, 1458, 0, 0, 'Paid'),
(99, 34, 9, 6256, 238, 2054, 0, 0, 'Paid'),
(100, 249, 9, 45816, 1743, 3282, 0, 0, 'Paid'),
(101, 789, 9, 145176, 5523, 3386, 0, 0, 'Paid'),
(102, 306, 9, 56304, 2142, 3560, 0, 0, 'Paid'),
(103, 300, 9, 55200, 2100, 6082, 0, 0, 'Paid'),
(104, 345, 9, 63480, 2415, 6393, 0, 0, 'Paid'),
(105, 345, 9, 63480, 2415, 6393, 0, 0, 'Paid'),
(106, 300, 9, 55200, 2100, 8526, 0, 0, 'Paid'),
(107, 890, 9, 163760, 6230, 9467, 0, 0, 'Paid'),
(108, 188, 10, 43428, 1316, 383, 0, 0, 'Paid'),
(109, 300, 10, 69300, 2100, 2054, 0, 0, 'Paid'),
(110, 789, 10, 182259, 5523, 3386, 0, 0, 'Paid'),
(111, 345, 10, 79695, 2415, 4622, 0, 0, 'Pend'),
(112, 345, 10, 79695, 2415, 6393, 0, 0, 'Paid'),
(113, 300, 10, 69300, 2100, 7547, 0, 0, 'Pend'),
(114, 340, 10, 78540, 2380, 9467, 0, 0, 'Paid'),
(115, 789, 11, 180681, 5523, 2054, 0, 0, 'Paid'),
(116, 76, 11, 17404, 532, 3282, 0, 0, 'Paid'),
(117, 198, 11, 45342, 1386, 3560, 0, 0, 'Paid'),
(118, 567, 11, 129843, 3969, 4622, 0, 0, 'Pend'),
(119, 300, 11, 68700, 2100, 6393, 0, 0, 'Paid'),
(120, 240, 11, 54960, 1680, 7547, 0, 0, 'Pend'),
(121, 234, 11, 53586, 1638, 8526, 0, 0, 'Paid'),
(122, 367, 11, 84043, 2569, 9467, 0, 0, 'Paid'),
(123, 789, 12, 192516, 5523, 1458, 0, 0, 'Paid'),
(124, 300, 12, 73200, 2100, 2054, 0, 0, 'Paid'),
(125, 345, 12, 84180, 2415, 3282, 0, 0, 'Paid'),
(126, 345, 12, 84180, 2415, 3386, 0, 0, 'Paid'),
(127, 240, 12, 58560, 1680, 3560, 0, 0, 'Paid'),
(128, 197, 12, 48068, 1379, 4622, 0, 0, 'Pend'),
(129, 199, 12, 48556, 1393, 6082, 0, 0, 'Paid'),
(130, 123, 12, 30012, 861, 6082, 0, 0, 'Paid'),
(131, 129, 12, 31476, 903, 6393, 0, 0, 'Paid'),
(132, 235, 12, 57340, 1645, 7547, 0, 0, 'Pend'),
(133, 240, 12, 58560, 1680, 9467, 0, 0, 'Paid'),
(134, 34, 5, 8738, 238, 8483, 0, 0, 'Paid'),
(135, 456, 5, 117192, 3192, 8483, 0, 0, 'Paid'),
(136, 456, 9, 151392, 3192, 1940, 0, 0, 'Pend'),
(137, 456, 9, 151392, 3192, 8483, 0, 0, 'Paid'),
(138, 678, 9, 312558, 4746, 8483, 0, 0, 'Paid'),
(139, 12, 9, 5532, 84, 8483, 0, 0, 'Paid'),
(140, 29, 13, 9077, 60, 8483, 12, 7, 'Paid'),
(141, 679, 13, 212875, 2034, 8483, 14, 10, 'Paid'),
(142, 450, 13, 176085, 135, 8483, 14, 10, 'Paid'),
(143, 342, 13, 107046, 1026, 8483, 13, 3, 'Paid'),
(144, 400, 13, 125200, 1368, 8483, 13, 8, 'Paid');

-- --------------------------------------------------------

--
-- Table structure for table `sector`
--

CREATE TABLE IF NOT EXISTS `sector` (
  `sec_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `dist_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`sec_id`),
  KEY `dist_id_idx` (`dist_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `sector`
--

INSERT INTO `sector` (`sec_id`, `name`, `dist_id`) VALUES
(1, 'Nyarugunga', 1),
(2, 'kanombe', 1),
(3, 'Macuba', 3),
(4, 'Kirimbi', 3),
(5, 'Mahembe', 3),
(6, 'Gihombo', 3),
(7, 'Kanjongo', 3),
(8, 'Cyato', 3),
(9, 'Rangiro', 3),
(10, 'Kagano', 3),
(11, 'Ruharambuga', 3),
(12, 'Bushekeri', 3),
(13, 'Nyabitekeri', 3),
(14, 'Shangi', 3),
(15, 'Bushenge', 3),
(16, 'Karengera', 3),
(17, 'Karambi', 3),
(18, 'kamembe', 4),
(19, 'Giheke', 4),
(20, 'Gihundwe', 4),
(21, 'Nkanka', 4),
(22, 'Mururu', 4),
(23, 'Gashonga', 4),
(24, 'Bugarama', 4),
(25, 'Muganza', 4),
(26, 'Nyakarenzo', 4),
(27, 'Butare', 4),
(28, 'Bweyeye', 4),
(29, 'Gitambi', 4),
(30, 'Gikundamvura', 4),
(31, 'Nzahaha', 4),
(32, 'Nkombo', 4);

-- --------------------------------------------------------

--
-- Table structure for table `silent`
--

CREATE TABLE IF NOT EXISTS `silent` (
  `username` varchar(20) NOT NULL,
  `userkey` varchar(10) NOT NULL,
  `ssn` int(11) NOT NULL,
  UNIQUE KEY `ssn` (`ssn`),
  KEY `ssn_idx` (`ssn`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `silent`
--

INSERT INTO `silent` (`username`, `userkey`, `ssn`) VALUES
('Accountant', '2345', 6),
('Data Collection', '123', 3),
('mudidi', '12345', 8),
('vigal', 'james', 9);

-- --------------------------------------------------------

--
-- Table structure for table `site`
--

CREATE TABLE IF NOT EXISTS `site` (
  `site_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`site_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `site`
--

INSERT INTO `site` (`site_id`, `name`) VALUES
(1, 'Kavumu'),
(2, 'Mugomba '),
(3, 'Cyiya');

--
-- Dumping data for manager in table `board`
--

INSERT INTO `board` VALUES('1', 'Manager', 'manager', 'M/F', '0000000000', '0/0/0000', 'Manager', '0000', 'Activated');

--
-- Dumping data for manager in table `silent`
--

INSERT INTO `silent` VALUES('Manager', 'manager', '1');


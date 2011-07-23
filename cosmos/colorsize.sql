-- MySQL dump 10.9
--
-- Host: localhost    Database: yesusa
-- ------------------------------------------------------
-- Server version	4.1.10

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

--
-- Table structure for table `wiz_colorsize`
--

DROP TABLE IF EXISTS `wiz_colorsize`;
CREATE TABLE `wiz_colorsize` (
  `idx` int(10) NOT NULL auto_increment,
  `ProdInc` int(10) default NULL,
  `MallID` varchar(30) default NULL,
  `ColorTxt` varchar(50) default NULL,
  `BigImg` text,
  `SwatchImg` text,
  `ZoomImg1` text,
  `ZoomImg2` text,
  `SizeList` text,
  PRIMARY KEY  (`idx`),
  KEY `prdcode` (`ProdInc`)
);
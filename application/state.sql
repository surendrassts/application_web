-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 08, 2012 at 11:36 AM
-- Server version: 5.1.36-community-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dictionary`
--

-- --------------------------------------------------------

--
-- Table structure for table `uvw_country_states`
--
CREATE TABLE `state` (
`StateID` INT(11) NOT NULL AUTO_INCREMENT,
`CountryID` INT(11) NOT NULL,
`StateName` VARCHAR(50) NOT NULL,
`Notes` LONGTEXT,
`ChangedBy` VARCHAR(50) DEFAULT NULL,
`ChangeDate` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
PRIMARY KEY (`StateID`)
) 




INSERT INTO `state`(`StateID`,`CountryID`,`StateName`,`Notes`,`ChangedBy`,`ChangeDate`) VALUES ( NULL,'1','ANDHRA PRADESH',NULL,'Nieanjan',CURRENT_TIMESTAMP);
INSERT INTO `state`(`StateID`,`CountryID`,`StateName`,`Notes`,`ChangedBy`,`ChangeDate`) VALUES ( NULL,'1','ASSAM',NULL,'Nieanjan',CURRENT_TIMESTAMP);
INSERT INTO `state`(`StateID`,`CountryID`,`StateName`,`Notes`,`ChangedBy`,`ChangeDate`) VALUES ( NULL,'1','ARUNACHAL PRADESH',NULL,'Nieanjan',CURRENT_TIMESTAMP);
INSERT INTO `state`(`StateID`,`CountryID`,`StateName`,`Notes`,`ChangedBy`,`ChangeDate`) VALUES ( NULL,'1','GUJRAT',NULL,'Nieanjan',CURRENT_TIMESTAMP);
INSERT INTO `state`(`StateID`,`CountryID`,`StateName`,`Notes`,`ChangedBy`,`ChangeDate`) VALUES ( NULL,'1','BIHAR',NULL,'Nieanjan',CURRENT_TIMESTAMP);
INSERT INTO `state`(`StateID`,`CountryID`,`StateName`,`Notes`,`ChangedBy`,`ChangeDate`) VALUES ( NULL,'1','HARYANA',NULL,'Nieanjan',CURRENT_TIMESTAMP);
INSERT INTO `state`(`StateID`,`CountryID`,`StateName`,`Notes`,`ChangedBy`,`ChangeDate`) VALUES ( NULL,'1','HIMACHAL PRADESH',NULL,'Nieanjan',CURRENT_TIMESTAMP);
INSERT INTO `state`(`StateID`,`CountryID`,`StateName`,`Notes`,`ChangedBy`,`ChangeDate`) VALUES ( NULL,'1','JAMMU & KASHMIR',NULL,'Nieanjan',CURRENT_TIMESTAMP);
INSERT INTO `state`(`StateID`,`CountryID`,`StateName`,`Notes`,`ChangedBy`,`ChangeDate`) VALUES ( NULL,'1','KARNATAKA',NULL,'Nieanjan',CURRENT_TIMESTAMP);
INSERT INTO `state`(`StateID`,`CountryID`,`StateName`,`Notes`,`ChangedBy`,`ChangeDate`) VALUES ( NULL,'1','KERALA',NULL,'Nieanjan',CURRENT_TIMESTAMP);
INSERT INTO `state`(`StateID`,`CountryID`,`StateName`,`Notes`,`ChangedBy`,`ChangeDate`) VALUES ( NULL,'1','MADHYA PRADESH',NULL,'Nieanjan',CURRENT_TIMESTAMP);
INSERT INTO `state`(`StateID`,`CountryID`,`StateName`,`Notes`,`ChangedBy`,`ChangeDate`) VALUES ( NULL,'1','MAHARASHTRA',NULL,'Nieanjan',CURRENT_TIMESTAMP);
INSERT INTO `state`(`StateID`,`CountryID`,`StateName`,`Notes`,`ChangedBy`,`ChangeDate`) VALUES ( NULL,'1','MANIPUR',NULL,'Nieanjan',CURRENT_TIMESTAMP);
INSERT INTO `state`(`StateID`,`CountryID`,`StateName`,`Notes`,`ChangedBy`,`ChangeDate`) VALUES ( NULL,'1','MEGHALAYA',NULL,'Nieanjan',CURRENT_TIMESTAMP);
INSERT INTO `state`(`StateID`,`CountryID`,`StateName`,`Notes`,`ChangedBy`,`ChangeDate`) VALUES ( NULL,'1','MIZORAM',NULL,'Nieanjan',CURRENT_TIMESTAMP);
INSERT INTO `state`(`StateID`,`CountryID`,`StateName`,`Notes`,`ChangedBy`,`ChangeDate`) VALUES ( NULL,'1','NAGALAND',NULL,'Nieanjan',CURRENT_TIMESTAMP);
INSERT INTO `state`(`StateID`,`CountryID`,`StateName`,`Notes`,`ChangedBy`,`ChangeDate`) VALUES ( NULL,'1','ORISSA',NULL,'Nieanjan',CURRENT_TIMESTAMP);
INSERT INTO `state`(`StateID`,`CountryID`,`StateName`,`Notes`,`ChangedBy`,`ChangeDate`) VALUES ( NULL,'1','PUNJAB',NULL,'Nieanjan',CURRENT_TIMESTAMP);
INSERT INTO `state`(`StateID`,`CountryID`,`StateName`,`Notes`,`ChangedBy`,`ChangeDate`) VALUES ( NULL,'1','RAJASTHAN',NULL,'Nieanjan',CURRENT_TIMESTAMP);
INSERT INTO `state`(`StateID`,`CountryID`,`StateName`,`Notes`,`ChangedBy`,`ChangeDate`) VALUES ( NULL,'1','SIKKIM',NULL,'Nieanjan',CURRENT_TIMESTAMP);
INSERT INTO `state`(`StateID`,`CountryID`,`StateName`,`Notes`,`ChangedBy`,`ChangeDate`) VALUES ( NULL,'1','TAMIL NADU',NULL,'Nieanjan',CURRENT_TIMESTAMP);
INSERT INTO `state`(`StateID`,`CountryID`,`StateName`,`Notes`,`ChangedBy`,`ChangeDate`) VALUES ( NULL,'1','TRIPURA',NULL,'Nieanjan',CURRENT_TIMESTAMP);
INSERT INTO `state`(`StateID`,`CountryID`,`StateName`,`Notes`,`ChangedBy`,`ChangeDate`) VALUES ( NULL,'1','UTTAR PRADESH',NULL,'Nieanjan',CURRENT_TIMESTAMP);
INSERT INTO `state`(`StateID`,`CountryID`,`StateName`,`Notes`,`ChangedBy`,`ChangeDate`) VALUES ( NULL,'1','WEST BENGAL',NULL,'Nieanjan',CURRENT_TIMESTAMP);
INSERT INTO `state`(`StateID`,`CountryID`,`StateName`,`Notes`,`ChangedBy`,`ChangeDate`) VALUES ( NULL,'1','DELHI',NULL,'Nieanjan',CURRENT_TIMESTAMP);
INSERT INTO `state`(`StateID`,`CountryID`,`StateName`,`Notes`,`ChangedBy`,`ChangeDate`) VALUES ( NULL,'1','GOA',NULL,'Nieanjan',CURRENT_TIMESTAMP);
INSERT INTO `state`(`StateID`,`CountryID`,`StateName`,`Notes`,`ChangedBy`,`ChangeDate`) VALUES ( NULL,'1','PONDICHERY',NULL,'Nieanjan',CURRENT_TIMESTAMP);
INSERT INTO `state`(`StateID`,`CountryID`,`StateName`,`Notes`,`ChangedBy`,`ChangeDate`) VALUES ( NULL,'1','LAKSHDWEEP',NULL,'Nieanjan',CURRENT_TIMESTAMP);
INSERT INTO `state`(`StateID`,`CountryID`,`StateName`,`Notes`,`ChangedBy`,`ChangeDate`) VALUES ( NULL,'1','DAMAN & DIU',NULL,'Nieanjan',CURRENT_TIMESTAMP);
INSERT INTO `state`(`StateID`,`CountryID`,`StateName`,`Notes`,`ChangedBy`,`ChangeDate`) VALUES ( NULL,'1','DADRA & NAGAR',NULL,'Nieanjan',CURRENT_TIMESTAMP);
INSERT INTO `state`(`StateID`,`CountryID`,`StateName`,`Notes`,`ChangedBy`,`ChangeDate`) VALUES ( NULL,'1','CHANDIGARH',NULL,'Nieanjan',CURRENT_TIMESTAMP);
INSERT INTO `state`(`StateID`,`CountryID`,`StateName`,`Notes`,`ChangedBy`,`ChangeDate`) VALUES ( NULL,'1','ANDAMAN & NICOBAR',NULL,'Nieanjan',CURRENT_TIMESTAMP);
INSERT INTO `state`(`StateID`,`CountryID`,`StateName`,`Notes`,`ChangedBy`,`ChangeDate`) VALUES ( NULL,'1','UTTARANCHAL',NULL,'Nieanjan',CURRENT_TIMESTAMP);
INSERT INTO `state`(`StateID`,`CountryID`,`StateName`,`Notes`,`ChangedBy`,`ChangeDate`) VALUES ( NULL,'1','JHARKHAND',NULL,'Nieanjan',CURRENT_TIMESTAMP);
INSERT INTO `state`(`StateID`,`CountryID`,`StateName`,`Notes`,`ChangedBy`,`ChangeDate`) VALUES ( NULL,'1','CHATTISGARH',NULL,'Nieanjan',CURRENT_TIMESTAMP);
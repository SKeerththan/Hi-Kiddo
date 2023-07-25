-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 25, 2023 at 01:51 PM
-- Server version: 10.6.5-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hikiddo`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `organization` varchar(500) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`email`, `password`, `organization`) VALUES
('test', 'test', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `levelfive`
--

DROP TABLE IF EXISTS `levelfive`;
CREATE TABLE IF NOT EXISTS `levelfive` (
  `qId` int(11) NOT NULL AUTO_INCREMENT,
  `studentindexno` varchar(400) NOT NULL,
  `status` varchar(500) NOT NULL,
  `time` varchar(400) NOT NULL,
  PRIMARY KEY (`qId`)
) ENGINE=InnoDB AUTO_INCREMENT=98 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `levelfour`
--

DROP TABLE IF EXISTS `levelfour`;
CREATE TABLE IF NOT EXISTS `levelfour` (
  `qId` int(11) NOT NULL AUTO_INCREMENT,
  `studentindexno` varchar(500) NOT NULL,
  `status` varchar(400) NOT NULL,
  `time` varchar(400) NOT NULL,
  PRIMARY KEY (`qId`)
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `levelone`
--

DROP TABLE IF EXISTS `levelone`;
CREATE TABLE IF NOT EXISTS `levelone` (
  `qId` int(11) NOT NULL AUTO_INCREMENT,
  `studentindexno` varchar(500) NOT NULL,
  `status` varchar(10) NOT NULL,
  `time` varchar(50) NOT NULL,
  PRIMARY KEY (`qId`)
) ENGINE=InnoDB AUTO_INCREMENT=816 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `levelsix`
--

DROP TABLE IF EXISTS `levelsix`;
CREATE TABLE IF NOT EXISTS `levelsix` (
  `qId` int(11) NOT NULL AUTO_INCREMENT,
  `studentindexno` varchar(500) NOT NULL,
  `status` varchar(500) NOT NULL,
  `time` varchar(50) NOT NULL,
  PRIMARY KEY (`qId`)
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `levelthree`
--

DROP TABLE IF EXISTS `levelthree`;
CREATE TABLE IF NOT EXISTS `levelthree` (
  `qid` int(11) NOT NULL AUTO_INCREMENT,
  `studentindexno` varchar(500) NOT NULL,
  `status` varchar(400) NOT NULL,
  `time` varchar(400) NOT NULL,
  PRIMARY KEY (`qid`)
) ENGINE=InnoDB AUTO_INCREMENT=127 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `leveltwo`
--

DROP TABLE IF EXISTS `leveltwo`;
CREATE TABLE IF NOT EXISTS `leveltwo` (
  `qId` int(11) NOT NULL AUTO_INCREMENT,
  `studentindexno` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `time` varchar(200) NOT NULL,
  PRIMARY KEY (`qId`)
) ENGINE=InnoDB AUTO_INCREMENT=151 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `indexNo` varchar(200) NOT NULL,
  `name` varchar(900) NOT NULL,
  `age` varchar(900) NOT NULL,
  `gender` varchar(900) NOT NULL,
  `levelOne` varchar(900) NOT NULL DEFAULT '0',
  `levelTwo` varchar(900) NOT NULL DEFAULT '0',
  `levelThree` varchar(900) NOT NULL DEFAULT '0',
  `levelFour` varchar(900) NOT NULL DEFAULT '0',
  `levelFive` varchar(900) NOT NULL DEFAULT '0',
  `levelSix` varchar(900) NOT NULL DEFAULT '0',
  PRIMARY KEY (`indexNo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`indexNo`, `name`, `age`, `gender`, `levelOne`, `levelTwo`, `levelThree`, `levelFour`, `levelFive`, `levelSix`) VALUES
('001', 'kiddo', '77', 'Female', '0', '0', '0', '0', '0', '0');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 14, 2022 at 02:24 PM
-- Server version: 10.6.5-MariaDB
-- PHP Version: 7.4.26

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
('test@test.com', 'test', 'test');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `levelfive`
--

INSERT INTO `levelfive` (`qId`, `studentindexno`, `status`, `time`) VALUES
(1, '1', '1', '4'),
(2, '1', '1', '6');

-- --------------------------------------------------------

--
-- Table structure for table `levelfiveable`
--

DROP TABLE IF EXISTS `levelfiveable`;
CREATE TABLE IF NOT EXISTS `levelfiveable` (
  `qId` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(500) NOT NULL,
  `studentIndexNo` varchar(200) NOT NULL,
  `attemps` int(11) NOT NULL,
  `time` double NOT NULL,
  PRIMARY KEY (`qId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `levelfiveable`
--

INSERT INTO `levelfiveable` (`qId`, `question`, `studentIndexNo`, `attemps`, `time`) VALUES
(1, '1', '1', 23, 67),
(2, '1', '1', 6, 77);

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `levelfour`
--

INSERT INTO `levelfour` (`qId`, `studentindexno`, `status`, `time`) VALUES
(1, '1', '1', '4');

-- --------------------------------------------------------

--
-- Table structure for table `levelfourtable`
--

DROP TABLE IF EXISTS `levelfourtable`;
CREATE TABLE IF NOT EXISTS `levelfourtable` (
  `qId` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(500) NOT NULL,
  `studentIndexNo` varchar(200) NOT NULL,
  `attemps` int(11) NOT NULL,
  `time` double NOT NULL,
  PRIMARY KEY (`qId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `levelfourtable`
--

INSERT INTO `levelfourtable` (`qId`, `question`, `studentIndexNo`, `attemps`, `time`) VALUES
(1, '1', '1', 22, 333),
(2, '1', '1', 33, 2);

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
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `levelone`
--

INSERT INTO `levelone` (`qId`, `studentindexno`, `status`, `time`) VALUES
(49, '1', '1', '2'),
(50, '1', '1', '68'),
(51, '1', '1', '3'),
(52, '1', '0', '3'),
(53, '', '1', '5'),
(54, 'a', '1', '4'),
(55, '1', '1', '3'),
(56, '1', '1', '4');

-- --------------------------------------------------------

--
-- Table structure for table `levelonetable`
--

DROP TABLE IF EXISTS `levelonetable`;
CREATE TABLE IF NOT EXISTS `levelonetable` (
  `qId` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(500) NOT NULL,
  `studentIndexNo` varchar(200) NOT NULL,
  `attemps` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`qId`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `levelonetable`
--

INSERT INTO `levelonetable` (`qId`, `question`, `studentIndexNo`, `attemps`, `time`) VALUES
(27, '', '44', 4, 4);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `levelsix`
--

INSERT INTO `levelsix` (`qId`, `studentindexno`, `status`, `time`) VALUES
(1, 'a', '0', '3'),
(2, '1', '1', '4');

-- --------------------------------------------------------

--
-- Table structure for table `levelsixtable`
--

DROP TABLE IF EXISTS `levelsixtable`;
CREATE TABLE IF NOT EXISTS `levelsixtable` (
  `qId` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(500) NOT NULL,
  `studentIndexNo` varchar(200) NOT NULL,
  `attemps` int(11) NOT NULL,
  `time` double NOT NULL,
  PRIMARY KEY (`qId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `levelsixtable`
--

INSERT INTO `levelsixtable` (`qId`, `question`, `studentIndexNo`, `attemps`, `time`) VALUES
(1, '1', '1', 1, 9),
(2, '1', '1', 8, 4);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `levelthree`
--

INSERT INTO `levelthree` (`qid`, `studentindexno`, `status`, `time`) VALUES
(1, '1', '1', '2'),
(2, '1', '1', '4');

-- --------------------------------------------------------

--
-- Table structure for table `levelthreetable`
--

DROP TABLE IF EXISTS `levelthreetable`;
CREATE TABLE IF NOT EXISTS `levelthreetable` (
  `qId` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(500) NOT NULL,
  `studentIndexNo` varchar(200) NOT NULL,
  `attemps` int(11) NOT NULL,
  `time` double NOT NULL,
  PRIMARY KEY (`qId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `levelthreetable`
--

INSERT INTO `levelthreetable` (`qId`, `question`, `studentIndexNo`, `attemps`, `time`) VALUES
(1, '1', '1', 2, 2),
(2, '1', '1', 6, 67);

-- --------------------------------------------------------

--
-- Table structure for table `leveltwo`
--

DROP TABLE IF EXISTS `leveltwo`;
CREATE TABLE IF NOT EXISTS `leveltwo` (
  `qid` int(11) NOT NULL AUTO_INCREMENT,
  `studentindexno` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `time` varchar(200) NOT NULL,
  PRIMARY KEY (`qid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leveltwo`
--

INSERT INTO `leveltwo` (`qid`, `studentindexno`, `status`, `time`) VALUES
(1, '1', '1', '5'),
(2, '1', '1', '26');

-- --------------------------------------------------------

--
-- Table structure for table `leveltwotable`
--

DROP TABLE IF EXISTS `leveltwotable`;
CREATE TABLE IF NOT EXISTS `leveltwotable` (
  `qId` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(500) NOT NULL,
  `studentIndexNo` varchar(200) NOT NULL,
  `attemps` int(11) NOT NULL,
  `time` double NOT NULL,
  PRIMARY KEY (`qId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leveltwotable`
--

INSERT INTO `leveltwotable` (`qId`, `question`, `studentIndexNo`, `attemps`, `time`) VALUES
(1, '1', '1', 2, 3),
(2, '1', '1', 22, 1);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `indexNo` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `levelOne` int(11) NOT NULL DEFAULT 0,
  `levelTwo` int(11) NOT NULL DEFAULT 0,
  `levelThree` int(11) NOT NULL DEFAULT 0,
  `levelFour` int(11) NOT NULL DEFAULT 0,
  `levelFive` int(11) NOT NULL DEFAULT 0,
  `levelSix` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`indexNo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`indexNo`, `name`, `age`, `gender`, `levelOne`, `levelTwo`, `levelThree`, `levelFour`, `levelFive`, `levelSix`) VALUES
('1', 'a', 0, '', 0, 0, 0, 0, 0, 0),
('10', 'j', 0, '', 0, 0, 0, 0, 0, 0),
('2', 'b', 0, '', 0, 0, 0, 0, 0, 0),
('3', 'c', 0, '', 0, 0, 0, 0, 0, 0),
('4', 'd', 0, '', 0, 0, 0, 0, 0, 0),
('4444', 'ffff', 44, 'Female', 0, 0, 0, 0, 0, 0),
('5', 'e', 0, '', 0, 0, 0, 0, 0, 0),
('555', '55', 55, 'on', 0, 0, 0, 0, 0, 0),
('6', 'f', 0, '', 0, 0, 0, 0, 0, 0),
('66666', '666', 66, 'on', 0, 0, 0, 0, 0, 0),
('678', '123', 3, 'on', 0, 0, 0, 0, 0, 0),
('7', 'g', 0, '', 0, 0, 0, 0, 0, 0),
('8', 'h', 0, '', 0, 0, 0, 0, 0, 0),
('88', '88', 88, 'Male', 0, 0, 0, 0, 0, 0),
('9', 'i', 0, '', 0, 0, 0, 0, 0, 0),
('k', 'j', 8, 'Male', 0, 0, 0, 0, 0, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

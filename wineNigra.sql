-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 02, 2016 at 09:45 PM
-- Server version: 5.5.43-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wineNigra`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE IF NOT EXISTS `appointment` (
  `a_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_id` int(11) DEFAULT NULL,
  `num_vistor` int(11) DEFAULT NULL,
  `appointment_state` int(11) DEFAULT NULL,
  `winetaste_state` int(11) DEFAULT NULL,
  `visitegarden_state` int(11) DEFAULT NULL,
  `lunch_state` int(11) DEFAULT NULL,
  `appended` varchar(255) COLLATE gb2312_bin DEFAULT NULL,
  `start_date` date NOT NULL,
  `contact` text COLLATE gb2312_bin NOT NULL,
  `registerdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`a_id`),
  KEY `u_id` (`u_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=gb2312 COLLATE=gb2312_bin AUTO_INCREMENT=15 ;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`a_id`, `u_id`, `num_vistor`, `appointment_state`, `winetaste_state`, `visitegarden_state`, `lunch_state`, `appended`, `start_date`, `contact`, `registerdate`) VALUES
(1, 1, 2, 1, 0, 0, 0, '2', '2015-07-14', '2', '2015-07-24 15:58:58'),
(2, 1, 2, 1, 0, 0, 0, '2', '0000-00-00', '2', '2015-07-24 15:54:21'),
(3, 1, 2, 1, 0, 0, 0, '2', '0000-00-00', '2', '2015-07-24 15:55:02'),
(4, 1, 2, 1, 0, 0, 0, '2', '0000-00-00', '2', '2015-07-24 15:55:11'),
(5, 1, 2, 1, 0, 0, 0, '2', '0000-00-00', '2', '2015-07-24 15:55:13'),
(6, 1, 2, 1, 0, 0, 0, '2', '0000-00-00', '2', '2015-07-24 15:56:11'),
(7, 1, 2, 1, 0, 0, 0, '2', '0000-00-00', '2', '2015-07-24 15:56:14'),
(8, 1, 2, 1, 1, 1, 1, '2', '0000-00-00', '2', '2015-07-24 15:56:27'),
(9, 1, 2, 1, 1, 1, 1, '', '0000-00-00', '2', '2015-07-24 15:58:07'),
(10, 1, 2, 1, 1, 1, 1, '', '0000-00-00', '2', '2015-07-24 15:58:10'),
(11, 1, 2, 1, 1, 1, 1, '', '0000-00-00', '2', '2015-07-24 15:58:43'),
(12, 1, 2, 1, 1, 1, 1, '', '0000-00-00', '2', '2015-07-24 15:59:14'),
(13, 1, 1, 1, 1, 1, 1, '132', '2015-07-24', '2', '2015-07-24 16:02:00'),
(14, 1, 2, 1, 1, 1, 1, 'sfasdfasd', '2015-07-24', '9055555', '2015-07-25 01:21:15');

-- --------------------------------------------------------

--
-- Table structure for table `my_order`
--

CREATE TABLE IF NOT EXISTS `my_order` (
  `Oid` int(11) NOT NULL AUTO_INCREMENT,
  `Uid` int(11) DEFAULT NULL,
  `Pid` int(11) DEFAULT NULL,
  PRIMARY KEY (`Oid`),
  KEY `Pid` (`Pid`),
  KEY `Uid` (`Uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=131 ;

--
-- Dumping data for table `my_order`
--

INSERT INTO `my_order` (`Oid`, `Uid`, `Pid`) VALUES
(113, 1, 1),
(124, 1, 2),
(125, 1, 2),
(126, 1, 2),
(129, 15, 1),
(130, 15, 2);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `Pid` int(11) NOT NULL AUTO_INCREMENT,
  `PName` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Price` double NOT NULL,
  `designation` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `descripe` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `region` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`Pid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Pid`, `PName`, `Price`, `designation`, `descripe`, `region`) VALUES
(1, '威代尔白冰酒 375ml', 47.05, 'picture/375ml.bmp', '呈金黄色,澄清透亮有光泽度. 有着层次丰富的热带水果香气，入口后有杏子、梨和蜂蜜的芳香口感，风味独特,香甜却不腻喉,浓厚却又清新. 是一款可以与甜点搭配的餐后甜点酒.', 'VQA 尼亚加拉河岸产区'),
(2, '精选威代尔白冰酒 375ml', 180.1, 'picture/Grand Vidal Icewine.bmp', '有着浓厚的热带水果香气,酸甜度达到绝佳的平衡.这款精选白冰酒可以算得上世界最顶级的甜点酒.', 'VQA 尼亚加拉河岸产区'),
(3, '精选品丽珠红冰酒 375ml', 95, 'picture/375ml.png', '如玫瑰般艳丽的红宝石色泽,入口后有草莓酱,大红枣的独特回味.', 'VQA 尼亚加拉河岸产区');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE IF NOT EXISTS `user_info` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `UName` text NOT NULL,
  `Webchat` text NOT NULL,
  `Phonenumber` text NOT NULL,
  `password` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `email` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`),
  KEY `ID_2` (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`ID`, `UName`, `Webchat`, `Phonenumber`, `password`, `email`) VALUES
(1, 'Dude', '', '9053333212', '12345', 'dude@gmail.com'),
(7, 'hellow', '', '123456', 'ggg', 'yanbing@ssd.com'),
(10, 'asd', '', 'Enter your phone number here', 'asd', 'asd'),
(12, 'gaobili', '', '', '19999999', 'yanb asads '),
(15, 'sbb', '', 'sbb', 'sbb', 'sbb'),
(17, 'gyb', '', 'iiiii', 'gyb', 'lol'),
(18, 'gaobili', '', '123', 'gggggg', 'dsfasdf@gmail.com');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `user_info` (`ID`);

--
-- Constraints for table `my_order`
--
ALTER TABLE `my_order`
  ADD CONSTRAINT `my_order_ibfk_1` FOREIGN KEY (`Pid`) REFERENCES `product` (`Pid`),
  ADD CONSTRAINT `my_order_ibfk_2` FOREIGN KEY (`Uid`) REFERENCES `user_info` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

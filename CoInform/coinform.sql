-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 25, 2019 at 08:06 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coinform`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `cat_id` int(8) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(255) NOT NULL,
  `cat_description` varchar(255) NOT NULL,
  PRIMARY KEY (`cat_id`),
  UNIQUE KEY `cat_name_unique` (`cat_name`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`, `cat_description`) VALUES
(4, 'JI', 'qwertty'),
(2, 'abc', 'iubhssdfbsiduhviuwrrw'),
(3, 'xyz', 'kbuibysdv');

-- --------------------------------------------------------

--
-- Table structure for table `coin_action_tb`
--

DROP TABLE IF EXISTS `coin_action_tb`;
CREATE TABLE IF NOT EXISTS `coin_action_tb` (
  `co_action_id` int(11) NOT NULL AUTO_INCREMENT,
  `co_action_name` varchar(40) NOT NULL,
  `co_action_desc` varchar(200) NOT NULL,
  `co_action_date` varchar(30) NOT NULL,
  PRIMARY KEY (`co_action_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coin_action_tb`
--

INSERT INTO `coin_action_tb` (`co_action_id`, `co_action_name`, `co_action_desc`, `co_action_date`) VALUES
(1, 'abc', 'weevwriubnrw', '03-09-2019'),
(2, 'dgdrf', '67yjujytyh', '03-09-2019'),
(3, 'dgdrf', '67yjujytyh', '03-09-2019'),
(4, 'dgdrf', '67yjujytyh', '03-09-2019'),
(5, 'qwert', 'qwertyuioasdfghjkl', '03-09-2019'),
(6, 'qwert', 'qwertyuioasdfghjkl', '03-09-2019'),
(7, 'uhiu', 'hiuhiuhui', '03-09-2019'),
(8, 'ergertgrt', 'ergertgrtvtr', '03-09-2019'),
(9, 'qwerwt', 'rtyuryhnfgbfgbfg', '03-09-2019');

-- --------------------------------------------------------

--
-- Table structure for table `coin_event_tb`
--

DROP TABLE IF EXISTS `coin_event_tb`;
CREATE TABLE IF NOT EXISTS `coin_event_tb` (
  `co_event_id` int(11) NOT NULL AUTO_INCREMENT,
  `co_event_name` varchar(40) NOT NULL,
  `co_event_desc` varchar(200) NOT NULL,
  `co_event_date` varchar(30) NOT NULL,
  PRIMARY KEY (`co_event_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coin_event_tb`
--

INSERT INTO `coin_event_tb` (`co_event_id`, `co_event_name`, `co_event_desc`, `co_event_date`) VALUES
(3, 'qwert', 'asdfgh', '20-09-2019'),
(2, 'poiuy', 'opjibhibeve', '03-09-2019'),
(4, 'poiu', 'asdfghpoiuy', '20-09-2019');

-- --------------------------------------------------------

--
-- Table structure for table `coin_policy_tb`
--

DROP TABLE IF EXISTS `coin_policy_tb`;
CREATE TABLE IF NOT EXISTS `coin_policy_tb` (
  `co_policy_id` int(11) NOT NULL AUTO_INCREMENT,
  `co_policy_name` varchar(40) NOT NULL,
  `co_policy_desc` varchar(200) NOT NULL,
  `co_policy_date` varchar(30) NOT NULL,
  PRIMARY KEY (`co_policy_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coin_policy_tb`
--

INSERT INTO `coin_policy_tb` (`co_policy_id`, `co_policy_name`, `co_policy_desc`, `co_policy_date`) VALUES
(1, 'ebetg', 'erge5gr', '03-09-2019'),
(2, 'ebetg', 'erge5gr', '03-09-2019'),
(3, 'efg', 'dgetg', '03-09-2019'),
(4, 'efg', 'dgetg', '03-09-2019'),
(5, 'efg', 'dgetgvbm', '03-09-2019'),
(6, 'tyjtuj', 'tyjtyj', '03-09-2019'),
(7, 'xcvvb', 'serweref', '03-09-2019'),
(8, 'hiujb', 'vhhvhg', '20-09-2019'),
(9, 'moona', 'mona', '24-09-2019'),
(10, 'hbbh', 'bhkbj', '25-09-2019');

-- --------------------------------------------------------

--
-- Table structure for table `coin_rule_tb`
--

DROP TABLE IF EXISTS `coin_rule_tb`;
CREATE TABLE IF NOT EXISTS `coin_rule_tb` (
  `co_rule_id` int(11) NOT NULL AUTO_INCREMENT,
  `co_action_id` int(11) NOT NULL,
  `co_rule_condition` varchar(100) NOT NULL,
  `co_event_id` int(11) NOT NULL,
  `co_rule_design` varchar(200) NOT NULL,
  `co_rule_action_type` varchar(50) NOT NULL,
  `co_rule_comment` varchar(200) NOT NULL,
  `co_rule_priority` int(11) NOT NULL DEFAULT '2' COMMENT '1 = high, 2 = normal, 3 = low',
  `co_policy_id` int(11) NOT NULL,
  PRIMARY KEY (`co_rule_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coin_rule_tb`
--

INSERT INTO `coin_rule_tb` (`co_rule_id`, `co_action_id`, `co_rule_condition`, `co_event_id`, `co_rule_design`, `co_rule_action_type`, `co_rule_comment`, `co_rule_priority`, `co_policy_id`) VALUES
(1, 2, 'bhjiu', 9, 'jihbibjij', 'bjkkbkj', 'ibjkji', 3, 1),
(2, 2, 'uhbyuhby', 9, 'ybuuyhb', 'hjbihb', 'hhbbh', 2, 1),
(3, 1, 'bbhbikh', 9, 'hbbhikhb', 'hbhb', 'bhjhb', 1, 1),
(4, 2, 'jhbuhbuhy', 9, 'hbubhubhu', 'hubuuhb', 'uhbvhu', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `coin_service_tb`
--

DROP TABLE IF EXISTS `coin_service_tb`;
CREATE TABLE IF NOT EXISTS `coin_service_tb` (
  `co_ser_id` int(11) NOT NULL AUTO_INCREMENT,
  `co_ser_name` varchar(50) NOT NULL,
  `co_ser_desc` varchar(200) NOT NULL,
  `co_ser_date` varchar(30) NOT NULL,
  PRIMARY KEY (`co_ser_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coin_service_tb`
--

INSERT INTO `coin_service_tb` (`co_ser_id`, `co_ser_name`, `co_ser_desc`, `co_ser_date`) VALUES
(1, 'dwffqef', 'defegberg', '20-09-2019'),
(2, 'fgvjh', 'jkjjh', '20-09-2019');

-- --------------------------------------------------------

--
-- Table structure for table `coin_user_tb`
--

DROP TABLE IF EXISTS `coin_user_tb`;
CREATE TABLE IF NOT EXISTS `coin_user_tb` (
  `co_user_id` int(11) NOT NULL AUTO_INCREMENT,
  `co_user_email` varchar(30) NOT NULL,
  `co_user_password` varchar(400) NOT NULL,
  `co_user_type` varchar(20) NOT NULL,
  `co_user_display_name` varchar(50) NOT NULL,
  `co_user_join_date` varchar(14) NOT NULL,
  PRIMARY KEY (`co_user_id`),
  UNIQUE KEY `co_username` (`co_user_email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coin_user_tb`
--

INSERT INTO `coin_user_tb` (`co_user_id`, `co_user_email`, `co_user_password`, `co_user_type`, `co_user_display_name`, `co_user_join_date`) VALUES
(1, 'abc@g.com', 'abc', '1', 'abc', '31/08/2019');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `post_id` int(8) NOT NULL AUTO_INCREMENT,
  `post_content` varchar(5000) NOT NULL,
  `post_date` datetime NOT NULL,
  `post_topic` int(8) NOT NULL,
  `post_by` int(8) NOT NULL,
  `type` int(11) NOT NULL,
  PRIMARY KEY (`post_id`),
  KEY `post_topic` (`post_topic`),
  KEY `post_by` (`post_by`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_content`, `post_date`, `post_topic`, `post_by`, `type`) VALUES
(1, 'sdgegbrgnthry', '2019-09-03 11:02:36', 2, 1, 0),
(2, 'hi hello\r\n', '2019-09-13 22:09:53', 2, 1, 1),
(3, '2 nd reply', '2019-09-18 21:21:23', 2, 1, 1),
(4, '3rd reply', '2019-09-18 21:58:24', 2, 1, 1),
(5, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. ', '2019-09-19 11:52:28', 2, 1, 1),
(6, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', '2019-09-19 11:52:49', 2, 1, 1),
(9, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n', '2019-09-19 12:11:36', 1, 1, 1),
(8, 'Lorem Ipsu\'m is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n', '2019-09-19 12:11:01', 2, 1, 1),
(7, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', '2019-09-18 00:00:00', 1, 1, 0),
(11, 'hello', '2019-09-20 20:45:39', 4, 1, 0),
(12, 'poiuy', '2019-09-20 20:50:23', 5, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

DROP TABLE IF EXISTS `topics`;
CREATE TABLE IF NOT EXISTS `topics` (
  `topic_id` int(8) NOT NULL AUTO_INCREMENT,
  `topic_subject` varchar(255) NOT NULL,
  `topic_date` datetime NOT NULL,
  `topic_cat` int(8) NOT NULL,
  `topic_by` int(8) NOT NULL,
  PRIMARY KEY (`topic_id`),
  KEY `topic_cat` (`topic_cat`),
  KEY `topic_by` (`topic_by`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`topic_id`, `topic_subject`, `topic_date`, `topic_cat`, `topic_by`) VALUES
(1, 'wdff', '2019-09-03 11:01:43', 3, 1),
(2, 'wdffsdg', '2019-09-03 11:02:36', 3, 1),
(5, 'qwerty', '2019-09-20 20:50:23', 2, 1),
(4, 'Mahesh', '2019-09-20 20:45:39', 2, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

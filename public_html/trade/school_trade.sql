-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: May 03, 2016 at 02:42 PM
-- Server version: 5.5.48-cll
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `school_trade`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `timestamp`) VALUES
(1, 'user1', 'user1@email.com', 0),
(2, 'user2', 'user2@email.com', 0),
(3, 'user3', 'user3@email.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `usertrades`
--

CREATE TABLE IF NOT EXISTS `usertrades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sendinguserid` int(11) NOT NULL,
  `receivinguserid` int(11) NOT NULL,
  `leagueid` int(11) NOT NULL,
  `team1id` int(11) NOT NULL,
  `team2id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=80 ;

--
-- Dumping data for table `usertrades`
--

INSERT INTO `usertrades` (`id`, `sendinguserid`, `receivinguserid`, `leagueid`, `team1id`, `team2id`, `status`) VALUES
(76, 1, 2, 0, 3, 1, 1),
(77, 1, 2, 0, 5, 6, 1),
(78, 1, 3, 0, 6, 10, 0),
(79, 1, 2, 0, 7, 12, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_team`
--

CREATE TABLE IF NOT EXISTS `user_team` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `team_id` int(11) NOT NULL,
  `league_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `user_team`
--

INSERT INTO `user_team` (`id`, `team_id`, `league_id`, `user_id`) VALUES
(1, 1, 1, 1),
(2, 2, 1, 1),
(3, 3, 1, 2),
(4, 4, 1, 3),
(5, 5, 1, 2),
(6, 6, 1, 1),
(7, 7, 1, 2),
(8, 8, 1, 2),
(9, 9, 1, 1),
(10, 10, 1, 3),
(11, 11, 1, 1),
(12, 12, 1, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

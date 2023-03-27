-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 25, 2021 at 09:59 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `voter`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

DROP TABLE IF EXISTS `candidates`;
CREATE TABLE IF NOT EXISTS `candidates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `candidate` varchar(50) NOT NULL,
  `electionPlace` varchar(50) NOT NULL,
  `part` varchar(50) NOT NULL,
  `position` varchar(50) NOT NULL,
  `adate` timestamp NOT NULL DEFAULT current_timestamp(),
  `udate` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`id`, `email`, `candidate`, `electionPlace`, `part`, `position`, `adate`, `udate`) VALUES
(1, 'neemaless@gmail.com', '', '', 'CCM', '', '2021-06-25 21:12:41', '2021-06-25 21:12:41'),
(2, 'emanuelsiria20@gmail.com', 'emanueli siria', 'Mianzini', 'atc wazalendo', 'Mbunge', '2021-06-25 21:12:59', '2021-06-25 21:12:59'),
(3, 'emereciana@gmail.com', 'emeresiana emanueli', 'Kasuru', 'chadema', 'Mbunge', '2021-06-25 21:13:18', '2021-06-25 21:13:18'),
(4, 'luponelolulandala@gmail.com', 'Neema Less', 'Mianzini', 'atc wazalendo', 'Mbunge', '2021-06-25 21:13:36', '2021-06-25 21:13:36');

-- --------------------------------------------------------

--
-- Table structure for table `eplace`
--

DROP TABLE IF EXISTS `eplace`;
CREATE TABLE IF NOT EXISTS `eplace` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nameplace` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `position1` varchar(50) NOT NULL,
  `adate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `udate` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `nameplace` (`nameplace`),
  UNIQUE KEY `nameplace_2` (`nameplace`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eplace`
--

INSERT INTO `eplace` (`id`, `nameplace`, `city`, `position1`, `adate`, `udate`) VALUES
(1, 'ngalenalo', 'aresha', 'rais', '2021-05-31 22:52:05', '2021-05-31 22:52:05'),
(4, 'DABALO', 'DODOMA', 'XXXXXX', '2021-06-08 22:45:06', '2021-06-04 16:54:37'),
(5, 'Ilemela', 'Mwanza', 'Mbunge', '2021-06-08 21:48:19', '2021-06-08 21:48:19'),
(6, 'Kasuru', 'Kigoma', 'Mbunge', '2021-06-08 21:54:40', '2021-06-08 21:54:40'),
(7, 'Mianzini', 'Arusha', 'Mbunge', '2021-06-25 19:25:55', '2021-06-25 19:25:55');

-- --------------------------------------------------------

--
-- Table structure for table `instution`
--

DROP TABLE IF EXISTS `instution`;
CREATE TABLE IF NOT EXISTS `instution` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `iname` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `place` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `passwordz` varchar(255) NOT NULL,
  `nida` int(20) NOT NULL,
  `code` varchar(250) NOT NULL,
  `statuz` varchar(30) NOT NULL,
  `otp` int(250) NOT NULL,
  `typez` varchar(50) NOT NULL DEFAULT 'instution',
  `image` blob NOT NULL,
  `adate` timestamp NOT NULL DEFAULT current_timestamp(),
  `udate` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instution`
--

INSERT INTO `instution` (`id`, `iname`, `dob`, `place`, `email`, `passwordz`, `nida`, `code`, `statuz`, `otp`, `typez`, `image`, `adate`, `udate`) VALUES
(1, 'Neema Less', '1999-06-15', 'Mianzini', 'luponelolulandala@gmail.com', '$2y$10$IwWsizziRNQhEzMetyoLneqoJSzHMJX5Kys5J1NG2axlmzhW63q1K', 1212, '000000', 'active', 3711963, 'voter', 0x696d61676573202831292e6a706567, '2021-06-25 21:04:23', '2021-06-25 21:04:23'),
(2, 'luponelo lulandala', '1989-05-31', '---Select Election Place---', 'loponelo20@gmail.com', '$2y$10$bBo1tQVCQ9Su1wt90DpuM.sqVCerclf6G1FbAgZkLry65Vie.1ehi', 2000202087, '000000', 'active', 3468499, 'voter', 0x696d61676573202834292e6a706567, '2021-06-25 21:05:46', '2021-06-25 21:05:46'),
(3, 'emanueli siria', '2001-06-13', 'Mianzini', 'emanuelsiria20@gmail.com', '$2y$10$J644bEl7Q.c92axG60lU8uHl3Ml39C46WO3BkwKR919yCoLRI/jiq', 323293023, '000000', 'active', 8655195, 'voter', 0x696d61676573202835292e6a706567, '2021-06-25 21:06:40', '2021-06-25 21:06:40'),
(4, 'emeresiana emanueli', '2000-04-13', 'Kasuru', 'emereciana@gmail.com', '$2y$10$rl1hJ/65D9PN93VJsCEOE.dJyWAaICYIcY2GxE2t2HtifWosBu7sy', 1222222221, '000000', 'active', 7753210, 'voter', 0x696d61676573202832292e6a706567, '2021-06-25 21:07:53', '2021-06-25 21:07:53'),
(5, 'rajab bogohe', '1980-06-25', 'DABALO', 'rajabeliud44@gmail.com', '$2y$10$ivsa0U5OJUGy26mECCegw.6C6UXGfrXuAqrEa.utat5TlvK7MFZIa', 23232323, '000000', 'active', 1454685, 'manager', 0x6d77616d62612e6a666966, '2021-06-25 21:08:59', '2021-06-25 21:08:59'),
(6, 'bogohe daudi', '1988-06-08', 'Kasuru', 'bogohe@gmail.com', '$2y$10$8icq4sT6j8T/3q08pHRhpOPdrFS0QdneT2TiJ4F6k.HBRIjVfXnju', 12121212, '000000', 'active', 9325508, 'manager', 0x53696d62615f53706f7274735f436c75622e706e67, '2021-06-25 21:10:37', '2021-06-25 21:10:37');

-- --------------------------------------------------------

--
-- Table structure for table `parties`
--

DROP TABLE IF EXISTS `parties`;
CREATE TABLE IF NOT EXISTS `parties` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pname` varchar(50) NOT NULL,
  `pstg` varchar(50) NOT NULL,
  `image` blob DEFAULT NULL,
  `adate` timestamp NOT NULL DEFAULT current_timestamp(),
  `udate` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `pname` (`pname`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parties`
--

INSERT INTO `parties` (`id`, `pname`, `pstg`, `image`, `adate`, `udate`) VALUES
(2, 'CCM', 'kidumu chama chamapinduzi', 0x696d61676573202833292e706e67, '2021-05-31 22:08:39', '2021-06-08 21:21:04'),
(3, 'atc wazalendo', 'uzalendo', 0x696d6167657320283134292e6a706567, '2021-06-04 16:58:57', '2021-06-04 16:58:57'),
(5, 'M4C', 'movement for Change', 0x696d616765732e706e67, '2021-06-08 20:38:36', '2021-06-25 21:12:14'),
(7, 'chadema', 'peoples power', 0x696d6167657320283133292e6a706567, '2021-06-25 19:24:43', '2021-06-25 19:24:43');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

DROP TABLE IF EXISTS `result`;
CREATE TABLE IF NOT EXISTS `result` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `candidate` varchar(50) DEFAULT NULL,
  `kula` varchar(50) NOT NULL,
  `cand` varchar(50) NOT NULL,
  `eplace` varchar(50) NOT NULL,
  `part` varchar(50) NOT NULL,
  `position` varchar(50) NOT NULL,
  `mtu` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`id`, `candidate`, `kula`, `cand`, `eplace`, `part`, `position`, `mtu`) VALUES
(1, 'emanuelsiria20@gmail.com', 'voted', 'emanueli siria', 'Mianzini', 'atc wazalendo', 'Mbunge', NULL),
(2, 'emanuelsiria20@gmail.com', 'voted', 'emanueli siria', 'Mianzini', 'atc wazalendo', 'Mbunge', NULL),
(3, 'emanuelsiria20@gmail.com', 'voted', 'emanueli siria', 'Mianzini', 'atc wazalendo', 'Mbunge', NULL),
(4, 'emanuelsiria20@gmail.com', 'voted', 'emanueli siria', 'Mianzini', 'atc wazalendo', 'Mbunge', NULL),
(5, 'emanuelsiria20@gmail.com', 'voted', 'emanueli siria', 'Mianzini', 'atc wazalendo', 'Mbunge', NULL),
(6, 'emanuelsiria20@gmail.com', 'voted', 'emanueli siria', 'Mianzini', 'atc wazalendo', 'Mbunge', NULL),
(7, 'emanuelsiria20@gmail.com', 'voted', 'emanueli siria', 'Mianzini', 'atc wazalendo', 'Mbunge', NULL),
(8, 'emanuelsiria20@gmail.com', 'voted', 'emanueli siria', 'Mianzini', 'atc wazalendo', 'Mbunge', NULL),
(9, 'emanuelsiria20@gmail.com', 'voted', 'emanueli siria', 'Mianzini', 'atc wazalendo', 'Mbunge', NULL),
(10, 'emanuelsiria20@gmail.com', 'voted', 'emanueli siria', 'Mianzini', 'atc wazalendo', 'Mbunge', NULL),
(11, 'emanuelsiria20@gmail.com', 'voted', 'emanueli siria', 'Mianzini', 'atc wazalendo', 'Mbunge', NULL),
(12, 'luponelolulandala@gmail.com', 'voted', 'Neema Less', 'Mianzini', 'atc wazalendo', 'Mbunge', NULL),
(13, 'luponelolulandala@gmail.com', 'voted', 'Neema Less', 'Mianzini', 'atc wazalendo', 'Mbunge', NULL),
(14, 'luponelolulandala@gmail.com', 'voted', 'Neema Less', 'Mianzini', 'atc wazalendo', 'Mbunge', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

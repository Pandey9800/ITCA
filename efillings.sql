-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2024 at 06:38 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `efillings`
--

-- --------------------------------------------------------

--
-- Table structure for table `alogin`
--

CREATE TABLE `alogin` (
  `id` int(11) NOT NULL,
  `password` varchar(25) NOT NULL,
  `username` varchar(35) DEFAULT NULL,
  `name` varchar(35) DEFAULT NULL,
  `contact` varchar(10) DEFAULT NULL,
  `emailid` varchar(25) DEFAULT NULL,
  `address` varchar(75) DEFAULT NULL,
  `bname` varchar(35) DEFAULT NULL,
  `domain` varchar(35) DEFAULT NULL,
  `img` varchar(125) DEFAULT NULL,
  `logo` varchar(125) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `alogin`
--

INSERT INTO `alogin` (`id`, `password`, `username`, `name`, `contact`, `emailid`, `address`, `bname`, `domain`, `img`, `logo`) VALUES
(1, '123456', 'admin', 'Efilingsgov', '9575126240', 'BurnBlack@gmail.com', 'Pandri Raipur, Chhattisgarh-492001', 'Efilingsgov', 'www.burnblack.in', 't4.jpg', '1689922217.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `type` varchar(20) NOT NULL,
  `name` varchar(65) NOT NULL,
  `id` int(11) NOT NULL,
  `city` varchar(35) NOT NULL,
  `address` varchar(60) NOT NULL,
  `shopname` varchar(45) NOT NULL,
  `mob` varchar(30) NOT NULL,
  `mail` varchar(45) NOT NULL,
  `timedate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `assignedlist`
--

CREATE TABLE `assignedlist` (
  `aid` int(11) NOT NULL,
  `taskid` int(11) NOT NULL,
  `assign` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assignedlist`
--

INSERT INTO `assignedlist` (`aid`, `taskid`, `assign`) VALUES
(1, 5, 1),
(2, 5, 1),
(3, 3, 7),
(4, 2, 7),
(5, 1, 7),
(6, 7, 7),
(7, 9, 5),
(8, 9, 7),
(9, 10, 7),
(10, 11, 9),
(11, 12, 7),
(12, 13, 7),
(13, 16, 5),
(14, 50, 7),
(15, 46, 7),
(16, 59, 7),
(17, 58, 11),
(18, 57, 46),
(19, 68, 7);

-- --------------------------------------------------------

--
-- Table structure for table `cat`
--

CREATE TABLE `cat` (
  `id` int(11) NOT NULL,
  `cast` varchar(225) NOT NULL,
  `timedate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `cat`
--

INSERT INTO `cat` (`id`, `cast`, `timedate`) VALUES
(22, 'GST Category', '2024-02-12 10:54:13');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `city_id` int(11) NOT NULL,
  `city_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`city_id`, `city_name`) VALUES
(1, 'Bilaspur');

-- --------------------------------------------------------

--
-- Table structure for table `commission`
--

CREATE TABLE `commission` (
  `id` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `commission` float(10,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `commission`
--

INSERT INTO `commission` (`id`, `level`, `commission`) VALUES
(1, 1, 50.00),
(2, 2, 30.00),
(3, 3, 20.00);

-- --------------------------------------------------------

--
-- Table structure for table `counter_charge`
--

CREATE TABLE `counter_charge` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `form_name` varchar(225) DEFAULT NULL,
  `price` float(10,2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `counter_charge`
--

INSERT INTO `counter_charge` (`id`, `pid`, `form_name`, `price`) VALUES
(1, 1, 'STATE', 100.00),
(2, 1, 'ZONE', 104.00),
(3, 1, 'District', 105.00),
(4, 1, 'TEHSIL', 106.00),
(5, 1, 'E-counter', 107.00),
(6, 1, 'MINICOUNTER', 110.00),
(7, 2, 'STATE', 100.00),
(8, 2, 'ZONE', 120.00),
(9, 2, 'District', 150.00),
(10, 2, 'TEHSIL', 180.00),
(11, 2, 'E-counter', 200.00),
(12, 2, 'MINICOUNTER', 300.00),
(13, 3, 'STATE', 500.00),
(14, 3, 'ZONE', 650.00),
(15, 3, 'District', 700.00),
(16, 3, 'TEHSIL', 750.00),
(17, 3, 'E-counter', 800.00),
(18, 3, 'MINICOUNTER', 1000.00);

-- --------------------------------------------------------

--
-- Table structure for table `coupan`
--

CREATE TABLE `coupan` (
  `id` int(11) NOT NULL,
  `catid` int(11) NOT NULL,
  `formid` int(11) NOT NULL,
  `pin` varchar(25) DEFAULT NULL,
  `amt` float(10,2) DEFAULT NULL,
  `disamt` float(10,2) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '1 for used',
  `timedate` date DEFAULT NULL,
  `ip` varchar(125) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `coupan`
--

INSERT INTO `coupan` (`id`, `catid`, `formid`, `pin`, `amt`, `disamt`, `status`, `timedate`, `ip`) VALUES
(1, 8, 2, 'Gst200', 100.00, 200.00, 0, '2023-07-15', '2401:4900:1c33:9bce:201d:abb3:27c1:a271'),
(2, 8, 1, 'dis12346', 8000.00, 100.00, 0, '2023-11-25', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `coupantrns`
--

CREATE TABLE `coupantrns` (
  `id` int(11) NOT NULL,
  `stfid` int(11) NOT NULL,
  `formid` int(11) NOT NULL,
  `catid` int(11) NOT NULL,
  `coupanid` int(11) NOT NULL,
  `timedate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `coupantrns`
--

INSERT INTO `coupantrns` (`id`, `stfid`, `formid`, `catid`, `coupanid`, `timedate`) VALUES
(1, 2, 1, 8, 2, '2023-11-25 06:31:18');

-- --------------------------------------------------------

--
-- Table structure for table `currentlogin`
--

CREATE TABLE `currentlogin` (
  `id` int(11) NOT NULL,
  `memid` int(11) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `stfid` int(11) NOT NULL DEFAULT 0,
  `name` varchar(65) DEFAULT NULL,
  `contact` varchar(14) DEFAULT NULL,
  `city` varchar(25) DEFAULT NULL,
  `encountercat` int(11) NOT NULL DEFAULT 0,
  `encounterservice` int(11) NOT NULL DEFAULT 0,
  `pincode` varchar(6) DEFAULT NULL,
  `address` varchar(225) DEFAULT NULL,
  `panno` varchar(25) DEFAULT NULL,
  `adharno` varchar(25) DEFAULT NULL,
  `photo` varchar(125) DEFAULT NULL,
  `panphoto` varchar(222) DEFAULT NULL,
  `aaphoto` varchar(222) DEFAULT NULL,
  `alternativenum` varchar(14) DEFAULT NULL,
  `timedate` timestamp NOT NULL DEFAULT current_timestamp(),
  `father` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `financial_year` varchar(30) NOT NULL,
  `DOB` date NOT NULL,
  `EMAIL` varchar(30) NOT NULL,
  `gender` int(11) DEFAULT NULL COMMENT '1 = male, 2 = female, 3 = other',
  `password` varchar(250) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `stfid`, `name`, `contact`, `city`, `encountercat`, `encounterservice`, `pincode`, `address`, `panno`, `adharno`, `photo`, `panphoto`, `aaphoto`, `alternativenum`, `timedate`, `father`, `lname`, `financial_year`, `DOB`, `EMAIL`, `gender`, `password`) VALUES
(119, 0, 'Test', '7879701413', NULL, 0, 0, NULL, NULL, NULL, NULL, 'images/gstr-2.png', NULL, NULL, NULL, '2024-02-14 08:23:44', '', '', '', '0000-00-00', 'hbk@gmail.com', NULL, '$2y$10$ts.ggkIfVaYjJQ1hppOzu.xZcsBT990OUjwTcH0OTWyZWYk7BSD56'),
(120, 0, 'Random', '6416546541', NULL, 0, 0, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, '2024-02-14 08:32:06', '', '', '', '0000-00-00', 'The.Rock@wwe.com', NULL, '$2y$10$rvTebLBDRWRBgcBLB4QJOOLbRyPBljkdcYrhOathr94ag8NoA4eDS'),
(116, 0, 'admin', '8596213432', 'Bilaspur', 22, 113, '495009', 'Badi Koni', 'DCVPP7139H', '313252421233', NULL, NULL, NULL, NULL, '2024-02-12 14:25:12', 'Vinod', 'Pandey', '2022-2023', '2000-02-01', 'The.Rock@wwe2.com', 1, NULL),
(117, 0, 'Test At ', '7898986513', 'Bilaspur', 22, 113, '495001', 'DK', 'DCVPP7150H', '7561813318', NULL, NULL, NULL, NULL, '2024-02-12 18:09:40', 'Mr Nightman', 'Night', '2022-2023', '2000-11-11', 'pandey.ravi9800@gmail.com', 1, NULL),
(118, 0, 'Ajay', '2654361235', 'Bilaspur', 22, 112, '764546', 'qwerty', 'DCVPP7188H', '354462543462', NULL, NULL, NULL, NULL, '2024-02-13 05:21:19', 'dk', 'Singh', '2022-2023', '2000-11-11', 'The.Rock@wwe.com', 3, NULL),
(121, 0, 'admin 2', '8718198484', NULL, 0, 0, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, '2024-02-14 08:33:58', '', '', '', '0000-00-00', 'The.Rock@wwe2.com', NULL, '$2y$10$3bvkQgcBjP5zem54r1w49.uDcXTbIcJoPup79DwFqz.ORj70jwTWm'),
(122, 0, NULL, NULL, NULL, 0, 112, NULL, NULL, 'DCVPP7189G', NULL, NULL, NULL, NULL, NULL, '2024-02-14 08:39:35', '', '', '2022-2023', '2000-11-11', '', NULL, NULL),
(123, 0, 'Test At 2', '1235632156', NULL, 0, 0, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, '2024-02-14 09:06:51', '', '', '', '0000-00-00', 'The.Rock@wwe.com', NULL, '$2y$10$lzZRpbh55Th3b40wabslwe3A07BkXbDxIiUREUdsjCb37.jiIC18.'),
(124, 0, 'New Test', '4595682325', NULL, 0, 0, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, '2024-02-14 09:08:25', '', '', '', '0000-00-00', 'Jha.Govind@gmail.com', NULL, '$2y$10$sNQ3E7D3k6wfY5lJ4dugEe2T.ud/CRvwQ25OwkmB/A/zc5UiBjWOu'),
(125, 0, 'New User', '7895896532', NULL, 0, 0, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, '2024-02-14 09:09:56', '', '', '', '0000-00-00', 'Chill@work.com', NULL, '$2y$10$VWs6sN/8OyCBw7s1bidq6.bTeyVuR9JfuDR6WDjvPZEZzH52Ox91G'),
(126, 0, 'Purushottam', '9565131353', NULL, 0, 0, NULL, NULL, NULL, NULL, 'images/logo.png', NULL, NULL, NULL, '2024-02-14 09:26:47', '', '', '', '0000-00-00', 'The.Rock@gmail.com', NULL, '$2y$10$8frxJV0R36NFnIVy67zFl.ipFg9F4jxJO/7zX3MDi6zjvzqcM5xRG'),
(127, 0, 'ppj', '8186454645', NULL, 0, 0, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, '2024-02-14 09:28:26', '', '', '', '0000-00-00', 'hbk@gmail.com', NULL, '$2y$10$cN6UTNW.kxagkvtCjEuB.eBr5pHhFpqFSdcXJcn0mb6YZGLuqEKVW'),
(128, 0, 'TestUserat302', '7878756213', NULL, 0, 0, NULL, NULL, NULL, NULL, 'images/logo.png', NULL, NULL, NULL, '2024-02-14 09:32:12', '', '', '', '0000-00-00', 'The.Rock@wwe2.com', NULL, '$2y$10$T3qY.EVRuDCXR4WU/b1tqe1xCtwVeDfIAxS1u2j9lQUM2kCRGmOVO'),
(129, 0, 'asdasd', '7899999556', NULL, 0, 0, NULL, NULL, NULL, NULL, 'images/logo.png', NULL, NULL, NULL, '2024-02-14 09:38:04', '', '', '', '0000-00-00', 'The.Rock@wwe.com', NULL, '$2y$10$zsocc4cEhJbyMwNf5MoNzuXeyUA29h.J/9G/PeW6enkOq3Bn.Sgjq'),
(130, 0, 'randomm', '8888888888', NULL, 0, 0, NULL, NULL, NULL, NULL, 'images/Test4.png', NULL, NULL, NULL, '2024-02-14 09:39:21', '', '', '', '0000-00-00', 'hbk@gmail.com', NULL, '$2y$10$rTNoV8RA9EexUYF9emIAKO9aL1gS7zarGG.oKNr4JTZ0Rh60/ztX6'),
(131, 0, 'Rouge', '7777777777', NULL, 0, 0, NULL, NULL, NULL, NULL, 'images/gstr-2.png', NULL, NULL, NULL, '2024-02-14 09:49:12', '', '', '', '0000-00-00', 'The.Rock@wwe.com', NULL, '$2y$10$DO7UJWKIOAkWpHYSkcpEWuDLbbcHvcOFCuisziB4i6DrSP.WbA07e'),
(132, 0, 'Random320', '5555555555', NULL, 0, 0, NULL, NULL, NULL, NULL, 'images/cd.jpeg', NULL, NULL, NULL, '2024-02-14 09:51:19', '', '', '', '0000-00-00', 'hbk@gmail.com', NULL, '$2y$10$bnOrwlYzp.MbR7rHukQEhel/XyeXc5W67MLbV5ZJSAjicurSRPcCa'),
(133, 0, 'Test3260', '1111111111', NULL, 0, 0, NULL, NULL, NULL, NULL, 'images/logo.png', NULL, NULL, NULL, '2024-02-14 09:56:18', '', '', '', '0000-00-00', 'The.Rock@wwe.com', NULL, '$2y$10$nTZznFuNC4hefEqU5gt6Veu9sD0em6TyavZki.YGvtHfGm21oFlGG'),
(134, 0, 'adminnn', '3333333333', NULL, 0, 0, NULL, NULL, NULL, NULL, 'images/logo.png', NULL, NULL, NULL, '2024-02-14 10:01:20', '', '', '', '0000-00-00', 'hbk@gmail.com', NULL, '$2y$10$rTPbNs0RvUBiBv4qUKLupO5ZI9lbG1TlqE9Ybk4uRmDQlYWaa4SCe'),
(135, 0, 'TestOOO', '3624562534', NULL, 0, 0, NULL, NULL, NULL, NULL, 'images/Podcast Youtube Thumbnail - Made with PosterMyWall.jpg', NULL, NULL, NULL, '2024-02-14 10:05:24', '', '', '', '0000-00-00', 'hbk@gmail.com', NULL, '$2y$10$iSL7uJD.VlhPuxu.8SmKpe.6mBxu2C9i4SNSxBoTuy/2w.aeaI6cG'),
(136, 0, 'laali', '9589622512', NULL, 0, 0, NULL, NULL, NULL, NULL, 'images/gstr-2.png', NULL, NULL, NULL, '2024-02-14 10:19:57', '', '', '', '0000-00-00', 'lali24@gmail.com', NULL, '$2y$10$owaXt3izBu4wx4veli00Q.G8XV5/Hxb8nx10RPEMwn65xbyiTZkAm'),
(137, 0, 'Testnn', '2222222255', NULL, 0, 0, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, '2024-02-14 10:37:30', '', '', '', '0000-00-00', 'pandey.ravi9800@gmail.com', NULL, '$2y$10$Jhqnc0/LemmKf9zIzJY6putVj3sVTWGx0cfzWyo2GW47QbTKrcJSW'),
(138, 0, 'skdjfknsf', '3333333331', NULL, 0, 0, NULL, NULL, NULL, NULL, 'images/logo.png', NULL, NULL, NULL, '2024-02-14 10:38:19', '', '', '', '0000-00-00', 'hbk@gmail.com', NULL, '$2y$10$VmRS20tE/hhk/XvoaZmPGuNAyR64AdrBjCLVFim4GGSGCcmtAKY/i'),
(139, 0, 'qwerty4:18PM', '', NULL, 0, 0, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, '2024-02-14 10:47:15', '', '', '', '0000-00-00', 'The.Rock@wwe.com', NULL, '$2y$10$Dw.io3fw8I02ACb87aQN.uRkENRwpp5//4WnGLSwlP2DnZe9JTKTa'),
(140, 0, 'qwerty4:22PMMMM', '7879701444', NULL, 0, 0, NULL, NULL, NULL, NULL, 'images/logo.png', NULL, NULL, NULL, '2024-02-14 10:52:53', '', '', '', '0000-00-00', 'hbk@gmail.com', NULL, '$2y$10$8KmzeuOBOY2FoVhkhILaUuXeWQStUDZZDCclEQHf1iZVzR.Id6sKq'),
(141, 0, 'qwerty4:26', '7879701666', NULL, 0, 0, NULL, NULL, NULL, NULL, 'images/logo.png', NULL, NULL, NULL, '2024-02-14 10:56:31', '', '', '', '0000-00-00', 'hbk@gmail.com', NULL, '$2y$10$Z9bLz4womfpAknbg53x5rOLrmyx811NRSalgriTLQzhp16MMD3PXS'),
(142, 0, 'admin4:41', '5252525225', NULL, 0, 0, NULL, NULL, NULL, NULL, 'images/logo.png', NULL, NULL, NULL, '2024-02-14 11:11:23', '', '', '', '0000-00-00', 'hbk@gmail.com', NULL, '$2y$10$avyWygQJnVqUNxI/gwLlgO2vr4PBo2cPGYJ612nlQLg2JBODCkAYi'),
(143, 0, 'admin4:47', '5613513513', NULL, 0, 0, NULL, NULL, NULL, NULL, 'images/gstr3.jpg', NULL, NULL, NULL, '2024-02-14 11:17:56', '', '', '', '0000-00-00', 'The.Rock@wwe.com', NULL, '$2y$10$0hHHzaj6nNSpFHLQd/Mo4.DUGEivzE2YmDWkymXP57tBJq/PWaUbK'),
(144, 0, 'admin4:52', '4582646846', NULL, 0, 0, NULL, NULL, NULL, NULL, 'images/gstr-2.png', NULL, NULL, NULL, '2024-02-14 11:22:24', '', '', '', '0000-00-00', 'The.Rock@wwe2.com', NULL, '$2y$10$mr9pNVsWZNnAHIF4IqZj0ub5AA6xDsaHLMXg1J4U0EgolEZBj9m4m'),
(145, 0, 'rand5:16', '4545454545', NULL, 0, 0, NULL, NULL, NULL, NULL, 'images/logo.png', NULL, NULL, NULL, '2024-02-14 11:47:01', '', '', '', '0000-00-00', 'The.Rock@wwe.com', NULL, '$2y$10$836iW0e.3kEERBwtqTSZOeQcojpJ9D6jjKVbX0SMKTMevCMazQIt6'),
(146, 0, 'rand5:20PM', '4444444444', NULL, 0, 0, NULL, NULL, NULL, NULL, 'images/logo.png', NULL, NULL, NULL, '2024-02-14 11:50:55', '', '', '', '0000-00-00', 'The.Rock@wwe.com', NULL, '$2y$10$Jk5JVl20vHsx11nlX1AcxODWl1no9Kdgrz1E8F8PocgudrHnK4.0K'),
(147, 0, 'newat5:38', '8080808080', NULL, 0, 0, NULL, NULL, NULL, NULL, 'images/logo.png', NULL, NULL, NULL, '2024-02-14 12:09:11', '', '', '', '0000-00-00', 'pandey.ravi9800@gmail.com', NULL, '$2y$10$MOTWuYVwu/YAJ8aCpj54eexiTbU9azcpAc1IiXFIQe9cQJKXa7AoC'),
(148, 0, NULL, NULL, NULL, 0, 113, NULL, NULL, 'DCVPP7134G', NULL, NULL, NULL, NULL, NULL, '2024-02-14 12:09:42', '', '', '2022-2023', '2000-11-11', '', NULL, NULL),
(149, 0, 'qwertyu', '6855654532', NULL, 0, 0, NULL, NULL, NULL, NULL, 'images/logo.png', NULL, NULL, NULL, '2024-02-14 14:04:19', '', '', '', '0000-00-00', 'hbk@gmail.com', NULL, '$2y$10$FHvEf.nGJ9OlqlKN3Ehpse76ViNTuNUC2AV..z1CNNB5xhMX4JLdC'),
(150, 0, 'testatoneoclock', '4656463513', NULL, 0, 0, NULL, NULL, NULL, NULL, 'images/logo.png', NULL, NULL, NULL, '2024-02-14 19:29:30', '', '', '', '0000-00-00', 'pandey.ravi9800@gmail.com', NULL, '$2y$10$hvllaAD95I0CLyWxtRg06.wr6Qh5MhO6beIqkItybIazttW99oZ1m'),
(151, 0, 'TestAT1O5CLOCK', '4646465321', NULL, 0, 0, NULL, NULL, NULL, NULL, 'images/logo.png', NULL, NULL, NULL, '2024-02-14 19:35:53', '', '', '', '0000-00-00', 'pandey.ravi9800@gmail.com', NULL, '$2y$10$27Ryqua1Rm3zJLzBAeXNE.Cx7kQYx1GIsNA9h94zke1IudgzapsNO'),
(152, 0, 'Testat1:16AM', '1321353513', NULL, 0, 0, NULL, NULL, NULL, NULL, 'images/logo.png', NULL, NULL, NULL, '2024-02-14 19:46:52', '', '', '', '0000-00-00', 'pandey.ravi9800@gmail.com', NULL, '$2y$10$A7IrQVj3gpoEFC3FKJcVu.M3oXuYPvtAfgfwW9dO9d3WoDSgGsOfa'),
(153, 0, 'Testat1:20AM', '4651313546', NULL, 0, 0, NULL, NULL, NULL, NULL, 'images/logo.png', NULL, NULL, NULL, '2024-02-14 19:51:11', '', '', '', '0000-00-00', 'pandey.ravi9800@gmail.com', NULL, '$2y$10$fp3.IFMIwPvWnRT1RQsZ3OQs7RiSq7lhn5pIvexDZmtZD92FMw0wS'),
(154, 0, 'Testat1:26am', '3624562555', NULL, 0, 0, NULL, NULL, NULL, NULL, 'images/logo.png', NULL, NULL, NULL, '2024-02-14 19:56:46', '', '', '', '0000-00-00', 'pandey.ravi9800@gmail.com', NULL, '$2y$10$kPyUpmzI5zjGTnJeJ.CWHOVUpU35R5ugfvXGLv3ilKKnrbAnOjF0y'),
(155, 0, 'TestAT1:28AM', '3624562522', NULL, 0, 0, NULL, NULL, NULL, NULL, 'images/logo.png', NULL, NULL, NULL, '2024-02-14 19:58:19', '', '', '', '0000-00-00', 'pandey.ravi9800@gmail.com', NULL, '$2y$10$ZgXGxcnh8ooPdSD2YnUi4u.oHepWX0GajOtEjl8AoeTDJBdXGQ9q.'),
(156, 0, 'Testat1:29AM', '6456532444', NULL, 0, 0, NULL, NULL, NULL, NULL, 'images/logo.png', NULL, NULL, NULL, '2024-02-14 20:00:15', '', '', '', '0000-00-00', 'pandey.ravi9800@gmail.com', NULL, '$2y$10$ee7sy0qE6e17L87avvM48uU78C8FDvnUGMFsvdsaaQjgNpIko3AL6'),
(157, 0, 'VP', '9589502222', NULL, 0, 0, NULL, NULL, NULL, NULL, 'images/logo.png', NULL, NULL, NULL, '2024-02-14 20:04:00', '', '', '', '0000-00-00', 'vp01889@gmail.com', NULL, '$2y$10$CkSnSHX/tYmxj4e8E/8aw.yph9QCXy0Y6OLdz6nFW7RNEpbjQEs8.'),
(158, 0, 'Testat1:41AM', '7898988888', NULL, 0, 0, NULL, NULL, NULL, NULL, 'images/logo.png', NULL, NULL, NULL, '2024-02-14 20:12:14', '', '', '', '0000-00-00', 'vp01889@gmail.com', NULL, '$2y$10$NgLdXAcErwTdat69f7dCD.aAAISlUxgP6T1TShRnHW3M/MUwjOgoi'),
(159, 0, 'adminat1:44AM', '1315464613', NULL, 0, 0, NULL, NULL, NULL, NULL, 'images/logo.png', NULL, NULL, NULL, '2024-02-14 20:15:14', '', '', '', '0000-00-00', 'pandey.ravi9800@gmail.com', NULL, '$2y$10$O.2uPjp.rjYSNRkWzkGvMuvJ0sTGgGH/F1IYsTBrS6UBqqtOJEHTO'),
(160, 0, 'Test1:45AM', '7879701433', NULL, 0, 0, NULL, NULL, NULL, NULL, 'images/logo.png', NULL, NULL, NULL, '2024-02-14 20:16:08', '', '', '', '0000-00-00', 'vp01889@gmail.com', NULL, '$2y$10$zf2y8MVfSrhmceFGyOBaS.5QbbxbtsiUoJwbYHzGB1HYKCiRwvRpi'),
(161, 0, 'Testat1:47AM', '1222111111', NULL, 0, 0, NULL, NULL, NULL, NULL, 'images/logo.png', NULL, NULL, NULL, '2024-02-14 20:18:00', '', '', '', '0000-00-00', 'vp01889@gmail.com', NULL, '$2y$10$hudcirwrVW3Vd9gF4u4YuOdljjiaidUmqIVdXB.w0J1VH0Iv/LOje'),
(162, 0, 'TestAt1:50AM', '3322111111', NULL, 0, 0, NULL, NULL, NULL, NULL, 'images/logo.png', NULL, NULL, NULL, '2024-02-14 20:19:51', '', '', '', '0000-00-00', 'vp01889@gmail.com', NULL, '$2y$10$VqRHYM6FK61E2tPEVNf6TuyVv4SUUZW0tSOC6KyOzuc2yJNBh31lu'),
(163, 0, 'Testat01:55AM', '7898888888', NULL, 0, 0, NULL, NULL, NULL, NULL, 'images/logo.png', NULL, NULL, NULL, '2024-02-14 20:25:35', '', '', '', '0000-00-00', 'vp01889@gmail.com', NULL, '$2y$10$9.j.tW6FNPaEGi/shUfaxOxLb6yJEOxq1Gd34GPdRajuE3U3MYU.W'),
(164, 0, 'finaloneofnight02:02AM', '7878888888', NULL, 0, 0, NULL, NULL, NULL, NULL, 'images/gstr3.jpg', NULL, NULL, NULL, '2024-02-14 20:31:52', '', '', '', '0000-00-00', 'vp01889@gmail.com', NULL, '$2y$10$UhAN1IlLGizd1q3gegdQU.kdaboE.VRl9FZMR49sJUALflM5y7d/u'),
(165, 0, 'admin11:00AM', '4566666666', NULL, 0, 0, NULL, NULL, NULL, NULL, 'images/logo.png', NULL, NULL, NULL, '2024-02-15 05:29:52', '', '', '', '0000-00-00', 'lalinisahusirrl@gmail.com', NULL, '$2y$10$bHXuZhvpdsUoyVCZYbvqu.pKOcYNqNelPtX/WaBXnEayuWVtC8h/6'),
(166, 0, 'Test11:01AM', '2135463213', NULL, 0, 0, NULL, NULL, NULL, NULL, 'images/gstr-2.png', NULL, NULL, NULL, '2024-02-15 05:31:26', '', '', '', '0000-00-00', 'lalinisahusirri@gmail.com', NULL, '$2y$10$Wi8aCnrokn1mobK8oHw7hegU7nhGLn8dpo.Ffdg0Cw9DUXjjfp3g.'),
(167, 0, 'Kamal', '7879701413', 'Bilaspur', 22, 112, '495001', 'Vasant Vihar', 'DCVPP7139o', '098765432123', NULL, NULL, NULL, NULL, '2024-02-15 05:33:55', 'Ramcharan Dewangan', 'Dewangan', '2022-2023', '2000-11-11', 'vp01889@gmail.com', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer_answer_question_service`
--

CREATE TABLE `customer_answer_question_service` (
  `id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `asnwer` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `customer_answer_question_service`
--

INSERT INTO `customer_answer_question_service` (`id`, `service_id`, `question_id`, `asnwer`, `cat_id`) VALUES
(1, 41, 38, 1, 9),
(2, 41, 39, 0, 9),
(3, 41, 40, 1, 9),
(4, 41, 38, 1, 9),
(5, 41, 39, 0, 9),
(6, 41, 40, 1, 9),
(7, 41, 38, 1, 9),
(8, 41, 39, 0, 9),
(9, 41, 40, 1, 9),
(10, 41, 38, 1, 9),
(11, 41, 39, 0, 9),
(12, 41, 40, 1, 9),
(13, 41, 38, 1, 9),
(14, 41, 39, 0, 9),
(15, 41, 40, 1, 9),
(16, 41, 38, 1, 9),
(17, 41, 39, 0, 9),
(18, 41, 40, 1, 9),
(19, 41, 38, 1, 9),
(20, 41, 39, 0, 9),
(21, 41, 40, 1, 9),
(22, 41, 38, 0, 9),
(23, 41, 39, 0, 9),
(24, 41, 40, 0, 9),
(25, 41, 38, 0, 9),
(26, 41, 39, 0, 9),
(27, 41, 40, 0, 9),
(28, 41, 38, 0, 9),
(29, 41, 39, 0, 9),
(30, 41, 40, 0, 9),
(31, 41, 38, 0, 9),
(32, 41, 39, 0, 9),
(33, 41, 40, 0, 9),
(34, 41, 38, 0, 9),
(35, 41, 39, 0, 9),
(36, 41, 40, 0, 9),
(37, 41, 38, 0, 9),
(38, 41, 39, 0, 9),
(39, 41, 40, 0, 9),
(40, 41, 38, 0, 9),
(41, 41, 39, 1, 9),
(42, 41, 40, 1, 9),
(43, 41, 38, 0, 9),
(44, 41, 39, 0, 9),
(45, 41, 40, 0, 9),
(46, 41, 38, 0, 9),
(47, 41, 39, 0, 9),
(48, 41, 40, 0, 9),
(49, 74, 115, 0, 9),
(50, 74, 116, 0, 9),
(51, 74, 115, 0, 9),
(52, 74, 116, 0, 9),
(53, 74, 115, 0, 9),
(54, 74, 116, 0, 9),
(55, 74, 115, 0, 9),
(56, 74, 116, 0, 9),
(57, 74, 115, 0, 9),
(58, 74, 116, 1, 9),
(59, 73, 114, 0, 9),
(60, 72, 113, 0, 9),
(61, 71, 111, 1, 9),
(62, 71, 112, 1, 9),
(63, 71, 111, 1, 9),
(64, 71, 112, 1, 9),
(65, 74, 115, 0, 9),
(66, 74, 116, 0, 9),
(67, 73, 114, 1, 9),
(68, 73, 114, 0, 9),
(69, 74, 115, 0, 9),
(70, 74, 116, 0, 9),
(71, 74, 115, 0, 9),
(72, 74, 116, 0, 9),
(73, 74, 115, 0, 9),
(74, 74, 116, 0, 9),
(75, 73, 114, 0, 9),
(76, 73, 114, 0, 9),
(77, 72, 113, 0, 9),
(78, 74, 115, 0, 9),
(79, 74, 116, 0, 9),
(80, 74, 115, 0, 9),
(81, 74, 116, 0, 9),
(82, 73, 114, 0, 9),
(83, 74, 115, 0, 9),
(84, 74, 116, 0, 9),
(85, 74, 115, 0, 9),
(86, 74, 116, 0, 9),
(87, 74, 115, 0, 9),
(88, 74, 116, 0, 9),
(89, 72, 113, 0, 9),
(90, 74, 115, 0, 9),
(91, 74, 116, 0, 9),
(92, 74, 115, 0, 9),
(93, 74, 116, 0, 9),
(94, 74, 115, 0, 9),
(95, 74, 116, 0, 9),
(96, 74, 115, 0, 9),
(97, 74, 116, 0, 9),
(98, 74, 115, 0, 9),
(99, 74, 116, 0, 9),
(100, 74, 115, 0, 9),
(101, 74, 116, 0, 9),
(102, 74, 115, 0, 9),
(103, 74, 116, 0, 9),
(104, 74, 115, 0, 9),
(105, 74, 116, 0, 9),
(106, 74, 115, 0, 9),
(107, 74, 116, 0, 9),
(108, 74, 115, 0, 9),
(109, 74, 116, 0, 9),
(110, 74, 115, 0, 9),
(111, 74, 116, 0, 9),
(112, 74, 115, 0, 9),
(113, 74, 116, 0, 9),
(114, 74, 115, 0, 9),
(115, 74, 116, 0, 9),
(116, 70, 109, 0, 9),
(117, 70, 110, 0, 9),
(118, 73, 114, 0, 9),
(119, 74, 115, 0, 9),
(120, 74, 116, 0, 9),
(121, 74, 115, 0, 9),
(122, 74, 116, 0, 9),
(123, 73, 114, 0, 9),
(124, 73, 114, 0, 9),
(125, 70, 109, 0, 9),
(126, 70, 110, 0, 9),
(127, 71, 111, 0, 9),
(128, 71, 112, 0, 9),
(129, 72, 113, 0, 9),
(130, 71, 111, 0, 9),
(131, 71, 112, 0, 9),
(132, 71, 111, 0, 9),
(133, 71, 112, 0, 9),
(134, 66, 97, 0, 9),
(135, 66, 98, 0, 9),
(136, 66, 99, 0, 9),
(137, 66, 100, 0, 9),
(138, 66, 101, 0, 9),
(139, 66, 102, 0, 9),
(140, 66, 97, 0, 9),
(141, 66, 98, 0, 9),
(142, 66, 99, 0, 9),
(143, 66, 100, 0, 9),
(144, 66, 101, 0, 9),
(145, 66, 102, 0, 9),
(146, 72, 113, 0, 9),
(147, 77, 119, 0, 9),
(148, 77, 119, 0, 9),
(149, 74, 115, 0, 9),
(150, 74, 116, 0, 9),
(151, 78, 120, 0, 9),
(152, 78, 120, 0, 9),
(153, 74, 115, 0, 9),
(154, 74, 116, 0, 9),
(155, 78, 120, 0, 9),
(156, 78, 120, 0, 9),
(157, 96, 123, 0, 9),
(158, 96, 123, 0, 9),
(159, 97, 124, 0, 9),
(160, 97, 124, 0, 9),
(161, 96, 123, 0, 9),
(162, 96, 123, 0, 9),
(163, 98, 125, 0, 9),
(164, 98, 126, 0, 9),
(165, 98, 127, 0, 9),
(166, 98, 128, 0, 9),
(167, 111, 134, 0, 22),
(168, 111, 135, 0, 22),
(169, 111, 134, 0, 22),
(170, 111, 135, 0, 22),
(171, 111, 134, 0, 22),
(172, 111, 135, 0, 22),
(173, 112, 136, 0, 22),
(174, 112, 137, 0, 22),
(175, 112, 138, 0, 22),
(176, 113, 139, 0, 22),
(177, 113, 140, 0, 22),
(178, 112, 136, 0, 22),
(179, 112, 137, 0, 22),
(180, 112, 138, 0, 22),
(181, 113, 139, 0, 22),
(182, 113, 140, 0, 22),
(183, 112, 136, 0, 22),
(184, 112, 137, 0, 22),
(185, 112, 138, 0, 22),
(186, 113, 139, 0, 22),
(187, 113, 140, 0, 22),
(188, 112, 136, 0, 22),
(189, 112, 137, 0, 22),
(190, 112, 138, 0, 22);

-- --------------------------------------------------------

--
-- Table structure for table `documentlist`
--

CREATE TABLE `documentlist` (
  `id` int(11) NOT NULL,
  `name` varchar(125) NOT NULL,
  `type` varchar(15) DEFAULT NULL,
  `fieldorfile` int(11) NOT NULL COMMENT '1-field, 2-doc',
  `mandetory` varchar(15) NOT NULL DEFAULT '0',
  `timedate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `documentlist`
--

INSERT INTO `documentlist` (`id`, `name`, `type`, `fieldorfile`, `mandetory`, `timedate`) VALUES
(1, 'Pan No', 'text', 1, 'optional', '2023-06-30 13:23:32'),
(3, 'aadhar no', 'int', 1, 'optional', '2023-06-30 13:24:53'),
(4, 'Aadhar photo', 'photo', 2, 'mandatory', '2023-07-01 08:51:18'),
(5, 'prevous gst bill', 'file', 2, 'optional', '2023-07-01 10:54:28'),
(6, 'voter id card', 'file', 2, 'optional', '2023-11-25 06:24:09');

-- --------------------------------------------------------

--
-- Table structure for table `download`
--

CREATE TABLE `download` (
  `id` int(11) NOT NULL,
  `name` varchar(225) DEFAULT NULL,
  `url` varchar(225) DEFAULT NULL,
  `about` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ecounter`
--

CREATE TABLE `ecounter` (
  `eno` int(11) NOT NULL,
  `spnosor` varchar(10) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `memcode` varchar(15) DEFAULT NULL,
  `employeetype` varchar(11) DEFAULT NULL,
  `incentivetype` varchar(10) DEFAULT NULL,
  `incentive` float(10,2) NOT NULL DEFAULT 0.00,
  `withdraw` float(10,2) NOT NULL DEFAULT 0.00,
  `first_name` varchar(20) DEFAULT NULL,
  `present_address` varchar(125) DEFAULT NULL,
  `present_city` varchar(20) DEFAULT NULL,
  `present_district` varchar(20) DEFAULT NULL,
  `present_state` varchar(20) DEFAULT NULL,
  `present_pin_code` varchar(6) DEFAULT NULL,
  `present_country` varchar(20) DEFAULT NULL,
  `sex` varchar(6) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `pan_number` varchar(15) DEFAULT NULL,
  `mobile_no` varchar(10) DEFAULT NULL,
  `tel_phone_no` varchar(14) DEFAULT NULL,
  `qualificaton` varchar(20) DEFAULT NULL,
  `other_qualification` varchar(50) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `pan_wallet` float(10,2) DEFAULT NULL,
  `e_wallet` float(10,2) DEFAULT NULL,
  `reward_wallet` float(10,2) DEFAULT NULL,
  `ecounter` varchar(125) DEFAULT NULL,
  `pic` varchar(125) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1 for active, 2 for not',
  `timedate` timestamp NOT NULL DEFAULT current_timestamp(),
  `ip` varchar(65) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ecounter`
--

INSERT INTO `ecounter` (`eno`, `spnosor`, `username`, `memcode`, `employeetype`, `incentivetype`, `incentive`, `withdraw`, `first_name`, `present_address`, `present_city`, `present_district`, `present_state`, `present_pin_code`, `present_country`, `sex`, `dob`, `pan_number`, `mobile_no`, `tel_phone_no`, `qualificaton`, `other_qualification`, `Email`, `Password`, `pan_wallet`, `e_wallet`, `reward_wallet`, `ecounter`, `pic`, `status`, `timedate`, `ip`) VALUES
(1, NULL, '436998', '4175', 'employee', 'percentage', 5.00, 0.00, 'Ishan Gupta', '', 'Durg', 'Balod', 'Chhattisgarh', NULL, 'india', NULL, NULL, NULL, '9876809980', '', NULL, NULL, '', '708260', NULL, NULL, NULL, '', '1689925173.png', 1, '2023-07-11 08:44:04', '2401:4900:1c33:3f42:d1c1:9592:fbb5:3bce'),
(2, '9876809980', '849678', '1534', 'freelance', 'percentage', 10.00, 0.00, 'Rahul', '', 'raipur', 'Balod', 'Chhattisgarh', NULL, 'india', NULL, NULL, NULL, '9754680672', '', NULL, NULL, '', '624618', NULL, NULL, NULL, 'Rahul shop', '1689922350.png', 1, '2023-07-15 08:04:58', '2401:4900:1c33:9bce:201d:abb3:27c1:a271'),
(3, '9754680672', NULL, NULL, 'refer', 'commision', 0.00, 0.00, 'harish singh', NULL, 'raipur', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9754680673', NULL, NULL, NULL, 'info@bebroker.net', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2023-07-21 07:35:52', '::1'),
(4, '', NULL, NULL, 'refer', 'commision', 0.00, 0.00, 'pooja mourya', NULL, 'bilaspur', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9309276992', NULL, NULL, NULL, 'info@nableinvent.com', '9309276992', NULL, NULL, NULL, NULL, 'userr.png', 1, '2023-07-21 07:38:34', '::1'),
(5, '9754680673', '9754680644', NULL, 'refer', 'commision', 0.00, 0.00, 'mukesh sahu', NULL, 'rajnanad goaw', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9754680644', NULL, NULL, NULL, 'mukesh.sahu@gmail.com', '9754680644', NULL, NULL, NULL, NULL, 'userr.png', 2, '2023-08-03 10:06:06', '::1'),
(6, '9754680644', '9575126777', NULL, 'refer', 'commision', 0.00, 0.00, 'john cena', NULL, 'raipur', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9575126777', NULL, NULL, NULL, 'john@gmail.com', '9575126777', NULL, NULL, NULL, NULL, 'userr.png', 1, '2023-08-03 12:29:04', '::1'),
(7, '9575126777', '9588826777', NULL, 'refer', 'commision', 0.00, 0.00, 'renuka sharma', NULL, 'raipur', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9588826777', NULL, NULL, NULL, 'renuka@gmail.com', '9588826777', NULL, NULL, NULL, NULL, 'userr.png', 2, '2023-08-03 12:49:14', '::1'),
(8, NULL, '210081', '5238', 'employee', 'percentage', 10.00, 0.00, 'test kumar', '', 'RAIPUR', 'Raipur', 'Chhattisgarh', NULL, 'india', NULL, NULL, NULL, '9700689991', '9575126271', NULL, NULL, '', '796917', NULL, NULL, NULL, 'RR Enterprises', NULL, 1, '2023-11-25 06:27:22', '::1'),
(9, NULL, 'Ravi', '2448', 'employee', 'percentage', 5.00, 0.00, 'Ravi', 'skjdfkshf kshdf kshdfk ', 'Bilaspur', 'Bilaspur', 'Chhattisgarh', NULL, 'india', NULL, NULL, NULL, '7879701413', '7879701413', NULL, NULL, 'pandey.ravi9800@gmail.com', '123456', NULL, NULL, NULL, '', '1706919628.jpg', 1, '2024-02-02 22:19:30', '::1'),
(10, NULL, 'ravi', '9049', 'employee', 'fixed', 10.00, 0.00, 'ravi', 'hghvjhb', 'Bilaspur', 'Bilaspur', 'Chhattisgarh', NULL, 'india', NULL, NULL, NULL, '7879701413', '7879701413', NULL, NULL, 'pandey.ravi9800@gmail.com', '123456', NULL, NULL, NULL, '', NULL, 1, '2024-02-03 14:17:00', '::1'),
(11, NULL, 'subad', '3560', 'employee', 'fixed', 50.00, 0.00, 'sub admin 12:22AM', 'qwerty', 'Raipur', 'Raipur', 'Chhattisgarh', NULL, 'india', NULL, NULL, NULL, '7878756213', '', NULL, NULL, 'The.subad12@gmail.com', '123456', NULL, NULL, NULL, '', '1707420160.png', 1, '2024-02-08 18:53:49', '::1'),
(12, NULL, '7410852963', '5975', 'employee', 'percentage', 2.00, 0.00, 'test In Mornin', '', '2', 'Balod', 'Chhattisgarh', NULL, 'india', NULL, NULL, NULL, '7410852963', '', NULL, NULL, '', '152095', NULL, NULL, NULL, '', NULL, 2, '2024-02-09 00:16:48', '::1'),
(13, NULL, 'mornin', '1384', 'freelance', 'percentage', 15.00, 0.00, 'test In Mornin', '', 'Raipur', 'Balod', 'Chhattisgarh', NULL, 'india', NULL, NULL, NULL, '7879701413', '', NULL, NULL, '', '123456', NULL, NULL, NULL, '', NULL, 1, '2024-02-09 00:17:39', '::1'),
(14, NULL, 'idk', '4577', 'employee', 'fixed', 25.00, 0.00, 'Another Test In Morn', '', 'Korba', 'Balod', 'Chhattisgarh', NULL, 'india', NULL, NULL, NULL, '9589654258', '', NULL, NULL, '', 'idk', NULL, NULL, NULL, '', NULL, 1, '2024-02-09 00:23:30', '::1'),
(15, NULL, 'kyo', '2312', 'refer', 'percentage', 35.00, 0.00, 'another another test', '', 'Kyoto', 'Balod', 'Chhattisgarh', NULL, 'india', NULL, NULL, NULL, '9578524562', '', NULL, NULL, '', 'too', NULL, NULL, NULL, '', NULL, 1, '2024-02-09 00:32:24', '::1'),
(16, NULL, '', '4105', '', '', 0.00, 0.00, '', '', '', '', '', NULL, 'india', NULL, NULL, NULL, '', '', NULL, NULL, '', '', NULL, NULL, NULL, '', NULL, 1, '2024-02-09 00:43:31', '::1'),
(17, NULL, '', '9329', '', '', 0.00, 0.00, '', '', '', '', '', NULL, 'india', NULL, NULL, NULL, '', '', NULL, NULL, '', '', NULL, NULL, NULL, '', NULL, 1, '2024-02-09 00:43:33', '::1'),
(18, NULL, '', '5711', '', '', 0.00, 0.00, '', '', '', '', '', NULL, 'india', NULL, NULL, NULL, '', '', NULL, NULL, '', '', NULL, NULL, NULL, '', NULL, 1, '2024-02-09 00:43:35', '::1'),
(19, NULL, '', '4675', '', '', 0.00, 0.00, '', '', '', '', '', NULL, 'india', NULL, NULL, NULL, '', '', NULL, NULL, '', '', NULL, NULL, NULL, '', NULL, 1, '2024-02-09 00:43:37', '::1'),
(20, NULL, '', '8559', '', '', 0.00, 0.00, '', '', '', '', '', NULL, 'india', NULL, NULL, NULL, '', '', NULL, NULL, '', '', NULL, NULL, NULL, '', NULL, 1, '2024-02-09 00:43:40', '::1'),
(21, NULL, '', '1911', '', '', 0.00, 0.00, '', '', '', '', '', NULL, 'india', NULL, NULL, NULL, '', '', NULL, NULL, '', '', NULL, NULL, NULL, '', NULL, 1, '2024-02-09 00:43:42', '::1'),
(22, NULL, '', '7403', '', '', 0.00, 0.00, '', '', '', '', '', NULL, 'india', NULL, NULL, NULL, '', '', NULL, NULL, '', '', NULL, NULL, NULL, '', NULL, 1, '2024-02-09 00:43:44', '::1'),
(23, NULL, '', '4322', '', '', 0.00, 0.00, '', '', '', '', '', NULL, 'india', NULL, NULL, NULL, '', '', NULL, NULL, '', '', NULL, NULL, NULL, '', NULL, 1, '2024-02-09 00:43:52', '::1'),
(24, NULL, '', '6743', '', '', 0.00, 0.00, '', '', '', '', '', NULL, 'india', NULL, NULL, NULL, '', '', NULL, NULL, '', '', NULL, NULL, NULL, '', NULL, 1, '2024-02-09 00:43:54', '::1'),
(25, NULL, '', '7102', '', '', 0.00, 0.00, '', '', '', '', '', NULL, 'india', NULL, NULL, NULL, '', '', NULL, NULL, '', '', NULL, NULL, NULL, '', NULL, 1, '2024-02-09 00:43:56', '::1'),
(26, NULL, '', '4184', '', '', 0.00, 0.00, '', '', '', '', '', NULL, 'india', NULL, NULL, NULL, '', '', NULL, NULL, '', '', NULL, NULL, NULL, '', NULL, 1, '2024-02-09 00:43:59', '::1'),
(27, NULL, '', '9910', '', '', 0.00, 0.00, '', '', '', '', '', NULL, 'india', NULL, NULL, NULL, '', '', NULL, NULL, '', '', NULL, NULL, NULL, '', NULL, 1, '2024-02-09 00:44:01', '::1'),
(28, NULL, '', '1114', '', '', 0.00, 0.00, '', '', '', '', '', NULL, 'india', NULL, NULL, NULL, '', '', NULL, NULL, '', '', NULL, NULL, NULL, '', NULL, 1, '2024-02-09 00:44:03', '::1'),
(29, NULL, '', '6529', '', '', 0.00, 0.00, '', '', '', '', '', NULL, 'india', NULL, NULL, NULL, '', '', NULL, NULL, '', '', NULL, NULL, NULL, '', NULL, 1, '2024-02-09 00:44:05', '::1'),
(30, NULL, '', '9203', '', '', 0.00, 0.00, '', '', '', '', '', NULL, 'india', NULL, NULL, NULL, '', '', NULL, NULL, '', '', NULL, NULL, NULL, '', NULL, 1, '2024-02-09 00:44:07', '::1'),
(31, NULL, '', '1831', '', '', 0.00, 0.00, '', '', '', '', '', NULL, 'india', NULL, NULL, NULL, '', '', NULL, NULL, '', '', NULL, NULL, NULL, '', NULL, 1, '2024-02-09 00:44:09', '::1'),
(32, NULL, '', '6074', '', '', 0.00, 0.00, '', '', '', '', '', NULL, 'india', NULL, NULL, NULL, '', '', NULL, NULL, '', '', NULL, NULL, NULL, '', NULL, 1, '2024-02-09 00:44:12', '::1'),
(33, NULL, '', '4901', '', '', 0.00, 0.00, '', '', '', '', '', NULL, 'india', NULL, NULL, NULL, '', '', NULL, NULL, '', '', NULL, NULL, NULL, '', NULL, 1, '2024-02-09 00:44:14', '::1'),
(34, NULL, '', '4057', '', '', 0.00, 0.00, '', '', '', '', '', NULL, 'india', NULL, NULL, NULL, '', '', NULL, NULL, '', '', NULL, NULL, NULL, '', NULL, 1, '2024-02-09 00:44:16', '::1'),
(35, NULL, '', '8963', '', '', 0.00, 0.00, '', '', '', '', '', NULL, 'india', NULL, NULL, NULL, '', '', NULL, NULL, '', '', NULL, NULL, NULL, '', NULL, 1, '2024-02-09 00:44:18', '::1'),
(36, NULL, '', '8707', '', '', 0.00, 0.00, '', '', '', '', '', NULL, 'india', NULL, NULL, NULL, '', '', NULL, NULL, '', '', NULL, NULL, NULL, '', NULL, 1, '2024-02-09 00:44:20', '::1'),
(37, NULL, '', '9503', '', '', 0.00, 0.00, '', '', '', '', '', NULL, 'india', NULL, NULL, NULL, '', '', NULL, NULL, '', '', NULL, NULL, NULL, '', NULL, 1, '2024-02-09 00:44:22', '::1'),
(38, NULL, '', '1691', '', '', 0.00, 0.00, '', '', '', '', '', NULL, 'india', NULL, NULL, NULL, '', '', NULL, NULL, '', '', NULL, NULL, NULL, '', NULL, 1, '2024-02-09 00:44:25', '::1'),
(39, NULL, '', '7342', '', '', 0.00, 0.00, '', '', '', '', '', NULL, 'india', NULL, NULL, NULL, '', '', NULL, NULL, '', '', NULL, NULL, NULL, '', NULL, 1, '2024-02-09 00:44:27', '::1'),
(40, NULL, '', '2309', '', '', 0.00, 0.00, '', '', '', '', '', NULL, 'india', NULL, NULL, NULL, '', '', NULL, NULL, '', '', NULL, NULL, NULL, '', NULL, 1, '2024-02-09 00:44:29', '::1'),
(41, NULL, '', '7135', '', '', 0.00, 0.00, '', '', '', '', '', NULL, 'india', NULL, NULL, NULL, '', '', NULL, NULL, '', '', NULL, NULL, NULL, '', NULL, 1, '2024-02-09 00:44:31', '::1'),
(42, NULL, 'Pandey', '9455', 'employee', 'percentage', 25.00, 0.00, 'Pandey S. Ravi', '', 'Bilaspur', 'Balod', 'Chhattisgarh', NULL, 'india', NULL, NULL, NULL, '7879701413', '', NULL, NULL, 'pandey.ravi9800@gmail.com', 'ravi', NULL, NULL, NULL, '', NULL, 1, '2024-02-09 00:47:16', '::1'),
(43, NULL, 'qwerty', '3212', 'freelance', 'fixed', 30.00, 0.00, 'Ravi S. P.', '', 'Bilaspur', 'Balod', 'Chhattisgarh', NULL, 'india', NULL, NULL, NULL, '7879701413', '', NULL, NULL, 'pandey.ravi9800@gmail.com', 'qwerty', NULL, NULL, NULL, '', NULL, 1, '2024-02-09 01:01:13', '::1'),
(44, NULL, 'ravi', '1643', 'employee', 'percentage', 85.00, 0.00, 'Ravi P.', 'qwerty', 'Mungeli', 'Balod', 'Chhattisgarh', NULL, 'india', NULL, NULL, NULL, '7879701413', '', NULL, NULL, 'pandey.ravi9800@gmail.com', 'ravi', NULL, NULL, NULL, '', NULL, 1, '2024-02-09 01:06:24', '::1'),
(45, NULL, 'qwertyu', '7013', 'employee', 'fixed', 5.00, 0.00, 'qwert', '', 'sdfghj', 'Balod', 'Chhattisgarh', NULL, 'india', NULL, NULL, NULL, '6565355323', '', NULL, NULL, '', '593128', NULL, NULL, NULL, '', NULL, 1, '2024-02-09 02:25:34', '::1'),
(46, NULL, '7485963215', '4876', 'employee', 'fixed', 10.00, 0.00, 'Emp for MSG test', '', 'Bilaspur', 'Balod', 'Chhattisgarh', NULL, 'india', NULL, NULL, NULL, '7485963215', '', NULL, NULL, '', '123456', NULL, NULL, NULL, '', '1707450145.jpg', 2, '2024-02-09 03:41:07', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `eid` int(11) NOT NULL,
  `empcard` varchar(222) NOT NULL,
  `position` varchar(222) NOT NULL,
  `ename` varchar(222) NOT NULL,
  `eemail` varchar(222) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `gender` int(11) NOT NULL COMMENT '1-male, 2-female, 3-transgender',
  `address` varchar(250) NOT NULL,
  `type` int(11) NOT NULL COMMENT '1-active, 2-inactive',
  `sales` int(11) NOT NULL COMMENT '1-sales, 2- non-sales'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `forminput`
--

CREATE TABLE `forminput` (
  `id` int(11) NOT NULL,
  `taskno` int(11) NOT NULL,
  `stfid` int(11) NOT NULL,
  `cusid` int(11) NOT NULL,
  `formid` int(11) NOT NULL,
  `docname` int(11) NOT NULL,
  `docval` varchar(225) DEFAULT NULL,
  `docfile` varchar(85) DEFAULT NULL,
  `fieldname` varchar(222) NOT NULL,
  `fieldvalue` varchar(222) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `forminput`
--

INSERT INTO `forminput` (`id`, `taskno`, `stfid`, `cusid`, `formid`, `docname`, `docval`, `docfile`, `fieldname`, `fieldvalue`) VALUES
(1, 1, 35, 17, 41, 21, NULL, '', '', ''),
(2, 1, 35, 17, 41, 10, NULL, '41d50999eab83aa822ce2333194ba49d.jpg', '', ''),
(3, 2, 35, 17, 41, 6, '', NULL, '', ''),
(4, 2, 35, 17, 41, 21, NULL, '', '', ''),
(5, 2, 35, 17, 41, 10, NULL, 'f02b347a40e25e75c61d0c02984b5c7f.jpg', '', ''),
(6, 3, 35, 17, 41, 21, NULL, '', '', ''),
(7, 3, 35, 17, 41, 10, NULL, 'be0dde8d3077f1aae8190989b3f166e4.jpg', '', ''),
(8, 5, 35, 3, 41, 21, NULL, 'd0060d99a46dacce878db09960448661.jpg', '', ''),
(9, 5, 35, 3, 41, 10, NULL, '599c5e6e70fbfb34e3ed77beaafbb6d2.jpg', '', ''),
(10, 6, 35, 16, 41, 6, '231343141341', NULL, '', ''),
(11, 6, 35, 16, 41, 21, NULL, 'b88f1cf295347a8d16a48c11a597c244.jpg', '', ''),
(12, 6, 35, 16, 41, 10, NULL, 'b8eff50a5c7a2975da4b7619bc4c0513.jpg', '', ''),
(13, 7, 35, 17, 41, 21, NULL, '33208216b09ad230de4627cc79ae9580.jpg', '', ''),
(14, 7, 35, 17, 41, 10, NULL, '2379e10cf6097c729f89e36f499a0b42.jpg', '', ''),
(15, 8, 35, 17, 41, 21, NULL, 'ab28ca12130682290ebe69d94835cc74.jpg', '', ''),
(16, 8, 35, 17, 41, 10, NULL, '2bec25c7052ca3af74bb68a944c4a8b0.jpg', '', ''),
(17, 9, 35, 17, 41, 21, NULL, 'ad6bf5b63eb85eb2f5a7d234f10af6bb.jpg', '', ''),
(18, 9, 35, 17, 41, 10, NULL, '935a163464edb2a628a8ba94dde13f6a.jpg', '', ''),
(19, 10, 35, 17, 41, 21, NULL, 'f2bc8fab6fad46dc42ea3f0eb1c7baa9.jpg', '', ''),
(20, 10, 35, 17, 41, 10, NULL, '7cf3f28d9ec1a15b45884d26bec24288.jpg', '', ''),
(21, 11, 35, 17, 41, 21, NULL, '3d1bd12c1992c763f23e7e596afe50ba.jpg', '', ''),
(22, 11, 35, 17, 41, 10, NULL, '9ca2a569cfe5c722014ebda9e1591fa9.jpg', '', ''),
(23, 12, 35, 17, 41, 21, NULL, '55b6758b27dcdb27d965238c01ce36a0.jpg', '', ''),
(24, 12, 35, 17, 41, 10, NULL, '11073cf6ccdf58f331e4ca77cee007b4.jpg', '', ''),
(25, 13, 35, 17, 41, 21, NULL, '9ae3861b4685fd1c68666bf42f885191.jpg', '', ''),
(26, 13, 35, 17, 41, 10, NULL, '9f95a0236e62993fe17b7493fd0e8b58.jpg', '', ''),
(27, 14, 35, 17, 41, 21, NULL, 'fd2aadd712e27a53855ebc52edd645d1.jpg', '', ''),
(28, 14, 35, 17, 41, 10, NULL, 'bb32fd37500b5a4d065d2ddbde40dc65.jpg', '', ''),
(29, 15, 35, 17, 41, 21, NULL, '9513d76dd7999ad7e9313007d3075358.jpg', '', ''),
(30, 15, 35, 17, 41, 10, NULL, '45166f48242bcf1c9ed0a2bc304f4856.jpg', '', ''),
(31, 16, 35, 17, 41, 21, NULL, '3c88c6e3d74b9d4500fab5897f95b271.jpg', '', ''),
(32, 16, 35, 17, 41, 10, NULL, 'd1c7234586ef3e21bb428281a1a91e34.jpg', '', ''),
(33, 17, 35, 17, 41, 21, NULL, 'a297be9de84b3e1cb37e6640843ee117.jpg', '', ''),
(34, 17, 35, 17, 41, 10, NULL, '50457fcfd9bc9dd11e81dd1f388022aa.jpg', '', ''),
(35, 18, 35, 17, 41, 21, NULL, '288763b413b00c75b7ddf382fc19c45d.jpg', '', ''),
(36, 18, 35, 17, 41, 10, NULL, 'a06df90e34b0fb49e22792f124433168.jpg', '', ''),
(37, 19, 35, 17, 41, 21, NULL, '0d01cfdceacfad54af92ed191552ab93.jpg', '', ''),
(38, 19, 35, 17, 41, 10, NULL, 'd9da09f7022ede36a96f7fb29a5ec8e1.jpg', '', ''),
(39, 20, 35, 17, 41, 21, NULL, '26df283dc2280bcd3986bffbc10bfb3a.jpg', '', ''),
(40, 20, 35, 17, 41, 10, NULL, '6236f0243d91ecb0f5751a95e8f67ebb.jpg', '', ''),
(41, 21, 35, 17, 41, 21, NULL, '83ba133c1efd1760f298ccb522648d2d.jpg', '', ''),
(42, 21, 35, 17, 41, 10, NULL, 'cd29dca4c880ae13dcbf6310afcf8a05.jpg', '', ''),
(43, 22, 35, 17, 41, 21, NULL, '027df30de79c0a140307a0cdf17b6e9f.jpg', '', ''),
(44, 22, 35, 17, 41, 10, NULL, 'ad2785907cb4d6e978f5a083c7b6b2c9.jpg', '', ''),
(45, 23, 35, 17, 41, 21, NULL, '13b83ba653b53578b41268474e00c662.jpg', '', ''),
(46, 23, 35, 17, 41, 10, NULL, 'dfa373a7ba7cb4e9760193c103c26a83.jpg', '', ''),
(47, 24, 35, 17, 41, 21, NULL, '154a9b6f8221aa1fee4c3f39efef6b60.jpg', '', ''),
(48, 24, 35, 17, 41, 10, NULL, '60fa5f19a23fd3721196f70aab78bbe4.jpg', '', ''),
(49, 25, 35, 17, 41, 21, NULL, '5fa71134787c74e6f6ca7c02e88ef501.jpg', '', ''),
(50, 25, 35, 17, 41, 10, NULL, 'efa896419e72105f5bdcea0b5a1a4105.jpg', '', ''),
(51, 26, 35, 17, 41, 21, NULL, '2c86a60c52e102a2c21c74a1b43befd7.jpg', '', ''),
(52, 26, 35, 17, 41, 10, NULL, '811221a0815c35d0e68eb0f331cb191c.jpg', '', ''),
(53, 27, 35, 17, 41, 21, NULL, '6826df196015c9739c6d2200f144f9cb.jpg', '', ''),
(54, 27, 35, 17, 41, 10, NULL, 'bf612ff9d3d259c9fbc496193d4314a8.jpg', '', ''),
(55, 28, 35, 17, 41, 21, NULL, '69b9ebe26511fd9951fe5bf5f0b9078a.jpg', '', ''),
(56, 28, 35, 17, 41, 10, NULL, '79b053c4cc2f159ef3549c04b3c97f1b.jpg', '', ''),
(57, 29, 35, 17, 41, 21, NULL, '5a7709219e04e0afaa736563e839b661.jpg', '', ''),
(58, 29, 35, 17, 41, 10, NULL, '9627f19268b2997d470693ef30aaebfc.jpg', '', ''),
(59, 30, 35, 17, 41, 21, NULL, '87bc2f3c921274ad2a57ee7e8a6d7485.jpg', '', ''),
(60, 30, 35, 17, 41, 10, NULL, 'ea8eb1fea112c48b2b79c114970b8fdf.jpg', '', ''),
(61, 31, 35, 17, 41, 21, NULL, 'c727eecea22aed4017d0cede993722c1.jpg', '', ''),
(62, 31, 35, 17, 41, 10, NULL, 'e81763446efa06a185c8089d7bc0e217.jpg', '', ''),
(63, 32, 35, 17, 41, 21, NULL, 'e024ed1bd0aa81c5b453b31467b5da98.jpg', '', ''),
(64, 32, 35, 17, 41, 10, NULL, '4104463a16b000c4752c77577f62b190.jpg', '', ''),
(65, 33, 35, 17, 41, 21, NULL, 'e4e9eb576a119d9063cef498398e732b.jpg', '', ''),
(66, 33, 35, 17, 41, 10, NULL, '7d33756c9a541b3a1037b7dff926a2d6.jpg', '', ''),
(67, 34, 35, 17, 41, 21, NULL, '1d27e05cc382476fd6a4ba480030cbe5.jpg', '', ''),
(68, 34, 35, 17, 41, 10, NULL, '45e649d84601d8d378dc96b5bac8b5b2.jpg', '', ''),
(69, 35, 35, 17, 41, 21, NULL, '112d2c5717a33ea581309195f284df8f.jpg', '', ''),
(70, 35, 35, 17, 41, 10, NULL, '497ea36db152d0ee27712f38202ce859.jpg', '', ''),
(71, 36, 35, 17, 41, 21, NULL, 'a90651998118230f8fd6b03d284927a8.jpg', '', ''),
(72, 36, 35, 17, 41, 10, NULL, 'd242f18dc1edc8ae91d5ebfd9a566498.jpg', '', ''),
(73, 37, 35, 17, 41, 21, NULL, '56084d391f962a617c7ab3028fb01342.jpg', '', ''),
(74, 37, 35, 17, 41, 10, NULL, '284cf5c3e352fd9ca8044c52f182fbb0.jpg', '', ''),
(75, 38, 35, 17, 41, 6, 'T', NULL, '', ''),
(76, 38, 35, 17, 41, 21, NULL, 'bae94bcce569edb0bf173b3a3814b39a.jpg', '', ''),
(77, 38, 35, 17, 41, 10, NULL, '0eb744332c383e939049abbc5f988a6b.jpg', '', ''),
(78, 39, 35, 17, 41, 6, 'T', NULL, '', ''),
(79, 39, 35, 17, 41, 21, NULL, 'c1aaf4822e9adfe8464594e75ab8aa25.jpg', '', ''),
(80, 39, 35, 17, 41, 10, NULL, 'a396e14148f7fb44572821954ac086a3.jpg', '', ''),
(81, 40, 35, 17, 41, 6, 'T', NULL, '', ''),
(82, 40, 35, 17, 41, 21, NULL, '7aff2f5c834e8faaa4e7411473b06712.jpg', '', ''),
(83, 40, 35, 17, 41, 10, NULL, '0ec2b1495ba79b487c9ce7d884404147.jpg', '', ''),
(84, 41, 35, 17, 41, 6, '', NULL, '', ''),
(85, 41, 35, 17, 41, 21, NULL, 'a1d792e2297bfef7eb38586bedc2e758.jpg', '', ''),
(86, 41, 35, 17, 41, 10, NULL, '1b24350157fbfa50d22ebcdde0dbe99b.jpg', '', ''),
(87, 42, 35, 17, 41, 6, '', NULL, '', ''),
(88, 42, 35, 17, 41, 21, NULL, '8b2f33c401bf8fdb56cef5afa3b1b0ce.jpg', '', ''),
(89, 42, 35, 17, 41, 10, NULL, '334da712050ffa495acc872b1a1ba894.jpg', '', ''),
(90, 43, 35, 17, 41, 6, 'try ', NULL, '', ''),
(91, 43, 35, 17, 41, 21, NULL, '71e57f5418996aab6992bcc30566eeac.jpg', '', ''),
(92, 43, 35, 17, 41, 10, NULL, '3dd0c92bdc8f5671273c272f1b0ff688.jpg', '', ''),
(93, 44, 35, 17, 41, 6, 'try ', NULL, '', ''),
(94, 44, 35, 17, 41, 21, NULL, '4cbf16192c3fbfa334363e25574843b2.jpg', '', ''),
(95, 44, 35, 17, 41, 10, NULL, '9ceac70713930889dbf901a358d6ac79.jpg', '', ''),
(96, 45, 35, 17, 41, 21, NULL, '7501d47ab5ab143d0285596699b03644.jpg', '', ''),
(97, 45, 35, 17, 41, 10, NULL, '8f2efc7c0b692f873270465dfb8935e1.jpg', '', ''),
(98, 46, 35, 17, 41, 21, NULL, '0a88cbfb33b67ced0827173ab9c30131.jpg', '', ''),
(99, 46, 35, 17, 41, 10, NULL, '801910317197459e3af2a0ad4680a5c8.jpg', '', ''),
(100, 47, 35, 17, 41, 21, NULL, 'e46da284fa0d15fcbe4237a9bcec6166.jpg', '', ''),
(101, 47, 35, 17, 41, 10, NULL, 'f594015016516508e6097b6040e690c3.jpg', '', ''),
(102, 48, 35, 17, 41, 21, NULL, 'ada6197fd659e8c4a7214d25a6b98353.jpg', '', ''),
(103, 48, 35, 17, 41, 10, NULL, '51ad2242158d8e2b067d2f99e974fc7d.jpg', '', ''),
(104, 49, 35, 17, 41, 21, NULL, 'cba23b22999c980c60c38376695c1515.jpg', '', ''),
(105, 49, 35, 17, 41, 10, NULL, '054980b5e1bb7a6569ea31c9afbeafde.jpg', '', ''),
(106, 50, 35, 17, 41, 21, NULL, '23d03a5bd911f9b13f81b0db520d4e04.jpg', '', ''),
(107, 50, 35, 17, 41, 10, NULL, 'a24da18ecd2fadf4f4f70e00970b921c.jpg', '', ''),
(108, 51, 35, 17, 41, 21, NULL, 'db938aa028cc6aaa327e69211311ec4b.jpg', '', ''),
(109, 51, 35, 17, 41, 10, NULL, '2063180be11b41ddad8ba961fd9a3cc0.jpg', '', ''),
(110, 52, 35, 17, 41, 21, NULL, 'a01e4a5dc52a2fdc2837a30e0d396d63.jpg', '', ''),
(111, 52, 35, 17, 41, 10, NULL, '740336965ffa708f20228fc1d50edd88.jpg', '', ''),
(112, 53, 35, 17, 41, 21, NULL, '3a754e8af54a8cc21747a368b4b99512.jpg', '', ''),
(113, 53, 35, 17, 41, 10, NULL, '77ba0e73056b54db8f971a39cabf2902.jpg', '', ''),
(114, 54, 35, 17, 41, 21, NULL, '054aef8b86a92afee097f3aa264820d4.jpg', '', ''),
(115, 54, 35, 17, 41, 10, NULL, '40c76921f2862c3d3b05410a6a67d701.jpg', '', ''),
(116, 55, 35, 17, 41, 21, NULL, '85a814b73238f40ea54a431fe22b1ded.jpg', '', ''),
(117, 55, 35, 17, 41, 10, NULL, '24acb4673edf89d368ffdb962bec4849.jpg', '', ''),
(118, 56, 35, 17, 41, 21, NULL, '041a3866501d750fb122766e465d8d0e.jpg', '', ''),
(119, 56, 35, 17, 41, 10, NULL, 'd46c4b32c97f3436588e29e0145bab54.jpg', '', ''),
(120, 57, 35, 17, 41, 6, '234523452345', NULL, '', ''),
(121, 57, 35, 17, 41, 21, NULL, 'd03789bea2217d4a24596e85f9d78233.jpg', '', ''),
(122, 57, 35, 17, 41, 10, NULL, 'cd7dd2a5706e35a02d90496394d58a26.jpg', '', ''),
(123, 58, 35, 17, 41, 6, '234523452345', NULL, '', ''),
(124, 58, 35, 17, 41, 21, NULL, 'a9fd86fa619563cf1a0007cdebeb760e.jpg', '', ''),
(125, 58, 35, 17, 41, 10, NULL, '24b0ef6e28df4844e6d5772aeda2a786.jpg', '', ''),
(126, 59, 35, 12, 41, 21, NULL, '80c9888e3fd4c9b9ca6244703dbfe93f.jpg', '', ''),
(127, 59, 35, 12, 41, 10, NULL, '0326ef1ec7bec3d213568f377033fa82.jpg', '', ''),
(128, 60, 35, 20, 41, 21, NULL, 'e81a590f1afd6ececc2b30e00276189e.jpg', '', ''),
(129, 60, 35, 20, 41, 10, NULL, '7dd657842f22a9ba044edaefd5dad211.jpg', '', ''),
(130, 61, 35, 21, 41, 21, NULL, '0d02bd01d263ddc718164cb150719897.jpg', '', ''),
(131, 61, 35, 21, 41, 10, NULL, '829f28fdfe6cd19f98ab6e42a1c80d07.jpg', '', ''),
(132, 62, 35, 29, 41, 21, NULL, '77b58fc1ea82c712ec659198b78773fe.jpg', '', ''),
(133, 62, 35, 29, 41, 10, NULL, '3fbaf57aa93f3fdd186ee7dff9e5ae14.jpg', '', ''),
(134, 9, 7, 63, 14, 12, 'dcvpp7139h', NULL, '', ''),
(135, 9, 7, 63, 14, 13, NULL, '9779e28942f061d46678408252b6f543.gif', '', ''),
(136, 12, 7, 41, 88, 0, NULL, 'c5a6bfa8a6dadbeef5a5d641ec8aaedb.jpg', '', ''),
(137, 13, 7, 41, 88, 0, NULL, 'e43e2a96c70d36afc6fc185f9e783267.jpg', '', ''),
(138, 14, 7, 47, 92, 0, NULL, '358538889dbe90ba9e0d88a92bb08253.jpg', '', ''),
(139, 15, 7, 71, 89, 0, NULL, '37a00f0e7a31276229e8e3c0fc24484d.jpg', '', ''),
(140, 16, 7, 72, 88, 0, NULL, 'b82e457dbad2294fa0a46ad24212f0eb.jpg', '', ''),
(141, 17, 5, 75, 2, 23, 'dcvpp7139h', NULL, '', ''),
(142, 17, 5, 75, 2, 24, NULL, 'da0e411df75f66639d79cd56f07bc717.jpg', '', ''),
(143, 17, 5, 75, 2, 9, NULL, 'c5f5ffc730b622844b93bb1b6464ef9c.jpg', '', ''),
(144, 41, 7, 101, 84, 0, NULL, '85057b019de5f2d6744f98d9a7a7ec68.jpg', '', ''),
(145, 46, 7, 104, 2, 23, 'dcvpp7139h', NULL, '', ''),
(146, 46, 7, 104, 2, 24, NULL, '9fa40647aae20e3e3092ff37e243ce6e.jpg', '', ''),
(147, 46, 7, 104, 2, 9, NULL, '2e7b14e6ded0153104f100bde8080363.jpg', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `formreason`
--

CREATE TABLE `formreason` (
  `id` int(11) NOT NULL,
  `taskid` int(11) NOT NULL,
  `formid` int(11) NOT NULL,
  `actiontyp` int(11) NOT NULL COMMENT '1-hold,2-done,3-reject',
  `asdate` date DEFAULT NULL,
  `reason` varchar(75) DEFAULT NULL,
  `file` varchar(125) DEFAULT NULL,
  `timedate` timestamp NOT NULL DEFAULT current_timestamp(),
  `ip` varchar(125) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `formreason`
--

INSERT INTO `formreason` (`id`, `taskid`, `formid`, `actiontyp`, `asdate`, `reason`, `file`, `timedate`, `ip`) VALUES
(1, 0, 30, 2, '0000-00-00', '', 'b518096473d087861623eaee531c4624.', '2023-07-01 13:02:48', '::1'),
(2, 0, 30, 2, '0000-00-00', '', 'e118e24299a596c002ff000aa8f2566a.', '2023-07-01 13:06:36', '::1'),
(3, 0, 30, 3, '0000-00-00', '', 'fadbc1c93ed738b41319c7e61edea6a8.', '2023-07-01 13:07:28', '::1'),
(4, 0, 30, 2, '0000-00-00', '', '76a1bf19c1a80657ccf06eb85652bc12.', '2023-07-01 13:25:34', '::1'),
(5, 0, 30, 2, '0000-00-00', '', '69916b314b50fc628b4a87261edb80fb.', '2023-07-01 13:25:51', '::1'),
(6, 0, 30, 2, '0000-00-00', '', '23c449dc3ccded580d9f17c63e13ba23.', '2023-07-01 13:25:51', '::1'),
(7, 0, 30, 2, '0000-00-00', '', '866f9f04cb1cc75d027db9ebc35dd390.', '2023-07-01 13:25:51', '::1'),
(8, 0, 30, 1, '0000-00-00', '', '79af624940da41055168ed2359965351.pdf', '2023-07-03 06:14:45', '::1'),
(9, 0, 30, 2, '0000-00-00', '', '4b0a5553bac18e4a6ae35e60234b344e.pdf', '2023-07-03 06:27:37', '::1'),
(10, 0, 30, 2, '0000-00-00', '', '39e0a6bad92f863526c0ea984501d1af.', '2023-07-03 06:33:57', '::1'),
(11, 0, 30, 2, '0000-00-00', '', '11373392546c68e9548060321c35b3c0.', '2023-07-03 06:34:17', '::1'),
(12, 0, 30, 2, '0000-00-00', '', 'a25cb42ce0090c0e84a3e7f1684e728a.', '2023-07-03 06:34:26', '::1'),
(13, 0, 30, 2, '0000-00-00', '', '930f77467f71aea5f09b78899be397c1.', '2023-07-03 06:34:35', '::1'),
(14, 0, 30, 2, '0000-00-00', '', 'fc07e2e730212da8693430925c9ab324.', '2023-07-03 06:36:12', '::1'),
(15, 0, 30, 2, '0000-00-00', '', '10e36bc17947e8b72c3683f9e4204f8b.', '2023-07-03 06:38:54', '::1'),
(16, 0, 30, 1, '0000-00-00', '', 'e639c1da6fe2520aa56cf2fe0ce35112.', '2023-07-03 06:39:00', '::1'),
(17, 0, 30, 2, '0000-00-00', '', 'c8fba75c1691292c58ef605045d1d079.', '2023-07-03 06:39:08', '::1'),
(18, 0, 30, 2, '0000-00-00', '', '5e0bf9c4f9d73d4c0fa1efa88a70f0c4.', '2023-07-03 06:39:16', '::1'),
(19, 0, 30, 2, '0000-00-00', '', '5995a377585ce741edc93c69a842da0d.', '2023-07-03 06:39:52', '::1'),
(20, 0, 30, 2, '0000-00-00', '', '3df2d413d19034286de7c72ca09ab917.', '2023-07-03 06:39:58', '::1'),
(21, 0, 30, 2, '0000-00-00', '', '', '2023-07-03 06:40:42', '::1'),
(22, 0, 30, 2, '0000-00-00', '', '40208837c3bcf07e5fd96082a37c5edb.pdf', '2023-07-03 06:43:25', '::1'),
(23, 0, 30, 1, '2023-07-08', 'AS', '', '2023-07-03 11:39:37', '::1'),
(24, 0, 30, 3, '0000-00-00', '', '', '2023-07-03 11:39:52', '::1'),
(25, 0, 30, 1, '0000-00-00', '', '', '2023-07-03 11:39:57', '::1'),
(26, 0, 30, 2, '0000-00-00', '', '', '2023-07-03 11:40:01', '::1'),
(27, 0, 30, 3, '2023-07-11', 'tryutyu', '', '2023-07-03 11:40:13', '::1'),
(28, 0, 30, 3, '2023-07-11', 'tryutyu', '', '2023-07-03 11:42:11', '::1'),
(29, 0, 30, 1, '2023-07-11', 'AS', '6b3903e58f01ee15ad0c47913816a78e.pdf', '2023-07-03 11:43:16', '::1'),
(30, 0, 30, 1, '2023-07-11', 'AS', '229eb015b8dab6b9aa46d0a33b76fa21.pdf', '2023-07-03 11:43:49', '::1'),
(31, 0, 30, 1, '2023-07-11', 'AS', 'ec359c23d7e1b5ea5f062df76cd4d28c.pdf', '2023-07-03 11:44:20', '::1'),
(32, 0, 30, 1, '2023-07-11', 'AS', 'a2ee378799ea82700f4433032032830e.pdf', '2023-07-03 11:44:48', '::1'),
(33, 0, 30, 1, '2023-07-11', 'AS', '6607dc76f6b306f5e6185d5ca8e49eae.pdf', '2023-07-03 11:46:10', '::1'),
(34, 0, 30, 1, '2023-07-11', 'AS', '116ae2c284ad4f8adc486f6b83a3c397.pdf', '2023-07-03 11:49:27', '::1'),
(35, 0, 30, 1, '2023-07-11', 'AS', 'f9e1f7d0c5efa0c673e83b137d48c2a2.pdf', '2023-07-03 11:49:39', '::1'),
(36, 0, 30, 1, '2023-07-11', 'AS', 'e75f2f338d2c662da083a2a40bf331fd.pdf', '2023-07-03 11:50:27', '::1'),
(37, 0, 30, 1, '2023-07-11', 'AS', '2cab95901d1ec8def88263425500fa3f.pdf', '2023-07-03 11:51:04', '::1'),
(38, 0, 30, 1, '2023-07-11', 'AS', '77a9446774f2cfdc9bda708384011d3c.pdf', '2023-07-03 11:53:30', '::1'),
(39, 0, 30, 1, '2023-07-11', 'AS', '691eec5e770c872c430ce4708d2c8341.pdf', '2023-07-03 11:55:39', '::1'),
(40, 0, 30, 1, '2023-07-11', 'AS', '9aa4e6f5844b6e73b400336ee61b114d.pdf', '2023-07-03 11:56:02', '::1'),
(41, 0, 30, 1, '2023-07-11', 'AS', '59c0365f71d66314056d360f1d5682f6.pdf', '2023-07-03 11:56:05', '::1'),
(42, 0, 30, 1, '2023-07-11', 'AS', 'aafe5936ae61475ef70e1c8d3b3c1f94.pdf', '2023-07-03 11:56:30', '::1'),
(43, 0, 30, 2, '2023-06-29', 'AS2', 'df47cbcfcf06fb673d633292728f81fc.pdf', '2023-07-03 11:58:45', '::1'),
(44, 0, 30, 3, '0000-00-00', '', '', '2023-07-03 12:15:20', '::1'),
(45, 0, 30, 2, '0000-00-00', '', '', '2023-07-03 12:15:28', '::1'),
(46, 0, 31, 1, '2023-07-20', 'Lerum ipsem', '5e4fe3bb46f5a7b65a7ecd485a656ad8.pdf', '2023-07-04 11:50:48', '::1'),
(47, 0, 31, 3, '0000-00-00', '', '', '2023-07-04 11:51:57', '::1'),
(48, 0, 31, 1, '0000-00-00', '', '', '2023-07-04 11:52:20', '::1'),
(49, 0, 31, 2, '0000-00-00', '', '', '2023-07-04 12:27:11', '::1'),
(50, 0, 31, 1, '0000-00-00', '', '', '2023-07-04 12:27:29', '::1'),
(51, 0, 31, 2, '0000-00-00', '', '', '2023-07-04 12:29:27', '::1'),
(52, 0, 31, 1, '0000-00-00', '', '', '2023-07-04 12:29:39', '::1'),
(53, 0, 31, 3, '0000-00-00', '', '', '2023-07-04 12:31:09', '::1'),
(54, 0, 31, 2, '0000-00-00', '', '', '2023-07-04 12:32:02', '::1'),
(55, 0, 32, 2, '2023-07-04', '', '', '2023-07-04 13:32:11', '::1'),
(56, 0, 32, 2, '2023-07-06', 'Lerum ipsem', '9a905a3675335e148b6a87596ecfb0bf.pdf', '2023-07-05 06:32:04', '::1'),
(57, 3, 48, 1, '2023-07-05', 'Lerum ipsem', '8727281786a8a16b99ebe40fbf4d3866.pdf', '2023-07-05 08:30:12', '::1'),
(58, 4, 36, 1, '2023-07-05', 'Lerum ipsem', '', '2023-07-05 13:04:50', '::1'),
(59, 7, 8, 1, '2023-07-18', '', '', '2023-07-18 15:52:36', '::1'),
(60, 7, 8, 3, '2023-07-18', '', '', '2023-07-18 15:53:01', '::1'),
(61, 7, 8, 3, '2023-07-18', '', '', '2023-07-18 15:55:01', '::1'),
(62, 7, 8, 3, '2023-07-18', '', '', '2023-07-18 15:55:52', '::1'),
(63, 7, 8, 1, '2023-07-18', '', '', '2023-07-18 15:59:26', '::1'),
(64, 7, 8, 2, '2023-07-18', '', '', '2023-07-18 16:02:48', '::1'),
(65, 7, 8, 3, '2023-07-18', '', '', '2023-07-18 16:03:37', '::1'),
(66, 11, 3, 2, '2024-02-03', 'Done', '', '2024-02-02 22:22:41', '::1'),
(67, 11, 30, 2, '2024-02-03', 'Done', '', '2024-02-02 22:23:19', '::1'),
(68, 11, 30, 1, '2024-02-03', '', '', '2024-02-03 00:17:58', '::1'),
(69, 3, 30, 3, '2024-02-03', '', '', '2024-02-03 00:18:20', '::1'),
(70, 11, 3, 3, '2024-02-03', '', '', '2024-02-03 00:19:08', '::1'),
(71, 12, 30, 1, '2024-02-03', '', '', '2024-02-03 00:29:57', '::1'),
(72, 56, 32, 3, '2024-02-08', '', '', '2024-02-08 15:27:56', '::1'),
(73, 58, 90, 2, '2024-02-09', 'Done check it', '02b11ad76c2e6c77d9426339b8e1c68a.txt', '2024-02-08 19:13:56', '::1'),
(74, 58, 90, 1, '2024-02-09', 'Done check it plz', '8d86d95ea77c159828a3b799d6c9dd23.jpg', '2024-02-08 19:15:17', '::1'),
(75, 58, 90, 3, '2024-02-09', 'Done check it plz agi', '', '2024-02-08 19:15:46', '::1'),
(76, 57, 88, 1, '2024-02-09', 'doing it', '', '2024-02-09 03:44:09', '::1'),
(77, 70, 3, 2, '2024-02-15', '', '', '2024-02-15 05:36:49', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `form_details`
--

CREATE TABLE `form_details` (
  `id` int(11) NOT NULL,
  `form` varchar(25) DEFAULT NULL,
  `fdate` date DEFAULT NULL,
  `fstatus` varchar(10) NOT NULL DEFAULT 'PENDING',
  `counter_code` varchar(65) DEFAULT NULL,
  `fname` varchar(65) DEFAULT NULL,
  `mname` varchar(65) DEFAULT NULL,
  `lname` varchar(65) DEFAULT NULL,
  `ffname` varchar(65) DEFAULT NULL,
  `fmname` varchar(65) DEFAULT NULL,
  `flname` varchar(65) DEFAULT NULL,
  `fmom` varchar(65) DEFAULT NULL,
  `mmon` varchar(65) DEFAULT NULL,
  `lmom` varchar(65) DEFAULT NULL,
  `bod` text DEFAULT NULL,
  `email` varchar(65) DEFAULT NULL,
  `mobile` varchar(10) DEFAULT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `housenum` varchar(15) DEFAULT NULL,
  `area_street` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `state` varchar(65) DEFAULT NULL,
  `pin` varchar(6) DEFAULT NULL,
  `country` varchar(15) DEFAULT NULL,
  `id_type` varchar(125) DEFAULT NULL,
  `add_type` varchar(125) DEFAULT NULL,
  `bod_type` varchar(125) DEFAULT NULL,
  `adhar_type` varchar(125) DEFAULT NULL,
  `id_upload` varchar(225) DEFAULT NULL,
  `add_upload` varchar(225) DEFAULT NULL,
  `bod_upload` varchar(225) DEFAULT NULL,
  `adbar_upload` varchar(225) DEFAULT NULL,
  `photo_upload` varchar(225) DEFAULT NULL,
  `upload_sign` varchar(225) DEFAULT NULL,
  `filed_application` varchar(225) DEFAULT NULL,
  `application_back` varchar(225) DEFAULT NULL,
  `rcode` text DEFAULT NULL,
  `ip` varchar(65) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `form_question`
--

CREATE TABLE `form_question` (
  `q_list_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `status` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `form_question`
--

INSERT INTO `form_question` (`q_list_id`, `question`, `status`, `cat_id`, `service_id`) VALUES
(134, 'Are you an Indian? If not what is your nationality?', 0, 22, 111),
(135, 'Excavating and earthmoving services or Some Other Question like that....', 0, 22, 111),
(136, 'Are you of Legal Age to be applying for this service?', 0, 22, 112),
(137, 'Another Question Related to Your Nationality.', 0, 22, 112),
(138, 'Services involving Repair, alterations, additions, replacements, maintenance of the completion/finishing works covered above.', 0, 22, 112),
(139, 'Another Question related to your Nationality hehe...', 0, 22, 113),
(140, 'Other land transportation services of passengers.', 0, 22, 113);

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id` int(11) NOT NULL,
  `state` varchar(125) DEFAULT NULL,
  `spid` int(11) DEFAULT NULL,
  `dist` varchar(125) DEFAULT NULL,
  `dpid` int(11) DEFAULT NULL,
  `tehsil` varchar(125) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id`, `state`, `spid`, `dist`, `dpid`, `tehsil`) VALUES
(46, 'chhattisgarh', NULL, NULL, NULL, NULL),
(55, NULL, 46, 'koriya', NULL, NULL),
(56, NULL, 46, 'raipur', NULL, NULL),
(57, 'odisha', NULL, NULL, NULL, NULL),
(47, NULL, 46, 'balrampur', NULL, NULL),
(54, NULL, 46, 'surajpur', NULL, NULL),
(58, NULL, 57, 'Nuapada', NULL, NULL),
(59, NULL, 57, NULL, 58, 'Khariar'),
(60, NULL, 57, NULL, 58, 'Komna'),
(61, 'Maharastra', NULL, NULL, NULL, NULL),
(62, NULL, 61, 'Pune', NULL, NULL),
(63, NULL, 61, NULL, 62, 'haveli'),
(64, NULL, 46, NULL, 56, 'raipur'),
(65, NULL, 46, NULL, 55, 'khadgaon'),
(66, NULL, 57, NULL, 58, 'SINAPALI'),
(67, NULL, 0, 'DURG', NULL, NULL),
(68, NULL, 46, NULL, 0, 'DURG'),
(69, NULL, 46, NULL, 56, 'AARANG'),
(70, 'bihar', NULL, NULL, NULL, NULL),
(71, 'Delhi', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `noticeboard`
--

CREATE TABLE `noticeboard` (
  `id` int(11) NOT NULL,
  `stfid` int(11) NOT NULL DEFAULT 0,
  `msg` varchar(225) NOT NULL,
  `timedate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `noticeboard`
--

INSERT INTO `noticeboard` (`id`, `stfid`, `msg`, `timedate`) VALUES
(1, 0, 'please work fast', '2023-02-16 02:35:05');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `msg` text NOT NULL,
  `timedate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `msg`, `timedate`) VALUES
(3, 'Aadhar address change and mobile number service in close for few week', '2023-01-18 05:40:52');

-- --------------------------------------------------------

--
-- Table structure for table `recentchat`
--

CREATE TABLE `recentchat` (
  `chid` int(11) NOT NULL,
  `estfid` int(11) NOT NULL,
  `wstfid` int(11) NOT NULL,
  `echat` text NOT NULL,
  `wchat` text NOT NULL,
  `etime` datetime NOT NULL DEFAULT current_timestamp(),
  `wtime` datetime NOT NULL DEFAULT current_timestamp(),
  `date` date NOT NULL DEFAULT current_timestamp(),
  `time` time NOT NULL DEFAULT current_timestamp(),
  `taskid` int(11) NOT NULL,
  `taskchatid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recentchat`
--

INSERT INTO `recentchat` (`chid`, `estfid`, `wstfid`, `echat`, `wchat`, `etime`, `wtime`, `date`, `time`, `taskid`, `taskchatid`) VALUES
(1, 35, 38, '', 'hi', '2023-07-03 16:37:25', '2023-07-03 16:37:25', '2023-07-03', '16:37:25', 41, 0),
(2, 35, 38, 'hi', '', '2023-07-03 16:37:33', '2023-07-03 16:37:33', '2023-07-03', '16:37:33', 41, 0),
(3, 35, 38, 'Document related isues are there', '', '2023-07-03 16:37:50', '2023-07-03 16:37:50', '2023-07-03', '16:37:50', 41, 0),
(4, 35, 38, '', 'okay will check and update', '2023-07-03 16:38:05', '2023-07-03 16:38:05', '2023-07-03', '16:38:05', 41, 0),
(5, 35, 38, 'Hi good engough to break the ice downtown', '', '2023-07-03 17:28:10', '2023-07-03 17:28:10', '2023-07-03', '17:28:10', 41, 0),
(6, 35, 38, '', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content.', '2023-07-04 16:18:53', '2023-07-04 16:18:53', '2023-07-04', '16:18:53', 41, 0),
(7, 35, 38, 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..', '', '2023-07-04 16:20:23', '2023-07-04 16:20:23', '2023-07-04', '16:20:23', 41, 0),
(8, 39, 38, '', 'hiiii', '2023-07-04 19:03:59', '2023-07-04 19:03:59', '2023-07-04', '19:03:59', 2, 0),
(9, 35, 38, 'hello', '', '2023-07-04 19:04:31', '2023-07-04 19:04:31', '2023-07-04', '19:04:31', 14, 0),
(10, 35, 38, '', 'qqqqq', '2023-07-04 19:07:54', '2023-07-04 19:07:54', '2023-07-04', '19:07:54', 14, 0),
(11, 35, 38, 'ww', '', '2023-07-04 19:09:55', '2023-07-04 19:09:55', '2023-07-04', '19:09:55', 14, 0),
(12, 35, 38, 'e', '', '2023-07-04 19:10:19', '2023-07-04 19:10:19', '2023-07-04', '19:10:19', 14, 0),
(13, 35, 38, 'r', '', '2023-07-04 19:10:28', '2023-07-04 19:10:28', '2023-07-04', '19:10:28', 14, 0),
(14, 35, 38, 'asa', '', '2023-07-05 12:10:09', '2023-07-05 12:10:09', '2023-07-05', '12:10:09', 14, 32),
(15, 35, 38, '', 'accxc', '2023-07-05 12:11:19', '2023-07-05 12:11:19', '2023-07-05', '12:11:19', 14, 32),
(16, 35, 38, '', 'accxc', '2023-07-05 12:11:50', '2023-07-05 12:11:50', '2023-07-05', '12:11:50', 14, 32),
(17, 35, 38, 'asasaasasasasa', '', '2023-07-05 12:16:00', '2023-07-05 12:16:00', '2023-07-05', '12:16:00', 14, 32),
(18, 35, 38, '', 'ttttttttttttttttttttttttttttttttttt', '2023-07-05 12:16:25', '2023-07-05 12:16:25', '2023-07-05', '12:16:25', 14, 32),
(19, 35, 38, '', 'hi', '2023-07-05 14:00:50', '2023-07-05 14:00:50', '2023-07-05', '14:00:50', 41, 48),
(20, 35, 38, 'ji', '', '2023-07-05 14:00:59', '2023-07-05 14:00:59', '2023-07-05', '14:00:59', 41, 48),
(21, 35, 38, 'ji', '', '2023-07-05 14:03:03', '2023-07-05 14:03:03', '2023-07-05', '14:03:03', 41, 48),
(22, 35, 38, 'ji', '', '2023-07-05 14:03:05', '2023-07-05 14:03:05', '2023-07-05', '14:03:05', 41, 48),
(23, 35, 38, 'ji', '', '2023-07-05 14:03:07', '2023-07-05 14:03:07', '2023-07-05', '14:03:07', 41, 48),
(24, 35, 38, 'ji', '', '2023-07-05 14:03:08', '2023-07-05 14:03:08', '2023-07-05', '14:03:08', 41, 48),
(25, 35, 38, 'ji', '', '2023-07-05 14:03:09', '2023-07-05 14:03:09', '2023-07-05', '14:03:09', 41, 48),
(26, 35, 38, 'ji', '', '2023-07-05 14:03:11', '2023-07-05 14:03:11', '2023-07-05', '14:03:11', 41, 48),
(27, 35, 0, 'Hi', '', '2023-07-05 17:20:13', '2023-07-05 17:20:13', '2023-07-05', '17:20:13', 41, 3),
(28, 35, 38, '', 'all document ok', '2023-07-05 19:02:41', '2023-07-05 19:02:41', '2023-07-05', '19:02:41', 41, 5),
(29, 35, 38, 'kab tk milega', '', '2023-07-05 19:03:12', '2023-07-05 19:03:12', '2023-07-05', '19:03:12', 41, 5),
(30, 35, 38, '', '1 week me aapke ghar courie hoga', '2023-07-05 19:03:32', '2023-07-05 19:03:32', '2023-07-05', '19:03:32', 41, 5),
(31, 35, 38, 'okay sir', '', '2023-07-05 19:03:42', '2023-07-05 19:03:42', '2023-07-05', '19:03:42', 41, 5),
(34, 0, 0, 'What ever...', '', '2024-01-28 19:39:28', '2024-01-28 19:39:28', '2024-01-28', '19:39:28', 0, 8),
(35, 0, 0, 'LOL', '', '2024-01-28 20:01:59', '2024-01-28 20:01:59', '2024-01-28', '20:01:59', 0, 8),
(36, 0, 0, 'Yay Working But Only From Staffs Side -_-', '', '2024-01-28 20:11:22', '2024-01-28 20:11:22', '2024-01-28', '20:11:22', 0, 8),
(37, 0, 0, 'test', '', '2024-01-28 20:21:39', '2024-01-28 20:21:39', '2024-01-28', '20:21:39', 0, 0),
(38, 0, 0, 'say what!?', '', '2024-01-28 21:12:44', '2024-01-28 21:12:44', '2024-01-28', '21:12:44', 0, 8),
(39, 0, 0, 'jai shree ram', '', '2024-01-28 22:13:20', '2024-01-28 22:13:20', '2024-01-28', '22:13:20', 0, 8),
(40, 0, 0, 'Yolo', '', '2024-01-29 15:43:29', '2024-01-29 15:43:29', '2024-01-29', '15:43:29', 0, 0),
(41, 0, 0, 'Yolo', '', '2024-01-29 15:44:01', '2024-01-29 15:44:01', '2024-01-29', '15:44:01', 0, 0),
(42, 0, 0, 'asd', '', '2024-01-29 16:03:21', '2024-01-29 16:03:21', '2024-01-29', '16:03:21', 0, 0),
(43, 0, 0, '', '', '2024-01-29 16:04:37', '2024-01-29 16:04:37', '2024-01-29', '16:04:37', 0, 0),
(44, 0, 0, '', '', '2024-01-29 16:05:59', '2024-01-29 16:05:59', '2024-01-29', '16:05:59', 0, 0),
(45, 0, 0, '', '', '2024-01-29 16:47:06', '2024-01-29 16:47:06', '2024-01-29', '16:47:06', 0, 0),
(46, 0, 0, 'sdf', '', '2024-01-29 17:13:52', '2024-01-29 17:13:52', '2024-01-29', '17:13:52', 0, 0),
(47, 0, 0, 'sadadasd', '', '2024-01-29 17:16:50', '2024-01-29 17:16:50', '2024-01-29', '17:16:50', 0, 8),
(48, 0, 0, 'Yolo', '', '2024-01-30 09:05:23', '2024-01-30 09:05:23', '2024-01-30', '09:05:23', 0, 0),
(49, 0, 0, 'Yolo', '', '2024-01-30 09:05:29', '2024-01-30 09:05:29', '2024-01-30', '09:05:29', 0, 0),
(50, 0, 7, 'Yolo', '', '2024-02-03 02:28:07', '2024-02-03 02:28:07', '2024-02-03', '02:28:07', 4, 3),
(51, 0, 0, 'Do It.', '', '2024-02-03 02:34:12', '2024-02-03 02:34:12', '2024-02-03', '02:34:12', 0, 0),
(52, 7, 7, 'Sup Bro', '', '2024-02-03 03:45:47', '2024-02-03 03:45:47', '2024-02-03', '03:45:47', 37, 10),
(53, 0, 0, 'asd', '', '2024-02-03 03:46:18', '2024-02-03 03:46:18', '2024-02-03', '03:46:18', 0, 0),
(54, 0, 0, 'asd', '', '2024-02-03 03:47:05', '2024-02-03 03:47:05', '2024-02-03', '03:47:05', 0, 0),
(55, 7, 9, '', 'Done!', '2024-02-03 03:52:30', '2024-02-03 03:52:30', '2024-02-03', '03:52:30', 3, 11),
(56, 0, 0, 'file missing', '', '2024-02-03 06:03:46', '2024-02-03 06:03:46', '2024-02-03', '06:03:46', 0, 0),
(57, 7, 7, 'Sup Bro', '', '2024-02-03 06:04:31', '2024-02-03 06:04:31', '2024-02-03', '06:04:31', 88, 12),
(58, 0, 0, 'test', '', '2024-02-05 11:44:36', '2024-02-05 11:44:36', '2024-02-05', '11:44:36', 0, 0),
(59, 7, 0, 'To Admin assign to anyone', '', '2024-02-05 11:45:11', '2024-02-05 11:45:11', '2024-02-05', '11:45:11', 89, 15),
(60, 7, 0, 'assign it', '', '2024-02-05 11:50:45', '2024-02-05 11:50:45', '2024-02-05', '11:50:45', 88, 16),
(61, 0, 0, 'hgchgv', '', '2024-02-05 11:51:00', '2024-02-05 11:51:00', '2024-02-05', '11:51:00', 0, 0),
(62, 0, 0, 'Yo', '', '2024-02-06 22:10:46', '2024-02-06 22:10:46', '2024-02-06', '22:10:46', 0, 0),
(63, 0, 11, '', 'got it', '2024-02-09 00:41:23', '2024-02-09 00:41:23', '2024-02-09', '00:41:23', 90, 58),
(64, 0, 0, 'Yo', '', '2024-02-09 09:10:04', '2024-02-09 09:10:04', '2024-02-09', '09:10:04', 0, 0),
(65, 0, 46, '', 'Got It Admin San', '2024-02-09 09:13:26', '2024-02-09 09:13:26', '2024-02-09', '09:13:26', 88, 57),
(66, 0, 0, 'do it soon', '', '2024-02-09 09:15:08', '2024-02-09 09:15:08', '2024-02-09', '09:15:08', 0, 0),
(67, 0, 0, 'do it soon', '', '2024-02-09 09:17:29', '2024-02-09 09:17:29', '2024-02-09', '09:17:29', 0, 0),
(68, 0, 0, 'sup', '', '2024-02-09 09:17:48', '2024-02-09 09:17:48', '2024-02-09', '09:17:48', 0, 0),
(69, 0, 0, 'ok', '', '2024-02-09 09:26:37', '2024-02-09 09:26:37', '2024-02-09', '09:26:37', 0, 0),
(70, 0, 0, 'Go Please', '', '2024-02-09 09:34:07', '2024-02-09 09:34:07', '2024-02-09', '09:34:07', 0, 0),
(71, 0, 46, '', 'Plz Reply', '2024-02-09 09:54:23', '2024-02-09 09:54:23', '2024-02-09', '09:54:23', 88, 57),
(72, 46, 0, 'sup', '', '2024-02-09 10:26:05', '2024-02-09 10:26:05', '2024-02-09', '10:26:05', 88, 57),
(73, 0, 0, 'yolo', '', '2024-02-09 10:27:31', '2024-02-09 10:27:31', '2024-02-09', '10:27:31', 0, 0),
(74, 46, 0, 'yollo', '', '2024-02-09 10:27:57', '2024-02-09 10:27:57', '2024-02-09', '10:27:57', 88, 57),
(75, 0, 0, 'yo', '', '2024-02-09 10:29:06', '2024-02-09 10:29:06', '2024-02-09', '10:29:06', 0, 0),
(76, 0, 0, 'from admin', '', '2024-02-09 10:34:09', '2024-02-09 10:34:09', '2024-02-09', '10:34:09', 0, 0),
(77, 0, 0, 'again from admins side', '', '2024-02-09 10:35:07', '2024-02-09 10:35:07', '2024-02-09', '10:35:07', 0, 0),
(78, 0, 0, 'again again from admins side', '', '2024-02-09 10:40:17', '2024-02-09 10:40:17', '2024-02-09', '10:40:17', 0, 0),
(79, 0, 0, 'suolo', '', '2024-02-09 10:41:36', '2024-02-09 10:41:36', '2024-02-09', '10:41:36', 0, 0),
(80, 0, 0, 'fghjk', '', '2024-02-09 10:43:00', '2024-02-09 10:43:00', '2024-02-09', '10:43:00', 0, 0),
(81, 0, 46, '', 'new test from emp', '2024-02-09 10:47:31', '2024-02-09 10:47:31', '2024-02-09', '10:47:31', 88, 57),
(82, 0, 46, '', '', '2024-02-09 10:51:56', '2024-02-09 10:51:56', '2024-02-09', '10:51:56', 88, 57),
(83, 0, 46, '', 'go from emp side', '2024-02-09 10:52:17', '2024-02-09 10:52:17', '2024-02-09', '10:52:17', 88, 57),
(84, 46, 0, '', 'again from emp side', '2024-02-09 10:56:02', '2024-02-09 10:56:02', '2024-02-09', '10:56:02', 88, 57),
(85, 0, 0, '', 'testing', '2024-02-09 10:57:16', '2024-02-09 10:57:16', '2024-02-09', '10:57:16', 0, 0),
(86, 0, 0, 'msg from admins side', '', '2024-02-09 11:01:18', '2024-02-09 11:01:18', '2024-02-09', '11:01:18', 0, 0),
(87, 0, 0, 'msg from admin', '', '2024-02-09 11:03:03', '2024-02-09 11:03:03', '2024-02-09', '11:03:03', 0, 0),
(88, 0, 0, '', 'msg from admin', '2024-02-09 11:03:50', '2024-02-09 11:03:50', '2024-02-09', '11:03:50', 0, 0),
(89, 0, 0, '', 'msg from admin', '2024-02-09 11:12:11', '2024-02-09 11:12:11', '2024-02-09', '11:12:11', 0, 0),
(90, 46, 0, '', 'again from empss', '2024-02-09 11:13:50', '2024-02-09 11:13:50', '2024-02-09', '11:13:50', 88, 57),
(91, 0, 0, 'WASSUP', '', '2024-02-09 11:18:42', '2024-02-09 11:18:42', '2024-02-09', '11:18:42', 88, 57),
(92, 0, 0, '', 'ZOSSUP', '2024-02-09 11:19:14', '2024-02-09 11:19:14', '2024-02-09', '11:19:14', 0, 0),
(93, 0, 46, 'ho ho ho', '', '2024-02-09 11:24:57', '2024-02-09 11:24:57', '2024-02-09', '11:24:57', 57, 57),
(94, 0, 46, 'Holy carp', '', '2024-02-09 11:45:03', '2024-02-09 11:45:03', '2024-02-09', '11:45:03', 57, 57),
(95, 0, 46, 'holy moly carp', '', '2024-02-09 11:47:07', '2024-02-09 11:47:07', '2024-02-09', '11:47:07', 57, 57),
(96, 0, 0, '', 'ZOSSUP', '2024-02-09 11:48:52', '2024-02-09 11:48:52', '2024-02-09', '11:48:52', 0, 0),
(97, 0, 46, 'smoly doly crap', '', '2024-02-09 11:49:17', '2024-02-09 11:49:17', '2024-02-09', '11:49:17', 57, 57),
(98, 0, 46, 'wad', '', '2024-02-09 11:49:47', '2024-02-09 11:49:47', '2024-02-09', '11:49:47', 57, 57),
(99, 0, 46, 'we4567', '', '2024-02-09 11:51:47', '2024-02-09 11:51:47', '2024-02-09', '11:51:47', 57, 57),
(100, 0, 46, 'wertyu', '', '2024-02-09 11:53:31', '2024-02-09 11:53:31', '2024-02-09', '11:53:31', 57, 57),
(101, 0, 0, '', 'what?', '2024-02-09 11:55:31', '2024-02-09 11:55:31', '2024-02-09', '11:55:31', 0, 0),
(102, 0, 0, 'wert,', '', '2024-02-09 11:56:03', '2024-02-09 11:56:03', '2024-02-09', '11:56:03', 0, 0),
(103, 0, 0, 'wol', '', '2024-02-09 12:05:07', '2024-02-09 12:05:07', '2024-02-09', '12:05:07', 0, 0),
(104, 0, 0, 'wol', '', '2024-02-09 12:05:15', '2024-02-09 12:05:15', '2024-02-09', '12:05:15', 0, 0),
(105, 0, 0, 'dfghj', '', '2024-02-09 12:07:19', '2024-02-09 12:07:19', '2024-02-09', '12:07:19', 0, 0),
(106, 0, 46, 'gangnam Style!', '', '2024-02-09 13:54:59', '2024-02-09 13:54:59', '2024-02-09', '13:54:59', 57, 57);

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `catid` int(11) DEFAULT NULL,
  `name` varchar(225) DEFAULT NULL,
  `sdetail` tinytext DEFAULT NULL,
  `cost` float(10,2) DEFAULT NULL,
  `cashback` float(10,2) NOT NULL DEFAULT 0.00,
  `advrequired` varchar(3) DEFAULT NULL,
  `advper` varchar(3) DEFAULT NULL,
  `duedays` varchar(3) DEFAULT NULL,
  `duepay` varchar(10) DEFAULT NULL,
  `type` varchar(12) DEFAULT NULL,
  `pic` varchar(75) NOT NULL DEFAULT 'itr.png',
  `timedate` timestamp NOT NULL DEFAULT current_timestamp(),
  `serdes` text DEFAULT NULL,
  `imguides` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `catid`, `name`, `sdetail`, `cost`, `cashback`, `advrequired`, `advper`, `duedays`, `duepay`, `type`, `pic`, `timedate`, `serdes`, `imguides`) VALUES
(113, 22, 'GST service 3', 'Room or unit accommodation services for students in student residences\r\nRoom or unit accommodation services provided by Hostels, Camps, Paying Guest etc\r\nOther room or unit accommodation services n.e.c.\r\nServices provided by Restaurants, Cafes and similar', 90000.00, 0.00, 'yes', '12', '22', '22', 'onetime', 'gstr3.jpg', '2024-02-12 11:27:18', '<figure class=\"table\"><table><tbody><tr><td>Services provided by Hotels, INN, Guest House, Club etc including Room services, takeaway services and door delivery of food.</td></tr></tbody></table></figure><figure class=\"table\"><table><tbody><tr><td>Catering Services in Exhibition halls, Events, Marriage Halls and other outdoor/indoor functions.</td></tr></tbody></table></figure><figure class=\"table\"><table><tbody><tr><td>Preparation and/or supply services of food, edible preparations, alchoholic &amp; non-alchocholic beverages to airlines and other transportation operators</td></tr></tbody></table></figure><figure class=\"table\"><table><tbody><tr><td>Other food, edible preparations, alchoholic &amp; non-alchocholic beverages serving services n.e.c.</td></tr></tbody></table></figure><figure class=\"table\"><table><tbody><tr><td>Taxi services including radio taxi &amp; other similar services;&nbsp;</td></tr></tbody></table></figure><p>&nbsp;</p>', NULL),
(112, 22, 'GST service 2', 'Services involving Repair, alterations, additions, replacements, maintenance of the constructions covered above. Installation, assembly and erection services of other prefabricated structures and constructions Installation services of all types of street ', 400000.00, 0.00, 'yes', '500', '20', '20', 'onetime', 'gstr-2.png', '2024-02-12 11:14:24', '<figure class=\"table\"><table><tbody><tr><td>Pile driving and foundation services</td></tr></tbody></table></figure><figure class=\"table\"><table><tbody><tr><td>Roofing and waterproofing services</td></tr></tbody></table></figure><figure class=\"table\"><table><tbody><tr><td>Services involving Repair, alterations, additions, replacements, maintenance of the constructions covered above.</td></tr></tbody></table></figure><figure class=\"table\"><table><tbody><tr><td>Electrical installation services including Electrical wiring &amp; fitting services, fire alarm installation services, burglar alarm system installation services.</td></tr></tbody></table></figure><figure class=\"table\"><table><tbody><tr><td>Services involving Repair, alterations, additions, replacements, maintenance of the installations covered above.</td></tr></tbody></table></figure><p>&nbsp;</p>', NULL),
(111, 22, 'GST service 1', 'Goods Service Tax Service Number One. ', 21212312.00, 0.00, 'yes', '25', '2', '2', 'onetime', 'gstr1.jpg', '2024-02-12 11:06:40', '<figure class=\"table\"><table><tbody><tr><td>Construction services of single dwelling or multi dewlling or multi-storied residential buildings</td></tr></tbody></table></figure><figure class=\"table\"><table><tbody><tr><td>Construction services of other residential buildings such as old age homes, homeless shelters, hostels etc</td></tr></tbody></table></figure><figure class=\"table\"><table><tbody><tr><td>Construction services of industrial buildings such as buildings used for production activities (used for assembly line activities), workshops, storage buildings and other similar industrial buildings</td></tr></tbody></table></figure><figure class=\"table\"><table><tbody><tr><td>Construction services of commercial buildings such as office buildings, exhibition &amp; marriage halls, malls, hotels, restaurants, airports, rail or road terminals, parking garages, petrol and service stations, theatres and other similar buildings.</td></tr></tbody></table></figure><p>&nbsp;</p>', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `servicedoc`
--

CREATE TABLE `servicedoc` (
  `id` int(11) NOT NULL,
  `docid` int(11) DEFAULT NULL,
  `serviceid` int(11) NOT NULL,
  `document` varchar(225) NOT NULL,
  `type` varchar(25) NOT NULL DEFAULT 'file',
  `fieldorfile` int(11) NOT NULL COMMENT '1-file, 2-doc',
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1 for mandatory'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `servicedoc`
--

INSERT INTO `servicedoc` (`id`, `docid`, `serviceid`, `document`, `type`, `fieldorfile`, `status`) VALUES
(1, 1, 0, 'Pan No', 'text', 1, 0),
(4, 3, 0, 'aadhar no', 'int', 1, 0),
(3, NULL, 42, 'Pan No', 'text', 1, 1),
(5, NULL, 42, 'aadhar no', 'int', 1, 1),
(6, NULL, 41, 'aadhar no', 'int', 1, 1),
(9, 5, 2, 'prevous gst bill', 'file', 2, 1),
(10, NULL, 41, 'prevous gst bill', 'file', 2, 1),
(21, NULL, 41, 'Aadhar photo', 'photo', 2, 1),
(12, NULL, 14, 'Pan No', 'text', 1, 1),
(13, NULL, 14, 'prevous gst bill', 'file', 2, 1),
(22, NULL, 53, 'Aadhar No', 'file', 0, 1),
(23, NULL, 2, 'Pan No', 'text', 1, 1),
(24, NULL, 2, 'Aadhar photo', 'photo', 2, 1),
(25, 6, 0, 'voter id card', 'file', 2, 0),
(26, NULL, 41, 'voter id card', 'file', 2, 1),
(27, NULL, 57, 'Pan No', 'file', 0, 1),
(28, NULL, 58, 'Pan No', 'file', 0, 1),
(29, NULL, 59, 'Aadhar Photo', 'file', 0, 1),
(30, NULL, 60, 'Pan No', 'file', 0, 1),
(31, NULL, 61, 'Aadhar Photo', 'file', 0, 1),
(32, NULL, 62, 'Voter Id Card', 'file', 0, 1),
(33, NULL, 63, 'Aadhar Photo', 'file', 0, 1),
(34, NULL, 64, 'Prevous Gst Bill', 'file', 0, 1),
(35, NULL, 65, 'Aadhar Photo', 'file', 0, 1),
(36, NULL, 66, 'Pan No', 'file', 0, 1),
(37, NULL, 68, 'Voter Id Card', 'file', 0, 1),
(38, NULL, 69, 'Aadhar No', 'file', 0, 1),
(39, NULL, 70, 'Aadhar Photo', 'file', 0, 1),
(40, NULL, 71, 'Aadhar Photo', 'file', 0, 1),
(41, NULL, 72, 'Voter Id Card', 'file', 0, 1),
(42, NULL, 73, 'Prevous Gst Bill', 'file', 0, 1),
(43, NULL, 74, 'Aadhar Photo', 'file', 0, 1),
(44, NULL, 75, 'Pan No', 'file', 0, 1),
(45, NULL, 76, 'Pan No', 'file', 0, 1),
(46, NULL, 77, 'Aadhar Photo', 'file', 0, 1),
(47, NULL, 78, 'Pan No', 'file', 0, 1),
(48, NULL, 79, 'Pan No', 'file', 0, 1),
(49, NULL, 80, 'Prevous Gst Bill', 'file', 0, 1),
(50, NULL, 81, 'Voter Id Card', 'file', 0, 1),
(51, NULL, 82, 'Pan No', 'file', 0, 1),
(52, NULL, 83, 'Pan No', 'file', 0, 1),
(53, NULL, 84, 'Voter Id Card', 'file', 0, 1),
(54, NULL, 85, 'Prevous Gst Bill', 'file', 0, 1),
(55, NULL, 86, 'Aadhar Photo', 'file', 0, 1),
(56, NULL, 87, 'Voter Id Card', 'file', 0, 1),
(57, NULL, 88, 'Pan No', 'file', 0, 1),
(58, NULL, 89, 'Pan No', 'file', 0, 1),
(59, NULL, 90, 'Pan No', 'file', 0, 1),
(60, NULL, 91, 'Pan No', 'file', 0, 1),
(61, NULL, 92, 'Prevous Gst Bill', 'file', 0, 1),
(62, NULL, 93, 'Voter Id Card', 'file', 0, 1),
(63, NULL, 94, 'Aadhar Photo', 'file', 0, 1),
(64, NULL, 95, 'Pan No', 'file', 0, 1),
(65, NULL, 96, 'Pan No', 'file', 0, 1),
(66, NULL, 97, 'Pan No', 'file', 0, 1),
(67, NULL, 98, 'Aadhar Photo', 'file', 0, 1),
(68, NULL, 99, 'Pan No', 'file', 0, 1),
(69, NULL, 100, 'Prevous Gst Bill', 'file', 0, 1),
(70, NULL, 102, 'Pan No', 'file', 0, 1),
(71, NULL, 103, 'Pan No', 'file', 0, 1),
(72, NULL, 104, 'Aadhar Photo', 'file', 0, 1),
(73, NULL, 105, 'Prevous Gst Bill', 'file', 0, 1),
(74, NULL, 106, 'Pan No', 'file', 0, 1),
(75, NULL, 107, 'Pan No', 'file', 0, 1),
(76, NULL, 108, 'Pan No', 'file', 0, 1),
(77, NULL, 109, 'Aadhar Photo', 'file', 0, 1),
(78, NULL, 110, 'Pan No', 'file', 0, 1),
(79, NULL, 111, 'Aadhar Photo', 'file', 0, 1),
(80, NULL, 112, 'Pan No', 'file', 0, 1),
(81, NULL, 113, 'Prevous Gst Bill', 'file', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `service_inquiry_direct`
--

CREATE TABLE `service_inquiry_direct` (
  `id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `pan_no` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `financial_year` varchar(30) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `mob` varchar(10) NOT NULL,
  `father` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `service_inquiry_direct`
--

INSERT INTO `service_inquiry_direct` (`id`, `service_id`, `pan_no`, `dob`, `financial_year`, `fname`, `lname`, `email`, `mob`, `father`) VALUES
(1, 41, '2345234234', '2023-12-09', '2022-2023', 'AE', 'BA', 'asasadadadad@ss', '3245645364', 'SAS'),
(2, 41, '2345234234', '2023-12-09', '2022-2023', 'AE', 'BA', 'asasadadadad@ss', '3245645364', 'SAS'),
(3, 41, '2345234234', '2023-12-09', '2022-2023', 'AE', 'BA', 'asasadadadad@ss', '3245645364', 'SAS'),
(4, 41, '2345234234', '2023-12-09', '2022-2023', 'AE', 'BA', 'asasadadadad@ss', '3245645364', 'SAS'),
(5, 41, '2345234234', '2023-12-09', '2022-2023', 'AE', 'BA', 'asasadadadad@ss', '3245645364', 'SAS'),
(6, 41, '2345234234', '2023-12-09', '2022-2023', 'AE', 'BA', 'asasadadadad@ss', '3245645364', 'SAS'),
(7, 41, '2345234234', '2023-12-09', '2022-2023', 'AE', 'BA', 'asasadadadad@ss', '3245645364', 'SAS'),
(8, 41, '2345234234', '2023-12-09', '2022-2023', 'AE', 'BA', 'asasadadadad@ss', '3245645364', 'SAS'),
(9, 41, '2345234234', '2023-12-09', '2022-2023', 'AE', 'BA', 'asasadadadad@ss', '3245645364', 'SAS'),
(10, 41, '2345234234', '2023-12-09', '2022-2023', 'AE', 'BA', 'asasadadadad@ss', '3245645364', 'SAS'),
(11, 41, '2345234234', '2023-12-09', '2022-2023', 'AE', 'BA', 'asasadadadad@ss', '3245645364', 'SAS'),
(12, 41, '2345234234', '2023-12-09', '2022-2023', 'AE', 'BA', 'asasadadadad@ss', '3245645364', 'SAS'),
(13, 41, '2345234234', '2023-12-09', '2022-2023', 'AE', 'BA', 'asasadadadad@ss', '3245645364', 'SAS'),
(14, 41, '2345234234', '2023-12-09', '2022-2023', 'AE', 'BA', 'asasadadadad@ss', '3245645364', 'SAS'),
(15, 41, '2345234234', '2023-12-09', '2022-2023', 'AE', 'BA', 'asasadadadad@ss', '3245645364', 'SAS'),
(16, 41, '2345234234', '2023-12-09', '2022-2023', 'AE', 'BA', 'asasadadadad@ss', '3245645364', 'SAS');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `pan_fees` float(10,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `pan_fees`) VALUES
(1, 110.00),
(2, 300.00);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `eno` int(11) NOT NULL,
  `username` varchar(45) DEFAULT NULL,
  `memcode` varchar(15) DEFAULT NULL,
  `employeetype` varchar(11) DEFAULT NULL,
  `incentivetype` varchar(10) DEFAULT NULL,
  `incentive` float(10,2) NOT NULL DEFAULT 0.00,
  `first_name` varchar(20) DEFAULT NULL,
  `present_address` varchar(125) DEFAULT NULL,
  `present_city` varchar(20) DEFAULT NULL,
  `present_district` varchar(20) DEFAULT NULL,
  `present_state` varchar(20) DEFAULT NULL,
  `present_pin_code` varchar(6) DEFAULT NULL,
  `present_country` varchar(20) DEFAULT NULL,
  `sex` varchar(6) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `pan_number` varchar(15) DEFAULT NULL,
  `mobile_no` varchar(10) DEFAULT NULL,
  `tel_phone_no` varchar(14) DEFAULT NULL,
  `qualificaton` varchar(20) DEFAULT NULL,
  `other_qualification` varchar(50) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `pan_wallet` float(10,2) DEFAULT NULL,
  `e_wallet` float(10,2) DEFAULT NULL,
  `reward_wallet` float(10,2) DEFAULT NULL,
  `ecounter` varchar(125) DEFAULT NULL,
  `timedate` timestamp NOT NULL DEFAULT current_timestamp(),
  `ip` varchar(65) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `structure`
--

CREATE TABLE `structure` (
  `id` int(11) NOT NULL,
  `sponsorid` varchar(15) DEFAULT NULL,
  `memid` varchar(15) DEFAULT NULL,
  `pos` int(11) NOT NULL,
  `timedate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `structure`
--

INSERT INTO `structure` (`id`, `sponsorid`, `memid`, `pos`, `timedate`) VALUES
(1, '', '9754680644', 1, '2023-08-03 12:49:14'),
(2, '', '9754680673', 2, '2023-08-03 12:49:14');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `id` int(11) NOT NULL,
  `assign` int(11) NOT NULL DEFAULT 0,
  `stfid` int(11) NOT NULL DEFAULT 0,
  `applicantid` int(11) DEFAULT NULL,
  `coupan` varchar(25) DEFAULT NULL,
  `taskid` int(11) NOT NULL,
  `catid` int(11) NOT NULL,
  `project` varchar(250) DEFAULT NULL,
  `pleadname` varchar(200) DEFAULT NULL,
  `assignee` varchar(200) DEFAULT NULL,
  `mrp` int(11) DEFAULT NULL,
  `taskamt` float(10,2) DEFAULT NULL,
  `taskdiscamt` float(10,2) NOT NULL DEFAULT 0.00,
  `assing` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '1 for pending, 2-progress, 3 for success, 4 - cancelled',
  `timedate` timestamp NOT NULL DEFAULT current_timestamp(),
  `duedate` date DEFAULT NULL,
  `ip` varchar(125) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`id`, `assign`, `stfid`, `applicantid`, `coupan`, `taskid`, `catid`, `project`, `pleadname`, `assignee`, `mrp`, `taskamt`, `taskdiscamt`, `assing`, `status`, `timedate`, `duedate`, `ip`) VALUES
(70, 0, 0, 167, '0', 112, 22, NULL, NULL, NULL, 0, 0.00, 0.00, 0, 2, '2024-02-15 05:35:19', NULL, '::1'),
(69, 0, 0, 118, '0', 112, 22, NULL, NULL, NULL, 0, 0.00, 0.00, 0, 1, '2024-02-13 05:37:56', NULL, '::1'),
(68, 7, 0, 118, '0', 112, 22, NULL, NULL, NULL, 0, 0.00, 0.00, 0, 1, '2024-02-13 05:21:44', NULL, '::1'),
(67, 0, 0, 117, '0', 113, 22, NULL, NULL, NULL, 0, 0.00, 0.00, 0, 1, '2024-02-13 05:17:42', NULL, '::1'),
(66, 0, 0, 117, '0', 113, 22, NULL, NULL, NULL, 0, 0.00, 0.00, 0, 1, '2024-02-12 18:11:21', NULL, '::1'),
(65, 0, 0, 116, '0', 111, 22, NULL, NULL, NULL, 0, 0.00, 0.00, 0, 1, '2024-02-12 14:36:50', NULL, '::1');

-- --------------------------------------------------------

--
-- Table structure for table `todo`
--

CREATE TABLE `todo` (
  `tdid` int(11) NOT NULL,
  `taskname` varchar(500) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `todo`
--

INSERT INTO `todo` (`tdid`, `taskname`, `date`, `time`) VALUES
(10, 'Complete the job', '2023-06-02', '13:44:43');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `formid` int(11) NOT NULL,
  `transfer_from` varchar(25) DEFAULT NULL,
  `transfer_to` varchar(25) DEFAULT NULL,
  `transaction_for` varchar(25) DEFAULT NULL,
  `amount` float(10,2) DEFAULT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `formid`, `transfer_from`, `transfer_to`, `transaction_for`, `amount`, `date_time`) VALUES
(1, 6, 'admin', '9754680644', 'referincome', 50.00, '2023-08-04 05:52:27'),
(2, 6, 'admin', '9754680644', 'referincome', 50.00, '2023-08-04 05:58:46'),
(3, 6, 'admin', '9754680644', 'referincome', 50.00, '2023-08-04 05:58:52'),
(4, 6, 'admin', '9754680644', 'referincome', 50.00, '2023-08-04 05:59:31'),
(5, 5, 'admin', '436998', 'referincome', 175.00, '2023-08-04 05:59:34'),
(6, 2, 'admin', '849678', 'referincome', 3500.00, '2023-11-25 08:36:35'),
(7, 2, 'admin', '849678', 'referincome', 3500.00, '2023-11-25 08:36:42');

-- --------------------------------------------------------

--
-- Table structure for table `usedcoupan`
--

CREATE TABLE `usedcoupan` (
  `ucid` int(11) NOT NULL,
  `stfid` int(11) NOT NULL,
  `formid` int(11) NOT NULL,
  `coupanid` int(11) NOT NULL,
  `used` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usedcoupan`
--

INSERT INTO `usedcoupan` (`ucid`, `stfid`, `formid`, `coupanid`, `used`) VALUES
(1, 35, 41, 12, 21),
(2, 35, 2, 11, 1),
(3, 35, 40, 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `profile_pic` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alogin`
--
ALTER TABLE `alogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assignedlist`
--
ALTER TABLE `assignedlist`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `cat`
--
ALTER TABLE `cat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `commission`
--
ALTER TABLE `commission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `counter_charge`
--
ALTER TABLE `counter_charge`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupan`
--
ALTER TABLE `coupan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupantrns`
--
ALTER TABLE `coupantrns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currentlogin`
--
ALTER TABLE `currentlogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_panno` (`panno`);

--
-- Indexes for table `customer_answer_question_service`
--
ALTER TABLE `customer_answer_question_service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documentlist`
--
ALTER TABLE `documentlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `download`
--
ALTER TABLE `download`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ecounter`
--
ALTER TABLE `ecounter`
  ADD PRIMARY KEY (`eno`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`eid`);

--
-- Indexes for table `forminput`
--
ALTER TABLE `forminput`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `formreason`
--
ALTER TABLE `formreason`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form_details`
--
ALTER TABLE `form_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form_question`
--
ALTER TABLE `form_question`
  ADD PRIMARY KEY (`q_list_id`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `noticeboard`
--
ALTER TABLE `noticeboard`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recentchat`
--
ALTER TABLE `recentchat`
  ADD PRIMARY KEY (`chid`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `servicedoc`
--
ALTER TABLE `servicedoc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_inquiry_direct`
--
ALTER TABLE `service_inquiry_direct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`eno`);

--
-- Indexes for table `structure`
--
ALTER TABLE `structure`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `todo`
--
ALTER TABLE `todo`
  ADD PRIMARY KEY (`tdid`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usedcoupan`
--
ALTER TABLE `usedcoupan`
  ADD PRIMARY KEY (`ucid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alogin`
--
ALTER TABLE `alogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assignedlist`
--
ALTER TABLE `assignedlist`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `cat`
--
ALTER TABLE `cat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `commission`
--
ALTER TABLE `commission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `counter_charge`
--
ALTER TABLE `counter_charge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `coupan`
--
ALTER TABLE `coupan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `coupantrns`
--
ALTER TABLE `coupantrns`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `currentlogin`
--
ALTER TABLE `currentlogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;

--
-- AUTO_INCREMENT for table `customer_answer_question_service`
--
ALTER TABLE `customer_answer_question_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;

--
-- AUTO_INCREMENT for table `documentlist`
--
ALTER TABLE `documentlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `download`
--
ALTER TABLE `download`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ecounter`
--
ALTER TABLE `ecounter`
  MODIFY `eno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `eid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forminput`
--
ALTER TABLE `forminput`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT for table `formreason`
--
ALTER TABLE `formreason`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `form_details`
--
ALTER TABLE `form_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `form_question`
--
ALTER TABLE `form_question`
  MODIFY `q_list_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `noticeboard`
--
ALTER TABLE `noticeboard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `recentchat`
--
ALTER TABLE `recentchat`
  MODIFY `chid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `servicedoc`
--
ALTER TABLE `servicedoc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `service_inquiry_direct`
--
ALTER TABLE `service_inquiry_direct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `eno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `structure`
--
ALTER TABLE `structure`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `todo`
--
ALTER TABLE `todo`
  MODIFY `tdid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `usedcoupan`
--
ALTER TABLE `usedcoupan`
  MODIFY `ucid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

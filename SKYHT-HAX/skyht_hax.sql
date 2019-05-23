-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2019 at 09:58 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skyht_hax`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `ID` int(11) NOT NULL,
  `EMAIL` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `NAME` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `PASSWORD` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `VND` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`ID`, `EMAIL`, `NAME`, `PASSWORD`, `VND`) VALUES
(0, 'johnthuc1997@gmail.com', 'Nguyá»…n VÅ© Minh Thá»©c', '03101997', 315000);

-- --------------------------------------------------------

--
-- Table structure for table `activation_code`
--

CREATE TABLE `activation_code` (
  `ID` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ID_INFO_ACCOUNT` int(11) NOT NULL,
  `ADD_DATE` int(11) NOT NULL,
  `EXPIRATION_DATE` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `info_account`
--

CREATE TABLE `info_account` (
  `ID` int(11) NOT NULL,
  `ID_ACCOUNT` int(11) NOT NULL,
  `USERNAME` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `info_account`
--

INSERT INTO `info_account` (`ID`, `ID_ACCOUNT`, `USERNAME`) VALUES
(10, 0, 'yeu2nguoi'),
(11, 0, 'yeu1nguoi'),
(12, 0, 'khongbietyeu'),
(13, 0, 'TuicoDon');

-- --------------------------------------------------------

--
-- Table structure for table `info_packages_rented`
--

CREATE TABLE `info_packages_rented` (
  `ID` int(11) NOT NULL,
  `ID_INFO_ACCOUNT` int(11) NOT NULL,
  `D_BEGIN` datetime NOT NULL,
  `D_END` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `info_packages_rented`
--

INSERT INTO `info_packages_rented` (`ID`, `ID_INFO_ACCOUNT`, `D_BEGIN`, `D_END`) VALUES
(11, 10, '2019-04-24 20:00:15', '2019-04-25 20:00:15'),
(12, 11, '2019-05-02 15:31:41', '2019-05-09 15:31:41'),
(13, 12, '2019-05-02 15:31:47', '2019-06-01 15:31:47'),
(14, 13, '2019-05-12 13:46:15', '2019-06-11 13:46:15');

-- --------------------------------------------------------

--
-- Table structure for table `type_packages`
--

CREATE TABLE `type_packages` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `DATE` int(11) NOT NULL,
  `VND` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `type_packages`
--

INSERT INTO `type_packages` (`ID`, `NAME`, `DATE`, `VND`) VALUES
(0, '1 Day', 1, 1000),
(1, '1 Week', 7, 5000),
(2, '1 Month', 30, 20000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`ID`) USING BTREE;

--
-- Indexes for table `activation_code`
--
ALTER TABLE `activation_code`
  ADD PRIMARY KEY (`ID`) USING BTREE,
  ADD KEY `fk_activation_code_ID_INFO_ACCOUNT` (`ID_INFO_ACCOUNT`);

--
-- Indexes for table `info_account`
--
ALTER TABLE `info_account`
  ADD PRIMARY KEY (`ID`) USING BTREE,
  ADD KEY `fk_info_account_ID_ACCOUNT` (`ID_ACCOUNT`);

--
-- Indexes for table `info_packages_rented`
--
ALTER TABLE `info_packages_rented`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_info_packages_rented_ID_INFO_ACCOUNT` (`ID_INFO_ACCOUNT`);

--
-- Indexes for table `type_packages`
--
ALTER TABLE `type_packages`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `info_account`
--
ALTER TABLE `info_account`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `info_packages_rented`
--
ALTER TABLE `info_packages_rented`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activation_code`
--
ALTER TABLE `activation_code`
  ADD CONSTRAINT `fk_activation_code_ID_INFO_ACCOUNT` FOREIGN KEY (`ID_INFO_ACCOUNT`) REFERENCES `info_account` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `info_account`
--
ALTER TABLE `info_account`
  ADD CONSTRAINT `fk_info_account_ID_ACCOUNT` FOREIGN KEY (`ID_ACCOUNT`) REFERENCES `account` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `info_packages_rented`
--
ALTER TABLE `info_packages_rented`
  ADD CONSTRAINT `fk_info_packages_rented_ID_INFO_ACCOUNT` FOREIGN KEY (`ID_INFO_ACCOUNT`) REFERENCES `info_account` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

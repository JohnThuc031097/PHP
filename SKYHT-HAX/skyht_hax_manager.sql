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
-- Database: `skyht_hax_manager`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `USERNAME` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `PASSWORD` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `LEVEL` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`ID`, `NAME`, `USERNAME`, `PASSWORD`, `LEVEL`) VALUES
(1, 'Nguyễn Vũ Minh Thức', 'johnthuc@admin', '0310', 0),
(2, 'Nguyễn Vũ Minh Thức', 'johnthuc@card', '0310', 1);

-- --------------------------------------------------------

--
-- Table structure for table `background_index`
--

CREATE TABLE `background_index` (
  `ID` int(11) NOT NULL,
  `FILENAME` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `background_index`
--

INSERT INTO `background_index` (`ID`, `FILENAME`) VALUES
(0, 'https://www.youtube.com/embed/r3JrUyvQyDI');

-- --------------------------------------------------------

--
-- Table structure for table `card`
--

CREATE TABLE `card` (
  `ID` int(11) NOT NULL,
  `ID_ACCOUNT` int(11) NOT NULL,
  `ID_CARD_INFO` int(11) NOT NULL,
  `SERI` int(10) NOT NULL,
  `CODE` int(10) NOT NULL,
  `DATE` datetime NOT NULL,
  `STATUS` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `card`
--

INSERT INTO `card` (`ID`, `ID_ACCOUNT`, `ID_CARD_INFO`, `SERI`, `CODE`, `DATE`, `STATUS`) VALUES
(4, 0, 2, 2147483647, 2147483647, '2019-04-29 18:05:04', 0),
(5, 0, 3, 2147483647, 2147483647, '2019-04-29 18:05:41', 0),
(8, 0, 1, 2147483647, 2147483647, '2019-05-02 16:36:58', 0),
(9, 0, 1, 2147483647, 2147483647, '2019-05-12 12:44:17', 0);

-- --------------------------------------------------------

--
-- Table structure for table `card_info_values`
--

CREATE TABLE `card_info_values` (
  `ID` int(1) NOT NULL,
  `ID_TYPE` int(1) NOT NULL,
  `CODE_VALUE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `card_info_values`
--

INSERT INTO `card_info_values` (`ID`, `ID_TYPE`, `CODE_VALUE`) VALUES
(1, 0, 10000),
(2, 0, 20000),
(3, 0, 50000),
(4, 0, 100000),
(5, 0, 200000);

-- --------------------------------------------------------

--
-- Table structure for table `card_type`
--

CREATE TABLE `card_type` (
  `ID` int(1) NOT NULL,
  `NAME` text COLLATE utf8_unicode_ci NOT NULL,
  `TRADE_DISCOUNT` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `card_type`
--

INSERT INTO `card_type` (`ID`, `NAME`, `TRADE_DISCOUNT`) VALUES
(0, 'Viettel', 0);

-- --------------------------------------------------------

--
-- Table structure for table `image_menu_hack`
--

CREATE TABLE `image_menu_hack` (
  `ID` int(11) NOT NULL,
  `FILENAME` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `image_menu_hack`
--

INSERT INTO `image_menu_hack` (`ID`, `FILENAME`) VALUES
(0, 'skyht-hax.png'),
(1, 'skyht-hax_main.png');

-- --------------------------------------------------------

--
-- Table structure for table `info_skills_hack`
--

CREATE TABLE `info_skills_hack` (
  `ID` int(11) NOT NULL,
  `SKILLS_NEW` text COLLATE utf8_unicode_ci NOT NULL,
  `SKILLS_HOT` text COLLATE utf8_unicode_ci NOT NULL,
  `SKILLS` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `info_skills_hack`
--

INSERT INTO `info_skills_hack` (`ID`, `SKILLS_NEW`, `SKILLS_HOT`, `SKILLS`) VALUES
(0, 'Hiện núp tường', 'Lên bờ xuống ruộng', 'Nhìn thấy ghost;\r\nHiện tên địch;\r\nVẽ xương địch;\r\nHiện máu địch;\r\nHiện bom C4;\r\nHiện khoảng cách;\r\nTự động nhắm;\r\nTự động ngắm PVP/AI;\r\nGỡ bom xa/nhanh;\r\nHiện thông báo tắt kick;\r\nHiện thông báo bị kick;\r\nDịch chuyển tới địch'),
(1, 'Chém dao xa/nhanh/360;\r\nBắn xuyên tường', 'Luôn ăn sọ;\r\nTăng tỉ lệ trúng đạn;\r\nAnti time', 'Nhìn thấy ghost;\r\nHiện tên địch;\r\nVẽ xương địch;\r\nHiện máu địch;\r\nHiện bom C4;\r\nHiện khoảng cách;\r\nHiện núp tường;\r\nTự động nhắm;\r\nTự động ngắm PVP/AI;\r\nGỡ bom xa/nhanh;\r\nLên bờ xuống ruộng;\r\nHiện thông báo tắt kick;\r\nHiện thông báo bị kick;\r\nMở tắt kick;\r\nDịch chuyển tới địch\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `ID` int(1) NOT NULL,
  `NAME` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`ID`, `NAME`) VALUES
(0, 'Admin'),
(1, 'Editor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_account_LEVEL` (`LEVEL`);

--
-- Indexes for table `background_index`
--
ALTER TABLE `background_index`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_card_ID_CARD_INFO` (`ID_CARD_INFO`);

--
-- Indexes for table `card_info_values`
--
ALTER TABLE `card_info_values`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_card_info_values` (`ID_TYPE`);

--
-- Indexes for table `card_type`
--
ALTER TABLE `card_type`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `image_menu_hack`
--
ALTER TABLE `image_menu_hack`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `info_skills_hack`
--
ALTER TABLE `info_skills_hack`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `card`
--
ALTER TABLE `card`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `card_info_values`
--
ALTER TABLE `card_info_values`
  MODIFY `ID` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `fk_account_LEVEL` FOREIGN KEY (`LEVEL`) REFERENCES `level` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `card`
--
ALTER TABLE `card`
  ADD CONSTRAINT `fk_card_ID_CARD_INFO` FOREIGN KEY (`ID_CARD_INFO`) REFERENCES `card_info_values` (`ID`);

--
-- Constraints for table `card_info_values`
--
ALTER TABLE `card_info_values`
  ADD CONSTRAINT `fk_card_info_values` FOREIGN KEY (`ID_TYPE`) REFERENCES `card_type` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

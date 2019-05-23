-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Dec 28, 2017 at 01:55 PM
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
-- Database: `quanlyshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `chucvu`
--

DROP TABLE IF EXISTS `chucvu`;
CREATE TABLE IF NOT EXISTS `chucvu` (
  `MaCV` int(11) NOT NULL AUTO_INCREMENT,
  `TenCV` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Quyen` int(11) NOT NULL,
  `DuongDan` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`MaCV`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='chức vụ';

--
-- Dumping data for table `chucvu`
--

INSERT INTO `chucvu` (`MaCV`, `TenCV`, `Quyen`, `DuongDan`) VALUES
(7, 'Thông tin', 0, 'XemThongTin.php'),
(8, 'Thêm', 1, 'ThemMH.php'),
(9, 'Sửa', 1, 'SuaMH.php'),
(10, 'Xóa', 1, 'XoaMH.php'),
(11, 'Thêm', 1, 'ThemLoai.php'),
(12, 'Sửa', 1, 'SuaLoai.php'),
(13, 'Xóa', 1, 'XoaLoai.php'),
(14, 'Cấp quyền', 2, 'CapQuyenTV.php'),
(15, 'Chi tiết', 2, 'ChiTietTV.php'),
(16, 'Xóa', 2, 'XoaTV.php');

-- --------------------------------------------------------

--
-- Table structure for table `lichsugd`
--

DROP TABLE IF EXISTS `lichsugd`;
CREATE TABLE IF NOT EXISTS `lichsugd` (
  `MaGD` int(11) NOT NULL AUTO_INCREMENT,
  `NgayGD` date NOT NULL,
  `MaMH` int(11) NOT NULL,
  `MaTV` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `TongTien` float NOT NULL,
  PRIMARY KEY (`MaGD`),
  KEY `MaMH` (`MaMH`),
  KEY `MaTV` (`MaTV`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='lịch sử giao dịch';

--
-- Dumping data for table `lichsugd`
--

INSERT INTO `lichsugd` (`MaGD`, `NgayGD`, `MaMH`, `MaTV`, `SoLuong`, `TongTien`) VALUES
(1, '2017-12-20', 8, 1, 1, 128000),
(2, '2017-12-20', 10, 1, 1, 130000);

-- --------------------------------------------------------

--
-- Table structure for table `loaiao`
--

DROP TABLE IF EXISTS `loaiao`;
CREATE TABLE IF NOT EXISTS `loaiao` (
  `MaLoai` int(11) NOT NULL AUTO_INCREMENT,
  `TenLoai` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`MaLoai`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='loại áo';

--
-- Dumping data for table `loaiao`
--

INSERT INTO `loaiao` (`MaLoai`, `TenLoai`) VALUES
(1, 'Áo thun'),
(2, 'Áo khoắc');

-- --------------------------------------------------------

--
-- Table structure for table `mathang`
--

DROP TABLE IF EXISTS `mathang`;
CREATE TABLE IF NOT EXISTS `mathang` (
  `MaMH` int(11) NOT NULL AUTO_INCREMENT,
  `TenMH` text COLLATE utf8_unicode_ci NOT NULL,
  `MaLoai` int(11) NOT NULL,
  `MaPB` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `DiemThuong` int(11) NOT NULL,
  `GiaA` float NOT NULL,
  `GiaB` int(11) NOT NULL,
  `Sale` int(11) NOT NULL,
  `Hinh` text COLLATE utf8_unicode_ci NOT NULL,
  `GioiThieu` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`MaMH`),
  KEY `MaLoai` (`MaLoai`),
  KEY `MaPB` (`MaPB`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='mặt hàng áo';

--
-- Dumping data for table `mathang`
--

INSERT INTO `mathang` (`MaMH`, `TenMH`, `MaLoai`, `MaPB`, `SoLuong`, `DiemThuong`, `GiaA`, `GiaB`, `Sale`, `Hinh`, `GioiThieu`) VALUES
(1, 'NURSE', 1, 1, 34, 8, 425000, 1234, 20, 'img_547ef8c9156bb.jpg', '<p>-5.3 oz., trước shrunk 100% cotton</p>\r\n<p>-Tối Heather là 50/50 cotton/sợi polyester</p>\r\n<p>-Thể thao xám là 90/10 bông/polyester</p>\r\n<p>-Double-kim khâu đường tiệm cận, dưới hem và tay áo</p>\r\n<p>-Tứ hóa</p>\r\n<p>-7/8 inch liền mạch cổ</p>\r\n<p>-Vai taping</p>'),
(2, 'NURSE', 1, 2, 20, 10, 240000, 500, 0, 'img_547ef8cae6768', '<p>-5.3 oz., trước shrunk 100% cotton</p>\r\n<p>-Tối Heather là 50/50 cotton/sợi polyester</p>\r\n<p>-Thể thao xám là 90/10 bông/polyester</p>\r\n<p>-Double-kim khâu đường tiệm cận, dưới hem và tay áo</p>\r\n<p>-Tứ hóa</p>\r\n<p>-7/8 inch liền mạch cổ</p>\r\n<p>-Vai taping</p>'),
(3, 'FOR NURSE HEROES ONLY', 2, 3, 0, 24, 241000, 1200, 0, 'SF-Hoodie-red.jpg', '<p>Tee độc quyền này là hoàn hảo cho bạn Tại sao Bởi vì bạn xứng đáng để cảm thấy tự hào và sự hài lòng trong bạn là ai.</p>\r\n<p>-Sợi máy bay phản lực không nhẹ</p>\r\nMũ trùm hai lót với dây buộc phù hợp</p>\r\n<p>-Khâu hai khâu</p>\r\n<p>-Túi đựng</p>\r\n<p>-Hai còng cuffs</p>\r\n<p>-1 xương sườn thể thao X 1 với spandex\r\nQuarter-turned để loại bỏ nếp nhăn trung tâm</p>'),
(4, 'FOR NURSE HEROES ONLY', 2, 1, 12, 22, 100000, 1000, 0, 'SF-Hoodie-royal-blue.jpg', '<p>Tee độc quyền này là hoàn hảo cho bạn Tại sao Bởi vì bạn xứng đáng để cảm thấy tự hào và sự hài lòng trong bạn là ai.</p>\r\n<p>-Sợi máy bay phản lực không nhẹ</p>\r\nMũ trùm hai lót với dây buộc phù hợp</p>\r\n<p>-Khâu hai khâu</p>\r\n<p>-Túi đựng</p>\r\n<p>-Hai còng cuffs</p>\r\n<p>-1 xương sườn thể thao X 1 với spandex\r\nQuarter-turned để loại bỏ nếp nhăn trung tâm</p>'),
(5, 'FOR NURSE HEROES ONLY', 2, 2, 50, 23, 604000, 2400, 0, 'Nurse Hero Hoodie Black.jpg', '<p>Tee độc quyền này là hoàn hảo cho bạn Tại sao Bởi vì bạn xứng đáng để cảm thấy tự hào và sự hài lòng trong bạn là ai.</p>\r\n<p>-Sợi máy bay phản lực không nhẹ</p>\r\nMũ trùm hai lót với dây buộc phù hợp</p>\r\n<p>-Khâu hai khâu</p>\r\n<p>-Túi đựng</p>\r\n<p>-Hai còng cuffs</p>\r\n<p>-1 xương sườn thể thao X 1 với spandex\r\nQuarter-turned để loại bỏ nếp nhăn trung tâm</p>'),
(6, 'US NAVY', 1, 1, 21, 40, 260000, 840, 35, 'US-NAVY.jpg', '<p>-5.3 oz., trước shrunk 100% cotton</p>\r\n<p>-Tối Heather là 50/50 cotton/sợi polyester</p>\r\n<p>-Thể thao xám là 90/10 bông/polyester</p>\r\n<p>-Double-kim khâu đường tiệm cận, dưới hem và tay áo</p>\r\n<p>-Tứ hóa</p>\r\n<p>-7/8 inch liền mạch cổ</p>\r\n<p>-Vai taping</p>'),
(7, 'US NAVY', 1, 2, 30, 40, 420000, 3110, 15, 'xfcbgx fg.jpg', '<p>-5.3 oz., trước shrunk 100% cotton</p>\r\n<p>-Tối Heather là 50/50 cotton/sợi polyester</p>\r\n<p>-Thể thao xám là 90/10 bông/polyester</p>\r\n<p>-Double-kim khâu đường tiệm cận, dưới hem và tay áo</p>\r\n<p>-Tứ hóa</p>\r\n<p>-7/8 inch liền mạch cổ</p>\r\n<p>-Vai taping</p>'),
(8, 'SUPER ULTRA VIOLENCE', 1, 2, 24, 10, 128000, 420, 0, 'Super-Ultra-Violence.jpg', '<p>Tuyệt vời Bolshy Yarblockos cho bạn trai của tôi!</p>\r\n<p>-5.3 oz., trước shrunk 100% cotton</p>\r\n<p>-Tối Heather là 50/50 cotton/sợi polyester</p>\r\n<p>-Thể thao xám là 90/10 bông/polyester</p>\r\n<p>-Double-kim khâu đường tiệm cận, dưới hem và tay áo</p>\r\n<p>-Tứ hóa</p>\r\n<p>-7/8 inch liền mạch cổ</p>\r\n<p>-Vai taping</p>'),
(9, 'DUNGEON MASTERS POWER', 1, 1, 45, 24, 130000, 2510, 10, '71006-1491552936608-Gildan-Men-Black-_w93_-front.jpg', '<p>-5.3 oz., trước shrunk 100% cotton</p>\r\n<p>-Tối Heather là 50/50 cotton/sợi polyester</p>\r\n<p>-Thể thao xám là 90/10 bông/polyester</p>\r\n<p>-Double-kim khâu đường tiệm cận, dưới hem và tay áo</p>\r\n<p>-Tứ hóa</p>\r\n<p>-7/8 inch liền mạch cổ</p>\r\n<p>-Vai taping</p>'),
(10, 'CORGI CHRISTMAS TREE', 1, 2, 40, 12, 130000, 385, 0, '78468-1510802356363-Gildan-Swe-Red-_w93_-front.jpg', '<p>-Máy bay sợi cho êm ái và uống thuốc không có hiệu quả</p>\r\nThời trang -2 x 1 sườn với spandex\r\n<p>-Đôi-kim khâu</p>\r\n<p>-Quý-bật để loại bỏ các trung tâm nhăn</p>'),
(11, 'US NAVY', 1, 2, 30, 40, 420000, 3110, 15, 'xfcbgx fg.jpg', '<p>-5.3 oz., trước shrunk 100% cotton</p>\r\n<p>-Tối Heather là 50/50 cotton/sợi polyester</p>\r\n<p>-Thể thao xám là 90/10 bông/polyester</p>\r\n<p>-Double-kim khâu đường tiệm cận, dưới hem và tay áo</p>\r\n<p>-Tứ hóa</p>\r\n<p>-7/8 inch liền mạch cổ</p>\r\n<p>-Vai taping</p>'),
(12, 'NURSE', 1, 1, 34, 8, 425000, 1234, 20, 'img_547ef8c9156bb.jpg', '<p>-5.3 oz., trước shrunk 100% cotton</p>\r\n<p>-Tối Heather là 50/50 cotton/sợi polyester</p>\r\n<p>-Thể thao xám là 90/10 bông/polyester</p>\r\n<p>-Double-kim khâu đường tiệm cận, dưới hem và tay áo</p>\r\n<p>-Tứ hóa</p>\r\n<p>-7/8 inch liền mạch cổ</p>\r\n<p>-Vai taping</p>'),
(13, 'FOR NURSE HEROES ONLY', 2, 1, 12, 22, 100000, 1000, 0, 'SF-Hoodie-royal-blue.jpg', '<p>Tee độc quyền này là hoàn hảo cho bạn Tại sao Bởi vì bạn xứng đáng để cảm thấy tự hào và sự hài lòng trong bạn là ai.</p>\r\n<p>-Sợi máy bay phản lực không nhẹ</p>\r\nMũ trùm hai lót với dây buộc phù hợp</p>\r\n<p>-Khâu hai khâu</p>\r\n<p>-Túi đựng</p>\r\n<p>-Hai còng cuffs</p>\r\n<p>-1 xương sườn thể thao X 1 với spandex\r\nQuarter-turned để loại bỏ nếp nhăn trung tâm</p>'),
(14, 'AVIATOR GLASSES AND BEARD', 1, 1, 153, 40, 243000, 1400, 4, 'zztop-t-shirt.jpg', '<p>- 5,3 oz., trước shrunk 100% cotton<br>\r\n- Dark Heather là 50/50 cotton/sợi polyester<br>\r\n- Thể thao xám là 90/10 bông/polyester<br>\r\n- Đôi-kim khâu đường tiệm cận, dưới hem và tay áo<br>\r\n- Tứ hóa<br>\r\n- 7/8 inch liền mạch cổ áo<br>\r\n- Vai đến vai taping<br>\r\n</p>'),
(15, 'GALAXY LION', 1, 2, 420, 50, 146000, 2150, 10, 'Galaxy-Lion.jpg', '<p>\r\n-5.3 oz., pre-shrunk 100% cotton<br>\r\n-Dark Heather is 50/50 cotton/polyester<br>\r\n-Sport Grey is 90/10 cotton/polyester<br>\r\n-Double-needle stitched neckline, bottom hem and sleeves<br>\r\n-Quarter-turned<br>\r\n-Seven-eighths inch seamless collar<br>\r\n-Shoulder-to-shoulder taping<br>\r\n</p>'),
(16, 'FRONT PRINT VERSION_11', 2, 3, 450, 100, 341000, 2350, 5, '79367-1507171838401-Gildan-Hoo-Navy-Blue-_w93_-front.jpg', '<p>\r\n- Air jet yarn for softness and no-pill performance<br>\r\n- Double-lined hood with matching drawstring<br>\r\n- Double-needle stitching<br>\r\n- Pouch pocket<br>\r\n- Double-needle cuffs 1 X 1 athletic rib with spandex<br>\r\n- Quarter-turned to eliminate center crease<br>\r\n</p>'),
(17, 'HOPE EST. 33 AD', 1, 2, 320, 20, 311000, 570, 0, 'SunFrogTee15.jpg', '<p>\r\n- 5.3 oz., pre-shrunk 100% cotton<br>\r\n- Dark Heather is 50/50 cotton/polyester<br>\r\n- Sport Grey is 90/10 cotton/polyester<br>\r\n- Double-needle stitched neckline, bottom hem and sleeves<br>\r\n- Quarter-turned<br>\r\n- Seven-eighths inch seamless collar<br>\r\n- Shoulder-to-shoulder taping<br>\r\n</p>'),
(18, 'RELATIVITY', 1, 1, 100, 40, 145000, 640, 1, 'Relativity.jpg', '<p>\r\n- 5.3 oz., pre-shrunk 100% cotton<br>\r\n- Dark Heather is 50/50 cotton/polyester<br>\r\n- Sport Grey is 90/10 cotton/polyester<br>\r\n- Double-needle stitched neckline, bottom hem and sleeves<br>\r\n- Quarter-turned<br>\r\n- Seven-eighths inch seamless collar<br>\r\n- Shoulder-to-shoulder taping<br>\r\n</p>'),
(19, 'RUBIK', 1, 3, 234, 21, 123000, 450, 0, 'rubik.jpg', '<p>\r\n- 5.3 oz., pre-shrunk 100% cotton<br>\r\n- Dark Heather is 50/50 cotton/polyester<br>\r\n- Sport Grey is 90/10 cotton/polyester<br>\r\n- Double-needle stitched <br>neckline, bottom hem and sleeves\r\n- Quarter-turned<br>\r\n- Seven-eighths inch seamless collar<br>\r\n- Shoulder-to-shoulder taping<br>\r\n</p>'),
(20, 'KNITTING MAKES ME HAPPY GREAT FUNNY SHIRT', 1, 2, 425, 35, 241000, 350, 1, 'Knitting-Makes-Me-Happy-Great-Funny-Shirt.jpg', '<p>\r\n- 5.3 oz., pre-shrunk 100% cotton<br>\r\n- Dark Heather is 50/50 cotton/polyester<br>\r\n- Sport Grey is 90/10 cotton/polyester<br>\r\n- Seamless half-inch collar<br>\r\n- Side seamed<br>\r\n- Cap sleeves<br>\r\n- Double-needle stitched hems<br>\r\n- Taped neck and shoulders<br>\r\n</p>'),
(21, 'MUSICAL BRAIN', 1, 1, 456, 42, 234000, 460, 1, 'Musical-Brain-White-front.jpg', '<p>\r\n- 5.3 oz., pre-shrunk 100% cotton<br>\r\n- Dark Heather is 50/50 cotton/polyester<br>\r\n- Sport Grey is 90/10 cotton/polyester<br>\r\n- Double-needle stitched neckline, bottom hem and sleeves<br>\r\n- Quarter-turned<br>\r\n- Seven-eighths inch seamless collar<br>\r\n- Shoulder-to-shoulder taping<br>\r\n</p>'),
(22, 'BOOKS, TEA AND CATS', 2, 2, 744, 55, 312000, 400, 2, 'img_5661097dc1e08.jpg', '<p>\r\n- Air jet yarn for softness and no-pill performance<br>\r\n- Double-lined hood with matching drawstring<br>\r\n- Double-needle stitching<br>\r\n- Pouch pocket<br>\r\n- Double-needle cuffs 1 X 1 athletic rib with spandex<br>\r\n- Quarter-turned to eliminate center crease<br>\r\n</p>'),
(23, 'PHOTOGRAPHY', 1, 1, 652, 30, 210000, 30, 8, 'Photography.jpg', '<p>\r\n- 5.3 oz., pre-shrunk 100% cotton<br>\r\n- Dark Heather is 50/50 cotton/polyester<br>\r\n- Sport Grey is 90/10 cotton/polyester<br>\r\n- Double-needle stitched neckline, bottom hem and sleeves<br>\r\n- Quarter-turned<br>\r\n- Seven-eighths inch seamless collar<br>\r\n- Shoulder-to-shoulder taping<br>\r\n</p>'),
(24, 'PEACE', 1, 2, 811, 21, 124000, 230, 2, '541.jpg', '<p>\r\n- 5.3 oz., pre-shrunk 100% cotton<br>\r\n- Dark Heather is 50/50 cotton/polyester<br>\r\n- Sport Grey is 90/10 cotton/polyester<br>\r\n- Double-needle stitched neckline, bottom hem and sleeves<br>\r\n- Quarter-turned<br>\r\n- Seven-eighths inch seamless collar<br>\r\n- Shoulder-to-shoulder taping<br>\r\n</p>'),
(25, 'BLOSSOMING LOVE', 1, 2, 451, 50, 233000, 234, 2, 'Blossoming-Love.jpg', '<p>\r\n- 5.3 oz., pre-shrunk 100% cotton<br>\r\n- Dark Heather is 50/50 cotton/polyester<br>\r\n- Sport Grey is 90/10 cotton/polyester<br>\r\n- Seamless half-inch collar<br>\r\n- Side seamed<br>\r\n- Cap sleeves<br>\r\n- Double-needle stitched hems<br>\r\n- Taped neck and shoulders<br>\r\n</p>'),
(26, 'BORN TO CAMP', 2, 1, 245, 42, 255000, 560, 2, '87299-1483203662242-Gildan-Hoo-White-_w91_-front.jpg', '<p>\r\n- Air jet yarn for softness and no-pill performance<br>\r\n- Double-lined hood with matching drawstring<br>\r\n- Double-needle stitching<br>\r\n- Pouch pocket<br>\r\n- Double-needle cuffs 1 X 1 athletic rib with spandex<br>\r\n- Quarter-turned to eliminate center crease<br>\r\n</p>');

-- --------------------------------------------------------

--
-- Table structure for table `phobien`
--

DROP TABLE IF EXISTS `phobien`;
CREATE TABLE IF NOT EXISTS `phobien` (
  `MaPB` int(11) NOT NULL AUTO_INCREMENT,
  `TenPB` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`MaPB`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='phổ biến';

--
-- Dumping data for table `phobien`
--

INSERT INTO `phobien` (`MaPB`, `TenPB`) VALUES
(1, 'Hot'),
(2, 'New'),
(3, 'Old');

-- --------------------------------------------------------

--
-- Table structure for table `thanhvien`
--

DROP TABLE IF EXISTS `thanhvien`;
CREATE TABLE IF NOT EXISTS `thanhvien` (
  `MaTV` int(11) NOT NULL AUTO_INCREMENT,
  `User` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Pass` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Level` int(11) NOT NULL,
  `TichLuy` int(11) NOT NULL,
  PRIMARY KEY (`MaTV`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='thành viên';

--
-- Dumping data for table `thanhvien`
--

INSERT INTO `thanhvien` (`MaTV`, `User`, `Pass`, `Level`, `TichLuy`) VALUES
(1, 'ken', '111', 0, 0),
(3, 'maria', '333', 1, 0),
(9, 'vip', '0310', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `thongtintk`
--

DROP TABLE IF EXISTS `thongtintk`;
CREATE TABLE IF NOT EXISTS `thongtintk` (
  `MaTK` int(11) NOT NULL AUTO_INCREMENT,
  `HoTen` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `GioiTinh` int(11) NOT NULL,
  `NgaySinh` date NOT NULL,
  `Sdt` int(11) NOT NULL,
  `DiaChi` text COLLATE utf8_unicode_ci NOT NULL,
  `MaTV` int(11) NOT NULL,
  PRIMARY KEY (`MaTK`),
  KEY `MaTV` (`MaTV`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='thông tin tài khoản thành viên';

--
-- Dumping data for table `thongtintk`
--

INSERT INTO `thongtintk` (`MaTK`, `HoTen`, `GioiTinh`, `NgaySinh`, `Sdt`, `DiaChi`, `MaTV`) VALUES
(1, 'Nguyễn Văn Lâm', 1, '1995-10-12', 98102413, '102/E Xuân Phú, Tân Bình', 1),
(2, 'Lê Hồ Cường', 1, '1992-03-15', 9841231, '111 Trường Trinh, Bình Thạch', 3),
(6, 'Nguyễn Vũ Minh Thức', 1, '1997-10-03', 981074397, '102/5E Tân Tiến, Xuân Thới Đông, HM, Tp.HCM', 9);

-- --------------------------------------------------------

--
-- Table structure for table `tuihang`
--

DROP TABLE IF EXISTS `tuihang`;
CREATE TABLE IF NOT EXISTS `tuihang` (
  `MaTH` int(11) NOT NULL AUTO_INCREMENT,
  `MaTV` int(11) NOT NULL,
  `MaMH` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `LoaiGia` int(11) NOT NULL,
  PRIMARY KEY (`MaTH`),
  KEY `MaTV` (`MaTV`),
  KEY `MaMH` (`MaMH`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci COMMENT='túi hàng';

--
-- Dumping data for table `tuihang`
--

INSERT INTO `tuihang` (`MaTH`, `MaTV`, `MaMH`, `SoLuong`, `LoaiGia`) VALUES
(2, 1, 6, 2, 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lichsugd`
--
ALTER TABLE `lichsugd`
  ADD CONSTRAINT `lsgd_mamh` FOREIGN KEY (`MaMH`) REFERENCES `mathang` (`MaMH`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `lsgd_matv` FOREIGN KEY (`MaTV`) REFERENCES `thanhvien` (`MaTV`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mathang`
--
ALTER TABLE `mathang`
  ADD CONSTRAINT `mh_maloai` FOREIGN KEY (`MaLoai`) REFERENCES `loaiao` (`MaLoai`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `mh_phobien` FOREIGN KEY (`MaPB`) REFERENCES `phobien` (`MaPB`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `thongtintk`
--
ALTER TABLE `thongtintk`
  ADD CONSTRAINT `tttk_matv` FOREIGN KEY (`MaTV`) REFERENCES `thanhvien` (`MaTV`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tuihang`
--
ALTER TABLE `tuihang`
  ADD CONSTRAINT `tuihang_ibfk_1` FOREIGN KEY (`MaMH`) REFERENCES `mathang` (`MaMH`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `tuihang_ibfk_2` FOREIGN KEY (`MaTV`) REFERENCES `thanhvien` (`MaTV`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

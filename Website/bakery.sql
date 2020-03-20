-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- 主機: localhost
-- 產生時間： 2019-01-16 15:07:20
-- 伺服器版本: 5.7.17-log
-- PHP 版本： 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `bakery`
--

-- --------------------------------------------------------

--
-- 資料表結構 `cart`
--

CREATE TABLE `cart` (
  `cId` tinyint(8) NOT NULL,
  `pNo` char(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mId` tinyint(8) NOT NULL,
  `cartTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `amount` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `cart`
--

INSERT INTO `cart` (`cId`, `pNo`, `mId`, `cartTime`, `amount`) VALUES
(1, 'b10234', 1, '2019-01-16 14:42:48', 5),
(2, 'b10234', 2, '2019-01-16 14:42:57', 5),
(3, 'b30999', 3, '2019-01-16 14:43:02', 1),
(4, 'b40555', 1, '2019-01-16 14:43:08', 10),
(5, 'd11222', 1, '2019-01-16 14:43:12', 1),
(6, 'd11222', 3, '2019-01-16 14:43:17', 1),
(7, 'd20777', 4, '2019-01-16 14:43:21', 1),
(8, 'v00111', 5, '2019-01-16 14:43:26', 2),
(13, 'b51111', 1, '2019-01-16 14:43:30', 1),
(14, 'v01888', 1, '2019-01-16 14:43:46', 4);

-- --------------------------------------------------------

--
-- 資料表結構 `member`
--

CREATE TABLE `member` (
  `user` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pw` char(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mId` tinyint(8) NOT NULL,
  `name` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` date DEFAULT NULL,
  `sex` enum('M','F') COLLATE utf8mb4_unicode_ci DEFAULT 'M',
  `phone` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `member`
--

INSERT INTO `member` (`user`, `pw`, `mId`, `name`, `birthday`, `sex`, `phone`, `address`, `email`) VALUES
('root', 'rootroot', 1, 'Jenny', '1979-01-01', 'F', '02-2222001', '台北市中山北路100號', 'jenny0101@gmail.com'),
('a123', 'a134a134', 2, 'Tony', '1980-12-12', 'M', '02-2288009', '台北市羅斯福路200號', 'tony@ms1.hinet.net'),
('b123', 'rootroot', 3, 'David', '1975-11-22', 'M', '04-2468888', '台中市中港路200號', 'david@ms1.hinet.net'),
('c123', 'c123c123', 4, 'Jennifer', '1974-03-04', 'F', '07-2221111', '高雄市五福三路300號', 'jen33@ms3.hinet.net'),
('d123', 'd123d123', 5, 'Jackson', '1980-03-30', NULL, '06-3210321', '台南縣中華路600號', 'jack99@ms9.hinet.net'),
('f123', 'f123f123', 6, 'Su', '1982-06-06', NULL, '07-2345678', '高雄市蓮海路70號', 'su88@ms2.hinet.net'),
('kiki1016y', '12345678', 7, 'Kiki', '2019-01-16', 'F', '0920190116', '台北市忠孝東路63號', 'kiki1016y@yahoo.com.'),
('Jessica', '12345678', 8, 'Jessica', '0000-00-00', 'M', '', '', 'jessica0101@gmail.co');

-- --------------------------------------------------------

--
-- 資料表結構 `product`
--

CREATE TABLE `product` (
  `pNo` char(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pName` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unitPrice` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `product`
--

INSERT INTO `product` (`pNo`, `pName`, `unitPrice`) VALUES
('b10234', '泡芙', '50.00'),
('b20666', '手工餅乾', '20.00'),
('b30999', '6吋生日蛋糕', '450.00'),
('b40555', '瑞士蛋糕卷', '80.00'),
('b51111', '生巧克力', '120.00'),
('d03333', '銅鑼燒禮盒', '300.00'),
('d11222', '葡式蛋塔', '35.00'),
('d20777', '布朗尼', '60.00'),
('v00111', '起司塔', '80.00'),
('v01888', '檸檬塔', '45.00');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cId`),
  ADD KEY `mId` (`mId`,`cartTime`),
  ADD KEY `pNo` (`pNo`);

--
-- 資料表索引 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`mId`),
  ADD UNIQUE KEY `user` (`user`);

--
-- 資料表索引 `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pNo`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `cart`
--
ALTER TABLE `cart`
  MODIFY `cId` tinyint(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- 使用資料表 AUTO_INCREMENT `member`
--
ALTER TABLE `member`
  MODIFY `mId` tinyint(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- 已匯出資料表的限制(Constraint)
--

--
-- 資料表的 Constraints `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`pNo`) REFERENCES `product` (`pNo`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`mId`) REFERENCES `member` (`mId`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 07 Nis 2023, 09:03:25
-- Sunucu sürümü: 8.0.31
-- PHP Sürümü: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `9036sinav`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `categoryid` int NOT NULL AUTO_INCREMENT,
  `CategoryName` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`categoryid`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Tablo döküm verisi `category`
--

INSERT INTO `category` (`categoryid`, `CategoryName`) VALUES
(1, 'Android Telefonlar'),
(2, 'IOS Telefonlar'),
(3, 'Tuslu Telefonlar');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `marka`
--

DROP TABLE IF EXISTS `marka`;
CREATE TABLE IF NOT EXISTS `marka` (
  `markaid` int NOT NULL AUTO_INCREMENT,
  `MarkaName` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`markaid`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Tablo döküm verisi `marka`
--

INSERT INTO `marka` (`markaid`, `MarkaName`) VALUES
(1, 'Samsung'),
(2, 'Honor'),
(3, 'Iphone'),
(4, 'Nokia'),
(5, 'Xiaomi');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `phone`
--

DROP TABLE IF EXISTS `phone`;
CREATE TABLE IF NOT EXISTS `phone` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `Image` varchar(50) NOT NULL,
  `Price` decimal(64,3) NOT NULL,
  `markaid` int DEFAULT NULL,
  `categoryid` int DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `markaid` (`markaid`),
  KEY `categoryid` (`categoryid`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Tablo döküm verisi `phone`
--

INSERT INTO `phone` (`ID`, `Name`, `Image`, `Price`, `markaid`, `categoryid`) VALUES
(1, 'Samsung Galaxy M13', 'images/1.png', '7.500', 1, 1),
(2, 'Honor 70', 'images/2.png', '12.500', 2, 1),
(3, 'Iphone 14 Pro Max', 'images/3.png', '47.500', 3, 2),
(4, 'Iphone 13 Mini', 'images/4.png', '27.000', 3, 2),
(5, 'Nokia 220', 'images/5.png', '0.800', 4, 3),
(6, 'Redmi Note 11S', 'images/6.png', '7.400', 5, 1),
(11, 'Iphone 12 Pro', 'images/4.png', '28.800', 3, 2),
(10, 'Samsung Galaxy Grand Neo', 'images/3.png', '5.500', 1, 1),
(12, 'Samsung Galaxy S4', 'images/3.png', '5.000', 1, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

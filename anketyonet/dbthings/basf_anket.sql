-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 16 Oca 2018, 13:08:03
-- Sunucu sürümü: 10.1.21-MariaDB
-- PHP Sürümü: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `basf_anket`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `anket`
--

CREATE TABLE `anket` (
  `Id` int(11) NOT NULL,
  `Anket_Ad` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `Anket_Aciklama` text COLLATE utf8_turkish_ci NOT NULL,
  `Anket_Tarih` datetime NOT NULL,
  `Anket_Onay` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `anket`
--

INSERT INTO `anket` (`Id`, `Anket_Ad`, `Anket_Aciklama`, `Anket_Tarih`, `Anket_Onay`) VALUES
(12, 'deneme 5', 'adsfasdfasdf', '0000-00-00 00:00:00', 1),
(13, 'deneme 6', '', '0000-00-00 00:00:00', 0),
(14, 'asdfasdfasdf', 'bu bir açıklamadır', '2018-01-15 21:17:08', 1),
(15, 'asdfasdf', '', '0000-00-00 00:00:00', 1),
(16, 'saat', '', '0000-00-00 00:00:00', 1),
(17, 'ds<fa<df', '', '2018-01-15 10:22:27', 0),
(18, 'asdfasdfadsf', '', '2018-01-15 10:22:34', 0),
(19, 'asdfadsfasdf', '', '2018-01-15 10:22:41', 0),
(20, 'asdfsdfasdf', '<p>dsfasdfdsfasdf</p>\r\n', '2018-01-16 01:50:08', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ip_kontrol`
--

CREATE TABLE `ip_kontrol` (
  `Id` int(11) NOT NULL,
  `Ip` bigint(10) NOT NULL,
  `Anket_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `ip_kontrol`
--

INSERT INTO `ip_kontrol` (`Id`, `Ip`, `Anket_Id`) VALUES
(5, 0, 12),
(6, 0, 13),
(7, 0, 14),
(8, 0, 13),
(9, 0, 13);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `soru`
--

CREATE TABLE `soru` (
  `Id` int(11) NOT NULL,
  `Anket_Id` int(11) NOT NULL,
  `Soru_Detay` text COLLATE utf8_turkish_ci NOT NULL,
  `Cevap_Evet` int(5) NOT NULL DEFAULT '0',
  `Cevap_Hayir` int(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `soru`
--

INSERT INTO `soru` (`Id`, `Anket_Id`, `Soru_Detay`, `Cevap_Evet`, `Cevap_Hayir`) VALUES
(18, 14, '<p>dfasfasdfasdfadads</p>\r\n', 2, 0),
(19, 14, '<p>asdfsadfsadfasdf</p>\r\n', 1, 1),
(20, 13, '<p>sdafasdfsadfsadfsadf</p>\r\n', 3, 0),
(21, 13, '<p>asdfasdfasdf</p>\r\n', 2, 1);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `anket`
--
ALTER TABLE `anket`
  ADD PRIMARY KEY (`Id`);

--
-- Tablo için indeksler `ip_kontrol`
--
ALTER TABLE `ip_kontrol`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Anket_Id` (`Anket_Id`);

--
-- Tablo için indeksler `soru`
--
ALTER TABLE `soru`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `soru_ibfk_1` (`Anket_Id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `anket`
--
ALTER TABLE `anket`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- Tablo için AUTO_INCREMENT değeri `ip_kontrol`
--
ALTER TABLE `ip_kontrol`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Tablo için AUTO_INCREMENT değeri `soru`
--
ALTER TABLE `soru`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `ip_kontrol`
--
ALTER TABLE `ip_kontrol`
  ADD CONSTRAINT `ip_kontrol_ibfk_1` FOREIGN KEY (`Anket_Id`) REFERENCES `anket` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `soru`
--
ALTER TABLE `soru`
  ADD CONSTRAINT `soru_ibfk_1` FOREIGN KEY (`Anket_Id`) REFERENCES `anket` (`Id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

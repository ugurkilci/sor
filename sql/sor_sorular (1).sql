-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost:3306
-- Üretim Zamanı: 26 Haz 2019, 00:00:46
-- Sunucu sürümü: 10.0.38-MariaDB-cll-lve
-- PHP Sürümü: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `u8634256_kxyz`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sor_sorular`
--

CREATE TABLE `sor_sorular` (
  `sor_id` int(11) NOT NULL,
  `sor_kadi` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `sor_mesaj` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `sor_tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sor_onay` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `sor_sorular`
--
ALTER TABLE `sor_sorular`
  ADD PRIMARY KEY (`sor_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `sor_sorular`
--
ALTER TABLE `sor_sorular`
  MODIFY `sor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=295;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 04 Tem 2018, 12:20:04
-- Sunucu sürümü: 5.7.19
-- PHP Sürümü: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `asansorprojesi`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ariza`
--

DROP TABLE IF EXISTS `ariza`;
CREATE TABLE IF NOT EXISTS `ariza` (
  `ariza_id` int(11) NOT NULL AUTO_INCREMENT,
  `ariza_kodu` int(3) NOT NULL,
  `ariza_durum` varchar(25) NOT NULL,
  `ariza_icerik` varchar(255) NOT NULL,
  `ariza_tarih` varchar(10) NOT NULL,
  `ariza_asansor` int(11) NOT NULL,
  `ariza_onaran` int(11) NOT NULL,
  PRIMARY KEY (`ariza_id`),
  KEY `ariza_onaran` (`ariza_onaran`),
  KEY `ariza_asansor` (`ariza_asansor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `asansor`
--

DROP TABLE IF EXISTS `asansor`;
CREATE TABLE IF NOT EXISTS `asansor` (
  `asansor_id` int(11) NOT NULL AUTO_INCREMENT,
  `asansor_kodu` int(11) NOT NULL,
  `asansor_latitude` varchar(15) NOT NULL,
  `asansor_longitude` varchar(15) NOT NULL,
  `asansor_adres` varchar(150) NOT NULL,
  `asansor_yetkili` int(11) NOT NULL,
  `asansor_bakimTarihi` varchar(10) NOT NULL,
  `asansor_arizaTarihi` varchar(10) NOT NULL,
  `asansor_yapimTarihi` varchar(10) NOT NULL,
  PRIMARY KEY (`asansor_id`),
  KEY `asansor_yetkili` (`asansor_yetkili`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `bakim`
--

DROP TABLE IF EXISTS `bakim`;
CREATE TABLE IF NOT EXISTS `bakim` (
  `bakim_id` int(11) NOT NULL AUTO_INCREMENT,
  `bakim_icerik` varchar(500) NOT NULL,
  `bakim_durum` varchar(50) NOT NULL,
  `bakim_tarih` varchar(10) NOT NULL,
  `bakim_asansor` int(11) NOT NULL,
  `bakim_yapan` int(11) NOT NULL,
  `bakim_tutar` varchar(7) NOT NULL,
  PRIMARY KEY (`bakim_id`),
  KEY `bakim_asansor` (`bakim_asansor`),
  KEY `bakim_yapan` (`bakim_yapan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `degisim`
--

DROP TABLE IF EXISTS `degisim`;
CREATE TABLE IF NOT EXISTS `degisim` (
  `degisim_id` int(11) NOT NULL AUTO_INCREMENT,
  `degisim_türü` varchar(5) NOT NULL,
  `degisim_kodu` int(11) NOT NULL,
  `degisim_stok` int(11) NOT NULL,
  PRIMARY KEY (`degisim_id`),
  KEY `degisim_stok` (`degisim_stok`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici`
--

DROP TABLE IF EXISTS `kullanici`;
CREATE TABLE IF NOT EXISTS `kullanici` (
  `kullanici_tckn` int(11) NOT NULL AUTO_INCREMENT,
  `kullanici_adi` varchar(20) NOT NULL,
  `kullanici_sifre` varchar(12) NOT NULL,
  `kullanici_adres` varchar(200) NOT NULL,
  `kullanici_tel` varchar(15) NOT NULL,
  `kullanici_rol` int(1) NOT NULL,
  PRIMARY KEY (`kullanici_tckn`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `musteri`
--

DROP TABLE IF EXISTS `musteri`;
CREATE TABLE IF NOT EXISTS `musteri` (
  `musteri_id` int(11) NOT NULL AUTO_INCREMENT,
  `musteri_adSoy` varchar(50) NOT NULL,
  `musteri_adres` varchar(150) NOT NULL,
  `musteri_tel` varchar(11) NOT NULL,
  `musteri_mail` varchar(50) NOT NULL,
  PRIMARY KEY (`musteri_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `odeme`
--

DROP TABLE IF EXISTS `odeme`;
CREATE TABLE IF NOT EXISTS `odeme` (
  `odeme_id` int(11) NOT NULL AUTO_INCREMENT,
  `odeme_tutar` varchar(7) NOT NULL,
  `odeme_musteri` int(11) NOT NULL,
  `odeme_tarih` varchar(10) NOT NULL,
  PRIMARY KEY (`odeme_id`),
  KEY `odeme_musteri` (`odeme_musteri`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `stok`
--

DROP TABLE IF EXISTS `stok`;
CREATE TABLE IF NOT EXISTS `stok` (
  `stok_kodu` int(11) NOT NULL AUTO_INCREMENT,
  `stok_adi` varchar(50) NOT NULL,
  `stok_fiyat` varchar(10) NOT NULL,
  `stok_birim` varchar(10) NOT NULL,
  `stok_miktar` varchar(10) NOT NULL,
  PRIMARY KEY (`stok_kodu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `ariza`
--
ALTER TABLE `ariza`
  ADD CONSTRAINT `ariza_asansor` FOREIGN KEY (`ariza_asansor`) REFERENCES `asansor` (`asansor_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ariza_onaran` FOREIGN KEY (`ariza_onaran`) REFERENCES `kullanici` (`kullanici_tckn`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `asansor`
--
ALTER TABLE `asansor`
  ADD CONSTRAINT `asansor_yetkili` FOREIGN KEY (`asansor_yetkili`) REFERENCES `musteri` (`musteri_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `bakim`
--
ALTER TABLE `bakim`
  ADD CONSTRAINT `bakim_asansor` FOREIGN KEY (`bakim_asansor`) REFERENCES `asansor` (`asansor_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bakim_yapan` FOREIGN KEY (`bakim_yapan`) REFERENCES `kullanici` (`kullanici_tckn`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `degisim`
--
ALTER TABLE `degisim`
  ADD CONSTRAINT `degisim_stok` FOREIGN KEY (`degisim_stok`) REFERENCES `stok` (`stok_kodu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `odeme`
--
ALTER TABLE `odeme`
  ADD CONSTRAINT `odeme_musteri` FOREIGN KEY (`odeme_musteri`) REFERENCES `musteri` (`musteri_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

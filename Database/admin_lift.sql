-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Anamakine: localhost
-- Üretim Zamanı: 31 Tem 2018, 15:02:46
-- Sunucu sürümü: 5.7.23-0ubuntu0.16.04.1
-- PHP Sürümü: 7.0.30-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `admin_lift`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ariza`
--

CREATE TABLE `ariza` (
  `ariza_id` int(11) NOT NULL,
  `ariza_kodu` varchar(5) NOT NULL,
  `ariza_durum` varchar(25) NOT NULL,
  `ariza_icerik` varchar(255) NOT NULL,
  `ariza_tarih` varchar(10) NOT NULL,
  `ariza_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ariza_asansor` int(11) NOT NULL,
  `ariza_onaran` int(11) NOT NULL DEFAULT '0',
  `ariza_tutar` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `ariza`
--

INSERT INTO `ariza` (`ariza_id`, `ariza_kodu`, `ariza_durum`, `ariza_icerik`, `ariza_tarih`, `ariza_timestamp`, `ariza_asansor`, `ariza_onaran`, `ariza_tutar`) VALUES
(2, 'Er04', 'Onarılmadı', 'içierkasda', '27.07.2018', '2018-07-23 11:19:28', 7, 12, '0'),
(4, 'Er01', 'Onarılmadı', 'asdadasd', '27.07.2018', '2018-07-25 10:57:56', 7, 12, '0');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `asansor`
--

CREATE TABLE `asansor` (
  `asansor_id` int(11) NOT NULL,
  `asansor_kodu` int(11) NOT NULL,
  `asansor_latitude` varchar(15) NOT NULL,
  `asansor_longitude` varchar(15) NOT NULL,
  `asansor_adres` text NOT NULL,
  `asansor_adresTarif` text NOT NULL,
  `asansor_yetkili` int(11) NOT NULL,
  `asansor_bakimTarihi` varchar(10) NOT NULL,
  `asansor_arizaTarihi` varchar(10) NOT NULL,
  `asansor_yapimTarihi` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `asansor`
--

INSERT INTO `asansor` (`asansor_id`, `asansor_kodu`, `asansor_latitude`, `asansor_longitude`, `asansor_adres`, `asansor_adresTarif`, `asansor_yetkili`, `asansor_bakimTarihi`, `asansor_arizaTarihi`, `asansor_yapimTarihi`) VALUES
(7, 1, '39.751944231170', '37.016871867736', 'test asansor', 'asansor tarifi', 3, '', '', '10.20.1020'),
(9, 1223, '39.751333836123', '37.021388707627', 'asdasads', 'asdasdsaddsadas', 3, '', '', '10.10.2010');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `bakim`
--

CREATE TABLE `bakim` (
  `bakim_id` int(11) NOT NULL,
  `bakim_icerik` varchar(500) NOT NULL,
  `bakim_durum` varchar(50) NOT NULL,
  `bakim_tarih` varchar(10) NOT NULL,
  `bakim_asansor` int(11) NOT NULL,
  `bakim_yapan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `degisim`
--

CREATE TABLE `degisim` (
  `degisim_id` int(11) NOT NULL,
  `degisim_turu` varchar(5) NOT NULL,
  `degisim_kodu` int(11) NOT NULL,
  `degisim_stok` int(11) NOT NULL,
  `degisim_tutar` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `degisim`
--

INSERT INTO `degisim` (`degisim_id`, `degisim_turu`, `degisim_kodu`, `degisim_stok`, `degisim_tutar`) VALUES
(2, 'Ariza', 2, 9, 24);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hata`
--

CREATE TABLE `hata` (
  `hata_id` int(11) NOT NULL,
  `hata_kodu` varchar(10) NOT NULL,
  `hata_aciklama` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `hata`
--

INSERT INTO `hata` (`hata_id`, `hata_kodu`, `hata_aciklama`) VALUES
(1, 'Er01', 'Parametreler okunamadı. Sağlama hatası.'),
(2, 'Er02', 'Parametreler yazılamadı. Sağlama hatası.'),
(3, 'Er04', 'Enca kartı ile iletişim kurulamadı.'),
(4, 'Er05', 'DIP-sviç konfigürasyonu okunmadı veya hatalı.'),
(5, 'Er07', 'Akım, sürücü limitinin üzerine çıktı.'),
(6, 'Er08', 'Akım uzun süre sürücü limitine yakın kaldı.'),
(7, 'Er09', 'Motor veya pano aşırı ısındı.'),
(8, 'Er10', 'Ana kontaktörlerin bırakması algılanamadı.'),
(9, 'Er11', 'Ana kontaktörlerin çekmesi algılanamadı.'),
(10, 'Er12', 'Frenin kapanması algılanamadı.'),
(11, 'Er13', 'Frenin açılması algılanamadı.'),
(12, 'Er14', 'DC-bara voltajı aşırı yüksek.'),
(13, 'Er15', 'DC-bara voltajı aşırı düşük.'),
(14, 'Er16', 'Güç modülü (IPM) hata bildirdi.'),
(15, 'Er17', 'Enkoderden hız ölçümü tutarsız.'),
(16, 'Er18', 'Kabin aşırı hızlandı.'),
(17, 'Er19', 'Motor gereken hıza ulaşamadı.'),
(18, 'Er20', 'Enkoderle iletişim kurulamadı.'),
(19, 'Er21', 'Fazlardan en az biri yok.'),
(20, 'Er22', '3-Fazın sırası hatalı.'),
(21, 'Er23', '24V Besleme gerilimi düşük.'),
(22, 'Er24', 'Kabin, en alt katın altına indi.'),
(23, 'Er25', 'Kabin, en üst katın üzerine çıktı.'),
(24, 'Er26', 'Toplam akım ölçümü sıfırdan farklı.'),
(25, 'Er27', 'Kattan kata azami seyir süresi aşıldı.'),
(26, 'Er28', 'EN sinyali alınamadı.'),
(27, 'Er29', 'ML1-ML2 kısa devre'),
(28, 'Er30', 'ML1-ML2 sıralaması yanlış veya okunamıyor.'),
(29, 'Er31', 'Kapı(lar) kapatılamadı.'),
(30, 'Er34', '140 varken 130 yok. Emniyet devresini kontrol edin.'),
(31, 'Er35', 'Emniyet devresi(120) kesildi.'),
(32, 'Er37', 'Hareket sırasında(140) kesildi.'),
(33, 'Er38', 'Enkoder değeri, mıknatıs pozisyonundan farklı.'),
(34, 'Er39', 'Kat seviye mıknatısı görülemedi.'),
(35, 'Er40', 'Deprem sinyali algılandı.'),
(36, 'Er41', '817 sinyali kesilmesi gerekirken kesilmedi.'),
(37, 'Er42', '817 sinyali gelmesi gerekirken gelmedi.'),
(38, 'Er43', '818 sinyali kesilmesi gerekirken kesilmedi.'),
(39, 'Er44', '818 sinyali gelmesi gerekirken gelmedi.'),
(40, 'Er47', 'Fren direnci aşırı ısındı.'),
(41, 'Er48', 'Soğutucu aşırı ısındı.'),
(42, 'Er49', 'Harici hata sinyali (XER1) alındı.'),
(43, 'Er50', 'Harici hata sinyali (XER2) alındı.'),
(44, 'Er51', 'Harici bloke sinyali (XBL1) alındı.'),
(45, 'Er52', 'Harici bloke sinyali (XBL2) alındı.'),
(46, 'Er55', 'Kontaktör düştü.'),
(47, 'Er56', '817 & 818 aynı anda kesik.'),
(48, 'Er58', 'Akım sensörleri offset hatası'),
(49, 'Er59', 'Kabin ters yöne hareket ediyor.'),
(50, 'Er60', 'Kapı köprüleme hatası.'),
(51, 'Er61', 'İşlemci arızası'),
(52, 'Er62', 'İşlemci arızası'),
(53, 'Er63', 'İşlemci arızası'),
(54, 'Er71', 'Lisans anahtarı (dongle) bulunamadı.'),
(55, 'Er72', 'Limitli özellik.'),
(56, 'Er73', 'Kuyuya giriş algılandı.'),
(57, 'Er80', 'Akım, uzun süre motor limitine yakın kaldı.'),
(58, 'Er81', 'Grup kimliği çakışma hatası'),
(59, 'Er82', 'Gruptaki tüm asansörlerin durak sayısı aynı olmalıdır.'),
(60, 'Er83', 'APRE kilidi açılamadı.'),
(61, 'Er84', 'APRE kilitlenemedi.'),
(62, 'Er85', 'Enkoder referans hatası'),
(63, 'Er86', 'UCM algılandı.'),
(64, 'Er87', 'Seviye yenileme bölgesinden çıkıldı.'),
(65, 'Er88', 'Seviye yenileme sırasında aşırı hızlanma'),
(66, 'Er89', 'Kalkış sırasında kabin tutulamadı.'),
(67, 'Er90', 'Kapı ön açma sırasında aşırı hızlanma'),
(68, 'Er94', 'Kabin lambası sigortası attı.'),
(69, 'Er95', 'Elle kurtarma (SEV) anahtarı'),
(70, 'Er96', 'UPS testi başarısız oldu.'),
(71, 'Er97', 'Yön değiştirme limitine ulaştı.');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici`
--

CREATE TABLE `kullanici` (
  `kullanici_id` int(11) NOT NULL,
  `kullanici_tckn` varchar(11) NOT NULL,
  `kullanici_adi` varchar(20) NOT NULL,
  `kullanici_adSoyad` varchar(250) NOT NULL,
  `kullanici_sifre` varchar(60) NOT NULL,
  `kullanici_adres` varchar(200) NOT NULL,
  `kullanici_tel` varchar(15) NOT NULL,
  `kullanici_rol` int(1) NOT NULL,
  `kullanici_mail` varchar(50) NOT NULL,
  `kullanici_hash` varchar(50) NOT NULL,
  `kullanici_aktivasyon` varchar(50) NOT NULL,
  `kullanici_durum` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `kullanici`
--

INSERT INTO `kullanici` (`kullanici_id`, `kullanici_tckn`, `kullanici_adi`, `kullanici_adSoyad`, `kullanici_sifre`, `kullanici_adres`, `kullanici_tel`, `kullanici_rol`, `kullanici_mail`, `kullanici_hash`, `kullanici_aktivasyon`, `kullanici_durum`) VALUES
(2, '123456789', 'test1', 'Umut Tepe', '$2y$10$8OwCbJ5YYGaiQZutryoz5.bv2zyXDpzL9M1r59bhgJnoP3fZHQZYu', 'test adres', '123456', 1, 'me@umuttepe.com.tr', 'no', 'no', 1),
(9, '123456789', 'test12', 'Test Yetkili', '$2y$10$/yvONPixTlxN//AccLvHTuicJ8/MP5jCrJMXGE4t7hSmiy6Evol4q', 'Test', '1223456', 1, 'test@gmail.com', '', '', 0),
(12, '00000000001', 'admin', 'Atahan Duman', '$2y$10$9VsnGsVIHMKAKRzgCQdky.cqSr42IE6PBGiYL1MBnKXvVuhmR5O9m', 'Sivas', '00000000000', 1, 'atahan.duman@hotmail.com', '', '', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `musteri`
--

CREATE TABLE `musteri` (
  `musteri_id` int(11) NOT NULL,
  `musteri_adSoyad` varchar(50) NOT NULL,
  `musteri_kAdi` varchar(12) NOT NULL,
  `musteri_sifre` int(8) NOT NULL,
  `musteri_adres` varchar(150) NOT NULL,
  `musteri_tel` varchar(11) NOT NULL,
  `musteri_mail` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `musteri`
--

INSERT INTO `musteri` (`musteri_id`, `musteri_adSoyad`, `musteri_kAdi`, `musteri_sifre`, `musteri_adres`, `musteri_tel`, `musteri_mail`) VALUES
(3, 'emre ünsal', 'asd', 0, 'Mehmet Akif ersoy Mah.  68 sk no :1', '5056704896', 'eunsal@cumhuriyet.edu.tr'),
(4, 'asd122', 'asd', 0, 'asd', 'sad', 'asd@asd.com');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `odeme`
--

CREATE TABLE `odeme` (
  `odeme_id` int(11) NOT NULL,
  `odeme_tutar` varchar(7) NOT NULL,
  `odeme_musteri` int(11) NOT NULL,
  `odeme_tarih` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sifrem`
--

CREATE TABLE `sifrem` (
  `sifrem_id` int(11) NOT NULL,
  `sifrem_kullanici_id` int(11) NOT NULL,
  `sifrem_kullanici_email` varchar(250) NOT NULL,
  `sifrem_hash` varchar(150) NOT NULL,
  `sifrem_time` varchar(100) NOT NULL,
  `sifrem_durum` tinyint(4) NOT NULL,
  `sifrem_ip` varchar(30) NOT NULL,
  `sifrem_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `sifrem`
--

INSERT INTO `sifrem` (`sifrem_id`, `sifrem_kullanici_id`, `sifrem_kullanici_email`, `sifrem_hash`, `sifrem_time`, `sifrem_durum`, `sifrem_ip`, `sifrem_date`) VALUES
(1, 2, 'tepeumut1@gmail.com', 'a326NKUpjYZfXIBw', '1531779119', 0, '188.3.64.92', '2018-07-16 21:01:59'),
(2, 2, 'me@umuttepe.com.tr', 'hDvzTntIjRs1a37q', '1531779143', 1, '188.3.64.92', '2018-07-16 21:52:23'),
(3, 1, 'atahan.duman@hotmail.com', '8F6RmHQXZUM9WfsB', '1531814270', 1, '193.140.144.210', '2018-07-17 07:37:50'),
(4, 1, 'atahan.duman@hotmail.com', 'gq0fiOQ3LN5V9sjU', '1531917523', 0, '193.140.144.210', '2018-07-18 12:18:43'),
(5, 1, 'atahan.duman@hotmail.com', 't2b37QYCO8WXsn9B', '1532632640', 0, '188.3.7.142', '2018-07-26 18:57:20');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `stok`
--

CREATE TABLE `stok` (
  `stok_id` int(11) NOT NULL,
  `stok_kodu` varchar(50) NOT NULL,
  `stok_adi` varchar(50) NOT NULL,
  `stok_fiyat` varchar(10) NOT NULL,
  `stok_paraBirimi` varchar(20) NOT NULL,
  `stok_birim` varchar(10) NOT NULL,
  `stok_miktar` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `stok`
--

INSERT INTO `stok` (`stok_id`, `stok_kodu`, `stok_adi`, `stok_fiyat`, `stok_paraBirimi`, `stok_birim`, `stok_miktar`) VALUES
(9, '00001', 'Çelik Halat', '12', 'Türk Lirası', 'Metre', '150'),
(10, '00002', 'Fren Pabuçları', '150', 'Türk Lirası', 'Adet', '200'),
(11, '00003', 'Kumanda Paneli', '500', 'Dolar', 'Takım', '10');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `ariza`
--
ALTER TABLE `ariza`
  ADD PRIMARY KEY (`ariza_id`),
  ADD KEY `ariza_onaran` (`ariza_onaran`),
  ADD KEY `ariza_asansor` (`ariza_asansor`);

--
-- Tablo için indeksler `asansor`
--
ALTER TABLE `asansor`
  ADD PRIMARY KEY (`asansor_id`),
  ADD KEY `asansor_yetkili` (`asansor_yetkili`);

--
-- Tablo için indeksler `bakim`
--
ALTER TABLE `bakim`
  ADD PRIMARY KEY (`bakim_id`),
  ADD KEY `bakim_asansor` (`bakim_asansor`),
  ADD KEY `bakim_yapan` (`bakim_yapan`);

--
-- Tablo için indeksler `degisim`
--
ALTER TABLE `degisim`
  ADD PRIMARY KEY (`degisim_id`),
  ADD KEY `degisim_stok` (`degisim_stok`);

--
-- Tablo için indeksler `hata`
--
ALTER TABLE `hata`
  ADD PRIMARY KEY (`hata_id`);

--
-- Tablo için indeksler `kullanici`
--
ALTER TABLE `kullanici`
  ADD PRIMARY KEY (`kullanici_id`);

--
-- Tablo için indeksler `musteri`
--
ALTER TABLE `musteri`
  ADD PRIMARY KEY (`musteri_id`);

--
-- Tablo için indeksler `odeme`
--
ALTER TABLE `odeme`
  ADD PRIMARY KEY (`odeme_id`),
  ADD KEY `odeme_musteri` (`odeme_musteri`);

--
-- Tablo için indeksler `sifrem`
--
ALTER TABLE `sifrem`
  ADD PRIMARY KEY (`sifrem_id`);

--
-- Tablo için indeksler `stok`
--
ALTER TABLE `stok`
  ADD PRIMARY KEY (`stok_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `ariza`
--
ALTER TABLE `ariza`
  MODIFY `ariza_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Tablo için AUTO_INCREMENT değeri `asansor`
--
ALTER TABLE `asansor`
  MODIFY `asansor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Tablo için AUTO_INCREMENT değeri `bakim`
--
ALTER TABLE `bakim`
  MODIFY `bakim_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `degisim`
--
ALTER TABLE `degisim`
  MODIFY `degisim_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Tablo için AUTO_INCREMENT değeri `hata`
--
ALTER TABLE `hata`
  MODIFY `hata_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
--
-- Tablo için AUTO_INCREMENT değeri `kullanici`
--
ALTER TABLE `kullanici`
  MODIFY `kullanici_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Tablo için AUTO_INCREMENT değeri `musteri`
--
ALTER TABLE `musteri`
  MODIFY `musteri_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Tablo için AUTO_INCREMENT değeri `odeme`
--
ALTER TABLE `odeme`
  MODIFY `odeme_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `sifrem`
--
ALTER TABLE `sifrem`
  MODIFY `sifrem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Tablo için AUTO_INCREMENT değeri `stok`
--
ALTER TABLE `stok`
  MODIFY `stok_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `ariza`
--
ALTER TABLE `ariza`
  ADD CONSTRAINT `ariza_asansor` FOREIGN KEY (`ariza_asansor`) REFERENCES `asansor` (`asansor_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `bakim_yapan` FOREIGN KEY (`bakim_yapan`) REFERENCES `kullanici` (`kullanici_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `degisim`
--
ALTER TABLE `degisim`
  ADD CONSTRAINT `degisim_stok` FOREIGN KEY (`degisim_stok`) REFERENCES `stok` (`stok_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `odeme`
--
ALTER TABLE `odeme`
  ADD CONSTRAINT `odeme_musteri` FOREIGN KEY (`odeme_musteri`) REFERENCES `musteri` (`musteri_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

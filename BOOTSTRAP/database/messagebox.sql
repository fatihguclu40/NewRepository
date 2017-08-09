-- phpMyAdmin SQL Dump
-- version 4.6.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 01, 2017 at 09:32 AM
-- Server version: 5.7.13-log
-- PHP Version: 5.6.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `messagebox`
--

-- --------------------------------------------------------

--
-- Table structure for table `alinandersler`
--

CREATE TABLE `alinandersler` (
  `AlinanD_ID` int(10) NOT NULL,
  `Kullanici_ID` int(10) NOT NULL,
  `Ders_ID` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `alinandersler`
--

INSERT INTO `alinandersler` (`AlinanD_ID`, `Kullanici_ID`, `Ders_ID`) VALUES
(98, 2012555001, 123),
(99, 2012555002, 123),
(100, 2012555003, 123),
(101, 2012555004, 123),
(102, 2012555005, 123),
(103, 2012555006, 123),
(104, 2012555007, 123),
(105, 2012555008, 123),
(106, 2012555032, 123),
(107, 2012555045, 123),
(108, 2012555069, 123),
(109, 2012555047, 123),
(111, 2012555067, 123),
(112, 2012555001, 234),
(113, 2012555002, 234),
(114, 2012555003, 234),
(115, 2012555004, 234),
(116, 2012555005, 234),
(117, 2012555006, 234),
(118, 2012555007, 234),
(119, 2012555008, 234),
(120, 2012555032, 234),
(121, 2012555045, 234),
(122, 2012555069, 234),
(123, 2012555047, 234),
(125, 2012555067, 234),
(126, 2012555001, 369),
(127, 2012555002, 369),
(128, 2012555003, 369),
(129, 2012555004, 369),
(130, 2012555005, 369),
(131, 2012555006, 369),
(132, 2012555010, 369),
(133, 2012555011, 369),
(134, 2012555032, 369),
(135, 2012555012, 369),
(136, 2012555013, 369),
(137, 2012555014, 369),
(138, 2012555015, 369),
(139, 2012555016, 369),
(140, 2012555017, 369),
(141, 2012555018, 456),
(142, 2012555019, 456),
(143, 2012555020, 456),
(144, 2012555021, 456),
(145, 2012555022, 456),
(147, 2012555024, 456),
(148, 2012555025, 456),
(149, 2012555032, 456),
(150, 2012555026, 456),
(151, 2012555027, 456),
(152, 2012555028, 456),
(153, 2012555029, 456),
(155, 2012555031, 456),
(157, 2012555033, 489),
(159, 2012555035, 489),
(160, 2012555036, 489),
(161, 2012555037, 489),
(163, 2012555039, 489),
(164, 2012555040, 489),
(165, 2012555032, 489),
(166, 2012555026, 489),
(167, 2012555027, 489),
(168, 2012555041, 489),
(169, 2012555042, 489),
(170, 2012555043, 489),
(171, 2012555044, 489),
(172, 2012555033, 345),
(174, 2012555035, 345),
(175, 2012555036, 345),
(176, 2012555037, 345),
(178, 2012555039, 345),
(179, 2012555040, 345),
(180, 2012555032, 345),
(181, 2012555026, 345),
(182, 2012555027, 345),
(183, 2012555041, 345),
(184, 2012555042, 345),
(185, 2012555043, 345),
(186, 2012555044, 345);

-- --------------------------------------------------------

--
-- Table structure for table `dersler`
--

CREATE TABLE `dersler` (
  `Ders_ID` int(3) NOT NULL,
  `Ders_AD` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `Kullanici_ID` int(10) NOT NULL,
  `Donem_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `dersler`
--

INSERT INTO `dersler` (`Ders_ID`, `Ders_AD`, `Kullanici_ID`, `Donem_ID`) VALUES
(123, 'Computer Networks', 1596324785, 9),
(234, 'Data Managament', 2036940187, 10),
(345, 'Algorithm and Programming', 2147483647, 9),
(369, 'System Programming', 1596324785, 10),
(456, 'Control Systems ', 2012555032, 10),
(487, 'Automata Theory', 2036940187, 9),
(489, 'Java Programming', 2036940187, 10);

-- --------------------------------------------------------

--
-- Table structure for table `donem`
--

CREATE TABLE `donem` (
  `Donem_ID` int(10) NOT NULL,
  `Donem_YIL` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `Donem_DONEM` enum('0','1') COLLATE utf8_turkish_ci NOT NULL DEFAULT '0',
  `Donem_SINIF` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `donem`
--

INSERT INTO `donem` (`Donem_ID`, `Donem_YIL`, `Donem_DONEM`, `Donem_SINIF`) VALUES
(9, '2016-2017', '1', 3),
(10, '2016-2017', '1', 4);

-- --------------------------------------------------------

--
-- Table structure for table `kmesaj`
--

CREATE TABLE `kmesaj` (
  `KMesaj_ID` int(10) NOT NULL,
  `Kullanici_ID1` int(10) NOT NULL,
  `Kullanici_ID2` int(10) NOT NULL,
  `KMesaj_MESAJ` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `KMesaj_DSYOL` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `KMesaj_TARIH` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `KMesaj_OKUNDU` enum('0','1') COLLATE utf8_turkish_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `kmesaj`
--

INSERT INTO `kmesaj` (`KMesaj_ID`, `Kullanici_ID1`, `Kullanici_ID2`, `KMesaj_MESAJ`, `KMesaj_DSYOL`, `KMesaj_TARIH`, `KMesaj_OKUNDU`) VALUES
(93, 2012555003, 2012555032, 'Selam Fatih dünkü derste varmıydın?', '', '2017-05-28 14:53:26', '1'),
(94, 2012555003, 2012555032, 'Hoca hangi konuları ödev verdi?', '', '2017-05-28 15:15:19', '1'),
(95, 2012555032, 2012555004, 'selam', '', '2017-05-28 15:03:17', '0'),
(96, 2012555001, 2012555032, 'kardeşim salı 1 de sunum var unutma', '', '2017-06-01 14:19:54', '1'),
(97, 2012555032, 2012555002, 'meraba aysel', '', '2017-06-08 21:26:07', '0'),
(98, 2012555032, 2012555001, 'meraba ali', '', '2017-06-08 21:27:15', '1'),
(99, 2012555001, 2012555032, 'Fatih akşam maç var', '', '2017-06-08 21:28:09', '1'),
(100, 2012555032, 2012555032, 'Selam Fatih yarın okula gidecekmisin', '', '2017-06-10 22:05:14', '1'),
(101, 2012555001, 2012555032, 'Fatih meraba yarın okula gidecekmisin', '', '2017-06-13 08:10:59', '1'),
(102, 2012555032, 2012555001, 'meraba', '', '2017-06-29 15:35:21', '1'),
(103, 2012555032, 2012555001, 'selam', '', '2017-06-20 12:50:41', '0'),
(104, 2012555032, 2012555001, 'selam kanka', '', '2017-06-21 15:54:11', '0'),
(105, 2012555032, 2012555001, 'aga naptın', '', '2017-06-21 15:55:18', '0'),
(106, 2012555032, 2012555001, 'hacııı', '', '2017-06-21 15:58:23', '0'),
(107, 2012555032, 2012555001, 'burooo', '', '2017-06-21 15:58:31', '0'),
(108, 2012555032, 2012555001, 'zıbam', '', '2017-06-21 15:58:37', '0'),
(109, 2012555032, 2012555021, 'lan g suquare', '', '2017-06-21 15:59:05', '0'),
(110, 2012555032, 2012555021, 'zzzzz', '', '2017-06-21 15:59:11', '0'),
(111, 2012555032, 2012555036, 'owefwefwef', '', '2017-06-21 16:03:28', '0'),
(112, 2012555032, 2012555002, 'bugun derse gidecekmisin', '', '2017-06-22 13:24:28', '0'),
(113, 2012555032, 2012555002, 'asdasda ', '', '2017-06-22 13:24:48', '0'),
(114, 2012555032, 2012555006, 'hello', '', '2017-06-29 09:34:21', '0'),
(115, 2012555032, 2012555006, 'hertzdffds', '', '2017-06-29 09:34:26', '0'),
(116, 2012555032, 2012555006, 'eıgregrgdf', '', '2017-06-29 09:34:30', '0'),
(117, 2012555032, 2012555006, 'çergerwwefdfdrr', '', '2017-06-29 09:34:37', '0');

-- --------------------------------------------------------

--
-- Table structure for table `kullanici`
--

CREATE TABLE `kullanici` (
  `Kullanici_ID` int(10) NOT NULL,
  `Kullanici_AD` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `Kullanici_SOYAD` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `Kullanici_KADI` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `Kullanici_SIFRE` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `Kullanici_PRFLYOL` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `Kullanici_YETKI` enum('0','1') COLLATE utf8_turkish_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `kullanici`
--

INSERT INTO `kullanici` (`Kullanici_ID`, `Kullanici_AD`, `Kullanici_SOYAD`, `Kullanici_KADI`, `Kullanici_SIFRE`, `Kullanici_PRFLYOL`, `Kullanici_YETKI`) VALUES
(1212121212, 'ferhan', 'şensoy', 'ferhan', '202cb962ac59075b964b07152d234b70', '', '1'),
(1596324785, 'Ramazan ', 'Aslan', 'Ramazan', '2811b396a2370894f24f862fa542f812', '', '1'),
(2012555001, 'Ali', 'Demirci', '2012555001', 'ce13c6321eee72eae971ab8677b003df', 'img/profile/31054218752024829460306401.jpg', '0'),
(2012555002, 'Aysel', 'Türe', '2012555002', '534b0b5d8064504a41a4038e28c04a80', '', '0'),
(2012555003, 'Kemal', 'Arıcı', '2012555003', '22b051ac44c1c851984ffecc6ad3393c', 'img/profile/31545294672850029472df.jpg', '0'),
(2012555004, 'Fatma', 'Leman', '2012555004', '6ea0bf6e6b338b2f7000e67335b7f83a', '', '0'),
(2012555005, 'Furkan', 'Serçe', '2012555005', 'b3ba64bf1d6a0477dce1165755c1dece', 'img/profile/23033245912242028645306401.jpg', '0'),
(2012555006, 'Serap', 'Ersoy', '2012555006', '9dbf56a2cf1f1d61877b337dd8d8d561', '', '0'),
(2012555007, 'Ulaş', 'Karaca', '2012555007', '3b258bef5713362625c39acfd53c3ec9', '', '0'),
(2012555008, 'Gül', 'Demir', '2012555008', '9b55fa7ebfde6dc09749cf4b82327d45', '', '0'),
(2012555010, 'Emre', 'Gül', '2012555010', '7c9e7800cf070610eefdcfcd741562e7', '', '0'),
(2012555011, 'İlker', 'Okuducu', '2012555011', '4f4d88211c3f516872474cb6b15ff9c7', '', '0'),
(2012555012, 'İsmail', 'Doğan', '2012555012', '932f40acf2248b144dfd2056dc5f9135', '', '0'),
(2012555013, 'Sertaç', 'Çatal', '2012555013', '70ba68bef274ac74412b6b724db58eff', '', '0'),
(2012555014, 'Süleyman', 'Fırat', '2012555014', '51fda9327e1ef30efa0025509e5189f4', '', '0'),
(2012555015, 'Okan', 'Kırmızı', '2012555015', '543438383da37c6716ad78b6a131b606', '', '0'),
(2012555016, 'Hüseyin', 'Aygün', '2012555016', '2b776f08281489e1615c092e5eadc9c6', '', '0'),
(2012555017, 'Onur', 'Ünlü', '2012555017', '7d3e4cc30ef7a5837e3335ca3745e0d2', '', '0'),
(2012555018, 'Okan', 'Tezkorkmaz', '2012555018', '1c1089e7c2e996978e462be11c39972d', '', '0'),
(2012555019, 'Nida', 'Uzel', '2012555019', '13c1d768cac4d50af2fb25f43c7c3866', '', '0'),
(2012555020, 'Songül', 'Kaya', '2012555020', '8e04e19716bca38ffa85dec7429242ac', '', '0'),
(2012555021, 'Anıl', 'Dağdelen', '2012555021', '67c96cde5d06842fbed17426c4709206', '', '0'),
(2012555022, 'Kahraman', 'Alp', '2012555022', '263b6b875bf66e37d752c6adb8079e0b', '', '0'),
(2012555024, 'Gamze', 'Çakıl', '2012555024', '6d2cdddc7bcf4de54f4a8ed7280ad4bc', '', '0'),
(2012555025, 'Güven', 'Uysal', '2012555025', '36d916f631b11c39be30e2ddb790b428', '', '0'),
(2012555026, 'Metin', 'Tekin', '2012555026', 'ed120db2ce17376c3bb2d29d7bdc7881', '', '0'),
(2012555027, 'Mert', 'Turna', '2012555027', 'b19f65c56f6d7619fc65e33bd4eac455', '', '0'),
(2012555028, 'Oya', 'Ülgen', '2012555028', 'c57bf4a8960a425048d2f1ff9d3fd2fd', '', '0'),
(2012555029, 'Ayşe', 'Örnek', '2012555029', '7d98fdc2b950f038375917487745bf4e', '', '0'),
(2012555031, 'Emre', 'Akçakaya', '2012555031', 'f0dc27eda9bad5fe848c8ece9c348e24', '', '0'),
(2012555032, 'Fatih', 'Güçlü', 'admin', 'fe01ce2a7fbac8fafaed7c982a04e229', 'img/profile/24679303532534921275keyboard_letter-wallpaper-1920x1080.jpg', '1'),
(2012555033, 'Mustafa', 'Kızılırmak', '2012555033', 'b324ee8aaa47d60bb7648ee9218f55c8', '', '0'),
(2012555035, 'Rabia', 'Koca', '2012555035', '0ab1798a65408e707c8a65adf2e53f1b', '', '0'),
(2012555036, 'Ebubekir', 'Aymelek', '2012555036', 'bb212656d57c3e528f72afdb585d8ca1', '', '0'),
(2012555037, 'Merve', 'Kara', '2012555037', 'ebb4dd28c63f093b256e066ac1f68a75', '', '0'),
(2012555039, 'Tuğçe', 'Diker', '2012555039', '5b94c09f8eba2ef96a8cb40c36022709', '', '0'),
(2012555040, 'Rüştü', 'Şahinci', '2012555040', '71d7e41e21af4c3feaf02a1d578cd339', '', '0'),
(2012555041, 'Yeter', 'Kaplan', '2012555041', 'e30fa272127d51e6ef0bdf204474e4a0', '', '0'),
(2012555042, 'Çiğdem', 'Duran', '2012555042', 'e7edb92a7961abd919fdadf628cdb56f', '', '0'),
(2012555043, 'Derya', 'Ateş', '201555043', 'f01a9a837c0db3e511b1b7be1a83e7f3', 'img/profile/31739308963027928161598191.jpg', '0'),
(2012555044, 'Köksal', 'Darıcı', '2012555044', 'f6de9d80b7bcca7070caf8046b13ca20', '', '0'),
(2012555045, 'Kazım', 'Demir', '2012555045', 'c8576039ba9c695d73bd9e9847284f25', '', '0'),
(2012555047, 'Aslı', 'Kaya', '2012555047', '789693f1ce2ffc0b9b60bb3474d0fbc0', '', '0'),
(2012555067, 'Halil', 'Dokuyan', '2012555067', '19d08d202368e4bedb8eb1e43ab54ecd', '', '0'),
(2012555069, 'Derya', 'Haki', '2012555069', '2c1b2b53e13c7cebee3d6d3804b6f423', '', '0'),
(2012555487, 'Rasim', 'Koz', '2012555487', 'dc327e958284a4aae335e4c8ee0777f6', '', '0'),
(2036940187, 'Melis', 'Şener', 'Melis', 'ac975e35b4339098ec0dc1b5be866482', '', '1'),
(2147483647, 'Ayşe', 'Tunç', 'Ayşe', 'd70a8615804c4690771768c6e97619e1', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `mesaj`
--

CREATE TABLE `mesaj` (
  `Mesaj_ID` int(10) NOT NULL,
  `Mesaj_ICERIK` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `Mesaj_DSYOL` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `Mesaj_TARIH` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Kullanici_ID` int(10) NOT NULL,
  `Ders_ID` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `mesaj`
--

INSERT INTO `mesaj` (`Mesaj_ID`, `Mesaj_ICERIK`, `Mesaj_DSYOL`, `Mesaj_TARIH`, `Kullanici_ID`, `Ders_ID`) VALUES
(82, 'Bugun derste quiz yapılmayacak arkadaslar bilginize', '', '2017-05-28 14:50:50', 2012555003, 123),
(83, 'Arkadaşlar projelerin teslim tarihi 1 hafta ertelendi.', '', '2017-06-01 14:30:15', 2012555032, 234),
(84, 'Arkadaşlar bugün derste hangi konular işlendi konu başlığı şeklinde yazabilirmisiniz.', '', '2017-06-01 14:32:46', 2012555044, 489),
(85, 'Merhaba arkadaşlar saat 13:15 de başlayacak  olan ders 15 dk gecikecektir', '', '2017-06-11 01:12:22', 2012555032, 456),
(87, 'Bölümün sayfasında bulanbilirsin', '', '2017-06-11 01:14:51', 2012555003, 234),
(94, 'gene mi amclar hani nerdeler', '', '2017-06-21 15:53:38', 2012555032, 487),
(96, 'ssssss', '', '2017-06-21 15:59:22', 2012555032, 123),
(98, 'ggggggg', '', '2017-06-21 16:00:37', 2012555032, 123),
(101, 'sssssss', '', '2017-06-21 16:02:42', 2012555032, 345),
(102, 'eeeeeee', '', '2017-06-21 16:02:46', 2012555032, 345),
(105, 'ykuıkuıkuıkuıku', '', '2017-06-21 16:03:08', 2012555032, 345),
(106, 'fdfsdfgeg', '', '2017-06-22 13:19:57', 2012555003, 123),
(108, 'asdfewefw', '', '2017-06-22 13:20:33', 2012555005, 123),
(109, 'yuykuıol', '', '2017-06-22 13:20:36', 2012555005, 123),
(110, 'nmjknj', '', '2017-06-29 15:23:31', 2012555032, 123);

-- --------------------------------------------------------

--
-- Table structure for table `uyari`
--

CREATE TABLE `uyari` (
  `Uyari_ID` int(4) NOT NULL,
  `Uyari_BASLIK` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `Uyari_ICERIK` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `Uyari_LINK` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `Uyari_ETARIH` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `uyari`
--

INSERT INTO `uyari` (`Uyari_ID`, `Uyari_BASLIK`, `Uyari_ICERIK`, `Uyari_LINK`, `Uyari_ETARIH`) VALUES
(9, 'Bitirme Projesi', 'Son teslim tarihi 16 06 2017', '', '2017-05-28 12:48:26'),
(10, 'Staj Belgesi', 'Staj belgerinin imzalanması için son tarih olarak 16 05 2017  belirlenmiştir.', '', '2017-06-01 14:26:11'),
(11, 'Sınav Yeri Sorgusu', 'Arkadaşlar sınav yeri sorgulama sistemimiz açıldı aşağıdaki linkten ulaşabilirsiniz.Sınav yerinde seminer salonu yazan arkadaşların Abbas Elmas ile iletişime geçmeleri gerekmektedir.', 'https://www.google.com.tr', '2017-06-01 14:28:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alinandersler`
--
ALTER TABLE `alinandersler`
  ADD PRIMARY KEY (`AlinanD_ID`),
  ADD KEY `Kullanici_ID` (`Kullanici_ID`),
  ADD KEY `Ders_ID` (`Ders_ID`);

--
-- Indexes for table `dersler`
--
ALTER TABLE `dersler`
  ADD PRIMARY KEY (`Ders_ID`),
  ADD KEY `Donem_ID` (`Donem_ID`),
  ADD KEY `Kullanici_ID` (`Kullanici_ID`);

--
-- Indexes for table `donem`
--
ALTER TABLE `donem`
  ADD PRIMARY KEY (`Donem_ID`);

--
-- Indexes for table `kmesaj`
--
ALTER TABLE `kmesaj`
  ADD PRIMARY KEY (`KMesaj_ID`),
  ADD KEY `Kullanici_ID` (`Kullanici_ID1`),
  ADD KEY `Kullanici_ID2` (`Kullanici_ID2`);

--
-- Indexes for table `kullanici`
--
ALTER TABLE `kullanici`
  ADD PRIMARY KEY (`Kullanici_ID`);

--
-- Indexes for table `mesaj`
--
ALTER TABLE `mesaj`
  ADD PRIMARY KEY (`Mesaj_ID`),
  ADD KEY `DersID` (`Ders_ID`),
  ADD KEY `KullaniciID` (`Kullanici_ID`);

--
-- Indexes for table `uyari`
--
ALTER TABLE `uyari`
  ADD PRIMARY KEY (`Uyari_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alinandersler`
--
ALTER TABLE `alinandersler`
  MODIFY `AlinanD_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=187;
--
-- AUTO_INCREMENT for table `donem`
--
ALTER TABLE `donem`
  MODIFY `Donem_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `kmesaj`
--
ALTER TABLE `kmesaj`
  MODIFY `KMesaj_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;
--
-- AUTO_INCREMENT for table `mesaj`
--
ALTER TABLE `mesaj`
  MODIFY `Mesaj_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;
--
-- AUTO_INCREMENT for table `uyari`
--
ALTER TABLE `uyari`
  MODIFY `Uyari_ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `alinandersler`
--
ALTER TABLE `alinandersler`
  ADD CONSTRAINT `alinandersler_ibfk_1` FOREIGN KEY (`Kullanici_ID`) REFERENCES `kullanici` (`Kullanici_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `alinandersler_ibfk_2` FOREIGN KEY (`Ders_ID`) REFERENCES `dersler` (`Ders_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dersler`
--
ALTER TABLE `dersler`
  ADD CONSTRAINT `dersler_ibfk_1` FOREIGN KEY (`Donem_ID`) REFERENCES `donem` (`Donem_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dersler_ibfk_2` FOREIGN KEY (`Kullanici_ID`) REFERENCES `kullanici` (`Kullanici_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kmesaj`
--
ALTER TABLE `kmesaj`
  ADD CONSTRAINT `kmesaj_ibfk_1` FOREIGN KEY (`Kullanici_ID1`) REFERENCES `kullanici` (`Kullanici_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kmesaj_ibfk_2` FOREIGN KEY (`Kullanici_ID2`) REFERENCES `kullanici` (`Kullanici_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mesaj`
--
ALTER TABLE `mesaj`
  ADD CONSTRAINT `Did` FOREIGN KEY (`Ders_ID`) REFERENCES `dersler` (`Ders_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Kid` FOREIGN KEY (`Kullanici_ID`) REFERENCES `kullanici` (`Kullanici_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

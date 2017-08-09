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
-- Database: `ilksitem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_kadi` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `admin_sifre` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `admin_yetki` enum('0','1') COLLATE utf8_turkish_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_kadi`, `admin_sifre`, `admin_yetki`) VALUES
(1, 'admin', 'demo', '0');

-- --------------------------------------------------------

--
-- Table structure for table `ayarlar`
--

CREATE TABLE `ayarlar` (
  `ayar_id` int(11) NOT NULL,
  `ayar_logo` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_telefon` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_title` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_description` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_keywords` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_facebook` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_twitter` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_footer` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_adres` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_mail` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_fax` varchar(50) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `ayarlar`
--

INSERT INTO `ayarlar` (`ayar_id`, `ayar_logo`, `ayar_telefon`, `ayar_title`, `ayar_description`, `ayar_keywords`, `ayar_facebook`, `ayar_twitter`, `ayar_footer`, `ayar_adres`, `ayar_mail`, `ayar_fax`) VALUES
(0, 'images/logo.png', '05375757752', 'IlkSitem', 'PHP ile yapmaya çalıştğım ilk sitem.', 'PHP,ilksitem,Deneme', 'http://www.facebook.com', 'http://www.twitter.com', '2017 nin şuan Ocak ayının 2.günü saat 20:10 :D', 'Adana Erkek Öğrenci Yurdu  Sarıçam/ADANA', 'http://www.outlook.com', '05375757752');

-- --------------------------------------------------------

--
-- Table structure for table `haberler`
--

CREATE TABLE `haberler` (
  `haber_id` int(11) NOT NULL,
  `haber_zaman` datetime NOT NULL,
  `haber_ad` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `haber_detay` varchar(2000) COLLATE utf8_turkish_ci NOT NULL,
  `haber_resimyol` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `haber_hit` varchar(50) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menuler`
--

CREATE TABLE `menuler` (
  `menu_id` int(11) NOT NULL,
  `menu_ad` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `menu_link` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `menu_yedek` varchar(50) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `menuler`
--

INSERT INTO `menuler` (`menu_id`, `menu_ad`, `menu_link`, `menu_yedek`) VALUES
(1, 'Hakkımızda', 'http://www.google.com', ''),
(2, 'Youtube', 'http://www.youtube.com', ''),
(3, 'Benim Sitem', 'http://www.mynet.com', ''),
(4, 'İletisim', 'http://www.filmmakinesi.org', ''),
(5, 'deneme', 'http://', '');

-- --------------------------------------------------------

--
-- Table structure for table `sayfalar`
--

CREATE TABLE `sayfalar` (
  `sayfa_id` int(11) NOT NULL,
  `sayfa_tarih` datetime NOT NULL,
  `sayfa_ad` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `sayfa_icerik` text COLLATE utf8_turkish_ci NOT NULL,
  `sayfa_sira` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `sayfa_anasayfa` varchar(50) COLLATE utf8_turkish_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `sayfalar`
--

INSERT INTO `sayfalar` (`sayfa_id`, `sayfa_tarih`, `sayfa_ad`, `sayfa_icerik`, `sayfa_sira`, `sayfa_anasayfa`) VALUES
(1, '2017-01-25 15:06:00', 'sayfa1', '<p>aşnksnddddddddddddddddddddddddddddddddddddddddddddd</p>\r\n', '0', '1'),
(2, '2017-01-25 20:27:00', 'sayfa2', 'Security exploits, commonly used by malicious hackers, are being combined with computer viruses\r\nresulting in a very complex attack, which in some cases goes beyond the general scope of\r\nantivirus software.\r\nIn general, a large gap has existed between computer security companies, such as intrusion\r\ndetection and firewall vendors and antivirus companies. For example, many past popular computer\r\nsecurity conferences did not have any papers or presentations dealing with computer viruses. Thus,\r\napparently some computer security people do not consider computer viruses seriously as part of\r\nsecurity, or they ignore the relationship between computer security and computer viruses. When the\r\nCodeRed worm appeared, there was obvious confusion about which genre of computer security\r\nvendors could prevent, detect, and stop the worm. Some antivirus researchers argued that there was\r\nnothing that they could do about CodeRed, while others tried to solve the problem with various sets of\r\nsecurity techniques, software, and detection tools to support their customers’ needs.\r\nInterestingly, such intermediate solutions were often criticized by antivirus researchers. Instead of\r\nrealizing the affected customers’ need for such tools, some antivirus researchers suggested that there\r\nwas nothing to do but to install the security patch.\r\nObviously, this step is very important in securing the systems. However, the installation of a patch on', '', '1'),
(3, '2017-01-25 20:29:00', 'sayfa3', 'Security exploits, commonly used by malicious hackers, are being combined with computer viruses\r\nresulting in a very complex attack, which in some cases goes beyond the general scope of\r\nantivirus software.\r\nIn general, a large gap has existed between computer security companies, such as intrusion\r\ndetection and firewall vendors and antivirus companies. For example, many past popular computer\r\nsecurity conferences did not have any papers or presentations dealing with computer viruses. Thus,\r\napparently some computer security people do not consider computer viruses seriously as part of\r\nsecurity, or they ignore the relationship between computer security and computer viruses. When the\r\nCodeRed worm appeared, there was obvious confusion about which genre of computer security\r\nvendors could prevent, detect, and stop the worm. Some antivirus researchers argued that there was\r\nnothing that they could do about CodeRed, while others tried to solve the problem with various sets of\r\nsecurity techniques, software, and detection tools to support their customers’ needs.\r\nInterestingly, such intermediate solutions were often criticized by antivirus researchers. Instead of\r\nrealizing the affected customers’ need for such tools, some antivirus researchers suggested that there\r\nwas nothing to do but to install the security patch.\r\nObviously, this step is very important in securing the systems. However, the installation of a patch on', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `slider_id` int(11) NOT NULL,
  `slider_ad` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `slider_resimyol` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `slider_url` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `slider_sira` varchar(50) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`slider_id`, `slider_ad`, `slider_resimyol`, `slider_url`, `slider_sira`) VALUES
(4, 'slider3', 'uploads/220942964231603225011.jpg', 'http://', '0'),
(5, 'slider4', 'uploads/261772238621517249372.jpg', 'http://', '1'),
(7, 'slider7', 'uploads/281362646429386236162.jpg', 'http://', '2'),
(8, 'adas', 'uploads/30161219782692526726indir.jpg', 'http://', ''),
(9, 'hhjh', 'uploads/25705278252696720254', 'http://', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `ayarlar`
--
ALTER TABLE `ayarlar`
  ADD PRIMARY KEY (`ayar_id`);

--
-- Indexes for table `haberler`
--
ALTER TABLE `haberler`
  ADD PRIMARY KEY (`haber_id`);

--
-- Indexes for table `menuler`
--
ALTER TABLE `menuler`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `sayfalar`
--
ALTER TABLE `sayfalar`
  ADD PRIMARY KEY (`sayfa_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `haberler`
--
ALTER TABLE `haberler`
  MODIFY `haber_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `menuler`
--
ALTER TABLE `menuler`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `sayfalar`
--
ALTER TABLE `sayfalar`
  MODIFY `sayfa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

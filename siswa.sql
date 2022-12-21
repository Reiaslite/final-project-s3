-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2022 at 11:11 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tugasakhir`
--

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` int(100) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nis` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `role` enum('user','admin') NOT NULL DEFAULT 'user',
  `is_voted` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `nama`, `nis`, `email`, `password`, `role`, `is_voted`) VALUES
(1, 'Welsh Cater', '189136', 'wcater0@amazon.co.jp', 'wVzc5A', 'user', 0),
(2, 'Gayler Boyen', '213639', 'gboyen1@rambler.ru', 'GCexpCt', 'user', 0),
(3, 'Hobey Lampert', '911750', 'hlampert2@spotify.com', 'lAnr4PU', 'user', 0),
(4, 'Andras Abba', '233057', 'aabba3@zimbio.com', 'CA4b2x', 'user', 0),
(5, 'Dulciana Coultas', '565207', 'dcoultas4@reuters.com', 'coCLPKa', 'user', 0),
(6, 'Corette Kemmons', '152117', 'ckemmons5@nifty.com', 'z6kgHByCYjC8', 'user', 0),
(7, 'Kimberly Cometto', '877632', 'kcometto6@nytimes.com', 'BX1JuKx', 'user', 0),
(8, 'Marice Shedden', '153270', 'mshedden7@technorati.com', 'mfmWfOFek2D', 'user', 0),
(9, 'Sheff Waistall', '592181', 'swaistall8@deliciousdays.com', 'rA0j5Yudt', 'user', 0),
(10, 'Udale Playle', '522868', 'uplayle9@weather.com', 'GSylGKz0', 'user', 0),
(11, 'Peggi Inkle', '264556', 'pinklea@tuttocitta.it', 'wa6m9h49P8', 'user', 0),
(12, 'Jarad Giriardelli', '501369', 'jgiriardellib@friendfeed.com', '3t8Ki3f', 'user', 0),
(13, 'Woodrow Colliford', '270329', 'wcollifordc@narod.ru', 'pwlPwo6PV5', 'user', 0),
(14, 'Kandace Dunniom', '451063', 'kdunniomd@sina.com.cn', 'SuY6i5mBY', 'user', 0),
(15, 'Gilburt Breede', '984283', 'gbreedee@arstechnica.com', '40UUru', 'user', 0),
(16, 'Yale McCook', '776267', 'ymccookf@xrea.com', 'Lx4wZc93', 'user', 0),
(17, 'Tyler Lett', '496994', 'tlettg@reverbnation.com', 'cgcFgdxv', 'user', 0),
(18, 'Deane Siaskowski', '492854', 'dsiaskowskih@wsj.com', 'sT1suoX', 'user', 0),
(19, 'Codee Partlett', '866746', 'cpartletti@skyrock.com', 'pqzsoJurQK', 'user', 0),
(20, 'Osmund Spittle', '292322', 'ospittlej@apple.com', 'jg1YyImE3YF', 'user', 0),
(21, 'Sigfried Bagwell', '279216', 'sbagwellk@canalblog.com', 'GXU9eq9', 'user', 0),
(22, 'Benjy Esmead', '702835', 'besmeadl@examiner.com', 'FuwUxEKtuU', 'user', 0),
(23, 'Antone Pudsall', '180482', 'apudsallm@narod.ru', 'vBtjqK', 'user', 0),
(24, 'Garry Yurikov', '778698', 'gyurikovn@bbb.org', 'naXTCf', 'user', 0),
(25, 'Ashil Einchcombe', '703395', 'aeinchcombeo@blinklist.com', 'SBoudSHbkv', 'user', 0),
(26, 'Reba Dumbelton', '311800', 'rdumbeltonp@blog.com', 'GW3I9nE8yy6', 'user', 0),
(27, 'Cathryn Melesk', '218787', 'cmeleskq@bbb.org', 'lKOYOa', 'user', 0),
(28, 'ajag', '4321', 'ajag@ajag', '123', 'admin', 0),
(29, 'Gaston Ibarra', '687733', 'gibarras@shop-pro.jp', 'iDxaDvtoI', 'user', 0),
(30, 'Kalle Fussell', '458486', 'kfussellt@vimeo.com', 'B5NBnCCkfcP', 'user', 0),
(31, 'Michaelina Deble', '933984', 'mdebleu@arizona.edu', 'z2NQxdCGA9d', 'user', 0),
(32, 'Sada Wotherspoon', '401903', 'swotherspoonv@unc.edu', 'YqXbyLd', 'user', 0),
(33, 'Rowe Ellick', '293255', 'rellickw@domainmarket.com', 'C1hoiECY2Xm', 'user', 0),
(34, 'Sandy Hudleston', '398830', 'shudlestonx@google.ru', 'nfwfBdFpClTN', 'user', 0),
(35, 'Agathe Pinock', '517681', 'apinocky@artisteer.com', 'z4wkAt4dB', 'user', 0),
(36, 'Ellis Nisby', '493731', 'enisbyz@quantcast.com', 'QwXpAlqWDf', 'user', 0),
(37, 'Patin Frean', '787052', 'pfrean10@craigslist.org', 'v8VXLI', 'user', 0),
(38, 'Rollins Cauley', '340826', 'rcauley11@narod.ru', 'WFKv5qpZzR', 'user', 0),
(39, 'Keven Le Galle', '165001', 'kle12@yahoo.com', 'fQgEad1EcGrA', 'user', 0),
(40, 'Marcia Pallin', '536007', 'mpallin13@amazon.co.uk', 'd2IjCw', 'user', 0),
(41, 'Perl Warry', '393011', 'pwarry14@theguardian.com', 'WshU4O', 'user', 0),
(42, 'Bryna Molohan', '254457', 'bmolohan15@google.pl', 'nL5S2f0Npd', 'user', 0),
(43, 'Aylmer Rookledge', '712261', 'arookledge16@behance.net', '2appA94xAh5z', 'user', 0),
(44, 'Karleen Andreoletti', '548272', 'kandreoletti17@washingtonpost.', 'AqubBAt4EhLt', 'user', 0),
(45, 'Marj Zieme', '814968', 'mzieme18@marketwatch.com', 'FqSPutLY', 'user', 0),
(46, 'Vite Pittem', '172139', 'vpittem19@arizona.edu', 'atpUMJrY2zNg', 'user', 0),
(47, 'Ermina Wanek', '588056', 'ewanek1a@lulu.com', '7lHZJW6toot', 'user', 0),
(48, 'Gabi Martyns', '527446', 'gmartyns1b@hostgator.com', 'BjTcLbXvC', 'user', 0),
(49, 'Dorine Groger', '201778', 'dgroger1c@microsoft.com', 'hcbQnB', 'user', 0),
(50, 'Alessandro Vasiltsov', '738744', 'avasiltsov1d@oakley.com', 'FN2ia6ZGwxtM', 'user', 0),
(51, 'Dorette Ludovici', '978361', 'dludovici1e@icq.com', '3og451aa5', 'user', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Jul 08, 2015 at 07:33 PM
-- Server version: 5.5.38
-- PHP Version: 5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kolekcija`
--

-- --------------------------------------------------------

--
-- Table structure for table `filmovi`
--

CREATE TABLE `filmovi` (
`id` int(11) NOT NULL,
  `naslov` varchar(150) NOT NULL,
  `id_zanr` int(11) NOT NULL,
  `godina` year(4) NOT NULL,
  `trajanje` int(11) NOT NULL,
  `path` varchar(500) NOT NULL,
  `name` varchar(255) NOT NULL,
  `name_server` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `filmovi`
--

INSERT INTO `filmovi` (`id`, `naslov`, `id_zanr`, `godina`, `trajanje`, `path`, `name`, `name_server`) VALUES
(12, 'Hackers', 1, 1995, 125, 'doc/', 'hackers_1995.jpg', 'doc_1433246654.jpg'),
(13, 'Firewall', 3, 2006, 105, 'doc/', 'firewall_2006.jpg', 'doc_1433252989.jpg'),
(14, 'Antitrust', 4, 2001, 109, 'doc/', 'antitrust_2001.jpg', 'doc_1433253059.jpg'),
(15, 'Swordfish', 1, 2001, 99, 'doc/', 'operation_swordfish_2001.jpg', 'doc_1433253136.jpg'),
(19, 'Takedown', 1, 2000, 96, 'doc/', 'operation_takedown_2000.jpg', 'doc_1433262852.jpg'),
(20, 'Pirates of the silicone Valley', 4, 1999, 95, 'doc/', 'pirates_of_silicone_valley_1999.jpg', 'doc_1433262898.jpg'),
(21, 'The social network', 4, 2010, 120, 'doc/', 'the_social_network_2010.jpg', 'doc_1433262940.jpg'),
(22, 'Tron', 1, 1982, 96, 'doc/', 'tron_1982.jpg', 'doc_1433262986.jpg'),
(23, 'Tron legacy', 1, 2010, 125, 'doc/', 'tron_legacy_2010.jpg', 'doc_1433263017.jpg'),
(24, 'War games', 3, 1983, 114, 'doc/', 'war_games_1983.jpg', 'doc_1433263050.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `zanr`
--

CREATE TABLE `zanr` (
`id` int(11) NOT NULL,
  `naziv` varchar(150) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zanr`
--

INSERT INTO `zanr` (`id`, `naziv`) VALUES
(1, 'Akcija'),
(2, 'Komedija'),
(3, 'Triler'),
(4, 'Drama'),
(5, 'Horor'),
(6, 'Animirani'),
(7, 'Erotski'),
(8, 'Domaći');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `filmovi`
--
ALTER TABLE `filmovi`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zanr`
--
ALTER TABLE `zanr`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `filmovi`
--
ALTER TABLE `filmovi`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `zanr`
--
ALTER TABLE `zanr`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

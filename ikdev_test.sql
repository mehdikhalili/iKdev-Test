-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 23, 2020 at 05:50 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ikdev_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `objets`
--

DROP TABLE IF EXISTS `objets`;
CREATE TABLE IF NOT EXISTS `objets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) DEFAULT NULL,
  `volume_m3` float DEFAULT NULL,
  `categorie` varchar(50) DEFAULT NULL,
  `img` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `objets`
--

INSERT INTO `objets` (`id`, `nom`, `volume_m3`, `categorie`, `img`) VALUES
(1, 'Chaise de petit déjeuner / tabourets', 0.4, 'Cuisine', '1.jpg'),
(2, 'Table de petit déjeuner', 0.8, 'Cuisine', '2.jpg'),
(3, 'Siège de banc', 0.6, 'Cuisine', '3.jpg'),
(4, 'Poubelle à pédale', 0.2, 'Cuisine', '4.jpg'),
(5, 'Chaise haute', 0.4, 'Cuisine', '5.jpg'),
(6, 'Petit appareil à main', 0.2, 'Cuisine', '6.jpg'),
(7, 'Bouilloire / Cafetière', 0.3, 'Cuisine', '7.jpg'),
(8, 'Four micro-onde', 0.6, 'Cuisine', '8.jpg'),
(9, 'Fer / planche à repasser', 0.3, 'Cuisine', '9.jpg'),
(10, 'Aspirateur', 0.4, 'Cuisine', '10.jpg'),
(11, 'Machine à laver', 0.25, 'Cuisine', '11.jpg'),
(12, 'Sèche-linge', 0.25, 'Cuisine', '12.jpg'),
(13, 'Lave-vaisselle', 0.25, 'Cuisine', '13.jpg'),
(14, 'Congélateur', 0.25, 'Cuisine', '14.jpg'),
(15, 'Réfrigérateur petit ou moyen', 0.25, 'Cuisine', '15.jpg'),
(16, 'Réfrigérateur gros', 0.6, 'Cuisine', '16.jpg'),
(17, 'Cuisinier', 0.25, 'Cuisine', '17.jpg'),
(18, 'Grande carton approx taille (cm) 55x35x30', 0.4, 'Cuisine', '18.jpg'),
(19, 'Carton moyen environ taille (cm) 35x25x30', 0.3, 'Cuisine', '19.jpg'),
(20, 'Cadre de photo', 0.3, 'Décoration', '20.jpg'),
(21, 'Horloge', 0.15, 'Décoration', '21.jpg'),
(22, 'Miroir rond', 0.25, 'Décoration', '22.jpg'),
(23, 'Plante artificielle', 0.2, 'Décoration', '23.jpg'),
(24, 'Vase vert', 0.2, 'Décoration', '24.jpg'),
(25, 'Canapé 4 places', 2, 'Meubles', '25.jpg'),
(26, 'Cadre lit avec rangement, blanc', 1.5, 'Meubles', '26.jpg'),
(27, 'Banc TV, blanc', 1.5, 'Meubles', '27.jpg'),
(28, 'Armoire penderie blanc', 3, 'Meubles', '28.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `volumes`
--

DROP TABLE IF EXISTS `volumes`;
CREATE TABLE IF NOT EXISTS `volumes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `volume_m3` float DEFAULT '0',
  `date_operation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `volumes`
--

INSERT INTO `volumes` (`id`, `volume_m3`, `date_operation`) VALUES
(1, 1.9, '2020-10-23 01:25:11'),
(2, 2.4, '2020-10-23 01:32:47'),
(3, 2.05, '2020-10-23 03:49:45'),
(4, 7, '2020-10-23 03:52:12');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 14, 2022 at 03:53 PM
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
-- Database: `errigate`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone_number` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `phone_number`) VALUES
(1, 'Joana', 'joanateye2000@gmail.com', '5e8667a439c68f5145dd2fcbecf02209', '0509642401');

-- --------------------------------------------------------

--
-- Table structure for table `beds`
--

DROP TABLE IF EXISTS `beds`;
CREATE TABLE IF NOT EXISTS `beds` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `bed_name` varchar(100) NOT NULL,
  `humidity` varchar(100) DEFAULT NULL,
  `temperature` varchar(100) DEFAULT NULL,
  `pH` varchar(100) DEFAULT NULL,
  `nitrogen` varchar(100) DEFAULT NULL,
  `phosphorous` varchar(100) DEFAULT NULL,
  `potassium` varchar(100) DEFAULT NULL,
  `water_used` varchar(100) DEFAULT NULL,
  `is_valve_open` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `farm_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `credit` varchar(50) NOT NULL,
  `farm` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `username`, `email`, `password`, `phone_number`, `credit`, `farm`) VALUES
(7, 'Esther', 'esthermensah@gmail.com', '25d55ad283aa400af464c76d713c07ad', '05002734422', '0.00', 'Dzi Farms'),
(6, 'Joana', 'joanateye18@gmail.com', '12345678', '1234567890', '0.00', 'Jo farms'),
(8, 'Naa Adoley', 'naa@gmail.com', '25d55ad283aa400af464c76d713c07ad', '0245678900', '+7.00', 'NaaAgric'),
(9, 'Kojo', 'koj@gmail.com', '25d55ad283aa400af464c76d713c07ad', '0550112730', '-9.00', 'pine farms '),
(10, 'Kwesi', 'kwesi@gmail.com', '25d55ad283aa400af464c76d713c07ad', '0241234567', '-8.50', 'wesiAgric farms'),
(11, 'Kwame', 'kwams@gmail.com', '25d55ad283aa400af464c76d713c07ad', '0251234567', '0.00', 'Kwams farms'),
(12, 'Kofi', 'kofi@gmail.com', '25d55ad283aa400af464c76d713c07ad', '0551234567', '100.00', 'KofAgric'),
(13, 'Yaw', 'yaw@gmail.com', '25d55ad283aa400af464c76d713c07ad', '0541234567', '0.00', 'Strawberry farms'),
(14, 'Kweku', 'kweks@gmail.com', '25d55ad283aa400af464c76d713c07ad', '0231234567', '-2.50', 'Cassava farm'),
(15, 'Kwabena', 'kwabs@gmail.com', '25d55ad283aa400af464c76d713c07ad', '0261234567', '-4.50', 'Palm farm'),
(16, 'Adjoa', 'joa@gmail.com', '25d55ad283aa400af464c76d713c07ad', '0561234567', '-2.70', 'Cashew Agric limited'),
(17, 'Abena', 'bena@gmail.com', '25d55ad283aa400af464c76d713c07ad', '0247654321', '0.00', 'Cashew Agrics'),
(18, 'Akua', 'kua@gmail.com', '25d55ad283aa400af464c76d713c07ad', '0231234567', '0.00', 'AllProducts farm'),
(19, 'Yaa', 'yaa@gmail.com', '25d55ad283aa400af464c76d713c07ad', '0241234567', '9.00', 'Daakye farms'),
(20, 'Afua', 'afua@gmail.com', '25d55ad283aa400af464c76d713c07ad', '0231245890', '0.00', 'Cocoa farms');

-- --------------------------------------------------------

--
-- Table structure for table `farm_weather`
--

DROP TABLE IF EXISTS `farm_weather`;
CREATE TABLE IF NOT EXISTS `farm_weather` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `farm_id` int(11) DEFAULT NULL,
  `temperature` varchar(100) DEFAULT NULL,
  `humidity` varchar(100) DEFAULT NULL,
  `wind_speed` varchar(100) DEFAULT NULL,
  `rainfall` varchar(100) DEFAULT NULL,
  `solar_radiation` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `farm_id` (`farm_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_temp`
--

DROP TABLE IF EXISTS `password_reset_temp`;
CREATE TABLE IF NOT EXISTS `password_reset_temp` (
  `email` varchar(250) NOT NULL,
  `key` varchar(250) NOT NULL,
  `expDate` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `password_reset_temp`
--

INSERT INTO `password_reset_temp` (`email`, `key`, `expDate`) VALUES
('joanateye18@gmail.com', '6f83b6c4594ce9959e04bf43bf0a14f2d2789823cf', '2022-04-02 21:06:06');

-- --------------------------------------------------------

--
-- Table structure for table `sensor`
--

DROP TABLE IF EXISTS `sensor`;
CREATE TABLE IF NOT EXISTS `sensor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `sensor_name` varchar(100) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `value_recorded` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `farm_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tanks`
--

DROP TABLE IF EXISTS `tanks`;
CREATE TABLE IF NOT EXISTS `tanks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `tank_name` varchar(100) NOT NULL,
  `level` varchar(100) DEFAULT NULL,
  `refill` varchar(100) DEFAULT NULL,
  `rate` varchar(100) DEFAULT NULL,
  `is_pump_open` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `farm_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

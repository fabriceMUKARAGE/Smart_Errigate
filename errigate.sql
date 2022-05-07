-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 07, 2022 at 09:34 PM
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
(1, 'Joana', 'joanateye18@gmail.com', '25d55ad283aa400af464c76d713c07ad', '0509642401');

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
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `beds`
--

INSERT INTO `beds` (`id`, `user_id`, `bed_name`, `humidity`, `temperature`, `pH`, `nitrogen`, `phosphorous`, `potassium`, `water_used`, `is_valve_open`) VALUES
(12, 33, 'Bed 4: Corn', '56%', '45', '6.90', '93mg/kg', '117mg/kg', '156mg/kg', '6.8L', 'closed'),
(11, 33, 'Bed 2: cocoyam', '68%', '41', '7.20', '120mg/kg', '112mg/kg', '101mg/kg', '5L', 'closed'),
(7, 33, 'bed 3: groundnut', '66%', '45', '7.90', '122mg/kg', '124mg/kg', '182mg/kg', '3L', 'closed'),
(9, 7, 'Bed 3: tomato', '61%', '55', '7.01', '123mg/kg', '112mg/kg', '130mg/kg', '6L', 'opened'),
(10, 33, 'Bed 1: tomato', '76%', '48', '7.00', '122mg/kg', '152mg/kg', '102mg/kg', '3.5L', 'closed'),
(13, 33, 'bed 5: Cowpea', '66%', '38', '7.90', '79mg/kg', '120mg/kg', '92mg/kg', '8L', 'opened'),
(14, 33, 'bed 6: Sorghum', '79%', '56', '8.00', '84mg/kg', '128mg/kg', '95mg/kg', '3.8L', 'closed'),
(15, 33, 'bed 7: Millet', '36%', '83', '6.13', '113mg/kg', '90mg/kg', '89mg/kg', '4.9L', 'opened'),
(16, 33, 'bed 8: Pepper', '83%', '90', '5.00', '83mg/kg', '73mg/kg', '82mg/kg', '9.1L', 'closed'),
(17, 33, 'bed 9: Tiger nut', '92%', '110', '5.99', '99mg/kg', '92mg/kg', '156mg/kg', '5L', 'opened');

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
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `username`, `email`, `password`, `phone_number`, `credit`, `farm`) VALUES
(7, 'Esther', 'estherdzifa@gmail.com', '25d55ad283aa400af464c76d713c07ad', '05002734422', '0.00', 'Dzi Farms'),
(8, 'Naa Adoley', 'naa@gmail.com', '25d55ad283aa400af464c76d713c07ad', '0245678900', '+7.00', 'NaaAgric'),
(9, 'Kojo', 'koj@gmail.com', '25d55ad283aa400af464c76d713c07ad', '0550112730', '-9.00', 'pine farms '),
(10, 'Kwesi', 'kwesi@gmail.com', '25d55ad283aa400af464c76d713c07ad', '0241234567', '-8.50', 'wesiAgric farms'),
(11, 'Kwame', 'kwams@gmail.com', '25d55ad283aa400af464c76d713c07ad', '0251234567', '0.00', 'Kwams farms'),
(12, 'Kofi', 'kofi@gmail.com', '25d55ad283aa400af464c76d713c07ad', '0551234567', '100.00', 'KofAgric'),
(13, 'Yaw', 'yaw@gmail.com', '25d55ad283aa400af464c76d713c07ad', '0541234567', '0.00', 'Strawberry farms'),
(14, 'Kweku', 'kweks@gmail.com', '25d55ad283aa400af464c76d713c07ad', '0231234567', '-2.50', 'Cassava farm'),
(15, 'Kwabena', 'kwabs@gmail.com', '25d55ad283aa400af464c76d713c07ad', '0261234567', '-4.50', 'Palm farm'),
(16, 'Adjoa', 'joa@gmail.com', '25d55ad283aa400af464c76d713c07ad', '0561234567', '-2.70', 'Cashew Agric limited'),
(33, 'Joana Teye', 'joanateye@gmail.com', '25d55ad283aa400af464c76d713c07ad', '0550112730', '0.00', 'Joz farms'),
(31, 'Harry Potter', 'potter@gmail.com', '25d55ad283aa400af464c76d713c07ad', '+233509642401', '0.00', 'Hogwarts Farms'),
(32, 'Hermione Granger', 'hermgan@gmail.com', '25d55ad283aa400af464c76d713c07ad', '0509642401', '0.00', 'Hogwart farms'),
(27, 'Abena', 'bena@gmail.com', '25d55ad283aa400af464c76d713c07ad', '+233509642401', '0.00', 'Bena Farms'),
(21, 'naalopwer', 'naaadoley46@gmail.com', '78c9a48056960791a19c6337b931a595', '+0987654398', '30000.00', 'nasdhiopterty');

-- --------------------------------------------------------

--
-- Table structure for table `farm_weather`
--

DROP TABLE IF EXISTS `farm_weather`;
CREATE TABLE IF NOT EXISTS `farm_weather` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `temperature` varchar(100) DEFAULT NULL,
  `humidity` varchar(100) DEFAULT NULL,
  `wind_speed` varchar(100) DEFAULT NULL,
  `wind_direction` varchar(100) NOT NULL,
  `rainfall` varchar(100) DEFAULT NULL,
  `solar_radiation` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `farm_weather`
--

INSERT INTO `farm_weather` (`id`, `user_id`, `temperature`, `humidity`, `wind_speed`, `wind_direction`, `rainfall`, `solar_radiation`) VALUES
(1, 33, '25', '20%', '35Km/h', '022 NE', '5mm', '0.22 W/m^3');

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
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sensor`
--

INSERT INTO `sensor` (`id`, `user_id`, `sensor_name`, `location`, `type`, `value_recorded`) VALUES
(6, 33, 'hum2', 'bed1', 'humidity', NULL),
(10, 33, 'temp 381', 'farm weather', 'temperature sensor', NULL),
(7, 33, 'hum2', 'bed1', 'humidity', NULL),
(8, 7, 'hum458', 'Weather', 'humidity sensor', NULL),
(9, 7, 'hum864', 'Bed 3', 'humidity sensor', NULL),
(11, 33, 'phospho 1', 'bed 3', 'phosphorous sensor', NULL),
(12, 33, 'potash 678', 'bed 2', 'potassium sensor', NULL),
(13, 33, 'temp 390', 'bed 2', 'temperature sensor', NULL),
(14, 33, 'water 56', 'bed 1', 'water level sensor', NULL),
(15, 33, 'rain 789', 'farm weather', 'rain gauge', NULL),
(16, 33, 'anem 456', 'farm weather', 'anemometer', NULL),
(17, 33, 'windec 1', 'farm weather', 'wind vane', NULL);

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
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tanks`
--

INSERT INTO `tanks` (`id`, `user_id`, `tank_name`, `level`, `refill`, `rate`, `is_pump_open`) VALUES
(8, 33, 'Tank 4', '93%', 'Ongoing', '50L/min', 'opened'),
(7, 33, 'Tank 3', '67%', 'Ongoing', '93L/min', 'closed'),
(4, 33, 'Tank 1', '64%', 'Ongoing', '81L/min', 'opened'),
(6, 33, 'Tank 2', '54%', 'Ongoing', '87L/min', 'opened'),
(9, 33, 'Tank 5', '87%', 'Ongoing', '67L/min', 'closed'),
(10, 33, 'Tank 6', '10%', 'Ongoing', '40L/min', 'closed'),
(11, 33, 'Tank 7', '3%', 'Ongoing', '12L/min', 'opened'),
(12, 33, 'Tank 8', '19%', 'Ongoing', '23L/min', 'opened'),
(13, 33, 'Tank 9', '38%', 'Ongoing', '45L/min', 'opened');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

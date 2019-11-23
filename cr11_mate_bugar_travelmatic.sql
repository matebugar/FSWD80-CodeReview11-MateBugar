-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 23, 2019 at 11:41 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cr11_mate_bugar_travelmatic`
--

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `eventId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `ticket` varchar(55) NOT NULL,
  `dateEvent` date NOT NULL,
  `timeEvent` time NOT NULL,
  `image` varchar(1000) NOT NULL,
  `zip_code` varchar(13) NOT NULL,
  `city` varchar(255) NOT NULL,
  `active` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`eventId`, `name`, `address`, `ticket`, `dateEvent`, `timeEvent`, `image`, `zip_code`, `city`, `active`) VALUES
(7, 'Drake ', 'Vienna Hall', '30', '2019-11-30', '20:00:00', 'https://images.unsplash.com/photo-1571153751717-3e8ff51939ea?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=634&q=80', '1020', 'Vienna', 0),
(8, 'Les Miserables', 'State Opera', '50', '2019-12-12', '19:00:00', 'https://images.unsplash.com/photo-1560184611-5b5749138c3c?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1187&q=80', '1010', 'Vienna', 0),
(9, 'Vienna Open ', 'Vienna Tennisplatz', '80', '2020-04-10', '08:00:00', 'https://images.unsplash.com/photo-1542144582-1ba00456b5e3?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=713&q=80', '1200', 'Vienna', 0),
(10, 'Pug Festival', 'Mopstrasse 52', '20', '2019-12-20', '19:00:00', 'https://images.unsplash.com/photo-1517423568366-8b83523034fd?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=675&q=80', '1120', 'Vienna', 0),
(11, 'Rapid - Salzburg', 'Ernst Happel Stadium', '25', '2019-11-27', '15:30:00', 'https://images.unsplash.com/photo-1554331468-3d4032983519?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=700&q=80', '1020', 'Vienna', 0),
(12, 'Christkindlmarkt', 'Rathausplatz 1', '0', '2019-12-06', '18:00:00', 'https://images.unsplash.com/photo-1514675151213-b673863b356e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=634&q=80', '1010', 'Vienna', 0);

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `image` varchar(1000) NOT NULL,
  `region` varchar(255) NOT NULL,
  `fk_restId` int(11) NOT NULL,
  `fk_placeId` int(11) NOT NULL,
  `fk_eventId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `place`
--

CREATE TABLE `place` (
  `placeId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `descript` varchar(1000) NOT NULL,
  `image` varchar(1000) NOT NULL,
  `zip_code` varchar(13) NOT NULL,
  `city` varchar(255) NOT NULL,
  `active` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `place`
--

INSERT INTO `place` (`placeId`, `name`, `address`, `descript`, `image`, `zip_code`, `city`, `active`) VALUES
(8, 'Schönbrunn Palace', 'Schönbrunner Schloßstraße 47', 'Barouque palace and gardens', 'https://images.unsplash.com/photo-1566124916275-571af76a7b63?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=676&q=80', '1130', 'Vienna', 0),
(9, 'The Hofburg', 'Michaelerkuppel', 'The Hofburg is the former principal imperial palace of the Habsburg dynasty rulers ', 'https://images.unsplash.com/photo-1547915688-37070704b1fb?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=979&q=80', '1010', 'Vienna', 0),
(10, 'St. Stephens', 'Stephansplatz 3', 'Famous cathedral', 'https://images.unsplash.com/photo-1561905911-ce470a490e30?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80', '1010', 'Vienna', 0),
(11, 'Prater', 'Praterstrasse 1', 'Giant ferris wheel and fun', 'https://images.unsplash.com/photo-1563373847-a30d776a433b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=634&q=80', '1020', 'Vienna', 0),
(12, 'Albertina', 'Albertinaplatz 1 ', 'Viennas biggest painting and printing gallery', 'https://images.unsplash.com/photo-1549925245-8b134f764652?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80', '1010', 'Vienna', 0),
(13, 'State Opera', 'Opernring 2,', 'Enjoy a show in the opera house', 'https://images.unsplash.com/photo-1516307365426-bea591f05011?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1041&q=80', '1010', 'Vienna', 0);

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `restId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `image` varchar(1000) NOT NULL,
  `zip_code` varchar(13) NOT NULL,
  `city` varchar(255) NOT NULL,
  `descript` varchar(1000) NOT NULL,
  `active` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`restId`, `name`, `address`, `type`, `image`, `zip_code`, `city`, `descript`, `active`) VALUES
(14, 'Ulrich', 'Sankt-Ulrichs-Platz 1', 'breakfast', 'https://images.unsplash.com/photo-1533640924469-f04e06f8898d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=667&q=80', '1060', 'Vienna', 'Lovely place for a breakfast', 0),
(15, 'Door No. 8 ', 'Neubaugasse 8 ', 'steak', 'https://images.unsplash.com/photo-1553719129-5c8e06e204bc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=634&q=80', '1070', 'Vienna', 'Eat a delicious steak ', 0),
(16, 'Knödel Manufaktur', 'Josefstädter Str. 89', 'austrian', 'https://images.unsplash.com/photo-1513862153653-f8b7324e1779?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=622&q=80', '1080', 'Vienna', 'Indulge into the world of Austrian sweet flavours', 0),
(17, 'SchnitzelWirt', 'Neubaugasse 52', 'austrian', 'https://images.unsplash.com/photo-1560611588-163f295eb145?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80', '1070', 'Vienna', 'Enjoy a traditional Austrian Schnitzel ', 0),
(18, 'Viet Thao', 'Friedrichstraße 2', 'asian', 'https://images.unsplash.com/photo-1555126634-323283e090fa?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=700&q=80', '1010', 'Vienna', 'Vietnamese dishes in the centre of Vienna', 0),
(19, 'Mosquito', 'Margaretenstraße 76', 'mexican', 'https://images.unsplash.com/photo-1545093149-618ce3bcf49d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=634&q=80', '1050', 'Vienna', 'Mexican dishes and cocktails. Sounds good isnt it?', 0),
(20, 'I Ragazzi', 'Burggasse 6/8', 'italian', 'https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=714&q=80', '1070', 'Vienna', 'Traditional Italian pizza restaurant in a wonderful district', 0),
(21, 'Vienna Sausage', 'Schottenring 1', 'hot dog', 'https://images.unsplash.com/photo-1542344807-21226ec94b39?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=800&q=80', '1010', 'Vienna', 'Best hot dogs in Vienna. No other words needed', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `userEmail` varchar(60) NOT NULL,
  `userPass` varchar(255) NOT NULL,
  `role` varchar(40) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `userName`, `userEmail`, `userPass`, `role`) VALUES
(1, 'User', 'user@user.com', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', 'user'),
(2, 'Admin', 'admin@admin.com', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', 'admin'),
(3, 'Super Admin', 'super@super.com', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', 'superadmin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`eventId`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_restId` (`fk_restId`),
  ADD KEY `fk_placeId` (`fk_placeId`),
  ADD KEY `fk_eventId` (`fk_eventId`);

--
-- Indexes for table `place`
--
ALTER TABLE `place`
  ADD PRIMARY KEY (`placeId`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`restId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `eventId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `place`
--
ALTER TABLE `place`
  MODIFY `placeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `restId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `location`
--
ALTER TABLE `location`
  ADD CONSTRAINT `location_ibfk_1` FOREIGN KEY (`fk_restId`) REFERENCES `restaurant` (`restId`),
  ADD CONSTRAINT `location_ibfk_2` FOREIGN KEY (`fk_placeId`) REFERENCES `place` (`placeId`),
  ADD CONSTRAINT `location_ibfk_3` FOREIGN KEY (`fk_eventId`) REFERENCES `event` (`eventId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

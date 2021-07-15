-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2021 at 07:08 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpmotors`
--

-- --------------------------------------------------------

--
-- Table structure for table `carclassification`
--

CREATE TABLE `carclassification` (
  `classificationId` int(11) NOT NULL,
  `classificationName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `carclassification`
--

INSERT INTO `carclassification` (`classificationId`, `classificationName`) VALUES
(1, 'SUV'),
(2, 'Classic'),
(3, 'Sports'),
(4, 'Trucks'),
(5, 'Used');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `clientId` int(10) UNSIGNED NOT NULL,
  `clientFirstname` varchar(15) NOT NULL,
  `clientLastname` varchar(25) NOT NULL,
  `clientEmail` varchar(40) NOT NULL,
  `clientPassword` varchar(255) NOT NULL,
  `clientLevel` enum('1','2','3') NOT NULL DEFAULT '1',
  `comment` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`clientId`, `clientFirstname`, `clientLastname`, `clientEmail`, `clientPassword`, `clientLevel`, `comment`) VALUES
(6, 'Kevin', 'Rodríguez', 'kevin.hr.3@gmail.com', '$2y$10$W/kHeeJeXJ1T7/3pZ8BOjelCUC3jyGCRo5yZ3mgRW.jnz6zOAqqqG', '1', NULL),
(7, 'Arthur', 'Rodriguez', 'kevin.hr.3@gmail.com', '$2y$10$1zt78fbCpaMzOFg/xqkffemXCya7PHcyG4zVkSvtCZgUysNBYivl6', '1', NULL),
(8, 'Admin', 'User', 'admin@cse340.net', '$2y$10$RE.fvR.LC2uqsql/uEUusOYLcgbpAfVZJJoNaVtxXPgp7sEFW/HIy', '3', NULL),
(9, 'Joel', 'Haro', 'joel@cse340.net', '$2y$10$oyuQVjvMtJxEgA8V0ByGEeqSoOrRpMSwSEKh4YedNtDuezK69Z/DW', '1', NULL),
(10, 'Kevin', 'Rodríguez', 'artcom_3@hotmail.com', '$2y$10$UIQPC.feMBYYfCAhgygp/eTy1BsnEONdcApnYCHVoUoq.ES9dEA8S', '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `imgId` int(11) NOT NULL,
  `invId` int(10) NOT NULL,
  `imgName` varchar(100) NOT NULL,
  `imgPath` varchar(150) NOT NULL,
  `imgDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `imgPrimary` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`imgId`, `invId`, `imgName`, `imgPath`, `imgDate`, `imgPrimary`) VALUES
(3, 2, 'model-t.jpg', '/phpmotors/uploads/images/model-t.jpg', '2021-07-03 20:47:03', 1),
(4, 2, 'model-t-tn.jpg', '/phpmotors/uploads/images/model-t-tn.jpg', '2021-07-03 20:47:03', 1),
(5, 3, 'adventador.jpg', '/phpmotors/uploads/images/adventador.jpg', '2021-07-03 20:47:36', 1),
(6, 3, 'adventador-tn.jpg', '/phpmotors/uploads/images/adventador-tn.jpg', '2021-07-03 20:47:36', 1),
(7, 4, 'monster-truck.jpg', '/phpmotors/uploads/images/monster-truck.jpg', '2021-07-03 20:47:52', 1),
(8, 4, 'monster-truck-tn.jpg', '/phpmotors/uploads/images/monster-truck-tn.jpg', '2021-07-03 20:47:52', 1),
(9, 5, 'mechanic.jpg', '/phpmotors/uploads/images/mechanic.jpg', '2021-07-03 20:48:03', 1),
(10, 5, 'mechanic-tn.jpg', '/phpmotors/uploads/images/mechanic-tn.jpg', '2021-07-03 20:48:03', 1),
(11, 6, 'batmobile.jpg', '/phpmotors/uploads/images/batmobile.jpg', '2021-07-03 20:48:22', 1),
(12, 6, 'batmobile-tn.jpg', '/phpmotors/uploads/images/batmobile-tn.jpg', '2021-07-03 20:48:22', 1),
(13, 7, 'mystery-van.jpg', '/phpmotors/uploads/images/mystery-van.jpg', '2021-07-03 20:48:49', 1),
(14, 7, 'mystery-van-tn.jpg', '/phpmotors/uploads/images/mystery-van-tn.jpg', '2021-07-03 20:48:49', 1),
(15, 8, 'fire-truck.jpg', '/phpmotors/uploads/images/fire-truck.jpg', '2021-07-03 20:49:02', 1),
(16, 8, 'fire-truck-tn.jpg', '/phpmotors/uploads/images/fire-truck-tn.jpg', '2021-07-03 20:49:02', 1),
(17, 9, 'crwn-vic.jpg', '/phpmotors/uploads/images/crwn-vic.jpg', '2021-07-03 20:49:20', 1),
(18, 9, 'crwn-vic-tn.jpg', '/phpmotors/uploads/images/crwn-vic-tn.jpg', '2021-07-03 20:49:20', 1),
(19, 10, 'camaro.jpg', '/phpmotors/uploads/images/camaro.jpg', '2021-07-03 20:49:29', 1),
(20, 10, 'camaro-tn.jpg', '/phpmotors/uploads/images/camaro-tn.jpg', '2021-07-03 20:49:29', 1),
(21, 11, 'escalade.jpg', '/phpmotors/uploads/images/escalade.jpg', '2021-07-03 20:49:41', 1),
(22, 11, 'escalade-tn.jpg', '/phpmotors/uploads/images/escalade-tn.jpg', '2021-07-03 20:49:41', 1),
(23, 12, 'hummer.jpg', '/phpmotors/uploads/images/hummer.jpg', '2021-07-03 20:49:53', 1),
(24, 12, 'hummer-tn.jpg', '/phpmotors/uploads/images/hummer-tn.jpg', '2021-07-03 20:49:53', 1),
(25, 13, 'aerocar.jpg', '/phpmotors/uploads/images/aerocar.jpg', '2021-07-03 20:50:00', 1),
(26, 13, 'aerocar-tn.jpg', '/phpmotors/uploads/images/aerocar-tn.jpg', '2021-07-03 20:50:00', 1),
(27, 14, 'van.jpg', '/phpmotors/uploads/images/van.jpg', '2021-07-03 20:50:07', 1),
(28, 14, 'van-tn.jpg', '/phpmotors/uploads/images/van-tn.jpg', '2021-07-03 20:50:07', 1),
(29, 15, 'no-image.png', '/phpmotors/uploads/images/no-image.png', '2021-07-03 20:50:18', 1),
(30, 15, 'no-image-tn.png', '/phpmotors/uploads/images/no-image-tn.png', '2021-07-03 20:50:18', 1),
(31, 19, 'delorean.jpg', '/phpmotors/uploads/images/delorean.jpg', '2021-07-03 20:50:29', 1),
(32, 19, 'delorean-tn.jpg', '/phpmotors/uploads/images/delorean-tn.jpg', '2021-07-03 20:50:29', 1),
(33, 1, 'wrangler.jpg', '/phpmotors/uploads/images/wrangler.jpg', '2021-07-03 20:52:03', 1),
(34, 1, 'wrangler-tn.jpg', '/phpmotors/uploads/images/wrangler-tn.jpg', '2021-07-03 20:52:03', 1),
(35, 19, 'delorean-2.jpeg', '/phpmotors/uploads/images/delorean-2.jpeg', '2021-07-03 20:56:30', 0),
(36, 19, 'delorean-2-tn.jpeg', '/phpmotors/uploads/images/delorean-2-tn.jpeg', '2021-07-03 20:56:30', 0),
(37, 3, 'adventador-2.jpg', '/phpmotors/uploads/images/adventador-2.jpg', '2021-07-03 20:56:38', 0),
(38, 3, 'adventador-2-tn.jpg', '/phpmotors/uploads/images/adventador-2-tn.jpg', '2021-07-03 20:56:38', 0),
(39, 10, 'camaro-2.jpg', '/phpmotors/uploads/images/camaro-2.jpg', '2021-07-03 20:56:56', 0),
(40, 10, 'camaro-2-tn.jpg', '/phpmotors/uploads/images/camaro-2-tn.jpg', '2021-07-03 20:56:56', 0);

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `invId` int(10) NOT NULL,
  `invMake` varchar(30) NOT NULL,
  `invModel` varchar(30) NOT NULL,
  `invDescription` text NOT NULL,
  `invImage` varchar(50) NOT NULL,
  `invThumbnail` varchar(50) NOT NULL,
  `invPrice` decimal(10,0) NOT NULL,
  `invStock` smallint(6) NOT NULL,
  `invColor` varchar(20) NOT NULL,
  `classificationId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`invId`, `invMake`, `invModel`, `invDescription`, `invImage`, `invThumbnail`, `invPrice`, `invStock`, `invColor`, `classificationId`) VALUES
(1, 'Jeep ', 'Wrangler', 'The Jeep Wrangler is small and compact with enough power to get you where you want to go. Its great for everyday driving as well as offroading weather that be on the the rocks or in the mud!', '/phpmotors/images/vehicles/wrangler.jpg', '/phpmotors/images/vehicles/wrangler-tn.jpg', '28045', 4, 'Orange', 1),
(2, 'Ford', 'Model T', 'The Ford Model T can be a bit tricky to drive. It was the first car to be put into production. You can get it in any color you want as long as it&#39;s black.', '/phpmotors/images/vehicles/model-t.jpg', '/phpmotors/images/vehicles/model-t-tn.jpg', '30000', 2, 'Black', 2),
(3, 'Lamborghini', 'Adventador', 'This V-12 engine packs a punch in this sporty car. Make sure you wear your seatbelt and obey all traffic laws. ', '/phpmotors/images/vehicles/adventador.jpg', '/phpmotors/images/vehicles/adventador-tn.jpg', '417650', 1, 'Blue', 3),
(4, 'Monster', 'Truck', 'Most trucks are for working, this one is for fun. this beast comes with 60in tires giving you tracktions needed to jump and roll in the mud.', '/phpmotors/images/vehicles/monster-truck.jpg', '/phpmotors/images/vehicles/monster-truck-tn.jpg', '150000', 3, 'purple', 4),
(5, 'Mechanic', 'Special', 'Not sure where this car came from. however with a little tlc it will run as good a new.', '/phpmotors/images/vehicles/mechanic.jpg', '/phpmotors/images/vehicles/mechanic-tn.jpg', '100', 200, 'Rust', 5),
(6, 'Batmobile', 'Custom', 'Ever want to be a super hero? now you can with the batmobile. This car allows you to switch to bike mode allowing you to easily maneuver through trafic during rush hour.', '/phpmotors/images/vehicles/batmobile.jpg', '/phpmotors/images/vehicles/batmobile-tn.jpg', '65000', 2, 'Black', 3),
(7, 'Mystery', 'Machine', 'Scooby and the gang always found luck in solving their mysteries because of there 4 wheel drive Mystery Machine. This Van will help you do whatever job you are required to with a success rate of 100%.', '/phpmotors/images/vehicles/mystery-van.jpg', '/phpmotors/images/vehicles/mystery-van-tn.jpg', '10000', 12, 'Green', 1),
(8, 'Spartan', 'Fire Truck', 'Emergencies happen often. Be prepared with this Spartan fire truck. Comes complete with 1000 ft. of hose and a 1000 gallon tank.', '/phpmotors/images/vehicles/fire-truck.jpg', '/phpmotors/images/vehicles/fire-truck-tn.jpg', '50000', 2, 'Red', 4),
(9, 'Ford', 'Crown Victoria', 'After the police force updated their fleet these cars are now available to the public! These cars come equiped with the siren which is convenient for college students running late to class.', '/phpmotors/images/vehicles/crwn-vic.jpg', '/phpmotors/images/vehicles/crwn-vic-tn.jpg', '10000', 5, 'White', 5),
(10, 'Chevy', 'Camaro', 'If you want to look cool this is the ar you need! This car has great performance at an affordable price. Own it today!', '/phpmotors/images/vehicles/camaro.jpg', '/phpmotors/images/vehicles/camaro-tn.jpg', '25000', 10, 'Silver', 3),
(11, 'Cadilac', 'Escalade', 'This stylin car is great for any occasion from going to the beach to meeting the president. The luxurious inside makes this car a home away from home.', '/phpmotors/images/vehicles/escalade.jpg', '/phpmotors/images/vehicles/escalade-tn.jpg', '75195', 4, 'Black', 1),
(12, 'GM', 'Hummer', 'Do you have 6 kids and like to go offroading? The Hummer gives you the small interiors with an engine to get you out of any muddy or rocky situation.', '/phpmotors/images/vehicles/hummer.jpg', '/phpmotors/images/vehicles/hummer-tn.jpg', '58800', 5, 'Yellow', 5),
(13, 'Aerocar International', 'Aerocar', 'Are you sick of rushhour trafic? This car converts into an airplane to get you where you are going fast. Only 6 of these were made, get them while they last!', '/phpmotors/images/vehicles/aerocar.jpg', '/phpmotors/images/vehicles/aerocar-tn.jpg', '1000000', 6, 'Red', 2),
(14, 'FBI', 'Survalence Van', 'do you like police shows? You&#39;ll feel right at home driving this van, come complete with survalence equipments for and extra fee of $2,000 a month. ', '/phpmotors/images/vehicles/van.jpg', '/phpmotors/images/vehicles/van-tn.jpg', '20000', 1, 'Green', 1),
(15, 'Dog ', 'Car', 'Do you like dogs? Well this car is for you straight from the 90s from Aspen, Colorado we have the orginal Dog Car complete with fluffy ears.  ', '/phpmotors/images/vehicles/no-image.png', '/phpmotors/images/vehicles/no-image-tn.png', '35000', 1, 'Brown', 2),
(19, 'DMC', 'DeLorean', 'Futuristic car', '/phpmotors/images/no-image.png', '/phpmotors/images/no-image.png', '35800', 5, 'gray', 3);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `reviewId` int(10) UNSIGNED NOT NULL,
  `reviewText` text NOT NULL,
  `reviewDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `invId` int(10) NOT NULL,
  `clientId` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`reviewId`, `reviewText`, `reviewDate`, `invId`, `clientId`) VALUES
(11, 'It&#39;s a amazing vehicle', '2021-07-15 04:59:10', 2, 8),
(12, 'The best vehicle', '2021-07-15 17:00:31', 3, 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carclassification`
--
ALTER TABLE `carclassification`
  ADD PRIMARY KEY (`classificationId`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`clientId`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`imgId`),
  ADD KEY `invId` (`invId`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`invId`),
  ADD KEY `classificationId` (`classificationId`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`reviewId`),
  ADD KEY `invId` (`invId`),
  ADD KEY `clientId` (`clientId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carclassification`
--
ALTER TABLE `carclassification`
  MODIFY `classificationId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `clientId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `imgId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `invId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `reviewId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `FX_inv_images` FOREIGN KEY (`invId`) REFERENCES `inventory` (`invId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`classificationId`) REFERENCES `carclassification` (`classificationId`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `FX_reviews_clients` FOREIGN KEY (`clientId`) REFERENCES `clients` (`clientId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FX_reviews_inventory` FOREIGN KEY (`invId`) REFERENCES `inventory` (`invId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

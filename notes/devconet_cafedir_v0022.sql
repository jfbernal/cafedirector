-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2015 at 07:04 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `devconet_cafedir_v0021`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE IF NOT EXISTS `applications` (
  `applicationID` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL,
  `storeID` int(11) NOT NULL,
  `expectation` varchar(1000) NOT NULL,
  `start_date` date NOT NULL,
  `add_datestamp` datetime NOT NULL,
  `update_datestamp` datetime NOT NULL,
  `application_status` varchar(45) NOT NULL,
  PRIMARY KEY (`applicationID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`applicationID`, `userID`, `storeID`, `expectation`, `start_date`, `add_datestamp`, `update_datestamp`, `application_status`) VALUES
(19, 47, 26, 'I had a vision, were able to execute it and not can reap the benefits of saying "I did this." On the other hand, itâ€™s tough to be proud of the zillionth request for proposal you fill out for your employer.', '2015-11-25', '2015-11-19 12:38:17', '0000-00-00 00:00:00', 'approved'),
(20, 46, 23, 'now more new start ups in retail than in any other secto', '2015-11-24', '2015-11-19 12:51:04', '0000-00-00 00:00:00', 'approved'),
(21, 45, 25, 'I like this store', '2015-12-23', '2015-11-20 02:03:48', '0000-00-00 00:00:00', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `membership`
--

CREATE TABLE IF NOT EXISTS `membership` (
  `membershipID` int(10) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(64) NOT NULL,
  `last_name` varchar(64) NOT NULL,
  `number_street` int(11) DEFAULT NULL,
  `name_street` varchar(64) DEFAULT NULL,
  `suburb` varchar(64) DEFAULT NULL,
  `postcode` int(11) DEFAULT NULL,
  `country` varchar(64) DEFAULT NULL,
  `number_phone` int(11) DEFAULT NULL,
  `number_mobile` int(11) DEFAULT NULL,
  `email` varchar(64) DEFAULT NULL,
  `gender` varchar(64) DEFAULT NULL,
  `newsletter` varchar(8) DEFAULT NULL,
  `join_datestamp` datetime NOT NULL,
  `image` varchar(64) NOT NULL,
  `unit_address` int(11) NOT NULL,
  `state` varchar(32) NOT NULL,
  `filelog` varchar(64) NOT NULL,
  `update_datestamp` datetime NOT NULL,
  PRIMARY KEY (`membershipID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=59 ;

--
-- Dumping data for table `membership`
--

INSERT INTO `membership` (`membershipID`, `first_name`, `last_name`, `number_street`, `name_street`, `suburb`, `postcode`, `country`, `number_phone`, `number_mobile`, `email`, `gender`, `newsletter`, `join_datestamp`, `image`, `unit_address`, `state`, `filelog`, `update_datestamp`) VALUES
(44, 'Jorge Federico', 'Bernal', 3, 'Hill St', 'Carina', 4100, 'Australia', 422553225, 422553225, 'jfbernal@gmail.com', 'male', '', '2015-11-19 11:03:59', '../unloads/p5.jpg', 0, 'QLD', '(Error Code:4)', '2015-11-19 12:43:29'),
(45, 'Natalie', 'Goddard', 18, 'Edward St', 'Brisbane', 4001, 'Australia', 401209638, 738109022, 'ngoddard@gmail.com', 'female', '', '2015-11-19 12:22:06', '../unloads/p2.jpg', 0, 'QLD', 'The file was uploaded successfully.', '0000-00-00 00:00:00'),
(46, 'Yvette', 'Lyons', 24, 'Avoca St', 'Yeronga', 4104, 'Australia', 738485782, 413652378, 'yvette_lyon@hotmail.com', 'female', '', '2015-11-19 12:24:27', '../unloads/p4.jpg', 0, 'QLD', 'The file was uploaded successfully.', '0000-00-00 00:00:00'),
(47, 'Ben', 'Hogan', 29, 'Cascade Drive', 'Underwood', 4119, 'Australia', 770731334, 447789653, 'ben1972@gmail.com', 'male', '', '2015-11-19 12:28:54', '../unloads/p9.jpg', 0, 'QLD', 'The file was uploaded successfully.', '0000-00-00 00:00:00'),
(48, 'Natasha', 'Smith', 56, 'Ascot Court', 'Bundall', 4217, 'Australia', 792811317, 415475042, 'NSmithy@tpg.com.au', 'female', '', '2015-11-19 12:31:18', '../unloads/p7.jpg', 0, 'QLD', 'The file was uploaded successfully.', '0000-00-00 00:00:00'),
(49, 'Courtney', 'Gonsalves', 145, 'Snipe St', 'Miami', 4220, 'Australia', 755490087, 454657581, 'gonsalves@iinet.net', 'female', '', '2015-11-19 12:33:45', '../unloads/p8.jpg', 24, 'QLD', 'The file was uploaded successfully.', '0000-00-00 00:00:00'),
(50, 'James', 'Menon', 34, 'Taylor St ', 'Windsor', 4030, 'Australia', 739217545, 402952335, 'jamie.menon@gmail.com', 'male', '', '2015-11-19 12:43:03', '../unloads/p12.jpg', 0, 'QLD', 'File already exists. Please upload another file.', '0000-00-00 00:00:00'),
(51, 'Julia', 'Hammar', 76, ' Ontario Crescent', 'Parkinson', 4115, 'Australia', 739772748, 402324857, 'julia.hammar@bigpond.com', 'female', '', '2015-11-19 12:54:40', '../unloads/p6.jpg', 0, 'QLD', 'The file was uploaded successfully.', '0000-00-00 00:00:00'),
(52, 'Tony', 'House', 128, 'Grandview Rd', 'Pullenvale', 4069, 'Australia', 732352904, 412368799, 'christy043@hotmail.com', 'male', '', '2015-11-19 12:56:37', '../unloads/p3.jpg', 0, 'QLD', 'File already exists. Please upload another file.', '0000-00-00 00:00:00'),
(53, 'Jennifer', 'Louise', 103, 'Davis Lane', 'Brendale', 4500, 'Australia', 753201738, 489459921, 'jen.L@talktalk.net', 'female', '', '2015-11-19 12:58:35', '../unloads/p14.jpg', 0, 'QLD', 'The file was uploaded successfully.', '0000-00-00 00:00:00'),
(54, 'Kathryn', 'Jenkinns', 18, 'Dexter St', 'Tennyson', 4105, 'Australia', 770731334, 431096952, 'katjenkinns@iinet.net', 'female', '', '2015-11-19 01:01:52', '../unloads/p10.jpg', 0, 'QLD', 'The file was uploaded successfully.', '0000-00-00 00:00:00'),
(55, 'Christine', 'Howard', 128, 'Grandview Rd', 'Pullenvale', 4069, 'Australia', 732352904, 412368799, 'christy043@hotmail.com', 'female', '', '2015-11-19 01:04:39', '../unloads/p11.jpg', 0, 'QLD', 'File already exists. Please upload another file.', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `order_supplies`
--

CREATE TABLE IF NOT EXISTS `order_supplies` (
  `order_supplyID` int(11) NOT NULL AUTO_INCREMENT,
  `supplyID` int(11) NOT NULL,
  `storeID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `comment` varchar(1000) NOT NULL,
  `date_order` date NOT NULL,
  `quantity` int(11) NOT NULL,
  `create_datestamp` datetime NOT NULL,
  `update_datestamp` datetime NOT NULL,
  `order_status` varchar(128) NOT NULL,
  PRIMARY KEY (`order_supplyID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `order_supplies`
--

INSERT INTO `order_supplies` (`order_supplyID`, `supplyID`, `storeID`, `userID`, `comment`, `date_order`, `quantity`, `create_datestamp`, `update_datestamp`, `order_status`) VALUES
(6, 11, 26, 0, '', '2015-11-25', 20, '2015-11-19 01:21:31', '0000-00-00 00:00:00', 'pending'),
(7, 13, 26, 0, '', '2015-11-26', 15, '2015-11-19 01:21:48', '0000-00-00 00:00:00', 'pending'),
(8, 9, 23, 0, '', '2015-11-28', 3, '2015-11-19 01:23:24', '0000-00-00 00:00:00', 'pending'),
(9, 7, 23, 0, '', '2015-11-25', 40, '2015-11-19 01:23:42', '0000-00-00 00:00:00', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE IF NOT EXISTS `stores` (
  `storeID` int(11) NOT NULL AUTO_INCREMENT,
  `namestore` varchar(128) NOT NULL,
  `unit` int(11) NOT NULL,
  `streetnumber` int(11) NOT NULL,
  `streetname` varchar(128) NOT NULL,
  `suburb` varchar(128) NOT NULL,
  `state` varchar(16) NOT NULL,
  `postcode` int(11) NOT NULL,
  `website` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `phone1` int(11) NOT NULL,
  `phone2` int(11) NOT NULL,
  `join_datestamp` datetime NOT NULL,
  `update_datestamp` datetime NOT NULL,
  `img_path` varchar(128) NOT NULL,
  `store_description` varchar(1000) NOT NULL,
  `store_status` varchar(32) NOT NULL,
  `franchise_available` varchar(32) NOT NULL,
  PRIMARY KEY (`storeID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`storeID`, `namestore`, `unit`, `streetnumber`, `streetname`, `suburb`, `state`, `postcode`, `website`, `email`, `phone1`, `phone2`, `join_datestamp`, `update_datestamp`, `img_path`, `store_description`, `store_status`, `franchise_available`) VALUES
(16, 'Perth Airport', 0, 1, 'Council Ave', 'Rockingham', 'WA', 6168, 'rockingham.coffee.com', 'rockingham@coffee.com', 95279155, 0, '2015-11-19 11:14:25', '2015-11-19 11:14:25', '../unloads/coffeeshop01info.jpg', 'When youâ€™re looking for quiet spot to enjoy a leisurely breakfast, lunch or casual dinner, or even just a few moments peace to enjoy a coffee and cake, hide away in a Shingle Inn booth.', 'open', 'yes'),
(17, 'Werribee', 0, 1, 'Cnr Derrimut Road', 'Werribee', 'VIC', 3030, 'werribee.coffee.com', 'werribee@coffee.com', 398406850, 0, '2015-11-19 11:19:11', '2015-11-19 11:19:11', '../unloads/coffeeshop09info.jpg', 'When youâ€™re looking for quiet spot to enjoy a leisurely breakfast, lunch or casual dinner, or even just a few moments peace to enjoy a coffee and cake, hide away in a Shingle Inn booth.', 'open', 'yes'),
(18, 'Doncaster', 0, 619, 'Doncaster Road', 'Doncaster', 'VIC', 3108, 'doncaster.coffee.com', 'doncaster@coffee.com', 398407698, 0, '2015-11-19 11:21:17', '2015-11-19 11:21:17', '../unloads/coffeeshop03info.jpg', 'When youâ€™re looking for quiet spot to enjoy a leisurely breakfast, lunch or casual dinner, or even just a few moments peace to enjoy a coffee and cake, hide away in a Shingle Inn booth.', 'open', 'yes'),
(19, 'The Glen', 0, 235, 'Springvale Road', 'GLEN WAVERLEY', 'VIC', 3150, 'the_glen.coffee.com', 'the_glen@coffee.com', 398861188, 0, '2015-11-19 11:23:02', '2015-11-19 11:23:02', '../unloads/coffeeshop04info.jpg', 'When youâ€™re looking for quiet spot to enjoy a leisurely breakfast, lunch or casual dinner, or even just a few moments peace to enjoy a coffee and cake, hide away in a Shingle Inn booth.', 'open', ''),
(20, 'Clifford Gardens', 0, 1, 'Cnr James Street', 'TOOWOOMBA', 'QLD', 4350, 'clifford.coffee.com', 'clifford@coffee.com', 746389167, 0, '2015-11-19 11:31:59', '2015-11-19 11:31:59', '../unloads/coffeeshop05info.jpg', 'When youâ€™re looking for quiet spot to enjoy a leisurely breakfast, lunch or casual dinner, or even just a few moments peace to enjoy a coffee and cake, hide away in a Shingle Inn booth.', 'open', 'yes'),
(21, 'Belconnen', 0, 12, 'Benjamin Way', 'BELCONNEN', 'QLD', 4617, 'belconnen.coffee.com', 'belconnen@coffee.com', 762513949, 0, '2015-11-19 11:37:45', '2015-11-19 11:37:45', '../unloads/coffeeshop06info.jpg', 'When youâ€™re looking for quiet spot to enjoy a leisurely breakfast, lunch or casual dinner, or even just a few moments peace to enjoy a coffee and cake, hide away in a Shingle Inn booth.', 'open', ''),
(22, 'Belmont Forum', 0, 214, 'Belmont Avenue', 'CLOVERDALE', 'WA', 6105, 'belmont_forum.coffee.com', 'belmont_forum@coffee.com', 894794501, 0, '2015-11-19 11:39:34', '2015-11-19 11:39:34', '../unloads/coffeeshop07info.jpg', 'When youâ€™re looking for quiet spot to enjoy a leisurely breakfast, lunch or casual dinner, or even just a few moments peace to enjoy a coffee and cake, hide away in a Shingle Inn booth.', 'open', 'yes'),
(23, 'Hornsby', 0, 654, 'Pacific Highway', 'HORNSBY', 'NSW', 2077, 'hornsby.coffee.com', 'hornsby@coffee.com', 299870177, 0, '2015-11-19 11:41:08', '2015-11-19 11:41:08', '../unloads/coffeeshop08info.jpg', 'When youâ€™re looking for quiet spot to enjoy a leisurely breakfast, lunch or casual dinner, or even just a few moments peace to enjoy a coffee and cake, hide away in a Shingle Inn booth.', 'open', 'no'),
(24, 'Bankstown', 0, 1, 'North Tce', 'BANKSTOWN', 'QLD', 2200, 'bankstown.coffee.com', 'bankstown@coffee.com', 297082336, 0, '2015-11-19 11:45:18', '2015-11-22 10:14:46', '../unloads/coffeeshop02info.jpg', 'When youâ€™re looking for quiet spot to enjoy a leisurely breakfast, lunch or casual dinner, or even just a few moments peace to enjoy a coffee and cake, hide away in a Shingle Inn booth.', 'open', 'yes'),
(25, 'Mt Ommaney', 0, 124, 'Dandenong Road', 'MT OMMANEY', 'QLD', 4074, 'Mt_Ommaney.coffee.com', 'Mt_Ommaney@coffee.com', 733767225, 0, '2015-11-19 11:47:05', '2015-11-19 11:52:50', '../unloads/coffeeshop11info.jpg', 'When youâ€™re looking for quiet spot to enjoy a leisurely breakfast, lunch or casual dinner, or even just a few moments peace to enjoy a coffee and cake, hide away in a Shingle Inn booth.', 'open', 'no'),
(26, 'Indooroopilly', 0, 1, 'Moggill Road', 'INDOOROOPILLY', 'QLD', 4068, 'indooroopilly.coffee.com', 'indooroopilly@coffee.com', 733788998, 0, '2015-11-19 11:48:54', '2015-11-19 11:48:54', '../unloads/coffeeshop10info.jpg', 'When youâ€™re looking for quiet spot to enjoy a leisurely breakfast, lunch or casual dinner, or even just a few moments peace to enjoy a coffee and cake, hide away in a Shingle Inn booth.', 'open', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `supplies`
--

CREATE TABLE IF NOT EXISTS `supplies` (
  `supplyID` int(11) NOT NULL AUTO_INCREMENT,
  `supply_name` varchar(128) NOT NULL,
  `supply_description` varchar(1000) NOT NULL,
  `supply_price` int(11) NOT NULL,
  `create_datestamp` datetime NOT NULL,
  `update_datestamp` datetime NOT NULL,
  `supply_available` varchar(32) NOT NULL,
  PRIMARY KEY (`supplyID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `supplies`
--

INSERT INTO `supplies` (`supplyID`, `supply_name`, `supply_description`, `supply_price`, `create_datestamp`, `update_datestamp`, `supply_available`) VALUES
(6, 'Latte art pitchers', '07010 20 oz latte art pitcher [4 qty]', 25, '2015-11-19 01:18:10', '2015-11-20 06:51:39', 'yes'),
(7, 'Shot glasses', '02169 2 oz es logo shot glass [12 qty]', 15, '2015-11-19 01:18:35', '2015-11-20 06:51:49', 'yes'),
(8, 'Knock box', '25631 knock box set, metal holder', 45, '2015-11-19 01:19:02', '2015-11-20 06:51:34', 'yes'),
(9, 'Thermometer', '11160 easy steam 5" stem [6 qty]', 30, '2015-11-19 01:19:30', '2015-11-20 06:51:52', 'yes'),
(10, 'Scoop', '03073 black bean scale scoop', 12, '2015-11-19 01:19:49', '2015-11-20 06:51:45', 'yes'),
(11, 'Cups', '18506 6 oz cup', 15, '2015-11-19 01:20:11', '2015-11-20 06:51:24', 'yes'),
(12, 'Saucers', '18620 6.5" saucer', 18, '2015-11-19 01:20:31', '2015-11-20 06:51:42', 'yes'),
(13, 'Diner mugs', '17410-brown', 20, '2015-11-19 01:20:48', '2015-11-20 06:51:31', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `trainings`
--

CREATE TABLE IF NOT EXISTS `trainings` (
  `trainingID` int(11) NOT NULL AUTO_INCREMENT,
  `trainingname` varchar(128) NOT NULL,
  `trainingdescription` varchar(1000) NOT NULL,
  `create_datestamp` datetime NOT NULL,
  `update_datestamp` datetime NOT NULL,
  `training_available` varchar(11) NOT NULL,
  PRIMARY KEY (`trainingID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `trainings`
--

INSERT INTO `trainings` (`trainingID`, `trainingname`, `trainingdescription`, `create_datestamp`, `update_datestamp`, `training_available`) VALUES
(5, 'product knowledge', 'desc of product knowledge', '2015-11-20 01:02:13', '2015-11-20 06:45:34', 'yes'),
(6, 'Customer service skills.', 'Desc of customer service skills', '2015-11-20 01:12:35', '2015-11-20 06:44:04', 'no'),
(7, 'Store presentation', 'desc of store presentation', '2015-11-20 01:13:08', '2015-11-20 06:45:57', 'yes'),
(8, 'Barista Training', 'Desc of Barista Training', '2015-11-20 01:14:30', '2015-11-20 06:46:04', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `training_requests`
--

CREATE TABLE IF NOT EXISTS `training_requests` (
  `training_requestID` int(11) NOT NULL AUTO_INCREMENT,
  `trainingID` int(11) NOT NULL,
  `storeID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `comment` varchar(1000) NOT NULL,
  `date_request` date NOT NULL,
  `training_evaluation` varchar(128) NOT NULL,
  `create_datestamp` datetime NOT NULL,
  `update_datestamp` datetime NOT NULL,
  `training_status` varchar(64) NOT NULL,
  PRIMARY KEY (`training_requestID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `training_requests`
--

INSERT INTO `training_requests` (`training_requestID`, `trainingID`, `storeID`, `userID`, `comment`, `date_request`, `training_evaluation`, `create_datestamp`, `update_datestamp`, `training_status`) VALUES
(28, 5, 23, 46, 'especially coffee', '0000-00-00', '', '2015-11-20 01:06:23', '0000-00-00 00:00:00', 'pending'),
(29, 8, 23, 50, '', '2015-11-21', '', '2015-11-20 02:08:30', '0000-00-00 00:00:00', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `salt` varchar(64) NOT NULL,
  `role` varchar(64) NOT NULL,
  `membershipID` int(11) NOT NULL,
  `storeID` int(11) DEFAULT NULL,
  PRIMARY KEY (`userID`),
  KEY `membershipID` (`membershipID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=57 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `username`, `password`, `salt`, `role`, `membershipID`, `storeID`) VALUES
(42, 'admin', '$2y$10$PIqXoGN3hDFG2C5R8W6mQeO6b8oM4.EHw2RmLdJUsJOwWuPHZkmaW', 'PIqXoGN3hDFG2C5R8W6mQsM9HWfrHg==', 'administrator', 44, NULL),
(43, 'natalie', '$2y$10$ACMtS63GMo2fo8jvsTzSMe3DA6nkyzyjsUcWqIkXcTXaA0u4COOEe', 'ACMtS63GMo2fo8jvsTzSMs1fYBcePA==', 'registered', 45, NULL),
(44, 'yvette', '$2y$10$qFAP2clG2CB//JsnJgWhPOxfu.LzUm3w1ofZfhI5/NJvxIcAqRKqi', 'qFAP2clG2CB//JsnJgWhPRRdgZTdFg==', 'registered', 46, NULL),
(45, 'bennie', '$2y$10$87/8GW3hQm49diEBb7t6ceNGtZzsN4MbpUvySISkXz0rPTC/4vWT2', '87/8GW3hQm49diEBb7t6cp6lXaP7sA==', 'manager', 47, 25),
(46, 'manager', '$2y$10$qxnKDPqyfBVY9D9JZTIp.ODU2sDcrGT5uF00elfSRSmeLWWW8eJV2', 'qxnKDPqyfBVY9D9JZTIp.P6xpPtWcQ==', 'manager', 48, 23),
(47, 'court', '$2y$10$dXT.rXNfwrM.MydoZXoAf.1te76G7QS0Sy/ZIWLIE33SAeJlT0OWW', 'dXT.rXNfwrM.MydoZXoAfElDZtZ80Q==', 'manager', 49, 26),
(48, 'director', '$2y$10$lSEnHOmp/Tw1t72ShjVm5.oG97AjzknRr8by0Mn/acIHyOgM2QUsG', 'lSEnHOmp/Tw1t72ShjVm5KkMhen4HQ==', 'director', 50, NULL),
(49, 'julia', '$2y$10$4sm8BzpqEAvj2PYULLENrOh/3qhhCC1XmVrnnauT2.h8IsSYOLBZy', '4sm8BzpqEAvj2PYULLENrZpr3ar4qg==', 'staff', 51, 23),
(50, 'tony', '$2y$10$.YdCY5Ql90l03ZpJqV/.Ces4tS70s5kwdnutieSE8Uf3Rd6TqUzeO', '.YdCY5Ql90l03ZpJqV/.CnHEfS7BGA==', 'staff', 52, 23),
(51, 'jenny', '$2y$10$/BfBFNp1Te8H78L8T0i6M.iqC8/EfBgyJXiK0F2UsAKgNSvw/4XRW', '/BfBFNp1Te8H78L8T0i6MLT6yZqqbQ==', 'staff', 53, 23),
(52, 'kathryn', '$2y$10$JxdiOoJDf7x9CmXyaFdncuuA2/35lZDIVBZuKrFXbotiE8KRCHUPC', 'JxdiOoJDf7x9CmXyaFdncz7QsaeI9Q==', 'staff', 54, 26),
(53, 'chrissie', '$2y$10$in3XM4ep0wy9xBNBD0NIlOKHvQI9JHRTkcW0T2/76.9k.neMe2mSK', 'in3XM4ep0wy9xBNBD0NIlXhaochMwg==', 'leader', 55, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`membershipID`) REFERENCES `membership` (`membershipID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

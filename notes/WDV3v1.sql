-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Nov 11, 2015 at 01:55 PM
-- Server version: 5.5.42
-- PHP Version: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `WDV3v1`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `applicationID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `storeID` int(11) NOT NULL,
  `expectation` varchar(1000) NOT NULL,
  `start_date` date NOT NULL,
  `add_datestamp` datetime NOT NULL,
  `update_datestamp` datetime NOT NULL,
  `application_status` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`applicationID`, `userID`, `storeID`, `expectation`, `start_date`, `add_datestamp`, `update_datestamp`, `application_status`) VALUES
(1, 8, 5, 'good', '2015-10-09', '2015-10-30 09:00:55', '0000-00-00 00:00:00', 'approved'),
(2, 8, 3, 'aasdasd', '2015-10-15', '2015-10-30 09:05:29', '0000-00-00 00:00:00', 'approved'),
(3, 8, 1, 'asdasd', '2015-10-25', '2015-10-30 09:27:23', '0000-00-00 00:00:00', 'approved'),
(4, 8, 6, 'asdasd', '2015-10-23', '2015-10-30 03:40:10', '0000-00-00 00:00:00', 'approved'),
(5, 8, 6, 'asdasd', '2015-10-17', '2015-10-30 03:42:16', '0000-00-00 00:00:00', 'approved'),
(6, 8, 7, 'lkjlaksjd', '2015-10-15', '2015-10-30 04:44:50', '0000-00-00 00:00:00', 'approved'),
(7, 16, 7, 'test1', '2015-10-10', '2015-10-31 02:13:33', '0000-00-00 00:00:00', 'pending'),
(8, 27, 2, 'hola', '2015-11-13', '2015-11-04 01:18:53', '0000-00-00 00:00:00', ''),
(9, 27, 7, 'hola2', '2015-11-13', '2015-11-04 01:20:58', '0000-00-00 00:00:00', 'approved'),
(10, 32, 10, 'hola43', '2015-11-21', '2015-11-04 06:44:16', '0000-00-00 00:00:00', 'pending'),
(11, 32, 4, 'hola34B', '2015-11-13', '2015-11-04 06:45:19', '0000-00-00 00:00:00', 'pending'),
(12, 33, 0, 'perdida', '2015-11-14', '2015-11-04 06:49:11', '0000-00-00 00:00:00', 'pending'),
(13, 20, 11, 'klasd lkajsdlj ', '2015-11-13', '2015-11-04 09:41:40', '0000-00-00 00:00:00', 'approved'),
(14, 34, 4, 'ok', '2015-11-14', '2015-11-10 02:17:34', '0000-00-00 00:00:00', 'pending'),
(15, 36, 4, 'ok', '2015-11-12', '2015-11-10 02:54:23', '0000-00-00 00:00:00', 'approved'),
(16, 16, 4, 'I like.', '2015-11-20', '2015-11-10 02:58:39', '0000-00-00 00:00:00', 'approved'),
(17, 37, 4, 'Testing process manager role', '2015-11-13', '2015-11-10 05:24:04', '0000-00-00 00:00:00', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categoryID` int(11) NOT NULL,
  `categoryName` varchar(64) NOT NULL,
  `categoryDescription` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `commentID` int(11) NOT NULL,
  `datestamp` datetime NOT NULL,
  `commentText` varchar(256) NOT NULL,
  `userID` int(11) NOT NULL,
  `movieID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `membership`
--

CREATE TABLE `membership` (
  `membershipID` int(10) NOT NULL,
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
  `update_datestamp` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `membership`
--

INSERT INTO `membership` (`membershipID`, `first_name`, `last_name`, `number_street`, `name_street`, `suburb`, `postcode`, `country`, `number_phone`, `number_mobile`, `email`, `gender`, `newsletter`, `join_datestamp`, `image`, `unit_address`, `state`, `filelog`, `update_datestamp`) VALUES
(1, 'Jorge', 'Rodriguez', 3, '3/38 Wellington St.', 'Brisbane', 4151, 'Australia', 0, 0, 'jfbernal@gmail.com', '', '', '2015-10-28 09:01:20', '', 0, 'Queensland', '(Error Code:4)', '0000-00-00 00:00:00'),
(2, 'Jorge', 'Rodriguez', 3, '3/38 Wellington St.', 'Brisbane', 4151, 'Australia', 0, 0, 'jfbernal@gmail.com', '', '', '2015-10-28 09:03:41', './unloads/p1.jpg', 0, 'Queensland', 'File already exists. Please upload another file.', '0000-00-00 00:00:00'),
(3, 'Jorge', 'Rodriguez', 3, '3/38 Wellington St.', 'Brisbane', 4151, 'Australia', 0, 0, 'jfbernal@gmail.com', '', '', '2015-10-28 09:06:37', '', 0, 'Queensland', '(Error Code:4)', '0000-00-00 00:00:00'),
(4, 'Jorge', 'Rodriguez', 3, '3/38 Wellington St.', 'Brisbane', 4151, 'Australia', 0, 0, 'jfbernal@gmail.com', 'male', '', '2015-10-28 09:10:13', '../unloads/p3.jpg', 0, 'Queensland', 'File already exists. Please upload another file.', '0000-00-00 00:00:00'),
(5, 'Jorge', 'Rodriguez', 3, 'Wellington St.', 'Brisbane', 4151, 'Australia', 0, 0, 'jfbernal@gmail.com', '', '', '2015-10-29 07:00:15', '', 0, 'Queensland', '(Error Code:4)', '0000-00-00 00:00:00'),
(6, '', '', 0, '', '', 0, '', 0, 0, '', '', '', '2015-10-30 06:55:57', '', 0, '', '(Error Code:)', '0000-00-00 00:00:00'),
(7, 'Jorge', 'Bernal', 3, 'Wellington St.', 'Brisbane', 4151, 'Australia', 0, 0, 'jfbernal@gmail.com', 'male', 'yes', '2015-10-30 03:30:03', './unloads/p1.jpg', 0, 'Queensland', 'File already exists. Please upload another file.', '0000-00-00 00:00:00'),
(8, 'Jorge', 'Rodriguez', 3, '3/38 Wellington St.', 'Brisbane', 4151, 'Australia', 0, 0, 'jfbernal@gmail.com', 'male', 'yes', '2015-10-30 03:43:02', './unloads/p2.jpg', 0, 'Queensland', 'File already exists. Please upload another file.', '0000-00-00 00:00:00'),
(9, 'Jorge', 'Rodriguez', 2, '3/38 Wellington St.', 'Brisbane', 4151, 'Australia', 0, 0, 'jfbernal@gmail.com', '', '', '2015-10-30 03:45:26', '', 0, 'Queensland', '(Error Code:4)', '0000-00-00 00:00:00'),
(10, 'Jorge', 'Rodriguez', 3, '3/38 Wellington St.', 'Brisbane', 4151, 'Australia', 0, 0, 'jfbernal@gmail.com', 'male', 'yes', '2015-10-30 03:46:52', './unloads/p1.jpg', 0, 'Queensland', 'File already exists. Please upload another file.', '0000-00-00 00:00:00'),
(11, 'Jorge', 'Rodriguez', 3, '3/38 Wellington St.', 'Brisbane', 4151, 'Australia', 0, 0, 'jfbernal@gmail.com', 'male', 'yes', '2015-10-30 03:49:27', './unloads/p1.jpg', 0, 'Queensland', 'File already exists. Please upload another file.', '0000-00-00 00:00:00'),
(12, 'Jorge', 'Rodriguez', 3, '3/38 Wellington St.', 'Brisbane', 4151, 'Australia', 422134523, 422134523, 'jfbernal@gmail.com', 'male', '', '2015-10-31 02:08:29', '../unloads/p1.jpg', 0, 'Queensland', '(Error Code:4)', '2015-11-04 02:06:04'),
(13, 'Jorge', 'Rodriguez', 23, '3/38 Wellington St.', 'Brisbane', 4151, 'Australia', 0, 0, 'jfbernal@gmail.com', '', '', '2015-10-31 02:09:26', '', 0, 'Queensland', '(Error Code:4)', '0000-00-00 00:00:00'),
(14, 'Jorge', 'Rodriguez', 3, '3/38 Wellington St.', 'Brisbane', 4151, 'Australia', 422153225, 422153225, 'jfbernal@gmail.com', 'male', '', '2015-10-31 02:10:02', '../unloads/p1.jpg', 0, 'Queensland', '(Error Code:4)', '2015-11-04 02:11:42'),
(15, 'Jorge', 'Rodriguez', 3, '3/38 Wellington St.', 'Brisbane', 4151, 'Australia', 0, 0, 'jfbernal@gmail.com', '', '', '2015-10-31 02:10:38', '', 0, 'Queensland', '(Error Code:4)', '0000-00-00 00:00:00'),
(16, 'Jorge', 'Rodriguez', 3, '3/38 Wellington St.', 'Brisbane', 4151, 'Australia', 422153225, 422153225, 'jfbernal@gmail.com', 'male', '', '2015-10-31 02:11:24', '../unloads/p3.jpg', 0, 'Queensland', '(Error Code:4)', '2015-11-03 02:23:29'),
(17, 'Jorge', 'Rodriguez', 3, '3/38 Wellington St.', 'Brisbane', 4151, 'Australia', 0, 0, 'jfbernal@gmail.com', 'male', '', '2015-11-03 11:05:15', './unloads/p1.jpg', 0, 'Queensland', 'The file was not uploaded successfully.', '0000-00-00 00:00:00'),
(18, 'Jorge', 'Rodriguez', 3, '3/38 Wellington St.', 'Brisbane', 4151, 'Australia', 422153225, 422153225, 'jfbernal@gmail.com', 'male', '', '2015-11-03 02:29:29', '../unloads/p1.jpg', 0, 'Queensland', 'File already exists. Please upload another file.', '0000-00-00 00:00:00'),
(19, 'Jorge3', 'Rodriguez', 3, '3/38 Wellington St.', 'Brisbane', 4151, 'Australia', 422153225, 422153225, 'jfbernal@gmail.com', 'male', '', '2015-11-03 02:36:00', '../unloads/p3.jpg', 0, 'Queensland', 'File already exists. Please upload another file.', '2015-11-04 03:37:19'),
(20, 'Jorgee', 'Rodriguez', 3, '3/38 Wellington St.', 'Brisbane', 4151, 'Australia', 234234324, 2147483647, 'jfbernal@gmail.com', 'male', '', '2015-11-03 02:41:24', '../unloads/p1.jpg', 0, 'Queensland', 'File already exists. Please upload another file.', '2015-11-03 02:41:54'),
(21, 'Jorge', 'Rodriguez', 3, '3/38 Wellington St.', 'Brisbane', 4151, 'Australia', 0, 0, 'jfbernal@gmail.com', '', '', '2015-11-03 02:43:45', '../unloads/p1.jpg', 0, 'Queensland', 'File already exists. Please upload another file.', '0000-00-00 00:00:00'),
(22, 'Jorge', 'Rodriguez', 3, '3/38 Wellington St.', 'Brisbane', 4151, 'Australia', 0, 0, 'jfbernal@gmail.com', '', '', '2015-11-03 02:52:08', '', 0, 'Queensland', '(Error Code:4)', '0000-00-00 00:00:00'),
(23, 'Jorge', 'Rodriguez', 3, '3/38 Wellington St.', 'Brisbane', 4151, 'Australia', 422153225, 422153225, 'jfbernal@gmail.com', 'male', '', '2015-11-03 03:04:44', '../unloads/p1.jpg', 0, 'Queensland', '(Error Code:4)', '2015-11-04 01:11:10'),
(24, 'Jorge', 'Rodriguez', 3, '3/38 Wellington St.', 'Brisbane', 4151, 'Australia', 0, 0, 'jfbernal@gmail.com', '', '', '2015-11-04 05:44:43', '', 0, 'Queensland', '(Error Code:4)', '0000-00-00 00:00:00'),
(25, 'Jorge', 'Rodriguez', 3, '3/38 Wellington St.', 'Brisbane', 4151, 'Australia', 0, 0, 'jfbernal@gmail.com', '', '', '2015-11-04 06:04:33', '', 0, 'Queensland', '(Error Code:4)', '0000-00-00 00:00:00'),
(26, 'Jorge', 'Rodriguez', 3, '3/38 Wellington St.', 'Brisbane', 4151, 'Australia', 0, 0, 'jfbernal@gmail.com', '', '', '2015-11-04 06:30:45', '', 0, 'Queensland', '(Error Code:4)', '0000-00-00 00:00:00'),
(27, 'Jorge', 'Rodriguez', 3, '3/38 Wellington St.', 'Brisbane', 4151, 'Australia', 0, 0, 'jfbernal@gmail.com', '', '', '2015-11-04 06:33:32', '', 0, 'Queensland', '(Error Code:4)', '0000-00-00 00:00:00'),
(28, 'Jorge', 'Rodriguez', 3, '3/38 Wellington St.', 'Brisbane', 4151, 'Australia', 0, 0, 'jfbernal@gmail.com', '', '', '2015-11-04 06:44:07', '', 0, 'Queensland', '(Error Code:4)', '0000-00-00 00:00:00'),
(29, 'Jorge', 'Rodriguez', 3, '3/38 Wellington St.', 'Brisbane', 4151, 'Australia', 0, 0, 'jfbernal@gmail.com', '', '', '2015-11-04 06:48:18', '', 0, 'Queensland', '(Error Code:4)', '0000-00-00 00:00:00'),
(30, 'Jorge', 'Rodriguez', 3, '3/38 Wellington St.', 'Brisbane', 4151, 'Australia', 422153225, 422153225, 'jfbernal@gmail.com', 'male', '', '2015-11-09 04:07:00', '../unloads/p1.jpg', 0, 'Queensland', '(Error Code:4)', '2015-11-10 02:25:49'),
(31, 'Jorge', 'Rodriguez', 3, '3/38 Wellington St.', 'Brisbane', 4151, 'Australia', 0, 0, 'jfbernal@gmail.com', '', '', '2015-11-09 04:09:33', '', 0, 'Queensland', '(Error Code:4)', '0000-00-00 00:00:00'),
(32, 'Jorge', 'Rodriguez', 3, '3/38 Wellington St.', 'Brisbane', 4151, 'Australia', 0, 0, 'jfbernal@gmail.com', '', '', '2015-11-10 02:54:14', '', 0, 'Queensland', '(Error Code:4)', '0000-00-00 00:00:00'),
(33, 'Jorge', 'Rodriguez', 3, '3/38 Wellington St.', 'Brisbane', 4151, 'Australia', 0, 0, 'jfbernal@gmail.com', '', '', '2015-11-10 05:23:39', '', 0, 'Queensland', '(Error Code:4)', '0000-00-00 00:00:00'),
(34, 'Jorge', 'Rodriguez', 3, '3/38 Wellington St.', 'Brisbane', 4151, 'Australia', 0, 0, 'jfbernal@gmail.com', '', '', '2015-11-10 10:11:23', '', 0, 'Queensland', '(Error Code:4)', '0000-00-00 00:00:00'),
(35, 'Jorge', 'Rodriguez', 3, '3/38 Wellington St.', 'Brisbane', 4151, 'Australia', 0, 0, 'jfbernal@gmail.com', '', '', '2015-11-10 10:46:47', '', 0, 'Queensland', '(Error Code:4)', '0000-00-00 00:00:00'),
(36, 'Jorge', 'Rodriguez', 3, '3/38 Wellington St.', 'Brisbane', 4151, 'Australia', 0, 0, 'jfbernal@gmail.com', '', '', '2015-11-10 10:47:49', '', 0, 'Queensland', '(Error Code:4)', '0000-00-00 00:00:00'),
(37, 'Jorge', 'Rodriguez', 3, '3/38 Wellington St.', 'Brisbane', 4151, 'Australia', 0, 0, 'jfbernal@gmail.com', '', '', '2015-11-10 10:49:19', '', 0, 'Queensland', '(Error Code:4)', '0000-00-00 00:00:00'),
(38, 'Jorge', 'Rodriguez', 3, '3/38 Wellington St.', 'Brisbane', 4151, 'Australia', 0, 0, 'jfbernal@gmail.com', '', '', '2015-11-10 10:51:25', '', 0, 'Queensland', '(Error Code:4)', '0000-00-00 00:00:00'),
(39, 'Jorge', 'Rodriguez', 3, '3/38 Wellington St.', 'Brisbane', 4151, 'Australia', 0, 0, 'jfbernal@gmail.com', '', '', '2015-11-10 11:54:29', '', 0, 'Queensland', '(Error Code:4)', '0000-00-00 00:00:00'),
(40, 'Jorge', 'Rodriguez', 3, '3/38 Wellington St.', 'Brisbane', 4151, 'Australia', 0, 0, 'jfbernal@gmail.com', '', '', '2015-11-10 11:56:55', '', 0, 'Queensland', '(Error Code:4)', '0000-00-00 00:00:00'),
(41, 'Jorge', 'Rodriguez', 3, '3/38 Wellington St.', 'Brisbane', 4151, 'Australia', 0, 0, 'jfbernal@gmail.com', '', '', '2015-11-10 12:02:16', '', 0, 'Queensland', '(Error Code:4)', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `movieID` int(11) NOT NULL,
  `movieTitle` varchar(64) NOT NULL,
  `categoryID` int(11) NOT NULL,
  `PlotSummary` varchar(1000) NOT NULL,
  `coverimage` varchar(64) NOT NULL,
  `releasedate` date NOT NULL,
  `datetimestamp` datetime NOT NULL,
  `filelog` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `reviewID` int(11) NOT NULL,
  `reviewContent` varchar(256) NOT NULL,
  `datestamp` datetime NOT NULL,
  `rating` int(11) NOT NULL,
  `reviewImage` varchar(64) NOT NULL,
  `userID` int(11) NOT NULL,
  `movieID` int(11) NOT NULL,
  `TitleReview` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `storeID` int(11) NOT NULL,
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
  `franchise_available` varchar(32) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`storeID`, `namestore`, `unit`, `streetnumber`, `streetname`, `suburb`, `state`, `postcode`, `website`, `email`, `phone1`, `phone2`, `join_datestamp`, `update_datestamp`, `img_path`, `store_description`, `store_status`, `franchise_available`) VALUES
(1, 'Brisbane', 0, 2, '2', 'Brisbane', 'QLD', 4151, 'www.google.com', 'jfbernal@gmail.com', 23424, 234234, '2015-10-28 11:31:31', '2015-11-02 09:53:54', '../unloads/brisbane_store.png', '', 'open', 'yes'),
(2, 'Carina', 0, 3, '3', 'Carina', 'QLD', 4001, 'www.carinastore.com', 'carina@gmail.com', 98098234, 98098234, '2015-10-28 02:40:32', '2015-11-02 09:19:23', '../unloads/carina_store.png', 'For something truly special, book a booth for Afternoon Tea: a delicious indulgence of sweet and savoury treats that will create a memorable occasion whatever youï¿½re celebrating. In fact, Afternoon Tea creates an elegant backdrop for chic henï¿½s parties, baby showers or birthday celebrations for every age. Afternoon Tea is available at from 11.30am daily.', 'open', 'yes'),
(3, 'Garden City', 0, 2, 'Garden City', 'Garden City', 'QLD', 4100, 'www.coffe.com', 'cafe@gmail.com', 123123123, 123123123, '2015-10-30 03:45:35', '2015-10-30 03:45:35', '../unloads/general_store.png', 'Whether your preferences lie with coffee or with tea, there is nothing quite as wonderful as sinking into a Shingle Inn booth with your favourite drink, great company and a few precious moments of spare time.\r\n\r\nAt Shingle Inn, we passionately believe every coffee we serve should be a great coffee, whether youâ€™re an espresso aficionado, love your daily flat white or like your latte sweetened with a shot of syrup.\r\n\r\nA great coffee starts with great beans, perfectly extracted by expertly trained baristas. Our exclusive Shingle Inn coffee beans are single-origin roasted to ensure we get the best flavour from each bean, delivering a medium roast blend with full bodied, rich flavours, a lively sweetness & medium acidity.', '', ''),
(4, 'Townsville2', 0, 3, '3', 'Townsville', 'QLD', 4001, 'Townsville.com', 'Townsville@gmail.com', 987928374, 2147483647, '2015-10-30 06:49:28', '2015-11-09 03:31:44', '../unloads/general_store.png', 'The Shingle Inn experience starts the moment customers enter our cafes. Luxurious high-back chairs, warm rich colours and decorative lamps together with our signature range of decadent cakes, coffee and delicious menu choices has helped us establish a renowned boutique cafe brand that is well-known for its exceptional customer service. Supported by our proven business system, these elements provide a strong foundation for your success.', 'open', 'no'),
(5, 'Currimundi', 0, 4, 'Currimundi St', 'Currimundi', 'QLD', 3454, 'Currimundi.com', 'Currimundi@gmail.com', 2147483647, 324234234, '2015-10-30 06:51:45', '2015-10-30 06:51:45', '../unloads/general_store.png', 'The Shingle Inn experience starts the moment customers enter our cafes. Luxurious high-back chairs, warm rich colours and decorative lamps together with our signature range of decadent cakes, coffee and delicious menu choices has helped us establish a renowned boutique cafe brand that is well-known for its exceptional customer service. Supported by our proven business system, these elements provide a strong foundation for your success.', 'no_existing', 'yes'),
(6, 'Broadbeach', 0, 45, 'Broadbeach st', 'Broadbeach', 'QLD', 2345, 'Broadbeach.com', 'Broadbeach@Broadbeach.com', 234234234, 2147483647, '2015-10-30 06:52:50', '2015-10-30 06:52:50', '../unloads/general_store.png', 'The Shingle Inn experience starts the moment customers enter our cafes. Luxurious high-back chairs, warm rich colours and decorative lamps together with our signature range of decadent cakes, coffee and delicious menu choices has helped us establish a renowned boutique cafe brand that is well-known for its exceptional customer service. Supported by our proven business system, these elements provide a strong foundation for your success.', 'existing', ''),
(7, 'Robina', 0, 34, 'Robina st', 'Robina', 'QLD', 3456, 'Robina.com', 'Robina@Robina.com', 2147483647, 2147483647, '2015-10-30 06:54:09', '2015-10-30 06:54:09', '../unloads/general_store.png', 'If you share our passion for exceptional customer experiences, join the Shingle Inn family and embrace the tradition that has become part of the quintessential Shingle Inn Cafe experience â€“ itâ€™s the reason a special occasion shared at a Shingle Inn Cafe is carried through from one generation to the next.', 'open', 'yes'),
(8, 'Carina2', 0, 3, '3', 'brisbane', 'QLD', 4341, 'carina.com', 'carina@gmail.com', 422153423, 422153423, '2015-11-04 01:40:49', '2015-11-04 01:44:44', '../unloads/general_store.png', 'Carina Description', 'open', 'yes'),
(9, 'carina4', 0, 3, 'carina4', 'carina4', 'QLD', 2342, 'carina4.com', 'carina4@carina4', 2147483647, 2147483647, '2015-11-04 03:01:40', '2015-11-04 03:01:40', '../unloads/general_store.png', 'descrip 4', 'open', 'yes'),
(10, 'Carina6', 0, 3, '3', 'Carina5', 'QLD', 2342, 'Carina5', 'Carina5@gmail.com', 422153225, 422153225, '2015-11-04 03:04:46', '2015-11-04 04:06:57', '../unloads/general_store.png', 'Carina5 asd', 'open', 'yes'),
(11, 'Carion10', 0, 3, 'Carion10 St', 'Carion10', 'QLD', 2342, 'Carion10.com', 'Carion10@gmail.com', 238979872, 238979872, '2015-11-04 09:40:03', '2015-11-04 09:40:03', '', 'Carion10Carion10Carion10', 'open', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `salt` varchar(64) NOT NULL,
  `role` varchar(64) NOT NULL,
  `membershipID` int(11) NOT NULL,
  `storeID` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `username`, `password`, `salt`, `role`, `membershipID`, `storeID`) VALUES
(5, '', '$2y$10$HpspnxV5ZbXEZqqQ/d4aheRoscNJPc7rreBqxQ/rLQzXR5BQ6gA32', 'HpspnxV5ZbXEZqqQ/d4ahm2Oc6lehg==', '', 1, 0),
(6, 'user4', '$2y$10$jWzWVxiKQMfVuuQMx7cwsej6bZLA5w5RCEvZYPNo7AhptTLFqRrXG', 'jWzWVxiKQMfVuuQMx7cwsnxHvcq5Zg==', 'member', 2, 0),
(7, 'user5', '$2y$10$m7y3DM0mkVPDnCSnCjnBge76O32ZX8B9vA/nDmzWnGuQs0yM1GBZS', 'm7y3DM0mkVPDnCSnCjnBgfWz/gEUFw==', 'member', 3, 0),
(8, 'admin', '$2y$10$4FNGBe293gw0.SFd91QhCuD/het823DvvDE9HKN1s1mKVuJCuTBMW', '4FNGBe293gw0.SFd91QhC4wmfrcluw==', 'administrator', 4, 7),
(9, 'user1', '$2y$10$iX.YzMY.iwJ1S44XDwudE.kc5cgYqbZuENOWs2eMBpeHDASVsBrhW', 'iX.YzMY.iwJ1S44XDwudEAnwyN5UEA==', 'member', 5, 0),
(10, '', '$2y$10$Dxy62mme.m/EXh5hoFMANOBHkMbnbmF6rRQ1ayppkX7s4WEQXlQSS', 'Dxy62mme.m/EXh5hoFMANWAp9p73RQ==', '', 6, 0),
(11, 'director5', '$2y$10$BrD91Ze7HoEXGwZb0v.1eeBmA9/nbYou/niAiea2rsDV9OEgbXzo2', 'BrD91Ze7HoEXGwZb0v.1esD9JG.vXw==', 'administrator', 7, 0),
(12, 'director2', '$2y$10$SxH1fBTtO2C.af3xtzxf3OJ6jxUduUyG97GAqUNIPbJzO20hQbfF6', 'SxH1fBTtO2C.af3xtzxf3QZ4PG4hGA==', 'administrator', 8, 0),
(13, 'director3', '$2y$10$0Ckcws3PGKhnNhBTnVUK1Okpnm8mmAIx/UhhBSjOFzLQHMUutHKRq', '0Ckcws3PGKhnNhBTnVUK1Ot9gCGfgw==', 'member', 9, 0),
(14, 'user3', '$2y$10$Gq3TsfvdmdUumTLMDKM8wev595ixoBP5PGXMwCBcMKpRSqNokA/De', 'Gq3TsfvdmdUumTLMDKM8wjzJusU1CA==', 'administrator', 10, 0),
(15, 'user10', '$2y$10$F4LdyuClZpjaAmF9ife/l.3GxF6I/hXZQhEiT2lXGNiE1dxmFY4aa', 'F4LdyuClZpjaAmF9ife/lCcRHiPFVA==', 'administrator', 11, 0),
(16, 'registered', '$2y$10$x9u0wliWZlqnYPrxu6DPBeTZ.x5j2pxqw2kNRBLrid4Guf8MJKMw.', 'x9u0wliWZlqnYPrxu6DPBoWmC5Ru0g==', 'registered', 12, 4),
(17, 'staff', '$2y$10$LhNdxxCHjT2wY/7YulBO.OlPq17y9/E988M13LaZJG4HgvHRfLnU.', 'LhNdxxCHjT2wY/7YulBO.V/rh9sl7Q==', 'staff', 13, 0),
(18, 'manager', '$2y$10$UizNb8zUOB7iHvRWgV43LOGerTRnnOM0wivpoj7IZ935FIGKoh0be', 'UizNb8zUOB7iHvRWgV43LR6z8OmC9Q==', 'manager', 14, 0),
(19, 'leader', '$2y$10$DIY825XKrLwddTrjFsfLEuUsqOWlV1fvyDssZL1IVQ4wI9x.puuXe', 'DIY825XKrLwddTrjFsfLEzhARXSKjQ==', 'leader', 15, 0),
(20, 'director', '$2y$10$RoocpaElh05b2zQ0PUOAgexXj0jkasEs38oOw75Oxcez71.hBzvha', 'RoocpaElh05b2zQ0PUOAgofXXyCZ4g==', 'director', 16, 11),
(21, '', '$2y$10$L8.IMmPEZKL/aaQy.0.3FOFSLvvSH9F6E8gFFfpJtvHJ.f/r3rQhe', 'L8.IMmPEZKL/aaQy.0.3FW843nml7A==', '', 17, 0),
(22, '', '$2y$10$WPbVDpZ8EDDPxP1Nvj6iWeqpLUXWgjeizEZ788uZuVryFU5uqnK0C', 'WPbVDpZ8EDDPxP1Nvj6iWjt3FIGX0A==', '', 18, 0),
(23, 'user22', '$2y$10$O5j6jPxLqAJwmX/oIRuyU.b061MMAXr0dE2JqhJ.cj/UQHbOVoRau', 'O5j6jPxLqAJwmX/oIRuyULAfSlYSlw==', 'administrator', 19, 0),
(24, 'user23', '$2y$10$OkiaqYTFTW/M5oMNP2hTqulqI6C3QTlaUrzAL2CzmZXZPCfPbc9Pe', 'OkiaqYTFTW/M5oMNP2hTq24m0Du5Vg==', 'member', 20, 0),
(25, 'user24', '$2y$10$7OkZ9/eDQVXIrS9iZUKLteiS31dQVIm0LRpsNgltJdaDzr1Ty8PeK', '7OkZ9/eDQVXIrS9iZUKLtg30iZ0iuQ==', 'member', 21, 0),
(26, 'user25', '$2y$10$9KHeAUOzvoSIgxZtIvPJZOaMkQ8z0wxB0DbIiaa9EEkS7BcM9CWGW', '9KHeAUOzvoSIgxZtIvPJZcPgHgENgw==', 'member', 22, 0),
(27, 'user26', '$2y$10$srLTQg4CZZ5ArUINMeTNx.7SdSxfzU4CIddjSAPHkIyDAxMEJZHgO', 'srLTQg4CZZ5ArUINMeTNxJ3Y6Tfdkg==', 'member', 23, 7),
(28, 'user30', '$2y$10$K0hJ3Zy7HCeu3fYAL1IHHeRy2hntcOefVQgCCRJEEVWBAqAzHvEsC', 'K0hJ3Zy7HCeu3fYAL1IHHq5c8J1mhw==', 'member', 24, 0),
(29, 'user31', '$2y$10$3mNsru26YfcezbX8eYQSgu7GX/GEh5rKvaTG5uLEyYY.5gw27WhZi', '3mNsru26YfcezbX8eYQSg3rdqGM83A==', 'member', 25, 0),
(30, 'user32', '$2y$10$SyYMSp.qiBctgpfolGRbTub/.hxphXfT9rAA9JfYf0zXNCkAureDG', 'SyYMSp.qiBctgpfolGRbT9ICbnftfg==', 'member', 26, 0),
(31, 'user33', '$2y$10$wbzPPzMx7BBdm6BLLrJscuaTg4m9Glq/0NY.06B6fvuwwmwUVb3uK', 'wbzPPzMx7BBdm6BLLrJscwqxrhYEAg==', 'member', 27, 0),
(32, 'user35', '$2y$10$0CsHCkK0NsJjHXM9itJvDu2mYi1sYm6Nj9jEAwSgSiYtuEN1sdS1u', '0CsHCkK0NsJjHXM9itJvD8Z/iStKvg==', 'member', 28, 0),
(33, 'user36', '$2y$10$pBmqcRyTOPWG4vMH0j/vf.zzOGQkP6B6k5mwhV./2ARPgloDM0Wm2', 'pBmqcRyTOPWG4vMH0j/vfEl8vJ/PbA==', 'member', 29, 0),
(34, 'user41', '$2y$10$HrBV87eSOPg3WtDVflFf6OpOyMT71JbO9P5dbEI9uECFkDPq20.vq', 'HrBV87eSOPg3WtDVflFf6YI6/5PVNA==', 'member', 30, NULL),
(35, '', '$2y$10$UD1yOC3KS32ZSUWkn.KtkOOnrJTbsgLQHDrZTP3bPNRifDjZbDfBm', 'UD1yOC3KS32ZSUWkn.KtkOEcovBePA==', '', 31, NULL),
(36, 'user50', '$2y$10$AQx2nD4c5lA9cz19EnvHZOrZCYOc7GK/xCZwwMnwXF73uc.MNWDva', 'AQx2nD4c5lA9cz19EnvHZRTTj4RVLA==', 'member', 32, 4),
(37, 'user51', '$2y$10$RUJClyYj8vfcH.B6qzsGV.OvDQ20qHcMfQlAnr7hIPVct3XsT/xSu', 'RUJClyYj8vfcH.B6qzsGVEk/sGTZDQ==', 'manager', 33, 4),
(38, 'staff1', '$2y$10$Tj9LI5F96OxnFkCqyU3se.OI8qstqB9Q3DaAfKaDnslE6doEpnDOy', 'Tj9LI5F96OxnFkCqyU3seFFdQpNQ1Q==', 'staff', 34, NULL),
(39, 'staff2', '$2y$10$9PG3qY7kB7x8JdRWwLiczOVrJXWFHvCVJmMIliOiE0GgeufUSXkxe', '9PG3qY7kB7x8JdRWwLiczOj9mEZRTg==', 'staff', 41, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`applicationID`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`commentID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `movieID` (`movieID`);

--
-- Indexes for table `membership`
--
ALTER TABLE `membership`
  ADD PRIMARY KEY (`membershipID`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`movieID`),
  ADD KEY `categoryID` (`categoryID`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`reviewID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `movieID` (`movieID`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`storeID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD KEY `membershipID` (`membershipID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `applicationID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `commentID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `membership`
--
ALTER TABLE `membership`
  MODIFY `membershipID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `movieID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `reviewID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `storeID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`movieID`) REFERENCES `movies` (`movieID`);

--
-- Constraints for table `movies`
--
ALTER TABLE `movies`
  ADD CONSTRAINT `movies_ibfk_1` FOREIGN KEY (`categoryID`) REFERENCES `categories` (`categoryID`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`movieID`) REFERENCES `movies` (`movieID`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`membershipID`) REFERENCES `membership` (`membershipID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2019 at 06:42 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cs3320`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `userId` varchar(50) NOT NULL,
  `orderNumber` varchar(50) NOT NULL,
  `productId` varchar(50) NOT NULL,
  `quantity` int(50) NOT NULL,
  `totalPrice` decimal(50,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`userId`, `orderNumber`, `productId`, `quantity`, `totalPrice`) VALUES
('01', '1001', '100', 1, '0.50');

-- --------------------------------------------------------

--
-- Table structure for table `paymentinformation`
--

CREATE TABLE `paymentinformation` (
  `userId` varchar(50) NOT NULL,
  `cardType` varchar(50) NOT NULL,
  `CardNumber` int(50) NOT NULL,
  `expDate` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paymentinformation`
--

INSERT INTO `paymentinformation` (`userId`, `cardType`, `CardNumber`, `expDate`) VALUES
('01', 'Visa', 1, '01/21');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productId` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `unitPrice` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productId`, `description`, `unitPrice`) VALUES
('110', 'Bananas', '.50'),
('110', 'Peaches', '.60'),
('120', 'Apple', '.70'),
('130', 'Love', '10.00');

-- --------------------------------------------------------

--
-- Table structure for table `shippinginformation`
--

CREATE TABLE `shippinginformation` (
  `userId` varchar(50) NOT NULL,
  `address1` varchar(50) NOT NULL,
  `address2` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `zip` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shippinginformation`
--

INSERT INTO `shippinginformation` (`userId`, `address1`, `address2`, `city`, `state`, `zip`) VALUES
('01', '512 Example Ave', 'Apt 246', 'San Marcos', 'Texas', '78666');

-- --------------------------------------------------------

--
-- Table structure for table `usercredentials`
--

CREATE TABLE `usercredentials` (
  `userId` varchar(50) NOT NULL,
  `userName` char(50) NOT NULL,
  `pass` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usercredentials`
--

INSERT INTO `usercredentials` (`userId`, `userName`, `pass`) VALUES
('01', 'admin', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `userinformation`
--

CREATE TABLE `userinformation` (
  `userId` varchar(50) NOT NULL,
  `fullName` varchar(50) NOT NULL,
  `address1` varchar(50) NOT NULL,
  `address2` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `zip` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userinformation`
--

INSERT INTO `userinformation` (`userId`, `fullName`, `address1`, `address2`, `city`, `state`, `zip`) VALUES
('01', 'John Doe', '512 Example Ave', 'Apt 246', 'San Marcos', 'Texas', 78666);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2017 at 08:31 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sms`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `id` int(11) NOT NULL,
  `itemname` varchar(40) NOT NULL,
  `price` int(15) NOT NULL,
  `quantity` int(10) NOT NULL,
  `date` date NOT NULL,
  `extra` int(10) NOT NULL,
  `bill` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`id`, `itemname`, `price`, `quantity`, `date`, `extra`, `bill`) VALUES
(1, 'marker', 250, 12, '2017-03-08', 60, 2000),
(2, 'apple', 24, 12, '2017-03-15', 500, 23);

-- --------------------------------------------------------

--
-- Table structure for table `demanditem`
--

CREATE TABLE `demanditem` (
  `did` int(30) NOT NULL,
  `item_id` int(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `date` datetime NOT NULL,
  `status` varchar(20) NOT NULL,
  `notification` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `demanditem`
--

INSERT INTO `demanditem` (`did`, `item_id`, `username`, `date`, `status`, `notification`) VALUES
(1, 2, 'Talha', '2017-01-11 12:03:02', 'Approved', 0),
(2, 7, 'Talha', '2017-01-11 12:27:35', 'Approved', 0),
(3, 12, 'Talha', '2017-01-11 12:27:47', 'Rejected', 0),
(4, 8, 'Talha', '2017-01-15 09:09:20', 'Approved', 0),
(5, 8, 'Talha', '2017-01-15 09:09:20', 'Approved', 0),
(6, 13, 'Talha', '2017-01-15 09:11:00', 'Pending', 0),
(7, 8, 'Awais', '2017-01-15 11:48:32', 'Pending', 0),
(8, 2, 'Faisal', '2017-01-16 11:58:58', 'Approved', 0),
(9, 8, 'Awais', '2017-01-16 02:22:22', 'Pending', 0),
(10, 7, 'Awais', '2017-01-17 10:46:02', 'Pending', 0),
(11, 2, 'Awais', '2017-03-27 10:50:34', 'Pending', 0),
(12, 6, 'Awais', '2017-03-27 10:51:09', 'Pending', 0),
(13, 2, 'Khan', '2017-03-27 10:54:49', 'Rejected', 3),
(14, 6, 'Khan', '2017-03-27 10:54:57', 'Pending', 1);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(20) NOT NULL,
  `name` varchar(40) NOT NULL,
  `type` varchar(20) NOT NULL,
  `marketPrice` int(11) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `type`, `marketPrice`, `stock`) VALUES
(2, 'Laptop', 'non-consumable', 20000, 4),
(6, 'Phone', 'Consumable', 10000, 0),
(7, 'Cell Phone', 'non-consumable', 15000, 6),
(8, 'Ink Bottle', 'consumable', 30, 4),
(9, 'Pen', 'consumable', 40, 6),
(10, 'Chair', 'non-consumable', 5000, 6),
(11, 'Tishu Paper', 'consumable', 50, 6),
(12, 'Eraser', 'consumable', 10, 6),
(13, 'Note Book', 'consumable', 70, 6),
(14, 'Computer', 'non-consumable', 13000, 6),
(15, 'One Piece', 'consumable', 200, 6),
(16, 'asdfghjkl', 'consumable', 456, 6),
(17, 'asdfghjkldfadfds', 'consumable', 456, 6),
(18, 'po', 'consumable', 10, 6),
(19, 'cbfhdhd', 'consumable', 23423, 6),
(20, 'sdf', 'consumable', 34, 0);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `time` datetime NOT NULL,
  `type` varchar(20) NOT NULL,
  `iid` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `status`, `time`, `type`, `iid`) VALUES
(9, 0, '2017-03-27 10:50:34', 'Warning', 2),
(10, 0, '2017-03-27 10:51:09', 'Critical', 6),
(11, 1, '2017-03-27 10:54:49', 'Warning', 2),
(12, 1, '2017-03-27 10:54:57', 'Critical', 6);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `designation` varchar(30) NOT NULL,
  `privileges` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `email`, `designation`, `privileges`) VALUES
('Awais', '1234', 'awaism551@gmail.com', 'Teacher', '1,1,1,1,1,1,1,1'),
('Khan', '1234', 'hgbhg@mbm.com', 'Pro', '1,1,0,0,0,0,0,0');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` int(5) NOT NULL,
  `name` varchar(40) NOT NULL,
  `companyName` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phoneNumber` int(15) NOT NULL,
  `productTheySell` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `name`, `companyName`, `email`, `phoneNumber`, `productTheySell`) VALUES
(4, 'akash', 'lg', 'akash@gmail.com', 123456, 'tissues'),
(6, 'haider', 'haider', 'haider@gmail.com', 741258963, 'bags and pens');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `demanditem`
--
ALTER TABLE `demanditem`
  ADD PRIMARY KEY (`did`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `user_id` (`username`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `demanditem`
--
ALTER TABLE `demanditem`
  MODIFY `did` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

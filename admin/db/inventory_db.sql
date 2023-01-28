-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2017 at 11:08 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `product_tb`
--

CREATE TABLE `product_tb` (
  `pid` int(11) NOT NULL,
  `pcode` varchar(50) DEFAULT NULL,
  `pname` varchar(250) DEFAULT NULL,
  `stock_status` int(11) DEFAULT NULL,
  `pimg` varchar(150) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `date_added` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_tb`
--

INSERT INTO `product_tb` (`pid`, `pcode`, `pname`, `stock_status`, `pimg`, `description`, `date_added`) VALUES
(1, 'P001', 'ASUS', 1, NULL, 'test', '2017-07-12'),
(2, 'P002', 'DELL', 1, NULL, 'Test Insert Stock Dell', '2017-07-12'),
(3, 'P003', 'ACER', 2, NULL, 'ACER Inserted Successful', '2017-07-12'),
(4, 'P004', 'HP', 1, NULL, 'HP Computer Product', '2017-07-12'),
(5, 'P005', 'TOSHIBA', 2, NULL, 'Test With Toshiba brand', '2017-07-12'),
(6, 'P006', 'Scanner HP', 1, '53851football.jpg', 'Test with images', '2017-07-18'),
(7, 'P007', 'Printer Laser Jet 1019', 1, '16200test.png', 'Printer', '2017-07-18');

-- --------------------------------------------------------

--
-- Table structure for table `stock_status_tb`
--

CREATE TABLE `stock_status_tb` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `detail` varchar(500) DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stock_status_tb`
--

INSERT INTO `stock_status_tb` (`id`, `name`, `detail`, `active`) VALUES
(1, 'In Stock', 'Product in stock', 1),
(2, 'Out Stock', 'Product out of stock', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_tb`
--

CREATE TABLE `student_tb` (
  `sid` int(11) NOT NULL,
  `Stu_id` varchar(10) DEFAULT NULL,
  `sname` varchar(100) DEFAULT NULL,
  `sphoto` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product_tb`
--
ALTER TABLE `product_tb`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `stock_status_tb`
--
ALTER TABLE `stock_status_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_tb`
--
ALTER TABLE `student_tb`
  ADD PRIMARY KEY (`sid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product_tb`
--
ALTER TABLE `product_tb`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `stock_status_tb`
--
ALTER TABLE `stock_status_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `student_tb`
--
ALTER TABLE `student_tb`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

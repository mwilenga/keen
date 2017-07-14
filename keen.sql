-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2017 at 02:30 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `keen`
--

-- --------------------------------------------------------

--
-- Table structure for table `tms_customer`
--

CREATE TABLE `tms_customer` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(30) NOT NULL,
  `contact` varchar(30) NOT NULL,
  `location` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tms_customer`
--

INSERT INTO `tms_customer` (`id`, `customer_name`, `contact`, `location`) VALUES
(1, 'Festus mwilenga', '0786744253', 'Mbeya'),
(2, 'Julis mwakajeba', '0716810817', 'DSM'),
(3, 'Victoria stations', '255766997745', 'Tabata - DSM');

-- --------------------------------------------------------

--
-- Table structure for table `tms_customers`
--

CREATE TABLE `tms_customers` (
  `id` int(11) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `location` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tms_customers`
--

INSERT INTO `tms_customers` (`id`, `fname`, `lname`, `email`, `password`, `phone`, `location`) VALUES
(1, 'Festus', 'Flowin', 'festusflowin@gmail.com', 'Mwanile93', '', ''),
(2, 'Festus', 'Flowin', 'festusflowin@gmail.com', '12345', '', ''),
(3, 'Addy', 'Eddy', 'addy@gmail.com', 'festaddy', '', ''),
(4, 'Konyo', 'Coder', 'konyo@gmail.com', '1234', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tms_expenses`
--

CREATE TABLE `tms_expenses` (
  `id` int(11) NOT NULL,
  `item` varchar(30) NOT NULL,
  `qnty` int(11) NOT NULL,
  `cost` int(11) NOT NULL,
  `date` date NOT NULL,
  `month` varchar(30) NOT NULL,
  `year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tms_expenses`
--

INSERT INTO `tms_expenses` (`id`, `item`, `qnty`, `cost`, `date`, `month`, `year`) VALUES
(11, 'KEYBOARD', 4, 240000, '2017-05-15', '04', 2017),
(12, 'MOTHERBOARD', 20, 2800000, '2017-05-15', '05', 2017),
(16, 'DELL EXTERNAL DRIVE ', 3, 120000, '2017-05-19', '03', 2017),
(17, 'HP DESKTOP', 5, 1700000, '2017-05-19', '03', 2017),
(18, 'DELL DESKTOP ', 10, 3500000, '2017-05-19', '04', 2017),
(19, 'PRINTER', 4, 1200000, '2017-05-19', '04', 2017),
(20, 'EXTERNAL DRIVE', 2, 160000, '2017-05-19', '05', 2017);

-- --------------------------------------------------------

--
-- Table structure for table `tms_feeds`
--

CREATE TABLE `tms_feeds` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `sms` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tms_feeds`
--

INSERT INTO `tms_feeds` (`id`, `name`, `email`, `sms`, `date`) VALUES
(1, 'Festus mwilenga', 'fgh@gmail.com', 'gud services', '2017-05-23'),
(2, 'Konyo', 'konyo@gmail.com', 'Ongeza na online transaction tu keen', '2017-05-23'),
(3, 'Addy Eddie', 'addy@gmail.com', '', '2017-05-23');

-- --------------------------------------------------------

--
-- Table structure for table `tms_income`
--

CREATE TABLE `tms_income` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `price` int(11) NOT NULL,
  `month` varchar(30) NOT NULL,
  `year` int(11) NOT NULL,
  `item` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tms_income`
--

INSERT INTO `tms_income` (`id`, `date`, `price`, `month`, `year`, `item`) VALUES
(3, '2017-05-06', 2000000, '05', 2017, 'T 200 ADC'),
(4, '2017-05-15', 80000, '05', 2017, 'EXTERNAL'),
(5, '2017-05-15', 600000, '05', 2017, 'PRINTER'),
(6, '2017-05-15', 80000, '04', 2017, 'SPANA'),
(7, '2017-05-15', 40000, '03', 2017, 'GEARBOX'),
(8, '2017-05-18', 120000, '04', 2017, 'SPANA'),
(9, '2017-05-19', 800000, '04', 2017, 'DELL DESKTOP '),
(10, '2017-05-20', 680000, '05', 2017, 'PRINTER'),
(11, '2017-05-19', 120000, '03', 2017, 'EXTERNAL DRIVE');

-- --------------------------------------------------------

--
-- Table structure for table `tms_items`
--

CREATE TABLE `tms_items` (
  `id` int(11) NOT NULL,
  `item_name` varchar(30) NOT NULL,
  `qnty` int(11) NOT NULL,
  `o_qnty` int(11) NOT NULL,
  `cost` int(11) NOT NULL,
  `s_price` int(11) NOT NULL,
  `date` date NOT NULL,
  `note` text NOT NULL,
  `received_by` varchar(30) NOT NULL,
  `image` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tms_items`
--

INSERT INTO `tms_items` (`id`, `item_name`, `qnty`, `o_qnty`, `cost`, `s_price`, `date`, `note`, `received_by`, `image`) VALUES
(26, 'DELL EXTERNAL DRIVE ', 3, 3, 40000, 45000, '2017-05-19', '5000gb', '', 'dell_external.jpg'),
(27, 'HP DESKTOP', 5, 5, 340000, 450000, '2017-05-19', '2 ram\r\n4 processor', '', 'desk_hp.jpg'),
(28, 'DELL DESKTOP ', 10, 12, 350000, 370000, '2017-05-19', '2 ram, 4processor', '', 'desk_dell.jpg'),
(29, 'PRINTER', 2, 4, 300000, 340000, '2017-05-19', 'Its new brand printer for printing hard copies material', '', 'printer1.jpg'),
(30, 'EXTERNAL DRIVE', 1, 2, 80000, 120000, '2017-05-19', 'Sumsung\r\n500GB\r\n3.0 USB', '', 'element_external.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tms_item_in_history`
--

CREATE TABLE `tms_item_in_history` (
  `id` int(11) NOT NULL,
  `item_name` varchar(30) NOT NULL,
  `qnty` int(11) NOT NULL,
  `cost` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tms_item_in_history`
--

INSERT INTO `tms_item_in_history` (`id`, `item_name`, `qnty`, `cost`, `date`) VALUES
(1, 'Bonet', 5, 20000, '2017-05-04'),
(2, 'Bonet', 6, 20000, '2017-05-04'),
(3, 'Bonet', 2, 20000, '2017-05-04'),
(4, 'Bonet', 2, 20000, '2017-05-04'),
(5, 'Bonet', 11, 20000, '2017-05-04'),
(7, 'Grille', 5, 400000, '2017-05-04'),
(8, 'TAA ZA NYUMA', 4, 300000, '2017-05-07'),
(9, 'FILTER OIL', 5, 200000, '2017-05-03'),
(10, 'GEARBOX', 6, 20000, '2017-05-06'),
(11, 'GREECE', 10, 20000, '2017-05-06'),
(12, 'OIL ', 4, 150000, '2017-05-07'),
(13, 'TRUCK BOLT', 4, 100000, '2017-05-07'),
(14, 'TRUCK BOLT', 4, 100000, '2017-05-07'),
(15, 'TRUCK BOLT', 5, 100000, '2017-05-07'),
(16, 'FILTER OIL', 3, 200000, '2017-05-08'),
(17, 'SPANA', 10, 40000, '2017-05-18'),
(18, 'PRINTER', 4, 1200000, '2017-05-19'),
(19, 'EXTERNAL DRIVE', 2, 160000, '2017-05-19');

-- --------------------------------------------------------

--
-- Table structure for table `tms_orders`
--

CREATE TABLE `tms_orders` (
  `id` int(11) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `product` varchar(30) NOT NULL,
  `prod_id` varchar(30) NOT NULL,
  `qty` int(11) NOT NULL,
  `costi` int(11) NOT NULL,
  `location` varchar(30) NOT NULL,
  `contact` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `month` varchar(10) NOT NULL,
  `year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tms_orders`
--

INSERT INTO `tms_orders` (`id`, `fname`, `lname`, `product`, `prod_id`, `qty`, `costi`, `location`, `contact`, `date`, `month`, `year`) VALUES
(3, 'Festus', 'Flowin', 'PRINTER', '29', 1, 340000, 'Dar', '0654231423', '2017-05-21', '05', 2017),
(4, 'Festus', 'Flowin', 'DELL DESKTOP ', '28', 1, 370000, '', '', '2017-05-22', '05', 2017),
(5, 'Festus', 'Flowin', 'DELL EXTERNAL DRIVE ', '26', 1, 45000, 'Dar', '0654231423', '2017-05-22', '04', 2017),
(6, 'Konyo', 'Coder', 'DELL EXTERNAL DRIVE ', '26', 2, 90000, 'Dar', '0654231423', '2017-05-22', '05', 2017),
(7, 'Konyo', 'Coder', 'DELL DESKTOP ', '28', 1, 370000, 'Dar', '0654231423', '2017-05-22', '03', 2017),
(8, 'Konyo', 'Coder', 'EXTERNAL DRIVE', '30', 1, 120000, 'Dar', '0654231423', '2017-05-22', '05', 2017),
(9, 'Konyo', 'Coder', 'PRINTER', '29', 2, 680000, 'Dar - Kinyerezi', '0765473546', '2017-05-23', '04', 2017),
(12, 'Festus', 'Flowin', 'DELL EXTERNAL DRIVE ', '26', 2, 90000, 'Iringa', '0654231423', '2017-05-23', '05', 2017),
(13, 'Festus', 'Flowin', 'HP DESKTOP', '27', 1, 450000, '', '', '2017-05-23', '01', 2017),
(14, 'Festus', 'Flowin', 'DELL DESKTOP ', '28', 2, 740000, 'Dar es salaam- Mlimani city', '065612276', '2017-05-24', '05', 2017);

-- --------------------------------------------------------

--
-- Table structure for table `tms_stock_take`
--

CREATE TABLE `tms_stock_take` (
  `id` int(11) NOT NULL,
  `item` varchar(30) NOT NULL,
  `qnt` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `dat` date NOT NULL,
  `month` varchar(10) NOT NULL,
  `year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tms_stock_take`
--

INSERT INTO `tms_stock_take` (`id`, `item`, `qnt`, `amount`, `dat`, `month`, `year`) VALUES
(14, 'BONET', 3, 0, '2017-05-15', '05', 2017),
(15, 'EXTERNAL', 1, 0, '2017-05-15', '05', 2017),
(16, 'PRINTER', 2, 0, '2017-05-15', '05', 2017),
(17, 'SPANA', 2, 80000, '2017-05-15', '05', 2017),
(18, 'GEARBOX', 2, 40000, '2017-05-15', '05', 2017),
(19, 'SPANA', 3, 120000, '2017-05-18', '05', 2017),
(20, 'DELL DESKTOP ', 2, 800000, '2017-05-19', '05', 2017),
(21, 'PRINTER', 2, 680000, '2017-05-20', '05', 2017),
(22, 'EXTERNAL DRIVE', 1, 120000, '2017-05-19', '05', 2017);

-- --------------------------------------------------------

--
-- Table structure for table `tms_tempe_order`
--

CREATE TABLE `tms_tempe_order` (
  `id` int(11) NOT NULL,
  `address` varchar(30) NOT NULL,
  `productID` varchar(30) NOT NULL,
  `qnt` int(11) NOT NULL,
  `cos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tms_users`
--

CREATE TABLE `tms_users` (
  `id` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `role` varchar(30) DEFAULT NULL,
  `status` varchar(5) DEFAULT NULL,
  `phone` varchar(30) NOT NULL,
  `up_auth` int(11) NOT NULL,
  `create_auth` int(11) NOT NULL,
  `del_auth` int(11) NOT NULL,
  `view_auth` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tms_users`
--

INSERT INTO `tms_users` (`id`, `name`, `username`, `password`, `role`, `status`, `phone`, `up_auth`, `create_auth`, `del_auth`, `view_auth`) VALUES
(1, 'Peter Msechu', 'admin', '21232f297a57a5a743894a0e4a801fc3 ', 'Admin', 'Yes', '', 1, 1, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tms_customer`
--
ALTER TABLE `tms_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tms_customers`
--
ALTER TABLE `tms_customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tms_expenses`
--
ALTER TABLE `tms_expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tms_feeds`
--
ALTER TABLE `tms_feeds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tms_income`
--
ALTER TABLE `tms_income`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tms_items`
--
ALTER TABLE `tms_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tms_item_in_history`
--
ALTER TABLE `tms_item_in_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tms_orders`
--
ALTER TABLE `tms_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tms_stock_take`
--
ALTER TABLE `tms_stock_take`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tms_tempe_order`
--
ALTER TABLE `tms_tempe_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tms_users`
--
ALTER TABLE `tms_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tms_customer`
--
ALTER TABLE `tms_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tms_customers`
--
ALTER TABLE `tms_customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tms_expenses`
--
ALTER TABLE `tms_expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `tms_feeds`
--
ALTER TABLE `tms_feeds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tms_income`
--
ALTER TABLE `tms_income`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tms_items`
--
ALTER TABLE `tms_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `tms_item_in_history`
--
ALTER TABLE `tms_item_in_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `tms_orders`
--
ALTER TABLE `tms_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tms_stock_take`
--
ALTER TABLE `tms_stock_take`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `tms_tempe_order`
--
ALTER TABLE `tms_tempe_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tms_users`
--
ALTER TABLE `tms_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

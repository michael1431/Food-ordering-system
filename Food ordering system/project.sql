-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2019 at 02:27 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(11) NOT NULL,
  `a_id` varchar(500) NOT NULL,
  `a_pss` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `a_id`, `a_pss`) VALUES
(1, 'A123456', 'A123456');

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `id` int(11) NOT NULL,
  `area_name` varchar(50) NOT NULL,
  `city` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`id`, `area_name`, `city`) VALUES
(1, 'Pahar Toli', 1),
(2, 'Chandgao', 1),
(3, 'Pashlais', 1),
(4, 'Halishahor', 1),
(5, 'SholoShohor', 1),
(6, 'North Kattoli', 1),
(7, 'Lalkhan Bazar ', 1),
(8, 'South Kattoli', 1),
(9, 'Shorai Para', 1),
(10, 'CokBazar', 1),
(11, 'Zamal Khan', 1),
(12, 'Anayet Bazar', 1),
(13, 'North Agrabad', 1),
(14, 'South Agrabad', 1),
(15, 'Andor Killa', 1),
(16, 'Firangi Bazar', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `item_id`, `customer_id`, `quantity`) VALUES
(38, 1, 5, 1),
(46, 1, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `image` varchar(50) NOT NULL,
  `restaurant_name` int(11) NOT NULL,
  `cat_name` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `image`, `restaurant_name`, `cat_name`) VALUES
(1, 'aw.food3_.jpeg', 3, 'American Food'),
(2, 'bd_food.jpg', 5, 'Bangladeshi Food'),
(3, 'indian food.jpg', 7, 'Indian Food'),
(4, 'mexican_food.jpg', 3, 'Mexican Food'),
(5, 'paris_food.jpg', 4, 'Paris Food'),
(6, 'italian_food.jpg', 4, 'Italian Food'),
(7, 'spanish_food.jpg', 3, 'Spanish Food'),
(8, 'sri_lankan_food.jpg', 8, 'Sri lankan Food'),
(9, 'thai_food.jpg', 2, 'Thai Food'),
(10, 'Chinese cuisine.png', 3, 'Chinese cuisine'),
(13, 'Arabian cuisine.jpg', 3, 'Arabian cuisine'),
(16, 'Lebanese cuisine.jpg', 7, 'Lebanese cuisine'),
(17, 'Korean cuisine.jpg', 6, 'Korean cuisine');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `select_city` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `select_city`) VALUES
(1, 'Chittagong'),
(2, 'Dhaka'),
(3, 'Sylhet');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(150) NOT NULL,
  `created` varchar(500) NOT NULL,
  `confirm_code` varchar(520) NOT NULL,
  `action` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `email`, `password`, `created`, `confirm_code`, `action`) VALUES
(1, 'Rakib Hossain', 'rakibhossain@gmail.com', 'rakibhossain', '15/03/18', 'ab8c9f93', '1'),
(2, 'Emon', 'emonchow@gmail.com', 'emonchow', '16/03/18', '6cb28750', '0'),
(3, 'Vai', 'Vai@gmail.com', 'vaispeaking', '16/03/18', 'b85ebcee', '1'),
(4, 'virat', 'vk@gmail.com', '123', '04/03/19', '', '0'),
(5, 'rahul', 'rahul@gmail.com', '321', '04/03/19', '', '1'),
(6, 'mikel', 'michaelsd1431@gmail.com', 'mikel', '04/03/19', '32ab2da7', '1');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `cat_id` varchar(11) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `item_image` varchar(100) NOT NULL,
  `item_price` varchar(50) NOT NULL,
  `item_description` varchar(100) NOT NULL,
  `restaurant` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `cat_id`, `item_name`, `item_image`, `item_price`, `item_description`, `restaurant`) VALUES
(1, '1', 'Tater tots', 'Tater tots.PNG', '200.00', 'We love French fries, but for an American food variation on the potato theme', 3),
(2, '1', 'Francisco bread', 'San Francisco sourdough bread.PNG', '150.20', 'As much a part of NoCal culinary culture as Napa Valley wine, sourdough bread has been a staple sinc', 3),
(3, '1', 'Cobb Salad', 'Cobb salad.PNG', '120.00', 'The chef''s salad originated back East, but American food innovators working with lettuce out West we', 3),
(4, '1', 'Jerky', 'Jerky.PNG', '150.00', 'Jerky is so versatile and portable and packs such nutritional power that the Army is experimenting w', 3),
(5, '1', 'Key lime pie', 'Key lime pie.PNG', '250.00', 'If life gives you limes, don''t make limeade, make a Key lime pie. The official state pie of Florida ', 3),
(6, '1', 'Fajitas', 'Fajitas.PNG', '260.00', 'The fajita is thought to have come off the range and into popular culture when a certain Sonny Falco', 3),
(7, '2', 'Hilsha ', 'Hilsha.jpg', '150.00', 'Traditional Bengali Food :D ', 3),
(15, '13', 'Saudi beef and vegetable soup', 'saudi beef and vegetable soup.jpg', '300', 'In a large pot, brown beef in hot oil. Cover and simmer for 1 1/2 hour. Cover and simmer 1/2 hour or', 3),
(21, '2', 'Biriani Thali', 'food_14.jpg', '360', 'delicious food', 2);

-- --------------------------------------------------------

--
-- Table structure for table `item_review`
--

CREATE TABLE `item_review` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `review` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_review`
--

INSERT INTO `item_review` (`id`, `item_id`, `review`) VALUES
(1, 1, 'Good!!'),
(2, 1, 'But u need to be improved ur quality.'),
(3, 2, 'better'),
(4, 3, 'much better'),
(5, 3, 'Worst Food quality '),
(6, 3, 'good'),
(7, 1, 'nothing'),
(8, 7, 'worst'),
(9, 2, 'not so good !'),
(10, 7, 'goood'),
(11, 1, ''),
(12, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `mobile_pin`
--

CREATE TABLE `mobile_pin` (
  `id` int(11) NOT NULL,
  `pin` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mobile_pin`
--

INSERT INTO `mobile_pin` (`id`, `pin`) VALUES
(1, '016'),
(2, '017'),
(3, '018'),
(4, '019'),
(5, '015'),
(6, '011');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `m_m_no` varchar(50) NOT NULL,
  `ref` varchar(50) NOT NULL,
  `mobile_pin` int(11) NOT NULL,
  `customer_m_no` int(11) NOT NULL,
  `counter_no` int(11) NOT NULL,
  `trun_id` varchar(50) NOT NULL,
  `amount` int(50) NOT NULL,
  `address` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `c_id`, `m_m_no`, `ref`, `mobile_pin`, `customer_m_no`, `counter_no`, `trun_id`, `amount`, `address`) VALUES
(1, 5, '01923144496', 'M001', 0, 0, 1, 'xxxxx78xxxx', 50000, ''),
(2, 5, '01923144496', 'M001', 0, 0, 1, 'XXXEEESSS', 200, ''),
(3, 3, '01923144496', 'M001', 0, 0, 1, 'TEWdTGh4', 751, ''),
(4, 5, '01923144496', 'M001', 0, 0, 1, 'YYYrrrEEE', 200, ''),
(5, 3, '01923144496', 'M001', 0, 0, 1, 'RRRDddddSSS', 600, ''),
(6, 6, '01923144496', 'M001', 0, 0, 1, 'XXXXXXXXXX', 3550, ''),
(7, 6, '01923144496', 'M001', 0, 0, 1, 'xxxxxx', 200, ''),
(8, 6, '01923144496', 'M001', 0, 0, 1, 'xxxxxxxxxxxxx', 150, ''),
(9, 8, '01923144496', 'M001', 0, 0, 1, 'mmmmmmmmmmm', 350, ''),
(10, 8, '01923144496', 'M001', 1, 185555555, 1, 'fdfdfdfdfdf', 350, 'dsfasfdafsdfsfadsfsdf'),
(11, 8, '01923144496', 'M001', 2, 2147483647, 1, 'dhfdgh', 350, 'dfhgggg'),
(12, 5, '01923144496', 'M001', 1, 2147483647, 1, 'fffcfcfcfcfc', 200, 'Halishahor'),
(13, 5, '01923144496', 'M001', 1, 45465456, 1, 'frffrfrfrffrfrfrfrr', 200, 'Halishahhor. B block '),
(14, 5, '01923144496', 'M001', 1, 78996666, 1, 'rakibxxxxx171789', 3350, 'Block B Halishahor. Chittagong.\r\n'),
(15, 5, '01923144496', 'M001', 1, 45899999, 1, 'dfddfdfdfdfd12587', 2704, 'Halishahor'),
(16, 5, '01923144496', 'M001', 1, 98745669, 1, 'suuaffdfafdfaf', 5400, 'Chittagong'),
(17, 5, '01923144496', 'M001', 1, 78787878, 1, 'uytyutuytu', 1000, 'fgshgdgghg'),
(18, 5, '01923144496', 'M001', 1, 54545555, 1, 'fgfdgfdxgdxfgdf', 1500, 'gfdgdfgfg'),
(19, 5, '01923144496', 'M001', 1, 54544444, 1, 'dsdssdsds', 200, 'fdsgdgfdgdgs'),
(20, 5, '01923144496', 'M001', 1, 77889999, 1, 'rfrffrfrfrfrfrfrfrfrfrffrfrfrfrfrfr', 500, 'Halishahor'),
(21, 5, '01923144496', 'M001', 1, 54545544, 1, 'reedgggffgfgfgfg', 150, 'fgf'),
(22, 1, '01923144496', 'M001', 1, 45545645, 1, 'kjhgkljgjhjfghjfh', 1400, 'kjhgjkhjkhjkjk'),
(23, 1, '01923144496', 'M001', 1, 78787878, 1, 'XERTYLILI789621', 1202, 'Halishahor. Chittagong\r\n'),
(24, 3, '01923144496', 'M001', 1, 77877878, 1, 'XXXXXXXX', 56400, 'RRRR'),
(25, 2, '01923144496', 'M001', 3, 12086003, 1, '12345', 601, 'ctg'),
(26, 2, '01923144496', 'M001', 1, 12086003, 1, 'asd123', 450, 'ctg'),
(27, 2, '01923144496', 'M001', 4, 12086003, 1, 'asd1234', 1831, 'dhk'),
(28, 3, '01923144496', 'M001', 2, 12086000, 1, '123456', 200, 'ctg'),
(29, 4, '01923144496', 'M001', 3, 12086222, 1, 'asd12', 1000, 'chi'),
(30, 4, '01923144496', 'M001', 4, 12086000, 1, 'ab12', 150, 'dhk'),
(31, 6, '01923144496', 'M001', 5, 15464646, 1, 'acv321', 360, 'dewanhat,ctg'),
(32, 6, '01923144496', 'M001', 5, 15464646, 1, 'acv123', 150, 'ctg');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `id` int(11) NOT NULL,
  `r_name` varchar(500) NOT NULL,
  `delivery_time` varchar(500) NOT NULL,
  `delivery_fee` varchar(500) NOT NULL,
  `area` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`id`, `r_name`, `delivery_time`, `delivery_fee`, `area`) VALUES
(1, 'Dawat North Indian Restaurant', '70 mins', '60 Tk', 9),
(2, ' Afghan Restaurant', '50 mins', '45 Tk', 10),
(3, 'Barcode Cafe', '60 mins', '50 Tk', 3),
(4, 'Burger Bank Shyamoli', '30 mins', '20 Tk', 3),
(5, 'Sportive Cocoloco', '60 mins', '40 Tk', 3),
(6, 'Window @ 85 ', '80 mins', '60 Tk', 3),
(7, 'Sadia''s Kitchen', '90 mins', '100 Tk', 3),
(8, 'Bellpepper Restaurant', '40 mins', '45 Tk', 3);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `customer_name` int(11) NOT NULL,
  `total_payment` int(11) NOT NULL,
  `tran_key` int(11) NOT NULL,
  `date` varchar(500) NOT NULL,
  `order_action` varchar(500) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `customer_name`, `total_payment`, `tran_key`, `date`, `order_action`) VALUES
(1, 5, 17, 17, '08-03-18', '1'),
(2, 5, 18, 18, '08-03-18', '1'),
(3, 5, 19, 19, '08-03-18', '1'),
(4, 5, 20, 20, '11-03-18', '0'),
(5, 5, 21, 21, '14-03-18', '0'),
(6, 1, 22, 22, '15-03-18', '0'),
(7, 1, 23, 23, '15-03-18', '1'),
(8, 3, 24, 24, '16-03-18', '0'),
(9, 2, 25, 25, '27-01-19', '1'),
(11, 2, 26, 26, '28-01-19', '0'),
(12, 2, 27, 27, '28-01-19', '1'),
(13, 3, 28, 28, '28-01-19', '1'),
(14, 4, 30, 30, '04-03-19', '1'),
(15, 6, 31, 31, '04-03-19', '1'),
(18, 6, 32, 32, '04-03-19', '1');

-- --------------------------------------------------------

--
-- Table structure for table `total_amount`
--

CREATE TABLE `total_amount` (
  `id` int(11) NOT NULL,
  `total_amount` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `total_amount`
--

INSERT INTO `total_amount` (`id`, `total_amount`) VALUES
(1, 350),
(2, 951),
(3, 951),
(4, 1251),
(5, 1451),
(6, 1451),
(7, 1451),
(8, 1902),
(9, 200),
(10, 50000),
(11, 200),
(12, 150),
(13, 751),
(14, 200),
(15, 200),
(16, 120),
(17, 600),
(18, 200),
(19, 200),
(20, 1800),
(21, 1800),
(22, 2050),
(23, 3550),
(24, 200),
(25, 200),
(26, 150),
(27, 150),
(28, 350),
(29, 200),
(30, 150),
(31, 410),
(32, 1010),
(33, 3350),
(34, 150),
(35, 2704),
(36, 300),
(37, 5400),
(38, 200),
(39, 1000),
(40, 150),
(41, 1500),
(42, 200),
(43, 300),
(44, 500),
(45, 150),
(46, 200),
(47, 320),
(48, 1400),
(49, 150),
(50, 1202),
(51, 300),
(52, 300),
(53, 56400),
(54, 350),
(55, 150),
(56, 0),
(57, 0),
(58, 0),
(59, 150),
(60, 150),
(61, 150),
(62, 601),
(63, 150),
(64, 450),
(65, 150),
(66, 270),
(67, 1230),
(68, 1230),
(69, 1831),
(70, 200),
(71, 200),
(72, 200),
(73, 200),
(74, 1000),
(75, 150),
(76, 360),
(77, 150);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `select_city` (`select_city`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_review`
--
ALTER TABLE `item_review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mobile_pin`
--
ALTER TABLE `mobile_pin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `trun_id` (`trun_id`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tran_key` (`tran_key`);

--
-- Indexes for table `total_amount`
--
ALTER TABLE `total_amount`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `area`
--
ALTER TABLE `area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `item_review`
--
ALTER TABLE `item_review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `mobile_pin`
--
ALTER TABLE `mobile_pin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `total_amount`
--
ALTER TABLE `total_amount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

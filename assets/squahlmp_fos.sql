-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 17, 2020 at 09:30 AM
-- Server version: 10.3.22-MariaDB-log-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `squahlmp_fos`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(11) NOT NULL,
  `AdminName` varchar(45) DEFAULT NULL,
  `UserName` varchar(45) DEFAULT NULL,
  `MobileNumber` bigint(11) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 'Adi', 'admin', 7894561238, 'test@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2019-04-05 07:16:39');

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `ID` int(5) NOT NULL,
  `CategoryName` varchar(120) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`ID`, `CategoryName`, `CreationDate`) VALUES
(3, 'Itallian', '2019-04-05 10:36:01'),
(4, 'Thai', '2019-04-05 10:36:25'),
(5, 'South Indian', '2019-04-05 10:36:35'),
(6, 'North Indian', '2019-04-05 10:36:47'),
(7, 'Desserts', '2019-04-05 10:43:13'),
(8, 'Starters', '2019-04-05 10:43:45'),
(9, 'Chinease', '2019-04-24 05:43:08'),
(10, 'Test Food ', '2019-05-06 16:36:16'),
(11, 'Bangla', '2020-04-16 14:26:37');

-- --------------------------------------------------------

--
-- Table structure for table `tblchats`
--

CREATE TABLE `tblchats` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `conversation_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'unseen'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblchats`
--

INSERT INTO `tblchats` (`id`, `sender_id`, `message`, `conversation_id`, `date`, `status`) VALUES
(6, 6, 'wow', 3, '2020-04-13 20:21:41', 'unseen'),
(7, 6, 'great bro', 3, '2020-04-13 20:22:46', 'unseen'),
(8, 6, 'baler kahini', 3, '2020-04-13 20:23:33', 'unseen'),
(9, 6, 'aibar to howar kotha', 3, '2020-04-13 20:24:12', 'unseen'),
(12, 1, 'hi', 4, '2020-04-14 13:56:43', 'unseen'),
(13, 1, 'hi', 3, '2020-04-14 14:02:44', 'unseen'),
(14, 1, 'upoer gelo kn?', 3, '2020-04-14 14:02:58', 'unseen'),
(15, 1, 'aibar hoyse to ?', 3, '2020-04-14 14:06:18', 'unseen'),
(16, 1, 'right hi ta amri silo', 4, '2020-04-14 14:06:44', 'unseen'),
(17, 1, 'wah great', 4, '2020-04-14 14:07:15', 'unseen'),
(18, 6, 'hmm aibar hoyse vai', 3, '2020-04-14 14:09:26', 'unseen'),
(19, 6, 'goo work', 3, '2020-04-14 14:09:35', 'unseen'),
(20, 1, 'ok thanks man', 3, '2020-04-14 14:09:52', 'unseen'),
(21, 1, 'hi', 3, '2020-04-15 09:43:25', 'unseen'),
(22, 1, 'ki je hobe janina tobe sob thik ase vai dekhi ki hoy a mia tmr je asar kotha silo aslana kn? akhn koi aso ? ber hoba naki?', 3, '2020-04-15 13:18:18', 'unseen'),
(23, 1, 'wow', 3, '2020-04-15 13:27:37', 'unseen'),
(24, 6, 'hi admin', 3, '2020-04-16 01:54:37', 'unseen'),
(25, 1, 'hi Adi tell me whats your problem?', 3, '2020-04-16 02:07:44', 'unseen'),
(26, 6, 'I want alu vorta', 3, '2020-04-16 02:08:10', 'unseen'),
(27, 1, 'ok', 3, '2020-04-16 02:08:22', 'unseen'),
(28, 1, 'hello', 3, '2020-04-16 10:43:37', 'unseen'),
(29, 1, 'hello', 3, '2020-04-16 10:43:50', 'unseen'),
(30, 1, 'what is the problem', 3, '2020-04-16 10:44:00', 'unseen'),
(31, 1, 'can u plz tell me ur order id no?', 3, '2020-04-16 10:44:20', 'unseen'),
(32, 1, 'gnngnnngn', 4, '2020-04-16 10:45:00', 'unseen'),
(33, 6, 'hlw', 3, '2020-04-16 11:51:18', 'unseen'),
(34, 1, 'can u plz tell me ur order no?', 4, '2020-04-16 11:52:19', 'unseen'),
(35, 6, 'hlw', 3, '2020-04-16 11:56:53', 'unseen'),
(36, 1, 'hlw', 3, '2020-04-16 11:57:33', 'unseen'),
(37, 6, 'i wanna cancel my order', 3, '2020-04-16 11:58:30', 'unseen'),
(38, 1, 'why???', 3, '2020-04-16 11:58:42', 'unseen'),
(39, 6, 'hlw', 3, '2020-04-16 12:01:35', 'unseen'),
(40, 10, 'Ffgg', 4, '2020-04-16 18:41:27', 'unseen'),
(41, 1, 'e', 3, '2020-04-17 09:20:00', 'unseen');

-- --------------------------------------------------------

--
-- Table structure for table `tblconversations`
--

CREATE TABLE `tblconversations` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `reciver_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblconversations`
--

INSERT INTO `tblconversations` (`id`, `sender_id`, `reciver_id`) VALUES
(3, 6, 1),
(4, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblfood`
--

CREATE TABLE `tblfood` (
  `ID` int(10) NOT NULL,
  `CategoryName` varchar(120) DEFAULT NULL,
  `ItemName` varchar(120) DEFAULT NULL,
  `ItemPrice` varchar(120) DEFAULT NULL,
  `ItemDes` varchar(500) DEFAULT NULL,
  `Image` varchar(120) DEFAULT NULL,
  `ItemQty` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblfood`
--

INSERT INTO `tblfood` (`ID`, `CategoryName`, `ItemName`, `ItemPrice`, `ItemDes`, `Image`, `ItemQty`) VALUES
(1, 'Italian', 'Corn Pizza', '180', 'Sprinkle with salt and pepper; let stand 20 minutes. Place pizza crust on a parchment paper-lined baking sheet;', 'f97fcb777fbc60235e7cfdf991cb0cfa.jpg', 'Medium'),
(2, 'Italian', 'Corn Pizza', '120', 'Sprinkle with salt and pepper; let stand 20 minutes. Place pizza crust on a parchment paper-lined baking sheet;', 'f97fcb777fbc60235e7cfdf991cb0cfa.jpg', 'Regular'),
(3, 'Italian', 'Corn Pizza', '220', 'Sprinkle with salt and pepper; let stand 20 minutes. Place pizza crust on a parchment paper-lined baking sheet', 'f97fcb777fbc60235e7cfdf991cb0cfa.jpg', 'Large'),
(4, 'Italian', 'Veg Extravaganza Pizza', '450', 'Veg ExtravaganzaA pizza that decidedly staggers', '73323ff74a39e6157cf73ad52cf15c66.jpg', 'Medium'),
(5, 'Italian', 'Veg Extravaganza Pizza', '440', 'Veg ExtravaganzaA pizza that decidedly staggers under an overload of golden corn, exotic black olives, crunchy onions', '9ed5c4756f56317810d7e364ca7f1634.jpg', 'Large'),
(6, 'North Indian', 'Chana Masala', '120', 'To make this chana masala we start with a trio of ingredients found in most Indian curriesâ€“onion, garlic, and ginger. ', '0ee2405d162c60e415bfba56a24aca8c.jpg', 'Full'),
(7, 'North Indian', 'Rajma Masala', '125', 'Rajma Masala is a much loved spicy curry in most Indian Households.                               	', '63d50ef58f33ec97cf928c05deb8ccd3.jpg', 'Full'),
(8, 'South Indian', 'Dosa', '85', 'Dosa  are served hot along with sambar, a stuffing of potatoes, and chutney.                             	', 'd984b4a23552203107391bc98dd0e4dc.jpg', 'Regular'),
(9, 'South Indian', 'Idli', '75', 'Idli are a type of savoury rice cake, originating from the Indian subcontinent and served coconut chutney.                                         	', '0cbe727a2529cc6cd8dcbd40ee53fe2c.jpg', '2 pcs'),
(10, 'South Indian', 'Vada', '60', 'Medu vada served with hot shambhar and coconut chutney ', '66d5785b3c99179f5a5bb7d7d94636dd.jpg', '2 pcs'),
(11, 'North Indian', 'Chole Bhature', '120', 'Chole Bhuture is a combination of chana masala (spicy white chickpeas) and bhatura,                                                	', 'da41d10bb09c6cfac8168435164ff0b3.jpg', '2 pcs'),
(12, 'North Indian', 'Aloo paratha', '85', ' Aloo paratha is served with butter, chutney, or Indian pickles in different parts of northern and western India.                                                 	', '8cc336b118e1feb503f9a54f3bdcdf1b.jpg', '2 pieces'),
(13, 'North Indian', 'Mix Pratha', '85', 'veg paratha soft, healthy and delicious whole wheat parathas made with mix vegetables. ... this no onion no garlic veg paratha recipe is pretty flexible.                                               	', '4b4f0a570c7f36f0db9e4f8e7fa60442.jpg', '2 pieces'),
(14, 'North Indian', 'Paneer Paratha.', '95', 'paneer paratha. paneer paratha is an indian flat bread made with cottage cheese stuffing. paneer paratha are popular breakfast recipe in punjabi homes.                                                 	', 'a19b8b7095ad0c23ddd95a28c3f85268.jpg', '2 pieces'),
(15, 'Chinease', 'Hakka Noodle', '120', 'Hakka Noodle is one our famous food which is made up by our homemade masale.                                               	', 'f8f34e70f13c6d9e982640e3b39f317b.jpg', 'full'),
(16, 'Chinese', 'Veg Chowmin', '120', 'Veg Chowmien full Plate                                                 	', '927f5a1c2bcfff25ff8a936fa98d5f2f.jpg', 'Full'),
(17, 'Desserts', 'fgfgfgf', '23', '                  fgfgfg                               	', '2760735506a5bc187a35f6c829fae70d.jpg', '1'),
(18, 'Bangla', 'jhjh', '200', 'ghghg                                                 	', 'f89d13be0fbd8d2b427094e5e761a5b6.jpg', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tblfoodtracking`
--

CREATE TABLE `tblfoodtracking` (
  `ID` int(10) NOT NULL,
  `OrderId` char(50) DEFAULT NULL,
  `remark` varchar(200) DEFAULT NULL,
  `status` char(50) DEFAULT NULL,
  `StatusDate` timestamp NULL DEFAULT current_timestamp(),
  `OrderCanclledByUser` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblfoodtracking`
--

INSERT INTO `tblfoodtracking` (`ID`, `OrderId`, `remark`, `status`, `StatusDate`, `OrderCanclledByUser`) VALUES
(1, '783218118', 'Restaurant Closed.', 'Order Cancelled', '2019-05-05 16:07:35', NULL),
(6, '448858080', 'I want  to cancel this order', 'Order Cancelled', '2019-05-05 17:33:42', 1),
(7, '270156472', 'Order confiremed', 'Order Confirmed', '2019-05-06 16:30:38', NULL),
(8, '270156472', 'Food is preparing.', 'Food being Prepared', '2019-05-06 16:31:08', NULL),
(9, '270156472', 'Food on the way', 'Food Pickup', '2019-05-06 16:31:42', NULL),
(10, '270156472', 'Food is delivired', 'Food Delivered', '2019-05-06 16:35:27', NULL),
(11, '201712648', 'order Cancelled', 'Order Cancelled', '2019-05-06 16:41:55', NULL),
(12, '905866476', 'No neeed', 'Order Cancelled', '2020-04-13 07:11:15', 1),
(13, '231348816', 'hello', 'Food being Prepared', '2020-04-15 18:54:22', NULL),
(14, '231348816', 'hello', 'Order Confirmed', '2020-04-15 18:56:49', NULL),
(15, '231348816', 'order confirmed', 'Order Confirmed', '2020-04-16 14:38:54', NULL),
(16, '231348816', 'food is not available', 'Order Cancelled', '2020-04-16 14:58:38', NULL),
(17, '663410373', 'ok', 'Order Confirmed', '2020-04-16 15:39:20', NULL),
(18, '663410373', 'yu', 'Order Cancelled', '2020-04-16 15:40:20', 1),
(19, '516864130', '4eeeeeeeeeeeeeeeee', 'Food being Prepared', '2020-04-17 13:19:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblorderaddresses`
--

CREATE TABLE `tblorderaddresses` (
  `ID` int(11) NOT NULL,
  `UserId` char(100) DEFAULT NULL,
  `Ordernumber` char(100) DEFAULT NULL,
  `Flatnobuldngno` varchar(255) DEFAULT NULL,
  `StreetName` varchar(255) DEFAULT NULL,
  `Area` varchar(255) DEFAULT NULL,
  `Landmark` varchar(255) DEFAULT NULL,
  `City` varchar(255) DEFAULT NULL,
  `OrderTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `OrderFinalStatus` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblorderaddresses`
--

INSERT INTO `tblorderaddresses` (`ID`, `UserId`, `Ordernumber`, `Flatnobuldngno`, `StreetName`, `Area`, `Landmark`, `City`, `OrderTime`, `OrderFinalStatus`) VALUES
(1, '1', '783218118', 'Hno 546', 'Gali No10', 'New Delhi', 'NA', 'Delhi', '2019-05-05 16:03:28', 'Order Cancelled'),
(2, '1', '448858080', 'Flat 12A', 'ABC', 'XYZ', 'ABCDEF', 'New Delhi', '2019-05-05 17:01:58', 'Order Cancelled'),
(3, '2', '201712648', 'A-10', 'HK pg house', 'Mayur Vihar', 'Near Reliance Fresh', 'New Delhi', '2019-05-06 06:27:28', 'Order Cancelled'),
(4, '5', '270156472', 'Flat no 123', 'ABC Street', 'XYZ Area', 'NA', 'New Delhi', '2019-05-06 16:28:18', 'Food Delivered'),
(5, '6', '905866476', '202', 'Devid Company Para', 'Gaibandha', 'Manik Store', 'Gaibandha', '2020-04-13 05:22:01', 'Order Cancelled'),
(6, '6', '231348816', '203', 'Devid Company Para', 'Gaibandha', 'Manik Store', 'Gaibandha', '2020-04-13 12:13:20', 'Order Cancelled'),
(7, '6', '663410373', 'as', 'as', 'as', 'as', 'as', '2020-04-16 15:37:56', 'Order Cancelled'),
(8, '12', '516864130', '202', 'Kalibari', 'Gaibandha', 'Jhubly School', 'Gaibandha', '2020-04-17 07:46:03', 'Food being Prepared');

-- --------------------------------------------------------

--
-- Table structure for table `tblorders`
--

CREATE TABLE `tblorders` (
  `ID` int(11) NOT NULL,
  `UserId` char(10) DEFAULT NULL,
  `FoodId` char(10) DEFAULT NULL,
  `IsOrderPlaced` int(11) DEFAULT NULL,
  `OrderNumber` char(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblorders`
--

INSERT INTO `tblorders` (`ID`, `UserId`, `FoodId`, `IsOrderPlaced`, `OrderNumber`) VALUES
(1, '1', '8', 1, '783218118'),
(2, '1', '4', 1, '783218118'),
(3, '1', '1', 1, '448858080'),
(4, '1', '5', 1, '448858080'),
(5, '2', '4', 1, '201712648'),
(6, '2', '8', NULL, NULL),
(7, '5', '6', 1, '270156472'),
(8, '5', '13', 1, '270156472'),
(9, '6', '4', 1, '905866476'),
(10, '6', '10', 1, '905866476'),
(11, '6', '2', 1, '905866476'),
(12, '6', '6', 1, '231348816'),
(13, '6', '9', 1, '231348816'),
(15, '6', '4', 1, '663410373'),
(16, '6', '17', 1, '663410373'),
(19, '6', '6', NULL, NULL),
(20, '6', '2', NULL, NULL),
(21, '11', '2', NULL, NULL),
(23, '12', '1', 1, '516864130'),
(24, '12', '2', 1, '516864130'),
(25, '12', '6', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `ID` int(10) NOT NULL,
  `FirstName` varchar(45) DEFAULT NULL,
  `LastName` varchar(50) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(11) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`ID`, `FirstName`, `LastName`, `Email`, `MobileNumber`, `Password`, `RegDate`) VALUES
(1, 'Pankaj', 'Shahu', 'testuser@gmail.com', 7894561236, '1234', '2019-04-08 07:41:22'),
(2, 'Rakesh', 'Chandra', 'rakesh@gmail.com', 7656234589, '202cb962ac59075b964b07152d234b70', '2019-04-08 07:43:28'),
(3, 'Yogesh', 'Chandra', 'y@gmail.com', 8989898989, '202cb962ac59075b964b07152d234b70', '2019-04-24 07:04:02'),
(4, 'Yogesh', 'Shah', 'Test1@gmail.com', 8975895698, '202cb962ac59075b964b07152d234b70', '2019-05-06 09:09:05'),
(5, 'Test demo', 'User', 'testuser123@gmail.com', 1234567890, '7ec66345281b134a33f784bcd06d7ea5', '2019-05-06 16:26:40'),
(6, 'md. adi', 'Amin', 'adi@gmail.com', 131810334, '1234', '2020-04-13 05:07:44'),
(7, 'Asif', 'hasan', 'asifhasan@gmail.com', 163268588, 'cfdc3f407236c1cf0e21f49dadccad0d', '2020-04-16 14:18:56'),
(8, 'Asif', 'Hasan', 'asifhasan123@gmail.com', 171134756, 'c003ffff88c9ef6d74848e88200e3d70', '2020-04-16 14:23:05'),
(9, 'asif', 'hfgf', 'asif1234@gmail.com', 195021708, 'e649023406eb24ece55fa341592bd5e7', '2020-04-16 14:51:59'),
(10, 'Sihab', 'Bashar', 'samiulsihab@gmail.com', 199922445, '5573fe5f6872c8377a07ce56a2fa6061', '2020-04-16 22:37:48'),
(11, 'asif', 'hasan', 'asif12345@gmail.com', 1111111111, '5573fe5f6872c8377a07ce56a2fa6061', '2020-04-17 06:46:31'),
(12, 'Adi', 'Amin', 'amin@gmail.com', 175055847, '81dc9bdb52d04dc20036dbd8313ed055', '2020-04-17 07:44:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblchats`
--
ALTER TABLE `tblchats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ForeignKey` (`conversation_id`),
  ADD KEY `OneToOne` (`sender_id`);

--
-- Indexes for table `tblconversations`
--
ALTER TABLE `tblconversations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblfood`
--
ALTER TABLE `tblfood`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblfoodtracking`
--
ALTER TABLE `tblfoodtracking`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblorderaddresses`
--
ALTER TABLE `tblorderaddresses`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `UserId` (`UserId`,`Ordernumber`);

--
-- Indexes for table `tblorders`
--
ALTER TABLE `tblorders`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `UserId` (`UserId`,`FoodId`,`OrderNumber`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tblchats`
--
ALTER TABLE `tblchats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tblconversations`
--
ALTER TABLE `tblconversations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblfood`
--
ALTER TABLE `tblfood`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tblfoodtracking`
--
ALTER TABLE `tblfoodtracking`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tblorderaddresses`
--
ALTER TABLE `tblorderaddresses`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblorders`
--
ALTER TABLE `tblorders`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblchats`
--
ALTER TABLE `tblchats`
  ADD CONSTRAINT `ForeignKey` FOREIGN KEY (`conversation_id`) REFERENCES `tblconversations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `OneToOne` FOREIGN KEY (`sender_id`) REFERENCES `tbluser` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Jan 19, 2016 at 12:47 PM
-- Server version: 5.5.42
-- PHP Version: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `shirt`
--

-- --------------------------------------------------------

--
-- Table structure for table `credit`
--

CREATE TABLE `credit` (
  `invoice_id` int(5) unsigned zerofill NOT NULL,
  `packet` varchar(255) NOT NULL,
  `credit` int(11) DEFAULT NULL COMMENT 'จำนวนเครดิต ผู้จัดการเป็นคนจัดการ',
  `free` int(11) NOT NULL,
  `total` double NOT NULL COMMENT 'ยอดโอน',
  `bank_to` varchar(255) NOT NULL COMMENT 'อักษรย่อของธนาคารของเว็บไซต์',
  `bank_transfer` varchar(255) NOT NULL COMMENT 'ธนาคารของลูกค้าที่โอนเงินมา',
  `date_transfer` date NOT NULL COMMENT 'วันที่โอน',
  `time_transfer` time NOT NULL COMMENT 'เวลที่โอน',
  `date_make_confirm` datetime NOT NULL COMMENT 'วันที่ลูกค้าแจ้งโอนเงิน',
  `date_added` datetime NOT NULL COMMENT 'วันที่เพิ่มเครดิต',
  `date_expired` datetime NOT NULL COMMENT 'กำหนดหมดอายุการซื้อเครดิต',
  `status` enum('pending','transfered','confirm') NOT NULL COMMENT 'ตรวจสอบการรับเงิน',
  `member_id` varchar(20) NOT NULL COMMENT 'เมมเบอร์ที่ซื้อ',
  `manager_id` varchar(20) NOT NULL COMMENT 'ผู้จัดการที่เพิ่ม',
  `date_confirm` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `credit`
--

INSERT INTO `credit` (`invoice_id`, `packet`, `credit`, `free`, `total`, `bank_to`, `bank_transfer`, `date_transfer`, `time_transfer`, `date_make_confirm`, `date_added`, `date_expired`, `status`, `member_id`, `manager_id`, `date_confirm`) VALUES
(00002, 'Credit Packet 10,000 free 700', 10000, 700, 0, '1', 'SCB', '2016-12-31', '12:59:00', '2016-01-18 15:51:16', '2016-01-18 14:21:30', '2016-01-19 14:21:30', 'transfered', '5', '', '0000-00-00 00:00:00'),
(00003, 'Credit Packet 1,000 free 50', 1000, 50, 0, '1', 'SCB', '2016-12-31', '12:59:00', '2016-01-18 15:51:36', '2016-01-18 14:34:04', '2016-01-19 14:34:04', 'transfered', '5', '', '0000-00-00 00:00:00'),
(00004, 'Credit Packet 5,000 free 300', 5000, 300, 0, '', '', '0000-00-00', '00:00:00', '0000-00-00 00:00:00', '2016-01-18 14:41:27', '2016-01-19 14:41:27', 'pending', '5', '', '0000-00-00 00:00:00'),
(00005, 'Credit Packet 50,000 free 4,000', 50000, 4000, 50001, '2', 'SCB', '2016-01-19', '12:59:00', '2016-01-19 12:35:15', '2016-01-18 14:41:52', '2016-01-19 14:41:52', 'transfered', '5', '', '0000-00-00 00:00:00'),
(00006, 'Credit Packet 500', 500, 0, 0, '1', 'SCB', '2016-12-31', '12:59:00', '2016-01-18 15:45:58', '2016-01-18 14:42:14', '2016-01-19 14:42:14', 'transfered', '5', '', '0000-00-00 00:00:00'),
(00007, 'Credit Packet 10,000 free 700', 10000, 700, 9999, '1', 'SCB', '2016-01-19', '14:00:00', '2016-01-19 12:32:54', '2016-01-19 12:32:32', '2016-01-20 12:32:32', 'transfered', '5', '', '0000-00-00 00:00:00'),
(00008, 'Credit Packet 5,000 free 300', 5000, 300, 5000, '2', 'SCB', '2016-01-19', '12:59:00', '2016-01-19 12:34:03', '2016-01-19 12:33:26', '2016-01-20 12:33:26', 'transfered', '5', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` int(11) NOT NULL,
  `facebook_id` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `email` varchar(200) NOT NULL,
  `tel` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `credit_balance` double NOT NULL,
  `date_create` datetime NOT NULL,
  `last_login` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `facebook_id`, `username`, `password`, `firstname`, `lastname`, `gender`, `email`, `tel`, `mobile`, `credit_balance`, `date_create`, `last_login`) VALUES
(4, '1249716385057151', '', '', 'Panchai', 'กรุณ', 'male', 'thongtank@hotmail.com', '045261624', '0875435550', 0, '2016-01-15 16:10:03', '2016-01-15 17:00:51'),
(5, '', 'thongtank', '489329', 'กรุณ', 'ประสมเพชร', 'male', 'thongtank@gmail.com', '', '0875435550', 0, '2016-01-15 16:10:58', '2016-01-18 14:21:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `credit`
--
ALTER TABLE `credit`
  ADD PRIMARY KEY (`invoice_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `credit`
--
ALTER TABLE `credit`
  MODIFY `invoice_id` int(5) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
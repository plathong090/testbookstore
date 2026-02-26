-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Feb 26, 2026 at 08:14 PM
-- Server version: 8.0.40
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testphp`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `BookID` varchar(5) COLLATE utf8mb4_general_ci NOT NULL,
  `BookName` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `TypeID` char(3) COLLATE utf8mb4_general_ci NOT NULL,
  `StatusID` char(2) COLLATE utf8mb4_general_ci NOT NULL,
  `Publish` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `UnitPrice` int NOT NULL,
  `UnitRent` int NOT NULL,
  `DayAmount` int DEFAULT NULL,
  `Picture` varchar(30) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `BookDate` date NOT NULL COMMENT '0000-00-00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`BookID`, `BookName`, `TypeID`, `StatusID`, `Publish`, `UnitPrice`, `UnitRent`, `DayAmount`, `Picture`, `BookDate`) VALUES
('00001', 'Doraemon', '001', '01', 'Kpn', 150, 3, 2, NULL, '2026-02-16'),
('00002', 'เก็บตะวัน', '002', '03', 'WRP', 250, 5, 3, NULL, '2026-02-16'),
('00003', 'สิ่งมีชีวิต', '002', '01', 'YPR', 154, 3, 3, NULL, '2026-02-16'),
('00004', 'คู่สร้างคู่สม', '003', '01', 'DDR', 20, 1, 2, NULL, '2026-02-16'),
('2t3t', 'fhdf', '', '03', 'gfh', 234, 13, 1, '', '2026-02-26'),
('4747', 'ghbry', '003', '02', ' f fh', 64, 56, 5, '', '2026-02-26'),
('5587', 'hjmj', '001', '01', 'mtum', 686, 785, 58, '', '2026-02-26');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CustomerID` varchar(4) COLLATE utf8mb4_general_ci NOT NULL,
  `CustomerName` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `CustomerSurname` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `CustomerAddr` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `CustomerPhone` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CustomerID`, `CustomerName`, `CustomerSurname`, `CustomerAddr`, `CustomerPhone`) VALUES
('0001', 'สมชาย', 'ใจดี', 'เชียงใหม่', NULL),
('0002', 'มานี', 'มีใจ', 'กรุงเทพมหานคร', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `statusbook`
--

CREATE TABLE `statusbook` (
  `statusID` char(2) COLLATE utf8mb4_general_ci NOT NULL,
  `statusName` varchar(20) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `statusbook`
--

INSERT INTO `statusbook` (`statusID`, `statusName`) VALUES
('01', 'ปกติ'),
('02', 'ชำรุด'),
('03', 'ส่งซ่อม');

-- --------------------------------------------------------

--
-- Table structure for table `typebook`
--

CREATE TABLE `typebook` (
  `TypeID` char(3) COLLATE utf8mb4_general_ci NOT NULL,
  `TypeName` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `typebook`
--

INSERT INTO `typebook` (`TypeID`, `TypeName`) VALUES
('001', 'การ์ตูน'),
('002', 'นิยาย'),
('003', 'นิตยสาร');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`BookID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Indexes for table `statusbook`
--
ALTER TABLE `statusbook`
  ADD PRIMARY KEY (`statusID`);

--
-- Indexes for table `typebook`
--
ALTER TABLE `typebook`
  ADD PRIMARY KEY (`TypeID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

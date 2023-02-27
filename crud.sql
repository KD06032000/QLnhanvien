-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2023 at 09:55 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `chamcong`
--

CREATE TABLE `chamcong` (
  `id` int(11) NOT NULL,
  `manv` varchar(50) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `trangthai` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chamcong`
--

INSERT INTO `chamcong` (`id`, `manv`, `dob`, `trangthai`) VALUES
(1, 'manv1', '2023-02-08', 'đi làm'),
(2, 'manv2', '2020-02-28', 'không đi làm'),
(3, 'manv3', '2023-02-17', 'đi làm'),
(6, 'manv5', '2023-02-18', 'đi làm'),
(8, 'manv7', '2023-02-17', 'không đi làm'),
(11, 'manv6', '2023-02-09', 'đi làm'),
(12, 'manv8', '2023-02-05', 'không đi làm');

-- --------------------------------------------------------

--
-- Table structure for table `chucvu`
--

CREATE TABLE `chucvu` (
  `macv` varchar(50) NOT NULL,
  `tencv` varchar(50) DEFAULT NULL,
  `kihieu` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chucvu`
--

INSERT INTO `chucvu` (`macv`, `tencv`, `kihieu`) VALUES
('macv1', 'nhân viên', 'nv'),
('macv2', 'trưởng phòng', 'kt');

-- --------------------------------------------------------

--
-- Table structure for table `luong`
--

CREATE TABLE `luong` (
  `id` int(11) NOT NULL,
  `manv` varchar(50) DEFAULT NULL,
  `songayluong` int(11) DEFAULT NULL,
  `tienluong` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `luong`
--

INSERT INTO `luong` (`id`, `manv`, `songayluong`, `tienluong`) VALUES
(1, 'manv1', 28, 8400000),
(2, 'manv2', 20, 6000000),
(3, 'manv3', 25, 7500000),
(4, 'manv5', 27, NULL),
(5, 'manv6', 21, NULL),
(6, 'manv7', 25, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `persons`
--

CREATE TABLE `persons` (
  `id` int(11) UNSIGNED NOT NULL,
  `manv` varchar(50) DEFAULT NULL,
  `firstName` varchar(100) DEFAULT NULL,
  `lastName` varchar(100) DEFAULT NULL,
  `gender` enum('male','female') DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `trangthai` varchar(50) DEFAULT NULL,
  `maphong` varchar(50) DEFAULT NULL,
  `macv` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `persons`
--

INSERT INTO `persons` (`id`, `manv`, `firstName`, `lastName`, `gender`, `address`, `dob`, `trangthai`, `maphong`, `macv`) VALUES
(7, 'manv1', 'kieu', 'dao', 'male', 'vĩnh tường-vĩnh phúc', '2000-03-06', 'đi làm', 'map1', 'macv1'),
(10, 'manv2', 'nguyen', 'nam', 'male', 'hà nội', '2023-01-29', 'không đi làm', 'map2', 'macv2'),
(11, 'manv3', 'kieu', 'adc', 'female', 'hà nội', '2013-05-15', 'đi làm', 'map3', 'macv3'),
(18, NULL, 'ádd', 'aser', 'male', 'ádfgh', '2023-02-21', NULL, NULL, NULL),
(19, NULL, 'kieu', 'dao', 'female', '210 Hoang Quoc Viet,Cau Giay,Ha Noi', '2023-02-06', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `phong`
--

CREATE TABLE `phong` (
  `maphong` varchar(50) NOT NULL,
  `tenphong` varchar(50) DEFAULT NULL,
  `kihieu` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `phong`
--

INSERT INTO `phong` (`maphong`, `tenphong`, `kihieu`) VALUES
('map1', 'kế toán', 'ket'),
('map2', 'kĩ thuật', 'kt');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chamcong`
--
ALTER TABLE `chamcong`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chucvu`
--
ALTER TABLE `chucvu`
  ADD PRIMARY KEY (`macv`);

--
-- Indexes for table `luong`
--
ALTER TABLE `luong`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `persons`
--
ALTER TABLE `persons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phong`
--
ALTER TABLE `phong`
  ADD PRIMARY KEY (`maphong`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chamcong`
--
ALTER TABLE `chamcong`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `luong`
--
ALTER TABLE `luong`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `persons`
--
ALTER TABLE `persons`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

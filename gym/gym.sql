-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2022 at 09:09 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gym`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `gender` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `phone`, `address`, `gender`) VALUES
(1, 'rayan ramazan', 'rayan@gmail.com', '111', '9647100944', 'چڕە', 'نێر'),
(2, 'رەیان', 'rayan@gmail.com', 'b79465edbb2036fa2cb1f488c01747ab1b808939ac2973d275968c38b00254d2', '9647100944', 'چڕە', 'نێر'),
(3, 'ahmad', 'rr@gmail.com', '5b07c66d439fa40f128a4dd4a71c56cc7ae6d6a01b9dab900c4d2934b8631d78', '07507523900', 'duhok', 'نێر'),
(4, 'هێزا ئەقلێ ڤەشارتى', 'rayanramazan09@gmail.com', '6a015a0f86de26f49624ca463ced5dd911c7dfe148e1c40cee995d1c5bfa1228', '9647100944', 'چڕە', 'نێر'),
(6, 'ahmad', 'rayan1@gmail.com', '5b07c66d439fa40f128a4dd4a71c56cc7ae6d6a01b9dab900c4d2934b8631d78', '9647100944', 'چڕە', 'نێر'),
(7, 'رێنحبەر', 'renjbar@gmail.com', 'b79465edbb2036fa2cb1f488c01747ab1b808939ac2973d275968c38b00254d2', '07517100944', 'چرە', 'نێر'),
(8, 'عەزیز', 'aziz@gmail.com', 'b79465edbb2036fa2cb1f488c01747ab1b808939ac2973d275968c38b00254d2', '9647100944', 'چڕە', 'نێر'),
(9, 'rayan', 'rayan12@gmail.com', 'b79465edbb2036fa2cb1f488c01747ab1b808939ac2973d275968c38b00254d2', '9647100944', 'duhok', 'نێر');

-- --------------------------------------------------------

--
-- Table structure for table `protin`
--

CREATE TABLE `protin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `admin_id` varchar(255) NOT NULL,
  `protin_name` varchar(255) NOT NULL,
  `price_protin` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `protin`
--

INSERT INTO `protin` (`id`, `username`, `admin_id`, `protin_name`, `price_protin`, `date`) VALUES
(1, 'رەیان رەمەزان', '7', 'phd', 90000, '2022-03-02'),
(2, 'رەیان رەمەزان', '7', 'phd', 90000, '2022-03-02'),
(3, 'کاروان رشید', '9', 'PHD', 90000, '2022-03-08');

-- --------------------------------------------------------

--
-- Table structure for table `useful`
--

CREATE TABLE `useful` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `useful`
--

INSERT INTO `useful` (`id`, `name`, `price`) VALUES
(1, 'رەیان رەمەزان', 90000),
(2, 'ئەحمەد یونس', 90000),
(3, 'ردوان کەمال', 90000),
(4, 'سارا ئەحمەد', 90000),
(5, 'محمد میرۆ', 90000),
(6, 'رێنجبەر محمد رسول', 90000),
(7, 'رەیان رەمەزان', 90000),
(8, 'رەیان رەمەزان', 90000),
(9, 'ردوان کەمال', 90000),
(10, 'ئەرسەلان عنتر', 90000),
(11, 'کاروان رەشید', 90000),
(12, 'ئەحمەد یونس', 90000),
(13, 'ئەحمەد یونس', 90000),
(14, 'احمد', 90000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `admin_id` varchar(255) NOT NULL,
  `categories_gym` varchar(200) NOT NULL,
  `address` varchar(255) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `price` int(11) NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `month` int(11) NOT NULL,
  `qarz` tinyint(1) NOT NULL,
  `price_qarz` int(11) NOT NULL,
  `month_qarz` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `admin_id`, `categories_gym`, `address`, `gender`, `price`, `date_start`, `date_end`, `month`, `qarz`, `price_qarz`, `month_qarz`) VALUES
(1, 'رەیان رەمەزان', '7', 'ئشتراک دگەل ئاڤێ', 'چرە', 'نێر', 30000, '2022-03-02', '2022-04-02', 1, 0, 0, 1),
(2, 'ئەحمەد یونس', '7', 'ئشتراکا عادی', 'چرە', 'نێر', 25000, '2022-03-02', '2022-04-02', 1, 0, 0, 0),
(3, 'ردوان کەمال', '8', 'ئشتراک دگەل ساونا', 'ئاکرێ', 'نێر', 30000, '2022-03-07', '2022-04-07', 3, 0, 0, 0),
(4, 'سارا ئەحمەد', '8', 'ئشتراکا عادی', 'کەلەکچى', 'مێ', 30000, '2022-03-03', '2022-04-03', 3, 0, 0, 2),
(9, 'ردوان کەمال', '7', 'ئشتراکا عادی', 'ئاکرێ', 'نێر', 30000, '2022-03-07', '2022-04-07', 3, 0, 0, 0),
(11, 'کاروان رەشید', '8', 'ئشتراکا عادی', 'ئاکرێ', 'نێر', 25000, '2022-03-05', '2022-04-05', 1, 0, 0, 0),
(13, 'ئەحمەد یونس', '9', 'ئشتراک دگەل ساونا', 'duhok', 'نێر', 30000, '2022-03-08', '2022-05-28', 1, 0, 0, 1),
(14, 'احمد', '9', 'ئشتراکا عادی', 'چڕە', 'مێ', 50000, '2022-03-08', '2022-04-08', 3, 0, 50000, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `protin`
--
ALTER TABLE `protin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `useful`
--
ALTER TABLE `useful`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `protin`
--
ALTER TABLE `protin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `useful`
--
ALTER TABLE `useful`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

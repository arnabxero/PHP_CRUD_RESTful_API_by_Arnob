-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2022 at 06:46 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_rest_api`
--

-- --------------------------------------------------------

--
-- Table structure for table `events_table`
--

CREATE TABLE `events_table` (
  `id` int(11) NOT NULL,
  `Name` varchar(300) NOT NULL,
  `Location` varchar(200) NOT NULL,
  `DateTime` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events_table`
--

INSERT INTO `events_table` (`id`, `Name`, `Location`, `DateTime`) VALUES
(1, 'User-centric content-based neural-net', 'Russia', '2022-04-15T08:09'),
(2, 'Operative bifurcated collaboration', 'El Salvador', '2022-04-22T23:24'),
(3, 'Operative ecplicit software', 'United States', '2024-03-15T07:07'),
(4, 'Virtual clear-thinking alliance', 'Macedonia', '2022-04-12T12:33'),
(5, 'Compatible reciprocal secured line Updated', 'China', '2022-04-16T00:08'),
(6, 'test6', 'Russia', '2022-04-15T11:11'),
(7, 'test7', 'El Salvador', '2022-04-08T03:33'),
(8, 'test8', 'United States', '2222-06-29T02:22'),
(9, 'test9', 'Macedonia', '2022-04-23T03:33'),
(10, 'test10', 'China Updated', '2022-04-14T11:11'),
(11, 'test11', 'testloc10', '2022-07-15T23:11'),
(12, 'test12', '333333', '2022-12-06T00:32'),
(13, 'test13', 'abcdefgh', '2022-03-29T11:12'),
(14, 'test14', 'abcdefgh', '2022-03-29T11:12'),
(15, 'test15', 'qqqqqqqqqqqqqqq', '2022-04-13T11:11'),
(16, 'test16', 'test16', 'test16'),
(17, 'test17', 'test17', 'test17'),
(18, 'test18', 'test18', '12345'),
(19, 'test19', 'test19', 'test19'),
(20, 'test20', 'test20', 'test20'),
(21, 'test21', 'test21', 'test21'),
(22, 'test22', 'test22', 'test22'),
(23, 'test23', 'test23', 'test23'),
(24, 'test24', 'test24', 'test24'),
(25, 'test25', 'test25', 'test25'),
(26, 'test26', 'test26', 'test26'),
(27, 'test27', 'test27', 'test27'),
(28, 'test28', 'test28', 'test28'),
(29, 'test29', 'test29', 'test29'),
(30, 'test30', 'test30', 'test30'),
(31, 'Test31Updated', 'Test31UPloc', '2022-04-06T11:11'),
(37, 'updated', 'updated', 'Updated');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events_table`
--
ALTER TABLE `events_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events_table`
--
ALTER TABLE `events_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

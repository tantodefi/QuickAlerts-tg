-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2024 at 12:05 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quickalert`
--

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `body` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`body`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id`, `body`) VALUES
(40, '{\"update_id\":56711823,\"message\":{\"message_id\":114,\"from\":{\"id\":1321105370,\"is_bot\":false,\"first_name\":\"Amir\",\"username\":\"atenyun\",\"language_code\":\"en\"},\"chat\":{\"id\":1321105370,\"first_name\":\"Amir\",\"username\":\"atenyun\",\"type\":\"private\"},\"date\":1709145023,\"text\":\"\\/hi\",\"entities\":[{\"offset\":0,\"length\":3,\"type\":\"bot_command\"}]}}'),
(41, '{\"update_id\":56711824,\"message\":{\"message_id\":115,\"from\":{\"id\":1321105370,\"is_bot\":false,\"first_name\":\"Amir\",\"username\":\"atenyun\",\"language_code\":\"en\"},\"chat\":{\"id\":1321105370,\"first_name\":\"Amir\",\"username\":\"atenyun\",\"type\":\"private\"},\"date\":1709145079,\"text\":\"\\/hi\",\"entities\":[{\"offset\":0,\"length\":3,\"type\":\"bot_command\"}]}}'),
(42, '{\"update_id\":56711825,\"message\":{\"message_id\":116,\"from\":{\"id\":1321105370,\"is_bot\":false,\"first_name\":\"Amir\",\"username\":\"atenyun\",\"language_code\":\"en\"},\"chat\":{\"id\":1321105370,\"first_name\":\"Amir\",\"username\":\"atenyun\",\"type\":\"private\"},\"date\":1709145095,\"text\":\"\\/hi\",\"entities\":[{\"offset\":0,\"length\":3,\"type\":\"bot_command\"}]}}'),
(43, '{\"update_id\":56711826,\"message\":{\"message_id\":117,\"from\":{\"id\":1321105370,\"is_bot\":false,\"first_name\":\"Amir\",\"username\":\"atenyun\",\"language_code\":\"en\"},\"chat\":{\"id\":1321105370,\"first_name\":\"Amir\",\"username\":\"atenyun\",\"type\":\"private\"},\"date\":1709145135,\"text\":\"\\/hi\",\"entities\":[{\"offset\":0,\"length\":3,\"type\":\"bot_command\"}]}}'),
(44, '{\"update_id\":56711827,\"message\":{\"message_id\":118,\"from\":{\"id\":1321105370,\"is_bot\":false,\"first_name\":\"Amir\",\"username\":\"atenyun\",\"language_code\":\"en\"},\"chat\":{\"id\":1321105370,\"first_name\":\"Amir\",\"username\":\"atenyun\",\"type\":\"private\"},\"date\":1709145142,\"text\":\"\\/hi\",\"entities\":[{\"offset\":0,\"length\":3,\"type\":\"bot_command\"}]}}'),
(45, '{\"update_id\":56711828,\"message\":{\"message_id\":120,\"from\":{\"id\":1321105370,\"is_bot\":false,\"first_name\":\"Amir\",\"username\":\"atenyun\",\"language_code\":\"en\"},\"chat\":{\"id\":1321105370,\"first_name\":\"Amir\",\"username\":\"atenyun\",\"type\":\"private\"},\"date\":1709145272,\"text\":\"\\/hi\",\"entities\":[{\"offset\":0,\"length\":3,\"type\":\"bot_command\"}]}}'),
(46, '{\"update_id\":56711829,\"message\":{\"message_id\":121,\"from\":{\"id\":1321105370,\"is_bot\":false,\"first_name\":\"Amir\",\"username\":\"atenyun\",\"language_code\":\"en\"},\"chat\":{\"id\":1321105370,\"first_name\":\"Amir\",\"username\":\"atenyun\",\"type\":\"private\"},\"date\":1709145332,\"text\":\"\\/hi\",\"entities\":[{\"offset\":0,\"length\":3,\"type\":\"bot_command\"}]}}');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

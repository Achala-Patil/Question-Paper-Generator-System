-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2023 at 01:19 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ques2`
--

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `co` varchar(10) NOT NULL,
  `question_type` char(1) NOT NULL,
  `question_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `co`, `question_type`, `question_text`) VALUES
(113, 'CO4', 'A', 'Question 2 text goes here'),
(117, 'CO6', 'U', 'Question 6 text goes here'),
(118, 'CO1', 'A', 'Question 7 text goes here'),
(119, 'CO5', 'U', 'Question 8 text goes here'),
(120, 'CO1', 'R', 'Question 9 text goes here'),
(121, 'CO6', 'R', 'Question 10 text goes here'),
(122, 'CO2', 'A', 'Question 11 text goes here'),
(123, 'CO4', 'U', 'Question 12 text goes here'),
(124, 'CO2', 'U', 'Question 13 text goes here'),
(125, 'CO5', 'R', 'Question 14 text goes here'),
(126, 'CO1', 'U', 'Question 15 text goes here'),
(127, 'CO5', 'U', 'Question 16 text goes here'),
(128, 'CO2', 'R', 'Question 17 text goes here'),
(129, 'CO5', 'R', 'Question 18 text goes here'),
(130, 'CO1', 'U', 'Question 19 text goes here'),
(131, 'CO6', 'U', 'Question 20 text goes here'),
(132, 'CO2', 'U', 'Question 21 text goes here'),
(133, 'CO5', 'A', 'Question 22 text goes here'),
(134, 'CO2', 'U', 'Question 23 text goes here'),
(135, 'CO5', 'R', 'Question 24 text goes here'),
(136, 'CO2', 'U', 'Question 25 text goes here'),
(137, 'CO4', 'A', 'Question 26 text goes here'),
(138, 'CO2', 'U', 'Question 27 text goes here'),
(139, 'CO5', 'U', 'Question 28 text goes here'),
(140, 'CO3', 'R', 'Question 29 text goes here'),
(141, 'CO6', 'A', 'Question 30 text goes here'),
(142, 'CO1', 'R', 'Question 31 text goes here'),
(143, 'CO5', 'U', 'Question 32 text goes here'),
(144, 'CO3', 'A', 'Question 33 text goes here'),
(145, 'CO6', 'U', 'Question 34 text goes here'),
(146, 'CO1', 'R', 'Question 35 text goes here'),
(147, 'CO6', 'U', 'Question 36 text goes here'),
(148, 'CO1', 'R', 'Question 37 text goes here'),
(149, 'CO5', 'U', 'Question 38 text goes here'),
(150, 'CO1', 'U', 'Question 39 text goes here'),
(151, 'CO6', 'R', 'Question 40 text goes here'),
(152, 'CO2', 'A', 'Question 41 text goes here'),
(153, 'CO6', 'A', 'Question 42 text goes here'),
(154, 'CO3', 'R', 'Question 43 text goes here'),
(155, 'CO5', 'R', 'Question 44 text goes here'),
(156, 'CO2', 'A', 'Question 45 text goes here'),
(157, 'CO4', 'R', 'Question 46 text goes here'),
(158, 'CO2', 'U', 'Question 47 text goes here'),
(159, 'CO4', 'A', 'Question 48 text goes here'),
(160, 'CO1', 'U', 'Question 49 text goes here'),
(161, 'CO6', 'U', 'Question 50 text goes here'),
(162, 'CO3', 'R', 'Question 51 text goes here'),
(163, 'CO5', 'R', 'Question 52 text goes here'),
(164, 'CO3', 'A', 'Question 53 text goes here'),
(165, 'CO6', 'U', 'Question 54 text goes here'),
(166, 'CO2', 'A', 'Question 55 text goes here'),
(167, 'CO5', 'A', 'Question 56 text goes here'),
(168, 'CO2', 'U', 'Question 57 text goes here'),
(169, 'CO6', 'U', 'Question 58 text goes here'),
(170, 'CO1', 'A', 'Question 59 text goes here'),
(171, 'CO6', 'A', 'Question 60 text goes here'),
(172, 'CO3', 'A', 'Question 61 text goes here'),
(173, 'CO6', 'R', 'Question 62 text goes here'),
(174, 'CO3', 'U', 'Question 63 text goes here'),
(175, 'CO6', 'A', 'Question 64 text goes here'),
(176, 'CO3', 'A', 'Question 65 text goes here'),
(177, 'CO6', 'A', 'Question 66 text goes here'),
(178, 'CO3', 'A', 'Question 67 text goes here'),
(179, 'CO5', 'A', 'Question 68 text goes here'),
(180, 'CO3', 'A', 'Question 69 text goes here'),
(181, 'CO5', 'A', 'Question 70 text goes here'),
(182, 'CO3', 'R', 'Question 71 text goes here'),
(183, 'CO6', 'R', 'Question 72 text goes here'),
(184, 'CO1', 'A', 'Question 73 text goes here'),
(185, 'CO5', 'U', 'Question 74 text goes here'),
(186, 'CO2', 'U', 'Question 75 text goes here'),
(187, 'CO6', 'A', 'Question 76 text goes here'),
(188, 'CO1', 'U', 'Question 77 text goes here'),
(189, 'CO6', 'U', 'Question 78 text goes here'),
(190, 'CO2', 'R', 'Question 79 text goes here'),
(191, 'CO6', 'U', 'Question 80 text goes here'),
(192, 'CO1', 'U', 'Question 81 text goes here'),
(193, 'CO5', 'R', 'Question 82 text goes here'),
(194, 'CO1', 'A', 'Question 83 text goes here'),
(195, 'CO5', 'A', 'Question 84 text goes here'),
(196, 'CO3', 'R', 'Question 85 text goes here'),
(197, 'CO5', 'A', 'Question 86 text goes here'),
(198, 'CO3', 'A', 'Question 87 text goes here'),
(199, 'CO6', 'A', 'Question 88 text goes here'),
(200, 'CO1', 'A', 'Question 89 text goes here'),
(201, 'CO5', 'R', 'Question 90 text goes here'),
(202, 'CO3', 'A', 'Question 91 text goes here'),
(203, 'CO4', 'R', 'Question 92 text goes here'),
(204, 'CO3', 'U', 'Question 93 text goes here'),
(205, 'CO6', 'R', 'Question 94 text goes here'),
(206, 'CO3', 'U', 'Question 95 text goes here'),
(207, 'CO5', 'R', 'Question 96 text goes here'),
(208, 'CO1', 'A', 'Question 97 text goes here'),
(209, 'CO5', 'A', 'Question 98 text goes here'),
(210, 'CO2', 'U', 'Question 99 text goes here'),
(211, 'CO6', 'A', 'Question 100 text goes here'),
(212, 'CO2', 'R', 'what is capital trading'),
(214, 'CO2', 'U', 'what is india capital?'),
(216, 'CO2', 'A', 'assdfas'),
(217, 'CO1', 'R', 'What is sky colour ? ( 5 )');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'gpn', 'gpn@123'),
(2, 'Admin', 'Admin@123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
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
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=219;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

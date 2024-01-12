-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2024 at 04:39 PM
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
-- Database: `p3db`
--

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `quiz` int(11) NOT NULL,
  `right` int(11) NOT NULL,
  `wrong` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `id` int(11) NOT NULL,
  `nama` varchar(500) NOT NULL,
  `soal` int(11) NOT NULL DEFAULT 0,
  `date_created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`id`, `nama`, `soal`, `date_created`) VALUES
(1, 'Perubahan Wujud Benda Level 1', 2, '2024-01-07'),
(3, 'Perubahan Wujud Benda Level 2', 0, '2024-01-09');

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

CREATE TABLE `soal` (
  `quiz` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `gambar` text NOT NULL,
  `nama_fisika` varchar(50) NOT NULL,
  `fisika` text NOT NULL,
  `nama_kimia` varchar(50) NOT NULL,
  `kimia` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `soal`
--

INSERT INTO `soal` (`quiz`, `id`, `nama`, `gambar`, `nama_fisika`, `fisika`, `nama_kimia`, `kimia`) VALUES
(1, 1, 'Susu', 'susu5.jpg', 'Permen Susu', 'permensusu6.jpg', 'Keju', 'keju6.jpeg'),
(1, 2, 'Singkong', 'singkong.jpg', 'Singkong rebus', 'singkong_rebus.jpg', 'Tape ', 'tapai.jpg');

--
-- Triggers `soal`
--
DELIMITER $$
CREATE TRIGGER `after_soal_delete` AFTER DELETE ON `soal` FOR EACH ROW BEGIN 
    UPDATE quiz 
    SET quiz.soal = quiz.soal - 1 
    WHERE quiz.id = OLD.quiz; 
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_soal_insert` AFTER INSERT ON `soal` FOR EACH ROW BEGIN 
    UPDATE quiz 
    SET quiz.soal = quiz.soal + 1 
    WHERE quiz.id = NEW.quiz; 
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `date_created` int(11) NOT NULL,
  `total_quiz` int(11) NOT NULL DEFAULT 0,
  `total_streak` int(11) NOT NULL DEFAULT 0,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `password`, `gambar`, `role`, `date_created`, `total_quiz`, `total_streak`, `level`) VALUES
(1, 'Unknown', 'admin@gmail.com', '$2y$10$UGevMImv8/qHDmY84D0SWeGvsJZ1rB6hU4imd./hrn.ek0GjkQfKS', 'default.jpg', 'admin', 1697689836, 0, 0, 0),
(2, 'Kelly Angeline', 'kelly22ti@mahasiswa.pcr.ac.id', '$2y$10$RtCIKJ0SeuJK./nNOe4Pr.8ifdITDsnwHmic88xgYbHRWNesqepgu', 'default.jpg', 'User', 1697689875, 0, 0, 0),
(3, 'justin', 'justin@gmail.com', '$2y$10$PB8GyhtZFciqDcC4LEp1jO84T3gxFgoMxAG0H0wvX16W6tBifUs62', 'default.jpg', 'User', 1698747437, 0, 5, 0),
(4, 'keya', 'abc@gmail.com', '$2y$10$sLqhgCCf36epLWyHIn3SvuZyBG0suFXYmb8AYXUYszwYVb0Hc1BYu', 'luv.png', 'User', 1704531147, 10, 6, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `soal_fk` (`quiz`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `soal`
--
ALTER TABLE `soal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `soal`
--
ALTER TABLE `soal`
  ADD CONSTRAINT `soal_fk` FOREIGN KEY (`quiz`) REFERENCES `quiz` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2022 at 07:34 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlinebookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(50,0) NOT NULL,
  `author` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `pdf` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `name`, `price`, `author`, `description`, `image`, `pdf`) VALUES
(35, 'physics of impossible', '11', 'michael-kaku', 'It has theory of physics concepts', 'physics of impossible.jpg', 'physics-of-the-impossible-by-michael-kaku.pdf'),
(36, 'physics', '47', 'hc verma', 'good book', 'images.jpg', 'physics-of-the-impossible-by-michael-kaku.pdf'),
(37, 'Half Girlfriend', '67', 'chetan bhagat', 'big story', 'halfgirlfrnd.jpg', 'Half Girlfriend by Chetan Bhagat ( PDFDrive ).pdf'),
(38, 'stories', '10', 'unknown', 'science', 'novel image.png', 'englishstories.pdf'),
(39, '2 States', '7', 'chetan bhagat', 'about a marriage', '2states.jpg', '2states.pdf'),
(40, 'action beast', '12', 'mr.ad', 'adventure', 'novel image.png', 'Price Action Breakdown_ Exclusive Price Action Trading Approach to Financial Markets ( PDFDrive ).epub'),
(41, 'a guide to physics', '88', 'tint', 'guide', 'aguidetophysics.jpg', 'Everything Science Grade 10 - Everything Maths and Science ( PDFDrive ).pdf'),
(42, 'price action', '22', 'pruh', 'action', 'action book.jpg', 'Price Action Breakdown_ Exclusive Price Action Trading Approach to Financial Markets ( PDFDrive ).epub'),
(43, 'math', '1', 'log(a+b)', 'logical', 'physical Science.jpg', 'englishstories.pdf'),
(45, 'neon', '14', 'organ', 'chemistry with lot of exceptions', 'aguidetophysics.jpg', 'physics-of-the-impossible-by-michael-kaku.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'a', 'a@gmail.com', 'a'),
(3, 'aj', 'aj@amail.com', 'aj'),
(4, 'k', 'k@g.com', 'k'),
(5, 'jdkfjd', 'kk@k.com', 'kk'),
(6, 'kk', 'kk@k.com', 'kk'),
(7, 'pavan', 'pavan@gmail.com', 'pk'),
(8, 'patt', 'patt@gmail.com', 'patt');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

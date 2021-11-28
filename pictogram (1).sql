-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2021 at 08:20 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pictogram`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_img` text NOT NULL,
  `post_text` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `post_img`, `post_text`, `created_at`) VALUES
(1, 8, '1638039262wolf-g17d3951f3_1920.jpg', 'this is my first image post', '2021-11-27 18:54:22'),
(2, 8, '1638040069IMG_20210215_074954_1.jpg', '', '2021-11-27 19:07:49'),
(3, 6, '1638040508Screenshot (3).png', 'my fisrt web app', '2021-11-27 19:15:08'),
(4, 8, '1638040695post3.png', 'congratulations my friend ', '2021-11-27 19:18:15'),
(5, 8, '1638040774post2.jpg', 'say hii to everyone', '2021-11-27 19:19:34');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `gender` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `profile_pic` text NOT NULL DEFAULT 'default_profile.jpg',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ac_status` int(11) NOT NULL COMMENT '0=not verified,1=active,2=blocked'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `gender`, `email`, `username`, `password`, `profile_pic`, `created_at`, `updated_at`, `ac_status`) VALUES
(3, 'Mohans', 'Giri', 0, 'whomonugiri2@gmail.com', 'whomonugiri', 'c68710d3fe56fc88f7905cb15f06cf5c', 'default_profile.jpg', '2021-11-19 08:54:47', '2021-11-25 08:21:35', 0),
(4, 'Mohans', 'Giri', 0, 'whomonugirdfgfi@gmail.com', 'asdsd', 'c68710d3fe56fc88f7905cb15f06cf5c', 'default_profile.jpg', '2021-11-22 02:34:06', '2021-11-25 08:21:40', 0),
(5, 'Mohans', 'Giri', 1, 'workwithmohan@gmail.com', 'oyeitsmgasdasd', 'c68710d3fe56fc88f7905cb15f06cf5c', 'default_profile.jpg', '2021-11-23 12:00:13', '2021-11-25 08:21:43', 1),
(6, 'Mohans', 'Giri', 1, 'mailtomonugiri@gmail.com', 'oyeitsmgasd', '970af30e481057c48f87e101b61e6994', 'default_profile.jpg', '2021-11-23 13:24:40', '2021-11-27 19:12:06', 1),
(7, 'Monu', 'Giri', 1, 'officialmohankumar@gmail.com', 'iamtheking', 'e10adc3949ba59abbe56e057f20f883e', '1637830104profile7.jpg', '2021-11-25 08:45:24', '2021-11-25 08:49:44', 1),
(8, 'Monu', 'Giri', 1, 'whomonugiri@gmail.com', 'devninja', '970af30e481057c48f87e101b61e6994', '1638035490IMG_20210217_172513 (1).jpg', '2021-11-26 16:53:17', '2021-11-27 17:51:30', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
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
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

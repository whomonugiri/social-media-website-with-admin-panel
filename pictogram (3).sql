-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2021 at 09:20 AM
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
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `user_id`, `comment`, `created_at`) VALUES
(1, 8, 8, 'test', '2021-12-02 17:33:01'),
(2, 8, 8, 'thi is another comment', '2021-12-02 17:34:02'),
(3, 5, 8, 'this is awesome guys', '2021-12-02 17:44:26'),
(4, 5, 8, 'dfg', '2021-12-02 17:46:43'),
(5, 5, 8, 'ok just testing', '2021-12-02 17:51:50'),
(6, 5, 8, 'nice', '2021-12-02 17:52:00'),
(7, 5, 8, 'sdfdsf', '2021-12-02 17:52:26'),
(8, 5, 8, 'sdfsdf', '2021-12-02 17:52:27'),
(9, 5, 8, 'sdfsdf', '2021-12-02 17:52:28'),
(10, 5, 8, 'sdfsdf', '2021-12-02 17:52:29'),
(11, 5, 8, 'sdfsdf', '2021-12-02 17:52:31'),
(12, 5, 8, 'sdfsdf', '2021-12-02 17:52:32'),
(13, 7, 8, 'this is awesome game', '2021-12-02 18:04:36'),
(14, 3, 8, 'this is aweosme project', '2021-12-02 18:05:49'),
(15, 7, 10, 'wowo, just super cool', '2021-12-02 18:07:31'),
(16, 8, 10, 'nice and funny', '2021-12-02 18:09:17'),
(17, 6, 10, 'awesome', '2021-12-02 18:12:01'),
(18, 5, 10, 'nice pic', '2021-12-02 18:15:12'),
(19, 4, 10, 'super cool man congrats', '2021-12-02 18:15:34'),
(20, 5, 10, 'aweosme and cool', '2021-12-02 18:22:03'),
(21, 1, 10, 'super cool', '2021-12-02 18:22:24'),
(22, 5, 10, 'super nice', '2021-12-02 18:23:18'),
(23, 9, 10, 'super cool', '2021-12-02 18:24:44'),
(24, 4, 10, 'thanks bro', '2021-12-02 18:26:02');

-- --------------------------------------------------------

--
-- Table structure for table `follow_list`
--

CREATE TABLE `follow_list` (
  `id` int(11) NOT NULL,
  `follower_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `follow_list`
--

INSERT INTO `follow_list` (`id`, `follower_id`, `user_id`) VALUES
(12, 6, 8),
(13, 9, 3),
(14, 9, 8),
(15, 9, 6),
(22, 8, 7),
(36, 8, 9),
(37, 8, 6),
(38, 10, 3),
(42, 10, 7),
(43, 10, 9),
(44, 10, 8);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `post_id`, `user_id`) VALUES
(17, 3, 8),
(30, 7, 9),
(31, 5, 9),
(41, 4, 8),
(43, 5, 8),
(44, 8, 8),
(45, 7, 8),
(46, 6, 8),
(47, 2, 8),
(49, 3, 10),
(56, 9, 10),
(57, 5, 10),
(58, 4, 10);

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
(5, 8, '1638040774post2.jpg', 'say hii to everyone', '2021-11-27 19:19:34'),
(6, 8, '1638239255vlcsnap-2021-10-14-20h23m35s993.png', '', '2021-11-30 02:27:35'),
(7, 6, '1638243863vlcsnap-2021-10-05-20h25m29s906.png', '', '2021-11-30 03:44:23'),
(8, 8, '1638451081ghantaa_261152324_961019631159870_4113297414053121887_n.jpg', '', '2021-12-02 13:18:01'),
(9, 10, '1638469199post4.jpg', '', '2021-12-02 18:19:59');

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
(8, 'Monu', 'Giri', 1, 'whomonugiri@gmail.com', 'devninja', '970af30e481057c48f87e101b61e6994', '1638035490IMG_20210217_172513 (1).jpg', '2021-11-26 16:53:17', '2021-11-27 17:51:30', 1),
(9, 'Test', 'Kumar', 1, 'test@gmail.com', 'testman', 'e10adc3949ba59abbe56e057f20f883e', '1638244233bot.png', '2021-11-30 03:45:35', '2021-11-30 03:50:33', 1),
(10, 'Amit', 'Sharma', 1, 'amith@gmail.com', 'amithero', 'e10adc3949ba59abbe56e057f20f883e', '1638468543profile8.jpg', '2021-12-02 18:06:37', '2021-12-02 18:09:03', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `follow_list`
--
ALTER TABLE `follow_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `follow_list`
--
ALTER TABLE `follow_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

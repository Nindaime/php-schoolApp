-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2021 at 09:14 AM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loginsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(11) NOT NULL,
  `answer` varchar(500) COLLATE utf8_bin NOT NULL,
  `user` varchar(100) COLLATE utf8_bin NOT NULL,
  `question` varchar(500) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `answer`, `user`, `question`) VALUES
(1, 'Jesus is the key', 'engrmartins', 'How to multiply 2 by 2 matrices'),
(2, 'lets see', 'user', 'alaye\r\nwhat do you mean?'),
(3, 'lets see', 'user', 'alaye\r\nwhat do you mean?'),
(4, 'The world is changing', 'user', 'what'),
(5, 'first', 'user', 'what is cooking'),
(6, 'another answer', 'user', 'what is cooking'),
(7, 'fghkjl', 'user', 'check this');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `answer` varchar(500) COLLATE utf8_bin NOT NULL,
  `comment` varchar(500) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `answer`, `comment`) VALUES
(1, '', 'first try'),
(2, 'first ', 'first try'),
(3, 'another answer ', 'ANother comment');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `user` varchar(50) COLLATE utf8_bin NOT NULL,
  `title` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `user`, `title`) VALUES
(1, 'test2', 'first course'),
(2, 'test4', 'second course'),
(3, 'test4', 'Web Developer'),
(4, 'test4', 'intern'),
(5, 'test4', 'final course'),
(6, 'test4', 'A test'),
(7, 'test4', 'sdfghjk'),
(8, 'test1', 'anthingds'),
(9, 'test1', 'gasdjbs'),
(10, 'test1', 'haisusnds'),
(11, 'test1', 'extradina'),
(12, 'test1', 'tyqwqd dasgha'),
(13, 'test1', 'cv'),
(14, 'test4', 'M and E, Data Analysis'),
(15, 'test4', 'hj'),
(16, 'test4', 'intern'),
(17, 'user', 'goodluck'),
(18, 'user', 'A test'),
(19, 'user', 'God is good9999'),
(21, 'user', 'Teusday'),
(22, 'user', 'intern'),
(23, 'user', 'ginger'),
(24, 'user', 'now'),
(25, 'test1', 'now'),
(26, 'test1', 'now'),
(27, 'test1', 'Web Developer'),
(28, 'jamiee', 'styles'),
(29, 'user', 'first course'),
(30, 'user', 'Web Developer'),
(31, 'test2', 'second course'),
(32, 'test2', 'A test'),
(33, 'test2', 'Web Developer'),
(34, 'test4', 'M and E, Data Analysis'),
(35, 'test4', 'M and E, Data Analysis'),
(36, 'test4', 'mind'),
(37, 'test1', 'Web Developer'),
(38, 'test1', 'the love of God'),
(39, 'test1', 'mondasass'),
(40, 'test1', 'the best ever'),
(41, 'martins', 'monday'),
(42, 'martins', 'Teusday'),
(43, 'martins', 'wednesday'),
(44, 'martins', 'Thursday'),
(45, 'martins', 'Friday'),
(46, 'martins', 'Saturday'),
(47, 'user', 'M and E, Data Analysis'),
(48, 'test2', 'intern'),
(49, 'test2', 'goodluck'),
(50, 'user', 'martins'),
(51, 'user', 'mechatronics'),
(52, 'engrmartins', 'Engineering Mathematics'),
(53, 'test2', 'first course'),
(54, 'test2', 'sdfghjk'),
(55, 'test2', 'sdfghjk'),
(56, 'test2', 'sdfghjk'),
(57, 'test2', 'sdfghjk'),
(58, 'test2', 'Web Developer'),
(59, 'test2', 'Web Developer'),
(60, 'user', 'thermodynamics '),
(61, 'engrmartins', 'Microbiology'),
(62, 'engrmartins', 'Microbiology'),
(63, 'engrmartins', 'Microbiology'),
(64, 'engrmartins', 'Microbiology'),
(65, 'engrmartins', 'Microbiology'),
(66, 'stg', 'first course'),
(67, 'stg', 'second course'),
(68, 'test2', 'God is good9999');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `user` varchar(50) COLLATE utf8_bin NOT NULL,
  `question` varchar(500) COLLATE utf8_bin NOT NULL,
  `topic` varchar(100) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `user`, `question`, `topic`) VALUES
(1, 'test2', 'what is cooking', 'one'),
(5, 'user', 'Whats the cost', 'one'),
(7, 'user', 'another', 'one'),
(9, 'user', 'last', 'one'),
(11, 'user', 'michaek', 'one'),
(12, 'user', 'Alright', 'Alright'),
(15, 'user', 'latest question', 'one'),
(16, 'user', 'the test qs', 'one'),
(17, 'engrmartins', 'How to multiply 2 by 2 matrices', 'new topic'),
(21, 'engrmartins', 'What can God not do?', 'new topic'),
(22, 'engrmartins', 'hfgjvhkbjl', 'new topic'),
(23, 'engrmartins', 'lolasaj', 'new topic'),
(24, 'engrmartins', 'fgahjakl;', 'new topic'),
(25, 'user', 'it works', 'one'),
(26, 'engrmartins', 'it works', 'new topic'),
(27, 'user', 'alaye\r\nwhat do you mean?', 'Taste and See'),
(28, 'user', 'what\'s new', 'Martins'),
(29, 'user', 'check this', 'xctvyukom');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` int(11) NOT NULL,
  `user` varchar(110) COLLATE utf8_bin NOT NULL,
  `title` varchar(50) COLLATE utf8_bin NOT NULL,
  `topic` varchar(100) COLLATE utf8_bin NOT NULL,
  `details` varchar(500) COLLATE utf8_bin NOT NULL,
  `video` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `user`, `title`, `topic`, `details`, `video`) VALUES
(4, 'user', 'goodluck', 'three', '', 'videos/VID-20201023-WA0001.mp4'),
(5, 'user', 'goodluck', 'four', '', 'videos/vlc-record-2021-02-09-18h40m39s-Laravel PHP Framework Tutorial - Full Course for Beginners (2'),
(12, 'user', 'God is good9999', 'Martins', 'I am God\'s own', 'videos/VID_20210101_185726.mp4'),
(15, 'user', 'A test', 'Taste and See', 'God is good', 'videos/VID_20210101_211211.mp4'),
(16, 'engrmartins', 'Engineering Mathematics', 'new topic', 'God is good', 'videos/Dashboard UX.mov'),
(17, 'user', 'A test', 'four', 'lets see', 'videos/VID_20210101_203043.mp4'),
(18, 'user', 'A test', 'four', 'lets see', 'videos/VID_20210101_203043.mp4'),
(19, 'user', 'A test', 'four', 'lets see', 'videos/VID_20210101_203043.mp4'),
(20, 'user', 'God is good9999', 'working', 'short and effective', 'videos/VID_20210101_203427.mp4'),
(21, 'user', 'God is good9999', 'testing testing', 'sdfgh vgybuhnjmk fgbhjnk', 'videos/Dora and the Lost City of Gold (2019) (NetNaija.com).mp4'),
(22, 'test4', 'final course', 'Promisesghbl', 'jvkbln;moo', 'videos/Dora and the Lost City of Gold (2019) (NetNaija.com).mp4'),
(23, 'test4', 'final course', 'Promisesghbl', 'jvkbln;moo', 'videos/Dora and the Lost City of Gold (2019) (NetNaija.com).mp4'),
(24, 'test4', 'final course', 'Promisesghbl', 'jvkbln;moo', 'videos/Dora and the Lost City of Gold (2019) (NetNaija.com).mp4'),
(25, 'test4', 'final course', 'Promisesghbl', 'jvkbln;moo', 'videos/Dora and the Lost City of Gold (2019) (NetNaija.com).mp4'),
(26, 'test4', 'final course', 'Promisesghbl', 'jvkbln;moo', 'videos/Dora and the Lost City of Gold (2019) (NetNaija.com).mp4'),
(27, 'user', 'goodluck', 'cfjvghbjk', 'sdgfhgjhjk', 'videos/ferd.mp4'),
(28, 'user', 'goodluck', 'xctvyukom', 'pgy jfvghbkjn', 'videos/Dora and the Lost City of Gold (2019) (NetNaija.com).mp4'),
(29, 'user', '', 'ijkj dfhghsdfghd', 'xcfvgbh uluink tyun vgbjhk', 'videos/The life changing magic of not giving a fuck.mp4');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_bin NOT NULL,
  `firstname` varchar(50) COLLATE utf8_bin NOT NULL DEFAULT '',
  `lastname` varchar(50) COLLATE utf8_bin NOT NULL DEFAULT '',
  `position` varchar(20) COLLATE utf8_bin NOT NULL,
  `email` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(50) COLLATE utf8_bin NOT NULL,
  `create_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `firstname`, `lastname`, `position`, `email`, `password`, `create_datetime`) VALUES
(1, 'test1', 'John', 'Doe', 'lecturer', 'test1@test.com', '1adbb3178591fd5bb0c248518f39bf6d', '2021-03-13 08:10:38'),
(2, 'test2', 'Tiwa', 'Savage', 'student', 'test2@test.com', '1adbb3178591fd5bb0c248518f39bf6d', '2021-03-13 11:30:33'),
(3, 'test3', '', '', 'student', 'test3@test.com', '1adbb3178591fd5bb0c248518f39bf6d', '2021-03-13 11:37:57'),
(4, 'test4', '', '', 'lecturer', 'test4@test.com', '1adbb3178591fd5bb0c248518f39bf6d', '2021-03-13 11:38:41'),
(5, 'user', 'Michael', 'Johnson', 'lecturer', 'user@test.com', '1adbb3178591fd5bb0c248518f39bf6d', '2021-03-14 01:22:18'),
(6, 'martins', '', '', 'lecturer', 'me@me.com', '978f6f608df5279d4d85e700d83ac873', '2021-03-18 21:38:21'),
(7, 'engrmartins', 'Martins', 'Enobong', 'lecturer', 'engrmartinsbase@gmail.com', '1adbb3178591fd5bb0c248518f39bf6d', '2021-03-24 12:53:31'),
(9, 'ogo2', 'ogogo', 'ogogo', 'student', 'ogo2@gmail.com', '1adbb3178591fd5bb0c248518f39bf6d', '2021-03-24 20:49:09'),
(10, 'mo10', 'martin', 'odegaard', 'lecturer', 'modegaard@arsenal.com', '1adbb3178591fd5bb0c248518f39bf6d', '2021-03-24 20:49:54'),
(11, 'specialone', 'jose', 'mohrinho', 'student', 'specialone@gmail.com', '1adbb3178591fd5bb0c248518f39bf6d', '2021-03-24 20:51:39'),
(12, 'obi10', 'mikel', 'obi', 'student', 'mikelobi@nfa.com', '1adbb3178591fd5bb0c248518f39bf6d', '2021-03-24 20:54:23'),
(13, 'stg', 'steven', 'gerard', 'student', 'stg@pool.com', '1adbb3178591fd5bb0c248518f39bf6d', '2021-03-25 02:39:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
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
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

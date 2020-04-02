-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2020 at 01:55 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `admine`
--

CREATE TABLE `admine` (
  `cne` varchar(10) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admine`
--

INSERT INTO `admine` (`cne`, `firstName`, `lastName`, `email`, `password`) VALUES
('J545748', 'Amrouch', 'Mustapha', 'med.oblla@gmail.com', '$2y$10$lWLTexUGqMcV3ROFHzJoQe9TmHeGhgjY/.bcYntkRDY5OLzxMMUO2');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `idNew` int(11) NOT NULL,
  `cneAuthor` varchar(50) NOT NULL,
  `contentComment` text NOT NULL,
  `dateComment` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `idNew`, `cneAuthor`, `contentComment`, `dateComment`) VALUES
(2, 1, 'jy36121', 'qksfdfkj', '2020-03-08 23:00:00'),
(3, 1, 'jy36121', 'oussama is the best', '2020-03-09 08:35:00'),
(4, 1, 'jy36121', 'hello zine cv', '2020-03-09 08:55:36'),
(5, 6, 'C130115737', 'hello', '2020-03-11 16:06:56');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `numCourse` int(11) NOT NULL,
  `nameCourse` varchar(100) NOT NULL,
  `descriptionCourse` text NOT NULL,
  `level` int(11) NOT NULL,
  `imageCourse` varchar(191) NOT NULL,
  `teacherId` int(11) NOT NULL,
  `pdf` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`numCourse`, `nameCourse`, `descriptionCourse`, `level`, `imageCourse`, `teacherId`, `pdf`) VALUES
(1, 'Advanced DataBase', 'you will learn a lot of new advanced databases ', 2, 'https://i.ytimg.com/vi/LXFJYwHI12A/hqdefault.jpg', 20, ''),
(2, 'Advanced DataBase', 'you will learn a lot of new advanced databases ', 2, 'https://i.ytimg.com/vi/LXFJYwHI12A/hqdefault.jpg', 20, ''),
(3, 'software engineering', 'you will learn a lot of new software engineering ', 2, 'https://www.peculiar-coding-endeavours.com/assets/haitse/ai.png', 17, ''),
(4, 'Java', ' welcome you will learn Java', 2, 'https://img.lemde.fr/2010/08/13/0/0/1200/600/688/0/60/0/ill_1398567_d733_java.png', 19, ''),
(5, 'Matematiques', 'welcome in world of simple complexity ', 2, 'https://images.theconversation.com/files/139426/original/image-20160927-14593-1rf92dt.jpg?ixlib=rb-1.1.0&q=45&auto=format&w=496&fit=clip', 21, ''),
(6, 'PHP', 'Back End Goes Here ', 2, 'https://ngs-it.com/files/news/what_new_php_7_4.jpg', 1, ''),
(7, 'Tec', 'You wanna Communicates come here ', 2, 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/ba/Transport_en_Commun_logo.svg/1200px-Transport_en_Commun_logo.svg.png', 16, ''),
(8, 'English', 'Let us descus hh  ', 2, 'https://previews.123rf.com/images/lenm/lenm1708/lenm170800235/84247147-stickman-illustration-featuring-the-words-english-club-surrounded-by-young-kids.jpg', 14, ''),
(9, 'jdosjoifcd', 'jdosjoifcd', 1, 'courses/8db11804-3d64-435e-bf5d-2f49f6dc4fd2.jpg', 15, ''),
(10, 'jdosjoifcd', 'jdosjoifcd', 2, 'courses/8db11804-3d64-435e-bf5d-2f49f6dc4fd2211111.jpg', 12, ''),
(11, 'jdosjoifcd', 'jdosjoifcd', 1, 'courses/1.jpeg', 12, 'courses/18MA000497_SummaryPDFEn.pdf'),
(12, 'jdosjoifcd', 'jdosjoifcd', 1, 'courses/201802201256_0006.jpg', 10, 'courses/verso.docx');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `nameEvent` varchar(191) NOT NULL,
  `locationEvent` varchar(191) NOT NULL,
  `descriptionEvent` text NOT NULL,
  `dateEvent` date NOT NULL,
  `imageEvent` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `nameEvent`, `locationEvent`, `descriptionEvent`, `dateEvent`, `imageEvent`) VALUES
(1, 'Ecommerce', 'emphi 2', 'ndustry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularise', '2020-03-03', 'https://www.webmarketing-com.com/wp-content/uploads/2017/07/tof-ecommerce.jpg'),
(2, 'Ecommerce v2', 'emphi 2', 'ndustry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularise', '2020-03-03', 'https://www.webmarketing-com.com/wp-content/uploads/2017/07/tof-ecommerce.jpg'),
(3, 'Ecommerce V3', 'salle 256', 'ndustry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularise', '2020-04-03', 'https://mouseflow.com/wp-content/uploads/2019/04/ecommerce-strategies.jpg'),
(4, 'Ecommerce', 'emphi 2', 'ndustry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularise', '2020-03-03', 'https://www.webmarketing-com.com/wp-content/uploads/2017/07/tof-ecommerce.jpg'),
(5, 'DEV FEST', 'emphi 1', 'ndustry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularise', '2020-02-05', 'https://secure.meetupstatic.com/photos/event/9/9/c/5/600_475779365.jpeg'),
(6, 'Music', 'salle 22', 'ndustry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularise', '2021-03-03', 'https://musicoomph.com/wp-content/uploads/2018/03/benefits-of-going-to-live-music-concerts.jpg'),
(7, 'English Club', 'emphi 2', 'ndustry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularise', '2020-06-02', 'https://secure.meetupstatic.com/photos/event/6/e/3/8/highres_467068216.jpeg'),
(8, 'oussama', 'tata', 'hrerfpokrkoep', '2020-03-03', 'images/1.jpeg'),
(9, 'jdosjoifcd', 'jdosjoifcd', 'jdosjoifcd', '2020-04-18', 'images/dice2.png');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `email` varchar(100) NOT NULL,
  `fullName` varchar(100) NOT NULL,
  `message` longtext NOT NULL,
  `Statu` int(10) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`email`, `fullName`, `message`, `Statu`, `id`) VALUES
('hamid.ouardini55@gmail.com', 'OUSSAMA', 'hello data base', 1, 1),
('gopas@app-mailer.com', 'OUSSAMA', 'hello world', 1, 2),
('ouss.ouardini@gmail.com', 'OUSSAMA', 'hello world', 1, 3),
('med.oblla@gmail.com', 'OUSSAMA', 'gererrvrv', 0, 4),
('ouss.ouardini@gmail.com', 'OUSSAMA', 'hello worlfdhiouhvsfd ', 0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `titleNews` varchar(191) NOT NULL,
  `descriptionNews` varchar(191) NOT NULL,
  `contentNews` text NOT NULL,
  `imageNews` text NOT NULL,
  `dateNews` date NOT NULL,
  `nbCommentsNews` int(11) NOT NULL,
  `idAuthorNews` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `titleNews`, `descriptionNews`, `contentNews`, `imageNews`, `dateNews`, `nbCommentsNews`, `idAuthorNews`) VALUES
(27, 'jdosjoifcd', 'jdosjoifcd', '<p>stdsrthrhhtr</p>', 'images/8db11804-3d64-435e-bf5d-2f49f6dc4fd2.jpg', '2020-03-25', 0, 0),
(28, 'oussama', 'jdosjoifcd', '<p>stdsrthrhhtr</p>', 'images/1.jpeg', '2020-03-25', 0, 0),
(29, 'jdosjoifcd', 'jdosjoifcd', '<p>stdsrthrhhtr</p>', 'images/5c0c7112-3d7e-49b4-a83f-72cfd5648b69.jpg', '2020-03-25', 0, 0),
(30, 'jdosjoifcd', 'jdosjoifcd', '<p>stdsrthrhhtr</p>', 'images/ball2.png', '2020-04-02', 0, 0),
(31, 'jdosjoifcd', 'jdosjoifcd', '<p>stdsrthrhhtrdddd</p>', 'images/dice5.png', '2020-04-02', 0, 0),
(32, 'jdosjoifcd', 'jdosjoifcd', '<p>stdsrthrhhtr</p>', 'images/ball3.png', '2020-04-02', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `parrent_comment_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `comment_sender_name` varchar(191) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `subject` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `parrent_comment_id`, `comment`, `comment_sender_name`, `date`, `subject`) VALUES
(9, 0, 'please i have a question how r u ', 'oussama', '2020-03-23 12:38:49', 'software engineering'),
(10, 0, 'hello worldiohvfioudfvhlvdfgv', 'oussama', '2020-03-23 13:27:36', 'software engineering'),
(11, 10, 'dvuçhvfduhfv', 'oussama', '2020-03-23 13:27:48', 'Java'),
(12, 0, 'cdojfiodvhdfiovhfvuidhogcfudycg-ct(-cefcsuihcuihui', 'oussama', '2020-03-23 13:28:28', 'software engineering'),
(13, 10, 'rvrstrvf', 'oussama', '2020-03-23 13:28:38', 'software engineering'),
(14, 9, 'hello', 'admin', '2020-04-02 08:03:23', 'from admin'),
(15, 12, 'yeah awedi a hamid', 'admin', '2020-04-02 10:26:52', 'from admin');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `numTeach` int(11) NOT NULL,
  `nameTeach` varchar(100) NOT NULL,
  `desription` text NOT NULL,
  `fb` text NOT NULL,
  `linked` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`numTeach`, `nameTeach`, `desription`, `fb`, `linked`, `image`) VALUES
(1, 'amrouch', 'Research Scientist On Computer Vision, Pattern Recognition and Machine Learning', 'https://www.facebook.com/Iceberg.Mind', 'https://www.linkedin.com/in/mustapha-amrouch-720964b3/', 'images/profs/amrouch.jfif'),
(9, 'moubtahij', '', '', '', ''),
(10, 'sabour', '', '', '', ''),
(11, 'mazoul', '', '', '', ''),
(12, 'attoucha', '', '', '', ''),
(13, 'gridach', '', '', '', ''),
(14, 'chengoul', '', '', '', ''),
(15, 'profFrançais', '', '', '', ''),
(16, 'profTec', '', '', '', ''),
(17, 'Mezouary', '', '', '', ''),
(18, 'Hamout', '', '', '', ''),
(19, 'Mahani', '', '', '', ''),
(20, 'oubeda', '', '', '', ''),
(21, 'zemzami', '', '', '', ''),
(22, 'zemzami', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `year` varchar(100) DEFAULT NULL,
  `vkey` varchar(100) DEFAULT NULL,
  `cne` varchar(100) DEFAULT NULL,
  `verified` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `password`, `email`, `year`, `vkey`, `cne`, `verified`) VALUES
(7, 'oussama', 'ouardini', '$2y$10$LH8QvYutScFoCCqEeTo0MOhdv6LaB9fYEvL89QcyCem2e0d6Bt7J.', 'ouss.ouardini@gmail.com', '2', 'a971d656c3310181ba2277aa364416db', 'D132900261', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admine`
--
ALTER TABLE `admine`
  ADD PRIMARY KEY (`cne`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`numCourse`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`numTeach`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `numCourse` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `numTeach` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2021 at 04:04 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `websitedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` int(3) NOT NULL,
  `book_name` tinytext NOT NULL,
  `book_description` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `book_name`, `book_description`) VALUES
(1, 'كتاب الطهارة', 'وهذا الكتاب على صغر حجمه من أكثرها فائدةً، وأعظمها جدوى، وهو عمدة كبيرة عظيمة لطالب العلم؛ لما اشتمل عليه من الأحاديث الجياد العظيمة المنتق'),
(2, 'Card title', 'This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height actionThis is a wider card with supporting texThis is a wider card sssssssheight action.'),
(3, 'كتاب الصلاة', 'وهذا الكتاب على صغر حجمه من أكثرها فائدةً، وأعظمها جدوى، وهو عمدة كبيرة عظيمة لطالب العلم؛ لما اشتمل222\r\n\r\n'),
(4, 'كتاب البيوع', 'لما اشتمل عليه من الأحاديث الجياد العظيمة المنتق'),
(5, 'كتاب الحج', 'tent than the first to show that equal height actionThis is a wider card with supporting texThis is a wider card sssssssheight a'),
(6, 'كتاب الالزكاة', 'وهذا الكتاب على صغر حجمه من أكثرها فائدةً، وأعظمها جدوى، وهو عمدة كبيرة عظيمة لطالب العلم؛ لما اشتمل222\r\n\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `cases`
--

CREATE TABLE `cases` (
  `case_id` int(6) NOT NULL,
  `case_name` tinytext NOT NULL,
  `case_section` int(5) NOT NULL,
  `case_description` tinytext DEFAULT NULL,
  `case_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cases`
--

INSERT INTO `cases` (`case_id`, `case_name`, `case_section`, `case_description`, `case_date`) VALUES
(1, 'حكم الماء الباقي على خلقته', 6, 'ماهو حكم الماء الباقي على خلقته واقولهم فيه', '2020-05-28 07:07:47'),
(2, 'أقسام المياه', 6, 'If this new way of life had not been as successful as it was, Alexander’s legacy would not be as memorable and groundbreaking. Because he conquered many', '2020-12-25 00:20:10'),
(3, 'الماء المستعمل في طهارة حدث أو نجاسة', 6, 'الماء المستعمل في طهارة حدث أو نجاسةالماء المستعمل في طهارة حدث أو نجاسةالماء المستعمل في طهارة حدث أو نجاسة', '2020-05-28 07:10:52');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment_parent` int(11) DEFAULT NULL,
  `comment_body` text NOT NULL,
  `comment_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `comment_visible` bit(1) DEFAULT b'1',
  `comment_by` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_parent`, `comment_body`, `comment_date`, `comment_visible`, `comment_by`) VALUES
(1, NULL, 'COMMENT 1    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.\r\n\r\n', '2021-03-06 14:49:25', b'1', 1),
(2, 1, '2/1 Donec sed odio dui. Nullam quis risus eget urna mollis ornare vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.\r\n\r\n', '2021-03-06 14:49:38', b'1', 1),
(3, 2, '3/2/1   Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.\r\n', '2021-03-06 14:50:13', b'1', 1),
(4, NULL, '4   Donec sed odio dui. Nullam quis risus eget urna mollis ornare vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.\r\n\r\n', '2021-03-06 14:50:20', b'1', 1),
(5, 4, '5/4   Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.\r\n\r\n', '2021-03-06 14:50:27', b'1', 1),
(6, 2, '6/2/1   Donec sed odio dui. Nullam quis risus eget urna mollis ornare vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.\r\n\r\n', '2021-03-06 14:50:33', b'1', 1),
(7, 3, '7/3/2/1   Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.\r\n', '2021-03-06 14:50:39', b'1', 2),
(8, 3, '8/3/2/1', '2021-03-06 18:48:46', b'1', 1),
(9, 7, '9/7/3/2/1', '2021-03-06 18:49:39', b'1', 1),
(10, 4, '10/4', '2021-03-06 18:54:33', b'1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `content_id` int(10) NOT NULL,
  `content_section` int(5) NOT NULL,
  `content_sayer` int(5) NOT NULL,
  `content_by` int(10) NOT NULL,
  `content_content` text NOT NULL,
  `content_case` tinytext NOT NULL,
  `content_case_description` tinytext NOT NULL,
  `content_source` tinytext NOT NULL,
  `content_visible` bit(1) DEFAULT b'1',
  `content_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`content_id`, `content_section`, `content_sayer`, `content_by`, `content_content`, `content_case`, `content_case_description`, `content_source`, `content_visible`, `content_date`) VALUES
(1, 6, 1, 1, 'Ex consequat commodo adipisicing exercitation aute excepteur occaecat ullamco duis aliqua id magna ullamco eu. Do aute ipsum ipsum ullamco cillum consectetur ut et aute consectetur labore. Fugiat laborum incididunt tempor eu consequat enim dolore proident.\r\n  Qui laborum do non excepteur nulla magna eiusmod consectetur in. Aliqua et aliqua officia quis et incididunt voluptate non anim reprehenderit adipisicing dolore ut consequat deserunt mollit dolore. Aliquip nulla enim veniam gg', 'حكم الماء الباقي على خلقته', 'case description fsdgfdsfsd gg', 'This is the say_source', b'1', '2021-02-25 07:22:38'),
(8, 6, 1, 1, 'lll nggg', 'ccccc', 'ddddd', 'ssss', b'1', '2021-02-25 07:46:33');

-- --------------------------------------------------------

--
-- Table structure for table `inputs`
--

CREATE TABLE `inputs` (
  `input_id` int(11) NOT NULL,
  `input_subject` tinytext NOT NULL,
  `input_type` enum('say','case','sayer') NOT NULL,
  `input_status` enum('pending','rejected','accepted') NOT NULL DEFAULT 'pending',
  `Input_content` text NOT NULL,
  `Input_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `input_by` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sayers`
--

CREATE TABLE `sayers` (
  `sayer_id` int(5) NOT NULL,
  `sayer_name` tinytext NOT NULL,
  `sayer_party` tinytext NOT NULL,
  `sayer_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sayers`
--

INSERT INTO `sayers` (`sayer_id`, `sayer_name`, `sayer_party`, `sayer_description`) VALUES
(1, 'Ahmed bin hanbil', 'hanbili', 'This is description for Ahmed'),
(2, 'imam malik', 'maliki', 'This is description for mailik');

-- --------------------------------------------------------

--
-- Table structure for table `says`
--

CREATE TABLE `says` (
  `say_id` int(10) NOT NULL,
  `say_subject` tinytext NOT NULL,
  `say_case` int(6) NOT NULL,
  `sayer` int(5) NOT NULL,
  `say_by` int(10) NOT NULL,
  `say_content` text NOT NULL,
  `say_source` tinytext NOT NULL,
  `say_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `say_party` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `says`
--

INSERT INTO `says` (`say_id`, `say_subject`, `say_case`, `sayer`, `say_by`, `say_content`, `say_source`, `say_date`, `say_party`) VALUES
(2, 'Ahmed bin hanbil', 1, 1, 1, 'Ex consequat commodo adipisicing exercitation aute excepteur occaecat ullamco duis aliqua id magna ullamco eu. Do aute ipsum ipsum ullamco cillum consectetur ut et aute consectetur labore. Fugiat laborum incididunt tempor eu consequat enim dolore proident.\r\n  Qui laborum do non excepteur nulla magna eiusmod consectetur in. Aliqua et aliqua officia quis et incididunt voluptate non anim reprehenderit adipisicing dolore ut consequat deserunt mollit dolore. Aliquip nulla enim veniam\r\n  non fugiat id cupidatat nulla elit cupidatat commodo velit ut eiusmod cupidatat elit dolore. Ex consequat commodo adipisicing exercitation aute excepteur occaecat ullamco duis aliqua id magna ullamco eu. Do aute ipsum ipsum ullamco cillum consectetur ut et aute consectetur labore. Fugiat laborum incididunt tempor eu consequat enim dolore proident.\r\n  Qui laborum do non excepteur nulla magna eiusmod consectetur in. Aliqua et aliqua officia quis et incididunt voluptate non anim reprehenderit adipisicing dolore ut consequat deserunt mollit dolore. Aliquip nulla enim veniam\r\n  non fugiat id cupidatat nulla elit cupidatat commodo velit ut eiusmod cupidatat elit dolore.Ex consequat commodo adipisicing exercitation aute excepteur occaecat ullamco duis aliqua id magna ullamco eu. Do aute ipsum ipsum ullamco cillum consectetur ut et aute consectetur labore. Fugiat laborum incididunt tempor eu consequat enim dolore proident.\r\n  Qui laborum do non excepteur nulla magna eiusmod consectetur in. Aliqua et aliqua officia quis et incididunt voluptate non anim reprehenderit adipisicing dolore ut consequat deserunt mollit dolore. Aliquip nulla enim veniam\r\n  non fugiat id cupidatat nulla elit cupidatat commodo velit ut eiusmod cupidatat elit dolore.', 'This is the say_source', '2020-05-29 08:20:11', 'hanbili'),
(3, 'Ahmed bin hanbil 2', 1, 1, 1, 'Ex consequat commodo adipisicing exercitation aute excepteur occaecat ullamco duis aliqua id magna ullamco eu. Do aute ipsum ipsum ullamco cillum consectetur ut et aute consectetur labore. Fugiat laborum incididunt tempor eu consequat enim dolore proident.\r\n  Qui laborum do non excepteur nulla magna eiusmod consectetur in. Aliqua et aliqua officia quis et incididunt voluptate non anim reprehenderit adipisicing dolore ut consequat deserunt mollit dolore. Aliquip nulla enim veniam\r\n  non fugiat id cupidatat nulla elit cupidatat commodo velit ut eiusmod cupidatat elit dolore. Ex consequat commodo adipisicing exercitation aute excepteur occaecat ullamco duis aliqua id magna ullamco eu. Do aute ipsum ipsum ullamco cillum consectetur ut et aute consectetur labore. Fugiat laborum incididunt tempor eu consequat enim dolore proident.\r\n  Qui laborum do non excepteur nulla magna eiusmod consectetur in. Aliqua et aliqua officia quis et incididunt voluptate non anim reprehenderit adipisicing dolore ut consequat deserunt mollit dolore. Aliquip nulla enim veniam\r\n  non fugiat id cupidatat nulla elit cupidatat commodo velit ut eiusmod cupidatat elit dolore.Ex consequat commodo adipisicing exercitation aute excepteur occaecat ullamco duis aliqua id magna ullamco eu. Do aute ipsum ipsum ullamco cillum consectetur ut et aute consectetur labore. Fugiat laborum incididunt tempor eu consequat enim dolore proident.\r\n  Qui laborum do non excepteur nulla magna eiusmod consectetur in. Aliqua et aliqua officia quis et incididunt voluptate non anim reprehenderit adipisicing dolore ut consequat deserunt mollit dolore. Aliquip nulla enim veniam\r\n  non fugiat id cupidatat nulla elit cupidatat commodo velit ut eiusmod cupidatat elit dolore.', 'This is the say_source 2', '2020-05-29 08:36:25', 'hanbili'),
(4, 'imam malik 1', 1, 2, 1, 'Ex consequat commodo adipisicing exercitation aute excepteur occaecat ullamco duis aliqua id magna ullamco eu. Do aute ipsum ipsum ullamco cillum consectetur ut et aute consectetur labore. Fugiat laborum incididunt tempor eu consequat enim dolore proident.\r\n  Qui laborum do non excepteur nulla magna eiusmod consectetur in. Aliqua et aliqua officia quis et incididunt voluptate non anim reprehenderit adipisicing dolore ut consequat deserunt mollit dolore. Aliquip nulla enim veniam\r\n  non fugiat id cupidatat nulla elit cupidatat commodo velit ut eiusmod cupidatat elit dolore. Ex consequat commodo adipisicing exercitation aute excepteur occaecat ullamco duis aliqua id magna ullamco eu. Do aute ipsum ipsum ullamco cillum consectetur ut et aute consectetur labore. Fugiat laborum incididunt tempor eu consequat enim dolore proident.\r\n  Qui laborum do non excepteur nulla magna eiusmod consectetur in. Aliqua et aliqua officia quis et incididunt voluptate non anim reprehenderit adipisicing dolore ut consequat deserunt mollit dolore. Aliquip nulla enim veniam\r\n  non fugiat id cupidatat nulla elit cupidatat commodo velit ut eiusmod cupidatat elit dolore.Ex consequat commodo adipisicing exercitation aute excepteur occaecat ullamco duis aliqua id magna ullamco eu. Do aute ipsum ipsum ullamco cillum consectetur ut et aute consectetur labore. Fugiat laborum incididunt tempor eu consequat enim dolore proident.\r\n  Qui laborum do non excepteur nulla magna eiusmod consectetur in. Aliqua et aliqua officia quis et incididunt voluptate non anim reprehenderit adipisicing dolore ut consequat deserunt mollit dolore. Aliquip nulla enim veniam\r\n  non fugiat id cupidatat nulla elit cupidatat commodo velit ut eiusmod cupidatat elit dolore.', 'This is the say_source for malik', '2020-05-29 08:32:25', 'maliki');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `section_id` int(5) NOT NULL,
  `section_name` tinytext NOT NULL,
  `section_cat` int(3) NOT NULL,
  `section_description` tinytext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`section_id`, `section_name`, `section_cat`, `section_description`) VALUES
(6, 'باب المياه', 1, 'باب المياهباب المياهباب المياهباب المياهباب المياهباب المياه'),
(7, 'باب الآنية', 1, 'شرح لباب الآنيةشرح لباب الآنيةشرح لباب الآنية');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) NOT NULL,
  `user_name` tinytext NOT NULL,
  `user_email` tinytext NOT NULL,
  `user_nickname` tinytext NOT NULL,
  `user_pass` tinytext NOT NULL,
  `user_level` int(1) NOT NULL DEFAULT 1,
  `user_gender` enum('m','f') DEFAULT NULL,
  `sign_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_avatar` tinytext DEFAULT NULL,
  `user_country` tinytext DEFAULT NULL,
  `user_ip` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_nickname`, `user_pass`, `user_level`, `user_gender`, `sign_date`, `user_avatar`, `user_country`, `user_ip`) VALUES
(1, 'Ali', 'Ali@gmail.com', 'Abofahad', '$2y$10$eqJH/EFp8mKPtvd9hpJQbOULQUsQU4gx7C6Wqtm715RIs8CsufSpm', 5, NULL, '2020-05-27 13:17:16', NULL, 'qweeqw123123', '::1'),
(2, 'Ali2', 'Ali2@gmail.com', 'Abofahad2', '$2y$10$1yKAUc985WWriAO5ZoNaNOHeKpu6dRLjlOYR48.wmQT6qJkkx0ddS', 1, NULL, '2021-02-01 11:55:49', NULL, 'Saudi Arabia', '::1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`),
  ADD UNIQUE KEY `book_name` (`book_name`) USING HASH;

--
-- Indexes for table `cases`
--
ALTER TABLE `cases`
  ADD PRIMARY KEY (`case_id`),
  ADD UNIQUE KEY `case_name` (`case_name`) USING HASH,
  ADD KEY `case_section` (`case_section`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `comment_by` (`comment_by`);

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`content_id`),
  ADD KEY `content_section` (`content_section`),
  ADD KEY `content_sayer` (`content_sayer`),
  ADD KEY `content_by` (`content_by`);

--
-- Indexes for table `inputs`
--
ALTER TABLE `inputs`
  ADD PRIMARY KEY (`input_id`),
  ADD KEY `input_by` (`input_by`);

--
-- Indexes for table `sayers`
--
ALTER TABLE `sayers`
  ADD PRIMARY KEY (`sayer_id`),
  ADD UNIQUE KEY `sayer_name` (`sayer_name`) USING HASH;

--
-- Indexes for table `says`
--
ALTER TABLE `says`
  ADD PRIMARY KEY (`say_id`),
  ADD UNIQUE KEY `say_subject` (`say_subject`) USING HASH,
  ADD KEY `say_case` (`say_case`),
  ADD KEY `sayer` (`sayer`),
  ADD KEY `say_by` (`say_by`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`section_id`),
  ADD UNIQUE KEY `section_name` (`section_name`) USING HASH,
  ADD KEY `section_cat` (`section_cat`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`,`user_email`) USING HASH;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `cases`
--
ALTER TABLE `cases`
  MODIFY `case_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `content_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `inputs`
--
ALTER TABLE `inputs`
  MODIFY `input_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sayers`
--
ALTER TABLE `sayers`
  MODIFY `sayer_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `says`
--
ALTER TABLE `says`
  MODIFY `say_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `section_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cases`
--
ALTER TABLE `cases`
  ADD CONSTRAINT `cases_ibfk_1` FOREIGN KEY (`case_section`) REFERENCES `sections` (`section_id`) ON UPDATE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`comment_by`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE;

--
-- Constraints for table `content`
--
ALTER TABLE `content`
  ADD CONSTRAINT `content_ibfk_1` FOREIGN KEY (`content_section`) REFERENCES `sections` (`section_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `content_ibfk_2` FOREIGN KEY (`content_sayer`) REFERENCES `sayers` (`sayer_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `content_ibfk_3` FOREIGN KEY (`content_by`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE;

--
-- Constraints for table `inputs`
--
ALTER TABLE `inputs`
  ADD CONSTRAINT `inputs_ibfk_1` FOREIGN KEY (`input_by`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE;

--
-- Constraints for table `says`
--
ALTER TABLE `says`
  ADD CONSTRAINT `says_ibfk_1` FOREIGN KEY (`say_case`) REFERENCES `cases` (`case_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `says_ibfk_2` FOREIGN KEY (`sayer`) REFERENCES `sayers` (`sayer_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `says_ibfk_3` FOREIGN KEY (`say_by`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE;

--
-- Constraints for table `sections`
--
ALTER TABLE `sections`
  ADD CONSTRAINT `sections_ibfk_1` FOREIGN KEY (`section_cat`) REFERENCES `books` (`book_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2018 at 05:27 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `challenge`
--

-- --------------------------------------------------------

--
-- Table structure for table `l_answers`
--

CREATE TABLE `l_answers` (
  `id` int(11) NOT NULL,
  `answer` text,
  `ques_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `l_exam_sections`
--

CREATE TABLE `l_exam_sections` (
  `id` int(11) NOT NULL,
  `exam_id` int(11) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `l_language_exams`
--

CREATE TABLE `l_language_exams` (
  `id` int(11) NOT NULL,
  `exam_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `l_parts`
--

CREATE TABLE `l_parts` (
  `id` int(11) NOT NULL,
  `part` int(11) DEFAULT NULL,
  `exam_section_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `l_questions`
--

CREATE TABLE `l_questions` (
  `id` int(11) NOT NULL,
  `question` text,
  `part_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `l_sections`
--

CREATE TABLE `l_sections` (
  `id` int(11) NOT NULL,
  `section_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `l_true_ques_answers`
--

CREATE TABLE `l_true_ques_answers` (
  `id` int(11) NOT NULL,
  `ques_id` int(11) DEFAULT NULL,
  `ans_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pr_answers`
--

CREATE TABLE `pr_answers` (
  `id` int(11) NOT NULL,
  `answer` text,
  `question_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pr_exams`
--

CREATE TABLE `pr_exams` (
  `id` int(11) NOT NULL,
  `exam_name` varchar(200) DEFAULT NULL,
  `field_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pr_exam_topics`
--

CREATE TABLE `pr_exam_topics` (
  `id` int(11) NOT NULL,
  `topic_id` int(11) DEFAULT NULL,
  `exam_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pr_fields`
--

CREATE TABLE `pr_fields` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pr_prog_exams`
--

CREATE TABLE `pr_prog_exams` (
  `id` int(11) NOT NULL,
  `exam_name` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pr_prog_exams`
--

INSERT INTO `pr_prog_exams` (`id`, `exam_name`) VALUES
(1, '1ZO-071');

-- --------------------------------------------------------

--
-- Table structure for table `pr_questions`
--

CREATE TABLE `pr_questions` (
  `id` int(11) NOT NULL,
  `question` text,
  `exam_topic_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pr_question_answers`
--

CREATE TABLE `pr_question_answers` (
  `id` int(11) NOT NULL,
  `question_id` int(11) DEFAULT NULL,
  `answer_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pr_topics`
--

CREATE TABLE `pr_topics` (
  `id` int(11) NOT NULL,
  `topic_name` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `role_permissions`
--

CREATE TABLE `role_permissions` (
  `id` int(11) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `permission_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sb_answers`
--

CREATE TABLE `sb_answers` (
  `id` int(11) NOT NULL,
  `answer` varchar(100) DEFAULT NULL,
  `quest_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sb_exam_books`
--

CREATE TABLE `sb_exam_books` (
  `id` int(11) NOT NULL,
  `book_name` varchar(100) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sb_learning_books`
--

CREATE TABLE `sb_learning_books` (
  `id` int(11) NOT NULL,
  `book_name` varchar(100) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sb_questions`
--

CREATE TABLE `sb_questions` (
  `id` int(11) NOT NULL,
  `question` varchar(100) DEFAULT NULL,
  `true_answer_id` int(11) DEFAULT NULL,
  `topic_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sb_subjects`
--

CREATE TABLE `sb_subjects` (
  `id` int(11) NOT NULL,
  `subject_name` varchar(100) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sb_subject_type`
--

CREATE TABLE `sb_subject_type` (
  `id` int(11) NOT NULL,
  `type_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sb_topics`
--

CREATE TABLE `sb_topics` (
  `id` int(11) NOT NULL,
  `topic_name` varchar(100) DEFAULT NULL,
  `book_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`) VALUES
(1, 'Kimya'),
(2, 'Fizika'),
(3, 'Riyaziyyat');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `birthday` varchar(10) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `activated` tinyint(1) NOT NULL,
  `token` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `firstname`, `lastname`, `email`, `gender`, `birthday`, `password`, `activated`, `token`) VALUES
(4, 'resad07', 'Rashad', 'Mehdiyev', 'rshdmhdyv@gmail.com', 'male', '24.04.1993', '$2y$10$ZFwZcY4sXGDhUTj0GeO8t.l3lf1IUxh8DXalcDatqRLikB0p9jUAC', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `l_answers`
--
ALTER TABLE `l_answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ques_id_fk` (`ques_id`);

--
-- Indexes for table `l_exam_sections`
--
ALTER TABLE `l_exam_sections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exam_id_fk` (`exam_id`),
  ADD KEY `section_id_fk` (`section_id`);

--
-- Indexes for table `l_language_exams`
--
ALTER TABLE `l_language_exams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `l_parts`
--
ALTER TABLE `l_parts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exam_section_id_fk` (`exam_section_id`);

--
-- Indexes for table `l_questions`
--
ALTER TABLE `l_questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `part_id_fk` (`part_id`);

--
-- Indexes for table `l_sections`
--
ALTER TABLE `l_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `l_true_ques_answers`
--
ALTER TABLE `l_true_ques_answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ques_id_fk` (`ques_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pr_answers`
--
ALTER TABLE `pr_answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_question_id_pr_answers` (`question_id`);

--
-- Indexes for table `pr_exams`
--
ALTER TABLE `pr_exams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `filed_id_fk` (`field_id`);

--
-- Indexes for table `pr_exam_topics`
--
ALTER TABLE `pr_exam_topics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_topic_id_pr_exam_topics` (`topic_id`),
  ADD KEY `fk_exam_id_pr_exam_topics` (`exam_id`);

--
-- Indexes for table `pr_fields`
--
ALTER TABLE `pr_fields`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pr_prog_exams`
--
ALTER TABLE `pr_prog_exams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pr_questions`
--
ALTER TABLE `pr_questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_exam_topic_id_pr_exam_topics` (`exam_topic_id`);

--
-- Indexes for table `pr_question_answers`
--
ALTER TABLE `pr_question_answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_question_id_pr_question_answers` (`question_id`),
  ADD KEY `fk_answer_id_pr_question_answers` (`answer_id`);

--
-- Indexes for table `pr_topics`
--
ALTER TABLE `pr_topics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_permission_id_fk` (`role_id`),
  ADD KEY `permission_id_fk` (`permission_id`);

--
-- Indexes for table `sb_answers`
--
ALTER TABLE `sb_answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quest_id_fk` (`quest_id`);

--
-- Indexes for table `sb_exam_books`
--
ALTER TABLE `sb_exam_books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subjec_id_fk` (`subject_id`);

--
-- Indexes for table `sb_learning_books`
--
ALTER TABLE `sb_learning_books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subjec_id_l_fk` (`subject_id`);

--
-- Indexes for table `sb_questions`
--
ALTER TABLE `sb_questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `topic_id_fk` (`topic_id`),
  ADD KEY `true_answer_id_fk` (`true_answer_id`);

--
-- Indexes for table `sb_subjects`
--
ALTER TABLE `sb_subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_id_fk` (`type_id`);

--
-- Indexes for table `sb_subject_type`
--
ALTER TABLE `sb_subject_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sb_topics`
--
ALTER TABLE `sb_topics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_id_fk` (`book_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_fk` (`user_id`),
  ADD KEY `role_id_fk` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `l_answers`
--
ALTER TABLE `l_answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pr_fields`
--
ALTER TABLE `pr_fields`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pr_prog_exams`
--
ALTER TABLE `pr_prog_exams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sb_answers`
--
ALTER TABLE `sb_answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sb_exam_books`
--
ALTER TABLE `sb_exam_books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sb_learning_books`
--
ALTER TABLE `sb_learning_books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sb_questions`
--
ALTER TABLE `sb_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sb_subjects`
--
ALTER TABLE `sb_subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sb_subject_type`
--
ALTER TABLE `sb_subject_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sb_topics`
--
ALTER TABLE `sb_topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `l_answers`
--
ALTER TABLE `l_answers`
  ADD CONSTRAINT `ques_id_ans_fk` FOREIGN KEY (`ques_id`) REFERENCES `l_questions` (`id`);

--
-- Constraints for table `l_exam_sections`
--
ALTER TABLE `l_exam_sections`
  ADD CONSTRAINT `exam_id_fk` FOREIGN KEY (`exam_id`) REFERENCES `l_language_exams` (`id`),
  ADD CONSTRAINT `section_id_fk` FOREIGN KEY (`section_id`) REFERENCES `l_sections` (`id`);

--
-- Constraints for table `l_parts`
--
ALTER TABLE `l_parts`
  ADD CONSTRAINT `exam_section_id_fk` FOREIGN KEY (`exam_section_id`) REFERENCES `l_exam_sections` (`id`);

--
-- Constraints for table `l_questions`
--
ALTER TABLE `l_questions`
  ADD CONSTRAINT `part_id_fk` FOREIGN KEY (`part_id`) REFERENCES `l_parts` (`id`);

--
-- Constraints for table `l_true_ques_answers`
--
ALTER TABLE `l_true_ques_answers`
  ADD CONSTRAINT `ques_id_fk` FOREIGN KEY (`ques_id`) REFERENCES `l_questions` (`id`);

--
-- Constraints for table `pr_answers`
--
ALTER TABLE `pr_answers`
  ADD CONSTRAINT `fk_question_id_pr_answers` FOREIGN KEY (`question_id`) REFERENCES `pr_questions` (`id`);

--
-- Constraints for table `pr_exams`
--
ALTER TABLE `pr_exams`
  ADD CONSTRAINT `filed_id_fk` FOREIGN KEY (`field_id`) REFERENCES `pr_fields` (`id`);

--
-- Constraints for table `pr_exam_topics`
--
ALTER TABLE `pr_exam_topics`
  ADD CONSTRAINT `fk_exam_id_pr_exam_topics` FOREIGN KEY (`exam_id`) REFERENCES `pr_exams` (`id`),
  ADD CONSTRAINT `fk_topic_id_pr_exam_topics` FOREIGN KEY (`topic_id`) REFERENCES `pr_topics` (`id`);

--
-- Constraints for table `pr_questions`
--
ALTER TABLE `pr_questions`
  ADD CONSTRAINT `fk_exam_topic_id_pr_exam_topics` FOREIGN KEY (`exam_topic_id`) REFERENCES `pr_exam_topics` (`id`);

--
-- Constraints for table `pr_question_answers`
--
ALTER TABLE `pr_question_answers`
  ADD CONSTRAINT `fk_answer_id_pr_question_answers` FOREIGN KEY (`answer_id`) REFERENCES `pr_answers` (`id`),
  ADD CONSTRAINT `fk_question_id_pr_question_answers` FOREIGN KEY (`question_id`) REFERENCES `pr_questions` (`id`);

--
-- Constraints for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD CONSTRAINT `permission_id_fk` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`),
  ADD CONSTRAINT `role_permission_id_fk` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `sb_answers`
--
ALTER TABLE `sb_answers`
  ADD CONSTRAINT `quest_id_fk` FOREIGN KEY (`quest_id`) REFERENCES `sb_questions` (`id`);

--
-- Constraints for table `sb_exam_books`
--
ALTER TABLE `sb_exam_books`
  ADD CONSTRAINT `subjec_id_fk` FOREIGN KEY (`subject_id`) REFERENCES `sb_subjects` (`id`);

--
-- Constraints for table `sb_learning_books`
--
ALTER TABLE `sb_learning_books`
  ADD CONSTRAINT `subjec_id_l_fk` FOREIGN KEY (`subject_id`) REFERENCES `sb_subjects` (`id`);

--
-- Constraints for table `sb_questions`
--
ALTER TABLE `sb_questions`
  ADD CONSTRAINT `topic_id_fk` FOREIGN KEY (`topic_id`) REFERENCES `sb_topics` (`id`),
  ADD CONSTRAINT `true_answer_id_fk` FOREIGN KEY (`true_answer_id`) REFERENCES `sb_answers` (`id`);

--
-- Constraints for table `sb_subjects`
--
ALTER TABLE `sb_subjects`
  ADD CONSTRAINT `type_id_fk` FOREIGN KEY (`type_id`) REFERENCES `sb_subject_type` (`id`);

--
-- Constraints for table `sb_topics`
--
ALTER TABLE `sb_topics`
  ADD CONSTRAINT `book_id_fk` FOREIGN KEY (`book_id`) REFERENCES `sb_exam_books` (`id`);

--
-- Constraints for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `role_id_fk` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

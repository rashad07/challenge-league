-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: challenge
-- ------------------------------------------------------
-- Server version	5.7.21-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `l_answers`
--

DROP TABLE IF EXISTS `l_answers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `l_answers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `answer` text,
  `ques_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ques_id_fk` (`ques_id`),
  CONSTRAINT `ques_id_ans_fk` FOREIGN KEY (`ques_id`) REFERENCES `l_questions` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `l_answers`
--

LOCK TABLES `l_answers` WRITE;
/*!40000 ALTER TABLE `l_answers` DISABLE KEYS */;
/*!40000 ALTER TABLE `l_answers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `l_exam_sections`
--

DROP TABLE IF EXISTS `l_exam_sections`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `l_exam_sections` (
  `id` int(11) NOT NULL,
  `exam_id` int(11) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `exam_id_fk` (`exam_id`),
  KEY `section_id_fk` (`section_id`),
  CONSTRAINT `exam_id_fk` FOREIGN KEY (`exam_id`) REFERENCES `l_language_exams` (`id`),
  CONSTRAINT `section_id_fk` FOREIGN KEY (`section_id`) REFERENCES `l_sections` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `l_exam_sections`
--

LOCK TABLES `l_exam_sections` WRITE;
/*!40000 ALTER TABLE `l_exam_sections` DISABLE KEYS */;
/*!40000 ALTER TABLE `l_exam_sections` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `l_language_exams`
--

DROP TABLE IF EXISTS `l_language_exams`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `l_language_exams` (
  `id` int(11) NOT NULL,
  `exam_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `l_language_exams`
--

LOCK TABLES `l_language_exams` WRITE;
/*!40000 ALTER TABLE `l_language_exams` DISABLE KEYS */;
/*!40000 ALTER TABLE `l_language_exams` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `l_parts`
--

DROP TABLE IF EXISTS `l_parts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `l_parts` (
  `id` int(11) NOT NULL,
  `part` int(11) DEFAULT NULL,
  `exam_section_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `exam_section_id_fk` (`exam_section_id`),
  CONSTRAINT `exam_section_id_fk` FOREIGN KEY (`exam_section_id`) REFERENCES `l_exam_sections` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `l_parts`
--

LOCK TABLES `l_parts` WRITE;
/*!40000 ALTER TABLE `l_parts` DISABLE KEYS */;
/*!40000 ALTER TABLE `l_parts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `l_questions`
--

DROP TABLE IF EXISTS `l_questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `l_questions` (
  `id` int(11) NOT NULL,
  `question` text,
  `part_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `part_id_fk` (`part_id`),
  CONSTRAINT `part_id_fk` FOREIGN KEY (`part_id`) REFERENCES `l_parts` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `l_questions`
--

LOCK TABLES `l_questions` WRITE;
/*!40000 ALTER TABLE `l_questions` DISABLE KEYS */;
/*!40000 ALTER TABLE `l_questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `l_sections`
--

DROP TABLE IF EXISTS `l_sections`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `l_sections` (
  `id` int(11) NOT NULL,
  `section_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `l_sections`
--

LOCK TABLES `l_sections` WRITE;
/*!40000 ALTER TABLE `l_sections` DISABLE KEYS */;
/*!40000 ALTER TABLE `l_sections` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `l_true_ques_answers`
--

DROP TABLE IF EXISTS `l_true_ques_answers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `l_true_ques_answers` (
  `id` int(11) NOT NULL,
  `ques_id` int(11) DEFAULT NULL,
  `ans_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ques_id_fk` (`ques_id`),
  CONSTRAINT `ques_id_fk` FOREIGN KEY (`ques_id`) REFERENCES `l_questions` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `l_true_ques_answers`
--

LOCK TABLES `l_true_ques_answers` WRITE;
/*!40000 ALTER TABLE `l_true_ques_answers` DISABLE KEYS */;
/*!40000 ALTER TABLE `l_true_ques_answers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pr_answers`
--

DROP TABLE IF EXISTS `pr_answers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pr_answers` (
  `id` int(11) NOT NULL,
  `answer` text,
  `question_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_question_id_pr_answers` (`question_id`),
  CONSTRAINT `fk_question_id_pr_answers` FOREIGN KEY (`question_id`) REFERENCES `pr_questions` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pr_answers`
--

LOCK TABLES `pr_answers` WRITE;
/*!40000 ALTER TABLE `pr_answers` DISABLE KEYS */;
/*!40000 ALTER TABLE `pr_answers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pr_exam_topics`
--

DROP TABLE IF EXISTS `pr_exam_topics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pr_exam_topics` (
  `id` int(11) NOT NULL,
  `topic_id` int(11) DEFAULT NULL,
  `exam_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_topic_id_pr_exam_topics` (`topic_id`),
  KEY `fk_exam_id_pr_exam_topics` (`exam_id`),
  CONSTRAINT `fk_exam_id_pr_exam_topics` FOREIGN KEY (`exam_id`) REFERENCES `pr_exams` (`id`),
  CONSTRAINT `fk_topic_id_pr_exam_topics` FOREIGN KEY (`topic_id`) REFERENCES `pr_topics` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pr_exam_topics`
--

LOCK TABLES `pr_exam_topics` WRITE;
/*!40000 ALTER TABLE `pr_exam_topics` DISABLE KEYS */;
/*!40000 ALTER TABLE `pr_exam_topics` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pr_exams`
--

DROP TABLE IF EXISTS `pr_exams`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pr_exams` (
  `id` int(11) NOT NULL,
  `exam_name` varchar(200) DEFAULT NULL,
  `field_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `filed_id_fk` (`field_id`),
  CONSTRAINT `filed_id_fk` FOREIGN KEY (`field_id`) REFERENCES `pr_fields` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pr_exams`
--

LOCK TABLES `pr_exams` WRITE;
/*!40000 ALTER TABLE `pr_exams` DISABLE KEYS */;
/*!40000 ALTER TABLE `pr_exams` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pr_fields`
--

DROP TABLE IF EXISTS `pr_fields`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pr_fields` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pr_fields`
--

LOCK TABLES `pr_fields` WRITE;
/*!40000 ALTER TABLE `pr_fields` DISABLE KEYS */;
/*!40000 ALTER TABLE `pr_fields` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pr_question_answers`
--

DROP TABLE IF EXISTS `pr_question_answers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pr_question_answers` (
  `id` int(11) NOT NULL,
  `question_id` int(11) DEFAULT NULL,
  `answer_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_question_id_pr_question_answers` (`question_id`),
  KEY `fk_answer_id_pr_question_answers` (`answer_id`),
  CONSTRAINT `fk_answer_id_pr_question_answers` FOREIGN KEY (`answer_id`) REFERENCES `pr_answers` (`id`),
  CONSTRAINT `fk_question_id_pr_question_answers` FOREIGN KEY (`question_id`) REFERENCES `pr_questions` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pr_question_answers`
--

LOCK TABLES `pr_question_answers` WRITE;
/*!40000 ALTER TABLE `pr_question_answers` DISABLE KEYS */;
/*!40000 ALTER TABLE `pr_question_answers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pr_questions`
--

DROP TABLE IF EXISTS `pr_questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pr_questions` (
  `id` int(11) NOT NULL,
  `question` text,
  `exam_topic_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_exam_topic_id_pr_exam_topics` (`exam_topic_id`),
  CONSTRAINT `fk_exam_topic_id_pr_exam_topics` FOREIGN KEY (`exam_topic_id`) REFERENCES `pr_exam_topics` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pr_questions`
--

LOCK TABLES `pr_questions` WRITE;
/*!40000 ALTER TABLE `pr_questions` DISABLE KEYS */;
/*!40000 ALTER TABLE `pr_questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pr_topics`
--

DROP TABLE IF EXISTS `pr_topics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pr_topics` (
  `id` int(11) NOT NULL,
  `topic_name` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pr_topics`
--

LOCK TABLES `pr_topics` WRITE;
/*!40000 ALTER TABLE `pr_topics` DISABLE KEYS */;
/*!40000 ALTER TABLE `pr_topics` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_permissions`
--

DROP TABLE IF EXISTS `role_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_permissions` (
  `id` int(11) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `permission_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `role_permission_id_fk` (`role_id`),
  KEY `permission_id_fk` (`permission_id`),
  CONSTRAINT `permission_id_fk` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`),
  CONSTRAINT `role_permission_id_fk` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_permissions`
--

LOCK TABLES `role_permissions` WRITE;
/*!40000 ALTER TABLE `role_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `role_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sb_answers`
--

DROP TABLE IF EXISTS `sb_answers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sb_answers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `answer` varchar(100) DEFAULT NULL,
  `quest_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `quest_id_fk` (`quest_id`),
  CONSTRAINT `quest_id_fk` FOREIGN KEY (`quest_id`) REFERENCES `sb_questions` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sb_answers`
--

LOCK TABLES `sb_answers` WRITE;
/*!40000 ALTER TABLE `sb_answers` DISABLE KEYS */;
/*!40000 ALTER TABLE `sb_answers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sb_exam_books`
--

DROP TABLE IF EXISTS `sb_exam_books`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sb_exam_books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `book_name` varchar(100) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `subjec_id_fk` (`subject_id`),
  CONSTRAINT `subjec_id_fk` FOREIGN KEY (`subject_id`) REFERENCES `sb_subjects` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sb_exam_books`
--

LOCK TABLES `sb_exam_books` WRITE;
/*!40000 ALTER TABLE `sb_exam_books` DISABLE KEYS */;
/*!40000 ALTER TABLE `sb_exam_books` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sb_learning_books`
--

DROP TABLE IF EXISTS `sb_learning_books`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sb_learning_books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `book_name` varchar(100) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `subjec_id_l_fk` (`subject_id`),
  CONSTRAINT `subjec_id_l_fk` FOREIGN KEY (`subject_id`) REFERENCES `sb_subjects` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sb_learning_books`
--

LOCK TABLES `sb_learning_books` WRITE;
/*!40000 ALTER TABLE `sb_learning_books` DISABLE KEYS */;
/*!40000 ALTER TABLE `sb_learning_books` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sb_questions`
--

DROP TABLE IF EXISTS `sb_questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sb_questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(100) DEFAULT NULL,
  `true_answer_id` int(11) DEFAULT NULL,
  `topic_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `topic_id_fk` (`topic_id`),
  KEY `true_answer_id_fk` (`true_answer_id`),
  CONSTRAINT `topic_id_fk` FOREIGN KEY (`topic_id`) REFERENCES `sb_topics` (`id`),
  CONSTRAINT `true_answer_id_fk` FOREIGN KEY (`true_answer_id`) REFERENCES `sb_answers` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sb_questions`
--

LOCK TABLES `sb_questions` WRITE;
/*!40000 ALTER TABLE `sb_questions` DISABLE KEYS */;
/*!40000 ALTER TABLE `sb_questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sb_subject_type`
--

DROP TABLE IF EXISTS `sb_subject_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sb_subject_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sb_subject_type`
--

LOCK TABLES `sb_subject_type` WRITE;
/*!40000 ALTER TABLE `sb_subject_type` DISABLE KEYS */;
/*!40000 ALTER TABLE `sb_subject_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sb_subjects`
--

DROP TABLE IF EXISTS `sb_subjects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sb_subjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_name` varchar(100) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `type_id_fk` (`type_id`),
  CONSTRAINT `type_id_fk` FOREIGN KEY (`type_id`) REFERENCES `sb_subject_type` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sb_subjects`
--

LOCK TABLES `sb_subjects` WRITE;
/*!40000 ALTER TABLE `sb_subjects` DISABLE KEYS */;
/*!40000 ALTER TABLE `sb_subjects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sb_topics`
--

DROP TABLE IF EXISTS `sb_topics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sb_topics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `topic_name` varchar(100) DEFAULT NULL,
  `book_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `book_id_fk` (`book_id`),
  CONSTRAINT `book_id_fk` FOREIGN KEY (`book_id`) REFERENCES `sb_exam_books` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sb_topics`
--

LOCK TABLES `sb_topics` WRITE;
/*!40000 ALTER TABLE `sb_topics` DISABLE KEYS */;
/*!40000 ALTER TABLE `sb_topics` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_roles`
--

DROP TABLE IF EXISTS `user_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_roles` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id_fk` (`user_id`),
  KEY `role_id_fk` (`role_id`),
  CONSTRAINT `role_id_fk` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  CONSTRAINT `user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_roles`
--

LOCK TABLES `user_roles` WRITE;
/*!40000 ALTER TABLE `user_roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `pass` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-04-02 23:19:22

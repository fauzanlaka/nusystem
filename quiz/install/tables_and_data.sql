-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 28, 2011 at 06:04 AM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tests`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE IF NOT EXISTS `answers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `answer_text` varchar(800) CHARACTER SET utf8 DEFAULT NULL,
  `answer_image` varchar(450) CHARACTER SET utf8 DEFAULT NULL,
  `correct_answer` int(11) NOT NULL,
  `priority` int(11) DEFAULT NULL,
  `correct_answer_text` varchar(800) CHARACTER SET utf8 DEFAULT NULL,
  `answer_pos` int(11) NOT NULL DEFAULT '0',
  `parent_id` int(11) NOT NULL,
  `answer_text_eng` varchar(800) CHARACTER SET utf8 DEFAULT NULL,
  `control_type` int(11) DEFAULT NULL,
  `answer_parent_id` int(11) DEFAULT NULL,
  `text_unit` char(10) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `group_id` (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=175691 ;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `group_id`, `answer_text`, `answer_image`, `correct_answer`, `priority`, `correct_answer_text`, `answer_pos`, `parent_id`, `answer_text_eng`, `control_type`, `answer_parent_id`, `text_unit`) VALUES
(175469, 210, 'Bill Gates', NULL, 1, 0, '', 1, 0, NULL, 1, 0, ''),
(175470, 210, 'Michael Dell', NULL, 0, 0, '', 1, 0, NULL, 1, 0, ''),
(175471, 210, 'Steve Jobs', NULL, 0, 0, '', 1, 0, NULL, 1, 0, ''),
(175472, 210, 'Bruce Lee', NULL, 0, 0, '', 1, 0, NULL, 1, 0, ''),
(175473, 211, '2 + 2 = 4', NULL, 1, 0, '', 1, 0, NULL, 1, 0, ''),
(175474, 211, '2 + 3 = 4', NULL, 0, 0, '', 1, 0, NULL, 1, 0, ''),
(175475, 211, '2 * 2 = 4', NULL, 1, 0, '', 1, 0, NULL, 1, 0, ''),
(175476, 211, '2 * 3 = 4', NULL, 0, 0, '', 1, 0, NULL, 1, 0, ''),
(175477, 212, '1 + 1 =', NULL, 0, 0, '2', 1, 0, NULL, 1, 0, ''),
(175478, 212, '2 + 1 =', NULL, 0, 0, '3', 1, 0, NULL, 1, 0, ''),
(175479, 212, '3 + 1 =', NULL, 0, 0, '4', 1, 0, NULL, 1, 0, ''),
(175480, 212, '4 + 1 =', NULL, 0, 0, '5', 1, 0, NULL, 1, 0, ''),
(175481, 213, '', NULL, 0, 0, 'Microsoft', 1, 0, NULL, 1, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE IF NOT EXISTS `assignments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quiz_id` int(11) NOT NULL DEFAULT '0',
  `org_quiz_id` int(11) NOT NULL DEFAULT '0',
  `results_mode` int(11) NOT NULL DEFAULT '0',
  `added_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `quiz_time` int(11) NOT NULL DEFAULT '0',
  `show_results` int(11) NOT NULL DEFAULT '0',
  `pass_score` decimal(10,2) NOT NULL DEFAULT '0.00',
  `quiz_type` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `assignments`
--


-- --------------------------------------------------------

--
-- Table structure for table `assignment_users`
--

CREATE TABLE IF NOT EXISTS `assignment_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `assignment_id` int(11) NOT NULL DEFAULT '0',
  `user_type` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `assignment_id` (`assignment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `assignment_users`
--


-- --------------------------------------------------------

--
-- Table structure for table `cats`
--

CREATE TABLE IF NOT EXISTS `cats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=62 ;

--
-- Dumping data for table `cats`
--

INSERT INTO `cats` (`id`, `cat_name`) VALUES
(61, 'IT tests');

-- --------------------------------------------------------

--
-- Table structure for table `imported_users`
--

CREATE TABLE IF NOT EXISTS `imported_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL DEFAULT '',
  `surname` varchar(255) NOT NULL DEFAULT '',
  `user_name` varchar(150) NOT NULL DEFAULT '',
  `password` varchar(150) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `imported_users`
--

INSERT INTO `imported_users` (`id`, `name`, `surname`, `user_name`, `password`) VALUES
(1, 'test1', 'test2', 'user1', 'ee11cbb19052e40b07aac0ca060c23ee'),
(2, 'test2', 'test2', 'user2', 'ee11cbb19052e40b07aac0ca060c23ee');

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE IF NOT EXISTS `modules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `module_name` varchar(255) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `parent_id` int(11) DEFAULT '0',
  `priority` varchar(255) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `module_name`, `file_name`, `parent_id`, `priority`) VALUES
(1, 'Test Managment', NULL, 0, '1'),
(2, 'Categories', 'cats', 1, '1'),
(3, 'Quizzes', 'quizzes', 1, '2'),
(4, 'Local users', 'local_users', 1, '4'),
(5, 'Test Assignments', NULL, 0, '2'),
(6, 'Assignments', 'assignments', 5, '6'),
(7, 'New Assignment', 'add_assignment', 5, '7'),
(8, 'Assignments', NULL, 0, '3'),
(9, 'Active Assignments', 'active_assignments', 8, '1'),
(10, 'My old assigments', 'old_assignments', 8, '2'),
(11, 'New user', 'add_edit_user', 1, '5'),
(12, 'New Quiz', 'add_edit_quiz', 1, '3');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question_text` varchar(3800) DEFAULT NULL,
  `question_type_id` int(11) NOT NULL,
  `priority` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `point` decimal(18,0) NOT NULL,
  `added_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `parent_id` int(11) NOT NULL,
  `question_total` decimal(18,0) DEFAULT NULL,
  `check_total` int(11) DEFAULT NULL,
  `header_text` varchar(1500) CHARACTER SET utf8 DEFAULT NULL,
  `footer_text` varchar(1500) CHARACTER SET utf8 DEFAULT NULL,
  `question_text_eng` varchar(1800) CHARACTER SET utf8 DEFAULT NULL,
  `help_image` varchar(550) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `quiz_id` (`quiz_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=256 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question_text`, `question_type_id`, `priority`, `quiz_id`, `point`, `added_date`, `parent_id`, `question_total`, `check_total`, `header_text`, `footer_text`, `question_text_eng`, `help_image`) VALUES
(192, '<p>\r\n	Who is in photo ?</p>\r\n<p>\r\n	<img alt="" src="editor_images/1.jpg" style="width: 200px; height: 200px" /></p>', 1, 1, 41, '10', '2011-10-27 14:33:15', 0, NULL, NULL, 'First question is linked to image .', 'Please, click Next button if you don''t know answer', NULL, NULL),
(193, '<p>\r\n	Which is the correct ?</p>', 0, 2, 41, '10', '2011-10-27 14:48:31', 0, NULL, NULL, '', '', NULL, NULL),
(194, '<p>\r\n	Please, answer below listed questions .</p>', 4, 3, 41, '10', '2011-10-27 14:49:32', 0, NULL, NULL, '', '', NULL, NULL),
(195, '<p>\r\n	Enter the name of the biggest software company in the world&nbsp;</p>', 3, 4, 41, '5', '2011-10-27 14:50:13', 0, NULL, NULL, '', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `question_groups`
--

CREATE TABLE IF NOT EXISTS `question_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(450) NOT NULL,
  `show_header` int(11) NOT NULL,
  `group_total` decimal(18,0) NOT NULL,
  `show_footer` int(11) DEFAULT NULL,
  `check_total` decimal(18,0) DEFAULT NULL,
  `question_id` int(11) DEFAULT NULL,
  `parent_id` int(11) NOT NULL,
  `group_name_eng` varchar(450) DEFAULT NULL,
  `added_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `question_id` (`question_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=275 ;

--
-- Dumping data for table `question_groups`
--

INSERT INTO `question_groups` (`id`, `group_name`, `show_header`, `group_total`, `show_footer`, `check_total`, `question_id`, `parent_id`, `group_name_eng`, `added_date`) VALUES
(210, '', 0, '0', NULL, NULL, 192, 0, NULL, '2011-10-27 14:44:52'),
(211, '', 0, '0', NULL, NULL, 193, 0, NULL, '2011-10-27 14:48:31'),
(212, '', 0, '0', NULL, NULL, 194, 0, NULL, '2011-10-27 14:49:32'),
(213, '', 0, '0', NULL, NULL, 195, 0, NULL, '2011-10-27 14:50:13');

-- --------------------------------------------------------

--
-- Table structure for table `question_types`
--

CREATE TABLE IF NOT EXISTS `question_types` (
  `id` int(11) NOT NULL,
  `question_type` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `question_types`
--

INSERT INTO `question_types` (`id`, `question_type`) VALUES
(0, 'Multi answer (checkbox)'),
(3, 'Free text (textarea)'),
(4, 'Multi text (numbers only)'),
(1, 'One answer (radio button)');

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE IF NOT EXISTS `quizzes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_id` int(11) NOT NULL,
  `quiz_name` varchar(500) NOT NULL,
  `quiz_desc` varchar(500) NOT NULL,
  `added_date` datetime NOT NULL,
  `parent_id` int(11) NOT NULL,
  `show_intro` int(11) NOT NULL,
  `intro_text` varchar(3850) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=57 ;

--
-- Dumping data for table `quizzes`
--

INSERT INTO `quizzes` (`id`, `cat_id`, `quiz_name`, `quiz_desc`, `added_date`, `parent_id`, `show_intro`, `intro_text`) VALUES
(41, 61, 'Test quiz', 'This is test quiz ', '2011-10-27 09:28:30', 0, 1, '<p>\r\n	This is an example quiz&nbsp; . This is an open source quiz software written in <span style="color: #ff0000">PHP</span>.</p>\r\n<p>\r\n	You can change design or source code .</p>\r\n<p>\r\n	Please , contact if you will have any questions .</p>\r\n<p>\r\n	<a href="mailto:support@aspnetpower.com">support@aspnetpower.com</a></p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `roles_rights`
--

CREATE TABLE IF NOT EXISTS `roles_rights` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) DEFAULT NULL,
  `module_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `roles_rights`
--

INSERT INTO `roles_rights` (`Id`, `role_id`, `module_id`) VALUES
(1, 1, 2),
(2, 1, 3),
(3, 1, 4),
(4, 1, 6),
(5, 1, 7),
(12, 1, 12),
(11, 1, 11),
(9, 2, 9),
(10, 2, 10);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `UserID` int(11) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Name` varchar(150) NOT NULL,
  `Surname` varchar(150) NOT NULL,
  `added_date` datetime NOT NULL,
  `user_type` int(11) DEFAULT NULL,
  `email` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`UserID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `UserName`, `Password`, `Name`, `Surname`, `added_date`, `user_type`, `email`) VALUES
(12, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin', '2011-10-27 12:02:06', 1, 'admin'),
(14, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user', 'user', '2011-10-27 14:10:30', 2, 'user'),
(15, 'user2', '7e58d63b60197ceb55a1c487989a3720', 'user2', 'user2', '2011-10-27 14:10:40', 2, 'user2'),
(16, 'user3', '92877af70a45fd6a2ed7fe81e1236b78', 'user3', 'user3', '2011-10-27 14:10:53', 2, 'user3'),
(17, 'user4', '3f02ebe3d7929b091e3d8ccfde2f3bc6', 'user4', 'user4', '2011-10-27 14:11:03', 2, 'user4'),
(18, 'user5', '0a791842f52a0acfbb3a783378c066b8', 'user5', 'user5', '2011-10-27 14:11:11', 2, 'user5'),
(19, 'user6', 'affec3b64cf90492377a8114c86fc093', 'user6', 'user6', '2011-10-27 14:11:19', 2, 'user6'),
(20, 'user7', '3e0469fb134991f8f75a2760e409c6ed', 'user7', 'user7', '2011-10-27 14:11:32', 2, 'user7'),
(21, 'user8', '7668f673d5669995175ef91b5d171945', 'user8', 'user8', '2011-10-27 14:11:39', 2, 'user8'),
(22, 'user9', '8808a13b854c2563da1a5f6cb2130868', 'user9', 'user9', '2011-10-27 14:12:01', 2, 'user9'),
(23, 'user10', '990d67a9f94696b1abe2dccf06900322', 'user10', 'user10', '2011-10-27 14:12:08', 2, 'user10');

-- --------------------------------------------------------

--
-- Table structure for table `user_answers`
--

CREATE TABLE IF NOT EXISTS `user_answers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_quiz_id` int(11) DEFAULT NULL,
  `question_id` int(11) DEFAULT NULL,
  `answer_id` int(11) DEFAULT NULL,
  `user_answer_id` int(11) DEFAULT NULL,
  `user_answer_text` varchar(3800) DEFAULT NULL,
  `added_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1498 ;

--
-- Dumping data for table `user_answers`
--


-- --------------------------------------------------------

--
-- Table structure for table `user_quizzes`
--

CREATE TABLE IF NOT EXISTS `user_quizzes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `assignment_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `added_date` datetime DEFAULT NULL,
  `success` int(11) DEFAULT NULL,
  `finish_date` datetime DEFAULT NULL,
  `pass_score_point` decimal(10,2) DEFAULT NULL,
  `pass_score_perc` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `assignment_id` (`assignment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `user_quizzes`
--


-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE IF NOT EXISTS `user_types` (
  `id` int(11) NOT NULL,
  `type_name` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`id`, `type_name`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_imported_users`
--
CREATE TABLE IF NOT EXISTS `v_imported_users` (
`UserID` int(11)
,`Name` varchar(250)
,`Surname` varchar(255)
,`UserName` varchar(150)
,`Password` varchar(150)
);
-- --------------------------------------------------------

--
-- Structure for view `v_imported_users`
--
DROP TABLE IF EXISTS `v_imported_users`;

CREATE  VIEW `v_imported_users` AS select `imported_users`.`id` AS `UserID`,`imported_users`.`name` AS `Name`,`imported_users`.`surname` AS `Surname`,`imported_users`.`user_name` AS `UserName`,`imported_users`.`password` AS `Password` from `imported_users`;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `question_groups` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `assignment_users`
--
ALTER TABLE `assignment_users`
  ADD CONSTRAINT `assignment_users_ibfk_1` FOREIGN KEY (`assignment_id`) REFERENCES `assignments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `questions_ibfk_2` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `question_groups`
--
ALTER TABLE `question_groups`
  ADD CONSTRAINT `question_groups_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_quizzes`
--
ALTER TABLE `user_quizzes`
  ADD CONSTRAINT `user_quizzes_ibfk_1` FOREIGN KEY (`assignment_id`) REFERENCES `assignments` (`id`) ON DELETE CASCADE;

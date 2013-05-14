-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2013 at 08:29 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `critter`
--

-- --------------------------------------------------------

--
-- Table structure for table `acos`
--

CREATE TABLE IF NOT EXISTS `acos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=113 ;

--
-- Dumping data for table `acos`
--

INSERT INTO `acos` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, NULL, NULL, 'controllers', 1, 224),
(2, 1, NULL, NULL, 'Pages', 2, 5),
(3, 2, NULL, NULL, 'display', 3, 4),
(4, 1, NULL, NULL, 'Posts', 6, 17),
(5, 4, NULL, NULL, 'index', 7, 8),
(6, 4, NULL, NULL, 'view', 9, 10),
(7, 4, NULL, NULL, 'add', 11, 12),
(8, 4, NULL, NULL, 'edit', 13, 14),
(9, 4, NULL, NULL, 'delete', 15, 16),
(10, 1, NULL, NULL, 'Roles', 18, 29),
(11, 10, NULL, NULL, 'index', 19, 20),
(12, 10, NULL, NULL, 'view', 21, 22),
(13, 10, NULL, NULL, 'add', 23, 24),
(14, 10, NULL, NULL, 'edit', 25, 26),
(15, 10, NULL, NULL, 'delete', 27, 28),
(16, 1, NULL, NULL, 'Users', 30, 47),
(17, 16, NULL, NULL, 'index', 31, 32),
(18, 16, NULL, NULL, 'view', 33, 34),
(19, 16, NULL, NULL, 'add', 35, 36),
(20, 16, NULL, NULL, 'edit', 37, 38),
(21, 16, NULL, NULL, 'delete', 39, 40),
(22, 1, NULL, NULL, 'Widgets', 48, 59),
(23, 22, NULL, NULL, 'index', 49, 50),
(24, 22, NULL, NULL, 'view', 51, 52),
(25, 22, NULL, NULL, 'add', 53, 54),
(26, 22, NULL, NULL, 'edit', 55, 56),
(27, 22, NULL, NULL, 'delete', 57, 58),
(28, 1, NULL, NULL, 'AclExtras', 60, 61),
(29, 1, NULL, NULL, 'Children', 62, 83),
(30, 29, NULL, NULL, 'index', 63, 64),
(31, 29, NULL, NULL, 'view', 65, 66),
(32, 29, NULL, NULL, 'add', 67, 68),
(33, 29, NULL, NULL, 'edit', 69, 70),
(34, 29, NULL, NULL, 'delete', 71, 72),
(35, 29, NULL, NULL, 'admin_index', 73, 74),
(36, 29, NULL, NULL, 'admin_view', 75, 76),
(37, 29, NULL, NULL, 'admin_add', 77, 78),
(38, 29, NULL, NULL, 'admin_edit', 79, 80),
(39, 29, NULL, NULL, 'admin_delete', 81, 82),
(40, 1, NULL, NULL, 'DaycareCenters', 84, 105),
(41, 40, NULL, NULL, 'index', 85, 86),
(42, 40, NULL, NULL, 'view', 87, 88),
(43, 40, NULL, NULL, 'add', 89, 90),
(44, 40, NULL, NULL, 'edit', 91, 92),
(45, 40, NULL, NULL, 'delete', 93, 94),
(46, 40, NULL, NULL, 'admin_index', 95, 96),
(47, 40, NULL, NULL, 'admin_view', 97, 98),
(48, 40, NULL, NULL, 'admin_add', 99, 100),
(49, 40, NULL, NULL, 'admin_edit', 101, 102),
(50, 40, NULL, NULL, 'admin_delete', 103, 104),
(51, 1, NULL, NULL, 'EmployeeTypes', 106, 127),
(52, 51, NULL, NULL, 'index', 107, 108),
(53, 51, NULL, NULL, 'view', 109, 110),
(54, 51, NULL, NULL, 'add', 111, 112),
(55, 51, NULL, NULL, 'edit', 113, 114),
(56, 51, NULL, NULL, 'delete', 115, 116),
(57, 51, NULL, NULL, 'admin_index', 117, 118),
(58, 51, NULL, NULL, 'admin_view', 119, 120),
(59, 51, NULL, NULL, 'admin_add', 121, 122),
(60, 51, NULL, NULL, 'admin_edit', 123, 124),
(61, 51, NULL, NULL, 'admin_delete', 125, 126),
(62, 1, NULL, NULL, 'Guardians', 128, 149),
(63, 62, NULL, NULL, 'index', 129, 130),
(64, 62, NULL, NULL, 'view', 131, 132),
(65, 62, NULL, NULL, 'add', 133, 134),
(66, 62, NULL, NULL, 'edit', 135, 136),
(67, 62, NULL, NULL, 'delete', 137, 138),
(68, 62, NULL, NULL, 'admin_index', 139, 140),
(69, 62, NULL, NULL, 'admin_view', 141, 142),
(70, 62, NULL, NULL, 'admin_add', 143, 144),
(71, 62, NULL, NULL, 'admin_edit', 145, 146),
(72, 62, NULL, NULL, 'admin_delete', 147, 148),
(73, 1, NULL, NULL, 'Reports', 150, 179),
(74, 73, NULL, NULL, 'index', 151, 152),
(75, 73, NULL, NULL, 'ajax_function', 153, 154),
(76, 73, NULL, NULL, 'save', 155, 156),
(77, 73, NULL, NULL, 'view', 157, 158),
(78, 73, NULL, NULL, 'add', 159, 160),
(79, 73, NULL, NULL, 'edit', 161, 162),
(80, 73, NULL, NULL, 'delete', 163, 164),
(81, 73, NULL, NULL, 'admin_index', 165, 166),
(82, 73, NULL, NULL, 'admin_view', 167, 168),
(83, 73, NULL, NULL, 'admin_add', 169, 170),
(84, 73, NULL, NULL, 'admin_edit', 171, 172),
(85, 73, NULL, NULL, 'admin_delete', 173, 174),
(86, 1, NULL, NULL, 'Rooms', 180, 201),
(87, 86, NULL, NULL, 'index', 181, 182),
(88, 86, NULL, NULL, 'view', 183, 184),
(89, 86, NULL, NULL, 'add', 185, 186),
(90, 86, NULL, NULL, 'edit', 187, 188),
(91, 86, NULL, NULL, 'delete', 189, 190),
(92, 86, NULL, NULL, 'admin_index', 191, 192),
(93, 86, NULL, NULL, 'admin_view', 193, 194),
(94, 86, NULL, NULL, 'admin_add', 195, 196),
(95, 86, NULL, NULL, 'admin_edit', 197, 198),
(96, 86, NULL, NULL, 'admin_delete', 199, 200),
(97, 1, NULL, NULL, 'Teachers', 202, 223),
(98, 97, NULL, NULL, 'index', 203, 204),
(99, 97, NULL, NULL, 'view', 205, 206),
(100, 97, NULL, NULL, 'add', 207, 208),
(101, 97, NULL, NULL, 'edit', 209, 210),
(102, 97, NULL, NULL, 'delete', 211, 212),
(103, 97, NULL, NULL, 'admin_index', 213, 214),
(104, 97, NULL, NULL, 'admin_view', 215, 216),
(105, 97, NULL, NULL, 'admin_add', 217, 218),
(106, 97, NULL, NULL, 'admin_edit', 219, 220),
(107, 97, NULL, NULL, 'admin_delete', 221, 222),
(108, 16, NULL, NULL, 'login', 41, 42),
(109, 16, NULL, NULL, 'logout', 43, 44),
(110, 73, NULL, NULL, 'get_reports', 175, 176),
(111, 16, NULL, NULL, 'set_location', 45, 46),
(112, 73, NULL, NULL, 'clear_report', 177, 178);

-- --------------------------------------------------------

--
-- Table structure for table `aros`
--

CREATE TABLE IF NOT EXISTS `aros` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `aros`
--

INSERT INTO `aros` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, 'Role', 1, NULL, 1, 4),
(2, NULL, 'Role', 2, NULL, 5, 8),
(3, NULL, 'Role', 3, NULL, 9, 52),
(4, 1, 'User', 2, NULL, 2, 3),
(5, 2, 'User', 3, NULL, 6, 7),
(6, 3, 'User', 4, NULL, 10, 11),
(7, NULL, 'User', 5, NULL, 53, 54),
(8, 3, 'User', 6, NULL, 12, 13),
(9, 3, 'User', 7, NULL, 14, 15),
(10, 3, 'User', 8, NULL, 16, 17),
(11, 3, 'User', 9, NULL, 20, 21),
(12, NULL, 'User', 10, NULL, 55, 56),
(13, 3, 'User', 11, NULL, 50, 51),
(14, NULL, 'User', 12, NULL, 57, 58),
(15, NULL, 'User', 13, NULL, 59, 60),
(16, NULL, 'User', 5, NULL, 61, 62),
(17, NULL, 'User', 5, NULL, 63, 64),
(18, NULL, 'User', 6, NULL, 65, 66),
(19, NULL, 'User', 7, NULL, 67, 68),
(20, NULL, 'User', 8, NULL, 69, 70),
(21, 3, 'User', 9, NULL, 18, 19),
(22, 3, 'User', 10, NULL, 22, 23),
(23, 3, 'User', 11, NULL, 24, 25),
(24, 3, 'User', 12, NULL, 26, 27),
(25, 3, 'User', 13, NULL, 28, 29),
(26, 3, 'User', 14, NULL, 30, 31),
(27, 3, 'User', 15, NULL, 32, 33),
(28, 3, 'User', 16, NULL, 34, 35),
(29, 3, 'User', 17, NULL, 36, 37),
(30, 3, 'User', 18, NULL, 38, 39),
(31, 3, 'User', 19, NULL, 40, 41),
(32, 3, 'User', 20, NULL, 42, 43),
(33, 3, 'User', 21, NULL, 44, 45),
(34, 3, 'User', 22, NULL, 46, 47),
(35, 3, 'User', 23, NULL, 48, 49);

-- --------------------------------------------------------

--
-- Table structure for table `aros_acos`
--

CREATE TABLE IF NOT EXISTS `aros_acos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `aro_id` int(10) NOT NULL,
  `aco_id` int(10) NOT NULL,
  `_create` varchar(2) NOT NULL DEFAULT '0',
  `_read` varchar(2) NOT NULL DEFAULT '0',
  `_update` varchar(2) NOT NULL DEFAULT '0',
  `_delete` varchar(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `ARO_ACO_KEY` (`aro_id`,`aco_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `aros_acos`
--

INSERT INTO `aros_acos` (`id`, `aro_id`, `aco_id`, `_create`, `_read`, `_update`, `_delete`) VALUES
(1, 1, 1, '1', '1', '1', '1'),
(2, 2, 1, '-1', '-1', '-1', '-1'),
(3, 2, 73, '1', '1', '1', '1'),
(4, 2, 4, '1', '1', '1', '1'),
(5, 2, 22, '1', '1', '1', '1'),
(6, 3, 1, '-1', '-1', '-1', '-1'),
(7, 3, 78, '1', '1', '1', '1'),
(8, 3, 79, '1', '1', '1', '1'),
(9, 3, 7, '1', '1', '1', '1'),
(10, 3, 8, '1', '1', '1', '1'),
(11, 3, 25, '1', '1', '1', '1'),
(12, 3, 26, '1', '1', '1', '1'),
(13, 3, 75, '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `children`
--

CREATE TABLE IF NOT EXISTS `children` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `daycare_center_id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `middle_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `birthday` date NOT NULL,
  `room_id` int(11) NOT NULL,
  `special_needs` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `children`
--

INSERT INTO `children` (`id`, `daycare_center_id`, `first_name`, `middle_name`, `last_name`, `birthday`, `room_id`, `special_needs`) VALUES
(1, 2, 'Corrine', 'Josh', 'Harrington', '2010-02-27', 1, 'N/A'),
(2, 2, 'Mila', 'Christine', 'Kunis', '2010-05-29', 1, 'None'),
(3, 2, 'Sara ', 'Jessica', 'Parker', '2010-08-31', 1, 'None'),
(4, 2, 'Leonardo', 'A', 'Dicaprio', '2010-05-07', 1, ''),
(5, 2, 'Jack', 'Mills', 'Nicholson', '2009-11-27', 1, ''),
(6, 2, 'Luke ', 'Anakin', 'Skywalker', '2009-03-15', 1, ''),
(7, 2, 'Princess', 'B', 'Leia', '0000-00-00', 1, ''),
(8, 2, 'Sylvester', 'P', 'Stalone', '2013-10-07', 1, ''),
(9, 2, 'Kirstin', 'D', 'Dunst', '2013-09-07', 1, ''),
(10, 2, 'Angelina', 'P', 'Jolie', '2009-05-09', 1, ''),
(11, 2, 'Ellen', 'C', 'Degeneres', '2013-07-08', 1, ''),
(12, 2, 'James', 'U', 'Franco', '2010-12-14', 1, ''),
(13, 2, 'Cameron', 'G', 'Diaz', '2009-01-01', 1, ''),
(14, 2, 'Brad', 'H', 'Pitt', '2010-09-14', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `children_guardians`
--

CREATE TABLE IF NOT EXISTS `children_guardians` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `child_id` int(11) NOT NULL,
  `guardian_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `children_guardians`
--

INSERT INTO `children_guardians` (`id`, `child_id`, `guardian_id`) VALUES
(1, 1, 1),
(4, 2, 1),
(5, 2, 2),
(6, 3, 1),
(7, 3, 2),
(8, 1, 2),
(9, 4, 1),
(10, 4, 2),
(11, 5, 1),
(12, 5, 2),
(13, 6, 1),
(14, 6, 2),
(15, 7, 1),
(16, 7, 2),
(17, 8, 1),
(18, 8, 2),
(19, 9, 1),
(20, 9, 2),
(21, 10, 1),
(22, 10, 2),
(23, 11, 1),
(24, 11, 2),
(25, 12, 1),
(26, 12, 2),
(27, 13, 1),
(28, 13, 2),
(29, 14, 1),
(30, 14, 2);

-- --------------------------------------------------------

--
-- Table structure for table `daycare_centers`
--

CREATE TABLE IF NOT EXISTS `daycare_centers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `phone` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `daycare_centers`
--

INSERT INTO `daycare_centers` (`id`, `name`, `phone`) VALUES
(1, 'KinderCare', '7036235525'),
(2, 'YMCA - Reston', '703-555-5555');

-- --------------------------------------------------------

--
-- Table structure for table `employee_types`
--

CREATE TABLE IF NOT EXISTS `employee_types` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_types`
--

INSERT INTO `employee_types` (`id`, `name`) VALUES
(0, 'Head Teacher');

-- --------------------------------------------------------

--
-- Table structure for table `guardians`
--

CREATE TABLE IF NOT EXISTS `guardians` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `street` varchar(50) NOT NULL,
  `city` varchar(40) NOT NULL,
  `state` varchar(2) NOT NULL,
  `zip` int(11) NOT NULL,
  `password` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `guardians`
--

INSERT INTO `guardians` (`id`, `first_name`, `last_name`, `phone`, `email`, `street`, `city`, `state`, `zip`, `password`) VALUES
(1, 'Mom', 'GuardianMom', '571-555-5555', 'makarov9mm@gmail.com', '123 Main St.', 'Reston', 'VA', 20190, 'password'),
(2, 'Dad', 'GuardianDad', '703-555-55555', 'subv14@hotmail.com', '123 Main St.', 'Reston', 'VA', 20190, 'password');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `body` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `created`, `modified`, `user_id`) VALUES
(1, 'The title', 'This is the post body.', '2013-02-21 14:02:11', NULL, NULL),
(2, 'A title once again', 'And the post body follows.', '2013-02-21 14:02:11', NULL, NULL),
(3, 'Title strikes back', 'This is really exciting! Not.', '2013-02-21 14:02:11', NULL, NULL),
(4, 'I think this is looking pretty easy', 'I was busted by validation for not adding text here initially.', '2013-02-22 23:32:34', '2013-02-22 23:32:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE IF NOT EXISTS `reports` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `status` varchar(200) NOT NULL,
  `child_id` int(11) NOT NULL,
  `teacher_list` varchar(200) NOT NULL,
  `room_id` int(11) NOT NULL,
  `daycare_center_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `daily_activity` varchar(200) NOT NULL,
  `needed_items` varchar(200) NOT NULL,
  `attitude` varchar(200) NOT NULL,
  `sleep` varchar(200) NOT NULL,
  `breakfast` int(11) NOT NULL,
  `lunch` int(11) NOT NULL,
  `snack` int(11) NOT NULL,
  `potty` varchar(500) NOT NULL,
  `notes` text NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=181 ;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `user_id`, `status`, `child_id`, `teacher_list`, `room_id`, `daycare_center_id`, `date`, `daily_activity`, `needed_items`, `attitude`, `sleep`, `breakfast`, `lunch`, `snack`, `potty`, `notes`, `created`, `modified`) VALUES
(167, 21, 'FINALIZED', 11, 'Sigourney Weaver|Gweneth Paltrow', 1, 0, '2013-05-14', 'went to the gym', 'Blanket', 'Helpful', 'I slept from: 07:15 PM to: 08:15 PM.', 22, 21, 23, '@08:15 PM I went pee I made a  BM', 'as dasdf asdf asdf asdf s', '2013-05-13 20:19:28', '2013-05-13 20:22:45'),
(168, 21, 'FINALIZED', 13, '', 1, 0, '2013-05-14', 'went to the gym', 'Wipes', 'Not Myself', 'I slept from: 06:15 PM to: 08:15 PM.', 47, 46, 48, '@08:15 PM I went pee', 'asdf asd fasd fasdfasdf', '2013-05-13 20:19:28', '2013-05-13 20:25:55'),
(169, 21, 'FINALIZED', 4, 'Kate Winslet|Julia Roberts', 1, 0, '2013-05-14', 'went outside|did arts and crafts', 'Wipes', 'Silly|Curious', 'I slept from: 07:15 PM to: 08:15 PM.', 74, 73, 73, '@08:15 PM I made a  BM it was an accident', 'asd fasdf sadf sadf sdf sd fs', '2013-05-13 20:19:28', '2013-05-13 20:27:07'),
(170, 21, 'DRAFT', 9, '', 1, 0, '2013-05-13', '', '', '', '', 0, 0, 0, '', '', '2013-05-13 20:19:28', '2013-05-13 20:19:28'),
(171, 21, 'DRAFT', 12, '', 1, 0, '2013-05-13', '', '', '', '', 0, 0, 0, '', '', '2013-05-13 20:19:28', '2013-05-13 20:19:28'),
(172, 21, 'DRAFT', 1, '', 1, 0, '2013-05-13', '', '', '', '', 0, 0, 0, '', '', '2013-05-13 20:19:28', '2013-05-13 20:19:28'),
(173, 21, 'DRAFT', 10, '', 1, 0, '2013-05-13', '', '', '', '', 0, 0, 0, '', '', '2013-05-13 20:19:28', '2013-05-13 20:19:28'),
(174, 21, 'DRAFT', 2, '', 1, 0, '2013-05-13', '', '', '', '', 0, 0, 0, '', '', '2013-05-13 20:19:28', '2013-05-13 20:19:28'),
(175, 21, 'DRAFT', 7, '', 1, 0, '2013-05-13', '', '', '', '', 0, 0, 0, '', '', '2013-05-13 20:19:28', '2013-05-13 20:19:28'),
(176, 21, 'DRAFT', 5, '', 1, 0, '2013-05-13', '', '', '', '', 0, 0, 0, '', '', '2013-05-13 20:19:28', '2013-05-13 20:19:28'),
(177, 21, 'DRAFT', 3, '', 1, 0, '2013-05-13', '', '', '', '', 0, 0, 0, '', '', '2013-05-13 20:19:28', '2013-05-13 20:19:28'),
(178, 21, 'DRAFT', 14, '', 1, 0, '2013-05-13', '', '', '', '', 0, 0, 0, '', '', '2013-05-13 20:19:28', '2013-05-13 20:19:28'),
(179, 21, 'DRAFT', 6, '', 1, 0, '2013-05-13', '', '', '', '', 0, 0, 0, '', '', '2013-05-13 20:19:28', '2013-05-13 20:19:28'),
(180, 21, 'DRAFT', 8, '', 1, 0, '2013-05-13', '', '', '', '', 0, 0, 0, '', '', '2013-05-13 20:19:28', '2013-05-13 20:19:28');

-- --------------------------------------------------------

--
-- Table structure for table `reports_teachers`
--

CREATE TABLE IF NOT EXISTS `reports_teachers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `report_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `reports_teachers`
--

INSERT INTO `reports_teachers` (`id`, `report_id`, `teacher_id`) VALUES
(1, 1, 1),
(2, 31, 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created`, `modified`) VALUES
(1, 'administrators', '2013-03-08 00:01:30', '2013-03-08 00:01:30'),
(2, 'managers', '2013-03-08 00:01:47', '2013-03-08 00:01:47'),
(3, 'users', '2013-03-08 00:01:54', '2013-03-08 00:01:54');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE IF NOT EXISTS `rooms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `daycare_center_id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `daycare_center_id`, `name`) VALUES
(1, 1, 'Blue'),
(2, 1, 'Purple'),
(3, 1, 'Yellow');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE IF NOT EXISTS `teachers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(40) NOT NULL,
  `password` varchar(60) NOT NULL,
  `name` varchar(60) NOT NULL,
  `room_id` int(11) NOT NULL,
  `employee_type_id` int(11) NOT NULL,
  `daycare_center_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `email`, `password`, `name`, `room_id`, `employee_type_id`, `daycare_center_id`) VALUES
(1, 'subv14@hotmail.com', 'password', 'Sigourney Weaver', 1, 0, 2),
(2, 'subv14@hotmail.com', 'password', 'Kate Winslet', 1, 0, 2),
(3, 'subv14@hotmail.com', 'password', 'Gweneth Paltrow', 1, 0, 2),
(4, 'subv14@hotmail.com', 'password', 'Julia Roberts', 1, 0, 2),
(5, 'subv14@hotmail.com', 'password', 'Meg Ryan', 1, 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE IF NOT EXISTS `tokens` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `token` varchar(32) DEFAULT NULL,
  `data` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `token` (`token`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tokens`
--

INSERT INTO `tokens` (`id`, `created`, `modified`, `token`, `data`) VALUES
(1, '2013-04-19 14:17:10', '2013-04-19 14:17:10', 'a31cfb9017', 'a:1:{s:4:"User";a:9:{s:2:"id";s:2:"21";s:8:"username";s:8:"pmakarov";s:8:"password";s:40:"e4b1019d827d54db74914fafe425e1fb82e245f5";s:5:"email";s:18:"subv14@hotmail.com";s:9:"lastlogin";s:19:"2013-04-19 12:13:46";s:8:"location";s:4:"Blue";s:7:"role_id";s:1:"3";s:7:"created";s:19:"2013-04-17 12:27:27";s:8:"modified";s:19:"2013-04-19 12:13:46";}}'),
(2, '2013-04-19 14:26:39', '2013-04-19 14:26:39', 'b7fe96d978', 'a:1:{s:4:"User";a:9:{s:2:"id";s:2:"21";s:8:"username";s:8:"pmakarov";s:8:"password";s:40:"e4b1019d827d54db74914fafe425e1fb82e245f5";s:5:"email";s:18:"subv14@hotmail.com";s:9:"lastlogin";s:19:"2013-04-19 12:13:46";s:8:"location";s:4:"Blue";s:7:"role_id";s:1:"3";s:7:"created";s:19:"2013-04-17 12:27:27";s:8:"modified";s:19:"2013-04-19 12:13:46";}}'),
(3, '2013-04-22 17:22:06', '2013-04-22 17:22:06', '7aaa681393', 'a:1:{s:4:"User";a:11:{s:2:"id";s:2:"21";s:10:"first_name";s:0:"";s:9:"last_name";s:0:"";s:8:"username";s:8:"pmakarov";s:8:"password";s:40:"e4b1019d827d54db74914fafe425e1fb82e245f5";s:5:"email";s:18:"subv14@hotmail.com";s:9:"lastlogin";s:19:"2013-04-22 14:59:02";s:8:"location";s:4:"Blue";s:7:"role_id";s:1:"3";s:7:"created";s:19:"2013-04-17 12:27:27";s:8:"modified";s:19:"2013-04-22 14:59:02";}}');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  `lastlogin` datetime NOT NULL,
  `location` varchar(50) NOT NULL,
  `role_id` varchar(20) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `password`, `email`, `lastlogin`, `location`, `role_id`, `created`, `modified`) VALUES
(2, '', '', 'crAdmin', '23bd3f160cd86e6f3ef90c0d11c64d797eaa71d9', '', '2013-05-07 21:43:26', '', '1', '2013-03-08 00:02:47', '2013-05-07 21:43:26'),
(3, '', '', 'crManager', '23bd3f160cd86e6f3ef90c0d11c64d797eaa71d9', '', '2013-04-24 18:25:01', '', '2', '2013-03-08 00:03:15', '2013-04-24 18:25:01'),
(11, '', '', 'crUser', '23bd3f160cd86e6f3ef90c0d11c64d797eaa71d9', 'makarov9mm@gmail.com', '2013-05-01 23:19:35', 'Blue', '3', '2013-04-17 12:03:56', '2013-05-01 23:20:36'),
(21, '', '', 'pmakarov', 'e4b1019d827d54db74914fafe425e1fb82e245f5', 'subv14@hotmail.com', '2013-05-13 20:19:22', 'Blue', '3', '2013-04-17 12:27:27', '2013-05-13 20:19:22'),
(23, 'asd asd sad', 'asd asd fsadf sd fad', 'buffy', 'e4b1019d827d54db74914fafe425e1fb82e245f5', 'krain.arnold+1@gmail.com', '2013-04-19 15:43:38', '', '3', '2013-04-19 15:13:26', '2013-04-19 15:43:38');

-- --------------------------------------------------------

--
-- Table structure for table `widgets`
--

CREATE TABLE IF NOT EXISTS `widgets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `part_no` varchar(12) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

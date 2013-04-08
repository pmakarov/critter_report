-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2013 at 01:30 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cakeblog`
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=110 ;

--
-- Dumping data for table `acos`
--

INSERT INTO `acos` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, NULL, NULL, 'controllers', 1, 218),
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
(16, 1, NULL, NULL, 'Users', 30, 45),
(17, 16, NULL, NULL, 'index', 31, 32),
(18, 16, NULL, NULL, 'view', 33, 34),
(19, 16, NULL, NULL, 'add', 35, 36),
(20, 16, NULL, NULL, 'edit', 37, 38),
(21, 16, NULL, NULL, 'delete', 39, 40),
(22, 1, NULL, NULL, 'Widgets', 46, 57),
(23, 22, NULL, NULL, 'index', 47, 48),
(24, 22, NULL, NULL, 'view', 49, 50),
(25, 22, NULL, NULL, 'add', 51, 52),
(26, 22, NULL, NULL, 'edit', 53, 54),
(27, 22, NULL, NULL, 'delete', 55, 56),
(28, 1, NULL, NULL, 'AclExtras', 58, 59),
(29, 1, NULL, NULL, 'Children', 60, 81),
(30, 29, NULL, NULL, 'index', 61, 62),
(31, 29, NULL, NULL, 'view', 63, 64),
(32, 29, NULL, NULL, 'add', 65, 66),
(33, 29, NULL, NULL, 'edit', 67, 68),
(34, 29, NULL, NULL, 'delete', 69, 70),
(35, 29, NULL, NULL, 'admin_index', 71, 72),
(36, 29, NULL, NULL, 'admin_view', 73, 74),
(37, 29, NULL, NULL, 'admin_add', 75, 76),
(38, 29, NULL, NULL, 'admin_edit', 77, 78),
(39, 29, NULL, NULL, 'admin_delete', 79, 80),
(40, 1, NULL, NULL, 'DaycareCenters', 82, 103),
(41, 40, NULL, NULL, 'index', 83, 84),
(42, 40, NULL, NULL, 'view', 85, 86),
(43, 40, NULL, NULL, 'add', 87, 88),
(44, 40, NULL, NULL, 'edit', 89, 90),
(45, 40, NULL, NULL, 'delete', 91, 92),
(46, 40, NULL, NULL, 'admin_index', 93, 94),
(47, 40, NULL, NULL, 'admin_view', 95, 96),
(48, 40, NULL, NULL, 'admin_add', 97, 98),
(49, 40, NULL, NULL, 'admin_edit', 99, 100),
(50, 40, NULL, NULL, 'admin_delete', 101, 102),
(51, 1, NULL, NULL, 'EmployeeTypes', 104, 125),
(52, 51, NULL, NULL, 'index', 105, 106),
(53, 51, NULL, NULL, 'view', 107, 108),
(54, 51, NULL, NULL, 'add', 109, 110),
(55, 51, NULL, NULL, 'edit', 111, 112),
(56, 51, NULL, NULL, 'delete', 113, 114),
(57, 51, NULL, NULL, 'admin_index', 115, 116),
(58, 51, NULL, NULL, 'admin_view', 117, 118),
(59, 51, NULL, NULL, 'admin_add', 119, 120),
(60, 51, NULL, NULL, 'admin_edit', 121, 122),
(61, 51, NULL, NULL, 'admin_delete', 123, 124),
(62, 1, NULL, NULL, 'Guardians', 126, 147),
(63, 62, NULL, NULL, 'index', 127, 128),
(64, 62, NULL, NULL, 'view', 129, 130),
(65, 62, NULL, NULL, 'add', 131, 132),
(66, 62, NULL, NULL, 'edit', 133, 134),
(67, 62, NULL, NULL, 'delete', 135, 136),
(68, 62, NULL, NULL, 'admin_index', 137, 138),
(69, 62, NULL, NULL, 'admin_view', 139, 140),
(70, 62, NULL, NULL, 'admin_add', 141, 142),
(71, 62, NULL, NULL, 'admin_edit', 143, 144),
(72, 62, NULL, NULL, 'admin_delete', 145, 146),
(73, 1, NULL, NULL, 'Reports', 148, 173),
(74, 73, NULL, NULL, 'index', 149, 150),
(75, 73, NULL, NULL, 'ajax_function', 151, 152),
(76, 73, NULL, NULL, 'save', 153, 154),
(77, 73, NULL, NULL, 'view', 155, 156),
(78, 73, NULL, NULL, 'add', 157, 158),
(79, 73, NULL, NULL, 'edit', 159, 160),
(80, 73, NULL, NULL, 'delete', 161, 162),
(81, 73, NULL, NULL, 'admin_index', 163, 164),
(82, 73, NULL, NULL, 'admin_view', 165, 166),
(83, 73, NULL, NULL, 'admin_add', 167, 168),
(84, 73, NULL, NULL, 'admin_edit', 169, 170),
(85, 73, NULL, NULL, 'admin_delete', 171, 172),
(86, 1, NULL, NULL, 'Rooms', 174, 195),
(87, 86, NULL, NULL, 'index', 175, 176),
(88, 86, NULL, NULL, 'view', 177, 178),
(89, 86, NULL, NULL, 'add', 179, 180),
(90, 86, NULL, NULL, 'edit', 181, 182),
(91, 86, NULL, NULL, 'delete', 183, 184),
(92, 86, NULL, NULL, 'admin_index', 185, 186),
(93, 86, NULL, NULL, 'admin_view', 187, 188),
(94, 86, NULL, NULL, 'admin_add', 189, 190),
(95, 86, NULL, NULL, 'admin_edit', 191, 192),
(96, 86, NULL, NULL, 'admin_delete', 193, 194),
(97, 1, NULL, NULL, 'Teachers', 196, 217),
(98, 97, NULL, NULL, 'index', 197, 198),
(99, 97, NULL, NULL, 'view', 199, 200),
(100, 97, NULL, NULL, 'add', 201, 202),
(101, 97, NULL, NULL, 'edit', 203, 204),
(102, 97, NULL, NULL, 'delete', 205, 206),
(103, 97, NULL, NULL, 'admin_index', 207, 208),
(104, 97, NULL, NULL, 'admin_view', 209, 210),
(105, 97, NULL, NULL, 'admin_add', 211, 212),
(106, 97, NULL, NULL, 'admin_edit', 213, 214),
(107, 97, NULL, NULL, 'admin_delete', 215, 216),
(108, 16, NULL, NULL, 'login', 41, 42),
(109, 16, NULL, NULL, 'logout', 43, 44);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `aros`
--

INSERT INTO `aros` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, 'Role', 1, NULL, 1, 4),
(2, NULL, 'Role', 2, NULL, 5, 8),
(3, NULL, 'Role', 3, NULL, 9, 18),
(4, 1, 'User', 2, NULL, 2, 3),
(5, 2, 'User', 3, NULL, 6, 7),
(6, 3, 'User', 4, NULL, 10, 11),
(7, NULL, 'User', 5, NULL, 19, 20),
(8, 3, 'User', 6, NULL, 12, 13),
(9, 3, 'User', 7, NULL, 14, 15),
(10, 3, 'User', 8, NULL, 16, 17);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `children`
--

INSERT INTO `children` (`id`, `daycare_center_id`, `first_name`, `middle_name`, `last_name`, `birthday`, `room_id`, `special_needs`) VALUES
(1, 1, 'Senya', 'Balls', 'Makarow', '1993-02-27', 1, 'needs extra large diapers'),
(2, 1, 'Mila', 'Christine', 'Makarov', '2010-05-29', 1, 'i ridez the short bus.. durr...'),
(3, 1, 'Saga', 'F', 'Arnold', '2010-08-31', 1, 'har har yar yo ho ho!');

-- --------------------------------------------------------

--
-- Table structure for table `children_guardians`
--

CREATE TABLE IF NOT EXISTS `children_guardians` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `child_id` int(11) NOT NULL,
  `guardian_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `children_guardians`
--

INSERT INTO `children_guardians` (`id`, `child_id`, `guardian_id`) VALUES
(1, 1, 1),
(2, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `daycare_centers`
--

CREATE TABLE IF NOT EXISTS `daycare_centers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `phone` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `daycare_centers`
--

INSERT INTO `daycare_centers` (`id`, `name`, `phone`) VALUES
(1, 'KinderEggCare', '7036235525');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `guardians`
--

INSERT INTO `guardians` (`id`, `first_name`, `last_name`, `phone`, `email`, `street`, `city`, `state`, `zip`, `password`) VALUES
(1, 'Papa', 'Makarov', '', '', '', '', '', 20001, '');

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
  `potty` varchar(200) NOT NULL,
  `notes` text NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `user_id`, `status`, `child_id`, `teacher_list`, `room_id`, `daycare_center_id`, `date`, `daily_activity`, `needed_items`, `attitude`, `sleep`, `breakfast`, `lunch`, `snack`, `potty`, `notes`, `created`, `modified`) VALUES
(10, 999, 'SUBMITTED', 2, 'Kate Winslut', 1, 1, '2004-03-13', 'went to the gym', 'Sheet', 'Friendly', 'I slept from: 01:00 PM to: 03:00 PM.', 29, 61, 69, '|Potty Event- @03:00 PM I went pee it was an accident', 'sadsf asd fsadf ', '2013-04-03 21:03:39', '2013-04-03 22:47:05'),
(15, 999, 'SUBMITTED', 3, 'Kate Winslut', 0, 0, '2004-03-13', 'asasd', 'Extra Clothes', 'Silly', 'I slept from: 05:13 PM to: 05:34 PM.', 56, 50, 47, '|Potty Event- @03:00 PM my diaper was wet', 'adsfsadf ', '2013-04-03 23:07:02', '2013-04-03 23:07:02');

-- --------------------------------------------------------

--
-- Table structure for table `reports_teachers`
--

CREATE TABLE IF NOT EXISTS `reports_teachers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `report_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `reports_teachers`
--

INSERT INTO `reports_teachers` (`id`, `report_id`, `teacher_id`) VALUES
(1, 1, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `email`, `password`, `name`, `room_id`, `employee_type_id`, `daycare_center_id`) VALUES
(1, 'makarov9mm@gmail.com', 'paul', 'Paul', 1, 0, 1),
(2, 'katewinslut@slut.com', 'password', 'Kate Winslut', 1, 0, 1),
(3, 'fooboo@boofoo.com', 'password', 'Little Miss Moffet', 1, 0, 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `lastlogin`, `location`, `role_id`, `created`, `modified`) VALUES
(2, 'crAdmin', '23bd3f160cd86e6f3ef90c0d11c64d797eaa71d9', '', '0000-00-00 00:00:00', '', '1', '2013-03-08 00:02:47', '2013-03-08 00:02:47'),
(3, 'crManager', '23bd3f160cd86e6f3ef90c0d11c64d797eaa71d9', '', '2013-04-08 00:00:00', '', '2', '2013-03-08 00:03:15', '2013-03-08 00:03:15'),
(4, 'crUser', '23bd3f160cd86e6f3ef90c0d11c64d797eaa71d9', '', '2013-04-09 01:28:50', 'Blue', '3', '2013-03-08 00:03:34', '2013-04-09 01:28:50');

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

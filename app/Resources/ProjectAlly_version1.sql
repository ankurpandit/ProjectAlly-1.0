-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 21, 2013 at 06:14 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cake`
--

-- --------------------------------------------------------

--
-- Table structure for table `bugs_and_features`
--

CREATE TABLE IF NOT EXISTS `bugs_and_features` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `reported_by` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `priority_id` int(5) NOT NULL,
  `assigned_to` int(5) NOT NULL,
  `milestone_id` int(5) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `estimate` int(5) NOT NULL,
  `project_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `bugs_and_features`
--

INSERT INTO `bugs_and_features` (`id`, `reported_by`, `status`, `priority_id`, `assigned_to`, `milestone_id`, `title`, `description`, `estimate`, `project_id`, `created`, `modified`) VALUES
(9, '7', '3', 1, 8, 7, 'Modification in design', 'Modify design looking at the PSD attached.', 3, 8, '2013-05-21 17:21:04', '2013-05-21 17:21:04'),
(10, '7', '3', 3, 8, 7, 'Add the new images', 'Search new image for landing page and gallery', 2, 8, '2013-05-21 17:22:12', '2013-05-21 17:22:12'),
(11, '7', '3', 1, 11, 8, 'Change in table', 'Data is not fetched properly due to id mismatch make it perfect.', 3, 8, '2013-05-21 17:23:21', '2013-05-21 17:23:21'),
(12, '8', '3', 3, 11, 9, 'Content modification', 'Change the content as per files specified', 2, 8, '2013-05-21 17:26:20', '2013-05-21 17:26:20'),
(13, '15', '3', 1, 13, 10, 'Change the layout', 'Change the initial layout implementes', 3, 9, '2013-05-21 17:46:03', '2013-05-21 17:46:03'),
(14, '15', '3', 3, 8, 11, 'Testing UI', 'Test implementation for any conflicts and if there report them.', 2, 9, '2013-05-21 17:46:58', '2013-05-21 17:46:58'),
(15, '8', '3', 3, 13, 11, 'Conflict', 'Jquery conflict on Home page.', 3, 9, '2013-05-21 17:49:05', '2013-05-21 17:49:05');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `model` varchar(255) NOT NULL,
  `foreign_key` int(10) unsigned NOT NULL,
  `comment` text NOT NULL,
  `created` datetime DEFAULT NULL,
  `creator_id` int(10) unsigned DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `modifier_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `comments`
--


-- --------------------------------------------------------

--
-- Table structure for table `estimate`
--

CREATE TABLE IF NOT EXISTS `estimate` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `estimate`
--

INSERT INTO `estimate` (`id`, `type`) VALUES
(1, 'None'),
(2, 'Small'),
(3, 'Medium'),
(4, 'Large');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_type_id` int(11) NOT NULL,
  `profile_id` int(10) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `details` text COLLATE utf8_unicode_ci NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `all_day` tinyint(1) NOT NULL DEFAULT '1',
  `status` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=78 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `event_type_id`, `profile_id`, `title`, `details`, `start`, `end`, `all_day`, `status`, `active`, `created`, `modified`) VALUES
(74, 1, 15, 'Testing Bugs', 'Report all bugs and testing issues.', '2013-05-30 17:37:00', '2013-06-30 23:07:00', 0, 'Approved', 1, '2013-05-21 17:37:40', '2013-05-21 17:38:17'),
(73, 1, 9, 'Start initial implementation', 'Start implementation from the initial stage.', '2013-05-28 17:36:00', '2013-06-14 23:04:00', 0, 'Approved', 1, '2013-05-21 17:36:48', '2013-05-21 17:38:11'),
(72, 3, 8, 'ProjectAlly', 'Project and Employee management Tool purposed to integrate employee and projects.', '2013-05-28 17:28:00', '2013-07-06 00:00:00', 0, 'Approved', 1, '2013-05-21 17:28:24', '2013-05-21 17:28:57'),
(71, 1, 7, 'Content ', 'Set the content given.', '2013-05-21 17:17:24', '2013-05-29 22:46:40', 0, 'Approved', 1, '2013-05-21 17:17:24', '2013-05-21 17:17:24'),
(70, 1, 11, 'Database Schema', 'Complete the database schema and enter dummies to test if every thing is working perfectly.', '2013-05-12 17:15:00', '2013-05-17 22:43:00', 0, 'Approved', 1, '2013-05-21 17:15:25', '2013-05-21 17:18:22'),
(69, 1, 8, 'UI Design', 'Make necessary changes in the UI as per the data provided.', '2013-05-21 17:10:16', '2013-05-25 22:39:04', 0, 'Approved', 1, '2013-05-21 17:10:16', '2013-05-21 17:10:16'),
(68, 3, 7, 'Club website', 'Football Club management website used to manage Leagues and matches between clubs all around the country.', '2013-04-28 17:05:00', '2013-05-29 00:00:00', 0, 'Approved', 1, '2013-05-21 17:05:40', '2013-05-21 17:06:19'),
(75, 2, 8, 'Not feeling well', 'Having fever and anxiety.', '2013-05-22 23:19:29', '2013-05-23 23:19:29', 1, 'Approved', 1, '2013-05-21 17:51:07', '2013-05-21 17:51:07'),
(76, 4, 13, 'Family fuction', 'need to go out of town due to family function.', '2013-05-29 23:32:46', '2013-05-30 23:33:21', 1, 'In Progress', 1, '2013-05-21 18:03:29', '2013-05-21 18:03:29'),
(77, 4, 13, 'Emergency', 'Family issues', '2013-05-27 23:36:12', '2013-05-29 23:36:12', 0, 'In Progress', 1, '2013-05-21 18:07:19', '2013-05-21 18:07:19');

-- --------------------------------------------------------

--
-- Table structure for table `event_types`
--

CREATE TABLE IF NOT EXISTS `event_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=17 ;

--
-- Dumping data for table `event_types`
--

INSERT INTO `event_types` (`id`, `name`, `color`) VALUES
(2, 'Sick Leave', 'Red'),
(1, 'Milestones', 'Brown'),
(3, 'Project', 'Black'),
(4, 'General Leave', 'Blue'),
(5, 'Holiday', 'green');

-- --------------------------------------------------------

--
-- Table structure for table `milestones`
--

CREATE TABLE IF NOT EXISTS `milestones` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `responsible_user` int(5) NOT NULL,
  `title` varchar(255) NOT NULL,
  `due_date` date NOT NULL,
  `description` text NOT NULL,
  `project_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `milestones`
--

INSERT INTO `milestones` (`id`, `responsible_user`, `title`, `due_date`, `description`, `project_id`, `created`, `modified`) VALUES
(7, 8, 'UI Design', '2013-05-25', 'Make necessary changes in the UI as per the data provided.', 8, '2013-05-21 17:10:16', '2013-05-21 17:10:16'),
(8, 11, 'Database Schema', '2013-05-17', 'Complete the database schema and enter dummies to test if every thing is working perfectly.', 8, '2013-05-21 17:15:25', '2013-05-21 17:15:25'),
(9, 7, 'Content ', '2013-05-29', 'Set the content given.', 8, '2013-05-21 17:17:24', '2013-05-21 17:17:24'),
(10, 9, 'Start initial implementation', '2013-06-14', 'Start implementation from the initial stage.', 9, '2013-05-21 17:36:48', '2013-05-21 17:36:48'),
(11, 15, 'Testing Bugs', '2013-06-30', 'Report all bugs and testing issues.', 9, '2013-05-21 17:37:40', '2013-05-21 17:37:40');

-- --------------------------------------------------------

--
-- Table structure for table `priority`
--

CREATE TABLE IF NOT EXISTS `priority` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `priority`
--

INSERT INTO `priority` (`id`, `type`) VALUES
(1, 'Highest'),
(2, 'High'),
(3, 'Normal'),
(4, 'Low'),
(5, 'Lowest');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `user_role` int(1) NOT NULL,
  `input_email` varchar(255) NOT NULL,
  `input_password` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  `leave_request` int(5) NOT NULL,
  `leave_taken` float NOT NULL,
  `user_dob` varchar(15) NOT NULL,
  `user_gender` varchar(10) NOT NULL,
  `work_email` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_mobile` varchar(255) NOT NULL,
  `user_home` varchar(255) NOT NULL,
  `user_photo` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `user_name`, `company_name`, `user_role`, `input_email`, `input_password`, `status`, `leave_request`, `leave_taken`, `user_dob`, `user_gender`, `work_email`, `user_address`, `user_mobile`, `user_home`, `user_photo`, `created`, `modified`) VALUES
(7, 'Hardik Shah', 'Aecortech', 1, 'hardik@gmail.com', 'testtest', 1, 0, 0, '', '', '', '', '', '', '', '2013-05-17 11:57:01', '2013-05-17 11:57:01'),
(8, 'Akash Bhardwaj', 'Aecortech', 2, 'akash@gmail.com', 'akash123', 1, 0, 2, '', '', '', '', '', '', '', '2013-05-17 12:00:03', '2013-05-17 12:00:03'),
(9, 'Manali Pohani', 'Aecortech', 3, 'manali@gmail.com', 'manali123', 1, 0, 0, '', '', '', '', '', '', '', '2013-05-17 12:01:54', '2013-05-17 12:01:54'),
(10, 'Dan Pope', 'Clubwebsite', 4, 'dan@gmail.com', 'dan123', 1, 0, 0, '', '', '', '', '', '', '', '2013-05-17 12:05:34', '2013-05-17 12:05:34'),
(11, 'Jon F', 'Clubwebsite', 4, 'jon@gmail.com', 'jon123', 1, 0, 0, '', '', '', '', '', '', '', '2013-05-17 12:09:04', '2013-05-17 12:09:04'),
(12, 'Ruchi Shah', 'Aecortech', 3, 'ruchi@gmail.com', 'ruchi123', 0, 0, 0, '', '', '', '', '', '', '', '2013-05-17 12:11:28', '2013-05-17 12:11:28'),
(13, 'Sonal Dubey ', 'Aecortech', 3, 'sonal@gmail.com', 'sonal123', 1, 2, 0, '', '', '', '', '', '', '', '2013-05-17 12:12:01', '2013-05-17 12:12:01'),
(14, 'Payal Shah', 'Aecortech', 3, 'payal@gmail.com', 'payal123', 0, 0, 0, '', '', '', '', '', '', '', '2013-05-17 12:12:45', '2013-05-17 12:12:45'),
(15, 'Ankur Pandit', 'Aecortech', 2, 'ankur@gmail.com', 'ankur123', 1, 0, 0, '', '', '', '', '', '', '', '2013-05-17 12:13:16', '2013-05-17 12:13:16');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `project_name` varchar(255) NOT NULL,
  `project_description` varchar(255) NOT NULL,
  `due_date` date NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `project_name`, `project_description`, `due_date`, `created`, `modified`) VALUES
(8, 'Club website', 'Football Club management website used to manage Leagues and matches between clubs all around the country.', '2013-05-29', '2013-05-21 17:05:40', '2013-05-21 17:05:40'),
(9, 'ProjectAlly', 'Project and Employee management Tool purposed to integrate employee and projects.', '2013-06-29', '2013-05-21 17:28:23', '2013-05-21 17:28:23');

-- --------------------------------------------------------

--
-- Table structure for table `project_members`
--

CREATE TABLE IF NOT EXISTS `project_members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `project_members`
--

INSERT INTO `project_members` (`id`, `project_id`, `profile_id`) VALUES
(22, 8, 7),
(23, 8, 8),
(24, 8, 11),
(25, 9, 13),
(26, 9, 10),
(27, 9, 15),
(28, 9, 8);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `type`) VALUES
(1, 'Completed'),
(2, 'In Progress'),
(3, 'Scheduled'),
(4, 'Rescheduled');

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE IF NOT EXISTS `uploads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `attachment` varchar(255) NOT NULL,
  `size` int(11) NOT NULL,
  `bugs_and_features_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `uploads`
--


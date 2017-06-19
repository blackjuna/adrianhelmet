-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2017 at 07:39 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_helmet`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `id_invoice` int(11) DEFAULT NULL,
  `id_users` int(11) DEFAULT NULL,
  `address` varchar(150) DEFAULT NULL,
  `telephone` varchar(15) DEFAULT NULL,
  `note` text,
  `created_date` datetime DEFAULT NULL,
  `created_id` int(11) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `modified_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `groups_auth`
--

CREATE TABLE `groups_auth` (
  `id` int(11) NOT NULL,
  `groups_id` mediumint(9) DEFAULT NULL,
  `modules_id` mediumint(9) DEFAULT NULL,
  `c` smallint(6) DEFAULT NULL,
  `r` smallint(6) DEFAULT NULL,
  `u` smallint(6) DEFAULT NULL,
  `d` smallint(6) DEFAULT NULL,
  `a` smallint(6) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_id` smallint(6) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `modified_id` smallint(6) DEFAULT NULL,
  `deleted` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups_auth`
--

INSERT INTO `groups_auth` (`id`, `groups_id`, `modules_id`, `c`, `r`, `u`, `d`, `a`, `created_date`, `created_id`, `modified_date`, `modified_id`, `deleted`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 0),
(2, 1, 2, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 0),
(3, 1, 3, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 0),
(4, 1, 4, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 0),
(5, 1, 5, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 0),
(6, 1, 6, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 0),
(7, 1, 7, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 0),
(8, 1, 8, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 1),
(9, 1, 9, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 1),
(10, 1, 10, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 1),
(11, 1, 11, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 0),
(12, 1, 12, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 0),
(13, 1, 13, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 0),
(14, 1, 14, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 0),
(15, 1, 15, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 0),
(16, 1, 16, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 0),
(17, 1, 17, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 0),
(18, 1, 18, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 0),
(19, 2, 9, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 0),
(20, 2, 10, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 1),
(21, 2, 11, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 0),
(22, 2, 12, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 0),
(23, 2, 13, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 0),
(24, 2, 14, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 0),
(25, 2, 15, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 0),
(26, 2, 16, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 0),
(27, 2, 17, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 0),
(28, 2, 18, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 0),
(29, 2, 21, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 0),
(30, 2, 22, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 0),
(31, 2, 23, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 0),
(32, 2, 24, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 0),
(33, 2, 25, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 0),
(34, 2, 26, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 0),
(35, 2, 27, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 0),
(36, 2, 28, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 0),
(37, 2, 29, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 0),
(38, 2, 30, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 0),
(39, 2, 31, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 0),
(40, 2, 32, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 0),
(41, 2, 33, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 0),
(42, 2, 34, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 0),
(43, 2, 35, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 0),
(44, 1, 21, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 0),
(45, 1, 22, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 0),
(46, 1, 23, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 0),
(47, 1, 24, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 0),
(48, 1, 25, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 0),
(49, 1, 26, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 0),
(50, 1, 27, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 0),
(51, 1, 28, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 0),
(52, 1, 29, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 0),
(53, 1, 30, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 0),
(54, 1, 31, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 0),
(55, 1, 32, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 0),
(56, 1, 33, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 0),
(57, 1, 34, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 0),
(58, 1, 35, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 0),
(59, 1, 20, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 0),
(60, 1, 36, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 0),
(61, 2, 36, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(11) NOT NULL,
  `code` varchar(20) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `due_date` datetime DEFAULT NULL,
  `feedback` varchar(150) DEFAULT NULL,
  `note` text,
  `status_feed` enum('2','1','0') DEFAULT NULL,
  `status` enum('2','1','0') DEFAULT NULL,
  `confirmation_payment` varchar(250) DEFAULT NULL,
  `link` varchar(150) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_id` int(11) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `modified_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `invoices_detail`
--

CREATE TABLE `invoices_detail` (
  `id` int(11) NOT NULL,
  `id_product` int(11) DEFAULT NULL,
  `id_invoices` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `size` varchar(10) DEFAULT NULL,
  `price` decimal(15,2) DEFAULT NULL,
  `discount` decimal(15,2) DEFAULT NULL,
  `subtotal` decimal(15,2) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_id` int(11) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `modified_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` int(11) NOT NULL,
  `modules_group_id` int(11) DEFAULT NULL,
  `code` varchar(25) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `page_link` varchar(50) DEFAULT NULL,
  `separat` smallint(6) DEFAULT NULL,
  `sort_no` smallint(6) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_id` smallint(6) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `modified_id` smallint(6) DEFAULT NULL,
  `deleted` smallint(6) DEFAULT NULL,
  `show_in_menu` smallint(6) DEFAULT NULL,
  `icon` varchar(50) DEFAULT NULL,
  `multilevel` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `modules_group_id`, `code`, `name`, `page_link`, `separat`, `sort_no`, `created_date`, `created_id`, `modified_date`, `modified_id`, `deleted`, `show_in_menu`, `icon`, `multilevel`) VALUES
(1, 3, 'USERS', 'USERS', 'systems/users', 0, 7, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 0, 1, 'fa-users', 0),
(2, 3, 'GROUPS', 'GROUPS', 'systems/groups', 0, 5, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 0, 1, 'fa-group', 0),
(3, 3, 'MODULES', 'MODULES', 'systems/modules', 0, 4, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 0, 1, 'fa-book', 0),
(4, 3, 'COMPANY', 'COMPANY', 'systems/company', 0, 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 0, 1, 'fa-building', 0),
(5, 3, 'MODULES_GROUPS', 'MODULES GROUPS', 'systems/modules_groups', 0, 3, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 0, 1, 'fa-book', 0),
(6, 3, 'GROUPS_AUTH', 'GROUPS AUTH', 'systems/groups_auth', 0, 6, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 0, 1, ' fa-child', 0),
(7, 3, 'DEPARTMENTS', 'DEPARTMENTS', 'systems/department', 0, 2, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 0, 1, 'fa-building-o', 0),
(8, 3, 'SETUP_DOCUMENTS', 'SETUP DOCUMENTS', 'systems/setup_documents', 0, 10, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 0, 0, 'fa-file', 0),
(9, 3, 'CHANGE_PWD', 'CHANGE PASSWORD', 'systems/change_pwd', 0, 9, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 0, 1, 'fa-lock', 0),
(10, 3, 'PROFILE', 'USER PROFILE', 'systems/profile', 0, 8, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 0, 0, 'fa-user-secret', 0),
(11, 2, 'CHART', 'TYPE CHART', 'masters/charts', 0, 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 0, 1, 'fa-bar-chart', 0),
(12, 2, 'CLASS_PART', 'MATERIAL CLASS', 'masters/class_part', 0, 2, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 0, 1, 'fa-table', 0),
(13, 2, 'FILLER', 'MATERIAL FILLER', 'masters/fillers', 0, 3, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 0, 1, 'fa-table', 0),
(14, 2, 'FLANG_SIZE', 'FLANG SIZE', 'masters/flangs', 0, 4, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 0, 1, 'fa-table', 0),
(15, 1, 'ASME_B1647A', 'ASME B16.47 A', 'qc/asme_a', 0, 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 0, 0, 'fa-table', 0),
(16, 1, 'ASME_B1647B', 'ASME B16.47 B', 'qc/asme_b', 0, 2, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 0, 0, 'fa-table', 0),
(17, 1, 'ASME_B165', 'ASME B16.5', 'qc/asme_b165', 0, 3, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 0, 0, 'fa-table', 0),
(18, 1, 'PROCESS_CTQ', 'PROCESS CTQ', 'qc/process_ctq', 0, 4, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 0, 0, 'fa-table', 0),
(19, 4, 'HOME', 'DASHBOARD', 'main/home', 0, 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 0, 0, 'fa-home', 0),
(20, 1, 'INCOMING_THICKNESS', 'INC. THICKNESS', 'qc/incoming_thickness', 0, 5, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 0, 1, 'fa-table', 18),
(21, 1, 'INCOMING_CHEMICAL', 'INC. CHEMICAL', 'qc/incoming_chemical', 0, 6, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 0, 1, 'fa-table', 18),
(22, 1, 'INCOMING_FILLER', 'INC. FILLER', 'qc/incoming_filler', 0, 7, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 0, 1, 'fa-table', 18),
(23, 1, 'INCOMING_ELEKTROPLATING', 'INC. ELEKTROPLATING', 'qc/incoming_elektroplat', 0, 8, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 0, 1, 'fa-table', 18),
(24, 1, 'BLANKING', 'BLANKING', 'qc/blanking', 0, 9, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 0, 1, 'fa-table', 18),
(25, 1, 'WELDING', 'WELDING', 'qc/welding', 0, 10, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 0, 1, 'fa-table', 18),
(26, 1, 'TURNING_DIMENSI', 'TURN. DIMENSI', 'qc/turning_dimensi', 0, 11, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 0, 1, 'fa-table', 18),
(27, 1, 'TURNING_BENTUK_DIMENSI', 'TURN. BTK. DIMENSI', 'qc/turning_bentuk', 0, 12, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 0, 1, 'fa-table', 18),
(28, 1, 'MARKING', 'MARKING', 'qc/turning_marking', 0, 13, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 1, 0, 'fa-table', 18),
(29, 1, 'WINDING_PRESSURE', 'WIND. PRESSURE', 'qc/turning_winding_pressure', 0, 14, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 0, 1, 'fa-table', 18),
(30, 1, 'WINDING_SEALING', 'WIND. SEALING', 'qc/turning_winding_sealing', 0, 15, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 0, 1, 'fa-table', 18),
(31, 1, 'WINDING_LILITAN', 'WIND. LILITAN', 'qc/turning_winding_lilitan', 0, 16, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 0, 1, 'fa-table', 18),
(32, 1, 'COMPRESSION_TEST', 'COMPR. TEST', 'qc/turning_compression_test', 0, 17, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 0, 1, 'fa-table', 18),
(33, 1, 'OUTGOING_SCRATCH', 'OUT. SCRATCH', 'qc/outgoing_scratch', 0, 18, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 0, 1, 'fa-table', 18),
(34, 1, 'OUTGOING_PUTAR', 'OUT. PUTAR', 'qc/outgoing_putar', 0, 19, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 0, 1, 'fa-table', 18),
(35, 1, 'OUTGOING_METAL', 'OUT. METAL', 'qc/outgoing_metal', 0, 20, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 0, 1, 'fa-table', 18),
(36, 6, 'VIEW_GRAPHICS', 'GRAPHICS', 'monitoring/graphics', 0, 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 0, 1, 'fa-bar-chart', 0);

-- --------------------------------------------------------

--
-- Table structure for table `modules_group`
--

CREATE TABLE `modules_group` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `sort_no` smallint(6) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_id` smallint(6) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `modified_id` smallint(6) DEFAULT NULL,
  `deleted` smallint(6) DEFAULT NULL,
  `icon` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `modules_group`
--

INSERT INTO `modules_group` (`id`, `code`, `name`, `sort_no`, `created_date`, `created_id`, `modified_date`, `modified_id`, `deleted`, `icon`) VALUES
(1, 'QC', 'QUALITY CONTROL', 2, '0000-00-00 00:00:00', 1, '2016-07-26 23:32:17', 1, 0, 'fa-user-md'),
(2, 'MASTERS', 'MASTERS', 4, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 0, 'fa-file'),
(3, 'SYSTEMS', 'SYSTEMS', 5, '0000-00-00 00:00:00', 1, '2016-07-26 23:32:34', 1, 0, 'fa-wrench'),
(4, 'MAIN', 'MAIN', 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 1, 0, 'fa-tachometer'),
(5, 'TES', 'TES', 6, '2016-07-26 23:32:55', 1, '2016-07-26 23:33:00', 1, 1, 'TES'),
(6, 'MONITORING', 'MONITORING', 3, '0000-00-00 00:00:00', 1, '2016-07-26 23:33:00', 1, 0, 'fa-bar-chart');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `file` varchar(50) DEFAULT NULL,
  `size` varchar(10) DEFAULT NULL,
  `note1` varchar(250) DEFAULT NULL,
  `note2` varchar(250) DEFAULT NULL,
  `hd_picture` enum('y','n') DEFAULT 'y',
  `code_link` varchar(50) DEFAULT NULL,
  `category` smallint(6) DEFAULT NULL,
  `price` decimal(15,2) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_id` int(11) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `modified_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_id` int(11) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `modified_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product_promo`
--

CREATE TABLE `product_promo` (
  `id` int(11) NOT NULL,
  `code` varchar(15) DEFAULT NULL,
  `token` varchar(35) DEFAULT NULL,
  `file_name` varchar(50) DEFAULT NULL,
  `tittle` varchar(50) DEFAULT NULL,
  `note` varchar(150) DEFAULT NULL,
  `link` varchar(50) DEFAULT NULL,
  `category` smallint(6) DEFAULT NULL,
  `price` decimal(15,2) DEFAULT NULL,
  `begin_date` datetime DEFAULT NULL,
  `expired_date` datetime DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_id` int(11) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `modified_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product_slider`
--

CREATE TABLE `product_slider` (
  `id` int(11) NOT NULL,
  `file_name` varchar(50) DEFAULT NULL,
  `tittle` varchar(50) DEFAULT NULL,
  `note` varchar(150) DEFAULT NULL,
  `link` varchar(50) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_id` int(11) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `modified_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `promo_category`
--

CREATE TABLE `promo_category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_id` int(11) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `modified_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1497729933, 1, 'Admin', 'istrator', 'ADMIN', '0'),
(2, '::1', 'inka@admin.com', '$2y$08$Ry1cvrGc3Cr4wPWLPuvWyOOccWzLM9FivIXR5cZoM9ztN7u5Iw9q2', NULL, 'inka@admin.com', NULL, NULL, NULL, NULL, 1497582585, NULL, 1, 'Inka', 'saputri', 'TGS', '021');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups_auth`
--
ALTER TABLE `groups_auth`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices_detail`
--
ALTER TABLE `invoices_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules_group`
--
ALTER TABLE `modules_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_promo`
--
ALTER TABLE `product_promo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_slider`
--
ALTER TABLE `product_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promo_category`
--
ALTER TABLE `promo_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `groups_auth`
--
ALTER TABLE `groups_auth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `invoices_detail`
--
ALTER TABLE `invoices_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `modules_group`
--
ALTER TABLE `modules_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product_promo`
--
ALTER TABLE `product_promo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product_slider`
--
ALTER TABLE `product_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `promo_category`
--
ALTER TABLE `promo_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

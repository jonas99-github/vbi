-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2020 at 12:01 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emonitoringvdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `addeq_temp`
--

CREATE TABLE `addeq_temp` (
  `invid` varchar(255) NOT NULL,
  `eqdesc` varchar(255) NOT NULL,
  `serial_no` varchar(255) NOT NULL,
  `emp_no` varchar(255) NOT NULL,
  `remark_temp` longtext NOT NULL,
  `par_transfer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `archive`
--

CREATE TABLE `archive` (
  `arch_empl_no` varchar(255) NOT NULL,
  `arch_firstname` varchar(255) NOT NULL,
  `arch_middlename` varchar(255) NOT NULL,
  `arch_lastname` varchar(255) NOT NULL,
  `arch_position` varchar(255) NOT NULL,
  `arch_dept_id` varchar(255) NOT NULL,
  `arch_status` varchar(255) NOT NULL,
  `arch_date_created` varchar(255) NOT NULL,
  `arch_deploy` varchar(255) NOT NULL,
  `arch_hired` varchar(255) NOT NULL,
  `arch_remarks` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `archive`
--

INSERT INTO `archive` (`arch_empl_no`, `arch_firstname`, `arch_middlename`, `arch_lastname`, `arch_position`, `arch_dept_id`, `arch_status`, `arch_date_created`, `arch_deploy`, `arch_hired`, `arch_remarks`) VALUES
('EMPL-062000', 'John', 'Dela', 'Cruz', 'POS-2333233', 'DEPT-32262', 'Project-Based', '2020-02-07', 'Laguna', '2020-02-07', '');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brandid` int(255) NOT NULL,
  `brand` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brandid`, `brand`) VALUES
(143, 'acer'),
(147, '123123'),
(148, 'apc');

-- --------------------------------------------------------

--
-- Table structure for table `deletedeq`
--

CREATE TABLE `deletedeq` (
  `deleted_eqid` varchar(255) NOT NULL,
  `deleted_eqdesc` varchar(255) NOT NULL,
  `date_deleted` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deletedeq`
--

INSERT INTO `deletedeq` (`deleted_eqid`, `deleted_eqdesc`, `date_deleted`) VALUES
('EQ-03228693', 'BACKPACK 15.6', 'March 2, 2020 6:33:am  '),
('EQ-22222300', 'mouse', 'February 20, 2020 10:40:am  '),
('EQ-32266', 'SONY', 'February 18, 2020 10:02:am  '),
('EQ-327333', 'BACKPACK 15.6', 'February 18, 2020 10:05:am  '),
('EQ-337033', 'BACKPACK 15.6', 'February 18, 2020 10:05:am  '),
('EQ-3498203', 'SONY', 'February 20, 2020 10:40:am  '),
('EQ-6036843', 'mouse', 'February 19, 2020 4:36:pm  '),
('EQ-8342375', 'BACKPACK 15.6', 'February 18, 2020 10:05:am  ');

-- --------------------------------------------------------

--
-- Table structure for table `deployment`
--

CREATE TABLE `deployment` (
  `deply_id` varchar(255) NOT NULL,
  `deployment` varchar(255) NOT NULL,
  `date_created` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deployment`
--

INSERT INTO `deployment` (`deply_id`, `deployment`, `date_created`) VALUES
('DNO-33233232', 'PRC Testing Center', '2020-02-07'),
('DNO-62223002', 'Bicol Office', '2020-02-07'),
('LOC-432325', 'Precast, Sta. Rosa, Laguna', '2020-02-14');

-- --------------------------------------------------------

--
-- Table structure for table `deploy_transfer`
--

CREATE TABLE `deploy_transfer` (
  `idTransfer` int(11) NOT NULL,
  `transferID` varchar(255) NOT NULL,
  `emplNo_transfer` varchar(255) NOT NULL,
  `newDeployment` varchar(255) NOT NULL,
  `transferDate` varchar(255) NOT NULL,
  `remarkTransfer` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deploy_transfer`
--

INSERT INTO `deploy_transfer` (`idTransfer`, `transferID`, `emplNo_transfer`, `newDeployment`, `transferDate`, `remarkTransfer`) VALUES
(81, 'TID-263273', 'EMPL-0723223', 'precast,', '2020-02-07', ''),
(82, 'TID-45723224', 'EMPL-0723223', 'qwe', '2020-02-07', 'rhe'),
(83, 'TID-62232', 'EMPL-062000', 'Laguna', '2020-02-07', ''),
(84, 'TID-20003322', 'EMPL-6050333', 'Bicol Office', '2020-02-07', ''),
(85, 'TID-3022333', 'EMPL-6050333', 'Bicol Office', '2020-02-10', ''),
(86, 'TID-022307', 'EMPL-3322382', 'Laguna', '2020-02-10', ''),
(87, 'TID-3200438', 'EMPL-3322382', 'Precast, Sta. Rosa, Laguna', '2020-02-21', ''),
(88, 'TID-9002760', 'EMPL-3322382', 'PRC Testing Center', '2020-02-21', '');

-- --------------------------------------------------------

--
-- Table structure for table `dept_tbl`
--

CREATE TABLE `dept_tbl` (
  `dept_id` varchar(255) NOT NULL,
  `dept_name` varchar(25) NOT NULL,
  `deply_id` varchar(255) NOT NULL,
  `date_created` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dept_tbl`
--

INSERT INTO `dept_tbl` (`dept_id`, `dept_name`, `deply_id`, `date_created`) VALUES
('DEPT-8223833', 'HR and Administration', 'DNO-62223002', '2020-02-07');

-- --------------------------------------------------------

--
-- Table structure for table `empl_status`
--

CREATE TABLE `empl_status` (
  `status_id` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date_created` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `empl_tbl`
--

CREATE TABLE `empl_tbl` (
  `empl_no` varchar(255) NOT NULL,
  `empl_firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `empl_lastname` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `dept_id` varchar(255) NOT NULL,
  `empl_status` varchar(255) NOT NULL,
  `date_created` varchar(255) NOT NULL,
  `timeline_id` varchar(255) NOT NULL,
  `deploy` varchar(255) NOT NULL,
  `hired` varchar(255) NOT NULL,
  `remarks_prof` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `empl_tbl`
--

INSERT INTO `empl_tbl` (`empl_no`, `empl_firstname`, `middlename`, `empl_lastname`, `position`, `dept_id`, `empl_status`, `date_created`, `timeline_id`, `deploy`, `hired`, `remarks_prof`) VALUES
('EMPL-3322382', 'Jonas', 'Velasco', 'Palmiano', 'POS-2333233', 'DEPT-8223833', 'Project-Based', '2020-02-10', '', 'PRC Testing Center', '2020-02-10', 'k'),
('EMPL-6050333', 'Vivian', 'Gonzales', 'Armario', 'POS-035032', 'DEPT-8223833', 'Regular/Permanent', '2020-02-07', '', 'Bicol Office', '2017-07-26', '');

-- --------------------------------------------------------

--
-- Table structure for table `eq_assign_tbl`
--

CREATE TABLE `eq_assign_tbl` (
  `eq_assign_id` varchar(255) NOT NULL,
  `par_no` varchar(255) NOT NULL,
  `inv_id` varchar(255) NOT NULL,
  `empl_no` varchar(255) NOT NULL,
  `eqdesc` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `tag` varchar(255) NOT NULL,
  `serial` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `dateissued` varchar(255) NOT NULL,
  `eq_state` varchar(255) NOT NULL,
  `eq_condition` varchar(255) NOT NULL,
  `date_purch` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `location` varchar(255) NOT NULL,
  `remarks` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `eq_desc`
--

CREATE TABLE `eq_desc` (
  `eq_desc_id` varchar(255) NOT NULL,
  `eqdesc` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `eq_desc`
--

INSERT INTO `eq_desc` (`eq_desc_id`, `eqdesc`, `brand`) VALUES
('desc-27232', 'BACKPACK 15.6', ''),
('desc-327232', 'mouse', ''),
('desc-372522', 'keyboard', ''),
('desc-8003222', 'monitor', ''),
('desc-80033', 'SONY', '');

-- --------------------------------------------------------

--
-- Table structure for table `eq_history`
--

CREATE TABLE `eq_history` (
  `hid` int(11) NOT NULL,
  `eqid` varchar(255) NOT NULL,
  `employee_no` varchar(255) NOT NULL,
  `par_no` varchar(255) NOT NULL,
  `date_issued_his` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `eq_history`
--

INSERT INTO `eq_history` (`hid`, `eqid`, `employee_no`, `par_no`, `date_issued_his`) VALUES
(106, 'EQ-330723', 'EMPL-3322382', 'PAR-35332225', '2020-02-10'),
(107, '', '', 'PAR-34028', '2020-02-11'),
(108, '', 'PRC Testing Center', 'PAR-34028', '2020-02-11'),
(109, 'EQ-330723', 'PRC Testing Center', 'PAR-34028', '2020-02-11'),
(110, 'EQ-2532833', 'PRC Testing Center', 'PAR-34028', '2020-02-11'),
(111, 'EQ-2532833', 'Laguna', 'PAR-20420', '2020-02-11'),
(112, 'EQ-2532833', 'Laguna', 'PAR-20420', '2020-02-11'),
(113, 'EQ-2532833', 'Laguna', 'PAR-20420', '2020-02-11'),
(114, 'EQ-2532833', 'Laguna', 'PAR-20420', '2020-02-11'),
(115, 'EQ-083230', 'EMPL-3322382', 'PAR-39723', '2020-02-11'),
(116, 'EQ-0620336', 'EMPL-3322382', 'PAR-3333095', '2020-02-14'),
(117, '', 'EMPL-3322382', 'PAR-33093223', '2020-02-18'),
(118, 'EQ-033092', 'EMPL-3322382', 'PAR-2625203', '2020-02-18'),
(119, 'EQ-033092', 'EMPL-3322382', 'PAR-2337323', '2020-02-18'),
(120, '', 'EMPL-6050333', 'PAR-3232363', '2020-02-18'),
(121, 'EQ-033092', 'EMPL-6050333', 'PAR-25472582', '2020-02-18'),
(122, 'EQ-033092', 'EMPL-3322382', 'PAR-205233', '2020-02-18'),
(123, 'EQ-3936263', 'EMPL-3322382', 'PAR-323220', '2020-02-20'),
(124, '', 'EMPL-3322382', 'PAR-227302', '2020-03-01'),
(125, '', 'EMPL-3322382', 'PAR-262533', '2020-03-02'),
(126, 'EQ-3936263', 'EMPL-3322382', 'PAR-352003', '2020-03-02'),
(127, 'EQ-033092', 'EMPL-3322382', 'PAR-352003', '2020-03-02'),
(128, 'EQ-3936263', 'EMPL-3322382', 'PAR-352003', '2020-03-02'),
(129, 'EQ-033092', 'EMPL-3322382', 'PAR-352003', '2020-03-02'),
(130, 'EQ-3936263', 'EMPL-3322382', 'PAR-352003', '2020-03-02'),
(131, 'EQ-033092', 'EMPL-3322382', 'PAR-352003', '2020-03-02'),
(132, 'EQ-3936263', 'EMPL-3322382', 'PAR-352003', '2020-03-02'),
(133, 'EQ-033092', 'EMPL-3322382', 'PAR-352003', '2020-03-02'),
(134, 'EQ-3936263', 'EMPL-3322382', 'PAR-352003', '2020-03-02'),
(135, 'EQ-033092', 'EMPL-3322382', 'PAR-352003', '2020-03-02'),
(136, 'EQ-3936263', 'EMPL-3322382', 'PAR-352003', '2020-03-02'),
(137, 'EQ-033092', 'EMPL-6050333', 'PAR-0532402', '2020-03-02'),
(138, 'EQ-3936263', 'EMPL-3322382', 'PAR-20030030', '2020-03-02'),
(139, 'EQ-033092', 'EMPL-6050333', 'PAR-3433252', '2020-03-02');

-- --------------------------------------------------------

--
-- Table structure for table `eq_inv`
--

CREATE TABLE `eq_inv` (
  `eq_inv_id` varchar(255) NOT NULL,
  `eq_assign_id` varchar(255) NOT NULL,
  `eqdesc` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `empl_no` varchar(255) NOT NULL,
  `tag_no` varchar(255) NOT NULL,
  `serial_no` varchar(255) NOT NULL,
  `model_no` varchar(255) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `date_issued` varchar(255) NOT NULL,
  `eq_state` varchar(255) NOT NULL,
  `eq_condition` varchar(255) NOT NULL,
  `date_purch` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `curr_equip_loc` varchar(255) NOT NULL,
  `remarks` text NOT NULL,
  `par` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `eq_inv`
--

INSERT INTO `eq_inv` (`eq_inv_id`, `eq_assign_id`, `eqdesc`, `brand`, `empl_no`, `tag_no`, `serial_no`, `model_no`, `ip_add`, `date_issued`, `eq_state`, `eq_condition`, `date_purch`, `price`, `curr_equip_loc`, `remarks`, `par`) VALUES
('EQ-033092', 'AS-733', 'keyboard', '123123', 'EMPL-6050333', '444444', '545454', '', '', '2020-03-02', 'Old', 'missingeq', '', 0, 'Bicol Office', '', 'PAR-3433252'),
('EQ-3936263', 'AS-20424830', 'monitor', '123123', 'EMPL-3322382', '', '', '', '', '2020-03-02', 'Unknown state', 'Undistributed', '', 1222, 'PRC Testing Center', 'tedt', 'PAR-20030030');

-- --------------------------------------------------------

--
-- Table structure for table `par_undis`
--

CREATE TABLE `par_undis` (
  `par_id_undis` int(11) NOT NULL,
  `par_no_undis` varchar(255) NOT NULL,
  `par_empl_undi` varchar(255) NOT NULL,
  `par_invid_undis` varchar(255) NOT NULL,
  `par_eqdesc_undis` varchar(255) NOT NULL,
  `par_brand_undis` varchar(255) NOT NULL,
  `par_serial_undis` varchar(255) NOT NULL,
  `par_model_undis` varchar(255) NOT NULL,
  `par_ipadd_undis` varchar(255) NOT NULL,
  `par_remarks_undis` varchar(255) NOT NULL,
  `par_location_undis` varchar(255) NOT NULL,
  `par_dateissued_undis` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `pos_id` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `date_created` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`pos_id`, `position`, `date_created`) VALUES
('POS-2333233', 'ARCHITECT', '2020-02-07'),
('POS-30223208', 'Field Engineer', '2020-02-07'),
('POS-035032', 'HR and Admin. Manager', '2020-02-07');

-- --------------------------------------------------------

--
-- Table structure for table `prty_ackn_rcpt`
--

CREATE TABLE `prty_ackn_rcpt` (
  `par_id` int(11) NOT NULL,
  `par_no` varchar(255) NOT NULL,
  `transfer_empl_no` varchar(255) NOT NULL,
  `invid_transfer` varchar(255) NOT NULL,
  `eqdesc_transfer` varchar(255) NOT NULL,
  `brand_transfer` varchar(255) NOT NULL,
  `serial_transfer` varchar(255) NOT NULL,
  `model_transfer` varchar(255) NOT NULL,
  `ipadd_transfer` varchar(255) NOT NULL,
  `remarks_transfer` varchar(255) NOT NULL,
  `location_transfer` varchar(255) NOT NULL,
  `dateissued` varchar(255) NOT NULL,
  `remark_view` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prty_ackn_rcpt`
--

INSERT INTO `prty_ackn_rcpt` (`par_id`, `par_no`, `transfer_empl_no`, `invid_transfer`, `eqdesc_transfer`, `brand_transfer`, `serial_transfer`, `model_transfer`, `ipadd_transfer`, `remarks_transfer`, `location_transfer`, `dateissued`, `remark_view`) VALUES
(649, 'PAR-20420', 'Laguna', 'EQ-2226303', 'keyboard', '', '', '', '', '', 'Laguna', '2020-02-11', ''),
(650, 'PAR-0042282', 'Bicol Office', 'EQ-036932', 'mouse', 'acer', '', '', '', '', 'Bicol Office', '2020-02-11', ''),
(651, 'PAR-0580', 'PRC Testing Center', 'EQ-723973', 'keyboard', '', '', '', '', '', 'PRC Testing Center', '2020-02-11', ''),
(652, 'PAR-7002003', 'Laguna', 'EQ-293302', 'keyboard', '', '', '', '', '', 'Laguna', '2020-02-11', ''),
(653, 'PAR-39723', 'EMPL-3322382', 'EQ-083230', 'keyboard', 'acer', '', '', '', '', 'Laguna', '2020-02-11', 'wqeeqwe'),
(654, 'PAR-3022', 'Bicol Office', 'EQ-293302', 'keyboard', '', '', '', '', '', 'Bicol Office', '2020-02-11', ''),
(655, 'PAR-072237', 'Bicol Office', 'EQ-083230', 'keyboard', 'acer', '', '', '', '', 'Bicol Office', '2020-02-11', ''),
(656, 'PAR-072237', 'Bicol Office', 'EQ-93320322', 'monitor', '', '', '', '', '', 'Bicol Office', '2020-02-11', ''),
(657, 'PAR-292275', 'PRC Testing Center', 'EQ-633323', 'mouse', 'samsung', '', '', '', '', 'PRC Testing Center', '', ''),
(658, 'PAR-292275', 'PRC Testing Center', 'EQ-22230446', 'mouse', 'Thermaltake', '', '', '', '', 'PRC Testing Center', '', ''),
(659, 'PAR-292275', 'PRC Testing Center', 'EQ-93320322', 'monitor', '', '', '', '', '', 'PRC Testing Center', '', ''),
(660, 'PAR-2222', 'PRC Testing Center', 'EQ-0620336', 'keyboard', 'samsung', '', '', '', '', 'PRC Testing Center', '', ''),
(661, 'PAR-2022233', 'PRC Testing Center', 'EQ-2397272', 'keyboard', 'samsung', '', '', '', '', 'PRC Testing Center', '', ''),
(662, 'PAR-020202', 'PRC Testing Center', 'EQ-0024032', 'asdasd', '123123', '', '', '', '', 'PRC Testing Center', '', ''),
(663, 'PAR-020202', 'PRC Testing Center', 'EQ-22230446', 'mouse', 'Thermaltake', '', '', '', '', 'PRC Testing Center', '', ''),
(664, 'PAR-020202', 'PRC Testing Center', 'EQ-633323', 'mouse', 'samsung', '', '', '', '', 'PRC Testing Center', '', ''),
(665, 'PAR-020202', 'PRC Testing Center', 'EQ-0620336', 'keyboard', 'samsung', '', '', '', '', 'PRC Testing Center', '', ''),
(666, 'PAR-3270628', 'Bicol Office', 'EQ-93320322', 'monitor', '', '', '', '', '', 'Bicol Office', '', ''),
(667, 'PAR-3270628', 'Bicol Office', 'EQ-22230446', 'mouse', 'Thermaltake', '', '', '', '', 'Bicol Office', '', ''),
(668, 'PAR-3333095', 'EMPL-3322382', 'EQ-0620336', 'keyboard', 'samsung', '', '', '', '', 'Laguna', '2020-02-14', ''),
(669, 'PAR-362495', 'Laguna', 'EQ-93320322', 'monitor', '', '', '', '', '', 'Laguna', '', ''),
(670, 'PAR-3254323', 'Bicol Office', 'EQ-22230446', 'mouse', 'Thermaltake', '', '', '', '', 'Bicol Office', '', ''),
(671, 'PAR-23360833', 'PRC Testing Center', 'EQ-633323', 'mouse', 'samsung', '', '', '', '', 'PRC Testing Center', '', ''),
(672, 'PAR-9263032', 'PRC Testing Center', 'EQ-633323', 'mouse', 'samsung', '', '', '', '', 'PRC Testing Center', '', ''),
(673, 'PAR-02203926', 'Bicol Office', 'EQ-02296002', 'keyboard', 'samsung', '', '', '', '', 'Bicol Office', '', ''),
(674, 'PAR-000222', 'Bicol Office', 'EQ-8342375', 'BACKPACK 15.6', '123123', '', '', '', '', 'Bicol Office', '', ''),
(675, 'PAR-72023', 'Bicol Office', 'EQ-02296002', 'keyboard', 'samsung', '', '', '', '', 'Bicol Office', '', ''),
(676, 'PAR-03223333', 'Laguna', 'EQ-32266', 'SONY', '', '', '', '', '', 'Laguna', '', ''),
(677, 'PAR-333389', 'Bicol Office', 'EQ-2632302', 'mouse', 'Thermaltake', '', '', '', '', 'Bicol Office', '', ''),
(678, 'PAR-3037322', 'Precast, Sta. Rosa, Laguna', 'EQ-02296002', 'keyboard', 'samsung', '', '', '', '', 'Precast, Sta. Rosa, Laguna', '2020-02-07', ''),
(679, 'PAR-3037322', 'Precast, Sta. Rosa, Laguna', 'EQ-8342375', 'BACKPACK 15.6', '123123', '', '', '', 'test2', 'Precast, Sta. Rosa, Laguna', '2020-02-07', ''),
(680, 'PAR-25220792', 'BBBBB', 'EQ-3936263', 'monitor', '', '', '', '', 'tedt', 'BBBBB', '', ''),
(681, 'PAR-3037322', 'Precast, Sta. Rosa, Laguna', 'EQ-8342375', 'BACKPACK 15.6', '123123', '', '', '', 'test2', 'Precast, Sta. Rosa, Laguna', '2020-02-07', ''),
(682, 'PAR-3037322', 'Precast, Sta. Rosa, Laguna', 'EQ-3936263', 'monitor', '', '', '', '', 'tedt', 'Precast, Sta. Rosa, Laguna', '2020-02-07', ''),
(683, 'PAR-3037322', 'Precast, Sta. Rosa, Laguna', 'EQ-32266', 'SONY', '', '', '', '', '', 'Precast, Sta. Rosa, Laguna', '2020-02-07', ''),
(684, 'PAR-3037322', 'Precast, Sta. Rosa, Laguna', 'EQ-2632302', 'mouse', 'Thermaltake', '', '', '', '', 'Precast, Sta. Rosa, Laguna', '2020-02-07', ''),
(685, 'PAR-3037322', 'Precast, Sta. Rosa, Laguna', 'EQ-8342375', 'BACKPACK 15.6', '123123', '', '', '', 'test2', 'Precast, Sta. Rosa, Laguna', '2020-02-07', ''),
(686, 'PAR-3037322', 'Precast, Sta. Rosa, Laguna', 'EQ-32266', 'SONY', '', '', '', '', '', 'Precast, Sta. Rosa, Laguna', '2020-02-07', ''),
(687, 'PAR-0383336', 'Precast, Sta. Rosa, Laguna', 'EQ-3936263', 'monitor', '', '', '', '', 'tedt', 'Precast, Sta. Rosa, Laguna', '', ''),
(688, 'PAR-0383336', 'Precast, Sta. Rosa, Laguna', 'EQ-3498203', 'SONY', 'acer', '', '', '', '', 'Precast, Sta. Rosa, Laguna', '', ''),
(689, 'PAR-23000230', 'Precast, Sta. Rosa, Laguna', 'EQ-8342375', 'BACKPACK 15.6', '123123', '', '', '', 'test2', 'Precast, Sta. Rosa, Laguna', '2020-02-17', ''),
(690, 'PAR-5233008', 'Laguna', 'EQ-02296002', 'keyboard', 'samsung', '', '', '', '', 'Laguna', '2020-02-17', ''),
(691, 'PAR-3039330', 'PRC Testing Center', 'EQ-3936263', 'monitor', '', '', '', '', 'tedt', 'PRC Testing Center', '2020-02-17', ''),
(692, 'PAR-323002', 'Bicol Office', 'EQ-32266', 'SONY', '', '', '', '', '', 'Bicol Office', '2020-02-17', ''),
(693, 'PAR-406622', 'Precast, Sta. Rosa, Laguna', 'EQ-2632302', 'mouse', 'Thermaltake', '', '', '', '', 'Precast, Sta. Rosa, Laguna', '2020-02-17', ''),
(694, 'PAR-23820220', 'BBBBB', 'EQ-3498203', 'SONY', 'acer', '', '', '', '', 'BBBBB', '2020-02-17', ''),
(695, 'PAR-03263', 'AAAA', 'EQ-8342375', 'BACKPACK 15.6', '123123', '', '', '', 'test2', 'AAAA', '2020-02-17', ''),
(696, 'PAR-02333330', 'DDDDDD', 'EQ-222342', 'mouse', '', '', '', '', '', 'DDDDDD', '2020-02-17', ''),
(697, 'PAR-32222349', 'CCCCCC', 'EQ-6036843', 'mouse', '', '', '', '', '', 'CCCCCC', '2020-02-17', ''),
(698, 'PAR-682263', 'DDDDDD', 'EQ-8342375', 'BACKPACK 15.6', '123123', '', '', '', 'test2', 'DDDDDD', '2020-02-18', ''),
(699, 'PAR-2625203', 'EMPL-3322382', 'EQ-033092', 'keyboard', 'acer', '', '', '', '', 'Laguna', '2020-02-18', ''),
(700, 'PAR-2337323', 'EMPL-3322382', 'EQ-033092', 'keyboard', 'acer', '', '', '', '', 'Laguna', '2020-02-18', ''),
(701, 'PAR-25472582', 'EMPL-6050333', 'EQ-033092', 'keyboard', 'acer', '', '', '', '', 'Bicol Office', '2020-02-18', ''),
(702, 'PAR-205233', 'EMPL-3322382', 'EQ-033092', 'keyboard', 'acer', '', '', '', '', 'Laguna', '2020-02-18', ''),
(703, 'PAR-200339', 'PRC Testing Center', 'EQ-3936263', 'monitor', '', '', '', '', 'tedt', 'PRC Testing Center', '2020-02-18', ''),
(704, 'PAR-200339', 'PRC Testing Center', 'EQ-6036843', 'mouse', '', '', '', '', '', 'PRC Testing Center', '2020-02-18', ''),
(705, 'PAR-82633052', 'Precast, Sta. Rosa, Laguna', 'EQ-22222300', 'mouse', '', '', '', '', '', 'Precast, Sta. Rosa, Laguna', '2020-02-19', ''),
(706, 'PAR-82633052', 'Precast, Sta. Rosa, Laguna', 'EQ-3498203', 'SONY', 'acer', '', '', '', '', 'Precast, Sta. Rosa, Laguna', '2020-02-19', ''),
(707, 'PAR-0294933', 'Bicol Office', 'EQ-3936263', 'monitor', '123123', '', '', '', 'tedt', 'Bicol Office', '2020-02-20', ''),
(708, 'PAR-323220', 'EMPL-3322382', 'EQ-3936263', 'monitor', '123123', '', '', '', 'tedt', 'Laguna', '2020-02-20', ''),
(709, 'PAR-06032', 'Bicol Office', 'EQ-033092', 'keyboard', '123123', '545454', '', '', '', 'Bicol Office', '2020-02-20', ''),
(710, 'PAR-3022922', 'Bicol Office', 'EQ-033092', 'keyboard', '123123', '545454', '', '', '', 'Bicol Office', '2020-02-20', ''),
(711, 'PAR-038038', 'Bicol Office', 'EQ-033092', 'keyboard', '123123', '545454', '', '', '', 'Bicol Office', '2020-02-20', ''),
(712, 'PAR-038038', 'Bicol Office', 'EQ-3936263', 'monitor', '123123', '', '', '', 'tedt', 'Bicol Office', '2020-02-20', ''),
(713, 'PAR-038038', 'Bicol Office', 'EQ-033092', 'keyboard', '123123', '545454', '', '', '', 'Bicol Office', '2020-02-20', ''),
(714, 'PAR-42925043', 'PRC Testing Center', 'EQ-033092', 'keyboard', '123123', '545454', '', '', '', 'PRC Testing Center', '2020-02-21', ''),
(715, 'PAR-42925043', 'PRC Testing Center', 'EQ-3936263', 'monitor', '123123', '', '', '', 'tedt', 'PRC Testing Center', '2020-02-21', ''),
(716, 'PAR-42925043', 'PRC Testing Center', 'EQ-033092', 'keyboard', '123123', '545454', '', '', '', 'PRC Testing Center', '2020-02-21', ''),
(717, 'PAR-42925043', 'PRC Testing Center', 'EQ-3936263', 'monitor', '123123', '', '', '', 'tedt', 'PRC Testing Center', '2020-02-21', ''),
(718, 'PAR-352003', 'EMPL-3322382', 'EQ-033092', 'keyboard', '123123', '545454', '', '', '', 'PRC Testing Center', '2020-03-02', 'fafsfsf'),
(719, 'PAR-352003', 'EMPL-3322382', 'EQ-3936263', 'monitor', '123123', '', '', '', '', 'PRC Testing Center', '2020-03-02', 'fafsfsf'),
(720, 'PAR-352003', 'EMPL-3322382', 'EQ-033092', 'keyboard', '123123', '545454', '', '', '', 'PRC Testing Center', '2020-03-02', 'fafsfsf'),
(721, 'PAR-352003', 'EMPL-3322382', 'EQ-3936263', 'monitor', '123123', '', '', '', 'tedt', 'PRC Testing Center', '2020-03-02', 'fafsfsf'),
(722, 'PAR-352003', 'EMPL-3322382', 'EQ-033092', 'keyboard', '123123', '545454', '', '', '', 'PRC Testing Center', '2020-03-02', 'fafsfsf'),
(723, 'PAR-352003', 'EMPL-3322382', 'EQ-3936263', 'monitor', '123123', '', '', '', 'tedt', 'PRC Testing Center', '2020-03-02', 'fafsfsf'),
(724, 'PAR-352003', 'EMPL-3322382', 'EQ-033092', 'keyboard', '123123', '545454', '', '', '', 'PRC Testing Center', '2020-03-02', 'fafsfsf'),
(725, 'PAR-352003', 'EMPL-3322382', 'EQ-3936263', 'monitor', '123123', '', '', '', 'tedt', 'PRC Testing Center', '2020-03-02', 'fafsfsf'),
(726, 'PAR-352003', 'EMPL-3322382', 'EQ-033092', 'keyboard', '123123', '545454', '', '', '', 'PRC Testing Center', '2020-03-02', 'fafsfsf'),
(727, 'PAR-352003', 'EMPL-3322382', 'EQ-3936263', 'monitor', '123123', '', '', '', 'tedt', 'PRC Testing Center', '2020-03-02', 'fafsfsf'),
(728, 'PAR-352003', 'EMPL-3322382', 'EQ-033092', 'keyboard', '123123', '545454', '', '', '', 'PRC Testing Center', '2020-03-02', 'fafsfsf'),
(729, 'PAR-352003', 'EMPL-3322382', 'EQ-033092', 'keyboard', '123123', '545454', '', '', '', 'PRC Testing Center', '2020-03-02', 'fafsfsf'),
(730, 'PAR-352003', 'EMPL-3322382', 'EQ-033092', 'keyboard', '123123', '545454', '', '', '', 'PRC Testing Center', '2020-03-02', 'fafsfsf'),
(731, 'PAR-352003', 'EMPL-3322382', 'EQ-033092', 'keyboard', '123123', '545454', '', '', '', 'PRC Testing Center', '2020-03-02', 'fafsfsf'),
(732, 'PAR-352003', 'EMPL-3322382', 'EQ-3936263', 'monitor', '123123', '', '', '', 'tedt', 'PRC Testing Center', '2020-03-02', 'fafsfsf'),
(733, 'PAR-352003', 'EMPL-3322382', 'EQ-033092', 'keyboard', '123123', '545454', '', '', '', 'PRC Testing Center', '2020-03-02', 'fafsfsf'),
(734, 'PAR-352003', 'EMPL-3322382', 'EQ-3936263', 'monitor', '123123', '', '', '', 'tedt', 'PRC Testing Center', '2020-03-02', 'fafsfsf'),
(735, 'PAR-352003', 'EMPL-3322382', 'EQ-033092', 'keyboard', '123123', '545454', '', '', '', 'PRC Testing Center', '2020-03-02', 'fafsfsf'),
(736, 'PAR-352003', 'EMPL-3322382', 'EQ-033092', 'keyboard', '123123', '545454', '', '', '', 'PRC Testing Center', '2020-03-02', 'fafsfsf'),
(737, 'PAR-352003', 'EMPL-3322382', 'EQ-033092', 'keyboard', '123123', '545454', '', '', '', 'PRC Testing Center', '2020-03-02', 'fafsfsf'),
(738, 'PAR-352003', 'EMPL-3322382', 'EQ-3936263', 'monitor', '123123', '', '', '', 'tedt', 'PRC Testing Center', '2020-03-02', 'fafsfsf'),
(739, 'PAR-352003', 'EMPL-3322382', 'EQ-033092', 'keyboard', '123123', '545454', '', '', '', 'PRC Testing Center', '2020-03-02', 'fafsfsf'),
(740, 'PAR-352003', 'EMPL-3322382', 'EQ-3936263', 'monitor', '123123', '', '', '', 'tedt', 'PRC Testing Center', '2020-03-02', 'fafsfsf'),
(741, 'PAR-352003', 'EMPL-3322382', 'EQ-033092', 'keyboard', '123123', '545454', '', '', '', 'PRC Testing Center', '2020-03-02', ''),
(742, 'PAR-352003', 'EMPL-3322382', 'EQ-3936263', 'monitor', '123123', '', '', '', 'tedt', 'PRC Testing Center', '2020-03-02', ''),
(743, 'PAR-352003', 'EMPL-3322382', 'EQ-033092', 'keyboard', '123123', '545454', '', '', '', 'PRC Testing Center', '2020-03-02', ''),
(744, 'PAR-352003', 'EMPL-3322382', 'EQ-3936263', 'monitor', '123123', '', '', '', 'tedt', 'PRC Testing Center', '2020-03-02', ''),
(745, 'PAR-352003', 'EMPL-3322382', 'EQ-033092', 'keyboard', '123123', '545454', '', '', '', 'PRC Testing Center', '2020-03-02', ''),
(746, 'PAR-352003', 'EMPL-3322382', 'EQ-3936263', 'monitor', '123123', '', '', '', 'tedt', 'PRC Testing Center', '2020-03-02', ''),
(747, 'PAR-352003', 'EMPL-3322382', 'EQ-033092', 'keyboard', '123123', '545454', '', '', '', 'PRC Testing Center', '2020-03-02', ''),
(748, 'PAR-352003', 'EMPL-3322382', 'EQ-3936263', 'monitor', '123123', '', '', '', 'tedt', 'PRC Testing Center', '2020-03-02', ''),
(749, 'PAR-352003', 'EMPL-3322382', 'EQ-033092', 'keyboard', '123123', '545454', '', '', '', 'PRC Testing Center', '2020-03-02', ''),
(750, 'PAR-352003', 'EMPL-3322382', 'EQ-3936263', 'monitor', '123123', '', '', '', 'tedt', 'PRC Testing Center', '2020-03-02', ''),
(751, 'PAR-352003', 'EMPL-3322382', 'EQ-033092', 'keyboard', '123123', '545454', '', '', '', 'PRC Testing Center', '2020-03-02', ''),
(752, 'PAR-352003', 'EMPL-3322382', 'EQ-3936263', 'monitor', '123123', '', '', '', 'tedt', 'PRC Testing Center', '2020-03-02', ''),
(753, 'PAR-352003', 'EMPL-3322382', 'EQ-033092', 'keyboard', '123123', '545454', '', '', '', 'PRC Testing Center', '2020-03-02', ''),
(754, 'PAR-352003', 'EMPL-3322382', 'EQ-3936263', 'monitor', '123123', '', '', '', 'tedt', 'PRC Testing Center', '2020-03-02', ''),
(755, 'PAR-352003', 'EMPL-3322382', 'EQ-033092', 'keyboard', '123123', '545454', '', '', '', 'PRC Testing Center', '2020-03-02', ''),
(756, 'PAR-352003', 'EMPL-3322382', 'EQ-3936263', 'monitor', '123123', '', '', '', 'tedt', 'PRC Testing Center', '2020-03-02', ''),
(757, 'PAR-002332', 'Bicol Office', 'EQ-033092', 'keyboard', '123123', '545454', '', '', '', 'Bicol Office', '2020-03-02', ''),
(758, 'PAR-02208332', 'Bicol Office', 'EQ-033092', 'keyboard', '123123', '545454', '', '', '', 'Bicol Office', '2020-03-02', ''),
(759, 'PAR-0532402', 'EMPL-6050333', 'EQ-033092', 'keyboard', '123123', '545454', '', '', '', 'Bicol Office', '2020-03-02', ''),
(760, 'PAR-20030030', 'EMPL-3322382', 'EQ-3936263', 'monitor', '123123', '', '', '', 'tedt', 'PRC Testing Center', '2020-03-02', ''),
(761, 'PAR-3433252', 'EMPL-6050333', 'EQ-033092', 'keyboard', '123123', '545454', '', '', '', 'Bicol Office', '2020-03-02', '');

-- --------------------------------------------------------

--
-- Table structure for table `save_reorder`
--

CREATE TABLE `save_reorder` (
  `id` int(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `pdesc` varchar(255) NOT NULL,
  `unit_cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `save_reorder`
--

INSERT INTO `save_reorder` (`id`, `qty`, `unit`, `pdesc`, `unit_cost`) VALUES
(27, 24, '234', '123', 123);

-- --------------------------------------------------------

--
-- Table structure for table `session_id`
--

CREATE TABLE `session_id` (
  `sid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `session_id`
--

INSERT INTO `session_id` (`sid`) VALUES
('SID-802204'),
('SID-332307'),
('SID-3922333'),
('SID-23032'),
('SID-22292032'),
('SID-2223033'),
('SID-327830'),
('SID-79535432'),
('SID-03323573');

-- --------------------------------------------------------

--
-- Table structure for table `temp_assign`
--

CREATE TABLE `temp_assign` (
  `assign_id` varchar(255) NOT NULL,
  `par_id` varchar(255) NOT NULL,
  `eq_inv_id` varchar(255) NOT NULL,
  `empl_no` varchar(255) NOT NULL,
  `remarks_assign` longtext NOT NULL,
  `date_iss` varchar(255) NOT NULL,
  `location_assign` varchar(255) NOT NULL,
  `par_tempassign` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `temp_assign_undis`
--

CREATE TABLE `temp_assign_undis` (
  `temp_id` int(11) NOT NULL,
  `temp_assign_id` varchar(255) NOT NULL,
  `temp_par_id` varchar(255) NOT NULL,
  `temp_eq_inv_id` varchar(255) NOT NULL,
  `temp_deploy_no` varchar(255) NOT NULL,
  `temp_remarks_assign` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `gender` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `timeline`
--

CREATE TABLE `timeline` (
  `timeline_id` varchar(255) NOT NULL,
  `timeline_desc` varchar(255) NOT NULL,
  `multimedia` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `timeline`
--

INSERT INTO `timeline` (`timeline_id`, `timeline_desc`, `multimedia`) VALUES
('1', '1', '1'),
('2', '2', '2');

-- --------------------------------------------------------

--
-- Table structure for table `transac_inv`
--

CREATE TABLE `transac_inv` (
  `transac_uid` int(11) NOT NULL,
  `transac_type` varchar(255) NOT NULL,
  `transac_pos` varchar(255) NOT NULL,
  `transac_eqid` varchar(255) NOT NULL,
  `transac_date` varchar(255) NOT NULL,
  `transac_loc` varchar(255) NOT NULL,
  `transac_remark` longtext NOT NULL,
  `transac_empl` varchar(255) NOT NULL,
  `transac_transferredto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transac_inv`
--

INSERT INTO `transac_inv` (`transac_uid`, `transac_type`, `transac_pos`, `transac_eqid`, `transac_date`, `transac_loc`, `transac_remark`, `transac_empl`, `transac_transferredto`) VALUES
(634, 'Updated an Equipment Information', 'IT Admin', 'EQ-3936263', 'February 20, 2020 10:57:am  ', '', '', '', ''),
(635, 'Updated an Equipment Information', 'IT Admin', 'EQ-3936263', 'February 20, 2020 11:01:am  ', '', '', '', ''),
(636, 'DEPLOYED an Equipment', 'IT Admin', 'EQ-3936263', 'February 20, 2020 11:01:am  ', '', '', 'Bicol Office', ''),
(637, 'Updated an Equipment Information', 'IT Admin', 'EQ-3936263', 'February 20, 2020 11:12:am  ', '', '', '', ''),
(638, 'Updated an Equipment Information', 'IT Admin', 'EQ-3936263', 'February 20, 2020 11:12:am  ', '', '', '', ''),
(639, 'removed an equipment', 'IT Admin', 'EQ-033092', 'February 20, 2020 11:14:am  ', '', '', 'EMPL-3322382', ''),
(640, 'Assigned an Equipment', 'IT Admin', 'EQ-3936263', 'February 20, 2020 11:14:am  ', 'Laguna', '', 'EMPL-3322382', ''),
(641, 'Updated an Equipment Information', 'IT Admin', 'EQ-3936263', 'February 20, 2020 11:17:am  ', '', '', '', ''),
(642, 'Updated an Equipment Information', 'IT Admin', 'EQ-3936263', 'February 20, 2020 11:19:am  ', '', '', '', ''),
(643, 'Updated an Equipment Information', 'IT Admin', 'EQ-3936263', 'February 20, 2020 11:19:am  ', '', '', '', ''),
(644, 'Updated an Equipment Information', 'IT Admin', 'EQ-033092', 'February 20, 2020 11:20:am  ', '', '', '', ''),
(645, 'Updated an Equipment Information', 'IT Admin', 'EQ-033092', 'February 20, 2020 11:20:am  ', '', '', '', ''),
(646, 'Updated an Equipment Information', 'IT Admin', 'EQ-033092', 'February 20, 2020 11:20:am  ', '', '', '', ''),
(647, 'Updated an Equipment Information', 'IT Admin', 'EQ-033092', 'February 20, 2020 11:20:am  ', '', '', '', ''),
(648, 'Updated an Equipment Information', 'IT Admin', 'EQ-033092', 'February 20, 2020 11:21:am  ', '', '', '', ''),
(649, 'Updated an Equipment Information', 'IT Admin', 'EQ-033092', 'February 20, 2020 11:31:am  ', '', '', '', ''),
(650, 'Updated an Equipment Information', 'IT Admin', 'EQ-033092', 'February 20, 2020 11:32:am  ', '', '', '', ''),
(651, 'Updated an Equipment Information', 'IT Admin', 'EQ-033092', 'February 20, 2020 11:34:am  ', '', '', '', ''),
(652, 'Updated an Equipment Information', 'IT Admin', 'EQ-033092', 'February 20, 2020 11:34:am  ', '', '', '', ''),
(653, 'DEPLOYED an Equipment', 'IT Admin', 'EQ-033092', 'February 20, 2020 11:35:am  ', '', '', 'Bicol Office', ''),
(654, 'DEPLOYED an undistributed Equipment', 'IT Admin', 'EQ-033092', 'February 20, 2020 11:39:am  ', '', '', 'Bicol Office', ''),
(655, 'Added a position', 'HR and Admin Manager', 'DSF', 'February 20, 2020 11:42:am  ', '', '', '', ''),
(656, 'Deleted a position', 'HR and Admin Manager', 'DSF', 'February 20, 2020 11:42:am  ', '', '', '', ''),
(657, 'Updated an Equipment Information', 'IT Admin', 'EQ-3936263', 'February 20, 2020 11:46:am  ', '', '', '', ''),
(658, 'DEPLOYED an undistributed Equipment', 'IT Admin', 'EQ-033092', 'February 20, 2020 1:43:pm  ', '', '', 'Bicol Office', ''),
(659, 'removed an equipment', 'IT Admin', 'EQ-3936263', 'February 20, 2020 4:14:pm  ', '', '', 'EMPL-3322382', ''),
(660, 'DEPLOYED an undistributed Equipment', 'IT Admin', 'EQ-3936263', 'February 20, 2020 4:19:pm  ', '', '', 'Bicol Office', ''),
(661, 'DEPLOYED an undistributed Equipment', 'IT Admin', 'EQ-033092', 'February 20, 2020 4:58:pm  ', '', '', 'Bicol Office', ''),
(662, 'removed an equipment from the undistributed section', 'IT Admin', 'EQ-033092', 'February 21, 2020 8:41:am  ', '', '', '', ''),
(663, 'removed an equipment from the undistributed section', 'IT Admin', 'EQ-3936263', 'February 21, 2020 9:02:am  ', '', '', '', ''),
(664, 'DEPLOYED an undistributed Equipment', 'IT Admin', 'EQ-033092', 'February 21, 2020 9:08:am  ', '', '', 'PRC Testing Center', ''),
(665, 'DEPLOYED an undistributed Equipment', 'IT Admin', 'EQ-3936263', 'February 21, 2020 9:08:am  ', '', '', 'PRC Testing Center', ''),
(666, 'removed an equipment from the undistributed section', 'IT Admin', 'EQ-033092', 'February 21, 2020 10:39:am  ', '', '', '', ''),
(667, 'DEPLOYED an undistributed Equipment', 'IT Admin', 'EQ-033092', 'February 21, 2020 12:59:pm  ', '', '', 'PRC Testing Center', ''),
(668, 'Changed an employee Deployment', 'HR and Admin Manager', '', 'February 21, 2020 3:46:pm  ', 'Precast, Sta. Rosa, Laguna', '', 'EMPL-3322382', ''),
(669, 'Changed an employee Deployment', 'HR and Admin Manager', '', 'February 21, 2020 4:10:pm  ', 'PRC Testing Center', '', 'EMPL-3322382', ''),
(670, 'DEPLOYED an undistributed Equipment', 'IT Admin', 'EQ-3936263', 'March 2, 2020 12:08:am  ', '', '', 'PRC Testing Center', ''),
(671, 'Updated a PAR remark', 'IT Admin', 'PAR-352003', 'March 2, 2020 6:02:am  ', '', 'fafsfsf', 'EMPL-3322382', ''),
(672, 'Assigned an Equipment', 'IT Admin', 'EQ-033092', 'March 2, 2020 6:05:am  ', 'PRC Testing Center', '', 'EMPL-3322382', ''),
(673, 'Assigned an Equipment', 'IT Admin', 'EQ-3936263', 'March 2, 2020 6:05:am  ', 'PRC Testing Center', '', 'EMPL-3322382', ''),
(674, 'Assigned an Equipment', 'IT Admin', 'EQ-033092', 'March 2, 2020 6:05:am  ', 'PRC Testing Center', '', 'EMPL-3322382', ''),
(675, 'Assigned an Equipment', 'IT Admin', 'EQ-3936263', 'March 2, 2020 6:05:am  ', 'PRC Testing Center', '', 'EMPL-3322382', ''),
(676, 'Assigned an Equipment', 'IT Admin', 'EQ-033092', 'March 2, 2020 6:06:am  ', 'PRC Testing Center', '', 'EMPL-3322382', ''),
(677, 'Assigned an Equipment', 'IT Admin', 'EQ-3936263', 'March 2, 2020 6:06:am  ', 'PRC Testing Center', '', 'EMPL-3322382', ''),
(678, 'Assigned an Equipment', 'IT Admin', 'EQ-033092', 'March 2, 2020 6:06:am  ', 'PRC Testing Center', '', 'EMPL-3322382', ''),
(679, 'Assigned an Equipment', 'IT Admin', 'EQ-3936263', 'March 2, 2020 6:06:am  ', 'PRC Testing Center', '', 'EMPL-3322382', ''),
(680, 'Assigned an Equipment', 'IT Admin', 'EQ-033092', 'March 2, 2020 6:06:am  ', 'PRC Testing Center', '', 'EMPL-3322382', ''),
(681, 'Assigned an Equipment', 'IT Admin', 'EQ-3936263', 'March 2, 2020 6:06:am  ', 'PRC Testing Center', '', 'EMPL-3322382', ''),
(682, 'Assigned an Equipment', 'IT Admin', 'EQ-033092', 'March 2, 2020 6:07:am  ', 'PRC Testing Center', '', 'EMPL-3322382', ''),
(683, 'Assigned an Equipment', 'IT Admin', 'EQ-3936263', 'March 2, 2020 6:07:am  ', 'PRC Testing Center', '', 'EMPL-3322382', ''),
(684, 'Updated an Equipment Information', 'IT Admin', 'EQ-033092', 'March 2, 2020 6:09:am  ', '', '', '', ''),
(685, 'Updated an Equipment Information', 'IT Admin', 'EQ-033092', 'March 2, 2020 6:09:am  ', '', '', '', ''),
(686, 'Updated an Equipment Information', 'IT Admin', 'EQ-3936263', 'March 2, 2020 6:09:am  ', '', '', '', ''),
(687, 'Updated an Equipment Information', 'IT Admin', 'EQ-3936263', 'March 2, 2020 6:11:am  ', '', '', '', ''),
(688, 'DEPLOYED an undistributed Equipment', 'IT Admin', 'EQ-033092', 'March 2, 2020 6:11:am  ', '', '', 'Bicol Office', ''),
(689, 'Updated an Equipment Information', 'IT Admin', 'EQ-033092', 'March 2, 2020 6:12:am  ', '', '', '', ''),
(690, 'Updated an Equipment Information', 'IT Admin', 'EQ-033092', 'March 2, 2020 6:12:am  ', '', '', '', ''),
(691, 'DEPLOYED an undistributed Equipment', 'IT Admin', 'EQ-033092', 'March 2, 2020 6:13:am  ', '', '', 'Bicol Office', ''),
(692, 'Assigned an Equipment', 'IT Admin', 'EQ-033092', 'March 2, 2020 6:14:am  ', 'Bicol Office', '', 'EMPL-6050333', ''),
(693, 'Updated an Equipment Information', 'IT Admin', 'EQ-3936263', 'March 2, 2020 6:14:am  ', '', '', '', ''),
(694, 'Updated an Equipment Information', 'IT Admin', 'EQ-033092', 'March 2, 2020 6:14:am  ', '', '', '', ''),
(695, 'Updated an Equipment Information', 'IT Admin', 'EQ-033092', 'March 2, 2020 6:15:am  ', '', '', '', ''),
(696, 'Updated an Equipment Information', 'IT Admin', 'EQ-033092', 'March 2, 2020 6:16:am  ', '', '', '', ''),
(697, 'Updated an Equipment Information', 'IT Admin', 'EQ-033092', 'March 2, 2020 6:16:am  ', '', '', '', ''),
(698, 'Updated an Equipment Information', 'IT Admin', 'EQ-033092', 'March 2, 2020 6:21:am  ', '', '', '', ''),
(699, 'Updated an Equipment Information', 'IT Admin', 'EQ-3936263', 'March 2, 2020 6:21:am  ', '', '', '', ''),
(700, 'Assigned an Equipment', 'IT Admin', 'EQ-3936263', 'March 2, 2020 6:22:am  ', 'PRC Testing Center', '', 'EMPL-3322382', ''),
(701, 'Updated an Equipment Information', 'IT Admin', 'EQ-3936263', 'March 2, 2020 6:23:am  ', '', '', '', ''),
(702, 'Assigned an Equipment', 'IT Admin', 'EQ-033092', 'March 2, 2020 6:25:am  ', 'Bicol Office', '', 'EMPL-6050333', ''),
(703, 'Updated an Equipment Information', 'IT Admin', 'EQ-033092', 'March 2, 2020 6:25:am  ', '', '', '', ''),
(704, 'Updated an Equipment Information', 'IT Admin', 'EQ-033092', 'March 2, 2020 6:25:am  ', '', '', '', ''),
(705, 'Added an Equipment', 'IT Admin', 'EQ-03228693', 'March 2, 2020 6:26:am  ', 'PRC Testing Center', '', '', ''),
(706, 'Updated an Equipment Information', 'IT Admin', 'EQ-03228693', 'March 2, 2020 6:27:am  ', '', '', '', ''),
(707, 'Updated an Equipment Information', 'IT Admin', 'EQ-03228693', 'March 2, 2020 6:27:am  ', '', '', '', ''),
(708, 'Updated an Equipment Information', 'IT Admin', 'EQ-03228693', 'March 2, 2020 6:28:am  ', '', '', '', ''),
(709, 'Updated an Equipment Information', 'IT Admin', 'EQ-03228693', 'March 2, 2020 6:30:am  ', '', '', '', ''),
(710, 'Updated an Equipment Information', 'IT Admin', 'EQ-03228693', 'March 2, 2020 6:30:am  ', '', '', '', ''),
(711, 'Updated an Equipment Information', 'IT Admin', 'EQ-03228693', 'March 2, 2020 6:30:am  ', '', '', '', ''),
(712, 'Deleted an Equipment', 'IT Admin', 'EQ-03228693', 'March 2, 2020 6:33:am  ', '', '', '', ''),
(713, 'Edited employee information', 'HR and Admin Manager', '', 'March 2, 2020 6:59:am  ', '', '', 'EMPL-6050333', '');

-- --------------------------------------------------------

--
-- Table structure for table `usr_tbl`
--

CREATE TABLE `usr_tbl` (
  `usr_id` varchar(255) NOT NULL,
  `empl_firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `empl_lastname` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `usr` varchar(255) NOT NULL,
  `psw` varchar(255) NOT NULL,
  `date_created` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usr_tbl`
--

INSERT INTO `usr_tbl` (`usr_id`, `empl_firstname`, `middlename`, `empl_lastname`, `role`, `usr`, `psw`, `date_created`) VALUES
('USER-00622033', 'Ryan', '', 'Mirarza', 'IT Admin', 'itadmin', '1', '2020-02-18'),
('USER-238042', 'Dennis', '', 'Macandog', 'President', 'president', '1', '2020-02-18'),
('USER-3733320', 'Vivian', '', 'Armario', 'HR and Admin Manager', 'hrmanager', '1', '2020-02-18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addeq_temp`
--
ALTER TABLE `addeq_temp`
  ADD PRIMARY KEY (`invid`);

--
-- Indexes for table `archive`
--
ALTER TABLE `archive`
  ADD PRIMARY KEY (`arch_empl_no`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brandid`);

--
-- Indexes for table `deletedeq`
--
ALTER TABLE `deletedeq`
  ADD PRIMARY KEY (`deleted_eqid`);

--
-- Indexes for table `deployment`
--
ALTER TABLE `deployment`
  ADD PRIMARY KEY (`deply_id`);

--
-- Indexes for table `deploy_transfer`
--
ALTER TABLE `deploy_transfer`
  ADD PRIMARY KEY (`idTransfer`),
  ADD UNIQUE KEY `id` (`transferID`);

--
-- Indexes for table `dept_tbl`
--
ALTER TABLE `dept_tbl`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `empl_tbl`
--
ALTER TABLE `empl_tbl`
  ADD PRIMARY KEY (`empl_no`);

--
-- Indexes for table `eq_assign_tbl`
--
ALTER TABLE `eq_assign_tbl`
  ADD PRIMARY KEY (`eq_assign_id`);

--
-- Indexes for table `eq_desc`
--
ALTER TABLE `eq_desc`
  ADD PRIMARY KEY (`eq_desc_id`);

--
-- Indexes for table `eq_history`
--
ALTER TABLE `eq_history`
  ADD PRIMARY KEY (`hid`);

--
-- Indexes for table `eq_inv`
--
ALTER TABLE `eq_inv`
  ADD PRIMARY KEY (`eq_inv_id`);

--
-- Indexes for table `par_undis`
--
ALTER TABLE `par_undis`
  ADD PRIMARY KEY (`par_id_undis`);

--
-- Indexes for table `prty_ackn_rcpt`
--
ALTER TABLE `prty_ackn_rcpt`
  ADD PRIMARY KEY (`par_id`);

--
-- Indexes for table `save_reorder`
--
ALTER TABLE `save_reorder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp_assign`
--
ALTER TABLE `temp_assign`
  ADD KEY `eq_inv` (`eq_inv_id`),
  ADD KEY `empl` (`empl_no`),
  ADD KEY `assign_id` (`assign_id`) USING BTREE;

--
-- Indexes for table `temp_assign_undis`
--
ALTER TABLE `temp_assign_undis`
  ADD PRIMARY KEY (`temp_id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `test` ADD FULLTEXT KEY `desc0` (`gender`);

--
-- Indexes for table `timeline`
--
ALTER TABLE `timeline`
  ADD PRIMARY KEY (`timeline_id`);

--
-- Indexes for table `transac_inv`
--
ALTER TABLE `transac_inv`
  ADD PRIMARY KEY (`transac_uid`);

--
-- Indexes for table `usr_tbl`
--
ALTER TABLE `usr_tbl`
  ADD PRIMARY KEY (`usr_id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brandid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT for table `deploy_transfer`
--
ALTER TABLE `deploy_transfer`
  MODIFY `idTransfer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `eq_history`
--
ALTER TABLE `eq_history`
  MODIFY `hid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT for table `par_undis`
--
ALTER TABLE `par_undis`
  MODIFY `par_id_undis` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prty_ackn_rcpt`
--
ALTER TABLE `prty_ackn_rcpt`
  MODIFY `par_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=762;

--
-- AUTO_INCREMENT for table `save_reorder`
--
ALTER TABLE `save_reorder`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `temp_assign_undis`
--
ALTER TABLE `temp_assign_undis`
  MODIFY `temp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transac_inv`
--
ALTER TABLE `transac_inv`
  MODIFY `transac_uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=714;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `temp_assign`
--
ALTER TABLE `temp_assign`
  ADD CONSTRAINT `empl` FOREIGN KEY (`empl_no`) REFERENCES `empl_tbl` (`empl_no`),
  ADD CONSTRAINT `eq_inv` FOREIGN KEY (`eq_inv_id`) REFERENCES `eq_inv` (`eq_inv_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

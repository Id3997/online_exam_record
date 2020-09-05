-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2020 at 07:20 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exam_php`
--

-- --------------------------------------------------------

--
-- Table structure for table `crs_edit_log`
--

CREATE TABLE `crs_edit_log` (
  `sl` int(10) NOT NULL,
  `tbl_nm` varchar(100) NOT NULL,
  `fld_nm` varchar(100) NOT NULL,
  `old_vl` varchar(100) NOT NULL,
  `new_vl` varchar(100) NOT NULL,
  `tbl_sl` int(10) NOT NULL,
  `ref_tbl` varchar(100) NOT NULL,
  `ref_fld` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `crs_edit_log`
--

INSERT INTO `crs_edit_log` (`sl`, `tbl_nm`, `fld_nm`, `old_vl`, `new_vl`, `tbl_sl`, `ref_tbl`, `ref_fld`) VALUES
(1, 'ppr_setup', 'ps_mrks', '50', '40', 1, '', ''),
(2, 'ppr_setup', 'ps_mrks', '40', '30', 4, '', ''),
(3, 'ppr_setup', 'crs_id', '3', '', 2, 'crs_setup', 'cnm'),
(4, 'ppr_setup', 'crs_id', '2', '14', 6, 'crs_setup', 'cnm'),
(5, 'ppr_setup', 'yr_sem', '8', '1', 6, '', ''),
(6, 'ppr_setup', 'ppr_nm', 'dsfdf', 'ppp', 6, '', ''),
(7, 'ppr_setup', 'full_mrks', '8222', '822', 6, '', ''),
(8, 'ppr_setup', 'ps_mrks', '633', '63', 6, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `crs_setup`
--

CREATE TABLE `crs_setup` (
  `sl` int(11) NOT NULL,
  `cnm` varchar(100) NOT NULL,
  `yr_sem` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `crs_setup`
--

INSERT INTO `crs_setup` (`sl`, `cnm`, `yr_sem`) VALUES
(2, 'M-Tech', 4),
(14, 'B.sc', 8),
(25, 'CSE', 8);

-- --------------------------------------------------------

--
-- Table structure for table `ppr_setup`
--

CREATE TABLE `ppr_setup` (
  `sl` int(11) NOT NULL,
  `crs_id` int(100) NOT NULL,
  `yr_sem` int(100) NOT NULL,
  `ppr_nm` varchar(200) NOT NULL,
  `full_mrks` int(100) NOT NULL,
  `ps_mrks` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ppr_setup`
--

INSERT INTO `ppr_setup` (`sl`, `crs_id`, `yr_sem`, `ppr_nm`, `full_mrks`, `ps_mrks`) VALUES
(1, 2, 3, 'Networking', 100, 40),
(2, 0, 5, 'Math', 100, 40),
(4, 15, 7, 'Graphic', 100, 30),
(5, 2, 3, 'dffd', 522, 222),
(6, 14, 1, 'ppp', 822, 63);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `crs_edit_log`
--
ALTER TABLE `crs_edit_log`
  ADD PRIMARY KEY (`sl`);

--
-- Indexes for table `crs_setup`
--
ALTER TABLE `crs_setup`
  ADD PRIMARY KEY (`sl`);

--
-- Indexes for table `ppr_setup`
--
ALTER TABLE `ppr_setup`
  ADD PRIMARY KEY (`sl`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `crs_edit_log`
--
ALTER TABLE `crs_edit_log`
  MODIFY `sl` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `crs_setup`
--
ALTER TABLE `crs_setup`
  MODIFY `sl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `ppr_setup`
--
ALTER TABLE `ppr_setup`
  MODIFY `sl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

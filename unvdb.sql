-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2019 at 05:00 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `unvdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `email` varchar(25) NOT NULL,
  `pass` varchar(15) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `email`, `pass`, `name`) VALUES
(1, 'admin@uoitc.org', '1234', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `degrees`
--

CREATE TABLE `degrees` (
  `ID_deg` int(11) NOT NULL,
  `stu_id` int(11) DEFAULT NULL,
  `lec_lab_id` int(11) DEFAULT NULL,
  `deg_number` int(11) NOT NULL,
  `corse` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `degrees`
--

INSERT INTO `degrees` (`ID_deg`, `stu_id`, `lec_lab_id`, `deg_number`, `corse`) VALUES
(29, 4, 25, 5, 1),
(30, 5, 25, 54, 1),
(32, 5, 26, 76, 1),
(34, 4, 26, 55, 1),
(36, 6, 26, 98, 1);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `ID_dep` int(11) NOT NULL,
  `dep_name` varchar(50) NOT NULL,
  `dep_sub_name` varchar(5) NOT NULL,
  `unv_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`ID_dep`, `dep_name`, `dep_sub_name`, `unv_id`) VALUES
(1, 'Management Informatic System', 'MIS', NULL),
(4, 'bits', 'bit', 11);

-- --------------------------------------------------------

--
-- Table structure for table `lecture_lab`
--

CREATE TABLE `lecture_lab` (
  `ID_lec_lab` int(11) NOT NULL,
  `lec_lab_name` varchar(40) NOT NULL,
  `lec_lab_sub_name` varchar(5) NOT NULL,
  `id_stf` int(11) NOT NULL,
  `name_stf` varchar(50) NOT NULL,
  `lec_lab_corse` int(11) NOT NULL,
  `id_dep` int(11) NOT NULL,
  `stageLec` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lecture_lab`
--

INSERT INTO `lecture_lab` (`ID_lec_lab`, `lec_lab_name`, `lec_lab_sub_name`, `id_stf`, `name_stf`, `lec_lab_corse`, `id_dep`, `stageLec`) VALUES
(21, 'compuoter sys', 'cs', 1, 'ayoob ahmed', 1, 4, 4),
(23, 'java programming', 'java', 3, 'mohammed ali', 2, 4, 3),
(24, 'system analysis', 'SA', 3, 'mohammed ali', 1, 1, 2),
(25, 'operation management', 'OM', 3, 'mohammed ali', 1, 1, 4),
(26, 'project management', 'PM', 3, 'mohammed ali', 1, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `ID_stf` int(11) NOT NULL,
  `stf_first_name` varchar(20) NOT NULL,
  `stf_last_name` varchar(20) NOT NULL,
  `stf_email` varchar(25) NOT NULL,
  `stf_user_name` varchar(15) NOT NULL,
  `stf_password` varchar(20) NOT NULL,
  `stf_scientific_title` varchar(20) NOT NULL,
  `stf_functional_class` varchar(10) NOT NULL,
  `dep_id` int(11) DEFAULT NULL,
  `unv_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`ID_stf`, `stf_first_name`, `stf_last_name`, `stf_email`, `stf_user_name`, `stf_password`, `stf_scientific_title`, `stf_functional_class`, `dep_id`, `unv_id`) VALUES
(1, 'ayoob', 'ahmed', 'ayoob.ahmed@gmail.com', 'ayah', '123456', 'DR', '4', 1, NULL),
(3, 'mohammed', 'ali', 's@gmail.com', '3losh', '12345', 'bcs', '3', 1, 11);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `ID_stu` int(11) NOT NULL,
  `stu_first_name` varchar(20) NOT NULL,
  `stu_last_name` varchar(20) NOT NULL,
  `stu_email` varchar(25) NOT NULL,
  `stu_user_name` varchar(20) NOT NULL,
  `stu_password` varchar(20) NOT NULL,
  `stu_age` date NOT NULL,
  `stu_address` varchar(20) NOT NULL,
  `stu_stage` int(11) NOT NULL,
  `stu_status` tinyint(4) NOT NULL,
  `corse` int(11) NOT NULL,
  `dep_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`ID_stu`, `stu_first_name`, `stu_last_name`, `stu_email`, `stu_user_name`, `stu_password`, `stu_age`, `stu_address`, `stu_stage`, `stu_status`, `corse`, `dep_id`) VALUES
(1, 'Ali', 'Esaa', 'ali@gmail.com', 'ali', '123456', '2000-11-17', 'Baghdad/mansor', 1, 2, 1, 1),
(3, 'Ù…Ø­Ù…Ø¯Ø¹Ù„ÙŠ', 'Ù…Ø§Ù„ÙƒÙŠ', 'sifatkhan@gmail.com', '3loshl', '123', '1998-02-05', 'Ø·Ø±ÙŠÙ‚ ÙƒØ±Ø¨Ù„Ø§Ø', 3, 1, 1, 1),
(4, 'abbas', 'ali', 'a@g.com', 'ab', '1234', '1998-02-06', 'baghdad', 4, 1, 1, 1),
(5, 'ammer', 'mohamd', 'sa@s.com', 'sa', '123', '1999-02-07', 'bgd', 4, 1, 1, 1),
(6, 'aya', 'ali', 'aya@gmail.com', 'ayo', '123', '1990-02-09', 'kradaa', 4, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `university`
--

CREATE TABLE `university` (
  `ID_unv` int(11) NOT NULL,
  `unv_name` varchar(50) NOT NULL,
  `unv_sub_name` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `university`
--

INSERT INTO `university` (`ID_unv`, `unv_name`, `unv_sub_name`) VALUES
(11, 'information technology', 'it');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `degrees`
--
ALTER TABLE `degrees`
  ADD PRIMARY KEY (`ID_deg`),
  ADD KEY `deg_stu_id_fk` (`stu_id`),
  ADD KEY `deg_lec_lab_id_fk` (`lec_lab_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`ID_dep`),
  ADD KEY `dep_nuv_id_fk` (`unv_id`);

--
-- Indexes for table `lecture_lab`
--
ALTER TABLE `lecture_lab`
  ADD PRIMARY KEY (`ID_lec_lab`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`ID_stf`),
  ADD UNIQUE KEY `stf_email` (`stf_email`),
  ADD UNIQUE KEY `stf_user_name` (`stf_user_name`),
  ADD KEY `stf_dep_id_fk` (`dep_id`),
  ADD KEY `stf_unv_id_fk` (`unv_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`ID_stu`),
  ADD UNIQUE KEY `stu_email` (`stu_email`),
  ADD UNIQUE KEY `stu_user_name` (`stu_user_name`),
  ADD KEY `stu_dep_id_fk` (`dep_id`);

--
-- Indexes for table `university`
--
ALTER TABLE `university`
  ADD PRIMARY KEY (`ID_unv`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `degrees`
--
ALTER TABLE `degrees`
  MODIFY `ID_deg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `ID_dep` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lecture_lab`
--
ALTER TABLE `lecture_lab`
  MODIFY `ID_lec_lab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `ID_stf` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `ID_stu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `university`
--
ALTER TABLE `university`
  MODIFY `ID_unv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `degrees`
--
ALTER TABLE `degrees`
  ADD CONSTRAINT `deg_lec_lab_id_fk` FOREIGN KEY (`lec_lab_id`) REFERENCES `lecture_lab` (`ID_lec_lab`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `deg_stu_id_fk` FOREIGN KEY (`stu_id`) REFERENCES `student` (`ID_stu`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `dep_nuv_id_fk` FOREIGN KEY (`unv_id`) REFERENCES `university` (`ID_unv`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `stf_dep_id_fk` FOREIGN KEY (`dep_id`) REFERENCES `department` (`ID_dep`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `stf_unv_id_fk` FOREIGN KEY (`unv_id`) REFERENCES `university` (`ID_unv`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `stu_dep_id_fk` FOREIGN KEY (`dep_id`) REFERENCES `department` (`ID_dep`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

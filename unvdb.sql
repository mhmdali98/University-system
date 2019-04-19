-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2019 at 01:49 AM
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
  `pass` varchar(60) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `email`, `pass`, `name`) VALUES
(1, 'admin@uoitc.org', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1', 'admin');

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
(51, 17, 28, 88, 1),
(52, 19, 28, 55, 1),
(53, 17, 29, 99, 1),
(54, 19, 29, 76, 1);

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
(5, 'business information technology', 'BIT', 12),
(6, 'information system management', 'ISM', 12);

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
(28, 'programming langauge in java', 'JAVA', 5, 'mhmd ali', 1, 5, 3),
(29, 'programming langauge in C++', 'C++', 5, 'mhmd ali', 1, 5, 3),
(30, 'programming langauge in python', 'Pytho', 5, 'mhmd ali', 1, 5, 3);

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
  `stf_password` varchar(60) NOT NULL,
  `stf_scientific_title` varchar(20) NOT NULL,
  `stf_functional_class` varchar(10) NOT NULL,
  `dep_id` int(11) DEFAULT NULL,
  `unv_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`ID_stf`, `stf_first_name`, `stf_last_name`, `stf_email`, `stf_user_name`, `stf_password`, `stf_scientific_title`, `stf_functional_class`, `dep_id`, `unv_id`) VALUES
(5, 'mhmd', 'ali', 'mhmdali@g.c', 'm@uoitc.org', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1', 'dr', '4', 5, 12),
(6, 'husn', 'ameer', 'hus@g.c', 'gg', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1', 'dr', '4', 5, 12);

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
  `stu_password` varchar(60) NOT NULL,
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
(17, 'mryam', 'ali', 'ma@g.c', 'meme', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1', '1999-01-02', 'bgh', 3, 1, 1, 5),
(19, 'mohammed', 'ali', 'ma@g.c2', 'ma2', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1', '1998-04-10', 'bgh', 3, 1, 1, 5);

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
(12, 'information technology ', 'BIC');

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
  MODIFY `ID_deg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `ID_dep` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `lecture_lab`
--
ALTER TABLE `lecture_lab`
  MODIFY `ID_lec_lab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `ID_stf` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `ID_stu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `university`
--
ALTER TABLE `university`
  MODIFY `ID_unv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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

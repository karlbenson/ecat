-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2017 at 08:29 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lukedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_list`
--

CREATE TABLE `activity_list` (
  `id` int(11) NOT NULL,
  `activity` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `location` varchar(255) NOT NULL,
  `organizer_id` longtext NOT NULL,
  `staff_id` longtext NOT NULL,
  `is_final` varchar(255) NOT NULL DEFAULT 'Tentative'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Activity Calendar table';

-- --------------------------------------------------------

--
-- Table structure for table `attendance_counter`
--

CREATE TABLE `attendance_counter` (
  `id` int(11) NOT NULL,
  `staff_id` tinyint(4) NOT NULL,
  `year` year(4) NOT NULL,
  `sick_leave_balance` int(11) NOT NULL,
  `vac_leave_balance` int(11) NOT NULL,
  `vac_leave_ctr` int(11) NOT NULL,
  `maternity_leave` tinyint(1) NOT NULL,
  `sick_leave_ctr` int(11) NOT NULL,
  `undertime` int(11) DEFAULT NULL,
  `offset` int(11) DEFAULT NULL,
  `leave_start` date NOT NULL,
  `leave_end` date NOT NULL,
  `leave_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `attendance_record`
--

CREATE TABLE `attendance_record` (
  `id` int(11) NOT NULL,
  `staff_id` tinyint(4) NOT NULL,
  `year` year(4) NOT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `approved_by` varchar(255) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Attendance records';

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `DOC_LICENSE_NUM` char(7) NOT NULL,
  `LAST_NAME` varchar(20) NOT NULL,
  `FIRST_NAME` varchar(20) NOT NULL,
  `ADDRESS` varchar(50) DEFAULT NULL,
  `SPECIALIZATION` varchar(25) DEFAULT NULL,
  `VISIBLE` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`DOC_LICENSE_NUM`, `LAST_NAME`, `FIRST_NAME`, `ADDRESS`, `SPECIALIZATION`, `VISIBLE`) VALUES
('6666666', 'Gayo', 'JL', 'Bahay', 'Pediatrician', 'T');

-- --------------------------------------------------------

--
-- Table structure for table `ear`
--

CREATE TABLE `ear` (
  `patient_id` int(11) DEFAULT NULL,
  `left_ear` varchar(5) DEFAULT NULL,
  `right_ear` varchar(5) DEFAULT NULL,
  `ear_remark` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ear`
--

INSERT INTO `ear` (`patient_id`, `left_ear`, `right_ear`, `ear_remark`) VALUES
(136, 'NED', 'NED', ''),
(137, 'IC', 'IC', '');

-- --------------------------------------------------------

--
-- Table structure for table `ear_plan`
--

CREATE TABLE `ear_plan` (
  `medical_consult` varchar(150) NOT NULL,
  `cpclearance` varchar(150) NOT NULL,
  `admission` varchar(150) NOT NULL,
  `discharge` varchar(150) NOT NULL,
  `surgery` varchar(150) NOT NULL,
  `followup` varchar(150) NOT NULL,
  `others` varchar(150) NOT NULL,
  `medicaldate` date NOT NULL,
  `cpdate` date NOT NULL,
  `surgerydate` date NOT NULL,
  `admissiondate` date NOT NULL,
  `dischargedate` date NOT NULL,
  `followupdate` date NOT NULL,
  `othersdate` varchar(150) NOT NULL,
  `assessment` varchar(500) NOT NULL,
  `confirmed` varchar(150) NOT NULL,
  `interviewed` varchar(150) NOT NULL,
  `patient_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ear_plan`
--

INSERT INTO `ear_plan` (`medical_consult`, `cpclearance`, `admission`, `discharge`, `surgery`, `followup`, `others`, `medicaldate`, `cpdate`, `surgerydate`, `admissiondate`, `dischargedate`, `followupdate`, `othersdate`, `assessment`, `confirmed`, `interviewed`, `patient_id`) VALUES
('Test', 'Test', 'Test', 'Test', 'Test', 'Test', '   ', '2017-11-09', '2017-11-02', '2017-11-02', '2017-11-09', '2017-11-09', '2017-11-09', ' 1970-01-01 1970-01-01 1970-01-01', 'Test', 'Test', 'Test', 138);

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `electric` int(10) NOT NULL,
  `food` int(10) NOT NULL,
  `fuel` int(10) NOT NULL,
  `rent` int(10) NOT NULL,
  `water` int(10) NOT NULL,
  `transportation` int(10) NOT NULL,
  `education` int(10) NOT NULL,
  `clothing` int(10) NOT NULL,
  `medical` int(10) NOT NULL,
  `cellphoneload` int(10) NOT NULL,
  `others` int(10) NOT NULL,
  `patient_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`electric`, `food`, `fuel`, `rent`, `water`, `transportation`, `education`, `clothing`, `medical`, `cellphoneload`, `others`, `patient_id`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 138),
(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 141);

-- --------------------------------------------------------

--
-- Table structure for table `extra`
--

CREATE TABLE `extra` (
  `problem_presented` varchar(500) NOT NULL,
  `hist_background` varchar(500) NOT NULL,
  `no_occupants` int(2) NOT NULL,
  `no_floors` int(2) NOT NULL,
  `no_rooms` int(2) NOT NULL,
  `status_house` varchar(20) NOT NULL,
  `ownership` varchar(20) NOT NULL,
  `type_toilet` varchar(20) NOT NULL,
  `source_water` varchar(20) NOT NULL,
  `patient_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `extra`
--

INSERT INTO `extra` (`problem_presented`, `hist_background`, `no_occupants`, `no_floors`, `no_rooms`, `status_house`, `ownership`, `type_toilet`, `source_water`, `patient_id`) VALUES
('Test', 'Test', 1, 1, 1, 'New', 'Owned', 'Flush', 'Faucet', 138),
('', '', 0, 0, 0, 'New', 'Owned', 'Flush', 'Faucet', 141);

-- --------------------------------------------------------

--
-- Table structure for table `eye`
--

CREATE TABLE `eye` (
  `patient_id` int(11) DEFAULT NULL,
  `lvisual_acuity` varchar(8) NOT NULL,
  `rvisual_acuity` varchar(8) NOT NULL,
  `lwith_pinhole` varchar(8) NOT NULL,
  `rwith_pinhole` varchar(8) NOT NULL,
  `r_rx` varchar(50) NOT NULL,
  `l_rx` varchar(50) NOT NULL,
  `pd` varchar(50) NOT NULL,
  `eye_remark` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `eyepatient`
--

CREATE TABLE `eyepatient` (
  `PAT_ID_NUM` varchar(15) NOT NULL,
  `PAT_UNIV_ID` int(10) UNSIGNED NOT NULL,
  `PAT_FNAME` varchar(20) NOT NULL,
  `PAT_LNAME` varchar(20) NOT NULL,
  `PAT_AGE` varchar(6) NOT NULL,
  `PAT_PH` char(1) NOT NULL,
  `PAT_SEX` char(1) NOT NULL,
  `PHY_LICENSE_NUM` char(7) NOT NULL,
  `STAFF_LICENSE_NUM` tinyint(4) NOT NULL,
  `PRE_VA_WITH_SPECT_LEFT` varchar(7) NOT NULL,
  `POST_VA_WITH_SPECT_LEFT` varchar(7) DEFAULT NULL,
  `PRE_VA_WITH_SPECT_RIGHT` varchar(7) NOT NULL,
  `POST_VA_WITH_SPECT_RIGHT` varchar(7) DEFAULT NULL,
  `PRE_VA_NO_SPECT_LEFT` varchar(7) NOT NULL,
  `POST_VA_NO_SPECT_LEFT` varchar(7) DEFAULT NULL,
  `PRE_VA_NO_SPECT_RIGHT` varchar(7) NOT NULL,
  `POST_VA_NO_SPECT_RIGHT` varchar(7) DEFAULT NULL,
  `VISUAL_DISABILITY` varchar(15) DEFAULT NULL,
  `DISABILITY_CAUSE` varchar(30) DEFAULT NULL,
  `RIGHT_DIAGNOSIS` varchar(30) DEFAULT NULL,
  `LEFT_DIAGNOSIS` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eyepatient`
--

INSERT INTO `eyepatient` (`PAT_ID_NUM`, `PAT_UNIV_ID`, `PAT_FNAME`, `PAT_LNAME`, `PAT_AGE`, `PAT_PH`, `PAT_SEX`, `PHY_LICENSE_NUM`, `STAFF_LICENSE_NUM`, `PRE_VA_WITH_SPECT_LEFT`, `POST_VA_WITH_SPECT_LEFT`, `PRE_VA_WITH_SPECT_RIGHT`, `POST_VA_WITH_SPECT_RIGHT`, `PRE_VA_NO_SPECT_LEFT`, `POST_VA_NO_SPECT_LEFT`, `PRE_VA_NO_SPECT_RIGHT`, `POST_VA_NO_SPECT_RIGHT`, `VISUAL_DISABILITY`, `DISABILITY_CAUSE`, `RIGHT_DIAGNOSIS`, `LEFT_DIAGNOSIS`) VALUES
('CAT2017-001', 141, 'Pogi', 'Cary', 'gjhkgu', 'Y', 'M', '6666666', 21, 'U', '', 'U', '', 'U', '', 'U', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `eye_plan`
--

CREATE TABLE `eye_plan` (
  `visually_impared` varchar(150) NOT NULL,
  `cause_disability` varchar(150) NOT NULL,
  `medical` varchar(150) NOT NULL,
  `cpclearance` varchar(150) NOT NULL,
  `surgery` varchar(150) NOT NULL,
  `others` varchar(150) NOT NULL,
  `medicaldate` date NOT NULL,
  `cpclearancedate` date NOT NULL,
  `surgerydate` date NOT NULL,
  `othersdate` varchar(150) NOT NULL,
  `assement` varchar(500) NOT NULL,
  `confirmed` varchar(150) NOT NULL,
  `interviewed` varchar(150) NOT NULL,
  `patient_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eye_plan`
--

INSERT INTO `eye_plan` (`visually_impared`, `cause_disability`, `medical`, `cpclearance`, `surgery`, `others`, `medicaldate`, `cpclearancedate`, `surgerydate`, `othersdate`, `assement`, `confirmed`, `interviewed`, `patient_id`) VALUES
('', '', '', '', '', '   ', '1970-01-01', '1970-01-01', '1970-01-01', ' 1970-01-01 1970-01-01 1970-01-01', '', '', '', 141);

-- --------------------------------------------------------

--
-- Table structure for table `family`
--

CREATE TABLE `family` (
  `PATIENT_ID` int(10) NOT NULL,
  `family_name` varchar(100) NOT NULL,
  `relationship` varchar(100) NOT NULL,
  `age` int(3) NOT NULL,
  `sex` varchar(6) NOT NULL,
  `civil_status` varchar(100) NOT NULL,
  `educational_attainment` varchar(100) NOT NULL,
  `occupation` varchar(100) NOT NULL,
  `remark` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `family`
--

INSERT INTO `family` (`PATIENT_ID`, `family_name`, `relationship`, `age`, `sex`, `civil_status`, `educational_attainment`, `occupation`, `remark`) VALUES
(138, 'Test', '', 0, '', '', '', '', ''),
(138, 'Test', '', 0, '', '', '', '', ''),
(141, '', '', 0, '', '', '', '', ''),
(141, '', '', 0, '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `organizer`
--

CREATE TABLE `organizer` (
  `org_id` int(11) NOT NULL,
  `org_name` varchar(255) NOT NULL,
  `rep_position` varchar(255) NOT NULL,
  `rep_contact` varchar(255) DEFAULT NULL,
  `rep_name` varchar(255) DEFAULT NULL,
  `rep_email` varchar(255) DEFAULT NULL,
  `rep_address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Organizer table';

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `patient_id` int(10) UNSIGNED NOT NULL,
  `patient_fname` varchar(30) NOT NULL,
  `patient_lname` varchar(30) NOT NULL,
  `patient_minitial` char(1) NOT NULL,
  `school_number` int(11) DEFAULT NULL,
  `age` tinyint(3) NOT NULL,
  `sex` varchar(1) NOT NULL,
  `present_address` varchar(150) DEFAULT NULL,
  `provincial_address` varchar(150) DEFAULT NULL,
  `civil_status` char(20) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `birthplace` varchar(150) DEFAULT NULL,
  `religion` varchar(30) DEFAULT NULL,
  `occupation` varchar(50) DEFAULT NULL,
  `monthly_income` varchar(50) DEFAULT NULL,
  `contact_number` varchar(50) DEFAULT NULL,
  `highest_educ_attainment` varchar(50) DEFAULT NULL,
  `patient_remark` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patient_id`, `patient_fname`, `patient_lname`, `patient_minitial`, `school_number`, `age`, `sex`, `present_address`, `provincial_address`, `civil_status`, `birthdate`, `birthplace`, `religion`, `occupation`, `monthly_income`, `contact_number`, `highest_educ_attainment`, `patient_remark`) VALUES
(137, 'Roi', 'Beltran', '', 30, 5, 'f', '', '', '', '1970-01-01', '', '', '', '0-10,000', '', 'No Schooling Attended', ''),
(139, 'Yhesha', 'Lucero', '', 30, 5, 'f', '', '', '', '1970-01-01', '', '', '', '0-10,000', '', 'No Schooling Attended', ''),
(140, 'Ryjer Dilan', 'Astudillo', '', 30, 6, 'm', '', '', '', '1970-01-01', '', '', '', '0-10,000', '', 'No Schooling Attended', ''),
(141, 'Pogi', 'Cary', 'C', 1, 99, 'm', 'Baguio', 'Baguio', 'Married', '2017-11-14', 'bato', 'bato', 'bato', '30,001-50,000', '678676346', 'Highschool', 'afasfddf');

-- --------------------------------------------------------

--
-- Table structure for table `provider`
--

CREATE TABLE `provider` (
  `name` varchar(150) NOT NULL,
  `occu` varchar(150) NOT NULL,
  `relationship` varchar(150) NOT NULL,
  `income` varchar(20) NOT NULL,
  `needs_provided` varchar(150) NOT NULL,
  `donor_name` varchar(150) NOT NULL,
  `affiliation` varchar(20) NOT NULL,
  `services_provided` varchar(150) NOT NULL,
  `total_income` varchar(150) NOT NULL,
  `patient_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `provider`
--

INSERT INTO `provider` (`name`, `occu`, `relationship`, `income`, `needs_provided`, `donor_name`, `affiliation`, `services_provided`, `total_income`, `patient_id`) VALUES
('Test', 'Test', 'Test', '1', '  Food   Test', 'Test', 'GO', 'Test', '1', 138),
('', '', '', '', '', '', '', '', '', 141);

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `school_id` int(10) UNSIGNED NOT NULL,
  `school_name` varchar(100) NOT NULL,
  `location` varchar(150) NOT NULL,
  `contact_person` varchar(150) NOT NULL,
  `activity` varchar(30) NOT NULL,
  `date_visited` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`school_id`, `school_name`, `location`, `contact_person`, `activity`, `date_visited`) VALUES
(1, '-', 'NONE', 'NONE', 'NONE', '0000-00-00'),
(30, 'Dominican Elementary School', 'Dominican-Mirador', '', 'Ear Screening', '2017-02-07');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` tinyint(4) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `contact_number` varchar(11) DEFAULT NULL,
  `email_address` varchar(255) DEFAULT NULL,
  `staff_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Staff table';

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `last_name`, `first_name`, `middle_name`, `address`, `contact_number`, `email_address`, `staff_type`) VALUES
(21, 'Quibada', 'Cary', 'Pogi', 'asdf', '09289455936', 'admin@admin.com', 'Official Staff');

-- --------------------------------------------------------

--
-- Table structure for table `surgery`
--

CREATE TABLE `surgery` (
  `CASE_NUM` char(10) NOT NULL,
  `SURG_LICENSE_NUM` char(7) NOT NULL,
  `SURG_LICENSE_NUM1` char(7) DEFAULT NULL,
  `SURG_LICENSE_NUM2` char(7) DEFAULT NULL,
  `PAT_ID_NUM` varchar(15) NOT NULL,
  `VISUAL_IMPARITY` varchar(100) NOT NULL,
  `MED_HISTORY` varchar(100) DEFAULT NULL,
  `RIGHT_DIAGNOSIS` varchar(30) DEFAULT NULL,
  `LEFT_DIAGNOSIS` varchar(30) DEFAULT NULL,
  `SURG_ANESTHESIA` varchar(25) NOT NULL,
  `SURG_ADDRESS` varchar(50) NOT NULL,
  `SURG_DATE` date NOT NULL,
  `REMARKS` varchar(100) DEFAULT NULL,
  `INTERNIST` varchar(40) DEFAULT NULL,
  `INTERNIST1` varchar(40) DEFAULT NULL,
  `INTERNIST2` varchar(40) DEFAULT NULL,
  `ANESTHESIOLOGIST` varchar(40) NOT NULL,
  `PROCEDURE_TO_DO` varchar(15) DEFAULT NULL,
  `EYE_OPERATED` varchar(5) DEFAULT NULL,
  `IOLPOWER` varchar(20) NOT NULL,
  `PC_IOL` decimal(8,2) DEFAULT NULL,
  `PC_LAB` decimal(8,2) DEFAULT NULL,
  `PC_PF` decimal(8,2) DEFAULT NULL,
  `SPO_IOL` decimal(8,2) DEFAULT NULL,
  `SPO_OTHERS` decimal(8,2) DEFAULT NULL,
  `CSF_HBILL` decimal(8,2) DEFAULT NULL,
  `CSF_SUPPLIES` decimal(8,2) DEFAULT NULL,
  `CSF_LAB` decimal(8,2) DEFAULT NULL,
  `NDDCH_RA` decimal(8,2) DEFAULT NULL,
  `NDDCH_ZEISS` decimal(8,2) DEFAULT NULL,
  `NDDCH_SUPPLIES` decimal(8,2) DEFAULT NULL,
  `LF_PF` decimal(8,2) DEFAULT NULL,
  `LF_CPC` decimal(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_album`
--

CREATE TABLE `tbl_album` (
  `albumid` int(10) NOT NULL,
  `name` varchar(500) NOT NULL,
  `adesc` varchar(1000) NOT NULL,
  `image` varchar(500) NOT NULL,
  `date` datetime NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_album`
--

INSERT INTO `tbl_album` (`albumid`, `name`, `adesc`, `image`, `date`, `status`) VALUES
(10, 'Test', 'test', '237157021banner1.jpg', '2017-11-23 04:13:26', 'delete'),
(11, 'test', 'test', '907394870banner1.jpg', '2017-11-23 04:21:10', 'process');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery`
--

CREATE TABLE `tbl_gallery` (
  `gid` int(10) NOT NULL,
  `aid` int(10) NOT NULL,
  `gname` varchar(1000) NOT NULL,
  `gimages` varchar(1000) NOT NULL,
  `date` datetime NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_gallery`
--

INSERT INTO `tbl_gallery` (`gid`, `aid`, `gname`, `gimages`, `date`, `status`) VALUES
(27, 10, 'Test', '01952872265banner1.jpg', '2017-11-23 04:17:32', 'process'),
(28, 11, 'test', '0649824864banner1.jpg', '2017-11-23 04:21:32', 'process'),
(29, 11, 'test', '11867766674Lukelogo.png', '2017-11-23 04:21:32', 'delete');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_list`
--
ALTER TABLE `activity_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance_counter`
--
ALTER TABLE `attendance_counter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance_record`
--
ALTER TABLE `attendance_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`DOC_LICENSE_NUM`),
  ADD UNIQUE KEY `DOC_LICENSE_NUM` (`DOC_LICENSE_NUM`);

--
-- Indexes for table `eyepatient`
--
ALTER TABLE `eyepatient`
  ADD PRIMARY KEY (`PAT_ID_NUM`),
  ADD UNIQUE KEY `PAT_ID_NUM` (`PAT_ID_NUM`),
  ADD UNIQUE KEY `PAT_UNIV_ID` (`PAT_UNIV_ID`),
  ADD KEY `PHY_LICENSE_NUM` (`PHY_LICENSE_NUM`),
  ADD KEY `STAFF_LICENSE_NUM` (`STAFF_LICENSE_NUM`);

--
-- Indexes for table `organizer`
--
ALTER TABLE `organizer`
  ADD PRIMARY KEY (`org_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`school_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `surgery`
--
ALTER TABLE `surgery`
  ADD PRIMARY KEY (`CASE_NUM`),
  ADD UNIQUE KEY `CASE_NUM` (`CASE_NUM`),
  ADD KEY `SURG_LICENSE_NUM` (`SURG_LICENSE_NUM`),
  ADD KEY `SURG_LICENSE_NUM1` (`SURG_LICENSE_NUM1`),
  ADD KEY `SURG_LICENSE_NUM2` (`SURG_LICENSE_NUM2`),
  ADD KEY `INTERNIST` (`INTERNIST`),
  ADD KEY `INTERNIST1` (`INTERNIST1`),
  ADD KEY `INTERNIST2` (`INTERNIST2`),
  ADD KEY `ANESTHESIOLOGIST` (`ANESTHESIOLOGIST`),
  ADD KEY `PAT_ID_NUM` (`PAT_ID_NUM`);

--
-- Indexes for table `tbl_album`
--
ALTER TABLE `tbl_album`
  ADD PRIMARY KEY (`albumid`);

--
-- Indexes for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  ADD PRIMARY KEY (`gid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_list`
--
ALTER TABLE `activity_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `attendance_counter`
--
ALTER TABLE `attendance_counter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attendance_record`
--
ALTER TABLE `attendance_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `organizer`
--
ALTER TABLE `organizer`
  MODIFY `org_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `patient_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `school`
--
ALTER TABLE `school`
  MODIFY `school_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_album`
--
ALTER TABLE `tbl_album`
  MODIFY `albumid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  MODIFY `gid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `eyepatient`
--
ALTER TABLE `eyepatient`
  ADD CONSTRAINT `eyepatient_ibfk_1` FOREIGN KEY (`PHY_LICENSE_NUM`) REFERENCES `doctor` (`DOC_LICENSE_NUM`) ON UPDATE CASCADE,
  ADD CONSTRAINT `eyepatient_ibfk_2` FOREIGN KEY (`STAFF_LICENSE_NUM`) REFERENCES `staff` (`staff_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `eyepatient_ibfk_3` FOREIGN KEY (`PAT_UNIV_ID`) REFERENCES `patient` (`patient_id`) ON DELETE CASCADE;

--
-- Constraints for table `surgery`
--
ALTER TABLE `surgery`
  ADD CONSTRAINT `surgery_ibfk_1` FOREIGN KEY (`SURG_LICENSE_NUM`) REFERENCES `doctor` (`DOC_LICENSE_NUM`),
  ADD CONSTRAINT `surgery_ibfk_2` FOREIGN KEY (`SURG_LICENSE_NUM1`) REFERENCES `doctor` (`DOC_LICENSE_NUM`),
  ADD CONSTRAINT `surgery_ibfk_3` FOREIGN KEY (`SURG_LICENSE_NUM2`) REFERENCES `doctor` (`DOC_LICENSE_NUM`),
  ADD CONSTRAINT `surgery_ibfk_4` FOREIGN KEY (`INTERNIST`) REFERENCES `doctor` (`DOC_LICENSE_NUM`),
  ADD CONSTRAINT `surgery_ibfk_5` FOREIGN KEY (`INTERNIST1`) REFERENCES `doctor` (`DOC_LICENSE_NUM`),
  ADD CONSTRAINT `surgery_ibfk_6` FOREIGN KEY (`INTERNIST2`) REFERENCES `doctor` (`DOC_LICENSE_NUM`),
  ADD CONSTRAINT `surgery_ibfk_7` FOREIGN KEY (`ANESTHESIOLOGIST`) REFERENCES `doctor` (`DOC_LICENSE_NUM`),
  ADD CONSTRAINT `surgery_ibfk_8` FOREIGN KEY (`PAT_ID_NUM`) REFERENCES `eyepatient` (`PAT_ID_NUM`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

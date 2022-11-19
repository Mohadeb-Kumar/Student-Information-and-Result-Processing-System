-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2021 at 09:36 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `management`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AID` varchar(10) NOT NULL,
  `ANAME` varchar(50) DEFAULT NULL,
  `APASSWORD` varchar(50) DEFAULT NULL,
  `NOTICE` text DEFAULT NULL,
  `USERNAME` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AID`, `ANAME`, `APASSWORD`, `NOTICE`, `USERNAME`) VALUES
('M101', 'MOHADEB KUMAR', '123', 'Formal documentation is supposed to describe the system and so make it easier for people changing the system to understand. In practice, however, formal documentation is rarely updated and so does not accurately reflect the program code. For this reason, agile methods enthusiasts argue that it is a waste of time to write this documentation and that the key to implementing maintainable software is to produce high-quality, readable code. The lack of documentation should not be a problem in maintaining systems developed using an agile approach. However, my experience of system maintenance is that the most important document is the system requirements document, which tells the software engineer what the system is supposed to do. Without such knowledge, it is difficult to assess the impact of proposed system changes.', 'mohadeb.cse@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `TID` varchar(10) DEFAULT NULL,
  `CLASS` varchar(10) DEFAULT NULL,
  `SUBJECT` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`TID`, `CLASS`, `SUBJECT`) VALUES
('T101', 'I', 'Bangla'),
('T101', 'II', 'Bangla'),
('T101', 'III', 'Bangla'),
('T101', 'IV', 'Bangla'),
('T103', 'I', 'Mathematics'),
('T103', 'II', 'Mathematics'),
('T103', 'III', 'Mathematics'),
('T108', 'I', 'Mathematics'),
('T110', 'III', 'Mathematics');

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `SID` varchar(10) NOT NULL,
  `BANGLA` double(4,2) DEFAULT NULL,
  `ENGLISH` double(4,2) DEFAULT NULL,
  `MATHEMATICS` double(4,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`SID`, `BANGLA`, `ENGLISH`, `MATHEMATICS`) VALUES
('A101', 89.00, 90.50, 88.00),
('A102', 86.50, 45.00, 76.00),
('A103', 87.00, 43.50, 88.50),
('A104', 86.50, 65.00, 78.00),
('A105', 67.00, 45.50, 67.00),
('B101', 85.00, 90.50, 88.00),
('B102', 87.00, 45.00, 45.00),
('B103', 55.00, 43.50, 88.50),
('B104', 86.50, 65.00, 78.00),
('B105', 67.00, 45.50, 67.00),
('C101', 87.00, 90.50, 99.00),
('C102', 45.00, 45.00, 45.00),
('C103', 87.00, 43.50, 88.50),
('C104', 68.00, 65.00, 75.00),
('C105', 87.00, 45.50, 67.00),
('D101', 85.00, 90.50, 88.00),
('D102', 86.50, 45.00, 45.00),
('D103', 55.00, 43.50, 88.50),
('D104', 86.50, 65.00, 78.00),
('D105', 67.00, 45.50, 67.00);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `SID` varchar(10) NOT NULL,
  `SNAME` varchar(50) DEFAULT NULL,
  `FATHER` varchar(50) DEFAULT NULL,
  `MOTHER` varchar(50) DEFAULT NULL,
  `GENDER` varchar(20) DEFAULT NULL,
  `CLASS` varchar(10) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `PHONE` varchar(30) DEFAULT NULL,
  `ADDRESS` text DEFAULT NULL,
  `IMG` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`SID`, `SNAME`, `FATHER`, `MOTHER`, `GENDER`, `CLASS`, `DOB`, `PHONE`, `ADDRESS`, `IMG`) VALUES
('A101', 'Mohadeb Kumar', 'Binoy Chandra Debnath', 'Shoba Rani', 'Male', 'I', '2014-09-17', '01746019124', 'Karai, Adamdighi, Dhaka', 'student_img/mohadeb_kumar.jpg'),
('A102', 'Amit Debnath', 'Biram Chandra Debnath', 'Diptti Rani Debnath', 'Male', 'I', '2014-12-08', '01736425985', 'Karai, Adamdighi, Bogura', 'student_img/Motu_Cartoon.jpg'),
('A103', 'Puja Rani Debnath', 'Protab Chandra Debnath', 'Ratoshi Rani', 'Female', 'I', '2014-08-16', '01563236524', 'Tilabadury, Attrai, Naogaon', 'student_img/Female_Cartoon.jpg'),
('A104', 'Jibon Pramanik', 'Ramindra Pramanik', 'Shondha Rani', 'Male', 'I', '2014-05-14', '01832165235', 'Karai, Adamdighi, Bogura', 'student_img/Motu_Cartoon.jpg'),
('A105', 'Borsha Mohanta', 'Bishno Chandra Mohanta', 'Bijoli Rani Mohanta', 'Female', 'I', '2014-05-19', '01965412365', 'Karai, Adamdighi, Bogura', 'student_img/Female_Cartoon.jpg'),
('B101', 'Mohadeb Kumar', 'Binoy Chandra Debnath', 'Shoba Rani', 'Male', 'II', '2013-09-17', '01746019124', 'Karai, Adamdighi, Bogura', 'student_img/20191029_100626.jpg'),
('B102', 'Amit Debnath', 'Biram Chandra Debnath', 'Diptti Rani Debnath', 'Male', 'II', '2013-12-08', '01736425985', 'Karai, Adamdighi, Bogura', 'student_img/Motu_Cartoon.jpg'),
('B103', 'Puja Rani Debnath', 'Protab Chandra Debnath', 'Ratoshi Rani', 'Female', 'II', '2013-08-16', '01563236524', 'Tilabadury, Attrai, Naogaon', 'student_img/Female_Cartoon.jpg'),
('B104', 'Jibon Pramanik', 'Ramindra Pramanik', 'Shondha Rani', 'Male', 'II', '2013-05-14', '01832165235', 'Karai, Adamdighi, Bogura', 'student_img/Motu_Cartoon.jpg'),
('B105', 'Borsha Mohanta', 'Bishno Chandra Mohanta', 'Bijoli Rani Mohanta', 'Female', 'II', '2013-05-19', '01965412365', 'Karai, Adamdighi, Bogura', 'student_img/Female_Cartoon.jpg'),
('C101', 'Mohadeb Kumar', 'Binoy Chandra Debnath', 'Shoba Rani', 'Male', 'III', '2012-09-17', '01746019124', 'Karai, Adamdighi, Bogura', 'student_img/20191029_100626.jpg'),
('C102', 'Amit Debnath', 'Biram Chandra Debnath', 'Diptti Rani Debnath', 'Male', 'III', '2012-12-08', '01736425985', 'Karai, Adamdighi, Bogura', 'student_img/Motu_Cartoon.jpg'),
('C103', 'Puja Rani Debnath', 'Protab Chandra Debnath', 'Ratoshi Rani', 'Female', 'III', '2012-08-16', '01563236524', 'Tilabadury, Attrai, Naogaon', 'student_img/Female_Cartoon.jpg'),
('C104', 'Jibon Pramanik', 'Ramindra Pramanik', 'Shondha Rani', 'Male', 'III', '2012-05-14', '01832165235', 'Karai, Adamdighi, Bogura', 'student_img/Motu_Cartoon.jpg'),
('C105', 'Borsha Mohanta', 'Bishno Chandra Mohanta', 'Bijoli Rani Mohanta', 'Female', 'III', '2012-05-19', '01965412365', 'Karai, Adamdighi, Bogura', 'student_img/Female_Cartoon.jpg'),
('D101', 'Mohadeb Kumar', 'Binoy Chandra Debnath', 'Shoba Rani', 'Male', 'IV', '2011-09-17', '01746019124', 'Karai, Adamdighi, Bogura', 'student_img/20191029_100626.jpg'),
('D102', 'Amit Debnath', 'Biram Chandra Debnath', 'Diptti Rani Debnath', 'Male', 'IV', '2011-12-08', '01736425985', 'Karai, Adamdighi, Bogura', 'student_img/Motu_Cartoon.jpg'),
('D103', 'Puja Rani Debnath', 'Protab Chandra Debnath', 'Ratoshi Rani', 'Female', 'IV', '2011-08-16', '01563236524', 'Tilabadury, Attrai, Naogaon', 'student_img/Female_Cartoon.jpg'),
('D104', 'Jibon Pramanik', 'Ramindra Pramanik', 'Shondha Rani', 'Male', 'IV', '2011-05-14', '01832165235', 'Karai, Adamdighi, Bogura', 'student_img/Motu_Cartoon.jpg'),
('D105', 'Borsha Mohanta', 'Bishno Chandra Mohanta', 'Bijoli Rani Mohanta', 'Female', 'IV', '2011-05-19', '01965412365', 'Karai, Adamdighi, Bogura', 'student_img/Female_Cartoon.jpg'),
('E101', 'Mohadeb Kumar', 'Binoy Chandra Debnath', 'Shoba Rani', 'Male', 'V', '2010-09-17', '01746019124', 'Karai, Adamdighi, Bogura', 'student_img/20191029_100626.jpg'),
('E102', 'Amit Debnath', 'Biram Chandra Debnath', 'Diptti Rani Debnath', 'Male', 'V', '2010-12-08', '01736425985', 'Karai, Adamdighi, Bogura', 'student_img/Motu_Cartoon.jpg'),
('E103', 'Puja Rani Debnath', 'Protab Chandra Debnath', 'Ratoshi Rani', 'Female', 'V', '2010-08-16', '01563236524', 'Tilabadury, Attrai, Naogaon', 'student_img/Female_Cartoon.jpg'),
('E104', 'Jibon Pramanik', 'Ramindra Pramanik', 'Shondha Rani', 'Male', 'V', '2010-05-14', '01832165235', 'Karai, Adamdighi, Bogura', 'student_img/Motu_Cartoon.jpg'),
('E105', 'Borsha Mohanta', 'Bishno Chandra Mohanta', 'Bijoli Rani Mohanta', 'Female', 'V', '2010-05-19', '01965412365', 'Karai, Adamdighi, Bogura', 'student_img/Female_Cartoon.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `TID` varchar(10) NOT NULL,
  `TNAME` varchar(50) DEFAULT NULL,
  `TPASSWORD` varchar(50) DEFAULT NULL,
  `QUALIFICATION` varchar(100) DEFAULT NULL,
  `GENDER` varchar(20) DEFAULT NULL,
  `SALARY` double(8,2) DEFAULT 0.00,
  `EMAIL` varchar(50) DEFAULT NULL,
  `PHONE` varchar(30) DEFAULT NULL,
  `ADDRESS` text DEFAULT NULL,
  `IMG` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`TID`, `TNAME`, `TPASSWORD`, `QUALIFICATION`, `GENDER`, `SALARY`, `EMAIL`, `PHONE`, `ADDRESS`, `IMG`) VALUES
('T101', 'MOHADEB KUMAR', '123', 'BSC Eng. in CSE', 'Male', 45000.00, 'mohadeb.cse@gmail.com', '01521491161', 'Adamdighi, Bogura', 'teacher_img/20191029_100626.jpg'),
('T102', 'PANKAJ ROY', '456', 'BSC Eng. in CSE', 'Male', 46000.00, 'pankaj@gmail.com', '01736542598', 'Ranigonj, Lalmonirhat', NULL),
('T103', 'PRIYA SARKAR', '123', 'BSC in MATHEMATICS', 'Female', 45500.00, 'priya@gmail.com', '01535462598', 'Naogaon Sardar, Naogaon', 'teacher_img/images.jpeg-19.jpg'),
('T104', 'LITU BOCHON', '789', 'BSC Eng. in CSE', 'Male', 44500.00, 'bochon@gmail.com', '01823654695', 'Sherpur, Nohakhali', NULL),
('T105', 'JAKIR HOSSAIN', '321', 'BSC Eng. in CSE', 'Male', 44000.00, 'jakir@gmail.com', '01732165016', 'Kaharol, Dinajpur', NULL),
('T106', 'Mr. Motu', '123', 'BSc Eng. in CSE', 'Male', 0.00, 'motu@gmail.com', '01865983214', 'Furfuri, Nagar', 'teacher_img/Motu_Cartoon.jpg'),
('T107', 'AKHI DEB', '123', 'BSc in Chemistry', 'Female', 45000.50, 'akhideb@gmail.com', '01735698564', 'Kishoreganj, Dhaka', 'teacher_img/images.jpeg-18.jpg'),
('T111', 'Ponkaj Roy', '123', NULL, NULL, 0.00, 'pankajroy@gmail.com', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AID`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`SID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`SID`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`TID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

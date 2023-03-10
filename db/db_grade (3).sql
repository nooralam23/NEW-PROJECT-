-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2016 at 04:07 PM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_grade`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE IF NOT EXISTS `tbladmin` (
  `id` int(11) NOT NULL,
  `username` varchar(11) NOT NULL,
  `password` varchar(11) NOT NULL,
  `accounttype` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`id`, `username`, `password`, `accounttype`) VALUES
(1, 'admin', 'admin', 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `tblcourse`
--

CREATE TABLE IF NOT EXISTS `tblcourse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `courseName` varchar(50) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tblcourse`
--

INSERT INTO `tblcourse` (`id`, `courseName`, `description`) VALUES
(1, 'IT', 'Information Technology'),
(2, 'CS', 'Computer Science');

-- --------------------------------------------------------

--
-- Table structure for table `tblfaculty`
--

CREATE TABLE IF NOT EXISTS `tblfaculty` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `facNo` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `courseid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tblfaculty`
--

INSERT INTO `tblfaculty` (`id`, `facNo`, `fname`, `mname`, `lname`, `courseid`, `username`, `password`) VALUES
(1, 123, 'John', 'May', 'Chiu', 1, 'fac', 'pass'),
(2, 11, 'Mark', 'Anthony', 'Go', 1, 'faculty', 'pass');

-- --------------------------------------------------------

--
-- Table structure for table `tblfacultysubject`
--

CREATE TABLE IF NOT EXISTS `tblfacultysubject` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `facid` int(11) NOT NULL,
  `subjectid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tblfacultysubject`
--

INSERT INTO `tblfacultysubject` (`id`, `facid`, `subjectid`) VALUES
(1, 1, 2),
(3, 1, 2),
(4, 1, 1),
(8, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblgrade`
--

CREATE TABLE IF NOT EXISTS `tblgrade` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `studNo` varchar(20) NOT NULL,
  `prelim` int(11) NOT NULL,
  `midterm` int(11) NOT NULL,
  `final` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tblgrade`
--

INSERT INTO `tblgrade` (`id`, `studNo`, `prelim`, `midterm`, `final`, `total`) VALUES
(1, '1234', 58, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblgradingcriteria`
--

CREATE TABLE IF NOT EXISTS `tblgradingcriteria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `criterianame` text NOT NULL,
  `percentage` int(11) NOT NULL,
  `totalreq` int(11) NOT NULL,
  `subjectid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tblgradingcriteria`
--

INSERT INTO `tblgradingcriteria` (`id`, `criterianame`, `percentage`, `totalreq`, `subjectid`) VALUES
(1, 'assignment', 15, 100, 2),
(2, 'quiz', 10, 10, 1),
(3, 'exam', 40, 100, 1),
(4, 'assignment', 5, 20, 1),
(5, 'long quiz', 20, 30, 2),
(6, 'prelim', 30, 40, 0),
(7, 'quiz', 10, 5, 2),
(8, 'exam', 10, 5, 2),
(9, 'midterm', 30, 150, 2),
(10, 'ass', 10, 5, 1),
(11, 'midterm', 30, 150, 2),
(12, 'final', 100, 100, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tblschoolyear`
--

CREATE TABLE IF NOT EXISTS `tblschoolyear` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `schoolyear` varchar(20) NOT NULL,
  `semester` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tblschoolyear`
--

INSERT INTO `tblschoolyear` (`id`, `schoolyear`, `semester`) VALUES
(1, '2016-2017', '1st'),
(2, '2016-2017', 'Summer');

-- --------------------------------------------------------

--
-- Table structure for table `tblsection`
--

CREATE TABLE IF NOT EXISTS `tblsection` (
  `id` int(11) NOT NULL,
  `section` varchar(20) NOT NULL,
  `yearlevel` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsection`
--

INSERT INTO `tblsection` (`id`, `section`, `yearlevel`) VALUES
(1, '2', '2nd'),
(2, '3', '1st');

-- --------------------------------------------------------

--
-- Table structure for table `tblstudent`
--

CREATE TABLE IF NOT EXISTS `tblstudent` (
  `id` int(11) NOT NULL,
  `studNo` varchar(20) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `course` int(50) NOT NULL,
  `year` varchar(10) NOT NULL,
  `section` varchar(50) NOT NULL,
  `adviser` int(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblstudent`
--

INSERT INTO `tblstudent` (`id`, `studNo`, `fname`, `mname`, `lname`, `course`, `year`, `section`, `adviser`, `username`, `password`) VALUES
(1, '100', 'sample', 'sample', 'sample', 1, '3rd', '2', 1, 'sa', 'pass'),
(2, '1234', 'Test', 'User', 'Testing', 1, '1st', '2', 1, 'stud', 'pass'),
(3, '123', 'John', 'John', 'John', 1, '2nd', '2', 1, 'user', 'pass');

-- --------------------------------------------------------

--
-- Table structure for table `tblstudentgrade`
--

CREATE TABLE IF NOT EXISTS `tblstudentgrade` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `studentid` int(11) NOT NULL,
  `subjectid` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `finalgrade` int(11) NOT NULL,
  `period` varchar(20) NOT NULL,
  `criterianame` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `tblstudentgrade`
--

INSERT INTO `tblstudentgrade` (`id`, `studentid`, `subjectid`, `score`, `finalgrade`, `period`, `criterianame`) VALUES
(4, 1, 1, 40, 16, 'Prelim', 'exam'),
(5, 1, 1, 40, 4, 'Midterm', 'quiz'),
(6, 2, 1, 30, 12, 'Prelim', 'exam'),
(7, 2, 1, 50, 20, 'Prelim', 'exam'),
(8, 2, 2, 50, 20, 'Midterm', 'quiz'),
(14, 2, 2, 20, 2, 'Prelim', 'quiz'),
(15, 2, 2, 38, 4, 'Final', 'quiz'),
(16, 2, 1, 40, 16, 'Prelim', 'exam'),
(17, 2, 1, 20, 2, 'Midterm', 'quiz'),
(18, 2, 2, 50, 8, 'Prelim', 'assignment');

-- --------------------------------------------------------

--
-- Table structure for table `tblstudentsubject`
--

CREATE TABLE IF NOT EXISTS `tblstudentsubject` (
  `id` int(11) NOT NULL,
  `studentid` int(11) NOT NULL,
  `subjectid` int(11) NOT NULL,
  `facid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblstudentsubject`
--

INSERT INTO `tblstudentsubject` (`id`, `studentid`, `subjectid`, `facid`) VALUES
(1, 1, 1, 1),
(2, 2, 1, 1),
(3, 2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblsubjects`
--

CREATE TABLE IF NOT EXISTS `tblsubjects` (
  `id` int(11) NOT NULL,
  `subjectcode` varchar(20) NOT NULL,
  `subjectname` varchar(50) NOT NULL,
  `units` int(11) NOT NULL,
  `courseid` int(11) NOT NULL,
  `yearlevel` varchar(11) NOT NULL,
  `schoolyearid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsubjects`
--

INSERT INTO `tblsubjects` (`id`, `subjectcode`, `subjectname`, `units`, `courseid`, `yearlevel`, `schoolyearid`) VALUES
(1, 'it12', 'it1', 3, 1, '1st', 2),
(2, 'cs1', 'cs', 3, 1, '2nd', 2),
(3, 'cs12', 'cs2', 2, 2, '1st', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2021 at 06:09 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `notesmarketplace`
--

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `ID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `CountryCode` varchar(100) NOT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`ID`, `Name`, `CountryCode`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`) VALUES
(1, 'india', '91', '2021-01-05 18:01:44', 83, NULL, NULL, b'0'),
(2, 'USA', '92', '2021-01-20 18:01:49', 96, NULL, NULL, b'0'),
(3, 'UK', '93', '2021-02-09 18:02:04', 83, NULL, NULL, b'0'),
(4, 'Africa', '94', '2021-03-17 18:02:10', 83, NULL, NULL, b'1'),
(5, 'China', '95', '2021-04-22 18:02:17', 96, NULL, NULL, b'1'),
(6, 'Pakistan', '76', '2021-03-24 18:02:23', 83, NULL, NULL, b'0'),
(7, 'Brajil', '44', '2021-04-03 03:00:22', 83, '0000-00-00 00:00:00', 0, b'0');

-- --------------------------------------------------------

--
-- Table structure for table `downloads`
--

CREATE TABLE `downloads` (
  `ID` int(11) NOT NULL,
  `NoteID` int(11) NOT NULL,
  `Seller` int(11) NOT NULL,
  `Downloader` int(11) NOT NULL,
  `IsSellerHasAllowedDownload` bit(1) NOT NULL,
  `AttachementPath` varchar(200) DEFAULT NULL,
  `IsAttachmentDownloaded` bit(1) NOT NULL,
  `AttachmentDownlodedDate` datetime DEFAULT NULL,
  `IsPaid` bit(1) NOT NULL,
  `PurchasedPrice` decimal(10,0) DEFAULT NULL,
  `NoteTitle` varchar(100) NOT NULL,
  `NoteCategory` varchar(100) NOT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `downloads`
--

INSERT INTO `downloads` (`ID`, `NoteID`, `Seller`, `Downloader`, `IsSellerHasAllowedDownload`, `AttachementPath`, `IsAttachmentDownloaded`, `AttachmentDownlodedDate`, `IsPaid`, `PurchasedPrice`, `NoteTitle`, `NoteCategory`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`) VALUES
(579, 115, 114, 114, b'1', 'C:\\xampp\\htdocs\\images\\pdf\\170210116026_MCWC.pdf', b'1', '2021-03-18 07:28:27', b'0', '0', 'Engineering Graphics EG 1', 'CA', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(606, 128, 114, 113, b'1', 'C:\\xampp\\htdocs\\images\\pdf\\170210116026_MCWC.pdf', b'0', '2021-03-03 14:56:02', b'1', '76', 'MCWC', 'CA', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(615, 142, 117, 114, b'1', 'C:\\xampp\\htdocs\\images\\pdf\\170210116026_MCWC.pdf', b'0', '2021-03-22 13:48:38', b'1', '345', 'Environment', 'CA', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(617, 153, 114, 114, b'1', 'C:\\xampp\\htdocs\\images\\pdf\\170210116026_MCWC.pdf', b'1', '2021-03-23 03:11:23', b'0', '0', 'java advanced', 'CA', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(619, 154, 114, 115, b'1', 'C:\\xampp\\htdocs\\images\\pdf\\170210116026_MCWC.pdf', b'0', '2021-03-29 03:12:34', b'1', '67', 'java 2', 'IT', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(662, 209, 114, 115, b'1', 'C:\\xampp\\htdocs\\images\\pdf\\170210116026_MCWC.pdf', b'1', '2021-03-26 16:43:13', b'0', '0', 'Gujrati', 'CA', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(666, 141, 117, 114, b'1', 'C:\\xampp\\htdocs\\images\\pdf\\170210116026_MCWC.pdf', b'0', '2021-03-30 16:54:25', b'1', '34', 'Computer Network', 'CA', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(668, 142, 117, 114, b'0', 'C:xampphtdocsimagespdf170210116026_MCWC.pdf', b'0', '2021-04-01 05:46:21', b'1', '345', 'Environment', 'CA', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(669, 142, 117, 114, b'0', 'C:xampphtdocsimagespdf170210116026_MCWC.pdf', b'0', '2021-04-01 05:46:24', b'1', '345', 'Environment', 'CA', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(670, 228, 114, 127, b'1', '../member/114/0/Attachments/Final REPORT.pdf', b'1', '2021-04-14 15:58:27', b'0', '0', 'AIIII', 'Commerce', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(671, 228, 114, 127, b'1', '../member/114/0/Attachments/Final REPORT.pdf', b'1', '2021-04-14 15:58:27', b'0', '0', 'AIIII', 'Commerce', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(675, 259, 114, 115, b'1', '../member/114/244/Attachments/210_1618453152', b'0', '2021-04-15 04:45:30', b'1', '10', 'India2', 'MCA', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(676, 259, 114, 115, b'1', '../member/114/244/Attachments/210_1618453152', b'0', '2021-04-15 04:45:42', b'1', '10', 'India2', 'MCA', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(677, 260, 114, 113, b'1', '../member/114/260/Attachments/Final REPORT.pdf', b'0', '2021-04-15 05:09:28', b'1', '100', 'Gujjjgj', 'Commerce', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(678, 260, 114, 113, b'1', '../member/114/260/Attachments/Final REPORT.pdf', b'0', '2021-04-15 05:10:08', b'1', '100', 'Gujjjgj', 'Commerce', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(679, 260, 114, 96, b'0', '../member/114/260/Attachments/Final REPORT.pdf', b'0', '2021-04-15 05:23:48', b'1', '100', 'Gujjjgj', 'Commerce', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(680, 260, 114, 96, b'0', '../member/114/260/Attachments/Final REPORT.pdf', b'0', '2021-04-15 05:23:56', b'1', '100', 'Gujjjgj', 'Commerce', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `notecategories`
--

CREATE TABLE `notecategories` (
  `ID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Description` varchar(200) NOT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notecategories`
--

INSERT INTO `notecategories` (`ID`, `Name`, `Description`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`) VALUES
(1, 'IT', 'Its it category', '2021-04-01 15:44:38', 83, NULL, NULL, b'0'),
(2, 'MCA', 'Its mbca category', '2021-03-02 15:44:44', 96, NULL, NULL, b'0'),
(3, 'Science', 'Its science category', '2021-04-08 15:44:49', 83, NULL, NULL, b'1'),
(4, 'Commerce', 'Its commerce category', '2021-02-08 15:44:52', 96, NULL, NULL, b'0'),
(5, 'MBA', 'Its mba category', '2021-03-09 15:44:57', 83, NULL, NULL, b'0'),
(6, 'BE', 'Its be category', '2021-02-09 15:45:01', 96, NULL, NULL, b'0'),
(10, 'BCA', 'Its bca category', '2021-04-03 01:02:37', 83, '0000-00-00 00:00:00', 0, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `notetypes`
--

CREATE TABLE `notetypes` (
  `ID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Description` varchar(200) NOT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notetypes`
--

INSERT INTO `notetypes` (`ID`, `Name`, `Description`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`) VALUES
(1, 'hand written', 'Its handwritenBook', '2021-03-02 17:42:52', 83, NULL, NULL, b'0'),
(2, 'Story Book', 'Its stroy Book', '2021-02-10 17:42:57', 96, NULL, NULL, b'0'),
(3, 'University Book', 'Its a university book', '2021-01-15 17:43:01', 83, NULL, NULL, b'0'),
(4, 'Refrence Book', 'Its a refrence book', '2021-02-09 17:43:07', 96, NULL, NULL, b'0'),
(5, 'Novel', 'Its a Nove Book', '2021-04-01 17:43:12', 83, NULL, NULL, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `referencedata`
--

CREATE TABLE `referencedata` (
  `ID` int(11) NOT NULL,
  `Value` varchar(100) NOT NULL,
  `Datavalue` varchar(100) NOT NULL,
  `RefCategory` varchar(100) NOT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `referencedata`
--

INSERT INTO `referencedata` (`ID`, `Value`, `Datavalue`, `RefCategory`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`) VALUES
(1, 'Draft', 'draft', 'Note Status', '2021-02-03 22:24:19', NULL, NULL, NULL, b'0'),
(2, 'Submitted For Review', 'Submitted For Review', 'Notes Status', NULL, NULL, NULL, NULL, b'0'),
(3, 'In review', 'In review', 'Notes status', NULL, NULL, NULL, NULL, b'0'),
(4, 'Published', 'Approved', 'Notes Status', NULL, NULL, NULL, NULL, b'0'),
(5, 'Rejected', 'Rejected', 'Notes Status', NULL, NULL, NULL, NULL, b'0'),
(6, 'Removed', 'Removed', 'Notes Status', NULL, NULL, NULL, NULL, b'0'),
(7, 'Male', 'M', 'Gender', NULL, NULL, NULL, NULL, b'0'),
(8, 'Female', 'Fe', 'Gender', NULL, NULL, NULL, NULL, b'0'),
(9, 'Unknown', 'U', 'Gender', NULL, NULL, NULL, NULL, b'0'),
(10, 'Paid', 'P', 'Selling Mode', NULL, NULL, NULL, NULL, b'0'),
(11, 'Free', 'F', 'Selling Mode', NULL, NULL, NULL, NULL, b'0');

-- --------------------------------------------------------

--
-- Table structure for table `sellernotes`
--

CREATE TABLE `sellernotes` (
  `ID` int(11) NOT NULL,
  `SellerID` int(11) NOT NULL,
  `Status` int(11) NOT NULL,
  `ActionedBy` int(11) DEFAULT NULL,
  `AdminRemarks` varchar(200) DEFAULT NULL,
  `PublishedDate` datetime DEFAULT NULL,
  `Title` varchar(100) NOT NULL,
  `Category` int(11) NOT NULL,
  `DisplayPicture` varchar(500) DEFAULT NULL,
  `NoteType` int(11) DEFAULT NULL,
  `NumberofPages` int(11) DEFAULT NULL,
  `Description` varchar(200) NOT NULL,
  `UniversityName` varchar(200) DEFAULT NULL,
  `Country` int(11) DEFAULT NULL,
  `Course` varchar(100) DEFAULT NULL,
  `CourseCode` varchar(100) DEFAULT NULL,
  `Professor` varchar(100) DEFAULT NULL,
  `IsPaid` bit(1) NOT NULL,
  `SellingPrice` decimal(10,0) DEFAULT NULL,
  `NotesPreview` varchar(200) DEFAULT NULL,
  `CraetedDate` datetime DEFAULT NULL,
  `CreatedBy` datetime DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sellernotes`
--

INSERT INTO `sellernotes` (`ID`, `SellerID`, `Status`, `ActionedBy`, `AdminRemarks`, `PublishedDate`, `Title`, `Category`, `DisplayPicture`, `NoteType`, `NumberofPages`, `Description`, `UniversityName`, `Country`, `Course`, `CourseCode`, `Professor`, `IsPaid`, `SellingPrice`, `NotesPreview`, `CraetedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`) VALUES
(115, 114, 4, 83, '', '2021-04-01 18:58:08', 'Engineering Graphics EG 1', 2, NULL, 2, 66, '\"\"\"\"\"\"\"Its a EG Book.\"\"\"\"\"\"\"', 'Nirma', 2, 'ff', '786', 'hh', b'0', '0', '170210116026_MCWC.pdf', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, b'1'),
(124, 115, 4, 96, '', '2021-04-02 18:58:21', 'Computer Operating System-FinalExam Book With Paper Solution', 4, '', 1, 77, '\"\"Its java book.\"\"', 'gtu', 1, 'semester 7', '254689', 'v.g.patel', b'0', '0', '170210116026_MCWC.pdf', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, b'1'),
(128, 114, 4, 115, NULL, '2021-02-28 18:58:29', 'MCWC', 2, 'images\\Search\\6.jpg', 2, 67, '\"\"Its mobile computing book.\"\"', 'SU', 2, 'Semetser 5', '213456', 'mr.Chavda', b'1', '76', '170210116026_MCWC.pdf', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, b'1'),
(140, 113, 4, 96, '', '2021-03-01 17:03:19', 'INS', 2, 'images\\Search\\5.jpg', 1, 78, '\"\"\"\"\"\"Its a Network Security Book.\"\"\"\"\"\"', 'SU', 5, 'semester4', '213456', 'V.G.Patel', b'0', '0', '170210116026_MCWC.pdf', NULL, NULL, NULL, NULL, b'1'),
(141, 117, 4, 117, NULL, '2021-03-01 21:17:02', 'Computer Network', 2, 'images\\Search\\3.jpg', 2, 56, 'Its a Network Book.', 'SU', 2, 'semester 4', '215678', 'v.g.patel', b'1', '34', '170210116026_MCWC.pdf', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, b'1'),
(142, 117, 6, 117, NULL, '2021-03-02 21:20:32', 'Environment', 2, 'images\\Search\\2.jpg', 1, 56, 'Its a Environment Book.', 'SU', 2, 'semester 1', '215678', 'Miss Komal', b'1', '345', '170210116026_MCWC.pdf', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, b'1'),
(143, 119, 1, 117, '', '2021-03-01 22:19:11', 'Maths 4', 2, 'images\\Search\\1.jpg', 3, 45, 'Its MAths4 Book.', 'GTU', 2, 'semetser 4', '214567', 'Miss Gunjanmam', b'1', '234', '170210116026_MCWC.pdf', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, b'1'),
(145, 119, 6, 117, 'ndnndnnd', '2021-03-01 22:21:58', 'C Plus Plus', 2, 'images\\Search\\4.jpg', 3, 56, 'Its Code Book.', 'GTU', 3, 'semetser 4', '215678', 'Mr.Rathore', b'0', '0', '170210116026_MCWC.pdf', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, b'1'),
(147, 119, 3, 119, '', '2021-03-01 17:40:48', 'The Principles of Computer Hardware -OxfordThe Principles of Computer Hardware -Oxford', 1, 'images\\search\\5.jpg', 2, 23, 'Its Acomputer hardware book.', 'GTU', 2, 'Semetser 5', '214567', 'Mr.Barot', b'1', '750', '170210116026_MCWC.pdf', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, b'1'),
(153, 114, 6, 114, 'helloooooo', '2021-03-08 17:41:08', 'java advanced', 2, 'images\\search\\5.jpg', 1, 34, 'Its a advanced java book.', 'GTU', 2, 'ff', '6755', 'mr.Chavda', b'0', '0', '170210116026_MCWC.pdf', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, b'1'),
(154, 114, 1, 114, '', '2021-03-22 17:41:12', 'java 2', 1, '../member/114/154/piccc.jpg', 1, 45, '\"\"\"Its a java 2.\"\"\"', 'GTU', 3, 'java ', '6755', 'Miss Gunjanmam', b'1', '67', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, b'1'),
(158, 114, 1, 114, '', '2021-03-06 17:41:17', 'java3', 2, '../member/114/158/piccc.jpg', 2, 45, '\"Its a java.\r\n\"', 'gtu', 1, 'semester 5', '5047c3', 'j.k.patel', b'1', '58', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, b'1'),
(163, 114, 6, 83, '', '2021-03-01 17:41:20', 'AJAX', 2, 'images\\search\\4.jpg', 2, 56, 'Its a AJAX bokk.', 'SU', 3, 'jbg', '5047c3', 'j.k.patel', b'0', '0', '170210116026_MCWC.pdf', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, b'1'),
(174, 114, 6, 114, '', '2021-02-01 01:24:47', 'cs', 2, 'images\\search\\1.jpg', 1, 56, '\"Its a communication sikll.\"', 'SU', 2, 'semetser 4', '213456', 'Mr.Barot', b'0', '0', '170210116026_MCWC.pdf', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, b'1'),
(184, 114, 5, 114, '', '2021-03-11 05:18:20', 'Social Science', 2, 'images\\search\\1.jpg', 2, 23, 'Its a social book.', 'gtu', 6, 'semester 8', '6755', 'Mr.Barot', b'0', '0', '170210116026_MCWC.pdf', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, b'1'),
(189, 114, 1, 114, '', '2021-03-12 08:26:09', 'em', 2, 'images\\search\\2.jpg', 1, 34, 'Ita a em', 'gtu', 3, 'jbg', 'ed878d', 'j.k.patel', b'0', '0', '170210116026_MCWC.pdf', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, b'1'),
(191, 115, 1, 114, '', '2021-03-24 08:17:59', 'graphics', 1, 'images\\search\\2.jpg', 2, 564, 'Its a graphics book.', 'GTU', 3, 'semester 5', '324567', 'j.k.patel', b'1', '67', '170210116026_MCWC.pdf', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, b'1'),
(209, 114, 6, 114, 'not good.', '2021-03-26 02:59:02', 'Gujrati', 2, 'images\\search\\2.jpg', 1, 45, 'GG', 'gtu', 3, 'jbg', '5047c3', 'j.k.patel', b'0', '0', '170210116026_MCWC.pdf', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, b'1'),
(228, 114, 4, 114, '', '2021-04-14 11:50:04', 'AIIII', 4, '../member/114/0/piccc.jpg', 2, 55, 'Noo', 'gtu', 6, 'dd', '324567', 'j.k.patel', b'0', '0', '../member/114/0/170210116026_MCWC.pdf', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, b'1'),
(242, 127, 4, 127, '', '2021-04-14 05:22:11', 'Gujrati', 1, '../member/127/0/DP_1618413731', 2, 55, 'noo', 'gtu', 1, 'jbg', 'ed878d', 'j.k.patel', b'0', '0', '../member/127/0/preview_1618413731', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, b'1'),
(243, 127, 1, 127, '', '2021-04-14 05:24:19', 'India', 2, '../member/127/243/DP_1618415409', 2, 55, '\"\"\"\"\"no\"\"\"\"\"', 'gtu', 3, 'jbg', 'ed878d', 'j.k.patel', b'0', '0', '../member/127/243/preview_1618415409', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, b'1'),
(259, 114, 4, 114, '', '2021-04-15 04:19:12', 'India2', 2, '../member/114/244/DP_1618453152', 2, 55, 'no', 'gtu', 1, 'jbg', '5047c3', 'j.k.patel', b'0', '0', '../member/114/244/preview_1618453152', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, b'1'),
(260, 114, 4, 114, '', '2021-04-15 05:06:55', 'Gujjjgj', 4, '../member/114/260/DP_1618456015', 2, 55, 'no', 'gtu', 2, 'jbg', 'ed878d', 'j.k.patel', b'1', '100', '../member/114/260/preview_1618456015', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `sellernotesattachements`
--

CREATE TABLE `sellernotesattachements` (
  `ID` int(11) NOT NULL,
  `NoteID` int(11) NOT NULL,
  `FileName` varchar(100) NOT NULL,
  `FilePath` varchar(200) NOT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sellernotesattachements`
--

INSERT INTO `sellernotesattachements` (`ID`, `NoteID`, `FileName`, `FilePath`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`) VALUES
(5, 115, 'Engineering Graphics EG 1', 'D:\\aj(sem6)(170210116061).pdf', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, b'0'),
(8, 124, 'System-Final\r\nExam Book With Paper Solution', 'C:\\xampp\\htdocs\\images\\pdf\\170210116026_MCWC.pdf', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, b'0'),
(10, 128, 'MCWC', 'C:\\xampp\\htdocs\\images\\pdf\\170210116026_MCWC.pdf', NULL, NULL, NULL, NULL, b'0'),
(12, 140, 'INS', 'C:\\xampp\\htdocs\\images\\pdf\\170210116026_MCWC.pdf', NULL, NULL, NULL, NULL, b'0'),
(13, 141, 'Computer Network', 'C:\\xampp\\htdocs\\images\\pdf\\170210116026_MCWC.pdf', NULL, NULL, NULL, NULL, b'0'),
(14, 142, 'Environment', 'C:\\xampp\\htdocs\\images\\pdf\\170210116026_MCWC.pdf', NULL, NULL, NULL, NULL, b'0'),
(15, 143, 'Maths 4', 'C:\\xampp\\htdocs\\images\\pdf\\170210116026_MCWC.pdf', NULL, NULL, NULL, NULL, b'0'),
(16, 145, 'C Plus Plus', 'C:\\xampp\\htdocs\\images\\pdf\\170210116026_MCWC.pdf', NULL, NULL, NULL, NULL, b'0'),
(17, 147, 'The Principles of Computer Hardware -OxfordThe Principles of Computer Hardware -Oxford', 'C:\\xampp\\htdocs\\images\\pdf\\170210116026_MCWC.pdf', '0000-00-00 00:00:00', NULL, NULL, NULL, b'0'),
(21, 153, 'java advanced', 'C:\\xampp\\htdocs\\images\\pdf\\170210116026_MCWC.pdf', NULL, NULL, NULL, NULL, b'0'),
(22, 154, 'java 2', '', NULL, NULL, NULL, NULL, b'0'),
(23, 158, 'java 3', 'PPR[2].pdf', NULL, NULL, NULL, NULL, b'0'),
(25, 163, 'AJAX', 'C:\\xampp\\htdocs\\images\\pdf\\170210116026_MCWC.pdf', NULL, NULL, NULL, NULL, b'0'),
(26, 174, 'cs', 'C:\\xampp\\htdocs\\images\\pdf\\170210116026_MCWC.pdf', NULL, NULL, NULL, NULL, b'0'),
(28, 184, 'Social Science', 'C:\\xampp\\htdocs\\images\\pdf\\170210116026_MCWC.pdf', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, b'0'),
(37, 128, 'em', 'C:\\xampp\\htdocs\\images\\pdf\\170210116026_MCWC.pdf', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, b'0'),
(194, 228, 'AIIII', '../member/114/0/Attachments/Final REPORT.pdf', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, b'1'),
(208, 242, 'Gujrati', '../member/127/0/Attachments/170210116026_MCWC.pdf', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, b'0'),
(209, 243, 'India', '../member/243//Attachments/Final REPORT.pdf', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, b'0'),
(223, 260, 'Gujjjgj', '../member/114/260/Attachments/Final REPORT.pdf', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `sellernotesreportedissues`
--

CREATE TABLE `sellernotesreportedissues` (
  `ID` int(11) NOT NULL,
  `NoteID` int(11) NOT NULL,
  `ReportedByID` int(11) NOT NULL,
  `AgainstDownloadID` int(11) NOT NULL,
  `Remarks` varchar(200) NOT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sellernotesreportedissues`
--

INSERT INTO `sellernotesreportedissues` (`ID`, `NoteID`, `ReportedByID`, `AgainstDownloadID`, `Remarks`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`) VALUES
(1, 115, 114, 617, 'very bad', '2021-03-26 04:29:50', 0, '0000-00-00 00:00:00', 0, b'0'),
(7, 141, 114, 666, 'not', '2021-04-08 06:58:26', 0, '0000-00-00 00:00:00', 0, b'0'),
(8, 142, 114, 669, 'bad', '2021-04-08 06:58:57', 0, '0000-00-00 00:00:00', 0, b'0');

-- --------------------------------------------------------

--
-- Table structure for table `sellernotesreviews`
--

CREATE TABLE `sellernotesreviews` (
  `ID` int(11) NOT NULL,
  `NoteID` int(11) NOT NULL,
  `ReviewdByID` int(11) NOT NULL,
  `AgainstDownloadsID` int(11) NOT NULL,
  `Ratings` decimal(10,0) NOT NULL,
  `Comments` varchar(200) NOT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sellernotesreviews`
--

INSERT INTO `sellernotesreviews` (`ID`, `NoteID`, `ReviewdByID`, `AgainstDownloadsID`, `Ratings`, `Comments`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`) VALUES
(14, 142, 114, 669, '3', 'moo', '2021-04-08 06:43:18', 0, '0000-00-00 00:00:00', 0, b'0'),
(17, 153, 114, 617, '2', 'nooooo', '2021-04-08 06:43:42', 0, '0000-00-00 00:00:00', 0, b'0');

-- --------------------------------------------------------

--
-- Table structure for table `systemconfiguration`
--

CREATE TABLE `systemconfiguration` (
  `ID` int(11) NOT NULL,
  `Key1` varchar(100) NOT NULL,
  `Value` varchar(200) NOT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `systemconfiguration`
--

INSERT INTO `systemconfiguration` (`ID`, `Key1`, `Value`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`) VALUES
(3, 'supportemail', 'dharmikkakadiya53@gmail.com', '2021-04-06 11:43:22', 0, '2021-04-06 16:29:43', 0, b'0'),
(4, 'phone', '123456789', '2021-04-06 11:43:22', 0, '2021-04-06 16:29:41', 0, b'0'),
(5, 'Notify email', 'dhara8186@gmail.com', '2021-04-06 11:43:22', 0, '2021-04-06 16:29:38', 0, b'0'),
(6, 'Facebook url', 'facebook11.com', '2021-04-06 11:43:22', 0, '2021-04-06 16:29:35', 0, b'0'),
(7, 'Twitter', 'tei11.com', '2021-04-06 11:43:22', 0, '2021-04-06 16:29:32', 0, b'0'),
(8, 'LinkedIn', 'link.com', '2021-04-06 11:43:22', 0, '2021-04-06 16:29:29', 0, b'0'),
(9, 'NoteImg', 'default.jpg', '2021-04-06 11:43:22', 0, '2021-04-06 16:29:25', 0, b'0'),
(10, 'profileimg', '1.jpg', '2021-04-06 16:28:50', 0, '2021-04-06 16:29:21', NULL, b'0');

-- --------------------------------------------------------

--
-- Table structure for table `userprofile`
--

CREATE TABLE `userprofile` (
  `ID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `DOB` datetime DEFAULT NULL,
  `Gender` int(11) DEFAULT NULL,
  `SecondaryEmailAddress` varchar(100) NOT NULL,
  `CoutryCode` varchar(5) NOT NULL,
  `PhoneNumber` varchar(20) NOT NULL,
  `ProfilePicture` varchar(500) DEFAULT NULL,
  `AddressLine1` varchar(100) NOT NULL,
  `AddressLine2` varchar(100) NOT NULL,
  `City` varchar(50) NOT NULL,
  `State` varchar(50) NOT NULL,
  `ZipCode` varchar(50) NOT NULL,
  `Country` varchar(50) NOT NULL,
  `University` varchar(100) DEFAULT NULL,
  `College` varchar(100) DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userprofile`
--

INSERT INTO `userprofile` (`ID`, `UserID`, `DOB`, `Gender`, `SecondaryEmailAddress`, `CoutryCode`, `PhoneNumber`, `ProfilePicture`, `AddressLine1`, `AddressLine2`, `City`, `State`, `ZipCode`, `Country`, `University`, `College`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`) VALUES
(2, 114, '0000-00-00 00:00:00', 7, 'dhara8186@gmail.com', '+91', '4534234512', '../member/114/piccc.jpg', 'I shree khodiyar krupa,bileshvar agro ni', 'I shree khodiyar krupa,bileshvar agro ni', 'Gondal', 'Gujarat', '360311', 'India', 'GTU', 'GEC BHAVNAGAR', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(22, 113, '2021-03-03 20:19:55', 7, 'foramvadodariya1112@gmail.com', '+91', '4567893423', 'images\\team\\team-2.jpg', 'I shree khodiyar krupa,bileshvar agro ni', 'I shree khodiyar krupa,bileshvar agro ni', 'Gondal', 'Gujarat', '360311', 'India', 'GU', 'GEC BHAVN', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(23, 99, '2021-03-12 00:00:00', 7, 'a@gmail.com', '+90', '5634234567', 'images\\team\\team-2.jpg', 'I shree khodiyar krupa,bileshvar agro ni', 'I shree khodiyar krupa,bileshvar agro ni', 'Gondal', 'Gujarat', '360311', 'India', 'Sauraster', 'GEC Rajkot', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(24, 115, '0000-00-00 00:00:00', 7, 'kamleshbhaisorathiya11@gmail.com', '+91', '5634234567', 'images\\team\\team-2.jpg', 'I shree khodiyar krupa,bileshvar agro ni', 'I shree khodiyar krupa,bileshvar agro ni', 'Gondal', 'Gujarat', '360311', 'India', 'GU Gondal', 'GEC BHA', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(25, 117, '2021-03-11 00:00:00', 7, 'fd@gmail.com', '+91', '4534234512', 'images\\team\\team-3.jpg', 'I shree khodiyar krupa,bileshvar agro ni', 'I shree khodiyar krupa,bileshvar agro ni', 'Gondal', 'Gujarat', '360311', 'India', 'GTU', 'GEC', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(26, 118, '0000-00-00 00:00:00', 7, 'xx@gmail.com', '+91', '5645643234', 'images\\team\\team-6.jpg', 'I shree khodiyar krupa,bileshvar agro ni', 'Flat-B/202,Siddhi vinayakResidency,Near', 'Gondal', 'Gujarat', '360311', 'India', 'FU', 'GEC Gandhinage', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(30, 102, '2021-04-06 00:00:00', 7, 'foramvadodariya1111@gmail.com', '+91', '1233456788', 'images\\team\\team-3.jpg', 'I shree khodiyar krupa,bileshvar agro ni', 'Flat-B/202,Siddhi vinayakResidency,Near', 'Gondal', 'Gujarat', '360311', 'India', 'GU Gondal', 'GEC', '2021-04-06 05:48:37', 0, '0000-00-00 00:00:00', 0),
(46, 83, '0000-00-00 00:00:00', 7, 'dd11@gmail.com', '+91', '56f4567453', 'images\\team\\team-1.jpg', '', '', '', '', '', '', '', '', '2021-04-07 12:40:55', 0, '0000-00-00 00:00:00', 0),
(49, 119, '2021-04-08 00:00:00', 8, 'ff@gmail.com', '+91', '5634234567', 'images\\team\\team-3.jpg', 'I shree khodiyar krupa,bileshvar agro ni', 'I shree khodiyar krupa,bileshvar agro ni', 'Gondal', 'Gujarat', '360311', 'India', 'GU Gondal', 'GEC', '2021-04-08 05:53:36', 0, '0000-00-00 00:00:00', 0),
(50, 124, '0000-00-00 00:00:00', 7, 'dd11@gmail.com', '+91', '5634234567', 'images\\team\\team-5.jpg', '', '', '', '', '', '', '', '', '2021-04-08 12:35:11', 0, '0000-00-00 00:00:00', 0),
(59, 96, '0000-00-00 00:00:00', 7, 'dd112@gmail.com', '+91', '4534234512', '../member/96/DP_1618416788', '', '', '', '', '', '', '', '', '2021-04-14 09:05:49', 0, '0000-00-00 00:00:00', 0),
(63, 127, '0000-00-00 00:00:00', 8, 'ff12@gmail.com', '+91', '4534234512', '../member/127/DP_1618408797', 'I shree khodiyar krupa,bileshvar agro ni', 'I shree khodiyar krupa,bileshvar agro ni', 'Gondal', 'Gujarat', '360311', 'India', 'GTU', 'GEC', '2021-04-14 03:46:20', 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `userroles`
--

CREATE TABLE `userroles` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Description` varchar(200) DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userroles`
--

INSERT INTO `userroles` (`ID`, `Name`, `Description`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`) VALUES
(1, 'user', 'i am user', NULL, NULL, NULL, NULL, b'0'),
(2, 'admin', 'i am admin', NULL, NULL, NULL, NULL, b'0'),
(3, 'super adimn', 'Its a super admin', '2021-04-03 10:49:02', NULL, NULL, NULL, b'0');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `RoleID` int(11) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `EmailID` varchar(100) NOT NULL,
  `Password` varchar(24) NOT NULL,
  `IsEmailVerified` bit(1) NOT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `RoleID`, `FirstName`, `LastName`, `EmailID`, `Password`, `IsEmailVerified`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`) VALUES
(3, 1, 'dhara', 'sorthiya', 'dharasorath111@gmail.com', '123', b'1', '2021-02-22 14:38:22', 43, '2021-02-22 14:38:22', 55, b'0'),
(83, 2, 'Dharmik11', 'kakadiya', 'dd@gmail.com', 'Dhara@12', b'1', '2021-03-01 13:23:16', 0, '0000-00-00 00:00:00', 0, b'0'),
(96, 3, 'Dharmik', 'kakadiya', 'dharmikkakadiya53@gmail.com', 'DwrY0A1k', b'1', '2021-03-02 13:23:20', 0, '0000-00-00 00:00:00', 0, b'0'),
(99, 1, 'Mitali', 'dharmik', 'a@gmail.com', 'Dh@125', b'1', '2021-03-05 13:23:27', 0, '0000-00-00 00:00:00', 0, b'0'),
(102, 1, 'Foram', 'foram', 'foramvadodariya1111@gmail.com', 'ftyGYhLu', b'1', '2021-03-06 13:23:31', 0, '0000-00-00 00:00:00', 0, b'0'),
(113, 1, 'Priti', 'sor', 'dharmikkakadiya531@gmail.com', 'CPizLNhj', b'1', '2021-03-07 13:23:34', 0, '0000-00-00 00:00:00', 0, b'0'),
(114, 1, 'Dhara', 'Sorthiya', 'dhara8186@gmail.com', 'Dhara@123', b'1', '2021-04-07 13:23:38', 0, '0000-00-00 00:00:00', 0, b'0'),
(115, 1, 'jalak', ' Sorthiya', 'kamleshbhaisorathiya11@gmail.com', 'Dhara@1', b'1', '2021-03-25 13:24:26', 0, '0000-00-00 00:00:00', 0, b'0'),
(117, 1, 'Kashish', 'kiran', 'fd@gmail.com', 'Dhara@1', b'1', '2021-03-25 13:23:53', 0, '0000-00-00 00:00:00', 0, b'1'),
(118, 1, 'Dhara', 'dharmik', 'xx@gmail.com', 'Dh@125', b'1', '2021-03-29 13:24:07', 0, '0000-00-00 00:00:00', 0, b'0'),
(119, 1, 'Khyati', 'rat', 'ff@gmail.com', 'Dhara@1', b'1', '2021-04-01 13:24:04', 0, '0000-00-00 00:00:00', 0, b'0'),
(120, 2, 'sweta', 'rathod', 'sweta@gmail.com', 'Dhara@123', b'1', '2021-04-05 08:23:42', 96, '0000-00-00 00:00:00', 0, b'0'),
(124, 2, 'mitali', 'patel', 'mitali@gmail.com', 'Dhara@123', b'1', '2021-04-05 09:29:01', 96, '0000-00-00 00:00:00', 0, b'0'),
(127, 1, 'john', 'dd', 'ff12@gmail.com', 'Dhara@123', b'1', '2021-04-14 10:38:09', 0, '0000-00-00 00:00:00', 0, b'0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `CreatedBy` (`CreatedBy`);

--
-- Indexes for table `downloads`
--
ALTER TABLE `downloads`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `downloads_ibfk_1` (`NoteID`),
  ADD KEY `downloads_ibfk_2` (`Seller`),
  ADD KEY `downloads_ibfk_3` (`Downloader`);

--
-- Indexes for table `notecategories`
--
ALTER TABLE `notecategories`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `CreatedBy` (`CreatedBy`);

--
-- Indexes for table `notetypes`
--
ALTER TABLE `notetypes`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `CreatedBy` (`CreatedBy`);

--
-- Indexes for table `referencedata`
--
ALTER TABLE `referencedata`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `sellernotes`
--
ALTER TABLE `sellernotes`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Status` (`Status`),
  ADD KEY `ActionedBy` (`ActionedBy`),
  ADD KEY `Category` (`Category`),
  ADD KEY `NoteType` (`NoteType`),
  ADD KEY `Country` (`Country`),
  ADD KEY `sellernotes_ibfk_1` (`SellerID`);

--
-- Indexes for table `sellernotesattachements`
--
ALTER TABLE `sellernotesattachements`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `NoteID` (`NoteID`);

--
-- Indexes for table `sellernotesreportedissues`
--
ALTER TABLE `sellernotesreportedissues`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `NoteID` (`NoteID`),
  ADD KEY `ReportedByID` (`ReportedByID`),
  ADD KEY `AgainstDownloadID` (`AgainstDownloadID`);

--
-- Indexes for table `sellernotesreviews`
--
ALTER TABLE `sellernotesreviews`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `NoteID` (`NoteID`),
  ADD KEY `ReviewdByID` (`ReviewdByID`),
  ADD KEY `AgainstDownloadsID` (`AgainstDownloadsID`);

--
-- Indexes for table `systemconfiguration`
--
ALTER TABLE `systemconfiguration`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `userprofile`
--
ALTER TABLE `userprofile`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `userprofile_ibfk_2` (`Gender`),
  ADD KEY `userprofile_ibfk_1` (`UserID`);

--
-- Indexes for table `userroles`
--
ALTER TABLE `userroles`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `RoleID` (`RoleID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `downloads`
--
ALTER TABLE `downloads`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=681;

--
-- AUTO_INCREMENT for table `notecategories`
--
ALTER TABLE `notecategories`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `notetypes`
--
ALTER TABLE `notetypes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `referencedata`
--
ALTER TABLE `referencedata`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sellernotes`
--
ALTER TABLE `sellernotes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=261;

--
-- AUTO_INCREMENT for table `sellernotesattachements`
--
ALTER TABLE `sellernotesattachements`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=224;

--
-- AUTO_INCREMENT for table `sellernotesreportedissues`
--
ALTER TABLE `sellernotesreportedissues`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sellernotesreviews`
--
ALTER TABLE `sellernotesreviews`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `systemconfiguration`
--
ALTER TABLE `systemconfiguration`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `userprofile`
--
ALTER TABLE `userprofile`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `userroles`
--
ALTER TABLE `userroles`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `countries`
--
ALTER TABLE `countries`
  ADD CONSTRAINT `countries_ibfk_1` FOREIGN KEY (`CreatedBy`) REFERENCES `users` (`ID`);

--
-- Constraints for table `downloads`
--
ALTER TABLE `downloads`
  ADD CONSTRAINT `downloads_ibfk_1` FOREIGN KEY (`NoteID`) REFERENCES `sellernotes` (`ID`),
  ADD CONSTRAINT `downloads_ibfk_2` FOREIGN KEY (`Seller`) REFERENCES `users` (`ID`),
  ADD CONSTRAINT `downloads_ibfk_3` FOREIGN KEY (`Downloader`) REFERENCES `users` (`ID`);

--
-- Constraints for table `notecategories`
--
ALTER TABLE `notecategories`
  ADD CONSTRAINT `notecategories_ibfk_1` FOREIGN KEY (`CreatedBy`) REFERENCES `users` (`ID`);

--
-- Constraints for table `notetypes`
--
ALTER TABLE `notetypes`
  ADD CONSTRAINT `notetypes_ibfk_1` FOREIGN KEY (`CreatedBy`) REFERENCES `users` (`ID`);

--
-- Constraints for table `sellernotes`
--
ALTER TABLE `sellernotes`
  ADD CONSTRAINT `sellernotes_ibfk_1` FOREIGN KEY (`SellerID`) REFERENCES `users` (`ID`),
  ADD CONSTRAINT `sellernotes_ibfk_2` FOREIGN KEY (`Status`) REFERENCES `referencedata` (`ID`),
  ADD CONSTRAINT `sellernotes_ibfk_3` FOREIGN KEY (`ActionedBy`) REFERENCES `users` (`ID`),
  ADD CONSTRAINT `sellernotes_ibfk_4` FOREIGN KEY (`Category`) REFERENCES `notecategories` (`ID`),
  ADD CONSTRAINT `sellernotes_ibfk_5` FOREIGN KEY (`NoteType`) REFERENCES `notetypes` (`ID`),
  ADD CONSTRAINT `sellernotes_ibfk_6` FOREIGN KEY (`Country`) REFERENCES `countries` (`ID`);

--
-- Constraints for table `sellernotesattachements`
--
ALTER TABLE `sellernotesattachements`
  ADD CONSTRAINT `sellernotesattachements_ibfk_1` FOREIGN KEY (`NoteID`) REFERENCES `sellernotes` (`ID`);

--
-- Constraints for table `sellernotesreportedissues`
--
ALTER TABLE `sellernotesreportedissues`
  ADD CONSTRAINT `sellernotesreportedissues_ibfk_1` FOREIGN KEY (`NoteID`) REFERENCES `sellernotes` (`ID`),
  ADD CONSTRAINT `sellernotesreportedissues_ibfk_2` FOREIGN KEY (`ReportedByID`) REFERENCES `users` (`ID`),
  ADD CONSTRAINT `sellernotesreportedissues_ibfk_3` FOREIGN KEY (`AgainstDownloadID`) REFERENCES `downloads` (`ID`);

--
-- Constraints for table `sellernotesreviews`
--
ALTER TABLE `sellernotesreviews`
  ADD CONSTRAINT `sellernotesreviews_ibfk_1` FOREIGN KEY (`NoteID`) REFERENCES `sellernotes` (`ID`),
  ADD CONSTRAINT `sellernotesreviews_ibfk_2` FOREIGN KEY (`ReviewdByID`) REFERENCES `users` (`ID`),
  ADD CONSTRAINT `sellernotesreviews_ibfk_3` FOREIGN KEY (`AgainstDownloadsID`) REFERENCES `downloads` (`ID`);

--
-- Constraints for table `userprofile`
--
ALTER TABLE `userprofile`
  ADD CONSTRAINT `userprofile_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`ID`),
  ADD CONSTRAINT `userprofile_ibfk_2` FOREIGN KEY (`Gender`) REFERENCES `referencedata` (`ID`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`RoleID`) REFERENCES `userroles` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

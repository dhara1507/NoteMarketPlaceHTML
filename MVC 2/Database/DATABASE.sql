-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2021 at 03:29 PM
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
(1, 'india', '91', NULL, NULL, NULL, NULL, b'0'),
(2, 'USA', '92', NULL, NULL, NULL, NULL, b'0'),
(3, 'UK', '93', NULL, NULL, NULL, NULL, b'0'),
(4, 'Africa', '94', NULL, NULL, NULL, NULL, b'0'),
(5, 'China', '95', NULL, NULL, NULL, NULL, b'0'),
(6, 'Pakistan', '76', NULL, NULL, NULL, NULL, b'0');

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
(619, 154, 114, 115, b'1', 'C:\\xampp\\htdocs\\images\\pdf\\170210116026_MCWC.pdf', b'0', '2021-03-23 03:12:34', b'1', '67', 'java 2', 'IT', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(662, 209, 114, 115, b'1', 'C:\\xampp\\htdocs\\images\\pdf\\170210116026_MCWC.pdf', b'1', '2021-03-26 16:43:13', b'0', '0', 'Gujrati', 'CA', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(666, 141, 117, 114, b'1', 'C:\\xampp\\htdocs\\images\\pdf\\170210116026_MCWC.pdf', b'0', '2021-03-26 16:54:25', b'1', '34', 'Computer Network', 'CA', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0);

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
(1, 'IT', 'Its it', NULL, NULL, NULL, NULL, b'0'),
(2, 'CA', 'Its CA', NULL, NULL, NULL, NULL, b'0'),
(3, 'MBA', 'Its mba category', NULL, NULL, NULL, NULL, b'0'),
(4, 'MCA', 'Its mca category', NULL, NULL, NULL, NULL, b'0'),
(5, 'Commerce', 'Its a commerce category.', NULL, NULL, NULL, NULL, b'0'),
(6, 'science', 'Its science book.', NULL, NULL, NULL, NULL, b'0');

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
(1, 'hand written', 'Its handwritenBook', NULL, NULL, NULL, NULL, b'0'),
(2, 'Story Book', 'Its stroy Book', NULL, NULL, NULL, NULL, b'0'),
(3, 'University Book', 'Its a university book', NULL, NULL, NULL, NULL, b'0'),
(4, 'Refrence Book', 'Its a refrence book', NULL, NULL, NULL, NULL, b'0'),
(5, 'Novel', 'Its a Nove Book', NULL, NULL, NULL, NULL, b'0');

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
(115, 114, 4, 114, '', '2021-02-28 18:58:08', 'Engineering Graphics EG 1', 2, NULL, 2, 66, '\"\"\"\"\"\"\"Its a EG Book.\"\"\"\"\"\"\"', 'Nirma', 2, 'ff', '786', 'hh', b'0', '0', '170210116026_MCWC.pdf', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, b'1'),
(124, 114, 5, 114, 'Not valid', '2021-02-28 18:58:21', 'Computer Operating System-FinalExam Book With Paper Solution', 4, '', 1, 77, '\"\"Its java book.\"\"', 'gtu', 1, 'semester 7', '254689', 'v.g.patel', b'0', '0', '170210116026_MCWC.pdf', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, b'1'),
(125, 115, 4, 115, '', '2021-02-28 18:58:25', 'EMI', 5, 'images\\Search\\1.jpg', 1, 77, 'its java handwritten book.', 'gtu', 1, 'semester 7', '213456', 'v.g.patel', b'1', '678', '170210116026_MCWC.pdf\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, b'1'),
(128, 114, 4, 115, '', '2021-02-28 18:58:29', 'MCWC', 2, 'images\\Search\\6.jpg', 2, 67, '\"\"Its mobile computing book.\"\"', 'SU', 2, 'Semetser 5', '213456', 'mr.Chavda', b'1', '76', '170210116026_MCWC.pdf', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, b'1'),
(129, 114, 5, 115, 'NOT VALID BOOK', '2021-03-26 16:32:15', 'AI', 1, '', 1, 678, '\"\"\"Its a AI Book.\"\"\"', 'GTU', 1, 'Semester 8', '213456', 'Mr. Chavda', b'0', '0', '170210116026_MCWC.pdf', '2021-03-01 22:15:21', '2021-03-01 22:15:27', '2021-03-01 22:15:31', 1, b'1'),
(140, 113, 2, 113, NULL, '2021-03-01 17:03:19', 'INS', 2, 'images\\Search\\5.jpg', 1, 78, '\"\"\"\"\"\"Its a Network Security Book.\"\"\"\"\"\"', 'SU', 5, 'semester4', '213456', 'V.G.Patel', b'0', '0', '170210116026_MCWC.pdf', NULL, NULL, NULL, NULL, b'1'),
(141, 117, 4, 117, '', '2021-03-01 21:17:02', 'Computer Network', 2, 'images\\Search\\3.jpg', 2, 56, 'Its a Network Book.', 'SU', 2, 'semester 4', '215678', 'v.g.patel', b'1', '34', '170210116026_MCWC.pdf', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, b'1'),
(142, 117, 4, 117, '', '2021-03-01 21:20:32', 'Environment', 2, 'images\\Search\\2.jpg', 1, 56, 'Its a Environment Book.', 'SU', 2, 'semester 1', '215678', 'Miss Komal', b'1', '345', '170210116026_MCWC.pdf', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, b'1'),
(143, 119, 1, 117, '', '2021-03-01 22:19:11', 'Maths 4', 2, 'images\\Search\\1.jpg', 3, 45, 'Its MAths4 Book.', 'GTU', 2, 'semetser 4', '214567', 'Miss Gunjanmam', b'1', '234', '170210116026_MCWC.pdf', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, b'1'),
(145, 119, 2, 117, '', '2021-03-01 22:21:58', 'C Plus Plus', 2, 'images\\Search\\4.jpg', 3, 56, 'Its Code Book.', 'GTU', 3, 'semetser 4', '215678', 'Mr.Rathore', b'0', '0', '170210116026_MCWC.pdf', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, b'1'),
(147, 119, 4, 119, '', '2021-03-01 17:40:48', 'The Principles of Computer Hardware -OxfordThe Principles of Computer Hardware -Oxford', 1, 'images\\search\\5.jpg', 2, 23, 'Its Acomputer hardware book.', 'GTU', 2, 'Semetser 5', '214567', 'Mr.Barot', b'1', '750', '170210116026_MCWC.pdf', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, b'1'),
(150, 115, 1, 115, '', '2021-03-16 17:40:52', 'EMI', 2, 'images\\search\\2.jpg', 2, 23, 'Its a machine learning book.', 'GTU', 1, 'Semetser 2', '214564', 'mr.Chavda', b'1', '234', '170210116026_MCWC.pdf', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, b'1'),
(152, 114, 1, 114, '', '2021-03-09 17:40:59', 'EMI', 3, 'images\\search\\1.jpg', 2, 23, 'Its a book.', 'GTU', 2, 'semetser 4', '6755', 'Mr.Barot', b'1', '21', '170210116026_MCWC.pdf', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, b'1'),
(153, 114, 4, 114, '', '2021-03-08 17:41:08', 'java advanced', 2, 'images\\search\\5.jpg', 1, 34, 'Its a advanced java book.', 'GTU', 2, 'ff', '6755', 'mr.Chavda', b'0', '0', '170210116026_MCWC.pdf', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, b'1'),
(154, 114, 1, 114, '', '2021-03-22 17:41:12', 'java 2', 1, 'images\\search\\6.jpg', 1, 45, '\"Its a java 2.\"', 'GTU', 3, 'java ', '6755', 'Miss Gunjanmam', b'1', '67', '170210116026_MCWC.pdf', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, b'1'),
(158, 114, 1, 114, '', '2021-03-06 17:41:17', 'java3', 2, 'images\\search\\1.jpg', 2, 45, 'Its a java.\r\n', 'gtu', 1, 'semester 5', '5047c3', 'j.k.patel', b'1', '58', '170210116026_MCWC.pdf', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, b'1'),
(163, 114, 2, 114, '', '2021-03-01 17:41:20', 'AJAX', 2, 'images\\search\\4.jpg', 2, 56, 'Its a AJAX bokk.', 'SU', 3, 'jbg', '5047c3', 'j.k.patel', b'0', '0', '170210116026_MCWC.pdf', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, b'1'),
(174, 114, 2, 114, '', '2021-03-10 01:24:47', 'cs', 2, 'images\\search\\1.jpg', 1, 56, '\"Its a communication sikll.\"', 'SU', 2, 'semetser 4', '213456', 'Mr.Barot', b'0', '0', '170210116026_MCWC.pdf', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, b'1'),
(184, 114, 1, 114, '', '2021-03-11 05:18:20', 'Social Science', 2, 'images\\search\\1.jpg', 2, 23, 'Its a social book.', 'gtu', 6, 'semester 8', '6755', 'Mr.Barot', b'0', '0', '170210116026_MCWC.pdf', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, b'1'),
(189, 114, 1, 114, '', '2021-03-12 08:26:09', 'em', 2, 'images\\search\\2.jpg', 1, 34, 'Ita a em', 'gtu', 3, 'jbg', 'ed878d', 'j.k.patel', b'0', '0', '170210116026_MCWC.pdf', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, b'1'),
(191, 115, 1, 114, '', '2021-03-24 08:17:59', 'graphics', 1, 'images\\search\\2.jpg', 2, 564, 'Its a graphics book.', 'GTU', 3, 'semester 5', '324567', 'j.k.patel', b'1', '67', '170210116026_MCWC.pdf', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, b'1'),
(209, 114, 4, 114, '', '2021-03-26 02:59:02', 'Gujrati', 2, 'images\\search\\2.jpg', 1, 45, 'GG', 'gtu', 3, 'jbg', '5047c3', 'j.k.patel', b'0', '0', '170210116026_MCWC.pdf', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, b'1');

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
(8, 124, 'System-Final\r\nExam Book With Paper Solution', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, b'0'),
(10, 128, 'MCWC', 'C:\\xampp\\htdocs\\images\\pdf\\170210116026_MCWC.pdf', NULL, NULL, NULL, NULL, b'0'),
(11, 129, 'AI', '', NULL, NULL, NULL, NULL, b'0'),
(12, 140, 'INS', 'C:\\xampp\\htdocs\\images\\pdf\\170210116026_MCWC.pdf', NULL, NULL, NULL, NULL, b'0'),
(13, 141, 'Computer Network', 'C:\\xampp\\htdocs\\images\\pdf\\170210116026_MCWC.pdf', NULL, NULL, NULL, NULL, b'0'),
(14, 142, 'Environment', 'C:\\xampp\\htdocs\\images\\pdf\\170210116026_MCWC.pdf', NULL, NULL, NULL, NULL, b'0'),
(15, 143, 'Maths 4', 'C:\\xampp\\htdocs\\images\\pdf\\170210116026_MCWC.pdf', NULL, NULL, NULL, NULL, b'0'),
(16, 145, 'C Plus Plus', 'C:\\xampp\\htdocs\\images\\pdf\\170210116026_MCWC.pdf', NULL, NULL, NULL, NULL, b'0'),
(17, 147, 'The Principles of Computer Hardware -OxfordThe Principles of Computer Hardware -Oxford', 'C:\\xampp\\htdocs\\images\\pdf\\170210116026_MCWC.pdf', '0000-00-00 00:00:00', NULL, NULL, NULL, b'0'),
(18, 150, 'EMI', 'C:\\xampp\\htdocs\\images\\pdf\\170210116026_MCWC.pdf', NULL, NULL, NULL, NULL, b'0'),
(20, 152, 'EMI', 'C:\\xampp\\htdocs\\images\\pdf\\170210116026_MCWC.pdf', NULL, NULL, NULL, NULL, b'0'),
(21, 153, 'java advanced', 'C:\\xampp\\htdocs\\images\\pdf\\170210116026_MCWC.pdf', NULL, NULL, NULL, NULL, b'0'),
(22, 154, 'java 2', 'C:\\xampp\\htdocs\\images\\pdf\\170210116026_MCWC.pdf', NULL, NULL, NULL, NULL, b'0'),
(23, 158, 'java 3', 'C:\\xampp\\htdocs\\images\\pdf\\170210116026_MCWC.pdf', NULL, NULL, NULL, NULL, b'0'),
(25, 163, 'AJAX', 'C:\\xampp\\htdocs\\images\\pdf\\170210116026_MCWC.pdf', NULL, NULL, NULL, NULL, b'0'),
(26, 174, 'cs', 'C:\\xampp\\htdocs\\images\\pdf\\170210116026_MCWC.pdf', NULL, NULL, NULL, NULL, b'0'),
(28, 184, 'Social Science', 'C:\\xampp\\htdocs\\images\\pdf\\170210116026_MCWC.pdf', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, b'0'),
(37, 128, 'em', 'C:\\xampp\\htdocs\\images\\pdf\\170210116026_MCWC.pdf', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, b'0'),
(175, 209, 'india', 'C:\\xampp\\htdocs\\images\\pdf\\170210116026_MCWC.pdf', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, b'1');

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
(1, 153, 114, 617, 'very bad', '2021-03-26 04:29:50', 0, '0000-00-00 00:00:00', 0, b'0'),
(2, 115, 114, 579, 'bad book', '2021-03-26 04:30:48', 0, '0000-00-00 00:00:00', 0, b'0');

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
(2, 115, 114, 579, '2', 'Its a nice book', '2021-03-26 04:26:37', 0, '0000-00-00 00:00:00', 0, b'0'),
(3, 115, 114, 579, '4', 'nice', '2021-03-17 04:26:55', 0, '0000-00-00 00:00:00', 0, b'0'),
(4, 115, 114, 579, '4', 'very good.', '2021-03-26 04:27:07', 0, '0000-00-00 00:00:00', 0, b'0'),
(6, 142, 114, 615, '2', 'hiiiiiii', '2021-03-26 06:12:39', 0, '0000-00-00 00:00:00', 0, b'0');

-- --------------------------------------------------------

--
-- Table structure for table `systemconfiguration`
--

CREATE TABLE `systemconfiguration` (
  `ID` int(11) NOT NULL,
  `Key` varchar(100) NOT NULL,
  `Value` varchar(200) NOT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(2, 114, '0000-00-00 00:00:00', 7, 'dhara8186@gmail.com', '+91', '4534234512', '', 'I shree khodiyar krupa,bileshvar agro ni', 'I shree khodiyar krupa,bileshvar agro ni', 'Gondal', 'Gujarat', '360311', 'India', 'GTU', 'GEC BHAVNAGAR', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(22, 113, '2021-03-03 20:19:55', 7, 'foramvadodariya1112@gmail.com', '+91', '4567893423', 'images\\team\\team-2.jpg', 'I shree khodiyar krupa,bileshvar agro ni', 'I shree khodiyar krupa,bileshvar agro ni', 'Gondal', 'Gujarat', '360311', 'India', 'GU', 'GEC BHAVN', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(23, 99, '2021-03-12 00:00:00', 7, 'a@gmail.com', '+90', '5634234567', 'images\\team\\team-2.jpg', 'I shree khodiyar krupa,bileshvar agro ni', 'I shree khodiyar krupa,bileshvar agro ni', 'Gondal', 'Gujarat', '360311', 'India', 'Sauraster', 'GEC Rajkot', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(24, 115, '0000-00-00 00:00:00', 7, 'kamleshbhaisorathiya11@gmail.com', '+91', '5634234567', 'images\\team\\team-2.jpg', 'I shree khodiyar krupa,bileshvar agro ni', 'I shree khodiyar krupa,bileshvar agro ni', 'Gondal', 'Gujarat', '360311', 'India', 'GU Gondal', 'GEC BHA', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(25, 117, '2021-03-11 00:00:00', 7, 'fd@gmail.com', '+91', '4534234512', 'images\\team\\team-2.jpg', 'I shree khodiyar krupa,bileshvar agro ni', 'I shree khodiyar krupa,bileshvar agro ni', 'Gondal', 'Gujarat', '360311', 'India', 'GTU', 'GEC', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(26, 118, '0000-00-00 00:00:00', 7, 'xx@gmail.com', '+91', '5645643234', 'images\\team\\team-6.jpg', 'I shree khodiyar krupa,bileshvar agro ni', 'Flat-B/202,Siddhi vinayakResidency,Near', 'Gondal', 'Gujarat', '360311', 'India', 'FU', 'GEC Gandhinage', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0);

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
(1, 'dhara', 'i am user', NULL, NULL, NULL, NULL, b'0'),
(2, 'admin', 'i am admin', NULL, NULL, NULL, NULL, b'0');

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
(83, 2, 'Dharmik', 'sor', 'dd@gmail.com', 'Dhara@1', b'1', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, b'0'),
(96, 1, 'Kiran', 'sor', 'dharmikkakadiya53@gmail.com', 'Dhara@1', b'0', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, b'0'),
(98, 1, 'Sweta', 'dharmik', 'd@gmail.com', 'iYu2BlW6', b'0', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, b'0'),
(99, 1, 'Mitali', 'dharmik', 'a@gmail.com', 'Dh@125', b'1', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, b'0'),
(102, 1, 'Foram', 'foram', 'foramvadodariya1111@gmail.com', 'ftyGYhLu', b'0', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, b'0'),
(113, 1, 'Priti', 'sor', 'dharmikkakadiya53@gmail.com', 'Dhara@1', b'1', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, b'0'),
(114, 1, 'Dhara', 'sorthiya', 'dhara8186@gmail.com', 'Dhara@1', b'1', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, b'0'),
(115, 1, 'jalak', ' Sorthiya', 'kamleshbhaisorathiya11@gmail.com', 'Dhara@1', b'1', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, b'0'),
(116, 1, 'Brijal', 'sor', 'zz@gmail.com', 'Dhara@1', b'1', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, b'0'),
(117, 1, 'Kashish', 'kiran', 'fd@gmail.com', 'Dhara@1', b'1', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, b'0'),
(118, 1, 'Dhara', 'dharmik', 'xx@gmail.com', 'Dh@125', b'1', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, b'0'),
(119, 1, 'Khyati', 'dharmik', 'ff@gmail.com', 'Dhara@1', b'1', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, b'0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`ID`);

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
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `notetypes`
--
ALTER TABLE `notetypes`
  ADD PRIMARY KEY (`ID`);

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `downloads`
--
ALTER TABLE `downloads`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=668;

--
-- AUTO_INCREMENT for table `notecategories`
--
ALTER TABLE `notecategories`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `notetypes`
--
ALTER TABLE `notetypes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `referencedata`
--
ALTER TABLE `referencedata`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sellernotes`
--
ALTER TABLE `sellernotes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=211;

--
-- AUTO_INCREMENT for table `sellernotesattachements`
--
ALTER TABLE `sellernotesattachements`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;

--
-- AUTO_INCREMENT for table `sellernotesreportedissues`
--
ALTER TABLE `sellernotesreportedissues`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sellernotesreviews`
--
ALTER TABLE `sellernotesreviews`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `systemconfiguration`
--
ALTER TABLE `systemconfiguration`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `userprofile`
--
ALTER TABLE `userprofile`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `userroles`
--
ALTER TABLE `userroles`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `downloads`
--
ALTER TABLE `downloads`
  ADD CONSTRAINT `downloads_ibfk_1` FOREIGN KEY (`NoteID`) REFERENCES `sellernotes` (`ID`),
  ADD CONSTRAINT `downloads_ibfk_2` FOREIGN KEY (`Seller`) REFERENCES `users` (`ID`),
  ADD CONSTRAINT `downloads_ibfk_3` FOREIGN KEY (`Downloader`) REFERENCES `users` (`ID`);

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

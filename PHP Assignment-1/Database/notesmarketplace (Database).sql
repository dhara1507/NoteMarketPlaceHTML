-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2021 at 06:18 AM
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
(129, 115, 115, 119, b'1', '', b'1', '2021-03-01 16:48:22', b'1', '7888', 'Engineering Graphics EG', 'india', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(130, 115, 115, 119, b'1', '', b'1', '2021-03-09 16:48:26', b'1', '7888', 'Engineering Graphics EG', 'india', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(131, 115, 115, 119, b'1', '', b'1', '2021-03-17 16:48:30', b'1', '7888', 'Engineering Graphics EG', 'india', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(132, 115, 115, 119, b'1', '', b'1', '2021-03-18 16:48:34', b'1', '7888', 'Engineering Graphics EG', 'india', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(134, 115, 115, 119, b'1', '', b'1', '2021-01-27 16:48:39', b'1', '7888', 'Engineering Graphics EG', 'india', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(135, 115, 115, 119, b'1', '', b'1', '2021-03-26 16:48:46', b'1', '7888', 'Engineering Graphics EG', 'india', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(136, 115, 115, 119, b'1', '', b'1', '2021-03-24 16:48:50', b'1', '7888', 'Engineering Graphics EG', 'india', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(137, 115, 115, 119, b'1', '', b'1', '2021-03-25 16:48:53', b'1', '7888', 'Engineering Graphics EG', 'india', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(138, 115, 115, 119, b'1', '', b'1', '2021-03-15 16:48:57', b'1', '7888', 'Engineering Graphics EG', 'india', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(139, 128, 115, 119, b'1', '', b'1', '2021-03-03 16:49:07', b'1', '76', 'MCWC', 'USA', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(140, 128, 115, 119, b'1', '', b'1', '2021-02-18 16:49:15', b'1', '76', 'MCWC', 'USA', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(141, 128, 115, 119, b'1', '', b'1', '2021-02-17 16:49:25', b'1', '76', 'MCWC', 'USA', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(142, 128, 115, 119, b'1', '', b'1', '2021-03-03 16:49:32', b'1', '76', 'MCWC', 'USA', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(143, 115, 114, 119, b'1', '', b'1', '2021-03-01 16:49:36', b'1', '788', 'Engineering Graphics EG', 'india', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(144, 124, 114, 119, b'1', '', b'1', '2021-03-02 16:49:40', b'1', '675', 'Computer Operating System-Final\r\nExam Book With Paper Solution', 'india', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(158, 115, 114, 119, b'1', '', b'1', '2021-03-02 16:49:44', b'1', '78', 'Engineering Graphics EG', 'india', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(160, 129, 114, 119, b'1', '', b'1', '2021-03-02 16:49:50', b'0', '0', 'AI', 'india', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(164, 115, 114, 119, b'1', '', b'1', '2021-03-08 16:49:53', b'1', '100', 'Engineering Graphics EG', 'india', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(165, 151, 114, 119, b'1', '', b'1', '2021-03-10 16:49:57', b'0', '0', 'fff', 'USA', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0);

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
(115, 114, 1, 114, '', '2021-02-28 18:58:08', 'Engineering Graphics EG', 1, 'images\\Search\\4.jpg', 1, 66, 'Its a EG Book.', 'ggggg', 1, 'ff', '786', 'hh', b'1', '7888', 'images\\Search\\4.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, b'0'),
(124, 114, 4, 114, '', '2021-02-28 18:58:21', 'Computer Operating System-Final\r\nExam Book With Paper Solution', 4, 'images\\Search\\6.jpg', 1, 77, 'Its java book.', 'gtu', 1, 'semester 7', '254689', 'v.g.patel', b'1', '675', 'C:UsersLenovoPicturesddbmsScreenshot_20200630_150855.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, b'0'),
(125, 114, 4, 114, '', '2021-02-28 18:58:25', 'EMI1', 5, 'images\\Search\\1.jpg', 1, 77, 'its java handwritten book.', 'gtu', 1, 'semester 7', '213456', 'v.g.patel', b'1', '678', 'C:UsersLenovoPicturesddbmsScreenshot_20200630_150855.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, b'0'),
(128, 114, 2, 115, '', '2021-02-28 18:58:29', 'MCWC', 2, 'images\\Search\\6.jpg', 2, 67, '\"\"Its mobile computing book.\"\"', 'gtu', 2, 'Semetser 5', '213456', 'mr.Chavda', b'1', '76', 'C:UsersLenovoPicturesddbmsScreenshot_20200630_150855.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, b'0'),
(129, 114, 1, 115, NULL, '2021-02-03 16:32:15', 'AI', 1, 'images\\Search\\5.jpg', 1, 678, 'Its a AI Book.', 'GTU', 1, 'Semester 8', '213456', 'Mr. Chavda', b'0', '0', NULL, '2021-03-01 22:15:21', '2021-03-01 22:15:27', '2021-03-01 22:15:31', 1, b'0'),
(140, 113, 1, 113, NULL, '2021-03-01 17:03:19', 'INS', 2, 'images\\Search\\5.jpg', 1, 78, 'Its a Network Security Book.', 'GTY', 5, 'semester4', '213456', 'V.G.Patel', b'0', '0', NULL, NULL, NULL, NULL, NULL, b'0'),
(141, 117, 1, 117, '', '2021-03-01 21:17:02', 'Computer Network', 2, 'images\\Search\\3.jpg', 2, 56, 'Its a Network Book.', 'Gtu', 2, 'semester 4', '215678', 'v.g.patel', b'1', '34', 'C:UsersLenovoPicturesddbmsScreenshot_20200630_150855.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, b'0'),
(142, 117, 4, 117, '', '2021-03-01 21:20:32', 'Environment', 2, 'images\\Search\\2.jpg', 1, 56, 'Its a Environment Book.', 'Gtu', 2, 'semester 1', '215678', 'Miss Komal', b'1', '345', 'C:UsersLenovoPicturesddbmsScreenshot_20200630_150855.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, b'0'),
(143, 119, 1, 117, '', '2021-03-01 22:19:11', 'Maths 4', 2, 'images\\Search\\1.jpg', 3, 45, 'Its MAths4 Book.', 'GTU', 2, 'semetser 4', '214567', 'Miss Gunjanmam', b'1', '234', 'C:UsersLenovoPicturesddbmsScreenshot_20200630_150855.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, b'0'),
(145, 119, 2, 117, '', '2021-03-01 22:21:58', 'C Plus Plus', 2, 'images\\Search\\4.jpg', 3, 56, 'Its Code Book.', 'GTU', 3, 'semetser 4', '215678', 'Mr.Rathore', b'0', '0', 'C:UsersLenovoPicturesddbmsScreenshot_20200630_150855.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, b'0'),
(147, 119, 4, 119, '', '0000-00-00 00:00:00', 'The Principles of Computer Hardware -OxfordThe Principles of Computer Hardware -Oxford', 1, 'images\\search\\5.jpg', 2, 23, 'Its Acomputer hardware book.', 'GTU', 2, 'Semetser 5', '214567', 'Mr.Barot', b'1', '750', 'C:xampphtdocs\noteuserimagesSearch6.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, b'0'),
(150, 114, 1, 114, '', '0000-00-00 00:00:00', 'EMI', 2, 'images\\search\\2.jpg', 2, 23, 'Its a machine learning book.', 'GTU', 1, 'Semetser 2', '214564', 'mr.Chavda', b'1', '234', 'C:xampphtdocs\noteuserimagesSearch2.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, b'0'),
(151, 114, 1, 114, '', '0000-00-00 00:00:00', 'fff', 1, 'images\\search\\6.jpg', 2, 21, 'Ita a book.', 'ggggg', 2, 'Semetser 5', '214567', 'v.g.patel', b'0', '55', 'C:xampphtdocs\noteuserimagesSearch5.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, b'0'),
(152, 114, 1, 114, '', '0000-00-00 00:00:00', 'EMI', 3, 'images\\search\\1.jpg', 2, 23, 'Its a book.', 'GTU', 2, 'semetser 4', '6755', 'Mr.Barot', b'1', '21', 'C:xampphtdocsimagesSearch3.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, b'0');

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
  `User ID` int(11) NOT NULL,
  `DOB` datetime DEFAULT NULL,
  `Gender` int(11) DEFAULT NULL,
  `SecondaryEmailAddress` varchar(100) NOT NULL,
  `CoutryCode` varchar(5) NOT NULL,
  `Phone number` varchar(20) NOT NULL,
  `Profile Picture` varchar(500) DEFAULT NULL,
  `Address Line 1` varchar(100) NOT NULL,
  `Address Line 2` varchar(100) NOT NULL,
  `City` varchar(50) NOT NULL,
  `State` varchar(50) NOT NULL,
  `Zip Code` varchar(50) NOT NULL,
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

INSERT INTO `userprofile` (`ID`, `User ID`, `DOB`, `Gender`, `SecondaryEmailAddress`, `CoutryCode`, `Phone number`, `Profile Picture`, `Address Line 1`, `Address Line 2`, `City`, `State`, `Zip Code`, `Country`, `University`, `College`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`) VALUES
(1, 3, '2021-02-04 14:43:14', NULL, 'dharasorathiya111@gmail.com', '', '', NULL, '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL);

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
(99, 1, 'Mitali', 'dharmik', 'a@gmail.com', 'Dh@125', b'0', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, b'0'),
(102, 1, 'Foram', 'foram', 'foramvadodariya1111@gmail.com', 'ftyGYhLu', b'0', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, b'0'),
(113, 1, 'Priti', 'sor', 'foramvadodariya1112@gmail.com', 'Dhara@1', b'0', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, b'0'),
(114, 1, 'Veera', 'dhra', 'dhara8186@gmail.com', 'Dhara@1', b'1', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, b'0'),
(115, 1, 'Jalak', 'dharmik', 'kamleshbhaisorathiya@gmail.com', 'Dhara@1', b'1', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, b'0'),
(116, 1, 'Brijal', 'sor', 'zz@gmail.com', 'Dhara@1', b'0', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, b'0'),
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
  ADD KEY `NoteID` (`NoteID`),
  ADD KEY `Seller` (`Seller`),
  ADD KEY `Downloader` (`Downloader`);

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
  ADD KEY `User ID` (`User ID`),
  ADD KEY `Gender` (`Gender`);

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT for table `sellernotesattachements`
--
ALTER TABLE `sellernotesattachements`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sellernotesreportedissues`
--
ALTER TABLE `sellernotesreportedissues`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sellernotesreviews`
--
ALTER TABLE `sellernotesreviews`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `systemconfiguration`
--
ALTER TABLE `systemconfiguration`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `userprofile`
--
ALTER TABLE `userprofile`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  ADD CONSTRAINT `userprofile_ibfk_1` FOREIGN KEY (`User ID`) REFERENCES `users` (`ID`),
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

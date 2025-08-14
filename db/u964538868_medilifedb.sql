-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2024 at 07:01 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u964538868_medilifedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogincreditional`
--

CREATE TABLE `adminlogincreditional` (
  `loginID` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `loginName` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '',
  `loginPassword` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '',
  `loginTimeStamp` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adminlogincreditional`
--

INSERT INTO `adminlogincreditional` (`loginID`, `loginName`, `loginPassword`, `loginTimeStamp`) VALUES
('10001', 'admin@gmail.com', '1', '01-09-24 : 12:24:54pm');

-- --------------------------------------------------------

--
-- Table structure for table `hospital_details_master`
--

CREATE TABLE `hospital_details_master` (
  `Hospital_Id` int(11) NOT NULL,
  `Hospital_Name` text NOT NULL,
  `Address` text NOT NULL,
  `Pincode` int(11) NOT NULL,
  `ContactNo` varchar(45) DEFAULT NULL,
  `EmailId` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hospital_details_master`
--

INSERT INTO `hospital_details_master` (`Hospital_Id`, `Hospital_Name`, `Address`, `Pincode`, `ContactNo`, `EmailId`) VALUES
(1, 'New Horizons General Hospital', 'Suite 522 169 Wilbur Crescent, Rodriguezberg, AR 24248', 24248, '9730780902', 'jainsanyam@gmail.com'),
(2, 'Sanyam Hospital Test', 'Suite 522 169 Wilbur Crescent, Rodriguezberg, AR 24248', 24248, '9730780902', 'jainsanyam@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `logincreditional`
--

CREATE TABLE `logincreditional` (
  `Medical_Id` int(11) DEFAULT NULL,
  `loginID` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `loginName` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '',
  `loginPassword` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '',
  `User_Type` enum('ADMIN','STAFF') DEFAULT 'STAFF',
  `loginTimeStamp` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logincreditional`
--

INSERT INTO `logincreditional` (`Medical_Id`, `loginID`, `loginName`, `loginPassword`, `User_Type`, `loginTimeStamp`) VALUES
(1, '10001', 'Hos1@gmail.com', 'TestHos@033', 'ADMIN', '03-11-23 : 11:47:06am');

-- --------------------------------------------------------

--
-- Table structure for table `medical_illness_master`
--

CREATE TABLE `medical_illness_master` (
  `HealthIssueId` int(11) NOT NULL,
  `Name` text NOT NULL,
  `Remarks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medical_illness_master`
--

INSERT INTO `medical_illness_master` (`HealthIssueId`, `Name`, `Remarks`) VALUES
(1, 'Common Cold', 'Common Cold'),
(2, 'Jaundice', 'Jaundice');
(3, 'Pneumonia', 'Pneumonia');
-- --------------------------------------------------------

--
-- Table structure for table `seriesnumber`
--

CREATE TABLE `seriesnumber` (
  `seriesName` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '',
  `seriesValue` int(50) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seriesnumber`
--

INSERT INTO `seriesnumber` (`seriesName`, `seriesValue`) VALUES
('loginID', 10001),
('userID', 200010);

-- --------------------------------------------------------

--
-- Table structure for table `userloginmaster`
--

CREATE TABLE `userloginmaster` (
  `loginID` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `userName` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `userPassword` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `userTimeStamp` timestamp NULL DEFAULT current_timestamp(),
  `contactNumber` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emailId` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userloginmaster`
--

INSERT INTO `userloginmaster` (`loginID`, `userName`, `userPassword`, `userTimeStamp`, `contactNumber`, `emailId`) VALUES
('200002', 'Sanyam@123', 'Test@123', '2024-10-10 04:57:04', '09730780902', 'sanyam@gmail.com'),
('200005', 'Test112', 'Alex2122', '2026-10-22 18:30:00', '09730780902', 'Test11'),
('200006', 'Jinay2201', '123456', '2003-11-22 18:30:00', '8104969897', 'Jinay2201'),
('200007', 'Test@123', 'demo', '2003-11-22 18:30:00', '1234567890', 'Test@123'),
('200008', 'BabaYaga01', 'johnwick', '2031-08-23 18:30:00', '7219696893', 'BabaYaga01'),
('200009', 'Sayali120', '123', '2024-10-10 04:14:14', '9145786325', 'Sayali120');

-- --------------------------------------------------------

--
-- Table structure for table `usermedicalhistorymaster`
--

CREATE TABLE `usermedicalhistorymaster` (
  `UMH_Id` int(11) NOT NULL,
  `Date_Of_Entry` datetime DEFAULT NULL,
  `Login_Id` int(11) NOT NULL,
  `Hospital_Id` int(11) NOT NULL,
  `HealthIssueId` int(11) NOT NULL,
  `File_Name` text DEFAULT NULL,
  `Remarks` text DEFAULT NULL,
  `Amount` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usermedicalhistorymaster`
--

INSERT INTO `usermedicalhistorymaster` (`UMH_Id`, `Date_Of_Entry`, `Login_Id`, `Hospital_Id`, `HealthIssueId`, `File_Name`, `Remarks`, `Amount`) VALUES
(1, '2023-10-25 01:55:38', 200002, 1, 1, '../../dist/img/MedicalImages/testImage.jpg', 'This has common cold.', 1200),
(2, '2023-09-25 01:55:38', 200002, 2, 2, '../../dist/img/MedicalImages/testImage2.png', 'Sevier Medical issue', 100),
(9, '2023-11-03 04:35:03', 200006, 1, 1, '../../dist/img/MedicalImages/1698986103.jpg', 'comman cold', 20),
(10, '2023-11-03 06:18:19', 200007, 1, 1, '../../dist/img/MedicalImages/1698992299.jpg', 'fainted due dehydrate', 1200);

-- --------------------------------------------------------

--
-- Table structure for table `user_login_details`
--

CREATE TABLE `user_login_details` (
  `LID` int(11) NOT NULL,
  `Login_Id` int(11) NOT NULL,
  `User_First_Name` text NOT NULL,
  `User_Middle_Name` text NOT NULL,
  `User_Last_Name` text NOT NULL,
  `Addhar_No` text NOT NULL,
  `Mobile_No` varchar(10) DEFAULT NULL,
  `Address` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_login_details`
--

INSERT INTO `user_login_details` (`LID`, `Login_Id`, `User_First_Name`, `User_Middle_Name`, `User_Last_Name`, `Addhar_No`, `Mobile_No`, `Address`) VALUES
(1, 200002, 'Jain', 'Sanyam', 'Naresh', '1111111', '721969689', 'Apt. 935 2547 Kertzmann Route, Port Isaias, FL 85217-2810'),
(2, 200005, 'Jainam', '', 'Jain', '1111111111', '0973078090', '7th Floor, Flat No. 701, Orion Bldg\nAnjurphata, opp Antriksh Bldg\nKamatghar Road'),
(3, 200006, 'Jinay', '', 'Jain', '841042193279', '8104969897', 's,dpoicrz,seoriupm'),
(4, 200007, 'akash', '', 'jain', '2222222222', '1234567890', 'vadavli'),
(5, 200008, 'John', 'J', 'Wick', '299942598633', '7219696893', 'maharashtra');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogincreditional`
--
ALTER TABLE `adminlogincreditional`
  ADD PRIMARY KEY (`loginID`);

--
-- Indexes for table `hospital_details_master`
--
ALTER TABLE `hospital_details_master`
  ADD PRIMARY KEY (`Hospital_Id`);

--
-- Indexes for table `logincreditional`
--
ALTER TABLE `logincreditional`
  ADD PRIMARY KEY (`loginID`);

--
-- Indexes for table `medical_illness_master`
--
ALTER TABLE `medical_illness_master`
  ADD PRIMARY KEY (`HealthIssueId`);

--
-- Indexes for table `userloginmaster`
--
ALTER TABLE `userloginmaster`
  ADD PRIMARY KEY (`loginID`);

--
-- Indexes for table `usermedicalhistorymaster`
--
ALTER TABLE `usermedicalhistorymaster`
  ADD PRIMARY KEY (`UMH_Id`);

--
-- Indexes for table `user_login_details`
--
ALTER TABLE `user_login_details`
  ADD PRIMARY KEY (`LID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hospital_details_master`
--
ALTER TABLE `hospital_details_master`
  MODIFY `Hospital_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `medical_illness_master`
--
ALTER TABLE `medical_illness_master`
  MODIFY `HealthIssueId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `usermedicalhistorymaster`
--
ALTER TABLE `usermedicalhistorymaster`
  MODIFY `UMH_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_login_details`
--
ALTER TABLE `user_login_details`
  MODIFY `LID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

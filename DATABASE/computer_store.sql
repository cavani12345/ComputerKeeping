-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2019 at 04:41 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `computer_keep`
--

-- --------------------------------------------------------

--
-- Table structure for table `computer`
--

CREATE TABLE `computer` (
  `Serial_Number` varchar(50) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Description` varchar(200) DEFAULT NULL,
  `Owner_Reg_Number` varchar(20) NOT NULL,
  `mode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `computer`
--

INSERT INTO `computer` (`Serial_Number`, `Name`, `Description`, `Owner_Reg_Number`, `mode`) VALUES
('156AAC05378', 'Accer', '', '217044563', 2),
('156AAC05532', 'POSITIVO', 'Given', '217122752', 1),
('156AAC055654', 'Accer', '', '217122752', 2),
('395AAA3024', 'Samsung', '', '217045347', 1),
('396AAD00435', 'LENOVO', '', '216262585', 1);

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `District_Id` int(11) NOT NULL,
  `District_Name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`District_Id`, `District_Name`) VALUES
(1, 'Nyarugenge'),
(2, 'Nyanza'),
(3, 'Kicukiro'),
(4, 'Gisagara'),
(5, 'Huye'),
(6, 'Nyamagabe'),
(7, 'Nyaruguru'),
(8, 'Ruhango'),
(9, 'Muhanga'),
(10, 'Kamonyi'),
(11, 'Rubavu'),
(12, 'Rusizi'),
(13, 'Nyamasheke'),
(14, 'Nyagatare'),
(15, 'Ngoma'),
(16, 'Rulindo'),
(17, 'Nyabihu'),
(18, 'Karongi'),
(19, 'Gicumbi'),
(20, 'Gakenke'),
(21, 'Karongi'),
(22, 'Gicumbi'),
(23, 'Rutsiro'),
(24, 'Rutsiro');

-- --------------------------------------------------------

--
-- Table structure for table `give_out`
--

CREATE TABLE `give_out` (
  `id` int(11) NOT NULL,
  `give_date` datetime NOT NULL,
  `Give_Date_Only` date NOT NULL,
  `keeper_id` int(11) NOT NULL,
  `computer_id` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `give_out`
--

INSERT INTO `give_out` (`id`, `give_date`, `Give_Date_Only`, `keeper_id`, `computer_id`) VALUES
(1, '2019-01-08 15:09:50', '2019-01-08', 12, '156AAC05378'),
(2, '2019-01-09 20:57:57', '2019-01-09', 12, '156AAC055654'),
(3, '2019-01-15 21:38:00', '2019-01-15', 12, '156AAC05378'),
(4, '2019-01-15 21:39:06', '2019-01-15', 12, '395AAA3024'),
(5, '2019-01-15 21:47:35', '2019-01-15', 12, '156AAC05378');

-- --------------------------------------------------------

--
-- Table structure for table `keep`
--

CREATE TABLE `keep` (
  `id` int(11) NOT NULL,
  `keep_date` datetime NOT NULL,
  `Keep_Date_Only` date NOT NULL,
  `Serial_Number` varchar(30) NOT NULL,
  `keeper_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keep`
--

INSERT INTO `keep` (`id`, `keep_date`, `Keep_Date_Only`, `Serial_Number`, `keeper_id`) VALUES
(1, '2019-01-05 11:33:39', '2019-01-05', '156AAC05378', 10),
(2, '2019-01-05 11:33:50', '2019-01-05', '396AAD00435', 10),
(3, '2019-01-07 19:44:03', '0000-00-00', '156AAC055654', 12),
(4, '2019-01-07 19:46:34', '2019-01-07', '156AAC05532', 12),
(5, '2019-01-09 20:57:24', '2019-01-09', '156AAC05378', 12),
(6, '2019-01-15 21:39:15', '2019-01-15', '395AAA3024', 12),
(7, '2019-01-15 21:39:50', '2019-01-15', '156AAC05378', 12);

-- --------------------------------------------------------

--
-- Table structure for table `keeper`
--

CREATE TABLE `keeper` (
  `keeper_Id` int(11) NOT NULL,
  `First_Name` varchar(30) NOT NULL,
  `Last_Name` varchar(30) NOT NULL,
  `gender` varchar(7) NOT NULL,
  `password` varchar(200) NOT NULL,
  `Id_number` varchar(20) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `District_Id` int(11) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keeper`
--

INSERT INTO `keeper` (`keeper_Id`, `First_Name`, `Last_Name`, `gender`, `password`, `Id_number`, `phone`, `District_Id`, `type`) VALUES
(3, 'NISHIMIRWE', 'J Paul', 'Male', 'cGF1bA==', '1199480024523178', '0789336678', 1, 1),
(10, 'Felix', 'BUGINGO', 'Male', 'MDczOTYxNTY3OA==', '1199135646474733', '+250739615678', 4, 2),
(11, 'Olive', 'NYIRAMANA', 'Female', 'NDU2', '1199270043432098', '+250727347891', 2, 2),
(12, 'Maniraho', 'Eric', 'Male', 'ZXJpYw==', '1198900024777474', '+250725363723', 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `number`
--

CREATE TABLE `number` (
  `Number_Id` int(11) NOT NULL,
  `computers` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `number`
--

INSERT INTO `number` (`Number_Id`, `computers`) VALUES
(1, '156AAC05567'),
(2, '156AAC05532'),
(3, '395AAA3024'),
(4, '156AAC05687'),
(5, '156AAC05378'),
(6, '396AAD00435'),
(7, '146AAAA05687'),
(8, '213455556'),
(9, '156AAC055654');

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `Reg_Number` varchar(50) NOT NULL,
  `First_Name` varchar(30) NOT NULL,
  `Last_Name` varchar(30) NOT NULL,
  `gender` varchar(7) NOT NULL,
  `Department` varchar(50) NOT NULL,
  `Phone` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`Reg_Number`, `First_Name`, `Last_Name`, `gender`, `Department`, `Phone`) VALUES
('216262585', 'Emmanuel', 'RUKUNDO', 'Male', 'Computer Science', '+250789890030'),
('217029434', 'Rebecca', 'MUTUYUWERA', 'Female', 'Computer Science', '+250786661110'),
('217044563', 'Emmanuel', 'NSHIMIYIMANA', 'Male', 'Computer Engineering', '+250786547634'),
('217045347', 'Aline', 'NIYITANGA', 'Female', 'Infomation Technology', '+250783200776'),
('217122752', 'J Paul', 'NISHIMIRWE', 'Male', 'Computer Science', '+250734586959');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `status_Name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `status_Name`) VALUES
(1, 'Irimo'),
(2, 'Ntayirimo');

-- --------------------------------------------------------

--
-- Table structure for table `type_of_keeper`
--

CREATE TABLE `type_of_keeper` (
  `id` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type_of_keeper`
--

INSERT INTO `type_of_keeper` (`id`, `name`) VALUES
(1, 'Manager'),
(2, 'Usual Keeper');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `computer`
--
ALTER TABLE `computer`
  ADD PRIMARY KEY (`Serial_Number`),
  ADD KEY `computer_owner_fk` (`Owner_Reg_Number`),
  ADD KEY `computer_status` (`mode`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`District_Id`);

--
-- Indexes for table `give_out`
--
ALTER TABLE `give_out`
  ADD PRIMARY KEY (`id`),
  ADD KEY `give_keeper_fk` (`keeper_id`),
  ADD KEY `give_computer_fk` (`computer_id`);

--
-- Indexes for table `keep`
--
ALTER TABLE `keep`
  ADD PRIMARY KEY (`id`),
  ADD KEY `keep_computer_fk` (`Serial_Number`),
  ADD KEY `keep_keeper_fk` (`keeper_id`);

--
-- Indexes for table `keeper`
--
ALTER TABLE `keeper`
  ADD PRIMARY KEY (`keeper_Id`),
  ADD KEY `keeper_province_fk` (`District_Id`),
  ADD KEY `keeper_type_fk` (`type`);

--
-- Indexes for table `number`
--
ALTER TABLE `number`
  ADD PRIMARY KEY (`Number_Id`);

--
-- Indexes for table `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`Reg_Number`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_of_keeper`
--
ALTER TABLE `type_of_keeper`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `District_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `give_out`
--
ALTER TABLE `give_out`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `keep`
--
ALTER TABLE `keep`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `keeper`
--
ALTER TABLE `keeper`
  MODIFY `keeper_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `number`
--
ALTER TABLE `number`
  MODIFY `Number_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `type_of_keeper`
--
ALTER TABLE `type_of_keeper`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `computer`
--
ALTER TABLE `computer`
  ADD CONSTRAINT `computer_owner_fk` FOREIGN KEY (`Owner_Reg_Number`) REFERENCES `owner` (`Reg_Number`),
  ADD CONSTRAINT `computer_status` FOREIGN KEY (`mode`) REFERENCES `status` (`id`);

--
-- Constraints for table `give_out`
--
ALTER TABLE `give_out`
  ADD CONSTRAINT `give_computer_fk` FOREIGN KEY (`computer_id`) REFERENCES `computer` (`Serial_Number`),
  ADD CONSTRAINT `give_keeper_fk` FOREIGN KEY (`keeper_id`) REFERENCES `keeper` (`keeper_Id`);

--
-- Constraints for table `keep`
--
ALTER TABLE `keep`
  ADD CONSTRAINT `keep_computer_fk` FOREIGN KEY (`Serial_Number`) REFERENCES `computer` (`Serial_Number`),
  ADD CONSTRAINT `keep_keeper_fk` FOREIGN KEY (`keeper_id`) REFERENCES `keeper` (`keeper_Id`);

--
-- Constraints for table `keeper`
--
ALTER TABLE `keeper`
  ADD CONSTRAINT `keeper_province_fk` FOREIGN KEY (`District_Id`) REFERENCES `district` (`District_Id`),
  ADD CONSTRAINT `keeper_type_fk` FOREIGN KEY (`type`) REFERENCES `type_of_keeper` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

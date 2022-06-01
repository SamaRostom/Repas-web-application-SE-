-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2022 at 11:19 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `repas`
--

-- --------------------------------------------------------

--
-- Table structure for table `catering`
--

CREATE TABLE `catering` (
  `Catering_ID` int(255) NOT NULL,
  `NumberOfPeople` int(255) NOT NULL,
  `NumberOfChildern` int(255) NOT NULL,
  `Meals` text NOT NULL,
  `Extras` text NOT NULL,
  `Catering_Time` datetime NOT NULL,
  `Order_Time_Catering` datetime NOT NULL,
  `Food_Allergy` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `meals`
--

CREATE TABLE `meals` (
  `Meal_ID` int(255) NOT NULL,
  `Meal_Name` text NOT NULL,
  `Description` text NOT NULL,
  `Meal_Price` varchar(20) NOT NULL,
  `Amount` int(30) NOT NULL,
  `ID_Category` int(255) NOT NULL,
  `Meal_Image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `meals`
--

INSERT INTO `meals` (`Meal_ID`, `Meal_Name`, `Description`, `Meal_Price`, `Amount`, `ID_Category`, `Meal_Image`) VALUES
(1, 'Kofta', 'Kofta meat', '20', 0, 2, 'm.jpeg'),
(2, 'bashamel', 'pasta', '40', 0, 3, 'bashamel2.jpg'),
(3, 'miniburger', 'burger', '30', 0, 3, 'miniburger.jpg'),
(4, 'miniburger', 'burger', '30', 0, 3, 'miniburger.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `meals_category`
--

CREATE TABLE `meals_category` (
  `ID_Category` int(255) NOT NULL,
  `Category_Name` text NOT NULL,
  `Category_Image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `meals_category`
--

INSERT INTO `meals_category` (`ID_Category`, `Category_Name`, `Category_Image`) VALUES
(2, 'Cooked Menu', 'bashamel2.jpg'),
(3, 'Salad and Soup', 'BabaGanoush.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `Order_ID` int(255) NOT NULL,
  `ID_Person` int(255) NOT NULL,
  `Order_Time` datetime NOT NULL,
  `Total_Price` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `Order_ID` int(255) NOT NULL,
  `Meal_ID` int(255) NOT NULL,
  `Quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `PageID` int(255) NOT NULL,
  `PageName` varchar(100) NOT NULL,
  `Path` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`PageID`, `PageName`, `Path`) VALUES
(1, 'Shop', 'http://localhost/software/repas-web-application--se-/mvc/public/users/Categories'),
(2, 'About', 'http://localhost/software/repas-web-application--se-/mvc/public/pages/about'),
(3, 'Contact', 'http://localhost/software/repas-web-application--se-/mvc/public/pages/contact'),
(4, 'Login', 'http://localhost/software/repas-web-application--se-/mvc/public/users/login'),
(5, 'SignUp', 'http://localhost/software/repas-web-application--se-/mvc/public/users/register');

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `ID_Person` int(255) NOT NULL,
  `Username` text NOT NULL,
  `Password` text NOT NULL,
  `ID_Type` int(20) NOT NULL,
  `Address` text NOT NULL,
  `Phone_Number` varchar(15) NOT NULL,
  `Backup_Number` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`ID_Person`, `Username`, `Password`, `ID_Type`, `Address`, `Phone_Number`, `Backup_Number`) VALUES
(2, 'Sama Rostom', '12345', 1, '124 street 2', '07353679', '02347744'),
(3, 'Reema', '12345', 2, '6 october', '08766555', '9876655'),
(4, 'Reema', '12345', 0, '6 october', '037781991', '02762722'),
(5, 'Reema', '12345', 0, '6 october', '011672782', '07627711'),
(6, 'Reema', '12345', 0, '6 october', '07267272', '0267282'),
(7, 'Reema', '12345', 0, '6 october', '016172722', '0026727228'),
(8, 'Mohamed', '00000', 2, 'nasr city', '007655', '096665');

-- --------------------------------------------------------

--
-- Table structure for table `rate_meal`
--

CREATE TABLE `rate_meal` (
  `Meal_ID` int(255) NOT NULL,
  `Avg_Rating` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `Rating_ID` int(255) NOT NULL,
  `ID_Person` int(255) NOT NULL,
  `Meal_ID` int(255) NOT NULL,
  `Rating_Time` datetime NOT NULL,
  `Feedback` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `Review_ID` int(255) NOT NULL,
  `Rating` int(5) NOT NULL,
  `Feedback` text NOT NULL,
  `ID_Person` int(255) NOT NULL,
  `Review_Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

CREATE TABLE `usertype` (
  `ID_Type` int(20) NOT NULL,
  `User_Type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usertype`
--

INSERT INTO `usertype` (`ID_Type`, `User_Type`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Visitor');

-- --------------------------------------------------------

--
-- Table structure for table `usertype_pages`
--

CREATE TABLE `usertype_pages` (
  `usertype_pagesID` int(255) NOT NULL,
  `ID_Type` int(20) NOT NULL,
  `PageID` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usertype_pages`
--

INSERT INTO `usertype_pages` (`usertype_pagesID`, `ID_Type`, `PageID`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 2, 1),
(5, 2, 2),
(6, 2, 3),
(7, 3, 2),
(8, 3, 3),
(9, 3, 4),
(10, 3, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catering`
--
ALTER TABLE `catering`
  ADD PRIMARY KEY (`Catering_ID`);

--
-- Indexes for table `meals`
--
ALTER TABLE `meals`
  ADD PRIMARY KEY (`Meal_ID`),
  ADD KEY `ID_Category` (`ID_Category`);

--
-- Indexes for table `meals_category`
--
ALTER TABLE `meals_category`
  ADD PRIMARY KEY (`ID_Category`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Order_ID`),
  ADD KEY `ID_Person` (`ID_Person`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD KEY `Order_ID` (`Order_ID`),
  ADD KEY `Meal_ID` (`Meal_ID`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`PageID`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`ID_Person`),
  ADD KEY `ID_Type` (`ID_Type`);

--
-- Indexes for table `rate_meal`
--
ALTER TABLE `rate_meal`
  ADD KEY `Meal_ID` (`Meal_ID`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`Rating_ID`),
  ADD KEY `Meal_ID` (`Meal_ID`),
  ADD KEY `ID_Person` (`ID_Person`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`Review_ID`),
  ADD KEY `ID_Person` (`ID_Person`);

--
-- Indexes for table `usertype`
--
ALTER TABLE `usertype`
  ADD PRIMARY KEY (`ID_Type`);

--
-- Indexes for table `usertype_pages`
--
ALTER TABLE `usertype_pages`
  ADD PRIMARY KEY (`usertype_pagesID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catering`
--
ALTER TABLE `catering`
  MODIFY `Catering_ID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `meals`
--
ALTER TABLE `meals`
  MODIFY `Meal_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `meals_category`
--
ALTER TABLE `meals_category`
  MODIFY `ID_Category` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `Order_ID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `PageID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `ID_Person` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `Rating_ID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `Review_ID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usertype`
--
ALTER TABLE `usertype`
  MODIFY `ID_Type` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `usertype_pages`
--
ALTER TABLE `usertype_pages`
  MODIFY `usertype_pagesID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

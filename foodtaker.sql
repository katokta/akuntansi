-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2020 at 10:53 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodtaker`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun_perkiraan`
--

CREATE TABLE `akun_perkiraan` (
  `AccountID` int(11) NOT NULL,
  `AccountHeading` varchar(255) NOT NULL,
  `AccountSubHeading` varchar(255) NOT NULL,
  `AccountDesc` varchar(255) NOT NULL,
  `Staff_PIC` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akun_perkiraan`
--

INSERT INTO `akun_perkiraan` (`AccountID`, `AccountHeading`, `AccountSubHeading`, `AccountDesc`, `Staff_PIC`) VALUES
(2, 'Aset', 'Kas', 'Untuk mencatat kas perusahaan', 'Katherine'),
(3, 'Kewajiban', 'Kartu Kredit', 'Mencatat pembayaran kartu kredit', 'Katherine');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CustomerID` int(11) NOT NULL,
  `Customer_Name` varchar(255) NOT NULL,
  `Customer_Email` varchar(255) NOT NULL,
  `Customer_Phone` bigint(20) NOT NULL,
  `Customer_AccountNo` varchar(255) NOT NULL,
  `Customer_Address` text NOT NULL,
  `pass_hash` varchar(255) NOT NULL,
  `Customer_Profpic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `MenuID` int(11) NOT NULL,
  `Nama_Menu` varchar(255) NOT NULL,
  `Kategori_Menu` enum('Makanan','Minuman') NOT NULL,
  `Harga_Menu` int(11) NOT NULL,
  `Kuantitas_Tersedia` int(11) NOT NULL,
  `Deskripsi_Menu` text NOT NULL,
  `Photo_Menu` varchar(255) DEFAULT NULL,
  `Staff_Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `miscinflow`
--

CREATE TABLE `miscinflow` (
  `MiscInflow_ID` int(11) NOT NULL,
  `MiscInflow_Name` varchar(255) NOT NULL,
  `MiscInflow_Account_Debit` int(11) NOT NULL,
  `MiscInflow_Account_Credit` int(11) NOT NULL,
  `Amount_Debit` bigint(20) NOT NULL,
  `Amount_Credit` bigint(20) NOT NULL,
  `Description` text NOT NULL,
  `MiscInflow_Date` date NOT NULL,
  `MiscInflow_Time` time NOT NULL,
  `Staf_PIC` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `outflow`
--

CREATE TABLE `outflow` (
  `Outflow_ID` int(11) NOT NULL,
  `Outflow_Name` varchar(255) NOT NULL,
  `Outflow_Account_Debit` varchar(255) NOT NULL,
  `Outflow_Account_Credit` varchar(255) NOT NULL,
  `Amount_Debit` int(20) NOT NULL,
  `Amount_Credit` int(20) NOT NULL,
  `Outflow_Description` varchar(255) NOT NULL,
  `Outflow_Date` date NOT NULL,
  `Outflow_Time` time NOT NULL,
  `Staf_PIC` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `outflow`
--

INSERT INTO `outflow` (`Outflow_ID`, `Outflow_Name`, `Outflow_Account_Debit`, `Outflow_Account_Credit`, `Amount_Debit`, `Amount_Credit`, `Outflow_Description`, `Outflow_Date`, `Outflow_Time`, `Staf_PIC`) VALUES
(1, 'Pembayaran Kartu Kredit', 'Kartu', 'Kas', 1000000, 1000000, 'Pelunasan kartu kredit bulan Desember 2020', '2020-12-11', '16:23:00', 'Katherine');

-- --------------------------------------------------------

--
-- Table structure for table `paymentdetail`
--

CREATE TABLE `paymentdetail` (
  `PaymentID` int(11) NOT NULL,
  `Payment_Date` datetime NOT NULL,
  `Paid_Amount` int(11) NOT NULL,
  `Payment_Method` enum('Tunai','Kredit') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `promo`
--

CREATE TABLE `promo` (
  `KodePromo` int(11) NOT NULL,
  `Jumlah_Potongan` int(11) NOT NULL,
  `DateStart` date NOT NULL,
  `DateEnd` date NOT NULL,
  `Staff_Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `StaffID` int(11) NOT NULL,
  `Staff_Name` varchar(255) NOT NULL,
  `Staff_Email` varchar(255) NOT NULL,
  `Staff_Photo` varchar(255) NOT NULL,
  `Staff_Phone` bigint(20) NOT NULL,
  `Staff_Role` enum('Cashier','Waiter','Manager','Accountant') NOT NULL,
  `staff_passhash` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`StaffID`, `Staff_Name`, `Staff_Email`, `Staff_Photo`, `Staff_Phone`, `Staff_Role`, `staff_passhash`) VALUES
(3, 'Katherine Oktaviani', 'oktavianikatherine@gmail.com', 'profpic/', 8973310970, 'Accountant', '$2y$10$07trg5F2bfSveuTeJtmqyuLjBm/AIJnhXJRiLxHjvFU1KATvLgz3G');

-- --------------------------------------------------------

--
-- Table structure for table `tabelorder`
--

CREATE TABLE `tabelorder` (
  `OrderID` int(11) NOT NULL,
  `KodePromo` int(11) DEFAULT NULL,
  `StaffID` int(11) NOT NULL,
  `CustomerID` int(11) NOT NULL,
  `PaymentID` int(11) NOT NULL,
  `Transaction_Date` date NOT NULL,
  `Menu_Pesanan` int(11) NOT NULL,
  `Oty_Order` int(11) NOT NULL,
  `Harga_Kotor` bigint(20) NOT NULL,
  `Alamat_Order` text NOT NULL,
  `Potongan_Harga` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun_perkiraan`
--
ALTER TABLE `akun_perkiraan`
  ADD PRIMARY KEY (`AccountID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`MenuID`);

--
-- Indexes for table `miscinflow`
--
ALTER TABLE `miscinflow`
  ADD PRIMARY KEY (`MiscInflow_ID`);

--
-- Indexes for table `outflow`
--
ALTER TABLE `outflow`
  ADD PRIMARY KEY (`Outflow_ID`);

--
-- Indexes for table `paymentdetail`
--
ALTER TABLE `paymentdetail`
  ADD PRIMARY KEY (`PaymentID`);

--
-- Indexes for table `promo`
--
ALTER TABLE `promo`
  ADD PRIMARY KEY (`KodePromo`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`StaffID`);

--
-- Indexes for table `tabelorder`
--
ALTER TABLE `tabelorder`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `StaffID` (`StaffID`),
  ADD KEY `CustomerID` (`CustomerID`),
  ADD KEY `PaymentID` (`PaymentID`),
  ADD KEY `KodePromo` (`KodePromo`),
  ADD KEY `Menu_Pesanan` (`Menu_Pesanan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun_perkiraan`
--
ALTER TABLE `akun_perkiraan`
  MODIFY `AccountID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CustomerID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `MenuID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `miscinflow`
--
ALTER TABLE `miscinflow`
  MODIFY `MiscInflow_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `outflow`
--
ALTER TABLE `outflow`
  MODIFY `Outflow_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `paymentdetail`
--
ALTER TABLE `paymentdetail`
  MODIFY `PaymentID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `promo`
--
ALTER TABLE `promo`
  MODIFY `KodePromo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `StaffID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tabelorder`
--
ALTER TABLE `tabelorder`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tabelorder`
--
ALTER TABLE `tabelorder`
  ADD CONSTRAINT `tabelorder_ibfk_1` FOREIGN KEY (`StaffID`) REFERENCES `staff` (`StaffID`),
  ADD CONSTRAINT `tabelorder_ibfk_2` FOREIGN KEY (`CustomerID`) REFERENCES `customer` (`CustomerID`),
  ADD CONSTRAINT `tabelorder_ibfk_3` FOREIGN KEY (`PaymentID`) REFERENCES `paymentdetail` (`PaymentID`),
  ADD CONSTRAINT `tabelorder_ibfk_4` FOREIGN KEY (`KodePromo`) REFERENCES `promo` (`KodePromo`),
  ADD CONSTRAINT `tabelorder_ibfk_5` FOREIGN KEY (`Menu_Pesanan`) REFERENCES `menu` (`MenuID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

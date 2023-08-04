-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2023 at 08:32 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coba_phpdasar`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_login` int(20) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_login`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(9, 'guru', '77e69c137812518e359196bb2f5e9bb9'),
(10, 'siswa', 'bcd724d15cde8c47650fda962968f102');

-- --------------------------------------------------------

--
-- Table structure for table `admin_akses`
--

CREATE TABLE `admin_akses` (
  `id_login` int(11) NOT NULL,
  `akses_id` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_akses`
--

INSERT INTO `admin_akses` (`id_login`, `akses_id`) VALUES
(1, 'guru'),
(1, 'siswa'),
(1, 'spp'),
(9, 'guru'),
(9, 'spp'),
(10, 'siswa');

-- --------------------------------------------------------

--
-- Table structure for table `master_akses`
--

CREATE TABLE `master_akses` (
  `akses_id` varchar(20) NOT NULL,
  `nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_akses`
--

INSERT INTO `master_akses` (`akses_id`, `nama`) VALUES
('guru', 'halaman guru'),
('siswa', 'halaman siswa'),
('spp', 'halaman spp');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_login`);

--
-- Indexes for table `admin_akses`
--
ALTER TABLE `admin_akses`
  ADD KEY `akses_id` (`akses_id`),
  ADD KEY `id_login` (`id_login`);

--
-- Indexes for table `master_akses`
--
ALTER TABLE `master_akses`
  ADD PRIMARY KEY (`akses_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_login` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_akses`
--
ALTER TABLE `admin_akses`
  ADD CONSTRAINT `admin_akses_ibfk_1` FOREIGN KEY (`akses_id`) REFERENCES `master_akses` (`akses_id`),
  ADD CONSTRAINT `admin_akses_ibfk_2` FOREIGN KEY (`id_login`) REFERENCES `admin` (`id_login`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

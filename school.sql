-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2021 at 09:24 PM
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
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `uid` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `dob` varchar(15) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `picture` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`uid`, `name`, `email`, `address`, `dob`, `gender`, `picture`) VALUES
('1000', 'Mustafizur Rahman', 'mustafizurr171@gmail.com', 'Dhaka, Bangladesh', '1997-06-13', 'Male', 'Fahim.png');

-- --------------------------------------------------------

--
-- Table structure for table `allsubjects`
--

CREATE TABLE `allsubjects` (
  `id` int(10) NOT NULL,
  `class` int(7) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `uid` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `allsubjects`
--

INSERT INTO `allsubjects` (`id`, `class`, `subject`, `uid`) VALUES
(1, 6, 'Bangla', '1004'),
(2, 6, 'English for Today', '1005'),
(3, 6, 'Mathematics', '1006'),
(4, 6, 'Science', '1017'),
(5, 6, 'Agriculture Studies', '1015'),
(6, 7, 'Bangla', '1005'),
(7, 7, 'English for Today', '1015'),
(8, 7, 'Mathematics', '1017'),
(9, 7, 'Science', ''),
(10, 7, 'Physical Education and Health', ''),
(11, 8, 'Bangla', '1006'),
(12, 8, 'English for Today', '1017'),
(13, 8, 'Mathematics', '1005'),
(14, 8, 'Science', ''),
(15, 8, 'Work and Life Oriented Education', ''),
(16, 9, 'Bangla', '1004'),
(17, 9, 'English for Today', '1005'),
(18, 9, 'General Math', '1006'),
(19, 9, 'Physics', ''),
(20, 9, 'Botany', ''),
(21, 10, 'Bangla', '1004'),
(22, 10, 'English for Today', '1005'),
(23, 10, 'Higher Math', '1006'),
(24, 10, 'Chemistry', ''),
(25, 10, 'Zoology', '');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `bid` varchar(10) NOT NULL,
  `bname` varchar(50) NOT NULL,
  `author` varchar(50) NOT NULL,
  `category` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`bid`, `bname`, `author`, `category`, `status`) VALUES
('100', 'Maestro: War and Pax', 'David Peter', 'Comic', 'a'),
('101', 'The Very Hungry Caterpillar', 'Eric Carle', 'Fantasy', 'n/a');

-- --------------------------------------------------------

--
-- Table structure for table `classeight`
--

CREATE TABLE `classeight` (
  `id` int(10) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `uid` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `classeight`
--

INSERT INTO `classeight` (`id`, `subject`, `uid`) VALUES
(1, 'Bangla', '1006'),
(2, 'English for Today', '1017'),
(3, 'Mathematics', '1005'),
(4, 'Science', ''),
(5, 'Work and Life Orient', '');

-- --------------------------------------------------------

--
-- Table structure for table `classnine`
--

CREATE TABLE `classnine` (
  `id` int(10) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `uid` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `classnine`
--

INSERT INTO `classnine` (`id`, `subject`, `uid`) VALUES
(1, 'Bangla', '1004'),
(2, 'English for Today', '1005'),
(3, 'General Math', '1006'),
(4, 'Physics', ''),
(5, 'Botany', '');

-- --------------------------------------------------------

--
-- Table structure for table `classseven`
--

CREATE TABLE `classseven` (
  `id` int(10) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `uid` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `classseven`
--

INSERT INTO `classseven` (`id`, `subject`, `uid`) VALUES
(1, 'Bangla', '1005'),
(2, 'English for Today', '1015'),
(3, 'Mathematics', '1017'),
(4, 'Science', ''),
(5, 'Physical Education', '');

-- --------------------------------------------------------

--
-- Table structure for table `classsix`
--

CREATE TABLE `classsix` (
  `id` int(10) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `uid` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `classsix`
--

INSERT INTO `classsix` (`id`, `subject`, `uid`) VALUES
(1, 'Bangla', '1004'),
(2, 'English for Today', '1005'),
(3, 'Agriculture Studies', '1015'),
(4, 'Mathematics', '1006'),
(5, 'Science', '1017');

-- --------------------------------------------------------

--
-- Table structure for table `classten`
--

CREATE TABLE `classten` (
  `id` int(10) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `uid` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `classten`
--

INSERT INTO `classten` (`id`, `subject`, `uid`) VALUES
(1, 'Bangla', '1004'),
(2, 'English for Today', '1005'),
(3, 'Higher Math', '1006'),
(4, 'Chemistry', ''),
(5, 'Zoology', '');

-- --------------------------------------------------------

--
-- Table structure for table `dashboard`
--

CREATE TABLE `dashboard` (
  `id` int(20) NOT NULL,
  `title` varchar(50) NOT NULL,
  `notice` varchar(600) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dashboard`
--

INSERT INTO `dashboard` (`id`, `title`, `notice`, `date`) VALUES
(1, 'School Opening', ' According to the new declaration of the govt., the school will open after Eid vacation.', '2021-03-26'),
(2, 'Holiday Due to Mid Shaban', ' It is to notify all concerned that the School will remain closed (including all online classes) on Tuesday, March 30th 2021 due to the Mid-Sha ban(Shab-E-Barat). ', '2021-03-26');

-- --------------------------------------------------------

--
-- Table structure for table `issuebook`
--

CREATE TABLE `issuebook` (
  `id` varchar(10) NOT NULL,
  `bid` varchar(10) NOT NULL,
  `uid` varchar(10) NOT NULL,
  `issuedate` varchar(20) NOT NULL,
  `duedate` varchar(20) NOT NULL,
  `returndate` varchar(20) DEFAULT NULL,
  `fine` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `issuebook`
--

INSERT INTO `issuebook` (`id`, `bid`, `uid`, `issuedate`, `duedate`, `returndate`, `fine`) VALUES
('1', '100', '1004', '2021-04-23', '2021-04-25', '2021-04-24', 0),
('2', '101', '1004', '2021-04-23', '2021-04-25', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `librarian`
--

CREATE TABLE `librarian` (
  `id` int(20) NOT NULL,
  `uid` varchar(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `dob` varchar(15) NOT NULL,
  `address` varchar(50) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `picture` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `librarian`
--

INSERT INTO `librarian` (`id`, `uid`, `name`, `email`, `dob`, `address`, `gender`, `picture`) VALUES
(1, '1007', 'Asif Ahmed', 'asifahmed@yahoo.com', '2020-04-09', 'Dhaka, Bangladesh', 'Male', 'pp.png'),
(2, '1008', 'Towsif Refat', 'example@gmail.com', '2021-04-11', 'Dhaka, Bangladesh', 'Male', 'pp.png'),
(3, '1013', 'Mustafizur Rahman', 'mustafizurr171@gmail.com', '2021-04-13', 'Nikunja-2,Kuril, Dhaka', 'Male', 'pp.png'),
(4, '1014', 'Mustafizur Rahman', 'example@gmail.com', '2021-04-18', 'Dhaka, Bangladesh', 'Male', 'pp.png');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `uid` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `type` varchar(2) NOT NULL,
  `status` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`uid`, `password`, `type`, `status`) VALUES
('1000', 'admin', 'a', 'a'),
('1001', 'Fahim123@', 's', 'a'),
('1002', 'Towsif123@', 's', 'p'),
('1003', 'Tasnim123@', 's', 'p'),
('1004', 'Towsif123@', 't', 'a'),
('1005', 'Nizam123@', 't', 'a'),
('1006', 'Shusmita123@', 't', 'a'),
('1007', 'Asif123@', 'l', 'a'),
('1008', 'Towsif123@', 'l', 'p'),
('1009', 'Lamisa123@', 's', 'p'),
('1010', 'Hasib123@', 's', 'a'),
('1011', 'Adiba123@', 's', 'r'),
('1013', 'Fahim123@', 'l', 'r'),
('1014', 'Fahim123@', 'l', 'p'),
('1015', 'Fahim123@', 't', 'a'),
('1016', 'Fahim123@', 's', 'p'),
('1017', 'Towsif123@', 't', 'a'),
('1018', 'Abir123@', 't', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `id` int(10) NOT NULL,
  `uid` varchar(10) NOT NULL,
  `class` int(2) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `mid` float DEFAULT NULL,
  `final` float DEFAULT NULL,
  `tid` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`id`, `uid`, `class`, `subject`, `mid`, `final`, `tid`) VALUES
(10, '1001', 6, 'Bangla', 85, 95, '1004'),
(12, '1002', 6, 'Bangla', 87, 78, '1004');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(10) NOT NULL,
  `uid` varchar(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `mname` varchar(20) NOT NULL,
  `dob` varchar(15) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `class` int(2) NOT NULL,
  `address` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `balance` varchar(5) NOT NULL,
  `picture` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `uid`, `name`, `fname`, `mname`, `dob`, `gender`, `class`, `address`, `email`, `balance`, `picture`) VALUES
(1, '1001', 'Mustafizur Rahman', 'Mr Xx', 'Mrs Y', '2021-04-09', 'Male', 6, 'Dhaka, Bangladesh', 'example@gmail.com', '50', 'pp.png'),
(2, '1002', 'Towsif Refat', 'Mr Xx', 'Mrs Y', '2021-04-09', 'Male', 6, 'Dhaka, Bangladesh', 'example@gmail.com', '50', 'pp.png'),
(3, '1003', 'Tasnim Haider', 'Mr Xx', 'Mrs Y', '2021-04-09', 'Female', 6, 'Nikunja-2,Kuril, Dhaka', 'example@gmail.com', '0', 'pp.png'),
(4, '1009', 'Lamisa Yesmin', 'Mr Xx', 'Mrs Y', '2021-04-11', 'Female', 7, 'Dhaka, Bangladesh', 'example@gmail.com', '0', 'pp.png'),
(5, '1010', 'Hasib Hasan', 'Mr Xx', 'Mrs Y', '2021-04-11', 'Male', 7, 'Dhaka, Bangladesh', 'example@gmail.com', '0', 'pp.png'),
(6, '1011', 'Adiba Rahman', 'Mr Xx', 'Mrs Ys', '2021-04-11', 'Female', 7, 'Dhaka, Bangladesh', 'example@gmail.com', '0', 'pp.png'),
(7, '1016', 'Mustafizur Rahman', 'Mahabubur Rahman', 'Fazila Tun Nessa', '2021-04-19', 'Male', 8, 'Dhaka, Bangladesh', 'example@gmail.com', '0', 'pp.png');

-- --------------------------------------------------------

--
-- Table structure for table `studentnote`
--

CREATE TABLE `studentnote` (
  `id` int(10) NOT NULL,
  `uid` varchar(10) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `class` int(10) NOT NULL,
  `note` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studentnote`
--

INSERT INTO `studentnote` (`id`, `uid`, `subject`, `class`, `note`) VALUES
(1, '1004', 'Bangla', 6, 'Graphics.txt');

-- --------------------------------------------------------

--
-- Table structure for table `studentnotice`
--

CREATE TABLE `studentnotice` (
  `id` int(10) NOT NULL,
  `uid` varchar(10) NOT NULL,
  `class` int(10) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `title` varchar(50) NOT NULL,
  `notice` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studentnotice`
--

INSERT INTO `studentnotice` (`id`, `uid`, `class`, `subject`, `title`, `notice`) VALUES
(1, '1004', 6, 'Bangla', 'Class Test ', 'All tests have been cancelled.');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(10) NOT NULL,
  `uid` varchar(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `mname` varchar(15) NOT NULL,
  `address` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `dob` varchar(15) NOT NULL,
  `balance` float NOT NULL,
  `picture` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `uid`, `name`, `fname`, `mname`, `address`, `email`, `gender`, `dob`, `balance`, `picture`) VALUES
(1, '1004', 'Towsif Refat', 'Mr Xx', 'Mrs Y', 'Dhaka, Bangladesh', 'example@gmail.com', 'Male', '2021-04-09', 0, 'pp.png'),
(2, '1005', 'Nizam Uddin', 'Mr Xx', 'Mrs Y', 'Dhaka, Bangladesh', 'example@gmail.com', 'Male', '2021-04-09', 0, 'pp.png'),
(3, '1006', 'Shusmita Islam', 'Mr Xx', 'Mrs Y', 'Nikunja-2,Kuril, Dhaka', 'example@gmail.com', 'Female', '2021-04-09', 0, 'pp.png'),
(5, '1015', 'Mustafizur Rahman', 'Mahabubur Rahman', 'Fazila Tun Ness', 'Dhaka, Bangladesh', 'mustafizurr171@gmail.com', 'Male', '2021-04-19', 0, 'pp.png'),
(6, '1017', 'Towsif Refat', 'Mr Xx', 'Mrs Ys', 'Dhaka, Bangladesh', 'towsif@gmail.com', 'Male', '2021-04-22', 0, 'pp.png'),
(7, '1018', 'Abir Hasan', 'Mr Xx', 'Mrs Ys', 'Dhaka, Bangladesh', 'example@gmail.com', 'Male', '2003-04-23', 0, 'pp.png');

-- --------------------------------------------------------

--
-- Table structure for table `teachernotice`
--

CREATE TABLE `teachernotice` (
  `id` int(10) NOT NULL,
  `uid` varchar(10) NOT NULL,
  `title` varchar(50) NOT NULL,
  `notice` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teachernotice`
--

INSERT INTO `teachernotice` (`id`, `uid`, `title`, `notice`) VALUES
(1, '1004', 'Meeting', 'Meet at sharp 3 pm.'),
(2, '1004', 'Test Cancel', 'Cancel all the class tests');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `allsubjects`
--
ALTER TABLE `allsubjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `classeight`
--
ALTER TABLE `classeight`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `classnine`
--
ALTER TABLE `classnine`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `classseven`
--
ALTER TABLE `classseven`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `classsix`
--
ALTER TABLE `classsix`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `classten`
--
ALTER TABLE `classten`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `dashboard`
--
ALTER TABLE `dashboard`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issuebook`
--
ALTER TABLE `issuebook`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uid` (`uid`),
  ADD KEY `issuebook_ibfk_1` (`bid`);

--
-- Indexes for table `librarian`
--
ALTER TABLE `librarian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `studentnote`
--
ALTER TABLE `studentnote`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `studentnotice`
--
ALTER TABLE `studentnotice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uid_2` (`uid`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `teachernotice`
--
ALTER TABLE `teachernotice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uid` (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `allsubjects`
--
ALTER TABLE `allsubjects`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `classeight`
--
ALTER TABLE `classeight`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `classnine`
--
ALTER TABLE `classnine`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `classseven`
--
ALTER TABLE `classseven`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `classsix`
--
ALTER TABLE `classsix`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `classten`
--
ALTER TABLE `classten`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `dashboard`
--
ALTER TABLE `dashboard`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `librarian`
--
ALTER TABLE `librarian`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `studentnote`
--
ALTER TABLE `studentnote`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `studentnotice`
--
ALTER TABLE `studentnotice`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `teachernotice`
--
ALTER TABLE `teachernotice`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `login` (`uid`);

--
-- Constraints for table `issuebook`
--
ALTER TABLE `issuebook`
  ADD CONSTRAINT `issuebook_ibfk_1` FOREIGN KEY (`bid`) REFERENCES `book` (`bid`),
  ADD CONSTRAINT `issuebook_ibfk_2` FOREIGN KEY (`uid`) REFERENCES `login` (`uid`);

--
-- Constraints for table `librarian`
--
ALTER TABLE `librarian`
  ADD CONSTRAINT `librarian_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `login` (`uid`);

--
-- Constraints for table `result`
--
ALTER TABLE `result`
  ADD CONSTRAINT `result_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `login` (`uid`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `login` (`uid`);

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `teacher_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `login` (`uid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

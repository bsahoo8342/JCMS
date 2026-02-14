-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2024 at 06:20 PM
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
-- Database: `jcms`
--

-- --------------------------------------------------------

--
-- Table structure for table `advocate_info`
--

CREATE TABLE `advocate_info` (
  `a_slno` int(11) NOT NULL,
  `a_regd` varchar(20) NOT NULL,
  `a_name` varchar(50) NOT NULL,
  `a_email` varchar(50) NOT NULL,
  `a_phn` bigint(50) NOT NULL,
  `a_pass` varchar(50) NOT NULL,
  `a_path` varchar(40) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `advocate_info`
--

INSERT INTO `advocate_info` (`a_slno`, `a_regd`, `a_name`, `a_email`, `a_phn`, `a_pass`, `a_path`, `status`) VALUES
(1, 'OR022000', 'Biswajit Sahoo', 'bsa643@gmail.com', 987654321, '21232f297a57a5a743894a0e4a801fc3', 'profile/OR022000.jpg', 1),
(3, 'OR202003', 'Mukesh Singh', 'Mukesh@gmail.com', 7243792934, '21232f297a57a5a743894a0e4a801fc3', 'profile/OR202003.png', 1),
(4, 'OR202005', 'Ram Parida', 'ram@gmail.com', 747499724, '21232f297a57a5a743894a0e4a801fc3', 'profile/OR202005.png', 1),
(15, 'OR202004', 'Hari Das', 'Hari@gmail.com', 12345678901, '21232f297a57a5a743894a0e4a801fc3', 'profile/OR202004.jpg', 1),
(17, 'OR202011', 'Ashok kumar Patra', 'ashok@gmail.com', 5241369874, '21232f297a57a5a743894a0e4a801fc3', 'profile/OR202011.jpeg', 1),
(18, 'OR935398', 'Debendra Mishra', 'bsahoo8342@gmail.com', 9987635543, '21232f297a57a5a743894a0e4a801fc3', 'profile/OR935398.jpeg', 1),
(19, 'OR202029', 'b js', 'a@kl.a', 7439379, '202cb962ac59075b964b07152d234b70', 'profile/OR202029.png', 1),
(20, 'OR202115', 'Nira Swain', 'nira@gmail.com', 3894949347, '202cb962ac59075b964b07152d234b70', 'profile/OR202115.jpg', 1),
(21, 'OR202043', 'kshirod Sahoo', 'a@kk.s', 12345678910, '202cb962ac59075b964b07152d234b70', 'profile/OR202043.png', 1),
(25, 'OR-12345', 'priyambada sahoo', 'priyambadas@gmail.com', 79926962678, '827ccb0eea8a706c4c34a16891f84e7b', 'profile/OR-12345.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `casefiling`
--

CREATE TABLE `casefiling` (
  `slno` int(11) NOT NULL,
  `filingno` int(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `court` varchar(100) NOT NULL,
  `casetype` varchar(15) NOT NULL,
  `date` date NOT NULL,
  `pname` varchar(50) NOT NULL,
  `pgname` varchar(50) NOT NULL,
  `page` int(10) NOT NULL,
  `pgender` varchar(15) NOT NULL,
  `pnation` varchar(20) NOT NULL,
  `pcaste` varchar(10) NOT NULL,
  `pemail` varchar(50) NOT NULL,
  `pphn` bigint(10) NOT NULL,
  `padd` varchar(70) NOT NULL,
  `pcity` varchar(20) NOT NULL,
  `pstate` varchar(20) NOT NULL,
  `ppin` int(6) NOT NULL,
  `rname` varchar(50) NOT NULL,
  `rgname` varchar(50) NOT NULL,
  `rage` int(5) NOT NULL,
  `rgender` varchar(6) NOT NULL,
  `rnation` varchar(20) NOT NULL,
  `rcaste` varchar(25) NOT NULL,
  `radd` varchar(70) NOT NULL,
  `rcity` varchar(20) NOT NULL,
  `rstate` varchar(20) NOT NULL,
  `rpin` int(6) NOT NULL,
  `advno` varchar(30) NOT NULL,
  `advname` varchar(50) NOT NULL,
  `r_advname` varchar(50) DEFAULT NULL,
  `r_advno` varchar(10) DEFAULT NULL,
  `fact` text NOT NULL,
  `act` varchar(100) NOT NULL,
  `section` varchar(100) NOT NULL,
  `file` varchar(100) NOT NULL,
  `sts` varchar(11) NOT NULL,
  `judgement` text DEFAULT NULL,
  `verify` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `casefiling`
--

INSERT INTO `casefiling` (`slno`, `filingno`, `state`, `court`, `casetype`, `date`, `pname`, `pgname`, `page`, `pgender`, `pnation`, `pcaste`, `pemail`, `pphn`, `padd`, `pcity`, `pstate`, `ppin`, `rname`, `rgname`, `rage`, `rgender`, `rnation`, `rcaste`, `radd`, `rcity`, `rstate`, `rpin`, `advno`, `advname`, `r_advname`, `r_advno`, `fact`, `act`, `section`, `file`, `sts`, `judgement`, `verify`) VALUES
(22, 199879, 'JHARKHAND', 'JHARKHAND HIGH COURT', 'WP(C)', '2024-04-29', 'Subham Das', 'Satyabrata Das', 54, 'Male', 'Indian', 'General', 'a@vd.a', 5482548, 'vgjha', 'jdfjg', 'JHARKHAND', 368383, 'Dhruba Nayak', 'Ajay Nayak', 36, 'Male', 'Indian', 'General', 'dgfjsadgj', 'GJDGJ', 'ARUNACHAL PRADESH', 846883, 'OR935398', 'Debendra Mishra', NULL, NULL, 'By using a number, then a colon, followed by a number in square brackets, you can specify a starting and ending indexes, respectively.\r\n\r\nIn our case, we used 1 and 4 as in [1:4]. From the results, you see that the slicing starts from the value at index 1 which is 2, up until the value before the index 4, which is 4 (at index 3).\r\n\r\nHow to slice with steps\r\nWhen you specify a start and end index of 1 and 5, respectively, slicing will select values at index 1, index 2 (1 increment to the previous index), index 3 (1 increment to the previous index) and index 4 (and one increment to the previous index).\r\n\r\nIn this slicing, a step of 1 is used by default. But you can provide a different step.', 'Commercial Courts Act, 2015', '543', 'doc/199879.pdf', 'pending', NULL, 1),
(16, 378290, 'JAMMU AND KASHMIR', 'HIGH COURT OF JAMMU & KASHMIR AND LADAK', 'WP(C)', '2024-04-26', 'Mohammad Ali ', 'SK. Abdula', 56, 'Male', 'Indian', 'General', 'mohammad@gail.com', 737593959, 'hiwi', 'youl', 'JAMMU AND KASHMIR', 449359, 'Jasmine Begum', 'SK Sahil', 53, 'Female', 'Indian', 'General', 'Jkdl', 'eosks', 'JAMMU AND KASHMIR', 949384, 'OR935398', 'Debendra Mishra', NULL, NULL, 'According to Tripathy, the turtles are forced to lay eggs in a limited space as their number is far more than the area available. “This can lead to overcrowding and substantial egg loss. For instance, if 10,000 turtles lay eggs one night and depart, and then another 1,000 turtles arrive to lay eggs, the newcomers may be forced to dig up the previously established nests because of lack of space. Consequently, the eggs in those disturbed nests are likely to be crushed or exposed, rendering them nonviable,” Tripathy explained.\r\nFor shoreline change analysis, the study focused on the coastal stretch from the Mahanadi river mouth in the south to Dhamra port in the north. This coastline was divided into four zones based on natural landmarks, such as river mouths and sea beaches, as well as anthropogenic features like ports.\r\n“Zone I was from Mahanadi river mouth to Hukitola bay and Zone II was from Hukitola bay to Brahmani river mouth. Zone III (identified as the most vulnerable segment) included erosion-prone Pentha and Satabhaya Sea beaches. Despite mitigation efforts, erosion remains a critical concern in this zone. Historically, Olive Ridley turtle mass nesting occurred here. But severe erosion has caused the nesting site to shift further north. Zone IV, from Maipura river mouth to Dhamra port, is the current location for the Olive Ridley turtle mass nesting, particularly around Wheeler Island,” Tripathy said.', 'Special Court under the POCSO Act', '387', 'doc/378290.pdf', 'pending', NULL, 0),
(2, 464787, 'ORISSA', 'ORISSA HIGH COURT', 'WP(C)', '2024-02-27', 'Bhaskar Ray', 'Prabhakar Ray', 79, 'Male', 'Indian', 'General', 'xzy@h.df', 87472287, 'Patia', 'Khurdha', 'ORISSA', 282839, 'Manoj Parida ', 'Bigyan Parida', 56, 'Male', 'Indian', 'OBC', 'Buxi bazar', 'Cuttack', 'ORISSA', 73783, 'OR935398', 'Debendra Mishra', NULL, NULL, 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Distinctio porro vitae rem dolorem, repellendus, vel hic quas assumenda odit nulla optio adipisci dicta necessitatibus obcaecati exercitationem et. Doloribus qui mollitia sapiente quasi quidem, reprehenderit ullam tempore accusantium provident, nulla odit placeat maxime, dolore delectus esse veritatis. Deleniti totam fugiat veritatis quia autem reprehenderit, harum dignissimos aliquid nobis possimus cupiditate quibusdam quidem eligendi sit laudantium, consectetur perferendis magni minima sint? Et, dolore. Veritatis blanditiis id odio facilis, vero aliquam inventore ipsa nulla unde. Fuga, aliquam deleniti provident explicabo culpa, consequuntur natus rerum, id tempora quia iste! Facere error recusandae fugit provident deleniti quae fuga eum laudantium aut asperiores quaerat id maxime rerum, officia in quasi, autem ullam commodi veritatis odio, maiores impedit exercitationem quia. Debitis, beatae porro magni mollitia quae ab sit exercitationem libero fuga! Quaerat omnis voluptates eos perferendis, aut numquam dolor magnam natus quidem, similique, ab ad quos earum?', 'PMLA Act', '468', 'XtraMarkSheetCGPANew.pdf', 'pending', NULL, 1),
(12, 665534, 'ORISSA', 'ORISSA HIGH COURT', 'CMP', '2023-03-29', 'Chetan Swain', 'Bhramar Swain', 48, 'Male', 'Indian', 'General', 'chetan@gmail.com', 7836837933, 'Nimapada', 'Puri', 'ORISSA', 783673, 'Ashok Kumar Das', 'Krushna Chandara Das', 35, 'Male', 'Indian', 'General', 'KUJANGA', 'Jagatsinghpur ', 'ORISSA', 754141, 'OR022000', 'Biswajit Sahoo', 'Debendra Mishra', 'OR935398', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde, consequuntur aperiam! Enim inventore suscipit consequatur natus totam doloremque nostrum, eveniet facilis earum, vel nisi odio quam ullam itaque repudiandae! Ut nam, obcaecati optio porro maxime eos harum minima explicabo esse accusantium omnis similique aperiam aspernatur qui sunt magni. Quas officiis a libero suscipit itaque illo fugiat rem similique odio deleniti tempora quaerat impedit numquam tenetur, voluptatem aliquid ipsa. Fugit, recusandae.', 'Enforce Fundamentals Rights Act', '387', 'doc/665534.pdf', 'Disposed', 'OOP is an abbreviation that stands for Object-oriented programming paradigm. It is defined as a programming model that uses the concept of objects which refers to real-world entities with state and behavior. This chapter helps you become an expert in using object-oriented programming support in Python language.\r\n\r\nPython is a programming language that supports object-oriented programming. This makes it simple to create and use classes and objects. If you do not have any prior experience with object-oriented programming, you are at the right place. Let\r\ns start by discussing a small introduction of Object-Oriented Programming (OOP) to help you.\r\n\r\nProcedural Oriented Approach\r\nEarly programming languages developed in 50s and 60s are recognized as procedural (or procedure oriented) languages.', 1),
(13, 667527, 'ORISSA', 'ORISSA HIGH COURT', 'WP(C)', '2024-04-14', 'Jayram Lenka', 'Sidheswar Lenka', 49, 'Male', 'Indian', 'OBC', 'jayram@gmail.com', 7834793994, 'Talapada (santara)', 'Kujanga', 'ORISSA', 754141, 'Kalandi Panigrahi', 'Hrushikesh Panigrahi', 57, 'Male', 'Indian', 'General', 'cuttack', 'Cuttack', 'ORISSA', 753009, 'OR935398', 'Debendra Mishra', NULL, NULL, 'Fact of the cases are The peer-reviewed study, published in leading scientific journal Marine Pollution Bulletin by Elsevier, has analysed shoreline changes from 1990 to 2022 using satellite imagery and the digital shoreline analysis system software.It covered 929 transects across four zones in the nesting habitat. Dr Basudev Tripathy, scientist, ZSI-Pune, described the findings as a matter of concern for the future of Olive Ridley Arribada (mass nesting that recently started at Gahirmatha).', 'Criminal Procedure Act', '298', 'doc/667527.pdf', 'pending', NULL, 1),
(15, 937116, 'BIHAR', 'CALCUTTA HIGH COURT', 'WP(C)', '2024-04-18', 'afaf', 'afdf', 34, 'Male', 'Indian', 'General', 'ekfka@hkdf.sg', 842592757, 'gsgs', 'gfsgs', 'DADRA AND NAGAR HAVE', 436354, 'gdhfddhssdg', 'rwhr', 19, 'Male', 'American', 'General', 'thtshhs', 'sfgfh', 'HIMACHAL PRADESH', 53453, 'OR935398', 'Debendra Mishra', 'Biswajit Sahoo', 'OR022000', 'hskthshfk', 'Commissions for Protection of Child Rights Act, 2005', '352', 'doc/937116.pdf', 'Disposed', 'ykjvgfskvklsash', 1),
(3, 957418, 'ORISSA', 'ORISSA HIGH COURT', 'WP(C)', '2024-02-27', 'Bhaskar Ray', 'Prabhakar Ray', 79, 'Male', 'Indian', 'General', 'xy@h.df', 87472287444, 'Patia', 'Khurdha', 'ORISSA', 282839, 'Manoj Parida ', 'Bigyan Parida', 56, 'Male', 'Indian', 'OBC', 'Buxi bazar', 'Cuttack', 'ORISSA', 73783, 'OR935398', 'Debendra Mishra', 'Nira Swain', 'OR202115', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Distinctio porro vitae rem dolorem, repellendus, vel hic quas assumenda odit nulla optio adipisci dicta necessitatibus obcaecati exercitationem et. Doloribus qui mollitia sapiente quasi quidem, reprehenderit ullam tempore accusantium provident, nulla odit placeat maxime, dolore delectus esse veritatis. Deleniti totam fugiat veritatis quia autem reprehenderit, harum dignissimos aliquid nobis possimus cupiditate quibusdam quidem eligendi sit laudantium, consectetur perferendis magni minima sint? Et, dolore. Veritatis blanditiis id odio facilis, vero aliquam inventore ipsa nulla unde. Fuga, aliquam deleniti provident explicabo culpa, consequuntur natus rerum, id tempora quia iste! Facere error recusandae fugit provident deleniti quae fuga eum laudantium aut asperiores quaerat id maxime rerum, officia in quasi, autem ullam commodi veritatis odio, maiores impedit exercitationem quia. Debitis, beatae porro magni mollitia quae ab sit exercitationem libero fuga! Quaerat omnis voluptates eos perferendis, aut numquam dolor magnam natus quidem, similique, ab ad quos earum?', 'PMLA Act', '468', 'XtraMarkSheetCGPANew.pdf', 'pending', NULL, 1),
(17, 1794668, 'ORISSA', 'ORISSA HIGH COURT', 'WP(C)', '2024-04-29', 'Subham Das', 'Satyabrata Das', 32, 'Male', 'Indian', 'General', 'subham@gmail.com', 788363738, 'flat', 'coili', 'ORISSA', 233334, 'Bhsgaban Swain', 'Hari Swain', 43, 'Male', 'Indian', 'General', 'Kalapahad', 'bhubaneswar ', 'ORISSA', 368484, 'OR935398', 'Debendra Mishra', 'Biswajit Sahoo', 'OR022000', 'Object Oriented Programming is a fundamental concept in Python, empowering developers to build modular, maintainable, and scalable applications. By understanding the core OOP principles—classes, objects, inheritance, encapsulation, polymorphism, and abstraction—programmers can leverage the full potential of Python’s OOP capabilities to design elegant and efficient solutions to complex problems.\r\n\r\nWhat is Object-Oriented Programming in Python?\r\nIn Python object-oriented Programming (OOPs) is a programming paradigm that uses objects and classes in programming. It aims to implement real-world entities like inheritance, polymorphisms, encapsulation, etc. in the programming. The main concept of object-oriented Programming (OOPs) or oops concepts in Python is to bind the data and the functions that work together as a single unit so that no other part of the code can access this data.', 'Commercial Courts Act, 2015', '332', 'doc/179402.pdf', 'pending', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `case_history`
--

CREATE TABLE `case_history` (
  `slno` int(100) NOT NULL,
  `case_no` varchar(20) NOT NULL,
  `year` int(4) NOT NULL,
  `next_date` date NOT NULL,
  `remark` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `case_history`
--

INSERT INTO `case_history` (`slno`, `case_no`, `year`, `next_date`, `remark`) VALUES
(2, '290', 2024, '2024-04-16', 'Admission'),
(3, '222', 2024, '2024-04-23', 'Admission'),
(4, '222', 2024, '2024-05-02', 'Notice Sent to Respondent.'),
(5, '346', 2024, '2024-04-15', 'For Petitioner Hearing'),
(6, '222', 2024, '2024-04-15', 'Hearing of Petitioner'),
(7, '323', 2023, '2024-04-17', 'Petitioner evidence '),
(8, '222', 2024, '2024-04-17', 'Hearing of Respondent'),
(9, '948', 2024, '2024-04-30', '1st appearance '),
(10, '948', 2024, '0000-00-00', ''),
(11, '948', 2024, '2024-04-30', 'History'),
(12, '466', 2045, '2024-05-03', 'evidence'),
(13, '1000', 2024, '2024-05-03', '1st listing date'),
(14, '330', 2024, '2024-05-03', 'evidence for respondent'),
(15, '466', 2045, '2024-12-28', 'Judgement'),
(16, '466', 2045, '2024-12-29', 'Hearing'),
(17, '466', 2045, '2025-01-02', 'Hearing 3'),
(18, '466', 2045, '2025-01-04', 'Hearing 4\r\n'),
(19, '466', 2045, '2025-01-06', 'Document Submission'),
(20, '466', 2045, '2025-01-08', 'Judgment 2'),
(21, '466', 2045, '2025-01-09', 'Appeal filing'),
(22, '466', 2045, '2025-01-11', 'Appeal Approve '),
(23, '466', 2045, '2025-01-13', 'Test1');

-- --------------------------------------------------------

--
-- Table structure for table `case_info`
--

CREATE TABLE `case_info` (
  `slno` int(100) NOT NULL,
  `f_filingno` varchar(11) NOT NULL,
  `f-date` date NOT NULL,
  `case_type` varchar(11) NOT NULL,
  `case_no` varchar(11) NOT NULL,
  `year` int(11) NOT NULL,
  `regd_date` date NOT NULL,
  `j_regd` varchar(11) NOT NULL,
  `a_regd` varchar(11) NOT NULL,
  `courtno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `case_info`
--

INSERT INTO `case_info` (`slno`, `f_filingno`, `f-date`, `case_type`, `case_no`, `year`, `regd_date`, `j_regd`, `a_regd`, `courtno`) VALUES
(1, '665534', '2023-03-29', 'WP(C)', '323', 2023, '2023-03-30', 'OR022008', 'OR022000', 17),
(3, '957418', '2024-02-27', 'WP(C)', '324', 2024, '2024-02-28', 'OR022008', 'OR935398', 0),
(7, '464787', '2024-02-27', 'WP(C)', '325', 2024, '2024-04-10', 'OR022008', 'OR935398', 12),
(8, '667527', '2024-04-14', 'WP(C)', '326', 2024, '2024-04-16', 'OR022008', 'OR935398', 10),
(10, '179402', '2024-04-29', 'WP(C)', '327', 2024, '2024-04-29', 'OR022008', 'OR935398', 22),
(12, '199879', '2024-04-29', 'WP(C)', '466', 2045, '2024-05-03', 'OR022008', 'OR935398', 6),
(13, '1794668', '2024-04-29', 'WP(C)', '1000', 2024, '2024-05-02', 'OR022008', 'OR935398', 45),
(14, '937116', '2024-04-18', 'WP(C)', '330', 2024, '2024-05-02', 'OR022008', 'OR935398', 2);

-- --------------------------------------------------------

--
-- Table structure for table `court_list`
--

CREATE TABLE `court_list` (
  `slno` int(11) NOT NULL,
  `hc_name` varchar(191) NOT NULL,
  `link` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `court_list`
--

INSERT INTO `court_list` (`slno`, `hc_name`, `link`) VALUES
(2, 'ALLAHABAD HIGH COURT', 'https://www.allahabadhighcourt.in/index.html'),
(3, 'ANDHRA PRADESH HIGH COURT', 'https://aphc.gov.in/'),
(4, 'BOMBAY HIGH COURT', 'https://bombayhighcourt.nic.in/index.php'),
(5, 'CALCUTTA HIGH COURT', 'https://www.calcuttahighcourt.gov.in/'),
(6, 'CHHATTISGARH HIGH COURT', 'https://highcourt.cg.gov.in/default.html'),
(7, 'DELHI HIGH COURT', 'https://delhihighcourt.nic.in/'),
(8, 'GAUHATI HIGH COURT', 'https://ghconline.gov.in/'),
(9, 'GUJARAT HIGH COURT', 'https://gujarathighcourt.nic.in/'),
(10, 'HIMACHAL PRADESH HIGH COURT', 'https://hphighcourt.nic.in/'),
(11, 'HIGH COURT OF JAMMU & KASHMIR AND LADAK', 'https://jkhighcourt.nic.in/'),
(12, 'JHARKHAND HIGH COURT', 'https://jharkhandhighcourt.nic.in/'),
(13, 'KARNATAKA HIGH COURT', 'https://karnatakajudiciary.kar.nic.in/'),
(14, 'KERALA HIGH COURT', 'https://highcourt.kerala.gov.in/'),
(15, 'MADHYA PRADESH HIGH COURT', 'https://mphc.gov.in/'),
(16, 'MADRAS HIGH COURT', 'https://hcmadras.tn.gov.in/'),
(17, 'MANIPUR HIGH COURT', 'https://hcmimphal.nic.in/'),
(18, 'MEGHALAYA HIGH COURT', 'https://meghalayahighcourt.nic.in/'),
(19, 'ORISSA HIGH COURT', 'https://www.orissahighcourt.nic.in/'),
(20, 'PATNA HIGH COURT', 'https://patnahighcourt.gov.in/'),
(21, 'PUNJAB & HARYANA HIGH COURT', 'https://highcourtchd.gov.in/'),
(22, 'RAJASTHAN HIGH COURT', 'https://hcraj.nic.in/'),
(23, 'SIKKIM HIGH COURT', 'https://hcs.gov.in/'),
(24, 'HIGH COURT FOR THE STATE OF TELANGANA', 'https://tshc.gov.in/'),
(25, 'TRIPURA HIGH COURT', 'https://thc.nic.in/'),
(26, 'UTTARAKHAND HIGH COURT', 'https://highcourtofuttarakhand.gov.in/');

-- --------------------------------------------------------

--
-- Table structure for table `judge_info`
--

CREATE TABLE `judge_info` (
  `j_slno` int(20) NOT NULL,
  `j_regd` varchar(50) NOT NULL,
  `j_name` varchar(50) NOT NULL,
  `j_email` varchar(50) NOT NULL,
  `j_phn` bigint(10) NOT NULL,
  `j_pass` varchar(50) NOT NULL,
  `j_path` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `judge_info`
--

INSERT INTO `judge_info` (`j_slno`, `j_regd`, `j_name`, `j_email`, `j_phn`, `j_pass`, `j_path`, `status`) VALUES
(1, 'OR022008', 'Abhijit Sahoo', 'bsahoo8342@gmail.com', 9692995380, '21232f297a57a5a743894a0e4a801fc3', 'profile/OR022008.png', 1),
(2, 'OR202003', 'Ram Prasad', 'ram@gmail.com', 4897969739, '21232f297a57a5a743894a0e4a801fc3', 'profile/OR202003.png', 1),
(3, 'OR202010', 'Debadatta Swain', 'swain@g.o', 12345678901, '21232f297a57a5a743894a0e4a801fc3', 'profile/OR202010.jpeg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `slno` int(11) NOT NULL,
  `date` date NOT NULL,
  `description` text NOT NULL,
  `link` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`slno`, `date`, `description`, `link`) VALUES
(1, '2024-01-01', 'High Court Calender Release', 'high_court_holiday_list_1704176684.pdf'),
(2, '2024-08-01', 'August Events Notification', 'court_news_aug.pdf'),
(3, '2024-09-01', 'September Events Notification ', 'court_news_sep.pdf'),
(4, '2024-10-01', 'October Events Notification', 'court_news_oct.pdf'),
(5, '2024-12-20', 'Transfer and Posting of Judicial Officers in the Cadre of District Judge', 'notification_1734700079.pdf'),
(6, '2024-12-17', 'Inviting Suggestions and Views in respect of 8 applicant Advocates to be designated as Senior Advocates', 'notification_1734443114.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `staff_info`
--

CREATE TABLE `staff_info` (
  `slno` int(11) NOT NULL,
  `s_regd` varchar(10) NOT NULL,
  `s_name` varchar(50) NOT NULL,
  `s_email` varchar(50) NOT NULL,
  `s_phn` bigint(12) NOT NULL,
  `s_pass` varchar(50) NOT NULL,
  `s_path` varchar(50) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff_info`
--

INSERT INTO `staff_info` (`slno`, `s_regd`, `s_name`, `s_email`, `s_phn`, `s_pass`, `s_path`, `status`) VALUES
(1, 'OS342003', 'Dinesh Tripathy', 'dinesh@gmail.com', 9373839378, '21232f297a57a5a743894a0e4a801fc3', 'profile/OS342003.jpeg', 1),
(2, 'OR202024', 'Biswajit Sahoo', 'staff@staff.com', 12345678901, '202cb962ac59075b964b07152d234b70', 'profile/OR202024.jpg', 1),
(3, 'OS112022', 'Priyambada Sahoo', 'priyambada@gmail.com', 6903738486, '202cb962ac59075b964b07152d234b70', 'profile/OS112022.jpeg', 1),
(4, 'OS112023', 'biswajit Sahoo', 'biswajit@gmail.com', 9037384769, '202cb962ac59075b964b07152d234b70', 'profile/OS112023.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `state_list`
--

CREATE TABLE `state_list` (
  `id` int(10) UNSIGNED NOT NULL,
  `state` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `state_list`
--

INSERT INTO `state_list` (`id`, `state`) VALUES
(1, 'ANDAMAN AND NICOBAR ISLANDS'),
(2, 'ANDHRA PRADESH'),
(3, 'ARUNACHAL PRADESH'),
(4, 'ASSAM'),
(5, 'BIHAR'),
(6, 'CHATTISGARH'),
(7, 'CHANDIGARH'),
(8, 'DAMAN AND DIU'),
(9, 'DELHI'),
(10, 'DADRA AND NAGAR HAVELI'),
(11, 'GOA'),
(12, 'GUJARAT'),
(13, 'HIMACHAL PRADESH'),
(14, 'HARYANA'),
(15, 'JAMMU AND KASHMIR'),
(16, 'JHARKHAND'),
(17, 'KERALA'),
(18, 'KARNATAKA'),
(19, 'LAKSHADWEEP'),
(20, 'MEGHALAYA'),
(21, 'MAHARASHTRA'),
(22, 'MANIPUR'),
(23, 'MADHYA PRADESH'),
(24, 'MIZORAM'),
(25, 'NAGALAND'),
(26, 'ORISSA'),
(27, 'PUNJAB'),
(28, 'PONDICHERRY'),
(29, 'RAJASTHAN'),
(30, 'SIKKIM'),
(31, 'TAMIL NADU'),
(32, 'TRIPURA'),
(33, 'UTTARAKHAND'),
(34, 'UTTAR PRADESH'),
(35, 'WEST BENGAL'),
(36, 'TELANGANA');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advocate_info`
--
ALTER TABLE `advocate_info`
  ADD PRIMARY KEY (`a_slno`),
  ADD UNIQUE KEY `a_email` (`a_email`),
  ADD UNIQUE KEY `a_regd` (`a_regd`),
  ADD UNIQUE KEY `a_phn` (`a_phn`);

--
-- Indexes for table `casefiling`
--
ALTER TABLE `casefiling`
  ADD PRIMARY KEY (`filingno`),
  ADD UNIQUE KEY `filingno` (`filingno`),
  ADD UNIQUE KEY `slno` (`slno`);

--
-- Indexes for table `case_history`
--
ALTER TABLE `case_history`
  ADD PRIMARY KEY (`slno`);

--
-- Indexes for table `case_info`
--
ALTER TABLE `case_info`
  ADD PRIMARY KEY (`slno`),
  ADD UNIQUE KEY `f_filingno` (`f_filingno`),
  ADD UNIQUE KEY `case_no` (`case_no`);

--
-- Indexes for table `court_list`
--
ALTER TABLE `court_list`
  ADD PRIMARY KEY (`slno`);

--
-- Indexes for table `judge_info`
--
ALTER TABLE `judge_info`
  ADD UNIQUE KEY `j_slno` (`j_slno`),
  ADD UNIQUE KEY `j_regd` (`j_regd`),
  ADD UNIQUE KEY `j_email` (`j_email`),
  ADD UNIQUE KEY `j_phn` (`j_phn`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`slno`);

--
-- Indexes for table `staff_info`
--
ALTER TABLE `staff_info`
  ADD PRIMARY KEY (`slno`),
  ADD UNIQUE KEY `s_regd` (`s_regd`),
  ADD UNIQUE KEY `s_email` (`s_email`);

--
-- Indexes for table `state_list`
--
ALTER TABLE `state_list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advocate_info`
--
ALTER TABLE `advocate_info`
  MODIFY `a_slno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `casefiling`
--
ALTER TABLE `casefiling`
  MODIFY `slno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `case_history`
--
ALTER TABLE `case_history`
  MODIFY `slno` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `case_info`
--
ALTER TABLE `case_info`
  MODIFY `slno` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `court_list`
--
ALTER TABLE `court_list`
  MODIFY `slno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `judge_info`
--
ALTER TABLE `judge_info`
  MODIFY `j_slno` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `slno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `staff_info`
--
ALTER TABLE `staff_info`
  MODIFY `slno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `state_list`
--
ALTER TABLE `state_list`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

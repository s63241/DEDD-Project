-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 24, 2018 at 02:31 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comment`
--

CREATE TABLE `tbl_comment` (
  `c_id` int(11) NOT NULL,
  `c_b1_id` int(11) NOT NULL COMMENT 'ไอดีผู้อำนวยการ',
  `c_per_id` int(11) NOT NULL COMMENT 'ไอดีเจ้าหน้าที่',
  `c_term` varchar(10) NOT NULL COMMENT 'รอบการประเมิน',
  `c_comment1` text COMMENT 'ข้อเสนอแนะ',
  `c_comment2` text COMMENT 'แนวทางพัฒนา',
  `c_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ตารางข้อเสนอแนะ';

--
-- Dumping data for table `tbl_comment`
--

INSERT INTO `tbl_comment` (`c_id`, `c_b1_id`, `c_per_id`, `c_term`, `c_comment1`, `c_comment2`, `c_date`) VALUES
(1, 7, 11, '1/2561', '', '', '2018-06-23 16:11:36'),
(2, 11, 11, '1/2561', '2', '3', '2018-06-23 16:14:19'),
(3, 7, 12, '1/2561', '3', '4', '2018-06-23 16:18:59'),
(4, 12, 12, '1/2561', 'dd', 'fff', '2018-06-23 16:19:51'),
(5, 7, 16, '1/2561', 'aaaaa', 'sssssss', '2018-06-23 16:23:43'),
(6, 16, 16, '1/2561', 'kkkOOOO', 'yyuuu', '2018-06-23 16:27:59'),
(7, 7, 7, '1/2561', 'SDDA', 'ADADADA', '2018-06-23 16:36:52'),
(8, 7, 18, '1/2561', 'aaa', 'bbb', '2018-06-24 11:48:51'),
(9, 18, 18, '1/2561', 'aaa', 'vvb', '2018-06-24 11:49:53'),
(10, 7, 19, '1/2561', '', '', '2018-06-24 11:54:48'),
(11, 19, 19, '1/2561', '', '', '2018-06-24 11:55:12'),
(12, 7, 15, '1/2561', 'jhjdkfkf', 'jkfkfkk', '2018-06-24 12:08:16'),
(13, 15, 15, '1/2561', 'ghsjdj', 'djdjj', '2018-06-24 12:11:12'),
(14, 7, 21, '1/2561', 'sgggsh', 'shsh', '2018-06-24 12:20:29'),
(15, 21, 21, '1/2561', '', '', '2018-06-24 12:26:12'),
(16, 7, 21, '2/2561', 'aaa', 'zzzz', '2018-06-24 12:29:52'),
(17, 21, 21, '2/2561', '', '', '2018-06-24 12:30:30');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complain`
--

CREATE TABLE `tbl_complain` (
  `c_id` int(11) NOT NULL,
  `ref_p_id` int(11) NOT NULL,
  `c_detail` text NOT NULL,
  `c_datesave` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ตารางรายงานคำร้อง';

--
-- Dumping data for table `tbl_complain`
--

INSERT INTO `tbl_complain` (`c_id`, `ref_p_id`, `c_detail`, `c_datesave`) VALUES
(2, 2, 'วันที่ 2', '2018-04-21 08:19:33');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_date_q`
--

CREATE TABLE `tbl_date_q` (
  `dq_id` int(11) NOT NULL,
  `dq_name` varchar(100) NOT NULL,
  `dq_date_start` date NOT NULL COMMENT 'เปิดรอบประเมิน',
  `dq_date_end` date NOT NULL COMMENT 'จบรอบประเมิน',
  `dq_date_open1` date DEFAULT NULL COMMENT 'วันเริ่มประเมิน',
  `dq_date_close1` date DEFAULT NULL COMMENT 'วันปิดประเมิน',
  `dq_date_open2` date DEFAULT NULL,
  `dq_date_close2` date DEFAULT NULL,
  `dq_date_open3` date DEFAULT NULL,
  `dq_date_close3` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ตารางช่วงการประเมิน';

--
-- Dumping data for table `tbl_date_q`
--

INSERT INTO `tbl_date_q` (`dq_id`, `dq_name`, `dq_date_start`, `dq_date_end`, `dq_date_open1`, `dq_date_close1`, `dq_date_open2`, `dq_date_close2`, `dq_date_open3`, `dq_date_close3`) VALUES
(1, '1/2561', '0000-00-00', '0000-00-00', '2018-06-01', '2018-06-30', '2018-06-01', '2018-06-30', '2018-06-01', '2018-06-30'),
(3, '2/2561', '0000-00-00', '0000-00-00', '2018-06-01', '2018-06-26', '2018-06-01', '2018-06-29', '2018-06-14', '2018-06-28');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_department`
--

CREATE TABLE `tbl_department` (
  `d_id` int(11) NOT NULL,
  `d_name` varchar(100) NOT NULL COMMENT 'ชื่อหน่วยงาน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_department`
--

INSERT INTO `tbl_department` (`d_id`, `d_name`) VALUES
(1, 'ส่วนงานบริการ กลุ่มงานเลขานุการและธุรการ'),
(2, 'กลุ่มงานอำนวยการและสื่อสารองค์กร'),
(3, 'กลุ่มงานส่งเสริมวิชาการ'),
(4, 'กลุ่มงานทะเบียนนักศึกษาและฐานข้อมูล');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_level`
--

CREATE TABLE `tbl_level` (
  `l_id` int(11) NOT NULL,
  `l_name` varchar(100) NOT NULL COMMENT 'ชื่อสิทธิเข้าใช้งาน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_level`
--

INSERT INTO `tbl_level` (`l_id`, `l_name`) VALUES
(1, 'ผู้ดูแล'),
(2, 'หัวหน้าสำนักงาน'),
(3, 'ผู้อำนวยการ'),
(4, 'เจ้าหน้าที่สำนักงาน');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news`
--

CREATE TABLE `tbl_news` (
  `n_id` int(11) NOT NULL,
  `n_title` varchar(200) NOT NULL,
  `n_detail` text NOT NULL,
  `n_img` varchar(100) NOT NULL,
  `n_file` varchar(100) DEFAULT NULL,
  `n_datesave` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_news`
--

INSERT INTO `tbl_news` (`n_id`, `n_title`, `n_detail`, `n_img`, `n_file`, `n_datesave`) VALUES
(2, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.1', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.1</p>\r\n', 'img62401076820180612_194056.jpg', 'doc125061925220180612_194108.jpg', '2018-06-12 12:11:22'),
(3, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', 'img33899161420180612_193151.png', 'doc24073755120180612_191322.png', '2018-06-12 12:13:22'),
(4, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.1', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', 'img138814884020180612_194244.jpg', 'doc138814884020180612_194244.png', '2018-06-12 12:42:44'),
(5, 'test', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', 'img138814884020180612_194244.jpg', 'doc138814884020180612_194244.png', '2018-06-12 12:42:44'),
(6, 'test sdsdsd', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', 'img138814884020180612_194244.jpg', 'doc138814884020180612_194244.png', '2018-06-12 12:42:44'),
(7, 'test sdsdsd', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', 'img138814884020180612_194244.jpg', 'doc138814884020180612_194244.png', '2018-06-12 12:42:44');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_personal`
--

CREATE TABLE `tbl_personal` (
  `p_id` int(11) NOT NULL,
  `ref_d_id` int(11) NOT NULL COMMENT 'ชื่อรหัสหน่วยงาน',
  `ref_l_id` int(11) NOT NULL COMMENT 'ชื่อรหัสสิทธิเข้าใช้งาน',
  `ref_po_id` int(11) NOT NULL COMMENT 'positon',
  `p_username` varchar(50) NOT NULL,
  `p_password` varchar(50) NOT NULL,
  `p_firstname` varchar(100) NOT NULL COMMENT 'คำนำหน้าชื่อ',
  `p_name` varchar(100) NOT NULL,
  `p_lastname` varchar(100) NOT NULL,
  `p_sex` varchar(50) NOT NULL,
  `p_phone` varchar(50) NOT NULL,
  `p_email` varchar(30) DEFAULT NULL,
  `p_address` varchar(255) DEFAULT NULL,
  `p_status` varchar(50) NOT NULL COMMENT 'สถานะ',
  `p_birthday` date DEFAULT NULL,
  `p_img` varchar(100) DEFAULT NULL,
  `p_datesave` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'วันที่เพิ่มขอมูล'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_personal`
--

INSERT INTO `tbl_personal` (`p_id`, `ref_d_id`, `ref_l_id`, `ref_po_id`, `p_username`, `p_password`, `p_firstname`, `p_name`, `p_lastname`, `p_sex`, `p_phone`, `p_email`, `p_address`, `p_status`, `p_birthday`, `p_img`, `p_datesave`) VALUES
(7, 1, 2, 3, '2', '2', 'นาย', 'พัชรดล', 'เอื้อนิธิรัตน์', 'หญิง', '999797889867', 'fdfdgafdfdfd@dssdadsa', 'fvcvsafccccccccccccccccc', 'ปฏิบัติการ', '2018-03-01', '169714201720180430_203202.jpg', '2018-04-21 10:02:14'),
(8, 1, 3, 3, '3', '3', 'นาย', 'ผอ.', ' ผอ.', 'ชาย', '990000000000', 'sdaasd@d22222s', 'fvcveeeeeeeeee', 'ลาออก', '2018-04-30', '189475938720180430_203826.jpg', '2018-04-21 10:03:06'),
(10, 1, 1, 1, 'a', 'a', 'นางสาว', 'ธัญธิชา', 'นิ่มนวล', 'ชาย', '000', 'sss@s', 'ggggg', 'ปฏิบัติการ', '2018-04-18', NULL, '2018-04-21 10:05:17'),
(11, 1, 4, 4, '5', '5', 'นางสาว', 'ชฏาพร', 'จูสิงห์', 'หญิง', '0891288827', 'u5811011802070@gmail.com', '-', 'ปฏิบัติการ', '2018-05-10', '194609152620180508_135445.jpg', '2018-05-08 06:54:31'),
(12, 1, 4, 4, '6', '6', 'นาย', 'กนกพล', 'อู่วงศ์เจริญ', 'หญิง', 'avav', 'savasa@gmail.com', 'egv', 'ปฏิบัติการ', '2561-09-07', '36858373620180509_222004.pdf', '2018-05-09 15:19:27'),
(13, 1, 4, 4, '7', '7', 'นาย', 'aaa', 'bbbb', 'หญิง', 'avav', 'savasa@gmail.com', 'egv', 'ปฏิบัติการ', '2561-09-07', '36858373620180509_222004.pdf', '2018-05-09 15:19:27'),
(14, 1, 4, 4, '8', '8', 'นาย', 'aaa88', 'bbbb88', 'หญิง', 'avav', 'savasa@gmail.com', 'egv', 'ปฏิบัติการ', '2561-09-07', '36858373620180509_222004.pdf', '2018-05-09 15:19:27'),
(15, 1, 4, 4, '9', '9', 'นาย', 'aaa88', 'bbbb88', 'หญิง', 'avav', 'savasa@gmail.com', 'egv', 'ปฏิบัติการ', '2561-09-07', '36858373620180509_222004.pdf', '2018-05-09 15:19:27'),
(16, 2, 4, 4, 'c', 'c', 'นาย', 'aaa88aaa', 'bbbb88aaa', 'หญิง', 'avav', 'savasa@gmail.com', 'egv', 'ปฏิบัติการ', '2561-09-07', '36858373620180509_222004.pdf', '2018-05-09 15:19:27'),
(17, 2, 4, 4, 'b', 'b', 'นาย', 'aaa88', 'bbbb88', 'หญิง', 'avav', 'savasa@gmail.com', 'egv', 'ปฏิบัติการ', '2561-09-07', '36858373620180509_222004.pdf', '2018-05-09 15:19:27'),
(18, 3, 4, 4, 'd', 'd', 'นาย', 'ddd', 'dddd', 'ชาย', 'avav', 'savasa@gmail.com', 'egv', 'ปฏิบัติการ', '2561-09-07', '36858373620180509_222004.pdf', '2018-05-09 15:19:27'),
(19, 4, 4, 4, 'e', 'e', 'นาย', 'ddd', 'dddd', 'ชาย', 'avav', 'savasa@gmail.com', 'egv', 'ปฏิบัติการ', '2561-09-07', '36858373620180509_222004.pdf', '2018-05-09 15:19:27'),
(20, 1, 4, 4, '9', '9', 'นางสาว', 'ชฏาพร', 'จูสิงห์', 'หญิง', '0891288827', 'u5811011802070@gmail.com', '-', 'ปฏิบัติการ', '2018-05-10', '194609152620180508_135445.jpg', '2018-05-08 06:54:31'),
(21, 1, 4, 4, '11', '11', 'นางสาว', 'ชฏาพร33', 'จูสิงห์33', 'หญิง', '0891288827', 'u5811011802070@gmail.com', '-', 'ปฏิบัติการ', '2018-05-10', '194609152620180508_135445.jpg', '2018-05-08 06:54:31');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_position`
--

CREATE TABLE `tbl_position` (
  `po_id` int(11) NOT NULL,
  `po_name` varchar(100) NOT NULL COMMENT 'ชื่อตำแหน่ง'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_position`
--

INSERT INTO `tbl_position` (`po_id`, `po_name`) VALUES
(1, 'ผู้ดูแล'),
(2, 'หัวหน้าสำนักงาน'),
(3, 'ผู้อำนวยการ'),
(4, 'เจ้าหน้าที่สำนักงาน');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_q1`
--

CREATE TABLE `tbl_q1` (
  `q1_id` int(11) NOT NULL,
  `ref_qt_id` int(11) NOT NULL COMMENT 'รหัสประเภทคำถาม',
  `q1_number` int(11) NOT NULL,
  `q1_score_rank` float(10,2) NOT NULL,
  `q1_score_rank_max` float(10,2) NOT NULL,
  `q1_detail` text NOT NULL,
  `q1_datesave` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ตารางคำถามชุดที่1';

--
-- Dumping data for table `tbl_q1`
--

INSERT INTO `tbl_q1` (`q1_id`, `ref_qt_id`, `q1_number`, `q1_score_rank`, `q1_score_rank_max`, `q1_detail`, `q1_datesave`) VALUES
(1, 1, 1, 0.00, 3.00, 'ปฏิบัติงานตามปริมาณงานน้อยมากกว่าข้อตกลงที่กำหนดไว้', '2018-05-02 17:28:29'),
(2, 1, 2, 4.00, 6.00, 'ปฏิบัติงานได้ปริมาณงานน้อยกว่าข้อตกลงเกี่ยวกับภาระงานที่กำหนดไว้', '2018-05-02 17:29:29'),
(3, 1, 3, 7.00, 9.00, 'ปฏิบัติงานได้ปริมาณงานตามที่กำหนดไว้ในข้อตกลงเกี่ยวกับภาระงาน', '2018-05-02 17:30:34'),
(4, 1, 4, 10.00, 12.00, 'ปฏิบัติงานได้ปริมาณงานมากกว่าตามที่กำหนดไว้ในข้อตกลงเกี่ยวกับภาระงาน', '2018-05-02 17:31:57'),
(5, 1, 5, 13.00, 15.00, 'ปฏิบัติงานได้ปริมาณงานมากกว่าตามที่กำหนดไว้ในข้อตกลงเกี่ยวกับภาระงานและนอกเหนือจากภาระงาน', '2018-05-02 17:33:04'),
(6, 2, 1, 0.00, 3.00, 'ผลการปฏิบัติงานมีข้อผิดพลาดทุกครั้งแต่มีความพยายามแก้ไขปรับปรุง', '2018-05-02 17:34:11'),
(7, 2, 2, 4.00, 6.00, 'ผลการปฏิบัติงานมีข้อผิดพลาดบ่อยแต่แก้ไขปรับปรุงได้ทันที', '2018-05-02 17:34:52'),
(8, 2, 3, 7.00, 9.00, 'ผลการปฏิบัติงานอยู่ในเกณฑ์พอใช้', '2018-05-02 17:35:18'),
(9, 2, 4, 10.00, 12.00, 'ผลการปฏิบัติงานอยู่ในเกณฑ์มาตรฐาน ถูกต้อง ครบถ้วน', '2018-05-02 17:35:47'),
(10, 2, 5, 13.00, 15.00, 'ผลการปฏิบัติงานอยู่ในเกณฑ์มาตรฐาน ถูกต้อง ครบถ้วน ผลงานโดดเด่นและสามารถเป็นตัวอย่างได้', '2018-05-02 17:36:24'),
(11, 3, 1, 0.00, 3.00, 'สามารถปฏิบัติงานได้แต่บรรลุเป้าหมายโดยเลยกำหนดระยะเวลาทุกครั้ง', '2018-05-02 17:38:25'),
(12, 3, 2, 4.00, 6.00, 'สามารถปฏิบัติงานบรรลุเป้าหมายได้ตามกำหนดระยะเวลาเป็นบางครั้ง', '2018-05-02 17:39:30'),
(13, 3, 3, 7.00, 9.00, 'สามารถปฏิบัติงานบรรลุเป้าหมายได้ตามกำหนดระยะเวลาอย่างสม่ำเสมอ', '2018-05-02 17:39:52'),
(14, 3, 4, 10.00, 12.00, 'สามารถปฏิบัติงานบรรลุเป้าหมายตามกำหนดระยะเวลาทุกครั้งหรือเร็วกว่ากำหนด', '2018-05-02 17:40:34'),
(15, 3, 5, 13.00, 15.00, 'สามารถปฏิบัติการวางแผนการทำงานและดำเนินงานจนบรรลุเป้าหมายตามกำหนดระยะเวลาทุกครั้งหรือเร็วกว่ากำหนด', '2018-05-02 17:42:14'),
(16, 4, 1, 0.00, 3.00, 'แสดงความกระตือรือร้น และมุ่งผลสัมฤทธิ์ได้น้อยมากกว่าเกณฑ์มาตราฐาน', '2018-05-02 17:44:30'),
(17, 4, 2, 4.00, 6.00, 'แสดงความมุ่งมั่นและกระตือรือร้นที่จะสามารถปฏิบัติงานได้น้อยกว่าเกณฑ์มาตรฐาน', '2018-05-02 17:45:47'),
(18, 4, 3, 7.00, 9.00, 'แสดงความมุ่งมั่นและกระตือรือร้นที่จะสามารถปฏิบัติงานได้ตามเกณฑ์มาตรฐาน', '2018-05-02 17:47:15'),
(19, 4, 4, 10.00, 12.00, 'แสดงความมุ่งมั่นและกระตือรือร้นที่จะปรับปรุงและพัฒนาการปฏิบัติงานให้มีประสิทธิภาพขึ้นอยู่เสมอ', '2018-05-02 17:48:19'),
(20, 4, 5, 13.00, 15.00, 'แสดงความมุ่งมั่นและกระตือรือร้นในการวางแผนการปฏิบัติงานเพื่อให้บรรลุเป้าหมายได้เกินมาตรฐาน', '2018-05-02 17:49:34'),
(21, 5, 1, 0.00, 10.00, 'ผลสัมฤทธิ์ของงานตามภาระงานเพิ่มเติม', '2018-05-02 17:51:26');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_q1_group`
--

CREATE TABLE `tbl_q1_group` (
  `qt_id` int(11) NOT NULL,
  `qt_name` varchar(100) NOT NULL,
  `qt_detail` text NOT NULL COMMENT 'หัวข้อรายละเอียด'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ประเภทคำถาม';

--
-- Dumping data for table `tbl_q1_group`
--

INSERT INTO `tbl_q1_group` (`qt_id`, `qt_name`, `qt_detail`) VALUES
(1, 'ปริมาณงาน', 'ปริมาณงานที่ได้รับจากการปฏิบัติงานเทียบกับภาระงานที่ได้รับ'),
(2, 'คุณภาพของงาน', 'ความถูกต้อง ครบถ้วน สมบูรณ์ ได้มาตรฐานผลงานโดดเด่นและเป็นตัวอย่าง'),
(3, 'ความทันเวลา', 'เวลาที่ใช้ในปฏิบัติงานเทียบกับเวลาที่กำหนดสำหรับงานนั้น'),
(4, 'ความมุ่งผลสัมฤทธิ์', 'ความมุ่งมั่นจะปฏิบัติงานให้ดี หรือเกินมาตรฐานที่มีอยู่'),
(5, 'ผลสัมฤทธิ์ของงานตามภาระงานเพิ่มเติม', '-');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_q2`
--

CREATE TABLE `tbl_q2` (
  `q2_id` int(11) NOT NULL,
  `ref_qg2_id` int(11) NOT NULL COMMENT 'รหัสประเภทชุดที่2',
  `q2_number` int(11) NOT NULL,
  `q2_detail` text NOT NULL,
  `q2_score_rank` float(10,2) NOT NULL COMMENT 'ช่องเพิ่มคะแนน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='คำถามชุดที่2';

--
-- Dumping data for table `tbl_q2`
--

INSERT INTO `tbl_q2` (`q2_id`, `ref_qg2_id`, `q2_number`, `q2_detail`, `q2_score_rank`) VALUES
(1, 1, 1, 'มีบุคลิกภาพดี มีความเป็นระเบียบ และประพฤติตนเหมาะสมตามแบบอย่างคนสวนดุสิต', 0.30),
(2, 1, 2, 'ดำรงตนอย่างมีศักดิ์ศรี และมีคุณค่าทั้งต่อสังคมภายในมหาวิทยาลัยและสังคมภายนอก', 0.30),
(3, 1, 3, 'ทำงานทุกอย่างได้สวยความประณีต มีมาตรฐาน และรู้จริงในสิ่งที่ทำ', 0.30),
(4, 1, 4, 'แสดงความเป็นผู้นำได้อย่างเหมาะสมในทุกสถานการณ์', 0.20),
(5, 1, 5, 'มีสัมมาคารวะ และนอบน้อมถ่อมตน', 0.30),
(6, 1, 6, 'เสียสละ เอื้ออาทร ใส่ใจและห่วงใยเพื่อนร่วมงานและบุคคลอื่นๆ', 0.30),
(7, 1, 7, 'มีความรัก ความเข้าใจ เชื่อมั่นและศรัทธาในมหาวิทยาลัย ไม่กระทำการใดๆ อันนำมาซึ่งความเสื่อมเสียต่อภาพลักษณ์ของมหาวิทยาลัย', 0.50),
(8, 1, 8, 'มีส่วนร่วมในการดำเนินงานของมหาวิทยาลัยตามภาระหน้าที่แห่งตนเต็มศักยภาพ มุ่งมั่น ทุ่มเท และร่วมแรงร่วมใจเป็นหนึ่งเดียว', 0.30),
(9, 1, 9, 'แสดงความเป็นสวนดุสิตให้ปรากฎต่อสาธารณะทั้งภายในและภายนอกมหาวิทยาลัยจนเป็นที่ประจักษ์', 0.50),
(10, 2, 1, 'กำหนดเป้าหมายผลการปฏิบัติงานไว้สูงกว่ามาตรฐานปกติ วางแผนการดำเนินงานอย่างเป็นระบบ รอบคอบ รัดกุม และพยายามดำเนินตามขั้นตอนที่กำหนดไว้ ด้วยความเสียสละ อดทน มั่งมั่น', 0.50),
(11, 2, 2, 'ตรวจสอบและประเมินผลการปฏิบัติงานอย่างต่อเนื่อง เป็นระบบและนำผลกระบวนการดำเนินงานให้ดียิ่งขึ้น', 0.50),
(12, 2, 3, 'เพิ่มระดับมาตรฐานผลการปฏิบัติงานอย่างเป็นพลวัตร และพัฒนากระบวนการดำเนินงานให้เหมาะสมอยู่ตลอดเวลา เพื่อผลงานที่เป็นเลิศตามพลวัตรที่เปลี่ยนไป', 0.50),
(13, 2, 4, 'สนใจใฝ่ศึกษาหาความรู้และเทคโนโลยีใหม่ๆมาใช้ในการดำเนินงานอยู่เสมอ', 0.50),
(14, 3, 1, 'ศึกษาพัฒนาตนเองให้มีความรู้และความเชี่ยวชาญในวิทยากรและเทคโนโลยีต่างๆที่เกี่ยวกับวิชาชีพและที่เกี่ยวข้องอย่างต่อเนื่องในรูปแบบที่หลากหลาย อาทิการฝึกอบรม การศึกษาต่อ การศึกษาวิจัย หรือการค้นคว้าด้วยตนเอง เป็นต้น', 0.40),
(15, 3, 2, 'สามารถประยุกต์ใช้องค์ความรู้และเทคโนโลยีใหม่ๆในการปฏิบัติงานในหน้าที่ และสามารถแก้ปัญหาที่อาจเกิดขึ้น', 0.40),
(16, 3, 3, 'แสดงความรู้ในองค์ความรู้ และเทคโนโลยีใหม่ๆที่มีผลกระทบต่อการปฏิบัติงานในหน้าที่ของตน', 0.40),
(17, 3, 4, 'พัฒนาตนเองให้มีความก้าวหน้า ในตำแหน่งตามสาขาวิชาชีพ(Career Path) อย่างยต่อเนื่องจนสามารถเป็นแบบอย่างที่ดีแก่บุคคลอื่นได้', 0.40),
(18, 3, 5, 'สนับสนุนให้มีคนอื่นๆได้ความรู้ และความเชี่ยวชาญในสาขาวิชาชีพที่ตนเชี่ยวชาญ อาจจะเป็นลักษณะของการเป็นพี่เลี้ยงสอนงานหรือเป็นวิทยากร หรืออื่นๆ', 0.40),
(19, 4, 1, 'ประสานบุคคล หน่วยงาน หรือองค์กรทั้งภายในและภายนอกมหาวิทยาลัย และบุคคล  หน่วยงาน หรือองค์กรระหว่างประเทศ เพื่อปฏิบัติงานตามภารกิจของมหาวิทยาลัยให้สำเร็จลุล่วงอย่างมีประสิทธิภาพและประสิทธิผล', 1.50),
(20, 4, 2, 'ทำงานร่วมกันในลักษณะทีมงาน มีการกำหนดเป้าหมายของทีม และแบ่งภาระหน้าที่รับผิดชอบที่ชัดเจนของสมาชิกแต่ละคน ร่วมแรงร่วมใจกันดำเนินงานตามภาระหน้าที่รับผิดชอบอย่างเต็มที่ มีการติดตามตรวจสอบการประเมินผลการดำเนินงาน และพัฒนากระบวนการทำงาน จนภารกิจสำเร็จลุล่วงตามเป้าหมาย', 1.50),
(21, 5, 1, 'บุคลากรของมหาวิทยาลัยสวนดุสิตทุกคนทุกระดับต้องมีวินัยในตนเอง และรับผิดชอบตนเองให้อยู่ในกรอบของกฎหมาย และกฎระเบียบต่างๆ ที่เกี่ยวข้องกับการปฏิบัติหน้าที่ตามสาขาวิชาชีพของตนอย่างเคร่งครัด และประพฤติปฏิบัติตนอยู่ในกรอบของคุณธรรมจริยธรรมที่ดีงาม ตลอดจนการดำเนินตามกรอบของจรรยาบรรณในวิชาชีพแห่งตน จนสมารถเป็นแบบอย่างได้', 1.50),
(22, 5, 2, 'รักษาเกียรติและศักดิ์ศรีแห่งวิชาชีพของตน ไม่ประพฤติปฏิบัติตนให้เป็นที่เสื่อมเสีย หรือเกิดความด่างพร้อยซึ่งส่งผลกระทบต่อวิชาชีพ และมหาวิทยาลัยโดยส่วนรวม', 1.50),
(23, 6, 1, 'เรียนรู้และทำความเข้าใจในประวัติความเป็นมาปรัชญา วิสัยทัศน์ พันธกิจ และกลยุทธ์ของมหาวิทยาลัย', 0.50),
(24, 6, 2, 'เข้าใจโครงสร้างของมหาวิทยาลัย และมองเห็นความสัมพันธ์ระหว่างงานในหน้าที่ของตนและหน่วยงานที่ตนสังกัดกับงาน และหน่วยงานอื่นๆ ของมหาวิทยาลัย จนสามารถประสานเชื่อมโยง และทำงานร่วมกันได้เป็นอย่างดี ซึ่งทำให้เกิดผลดีต่อการปฏิบัติงานของมหาวิทยาลัยโดยภาพรวม', 0.50),
(25, 6, 3, 'เรียนรู้และทำความเข้าใจ กฏระเบียบต่างๆอันจำเป็นที่แต่ละคนต้องปฏิบัติ อีกทั้งสามารถปรับตัวให้เข้ากับสังคม และวัฒนธรรมของมหาวิทยาลัย เพื่อความถูกต้องต่องาน และเพื่อการอยู่ร่วมกันอย่างมีความสุข', 0.50),
(26, 6, 4, 'ติดตามความเคลื่อนไหวในด้านต่างๆของมหาวิทยาลัยตลอดเวลา และสามารถตอบคำถามหรือให้ข้อมูลต่อสาธารณะเกี่ยวกับมหาวิทยาลัยได้อย่างถูกต้อง', 0.50);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_q2_group`
--

CREATE TABLE `tbl_q2_group` (
  `qg2_id` int(11) NOT NULL,
  `qg2_name` varchar(100) NOT NULL,
  `qg2_detail` text NOT NULL,
  `qg2_fullscore` int(11) NOT NULL COMMENT 'คะแนนเต็ม',
  `qg2_score_rank` float(10,2) NOT NULL COMMENT 'score_rank'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_q2_group`
--

INSERT INTO `tbl_q2_group` (`qg2_id`, `qg2_name`, `qg2_detail`, `qg2_fullscore`, `qg2_score_rank`) VALUES
(1, 'ความเป็นสวนดุสิต (Suan Dusit Spirit)', '-', 3, 3.00),
(2, 'ความมุ่งมั่นสู่ความสำเร็จที่เป็นเลิศ (Utmost)', '-', 2, 2.00),
(3, 'การสั่งสมความเชียวชาญในวิชาชีพ (Accumulate Knowledge and Skills to Expert)', '-', 2, 2.00),
(4, 'การสร้างเครือข่ายพันธมิตรและทีมงาน (Networking and Teamwork)', '-', 3, 3.00),
(5, 'การดำรงตนบนฐานของวินัย คุณธรรม จริยธรรม และจรรยาบรรณวิชาชีพ (Discipline and Ethic)', '-', 3, 3.00),
(6, 'ความเข้าใจมหาวิทยาลัย (Understanding of the University)', '-', 2, 2.00);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_q3`
--

CREATE TABLE `tbl_q3` (
  `q3_id` int(11) NOT NULL,
  `ref_qg3_id` int(11) NOT NULL COMMENT 'รหัสประเภทชุดที่2',
  `ref_d_id` int(11) DEFAULT NULL,
  `q3_number` int(11) NOT NULL,
  `q3_detail` text NOT NULL,
  `q3_score_rank` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='คำถามชุดที่2';

--
-- Dumping data for table `tbl_q3`
--

INSERT INTO `tbl_q3` (`q3_id`, `ref_qg3_id`, `ref_d_id`, `q3_number`, `q3_detail`, `q3_score_rank`) VALUES
(2, 1, 1, 1, 'จิตสำนึกการให้บริการ', 1.50),
(7, 1, 1, 2, 'ความกระตือรือร้น', 1.50),
(8, 1, 1, 3, 'การทำงานเป็นทึม', 1.50),
(9, 1, 1, 4, 'การติดตามงาน', 1.50),
(10, 1, 1, 5, 'บุคลิกภาพ', 1.50),
(12, 1, 1, 6, 'ความละเอียดรอบคอบ', 1.50),
(13, 1, 2, 1, 'งานสารบรรณ', 1.50),
(14, 1, 2, 2, 'การประชุม', 1.50),
(16, 1, 2, 3, 'การเงินและพัสดุ', 1.50),
(17, 1, 2, 4, 'การติดต่อประสานงาน', 1.50),
(18, 1, 2, 5, 'ความสามารถในการใช้คอมพิวเตอร์', 1.50),
(19, 1, 2, 6, 'ความละเอียดรอบคอบ', 1.50),
(20, 1, 3, 1, 'การบริหารจัดการรายงานและเอกสาร', 1.50),
(21, 1, 3, 2, 'ความละเอียดรอบคอบ', 3.00),
(22, 1, 3, 3, 'การปฏิบัติงานตามกฏระเบียบและข้อบังคับ', 1.50),
(23, 1, 3, 4, 'การติดต่อประสานงาน', 1.50),
(24, 1, 3, 5, 'ความเข้าใจในระบบและขั้นตอนการทำงาน', 1.50),
(25, 1, 4, 1, 'การบริหารจัดการฐานข้อมูล', 2.00),
(26, 1, 4, 2, 'ความสามารถในการใช้คอมพิวเตอร์', 1.50),
(27, 1, 4, 3, 'ความละเอียดรอบคอบ', 1.50),
(28, 1, 4, 4, 'การปรับปรุงกระบวนการทำงาน', 1.50),
(29, 1, 4, 5, 'การคิดเชิงวิเคราะห์', 1.50),
(30, 1, 4, 6, 'จรรยาบรรณและความซื่อสัตย์', 1.00),
(31, 2, 0, 1, 'บุคลากรของมหาวิทยาลัยทุกคนสามารถใช้กระบวนการจัดการความรู้ในสายวิชาชีพของตนจนเกิดองค์ความรู้ที่สามารถนำไปใช้เป็นฐานในการคิดเชิงจินตนาการ', 1.50),
(32, 2, 0, 2, 'บุคลากรสามารถนำองค์ความรู้ที่เป็นความคิดเชิงจินตนาการไปสู่การปฏิบัติจริงจนเกิดผลผลิตเชิงนวัตกรรมอันเป็นองค์ความรู้ใหม่ที่ใช้ได้ผลจริง ซึ่งสามารถสร้างความก้าวหน้าในวิชาชีพของตนอย่างต่อเนื่อง', 1.50),
(33, 3, 1, 1, 'บุคลากรของมหาวิทยาลัยสามารถปฏิบัติตนเองให้สอดคล้องกับระบบเทคโนโลยีต่างๆ ของมหาวิทยาลัยเพื่อประโยชน์ต่อตัวบุคลากรเอง และการปฏิบัติงานในหน้าที่ เช่น ระบบ e-Office, e-Profile ระบบการเรียนการสอนโดยการใช้สื่ออีเล็กทรอนิกส์ เป็นต้น ', 1.50),
(34, 3, 1, 2, 'พัฒนาระบบ หรือเครื่องมือที่เป็นสื่ออีเล็กทรอนิกส์ เพื่อใช้ในการปฏิบัติงานในหน้าที่ของตน เช่น e-Book เป็นต้น', 1.50);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_q3_group`
--

CREATE TABLE `tbl_q3_group` (
  `qg3_id` int(11) NOT NULL,
  `qg3_name` varchar(150) NOT NULL,
  `qg3_detail` text NOT NULL,
  `qg3_fullscore` int(11) NOT NULL COMMENT 'คะแนนเต็ม'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_q3_group`
--

INSERT INTO `tbl_q3_group` (`qg3_id`, `qg3_name`, `qg3_detail`, `qg3_fullscore`) VALUES
(1, 'ความรู้และทักษะที่จำเป็นสำหรับการปฏิบัติงานตามหน้าที่รับผิดชอบ (Specific Knowledge and Skills for Job)', '-', 9),
(2, 'การพัฒนานวัตกรรมจากฐานความรู้ (Innovative Thinking)', '-', 3),
(3, 'การประยุกต์ใช้เทคโนโลยีในการปฏิบัติงาน (Technology Application)', '-', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reason_chk_score`
--

CREATE TABLE `tbl_reason_chk_score` (
  `rc_id` int(11) NOT NULL,
  `ref_p_id` int(11) NOT NULL COMMENT 'รหัสพนง.ที่ถูกเปลี่ยนคะแนน',
  `ref_h_id` int(11) NOT NULL COMMENT 'รหัสหัวหน้า',
  `rc_group` int(11) NOT NULL COMMENT 'ชุดคะแนน',
  `rc_term` varchar(11) NOT NULL,
  `rc_resason` text NOT NULL,
  `re_datesave` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='เหตุผลที่เปลี่ยนคะแนน';

--
-- Dumping data for table `tbl_reason_chk_score`
--

INSERT INTO `tbl_reason_chk_score` (`rc_id`, `ref_p_id`, `ref_h_id`, `rc_group`, `rc_term`, `rc_resason`, `re_datesave`) VALUES
(1, 11, 8, 3, '1/2561', '1', '2018-06-23 16:14:19'),
(2, 12, 7, 1, '1/2561', '1', '2018-06-23 16:18:32'),
(3, 12, 7, 2, '1/2561', '2', '2018-06-23 16:18:44'),
(4, 12, 7, 3, '1/2561', '2', '2018-06-23 16:18:59'),
(5, 12, 8, 1, '1/2561', 'aa', '2018-06-23 16:19:35'),
(6, 12, 8, 2, '1/2561', 'bb', '2018-06-23 16:19:42'),
(7, 12, 8, 3, '1/2561', 'cc', '2018-06-23 16:19:51'),
(8, 16, 7, 1, '1/2561', 'aaaa', '2018-06-23 16:23:25'),
(9, 16, 7, 2, '1/2561', 'ccc', '2018-06-23 16:23:32'),
(10, 16, 7, 3, '1/2561', 'ddd', '2018-06-23 16:23:43'),
(11, 7, 8, 1, '1/2561', 'bbbbb', '2018-06-23 16:36:37'),
(12, 18, 7, 1, '1/2561', 'not bad ', '2018-06-24 11:48:15'),
(13, 18, 7, 2, '1/2561', 'good', '2018-06-24 11:48:29'),
(14, 15, 7, 1, '1/2561', 'geheh', '2018-06-24 12:07:07'),
(15, 15, 7, 2, '1/2561', 'dhdhjj', '2018-06-24 12:07:35'),
(16, 15, 8, 1, '1/2561', 'zhhsjjjd', '2018-06-24 12:10:33'),
(17, 21, 7, 1, '2/2561', 'good', '2018-06-24 12:29:31');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_score`
--

CREATE TABLE `tbl_score` (
  `s_id` int(11) NOT NULL,
  `ref_p_id` int(11) NOT NULL COMMENT 'รหัสพนักาน',
  `ref_dq_id` varchar(20) NOT NULL COMMENT 'รหัสช่วงประเมิน',
  `ref_qt_id` int(11) NOT NULL COMMENT 'รหัส',
  `ref_q1_number` int(11) NOT NULL,
  `s_ip1` varchar(50) NOT NULL,
  `s_p_id_1` int(11) NOT NULL COMMENT 'รหัสเจ้าหน้าที่',
  `s_dateq1` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'วันที่ประเมินตนเอง',
  `s_ip2` varchar(50) NOT NULL,
  `s_p_id_2` int(11) NOT NULL,
  `s_dateq2` datetime DEFAULT NULL,
  `s_status` int(11) NOT NULL DEFAULT '0' COMMENT 'ข้อมูลการอนุมัติ',
  `s_ip3` varchar(50) NOT NULL,
  `s_p_id_3` int(11) NOT NULL,
  `s_group_no` int(11) NOT NULL COMMENT 'ชุดแบบสอบถาม',
  `s_dateq3` datetime DEFAULT NULL,
  `s_score` float(10,2) NOT NULL DEFAULT '0.00',
  `skey` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ตารางเก็บคะแนน';

--
-- Dumping data for table `tbl_score`
--

INSERT INTO `tbl_score` (`s_id`, `ref_p_id`, `ref_dq_id`, `ref_qt_id`, `ref_q1_number`, `s_ip1`, `s_p_id_1`, `s_dateq1`, `s_ip2`, `s_p_id_2`, `s_dateq2`, `s_status`, `s_ip3`, `s_p_id_3`, `s_group_no`, `s_dateq3`, `s_score`, `skey`) VALUES
(1, 11, '1/2561', 0, 1, '127.0.0.1', 11, '2018-06-23 16:08:06', '127.0.0.1', 7, '2018-06-23 18:11:36', 0, '127.0.0.1', 11, 1, '0000-00-00 00:00:00', 0.00, '111/2561201806231810'),
(2, 11, '1/2561', 0, 2, '127.0.0.1', 11, '2018-06-23 16:08:06', '127.0.0.1', 7, '2018-06-23 18:11:36', 0, '127.0.0.1', 11, 1, '0000-00-00 00:00:00', 0.00, '111/2561201806231810'),
(3, 11, '1/2561', 0, 3, '127.0.0.1', 11, '2018-06-23 16:08:06', '127.0.0.1', 7, '2018-06-23 18:11:36', 0, '127.0.0.1', 11, 1, '0000-00-00 00:00:00', 0.00, '111/2561201806231810'),
(4, 11, '1/2561', 0, 4, '127.0.0.1', 11, '2018-06-23 16:08:06', '127.0.0.1', 7, '2018-06-23 18:11:36', 0, '127.0.0.1', 11, 1, '0000-00-00 00:00:00', 0.00, '111/2561201806231810'),
(5, 11, '1/2561', 0, 5, '127.0.0.1', 11, '2018-06-23 16:08:06', '127.0.0.1', 7, '2018-06-23 18:11:36', 0, '127.0.0.1', 11, 1, '0000-00-00 00:00:00', 13.00, '111/2561201806231810'),
(6, 11, '1/2561', 0, 6, '127.0.0.1', 11, '2018-06-23 16:08:06', '127.0.0.1', 7, '2018-06-23 18:11:36', 0, '127.0.0.1', 11, 1, '0000-00-00 00:00:00', 0.00, '111/2561201806231810'),
(7, 11, '1/2561', 0, 7, '127.0.0.1', 11, '2018-06-23 16:08:06', '127.0.0.1', 7, '2018-06-23 18:11:36', 0, '127.0.0.1', 11, 1, '0000-00-00 00:00:00', 0.00, '111/2561201806231810'),
(8, 11, '1/2561', 0, 8, '127.0.0.1', 11, '2018-06-23 16:08:06', '127.0.0.1', 7, '2018-06-23 18:11:36', 0, '127.0.0.1', 11, 1, '0000-00-00 00:00:00', 0.00, '111/2561201806231810'),
(9, 11, '1/2561', 0, 9, '127.0.0.1', 11, '2018-06-23 16:08:06', '127.0.0.1', 7, '2018-06-23 18:11:36', 0, '127.0.0.1', 11, 1, '0000-00-00 00:00:00', 0.00, '111/2561201806231810'),
(10, 11, '1/2561', 0, 10, '127.0.0.1', 11, '2018-06-23 16:08:06', '127.0.0.1', 7, '2018-06-23 18:11:36', 0, '127.0.0.1', 11, 1, '0000-00-00 00:00:00', 13.00, '111/2561201806231810'),
(11, 11, '1/2561', 0, 11, '127.0.0.1', 11, '2018-06-23 16:08:06', '127.0.0.1', 7, '2018-06-23 18:11:36', 0, '127.0.0.1', 11, 1, '0000-00-00 00:00:00', 0.00, '111/2561201806231810'),
(12, 11, '1/2561', 0, 12, '127.0.0.1', 11, '2018-06-23 16:08:06', '127.0.0.1', 7, '2018-06-23 18:11:36', 0, '127.0.0.1', 11, 1, '0000-00-00 00:00:00', 0.00, '111/2561201806231810'),
(13, 11, '1/2561', 0, 13, '127.0.0.1', 11, '2018-06-23 16:08:06', '127.0.0.1', 7, '2018-06-23 18:11:36', 0, '127.0.0.1', 11, 1, '0000-00-00 00:00:00', 0.00, '111/2561201806231810'),
(14, 11, '1/2561', 0, 14, '127.0.0.1', 11, '2018-06-23 16:08:06', '127.0.0.1', 7, '2018-06-23 18:11:36', 0, '127.0.0.1', 11, 1, '0000-00-00 00:00:00', 0.00, '111/2561201806231810'),
(15, 11, '1/2561', 0, 15, '127.0.0.1', 11, '2018-06-23 16:08:06', '127.0.0.1', 7, '2018-06-23 18:11:36', 0, '127.0.0.1', 11, 1, '0000-00-00 00:00:00', 13.00, '111/2561201806231810'),
(16, 11, '1/2561', 0, 16, '127.0.0.1', 11, '2018-06-23 16:08:06', '127.0.0.1', 7, '2018-06-23 18:11:36', 0, '127.0.0.1', 11, 1, '0000-00-00 00:00:00', 0.00, '111/2561201806231810'),
(17, 11, '1/2561', 0, 17, '127.0.0.1', 11, '2018-06-23 16:08:06', '127.0.0.1', 7, '2018-06-23 18:11:36', 0, '127.0.0.1', 11, 1, '0000-00-00 00:00:00', 0.00, '111/2561201806231810'),
(18, 11, '1/2561', 0, 18, '127.0.0.1', 11, '2018-06-23 16:08:06', '127.0.0.1', 7, '2018-06-23 18:11:36', 0, '127.0.0.1', 11, 1, '0000-00-00 00:00:00', 0.00, '111/2561201806231810'),
(19, 11, '1/2561', 0, 19, '127.0.0.1', 11, '2018-06-23 16:08:06', '127.0.0.1', 7, '2018-06-23 18:11:36', 0, '127.0.0.1', 11, 1, '0000-00-00 00:00:00', 0.00, '111/2561201806231810'),
(20, 11, '1/2561', 0, 20, '127.0.0.1', 11, '2018-06-23 16:08:06', '127.0.0.1', 7, '2018-06-23 18:11:36', 0, '127.0.0.1', 11, 1, '0000-00-00 00:00:00', 13.00, '111/2561201806231810'),
(21, 11, '1/2561', 0, 21, '127.0.0.1', 11, '2018-06-23 16:08:06', '127.0.0.1', 7, '2018-06-23 18:11:36', 0, '127.0.0.1', 11, 1, '0000-00-00 00:00:00', 10.00, '111/2561201806231810'),
(22, 11, '1/2561', 0, 1, '127.0.0.1', 11, '2018-06-23 16:09:34', '', 7, '2018-06-23 18:11:36', 0, '', 0, 2, NULL, 0.20, '111/2561201806231810'),
(23, 11, '1/2561', 0, 2, '127.0.0.1', 11, '2018-06-23 16:09:34', '', 7, '2018-06-23 18:11:36', 0, '', 0, 2, NULL, 0.20, '111/2561201806231810'),
(24, 11, '1/2561', 0, 3, '127.0.0.1', 11, '2018-06-23 16:09:34', '', 7, '2018-06-23 18:11:36', 0, '', 0, 2, NULL, 0.20, '111/2561201806231810'),
(25, 11, '1/2561', 0, 4, '127.0.0.1', 11, '2018-06-23 16:09:34', '', 7, '2018-06-23 18:11:36', 0, '', 0, 2, NULL, 0.20, '111/2561201806231810'),
(26, 11, '1/2561', 0, 5, '127.0.0.1', 11, '2018-06-23 16:09:34', '', 7, '2018-06-23 18:11:36', 0, '', 0, 2, NULL, 0.20, '111/2561201806231810'),
(27, 11, '1/2561', 0, 6, '127.0.0.1', 11, '2018-06-23 16:09:34', '', 7, '2018-06-23 18:11:36', 0, '', 0, 2, NULL, 0.20, '111/2561201806231810'),
(28, 11, '1/2561', 0, 7, '127.0.0.1', 11, '2018-06-23 16:09:34', '', 7, '2018-06-23 18:11:36', 0, '', 0, 2, NULL, 0.20, '111/2561201806231810'),
(29, 11, '1/2561', 0, 8, '127.0.0.1', 11, '2018-06-23 16:09:34', '', 7, '2018-06-23 18:11:36', 0, '', 0, 2, NULL, 0.20, '111/2561201806231810'),
(30, 11, '1/2561', 0, 9, '127.0.0.1', 11, '2018-06-23 16:09:34', '', 7, '2018-06-23 18:11:36', 0, '', 0, 2, NULL, 0.20, '111/2561201806231810'),
(31, 11, '1/2561', 0, 10, '127.0.0.1', 11, '2018-06-23 16:09:34', '', 7, '2018-06-23 18:11:36', 0, '', 0, 2, NULL, 0.20, '111/2561201806231810'),
(32, 11, '1/2561', 0, 11, '127.0.0.1', 11, '2018-06-23 16:09:34', '', 7, '2018-06-23 18:11:36', 0, '', 0, 2, NULL, 0.20, '111/2561201806231810'),
(33, 11, '1/2561', 0, 12, '127.0.0.1', 11, '2018-06-23 16:09:34', '', 7, '2018-06-23 18:11:36', 0, '', 0, 2, NULL, 0.20, '111/2561201806231810'),
(34, 11, '1/2561', 0, 13, '127.0.0.1', 11, '2018-06-23 16:09:34', '', 7, '2018-06-23 18:11:36', 0, '', 0, 2, NULL, 0.20, '111/2561201806231810'),
(35, 11, '1/2561', 0, 14, '127.0.0.1', 11, '2018-06-23 16:09:34', '', 7, '2018-06-23 18:11:36', 0, '', 0, 2, NULL, 0.20, '111/2561201806231810'),
(36, 11, '1/2561', 0, 15, '127.0.0.1', 11, '2018-06-23 16:09:34', '', 7, '2018-06-23 18:11:36', 0, '', 0, 2, NULL, 0.20, '111/2561201806231810'),
(37, 11, '1/2561', 0, 16, '127.0.0.1', 11, '2018-06-23 16:09:34', '', 7, '2018-06-23 18:11:36', 0, '', 0, 2, NULL, 0.20, '111/2561201806231810'),
(38, 11, '1/2561', 0, 17, '127.0.0.1', 11, '2018-06-23 16:09:34', '', 7, '2018-06-23 18:11:36', 0, '', 0, 2, NULL, 0.20, '111/2561201806231810'),
(39, 11, '1/2561', 0, 18, '127.0.0.1', 11, '2018-06-23 16:09:34', '', 7, '2018-06-23 18:11:36', 0, '', 0, 2, NULL, 0.20, '111/2561201806231810'),
(40, 11, '1/2561', 0, 19, '127.0.0.1', 11, '2018-06-23 16:09:34', '', 7, '2018-06-23 18:11:36', 0, '', 0, 2, NULL, 1.50, '111/2561201806231810'),
(41, 11, '1/2561', 0, 20, '127.0.0.1', 11, '2018-06-23 16:09:34', '', 7, '2018-06-23 18:11:36', 0, '', 0, 2, NULL, 1.50, '111/2561201806231810'),
(42, 11, '1/2561', 0, 21, '127.0.0.1', 11, '2018-06-23 16:09:34', '', 7, '2018-06-23 18:11:36', 0, '', 0, 2, NULL, 1.50, '111/2561201806231810'),
(43, 11, '1/2561', 0, 22, '127.0.0.1', 11, '2018-06-23 16:09:34', '', 7, '2018-06-23 18:11:36', 0, '', 0, 2, NULL, 1.50, '111/2561201806231810'),
(44, 11, '1/2561', 0, 23, '127.0.0.1', 11, '2018-06-23 16:09:34', '', 7, '2018-06-23 18:11:36', 0, '', 0, 2, NULL, 0.50, '111/2561201806231810'),
(45, 11, '1/2561', 0, 24, '127.0.0.1', 11, '2018-06-23 16:09:34', '', 7, '2018-06-23 18:11:36', 0, '', 0, 2, NULL, 0.50, '111/2561201806231810'),
(46, 11, '1/2561', 0, 25, '127.0.0.1', 11, '2018-06-23 16:09:34', '', 7, '2018-06-23 18:11:36', 0, '', 0, 2, NULL, 0.50, '111/2561201806231810'),
(47, 11, '1/2561', 0, 26, '127.0.0.1', 11, '2018-06-23 16:09:34', '', 7, '2018-06-23 18:11:36', 0, '', 0, 2, NULL, 0.50, '111/2561201806231810'),
(48, 11, '1/2561', 0, 2, '127.0.0.1', 11, '2018-06-23 16:10:02', '', 7, '2018-06-23 18:11:36', 0, '', 0, 3, NULL, 1.50, '111/2561201806231810'),
(49, 11, '1/2561', 0, 7, '127.0.0.1', 11, '2018-06-23 16:10:02', '', 7, '2018-06-23 18:11:36', 0, '', 0, 3, NULL, 1.50, '111/2561201806231810'),
(50, 11, '1/2561', 0, 8, '127.0.0.1', 11, '2018-06-23 16:10:02', '', 7, '2018-06-23 18:11:36', 0, '', 0, 3, NULL, 1.50, '111/2561201806231810'),
(51, 11, '1/2561', 0, 9, '127.0.0.1', 11, '2018-06-23 16:10:02', '', 7, '2018-06-23 18:11:36', 0, '', 0, 3, NULL, 1.50, '111/2561201806231810'),
(52, 11, '1/2561', 0, 10, '127.0.0.1', 11, '2018-06-23 16:10:02', '', 7, '2018-06-23 18:11:36', 0, '', 0, 3, NULL, 1.50, '111/2561201806231810'),
(53, 11, '1/2561', 0, 12, '127.0.0.1', 11, '2018-06-23 16:10:02', '', 7, '2018-06-23 18:11:36', 0, '', 0, 3, NULL, 1.50, '111/2561201806231810'),
(54, 11, '1/2561', 0, 31, '127.0.0.1', 11, '2018-06-23 16:10:02', '', 7, '2018-06-23 18:11:36', 0, '', 0, 3, NULL, 1.50, '111/2561201806231810'),
(55, 11, '1/2561', 0, 32, '127.0.0.1', 11, '2018-06-23 16:10:02', '', 7, '2018-06-23 18:11:36', 0, '', 0, 3, NULL, 1.50, '111/2561201806231810'),
(56, 11, '1/2561', 0, 33, '127.0.0.1', 11, '2018-06-23 16:10:02', '', 7, '2018-06-23 18:11:36', 0, '', 0, 3, NULL, 1.50, '111/2561201806231810'),
(57, 11, '1/2561', 0, 34, '127.0.0.1', 11, '2018-06-23 16:10:02', '', 7, '2018-06-23 18:11:36', 0, '', 0, 3, NULL, 1.50, '111/2561201806231810'),
(58, 12, '1/2561', 0, 1, '127.0.0.1', 12, '2018-06-23 16:16:06', '127.0.0.1', 7, '2018-06-23 18:18:59', 0, '127.0.0.1', 12, 1, '0000-00-00 00:00:00', 0.00, '121/2561201806231817'),
(59, 12, '1/2561', 0, 2, '127.0.0.1', 12, '2018-06-23 16:16:06', '127.0.0.1', 7, '2018-06-23 18:18:59', 0, '127.0.0.1', 12, 1, '0000-00-00 00:00:00', 0.00, '121/2561201806231817'),
(60, 12, '1/2561', 0, 3, '127.0.0.1', 12, '2018-06-23 16:16:06', '127.0.0.1', 7, '2018-06-23 18:18:59', 0, '127.0.0.1', 12, 1, '0000-00-00 00:00:00', 0.00, '121/2561201806231817'),
(61, 12, '1/2561', 0, 4, '127.0.0.1', 12, '2018-06-23 16:16:06', '127.0.0.1', 7, '2018-06-23 18:18:59', 0, '127.0.0.1', 12, 1, '0000-00-00 00:00:00', 0.00, '121/2561201806231817'),
(62, 12, '1/2561', 0, 5, '127.0.0.1', 12, '2018-06-23 16:16:06', '127.0.0.1', 7, '2018-06-23 18:18:59', 0, '127.0.0.1', 12, 1, '0000-00-00 00:00:00', 15.00, '121/2561201806231817'),
(63, 12, '1/2561', 0, 6, '127.0.0.1', 12, '2018-06-23 16:16:06', '127.0.0.1', 7, '2018-06-23 18:18:59', 0, '127.0.0.1', 12, 1, '0000-00-00 00:00:00', 0.00, '121/2561201806231817'),
(64, 12, '1/2561', 0, 7, '127.0.0.1', 12, '2018-06-23 16:16:06', '127.0.0.1', 7, '2018-06-23 18:18:59', 0, '127.0.0.1', 12, 1, '0000-00-00 00:00:00', 0.00, '121/2561201806231817'),
(65, 12, '1/2561', 0, 8, '127.0.0.1', 12, '2018-06-23 16:16:06', '127.0.0.1', 7, '2018-06-23 18:18:59', 0, '127.0.0.1', 12, 1, '0000-00-00 00:00:00', 0.00, '121/2561201806231817'),
(66, 12, '1/2561', 0, 9, '127.0.0.1', 12, '2018-06-23 16:16:06', '127.0.0.1', 7, '2018-06-23 18:18:59', 0, '127.0.0.1', 12, 1, '0000-00-00 00:00:00', 0.00, '121/2561201806231817'),
(67, 12, '1/2561', 0, 10, '127.0.0.1', 12, '2018-06-23 16:16:06', '127.0.0.1', 7, '2018-06-23 18:18:59', 0, '127.0.0.1', 12, 1, '0000-00-00 00:00:00', 15.00, '121/2561201806231817'),
(68, 12, '1/2561', 0, 11, '127.0.0.1', 12, '2018-06-23 16:16:06', '127.0.0.1', 7, '2018-06-23 18:18:59', 0, '127.0.0.1', 12, 1, '0000-00-00 00:00:00', 0.00, '121/2561201806231817'),
(69, 12, '1/2561', 0, 12, '127.0.0.1', 12, '2018-06-23 16:16:06', '127.0.0.1', 7, '2018-06-23 18:18:59', 0, '127.0.0.1', 12, 1, '0000-00-00 00:00:00', 0.00, '121/2561201806231817'),
(70, 12, '1/2561', 0, 13, '127.0.0.1', 12, '2018-06-23 16:16:06', '127.0.0.1', 7, '2018-06-23 18:18:59', 0, '127.0.0.1', 12, 1, '0000-00-00 00:00:00', 0.00, '121/2561201806231817'),
(71, 12, '1/2561', 0, 14, '127.0.0.1', 12, '2018-06-23 16:16:06', '127.0.0.1', 7, '2018-06-23 18:18:59', 0, '127.0.0.1', 12, 1, '0000-00-00 00:00:00', 0.00, '121/2561201806231817'),
(72, 12, '1/2561', 0, 15, '127.0.0.1', 12, '2018-06-23 16:16:06', '127.0.0.1', 7, '2018-06-23 18:18:59', 0, '127.0.0.1', 12, 1, '0000-00-00 00:00:00', 15.00, '121/2561201806231817'),
(73, 12, '1/2561', 0, 16, '127.0.0.1', 12, '2018-06-23 16:16:06', '127.0.0.1', 7, '2018-06-23 18:18:59', 0, '127.0.0.1', 12, 1, '0000-00-00 00:00:00', 0.00, '121/2561201806231817'),
(74, 12, '1/2561', 0, 17, '127.0.0.1', 12, '2018-06-23 16:16:06', '127.0.0.1', 7, '2018-06-23 18:18:59', 0, '127.0.0.1', 12, 1, '0000-00-00 00:00:00', 0.00, '121/2561201806231817'),
(75, 12, '1/2561', 0, 18, '127.0.0.1', 12, '2018-06-23 16:16:06', '127.0.0.1', 7, '2018-06-23 18:18:59', 0, '127.0.0.1', 12, 1, '0000-00-00 00:00:00', 0.00, '121/2561201806231817'),
(76, 12, '1/2561', 0, 19, '127.0.0.1', 12, '2018-06-23 16:16:06', '127.0.0.1', 7, '2018-06-23 18:18:59', 0, '127.0.0.1', 12, 1, '0000-00-00 00:00:00', 0.00, '121/2561201806231817'),
(77, 12, '1/2561', 0, 20, '127.0.0.1', 12, '2018-06-23 16:16:06', '127.0.0.1', 7, '2018-06-23 18:18:59', 0, '127.0.0.1', 12, 1, '0000-00-00 00:00:00', 15.00, '121/2561201806231817'),
(78, 12, '1/2561', 0, 21, '127.0.0.1', 12, '2018-06-23 16:16:06', '127.0.0.1', 7, '2018-06-23 18:18:59', 0, '127.0.0.1', 12, 1, '0000-00-00 00:00:00', 10.00, '121/2561201806231817'),
(79, 12, '1/2561', 0, 1, '127.0.0.1', 12, '2018-06-23 16:17:06', '', 7, '2018-06-23 18:18:59', 0, '', 0, 2, NULL, 0.20, '121/2561201806231817'),
(80, 12, '1/2561', 0, 2, '127.0.0.1', 12, '2018-06-23 16:17:06', '', 7, '2018-06-23 18:18:59', 0, '', 0, 2, NULL, 0.20, '121/2561201806231817'),
(81, 12, '1/2561', 0, 3, '127.0.0.1', 12, '2018-06-23 16:17:06', '', 7, '2018-06-23 18:18:59', 0, '', 0, 2, NULL, 0.20, '121/2561201806231817'),
(82, 12, '1/2561', 0, 4, '127.0.0.1', 12, '2018-06-23 16:17:06', '', 7, '2018-06-23 18:18:59', 0, '', 0, 2, NULL, 0.20, '121/2561201806231817'),
(83, 12, '1/2561', 0, 5, '127.0.0.1', 12, '2018-06-23 16:17:06', '', 7, '2018-06-23 18:18:59', 0, '', 0, 2, NULL, 0.20, '121/2561201806231817'),
(84, 12, '1/2561', 0, 6, '127.0.0.1', 12, '2018-06-23 16:17:06', '', 7, '2018-06-23 18:18:59', 0, '', 0, 2, NULL, 0.20, '121/2561201806231817'),
(85, 12, '1/2561', 0, 7, '127.0.0.1', 12, '2018-06-23 16:17:06', '', 7, '2018-06-23 18:18:59', 0, '', 0, 2, NULL, 0.20, '121/2561201806231817'),
(86, 12, '1/2561', 0, 8, '127.0.0.1', 12, '2018-06-23 16:17:06', '', 7, '2018-06-23 18:18:59', 0, '', 0, 2, NULL, 0.20, '121/2561201806231817'),
(87, 12, '1/2561', 0, 9, '127.0.0.1', 12, '2018-06-23 16:17:06', '', 7, '2018-06-23 18:18:59', 0, '', 0, 2, NULL, 0.20, '121/2561201806231817'),
(88, 12, '1/2561', 0, 10, '127.0.0.1', 12, '2018-06-23 16:17:06', '', 7, '2018-06-23 18:18:59', 0, '', 0, 2, NULL, 0.20, '121/2561201806231817'),
(89, 12, '1/2561', 0, 11, '127.0.0.1', 12, '2018-06-23 16:17:06', '', 7, '2018-06-23 18:18:59', 0, '', 0, 2, NULL, 0.20, '121/2561201806231817'),
(90, 12, '1/2561', 0, 12, '127.0.0.1', 12, '2018-06-23 16:17:06', '', 7, '2018-06-23 18:18:59', 0, '', 0, 2, NULL, 0.20, '121/2561201806231817'),
(91, 12, '1/2561', 0, 13, '127.0.0.1', 12, '2018-06-23 16:17:06', '', 7, '2018-06-23 18:18:59', 0, '', 0, 2, NULL, 0.20, '121/2561201806231817'),
(92, 12, '1/2561', 0, 14, '127.0.0.1', 12, '2018-06-23 16:17:06', '', 7, '2018-06-23 18:18:59', 0, '', 0, 2, NULL, 0.20, '121/2561201806231817'),
(93, 12, '1/2561', 0, 15, '127.0.0.1', 12, '2018-06-23 16:17:06', '', 7, '2018-06-23 18:18:59', 0, '', 0, 2, NULL, 0.20, '121/2561201806231817'),
(94, 12, '1/2561', 0, 16, '127.0.0.1', 12, '2018-06-23 16:17:06', '', 7, '2018-06-23 18:18:59', 0, '', 0, 2, NULL, 0.20, '121/2561201806231817'),
(95, 12, '1/2561', 0, 17, '127.0.0.1', 12, '2018-06-23 16:17:06', '', 7, '2018-06-23 18:18:59', 0, '', 0, 2, NULL, 0.20, '121/2561201806231817'),
(96, 12, '1/2561', 0, 18, '127.0.0.1', 12, '2018-06-23 16:17:06', '', 7, '2018-06-23 18:18:59', 0, '', 0, 2, NULL, 0.20, '121/2561201806231817'),
(97, 12, '1/2561', 0, 19, '127.0.0.1', 12, '2018-06-23 16:17:06', '', 7, '2018-06-23 18:18:59', 0, '', 0, 2, NULL, 0.20, '121/2561201806231817'),
(98, 12, '1/2561', 0, 20, '127.0.0.1', 12, '2018-06-23 16:17:06', '', 7, '2018-06-23 18:18:59', 0, '', 0, 2, NULL, 0.20, '121/2561201806231817'),
(99, 12, '1/2561', 0, 21, '127.0.0.1', 12, '2018-06-23 16:17:06', '', 7, '2018-06-23 18:18:59', 0, '', 0, 2, NULL, 1.50, '121/2561201806231817'),
(100, 12, '1/2561', 0, 22, '127.0.0.1', 12, '2018-06-23 16:17:06', '', 7, '2018-06-23 18:18:59', 0, '', 0, 2, NULL, 0.20, '121/2561201806231817'),
(101, 12, '1/2561', 0, 23, '127.0.0.1', 12, '2018-06-23 16:17:06', '', 7, '2018-06-23 18:18:59', 0, '', 0, 2, NULL, 0.20, '121/2561201806231817'),
(102, 12, '1/2561', 0, 24, '127.0.0.1', 12, '2018-06-23 16:17:06', '', 7, '2018-06-23 18:18:59', 0, '', 0, 2, NULL, 0.20, '121/2561201806231817'),
(103, 12, '1/2561', 0, 25, '127.0.0.1', 12, '2018-06-23 16:17:06', '', 7, '2018-06-23 18:18:59', 0, '', 0, 2, NULL, 0.20, '121/2561201806231817'),
(104, 12, '1/2561', 0, 26, '127.0.0.1', 12, '2018-06-23 16:17:06', '', 7, '2018-06-23 18:18:59', 0, '', 0, 2, NULL, 0.20, '121/2561201806231817'),
(105, 12, '1/2561', 0, 2, '127.0.0.1', 12, '2018-06-23 16:17:32', '', 7, '2018-06-23 18:18:59', 0, '', 0, 3, NULL, 1.50, '121/2561201806231817'),
(106, 12, '1/2561', 0, 7, '127.0.0.1', 12, '2018-06-23 16:17:32', '', 7, '2018-06-23 18:18:59', 0, '', 0, 3, NULL, 1.50, '121/2561201806231817'),
(107, 12, '1/2561', 0, 8, '127.0.0.1', 12, '2018-06-23 16:17:32', '', 7, '2018-06-23 18:18:59', 0, '', 0, 3, NULL, 1.50, '121/2561201806231817'),
(108, 12, '1/2561', 0, 9, '127.0.0.1', 12, '2018-06-23 16:17:32', '', 7, '2018-06-23 18:18:59', 0, '', 0, 3, NULL, 1.50, '121/2561201806231817'),
(109, 12, '1/2561', 0, 10, '127.0.0.1', 12, '2018-06-23 16:17:32', '', 7, '2018-06-23 18:18:59', 0, '', 0, 3, NULL, 1.50, '121/2561201806231817'),
(110, 12, '1/2561', 0, 12, '127.0.0.1', 12, '2018-06-23 16:17:32', '', 7, '2018-06-23 18:18:59', 0, '', 0, 3, NULL, 1.50, '121/2561201806231817'),
(111, 12, '1/2561', 0, 31, '127.0.0.1', 12, '2018-06-23 16:17:32', '', 7, '2018-06-23 18:18:59', 0, '', 0, 3, NULL, 1.50, '121/2561201806231817'),
(112, 12, '1/2561', 0, 32, '127.0.0.1', 12, '2018-06-23 16:17:32', '', 7, '2018-06-23 18:18:59', 0, '', 0, 3, NULL, 1.50, '121/2561201806231817'),
(113, 12, '1/2561', 0, 33, '127.0.0.1', 12, '2018-06-23 16:17:32', '', 7, '2018-06-23 18:18:59', 0, '', 0, 3, NULL, 1.50, '121/2561201806231817'),
(114, 12, '1/2561', 0, 34, '127.0.0.1', 12, '2018-06-23 16:17:32', '', 7, '2018-06-23 18:18:59', 0, '', 0, 3, NULL, 1.40, '121/2561201806231817'),
(115, 16, '1/2561', 0, 1, '127.0.0.1', 16, '2018-06-23 16:21:19', '127.0.0.1', 7, '2018-06-23 23:23:15', 0, '127.0.0.1', 16, 1, '0000-00-00 00:00:00', 0.00, '161/2561201806231822'),
(116, 16, '1/2561', 0, 2, '127.0.0.1', 16, '2018-06-23 16:21:19', '127.0.0.1', 7, '2018-06-23 23:23:15', 0, '127.0.0.1', 16, 1, '0000-00-00 00:00:00', 0.00, '161/2561201806231822'),
(117, 16, '1/2561', 0, 3, '127.0.0.1', 16, '2018-06-23 16:21:19', '127.0.0.1', 7, '2018-06-23 23:23:15', 0, '127.0.0.1', 16, 1, '0000-00-00 00:00:00', 0.00, '161/2561201806231822'),
(118, 16, '1/2561', 0, 4, '127.0.0.1', 16, '2018-06-23 16:21:19', '127.0.0.1', 7, '2018-06-23 23:23:15', 0, '127.0.0.1', 16, 1, '0000-00-00 00:00:00', 0.00, '161/2561201806231822'),
(119, 16, '1/2561', 0, 5, '127.0.0.1', 16, '2018-06-23 16:21:19', '127.0.0.1', 7, '2018-06-23 23:23:15', 0, '127.0.0.1', 16, 1, '0000-00-00 00:00:00', 15.00, '161/2561201806231822'),
(120, 16, '1/2561', 0, 6, '127.0.0.1', 16, '2018-06-23 16:21:19', '127.0.0.1', 7, '2018-06-23 23:23:15', 0, '127.0.0.1', 16, 1, '0000-00-00 00:00:00', 0.00, '161/2561201806231822'),
(121, 16, '1/2561', 0, 7, '127.0.0.1', 16, '2018-06-23 16:21:19', '127.0.0.1', 7, '2018-06-23 23:23:15', 0, '127.0.0.1', 16, 1, '0000-00-00 00:00:00', 0.00, '161/2561201806231822'),
(122, 16, '1/2561', 0, 8, '127.0.0.1', 16, '2018-06-23 16:21:19', '127.0.0.1', 7, '2018-06-23 23:23:15', 0, '127.0.0.1', 16, 1, '0000-00-00 00:00:00', 0.00, '161/2561201806231822'),
(123, 16, '1/2561', 0, 9, '127.0.0.1', 16, '2018-06-23 16:21:19', '127.0.0.1', 7, '2018-06-23 23:23:15', 0, '127.0.0.1', 16, 1, '0000-00-00 00:00:00', 0.00, '161/2561201806231822'),
(124, 16, '1/2561', 0, 10, '127.0.0.1', 16, '2018-06-23 16:21:19', '127.0.0.1', 7, '2018-06-23 23:23:15', 0, '127.0.0.1', 16, 1, '0000-00-00 00:00:00', 15.00, '161/2561201806231822'),
(125, 16, '1/2561', 0, 11, '127.0.0.1', 16, '2018-06-23 16:21:19', '127.0.0.1', 7, '2018-06-23 23:23:15', 0, '127.0.0.1', 16, 1, '0000-00-00 00:00:00', 0.00, '161/2561201806231822'),
(126, 16, '1/2561', 0, 12, '127.0.0.1', 16, '2018-06-23 16:21:19', '127.0.0.1', 7, '2018-06-23 23:23:15', 0, '127.0.0.1', 16, 1, '0000-00-00 00:00:00', 0.00, '161/2561201806231822'),
(127, 16, '1/2561', 0, 13, '127.0.0.1', 16, '2018-06-23 16:21:19', '127.0.0.1', 7, '2018-06-23 23:23:15', 0, '127.0.0.1', 16, 1, '0000-00-00 00:00:00', 0.00, '161/2561201806231822'),
(128, 16, '1/2561', 0, 14, '127.0.0.1', 16, '2018-06-23 16:21:19', '127.0.0.1', 7, '2018-06-23 23:23:15', 0, '127.0.0.1', 16, 1, '0000-00-00 00:00:00', 0.00, '161/2561201806231822'),
(129, 16, '1/2561', 0, 15, '127.0.0.1', 16, '2018-06-23 16:21:19', '127.0.0.1', 7, '2018-06-23 23:23:15', 0, '127.0.0.1', 16, 1, '0000-00-00 00:00:00', 15.00, '161/2561201806231822'),
(130, 16, '1/2561', 0, 16, '127.0.0.1', 16, '2018-06-23 16:21:19', '127.0.0.1', 7, '2018-06-23 23:23:15', 0, '127.0.0.1', 16, 1, '0000-00-00 00:00:00', 0.00, '161/2561201806231822'),
(131, 16, '1/2561', 0, 17, '127.0.0.1', 16, '2018-06-23 16:21:19', '127.0.0.1', 7, '2018-06-23 23:23:15', 0, '127.0.0.1', 16, 1, '0000-00-00 00:00:00', 0.00, '161/2561201806231822'),
(132, 16, '1/2561', 0, 18, '127.0.0.1', 16, '2018-06-23 16:21:19', '127.0.0.1', 7, '2018-06-23 23:23:15', 0, '127.0.0.1', 16, 1, '0000-00-00 00:00:00', 0.00, '161/2561201806231822'),
(133, 16, '1/2561', 0, 19, '127.0.0.1', 16, '2018-06-23 16:21:19', '127.0.0.1', 7, '2018-06-23 23:23:15', 0, '127.0.0.1', 16, 1, '0000-00-00 00:00:00', 0.00, '161/2561201806231822'),
(134, 16, '1/2561', 0, 20, '127.0.0.1', 16, '2018-06-23 16:21:19', '127.0.0.1', 7, '2018-06-23 23:23:15', 0, '127.0.0.1', 16, 1, '0000-00-00 00:00:00', 15.00, '161/2561201806231822'),
(135, 16, '1/2561', 0, 21, '127.0.0.1', 16, '2018-06-23 16:21:19', '127.0.0.1', 7, '2018-06-23 23:23:15', 0, '127.0.0.1', 16, 1, '0000-00-00 00:00:00', 9.00, '161/2561201806231822'),
(136, 16, '1/2561', 0, 1, '127.0.0.1', 16, '2018-06-23 16:22:17', '', 0, NULL, 0, '', 0, 2, NULL, 0.20, '161/2561201806231822'),
(137, 16, '1/2561', 0, 2, '127.0.0.1', 16, '2018-06-23 16:22:17', '', 0, NULL, 0, '', 0, 2, NULL, 0.20, '161/2561201806231822'),
(138, 16, '1/2561', 0, 3, '127.0.0.1', 16, '2018-06-23 16:22:17', '', 0, NULL, 0, '', 0, 2, NULL, 0.20, '161/2561201806231822'),
(139, 16, '1/2561', 0, 4, '127.0.0.1', 16, '2018-06-23 16:22:17', '', 0, NULL, 0, '', 0, 2, NULL, 0.20, '161/2561201806231822'),
(140, 16, '1/2561', 0, 5, '127.0.0.1', 16, '2018-06-23 16:22:17', '', 0, NULL, 0, '', 0, 2, NULL, 0.20, '161/2561201806231822'),
(141, 16, '1/2561', 0, 6, '127.0.0.1', 16, '2018-06-23 16:22:17', '', 0, NULL, 0, '', 0, 2, NULL, 0.20, '161/2561201806231822'),
(142, 16, '1/2561', 0, 7, '127.0.0.1', 16, '2018-06-23 16:22:17', '', 0, NULL, 0, '', 0, 2, NULL, 0.20, '161/2561201806231822'),
(143, 16, '1/2561', 0, 8, '127.0.0.1', 16, '2018-06-23 16:22:17', '', 0, NULL, 0, '', 0, 2, NULL, 0.20, '161/2561201806231822'),
(144, 16, '1/2561', 0, 9, '127.0.0.1', 16, '2018-06-23 16:22:17', '', 0, NULL, 0, '', 0, 2, NULL, 0.20, '161/2561201806231822'),
(145, 16, '1/2561', 0, 10, '127.0.0.1', 16, '2018-06-23 16:22:17', '', 0, NULL, 0, '', 0, 2, NULL, 0.40, '161/2561201806231822'),
(146, 16, '1/2561', 0, 11, '127.0.0.1', 16, '2018-06-23 16:22:17', '', 0, NULL, 0, '', 0, 2, NULL, 0.40, '161/2561201806231822'),
(147, 16, '1/2561', 0, 12, '127.0.0.1', 16, '2018-06-23 16:22:17', '', 0, NULL, 0, '', 0, 2, NULL, 0.40, '161/2561201806231822'),
(148, 16, '1/2561', 0, 13, '127.0.0.1', 16, '2018-06-23 16:22:17', '', 0, NULL, 0, '', 0, 2, NULL, 0.40, '161/2561201806231822'),
(149, 16, '1/2561', 0, 14, '127.0.0.1', 16, '2018-06-23 16:22:17', '', 0, NULL, 0, '', 0, 2, NULL, 0.40, '161/2561201806231822'),
(150, 16, '1/2561', 0, 15, '127.0.0.1', 16, '2018-06-23 16:22:17', '', 0, NULL, 0, '', 0, 2, NULL, 0.40, '161/2561201806231822'),
(151, 16, '1/2561', 0, 16, '127.0.0.1', 16, '2018-06-23 16:22:17', '', 0, NULL, 0, '', 0, 2, NULL, 0.40, '161/2561201806231822'),
(152, 16, '1/2561', 0, 17, '127.0.0.1', 16, '2018-06-23 16:22:17', '', 0, NULL, 0, '', 0, 2, NULL, 0.40, '161/2561201806231822'),
(153, 16, '1/2561', 0, 18, '127.0.0.1', 16, '2018-06-23 16:22:17', '', 0, NULL, 0, '', 0, 2, NULL, 0.40, '161/2561201806231822'),
(154, 16, '1/2561', 0, 19, '127.0.0.1', 16, '2018-06-23 16:22:17', '', 0, NULL, 0, '', 0, 2, NULL, 0.40, '161/2561201806231822'),
(155, 16, '1/2561', 0, 20, '127.0.0.1', 16, '2018-06-23 16:22:17', '', 0, NULL, 0, '', 0, 2, NULL, 0.40, '161/2561201806231822'),
(156, 16, '1/2561', 0, 21, '127.0.0.1', 16, '2018-06-23 16:22:17', '', 0, NULL, 0, '', 0, 2, NULL, 0.40, '161/2561201806231822'),
(157, 16, '1/2561', 0, 22, '127.0.0.1', 16, '2018-06-23 16:22:17', '', 0, NULL, 0, '', 0, 2, NULL, 0.40, '161/2561201806231822'),
(158, 16, '1/2561', 0, 23, '127.0.0.1', 16, '2018-06-23 16:22:17', '', 0, NULL, 0, '', 0, 2, NULL, 0.50, '161/2561201806231822'),
(159, 16, '1/2561', 0, 24, '127.0.0.1', 16, '2018-06-23 16:22:17', '', 0, NULL, 0, '', 0, 2, NULL, 0.40, '161/2561201806231822'),
(160, 16, '1/2561', 0, 25, '127.0.0.1', 16, '2018-06-23 16:22:17', '', 0, NULL, 0, '', 0, 2, NULL, 0.40, '161/2561201806231822'),
(161, 16, '1/2561', 0, 26, '127.0.0.1', 16, '2018-06-23 16:22:17', '', 0, NULL, 0, '', 0, 2, NULL, 0.40, '161/2561201806231822'),
(162, 16, '1/2561', 0, 13, '127.0.0.1', 16, '2018-06-23 16:22:40', '', 0, NULL, 0, '', 0, 3, NULL, 1.50, '161/2561201806231822'),
(163, 16, '1/2561', 0, 14, '127.0.0.1', 16, '2018-06-23 16:22:40', '', 0, NULL, 0, '', 0, 3, NULL, 1.50, '161/2561201806231822'),
(164, 16, '1/2561', 0, 16, '127.0.0.1', 16, '2018-06-23 16:22:40', '', 0, NULL, 0, '', 0, 3, NULL, 1.50, '161/2561201806231822'),
(165, 16, '1/2561', 0, 17, '127.0.0.1', 16, '2018-06-23 16:22:40', '', 0, NULL, 0, '', 0, 3, NULL, 1.50, '161/2561201806231822'),
(166, 16, '1/2561', 0, 18, '127.0.0.1', 16, '2018-06-23 16:22:40', '', 0, NULL, 0, '', 0, 3, NULL, 1.50, '161/2561201806231822'),
(167, 16, '1/2561', 0, 19, '127.0.0.1', 16, '2018-06-23 16:22:40', '', 0, NULL, 0, '', 0, 3, NULL, 1.50, '161/2561201806231822'),
(168, 16, '1/2561', 0, 31, '127.0.0.1', 16, '2018-06-23 16:22:40', '', 0, NULL, 0, '', 0, 3, NULL, 1.50, '161/2561201806231822'),
(169, 16, '1/2561', 0, 32, '127.0.0.1', 16, '2018-06-23 16:22:40', '', 0, NULL, 0, '', 0, 3, NULL, 1.50, '161/2561201806231822'),
(170, 16, '1/2561', 0, 33, '127.0.0.1', 16, '2018-06-23 16:22:40', '', 0, NULL, 0, '', 0, 3, NULL, 1.50, '161/2561201806231822'),
(171, 16, '1/2561', 0, 34, '127.0.0.1', 16, '2018-06-23 16:22:40', '', 0, NULL, 0, '', 0, 3, NULL, 1.50, '161/2561201806231822'),
(172, 7, '1/2561', 0, 1, '127.0.0.1', 7, '2018-06-23 16:34:41', '127.0.0.1', 7, '2018-06-23 18:34:21', 0, '127.0.0.1', 7, 1, '0000-00-00 00:00:00', 0.00, '71/2561201806231835'),
(173, 7, '1/2561', 0, 2, '127.0.0.1', 7, '2018-06-23 16:34:41', '127.0.0.1', 7, '2018-06-23 18:34:21', 0, '127.0.0.1', 7, 1, '0000-00-00 00:00:00', 0.00, '71/2561201806231835'),
(174, 7, '1/2561', 0, 3, '127.0.0.1', 7, '2018-06-23 16:34:41', '127.0.0.1', 7, '2018-06-23 18:34:21', 0, '127.0.0.1', 7, 1, '0000-00-00 00:00:00', 0.00, '71/2561201806231835'),
(175, 7, '1/2561', 0, 4, '127.0.0.1', 7, '2018-06-23 16:34:41', '127.0.0.1', 7, '2018-06-23 18:34:21', 0, '127.0.0.1', 7, 1, '0000-00-00 00:00:00', 0.00, '71/2561201806231835'),
(176, 7, '1/2561', 0, 5, '127.0.0.1', 7, '2018-06-23 16:34:41', '127.0.0.1', 7, '2018-06-23 18:34:21', 0, '127.0.0.1', 7, 1, '0000-00-00 00:00:00', 13.00, '71/2561201806231835'),
(177, 7, '1/2561', 0, 6, '127.0.0.1', 7, '2018-06-23 16:34:41', '127.0.0.1', 7, '2018-06-23 18:34:21', 0, '127.0.0.1', 7, 1, '0000-00-00 00:00:00', 0.00, '71/2561201806231835'),
(178, 7, '1/2561', 0, 7, '127.0.0.1', 7, '2018-06-23 16:34:41', '127.0.0.1', 7, '2018-06-23 18:34:21', 0, '127.0.0.1', 7, 1, '0000-00-00 00:00:00', 0.00, '71/2561201806231835'),
(179, 7, '1/2561', 0, 8, '127.0.0.1', 7, '2018-06-23 16:34:41', '127.0.0.1', 7, '2018-06-23 18:34:21', 0, '127.0.0.1', 7, 1, '0000-00-00 00:00:00', 0.00, '71/2561201806231835'),
(180, 7, '1/2561', 0, 9, '127.0.0.1', 7, '2018-06-23 16:34:41', '127.0.0.1', 7, '2018-06-23 18:34:21', 0, '127.0.0.1', 7, 1, '0000-00-00 00:00:00', 0.00, '71/2561201806231835'),
(181, 7, '1/2561', 0, 10, '127.0.0.1', 7, '2018-06-23 16:34:41', '127.0.0.1', 7, '2018-06-23 18:34:21', 0, '127.0.0.1', 7, 1, '0000-00-00 00:00:00', 13.00, '71/2561201806231835'),
(182, 7, '1/2561', 0, 11, '127.0.0.1', 7, '2018-06-23 16:34:41', '127.0.0.1', 7, '2018-06-23 18:34:21', 0, '127.0.0.1', 7, 1, '0000-00-00 00:00:00', 0.00, '71/2561201806231835'),
(183, 7, '1/2561', 0, 12, '127.0.0.1', 7, '2018-06-23 16:34:41', '127.0.0.1', 7, '2018-06-23 18:34:21', 0, '127.0.0.1', 7, 1, '0000-00-00 00:00:00', 0.00, '71/2561201806231835'),
(184, 7, '1/2561', 0, 13, '127.0.0.1', 7, '2018-06-23 16:34:41', '127.0.0.1', 7, '2018-06-23 18:34:21', 0, '127.0.0.1', 7, 1, '0000-00-00 00:00:00', 0.00, '71/2561201806231835'),
(185, 7, '1/2561', 0, 14, '127.0.0.1', 7, '2018-06-23 16:34:41', '127.0.0.1', 7, '2018-06-23 18:34:21', 0, '127.0.0.1', 7, 1, '0000-00-00 00:00:00', 0.00, '71/2561201806231835'),
(186, 7, '1/2561', 0, 15, '127.0.0.1', 7, '2018-06-23 16:34:41', '127.0.0.1', 7, '2018-06-23 18:34:21', 0, '127.0.0.1', 7, 1, '0000-00-00 00:00:00', 13.00, '71/2561201806231835'),
(187, 7, '1/2561', 0, 16, '127.0.0.1', 7, '2018-06-23 16:34:41', '127.0.0.1', 7, '2018-06-23 18:34:21', 0, '127.0.0.1', 7, 1, '0000-00-00 00:00:00', 0.00, '71/2561201806231835'),
(188, 7, '1/2561', 0, 17, '127.0.0.1', 7, '2018-06-23 16:34:41', '127.0.0.1', 7, '2018-06-23 18:34:21', 0, '127.0.0.1', 7, 1, '0000-00-00 00:00:00', 0.00, '71/2561201806231835'),
(189, 7, '1/2561', 0, 18, '127.0.0.1', 7, '2018-06-23 16:34:41', '127.0.0.1', 7, '2018-06-23 18:34:21', 0, '127.0.0.1', 7, 1, '0000-00-00 00:00:00', 0.00, '71/2561201806231835'),
(190, 7, '1/2561', 0, 19, '127.0.0.1', 7, '2018-06-23 16:34:41', '127.0.0.1', 7, '2018-06-23 18:34:21', 0, '127.0.0.1', 7, 1, '0000-00-00 00:00:00', 0.00, '71/2561201806231835'),
(191, 7, '1/2561', 0, 20, '127.0.0.1', 7, '2018-06-23 16:34:41', '127.0.0.1', 7, '2018-06-23 18:34:21', 0, '127.0.0.1', 7, 1, '0000-00-00 00:00:00', 13.00, '71/2561201806231835'),
(192, 7, '1/2561', 0, 21, '127.0.0.1', 7, '2018-06-23 16:34:41', '127.0.0.1', 7, '2018-06-23 18:34:21', 0, '127.0.0.1', 7, 1, '0000-00-00 00:00:00', 7.00, '71/2561201806231835'),
(193, 7, '1/2561', 0, 1, '127.0.0.1', 7, '2018-06-23 16:35:26', '127.0.0.1', 7, '2018-06-23 18:34:41', 0, '', 0, 2, NULL, 0.00, '71/2561201806231835'),
(194, 7, '1/2561', 0, 2, '127.0.0.1', 7, '2018-06-23 16:35:26', '127.0.0.1', 7, '2018-06-23 18:34:41', 0, '', 0, 2, NULL, 0.00, '71/2561201806231835'),
(195, 7, '1/2561', 0, 3, '127.0.0.1', 7, '2018-06-23 16:35:26', '127.0.0.1', 7, '2018-06-23 18:34:41', 0, '', 0, 2, NULL, 0.00, '71/2561201806231835'),
(196, 7, '1/2561', 0, 4, '127.0.0.1', 7, '2018-06-23 16:35:26', '127.0.0.1', 7, '2018-06-23 18:34:41', 0, '', 0, 2, NULL, 0.00, '71/2561201806231835'),
(197, 7, '1/2561', 0, 5, '127.0.0.1', 7, '2018-06-23 16:35:26', '127.0.0.1', 7, '2018-06-23 18:34:41', 0, '', 0, 2, NULL, 0.30, '71/2561201806231835'),
(198, 7, '1/2561', 0, 6, '127.0.0.1', 7, '2018-06-23 16:35:26', '127.0.0.1', 7, '2018-06-23 18:34:41', 0, '', 0, 2, NULL, 0.00, '71/2561201806231835'),
(199, 7, '1/2561', 0, 7, '127.0.0.1', 7, '2018-06-23 16:35:26', '127.0.0.1', 7, '2018-06-23 18:34:41', 0, '', 0, 2, NULL, 0.00, '71/2561201806231835'),
(200, 7, '1/2561', 0, 8, '127.0.0.1', 7, '2018-06-23 16:35:26', '127.0.0.1', 7, '2018-06-23 18:34:41', 0, '', 0, 2, NULL, 0.00, '71/2561201806231835'),
(201, 7, '1/2561', 0, 9, '127.0.0.1', 7, '2018-06-23 16:35:26', '127.0.0.1', 7, '2018-06-23 18:34:41', 0, '', 0, 2, NULL, 0.00, '71/2561201806231835'),
(202, 7, '1/2561', 0, 10, '127.0.0.1', 7, '2018-06-23 16:35:26', '127.0.0.1', 7, '2018-06-23 18:34:41', 0, '', 0, 2, NULL, 0.30, '71/2561201806231835'),
(203, 7, '1/2561', 0, 11, '127.0.0.1', 7, '2018-06-23 16:35:26', '127.0.0.1', 7, '2018-06-23 18:34:41', 0, '', 0, 2, NULL, 0.30, '71/2561201806231835'),
(204, 7, '1/2561', 0, 12, '127.0.0.1', 7, '2018-06-23 16:35:26', '127.0.0.1', 7, '2018-06-23 18:34:41', 0, '', 0, 2, NULL, 0.30, '71/2561201806231835'),
(205, 7, '1/2561', 0, 13, '127.0.0.1', 7, '2018-06-23 16:35:26', '127.0.0.1', 7, '2018-06-23 18:34:41', 0, '', 0, 2, NULL, 0.30, '71/2561201806231835'),
(206, 7, '1/2561', 0, 14, '127.0.0.1', 7, '2018-06-23 16:35:26', '127.0.0.1', 7, '2018-06-23 18:34:41', 0, '', 0, 2, NULL, 0.00, '71/2561201806231835'),
(207, 7, '1/2561', 0, 15, '127.0.0.1', 7, '2018-06-23 16:35:26', '127.0.0.1', 7, '2018-06-23 18:34:41', 0, '', 0, 2, NULL, 0.00, '71/2561201806231835'),
(208, 7, '1/2561', 0, 16, '127.0.0.1', 7, '2018-06-23 16:35:26', '127.0.0.1', 7, '2018-06-23 18:34:41', 0, '', 0, 2, NULL, 0.30, '71/2561201806231835'),
(209, 7, '1/2561', 0, 17, '127.0.0.1', 7, '2018-06-23 16:35:26', '127.0.0.1', 7, '2018-06-23 18:34:41', 0, '', 0, 2, NULL, 0.00, '71/2561201806231835'),
(210, 7, '1/2561', 0, 18, '127.0.0.1', 7, '2018-06-23 16:35:26', '127.0.0.1', 7, '2018-06-23 18:34:41', 0, '', 0, 2, NULL, 0.30, '71/2561201806231835'),
(211, 7, '1/2561', 0, 19, '127.0.0.1', 7, '2018-06-23 16:35:26', '127.0.0.1', 7, '2018-06-23 18:34:41', 0, '', 0, 2, NULL, 1.50, '71/2561201806231835'),
(212, 7, '1/2561', 0, 20, '127.0.0.1', 7, '2018-06-23 16:35:26', '127.0.0.1', 7, '2018-06-23 18:34:41', 0, '', 0, 2, NULL, 1.50, '71/2561201806231835'),
(213, 7, '1/2561', 0, 21, '127.0.0.1', 7, '2018-06-23 16:35:26', '127.0.0.1', 7, '2018-06-23 18:34:41', 0, '', 0, 2, NULL, 1.50, '71/2561201806231835'),
(214, 7, '1/2561', 0, 22, '127.0.0.1', 7, '2018-06-23 16:35:26', '127.0.0.1', 7, '2018-06-23 18:34:41', 0, '', 0, 2, NULL, 1.50, '71/2561201806231835'),
(215, 7, '1/2561', 0, 23, '127.0.0.1', 7, '2018-06-23 16:35:26', '127.0.0.1', 7, '2018-06-23 18:34:41', 0, '', 0, 2, NULL, 0.40, '71/2561201806231835'),
(216, 7, '1/2561', 0, 24, '127.0.0.1', 7, '2018-06-23 16:35:26', '127.0.0.1', 7, '2018-06-23 18:34:41', 0, '', 0, 2, NULL, 0.40, '71/2561201806231835'),
(217, 7, '1/2561', 0, 25, '127.0.0.1', 7, '2018-06-23 16:35:26', '127.0.0.1', 7, '2018-06-23 18:34:41', 0, '', 0, 2, NULL, 0.40, '71/2561201806231835'),
(218, 7, '1/2561', 0, 26, '127.0.0.1', 7, '2018-06-23 16:35:26', '127.0.0.1', 7, '2018-06-23 18:34:41', 0, '', 0, 2, NULL, 0.40, '71/2561201806231835'),
(219, 7, '1/2561', 0, 2, '127.0.0.1', 7, '2018-06-23 16:35:54', '127.0.0.1', 7, '2018-06-23 18:35:26', 0, '', 0, 3, NULL, 1.50, '71/2561201806231835'),
(220, 7, '1/2561', 0, 7, '127.0.0.1', 7, '2018-06-23 16:35:54', '127.0.0.1', 7, '2018-06-23 18:35:26', 0, '', 0, 3, NULL, 1.50, '71/2561201806231835'),
(221, 7, '1/2561', 0, 8, '127.0.0.1', 7, '2018-06-23 16:35:54', '127.0.0.1', 7, '2018-06-23 18:35:26', 0, '', 0, 3, NULL, 1.50, '71/2561201806231835'),
(222, 7, '1/2561', 0, 9, '127.0.0.1', 7, '2018-06-23 16:35:54', '127.0.0.1', 7, '2018-06-23 18:35:26', 0, '', 0, 3, NULL, 1.50, '71/2561201806231835'),
(223, 7, '1/2561', 0, 10, '127.0.0.1', 7, '2018-06-23 16:35:54', '127.0.0.1', 7, '2018-06-23 18:35:26', 0, '', 0, 3, NULL, 1.50, '71/2561201806231835'),
(224, 7, '1/2561', 0, 12, '127.0.0.1', 7, '2018-06-23 16:35:54', '127.0.0.1', 7, '2018-06-23 18:35:26', 0, '', 0, 3, NULL, 1.50, '71/2561201806231835'),
(225, 7, '1/2561', 0, 31, '127.0.0.1', 7, '2018-06-23 16:35:54', '127.0.0.1', 7, '2018-06-23 18:35:26', 0, '', 0, 3, NULL, 1.50, '71/2561201806231835'),
(226, 7, '1/2561', 0, 32, '127.0.0.1', 7, '2018-06-23 16:35:54', '127.0.0.1', 7, '2018-06-23 18:35:26', 0, '', 0, 3, NULL, 1.50, '71/2561201806231835'),
(227, 7, '1/2561', 0, 33, '127.0.0.1', 7, '2018-06-23 16:35:54', '127.0.0.1', 7, '2018-06-23 18:35:26', 0, '', 0, 3, NULL, 1.50, '71/2561201806231835'),
(228, 7, '1/2561', 0, 34, '127.0.0.1', 7, '2018-06-23 16:35:54', '127.0.0.1', 7, '2018-06-23 18:35:26', 0, '', 0, 3, NULL, 1.50, '71/2561201806231835'),
(229, 18, '1/2561', 0, 1, '127.0.0.1', 18, '2018-06-24 11:46:32', '127.0.0.1', 7, '2018-06-24 18:47:59', 0, '127.0.0.1', 18, 1, '0000-00-00 00:00:00', 0.00, '181/2561201806241347'),
(230, 18, '1/2561', 0, 2, '127.0.0.1', 18, '2018-06-24 11:46:32', '127.0.0.1', 7, '2018-06-24 18:47:59', 0, '127.0.0.1', 18, 1, '0000-00-00 00:00:00', 0.00, '181/2561201806241347'),
(231, 18, '1/2561', 0, 3, '127.0.0.1', 18, '2018-06-24 11:46:32', '127.0.0.1', 7, '2018-06-24 18:47:59', 0, '127.0.0.1', 18, 1, '0000-00-00 00:00:00', 0.00, '181/2561201806241347'),
(232, 18, '1/2561', 0, 4, '127.0.0.1', 18, '2018-06-24 11:46:32', '127.0.0.1', 7, '2018-06-24 18:47:59', 0, '127.0.0.1', 18, 1, '0000-00-00 00:00:00', 0.00, '181/2561201806241347'),
(233, 18, '1/2561', 0, 5, '127.0.0.1', 18, '2018-06-24 11:46:32', '127.0.0.1', 7, '2018-06-24 18:47:59', 0, '127.0.0.1', 18, 1, '0000-00-00 00:00:00', 15.00, '181/2561201806241347'),
(234, 18, '1/2561', 0, 6, '127.0.0.1', 18, '2018-06-24 11:46:32', '127.0.0.1', 7, '2018-06-24 18:47:59', 0, '127.0.0.1', 18, 1, '0000-00-00 00:00:00', 0.00, '181/2561201806241347'),
(235, 18, '1/2561', 0, 7, '127.0.0.1', 18, '2018-06-24 11:46:32', '127.0.0.1', 7, '2018-06-24 18:47:59', 0, '127.0.0.1', 18, 1, '0000-00-00 00:00:00', 0.00, '181/2561201806241347'),
(236, 18, '1/2561', 0, 8, '127.0.0.1', 18, '2018-06-24 11:46:32', '127.0.0.1', 7, '2018-06-24 18:47:59', 0, '127.0.0.1', 18, 1, '0000-00-00 00:00:00', 0.00, '181/2561201806241347'),
(237, 18, '1/2561', 0, 9, '127.0.0.1', 18, '2018-06-24 11:46:32', '127.0.0.1', 7, '2018-06-24 18:47:59', 0, '127.0.0.1', 18, 1, '0000-00-00 00:00:00', 0.00, '181/2561201806241347'),
(238, 18, '1/2561', 0, 10, '127.0.0.1', 18, '2018-06-24 11:46:32', '127.0.0.1', 7, '2018-06-24 18:47:59', 0, '127.0.0.1', 18, 1, '0000-00-00 00:00:00', 15.00, '181/2561201806241347'),
(239, 18, '1/2561', 0, 11, '127.0.0.1', 18, '2018-06-24 11:46:32', '127.0.0.1', 7, '2018-06-24 18:47:59', 0, '127.0.0.1', 18, 1, '0000-00-00 00:00:00', 0.00, '181/2561201806241347'),
(240, 18, '1/2561', 0, 12, '127.0.0.1', 18, '2018-06-24 11:46:32', '127.0.0.1', 7, '2018-06-24 18:47:59', 0, '127.0.0.1', 18, 1, '0000-00-00 00:00:00', 0.00, '181/2561201806241347'),
(241, 18, '1/2561', 0, 13, '127.0.0.1', 18, '2018-06-24 11:46:32', '127.0.0.1', 7, '2018-06-24 18:47:59', 0, '127.0.0.1', 18, 1, '0000-00-00 00:00:00', 0.00, '181/2561201806241347'),
(242, 18, '1/2561', 0, 14, '127.0.0.1', 18, '2018-06-24 11:46:32', '127.0.0.1', 7, '2018-06-24 18:47:59', 0, '127.0.0.1', 18, 1, '0000-00-00 00:00:00', 0.00, '181/2561201806241347'),
(243, 18, '1/2561', 0, 15, '127.0.0.1', 18, '2018-06-24 11:46:32', '127.0.0.1', 7, '2018-06-24 18:47:59', 0, '127.0.0.1', 18, 1, '0000-00-00 00:00:00', 15.00, '181/2561201806241347'),
(244, 18, '1/2561', 0, 16, '127.0.0.1', 18, '2018-06-24 11:46:32', '127.0.0.1', 7, '2018-06-24 18:47:59', 0, '127.0.0.1', 18, 1, '0000-00-00 00:00:00', 0.00, '181/2561201806241347'),
(245, 18, '1/2561', 0, 17, '127.0.0.1', 18, '2018-06-24 11:46:32', '127.0.0.1', 7, '2018-06-24 18:47:59', 0, '127.0.0.1', 18, 1, '0000-00-00 00:00:00', 0.00, '181/2561201806241347'),
(246, 18, '1/2561', 0, 18, '127.0.0.1', 18, '2018-06-24 11:46:32', '127.0.0.1', 7, '2018-06-24 18:47:59', 0, '127.0.0.1', 18, 1, '0000-00-00 00:00:00', 0.00, '181/2561201806241347'),
(247, 18, '1/2561', 0, 19, '127.0.0.1', 18, '2018-06-24 11:46:32', '127.0.0.1', 7, '2018-06-24 18:47:59', 0, '127.0.0.1', 18, 1, '0000-00-00 00:00:00', 0.00, '181/2561201806241347'),
(248, 18, '1/2561', 0, 20, '127.0.0.1', 18, '2018-06-24 11:46:32', '127.0.0.1', 7, '2018-06-24 18:47:59', 0, '127.0.0.1', 18, 1, '0000-00-00 00:00:00', 15.00, '181/2561201806241347'),
(249, 18, '1/2561', 0, 21, '127.0.0.1', 18, '2018-06-24 11:46:32', '127.0.0.1', 7, '2018-06-24 18:47:59', 0, '127.0.0.1', 18, 1, '0000-00-00 00:00:00', 10.00, '181/2561201806241347'),
(250, 18, '1/2561', 0, 1, '127.0.0.1', 18, '2018-06-24 11:47:20', '', 0, NULL, 0, '', 0, 2, NULL, 0.20, '181/2561201806241347'),
(251, 18, '1/2561', 0, 2, '127.0.0.1', 18, '2018-06-24 11:47:20', '', 0, NULL, 0, '', 0, 2, NULL, 0.20, '181/2561201806241347'),
(252, 18, '1/2561', 0, 3, '127.0.0.1', 18, '2018-06-24 11:47:20', '', 0, NULL, 0, '', 0, 2, NULL, 0.20, '181/2561201806241347'),
(253, 18, '1/2561', 0, 4, '127.0.0.1', 18, '2018-06-24 11:47:20', '', 0, NULL, 0, '', 0, 2, NULL, 0.20, '181/2561201806241347'),
(254, 18, '1/2561', 0, 5, '127.0.0.1', 18, '2018-06-24 11:47:20', '', 0, NULL, 0, '', 0, 2, NULL, 0.20, '181/2561201806241347'),
(255, 18, '1/2561', 0, 6, '127.0.0.1', 18, '2018-06-24 11:47:20', '', 0, NULL, 0, '', 0, 2, NULL, 0.20, '181/2561201806241347'),
(256, 18, '1/2561', 0, 7, '127.0.0.1', 18, '2018-06-24 11:47:20', '', 0, NULL, 0, '', 0, 2, NULL, 0.20, '181/2561201806241347'),
(257, 18, '1/2561', 0, 8, '127.0.0.1', 18, '2018-06-24 11:47:20', '', 0, NULL, 0, '', 0, 2, NULL, 0.20, '181/2561201806241347'),
(258, 18, '1/2561', 0, 9, '127.0.0.1', 18, '2018-06-24 11:47:20', '', 0, NULL, 0, '', 0, 2, NULL, 0.20, '181/2561201806241347'),
(259, 18, '1/2561', 0, 10, '127.0.0.1', 18, '2018-06-24 11:47:20', '', 0, NULL, 0, '', 0, 2, NULL, 0.20, '181/2561201806241347'),
(260, 18, '1/2561', 0, 11, '127.0.0.1', 18, '2018-06-24 11:47:20', '', 0, NULL, 0, '', 0, 2, NULL, 0.20, '181/2561201806241347'),
(261, 18, '1/2561', 0, 12, '127.0.0.1', 18, '2018-06-24 11:47:20', '', 0, NULL, 0, '', 0, 2, NULL, 0.20, '181/2561201806241347'),
(262, 18, '1/2561', 0, 13, '127.0.0.1', 18, '2018-06-24 11:47:20', '', 0, NULL, 0, '', 0, 2, NULL, 0.20, '181/2561201806241347'),
(263, 18, '1/2561', 0, 14, '127.0.0.1', 18, '2018-06-24 11:47:20', '', 0, NULL, 0, '', 0, 2, NULL, 0.20, '181/2561201806241347'),
(264, 18, '1/2561', 0, 15, '127.0.0.1', 18, '2018-06-24 11:47:20', '', 0, NULL, 0, '', 0, 2, NULL, 0.40, '181/2561201806241347'),
(265, 18, '1/2561', 0, 16, '127.0.0.1', 18, '2018-06-24 11:47:20', '', 0, NULL, 0, '', 0, 2, NULL, 0.40, '181/2561201806241347'),
(266, 18, '1/2561', 0, 17, '127.0.0.1', 18, '2018-06-24 11:47:20', '', 0, NULL, 0, '', 0, 2, NULL, 0.20, '181/2561201806241347'),
(267, 18, '1/2561', 0, 18, '127.0.0.1', 18, '2018-06-24 11:47:20', '', 0, NULL, 0, '', 0, 2, NULL, 0.20, '181/2561201806241347'),
(268, 18, '1/2561', 0, 19, '127.0.0.1', 18, '2018-06-24 11:47:20', '', 0, NULL, 0, '', 0, 2, NULL, 0.20, '181/2561201806241347'),
(269, 18, '1/2561', 0, 20, '127.0.0.1', 18, '2018-06-24 11:47:20', '', 0, NULL, 0, '', 0, 2, NULL, 0.20, '181/2561201806241347'),
(270, 18, '1/2561', 0, 21, '127.0.0.1', 18, '2018-06-24 11:47:20', '', 0, NULL, 0, '', 0, 2, NULL, 0.20, '181/2561201806241347'),
(271, 18, '1/2561', 0, 22, '127.0.0.1', 18, '2018-06-24 11:47:20', '', 0, NULL, 0, '', 0, 2, NULL, 0.20, '181/2561201806241347'),
(272, 18, '1/2561', 0, 23, '127.0.0.1', 18, '2018-06-24 11:47:20', '', 0, NULL, 0, '', 0, 2, NULL, 0.50, '181/2561201806241347'),
(273, 18, '1/2561', 0, 24, '127.0.0.1', 18, '2018-06-24 11:47:20', '', 0, NULL, 0, '', 0, 2, NULL, 0.20, '181/2561201806241347'),
(274, 18, '1/2561', 0, 25, '127.0.0.1', 18, '2018-06-24 11:47:20', '', 0, NULL, 0, '', 0, 2, NULL, 0.20, '181/2561201806241347'),
(275, 18, '1/2561', 0, 26, '127.0.0.1', 18, '2018-06-24 11:47:20', '', 0, NULL, 0, '', 0, 2, NULL, 0.20, '181/2561201806241347'),
(276, 18, '1/2561', 0, 20, '127.0.0.1', 18, '2018-06-24 11:47:40', '', 0, NULL, 0, '', 0, 3, NULL, 1.50, '181/2561201806241347'),
(277, 18, '1/2561', 0, 21, '127.0.0.1', 18, '2018-06-24 11:47:40', '', 0, NULL, 0, '', 0, 3, NULL, 1.50, '181/2561201806241347'),
(278, 18, '1/2561', 0, 22, '127.0.0.1', 18, '2018-06-24 11:47:40', '', 0, NULL, 0, '', 0, 3, NULL, 1.50, '181/2561201806241347'),
(279, 18, '1/2561', 0, 23, '127.0.0.1', 18, '2018-06-24 11:47:40', '', 0, NULL, 0, '', 0, 3, NULL, 1.50, '181/2561201806241347'),
(280, 18, '1/2561', 0, 24, '127.0.0.1', 18, '2018-06-24 11:47:40', '', 0, NULL, 0, '', 0, 3, NULL, 1.50, '181/2561201806241347'),
(281, 18, '1/2561', 0, 31, '127.0.0.1', 18, '2018-06-24 11:47:40', '', 0, NULL, 0, '', 0, 3, NULL, 1.50, '181/2561201806241347'),
(282, 18, '1/2561', 0, 32, '127.0.0.1', 18, '2018-06-24 11:47:40', '', 0, NULL, 0, '', 0, 3, NULL, 1.50, '181/2561201806241347'),
(283, 18, '1/2561', 0, 33, '127.0.0.1', 18, '2018-06-24 11:47:40', '', 0, NULL, 0, '', 0, 3, NULL, 1.50, '181/2561201806241347'),
(284, 18, '1/2561', 0, 34, '127.0.0.1', 18, '2018-06-24 11:47:40', '', 0, NULL, 0, '', 0, 3, NULL, 1.50, '181/2561201806241347'),
(285, 19, '1/2561', 0, 1, '127.0.0.1', 19, '2018-06-24 11:51:20', '127.0.0.1', 7, '2018-06-24 18:54:21', 0, '127.0.0.1', 19, 1, '0000-00-00 00:00:00', 0.00, '191/2561201806241353'),
(286, 19, '1/2561', 0, 2, '127.0.0.1', 19, '2018-06-24 11:51:20', '127.0.0.1', 7, '2018-06-24 18:54:21', 0, '127.0.0.1', 19, 1, '0000-00-00 00:00:00', 0.00, '191/2561201806241353'),
(287, 19, '1/2561', 0, 3, '127.0.0.1', 19, '2018-06-24 11:51:20', '127.0.0.1', 7, '2018-06-24 18:54:21', 0, '127.0.0.1', 19, 1, '0000-00-00 00:00:00', 0.00, '191/2561201806241353'),
(288, 19, '1/2561', 0, 4, '127.0.0.1', 19, '2018-06-24 11:51:20', '127.0.0.1', 7, '2018-06-24 18:54:21', 0, '127.0.0.1', 19, 1, '0000-00-00 00:00:00', 10.00, '191/2561201806241353'),
(289, 19, '1/2561', 0, 5, '127.0.0.1', 19, '2018-06-24 11:51:20', '127.0.0.1', 7, '2018-06-24 18:54:21', 0, '127.0.0.1', 19, 1, '0000-00-00 00:00:00', 0.00, '191/2561201806241353'),
(290, 19, '1/2561', 0, 6, '127.0.0.1', 19, '2018-06-24 11:51:20', '127.0.0.1', 7, '2018-06-24 18:54:21', 0, '127.0.0.1', 19, 1, '0000-00-00 00:00:00', 0.00, '191/2561201806241353'),
(291, 19, '1/2561', 0, 7, '127.0.0.1', 19, '2018-06-24 11:51:20', '127.0.0.1', 7, '2018-06-24 18:54:21', 0, '127.0.0.1', 19, 1, '0000-00-00 00:00:00', 0.00, '191/2561201806241353'),
(292, 19, '1/2561', 0, 8, '127.0.0.1', 19, '2018-06-24 11:51:20', '127.0.0.1', 7, '2018-06-24 18:54:21', 0, '127.0.0.1', 19, 1, '0000-00-00 00:00:00', 0.00, '191/2561201806241353'),
(293, 19, '1/2561', 0, 9, '127.0.0.1', 19, '2018-06-24 11:51:20', '127.0.0.1', 7, '2018-06-24 18:54:21', 0, '127.0.0.1', 19, 1, '0000-00-00 00:00:00', 10.00, '191/2561201806241353'),
(294, 19, '1/2561', 0, 10, '127.0.0.1', 19, '2018-06-24 11:51:20', '127.0.0.1', 7, '2018-06-24 18:54:21', 0, '127.0.0.1', 19, 1, '0000-00-00 00:00:00', 0.00, '191/2561201806241353'),
(295, 19, '1/2561', 0, 11, '127.0.0.1', 19, '2018-06-24 11:51:20', '127.0.0.1', 7, '2018-06-24 18:54:21', 0, '127.0.0.1', 19, 1, '0000-00-00 00:00:00', 0.00, '191/2561201806241353'),
(296, 19, '1/2561', 0, 12, '127.0.0.1', 19, '2018-06-24 11:51:20', '127.0.0.1', 7, '2018-06-24 18:54:21', 0, '127.0.0.1', 19, 1, '0000-00-00 00:00:00', 0.00, '191/2561201806241353'),
(297, 19, '1/2561', 0, 13, '127.0.0.1', 19, '2018-06-24 11:51:20', '127.0.0.1', 7, '2018-06-24 18:54:21', 0, '127.0.0.1', 19, 1, '0000-00-00 00:00:00', 0.00, '191/2561201806241353'),
(298, 19, '1/2561', 0, 14, '127.0.0.1', 19, '2018-06-24 11:51:20', '127.0.0.1', 7, '2018-06-24 18:54:21', 0, '127.0.0.1', 19, 1, '0000-00-00 00:00:00', 10.00, '191/2561201806241353'),
(299, 19, '1/2561', 0, 15, '127.0.0.1', 19, '2018-06-24 11:51:20', '127.0.0.1', 7, '2018-06-24 18:54:21', 0, '127.0.0.1', 19, 1, '0000-00-00 00:00:00', 0.00, '191/2561201806241353'),
(300, 19, '1/2561', 0, 16, '127.0.0.1', 19, '2018-06-24 11:51:20', '127.0.0.1', 7, '2018-06-24 18:54:21', 0, '127.0.0.1', 19, 1, '0000-00-00 00:00:00', 0.00, '191/2561201806241353'),
(301, 19, '1/2561', 0, 17, '127.0.0.1', 19, '2018-06-24 11:51:20', '127.0.0.1', 7, '2018-06-24 18:54:21', 0, '127.0.0.1', 19, 1, '0000-00-00 00:00:00', 0.00, '191/2561201806241353'),
(302, 19, '1/2561', 0, 18, '127.0.0.1', 19, '2018-06-24 11:51:20', '127.0.0.1', 7, '2018-06-24 18:54:21', 0, '127.0.0.1', 19, 1, '0000-00-00 00:00:00', 0.00, '191/2561201806241353'),
(303, 19, '1/2561', 0, 19, '127.0.0.1', 19, '2018-06-24 11:51:20', '127.0.0.1', 7, '2018-06-24 18:54:21', 0, '127.0.0.1', 19, 1, '0000-00-00 00:00:00', 0.00, '191/2561201806241353'),
(304, 19, '1/2561', 0, 20, '127.0.0.1', 19, '2018-06-24 11:51:20', '127.0.0.1', 7, '2018-06-24 18:54:21', 0, '127.0.0.1', 19, 1, '0000-00-00 00:00:00', 13.00, '191/2561201806241353'),
(305, 19, '1/2561', 0, 21, '127.0.0.1', 19, '2018-06-24 11:51:20', '127.0.0.1', 7, '2018-06-24 18:54:21', 0, '127.0.0.1', 19, 1, '0000-00-00 00:00:00', 9.00, '191/2561201806241353'),
(306, 19, '1/2561', 0, 1, '127.0.0.1', 19, '2018-06-24 11:52:14', '', 0, NULL, 0, '', 0, 2, NULL, 0.20, '191/2561201806241353'),
(307, 19, '1/2561', 0, 2, '127.0.0.1', 19, '2018-06-24 11:52:14', '', 0, NULL, 0, '', 0, 2, NULL, 0.20, '191/2561201806241353'),
(308, 19, '1/2561', 0, 3, '127.0.0.1', 19, '2018-06-24 11:52:14', '', 0, NULL, 0, '', 0, 2, NULL, 0.20, '191/2561201806241353'),
(309, 19, '1/2561', 0, 4, '127.0.0.1', 19, '2018-06-24 11:52:14', '', 0, NULL, 0, '', 0, 2, NULL, 0.20, '191/2561201806241353'),
(310, 19, '1/2561', 0, 5, '127.0.0.1', 19, '2018-06-24 11:52:14', '', 0, NULL, 0, '', 0, 2, NULL, 0.20, '191/2561201806241353'),
(311, 19, '1/2561', 0, 6, '127.0.0.1', 19, '2018-06-24 11:52:14', '', 0, NULL, 0, '', 0, 2, NULL, 0.20, '191/2561201806241353'),
(312, 19, '1/2561', 0, 7, '127.0.0.1', 19, '2018-06-24 11:52:14', '', 0, NULL, 0, '', 0, 2, NULL, 0.20, '191/2561201806241353'),
(313, 19, '1/2561', 0, 8, '127.0.0.1', 19, '2018-06-24 11:52:14', '', 0, NULL, 0, '', 0, 2, NULL, 0.20, '191/2561201806241353'),
(314, 19, '1/2561', 0, 9, '127.0.0.1', 19, '2018-06-24 11:52:14', '', 0, NULL, 0, '', 0, 2, NULL, 0.20, '191/2561201806241353'),
(315, 19, '1/2561', 0, 10, '127.0.0.1', 19, '2018-06-24 11:52:14', '', 0, NULL, 0, '', 0, 2, NULL, 0.20, '191/2561201806241353'),
(316, 19, '1/2561', 0, 11, '127.0.0.1', 19, '2018-06-24 11:52:14', '', 0, NULL, 0, '', 0, 2, NULL, 0.20, '191/2561201806241353'),
(317, 19, '1/2561', 0, 12, '127.0.0.1', 19, '2018-06-24 11:52:14', '', 0, NULL, 0, '', 0, 2, NULL, 0.20, '191/2561201806241353'),
(318, 19, '1/2561', 0, 13, '127.0.0.1', 19, '2018-06-24 11:52:14', '', 0, NULL, 0, '', 0, 2, NULL, 0.20, '191/2561201806241353'),
(319, 19, '1/2561', 0, 14, '127.0.0.1', 19, '2018-06-24 11:52:14', '', 0, NULL, 0, '', 0, 2, NULL, 0.20, '191/2561201806241353'),
(320, 19, '1/2561', 0, 15, '127.0.0.1', 19, '2018-06-24 11:52:14', '', 0, NULL, 0, '', 0, 2, NULL, 0.20, '191/2561201806241353'),
(321, 19, '1/2561', 0, 16, '127.0.0.1', 19, '2018-06-24 11:52:14', '', 0, NULL, 0, '', 0, 2, NULL, 0.20, '191/2561201806241353'),
(322, 19, '1/2561', 0, 17, '127.0.0.1', 19, '2018-06-24 11:52:14', '', 0, NULL, 0, '', 0, 2, NULL, 0.20, '191/2561201806241353');
INSERT INTO `tbl_score` (`s_id`, `ref_p_id`, `ref_dq_id`, `ref_qt_id`, `ref_q1_number`, `s_ip1`, `s_p_id_1`, `s_dateq1`, `s_ip2`, `s_p_id_2`, `s_dateq2`, `s_status`, `s_ip3`, `s_p_id_3`, `s_group_no`, `s_dateq3`, `s_score`, `skey`) VALUES
(323, 19, '1/2561', 0, 18, '127.0.0.1', 19, '2018-06-24 11:52:14', '', 0, NULL, 0, '', 0, 2, NULL, 0.20, '191/2561201806241353'),
(324, 19, '1/2561', 0, 19, '127.0.0.1', 19, '2018-06-24 11:52:14', '', 0, NULL, 0, '', 0, 2, NULL, 0.20, '191/2561201806241353'),
(325, 19, '1/2561', 0, 20, '127.0.0.1', 19, '2018-06-24 11:52:14', '', 0, NULL, 0, '', 0, 2, NULL, 0.20, '191/2561201806241353'),
(326, 19, '1/2561', 0, 21, '127.0.0.1', 19, '2018-06-24 11:52:14', '', 0, NULL, 0, '', 0, 2, NULL, 0.20, '191/2561201806241353'),
(327, 19, '1/2561', 0, 22, '127.0.0.1', 19, '2018-06-24 11:52:14', '', 0, NULL, 0, '', 0, 2, NULL, 0.20, '191/2561201806241353'),
(328, 19, '1/2561', 0, 23, '127.0.0.1', 19, '2018-06-24 11:52:14', '', 0, NULL, 0, '', 0, 2, NULL, 0.50, '191/2561201806241353'),
(329, 19, '1/2561', 0, 24, '127.0.0.1', 19, '2018-06-24 11:52:14', '', 0, NULL, 0, '', 0, 2, NULL, 0.50, '191/2561201806241353'),
(330, 19, '1/2561', 0, 25, '127.0.0.1', 19, '2018-06-24 11:52:14', '', 0, NULL, 0, '', 0, 2, NULL, 0.50, '191/2561201806241353'),
(331, 19, '1/2561', 0, 26, '127.0.0.1', 19, '2018-06-24 11:52:14', '', 0, NULL, 0, '', 0, 2, NULL, 0.50, '191/2561201806241353'),
(332, 19, '1/2561', 0, 25, '127.0.0.1', 19, '2018-06-24 11:53:37', '', 0, NULL, 0, '', 0, 3, NULL, 2.00, '191/2561201806241353'),
(333, 19, '1/2561', 0, 26, '127.0.0.1', 19, '2018-06-24 11:53:37', '', 0, NULL, 0, '', 0, 3, NULL, 1.50, '191/2561201806241353'),
(334, 19, '1/2561', 0, 27, '127.0.0.1', 19, '2018-06-24 11:53:37', '', 0, NULL, 0, '', 0, 3, NULL, 1.50, '191/2561201806241353'),
(335, 19, '1/2561', 0, 28, '127.0.0.1', 19, '2018-06-24 11:53:37', '', 0, NULL, 0, '', 0, 3, NULL, 1.50, '191/2561201806241353'),
(336, 19, '1/2561', 0, 29, '127.0.0.1', 19, '2018-06-24 11:53:37', '', 0, NULL, 0, '', 0, 3, NULL, 1.50, '191/2561201806241353'),
(337, 19, '1/2561', 0, 30, '127.0.0.1', 19, '2018-06-24 11:53:37', '', 0, NULL, 0, '', 0, 3, NULL, 1.00, '191/2561201806241353'),
(338, 19, '1/2561', 0, 31, '127.0.0.1', 19, '2018-06-24 11:53:37', '', 0, NULL, 0, '', 0, 3, NULL, 1.50, '191/2561201806241353'),
(339, 19, '1/2561', 0, 32, '127.0.0.1', 19, '2018-06-24 11:53:37', '', 0, NULL, 0, '', 0, 3, NULL, 1.50, '191/2561201806241353'),
(340, 19, '1/2561', 0, 33, '127.0.0.1', 19, '2018-06-24 11:53:37', '', 0, NULL, 0, '', 0, 3, NULL, 1.50, '191/2561201806241353'),
(341, 19, '1/2561', 0, 34, '127.0.0.1', 19, '2018-06-24 11:53:37', '', 0, NULL, 0, '', 0, 3, NULL, 1.50, '191/2561201806241353'),
(342, 15, '1/2561', 0, 1, '127.0.0.1', 15, '2018-06-24 12:00:02', '127.0.0.1', 7, '2018-06-24 14:08:16', 0, '127.0.0.1', 15, 1, '0000-00-00 00:00:00', 3.00, '151/2561201806241403'),
(343, 15, '1/2561', 0, 2, '127.0.0.1', 15, '2018-06-24 12:00:02', '127.0.0.1', 7, '2018-06-24 14:08:16', 0, '127.0.0.1', 15, 1, '0000-00-00 00:00:00', 0.00, '151/2561201806241403'),
(344, 15, '1/2561', 0, 3, '127.0.0.1', 15, '2018-06-24 12:00:02', '127.0.0.1', 7, '2018-06-24 14:08:16', 0, '127.0.0.1', 15, 1, '0000-00-00 00:00:00', 0.00, '151/2561201806241403'),
(345, 15, '1/2561', 0, 4, '127.0.0.1', 15, '2018-06-24 12:00:02', '127.0.0.1', 7, '2018-06-24 14:08:16', 0, '127.0.0.1', 15, 1, '0000-00-00 00:00:00', 0.00, '151/2561201806241403'),
(346, 15, '1/2561', 0, 5, '127.0.0.1', 15, '2018-06-24 12:00:02', '127.0.0.1', 7, '2018-06-24 14:08:16', 0, '127.0.0.1', 15, 1, '0000-00-00 00:00:00', 0.00, '151/2561201806241403'),
(347, 15, '1/2561', 0, 6, '127.0.0.1', 15, '2018-06-24 12:00:02', '127.0.0.1', 7, '2018-06-24 14:08:16', 0, '127.0.0.1', 15, 1, '0000-00-00 00:00:00', 0.00, '151/2561201806241403'),
(348, 15, '1/2561', 0, 7, '127.0.0.1', 15, '2018-06-24 12:00:02', '127.0.0.1', 7, '2018-06-24 14:08:16', 0, '127.0.0.1', 15, 1, '0000-00-00 00:00:00', 0.00, '151/2561201806241403'),
(349, 15, '1/2561', 0, 8, '127.0.0.1', 15, '2018-06-24 12:00:02', '127.0.0.1', 7, '2018-06-24 14:08:16', 0, '127.0.0.1', 15, 1, '0000-00-00 00:00:00', 0.00, '151/2561201806241403'),
(350, 15, '1/2561', 0, 9, '127.0.0.1', 15, '2018-06-24 12:00:02', '127.0.0.1', 7, '2018-06-24 14:08:16', 0, '127.0.0.1', 15, 1, '0000-00-00 00:00:00', 10.00, '151/2561201806241403'),
(351, 15, '1/2561', 0, 10, '127.0.0.1', 15, '2018-06-24 12:00:02', '127.0.0.1', 7, '2018-06-24 14:08:16', 0, '127.0.0.1', 15, 1, '0000-00-00 00:00:00', 0.00, '151/2561201806241403'),
(352, 15, '1/2561', 0, 11, '127.0.0.1', 15, '2018-06-24 12:00:02', '127.0.0.1', 7, '2018-06-24 14:08:16', 0, '127.0.0.1', 15, 1, '0000-00-00 00:00:00', 0.00, '151/2561201806241403'),
(353, 15, '1/2561', 0, 12, '127.0.0.1', 15, '2018-06-24 12:00:02', '127.0.0.1', 7, '2018-06-24 14:08:16', 0, '127.0.0.1', 15, 1, '0000-00-00 00:00:00', 0.00, '151/2561201806241403'),
(354, 15, '1/2561', 0, 13, '127.0.0.1', 15, '2018-06-24 12:00:02', '127.0.0.1', 7, '2018-06-24 14:08:16', 0, '127.0.0.1', 15, 1, '0000-00-00 00:00:00', 0.00, '151/2561201806241403'),
(355, 15, '1/2561', 0, 14, '127.0.0.1', 15, '2018-06-24 12:00:02', '127.0.0.1', 7, '2018-06-24 14:08:16', 0, '127.0.0.1', 15, 1, '0000-00-00 00:00:00', 0.00, '151/2561201806241403'),
(356, 15, '1/2561', 0, 15, '127.0.0.1', 15, '2018-06-24 12:00:02', '127.0.0.1', 7, '2018-06-24 14:08:16', 0, '127.0.0.1', 15, 1, '0000-00-00 00:00:00', 13.00, '151/2561201806241403'),
(357, 15, '1/2561', 0, 16, '127.0.0.1', 15, '2018-06-24 12:00:02', '127.0.0.1', 7, '2018-06-24 14:08:16', 0, '127.0.0.1', 15, 1, '0000-00-00 00:00:00', 0.00, '151/2561201806241403'),
(358, 15, '1/2561', 0, 17, '127.0.0.1', 15, '2018-06-24 12:00:02', '127.0.0.1', 7, '2018-06-24 14:08:16', 0, '127.0.0.1', 15, 1, '0000-00-00 00:00:00', 0.00, '151/2561201806241403'),
(359, 15, '1/2561', 0, 18, '127.0.0.1', 15, '2018-06-24 12:00:02', '127.0.0.1', 7, '2018-06-24 14:08:16', 0, '127.0.0.1', 15, 1, '0000-00-00 00:00:00', 0.00, '151/2561201806241403'),
(360, 15, '1/2561', 0, 19, '127.0.0.1', 15, '2018-06-24 12:00:02', '127.0.0.1', 7, '2018-06-24 14:08:16', 0, '127.0.0.1', 15, 1, '0000-00-00 00:00:00', 0.00, '151/2561201806241403'),
(361, 15, '1/2561', 0, 20, '127.0.0.1', 15, '2018-06-24 12:00:02', '127.0.0.1', 7, '2018-06-24 14:08:16', 0, '127.0.0.1', 15, 1, '0000-00-00 00:00:00', 15.00, '151/2561201806241403'),
(362, 15, '1/2561', 0, 21, '127.0.0.1', 15, '2018-06-24 12:00:02', '127.0.0.1', 7, '2018-06-24 14:08:16', 0, '127.0.0.1', 15, 1, '0000-00-00 00:00:00', 10.00, '151/2561201806241403'),
(363, 15, '1/2561', 0, 1, '127.0.0.1', 15, '2018-06-24 12:02:52', '', 7, '2018-06-24 14:08:16', 0, '', 0, 2, NULL, 0.30, '151/2561201806241403'),
(364, 15, '1/2561', 0, 2, '127.0.0.1', 15, '2018-06-24 12:02:52', '', 7, '2018-06-24 14:08:16', 0, '', 0, 2, NULL, 0.30, '151/2561201806241403'),
(365, 15, '1/2561', 0, 3, '127.0.0.1', 15, '2018-06-24 12:02:52', '', 7, '2018-06-24 14:08:16', 0, '', 0, 2, NULL, 0.30, '151/2561201806241403'),
(366, 15, '1/2561', 0, 4, '127.0.0.1', 15, '2018-06-24 12:02:52', '', 7, '2018-06-24 14:08:16', 0, '', 0, 2, NULL, 0.30, '151/2561201806241403'),
(367, 15, '1/2561', 0, 5, '127.0.0.1', 15, '2018-06-24 12:02:52', '', 7, '2018-06-24 14:08:16', 0, '', 0, 2, NULL, 0.30, '151/2561201806241403'),
(368, 15, '1/2561', 0, 6, '127.0.0.1', 15, '2018-06-24 12:02:52', '', 7, '2018-06-24 14:08:16', 0, '', 0, 2, NULL, 0.30, '151/2561201806241403'),
(369, 15, '1/2561', 0, 7, '127.0.0.1', 15, '2018-06-24 12:02:52', '', 7, '2018-06-24 14:08:16', 0, '', 0, 2, NULL, 0.30, '151/2561201806241403'),
(370, 15, '1/2561', 0, 8, '127.0.0.1', 15, '2018-06-24 12:02:52', '', 7, '2018-06-24 14:08:16', 0, '', 0, 2, NULL, 0.30, '151/2561201806241403'),
(371, 15, '1/2561', 0, 9, '127.0.0.1', 15, '2018-06-24 12:02:52', '', 7, '2018-06-24 14:08:16', 0, '', 0, 2, NULL, 0.20, '151/2561201806241403'),
(372, 15, '1/2561', 0, 10, '127.0.0.1', 15, '2018-06-24 12:02:52', '', 7, '2018-06-24 14:08:16', 0, '', 0, 2, NULL, 0.50, '151/2561201806241403'),
(373, 15, '1/2561', 0, 11, '127.0.0.1', 15, '2018-06-24 12:02:52', '', 7, '2018-06-24 14:08:16', 0, '', 0, 2, NULL, 0.50, '151/2561201806241403'),
(374, 15, '1/2561', 0, 12, '127.0.0.1', 15, '2018-06-24 12:02:52', '', 7, '2018-06-24 14:08:16', 0, '', 0, 2, NULL, 0.50, '151/2561201806241403'),
(375, 15, '1/2561', 0, 13, '127.0.0.1', 15, '2018-06-24 12:02:52', '', 7, '2018-06-24 14:08:16', 0, '', 0, 2, NULL, 0.50, '151/2561201806241403'),
(376, 15, '1/2561', 0, 14, '127.0.0.1', 15, '2018-06-24 12:02:52', '', 7, '2018-06-24 14:08:16', 0, '', 0, 2, NULL, 0.40, '151/2561201806241403'),
(377, 15, '1/2561', 0, 15, '127.0.0.1', 15, '2018-06-24 12:02:52', '', 7, '2018-06-24 14:08:16', 0, '', 0, 2, NULL, 0.40, '151/2561201806241403'),
(378, 15, '1/2561', 0, 16, '127.0.0.1', 15, '2018-06-24 12:02:52', '', 7, '2018-06-24 14:08:16', 0, '', 0, 2, NULL, 0.40, '151/2561201806241403'),
(379, 15, '1/2561', 0, 17, '127.0.0.1', 15, '2018-06-24 12:02:52', '', 7, '2018-06-24 14:08:16', 0, '', 0, 2, NULL, 0.40, '151/2561201806241403'),
(380, 15, '1/2561', 0, 18, '127.0.0.1', 15, '2018-06-24 12:02:52', '', 7, '2018-06-24 14:08:16', 0, '', 0, 2, NULL, 0.40, '151/2561201806241403'),
(381, 15, '1/2561', 0, 19, '127.0.0.1', 15, '2018-06-24 12:02:52', '', 7, '2018-06-24 14:08:16', 0, '', 0, 2, NULL, 1.50, '151/2561201806241403'),
(382, 15, '1/2561', 0, 20, '127.0.0.1', 15, '2018-06-24 12:02:52', '', 7, '2018-06-24 14:08:16', 0, '', 0, 2, NULL, 1.50, '151/2561201806241403'),
(383, 15, '1/2561', 0, 21, '127.0.0.1', 15, '2018-06-24 12:02:52', '', 7, '2018-06-24 14:08:16', 0, '', 0, 2, NULL, 1.50, '151/2561201806241403'),
(384, 15, '1/2561', 0, 22, '127.0.0.1', 15, '2018-06-24 12:02:52', '', 7, '2018-06-24 14:08:16', 0, '', 0, 2, NULL, 1.50, '151/2561201806241403'),
(385, 15, '1/2561', 0, 23, '127.0.0.1', 15, '2018-06-24 12:02:52', '', 7, '2018-06-24 14:08:16', 0, '', 0, 2, NULL, 0.50, '151/2561201806241403'),
(386, 15, '1/2561', 0, 24, '127.0.0.1', 15, '2018-06-24 12:02:52', '', 7, '2018-06-24 14:08:16', 0, '', 0, 2, NULL, 0.50, '151/2561201806241403'),
(387, 15, '1/2561', 0, 25, '127.0.0.1', 15, '2018-06-24 12:02:52', '', 7, '2018-06-24 14:08:16', 0, '', 0, 2, NULL, 0.50, '151/2561201806241403'),
(388, 15, '1/2561', 0, 26, '127.0.0.1', 15, '2018-06-24 12:02:52', '', 7, '2018-06-24 14:08:16', 0, '', 0, 2, NULL, 0.50, '151/2561201806241403'),
(389, 15, '1/2561', 0, 2, '127.0.0.1', 15, '2018-06-24 12:03:55', '', 7, '2018-06-24 14:08:16', 0, '', 0, 3, NULL, 1.30, '151/2561201806241403'),
(390, 15, '1/2561', 0, 7, '127.0.0.1', 15, '2018-06-24 12:03:55', '', 7, '2018-06-24 14:08:16', 0, '', 0, 3, NULL, 1.50, '151/2561201806241403'),
(391, 15, '1/2561', 0, 8, '127.0.0.1', 15, '2018-06-24 12:03:55', '', 7, '2018-06-24 14:08:16', 0, '', 0, 3, NULL, 1.50, '151/2561201806241403'),
(392, 15, '1/2561', 0, 9, '127.0.0.1', 15, '2018-06-24 12:03:55', '', 7, '2018-06-24 14:08:16', 0, '', 0, 3, NULL, 1.50, '151/2561201806241403'),
(393, 15, '1/2561', 0, 10, '127.0.0.1', 15, '2018-06-24 12:03:55', '', 7, '2018-06-24 14:08:16', 0, '', 0, 3, NULL, 1.50, '151/2561201806241403'),
(394, 15, '1/2561', 0, 12, '127.0.0.1', 15, '2018-06-24 12:03:55', '', 7, '2018-06-24 14:08:16', 0, '', 0, 3, NULL, 1.50, '151/2561201806241403'),
(395, 15, '1/2561', 0, 31, '127.0.0.1', 15, '2018-06-24 12:03:55', '', 7, '2018-06-24 14:08:16', 0, '', 0, 3, NULL, 1.50, '151/2561201806241403'),
(396, 15, '1/2561', 0, 32, '127.0.0.1', 15, '2018-06-24 12:03:55', '', 7, '2018-06-24 14:08:16', 0, '', 0, 3, NULL, 1.50, '151/2561201806241403'),
(397, 15, '1/2561', 0, 33, '127.0.0.1', 15, '2018-06-24 12:03:55', '', 7, '2018-06-24 14:08:16', 0, '', 0, 3, NULL, 1.50, '151/2561201806241403'),
(398, 15, '1/2561', 0, 34, '127.0.0.1', 15, '2018-06-24 12:03:55', '', 7, '2018-06-24 14:08:16', 0, '', 0, 3, NULL, 1.50, '151/2561201806241403'),
(399, 21, '1/2561', 0, 1, '127.0.0.1', 21, '2018-06-24 12:15:58', '127.0.0.1', 7, '2018-06-24 14:20:29', 0, '127.0.0.1', 21, 1, '0000-00-00 00:00:00', 0.00, '211/2561201806241419'),
(400, 21, '1/2561', 0, 2, '127.0.0.1', 21, '2018-06-24 12:15:58', '127.0.0.1', 7, '2018-06-24 14:20:29', 0, '127.0.0.1', 21, 1, '0000-00-00 00:00:00', 0.00, '211/2561201806241419'),
(401, 21, '1/2561', 0, 3, '127.0.0.1', 21, '2018-06-24 12:15:58', '127.0.0.1', 7, '2018-06-24 14:20:29', 0, '127.0.0.1', 21, 1, '0000-00-00 00:00:00', 0.00, '211/2561201806241419'),
(402, 21, '1/2561', 0, 4, '127.0.0.1', 21, '2018-06-24 12:15:58', '127.0.0.1', 7, '2018-06-24 14:20:29', 0, '127.0.0.1', 21, 1, '0000-00-00 00:00:00', 0.00, '211/2561201806241419'),
(403, 21, '1/2561', 0, 5, '127.0.0.1', 21, '2018-06-24 12:15:58', '127.0.0.1', 7, '2018-06-24 14:20:29', 0, '127.0.0.1', 21, 1, '0000-00-00 00:00:00', 13.00, '211/2561201806241419'),
(404, 21, '1/2561', 0, 6, '127.0.0.1', 21, '2018-06-24 12:15:58', '127.0.0.1', 7, '2018-06-24 14:20:29', 0, '127.0.0.1', 21, 1, '0000-00-00 00:00:00', 0.00, '211/2561201806241419'),
(405, 21, '1/2561', 0, 7, '127.0.0.1', 21, '2018-06-24 12:15:58', '127.0.0.1', 7, '2018-06-24 14:20:29', 0, '127.0.0.1', 21, 1, '0000-00-00 00:00:00', 0.00, '211/2561201806241419'),
(406, 21, '1/2561', 0, 8, '127.0.0.1', 21, '2018-06-24 12:15:58', '127.0.0.1', 7, '2018-06-24 14:20:29', 0, '127.0.0.1', 21, 1, '0000-00-00 00:00:00', 0.00, '211/2561201806241419'),
(407, 21, '1/2561', 0, 9, '127.0.0.1', 21, '2018-06-24 12:15:58', '127.0.0.1', 7, '2018-06-24 14:20:29', 0, '127.0.0.1', 21, 1, '0000-00-00 00:00:00', 0.00, '211/2561201806241419'),
(408, 21, '1/2561', 0, 10, '127.0.0.1', 21, '2018-06-24 12:15:58', '127.0.0.1', 7, '2018-06-24 14:20:29', 0, '127.0.0.1', 21, 1, '0000-00-00 00:00:00', 13.00, '211/2561201806241419'),
(409, 21, '1/2561', 0, 11, '127.0.0.1', 21, '2018-06-24 12:15:58', '127.0.0.1', 7, '2018-06-24 14:20:29', 0, '127.0.0.1', 21, 1, '0000-00-00 00:00:00', 0.00, '211/2561201806241419'),
(410, 21, '1/2561', 0, 12, '127.0.0.1', 21, '2018-06-24 12:15:58', '127.0.0.1', 7, '2018-06-24 14:20:29', 0, '127.0.0.1', 21, 1, '0000-00-00 00:00:00', 0.00, '211/2561201806241419'),
(411, 21, '1/2561', 0, 13, '127.0.0.1', 21, '2018-06-24 12:15:58', '127.0.0.1', 7, '2018-06-24 14:20:29', 0, '127.0.0.1', 21, 1, '0000-00-00 00:00:00', 0.00, '211/2561201806241419'),
(412, 21, '1/2561', 0, 14, '127.0.0.1', 21, '2018-06-24 12:15:58', '127.0.0.1', 7, '2018-06-24 14:20:29', 0, '127.0.0.1', 21, 1, '0000-00-00 00:00:00', 0.00, '211/2561201806241419'),
(413, 21, '1/2561', 0, 15, '127.0.0.1', 21, '2018-06-24 12:15:58', '127.0.0.1', 7, '2018-06-24 14:20:29', 0, '127.0.0.1', 21, 1, '0000-00-00 00:00:00', 13.00, '211/2561201806241419'),
(414, 21, '1/2561', 0, 16, '127.0.0.1', 21, '2018-06-24 12:15:58', '127.0.0.1', 7, '2018-06-24 14:20:29', 0, '127.0.0.1', 21, 1, '0000-00-00 00:00:00', 0.00, '211/2561201806241419'),
(415, 21, '1/2561', 0, 17, '127.0.0.1', 21, '2018-06-24 12:15:58', '127.0.0.1', 7, '2018-06-24 14:20:29', 0, '127.0.0.1', 21, 1, '0000-00-00 00:00:00', 0.00, '211/2561201806241419'),
(416, 21, '1/2561', 0, 18, '127.0.0.1', 21, '2018-06-24 12:15:58', '127.0.0.1', 7, '2018-06-24 14:20:29', 0, '127.0.0.1', 21, 1, '0000-00-00 00:00:00', 0.00, '211/2561201806241419'),
(417, 21, '1/2561', 0, 19, '127.0.0.1', 21, '2018-06-24 12:15:58', '127.0.0.1', 7, '2018-06-24 14:20:29', 0, '127.0.0.1', 21, 1, '0000-00-00 00:00:00', 0.00, '211/2561201806241419'),
(418, 21, '1/2561', 0, 20, '127.0.0.1', 21, '2018-06-24 12:15:58', '127.0.0.1', 7, '2018-06-24 14:20:29', 0, '127.0.0.1', 21, 1, '0000-00-00 00:00:00', 13.00, '211/2561201806241419'),
(419, 21, '1/2561', 0, 21, '127.0.0.1', 21, '2018-06-24 12:15:58', '127.0.0.1', 7, '2018-06-24 14:20:29', 0, '127.0.0.1', 21, 1, '0000-00-00 00:00:00', 10.00, '211/2561201806241419'),
(420, 21, '1/2561', 0, 1, '127.0.0.1', 21, '2018-06-24 12:18:31', '', 7, '2018-06-24 14:20:29', 0, '', 0, 2, NULL, 0.30, '211/2561201806241419'),
(421, 21, '1/2561', 0, 2, '127.0.0.1', 21, '2018-06-24 12:18:31', '', 7, '2018-06-24 14:20:29', 0, '', 0, 2, NULL, 0.30, '211/2561201806241419'),
(422, 21, '1/2561', 0, 3, '127.0.0.1', 21, '2018-06-24 12:18:31', '', 7, '2018-06-24 14:20:29', 0, '', 0, 2, NULL, 0.30, '211/2561201806241419'),
(423, 21, '1/2561', 0, 4, '127.0.0.1', 21, '2018-06-24 12:18:31', '', 7, '2018-06-24 14:20:29', 0, '', 0, 2, NULL, 0.30, '211/2561201806241419'),
(424, 21, '1/2561', 0, 5, '127.0.0.1', 21, '2018-06-24 12:18:31', '', 7, '2018-06-24 14:20:29', 0, '', 0, 2, NULL, 0.30, '211/2561201806241419'),
(425, 21, '1/2561', 0, 6, '127.0.0.1', 21, '2018-06-24 12:18:31', '', 7, '2018-06-24 14:20:29', 0, '', 0, 2, NULL, 0.30, '211/2561201806241419'),
(426, 21, '1/2561', 0, 7, '127.0.0.1', 21, '2018-06-24 12:18:31', '', 7, '2018-06-24 14:20:29', 0, '', 0, 2, NULL, 0.30, '211/2561201806241419'),
(427, 21, '1/2561', 0, 8, '127.0.0.1', 21, '2018-06-24 12:18:31', '', 7, '2018-06-24 14:20:29', 0, '', 0, 2, NULL, 0.30, '211/2561201806241419'),
(428, 21, '1/2561', 0, 9, '127.0.0.1', 21, '2018-06-24 12:18:31', '', 7, '2018-06-24 14:20:29', 0, '', 0, 2, NULL, 0.30, '211/2561201806241419'),
(429, 21, '1/2561', 0, 10, '127.0.0.1', 21, '2018-06-24 12:18:31', '', 7, '2018-06-24 14:20:29', 0, '', 0, 2, NULL, 0.30, '211/2561201806241419'),
(430, 21, '1/2561', 0, 11, '127.0.0.1', 21, '2018-06-24 12:18:31', '', 7, '2018-06-24 14:20:29', 0, '', 0, 2, NULL, 0.30, '211/2561201806241419'),
(431, 21, '1/2561', 0, 12, '127.0.0.1', 21, '2018-06-24 12:18:31', '', 7, '2018-06-24 14:20:29', 0, '', 0, 2, NULL, 0.30, '211/2561201806241419'),
(432, 21, '1/2561', 0, 13, '127.0.0.1', 21, '2018-06-24 12:18:31', '', 7, '2018-06-24 14:20:29', 0, '', 0, 2, NULL, 0.30, '211/2561201806241419'),
(433, 21, '1/2561', 0, 14, '127.0.0.1', 21, '2018-06-24 12:18:31', '', 7, '2018-06-24 14:20:29', 0, '', 0, 2, NULL, 0.20, '211/2561201806241419'),
(434, 21, '1/2561', 0, 15, '127.0.0.1', 21, '2018-06-24 12:18:31', '', 7, '2018-06-24 14:20:29', 0, '', 0, 2, NULL, 0.30, '211/2561201806241419'),
(435, 21, '1/2561', 0, 16, '127.0.0.1', 21, '2018-06-24 12:18:31', '', 7, '2018-06-24 14:20:29', 0, '', 0, 2, NULL, 0.30, '211/2561201806241419'),
(436, 21, '1/2561', 0, 17, '127.0.0.1', 21, '2018-06-24 12:18:31', '', 7, '2018-06-24 14:20:29', 0, '', 0, 2, NULL, 0.30, '211/2561201806241419'),
(437, 21, '1/2561', 0, 18, '127.0.0.1', 21, '2018-06-24 12:18:31', '', 7, '2018-06-24 14:20:29', 0, '', 0, 2, NULL, 0.30, '211/2561201806241419'),
(438, 21, '1/2561', 0, 19, '127.0.0.1', 21, '2018-06-24 12:18:31', '', 7, '2018-06-24 14:20:29', 0, '', 0, 2, NULL, 0.30, '211/2561201806241419'),
(439, 21, '1/2561', 0, 20, '127.0.0.1', 21, '2018-06-24 12:18:31', '', 7, '2018-06-24 14:20:29', 0, '', 0, 2, NULL, 0.30, '211/2561201806241419'),
(440, 21, '1/2561', 0, 21, '127.0.0.1', 21, '2018-06-24 12:18:31', '', 7, '2018-06-24 14:20:29', 0, '', 0, 2, NULL, 1.00, '211/2561201806241419'),
(441, 21, '1/2561', 0, 22, '127.0.0.1', 21, '2018-06-24 12:18:31', '', 7, '2018-06-24 14:20:29', 0, '', 0, 2, NULL, 1.00, '211/2561201806241419'),
(442, 21, '1/2561', 0, 23, '127.0.0.1', 21, '2018-06-24 12:18:31', '', 7, '2018-06-24 14:20:29', 0, '', 0, 2, NULL, 0.30, '211/2561201806241419'),
(443, 21, '1/2561', 0, 24, '127.0.0.1', 21, '2018-06-24 12:18:31', '', 7, '2018-06-24 14:20:29', 0, '', 0, 2, NULL, 0.30, '211/2561201806241419'),
(444, 21, '1/2561', 0, 25, '127.0.0.1', 21, '2018-06-24 12:18:31', '', 7, '2018-06-24 14:20:29', 0, '', 0, 2, NULL, 0.30, '211/2561201806241419'),
(445, 21, '1/2561', 0, 26, '127.0.0.1', 21, '2018-06-24 12:18:31', '', 7, '2018-06-24 14:20:29', 0, '', 0, 2, NULL, 0.30, '211/2561201806241419'),
(446, 21, '1/2561', 0, 2, '127.0.0.1', 21, '2018-06-24 12:19:15', '', 7, '2018-06-24 14:20:29', 0, '', 0, 3, NULL, 1.50, '211/2561201806241419'),
(447, 21, '1/2561', 0, 7, '127.0.0.1', 21, '2018-06-24 12:19:15', '', 7, '2018-06-24 14:20:29', 0, '', 0, 3, NULL, 1.50, '211/2561201806241419'),
(448, 21, '1/2561', 0, 8, '127.0.0.1', 21, '2018-06-24 12:19:15', '', 7, '2018-06-24 14:20:29', 0, '', 0, 3, NULL, 1.50, '211/2561201806241419'),
(449, 21, '1/2561', 0, 9, '127.0.0.1', 21, '2018-06-24 12:19:15', '', 7, '2018-06-24 14:20:29', 0, '', 0, 3, NULL, 1.50, '211/2561201806241419'),
(450, 21, '1/2561', 0, 10, '127.0.0.1', 21, '2018-06-24 12:19:15', '', 7, '2018-06-24 14:20:29', 0, '', 0, 3, NULL, 1.50, '211/2561201806241419'),
(451, 21, '1/2561', 0, 12, '127.0.0.1', 21, '2018-06-24 12:19:15', '', 7, '2018-06-24 14:20:29', 0, '', 0, 3, NULL, 1.00, '211/2561201806241419'),
(452, 21, '1/2561', 0, 31, '127.0.0.1', 21, '2018-06-24 12:19:15', '', 7, '2018-06-24 14:20:29', 0, '', 0, 3, NULL, 1.50, '211/2561201806241419'),
(453, 21, '1/2561', 0, 32, '127.0.0.1', 21, '2018-06-24 12:19:15', '', 7, '2018-06-24 14:20:29', 0, '', 0, 3, NULL, 1.50, '211/2561201806241419'),
(454, 21, '1/2561', 0, 33, '127.0.0.1', 21, '2018-06-24 12:19:15', '', 7, '2018-06-24 14:20:29', 0, '', 0, 3, NULL, 1.50, '211/2561201806241419'),
(455, 21, '1/2561', 0, 34, '127.0.0.1', 21, '2018-06-24 12:19:15', '', 7, '2018-06-24 14:20:29', 0, '', 0, 3, NULL, 1.50, '211/2561201806241419'),
(456, 21, '2/2561', 0, 1, '127.0.0.1', 21, '2018-06-24 12:28:39', '127.0.0.1', 7, '2018-06-24 14:29:52', 0, '127.0.0.1', 21, 1, '0000-00-00 00:00:00', 0.00, '212/2561201806241428'),
(457, 21, '2/2561', 0, 2, '127.0.0.1', 21, '2018-06-24 12:28:39', '127.0.0.1', 7, '2018-06-24 14:29:52', 0, '127.0.0.1', 21, 1, '0000-00-00 00:00:00', 0.00, '212/2561201806241428'),
(458, 21, '2/2561', 0, 3, '127.0.0.1', 21, '2018-06-24 12:28:39', '127.0.0.1', 7, '2018-06-24 14:29:52', 0, '127.0.0.1', 21, 1, '0000-00-00 00:00:00', 0.00, '212/2561201806241428'),
(459, 21, '2/2561', 0, 4, '127.0.0.1', 21, '2018-06-24 12:28:39', '127.0.0.1', 7, '2018-06-24 14:29:52', 0, '127.0.0.1', 21, 1, '0000-00-00 00:00:00', 0.00, '212/2561201806241428'),
(460, 21, '2/2561', 0, 5, '127.0.0.1', 21, '2018-06-24 12:28:39', '127.0.0.1', 7, '2018-06-24 14:29:52', 0, '127.0.0.1', 21, 1, '0000-00-00 00:00:00', 0.00, '212/2561201806241428'),
(461, 21, '2/2561', 0, 6, '127.0.0.1', 21, '2018-06-24 12:28:39', '127.0.0.1', 7, '2018-06-24 14:29:52', 0, '127.0.0.1', 21, 1, '0000-00-00 00:00:00', 0.00, '212/2561201806241428'),
(462, 21, '2/2561', 0, 7, '127.0.0.1', 21, '2018-06-24 12:28:39', '127.0.0.1', 7, '2018-06-24 14:29:52', 0, '127.0.0.1', 21, 1, '0000-00-00 00:00:00', 0.00, '212/2561201806241428'),
(463, 21, '2/2561', 0, 8, '127.0.0.1', 21, '2018-06-24 12:28:39', '127.0.0.1', 7, '2018-06-24 14:29:52', 0, '127.0.0.1', 21, 1, '0000-00-00 00:00:00', 0.00, '212/2561201806241428'),
(464, 21, '2/2561', 0, 9, '127.0.0.1', 21, '2018-06-24 12:28:39', '127.0.0.1', 7, '2018-06-24 14:29:52', 0, '127.0.0.1', 21, 1, '0000-00-00 00:00:00', 0.00, '212/2561201806241428'),
(465, 21, '2/2561', 0, 10, '127.0.0.1', 21, '2018-06-24 12:28:39', '127.0.0.1', 7, '2018-06-24 14:29:52', 0, '127.0.0.1', 21, 1, '0000-00-00 00:00:00', 15.00, '212/2561201806241428'),
(466, 21, '2/2561', 0, 11, '127.0.0.1', 21, '2018-06-24 12:28:39', '127.0.0.1', 7, '2018-06-24 14:29:52', 0, '127.0.0.1', 21, 1, '0000-00-00 00:00:00', 0.00, '212/2561201806241428'),
(467, 21, '2/2561', 0, 12, '127.0.0.1', 21, '2018-06-24 12:28:39', '127.0.0.1', 7, '2018-06-24 14:29:52', 0, '127.0.0.1', 21, 1, '0000-00-00 00:00:00', 0.00, '212/2561201806241428'),
(468, 21, '2/2561', 0, 13, '127.0.0.1', 21, '2018-06-24 12:28:39', '127.0.0.1', 7, '2018-06-24 14:29:52', 0, '127.0.0.1', 21, 1, '0000-00-00 00:00:00', 0.00, '212/2561201806241428'),
(469, 21, '2/2561', 0, 14, '127.0.0.1', 21, '2018-06-24 12:28:39', '127.0.0.1', 7, '2018-06-24 14:29:52', 0, '127.0.0.1', 21, 1, '0000-00-00 00:00:00', 0.00, '212/2561201806241428'),
(470, 21, '2/2561', 0, 15, '127.0.0.1', 21, '2018-06-24 12:28:39', '127.0.0.1', 7, '2018-06-24 14:29:52', 0, '127.0.0.1', 21, 1, '0000-00-00 00:00:00', 0.00, '212/2561201806241428'),
(471, 21, '2/2561', 0, 16, '127.0.0.1', 21, '2018-06-24 12:28:39', '127.0.0.1', 7, '2018-06-24 14:29:52', 0, '127.0.0.1', 21, 1, '0000-00-00 00:00:00', 0.00, '212/2561201806241428'),
(472, 21, '2/2561', 0, 17, '127.0.0.1', 21, '2018-06-24 12:28:39', '127.0.0.1', 7, '2018-06-24 14:29:52', 0, '127.0.0.1', 21, 1, '0000-00-00 00:00:00', 0.00, '212/2561201806241428'),
(473, 21, '2/2561', 0, 18, '127.0.0.1', 21, '2018-06-24 12:28:39', '127.0.0.1', 7, '2018-06-24 14:29:52', 0, '127.0.0.1', 21, 1, '0000-00-00 00:00:00', 0.00, '212/2561201806241428'),
(474, 21, '2/2561', 0, 19, '127.0.0.1', 21, '2018-06-24 12:28:39', '127.0.0.1', 7, '2018-06-24 14:29:52', 0, '127.0.0.1', 21, 1, '0000-00-00 00:00:00', 0.00, '212/2561201806241428'),
(475, 21, '2/2561', 0, 20, '127.0.0.1', 21, '2018-06-24 12:28:39', '127.0.0.1', 7, '2018-06-24 14:29:52', 0, '127.0.0.1', 21, 1, '0000-00-00 00:00:00', 0.00, '212/2561201806241428'),
(476, 21, '2/2561', 0, 21, '127.0.0.1', 21, '2018-06-24 12:28:39', '127.0.0.1', 7, '2018-06-24 14:29:52', 0, '127.0.0.1', 21, 1, '0000-00-00 00:00:00', 10.00, '212/2561201806241428'),
(477, 21, '2/2561', 0, 1, '127.0.0.1', 21, '2018-06-24 12:28:44', '', 7, '2018-06-24 14:29:52', 0, '', 0, 2, NULL, 0.30, '212/2561201806241428'),
(478, 21, '2/2561', 0, 2, '127.0.0.1', 21, '2018-06-24 12:28:44', '', 7, '2018-06-24 14:29:52', 0, '', 0, 2, NULL, 0.00, '212/2561201806241428'),
(479, 21, '2/2561', 0, 3, '127.0.0.1', 21, '2018-06-24 12:28:44', '', 7, '2018-06-24 14:29:52', 0, '', 0, 2, NULL, 0.00, '212/2561201806241428'),
(480, 21, '2/2561', 0, 4, '127.0.0.1', 21, '2018-06-24 12:28:44', '', 7, '2018-06-24 14:29:52', 0, '', 0, 2, NULL, 0.00, '212/2561201806241428'),
(481, 21, '2/2561', 0, 5, '127.0.0.1', 21, '2018-06-24 12:28:44', '', 7, '2018-06-24 14:29:52', 0, '', 0, 2, NULL, 0.00, '212/2561201806241428'),
(482, 21, '2/2561', 0, 6, '127.0.0.1', 21, '2018-06-24 12:28:44', '', 7, '2018-06-24 14:29:52', 0, '', 0, 2, NULL, 0.00, '212/2561201806241428'),
(483, 21, '2/2561', 0, 7, '127.0.0.1', 21, '2018-06-24 12:28:44', '', 7, '2018-06-24 14:29:52', 0, '', 0, 2, NULL, 0.00, '212/2561201806241428'),
(484, 21, '2/2561', 0, 8, '127.0.0.1', 21, '2018-06-24 12:28:44', '', 7, '2018-06-24 14:29:52', 0, '', 0, 2, NULL, 0.00, '212/2561201806241428'),
(485, 21, '2/2561', 0, 9, '127.0.0.1', 21, '2018-06-24 12:28:44', '', 7, '2018-06-24 14:29:52', 0, '', 0, 2, NULL, 0.00, '212/2561201806241428'),
(486, 21, '2/2561', 0, 10, '127.0.0.1', 21, '2018-06-24 12:28:44', '', 7, '2018-06-24 14:29:52', 0, '', 0, 2, NULL, 0.30, '212/2561201806241428'),
(487, 21, '2/2561', 0, 11, '127.0.0.1', 21, '2018-06-24 12:28:44', '', 7, '2018-06-24 14:29:52', 0, '', 0, 2, NULL, 0.00, '212/2561201806241428'),
(488, 21, '2/2561', 0, 12, '127.0.0.1', 21, '2018-06-24 12:28:44', '', 7, '2018-06-24 14:29:52', 0, '', 0, 2, NULL, 0.00, '212/2561201806241428'),
(489, 21, '2/2561', 0, 13, '127.0.0.1', 21, '2018-06-24 12:28:44', '', 7, '2018-06-24 14:29:52', 0, '', 0, 2, NULL, 0.00, '212/2561201806241428'),
(490, 21, '2/2561', 0, 14, '127.0.0.1', 21, '2018-06-24 12:28:44', '', 7, '2018-06-24 14:29:52', 0, '', 0, 2, NULL, 0.20, '212/2561201806241428'),
(491, 21, '2/2561', 0, 15, '127.0.0.1', 21, '2018-06-24 12:28:44', '', 7, '2018-06-24 14:29:52', 0, '', 0, 2, NULL, 0.00, '212/2561201806241428'),
(492, 21, '2/2561', 0, 16, '127.0.0.1', 21, '2018-06-24 12:28:44', '', 7, '2018-06-24 14:29:52', 0, '', 0, 2, NULL, 0.00, '212/2561201806241428'),
(493, 21, '2/2561', 0, 17, '127.0.0.1', 21, '2018-06-24 12:28:44', '', 7, '2018-06-24 14:29:52', 0, '', 0, 2, NULL, 0.00, '212/2561201806241428'),
(494, 21, '2/2561', 0, 18, '127.0.0.1', 21, '2018-06-24 12:28:44', '', 7, '2018-06-24 14:29:52', 0, '', 0, 2, NULL, 0.00, '212/2561201806241428'),
(495, 21, '2/2561', 0, 19, '127.0.0.1', 21, '2018-06-24 12:28:44', '', 7, '2018-06-24 14:29:52', 0, '', 0, 2, NULL, 0.30, '212/2561201806241428'),
(496, 21, '2/2561', 0, 20, '127.0.0.1', 21, '2018-06-24 12:28:44', '', 7, '2018-06-24 14:29:52', 0, '', 0, 2, NULL, 0.00, '212/2561201806241428'),
(497, 21, '2/2561', 0, 21, '127.0.0.1', 21, '2018-06-24 12:28:44', '', 7, '2018-06-24 14:29:52', 0, '', 0, 2, NULL, 1.00, '212/2561201806241428'),
(498, 21, '2/2561', 0, 22, '127.0.0.1', 21, '2018-06-24 12:28:44', '', 7, '2018-06-24 14:29:52', 0, '', 0, 2, NULL, 0.00, '212/2561201806241428'),
(499, 21, '2/2561', 0, 23, '127.0.0.1', 21, '2018-06-24 12:28:44', '', 7, '2018-06-24 14:29:52', 0, '', 0, 2, NULL, 0.30, '212/2561201806241428'),
(500, 21, '2/2561', 0, 24, '127.0.0.1', 21, '2018-06-24 12:28:44', '', 7, '2018-06-24 14:29:52', 0, '', 0, 2, NULL, 0.00, '212/2561201806241428'),
(501, 21, '2/2561', 0, 25, '127.0.0.1', 21, '2018-06-24 12:28:44', '', 7, '2018-06-24 14:29:52', 0, '', 0, 2, NULL, 0.00, '212/2561201806241428'),
(502, 21, '2/2561', 0, 26, '127.0.0.1', 21, '2018-06-24 12:28:44', '', 7, '2018-06-24 14:29:52', 0, '', 0, 2, NULL, 0.50, '212/2561201806241428'),
(503, 21, '2/2561', 0, 2, '127.0.0.1', 21, '2018-06-24 12:28:52', '', 7, '2018-06-24 14:29:52', 0, '', 0, 3, NULL, 1.50, '212/2561201806241428'),
(504, 21, '2/2561', 0, 7, '127.0.0.1', 21, '2018-06-24 12:28:52', '', 7, '2018-06-24 14:29:52', 0, '', 0, 3, NULL, 0.00, '212/2561201806241428'),
(505, 21, '2/2561', 0, 8, '127.0.0.1', 21, '2018-06-24 12:28:52', '', 7, '2018-06-24 14:29:52', 0, '', 0, 3, NULL, 0.00, '212/2561201806241428'),
(506, 21, '2/2561', 0, 9, '127.0.0.1', 21, '2018-06-24 12:28:52', '', 7, '2018-06-24 14:29:52', 0, '', 0, 3, NULL, 0.00, '212/2561201806241428'),
(507, 21, '2/2561', 0, 10, '127.0.0.1', 21, '2018-06-24 12:28:52', '', 7, '2018-06-24 14:29:52', 0, '', 0, 3, NULL, 0.00, '212/2561201806241428'),
(508, 21, '2/2561', 0, 12, '127.0.0.1', 21, '2018-06-24 12:28:52', '', 7, '2018-06-24 14:29:52', 0, '', 0, 3, NULL, 0.00, '212/2561201806241428'),
(509, 21, '2/2561', 0, 31, '127.0.0.1', 21, '2018-06-24 12:28:52', '', 7, '2018-06-24 14:29:52', 0, '', 0, 3, NULL, 1.50, '212/2561201806241428'),
(510, 21, '2/2561', 0, 32, '127.0.0.1', 21, '2018-06-24 12:28:52', '', 7, '2018-06-24 14:29:52', 0, '', 0, 3, NULL, 0.00, '212/2561201806241428'),
(511, 21, '2/2561', 0, 33, '127.0.0.1', 21, '2018-06-24 12:28:52', '', 7, '2018-06-24 14:29:52', 0, '', 0, 3, NULL, 1.50, '212/2561201806241428'),
(512, 21, '2/2561', 0, 34, '127.0.0.1', 21, '2018-06-24 12:28:52', '', 7, '2018-06-24 14:29:52', 0, '', 0, 3, NULL, 0.00, '212/2561201806241428');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `tbl_complain`
--
ALTER TABLE `tbl_complain`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `tbl_date_q`
--
ALTER TABLE `tbl_date_q`
  ADD PRIMARY KEY (`dq_id`);

--
-- Indexes for table `tbl_department`
--
ALTER TABLE `tbl_department`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `tbl_level`
--
ALTER TABLE `tbl_level`
  ADD PRIMARY KEY (`l_id`);

--
-- Indexes for table `tbl_news`
--
ALTER TABLE `tbl_news`
  ADD PRIMARY KEY (`n_id`);

--
-- Indexes for table `tbl_personal`
--
ALTER TABLE `tbl_personal`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `tbl_position`
--
ALTER TABLE `tbl_position`
  ADD PRIMARY KEY (`po_id`);

--
-- Indexes for table `tbl_q1`
--
ALTER TABLE `tbl_q1`
  ADD PRIMARY KEY (`q1_id`);

--
-- Indexes for table `tbl_q1_group`
--
ALTER TABLE `tbl_q1_group`
  ADD PRIMARY KEY (`qt_id`);

--
-- Indexes for table `tbl_q2`
--
ALTER TABLE `tbl_q2`
  ADD PRIMARY KEY (`q2_id`);

--
-- Indexes for table `tbl_q2_group`
--
ALTER TABLE `tbl_q2_group`
  ADD PRIMARY KEY (`qg2_id`);

--
-- Indexes for table `tbl_q3`
--
ALTER TABLE `tbl_q3`
  ADD PRIMARY KEY (`q3_id`);

--
-- Indexes for table `tbl_q3_group`
--
ALTER TABLE `tbl_q3_group`
  ADD PRIMARY KEY (`qg3_id`);

--
-- Indexes for table `tbl_reason_chk_score`
--
ALTER TABLE `tbl_reason_chk_score`
  ADD PRIMARY KEY (`rc_id`);

--
-- Indexes for table `tbl_score`
--
ALTER TABLE `tbl_score`
  ADD PRIMARY KEY (`s_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_complain`
--
ALTER TABLE `tbl_complain`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_date_q`
--
ALTER TABLE `tbl_date_q`
  MODIFY `dq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_department`
--
ALTER TABLE `tbl_department`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_level`
--
ALTER TABLE `tbl_level`
  MODIFY `l_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_news`
--
ALTER TABLE `tbl_news`
  MODIFY `n_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_personal`
--
ALTER TABLE `tbl_personal`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_position`
--
ALTER TABLE `tbl_position`
  MODIFY `po_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_q1`
--
ALTER TABLE `tbl_q1`
  MODIFY `q1_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_q1_group`
--
ALTER TABLE `tbl_q1_group`
  MODIFY `qt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_q2`
--
ALTER TABLE `tbl_q2`
  MODIFY `q2_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_q2_group`
--
ALTER TABLE `tbl_q2_group`
  MODIFY `qg2_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_q3`
--
ALTER TABLE `tbl_q3`
  MODIFY `q3_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tbl_q3_group`
--
ALTER TABLE `tbl_q3_group`
  MODIFY `qg3_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_reason_chk_score`
--
ALTER TABLE `tbl_reason_chk_score`
  MODIFY `rc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_score`
--
ALTER TABLE `tbl_score`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=513;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

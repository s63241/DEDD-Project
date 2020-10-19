-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2020 at 03:43 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
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
(17, 21, 21, '2/2561', '', '', '2018-06-24 12:30:30'),
(18, 7, 24, '2/2561', 'enene', 'nenen', '2018-08-07 09:22:20'),
(19, 7, 25, '2/2561', '', '', '2018-08-08 04:40:18'),
(20, 25, 25, '1/2562', '', '', '2018-08-14 09:18:46'),
(21, 25, 25, '1/2562', '', '', '2018-08-16 15:19:26'),
(22, 7, 27, '1/2562', '', '', '2018-08-16 15:23:44'),
(23, 27, 27, '1/2562', '', '', '2018-08-16 15:27:49'),
(24, 7, 29, '1/2562', '', '', '2018-08-16 15:54:10'),
(25, 31, 30, '1/2562', '', '', '2018-08-16 16:03:14'),
(26, 31, 31, '1/2562', '', '', '2018-08-16 16:07:05');

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
-- Table structure for table `tbl_contacts`
--

CREATE TABLE `tbl_contacts` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `mobile` varchar(45) DEFAULT NULL,
  `description` text,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_contacts`
--

INSERT INTO `tbl_contacts` (`id`, `fullname`, `title`, `email`, `mobile`, `description`, `created`) VALUES
(16, 'Thunthicha', 'โปรเจค', 'leelavanlop_amm@hotmail.com', '0990944565', 'งานนนนนน', '2018-08-07 10:30:21');

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
(1, '1/2561', '0000-00-00', '0000-00-00', '2018-06-01', '2018-08-16', '2018-06-01', '2018-08-16', '2018-06-01', '2018-08-16'),
(4, '1/2563', '0000-00-00', '0000-00-00', '2020-10-08', '2020-11-30', '2020-10-08', '2020-11-30', '2020-10-08', '2020-11-30'),
(5, '1/2563', '0000-00-00', '0000-00-00', '2020-10-03', '2020-12-12', '2020-10-03', '2020-12-12', '2020-10-03', '2020-12-12');

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
(8, 1, 3, 3, '3', '3', 'นาย', 'ผอ.', ' ผอ.', 'ชาย', '990000000000', 'sdaasd@d22222s', 'fvcveeeeeeeeee', 'ปฏิบัติการ', '2018-04-30', '189475938720180430_203826.jpg', '2018-04-21 10:03:06'),
(11, 1, 4, 4, '5', '5', 'นางสาว', 'ชฏาพร', 'จูสิงห์', 'หญิง', '0891288827', 'u5811011802070@gmail.com', '-', 'ปฏิบัติการ', '2018-05-10', '194609152620180508_135445.jpg', '2018-05-08 06:54:31'),
(22, 1, 1, 1, 'admin', 'admin', '', 'admin', 'admin', '', '0990944565', 'u5811011802071@mail.dusit.ac.t', ' ', 'ปฏิบัติการ', '1997-05-09', 'user.jpg', '2018-06-26 14:21:17'),
(25, 1, 4, 4, '123', '123', 'นาย', 'กนกพล', 'อู่วงศ์', 'ชาย', '0990944565', 'u5811011802082@gmail.com', '198', 'ปฏิบัติการ', '2018-08-08', '186188352120180808_112848.jpg', '2018-08-08 04:28:33'),
(31, 1, 2, 2, '1235', '1235', 'นางสาว', 'อภิชาติ	', 'พรมมา	', 'หญิง', '0990944565', 'u5811011802082@gmail.com', 'fgtge', 'ปฏิบัติการ', '2018-08-03', '160248992820180816_230230.png', '2018-08-16 16:02:13'),
(33, 1, 4, 4, 'test1', 'test1', 'นางสาว', 'test', 'เจ้าหน้าที่', 'หญิง', '0990944565', 'u5811011802071@mail.dusit.ac.t', 'าเืาเฟนาย', 'ปฏิบัติการ', '2018-11-08', '5391161920181108_114241.jpg', '2018-11-08 04:41:14');

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
(1, 32, '1/2562', 0, 2, '171.6.220.87', 32, '2018-08-27 15:17:19', '', 0, NULL, 0, '', 0, 1, NULL, 5.00, '321/2562201808272218'),
(2, 32, '1/2562', 0, 9, '171.6.220.87', 32, '2018-08-27 15:17:19', '', 0, NULL, 0, '', 0, 1, NULL, 10.00, '321/2562201808272218'),
(3, 32, '1/2562', 0, 15, '171.6.220.87', 32, '2018-08-27 15:17:19', '', 0, NULL, 0, '', 0, 1, NULL, 13.00, '321/2562201808272218'),
(4, 32, '1/2562', 0, 19, '171.6.220.87', 32, '2018-08-27 15:17:19', '', 0, NULL, 0, '', 0, 1, NULL, 10.00, '321/2562201808272218'),
(5, 32, '1/2562', 0, 21, '171.6.220.87', 32, '2018-08-27 15:17:19', '', 0, NULL, 0, '', 0, 1, NULL, 4.00, '321/2562201808272218'),
(6, 32, '1/2562', 0, 1, '171.6.220.87', 32, '2018-08-27 15:18:29', '', 0, NULL, 0, '', 0, 2, NULL, 0.30, '321/2562201808272218'),
(7, 32, '1/2562', 0, 2, '171.6.220.87', 32, '2018-08-27 15:18:29', '', 0, NULL, 0, '', 0, 2, NULL, 0.30, '321/2562201808272218'),
(8, 32, '1/2562', 0, 3, '171.6.220.87', 32, '2018-08-27 15:18:29', '', 0, NULL, 0, '', 0, 2, NULL, 0.30, '321/2562201808272218'),
(9, 32, '1/2562', 0, 4, '171.6.220.87', 32, '2018-08-27 15:18:29', '', 0, NULL, 0, '', 0, 2, NULL, 0.16, '321/2562201808272218'),
(10, 32, '1/2562', 0, 5, '171.6.220.87', 32, '2018-08-27 15:18:29', '', 0, NULL, 0, '', 0, 2, NULL, 0.30, '321/2562201808272218'),
(11, 32, '1/2562', 0, 6, '171.6.220.87', 32, '2018-08-27 15:18:29', '', 0, NULL, 0, '', 0, 2, NULL, 0.30, '321/2562201808272218'),
(12, 32, '1/2562', 0, 7, '171.6.220.87', 32, '2018-08-27 15:18:29', '', 0, NULL, 0, '', 0, 2, NULL, 0.30, '321/2562201808272218'),
(13, 32, '1/2562', 0, 8, '171.6.220.87', 32, '2018-08-27 15:18:29', '', 0, NULL, 0, '', 0, 2, NULL, 0.30, '321/2562201808272218'),
(14, 32, '1/2562', 0, 9, '171.6.220.87', 32, '2018-08-27 15:18:29', '', 0, NULL, 0, '', 0, 2, NULL, 0.30, '321/2562201808272218'),
(15, 32, '1/2562', 0, 10, '171.6.220.87', 32, '2018-08-27 15:18:29', '', 0, NULL, 0, '', 0, 2, NULL, 0.30, '321/2562201808272218'),
(16, 32, '1/2562', 0, 11, '171.6.220.87', 32, '2018-08-27 15:18:29', '', 0, NULL, 0, '', 0, 2, NULL, 0.30, '321/2562201808272218'),
(17, 32, '1/2562', 0, 12, '171.6.220.87', 32, '2018-08-27 15:18:29', '', 0, NULL, 0, '', 0, 2, NULL, 0.30, '321/2562201808272218'),
(18, 32, '1/2562', 0, 13, '171.6.220.87', 32, '2018-08-27 15:18:29', '', 0, NULL, 0, '', 0, 2, NULL, 0.30, '321/2562201808272218'),
(19, 32, '1/2562', 0, 14, '171.6.220.87', 32, '2018-08-27 15:18:29', '', 0, NULL, 0, '', 0, 2, NULL, 0.30, '321/2562201808272218'),
(20, 32, '1/2562', 0, 15, '171.6.220.87', 32, '2018-08-27 15:18:29', '', 0, NULL, 0, '', 0, 2, NULL, 0.30, '321/2562201808272218'),
(21, 32, '1/2562', 0, 16, '171.6.220.87', 32, '2018-08-27 15:18:29', '', 0, NULL, 0, '', 0, 2, NULL, 0.30, '321/2562201808272218'),
(22, 32, '1/2562', 0, 17, '171.6.220.87', 32, '2018-08-27 15:18:29', '', 0, NULL, 0, '', 0, 2, NULL, 0.30, '321/2562201808272218'),
(23, 32, '1/2562', 0, 18, '171.6.220.87', 32, '2018-08-27 15:18:29', '', 0, NULL, 0, '', 0, 2, NULL, 0.30, '321/2562201808272218'),
(24, 32, '1/2562', 0, 19, '171.6.220.87', 32, '2018-08-27 15:18:29', '', 0, NULL, 0, '', 0, 2, NULL, 0.30, '321/2562201808272218'),
(25, 32, '1/2562', 0, 20, '171.6.220.87', 32, '2018-08-27 15:18:29', '', 0, NULL, 0, '', 0, 2, NULL, 0.30, '321/2562201808272218'),
(26, 32, '1/2562', 0, 21, '171.6.220.87', 32, '2018-08-27 15:18:29', '', 0, NULL, 0, '', 0, 2, NULL, 0.30, '321/2562201808272218'),
(27, 32, '1/2562', 0, 22, '171.6.220.87', 32, '2018-08-27 15:18:29', '', 0, NULL, 0, '', 0, 2, NULL, 0.30, '321/2562201808272218'),
(28, 32, '1/2562', 0, 23, '171.6.220.87', 32, '2018-08-27 15:18:29', '', 0, NULL, 0, '', 0, 2, NULL, 0.30, '321/2562201808272218'),
(29, 32, '1/2562', 0, 24, '171.6.220.87', 32, '2018-08-27 15:18:29', '', 0, NULL, 0, '', 0, 2, NULL, 0.30, '321/2562201808272218'),
(30, 32, '1/2562', 0, 25, '171.6.220.87', 32, '2018-08-27 15:18:29', '', 0, NULL, 0, '', 0, 2, NULL, 0.30, '321/2562201808272218'),
(31, 32, '1/2562', 0, 26, '171.6.220.87', 32, '2018-08-27 15:18:29', '', 0, NULL, 0, '', 0, 2, NULL, 0.30, '321/2562201808272218'),
(32, 32, '1/2562', 0, 2, '171.6.220.87', 32, '2018-08-27 15:18:53', '', 0, NULL, 0, '', 0, 3, NULL, 1.50, '321/2562201808272218'),
(33, 32, '1/2562', 0, 7, '171.6.220.87', 32, '2018-08-27 15:18:53', '', 0, NULL, 0, '', 0, 3, NULL, 1.50, '321/2562201808272218'),
(34, 32, '1/2562', 0, 8, '171.6.220.87', 32, '2018-08-27 15:18:53', '', 0, NULL, 0, '', 0, 3, NULL, 1.50, '321/2562201808272218'),
(35, 32, '1/2562', 0, 9, '171.6.220.87', 32, '2018-08-27 15:18:53', '', 0, NULL, 0, '', 0, 3, NULL, 1.50, '321/2562201808272218'),
(36, 32, '1/2562', 0, 10, '171.6.220.87', 32, '2018-08-27 15:18:53', '', 0, NULL, 0, '', 0, 3, NULL, 1.50, '321/2562201808272218'),
(37, 32, '1/2562', 0, 12, '171.6.220.87', 32, '2018-08-27 15:18:53', '', 0, NULL, 0, '', 0, 3, NULL, 1.50, '321/2562201808272218'),
(38, 32, '1/2562', 0, 31, '171.6.220.87', 32, '2018-08-27 15:18:53', '', 0, NULL, 0, '', 0, 3, NULL, 1.50, '321/2562201808272218'),
(39, 32, '1/2562', 0, 32, '171.6.220.87', 32, '2018-08-27 15:18:53', '', 0, NULL, 0, '', 0, 3, NULL, 1.50, '321/2562201808272218'),
(40, 32, '1/2562', 0, 33, '171.6.220.87', 32, '2018-08-27 15:18:53', '', 0, NULL, 0, '', 0, 3, NULL, 1.50, '321/2562201808272218'),
(41, 32, '1/2562', 0, 34, '171.6.220.87', 32, '2018-08-27 15:18:53', '', 0, NULL, 0, '', 0, 3, NULL, 1.50, '321/2562201808272218');

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
-- Indexes for table `tbl_contacts`
--
ALTER TABLE `tbl_contacts`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_complain`
--
ALTER TABLE `tbl_complain`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_contacts`
--
ALTER TABLE `tbl_contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_date_q`
--
ALTER TABLE `tbl_date_q`
  MODIFY `dq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
-- AUTO_INCREMENT for table `tbl_personal`
--
ALTER TABLE `tbl_personal`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

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
  MODIFY `qt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_q2`
--
ALTER TABLE `tbl_q2`
  MODIFY `q2_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_q2_group`
--
ALTER TABLE `tbl_q2_group`
  MODIFY `qg2_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_q3`
--
ALTER TABLE `tbl_q3`
  MODIFY `q3_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tbl_q3_group`
--
ALTER TABLE `tbl_q3_group`
  MODIFY `qg3_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_reason_chk_score`
--
ALTER TABLE `tbl_reason_chk_score`
  MODIFY `rc_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_score`
--
ALTER TABLE `tbl_score`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
